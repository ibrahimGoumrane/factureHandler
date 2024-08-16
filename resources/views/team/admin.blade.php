@props(['user'])

@if($user)
    <div class="cursor-pointer flex-1 w-full h-full flex items-center justify-center my-10 drop-shadow-custom-blue " >
        <div class="items-center flex bg-gray-50 flex-col rounded-lg shadow sm:flex dark:bg-gray-800 dark:border-gray-700 min-h-[30vh] justify-start min-w-[20vw]">
            <div class="rounded-full overflow-hidden my-5">
                <img class="w-44 h-44 rounded-lg sm:rounded-none sm:rounded-l-lg" src="{{ asset($user->profile_photo_path) }}" alt="{{ $user->name }} Avatar">
            </div>
            <div class="p-5 mt-auto">
                <h3 class="text-xl font-bold tracking-tight text-gray-900 dark:text-white">
                    <span >{{ $user->first_name }} </span>
                    <span >{{ $user->last_name }} </span>
                </h3>
                <span class="text-blue-500 font-bold dark:text-gray-400">{{ $user->role->libelle }}</span>
                <p class="mt-3 mb-4 text-slate-500 font-semibold dark:text-gray-400">{{ $user->email }}</p>
            </div>
        </div>
    </div>
@endif
