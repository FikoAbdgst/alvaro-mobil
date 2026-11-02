<figure
    class="testimonial-card group shrink-0 snap-start border border-brand-line bg-white md:w-auto md:max-w-none"
    role="listitem">
    <div class="relative aspect-[4/5] overflow-hidden bg-brand-paper">
        @if (Storage::disk('public')->exists($gallery->image_path))
            <img src="{{ asset('storage/' . $gallery->image_path) }}"
                alt="{{ $gallery->caption ?? 'Testimoni pelanggan PT Alvaro Mobil' }}" width="800" height="1000"
                loading="lazy" decoding="async"
                class="h-full w-full object-cover transition-transform duration-700 ease-out group-hover:scale-[1.03]">
        @else
            <div class="flex h-full items-end border-b border-brand-line p-4 sm:p-5">
                <p class="hud text-brand-muted">Foto pelanggan belum tersedia</p>
            </div>
        @endif
    </div>

    @if ($gallery->caption)
        <figcaption class="border-t border-brand-line p-4">
            <svg class="h-3.5 w-3.5 text-brand-blue-500" viewBox="0 0 40 32" fill="none" aria-hidden="true">
                <path
                    d="M16.4 0v12.2c0 11.1-5.9 17.9-16.4 19.8v-6.3c5.4-1.3 8.2-4.2 8.4-8.7H0V0h16.4zM40 0v12.2c0 11.1-5.9 17.9-16.4 19.8v-6.3c5.4-1.3 8.2-4.2 8.4-8.7H23.6V0H40z"
                    fill="currentColor" />
            </svg>
            <p class="mt-2.5 text-[13px] leading-relaxed text-brand-ink/80">
                {{ $gallery->caption }}
            </p>
        </figcaption>
    @endif
</figure>
