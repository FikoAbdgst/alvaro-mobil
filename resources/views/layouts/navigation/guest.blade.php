@php
    $onHome = request()->routeIs('home');
    $waHref =
        'https://wa.me/6287875712617?text=Halo%20Admin%20Alvaro%20Mobil,%20saya%20tertarik%20untuk%20bertanya%20mengenai%20mobil%20yang%20tersedia.';
    $links = [
        ['label' => 'Home', 'hash' => 'top'],
        ['label' => 'Tentang', 'hash' => 'tentang'],
        ['label' => 'Koleksi', 'hash' => 'koleksi'],
        ['label' => 'Testimoni', 'hash' => 'testimoni'],
        ['label' => 'Kontak', 'hash' => 'kontak'],
    ];
@endphp

@guest
<header x-data="{
        open: false,
        progress: 0,
        updateProgress() {
            const doc = document.documentElement;
            const max = doc.scrollHeight - window.innerHeight;
            this.progress = max > 0 ? Math.min(100, (window.scrollY / max) * 100) : 0;
        },
        init() {
            this.updateProgress();
        }
    }" @scroll.window="updateProgress()" @keydown.escape.window="open = false" @resize.window="if (window.innerWidth >= 1024) open = false"
        x-effect="document.body.classList.toggle('overflow-hidden', open)"
        class="sticky top-0 z-50 bg-white border-b border-brand-line">

        <div class="container-shell">
            <div class="grid h-16 grid-cols-[1fr_auto] items-center gap-3 lg:h-[76px] lg:grid-cols-[1fr_auto_1fr]">

                {{-- Brand --}}
                <a href="{{ $onHome ? '#top' : route('home') }}"
                    class="flex min-h-[44px] w-fit items-center gap-2.5" aria-label="PT Alvaro Mobil — Beranda">
                    <img src="{{ asset('images/logo.png') }}" alt=""
                        width="36" height="36"
                        class="h-8 w-8 object-contain sm:h-9 sm:w-9">
                    <span class="flex flex-col justify-center leading-none">
                        <span class="font-display text-[15px] font-black uppercase tracking-[-0.03em] text-brand-ink sm:text-[17px]">
                            Alvaro
                        </span>
                        <span class="mt-1 hidden font-mono text-[8px] font-medium uppercase tracking-[0.2em] text-brand-muted sm:block">
                            Showroom Mobil
                        </span>
                    </span>
                </a>

                {{-- Links tengah (desktop) --}}
                <nav class="hidden items-center gap-1 lg:flex" aria-label="Navigasi utama">
                    @foreach ($links as $link)
                        <a href="{{ $onHome ? '#' . $link['hash'] : route('home') . '#' . $link['hash'] }}"
                            class="nav-link">{{ $link['label'] }}</a>
                    @endforeach
                </nav>

                {{-- Aksi kanan --}}
                <div class="flex items-center justify-end gap-2">
                    <a href="{{ $waHref }}" target="_blank" rel="noopener noreferrer"
                        class="hidden min-h-[44px] items-center gap-2 rounded-full bg-brand-ink px-5 text-[11px] font-bold uppercase tracking-[0.12em] text-white transition-colors hover:bg-brand-blue-600 lg:inline-flex">
                        <svg class="h-4 w-4" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                            <path
                                d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z" />
                        </svg>
                        Hubungi Kami
                    </a>

                    {{-- WhatsApp ringkas (mobile) --}}
                    <a href="{{ $waHref }}" target="_blank" rel="noopener noreferrer"
                        class="icon-btn bg-brand-ink text-white hover:bg-brand-blue-600 lg:hidden"
                        aria-label="Hubungi kami via WhatsApp">
                        <svg class="h-5 w-5" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                            <path
                                d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z" />
                        </svg>
                    </a>

                    {{-- Menu mobile --}}
                    <button type="button" @click="open = true" aria-label="Buka menu navigasi"
                        aria-controls="menu-mobile" :aria-expanded="open.toString()"
                        class="icon-btn group text-brand-ink hover:bg-brand-paper lg:hidden">
                        <span class="flex w-5 flex-col items-end gap-[5px]" aria-hidden="true">
                            <span class="h-[1.5px] w-5 bg-current transition-all"></span>
                            <span class="h-[1.5px] w-3 bg-current transition-all group-hover:w-5"></span>
                        </span>
                    </button>
                </div>
            </div>
        </div>

        {{-- Garis dasar + progres baca --}}
        <div class="h-px w-full bg-brand-line" aria-hidden="true"></div>
        <div class="absolute inset-x-0 bottom-0 h-[2px] bg-brand-blue-500 transition-[width] duration-150 ease-out"
            :style="`width: ${progress}%`" aria-hidden="true"></div>

        {{-- Menu layar penuh (mobile) --}}
        <div id="menu-mobile" x-show="open" x-cloak x-transition:enter="transition ease-out duration-300"
            x-transition:enter-start="opacity-0 -translate-y-3" x-transition:enter-end="opacity-100 translate-y-0"
            x-transition:leave="transition ease-in duration-200" x-transition:leave-start="opacity-100 translate-y-0"
            x-transition:leave-end="opacity-0 -translate-y-3"
            class="on-dark fixed inset-0 z-[70] flex flex-col overflow-y-auto bg-brand-ink text-white lg:hidden">

            <div class="flex h-16 shrink-0 items-center justify-between gap-4 px-5">
                <span class="flex items-center gap-2.5">
                    <img src="{{ asset('images/logo.png') }}" alt="" width="36" height="36"
                        class="h-8 w-8 rounded-full bg-white object-contain p-0.5">
                    <span class="font-display text-[15px] font-black uppercase tracking-[-0.03em] text-white">Alvaro</span>
                </span>

                <button type="button" @click="open = false" aria-label="Tutup menu"
                    class="icon-btn border border-white/15 text-white hover:border-white/40 hover:bg-white/10">
                    <svg class="h-5 w-5" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"
                        aria-hidden="true">
                        <path stroke-linecap="round" d="M6 6l12 12M18 6L6 18" />
                    </svg>
                </button>
            </div>

            <div class="flex flex-1 flex-col px-5 pb-8 pt-6">
                <p class="hud text-brand-blue-200">Menu</p>

                <nav class="mt-4" aria-label="Navigasi seluler">
                    @foreach ($links as $link)
                        <a href="{{ $onHome ? '#' . $link['hash'] : route('home') . '#' . $link['hash'] }}"
                            class="menu-link" @click="open = false">
                            {{ $link['label'] }}
                            <span
                                class="flex h-9 w-9 shrink-0 items-center justify-center rounded-full border border-white/15 text-white/60">
                                <svg class="h-4 w-4" fill="none" stroke="currentColor" stroke-width="1.5"
                                    viewBox="0 0 24 24" aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M7 17L17 7M9 7h8v8" />
                                </svg>
                            </span>
                        </a>
                    @endforeach
                </nav>

                <div class="mt-auto pt-10">
                    <div class="grid grid-cols-2 gap-6 border-t border-white/10 pt-6">
                        <div>
                            <p class="hud text-white/45">Showroom</p>
                            <p class="mt-2 text-[13px] leading-relaxed text-white/85">
                                Jalan Terusan Cibaduyut, Rancamanyar, Baleendah
                            </p>
                        </div>
                        <div>
                            <p class="hud text-white/45">Jam Buka</p>
                            <p class="mt-2 text-[13px] leading-relaxed text-white/85">
                                Senin – Minggu<br>08.00 – 20.00
                            </p>
                        </div>
                    </div>

                    <a href="{{ $waHref }}" target="_blank" rel="noopener noreferrer"
                        class="btn btn-blue mt-5 w-full !min-h-[52px]" @click="open = false">
                        <svg class="h-5 w-5" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                            <path
                                d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z" />
                        </svg>
                        Hubungi via WhatsApp
                    </a>

                    <p class="mt-8 select-none overflow-hidden whitespace-nowrap font-display text-[17vw] font-black uppercase leading-[0.72] tracking-[-0.07em] text-white/[0.06]"
                        aria-hidden="true">Alvaro</p>
                </div>
            </div>
        </div>
    </header>
@endguest