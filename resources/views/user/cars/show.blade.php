@php
    $message = "Halo Admin, saya tertarik dengan mobil ini:\n\n";
    $message .= '*Merek:* ' . $car->brand . "\n";
    $message .= '*Model:* ' . $car->model . "\n";
    $message .= '*Tahun:* ' . $car->year . "\n";
    $message .= '*Harga:* Rp ' . number_format($car->price, 0, ',', '.') . "\n\n";
    $message .= 'Apakah unit ini masih tersedia?';

    $encodedMessage = urlencode($message);
    $phoneNumber = '6287875712617';
    $waHref = "https://wa.me/{$phoneNumber}?text={$encodedMessage}";
    $carTitle = trim($car->brand . ' ' . $car->model);
    $price = 'Rp ' . number_format($car->price, 0, ',', '.');
@endphp

<x-app-layout :show-floating="false">
    <div class="min-h-screen bg-white pb-28 lg:pb-12">

        {{-- Bar navigasi kembali --}}
        <div class="border-b border-brand-line bg-white">
            <div class="container-shell flex min-h-[52px] items-center justify-between gap-4">
                <a href="{{ route('home') }}"
                    class="-ml-2 inline-flex min-h-[44px] items-center gap-2 px-2 font-mono text-[9px] font-medium uppercase tracking-[0.18em] text-brand-muted transition-colors hover:text-brand-blue-700">
                    <svg class="h-3.5 w-3.5" fill="none" stroke="currentColor" stroke-width="1.75"
                        viewBox="0 0 24 24" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M19 12H5m0 0l6-6m-6 6l6 6" />
                    </svg>
                    Kembali
                </a>

                <p class="hud text-brand-muted">Unit / {{ $car->year }}</p>
            </div>
        </div>

        <div class="container-shell pt-6 sm:pt-8 lg:pt-10">
            <div class="grid gap-8 lg:grid-cols-12 lg:gap-10">

                {{-- Foto + bukti --}}
                <div class="lg:col-span-7">
                    <div class="flex items-center justify-between gap-3 pb-3">
                        <p class="hud text-brand-blue-700">{{ $car->brand }}</p>
                        <p class="hud text-brand-muted">ID / {{ str_pad($car->id, 4, '0', STR_PAD_LEFT) }}</p>
                    </div>

                    <div class="border border-brand-line bg-white">
                        <div class="relative aspect-[4/3] overflow-hidden bg-brand-paper lg:aspect-[16/11]">
                            @if ($car->image)
                                <button type="button"
                                    class="group absolute inset-0 block h-full w-full cursor-zoom-in"
                                    onclick="openModal('{{ Storage::url($car->image) }}')"
                                    aria-label="Perbesar foto {{ $carTitle }} {{ $car->year }}">
                                    <img src="{{ Storage::url($car->image) }}"
                                        alt="Foto {{ $carTitle }} {{ $car->year }}" width="1200" height="900"
                                        fetchpriority="high" decoding="async"
                                        class="h-full w-full object-cover transition-transform duration-700 group-hover:scale-[1.02]">

                                    <span
                                        class="absolute bottom-3 right-3 inline-flex items-center gap-1.5 bg-white px-2.5 py-2 font-mono text-[8.5px] font-medium uppercase tracking-[0.12em] text-brand-ink">
                                        <svg class="h-3.5 w-3.5" fill="none" stroke="currentColor" stroke-width="1.75"
                                            viewBox="0 0 24 24" aria-hidden="true">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0zM10 7v3m0 0v3m0-3h3m-3 0H7" />
                                        </svg>
                                        Zoom
                                    </span>
                                </button>
                            @else
                                <div class="flex h-full w-full flex-col items-center justify-center gap-3 text-brand-muted">
                                    <svg class="h-12 w-12" fill="none" stroke="currentColor" stroke-width="1.25"
                                        viewBox="0 0 24 24" aria-hidden="true">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                    </svg>
                                    <p class="font-mono text-[9px] uppercase tracking-[0.16em]">Gambar Tidak Tersedia</p>
                                </div>
                            @endif

                            <span
                                class="pointer-events-none absolute left-3 top-3 inline-flex items-center gap-1.5 border bg-white/95 px-2 py-1.5 font-mono text-[8.5px] font-medium uppercase leading-none tracking-[0.12em] {{ $car->is_available ? 'border-brand-blue-200 text-brand-blue-700' : 'border-brand-line text-brand-muted' }}">
                                <span
                                    class="h-1 w-1 {{ $car->is_available ? 'bg-brand-blue-500' : 'bg-brand-steel' }}"
                                    aria-hidden="true"></span>
                                {{ $car->is_available ? 'Tersedia' : 'Terjual' }}
                            </span>
                        </div>

                        @if ($car->images->count() > 0)
                            <div class="border-t border-brand-line p-3 sm:p-4">
                                <div class="flex items-center justify-between gap-3">
                                    <h2 class="hud text-brand-muted">
                                        Galeri Foto / {{ $car->images->count() }}
                                    </h2>

                                    @if ($car->images->count() > 6)
                                        <button type="button" onclick="toggleGallery()" id="toggleBtn"
                                            class="inline-flex min-h-[44px] items-center gap-1 px-2 font-mono text-[8.5px] font-medium uppercase tracking-[0.12em] text-brand-blue-700 transition-colors hover:text-brand-blue-800">
                                            <span id="toggleText">Lihat Semua</span>
                                            <svg id="toggleIcon" class="h-3.5 w-3.5 transition-transform"
                                                fill="none" stroke="currentColor" stroke-width="1.75"
                                                viewBox="0 0 24 24" aria-hidden="true">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7" />
                                            </svg>
                                        </button>
                                    @endif
                                </div>

                                <div id="galleryGrid" class="mt-3 grid grid-cols-4 gap-2 lg:grid-cols-6">
                                    @foreach ($car->images as $index => $photo)
                                        <button type="button"
                                            class="gallery-item aspect-square overflow-hidden border border-brand-line bg-white transition-colors hover:border-brand-blue-500 {{ $index >= 6 ? 'hidden' : '' }}"
                                            data-index="{{ $index }}"
                                            onclick="openModal('{{ Storage::url($photo->image_path) }}')"
                                            aria-label="Perbesar foto {{ $carTitle }} nomor {{ $index + 1 }}">
                                            <img src="{{ Storage::url($photo->image_path) }}"
                                                alt="Galeri {{ $carTitle }} {{ $index + 1 }}" width="200"
                                                height="200" loading="lazy" decoding="async"
                                                class="h-full w-full object-cover">
                                        </button>
                                    @endforeach
                                </div>
                            </div>
                        @endif
                    </div>

                    {{-- Bukti kualitas --}}
                    <div class="mt-4 grid grid-cols-3 border-y border-brand-line">
                        @foreach ([
            ['label' => 'Kondisi Prima', 'icon' => 'M4 15l1.5-5A2 2 0 017.4 8.5h9.2a2 2 0 011.9 1.5L20 15M4 15h16v3a1 1 0 01-1 1h-1a1 1 0 01-1-1v-1H7v1a1 1 0 01-1 1H5a1 1 0 01-1-1v-3z'],
            ['label' => 'Surat Lengkap', 'icon' => 'M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z'],
            ['label' => 'Terawat Rutin', 'icon' => 'M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z'],
        ] as $proof)
                            <div
                                class="flex flex-col items-center gap-2 border-r border-brand-line px-2 py-3.5 text-center last:border-r-0 sm:flex-row sm:justify-center sm:gap-2.5 sm:py-4">
                                <svg class="h-4 w-4 shrink-0 text-brand-blue-700" fill="none" stroke="currentColor"
                                    stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"
                                    viewBox="0 0 24 24" aria-hidden="true">
                                    <path d="{{ $proof['icon'] }}" />
                                </svg>
                                <p class="font-mono text-[8.5px] uppercase leading-tight tracking-[0.08em] text-brand-muted">
                                    {{ $proof['label'] }}
                                </p>
                            </div>
                        @endforeach
                    </div>
                </div>

                {{-- Detail unit --}}
                <div class="lg:col-span-5">
                    <div class="lg:sticky lg:top-[92px]">
                        <p class="hud text-brand-blue-700">{{ $car->brand }}</p>
                        <h1
                            class="mt-2 font-display text-[clamp(2.25rem,8.5vw,3.25rem)] font-black leading-[0.95] tracking-[-0.045em] text-brand-ink">
                            {{ $car->model }}
                        </h1>

                        <div class="mt-3 flex items-center gap-2.5 font-mono text-[9.5px] uppercase tracking-[0.14em] text-brand-muted">
                            <span class="tabular-nums">{{ $car->year }}</span>
                            <span class="h-1 w-1 bg-brand-blue-500" aria-hidden="true"></span>
                            <span class="capitalize">{{ $car->color }}</span>
                        </div>

                        <div class="mt-6 border-t border-brand-line pt-5">
                            <div class="flex items-end justify-between gap-3">
                                <div>
                                    <p class="hud text-brand-muted">Harga</p>
                                    <p
                                        class="mt-2 text-[clamp(1.9rem,7.5vw,2.6rem)] font-black tabular-nums leading-none tracking-[-0.045em] text-brand-ink">
                                        {{ $price }}
                                    </p>
                                </div>
                                <p class="hud pb-1 text-brand-muted">OTR</p>
                            </div>
                        </div>

                        {{-- CTA desktop --}}
                        <div class="mt-6 hidden lg:block">
                            <a href="{{ $waHref }}" target="_blank" rel="noopener noreferrer"
                                class="btn btn-blue w-full !min-h-[52px] text-[13px]">
                                <svg class="h-5 w-5" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                    <path
                                        d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z" />
                                </svg>
                                Hubungi via WhatsApp
                            </a>
                            <p class="mt-3 text-center font-mono text-[8.5px] uppercase tracking-[0.12em] text-brand-muted">
                                Respon cepat dari admin kami
                            </p>
                        </div>

                        {{-- Spesifikasi --}}
                        <div class="mt-7">
                            <h2 class="hud text-brand-muted">Spesifikasi Kendaraan</h2>
                            <dl class="mt-3 grid grid-cols-2 border-l border-t border-brand-line">
                                <div class="border-b border-r border-brand-line p-3.5">
                                    <dt class="hud text-brand-muted">Merek</dt>
                                    <dd class="mt-1.5 text-sm font-semibold text-brand-ink">{{ $car->brand }}</dd>
                                </div>
                                <div class="border-b border-r border-brand-line p-3.5">
                                    <dt class="hud text-brand-muted">Model</dt>
                                    <dd class="mt-1.5 text-sm font-semibold text-brand-ink">{{ $car->model }}</dd>
                                </div>
                                <div class="border-b border-r border-brand-line p-3.5">
                                    <dt class="hud text-brand-muted">Tahun</dt>
                                    <dd class="mt-1.5 text-sm font-semibold tabular-nums text-brand-ink">{{ $car->year }}</dd>
                                </div>
                                <div class="border-b border-r border-brand-line p-3.5">
                                    <dt class="hud text-brand-muted">Warna</dt>
                                    <dd class="mt-1.5 text-sm font-semibold capitalize text-brand-ink">{{ $car->color }}</dd>
                                </div>
                            </dl>
                        </div>

                        {{-- Deskripsi --}}
                        <div class="mt-7">
                            <h2 class="hud text-brand-muted">Deskripsi</h2>
                            <p class="mt-3 whitespace-pre-line text-[13.5px] leading-relaxed text-brand-muted">
                                {{ $car->description ?? 'Tidak ada deskripsi tambahan. Hubungi kami untuk informasi lebih lanjut mengenai mobil ini.' }}
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Bar aksi tetap di HP: harga + WhatsApp selalu terjangkau --}}
    <div class="fixed inset-x-0 bottom-0 z-40 bg-brand-ink text-white lg:hidden"
        style="padding-bottom: env(safe-area-inset-bottom)">
        <div class="h-[2px] w-full bg-brand-blue-500" aria-hidden="true"></div>
        <div class="flex items-center gap-3 px-4 py-3">
            <div class="min-w-0">
                <p class="hud text-white/45">Harga</p>
                <p class="mt-1 truncate text-[15px] font-black tabular-nums leading-none tracking-[-0.02em] text-white">
                    {{ $price }}
                </p>
            </div>

            <a href="{{ $waHref }}" target="_blank" rel="noopener noreferrer"
                class="btn btn-blue ml-auto flex-1 !min-h-[48px] !max-w-[220px] !px-3 text-[10px] sm:text-[11px]">
                <svg class="h-[18px] w-[18px] shrink-0" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                    <path
                        d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z" />
                </svg>
                WhatsApp
            </a>
        </div>
    </div>

    {{-- Pratinjau foto --}}
    <div id="imageModal" role="dialog" aria-modal="true" aria-label="Pratinjau foto"
        class="fixed inset-0 z-50 hidden bg-brand-ink/95 opacity-0 transition-opacity duration-300"
        onclick="closeModal()">
        <button type="button"
            class="absolute right-4 top-4 z-10 inline-flex h-12 w-12 items-center justify-center rounded-full border border-white/20 text-white transition-colors hover:bg-white hover:text-brand-ink sm:right-8 sm:top-8"
            onclick="event.stopPropagation(); closeModal()" aria-label="Tutup pratinjau">
            <svg class="h-6 w-6" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"
                aria-hidden="true">
                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
            </svg>
        </button>

        <p
            class="absolute left-4 top-4 z-10 hidden items-center gap-2 border border-white/15 px-3 py-2 font-mono text-[8.5px] uppercase tracking-[0.14em] text-white/70 sm:left-8 sm:top-8 sm:inline-flex">
            <svg class="h-3.5 w-3.5" fill="none" stroke="currentColor" stroke-width="1.75"
                viewBox="0 0 24 24" aria-hidden="true">
                <path stroke-linecap="round" stroke-linejoin="round"
                    d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0zM10 7v3m0 0v3m0-3h3m-3 0H7" />
            </svg>
            Klik untuk menutup
        </p>

        <div class="flex h-full w-full items-center justify-center p-4 sm:p-8" onclick="event.stopPropagation()">
            <img id="modalImage" class="max-h-[85vh] max-w-full border border-white/15 shadow-2xl"
                src="" alt="Pratinjau foto mobil">
        </div>
    </div>

    <script>
        const modal = document.getElementById('imageModal');
        const modalImg = document.getElementById('modalImage');

        function openModal(src) {
            if (!modal || !modalImg) return;
            modalImg.src = src;
            modal.classList.remove('hidden');
            setTimeout(() => {
                modal.classList.remove('opacity-0');
            }, 10);
            document.body.style.overflow = 'hidden';
        }

        function closeModal() {
            if (!modal || !modalImg) return;
            modal.classList.add('opacity-0');
            setTimeout(() => {
                modal.classList.add('hidden');
                modalImg.src = '';
            }, 300);
            document.body.style.overflow = 'auto';
        }

        document.addEventListener('keydown', function(event) {
            if (event.key === 'Escape') {
                closeModal();
            }
        });

        let isExpanded = false;

        function toggleGallery() {
            const galleryItems = document.querySelectorAll('.gallery-item');
            const toggleText = document.getElementById('toggleText');
            const toggleIcon = document.getElementById('toggleIcon');

            isExpanded = !isExpanded;

            galleryItems.forEach((item, index) => {
                if (index >= 6) {
                    if (isExpanded) {
                        item.classList.remove('hidden');
                    } else {
                        item.classList.add('hidden');
                    }
                }
            });

            if (isExpanded) {
                toggleText.textContent = 'Tutup';
                toggleIcon.style.transform = 'rotate(180deg)';
            } else {
                toggleText.textContent = 'Lihat Semua';
                toggleIcon.style.transform = 'rotate(0deg)';
            }
        }
    </script>
</x-app-layout>
