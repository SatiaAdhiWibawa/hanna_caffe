 <!-- /.content-wrapper -->
 <footer class="main-footer">
     <strong>Copyright &copy; 2023 <a>Hanna Caffe</a>.</strong>
     All rights reserved.
     <div class="float-right d-none d-sm-inline-block">
         <b>Version</b> 3.1.0-rc
     </div>
 </footer>

 <!-- Control Sidebar -->
 <aside class="control-sidebar control-sidebar-dark">
     <!-- Control sidebar content goes here -->
 </aside>
 <!-- /.control-sidebar -->
 </div>
 <!-- ./wrapper -->


 <!-- jQuery -->
 <script src="<?= base_url('assets') ?>/plugins/jquery/jquery.min.js"></script>
 <!-- jQuery UI 1.11.4 -->
 <script src="<?= base_url('assets') ?>/plugins/jquery-ui/jquery-ui.min.js"></script>
 <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
 <script>
     $.widget.bridge('uibutton', $.ui.button)
 </script>
 <!-- Bootstrap 4 -->
 <script src="<?= base_url('assets') ?>/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
 <!-- ChartJS -->
 <script src="<?= base_url('assets') ?>/plugins/chart.js/Chart.min.js"></script>
 <!-- Sparkline -->
 <script src="<?= base_url('assets') ?>/plugins/sparklines/sparkline.js"></script>
 <!-- jQuery Knob Chart -->
 <script src="<?= base_url('assets') ?>/plugins/jquery-knob/jquery.knob.min.js"></script>
 <!-- daterangepicker -->
 <script src="<?= base_url('assets') ?>/plugins/moment/moment.min.js"></script>
 <script src="<?= base_url('assets') ?>/plugins/daterangepicker/daterangepicker.js"></script>
 <!-- Tempusdominus Bootstrap 4 -->
 <script src="<?= base_url('assets') ?>/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
 <!-- Summernote -->
 <script src="<?= base_url('assets') ?>/plugins/summernote/summernote-bs4.min.js"></script>
 <!-- overlayScrollbars -->
 <script src="<?= base_url('assets') ?>/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>

 <!-- DataTables  & Plugins -->
 <script src="<?= base_url('assets') ?>/plugins/datatables/jquery.dataTables.min.js"></script>
 <script src="<?= base_url('assets') ?>/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
 <script src="<?= base_url('assets') ?>/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
 <script src="<?= base_url('assets') ?>/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
 <script src="<?= base_url('assets') ?>/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
 <script src="<?= base_url('assets') ?>/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
 <script src="<?= base_url('assets') ?>/plugins/jszip/jszip.min.js"></script>
 <script src="<?= base_url('assets') ?>/plugins/pdfmake/pdfmake.min.js"></script>
 <script src="<?= base_url('assets') ?>/plugins/pdfmake/vfs_fonts.js"></script>
 <script src="<?= base_url('assets') ?>/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
 <script src="<?= base_url('assets') ?>/plugins/datatables-buttons/js/buttons.print.min.js"></script>
 <script src="<?= base_url('assets') ?>/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>




 <!-- AdminLTE App -->
 <script src="<?= base_url('assets') ?>/dist/js/adminlte.js"></script>
 <!-- AdminLTE App -->
 <script src="<?= base_url('assets') ?>/dist/js/adminlte.min.js"></script>
 <!-- date-range-picker -->
 <script src="<?= base_url('assets') ?>/plugins/daterangepicker/daterangepicker.js"></script>
 <!-- Select2 -->
 <script src="<?= base_url('assets') ?>/plugins/select2/js/select2.full.min.js"></script>
 <!-- Bootstrap4 Duallistbox -->
 <script src="<?= base_url('assets') ?>/plugins/bootstrap4-duallistbox/jquery.bootstrap-duallistbox.min.js"></script>
 <!-- InputMask -->
 <script src="<?= base_url('assets') ?>/plugins/inputmask/min/jquery.inputmask.bundle.min.js"></script>
 <!-- date-range-picker -->
 <!-- bootstrap color picker -->
 <script src="<?= base_url('assets') ?>/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js"></script>
 <!-- Tempusdominus Bootstrap 4 -->
 <!-- Bootstrap Switch -->
 <script src="<?= base_url('assets') ?>/plugins/bootstrap-switch/js/bootstrap-switch.min.js"></script>
 <!-- AdminLTE App -->
 <script src="<?= base_url('assets') ?>/dist/js/adminlte.min.js"></script>

 <!-- DATE PICER -->
 <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>


 <script>
     window.setTimeout(function() {
         $(".alert").fadeTo(500, 0).slideUp(500, function() {
             $(this).remove();
         });
     }, 6000);
 </script>
 <!-- page script -->
 <script>
     $(function() {
         $("#example1").DataTable({
             "responsive": true,
             "autoWidth": false,
         });
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

 </body>

 </html>