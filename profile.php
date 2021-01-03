<!-- file contains link-->
<?php include 'public/includes/header_link.php';?>
<!-- file conatins header code -->
<?php include 'public/includes/layouts/header.php';?>
<!-- left side bar code -->
<?php include 'public/includes/layouts/left_bar_side.php';?>
<!-- below ul tag is to help us load new sms automatically -->
<ul class="users-list clearfix" id="userToChatWith" style="display: none;">
</ul>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <!-- <form action="TCPDF/pdf_files/cv_pdf.php" method="post">
    <div class="btn-group btn-group-sm table-button-div" style="margin-top: 15px;">
            <input type="submit" value=" Print Your CV" name="generate_cv_pdf" style="font-size: 15px;" class=" btn btn-info table_button">
                
            
        </div>
    </form> -->
        <div class="btn-group btn-group-sm table-button-div" style="margin-top: 15px;">
            <!-- <input type="submit" value=" Print Your CV" name="generate_cv_pdf" style="font-size: 15px;" -->
            <!-- class=" btn btn-info table_button"> -->
            <a href="contract_pdf.php?cv_id=<?php echo $MYUserId ;?>" target="_blank" style="font-size: 15px;" class=" btn
                btn-success table_button">
                <i class=""></i> Print Your CV
            </a>

        </div>
        <ol class="breadcrumb">
            <li><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">User profile</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content" style="margin-top: 10px;">
        <div class="row">
            <div class="col-md-3">

                <!-- Profile Image -->
                <div class="box box-primary">
                    <div class="box-body box-profile">
                        <a href="#" data-toggle="modal" data-target="#change_profile">
                            <img class="profile-user-img img-responsive img-circle"
                                src="<?php echo "backend/".$MYUserProfileImage; ?>" alt="User profile picture"
                                style="width:90px; height:90px; object-fit:cover; object-position: 50% 0;">
                        </a>
                        <?php include 'models/consultant_models/changing_profile_image.php'; ?>
                        <h3 class="profile-username text-center">
                            <?php echo $MYFirstname; ?></h3>

                        <p class="text-muted text-center text-blue"><b><?php echo $MYUserTypeName; ?></b></p>

                        <ul class="list-group list-group-unbordered">
                            <li class="list-group-item">
                                <?php 
                            // query to count number of ongoing consultancy
                            $comple = "SELECT * FROM consultant_contract INNER JOIN consultancy ON consultant_contract.contract_consultancy_id = consultancy.consultancy_id WHERE consultant_contract.contract_consultant_id = $myId AND consultancy.consultancy_progress = 2 ";
                            $comple = mysqli_query($connect,$comple);
                            $compleCount = mysqli_num_rows($comple);
                            ?>
                                <b>Completely Consultancy</b> <a class="pull-right"><?php echo $compleCount; ?></a>
                            </li>
                            <li class="list-group-item">
                                <?php 
                            // query to count number of ongoing consultancy
                            $onGoin = "SELECT * FROM consultant_contract INNER JOIN consultancy ON consultant_contract.contract_consultancy_id = consultancy.consultancy_id WHERE consultant_contract.contract_consultant_id = $myId AND consultancy.consultancy_progress = 1 ";
                            $onGoin = mysqli_query($connect,$onGoin);
                            $onGoinCount = mysqli_num_rows($onGoin);
                            ?>
                                <b>In Progress Consultancy</b> <a class="pull-right"><?php echo $onGoinCount; ?></a>
                            </li>
                        </ul>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->

                <!-- About Me Box -->
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">About Me</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <strong><i class="fa fa-book margin-r-5"></i>Location</strong>

                        <p class="text-muted">
                            <?php echo $MYuser_location; ?>
                        </p>

                        <hr>

                        <strong><i class="fa fa-map-marker margin-r-5"></i>Education </strong>

                        <p class="text-muted"><?php echo $MYuser_education; ?></p>

                        <hr>
                        <strong><i class="fa fa-file-text-o margin-r-5"></i> Consultant Bio.</strong>

                        <p class="text-muted"><?php echo $MYuser_summary; ?></p>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
            <!-- /.col -->
            <div class="col-md-9">
                <div class="nav-tabs-custom">
                    <ul class="nav nav-tabs">
                        <li class="active"><a href="#activity" data-toggle="tab">
                                <h4>Consultant Bio.</h4>
                            </a></li>
                        <li><a href="#timeline" data-toggle="tab">
                                <h4>Change Password</h4>
                            </a></li>
                        <li><a href="#settings" data-toggle="tab">
                                <h4>Update Profile</h4>
                            </a></li>
                    </ul>
                    <div class="tab-content">
                        <div class="active tab-pane" id="activity">
                            <!-- Post -->
                            <div class="post">
                                <div class="user-block">
                                    <img class="img-circle img-bordered-sm"
                                        src="<?php echo "backend/".$MYUserProfileImage; ?>" alt="user image">
                                    <span class="username">
                                        <a href="#"><?php echo $MYFirstname." ".$MYLastname; ?>.</a>

                                    </span>
                                    <span class="description"><?php echo $MYuser_location; ?></span>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div>
                                            <h4>Education And Skills</h4>
                                            <p>
                                                <?php echo $MYuser_education; ?>
                                            </p>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div>
                                            <h4>Bio.</h4>
                                            <p>
                                                <?php echo $MYuser_summary; ?>
                                            </p>
                                        </div>
                                    </div>
                                </div>

                            </div>

                        </div>
                        <!-- /.tab-pane -->
                        <div class="tab-pane" id="timeline">
                            <form role="form" id="changePasswordForm">
                                <div class="box-body">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="">Current-Password</label>
                                                <input type="password" class="form-control" id="oldPassword"
                                                    placeholder="Current Password.." value="">
                                            </div>
                                            <div class="form-group">
                                                <label for="">New-Password</label>
                                                <input type="password" class="form-control" id="newPassword"
                                                    placeholder="New Password...">
                                            </div>
                                            <div class="form-group">
                                                <label for="">Confirm-New-Password</label>
                                                <input type="password" class="form-control" id="cNewPassword"
                                                    placeholder="Confirm New Password..." value="">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="box-footer">
                                    <button type="submit" id="changePassword" class="btn btn-primary">Change
                                        Password</button>
                                    &nbsp;&nbsp;&nbsp;
                                    <span style="font-size: 20px;" id="changePasswordFeedback"> </span>
                                </div>
                            </form>
                        </div>
                        <!-- /.tab-pane -->

                        <div class="tab-pane" id="settings">
                            <form role="form" id="UpdateProfile">
                                <div class="box-body">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="">First-name</label>
                                                <input type="text" class="form-control" id="firstName"
                                                    placeholder="Enter First-name" value="<?php echo $MYFirstname; ?>">
                                            </div>
                                            <div class="form-group">
                                                <label for="">Last-name</label>
                                                <input type="text" class="form-control" id="lastName"
                                                    placeholder="Enter Password" value="<?php echo $MYLastname; ?>">
                                            </div>
                                            <div class="form-group">
                                                <label for="">User Type </label>
                                                <input type="text" class="form-control" id="userType" placeholder="Type"
                                                    value="<?php echo $MYUserTypeName; ?>" disabled>
                                            </div>
                                            <div class="form-group">
                                                <label for="">Gender</label>
                                                <select id="Gender" class="form-control">
                                                    <option value="<?php echo $MYUser_Gender; ?>">
                                                        <?php echo $MYUser_Gender; ?></option>
                                                    <option value="M">M</option>
                                                    <option value="F">F</option>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="">National Id &nbsp;&nbsp; <span class="text-blue"
                                                        id="natIdLength">
                                                    </span></label>
                                                <input type="text" class="form-control" id="natId"
                                                    value="<?php echo $MYUserNational_id; ?>" disabled>
                                            </div>
                                            <div class="form-group">
                                                <label for="">Email address</label>
                                                <input type="email" class="form-control" id="userEmail" placeholder=""
                                                    value="<?php echo $MYUserEmail; ?>">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="">Telephone </label>
                                                <input type="text" class="form-control" id="phone"
                                                    placeholder="Phone number" value="<?php echo $MYuser_phone; ?>">
                                            </div>
                                            <div class="form-group">
                                                <label>Country</label>
                                                <select class="form-control select2" id="country" multiple="multiple"
                                                    data-placeholder="Select a State" style="width: 100%;">
                                                    <option value="<?php echo $MYCountryId; ?>" selected>
                                                        <?php echo $MYCountry; ?></option>
                                                    <?php include 'backend/getCountries.php'; ?>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label>Department</label>
                                                <select class="form-control select2" id="department" multiple="multiple"
                                                    data-placeholder="Select a State" style="width: 100%;">
                                                    <option value="<?php echo $MYdepartment_id; ?>" selected>
                                                        <?php echo $MYdepartment_name; ?></option>
                                                    <?php include 'backend/getDepartments.php'; ?>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="">Location</label>
                                                <input type="text" class="form-control" id="userLocation"
                                                    placeholder="your location" value="<?php echo $MYuser_location; ?>">
                                            </div>
                                            <div class="form-group">
                                                <label>Education</label>
                                                <textarea class="form-control" id="userEducation" rows="10" cols="80"
                                                    placeholder="About education and skills"><?php echo $MYuser_education; ?></textarea>
                                            </div>
                                            <div class="form-group">
                                                <label>Consultant Bio.</label>
                                                <textarea class="form-control" id="userSummary" rows="10" cols="80"
                                                    placeholder="Enter the summary about your self"><?php echo $MYuser_summary; ?></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- /.box-body -->

                                <div class="box-footer">
                                    <button type="submit" id="saveCons" class="btn btn-primary">Save Changes</button>
                                    &nbsp;&nbsp;&nbsp;
                                    <button type="reset" id="reset" class="btn btn-link">Reset</button>
                                    &nbsp;&nbsp;&nbsp;
                                    <span style="font-size: 15px;" id="updateProfileFeedback"> </span>
                                    <br>
                                </div>
                            </form>
                        </div>
                        <!-- /.tab-pane -->
                    </div>
                    <!-- /.tab-content -->
                </div>
                <!-- /.nav-tabs-custom -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->

    </section>
    <!-- /.content -->
</div>

<!-- footer code-->
<?php include "public/includes/footer.php"; ?>