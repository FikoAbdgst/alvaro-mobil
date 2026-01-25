{{-- Gallery Section - Simple Carousel --}}
<section class="py-20 bg-zinc-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

        {{-- Header Section --}}
        <div class="text-center mb-12 space-y-4">
            <span class="inline-block px-4 py-1.5 bg-indigo-600 text-white text-sm font-bold rounded-full">
                Testimoni
            </span>
            <h2 class="text-4xl md:text-5xl font-black text-zinc-900 leading-tight">
                Cerita Pelanggan
                <span
                    class="block mt-2 bg-gradient-to-r from-indigo-600 via-purple-600 to-indigo-600 bg-clip-text text-transparent">
                    Kami
                </span>
            </h2>
            <p class="text-lg text-zinc-600 max-w-2xl mx-auto">
                Testimoni dari pelanggan yang telah mempercayakan mobil impian mereka kepada kami
            </p>
        </div>

        @if ($galleries->isEmpty())
            {{-- Empty State --}}
            <div class="max-w-md mx-auto text-center py-16">
                <div class="relative w-24 h-24 mx-auto mb-6">
                    <div class="absolute inset-0 bg-indigo-500/20 rounded-full blur-xl"></div>
                    <div
                        class="relative w-full h-full bg-indigo-50 rounded-full flex items-center justify-center border border-indigo-100">
                        <svg class="w-12 h-12 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                        </svg>
                    </div>
                </div>
                <h3 class="text-2xl font-bold text-zinc-900 mb-2">Belum Ada Testimoni</h3>
                <p class="text-zinc-600">Testimoni pelanggan akan ditampilkan di sini.</p>
            </div>
        @else
            <div class="relative">
                {{-- Container Wrapper --}}
                <div class="md:overflow-hidden md:-mx-3">
                    {{-- Mobile: Horizontal Scroll | Desktop: Carousel --}}
                    <div id="galleryCarousel"
                        class="flex overflow-x-auto md:overflow-visible gap-6 pb-6 px-4 -mx-4 snap-x snap-mandatory md:gap-0 md:snap-none md:pb-0 md:px-0 md:mx-0 md:transition-transform md:duration-500 md:ease-out scrollbar-hide">
                        @foreach ($galleries->take(9) as $gallery)
                            {{-- Mobile: 66.67vw | Desktop: calc(100% / 3) with padding --}}
                            <div class="flex-shrink-0 w-[66.67vw] md:w-1/3 snap-center md:snap-align-none md:px-3">
                                <div
                                    class="bg-white rounded-2xl shadow-md border border-gray-100 overflow-hidden hover:shadow-xl transition-all duration-300 group h-full">
                                    {{-- Image Container --}}
                                    <div class="relative aspect-[4/3] bg-gray-200 overflow-hidden">
                                        <img src="{{ asset('storage/' . $gallery->image_path) }}"
                                            alt="{{ $gallery->caption ?? 'Testimoni Pelanggan' }}"
                                            class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-105">

                                        {{-- Gradient Overlay on Hover --}}
                                        <div
                                            class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                                        </div>
                                    </div>

                                    {{-- Caption Section --}}
                                    @if ($gallery->caption)
                                        <div class="p-5">
                                            <div class="flex items-start gap-3">
                                                <div
                                                    class="flex-shrink-0 w-10 h-10 bg-indigo-100 rounded-full flex items-center justify-center">
                                                    <svg class="w-5 h-5 text-indigo-600" fill="currentColor"
                                                        viewBox="0 0 24 24">
                                                        <path
                                                            d="M14.017 21v-7.391c0-5.704 3.731-9.57 8.983-10.609l.995 2.151c-2.432.917-3.995 3.638-3.995 5.849h4v10h-9.983zm-14.017 0v-7.391c0-5.704 3.748-9.57 9-10.609l.996 2.151c-2.433.917-3.996 3.638-3.996 5.849h3.983v10h-9.983z" />
                                                    </svg>
                                                </div>
                                                <p class="text-zinc-700 text-sm leading-relaxed line-clamp-3">
                                                    {{ $gallery->caption }}
                                                </p>
                                            </div>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>

                {{-- Navigation Arrows - Desktop Only --}}
                <button id="prevBtn"
                    class="hidden md:flex absolute left-0 top-1/2 -translate-y-1/2 -translate-x-4 w-12 h-12 bg-indigo-600 rounded-full shadow-lg items-center justify-center hover:bg-indigo-800 transition-all z-10 border border-zinc-200 disabled:opacity-50 disabled:cursor-not-allowed">
                    <svg class="w-6 h-6 text-zinc-100" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                    </svg>
                </button>
                <button id="nextBtn"
                    class="hidden md:flex absolute right-0 top-1/2 -translate-y-1/2 translate-x-4 w-12 h-12 bg-indigo-600 rounded-full shadow-lg items-center justify-center hover:bg-indigo-800 transition-all z-10 border border-zinc-200 disabled:opacity-50 disabled:cursor-not-allowed">
                    <svg class="w-6 h-6 text-zinc-100" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                    </svg>
                </button>
            </div>

            {{-- Scroll Indicator Dots - Desktop Only --}}
            <div id="dotsContainer" class="hidden md:flex justify-center gap-2 mt-8">
                {{-- Dots will be generated by JavaScript --}}
            </div>
        @endif
    </div>
</section>

<style>
    /* Hide scrollbar */
    .scrollbar-hide::-webkit-scrollbar {
        display: none;
    }

    .scrollbar-hide {
        -ms-overflow-style: none;
        scrollbar-width: none;
    }
</style>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const carousel = document.getElementById('galleryCarousel');
        const prevBtn = document.getElementById('prevBtn');
        const nextBtn = document.getElementById('nextBtn');
        const dotsContainer = document.getElementById('dotsContainer');

        if (!carousel) return;

        const items = carousel.children;
        const totalItems = items.length;

        // Only apply carousel logic for desktop
        const isDesktop = () => window.innerWidth >= 768;

        let currentIndex = 0;
        const itemsPerSlide = 3;
        const desktopSlides = Math.ceil(totalItems / itemsPerSlide);

        // Create dots (desktop only)
        function createDots() {
            if (!isDesktop()) return;

            dotsContainer.innerHTML = '';

            for (let i = 0; i < desktopSlides; i++) {
                const dot = document.createElement('button');
                dot.className =
                    `w-2 h-2 rounded-full transition-all ${i === 0 ? 'bg-indigo-600 w-8' : 'bg-zinc-300'}`;
                dot.setAttribute('data-index', i);
                dot.addEventListener('click', () => goToSlide(i));
                dotsContainer.appendChild(dot);
            }
        }

        // Update dots
        function updateDots() {
            if (!isDesktop()) return;

            const dots = dotsContainer.children;
            for (let i = 0; i < dots.length; i++) {
                if (i === currentIndex) {
                    dots[i].className = 'w-8 h-2 rounded-full bg-indigo-600 transition-all';
                } else {
                    dots[i].className = 'w-2 h-2 rounded-full bg-zinc-300 transition-all';
                }
            }
        }

        // Update carousel position (desktop only)
        function updateCarousel() {
            if (!isDesktop()) return;

            // Calculate the width of container including padding
            const containerWidth = carousel.parentElement.offsetWidth;
            const offset = -currentIndex * containerWidth;

            carousel.style.transform = `translateX(${offset}px)`;
            updateDots();
            updateButtons();
        }

        // Update button states
        function updateButtons() {
            if (!isDesktop() || !prevBtn || !nextBtn) return;

            prevBtn.disabled = currentIndex === 0;
            nextBtn.disabled = currentIndex >= desktopSlides - 1;
        }

        // Go to specific slide (desktop only)
        function goToSlide(index) {
            if (!isDesktop()) return;

            currentIndex = Math.max(0, Math.min(index, desktopSlides - 1));
            updateCarousel();
        }

        // Previous slide (desktop only)
        function prevSlide() {
            if (!isDesktop()) return;

            if (currentIndex > 0) {
                currentIndex--;
                updateCarousel();
            }
        }

        // Next slide (desktop only)
        function nextSlide() {
            if (!isDesktop()) return;

            if (currentIndex < desktopSlides - 1) {
                currentIndex++;
                updateCarousel();
            }
        }

        // Event listeners (desktop only)
        if (prevBtn) prevBtn.addEventListener('click', prevSlide);
        if (nextBtn) nextBtn.addEventListener('click', nextSlide);

        // Handle window resize
        let resizeTimer;
        window.addEventListener('resize', () => {
            clearTimeout(resizeTimer);
            resizeTimer = setTimeout(() => {
                if (isDesktop()) {
                    currentIndex = 0;
                    createDots();
                    updateCarousel();
                } else {
                    // Reset transform for mobile
                    carousel.style.transform = '';
                    dotsContainer.innerHTML = '';
                }
            }, 250);
        });

        // Initialize only for desktop
        if (isDesktop()) {
            createDots();
            updateCarousel();
        }
    });
</script>
