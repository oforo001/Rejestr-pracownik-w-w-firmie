<style>
    .um-create-page {
        padding: 1.5rem 1rem 3rem;
    }

    .um-create-shell {
        width: min(100%, 880px);
        margin: 0 auto;
    }

    .um-create-card {
        border: 1px solid #c7ced8;
        background: #f8fafc;
        box-shadow: 0 10px 24px rgba(15, 23, 42, 0.06);
    }

    .um-create-head {
        display: flex;
        align-items: flex-start;
        justify-content: space-between;
        gap: 1rem;
        padding: 1rem 1.15rem;
        border-bottom: 1px solid #cfd6df;
        background: #edf1f5;
    }

    .um-create-title {
        margin: 0;
        color: #14233a;
        font-size: 1.08rem;
        font-weight: 700;
        line-height: 1.25;
    }

    .um-create-lead {
        margin: 0.25rem 0 0;
        color: #5b6472;
        font-size: 0.88rem;
        line-height: 1.45;
        max-width: 58ch;
    }

    .um-create-back {
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

    .um-create-back:hover {
        background: #eef2f6;
    }

    .um-create-form {
        display: grid;
        gap: 1rem;
        padding: 1rem 1.15rem 1.15rem;
    }

    .um-create-alert {
        border: 1px solid #d7a4a4;
        background: #fdf2f2;
        color: #9f1239;
        padding: 0.8rem 0.95rem;
        font-size: 0.9rem;
        line-height: 1.45;
    }

    .um-create-alert ul {
        margin: 0;
        padding-left: 1.1rem;
    }

    .um-create-grid {
        display: grid;
        gap: 0.85rem;
        grid-template-columns: repeat(2, minmax(0, 1fr));
    }

    .um-create-field {
        display: grid;
        gap: 0.35rem;
    }

    .um-create-field--full {
        grid-column: 1 / -1;
    }

    .um-create-label {
        color: #243447;
        font-size: 0.9rem;
        font-weight: 700;
    }

    .um-create-help {
        color: #6b7280;
        font-size: 0.8rem;
        line-height: 1.45;
    }

    .um-create-input,
    .um-create-select {
        width: 100%;
        min-height: 38px;
        border: 1px solid #b9c3cf;
        border-radius: 3px;
        background: #fff;
        color: #14233a;
        padding: 0.45rem 0.7rem;
        font-size: 0.92rem;
        box-sizing: border-box;
    }

    .um-create-input:focus,
    .um-create-select:focus {
        outline: none;
        border-color: #7c8796;
        box-shadow: 0 0 0 2px rgba(124, 135, 150, 0.18);
    }

    .um-create-select {
        appearance: auto;
    }

    .um-create-actions {
        display: flex;
        justify-content: flex-end;
        gap: 0.75rem;
        padding-top: 0.8rem;
        border-top: 1px solid #d4dbe3;
    }

    .um-create-submit {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        min-height: 40px;
        padding: 0.5rem 1rem;
        border: 1px solid #364152;
        border-radius: 3px;
        background: linear-gradient(180deg, #4b5563, #374151);
        color: #fff;
        font-size: 0.9rem;
        font-weight: 700;
        cursor: pointer;
    }

    .um-create-submit:hover {
        background: linear-gradient(180deg, #55616f, #414955);
    }

    .um-create-error {
        color: #b91c1c;
        font-size: 0.8rem;
        line-height: 1.4;
    }

    @media (max-width: 720px) {
        .um-create-page {
            padding-inline: 0.75rem;
        }

        .um-create-head {
            flex-direction: column;
        }

        .um-create-grid {
            grid-template-columns: 1fr;
        }

        .um-create-actions {
            justify-content: stretch;
        }

        .um-create-submit {
            width: 100%;
        }
    }
</style>

<x-app-layout>
    <div class="um-create-page">
        <div class="um-create-shell">
            <div class="um-create-card">
                <div class="um-create-head">
                    <div>
                        <h2 class="um-create-title">Utwórz użytkownika</h2>
                        <p class="um-create-lead">
                            Dodaj konto pracownika, przełożonego albo administratora. Przełożony jest opcjonalny.
                        </p>
                    </div>

                    <a href="{{ route('usermanagement') }}" class="um-create-back">
                        ← Powrót
                    </a>
                </div>

                <form method="POST" action="{{ route('usermanagement.store') }}" class="um-create-form">
                    @csrf

                    @if ($errors->any())
                        <div class="um-create-alert">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <div class="um-create-grid">
                        <div class="um-create-field">
                            <label for="name" class="um-create-label">Imię i nazwisko</label>
                            <input id="name"
                                   type="text"
                                   name="name"
                                   value="{{ old('name') }}"
                                   required
                                   autofocus
                                   class="um-create-input" />
                            <div class="um-create-error">
                                <x-input-error :messages="$errors->get('name')" />
                            </div>
                        </div>

                        <div class="um-create-field">
                            <label for="email" class="um-create-label">E-mail</label>
                            <input id="email"
                                   type="email"
                                   name="email"
                                   value="{{ old('email') }}"
                                   required
                                   class="um-create-input" />
                            <div class="um-create-error">
                                <x-input-error :messages="$errors->get('email')" />
                            </div>
                        </div>

                        <div class="um-create-field">
                            <label for="password" class="um-create-label">Hasło</label>
                            <input id="password"
                                   type="password"
                                   name="password"
                                   required
                                   class="um-create-input" />
                            <div class="um-create-error">
                                <x-input-error :messages="$errors->get('password')" />
                            </div>
                        </div>

                        <div class="um-create-field">
                            <label for="password_confirmation" class="um-create-label">Powtórz hasło</label>
                            <input id="password_confirmation"
                                   type="password"
                                   name="password_confirmation"
                                   required
                                   class="um-create-input" />
                        </div>

                        <div class="um-create-field">
                            <label for="role" class="um-create-label">Rola użytkownika</label>
                            <select id="role" name="role" class="um-create-select">
                                <option value="employee" @selected(old('role', 'employee') === 'employee')>Pracownik</option>
                                <option value="supervisor" @selected(old('role') === 'supervisor')>Przełożony</option>
                                <option value="admin" @selected(old('role') === 'admin')>Administrator</option>
                            </select>
                            <div class="um-create-error">
                                <x-input-error :messages="$errors->get('role')" />
                            </div>
                        </div>

                        <div class="um-create-field">
                            <label for="supervisor_id" class="um-create-label">Przełożony raportujący</label>
                            <select id="supervisor_id" name="supervisor_id" class="um-create-select">
                                <option value="">Brak przełożonego</option>
                                @foreach ($supervisors as $supervisor)
                                    <option value="{{ $supervisor->id }}" @selected(old('supervisor_id') == $supervisor->id)>
                                        {{ $supervisor->name }}
                                    </option>
                                @endforeach
                            </select>
                            <div class="um-create-help">
                                Na liście są tylko aktywni przełożeni. Pole można zostawić puste.
                            </div>
                            <div class="um-create-error">
                                <x-input-error :messages="$errors->get('supervisor_id')" />
                            </div>
                        </div>
                    </div>

                    <div class="um-create-actions">
                        <button type="submit" class="um-create-submit">
                            Utwórz użytkownika
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
