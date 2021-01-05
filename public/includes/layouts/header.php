<body class="hold-transition skin-blue sidebar-mini">

    <div class="wrapper">

        <header class="main-header">
            <!-- Logo -->
            <a href="Home" class="logo">
                <!-- mini logo for sidebar mini 50x50 pixels -->
                <span class="logo-mini"><b>UR</b>C</span>
                <!-- logo for regular state and mobile devices -->
                <span class="logo-lg"><i><b>UR CONSULTANCY SYSTEM<< /b></i></span>
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
                            <a href="ChattingRoom">
                                <i class="fa fa-envelope-o"></i>
                                <span class="label label-success" id="newsms"></span>
                            </a>
                        </li>
                        <!-- Notifications: style can be found in dropdown.less -->
                        <li class="dropdown notifications-menu">
                        <?php
                            // select all announcements to show them in notification
                            $announce = "SELECT * FROM consultancy_announcement WHERE consultancy_announcement.consultancy_announcement_shown = 1 ";
                            $announce = mysqli_query($connect,$announce);
                            $announceCount = mysqli_num_rows($announce);                                  
                            ?>
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="fa fa-bell-o"></i>
                                <span class="label label-warning"><?php echo $announceCount; ?></span>
                            </a>
                            <ul class="dropdown-menu" style="margin-right: -100px;">
                                <li class="header text-blue">You have <?php echo $announceCount; ?> notifications</li>
                                <li>
                                    <!-- inner menu: contains the actual data -->
                                    <ul class="menu">
                                    <?php
                                        if($announceCount = 0)
                                        {
                                            echo "No new announcements";
                                        }
                                        else
                                        {
                                            while($announceRetrieve = mysqli_fetch_object($announce))
                                            {
                                                $consultancy_announcement = $announceRetrieve -> consultancy_announcement;
                                                $consultancy_announcement_link = $announceRetrieve -> consultancy_announcement_link;
                                                ?>
                                                <li>
                                                    <a href="<?php echo $consultancy_announcement_link; ?>" target="_blank" >
                                                        <i class="fa fa-newspaper-o text-red"></i> <?php echo $consultancy_announcement; ?>
                                                    </a>
                                                </li>
                                                <?php
                                            }
                                        }        
                                        ?>
                                    </ul>
                                </li>
                                <li class="footer"><a href="#" class="text-blue">View all announcements</a></li>
                            </ul>
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
                                                echo $MYFirstname; ?> - <span
                                                class="text-pink"><?php echo $MYUserTypeName; ?></span>
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
                                        <a href="myProfile" class="btn btn-default btn-flat">Profile</a>
                                    </div>
                                    <div class="pull-right">
                                        <a href="backend/GetOut" class="btn btn-default btn-flat">Sign out</a>
                                    </div>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>
        <?php include 'models/add_announcement.php'?>