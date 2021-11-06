<!doctype html>
<html lang="en" dir="ltr">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<link rel="icon" href="favicon.ico" type="image/x-icon"/>
<?php foreach($vehicle_detail as $veh){} ?>
<title>Edit <?php echo $veh->title; ?> Vehicle Detail || HR || Harold</title>

<!-- Bootstrap Core and vandor -->
<link rel="stylesheet" href="https://scottnnaghor.com/harold/assets/plugins/bootstrap/css/bootstrap.min.css" />
<link rel="stylesheet" href="https://scottnnaghor.com/harold/assets/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.min.css">
<link rel="stylesheet" href="https://scottnnaghor.com/harold/assets/plugins/dropify/css/dropify.min.css">

<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">

<link rel="stylesheet" href="https://scottnnaghor.com/harold/assets/plugins/sweetalert/sweetalert.css">
<link rel="stylesheet" href="https://scottnnaghor.com/harold/assets/plugins/datatable/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="https://scottnnaghor.com/harold/assets/plugins/datatable/fixedeader/dataTables.fixedcolumns.bootstrap4.min.css">
<link rel="stylesheet" href="https://scottnnaghor.com/harold/assets/plugins/datatable/fixedeader/dataTables.fixedheader.bootstrap4.min.css">


<!-- Core css -->
<link rel="stylesheet" href="https://scottnnaghor.com/harold/assets/css/style.min.css"/>
</head>

<body class="font-muli theme-cyan gradient">

<!-- Page Loader -->
<div class="page-loader-wrapper">
    <div class="loader">
    </div>
</div>

<div id="main_content">
    <!-- Start project content area -->
    <?php include('menu/nav.php'); ?>
    <div class="page">
        <!-- Start Page header -->
        <div class="section-body">
            <div class="container-fluid">
                <div class="d-flex justify-content-between align-items-center">
                    <div class="header-action">
                        <h1 class="page-title">Vehicle Detail</h1>
                        <ol class="breadcrumb page-breadcrumb">
                            <li class="breadcrumb-item"><a href="<?php echo site_url('dashboard'); ?>">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="<?php echo site_url('vehicle_detail'); ?>">Vehicle Detail </a></li>
                            <li class="breadcrumb-item active" aria-current="page">Edit <?php echo $veh->title; ?> Vehicle Detail</li>
                        </ol>
                    </div>

                    <ul class="nav nav-tabs page-header-tab">
                        <li class="nav-item"><a class="nav-link active show" data-toggle="tab" href="#Vehicle-edit">Edit <?php echo $veh->title; ?> Vehicle Detail</a></li>
                        <!--<li class="nav-item"><a class="nav-link" data-toggle="tab" href="#Role-Model-add">Add</a></li>-->
                    </ul>
                </div>
            </div>
        </div>
        <div class="section-body mt-4">
            <div class="container-fluid">
                <div class="tab-content">
                    <div class="tab-pane active" id="Vehicle-edit">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Edit <?php echo $veh->title; ?> Vehicle Detail</h3>
                            </div>
                            <div class="card-body">
                                <form action="<?php echo base_url('vehicle_detail/edit_vehicle_detail/'.$veh->id); ?>" method="post" enctype="multipart/form-data" accept-charset="UTF-8">
                                    <div class="row">
                                        <div class="col-md-4 col-sm-12">
                                            <div class="form-group">
                                                <label>Vehicle Owner <span class="text-danger">*</span></label>
                                                <input type="text" name="vehicle_owner" class="form-control" value="<?php echo $veh->vehicle_owner; ?>">
                                            </div>
                                        </div>
                                        
                                        <div class="col-md-4 col-sm-12">
                                            <div class="form-group">
                                                <label>Vehicle <span class="text-danger">*</span></label>
                                                <input type="text" name="vehicle" class="form-control" value="<?php echo $veh->vehicle; ?>">
                                            </div>
                                        </div>
                                        
                                        <div class="col-md-4 col-sm-12">
                                            <div class="form-group">
                                                <label>Model of Vehicle <span class="text-danger">*</span></label>
                                                <input type="text" name="vehicle_model" class="form-control" value="<?php echo $veh->vehicle_model; ?>">
                                            </div>
                                        </div>
                                        
                                        <div class="col-md-4 col-sm-12">
                                            <div class="form-group">
                                                <label>Vehicle Number <span class="text-danger">*</span></label>
                                                <input type="text" name="vehicle_number" class="form-control" value="<?php echo $veh->vehicle_number; ?>">
                                            </div>
                                        </div>
                                        
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label>Insurance</label>
                                                <textarea name="insurance" class="form-control" aria-label="With textarea"><?php echo $veh->insurance; ?></textarea>
                                            </div>
                                        </div>
                                        
                                        <div class="col-md-4 col-sm-12">
                                            <div class="form-group">
                                                <label>Date <span class="text-danger">*</span></label>
                                                <input type="date" name="created_date" class="form-control" value="">
                                            </div>
                                        </div>
                                        
                                    </div>

                                    <div class="row">
                                        <div class="col-sm-12 text-right m-t-20">
                                            <button type="submit" name="edit" class="btn btn-primary">SAVE</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <!-- End of Role Model -->
                    
                </div>
            </div>
        </div>

    </div>
</div>

<!-- Start Main project js, jQuery, Bootstrap -->
<script src="https://scottnnaghor.com/harold/assets/bundles/lib.vendor.bundle.js"></script>

<!-- Start Plugin Js -->
<script src="https://scottnnaghor.com/harold/assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js"></script>
<script src="https://scottnnaghor.com/harold/assets/plugins/dropify/js/dropify.min.js"></script>
<script src="https://scottnnaghor.com/harold/assets/bundles/dataTables.bundle.js"></script>
<script src="https://scottnnaghor.com/harold/assets/plugins/sweetalert/sweetalert.min.js"></script>

<!-- Start project main js  and page js -->
<script src="https://scottnnaghor.com/harold/assets/js/core.js"></script>
<script src="https://scottnnaghor.com/harold/assets/js/form/dropify.js"></script>
<script src="https://scottnnaghor.com/harold/assets/js/page/dialogs.js"></script>
<script src="https://scottnnaghor.com/harold/assets/js/table/datatable.js"></script>

<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
<script defer src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>

<!--<script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
  <script>tinymce.init({selector:'textarea'});</script>-->

<script>
$(document).ready(function() {
      $('#summernote').summernote({
          tabsize: 2,
          height: 200
      });
  });
</script>

</body>
</html>
