@props([
    'id',
    'libelle',
])
@php
    $openModalButton = 'openAdminRoleButton'.$id;
    $closeModalBtn = 'closeAdminRoleBtn'.$id;
    $authenticationModal = 'authenticationRoleAdmin'.$id;
@endphp

<x-modal :openModalBtn="$openModalButton" :closeModalBtn="$closeModalBtn" :authenticationModal="$authenticationModal">
    <x-slot:buttonName>
        {{ $buttonName }}
    </x-slot:buttonName>
    <x-slot:title>
        Ici vous Pouvez Modifier un Role
    </x-slot:title>
    @auth
        <x-form action="{{ route('role.update', $id-2) }}" method="POST" :files="true">
            <x-input name="libelle" type="text" :required="true" label="Libelle" autocomplete="Libelle" :value="$libelle" />
            <x-buttonSubmit>
                Enregistrer
            </x-buttonSubmit>
        </x-form>
    @endauth
</x-modal>
