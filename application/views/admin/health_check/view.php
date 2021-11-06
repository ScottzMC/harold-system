<?php 
    
    /*function convertToEventFormat($timestamp){
        $diffBtwCurrentTimeAndTimeStamp = (time() - $timestamp);
        $periodsString = ["sec", "min","hr","day","week","month","year","decade"];
        $periodNumbers = ["60" , "60" , "24" , "7" , "4.35" , "12" , "10"];
        for(@@$iterator = 0; $diffBtwCurrentTimeAndTimeStamp >= $periodNumbers[$iterator]; $iterator++)
            @@$diffBtwCurrentTimeAndTimeStamp /= $periodNumbers[$iterator];
            $diffBtwCurrentTimeAndTimeStamp = round($diffBtwCurrentTimeAndTimeStamp);
    
        if($diffBtwCurrentTimeAndTimeStamp != 1)  $periodsString[$iterator].="s";
            $output = "$diffBtwCurrentTimeAndTimeStamp $periodsString[$iterator]";
            echo "Created " .$output. " ago";
    }*/

?>

<!doctype html>
<html lang="en" dir="ltr">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<link rel="icon" href="favicon.ico" type="image/x-icon"/>
<title>Health & Safety Checks || Admin || Harold</title>

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
                        <h1 class="page-title">Health & Safety Checks</h1>
                        <ol class="breadcrumb page-breadcrumb">
                          <li class="breadcrumb-item"><a href="<?php echo site_url('dashboard'); ?>">Dashboard</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Health & Safety Checks</li>
                        </ol>
                    </div>

                    <ul class="nav nav-tabs page-header-tab">
                        <li class="nav-item"><a class="nav-link active show" data-toggle="tab" href="#Health-all">View All Health & Safety Checks</a></li>
                        <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#Health-add">Add Health & Safety Checks</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="section-body mt-4">
            <div class="container-fluid">
                <div class="tab-content">
                    
                    <!-- Calendar Events -->
                    <div class="tab-pane active" id="Health-all">
                        <script>
                        function delete_health_check(id){
                          var del_id = id;
                          if(confirm("Are you sure you want to delete this health & safety check")){
                          $.post('<?php echo base_url('reminder/delete_health_check'); ?>', {"del_id": del_id}, function(data){
                            alert('Deleted Successfully');
                            location.reload();
                            $('#cti').html(data)
                            });
                          }
                        }
                        
                        </script>

                        <p id='cti'></p>

                        <div class="table-responsive">
                          <table class="table table-hover table-vcenter text-nowrap js-basic-example dataTable table-striped table_custom border-style spacing5">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Title</th>
                                        <th>Body</th>
                                        <th>Outcome of Medical appointment</th>
                                        <th>Child feedback</th>
                                        <th>Task completed by</th>
                                        <th>Status</th>
                                        <th>Time</th>
                                        <th>Date</th>
                                        <th>Action</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                  <?php if($health_check){ foreach($health_check as $health){ ?>
                                    <tr>
                                        <td><?php echo $health->id; ?></td>
                                        <td><span class="font-16"><?php echo $health->title; ?></span></td>
                                        <td><?php echo $health->body; ?></td>
                                        <td><?php echo $health->medical_outcome; ?></td>
                                        <td><?php echo $health->child_feedback; ?></td>
                                        <td><?php echo $health->completed_by; ?></td>
                                        <td><?php echo $health->status; ?></td>
                                        <td><?php echo $health->created_time; ?></td>
                                        <td><?php echo date('l, dS M Y',strtotime($health->created_date)); ?></td>
                                        <td><a href="<?php echo site_url('health_check/edit_health_check/'.$health->id); ?>">Edit</a></td>
                                        <td><button type="button" onclick="delete_health_check(<?php echo $health->id; ?>)">Delete</button></td>
                                    </tr>
                                  <?php } }else{ echo ''; } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    
                    
                    <div class="tab-pane show" id="Health-add">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Add Health & Safety Checks</h3>
                            </div>
                            <div class="card-body">
                                <form action="<?php echo base_url('health_check/add_health_check'); ?>" method="post" enctype="multipart/form-data" accept-charset="UTF-8">
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
                                        
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label>Outcome of Medical appointment</label>
                                                <textarea name="medical_outcome" class="form-control" aria-label="With textarea"></textarea>
                                            </div>
                                        </div>
                                        
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label>Child feedback</label>
                                                <textarea name="child_feedback" class="form-control" aria-label="With textarea"></textarea>
                                            </div>
                                        </div>
                                        
                                        <div class="col-md-4 col-sm-12">
                                            <div class="form-group">
                                                <label>Check Time <span class="text-danger">*</span></label>
                                                <select class="form-control" name="created_time">
                                                    <option>Select</option>
                                                    <option value="9am">9am</option>
                                                    <option value="9:30am">9:30am</option>
                                                    <option value="10am">10am</option>
                                                    <option value="10:30am">10:30am</option>
                                                    <option value="11am">11am</option>
                                                    <option value="11:30am">11:30am</option>
                                                    <option value="12pm">12pm</option>
                                                    <option value="12:30m">12:30pm</option>
                                                    <option value="1pm">1pm</option>
                                                    <option value="1:30pm">1:30pm</option>
                                                    <option value="2pm">2pm</option>
                                                    <option value="2:30pm">2:30pm</option>
                                                    <option value="3pm">3pm</option>
                                                    <option value="3:30pm">3:30pm</option>
                                                    <option value="4pm">4pm</option>
                                                    <option value="4:30pm">4:30pm</option>
                                                    <option value="5pm">5pm</option>
                                                    <option value="5:30pm">5:30pm</option>
                                                    <option value="6pm">6pm</option>
                                                    <option value="6:30pm">6:30pm</option>
                                                    <option value="7pm">7pm</option>
                                                    <option value="7:30pm">7:30pm</option>
                                                    <option value="8pm">8pm</option>
                                                    <option value="8:30pm">8:30pm</option>
                                                    <option value="9pm">9pm</option>
                                                    <option value="9:30pm">9:30pm</option>
                                                </select>
                                            </div>
                                        </div>
                                        
                                        <div class="col-md-4 col-sm-12">
                                            <div class="form-group">
                                                <label>Completed by <span class="text-danger">*</span></label>
                                                <input type="text" name="completed_by" class="form-control" value="">
                                            </div>
                                        </div>
                                        
                                        <div class="col-md-4 col-sm-12">
                                            <div class="form-group">
                                                <label>Check Date <span class="text-danger">*</span></label>
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
