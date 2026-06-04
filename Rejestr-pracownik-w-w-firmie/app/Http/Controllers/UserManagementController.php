<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Database\Eloquent\Collection;
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
                ->with('supervisor')
                ->orderByDesc('id')
                ->paginate(10),
            'supervisors' => $this->activeSupervisors(),
            'activeAdminCount' => User::query()
                ->where('role', 'admin')
                ->where('is_active', true)
                ->count(),
        ]);
    }

    public function create(Request $request): View
    {
        return view('usermanagement-create', [
            'supervisors' => $this->activeSupervisors(),
        ]);
    }

    public function store(Request $request): RedirectResponse
    {
        if ($request->user()?->role !== 'admin') {
            abort(403);
        }

        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:users,email'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'role' => ['required', Rule::in(['employee', 'supervisor', 'admin'])],
            'supervisor_id' => [
                'nullable',
                'integer',
                Rule::exists('users', 'id')->where(function ($query): void {
                    $query->where('role', 'supervisor')
                        ->where('is_active', true);
                }),
            ],
        ], [
            'supervisor_id.exists' => 'Wybrany przełożony musi istnieć, być aktywny i nie może wskazywać tego samego konta.',
        ]);

        User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
            'role' => $validated['role'],
            'supervisor_id' => $validated['supervisor_id'] ?? null,
            'is_active' => true,
        ]);

        return redirect()
            ->route('usermanagement')
            ->with('status', 'Użytkownik został utworzony.');
    }

    public function updateSupervisor(Request $request, User $user): RedirectResponse
    {
        if ($request->user()?->role !== 'admin') {
            abort(403);
        }

        $validated = $request->validate([
            'supervisor_id' => [
                'nullable',
                'integer',
                Rule::exists('users', 'id')->where(function ($query) use ($user): void {
                    $query->where('role', 'supervisor')
                        ->where('is_active', true)
                        ->where('id', '!=', $user->id);
                }),
            ],
        ], [
            'supervisor_id.exists' => 'Wybrany przełożony musi istnieć, być aktywny i nie może wskazywać tego samego konta.',
        ]);

        $user->update([
            'supervisor_id' => $validated['supervisor_id'] ?? null,
        ]);

        return back()->with('status', $validated['supervisor_id']
            ? 'Przełożony został przypisany.'
            : 'Przełożony został usunięty.');
    }

    public function toggleStatus(Request $request, User $user): RedirectResponse
    {
        if ($request->user()?->role !== 'admin') {
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
        if ($request->user()?->role !== 'admin') {
            abort(403);
        }

        if ($user->id === $request->user()?->id) {
            abort(422, 'Nie możesz usunąć własnego konta.');
        }

        if ($user->role === 'admin' && $user->is_active) {
            $otherActiveAdmins = User::query()
                ->where('role', 'admin')
                ->where('is_active', true)
                ->whereKeyNot($user->id)
                ->exists();

            if (! $otherActiveAdmins) {
                return back()->withErrors([
                    'user' => 'Nie można usunąć ostatniego aktywnego administratora. W systemie musi pozostać co najmniej jeden aktywny administrator.',
                ]);
            }
        }

        if ($user->role === 'supervisor' && $user->employees()->whereKeyNot($user->id)->exists()) {
            return back()->withErrors([
                'user' => 'Tego przełożonego nie można usunąć, ponieważ ma przypisanych pracowników. Najpierw przypisz ich do innego przełożonego albo usuń powiązania.',
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

    /**
     * @return \Illuminate\Database\Eloquent\Collection<int, User>
     */
    private function activeSupervisors(): Collection
    {
        return User::query()
            ->where('role', 'supervisor')
            ->where('is_active', true)
            ->orderBy('name')
            ->get();
    }
}
