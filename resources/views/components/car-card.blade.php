@props(['car', 'eager' => false])

@php
    $title = trim($car->brand . ' ' . $car->model);
    $price = 'Rp ' . number_format($car->price, 0, ',', '.');
@endphp

<a href="{{ route('cars.show', $car) }}"
    class="group relative flex h-full flex-col border border-brand-line bg-white transition-colors duration-300 hover:border-brand-ink/55 focus-visible:border-brand-blue-500"
    aria-label="Lihat unit {{ $title }} {{ $car->year }}, {{ $price }}">

    {{-- Foto rasio tetap: tidak ada pergeseran layout saat gambar dimuat --}}
    <div class="relative aspect-[16/10] overflow-hidden bg-brand-paper">
        @if ($car->image)
            <img src="{{ Storage::url($car->image) }}" alt="Foto {{ $title }} {{ $car->year }}" width="800"
                height="500" loading="{{ $eager ? 'eager' : 'lazy' }}" decoding="async"
                class="h-full w-full object-contain transition-transform duration-700 ease-out group-hover:scale-[1.035]">
        @else
            <div class="flex h-full w-full items-center justify-center text-brand-steel">
                <svg class="h-12 w-12" fill="none" stroke="currentColor" stroke-width="1.25" viewBox="0 0 24 24"
                    aria-hidden="true">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M5 16l1.2-4.2A2 2 0 018.1 10.3h7.8a2 2 0 011.9 1.5L19 16M5 16h14v2.5h-2.2V17H7.2v1.5H5V16z" />
                    <circle cx="8" cy="16" r="1.4" />
                    <circle cx="16" cy="16" r="1.4" />
                </svg>
            </div>
        @endif

        {{-- Chip status --}}
        <span
            class="absolute left-3 top-3 inline-flex items-center gap-1.5 border bg-white/95 px-2 py-1.5 font-mono text-[8.5px] font-medium uppercase leading-none tracking-[0.12em] {{ $car->is_available ? 'border-brand-blue-200 text-brand-blue-700' : 'border-brand-line text-brand-muted' }}">
            <span class="h-1 w-1 {{ $car->is_available ? 'bg-brand-blue-500' : 'bg-brand-steel' }}"
                aria-hidden="true"></span>
            {{ $car->is_available ? 'Tersedia' : 'Terjual' }}
        </span>

        {{-- Sudut bidik saat hover --}}
        <span class="corner-mark pointer-events-none absolute inset-0" aria-hidden="true"></span>
    </div>

    <div class="flex flex-1 flex-col p-4 sm:p-5">
        <div class="flex items-center justify-between gap-3">
            <p class="hud truncate text-brand-blue-700">{{ $car->brand }}</p>
            <p class="hud shrink-0 tabular-nums text-brand-muted">{{ $car->year }}</p>
        </div>

        <h3 class="mt-2 font-display text-[20px] font-extrabold leading-none tracking-[-0.035em] text-brand-ink sm:text-[22px]">
            {{ $car->model }}
        </h3>

        <p class="mt-2 font-mono text-[9.5px] uppercase tracking-[0.12em] text-brand-muted">
            <span class="capitalize">{{ $car->color }}</span>
        </p>

        <div class="mt-auto flex items-end justify-between gap-3 border-t border-brand-line pt-4">
            <div class="min-w-0">
                <p class="hud text-brand-muted">Harga</p>
                <p class="mt-1.5 truncate text-[17px] font-black tabular-nums leading-none tracking-[-0.03em] text-brand-ink sm:text-[19px]">
                    {{ $price }}
                </p>
            </div>

            <span
                class="flex h-9 w-9 shrink-0 items-center justify-center rounded-full border border-brand-line text-brand-ink transition-colors duration-300 group-hover:border-brand-blue-500 group-hover:bg-brand-blue-500 group-hover:text-white">
                <svg class="h-4 w-4" fill="none" stroke="currentColor" stroke-width="1.75" viewBox="0 0 24 24"
                    aria-hidden="true">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M7 17L17 7M9 7h8v8" />
                </svg>
            </span>
        </div>
    </div>
</a>
