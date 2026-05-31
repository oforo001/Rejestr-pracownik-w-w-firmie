<x-guest-layout>
    <div class="ui-field" style="margin-top: 0;">
        <h1 class="ui-auth-title">Nowe hasło</h1>
        <p class="ui-auth-lead">Ustaw nowe, bezpieczne hasło do swojego konta.</p>
    </div>

    <x-auth-session-status class="mt-4" :status="session('status')" />

    <form method="POST" action="{{ route('password.store') }}" class="ui-form">
        @csrf

        <div class="ui-field">
            <x-input-label for="email" value="E-mail" />
            <x-text-input id="email" type="email" name="email" :value="old('email', $email)" required autofocus autocomplete="username" readonly />
            <x-input-error :messages="$errors->get('email')" />
        </div>

        <div class="ui-field">
            <x-input-label for="password" value="Hasło" />
            <x-text-input id="password" type="password" name="password" required autocomplete="new-password" />
            <x-input-error :messages="$errors->get('password')" />
        </div>

        <div class="ui-field">
            <x-input-label for="password_confirmation" value="Potwierdź hasło" />
            <x-text-input id="password_confirmation" type="password" name="password_confirmation" required autocomplete="new-password" />
            <x-input-error :messages="$errors->get('password_confirmation')" />
        </div>

        <div class="ui-actions ui-actions--right">
            <x-primary-button>
                Zapisz nowe hasło
            </x-primary-button>
        </div>
    </form>

    <div class="ui-footer">
        <span>Wróć do logowania</span>
        <a class="ui-btn ui-btn-secondary" href="{{ route('login') }}">Zaloguj się</a>
    </div>
</x-guest-layout>
