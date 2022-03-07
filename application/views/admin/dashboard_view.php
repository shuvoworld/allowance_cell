<div class="content-wrapper">
<!-- Main content -->
    <section class="content">
      <div class="container-fluid">

        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3><?=count($approved);?></h3>

                <p>Approved Beneficiaries</p>
              </div>
<!--              <div class="icon">-->
<!--                <i class="ion ion-bag"></i>-->
<!--              </div>-->
<!--              <a href="--><?php //echo base_url(); ?><!--Beneficiaries/beneficiaries_management" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>-->
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
                <h3><?=count($rejected);?></h3>

                <p>Rejected Beneficiaries</p>
              </div>

            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                <h3><?=count($pending);?></h3>

                <p>Pending Beneficiaries</p>
              </div>

            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3><?=count($all);?></h3>

                <p>All Beneficiaries</p>
              </div>

            </div>
          </div>
          <!-- ./col -->
        </div>
        <!-- /.row -->
        <!-- Main row -->
        <div class="row">
          <div class="col-md-12 col-xs-12">
           
          </div>
        </div>
      </div>
</div>
</div>