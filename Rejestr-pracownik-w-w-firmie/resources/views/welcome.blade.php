<x-guest-layout>
    <div class="ui-field" style="margin-top: 0;">
        <h1 class="ui-auth-title">Witamy w Rejestrze pracowników</h1>
        <p class="ui-auth-lead">Zaloguj się lub utwórz konto pracownika, aby rozpocząć pracę z systemem.</p>
    </div>

    <div class="ui-actions">
        <a class="ui-btn ui-btn-secondary" href="{{ route('login') }}">Zaloguj się</a>

        @if (Route::has('register'))
            <a class="ui-btn ui-btn-primary" href="{{ route('register') }}">Rejestracja</a>
        @endif
    </div>
</x-guest-layout>
