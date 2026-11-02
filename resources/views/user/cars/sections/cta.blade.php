@php
    use Carbon\Carbon;

    $now = Carbon::now('Asia/Jakarta');
    $openTime = Carbon::createFromTime(8, 0, 0, 'Asia/Jakarta');
    $closeTime = Carbon::createFromTime(20, 0, 0, 'Asia/Jakarta');

    // Cek apakah hari ini Minggu (0)
    $isSunday = $now->dayOfWeek === 0;

    // Logika Buka/Tutup (Libur hari minggu opsional, jika buka tiap hari hapus $isSunday)
    $isOpen = $now->between($openTime, $closeTime);

    $waHref =
        'https://wa.me/6287875712617?text=Halo%20Admin%20Alvaro%20Mobil,%20saya%20tertarik%20untuk%20bertanya%20mengenai%20mobil%20yang%20tersedia.';
@endphp

<footer id="kontak" class="on-dark relative scroll-mt-20 overflow-hidden bg-brand-ink text-white lg:scroll-mt-24">
    <div class="h-[2px] w-full bg-transparent" aria-hidden="true"></div>

    <div data-reveal class="container-shell pb-24 pt-12 sm:pb-12 sm:pt-14 lg:pt-20">
        <div class="grid gap-10 lg:grid-cols-12 lg:gap-12">

            {{-- Merek + aksi utama --}}
            <div class="lg:col-span-5">
                <div class="flex items-center gap-3">
                    <img src="{{ asset('images/logo.png') }}" alt="Logo PT Alvaro Mobil" width="44"
                        height="44" loading="lazy"
                        class="h-10 w-10 rounded-full bg-white object-contain p-0.5 ring-1 ring-white/15">
                    <span class="flex flex-col leading-none">
                        <span class="font-display text-[16px] font-black uppercase tracking-[-0.02em] text-white">
                            PT Alvaro Mobil
                        </span>
                        <span class="mt-1.5 hud text-brand-blue-200">Showroom Mobil</span>
                    </span>
                </div>

                <p class="mt-5 max-w-md text-[13.5px] leading-relaxed text-white/65 sm:text-sm">
                    Dealer mobil terpercaya yang menyediakan berbagai pilihan mobil berkualitas dengan proses yang
                    cepat, aman, dan transparan. Kepuasan Anda adalah prioritas kami.
                </p>

                <a href="{{ $waHref }}" target="_blank" rel="noopener noreferrer"
                    class="btn btn-blue mt-6 w-full !min-h-[52px] sm:w-auto sm:!px-7">
                    <svg class="h-[18px] w-[18px]" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                        <path
                            d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z" />
                    </svg>
                    Hubungi Kami
                </a>
            </div>

            {{-- Kontak --}}
            <div class="lg:col-span-3">
                <h4 class="hud text-brand-blue-200">Hubungi Kami</h4>
                <ul class="mt-5 space-y-4">
                    <li class="flex items-start gap-3">
                        <span
                            class="mt-0.5 flex h-8 w-8 shrink-0 items-center justify-center border border-white/10 text-brand-blue-200">
                            <svg class="h-4 w-4" fill="none" stroke="currentColor" stroke-width="1.5"
                                viewBox="0 0 24 24" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M17.657 16.657L13.414 20.9a2 2 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                            </svg>
                        </span>
                        <span class="text-[13px] leading-relaxed text-white/70">
                            Jalan Terusan Cibaduyut, Rancamanyar, Baleendah, Kab. Bandung, Jawa Barat 40375
                        </span>
                    </li>

                    <li class="flex items-center gap-3">
                        <span
                            class="flex h-8 w-8 shrink-0 items-center justify-center border border-white/10 text-brand-blue-200">
                            <svg class="h-4 w-4" fill="none" stroke="currentColor" stroke-width="1.5"
                                viewBox="0 0 24 24" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                            </svg>
                        </span>
                        <a href="tel:+6287875712617"
                            class="inline-flex min-h-[44px] items-center text-[13px] font-medium text-white underline decoration-white/25 decoration-1 underline-offset-4 transition-colors hover:decoration-brand-blue-300">
                            +62 878-7571-2617
                        </a>
                    </li>

                    <li>
                        <a href="https://maps.google.com/maps/place/ALVARO+SHOWROOM+MOBIL/@-6.9875386,107.5802835,17z/data=!3m1!4b1!4m6!3m5!1s0x2e68e90005bf26ed:0x50350b0bcb85a223!8m2!3d-6.9875386!4d107.5851544!16s%2Fg%2F11x2j83l5l?entry=ttu&g_ep=EgoyMDI2MDEwNy4wIKXMDSoASAFQAw%3D%3D"
                            target="_blank" rel="noopener noreferrer"
                            class="inline-flex min-h-[44px] items-center gap-1.5 text-[11px] font-bold uppercase tracking-[0.1em] text-brand-blue-200 underline decoration-brand-blue-300/40 decoration-1 underline-offset-4 transition-colors hover:text-white">
                            Lihat di Google Maps
                            <svg class="h-3.5 w-3.5" fill="none" stroke="currentColor" stroke-width="1.75"
                                viewBox="0 0 24 24" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M7 17L17 7M9 7h8v8" />
                            </svg>
                        </a>
                    </li>
                </ul>
            </div>

            {{-- Jam operasional --}}
            <div class="lg:col-span-4">
                <div class="border border-white/10 p-5">
                    <div class="flex items-center justify-between gap-3 border-b border-white/10 pb-4">
                        <h4 class="hud text-white/60">Jam operasional</h4>

                        <span class="inline-flex items-center gap-1.5 text-[11px] font-medium text-white/65">
                            <span class="h-1.5 w-1.5 {{ $isOpen ? 'bg-emerald-500' : 'bg-brand-steel' }}"
                                aria-hidden="true"></span>
                            {{ $isOpen ? 'Buka sekarang' : 'Tutup sekarang' }}
                        </span>
                    </div>

                    <div class="flex items-baseline justify-between border-b border-white/10 py-4">
                        <span class="text-[13px] text-white/65">Senin – Minggu</span>
                        <span class="font-mono text-[13px] font-medium tabular-nums text-white/85">08.00 – 20.00</span>
                    </div>

                    <p class="mt-4 text-[12.5px] leading-relaxed text-white/55">
                        Kunjungi showroom kami untuk melihat unit secara langsung.
                    </p>
                </div>
            </div>
        </div>

        <div
            class="mt-10 flex flex-col gap-4 border-t border-white/10 pt-6 sm:flex-row sm:items-center sm:justify-between">
            <p class="text-[11px] text-white/45">
                © {{ date('Y') }} <span class="font-medium text-white/70">PT ALVARO MOBIL</span> All rights
                reserved.
            </p>
            <div class="flex gap-6 font-mono text-[9.5px] uppercase tracking-[0.14em]">
                <a href="#" class="inline-flex min-h-[44px] items-center text-white/45 transition-colors hover:text-white">Privacy
                    Policy</a>
                <a href="#" class="inline-flex min-h-[44px] items-center text-white/45 transition-colors hover:text-white">Terms</a>
            </div>
        </div>

        <p class="pointer-events-none mt-4 select-none overflow-hidden whitespace-nowrap font-display text-[17vw] font-black uppercase leading-[0.72] tracking-[-0.07em] text-white/[0.055]"
            aria-hidden="true">Alvaro</p>
    </div>
</footer>
