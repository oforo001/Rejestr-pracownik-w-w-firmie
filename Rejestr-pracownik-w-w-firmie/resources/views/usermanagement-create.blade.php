<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col gap-1">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Utwórz użytkownika
            </h2>
            <p class="text-sm text-gray-500">
                Dodaj konto pracownika, przełożonego albo administratora systemu.
            </p>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">

            <!-- CARD -->
            <div class="bg-white shadow-sm rounded-xl border border-gray-100">

                <!-- CARD HEADER -->
                <div class="flex items-start justify-between gap-4 p-6 border-b border-gray-100">
                        <div>
                            <h3 class="text-lg font-semibold text-gray-900">
                                Nowe konto użytkownika
                            </h3>
                            <p class="mt-1 text-sm text-gray-500">
                                Wypełnij formularz. Konto zostanie aktywowane natychmiast.
                            </p>
                        </div>

                    <a href="{{ route('usermanagement') }}"
                       class="inline-flex items-center px-4 py-2 text-sm font-medium text-gray-700 border border-gray-200 rounded-lg hover:bg-gray-50 transition">
                        ← Wróć
                    </a>
                </div>

                <!-- FORM -->
                <form method="POST" action="{{ route('usermanagement.store') }}"
                      class="p-6 grid gap-5">

                    @csrf

                    <!-- NAME -->
                    <div class="space-y-2">
                        <x-input-label for="name" value="Imię i nazwisko" />
                        <x-text-input id="name"
                                      type="text"
                                      name="name"
                                      class="w-full"
                                      :value="old('name')"
                                      required autofocus />
                        <x-input-error :messages="$errors->get('name')" />
                    </div>

                    <!-- EMAIL -->
                    <div class="space-y-2">
                        <x-input-label for="email" value="E-mail" />
                        <x-text-input id="email"
                                      type="email"
                                      name="email"
                                      class="w-full"
                                      :value="old('email')"
                                      required />
                        <x-input-error :messages="$errors->get('email')" />
                    </div>

                    <!-- PASSWORD GRID -->
                    <div class="grid md:grid-cols-2 gap-4">

                        <div class="space-y-2">
                            <x-input-label for="password" value="Hasło" />
                            <x-text-input id="password"
                                          type="password"
                                          name="password"
                                          class="w-full"
                                          required />
                            <x-input-error :messages="$errors->get('password')" />
                        </div>

                        <div class="space-y-2">
                            <x-input-label for="password_confirmation" value="Powtórz hasło" />
                            <x-text-input id="password_confirmation"
                                          type="password"
                                          name="password_confirmation"
                                          class="w-full"
                                          required />
                        </div>

                    </div>

                    <!-- ROLE -->
                    <div class="space-y-2">
                        <x-input-label for="role" value="Rola użytkownika" />

                        <select id="role"
                                name="role"
                                class="w-full border-gray-300 rounded-lg shadow-sm focus:border-indigo-500 focus:ring-indigo-500">

                            <option value="employee" @selected(old('role') === 'employee')>
                                Pracownik
                            </option>

                            <option value="supervisor" @selected(old('role') === 'supervisor')>
                                Przełożony
                            </option>

                            <option value="admin" @selected(old('role') === 'admin')>
                                Administrator
                            </option>

                        </select>

                        <x-input-error :messages="$errors->get('role')" />
                    </div>

                    <!-- ACTIONS -->
                    <div class="flex justify-end pt-4 border-t border-gray-100">
                        <x-primary-button class="px-6 py-2">
                            Utwórz użytkownika
                        </x-primary-button>
                    </div>

                </form>
            </div>
        </div>
    </div>
</x-app-layout>
