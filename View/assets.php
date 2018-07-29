<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
<!--<![endif]-->
<head>
	<meta charset="utf-8" />
	<title>Assets</title>
	<meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport" />
	<meta content="" name="description" />
	<meta content="" name="author" />
	
	<!-- ================== BEGIN BASE CSS STYLE ================== -->
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
	<link href="<?= ASSETS_URL . "jquery-ui/themes/base/minified/jquery-ui.min.css" ?>" rel="stylesheet" />
	<link href="<?= ASSETS_URL . "bootstrap/css/bootstrap.min.css" ?>" rel="stylesheet" />
	<link href="<?= ASSETS_URL . "font-awesome/css/font-awesome.min.css" ?>" rel="stylesheet" />
	<link href="<?= ASSETS_URL . "ionicons/css/ionicons.min.css" ?>" rel="stylesheet" />
	<link href="<?= CSS_URL . "animate.min.css" ?>" rel="stylesheet" />
	<link href="<?= CSS_URL . "style.min.css" ?>" rel="stylesheet" />
	<link href="<?= CSS_URL . "style-responsive.min.css" ?>" rel="stylesheet" />
	<link href="<?= CSS_URL . "theme/default.css" ?>" rel="stylesheet" id="theme" />
	<!-- ================== END BASE CSS STYLE ================== -->
	
	<!-- ================== BEGIN PAGE LEVEL STYLE ================== -->
	<link href="<?= ASSETS_URL . "jquery-jvectormap/jquery-jvectormap.css" ?>" rel="stylesheet" />
	<link href="<?= ASSETS_URL . "bootstrap-datepicker/css/bootstrap-datepicker.css" ?>" rel="stylesheet" />
    <link href="<?= ASSETS_URL . "gritter/css/jquery.gritter.css" ?>" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.6.9/sweetalert2.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.6.9/sweetalert2.min.css">
	<link href="<?= ASSETS_URL . "select2/dist/css/select2.css" ?>" rel="stylesheet" />
	<link href="<?= ASSETS_URL . "fullcalendar/fullcalendar.print.css" ?>" rel="stylesheet" media="print" />
	<link href="<?= ASSETS_URL . "fullcalendar/fullcalendar.min.css" ?>" rel="stylesheet" />
	<link href="<?= ASSETS_URL . "bootstrap-wizard/css/bwizard.min.css" ?>" rel="stylesheet" />
	<link href="<?= ASSETS_URL . "scheduler/css/timelineScheduler.css" ?>" rel="stylesheet" />
	<link href="<?= ASSETS_URL . "scheduler/css/timelineScheduler.styling.css" ?>" rel="stylesheet" />
	<link href="<?= ASSETS_URL . "scheduler/css/calendar.css" ?>" rel="stylesheet" />
	<!-- ================== END PAGE LEVEL STYLE ================== -->
	
	<!-- ================== BEGIN BASE JS ================== -->
	<script src="<?= ASSETS_URL . "pace/pace.min.js" ?>" ></script>
	<!-- ================== END BASE JS ================== -->
</head>
<style>
    
    
    #addVehicleDIV, #editVehicleDIV, #assignVehicleDIV, #addEquipmentDIV, #editEquipmentDIV, #assignEquipmentDIV, #addPlaceDIV, #editPlaceDIV, #assignPlaceDIV, #addOtherAssetDIV, #editOtherAssetDIV, #assignOtherAssetDIV, #mapDIV{
        width: 700px;
        height: auto;
        position: relative;
        margin: 10% auto 0px auto;
    }
    
    #vehicleTable, #equipmentTable, #placesTable, #otherAssetsTable, #tripOrdersTable, #vehicleReservationsTable, #equipmentReservationsTable, #placeReservationsTable, #otherAssetsReservationsTable {
        width: 100% !important;
    }
    
    #map{
        width: 100%;
        height: 500px;
    }
    
    
    .nFilter{
        max-width: 250px;
    }
    
    .green{
        color: #39a34b;
    }
    .red{
        color: #bf2c24;
    }
    
    input[pattern]:invalid{
      color:red;
    }
    
    .tab-content {
        padding: 15px 0px 0px 0px;
        margin-bottom: 20px;
        background: none;
        -webkit-border-radius: 3px;
        -moz-border-radius: 3px;
        border-radius: 3px;
    }
    
    .view-switcher li {
        color: #545c6a;
        display: inline;
        margin-right: 10px;
        padding: 4px 0px 4px 0px;
    }
    
    .view-switcher .active {
        border-bottom: 2px solid #33B679;
    }

    .view-switcher li a {
        font: 14px/30px 'OpenSans-Regular',"Helvetica Neue",Helvetica,Arial,sans-serif;
        color: #545c6a;
        padding: 4px 0px 4px 0px;
    }
    
    .view-switcher li a:hover, .view-switcher li a:active, .view-switcher li a:focus, .view-switcher li a:visited{
        text-decoration: none;
    }

    .view-switcher{
        margin: 0 18px 0 0;
        font: 14px/30px 'OpenSans-Regular',"Helvetica Neue",Helvetica,Arial,sans-serif;
        color: #545c6a;
        -webkit-transition: color .3s;
        transition: color .3s;
        cursor: pointer;
        text-decoration: none;
        display: block;
        list-style-type: none;
        -webkit-margin-before: 1em;
        -webkit-margin-after: 1em;
        -webkit-margin-start: 0px;
        -webkit-margin-end: 0px;
        -webkit-padding-start: 0px;
    }
	
	.profile-header .profile-header-tab {
		padding: 0 0 0 10px;
	}
    
    .box.has-advanced-upload {
        outline: 2px dashed darkblue;
        outline-offset: -10px;
        -webkit-transition: outline-offset .15s ease-in-out, background-color .15s linear;
        transition: outline-offset .15s ease-in-out, background-color .15s linear;
    }
    
    .box {
        font-size: 1.25rem;
        background-color: #2196f3;
        position: relative;
        padding: 100px 20px;
    }
    
    .box__file{
        width: 0.1px;
        height: 0.1px;
        opacity: 0;
        overflow: hidden;
        position: absolute;
        z-index: -1;
    }
    
    .box__label{
        font-size: 22px;
        text-align: center;
        display: block;
    }
    
    .btn-centered{
        display: block;
        margin: 0 auto;
    }
    
    .hover-label:hover{
        color: white;
    }
    
    .pointer{
        cursor: pointer;
    }
    
    .hover-underline:hover{
        cursor: pointer;
        text-decoration: underline;
    }
    
    .hide{
        display: none;
    }
    
</style>
<body>
	<!-- begin #page-loader -->
	<div id="page-loader" class="fade in"><span class="spinner"></span></div>
	<!-- end #page-loader -->
	
	<!-- begin #page-container -->
	<div id="page-container" class="fade page-header-fixed page-with-two-sidebar show page-sidebar-fixed">
		<div id="header" class="header navbar navbar-default navbar-fixed-top">
			<!-- begin container-fluid -->
			<div class="container-fluid">
				<!-- begin mobile sidebar expand / collapse button -->
				
				<div class="navbar-header">
    				<a href="<?= BASE_URL . "dashboard" ?>" class="navbar-brand"><img src="<?= IMG_URL . "logo_long.png" ?>" class="header-logo-img" /></a>
    				<button type="button" class="navbar-toggle" data-click="sidebar-toggled">
    					<span class="icon-bar"></span>
    					<span class="icon-bar"></span>
    					<span class="icon-bar"></span>
    				</button>
    			</div>
				<!-- end mobile sidebar expand / collapse button -->
				
				<!-- begin header navigation right -->
				<ul class="nav navbar-nav navbar-right">
				    <li id="timeDisplay"></li>
				    <li class="divider d-none d-md-block"></li>
					<li class="dropdown">
    					<a href="javascript:;" data-toggle="dropdown" class="dropdown-toggle f-s-14" aria-expanded="false">
    						<i class="fa fa-bell"></i>
    					</a>
    					<ul class="dropdown-menu media-list dropdown-menu-right" x-placement="bottom-end" style="position: absolute; transform: translate3d(-314px, 50px, 0px); top: 0px; left: 0px; will-change: transform;">
    						<li class="dropdown-header">NOTIFICATIONS</li>
    						<li class="media">
                                <a href="javascript:;">
                                    <div class="media-left"><i class="ion-key media-object bg-blue"></i></div>
                                    <div class="media-body">
                                        <h6 class="media-heading">License key</h6>
                                        <div class="text-muted f-s-11"><?php echo $_SESSION["license_id"]; ?></div>
                                    </div>
                                </a>
                            </li>
                            <li class="media">
                                <a href="javascript:;">
                                    <div class="media-left"><i class="ion-android-calendar media-object bg-red"></i></div>
                                    <div class="media-body">
                                        <h6 class="media-heading">Expires in</h6>
                                        <div class="text-muted f-s-11"><?php
                                            $now = time(); // or your date as well
                                            $your_date = strtotime($_SESSION["expiry_date"]);
                                            $datediff = $your_date - $now;
                                            echo floor($datediff / (60 * 60 * 24)) . " days";
                                        ?></div>
                                    </div>
                                </a>
                            </li>
    						<li class="dropdown-footer text-center">
                                <a target="_blank" href="http://btrack.si">View more</a>
                            </li>
    					</ul>
    				</li>
					<li class="dropdown navbar-user">
						<a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown">
							<span class="user-image online">
								<img src="<?= IMG_URL . "profile-image.png" ?>" alt="" /> 
							</span>
							<span class="hidden-xs"><?= $_SESSION['user'] ?></span> <b class="caret"></b>
						</a>
						<ul class="dropdown-menu animated fadeInLeft">
							<li class="arrow"></li>
							<li><a href="<?= BASE_URL . "profilepage" ?>">My profile</a></li>
							<li><a href="<?= BASE_URL . "logout" ?>">Log out</a></li>
						</ul>
					</li>
					<li class="divider d-none d-md-block"></li>
					<li class="d-none d-md-block">
            			<a href="javascript:;" data-click="right-sidebar-toggled" class="f-s-14">
            				<i class="fa fa-th"></i>
            			</a>
            		</li>
				</ul>
				<!-- end header navigation right -->
			</div>
			<!-- end container-fluid -->
		</div>
		<!-- end #header -->
		
		<!-- begin #sidebar -->
		<div id="sidebar" class="sidebar">
			<!-- begin sidebar scrollbar -->
			<div data-scrollbar="true" data-height="100%">
				<!-- begin sidebar nav -->
				<ul class="nav">
					<li class="nav-profile">
						<a href="javascript:;" data-toggle="nav-profile">
							<div class="cover with-shadow"></div>
							<div class="image">
								
							</div>
							<div class="info">
							    <b class="caret pull-right"></b>
								<?php echo $_SESSION["namesurname"]; ?>
								<small><?php echo $_SESSION["position"] ?></small>
							</div>
						</a>
					</li>
					<li>
						<ul class="nav nav-profile closed" style="display: none;">
                            <li><a href="<?= BASE_URL . "profilepage" ?>"><i class="fas fa-pen-square"></i><span> My profile</span></a></li>
                            <li><a href="<?= BASE_URL . "help" ?>"><i class="fa fa-question-circle"></i><span> Help</span></a></li>
                        </ul>
					</li>
				</ul>
				<ul class="nav">
					<li class="nav-header">Navigation</li>
						<?php
							if (in_array(0, $_SESSION["menuitems"])){
								echo '<li>
										<a href="' . BASE_URL . 'dashboard">
											<i class="fa fa-th-large"></i>
											<span>Dashboard</span>
										</a>
									</li>';
							}
    					    if ($_SESSION["admin"] == 1){
                				echo '<li class="has-sub">
                            			<a href="javascript:;">
                            				<b class="caret pull-right"></b>
                            				<i class="fas fa-building"></i> 
                            				<span>Company</span>
                            			</a>
                            			<ul class="sub-menu">
                            			    <li><a href="' . BASE_URL . 'departments">Structure</a></li>
                            				<li><a href="' . BASE_URL . 'employees">Employees</a></li>
                            				<li><a href="' . BASE_URL . 'workforce">Workforce management</a></li>
                            			</ul>
                            		</li>';
    					    }
						?>
						<li class="has-sub">
                			<a href="javascript:;">
                				<b class="caret pull-right"></b>
                				<i class="fas fa-users"></i> 
                				<span>CRM</span>
                			</a>
                			<ul class="sub-menu">
                			    <li><a href="<?= BASE_URL . "customers" ?>">Customers</a></li>
                			    <li><a href="<?= BASE_URL . "leads" ?>">Leads</a></li>
                				<li><a href="<?= BASE_URL . "opportunities" ?>">Opportunities</a></li>
                			</ul>
                		</li>
						<?php
							if (in_array(1, $_SESSION["menuitems"])){
								echo '<li class="has-sub">
									<a href="javascript:;">
										<b class="caret pull-right"></b>
										<i class="ion-android-call"></i> 
										<span>Telephony</span>
									</a>
									<ul class="sub-menu">
										<li><a href="' . BASE_URL . 'telephonydashboard">Overview</a></li>
										<li><a href="' . BASE_URL . 'callcenter">Call center</a></li>
										
									</ul>
								</li>';
							}
							if (in_array(2, $_SESSION["menuitems"])){
								echo '<li class="has-sub">
									<a href="javascript:;">
										<b class="caret pull-right"></b>
										<i class="ion-help-buoy"></i>
										<span>Support</span>
									</a>
									<ul class="sub-menu">
										<li><a href="' . BASE_URL . 'ticketingdashboard">Ticketing</a></li>
										<li><a href="' . BASE_URL . 'ticketing">My tickets</a></li>
									</ul>
								</li>';
								echo '<li>
									<a href="' . BASE_URL . 'workorders">
										<i class="fas fa-cube"></i>
										<span>Work orders</span>
									</a>
								</li>';
							}
							if (in_array(3, $_SESSION["menuitems"])){
								echo '<li class="active">
									<a href="' . BASE_URL . 'assets">
										<i class="fas fa-database"></i>
										<span>Assets</span>
									</a>
								</li>';
							}
							if (in_array(4, $_SESSION["menuitems"])){
								echo '<li>
									<a href="' . BASE_URL . 'basic_tracking">
										<i class="fas fa-map"></i>
										<span>Basic tracking</span>
									</a>
								</li>';
							}
							if (in_array(5, $_SESSION["menuitems"])){
								echo '<li>
									<a href="' . BASE_URL . 'tracking">
										<i class="ion-android-globe"></i>
										<span>Advanced tracking</span>
									</a>
								</li>';
							}
						?>
    					<li class="has-sub">
    						<a href="javascript:;">
    						    <b class="caret pull-right"></b>
    							<i class="ion-android-calendar"></i> 
    							<span id="eventSpan">Activities</span>
    						</a>
    						<ul class="sub-menu">
    						    <li><a id="eventLink" href="<?= BASE_URL . "events" ?>">Events</a></li>
    						    <li><a id="reminderLink" href="<?= BASE_URL . "reminders" ?>">Reminders</a></li>
    						    <li><a href="<?= BASE_URL . "calls" ?>">Phone calls</a></li>
    						</ul>
    					</li>
    					<li>
    					    <a href="<?= BASE_URL . "workgroups" ?>">
    						    <i class="ion-android-chat"></i>
    						    <span>Workgroups</span>
    					    </a>
    					</li>
    					<li>
    					    <a href="<?= BASE_URL . "webmail" ?>">
    						    <i class="fa fa-envelope"></i>
    						    <span>Webmail</span>
    					    </a>
    					</li>
						<?php
							if (in_array(6, $_SESSION["menuitems"])){
								echo '<li>
									<a href="' . BASE_URL . 'mailmanager">
										<i class="fas fa-random"></i>
										<span>MailManage</span>
									</a>
								</li>';
							}
						?>
    					<li>
    					    <a href="<?= BASE_URL . "documents" ?>">
    						    <i class="ion-cloud"></i>
    						    <span>Documents</span>
    					    </a>
    					</li>
						<?php
							if (in_array(7, $_SESSION["menuitems"])){
								echo '<li>
									<a href="' . BASE_URL . 'filetransfer">
										<i class="fas fa-file-archive"></i>
										<span>Secure File Transfer</span>
									</a>
								</li>';
							}
							if ($_SESSION["admin"] == 1){
    					        echo '<li class="has-sub">
                						<a href="javascript:;">
                						    <b class="caret pull-right"></b>
                							<i class="ion-arrow-graph-up-right"></i> 
                							<span>Marketing</span>
                						</a>
                						<ul class="sub-menu">
                						    <li><a href="' . BASE_URL . 'campaign">Campaigns</a></li>
                						    <li><a href="' . BASE_URL . 'facebook">Facebook Ads</a></li>
                						    <li><a href="' . BASE_URL . 'google">Google Ads</a></li>
                						</ul>
                					</li>';
    					    }
							if (in_array(8, $_SESSION["menuitems"])){
								echo '<li>
									<a href="' . BASE_URL . 'invoices">
										<i class="ion-pricetags"></i>
										<span>Invoicing</span>
									</a>
								</li>';
							}
							if ($_SESSION["admin"] == 1){
								echo '<li>
										<a href="' . BASE_URL . 'reports">
											<i class="fa fa-chart-pie"></i>
											<span>Reports</span>
										</a>
									</li>';
							}
							if ($_SESSION["admin"] == 1){
    					        echo '<li>
                					    <a href="' . BASE_URL . 'gdpr">
                						    <i class="fa fa-info-circle"></i>
                						    <span>GDPR</span>
                					    </a>
                					 </li>';
    					    }
							if ($_SESSION["admin"] == 1){
    					        echo '<li>
                					    <a href="' . BASE_URL . 'settings">
                						    <i class="ion-android-settings"></i>
                						    <span>Settings</span>
                					    </a>
                					 </li>';
    					    }
						?>
					</li>
					
			        <!-- begin sidebar minify button -->
					<li><a href="javascript:;" class="sidebar-minify-btn" data-click="sidebar-minify"><i class="fa fa-angle-double-left"></i></a></li>
			        <!-- end sidebar minify button -->
				</ul>
				<!-- end sidebar nav -->
			</div>
			<!-- end sidebar scrollbar -->
		</div>
		<div id="sidebar-right" class="sidebar sidebar-right minified-sidebar">
		    <ul class="nav">
		        <li>
        		    <a href="javascript:;" data-click="theme-panel-expand" class="theme-collapse-btn">
    				    <i class="ion-android-color-palette"></i>
    			    </a>
        		</li>
    		</ul>
		</div>
		<div class="sidebar-bg"></div>
		<!-- end #sidebar -->
		
		<!-- begin #content -->
		<div id="content" class="content content-full-width">
        <!-- begin breadcrumb -->
 
			
			<div class="profile">
				<div class="profile-header">
					<!-- BEGIN profile-header-cover -->
					<div class="profile-header-cover"></div>
					<!-- END profile-header-cover -->
					<!-- BEGIN profile-header-content -->
					<div class="profile-header-content">
						<!-- BEGIN profile-header-img -->
						<!-- END profile-header-img -->
						<!-- BEGIN profile-header-info -->
						<div class="profile-header-info">
							<h4 class="m-t-10 m-b-5">Assets</h4>
						</div>
					</div>
					<!-- END profile-header-content -->
					<!-- BEGIN profile-header-tab -->
					<ul class="profile-header-tab nav nav-tabs">
						<li class="nav-item active"><a href="#general-view" class="nav-link" data-toggle="tab" aria-expanded="true">GENERAL</a></li>
						<li class="nav-item"><a href="#vehicle-view" class="nav-link" data-toggle="tab" aria-expanded="false">VEHICLES</a></li>
						<li class="nav-item"><a href="#equipment-view" class="nav-link" data-toggle="tab" aria-expanded="false">EQUIPMENT</a></li>
						<li class="nav-item"><a href="#place-view" class="nav-link" data-toggle="tab" aria-expanded="false">PLACES</a></li>
						<li class="nav-item"><a href="#other-view" class="nav-link" data-toggle="tab" aria-expanded="false">OTHER ASSETS</a></li>
					</ul>
					<!-- END profile-header-tab -->
				</div>
			</div>
			<div class="profile-content">
			
			<div class="tab-content">
			    <div class="tab-pane fade in active" id="general-view">
                			        <div class="vertical-box-column p-r-30 d-none d-lg-table-cell width230">
                                        <div id="external-events" class="fc-event-list">
                                            <div id="calendarFilters">
                                                <div onClick="showAssetsByType(this, 0)" class="fc-event fc-active"><div class="fc-event-icon"><i class="fa fa-circle fa-fw text-inverse"></i></div> All assets</div>
                                                <div onClick="showAssetsByType(this, 1)" class="fc-event"><div class="fc-event-icon"><i class="fa fa-circle fa-fw text-danger"></i></div> Vehicles</div>
                                                <div onClick="showAssetsByType(this, 2)" class="fc-event"><div class="fc-event-icon"><i class="fa fa-circle fa-fw text-success"></i></div> Equipment</div>
                                                <div onClick="showAssetsByType(this, 3)" class="fc-event"><div class="fc-event-icon"><i class="fa fa-circle fa-fw text-primary"></i></div> Places</div>
                                                <div onClick="showAssetsByType(this, 4)" class="fc-event"><div class="fc-event-icon"><i class="fa fa-circle fa-fw text-warning"></i></div> Other assets</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="calendar" class="vertical-box-column p-15 calendar">
                                        
                                    </div>
			    </div>
			    <div class="tab-pane fade" id="vehicle-view">
			        <ul class="nav nav-pills">
                        <li class="active">
                            <a href="#vehicle-overview" data-toggle="tab" aria-expanded="true">Reservations</a>
                        </li>
                        <li>
                            <a href="#trip-orders" data-toggle="tab" aria-expanded="true">Trip orders</a>
                        </li>
                        <li>
                            <a href="#vehicle-manage" data-toggle="tab" aria-expanded="true">Manage</a>
                        </li>
                    </ul>
                    <div class="tab-content">
                        <div id="vehicle-overview" class="tab-pane fade in active">
                            <div class="row">
                                <div class="col-md-12">
                                    <button class="btn material success m-b-15" onClick="showAssignVehiclePopup()">Make a reservation</button>
                                </div>
                                <div class="col-md-12">
                                    <div class="panel panel-primary">
                                        <div class="panel-heading">
                                            <div class="panel-heading-btn">
                                                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
                                                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
                                                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
                                            </div>
                                            <h4 class="panel-title">Reservation scheduler</h4>
                                        </div>
                                        <div class="panel-body">
                                            <div class="vehicleSchedulerContainer calendar">
                                                
                                            </div>
                                        </div>
                                    </div>
                                    <div class="panel panel-primary">
                                        <div class="panel-heading">
                                            <div class="panel-heading-btn">
                                                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
                                                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
                                                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
                                            </div>
                                            <h4 class="panel-title">Reservation table</h4>
                                        </div>
                                        <div class="panel-body">
                                            <div class="dataTables_wrapper form-inline dt-bootstrap no-footer">
                                                <table id="vehicleReservationsTable" class="table table-striped">
                                                    <thead>
                                                        <tr>
                                                            <th>Vehicle</th>
                                                            <th>Employee</th>
                                                            <th>Start date</th>
                                                            <th>End date</th>
                                                            <th>Status</th>
															<th></th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="trip-orders" class="tab-pane fade">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="panel panel-primary">
                                        <div class="panel-heading">
                                            <div class="panel-heading-btn">
                                                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
                                                <a href="getTripOrders()" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-repeat"></i></a>
                                                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
                                                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
                                            </div>
                                            <h4 class="panel-title">Trip orders</h4>
                                        </div>
                                        <div class="panel-body">
                                            <div class="dataTables_wrapper form-inline dt-bootstrap no-footer">
                                                <table id="tripOrdersTable" class="table table-striped">
                                                    <thead>
                                                        <tr>
                                                            <th>Employee</th>
                                                            <th>Vehicle</th>
                                                            <th>From</th>
                                                            <th>To</th>
                                                            <th></th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="vehicle-manage" class="tab-pane fade">
                            <div class="row m-b-15">
                                <div class="col-md-12">
                                    <button class="btn material primary pull-left" onClick="showNewVehiclePopup()">Add a vehicle</button>
                                    <button class="btn material success pull-right" onClick="importVehicles()">Import vehicles</button>
                                </div>
                            </div>
                            <div class="clearfix"></div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="panel panel-primary">
                                        <div class="panel-heading">
                                            <div class="panel-heading-btn">
                                                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
                                                <a href="getVehicles()" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-repeat"></i></a>
                                                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
                                                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
                                            </div>
                                            <h4 class="panel-title">Vehicles</h4>
                                        </div>
                                        <div class="panel-body">
                                            <div class="dataTables_wrapper form-inline dt-bootstrap no-footer">
                                                <table id="vehicleTable" class="table table-striped">
                                                    <thead>
                                                        <tr>
                                                            <th>Type</th>
                                                            <th>Brand</th>
                                                            <th>Model</th>
                                                            <th>Registration number</th>
                                                            <th>In use by</th>
                                                            <th></th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div id="vehicleWizardDIV" class="bg-white p-15 m-t-15" hidden>
                                <div id="vehicleWizard">
                                    <ol>
                                        <li>
                                            Import CSV
                                            <small>Choose file and import</small>
                                        </li>
                                        <li>
                                            Setup
                                            <small>Setup data</small>
                                        </li>
                                        <li>
                                            Finalize
                                            <small>Complete import</small>
                                        </li>
                                    </ol>
                                    <div class="wizard-step-1">
                                        <fieldset>
                                            <legend class="pull-left width-full">Import CSV</legend>
                                            <form id="vehicleImportCSVForm" action="<?= BASE_URL . "csv/import" ?>" method="post" enctype="multipart/form-data" class="form-horizontal box has-advanced-upload">
                                                <div class="form-group">
                                                    <div class="col-md-12">
                                                        <label for="vehicleFile" id="vehicleLabel" class="box__label"><strong class="hover-label">Choose a file</strong><span> or drag it here</span>.</label>
                                                        <input type="file" name="csv" id="vehicleFile" class="box__file" required/>
                                                    </div>
                                                </div>
                                                <button class="btn material danger btn-centered">Upload file</button>
                                            </form>
                                        </fieldset>
                                    </div>
                                    <div class="wizard-step-2">
                                        <fieldset>
                                            <legend class="pull-left width-full">Import results</legend>
                                            <h4>Example data from file</h4>
                                            <table id="vehicleExampleDataTable" class="table table-striped">
                                                
                                            </table>
                                            <h4>Setup import fields</h4>
                                            <form id="vehicleCsvFieldsForm" action="<?= BASE_URL . "vehicles/import" ?>" method="post" enctype="multipart/form-data" class="form-horizontal">
                                                <div class="form-group">
                                                    <div class="col-md-4">
                                                        <label>Vehicle type: </label>
                                                        <select name="vehicle_type" class="form-control vehicle-import-select" required >
                                                            <option value="Personal">Personal</option>
                                                            <option value="Company">Company</option>
                                                        </select>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <label>Fuel type:</label>
                                                        <select name="fuel_type" class="form-control vehicle-import-select" >
                                                            <option value="Petrol">Petrol</option>
                                                            <option value="Diesel">Diesel</option>
                                                            <option value="Electrical">Electrical</option>
                                                        </select>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <label>Vehicle VIN:</label>
                                                        <select name="vehicle_vin" class="form-control vehicle-import-select">
                                                            <option value="-1">Leave blank</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="col-md-4">
                                                        <label>Year of make:</label>
                                                        <select name="vehicle_year" class="form-control vehicle-import-select">
                                                            <option value="-1">Leave blank</option>
                                                        </select>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <label>Mileage:</label>
                                                        <select name="vehicle_mileage" class="form-control vehicle-import-select">
                                                            <option value="-1">Leave blank</option>
                                                        </select>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <label>Vehicle brand:</label>
                                                        <select name="vehicle_brand" class="form-control vehicle-import-select">
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="col-md-4">
                                                        <label>Vehicle model:</label>
                                                        <select name="vehicle_model" class="form-control vehicle-import-select">
                                                        </select>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <label>Registration number:</label>
                                                        <select name="vehicle_registration" class="form-control vehicle-import-select">
                                                        </select>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <label>Number of seats:</label>
                                                        <select name="vehicle_seats" class="form-control vehicle-import-select">
                                                            <option value="-1">Leave blank</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="col-md-4">
                                                        <label>Has vignette:</label>
                                                        <select name="vehicle_vignette" class="form-control vehicle-import-select">
                                                            <option value="1">Yes</option>
                                                            <option value="0">No</option>
                                                        </select>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <label>Insurance validity date:</label>
                                                        <select name="vehicle_insurancedate" class="form-control vehicle-import-select">
                                                            <option value="-1">Leave blank</option>
                                                        </select>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <label>Registration validity date:</label>
                                                        <select name="vehicle_registrationdate" class="form-control vehicle-import-select">
                                                            <option value="-1">Leave blank</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="col-md-4">
                                                        <label>Last service date:</label>
                                                        <select name="vehicle_servicedate" class="form-control vehicle-import-select">
                                                            <option value="-1">Leave blank</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <button class="btn material primary">Finalize import</button>
                                            </form>
                                        </fieldset>
                                    </div>
                                    <div class="wizard-step-3">
                                        <fieldset>
                                            <legend class="pull-left width-full">Finalization</legend>
                                            <p class="f-s-20">Import completed, please refresh the page to view the results :)</p>
                                        </fieldset>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
			    </div>
			    <div class="tab-pane fade" id="equipment-view">
			        <ul class="nav nav-pills">
                        <li class="active">
                            <a href="#equipment-overview" data-toggle="tab" aria-expanded="true">Overview</a>
                        </li>
                        <li>
                            <a href="#equipment-manage" data-toggle="tab" aria-expanded="true">Manage</a>
                        </li>
                    </ul>
                    <div class="tab-content">
                        <div id="equipment-overview" class="tab-pane fade in active">
                            <div class="row">
                                <div class="col-md-12">
                                    <button class="btn material success m-b-15" onClick="showAssignEquipmentPopup()">Make a reservation</button>
                                    <div class="panel panel-primary">
                                        <div class="panel-heading">
                                            <div class="panel-heading-btn">
                                                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
                                                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
                                                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
                                            </div>
                                            <h4 class="panel-title">Equipment reservations</h4>
                                        </div>
                                        <div class="panel-body">
                                            <div class="equipmentSchedulerContainer calendar bg-white">
                                                
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="panel panel-primary">
                                        <div class="panel-heading">
                                            <div class="panel-heading-btn">
                                                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
                                                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
                                                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
                                            </div>
                                            <h4 class="panel-title">Reservation table</h4>
                                        </div>
                                        <div class="panel-body">
                                            <div class="dataTables_wrapper form-inline dt-bootstrap no-footer">
                                                <table id="equipmentReservationsTable" class="table table-striped">
                                                    <thead>
                                                        <tr>
                                                            <th>Equipment</th>
                                                            <th>Employee</th>
                                                            <th>Start date</th>
                                                            <th>End date</th>
                                                            <th>Status</th>
															<th></th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                        </div>
                        <div id="equipment-manage" class="tab-pane fade">
                            <div class="row m-b-15">
                                <div class="col-md-12">
                                    <button class="btn material primary pull-left" onClick="showNewEquipmentPopup()">Add equipment</button>
                                    <button class="btn material success pull-right" onClick="importEquipment()">Import equipment</button>
                                </div>
                            </div>
                            <div class="clearfix"></div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="panel panel-primary">
                                        <div class="panel-heading">
                                            <div class="panel-heading-btn">
                                                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
                                                <a href="getEquipment()" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-repeat"></i></a>
                                                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
                                                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
                                            </div>
                                            <h4 class="panel-title">Equipment</h4>
                                        </div>
                                        <div class="panel-body">
                                            <div class="dataTables_wrapper form-inline dt-bootstrap no-footer">
                                                <table id="equipmentTable" class="table table-striped">
                                                    <thead>
                                                        <tr>
                                                            <th>Category</th>
                                                            <th>Code</th>
                                                            <th>Name</th>
															<th>Location</th>
                                                            <th>Description</th>
                                                            <th>In use by</th>
                                                            <th></th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div id="equipmentWizardDIV" class="bg-white p-15 m-t-15" hidden>
                                <div id="equipmentWizard">
                                    <ol>
                                        <li>
                                            Import CSV
                                            <small>Choose file and import</small>
                                        </li>
                                        <li>
                                            Setup
                                            <small>Setup data</small>
                                        </li>
                                        <li>
                                            Finalize
                                            <small>Complete import</small>
                                        </li>
                                    </ol>
                                    <div class="wizard-step-1">
                                        <fieldset>
                                            <legend class="pull-left width-full">Import CSV</legend>
                                            <form id="equipmentImportCSVForm" action="<?= BASE_URL . "csv/import" ?>" method="post" enctype="multipart/form-data" class="form-horizontal box has-advanced-upload">
                                                <div class="form-group">
                                                    <div class="col-md-12">
                                                        <label for="equipmentFile" id="equipmentLabel" class="box__label"><strong class="hover-label">Choose a file</strong><span> or drag it here</span>.</label>
                                                        <input type="file" name="csv" id="equipmentFile" class="box__file" required/>
                                                    </div>
                                                </div>
                                                <button class="btn material danger btn-centered">Upload file</button>
                                            </form>
                                        </fieldset>
                                    </div>
                                    <div class="wizard-step-2">
                                        <fieldset>
                                            <legend class="pull-left width-full">Import results</legend>
                                            <h4>Example data from file</h4>
                                            <table id="equipmentExampleDataTable" class="table table-striped">
                                                
                                            </table>
                                            <h4>Setup import fields</h4>
                                            <form id="equipmentCsvFieldsForm" action="<?= BASE_URL . "equipment/import" ?>" method="post" enctype="multipart/form-data" class="form-horizontal">
                                                <div class="form-group">
                                                    <div class="col-md-4">
                                                        <label>Equipment name: <span class="red">*</span></label>
                                                        <select name="equipment_name" class="form-control equipment-import-select" required >
                                                        </select>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <label>Equipment category:</label>
                                                        <select name="equipment_category" class="form-control equipment-import-select" >
                                                            <option value="-1">Other</option>
                                                        </select>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <label>Equipment ID: </label>
                                                        <select name="equipment_code" class="form-control equipment-import-select">
                                                            <option value="-1">Leave blank</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="col-md-4">
                                                        <label>Equipment description</label>
                                                        <select name="equipment_description" class="form-control equipment-import-select">
                                                            <option value="-1">Leave blank</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <button class="btn material primary">Finalize import</button>
                                            </form>
                                        </fieldset>
                                    </div>
                                    <div class="wizard-step-3">
                                        <fieldset>
                                            <legend class="pull-left width-full">Finalization</legend>
                                            <p class="f-s-20">Import completed, please refresh the page to view the results :)</p>
                                        </fieldset>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
			    </div>
			    <div class="tab-pane fade" id="place-view">
			        <ul class="nav nav-pills">
                        <li class="active">
                            <a href="#place-overview" data-toggle="tab" aria-expanded="true">Overview</a>
                        </li>
                        <li>
                            <a href="#place-manage" data-toggle="tab" aria-expanded="true">Manage</a>
                        </li>
                    </ul>
                    <div class="tab-content">
                        <div id="place-overview" class="tab-pane fade in active">
                            <div class="row">
                                <div class="col-md-12">
                                    <button class="btn material success m-b-15" onClick="showAssignPlacePopup()">Make a reservation</button>
                                    <div class="panel panel-primary">
                                        <div class="panel-heading">
                                            <div class="panel-heading-btn">
                                                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
                                                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
                                                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
                                            </div>
                                            <h4 class="panel-title">Place reservations</h4>
                                        </div>
                                        <div class="panel-body">
                                            <div class="placeSchedulerContainer calendar bg-white">
                                                
                                            </div>
                                        </div>
                                    </div>
                                    <div class="panel panel-primary">
                                        <div class="panel-heading">
                                            <div class="panel-heading-btn">
                                                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
                                                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
                                                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
                                            </div>
                                            <h4 class="panel-title">Reservation table</h4>
                                        </div>
                                        <div class="panel-body">
                                            <div class="dataTables_wrapper form-inline dt-bootstrap no-footer">
                                                <table id="placeReservationsTable" class="table table-striped">
                                                    <thead>
                                                        <tr>
                                                            <th>Place</th>
                                                            <th>Employee</th>
															<th>Location</th>
                                                            <th>Start date</th>
                                                            <th>End date</th>
                                                            <th>Status</th>
															<th></th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="place-manage" class="tab-pane fade">
                            <div class="row m-b-15">
                                <div class="col-md-12">
                                    <button class="btn material primary pull-left" onClick="showNewPlacePopup()">Add a place</button>
                                    <button class="btn material success pull-right" onClick="importPlaces()">Import places</button>
                                </div>
                            </div>
                            <div class="clearfix"></div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="panel panel-primary">
                                        <div class="panel-heading">
                                            <div class="panel-heading-btn">
                                                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
                                                <a href="getPlaces()" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-repeat"></i></a>
                                                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
                                                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
                                            </div>
                                            <h4 class="panel-title">Places</h4>
                                        </div>
                                        <div class="panel-body">
                                            <div class="dataTables_wrapper form-inline dt-bootstrap no-footer">
                                                <table id="placesTable" class="table table-striped">
                                                    <thead>
                                                        <tr>
                                                            <th>Name</th>
                                                            <th>Location</th>
                                                            <th>Description</th>
                                                            <th>In use by</th>
                                                            <th></th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div id="placesWizardDIV" class="bg-white p-15 m-t-15" hidden>
                                <div id="placesWizard">
                                    <ol>
                                        <li>
                                            Import CSV
                                            <small>Choose file and import</small>
                                        </li>
                                        <li>
                                            Setup
                                            <small>Setup data</small>
                                        </li>
                                        <li>
                                            Finalize
                                            <small>Complete import</small>
                                        </li>
                                    </ol>
                                    <div class="wizard-step-1">
                                        <fieldset>
                                            <legend class="pull-left width-full">Import CSV</legend>
                                            <form id="placesImportCSVForm" action="<?= BASE_URL . "csv/import" ?>" method="post" enctype="multipart/form-data" class="form-horizontal box has-advanced-upload">
                                                <div class="form-group">
                                                    <div class="col-md-12">
                                                        <label for="placesFile" id="placesLabel" class="box__label"><strong class="hover-label">Choose a file</strong><span> or drag it here</span>.</label>
                                                        <input type="file" name="csv" id="placesFile" class="box__file" required/>
                                                    </div>
                                                </div>
                                                <button class="btn material danger btn-centered">Upload file</button>
                                            </form>
                                        </fieldset>
                                    </div>
                                    <div class="wizard-step-2">
                                        <fieldset>
                                            <legend class="pull-left width-full">Import results</legend>
                                            <h4>Example data from file</h4>
                                            <table id="placesExampleDataTable" class="table table-striped">
                                                
                                            </table>
                                            <h4>Setup import fields</h4>
                                            <form id="placesCsvFieldsForm" action="<?= BASE_URL . "places/import" ?>" method="post" enctype="multipart/form-data" class="form-horizontal">
                                                <div class="form-group">
                                                    <div class="col-md-4">
                                                        <label>Name: <span class="red">*</span></label>
                                                        <select name="place_name" class="form-control places-import-select" required >
                                                        </select>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <label>Room name or number:</label>
                                                        <select name="place_room" class="form-control places-import-select" >
                                                            <option value="-1">Leave blank</option>
                                                        </select>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <label>Floor: </label>
                                                        <select name="place_floor" class="form-control places-import-select">
                                                            <option value="-1">Leave blank</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="col-md-4">
                                                        <label>Address: <span class="red"></span></label>
                                                        <select name="place_address" class="form-control places-import-select" required>
                                                            
                                                        </select>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <label>Latitude: <span class="red"></span></label>
                                                        <select name="latitude" class="form-control places-import-select">
                                                            
                                                        </select>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <label>Longitude: <span class="red"></span></label>
                                                        <select name="longitude" class="form-control places-import-select">
                                                            
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="col-md-4">
                                                        <label>Description:</label>
                                                        <select name="place_description" class="form-control places-import-select">
                                                            <option value="-1">Leave blank</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <button class="btn material primary">Finalize import</button>
                                            </form>
                                        </fieldset>
                                    </div>
                                    <div class="wizard-step-3">
                                        <fieldset>
                                            <legend class="pull-left width-full">Finalization</legend>
                                            <p class="f-s-20">Import completed, please refresh the page to view the results :)</p>
                                        </fieldset>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
			    </div>
			    <div class="tab-pane fade" id="other-view">
			        <ul class="nav nav-pills">
                        <li class="active">
                            <a href="#other-overview" data-toggle="tab" aria-expanded="true">Overview</a>
                        </li>
                        <li>
                            <a href="#other-manage" data-toggle="tab" aria-expanded="true">Manage</a>
                        </li>
                    </ul>
                    <div class="tab-content">
                        <div id="other-overview" class="tab-pane fade in active">
                            <div class="row">
                                <div class="col-md-12">
                                    <button class="btn material success m-b-15" onClick="showAssignOtherAssetPopup()">Make a reservation</button>
                                    <div class="panel panel-primary">
                                        <div class="panel-heading">
                                            <div class="panel-heading-btn">
                                                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
                                                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
                                                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
                                            </div>
                                            <h4 class="panel-title">Asset reservations</h4>
                                        </div>
                                        <div class="panel-body">
                                            <div class="otherassetSchedulerContainer calendar">
                                                
                                            </div>
                                        </div>
                                    </div>
                                    <div class="panel panel-primary">
                                        <div class="panel-heading">
                                            <div class="panel-heading-btn">
                                                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
                                                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
                                                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
                                            </div>
                                            <h4 class="panel-title">Reservation table</h4>
                                        </div>
                                        <div class="panel-body">
                                            <div class="dataTables_wrapper form-inline dt-bootstrap no-footer">
                                                <table id="otherAssetsReservationsTable" class="table table-striped">
                                                    <thead>
                                                        <tr>
                                                            <th>Asset</th>
                                                            <th>Employee</th>
                                                            <th>Start date</th>
                                                            <th>End date</th>
                                                            <th>Status</th>
															<th></th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="other-manage" class="tab-pane fade">
                            <div class="row m-b-15">
                                <div class="col-md-12">
                                    <button class="btn material primary pull-left" onClick="showNewOtherAssetPopup()">Add other asset</button>
                                    <button class="btn material success pull-right" onClick="importOtherAssets()">Import assets</button>
                                </div>
                            </div>
                            <div class="clearfix"></div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="panel panel-primary">
                                        <div class="panel-heading">
                                            <div class="panel-heading-btn">
                                                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
                                                <a href="getOtherAssets()" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-repeat"></i></a>
                                                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
                                                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
                                            </div>
                                            <h4 class="panel-title">Other assets</h4>
                                        </div>
                                        <div class="panel-body">
                                            <div class="dataTables_wrapper form-inline dt-bootstrap no-footer">
                                                <table id="otherAssetsTable" class="table table-striped">
                                                    <thead>
                                                        <tr>
                                                            <th>Name</th>
															<th>Location</th>
                                                            <th>Description</th>
                                                            <th>In use by</th>
                                                            <th></th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div id="assetWizardDIV" class="bg-white p-15 m-t-15" hidden>
                                <div id="assetWizard">
                                    <ol>
                                        <li>
                                            Import CSV
                                            <small>Choose file and import</small>
                                        </li>
                                        <li>
                                            Setup
                                            <small>Setup data</small>
                                        </li>
                                        <li>
                                            Finalize
                                            <small>Complete import</small>
                                        </li>
                                    </ol>
                                    <div class="wizard-step-1">
                                        <fieldset>
                                            <legend class="pull-left width-full">Import CSV</legend>
                                            <form id="assetImportCSVForm" action="<?= BASE_URL . "csv/import" ?>" method="post" enctype="multipart/form-data" class="form-horizontal box has-advanced-upload">
                                                <div class="form-group">
                                                    <div class="col-md-12">
                                                        <label for="assetFile" id="assetLabel" class="box__label"><strong class="hover-label">Choose a file</strong><span> or drag it here</span>.</label>
                                                        <input type="file" name="csv" id="assetFile" class="box__file" required/>
                                                    </div>
                                                </div>
                                                <button class="btn material danger btn-centered">Upload file</button>
                                            </form>
                                        </fieldset>
                                    </div>
                                    <div class="wizard-step-2">
                                        <fieldset>
                                            <legend class="pull-left width-full">Import results</legend>
                                            <h4>Example data from file</h4>
                                            <table id="assetExampleDataTable" class="table table-striped">
                                                
                                            </table>
                                            <h4>Setup import fields</h4>
                                            <form id="assetCsvFieldsForm" action="<?= BASE_URL . "otherassets/import" ?>" method="post" enctype="multipart/form-data" class="form-horizontal">
                                                <div class="form-group">
                                                    <div class="col-md-4">
                                                        <label>Asset name: <span class="red">*</span>
                                                        </label>
                                                        <select name="asset_name" class="form-control asset-import-select" required >
                                                        </select>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <label>Asset description: <span class="red">*</span>
                                                        </label>
                                                        <select name="asset_description" class="form-control asset-import-select">
                                                            <option value="-1">Leave blank</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <button class="btn material primary">Finalize import</button>
                                            </form>
                                        </fieldset>
                                    </div>
                                    <div class="wizard-step-3">
                                        <fieldset>
                                            <legend class="pull-left width-full">Finalization</legend>
                                            <p class="f-s-20">Import completed, please refresh the page to view the results :)</p>
                                        </fieldset>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
			    </div>
			 </div>
		</div>
        
        <div class="popupContainer" id="vehiclePopupDIV" hidden>
            <div class="panel panel-primary" id="addVehicleDIV" hidden>
                <div class="panel-heading">
                    <div class="panel-heading-btn">
                        <button class="btn btn-xs btn-icon btn-circle btn-default" onClick="hideNewVehiclePopup()"><i class="fa fa-times"></i>
                        </button>
                    </div>
                    <h4 class="panel-title">New vehicle</h4>
                </div>
                <div class="panel-body">
                    <form id="addVehicleForm" action="<?= BASE_URL . "vehicles/add" ?>" method="post" class="form-horizontal">
                        <fieldset>
                            <legend>General</legend>
                            <div class="form-group">
                                <div class="col-md-6">
                                    <label>Vehicle type:</label><br>
                                    <div class="radio radio-css radio-inline radio-success">
                                        <input type="radio" name="vehicle_type" value="Personal" id="nar1" checked>
                                        <label for="nar1">
                                            Personal
                                        </label>
                                    </div>
                                    <div class="radio radio-css radio-inline radio-danger">
                                        <input type="radio" name="vehicle_type" value="Company" id="nar2">
                                        <label for="nar2">
                                            Company
                                        </label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label>Fuel type:</label><br>
                                    <div class="radio radio-css radio-inline radio-primary">
                                        <input type="radio" name="fuel_type" value="Petrol" id="nbr1" checked>
                                        <label for="nbr1">
                                            Petrol
                                        </label>
                                    </div>
                                    <div class="radio radio-css radio-inline radio-primary">
                                        <input type="radio" name="fuel_type" value="Diesel" id="nbr3">
                                        <label for="nbr3">
                                            Diesel
                                        </label>
                                    </div>
                                    <div class="radio radio-css radio-inline radio-primary">
                                        <input type="radio" name="fuel_type" value="Electrical" id="nbr2">
                                        <label for="nbr2">
                                            Electrical
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-12">
                                    <div class="checkbox checkbox-css hide" id="permanentReservation">
                                        <input id="permRes" type="checkbox" name="permanent_reservation" value="1" >
                                        <label for="permRes">
                                            Reserve this vehicle permanently
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group" id="vehicleOwnerDIV">
                                <div class="col-md-12">
                                    <label>Vehicle owner:</label>
                                    <select id="vehicleOwnerSelect" class="form-control" name="employee_id">
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-6">
                                    <label>VIN:</label>
                                    <input type="text" class="form-control" name="vehicle_vin" placeholder="Vehicle identification number" />
                                </div>
                                <div class="col-md-3">
                                    <label>Year of make:</label>
                                    <input type="text" class="form-control" name="vehicle_year" placeholder="Year of make" pattern="\d{4}" />
                                </div>
                                <div class="col-md-3">
                                    <label>Mileage <span class="red">*</span></label>
                                    <input type="number" class="form-control" name="vehicle_mileage" placeholder="Mileage" required />
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-6">
                                    <label>Brand: <span class="red">*</span></label>
                                    <input type="text" name="vehicle_brand" class="form-control" placeholder="Vehicle brand" required />
                                </div>
                                <div class="col-md-6">
                                    <label>Model: <span class="red">*</span></label>
                                    <input type="text" name="vehicle_model" class="form-control" placeholder="Vehicle model" required />
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-4">
                                    <label>Registration number: <span class="red">*</span></label>
                                    <input type="text" name="vehicle_registration" class="form-control" placeholder="Registration number" required />
                                </div>
                                <div class="col-md-2">
                                    <label>Seats</label>
                                    <input type="number" class="form-control" name="vehicle_seats" min="2" value="5" />
                                </div>
                                <div class="col-md-6">
                                    <label>Has vignette:</label><br>
                                    <div class="radio radio-css radio-inline radio-success">
                                        <input type="radio" name="vehicle_vignette" value="1" id="ncr1" checked>
                                        <label for="ncr1">
                                            Yes
                                        </label>
                                    </div>
                                    <div class="radio radio-css radio-inline radio-danger">
                                        <input type="radio" name="vehicle_vignette" value="0" id="ncr2">
                                        <label for="ncr2">
                                            No
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </fieldset>
                        <fieldset>
                            <legend>Miscellaneous</legend>
                            <div class="form-group">
                                <div class="col-md-4">
                                    <label>Insurance validity date:</label>
                                    <input type="text" class="form-control date-input" name="vehicle_insurancedate" placeholder="Insurance validity date" />
                                </div>
                                <div class="col-md-4">
                                    <label>Registration validity date:</label>
                                    <input type="text" class="form-control date-input" name="vehicle_registrationdate" placeholder="Registration validity date" />
                                </div>
                                <div class="col-md-4">
                                    <label>Last service date:</label>
                                    <input type="text" class="form-control date-input" name="vehicle_servicedate" placeholder="Last service date" />
                                </div>
                            </div>
                        </fieldset>
                        <button class="btn material primary">Add vehicle</button>
                    </form>
                </div>
            </div>
            <div class="panel panel-primary" id="editVehicleDIV" hidden>
                <div class="panel-heading">
                    <div class="panel-heading-btn">
                        <button class="btn btn-xs btn-icon btn-circle btn-default" onClick="hideEditVehiclePopup()"><i class="fa fa-times"></i>
                        </button>
                    </div>
                    <h4 class="panel-title">Edit vehicle</h4>
                </div>
                <div class="panel-body">
                    <form id="editVehicleForm" action="<?= BASE_URL . "vehicles/edit" ?>" method="post" class="form-horizontal">
                        <input id="editVehicleIDInput" type="hidden" name="vehicle_id" />
                        <fieldset>
                            <legend>General</legend>
                            <div class="form-group">
                                <div class="col-md-6">
                                    <label>Vehicle type:</label><br>
                                    <div class="radio radio-css radio-inline radio-success">
                                        <input type="radio" name="vehicle_type" value="Personal" id="enar1" checked>
                                        <label for="enar1">
                                            Personal
                                        </label>
                                    </div>
                                    <div class="radio radio-css radio-inline radio-danger">
                                        <input type="radio" name="vehicle_type" value="Company" id="enar2">
                                        <label for="enar2">
                                            Company
                                        </label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label>Fuel type:</label><br>
                                    <div class="radio radio-css radio-inline radio-primary">
                                        <input type="radio" name="fuel_type" value="Petrol" id="enbr1" checked>
                                        <label for="enbr1">
                                            Petrol
                                        </label>
                                    </div>
                                    <div class="radio radio-css radio-inline radio-primary">
                                        <input type="radio" name="fuel_type" value="Diesel" id="enbr3">
                                        <label for="enbr3">
                                            Diesel
                                        </label>
                                    </div>
                                    <div class="radio radio-css radio-inline radio-primary">
                                        <input type="radio" name="fuel_type" value="Electrical" id="enbr2">
                                        <label for="enbr2">
                                            Electrical
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-12">
                                    <div class="checkbox checkbox-css hide" id="editPermanentReservation">
                                        <input id="editPermRes" type="checkbox" name="permanent_reservation" value="1" >
                                        <label for="editPermRes">
                                            Reserve this vehicle permanently
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group" id="editVehicleOwnerDIV" hidden>
                                <div class="col-md-12">
                                    <label>Vehicle owner:</label>
                                    <select id="editVehicleOwnerSelect" class="form-control" name="employee_id">
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-6">
                                    <label>VIN:</label>
                                    <input id="editVehicleVINInput" type="text" class="form-control" name="vehicle_vin" placeholder="Vehicle identification number" />
                                </div>
                                <div class="col-md-3">
                                    <label>Year of make:</label>
                                    <input id="editVehicleYearInput" type="text" class="form-control" name="vehicle_year" placeholder="Year of make" pattern="\d{4}" />
                                </div>
                                <div class="col-md-3">
                                    <label>Mileage<span class="red">*</span></label>
                                    <input id="editVehicleMileageInput" type="number" class="form-control" name="vehicle_mileage" placeholder="Mileage" required />
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-6">
                                    <label>Brand: <span class="red">*</span></label>
                                    <input id="editVehicleBrandInput" type="text" name="vehicle_brand" class="form-control" placeholder="Vehicle brand" required />
                                </div>
                                <div class="col-md-6">
                                    <label>Model: <span class="red">*</span></label>
                                    <input id="editVehicleModelInput" type="text" name="vehicle_model" class="form-control" placeholder="Vehicle model" required />
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-4">
                                    <label>Registration number: <span class="red">*</span></label>
                                    <input id="editVehicleRegistrationInput" type="text" name="vehicle_registration" class="form-control" placeholder="Registration number" required />
                                </div>
                                <div class="col-md-2">
                                    <label>Seats</label>
                                    <input id="editVehicleSeatsInput" type="number" class="form-control" name="vehicle_seats" min="2" value="5" />
                                </div>
                                <div class="col-md-6">
                                    <label>Has vignette:</label><br>
                                    <div class="radio radio-css radio-inline radio-success">
                                        <input type="radio" name="vehicle_vignette" value="1" id="encr1" checked>
                                        <label for="encr1">
                                            Yes
                                        </label>
                                    </div>
                                    <div class="radio radio-css radio-inline radio-danger">
                                        <input type="radio" name="vehicle_vignette" value="0" id="encr2">
                                        <label for="encr2">
                                            No
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </fieldset>
                        <fieldset>
                            <legend>Miscellaneous</legend>
                            <div class="form-group">
                                <div class="col-md-4">
                                    <label>Insurance validity date:</label>
                                    <input id="editVehicleInsuranceDateInput" type="text" class="form-control date-input" name="vehicle_insurancedate" placeholder="Insurance validity date" />
                                </div>
                                <div class="col-md-4">
                                    <label>Registration validity date:</label>
                                    <input id="editVehicleRegistrationDateInput" type="text" class="form-control date-input" name="vehicle_registrationdate" placeholder="Registration validity date" />
                                </div>
                                <div class="col-md-4">
                                    <label>Last service date:</label>
                                    <input id="editVehicleServiceDateInput" type="text" class="form-control date-input" name="vehicle_servicedate" placeholder="Last service date" />
                                </div>
                            </div>
                        </fieldset>
                        <button class="btn material primary">Edit vehicle</button>
                    </form>
                </div>
            </div>
            <div class="panel panel-primary" id="assignVehicleDIV" hidden>
                <div class="panel-heading">
                    <div class="panel-heading-btn">
                        <button class="btn btn-xs btn-icon btn-circle btn-default" onClick="hideAssignVehiclePopup()"><i class="fa fa-times"></i>
                        </button>
                    </div>
                    <h4 class="panel-title">Make a reservation</h4>
                </div>
                <div class="panel-body">
                    <form id="assignVehicleForm" action="<?= BASE_URL . "vehicles/reserve" ?>" method="post" class="form-horizontal">
                        <div class="form-group">
                            <div class="col-md-12">
                                <label>Vehicle:</label>
                                <select id="vehicleReservationSelect" name="vehicle_id" class="form-control" required>
                                    <option value="">Choose a vehicle</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-12">
                                <label>Reservation for: <span class="red">*</span></label>
                                <select id="moveVehicleEmployeeSelect" name="employee_id" class="form-control" required>
                                        
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-8">
                                <label>Start date: <span class="red">*</span></label>
                                <div class="input-group date-picker">
                                    <input type="text" name="start_date" class="form-control"  placeholder="Choose start date" required />
                                    <span class="input-group-addon btn bg-primary">
                                        <span class="fa fa-calendar text-white"></span>
                                    </span>                    
                                </div>
                            </div>
                            <div class="col-md-4">
                                <label>Start time: <span class="red">*</span></label>
                                <div class="input-group time-picker">
                                    <input type="text" name="start_time" class="form-control"  placeholder="Choose start time" required />
                                    <span class="input-group-addon btn bg-primary">
                                        <span class="fa fa-clock text-white"></span>
                                    </span>                    
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-8">
                                <label>End date: <span class="red">*</span></label>
                                <div class="input-group date-picker">
                                    <input type="text" name="end_date" class="form-control"  placeholder="Choose end date" required />
                                    <span class="input-group-addon btn bg-primary">
                                        <span class="fa fa-calendar text-white"></span>
                                    </span>                    
                                </div>
                            </div>
                            <div class="col-md-4">
                                <label>End time: <span class="red">*</span></label>
                                <div class="input-group time-picker">
                                    <input type="text" name="end_time" class="form-control"  placeholder="Choose end time" required />
                                    <span class="input-group-addon btn bg-primary">
                                        <span class="fa fa-clock text-white"></span>
                                    </span>                    
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-12">
                                <label>Purpose of reservation:</label>
                                <textarea class="form-control" name="reservation_description" placeholder="Enter reservation purpose or description" rows="4" required></textarea>
                            </div>
                        </div>
                        <button class="btn material primary m-t-15 pull-left">Reserve vehicle</button>
                        <button type="button" class="btn material m-t-15 danger pull-right" onClick="hideAssignVehiclePopup()">Cancel</button>
                    </form>
                </div>
            </div>
        </div>
        
        <div class="popupContainer" id="mapPopupDIV" hidden>
            <div class="panel panel-primary" id="mapDIV" hidden>
                    <div class="panel-heading">
                        <div class="panel-heading-btn">
                            <button onclick="hideMapPopup()" class="btn btn-xs btn-icon btn-circle btn-default"><i class="fa fa-times"></i>
                            </button>
                        </div>
                        <h4 class="panel-title">Place location</h4>
                    </div>
                    <div class="panel-body p-0">
                        <div id="map">
                            
                        </div>
                    </div>
                </div>
        </div>
        
        <div class="popupContainer" id="equipmentPopupDIV" hidden>
            <div class="panel panel-primary" id="addEquipmentDIV" hidden>
                <div class="panel-heading">
                    <div class="panel-heading-btn">
                        <button class="btn btn-xs btn-icon btn-circle btn-default" onClick="hideNewEquipmentPopup()"><i class="fa fa-times"></i>
                        </button>
                    </div>
                    <h4 class="panel-title">New equipment</h4>
                </div>
                <div class="panel-body">
                    <form id="addEquipmentForm" action="<?= BASE_URL . "equipment/add" ?>" method="post" class="form-horizontal">
						<input id="hiddenEquipmentLatitudeInput" type="hidden" name="latitude" />
						<input id="hiddenEquipmentLongitudeInput" type="hidden" name="longitude" />
                        <div class="form-group">
                            <div class="col-md-6">
                                <label>Equipment name: <span class="red">*</span></label>
                                <input type="text" name="equipment_name" class="form-control" placeholder="Equipment name" required />
                            </div>
                            <div class="col-md-6">
                                <label>Equipment category: <span class="red">*</span></label>
                                <input type="text" name="equipment_category" class="form-control" placeholder="Equipment category" required />
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-12">
                                <label>Serial number:</label>
                                <input type="text" class="form-control" name="equipment_code" placeholder="Equipment ID" />
                            </div>
                        </div>
						<div class="form-group">
							<div class="col-md-12">
								<label>Address: <span class="text-danger">*</span></label>
								<input id="equipmentAddressInput" type="text" name="equipment_location" class="form-control" placeholder="Enter an address" required />
							</div>
						</div>
                        <div class="form-group">
                            <div class="col-md-12">
                                <label>Equipment description: </label>
                                <textarea name="equipment_description" class="form-control" placeholder="Enter a short description" rows="4"></textarea>
                            </div>
                        </div>
						<div class="form-group">
							<div class="col-md-4">
								<label>Contact name: <span class="red">*</span></label>
								<input type="text" class="form-control" placeholder="Enter contact name" name="contact_name" required />
							</div>
							<div class="col-md-4">
								<label>Contact surname: <span class="red">*</span></label>
								<input type="text" class="form-control" placeholder="Enter contact surname" name="contact_surname" required />
							</div>
							<div class="col-md-4">
								<label>Phone: <span class="red">*</span></label>
								<input type="text" class="form-control" placeholder="Enter contact phone" name="contact_phone" required />
							</div>
						</div>
                        <button class="btn material primary">Add equipment</button>
                    </form>
                </div>
            </div>
            <div class="panel panel-primary" id="editEquipmentDIV" hidden>
                <div class="panel-heading">
                    <div class="panel-heading-btn">
                        <button class="btn btn-xs btn-icon btn-circle btn-default" onClick="hideEditEquipmentPopup()"><i class="fa fa-times"></i>
                        </button>
                    </div>
                    <h4 class="panel-title">Edit equipment</h4>
                </div>
                <div class="panel-body">
                    <form id="editEquipmentForm" action="<?= BASE_URL . "equipment/edit" ?>" method="post" class="form-horizontal">
                        <input id="editEquipmentIDInput" type="hidden" name="equipment_id" />
						<input id="hiddenEditEquipmentLatitudeInput" type="hidden" name="latitude" />
						<input id="hiddenEditEquipmentLongitudeInput" type="hidden" name="longitude" />
                        <div class="form-group">
                            <div class="col-md-6">
                                <label>Equipment name: <span class="red">*</span></label>
                                <input id="editEquipmentNameInput" type="text" name="equipment_name" class="form-control" placeholder="Equipment name" required />
                            </div>
                            <div class="col-md-6">
                                <label>Equipment category: <span class="red">*</span></label>
                                <input id="editEquipmentCategoryInput" type="text" name="equipment_category" class="form-control" placeholder="Equipment category" required />
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-12">
                                <label>Serial number:</label>
                                <input id="editEquipmentCodeInput" type="text" class="form-control" name="equipment_code" placeholder="Equipment ID" />
                            </div>
                        </div>
						<div class="form-group">
							<div class="col-md-12">
								<label>Address: <span class="text-danger">*</span></label>
								<input id="editEquipmentAddressInput" type="text" name="equipment_location" class="form-control" placeholder="Enter an address" required />
							</div>
						</div>
                        <div class="form-group">
                            <div class="col-md-12">
                                <label>Equipment description: </label>
                                <textarea id="editEquipmentDescriptionInput" name="equipment_description" class="form-control" placeholder="Enter a short description" rows="4"></textarea>
                            </div>
                        </div>
						<div class="form-group">
							<div class="col-md-4">
								<label>Contact name: <span class="red">*</span></label>
								<input type="text" class="form-control" placeholder="Enter contact name" name="contact_name" required />
							</div>
							<div class="col-md-4">
								<label>Contact surname: <span class="red">*</span></label>
								<input type="text" class="form-control" placeholder="Enter contact surname" name="contact_surname" required />
							</div>
							<div class="col-md-4">
								<label>Phone: <span class="red">*</span></label>
								<input type="text" class="form-control" placeholder="Enter contact phone" name="contact_phone" required />
							</div>
						</div>
                        <button class="btn material primary">Edit equipment</button>
                    </form>
                </div>
            </div>
            <div class="panel panel-primary" id="assignEquipmentDIV" hidden>
                <div class="panel-heading">
                    <div class="panel-heading-btn">
                        <button class="btn btn-xs btn-icon btn-circle btn-default" onClick="hideAssignEquipmentPopup()"><i class="fa fa-times"></i>
                        </button>
                    </div>
                    <h4 class="panel-title">Assign equipment to</h4>
                </div>
                <div class="panel-body">
                    <form id="assignEquipmentForm" action="<?= BASE_URL . "equipment/employee" ?>" method="post" class="form-horizontal">
                        <div class="form-group">
                            <div class="col-md-12">
                                <label>Equipment:</label>
                                <select id="equipmentReservationSelect" name="equipment_id" class="form-control" required>
                                    <option value="">Choose equipment</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-12">
                                <label>Assign to: <span class="red">*</span></label>
                                <select id="moveEquipmentEmployeeSelect" name="employee_id" class="form-control">
                                                
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-8">
                                <label>Start date: <span class="red">*</span></label>
                                <div class="input-group date-picker">
                                    <input type="text" name="start_date" class="form-control"  placeholder="Choose start date" required />
                                    <span class="input-group-addon btn bg-primary">
                                        <span class="fa fa-calendar text-white"></span>
                                    </span>                    
                                </div>
                            </div>
                            <div class="col-md-4">
                                <label>Start time: <span class="red">*</span></label>
                                <div class="input-group time-picker">
                                    <input type="text" name="start_time" class="form-control"  placeholder="Choose start time" required />
                                    <span class="input-group-addon btn bg-primary">
                                        <span class="fa fa-clock text-white"></span>
                                    </span>                    
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-8">
                                <label>End date: <span class="red">*</span></label>
                                <div class="input-group date-picker">
                                    <input type="text" name="end_date" class="form-control"  placeholder="Choose end date" required />
                                    <span class="input-group-addon btn bg-primary">
                                        <span class="fa fa-calendar text-white"></span>
                                    </span>                    
                                </div>
                            </div>
                            <div class="col-md-4">
                                <label>End time: <span class="red">*</span></label>
                                <div class="input-group time-picker">
                                    <input type="text" name="end_time" class="form-control"  placeholder="Choose end time" required />
                                    <span class="input-group-addon btn bg-primary">
                                        <span class="fa fa-clock text-white"></span>
                                    </span>                    
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-12">
                                <label>Purpose of reservation:</label>
                                <textarea class="form-control" name="reservation_description" placeholder="Enter reservation purpose or description" required></textarea>
                            </div>
                        </div>
                        <button class="btn material primary m-t-15">Reserve equipment</button>
                        <button type="button" class="btn material m-t-15 danger pull-right" onClick="hideAssignEquipmentPopup()">Cancel</button>
                    </form>
                </div>
            </div>
        </div>
        
        <div class="popupContainer" id="placesPopupDIV" hidden>
            <div class="panel panel-primary" id="addPlaceDIV" hidden>
                <div class="panel-heading">
                    <div class="panel-heading-btn">
                        <button class="btn btn-xs btn-icon btn-circle btn-default" onClick="hideNewPlacePopup()"><i class="fa fa-times"></i>
                        </button>
                    </div>
                    <h4 class="panel-title">New place</h4>
                </div>
                <div class="panel-body">
                    <form id="addPlaceForm" action="<?= BASE_URL . "places/add" ?>" method="post" class="form-horizontal">
                        <input type="hidden" id="hiddenPlaceLatitudeInput" name="latitude" />
                        <input type="hidden" id="hiddenPlaceLongitudeInput" name="longitude" />
                        <div class="form-group">
                            <div class="col-md-12">
                                <label>Name: <span class="red">*</span></label>
                                <input type="text" name="place_name" class="form-control" placeholder="Name" required />
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-9">
                                <label>Room name or number:</label>
                                <input type="text" class="form-control" name="place_room" placeholder="Room name or number" />
                            </div>
                            <div class="col-md-3">
                                <label>Floor:</label>
                                <input type="number" class="form-control" name="place_floor" min="0" value="0" />
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-12">
                                <label>Address: <span class="red">*</span></label>
                                <input id="newPlaceAddressInput" type="text" name="place_address" class="form-control" placeholder="Enter an address" required />
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-12">
                                <label>Description: </label>
                                <textarea name="place_description" class="form-control" placeholder="Enter a short description" rows="4"></textarea>
                            </div>
                        </div>
						<div class="form-group">
							<div class="col-md-4">
								<label>Contact name: <span class="red">*</span></label>
								<input type="text" class="form-control" placeholder="Enter contact name" name="contact_name" required />
							</div>
							<div class="col-md-4">
								<label>Contact surname: <span class="red">*</span></label>
								<input type="text" class="form-control" placeholder="Enter contact surname" name="contact_surname" required />
							</div>
							<div class="col-md-4">
								<label>Phone: <span class="red">*</span></label>
								<input type="text" class="form-control" placeholder="Enter contact phone" name="contact_phone" required />
							</div>
						</div>
                        <button class="btn material primary">Add place</button>
                    </form>
                </div>
            </div>
            <div class="panel panel-primary" id="editPlaceDIV" hidden>
                <div class="panel-heading">
                    <div class="panel-heading-btn">
                        <button class="btn btn-xs btn-icon btn-circle btn-default" onClick="hideEditPlacePopup()"><i class="fa fa-times"></i>
                        </button>
                    </div>
                    <h4 class="panel-title">Edit place</h4>
                </div>
                <div class="panel-body">
                    <form id="editPlaceForm" action="<?= BASE_URL . "places/edit" ?>" method="post" class="form-horizontal">
                        <input type="hidden" id="hiddenEditPlaceLatitudeInput" name="latitude" />
                        <input type="hidden" id="hiddenEditPlaceLongitudeInput" name="longitude" />
                        <input type="hidden" id="editPlaceIDInput" name="place_id" />
                        <div class="form-group">
                            <div class="col-md-12">
                                <label>Name: <span class="red">*</span></label>
                                <input id="editPlaceNameInput" type="text" name="place_name" class="form-control" placeholder="Name" required />
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-9">
                                <label>Room name or number:</label>
                                <input id="editPlaceRoomInput" type="text" class="form-control" name="place_room" placeholder="Room name or number" />
                            </div>
                            <div class="col-md-3">
                                <label>Floor:</label>
                                <input id="editPlaceFloorInput" type="number" class="form-control" name="place_floor" min="0" />
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-12">
                                <label>Address: <span class="red">*</span></label>
                                <input id="editPlaceAddressInput" type="text" name="place_address" class="form-control" placeholder="Enter an address" required />
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-12">
                                <label>Description: </label>
                                <textarea id="editPlaceDescriptionInput" name="place_description" class="form-control" placeholder="Enter a short description" rows="4"></textarea>
                            </div>
                        </div>
						<div class="form-group">
							<div class="col-md-4">
								<label>Contact name: <span class="red">*</span></label>
								<input type="text" class="form-control" placeholder="Enter contact name" name="contact_name" required />
							</div>
							<div class="col-md-4">
								<label>Contact surname: <span class="red">*</span></label>
								<input type="text" class="form-control" placeholder="Enter contact surname" name="contact_surname" required />
							</div>
							<div class="col-md-4">
								<label>Phone: <span class="red">*</span></label>
								<input type="text" class="form-control" placeholder="Enter contact phone" name="contact_phone" required />
							</div>
						</div>
                        <button class="btn material primary">Edit place</button>
                    </form>
                </div>
            </div>
            <div class="panel panel-primary" id="assignPlaceDIV" hidden>
                <div class="panel-heading">
                    <div class="panel-heading-btn">
                        <button class="btn btn-xs btn-icon btn-circle btn-default" onClick="hideAssignPlacePopup()"><i class="fa fa-times"></i>
                        </button>
                    </div>
                    <h4 class="panel-title">Assign place to</h4>
                </div>
                <div class="panel-body">
                    <form id="assignPlaceForm" action="<?= BASE_URL . "places/employee" ?>" method="post" class="form-horizontal">
                        <div class="form-group">
                            <div class="col-md-12">
                                <label>Place:</label>
                                <select id="placeReservationSelect" name="place_id" class="form-control" required>
                                    <option value="">Choose a place</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-12">
                                <label>Assign to: <span class="red">*</span></label>
                                <select id="movePlaceEmployeeSelect" name="employee_id" class="form-control">
                                            
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-8">
                                <label>Start date: <span class="red">*</span></label>
                                <div class="input-group date-picker">
                                    <input type="text" name="start_date" class="form-control"  placeholder="Choose start date" required />
                                    <span class="input-group-addon btn bg-primary">
                                        <span class="fa fa-calendar text-white"></span>
                                    </span>                    
                                </div>
                            </div>
                            <div class="col-md-4">
                                <label>Start time: <span class="red">*</span></label>
                                <div class="input-group time-picker">
                                    <input type="text" name="start_time" class="form-control"  placeholder="Choose start time" required />
                                    <span class="input-group-addon btn bg-primary">
                                        <span class="fa fa-clock text-white"></span>
                                    </span>                    
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-8">
                                <label>End date: <span class="red">*</span></label>
                                <div class="input-group date-picker">
                                    <input type="text" name="end_date" class="form-control"  placeholder="Choose end date" required />
                                    <span class="input-group-addon btn bg-primary">
                                        <span class="fa fa-calendar text-white"></span>
                                    </span>                    
                                </div>
                            </div>
                            <div class="col-md-4">
                                <label>End time: <span class="red">*</span></label>
                                <div class="input-group time-picker">
                                    <input type="text" name="end_time" class="form-control"  placeholder="Choose end time" required />
                                    <span class="input-group-addon btn bg-primary">
                                        <span class="fa fa-clock text-white"></span>
                                    </span>                    
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-12">
                                <label>Purpose of reservation:</label>
                                <textarea class="form-control" name="reservation_description" placeholder="Enter reservation purpose or description" required></textarea>
                            </div>
                        </div>
                        <button class="btn material primary m-t-15" >Reserve place</button>
                        <button type="button" class="btn material m-t-15 danger pull-right" onClick="hideAssignPlacePopup()">Cancel</button>
                    </form>
                </div>
            </div>
        </div>
        
        <div class="popupContainer" id="otherAssetsPopupDIV" hidden>
            <div class="panel panel-primary" id="addOtherAssetDIV" hidden>
                <div class="panel-heading">
                    <div class="panel-heading-btn">
                        <button class="btn btn-xs btn-icon btn-circle btn-default" onClick="hideNewOtherAssetPopup()"><i class="fa fa-times"></i>
                        </button>
                    </div>
                    <h4 class="panel-title">New asset</h4>
                </div>
                <div class="panel-body">
                    <form id="addOtherAssetForm" action="<?= BASE_URL . "otherassets/add" ?>" method="post" class="form-horizontal">
						<input type="hidden" name="latitude" id="hiddenOtherAssetLatitudeInput" />
						<input type="hidden" name="longitude" id="hiddenOtherAssetLongitudeInput" />
                        <div class="form-group">
                            <div class="col-md-6">
                                <label>Asset name: <span class="red">*</span></label>
                                <input type="text" name="asset_name" class="form-control" placeholder="Asset name" required />
                            </div>
                        </div>
						<div class="form-group">
							<div class="col-md-12">
								<label>Address: <span class="text-danger">*</span></label>
								<input id="otherAssetAddressInput" type="text" name="asset_location" class="form-control" placeholder="Enter an address" required />
							</div>
						</div>
                        <div class="form-group">
                            <div class="col-md-12">
                                <label>Asset description: </label>
                                <textarea name="asset_description" class="form-control" placeholder="Enter a short description" rows="4"></textarea>
                            </div>
                        </div>
						<div class="form-group">
							<div class="col-md-4">
								<label>Contact name: <span class="red">*</span></label>
								<input type="text" class="form-control" placeholder="Enter contact name" name="contact_name" required />
							</div>
							<div class="col-md-4">
								<label>Contact surname: <span class="red">*</span></label>
								<input type="text" class="form-control" placeholder="Enter contact surname" name="contact_surname" required />
							</div>
							<div class="col-md-4">
								<label>Phone: <span class="red">*</span></label>
								<input type="text" class="form-control" placeholder="Enter contact phone" name="contact_phone" required />
							</div>
						</div>
                        <button class="btn material primary">Add asset</button>
                    </form>
                </div>
            </div>
            <div class="panel panel-primary" id="editOtherAssetDIV" hidden>
                <div class="panel-heading">
                    <div class="panel-heading-btn">
                        <button class="btn btn-xs btn-icon btn-circle btn-default" onClick="hideEditOtherAssetPopup()"><i class="fa fa-times"></i>
                        </button>
                    </div>
                    <h4 class="panel-title">Edit asset</h4>
                </div>
                <div class="panel-body">
                    <form id="editOtherAssetForm" action="<?= BASE_URL . "otherassets/edit" ?>" method="post" class="form-horizontal">
                        <input type="hidden" id="editOtherAssetIDInput" name="asset_id" />
						<input type="hidden" name="latitude" id="hiddenEditOtherAssetLatitudeInput" />
						<input type="hidden" name="longitude" id="hiddenEditOtherAssetLongitudeInput" />
                        <div class="form-group">
                            <div class="col-md-6">
                                <label>Asset name: <span class="red">*</span></label>
                                <input id="editOtherAssetNameInput" type="text" name="asset_name" class="form-control" placeholder="Asset name" required />
                            </div>
                        </div>
						<div class="form-group">
							<div class="col-md-12">
								<label>Address: <span class="text-danger">*</span></label>
								<input id="editOtherAssetAddressInput" type="text" name="asset_location" class="form-control" placeholder="Enter an address" required />
							</div>
						</div>
                        <div class="form-group">
                            <div class="col-md-12">
                                <label>Asset description: </label>
                                <textarea id="editOtherAssetDescriptionInput" name="asset_description" class="form-control" placeholder="Enter a short description" rows="4"></textarea>
                            </div>
                        </div>
						<div class="form-group">
							<div class="col-md-4">
								<label>Contact name: <span class="red">*</span></label>
								<input type="text" class="form-control" placeholder="Enter contact name" name="contact_name" required />
							</div>
							<div class="col-md-4">
								<label>Contact surname: <span class="red">*</span></label>
								<input type="text" class="form-control" placeholder="Enter contact surname" name="contact_surname" required />
							</div>
							<div class="col-md-4">
								<label>Phone: <span class="red">*</span></label>
								<input type="text" class="form-control" placeholder="Enter contact phone" name="contact_phone" required />
							</div>
						</div>
                        <button class="btn material primary">Edit asset</button>
                    </form>
                </div>
            </div>
            <div class="panel panel-primary" id="assignOtherAssetDIV" hidden>
                <div class="panel-heading">
                    <div class="panel-heading-btn">
                        <button class="btn btn-xs btn-icon btn-circle btn-default" onClick="hideAssignOtherAssetPopup()"><i class="fa fa-times"></i>
                        </button>
                    </div>
                    <h4 class="panel-title">Assign asset to</h4>
                </div>
                <div class="panel-body">
                    <form id="assignOtherAssetForm" action="<?= BASE_URL . "otherassets/employee" ?>" method="post" class="form-horizontal">
                        <div class="form-group">
                            <div class="col-md-12">
                                <label>Asset:</label>
                                <select id="assetReservationSelect" name="asset_id" class="form-control" required>
                                    <option value="">Choose an asset</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-12">
                                <label>Assign to: <span class="red">*</span></label>
                                <select id="moveOtherAssetEmployeeSelect" name="employee_id" class="form-control">
                                        
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-8">
                                <label>Start date: <span class="red">*</span></label>
                                <div class="input-group date-picker">
                                    <input type="text" name="start_date" class="form-control"  placeholder="Choose start date" required />
                                    <span class="input-group-addon btn bg-primary">
                                        <span class="fa fa-calendar text-white"></span>
                                    </span>                    
                                </div>
                            </div>
                            <div class="col-md-4">
                                <label>Start time: <span class="red">*</span></label>
                                <div class="input-group time-picker">
                                    <input type="text" name="start_time" class="form-control"  placeholder="Choose start time" required />
                                    <span class="input-group-addon btn bg-primary">
                                        <span class="fa fa-clock text-white"></span>
                                    </span>                    
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-8">
                                <label>End date: <span class="red">*</span></label>
                                <div class="input-group date-picker">
                                    <input type="text" name="end_date" class="form-control"  placeholder="Choose end date" required />
                                    <span class="input-group-addon btn bg-primary">
                                        <span class="fa fa-calendar text-white"></span>
                                    </span>                    
                                </div>
                            </div>
                            <div class="col-md-4">
                                <label>End time: <span class="red">*</span></label>
                                <div class="input-group time-picker">
                                    <input type="text" name="end_time" class="form-control"  placeholder="Choose end time" required />
                                    <span class="input-group-addon btn bg-primary">
                                        <span class="fa fa-clock text-white"></span>
                                    </span>                    
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-12">
                                <label>Purpose of reservation:</label>
                                <textarea class="form-control" name="reservation_description" placeholder="Enter reservation purpose or description" required></textarea>
                            </div>
                        </div>
                        <button class="btn material primary m-t-15">Reserve asset</button>
                        <button type="button" class="btn material m-t-15 danger pull-right" onClick="hideAssignOtherAssetPopup()">Cancel</button>
                    </form>   
                </div>
            </div>
        </div>
        <div class="theme-panel">
                <div class="theme-panel-content">
                    <h5 class="m-t-0">Theme settings</h5>
                    <ul class="theme-list clearfix">
                        <li class=""><a href="javascript:;" class="bg-green" data-theme="default" data-theme-file="<?= CSS_URL . "theme/default.css" ?>" data-click="theme-selector" data-toggle="tooltip" data-trigger="hover" data-container="body" data-title="Default" data-original-title="" title="">&nbsp;</a></li>
                        <li class="active"><a href="javascript:;" class="bg-red" data-theme="red" data-theme-file="<?= CSS_URL . "theme/red.css" ?>" data-click="theme-selector" data-toggle="tooltip" data-trigger="hover" data-container="body" data-title="Red" data-original-title="" title="">&nbsp;</a></li>
                        <li><a href="javascript:;" class="bg-blue" data-theme="blue" data-theme-file="<?= CSS_URL . "theme/blue.css" ?>" data-click="theme-selector" data-toggle="tooltip" data-trigger="hover" data-container="body" data-title="Blue" data-original-title="" title="">&nbsp;</a></li>
                        <li class=""><a href="javascript:;" class="bg-purple" data-theme="purple" data-theme-file="<?= CSS_URL . "theme/purple.css" ?>" data-click="theme-selector" data-toggle="tooltip" data-trigger="hover" data-container="body" data-title="Purple" data-original-title="" title="">&nbsp;</a></li>
                        <li class=""><a href="javascript:;" class="bg-orange" data-theme="orange" data-theme-file="<?= CSS_URL . "theme/orange.css" ?>" data-click="theme-selector" data-toggle="tooltip" data-trigger="hover" data-container="body" data-title="Orange" data-original-title="" title="">&nbsp;</a></li>
                        <li class=""><a href="javascript:;" class="bg-black" data-theme="black" data-theme-file="<?= CSS_URL . "theme/black.css" ?>" data-click="theme-selector" data-toggle="tooltip" data-trigger="hover" data-container="body" data-title="Black" data-original-title="" title="">&nbsp;</a></li>
                    </ul>
                    <div class="divider"></div>
                    <div class="row m-t-10">
                        <div class="col-md-5 control-label double-line">Header style</div>
                        <div class="col-md-7">
                            <select name="header-styling" class="form-control form-control-sm">
                                <option value="1">Light</option>
                                <option value="2">Dark</option>
                            </select>
                        </div>
                    </div>
                    <div class="row m-t-10">
                        <div class="col-md-5 control-label double-line">Sidebar style</div>
                        <div class="col-md-7">
                            <select name="sidebar-styling" class="form-control form-control-sm">
                                <option value="1">No grid</option>
                                <option value="2">Grid</option>
                            </select>
                        </div>
                    </div>
                    <div class="row m-t-10">
                        <div class="col-md-12">
                            <a href="javascript:;" class="btn btn-white btn-block btn-sm" data-click="theme-panel-expand">Close</a>
                        </div>
                    </div>
                </div>
        </div>
    </div>
    <!-- end #content -->
    
    
    
    <!-- begin scroll to top btn -->
    <a href="javascript:;" class="btn btn-icon btn-circle btn-primary btn-scroll-to-top fade" data-click="scroll-top"><i class="fa fa-angle-up"></i></a>
    <!-- end scroll to top btn -->
    </div>
	<!-- end page container -->
	
	<!-- ================== BEGIN BASE JS ================== -->
	<script src="<?= ASSETS_URL . "jquery/jquery-1.9.1.min.js" ?>"></script>
	<script src="<?= ASSETS_URL . "jquery/jquery-migrate-1.1.0.min.js" ?>"></script>
	<script src="<?= ASSETS_URL . "jquery-ui/ui/minified/jquery-ui.min.js" ?>"></script>
	<script src="<?= ASSETS_URL . "bootstrap/js/bootstrap.min.js" ?>"></script>
	<!--[if lt IE 9]>
		<script src="assets/crossbrowserjs/html5shiv.js"></script>
		<script src="assets/crossbrowserjs/respond.min.js"></script>
		<script src="assets/crossbrowserjs/excanvas.min.js"></script>
	<![endif]-->
	<script src="<?= ASSETS_URL . "slimscroll/jquery.slimscroll.min.js" ?>"></script>
	<script src="<?= JS_URL . "js.cookie.js" ?>"></script>
	<!-- ================== END BASE JS ================== -->
	
	<!-- ================== BEGIN PAGE LEVEL JS ================== -->
	<script src="<?= JS_URL . "apps.min.js" ?>"></script>
	<script src="<?= JS_URL . "timedisplay.js" ?>"></script>
	<script src="<?= JS_URL . "inactivity.js" ?>"></script>
    <script src="<?= ASSETS_URL . "jstree/dist/jstree.min.js" ?>"></script>
    <link href="<?= ASSETS_URL . "DataTables/media/css/dataTables.bootstrap.min.css" ?>" rel="stylesheet" />
	<link href="<?= ASSETS_URL . "DataTables/extensions/Responsive/css/responsive.bootstrap.min.css" ?>" rel="stylesheet" />
	<script src="<?= ASSETS_URL . "DataTables/media/js/jquery.dataTables.js" ?>"></script>
	<script src="<?= ASSETS_URL . "DataTables/media/js/dataTables.bootstrap.min.js" ?>"></script>
	<script src="<?= ASSETS_URL . "DataTables/extensions/Responsive/js/dataTables.responsive.min.js" ?>"></script>
	<script src="<?= ASSETS_URL . "DataTables/extensions/Buttons/js/dataTables.buttons.min.js" ?>"></script>
	<script src="<?= ASSETS_URL . "DataTables/extensions/Buttons/js/buttons.bootstrap.min.js" ?>"></script>
	<script src="<?= ASSETS_URL . "DataTables/extensions/Buttons/js/buttons.flash.min.js" ?>"></script>
	<script src="<?= ASSETS_URL . "DataTables/extensions/Buttons/js/jszip.min.js" ?>"></script>
	<script src="<?= ASSETS_URL . "DataTables/extensions/Buttons/js/pdfmake.min.js" ?>"></script>
	<script src="<?= ASSETS_URL . "DataTables/extensions/Buttons/js/vfs_fonts.min.js" ?>"></script>
	<script src="<?= ASSETS_URL . "DataTables/extensions/Buttons/js/buttons.html5.min.js" ?>"></script>
	<script src="<?= ASSETS_URL . "DataTables/extensions/Buttons/js/buttons.print.min.js" ?>"></script>
	<script src="<?= ASSETS_URL . "select2/dist/js/select2.full.min.js" ?>"></script>
	<script src="<?= ASSETS_URL . "fullcalendar/lib/moment.min.js" ?>"></script>
	<script src="<?= ASSETS_URL . "fullcalendar/fullcalendar.min.js" ?>"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/js/bootstrap-datetimepicker.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/css/bootstrap-datetimepicker.min.css" rel="stylesheet"/>
    <script src="<?= ASSETS_URL . "bootstrap-wizard/js/bwizard.js" ?>"></script>
    <script src="<?= ASSETS_URL . "scheduler/js/timelineScheduler.js" ?>"></script>
    <script src="<?= ASSETS_URL . "scheduler/js/timelineScheduler2.js" ?>"></script>
    <script src="<?= ASSETS_URL . "scheduler/js/timelineScheduler3.js" ?>"></script>
    <script src="<?= ASSETS_URL . "scheduler/js/timelineScheduler4.js" ?>"></script>
    
	<!-- ================== END PAGE LEVEL JS ================== -->
	
	<script>

	    var loggedEmployee = <?php echo json_encode($_SESSION["id"]); ?>;
	    var isAdmin = <?php echo json_encode($_SESSION["admin"]); ?>;
		var dateformat = <?php echo json_encode($_SESSION["dateformat"]); ?>;
		var timeformat = <?php echo json_encode($_SESSION["timeformat"]); ?>;
		
	    var vehicleArray = [];
	    var equipmentArray = [];
	    var placesArray = [];
	    var otherAssetsArray = [];
	    var employeeArray = [];
	    var dTable;
	    var vRTable;
	    var eTable;
	    var eRTable;
	    var pTable;
	    var pRTable;
	    var oTable;
	    var oRTable;
	    var tTable;
	    var placeMarker = null;
	    var map;
	    var firstPageLoad = true;
	    
	    
	    var green = "#00acac";
	    var red = "#ff5b57";
	    var blue = "#348fe2";
	    var orange = "#f59c1a";
	    
	    var vehicleDroppedFiles;
	    var equipmentDroppedFiles;
	    var placesDroppedFiles;
	    var assetDroppedFiles;
	    
	    var cScheduler;
	    var eScheduler;
	    var pScheduler;
	    var oScheduler;
	    
		$(document).ready(function() {
			getMenuStatistics(loggedEmployee);
			makeCalendar();
			getVehicles();
			getTripOrders();
			getEquipment();
			getPlaces();
			getOtherAssets();
			getEmployees();
			
			setInterval(makeCalendar, 30000);
			
			$("#vehicleWizard, #equipmentWizard, #placesWizard, #assetWizard").bwizard();
			$(".date-picker").datetimepicker({format: dateformat, "defaultDate": new Date(), allowInputToggle: true });
			$(".time-picker").datetimepicker({format: timeformat, stepping:5, "defaultDate": new Date(), allowInputToggle: true, widgetPositioning:{
                                horizontal: 'right',
                                vertical: 'auto'
                            }});
			$(".date-input").datetimepicker({format: dateformat});
			$("#vehicleOwnerSelect, #editVehicleOwnerSelect, #vehicleReservationSelect, #moveVehicleEmployeeSelect, #moveEquipmentEmployeeSelect, #movePlaceEmployeeSelect, #moveOtherAssetEmployeeSelect").select2({ width: "100%" });
			
			$('a[data-toggle="tab"]').on('shown.bs.tab', function (e) {
                $('#calendar').fullCalendar('render');
                cScheduler.Init();
                eScheduler.Init();
                pScheduler.Init();
                oScheduler.Init();
            });
            
            $('#addVehicleForm input[name=vehicle_type]').change(function() {
               if ($(this).val() == "Personal"){
                   $("#vehicleOwnerDIV").show();
                   $("#permanentReservation").addClass("hide");
               }else{
                   var isPermanent = $('#addVehicleForm input[name=permanent_reservation]').is(":checked");
                   if (!isPermanent){
                       $("#vehicleOwnerDIV").hide();
                       $("#vehicleOwnerSelect").val("").trigger("change");
                   }
                   $("#permanentReservation").removeClass("hide");
               }
            });
            
            $('#addVehicleForm input[name=permanent_reservation]').change(function() {
                var vehicleType = $("#addVehicleForm input[name=vehicle_type]:checked").val();
                if(this.checked && vehicleType == "Company") {
                    $("#vehicleOwnerDIV").show();
                    $("#vehicleOwnerSelect").val("").trigger("change");
                }else{
                    $("#vehicleOwnerDIV").hide();
                    $("#vehicleOwnerSelect").val("").trigger("change");
                }
            });
            
            $('#editVehicleForm input[name=vehicle_type]').change(function() {
               if ($(this).val() == "Personal"){
                   $("#editVehicleOwnerDIV").show();
                   $("#editPermanentReservation").addClass("hide");
               }else{
                   var isPermanent = $('#editVehicleForm input[name=permanent_reservation]').is(":checked");
                   if (!isPermanent){
                       $("#editVehicleOwnerDIV").hide();
                       $("#editVehicleOwnerSelect").val("").trigger("change");
                   }
                   $("#editPermanentReservation").removeClass("hide");
               }
            });
            
            $('#editVehicleForm input[name=permanent_reservation]').change(function() {
				console.log("changed");
                var vehicleType = $("#editVehicleForm input[name=vehicle_type]:checked").val();
                if(this.checked && vehicleType == "Company") {
                    $("#editVehicleOwnerDIV").show();
                    $("#editVehicleOwnerSelect").val("").trigger("change");
                }else{
                    $("#editVehicleOwnerDIV").hide();
                    $("#editVehicleOwnerSelect").val("").trigger("change");
                }
            });
			
			$('#assignVehicleForm').on('submit', function(e) { //use on if jQuery 1.7+
                e.preventDefault();
                $.ajax({
                    type: "POST",
                    url: "vehicles/reserve",
                    data: $("#assignVehicleForm").serialize(),
                    success: function(msg) {
                        if (msg == "") {
                            swal(
                                'Success!',
                                'Vehicle was successfully reserved.',
                                'success'
                            );
                            makeCalendar();
                            hideAssignVehiclePopup();
                        } else {
                            swal(
                                'Error!',
                                'The server encountered the following error: ' + msg,
                                'error'
                            );
                        }
                    }
                });
            });
            
            $('#assignEquipmentForm').on('submit', function(e) { //use on if jQuery 1.7+
                e.preventDefault();
                $.ajax({
                    type: "POST",
                    url: "equipment/reserve",
                    data: $("#assignEquipmentForm").serialize(),
                    success: function(msg) {
                        if (msg == "") {
                            swal(
                                'Success!',
                                'Equipment was successfully reserved.',
                                'success'
                            );
                            makeCalendar();
                            hideAssignEquipmentPopup();
                        } else {
                            swal(
                                'Error!',
                                'The server encountered the following error: ' + msg,
                                'error'
                            );
                        }
                    }
                });
            });
            
            $('#assignPlaceForm').on('submit', function(e) { //use on if jQuery 1.7+
                e.preventDefault();
                $.ajax({
                    type: "POST",
                    url: "places/reserve",
                    data: $("#assignPlaceForm").serialize(),
                    success: function(msg) {
                        if (msg == "") {
                            swal(
                                'Success!',
                                'Place was successfully reserved.',
                                'success'
                            );
                            makeCalendar();
                            hideAssignPlacePopup();
                        } else {
                            swal(
                                'Error!',
                                'The server encountered the following error: ' + msg,
                                'error'
                            );
                        }
                    }
                });
            });
            
            $('#assignOtherAssetForm').on('submit', function(e) { //use on if jQuery 1.7+
                e.preventDefault();
                $.ajax({
                    type: "POST",
                    url: "otherassets/reserve",
                    data: $("#assignOtherAssetForm").serialize(),
                    success: function(msg) {
                        if (msg == "") {
                            swal(
                                'Success!',
                                'Asset was successfully reserved.',
                                'success'
                            );
                            makeCalendar();
                            hideAssignOtherAssetPopup();
                        } else {
                            swal(
                                'Error!',
                                'The server encountered the following error: ' + msg,
                                'error'
                            );
                        }
                    }
                });
            });
			
			$('#addVehicleForm').on('submit', function(e) { //use on if jQuery 1.7+
                e.preventDefault();
                $.ajax({
                    type: "POST",
                    url: "vehicles/add",
                    data: $("#addVehicleForm").serialize(),
                    success: function(msg) {
                        if (msg == "") {
                            swal(
                                'Success!',
                                'Vehicle was successfully added.',
                                'success'
                            );
                            getVehicles();
                            hideNewVehiclePopup();
                        } else {
                            swal(
                                'Error!',
                                'The server encountered the following error: ' + msg,
                                'error'
                            );
                        }
                    }
                });
            });
            
            $('#editVehicleForm').on('submit', function(e) { //use on if jQuery 1.7+
                e.preventDefault();
                $.ajax({
                    type: "POST",
                    url: "vehicles/edit",
                    data: $("#editVehicleForm").serialize(),
                    success: function(msg) {
                        if (msg == "") {
                            swal(
                                'Success!',
                                'Vehicle was successfully edited.',
                                'success'
                            );
                            getVehicles();
                            hideEditVehiclePopup();
                        } else {
                            swal(
                                'Error!',
                                'The server encountered the following error: ' + msg,
                                'error'
                            );
                        }
                    }
                });
            });

		
		$('#addEquipmentForm').on('submit', function(e) { //use on if jQuery 1.7+
                e.preventDefault();
                $.ajax({
                    type: "POST",
                    url: "equipment/add",
                    data: $("#addEquipmentForm").serialize(),
                    success: function(msg) {
                        if (msg == "") {
                            swal(
                                'Success!',
                                'Equipment was successfully added.',
                                'success'
                            );
                            getEquipment();
                            hideNewEquipmentPopup();
                        } else {
                            swal(
                                'Error!',
                                'The server encountered the following error: ' + msg,
                                'error'
                            );
                        }
                    }
                });
            });
            
            $('#editEquipmentForm').on('submit', function(e) { //use on if jQuery 1.7+
                e.preventDefault();
                $.ajax({
                    type: "POST",
                    url: "equipment/edit",
                    data: $("#editEquipmentForm").serialize(),
                    success: function(msg) {
                        if (msg == "") {
                            swal(
                                'Success!',
                                'Equipment was successfully edited.',
                                'success'
                            );
                            getEquipment();
                            hideEditEquipmentPopup();
                        } else {
                            swal(
                                'Error!',
                                'The server encountered the following error: ' + msg,
                                'error'
                            );
                        }
                    }
                });
            });
		
		$('#addPlaceForm').on('submit', function(e) { //use on if jQuery 1.7+
                e.preventDefault();
                $.ajax({
                    type: "POST",
                    url: "places/add",
                    data: $("#addPlaceForm").serialize(),
                    success: function(msg) {
                        if (msg == "") {
                            swal(
                                'Success!',
                                'Place was successfully added.',
                                'success'
                            );
                            getPlaces();
                            hideNewPlacePopup();
                        } else {
                            swal(
                                'Error!',
                                'The server encountered the following error: ' + msg,
                                'error'
                            );
                        }
                    }
                });
            });
            
        $('#editPlaceForm').on('submit', function(e) { //use on if jQuery 1.7+
                e.preventDefault();
                $.ajax({
                    type: "POST",
                    url: "places/edit",
                    data: $("#editPlaceForm").serialize(),
                    success: function(msg) {
                        if (msg == "") {
                            swal(
                                'Success!',
                                'Place was successfully edited.',
                                'success'
                            );
                            getPlaces();
                            hideEditPlacePopup();
                        } else {
                            swal(
                                'Error!',
                                'The server encountered the following error: ' + msg,
                                'error'
                            );
                        }
                    }
                });
        });
		
		
		$('#addOtherAssetForm').on('submit', function(e) { //use on if jQuery 1.7+
                e.preventDefault();
                $.ajax({
                    type: "POST",
                    url: "otherassets/add",
                    data: $("#addOtherAssetForm").serialize(),
                    success: function(msg) {
                        if (msg == "") {
                            swal(
                                'Success!',
                                'Asset was successfully added.',
                                'success'
                            );
                            getOtherAssets();
                            hideNewOtherAssetPopup();
                        } else {
                            swal(
                                'Error!',
                                'The server encountered the following error: ' + msg,
                                'error'
                            );
                        }
                    }
                });
            });
            
            $('#editOtherAssetForm').on('submit', function(e) { //use on if jQuery 1.7+
                e.preventDefault();
                $.ajax({
                    type: "POST",
                    url: "otherassets/edit",
                    data: $("#editOtherAssetForm").serialize(),
                    success: function(msg) {
                        if (msg == "") {
                            swal(
                                'Success!',
                                'Asset was successfully edited.',
                                'success'
                            );
                            getPlaces();
                            hideEditOtherAssetPopup();
                        } else {
                            swal(
                                'Error!',
                                'The server encountered the following error: ' + msg,
                                'error'
                            );
                        }
                    }
                });
            });
            
            $('#vehicleImportCSVForm').on('submit', function(e) { //use on if jQuery 1.7+
                e.preventDefault();
                var formdata = new FormData(this);
                if (vehicleDroppedFiles){
                    $.each(vehicleDroppedFiles, function(i, file){
						formdata.append("csv", file);
					});
                }
                $.ajax({
                    url: "csv/import",
                    type: "POST",
                    data: formdata,
                    mimeTypes:"multipart/form-data",
                    contentType: false,
                    cache: false,
                    processData: false,
                    dataType: "json",
                    success: function(response){
                        var columns = response.columns;
                        var rows = response.rows;
                        var tableContent = "<thead>";
                        for (var i = 0; i < columns.length; i++){
                            $(".vehicle-import-select").append($('<option>', {
                                value: i,
                                text: columns[i]
                            }));
                            tableContent += "<th>" + columns[i] + "</th>";
                        }
                        tableContent += "</thead><tbody><tr>";
                        var nrOfColumns = columns.length - 1;
                        var count = 0;
                        for (var i = 0; i < rows.length; i++){
                            if (i > 0 && count == nrOfColumns){
                                tableContent += "<td>" + rows[i] + "</td>";
                                tableContent += "</tr><tr>";
                                count = 0;
                                continue;
                            }
                            tableContent += "<td>" + rows[i] + "</td>";
                            count++;
                        }
                        tableContent += "</tbody>";
                        $("#vehicleExampleDataTable").html(tableContent);
                        $("#vehicleWizard").bwizard("next");
                    }
                });
            });
            
            $('#equipmentImportCSVForm').on('submit', function(e) { //use on if jQuery 1.7+
                e.preventDefault();
                var formdata = new FormData(this);
                if (equipmentDroppedFiles){
                    $.each(equipmentDroppedFiles, function(i, file){
						formdata.append("csv", file);
					});
                }
                $.ajax({
                    url: "csv/import",
                    type: "POST",
                    data: formdata,
                    mimeTypes:"multipart/form-data",
                    contentType: false,
                    cache: false,
                    processData: false,
                    dataType: "json",
                    success: function(response){
                        var columns = response.columns;
                        var rows = response.rows;
                        var tableContent = "<thead>";
                        for (var i = 0; i < columns.length; i++){
                            $(".equipment-import-select").append($('<option>', {
                                value: i,
                                text: columns[i]
                            }));
                            tableContent += "<th>" + columns[i] + "</th>";
                        }
                        tableContent += "</thead><tbody><tr>";
                        var nrOfColumns = columns.length - 1;
                        var count = 0;
                        for (var i = 0; i < rows.length; i++){
                            if (i > 0 && count == nrOfColumns){
                                tableContent += "<td>" + rows[i] + "</td>";
                                tableContent += "</tr><tr>";
                                count = 0;
                                continue;
                            }
                            tableContent += "<td>" + rows[i] + "</td>";
                            count++;
                        }
                        tableContent += "</tbody>";
                        $("#equipmentExampleDataTable").html(tableContent);
                        $("#equipmentWizard").bwizard("next");
                    }
                });
            });
            
            $('#placesImportCSVForm').on('submit', function(e) { //use on if jQuery 1.7+
                e.preventDefault();
                var formdata = new FormData(this);
                if (placesDroppedFiles){
                    $.each(placesDroppedFiles, function(i, file){
						formdata.append("csv", file);
					});
                }
                $.ajax({
                    url: "csv/import",
                    type: "POST",
                    data: formdata,
                    mimeTypes:"multipart/form-data",
                    contentType: false,
                    cache: false,
                    processData: false,
                    dataType: "json",
                    success: function(response){
                        var columns = response.columns;
                        var rows = response.rows;
                        var tableContent = "<thead>";
                        for (var i = 0; i < columns.length; i++){
                            $(".places-import-select").append($('<option>', {
                                value: i,
                                text: columns[i]
                            }));
                            tableContent += "<th>" + columns[i] + "</th>";
                        }
                        tableContent += "</thead><tbody><tr>";
                        var nrOfColumns = columns.length - 1;
                        var count = 0;
                        for (var i = 0; i < rows.length; i++){
                            if (i > 0 && count == nrOfColumns){
                                tableContent += "<td>" + rows[i] + "</td>";
                                tableContent += "</tr><tr>";
                                count = 0;
                                continue;
                            }
                            tableContent += "<td>" + rows[i] + "</td>";
                            count++;
                        }
                        tableContent += "</tbody>";
                        $("#placesExampleDataTable").html(tableContent);
                        $("#placesWizard").bwizard("next");
                    }
                });
            });
            
            $('#assetImportCSVForm').on('submit', function(e) { //use on if jQuery 1.7+
                e.preventDefault();
                var formdata = new FormData(this);
                if (assetDroppedFiles){
                    $.each(assetDroppedFiles, function(i, file){
						formdata.append("csv", file);
					});
                }
                $.ajax({
                    url: "csv/import",
                    type: "POST",
                    data: formdata,
                    mimeTypes:"multipart/form-data",
                    contentType: false,
                    cache: false,
                    processData: false,
                    dataType: "json",
                    success: function(response){
                        var columns = response.columns;
                        var rows = response.rows;
                        var tableContent = "<thead>";
                        for (var i = 0; i < columns.length; i++){
                            $(".asset-import-select").append($('<option>', {
                                value: i,
                                text: columns[i]
                            }));
                            tableContent += "<th>" + columns[i] + "</th>";
                        }
                        tableContent += "</thead><tbody><tr>";
                        var nrOfColumns = columns.length - 1;
                        var count = 0;
                        for (var i = 0; i < rows.length; i++){
                            if (i > 0 && count == nrOfColumns){
                                tableContent += "<td>" + rows[i] + "</td>";
                                tableContent += "</tr><tr>";
                                count = 0;
                                continue;
                            }
                            tableContent += "<td>" + rows[i] + "</td>";
                            count++;
                        }
                        tableContent += "</tbody>";
                        $("#assetExampleDataTable").html(tableContent);
                        $("#assetWizard").bwizard("next");
                    }
                });
            });
            
            $('#vehicleCsvFieldsForm').on('submit', function(e) { //use on if jQuery 1.7+
                e.preventDefault();
                $.ajax({
                    type: "POST",
                    url: "vehicles/import",
                    data: $(this).serialize(),
                    success: function(msg) {
                        if (msg == "") {
                            $("#vehicleWizard").bwizard("next");
                        } else {
                            swal(
                                'Error!',
                                'The server encountered the following error: ' + msg,
                                'error'
                            );
                        }
                    }
                });
            });
            
            $('#equipmentCsvFieldsForm').on('submit', function(e) { //use on if jQuery 1.7+
                e.preventDefault();
                $.ajax({
                    type: "POST",
                    url: "equipment/import",
                    data: $(this).serialize(),
                    success: function(msg) {
                        if (msg == "") {
                            $("#equipmentWizard").bwizard("next");
                        } else {
                            swal(
                                'Error!',
                                'The server encountered the following error: ' + msg,
                                'error'
                            );
                        }
                    }
                });
            });
            
            $('#placesCsvFieldsForm').on('submit', function(e) { //use on if jQuery 1.7+
                e.preventDefault();
                $.ajax({
                    type: "POST",
                    url: "places/import",
                    data: $(this).serialize(),
                    success: function(msg) {
                        if (msg == "") {
                            $("#placesWizard").bwizard("next");
                        } else {
                            swal(
                                'Error!',
                                'The server encountered the following error: ' + msg,
                                'error'
                            );
                        }
                    }
                });
            });
            
            $('#assetCsvFieldsForm').on('submit', function(e) { //use on if jQuery 1.7+
                e.preventDefault();
                $.ajax({
                    type: "POST",
                    url: "otherassets/import",
                    data: $(this).serialize(),
                    success: function(msg) {
                        if (msg == "") {
                            $("#assetWizard").bwizard("next");
                        } else {
                            swal(
                                'Error!',
                                'The server encountered the following error: ' + msg,
                                'error'
                            );
                        }
                    }
                });
            });
            
            $('#vehicleImportCSVForm, #equipmentImportCsvForm, #placesImportCsvForm, #assetImportCsvForm').on('drag dragstart dragend dragover dragenter dragleave', function(e) {
                e.preventDefault();
                e.stopPropagation();
            });
            
            $('#vehicleImportCSVForm').on('drop', function(e) {
                e.preventDefault();
                e.stopPropagation();
                vehicleDroppedFiles = e.originalEvent.dataTransfer.files;
                $("#vehicleFile").attr("required", false);
                $("#vehicleLabel").html(droppedFiles[0].name)
            });
            
            $("#vehicleFile").on('change',function(){
                $("#vehicleLabel").html(this.files[0].name);
            });
            
            $('#equipmentImportCSVForm').on('drop', function(e) {
                e.preventDefault();
                e.stopPropagation();
                equipmentDroppedFiles = e.originalEvent.dataTransfer.files;
                $("#equipmentFile").attr("required", false);
                $("#equipmentLabel").html(droppedFiles[0].name)
            });
            
            $("#equipmentFile").on('change',function(){
                $("#equipmentLabel").html(this.files[0].name);
            });
            
            $('#placesImportCSVForm').on('drop', function(e) {
                e.preventDefault();
                e.stopPropagation();
                placesDroppedFiles = e.originalEvent.dataTransfer.files;
                $("#placesFile").attr("required", false);
                $("#placesLabel").html(droppedFiles[0].name)
            });
            
            $("#placesFile").on('change',function(){
                $("#placesLabel").html(this.files[0].name);
            });
            
            $('#assetImportCSVForm').on('drop', function(e) {
                e.preventDefault();
                e.stopPropagation();
                assetDroppedFiles = e.originalEvent.dataTransfer.files;
                $("#assetFile").attr("required", false);
                $("#assetLabel").html(droppedFiles[0].name)
            });
            
            $("#assetFile").on('change',function(){
                $("#assetLabel").html(this.files[0].name);
            });
            
		});
		
		function initMap(){
		    var myOptions = {
                zoom: parseInt(14),
                center: new google.maps.LatLng(46.051261, 14.504626),
                mapTypeId: google.maps.MapTypeId.ROADMAP
            };
            map = new google.maps.Map(document.getElementById('map'), myOptions);
            google.maps.event.trigger(map, 'resize');
            
			var equipmentSearchBox = new google.maps.places.SearchBox(document.getElementById('equipmentAddressInput'));
            var editEquipmentSearchBox = new google.maps.places.SearchBox(document.getElementById('editEquipmentAddressInput'));
            var placeSearchBox = new google.maps.places.SearchBox(document.getElementById('newPlaceAddressInput'));
            var editPlaceSearchBox = new google.maps.places.SearchBox(document.getElementById('editPlaceAddressInput'));
			var assetSearchBox = new google.maps.places.SearchBox(document.getElementById('otherAssetAddressInput'));
            var editAssetSearchBox = new google.maps.places.SearchBox(document.getElementById('editOtherAssetAddressInput'));
			
			google.maps.event.addListener(equipmentSearchBox, 'places_changed', function() {
                var places = equipmentSearchBox.getPlaces();
                var i, place;
                for (i = 0; place = places[i]; i++) {
                    (function(place) {
                        var location = place.geometry.location;
                        $("#hiddenEquipmentLatitudeInput").val(location.lat());
                        $("#hiddenEquipmentLongitudeInput").val(location.lng());
                    }(place));
                }
            });
            
            google.maps.event.addListener(editEquipmentSearchBox, 'places_changed', function() {
                var places = editEquipmentSearchBox.getPlaces();
                var i, place;
                for (i = 0; place = places[i]; i++) {
                    (function(place) {
                        var location = place.geometry.location;
                        $("#hiddenEditEquipmentLatitudeInput").val(location.lat());
                        $("#hiddenEditEquipmentLongitudeInput").val(location.lng());
                    }(place));
                }
            });
                    
            google.maps.event.addListener(placeSearchBox, 'places_changed', function() {
                var places = placeSearchBox.getPlaces();
                var i, place;
                for (i = 0; place = places[i]; i++) {
                    (function(place) {
                        var location = place.geometry.location;
                        $("#hiddenPlaceLatitudeInput").val(location.lat());
                        $("#hiddenPlaceLongitudeInput").val(location.lng());
                    }(place));
                }
            });
            
            google.maps.event.addListener(editPlaceSearchBox, 'places_changed', function() {
                var places = editPlaceSearchBox.getPlaces();
                var i, place;
                for (i = 0; place = places[i]; i++) {
                    (function(place) {
                        var location = place.geometry.location;
                        $("#hiddenEditPlaceLatitudeInput").val(location.lat());
                        $("#hiddenEditPlaceLongitudeInput").val(location.lng());
                    }(place));
                }
            });
			
			google.maps.event.addListener(assetSearchBox, 'places_changed', function() {
                var places = assetSearchBox.getPlaces();
                var i, place;
                for (i = 0; place = places[i]; i++) {
                    (function(place) {
                        var location = place.geometry.location;
                        $("#hiddenOtherLatitudeInput").val(location.lat());
                        $("#hiddenOtherLongitudeInput").val(location.lng());
                    }(place));
                }
            });
            
            google.maps.event.addListener(editAssetSearchBox, 'places_changed', function() {
                var places = editAssetSearchBox.getPlaces();
                var i, place;
                for (i = 0; place = places[i]; i++) {
                    (function(place) {
                        var location = place.geometry.location;
                        $("#hiddenEditOtherLatitudeInput").val(location.lat());
                        $("#hiddenEditOtherLongitudeInput").val(location.lng());
                    }(place));
                }
            });
		}
		
		function makeCalendar(){
		     $.ajax({
                    type: "POST",
                    url: "assets/all",
                    data: null,
                    dataType: "json",
                    success: function(assets) {
            		    var assetList = [];
            		    
            		    var vehicles = assets.vehicles;
            		    var equipment = assets.equipment;
            		    var places = assets.places;
            		    var otherassets = assets.otherassets;
            		    var vReservations = assets.vehicle_reservations;
            		    var eReservations = assets.equipment_reservations;
            		    var pReservations = assets.place_reservations;
            		    var oReservations = assets.other_reservations;
            		    
            		    var vSections = [];
            		    var vItems = [];
            		    
            		    var eSections = [];
            		    var eItems = [];
            		    
            		    var pSections = [];
            		    var pItems = [];
            		    
            		    var oSections = [];
            		    var oItems = [];
						
						var count = 0;
            		   
            		    
            		    for (var i = 0; i < vReservations.length; i++){
            		        var reservation = vReservations[i];
            		        
            		        var color = red;
            		        var reservationColor = "bg-success";
                            if (reservation.reservation_status == 0){
                                reservationColor = "bg-danger";
                            }
                            assetList.push({id: count, eid: reservation.vehicle_id, type: 1, employee_id: reservation.employee_id, display: true, title: reservation.vehicle_brand + " " + reservation.vehicle_model + " - " + reservation.vehicle_registration, start: moment(reservation.date_from + " " + reservation.time_from), end: moment(reservation.date_to + " " + reservation.time_to), color: color});
                            vItems.push({id: i, name: reservation.employee_name + " " + reservation.employee_surname, sectionID: reservation.vehicle_id, start: moment(reservation.date_from + " " + reservation.time_from), end: moment(reservation.date_to + " " + reservation.time_to), classes: reservationColor});
							count++;
						}
            		    
            		    for (var i = 0; i < vehicles.length; i++){
            		        var vehicle = vehicles[i];
            		        if (vehicle.vehicle_type == "Company"){
            		            vSections.push({ id: vehicle.vehicle_id, name: vehicle.vehicle_brand + " " + vehicle.vehicle_model });
            		        }
            		    }
            		    
            		    drawVehicleScheduler(vSections, vItems);
            		    
            		    makeVehicleReservationsTable(vReservations);
            		    
            		    for (var i = 0; i < eReservations.length; i++){
            		        var reservation = eReservations[i];
            		        
            		        var color = green;
            		        var reservationColor = "bg-success";
                            if (reservation.reservation_status == 0){
                                reservationColor = "bg-danger";
                            }
                            assetList.push({id: count, eid: reservation.equipment_id, type: 2, employee_id: reservation.employee_id, display: true, title: reservation.equipment_name, start: moment(reservation.date_from + " " + reservation.time_from), end: moment(reservation.date_to + " " + reservation.time_to), color: color});
                            eItems.push({id: i, name: reservation.employee_name + " " + reservation.employee_surname, sectionID: reservation.equipment_id, start: moment(reservation.date_from + " " + reservation.time_from), end: moment(reservation.date_to + " " + reservation.time_to), classes: reservationColor});
							count++;
						}
            		    
            		    for (var i = 0; i < equipment.length; i++){
            		        var eq = equipment[i];
            		        eSections.push({ id: eq.equipment_id, name: eq.equipment_name });
            		    }
            		    
            		    drawEquipmentScheduler(eSections, eItems);
            		    
            		    makeEquipmentReservationsTable(eReservations);
            		    
            		    for (var i = 0; i < pReservations.length; i++){
            		        var reservation = pReservations[i];
            		        var color = blue;
            		        var reservationColor = "bg-success";
                            if (reservation.reservation_status == 0){
                                reservationColor = "bg-danger";
                            }
                            assetList.push({id: count, eid: reservation.place_id, type: 3, employee_id: reservation.employee_id, display: true, title: reservation.place_name, start: moment(reservation.date_from + " " + reservation.time_from), end: moment(reservation.date_to + " " + reservation.time_to), color: color});
                            pItems.push({id: i, name: reservation.employee_name + " " + reservation.employee_surname, sectionID: reservation.place_id, start: moment(reservation.date_from + " " + reservation.time_from), end: moment(reservation.date_to + " " + reservation.time_to), classes: reservationColor});
							count++;
						}
            		    
            		    for (var i = 0; i < places.length; i++){
            		        var place = places[i];
            		        pSections.push({ id: place.place_id, name: place.place_name });
            		    }
            		    
            		    drawPlaceScheduler(pSections, pItems);
            		    
            		    makePlaceReservationsTable(pReservations);
            		    
            		    for (var i = 0; i < oReservations.length; i++){
            		        var reservation = oReservations[i];
            		        var reservationColor = "bg-success";
            		        var color = orange;
                            if (reservation.reservation_status == 0){
                                reservationColor = "bg-danger";
                            }
            		        assetList.push({id: count, eid: reservation.asset_id, type: 4, employee_id: reservation.employee_id, display: true, title: reservation.asset_name, start: moment(reservation.date_from + " " + reservation.time_from), end: moment(reservation.date_to + " " + reservation.time_to), color: color});
                            oItems.push({id: i, name: reservation.employee_name + " " + reservation.employee_surname, sectionID: reservation.asset_id, start: moment(reservation.date_from + " " + reservation.time_from), end: moment(reservation.date_to + " " + reservation.time_to), classes: reservationColor});
            		        count++;
            		    }
            		    
            		    for (var i = 0; i < otherassets.length; i++){
            		        var asset = otherassets[i];
            		        oSections.push({ id: asset.asset_id, name: asset.asset_name });
            		    }
            		    
            		    drawOtherAssetScheduler(oSections, oItems);
            		    
            		    makeOtherReservationsTable(oReservations);
            		    
            		    var lastView = $("#calendar").fullCalendar('getView');
                        if (lastView.name == null){
                            lastView.name = "month";
                        }
                        $('#calendar').fullCalendar('destroy');
                        $('#calendar').fullCalendar({
                                    header: {
                                        left: 'month,agendaWeek,agendaDay, listWeek, allBtn,freeBtn,reservedBtn',
                                        center: 'title',
                                        right: 'prev,today,next '
                                    },
                                    height: 900,
                                    slotDuration: '00:30:00',
                                    snapDuration: '00:30:00',
                                    defaultView: lastView.name,
									navLinks: true,
                                    nowIndicator: true,
									selectable: true,
									agendaEventMinHeight: 75,
									eventDurationEditable: false,
                                    eventClick: function(event, element) {
										var type = event.type;
										if (type == 1){
											showEditVehiclePopupID(event.eid);
										}else if (type == 2){
											showEditEquipmentPopupID(event.eid);
										}else if (type == 3){
											showEditPlacePopupID(event.eid);
										}else{
											showEditOtherAssetPopupID(event.eid);
										}
                                        currentAsset = event.eid;
                                    },
                                    eventRender: function(event, element) {
                                        if(!event.display) {
                                            $(element).css("display", "none");
                                        } else {
                                            $(element).css("display", "block");
                                        }
                                    },
                                    dayOfMonthFormat: 'ddd ' + dateformat,
									slotLabelFormat: timeformat,
									timeFormat: timeformat,
                                    events: assetList
                        });
                        
                        if (firstPageLoad){
                            App.init();
                            firstPageLoad = false;
                        }
                        
                    }
		     });
		}
		
		function drawVehicleScheduler(sections, items) {
            $(".vehicleSchedulerContainer").html("");
            var today = moment().startOf('day');
            cScheduler = {
                Periods: [{
                        Name: 'Today',
                        Label: 'Today',
                        TimeframePeriod: (60 * 1),
                        TimeframeOverall: (60 * 24 * 1),
                        TimeframeHeaders: [
                            'Do MMMM YYYY',
                            'HH'
                        ]
                    },
                    {
                        Name: '3 days',
                        Label: '3 days',
                        TimeframePeriod: (60 * 4),
                        TimeframeOverall: (60 * 24 * 3),
                        TimeframeHeaders: [
                            'Do MMM',
                            'HH'
                        ],
                        Classes: 'period-3day'
                    },
                    {
                        Name: '1 week',
                        Label: '1 week',
                        TimeframePeriod: (60 * 24),
                        TimeframeOverall: (60 * 24 * 7),
                        TimeframeHeaders: [
                            'MMMM YYYY',
                            'dddd Do'
                        ]
                    }
                ],
                Items: items,
                Sections: sections,
                Init: function() {
                    TimeScheduler.Options.GetSections = cScheduler.GetSections;
                    TimeScheduler.Options.GetSchedule = cScheduler.GetSchedule;
                    TimeScheduler.Options.Start = today;
                    TimeScheduler.Options.Periods = cScheduler.Periods;
                    TimeScheduler.Options.SelectedPeriod = '3 days';
                    TimeScheduler.Options.Element = $('.vehicleSchedulerContainer');
                    TimeScheduler.Options.AllowDragging = false;
                    TimeScheduler.Options.AllowResizing = false;
                    TimeScheduler.Options.Events.ItemClicked = cScheduler.Item_Clicked;
                    TimeScheduler.Options.Events.ItemDropped = cScheduler.Item_Dragged;
                    TimeScheduler.Options.Events.ItemResized = cScheduler.Item_Resized;
                    TimeScheduler.Options.Events.ItemMovement = cScheduler.Item_Movement;
                    TimeScheduler.Options.Events.ItemMovementStart = cScheduler.Item_MovementStart;
                    TimeScheduler.Options.Events.ItemMovementEnd = cScheduler.Item_MovementEnd;
                    TimeScheduler.Options.Text.NextButton = '&nbsp;';
                    TimeScheduler.Options.Text.PrevButton = '&nbsp;';
                    TimeScheduler.Options.MaxHeight = 100;
                    TimeScheduler.Init();
                },
                GetSections: function(callback) {
                    callback(cScheduler.Sections);
                },
                GetSchedule: function(callback, start, end) {
                    callback(cScheduler.Items);
                },
                Item_Clicked: function(item) {
                    console.log(item);
                },
                Item_Dragged: function(item, sectionID, start, end) {
                    var foundItem;
                    for (var i = 0; i < cScheduler.Items.length; i++) {
                        foundItem = cScheduler.Items[i];
                        if (foundItem.id === item.id) {
                            foundItem.sectionID = sectionID;
                            foundItem.start = start;
                            foundItem.end = end;
                            cScheduler.Items[i] = foundItem;
                        }
                    }
                    TimeScheduler.Init();
                },
                Item_Resized: function(item, start, end) {
                    var foundItem;
                    for (var i = 0; i < cScheduler.Items.length; i++) {
                        foundItem = cScheduler.Items[i];
                        if (foundItem.id === item.id) {
                            foundItem.start = start;
                            foundItem.end = end;
                            cScheduler.Items[i] = foundItem;
                        }
                    }
                    TimeScheduler.Init();
                },
                Item_Movement: function(item, start, end) {
                    var html;
                    html = '<div>';
                    html += '   <div>';
                    html += '       Start: ' + start.format('Do MMM YYYY HH:mm');
                    html += '   </div>';
                    html += '   <div>';
                    html += '       End: ' + end.format('Do MMM YYYY HH:mm');
                    html += '   </div>';
                    html += '</div>';
                    $('.realtime-info').empty().append(html);
                },
                Item_MovementStart: function() {
                    $('.realtime-info').show();
                },
                Item_MovementEnd: function() {
                    $('.realtime-info').hide();
                }
            };
            cScheduler.Init();
        }
        
        function makeVehicleReservationsTable(reservations){
                    if (vRTable != null){
                        vRTable.destroy();
                    }
                    vRTable = $('#vehicleReservationsTable').DataTable({
                        "aaData": reservations,
                        "columns": [
                            { "data": "vehicle_brand" },
                            { "data": "employee_name" },
                            { "data": "date_from" },
                            { "data": "date_to" },
                            { "data": "reservation_status" },
							{ "defaultContent" : '' }
                        ],
                        "columnDefs": [
                            {
                                // The `data` parameter refers to the data for the cell (defined by the
                                // `data` option, which defaults to the column being worked with, in
                                // this case `data: 0`.
                                "render": function ( data, type, row ) {
                                    return row.employee_name + " " + row.employee_surname;
                                },
                                "targets": 1
                            },
                            {
                                // The `data` parameter refers to the data for the cell (defined by the
                                // `data` option, which defaults to the column being worked with, in
                                // this case `data: 0`.
                                "render": function ( data, type, row ) {
                                    return row.vehicle_model + " " + row.vehicle_brand;
                                },
                                "targets": 0
                            },
                            {
                                // The `data` parameter refers to the data for the cell (defined by the
                                // `data` option, which defaults to the column being worked with, in
                                // this case `data: 0`.
                                "render": function ( data, type, row ) {
                                    return moment(row.date_from + " " + row.time_from).format(dateformat + ", " + timeformat);
                                },
                                "targets": 2
                            },
                            {
                                // The `data` parameter refers to the data for the cell (defined by the
                                // `data` option, which defaults to the column being worked with, in
                                // this case `data: 0`.
                                "render": function ( data, type, row ) {
                                    return moment(row.date_to + " " + row.time_to).format(dateformat + ", " + timeformat);
                                },
                                "targets": 3
                            },
                            {
                                // The `data` parameter refers to the data for the cell (defined by the
                                // `data` option, which defaults to the column being worked with, in
                                // this case `data: 0`.
                                "render": function ( data, type, row ) {
                                    if (data == 0){
                                        return '<label class="label label-danger">Pending</label>';
                                    }else{
                                        return '<label class="label label-success">Accepted</label>';
                                    }
                                },
                                "targets": 4
                            },
							{
                                // The `data` parameter refers to the data for the cell (defined by the
                                // `data` option, which defaults to the column being worked with, in
                                // this case `data: 0`.
                                "render": function ( data, type, row ) {
                                    return '<span onClick="deleteVehicleReservation(this)" data-toggle="tooltip" title="Delete" class="text-danger pull-left m-l-10 pointer"><i class="fa fa-trash"></i></span>';
                                },
                                "targets": 5
                            }
                        ],
                        responsive: true,
                        dom: 'lfrtipB',
							buttons: [
								{ extend: 'copy', className: 'btn-sm btn-primary' },
								{ extend: 'csv', className: 'btn-sm btn-primary' },
								{ extend: 'excel', className: 'btn-sm btn-primary' },
								{ extend: 'pdf', className: 'btn-sm btn-primary' },
								{ extend: 'print', className: 'btn-sm btn-primary'}
							]
                    });
                
        }
        
        function drawEquipmentScheduler(sections, items) {
            $(".equipmentSchedulerContainer").html("");
            var today = moment().startOf('day');
            eScheduler = {
                Periods: [{
                        Name: 'Today',
                        Label: 'Today',
                        TimeframePeriod: (60 * 1),
                        TimeframeOverall: (60 * 24 * 1),
                        TimeframeHeaders: [
                            'Do MMMM YYYY',
                            'HH'
                        ]
                    },
                    {
                        Name: '3 days',
                        Label: '3 days',
                        TimeframePeriod: (60 * 4),
                        TimeframeOverall: (60 * 24 * 3),
                        TimeframeHeaders: [
                            'Do MMM',
                            'HH'
                        ],
                        Classes: 'period-3day'
                    },
                    {
                        Name: '1 week',
                        Label: '1 week',
                        TimeframePeriod: (60 * 24),
                        TimeframeOverall: (60 * 24 * 7),
                        TimeframeHeaders: [
                            'MMMM YYYY',
                            'dddd Do'
                        ]
                    }
                ],
                Items: items,
                Sections: sections,
                Init: function() {
                    EquipmentScheduler.Options.GetSections = eScheduler.GetSections;
                    EquipmentScheduler.Options.GetSchedule = eScheduler.GetSchedule;
                    EquipmentScheduler.Options.Start = today;
                    EquipmentScheduler.Options.Periods = eScheduler.Periods;
                    EquipmentScheduler.Options.SelectedPeriod = '3 days';
                    EquipmentScheduler.Options.Element = $('.equipmentSchedulerContainer');
                    EquipmentScheduler.Options.AllowDragging = false;
                    EquipmentScheduler.Options.AllowResizing = false;
                    EquipmentScheduler.Options.Events.ItemClicked = eScheduler.Item_Clicked;
                    EquipmentScheduler.Options.Events.ItemDropped = eScheduler.Item_Dragged;
                    EquipmentScheduler.Options.Events.ItemResized = eScheduler.Item_Resized;
                    EquipmentScheduler.Options.Events.ItemMovement = eScheduler.Item_Movement;
                    EquipmentScheduler.Options.Events.ItemMovementStart = eScheduler.Item_MovementStart;
                    EquipmentScheduler.Options.Events.ItemMovementEnd = eScheduler.Item_MovementEnd;
                    EquipmentScheduler.Options.Text.NextButton = '&nbsp;';
                    EquipmentScheduler.Options.Text.PrevButton = '&nbsp;';
                    EquipmentScheduler.Options.MaxHeight = 100;
                    EquipmentScheduler.Init();
                },
                GetSections: function(callback) {
                    callback(eScheduler.Sections);
                },
                GetSchedule: function(callback, start, end) {
                    callback(eScheduler.Items);
                },
                Item_Clicked: function(item) {
                    console.log(item);
                },
                Item_Dragged: function(item, sectionID, start, end) {
                    var foundItem;
                    for (var i = 0; i < eScheduler.Items.length; i++) {
                        foundItem = eScheduler.Items[i];
                        if (foundItem.id === item.id) {
                            foundItem.sectionID = sectionID;
                            foundItem.start = start;
                            foundItem.end = end;
                            eScheduler.Items[i] = foundItem;
                        }
                    }
                    EquipmentScheduler.Init();
                },
                Item_Resized: function(item, start, end) {
                    var foundItem;
                    for (var i = 0; i < eScheduler.Items.length; i++) {
                        foundItem = eScheduler.Items[i];
                        if (foundItem.id === item.id) {
                            foundItem.start = start;
                            foundItem.end = end;
                            eScheduler.Items[i] = foundItem;
                        }
                    }
                    EquipmentScheduler.Init();
                },
                Item_Movement: function(item, start, end) {
                    var html;
                    html = '<div>';
                    html += '   <div>';
                    html += '       Start: ' + start.format('Do MMM YYYY HH:mm');
                    html += '   </div>';
                    html += '   <div>';
                    html += '       End: ' + end.format('Do MMM YYYY HH:mm');
                    html += '   </div>';
                    html += '</div>';
                    $('.realtime-info').empty().append(html);
                },
                Item_MovementStart: function() {
                    $('.realtime-info').show();
                },
                Item_MovementEnd: function() {
                    $('.realtime-info').hide();
                }
            };
            eScheduler.Init();
        }
        
        function makeEquipmentReservationsTable(reservations){
                    if (eRTable != null){
                        eRTable.destroy();
                    }
                    eRTable = $('#equipmentReservationsTable').DataTable({
                        "aaData": reservations,
                        "columns": [
                            { "data": "equipment_name" },
                            { "data": "employee_name" },
                            { "data": "date_from" },
                            { "data": "date_to" },
                            { "data": "reservation_status" },
							{ "defaultContent" : '' }
                        ],
                        "columnDefs": [
                            {
                                // The `data` parameter refers to the data for the cell (defined by the
                                // `data` option, which defaults to the column being worked with, in
                                // this case `data: 0`.
                                "render": function ( data, type, row ) {
                                    return row.employee_name + " " + row.employee_surname;
                                },
                                "targets": 1
                            },
                            {
                                // The `data` parameter refers to the data for the cell (defined by the
                                // `data` option, which defaults to the column being worked with, in
                                // this case `data: 0`.
                                "render": function ( data, type, row ) {
                                    return moment(row.date_from + " " + row.time_from).format(dateformat + ", " + timeformat);
                                },
                                "targets": 2
                            },
                            {
                                // The `data` parameter refers to the data for the cell (defined by the
                                // `data` option, which defaults to the column being worked with, in
                                // this case `data: 0`.
                                "render": function ( data, type, row ) {
                                    return moment(row.date_to + " " + row.time_to).format(dateformat + ", " + timeformat);
                                },
                                "targets": 3
                            },
                            {
                                // The `data` parameter refers to the data for the cell (defined by the
                                // `data` option, which defaults to the column being worked with, in
                                // this case `data: 0`.
                                "render": function ( data, type, row ) {
                                    if (data == 0){
                                        return '<label class="label label-danger">Pending</label>';
                                    }else{
                                        return '<label class="label label-success">Accepted</label>';
                                    }
                                },
                                "targets": 4
                            },
							{
                                // The `data` parameter refers to the data for the cell (defined by the
                                // `data` option, which defaults to the column being worked with, in
                                // this case `data: 0`.
                                "render": function ( data, type, row ) {
                                    return '<span onClick="deleteEquipmentReservation(this)" data-toggle="tooltip" title="Delete" class="text-danger pull-left m-l-10 pointer"><i class="fa fa-trash"></i></span>';
                                },
                                "targets": 5
                            }
                        ],
                        responsive: true,
                        dom: 'lfrtipB',
							buttons: [
								{ extend: 'copy', className: 'btn-sm btn-primary' },
								{ extend: 'csv', className: 'btn-sm btn-primary' },
								{ extend: 'excel', className: 'btn-sm btn-primary' },
								{ extend: 'pdf', className: 'btn-sm btn-primary' },
								{ extend: 'print', className: 'btn-sm btn-primary'}
							]
                    });
                
        }
        
        function drawPlaceScheduler(sections, items) {
            $(".placeSchedulerContainer").html("");
            var today = moment().startOf('day');
            pScheduler = {
                Periods: [{
                        Name: 'Today',
                        Label: 'Today',
                        TimeframePeriod: (60 * 1),
                        TimeframeOverall: (60 * 24 * 1),
                        TimeframeHeaders: [
                            'Do MMMM YYYY',
                            'HH'
                        ]
                    },
                    {
                        Name: '3 days',
                        Label: '3 days',
                        TimeframePeriod: (60 * 4),
                        TimeframeOverall: (60 * 24 * 3),
                        TimeframeHeaders: [
                            'Do MMM',
                            'HH'
                        ],
                        Classes: 'period-3day'
                    },
                    {
                        Name: '1 week',
                        Label: '1 week',
                        TimeframePeriod: (60 * 24),
                        TimeframeOverall: (60 * 24 * 7),
                        TimeframeHeaders: [
                            'MMMM YYYY',
                            'dddd Do'
                        ]
                    }
                ],
                Items: items,
                Sections: sections,
                Init: function() {
                    PlaceScheduler.Options.GetSections = pScheduler.GetSections;
                    PlaceScheduler.Options.GetSchedule = pScheduler.GetSchedule;
                    PlaceScheduler.Options.Start = today;
                    PlaceScheduler.Options.Periods = pScheduler.Periods;
                    PlaceScheduler.Options.SelectedPeriod = '3 days';
                    PlaceScheduler.Options.Element = $('.placeSchedulerContainer');
                    PlaceScheduler.Options.AllowDragging = false;
                    PlaceScheduler.Options.AllowResizing = false;
                    PlaceScheduler.Options.Events.ItemClicked = pScheduler.Item_Clicked;
                    PlaceScheduler.Options.Events.ItemDropped = pScheduler.Item_Dragged;
                    PlaceScheduler.Options.Events.ItemResized = pScheduler.Item_Resized;
                    PlaceScheduler.Options.Events.ItemMovement = pScheduler.Item_Movement;
                    PlaceScheduler.Options.Events.ItemMovementStart = pScheduler.Item_MovementStart;
                    PlaceScheduler.Options.Events.ItemMovementEnd = pScheduler.Item_MovementEnd;
                    PlaceScheduler.Options.Text.NextButton = '&nbsp;';
                    PlaceScheduler.Options.Text.PrevButton = '&nbsp;';
                    PlaceScheduler.Options.MaxHeight = 100;
                    PlaceScheduler.Init();
                },
                GetSections: function(callback) {
                    callback(pScheduler.Sections);
                },
                GetSchedule: function(callback, start, end) {
                    callback(pScheduler.Items);
                },
                Item_Clicked: function(item) {
                    console.log(item);
                },
                Item_Dragged: function(item, sectionID, start, end) {
                    var foundItem;
                    for (var i = 0; i < pScheduler.Items.length; i++) {
                        foundItem = pScheduler.Items[i];
                        if (foundItem.id === item.id) {
                            foundItem.sectionID = sectionID;
                            foundItem.start = start;
                            foundItem.end = end;
                            pScheduler.Items[i] = foundItem;
                        }
                    }
                    PlaceScheduler.Init();
                },
                Item_Resized: function(item, start, end) {
                    var foundItem;
                    for (var i = 0; i < pScheduler.Items.length; i++) {
                        foundItem = pScheduler.Items[i];
                        if (foundItem.id === item.id) {
                            foundItem.start = start;
                            foundItem.end = end;
                            pScheduler.Items[i] = foundItem;
                        }
                    }
                    PlaceScheduler.Init();
                },
                Item_Movement: function(item, start, end) {
                    var html;
                    html = '<div>';
                    html += '   <div>';
                    html += '       Start: ' + start.format('Do MMM YYYY HH:mm');
                    html += '   </div>';
                    html += '   <div>';
                    html += '       End: ' + end.format('Do MMM YYYY HH:mm');
                    html += '   </div>';
                    html += '</div>';
                    $('.realtime-info').empty().append(html);
                },
                Item_MovementStart: function() {
                    $('.realtime-info').show();
                },
                Item_MovementEnd: function() {
                    $('.realtime-info').hide();
                }
            };
            pScheduler.Init();
        }
        
        function makePlaceReservationsTable(reservations){
                    if (pRTable != null){
                        pRTable.destroy();
                    }
                    pRTable = $('#placeReservationsTable').DataTable({
                        "aaData": reservations,
                        "columns": [
                            { "data": "place_name" },
                            { "data": "employee_name" },
                            { "data": "date_from" },
                            { "data": "date_to" },
                            { "data": "reservation_status" },
							{ "defaultContent": '' }
                        ],
                        "columnDefs": [
                            {
                                // The `data` parameter refers to the data for the cell (defined by the
                                // `data` option, which defaults to the column being worked with, in
                                // this case `data: 0`.
                                "render": function ( data, type, row ) {
                                    return row.employee_name + " " + row.employee_surname;
                                },
                                "targets": 1
                            },
                            {
                                // The `data` parameter refers to the data for the cell (defined by the
                                // `data` option, which defaults to the column being worked with, in
                                // this case `data: 0`.
                                "render": function ( data, type, row ) {
                                    return moment(row.date_from + " " + row.time_from).format(dateformat + ", " + timeformat);
                                },
                                "targets": 2
                            },
                            {
                                // The `data` parameter refers to the data for the cell (defined by the
                                // `data` option, which defaults to the column being worked with, in
                                // this case `data: 0`.
                                "render": function ( data, type, row ) {
                                    return moment(row.date_to + " " + row.time_to).format(dateformat + ", " + timeformat);
                                },
                                "targets": 3
                            },
                            {
                                // The `data` parameter refers to the data for the cell (defined by the
                                // `data` option, which defaults to the column being worked with, in
                                // this case `data: 0`.
                                "render": function ( data, type, row ) {
                                    if (data == 0){
                                        return '<label class="label label-danger">Pending</label>';
                                    }else{
                                        return '<label class="label label-success">Accepted</label>';
                                    }
                                },
                                "targets": 4
                            },
							{
                                // The `data` parameter refers to the data for the cell (defined by the
                                // `data` option, which defaults to the column being worked with, in
                                // this case `data: 0`.
                                "render": function ( data, type, row ) {
                                    return '<span onClick="deletePlaceReservation(this)" data-toggle="tooltip" title="Delete" class="text-danger pull-left m-l-10 pointer"><i class="fa fa-trash"></i></span>';
                                },
                                "targets": 5
                            }
                        ],
                        responsive: true,
                        dom: 'lfrtipB',
							buttons: [
								{ extend: 'copy', className: 'btn-sm btn-primary' },
								{ extend: 'csv', className: 'btn-sm btn-primary' },
								{ extend: 'excel', className: 'btn-sm btn-primary' },
								{ extend: 'pdf', className: 'btn-sm btn-primary' },
								{ extend: 'print', className: 'btn-sm btn-primary'}
							]
                    });
                
        }
        
        function drawOtherAssetScheduler(sections, items) {
            $(".otherassetSchedulerContainer").html("");
            var today = moment().startOf('day');
            oScheduler = {
                Periods: [{
                        Name: 'Today',
                        Label: 'Today',
                        TimeframePeriod: (60 * 1),
                        TimeframeOverall: (60 * 24 * 1),
                        TimeframeHeaders: [
                            'Do MMMM YYYY',
                            'HH'
                        ]
                    },
                    {
                        Name: '3 days',
                        Label: '3 days',
                        TimeframePeriod: (60 * 4),
                        TimeframeOverall: (60 * 24 * 3),
                        TimeframeHeaders: [
                            'Do MMM',
                            'HH'
                        ],
                        Classes: 'period-3day'
                    },
                    {
                        Name: '1 week',
                        Label: '1 week',
                        TimeframePeriod: (60 * 24),
                        TimeframeOverall: (60 * 24 * 7),
                        TimeframeHeaders: [
                            'MMMM YYYY',
                            'dddd Do'
                        ]
                    }
                ],
                Items: items,
                Sections: sections,
                Init: function() {
                    OtherAssetScheduler.Options.GetSections = oScheduler.GetSections;
                    OtherAssetScheduler.Options.GetSchedule = oScheduler.GetSchedule;
                    OtherAssetScheduler.Options.Start = today;
                    OtherAssetScheduler.Options.Periods = oScheduler.Periods;
                    OtherAssetScheduler.Options.SelectedPeriod = '3 days';
                    OtherAssetScheduler.Options.Element = $('.otherassetSchedulerContainer');
                    OtherAssetScheduler.Options.AllowDragging = false;
                    OtherAssetScheduler.Options.AllowResizing = false;
                    OtherAssetScheduler.Options.Events.ItemClicked = oScheduler.Item_Clicked;
                    OtherAssetScheduler.Options.Events.ItemDropped = oScheduler.Item_Dragged;
                    OtherAssetScheduler.Options.Events.ItemResized = oScheduler.Item_Resized;
                    OtherAssetScheduler.Options.Events.ItemMovement = oScheduler.Item_Movement;
                    OtherAssetScheduler.Options.Events.ItemMovementStart = oScheduler.Item_MovementStart;
                    OtherAssetScheduler.Options.Events.ItemMovementEnd = oScheduler.Item_MovementEnd;
                    OtherAssetScheduler.Options.Text.NextButton = '&nbsp;';
                    OtherAssetScheduler.Options.Text.PrevButton = '&nbsp;';
                    OtherAssetScheduler.Options.MaxHeight = 100;
                    OtherAssetScheduler.Init();
                },
                GetSections: function(callback) {
                    callback(oScheduler.Sections);
                },
                GetSchedule: function(callback, start, end) {
                    callback(oScheduler.Items);
                },
                Item_Clicked: function(item) {
                    console.log(item);
                },
                Item_Dragged: function(item, sectionID, start, end) {
                    var foundItem;
                    for (var i = 0; i < oScheduler.Items.length; i++) {
                        foundItem = oScheduler.Items[i];
                        if (foundItem.id === item.id) {
                            foundItem.sectionID = sectionID;
                            foundItem.start = start;
                            foundItem.end = end;
                            oScheduler.Items[i] = foundItem;
                        }
                    }
                    OtherAssetScheduler.Init();
                },
                Item_Resized: function(item, start, end) {
                    var foundItem;
                    for (var i = 0; i < oScheduler.Items.length; i++) {
                        foundItem = oScheduler.Items[i];
                        if (foundItem.id === item.id) {
                            foundItem.start = start;
                            foundItem.end = end;
                            oScheduler.Items[i] = foundItem;
                        }
                    }
                    OtherAssetScheduler.Init();
                },
                Item_Movement: function(item, start, end) {
                    var html;
                    html = '<div>';
                    html += '   <div>';
                    html += '       Start: ' + start.format('Do MMM YYYY HH:mm');
                    html += '   </div>';
                    html += '   <div>';
                    html += '       End: ' + end.format('Do MMM YYYY HH:mm');
                    html += '   </div>';
                    html += '</div>';
                    $('.realtime-info').empty().append(html);
                },
                Item_MovementStart: function() {
                    $('.realtime-info').show();
                },
                Item_MovementEnd: function() {
                    $('.realtime-info').hide();
                }
            };
            oScheduler.Init();
        }
        
        function makeOtherReservationsTable(reservations){
                    if (oRTable != null){
                        oRTable.destroy();
                    }
                    oRTable = $('#otherAssetsReservationsTable').DataTable({
                        "aaData": reservations,
                        "columns": [
                            { "data": "asset_name" },
                            { "data": "employee_name" },
                            { "data": "date_from" },
                            { "data": "date_to" },
                            { "data": "reservation_status" },
							{ "data": '' }
                        ],
                        "columnDefs": [
                            {
                                // The `data` parameter refers to the data for the cell (defined by the
                                // `data` option, which defaults to the column being worked with, in
                                // this case `data: 0`.
                                "render": function ( data, type, row ) {
                                    return row.employee_name + " " + row.employee_surname;
                                },
                                "targets": 1
                            },
                            {
                                // The `data` parameter refers to the data for the cell (defined by the
                                // `data` option, which defaults to the column being worked with, in
                                // this case `data: 0`.
                                "render": function ( data, type, row ) {
                                    return moment(row.date_from + " " + row.time_from).format(dateformat + ", " + timeformat);
                                },
                                "targets": 2
                            },
                            {
                                // The `data` parameter refers to the data for the cell (defined by the
                                // `data` option, which defaults to the column being worked with, in
                                // this case `data: 0`.
                                "render": function ( data, type, row ) {
                                    return moment(row.date_to + " " + row.time_to).format(dateformat + ", " + timeformat);
                                },
                                "targets": 3
                            },
                            {
                                // The `data` parameter refers to the data for the cell (defined by the
                                // `data` option, which defaults to the column being worked with, in
                                // this case `data: 0`.
                                "render": function ( data, type, row ) {
                                    if (data == 0){
                                        return '<label class="label label-danger">Pending</label>';
                                    }else{
                                        return '<label class="label label-success">Accepted</label>';
                                    }
                                },
                                "targets": 4
                            },
							{
                                // The `data` parameter refers to the data for the cell (defined by the
                                // `data` option, which defaults to the column being worked with, in
                                // this case `data: 0`.
                                "render": function ( data, type, row ) {
                                    return '<span onClick="deleteOtherReservation(this)" data-toggle="tooltip" title="Delete" class="text-danger pull-left m-l-10 pointer"><i class="fa fa-trash"></i></span>';
                                },
                                "targets": 5
                            }
                        ],
                        responsive: true,
                        dom: 'lfrtipB',
							buttons: [
								{ extend: 'copy', className: 'btn-sm btn-primary' },
								{ extend: 'csv', className: 'btn-sm btn-primary' },
								{ extend: 'excel', className: 'btn-sm btn-primary' },
								{ extend: 'pdf', className: 'btn-sm btn-primary' },
								{ extend: 'print', className: 'btn-sm btn-primary'}
							]
                    });
        }
		
		function deleteVehicleReservation(row){
			var actualRow = $(row).parents('tr');
			if (actualRow.hasClass('child')) {//Check if the current row is a child row
				actualRow = actualRow.prev();//If it is, then point to the row before it (its 'parent')
			}
            var reservation = vRTable.row(actualRow).data();
            swal({
              title: 'Confirm action',
              text: "Are you sure you want to delete this vehicle reservation?",
              type: 'error',
              showCancelButton: true,
              confirmButtonColor: '#3085d6',
              cancelButtonColor: '#d33',
              confirmButtonText: 'Yes, remove'
            }).then(function () {
                var values = { reservation_id: reservation.reservation_id };
                $.ajax({
                    type: "POST",
                    url: "vehicle/reservationdelete",
                    data: values,
                    success: function(msg) {
                        if (msg == "") {
                            swal(
                                'Success!',
                                'Reservation was successfully removed.',
                                'success'
                            );
                            makeCalendar();
                        } else {
                            swal(
                                'Error!',
                                'The server encountered the following error: ' + msg,
                                'error'
                            );
                        }
                    }
                });
            });
		}
		
		function deleteEquipmentReservation(row){
			var actualRow = $(row).parents('tr');
			if (actualRow.hasClass('child')) {//Check if the current row is a child row
				actualRow = actualRow.prev();//If it is, then point to the row before it (its 'parent')
			}
            var reservation = eRTable.row(actualRow).data();
            swal({
              title: 'Confirm action',
              text: "Are you sure you want to delete this equipment reservation?",
              type: 'error',
              showCancelButton: true,
              confirmButtonColor: '#3085d6',
              cancelButtonColor: '#d33',
              confirmButtonText: 'Yes, remove'
            }).then(function () {
                var values = { reservation_id: reservation.reservation_id };
                $.ajax({
                    type: "POST",
                    url: "equipment/reservationdelete",
                    data: values,
                    success: function(msg) {
                        if (msg == "") {
                            swal(
                                'Success!',
                                'Reservation was successfully removed.',
                                'success'
                            );
                            makeCalendar();
                        } else {
                            swal(
                                'Error!',
                                'The server encountered the following error: ' + msg,
                                'error'
                            );
                        }
                    }
                });
            });
		}
		
		function deletePlaceReservation(row){
			var actualRow = $(row).parents('tr');
			if (actualRow.hasClass('child')) {//Check if the current row is a child row
				actualRow = actualRow.prev();//If it is, then point to the row before it (its 'parent')
			}
            var reservation = pRTable.row(actualRow).data();
            swal({
              title: 'Confirm action',
              text: "Are you sure you want to delete this place reservation?",
              type: 'error',
              showCancelButton: true,
              confirmButtonColor: '#3085d6',
              cancelButtonColor: '#d33',
              confirmButtonText: 'Yes, remove'
            }).then(function () {
                var values = { reservation_id: reservation.reservation_id };
                $.ajax({
                    type: "POST",
                    url: "place/reservationdelete",
                    data: values,
                    success: function(msg) {
                        if (msg == "") {
                            swal(
                                'Success!',
                                'Reservation was successfully removed.',
                                'success'
                            );
                            makeCalendar();
                        } else {
                            swal(
                                'Error!',
                                'The server encountered the following error: ' + msg,
                                'error'
                            );
                        }
                    }
                });
            });
		}
		
		function deleteOtherReservation(row){
			var actualRow = $(row).parents('tr');
			if (actualRow.hasClass('child')) {//Check if the current row is a child row
				actualRow = actualRow.prev();//If it is, then point to the row before it (its 'parent')
			}
            var reservation = oRTable.row(actualRow).data();
            swal({
              title: 'Confirm action',
              text: "Are you sure you want to delete this reservation?",
              type: 'error',
              showCancelButton: true,
              confirmButtonColor: '#3085d6',
              cancelButtonColor: '#d33',
              confirmButtonText: 'Yes, remove'
            }).then(function () {
                var values = { reservation_id: reservation.reservation_id };
                $.ajax({
                    type: "POST",
                    url: "otherasset/reservationdelete",
                    data: values,
                    success: function(msg) {
                        if (msg == "") {
                            swal(
                                'Success!',
                                'Reservation was successfully removed.',
                                'success'
                            );
                            makeCalendar();
                        } else {
                            swal(
                                'Error!',
                                'The server encountered the following error: ' + msg,
                                'error'
                            );
                        }
                    }
                });
            });
		}
		
		function getEmployees(){
		    $.ajax({
                type: "POST",
                url: "<?= BASE_URL ?>" + "employees/list",
                data: null,
                dataType: "json",
                success: function(employees) {
                    employeeArray = employees;
                    employees.sort(function(a, b){
                      return a.department_name > b.department_name;
                    });
                    var lastDepartment = null;
					$("#vehicleOwnerSelect, #editVehicleOwnerSelect").append($('<option>', {
                        value: "",
                        text: "Choose an employee"
                    }));
                    for (var i = 0; i < employees.length; i++){
                            if (lastDepartment == null){
                                $("#vehicleOwnerSelect, #editVehicleOwnerSelect, #moveVehicleEmployeeSelect, #moveEquipmentEmployeeSelect, #movePlaceEmployeeSelect, #moveOtherAssetEmployeeSelect").append("<optgroup label='" + employees[i].department_name + "'>");
                                lastDepartment = employees[i].department_name;
                            }else if (employees[i].department_name != lastDepartment){
                                $("#vehicleOwnerSelect, #editVehicleOwnerSelect, #moveVehicleEmployeeSelect, #moveEquipmentEmployeeSelect, #movePlaceEmployeeSelect, #moveOtherAssetEmployeeSelect").append("</optgroup><optgroup label='" + employees[i].department_name + "'>");
                                lastDepartment = employees[i].department_name;
                            }
                            $("#vehicleOwnerSelect, #editVehicleOwnerSelect, #moveVehicleEmployeeSelect, #moveEquipmentEmployeeSelect, #movePlaceEmployeeSelect, #moveOtherAssetEmployeeSelect").append($('<option>', {
                                value: employees[i].employee_id,
                                text: employees[i].employee_name + " " + employees[i].employee_surname
                            }));
                        
                    }
                    $("#vehicleOwnerSelect, #editVehicleOwnerSelect, #moveVehicleEmployeeSelect, #moveEquipmentEmployeeSelect, #movePlaceEmployeeSelect, #moveOtherAssetEmployeeSelect").append("</optgroup>");
                    $("#vehicleOwnerSelect, #editVehicleOwnerSelect, #moveVehicleEmployeeSelect, #moveEquipmentEmployeeSelect, #movePlaceEmployeeSelect, #moveOtherAssetEmployeeSelect").val(loggedEmployee).trigger("change");
                }
		    });
		}
		
		function importVehicles(){
		    $("#vehicleWizardDIV").show();
		}
		
		function importEquipment(){
		    $("#equipmentWizardDIV").show();
		}
		
		function importPlaces(){
		    $("#placesWizardDIV").show();
		}
		
		function importOtherAssets(){
		    $("#assetWizardDIV").show();
		}
		
		function getTripOrders(){
		    $.ajax({
                type: "POST",
                url: "triporders/get",
                data: null,
                dataType: "json",
                success: function(triporders) {
                    if (tTable != null){
                        tTable.destroy();
                    }
                    tTable = $('#tripOrdersTable').DataTable({
                        "aaData": triporders,
                        "columns": [
                            { "data": "employee_name" },
                            { "data": "vehicle_model" },
                            { "data": "date_from" },
                            { "data": "date_to" },
                            { "defaultContent": '<span onClick="showTripOrder(this)" class="text-primary pointer pull-left"><i class="fas fa-th-list"></i></span>'}
                        ],
                        "columnDefs": [
                            {
                                // The `data` parameter refers to the data for the cell (defined by the
                                // `data` option, which defaults to the column being worked with, in
                                // this case `data: 0`.
                                "render": function ( data, type, row ) {
                                    return row.employee_name + " " + row.employee_surname;
                                },
                                "targets": 0
                            },
                            {
                                // The `data` parameter refers to the data for the cell (defined by the
                                // `data` option, which defaults to the column being worked with, in
                                // this case `data: 0`.
                                "render": function ( data, type, row ) {
                                    return row.vehicle_model + " " + row.vehicle_brand;
                                },
                                "targets": 1
                            },
                            {
                                // The `data` parameter refers to the data for the cell (defined by the
                                // `data` option, which defaults to the column being worked with, in
                                // this case `data: 0`.
                                "render": function ( data, type, row ) {
                                    return moment(row.date_from + " " + row.time_from).format(dateformat + ", " + timeformat);
                                },
                                "targets": 2
                            },
                            {
                                // The `data` parameter refers to the data for the cell (defined by the
                                // `data` option, which defaults to the column being worked with, in
                                // this case `data: 0`.
                                "render": function ( data, type, row ) {
                                    return moment(row.date_to + " " + row.time_to).format(dateformat + ", " + timeformat);
                                },
                                "targets": 3
                            },
                            {
                                "targets": 4,
                                "orderable": false
                            }
                        ],
                        responsive: true,
                        dom: 'lfrtipB',
							buttons: [
								{ extend: 'copy', className: 'btn-sm btn-primary' },
								{ extend: 'csv', className: 'btn-sm btn-primary' },
								{ extend: 'excel', className: 'btn-sm btn-primary' },
								{ extend: 'pdf', className: 'btn-sm btn-primary' },
								{ extend: 'print', className: 'btn-sm btn-primary'}
							]
                    });
                }
		    });
		}
		
		function showTripOrder(row){
			var actualRow = $(row).parents('tr');
			if (actualRow.hasClass('child')) {//Check if the current row is a child row
				actualRow = actualRow.prev();//If it is, then point to the row before it (its 'parent')
			}
            var tripOrder = tTable.row(actualRow).data();
		    window.open("<?= BASE_URL ?>" + "triporderdetails?trip_id=" + tripOrder.trip_id);
		}
		
		function getVehicles(){
		    $.ajax({
                type: "POST",
                url: "<?= BASE_URL ?>" + "vehicles/get",
                data: null,
                dataType: "json",
                success: function(vehicles) {
                    vehicleArray = vehicles;
                    
                    if (dTable != null){
                        dTable.destroy();
                    }
                    dTable = $('#vehicleTable').DataTable({
                        "aaData": vehicles,
                        "columns": [
                            { "data": "vehicle_type" },
                            { "data": "vehicle_brand" },
                            { "data": "vehicle_model" },
                            { "data": "vehicle_registration" },
                            { "data": "employee_id" },
                            { "defaultContent": '<span onClick="showEditVehiclePopup(this)" class="text-primary pointer pull-left"><i class="fa fa-edit"></i></span><span onClick="deleteVehicle(this)" class="text-danger pointer pull-left m-l-10"><i class="fa fa-trash"></i></span>'}
                        ],
                        "columnDefs": [
                            
                            {
                                // The `data` parameter refers to the data for the cell (defined by the
                                // `data` option, which defaults to the column being worked with, in
                                // this case `data: 0`.
                                "render": function ( data, type, row ) {
                                    if (data == null){
                                        return "Not in use";
                                    }else{
                                        return row.employee_name + " " + row.employee_surname;
                                    }
                                },
                                "targets": 4
                            },
                            {
                                    "targets": 5,
                                    "orderable": false
                            }
                        ],
                        responsive: true,
                        dom: 'lfrtipB',
							buttons: [
								{ extend: 'copy', className: 'btn-sm btn-primary' },
								{ extend: 'csv', className: 'btn-sm btn-primary' },
								{ extend: 'excel', className: 'btn-sm btn-primary' },
								{ extend: 'pdf', className: 'btn-sm btn-primary' },
								{ extend: 'print', className: 'btn-sm btn-primary'}
							]
                    });
                    
                    $("#vehicleReservationSelect").html("");
                    $("#vehicleReservationSelect").append($('<option>', {
                        value: "",
                        text: "Choose a vehicle"
                    }));
                    for (var i = 0; i < vehicles.length; i++){
                        var vehicle = vehicles[i];
                        if (vehicle.vehicle_type == "Company" && vehicle.permanent_reservation == 0){
                            $("#vehicleReservationSelect").append($('<option>', {
                                value: vehicle.vehicle_id,
                                text: vehicle.vehicle_brand + " " + vehicle.vehicle_model
                            }));
                        }
                    }
                }
		    });
		    
		}
		
		function getEquipment(){
		    $.ajax({
                type: "POST",
                url: "<?= BASE_URL ?>" + "equipment/get",
                data: null,
                dataType: "json",
                success: function(equipment) {
                    equipmentArray = equipment;
                    
                    if (eTable != null){
                        eTable.destroy();
                    }
                    eTable = $('#equipmentTable').DataTable({
                        "aaData": equipment,
                        "columns": [
                            { "data": "equipment_category" },
                            { "data": "equipment_code" },
                            { "data": "equipment_name" },
							{ "data": "equipment_location" },
                            { "data": "equipment_description" },
                            { "data": "employee_id" },
                            { "defaultContent": '<span onClick="showEditEquipmentPopup(this)" class="text-primary pointer pull-left"><i class="fa fa-edit"></i></span><span onClick="deleteEquipment(this)" class="text-danger pointer pull-left m-l-10"><i class="fa fa-trash"></i></span>'}
                        ],
                        "columnDefs": [
						{
                                // The `data` parameter refers to the data for the cell (defined by the
                                // `data` option, which defaults to the column being worked with, in
                                // this case `data: 0`.
                                "render": function ( data, type, row ) {
                                    return '<span onClick="showMapPopupEquipment(this)" class="text-primary hover-underline">' + data + "</span>";
                                },
                                "targets": 3
                            },
                            {
                                // The `data` parameter refers to the data for the cell (defined by the
                                // `data` option, which defaults to the column being worked with, in
                                // this case `data: 0`.
                                "render": function ( data, type, row ) {
                                    if (data == null){
                                        return "Not in use";
                                    }else{
                                        return row.employee_name + " " + row.employee_surname;
                                    }
                                },
                                "targets": 5
                            },
                            {
                                    "targets": 6,
                                    "orderable": false
                            }
                        ],
                        responsive: true,
                        dom: 'lfrtipB',
							buttons: [
								{ extend: 'copy', className: 'btn-sm btn-primary' },
								{ extend: 'csv', className: 'btn-sm btn-primary' },
								{ extend: 'excel', className: 'btn-sm btn-primary' },
								{ extend: 'pdf', className: 'btn-sm btn-primary' },
								{ extend: 'print', className: 'btn-sm btn-primary'}
							]
                    });
                    $("#equipmentReservationSelect").html("");
                    $("#equipmentReservationSelect").append($('<option>', {
                        value: "",
                        text: "Choose equipment"
                    }));
                    for (var i = 0; i < equipment.length; i++){
                        var eq = equipment[i];
                        $("#equipmentReservationSelect").append($('<option>', {
                            value: eq.equipment_id,
                            text: eq.equipment_name
                        }));
                    }
                }
		    });
		    
		}
		
		function getPlaces(){
		    $.ajax({
                type: "POST",
                url: "<?= BASE_URL ?>" + "places/get",
                data: null,
                dataType: "json",
                success: function(places) {
                    placesArray = places;
                    
                    if (pTable != null){
                        pTable.destroy();
                    }
                    pTable = $('#placesTable').DataTable({
                        "aaData": places,
                        "columns": [
                            { "data": "place_name" },
                            { "data": "place_address" },
                            { "data": "place_description" },
                            { "data": "employee_id" },
                            { "defaultContent": '<span onClick="showEditPlacePopup(this)" class="text-primary pointer pull-left"><i class="fa fa-edit"></i></span><span onClick="deletePlace(this)" class="text-danger pointer pull-left m-l-10"><i class="fa fa-trash"></i></span>'}
                        ],
                        "columnDefs": [
                            {
                                // The `data` parameter refers to the data for the cell (defined by the
                                // `data` option, which defaults to the column being worked with, in
                                // this case `data: 0`.
                                "render": function ( data, type, row ) {
                                    if (data == null){
                                        return "Not in use";
                                    }else{
                                        return row.employee_name + " " + row.employee_surname;
                                    }
                                },
                                "targets": 3
                            },
                            {
                                // The `data` parameter refers to the data for the cell (defined by the
                                // `data` option, which defaults to the column being worked with, in
                                // this case `data: 0`.
                                "render": function ( data, type, row ) {
                                    return '<span onClick="showMapPopupPlace(this)" class="text-primary hover-underline">' + data + "</span>";
                                },
                                "targets": 1
                            },
                            {
                                    "targets": 4,
                                    "orderable": false
                            }
                        ],
                        responsive: true,
                        dom: 'lfrtipB',
							buttons: [
								{ extend: 'copy', className: 'btn-sm btn-primary' },
								{ extend: 'csv', className: 'btn-sm btn-primary' },
								{ extend: 'excel', className: 'btn-sm btn-primary' },
								{ extend: 'pdf', className: 'btn-sm btn-primary' },
								{ extend: 'print', className: 'btn-sm btn-primary'}
							]
                    });
                    $("#placeReservationSelect").html("");
                    $("#placeReservationSelect").append($('<option>', {
                        value: "",
                        text: "Choose a place"
                    }));
                    for (var i = 0; i < places.length; i++){
                        var place = places[i];
                        $("#placeReservationSelect").append($('<option>', {
                            value: place.place_id,
                            text: place.place_name
                        }));
                        
                    }
                }
		    });
		    
		}
		
		function showMapPopupEquipment(row){
			var actualRow = $(row).parents('tr');
			if (actualRow.hasClass('child')) {//Check if the current row is a child row
				actualRow = actualRow.prev();//If it is, then point to the row before it (its 'parent')
			}
            var equipment = eTable.row(actualRow).data();
            if (placeMarker == null){
                placeMarker = new google.maps.Marker({
                    position: new google.maps.LatLng(parseFloat(equipment.latitude), parseFloat(equipment.longitude)),
                    map: map,
                    title: equipment.equipment_location
                });
            }else{
                placeMarker.setPosition({lat: parseFloat(equipment.latitude), lng: parseFloat(equipment.longitude)});
                placeMarker.setTitle(equipment.equipment_location);
            }

            $("#mapPopupDIV, #mapDIV").show();
			
			google.maps.event.trigger(map, 'resize');
            map.setZoom(map.getZoom());
            map.setCenter(new google.maps.LatLng(equipment.latitude, equipment.longitude));
        }
		
		function showMapPopupPlace(row){
			var actualRow = $(row).parents('tr');
			if (actualRow.hasClass('child')) {//Check if the current row is a child row
				actualRow = actualRow.prev();//If it is, then point to the row before it (its 'parent')
			}
            var place = pTable.row(actualRow).data();
            if (placeMarker == null){
                placeMarker = new google.maps.Marker({
                    position: new google.maps.LatLng(parseFloat(place.latitude), parseFloat(place.longitude)),
                    map: map,
                    title: place.place_address
                });
            }else{
                placeMarker.setPosition({lat: parseFloat(place.latitude), lng: parseFloat(place.longitude)});
                placeMarker.setTitle(place.place_address);
            }
            
            $("#mapPopupDIV, #mapDIV").show();
            
            google.maps.event.trigger(map, 'resize');
            map.setZoom( map.getZoom() );
            map.setCenter(new google.maps.LatLng(place.latitude, place.longitude));
        }
		
		function showMapPopupAsset(row){
			var actualRow = $(row).parents('tr');
			if (actualRow.hasClass('child')) {//Check if the current row is a child row
				actualRow = actualRow.prev();//If it is, then point to the row before it (its 'parent')
			}
            var asset = oTable.row(actualRow).data();
            if (placeMarker == null){
                placeMarker = new google.maps.Marker({
                    position: new google.maps.LatLng(parseFloat(asset.latitude), parseFloat(asset.longitude)),
                    map: map,
                    title: asset.asset_location
                });
            }else{
                placeMarker.setPosition({lat: parseFloat(asset.latitude), lng: parseFloat(asset.longitude)});
                placeMarker.setTitle(asset.asset_location);
            }
            
            $("#mapPopupDIV, #mapDIV").show();
            
            google.maps.event.trigger(map, 'resize');
            map.setZoom( map.getZoom() );
            map.setCenter(new google.maps.LatLng(asset.latitude, asset.longitude));
        }
        
        function hideMapPopup(){
            $("#mapPopupDIV, #mapDIV").hide();
        }
		
		function getOtherAssets(){
		    $.ajax({
                type: "POST",
                url: "<?= BASE_URL ?>" + "otherassets/get",
                data: null,
                dataType: "json",
                success: function(assets) {
                    otherAssetsArray = assets;
                    if (oTable != null){
                        oTable.destroy();
                    }
                    oTable = $('#otherAssetsTable').DataTable({
                        "aaData": assets,
                        "columns": [
                            { "data": "asset_name" },
							{ "data": "asset_location" },
                            { "data": "asset_description" },
                            { "data": "employee_id" },
                            { "defaultContent": '<span onClick="showEditOtherAssetPopup(this)" class="text-primary pointer pull-left"><i class="fa fa-edit"></i></span><span onClick="deleteOtherAsset(this)" class="text-danger pointer pull-left m-l-10"><i class="fa fa-trash"></i></span>'}
                        ],
                        "columnDefs": [
							{
                                // The `data` parameter refers to the data for the cell (defined by the
                                // `data` option, which defaults to the column being worked with, in
                                // this case `data: 0`.
                                "render": function ( data, type, row ) {
                                    return '<span onClick="showMapPopupAsset(this)" class="text-primary hover-underline">' + data + "</span>";
                                },
                                "targets": 1
                            },
                            {
                                // The `data` parameter refers to the data for the cell (defined by the
                                // `data` option, which defaults to the column being worked with, in
                                // this case `data: 0`.
                                "render": function ( data, type, row ) {
                                    if (data == null){
                                        return "Not in use";
                                    }else{
                                        return row.employee_name + " " + row.employee_surname;
                                    }
                                },
                                "targets": 3
                            },
                            {
                                "targets": 4,
                                "orderable": false
                            }
                        ],
                        responsive: true,
                        dom: 'lfrtipB',
							buttons: [
								{ extend: 'copy', className: 'btn-sm btn-primary' },
								{ extend: 'csv', className: 'btn-sm btn-primary' },
								{ extend: 'excel', className: 'btn-sm btn-primary' },
								{ extend: 'pdf', className: 'btn-sm btn-primary' },
								{ extend: 'print', className: 'btn-sm btn-primary'}
							]
                    });
                    $("#assetReservationSelect").html("");
                    $("#assetReservationSelect").append($('<option>', {
                        value: "",
                        text: "Choose an asset"
                    }));
                    for (var i = 0; i < assets.length; i++){
                        var asset = assets[i];
                        $("#assetReservationSelect").append($('<option>', {
                            value: asset.asset_id,
                            text: asset.asset_name
                        }));
                    }
                }
		    });
		    
		}
		
		function showNewVehiclePopup(){
		    $("#vehicleOwnerSelect").val(loggedEmployee).trigger("change");
		    $("#vehiclePopupDIV, #addVehicleDIV").show();
		}
		
		function hideNewVehiclePopup(){
		    $("#vehiclePopupDIV, #addVehicleDIV").hide();
		    $("#addVehicleForm")[0].reset();
		}
		
		function showEditVehiclePopup(row){
			var actualRow = $(row).parents('tr');
			if (actualRow.hasClass('child')) {//Check if the current row is a child row
				actualRow = actualRow.prev();//If it is, then point to the row before it (its 'parent')
			}
            var vehicle = dTable.row(actualRow).data();
		    $("#editVehicleIDInput").val(vehicle.vehicle_id);
		    $("#editVehicleVINInput").val(vehicle.vehicle_vin);
		    $("#editVehicleYearInput").val(vehicle.vehicle_year);
		    $("#editVehicleMileageInput").val(vehicle.vehicle_mileage);
		    $("#editVehicleBrandInput").val(vehicle.vehicle_brand);
		    $("#editVehicleModelInput").val(vehicle.vehicle_model);
		    $("#editVehicleRegistrationInput").val(vehicle.vehicle_registration);
		    $("#editVehicleSeatsInput").val(vehicle.vehicle_seats);
			if (vehicle.vehicle_insurancedate != ""){
				$("#editVehicleInsuranceDateInput").val(moment(vehicle.vehicle_insurancedate).format(dateformat));
			}
			if (vehicle.vehicle_registrationdate != ""){
				$("#editVehicleRegistrationDateInput").val(moment(vehicle.vehicle_registrationdate).format(dateformat));
			}
			if (vehicle.vehicle_servicedate != ""){
				$("#editVehicleServiceDateInput").val(moment(vehicle.vehicle_servicedate).format(dateformat));
			}
		    $("#editVehicleForm input[name=vehicle_type]").val([vehicle.vehicle_type]);
		    if (vehicle.vehicle_type == "Personal"){
		        $("#editVehicleOwnerDIV").show();
		        $("#editVehicleOwnerSelect").val(vehicle.owner_id).trigger("change");
				$("#editPermanentReservation").addClass("hide");
		    }else{
		        $("#editVehicleOwnerDIV").hide();
		        $("#editVehicleOwnerSelect").val("").trigger("change");
				$("#editPermanentReservation").removeClass("hide");
		    }
		    $("#editVehicleForm input[name=fuel_type]").val([vehicle.fuel_type]);
		    $("#editVehicleForm input[name=vehicle_vignette]").val([vehicle.vehicle_vignette]);
		    if (vehicle.permanent_reservation == 1){
		        $("#editVehicleForm input[name=permanent_reservation]").prop("checked", true);
		        $("#editVehicleOwnerDIV").show();
		        $("#editVehicleOwnerSelect").val(vehicle.owner_id).trigger("change");
		    }else{
				$("#editVehicleForm input[name=permanent_reservation]").prop("checked", false);
		        $("#editVehicleOwnerDIV").hide();
		        $("#editVehicleOwnerSelect").val("").trigger("change");
		    }
		    $("#vehiclePopupDIV, #editVehicleDIV").show();
		}
		
		function showEditVehiclePopupID(vehicle_id){
			var vehicle;
			for (var i = 0; i < vehicleArray.length; i++){
				if (vehicleArray[i].vehicle_id == vehicle_id){
					vehicle = vehicleArray[i];
					break;
				}
			}
			$("#editVehicleIDInput").val(vehicle.vehicle_id);
		    $("#editVehicleVINInput").val(vehicle.vehicle_vin);
		    $("#editVehicleYearInput").val(vehicle.vehicle_year);
		    $("#editVehicleMileageInput").val(vehicle.vehicle_mileage);
		    $("#editVehicleBrandInput").val(vehicle.vehicle_brand);
		    $("#editVehicleModelInput").val(vehicle.vehicle_model);
		    $("#editVehicleRegistrationInput").val(vehicle.vehicle_registration);
		    $("#editVehicleSeatsInput").val(vehicle.vehicle_seats);
			if (vehicle.vehicle_insurancedate != ""){
				$("#editVehicleInsuranceDateInput").val(moment(vehicle.vehicle_insurancedate).format(dateformat));
			}
			if (vehicle.vehicle_registrationdate != ""){
				$("#editVehicleRegistrationDateInput").val(moment(vehicle.vehicle_registrationdate).format(dateformat));
			}
			if (vehicle.vehicle_servicedate != ""){
				$("#editVehicleServiceDateInput").val(moment(vehicle.vehicle_servicedate).format(dateformat));
			}
		    $("#editVehicleForm input[name=vehicle_type]").val([vehicle.vehicle_type]);
		    if (vehicle.vehicle_type == "Personal"){
		        $("#editVehicleOwnerDIV").show();
		        $("#editVehicleOwnerSelect").val(vehicle.owner_id).trigger("change");
				$("#editPermanentReservation").addClass("hide");
		    }else{
		        $("#editVehicleOwnerDIV").hide();
		        $("#editVehicleOwnerSelect").val("").trigger("change");
				$("#editPermanentReservation").removeClass("hide");
		    }
		    $("#editVehicleForm input[name=fuel_type]").val([vehicle.fuel_type]);
		    $("#editVehicleForm input[name=vehicle_vignette]").val([vehicle.vehicle_vignette]);
		    if (vehicle.permanent_reservation == 1){
		        $("#editVehicleForm input[name=permanent_reservation]").prop("checked", true);
		        $("#editVehicleOwnerDIV").show();
		        $("#editVehicleOwnerSelect").val(vehicle.owner_id).trigger("change");
		    }else{
				$("#editVehicleForm input[name=permanent_reservation]").prop("checked", false);
		        $("#editVehicleOwnerDIV").hide();
		        $("#editVehicleOwnerSelect").val("").trigger("change");
		    }
		    $("#vehiclePopupDIV, #editVehicleDIV").show();
		}
		
		function hideEditVehiclePopup(){
		    $("#vehiclePopupDIV, #editVehicleDIV").hide();
		    $("#editVehicleForm")[0].reset();
		}
		
		function showAssignVehiclePopup(){
		    $("#vehiclePopupDIV, #assignVehicleDIV").show();
		}
		
		function hideAssignVehiclePopup(){
			$("#assignVehicleForm")[0].reset();
		    $("#vehiclePopupDIV, #assignVehicleDIV").hide();
		}
		
		function deleteVehicle(row){
			var actualRow = $(row).parents('tr');
			if (actualRow.hasClass('child')) {//Check if the current row is a child row
				actualRow = actualRow.prev();//If it is, then point to the row before it (its 'parent')
			}
            var vehicle = dTable.row(actualRow).data();
            swal({
              title: 'Confirm action',
              text: "Are you sure you want to delete this vehicle?",
              type: 'error',
              showCancelButton: true,
              confirmButtonColor: '#3085d6',
              cancelButtonColor: '#d33',
              confirmButtonText: 'Yes, remove'
            }).then(function () {
                var values = { vehicle_id: vehicle.vehicle_id };
                $.ajax({
                    type: "POST",
                    url: "vehicles/delete",
                    data: values,
                    success: function(msg) {
                        if (msg == "") {
                            swal(
                                'Success!',
                                'Vehicle was successfully removed.',
                                'success'
                            );
                            makeCalendar();
                            getVehicles();
                        } else {
                            swal(
                                'Error!',
                                'The server encountered the following error: ' + msg,
                                'error'
                            );
                        }
                    }
                });
            });
        }
		
		
        
        function showNewEquipmentPopup(){
        
		    $("#equipmentPopupDIV, #addEquipmentDIV").show();
		}
		
		function hideNewEquipmentPopup(){
		    $("#equipmentPopupDIV, #addEquipmentDIV").hide();
		    $("#addEquipmentForm")[0].reset();
		}
		
		function showEditEquipmentPopup(row){
			var actualRow = $(row).parents('tr');
			if (actualRow.hasClass('child')) {//Check if the current row is a child row
				actualRow = actualRow.prev();//If it is, then point to the row before it (its 'parent')
			}
            var equipment = eTable.row(actualRow).data();
		    $("#editEquipmentIDInput").val(equipment.equipment_id);
		    $("#editEquipmentNameInput").val(equipment.equipment_name);
		    $("#editEquipmentCodeInput").val(equipment.equipment_code);
		    $("#editEquipmentDescriptionInput").html(equipment.equipment_description);
		    $("#editEquipmentCategoryInput").val(equipment.equipment_category);
			$("#editEquipmentForm input[name=contact_name]").val(equipment.contact_name);
			$("#editEquipmentForm input[name=contact_surname]").val(equipment.contact_surname);
			$("#editEquipmentForm input[name=contact_phone]").val(equipment.contact_phone);
		    $("#equipmentPopupDIV, #editEquipmentDIV").show();
		}
		
		function showEditEquipmentPopupID(equipment_id){
			var equipment;
			for (var i = 0; i < equipmentArray.length; i++){
				if (equipmentArray[i].equipment_id == equipment_id){
					equipment = equipmentArray[i];
					break;
				}
			}
			$("#editEquipmentIDInput").val(equipment.equipment_id);
		    $("#editEquipmentNameInput").val(equipment.equipment_name);
		    $("#editEquipmentCodeInput").val(equipment.equipment_code);
		    $("#editEquipmentDescriptionInput").html(equipment.equipment_description);
		    $("#editEquipmentCategoryInput").val(equipment.equipment_category);
			$("#editEquipmentForm input[name=contact_name]").val(equipment.contact_name);
			$("#editEquipmentForm input[name=contact_surname]").val(equipment.contact_surname);
			$("#editEquipmentForm input[name=contact_phone]").val(equipment.contact_phone);
		    $("#equipmentPopupDIV, #editEquipmentDIV").show();
		}
		
		function hideEditEquipmentPopup(){
		    $("#equipmentPopupDIV, #editEquipmentDIV").hide();
		    $("#editEquipmentForm")[0].reset();
		}
		
		function deleteEquipment(row){
			var actualRow = $(row).parents('tr');
			if (actualRow.hasClass('child')) {//Check if the current row is a child row
				actualRow = actualRow.prev();//If it is, then point to the row before it (its 'parent')
			}
            var equipment = eTable.row(actualRow).data();
            swal({
              title: 'Confirm action',
              text: "Are you sure you want to delete this equipment?",
              type: 'error',
              showCancelButton: true,
              confirmButtonColor: '#3085d6',
              cancelButtonColor: '#d33',
              confirmButtonText: 'Yes, remove'
            }).then(function () {
                var values = { equipment_id: equipment.equipment_id };
                $.ajax({
                    type: "POST",
                    url: "equipment/delete",
                    data: values,
                    success: function(msg) {
                        if (msg == "") {
                            swal(
                                'Success!',
                                'Equipment was successfully removed.',
                                'success'
                            );
                            getEquipment();
                        } else {
                            swal(
                                'Error!',
                                'The server encountered the following error: ' + msg,
                                'error'
                            );
                        }
                    }
                });
            });
        }
		
		function showAssignEquipmentPopup(){
		    $("#moveEquipmentEmployeeSelect").val(loggedEmployee).trigger("change");;
		    $("#equipmentPopupDIV, #assignEquipmentDIV").show();
		}
		
		function hideAssignEquipmentPopup(){
			$("#assignEquipmentForm")[0].reset();
		    $("#equipmentPopupDIV, #assignEquipmentDIV").hide();
		}
		
		
		function showNewPlacePopup(){
		    $("#placesPopupDIV, #addPlaceDIV").show();
		}
		
		function hideNewPlacePopup(){
		    $("#placesPopupDIV, #addPlaceDIV").hide();
		    $("#addPlaceForm")[0].reset();
		}
		
		function showEditPlacePopup(row){
			var actualRow = $(row).parents('tr');
			if (actualRow.hasClass('child')) {//Check if the current row is a child row
				actualRow = actualRow.prev();//If it is, then point to the row before it (its 'parent')
			}
            var place = pTable.row(actualRow).data();
		    $("#editPlaceIDInput").val(place.place_id);
		    $("#editPlaceNameInput").val(place.place_name);
		    $("#editPlaceRoomInput").val(place.place_room);
		    $("#editPlaceFloorInput").val(place.place_floor);
		    $("#editPlaceDescriptionInput").html(place.place_description);
		    $("#editPlaceAddressInput").val(place.place_address);
		    $("#hiddenEditPlaceLatitudeInput").val(place.latitude);
		    $("#hiddenEditPlaceLongitudeInput").val(place.longitude);
			$("#editPlaceForm input[name=contact_name]").val(place.contact_name);
			$("#editPlaceForm input[name=contact_surname]").val(place.contact_surname);
			$("#editPlaceForm input[name=contact_phone]").val(place.contact_phone);
		    $("#placesPopupDIV, #editPlaceDIV").show();
		}
		
		function showEditPlacePopupID(place_id){
			var place;
			for (var i = 0; i < placesArray.length; i++){
				if (placesArray[i].place_id == place_id){
					place = placesArray[i];
					break;
				}
			}
			$("#editPlaceIDInput").val(place.place_id);
		    $("#editPlaceNameInput").val(place.place_name);
		    $("#editPlaceRoomInput").val(place.place_room);
		    $("#editPlaceFloorInput").val(place.place_floor);
		    $("#editPlaceDescriptionInput").html(place.place_description);
		    $("#editPlaceAddressInput").val(place.place_address);
		    $("#hiddenEditPlaceLatitudeInput").val(place.latitude);
		    $("#hiddenEditPlaceLongitudeInput").val(place.longitude);
			$("#editPlaceForm input[name=contact_name]").val(place.contact_name);
			$("#editPlaceForm input[name=contact_surname]").val(place.contact_surname);
			$("#editPlaceForm input[name=contact_phone]").val(place.contact_phone);
		    $("#placesPopupDIV, #editPlaceDIV").show();
		}
		
		function hideEditPlacePopup(){
		    $("#placesPopupDIV, #editPlaceDIV").hide();
		    $("#editPlaceForm")[0].reset();
		}
		
		function deletePlace(row){
			var actualRow = $(row).parents('tr');
			if (actualRow.hasClass('child')) {//Check if the current row is a child row
				actualRow = actualRow.prev();//If it is, then point to the row before it (its 'parent')
			}
            var place = pTable.row(actualRow).data();
            swal({
              title: 'Confirm action',
              text: "Are you sure you want to delete this place?",
              type: 'error',
              showCancelButton: true,
              confirmButtonColor: '#3085d6',
              cancelButtonColor: '#d33',
              confirmButtonText: 'Yes, remove'
            }).then(function () {
                var values = { place_id: place.place_id };
                $.ajax({
                    type: "POST",
                    url: "places/delete",
                    data: values,
                    success: function(msg) {
                        if (msg == "") {
                            swal(
                                'Success!',
                                'Place was successfully removed.',
                                'success'
                            );
                            getPlaces();
                        } else {
                            swal(
                                'Error!',
                                'The server encountered the following error: ' + msg,
                                'error'
                            );
                        }
                    }
                });
            });
        }
		
		
		function showAssignPlacePopup(){
		    $("#movePlaceEmployeeSelect").val(loggedEmployee).trigger("change");;
		    $("#placesPopupDIV, #assignPlaceDIV").show();
		}
		
		function hideAssignPlacePopup(){
			$("#assignPlaceForm")[0].reset();
		    $("#placesPopupDIV, #assignPlaceDIV").hide();
		}
		
		
		function showNewOtherAssetPopup(){
		    $("#otherAssetsPopupDIV, #addOtherAssetDIV").show();
		}
		
		function hideNewOtherAssetPopup(){
		    $("#otherAssetsPopupDIV, #addOtherAssetDIV").hide();
		    $("#addOtherAssetForm")[0].reset();
		}
		
		function showEditOtherAssetPopup(row){
			var actualRow = $(row).parents('tr');
			if (actualRow.hasClass('child')) {//Check if the current row is a child row
				actualRow = actualRow.prev();//If it is, then point to the row before it (its 'parent')
			}
            var asset = oTable.row(actualRow).data();
		    $("#editOtherAssetIDInput").val(asset.asset_id);
		    $("#editOtherAssetNameInput").val(asset.asset_name);
		    $("#editOtherAssetDescriptionInput").html(asset.asset_description);
			$("#editOtherAssetAddressInput").val(asset.asset_location);
			$("#editOtherAssetLatitudeInput").val(asset.latitude);
			$("#editOtherAssetLongitudeInput").val(asset.longitude);
			$("#editOtherAssetForm input[name=contact_name]").val(asset.contact_name);
			$("#editOtherAssetForm input[name=contact_surname]").val(asset.contact_surname);
			$("#editOtherAssetForm input[name=contact_phone]").val(asset.contact_phone);
		    $("#otherAssetsPopupDIV, #editOtherAssetDIV").show();
		}
		
		function showEditOtherAssetPopupID(asset_id){
			var asset;
			for (var i = 0; i < otherAssetsArray.length; i++){
				if (otherAssetsArray[i].asset_id == asset_id){
					asset = otherAssetsArray[i];
					break;
				}
			}
			$("#editOtherAssetIDInput").val(asset.asset_id);
		    $("#editOtherAssetNameInput").val(asset.asset_name);
		    $("#editOtherAssetDescriptionInput").html(asset.asset_description);
			$("#editOtherAssetAddressInput").val(asset.asset_location);
			$("#editOtherAssetLatitudeInput").val(asset.latitude);
			$("#editOtherAssetLongitudeInput").val(asset.longitude);
			$("#editOtherAssetForm input[name=contact_name]").val(asset.contact_name);
			$("#editOtherAssetForm input[name=contact_surname]").val(asset.contact_surname);
			$("#editOtherAssetForm input[name=contact_phone]").val(asset.contact_phone);
		    $("#otherAssetsPopupDIV, #editOtherAssetDIV").show();
		}
		
		function hideEditOtherAssetPopup(){
		    $("#otherAssetPopupDIV, #editOtherAssetDIV").hide();
		    $("#editOtherAssetForm")[0].reset();
		}
		
		function deleteOtherAsset(row){
			var actualRow = $(row).parents('tr');
			if (actualRow.hasClass('child')) {//Check if the current row is a child row
				actualRow = actualRow.prev();//If it is, then point to the row before it (its 'parent')
			}
            var asset = oTable.row(actualRow).data();
            swal({
              title: 'Confirm action',
              text: "Are you sure you want to delete this asset?",
              type: 'error',
              showCancelButton: true,
              confirmButtonColor: '#3085d6',
              cancelButtonColor: '#d33',
              confirmButtonText: 'Yes, remove'
            }).then(function () {
                var values = { asset_id: asset.asset_id };
                console.log(values);
                $.ajax({
                    type: "POST",
                    url: "otherassets/delete",
                    data: values,
                    success: function(msg) {
                        if (msg == "") {
                            swal(
                                'Success!',
                                'Asset was successfully removed.',
                                'success'
                            );
                            getOtherAssets();
                        } else {
                            swal(
                                'Error!',
                                'The server encountered the following error: ' + msg,
                                'error'
                            );
                        }
                    }
                });
            });
        }
		
		function showAssignOtherAssetPopup(){
		    $("#moveOtherAssetEmployeeSelect").val(loggedEmployee).trigger("change");
		    $("#otherAssetsPopupDIV, #assignOtherAssetDIV").show();
		}
		
		function hideAssignOtherAssetPopup(){
			$("#assignOtherAssetForm")[0].reset();
		    $("#otherAssetsPopupDIV, #assignOtherAssetDIV").hide();
		}
		
        
        function updateVehicleStatus(vehicle_id, employee_id, start_date, end_date){
            var postData = { "vehicle_id": vehicle_id, "employee_id": employee_id, "start_date": start_date, "end_date": end_date };
            $.ajax({
                type: "POST",
                url: "<?= BASE_URL ?>" + "vehicles/employee",
                data: postData,
                success: function(msg) {
                    console.log(msg);
                    makeCalendar();
                    console.log("Making calendar");
                }
            });
        }
        
        function updateEquipmentStatus(equipment_id, employee_id, start_date, end_date){
            var postData = { "equipment_id": equipment_id, "employee_id": employee_id, "start_date": start_date, "end_date": end_date };
            $.ajax({
                type: "POST",
                url: "<?= BASE_URL ?>" + "equipment/employee",
                data: postData,
                success: function(msg) {
                    console.log(msg);
                    makeCalendar();
                }
            });
        }
        
        function updatePlaceStatus(place_id, employee_id, start_date, end_date){
            var postData = { "place_id": place_id, "employee_id": employee_id, "start_date": start_date, "end_date": end_date };
            $.ajax({
                type: "POST",
                url: "<?= BASE_URL ?>" + "places/employee",
                data: postData,
                success: function(msg) {
                    console.log(msg);
                    makeCalendar();
                }
            });
        }
        
        function updateOtherAssetStatus(asset_id, employee_id, start_date, end_date){
            var postData = { "asset_id": asset_id, "employee_id": employee_id, "start_date": start_date, "end_date": end_date };
            $.ajax({
                type: "POST",
                url: "<?= BASE_URL ?>" + "otherassets/employee",
                data: postData,
                success: function(msg) {
                    console.log(msg);
                    makeCalendar();
                }
            });
        }
        
        function showAssetsByType(div, type){
            $(".fc-active").removeClass("fc-active");
            $(div).addClass("fc-active");
            var events = $("#calendar").fullCalendar("clientEvents");
            if (type != 0){ //1 is vehicle, 2 is equipment, 3 is place, 4 is other
                for (var i = 0; i < events.length; i++){
                    var event = events[i];
                    if (event.type == type){
                        event.display = true;
                    }else{
                        event.display = false;
                    }
                }
            }else{ //show all events
                for (var i = 0; i < events.length; i++){
                    var event = events[i];
                    event.display = true;
                }
            }
            $('#calendar').fullCalendar('updateEvents', events);
        }
		
		function getMenuStatistics(employee_id) {
            var postData = { "employee_id": employee_id };
        
            $.ajax({
                type: "POST",
                url: "<?= BASE_URL ?>" + "event/getToday",
                data: postData,
                dataType: "json",
                success: function(events) {
                    var unfinished = 0;
                    for (var i = 0; i < events.length; i++){
                        if (events[i].status == 0 || events[i].status == 1 || events[i].status == 2){
                            unfinished++;
                        }
                    }
                    if (unfinished > 0){
                        $("#eventLink").html("Events <span class='label label-theme m-l-5'>" + unfinished + "</span>");
                        $("#eventSpan").html("Activities <span class='label label-danger m-l-5'>PENDING</span>");
                    }
                }
            });
            $.ajax({
                type: "POST",
                url: "<?= BASE_URL ?>" + "reminders/getToday",
                data: postData,
                dataType: "json",
                success: function(reminders) {
                    var unfinished = 0;
                    for (var i = 0; i < reminders.length; i++){
                        if (reminders[i].reminder_active == 1){
                            unfinished++;
                        }
                    }
                    if (unfinished > 0){
                        $("#reminderLink").html("Reminders <span class='label label-theme m-l-5'>" + unfinished + "</span>");
                        $("#eventSpan").html("Activities <span class='label label-danger m-l-5'>PENDING</span>");
                    }
                    
                }
            });
        }
		
		
        
        
	</script>
	<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyByTQPUumUXa7XiemK1liQCKT3839oj7DE&callback=initMap&language=en&libraries=places"></script>
</body>
</html>
