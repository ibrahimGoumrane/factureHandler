<x-layoutForm>
    <x-slot:heading>
        Create a new Account
    </x-slot:heading>
    <x-form action="register" method="POST" >
        <x-input name="first_name" type="text" :required="true" label="First Name" autocomplete="first_name"  placeholder='John'/>
        <x-input name="last_name" type="text" :required="true" label="Last Name" autocomplete="last_name" placeholder='Doe' />
        <x-input name="email" type="email" :required="true" label="Email" autocomplete="email"  placeholder='test@gmail.com' />
        <x-input name="password" type="password" :required="true" label="Password"  placeholder='***********' />
        <x-input name='password_confirmation' placeholder=''  :required="true" label="Confirm Password"  type="password" placeholder='***********' />
        <x-buttonSubmit>
            Sign Up
        </x-buttonSubmit>
        <x-form-link :href="route('login')" label="Login">
            Already have an account?
        </x-form-link>
        <x-form-link :href="route('home')" label="Go back to home">
        </x-form-link>
    </x-form>
</x-layoutForm>
