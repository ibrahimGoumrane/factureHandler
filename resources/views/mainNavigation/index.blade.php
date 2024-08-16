<nav class="fixed py-3 w-screen z-50">
    <div class="mx-auto max-w-[90vw] px-2 sm:px-6  lg:py-2 bg-slate-100 drop-shadow-custom-blue  rounded-md ">
        <div class="relative flex h-16 items-center justify-between">
                <!-- Mobile menu button-->
            <div class="absolute inset-y-0 left-0 flex items-center sm:hidden">
                <button
                    type="button"
                    id="mobile-menu-button"
                    class="relative inline-flex items-center justify-center rounded-md p-2 text-gray-400  hover:text-white focus:outline-none focus:ring-2 focus:ring-inset focus:ring-white bg-transparent"
                    aria-controls="mobile-menu"
                    aria-expanded="false"
                >
                    <span class="absolute -inset-0.5"></span>
                    <span class="sr-only">Open main menu</span>
                    <!-- Icon when menu is closed -->
                    <svg id="menu-open-icon" class="block h-6 w-6 bg-transparent" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                    </svg>
                    <!-- Icon when menu is open -->
                    <svg id="menu-close-icon" class="hidden h-6 w-6 bg-transparent" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
            <div class="flex flex-1 items-center justify-center sm:items-stretch sm:justify-start">
                <div class="flex flex-shrink-0 items-center mr-10">
                    <img class="h-24  w-auto  " src="{{ asset('images/logo-mail.png') }}" alt="Numerique Way" >
                </div>
                <div class="hidden sm:ml-6 sm:flex items-center justify-center ">
                    <div class="flex space-x-4 items-center justify-center">
                        <x-navigationMain.link :active="request()->routeIs('home')" :href="route('home')">Dashboard</x-navigationMain.link>
                        <x-navigationMain.link :active="request()->routeIs('team')" :href="route('team')">Equipe</x-navigationMain.link>
                        <x-navigationMain.link :active="request()->routeIs('caisse.index')" :href="route('caisse.index')">Caisse</x-navigationMain.link>
                    </div>
                </div>
            </div>
            <div class="absolute inset-y-0 right-0 flex items-center pr-2 sm:static sm:inset-auto sm:ml-6 sm:pr-0">
                <!-- Profile dropdown -->
                <div class="relative ml-3">
                    @auth
                        <x-navigationMain.profile.profile/>
                    @endauth
                    @guest
                        <x-navigationMain.link :href="route('login')">Login</x-navigationMain.link>
                        <x-navigationMain.link :href="route('register')">Register</x-navigationMain.link>
                    @endguest
                </div>
            </div>
        </div>
    </div>
    <div class="sm:hidden" id="mobile-menu" hidden>
        <div class="space-y-1 px-2 pb-3 pt-2 max-w-[90vw] mx-auto">
            <x-navigationMain.link :phone="true" :active="request()->is('/home')" :href="route('home')">Dashboard</x-navigationMain.link>
            <x-navigationMain.link :phone="true" :active="request()->is('/team')" :href="route('team')">Equipe</x-navigationMain.link>
        </div>
    </div>
</nav>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const menuButton = document.getElementById('mobile-menu-button');
        const mobileMenu = document.getElementById('mobile-menu');
        const menuOpenIcon = document.getElementById('menu-open-icon');
        const menuCloseIcon = document.getElementById('menu-close-icon');
        menuButton.addEventListener('click', function() {
            const isExpanded = menuButton.getAttribute('aria-expanded') === 'true';
            // Toggle the menu visibility
            if (isExpanded) {
                mobileMenu.hidden = true;
                menuButton.setAttribute('aria-expanded', 'false');
                menuOpenIcon.classList.remove('hidden');
                menuCloseIcon.classList.add('hidden');
            } else {
                mobileMenu.hidden = false;
                menuButton.setAttribute('aria-expanded', 'true');
                menuOpenIcon.classList.add('hidden');
                menuCloseIcon.classList.remove('hidden');
            }
        });

        // Optional: Close menu when clicking outside
        document.addEventListener('click', function(event) {
            if (!menuButton.contains(event.target) && !mobileMenu.contains(event.target)) {
                mobileMenu.hidden = true;
                menuButton.setAttribute('aria-expanded', 'false');
                menuOpenIcon.classList.remove('hidden');
                menuCloseIcon.classList.add('hidden');
            }
        });
    });
</script>

