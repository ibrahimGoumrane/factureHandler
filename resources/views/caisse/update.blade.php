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
    $pieceJointeFileName = basename($pieceJointe);

@endphp

<x-modal :openModalBtn="$openModalButton" :closeModalBtn="$closeModalBtn" :authenticationModal="$authenticationModal">
    <x-slot:buttonName>
        {{ $buttonName }}
    </x-slot:buttonName>
    <x-slot:title>
        Ici vous Pouvez Modifier un enregistrement de caisse
    </x-slot:title>
    @auth
    <x-form action="{{ route('caisse.update', $id-3) }}" method="POST" :files="true">
        <x-input name="libelle" type="text" :required="true" label="Libelle" autocomplete="libelle" :value="$libelle"  />
        <x-input name="nature" type="text" :required="true" label="Nature" autocomplete="nature" :value="$nature"  />
        <div class="flex items-center justify-center gap-2">
            <x-input name="credit" type="number"  label="Credit" autocomplete="credit" :value="$credit" />
            <x-input name="debit" type="number"  label="Debit" autocomplete="debit" :value="$debit"  />
        </div>
        <x-input name="date" type="date" :required="true" label="Date" autocomplete="date" :value="$datePart"  />
        <x-input name="AcheterPar" type="text" :required="true" label="Acheter Par" autocomplete="AcheterPar"  :value="$AcheterPar" />
        <div class="mb-4">
                    <label class="block text-sm font-medium leading-6 text-gray-900" id="containerPieceInv">
                        Piece Jointe
                    </label>
                <div class="hidden" id="containerPiece">
                     <x-input  name="pieceJointe" type="file" :required="false" label="Piece Jointe" :value="$pieceJointe" />
                </div>
                @if($pieceJointe)
                    <p class="mt-2 text-sm text-gray-500 flex gap-10 items-center justify-center">
                        <span class="text-gray-600">{{$pieceJointeFileName}}</span>
                        <a href="{{ asset($pieceJointe) }}" target="_blank" class="text-slate-600 bg-gray-200 hover:bg-gray-100 p-2 rounded-full" > <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-5">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 0 1 0-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178Z" />
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                            </svg>
                        </a>
                        <span id="editFichier" class="text-slate-600 bg-gray-200 hover:bg-gray-100 px-3 py-2 rounded-full cursor-pointer"><i class='bx bx-message-square-add'></i></span>
                    </p>
                @else
                    <p class="mt-2 text-sm text-gray-500">
                        <span class="text-red-500">pas de piece jointe</span>
                        <span id="editFichier" class="text-slate-600 bg-gray-200 hover:bg-gray-100 px-3 py-2 rounded-full cursor-pointer"><i class='bx bx-message-square-add'></i></span>
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

    const editFichier = document.getElementById('editFichier');
    const pieceJointe = document.getElementById('containerPiece');
    const containerPieceInv = document.getElementById('containerPieceInv');
    editFichier.addEventListener('click', function() {
        console.log('clicked');
        containerPieceInv.classList.toggle('hidden');
        pieceJointe.classList.toggle('hidden');
    });

</script>
