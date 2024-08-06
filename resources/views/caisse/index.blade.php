@php
    use Carbon\Carbon;

    $date = Carbon::now()->format('l, F j, Y');
@endphp

<x-layout>
    <x-mainNav />
    <main class="pt-20 w-screen h-screen ">
        <div class="mx-auto  max-w-[90vw] flex items-start justify-start flex-col overflow-hidden sm:px-6 lg:px-8">
            <div class="w-full flex items-center justify-between mt-10">
                <div class="block text-xl  font-medium leading-6 text-blue-500 capitalize">Today is :<span class="font-bold text-slate-900 pl-2  uppercase">{{$date}} </span> </div>
                <div class="block text-xl  font-medium leading-6 text-blue-500 capitalize">Welcome back : <span class="font-bold text-slate-900 pl-2  uppercase">Jihane </span> </div>
            </div>
            <main class="max-w-[95vw]  overflow-hidden ">
            <x-caise.dashboard :caisses="$caisses" />
            </main>
        </div>
    </main>
</x-layout>
