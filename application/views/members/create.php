<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<h1>Create Member</h1>
				</div>
				<div class="col-sm-6">
					<ol class="breadcrumb float-sm-right">
						<li class="breadcrumb-item"><a href="#">হোম</a></li>
						<li class="breadcrumb-item active">মেম্বার যোগ করুন</li>
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
						<h3 class="card-title">মেম্বার যোগ করুন</h3>
					</div>
					<!-- /.card-header -->
					<form role="form" action="<?php base_url('Customer/create')?>" method="post" enctype="multipart/form-data">
						<div class="card-body">
							<?php if (validation_errors()) {?>
								<div class="alert alert-danger">
									<a class="close" data-dismiss="alert">x</a>
									<ul><?php echo (validation_errors('<li>', '</li>')); ?></ul>
								</div>
							<?php }?>
							<div class="row">
								<div class="form-group col-3">
									<label for="member_image">Upload Profile Photo</label>
									<input type="file" class="form-control-file" name="member_image" size="20" />
								</div>
							</div>
						<div class="row">
						<div class="col-md-12">
						<div class="card card-primary">
							<div class="card-header">
								<h3 class="card-title">ব্যাক্তিগত তথ্য</h3>
							</div>
							<div class="card-body">
							<div class="row">
								<div class="form-group col-3">
									<label for="name_BN">নাম (বাংলায়)*</label>
									<input type="text" id="name_BN" name="name_BN" value="<?= set_value('name_BN');?>" class="form-control">
								</div>
								<div class="form-group col-3">
									<label for="name">নাম (ইংরেজি)*</label>
									<input type="text" id="name" name="name" value="<?= set_value('name');?>" class="form-control">
								</div>
								<div class="form-group col-3">
									<label for="dob">জন্ম তারিখ*</label>
									<input type="text" placehset_valueer="সিলেক্ট করুন" id="dob" name="dob" value="<?= set_value('dob');?>"  class="form-control datepicker" readonly="readonly" >
								</div>
								<div class="form-group col-3">
									<label for="nid">জাতীয় পরিচয়পত্র নং*</label>
									<input type="text" id="nid" name="nid" value="<?= set_value('nid');?>"  class="form-control">
								</div>
								</div>
								<div class="row">
								<div class="form-group col-3">
									<label for="highest_education">সর্বোচ্চ অর্জিত ডিগ্রী</label>
									<input type="text" id="highest_education" name="highest_education" value="<?= set_value('highest_education');?>" class="form-control">
								</div>
								<div class="form-group col-3">
									<label for="academic_subject_graduation">স্নাতকের বিষয়</label>
									<input type="text" id="academic_subject_graduation" name="academic_subject_graduation" value="<?= set_value('academic_subject_graduation');?>" class="form-control">
								</div>
								</div>
								</div>
						</div>
						</div>
						</div>


					<div class="row">
					 <div class="col-md-12">
						<div class="card card-success">
							<div class="card-header">
								<h3 class="card-title">প্রথম যোগদানের তথ্য</h3>
							</div>
							<div class="card-body">
							<div class="row">
								<div class="form-group col-3">
									<label for="first_joining_designation_id">পদবী</label>
									<select name="first_joining_designation_id" id="first_joining_designation_id"  class="form-control select2">
										<option value="">নির্বাচন করুন</option>
										<?php
										foreach ($designations as $row) {
											echo "<option value='$row->id' " . set_select('first_joining_designation_id', $row->id) . " >" . $row->name_BN . "</option>";
										}
										?>
									</select>
								</div>

								<div class="form-group col-3">
									<label for="first_joining_payscale_id">পে স্কেল/গ্রেড</label>
									<select name="first_joining_payscale_id" id="first_joining_payscale_id" class="form-control select2">
										<option value="">নির্বাচন করুন</option>
										<?php
										foreach ($payscales as $row) {
											echo "<option value='$row->id' " . set_select('first_joining_payscale_id', $row->id) . " >" . $row->name_BN . "</option>";
										}
										?>
									</select>
								</div>

								<div class="form-group col-3">
									<label for="first_joining_date">যোগদানের তারিখ</label>
									<input type="text" placehset_valueer="সিলেক্ট করুন" id="first_joining_date" name="first_joining_date" value="<?= set_value('first_joining_date');?>" class="form-control datepicker" readonly="readonly" >
								</div>

							</div>
							<div class="row">
								<div class="form-group col-3">
									<label for="first_joining_ministry_id">মন্ত্রণালয়/বিভাগ</label>
									<select name="first_joining_ministry_id" id="first_joining_ministry_id" class="form-control select2">
										<option value="">নির্বাচন করুন</option>
										<?php
										foreach ($ministries as $row) {
											echo "<option value='$row->id' " . set_select('first_joining_ministry_id', $row->id) . " >". $row->name_BN."</option>";

    									 }  
										 ?>
									</select>
								</div>
								
								<div class="form-group col-3">
									<label for="first_joining_department_id">অধিদপ্তর/দপ্তর</label>
									<select name="first_joining_department_id" id="first_joining_department_id" class="form-control select2" style="width: 100%;">
									</select>
								</div>

								</div>
								</div>
							</div>
						</div>
					</div>
					<div class="row">
					 <div class="col-md-12">
						<div class="card card-warning">
							<div class="card-header">
								<h3 class="card-title">বর্তমান পদের তথ্য</h3>
							</div>
							<div class="card-body">
							<div class="row">
								<div class="form-group col-3">
									<label for="current_designation_id">পদবী</label>
									<select name="current_designation_id" id="current_designation_id" class="form-control select2">
										<option value="">নির্বাচন করুন</option>
										<?php
										foreach ($designations as $row) {
											echo "<option value='$row->id' " . set_select('current_designation_id', $row->id) . " >" . $row->name_BN . "</option>";
										}
										?>
									</select>
								</div>

								<div class="form-group col-3">
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

								<div class="form-group col-3">
									<label for="current_join_date">বর্তমান পদে  যোগদানের তারিখ</label>
									<input type="text" placehset_valueer="সিলেক্ট করুন" id="current_join_date" name="current_join_date"  value="<?= set_value('current_join_date');?>"  class="form-control datepicker" readonly="readonly" >
								</div>

							</div>
							<div class="row">
								<div class="form-group col-3">
									<label for="current_psc_advertisement_date">পিএসসি'র নিয়োগ বিজ্ঞপ্তি'র তারিখ</label>
									<input type="text" placehset_valueer="সিলেক্ট করুন" id="current_psc_advertisement_date" name="current_psc_advertisement_date" value="<?= set_value('current_psc_advertisement_date');?>" class="form-control datepicker" readonly="readonly" >
								</div>
								
								<div class="form-group col-3">
									<label for="current_psc_advertisement_date">নিয়োগে মেধাক্রম</label>
									<input type="text" id="current_psc_merit_list" name="current_psc_merit_list" value="<?= set_value('current_psc_merit_list');?>" class="form-control" >
								</div>
								<div class="form-group col-3">
									<label for="current_appointment_type_id">নিয়োগের ধরণ</label>
									<select name="current_appointment_type_id" id="current_appointment_type_id"  class="form-control select2">
										<option value="">নির্বাচন করুন</option>
										<?php
										foreach ($appointmenttypes as $row) {
											echo "<option value='$row->id' " . set_select('current_appointment_type_id', $row->id) . " >" . $row->name . "</option>";

										}
										?>
									</select>
								</div>
								</div>
								<div class="row">
								<div class="form-group col-3">
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
								
								<div class="form-group col-3">
									<label for="current_department_id">অধিদপ্তর/দপ্তর</label>
									<select name="current_department_id" id="current_department_id" class="form-control select2" style="width: 100%;">
									</select>
								</div>

								<div class="form-group col-3">
									<label for="current_office_name">কার্যালয়ের নাম (বাংলায়)</label>
									<input type="text"  id="current_office_name" name="current_office_name" value="<?= set_value('current_office_name');?>" class="form-control">
								</div>

								</div>
								</div>
							</div>
								</div>
							</div>
							
						</div>
					</div>

					<div class="row">
						<div class="col-md-12">
						<div class="card card-danger">
							<div class="card-header">
								<h3 class="card-title">মেম্বারশিপের তথ্য</h3>
							</div>
							<div class="card-body">
							<div class="row">
								<div class="form-group col-3">
									<label for="forum_membership_no">ফোরামের মেম্বারশিপ নং</label>
									<input type="text" id="forum_membership_no" name="forum_membership_no" value="<?= set_value('forum_membership_no');?>" class="form-control">
								</div>
								<div class="form-group col-3">
									<label for="ieb_membership_no">IEB মেম্বারশিপ নং</label>
									<input type="text" id="ieb_membership_no" name="ieb_membership_no" value="<?= set_value('ieb_membership_no');?>" class="form-control">
								</div>
								<div class="form-group col-3">
									<label for="bcs_membership_no">BCS মেম্বারশিপ নং</label>
									<input type="text" id="bcs_membership_no" name="bcs_membership_no" value="<?= set_value('bcs_membership_no');?>" class="form-control">
								</div>
								</div>
								</div>
						</div>
						</div>
						</div>

					<div class="row">
						<div class="col-md-12">
						<div class="card card-info">
							<div class="card-header">
								<h3 class="card-title">ফ্যামিলি, হবি সংক্রান্ত তথ্য</h3>
							</div>
							<div class="card-body">
							<div class="row">
								<div class="form-group col-3">
									<label for="spouse_name">স্পাউজের নাম (বাংলায়)</label>
									<input type="text" id="spouse_name" name="spouse_name" value="<?= set_value('spouse_name');?>" class="form-control">
								</div>
								<div class="form-group col-3">
									<label for="spouse_profession">স্পাউজের পেশা (বাংলায়)</label>
									<input type="text" id="spouse_profession" name="spouse_profession"  value="<?= set_value('spouse_profession');?>" class="form-control">
								</div>
								<div class="form-group col-3">
									<label for="number_of_children">সন্তানের সংখ্যা</label>
									<input type="text" id="number_of_children" name="number_of_children" value="<?= set_value('number_of_children');?>" class="form-control">
								</div>
								<div class="form-group col-3">
									<label for="hobby">ব্যাক্তিগত শখ</label>
									<textarea id="hobby" name="hobby" class="form-control" rows="4" cols="50"></textarea>
								</div>
								</div>
								</div>
						</div>
						</div>
					</div>

				<div class="row">
					<div class="col-md-12">
						<div class="card card-secondary">
							<div class="card-header">
								<h3 class="card-title">যোগাযোগের তথ্য</h3>
							</div>
							<div class="card-body">
								<div class="row">
									<div class="form-group col-3">
										<label for="primary_email">ব্যাক্তিগত ইমেইল (প্রাইমারি)</label>
										<input type="email" id="primary_email" name="primary_email" value="<?= set_value('primary_email');?>"  class="form-control">
									</div>
									<div class="form-group col-3">
										<label for="secondary_email">সেকেন্ডারি ইমেইল</label>
										<input type="email" id="secondary_email" name="secondary_email" value="<?= set_value('secondary_email');?>"  class="form-control">
									</div>
									<div class="form-group col-3">
										<label for="mobile_no">ব্যাক্তিগত মোবাইল নং</label>
										<input type="text" id="mobile_no" name="mobile_no" value="<?= set_value('mobile_no');?>" class="form-control">
									</div>
									<div class="form-group col-3">
										<label for="office_contact_no">দাপ্তরিক ফোন/মোবাইল নং</label>
										<input type="text" id="office_contact_no" name="office_contact_no" value="<?= set_value('office_contact_no');?>" class="form-control">
									</div>
								</div>
								<div class="row">
									<div class="form-group col-3">
										<label for="home_contact_no">আবাসিক ফোন/মোবাইল নং</label>
										<input type="text" id="home_contact_no" name="home_contact_no" value="<?= set_value('home_contact_no');?>" class="form-control">
									</div>
									<div class="form-group col-3">
										<label for="permanent_address">স্থায়ী ঠিকানা</label>
										<textarea id="permanent_address" name="permanent_address" class="form-control" rows="4" cols="70"></textarea>
									</div>
									<div class="form-group col-3">
										<label for="present_address">বর্তমান ঠিকানা</label>
										<textarea id="present_address" name="present_address" class="form-control" rows="4" cols="70"></textarea>
									</div>
								</div>

								<div class="row">
								<div class="form-group col-3">
										<label for="fb_link">ওয়েবসাইট লিঙ্ক</label>
										<input type="text" id="website_url" name="website_url" value="<?= set_value('website_url');?>" class="form-control">
									</div>
									<div class="form-group col-3">
										<label for="fb_link">ফেসবুক প্রোফাইল লিঙ্ক</label>
										<input type="text" id="fb_link" name="fb_link" value="<?= set_value('fb_link');?>" class="form-control">
									</div>
									<div class="form-group col-3">
										<label for="linkedin_link">লিঙ্কডিন প্রোফাইল লিঙ্ক</label>
										<input type="text" id="linkedin_link" name="linkedin_link" value="<?= set_value('linkedin_link');?>"class="form-control">
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- /.col -->
		</div>

		<div class="row">
			<div class="col-12">
				<a href="<?php echo base_url('member') ?>" class="btn btn-secondary">Cancel</a>
				<input type="submit" value="Save and Close" class="btn btn-success float-right">
			</div>
		</div>

		</form>
	</section>
</div>

<script type="text/javascript">
    $(document).ready(function () {
        $('#division_id').change(function () {
            var division_id = $('#division_id').val();
            if (division_id != '') {
                $.ajax({
                    url: "<?php echo base_url(); ?>Location/fetch_district",
                    method: "POST",
                    data: {division_id: division_id},
                    success: function (data) {
                        $('#district_id').html(data);
                        $('#upazila_id').html('<option value="">Select Upazila</option>');
                    }
                });
            } else {
                $('#district_id').html('<option value="">Select District</option>');
                $('#upazila_id').html('<option value="">Select Upazila</option>');
            }
        });

        $('#district_id').change(function () {
            var district_id = $('#district_id').val();
            if (district_id != '') {
                $.ajax({
                    url: "<?php echo base_url(); ?>Location/fetch_upazila",
                    method: "POST",
                    data: {district_id: district_id},
                    success: function (data) {
                        $('#upazila_id').html(data);
                    }
                });
            } else {
                $('#upazila_id').html('<option value="">Select Upazila</option>');
            }
        });
        
		$('#first_joining_ministry_id').change(function () {
            var first_joining_ministry_id = $('#first_joining_ministry_id').val();
            if (first_joining_ministry_id != '') {
                $.ajax({
                    url: "<?php echo base_url(); ?>Department/fetch_department",
                    method: "POST",
                    data: {ministry_id: first_joining_ministry_id},
                    success: function (data) {
                        $('#first_joining_department_id').html(data);
                    }
                });
            } else {
                $('#first_joining_department_id').html('<option value="">নির্বাচন করুন</option>');
            }
        });

		$('#current_ministry_id').change(function () {
            var current_ministry_id = $('#current_ministry_id').val();
            if (current_ministry_id != '') {
                $.ajax({
                    url: "<?php echo base_url(); ?>Department/fetch_department",
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

		$('.datepicker').datepicker({
			autoclose: true,
			format: "yyyy-mm-dd",
			todayHighlight: true,
			orientation: "top auto",
			todayBtn: true,
			todayHighlight: true,
		});
        $('.select2').select2();
    });

</script>



