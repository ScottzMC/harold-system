<!-- Start Main top header -->
<div id="header_top" class="header_top">
    <div class="container">
        <div class="hright">
            <a href="javascript:void(0)" class="nav-link icon right_tab"><i class="fe fe-align-right"></i></a>
            <a href="<?php echo site_url('logout'); ?>" class="nav-link icon settingbar"><i class="fe fe-power"></i></a>
        </div>
    </div>
</div>
<!-- Start Rightbar setting panel -->

<?php
//foreach($user_details as $usrd){}

?>

<!-- Start Main leftbar navigation -->
<div id="left-sidebar" class="sidebar">
    <h5 class="brand-name">Admin
      <a href="javascript:void(0)" class="menu_option float-right">
        <i class="icon-grid font-16" data-toggle="tooltip" data-placement="left" title="Grid & List Toggle"></i>
      </a>
    </h5>
    <ul class="nav nav-tabs">
        <li class="nav-item"><a class="nav-link active" data-toggle="tab" href="#menu-admin">Admin</a></li>
        <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#menu-property">Properties</a></li>
        <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#menu-report">Reports/Printouts</a></li>
    </ul>
    <div class="tab-content mt-3">
        <div class="tab-pane fade show active" id="menu-admin" role="tabpanel">
            <nav class="sidebar-nav">
                <ul class="metismenu">
                    <!--<li><a href="<?php echo site_url('home'); ?>"><i class="fa fa-dashboard"></i><span>Back to Site</span></a></li>-->
                    <li><a href="<?php echo site_url('dashboard'); ?>"><i class="fa fa-dashboard"></i><span>Dashboard</span></a></li>
                    <li><a href="<?php echo site_url('user'); ?>"><i class="fa fa-users"></i><span>Users</span></a></li>
                    <li><a href="<?php echo site_url('calendar_event'); ?>"><i class="fa fa-calendar"></i><span>Calendar Events</span></a></li>
                    <li><a href="<?php echo site_url('reminder'); ?>"><i class="fa fa-calendar"></i><span>Reminders</span></a></li>
                    <li><a href="<?php echo site_url('children'); ?>"><i class="fa fa-users"></i><span>Children</span></a></li>
                    <li><a href="<?php echo site_url('children_activity'); ?>"><i class="fa fa-book"></i><span>Children Activity</span></a></li>
                    <li><a href="<?php echo site_url('health_check'); ?>"><i class="fa fa-book"></i><span>Health Check</span></a></li>
                    <li><a href="<?php echo site_url('risk_assessment'); ?>"><i class="fa fa-book"></i><span>Risk Assessment</span></a></li>
                    <li><a href="<?php echo site_url('support_plan'); ?>"><i class="fa fa-book"></i><span>Support Plan</span></a></li>
                    <li><a href="<?php echo site_url('procedure'); ?>"><i class="fa fa-book"></i><span>Policy & Procedure</span></a></li>
                    <?php if(!empty($this->session->userdata('login'))){ ?>
                    <li><a href="<?php echo site_url('account/logout'); ?>"><i class="fe fe-power"></i><span>Logout</span></a></li>
                  <?php } ?>
                </ul>
            </nav>
        </div>
        
        <div class="tab-pane fade show" id="menu-property" role="tabpanel">
            <nav class="sidebar-nav">
                <ul class="metismenu">
                    <li><a href="<?php echo site_url('property'); ?>"><i class="fa fa-home"></i><span>Property</span></a></li>
                    <li><a href="<?php echo site_url('house_repairs'); ?>"><i class="fa fa-home"></i><span>House Repairs</span></a></li>
                    <li><a href="<?php echo site_url('audit_reviews'); ?>"><i class="fa fa-book"></i><span>Audit Reviews</span></a></li>
                    <li><a href="<?php echo site_url('document_storage'); ?>"><i class="fa fa-book"></i><span>Document Storage</span></a></li>
                    <li><a href="<?php echo site_url('support_work'); ?>"><i class="fa fa-book"></i><span>Support Work</span></a></li>
                </ul>
            </nav>
        </div>
        
        <div class="tab-pane fade show" id="menu-report" role="tabpanel">
            <nav class="sidebar-nav">
                <ul class="metismenu">
                    <li><a href="<?php echo site_url('management_reports'); ?>"><i class="fa fa-book"></i><span>Management Reports</span></a></li>
                    <li class="active"><a href="<?php echo site_url('incident_report'); ?>"><i class="fa fa-book"></i><span>Incident Report</span></a></li>
                    <li><a href="<?php echo site_url('sanction_report'); ?>"><i class="fa fa-book"></i><span>Sanction Report</span></a></li>
                    <li><a href="<?php echo site_url('printout_report'); ?>"><i class="fa fa-book"></i><span>Printout Report</span></a></li>
                </ul>
            </nav>
        </div>
        
    </div>
</div>
