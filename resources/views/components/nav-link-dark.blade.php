@props(['active'])
@php
    $classes =
        $active ?? false
            ? 'px-4 py-2 text-sm font-medium text-white bg-white/10 rounded-lg shadow-sm ring-1 ring-white/5 transition-all'
            : 'px-4 py-2 text-sm font-medium text-gray-400 hover:text-white hover:bg-white/5 rounded-lg transition-all';
@endphp
<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
