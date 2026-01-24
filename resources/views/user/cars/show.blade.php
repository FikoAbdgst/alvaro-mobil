<x-app-layout>
    <div class="py-12 bg-gradient-to-br from-slate-50 via-blue-50 to-indigo-50 min-h-screen">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="mb-6">
                <a href="{{ route('home') }}"
                    class="inline-flex items-center text-indigo-600 hover:text-indigo-800 font-medium transition-colors">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                    </svg>
                    Kembali ke Katalog
                </a>
            </div>

            <div class="bg-white rounded-3xl shadow-2xl overflow-hidden">
                <div class="grid grid-cols-1 lg:grid-cols-5 gap-0">
                    <div class="lg:col-span-3 bg-gradient-to-br from-gray-100 to-gray-200 p-8">
                        <div class="sticky top-8">
                            <div class="mb-4 rounded-2xl overflow-hidden shadow-xl bg-white">
                                @if ($car->image)
                                    <img src="{{ Storage::url($car->image) }}"
                                        alt="{{ $car->brand }} {{ $car->model }}" onclick="openModal(this.src)"
                                        class="w-full h-auto object-cover cursor-pointer">
                                @else
                                    <div
                                        class="w-full h-96 bg-gradient-to-br from-gray-300 to-gray-400 flex items-center justify-center">
                                        <div class="text-center">
                                            <svg class="w-24 h-24 text-gray-500 mx-auto mb-4" fill="none"
                                                stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                            </svg>
                                            <p class="text-gray-600 font-medium">Gambar Tidak Tersedia</p>
                                        </div>
                                    </div>
                                @endif
                            </div>

                            @if ($car->images->count() > 0)
                                <div class="grid grid-cols-4 gap-3 mb-6">
                                    @foreach ($car->images as $photo)
                                        <div
                                            class="aspect-square rounded-lg overflow-hidden shadow-md border border-gray-200 bg-white">
                                            <img src="{{ Storage::url($photo->image_path) }}" alt="Galeri Mobil"
                                                onclick="openModal(this.src)"
                                                class="w-full h-full object-cover cursor-pointer hover:opacity-80 transition-opacity">
                                        </div>
                                    @endforeach
                                </div>
                            @endif

                            <div class="grid grid-cols-3 gap-4">
                                <div class="bg-white rounded-xl p-4 shadow-lg text-center">
                                    <div class="text-3xl mb-2">🚗</div>
                                    <p class="text-xs text-gray-600 font-medium">Kondisi Prima</p>
                                </div>
                                <div class="bg-white rounded-xl p-4 shadow-lg text-center">
                                    <div class="text-3xl mb-2">✅</div>
                                    <p class="text-xs text-gray-600 font-medium">Surat Lengkap</p>
                                </div>
                                <div class="bg-white rounded-xl p-4 shadow-lg text-center">
                                    <div class="text-3xl mb-2">🔧</div>
                                    <p class="text-xs text-gray-600 font-medium">Terawat Rutin</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="lg:col-span-2 p-8 lg:p-10">
                        <div class="mb-6">
                            <h1 class="text-4xl font-extrabold text-gray-900 mb-3 leading-tight flex flex-col gap-2">
                                <span>{{ $car->brand }} {{ $car->model }}</span>
                                <div>
                                    <span
                                        class="inline-block bg-green-100 text-green-700 text-sm font-bold px-4 py-2 rounded-full">
                                        {{ $car->is_available ? 'Tersedia' : 'Terjual' }}
                                    </span>
                                </div>
                            </h1>
                            <p
                                class="text-5xl font-black text-transparent bg-clip-text bg-gradient-to-r from-green-600 to-emerald-600">
                                {{ 'Rp ' . number_format($car->price, 0, ',', '.') }}
                            </p>
                        </div>

                        <div class="bg-gradient-to-br from-gray-50 to-blue-50 rounded-2xl p-6 mb-6 shadow-inner">
                            <h2 class="text-xl font-bold text-gray-900 mb-4 flex items-center">
                                <svg class="w-6 h-6 mr-2 text-indigo-600" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01" />
                                </svg>
                                Spesifikasi Lengkap
                            </h2>

                            <div class="space-y-3">
                                <div class="flex items-center justify-between py-3 border-b border-gray-200">
                                    <span class="flex items-center text-gray-600 font-medium">Merek</span>
                                    <span class="text-gray-900 font-bold">{{ $car->brand }}</span>
                                </div>
                                <div class="flex items-center justify-between py-3 border-b border-gray-200">
                                    <span class="flex items-center text-gray-600 font-medium">Model</span>
                                    <span class="text-gray-900 font-bold">{{ $car->model }}</span>
                                </div>
                                <div class="flex items-center justify-between py-3 border-b border-gray-200">
                                    <span class="flex items-center text-gray-600 font-medium">Tahun</span>
                                    <span class="text-gray-900 font-bold">{{ $car->year }}</span>
                                </div>
                                <div class="flex items-center justify-between py-3">
                                    <span class="flex items-center text-gray-600 font-medium">Warna</span>
                                    <span class="text-gray-900 font-bold">{{ $car->color }}</span>
                                </div>
                            </div>
                        </div>

                        <div class="mb-6">
                            <h2 class="text-xl font-bold text-gray-900 mb-3 flex items-center">
                                <svg class="w-6 h-6 mr-2 text-indigo-600" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M4 6h16M4 12h16M4 18h7" />
                                </svg>
                                Deskripsi
                            </h2>
                            <div class="bg-gray-50 rounded-xl p-5 shadow-inner">
                                <p class="text-gray-700 whitespace-pre-line leading-relaxed">
                                    {{ $car->description ?? 'Tidak ada deskripsi tambahan.' }}
                                </p>
                            </div>
                        </div>

                        <div class="space-y-4">
                            <a href="https://wa.me/6287875712617?text=Halo,%20saya%20tertarik%20dengan%20{{ $car->brand }}%20{{ $car->model }}"
                                target="_blank"
                                class="flex items-center justify-center w-full bg-green-600 text-white font-bold py-4 px-8 rounded-xl shadow-lg hover:bg-green-700 transition-colors">
                                <svg class="w-6 h-6 mr-3" fill="currentColor" viewBox="0 0 24 24">
                                    <path
                                        d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487Z" />
                                </svg>
                                Hubungi via WhatsApp
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div id="imageModal"
        class="fixed inset-0 z-50 hidden bg-black bg-opacity-90 flex items-center justify-center transition-opacity opacity-0"
        onclick="closeModal()">

        <button
            class="absolute top-5 right-5 text-white text-5xl font-bold cursor-pointer hover:text-gray-300 focus:outline-none"
            onclick="closeModal()">&times;</button>

        <div class="relative max-w-5xl max-h-screen p-4">
            <img id="modalImage" class="max-w-full max-h-[90vh] rounded-lg shadow-2xl" src="" alt="Preview">
        </div>
    </div>

    <script>
        const modal = document.getElementById('imageModal');
        const modalImg = document.getElementById('modalImage');

        function openModal(src) {
            // Set sumber gambar
            modalImg.src = src;

            // Tampilkan modal (hapus hidden)
            modal.classList.remove('hidden');

            // Animasi fade in
            setTimeout(() => {
                modal.classList.remove('opacity-0');
            }, 10);

            // Matikan scroll body agar tidak bisa scroll belakangnya
            document.body.style.overflow = 'hidden';
        }

        function closeModal() {
            // Animasi fade out
            modal.classList.add('opacity-0');

            // Tunggu animasi selesai baru sembunyikan
            setTimeout(() => {
                modal.classList.add('hidden');
                modalImg.src = '';
            }, 300);

            // Nyalakan scroll body kembali
            document.body.style.overflow = 'auto';
        }

        // Close dengan tombol ESC keyboard
        document.addEventListener('keydown', function(event) {
            if (event.key === "Escape") {
                closeModal();
            }
        });
    </script>
</x-app-layout>
