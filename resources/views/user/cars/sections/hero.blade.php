{{-- Hero Section - Mobile Optimized & Visual-First --}}
{{-- UBAHAN 1: Tinggi di mobile di-set fix (h-[600px]) agar tidak kepotong address bar browser --}}
<div class="relative text-white h-[600px] md:h-screen overflow-hidden">

    {{-- Background Image --}}
    <div class="absolute inset-0">
        <img src="{{ asset('images/hero.jpeg') }}" alt="Hero Image"
            class="w-full h-full object-cover object-center scale-105 animate-subtle-zoom">

        {{-- Overlay Gelap (sedikit lebih gelap di mobile agar teks terbaca jelas) --}}
        <div class="absolute inset-0 bg-black/70 md:bg-black/60"></div>

        {{-- Gradient bawah agar menyatu dengan konten berikutnya --}}
        <div class="absolute inset-0 bg-gradient-to-t from-gray-900 via-transparent to-black/30"></div>

        {{-- Accent Light Effect --}}
        <div
            class="absolute inset-0 bg-gradient-to-tr from-indigo-600/20 via-transparent to-purple-600/20 animate-pulse">
        </div>
    </div>

    {{-- Content Container --}}
    <div
        class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 h-full flex items-center justify-center text-center pb-12 md:pb-0">
        <div class="w-full max-w-4xl animate-fade-in flex flex-col items-center">

            {{-- Badge --}}
            <div
                class="inline-flex items-center gap-2 px-3 py-1.5 md:px-4 md:py-2 bg-white/10 backdrop-blur-md rounded-full border border-white/20 mb-4 md:mb-6 shadow-lg hover:bg-white/20 transition-all cursor-default">
                <span class="relative flex h-2.5 w-2.5 md:h-3 md:w-3">
                    <span
                        class="animate-ping absolute inline-flex h-full w-full rounded-full bg-green-400 opacity-75"></span>
                    <span class="relative inline-flex rounded-full h-2.5 w-2.5 md:h-3 md:w-3 bg-green-500"></span>
                </span>
                <span class="text-xs md:text-sm font-medium tracking-wide">Dealer Mobil Terpercaya</span>
            </div>

            {{-- Headline: Ukuran font mobile disesuaikan (text-3xl) --}}
            <h1
                class="text-3xl sm:text-5xl md:text-7xl font-black mb-4 md:mb-6 leading-tight tracking-tight drop-shadow-lg px-2">
                <span class="block text-white">Temukan</span>
                <span class="block text-indigo-400 pb-2">
                    Mobil Impian Anda
                </span>
            </h1>

            {{-- Description --}}
            <p
                class="text-sm md:text-xl text-gray-200 mb-6 md:mb-8 max-w-lg md:max-w-2xl mx-auto leading-relaxed font-light px-4">
                Koleksi mobil berkualitas dengan harga terbaik.
                <span class="block md:inline mt-1 md:mt-0 text-white font-medium">Proses cepat, aman, dan
                    terpercaya.</span>
            </p>

            {{-- Action Buttons --}}
            <div
                class="flex flex-col w-full sm:w-auto sm:flex-row items-center justify-center gap-3 md:gap-5 px-4 sm:px-0">

                {{-- Tombol 1: Beli Sekarang --}}
                <a href="#latest-collection"
                    class="smooth-scroll group relative w-full sm:w-auto px-6 py-3 md:px-8 md:py-4 bg-white text-gray-900 rounded-xl md:rounded-full font-bold text-base md:text-lg shadow-xl hover:shadow-2xl hover:-translate-y-1 transition-all duration-300 overflow-hidden">
                    <div
                        class="absolute inset-0 w-full h-full bg-gradient-to-r from-transparent via-gray-100 to-transparent -translate-x-full group-hover:animate-shimmer">
                    </div>
                    <div class="relative flex items-center justify-center gap-2">
                        <span>Beli Sekarang</span>
                        <svg class="w-4 h-4 md:w-5 md:h-5 transform group-hover:translate-y-0.5 transition-transform"
                            fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M19 14l-7 7m0 0l-7-7m7 7V3" />
                        </svg>
                    </div>
                </a>

                {{-- Tombol 2: Cek Katalog --}}
                <a href="{{ route('catalog') }}"
                    class="w-full sm:w-auto px-6 py-3 md:px-8 md:py-4 bg-white/10 backdrop-blur-md border border-white/30 text-white rounded-xl md:rounded-full font-bold text-base md:text-lg shadow-lg hover:bg-white/20 hover:border-white/50 hover:-translate-y-1 transition-all duration-300">
                    <div class="flex items-center justify-center gap-2">
                        <span>Cek Katalog</span>
                        <svg class="w-4 h-4 md:w-5 md:h-5 transform group-hover:translate-x-1 transition-transform"
                            fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                        </svg>
                    </div>
                </a>
            </div>

            {{-- Stats Grid: Margin top dikurangi di mobile
            <div class="mt-8 md:mt-16 grid grid-cols-3 gap-4 md:gap-8 w-full max-w-3xl mx-auto opacity-90">
                <div class="text-center">
                    <div class="text-xl md:text-4xl font-black text-white mb-0.5 md:mb-1">500+</div>
                    <div class="text-[10px] md:text-sm text-gray-300 uppercase tracking-widest">Terjual</div>
                </div>
                <div class="text-center border-x border-white/20 px-2 md:px-4">
                    <div class="text-xl md:text-4xl font-black text-white mb-0.5 md:mb-1">1000+</div>
                    <div class="text-[10px] md:text-sm text-gray-300 uppercase tracking-widest">Pelanggan</div>
                </div>
                <div class="text-center">
                    <div class="text-xl md:text-4xl font-black text-white mb-0.5 md:mb-1">10+</div>
                    <div class="text-[10px] md:text-sm text-gray-300 uppercase tracking-widest">Tahun</div>
                </div>
            </div> --}}

        </div>
    </div>
</div>

<script>
    document.querySelectorAll('.smooth-scroll').forEach(anchor => {
        anchor.addEventListener('click', function(e) {
            e.preventDefault();
            const targetId = this.getAttribute('href');
            const targetElement = document.querySelector(targetId);
            if (targetElement) {
                targetElement.scrollIntoView({
                    behavior: 'smooth',
                    block: 'start'
                });
            }
        });
    });
</script>

<style>
    @keyframes subtle-zoom {

        0%,
        100% {
            transform: scale(1.05);
        }

        50% {
            transform: scale(1.10);
        }
    }

    @keyframes shimmer {
        100% {
            transform: translateX(100%);
        }
    }

    .animate-subtle-zoom {
        animation: subtle-zoom 20s ease-in-out infinite;
    }

    .animate-shimmer {
        animation: shimmer 1.5s infinite;
    }

    .animate-fade-in {
        animation: fade-in 1s ease-out forwards;
    }

    @keyframes fade-in {
        from {
            opacity: 0;
            transform: translateY(20px);
        }

        to {
            opacity: 1;
            transform: translateY(0);
        }
    }
</style>
