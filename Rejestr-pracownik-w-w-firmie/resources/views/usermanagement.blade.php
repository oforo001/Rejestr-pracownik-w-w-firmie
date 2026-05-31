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

    .um-hero__eyebrow {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        padding: 6px 10px;
        margin-bottom: 10px;
        border-radius: 999px;
        background: rgba(15, 23, 42, 0.06);
        color: #334155;
        font-size: 0.75rem;
        font-weight: 700;
        letter-spacing: 0.08em;
        text-transform: uppercase;
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
        white-space: nowrap;
    }

    .um-table tbody tr {
        transition: background-color 0.15s ease, transform 0.15s ease;
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

    .um-topbar {
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 1rem;
        margin-bottom: 1rem;
    }

    .um-topbar p {
        margin: 0.25rem 0 0;
        color: #64748b;
        font-size: 0.92rem;
    }
</style>

<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col gap-1">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Zarządzanie użytkownikami
            </h2>
            <p class="text-sm text-gray-500">
                Twórz konta, kontroluj aktywność i zarządzaj dostępem do systemu.
            </p>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="w-full px-4 sm:px-6 lg:px-8 um-page">
            <div class="um-hero">
                <div class="um-hero__inner">
                    <div class="um-hero__copy">
                        <div class="um-hero__eyebrow">User management</div>
                        <h3 class="um-hero__title">Zarządzaj kontami bez chaosu</h3>
                        <p class="um-hero__lead">
                            Twórz nowe konta, kontroluj aktywność użytkowników i sprawdzaj ostatnie logowania w jednym miejscu.
                        </p>
                    </div>

                    <a href="{{ route('usermanagement.create') }}" class="um-cta" role="button">
                        Utwórz nowego użytkownika
                    </a>
                </div>
            </div>

            <div class="um-card p-4 sm:p-6">
                <x-auth-session-status class="mt-4" :status="session('status')" />

                @if ($errors->get('user'))
                    <div class="mt-4 rounded-lg border border-red-200 bg-red-50 px-4 py-3 text-sm text-red-700">
                        {{ $errors->first('user') }}
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
                                            default => 'Użytkownik',
                                        };

                                        $canToggle = auth()->id() !== $user->id;
                                        $canDelete = auth()->id() !== $user->id
                                            && $user->role !== 'supervisor';
                                    @endphp
                                    <tr class="transition hover:bg-gray-50/80">
                                        <td>
                                            <div class="um-name">
                                                <div class="font-medium text-gray-900">{{ $user->name }}</div>
                                                @if ($user->id === auth()->id())
                                                    <div class="um-muted">Twoje konto</div>
                                                @endif
                                            </div>
                                        </td>
                                        <td class="text-sm text-gray-700">{{ $user->email }}</td>
                                        <td>
                                            <span class="um-badge {{ $user->role === 'admin' ? 'bg-slate-900 text-white' : 'bg-slate-100 text-slate-700' }}">
                                                {{ $roleLabel }}
                                            </span>
                                        </td>
                                        <td class="text-sm text-gray-700">
                                            {{ $user->first_login_at ? $user->first_login_at->timezone('Europe/Warsaw')->format('d.m.Y H:i') : '—' }}
                                        </td>
                                        <td class="text-sm text-gray-700">
                                            {{ $user->last_login_at ? $user->last_login_at->timezone('Europe/Warsaw')->format('d.m.Y H:i') : '—' }}
                                        </td>
                                        <td>
                                            <span class="um-badge {{ $user->is_active ? 'bg-emerald-50 text-emerald-700 ring-1 ring-emerald-200' : 'bg-rose-50 text-rose-700 ring-1 ring-rose-200' }}">
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
                                                @endif

                                                @if (! $canToggle && ! $canDelete)
                                                    <span class="text-sm text-gray-400">Brak akcji</span>
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
