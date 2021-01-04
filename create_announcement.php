<?php include 'public/includes/header_link.php';?>
<?php include 'public/includes/layouts/header.php';?>
<?php include 'public/includes/layouts/left_bar_side.php';?>

<!-- below ul tag is to help us load new sms automatically -->
<ul class="users-list clearfix" id="userToChatWith" style="display: none;">
</ul>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>

        </h1>
        <ol class="breadcrumb">
            <li><a href="Home"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Dashboard</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content" style="margin-top:20px;">
        <!-- Main row -->
            <div class="row">
                <div class="col-md-12">
                    <div class="box">
                        <form id="saveAnnouncmentForm">
                            <div class="box-header">
                                <h3 class="box-title">
                                    Share Consultancy with others.
                                </h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="box-body">
                            <div class="mb-3">
                                <div class="form-group">
                                <label for="">link</label>
                                <input type="text" class="form-control" name="" id="link">
                                </div>
                                </div>
                                <div class="form-group">
                                    <textarea class="textarea form-control" id="description" placeholder="Place some text here"
                                        style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
                                </div>
                            </div>
                            <span id="addAnnouncementFeedback" style="font-size: 15px;"></span>
                            <div class="box-footer">
                                <button type="submit" id="saveCons" class="btn btn-success">Share Consultancy</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
    </section>
</div>
<!-- footer -->
<?php include "public/includes/footer.php"; ?>