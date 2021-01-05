<div class="modal fade" id="view_contracts<?php echo $user_id;  ?>">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Contract on  <b><span class="text-primary"><span
                                class="text-danger"><?php echo $consultancy_name ; ?></span></span></b></h4>
            </div>
            <div class="modal-body">
                <table>
                <tr>
                        <td style="padding: 10px; font-weight: bold;">Consultant Names</td>
                        <td><?php echo $user_first_name."  ".$user_last_name; ?></td>
                    </tr>
                    <tr>
                        <td style="padding: 10px; font-weight: bold;">Consultant ID</td>
                        <td><?php echo $user_national_id; ?></td>
                    </tr>
                    <tr>
                        <td style="padding: 10px; font-weight: bold;">Consultant Email</td>
                        <td><?php echo $user_email; ?></td>
                    </tr>
                    <tr>
                        <td style="padding: 10px; font-weight: bold;">School</td>
                        <td><?php echo $school_name; ?></td>
                    </tr>
                    <tr>
                        <td style="padding: 10px; font-weight: bold;">Department</td>
                        <td><?php echo $department_name; ?></td>
                    </tr>
                    <tr>
                        <td style="padding: 10px; font-weight: bold;">Contract Signed-Date</td>
                        <td><?php echo $contract_sign_date; ?></td>
                    </tr>
                    <tr>
                        <td style="padding: 10px; font-weight: bold;">Contract Start-Date</td>
                        <td><?php echo  $contract_start_date; ?></td>
                    </tr>
                    <tr>
                        <td style="padding: 10px; font-weight: bold;">Contract End-Date</td>
                        <td><?php echo $contract_end_date; ?></td>
                    </tr>
                    <tr>
                        <td style="padding: 10px; font-weight: bold;">Contract Amount</td>
                        <td><?php echo $contract_amount; ?></td>
                    </tr>
                    <tr>
                        <td style="padding: 10px; font-weight: bold;">Status</td>
                        <td class="text-success" style="font-weight: bold;"><?php echo $consultancy_progress; ?></td>
                    </tr>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                <a href="#" class="btn btn-primary"><i class="fa fa-file"></i> Generate Contract</a>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>