<?php include 'public/includes/header_link.php';?>
<?php include 'public/includes/layouts/header.php';?>
<?php include 'public/includes/layouts/left_bar_side.php';?>

<!-- below ul tag is to help us load new sms automatically -->
<ul class="users-list clearfix" id="userToChatWith" style="display: none;">
</ul>

<?php
$client_id = $_GET['client_id'];
// file to retrieve all existing clients and show them in table with possible options
$retrieve = "SELECT * FROM client INNER JOIN country ON 
client.country_id = country.country_id WHERE client.client_status = 1 AND client.client_id = $client_id;";
$retrieve= mysqli_query($connect,$retrieve);
$retrieveCount = mysqli_num_rows($retrieve);
if($retrieveCount > 0)
{
    while($lineRetrieve = mysqli_fetch_object($retrieve))
    {
        $clientId = $lineRetrieve -> client_id;
        $clients = $lineRetrieve -> client_name;
        $email = $lineRetrieve -> client_email;
        $countryId = $lineRetrieve -> country_id;
        $country = $lineRetrieve -> country_name;
    }
}
        ?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Edit Client Info
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
                        <h3 class="box-title">Add New Consultant</h3>
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->
                    <form role="form" id="editClientForm">
                        <div class="box-body">
                            <div class="row">
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <label for="">Client Name</label>
                                        <input type="text" value="<?php echo $clients; ?>" class="form-control" id="clientName" placeholder="Name">
                                    </div>
                                    <div class="form-group">
                                        <label for="">Client Email</label>
                                        <input type="email" value="<?php echo $email;?>" class="form-control" id="clientEmail" placeholder="Email">
                                    </div>
                                    <div class="form-group">
                                        <label>Country</label>
                                        <select id="country" class="form-control select2" multiple="multiple"
                                            data-placeholder="Select a State">
                                            <option value="<?php echo $countryId; ?>" selected><?php echo $country; ?>
                                            </option>
                                            <?php include 'backend/getCountries.php'; ?>
                                        </select>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <!-- /.box-body -->

                        <div class="box-footer">
                            <input type="hidden" id="client_id" value="<?php echo $client_id; ?>">
                            <button type="submit" class="btn btn-primary">Update Client</button>&nbsp;&nbsp;&nbsp;
                            <span style="font-size: 10px;" id="editClientFeedback"></span>
                        </div>
                    </form>
                </div>
                <!-- /.box -->
            </div>
        </div>
        <!-- /.row (main row) -->

    </section>
    <!-- /.content -->
</div>
<!-- footer -->
<?php include "public/includes/footer.php"; ?>