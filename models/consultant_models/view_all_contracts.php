<div class="modal fade" id="view_all_contracts<?php echo $consultant_contract_id; ?>">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">More details </h4>
            </div>
            <div class="modal-body">
                <table>
                    <tr>
                        <td style="padding: 10px;" class="text-bold">Consultant</td>
                        <td><?php echo $user_first_name." ".$user_last_name; ?></td>
                    </tr>
                    <tr>
                        <td style="padding: 10px;" class="text-bold">Consultancy Title</td>
                        <td><?php echo $consultancy_name; ?></td>
                    </tr>
                    <tr>
                        <td style="padding: 10px;" class="text-bold">Status</td>
                        <td class="text-warning" style="font-weight: bold;"><?php echo $consultancy_progress_name; ?></td>
                    </tr>
                </table>
            </div>
            <div class="modal-footer">
            Close button
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<script>
$(document).ready(function(){
    
});
</script>