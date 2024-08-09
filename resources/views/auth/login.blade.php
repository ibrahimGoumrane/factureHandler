<x-layoutForm>
    <x-slot:heading>
        Sign in to your Account
    </x-slot:heading>
    <x-form action="login" method="POST">
        <x-input name="email" type="email" required label="Email" autocomplete="email" />
        <x-input name="password" type="password" required label="Mote de passe"    />
        <x-buttonSubmit>
            Login in
        </x-buttonSubmit>
        <x-form-link :href="route('register')" label="Sign Up">
            Pas de compte?
        </x-form-link>
        <x-form-link :href="route('home')" label="Revenir a l'accueil">
        </x-form-link>
    </x-form>
</x-layoutForm>
