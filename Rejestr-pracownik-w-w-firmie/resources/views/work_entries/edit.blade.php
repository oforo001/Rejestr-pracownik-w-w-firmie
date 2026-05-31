<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Edytuj wpis czasu pracy
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <form method="POST" action="{{ route('work-entries.update', $workEntry) }}">
                @csrf
                @method('PUT')

                <div>
                    <label for="employee_id">Pracownik</label>
                    <select name="employee_id" id="employee_id">
                        <option value="">Wybierz pracownika</option>
                        @foreach($employees as $employee)
                            <option value="{{ $employee->id }}" @selected(old('employee_id', $workEntry->employee_id) == $employee->id)>
                                {{ $employee->name }}
                            </option>
                        @endforeach
                    </select>
                    @error('employee_id')
                        <div>{{ $message }}</div>
                    @enderror
                </div>

                <div>
                    <label for="work_date">Data pracy</label>
                    <input type="date" name="work_date" id="work_date" value="{{ old('work_date', $workEntry->work_date->format('Y-m-d')) }}">
                    @error('work_date')
                        <div>{{ $message }}</div>
                    @enderror
                </div>

                <div>
                    <label for="hours_worked">Liczba godzin</label>
                    <input type="number" step="0.01" min="0" max="24" name="hours_worked" id="hours_worked" value="{{ old('hours_worked', $workEntry->hours_worked) }}">
                    @error('hours_worked')
                        <div>{{ $message }}</div>
                    @enderror
                </div>

                <div>
                    <label for="comment">Komentarz</label>
                    <textarea name="comment" id="comment">{{ old('comment', $workEntry->comment) }}</textarea>
                    @error('comment')
                        <div>{{ $message }}</div>
                    @enderror
                </div>

                <div class="ui-actions">
                    <a class="ui-btn ui-btn-secondary" href="{{ route('work-entries.show', $workEntry) }}">Wróć</a>
                    <button type="submit" class="ui-btn ui-btn-primary">Aktualizuj</button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
