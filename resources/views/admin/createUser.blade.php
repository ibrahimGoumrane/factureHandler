@props([
    'cellules',
    'roles',
])
<x-modal openModalBtn="openModalBtn1" closeModalBtn="closeModalBtn1" authenticationModal="authenticationModal1">
<x-slot:buttonName>
    <button id="openModalBtn1" class="block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" type="button">
        Creer un nouveau utilisateur
    </button>
</x-slot:buttonName>
<x-slot:title>
    Ici vous Pouvez Creer un nouveau utilisateur
</x-slot:title>
<x-form action="{{ route('user.store') }}" method="POST" :files="true">
    <x-input name="first_name" type="text" :required="true" label="First Name" autocomplete="first_name"  />
    <x-input name="last_name" type="text" :required="true" label="Last Name" autocomplete="last_name"  />
    <x-input name="email" type="email" :required="true" label="Email" autocomplete="email"  />
    <x-select name="cellule_id" :options="$cellules" :required="true" label="Cellule"  />
    <x-select name="role_id" :options="$roles" :required="true" label="Role" />
    <x-input name="password" type="password" :required="true" label="Mots de Passe"   />
    <x-input name='password_confirmation' placeholder=''  :required="true" label="Confirmer Mots de Passe"  type="password" />
    <x-input name="profile_photo_path" type="file" :required="false" label="Profile Photo"  />
    <x-buttonSubmit>
        Enregistrer
    </x-buttonSubmit>
</x-form>
</x-modal>

