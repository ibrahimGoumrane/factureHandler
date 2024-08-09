<div class="flex flex-col items-center justify-center ">
    <div class="flex items-center text-blue justify-center gap-6 bg-blue-600 text-white p-2 rounded-t-md">
        <button id="goPrevious" class="min-w-4 min-h-4 rounded-md p-1"><</button>
        <button id="currentYear" class="min-w-4 min-h-4 rounded-md p-1"></button>
        <button id="goAfter" class="min-w-4 min-h-4 rounded-md p-1">></button>
    </div>
    <div class=" grid-cols-4 grid-rows-3 gap-1.5 w-full hidden bg-blue-600 pt-2 rounded-b-md" id="month">

    </div>
</div>
<script>
    const goPrevious = document.getElementById('goPrevious');
    const currentYear = document.getElementById('currentYear');
    const goAfter = document.getElementById('goAfter');
    const month = document.getElementById('month');

    // Initialize current year
    const date = new Date();
    const Year = date.getFullYear();
    currentYear.innerHTML = Year.toString();

    // Event listener for goPrevious
    goPrevious.addEventListener('click', function() {
        const current = +currentYear.innerHTML;
        currentYear.innerHTML = current - 1;
    });
    currentYear.addEventListener('click', function() {
        month.classList.toggle('hidden');
        month.classList.toggle('grid');
    });
    // Event listener for goAfter
    goAfter.addEventListener('click', function() {
        const current = +currentYear.innerHTML;
        currentYear.innerHTML = current + 1;
    });

    // Populate month grid
    for (let i = 0; i < 12; i++) {
        month.innerHTML += '<div class="p-0.5 bg-blue-500 text-white flex items-center justify-center rounded-md">' + (i + 1) + '</div>';
    }
</script>
