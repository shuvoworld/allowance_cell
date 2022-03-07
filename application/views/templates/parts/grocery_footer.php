<strong>Copyright &copy; 2020 <a href="#">Md. Enamul haque</a>.</strong>
  All rights reserved.
<div class="float-right d-none d-sm-inline-block">
    <b>Contact - </b>Phone: +88-01675000148, Email: shuvoworld@gmail.com
</div>


<!-- Control Sidebar -->
<aside class="control-sidebar control-sidebar-dark">
  <!-- Control sidebar content goes here -->
</aside>
<!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<script src="<?php echo base_url(); ?>assets/adminlte/plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="<?php echo base_url(); ?>assets/adminlte/plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
    $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="<?php echo base_url(); ?>assets/adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="<?php echo base_url(); ?>assets/adminlte/plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="<?php echo base_url(); ?>assets/adminlte/plugins/sparklines/sparkline.js"></script>
<!-- JQVMap -->
<script src="<?php echo base_url(); ?>assets/adminlte/plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="<?php echo base_url(); ?>assets/adminlte/plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<!-- jQuery Knob Chart -->
<script src="<?php echo base_url(); ?>assets/adminlte/plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="<?php echo base_url(); ?>assets/adminlte/plugins/moment/moment.min.js"></script>
<script src="<?php echo base_url(); ?>assets/adminlte/plugins/daterangepicker/daterangepicker.js"></script>
<!-- DataTables -->
<script src="<?php echo base_url(); ?>assets/adminlte/plugins/datatables/jquery.dataTables.js"></script>
<script src="<?php echo base_url(); ?>assets/adminlte/plugins/datatables-bs4/js/dataTables.bootstrap4.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="<?php echo base_url(); ?>assets/adminlte/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="<?php echo base_url(); ?>assets/adminlte/plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="<?php echo base_url(); ?>assets/adminlte/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url(); ?>assets/adminlte/js/adminlte.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="<?php echo base_url(); ?>assets/adminlte/js/pages/dashboard.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?php echo base_url(); ?>assets/adminlte/js/demo.js"></script>
<script src="<?php echo base_url(); ?>assets/adminlte/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>


<?php foreach($js_files as $file): ?>
        <script src="<?php echo $file; ?>"></script>
    <?php endforeach; ?>

    <!-- https://github.com/joshuachinemezu/ci-toastr -->
<script type="text/javascript">
  <?php if ($this->session->flashdata('success')) { ?>

    toastr.success("<?php echo $this->session->flashdata('success'); ?>");

  <?php } else if ($this->session->flashdata('error')) {  ?>

    toastr.error("<?php echo $this->session->flashdata('error'); ?>");

  <?php } else if ($this->session->flashdata('warning')) {  ?>

    toastr.warning("<?php echo $this->session->flashdata('warning'); ?>");

  <?php } else if ($this->session->flashdata('info')) {  ?>

    toastr.info("<?php echo $this->session->flashdata('info'); ?>");

  <?php } ?>
</script>

</body>

</html>
