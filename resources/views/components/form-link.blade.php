@props([
    'href' => '#',
    'label' => 'no data',
])
<p class="text-center text-sm text-gray-900">
    {{$slot}}
    <a href="{{$href}}" class="pl-2 font-semibold leading-6 text-blue-500 hover:text-blue-400">{{$label}}</a>
</p>
