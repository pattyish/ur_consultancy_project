<div class="modal fade" id="edit_client<?php echo $clientId; ?>">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title"> Update <b><span class="text-danger"><?php echo $clients; ?></span></b> Info.
                </h4>
            </div>
            <div class="modal-body">
                <form role="form" id="editClient">
                    <table>
                        <tr class="form-group">
                            <td style="padding: 7px;"> <label for="">
                                    Client Name:</label></br>
                                <input type="text" style="width: 400px;" value="<?php echo  $clients; ?>"
                                    class="form-control" id="clientName" placeholder="Name">
                            </td>
                        </tr>
                        <tr>
                            <td style="padding: 7px;"> <label for="">Client Email</label></br>
                                <input type="email" style="width: 400px;" value="<?php echo $email; ?>"
                                    class="form-control" id="clientEmail" placeholder="Email">
                            </td>
                        </tr>
                        <tr>
                            <td style="padding: 7px;"><label>Country</label></br>
                                <select id="country" class="form-control select2" multiple="multiple"
                                    data-placeholder="Select a State" style="width: 400px;">
                                    <option value = "<?php echo $countryId; ?>" selected><?php echo $country; ?></option>
                                    <?php include 'backend/getCountries.php'; ?>
                                </select>
                            </td>
                        </tr>

                    </table>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-success">Update Client</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>