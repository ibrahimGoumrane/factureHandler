@props([
        'label' => null,
        'name',
        'type' => 'text',
        'value' => old($name),
        'autocomplete'=> 'off',
        'required' => false,
        'placeholder' => ''
    ])
@php
    $classes = "block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 border-2 border-transparent  sm:text-sm sm:leading-6";
 @endphp

@if($required === true )
    <div class="">
        <label for="{{$name}}" class="block text-sm font-medium leading-6 text-gray-900">{{$label}}</label>
        <div class="mt-2">
            @if($type === 'file')
                <input required id="{{$name}}"  name="{{$name}}" value="{{$value}}" type="{{$type}}"  class="  block w-full text-sm text-gray-900  border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none border  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" >
            @else
            <input id="{{$name}}" name="{{$name}}" value="{{$value}}" type="{{$type}}" autocomplete="{{$autocomplete}}" required class="{{$classes}}" placeholder="{{$placeholder}}" >
            @endif
        </div>
        <x-form-error name='{{$name}}'/>
    </div>
@else
    <div>
        <label for="email" class="block text-sm font-medium leading-6 text-gray-900">{{$label}}</label>
        <div class="mt-2">
            @if($type === 'file')
                <input id="{{$name}}"  name="{{$name}}" value="{{$value}}" type="{{$type}}"   class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400">
            @else
            <input id="{{$name}}" value="{{$value}}" name="{{$name}}" type="{{$type}}" autocomplete="{{$autocomplete}}" class="{{$classes}}" placeholder="{{$placeholder}}">
            @endif
        </div>
        <x-form-error name='{{$name}}'/>
    </div>
@endif

