<x-guest-layout>
    <div class="mb-10 text-center">
        {{-- Ikon Tengah Atas (Avatar User) --}}
        <div class="mx-auto w-16 h-16 bg-indigo-50 rounded-full flex items-center justify-center mb-4 shadow-sm">
            <svg class="w-8 h-8 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
            </svg>
        </div>

        <h2 class="text-2xl font-bold text-zinc-900 tracking-tight">Selamat Datang</h2>
        <p class="text-sm text-zinc-500 mt-2">Masuk untuk mengelola sistem admin.</p>
    </div>

    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}" class="space-y-5">
        @csrf

        <div>
            <div class="relative">
                {{-- Icon Container (Kiri) --}}
                <div
                    class="absolute inset-y-0 left-0 w-12 flex items-center justify-center pointer-events-none text-zinc-400">
                    <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                    </svg>
                </div>

                {{-- Input Field --}}
                {{-- Perbaikan: pl-12 (padding left lebih besar) agar tidak nabrak icon --}}
                <x-text-input id="email"
                    class="block w-full pl-12 pr-4 py-3 bg-zinc-50 border-transparent focus:border-indigo-500 focus:bg-white focus:ring-indigo-500 rounded-xl transition-all duration-200"
                    type="email" name="email" :value="old('email')" required autofocus autocomplete="username"
                    placeholder="Alamat Email" />
            </div>
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <div x-data="{ show: false }">
            <div class="relative">
                {{-- Icon Kunci (Kiri) --}}
                <div
                    class="absolute inset-y-0 left-0 w-12 flex items-center justify-center pointer-events-none text-zinc-400">
                    <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                    </svg>
                </div>

                {{-- Input Field --}}
                {{-- Perbaikan: pl-12 (kiri) dan pr-12 (kanan) agar teks password tidak nabrak icon kunci maupun icon mata --}}
                <x-text-input id="password"
                    class="block w-full pl-12 pr-12 py-3 bg-zinc-50 border-transparent focus:border-indigo-500 focus:bg-white focus:ring-indigo-500 rounded-xl transition-all duration-200"
                    ::type="show ? 'text' : 'password'" name="password" required autocomplete="current-password"
                    placeholder="Kata Sandi" />

                {{-- Tombol Toggle Mata (Kanan) --}}
                <div class="absolute inset-y-0 right-0 w-12 flex items-center justify-center">
                    <button type="button" @click="show = !show"
                        class="text-zinc-400 hover:text-zinc-600 focus:outline-none p-1 rounded-md transition-colors">
                        {{-- Icon Mata Terbuka --}}
                        <svg x-show="!show" class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 5 8.268 7.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                        </svg>
                        {{-- Icon Mata Tertutup --}}
                        <svg x-show="show" style="display: none;" class="h-5 w-5" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.88 9.88l-3.29-3.29m7.532 7.532l3.29 3.29M3 3l3.59 3.59m0 0A9.953 9.953 0 0112 5c4.478 0 8.268 2.943 9.543 7a10.025 10.025 0 01-4.132 5.411m0 0L21 21" />
                        </svg>
                    </button>
                </div>
            </div>
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <div class="pt-2">
            <x-primary-button
                class="w-full justify-center py-3 bg-indigo-600 hover:bg-indigo-700 active:bg-indigo-800 text-white font-bold rounded-xl transition-all shadow-lg shadow-indigo-500/30">
                {{ __('Masuk') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
