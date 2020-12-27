<div class="modal fade" id="create_group">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title"><b><span class="text-success">Create New Chatting Group</span> </b></h4>
            </div>
            <form class="form" id="createGroupFrom">
            <div class="modal-body">
                    <div class="form-group">
                        <label>Group Name</label>
                    </div>
                    <div class="form-group">
                        <input type="text" placeholder="Name of group with the maximim of 30 characters...." style="border-radius: 5px;"
                            class="form-control" name="groupName" id="groupName" maxlength ="30">
                    </div>
                    <div class="form-group">
                        <label>Group Description</label>
                    </div>
                    <div class="form-group">
                        <input type="text" placeholder="Decription of group with the maximum of 50 characters...." style="border-radius: 5px;"
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
<script>
 $(document).ready(function(){
   $("#createGroupFrom").on("submit",function(e){
        e.preventDefault();
        var groupName =$("#groupName").val();
        var description = $("#groupDescription").val();
        if($.trim(groupName).length == 0 || $.trim(description).length == 0)
        {
            $("#createGroupFeedback").html("<b><i class='text-red'>All fields are required</i></b>");
        }
        else
        {
            $("#createGroupFeedback").html("<b><i class='text-blue'>Creating</i></b>");
            $.ajax({
                type: "post",
                url: "backend/createGroup.php",
                data: {groupName : groupName, description : description},
                success: function(response)
                {
                    $("#createGroupFeedback").html("<b><i class='text-green'>"+response+"</i></b>");
                    
                    if(response.includes("created"))
                    {
                        $("#groupName").val("");
                        $("#groupDescription").val("");
                    }
                }
            });
        }
    });
});
</script>
