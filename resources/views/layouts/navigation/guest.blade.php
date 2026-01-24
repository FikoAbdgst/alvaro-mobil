@guest
    <nav x-data="{ open: false, scrolled: false }" @scroll.window="scrolled = (window.pageYOffset > 20)"
        :class="{ 'bg-zinc-900/80 backdrop-blur-xl border-white/10': scrolled, 'bg-transparent border-transparent': !scrolled }"
        class="fixed top-0 left-0 right-0 z-50 border-b transition-all duration-300 ease-in-out">

        {{-- ... Paste ulang kode navigasi guest Anda di sini ... --}}
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-24">
                <div class="flex items-center gap-65">
                    <a href="{{ route('home') }}" class="flex items-center gap-4 group">
                        <div class="relative">
                            <div
                                class="absolute -inset-1 bg-gradient-to-r from-indigo-500 to-purple-600 rounded-xl blur opacity-25 group-hover:opacity-75 transition duration-500">
                            </div>

                            <div
                                class="relative w-11 h-11 bg-zinc-900 rounded-xl flex items-center justify-center border border-white/10 ring-1 ring-white/5 shadow-2xl group-hover:scale-105 transition-transform duration-300">
                                <svg class="w-6 h-6 text-indigo-400" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M13 10V3L4 14h7v7l9-11h-7z" />
                                </svg>
                            </div>
                        </div>
                        <span
                            class="text-xl font-bold tracking-tight text-white hidden sm:block group-hover:text-indigo-300 transition-colors">
                            PT ALVARO MOBIL
                        </span>
                    </a>
                </div>

                <div class="hidden md:flex items-center gap-6">
                    <a href="https://wa.me/6287875712617" target="_blank"
                        class="group px-8 py-4 bg-green-600/20 backdrop-blur-md text-white font-bold rounded-xl border-2 border-green-400/50 hover:bg-green-600 hover:border-green-500 transition-all duration-300 flex items-center gap-2">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                            <path
                                d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487Z" />
                        </svg>
                        <span>Hubungi Kami</span>
                    </a>
                </div>

                {{-- Mobile Hamburger (Guest) --}}
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

        {{-- Mobile Menu Guest --}}
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
                    <a href="https://wa.me/6287875712617" target="_blank"
                        class="flex items-center justify-center gap-2 w-full px-6 py-3 bg-gradient-to-r from-emerald-600 to-green-600 text-white font-bold rounded-xl shadow-lg shadow-emerald-900/20">
                        Chat WhatsApp
                    </a>
                </div>
            </div>
        </div>
    </nav>
    <div class="h-24 bg-zinc-900"></div>
@endguest
