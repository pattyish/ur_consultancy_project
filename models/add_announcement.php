<div class="modal fade" id="add_announcement">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title"><b><span class="text-success">Create Announcement</span> </b></h4>
            </div>
            <form class="form" id="createGroupFrom">
            <div class="modal-body">
                    <div class="form-group">
                        <label>Announcement Title</label>
                    </div>
                    <div class="form-group">
                        <input type="text" placeholder="Title...." style="border-radius: 5px;"
                            class="form-control" name="groupName" id="groupName" maxlength ="30">
                    </div>
                    <div class="form-group">
                        <label>Consultancy Link</label>
                    </div>
                    <div class="form-group">
                        <input type="text" placeholder="Consultancy Link...." style="border-radius: 5px;"
                            class="form-control" id="groupDescription" id="groupDescription" maxlength ="50">
                    </div>
               
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button> &nbsp;&nbsp;
                <span style="font-size: 15px;" id="createGroupFeedback"></span> &nbsp;&nbsp;
                <button type="submit" id="createGroup" class="btn btn-primary">Create Group</button>
            </div>
        </div>
        </form>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
