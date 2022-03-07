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
                        <li class="breadcrumb-item active">পাসওয়ার্ড পরিবর্তন</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <section class="content">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">পাসওয়ার্ড পরিবর্তন করুন</h3>
                    </div>
                    <?php echo form_open(base_url('member/change_password'), 'class="form-horizontal"'); ?>
                    <?php if (validation_errors()) {?>
                    <div class="alert alert-danger">
                        <a class="close" data-dismiss="alert">x</a>
                        <ul><?php echo (validation_errors('<li>', '</li>')); ?></ul>
                    </div>
                    <?php }?>
                    <div class="card-body">
                        <div class="row">
                            <div class="form-group col-3">
                                <label for="password" class="col-sm-3 control-label">পাসওয়ার্ড</label>
                                <input type="password" name="password" class="form-control" id="password"
                                    placeholder="">
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-3">
                                <label for="confirm_pwd" class="col-sm-3 control-label">পাসওয়ার্ড কনফার্ম করুন</label>
                                <input type="password" name="confirm_pwd" class="form-control" id="confirm_pwd"
                                    placeholder="">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <input type="submit" value="Submit" class="btn btn-success float-right">
                            </div>
                        </div>
                        <?php echo form_close(); ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>