@props(['bold' => false])


@php
    $chosenOne='';
        if($bold === true){
            $chosenOne = 'font-bold text-md';
        }else{
            $chosenOne = 'font-medium text-md';
        }
 @endphp

<td {{ $attributes->merge(['class' => ' text-center border-2  px-4 py-2 text-black text-left overflow-container overflow-auto w-20'.$chosenOne , 'style' => 'width: 200px; min-height: 50px; ']) }}>
    {{ $slot }}
</td>
