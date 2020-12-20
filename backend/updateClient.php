<?php
include 'Database.php';
$clientId = $connect -> real_escape_string($_POST['']);
$clientName = $connect -> real_escape_string($_POST['']);
$clientEmail = $connect -> real_escape_string($_POST['']);
$clientCountry = $connect -> real_escape_string($_POST['']);
// file to retrieve all existing consultants and show them in table with possible options
$update = $update -> prepare("UPDATE client SET client.client_name ='$clientName' ,client.client_email ='$clientEmail' ,client.country_id ='$clientCountry' WHERE client.client_id = $clientId");
$update = bind_param("ssii",$clientName,$clientEmail,$clientCountry,$clientId);
$update -> execute();
if($update)
{
    echo "Client updated.";
}
else
{
    echo "Client not updated. Something is wrong.";
}
?>