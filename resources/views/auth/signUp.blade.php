<x-layoutForm>
    <x-slot:heading>
        Create a new Account
    </x-slot:heading>
    <x-form action="register" method="POST" >
        <x-input name="first_name" type="text" :required="true" label="Prenom" autocomplete="first_name"  />
        <x-input name="last_name" type="text" :required="true" label="Nom" autocomplete="last_name"  />
        <x-input name="email" type="email" :required="true" label="Email" autocomplete="email"  />
        <x-input name="password" type="password" :required="true" label="Mots de Passe"   />
        <x-input name='password_confirmation' placeholder=''  :required="true" label="Confirmer Mots de Passe"  type="password" />
        <x-buttonSubmit>
            Sign Up
        </x-buttonSubmit>
        <x-form-link :href="route('login')" label="Login">
            Deja enregistre?
        </x-form-link>
        <x-form-link :href="route('home')" label="Revenir a l'accueil">
        </x-form-link>
    </x-form>
</x-layoutForm>
