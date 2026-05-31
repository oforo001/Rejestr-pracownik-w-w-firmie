<section class="ui-panel">
    <header class="ui-panel-header">
        <h2>Informacje o profilu</h2>

        <p>Zaktualizuj dane swojego konta oraz adres e-mail.</p>
    </header>

    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

    <form method="post" action="{{ route('profile.update') }}" class="ui-form" style="margin-top: 0;">
        @csrf
        @method('patch')

        <div>
            <x-input-label for="name" value="Imię i nazwisko" />
            <x-text-input id="name" name="name" type="text" class="mt-1 block w-full" :value="old('name', $user->name)" required autofocus autocomplete="name" />
            <x-input-error class="mt-2" :messages="$errors->get('name')" />
        </div>

        <div>
            <x-input-label for="email" value="E-mail" />
            <x-text-input id="email" name="email" type="email" class="mt-1 block w-full" :value="old('email', $user->email)" required autocomplete="username" />
            <x-input-error class="mt-2" :messages="$errors->get('email')" />

            @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
                <div>
                    <p class="text-sm mt-2 text-gray-800">
                        Twój adres e-mail nie został zweryfikowany.

                        <button form="send-verification" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                            Kliknij tutaj, aby wysłać e-mail weryfikacyjny ponownie.
                        </button>
                    </p>

                    @if (session('status'))
                        <p class="mt-2 font-medium text-sm text-green-600">
                            {{ session('status') }}
                        </p>
                    @endif
                </div>
            @endif
        </div>

        <div class="ui-actions">
            <x-primary-button>Zapisz</x-primary-button>

            @if (session('status') === 'profile-updated')
                <p
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 2000)"
                    class="ui-meta"
                >Zapisano.</p>
            @endif
        </div>
    </form>
</section>
