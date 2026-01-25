@csrf
<div class="space-y-8">
    <!-- Informasi Dasar -->
    <div class="bg-white rounded-lg border border-gray-200 p-6">
        <h3 class="text-lg font-semibold text-gray-900 mb-4 flex items-center">
            <svg class="w-5 h-5 mr-2 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
            </svg>
            Informasi Dasar
        </h3>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
                <x-input-label for="brand" :value="__('Merek')" class="font-medium" />
                <x-text-input id="brand" name="brand" type="text" class="mt-2 block w-full" :value="old('brand', $car->brand ?? '')"
                    required autofocus placeholder="Contoh: Toyota, Honda, BMW" />
                <x-input-error class="mt-2" :messages="$errors->get('brand')" />
            </div>

            <div>
                <x-input-label for="model" :value="__('Model')" class="font-medium" />
                <x-text-input id="model" name="model" type="text" class="mt-2 block w-full" :value="old('model', $car->model ?? '')"
                    required placeholder="Contoh: Avanza, Civic, X5" />
                <x-input-error class="mt-2" :messages="$errors->get('model')" />
            </div>

            <div>
                <x-input-label for="year" :value="__('Tahun')" class="font-medium" />
                <x-text-input id="year" name="year" type="number" class="mt-2 block w-full" :value="old('year', $car->year ?? '')"
                    required min="1900" max="{{ date('Y') + 1 }}" placeholder="{{ date('Y') }}" />
                <x-input-error class="mt-2" :messages="$errors->get('year')" />
            </div>

            <div>
                <x-input-label for="color" :value="__('Warna')" class="font-medium" />
                <x-text-input id="color" name="color" type="text" class="mt-2 block w-full" :value="old('color', $car->color ?? '')"
                    required placeholder="Contoh: Hitam, Putih, Merah" />
                <x-input-error class="mt-2" :messages="$errors->get('color')" />
            </div>
        </div>
    </div>

    <!-- Harga & Status -->
    <div class="bg-white rounded-lg border border-gray-200 p-6">
        <h3 class="text-lg font-semibold text-gray-900 mb-4 flex items-center">
            <svg class="w-5 h-5 mr-2 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
            </svg>
            Harga & Ketersediaan
        </h3>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
                <x-input-label for="price" :value="__('Harga')" class="font-medium" />
                <div class="relative mt-2">
                    <span class="absolute inset-y-0 left-0 pl-3 flex items-center text-gray-500 font-medium">
                        Rp
                    </span>
                    <input id="price_display" type="text"
                        class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm block w-full pl-12"
                        placeholder="150.000.000" oninput="formatRupiah(this)" />
                    <input id="price" name="price" type="hidden" value="{{ old('price', $car->price ?? '') }}"
                        required />
                </div>
                <x-input-error class="mt-2" :messages="$errors->get('price')" />
            </div>

            <div>
                <x-input-label for="is_available" :value="__('Status Ketersediaan')" class="font-medium" />
                <select id="is_available" name="is_available"
                    class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm mt-2 block w-full"
                    required>
                    <option value="1" {{ old('is_available', $car->is_available ?? true) == 1 ? 'selected' : '' }}>
                        ✓ Tersedia
                    </option>
                    <option value="0"
                        {{ old('is_available', $car->is_available ?? false) == 0 ? 'selected' : '' }}>
                        ✗ Terjual/Tidak Tersedia
                    </option>
                </select>
                <x-input-error class="mt-2" :messages="$errors->get('is_available')" />
            </div>
        </div>

        <div class="mt-6">
            <x-input-label for="description" :value="__('Deskripsi')" class="font-medium" />
            <textarea id="description" name="description" rows="4"
                class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm mt-2 block w-full"
                placeholder="Jelaskan kondisi mobil, fitur-fitur, dan informasi penting lainnya...">{{ old('description', $car->description ?? '') }}</textarea>
            <x-input-error class="mt-2" :messages="$errors->get('description')" />
        </div>
    </div>

    <!-- Gambar Utama -->
    <div class="bg-white rounded-lg border border-gray-200 p-6">
        <h3 class="text-lg font-semibold text-gray-900 mb-4 flex items-center">
            <svg class="w-5 h-5 mr-2 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
            </svg>
            Gambar Utama
        </h3>

        @if (isset($car) && $car->image)
            <div class="mb-4 relative group">
                <img src="{{ asset('storage/' . $car->image) }}" alt="Gambar Utama"
                    class="w-full max-w-md h-48 object-cover rounded-lg shadow-md border-2 border-gray-200">
                <div
                    class="absolute top-2 left-2 bg-indigo-600 text-white text-xs font-semibold px-3 py-1 rounded-full">
                    Gambar Saat Ini
                </div>
            </div>
        @endif

        <div class="relative">
            <input id="image" name="image" type="file" class="hidden" accept="image/*"
                onchange="previewMainImage(event)" />
            <label for="image"
                class="flex flex-col items-center justify-center w-full h-32 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 hover:bg-gray-100 transition">
                <div class="flex flex-col items-center justify-center pt-5 pb-6">
                    <svg class="w-10 h-10 mb-3 text-gray-400" fill="none" stroke="currentColor"
                        viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12" />
                    </svg>
                    <p class="mb-2 text-sm text-gray-500"><span class="font-semibold">Klik untuk upload</span> atau
                        drag & drop</p>
                    <p class="text-xs text-gray-500">PNG, JPG atau JPEG (MAX. 5MB)</p>
                </div>
            </label>
        </div>

        <div id="main-preview" class="mt-4 hidden">
            <p class="text-sm font-medium text-gray-700 mb-2">Preview:</p>
            <img id="main-preview-image"
                class="w-full max-w-md h-48 object-cover rounded-lg shadow-md border-2 border-indigo-200">
        </div>

        <x-input-error class="mt-2" :messages="$errors->get('image')" />
    </div>

    <!-- Galeri Foto -->
    <div class="bg-white rounded-lg border border-gray-200 p-6">
        <h3 class="text-lg font-semibold text-gray-900 mb-4 flex items-center">
            <svg class="w-5 h-5 mr-2 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
            </svg>
            Galeri Foto Tambahan
        </h3>

        @if (isset($car) && $car->images->count() > 0)
            <div class="mb-6">
                <div class="flex items-center justify-between mb-3">
                    <p class="text-sm font-medium text-gray-700">
                        Foto Tersimpan ({{ $car->images->count() }} foto)
                    </p>
                </div>

                <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-4 gap-4">
                    @foreach ($car->images as $gallery)
                        <div id="gallery-item-{{ $gallery->id }}"
                            class="relative group rounded-lg overflow-hidden shadow-md hover:shadow-xl transition-shadow duration-300">

                            <div class="aspect-square">
                                <img src="{{ asset('storage/' . $gallery->image_path) }}"
                                    class="w-full h-full object-cover transition duration-300 group-hover:scale-110">
                            </div>

                            <div
                                class="absolute inset-0 bg-gradient-to-t from-black/70 via-black/20 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                                <div class="absolute bottom-0 left-0 right-0 p-3 flex justify-center">
                                    <button type="button"
                                        onclick="deleteGalleryImage({{ $gallery->id }}, '{{ route('admin.cars.images.destroy', $gallery->id) }}')"
                                        class="bg-red-600 hover:bg-red-700 text-white px-4 py-2 rounded-lg shadow-lg transform transition hover:scale-105 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2 flex items-center gap-2"
                                        title="Hapus Foto">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                                            viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                        </svg>
                                        <span class="text-sm font-medium">Hapus</span>
                                    </button>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        @endif

        <div class="relative">
            <input id="images" name="images[]" type="file" multiple class="hidden" accept="image/*"
                onchange="previewGalleryImages(event)" />
            <label for="images"
                class="flex flex-col items-center justify-center w-full h-32 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 hover:bg-gray-100 transition">
                <div class="flex flex-col items-center justify-center pt-5 pb-6">
                    <svg class="w-10 h-10 mb-3 text-gray-400" fill="none" stroke="currentColor"
                        viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12" />
                    </svg>
                    <p class="mb-2 text-sm text-gray-500"><span class="font-semibold">Pilih beberapa foto
                            sekaligus</span></p>
                    <p class="text-xs text-gray-500">PNG, JPG atau JPEG (MAX. 5MB per file)</p>
                </div>
            </label>
        </div>

        <div id="gallery-preview" class="mt-4 hidden">
            <p class="text-sm font-medium text-gray-700 mb-2">Preview Foto Baru:</p>
            <div id="gallery-preview-container" class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-4 gap-4"></div>
        </div>

        <x-input-error class="mt-2" :messages="$errors->get('images')" />
    </div>
</div>

<!-- Action Buttons -->
<div class="flex items-center justify-between mt-8 pt-6 border-t border-gray-200">
    <a href="{{ route('admin.cars.index') }}"
        class="inline-flex items-center px-4 py-2 border border-gray-300 rounded-lg text-sm font-medium text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 transition">
        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
        </svg>
        Batal
    </a>

    <x-primary-button class="inline-flex items-center px-6 py-3 text-sm font-medium">
        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
        </svg>
        {{ isset($car) ? __('Perbarui Data Mobil') : __('Simpan Mobil Baru') }}
    </x-primary-button>
</div>

<script>
    // Format input harga ke Rupiah
    function formatRupiah(input) {
        // Ambil nilai input dan hapus semua karakter non-digit
        let value = input.value.replace(/\D/g, '');

        // Update hidden input dengan nilai murni (tanpa format)
        document.getElementById('price').value = value;

        // Format dengan separator ribuan
        let formatted = value.replace(/\B(?=(\d{3})+(?!\d))/g, '.');

        // Update tampilan
        input.value = formatted;
    }

    // Inisialisasi format harga saat halaman dimuat
    document.addEventListener('DOMContentLoaded', function() {
        const priceInput = document.getElementById('price');
        const priceDisplay = document.getElementById('price_display');

        // Jika ada nilai dari server (edit mode), format tampilkan
        if (priceInput.value) {
            let value = priceInput.value.replace(/\D/g, '');
            priceDisplay.value = value.replace(/\B(?=(\d{3})+(?!\d))/g, '.');
        }
    });

    // Preview gambar utama
    function previewMainImage(event) {
        const file = event.target.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = function(e) {
                document.getElementById('main-preview').classList.remove('hidden');
                document.getElementById('main-preview-image').src = e.target.result;
            }
            reader.readAsDataURL(file);
        }
    }

    // Preview galeri foto
    function previewGalleryImages(event) {
        const files = event.target.files;
        const container = document.getElementById('gallery-preview-container');
        container.innerHTML = '';

        if (files.length > 0) {
            document.getElementById('gallery-preview').classList.remove('hidden');

            Array.from(files).forEach((file, index) => {
                const reader = new FileReader();
                reader.onload = function(e) {
                    const div = document.createElement('div');
                    div.className = 'relative group rounded-lg overflow-hidden shadow-md';
                    div.innerHTML = `
                        <div class="aspect-square">
                            <img src="${e.target.result}" class="w-full h-full object-cover">
                        </div>
                        <div class="absolute top-2 right-2 bg-indigo-600 text-white text-xs font-semibold px-2 py-1 rounded-full">
                            Baru
                        </div>
                    `;
                    container.appendChild(div);
                }
                reader.readAsDataURL(file);
            });
        }
    }

    // Hapus foto galeri
    function deleteGalleryImage(id, url) {
        if (confirm('Apakah Anda yakin ingin menghapus foto ini?')) {
            const element = document.getElementById('gallery-item-' + id);
            element.style.opacity = '0.5';
            element.style.pointerEvents = 'none';

            fetch(url, {
                    method: 'DELETE',
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}',
                        'Content-Type': 'application/json',
                        'Accept': 'application/json'
                    }
                })
                .then(response => {
                    if (response.ok) {
                        element.style.transition = "all 0.5s ease";
                        element.style.transform = "scale(0)";
                        element.style.opacity = "0";
                        setTimeout(() => element.remove(), 500);
                    } else {
                        element.style.opacity = '1';
                        element.style.pointerEvents = 'auto';
                        alert('Gagal menghapus gambar. Silakan coba lagi.');
                    }
                })
                .catch(error => {
                    element.style.opacity = '1';
                    element.style.pointerEvents = 'auto';
                    console.error('Error:', error);
                    alert('Terjadi kesalahan sistem.');
                });
        }
    }
</script>
