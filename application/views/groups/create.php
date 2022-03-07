<?php defined('BASEPATH') or exit('No direct script access allowed');?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">

    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>User Group</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">User Group</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Create New User Group</h3>
            </div>
            <!-- /.card-header -->
            <form role="form" action="<?php base_url('Group/create')?>" method="post">
              <div class="card-body">
                <?php echo validation_errors(); ?>
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
                <div class="form-group col-2">
                  <label for="groupName">Group Name</label>
                  <input type="text" id="name" name="name" class="form-control">
                </div>
                <div class="form-group col-2">
                  <label for="groupName">Description</label>
                  <input type="text" id="description" name="description" class="form-control">
                </div>
                <div class="form-group col-12">
                  <table id="groupTable" class="table table-bordered table-hover">
                    <thead>
                      <tr>
                        <td>Permission</td>
                        <th>Create</th>
                        <th>Update</th>
                        <th>View</th>
                        <th>Delete</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td>Member</td>
                        <td><input type="checkbox" name="permission[]" id="permission" value="createMember" class="minimal"></td>
                        <td><input type="checkbox" name="permission[]" id="permission" value="updateMember" class="minimal"></td>
                        <td><input type="checkbox" name="permission[]" id="permission" value="viewMember" class="minimal"></td>
                        <td><input type="checkbox" name="permission[]" id="permission" value="deleteMember" class="minimal"></td>
                      </tr>

                      <tr>
                        <td>Employee</td>
                        <td><input type="checkbox" name="permission[]" id="permission" value="createEmployee" class="minimal"></td>
                        <td><input type="checkbox" name="permission[]" id="permission" value="updateEmployee" class="minimal"></td>
                        <td><input type="checkbox" name="permission[]" id="permission" value="viewEmployee" class="minimal"></td>
                        <td><input type="checkbox" name="permission[]" id="permission" value="deleteEmployee" class="minimal"></td>
                      </tr>
                      <tr>
                        <td>Group</td>
                        <td><input type="checkbox" name="permission[]" id="permission" value="createGroup" class="minimal"></td>
                        <td><input type="checkbox" name="permission[]" id="permission" value="updateGroup" class="minimal"></td>
                        <td><input type="checkbox" name="permission[]" id="permission" value="viewGroup" class="minimal"></td>
                        <td><input type="checkbox" name="permission[]" id="permission" value="deleteGroup" class="minimal"></td>
                      </tr>
                      <tr>
                        <td>User</td>
                        <td><input type="checkbox" name="permission[]" id="permission" value="createUser" class="minimal"></td>
                        <td><input type="checkbox" name="permission[]" id="permission" value="updateUser" class="minimal"></td>
                        <td><input type="checkbox" name="permission[]" id="permission" value="viewUser" class="minimal"></td>
                        <td><input type="checkbox" name="permission[]" id="permission" value="deleteUser" class="minimal"></td>
                      </tr>
                      <tr>
                        <td>Designation</td>
                        <td><input type="checkbox" name="permission[]" id="permission" value="createDesignation" class="minimal"></td>
                        <td><input type="checkbox" name="permission[]" id="permission" value="updateDesignation" class="minimal"></td>
                        <td><input type="checkbox" name="permission[]" id="permission" value="viewDesignation" class="minimal"></td>
                        <td><input type="checkbox" name="permission[]" id="permission" value="deleteDesignation" class="minimal"></td>
                      </tr>
                      <tr>
                        <td>Ministry</td>
                        <td><input type="checkbox" name="permission[]" id="permission" value="createMinistry" class="minimal"></td>
                        <td><input type="checkbox" name="permission[]" id="permission" value="updateMinistry" class="minimal"></td>
                        <td><input type="checkbox" name="permission[]" id="permission" value="viewMinistry" class="minimal"></td>
                        <td><input type="checkbox" name="permission[]" id="permission" value="deleteMinistry" class="minimal"></td>
                      </tr>
                      <tr>
                        <td>Department</td>
                        <td><input type="checkbox" name="permission[]" id="permission" value="createDepartment" class="minimal"></td>
                        <td><input type="checkbox" name="permission[]" id="permission" value="updateDepartment" class="minimal"></td>
                        <td><input type="checkbox" name="permission[]" id="permission" value="viewDepartment" class="minimal"></td>
                        <td><input type="checkbox" name="permission[]" id="permission" value="deleteDepartment" class="minimal"></td>
                      </tr>
                      <tr>
                        <td>Payscale</td>
                        <td><input type="checkbox" name="permission[]" id="permission" value="createPayscale" class="minimal"></td>
                        <td><input type="checkbox" name="permission[]" id="permission" value="updatePayscale" class="minimal"></td>
                        <td><input type="checkbox" name="permission[]" id="permission" value="viewPayscale" class="minimal"></td>
                        <td><input type="checkbox" name="permission[]" id="permission" value="deletePayscale" class="minimal"></td>
                      </tr>
                       <tr>
                        <td>Appointment Type</td>
                        <td><input type="checkbox" name="permission[]" id="permission" value="createAppointmenttype" class="minimal"></td>
                        <td><input type="checkbox" name="permission[]" id="permission" value="updateAppointmenttype" class="minimal"></td>
                        <td><input type="checkbox" name="permission[]" id="permission" value="viewAppointmenttype" class="minimal"></td>
                        <td><input type="checkbox" name="permission[]" id="permission" value="deleteAppointmenttype" class="minimal"></td>
                      </tr>
                      <tr>
                        <td>Paymment Mode</td>
                        <td><input type="checkbox" name="permission[]" id="permission" value="createPaymentmode" class="minimal"></td>
                        <td><input type="checkbox" name="permission[]" id="permission" value="updatePaymentmode" class="minimal"></td>
                        <td><input type="checkbox" name="permission[]" id="permission" value="viewPaymentmode" class="minimal"></td>
                        <td><input type="checkbox" name="permission[]" id="permission" value="deletePaymentmode" class="minimal"></td>
                      </tr>
                      <tr>
                        <td>Paymment</td>
                        <td><input type="checkbox" name="permission[]" id="permission" value="createPayment" class="minimal"></td>
                        <td><input type="checkbox" name="permission[]" id="permission" value="updatePayment" class="minimal"></td>
                        <td><input type="checkbox" name="permission[]" id="permission" value="viewPayment" class="minimal"></td>
                        <td><input type="checkbox" name="permission[]" id="permission" value="deletePayment" class="minimal"></td>
                      </tr>
                      <tr>
                        <td>Recommender</td>
                        <td><input type="checkbox" name="permission[]" id="permission" value="createRecommender" class="minimal"></td>
                        <td><input type="checkbox" name="permission[]" id="permission" value="updateRecommender" class="minimal"></td>
                        <td><input type="checkbox" name="permission[]" id="permission" value="viewRecommender" class="minimal"></td>
                        <td><input type="checkbox" name="permission[]" id="permission" value="deleteRecommender" class="minimal"></td>
                      </tr>
                      <tr>
                        <td>Recommendation</td>
                        <td><input type="checkbox" name="permission[]" id="permission" value="createRecommendation" class="minimal"></td>
                        <td><input type="checkbox" name="permission[]" id="permission" value="updateRecommendation" class="minimal"></td>
                        <td><input type="checkbox" name="permission[]" id="permission" value="viewRecommendation" class="minimal"></td>
                        <td><input type="checkbox" name="permission[]" id="permission" value="deleteRecommendation" class="minimal"></td>
                      </tr>
                      <tr>
                        <td>Committee Members</td>
                        <td><input type="checkbox" name="permission[]" id="permission" value="createCommittee" class="minimal"></td>
                        <td><input type="checkbox" name="permission[]" id="permission" value="updateCommittee" class="minimal"></td>
                        <td><input type="checkbox" name="permission[]" id="permission" value="viewCommittee" class="minimal"></td>
                        <td><input type="checkbox" name="permission[]" id="permission" value="deleteCommittee" class="minimal"></td>
                      </tr>
                      <tr>
                        <td>Account Balance</td>
                        <td><input type="checkbox" name="permission[]" id="permission" value="createBalance" class="minimal"></td>
                        <td><input type="checkbox" name="permission[]" id="permission" value="updateBalance" class="minimal"></td>
                        <td><input type="checkbox" name="permission[]" id="permission" value="viewBalance" class="minimal"></td>
                        <td><input type="checkbox" name="permission[]" id="permission" value="deleteBalance" class="minimal"></td>
                      </tr>
                      <tr>
                        <td>Website Banner</td>
                        <td><input type="checkbox" name="permission[]" id="permission" value="createBanner" class="minimal"></td>
                        <td><input type="checkbox" name="permission[]" id="permission" value="updateBanner" class="minimal"></td>
                        <td><input type="checkbox" name="permission[]" id="permission" value="viewBanner" class="minimal"></td>
                        <td><input type="checkbox" name="permission[]" id="permission" value="deleteBanner" class="minimal"></td>
                      </tr>
                      <tr>
                        <td>Website Notice</td>
                        <td><input type="checkbox" name="permission[]" id="permission" value="createNotice" class="minimal"></td>
                        <td><input type="checkbox" name="permission[]" id="permission" value="updateNotice" class="minimal"></td>
                        <td><input type="checkbox" name="permission[]" id="permission" value="viewNotice" class="minimal"></td>
                        <td><input type="checkbox" name="permission[]" id="permission" value="deleteNotice" class="minimal"></td>
                      </tr>
                      <tr>
                        <td>Website Mediacorner</td>
                        <td><input type="checkbox" name="permission[]" id="permission" value="createMedia" class="minimal"></td>
                        <td><input type="checkbox" name="permission[]" id="permission" value="updateMedia" class="minimal"></td>
                        <td><input type="checkbox" name="permission[]" id="permission" value="viewMedia" class="minimal"></td>
                        <td><input type="checkbox" name="permission[]" id="permission" value="deleteMedia" class="minimal"></td>
                      </tr>
                      <tr>
                        <td>Website Testimonials</td>
                        <td><input type="checkbox" name="permission[]" id="permission" value="createTestimonial" class="minimal"></td>
                        <td><input type="checkbox" name="permission[]" id="permission" value="updateTestimonial" class="minimal"></td>
                        <td><input type="checkbox" name="permission[]" id="permission" value="viewTestimonial" class="minimal"></td>
                        <td><input type="checkbox" name="permission[]" id="permission" value="deleteTestimonial" class="minimal"></td>
                      </tr>

                      <tr>
                        <td>Website News</td>
                        <td><input type="checkbox" name="permission[]" id="permission" value="createNews" class="minimal"></td>
                        <td><input type="checkbox" name="permission[]" id="permission" value="updateNews" class="minimal"></td>
                        <td><input type="checkbox" name="permission[]" id="permission" value="viewNews" class="minimal"></td>
                        <td><input type="checkbox" name="permission[]" id="permission" value="deleteNews" class="minimal"></td>
                      </tr>

                    </tbody>
                  </table>
                </div>
              </div>
              <!-- /.card-body -->

          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->
      </div>
      <div class="row">
        <div class="col-12">
          <a href="<?php echo base_url('group') ?>" class="btn btn-secondary">Cancel</a>
          <input type="submit" value="Save and Close" class="btn btn-success float-right">
        </div>
      </div>
      </form>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </section>
</div>