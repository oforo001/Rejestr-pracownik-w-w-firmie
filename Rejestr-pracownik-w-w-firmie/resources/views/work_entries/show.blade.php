<style>
    .we-page {
        padding: 1.25rem 1rem 3rem;
        color: #1f2937;
    }

    .we-shell {
        width: min(100%, 1120px);
        margin: 0 auto;
        display: grid;
        gap: 1rem;
    }

    .we-card {
        border: 1px solid #b8c1cc;
        background: #f8fafc;
        box-shadow: 0 8px 20px rgba(15, 23, 42, 0.05);
    }

    .we-card__head {
        padding: 1rem 1.1rem;
        border-bottom: 1px solid #cfd6df;
        background: #edf1f5;
    }

    .we-title {
        margin: 0;
        color: #14233a;
        font-size: 1.1rem;
        font-weight: 700;
        line-height: 1.25;
    }

    .we-lead {
        margin: 0.35rem 0 0;
        color: #5b6472;
        font-size: 0.9rem;
        line-height: 1.5;
    }

    .we-body {
        padding: 1rem 1.1rem 1.15rem;
    }

    .we-grid {
        display: grid;
        grid-template-columns: minmax(0, 1.2fr) minmax(300px, 0.8fr);
        gap: 1rem;
        align-items: start;
    }

    .we-details {
        display: grid;
        gap: 0.65rem;
    }

    .we-row {
        display: flex;
        justify-content: space-between;
        gap: 1rem;
        padding: 0.72rem 0.8rem;
        border: 1px solid #d5dbe3;
        background: #fff;
    }

    .we-row dt {
        color: #5b6472;
        font-size: 0.78rem;
        font-weight: 700;
        letter-spacing: 0.06em;
        text-transform: uppercase;
    }

    .we-row dd {
        margin: 0;
        color: #14233a;
        font-size: 0.92rem;
        font-weight: 700;
        text-align: right;
    }

    .we-actions {
        display: flex;
        flex-wrap: wrap;
        gap: 0.5rem;
        margin-top: 0.9rem;
    }

    .we-link {
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

    .we-link:hover {
        background: #eef2f6;
    }

    .we-badge {
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
    }

    .we-empty {
        padding: 0.95rem 1rem;
        border: 1px dashed #cbd5e1;
        background: #fff;
        color: #64748b;
        font-size: 0.88rem;
        line-height: 1.5;
    }

    .we-comments {
        display: grid;
        gap: 0.7rem;
    }

    .we-comment {
        padding: 0.85rem 0.9rem;
        border: 1px solid #d5dbe3;
        background: #fff;
    }

    .we-comment__title {
        margin: 0;
        color: #14233a;
        font-size: 0.9rem;
        font-weight: 700;
    }

    .we-comment__meta {
        margin: 0.25rem 0 0;
        color: #6b7280;
        font-size: 0.8rem;
    }

    .we-comment__text {
        margin: 0.55rem 0 0;
        color: #1f2937;
        font-size: 0.88rem;
        line-height: 1.55;
        white-space: pre-wrap;
    }

    .we-form {
        display: grid;
        gap: 0.7rem;
        padding: 0.9rem 1rem 1rem;
        border: 1px solid #d5dbe3;
        background: #fff;
    }

    .we-label {
        color: #243447;
        font-size: 0.88rem;
        font-weight: 700;
    }

    .we-textarea {
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

    .we-textarea:focus {
        outline: none;
        border-color: #7c8796;
        box-shadow: 0 0 0 2px rgba(124, 135, 150, 0.18);
    }

    .we-submit {
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

    .we-submit:hover {
        background: linear-gradient(180deg, #55616f, #414955);
    }

    .we-alert {
        margin-bottom: 0.85rem;
        padding: 0.8rem 0.9rem;
        border: 1px solid #d5dbe3;
        background: #fff;
        color: #334155;
        font-size: 0.88rem;
    }

    .we-alert--success {
        border-color: #b7e4c7;
        background: #f0fdf4;
        color: #166534;
    }

    @media (max-width: 980px) {
        .we-grid {
            grid-template-columns: 1fr;
        }
    }

    @media (max-width: 640px) {
        .we-page {
            padding-inline: 0.75rem;
        }
    }
</style>

<x-app-layout>
    @php
        $comments = $workEntry->comments;
    @endphp

    <div class="we-page">
        <div class="we-shell">
            <section class="we-card">
                <div class="we-card__head">
                    <h2 class="we-title">Szczegóły wpisu czasu pracy</h2>
                    <p class="we-lead">
                        Podgląd dnia, autora wpisu oraz komentarzy dodanych do tego samego dnia.
                    </p>
                </div>

                <div class="we-body">
                    @if (session('status'))
                        <div class="we-alert we-alert--success">{{ session('status') }}</div>
                    @endif

                    <div class="we-grid">
                        <div>
                            <dl class="we-details">
                                <div class="we-row">
                                    <dt>Pracownik</dt>
                                    <dd>{{ $workEntry->employee->name }}</dd>
                                </div>
                                <div class="we-row">
                                    <dt>Utworzył</dt>
                                    <dd>{{ $workEntry->creator->name }}</dd>
                                </div>
                                <div class="we-row">
                                    <dt>Data</dt>
                                    <dd>{{ $workEntry->work_date->format('d.m.Y') }}</dd>
                                </div>
                                <div class="we-row">
                                    <dt>Godziny</dt>
                                    <dd>{{ number_format((float) $workEntry->hours_worked, 2, ',', ' ') }} h</dd>
                                </div>
                                <div class="we-row">
                                    <dt>Opis dnia</dt>
                                    <dd>{{ $workEntry->comment ?? 'Brak' }}</dd>
                                </div>
                            </dl>

                            @if ($canManage)
                                <div class="we-actions">
                                    <a class="we-link" href="{{ route('work-entries.index') }}">Wróć</a>
                                    <a class="we-link" href="{{ route('work-entries.edit', $workEntry) }}">Edytuj</a>

                                    <form method="POST" action="{{ route('work-entries.destroy', $workEntry) }}">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="we-submit" onclick="return confirm('Czy na pewno chcesz usunąć ten wpis?')">
                                            Usuń
                                        </button>
                                    </form>
                                </div>
                            @else
                                <div class="we-actions">
                                    <a class="we-link" href="{{ route('work-entries.index') }}">Wróć</a>
                                </div>
                            @endif
                        </div>

                        <aside class="we-comments">
                            <div class="we-card" style="box-shadow:none;">
                                <div class="we-card__head">
                                    <h3 class="we-title" style="font-size: 1rem;">Komentarze do dnia</h3>
                                </div>

                                <div class="we-body">
                                    @if ($comments->isNotEmpty())
                                        <div class="we-comments">
                                            @foreach ($comments as $comment)
                                                <article class="we-comment">
                                                    <p class="we-comment__title">{{ $comment->user->name }}</p>
                                                    <p class="we-comment__meta">{{ $comment->created_at->format('d.m.Y H:i') }}</p>
                                                    <p class="we-comment__text">{{ $comment->comment }}</p>
                                                </article>
                                            @endforeach
                                        </div>
                                    @else
                                        <div class="we-empty">Brak komentarzy do tego dnia.</div>
                                    @endif
                                </div>
                            </div>

                            <div class="we-card" style="box-shadow:none;">
                                <div class="we-card__head">
                                    <h3 class="we-title" style="font-size: 1rem;">Dodaj komentarz</h3>
                                </div>

                                <div class="we-body">
                                    <form method="POST" action="{{ route('work-entries.comments.store', $workEntry) }}" class="we-form">
                                        @csrf

                                        <label for="comment" class="we-label">Treść komentarza</label>
                                        <textarea id="comment" name="comment" class="we-textarea" required>{{ old('comment') }}</textarea>
                                        @error('comment')
                                            <div class="we-alert">{{ $message }}</div>
                                        @enderror

                                        <div class="we-actions" style="margin-top: 0;">
                                            <button type="submit" class="we-submit">Zapisz komentarz</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </aside>
                    </div>
                </div>
            </section>
        </div>
    </div>
</x-app-layout>
