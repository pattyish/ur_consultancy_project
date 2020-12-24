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
                        <div class="direct-chat-messages" id="conversation_window">
                            
                        </div>
                    </div>
                    <div class="box-footer">
                        <form id="sendMessageForm">
                            <div class="input-group">
                            <input type="hidden" id="receiverId">
                            <textarea type="text" id="messageToSend" placeholder="Type Message ..." class="form-control">
                            </textarea>
                            <span class="input-group-btn">
                                    <button type="submit" class="btn btn-primary btn-flat">Send</button>
                                </span>
                            </div>
                            <br>
                            <span id="sendMessageFeedback" class="text-blue" style="font-size: 20px;"></span>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<!-- footer code-->
<?php include "public/includes/footer.php"; ?>