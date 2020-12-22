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
                    <form class="form" id="addConsultancyForm">
                        <div class=""
                            style="padding: 20px; border: 1px solid rgba(60, 141, 188, 0.3); border-radius: 5px;">
                            <legend style="font-weight: bold;"> Consultancy Details </legend>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">Consultance-Name</label>
                                        <input type="text" id="consultancy_name" placeholder="Consultancy Title......"
                                            class="form-control">
                                    </div>
                                    <div class="form-group">
                                    <?php $contract_sign_date = date("Y-m-d"); ?>
                                        <label for="">Consultancy-Sign-Date</label>
                                        <input type="date" value="<?php echo $contract_sign_date; ?>" id="sign_date" placeholder="Consultancy Sign Date....."
                                            class="form-control" disabled>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Consultancy-Start-Date</label>
                                        <input type="date" id="start_date" min="<?php echo $contract_sign_date; ?>" placeholder="Consultancy Start Date....."
                                            class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label for="">Consultancy-End-Date</label>
                                        <input type="date" id="end_date" min="<?php echo $contract_sign_date; ?>" placeholder="Consultancy Sign Date....."
                                            class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">Total-Amount</label>
                                        <input type="number"  step="any" id="amount" placeholder="Cash......"
                                            class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label for="">Currency</label>
                                        <select name="currency" class="form-control" id="currency">
                                            <option value="">Select Currency...</option>
                                            <option value="RWF">RWF</option>
                                            <option value="USD">USD</option>
                                            <option value="EUROS">EUROS</option>
                                            <option value="POUNDS">POUNDS</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Choose Client</label>
                                        <select class="form-control select2" multiple="multiple"
                                            id="client" name="client" data-placeholder="Select a client..."
                                            style="width: 100%;">
                                            <?php include 'backend/getClients.php'; ?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <p>If Client not Exist, Follow this Link to first <a href="register_client.php">
                                                 <b>Register Client</b>
                                            </a>
                                        </p>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <legend style="font-weight: bold;"> Charges Fees Percentage </legend>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="">UR-Percentage</label>
                                                <input type="number" step="any" id="chargesToUr" placeholder="UR part..." class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="">Tax-Percentage</label>
                                                <input type="number" step="any" id="taxCharges" placeholder="Tax charges..." class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12 text-left">
                                    <button type="submit" class="btn btn-primary" style="padding: 10px; font-size: 17px;"> Submit</button>
                                    &nbsp; &nbsp; 
                                    <span style="font-size: 20px;" id="addConsultancyFeedback"></span>
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