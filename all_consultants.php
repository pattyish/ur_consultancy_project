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
                        <h3 class="box-title" style="padding-top: 10px; padding-bottom: 10px;">All Consultants</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <table id="all_consultants" class="table table-bordered table-striped">
                            <thead>
                                <tr class="text-blue">
                                    <th>Names</th>
                                    <th>Gender</th>
                                    <th>National ID</th>
                                    <th>Email Address</th>
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