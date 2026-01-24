@auth
    <div class="relative z-50">

        {{-- Mobile Sidebar Overlay --}}
        <div x-show="sidebarOpen" @click="sidebarOpen = false" x-transition:enter="transition-opacity ease-linear duration-300"
            x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100"
            x-transition:leave="transition-opacity ease-linear duration-300" x-transition:leave-start="opacity-100"
            x-transition:leave-end="opacity-0" class="fixed inset-0 bg-zinc-900/80 backdrop-blur-sm md:hidden"></div>

        {{-- SIDEBAR CONTAINER --}}
        {{--
             PENTING:
             1. Tambahkan class 'admin-sidebar'.
             2. Kita set default 'translate-x-0' (posisi terbuka).
                Jika localstorage bilang tutup, CSS di head akan memaksa menjadi -100% via class 'admin-sidebar'.
             3. Alpine (:class) hanya bertugas toggle setelah halaman load.
        --}}
        <aside :class="sidebarOpen ? 'translate-x-0' : '-translate-x-full'"
            class="admin-sidebar fixed inset-y-0 left-0 w-64 bg-zinc-900 border-r border-white/10 transition-transform duration-300 ease-in-out translate-x-0 z-50 flex flex-col justify-between shadow-2xl">

            {{-- 1. Logo Section --}}
            <div class="h-24 flex items-center justify-center border-b border-white/10 relative">
                <a href="{{ route('home') }}" class="flex items-center gap-3 group px-6">
                    <div class="relative">
                        <div
                            class="absolute -inset-1 bg-gradient-to-r from-indigo-500 to-purple-600 rounded-lg blur opacity-25 group-hover:opacity-75 transition duration-500">
                        </div>
                        <div
                            class="relative w-10 h-10 bg-zinc-900 rounded-lg flex items-center justify-center border border-white/10 ring-1 ring-white/5 shadow-2xl">
                            <svg class="w-6 h-6 text-indigo-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M13 10V3L4 14h7v7l9-11h-7z" />
                            </svg>
                        </div>
                    </div>
                    <span class="text-lg font-bold tracking-tight text-white group-hover:text-indigo-300 transition-colors">
                        ALVARO ADMIN
                    </span>
                </a>

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

        {{-- Mobile Header Trigger --}}
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
@endauth
