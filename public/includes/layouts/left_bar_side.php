<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="<?php echo "backend/".$MYUserProfileImage; ?>" class="img-circle" alt="User Image"
                    style="width:50px; height:50px; object-fit:cover; object-position: 50% 0;">
            </div>
            <div class="pull-left info">
                <p><?php echo $MYFirstname; ?></p>
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
        <form action="#" method="" class="sidebar-form">
            <div class="input-group">
                <!-- <input type="text" name="q" class="form-control" placeholder="Search...">
                <span class="input-group-btn">
                    <button type="submit" name="search" data-toggle="modal" data-target="#search_user"
                        id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                    </button>
                </span> -->
            </div>
        </form>
        <!-- /.search form -->
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu" data-widget="tree">
            <li class="header">MAIN NAVIGATION</li>
            <li class="active treeview">
                <a href="Home">
                    <i class="fa fa-dashboard"></i> <span>Dashboard</span>
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
                    <li><a href="NewConsultant"><i class="fa fa-circle-o"></i> Add Consultant </a></li>
                    <li><a href="ActiveConsultants"><i class="fa fa-circle-o"></i>Registered Consultants</a></li>
                    <li><a href="ConsultancyDisabled"><i class="fa fa-circle-o"></i> Archive</a></li>
                    <li><a href="AllConsultantsContract"><i class="fa fa-circle-o"></i> Consultants Contract</a></li>
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
                    <li><a href="NewClient"><i class="fa fa-circle-o"></i> Add Client</a></li>
                    <li><a href="ActiveClients"><i class="fa fa-circle-o"></i> All Clients</a></li>
                    <li><a href="ClientsDisabled"><i class="fa fa-circle-o"></i> Archive</a></li>
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
                    <li><a href="NewConsultancy"><i class="fa fa-circle-o"></i>Add Consultancy</a></li>
                    <?php
                    }
                    ?>
                    <li><a href="TasksInProgress"><i class="fa fa-circle-o"></i> In Progress Consultancy</a>
                    </li>
                    <li><a href="AllCompletedTasks"><i class="fa fa-circle-o"></i> Archive</a></li>
                </ul>
            </li>
            <li>
                <a href="ChattingRoom">
                    <i class="fa fa-envelope"></i> <span>Chat Room</span>
                    <span class="pull-right-container">
                        <small class="label pull-right bg-green" id="newsmss"></small>
                    </span>
                </a>
            </li>
            <li>
                <a href="ReportPage">
                    <i class="fa fa-search"></i>
                    <span>Search</span>
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
                    <li><a href="myProfile"><i class="fa fa-circle-o"></i>My Profile</a></li>
                    <li><a href="backend/GetOut"><i class="fa fa-circle-o"></i> Logout </a></li>
                </ul>
            </li>
        </ul>
    </section>
    <!-- /.sidebar -->
</aside>