<?php include 'public/includes/header_link.php';?>
<?php include 'public/includes/layouts/header.php';?>
<?php include 'public/includes/layouts/left_bar_side.php';?>
<script>

</script>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Register Consultant
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Dashboard</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <!-- Main row -->
        <div class="row">
            <div class="col-md-12">
                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">Add New Consultant</h3>
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->
                    <form role="form" id="saveConsultant">
                        <div class="box-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">First-name</label>
                                        <input type="text" class="form-control" id="fName" placeholder="Enter First-name">
                                    </div>
                                    <div class="form-group">
                                        <label for="">Last-name</label>
                                        <input type="text" class="form-control" id="lName" placeholder="Enter Password">
                                    </div>
                                    <div class="form-group">
                                        <label for="">Gender</label>
                                        <select id="gender" class=form-control>
                                            <option>Select Gender</option>
                                            <option>Male</option>
                                            <option>Female</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="">National Id</label>
                                        <input type="text" class="form-control" id="natId" placeholder="Enter Id Number">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Email address</label>
                                        <input type="email" class="form-control" id="userEmail"
                                            placeholder="Enter email">
                                    </div>
                                    <div class="form-group">
                                        <label for="">User Type </label>
                                        <select id="userType" class=form-control>
                                            <option>Select Type</option>
                                        <?php
                                        include 'backend/getUserTypes.php';
                                        ?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Country</label>
                                        <select class="form-control select2" id="country" multiple="multiple"
                                            data-placeholder="Select a State" style="width: 100%;">
                                            <?php include 'backend/getCountries.php'; ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /.box-body -->

                        <div class="box-footer">
                            <button type="submit" id="saveCons" class="btn btn-primary">Save User</button> <br>
                            <span id="feedback"> </span>
                        </div>
                    </form>
                </div>
                <!-- /.box -->
            </div>
        </div>
        <!-- /.row (main row) -->

    </section>
    <!-- /.content -->
</div>
<!-- footer -->
<?php include "public/includes/footer.php"; ?>