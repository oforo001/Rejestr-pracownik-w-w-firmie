<style>
    .um-page {
        padding: 1.75rem 1rem 3rem;
    }

    .um-hero {
        position: relative;
        overflow: hidden;
        border: 1px solid rgba(148, 163, 184, 0.22);
        border-radius: 24px;
        background:
            radial-gradient(circle at top right, rgba(37, 99, 235, 0.14), transparent 30%),
            linear-gradient(180deg, rgba(255, 255, 255, 0.95), rgba(248, 250, 252, 0.92));
        box-shadow: 0 18px 45px rgba(15, 23, 42, 0.08);
        padding: 22px 24px;
        margin-bottom: 18px;
    }

    .um-hero::after {
        content: '';
        position: absolute;
        inset: auto -30px -45px auto;
        width: 160px;
        height: 160px;
        border-radius: 999px;
        background: rgba(37, 99, 235, 0.08);
        filter: blur(4px);
        pointer-events: none;
    }

    .um-hero__inner {
        position: relative;
        z-index: 1;
        display: flex;
        flex-wrap: wrap;
        gap: 14px;
        align-items: flex-end;
        justify-content: space-between;
    }

    .um-hero__copy {
        max-width: 760px;
    }

    .um-hero__title {
        margin: 0;
        font-size: clamp(1.5rem, 2vw, 2rem);
        line-height: 1.15;
        color: #0f172a;
    }

    .um-hero__lead {
        margin: 10px 0 0;
        color: #64748b;
        font-size: 0.95rem;
        line-height: 1.6;
    }

    .um-cta {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        gap: 0.5rem;
        min-height: 48px;
        padding: 0.85rem 1.15rem;
        border: 1px solid rgba(15, 23, 42, 0.12);
        border-radius: 14px;
        background: linear-gradient(135deg, #0f172a, #334155);
        color: #fff;
        font-size: 0.92rem;
        font-weight: 700;
        text-decoration: none;
        box-shadow: 0 14px 28px rgba(15, 23, 42, 0.16);
        transition: transform 0.15s ease, box-shadow 0.15s ease, filter 0.15s ease;
        white-space: nowrap;
    }

    .um-cta:hover {
        color: #fff;
        transform: translateY(-1px);
        filter: brightness(1.04);
        box-shadow: 0 18px 34px rgba(15, 23, 42, 0.2);
    }

    .um-card {
        background: rgba(255, 255, 255, 0.92);
        border: 1px solid rgba(148, 163, 184, 0.22);
        border-radius: 24px;
        box-shadow: 0 18px 45px rgba(15, 23, 42, 0.08);
        backdrop-filter: blur(14px);
    }

    .um-alert {
        margin: 1rem 0 0;
        border-radius: 16px;
        padding: 0.9rem 1rem;
        font-size: 0.92rem;
        line-height: 1.5;
    }

    .um-alert--success {
        border: 1px solid #bbf7d0;
        background: #f0fdf4;
        color: #166534;
    }

    .um-alert--error {
        border: 1px solid #fecaca;
        background: #fef2f2;
        color: #b91c1c;
    }

    .um-table-wrap {
        overflow: hidden;
        border-radius: 18px;
        border: 1px solid rgba(226, 232, 240, 0.95);
    }

    .um-table {
        width: 100%;
        border-collapse: separate;
        border-spacing: 0;
    }

    .um-table thead th {
        position: sticky;
        top: 0;
        z-index: 2;
        background: #f8fafc;
        color: #64748b;
        font-size: 0.74rem;
        letter-spacing: 0.08em;
        text-transform: uppercase;
        border-bottom: 1px solid #e2e8f0;
    }

    .um-table th,
    .um-table td {
        padding: 0.95rem 1.15rem;
        vertical-align: top;
    }

    .um-table tbody tr {
        transition: background-color 0.15s ease;
    }

    .um-table tbody tr:hover {
        background: #f8fafc;
    }

    .um-name {
        display: flex;
        flex-direction: column;
        gap: 0.2rem;
    }

    .um-muted {
        color: #64748b;
        font-size: 0.8rem;
    }

    .um-badge {
        display: inline-flex;
        align-items: center;
        border-radius: 999px;
        padding: 0.35rem 0.65rem;
        font-size: 0.75rem;
        font-weight: 700;
        line-height: 1;
    }

    .um-badge--muted {
        background: #f1f5f9;
        color: #475569;
    }

    .um-badge--active {
        background: #ecfdf5;
        color: #047857;
        box-shadow: inset 0 0 0 1px #a7f3d0;
    }

    .um-badge--inactive {
        background: #fef2f2;
        color: #b91c1c;
        box-shadow: inset 0 0 0 1px #fecaca;
    }

    .um-supervisor-box {
        display: grid;
        gap: 0.6rem;
    }

    .um-supervisor-form {
        display: flex;
        flex-wrap: wrap;
        gap: 0.5rem;
        align-items: center;
    }

    .um-supervisor-select {
        min-width: 220px;
        max-width: 100%;
        border: 1px solid #cbd5e1;
        border-radius: 12px;
        background: #fff;
        padding: 0.6rem 0.75rem;
        font-size: 0.9rem;
        color: #0f172a;
    }

    .um-supervisor-note {
        color: #64748b;
        font-size: 0.8rem;
        line-height: 1.45;
    }

    .um-actions {
        display: flex;
        justify-content: flex-end;
        gap: 0.5rem;
        flex-wrap: wrap;
    }

    .um-action-btn {
        padding: 0.55rem 0.8rem;
        font-size: 0.76rem;
        line-height: 1;
        border-radius: 10px;
        min-width: 0;
    }

    .um-delete-note {
        color: #b91c1c;
        font-size: 0.8rem;
        line-height: 1.4;
    }

    @media (max-width: 768px) {
        .um-page {
            padding-inline: 0.75rem;
        }

        .um-table th,
        .um-table td {
            padding: 0.8rem 0.9rem;
        }

        .um-supervisor-select {
            min-width: 100%;
        }
    }
</style>

<x-app-layout>
    @php
        $currentUserId = auth()->id();
    @endphp

    <div class="py-12">
        <div class="w-full px-4 sm:px-6 lg:px-8 um-page">
            <div class="um-hero">
                <div class="um-hero__inner">
                    <div class="um-hero__copy">
                        <h3 class="um-hero__title">Zarządzaj kontami</h3>
                        <p class="um-hero__lead">
                            Dodawaj użytkowników, przypisuj aktywnych przełożonych dla pracowników.
                        </p>
                    </div>

                    <a href="{{ route('usermanagement.create') }}" class="um-cta" role="button">
                        Utwórz nowego użytkownika
                    </a>
                </div>
            </div>

            <div class="um-card p-4 sm:p-6">
                @if (session('status'))
                    <div class="um-alert um-alert--success">
                        {{ session('status') }}
                    </div>
                @endif

                @if ($errors->any())
                    <div class="um-alert um-alert--error">
                        <ul class="list-disc space-y-1 ps-5">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <div class="mt-6 um-table-wrap">
                    <div class="overflow-x-auto">
                        <table class="um-table bg-white">
                            <thead class="bg-gray-50">
                                <tr class="text-left text-xs font-semibold uppercase tracking-wide text-gray-500">
                                    <th>Nazwa</th>
                                    <th>E-mail</th>
                                    <th>Rola</th>
                                    <th>Przełożony</th>
                                    <th>Pierwsze logowanie</th>
                                    <th>Ostatnie logowanie</th>
                                    <th>Status</th>
                                    <th class="text-right">Akcje</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-100">
                                @foreach ($users as $user)
                                    @php
                                        $roleLabel = match ($user->role) {
                                            'admin' => 'Administrator',
                                            'supervisor' => 'Przełożony',
                                            default => 'Pracownik',
                                        };

                                        $canToggle = $user->id !== $currentUserId;
                                        $canDelete = $user->id !== $currentUserId;
                                    @endphp
                                    <tr class="transition hover:bg-gray-50/80">
                                        <td>
                                            <div class="um-name">
                                                <div class="font-medium text-gray-900">{{ $user->name }}</div>
                                                @if ($user->id === $currentUserId)
                                                    <div class="um-muted">Twoje konto</div>
                                                @endif
                                            </div>
                                        </td>

                                        <td class="text-sm text-gray-700">{{ $user->email }}</td>

                                        <td>
                                            <span class="um-badge {{ $user->role === 'admin' ? 'um-badge--active' : 'um-badge--muted' }}">
                                                {{ $roleLabel }}
                                            </span>
                                        </td>

                                        <td class="text-sm text-gray-700">
                                            @php
                                                $availableSupervisors = $supervisors->where('id', '!=', $user->id);
                                            @endphp

                                            <div class="um-supervisor-box">
                                                <div class="um-name">
                                                    <div class="font-medium text-gray-900">
                                                        {{ $user->supervisor?->name ?? 'Brak przełożonego' }}
                                                    </div>

                                                    @if ($user->supervisor)
                                                        <div class="um-muted">
                                                            {{ $user->supervisor->is_active ? 'Aktywny' : 'Nieaktywny' }}
                                                        </div>
                                                    @endif
                                                </div>

                                                <form method="POST" action="{{ route('usermanagement.supervisor', $user) }}" class="um-supervisor-form">
                                                    @csrf
                                                    @method('PATCH')

                                                    <select name="supervisor_id" class="um-supervisor-select">
                                                        <option value="">Brak przełożonego</option>
                                                        @foreach ($availableSupervisors as $supervisor)
                                                            <option value="{{ $supervisor->id }}" @selected($user->supervisor_id == $supervisor->id)>
                                                                {{ $supervisor->name }}
                                                            </option>
                                                        @endforeach
                                                    </select>

                                                    <x-secondary-button type="submit" class="um-action-btn">
                                                        Zapisz
                                                    </x-secondary-button>
                                                </form>

                                                <div class="um-supervisor-note">
                                                    Na liście są tylko aktywni przełożeni. Nie możesz wskazać tego samego konta.
                                                </div>
                                            </div>
                                        </td>

                                        <td class="text-sm text-gray-700">
                                            {{ $user->first_login_at ? $user->first_login_at->timezone('Europe/Warsaw')->format('d.m.Y H:i') : '—' }}
                                        </td>

                                        <td class="text-sm text-gray-700">
                                            {{ $user->last_login_at ? $user->last_login_at->timezone('Europe/Warsaw')->format('d.m.Y H:i') : '—' }}
                                        </td>

                                        <td>
                                            <span class="um-badge {{ $user->is_active ? 'um-badge--active' : 'um-badge--inactive' }}">
                                                {{ $user->is_active ? 'Aktywne' : 'Nieaktywne' }}
                                            </span>
                                        </td>

                                        <td>
                                            <div class="um-actions">
                                                @if ($canToggle)
                                                    <form method="POST" action="{{ route('usermanagement.status', $user) }}">
                                                        @csrf
                                                        @method('PATCH')
                                                        <x-secondary-button type="submit" class="um-action-btn">
                                                            {{ $user->is_active ? 'Dezaktywuj' : 'Aktywuj' }}
                                                        </x-secondary-button>
                                                    </form>
                                                @endif

                                                @if ($canDelete)
                                                    <form method="POST" action="{{ route('usermanagement.destroy', $user) }}" onsubmit="return confirm('Na pewno usunąć konto?');">
                                                        @csrf
                                                        @method('DELETE')
                                                        <x-danger-button type="submit" class="um-action-btn">
                                                            Usuń
                                                        </x-danger-button>
                                                    </form>
                                                @else
                                                    <div class="text-right text-sm text-gray-400">Brak akcji</div>
                                                @endif
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="mt-6">
                    {{ $users->links() }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
