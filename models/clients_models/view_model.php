<div class="modal fade" id="view_client<?php echo $clientId; ?>">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">More Detail On <b><?php echo $clients; ?></b> Client</h4>
            </div>
            <div class="modal-body" style="font-size: 15px;">
                <table>
                    <tr>
                        <td style="padding: 10px; font-weight: bold;">Client Title</td>
                        <td><?php echo  $clients; ?></td>
                    </tr>
                    <tr>
                        <td style="padding: 10px; font-weight: bold;">Email</td>
                        <td><?php echo $email; ?></td>
                    </tr>
                    <tr>
                        <td style="padding: 10px; font-weight: bold;">Country</td>
                        <td><?php echo  $country; ?></td>
                    </tr>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default pull-right" data-dismiss="modal">Close</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>