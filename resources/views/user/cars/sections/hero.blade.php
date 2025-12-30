<div class="relative text-white h-[70vh] md:h-[80vh]">
    <!-- Background Image -->
    <div class="absolute inset-0">
        <img src="{{ asset('images/hero.jpeg') }}" alt="Hero Image" class="w-full h-full object-cover">
        <!-- Black Overlay -->
        <div class="absolute inset-0 bg-black/70"></div>
    </div>

    <!-- Content -->
    <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 h-full flex items-center">
        <div class="w-full text-center">
            <h1 class="text-4xl md:text-6xl font-extrabold mb-6">
                Temukan Mobil Impian Anda
            </h1>
            <p class="text-lg md:text-2xl text-gray-200 mb-8 max-w-3xl mx-auto">
                Koleksi mobil berkualitas dengan harga terbaik. Proses cepat, aman, dan terpercaya.
            </p>

            <div class="flex flex-col sm:flex-row gap-4 justify-center">
                <a href="#cars"
                    class="px-8 py-4 bg-white text-indigo-600 font-bold rounded-xl shadow-lg hover:bg-gray-100 transition">
                    Lihat Katalog
                </a>

                <a href="https://wa.me/6281234567890" target="_blank"
                    class="px-8 py-4 bg-green-500 text-white font-bold rounded-xl shadow-lg hover:bg-green-600 transition">
                    Hubungi Kami
                </a>
            </div>
        </div>
    </div>
</div>
