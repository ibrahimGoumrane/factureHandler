@props([
    'id',
    'libelle',
])
@php
    $openModalButton = 'openAdminCelluleButton'.$id;
    $closeModalBtn = 'closeAdminCelluleBtn'.$id;
    $authenticationModal = 'authenticationCelluleAdmin'.$id;
@endphp

<x-modal :openModalBtn="$openModalButton" :closeModalBtn="$closeModalBtn" :authenticationModal="$authenticationModal">
    <x-slot:buttonName>
        {{ $buttonName }}
    </x-slot:buttonName>
    <x-slot:title>
        Ici vous Pouvez Modifier une Cellule
    </x-slot:title>
    @auth
        <x-form action="{{ route('cellule.update', $id) }}" method="POST" :files="true">
            <x-input name="libelle" type="text" :required="true" label="Libelle" autocomplete="Libelle" :value="$libelle" />
            <x-buttonSubmit>
                Enregistrer
            </x-buttonSubmit>
        </x-form>
    @endauth
</x-modal>
