<?php
// file to retrieve all existing clients and show them in table with possible options
$retrieve = "SELECT * FROM client INNER JOIN country ON client.client_id = country.country_id
 WHERE client.client_status = 2;";
$retrieve= mysqli_query($connect,$retrieve);
$retrieveCount = mysqli_num_rows($retrieve);
if($retrieveCount > 0)
{
    while($lineRetrieve = mysqli_fetch_object($retrieve))
    {
        $clientId = $lineRetrieve -> client_id;
        $clients = $lineRetrieve -> client_name;
        $email = $lineRetrieve -> client_email;
        $countryId = $lineRetrieve -> country_id;
        $country = $lineRetrieve -> country_name;
        ?>
<tr>
    <td><?php echo $clients; ?></td>
    <td><?php echo $email; ?></td>
    <td><?php echo $country; ?></td>
    <td>
        <?php include 'models/clients_models/view_model.php'; ?>
        <div class="btn-group btn-group-sm table-button-div">
            <a href="#" data-toggle="modal" data-target="#view_client<?php echo $clientId; ?>"
                class=" btn btn-info table_button">
                <i class="fa fa-eye"></i> View
            </a>
            <a href="#" data-toggle="modal" data-target="#activate_client<?php echo $clientId; ?>"
                class=" btn btn-warning table_button">
                <i class="fa fa-toggle-on"></i> Activate
            </a>
            <?php include 'models/clients_models/activate_client.php'; ?>
        </div>

    </td>
</tr>
<?php
    }
}
else
{
    echo "No clients available";
}
?>