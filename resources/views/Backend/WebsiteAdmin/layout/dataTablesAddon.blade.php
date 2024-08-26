<script src="{{ asset('assets/admin/assets/js/datatables.min.js') }}"></script>
<script>
    $('.data-selligion').DataTable({
        // dom: 'Bfrtip',
        buttons: [
            'colvis',
            'excel',
            'csv',
            'copy',
            'print'
        ],
        fixedHeader: true,
        colReorder: true,
        "bFilter": true,
        "sDom": 'fBtlpi',
        'pagingType': 'numbers',
        "ordering": true,
        "language": {
            search: ' ',
            sLengthMenu: '_MENU_',
            searchPlaceholder: "Search...",
            info: "_START_ - _END_ of _TOTAL_ items",
        },
        initComplete: (settings, json) => {
            $('.dataTables_filter').appendTo('#tableSearch');
            $('.dataTables_filter').appendTo('.search-input');
        },
    });

    //Alert Box When Deleting
    var deleteForms = document.getElementsByClassName('submitdeleteForm');

    // Loop through all elements with the class name 'submitdeleteForm'
    for (var i = 0; i < deleteForms.length; i++) {
        deleteForms[i].addEventListener('click', function(e) {
            e.preventDefault();

            var isConfirmed = window.confirm('Are you sure you want to delete the tax?');

            if (isConfirmed) {
                document.getElementById('deleteForm').submit();
            }
        });
    }
</script>
