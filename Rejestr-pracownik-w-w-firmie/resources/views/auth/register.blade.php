<x-guest-layout>
    <div class="ui-field" style="margin-top: 0;">
        <h1 class="ui-auth-title">Rejestracja</h1>
        <p class="ui-auth-lead">Nowe konto zostanie utworzone jako pracownik.</p>
    </div>

    <form method="POST" action="{{ route('register') }}" class="ui-form">
        @csrf

        <div class="ui-field">
            <x-input-label for="name" value="Imię i nazwisko" />
            <x-text-input id="name" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" />
        </div>

        <div class="ui-field">
            <x-input-label for="email" value="E-mail" />
            <x-text-input id="email" type="email" name="email" :value="old('email')" required autocomplete="username" />
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

        <div class="ui-actions">
            <a class="ui-btn ui-btn-secondary" href="{{ route('login') }}">Wróć do logowania</a>
            <x-primary-button>
                Zarejestruj konto
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
