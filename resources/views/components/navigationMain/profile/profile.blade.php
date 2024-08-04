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
        class="absolute right-0 z-10 mt-2 w-48 origin-top-right rounded-md bg-white  shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none transition ease-out duration-100 opacity-0 scale-95 invisible"
        role="menu"
        aria-orientation="vertical"
        aria-labelledby="user-menu-button"
        tabindex="-1"
    >
        <x-navigationMain.menu-item :active="request()->is('/profile') ? 'active' : ''">Profile</x-navigationMain.menu-item>
        <x-navigationMain.menu-item :active="request()->is('/settings') ? 'active' : ''">Settings</x-navigationMain.menu-item>
        <x-navigationMain.menu-item >Sign out</x-navigationMain.menu-item>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const button = document.getElementById('user-menu-button');
        const menu = document.getElementById('user-menu');
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
    });
</script>

