@props([
    'href' => '#',
    'active' => false ,
])
@php
    $classes = 'block px-4 py-2 text-sm text-gray-700 active:bg-blue-300';
    if ($active) {
        $classes .= ' bg-blue-100';
    } else {
        $classes .= '';
    }
@endphp

    <a href="{{ $href }}" class="{{ $classes }}" aria-current="{{ $active ? 'page' : 'false' }}" role="menuitem" tabindex="-1">
        {{ $slot }}
    </a>

