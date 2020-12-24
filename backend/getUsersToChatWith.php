<?php 
// select all people that I can chat with
$retrieve = "SELECT * FROM users INNER JOIN user_type ON users.user_type_id = user_type.user_type_id;";
$retrieve = mysqli_query($connect,$retrieve);
$retrieveCount = mysqli_num_rows($retrieve);
if($retrieveCount > 0)
{
    while($lineRetrieve = mysqli_fetch_object($retrieve))
    {
        $user_id = $lineRetrieve -> user_id;
        $fName = $lineRetrieve -> user_first_name;
        $lName = $lineRetrieve -> user_last_name;
        $gender = $lineRetrieve -> user_gender;
        $natId = $lineRetrieve -> user_national_id;
        $email = $lineRetrieve -> user_email;
        $user_type = $lineRetrieve -> user_type;
        $user_profile_image = $lineRetrieve -> user_profile_image;
        if($user_id == $myId)
        {
            continue;
        }
        ?>
        <li class="userToChat" value="<?php echo $user_id; ?>" username="<?php echo $fName; ?>">
            <img src="<?php echo $user_profile_image; ?>" alt="User Image">
            <a class="users-list-name"  href="#"><?php echo $fName; ?></a>
            <span class="users-list-date"><?php echo $user_type; ?></span>
        </li>
        <?php
    }
}

?>
<script>
$(document).ready(function(){
    $("#messageToSend").html("");
    // chatting with other users
    $(".userToChat").on("click",function(e){
        var userId= parseInt($(this).val());
        var username= $(this).attr("username");
        $("#chat_with").html("<b>Chat with "+username+"</b>");
        $("#receiverId").val(userId);
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