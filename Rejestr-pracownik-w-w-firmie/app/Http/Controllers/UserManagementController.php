<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class UserManagementController extends Controller
{
    public function index(Request $request): View
    {
        return view('usermanagement', [
            'users' => User::query()
                ->orderByDesc('id')
                ->paginate(10),
        ]);
    }

    public function create(Request $request): View
    {
        return view('usermanagement-create');
    }

    public function store(Request $request): RedirectResponse
    {
        if (! in_array($request->user()?->role, ['admin', 'supervisor'], true)) {
            abort(403);
        }

        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:users,email'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'role' => ['required', Rule::in(['employee', 'supervisor', 'admin'])],
        ]);

        User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
            'role' => $validated['role'],
            'is_active' => true,
        ]);

        return redirect()
            ->route('usermanagement')
            ->with('status', 'Użytkownik został utworzony.');
    }

    public function toggleStatus(Request $request, User $user): RedirectResponse
    {
        if (! in_array($request->user()?->role, ['admin', 'supervisor'], true)) {
            abort(403);
        }

        if ($user->id === $request->user()?->id) {
            abort(422, 'Nie możesz zmienić statusu własnego konta.');
        }

        $user->update([
            'is_active' => ! $user->is_active,
        ]);

        return back()->with('status', $user->is_active ? 'Konto zostało aktywowane.' : 'Konto zostało zdezaktywowane.');
    }

    public function destroy(Request $request, User $user): RedirectResponse
    {
        if (! in_array($request->user()?->role, ['admin', 'supervisor'], true)) {
            abort(403);
        }

        if ($user->id === $request->user()?->id) {
            abort(422, 'Nie możesz usunąć własnego konta.');
        }

        if ($user->role === 'supervisor') {
            return back()->withErrors([
                'user' => 'Konta przełożonego nie można usunąć. Możesz je tylko zdezaktywować.',
            ]);
        }

        if ($user->createdWorkEntries()->exists()) {
            return back()->withErrors([
                'user' => 'To konto utworzyło wpisy czasu pracy i nie może zostać usunięte. Użyj dezaktywacji.',
            ]);
        }

        $user->delete();

        return back()->with('status', 'Konto zostało usunięte.');
    }
}
