@props(['type' => 'submit' , 'bgColor' => 'bg-blue-500/90' ,'color'=>'text-white' , 'hoverBgColor'=>'hover:bg-blue-400/90'])

@php
    $classes=" min-h-12 min-w-12 font-bold flex items-center justify-center  w-full  rounded-md
      px-3 py-1.5 text-sm  leading-6  shadow-sm
      hover:bg-blue-400/90 focus:outline-none ";
@endphp
<div>
    <button type="{{$type}}" class="{{$classes . $bgColor. ' ' . $color . ' ' . $hoverBgColor}}" >
        {{$slot}}
    </button>
</div>
