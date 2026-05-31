<x-guest-layout>
    <div class="ui-field" style="margin-top: 0;">
        <h1 class="ui-auth-title">Logowanie</h1>
        <p class="ui-auth-lead">Zaloguj się, aby przejść do pulpitu odpowiedniego dla Twojej roli.</p>
    </div>

    <x-auth-session-status class="mt-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}" class="ui-form">
        @csrf

        <div class="ui-field">
            <x-input-label for="email" value="E-mail" />
            <x-text-input id="email" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" />
        </div>

        <div class="ui-field">
            <x-input-label for="password" value="Hasło" />
            <x-text-input id="password" type="password" name="password" required autocomplete="current-password" />
            <x-input-error :messages="$errors->get('password')" />
        </div>

        <div class="ui-actions">
            <label for="remember_me" class="ui-meta" style="display:flex; align-items:center; gap:8px;">
                <input id="remember_me" type="checkbox" name="remember">
                <span>Zapamiętaj mnie</span>
            </label>

            <x-primary-button>
                Zaloguj się
            </x-primary-button>
        </div>
    </form>

    <div class="ui-footer">
        <span>Nie masz konta?</span>
        @if (Route::has('register'))
            <a class="ui-btn-link" href="{{ route('register') }}">Zarejestruj się</a>
        @endif
    </div>

    @if (Route::has('password.request'))
        <div class="ui-footer" style="margin-top: 8px;">
            <span>Nie pamiętasz hasła?</span>
            <a class="ui-btn-link" href="{{ route('password.request') }}">Zresetuj je tutaj</a>
        </div>
    @endif
</x-guest-layout>
