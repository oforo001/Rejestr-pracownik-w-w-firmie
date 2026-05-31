<x-app-layout>
    <x-slot name="header">
        <div class="d-flex justify-content-between align-items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Ewidencja czasu pracy
            </h2>

            @if($canCreate)
                <a href="{{ route('work-entries.create') }}">Dodaj wpis</a>
            @endif
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @if(session('status'))
                <div>{{ session('status') }}</div>
            @endif

            <div>
                <table>
                    <thead>
                        <tr>
                            <th>Pracownik</th>
                            <th>Data</th>
                            <th>Godziny</th>
                            <th>Utworzył</th>
                            <th>Akcje</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($workEntries as $workEntry)
                            <tr>
                                <td>{{ $workEntry->employee->name }}</td>
                                <td>{{ $workEntry->work_date->format('d.m.Y') }}</td>
                                <td>{{ $workEntry->hours_worked }}</td>
                                <td>{{ $workEntry->creator->name }}</td>
                                <td>
                                    <a href="{{ route('work-entries.show', $workEntry) }}">Szczegóły</a>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5">Nie znaleziono wpisów czasu pracy.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <div>
                {{ $workEntries->links() }}
            </div>
        </div>
    </div>
</x-app-layout>
