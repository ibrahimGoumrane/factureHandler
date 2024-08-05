@props(['bold' => false])


@php
    $chosenOne='';
        if($bold === true){
            $chosenOne = 'font-bold text-md';
        }else{
            $chosenOne = 'font-medium text-md';
        }
 @endphp

<td {{ $attributes->merge(['class' => 'whitespace-nowrap border-2 border-blue-900/50 px-4 py-2 text-slate-900 text-left  '.$chosenOne , 'style' => 'width: 200px; height: 50px; ']) }}>
    {{ $slot }}
</td>
