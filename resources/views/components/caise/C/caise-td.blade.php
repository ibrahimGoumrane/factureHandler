@props(['bold' => false])


@php
    $chosenOne='';
        if($bold === true){
            $chosenOne = ' bg-gray-500 text-gray-500';
        }
 @endphp

<td {{ $attributes->merge(['class' => ' text-md  font-medium text-center  border-2  px-4 py-2 text-black text-left overflow-container overflow-auto w-20'.$chosenOne , 'style' => 'width: 200px;  ']) }}>
    {{ $slot }}
</td>
