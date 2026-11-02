@php
    $waHref =
        'https://wa.me/6287875712617?text=Halo%20Admin%20Alvaro%20Mobil,%20saya%20tertarik%20untuk%20bertanya%20mengenai%20mobil%20yang%20tersedia.';
    $openTime = '08.00';
    $closeTime = '20.00';

    $now = now('Asia/Jakarta');
    $opensAt = $now->copy()->setTime(8, 0);
    $closesAt = $now->copy()->setTime(20, 0);
    $isOpen = $now->between($opensAt, $closesAt);

    $brands = ['Toyota', 'Daihatsu', 'Honda', 'Suzuki', 'Nissan', 'Kia', 'Mazda', 'Datsun'];
@endphp

{{-- Hero — mobil dengan latar peta, jam operasional, logo merek --}}
<section id="top" class="relative isolate overflow-hidden border-b border-brand-line bg-white">
    <div class="relative"> {{-- BARU --}}
        <div class="container-shell relative z-10 lg:static"> {{-- tambah lg:static --}}
            <div class="grid lg:min-h-[620px] lg:max-h-[720px] lg:grid-cols-12 lg:items-center lg:gap-8">

                {{-- Kolom teks --}}
                <div data-reveal class="relative z-20 pt-8 sm:pt-12 lg:col-span-5 lg:py-16">

                    <h1
                        class="intro-enter font-display text-[clamp(2.7rem,11vw,4rem)] font-black leading-[0.88] tracking-[-0.045em] text-brand-ink lg:text-[clamp(3.4rem,4.6vw,4.6rem)]">
                        <span class="block">Jual Beli</span>
                        <span class="block">Mobil Pilihan</span>
                        <span class="block">di <span class="text-brand-blue-500">Bandung</span></span>
                    </h1>

                    <p class="intro-enter intro-enter-delay-1 mt-5 max-w-[38ch] text-[14px] leading-relaxed text-brand-muted sm:text-[15px] lg:mt-6">
                        Temukan mobil impian Anda di Alvaro Mobil. Unit terawat, harga transparan,
                        dan proses jual beli yang mudah serta terpercaya.
                    </p>

                    <div class="intro-enter intro-enter-delay-2 mt-6 grid grid-cols-2 gap-2 sm:gap-3 lg:mt-8">
                        <a href="#koleksi" class="btn btn-ink !min-h-[52px] !px-3 whitespace-nowrap sm:!px-5 xl:!px-7">
                            Lihat Koleksi
                            <svg class="h-4 w-4" fill="none" stroke="currentColor" stroke-width="1.75"
                                viewBox="0 0 24 24" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 5v14m0 0l-6-6m6 6l6-6" />
                            </svg>
                        </a>

                        <a href="{{ $waHref }}" target="_blank" rel="noopener noreferrer"
                            class="btn btn-outline !min-h-[52px] !px-3 whitespace-nowrap sm:!px-5 xl:!px-7">
                            <svg class="h-[17px] w-[17px]" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                <path
                                    d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z" />
                            </svg>
                            Hubungi Kami
                        </a>
                    </div>

                    {{-- Jam operasional --}}
                    <div class="intro-enter intro-enter-delay-3 mt-6 max-w-[440px] lg:mt-8">
                        <div class="flex items-center gap-3 border border-brand-line bg-white/90 px-4 py-3 sm:px-5">
                            <span
                                class="flex h-9 w-9 shrink-0 items-center justify-center border border-brand-line text-brand-muted">
                                <svg class="h-4 w-4" fill="none" stroke="currentColor" stroke-width="1.5"
                                    viewBox="0 0 24 24" aria-hidden="true">
                                    <circle cx="12" cy="12" r="8.25" />
                                    <path stroke-linecap="round" d="M12 7.5V12l3 2" />
                                </svg>
                            </span>

                            <div class="min-w-0 flex-1">
                                <div class="flex items-center justify-between gap-3">
                                    <p class="hud text-brand-muted">Jam operasional</p>
                                    <span
                                        class="inline-flex shrink-0 items-center gap-1.5 font-mono text-[9px] font-medium uppercase tracking-[0.08em] text-brand-muted">
                                        <span class="h-1.5 w-1.5 {{ $isOpen ? 'bg-emerald-600' : 'bg-brand-steel' }}"
                                            aria-hidden="true">
                                        </span>
                                        {{ $isOpen ? 'Buka' : 'Tutup' }}
                                    </span>
                                </div>
                                <p
                                    class="mt-1.5 whitespace-nowrap font-display text-[20px] font-bold leading-none tracking-[-0.03em] tabular-nums text-brand-ink sm:text-[22px]">
                                    {{ $openTime }} <span class="text-brand-steel">—</span> {{ $closeTime }}
                                </p>
                                <p class="mt-1.5 text-[11px] text-brand-muted">
                                    Senin – Minggu · WIB
                                </p>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Panggung mobil --}}
                <div class="relative -mx-5 sm:mx-0 lg:absolute lg:inset-y-0 lg:right-0 lg:mx-0 lg:w-[58%]">
                    <div id="hero-stage"
                        class="relative mt-6 h-[300px] overflow-hidden bg-white sm:mt-8 sm:h-[380px] lg:mt-0 lg:h-full">

                        {{-- Peta: hanya di area atas mobil, semua sisinya memudar --}}
                        <div class="pointer-events-none
                         inset-x-[2%] top-[4%] h-[62%] bg-[#f2f4f7]"
                            aria-hidden="true"
                            style="-webkit-mask-image: radial-gradient(ellipse 50% 50% at 50% 50%, #000 30%, transparent 100%); mask-image: radial-gradient(ellipse 50% 50% at 50% 50%, #000 30%, transparent 100%);">
                            <img src="{{ asset('images/hero-map.svg') }}" alt=""
                                class="h-full w-full object-cover">
                        </div>

                        {{-- Mobil: menempel di tepi kanan, mundur ke kanan saat di-hover --}}
                        <div
                            class="hero-car-stage absolute bottom-0 -right-[22%] z-10 w-[115%] max-w-none animate-car-in lg:-right-[27%] lg:w-[110%]">
                            <img id="hero-car" src="{{ asset('images/hero-car.png') }}"
                                alt="Toyota Avanza putih, tampak samping tiga perempat — unit Alvaro Mobil"
                                width="976" height="442" fetchpriority="high" decoding="async"
                                class="block h-auto w-full cursor-pointer">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Logo merek bergerak dari kanan ke kiri. --}}
    <div class="relative z-10 border-t border-brand-line bg-white">
        <div class="brand-marquee py-4 sm:py-5" role="list" aria-label="Merek mobil yang tersedia">
            <div class="brand-marquee-track">
                @foreach (range(0, 1) as $copy)
                    <div class="brand-marquee-group" @if ($copy === 1) aria-hidden="true" @endif>
                        @foreach ($brands as $brand)
                            <span class="brand-marquee-item" role="listitem">
                                <x-brand-mark :name="$brand" />
                            </span>
                        @endforeach
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</section>
