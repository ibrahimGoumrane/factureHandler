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
    <!-- Custom DataTables CSS -->
    <title>Facture Handler</title>
</head>
<body class="overflow-hidden">
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
                    { "orderable": false, "targets": [ 2, 4] }, // Disable sorting for these columns
                    { "searchable": false, "targets": [0 , 4] }, // Optional: Disable searching for these columns
                    { "type": "date-dmy", "targets": 1 }
                ],
                "createdRow": function(row, data, dataIndex) {
                    // Apply styling to odd and even columns
                    $(row).find('td').each(function(index) {
                        if (index % 2 === 0) {
                            // Apply styles to even columns
                            $(this).css({
                                'background-color': '#ffffff', /* White background */
                                'color': '#000' /* Black text color */
                            });
                        } else {
                            // Apply styles to odd columns
                            $(this).css({
                                'background-color': '#bae6fd', /* Light gray background */
                                'color': 'black' /* Dark text color */
                            });
                        }
                    });
                },
                "language": {
                    "lengthMenu": "Afficher _MENU_ ",
                    "zeroRecords": "Aucun élément trouvé",
                    "info": "Page _PAGE_ sur _PAGES_",
                    "infoEmpty": "Aucun élément disponible",
                    "infoFiltered": "(filtré sur _MAX_ éléments)",
                    "search": "Rechercher :",
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
