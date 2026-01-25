{{-- Hero Section - Modern & Visual-First --}}
<div class="relative text-white h-screen overflow-hidden">
    <div class="absolute inset-0">
        <img src="{{ asset('images/hero.jpeg') }}" alt="Hero Image"
            class="w-full h-full object-cover scale-105 animate-subtle-zoom">
        <div class="absolute inset-0 bg-black/60"></div>
        <div class="absolute inset-0 bg-gradient-to-t from-gray-900 via-transparent to-black/30"></div>

        <div
            class="absolute inset-0 bg-gradient-to-tr from-indigo-600/30 via-transparent to-purple-600/30 animate-pulse">
        </div>
    </div>

    <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 h-full flex items-center justify-center text-center">
        <div class="w-full max-w-4xl space-y-8 animate-fade-in">
            <div
                class="inline-flex items-center gap-2 px-4 py-2 bg-white/10 backdrop-blur-md rounded-full border border-white/20 mb-6 shadow-lg hover:bg-white/20 transition-all cursor-default">
                <span class="relative flex h-3 w-3">
                    <span
                        class="animate-ping absolute inline-flex h-full w-full rounded-full bg-green-400 opacity-75"></span>
                    <span class="relative inline-flex rounded-full h-3 w-3 bg-green-500"></span>
                </span>
                <span class="text-sm font-medium tracking-wide">Dealer Mobil Terpercaya</span>
            </div>

            <h1 class="text-5xl md:text-7xl font-black mb-6 leading-tight tracking-tight drop-shadow-lg">
                <span class="block text-white">Temukan</span>
                <span
                    class="block bg-gradient-to-r from-indigo-400 via-purple-400 to-pink-400 bg-clip-text text-transparent">
                    Mobil Impian Anda
                </span>
            </h1>

            <p class="text-lg md:text-xl text-gray-200 mb-8 max-w-2xl mx-auto leading-relaxed font-light">
                Koleksi mobil berkualitas dengan harga terbaik.
                <span class="block mt-2 text-white font-medium">Proses cepat, aman, dan terpercaya.</span>
            </p>

            <div class="mt-10 flex flex-col sm:flex-row items-center justify-center gap-5">

                {{-- Tombol 1: Beli Sekarang (Solid High Contrast) --}}
                <a href="#latest-collection"
                    class="smooth-scroll group relative px-8 py-4 bg-white text-gray-900 rounded-full font-bold text-lg shadow-xl hover:shadow-2xl hover:-translate-y-1 transition-all duration-300 overflow-hidden w-full sm:w-auto">
                    <div
                        class="absolute inset-0 w-full h-full bg-gradient-to-r from-transparent via-gray-100 to-transparent -translate-x-full group-hover:animate-shimmer">
                    </div>
                    <div class="relative flex items-center justify-center gap-2">
                        <span>Beli Sekarang</span>
                        <svg class="w-5 h-5 transform  transition-transform" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M19 14l-7 7m0 0l-7-7m7 7V3" />
                        </svg>
                    </div>
                </a>

                {{-- Tombol 2: Cek Katalog (Glassmorphism) --}}
                <a href="{{ route('catalog') }}"
                    class="group px-8 py-4 bg-white/10 backdrop-blur-md border border-white/30 text-white rounded-full font-bold text-lg shadow-lg hover:bg-white/20 hover:border-white/50 hover:-translate-y-1 transition-all duration-300 w-full sm:w-auto">
                    <div class="flex items-center justify-center gap-2">
                        <span>Cek Katalog</span>
                        <svg class="w-5 h-5 transform group-hover:translate-x-1 transition-transform" fill="none"
                            stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                        </svg>
                    </div>
                </a>
            </div>

            <div class="pt-16 grid grid-cols-3 gap-8 max-w-3xl mx-auto opacity-80 hover:opacity-100 transition-opacity">
                <div class="text-center">
                    <div class="text-2xl md:text-4xl font-black text-white mb-1">500+</div>
                    <div class="text-xs md:text-sm text-gray-300 uppercase tracking-widest">Terjual</div>
                </div>
                <div class="text-center border-x border-white/20 px-4">
                    <div class="text-2xl md:text-4xl font-black text-white mb-1">1000+</div>
                    <div class="text-xs md:text-sm text-gray-300 uppercase tracking-widest">Pelanggan</div>
                </div>
                <div class="text-center">
                    <div class="text-2xl md:text-4xl font-black text-white mb-1">10+</div>
                    <div class="text-xs md:text-sm text-gray-300 uppercase tracking-widest">Tahun</div>
                </div>
            </div>
        </div>
    </div>


</div>

{{-- Script untuk Smooth Scroll --}}
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
