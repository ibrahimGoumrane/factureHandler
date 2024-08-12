
<div class="flex flex-col items-center justify-center">
    <div class="mb-5">
        <span class=" hidden">
            <input id="monthInput" value="" name="month" >
            <input id="yearInput" value="" name="year" >
        </span>
        <span class="flex items-center justify-center gap-5">
        Preview :
            <span id="monthPreview"></span>
            <span id="yearPreview"></span>
        </span>
    </div>
    <div class="flex items-center text-blue justify-between gap-6 bg-blue-600 text-white px-10 py-2 rounded-md">
        <button id="goPrevious" class="min-w-4 min-h-4 rounded-md p-1">&lt;</button>
        <button id="currentYear" class="min-w-4 min-h-4 rounded-md p-1"></button>
        <button id="goAfter" class="min-w-4 min-h-4 rounded-md p-1">&gt;</button>
    </div>
    <div class="grid-cols-4 grid-rows-3  gap-2 hidden  pt-2 rounded-b-md" id="month"></div>

</div>
<script>
    const goPrevious = document.getElementById('goPrevious');
    const currentYear = document.getElementById('currentYear');
    const goAfter = document.getElementById('goAfter');
    const month = document.getElementById('month');
    const monthPreview = document.getElementById('monthPreview');
    const monthInput = document.getElementById('monthInput');
    const yearPreview = document.getElementById('yearPreview');
    const yearInput = document.getElementById('yearInput');


    // Populate month grid with three-letter abbreviations
    const monthNames = ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"];


    // Initialize
    const date = new Date();
    const Year = date.getFullYear();
    const monthIndex = date.getMonth();
    currentYear.innerHTML = Year.toString();


    //setting up preview
    monthPreview.innerHTML = monthNames[monthIndex];
    yearPreview.innerHTML = Year.toString();
    //setting up inputs
    monthInput.value =monthIndex;
    yearInput.value = Year.toString();

    // Event listener for goPrevious
    goPrevious.addEventListener('click', function(event) {
        event.preventDefault();
        const current = +currentYear.innerHTML;
        currentYear.innerHTML = current - 1;
        yearPreview.innerHTML = currentYear.innerHTML;
        yearInput.value = currentYear.innerHTML;

    });

    // Event listener for currentYear
    currentYear.addEventListener('click', function(event) {
        event.preventDefault();
        month.classList.toggle('hidden');
        month.classList.toggle('grid');

    });

    // Event listener for goAfter
    goAfter.addEventListener('click', function(event) {
        event.preventDefault();
        const current = +currentYear.innerHTML;
        currentYear.innerHTML = current + 1;
        yearPreview.innerHTML = currentYear.innerHTML;
        yearInput.value = currentYear.innerHTML;

    });


    monthNames.forEach((monthName , index) => {
        month.innerHTML += `<div class="p-0.5 bg-blue-500 text-white flex items-center justify-center rounded-md h-12 w-12 focus:bg-slate-900 cursor-pointer hover:bg-blue-400" id="month-${index}">${monthName}</div>`;
    });
    month.addEventListener('click', function(event) {
        event.preventDefault();
        const target = event.target;
        if (target.id.includes('month-')) {
            const monthIndex = target.id.split('-')[1];
            monthPreview.innerHTML = monthNames[monthIndex];
            monthInput.value = monthIndex;
            month.classList.toggle('hidden');
            month.classList.toggle('grid');
        }
    });
</script>
