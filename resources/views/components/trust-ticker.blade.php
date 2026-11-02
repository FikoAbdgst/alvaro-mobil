@php
    $claims = ['Garansi Mesin', 'Surat Lengkap', 'Harga Terbaik', 'Proses Cepat'];
@endphp

{{-- Pita klaim yang bergerak pelan; isi teks berasal dari bagian Mengapa --}}
<div class="on-dark relative overflow-hidden border-y border-white/10 bg-brand-ink py-3">
    <p class="sr-only">
        Garansi mesin, surat lengkap, harga terbaik, proses cepat. Baleendah · Bandung, sejak 2024.
    </p>

    <div class="marquee-track" aria-hidden="true">
        @foreach (range(0, 1) as $copy)
            <div class="marquee-group">
                @foreach ($claims as $claim)
                    <span class="flex items-center">
                        <span class="hud whitespace-nowrap px-5 text-white/80 sm:px-7">{{ $claim }}</span>
                        <span class="h-[3px] w-[3px] rotate-45 bg-brand-blue-400"></span>
                    </span>
                @endforeach
            </div>
        @endforeach
    </div>
</div>