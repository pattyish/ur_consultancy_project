<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="<?php echo $MYUserProfileImage; ?>" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
                <p><?php echo $MYFirstname." ".$MYLastname; ?></p>
                <a href="#"><i class="fa fa-circle text-success"></i>
                <?php
                // //update last active every time that the user loads the system page
                $myId = $_SESSION['User_ID'];
                $bynow = date("Y-m-d H:i:s");
                $lastActive = "UPDATE users SET user_last_active= '$bynow' WHERE user_id=$myId";
                $lastActive = mysqli_query($connect,$lastActive);
                if($lastActive)
                {
                    $Last_Act = $MYuser_last_active;
                    $datetime1 = new DateTime($Last_Act);
                    $datetime2 = new DateTime($bynow);
                    $interval = $datetime1->diff($datetime2);
                    $hours   = $interval->format('%h'); 
                    $minutes = $interval->format('%i');
                    $totalMins = (($hours*60)+$minutes);
                    if($totalMins <= 3)
                    {
                    echo "<span class='text-green'><b>Online</b></span>";
                    }
                    else
                    {
                        echo "<span class='text-red'><b>Offline</b></span>";
                    }
                }
                ?>
                </a>
            </div>
        </div>
        <!-- search form -->
        <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="Search...">
                <span class="input-group-btn">
                    <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i
                            class="fa fa-search"></i>
                    </button>
                </span>
            </div>
        </form>
        <!-- /.search form -->
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu" data-widget="tree">
            <li class="header">MAIN NAVIGATION</li>
            <li class="active treeview">
                <a href="index.php">
                    <i class="fa fa-dashboard"></i> <span>Dashboard</span>
                    <span class="pull-right-container">
                       <!-- <i class="fa fa-angle-left pull-right"></i> -->
                    </span>
                </a>
            </li>
            <?php 
            // this part is not visible for usual consultant 
            if($MYUserType != 3)
            {
                ?>
                <li class="treeview">
                    <a href="#">
                        <i class="fa fa-users"></i>
                        <span>Consultants</span>
                        <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="add_consultant.php"><i class="fa fa-circle-o"></i> Add Consultant </a></li>
                        <li><a href="all_consultants.php"><i class="fa fa-circle-o"></i>Registered Consultants</a></li>
                    </ul>
                </li>
                <li class="treeview">
                    <a href="#">
                        <i class="fa fa-users"></i> <span>Clients</span>
                        <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="register_client.php"><i class="fa fa-circle-o"></i> Add Client</a></li>
                        <li><a href="all_clients.php"><i class="fa fa-circle-o"></i> All Clients</a></li>
                    </ul>
                </li>
                <?php
            }
            ?>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-archive"></i>
                    <span>Consultancy</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <?php
                    if($MYUserType != 3)
                    {
                        ?>
                        <li><a href="add_consultancy.php"><i class="fa fa-circle-o"></i>Add Consultancy</a></li>
                        <?php
                    }
                    ?>
                    <li><a href="progress_consultancy.php"><i class="fa fa-circle-o"></i> In Progress Consultancy</a></li>
                    <li><a href="completed_consultancy.php"><i class="fa fa-circle-o"></i> Completed Consultancy</a></li>
                </ul>
            </li>
            <li>
                <a href="chat_room.php">
                    <i class="fa fa-envelope"></i> <span>Mailbox</span>
                    <span class="pull-right-container">
                        <small class="label pull-right bg-yellow">12</small>
                        <small class="label pull-right bg-green">16</small>
                        <small class="label pull-right bg-red">5</small>
                    </span>
                </a>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-user"></i>
                    <span>Profile</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="profile.php"><i class="fa fa-circle-o"></i>My Profile</a></li>
                    <li><a href="backend/logout.php"><i class="fa fa-circle-o"></i> Logout </a></li>
                </ul>
            </li>
        </ul>
    </section>
    <!-- /.sidebar -->
</aside>