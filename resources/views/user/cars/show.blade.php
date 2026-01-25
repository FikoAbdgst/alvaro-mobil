<x-app-layout>
    <div class="min-h-screen bg-gradient-to-br from-gray-50 to-gray-100">
        <!-- Hero Section dengan Breadcrumb -->
        <div class="bg-indigo-600 text-white py-6 lg:py-8">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <a href="{{ route('home') }}"
                    class="inline-flex items-center text-white/90 hover:text-white font-medium transition-colors group mb-4">
                    <svg class="w-5 h-5 mr-2 transform group-hover:-translate-x-1 transition-transform" fill="none"
                        stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                    </svg>
                    Kembali
                </a>
            </div>
        </div>

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8 lg:py-12">
            <!-- Desktop: Side by Side Layout | Mobile: Stacked -->
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-6 lg:gap-8">

                <!-- Left Column: Image Gallery (Desktop: 7 cols | Mobile: Full) -->
                <div class="lg:col-span-7">
                    <div class="bg-white rounded-2xl shadow-lg p-4 lg:p-6 sticky top-6">
                        <!-- Main Image -->
                        <div class="mb-4 rounded-xl overflow-hidden shadow-md bg-gray-100 group relative">
                            @if ($car->image)
                                <div class="relative aspect-[16/10] overflow-hidden">
                                    <img src="{{ Storage::url($car->image) }}"
                                        alt="{{ $car->brand }} {{ $car->model }}" onclick="openModal(this.src)"
                                        class="w-full h-full object-cover cursor-zoom-in transition-transform duration-500 ">
                                    <div
                                        class="absolute inset-0 bg-black/0 group-hover:bg-black/5 transition-colors pointer-events-none">
                                    </div>
                                    <div
                                        class="absolute top-4 right-4 bg-white/95 backdrop-blur-sm rounded-lg px-3 py-2 shadow-lg opacity-0 group-hover:opacity-100 transition-opacity flex items-center gap-2">
                                        <svg class="w-4 h-4 text-gray-700" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0zM10 7v3m0 0v3m0-3h3m-3 0H7" />
                                        </svg>
                                        <span class="text-sm font-medium text-gray-700">Klik untuk zoom</span>
                                    </div>
                                </div>
                            @else
                                <div class="aspect-[16/10] bg-gray-200 flex items-center justify-center">
                                    <div class="text-center">
                                        <svg class="w-20 h-20 text-gray-400 mx-auto mb-3" fill="none"
                                            stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                        </svg>
                                        <p class="text-gray-500 font-medium">Gambar Tidak Tersedia</p>
                                    </div>
                                </div>
                            @endif
                        </div>

                        <!-- Gallery Thumbnails -->
                        @if ($car->images->count() > 0)
                            <div class="mb-4">
                                <div class="flex items-center justify-between mb-3">
                                    <h3 class="text-sm font-semibold text-gray-700 flex items-center gap-2">
                                        <svg class="w-4 h-4 text-indigo-600" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                        </svg>
                                        Galeri Foto ({{ $car->images->count() }})
                                    </h3>
                                    @if ($car->images->count() > 6)
                                        <button onclick="toggleGallery()" id="toggleBtn"
                                            class="text-sm font-medium text-indigo-600 hover:text-indigo-800 transition-colors flex items-center gap-1">
                                            <span id="toggleText">Lihat Semua</span>
                                            <svg id="toggleIcon" class="w-4 h-4 transition-transform" fill="none"
                                                stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M19 9l-7 7-7-7" />
                                            </svg>
                                        </button>
                                    @endif
                                </div>

                                <div id="galleryGrid" class="grid grid-cols-4 lg:grid-cols-6 gap-2 lg:gap-3">
                                    @foreach ($car->images as $index => $photo)
                                        <div class="aspect-square rounded-lg overflow-hidden shadow-sm border-2 border-gray-200 hover:border-indigo-400 bg-white gallery-item transition-all {{ $index >= 6 ? 'hidden' : '' }}"
                                            data-index="{{ $index }}">
                                            <img src="{{ Storage::url($photo->image_path) }}" alt="Galeri Mobil"
                                                onclick="openModal(this.src)"
                                                class="w-full h-full object-cover cursor-pointer hover:opacity-75 transition-opacity">
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        @endif

                        <!-- Trust Badges (Desktop Only) -->
                        <div class="hidden lg:grid grid-cols-3 gap-3 pt-4 border-t border-gray-200">
                            <div
                                class="bg-gradient-to-br from-blue-50 to-blue-100 rounded-xl p-4 text-center transform hover:scale-105 transition-transform">
                                <div class="text-3xl mb-2">🚗</div>
                                <p class="text-xs font-semibold text-gray-700">Kondisi Prima</p>
                            </div>
                            <div
                                class="bg-gradient-to-br from-green-50 to-green-100 rounded-xl p-4 text-center transform hover:scale-105 transition-transform">
                                <div class="text-3xl mb-2">✅</div>
                                <p class="text-xs font-semibold text-gray-700">Surat Lengkap</p>
                            </div>
                            <div
                                class="bg-gradient-to-br from-purple-50 to-purple-100 rounded-xl p-4 text-center transform hover:scale-105 transition-transform">
                                <div class="text-3xl mb-2">🔧</div>
                                <p class="text-xs font-semibold text-gray-700">Terawat Rutin</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Right Column: Details (Desktop: 5 cols | Mobile: Full) -->
                <div class="lg:col-span-5">
                    <div class="bg-white rounded-2xl shadow-lg p-6 lg:p-8 space-y-6">

                        <!-- Title & Status -->
                        <div>
                            <div class="flex items-start justify-between gap-3 mb-4">
                                <div>
                                    <h1 class="text-3xl lg:text-4xl font-bold text-gray-900 leading-tight mb-2">
                                        {{ $car->brand }}
                                    </h1>
                                    <p class="text-2xl lg:text-3xl font-bold text-indigo-600">
                                        {{ $car->model }}
                                    </p>
                                </div>
                                <span
                                    class="inline-flex items-center px-4 py-2 rounded-full text-sm font-bold shadow-md whitespace-nowrap {{ $car->is_available ? 'bg-emerald-500 text-white' : 'bg-gray-300 text-gray-700' }}">
                                    <span
                                        class="w-2 h-2 rounded-full mr-2 {{ $car->is_available ? 'bg-white animate-pulse' : 'bg-gray-600' }}"></span>
                                    {{ $car->is_available ? 'Tersedia' : 'Terjual' }}
                                </span>
                            </div>

                            <!-- Price Badge -->
                            <div class="bg-green-600 rounded-2xl p-6 shadow-xl">
                                <p class="text-sm font-medium text-white/90 mb-1">Harga</p>
                                <p class="text-4xl lg:text-5xl font-black text-white">
                                    {{ 'Rp ' . number_format($car->price, 0, ',', '.') }}
                                </p>
                            </div>
                        </div>

                        <!-- Specifications Card -->
                        <div
                            class="bg-gradient-to-br from-indigo-50 to-blue-50 rounded-2xl p-6 border border-indigo-100">
                            <h2 class="text-lg font-bold text-gray-900 mb-4 flex items-center">
                                <div class="bg-indigo-600 rounded-lg p-2 mr-3">
                                    <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
                                    </svg>
                                </div>
                                Spesifikasi Kendaraan
                            </h2>

                            <div class="space-y-3">
                                <div
                                    class="flex items-center justify-between py-3 px-4 bg-white rounded-xl hover:shadow-md transition-shadow">
                                    <span class="flex items-center text-gray-600 font-medium text-sm">
                                        <svg class="w-5 h-5 mr-3 text-indigo-500" fill="none"
                                            stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z" />
                                        </svg>
                                        Merek
                                    </span>
                                    <span class="text-gray-900 font-bold">{{ $car->brand }}</span>
                                </div>
                                <div
                                    class="flex items-center justify-between py-3 px-4 bg-white rounded-xl hover:shadow-md transition-shadow">
                                    <span class="flex items-center text-gray-600 font-medium text-sm">
                                        <svg class="w-5 h-5 mr-3 text-indigo-500" fill="none"
                                            stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                        </svg>
                                        Model
                                    </span>
                                    <span class="text-gray-900 font-bold">{{ $car->model }}</span>
                                </div>
                                <div
                                    class="flex items-center justify-between py-3 px-4 bg-white rounded-xl hover:shadow-md transition-shadow">
                                    <span class="flex items-center text-gray-600 font-medium text-sm">
                                        <svg class="w-5 h-5 mr-3 text-indigo-500" fill="none"
                                            stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                        </svg>
                                        Tahun
                                    </span>
                                    <span class="text-gray-900 font-bold">{{ $car->year }}</span>
                                </div>
                                <div
                                    class="flex items-center justify-between py-3 px-4 bg-white rounded-xl hover:shadow-md transition-shadow">
                                    <span class="flex items-center text-gray-600 font-medium text-sm">
                                        <svg class="w-5 h-5 mr-3 text-indigo-500" fill="none"
                                            stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M7 21a4 4 0 01-4-4V5a2 2 0 012-2h4a2 2 0 012 2v12a4 4 0 01-4 4zm0 0h12a2 2 0 002-2v-4a2 2 0 00-2-2h-2.343M11 7.343l1.657-1.657a2 2 0 012.828 0l2.829 2.829a2 2 0 010 2.828l-8.486 8.485M7 17h.01" />
                                        </svg>
                                        Warna
                                    </span>
                                    <span class="text-gray-900 font-bold">{{ $car->color }}</span>
                                </div>
                            </div>
                        </div>

                        <!-- Description -->
                        <div>
                            <h2 class="text-lg font-bold text-gray-900 mb-3 flex items-center">
                                <div class="bg-purple-600 rounded-lg p-2 mr-3">
                                    <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M4 6h16M4 12h16M4 18h7" />
                                    </svg>
                                </div>
                                Deskripsi
                            </h2>
                            <div class="bg-gray-50 rounded-xl p-5 border border-gray-200">
                                <p class="text-gray-700 whitespace-pre-line leading-relaxed text-sm">
                                    {{ $car->description ?? 'Tidak ada deskripsi tambahan. Hubungi kami untuk informasi lebih lanjut mengenai mobil ini.' }}
                                </p>
                            </div>
                        </div>

                        <!-- CTA Button -->
                        @php
                            $message = "Halo Admin, saya tertarik dengan mobil ini:\n\n";
                            $message .= '*Merek:* ' . $car->brand . "\n";
                            $message .= '*Model:* ' . $car->model . "\n";
                            $message .= '*Tahun:* ' . $car->year . "\n";
                            $message .= '*Harga:* Rp ' . number_format($car->price, 0, ',', '.') . "\n\n";
                            $message .= 'Apakah unit ini masih tersedia?';

                            $encodedMessage = urlencode($message);
                            $phoneNumber = '6287875712617';
                        @endphp

                        <div class="pt-4">
                            <a href="https://wa.me/{{ $phoneNumber }}?text={{ $encodedMessage }}" target="_blank"
                                class="flex items-center justify-center w-full bg-[#25D366] hover:bg-[#20bd5a] text-white font-bold py-4 px-6 rounded-xl shadow-lg transform transition-all group">
                                <svg class="w-6 h-6 mr-3  transition-transform" fill="currentColor"
                                    viewBox="0 0 24 24">
                                    <path
                                        d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347z" />
                                </svg>
                                <span class="text-lg">Hubungi via WhatsApp</span>
                            </a>
                            <p class="text-center text-xs text-gray-500 mt-3">
                                💬 Respon cepat dari admin kami
                            </p>
                        </div>

                        <!-- Trust Badges Mobile -->
                        <div class="lg:hidden grid grid-cols-3 gap-3 pt-4 border-t border-gray-200">
                            <div class="flex flex-col items-center">
                                <div class="bg-blue-100 rounded-full p-3 mb-2">
                                    <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                                    </svg>
                                </div>
                                <p class="text-xs font-semibold text-gray-700">Terpercaya</p>
                            </div>
                            <div class="flex flex-col items-center">
                                <div class="bg-green-100 rounded-full p-3 mb-2">
                                    <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M5 13l4 4L19 7" />
                                    </svg>
                                </div>
                                <p class="text-xs font-semibold text-gray-700">Berkualitas</p>
                            </div>
                            <div class="flex flex-col items-center">
                                <div class="bg-purple-100 rounded-full p-3 mb-2">
                                    <svg class="w-6 h-6 text-purple-600" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                </div>
                                <p class="text-xs font-semibold text-gray-700">Fast Respon</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Image Modal -->
    <div id="imageModal"
        class="fixed inset-0 z-50 hidden bg-black/95 backdrop-blur-sm flex items-center justify-center transition-opacity opacity-0"
        onclick="closeModal()">

        <button
            class="absolute top-4 right-4 sm:top-8 sm:right-8 text-white bg-white/10 hover:bg-white/20 rounded-full p-3 sm:p-4 backdrop-blur-md transition-all hover:rotate-90 focus:outline-none group z-10"
            onclick="closeModal()">
            <svg class="w-6 h-6 sm:w-8 sm:h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
            </svg>
        </button>

        <div
            class="absolute top-4 left-4 sm:top-8 sm:left-8 text-white bg-white/10 backdrop-blur-md rounded-full px-4 py-2 text-sm font-medium">
            <svg class="w-4 h-4 inline mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0zM10 7v3m0 0v3m0-3h3m-3 0H7" />
            </svg>
            Klik untuk menutup
        </div>

        <div class="relative max-w-7xl max-h-screen p-4 sm:p-8" onclick="event.stopPropagation()">
            <img id="modalImage" class="max-w-full max-h-[90vh] rounded-2xl shadow-2xl ring-4 ring-white/20"
                src="" alt="Preview">
        </div>
    </div>

    <script>
        const modal = document.getElementById('imageModal');
        const modalImg = document.getElementById('modalImage');

        function openModal(src) {
            modalImg.src = src;
            modal.classList.remove('hidden');
            setTimeout(() => {
                modal.classList.remove('opacity-0');
            }, 10);
            document.body.style.overflow = 'hidden';
        }

        function closeModal() {
            modal.classList.add('opacity-0');
            setTimeout(() => {
                modal.classList.add('hidden');
                modalImg.src = '';
            }, 300);
            document.body.style.overflow = 'auto';
        }

        document.addEventListener('keydown', function(event) {
            if (event.key === "Escape") {
                closeModal();
            }
        });

        // Toggle gallery function
        let isExpanded = false;

        function toggleGallery() {
            const galleryItems = document.querySelectorAll('.gallery-item');
            const toggleText = document.getElementById('toggleText');
            const toggleIcon = document.getElementById('toggleIcon');

            isExpanded = !isExpanded;

            galleryItems.forEach((item, index) => {
                if (index >= 6) {
                    if (isExpanded) {
                        item.classList.remove('hidden');
                    } else {
                        item.classList.add('hidden');
                    }
                }
            });

            if (isExpanded) {
                toggleText.textContent = 'Tutup';
                toggleIcon.style.transform = 'rotate(180deg)';
            } else {
                toggleText.textContent = 'Lihat Semua';
                toggleIcon.style.transform = 'rotate(0deg)';
            }
        }
    </script>

    <style>
        @media print {
            body * {
                visibility: hidden;
            }

            .max-w-7xl,
            .max-w-7xl * {
                visibility: visible;
            }

            .max-w-7xl {
                position: absolute;
                left: 0;
                top: 0;
            }
        }
    </style>
</x-app-layout>
