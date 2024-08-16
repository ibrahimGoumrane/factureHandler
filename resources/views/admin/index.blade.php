@php
    use Carbon\Carbon;

    Carbon::setLocale('fr_MA');
    $date = Carbon::now()->translatedFormat('l j F Y');
    $hourAndMinutes = Carbon::now()->addHour()->translatedFormat('H:i');

@endphp

<x-layout>
    <x-mainNav />
    <main class="pt-20 w-screen h-screen ">
        <div class="mx-auto  max-w-[90vw] flex items-start justify-start flex-col overflow-hidden sm:px-6 lg:px-8   pt-10">
            <div class="flex items-center justify-center flex-col gap-2">
                <h1 class="text-slate-900/80 text-opacity-95 font-bold text-3xl text-center flex items-center justify-between flex-col w-full ">
                    <span class="self-end">
                        <span class="w-full flex  ">
                            <span class=" text-xl  leading-6 text-blue-500 "><span class="text-slate-900/80 font-medium pl-2 text-2xl  drop-shadow-2x">{{$date}}  {{$hourAndMinutes}}</span> </span>
                        </span>
                    </span>
                    <span class="self-start">
                    Bienvenue dans votre espace de gestion de utilisateur
                    </span>
                </h1>

                <main class="max-w-[95vw]   overflow-hidden ">
                    <x-adminDashboard :users="$users" />
                </main>
            </div>
    </main>
</x-layout>
