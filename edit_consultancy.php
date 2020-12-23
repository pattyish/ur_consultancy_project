<?php include 'public/includes/header_link.php';?>
<?php include 'public/includes/layouts/header.php';?>
<?php include 'public/includes/layouts/left_bar_side.php';?>
<?php 
include 'backend/Database.php';
$consultancy_id = $_GET['consultancy_id'];
// file to retrieve all existing consultants and show them in table with possible options
$retrieve = "SELECT * FROM consultancy INNER JOIN client INNER JOIN consultancy_progress ON
consultancy.consultancy_client_id = client.client_id AND 
consultancy.consultancy_progress = consultancy_progress.consultancy_progress_id WHERE 
consultancy.consultancy_progress = 1 AND consultancy.consultancy_id = $consultancy_id";
$retrieve = mysqli_query($connect,$retrieve);
$retrieveCount = mysqli_num_rows($retrieve);
if($retrieveCount > 0)
{
    while($lineRetrieve = mysqli_fetch_object($retrieve))
    {
        $consultancy_id = $lineRetrieve -> consultancy_id;
        $consultancy_name = $lineRetrieve -> consultancy_name;
        $consultancy_sign_date = $lineRetrieve -> consultancy_sign_date;
        $consultancy_start_date = $lineRetrieve -> consultancy_start_date;
        $consultancy_end_date = $lineRetrieve -> consultancy_end_date;
        $consultancy_amount = $lineRetrieve -> consultancy_amount;
        $consultancy_currency = $lineRetrieve -> consultancy_currency;
        $consultancy_UR_percentage = $lineRetrieve -> consultancy_UR_percentage;
        $consultancy_Tax_percentage = $lineRetrieve -> consultancy_Tax_percentage;
        $consultancy_consultants_percentage = $lineRetrieve -> consultancy_consultants_percentage;
        $consultancy_progress = $lineRetrieve -> consultancy_progress_name;
        $client = $lineRetrieve -> client_name;
        $client_id = $lineRetrieve -> client_id;
    }
}
        ?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>

        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Dashboard</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content" style="margin-top: 20px;">
        <!-- Main row -->
        <div class="row">
            <div class="col-md-12">
                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">Edit Consultancy</h3>
                    </div>
                    <form class="form" id="editConsultancyForm">
                        <div class=""
                            style="padding: 20px; border: 1px solid rgba(60, 141, 188, 0.3); border-radius: 5px;">
                            <legend style="font-weight: bold;"> Consultancy Details </legend>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">Consultance-Name</label>
                                        <input type="text" id="consultancy_name"
                                            value="<?php echo $consultancy_name; ?>"
                                            placeholder="Consultancy Title......" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label for="">Consultancy-Sign-Date</label>
                                        <input type="text" id="start_date" value="<?php echo $consultancy_sign_date; ?>"
                                            class="form-control" disabled>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Consultancy-Start-Date</label>
                                        <input type="date" id="start_date" min="<?php echo $consultancy_sign_date; ?>"
                                            value="<?php echo $consultancy_start_date; ?>"
                                            placeholder="Consultancy Start Date....." class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label for="">Consultancy-End-Date</label>
                                        <input type="date" id="end_date" min="<?php echo $consultancy_sign_date; ?>"
                                            value="<?php echo $consultancy_end_date; ?>"
                                            placeholder="Consultancy Sign Date....." class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">Total-Amount</label>
                                        <input type="number" min="10" step="any" id="amount" placeholder="Cash......"
                                            value="<?php echo $consultancy_amount; ?>" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label for="">Currency</label>
                                        <select name="currency" class="form-control" id="currency">
                                            <option value="<?php echo $consultancy_currency; ?>">
                                                <?php echo $consultancy_currency; ?></option>
                                            <option value="RWF">RWF</option>
                                            <option value="USD">USD</option>
                                            <option value="EUROS">EUROS</option>
                                            <option value="POUNDS">POUNDS</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Choose Client</label>
                                        <select class="form-control select2" multiple="multiple" id="client"
                                            name="client" data-placeholder="Select a client..." style="width: 100%;">
                                            <option value="<?php echo $client_id; ?>" selected><?php echo $client; ?>
                                            <option>
                                                <?php include 'backend/getClients.php' ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <legend style="font-weight: bold;"> Charges Fees Percentage </legend>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="">UR-Percentage</label>
                                                <input type="number" min="10" step="any" id="chargesToUr"
                                                    value="<?php echo $consultancy_UR_percentage; ?>"
                                                    placeholder="UR part..." class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="">Tax-Percentage</label>
                                                <input type="number" min="10" step="any" id="taxCharges"
                                                    value="<?php echo $consultancy_Tax_percentage; ?>"
                                                    placeholder="Tax charges..." class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12 text-left">
                                <input type="hidden" id="consultancyId" value="<?php echo $consultancy_id; ?>">
                                    <button type="submit" class="btn btn-success"
                                        style="padding: 7px; font-size: 15px;">Save changes</button>
                                    &nbsp; &nbsp; <span style="font-size: 20px;" id="editConsultancyFeedback"></span>
                                </div>
                            </div>
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