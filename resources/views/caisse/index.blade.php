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
                    Bienvenue dans votre espace de gestion de caisse
                    </span>
                </h1>
                <p class="text-slate-900/80 text-opacity-95 font-medium text-md text-center">
                    Sur cette page, vous pouvez gérer efficacement toutes les opérations de votre caisse. Suivez vos entrées et sorties de fonds, consultez l'historique des transactions, et assurez une tenue de caisse précise et organisée. Que vous soyez en train de faire un dépôt, un retrait, ou simplement de consulter les soldes, cette interface intuitive est conçue pour vous offrir un contrôle total et une vue d'ensemble claire de votre caisse.
                </p>

            <main class="max-w-[95vw]   overflow-hidden ">
                <div class="flex items-center justify-between gap-x-2 mb-4">
                    <x-caisse-filter />
                    <x-caisse-create />

                </div>
            <x-caise.dashboard :caisses="$caisses" />
            </main>
        </div>
    </main>
</x-layout>
