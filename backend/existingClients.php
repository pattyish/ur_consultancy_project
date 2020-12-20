<?php
include 'Database.php';
// file to retrieve all existing clients and show them in table with possible options
$retrieve = "SELECT * FROM clients";
$retrieve= mysqli_query($connect,$retrieve);
$retrieveCount = mysqli_num_rows($retrieve);
if($retrieveCount > 0)
{
    while($lineRetrieve = mysqli_fetch_object($retrieve))
    {
        $lineRetrieve = $lineRetrieve -> ;
        $lineRetrieve = $lineRetrieve -> ;
        $lineRetrieve = $lineRetrieve -> ;
        $lineRetrieve = $lineRetrieve -> ;
        $lineRetrieve = $lineRetrieve -> ;
        $lineRetrieve = $lineRetrieve -> ;
    }
    echo "Show all clients";
}
else
{
    echo "No clients available";
}
?>