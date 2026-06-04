<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col gap-1">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Panel zarządzania
            </h2>
            <p class="text-sm text-gray-500">
                Widok dla {{ $roleLabel }} do kontroli godzin, użytkowników i komentarzy.
            </p>
        </div>
    </x-slot>

    @php
        $hoursLabel = number_format((float) $totalHours, 2, ',', ' ');
        $scopeLabel = $isSupervisor ? 'Twoi pracownicy' : 'Wszyscy pracownicy';
        $scopeLead = $isSupervisor
            ? 'Pokazujemy tylko osoby przypisane do Twojego konta oraz ich wpisy.'
            : 'Masz pełny podgląd całej organizacji, wszystkich wpisów i komentarzy.';
    @endphp

    <div class="ui-dashboard">
        <div class="ui-dashboard-grid">
            <section class="ui-hero-card">
                <div class="ui-hero-grid">
                    <div>
                        <span class="ui-kicker">{{ $roleLabel }} · zakres pracy</span>
                        <h3 class="ui-hero-title">Ekran startowy do obsługi godzin pracy i historii dni w miesiącu.</h3>
                        <p class="ui-hero-lead">
                            {{ $scopeLead }} Dodawaj nowe wpisy, sprawdzaj komentarze i przechodź bezpośrednio do użytkowników lub listy godzin.
                        </p>

                        <div class="ui-chip-row">
                            <a href="{{ route('work-entries.index') }}" class="ui-chip">Wpisy czasu pracy</a>
                            <a href="{{ route('work-entries.create') }}" class="ui-chip">Dodaj wpis</a>
                            @if ($roleLabel === 'Administrator')
                                <a href="{{ route('usermanagement') }}" class="ui-chip">Użytkownicy</a>
                            @endif
                        </div>
                    </div>

                    <div class="ui-summary-grid">
                        <div class="ui-surface-card ui-section-card">
                            <p class="ui-stat-label">Zakres</p>
                            <p class="ui-stat-value">{{ $scopeLabel }}</p>
                            <p class="ui-stat-note">{{ $roleLabel === 'Administrator' ? 'Pełny dostęp do wszystkich danych.' : 'Tylko przypisani pracownicy i ich wpisy.' }}</p>
                        </div>

                        <div class="ui-surface-card ui-section-card">
                            <p class="ui-stat-label">Bieżący miesiąc</p>
                            <p class="ui-stat-value">{{ now()->format('m.Y') }}</p>
                            <p class="ui-stat-note">Szybki podgląd do rozliczenia godzin.</p>
                        </div>
                    </div>
                </div>
            </section>

            <section class="ui-stat-grid">
                <article class="ui-stat-card">
                    <p class="ui-stat-label">Pracownicy</p>
                    <p class="ui-stat-value">{{ $employeeCount }}</p>
                    <p class="ui-stat-note">Liczba osób w Twoim zakresie widoczności.</p>
                </article>

                <article class="ui-stat-card">
                    <p class="ui-stat-label">Wpisy</p>
                    <p class="ui-stat-value">{{ $workEntryCount }}</p>
                    <p class="ui-stat-note">Wpisy dodane w bieżącym miesiącu.</p>
                </article>

                <article class="ui-stat-card">
                    <p class="ui-stat-label">Godziny</p>
                    <p class="ui-stat-value">{{ $hoursLabel }}</p>
                    <p class="ui-stat-note">Suma godzin w bieżącym miesiącu.</p>
                </article>

                <article class="ui-stat-card">
                    <p class="ui-stat-label">Komentarze</p>
                    <p class="ui-stat-value">{{ $commentCount }}</p>
                    <p class="ui-stat-note">Uwagi wpisane do dostępnych dni pracy.</p>
                </article>
            </section>

            <section class="ui-split-grid">
                <div class="ui-surface-card ui-section-card">
                    <div class="ui-section-head">
                        <div>
                            <h3>Ostatnie wpisy czasu pracy</h3>
                            <p>Najświeższe dni z godzinami i liczbą komentarzy.</p>
                        </div>

                        <a href="{{ route('work-entries.index') }}" class="ui-chip">Pełna lista</a>
                    </div>

                    @if ($recentEntries->isNotEmpty())
                        <div class="ui-list">
                            @foreach ($recentEntries as $entry)
                                <article class="ui-list-item">
                                    <div>
                                        <p class="ui-list-item__title">{{ $entry->employee->name }}</p>
                                        <p class="ui-list-item__meta">
                                            {{ $entry->work_date->format('d.m.Y') }} · dodany przez {{ $entry->creator->name }}
                                        </p>
                                    </div>

                                    <div class="ui-list-item__side">
                                        <div>{{ number_format((float) $entry->hours_worked, 2, ',', ' ') }} h</div>
                                        <div class="ui-list-item__meta">{{ $entry->comments_count }} komentarzy</div>
                                        <a href="{{ route('work-entries.show', $entry) }}" class="ui-btn-link">Szczegóły</a>
                                    </div>
                                </article>
                            @endforeach
                        </div>
                    @else
                        <div class="ui-empty-state">
                            Brak wpisów w tym miesiącu dla Twojego zakresu. Gdy pojawi się pierwszy dzień pracy, zobaczysz go tutaj.
                        </div>
                    @endif
                </div>

                <div class="ui-surface-card ui-section-card">
                    <div class="ui-section-head">
                        <div>
                            <h3>Najnowsze komentarze</h3>
                            <p>Szybkie wejście do dnia pracy z dodaną uwagą.</p>
                        </div>
                    </div>

                    @if ($recentComments->isNotEmpty())
                        <div class="ui-list">
                            @foreach ($recentComments as $comment)
                                <article class="ui-list-item">
                                    <div>
                                        <p class="ui-list-item__title">{{ $comment->workEntry->employee->name }}</p>
                                        <p class="ui-list-item__meta">
                                            {{ $comment->workEntry->work_date->format('d.m.Y') }} · {{ $comment->user->name }}
                                        </p>
                                    </div>

                                    <div class="ui-list-item__side">
                                        <a href="{{ route('work-entries.show', $comment->workEntry) }}" class="ui-btn-link">Otwórz wpis</a>
                                    </div>
                                </article>
                            @endforeach
                        </div>
                    @else
                        <div class="ui-empty-state">
                            Brak komentarzy w Twoim zakresie. Ta sekcja wypełni się, gdy pracownicy lub moderatorzy zaczną dopisywać uwagi do dni pracy.
                        </div>
                    @endif

                    <div class="ui-section-head" style="margin-top: 1.1rem;">
                        <div>
                            <h3>Krótka droga</h3>
                            <p>Najczęstsze akcje bez przeklikiwania całej nawigacji.</p>
                        </div>
                    </div>

                    <div class="ui-summary-grid">
                        <a href="{{ route('work-entries.create') }}" class="ui-quick-link">
                            <div>
                                <strong>Dodaj nowy wpis</strong>
                                <span>Wprowadź godziny dla pracownika w kilku krokach.</span>
                            </div>
                            <span>→</span>
                        </a>

                        <a href="{{ route('work-entries.index') }}" class="ui-quick-link">
                            <div>
                                <strong>Historia godzin</strong>
                                <span>Przejdź do pełnej listy wpisów i szczegółów dnia.</span>
                            </div>
                            <span>→</span>
                        </a>

                        @if ($roleLabel === 'Administrator')
                            <a href="{{ route('usermanagement') }}" class="ui-quick-link">
                                <div>
                                    <strong>Zarządzanie kontami</strong>
                                    <span>Twórz użytkowników i kontroluj statusy kont.</span>
                                </div>
                                <span>→</span>
                            </a>
                        @endif
                    </div>
                </div>
            </section>
        </div>
    </div>
</x-app-layout>
