<?php
session_start();
$myId = $_SESSION['User_ID'];

include 'Database.php'; // include database connection

// declaration of variables needed to insert a new user
$client_id = $_POST['client_id'];
$name = $connect -> real_escape_string($_POST['cName']);
$email = $connect -> real_escape_string($_POST['cEmail']);
$email = strtolower($email);
$address = $_POST['country'];

// check uniqueness of Account info: email and name of a client
$query_check = "SELECT * FROM client WHERE (client.client_email='$email' OR client.client_name='$name') AND client.client_id != $client_id ";
$query_check = mysqli_query($connect,$query_check);
$count_check = mysqli_num_rows($query_check);

if($count_check > 0)
{
    echo "Remember, client name and email should be unique. So, you are causing conflicts.";
}
else
{
    // Query to update client info
    $Update=$connect ->prepare("UPDATE client SET client_name = ?, client_email = ?, country_id = ? WHERE client.client_id= ? ");
    $Update->bind_param("ssii",$name,$email,$address,$client_id);
    $Update->execute();
    if($Update)
    {
        echo "Updated";
    }
    else
    {
        echo "A request failed. Something went wrong.";
    }
}  

?>