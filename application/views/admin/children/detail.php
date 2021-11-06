<!doctype html>
<html lang="en" dir="ltr">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<link rel="icon" href="favicon.ico" type="image/x-icon"/>
<?php foreach($children as $child){} ?>
<title><?php echo $child->fullname; ?> Children || Admin || Harold</title>

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
                        <h1 class="page-title">Children</h1>
                        <ol class="breadcrumb page-breadcrumb">
                            <li class="breadcrumb-item"><a href="<?php echo site_url('dashboard'); ?>">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="<?php echo site_url('children'); ?>">Children </a></li>
                            <li class="breadcrumb-item active" aria-current="page">Edit <?php echo $child->fullname; ?> Children</li>
                        </ol>
                    </div>

                    <ul class="nav nav-tabs page-header-tab">
                        <li class="nav-item"><a class="nav-link active show" data-toggle="tab" href="#Children-profile">Edit <?php echo $child->fullname; ?> Children</a></li>
                        <!--<li class="nav-item"><a class="nav-link" data-toggle="tab" href="#Role-Model-add">Add</a></li>-->
                    </ul>
                </div>
            </div>
        </div>
        <div class="section-body mt-4">
            <div class="container-fluid">
                <div class="tab-content">
                    
                    <div class="tab-pane active" id="Children-profile">
                        <div class="row">
                            <div class="col-xl-4 col-md-12">
                                <div class="card">
                                    <div class="card-body w_user">
                                        <div class="user_avtar">
                                            <img class="rounded-circle" src="https://scottnnaghor.com/harold/uploads/children/<?php echo $child->image; ?>" alt="<?php echo $child->fullname; ?>">
                                        </div>
                                        <div class="wid-u-info">
                                            <h5><?php echo $child->fullname; ?></h5>
                                            <p class="text-muted m-b-0"><?php echo $child->address; ?></p>
                                        </div>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-header">
                                        <h3 class="card-title">About Me</h3>
                                        <!--<div class="card-options ">
                                            <a href="#" class="card-options-collapse" data-toggle="card-collapse"><i class="fe fe-chevron-up"></i></a>
                                            <a href="#" class="card-options-remove" data-toggle="card-remove"><i class="fe fe-x"></i></a>
                                        </div>-->
                                    </div>
									<div class="card-body">
										<ul class="list-group">
                                            <li class="list-group-item">
                                                <b>Age </b>
                                                <div class="pull-right"><?php echo $child->age; ?></div>
                                            </li>
                                            <li class="list-group-item">
                                                <b>DOB </b>
                                                <div class="pull-right"><?php echo date('l, dS M Y',strtotime($child->dob)); ?></div>
                                            </li>
                                            <li class="list-group-item">
                                                <b>Gender </b>
                                                <div class="pull-right"><?php echo $child->gender; ?></div>
                                            </li>
                                            <li class="list-group-item">
                                                <b>Child Status </b>
                                                <div class="pull-right"><?php echo $child->child_status; ?></div>
                                            </li>
                                            <li class="list-group-item">
                                                <b>Support Hours </b>
                                                <div class="pull-right"><?php echo $child->support_hours; ?></div>
                                            </li>
                                            <li class="list-group-item">
                                                <b>Ethnic Background </b>
                                                <div class="pull-right"><?php echo $child->ethnic; ?></div>
                                            </li>
                                            <li class="list-group-item">
                                                <b>Move In/Out </b>
                                                <div class="pull-right"><?php echo date('l, dS M Y',strtotime($child->move_in_out)); ?></div>
                                            </li>
                                            <li class="list-group-item">
                                                <b>Department</b>
                                                <div class="pull-right"><?php echo $child->guardian; ?></div>
                                            </li>
                                            <li class="list-group-item">
                                                <b>Email </b>
                                                <div class="pull-right"><?php echo $child->email; ?></div>
                                            </li>
                                            <li class="list-group-item">
                                                <b>Phone</b>
                                                <div class="pull-right"><?php echo $child->telephone; ?></div>
                                            </li>
                                            <li class="list-group-item">
                                                <b>House Name</b>
                                                <div class="pull-right"><?php echo $child->house_name; ?></div>
                                            </li>
                                            <li class="list-group-item">
                                                <b>Guardian Full Name</b>
                                                <div class="pull-right"><?php echo $child->guardian_fullname; ?></div>
                                            </li>
                                            <li class="list-group-item">
                                                <b>Guardian Email</b>
                                                <div class="pull-right"><?php echo $child->guardian_email; ?></div>
                                            </li>
                                            <li class="list-group-item">
                                                <b>Guardian Telephone</b>
                                                <div class="pull-right"><?php echo $child->guardian_telephone; ?></div>
                                            </li>
                                            <li class="list-group-item">
                                                <b>Guardian Address</b>
                                                <div class="pull-right"><?php echo $child->guardian_address; ?></div>
                                            </li>
                                        </ul>
                                    </div>
                                    
                                    <?php if(!empty($social_worker)){ foreach($social_worker as $social){} ?>
                                    <div class="card-header">
                                        <h3 class="card-title">Social Worker</h3>
                                    </div>
                                    <div class="card-body">
										<ul class="list-group">
                                            <li class="list-group-item">
                                                <b>FullName </b>
                                                <div class="pull-right"><?php echo $social->fullname; ?></div>
                                            </li>
                                            <li class="list-group-item">
                                                <b>Email Address </b>
                                                <div class="pull-right"><?php echo $social->email; ?></div>
                                            </li>
                                            <li class="list-group-item">
                                                <b>Mobile Number </b>
                                                <div class="pull-right"><?php echo $social->mobile; ?></div>
                                            </li>
                                            <li class="list-group-item">
                                                <b>Address </b>
                                                <div class="pull-right"><?php echo $social->address; ?></div>
                                            </li>
                                            <li class="list-group-item">
                                                <b>Date </b>
                                                <div class="pull-right"><?php echo date('l, dS M Y',strtotime($social->created_date)); ?></div>
                                            </li>
                                        </ul>
                                    </div>
                                    <?php } ?>
                                    
                                    <div class="card-footer text-center">
                                        <div class="row">
											<div class="col-md-4 col-sm-4 col-6">
												<?php if(!empty($count_absences)){ foreach($count_absences as $count_abs){} ?>
												<div class="font-18 font-weight-bold"><?php echo $count_abs->total_abs; ?></div>
												<?php }else{ ?>
												<div class="font-18 font-weight-bold">0</div>
												<?php } ?>
												<div>Absences</div>
											</div>
											<div class="col-md-4 col-sm-4 col-6">
											    <?php if(!empty($count_disciplinaries)){ foreach($count_disciplinaries as $count_disc){} ?>
												<div class="font-18 font-weight-bold"><?php echo $count_disc->total_disc; ?></div>
												<?php }else{ ?>
												<div class="font-18 font-weight-bold">0</div>
												<?php } ?>
												<div>Disciplinaries</div>
											</div>
											<div class="col-md-4 col-sm-4 col-6">
											    <?php if(!empty($count_incidents)){ foreach($count_incidents as $count_inc){} ?>
												<div class="font-18 font-weight-bold"><?php echo $count_inc->total_inc; ?></div>
												<?php }else{ ?>
												<div class="font-18 font-weight-bold">0</div>
												<?php } ?>
												<div>Incidents</div>
											</div>
											<div class="col-md-4 col-sm-4 col-6">
												<?php if(!empty($count_sanction)){ foreach($count_sanction as $count_san){} ?>
												<div class="font-18 font-weight-bold"><?php echo $count_san->total_sanc; ?></div>
												<?php }else{ ?>
												<div class="font-18 font-weight-bold">0</div>
												<?php } ?>
												<div>Sanction Rewards</div>
											</div>
										</div>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="col-xl-8 col-md-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h3 class="card-title">Medical History</h3>
                                    </div>
                                    <?php if(!empty($medical)){ foreach($medical as $med){} ?>
                                    <div class="card-body">
                                        <div class="timeline_item ">
                                            <small class="float-right text-right"><?php echo date('l, dS M Y',strtotime($med->created_date)); ?></small></span>
                                            <h6 class="font600"><?php echo $med->title; ?></h6>
                                            <div class="msg">
                                                <p><?php echo $med->body; ?></p>
                                            </div>                                
                                        </div>
                                    </div>
                                    <?php } ?>
                                </div>
                                
                                <div class="card">
                                    <div class="card-header">
                                        <h3 class="card-title">Personal Education</h3>
                                    </div>
                                    <?php if(!empty($education)){ foreach($education as $edu){} ?>
                                    <div class="card-body">
                                        <div class="timeline_item ">
                                            <small class="float-right text-right"><?php echo date('l, dS M Y',strtotime($edu->created_date)); ?></small></span>
                                            <h6 class="font600"><?php echo $edu->title; ?></h6>
                                            <div class="msg">
                                                <p><?php echo $edu->body; ?></p>
                                            </div>                                
                                        </div>
                                    </div>
                                    <?php } ?>
                                </div>
                                
                                <div class="card">
                                    <div class="card-header">
                                        <h3 class="card-title">Finance Information</h3>
                                    </div>
                                    <?php if(!empty($finance)){ foreach($finance as $fin){} ?>
                                    <div class="card-body">
                                        <div class="timeline_item ">
                                            <small class="float-right text-right"><?php echo date('l, dS M Y',strtotime($fin->created_date)); ?></small></span>
                                            <h6 class="font600"><?php echo $fin->title; ?></h6>
                                            <div class="msg">
                                                <p><?php echo $fin->body; ?></p>
                                            </div>                                
                                        </div>
                                    </div>
                                    <?php } ?>
                                </div>
                                
                                <div class="card">
                                    <div class="card-header">
                                        <h3 class="card-title">Foster Carer</h3>
                                    </div>
                                    <?php if(!empty($foster_care)){ foreach($foster_care as $foster){} ?>
                                    <div class="card-body">
                                        <div class="timeline_item ">
                                            <small class="float-right text-right"><?php echo date('l, dS M Y',strtotime($foster->created_date)); ?></small></span>
                                            <h6 class="font600"><?php echo $foster->title; ?></h6>
                                            <div class="msg">
                                                <p><?php echo $foster->body; ?></p>
                                            </div>                                
                                        </div>
                                    </div>
                                    <?php } ?>
                                </div>
                                
                                <div class="card">
                                    <div class="card-header">
                                        <h3 class="card-title">Disciplinaries</h3>
                                    </div>
                                    <?php if(!empty($disciplinaries)){ foreach($disciplinaries as $disc){ ?>
                                    <div class="card-body">
                                        <div class="timeline_item">
                                            <span><small class="float-right text-right"><?php echo date('l, dS M Y',strtotime($disc->created_date)); ?></small></span>
                                            <h6 class="font600"><?php echo $disc->title; ?></h6>
                                            <div class="msg">
                                                <p><?php echo $disc->body; ?></p>
                                            </div>       
                                            <small class="float-right text-right"><a href="<?php echo site_url('printout_report/edit_disciplinaries/'.$disc->id.'/'.strtolower($disc->code)); ?>"> Edit</a></small>
                                        </div>
                                    </div>
                                    <?php } } ?>
                                </div>
                                
                                <div class="card">
                                    <div class="card-header">
                                        <h3 class="card-title">Induction</h3>
                                    </div>
                                    <?php if(!empty($children)){ ?>
                                    <div class="card-body">
                                        <div class="timeline_item ">
                                            <div class="msg">
                                                <p><?php echo $child->induction; ?></p>
                                            </div>                                
                                        </div>
                                    </div>
                                    <?php } ?>
                                </div>
                                
                                <div class="card">
                                    <div class="card-header">
                                        <h3 class="card-title">Complaint</h3>
                                    </div>
                                    <?php if(!empty($children)){ ?>
                                    <div class="card-body">
                                        <div class="timeline_item ">
                                            <div class="msg">
                                                <p><?php echo $child->complaint; ?></p>
                                            </div>                                
                                        </div>
                                    </div>
                                    <?php } ?>
                                </div>
                                
                                <div class="card">
                                    <?php foreach($incidents as $inc){} ?>
                                    <form action="<?php echo base_url('children/detail/'.$inc->code); ?>" method="POST">    
                                    <div class="card-header">
                                        <h3 class="card-title">Incidents</h3>
                                    </div>
                                    <?php if(!empty($incidents)){ foreach($incidents as $inc){ ?>
                                    <div class="card-body">
                                        <div class="timeline_item ">
                                            <input type="hidden" name="created_date" value="<?php echo $inc->created_date; ?>">
                                            <span><small class="float-right text-right"><?php echo date('l, dS M Y',strtotime($inc->created_date)); ?></small></span>
                                            <input type="hidden" name="title" value="<?php echo $inc->title; ?>">
                                            <h6 class="font600"><?php echo $inc->title; ?></h6>
                                            <div class="msg">
                                                <input type="hidden" name="body" value="<?php echo $inc->body; ?>">
                                                <p><?php echo $inc->body; ?></p>
                                            </div>       
                                            <small class="float-right text-right"><a href="<?php echo site_url('printout_report/edit_incidents/'.$inc->id.'/'.strtolower($inc->code)); ?>"> Edit</a></small>
                                        </div>
                                    </div>
                                    <?php } } ?>
                                        <small class="float-right text-right"><button type="submit" name="send_incident" class="btn btn-primary">SEND MAIL</button></small>
                                    </form>    
                                </div>
                                
                                <div class="card">
                                    <div class="card-header">
                                        <h3 class="card-title">Abscences</h3>
                                    </div>
                                    <?php if(!empty($absences)){ foreach($absences as $abs){ ?>
                                    <div class="card-body">
                                        <div class="timeline_item">
                                            <span><small class="float-right text-right"><?php echo date('l, dS M Y',strtotime($abs->created_date)); ?></small></span>
                                            <h6 class="font600"><?php echo $abs->title; ?></h6>
                                            <div class="msg">
                                                <p><?php echo $abs->body; ?></p>
                                            </div>       
                                            <small class="float-right text-right"><a href="<?php echo site_url('printout_report/edit_absences/'.$abs->id.'/'.strtolower($abs->code)); ?>"> Edit</a></small>
                                        </div>
                                    </div>
                                    <?php } } ?>
                                </div>
                                
                                <div class="card">
                                    <div class="card-header">
                                        <h3 class="card-title">Abilities Evaluation</h3>
                                    </div>
                                    <?php if(!empty($abilities)){ foreach($abilities as $abil){} ?>
                                    <div class="card-body">
                                        <div class="timeline_item ">
                                            <small class="float-right text-right"><?php echo date('l, dS M Y',strtotime($abil->created_date)); ?></small></span>
                                            <h6 class="font600"><?php echo $abil->title; ?></h6>
                                            <div class="msg">
                                                <p><?php echo $abil->body; ?></p>
                                            </div>                                
                                        </div>
                                    </div>
                                    <?php } ?>
                                </div>
                                
                                <div class="card">
                                    <div class="card-header">
                                        <h3 class="card-title">Keywork Sessions</h3>
                                    </div>
                                    <?php if(!empty($keywork_session)){ foreach($keywork_session as $key){} ?>
                                    <div class="card-body">
                                        <div class="timeline_item ">
                                            <small class="float-right text-right"><?php echo date('l, dS M Y',strtotime($key->created_date)); ?></small></span>
                                            <h6 class="font600"><?php echo $key->title; ?></h6>
                                            <div class="msg">
                                                <p><?php echo $key->body; ?></p>
                                            </div>                                
                                        </div>
                                    </div>
                                    <?php } ?>
                                </div>
                                
                                <div class="card">
                                    <div class="card-header">
                                        <h3 class="card-title">Supervision Action</h3>
                                    </div>
                                    <?php if(!empty($supervision_action)){ foreach($supervision_action as $super){} ?>
                                    <div class="card-body">
                                        <div class="timeline_item ">
                                            <small class="float-right text-right"><?php echo date('l, dS M Y',strtotime($super->created_date)); ?></small></span>
                                            <h6 class="font600"><?php echo $super->title; ?></h6>
                                            <div class="msg">
                                                <p><?php echo $super->body; ?></p>
                                            </div>                                
                                        </div>
                                    </div>
                                    <?php } ?>
                                </div>
                                
                                <div class="card">
                                    <div class="card-header">
                                        <h3 class="card-title">Case Recording</h3>
                                    </div>
                                    <?php if(!empty($case_recording)){ foreach($case_recording as $case){} ?>
                                    <div class="card-body">
                                        <div class="timeline_item ">
                                            <small class="float-right text-right"><?php echo date('l, dS M Y',strtotime($case->created_date)); ?></small></span>
                                            <h6 class="font600"><?php echo $case->title; ?></h6>
                                            <div class="msg">
                                                <p><?php echo $case->body; ?></p>
                                            </div>                                
                                        </div>
                                    </div>
                                    <?php } ?>
                                </div>
                                
                                <div class="card">
                                    <div class="card-header">
                                        <h3 class="card-title">Health Information</h3>
                                    </div>
                                    <?php if(!empty($health_information)){ foreach($health_information as $health){} ?>
                                    <div class="card-body">
                                        <div class="timeline_item">
                                            <small class="float-right text-right"><?php echo date('l, dS M Y',strtotime($health->created_date)); ?></small></span>
                                            <h6 class="font600"><?php echo $health->title; ?></h6>
                                            <div class="msg">
                                                <p><?php echo $health->body; ?></p>
                                            </div>                                
                                        </div>
                                    </div>
                                    <?php } ?>
                                </div>
                                
                                <div class="card">
                                    <div class="card-header">
                                        <h3 class="card-title">Visitor Logs</h3>
                                    </div>
                                    <?php if(!empty($visitor_logs)){ foreach($visitor_logs as $visitor){ ?>
                                    <div class="card-body">
                                        <div class="timeline_item">
                                            <span><small class="float-right text-right"><?php echo date('l, dS M Y',strtotime($visitor->created_date)); ?></small></span>
                                            <h6 class="font600"><?php echo $visitor->title; ?></h6>
                                            <div class="msg">
                                                <p><?php echo $visitor->body; ?></p>
                                            </div>       
                                            <small class="float-right text-right"><a href="<?php echo site_url('printout_report/edit_visitor_logs/'.$visitor->id.'/'.strtolower($visitor->code)); ?>"> Edit</a></small>
                                        </div>
                                    </div>
                                    <?php } } ?>
                                </div>
                                
                                <div class="card">
                                    <div class="card-header">
                                        <h3 class="card-title">Sanctions Rewards</h3>
                                    </div>
                                    <?php if(!empty($sanction)){ foreach($sanction as $sanc){ ?>
                                    <div class="card-body">
                                        <div class="timeline_item">
                                            <span><small class="float-right text-right"><?php echo date('l, dS M Y',strtotime($sanc->created_date)); ?></small></span>
                                            <h6 class="font600"><?php echo $sanc->title; ?></h6>
                                            <div class="msg">
                                                <p><?php echo $sanc->body; ?></p>
                                            </div>       
                                            <small class="float-right text-right"><a href="<?php echo site_url('printout_report/edit_sanction_rewards/'.$sanc->id.'/'.strtolower($sanc->code)); ?>"> Edit</a></small>
                                        </div>
                                    </div>
                                    <?php } } ?>
                                </div>
                                
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
