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
            $("#feedback").html("<b><i class='text-red'>All fields are required.</i></b>");
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
                    $("#feedback").html("<b><i class='text-red'>"+response+"</i></b>");
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
                            $("#consultancy_name").val("");
                            $("#start_date").val("");
                            $("#end_date").val("");
                            $("#amount").val("");
                            $("#currency").val("");
                            $("#chargesToUr").val("");
                            $("#taxCharges").val("");
                            $("#client").val("");
                        }
                    }
                });  
            }
        }
    });

    // Changing Password
    $("#changePasswordForm").on("submit",function(e){
        e.preventDefault();
        var OP = $("#oldPassword").val();
        var NP = $("#newPassword").val();
        var CNP = $("#cNewPassword").val();
        if($.trim(OP).length == 0 || $.trim(NP).length == 0 || $.trim(CNP).length == 0)
        {
            $("#changePasswordFeedback").html("<b><i class='text-red'>All fields are required.</i></b>");
        }
        else
        {
            if(NP.length < 6)
            {
                $("#changePasswordFeedback").html("<b><i class='text-red'>Password should be least 6 characters.</i></b>");
            }
            else if(NP != CNP)
            {
                $("#changePasswordFeedback").html("<b><i class='text-red'>Confirmed password is not correct.</i></b>");
            }
            else if(OP == CNP && OP == NP)
            {
                $("#changePasswordFeedback").html("<b><i class='text-red'>Your new password seems to be the same as the oldest password.</i></b>");
            }
            else
            {
                $("#changePasswordFeedback").html("<b><i class='text-blue'>Wait... Changes are being saved.</i></b>");
                // AJAX to link to backend/changeYourPassword
                $.ajax({
                    type: "post",
                    url: "backend/changeYourPassword.php",
                    data: {OP : OP, NP : NP, CNP : CNP},
                    success: function(response)
                    {
                        $("#changePasswordFeedback").html(response);
                        if(response.includes("Changed"))
                        {
                            $("#oldPassword").val("");
                            $("#newPassword").val("");
                            $("#cNewPassword").val("");
                        }
                    }
                });  
            }
        }
    });

    // Updating user profile
    $("#UpdateProfile").on("submit",function(e){
        e.preventDefault();
        var fName = $("#firstName").val();
        var lName = $("#lastName").val();
        var gender = $("#Gender").val();
        var natId = $("#natId").val();
        var userEmail = $("#userEmail").val();
        var userPhone = $("#phone").val();
        var userType = parseInt($("#userType").val());
        var country = parseInt($("#country").val());
        var department = parseInt($("#department").val());
        var userLocation = $("#userLocation").val();
        var userEducation = $("#userEducation").val();
        var userSummary = $("#userSummary").val();
        if($.trim(fName).length == 0 || $.trim(lName).length == 0 || $.trim(gender).length == 0
        || $.trim(natId).length == 0 || $.trim(userEmail).length == 0 || $.trim(userPhone).length == 0 || $.trim(userType).length == 0
        || $.trim(country).length == 0 || $.trim(department).length == 0 || $.trim(userLocation).length == 0
        || $.trim(userEducation).length == 0 || $.trim(userSummary).length == 0)
        {
            $("#updateProfileFeedback").html("<b><i class='text-red'>All fields are required.</i></b>");
        }
        else
        {
            $("#updateProfileFeedback").html("<b><i class='text-blue'>Wait... Changes are being saved.</i></b>");
            // AJAX to link to backend/changeProfile
            $.ajax({
                type: "post",
                url: "backend/changeProfile.php",
                data: {fName : fName, lName : lName, gender : gender, natId : natId, userEmail : userEmail, userPhone : userPhone, userType : userType, country : country, department : department, userLocation : userLocation, userEducation : userEducation, userSummary : userSummary},
                success: function(response)
                {
                    $("#updateProfileFeedback").html("<b><i class='text-green'>"+response+"</i></b>");
                    if(response.includes("changed"))
                    {
                        setTimeout(function() {
                            window.location.href="profile.php";  
                        }, 3000);
                    }
                }
            }); 
        }
    });
});