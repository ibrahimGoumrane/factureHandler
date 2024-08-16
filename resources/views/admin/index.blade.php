@php
    use Carbon\Carbon;

    Carbon::setLocale('fr_MA');
    $date = Carbon::now()->translatedFormat('l j F Y');
    $hourAndMinutes = Carbon::now()->addHour()->translatedFormat('H:i');

@endphp
<x-layout>
    <div class="mx-auto  flex items-start justify-start flex-col overflow-hidden sm:px-6 lg:px-8 pt-10">
        <div class="flex items-center justify-center flex-col gap-2">
            <h1 class="text-slate-900/80 text-opacity-95 font-bold text-3xl text-center flex items-center justify-between flex-col w-full ">
                        <span class="self-end">
                            <span class="w-full flex  ">
                                <span class=" text-xl  leading-6 text-blue-500 "><span class="text-slate-900/80 font-medium pl-2 text-2xl  drop-shadow-2x">{{$date}}  {{$hourAndMinutes}}</span> </span>
                            </span>
                        </span>
                <span class="self-start">
                        Bienvenue dans votre espace de gestion Admin
                </span>
            </h1>
            <main>
                <div class="flex">
                    <ul class="flex-column space-y space-y-4 text-sm font-medium text-gray-500 dark:text-gray-400 md:me-4 mb-4 md:mb-0">
                        <li>
                            <a href="{{ route('admin') }}" class="inline-flex items-center px-4 py-3 rounded-lg w-full dark:bg-blue-600 {{ request()->is('admin') ? 'text-white bg-blue-700' : 'hover:text-gray-900 bg-gray-50 hover:bg-gray-100 dark:bg-gray-800 dark:hover:bg-gray-700 dark:hover:text-white' }}">
                                <svg class="w-4 h-4 me-2 {{ request()->is('admin') ? 'text-white' : 'text-gray-500 dark:text-gray-400' }}" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M10 0a10 10 0 1 0 10 10A10.011 10.011 0 0 0 10 0Zm0 5a3 3 0 1 1 0 6 3 3 0 0 1 0-6Zm0 13a8.949 8.949 0 0 1-4.951-1.488A3.987 3.987 0 0 1 9 13h2a3.987 3.987 0 0 1 3.951 3.512A8.949 8.949 0 0 1 10 18Z"/>
                                </svg>
                                Users
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('admin.cellule') }}" class="inline-flex items-center px-4 py-3 rounded-lg w-full dark:bg-blue-600 {{ request()->is('admin/cellule') ? 'text-white bg-blue-700' : 'hover:text-gray-900 bg-gray-50 hover:bg-gray-100 dark:bg-gray-800 dark:hover:bg-gray-700 dark:hover:text-white' }}">
                                <svg class="w-4 h-4 me-2 {{ request()->is('admin/cellule') ? 'text-white' : 'text-gray-500 dark:text-gray-400' }}" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 18 18">
                                    <path d="M6.143 0H1.857A1.857 1.857 0 0 0 0 1.857v4.286C0 7.169.831 8 1.857 8h4.286A1.857 1.857 0 0 0 8 6.143V1.857A1.857 1.857 0 0 0 6.143 0Zm10 0h-4.286A1.857 1.857 0 0 0 10 1.857v4.286C10 7.169 10.831 8 11.857 8h4.286A1.857 1.857 0 0 0 18 6.143V1.857A1.857 1.857 0 0 0 16.143 0Zm-10 10H1.857A1.857 1.857 0 0 0 0 11.857v4.286C0 17.169.831 18 1.857 18h4.286A1.857 1.857 0 0 0 8 16.143v-4.286A1.857 1.857 0 0 0 6.143 10Zm10 0h-4.286A1.857 1.857 0 0 0 10 11.857v4.286c0 1.026.831 1.857 1.857 1.857h4.286A1.857 1.857 0 0 0 18 16.143v-4.286A1.857 1.857 0 0 0 16.143 10Z"/>
                                </svg>
                                Cellules
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('admin.role') }}" class="inline-flex items-center px-4 py-3 rounded-lg w-full dark:bg-blue-600 {{ request()->is('admin/role') ? 'text-white bg-blue-700' : 'hover:text-gray-900 bg-gray-50 hover:bg-gray-100 dark:bg-gray-800 dark:hover:bg-gray-700 dark:hover:text-white' }}">
                                <svg class="w-4 h-4 me-2 {{ request()->is('admin/role') ? 'text-white' : 'text-gray-500 dark:text-gray-400' }}" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M18 7.5h-.423l-.452-1.09.3-.3a1.5 1.5 0 0 0 0-2.121L16.01 2.575a1.5 1.5 0 0 0-2.121 0l-.3.3-1.089-.452V2A1.5 1.5 0 0 0 11 .5H9A1.5 1.5 0 0 0 7.5 2v.423l-1.09.452-.3-.3a1.5 1.5 0 0 0-2.121 0L2.576 3.99a1.5 1.5 0 0 0 0 2.121l.3.3L2.423 7.5H2A1.5 1.5 0 0 0 .5 9v2A1.5 1.5 0 0 0 2 12.5h.423l.452 1.09-.3.3a1.5 1.5 0 0 0 0 2.121l1.415 1.413a1.5 1.5 0 0 0 2.121 0l.3-.3 1.09.452V18A1.5 1.5 0 0 0 9 19.5h2a1.5 1.5 0 0 0 1.5-1.5v-.423l1.09-.452.3.3a1.5 1.5 0 0 0 2.121 0l1.415-1.414a1.5 1.5 0 0 0 0-2.121l-.3-.3.452-1.09H18a1.5 1.5 0 0 0 1.5-1.5V9A1.5 1.5 0 0 0 18 7.5Zm-8 6a3.5 3.5 0 1 1 0-7 3.5 3.5 0 0 1 0 7Z"/>
                                </svg>
                                Roles
                            </a>
                        </li>
                    </ul>
                    <div>
                        @if(request()->is('admin'))
                            <x-adminDashboard :users="$users" :cellules="$cellules" :roles="$roles" />
                        @elseif(request()->is('admin/cellule'))
                            <x-adminDashboardCellule :cellules="$cellules" />
                        @elseif(request()->is('admin/role'))
                            <x-adminDashboardRole :roles="$roles" />
                        @endif
                    </div>
                </div>
            </main>
        </div>
    </div>
</x-layout>


<script>
    document.querySelectorAll('[aria-tabs]').forEach(tab => {
        tab.addEventListener('click', function() {
            document.querySelectorAll('[aria-tabs]').forEach(t => t.classList.remove('active', 'text-white', 'bg-blue-700', 'dark:bg-blue-600'));
            this.classList.add('active', 'text-white', 'bg-blue-700', 'dark:bg-blue-600');
            const tabId = this.getAttribute('aria-tabs');
            document.querySelectorAll('[aria-content]').forEach(content => {
                content.classList.add('hidden');
                if (content.getAttribute('aria-content') === tabId) {
                    content.classList.remove('hidden');
                }
            });
        });
    });
</script>
