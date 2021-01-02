<?php
session_start();
if(!(isset($_SESSION['User_ID'])))
{
    ?>
    <script>
        window.location.href='_pages/Welcome';
    </script>
    <?php
}
else if(isset($_SESSION['User_ID']))
{
    include 'backend/Database.php';
    ?>
    <link rel="stylesheet" href="dist/css/css_style.css">
    <?php

    $myId=$_SESSION['User_ID'];
    // select all people that I can chat with
    $retrieve = "SELECT * FROM users INNER JOIN user_type ON users.user_type_id = user_type.user_type_id AND users.user_status_id = 1";
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
            // get number of unreads message for each user
            $Unread_Query="SELECT COUNT(*) AS nbr FROM message WHERE (message.message_receiver_id =$myId AND message.message_sender_id =$user_id) AND message.message_reads = 2 ";
            $Unread_Answer=mysqli_query($connect,$Unread_Query);
            while($Unread_Line=mysqli_fetch_object($Unread_Answer))
            {
                $Unreads_Number=$Unread_Line ->nbr;
            }
            ?>
            <li class="userToChat" value="<?php echo $user_id; ?>" username="<?php echo $fName; ?>">
                <img src="<?php echo "backend/".$user_profile_image; ?>" alt="User Image" style="width:60px; height:60px; object-fit:cover; object-position: 50% 0;">
                <a class="users-list-name"  href="#"><?php echo $fName; ?></a>
                <span class="users-list-date">
                    <?php echo $user_type; ?>
                    <span class="w3-badge w3-green">
                        <?php if($Unreads_Number>0){echo $Unreads_Number;} else{} ?> 
                    </span></span>
                
            </li>
            <?php
        }
    }
    else
    {
        echo "No users to chat with.";
    }

    // let me add other needful autoloads based on SMS sent
    // Show all unreads messages
    // get number of unreads message for each friend
    $Unread_Query="SELECT COUNT(*) AS nbr FROM message INNER JOIN users ON message.message_sender_id = users.user_id
    WHERE message.message_receiver_id=$myId AND message.message_reads=2 AND users.user_status_id = 1 ";
    $Unread_Answer=mysqli_query($connect,$Unread_Query);
    while($Unread_Line=mysqli_fetch_object($Unread_Answer))
    {
    $Unreads_Number=$Unread_Line ->nbr;
    }

    // alert new unreads
    if($Unreads_Number > 0)
    {
        ?>
        <script>
            $(document).ready(function(){
                var newtitle=<?php echo $Unreads_Number; ?>;
                $("title").text('('+newtitle+') New messages');
                $("#newsmss").html(newtitle);
                $("#newsms").html(newtitle);
            
            });
        </script>
        <?php
    }
    else
    {
    ?>
        <script>
            $(document).ready(function(){
                $("title").text("Consultancy | Dashboard");
                $("#newsmss").html("");
                $("#newsms").html("");
            });
        </script>
    <?php
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
    });

    </script>
 <?php
}
?>