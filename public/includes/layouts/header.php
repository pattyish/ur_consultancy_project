<body class="hold-transition skin-blue sidebar-mini">


    <div class="wrapper">

    <header class="main-header">
        <!-- Logo -->
        <a href="Home" class="logo">
        <!-- mini logo for sidebar mini 50x50 pixels -->
        <span class="logo-mini"><b>UR</b>C</span>
        <!-- logo for regular state and mobile devices -->
        <span class="logo-lg"><i><b>UR CONSULTANCY SYSTEM<</b></i></span>
        </a>
        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top">
        <!-- Sidebar toggle button-->
        <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
            <span class="sr-only">Toggle navigation</span>
        </a>
                <div class="navbar-custom-menu">
                    <ul class="nav navbar-nav">
                        <!-- Messages: style can be found in dropdown.less-->
                        <li class="dropdown messages-menu" style="margin-left: 0px;">
                            <a href="chat_room.php">
                                <i class="fa fa-envelope-o"></i>
                                <span class="label label-success" id="newsms"></span>
                            </a>
                        </li>
                        <li class="dropdown" style="margin-left: 0px;">
                            <a href="#">
                                <i class="fa fa-bell-o"></i>
                                <span class="label label-success" id="newsms"></span>
                            </a>
                        </li>
                        <li class="dropdown" style="font-size: 12px;">
                            <a href="#" data-toggle="modal" data-target="#add_announcement">
                                <i class="fa fa-plus text-success"></i>
                                Add Consultancy Link
                            </a>
                        </li>
                        <!-- User Account: style can be found in dropdown.less -->
                        <li class="dropdown user user-menu">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <img src="<?php echo "backend/".$MYUserProfileImage; ?>" class="user-image"
                                    alt="User Image">
                                <span class="hidden-xs"><?php echo $MYFirstname." ".$MYLastname; ?></span>
                            </a>
                            <ul class="dropdown-menu">
                                <!-- User image -->
                                <li class="user-header">
                                    <img src="<?php echo "backend/".$MYUserProfileImage; ?>" class="img-circle"
                                        alt="User Image"
                                        style="width:70px; height:70px; object-fit:cover; object-position: 50% 0;">

                                    <p>
                                        <b>
                                            <?php 
                                                $now = date("Y-m-d");
                                                echo $MYFirstname; ?> - <span class="text-pink"><?php echo $MYUserTypeName; ?></span>
                                            <br>
                                            <small>
                                                <?php echo date("d")."-".date("m")."-".date("Y").", on ".date("D", strtotime($now)); ?>
                                            </small>
                                        </b>
                                    </p>
                                </li>
                                <!-- Menu Footer-->
                                <li class="user-footer">
                                    <div class="pull-left">
                                        <a href="profile.php" class="btn btn-default btn-flat">Profile</a>
                                    </div>
                                    <div class="pull-right">
                                        <a href="backend/logout.php" class="btn btn-default btn-flat">Sign out</a>
                                    </div>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>
        <?php include 'models/add_announcement.php'?>