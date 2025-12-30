<x-app-layout>
    <div class="py-12 bg-gradient-to-br from-slate-50 via-blue-50 to-indigo-50 min-h-screen">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- Back Button -->
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
                    <!-- Left Column - Image & Gallery -->
                    <div class="lg:col-span-3 bg-gradient-to-br from-gray-100 to-gray-200 p-8">
                        <div class="sticky top-8">
                            <!-- Main Image -->
                            <div class="mb-6 rounded-2xl overflow-hidden shadow-2xl">
                                @if ($car->image)
                                    <img src="{{ $car->image_data_uri }}" alt="{{ $car->brand }} {{ $car->model }}"
                                        class="w-full h-auto object-cover">
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

                            <!-- Features Highlight -->
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

                    <!-- Right Column - Details & CTA -->
                    <div class="lg:col-span-2 p-8 lg:p-10">
                        <!-- Title & Badge -->
                        <div class="mb-6">

                            <h1
                                class="text-4xl font-extrabold text-gray-900 mb-3 leading-tight flex items-center justify-between">
                                <p>
                                    {{ $car->brand }} {{ $car->model }}
                                </p>
                                <p>
                                    <span class="bg-green-100 text-green-700 text-sm font-bold px-4 py-2 rounded-full">
                                        {{ $car->is_available ? 'Tersedia' : 'Terjual' }}
                                    </span>
                                </p>
                            </h1>
                            <p
                                class="text-5xl font-black text-transparent bg-clip-text bg-gradient-to-r from-green-600 to-emerald-600">
                                {{ 'Rp ' . number_format($car->price, 0, ',', '.') }}
                            </p>
                        </div>

                        <!-- Specifications -->
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
                                    <span class="flex items-center text-gray-600 font-medium">
                                        <svg class="w-5 h-5 mr-2 text-gray-400" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z" />
                                        </svg>
                                        Merek
                                    </span>
                                    <span class="text-gray-900 font-bold">{{ $car->brand }}</span>
                                </div>
                                <div class="flex items-center justify-between py-3 border-b border-gray-200">
                                    <span class="flex items-center text-gray-600 font-medium">
                                        <svg class="w-5 h-5 mr-2 text-gray-400" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                        </svg>
                                        Model
                                    </span>
                                    <span class="text-gray-900 font-bold">{{ $car->model }}</span>
                                </div>
                                <div class="flex items-center justify-between py-3 border-b border-gray-200">
                                    <span class="flex items-center text-gray-600 font-medium">
                                        <svg class="w-5 h-5 mr-2 text-gray-400" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                        </svg>
                                        Tahun
                                    </span>
                                    <span class="text-gray-900 font-bold">{{ $car->year }}</span>
                                </div>
                                <div class="flex items-center justify-between py-3">
                                    <span class="flex items-center text-gray-600 font-medium">
                                        <svg class="w-5 h-5 mr-2 text-gray-400" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24">
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
                                    {{ $car->description ?? 'Mobil ini dalam kondisi sangat baik dan siap pakai. Surat-surat lengkap dan pajak hidup. Hubungi kami untuk informasi lebih lanjut dan jadwal test drive.' }}
                                </p>
                            </div>
                        </div>

                        <!-- CTA Buttons -->
                        <div class="space-y-4">
                            <a href="https://wa.me/6281234567890?text=Halo,%20saya%20tertarik%20dengan%20{{ $car->brand }}%20{{ $car->model }}"
                                target="_blank"
                                class="flex items-center justify-center w-full bg-green-600 text-white font-bold py-4 px-8 rounded-xl shadow-lg hover:shadow-2xl hover:from-green-600 hover:to-green-700 transition-all duration-300 transform hover:-translate-y-1">
                                <svg class="w-6 h-6 mr-3" fill="currentColor" viewBox="0 0 24 24">
                                    <path
                                        d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z" />
                                </svg>
                                Hubungi via WhatsApp
                            </a>


                        </div>


                    </div>
                </div>
            </div>


        </div>
    </div>
</x-app-layout>
