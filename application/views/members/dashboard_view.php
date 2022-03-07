<div class="content-wrapper">
<!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12 col-xs-12">
          <h3 class="mt-4 mb-4">সরকারি আইসিটি অফিসার্স ফোরাম</h3>
          <div class="row">
          <div class="col-md-4">
            <!-- Widget: user widget style 2 -->
            <div class="card card-widget widget-user-2">
              <!-- Add the bg color to the header using any of the bg-* classes -->
              <div class="widget-user-header bg-warning">
                <div class="widget-user-image">
                  <img class="img-circle elevation-2" src="<?php echo base_url() . $member_data['image'] ?>" alt="User Avatar">
                  <?php
                    if($member_data['membership_status'] == 1) 
                      $class = "badge badge-info";
                    elseif ($member_data['membership_status'] == 2) {
                      $class = "badge badge-primary";
                    }
                    elseif ($member_data['membership_status'] == 3) {
                      $class = "badge badge-success";
                    }
                    else {
                      $class = "badge badge-danger";
                    }

                  ?>
                  <h4><span class='<?= $class; ?>'  style="float: right"><?= $this->Helper_model->name_from_id('membership_status', $member_data['membership_status']); ?></span></h4>
                </div>
                <!-- /.widget-user-image -->
                <h3 class="widget-user-username"><?php if(isset($member_data['name_BN'])) echo $member_data['name_BN']; ?></h3>
                <h4 class="widget-user-desc"><?php if(isset($member_data['current_designation_name'])) echo $member_data['current_designation_name']; ?></h4>
                <h5 class="widget-user-desc"><?php if(isset($member_data['current_department_name'])) echo $member_data['current_department_name']; ?>, <?= $member_data['current_ministry_name']; ?></h5>
              </div>
              <div class="card-footer p-0">
                <ul class="nav flex-column">
                  <li class="nav-item nav-link">
                      অদ্যবধি মোট জমাঃ <?= $member_balance['balance']; ?> টাকা
                  </li>
                  </li>
                </ul>
              </div>
            </div>
            <!-- /.widget-user -->
          </div>
          </div>
        </div>
      </div>
</div>
</div>