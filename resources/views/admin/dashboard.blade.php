@props(['users' ,'cellules', 'roles'])


<div class="rounded-t-lg max-w-[90vw] overflow-hidden flex-1 self-start ">
    <div class="flex items-start justify-start  overflow-y-auto overflow-x-hidden pr-3  max-w-full max-h-[80vh]">
        <table class="display table-fixed dataTables_wrapper" id="table">
            <x-caise.C.caise-thead>
                <x-caise.C.caise-th style="width: 20px;">ID</x-caise.C.caise-th>
                <x-caise.C.caise-th style="width: 30px;">Prenom</x-caise.C.caise-th>
                <x-caise.C.caise-th style="width: 40px;">Nom</x-caise.C.caise-th>
                <x-caise.C.caise-th style="width: 40px;">Role</x-caise.C.caise-th>
                <x-caise.C.caise-th style="width: 40px;">Cellule</x-caise.C.caise-th>
                <x-caise.C.caise-th position="right" style="width: 160px;">Email</x-caise.C.caise-th>
                <x-caise.C.caise-th position="right" style="width: 20px; ">Profile</x-caise.C.caise-th>
                <x-caise.C.caise-th position="right" style="width: 55px; ">Modifier</x-caise.C.caise-th>
            </x-caise.C.caise-thead>
            <x-caise.C.caise-tbody>
                @if(isset($users) && $users->count() !== 0)
                    @foreach ($users as $user)
                        @php
                            $openModalButton = 'openAdminButton'.$user->id+2;
                         @endphp
                        <tr>
                            <x-caise.C.caise-td class="dt-body-left" :bold="true">{{ $user->id }}</x-caise.C.caise-td>
                            <x-caise.C.caise-td class="dt-body-left" :bold="true">{{ $user->first_name }}</x-caise.C.caise-td>
                            <x-caise.C.caise-td class="dt-body-left" :bold="true">{{ $user->last_name }}</x-caise.C.caise-td>
                            <x-caise.C.caise-td class="dt-body-left">{{ $user->role->libelle }}</x-caise.C.caise-td>
                            <x-caise.C.caise-td class="dt-body-left">{{ $user->cellule->libelle }}</x-caise.C.caise-td>
                            <x-caise.C.caise-td class="dt-body-left">{{ $user->email }}</x-caise.C.caise-td>
                            <x-caise.C.caise-td class="dt-body-left" >
                                @if(isset($user->profile_photo_path))
                                    <div class="flex items-center justify-center gap-10">
                                        <a href="{{ asset($user->profile_photo_path) }}" class="text-black hover:bg-white h-12 w-12 font-bold flex items-center justify-center    rounded-md px-3 py-1.5 text-sm  leading-6  shadow-sm  hover:bg-blue-400/90 focus:outline-none" target="_blank">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-5">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 0 1 0-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178Z" />
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                                            </svg>
                                        </a>
                                    </div>
                                @endif
                            </x-caise.C.caise-td>
                            <x-caise.C.caise-td class="flex items-center justify-center gap-10">
                                <div class="hidden">
                                    <x-form id="delete"  action="{{ route('user.delete' , $user->id) }}" method="POST"/>
                                </div>
                                <x-adminUpdateUser :id="$user->id" :first_name="$user->first_name" :last_name="$user->last_name" :cellule_id="$user->cellule_id" :role_id="$user->role_id" :is_admin="$user->is_admin" :email="$user->email" :profile_photo_path="$user->profile_photo_path" :roles="$roles" :cellules="$cellules" >
                                    <x-slot:buttonName>
                                        <button id="{{$openModalButton}}" class="text-black hover:bg-white h-12 w-12 font-bold flex items-center justify-center    rounded-md px-3 py-1.5 text-sm  leading-6  shadow-sm  hover:bg-blue-400/90 focus:outline-none" >
                                            <i class='bx bx-message-square-add'></i>
                                        </button >
                                    </x-slot:buttonName>
                                </x-adminUpdateUser>
                                <button type="submit" form="delete" class="text-black hover:bg-white h-12 w-12 font-bold flex items-center justify-center    rounded-md px-3 py-1.5 text-sm  leading-6  shadow-sm  hover:bg-blue-400/90 focus:outline-none" >
                                    <i class='bx bxs-trash'></i>
                                </button>
                            </x-caise.C.caise-td>
                        </tr>
                    @endforeach
                @endif
            </x-caise.C.caise-tbody>
        </table>
    </div>
</div>
