@props(['action' => '#', 'method' => 'POST', 'files' => false ])
@php
    $method = strtoupper($method);

@endphp
<div class="sm:mx-auto sm:w-full sm:max-w-sm">
<form {{$attributes->merge([
    'class' => 'w-full max-w-xl mx-auto space-y-6',
    'enctype' => $files ? 'multipart/form-data' : null
])}} action="{{$action}}" method="{{$method}}">
    @csrf
    @unless(in_array($method, ['GET', 'POST']))
        @method($method)
    @endunless
    {{ $slot }}
</form>
</div>
