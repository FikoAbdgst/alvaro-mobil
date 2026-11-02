@props(['name'])

@php
    $name = trim($name);
    $slug = strtolower($name);
    $logos = [
        'toyota' => [24, 24],
        'daihatsu' => [376, 58],
        'honda' => [24, 24],
        'suzuki' => [24, 24],
        'nissan' => [24, 24],
        'kia' => [24, 24],
        'mazda' => [24, 24],
        'datsun' => [758, 419],
    ];
    $hasLogo = isset($logos[$slug]);
    [$logoWidth, $logoHeight] = $logos[$slug] ?? [24, 24];
    $isWordmark = in_array($slug, ['daihatsu', 'datsun'], true);
    $logoClass = $isWordmark
        ? 'block h-4 w-auto max-w-[84px] object-contain object-left sm:h-5 sm:max-w-[104px]'
        : 'block h-6 w-6 object-contain sm:h-7 sm:w-7';
@endphp

@if ($hasLogo)
    <img src="{{ asset("images/brands/{$slug}.svg") }}" alt="{{ $name }}" width="{{ $logoWidth }}"
        height="{{ $logoHeight }}" {{ $attributes->merge(['class' => $logoClass]) }} loading="lazy"
        decoding="async">
@else
    <span
        {{ $attributes->merge(['class' => 'font-display text-[11px] font-black uppercase tracking-[0.06em] text-brand-ink']) }}>{{ $name }}</span>
@endif
