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

    // chatting in groups

    // chatting within groups
    $(".groupToChat").on("click",function(e){
        var creator= $(this).attr("creator");
        var me= $(this).attr("me");
        var groupId= $(this).val();
        var groupname= $(this).attr("groupname");
        $("#viewAllMembers").show();
        if(me == creator)
        {
            $("#addNewMemberBtn").show();
            $("#addNewMemberBtn").attr("disabled", false);
        }
        else
        {
            $("#addNewMemberBtn").hide();
        }
        $("#chat_with").html("<b>Chatting with members of "+groupname+"</b>");
        $("#receiverId").val(groupId);
        $("#addMemberTo").val(groupId);
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