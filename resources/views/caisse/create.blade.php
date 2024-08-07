<x-layoutForm>
    <x-slot:heading>
        Creer un nouveau enregistrment
    </x-slot:heading>
    <x-form action="{{ route('caisse.store') }}" method="POST" :files="true">
            <x-input name="libelle" type="text" :required="true" label="Libelle" autocomplete="libelle"  placeholder='Entrer le libelle'/>
            <x-input name="montant" type="number" :required="true" label="Montant" autocomplete="montant"  placeholder='Entrer le montant'/>
            <x-input name="date" type="date" :required="true" label="Date" autocomplete="date"  placeholder='Entrer la date'/>
            <x-input name="AcheterPar" type="text" :required="true" label="Acheter Par" autocomplete="AcheterPar"  placeholder="Entrer le nom de l'acheteur"/>
            <x-input name="pieceJointe" type="file" :required="false" label="Piece Jointe"   placeholder='Entrer la piece jointe'/>
        <x-buttonSubmit>
            Enregistrer
        </x-buttonSubmit>
        <x-form-link :href="route('caisse.index')" label="revenir a la caisse">
        </x-form-link>
    </x-form>
</x-layoutForm>

