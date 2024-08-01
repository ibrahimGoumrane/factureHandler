<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-full bg-white">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Hanken+Grotesk:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    @vite('resources/css/app.css')
    <title>Facture Handler</title>
</head>
    <body class="h-full font-hanken-grotesk ">
        <div class="flex min-h-full flex-col justify-start px-6 lg:px-8">
            <div class="sm:mx-auto sm:w-full sm:max-w-sm h-[20vh] flex flex-col  justify-start ">
                <img class="mx-auto h-20 w-auto pt-8  " src="{{ asset('images/logo-mail.png') }}" alt="Numerique Way" >
                <h2 class=" text-center text-2xl font-bold leading-9 tracking-tight text-gray-900 mt-auto">{{$heading}}</h2>
            </div>
        {{ $slot }}
        </div>
    </body>
</html>
