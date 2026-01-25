@guest
    <nav x-data="{ open: false, scrolled: false }" @scroll.window="scrolled = (window.pageYOffset > 20)"
        :class="{ 'bg-zinc-900/80 backdrop-blur-xl border-white/10': scrolled, 'bg-transparent border-transparent': !scrolled }"
        class="fixed top-0 left-0 right-0 z-50 border-b transition-all duration-300 ease-in-out">

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
                                <img src="{{ asset('images/logo.png') }}" alt="Hero Image" />
                            </div>
                        </div>
                        <span
                            class="text-xl font-bold tracking-tight text-white hidden sm:block group-hover:text-indigo-300 transition-colors">
                            PT ALVARO MOBIL
                        </span>
                    </a>
                </div>

                {{-- MODIFIKASI: Tombol Hubungi Kami dengan LINK PESAN OTOMATIS --}}
                <div class="flex items-center gap-6">
                    <a href="https://wa.me/6287875712617?text=Halo%20Admin%20Alvaro%20Mobil,%20saya%20tertarik%20untuk%20bertanya%20mengenai%20mobil%20yang%20tersedia."
                        target="_blank"
                        class="group px-4 py-2 md:px-8 md:py-4 bg-green-600/20 backdrop-blur-md text-white font-bold rounded-xl border-2 border-green-400/50 hover:bg-green-600 hover:border-green-500 transition-all duration-300 flex items-center gap-2">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                            <path
                                d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487Z" />
                        </svg>
                        <span>Hubungi Kami</span>
                    </a>
                </div>

                {{-- DIBUANG: Bagian Hamburger Menu & Mobile Menu Dropdown sudah dihapus sesuai kode yang Anda berikan --}}
            </div>
        </div>
    </nav>
    <div class="h-24 bg-zinc-900"></div>
@endguest
