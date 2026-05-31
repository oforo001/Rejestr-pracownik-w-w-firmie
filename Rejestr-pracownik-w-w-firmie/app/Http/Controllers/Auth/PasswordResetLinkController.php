<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class PasswordResetLinkController extends Controller
{
    /**
     * Display the password reset email form.
     */
    public function create(): View
    {
        return view('auth.forgot-password');
    }

    /**
     * Verify that the email exists and move to the reset form.
     */
    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'email' => ['required', 'email'],
        ]);

        $userExists = User::query()
            ->where('email', $validated['email'])
            ->exists();

        if (! $userExists) {
            return back()
                ->withInput($request->only('email'))
                ->withErrors([
                    'email' => 'Nie znaleziono konta dla podanego adresu e-mail.',
                ]);
        }

        return redirect()
            ->route('password.reset', ['email' => $validated['email']])
            ->with('status', 'Adres e-mail został zweryfikowany. Ustaw nowe hasło.');
    }
}
