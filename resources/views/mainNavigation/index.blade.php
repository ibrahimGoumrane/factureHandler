<nav class="bg-blue-300/90 py-3">
    <div class="mx-auto max-w-[90vw] px-2 sm:px-6 lg:px-8">
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
                    <img class="h-8 w-auto  " src="{{ asset('images/logo-mail.png') }}" alt="Numerique Way" >
                </div>
                <div class="hidden sm:ml-6 sm:block">
                    <div class="flex space-x-4">
                        <x-navigationMain.link :active="true" >Dashboard</x-navigationMain.link>
                        <x-navigationMain.link >Team</x-navigationMain.link>
                        <x-navigationMain.link >Calendar</x-navigationMain.link>
                    </div>
                </div>
            </div>
            <div class="absolute inset-y-0 right-0 flex items-center pr-2 sm:static sm:inset-auto sm:ml-6 sm:pr-0">
                <!-- Profile dropdown -->
                <div class="relative ml-3">
                    <div class="relative">
                        <button
                            type="button"
                            class="relative flex rounded-full text-sm focus:outline-none  focus:ring-white  focus:ring-offset-0"
                            id="user-menu-button"
                            aria-expanded="false"
                            aria-haspopup="true"
                        >
                            <span class="absolute -inset-1.5"></span>
                            <span class="sr-only">Open user menu</span>
                            <img class="h-12 w-12 rounded-full" src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80" alt="">
                        </button>

                        <div
                            id="user-menu"
                            class="absolute right-0 z-10 mt-2 w-48 origin-top-right rounded-md bg-white py-1 shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none transition ease-out duration-100 opacity-0 scale-95 invisible"
                            role="menu"
                            aria-orientation="vertical"
                            aria-labelledby="user-menu-button"
                            tabindex="-1"
                        >
                            <x-navigationMain.menu-item>Profile</x-navigationMain.menu-item>
                            <x-navigationMain.menu-item>Settings</x-navigationMain.menu-item>
                            <x-navigationMain.menu-item>Sign out</x-navigationMain.menu-item>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <div class="sm:hidden" id="mobile-menu" hidden>
        <div class="space-y-1 px-2 pb-3 pt-2">
            <x-navigationMain.link :phone="true">Dashboard</x-navigationMain.link>
            <x-navigationMain.link :phone="true">Team</x-navigationMain.link>
            <x-navigationMain.link :phone="true">Calendar</x-navigationMain.link>
        </div>
    </div>
</nav>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const button = document.getElementById('user-menu-button');
        const menu = document.getElementById('user-menu');
        const menuButton = document.getElementById('mobile-menu-button');
        const mobileMenu = document.getElementById('mobile-menu');
        const menuOpenIcon = document.getElementById('menu-open-icon');
        const menuCloseIcon = document.getElementById('menu-close-icon');
        button.addEventListener('click', function() {
            const isExpanded = button.getAttribute('aria-expanded') === 'true';

            // Toggle visibility
            if (isExpanded) {
                menu.classList.add('invisible', 'opacity-0', 'scale-95');
                menu.classList.remove('visible', 'opacity-100', 'scale-100');
                button.setAttribute('aria-expanded', 'false');
            } else {
                menu.classList.remove('invisible', 'opacity-0', 'scale-95');
                menu.classList.add('visible', 'opacity-100', 'scale-100');
                button.setAttribute('aria-expanded', 'true');
            }
        });

        // Close the menu if clicked outside
        document.addEventListener('click', function(event) {
            if (!button.contains(event.target) && !menu.contains(event.target)) {
                menu.classList.add('invisible', 'opacity-0', 'scale-95');
                menu.classList.remove('visible', 'opacity-100', 'scale-100');
                button.setAttribute('aria-expanded', 'false');
            }
        });
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

