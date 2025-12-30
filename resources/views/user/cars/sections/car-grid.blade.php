<div id="cars" class="py-16 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16">
            <p class="text-sm font-semibold text-indigo-600 uppercase tracking-wide mb-2">
                Katalog Kami
            </p>
            <h2 class="text-4xl md:text-5xl font-extrabold text-gray-900 mb-4 leading-tight">
                Temukan Mobil Impian Anda
            </h2>
            <p class="text-xl text-gray-600 max-w-2xl mx-auto">
                Pilih dari berbagai pilihan mobil berkualitas tinggi dengan harga terbaik.
            </p>
        </div>

        @if ($cars->isEmpty())
            <div class="bg-gradient-to-r from-yellow-50 to-orange-50 border-l-4 border-yellow-500 rounded-xl shadow-lg p-8"
                role="alert">
                <div class="flex items-center">
                    <svg class="w-8 h-8 text-yellow-500 mr-4 flex-shrink-0" fill="none" stroke="currentColor"
                        viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                    </svg>
                    <div>
                        <p class="font-bold text-xl text-yellow-800">Belum Ada Mobil Tersedia</p>
                        <p class="text-yellow-700 mt-1">Saat ini katalog kami sedang kosong. Silakan kembali lagi nanti!
                        </p>
                    </div>
                </div>
            </div>
        @else
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-10">
                @foreach ($cars as $car)
                    <div
                        class="group bg-white rounded-3xl shadow-xl hover:shadow-2xl transition-all duration-500 overflow-hidden transform hover:scale-[1.02] border border-gray-100">
                        <div class="relative h-56 w-full overflow-hidden">
                            @if ($car->image)
                                <img src="{{ $car->image_data_uri }}" alt="{{ $car->brand }} {{ $car->model }}"
                                    class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700">
                            @else
                                <div
                                    class="w-full h-full bg-gradient-to-br from-gray-200 to-gray-300 flex items-center justify-center">
                                    <svg class="w-20 h-20 text-gray-400" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                    </svg>
                                </div>
                            @endif

                            <div class="absolute top-4 left-4">
                                <span
                                    class="bg-green-600 text-white text-sm font-bold px-4 py-1.5 rounded-full shadow-lg flex items-center">
                                    <svg class="w-4 h-4 mr-1.5" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd"
                                            d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                            clip-rule="evenodd" />
                                    </svg>
                                    Tersedia
                                </span>
                            </div>
                        </div>

                        <div class="p-6">
                            <h3
                                class="text-2xl font-extrabold text-gray-900 mb-1 line-clamp-1 group-hover:text-pink-600 transition-colors flex items-center">
                                <svg class="w-5 h-5 mr-2 text-indigo-500" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M13 10V3L4 14h7v7l9-11h-7z" />
                                </svg>
                                {{ $car->brand }} {{ $car->model }}
                            </h3>
                            <p class="text-sm text-gray-500 mb-4">{{ $car->year }} - {{ $car->color }}</p>

                            <div class="mb-5">
                                <p class="text-4xl font-black text-indigo-600">
                                    {{ 'Rp ' . number_format($car->price, 0, ',', '.') }}
                                </p>
                            </div>

                            <a href="{{ route('cars.show', $car) }}"
                                class="block w-full text-center bg-indigo-500 text-white font-bold py-3 px-6 rounded-xl shadow-lg hover:shadow-xl hover:from-indigo-600 hover:to-pink-600 transition-all duration-300 transform hover:-translate-y-0.5">
                                <span class="flex items-center justify-center">
                                    Lihat Detail
                                    <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M17.5 8.75l-5 5-5-5" transform="rotate(-90 12 12)" />
                                    </svg>
                                </span>
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>

            <div class="mt-16 flex justify-center">
                {{ $cars->links() }}
            </div>
        @endif
    </div>
</div>
