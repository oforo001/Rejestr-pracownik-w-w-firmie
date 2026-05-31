<x-guest-layout>
    <div class="ui-field" style="margin-top: 0;">
        <h1 class="ui-auth-title">Potwierdzenie hasła</h1>
        <p class="ui-auth-lead">Potwierdź hasło, aby kontynuować.</p>
    </div>

    <form method="POST" action="{{ route('password.confirm') }}" class="ui-form">
        @csrf

        <div class="ui-field">
            <x-input-label for="password" value="Hasło" />
            <x-text-input id="password" type="password" name="password" required autocomplete="current-password" />
            <x-input-error :messages="$errors->get('password')" />
        </div>

        <div class="ui-actions ui-actions--right">
            <x-primary-button>
                Potwierdź
            </x-primary-button>
        </div>
    </form>

    <div class="ui-footer">
        <span>Wróć do pulpitu</span>
        <a class="ui-btn-link" href="{{ route('dashboard') }}">Pulpit</a>
    </div>
</x-guest-layout>
