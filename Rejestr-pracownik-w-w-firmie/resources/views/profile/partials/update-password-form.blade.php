<section class="ui-panel">
    <header class="ui-panel-header">
        <h2>Zmień hasło</h2>
        <p>Użyj silnego hasła, aby zabezpieczyć konto.</p>
    </header>

    <form method="post" action="{{ route('password.update') }}" class="ui-form" style="margin-top: 0;">
        @csrf
        @method('put')

        <div class="ui-field">
            <x-input-label for="update_password_current_password" value="Aktualne hasło" />
            <x-text-input id="update_password_current_password" name="current_password" type="password" autocomplete="current-password" />
            <x-input-error :messages="$errors->updatePassword->get('current_password')" />
        </div>

        <div class="ui-field">
            <x-input-label for="update_password_password" value="Nowe hasło" />
            <x-text-input id="update_password_password" name="password" type="password" autocomplete="new-password" />
            <x-input-error :messages="$errors->updatePassword->get('password')" />
        </div>

        <div class="ui-field">
            <x-input-label for="update_password_password_confirmation" value="Potwierdź hasło" />
            <x-text-input id="update_password_password_confirmation" name="password_confirmation" type="password" autocomplete="new-password" />
            <x-input-error :messages="$errors->updatePassword->get('password_confirmation')" />
        </div>

        <div class="ui-actions">
            <x-primary-button>Zapisz</x-primary-button>

            @if (session('status'))
                <p
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 2000)"
                    class="ui-meta"
                >{{ session('status') }}</p>
            @endif
        </div>
    </form>
</section>
