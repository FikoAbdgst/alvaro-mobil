@auth
    {{-- ========================================== --}}
    {{-- MODE ADMIN: SIDEBAR NAVIGATION --}}
    {{-- ========================================== --}}

    {{-- Hapus x-data lokal, kita gunakan scope dari body --}}
    <div class="relative z-50">

        {{-- Mobile Sidebar Overlay --}}
        <div x-show="sidebarOpen" @click="sidebarOpen = false" x-transition:enter="transition-opacity ease-linear duration-300"
            x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100"
            x-transition:leave="transition-opacity ease-linear duration-300" x-transition:leave-start="opacity-100"
            x-transition:leave-end="opacity-0" class="fixed inset-0 bg-zinc-900/80 backdrop-blur-sm md:hidden"></div>

        {{-- SIDEBAR CONTAINER --}}
        {{--
             Perubahan: Hapus 'md:translate-x-0' yang memaksa sidebar selalu muncul.
             Sekarang sidebar patuh sepenuhnya pada variable 'sidebarOpen'.
        --}}
        <aside :class="sidebarOpen ? 'translate-x-0' : '-translate-x-full'"
            class="fixed inset-y-0 left-0 w-64 bg-zinc-900 border-r border-white/10 transition-transform duration-300 ease-in-out z-50 flex flex-col justify-between shadow-2xl">

            {{-- 1. Logo Section --}}
            <div class="h-24 flex items-center justify-center border-b border-white/10 relative">
                <div class="flex items-center gap-3 group px-6">
                    <div class="relative">
                        <div
                            class="absolute -inset-1 bg-gradient-to-r from-indigo-500 to-purple-600 rounded-lg blur opacity-25 group-hover:opacity-75 transition duration-500">
                        </div>
                        <div
                            class="relative w-10 h-10 bg-zinc-900 rounded-lg flex items-center justify-center border border-white/10 ring-1 ring-white/5 shadow-2xl">
                            <img src="{{ asset('images/logo.png') }}" alt="Hero Image" />
                        </div>
                    </div>
                    <span class="text-lg font-bold tracking-tight text-white group-hover:text-indigo-300 transition-colors">
                        ALVARO ADMIN
                    </span>
                </div>

                {{-- Tombol Close di Mobile --}}
                <button @click="sidebarOpen = false"
                    class="absolute top-4 right-4 md:hidden text-zinc-500 hover:text-white">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>

            {{-- 2. Menu Links --}}
            <nav class="flex-1 px-4 py-6 space-y-2 overflow-y-auto">
                <p class="px-4 text-xs font-semibold text-zinc-500 uppercase tracking-wider mb-4">Menu Utama</p>

                {{-- Dashboard Link --}}
                <a href="{{ route('admin.dashboard') }}"
                    class="flex items-center gap-3 px-4 py-3 rounded-xl transition-all duration-200 group {{ request()->routeIs('admin.dashboard') ? 'bg-indigo-600 text-white shadow-lg shadow-indigo-900/20' : 'text-zinc-400 hover:bg-white/5 hover:text-white' }}">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z" />
                    </svg>
                    <span class="font-medium">Dashboard</span>
                </a>

                {{-- Mobil Link --}}
                <a href="{{ route('admin.cars.index') }}"
                    class="flex items-center gap-3 px-4 py-3 rounded-xl transition-all duration-200 group {{ request()->routeIs('admin.cars.*') ? 'bg-indigo-600 text-white shadow-lg shadow-indigo-900/20' : 'text-zinc-400 hover:bg-white/5 hover:text-white' }}">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M8 7h12m0 0l-4-4m4 4l-4 4m0 6H4m0 0l4 4m-4-4l4-4" />
                    </svg>
                    <span class="font-medium">Data Mobil</span>
                </a>

                {{-- Admin Users Link --}}
                <a href="{{ route('admin.users.index') }}"
                    class="flex items-center gap-3 px-4 py-3 rounded-xl transition-all duration-200 group {{ request()->routeIs('admin.users.*') ? 'bg-indigo-600 text-white shadow-lg shadow-indigo-900/20' : 'text-zinc-400 hover:bg-white/5 hover:text-white' }}">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
                    </svg>
                    <span class="font-medium">Admin Users</span>
                </a>
            </nav>

            {{-- 3. User Profile & Logout (Bottom) --}}
            <div class="p-4 border-t border-white/10 bg-zinc-900/50">
                <div class="flex items-center gap-3 mb-4 px-2">
                    <div class="w-10 h-10 rounded-full bg-gradient-to-tr from-indigo-500 to-purple-500 p-[2px]">
                        <div
                            class="w-full h-full rounded-full bg-zinc-900 flex items-center justify-center text-white text-sm font-bold">
                            {{ substr(Auth::user()->name, 0, 1) }}
                        </div>
                    </div>
                    <div class="overflow-hidden">
                        <p class="text-sm font-medium text-white truncate">{{ Auth::user()->name }}</p>
                        <p class="text-xs text-zinc-500 truncate">{{ Auth::user()->email }}</p>
                    </div>
                </div>

                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit"
                        class="w-full flex items-center justify-center gap-2 px-4 py-2 text-sm font-medium text-red-400 bg-red-500/10 hover:bg-red-500 hover:text-white rounded-lg transition-all duration-200">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                        </svg>
                        Logout
                    </button>
                </form>
            </div>
        </aside>

        {{-- Mobile Header Trigger (Hanya muncul jika sidebar tertutup DI MOBILE) --}}
        {{-- Kita sembunyikan jika di desktop, karena di desktop sudah ada toggle di Header --}}
        <div class="md:hidden fixed top-0 left-0 right-0 h-16 bg-zinc-900 border-b border-white/10 flex items-center justify-between px-4 z-40"
            x-show="!sidebarOpen">
            <span class="font-bold text-white">Admin Panel</span>
            <button @click="sidebarOpen = true" class="text-zinc-400 hover:text-white p-2">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                </svg>
            </button>
        </div>
    </div>
@else
    {{-- ========================================== --}}
    {{-- MODE GUEST: TOPBAR NAVIGATION --}}
    {{-- ========================================== --}}

    <nav x-data="{ open: false, scrolled: false }" x-init="scrolled = (window.scrollY > 20)" @scroll.window="scrolled = (window.scrollY > 20)"
        :class="{
            'bg-zinc-900/90 backdrop-blur-xl border-white/10 shadow-lg': scrolled,
            'bg-transparent border-transparent': !
                scrolled
        }"
        class="fixed top-0 left-0 right-0 z-50 border-b transition-all duration-300 ease-in-out">

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-24">
                {{-- Logo Section --}}
                <div class="flex items-center gap-65">
                    <div class="flex items-center gap-4 group">
                        <div class="relative">
                            <div
                                class="absolute -inset-1 bg-gradient-to-r from-indigo-500 to-purple-600 rounded-xl blur opacity-25 group-hover:opacity-75 transition duration-500">
                            </div>

                            <div
                                class="relative w-12 h-12 bg-zinc-900 rounded-xl flex items-center justify-center border border-white/10 ring-1 ring-white/5 shadow-2xl group-hover:scale-105 transition-transform duration-300">
                                <img src="{{ asset('images/logo.png') }}" alt="Hero Image" />
                            </div>
                        </div>
                        <span
                            class="text-xl font-bold tracking-tight text-white hidden sm:block group-hover:text-indigo-300 transition-colors">
                            PT ALVARO MOBIL
                        </span>
                    </div>
                </div>

                {{-- Desktop Button (DENGAN PESAN OTOMATIS) --}}
                <div class="hidden md:flex items-center gap-6">
                    <a href="https://wa.me/6287875712617?text=Halo%20Admin%20Alvaro%20Mobil,%20saya%20tertarik%20untuk%20bertanya%20mengenai%20sewa%20mobil."
                        target="_blank"
                        class="group px-8 py-4 bg-green-600/20 backdrop-blur-md text-white font-bold rounded-xl border-2 border-green-400/50 hover:bg-green-600 hover:border-green-500 transition-all duration-300 flex items-center gap-2">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                            <path
                                d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487Z" />
                        </svg>
                        <span>Hubungi Kami</span>
                    </a>
                </div>

                {{-- Mobile Hamburger --}}
                <div class="flex items-center md:hidden">
                    <button @click="open = !open"
                        class="p-2 rounded-lg text-zinc-400 hover:text-white hover:bg-white/10 transition-all border border-transparent hover:border-white/10">
                        <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path x-show="!open" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M4 6h16M4 12h16M4 18h16" />
                            <path x-show="open" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>
            </div>
        </div>

        {{-- Mobile Menu --}}
        <div x-show="open" x-transition:enter="transition ease-out duration-200"
            x-transition:enter-start="opacity-0 -translate-y-2" x-transition:enter-end="opacity-100 translate-y-0"
            x-transition:leave="transition ease-in duration-150" x-transition:leave-start="opacity-100 translate-y-0"
            x-transition:leave-end="opacity-0 -translate-y-2"
            class="md:hidden bg-zinc-900/95 backdrop-blur-xl border-t border-white/10 absolute w-full">

            <div class="px-4 py-6 space-y-2">
                <a href="{{ route('home') }}"
                    class="block px-4 py-3 rounded-xl text-zinc-300 hover:text-white hover:bg-white/5 transition-all">Home</a>
                <a href="#cars"
                    class="block px-4 py-3 rounded-xl text-zinc-300 hover:text-white hover:bg-white/5 transition-all">Katalog
                    Mobil</a>
                <a href="#contact"
                    class="block px-4 py-3 rounded-xl text-zinc-300 hover:text-white hover:bg-white/5 transition-all">Kontak</a>

                <div class="pt-4 mt-4 border-t border-white/10">
                    {{-- Mobile Button (DENGAN PESAN OTOMATIS) --}}
                    <a href="https://wa.me/6287875712617?text=Halo%20Admin%20Alvaro%20Mobil,%20saya%20tertarik%20untuk%20bertanya%20mengenai%20mobil%20yang%20tersedia."
                        target="_blank"
                        class="flex items-center justify-center gap-2 w-full px-6 py-3 bg-gradient-to-r from-emerald-600 to-green-600 text-white font-bold rounded-xl shadow-lg shadow-emerald-900/20">
                        Chat WhatsApp
                    </a>
                </div>
            </div>
        </div>
    </nav>
    <div class="h-24 bg-zinc-900"></div>
@endauth
