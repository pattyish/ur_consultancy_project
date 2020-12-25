<div class="modal fade" id="edit_consultant<?php echo $user_id;  ?>">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title"><b>Re-activate <?php echo $fName." ".$lName ?></b></h4>
              </div>
              <div class="modal-body">
                <p>Clicking re-activate button will restore this user. If you are sure, 
                you can simply click there to restore.</p>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                <button type="button" id="reActivateUser" value="<?php echo $user_id; ?>" class="btn btn-success">Re-activate</button>
              </div>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>