<?php
include 'Database.php';
// file to retrieve all existing consultants and show them in table with possible options
$retrieve = "SELECT * FROM consultancy INNER JOIN client INNER JOIN consultancy_progress ON
consultancy.consultancy_client_id = client.client_id AND 
consultancy.consultancy_progress = consultancy_progress.consultancy_progress_id WHERE 
consultancy.consultancy_progress = 2";
$retrieve = mysqli_query($connect,$retrieve);
$retrieveCount = mysqli_num_rows($retrieve);
if($retrieveCount > 0)
{
    while($lineRetrieve = mysqli_fetch_object($retrieve))
    {
        $consultancy_id = $lineRetrieve -> consultancy_id;
        $consultancy_name = $lineRetrieve -> consultancy_name;
        $consultancy_sign_date = $lineRetrieve -> consultancy_sign_date;
        $consultancy_start_date = $lineRetrieve -> consultancy_start_date;
        $consultancy_end_date = $lineRetrieve -> consultancy_end_date;
        $consultancy_amount = $lineRetrieve -> consultancy_amount;
        $consultancy_currency = $lineRetrieve -> consultancy_currency;
        $consultancy_UR_percentage = $lineRetrieve -> consultancy_UR_percentage;
        $consultancy_Tax_percentage = $lineRetrieve -> consultancy_Tax_percentage;
        $consultancy_consultants_percentage = $lineRetrieve -> consultancy_consultants_percentage;
        $consultancy_progress = $lineRetrieve -> consultancy_progress_name;
        $consultancy_client = $lineRetrieve -> client_name;
        ?>
<<<<<<< HEAD
<tr>
    <td><?php echo $consultancy_name; ?></td>
    <td><?php echo $consultancy_sign_date; ?></td>
    <td><?php echo $consultancy_start_date; ?></td>
    <td><?php echo $consultancy_end_date; ?></td>
    <td><?php echo $consultancy_amount; ?></td>
    <td class="text-success" style="font-weight: bold;"><?php echo $consultancy_progress; ?></td>
    <td>
        <div class="btn-group btn-group-sm table-button-div">
            <a href="#" data-toggle="modal" data-target="#view_completely<?php echo $consultancy_id; ?>" class=" btn btn-info table_button">
                <i class="fa fa-eye"></i> View
            </a>
        </div>
        <?php include 'models/consultancy_models/view_completely.php'; ?>
    </td>
</tr>

<?php
=======
        <tr>
            <td><?php echo $consultancy_name; ?></td>
            <td><?php echo $consultancy_sign_date; ?></td>
            <td><?php echo $consultancy_start_date; ?></td>
            <td><?php echo $consultancy_end_date; ?></td>
            <td><?php echo $consultancy_amount; ?></td>
            <td><?php echo $consultancy_UR_percentage; ?></td>
            <td><?php echo $consultancy_Tax_percentage; ?></td>
            <td class="text-green"><b><?php echo $consultancy_progress; ?></b></td>
            <td>
                <div class="btn-group btn-group-sm table-button-div">
                    <a href="#" data-toggle="modal" data-target="#view_completely"
                        class=" btn btn-info table_button">
                        <i class="fa fa-eye"></i> View
                    </a>
                </div>
                <?php include 'models/consultancy_models/view_completely.php'; ?>
            </td>
        </tr>
        <?php
>>>>>>> 84eec688b2a4af5d9cf996b4024e5f787bec0400
    }
}
else
{
    echo "";
}
?>