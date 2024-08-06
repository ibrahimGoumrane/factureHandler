

@props(['position' => 'center'])

@php
    $styles = [
        'left' => 'border-r-2 ',
        'right' => 'border-l-2 ',
        'center' => 'border-x-2 ',
    ];
    $chosenOne = $styles[$position];
    $chosenOne = $chosenOne ."whitespace-nowrap  px-4  font-bold text-md bg-blue-500 py-4 text-white border-x-2  border-white overflow-hidden";
@endphp


<th {{$attributes->merge([
    'class' => $chosenOne])}}>{{$slot}}</th>
