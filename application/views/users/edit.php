<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<h1>Create Customer</h1>
				</div>
				<div class="col-sm-6">
					<ol class="breadcrumb float-sm-right">
						<li class="breadcrumb-item"><a href="index.php">Home</a></li>
						<li class="breadcrumb-item active">Update</li>
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
						<h3 class="card-title">Update User</h3>
					</div>
					<!-- /.card-header -->
					<form role="form" action="<?php base_url('User/edit') ?>" method="post" enctype="multipart/form-data">
						<?php
//				print_r($user_data);
//				die();
				?>
						<div class="card-body">
							<?php if (validation_errors()) { ?>
								<div class="alert alert-danger">
									<a class="close" data-dismiss="alert">x</a>
									<ul><?php echo(validation_errors('<li>', '</li>')); ?></ul>
								</div>
							<?php } ?>
							<div class="row">
								<div class="form-group col-3">
									<label for="groupName">Email</label>
									<input type="text" id="email" name="email" value="<?php echo $user_data['email'] ?>" class="form-control">
								</div>
								
								<div class="form-group col-3">
									<label for="groupName">Password</label>
									<input type="password" id="password" name="password" class="form-control">
								</div>
							</div>

							<div class="row">
								<div class="form-group col-3">
									<label for="member_id">Member</label>
									<select name="member_id" id="member_id" class="form-control select2" style="width: 100%;">
										<option value="">Select Member</option>
										<?php foreach ($members as $row) { ?>
											<option <?php if ($row['id'] == $user_data['member_id']) {
												echo "selected='selected'";
											} ?> value="<?php echo $row['id']; ?>">
												<?php echo $row['name_BN'] ?>
											</option>';

										<?php } ?>
									</select>
								</div>

								<div class="form-group col-3">
									<label for="group_id">Group</label>
									<select name="group_id" id="group_id" class="form-control select2" style="width: 100%;">
										<option value="">Select Group</option>
										<?php foreach ($group as $row) { ?>
											<option <?php if ($row['id'] == $user_data['group_id']) {
												echo "selected='selected'";
											} ?> value="<?php echo $row['id']; ?>">
												<?php echo $row['name'] ?>
											</option>';

										<?php } ?>
									</select>
								</div>
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
				<a href="<?php echo base_url('user') ?>" class="btn btn-secondary">Cancel</a>
				<input type="submit" value="Save and Close" class="btn btn-success float-right">
			</div>
		</div>

		</form>
	</section>
</div>

<script type="text/javascript">
 $(document).ready(function () {
    $('.select2').select2();
});
</script>