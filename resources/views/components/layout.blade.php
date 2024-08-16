<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-full bg-white">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Hanken+Grotesk:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    @vite('resources/css/app.css')
    @vite('resources/css/custom-datatable.css')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.min.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

    <!-- Custom DataTables CSS -->
    <title>Facture Handler</title>
</head>
<body class="text-slate-900/80 font-medium overflow-x-hidden">
@if ($message = Session::get('success'))
    <div id="toast-success" class="z-50 fixed bottom-0 right-0 flex items-center w-full max-w-xs p-4 mb-4 text-gray-500 bg-white rounded-lg shadow dark:text-gray-400 dark:bg-gray-800" role="alert">
        <div class="inline-flex items-center justify-center flex-shrink-0 w-8 h-8 text-green-500 bg-green-100 rounded-lg dark:bg-green-800 dark:text-green-200">
            <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 8.207-4 4a1 1 0 0 1-1.414 0l-2-2a1 1 0 0 1 1.414-1.414L9 10.586l3.293-3.293a1 1 0 0 1 1.414 1.414Z"/>
            </svg>
            <span class="sr-only">Check icon</span>
        </div>
        <div class="ms-3 text-sm font-normal">{{ $message }}.</div>
        <button type="button" class="ms-auto -mx-1.5 -my-1.5 bg-white text-gray-400 hover:text-gray-900 rounded-lg focus:ring-2 focus:ring-gray-300 p-1.5 hover:bg-gray-100 inline-flex items-center justify-center h-8 w-8 dark:text-gray-500 dark:hover:text-white dark:bg-gray-800 dark:hover:bg-gray-700" aria-label="Close">
            <span class="sr-only">Close</span>
            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
            </svg>
        </button>
    </div>
@endif

@if ($errors->any())
    @foreach ($errors->all() as $error)
        <div id="toast-danger" class="z-50 fixed bottom-0 right-0  flex items-center w-full max-w-xs p-4 mb-4 text-gray-500 bg-white rounded-lg shadow dark:text-gray-400 dark:bg-gray-800" role="alert">
            <div class="inline-flex items-center justify-center flex-shrink-0 w-8 h-8 text-red-500 bg-red-100 rounded-lg dark:bg-red-800 dark:text-red-200">
                <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                    <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 11.793a1 1 0 1 1-1.414 1.414L10 11.414l-2.293 2.293a1 1 0 0 1-1.414-1.414L8.586 10 6.293 7.707a1 1 0 0 1 1.414-1.414L10 8.586l2.293-2.293a1 1 0 0 1 1.414 1.414L11.414 10l2.293 2.293Z"/>
                </svg>
                <span class="sr-only">Error icon</span>
            </div>
            <div class="ms-3 text-sm font-normal">{{$error}}.</div>
            <button type="button" class="ms-auto -mx-1.5 -my-1.5 bg-white text-gray-400 hover:text-gray-900 rounded-lg focus:ring-2 focus:ring-gray-300 p-1.5 hover:bg-gray-100 inline-flex items-center justify-center h-8 w-8 dark:text-gray-500 dark:hover:text-white dark:bg-gray-800 dark:hover:bg-gray-700" aria-label="Close">
                <span class="sr-only">Close</span>
                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                </svg>
            </button>
        </div>
    @endforeach
@endif
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            setTimeout(function () {
                const successToast = document.getElementById('toast-success');
                if (successToast) {
                    successToast.classList.add('hidden');
                }

                const errorToasts = document.querySelectorAll('#toast-danger');
                errorToasts.forEach(function (toast) {
                    toast.classList.add('hidden');
                });
            }, 3000); // 5000 milliseconds = 5 seconds
        });
    </script>
    {{$slot}}
    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <!-- DataTables JS -->
    <script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>


    <script>
        $(document).ready(function() {
            jQuery.extend(jQuery.fn.dataTable.ext.type.order, {
                "date-dmy-pre": function (date) {
                    const dmy = date.split('/');
                    return (dmy[2] + dmy[1] + dmy[0]) * 1;
                },
                "date-dmy-asc": function (a, b) {
                    return a - b;
                },
                "date-dmy-desc": function (a, b) {
                    return b - a;
                }
            });

            $('#table').DataTable({
                "paging": true,
                "ordering": true,
                "info": true,
                "searching": true,
                "lengthChange": true,
                "pageLength": 5,
                "lengthMenu": [5, 10, 25, 50, 75, 100],
                "columnDefs": [
                    { "orderable": false, "targets": [ 0 , 2 , 5 , 6 ] }, // Disable sorting for these columns
                    { "searchable": false, "targets": [6 , 7] }, // Optional: Disable searching for these columns
                    { "type": "date-dmy", "targets": 1 }
                ],
                "createdRow": function(row, data, dataIndex) {
                    // Apply styling to odd and even columns
                    $(row).find('td').each(function(index) {
                        if (index % 2 === 0) {
                            // Apply styles to even columns
                            $(this).css({
                                'background-color': '#ffffff', /* White background */
                            });
                        } else {
                            // Apply styles to odd columns
                            $(this).css({
                                'background-color': '#ffffff', /* Light gray background */
                            });
                        }
                    });
                },
                "language": {
                    "lengthMenu": "<div class='text-slate-600 text-sm inline-flex items-center justify-center'>Afficher</div> _MENU_ ",
                    "zeroRecords": "<div class='text-xl  block text-center text-slate-900/80 font-medium'>Entrer un nouveau enregistrment</div>",
                    "info": "Page _PAGE_/_PAGES_",
                    "infoEmpty": "<div class='text-xl  block text-center text-slate-900/80 font-medium'>Aucun element disponible</div>",
                    "infoFiltered": "(filtré sur _MAX_ éléments)",
                    "search": "<div class=' font-bold text-3xl inline-flex items-center justify-center'><i class='bx bx-search-alt-2'></i></div>",
                    "paginate": {
                        "first": "Premier",
                        "last": "Dernier",
                        "next": "Suivant",
                        "previous": "Précédent"
                    }
                }
            });
        });

    </script>

</body>
</html>
