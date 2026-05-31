<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Szczegóły wpisu czasu pracy
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @if(session('status'))
                <div>{{ session('status') }}</div>
            @endif

            <div>
                <p><strong>Pracownik:</strong> {{ $workEntry->employee->name }}</p>
                <p><strong>Utworzył:</strong> {{ $workEntry->creator->name }}</p>
                <p><strong>Data:</strong> {{ $workEntry->work_date->format('d.m.Y') }}</p>
                <p><strong>Godziny:</strong> {{ $workEntry->hours_worked }}</p>
                <p><strong>Komentarz:</strong> {{ $workEntry->comment ?? '-' }}</p>
            </div>

            @if($canManage)
                <div class="ui-actions">
                    <a class="ui-btn ui-btn-secondary" href="{{ route('work-entries.index') }}">Wróć</a>
                    <a class="ui-btn ui-btn-secondary" href="{{ route('work-entries.edit', $workEntry) }}">Edytuj</a>

                    <form method="POST" action="{{ route('work-entries.destroy', $workEntry) }}">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="ui-btn ui-btn-primary" onclick="return confirm('Czy na pewno chcesz usunąć ten wpis?')">
                            Usuń
                        </button>
                    </form>
                </div>
            @else
                <div class="ui-actions">
                    <a class="ui-btn ui-btn-secondary" href="{{ route('work-entries.index') }}">Wróć</a>
                </div>
            @endif
        </div>
    </div>
</x-app-layout>
