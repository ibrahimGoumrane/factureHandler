<x-modal openModalBtn="openModalBtn1" closeModalBtn="closeModalBtn1" authenticationModal="authenticationModal1">
    <x-slot:buttonName>
        <button id="openModalBtn1" class="block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" type="button">
            Filtrer par mois et annee
        </button>
    </x-slot:buttonName>
    <x-slot:title>
        Choissisez Mois et Annee
    </x-slot:title>

    <x-form id="form" action="{{ route('caisse.index') }}" method="get">
        <x-inputDate  />
        <x-buttonSubmit>
            Appliquer Le Filtre
        </x-buttonSubmit>
    </x-form>
</x-modal>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const form = document.getElementById('form');
        form.addEventListener('submit', function(event) {
            event.preventDefault();
            const month = document.getElementById('monthInput').value;
            const year = document.getElementById('yearInput').value;
            window.location.href = `/caisse/${year}/${month}`;
        });
    });
</script>
