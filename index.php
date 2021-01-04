<?php include 'public/includes/header_link.php';?>
<?php include 'public/includes/layouts/header.php';?>
<?php include 'public/includes/layouts/left_bar_side.php';?>


<?php 
// count all numbers needed on the dashboard
//Count all active consultants.
$retrieveCounsultants = "SELECT * FROM users WHERE users.user_status_id = 1 ";
$retrieveCounsultants = mysqli_query($connect,$retrieveCounsultants);
$retrieveConsultantsCount = mysqli_num_rows($retrieveCounsultants);

//Count all disabled consultants.
$retrieveDCounsultants = "SELECT * FROM users WHERE users.user_status_id = 2 ";
$retrieveDCounsultants = mysqli_query($connect,$retrieveDCounsultants);
$retrieveDConsultantsCount = mysqli_num_rows($retrieveDCounsultants);

//Count all ongoing consultancies.
$retrieveOConsultancies = "SELECT * FROM consultancy WHERE consultancy.consultancy_progress = 1";
$retrieveOConsultancies = mysqli_query($connect,$retrieveOConsultancies);
$retrieveOConsultanciesCount = mysqli_num_rows($retrieveOConsultancies);

//Count all completed consultancies.
$retrieveCConsultancies = "SELECT * FROM consultancy WHERE consultancy.consultancy_progress = 2";
$retrieveCConsultancies = mysqli_query($connect,$retrieveCConsultancies);
$retrieveCConsultanciesCount = mysqli_num_rows($retrieveCConsultancies);

//Count all active clients.
$retrieveClients = "SELECT * FROM client WHERE client.client_status = 1;";
$retrieveClients= mysqli_query($connect,$retrieveClients);
$retrieveClientsCount = mysqli_num_rows($retrieveClients); 

//Count all disabled clients.
$retrieveDClients = "SELECT * FROM client WHERE client.client_status = 2;";
$retrieveDClients= mysqli_query($connect,$retrieveDClients);
$retrieveDClientsCount = mysqli_num_rows($retrieveDClients);
?>

<!-- below ul tag is to help us load new sms automatically -->
<ul class="users-list clearfix" id="userToChatWith" style="display: none;">
</ul>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
    
        </h1>
        <ol class="breadcrumb">
            <li><a href="Home"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Dashboard</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content" style="margin-top:20px;">
        <!-- Small boxes (Stat box) -->
        <div class="row">
            <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-green">
                    <div class="inner">
                        <h3><?php echo $retrieveConsultantsCount; ?></h3>

                        <p style="font-size: 17px; font-weight: bold;">Active Consultants</p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-users"></i>
                    </div>
                    <?php
                    if($MYUserType != 3)
                    {
                        ?>
                        <a href="ActiveConsultants" class="small-box-footer text-bold">View the list <i class="fa fa-arrow-circle-right"></i></a>
                        <a href="NewConsultant" class="small-box-footer text-bold">Add new <i class="fa fa-plus" aria-hidden="true"></i></a>
                        <?php
                    }
                    ?>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-yellow">
                    <div class="inner">
                        <h3><?php echo $retrieveDConsultantsCount; ?></h3>

                        <p style="font-size: 17px; font-weight: bold;"> Disabled Consultants</p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-archive"></i>
                    </div>
                    <?php
                    if($MYUserType != 3)
                    {
                        ?>
                        <a href="ConsultancyDisabled" class="small-box-footer text-bold">View the list <i class="fa fa-arrow-circle-right"></i></a>
                        <?php
                    }
                    ?>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-primary">
                    <div class="inner">
                        <h3><?php echo $retrieveOConsultanciesCount; ?></h3>

                        <p style="font-size: 17px; font-weight: bold;">In progress Consultancies</p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-spinner"></i>
                    </div>
                    <a href="TasksInProgress" class="small-box-footer text-bold">View the list <i class="fa fa-arrow-circle-right"></i></a>
                    <?php
                    if($MYUserType != 3)
                    {
                        ?>
                        <a href="NewConsultancy" class="small-box-footer text-bold">Add new <i class="fa fa-plus" aria-hidden="true"></i></a>
                        <?php
                    }
                    ?>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-green">
                    <div class="inner">
                        <h3><?php echo $retrieveCConsultanciesCount; ?></h3>

                        <p style="font-size: 17px; font-weight: bold;">Completed Consultancies</p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-users"></i>
                    </div>
                    <a href="AllCompletedTasks" class="small-box-footer text-bold">View the list <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
        </div>

        <br><br><br>
        <div class="row">
            <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-green">
                    <div class="inner">
                        <h3><?php echo $retrieveClientsCount; ?></h3>

                        <p style="font-size: 17px; font-weight: bold;">Active Clients</p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-users"></i>
                    </div>
                    <a href="ActiveClients" class="small-box-footer text-bold">View the list <i class="fa fa-arrow-circle-right"></i></a>
                    <?php
                    if($MYUserType != 3)
                    {
                        ?>
                        <a href="NewClient" class="small-box-footer text-bold">Add new <i class="fa fa-plus" aria-hidden="true"></i></a>
                        <?php
                    }
                    ?>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-yellow">
                    <div class="inner">
                        <h3><?php echo $retrieveDClientsCount; ?></h3>

                        <p style="font-size: 17px; font-weight: bold;"> Disabled Clients</p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-archive"></i>
                    </div>
                    <?php
                    if($MYUserType != 3)
                    {
                        ?>                    
                        <a href="ClientsDisabled" class="small-box-footer text-bold">View the list <i class="fa fa-arrow-circle-right"></i></a>
                        <?php
                    }
                    ?>
                </div>
            </div>
        </div>

    </section>
    <!-- /.content -->
</div>
<?php include "public/includes/footer.php"; ?>