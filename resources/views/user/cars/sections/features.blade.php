@php
    $now = now('Asia/Jakarta');
    $isOpen = $now->between($now->copy()->setTime(8, 0), $now->copy()->setTime(20, 0));
    $waHref =
        'https://wa.me/6287875712617?text=Halo%20Admin%20Alvaro%20Mobil,%20saya%20tertarik%20untuk%20bertanya%20mengenai%20mobil%20yang%20tersedia.';
@endphp

<section id="tentang" class="section-pad scroll-mt-20 border-b border-brand-line bg-white lg:scroll-mt-24">
    <div data-reveal class="container-shell">

        {{-- Kepala bagian --}}
        <div class="grid gap-4 border-b border-brand-line pb-7 lg:grid-cols-2 lg:items-end lg:gap-12 lg:pb-9">
            <h2
                class="font-display text-[clamp(2rem,8vw,3.25rem)] font-black leading-[0.94] tracking-[-0.045em] text-brand-ink">
                Mengapa Harus
                <span class="block">PT <span class="text-brand-blue-500">ALVARO</span> MOBIL?</span>
            </h2>
            <p class="max-w-[48ch] text-[14px] leading-relaxed text-brand-muted sm:text-[15px]">
                Temukan mobil pilihan dengan proses pembelian yang jelas, harga transparan, dan dukungan langsung dari
                tim kami.
            </p>
        </div>

        <div class="grid gap-8 pt-8 lg:grid-cols-2 lg:gap-12 lg:pt-10">

            {{-- Foto showroom, kontak, dan jam operasional --}}
            <div class="min-w-0">
                <figure class="relative overflow-hidden border border-brand-line bg-brand-paper">
                    <div class="aspect-[4/3]">
                        <img src="{{ asset('images/hero.jpeg') }}" alt="Showroom PT Alvaro Mobil Rancamanyar"
                            width="1080" height="810" loading="lazy" decoding="async"
                            class="h-full w-full object-cover">
                    </div>
                    <figcaption
                        class="absolute inset-x-3 bottom-3 flex items-center gap-2 rounded-lg bg-white/92 px-3 py-2 backdrop-blur">
                        <span class="h-1 w-1 bg-brand-blue-500" aria-hidden="true"></span>
                        <span class="text-[11px] font-medium text-brand-ink">Showroom Rancamanyar</span>
                    </figcaption>
                </figure>

                <a href="{{ $waHref }}" target="_blank" rel="noopener noreferrer"
                    class="group mt-4 flex min-h-[52px] items-center justify-between gap-4 bg-brand-ink px-5 text-white transition-colors hover:bg-brand-blue-600">
                    <span class="text-[11px] font-bold uppercase tracking-[0.13em]">Hubungi Kami</span>
                    <span
                        class="flex h-8 w-8 items-center justify-center rounded-full border border-white/25 transition-transform duration-200 group-hover:translate-x-0.5">
                        <svg class="h-4 w-4" fill="none" stroke="currentColor" stroke-width="1.7" viewBox="0 0 24 24"
                            aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M7 17L17 7M9 7h8v8" />
                        </svg>
                    </span>
                </a>


            </div>

            {{-- Tiga alasan memilih Alvaro Mobil --}}
            <div class="min-w-0">
                <div class="border-t border-brand-line">
                    <div class="space-y-6">

                        {{-- Alasan 01 --}}
                        <div
                            class="group grid grid-cols-[30px_1fr] gap-4 border-b border-brand-line py-6 transition-all duration-300 ease-out hover:translate-x-1 sm:grid-cols-[44px_1fr_52px] sm:items-start sm:gap-6 sm:py-8">
                            <span
                                class="pt-1 font-mono text-[10px] font-medium tracking-[0.12em] text-brand-blue-700 transition-transform duration-300 group-hover:translate-x-0.5">01</span>

                            <div class="min-w-0">
                                <h3
                                    class="font-display text-[20px] font-extrabold leading-tight tracking-[-0.03em] text-brand-ink transition-colors duration-300 group-hover:text-brand-blue-700 sm:text-[24px]">
                                    100% Terpercaya
                                </h3>
                                <p
                                    class="mt-2 max-w-[54ch] text-[13.5px] leading-relaxed text-brand-muted transition-colors duration-300 group-hover:text-brand-ink/80 sm:text-[14.5px]">
                                    Unit pilihan berkualitas dengan jaminan garansi mesin, legalitas surat resmi, dan
                                    rekam jejak yang transparan.
                                </p>
                            </div>

                            <span
                                class="hidden h-[52px] w-[52px] items-center justify-center border border-brand-line text-brand-ink/45 transition-all duration-300 group-hover:-translate-y-0.5 group-hover:border-brand-blue-500 group-hover:bg-brand-blue-500 group-hover:text-white sm:flex">
                                <svg class="h-6 w-6" fill="none" stroke="currentColor" stroke-width="1.4"
                                    stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24"
                                    aria-hidden="true">
                                    <path
                                        d="M9 12.75L11.25 15 15 9.75M21 12c0 1.268-.63 2.39-1.593 3.068a3.745 3.745 0 01-1.043 3.296 3.745 3.745 0 01-3.296 1.043A3.745 3.745 0 0112 21c-1.268 0-2.39-.63-3.068-1.593a3.746 3.746 0 01-3.296-1.043 3.745 3.745 0 01-1.043-3.296A3.745 3.745 0 013 12c0-1.268.63-2.39 1.593-3.068a3.745 3.745 0 011.043-3.296 3.746 3.746 0 013.296-1.043A3.746 3.746 0 0112 3c1.268 0 2.39.63 3.068 1.593a3.746 3.746 0 013.296 1.043 3.746 3.746 0 011.043 3.296A3.745 3.745 0 0121 12z" />
                                </svg>
                            </span>
                        </div>

                        {{-- Alasan 02 --}}
                        <div
                            class="group grid grid-cols-[30px_1fr] gap-4 border-b border-brand-line py-6 transition-all duration-300 ease-out hover:translate-x-1 sm:grid-cols-[44px_1fr_52px] sm:items-start sm:gap-6 sm:py-8">
                            <span
                                class="pt-1 font-mono text-[10px] font-medium tracking-[0.12em] text-brand-blue-700 transition-transform duration-300 group-hover:translate-x-0.5">02</span>

                            <div class="min-w-0">
                                <h3
                                    class="font-display text-[20px] font-extrabold leading-tight tracking-[-0.03em] text-brand-ink transition-colors duration-300 group-hover:text-brand-blue-700 sm:text-[24px]">
                                    Harga Terbaik
                                </h3>
                                <p
                                    class="mt-2 max-w-[54ch] text-[13.5px] leading-relaxed text-brand-muted transition-colors duration-300 group-hover:text-brand-ink/80 sm:text-[14.5px]">
                                    Penawaran harga paling kompetitif di pasaran dengan skema pembayaran cash atau
                                    kredit yang fleksibel.
                                </p>
                            </div>

                            <span
                                class="hidden h-[52px] w-[52px] items-center justify-center border border-brand-line text-brand-ink/45 transition-all duration-300 group-hover:-translate-y-0.5 group-hover:border-brand-blue-500 group-hover:bg-brand-blue-500 group-hover:text-white sm:flex">
                                <svg class="h-6 w-6" fill="none" stroke="currentColor" stroke-width="1.4"
                                    stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24"
                                    aria-hidden="true">
                                    <path
                                        d="M2.25 18.75a60.07 60.07 0 0115.797 2.101c.727.198 1.453-.342 1.453-1.096V18.75M3.75 4.5v.75A.75.75 0 013 6h-.75m0 0v-.375c0-.621.504-1.125 1.125-1.125H20.25M2.25 6v9m18-10.5v.75c0 .414.336.75.75.75h.75m-1.5-1.5h.375c.621 0 1.125.504 1.125 1.125v9.75c0 .621-.504 1.125-1.125 1.125h-.375m1.5-1.5H21a.75.75 0 00-.75.75v.75m0 0H3.75m0 0h-.375a1.125 1.125 0 01-1.125-1.125V15m1.5 0v-.75A.75.75 0 003 15h-.75M15 10.5a3 3 0 11-6 0 3 3 0 016 0z" />
                                </svg>
                            </span>
                        </div>

                        {{-- Alasan 03 --}}
                        <div
                            class="group grid grid-cols-[30px_1fr] gap-4 border-b border-brand-line py-6 transition-all duration-300 ease-out hover:translate-x-1 sm:grid-cols-[44px_1fr_52px] sm:items-start sm:gap-6 sm:py-8">
                            <span
                                class="pt-1 font-mono text-[10px] font-medium tracking-[0.12em] text-brand-blue-700 transition-transform duration-300 group-hover:translate-x-0.5">03</span>

                            <div class="min-w-0">
                                <h3
                                    class="font-display text-[20px] font-extrabold leading-tight tracking-[-0.03em] text-brand-ink transition-colors duration-300 group-hover:text-brand-blue-700 sm:text-[24px]">
                                    Proses Cepat
                                </h3>
                                <p
                                    class="mt-2 max-w-[54ch] text-[13.5px] leading-relaxed text-brand-muted transition-colors duration-300 group-hover:text-brand-ink/80 sm:text-[14.5px]">
                                    Administrasi yang efisien dan transparan. Mobil impian Anda bisa langsung dibawa
                                    pulang hari ini juga.
                                </p>
                            </div>

                            <span
                                class="hidden h-[52px] w-[52px] items-center justify-center border border-brand-line text-brand-ink/45 transition-all duration-300 group-hover:-translate-y-0.5 group-hover:border-brand-blue-500 group-hover:bg-brand-blue-500 group-hover:text-white sm:flex">
                                <svg class="h-6 w-6" fill="none" stroke="currentColor" stroke-width="1.4"
                                    stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24"
                                    aria-hidden="true">
                                    <path d="M3.75 13.5l10.5-11.25L12 10.5h8.25L9.75 21.75 12 13.5H3.75z" />
                                </svg>
                            </span>
                        </div>
                    </div>
                </div>


            </div>
        </div>
    </div>
</section>
