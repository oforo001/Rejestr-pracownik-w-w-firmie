<x-guest-layout>
    <div class="ui-field" style="margin-top: 0;">
        <h1 class="ui-auth-title">Weryfikacja e-mail</h1>
        <p class="ui-auth-lead">Zanim rozpoczniesz pracę, potwierdź swój adres e-mail.</p>
    </div>

    <div class="ui-footer" style="margin-top: 16px;">
        <span>{{ __('Sprawdź skrzynkę pocztową i kliknij link weryfikacyjny.') }}</span>
    </div>

    @if (session('status'))
        <div class="ui-status mt-4">
            {{ session('status') }}
        </div>
    @endif

    <div class="ui-actions" style="margin-top: 20px;">
        <form method="POST" action="{{ route('verification.send') }}">
            @csrf

            <div>
                <x-primary-button>
                    Wyślij link ponownie
                </x-primary-button>
            </div>
        </form>

        <form method="POST" action="{{ route('logout') }}">
            @csrf

            <button type="submit" class="ui-btn-link">
                Wyloguj
            </button>
        </form>
    </div>
</x-guest-layout>
