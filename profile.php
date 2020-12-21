<!-- file contains link-->
<?php include 'public/includes/header_link.php';?>
<!-- file conatins header code -->
<?php include 'public/includes/layouts/header.php';?>
<!-- left side bar code -->
<?php include 'public/includes/layouts/left_bar_side.php';?>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            User Profile
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">User profile</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-md-3">

                <!-- Profile Image -->
                <div class="box box-primary">
                    <div class="box-body box-profile">
                        <img class="profile-user-img img-responsive img-circle" src="dist/img/user4-128x128.jpg"
                            alt="User profile picture">

                        <h3 class="profile-username text-center">Nina Mcintire</h3>

                        <p class="text-muted text-center">Software Engineer</p>

                        <ul class="list-group list-group-unbordered">
                            <li class="list-group-item">
                                <b>Completely Consultancy</b> <a class="pull-right">1,322</a>
                            </li>
                            <li class="list-group-item">
                                <b>In Progress Consultancy</b> <a class="pull-right">543</a>
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
                        <strong><i class="fa fa-book margin-r-5"></i> Education</strong>

                        <p class="text-muted">
                            B.S. in Computer Science from the University of Rwanda</br>
                            College of Science and Technology.
                        </p>

                        <hr>

                        <strong><i class="fa fa-map-marker margin-r-5"></i> Location</strong>

                        <p class="text-muted">Kigali, Rwanda</p>

                        <hr>
                        <strong><i class="fa fa-file-text-o margin-r-5"></i> Summary</strong>

                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam fermentum enim neque.</p>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
            <!-- /.col -->
            <div class="col-md-9">
                <div class="nav-tabs-custom">
                    <ul class="nav nav-tabs">
                        <li class="active"><a href="#activity" data-toggle="tab">Summary</a></li>
                        <li><a href="#timeline" data-toggle="tab">Change Password</a></li>
                        <li><a href="#settings" data-toggle="tab">Update Profile</a></li>
                    </ul>
                    <div class="tab-content">
                        <div class="active tab-pane" id="activity">
                            <!-- Post -->
                            <div class="post">
                                <div class="user-block">
                                    <img class="img-circle img-bordered-sm" src="dist/img/user1-128x128.jpg"
                                        alt="user image">
                                    <span class="username">
                                        <a href="#">Patrick Ishimwe.</a>
                                        <a href="#" class="pull-right btn-box-tool"><i class="fa fa-times"></i></a>
                                    </span>
                                    <span class="description">Kigali, Rwanda</span>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div>
                                            <h4>Education And Skills</h4>
                                            <p>
                                                Lorem ipsum represents a long-held tradition for designers,
                                                typographers and the like. Some people hate it and argue for
                                                its demise, but others ignore the hate as they create awesome
                                                tools to help create filler text for everyone from bacon lovers
                                                to Charlie Sheen fans.
                                            </p>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                    <div>
                                            <h4>Eperience Summary</h4>
                                            <p>
                                                Lorem ipsum represents a long-held tradition for designers,
                                                typographers and the like. Some people hate it and argue for
                                                its demise, but others ignore the hate as they create awesome
                                                tools to help create filler text for everyone from bacon lovers
                                                to Charlie Sheen fans.
                                            </p>
                                        </div>
                                    </div>
                                </div>

                            </div>

                        </div>
                        <!-- /.tab-pane -->
                        <div class="tab-pane" id="timeline">
                            <form role="form" id="changePassword">
                                <div class="box-body">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="">Current-Password</label>
                                                <input type="password" class="form-control" id="cur_password"
                                                    placeholder="Current Password.." value="">
                                            </div>
                                            <div class="form-group">
                                                <label for="">New-Password</label>
                                                <input type="password" class="form-control" id="n_password"
                                                    placeholder="New Password...">
                                            </div>
                                            <div class="form-group">
                                                <label for="">Confirm-New-Password</label>
                                                <input type="password" class="form-control" id="fName"
                                                    placeholder="Retype New Password..." value="">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="box-footer">
                                    <button type="submit" id="saveCons" class="btn btn-primary">Change Password</button>
                                    &nbsp;&nbsp;&nbsp;
                                    <span id="feedback"> </span>
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
                                                <input type="text" class="form-control" id="fName"
                                                    placeholder="Enter First-name" value="">
                                            </div>
                                            <div class="form-group">
                                                <label for="">Last-name</label>
                                                <input type="text" class="form-control" id="lName"
                                                    placeholder="Enter Password" value="">
                                            </div>
                                            <div class="form-group">
                                                <label for="">Gender</label>
                                                <input type="text" class="form-control" id="natId" placeholder="Gender"
                                                    value="">
                                            </div>
                                            <div class="form-group">
                                                <label for="">National Id &nbsp;&nbsp; <span class="text-blue"
                                                        id="natIdLength">
                                                    </span></label>
                                                <input type="text" class="form-control" id="natId"
                                                    placeholder="Enter Id Number" value="" disabled>
                                            </div>
                                            <div class="form-group">
                                                <label for="">User Type </label>
                                                <input type="text" class="form-control" id="userType" placeholder="Type"
                                                    value="" disabled>
                                            </div>
                                            <div class="form-group">
                                                <label for="">Email address</label>
                                                <input type="email" class="form-control" id="userEmail" placeholder=""
                                                    value="">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Country</label>
                                                <input type="text" class="form-control" id="userType"
                                                    placeholder="Enter Country" value="">
                                            </div>
                                            <div class="form-group">
                                                <label for="">Location</label>
                                                <input type="email" class="form-control" id="userEmail" placeholder=""
                                                    value="">
                                            </div>
                                            <div class="form-group">
                                                <label>Education</label>
                                                <textarea class="form-control" id="education" placeholder="Enter email"
                                                    value=""></textarea>
                                            </div>
                                            <div class="form-group">
                                                <label>Summary</label>
                                                <textarea class="form-control" id="summary" placeholder="Enter email"
                                                    value=""></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- /.box-body -->

                                <div class="box-footer">
                                    <button type="submit" id="saveCons" class="btn btn-primary">Save User</button>
                                    &nbsp;&nbsp;&nbsp;
                                    <button type="reset" id="reset" class="btn btn-link">Reset</button>
                                    <br>
                                    <span id="feedback"> </span>
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