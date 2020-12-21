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
                                        <a href="#">Jonathan Burke Jr.</a>
                                        <a href="#" class="pull-right btn-box-tool"><i class="fa fa-times"></i></a>
                                    </span>
                                    <span class="description">Shared publicly - 7:30 PM today</span>
                                </div>
                                <!-- /.user-block -->
                                <p>
                                    Lorem ipsum represents a long-held tradition for designers,
                                    typographers and the like. Some people hate it and argue for
                                    its demise, but others ignore the hate as they create awesome
                                    tools to help create filler text for everyone from bacon lovers
                                    to Charlie Sheen fans.
                                </p>
                                <ul class="list-inline">
                                    <li><a href="#" class="link-black text-sm"><i class="fa fa-share margin-r-5"></i>
                                            Share</a></li>
                                    <li><a href="#" class="link-black text-sm"><i
                                                class="fa fa-thumbs-o-up margin-r-5"></i> Like</a>
                                    </li>
                                    <li class="pull-right">
                                        <a href="#" class="link-black text-sm"><i
                                                class="fa fa-comments-o margin-r-5"></i> Comments
                                            (5)</a>
                                    </li>
                                </ul>

                                <input class="form-control input-sm" type="text" placeholder="Type a comment">
                            </div>
                            <!-- /.post -->

                            <!-- Post -->
                            <div class="post clearfix">
                                <div class="user-block">
                                    <img class="img-circle img-bordered-sm" src="dist/img/user7-128x128.jpg"
                                        alt="User Image">
                                    <span class="username">
                                        <a href="#">Sarah Ross</a>
                                        <a href="#" class="pull-right btn-box-tool"><i class="fa fa-times"></i></a>
                                    </span>
                                    <span class="description">Sent you a message - 3 days ago</span>
                                </div>
                                <!-- /.user-block -->
                                <p>
                                    Lorem ipsum represents a long-held tradition for designers,
                                    typographers and the like. Some people hate it and argue for
                                    its demise, but others ignore the hate as they create awesome
                                    tools to help create filler text for everyone from bacon lovers
                                    to Charlie Sheen fans.
                                </p>

                                <form class="form-horizontal">
                                    <div class="form-group margin-bottom-none">
                                        <div class="col-sm-9">
                                            <input class="form-control input-sm" placeholder="Response">
                                        </div>
                                        <div class="col-sm-3">
                                            <button type="submit"
                                                class="btn btn-danger pull-right btn-block btn-sm">Send</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <!-- /.post -->

                            <!-- Post -->
                            <div class="post">
                                <div class="user-block">
                                    <img class="img-circle img-bordered-sm" src="dist/img/user6-128x128.jpg"
                                        alt="User Image">
                                    <span class="username">
                                        <a href="#">Adam Jones</a>
                                        <a href="#" class="pull-right btn-box-tool"><i class="fa fa-times"></i></a>
                                    </span>
                                    <span class="description">Posted 5 photos - 5 days ago</span>
                                </div>
                                <!-- /.user-block -->
                                <div class="row margin-bottom">
                                    <div class="col-sm-6">
                                        <img class="img-responsive" src="dist/img/photo1.png" alt="Photo">
                                    </div>
                                    <!-- /.col -->
                                    <div class="col-sm-6">
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <img class="img-responsive" src="dist/img/photo2.png" alt="Photo">
                                                <br>
                                                <img class="img-responsive" src="dist/img/photo3.jpg" alt="Photo">
                                            </div>
                                            <!-- /.col -->
                                            <div class="col-sm-6">
                                                <img class="img-responsive" src="dist/img/photo4.jpg" alt="Photo">
                                                <br>
                                                <img class="img-responsive" src="dist/img/photo1.png" alt="Photo">
                                            </div>
                                            <!-- /.col -->
                                        </div>
                                        <!-- /.row -->
                                    </div>
                                    <!-- /.col -->
                                </div>
                                <!-- /.row -->

                                <ul class="list-inline">
                                    <li><a href="#" class="link-black text-sm"><i class="fa fa-share margin-r-5"></i>
                                            Share</a></li>
                                    <li><a href="#" class="link-black text-sm"><i
                                                class="fa fa-thumbs-o-up margin-r-5"></i> Like</a>
                                    </li>
                                    <li class="pull-right">
                                        <a href="#" class="link-black text-sm"><i
                                                class="fa fa-comments-o margin-r-5"></i> Comments
                                            (5)</a>
                                    </li>
                                </ul>

                                <input class="form-control input-sm" type="text" placeholder="Type a comment">
                            </div>
                            <!-- /.post -->
                        </div>
                        <!-- /.tab-pane -->
                        <div class="tab-pane" id="timeline">
                            <form role="form" id="saveConsultant">
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
                            <form role="form" id="saveConsultant">
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
                                                    placeholder="Enter Id Number" value="">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="">Email address</label>
                                                <input type="email" class="form-control" id="userEmail"
                                                    placeholder="Enter email">
                                            </div>
                                            <div class="form-group">
                                                <label for="">User Type </label>
                                                <input type="text" class="form-control" id="userType"
                                                    placeholder="Enter email" value="">
                                            </div>
                                            <div class="form-group">
                                                <label>Country</label>
                                                <input type="text" class="form-control" id="userType"
                                                    placeholder="Enter email" value="">
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