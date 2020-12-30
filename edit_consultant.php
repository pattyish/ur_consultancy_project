<?php include 'public/includes/header_link.php';?>
<?php include 'public/includes/layouts/header.php';?>
<?php include 'public/includes/layouts/left_bar_side.php';?>

<ul class="users-list clearfix" id="userToChatWith" style="display: none;">
</ul>

<script>
$(document).ready(function(){
    $("#natId").on("keyup",function(){
        var length = $(this).val();
        $("#natIdLength").html(length.length);
    });
});
</script>
<?php
$consultant_id = $_GET['consultant_id'];
// file to retrieve all existing consultants and show them in table with possible options
$retrieve = "SELECT * FROM users INNER JOIN user_type INNER JOIN department INNER JOIN country ON 
users.user_type_id = user_type.user_type_id AND users.user_department = department.department_id AND 
users.user_country = country.country_id WHERE users.user_status_id = 1 AND users.user_id = $consultant_id";
$retrieve = mysqli_query($connect,$retrieve);
$retrieveCount = mysqli_num_rows($retrieve);
if($retrieveCount > 0)
{
    while($lineRetrieve = mysqli_fetch_object($retrieve))
    {
        $user_id = $lineRetrieve -> user_id;
        $fName = $lineRetrieve -> user_first_name;
        $lName = $lineRetrieve -> user_last_name;
        $gender = $lineRetrieve -> user_gender;
        $natId = $lineRetrieve -> user_national_id;
        $email = $lineRetrieve -> user_email;
        $department = $lineRetrieve -> department_name;
        $user_type = $lineRetrieve -> user_type;
        $user_type_id = $lineRetrieve -> user_type_id;
        $department_id = $lineRetrieve -> department_id;
        $country_name = $lineRetrieve -> country_name;
        $country_id = $lineRetrieve -> country_id;
    }
}        
        ?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>

        </h1>
        <ol class="breadcrumb">
            <li><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>
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
                        <h3 class="box-title">Edit Consultant Info</h3>
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->
                    <form role="form" id="ediConsultantInfo">
                        <div class="box-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">First-name</label>
                                        <input type="text" value="<?php echo  $fName; ?>" class="form-control"
                                            id="fName" placeholder="Enter First-name">
                                    </div>
                                    <div class="form-group">
                                        <label for="">Last-name</label>
                                        <input type="text" value="<?php echo  $lName; ?>" class="form-control"
                                            id="lName" placeholder="Enter Password">
                                    </div>
                                    <div class="form-group">
                                        <label for="">Gender</label>
                                        <select id="gender" class="form-control">
                                            <option value="<?php echo  $gender; ?>">
                                                <?php
                                            if($gender == "M"){
                                             echo "Male";
                                            }else{
                                             echo "Female";
                                            }
                                             ?>
                                            </option>
                                            <option value="M">Male</option>
                                            <option value="F">Female</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="">National Id  &nbsp;&nbsp; <span class="text-blue" id="natIdLength"> </span></label>
                                        <input type="text" value="<?php echo  $natId; ?>" class="form-control"
                                            id="natId" placeholder="Enter Id Number">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Email address</label>
                                        <input type="email" value="<?php echo  $email; ?>" class="form-control"
                                            id="userEmail" placeholder="Enter email">
                                    </div>
                                    <div class="form-group">
                                        <label for="">User Type </label>
                                        <select id="userType" class="form-control">
                                            <option value="<?php echo $user_type_id; ?>"><?php echo $user_type; ?>
                                            </option>
                                            <?php
                                        include 'backend/getUserTypes.php';
                                        ?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Country</label>
                                        <select class="form-control select2" id="country" multiple="multiple"
                                            data-placeholder="Select a State" style="width: 100%;">
                                            <option value="<?php echo  $country_id; ?>" selected>
                                                <?php echo  $country_name; ?></option>
                                            <?php include 'backend/getCountries.php'; ?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Department</label>
                                        <select class="form-control select2" id="department" multiple="multiple"
                                            data-placeholder="Select a State" style="width: 100%;">
                                            <option value="<?php echo $department_id; ?>" selected>
                                                <?php echo $department; ?></option>
                                            <?php include 'backend/getDepartments.php'; ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /.box-body -->

                        <div class="box-footer">
                        <input type="hidden" id="user_id" value="<?php echo  $user_id; ?>">
                        <?php 
                        if($user_type_id == 1 && $MYUserType != 1)
                        { 
                            echo "<b class='text-blue'>This is admin, You are not llowed to make an update.</b>";
                        } 
                        else
                        { 
                            ?>
                            <button type="submit" id="saveCons" class="btn btn-success">Update</button>
                            <?php 
                        } 
                        ?>
                           
                            &nbsp;&nbsp;&nbsp;
                            <span id="editUserFeedback"> </span>
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