<x-layoutForm>
    <x-slot:heading>
        Sign in to your Account
    </x-slot:heading>
    <x-form action="login" method="POST">
        <x-input name="email" type="email" required label="Email" autocomplete="email" placeholder="example.text.com" />
        <x-input name="password" type="password" required label="Password"  placeholder='***********'  />
        <x-buttonSubmit>
            Login in
        </x-buttonSubmit>
        <x-form-link :href="route('register')" label="Sign Up">
            Dont have an Account?
        </x-form-link>
        <x-form-link :href="route('home')" label="Go back to home">
        </x-form-link>
    </x-form>
</x-layoutForm>
