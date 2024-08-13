<x-modal openModalBtn="openModalBtn4" closeModalBtn="closeModalBtn4" authenticationModal="authenticationModal4">
    <x-slot:buttonName>
        <button id="openModalBtn4" class="block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" type="button">
            Afficher le resume du mois
        </button>
    </x-slot:buttonName>
    <x-slot:title>
        Ici vous pouvez voir le total des enregistrements de caisse du mois
    </x-slot:title>
    <div class="flex w-full items-end justify-center">
        <div class="flex-1">
            <label for="year" class="block text-sm font-medium text-gray-700">Select Year</label>
            <select id="yearSelector" name="year" >
            </select>
        </div>
        <x-buttonSubmit id="filtrer" >
            Appliquer Le Filtre
        </x-buttonSubmit>
    </div>
    <table class="table-auto w-full mt-4">
        <thead>
        <tr class="bg-gray-200 text-gray-700 text-md font-light italic ">
            <th class="px-4 py-2 text-left">Month/Year</th>
            <th class="px-4 py-2 text-left">Debit</th>
            <th class="px-4 py-2 text-left">Credit</th>
            <th class="px-4 py-2 text-left">Total (Debit - Credit)</th>
        </tr>
        </thead>
        <tbody id="tbody">
        </tbody>
        <tfoot id="tfoot" class="hidden">
        <tr class="bg-blue-200 font-bold text-gray-900">
            <td class="border px-4 py-2 text-right">Total for <span id="selectedYear"></span>:</td>
            <td class="border px-4 py-2 text-right" id="footerTotal" colspan="3">DH</td>
        </tr>
        </tfoot>
    </table>
</x-modal>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const yearSelector = document.getElementById('yearSelector');
        const filtrer = document.getElementById('filtrer');
        const tbody = document.getElementById('tbody');
        const tfoot = document.getElementById('tfoot');
        const footerTotal = document.getElementById('footerTotal');
        const selectedYear = document.getElementById('selectedYear');
        const currentYear = new Date().getFullYear();

        // Populate year options from current year - 10 to current year + 10
        for (let i = currentYear - 10; i <= currentYear + 10; i++) {
            const option = document.createElement('option');
            option.value = i;
            option.textContent = i;
            yearSelector.appendChild(option);
        }

        // Fetch data based on selected year
        const fetchData = async () => {
            if (!yearSelector.value) {
                console.log('Please select a year');
                return;
            }
            try {
                const response = await fetch(`/years/${yearSelector.value}`);
                const data = await response.json();
                // Update the footer with the yearly total
                tfoot.classList.remove('hidden');
                // Check if the response contains the expected data
                if (!data.monthlyTotals || !data.selectedYear) {
                    console.error('Invalid response data');
                    return;
                }

                const monthlyTotals = data.monthlyTotals;
                const year = data.selectedYear;

                selectedYear.innerHTML = year;
                // Calculate the yearly total
                let yearlyTotal = 0;

                // Generate table rows from monthlyTotals object
                const returnedMarkups = Object.entries(monthlyTotals).map(([month, totals], index) => {
                    const debit = totals.debit || 0;
                    const credit = totals.credit || 0;
                    const total = debit - credit;

                    // Add to yearly total
                    yearlyTotal += total;

                    // Determine row color based on the total value
                    const rowClass = total >= 0 ? 'bg-green-100' : 'bg-red-100';

                    return `
                        <tr class="${rowClass}">
                            <td class="border px-4 py-2 text-right">${month} / ${year}</td>
                            <td class="border px-4 py-2 text-right">${debit.toFixed(2)} €</td>
                            <td class="border px-4 py-2 text-right">${credit.toFixed(2)} €</td>
                            <td class="border px-4 py-2 font-bold text-right">${total.toFixed(2)} DH</td>
                        </tr>
                    `;
                }).join('');

                tbody.innerHTML = returnedMarkups;
                footerTotal.innerHTML = `${yearlyTotal.toFixed(2)} DH`;

            } catch (error) {
                console.error('Error fetching data:', error);
            }
        };

        // Fetch data when the filter button is clicked
        filtrer.addEventListener('click', fetchData);
    });
</script>
