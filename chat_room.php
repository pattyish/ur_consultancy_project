<!-- file contains link-->
<?php include 'public/includes/header_link.php';?>
<!-- file conatins header code -->
<?php include 'public/includes/layouts/header.php';?>
<!-- left side bar code -->
<?php include 'public/includes/layouts/left_bar_side.php';?>
<!-- DIRECT CHAT -->

<script>
    $(document).ready(function() {

        //viewPartners is clicked
        $("#viewPartners").on("click",function(){
            $("#groupOrInd").val(1);
            $("#groupOrIndividual").html("Checking partners...");
            $.ajax({
                type: "POST",
                url: "backend/exchangeToPartners.php",
                success: function(data){
                    $("#groupOrIndividual").html(data);
                    $("#conversation_window").html("click on a user to see the conversation here.");
                    $("#chat_with").html("Choose a user to chat with");
                    $("#receiverId").val("");
                }
            });
        });

        //viewPartners is clicked
        $("#viewGroups").on("click",function(){
            $("#groupOrInd").val(2);
            $("#groupOrIndividual").html("Checking groups...");
            $.ajax({
                type: "POST",
                url: "backend/exchangeToGroups.php",
                success: function(data){
                    $("#groupOrIndividual").html(data);
                    $("#conversation_window").html("click on a group to see the conversation here.");
                    $("#chat_with").html("Choose a group on the left side");
                    $("#receiverId").val("");
                }
            });
        });

    });

    </script>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>

            <small></small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Message</li>
        </ol>
    </section>

    <section class="content">
        <div class="row">
            <div class="col-md-4">
                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title text-gray" id="onView"><b>Partners</b></h3>
                        <div class="box-tools pull-right">
                            <a href="#" id="viewPartners">
                                <span class=" label label-primary">View partners</span>
                            </a>
                            <a href="#" id="viewPartners">
                                <span class=" label label-primary" id="viewGroups">View Groups</span>
                            </a>
                            <span class="label label-success">
                            <a href="#" style="text-decoration: none;" data-toggle="modal"
                                    data-target="#create_group"> Create Group</a>
                            </span>
                        </div>
                    </div>
                    <?php include 'models/create_group.php'; ?>
                    <!-- /.box-header -->
                    <div class="box-body no-padding" id="groupOrIndividual">
                        <!-- /.users-list -->
                            <?php include 'backend/getUsersToChatWith.php'; ?>
                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer text-center text-blue">
                        <a href="javascript:void(0)" class="uppercase"><b>Communicate with your patners.</b></a>
                    </div>
                    <!-- /.box-footer -->
                </div>
            </div>
            <div class="col-md-8">
                <div class="box direct-chat direct-chat-primary">
                    <div class="box-header with-border">
                        <h2 class="box-title text-green" id="chat_with">Choose a user to chat with</h2>

                        <div class="box-tools pull-right">
                            <span data-toggle="tooltip" title="3 New Messages" class="badge bg-primary">.. </span>
                            &nbsp;&nbsp;&nbsp;
                            <button style="font-size: 17px;" type="button" class="btn btn-box-tool"
                                data-toggle="tooltip" title="Contacts" data-widget="chat-pane-toggle">
                                <i class="fa fa-comments"></i></button>
                        </div>
                    </div>
                    <div class="box-body">
                        <div class="direct-chat-messages" id="conversation_window">
                            click on a user to see the conversation here.
                        </div>
                    </div>
                    <div class="box-footer">
                        <form id="sendMessageForm">
                            <div class="input-group">
                                <input type="hidden" id="receiverId">
                                <input type="hidden" id="groupOrInd" value="1">
                                <textarea type="text" id="messageToSend" placeholder="Type Message ..."
                                    class="form-control">
                            </textarea>
                                <span class="input-group-btn">
                                    <button type="submit" id="sendMessageBtn"
                                        class="btn btn-primary btn-flat">Send</button>
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