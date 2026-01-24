@csrf
<div class="grid grid-cols-1 md:grid-cols-2 gap-6">
    <div>
        <x-input-label for="brand" :value="__('Merek')" />
        <x-text-input id="brand" name="brand" type="text" class="mt-1 block w-full" :value="old('brand', $car->brand ?? '')" required
            autofocus />
        <x-input-error class="mt-2" :messages="$errors->get('brand')" />
    </div>

    <div>
        <x-input-label for="model" :value="__('Model')" />
        <x-text-input id="model" name="model" type="text" class="mt-1 block w-full" :value="old('model', $car->model ?? '')" required />
        <x-input-error class="mt-2" :messages="$errors->get('model')" />
    </div>

    <div>
        <x-input-label for="year" :value="__('Tahun')" />
        <x-text-input id="year" name="year" type="number" class="mt-1 block w-full" :value="old('year', $car->year ?? '')" required
            min="1900" max="{{ date('Y') + 1 }}" />
        <x-input-error class="mt-2" :messages="$errors->get('year')" />
    </div>

    <div>
        <x-input-label for="color" :value="__('Warna')" />
        <x-text-input id="color" name="color" type="text" class="mt-1 block w-full" :value="old('color', $car->color ?? '')"
            required />
        <x-input-error class="mt-2" :messages="$errors->get('color')" />
    </div>

    <div class="md:col-span-2">
        <x-input-label for="price" :value="__('Harga (Rp)')" />
        <x-text-input id="price" name="price" type="number" class="mt-1 block w-full" :value="old('price', $car->price ?? '')" required
            min="1000000" />
        <x-input-error class="mt-2" :messages="$errors->get('price')" />
    </div>

    <div class="md:col-span-2">
        <x-input-label for="description" :value="__('Deskripsi')" />
        <textarea id="description" name="description" rows="3"
            class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm mt-1 block w-full">{{ old('description', $car->description ?? '') }}</textarea>
        <x-input-error class="mt-2" :messages="$errors->get('description')" />
    </div>

    <div class="md:col-span-2">
        <x-input-label for="image" :value="__('Gambar Mobil (Utama)')" />
        <input id="image" name="image" type="file"
            class="mt-1 block w-full border border-gray-300 rounded-md p-2" accept="image/*" />
        <x-input-error class="mt-2" :messages="$errors->get('image')" />

        @if (isset($car) && $car->image)
            <div class="mt-2 p-2 border rounded bg-gray-50">
                <p class="text-sm text-gray-500 mb-2">Gambar Utama Saat Ini:</p>
                <img src="{{ asset('storage/' . $car->image) }}" alt="Gambar Utama"
                    class="h-32 object-cover rounded shadow-sm">
            </div>
        @endif
    </div>

    <div class="md:col-span-2">
        <x-input-label for="images" :value="__('Galeri Foto Tambahan')" />
        <input id="images" name="images[]" type="file" multiple
            class="mt-1 block w-full border border-gray-300 rounded-md p-2" accept="image/*" />
        <p class="text-xs text-gray-500 mt-1">Anda dapat memilih lebih dari satu foto sekaligus.</p>
        <x-input-error class="mt-2" :messages="$errors->get('images')" />

        @if (isset($car) && $car->images->count() > 0)
            <div class="mt-4 p-4 border rounded bg-gray-50">
                <p class="text-sm text-gray-500 mb-3">Galeri Foto Saat Ini (Hover untuk hapus):</p>

                <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
                    @foreach ($car->images as $gallery)
                        <div id="gallery-item-{{ $gallery->id }}"
                            class="relative group w-full h-32 rounded border shadow-sm overflow-hidden">

                            <img src="{{ asset('storage/' . $gallery->image_path) }}"
                                class="w-full h-full object-cover transition duration-300 group-hover:scale-105">

                            <div
                                class="absolute inset-0 bg-black bg-opacity-60 opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-center justify-center">
                                <button type="button"
                                    onclick="deleteGalleryImage({{ $gallery->id }}, '{{ route('admin.cars.images.destroy', $gallery->id) }}')"
                                    class="text-white bg-red-600 hover:bg-red-700 p-2 rounded-full shadow-lg transform transition hover:scale-110 focus:outline-none"
                                    title="Hapus Foto Ini">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                    </svg>
                                </button>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        @endif
    </div>

    <script>
        function deleteGalleryImage(id, url) {
            if (confirm('Apakah Anda yakin ingin menghapus foto ini?')) {
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
                            // Hapus elemen HTML dari tampilan dengan efek fade out
                            const element = document.getElementById('gallery-item-' + id);
                            element.style.transition = "opacity 0.5s ease";
                            element.style.opacity = 0;
                            setTimeout(() => element.remove(), 500);
                        } else {
                            alert('Gagal menghapus gambar. Silakan coba lagi.');
                        }
                    })
                    .catch(error => {
                        console.error('Error:', error);
                        alert('Terjadi kesalahan sistem.');
                    });
            }
        }
    </script>
    <div class="md:col-span-2">
        <x-input-label for="is_available" :value="__('Status Ketersediaan')" />
        <select id="is_available" name="is_available"
            class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm mt-1 block w-full"
            required>
            <option value="1" {{ old('is_available', $car->is_available ?? true) == 1 ? 'selected' : '' }}>Tersedia
            </option>
            <option value="0" {{ old('is_available', $car->is_available ?? false) == 0 ? 'selected' : '' }}>
                Terjual/Tidak Tersedia</option>
        </select>
        <x-input-error class="mt-2" :messages="$errors->get('is_available')" />
    </div>
</div>

<div class="flex items-center justify-end mt-6">
    <a href="{{ route('admin.cars.index') }}" class="mr-4 text-sm text-gray-600 hover:text-gray-900">Batal</a>
    <x-primary-button>
        {{ isset($car) ? __('Perbarui Data Mobil') : __('Simpan Mobil Baru') }}
    </x-primary-button>
</div>
