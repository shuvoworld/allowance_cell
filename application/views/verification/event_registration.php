<?php defined('BASEPATH') OR exit('No direct script access allowed');?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">

   <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
      <div class="row">
      <div class="col-md-6" style="margin: 0 auto; text-align: center;">
      <h1 class="display-1">
      <strong>Study Circle # 12</strong><br/>
        Banglar Pathshala Foundation<br/>
      <b>Amartya Sen and the Search for a Flourishing and Just Society</b><br/>
      </h1>
      </div>
      </div>
      </div><!-- /.container-fluid -->
    </section>

     <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <!-- /.card-header -->
            <?php echo form_open('Verification/event_verification'); ?>
            <div class="card-body">
            
            <div class="row">
            <div class="form-group col-6">
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
          </div>
          </div>

        <div class="row">
              <div class="form-group col-3">
                <label for="national_id_no">Event Registration ID</label>
                <input type="text" id="ticket_number" name="ticket_number" class="form-control">
              </div>
        </div>
        <div class="row">
        <div class="col-12">
          <input type="submit" value="Verify" class="btn btn-success float-left">
        </div>
      </div>
      </form>
      <!-- /.row -->
    </section>
    <!-- /.content -->
    </section>
</div>
