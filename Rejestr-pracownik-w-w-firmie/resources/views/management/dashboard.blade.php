<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Panel zarządzania
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 space-y-6">
                    <div>
                        <h3 class="text-lg font-semibold text-gray-900">Rejestr pracowników w firmie XYZ</h3>
                        <p class="mt-2 text-sm text-gray-600">
                            Wspólny panel dla administratora i przełożonego do obsługi godzin pracy, historii miesięcznej i komentarzy do dni pracy.
                        </p>
                    </div>

                    <div class="grid gap-4 md:grid-cols-3">
                        <div class="rounded-lg border border-gray-200 p-4">
                            <p class="text-sm font-medium text-gray-500">Godziny pracy</p>
                            <p class="mt-2 text-sm text-gray-700">Dodawanie i przegląd wpisów godzinowych pracowników.</p>
                        </div>

                        <div class="rounded-lg border border-gray-200 p-4">
                            <p class="text-sm font-medium text-gray-500">Historia miesięczna</p>
                            <p class="mt-2 text-sm text-gray-700">Wgląd do przepracowanych dni i sum godzin w miesiącu.</p>
                        </div>

                        <div class="rounded-lg border border-gray-200 p-4">
                            <p class="text-sm font-medium text-gray-500">Komentarze</p>
                            <p class="mt-2 text-sm text-gray-700">Komentowanie dnia pracy przez administratora, przełożonego i pracownika.</p>
                        </div>
                    </div>

                    <div class="flex flex-wrap gap-3">
                        <a href="{{ route('work-entries.index') }}" class="inline-flex items-center rounded-md bg-gray-900 px-4 py-2 text-sm font-medium text-white hover:bg-gray-700">
                            Przejdź do wpisów
                        </a>

                        <a href="{{ route('usermanagement') }}" class="inline-flex items-center rounded-md border border-gray-300 px-4 py-2 text-sm font-medium text-gray-700 hover:bg-gray-50">
                            Zarządzaj użytkownikami
                        </a>

                        <a href="{{ route('profile.edit') }}" class="inline-flex items-center rounded-md border border-gray-300 px-4 py-2 text-sm font-medium text-gray-700 hover:bg-gray-50">
                            Profil
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
