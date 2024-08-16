@props([
    'id',
    'first_name',
    'last_name',
    'cellule_id',
    'role_id',
    'is_admin',
    'email',
    'profile_photo_path',
    '$cellules',
    '$roles',
])

@php
    $openModalButton = 'openModalButton'.$id;
    $closeModalBtn = 'closeModalBtn'.$id;
    $authenticationModal = 'authenticationModal'.$id;
    $photoProfileName = basename($profile_photo_path);
@endphp

<x-modal :openModalBtn="$openModalButton" :closeModalBtn="$closeModalBtn" :authenticationModal="$authenticationModal">
    <x-slot:buttonName>
        {{ $buttonName }}
    </x-slot:buttonName>
    <x-slot:title>
        Ici vous Pouvez Modifier un utilisateur
    </x-slot:title>
    @auth
        <x-form action="{{ route('user.update', $id) }}" method="POST" :files="true">
            <x-input name="first_name" type="text" :required="true" label="First Name" autocomplete="first_name" :value="$first_name" />
            <x-input name="last_name" type="text" :required="true" label="Last Name" autocomplete="last_name" :value="$last_name" />
            <x-input name="email" type="email" :required="true" label="Email" autocomplete="email" :value="$email" />
            <x-select name="cellule_id" :options="$cellules" :required="true" label="Cellule" :value="$cellule_id" />
            <x-select name="role_id" :options="$roles" :required="true" label="Role" :value="$role_id" />
            <div class="mb-4">
                <label class="block text-sm font-medium leading-6 text-gray-900" id="containerPieceInv2">
                    Profile Photo
                </label>
                <div class="hidden" id="containerPiece2">
                    <x-input name="profile_photo_path" type="file" :required="false" label="Profile Photo" :value="$profile_photo_path" />
                </div>
                @if($profile_photo_path)
                    <p class="mt-2 text-sm text-gray-500 flex gap-10 items-center justify-center">
                        <span class="text-gray-600">{{$photoProfileName}}</span>
                        <a href="{{ asset($profile_photo_path) }}" target="_blank" class="text-slate-600 bg-gray-200 hover:bg-gray-100 p-2 rounded-full">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-5">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 0 1 0-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178Z" />
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                            </svg>
                        </a>
                        <span id="editFichier2" class="text-slate-600 bg-gray-200 hover:bg-gray-100 px-3 py-2 rounded-full cursor-pointer"><i class='bx bx-message-square-add'></i></span>
                    </p>
                @else
                    <p class="mt-2 text-sm text-gray-500">
                        <span class="text-red-500">pas de photo de profile</span>
                    </p>
                @endif
            </div>
            <x-buttonSubmit>
                Enregistrer
            </x-buttonSubmit>
        </x-form>
    @endauth
</x-modal>

<script>
    const editFichier2 = document.getElementById('editFichier2');
    const pieceJointe = document.getElementById('containerPiece2');
    const containerPieceInv = document.getElementById('containerPieceInv2');
    editFichier2.addEventListener('click', function() {
        console.log('clicked');
        containerPieceInv.classList.toggle('hidden');
        pieceJointe.classList.toggle('hidden');
    });
</script>
