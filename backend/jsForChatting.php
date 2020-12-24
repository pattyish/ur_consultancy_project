<script>
$(document).ready(function(){
    $("#messageToSend").html("");
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
        var userId= parseInt($("#receiverId").val());
        var messageContent= $("#messageToSend").val();
        if($.trim(messageContent).length == 0)
        {
            $("#sendMessageFeedback").html("<b>Write something, please</b>");
        }
        else
        {
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
        }
      
    });
});

</script>