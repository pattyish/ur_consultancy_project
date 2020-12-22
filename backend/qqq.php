<?php
session_start();
$myId = $_SESSION['User_ID'];
$userId = $_POST['userId'];
echo $userId;
?>