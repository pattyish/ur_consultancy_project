<div class="modal fade" id="view_completely<?php echo $consultancy_id; ?>">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">More details about <b><span class="text-primary"><span
                                class="text-success"><?php echo $consultancy_name ; ?></span></span></b></h4>
            </div>
            <div class="modal-body">
                <table>
                    <tr>
                        <td style="padding: 10px; font-weight: bold;">Consultancy Title</td>
                        <td><?php echo  $consultancy_name ; ?></td>
                    </tr>
                    <tr>
                        <td style="padding: 10px; font-weight: bold;">Client name</td>
                        <td><?php echo  $consultancy_client ; ?></td>
                    </tr>
                    <tr>
                        <td style="padding: 10px; font-weight: bold;">Signed-Date</td>
                        <td><?php echo$consultancy_sign_date; ?></td>
                    </tr>
                    <tr>
                        <td style="padding: 10px; font-weight: bold;">Start-Date</td>
                        <td><?php echo $consultancy_start_date; ?></td>
                    </tr>
                    <tr>
                        <td style="padding: 10px; font-weight: bold;">End-Date</td>
                        <td><?php echo $consultancy_end_date; ?></td>
                    </tr>
                    <tr>
                        <td style="padding: 10px; font-weight: bold;">Amount</td>
                        <td><?php echo $consultancy_amount; ?></td>
                    </tr>
                    <tr>
                        <td style="padding: 10px; font-weight: bold;">Currency</td>
                        <td class=""><?php echo $consultancy_currency; ?></td>
                    </tr>
                    <tr>
                        <td style="padding: 10px; font-weight: bold;">UR-Charges(%)</td>
                        <td><?php echo $consultancy_UR_percentage; ?></td>
                    </tr>
                    <tr>
                        <td style="padding: 10px; font-weight: bold;">Taxes-Charges(%)</td>
                        <td><?php echo $consultancy_Tax_percentage; ?></td>
                    </tr>
                    <tr>
                        <td style="padding: 10px; font-weight: bold;">Consultacy Payment(%)</td>
                        <td><?php echo  $consultancy_consultants_percentage; ?></td>
                    </tr>
                    <tr>
                        <td style="padding: 10px; font-weight: bold;">Status</td>
                        <td class="text-success" style="font-weight: bold;"><?php echo $consultancy_progress; ?></td>
                    </tr>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>