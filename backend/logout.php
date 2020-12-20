<?php
session_start();
include 'Database.php';
if(isset($_SESSION['User_ID']))
{
    $MyId = $_SESSION['User_ID'];
    //update last active
    $lastActive = "UPDATE users SET user_last_active= Now() WHERE user_id=$MyId";
    $lastActive = mysqli_query($connect,$lastActive);
    session_destroy();
    ?>
    <script>
        window.location.href='Welcome';
    </script>
    <?php
}
else
{
    ?>
    <script>
        window.location.href='login.html';
    </script>
    <?php
}
?>