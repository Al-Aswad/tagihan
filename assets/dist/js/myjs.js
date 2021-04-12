var table;
$(document).ready(function() {
    table = $('#example1').DataTable({
        //Set column definition initialisation properties.
        "columnDefs": [{
            "targets": [0], //first column / numbering column
            "orderable": false, //set not orderable
        }, ],


        dom: 'lBfrtip',
        buttons: [{
                extend: 'excelHtml5',
                title: 'data_export_penggajian',
            },
            {
                extend: 'pdfHtml5',
                title: 'penggajian',
            },
        ],
        "lengthMenu": [
            [10, 25, 50, -1],
            // [10, 25, 50, "All"]
            [10, 25, 50, 100]
        ]
    });
});
var table;
$(document).ready(function() {
    table = $('#table-belum-setor-th').DataTable({
        //Set column definition initialisation properties.
        "columnDefs": [{
            "targets": [0], //first column / numbering column
            "orderable": false, //set not orderable
        }, ],


        dom: 'lBfrtip',
        buttons: [{
                extend: 'excelHtml5',
                title: 'data_export_penggajian',
            },
            {
                extend: 'pdfHtml5',
                title: 'penggajian',
            },
        ],
        "lengthMenu": [
            [10, 25, 50, -1],
            // [10, 25, 50, "All"]
            [10, 25, 50, 100]
        ]
    });
});
var table;
$(document).ready(function() {
    table = $('#table-belum-setor').DataTable({
        //Set column definition initialisation properties.
        "columnDefs": [{
            "targets": [0], //first column / numbering column
            "orderable": false, //set not orderable
        }, ],


        dom: 'lBfrtip',
        buttons: [{
                extend: 'excelHtml5',
                title: 'data_export_penggajian',
            },
            {
                extend: 'pdfHtml5',
                title: 'penggajian',
            },
        ],
        "lengthMenu": [
            [10, 25, 50, -1],
            // [10, 25, 50, "All"]
            [10, 25, 50, 100]
        ]
    });
});

var table;
$(document).ready(function() {
    table = $('#dashboard_admin').DataTable({

        "processing": true, //Feature control the processing indicator.
        "serverSide": true, //Feature control DataTables' server-side processing mode.
        "order": [], //Initial no order.

        // Load data for the table's content from an Ajax source
        "ajax": {
            "url": "<?= base_url() . 'adminController/ajax_admin_th' ?>",
            "type": "POST"
        },

        //Set column definition initialisation properties.
        "columnDefs": [{
            "targets": [0], //first column / numbering column
            "orderable": false, //set not orderable
        }, ],


        dom: 'lBfrtip',
        buttons: [{
                extend: 'excelHtml5',
                title: 'data_export_penggajian',
            },
            {
                extend: 'pdfHtml5',
                title: 'penggajian',
            },
        ],
        "lengthMenu": [
            [10, 25, 50, -1],
            // [10, 25, 50, "All"]
            [10, 25, 50, 100]
        ]
    });
});