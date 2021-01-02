<?php
session_start();
include 'Database.php';
if(isset($_SESSION['User_ID']))
{
    $myId = $_SESSION['User_ID'];
    $bynow = date("Y-m-d H:i:s");
    //update last active
    $lastActive = "UPDATE users SET user_last_active= '$bynow' WHERE user_id=$myId";
    $lastActive = mysqli_query($connect,$lastActive);
    if($lastActive)
    {
        session_destroy();
        ?>
        <script>
            window.location.href='../_pages/Welcome';
        </script>
        <?php
    }
}
else
{
    ?>
    <script>
        window.location.href='../_pages/Welcome';
    </script>
    <?php
}
?>