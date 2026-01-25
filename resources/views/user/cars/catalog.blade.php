<x-app-layout>
    <div class="min-h-screen bg-gray-50 py-6 lg:py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

            <div class="mb-6 lg:mb-8 text-center sm:text-left">
                {{-- TAMBAHAN: Tombol Kembali ke Home --}}
                <a href="{{ route('home') }}"
                    class="inline-flex items-center gap-2 text-gray-500 hover:text-indigo-600 font-medium mb-4 transition-colors duration-200">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                    </svg>
                    Kembali ke Home
                </a>
                {{-- END TAMBAHAN --}}

                <h1 class="text-2xl sm:text-4xl font-extrabold text-gray-900 mb-2">Katalog Penjualan Mobil</h1>
                <p class="text-gray-600 text-sm sm:text-lg">Temukan mobil impian Anda dengan penawaran terbaik</p>
            </div>

            <div class="flex flex-col lg:flex-row gap-6 lg:gap-8">

                <div class="w-full lg:w-80 flex-shrink-0">
                    <div
                        class="bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden lg:sticky lg:top-24">

                        <div class="bg-indigo-600 p-4 lg:p-5 text-white">
                            <div class="flex justify-between items-center">
                                <div class="flex items-center gap-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M3 4a1 1 0 011-1h16a1 1 0 011 1v2.586a1 1 0 01-.293.707l-6.414 6.414a1 1 0 00-.293.707V17l-4 4v-6.586a1 1 0 00-.293-.707L3.293 7.293A1 1 0 013 6.586V4z" />
                                    </svg>
                                    <h2 class="text-base lg:text-lg font-bold">Filter Pencarian</h2>
                                </div>
                                <a href="{{ route('catalog') }}"
                                    class="text-xs font-medium bg-white/20 hover:bg-white/30 px-3 py-1 rounded-full transition">
                                    Reset
                                </a>
                            </div>
                        </div>

                        <div class="block">
                            <form action="{{ route('catalog') }}" method="GET"
                                class="p-4 lg:p-5 space-y-4 lg:space-y-6">
                                <div>
                                    <label
                                        class="block text-xs lg:text-sm font-semibold text-gray-700 mb-1 lg:mb-2">Cari
                                        Nama/Model</label>
                                    <div class="relative">
                                        <input type="text" name="search" value="{{ request('search') }}"
                                            placeholder="Contoh: Pajero Sport"
                                            class="w-full pl-9 pr-3 py-2 text-sm rounded-lg border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 transition">
                                        <div
                                            class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                            <span class="text-gray-400 text-sm">🔍</span>
                                        </div>
                                    </div>
                                </div>

                                <div>
                                    <label
                                        class="block text-xs lg:text-sm font-semibold text-gray-700 mb-1 lg:mb-2">Merek</label>
                                    <select name="brand"
                                        class="w-full py-2 text-sm rounded-lg border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 transition">
                                        <option value="">Semua Merek</option>
                                        @foreach ($brands as $brand)
                                            <option value="{{ $brand }}"
                                                {{ request('brand') == $brand ? 'selected' : '' }}>
                                                {{ $brand }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>

                                <div>
                                    <label
                                        class="block text-xs lg:text-sm font-semibold text-gray-700 mb-1 lg:mb-2">Rentang
                                        Harga (Rp)</label>
                                    <div class="grid grid-cols-2 gap-2">
                                        <input type="number" name="min_price" value="{{ request('min_price') }}"
                                            placeholder="Min"
                                            class="w-full py-2 text-sm rounded-lg border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                                        <input type="number" name="max_price" value="{{ request('max_price') }}"
                                            placeholder="Max"
                                            class="w-full py-2 text-sm rounded-lg border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                                    </div>
                                </div>

                                <div class="grid grid-cols-2 gap-2">
                                    <div>
                                        <label
                                            class="block text-xs lg:text-sm font-semibold text-gray-700 mb-1 lg:mb-2">Tahun</label>
                                        <select name="year"
                                            class="w-full py-2 text-sm rounded-lg border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                                            <option value="">Semua</option>
                                            @foreach ($years as $year)
                                                <option value="{{ $year }}"
                                                    {{ request('year') == $year ? 'selected' : '' }}>
                                                    {{ $year }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div>
                                        <label
                                            class="block text-xs lg:text-sm font-semibold text-gray-700 mb-1 lg:mb-2">Warna</label>
                                        <select name="color"
                                            class="w-full py-2 text-sm rounded-lg border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 capitalize">
                                            <option value="">Semua</option>
                                            @foreach ($colors as $color)
                                                <option value="{{ $color }}"
                                                    {{ request('color') == $color ? 'selected' : '' }}>
                                                    {{ $color }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <button type="submit"
                                    class="w-full bg-indigo-600 text-white py-2.5 px-4 rounded-lg text-sm font-bold hover:bg-indigo-700 focus:ring-4 focus:ring-indigo-200 transition duration-200 flex justify-center items-center gap-2">
                                    Terapkan Filter
                                </button>
                            </form>
                        </div>
                    </div>
                </div>

                <div class="flex-1">
                    <div class="mb-4 lg:mb-6 flex justify-between items-end border-b border-gray-200 pb-2 lg:pb-4">
                        <div>
                            <h2 class="text-lg lg:text-xl font-bold text-gray-800">Unit Tersedia</h2>
                            <p class="text-xs lg:text-sm text-gray-500 mt-1">
                                Menampilkan <span class="font-bold text-indigo-600">{{ $cars->total() }}</span> mobil
                                siap jual
                            </p>
                        </div>
                    </div>

                    @if ($cars->isEmpty())
                        <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-8 lg:p-12 text-center">
                            <div
                                class="w-16 h-16 lg:w-20 lg:h-20 bg-indigo-50 rounded-full flex items-center justify-center mx-auto mb-4">
                                <svg class="w-8 h-8 lg:w-10 lg:h-10 text-indigo-500" fill="none"
                                    stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                                </svg>
                            </div>
                            <h3 class="text-lg lg:text-xl font-bold text-gray-900 mb-2">Unit Tidak Ditemukan</h3>
                            <p class="text-sm text-gray-500 mb-6">Silakan atur ulang filter pencarian Anda.</p>
                            <a href="{{ route('catalog') }}"
                                class="inline-block text-sm font-medium text-indigo-600 hover:text-indigo-500">
                                Reset Filter
                            </a>
                        </div>
                    @else
                        <div class="grid grid-cols-2 lg:grid-cols-3 gap-3 md:gap-6">
                            @foreach ($cars as $car)
                                <div
                                    class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden hover:shadow-lg transition-all duration-300 group flex flex-col h-full">
                                    <div class="relative h-32 md:h-56 bg-gray-200 overflow-hidden">
                                        @if ($car->image)
                                            <img src="{{ Storage::url($car->image) }}"
                                                alt="{{ $car->brand }} {{ $car->model }}"
                                                class="w-full h-full object-cover transition-transform duration-500">
                                        @else
                                            <div
                                                class="w-full h-full flex items-center justify-center bg-gray-100 text-gray-400">
                                                <svg class="w-8 h-8 lg:w-12 lg:h-12" fill="none"
                                                    stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        stroke-width="2"
                                                        d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                                </svg>
                                            </div>
                                        @endif

                                        <div class="absolute top-2 left-2 lg:top-3 lg:left-3">
                                            <span
                                                class="px-1.5 py-0.5 lg:px-2.5 lg:py-1 bg-green-600/90 backdrop-blur-sm text-white text-[10px] lg:text-xs font-bold rounded shadow-sm">
                                                Tersedia
                                            </span>
                                        </div>
                                    </div>

                                    <div class="p-3 lg:p-5 flex-1 flex flex-col">
                                        <div class="mb-2 lg:mb-4">
                                            <p
                                                class="text-[10px] lg:text-xs font-semibold text-indigo-600 mb-0.5 lg:mb-1 uppercase tracking-wider">
                                                {{ $car->brand }}</p>
                                            <h3
                                                class="text-sm lg:text-lg font-bold text-gray-900 leading-tight group-hover:text-indigo-600 transition-colors line-clamp-1">
                                                {{ $car->model }}
                                            </h3>
                                            <div class="flex items-center gap-1 mt-1">
                                                <span
                                                    class="text-[10px] lg:text-sm text-gray-500 capitalize">{{ $car->color }}</span>
                                                <span class="text-gray-300">•</span>
                                                <span
                                                    class="text-[10px] lg:text-sm text-gray-500">{{ $car->year }}</span>
                                            </div>
                                        </div>

                                        <div
                                            class="mt-auto pt-2 lg:pt-4 border-t border-gray-100 flex flex-col lg:flex-col justify-between gap-2">
                                            <div>
                                                <p class="text-[10px] lg:text-xs text-gray-500 hidden lg:block mb-0.5">
                                                    Harga OTR</p>
                                                <div class="text-sm lg:text-lg font-bold text-gray-900 truncate">
                                                    Rp {{ number_format($car->price, 0, ',', '.') }}
                                                </div>
                                            </div>

                                            <a href="{{ route('cars.show', $car) }}"
                                                class="w-full inline-flex items-center justify-center py-1.5 lg:py-2 px-3 lg:px-4 rounded-lg bg-indigo-600 text-white text-xs lg:text-sm font-medium hover:bg-indigo-700 transition-colors">
                                                Lihat Unit
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>

                        <div class="mt-8 lg:mt-10">
                            {{ $cars->links() }}
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
