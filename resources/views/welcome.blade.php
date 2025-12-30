<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name', 'Car Rental') }}</title>
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">
    <script src="{{ mix('js/app.js') }}" defer></script>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>


    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans antialiased" x-data="{ open: false }">
    <div class="min-h-screen bg-gray-100">
        @include('layouts.navigation')

        <!-- Header Section -->
        <header class="bg-white shadow">
            <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                <h1 class="text-3xl font-bold text-gray-900">
                    Sewa Mobil Terbaik
                </h1>
                <p class="mt-2 text-gray-600">
                    Temukan mobil impian Anda dengan harga terbaik
                </p>
            </div>
        </header>

        <!-- Main Content -->
        <main class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                @if ($cars->isEmpty())
                    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6 text-center">
                        <p class="text-gray-500">Belum ada mobil tersedia saat ini.</p>
                    </div>
                @else
                    <!-- Car Grid -->
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                        @foreach ($cars as $car)
                            <div
                                class="bg-white overflow-hidden shadow-sm sm:rounded-lg hover:shadow-lg transition duration-300">
                                @if ($car->image)
                                    <img src="{{ Storage::url($car->image) }}" alt="{{ $car->name }}"
                                        class="w-full h-48 object-cover">
                                @else
                                    <div class="w-full h-48 bg-gray-200 flex items-center justify-center">
                                        <svg class="h-12 w-12 text-gray-400" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z">
                                            </path>
                                        </svg>
                                    </div>
                                @endif

                                <div class="p-6">
                                    <h3 class="text-xl font-semibold text-gray-900 mb-2">
                                        {{ $car->name }}
                                    </h3>
                                    <p class="text-gray-600 text-sm mb-4 line-clamp-2">
                                        {{ $car->description }}
                                    </p>

                                    <div class="flex items-center justify-between mb-4">
                                        <span class="text-2xl font-bold text-indigo-600">
                                            Rp {{ number_format($car->price_per_day, 0, ',', '.') }}
                                        </span>
                                        <span class="text-sm text-gray-500">/hari</span>
                                    </div>

                                    <a href="{{ route('cars.show', $car) }}"
                                        class="block w-full bg-indigo-600 hover:bg-indigo-700 text-white text-center font-medium py-2 px-4 rounded-lg transition duration-150">
                                        Lihat Detail
                                    </a>
                                </div>
                            </div>
                        @endforeach
                    </div>

                    <!-- Pagination -->
                    <div class="mt-8">
                        {{ $cars->links() }}
                    </div>
                @endif
            </div>
        </main>
    </div>
</body>

</html>
