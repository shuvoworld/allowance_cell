<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>

  <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css">
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/adminlte/plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bbootstrap 4 -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/adminlte/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/adminlte/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/adminlte/plugins/jqvmap/jqvmap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/adminlte/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/adminlte/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/adminlte/plugins/daterangepicker/daterangepicker.css">
  <!-- summernote -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/adminlte/plugins/summernote/summernote-bs4.css">

  <!-- DataTables -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/adminlte/plugins/datatables-bs4/css/dataTables.bootstrap4.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/3.2.1/css/font-awesome.min.css" rel="stylesheet" />
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
  <link rel="stylesheet" href="<?php echo base_url('assets/plugins/fileinput/fileinput.min.css') ?>">
  <link rel="stylesheet" href="<?php echo base_url('assets/plugins/datepicker/css/bootstrap-datepicker.min.css') ?>">

    <!-- Select2 -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/adminlte/plugins/select2/css/select2.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/adminlte/plugins/select2-bootstrap4-theme/select2-bootstrap4.css">
    <title>সদস্য নিবন্ধন ফর্ম</title>
  </head>
  <div class="container">
    <div class="py-5 text-center">
    <img class="d-block mx-auto mb-4" src="<?php echo base_url(); ?>assets/uploads/resources/logo.jpg" alt="ICT Forum"   width="300">
    <h2>গভর্নমেন্ট আইসিটি অফিসার্স ফোরাম এ সদস্য নিবন্ধন ফর্ম</h2>
    <h3>
    শুধুমাত্র নবম গ্রেড বা তদুর্ধ সরকারি রাজস্ব খাতভূক্ত গেজেটেড আইসিটি কর্মকর্তাদের জন্য
    </h3>
    <p class="lead">
    </p>
    <div class="row">
            <div class="form-group col-12">
                <span style="color:red"><?php echo validation_errors(); ?></span>
                 <?php if ($this->session->flashdata('success')): ?>
            <div class="alert alert-success alert-dismissible" role="alert">
              <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              <?php echo $this->session->flashdata('success'); ?>
            </div>
          <?php elseif ($this->session->flashdata('error')): ?>
            <div class="alert alert-error alert-dismissible" role="alert">
              <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              <?php echo $this->session->flashdata('error'); ?>
            </div>
          <?php endif;?>
          </div>
          </div>
    <?php echo form_open('Registration/newmember'); ?>
    <div class="row border rounded-lg border-success">
    <div class="col-md-6 order-md-1">
    </div>
    <div class="col-md-12 order-md-1">
    <br/>
      <h4 class="mb-3">আবেদনকারীর তথ্য</h4>

        <div class="row">
          <div class="col-md-6 mb-3">
            <label for="name">নাম (বাংলায়)*</label>
            <input type="text" class="form-control" id="name_BN" name="name_BN" placeholder="" value="<?php echo set_value('name_BN'); ?>" required>
          </div>
          <div class="col-md-6 mb-3">
            <label for="national_id_no">নাম (ইংরেজি)*</span></label>
            <input type="text" class="form-control" id="name" name="name" value="<?php echo set_value('name'); ?>" required>
          </div>
        </div>

        <div class="row">
          <div class="col-md-3 mb-3">
            <label for="mobile_no">মোবাইল নং (১১ সংখ্যা, ইংরেজিতে)*</span></label>
            <input type="text" class="form-control" id="mobile_no" name="mobile_no" placeholder="" value="<?php echo set_value('mobile_no'); ?>" required>
          </div>
           <div class="col-md-3 mb-3">
          <label for="dob">জন্ম তারিখ*<span class="text-muted">(*)</span></label>
          <input type="text" class="form-control datepicker" id="dob" name="dob" placeholder="yyyy-mm-dd"  data-date-format="yyyy-mm-dd" value="<?php echo set_value('dob'); ?>" required>
        </div>

			<div class="col-md-3 mb-3">
				<label for="mobile_no">জাতীয় পরিচয়পত্র নং(ইংরেজিতে)*</span></label>
				<input type="text" class="form-control" id="nid" name="nid" placeholder="" value="<?php echo set_value('nid'); ?>" required>
			</div>


        </div>

		<div class="row">
			<div class="col-md-3 mb-3">
				<label for="lastName">ইমেইল* (ইউজার আইডি)</label>
				<input type="text" class="form-control" id="primary_email" name="primary_email" value="<?php echo set_value('primary_email'); ?>" value="<?php echo set_value('primary_email'); ?>" required>
			</div>
			<div class="col-md-3 mb-3">
				<label for="mother_name">পাসওয়ার্ড*</label>
				<input type="password" class="form-control" id="password" name="password" value="<?php echo set_value('password'); ?>"  required>
			</div>
		</div>

        <div class="row">
        <div class="col-md-3 mb-3">
          <label for="email">পদবী</label>
          <select name="current_designation_id" id="current_designation_id" class="form-control select2">
            <option value="">নির্বাচন করুন</option>
            <?php
            foreach ($designations as $row) {
                echo "<option value='$row->id' " . set_select('current_designation_id', $row->id) . " >" . $row->name_BN . "</option>";
            }
            ?>
        </select>
        </div>
        <div class="col-md-3 mb-3">
            <label for="current_payscale_id">বর্তমান পদে যোগদানের পে স্কেল/গ্রেড</label>
            <select name="current_payscale_id" id="current_payscale_id" class="form-control select2">
                <option value="">নির্বাচন করুন</option>
                <?php
                foreach ($payscales as $row) {
                    echo "<option value='$row->id' " . set_select('current_payscale_id', $row->id) . " >" . $row->name_BN . "</option>";
                }
                ?>
            </select>
        </div>
        <div class="col-md-3 mb-3">
            <label for="current_join_date">বর্তমান পদে  যোগদানের তারিখ</label>
            <input type="text" placehset_valueer="সিলেক্ট করুন" id="current_join_date" name="current_join_date"  value="<?= set_value('current_join_date');?>"  class="form-control datepicker" readonly="readonly" >
        </div>

        </div>

        <div class="row">
            <div class="col-md-3 mb-3">
                <label for="current_ministry_id">মন্ত্রণালয়/বিভাগ</label>
                <select name="current_ministry_id" id="current_ministry_id" class="form-control select2">
                    <option value="">নির্বাচন করুন</option>
                    <?php
                    foreach ($ministries as $row) {
                        echo "<option value='$row->id' " . set_select('current_ministry_id', $row->id) . " >" . $row->name_BN . "</option>";
                    }
                    ?>
                </select>
            </div>
            
            <div class="col-md-3 mb-3">
                <label for="current_department_id">অধিদপ্তর/দপ্তর</label>
                <select name="current_department_id" id="current_department_id" class="form-control select2" style="width: 100%;">
                </select>
            </div>

            <div class="col-md-3 mb-3">
                <label for="current_office_name">কার্যালয়ের নাম (বাংলায়)</label>
                <input type="text"  id="current_office_name" name="current_office_name" value="<?= set_value('current_office_name');?>" class="form-control">
            </div>
        <div class="col-md-3 mb-3">
            <label for="website_url">বর্তমান কার্যালয়ের ওয়েবসাইট লিঙ্ক*</label>
            <input type="text" id="website_url" name="website_url" value="<?= set_value('website_url');?>" class="form-control" required>
        </div>
      </div>

            
    <div class="row">
									<div class="col-md-6 mb-3">
										<label for="present_address">যোগাযোগের বর্তমান ঠিকানা*</label>
										<textarea id="present_address" name="present_address" class="form-control" rows="4" cols="70" required></textarea>
									</div>
						
    </div>
        <hr class="mb-4">
        <h4 class="mb-3">রেজিস্ট্রেশনের ধাপসমূহ</h4>
        <small>
        <ul class="list-group">
        <li class="list-group-item">ফর্ম এর তথ্য সমূহ ফিল আপ করে দাখিল করুন।আবেদন দাখিল হওয়ার পর আবেদনের স্ট্যাটাস 'Pending' থাকবে। আপনার ইউজার আইডি (ইমেইল) এবং পাসওয়ার্ড দিয়ে সিস্টেম এ লগইন করে নির্ধারিত রেজিস্ট্রেশন ফি এবং মেম্বারশিপ ফি প্রদান করুন।</li>
         <li class="list-group-item">তথ্য ভেরিফিকেশন পূর্বক ফোরাম হতে আপনার মেম্বারশিপ স্ট্যাটাস আপডেট করা হবে এবং মেম্বারশিপ আইডি প্রদান করা হবে।</li>         
</ul>
        </small>

        <hr class="mb-4">
        <button class="btn btn-primary" type="submit">রেজিস্ট্রেশন দাখিল করুন</button>
        <?php echo form_close(); ?>
      <br/><br/>
    </div>
  </div>
  </div>
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


<script src="<?php echo base_url(); ?>assets/adminlte/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>


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
    <script type="text/javascript">
    $(document).ready(function () {
     	$('.datepicker').datepicker({
			autoclose: true,
			format: "yyyy-mm-dd",
			todayHighlight: true,
			orientation: "top auto",
			todayBtn: true,
			todayHighlight: true,
		});
        $('.select2').select2();

        $('#current_ministry_id').change(function () {
            var current_ministry_id = $('#current_ministry_id').val();
            if (current_ministry_id != '') {
                $.ajax({
                    url: "<?php echo base_url(); ?>Registration/fetch_department",
                    method: "POST",
                    data: {ministry_id: current_ministry_id},
                    success: function (data) {
                        $('#current_department_id').html(data);
                    }
                });
            } else {
                $('#current_department_id').html('<option value="">নির্বাচন করুন</option>');
            }
        });
    });
    </script>
  </body>
</html>
