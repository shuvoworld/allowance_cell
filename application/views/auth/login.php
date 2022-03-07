<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>নির্যাতিত, দুঃস্থ মহিলা ও শিশু কল্যাণ তহবিল থেকে অনুদান মঞ্জুরী</title>
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
      <div class="info-box-content login-logo" style="text-align: center">নির্যাতিত, দুঃস্থ মহিলা ও শিশু কল্যাণ তহবিল থেকে অনুদান মঞ্জুরীর ডাটাবেজ</div>
    </div>
    <!-- /.login-logo -->
    <div class="card">
      <div class="card-body login-card-body">
        <?php echo $this->session->flashdata('message'); ?>
        <?php echo form_open("index.php/auth/login"); ?>
        <div class="form-group">
          <?php echo form_label('ইমেইল', 'identity'); ?>
          <?php echo form_error('identity'); ?>
          <?php echo form_input('identity', '', 'class="form-control"'); ?>
        </div>
        <div class="form-group">
          <?php echo form_label('পাসওয়ার্ড', 'password'); ?>
          <?php echo form_error('password'); ?>
          <?php echo form_password('password', '', 'class="form-control"'); ?>
        </div>

        <?php echo form_submit('submit', 'লগইন করুন', 'class="btn btn-primary btn-lg btn-block"'); ?>

        <?php echo form_close(); ?>
        <br/>
<!--        <div class="form-group">-->
<!--          <a href="--><?//= base_url('auth/forgot_password'); ?><!--" class="btn btn-warning">পাসওয়ার্ড পুনরুদ্ধার করুন</a>-->
<!--         <a href="--><?//= base_url('registration/newmember'); ?><!--" class="btn btn-success" style="float:right" target="_blank" >নতুন মেম্বার হোন</a>-->
<!--        </div>-->
        

      </div>
      <!-- /.login-card-body -->
    </div>
      <div class="info-box;" style="text-align: center">
        মহিলা ও শিশু বিষয়ক মন্ত্রণালয়<br/>
        www.mowca.gov.bd<br/>
      </div>
  </div>
  <!-- /.login-box -->

<br/>
  <div style="margin-right: -180px; margin-top: 80px;">
	  <img src="<?php echo base_url(); ?>assets/uploads/bg.png" width="300" />
  </div>
  <!-- jQuery -->
  <script src="<?php echo base_url(); ?>assets/adminlte/plugins/jquery/jquery.min.js"></script>
  <!-- Bootstrap 4 -->
  <script src="<?php echo base_url(); ?>assets/adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- AdminLTE App -->
  <script src="<?php echo base_url(); ?>assets/adminlte/js/adminlte.min.js"></script>

</body>

</html>
