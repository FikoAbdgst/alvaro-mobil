<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Manajemen Data Mobil') }}
        </h2>
    </x-slot>

    {{-- x-data state untuk Modal Hapus --}}
    <div class="py-12" x-data="{
        showDeleteModal: false,
        deleteUrl: '',
        deleteName: '',
        openDeleteModal(url, name) {
            this.deleteUrl = url;
            this.deleteName = name;
            this.showDeleteModal = true;
        }
    }">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @if (session('success'))
                <div class="bg-green-100 border-l-4 border-green-500 text-green-700 px-4 py-3 rounded-lg relative mb-6 shadow-md"
                    role="alert">
                    <div class="flex items-center">
                        <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd"
                                d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                clip-rule="evenodd"></path>
                        </svg>
                        <span>{{ session('success') }}</span>
                    </div>
                </div>
            @endif

            <div class="bg-white overflow-hidden shadow-lg sm:rounded-xl">
                {{-- Header Section --}}
                <div class="p-6 bg-gradient-to-r from-indigo-500 to-purple-600 border-b">
                    <div class="flex flex-col md:flex-row md:justify-between md:items-center gap-4">
                        <div>
                            <h3 class="text-2xl font-bold text-black">Daftar Mobil</h3>
                            <p class="text-gray-500 mt-1">Total {{ $cars->total() }} mobil</p>
                        </div>
                        <a href="{{ route('admin.cars.create') }}"
                            class="inline-flex items-center bg-white text-indigo-600 hover:bg-gray-100 font-bold py-3 px-6 rounded-lg shadow-lg transition">
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 4v16m8-8H4"></path>
                            </svg>
                            Tambah Mobil Baru
                        </a>
                    </div>
                </div>

                {{-- Filter & Search Section --}}
                <div class="p-6 bg-gray-50 border-b border-gray-200">
                    <form method="GET" action="{{ route('admin.cars.index') }}" class="space-y-4">
                        <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
                            {{-- Search Input --}}
                            <div class="md:col-span-2">
                                <label class="block text-sm font-medium text-gray-700 mb-2">Pencarian</label>
                                <input type="text" name="search" value="{{ request('search') }}"
                                    placeholder="Cari merek, model, atau tahun..."
                                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500">
                            </div>

                            {{-- Status Filter --}}
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Status</label>
                                <select name="status"
                                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500">
                                    <option value="">Semua Status</option>
                                    <option value="available" {{ request('status') === 'available' ? 'selected' : '' }}>
                                        Tersedia</option>
                                    <option value="sold" {{ request('status') === 'sold' ? 'selected' : '' }}>Terjual
                                    </option>
                                </select>
                            </div>

                            {{-- Year Filter --}}
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Tahun</label>
                                <select name="year"
                                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500">
                                    <option value="">Semua Tahun</option>
                                    @foreach ($years as $year)
                                        <option value="{{ $year }}"
                                            {{ request('year') == $year ? 'selected' : '' }}>{{ $year }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        {{-- Action Buttons --}}
                        <div class="flex gap-3">
                            <button type="submit"
                                class="bg-indigo-600 hover:bg-indigo-700 text-white px-6 py-2 rounded-lg font-semibold transition shadow-md">
                                <svg class="w-4 h-4 inline mr-2" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M3 4a1 1 0 011-1h16a1 1 0 011 1v2.586a1 1 0 01-.293.707l-6.414 6.414a1 1 0 00-.293.707V17l-4 4v-6.586a1 1 0 00-.293-.707L3.293 7.293A1 1 0 013 6.586V4z">
                                    </path>
                                </svg>
                                Filter
                            </button>
                            <a href="{{ route('admin.cars.index') }}"
                                class="bg-gray-200 hover:bg-gray-300 text-gray-700 px-6 py-2 rounded-lg font-semibold transition">
                                Reset
                            </a>
                        </div>
                    </form>
                </div>

                {{-- Table Section --}}
                <div class="p-6">
                    <div class="overflow-x-auto">
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Gambar</th>
                                    <th
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Merek & Model</th>
                                    <th
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Harga</th>
                                    <th
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Tahun</th>
                                    <th
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Status</th>
                                    <th
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Aksi</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                @forelse ($cars as $car)
                                    <tr class="hover:bg-gray-50 transition">
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            @if ($car->image)
                                                <img src="{{ Storage::url($car->image) }}"
                                                    alt="{{ $car->brand }} {{ $car->model }}"
                                                    class="h-16 w-16 object-cover rounded-lg shadow-md">
                                            @else
                                                <div
                                                    class="h-16 w-16 bg-gradient-to-br from-gray-200 to-gray-300 rounded-lg flex items-center justify-center text-xs text-gray-500 shadow">
                                                    No Img</div>
                                            @endif
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="text-sm font-bold text-gray-900">{{ $car->brand }}</div>
                                            <div class="text-sm text-gray-500">{{ $car->model }}</div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap font-semibold text-gray-900">
                                            Rp {{ number_format($car->price, 0, ',', '.') }}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                            {{ $car->year }}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <span
                                                class="px-3 py-1 inline-flex text-xs leading-5 font-semibold rounded-full shadow-sm {{ $car->is_available ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                                                {{ $car->is_available ? '✓ Tersedia' : '✗ Terjual' }}
                                            </span>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                            <div class="flex gap-2">
                                                <a href="{{ route('admin.cars.show', $car) }}"
                                                    class="text-indigo-600 hover:text-indigo-900 font-semibold">Lihat</a>

                                                <span class="text-gray-300">|</span>

                                                <a href="{{ route('admin.cars.edit', $car) }}"
                                                    class="text-yellow-600 hover:text-yellow-900 font-semibold">Edit</a>

                                                <span class="text-gray-300">|</span>

                                                {{-- TOMBOL HAPUS DITAMBAHKAN DI SINI --}}
                                                <button type="button"
                                                    x-on:click="openDeleteModal('{{ route('admin.cars.destroy', $car) }}', '{{ $car->brand }} {{ $car->model }}')"
                                                    class="text-red-600 hover:text-red-900 font-semibold">
                                                    Hapus
                                                </button>
                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="6" class="px-6 py-12 text-center">
                                            <div class="flex flex-col items-center">
                                                <svg class="w-16 h-16 text-gray-300 mb-4" fill="none"
                                                    stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        stroke-width="2"
                                                        d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z">
                                                    </path>
                                                </svg>
                                                <p class="text-gray-500 text-lg">Tidak ada data mobil ditemukan</p>
                                                @if (request()->hasAny(['search', 'status', 'year']))
                                                    <a href="{{ route('admin.cars.index') }}"
                                                        class="mt-4 text-indigo-600 hover:text-indigo-900 font-semibold">Reset
                                                        Filter</a>
                                                @endif
                                            </div>
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                    {{-- Pagination --}}
                    @if ($cars->hasPages())
                        <div class="mt-6 border-t pt-6">
                            {{ $cars->links() }}
                        </div>
                    @endif
                </div>
            </div>
        </div>

        {{-- CUSTOM DELETE MODAL --}}
        <div x-show="showDeleteModal" style="display: none;" class="fixed inset-0 z-50 overflow-y-auto"
            aria-labelledby="modal-title" role="dialog" aria-modal="true">

            {{-- Backdrop --}}
            <div x-show="showDeleteModal" x-transition:enter="ease-out duration-300"
                x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100"
                x-transition:leave="ease-in duration-200" x-transition:leave-start="opacity-100"
                x-transition:leave-end="opacity-0"
                class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity backdrop-blur-sm"></div>

            <div class="flex min-h-full items-end justify-center p-4 text-center sm:items-center sm:p-0">
                {{-- Modal Panel --}}
                <div x-show="showDeleteModal" x-transition:enter="ease-out duration-300"
                    x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                    x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100"
                    x-transition:leave="ease-in duration-200"
                    x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100"
                    x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                    @click.away="showDeleteModal = false"
                    class="relative transform overflow-hidden rounded-2xl bg-white text-left shadow-xl transition-all sm:my-8 sm:w-full sm:max-w-lg">

                    <div class="bg-white px-4 pb-4 pt-5 sm:p-6 sm:pb-4">
                        <div class="sm:flex sm:items-start">
                            <div
                                class="mx-auto flex h-12 w-12 flex-shrink-0 items-center justify-center rounded-full bg-red-100 sm:mx-0 sm:h-10 sm:w-10">
                                <svg class="h-6 w-6 text-red-600" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M12 9v3.75m-9.303 3.376c-.866 1.5.217 3.374 1.948 3.374h14.71c1.73 0 2.813-1.874 1.948-3.374L13.949 3.378c-.866-1.5-3.032-1.5-3.898 0L2.697 16.126zM12 15.75h.007v.008H12v-.008z" />
                                </svg>
                            </div>
                            <div class="mt-3 text-center sm:ml-4 sm:mt-0 sm:text-left">
                                <h3 class="text-xl font-bold leading-6 text-gray-900" id="modal-title">Konfirmasi
                                    Hapus</h3>
                                <div class="mt-2">
                                    <p class="text-sm text-gray-500">
                                        Apakah Anda yakin ingin menghapus mobil <span class="font-bold text-gray-900"
                                            x-text="deleteName"></span>?
                                        <br>Data yang dihapus tidak dapat dikembalikan.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="bg-gray-50 px-4 py-3 sm:flex sm:flex-row-reverse sm:px-6">
                        {{-- Form Delete yang sesungguhnya --}}
                        <form :action="deleteUrl" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit"
                                class="inline-flex w-full justify-center rounded-lg bg-red-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-red-500 sm:ml-3 sm:w-auto transition">
                                Ya, Hapus
                            </button>
                        </form>
                        <button type="button" @click="showDeleteModal = false"
                            class="mt-3 inline-flex w-full justify-center rounded-lg bg-white px-3 py-2 text-sm font-semibold text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50 sm:mt-0 sm:w-auto transition">
                            Batal
                        </button>
                    </div>
                </div>
            </div>
        </div>

    </div>
</x-app-layout>
