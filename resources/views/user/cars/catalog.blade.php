@php
    $activeFilters = collect(['search', 'brand', 'min_price', 'max_price', 'year', 'color'])->filter(
        fn ($key) => request()->filled($key),
    );
@endphp

<x-app-layout>
    <div class="min-h-screen bg-white">
        <div class="container-shell pb-28 pt-6 sm:pt-8 lg:pb-16 lg:pt-10">

            {{-- Judul --}}
            <a href="{{ route('home') }}"
                class="-ml-2 inline-flex min-h-[44px] items-center gap-2 px-2 font-mono text-[9px] font-medium uppercase tracking-[0.18em] text-brand-muted transition-colors hover:text-brand-blue-700">
                <svg class="h-3.5 w-3.5" fill="none" stroke="currentColor" stroke-width="1.75"
                    viewBox="0 0 24 24" aria-hidden="true">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M19 12H5m0 0l6-6m-6 6l6 6" />
                </svg>
                Kembali ke Home
            </a>

            <div class="mt-2 flex items-end justify-between gap-4 border-b border-brand-line pb-6">
                <div>
                    <h1
                        class="font-display text-[clamp(2rem,8vw,3.25rem)] font-black leading-[0.94] tracking-[-0.045em] text-brand-ink">
                        Katalog Penjualan Mobil
                    </h1>
                    <p class="mt-2.5 max-w-[46ch] text-[13.5px] leading-relaxed text-brand-muted sm:text-[15px]">
                        Temukan mobil impian Anda dengan penawaran terbaik
                    </p>
                </div>

                <p class="hud hidden shrink-0 pb-1 text-right text-brand-muted sm:block">
                    <span class="block text-[13px] tracking-[0.06em] text-brand-ink tabular-nums sm:text-[15px]">
                        {{ str_pad($cars->total(), 2, '0', STR_PAD_LEFT) }}
                    </span>
                    Unit
                </p>
            </div>

            <div class="mt-6 flex flex-col gap-6 lg:mt-8 lg:flex-row lg:gap-8">

                {{-- Filter --}}
                <noscript>
                    <style>
                        #filter-panel {
                            display: block !important;
                        }
                    </style>
                </noscript>
                <aside class="w-full lg:w-[292px] lg:shrink-0">
                    <div class="lg:sticky lg:top-[92px]">
                        <div x-data="{
                            open: window.matchMedia('(min-width: 1024px)').matches,
                            init() {
                                window.matchMedia('(min-width: 1024px)').addEventListener('change', (e) => {
                                    this.open = e.matches;
                                });
                            },
                        }" class="border border-brand-line bg-white">

                            <div class="flex items-center justify-between gap-2 bg-brand-ink px-4 py-3 text-white">
                                <p class="hud flex items-center gap-2 text-white">
                                    <svg class="h-4 w-4 text-brand-blue-300" fill="none" stroke="currentColor"
                                        stroke-width="1.5" viewBox="0 0 24 24" aria-hidden="true">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M3.75 6.75h16.5M6.75 12h10.5M10.5 17.25h3" />
                                    </svg>
                                    Filter
                                    @if ($activeFilters->isNotEmpty())
                                        <span
                                            class="inline-flex h-4 min-w-4 items-center justify-center bg-brand-blue-500 px-1 font-mono text-[8px] leading-none text-white tabular-nums">{{ $activeFilters->count() }}</span>
                                    @endif
                                </p>

                                <div class="flex items-center gap-1">
                                    <a href="{{ route('catalog') }}"
                                        class="inline-flex min-h-[44px] items-center px-2 font-mono text-[8.5px] uppercase tracking-[0.14em] text-white/55 underline decoration-white/20 underline-offset-4 transition-colors hover:text-white">
                                        Reset
                                    </a>

                                    <button type="button" @click="open = !open" :aria-expanded="open.toString()"
                                        aria-controls="filter-panel" aria-label="Buka atau tutup filter"
                                        class="inline-flex h-11 w-11 items-center justify-center text-white transition-colors hover:text-brand-blue-200 lg:hidden">
                                        <svg class="h-4 w-4 transition-transform duration-200"
                                            :class="open ? 'rotate-180' : ''" fill="none" stroke="currentColor"
                                            stroke-width="1.75" viewBox="0 0 24 24" aria-hidden="true">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7" />
                                        </svg>
                                    </button>
                                </div>
                            </div>

                            <div id="filter-panel" x-show="open" x-cloak class="p-4 sm:p-5">
                                <form action="{{ route('catalog') }}" method="GET" class="space-y-4">

                                    <div>
                                        <label for="filter-search" class="field-label">Cari Nama/Model</label>
                                        <div class="relative">
                                            <input id="filter-search" type="text" name="search"
                                                value="{{ request('search') }}" placeholder="Contoh: Pajero Sport"
                                                class="field pl-9">
                                            <svg class="pointer-events-none absolute left-3 top-1/2 h-3.5 w-3.5 -translate-y-1/2 text-brand-steel"
                                                fill="none" stroke="currentColor" stroke-width="1.75"
                                                viewBox="0 0 24 24" aria-hidden="true">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M21 21l-4.35-4.35M17 11a6 6 0 11-12 0 6 6 0 0112 0z" />
                                            </svg>
                                        </div>
                                    </div>

                                    <div>
                                        <label for="filter-brand" class="field-label">Merek</label>
                                        <select id="filter-brand" name="brand" class="field">
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
                                        <span class="field-label">Rentang Harga (Rp)</span>
                                        <div class="grid grid-cols-2 gap-2">
                                            <div>
                                                <label for="filter-min" class="sr-only">Harga minimum</label>
                                                <input id="filter-min" type="number" name="min_price"
                                                    value="{{ request('min_price') }}" placeholder="Min"
                                                    inputmode="numeric" class="field">
                                            </div>
                                            <div>
                                                <label for="filter-max" class="sr-only">Harga maksimum</label>
                                                <input id="filter-max" type="number" name="max_price"
                                                    value="{{ request('max_price') }}" placeholder="Max"
                                                    inputmode="numeric" class="field">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="grid grid-cols-2 gap-2">
                                        <div>
                                            <label for="filter-year" class="field-label">Tahun</label>
                                            <select id="filter-year" name="year" class="field">
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
                                            <label for="filter-color" class="field-label">Warna</label>
                                            <select id="filter-color" name="color" class="field capitalize">
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

                                    <button type="submit" class="btn btn-blue w-full">
                                        Terapkan Filter
                                    </button>
                                </form>
                            </div>
                        </div>

                        {{-- Catatan teknis kecil, desktop --}}
                        <p class="hud mt-4 hidden items-center gap-2 text-brand-muted lg:flex">
                            <span class="h-px w-6 bg-brand-blue-500" aria-hidden="true"></span>
                            Data unit diperbarui berkala
                        </p>
                    </div>
                </aside>

                {{-- Hasil --}}
                <div class="min-w-0 flex-1">
                    <div class="flex items-end justify-between gap-3 border-b border-brand-line pb-3">
                        <div>
                            <h2 class="font-display text-[20px] font-extrabold tracking-[-0.03em] text-brand-ink">
                                Unit Tersedia
                            </h2>
                            <p class="mt-1.5 text-[12px] text-brand-muted">
                                Menampilkan <span
                                    class="font-semibold text-brand-ink tabular-nums">{{ $cars->total() }}</span>
                                mobil siap jual
                            </p>
                        </div>
                    </div>

                    @if ($activeFilters->isNotEmpty())
                        <div class="mt-3 flex flex-wrap items-center gap-2">
                            @if (request()->filled('search'))
                                <span class="filter-chip">Cari: {{ request('search') }}</span>
                            @endif
                            @if (request()->filled('brand'))
                                <span class="filter-chip">{{ request('brand') }}</span>
                            @endif
                            @if (request()->filled('year'))
                                <span class="filter-chip">{{ request('year') }}</span>
                            @endif
                            @if (request()->filled('color'))
                                <span class="filter-chip capitalize">{{ request('color') }}</span>
                            @endif
                            @if (request()->filled('min_price') && request()->filled('max_price'))
                                <span class="filter-chip">Rp
                                    {{ number_format((int) request('min_price'), 0, ',', '.') }} –
                                    Rp {{ number_format((int) request('max_price'), 0, ',', '.') }}</span>
                            @elseif (request()->filled('min_price'))
                                <span class="filter-chip">Min Rp
                                    {{ number_format((int) request('min_price'), 0, ',', '.') }}</span>
                            @elseif (request()->filled('max_price'))
                                <span class="filter-chip">Maks Rp
                                    {{ number_format((int) request('max_price'), 0, ',', '.') }}</span>
                            @endif
                        </div>
                    @endif

                    @if ($cars->isEmpty())
                        <div class="mt-6 border border-brand-line bg-brand-paper px-6 py-12 sm:py-16">
                            <div class="flex h-11 w-11 items-center justify-center bg-brand-blue-500 text-white">
                                <svg class="h-5 w-5" fill="none" stroke="currentColor" stroke-width="1.5"
                                    viewBox="0 0 24 24" aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                                </svg>
                            </div>
                            <h3 class="mt-4 font-display text-2xl font-black tracking-[-0.03em] text-brand-ink">
                                Unit Tidak Ditemukan
                            </h3>
                            <p class="mt-2 max-w-sm text-sm leading-relaxed text-brand-muted">
                                Silakan atur ulang filter pencarian Anda.
                            </p>
                            <a href="{{ route('catalog') }}" class="btn btn-ink mt-6 w-full sm:w-auto">
                                Reset Filter
                            </a>
                        </div>
                    @else
                        <div class="mt-5 grid grid-cols-1 gap-4 sm:grid-cols-2 sm:gap-5 xl:grid-cols-3">
                            @foreach ($cars as $car)
                                <x-car-card :car="$car" />
                            @endforeach
                        </div>

                        <div class="mt-8 border-t border-brand-line pt-5">
                            {{ $cars->links() }}
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
