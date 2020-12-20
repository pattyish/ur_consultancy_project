<?php
// file to retrieve all existing clients and show them in table with possible options
$retrieve = "SELECT * FROM client INNER JOIN country ON client.client_id = country.country_id;";
$retrieve= mysqli_query($connect,$retrieve);
$retrieveCount = mysqli_num_rows($retrieve);
if($retrieveCount > 0)
{
    while($lineRetrieve = mysqli_fetch_object($retrieve))
    {
        $clientId = $lineRetrieve -> client_id;
        $clients = $lineRetrieve -> client_name;
        $email = $lineRetrieve -> client_email;
        $country = $lineRetrieve -> country_name;
        ?>
        <tr>
            <td><?php echo $clients; ?></td>
            <td><?php echo $email; ?></td>
            <td><?php echo $country; ?></td>
            <td>
                <div class="btn-group btn-group-sm table-button-div">
                    <a href="#" data-toggle="modal"
                        data-target=""
                        class=" btn btn-info table_button">
                        <i class="fa fa-eye"></i> View
                    </a>
                    <a href="#" data-toggle="modal"
                        data-target=""
                        class="btn btn-danger table_button">
                        <i class="fa fa-trash"></i> Delete
                    </a>
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