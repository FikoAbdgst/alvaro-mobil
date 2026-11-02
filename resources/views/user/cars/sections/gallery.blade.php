{{-- Testimoni pelanggan — arsip cerita, rel di HP, grid di desktop --}}
<section id="testimoni" class="section-pad scroll-mt-20 border-b border-brand-line bg-white lg:scroll-mt-24">
    <div x-data="{ paused: false }" data-reveal class="container-shell">

        <div class="flex items-end justify-between gap-4 border-b border-brand-line pb-5">
            <div>
                <h2
                    class="font-display text-[clamp(2rem,8vw,3.25rem)] font-black leading-[0.94] tracking-[-0.045em] text-brand-ink">
                    Cerita Pelanggan <span class="text-brand-blue-500">Kami</span>
                </h2>
                <p class="mt-2.5 max-w-[44ch] text-[13.5px] leading-relaxed text-brand-muted sm:text-[15px]">
                    Testimoni dari pelanggan yang telah mempercayakan mobil impian mereka kepada kami
                </p>
            </div>

            <div class="flex shrink-0 items-center gap-3">
                <p class="hud hidden pb-1 text-right text-brand-muted sm:block">
                    <span class="block text-[13px] tracking-[0.06em] text-brand-ink tabular-nums sm:text-[15px]">
                        {{ str_pad($galleries->count(), 2, '0', STR_PAD_LEFT) }}
                    </span>
                    Cerita
                </p>

                @if ($galleries->count() > 3)
                    <button type="button" @click="paused = !paused" :aria-pressed="paused.toString()"
                        :aria-label="paused ? 'Lanjutkan marquee testimoni' : 'Jeda marquee testimoni'"
                        class="inline-flex min-h-[44px] items-center border border-brand-line px-3 text-[12px] font-medium text-brand-ink transition-colors hover:border-brand-ink focus-visible:outline-brand-blue-500">
                        <span x-text="paused ? 'Putar' : 'Jeda'"></span>
                    </button>
                @endif
            </div>
        </div>

        @if ($galleries->isEmpty())
            <div class="mt-8 border border-brand-line bg-brand-paper p-6 sm:p-10">
                <svg class="h-10 w-10 text-brand-blue-500" viewBox="0 0 40 32" fill="none" aria-hidden="true">
                    <path
                        d="M16.4 0v12.2c0 11.1-5.9 17.9-16.4 19.8v-6.3c5.4-1.3 8.2-4.2 8.4-8.7H0V0h16.4zM40 0v12.2c0 11.1-5.9 17.9-16.4 19.8v-6.3c5.4-1.3 8.2-4.2 8.4-8.7H23.6V0H40z"
                        fill="currentColor" />
                </svg>

                <h3 class="mt-5 font-display text-2xl font-black tracking-[-0.03em] text-brand-ink sm:text-3xl">
                    Belum Ada Testimoni
                </h3>
                <p class="mt-2 max-w-md text-sm leading-relaxed text-brand-muted">
                    Testimoni pelanggan akan ditampilkan di sini.
                </p>

                <p class="hud mt-6 flex items-center gap-2 text-brand-muted">
                    <span class="h-px w-8 bg-brand-blue-500" aria-hidden="true"></span>
                    Arsip / Cerita
                </p>
            </div>
        @else
            @if ($galleries->count() > 3)
                <div class="testimonial-marquee no-scrollbar -mx-5 mt-6 overflow-hidden px-5 pb-2 sm:-mx-8 sm:px-8 md:mx-0 md:px-0 lg:mt-8"
                    role="region" aria-label="Testimoni pelanggan berjalan">
                    <div class="testimonial-marquee-track" :class="{ 'is-paused': paused }">
                        <div class="testimonial-marquee-group" role="list">
                            @foreach ($galleries as $gallery)
                                <x-testimonial-card :gallery="$gallery" />
                            @endforeach
                        </div>

                        <div class="testimonial-marquee-group" role="list" aria-hidden="true">
                            @foreach ($galleries as $gallery)
                                <x-testimonial-card :gallery="$gallery" />
                            @endforeach
                        </div>
                    </div>
                </div>
            @else
                <div
                    class="no-scrollbar -mx-5 mt-6 flex snap-x snap-mandatory gap-4 overflow-x-auto scroll-px-5 px-5 pb-2 sm:-mx-8 sm:px-8 md:mx-0 md:grid md:grid-cols-3 md:overflow-visible md:px-0 lg:mt-8 lg:gap-6">
                    @foreach ($galleries as $gallery)
                        <x-testimonial-card :gallery="$gallery" />
                    @endforeach
                </div>
            @endif
        @endif
    </div>
</section>
