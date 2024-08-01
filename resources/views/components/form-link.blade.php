@props([
    'href' => '#',
    'label' => 'no data',
])
@php
$href = '/facturehandler/public/'. $href;
@endphp
<p class="mt-10 text-center text-sm text-gray-500">
    {{$slot}}
    <a href="{{$href}}" class="font-semibold leading-6 text-blue-500/90 hover:text-blue-500/90">{{$label}}</a>
</p>
