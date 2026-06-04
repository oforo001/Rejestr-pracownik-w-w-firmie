<?php

namespace App\Http\Controllers;

use App\Models\WorkEntry;
use App\Models\WorkEntryComment;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class WorkEntryCommentController extends Controller
{
    public function store(Request $request, WorkEntry $workEntry): RedirectResponse
    {
        $user = $request->user();

        if (! $this->canViewWorkEntry($user, $workEntry)) {
            abort(403);
        }

        $validated = $request->validate([
            'comment' => ['required', 'string', 'max:2000'],
        ]);

        WorkEntryComment::create([
            'work_entry_id' => $workEntry->id,
            'user_id' => $user->id,
            'comment' => $validated['comment'],
        ]);

        return back()->with('status', 'Komentarz został dodany.');
    }

    private function canViewWorkEntry(?User $user, WorkEntry $workEntry): bool
    {
        if (! $user) {
            return false;
        }

        if ($user->role === 'admin') {
            return true;
        }

        if ($user->role === 'employee') {
            return $workEntry->employee_id === $user->id;
        }

        if ($user->role === 'supervisor') {
            return $workEntry->employee?->supervisor_id === $user->id;
        }

        return false;
    }
}
