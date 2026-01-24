<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Admin Dashboard') }}
        </h2>
    </x-slot>

    {{--
        x-data Global untuk Modal
        Logic sama, tampilan tetap, gradient dihapus di section bawah
    --}}
    <div class="py-12" x-data="{
        showModal: false,
        modalConfig: {
            url: '',
            title: '',
            message: '',
            buttonText: '',
            buttonColor: 'bg-indigo-600 hover:bg-indigo-700',
            method: 'PATCH'
        },
        openModal(url, title, message, buttonText, type = 'confirm') {
            this.modalConfig.url = url;
            this.modalConfig.title = title;
            this.modalConfig.message = message;
            this.modalConfig.buttonText = buttonText;
    
            if (type === 'delete') {
                this.modalConfig.buttonColor = 'bg-red-600 hover:bg-red-700';
                this.modalConfig.method = 'DELETE';
            } else {
                this.modalConfig.buttonColor = 'bg-indigo-600 hover:bg-indigo-700';
                this.modalConfig.method = 'PATCH';
            }
    
            this.showModal = true;
        }
    }">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            {{-- Alert Success --}}
            @if (session('success'))
                <div x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 3000)"
                    class="bg-green-100 border-l-4 border-green-500 text-green-700 px-4 py-3 rounded-lg relative mb-6 shadow-md flex items-center"
                    role="alert">
                    <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd"
                            d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                            clip-rule="evenodd"></path>
                    </svg>
                    <span>{{ session('success') }}</span>
                </div>
            @endif

            {{-- Statistik Cards --}}
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-10">
                {{-- Card Total --}}
                <div
                    class="bg-white p-6 shadow-lg rounded-xl border-l-4 border-blue-500 hover:shadow-xl transition transform hover:-translate-y-1">
                    <div class="flex items-center">
                        <div class="p-3 bg-blue-100 rounded-full mr-4">
                            <svg class="w-8 h-8 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10">
                                </path>
                            </svg>
                        </div>
                        <div>
                            <p class="text-sm font-medium text-gray-500">Total Unit Mobil</p>
                            <p class="text-3xl font-bold text-gray-900">{{ number_format($totalCars) }}</p>
                        </div>
                    </div>
                </div>

                {{-- Card Tersedia --}}
                <div
                    class="bg-white p-6 shadow-lg rounded-xl border-l-4 border-green-500 hover:shadow-xl transition transform hover:-translate-y-1">
                    <div class="flex items-center">
                        <div class="p-3 bg-green-100 rounded-full mr-4">
                            <svg class="w-8 h-8 text-green-500" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M5 13l4 4L19 7"></path>
                            </svg>
                        </div>
                        <div>
                            <p class="text-sm font-medium text-gray-500">Mobil Tersedia</p>
                            <p class="text-3xl font-bold text-gray-900">{{ number_format($availableCars) }}</p>
                        </div>
                    </div>
                </div>

                {{-- Card Terjual --}}
                <div
                    class="bg-white p-6 shadow-lg rounded-xl border-l-4 border-red-500 hover:shadow-xl transition transform hover:-translate-y-1">
                    <div class="flex items-center">
                        <div class="p-3 bg-red-100 rounded-full mr-4">
                            <svg class="w-8 h-8 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                        </div>
                        <div>
                            <p class="text-sm font-medium text-gray-500">Mobil Terjual</p>
                            <p class="text-3xl font-bold text-gray-900">{{ number_format($soldCars) }}</p>
                        </div>
                    </div>
                </div>

                {{-- Card Admin --}}
                <div
                    class="bg-white p-6 shadow-lg rounded-xl border-l-4 border-yellow-500 hover:shadow-xl transition transform hover:-translate-y-1">
                    <div class="flex items-center">
                        <div class="p-3 bg-yellow-100 rounded-full mr-4">
                            <svg class="w-8 h-8 text-yellow-500" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z">
                                </path>
                            </svg>
                        </div>
                        <div>
                            <p class="text-sm font-medium text-gray-500">Total Akun Admin</p>
                            <p class="text-3xl font-bold text-gray-900">{{ number_format($totalAdmins) }}</p>
                        </div>
                    </div>
                </div>
            </div>

            {{--
                ==============================================
                TABEL AKTIVITAS TERBARU
                ==============================================
            --}}
            <div class="bg-white shadow-xl sm:rounded-2xl overflow-hidden border border-gray-100 mb-10">
                <div class="p-6 border-b border-gray-100 flex justify-between items-center bg-gray-50">
                    <h3 class="text-lg font-bold text-gray-800 flex items-center gap-2">
                        <span class="bg-red-100 text-red-600 p-1.5 rounded-lg">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                        </span>
                        Aktivitas Penjualan Terbaru
                    </h3>
                    <a href="{{ route('admin.cars.index', ['status' => 'sold']) }}"
                        class="text-sm text-indigo-600 hover:text-indigo-800 font-semibold flex items-center gap-1">
                        Lihat Semua
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7">
                            </path>
                        </svg>
                    </a>
                </div>

                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-white">
                            <tr>
                                <th
                                    class="px-6 py-4 text-left text-xs font-bold text-gray-500 uppercase tracking-wider">
                                    Gambar</th>
                                <th
                                    class="px-6 py-4 text-left text-xs font-bold text-gray-500 uppercase tracking-wider">
                                    Info Kendaraan</th>
                                <th
                                    class="px-6 py-4 text-left text-xs font-bold text-gray-500 uppercase tracking-wider">
                                    Harga Jual</th>
                                <th
                                    class="px-6 py-4 text-left text-xs font-bold text-gray-500 uppercase tracking-wider">
                                    Tanggal Terjual</th>
                                <th
                                    class="px-6 py-4 text-right text-xs font-bold text-gray-500 uppercase tracking-wider">
                                    Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-100">
                            @forelse ($latestSoldCars as $car)
                                <tr class="hover:bg-gray-50 transition duration-150">
                                    {{-- Kolom Gambar --}}
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        @if ($car->image)
                                            <img src="{{ Storage::url($car->image) }}"
                                                class="h-12 w-16 object-cover rounded-lg shadow-sm border border-gray-200"
                                                alt="Car">
                                        @else
                                            <div
                                                class="h-12 w-16 bg-gray-100 rounded-lg flex items-center justify-center text-xs text-gray-400 border border-gray-200">
                                                No Img</div>
                                        @endif
                                    </td>

                                    {{-- Kolom Info --}}
                                    <td class="px-6 py-4">
                                        <div class="text-sm font-bold text-gray-900">{{ $car->brand }}
                                            {{ $car->model }}</div>
                                        <div class="text-xs text-gray-500 mt-0.5">Tahun {{ $car->year }} •
                                            {{ $car->color }}</div>
                                    </td>

                                    {{-- Kolom Harga --}}
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <span
                                            class="px-2.5 py-1 inline-flex text-xs leading-5 font-bold rounded-full bg-green-100 text-green-800">
                                            Rp {{ number_format($car->price, 0, ',', '.') }}
                                        </span>
                                    </td>

                                    {{-- Kolom Waktu --}}
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm text-gray-900">{{ $car->updated_at->format('d M Y') }}
                                        </div>
                                        <div class="text-xs text-gray-500">{{ $car->updated_at->format('H:i') }} WIB
                                        </div>
                                    </td>

                                    {{-- Kolom Aksi --}}
                                    <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                        <a href="{{ route('admin.cars.show', $car) }}"
                                            class="text-indigo-600 hover:text-indigo-900 bg-indigo-50 px-3 py-1.5 rounded-lg hover:bg-indigo-100 transition">
                                            Detail
                                        </a>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="px-6 py-12 text-center text-gray-500">
                                        <div class="flex flex-col items-center">
                                            <svg class="w-12 h-12 text-gray-300 mb-3" fill="none"
                                                stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2">
                                                </path>
                                            </svg>
                                            <span class="font-medium">Belum ada data mobil terjual.</span>
                                        </div>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>

            {{--
                ==============================================
                QUICK SEARCH SECTION (Updated: NO GRADIENT)
                ==============================================
            --}}
            {{-- Ubah bg-gradient menjadi solid bg-indigo-600 --}}
            <div class="bg-indigo-600 rounded-2xl shadow-xl p-8 mb-8 text-white relative overflow-hidden">

                {{-- Decorative Circle (tetap ada untuk tekstur, tapi background solid) --}}
                <div class="absolute top-0 right-0 -mr-16 -mt-16 w-64 h-64 rounded-full bg-white opacity-10"></div>

                <div class="relative z-10">
                    <h3 class="text-2xl font-bold mb-2 flex items-center gap-2">
                        <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                        </svg>
                        Pencarian & Update Cepat
                    </h3>
                    <p class="text-indigo-100 mb-6 text-sm opacity-90">Cari mobil yang tersedia untuk melihat detail
                        atau menandainya sebagai terjual.</p>

                    <form method="GET" action="{{ route('admin.dashboard') }}"
                        class="flex flex-col sm:flex-row gap-3">
                        <input type="text" name="search" value="{{ $searchQuery ?? '' }}"
                            placeholder="Ketik merek, model, atau tahun..."
                            class="flex-1 px-5 py-3.5 rounded-xl border-0 text-gray-900 focus:ring-4 focus:ring-indigo-400 focus:outline-none shadow-lg placeholder-gray-400">

                        <button type="submit"
                            class="bg-white text-indigo-700 px-8 py-3.5 rounded-xl font-bold hover:bg-gray-50 transition shadow-lg flex items-center justify-center gap-2">
                            Cari Mobil
                        </button>

                        @if ($searchQuery)
                            <a href="{{ route('admin.dashboard') }}"
                                class="bg-indigo-800 text-white border border-indigo-500/50 px-6 py-3.5 rounded-xl font-semibold hover:bg-indigo-900 transition shadow-lg flex items-center justify-center">
                                Reset
                            </a>
                        @endif
                    </form>
                </div>

                {{-- Search Results --}}
                @if ($searchResults !== null)
                    <div class="mt-8 bg-white rounded-xl shadow-lg p-1 text-gray-800 overflow-hidden">
                        @if ($searchResults->count() > 0)
                            <div class="p-4 border-b border-gray-100 bg-gray-50 flex justify-between items-center">
                                <h4 class="font-bold text-gray-700">Hasil Pencarian: <span
                                        class="text-indigo-600">{{ $searchQuery }}</span></h4>
                                <span
                                    class="bg-gray-200 text-gray-600 px-2 py-1 rounded text-xs">{{ $searchResults->count() }}
                                    ditemukan</span>
                            </div>
                            <div class="overflow-x-auto">
                                <table class="min-w-full divide-y divide-gray-200">
                                    <tbody class="bg-white divide-y divide-gray-200">
                                        @foreach ($searchResults as $car)
                                            <tr class="hover:bg-indigo-50/50 transition">
                                                <td class="px-6 py-4 w-24">
                                                    @if ($car->image)
                                                        <img src="{{ Storage::url($car->image) }}"
                                                            class="h-14 w-20 object-cover rounded-lg shadow-sm"
                                                            alt="img">
                                                    @else
                                                        <div
                                                            class="h-14 w-20 bg-gray-100 rounded-lg flex items-center justify-center text-xs text-gray-400">
                                                            No Img</div>
                                                    @endif
                                                </td>
                                                <td class="px-6 py-4">
                                                    <div class="text-sm font-bold text-gray-900">{{ $car->brand }}
                                                        {{ $car->model }}</div>
                                                    <div class="text-xs text-gray-500">Tahun {{ $car->year }}</div>
                                                </td>
                                                <td class="px-6 py-4 text-sm font-semibold text-indigo-600">
                                                    Rp {{ number_format($car->price, 0, ',', '.') }}
                                                </td>
                                                <td class="px-6 py-4 text-right">
                                                    {{--
                                                        TOMBOL TRIGGER MODAL
                                                        Menggunakan openModal() dengan parameter untuk konfirmasi terjual
                                                    --}}
                                                    <button type="button"
                                                        @click="openModal('{{ route('admin.cars.mark-sold', $car) }}', 'Konfirmasi Penjualan', 'Apakah Anda yakin ingin menandai {{ $car->brand }} {{ $car->model }} sebagai TERJUAL?', 'Ya, Tandai Terjual', 'confirm')"
                                                        class="bg-indigo-600 hover:bg-indigo-700 text-white px-4 py-2 rounded-lg text-sm font-medium transition flex items-center justify-end gap-1 ml-auto shadow-sm shadow-indigo-200">
                                                        <svg class="w-4 h-4" fill="none" stroke="currentColor"
                                                            viewBox="0 0 24 24">
                                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                                stroke-width="2" d="M5 13l4 4L19 7"></path>
                                                        </svg>
                                                        Tandai Terjual
                                                    </button>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        @else
                            <div class="p-8 text-center text-gray-500">
                                <svg class="w-12 h-12 mx-auto text-gray-300 mb-3" fill="none"
                                    stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                                </svg>
                                <p>Tidak ditemukan mobil dengan kata kunci "<span
                                        class="font-bold">{{ $searchQuery }}</span>"</p>
                            </div>
                        @endif
                    </div>
                @endif
            </div>

        </div>

        {{--
            ==============================================
            MODAL COMPONENT (Re-usable)
            ==============================================
        --}}
        <div x-show="showModal" style="display: none;" class="fixed inset-0 z-50 overflow-y-auto"
            aria-labelledby="modal-title" role="dialog" aria-modal="true">

            {{-- Backdrop --}}
            <div x-show="showModal" x-transition:enter="ease-out duration-300" x-transition:enter-start="opacity-0"
                x-transition:enter-end="opacity-100" x-transition:leave="ease-in duration-200"
                x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0"
                class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity backdrop-blur-sm"></div>

            <div class="flex min-h-full items-end justify-center p-4 text-center sm:items-center sm:p-0">
                {{-- Panel Modal --}}
                <div x-show="showModal" x-transition:enter="ease-out duration-300"
                    x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                    x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100"
                    x-transition:leave="ease-in duration-200"
                    x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100"
                    x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                    @click.away="showModal = false"
                    class="relative transform overflow-hidden rounded-2xl bg-white text-left shadow-xl transition-all sm:my-8 sm:w-full sm:max-w-lg">

                    <div class="bg-white px-4 pb-4 pt-5 sm:p-6 sm:pb-4">
                        <div class="sm:flex sm:items-start">
                            {{-- Icon Dinamis (Merah jika delete, Biru jika confirm biasa) --}}
                            <div class="mx-auto flex h-12 w-12 flex-shrink-0 items-center justify-center rounded-full sm:mx-0 sm:h-10 sm:w-10"
                                :class="modalConfig.method == 'DELETE' ? 'bg-red-100' : 'bg-indigo-100'">

                                {{-- Icon Tanda Seru (untuk delete) --}}
                                <svg x-show="modalConfig.method == 'DELETE'" class="h-6 w-6 text-red-600"
                                    fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M12 9v3.75m-9.303 3.376c-.866 1.5.217 3.374 1.948 3.374h14.71c1.73 0 2.813-1.874 1.948-3.374L13.949 3.378c-.866-1.5-3.032-1.5-3.898 0L2.697 16.126zM12 15.75h.007v.008H12v-.008z" />
                                </svg>

                                {{-- Icon Checklist (untuk mark sold) --}}
                                <svg x-show="modalConfig.method != 'DELETE'" class="h-6 w-6 text-indigo-600"
                                    fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                            </div>

                            <div class="mt-3 text-center sm:ml-4 sm:mt-0 sm:text-left">
                                <h3 class="text-xl font-bold leading-6 text-gray-900" x-text="modalConfig.title"></h3>
                                <div class="mt-2">
                                    <p class="text-sm text-gray-500" x-text="modalConfig.message"></p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="bg-gray-50 px-4 py-3 sm:flex sm:flex-row-reverse sm:px-6">
                        <form :action="modalConfig.url" method="POST">
                            @csrf
                            <input type="hidden" name="_method" :value="modalConfig.method">

                            <button type="submit"
                                class="inline-flex w-full justify-center rounded-lg px-3 py-2 text-sm font-semibold text-white shadow-sm sm:ml-3 sm:w-auto transition"
                                :class="modalConfig.buttonColor" x-text="modalConfig.buttonText">
                            </button>
                        </form>
                        <button type="button" @click="showModal = false"
                            class="mt-3 inline-flex w-full justify-center rounded-lg bg-white px-3 py-2 text-sm font-semibold text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50 sm:mt-0 sm:w-auto transition">
                            Batal
                        </button>
                    </div>
                </div>
            </div>
        </div>

    </div>
</x-app-layout>
