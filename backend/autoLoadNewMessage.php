<?php
session_start();
include 'Database.php';
if(!(isset($_SESSION['User_ID'])))
{
    ?>
    <script>
        window.location.href='Welcome';
    </script>
    <?php
}
else
{
    $myId=$_SESSION['User_ID'];
    $now = date("Y:m:d h:i:s");
    //First keep him online

    // set chat status ON in users table
    $keepOnline = $connect -> prepare("UPDATE users SET user_last_active=? WHERE user_id=? ");
    $keepOnline = bind_param("si",$now,$myId);

    // get users allowed to chat  
    $Get_Query="SELECT * FROM users ORDER BY friends.Contacting DESC;";
    $Get_Answer=mysqli_query($connect,$Get_Query);
    $Get_Count=mysqli_num_rows($Get_Answer);
    if($Get_Count==0)
    {
        echo "No available users";
    }
    else
    {
        while($line=mysqli_fetch_object($Get_Answer))
        {
            $Accepter_Id=$line ->Accepter_Id;
            $FriendName=$line ->Friend_GivenName;
            // get number of unreads message for each user, friend of mine
            $Unread_Query="SELECT COUNT(*) AS nbr FROM message WHERE (message.Message_Receiver=$MyId AND message.Message_Sender=$Accepter_Id) AND message.Reads_Id=2;";
            $Unread_Answer=mysqli_query($connect,$Unread_Query);
            while($Unread_Line=mysqli_fetch_object($Unread_Answer))
            {
                $Unreads_Number=$Unread_Line ->nbr;
            }

            // get information of a user
            $Get_FriendNames="SELECT * FROM users WHERE users.User_Id=$Accepter_Id"; 
            $Get_FriendNames_Answer=mysqli_query($connect,$Get_FriendNames); 
    
            while($linee=mysqli_fetch_object($Get_FriendNames_Answer))
            {
                $UserProfileImage=$linee ->UserProfileImage;
                $FirstName=$linee ->User_FirstName;
                $UserName=$linee ->User_Name;
                $Last_Act=$linee ->User_Last_Act;
                $gender=$linee ->User_Gender;

                $bynow=date("Y-m-d H:i:s");
                $datetime1 = new DateTime($Last_Act);
                $datetime2 = new DateTime($bynow);
                $interval = $datetime1->diff($datetime2);
                $hours   = $interval->format('%h'); 
                $minutes = $interval->format('%i');
                $totalMins=(($hours*60)+$minutes);

                // if mins < 3, show online and offline
            }
        }
        // Show all unreads messages
        // get number of unreads message for each friend
        $Unread_Query="SELECT COUNT(*) AS nbr FROM message WHERE message.Message_Receiver=$MyId  AND message.Reads_Id=2;";
        $Unread_Answer=mysqli_query($connect,$Unread_Query);
        while($Unread_Line=mysqli_fetch_object($Unread_Answer))
        {
            $Unreads_Number=$Unread_Line ->nbr;
        }

        // alert new unreads
        if($Unreads_Number > 0)
        { 
            // specify where to show unreads messages
            ?>
            <script>
                $(document).ready(function(){
                    var newtitle=<?php echo $Unreads_Number; ?>;
                    $('title').text('('+newtitle+') New messages');
                    $('#newsmss').html('('+newtitle+')');
                    $('#newsms').html(newtitle);
                
                });
            </script>
            <?php
        }
        else
        {
        ?>
            <script>
                $(document).ready(function(){
                    $('title').text('HelloFriendz');
                    $('#newsmss').html('');
                    $('#newsms').html('');
                });
            </script>
        <?php
        }
    }
}// end of else
?>