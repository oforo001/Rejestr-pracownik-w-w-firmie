<?php

use App\Models\User;
use App\Models\WorkEntry;
use App\Models\WorkEntryComment;
use App\Http\Controllers\WorkEntryCommentController;
use App\Http\Controllers\WorkEntryController;
use App\Http\Controllers\UserManagementController;
use App\Http\Controllers\ProfileController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::view('/', 'auth.login')->middleware('guest');

Route::get('/dashboard', function () {
    $user = auth()->user();

    return match ($user?->role) {
        'admin' => redirect()->route('usermanagement'),
        'supervisor' => redirect()->route('supervisor.dashboard'),
        default => redirect()->route('employee.dashboard'),
    };
})->middleware('auth')->name('dashboard');

Route::middleware(['auth', 'role:supervisor'])->prefix('supervisor')->group(function () {
    Route::get('/dashboard', function (Request $request) {
        $user = $request->user();
        $monthStart = now()->startOfMonth();
        $monthEnd = now()->endOfMonth();

        $employeeQuery = User::query()
            ->where('role', 'employee')
            ->where('supervisor_id', $user?->id);

        $workEntryQuery = WorkEntry::query()
            ->with(['employee', 'creator'])
            ->whereBetween('work_date', [$monthStart, $monthEnd])
            ->whereHas('employee', function ($query) use ($user): void {
                $query->where('supervisor_id', $user?->id);
            });

        $commentQuery = WorkEntryComment::query()
            ->with(['user', 'workEntry.employee'])
            ->whereHas('workEntry', function ($query) use ($user): void {
                $query->whereHas('employee', function ($employeeQuery) use ($user): void {
                    $employeeQuery->where('supervisor_id', $user?->id);
                });
            });

        return view('management.dashboard', [
            'roleLabel' => 'Przełożony',
            'isSupervisor' => true,
            'employeeCount' => $employeeQuery->count(),
            'workEntryCount' => (clone $workEntryQuery)->count(),
            'totalHours' => (float) (clone $workEntryQuery)->sum('hours_worked'),
            'commentCount' => (clone $commentQuery)
                ->whereHas('workEntry', function ($query) use ($monthStart, $monthEnd): void {
                    $query->whereBetween('work_date', [$monthStart, $monthEnd]);
                })
                ->count(),
            'recentEntries' => (clone $workEntryQuery)
                ->latest('work_date')
                ->latest('id')
                ->take(6)
                ->get()
                ->loadCount('comments'),
            'recentComments' => (clone $commentQuery)
                ->whereHas('workEntry', function ($query) use ($monthStart, $monthEnd): void {
                    $query->whereBetween('work_date', [$monthStart, $monthEnd]);
                })
                ->latest('created_at')
                ->take(5)
                ->get(),
        ]);
    })->name('supervisor.dashboard');
});

Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/usermanagement', [UserManagementController::class, 'index'])
        ->name('usermanagement');

    Route::get('/usermanagement/create', [UserManagementController::class, 'create'])
        ->name('usermanagement.create');

    Route::post('/usermanagement', [UserManagementController::class, 'store'])
        ->name('usermanagement.store');

    Route::patch('/usermanagement/{user}/supervisor', [UserManagementController::class, 'updateSupervisor'])
        ->name('usermanagement.supervisor');

    Route::patch('/usermanagement/{user}/status', [UserManagementController::class, 'toggleStatus'])
        ->name('usermanagement.status');

    Route::delete('/usermanagement/{user}', [UserManagementController::class, 'destroy'])
        ->name('usermanagement.destroy');
});

Route::middleware(['auth', 'role:employee'])->prefix('employee')->group(function () {
    Route::get('/dashboard', function (Request $request) {
        $user = $request->user();
        $user->loadMissing('supervisor');
        $monthStart = now()->startOfMonth();
        $monthEnd = now()->endOfMonth();

        $monthEntriesQuery = WorkEntry::query()
            ->with(['creator'])
            ->where('employee_id', $user?->id)
            ->whereBetween('work_date', [$monthStart, $monthEnd]);

        $recentEntries = WorkEntry::query()
            ->with(['creator'])
            ->where('employee_id', $user?->id)
            ->whereBetween('work_date', [$monthStart, $monthEnd])
            ->latest('work_date')
            ->latest('id')
            ->take(5)
            ->get()
            ->loadCount('comments');

        $recentComments = WorkEntryComment::query()
            ->with(['user', 'workEntry.employee'])
            ->whereHas('workEntry', function ($query) use ($user): void {
                $query->where('employee_id', $user?->id)
                    ->whereBetween('work_date', [now()->startOfMonth(), now()->endOfMonth()]);
            })
            ->latest('created_at')
            ->take(5)
            ->get();

        $commentCountQuery = WorkEntryComment::query()
            ->whereHas('workEntry', function ($query) use ($user): void {
                $query->where('employee_id', $user?->id)
                    ->whereBetween('work_date', [now()->startOfMonth(), now()->endOfMonth()]);
            });

        return view('employee.dashboard', [
            'monthLabel' => now()->format('m.Y'),
            'supervisor' => $user?->supervisor,
            'daysCount' => (clone $monthEntriesQuery)
                ->get()
                ->pluck('work_date')
                ->map(fn ($date) => $date->format('Y-m-d'))
                ->unique()
                ->count(),
            'totalHours' => (float) (clone $monthEntriesQuery)->sum('hours_worked'),
            'commentCount' => (clone $commentCountQuery)
                ->count(),
            'recentEntries' => $recentEntries,
            'recentComments' => $recentComments,
        ]);
    })->name('employee.dashboard');
});

Route::middleware('auth')->group(function () {
    Route::post('/work-entries/{workEntry}/comments', [WorkEntryCommentController::class, 'store'])
        ->name('work-entries.comments.store');

    Route::resource('work-entries', WorkEntryController::class);

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
