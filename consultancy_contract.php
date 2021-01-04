<?php include 'public/includes/header_link.php';?>
<?php include 'public/includes/layouts/header.php';?>
<?php include 'public/includes/layouts/left_bar_side.php';?>

<ul class="users-list clearfix" id="userToChatWith" style="display: none;">
</ul>

<script>
$(document).ready(function() {
    var totalConsultants = $("#totalConsultants").val();
    $("#showTotalCslts").html(totalConsultants);
});
</script>
<!-- below ul tag is to help us load new sms automatically -->
<ul class="users-list clearfix" id="userToChatWith" style="display: none;">
</ul>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <ol class="breadcrumb" style="margin-top: 15px;">
            <li><a href="Home"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Consultants</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content" style="margin-top: 35px;">
        <!-- Main row -->
        <div class="row">
            <div class="col-md-12">
                <div class="box" style="padding-left: 5px; padding-right: 5px;">
                    <div class="box-header"
                        style="border-bottom: 1px solid rgba(60, 141, 188, 0.3); margin-bottom: 10px;">
                        <h3 class="box-title" style="padding-top: 10px; padding-bottom: 10px;">All Consultants assigned
                            to
                            "<span class="text-blue text-bold"></span>"
                            &nbsp;<span class="pull-right-container">
                                <small class="label pull-right bg-blue" id="showTotalCslts"></small>
                            </span></h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div>
                            <table id="all_consultants" class="table table-bordered table-striped">
                                <thead>
                                    <tr class="text-blue">
                                        <th>Names</th>
                                        <th>Email Address</th>
                                        <th>Contract Amount</th>
                                        <th>Department</th>
                                        <th>School</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td>1</td>
                                        <td>1</td>
                                        <td>1</td>
                                        <td>1</td>
                                        <td>
                                            <div class="btn-group btn-group-sm table-button-div">
                                                <a href="#" data-toggle="modal" data-target="#"
                                                    class=" btn btn-info table_button">
                                                    <i class="fa fa-eye"></i> View
                                                </a>
                                            </div>
                                            <?php include 'models/view_contract.php'; ?>
                                        </td>
                                    </tr>
                                </tbody>

                            </table>
                        </div>
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