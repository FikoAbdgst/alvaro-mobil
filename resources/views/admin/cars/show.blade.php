<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Detail Mobil') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                        <div class="md:col-span-1">
                            @if ($car->image)
                                <img src="{{ asset('storage/' . $car->image) }}"
                                    alt="{{ $car->brand }} {{ $car->model }}"
                                    class="w-full h-auto object-cover rounded-lg shadow-md">
                            @else
                                <div
                                    class="w-full h-64 bg-gray-200 rounded-lg flex items-center justify-center text-gray-500">
                                    Tidak ada Gambar
                                </div>
                            @endif
                        </div>

                        <div class="md:col-span-1">
                            <h3 class="text-2xl font-bold text-gray-900 mb-4">{{ $car->brand . ' ' . $car->model }}</h3>

                            <div class="mb-3">
                                <p class="text-sm font-medium text-gray-500">Harga:</p>
                                <p class="text-xl font-semibold text-green-600">
                                    {{ 'Rp ' . number_format($car->price, 0, ',', '.') }}
                                </p>
                            </div>

                            <div class="mb-3">
                                <p class="text-sm font-medium text-gray-500">Tahun:</p>
                                <p class="text-base text-gray-900">{{ $car->year }}</p>
                            </div>

                            <div class="mb-3">
                                <p class="text-sm font-medium text-gray-500">Warna:</p>
                                <p class="text-base text-gray-900">{{ $car->color }}</p>
                            </div>

                            <div class="mb-3">
                                <p class="text-sm font-medium text-gray-500">Status:</p>
                                <span
                                    class="px-2 inline-flex text-sm leading-5 font-semibold rounded-full {{ $car->is_available ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                                    {{ $car->is_available ? 'Tersedia' : 'Terjual' }}
                                </span>
                            </div>
                        </div>

                        <div class="md:col-span-2 mt-4">
                            <p class="text-sm font-medium text-gray-500">Deskripsi:</p>
                            <p class="text-base text-gray-700 whitespace-pre-line">{{ $car->description ?? '-' }}</p>
                        </div>

                        <div class="md:col-span-2 mt-6 border-t pt-4">
                            <h4 class="text-lg font-bold text-gray-800 mb-3">Galeri Foto Tambahan</h4>
                            @if ($car->images->count() > 0)
                                <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
                                    @foreach ($car->images as $gallery)
                                        <div class="relative group">
                                            <img src="{{ asset('storage/' . $gallery->image_path) }}"
                                                class="w-full h-32 object-cover rounded shadow-sm hover:opacity-90 transition">
                                        </div>
                                    @endforeach
                                </div>
                            @else
                                <p class="text-gray-500 italic text-sm">Belum ada foto tambahan untuk mobil ini.</p>
                            @endif
                        </div>

                    </div>

                    <div class="flex justify-end mt-8 border-t pt-4">
                        <a href="{{ route('admin.cars.edit', $car) }}"
                            class="bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-2 px-4 rounded mr-2">
                            Edit Data
                        </a>
                        <a href="{{ route('admin.cars.index') }}"
                            class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded">
                            Kembali ke Daftar
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
