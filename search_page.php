<?php include 'public/includes/header_link.php';?>
<?php include 'public/includes/layouts/header.php';?>
<?php include 'public/includes/layouts/left_bar_side.php';?>

<!-- below ul tag is to help us load new sms automatically -->
<ul class="users-list clearfix" id="userToChatWith" style="display: none;">
</ul>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>

        </h1>
        <ol class="breadcrumb">
            <li><a href="Home"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Search</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content" style="margin-top:20px;">
        <!-- Main row -->
        <div class="row">
            <div class="col-md-12">
                <div class="box" style="background: white;">
                    <!-- <div class="box-header with-border">
                        <h3 class="box-title">Add New Consultant</h3>
                    </div> -->
                    <div class="box-body">
                        <div class="col-md-3">
                            <input type="text" class="form-control" id="clientName" placeholder="Name">
                        </div>
                        <div class="col-md-3">
                            <input type="text" class="form-control" id="clientName" placeholder="Name">
                        </div>
                        <div class="col-md-3">
                            <input type="text" class="form-control" id="clientName" placeholder="Name">
                        </div>
                        <div class="col-md-3">
                            <input type="text" class="form-control" id="clientName" placeholder="Name">
                        </div>
                    </div>
                </div>
                <!-- /.box -->
            </div>
        </div>
        <div class="row" style="padding: 20px; background: white; margin: auto;">
            <div class="col-md-12 table-responsive">
                <table id="search_table" class="table table-bordered table-striped">
                    <thead>
                        <tr class="text-blue">
                            <th>Names</th>
                            <th>National ID</th>
                            <th>Email Address</th>
                            <th>Department</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tbody>

                </table>
            </div>
        </div>
        <!-- /.row (main row) -->

    </section>
    <!-- /.content -->
</div>
<!-- footer -->
<?php include "public/includes/footer.php"; ?>