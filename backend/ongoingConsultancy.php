<?php
include 'Database.php';
// file to retrieve all existing consultants and show them in table with possible options
$retrieve = "SELECT * FROM consultancy INNER JOIN client INNER JOIN consultancy_progress ON
consultancy.consultancy_client_id = client.client_id AND 
consultancy.consultancy_progress = consultancy_progress.consultancy_progress_id WHERE 
consultancy.consultancy_progress = 1";
$retrieve = mysqli_query($connect,$retrieve);
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
    echo "Show all consultancy";
}
else
{
    echo "No consultancts available";
}
?>