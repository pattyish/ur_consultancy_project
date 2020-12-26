<script>
$(document).ready(function(){
    $("#messageToSend").html("");

    // chatting individually

    // chatting with other users
    $(".userToChat").on("click",function(e){
        var userId= parseInt($(this).val());
        var username= $(this).attr("username");
        $("#chat_with").html("<b>Chat with "+username+"</b>");
        $("#receiverId").val(userId);
        $("#conversation_window").html("Loading chats with "+username+"....." );
        $.ajax({
            type: "post",
            url: "backend/qqq.php",
            data: {userId : userId},
            success: function(response)
            {
                $("#conversation_window").html(response);
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
                        $("#sendMessageForm").trigger("reset");
                    }
                });
            }
        }
        else
        {
            $("#sendMessageFeedback").html("<b>On left side, choose the receiver.</b>");
        } 
    });

    // chatting in groups

    // chatting within groups
    $(".groupToChat").on("click",function(e){
        var groupId= $(this).val();
        var groupname= $(this).attr("groupname");
        $("#chat_with").html("<b>Chatting with members of "+groupname+"</b>");
        $("#receiverId").val(groupId);
        $("#conversation_window").html("Loading chats of "+groupname+" group....." );
        $.ajax({
            type: "post",
            url: "backend/groupMessages.php",
            data: {groupId : groupId},
            success: function(response)
            {
                $("#conversation_window").html(response);
            }
        });
    });
});

</script>