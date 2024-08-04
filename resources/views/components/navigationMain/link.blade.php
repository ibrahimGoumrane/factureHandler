@props([
    'href' => '#',
    'active' => false ,
    'phone' => false,
])
@php
    $classes = '';
    if ( $phone ) {
    $classes = 'block rounded-md px-3 py-2 text-base font-medium text-slate-900';
    }else{
    $classes = 'rounded-md px-3 py-2 text-sm font-medium text-slate-900';
    }
    if ($active) {
        $classes .= ' bg-blue-600';
    } else {
        $classes .= ' hover:bg-blue-500 hover:text-white';
    }
@endphp

<a href="{{ $href }}" class="{{ $classes }}" aria-current="{{ $active ? 'page' : 'false' }}">
    {{ $slot }}
</a>
