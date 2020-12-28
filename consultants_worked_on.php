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
<?php
$consultancy_id = $_GET['consultancy_id'];
$getConsultancy = "SELECT * FROM consultancy WHERE consultancy.consultancy_id = $consultancy_id";
$getConsultancy = mysqli_query($connect,$getConsultancy);
while($lineConsultancy = mysqli_fetch_object($getConsultancy))
{
    // consultant
    $consultancy_name = $lineConsultancy -> consultancy_name;
}
// select all people worked on consultancy
$retrieve = "SELECT * FROM consultant_contract INNER JOIN users INNER JOIN 
consultancy INNER JOIN department INNER JOIN school ON consultant_contract.contract_consultancy_id = consultancy.consultancy_id AND 
consultant_contract.contract_consultant_id = users.user_id AND users.user_department = department.department_id AND department.school_id = school.school_id WHERE
 consultant_contract.contract_consultancy_id = $consultancy_id";
$retrieve = mysqli_query($connect,$retrieve);
$retrieveCount = mysqli_num_rows($retrieve);
?>
<!-- below ul tag is to help us load new sms automatically -->
<ul class="users-list clearfix" id="userToChatWith" style="display: none;">
</ul>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="btn-group btn-group-sm table-button-div" style="margin-top: 15px;">
            <a href="progress_consultancy.php" style="font-size: 15px;" class=" btn btn-primary table_button">
            <i class="fa fa-angle-left" ></i> back
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
                        <h3 class="box-title" style="padding-top: 10px; padding-bottom: 10px;">All Consultants assigned to  
                        "<span class="text-blue text-bold"><?php echo $consultancy_name; ?></span>" 
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
                                    <th>Email Address</th>
                                    <th>Contract Amount</th>
                                    <th>Department</th>
                                    <th>School</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                                if($retrieveCount > 0)
                                {
                                    while($lineRetrieve = mysqli_fetch_object($retrieve))
                                    {
                                        // consultant
                                        $user_id = $lineRetrieve -> user_id;
                                        $user_first_name = $lineRetrieve -> user_first_name;
                                        $user_last_name = $lineRetrieve -> user_last_name;
                                        $user_national_id = $lineRetrieve -> user_national_id;
                                        $user_email = $lineRetrieve -> user_email;
                                        $user_type_id = $lineRetrieve -> user_type_id;
                                        $department_name = $lineRetrieve -> department_name;
                                        $school_name = $lineRetrieve -> school_name;
                                        // consultancy
                                        $consultancy_name = $lineRetrieve -> consultancy_name;
                                        // contract
                                        $contract_amount = $lineRetrieve -> contract_amount;
                                        $contract_sign_date = $lineRetrieve -> contract_sign_date;
                                        $contract_start_date = $lineRetrieve -> contract_start_date;
                                        $contract_end_date = $lineRetrieve -> contract_end_date;
                                    }
                                }
                            ?>
                                <tr>
                                <td><?php echo $user_first_name." ".$user_last_name; ?></td>
                                <td><?php echo $user_email; ?></td>
                                <td><?php if($user_id == $myId || $MYUserType != 3){ echo $contract_amount;}else{ echo "Private";} ?></td>
                                <td><?php echo $department_name; ?></td>
                                <td><?php echo $school_name; ?></td>
                                <td>Buttons</td>
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