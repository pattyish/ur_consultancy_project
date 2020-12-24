<!-- file contains link-->
<?php include 'public/includes/header_link.php';?>
<!-- file conatins header code -->
<?php include 'public/includes/layouts/header.php';?>
<!-- left side bar code -->
<?php include 'public/includes/layouts/left_bar_side.php';?>
<!-- DIRECT CHAT -->

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>

            <small></small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Message</li>
        </ol>
    </section>

    <section class="content">
        <div class="row">
            <div class="col-md-4">
            <div class="box">
                <div class="box-header with-border">
                  <h3 class="box-title">Partners</h3>
                  <div class="box-tools pull-right">
                    <span class="label label-primary">Groups</span>
                  </div>
                </div>
                <!-- /.box-header -->
                <div class="box-body no-padding">
                  <ul class="users-list clearfix">
                  <?php include 'backend/getUsersToChatWith.php'; ?>
                  </ul>
                  <!-- /.users-list -->
                </div>
                <!-- /.box-body -->
                <div class="box-footer text-center">
                  <a href="javascript:void(0)" class="uppercase">View All Users</a>
                </div>
                <!-- /.box-footer -->
              </div>
            </div>
            <div class="col-md-8">
                <div class="box direct-chat direct-chat-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Chat With Partners</h3>

                        <div class="box-tools pull-right">
                            <span data-toggle="tooltip" title="3 New Messages" class="badge bg-primary">3</span>
                            &nbsp;&nbsp;&nbsp;
                            <button style="font-size: 17px;" type="button" class="btn btn-box-tool" data-toggle="tooltip" title="Contacts"
                                data-widget="chat-pane-toggle">
                                <i class="fa fa-comments"></i></button>
                        </div>
                    </div>
                    <div class="box-body">
                        <div class="direct-chat-messages">
                            <div class="direct-chat-msg">
                                <div class="direct-chat-info clearfix">
                                    <span class="direct-chat-name pull-left">Alexander Pierce</span>
                                    <span class="direct-chat-timestamp pull-right">23 Jan 2:00 pm</span>
                                </div>
                                <img class="direct-chat-img" src="dist/img/user1-128x128.jpg" alt="message user image">

                                <div class="direct-chat-text">
                                    Is this template really for free? That's unbelievable!
                                </div>
                            </div>
                           
                            <div class="direct-chat-msg right">
                                <div class="direct-chat-info clearfix">
                                    <span class="direct-chat-name pull-right">Sarah Bullock</span>
                                    <span class="direct-chat-timestamp pull-left">23 Jan 6:10 pm</span>
                                </div>
                                <img class="direct-chat-img" src="dist/img/user3-128x128.jpg" alt="message user image">
                                <div class="direct-chat-text">
                                    I would love to.
                                </div>
                            </div>
                            <div class="direct-chat-msg">
                                <div class="direct-chat-info clearfix">
                                    <span class="direct-chat-name pull-left">Alexander Pierce</span>
                                    <span class="direct-chat-timestamp pull-right">23 Jan 5:37 pm</span>
                                </div>
                                <img class="direct-chat-img" src="dist/img/user1-128x128.jpg" alt="message user image">
                                <div class="direct-chat-text">
                                    Working with AdminLTE on a great new app! Wanna join?
                                </div>
                            </div>
                            <div class="direct-chat-msg right">
                                <div class="direct-chat-info clearfix">
                                    <span class="direct-chat-name pull-right">Sarah Bullock</span>
                                    <span class="direct-chat-timestamp pull-left">23 Jan 6:10 pm</span>
                                </div>
                                <img class="direct-chat-img" src="dist/img/user3-128x128.jpg" alt="message user image">
                                <div class="direct-chat-text">
                                    I would love to.
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="box-footer">
                        <form action="#" method="post">
                            <div class="input-group">
                                <input type="text" name="message" placeholder="Type Message ..." class="form-control">
                                <span class="input-group-btn">
                                    <button type="button" class="btn btn-primary btn-flat">Send</button>
                                </span>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<!-- footer code-->
<?php include "public/includes/footer.php"; ?>