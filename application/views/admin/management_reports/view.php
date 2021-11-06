<!doctype html>
<html lang="en" dir="ltr">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<link rel="icon" href="favicon.ico" type="image/x-icon"/>
<title>Management Reports || Admin || Harold</title>

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
                        <h1 class="page-title">Management Reports</h1>
                        <ol class="breadcrumb page-breadcrumb">
                          <li class="breadcrumb-item"><a href="<?php echo site_url('dashboard'); ?>">Dashboard</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Management Reports</li>
                        </ol>
                    </div>

                    <ul class="nav nav-tabs page-header-tab">
                        <li class="nav-item"><a class="nav-link active show" data-toggle="tab" href="#Management-all">View All Management Reports</a></li>
                        <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#Management-incident-all">View All Children Incidents</a></li>
                        <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#Management-staff-all">View All Staff Shift</a></li>
                        <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#Management-add">Add Management Reports</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="section-body mt-4">
            <div class="container-fluid">
                <div class="tab-content">
                    
                    <!-- Calendar Events -->
                    <div class="tab-pane active" id="Management-all">
                        <script>
                        function delete_management_reports(id){
                          var del_id = id;
                          if(confirm("Are you sure you want to delete this management report")){
                          $.post('<?php echo base_url('management_reports/delete_management_reports'); ?>', {"del_id": del_id}, function(data){
                            alert('Deleted Successfully');
                            location.reload();
                            $('#cti').html(data)
                            });
                          }
                        }
                        
                        </script>
                        
                        <script>
                            $(function(){
                              $('#downloadable').click(function(){
                                 
                                 window.location.href = "<?php echo site_url('management_reports/download') ?>?file_name="+ $(this).attr('href');
                              });
                            });
                        </script>

                        <p id='cti'></p>

                        <div class="table-responsive">
                          <table class="table table-hover table-vcenter text-nowrap js-basic-example dataTable table-striped table_custom border-style spacing5">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Title</th>
                                        <th>Body</th>
                                        <th>Availability</th>
                                        <th>Staff Shift</th>
                                        <th>Repair was performed by</th>
                                        <th>Repair date</th>
                                        <th>Date</th>
                                        <th>Action</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                  <?php if($management_reports){ foreach($management_reports as $management){ ?>
                                    <tr>
                                        <td><?php echo $management->id; ?></td>
                                        <td><span class="font-16"><?php echo $management->title; ?></span></td>
                                        <td><?php echo $management->body; ?></td>
                                        <td><?php echo $management->availabilty; ?></td>
                                        <td><?php echo date('l, dS M Y',strtotime($management->staff_shift)); ?></td>
                                        <td><span class="font-16"><?php echo $management->repair_performed_by; ?></span></td>
                                        <td><?php echo date('l, dS M Y',strtotime($management->repair_date)); ?></td>
                                        <td><?php echo date('l, dS M Y',strtotime($management->created_date)); ?></td>
                                        <!--<td><a id="downloadable" href="/uploads/storage/<?php echo $document->doc; ?>" target="_blank">Download</a></td>-->
                                        <td><a href="<?php echo site_url('management_reports/edit_management_reports/'.$management->id); ?>">Edit</a></td>
                                        <td><button type="button" onclick="delete_management_reports(<?php echo $management->id; ?>)">Delete</button></td>
                                    </tr>
                                  <?php } }else{ echo ''; } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    
                    <div class="tab-pane" id="Management-incident-all">
                        <script>
                        function delete_management_incidents(id){
                          var del_id = id;
                          if(confirm("Are you sure you want to delete this management report")){
                          $.post('<?php echo base_url('management_reports/delete_management_incidents'); ?>', {"del_id": del_id}, function(data){
                            alert('Deleted Successfully');
                            location.reload();
                            $('#cti').html(data)
                            });
                          }
                        }
                        
                        </script>
                        
                        <script>
                            $(function(){
                              $('#downloadable').click(function(){
                                 
                                 window.location.href = "<?php echo site_url('management_reports/download') ?>?file_name="+ $(this).attr('href');
                              });
                            });
                        </script>

                        <p id='cti'></p>

                        <div class="table-responsive">
                          <table class="table table-hover table-vcenter text-nowrap js-basic-example dataTable table-striped table_custom border-style spacing5">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Title</th>
                                        <th>Child's name</th>
                                        <th>Incident</th>
                                        <th>Child's House</th>
                                        <th>Date</th>
                                        <th>Action</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                  <?php if($management_incidents){ foreach($management_incidents as $incidents){ ?>
                                    <tr>
                                        <td><?php echo $incidents->id; ?></td>
                                        <td><span class="font-16"><?php echo $incidents->title; ?></span></td>
                                        <td><?php echo $incidents->child_name; ?></td>
                                        <td><?php echo $incidents->incident; ?></td>
                                        <td><span class="font-16"><?php echo $incidents->child_house; ?></span></td>
                                        <td><?php echo date('l, dS M Y',strtotime($incidents->created_date)); ?></td>
                                        <td><a href="<?php echo site_url('management_reports/edit_management_incidents/'.$incidents->id); ?>">Edit</a></td>
                                        <td><button type="button" onclick="delete_management_incidents(<?php echo $incidents->id; ?>)">Delete</button></td>
                                    </tr>
                                  <?php } }else{ echo ''; } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    
                    <div class="tab-pane" id="Management-staff-all">
                        <script>
                        function delete_management_staff(id){
                          var del_id = id;
                          if(confirm("Are you sure you want to delete this management staff")){
                          $.post('<?php echo base_url('management_reports/delete_management_staff'); ?>', {"del_id": del_id}, function(data){
                            alert('Deleted Successfully');
                            location.reload();
                            $('#cti').html(data)
                            });
                          }
                        }
                        
                        </script>
                        
                        <script>
                            $(function(){
                              $('#downloadable').click(function(){
                                 
                                 window.location.href = "<?php echo site_url('management_reports/download') ?>?file_name="+ $(this).attr('href');
                              });
                            });
                        </script>

                        <p id='cti'></p>

                        <div class="table-responsive">
                          <table class="table table-hover table-vcenter text-nowrap js-basic-example dataTable table-striped table_custom border-style spacing5">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Staff name</th>
                                        <th>Shift start time</th>
                                        <th>Shift end time</th>
                                        <th>Availability</th>
                                        <th>Date</th>
                                        <th>Action</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                  <?php if($management_staff){ foreach($management_staff as $stf){ ?>
                                    <tr>
                                        <td><?php echo $stf->id; ?></td>
                                        <td><span class="font-16"><?php echo $stf->fullname; ?></span></td>
                                        <td><?php echo $stf->shift_start_time; ?></td>
                                        <td><?php echo $stf->shift_end_time; ?></td>
                                        <td><span class="font-16"><?php echo $stf->availability; ?></span></td>
                                        <td><?php echo date('l, dS M Y',strtotime($stf->shift_date)); ?></td>
                                        <td><a href="<?php echo site_url('management_reports/edit_management_staff/'.$stf->id); ?>">Edit</a></td>
                                        <td><button type="button" onclick="delete_management_staff(<?php echo $stf->id; ?>)">Delete</button></td>
                                    </tr>
                                  <?php } }else{ echo ''; } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    
                    <div class="tab-pane show" id="Management-add">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Add Management Reports</h3>
                            </div>
                            <div class="card-body">
                                <form action="<?php echo base_url('management_reports/add_management_reports'); ?>" method="post" enctype="multipart/form-data" accept-charset="UTF-8">
                                    <div class="row">
                                        <div class="col-md-4 col-sm-12">
                                            <div class="form-group">
                                                <label>Title <span class="text-danger">*</span></label>
                                                <input type="text" name="title" class="form-control" value="">
                                            </div>
                                        </div>
                                        
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label>Body</label>
                                                <textarea name="body" class="form-control" aria-label="With textarea"></textarea>
                                            </div>
                                        </div>
                                        
                                        <div class="col-md-4 col-sm-12">
                                            <div class="form-group">
                                                <label>Availability <span class="text-danger">*</span></label>
                                                <select class="form-control" name="availabilty">
                                                    <option>Select</option>
                                                    <option value="Busy">Busy</option>
                                                    <option value="Free">Free</option>
                                                </select>
                                            </div>
                                        </div>
                                        
                                        <div class="col-md-4 col-sm-12">
                                            <div class="form-group">
                                                <label>Staff Shift <span class="text-danger">*</span></label>
                                                <input type="date" name="staff_shift" class="form-control" value="">
                                            </div>
                                        </div>
                                        
                                        <div class="col-md-4 col-sm-12">
                                            <div class="form-group">
                                                <label>Repair was Performed by <span class="text-danger">*</span></label>
                                                <input type="text" name="repair_performed_by" class="form-control" value="">
                                            </div>
                                        </div>
                                        
                                        <div class="col-md-4 col-sm-12">
                                            <div class="form-group">
                                                <label>Repaired was done on <span class="text-danger">*</span></label>
                                                <input type="date" name="repair_date" class="form-control" value="">
                                            </div>
                                        </div>
                                        
                                        <div class="col-md-4 col-sm-12">
                                            <div class="form-group">
                                                <label>Uploaded on <span class="text-danger">*</span></label>
                                                <input type="date" name="created_date" class="form-control" value="">
                                            </div>
                                        </div>
                                        
                                    </div>

                                    <div class="row">
                                        <div class="col-sm-12 text-right m-t-20">
                                            <button type="submit" name="add" class="btn btn-primary">SAVE</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Add Management Children's Incidents</h3>
                            </div>
                            <div class="card-body">
                                <form action="<?php echo base_url('management_reports/add_management_incidents'); ?>" method="post" enctype="multipart/form-data" accept-charset="UTF-8">
                                    <div class="row">
                                        <div class="col-md-4 col-sm-12">
                                            <div class="form-group">
                                                <label>Title <span class="text-danger">*</span></label>
                                                <input type="text" name="title" class="form-control" value="">
                                            </div>
                                        </div>
                                        
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label>Incident</label>
                                                <textarea name="incident" class="form-control" aria-label="With textarea"></textarea>
                                            </div>
                                        </div>
                                        
                                        <div class="col-md-4 col-sm-12">
                                            <div class="form-group">
                                                <label>Child Name <span class="text-danger">*</span></label>
                                                <select class="form-control" name="child_name">
                                                    <option>Select</option>
                                                    <?php foreach($children as $child){ ?>
                                                    <option value="<?php echo $child->fullname; ?>"><?php echo $child->fullname; ?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                        </div>
                                        
                                        <div class="col-md-4 col-sm-12">
                                            <div class="form-group">
                                                <label>Child House <span class="text-danger">*</span></label>
                                                <select class="form-control" name="child_house">
                                                    <option>Select</option>
                                                    <option value="House A">House A</option>
                                                    <option value="House B">House B</option>
                                                    <option value="House C">House C</option>
                                                </select>
                                            </div>
                                        </div>
                                        
                                        <div class="col-md-4 col-sm-12">
                                            <div class="form-group">
                                                <label>Uploaded on <span class="text-danger">*</span></label>
                                                <input type="date" name="created_date" class="form-control" value="">
                                            </div>
                                        </div>
                                        
                                    </div>

                                    <div class="row">
                                        <div class="col-sm-12 text-right m-t-20">
                                            <button type="submit" name="add_incident" class="btn btn-primary">SAVE</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Add Management Staff Shift</h3>
                            </div>
                            <div class="card-body">
                                <form action="<?php echo base_url('management_reports/add_management_staff'); ?>" method="post" enctype="multipart/form-data" accept-charset="UTF-8">
                                    <div class="row">
                                        <div class="col-md-4 col-sm-12">
                                            <div class="form-group">
                                                <label>Staff Fullname <span class="text-danger">*</span></label>
                                                <select class="form-control" name="fullname">
                                                    <option>Select</option>
                                                    <?php foreach($staff as $stf){ ?>
                                                    <option value="<?php echo $stf->firstname; ?> <?php echo $stf->lastname; ?>"><?php echo $stf->firstname; ?> <?php echo $stf->lastname; ?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                        </div>
                                        
                                        <div class="col-md-4 col-sm-12">
                                            <div class="form-group">
                                                <label>Shift Start time <span class="text-danger">*</span></label>
                                                <select class="form-control" name="shift_start_time">
                                                    <option>Select</option>
                                                    <option value="9am">9am</option>
                                                    <option value="10am">10am</option>
                                                    <option value="11am">11am</option>
                                                    <option value="12apm">12apm</option>
                                                    <option value="1pm">1pm</option>
                                                    <option value="2pm">2pm</option>
                                                    <option value="3pm">3pm</option>
                                                    <option value="4pm">4pm</option>
                                                </select>
                                            </div>
                                        </div>
                                        
                                        <div class="col-md-4 col-sm-12">
                                            <div class="form-group">
                                                <label>Shift End time <span class="text-danger">*</span></label>
                                                <select class="form-control" name="shift_end_time">
                                                    <option>Select</option>
                                                    <option value="9am">9am</option>
                                                    <option value="10am">10am</option>
                                                    <option value="11am">11am</option>
                                                    <option value="12apm">12apm</option>
                                                    <option value="1pm">1pm</option>
                                                    <option value="2pm">2pm</option>
                                                    <option value="3pm">3pm</option>
                                                    <option value="4pm">4pm</option>
                                                </select>
                                            </div>
                                        </div>
                                        
                                        <div class="col-md-4 col-sm-12">
                                            <div class="form-group">
                                                <label>Availability <span class="text-danger">*</span></label>
                                                <select class="form-control" name="availability">
                                                    <option>Select</option>
                                                    <option value="Busy">Busy</option>
                                                    <option value="Free">Free</option>
                                                </select>
                                            </div>
                                        </div>
                                        
                                        <div class="col-md-4 col-sm-12">
                                            <div class="form-group">
                                                <label>Shift Date <span class="text-danger">*</span></label>
                                                <input type="date" name="shift_date" class="form-control" value="">
                                            </div>
                                        </div>
                                        
                                    </div>

                                    <div class="row">
                                        <div class="col-sm-12 text-right m-t-20">
                                            <button type="submit" name="add_staff" class="btn btn-primary">SAVE</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        
                    </div>
                    <!-- End of Reminders -->
                    
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
