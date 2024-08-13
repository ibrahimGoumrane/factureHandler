<x-modal openModalBtn="openModalBtn2" closeModalBtn="closeModalBtn2" authenticationModal="authenticationModal2">
    <x-slot:buttonName>
        <button id="openModalBtn2" class="block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" type="button">
        Creer un nouveau enregistrment
        </button>
    </x-slot:buttonName>
    <x-slot:title>
        Ici vous Pouvez Creer un nouveau enregistrement de caisse
    </x-slot:title>
    <x-form action="{{ route('caisse.store') }}" method="POST" :files="true">
            <x-input name="libelle" type="text" :required="true" label="Libelle" autocomplete="libelle"  />
            <x-input name="nature" type="text" :required="true" label="Nature" autocomplete="nature"  />
        <div class="flex items-center justify-center gap-2">
            <x-input name="credit" type="number" :required="true" label="Credit" autocomplete="credit"  />
            <x-input name="debit" type="number" :required="true" label="Debit" autocomplete="debit"   />
        </div>
            <x-input name="date" type="date" :required="true" label="Date" autocomplete="date"  />
            <x-input name="AcheterPar" type="text" :required="true" label="Acheter Par" autocomplete="AcheterPar"  />
            <x-input name="pieceJointe" type="file" :required="false" label="Piece Jointe" />
        <x-buttonSubmit>
            Enregistrer
        </x-buttonSubmit>
    </x-form>
</x-modal>

