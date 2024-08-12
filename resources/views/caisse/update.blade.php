@props([
    'id',
    'libelle',
    'montant',
    'date',
    'AcheterPar',
    'pieceJointe',
])

@php
    list($datePart, $timePart) = explode(' ', $date);
@endphp

<x-modal openModalBtn="openModalBtn3" closeModalBtn="closeModalBtn3" authenticationModal="authenticationModal3">
    <x-slot:buttonName>
        {{ $buttonName }}
    </x-slot:buttonName>
    <x-slot:title>
        Ici vous Pouvez Modifier un enregistrement de caisse
    </x-slot:title>
    @auth
    <x-form action="{{ route('caisse.update', $id) }}" method="POST" :files="true">
        <x-input name="libelle" type="text" :required="true" label="Libelle" autocomplete="libelle" value="{{ $libelle }}"/>
        <x-input name="montant" type="number" :required="true" label="Montant" autocomplete="montant" value="{{ $montant }}"/>
        <x-input name="date" type="date" :required="true" label="Date" autocomplete="date" value="{{ $datePart }}"/>
        <x-input name="AcheterPar" type="text" :required="true" label="Acheter Par" autocomplete="AcheterPar" value="{{ $AcheterPar }}"/>
        <x-input name="pieceJointe" type="file" :required="false" label="Piece Jointe"/>
        <x-buttonSubmit>
            Enregistrer
        </x-buttonSubmit>
    </x-form>
    @endauth

</x-modal>
