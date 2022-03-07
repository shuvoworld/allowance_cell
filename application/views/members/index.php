<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-12">
					<ol class="breadcrumb float-sm-right">
						<li class="breadcrumb-item"><a href="#">Home</a></li>
						<li class="breadcrumb-item active">Members</li>
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
							<h3 class="card-title"><i class="fa fa-list"></i>&nbsp; Manage Members</h3>
						</div>
						<div class="d-inline-block float-right">
							<?php if (in_array('createMember', $this->permission)) { ?>
							<div class="d-inline-block float-right"><a href="<?= base_url('Member/create'); ?>" class="btn btn-success"><i class="fa fa-plus"></i> Add Member</a>
								<?php } ?>
							</div>
						</div>
					</div>
					<div class="card-body">
						<table id="memberTable" class="table table-bordered table-hover">
							<thead>
							<th>মেম্বারশিপ আইডি</th>
							<th>নাম</th>
							<th>মোবাইল</th>
							<th>ইমেইল</th>
							<th>বর্তমান পদবী</th>
							<th>বর্তমান মন্ত্রণালয়/দপ্তর</th>
							<th>স্ট্যাটাস</th>
							<th>Action</th>
							</thead>
							<tbody>
							</tbody>
							<tfoot>
							<tr>
								<th>মেম্বারশিপ আইডি</th>
								<th>নাম</th>
								<th>মোবাইল</th>
								<th>ইমেইল</th>
								<th>বর্ত্মান পদবী</th>
								<th>বর্তমান মন্ত্রণালয়/দপ্তর</th>
								<th>স্ট্যাটাস</th>
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
        manageTable = $('#memberTable').DataTable({
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
            'ajax': base_url + 'Member/fetchMemberData',
            'order': []
        });

    });

    function reload_table() {
        manageTable.ajax.reload(null, false); //reload datatable ajax
    }

    $(document).on('click', '.delete', function (e) {
        var memberID = $(this).attr('id');
        SwalDelete(memberID);
        e.preventDefault();
    });

    function SwalDelete(MemberId) {
        swal({
            title: 'Are you sure to delete Member: ' + memberID + '?',
            text: "You won't be able to revert this!",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!',
            showLoaderOnConfirm: true,

        }, function () {
            $.ajax({
                url: base_url + 'Member/delete',
                type: 'POST',
                data: 'id=' + memberID,
                dataType: 'text'
            })
                .done(function (response) {
                    swal('Deleted!', response.message, response.status);
                    reload_table();
                })
                .fail(function () {
                    swal('Oops...', 'Something went wrong with ajax !', 'error');
                });
        });
    }

</script>
