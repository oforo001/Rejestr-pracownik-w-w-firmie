<x-guest-layout>
    <div class="ui-field" style="margin-top: 0;">
        <h1 class="ui-auth-title">Resetowanie hasła</h1>
        <p class="ui-auth-lead">Podaj swój adres e-mail. Jeśli konto istnieje, przejdziesz do ustawienia nowego hasła.</p>
    </div>

    <x-auth-session-status class="mt-4" :status="session('status')" />

    <form method="POST" action="{{ route('password.email') }}" class="ui-form">
        @csrf

        <div class="ui-field">
            <x-input-label for="email" value="E-mail" />
            <x-text-input id="email" type="email" name="email" :value="old('email')" required autofocus />
            <x-input-error :messages="$errors->get('email')" />
        </div>

        <div class="ui-actions ui-actions--right">
            <x-primary-button>
                Sprawdź konto
            </x-primary-button>
        </div>
    </form>

    <div class="ui-footer">
        <span>Wróć do logowania</span>
        <a class="ui-btn ui-btn-secondary" href="{{ route('login') }}">
            Zaloguj się
        </a>
    </div>
</x-guest-layout>
