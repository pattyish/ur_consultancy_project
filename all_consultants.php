<?php include 'public/includes/header_link.php';?>
<?php include 'public/includes/layouts/header.php';?>
<?php include 'public/includes/layouts/left_bar_side.php';?>

<script>
$(document).ready(function()
{
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
        <div class="btn-group btn-group-sm table-button-div" style="margin-top: 15px;">
            <a href="disable_consultants.php" class=" btn btn-warning table_button">
                Disabled Consultants
            </a>
            <a href="add_consultant.php" class=" btn btn-info table_button">
                <i class="fa fa-plus"></i> Add Consultants
            </a>
        </div>
        <ol class="breadcrumb" style="margin-top: 15px;">
            <li><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Consultants</li>
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
                        <h3 class="box-title" style="padding-top: 10px; padding-bottom: 10px;">All Consultants 
                        &nbsp;<span class="pull-right-container">
                                <small class="label pull-right bg-blue" id="showTotalCslts"></small>
                            </span></h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <table id="all_consultants" class="table table-bordered table-striped">
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

                                <?php include 'backend/existingConsultants.php'; ?>
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