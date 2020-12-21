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
        var department = $("#department").val();
        if($.trim(fName).length == 0 || $.trim(lName).length == 0 || $.trim(gender).length == 0
         || $.trim(natId).length == 0 || $.trim(userEmail).length == 0 || $.trim(userType).length == 0
         || $.trim(country).length == 0 || $.trim(department).length == 0)
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
                data: {fName : fName, lName : lName, gender : gender, natId : natId , userEmail : userEmail, userType : userType, country : country, department : department},
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

    // Adding new consultancy
    $("#addConsultancyForm").on("submit",function(e){
        e.preventDefault();
        var cName = $("#consultancy_name").val();
        var sign_date = $("#sign_date").val();
        var start_date = $("#start_date").val();
        var end_date = $("#end_date").val();
        var amount = parseInt($("#amount").val());
        var currency = $("#currency").val();
        var ur_charges = parseInt($("#chargesToUr").val());
        var tax_charges = parseInt($("#taxCharges").val());
        var all_charges = ur_charges + tax_charges;
        var consultant_charges = 100 - all_charges;
        var client = parseInt($("#client").val());
        if($.trim(cName).length == 0 || $.trim(sign_date).length == 0
        || $.trim(start_date).length == 0 || $.trim(end_date).length == 0 || $.trim(amount).length == 0
        || $.trim(currency).length == 0 || $.trim(ur_charges).length == 0 || $.trim(tax_charges).length == 0 || $.trim(client).length == 0)
        {
            $("#addConsultancyFeedback").html("<i class='text-red'><b>All fields are required. "+client+"</b></i>");
        }
        else
        {
            if(start_date > end_date)
            {
                $("#addConsultancyFeedback").html("<i class='text-red'><b>Start date should be the date before the end date.</b></i>"); 
            }
            else if(all_charges >= 100)
            {
                $("#addConsultancyFeedback").html("<i class='text-red'><b>Consider changing your charges percentages. It seems to be unusual.</b></i>"); 
            }
            else
            {
                $("#addConsultancyFeedback").html("<i class='text-blue'><b>Saving...</b></i>");
                // AJAX to link to backend/addConsultancy.php
                  $.ajax({
                    type:"post",
                    url:"backend/addConsultancy.php",
                    data: {name : cName, sign_date : sign_date, start_date : start_date, end_date : end_date,
                            amount  : amount, currency : currency, ur_charges : ur_charges, tax_charges : tax_charges,
                            consultant_charges : consultant_charges, client : client},
                    success: function(response)
                    {
                        $("#addConsultancyFeedback").html("<i class='text-blue'><b>"+response+"</b></i>");
                        if(response.includes("successfully"))
                        {
                            /*$("#consultancy_name").val("");
                            $("#start_date").val("");
                            $("#end_date").val("");
                            $("#amount").val("");
                            $("#currency").val("");
                            $("#chargesToUr").val("");
                            $("#taxCharges").val("");
                            $("#client").val(""); */
                        }
                    }
                });  
            }
        }
    });
});