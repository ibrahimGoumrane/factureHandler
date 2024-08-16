<x-layout>
    <x-mainNav />
    <main class="min-w-[100vw] min-h-[100vh] flex items-center justify-center overflow-hidden">
        <div class="absolute inset-0 ">
            <img class="w-screen h-screen opacity-60" src="https://admin.netlawman.com/uploads/article/original/types-uk-company.jpg" alt="hero">
        </div>
        <x-heroNotLoggedIn />
{{--        <x-team-index :adminUsers="$adminUsers" :nebulaUsers="$nebulaUsers" :novaUsers="$novaUsers" :neutronUsers="$neutronUsers" />--}}
    </main>
</x-layout>
