@props(['class' => ''])

<thead {{$attributes->merge(['$class' => 'rounded-t-3xl   font-medium text-sm capitalize'])}}>
{{$slot}}
<thead>
