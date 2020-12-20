<?php

include 'Database.php';

$getCountries= "SELECT * FROM country";
$getCountries= mysqli_query($connect,$getCountries);
$countCountries=mysqli_num_rows($getCountries);
if($countCountries > 0)
{
    while($line=mysqli_fetch_object($getCountries))
    {
        $countries =$line -> country_name; 
    }
}
?>