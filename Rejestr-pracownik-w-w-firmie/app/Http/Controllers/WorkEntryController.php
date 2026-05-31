<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreWorkEntryRequest;
use App\Http\Requests\UpdateWorkEntryRequest;
use App\Models\User;
use App\Models\WorkEntry;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class WorkEntryController extends Controller
{
    public function index(Request $request): View
    {
        $user = $request->user();

        $query = WorkEntry::query()
            ->with(['employee', 'creator'])
            ->latest('work_date')
            ->latest('id');

        if ($user?->role === 'supervisor') {
            $query->whereHas('employee', function ($employeeQuery) use ($user): void {
                $employeeQuery->where('supervisor_id', $user->id);
            });
        } elseif ($user?->role === 'employee') {
            $query->where('employee_id', $user->id);
        }

        return view('work_entries.index', [
            'workEntries' => $query->simplePaginate(10),
            'canCreate' => in_array($user?->role, ['admin', 'supervisor'], true),
        ]);
    }

    public function create(Request $request): View
    {
        $user = $request->user();

        if (! in_array($user?->role, ['admin', 'supervisor'], true)) {
            abort(403);
        }

        $employees = User::query()
            ->where('role', 'employee')
            ->when($user?->role === 'supervisor', function ($query) use ($user): void {
                $query->where('supervisor_id', $user->id);
            })
            ->orderBy('name')
            ->get();

        return view('work_entries.create', [
            'employees' => $employees,
        ]);
    }

    public function store(StoreWorkEntryRequest $request): RedirectResponse
    {
        $user = $request->user();
        $employee = User::query()->findOrFail($request->validated('employee_id'));

        if (! in_array($user?->role, ['admin', 'supervisor'], true)) {
            abort(403);
        }

        if ($user?->role === 'supervisor' && $employee->supervisor_id !== $user->id) {
            abort(403);
        }

        $workEntry = WorkEntry::create([
            'employee_id' => $employee->id,
            'created_by' => $user->id,
            'work_date' => $request->validated('work_date'),
            'hours_worked' => $request->validated('hours_worked'),
            'comment' => $request->validated('comment'),
        ]);

        return redirect()
            ->route('work-entries.show', $workEntry)
            ->with('status', 'Wpis czasu pracy został dodany.');
    }

    public function show(Request $request, WorkEntry $workEntry): View
    {
        $user = $request->user();

        $workEntry->load(['employee', 'creator', 'comments.user']);

        if ($user?->role === 'supervisor' && $workEntry->employee->supervisor_id !== $user->id) {
            abort(403);
        }

        if ($user?->role === 'employee' && $workEntry->employee_id !== $user->id) {
            abort(403);
        }

        return view('work_entries.show', [
            'workEntry' => $workEntry,
            'canManage' => $user?->role === 'admin'
                || ($user?->role === 'supervisor' && $workEntry->created_by === $user->id),
        ]);
    }

    public function edit(Request $request, WorkEntry $workEntry): View
    {
        $user = $request->user();

        if (! in_array($user?->role, ['admin', 'supervisor'], true)) {
            abort(403);
        }

        if ($user?->role === 'supervisor' && $workEntry->created_by !== $user->id) {
            abort(403);
        }

        $employees = User::query()
            ->where('role', 'employee')
            ->when($user?->role === 'supervisor', function ($query) use ($user): void {
                $query->where('supervisor_id', $user->id);
            })
            ->orderBy('name')
            ->get();

        return view('work_entries.edit', [
            'workEntry' => $workEntry,
            'employees' => $employees,
        ]);
    }

    public function update(UpdateWorkEntryRequest $request, WorkEntry $workEntry): RedirectResponse
    {
        $user = $request->user();
        $employee = User::query()->findOrFail($request->validated('employee_id'));

        if (! in_array($user?->role, ['admin', 'supervisor'], true)) {
            abort(403);
        }

        if ($user?->role === 'supervisor' && $workEntry->created_by !== $user->id) {
            abort(403);
        }

        if ($user?->role === 'supervisor' && $employee->supervisor_id !== $user->id) {
            abort(403);
        }

        $workEntry->update([
            'employee_id' => $employee->id,
            'work_date' => $request->validated('work_date'),
            'hours_worked' => $request->validated('hours_worked'),
            'comment' => $request->validated('comment'),
        ]);

        return redirect()
            ->route('work-entries.show', $workEntry)
            ->with('status', 'Wpis czasu pracy został zaktualizowany.');
    }

    public function destroy(Request $request, WorkEntry $workEntry): RedirectResponse
    {
        $user = $request->user();

        if (! in_array($user?->role, ['admin', 'supervisor'], true)) {
            abort(403);
        }

        if ($user?->role === 'supervisor' && $workEntry->created_by !== $user->id) {
            abort(403);
        }

        $workEntry->delete();

        return redirect()
            ->route('work-entries.index')
            ->with('status', 'Wpis czasu pracy został usunięty.');
    }
}
