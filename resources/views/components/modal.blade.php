@props([
    'openModalBtn'=> 'openModalBtn',
    'closeModalBtn'=> 'closeModalBtn',
    'authenticationModal'=> 'authenticationModal',
])

<!-- Button to toggle modal -->
    {{$buttonName}}

<!-- Main modal -->
<div id="{{$authenticationModal}}" class="hidden bg-gray-200/70 overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative p-4 w-full max-w-2xl max-h-full">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
            <!-- Modal header -->
            <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                <h3 class="text-xl font-semibold text-gray-900 dark:text-white text-center">
                    {{$title}}
                </h3>
                <button id="{{$closeModalBtn}}" class="text-gray-400 bg-transparent  hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>
            <!-- Modal body -->
            <div class="p-4 md:p-5">
                {{$slot}}
            </div>
        </div>
    </div>
</div>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        // Get elements
        const openModalBtn = document.getElementById('{{$openModalBtn}}');
        const closeModalBtn = document.getElementById('{{$closeModalBtn}}');
        const modal = document.getElementById('{{$authenticationModal}}');



        // Function to open the modal
        function openModal(modal) {
            modal.classList.remove('hidden');
            modal.classList.add('flex');
        }

        // Function to close the modal
        function closeModal(modal) {
            modal.classList.add('hidden');
            modal.classList.remove('flex');
        }

        // Event listeners
        openModalBtn.addEventListener('click', ()=> openModal(modal));
        closeModalBtn.addEventListener('click', ()=> closeModal(modal));

        // Optional: Close modal when clicking outside of it
        window.addEventListener('click', function (event) {
            if (event.target === modal) {
                closeModal(modal);
            }
        });
        // Function to handle toast dismissal
        function handleToastDismissal() {
            // Get all toast close buttons
            const closeButtons = document.querySelectorAll('[aria-label="Close"]');

            closeButtons.forEach(button => {
                button.addEventListener('click', function () {
                    // Find the parent toast and hide it
                    const toast = this.closest('[role="alert"]');
                    if (toast) {
                        toast.classList.add('hidden');
                    }
                });
            });
        }

        // Initialize toast dismissal handling
        handleToastDismissal();
    });
</script>
