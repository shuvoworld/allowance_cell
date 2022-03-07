<!DOCTYPE html>
<head>
<?php require_once 'parts/header.php'; ?>
    <script type="text/javascript">
        var BASE_URL = "<?php echo base_url(); ?>";
    </script>
</head>

<body class="hold-transition sidebar-mini layout-fixed">
  <div class="wrapper">
    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
      <!-- Left navbar links -->
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
        </li>
      </ul>
    <div>
<!--      <a href="--><?php //echo base_url()."Member/edit/".$this->ion_auth->user()->row()->member_id;?><!--"  class="btn btn-info"><i class="fa fa-user"></i> আমার প্রোফাইল</a>-->
           &nbsp;<a href="<?php echo base_url()."Member/change_password/";?>" class="btn btn-success"><i class="fa fa-list"></i> পাসওয়ার্ড পরিবর্তন করুন</a>
            &nbsp;<a  href="<?php echo base_url()."auth/logout/";?>" class="btn btn-danger"><i class="fa fa-power-off" aria-hidden="true"></i> লগআউট</a>
    </div>
    </nav>
    <br/>
    <!-- /.navbar -->
    <!-- Left side column. contains the logo and sidebar -->
    <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar ">
            <!-- Sidebar user panel -->
            <?php require_once 'parts/sidebar.php'; ?>
            <!-- /.sidebar -->
        </section>
    </aside>
    
        <!-- Main content -->
            {{CONTENT}}
        <!-- /.content -->
<footer class="main-footer">
        <?php require_once 'parts/footer.php'; ?>
</footer>
</div>
<!-- ./wrapper -->
</body>
</html>

