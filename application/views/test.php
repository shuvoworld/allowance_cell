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
						<h1>Update Customer</h1>
					</div>
					<div class="col-sm-6">
						<ol class="breadcrumb float-sm-right">
							<li class="breadcrumb-item"><a href="#">Home</a></li>
							<li class="breadcrumb-item active">Edit Customer</li>
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
							<h3 class="card-title">Edit New Customer</h3>
						</div>
						<!-- /.card-header -->
						<form role="form" action="<?php base_url('Customer/edit')?>" method="post" enctype="multipart/form-data">
							<div class="card-body">
								<?php if (validation_errors()) {?>
									<div class="alert alert-danger">
										<a class="close" data-dismiss="alert">x</a>
										<ul><?php echo (validation_errors('<li>', '</li>')); ?></ul>
									</div>
								<?php }?>
								<div class="row">
									<div class="form-group">
										<label>Image Preview: </label>
										<img src="<?php echo base_url() . $customer_data['image'] ?>" width="150" height="150" class="img-circle">
									</div>
								</div>
								<div class="form-group">
									<label for="product_image">Update Image</label>
									<div class="kv-avatar">
										<div class="file-loading">
											<input id="customer_image" name="customer_image" type="file">
										</div>
									</div>
								</div>

								<div class="row">
									<div class="form-group col-3">
										<label for="groupName">Customer Name</label>
										<input type="text" id="customerName" name="customerName" value="<?php echo $customer_data['customerName'] ?>" class="form-control">
									</div>
									<div class="form-group col-3">
										<label for="groupName">Contact Last Name</label>
										<input type="text" id="contactLastName" name="contactLastName" value="<?php echo $customer_data['contactLastName'] ?>" class="form-control">
									</div>
									<div class="form-group col-3">
										<label for="groupName">Contact First Name</label>
										<input type="text" id="contactFirstName" name="contactFirstName" value="<?php echo $customer_data['contactFirstName'] ?>" class="form-control">
									</div>
									<div class="form-group col-3">
										<label for="groupName">Phone</label>
										<input type="text" id="phone" name="phone" value="<?php echo $customer_data['phone'] ?>" class="form-control">
									</div>
								</div>

								<div class="row">
									<div class="form-group col-6">
										<label for="groupName">Address Line 1</label>
										<input type="text" id="addressLine1" name="addressLine1" value="<?php echo $customer_data['addressLine1'] ?>" class="form-control">
									</div>
									<div class="form-group col-6">
										<label for="groupName">Address Line 1</label>
										<input type="text" id="addressLine2" name="addressLine2" value="<?php echo $customer_data['addressLine2'] ?>" class="form-control">
									</div>
								</div>

								<div class="row">
									<div class="form-group col-3">
										<label for="groupName">Country</label>
										<input type="text" id="country" name="country" value="<?php echo $customer_data['country'] ?>" class="form-control">
									</div>
									<div class="form-group col-3">
										<label for="groupName">City</label>
										<input type="text" id="city" name="city" value="<?php echo $customer_data['city'] ?>" class="form-control">
									</div>
									<div class="form-group col-3">
										<label for="groupName">State</label>
										<input type="text" id="state" name="state" value="<?php echo $customer_data['state'] ?>" class="form-control">
									</div>
									<div class="form-group col-3">
										<label for="groupName">Postal Code</label>
										<input type="text" id="postalCode" name="postalCode" value="<?php echo $customer_data['postalCode'] ?>" class="form-control">
									</div>
								</div>

								<div class="row">
									<div class="form-group col-3">
										<label for="division">Division</label>
										<select name="division_id" id="division_id" class="form-control custom-select" style="width: 100%;">
											<?php foreach ($division as $row) {?>
												<option <?php if ($row->id == $customer_data['division_id']) {echo "selected='selected'";}?> value="<?php echo $row->id; ?>">
													<?php echo $row->name_BN ?>
												</option>';

											<?php }?>
										</select>
									</div>
									<div class="form-group col-3">
										<label for="district_id">District</label>
										<select name="district_id" id="district_id" class="form-control custom-select" style="width: 100%;">
											<option <?php if ($row->id == $customer_data['district_id']) {
    echo "selected='selected'";
}?> value="<?php echo $row->id; ?>">
												<?php echo $row->name_BN ?>
											</option>';
										</select>
									</div>
									<div class="form-group col-3">
										<label for="upazila_id">Upazila</label>
										<select name="upazila_id" id="upazila_id" class="form-control custom-select" style="width: 100%;">
											<option <?php if ($row->id == $customer_data['upazila_id']) {
    echo "selected='selected'";
}?> value="<?php echo $row->id; ?>"><?php echo $row->name_BN ?> </option>';
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
			<!-- Page Heading -->

			<div class="row">
				<div class="col-12">
					<div class="card">
						<div class="card-header">
							<div class="d-inline-block">
								<h3 class="card-title">Degree</h3>
							</div>
							<div class="d-inline-block float-right">
								<a href="javascript:void(0);" class="btn btn-primary" data-toggle="modal" data-target="#Modal_Add"><span class="fa fa-plus"></span>Add New</a>
							</div>
						</div>
						<div class="card-body">
							<table class="table table-striped" id="mydata">
								<thead>
								<tr>
									<th>Customer</th>
									<th>Degree</th>
									<th style="text-align: right;">Actions</th>
								</tr>
								</thead>
								<tbody id="show_data">

								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>

			<div class="row">
				<div class="col-12">
					<div class="card">
						<div class="card-header">
							<div class="d-inline-block">
								<h3 class="card-title"><i class="fa fa-list"></i>&nbsp; Manage Employees (Grocery CRUDImplementation)</h3>
							</div>
						</div>
						<div class="card-body">
							<?php echo $output; ?>

						</div>
					</div>
				</div>
			</div>


			<div class="row">
				<div class="col-12">
					<a href="<?php echo base_url('customer') ?>" class="btn btn-secondary">Cancel</a>
					<input type="submit" value="Save and Close" class="btn btn-success float-right">
				</div>
			</div>
</form>
			<!-- /.row -->
		</section>
		<!-- /.content -->
	</section>
</div>

<!-- MODAL ADD -->
<form>
	<div class="modal fade" id="Modal_Add" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-lg" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Add New Degree</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<div class="form-group row">
						<label class="col-md-2 col-form-label">Customer ID</label>
						<div class="col-md-10">
							<input type="text" name="customer_id" id="customer_id" class="form-control" placeholder="Customer">
						</div>
					</div>
					<div class="form-group row">
						<label class="col-md-2 col-form-label">Degree</label>
						<div class="col-md-10">
							<input type="text" name="degree" id="degree" class="form-control" placeholder="Degree">
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
					<button type="button" type="submit" id="btn_save" class="btn btn-primary">Save</button>
				</div>
			</div>
		</div>
	</div>
</form>
<!--END MODAL ADD-->


<!-- MODAL EDIT -->
<form>
	<div class="modal fade" id="Modal_Edit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-lg" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Edit Degree</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<div class="form-group row">
						<label class="col-md-2 col-form-label">Customer ID</label>
						<div class="col-md-10">
							<input type="text" name="customer_id" id="customer_id" class="form-control" placeholder="Customer ID" readonly>
						</div>
					</div>

					<div class="form-group row">
						<label class="col-md-2 col-form-label">Degree</label>
						<div class="col-md-10">
							<input type="text" name="degree" id="degree" class="form-control" placeholder="Degree">
						</div>
					</div>

				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
					<button type="button" type="submit" id="btn_update" class="btn btn-primary">Update</button>
				</div>
			</div>
		</div>
	</div>
</form>
<!--END MODAL EDIT-->


<script type="text/javascript">
    $(document).ready(function () {
        var btnCust = '';
        $("#customer_image").fileinput({
            overwriteInitial: true,
            maxFileSize: 1500,
            showClose: false,
            showCaption: false,
            browseLabel: 'Browse',
            removeLabel: 'Remove',
            browseIcon: 'Image',
            removeIcon: 'Remove',
            removeTitle: 'Cancel or reset changes',
            elErrorContainer: '#kv-avatar-errors-1',
            msgErrorClass: 'alert alert-block alert-danger',
            // defaultPreviewContent: '<img src="/uploads/default_avatar_male.jpg" alt="Your Avatar">',
            layoutTemplates: {
                main2: '{preview} ' + btnCust + ' {remove} {browse}'
            },
            allowedFileExtensions: ["jpg", "png"]
        });


        var customer_id = <?php echo $this->uri->segment('3') ?>;

        show_degree(); //call function show all product

        $('#mydata').dataTable();

        //function show all product
        function show_degree() {
            $.ajax({
                type: 'POST',
                url: '<?php echo site_url('customerdegree/get_data') ?>',
                async: true,
                data: {customer_id: customer_id},
                dataType: 'json',
                success: function (data) {
                    var html = '';
                    var i;
                    for (i = 0; i < data.length; i++) {
                        html += '<tr>' +
                            '<td>' + data[i].customer_id + '</td>' +
                            '<td>' + data[i].degree + '</td>' +
                            '<td style="text-align:right;">' +
                            '<a href="javascript:void(0);" class="btn btn-info btn-sm item_edit" data-id="' + data[i].id + '" data-degree="' + data[i].degree + '">Edit</a>' + ' ' +
                            '<a href="javascript:void(0);" class="btn btn-danger btn-sm item_delete" data-id="' + data[i].id + '">Delete</a>' +
                            '</td>' +
                            '</tr>';
                    }
                    $('#show_data').html(html);
                }

            });
        }

        //Save product
        $('#btn_save').on('click', function () {
            var customer_id = $('#customer_id').val();
            var degree = $('#degree').val();
            $.ajax({
                type: "POST",
                url: "<?php echo site_url('customerdegree/save') ?>",
                dataType: "JSON",
                data: {customer_id: customer_id, degree: degree},
                success: function (data) {
                    $('[name="customer_id"]').val("");
                    $('[name="degree"]').val("");
                    $('#Modal_Add').modal('hide');
                    show_degree();
                }
            });
            return false;
        });

        //get data for update record
        $('#show_data').on('click', '.item_edit', function () {
            var customer_id = $(this).data('customer_id');
            var degree = $(this).data('degree');

            $('#Modal_Edit').modal('show');
            $('[name="customer_id_edit"]').val(customer_id);
            $('[name="degree_edit"]').val(degree);
        });


        //update record to database


        $('#btn_update').on('click', function () {
            var product_code = $('#customer_id_edit').val();
            var product_name = $('#degree_edit').val();
            $.ajax({
                type: "POST",
                url: "<?php echo site_url('customerdegree/update') ?>",
                dataType: "JSON",
                data: {product_code: product_code, product_name: product_name, price: price},
                success: function (data) {
                    $('[name="product_code_edit"]').val("");
                    $('[name="product_name_edit"]').val("");
                    $('[name="price_edit"]').val("");
                    $('#Modal_Edit').modal('hide');
                    show_product();
                }
            });
            return false;
        });

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
    });

</script>
