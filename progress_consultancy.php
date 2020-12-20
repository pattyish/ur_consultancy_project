<?php include 'public/includes/header_link.php';?>
<?php include 'public/includes/layouts/header.php';?>
<?php include 'public/includes/layouts/left_bar_side.php';?>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Consultants
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
                <div class="box" style="padding-left: 5px; padding-right: 5px;">
                <div class="box-header"
                        style="border-bottom: 1px solid rgba(60, 141, 188, 0.3); margin-bottom: 10px;">
                        <h3 class="box-title" style="padding-top: 10px; padding-bottom: 10px;">In Progress
                            Consultacies</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <table id="in_progress_consultancy" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Consultacy Title</th>
                                    <th>Signed Date</th>
                                    <th>Start Date</th>
                                    <th>End Date</th>
                                    <th>Amount</th>
                                    <th>UR(%) Charge</th>
                                    <th>Tax(%) charge</th>
                                    <th>Status</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Tasman</td>
                                    <td>Internet Explorer 4.5</td>
                                    <td>Mac OS 8-9</td>
                                    <td>Mac OS 8-9</td>
                                    <td>Mac OS 8-9</td>
                                    <td>Mac OS 8-9</td>
                                    <td>Mac OS 8-9</td>
                                    <td>Mac OS 8-9</td>
                                    <td>
                                        <div class="btn-group btn-group-sm table-button-div">
                                            <a href="#" data-toggle="modal" data-target=""
                                                class=" btn btn-info table_button">
                                                <i class="fa fa-eye"></i> View
                                            </a>
                                            <a href="#" data-toggle="modal" data-target=""
                                                class=" btn btn-success table_button">
                                                <i class="fa fa-edit"></i> Edit
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>

                        </table>
                    </div>
                </div>
                <!-- /.box-body -->
            </div>
        </div>
        <!-- /.row (main row) -->

    </section>
    <!-- /.content -->
</div>
<!-- footer -->
<?php include "public/includes/footer.php"; ?>