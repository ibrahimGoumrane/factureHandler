<x-modal openModalBtn="openModalBtn2" closeModalBtn="closeModalBtn2" authenticationModal="authenticationModal2">
    <x-slot:buttonName>
        Creer un nouveau enregistrment
    </x-slot:buttonName>
    <x-slot:title>
        Ici vous Pouvez Creer un nouveau enregistrement de caisse
    </x-slot:title>
    <x-form action="{{ route('caisse.store') }}" method="POST" :files="true">
            <x-input name="libelle" type="text" :required="true" label="Libelle" autocomplete="libelle"  />
            <x-input name="montant" type="number" :required="true" label="Montant" autocomplete="montant"  />
            <x-input name="date" type="date" :required="true" label="Date" autocomplete="date"  />
            <x-input name="AcheterPar" type="text" :required="true" label="Acheter Par" autocomplete="AcheterPar"  />
            <x-input name="pieceJointe" type="file" :required="false" label="Piece Jointe" />
        <x-buttonSubmit>
            Enregistrer
        </x-buttonSubmit>
    </x-form>
</x-modal>

