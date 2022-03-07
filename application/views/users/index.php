<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-12">
					<ol class="breadcrumb float-sm-right">
						<li class="breadcrumb-item"><a href="#">Home</a></li>
						<li class="breadcrumb-item active">Customers</li>
					</ol>
				</div>
			</div>
	</section>

	<!-- Main content -->
	<section class="content">
		<div class="row">
			<div class="col-12">
				<div class="card">
					<div class="card-header">
						<div class="d-inline-block">
							<h3 class="card-title"><i class="fa fa-list"></i>&nbsp; Manage Users (Ion Auth Implementation)</h3>
						</div>
						<div class="d-inline-block float-right">
							<?php if (in_array('createUser', $this->permission)) { ?>
							<div class="d-inline-block float-right"><a href="<?= base_url('User/create'); ?>" class="btn btn-success"><i class="fa fa-plus"></i> Add User</a>
								<?php } ?>
							</div>
						</div>
					</div>
					<div class="card-body">
						<table id="userTable" class="table table-bordered table-hover">
							<thead>
								<th>ID</th>
								<th>Username</th>
								<th>Member</th>
								<th>email</th>
								<th>Action</th>
							</thead>
							<tbody>
							</tbody>
							<tfoot>
							<tr>
								<th>ID</th>
								<th>Username</th>
								<th>Member</th>
								<th>email</th>
								<th>Action</th>
							</tr>
							</tfoot>
						</table>
					</div>
				</div>
				<!-- /.card-body -->
			</div>
			<!-- /.card -->
		</div>
		<!-- /.col -->
	</section>
</div>
<script type="text/javascript">
    var manageTable;
    var base_url = "<?php echo base_url(); ?>";

    $(document).ready(function () {
        manageTable = $('#userTable').DataTable({
            dom: 'Bfrtip',
            buttons: [{
                extend: 'copy',
                text: 'Copy',
                className: 'btn btn-info float-sm-left'
            },
                {
                    extend: 'excel',
                    text: 'Excel',
                    className: 'btn btn-warning float-sm-left'
                }
            ],
            'ajax': base_url + 'User/fetchUserData',
            'order': []
        });

    });

    function reload_table() {
        manageTable.ajax.reload(null, false); //reload datatable ajax
    }

$(document).on('click', '.delete', function (e) {
        var userId = $(this).attr('id');
        SwalDelete(userId);
        e.preventDefault();
    });

    function SwalDelete(userId) {
        swal({
            title: 'Are you sure to delete userID: ' + userId + '?',
            text: "You won't be able to revert this!",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!',
            showLoaderOnConfirm: true,

        }, function () {
            $.ajax({
                url: base_url + 'User/delete',
                type: 'POST',
                data: 'id=' + userId,
                dataType: 'text'
            })
                .done(function (response) {
                    swal('User Deleted Successfully!', response.message, response.status);
                    reload_table();
                })
                .fail(function () {
                    swal('Oops...', 'Something went wrong with ajax !', 'error');
                });
        });
    }
</script>
