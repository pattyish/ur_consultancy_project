<?php
$getClients= "SELECT * FROM client WHERE client.client_status = 1 ORDER BY client.client_name ASC";
$getClients = mysqli_query($connect,$getClients);
$countClients =mysqli_num_rows($getClients);
if($countClients > 0)
{
    while($line=mysqli_fetch_object($getClients))
    {
        $clientId = $line -> client_id ;
        $clients = $line -> client_name; 
        ?>
        <option value = "<?php echo $clientId; ?>"><?php echo $clients; ?></option>
        <?php
    }
}
?>