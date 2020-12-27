<script>
    $(document).ready(function() {

        //viewPartners is clicked
        $("#viewPartners").on("click",function(){
            $("#addMemberTo").val("");
            $("#groupOrInd").val(1);
            $("#addNewMemberBtn").hide();
            $("#viewAllMembers").hide();
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
            $("#addMemberTo").val("");
            $("#groupOrInd").val(2);
            $("#addNewMemberBtn").hide();
            $("#viewAllMembers").hide();
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

        // sending a message
        $("#sendMessageForm").on("submit",function(e){
            e.preventDefault();
            var groupOrInd = $("#groupOrInd").val(); // check if it is groups or partners individually
            if(groupOrInd == 1)
            {
                // send a message to one single partner
                var userIdd= $("#receiverId").val();
                var userId= parseInt($("#receiverId").val());
                var messageContent= $("#messageToSend").val();
                if($.trim(messageContent).length == 0)
                {
                    $("#sendMessageFeedback").html("<b>Write something, please</b>");
                }
                else if($.trim(userIdd).length == 0)
                {
                    $("#sendMessageFeedback").html("<b>Oops, you have not chosen a user to chat with.</b>");
                }
                else
                {
                    $("#sendMessageBtn").attr("disabled", true);
                    $.ajax({
                        type: "post",
                        url: "backend/sendMessage.php",
                        data: {userId : userId, messageContent : messageContent},
                        success: function(response)
                        {
                            $("#conversation_window").html(response);
                            $("#messageToSend").val("");
                            self.submitting = false;
                        }
                    });
                    $("#sendMessageBtn").attr("disabled", false);
                    return false;
                }
            }
            else if(groupOrInd == 2)
            {
                // send a message to one single partner
                var groupIdd= $("#receiverId").val();
                var groupId= parseInt($("#receiverId").val());
                var messageContent= $("#messageToSend").val();
                if($.trim(messageContent).length == 0)
                {
                    $("#sendMessageFeedback").html("<b>Write something, please</b>");
                }
                else if($.trim(groupIdd).length == 0)
                {
                    $("#sendMessageFeedback").html("<b>Select a group in which you want to send a message.</b>");
                }
                else
                {
                    $("#sendMessageFeedback").html("");
                    $("#sendMessageBtn").attr("disabled", true);
                    $.ajax({
                        type: "post",
                        url: "backend/sendGroupMessages.php",
                        data: {groupId : groupId, messageContent : messageContent},
                        success: function(response)
                        {
                            $("#conversation_window").html(response);
                            $("#messageToSend").val("");
                            $("#sendMessageBtn").attr("disabled", false);
                            self.submitting = false;
                        }
                    });
                }
            }
            else
            {
                $("#sendMessageFeedback").html("<b>On left side, choose the receiver.</b>");
            } 
        });

        //Add a member to a group
        $("#addThisMember").on("click",function(){
            var groupIdd= $("#addMemberTo").val();
            var groupId= parseInt(groupIdd);
            var userIdd= $("#userEmailMultiple").val();
            var userId= parseInt(userIdd);
            if($.trim(userIdd).length == 0 || $.trim(groupIdd).length == 0)
            {
                $("#addMemberFeedback").html("<i class='text-red'><b>Select a valid partner.</b></i>");
            }
            else
            {
                $("#addThisMember").attr("disabled", true); 
                $.ajax({
                    type: "post",
                    url: "backend/addMemberToGroup.php",
                    data: {groupId : groupId, userId : userId},
                    success: function(response)
                    {
                        $("#addMemberFeedback").html("<i class='text-green'><b>"+response+"</b></i>");
                        $("#addThisMember").attr("disabled", false);
                    }
                }); 
            }
            
        });

    });

</script>