<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>

<strong>Copyright &copy; 2021 <a href="#">Government ICT Officer's Forum</a>.</strong>
All rights reserved.
<div class="float-right d-none d-sm-inline-block">
	<b>Contact - </b>Email: info@govtictofficers.org
</div>

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

<!-- Tempusdominus Bootstrap 4 -->
<script src="<?php echo base_url(); ?>assets/adminlte/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="<?php echo base_url(); ?>assets/adminlte/plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="<?php echo base_url(); ?>assets/adminlte/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.22/js/dataTables.bootstrap4.min.js"></script>

<!-- AdminLTE App -->
<script src="<?php echo base_url(); ?>assets/adminlte/js/adminlte.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="<?php echo base_url(); ?>assets/adminlte/js/pages/dashboard.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?php echo base_url(); ?>assets/adminlte/js/demo.js"></script>
<script src="<?php echo base_url(); ?>assets/adminlte/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>

<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.6.4/js/dataTables.buttons.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/pdfmake.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/vfs_fonts.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.html5.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.print.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>

<!-- https://plugins.krajee.com/file-krajee-explorer-demo -->
<script src="<?php echo base_url('assets/plugins/fileinput/fileinput.min.js') ?>"></script>

<!-- Sweet Alert library -->
<link rel="stylesheet" href="<?php echo base_url('assets/plugins/sweet-alert/sweetalert.css'); ?>">
<script src="<?php echo base_url('assets/plugins/sweet-alert/sweetalert.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/plugins/datepicker/js/bootstrap-datepicker.min.js'); ?>"></script>
<!-- 
<script src="<?php echo base_url(); ?>assets/js/datatableconfig.js"></script> -->

<!-- Select2 -->
<script src="<?php echo base_url(); ?>assets/adminlte/plugins/select2/js/select2.full.js"></script>


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