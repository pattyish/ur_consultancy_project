<?php
include 'Database.php';
$userId = ;
$user_status = 2;
// file to retrieve all existing clients and show them in table with possible options
$disabling = $connect ->prepare("UPDATE users SET users.user_status_id = ? WEHRE users.user_id = ?");
$disabling= bind_param("ii",$user_status,$userId);
$disabling -> execute();
if($disabling)
{
    echo "Request applied";
}
else
{
    echo "Request failed";
}
?>