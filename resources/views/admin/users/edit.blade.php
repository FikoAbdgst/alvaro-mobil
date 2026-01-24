<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight flex items-center gap-2">
                <svg class="w-6 h-6 text-yellow-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z">
                    </path>
                </svg>
                {{ __('Edit Admin') }}
                <span class="text-gray-400 text-base font-normal">/ {{ $user->name }}</span>
            </h2>
            <a href="{{ route('admin.users.index') }}"
                class="text-sm text-gray-500 hover:text-indigo-600 transition flex items-center gap-1">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                </svg>
                Kembali
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-2xl border border-gray-100">
                <div class="p-8">

                    <form method="POST" action="{{ route('admin.users.update', $user) }}">
                        @csrf
                        @method('PATCH')

                        <div class="space-y-6">
                            {{-- Bagian Profil --}}
                            <div>
                                <h3 class="text-lg font-bold text-gray-800 border-b pb-2 mb-4">Informasi Profil</h3>
                                <div class="grid gap-5">
                                    <div>
                                        <x-input-label for="name" :value="__('Nama Lengkap')" />
                                        <x-text-input id="name" class="block mt-1 w-full" type="text"
                                            name="name" :value="old('name', $user->name)" required autofocus />
                                        <x-input-error :messages="$errors->get('name')" class="mt-2" />
                                    </div>

                                    <div>
                                        <x-input-label for="email" :value="__('Email')" />
                                        <x-text-input id="email" class="block mt-1 w-full bg-gray-50" type="email"
                                            name="email" :value="old('email', $user->email)" required />
                                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                                    </div>
                                </div>
                            </div>

                            {{-- Bagian Password --}}
                            <div class="bg-yellow-50 rounded-xl p-5 border border-yellow-100">
                                <h3 class="text-md font-bold text-yellow-800 mb-3 flex items-center">
                                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z">
                                        </path>
                                    </svg>
                                    Ubah Password
                                </h3>
                                <p class="text-xs text-yellow-600 mb-4">Biarkan kosong jika Anda tidak ingin mengubah
                                    password saat ini.</p>

                                <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                                    <div>
                                        <x-input-label for="password" :value="__('Password Baru')" class="text-yellow-800" />
                                        <x-text-input id="password"
                                            class="block mt-1 w-full border-yellow-200 focus:border-yellow-500 focus:ring-yellow-500"
                                            type="password" name="password" autocomplete="new-password"
                                            placeholder="Min. 8 karakter" />
                                        <x-input-error :messages="$errors->get('password')" class="mt-2" />
                                    </div>

                                    <div>
                                        <x-input-label for="password_confirmation" :value="__('Konfirmasi Password')"
                                            class="text-yellow-800" />
                                        <x-text-input id="password_confirmation"
                                            class="block mt-1 w-full border-yellow-200 focus:border-yellow-500 focus:ring-yellow-500"
                                            type="password" name="password_confirmation" />
                                        <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="flex items-center justify-end mt-8 pt-6 border-t border-gray-100">
                            <a href="{{ route('admin.users.index') }}"
                                class="px-4 py-2 bg-white border border-gray-300 rounded-lg text-sm font-medium text-gray-700 hover:bg-gray-50 mr-3 transition shadow-sm">
                                Batal
                            </a>
                            <button type="submit"
                                class="px-6 py-2 bg-indigo-600 border border-transparent rounded-lg font-semibold text-sm text-white uppercase tracking-widest hover:bg-indigo-700 active:bg-indigo-900 focus:outline-none focus:ring focus:ring-indigo-300 transition shadow-lg shadow-indigo-500/30">
                                {{ __('Simpan Perubahan') }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
