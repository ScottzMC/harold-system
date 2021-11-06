<!doctype html>
<html lang="en" dir="ltr">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<link rel="icon" href="favicon.ico" type="image/x-icon"/>
<title>HR Dashboard || Harold</title>

<!-- Bootstrap Core and vandor -->
<link rel="stylesheet" href="https://scottnnaghor.com/harold/assets/plugins/bootstrap/css/bootstrap.min.css" />

<!-- Plugins css -->
<link rel="stylesheet" href="https://scottnnaghor.com/harold/assets/plugins/summernote/dist/summernote.css"/>


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
  <?php include('menu/nav.php'); ?>
    <!-- Start project content area -->
    <div class="page">
        <!-- Start Page title and tab -->
        <div class="section-body">
            <div class="container-fluid">
                <div class="d-flex justify-content-between align-items-center">
                    <div class="header-action">
                        <h1 class="page-title">Dashboard</h1>
                        <ol class="breadcrumb page-breadcrumb">
                            <li class="breadcrumb-item"><a href="#">HR Harold</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
                        </ol>
                    </div>
                    <ul class="nav nav-tabs page-header-tab">
                        <li class="nav-item"><a class="nav-link active" data-toggle="tab" href="#admin-Dashboard">Dashboard</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="section-body mt-4">
            <div class="container-fluid">
                <div class="row clearfix row-deck">
                    <div class="col-6 col-md-4 col-xl-2">
                        <?php if(!empty($count_users)){ foreach($count_users as $cnt_usr){} ?>
                        <div class="card">
                            <div class="card-body ribbon">
                                <div class="ribbon-box green" data-toggle="tooltip" title="Users"><?php echo $cnt_usr->total_users; ?></div>
                                <a href="#" class="my_sort_cut text-muted">
                                    <i class="fa fa-user-circle-o"></i>
                                    <span>Users</span>
                                </a>
                            </div>
                        </div>
                        <?php }else{ ?>
                        <div class="card">
                            <div class="card-body ribbon">
                                <div class="ribbon-box green" data-toggle="tooltip" title="Users">0</div>
                                <a href="#" class="my_sort_cut text-muted">
                                    <i class="fa fa-user-circle-o"></i>
                                    <span>Users</span>
                                </a>
                            </div>
                        </div>
                        <?php } ?>
                    </div>
                    <div class="col-6 col-md-4 col-xl-2">
                        <?php if(!empty($count_reminders)){ foreach($count_reminders as $cnt_rem){} ?>
                        <div class="card">
                            <div class="card-body ribbon">
                                <div class="ribbon-box green" data-toggle="tooltip" title="Reminders"><?php echo $cnt_rem->total_reminders; ?></div>
                                <a href="#" class="my_sort_cut text-muted">
                                    <i class="fa fa-book"></i>
                                    <span>Reminders</span>
                                </a>
                            </div>
                        </div>
                        <?php }else{ ?>
                        <div class="card">
                            <div class="card-body ribbon">
                                <div class="ribbon-box green" data-toggle="tooltip" title="Reminders">0</div>
                                <a href="#" class="my_sort_cut text-muted">
                                    <i class="fa fa-book"></i>
                                    <span>Reminders</span>
                                </a>
                            </div>
                        </div>
                        <?php } ?>
                    </div>
                    <div class="col-6 col-md-4 col-xl-2">
                        <?php if(!empty($count_health_checks)){ foreach($count_health_checks as $cnt_health){} ?>
                        <div class="card">
                            <div class="card-body ribbon">
                                <div class="ribbon-box green" data-toggle="tooltip" title="Health Check"><?php echo $cnt_health->total_health_checks; ?></div>
                                <a href="#" class="my_sort_cut text-muted">
                                    <i class="fa fa-book"></i>
                                    <span>Health Check</span>
                                </a>
                            </div>
                        </div>
                        <?php }else{ ?>
                        <div class="card">
                            <div class="card-body ribbon">
                                <div class="ribbon-box green" data-toggle="tooltip" title="Health Check">0</div>
                                <a href="#" class="my_sort_cut text-muted">
                                    <i class="fa fa-book"></i>
                                    <span>Health Check</span>
                                </a>
                            </div>
                        </div>
                        <?php } ?>
                    </div>
                    <div class="col-6 col-md-4 col-xl-2">
                        <?php if(!empty($count_properties)){ foreach($count_properties as $cnt_prop){} ?>
                        <div class="card">
                            <div class="card-body ribbon">
                                <div class="ribbon-box green" data-toggle="tooltip" title="Properties"><?php echo $cnt_prop->total_properties; ?></div>
                                <a href="#" class="my_sort_cut text-muted">
                                    <i class="fa fa-home"></i>
                                    <span>Properties</span>
                                </a>
                            </div>
                        </div>
                        <?php }else{ ?>
                        <div class="card">
                            <div class="card-body ribbon">
                                <div class="ribbon-box green" data-toggle="tooltip" title="Properties">0</div>
                                <a href="#" class="my_sort_cut text-muted">
                                    <i class="fa fa-home"></i>
                                    <span>Properties</span>
                                </a>
                            </div>
                        </div>
                        <?php } ?>
                    </div>
                    <div class="col-6 col-md-4 col-xl-2">
                        <?php if(!empty($count_children)){ foreach($count_children as $cnt_child){} ?>
                        <div class="card">
                            <div class="card-body ribbon">
                                <div class="ribbon-box green" data-toggle="tooltip" title="Children"><?php echo $cnt_child->total_children; ?></div>
                                <a href="#" class="my_sort_cut text-muted">
                                    <i class="fa fa-user-circle-o"></i>
                                    <span>Children</span>
                                </a>
                            </div>
                        </div>
                        <?php }else{ ?>
                        <div class="card">
                            <div class="card-body ribbon">
                                <div class="ribbon-box green" data-toggle="tooltip" title="Children">0</div>
                                <a href="#" class="my_sort_cut text-muted">
                                    <i class="fa fa-user-circle-o"></i>
                                    <span>Children</span>
                                </a>
                            </div>
                        </div>
                        <?php } ?>
                    </div>
                    <div class="col-6 col-md-4 col-xl-2">
                        <?php if(!empty($count_children_incidents)){ foreach($count_children_incidents as $cnt_child_inc){} ?>
                        <div class="card">
                            <div class="card-body ribbon">
                                <div class="ribbon-box green" data-toggle="tooltip" title="Children Incidents"><?php echo $cnt_child_inc->total_children_incidents; ?></div>
                                <a href="#" class="my_sort_cut text-muted">
                                    <i class="fa fa-folder"></i>
                                    <span>Children Incidents</span>
                                </a>
                            </div>
                        </div>
                        <?php }else{ ?>
                        <div class="card">
                            <div class="card-body ribbon">
                                <div class="ribbon-box green" data-toggle="tooltip" title="Children Incidents">0</div>
                                <a href="#" class="my_sort_cut text-muted">
                                    <i class="fa fa-folder"></i>
                                    <span>Children Incidents</span>
                                </a>
                            </div>
                        </div>
                        <?php } ?>
                    </div>
                </div>
                <div class="tab-content">
                    <div class="tab-pane fade show active" id="admin-Dashboard" role="tabpanel">
                        <div class="row clearfix">
                            <div class="col-xl-12">
                                <div class="card">
                                    <!--<div class="card-header">
                                        <h3 class="card-title">University Report</h3>
                                        <div class="card-options">
                                            <a href="#" class="card-options-collapse" data-toggle="card-collapse"><i class="fe fe-chevron-up"></i></a>
                                            <a href="#" class="card-options-fullscreen" data-toggle="card-fullscreen"><i class="fe fe-maximize"></i></a>
                                            <a href="#" class="card-options-remove" data-toggle="card-remove"><i class="fe fe-x"></i></a>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <div class="d-sm-flex justify-content-between">
                                            <div class="font-12 mb-2"><span>Measure How Fast You’re Growing Monthly Recurring Revenue. <a href="#">Learn More</a></span></div>
                                            <div class="selectgroup w250">
                                                <label class="selectgroup-item">
                                                    <input type="radio" name="intensity" value="low" class="selectgroup-input" checked="">
                                                    <span class="selectgroup-button">1D</span>
                                                </label>
                                                <label class="selectgroup-item">
                                                    <input type="radio" name="intensity" value="medium" class="selectgroup-input">
                                                    <span class="selectgroup-button">1W</span>
                                                </label>
                                                <label class="selectgroup-item">
                                                    <input type="radio" name="intensity" value="high" class="selectgroup-input">
                                                    <span class="selectgroup-button">1M</span>
                                                </label>
                                                <label class="selectgroup-item">
                                                    <input type="radio" name="intensity" value="veryhigh" class="selectgroup-input">
                                                    <span class="selectgroup-button">1Y</span>
                                                </label>
                                            </div>
                                        </div>
                                        <div id="apex-chart-line-column"></div>
                                    </div>-->
                                    
                                    <!--<div class="card-footer">
                                        <div class="row">
                                            <div class="col-xl-3 col-md-6 mb-2">
                                                <div class="clearfix">
                                                    <div class="float-left"><strong>Fees</strong></div>
                                                    <div class="float-right"><small class="text-muted">35%</small></div>
                                                </div>
                                                <div class="progress progress-xs">
                                                    <div class="progress-bar bg-indigo" role="progressbar" style="width: 35%" aria-valuenow="35" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                                <span class="text-uppercase font-10">Compared to last year</span>
                                            </div>
                                            <div class="col-xl-3 col-md-6 mb-2">
                                                <div class="clearfix">
                                                    <div class="float-left"><strong>Donation</strong></div>
                                                    <div class="float-right"><small class="text-muted">61%</small></div>
                                                </div>
                                                <div class="progress progress-xs">
                                                    <div class="progress-bar bg-yellow" role="progressbar" style="width: 61%" aria-valuenow="61" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                                <span class="text-uppercase font-10">Compared to last year</span>
                                            </div>
                                            <div class="col-xl-3 col-md-6 mb-2">
                                                <div class="clearfix">
                                                    <div class="float-left"><strong>Income</strong></div>
                                                    <div class="float-right"><small class="text-muted">87%</small></div>
                                                </div>
                                                <div class="progress progress-xs">
                                                    <div class="progress-bar bg-green" role="progressbar" style="width: 87%" aria-valuenow="87" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                                <span class="text-uppercase font-10">Compared to last year</span>
                                            </div>
                                            <div class="col-xl-3 col-md-6 mb-2">
                                                <div class="clearfix">
                                                    <div class="float-left"><strong>Expense</strong></div>
                                                    <div class="float-right"><small class="text-muted">42%</small></div>
                                                </div>
                                                <div class="progress progress-xs">
                                                    <div class="progress-bar bg-pink" role="progressbar" style="width: 42%" aria-valuenow="42" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                                <span class="text-uppercase font-10">Compared to last year</span>
                                            </div>
                                        </div>
                                    </div>-->
                                </div>
                            </div>
                        </div>
                        <div class="row clearfix row-deck">
                            <div class="col-xl-6 col-lg-6 col-md-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h3 class="card-title">Children</h3>
                                    </div>
                                    <div class="table-responsive" style="height: 310px;">
                                        <table class="table card-table table-vcenter text-nowrap table-striped mb-0">
                                            <tbody>
                                                <tr>
                                                    <th>Code</th>
                                                    <th>Picture</th>
                                                    <th>Full Name</th>
                                                    <th>Gender</th>
                                                    <th>Age</th>
                                                    <th>Telephone</th>
                                                </tr>
                                                <?php if(!empty($children)){ foreach($children as $child){ ?>
                                                <tr>
                                                    <td><?php echo $child->code; ?></td>
                                                    <td class="w40">
                                                        <div class="avatar">
                                                            <img class="avatar" src="https://scottnnaghor.com/harold/uploads/children/<?php echo $child->image; ?>" alt="<?php echo $child->fullname; ?>">
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div><?php echo $child->fullname; ?></div>
                                                    </td>
                                                    <td><?php echo $child->gender; ?></td>
                                                    <td><?php echo $child->age; ?></td>
                                                    <td><?php echo $child->telephone; ?></td>
                                                </tr>
                                                <?php } } ?>
                                            </tbody>
                                        </table>
                                    </div>
                                    <!--<div class="card-footer d-flex justify-content-between">
                                        <div class="font-14"><span>Measure How Fast You’re Growing Monthly Recurring Revenue. <a href="#">View All</a></span></div>
                                        <div>
                                            <button type="button" class="btn btn-primary">Export</button>
                                        </div>
                                    </div>-->
                                </div>
                            </div>
                            
                            <div class="col-xl-6 col-lg-6 col-md-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h3 class="card-title">Staff</h3>
                                    </div>
                                    <div class="table-responsive" style="height: 310px;">
                                        <table class="table card-table table-vcenter text-nowrap table-striped mb-0">
                                            <tbody>
                                                <tr>
                                                    <th>ID</th>
                                                    <th>Full Name</th>
                                                    <th>Role</th>
                                                    <th>Telephone</th>
                                                    <th>City</th>
                                                    <th>State</th>
                                                </tr>
                                                <?php if(!empty($staff)){ foreach($staff as $stf){ ?>
                                                <tr>
                                                    <td><?php echo $stf->id; ?></td>
                                                    <td>
                                                        <div><?php echo $stf->firstname; ?> <?php echo $stf->lastname; ?></div>
                                                    </td>
                                                    <td><?php echo $stf->role; ?></td>
                                                    <td><?php echo $stf->telephone; ?></td>
                                                    <td><?php echo $stf->city; ?></td>
                                                    <td><?php echo $stf->state; ?></td>
                                                </tr>
                                                <?php } } ?>
                                            </tbody>
                                        </table>
                                    </div>
                                    <!--<div class="card-footer d-flex justify-content-between">
                                        <div class="font-14"><span>Measure How Fast You’re Growing Monthly Recurring Revenue. <a href="#">View All</a></span></div>
                                        <div>
                                            <button type="button" class="btn btn-primary">Export</button>
                                        </div>
                                    </div>-->
                                </div>
                            </div>
                        </div>
                        
                        <!--<div class="row">
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h3 class="card-title">Reminders</h3>
                                    </div>
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table class="table table-striped mb-0 text-nowrap">
                                                <thead>
                                                    <tr>
                                                        <th>No</th>
                                                        <th>Name</th>
                                                        <th>Assigned Professor</th>
                                                        <th>Date Of Admit</th>
                                                        <th>Fees</th>
                                                        <th>Branch</th>
                                                        <th>Edit</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td>1</td>
                                                        <td>Jens Brincker</td>
                                                        <td>Kenny Josh</td>
                                                        <td>27/05/2016</td>
                                                        <td>
                                                            <span class="tag tag-success">paid</span>
                                                        </td>
                                                        <td>Mechanical</td>
                                                        <td>
                                                            <a href="#">View</a>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>-->
                        
                    </div>
                    
                </div>
            </div>
        </div>

    </div>
</div>

<!-- Start Main project js, jQuery, Bootstrap -->
<script src="https://scottnnaghor.com/harold/assets/bundles/lib.vendor.bundle.js"></script>

<!-- Start all plugin js -->
<script src="https://scottnnaghor.com/harold/assets/bundles/counterup.bundle.js"></script>
<script src="https://scottnnaghor.com/harold/assets/bundles/apexcharts.bundle.js"></script>
<script src="https://scottnnaghor.com/harold/assets/bundles/summernote.bundle.js"></script>

<!-- Start project main js  and page js -->
<script src="https://scottnnaghor.com/harold/assets/js/core.js"></script>
<script src="https://scottnnaghor.com/harold/assets/js/page/index.js"></script>
<script src="https://scottnnaghor.com/harold/assets/js/page/summernote.js"></script>
</body>
</html>
