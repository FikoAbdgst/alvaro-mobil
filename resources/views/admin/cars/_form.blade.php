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
        <x-input-label for="image" :value="__('Gambar Mobil')" />
        <input id="image" name="image" type="file"
            class="mt-1 block w-full border border-gray-300 rounded-md p-2" accept="image/*" />
        <x-input-error class="mt-2" :messages="$errors->get('image')" />

        @if (isset($car) && $car->image)
            <p class="mt-2 text-sm text-gray-500">Gambar saat ini:</p>
            <img src="{{ asset('storage/' . $car->image) }}" alt="Gambar {{ $car->model }}"
                class="mt-1 h-32 object-cover rounded">
        @endif
    </div>

    <div class="md:col-span-2">
        <x-input-label for="is_available" :value="__('Status Ketersediaan')" />
        <select id="is_available" name="is_available"
            class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm mt-1 block w-full"
            required>
            <option value="1" {{ old('is_available', $car->is_available ?? true) == 1 ? 'selected' : '' }}>
                Tersedia</option>
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
