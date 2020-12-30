<?php include 'public/includes/header_link.php';?>
<?php include 'public/includes/layouts/header.php';?>
<?php include 'public/includes/layouts/left_bar_side.php';?>

<ul class="users-list clearfix" id="userToChatWith" style="display: none;">
</ul>

<?php 
include 'backend/Database.php';
$consultancy_id = $_GET['consultancy_id'];
$userNatId = $_GET['userNatId'];

// get information about the user chosen
$getConsultant = "SELECT * FROM users INNER JOIN user_type INNER JOIN department ON 
users.user_type_id = user_type.user_type_id AND users.user_department = department.department_id
WHERE users.user_status_id = 1 AND users.user_national_id = '$userNatId' ";
$getConsultant = mysqli_query($connect,$getConsultant);
$getConsultantCount = mysqli_num_rows($getConsultant);
if($getConsultantCount > 0)
{
    while($getConsultantLine = mysqli_fetch_object($getConsultant))
    {
        $user_id = $getConsultantLine -> user_id;
        $fName = $getConsultantLine -> user_first_name;
        $lName = $getConsultantLine -> user_last_name;
        $gender = $getConsultantLine -> user_gender;
        $natId = $getConsultantLine -> user_national_id;
        $email = $getConsultantLine -> user_email;
        $department = $getConsultantLine -> department_name;
    }
}
// query to retrieve all existing consultants and show them in table with possible options
$retrieve = "SELECT * FROM consultancy INNER JOIN client INNER JOIN consultancy_progress ON
consultancy.consultancy_client_id = client.client_id AND 
consultancy.consultancy_progress = consultancy_progress.consultancy_progress_id WHERE 
consultancy.consultancy_progress = 1 AND consultancy.consultancy_id = $consultancy_id";
$retrieve = mysqli_query($connect,$retrieve);
$retrieveCount = mysqli_num_rows($retrieve);
if($retrieveCount > 0)
{
    while($lineRetrieve = mysqli_fetch_object($retrieve))
    {
        $consultancy_id = $lineRetrieve -> consultancy_id;
        $consultancy_name = $lineRetrieve -> consultancy_name;
        $consultancy_sign_date = $lineRetrieve -> consultancy_sign_date;
        $consultancy_start_date = $lineRetrieve -> consultancy_start_date;
        $consultancy_end_date = $lineRetrieve -> consultancy_end_date;
        $consultancy_amount = $lineRetrieve -> consultancy_amount;
        $consultancy_currency = $lineRetrieve -> consultancy_currency;
        $consultancy_UR_percentage = $lineRetrieve -> consultancy_UR_percentage;
        $consultancy_Tax_percentage = $lineRetrieve -> consultancy_Tax_percentage;
        $consultancy_consultants_percentage = $lineRetrieve -> consultancy_consultants_percentage;
        $consultancy_progress = $lineRetrieve -> consultancy_progress_name;
        $client = $lineRetrieve -> client_name;
        $client_id = $lineRetrieve -> client_id;
    }
}
        ?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>

        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Dashboard</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content" style="margin-top: 20px;">
        <!-- Main row -->
        <div class="row">
            <div class="col-md-12">
                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title text-blue"><?php echo "Contract of <b>".$fName." ".$lName."</b> to <b>".$consultancy_name."</b>"; ?></h3>
                    </div>
                    <form class="form" id="signContractForm">
                        <div class=""
                            style="padding: 20px; border: 1px solid rgba(60, 141, 188, 0.3); border-radius: 5px;">
                            <legend style="font-weight: bold;"> Consultancy Details </legend>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">Consultance-Name</label>
                                        <input type="text" id="consultancy_name"
                                            value="<?php echo $consultancy_name; ?>"
                                            placeholder="Consultancy Title......" class="form-control" disabled> 
                                            <input type="hidden" id="consultancy_id"
                                            value="<?php echo $consultancy_id; ?>">
                                    </div>
                                    <div class="form-group">
                                    <?php $now = date("Y-m-d h:i:m"); ?>
                                        <label for="">Contract-Sign-Date</label>
                                        <input type="text" id="sign_date" value="<?php echo $now; ?>"
                                            class="form-control" disabled>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Currency</label>
                                        <input type="text" id="currency" name="currency" placeholder="Cash......"
                                            value="RWF<?php // echo $consultancy_currency; ?>" class="form-control" disabled>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">Total-Amount</label>
                                        <input type="number" id="amount" placeholder="Cash......" value=""
                                            class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label for="">Contract-Start-Date</label>
                                        <input type="date" min="<?php echo $consultancy_start_date; ?>" max="<?php echo $consultancy_end_date; ?>" id="start_date" value="" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label for="">Contract-End-Date</label>
                                        <input type="date" id="end_date" min="<?php echo $consultancy_start_date; ?>" max="<?php echo $consultancy_end_date; ?>" value="" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <legend style="font-weight: bold;"> Consultant Information </legend>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="">Consultant-Name</label>
                                                <input type="text" id="consultant" name="consultant"
                                                    placeholder="Consultant-Name......"
                                                    value="<?php echo $fName." ".$lName; ?>" class="form-control" disabled>
                                                    <input type="hidden" id="consultant_id" value="<?php echo $user_id; ?>">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="">Consultant-Department</label>
                                                <input type="text" id="consultant" name="consultant"
                                                    placeholder="Consultant-Department......"
                                                    value="<?php echo $department; ?>" class="form-control"
                                                    disabled>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12 text-left">
                                    <button type="submit" class="btn btn-success"
                                        style="padding: 7px; font-size: 15px;">Sign Contract</button>
                                    &nbsp; &nbsp; <span style="font-size: 15px;" id="signContractFeedback"></span>
                                </div>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>
        <!-- /.row (main row) -->

    </section>
    <!-- /.content -->
</div>
<!-- footer -->
<?php include "public/includes/footer.php"; ?>