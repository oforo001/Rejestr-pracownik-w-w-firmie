@php
    $user = Auth::user();

    $roleLabel = match ($user?->role) {
        'admin' => 'Administrator',
        'supervisor' => 'Przełożony',
        default => 'Pracownik',
    };

    $sectionLabel = match ($user?->role) {
        'admin' => 'Zarządzanie użytkownikami',
        'supervisor' => 'Panel przełożonego',
        default => 'Panel pracownika',
    };

    $primaryNavLabel = match ($user?->role) {
        'admin' => 'Użytkownicy',
        default => 'Pulpit',
    };

    $primaryNavHref = match ($user?->role) {
        'admin' => route('usermanagement'),
        default => route('dashboard'),
    };

    $secondaryNavLabel = $user?->role === 'admin' ? 'Dodaj użytkownika' : 'Wpisy czasu pracy';
    $secondaryNavHref = $user?->role === 'admin' ? route('usermanagement.create') : route('work-entries.index');

    $primaryNavActive = $user?->role === 'admin'
        ? request()->routeIs('usermanagement*')
        : request()->routeIs('dashboard', 'employee.dashboard', 'supervisor.dashboard');

    $secondaryNavActive = $user?->role === 'admin'
        ? request()->routeIs('usermanagement.create')
        : request()->routeIs('work-entries.*');
@endphp

<nav class="ui-nav ui-nav--classic" aria-label="Nawigacja główna">
    <div class="ui-nav__shell">
        <div class="ui-nav__brand">
            <a href="{{ $primaryNavHref }}" class="ui-nav__brand-link">
                Rejestr pracowników
            </a>
            <div class="ui-nav__brand-copy">
                <span class="ui-nav__role-label">{{ $roleLabel }}</span>
                <span class="ui-nav__section-label">{{ $sectionLabel }}</span>
            </div>
        </div>

        <div class="ui-nav__links" aria-label="Skróty">
            <a href="{{ $primaryNavHref }}" class="ui-nav__tab {{ $primaryNavActive ? 'is-active' : '' }}">
                {{ $primaryNavLabel }}
            </a>
            <a href="{{ $secondaryNavHref }}" class="ui-nav__tab {{ $secondaryNavActive ? 'is-active' : '' }}">
                {{ $secondaryNavLabel }}
            </a>
        </div>

        <div class="ui-nav__account">
            <div class="ui-nav__identity">
                <span class="ui-nav__name">{{ $user?->name }}</span>
                <span class="ui-nav__email">{{ $user?->email }}</span>
            </div>

            <a href="{{ route('profile.edit') }}" class="ui-nav__action">
                Profil
            </a>

            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="ui-nav__action ui-nav__action--muted">
                    Wyloguj
                </button>
            </form>

            <details class="ui-nav__mobile-toggle">
                <summary class="ui-nav__menu-button" aria-label="Otwórz menu">
                    Menu
                </summary>

                <div class="ui-nav__mobile-panel">
                    <div class="ui-nav__mobile-meta">
                        <strong>{{ $user?->name }}</strong>
                        <span>{{ $user?->email }}</span>
                        <span>{{ $roleLabel }} · {{ $sectionLabel }}</span>
                    </div>

                    <a href="{{ $primaryNavHref }}" class="ui-nav__mobile-link {{ $primaryNavActive ? 'is-active' : '' }}">
                        {{ $primaryNavLabel }}
                    </a>
                    <a href="{{ $secondaryNavHref }}" class="ui-nav__mobile-link {{ $secondaryNavActive ? 'is-active' : '' }}">
                        {{ $secondaryNavLabel }}
                    </a>
                    <a href="{{ route('profile.edit') }}" class="ui-nav__mobile-link">
                        Profil
                    </a>

                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="ui-nav__mobile-link ui-nav__mobile-link--button">
                            Wyloguj
                        </button>
                    </form>
                </div>
            </details>
        </div>
    </div>
</nav>
