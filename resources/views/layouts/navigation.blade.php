<nav x-data="{ open: false }"
    class="bg-zinc-900 border-b border-zinc-800 sticky top-0 z-50 backdrop-blur supports-[backdrop-filter]:bg-zinc-900/90">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">

            <!-- Left -->
            <div class="flex items-center">
                <!-- Logo -->
                <div class="shrink-0 flex items-center gap-2">
                    <x-application-logo class="block h-9 w-auto fill-current text-white" />
                    <span class="text-white font-bold tracking-wide hidden sm:inline">
                        PT ALVARO MOBIL
                    </span>
                </div>

                <!-- Desktop Menu -->
                <div class="hidden sm:flex sm:ms-10 sm:space-x-8">
                    {{-- @guest
                        <a href="{{ route('home') }}" class="text-zinc-300 hover:text-white transition font-medium">
                            Home
                        </a>
                        <a href="#cars" class="text-zinc-300 hover:text-white transition font-medium">
                            Katalog Mobil
                        </a>
                        <a href="#contact" class="text-zinc-300 hover:text-white transition font-medium">
                            Kontak
                        </a>
                    @endguest --}}

                    @auth
                        @if (Auth::check())
                            <a href="{{ route('admin.dashboard') }}"
                                class="text-zinc-300 hover:text-white transition font-medium">
                                Dashboard
                            </a>
                            <a href="{{ route('admin.cars.index') }}"
                                class="text-zinc-300 hover:text-white transition font-medium">
                                Manajemen Mobil
                            </a>
                        @endif
                    @endauth
                </div>
            </div>

            <!-- Right -->
            <div class="hidden sm:flex sm:items-center sm:gap-4">
                @guest
                    <!-- WhatsApp CTA -->
                    <a href="https://wa.me/6287875712617" target="_blank"
                        class="inline-flex items-center gap-2 bg-green-500 hover:bg-green-600 text-white font-bold px-5 py-2 rounded-xl shadow-lg transition">
                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24">
                            <path
                                d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487Z" />
                        </svg>
                        Hubungi Kami
                    </a>
                @endguest

                @auth
                    <x-dropdown align="right" width="48">
                        <x-slot name="trigger">
                            <button
                                class="inline-flex items-center px-4 py-2 text-sm font-medium rounded-xl text-zinc-300 bg-zinc-800 hover:text-white hover:bg-zinc-700 transition">
                                {{ Auth::user()->name }}
                                <svg class="ms-2 h-4 w-4 fill-current" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd"
                                        d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                        clip-rule="evenodd" />
                                </svg>
                            </button>
                        </x-slot>

                        <x-slot name="content">
                            <x-dropdown-link :href="route('profile.edit')">
                                Profile
                            </x-dropdown-link>

                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <x-dropdown-link :href="route('logout')"
                                    onclick="event.preventDefault(); this.closest('form').submit();">
                                    Log Out
                                </x-dropdown-link>
                            </form>
                        </x-slot>
                    </x-dropdown>
                @endauth
            </div>

            <!-- Mobile Button -->
            <div class="flex items-center sm:hidden">
                <button @click="open = !open"
                    class="p-2 rounded-lg text-zinc-300 hover:text-white hover:bg-zinc-700 transition">
                    <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Mobile Menu -->
    <div x-show="open" x-transition class="sm:hidden bg-zinc-900 border-t border-zinc-800">
        <div class="px-4 py-4 space-y-3">
            <a href="{{ route('home') }}" class="block text-zinc-300 hover:text-white">Home</a>
            <a href="#cars" class="block text-zinc-300 hover:text-white">Katalog Mobil</a>
            <a href="#contact" class="block text-zinc-300 hover:text-white">Kontak</a>

            <a href="https://wa.me/6287875712617" target="_blank"
                class="block text-center bg-green-500 hover:bg-green-600 text-white font-bold py-2 rounded-xl">
                Hubungi via WhatsApp
            </a>
        </div>
    </div>
</nav>
