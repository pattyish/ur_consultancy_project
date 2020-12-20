$(document).ready(function(){

    // Adding new user
    $("#saveConsultant").on("submit",function(e){
        e.preventDefault();
        var fName = $("#fName").val();
        var lName = $("#lName").val();
        var gender = $("#gender").val();
        var natId = $("#natId").val();
        var userEmail = $("#userEmail").val();
        var userType = $("#userType").val();
        var country = $("#country").val();
        if($.trim(fName).length == 0 || $.trim(lName).length == 0 || $.trim(gender).length == 0
         || $.trim(natId).length == 0 || $.trim(userEmail).length == 0 || $.trim(userType).length == 0
         || $.trim(country).length == 0)
        {
            $("#feedback").html("All fields are required.");
        }
        else
        {
            $("#feedback").html("Saving...");
            // AJAX to link to backend/addUser
            $.ajax({
                type:"post",
                url:"backend/addUser.php",
                data: {fName : fName, lName : lName, gender : gender, natId : natId , userEmail : userEmail, userType : userType, country : country},
                success: function(response)
                {
                    $("#feedback").html(response);
                    if(response.includes("successfully"))
                    {
                        $("#fName").val("");
                        $("#lName").val("");
                        $("#gender").val("");
                        $("#natId").val("");
                        $("#userEmail").val("");
                        $("#userType").val("");
                        $("#country").val("");
                    }
                }
            });   
        }
    });

    // Adding new client
    $("#addClientForm").on("submit",function(e){
        e.preventDefault();
        var cName = $("#clientName").val();
        var cEmail = $("#clientEmail").val();
        var country = $("#country").val();
        if($.trim(cName).length == 0 || $.trim(cEmail).length == 0 || $.trim(country).length == 0)
        {
            $("#addClientFeedback").html("All fields are required.");
        }
        else
        {
            $("#addClientFeedback").html("Saving...");
            // AJAX to link to backend/addUser
            $.ajax({
                type:"post",
                url:"backend/addClient.php",
                data: {cName : cName, cEmail : cEmail, country : country},
                success: function(response)
                {
                    $("#addClientFeedback").html(response);
                    if(response.includes("successfully"))
                    {
                        $("#clientName").val("");
                        $("#clientEmail").val("");
                        $("#country").val("");
                    }
                }
            });   
        }
    });
});