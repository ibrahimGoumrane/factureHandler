<x-modal openModalBtn="openModalBtn1" closeModalBtn="closeModalBtn1" authenticationModal="authenticationModal1">
    <x-slot:buttonName>
        <button id="openModalBtn1" class="block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" type="button">
            Creer un nouveau Role
        </button>
    </x-slot:buttonName>
    <x-slot:title>
        Ici vous Pouvez Creer un nouveau Role
    </x-slot:title>
    <x-form action="{{ route('role.store') }}" method="POST" :files="true">
        <x-input name="libelle" type="text" :required="true" label="Libelle" autocomplete="Libelle"  />
        <x-buttonSubmit>
            Enregistrer
        </x-buttonSubmit>
    </x-form>
</x-modal>

