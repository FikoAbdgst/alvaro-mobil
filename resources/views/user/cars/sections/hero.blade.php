{{-- Hero Section - Modern & Visual-First --}}
<div class="relative text-white h-screen">
    <!-- Background Image with Parallax Effect -->
    <div class="absolute inset-0 overflow-hidden">
        <img src="{{ asset('images/hero.jpeg') }}" alt="Hero Image"
            class="w-full h-full object-cover scale-105 animate-subtle-zoom">
        <!-- Gradient Overlay -->
        <div class="absolute inset-0 bg-black/70"></div>

        <!-- Animated Gradient Accent -->
        <div
            class="absolute inset-0 bg-gradient-to-tr from-indigo-600/20 via-transparent to-purple-600/20 animate-pulse">
        </div>
    </div>

    <!-- Content -->
    <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 h-full flex items-center">
        <div class="w-full text-center space-y-8 animate-fade-in">
            <!-- Badge -->
            <div
                class="inline-flex items-center gap-2 px-4 py-2 bg-white/10 backdrop-blur-md rounded-full border border-white/20 mb-4">
                <span class="w-2 h-2 bg-green-400 rounded-full animate-pulse"></span>
                <span class="text-sm font-medium">Dealer Mobil Terpercaya</span>
            </div>

            <!-- Main Heading -->
            <h1 class="text-5xl md:text-7xl font-black mb-6 leading-tight">
                <span class="block">Temukan</span>
                <span
                    class="block bg-gradient-to-r from-indigo-400 via-purple-400 to-pink-400 bg-clip-text text-transparent">
                    Mobil Impian Anda
                </span>
            </h1>

            <!-- Subheading -->
            <p class="text-lg md:text-xl text-gray-200 mb-8 max-w-2xl mx-auto leading-relaxed">
                Koleksi mobil berkualitas dengan harga terbaik.
                <span class="block mt-2 text-white/90 font-medium">Proses cepat, aman, dan terpercaya.</span>
            </p>

            <!-- CTA Buttons -->
            <div class="flex flex-col sm:flex-row gap-4 justify-center items-center">
                <a href="#cars"
                    class="group px-8 py-4 bg-white text-gray-900 font-bold rounded-xl shadow-2xl hover:shadow-white/20 hover:scale-105 transition-all duration-300 flex items-center gap-2">
                    <span>Lihat Katalog</span>
                    <svg class="w-5 h-5 group-hover:translate-x-1 transition-transform" fill="none"
                        stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M17 8l4 4m0 0l-4 4m4-4H3" />
                    </svg>
                </a>


            </div>

            <!-- Stats -->
            <div class="pt-12 grid grid-cols-3 gap-8 max-w-3xl mx-auto">
                <div class="text-center">
                    <div class="text-3xl md:text-4xl font-black text-white mb-1">500+</div>
                    <div class="text-sm text-gray-300">Mobil Terjual</div>
                </div>
                <div class="text-center border-x border-white/20">
                    <div class="text-3xl md:text-4xl font-black text-white mb-1">1000+</div>
                    <div class="text-sm text-gray-300">Pelanggan Puas</div>
                </div>
                <div class="text-center">
                    <div class="text-3xl md:text-4xl font-black text-white mb-1">10+</div>
                    <div class="text-sm text-gray-300">Tahun Pengalaman</div>
                </div>
            </div>
        </div>
    </div>

    <!-- Scroll Indicator -->
    <div class="absolute bottom-8 left-1/2 -translate-x-1/2 animate-bounce">
        <svg class="w-6 h-6 text-white/60" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 14l-7 7m0 0l-7-7m7 7V3" />
        </svg>
    </div>
</div>

<style>
    @keyframes subtle-zoom {

        0%,
        100% {
            transform: scale(1.05);
        }

        50% {
            transform: scale(1.08);
        }
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

    .animate-subtle-zoom {
        animation: subtle-zoom 20s ease-in-out infinite;
    }

    .animate-fade-in {
        animation: fade-in 1s ease-out;
    }
</style>
