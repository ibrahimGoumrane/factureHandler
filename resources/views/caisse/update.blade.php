@props([
    'id',
    'libelle',
    'nature',
    'debit',
    'credit',
    'date',
    'AcheterPar',
    'pieceJointe',
])

@php
    list($datePart, $timePart) = explode(' ', $date);
    $openModalButton = 'openModalButton'.$id;
    $closeModalBtn = 'closeModalBtn'.$id;
    $authenticationModal = 'authenticationModal'.$id;
@endphp

<x-modal :openModalBtn="$openModalButton" :closeModalBtn="$closeModalBtn" :authenticationModal="$authenticationModal">
    <x-slot:buttonName>
        {{ $buttonName }}
    </x-slot:buttonName>
    <x-slot:title>
        Ici vous Pouvez Modifier un enregistrement de caisse
    </x-slot:title>
    @auth
    <x-form action="{{ route('caisse.update', $id) }}" method="POST" :files="true">
        <x-input name="libelle" type="text" :required="true" label="Libelle" autocomplete="libelle" :value="$libelle"  />
        <x-input name="nature" type="text" :required="true" label="Nature" autocomplete="nature" :value="$nature"  />
        <div class="flex items-center justify-center gap-2">
            <x-input name="credit" type="number" :required="true" label="Credit" autocomplete="credit" :value="$credit" />
            <x-input name="debit" type="number" :required="true" label="Debit" autocomplete="debit" :value="$debit"  />
        </div>
        <x-input name="date" type="date" :required="true" label="Date" autocomplete="date" :value="$datePart"  />
        <x-input name="AcheterPar" type="text" :required="true" label="Acheter Par" autocomplete="AcheterPar"  :value="$AcheterPar" />
        <div class="mb-4">
            <x-input name="pieceJointe" type="file" :required="false" label="Piece Jointe" :value="$pieceJointe" />
            @if($pieceJointe)
                <p class="mt-2 text-sm text-gray-500">
                    <a href="{{ asset($pieceJointe) }}" target="_blank" class="text-blue-600">Voir le fichier actuel</a>
                </p>
            @endif
        </div>
        <x-buttonSubmit>
            Enregistrer
        </x-buttonSubmit>
    </x-form>
    @endauth

</x-modal>
