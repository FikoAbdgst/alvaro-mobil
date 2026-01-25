{{-- Car Grid Section - Matching Navigation & Hero Theme --}}
<div id="latest-collection" class="py-24 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16 space-y-4">
            <span class="inline-block px-4 py-1.5 bg-zinc-900 text-white text-sm font-bold rounded-full">
                Koleksi Terbaru
            </span>
            <h2 class="text-4xl md:text-5xl font-black text-zinc-900 leading-tight">
                Temukan Mobil
                <span
                    class="block mt-2 bg-gradient-to-r from-indigo-600 via-purple-600 to-indigo-600 bg-clip-text text-transparent">
                    Impian Anda
                </span>
            </h2>
            <p class="text-lg text-zinc-600 max-w-2xl mx-auto">
                Pilih dari berbagai pilihan mobil berkualitas tinggi dengan harga terbaik
            </p>
        </div>

        @if ($cars->isEmpty())
            <div class="max-w-md mx-auto text-center py-16">
                <div class="relative w-24 h-24 mx-auto mb-6">
                    <div class="absolute inset-0 bg-indigo-500/20 rounded-full blur-xl">
                    </div>
                    <div
                        class="relative w-full h-full bg-indigo-50 rounded-full flex items-center justify-center border border-indigo-100">
                        <svg class="w-12 h-12 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                        </svg>
                    </div>
                </div>
                <h3 class="text-2xl font-bold text-zinc-900 mb-2">Belum Ada Mobil Tersedia</h3>
                <p class="text-zinc-600 mb-6">Katalog kami sedang kosong. Kembali lagi nanti untuk melihat koleksi
                    terbaru!</p>
                <a href="https://wa.me/6287875712617" target="_blank"
                    class="inline-flex items-center gap-2 px-6 py-3 bg-green-600 text-white font-bold rounded-xl hover:bg-green-700 hover:shadow-lg transition-all">
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                        <path
                            d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487Z" />
                    </svg>
                    Hubungi Kami
                </a>
            </div>
        @else
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach ($cars as $car)
                    <div class="group relative">
                        <div
                            class="absolute inset-0 bg-indigo-500/20 rounded-3xl blur-xl opacity-0 group-hover:opacity-100 transition-all duration-500">
                        </div>

                        <div
                            class="relative bg-white rounded-3xl overflow-hidden border border-zinc-200 hover:border-indigo-200 hover:shadow-2xl transition-all duration-500">
                            <div class="relative h-64 overflow-hidden bg-zinc-100">
                                @if ($car->image)
                                    <img src="{{ Storage::url($car->image) }}"
                                        alt="{{ $car->brand }} {{ $car->model }}"
                                        class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700">
                                @else
                                    <div class="w-full h-full flex items-center justify-center">
                                        <svg class="w-20 h-20 text-zinc-400" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                        </svg>
                                    </div>
                                @endif

                                <div
                                    class="absolute inset-0 bg-black/60 opacity-0 group-hover:opacity-100 transition-opacity duration-500">
                                </div>

                                <div class="absolute top-4 left-4">
                                    <span
                                        class="inline-flex items-center gap-1.5 px-3 py-1.5 bg-green-600 text-white text-xs font-bold rounded-full shadow-lg">
                                        <span class="w-1.5 h-1.5 bg-white rounded-full animate-pulse"></span>
                                        Tersedia
                                    </span>
                                </div>

                                <div class="absolute top-4 right-4">
                                    <span
                                        class="px-3 py-1.5 bg-white/90 backdrop-blur-sm text-zinc-900 text-xs font-bold rounded-full shadow-lg">
                                        {{ $car->year }}
                                    </span>
                                </div>
                            </div>

                            <div class="p-6 space-y-4">
                                <div>
                                    <h3
                                        class="text-2xl font-bold text-zinc-900 mb-1 group-hover:text-indigo-600 transition-colors line-clamp-1">
                                        {{ $car->brand }} {{ $car->model }}
                                    </h3>
                                    <p class="text-sm text-zinc-500">{{ $car->color }}</p>
                                </div>

                                <div class="pt-2">
                                    <p class="text-3xl font-black bg-zinc-700 bg-clip-text text-transparent">
                                        {{ 'Rp ' . number_format($car->price, 0, ',', '.') }}
                                    </p>
                                </div>

                                <a href="{{ route('cars.show', $car) }}"
                                    class="flex items-center justify-center gap-2 w-full px-6 py-3 bg-indigo-600 text-white font-bold rounded-xl shadow-lg hover:shadow-xl hover:from-indigo-700 hover:to-purple-700 transition-all duration-300 group/btn">
                                    <span>Lihat Detail</span>
                                    <svg class="w-5 h-5 group-hover/btn:translate-x-1 transition-transform"
                                        fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M17 8l4 4m0 0l-4 4m4-4H3" />
                                    </svg>
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <div class="mt-16 text-center">
                <a href="{{ route('catalog') }}"
                    class="inline-flex items-center px-8 py-4 border border-transparent text-lg font-bold rounded-xl text-white bg-zinc-900 hover:bg-zinc-800 transition-all duration-300 shadow-lg hover:shadow-xl transform hover:-translate-y-1">
                    Lihat Semua Koleksi Mobil
                    <svg class="ml-2 -mr-1 w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                    </svg>
                </a>
            </div>
        @endif
    </div>
</div>
