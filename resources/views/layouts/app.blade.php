<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>
    <link rel="icon" href="{{ asset('images/logo.png') }}" type="image/png">

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <script>
        // 1. Cek LocalStorage segera (Blocking)
        const savedState = localStorage.getItem('sidebarOpen');
        const isMobile = window.innerWidth < 768;
        // Logic: Jika ada data simpanan gunakan itu, jika tidak gunakan logika desktop vs mobile
        const isOpen = savedState !== null ? savedState === 'true' : !isMobile;

        // 2. Set Variable Global untuk Alpine nanti
        window.initialSidebarState = isOpen;

        // 3. Tambahkan class khusus ke HTML jika sidebar harusnya TERTUTUP
        if (!isOpen) {
            document.documentElement.classList.add('sidebar-closed');
        }
    </script>

    {{-- CSS KHUSUS UNTUK MENANGANI POSISI AWAL (Override Tailwind) --}}
    <style>
        /* Saat halaman loading (class preload), matikan semua animasi */
        .preload * {
            transition: none !important;
        }

        /* JIKA SIDEBAR TERTUTUP (berdasarkan script di atas) */
        html.sidebar-closed .admin-sidebar {
            transform: translateX(-100%) !important;
        }

        html.sidebar-closed .admin-content {
            margin-left: 0 !important;
        }

        /* FIX MOBILE: Di mobile, sidebar selalu hidden kecuali dibuka */
        @media (max-width: 768px) {
            .admin-content {
                margin-left: 0 !important;
            }

            .admin-sidebar {
                transform: translateX(-100%);
            }

            /* Jika open di mobile, translate 0 */
            html:not(.sidebar-closed) .admin-sidebar {
                transform: translateX(0) !important;
            }
        }
    </style>
</head>

{{-- Tambahkan class 'preload' untuk mencegah animasi saat load --}}

<body class="font-sans antialiased preload" x-data="{
    sidebarOpen: window.initialSidebarState, // Ambil dari script di head
    init() {
        // Hapus class preload setelah render selesai agar animasi kembali jalan
        setTimeout(() => document.body.classList.remove('preload'), 100);

        // Sync Alpine state dengan class HTML untuk CSS di atas
        this.$watch('sidebarOpen', val => {
            localStorage.setItem('sidebarOpen', val);
            if (!val) document.documentElement.classList.add('sidebar-closed');
            else document.documentElement.classList.remove('sidebar-closed');
        });
    }
}">

    <div class="min-h-screen bg-gray-100">

        @auth
            @include('layouts.navigation.admin')
        @endauth

        @guest
            @include('layouts.navigation.guest')
        @endguest

        {{-- CONTENT WRAPPER --}}
        {{-- Tambahkan class 'admin-content' untuk dikontrol CSS di head --}}
        <div class="admin-content transition-all duration-300 ease-in-out
    @auth md:ml-64 @endauth
">


            @isset($header)
                <header class="bg-white shadow sticky top-0 z-30">
                    <div class="max-w-7xl mx-auto py-6 px-4 flex items-center gap-4">
                        @auth
                            <button @click="sidebarOpen = !sidebarOpen"
                                class="text-gray-500 hover:text-gray-700 focus:outline-none">
                                <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M4 6h16M4 12h16M4 18h16" />
                                </svg>
                            </button>
                        @endauth
                        <div class="flex-1">
                            {{ $header }}
                        </div>
                    </div>
                </header>
            @endisset

            <main>
                {{ $slot }}
            </main>
        </div>
    </div>
</body>

</html>
