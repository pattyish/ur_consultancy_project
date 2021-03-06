<?php include 'public/includes/header_link.php';?>
<?php include 'public/includes/layouts/header.php';?>
<?php include 'public/includes/layouts/left_bar_side.php';?>

<script>
$(document).ready(function() {
    var totalClients = $("#totalClients").val();
    $("#showTotalClients").html(totalClients);
});
</script>

<!-- below ul tag is to help us load new sms automatically -->
<ul class="users-list clearfix" id="userToChatWith" style="display: none;">
</ul>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="btn-group btn-group-sm table-button-div" style="margin-top: 15px;">
            <form method="post" action="export_excel.php">
                <!-- <button type="submit" name="export_excel" class=" btn btn-warning table_button">Export Excel</button> -->
            </form>
        </div>

        <ol class="breadcrumb">
            <li><a href="Home"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Dashboard</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content" style="margin-top: 15px;">
        <!-- Main row -->
        <div class="row">
            <div class="col-md-12">
                <div class="box" style="padding-left: 5px; padding-right: 5px;">
                    <div class="box-header"
                        style="border-bottom: 1px solid rgba(60, 141, 188, 0.3); margin-bottom: 10px;">
                        <h3 class="box-title" style="padding-top: 10px; padding-bottom: 10px;">All Clients
                            &nbsp;<span class="pull-right-container">
                                <small class="label pull-right bg-blue" id="showTotalClients"></small>
                            </span></h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <table id="all_clients" class="table table-bordered table-striped">
                            <thead>
                                <tr class="text-blue">
                                    <th>Client Name</th>
                                    <th>Client Email</th>
                                    <th>Country</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <?php include 'backend/existingClients.php'; ?>
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