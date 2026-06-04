<style>
    .ed-page {
        padding: 1.25rem 1rem 3rem;
        color: #1f2937;
    }

    .ed-shell {
        width: min(100%, 1220px);
        margin: 0 auto;
        display: grid;
        gap: 1rem;
    }

    .ed-card {
        border: 1px solid #b8c1cc;
        background: #f8fafc;
        box-shadow: 0 8px 20px rgba(15, 23, 42, 0.05);
    }

    .ed-card__head {
        padding: 1rem 1.1rem;
        border-bottom: 1px solid #cfd6df;
        background: #edf1f5;
    }

    .ed-kicker {
        display: inline-flex;
        align-items: center;
        gap: 0.45rem;
        margin-bottom: 0.45rem;
        color: #5b6472;
        font-size: 0.75rem;
        font-weight: 700;
        letter-spacing: 0.08em;
        text-transform: uppercase;
    }

    .ed-title {
        margin: 0;
        color: #14233a;
        font-size: 1.2rem;
        font-weight: 700;
        line-height: 1.25;
    }

    .ed-lead {
        margin: 0.35rem 0 0;
        color: #5b6472;
        font-size: 0.9rem;
        line-height: 1.5;
        max-width: 72ch;
    }

    .ed-body {
        padding: 1rem 1.1rem 1.15rem;
    }

    .ed-top {
        display: grid;
        grid-template-columns: minmax(0, 1.5fr) minmax(290px, 0.9fr);
        gap: 1rem;
        align-items: start;
    }

    .ed-actions {
        display: flex;
        flex-wrap: wrap;
        gap: 0.5rem;
        margin-top: 0.95rem;
    }

    .ed-link {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        min-height: 38px;
        padding: 0.45rem 0.8rem;
        border: 1px solid #aeb8c7;
        border-radius: 3px;
        background: #fff;
        color: #243447;
        font-size: 0.88rem;
        font-weight: 700;
        text-decoration: none;
        white-space: nowrap;
    }

    .ed-link:hover {
        background: #eef2f6;
    }

    .ed-summary {
        display: grid;
        gap: 0.65rem;
    }

    .ed-kv {
        display: flex;
        align-items: flex-start;
        justify-content: space-between;
        gap: 1rem;
        padding: 0.72rem 0.8rem;
        border: 1px solid #d5dbe3;
        background: #fff;
    }

    .ed-kv dt {
        margin: 0;
        color: #5b6472;
        font-size: 0.78rem;
        font-weight: 700;
        letter-spacing: 0.06em;
        text-transform: uppercase;
    }

    .ed-kv dd {
        margin: 0;
        color: #14233a;
        font-size: 0.95rem;
        font-weight: 700;
        text-align: right;
    }

    .ed-note {
        margin-top: 0.7rem;
        color: #6b7280;
        font-size: 0.82rem;
        line-height: 1.45;
    }

    .ed-grid-4 {
        display: grid;
        gap: 0.75rem;
        grid-template-columns: repeat(4, minmax(0, 1fr));
    }

    .ed-stat {
        padding: 0.95rem 1rem;
        border: 1px solid #d5dbe3;
        background: #fff;
    }

    .ed-stat__label {
        margin: 0;
        color: #64748b;
        font-size: 0.72rem;
        font-weight: 700;
        letter-spacing: 0.08em;
        text-transform: uppercase;
    }

    .ed-stat__value {
        margin: 0.45rem 0 0;
        color: #14233a;
        font-size: 1.35rem;
        font-weight: 700;
        line-height: 1;
    }

    .ed-stat__note {
        margin: 0.35rem 0 0;
        color: #6b7280;
        font-size: 0.82rem;
        line-height: 1.45;
    }

    .ed-split {
        display: grid;
        gap: 1rem;
        grid-template-columns: minmax(0, 1.4fr) minmax(300px, 1fr);
    }

    .ed-table {
        width: 100%;
        border-collapse: collapse;
    }

    .ed-table th,
    .ed-table td {
        padding: 0.78rem 0.82rem;
        border-bottom: 1px solid #d9dfe6;
        vertical-align: top;
    }

    .ed-table th {
        background: #eef2f6;
        color: #64748b;
        font-size: 0.72rem;
        font-weight: 700;
        letter-spacing: 0.08em;
        text-transform: uppercase;
        text-align: left;
    }

    .ed-table tbody tr:hover {
        background: #f8fafc;
    }

    .ed-table--compact td {
        font-size: 0.88rem;
    }

    .ed-badge {
        display: inline-flex;
        align-items: center;
        padding: 0.3rem 0.55rem;
        border: 1px solid #c8d0da;
        border-radius: 999px;
        background: #fff;
        color: #334155;
        font-size: 0.76rem;
        font-weight: 700;
        line-height: 1;
        white-space: nowrap;
    }

    .ed-empty {
        padding: 0.95rem 1rem;
        border: 1px dashed #cbd5e1;
        background: #fff;
        color: #64748b;
        font-size: 0.88rem;
        line-height: 1.5;
    }

    .ed-comment {
        display: grid;
        gap: 0.6rem;
    }

    .ed-comment__item {
        padding: 0.85rem 0.9rem;
        border: 1px solid #d5dbe3;
        background: #fff;
    }

    .ed-comment__title {
        margin: 0;
        color: #14233a;
        font-size: 0.9rem;
        font-weight: 700;
    }

    .ed-comment__meta {
        margin: 0.25rem 0 0;
        color: #6b7280;
        font-size: 0.8rem;
        line-height: 1.45;
    }

    .ed-comment__text {
        margin: 0.55rem 0 0;
        color: #1f2937;
        font-size: 0.88rem;
        line-height: 1.55;
        white-space: pre-wrap;
    }

    .ed-form {
        display: grid;
        gap: 0.7rem;
        padding: 0.9rem 1rem 1rem;
        border: 1px solid #d5dbe3;
        background: #fff;
    }

    .ed-label {
        color: #243447;
        font-size: 0.88rem;
        font-weight: 700;
    }

    .ed-textarea {
        width: 100%;
        min-height: 110px;
        border: 1px solid #b9c3cf;
        border-radius: 3px;
        background: #fff;
        color: #14233a;
        padding: 0.55rem 0.7rem;
        font-size: 0.9rem;
        resize: vertical;
        box-sizing: border-box;
    }

    .ed-textarea:focus {
        outline: none;
        border-color: #7c8796;
        box-shadow: 0 0 0 2px rgba(124, 135, 150, 0.18);
    }

    .ed-form-actions {
        display: flex;
        justify-content: flex-end;
        gap: 0.5rem;
    }

    .ed-submit {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        min-height: 38px;
        padding: 0.45rem 0.85rem;
        border: 1px solid #364152;
        border-radius: 3px;
        background: linear-gradient(180deg, #4b5563, #374151);
        color: #fff;
        font-size: 0.88rem;
        font-weight: 700;
        cursor: pointer;
    }

    .ed-submit:hover {
        background: linear-gradient(180deg, #55616f, #414955);
    }

    .ed-alert {
        margin-bottom: 0.85rem;
        padding: 0.8rem 0.9rem;
        border: 1px solid #d5dbe3;
        background: #fff;
        color: #334155;
        font-size: 0.88rem;
    }

    .ed-alert--success {
        border-color: #b7e4c7;
        background: #f0fdf4;
        color: #166534;
    }

    @media (max-width: 980px) {
        .ed-top,
        .ed-split {
            grid-template-columns: 1fr;
        }

        .ed-grid-4 {
            grid-template-columns: repeat(2, minmax(0, 1fr));
        }
    }

    @media (max-width: 640px) {
        .ed-page {
            padding-inline: 0.75rem;
        }

        .ed-grid-4 {
            grid-template-columns: 1fr;
        }

        .ed-table th,
        .ed-table td {
            padding-inline: 0.65rem;
        }
    }
</style>

<x-app-layout>
    @php
        $hoursLabel = number_format((float) $totalHours, 2, ',', ' ');
        $lastEntry = $recentEntries->first();
        $supervisorName = $supervisor?->name ?? 'Brak przypisanego przełożonego';
        $supervisorMeta = 'Przełożony zostanie przypisany przez administratora.';
    @endphp

    <div class="ed-page">
        <div class="ed-shell">
            <section class="ed-card">
                <div class="ed-card__head">
                    <div class="ed-kicker">Panel pracownika · {{ $monthLabel }}</div>
                    <h2 class="ed-title">Panel pracownika</h2>
                    <p class="ed-lead">
                        Podgląd miesięcznej historii, przypisanego przełożonego oraz komentarzy do konkretnych dni.
                    </p>
                </div>

                <div class="ed-body">
                    <div class="ed-top">
                        <div>
                            <div class="ed-grid-4">
                                <article class="ed-stat">
                                    <p class="ed-stat__label">Godziny</p>
                                    <p class="ed-stat__value">{{ $hoursLabel }}</p>
                                    <p class="ed-stat__note">Łącznie w bieżącym miesiącu.</p>
                                </article>

                                <article class="ed-stat">
                                    <p class="ed-stat__label">Dni pracy</p>
                                    <p class="ed-stat__value">{{ $daysCount }}</p>
                                    <p class="ed-stat__note">Unikalne dni z wpisem.</p>
                                </article>

                                <article class="ed-stat">
                                    <p class="ed-stat__label">Komentarze</p>
                                    <p class="ed-stat__value">{{ $commentCount }}</p>
                                    <p class="ed-stat__note">Uwagi dodane do Twoich dni.</p>
                                </article>

                                <article class="ed-stat">
                                    <p class="ed-stat__label">Ostatni wpis</p>
                                    <p class="ed-stat__value">{{ $lastEntry ? $lastEntry->work_date->format('d.m.Y') : 'Brak' }}</p>
                                    <p class="ed-stat__note">
                                        {{ $lastEntry ? 'Dodany przez ' . $lastEntry->creator->name : 'Brak zapisanych dni pracy.' }}
                                    </p>
                                </article>
                            </div>

                            <div class="ed-actions">
                                <a href="{{ route('work-entries.index') }}" class="ed-link">Historia wpisów</a>
                                <a href="{{ route('profile.edit') }}" class="ed-link">Profil i hasło</a>
                            </div>
                        </div>

                        <aside class="ed-summary">
                            <dl class="ed-kv">
                                <dt>Przełożony</dt>
                                <dd>{{ $supervisorName }}</dd>
                            </dl>

                            <div class="ed-empty">
                                {{ $supervisorMeta }}
                                @if (! $supervisor)
                                    <br>
                                    W tym widoku nie zmieniasz przypisania przełożonego. To robi administrator.
                                @endif
                            </div>

                            <dl class="ed-kv">
                                <dt>Wpis miesiąca</dt>
                                <dd>{{ $lastEntry ? $lastEntry->creator->name : 'Brak danych' }}</dd>
                            </dl>
                        </aside>
                    </div>
                </div>
            </section>

            <section class="ed-split">
                <div class="ed-card">
                    <div class="ed-card__head">
                        <h3 class="ed-title" style="font-size: 1rem;">Historia dni w miesiącu</h3>
                        <p class="ed-lead">Najświeższe wpisy z bieżącego miesiąca. Pełną listę znajdziesz w historii wpisów.</p>
                    </div>

                    <div class="ed-body">
                        @if ($recentEntries->isNotEmpty())
                            <table class="ed-table ed-table--compact">
                                <thead>
                                    <tr>
                                        <th>Data</th>
                                        <th>Godziny</th>
                                        <th>Utworzył</th>
                                        <th>Komentarze</th>
                                        <th>Akcja</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($recentEntries as $entry)
                                        <tr>
                                            <td>{{ $entry->work_date->format('d.m.Y') }}</td>
                                            <td>{{ number_format((float) $entry->hours_worked, 2, ',', ' ') }} h</td>
                                            <td>{{ $entry->creator->name }}</td>
                                            <td><span class="ed-badge">{{ $entry->comments_count }}</span></td>
                                            <td><a href="{{ route('work-entries.show', $entry) }}" class="ed-link">Szczegóły</a></td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        @else
                            <div class="ed-empty">
                                Brak wpisów w bieżącym miesiącu. Po dodaniu pierwszego dnia pojawi się tutaj historia.
                            </div>
                        @endif
                    </div>
                </div>

                <div class="ed-card">
                    <div class="ed-card__head">
                        <h3 class="ed-title" style="font-size: 1rem;">Komentarze do dni</h3>
                        <p class="ed-lead">Tu widzisz uwagi dodane przez przełożonego, administratora lub Ciebie.</p>
                    </div>

                    <div class="ed-body">
                        @if ($recentComments->isNotEmpty())
                            <div class="ed-comment">
                                @foreach ($recentComments as $comment)
                                    <article class="ed-comment__item">
                                        <p class="ed-comment__title">{{ $comment->workEntry->work_date->format('d.m.Y') }}</p>
                                        <p class="ed-comment__meta">
                                            {{ $comment->user->name }} · {{ $comment->created_at->format('d.m.Y H:i') }}
                                        </p>
                                        <p class="ed-comment__text">
                                            {{ \Illuminate\Support\Str::limit($comment->comment, 180) }}
                                        </p>
                                        <div class="ed-actions" style="margin-top: 0.6rem;">
                                            <a href="{{ route('work-entries.show', $comment->workEntry) }}" class="ed-link">Otwórz wpis</a>
                                        </div>
                                    </article>
                                @endforeach
                            </div>
                        @else
                            <div class="ed-empty">
                                Na razie nie ma komentarzy do Twoich wpisów.
                            </div>
                        @endif
                    </div>
                </div>
            </section>
        </div>
    </div>
</x-app-layout>
