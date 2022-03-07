<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Password Reset</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/adminlte/plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/adminlte/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/adminlte/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>


<body class="hold-transition login-page">
  <div class="login-box">
    <div class="info-box mb-3 bg-success">
      <div class="info-box-content login-logo" style="text-align: center">গভর্নমেন্ট আইসিটি অফিসার্স ফোরাম</div>
    </div>
    <!-- /.login-logo -->
    <div class="card">
      <div class="card-body login-card-body">
        <p class="login-logo">পাসওয়ার্ড রিসেট করুন</p>
        <?php echo $this->session->flashdata('message'); ?>
        <?php echo form_open('auth/reset_password/' . $code);?>
        <div class="form-group">
        <?php echo form_label('নতুন পাসওয়ার্ড', 'new_password'); ?>
		<?php echo form_input($new_password, '', 'class="form-control"');?>
		</div>
		<div class="form-group">
		<?php echo form_label('নতুন পাসওয়ার্ড পুনরায়', 'new_password_confirm'); ?>
		<?php echo form_input($new_password_confirm, '', 'class="form-control"');?>
		</p>

        </div>
        <?php echo form_submit('submit', 'সাবমিট করুন', 'class="btn btn-primary btn-lg btn-block"'); ?>

        <?php echo form_close(); ?>
        <br/>

      </div>
      <!-- /.login-card-body -->
    </div>
  </div>
  <!-- /.login-box -->

  <!-- jQuery -->
  <script src="<?php echo base_url(); ?>assets/adminlte/plugins/jquery/jquery.min.js"></script>
  <!-- Bootstrap 4 -->
  <script src="<?php echo base_url(); ?>assets/adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- AdminLTE App -->
  <script src="<?php echo base_url(); ?>assets/adminlte/js/adminlte.min.js"></script>

</body>
</html>