@props(['name', 'options', 'required', 'label', 'value'])
@php
    $classes = "block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 border-2 border-transparent  sm:text-sm sm:leading-6";
@endphp


@if(isset($options))
    <label for="{{$name}}" class="block text-sm font-medium leading-6 text-gray-900">
        {{$label}}
    </label>
    <select name="{{$name}}" >
        @foreach($options as $option)
            <option value="{{ $option->id }}" {{ $value == $option->id ? 'selected' : '' }} class="{{$classes}}">{{ $option->libelle }}</option>
        @endforeach
    </select>
@endif
