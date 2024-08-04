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
    $classes = "block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-blue-500 sm:text-sm sm:leading-6";
 @endphp

@if($required === true )
    <div>
        <label for="{{$name}}" class="block text-sm font-medium leading-6 text-gray-900">{{$label}}</label>
        <div class="mt-2">
            <input id="{{$name}}" name="{{$name}}" type="{{$type}}" autocomplete="{{$autocomplete}}" required class="{{$classes}}" placeholder="{{$placeholder}}" >
        </div>
        <x-form-error name='{{$name}}'/>
    </div>
@else
    <div>
        <label for="email" class="block text-sm font-medium leading-6 text-gray-900">{{$label}}</label>
        <div class="mt-2">
            <input id="{{$name}}" name="{{$name}}" type="{{$type}}" autocomplete="{{$autocomplete}}" class="{{$classes}}" placeholder="{{$placeholder}}">
        </div>
        <x-form-error name='{{$name}}'/>
    </div>
@endif

