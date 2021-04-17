</div>
</section>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->

<!-- Control Sidebar -->
<aside class="control-sidebar control-sidebar-dark">
     <!-- Control sidebar content goes here -->
</aside>
<!-- /.control-sidebar -->

<!-- Main Footer -->
<footer class="main-footer">
     <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong>
     All rights reserved.
     <div class="float-right d-none d-sm-inline-block">
          <b>Version</b> 3.1.0
     </div>
</footer>
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->
<!-- jQuery -->
<script src="<?= base_url('') . 'assets/' ?>plugins/jquery/jquery.min.js"></script>
<!-- <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script> -->
<!-- Bootstrap -->
<script src="<?= base_url('') . 'assets/' ?>plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- overlayScrollbars -->
<script src="<?= base_url('') . 'assets/' ?>plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- bs-custom-file-input -->
<script src="<?= base_url('') . 'assets/' ?>plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>
<!-- AdminLTE App -->
<script src="<?= base_url('') . 'assets/' ?>dist/js/adminlte.js"></script>

<!-- PAGE PLUGINS -->
<!-- jQuery Mapael -->
<script src="<?= base_url('') . 'assets/' ?>plugins/jquery-mousewheel/jquery.mousewheel.js"></script>
<script src="<?= base_url('') . 'assets/' ?>plugins/raphael/raphael.min.js"></script>
<script src="<?= base_url('') . 'assets/' ?>plugins/jquery-mapael/jquery.mapael.min.js"></script>
<script src="<?= base_url('') . 'assets/' ?>plugins/jquery-mapael/maps/usa_states.min.js"></script>
<!-- ChartJS -->
<script src="<?= base_url('') . 'assets/' ?>plugins/chart.js/Chart.min.js"></script>

<!-- upload -->
<?php if ($this->uri->segment(1) == 'upload') { ?>
     <script src="<?= base_url('') . 'assets/' ?>plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>
     <script>
          $(function() {
               bsCustomFileInput.init();
          });
     </script>
<?php
} ?>
<!-- DataTables  & Plugins -->
<script src="<?= base_url('') . 'assets/' ?>plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?= base_url('') . 'assets/' ?>plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="<?= base_url('') . 'assets/' ?>plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="<?= base_url('') . 'assets/' ?>plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="<?= base_url('') . 'assets/' ?>plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="<?= base_url('') . 'assets/' ?>plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="<?= base_url('') . 'assets/' ?>plugins/jszip/jszip.min.js"></script>
<script src="<?= base_url('') . 'assets/' ?>plugins/pdfmake/pdfmake.min.js"></script>
<script src="<?= base_url('') . 'assets/' ?>plugins/pdfmake/vfs_fonts.js"></script>
<script src="<?= base_url('') . 'assets/' ?>plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="<?= base_url('') . 'assets/' ?>plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="<?= base_url('') . 'assets/' ?>plugins/datatables-buttons/js/buttons.colVis.min.js"></script>

<!-- InputMask -->
<script src="<?= base_url('') . 'assets/' ?>plugins/moment/moment.min.js"></script>
<script src="<?= base_url('') . 'assets/' ?>plugins/inputmask/jquery.inputmask.min.js"></script>
<!-- date-range-picker -->
<script src="<?= base_url('') . 'assets/' ?>plugins/daterangepicker/daterangepicker.js"></script>

<!-- sweet alert 2 -->
<script src="<?= base_url('') . 'assets/sweetalert/' ?>sweetalert2.all.min.js"></script>

<!-- AdminLTE for demo purposes -->
<script src="<?= base_url('') . 'assets/' ?>dist/js/demo.js"></script>
<script src="<?= base_url('') . 'assets/' ?>dist/js/myjs.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="<?= base_url('') . 'assets/' ?>dist/js/pages/dashboard2.js"></script>

<script>
     $(function() {
          $("#example11").DataTable({
               "responsive": true,
               "lengthChange": false,
               "autoWidth": false,
               // "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
               "buttons": ["excel", "colvis"]
          }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
          $('#example2').DataTable({
               "paging": true,
               "lengthChange": false,
               "searching": false,
               "ordering": true,
               "info": true,
               "autoWidth": false,
               "responsive": true,
          });
     });
</script>
<script>
     var table;
     $(document).ready(function() {
          table = $('#d-admin').DataTable({
               "autoWidth": true,
               "responsive": true,
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
                    title: 'Excel',
               }],
               "lengthMenu": [
                    [10, 25, 50, -1],
                    // [10, 25, 50, "All"]
                    [10, 25, 50, 100]
               ]
          });
     });
</script>
</body>

</html>