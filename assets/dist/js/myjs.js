var table;
$(document).ready(function() {
    table = $('#example1').DataTable({
        "autoWidth": true,
        "responsive": true,
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
        "autoWidth": true,
        "responsive": true,
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

const swal = $('.swal').data('swal');
if (swal) {
    Swal.fire({
        title: 'Berhasil',
        text: swal,
        icon: 'success'
            // footer: '<a href>Why do I have this issue?</a>'
    })
}


const setor = document.querySelector('#btn-setor');
setor.addEventListener('click', function(e) {
    // matikan fungsi defalut
    e.preventDefault();
    const form = document.querySelector('#btn-setor');
    Swal.fire({
        title: 'Yakin ?',
        text: "Akan menyetor awb yang telah dipilih!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, Yakin Banget!'
    }).then((result) => {
        if (result.isConfirmed) {
            document.querySelector("#form-setor").submit();
            // $("#form-setor").submit(); // Submit form
        }
    })
})


// alert setor bukti storan
$('.btn-admin-setor').on('click', function(e) {
    // matikan fungsi defalut
    e.preventDefault();
})