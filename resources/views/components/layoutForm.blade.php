<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" >
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Hanken+Grotesk:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    @vite('resources/css/app.css')
    <title>Facture Handler</title>
</head>
    <body class="h-full font-hanken-grotesk bg-slate-900 overflow-hidden">
        <div class="flex min-h-screen flex-col justify-center ">
            <div class="bg-white w-1/3 mx-auto p-5 rounded-xl">
                <div class="sm:mx-auto sm:w-full sm:max-w-sm h-[20vh] flex flex-col  justify-start ">
                    <img class="mx-auto h-40 w-auto pt-8 " src="{{ asset('images/logo-mail.png') }}" alt="Numerique Way" >
                    <h2 class=" text-center text-2xl font-bold leading-9 tracking-tight  mt-auto">{{$heading}}</h2>
                </div>
                {{ $slot }}
            </div>
        </div>
    </body>
</html>
