<x-modal openModalBtn="openModalBtn1" closeModalBtn="closeModalBtn1" authenticationModal="authenticationModal1">
    <x-slot:buttonName>
        Filtrer par mois et annee
    </x-slot:buttonName>
    <x-slot:title>
        Choissisez Mois et Annee
    </x-slot:title>
    <x-form action="{{ route('caisse.store') }}" method="POST" :files="true">
        <x-inputDate />
        <x-buttonSubmit>
            Appliquer Le Filtre
        </x-buttonSubmit>
    </x-form>
</x-modal>
