<?php
include 'Database.php';
// file to retrieve all existing consultants and show them in table with possible options
$retrieve = "SELECT * FROM consultant_contract INNER JOIN users INNER JOIN consultancy INNER JOIN consultancy_progress ON 
consultant_contract.contract_consultant_id = users.user_id AND consultant_contract.contract_consultancy_id = consultancy.consultancy_id
AND consultant_contract.contract_progress_id = consultancy_progress.consultancy_progress_id ";
$retrieve = mysqli_query($connect,$retrieve);
$retrieveCount = mysqli_num_rows($retrieve);
if($retrieveCount > 0)
{
    while($lineRetrieve = mysqli_fetch_object($retrieve))
    {
        // consultancy
        $consultancy_id = $lineRetrieve -> consultancy_id;
        $consultancy_name = $lineRetrieve -> consultancy_name;
        $consultancy_currency = $lineRetrieve -> consultancy_currency;
        // contract
        $consultant_contract_id = $lineRetrieve -> consultant_contract_id;
        $contract_sign_date = $lineRetrieve -> contract_sign_date;
        $contract_start_date = $lineRetrieve -> contract_start_date;
        $contract_end_date = $lineRetrieve -> contract_end_date;
        $contract_amount = $lineRetrieve -> contract_amount;
        $contract_progress_id = $lineRetrieve -> contract_progress_id;
        $consultancy_progress_name = $lineRetrieve -> consultancy_progress_name;
        // consultant
        $user_first_name = $lineRetrieve -> user_first_name;
        $user_last_name = $lineRetrieve -> user_last_name;
        ?>
<tr>
    <td><?php echo $user_first_name." ".$user_last_name; ?></td>
    <td><?php echo $consultancy_name; ?></td>
    <td><?php echo $contract_start_date; ?></td>
    <td><?php echo $contract_end_date; ?></td>
    <td><?php echo $contract_amount; ?></td>
    <td class="text-success" style="font-weight: bold;"><?php echo $consultancy_progress_name; ?></td>
    <!--
    <td>
        <div class="btn-group btn-group-sm table-button-div">
            <a href="#" data-toggle="modal" data-target="#view_all_contracts<?php // echo $consultant_contract_id; ?>"
                class=" btn btn-info table_button">
                <i class="fa fa-eye"></i> View
            </a>
        </div>
        <?php // include 'models/consultant_models/view_all_contracts.php'; ?>
    </td>
    -->
</tr>

<?php
    }
}
else
{
    echo "";
}
?>
<input type="hidden" id="totalCompletedConsultancy" value="<?php echo $retrieveCount; ?>">