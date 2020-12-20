<?php include 'public/includes/header_link.php';?>
<?php include 'public/includes/layouts/header.php';?>
<?php include 'public/includes/layouts/left_bar_side.php';?>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Record Consultancy
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Dashboard</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <!-- Main row -->
        <div class="row">
            <div class="col-md-12">
                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">Record Consultancy</h3>
                    </div>
                    <form id="regForm" role="form" action="">
                        <div class="tab"
                            style="padding: 20px; border: 1px solid rgba(60, 141, 188, 0.3); border-radius: 5px;">
                            <legend> Consultancy Details </legend>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">Consultance-Name</label>
                                        <input type="text" id="consultancy-name" placeholder="Consultancy Name......"
                                            class="form-control" oninput="this.className = ''">
                                    </div>
                                    <div class="form-group">
                                        <label for="">Consultancy-Sign-Date</label>
                                        <input type="date" placeholder="Consultancy Sign Date....." class="form-control"
                                            oninput="this.className = ''">
                                    </div>
                                    <div class="form-group">
                                        <label for="">Consultancy-Start-Date</label>
                                        <input type="date" placeholder="Consultancy Start Date....."
                                            class="form-control" oninput="this.className = ''">
                                    </div>
                                    <div class="form-group">
                                        <label for="">Consultancy-End-Date</label>
                                        <input type="date" placeholder="Consultancy Sign Date....." class="form-control"
                                            oninput="this.className = ''">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">Total-Amount</label>
                                        <input type="text" id="consultancy-name" placeholder="Consultancy Name......"
                                            class="form-control" oninput="this.className = ''">
                                    </div>
                                    <div class="form-group">
                                        <label for="">Currency</label>
                                        <select name="gender" class=form-control>
                                            <option>Select Currency</option>
                                            <option>Rwf</option>
                                            <option>Dollar</option>
                                            <option>Euro</option>
                                            <option>Pound</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Choose Client</label>
                                        <select class="form-control select2" multiple="multiple"
                                            data-placeholder="Select a State" style="width: 100%;">
                                            <option>Alabama</option>
                                            <option>Alaska</option>
                                            <option>California</option>
                                            <option>Delaware</option>
                                            <option>Tennessee</option>
                                            <option>Texas</option>
                                            <option>Washington</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="tab"
                            style="padding: 20px; border: 1px solid rgba(60, 141, 188, 0.3); border-radius: 5px;">
                            <legend> Personal </legend>
                            <div class="form-group">
                                <label for="">First-name</label>
                                <input placeholder="First name..." class="form-control" oninput="this.className = ''">
                            </div>
                            <div class="form-group">
                                <label for="">First-name</label>
                                <input placeholder="First name..." class="form-control" oninput="this.className = ''">
                            </div>
                            <div class="form-group">
                                <label for="">First-name</label>
                                <input placeholder="First name..." class="form-control" oninput="this.className = ''">
                            </div>
                            <div class="form-group">
                                <label for="">First-name</label>
                                <input placeholder="First name..." class="form-control" oninput="this.className = ''">
                            </div>
                        </div>

                        <div class="tab"
                            style="padding: 20px; border: 1px solid rgba(60, 141, 188, 0.3); border-radius: 5px;">
                            <legend> Personal </legend>
                            <div class="form-group">
                                <label for="">First-name</label>
                                <input placeholder="First name..." class="form-control" oninput="this.className = ''">
                            </div>
                            <div class="form-group">
                                <label for="">First-name</label>
                                <input placeholder="First name..." class="form-control" oninput="this.className = ''">
                            </div>
                            <div class="form-group">
                                <label for="">First-name</label>
                                <input placeholder="First name..." class="form-control" oninput="this.className = ''">
                            </div>
                            <div class="form-group">
                                <label for="">First-name</label>
                                <input placeholder="First name..." class="form-control" oninput="this.className = ''">
                            </div>
                        </div>

                        <div class="tab"
                            style="padding: 20px; border: 1px solid rgba(60, 141, 188, 0.3); border-radius: 5px;">
                            <legend> Personal </legend>
                            <div class="form-group">
                                <label for="">First-name</label>
                                <input placeholder="First name..." class="form-control" oninput="this.className = ''">
                            </div>
                            <div class="form-group">
                                <label for="">First-name</label>
                                <input placeholder="First name..." class="form-control" oninput="this.className = ''">
                            </div>
                        </div>

                        <div style="overflow:auto;">
                            <div style="float:right;">
                                <button type="button" id="prevBtn" style="margin-top: 15px;" class="btn btn-success"
                                    onclick="nextPrev(-1)">Previous</button>
                                <button type="button" class="btn btn-primary" style="margin-top: 15px;" id="nextBtn"
                                    onclick="nextPrev(1)">Next</button>
                            </div>
                        </div>

                        <!-- Circles which indicates the steps of the form: -->
                        <div style="text-align:center;margin-top:30px;">
                            <span class="step"></span>
                            <span class="step"></span>
                            <span class="step"></span>
                            <span class="step"></span>
                        </div>

                    </form>

                </div>
            </div>
        </div>
        <!-- /.row (main row) -->

    </section>
    <!-- /.content -->
</div>
<!-- footer -->
<?php include "public/includes/footer.php"; ?>
<script>
var currentTab = 0; // Current tab is set to be the first tab (0)
showTab(currentTab); // Display the current tab

function showTab(n) {
    // This function will display the specified tab of the form ...
    var x = document.getElementsByClassName("tab");
    x[n].style.display = "block";
    // ... and fix the Previous/Next buttons:
    if (n == 0) {
        document.getElementById("prevBtn").style.display = "none";
    } else {
        document.getElementById("prevBtn").style.display = "inline";
    }
    if (n == (x.length - 1)) {
        document.getElementById("nextBtn").innerHTML = "Submit";
    } else {
        document.getElementById("nextBtn").innerHTML = "Next";
    }
    // ... and run a function that displays the correct step indicator:
    fixStepIndicator(n)
}

function nextPrev(n) {
    // This function will figure out which tab to display
    var x = document.getElementsByClassName("tab");
    // Exit the function if any field in the current tab is invalid:
    if (n == 1 && !validateForm()) return false;
    // Hide the current tab:
    x[currentTab].style.display = "none";
    // Increase or decrease the current tab by 1:
    currentTab = currentTab + n;
    // if you have reached the end of the form... :
    if (currentTab >= x.length) {
        //...the form gets submitted:
        document.getElementById("regForm").submit();
        return false;
    }
    // Otherwise, display the correct tab:
    showTab(currentTab);
}

function validateForm() {
    // This function deals with validation of the form fields
    var x, y, i, valid = true;
    x = document.getElementsByClassName("tab");
    y = x[currentTab].getElementsByTagName("input");
    // A loop that checks every input field in the current tab:
    for (i = 0; i < y.length; i++) {
        // If a field is empty...
        if (y[i].value == "") {
            // add an "invalid" class to the field:
            y[i].className += " invalid";
            // and set the current valid status to false:
            valid = false;
        }
    }
    // If the valid status is true, mark the step as finished and valid:
    if (valid) {
        document.getElementsByClassName("step")[currentTab].className += " finish";
    }
    return valid; // return the valid status
}

function fixStepIndicator(n) {
    // This function removes the "active" class of all steps...
    var i, x = document.getElementsByClassName("step");
    for (i = 0; i < x.length; i++) {
        x[i].className = x[i].className.replace(" active", "");
    }
    //... and adds the "active" class to the current step:
    x[n].className += " active";
}
</script>