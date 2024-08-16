@props(['user'])

@if($user)
    <div class="cursor-pointer max-w-full flex items-start justify-start overflow-hidden drop-shadow-custom-blue h-[250px] " >
    <div class="items-center bg-gray-100/60  rounded-lg shadow flex justify-start dark:bg-gray-800 dark:border-gray-700 gap-10  ">
        <div class="rounded-full overflow-hidden my-5">
            <img class=" w-40 h-40 rounded-full  sm:rounded-none sm:rounded-l-lg" src="{{ asset($user->profile_photo_path) }}" alt="{{ $user->name }} Avatar">
        </div>

        <div class="p-2">
            <h3 class="text-xl font-bold tracking-tight text-gray-900 dark:text-white">
                <span >{{ $user->first_name }} </span>
                <span >{{ $user->last_name }} </span>
            </h3>
            <span class="text-blue-500 font-bold dark:text-gray-400">{{ $user->role->libelle }}</span>
            <p class="mt-3 mb-4  text-slate-500 font-semibold  dark:text-gray-400">{{ $user->email }}</p>
        </div>
    </div>
</div>
@endif
