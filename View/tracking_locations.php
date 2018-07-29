<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
<!--<![endif]-->
<head>
	<meta charset="utf-8" />
	<title>Basic tracking</title>
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
	<link href="<?= ASSETS_URL . "fullcalendar/fullcalendar.print.css" ?>" rel="stylesheet" media="print" />
	<link href="<?= ASSETS_URL . "fullcalendar/fullcalendar.min.css" ?>" rel="stylesheet" />
    <link href="<?= ASSETS_URL . "gritter/css/jquery.gritter.css" ?>" rel="stylesheet" />
    <link href="<?= ASSETS_URL . "morris/morris.css" ?>" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.6.9/sweetalert2.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.6.9/sweetalert2.min.css">
    <link href="<?= ASSETS_URL . "select2/dist/css/select2.css" ?>" rel="stylesheet" />
    <link href="<?= ASSETS_URL . "morris/morris.css" ?>" rel="stylesheet" />

	<!-- ================== END PAGE LEVEL STYLE ================== -->
	
	<!-- ================== BEGIN BASE JS ================== -->
	<script src="<?= ASSETS_URL . "pace/pace.min.js" ?>" ></script>
	<!-- ================== END BASE JS ================== -->
</head>
<style>
    #addLocationDIV, #editLocationDIV, #addNFCDIV, #editNFCDIV, #mapDIV{
        width: 700px;
        height: auto;
        position: relative;
        margin: 10% auto 0px auto;
    }
	
	#popupMap{
        width: 100%;
        height: 500px;
    }
    
    .tab-content {
        padding: 5px 0px 0px 0px;
        margin-bottom: 20px;
        background: none;
        -webkit-border-radius: 3px;
        -moz-border-radius: 3px;
        border-radius: 3px;
    }
    
    .width-80{
        width: 80%;
    }
    
    #logTable, #worklocationsTable, #recurringWorklocationsTable, #nfcTable{
        width: 100% !important;
    }
	
	#logTable td:last-child, #worklocationsTable td:last-child, #recurringWorklocationsTable td:last-child, #nfcTable td:last-child{
		min-width: 80px;
	}
    
    .activeBG a{
        background: #00acac !important;
        color: white !important;
    }
    
    .pointer{
        cursor: pointer;
    }
	
	/* Mouse-over effects */
    .slider:hover {
        opacity: 1; /* Fully shown on mouse-over */
    }
    
    .slider {
        -webkit-appearance: none;
        width: 100%;
        height: 12px;
        border-radius: 5px;   
        background: #d3d3d3;
        outline: none;
        opacity: 0.7;
        -webkit-transition: .2s;
        transition: opacity .2s;
    }
    
    .slider::-webkit-slider-thumb {
        -webkit-appearance: none;
        appearance: none;
        width: 20px;
        height: 20px;
        border-radius: 50%; 
        background: #007aff;
        cursor: pointer;
    }
    
    .slider::-moz-range-thumb {
        width: 20px;
        height: 20px;
        border-radius: 50%;
        background: #007aff;
        cursor: pointer;
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
								echo '<li>
									<a href="' . BASE_URL . 'assets">
										<i class="fas fa-database"></i>
										<span>Assets</span>
									</a>
								</li>';
							}
							if (in_array(4, $_SESSION["menuitems"])){
								echo '<li class="active">
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
			
			<div class="profile">
				<div class="profile-header profile-header-no-image">
					<!-- BEGIN profile-header-cover -->
					<div class="profile-header-cover"></div>
					<!-- END profile-header-cover -->
					<!-- BEGIN profile-header-content -->
					<div class="profile-header-content">
						<!-- BEGIN profile-header-info -->
						<div class="profile-header-info">
							<h4 class="m-t-10 m-b-5">Basic tracking</h4>
							<div class="m-t-10">
								<button class="btn btn-white btn-sm" onClick="showAddLocationPopup()"><i class="fas fa-plus text-primary"></i> Add a location</button>
							</div>
						</div>
						<!-- END profile-header-info -->
					</div>
					<!-- END profile-header-content -->
					<ul class="profile-header-tab nav nav-tabs">
						<li class="nav-item active"><a href="#general-view" class="nav-link" data-toggle="tab">OVERVIEW</a></li>
						<li class="nav-item"><a href="#calendar-view" class="nav-link" data-toggle="tab">CALENDAR</a></li>
						<li class="nav-item"><a href="#nfc-view" class="nav-link" data-toggle="tab">NFC TAGS</a></li>
						<li class="nav-item"><a href="#report-view" class="nav-link" data-toggle="tab">REPORTS</a></li>
						<li class="nav-item"><a href="#terms-view" class="nav-link" data-toggle="tab">TERMS OF USE</a></li>
					</ul>
				</div>
			</div>
			<!-- end profile -->
			<div class="profile-content">
				<div class="tab-content">
					<div class="tab-pane fade in active" id="general-view">
						<div class="row">
							<div class="col-md-12">
								<div class="width-sm pull-left">
									<label>Date from:</label>
									<input id="workLocationFromDateInput" type="text" class="form-control" placeholder="Choose from date" onChange="locationDateChanged()" />
								</div>
								<div class="width-sm pull-left m-l-10">
									<label>Date to:</label>
									<input id="workLocationToDateInput" type="text" class="form-control" placeholder="Choose to date" onChange="locationDateChanged()" />
								</div>
								<div class="clearfix"></div>
								<div class="panel panel-primary m-t-25">
									<div class="panel-heading">
										<div class="panel-heading-btn">
											<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
											<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
											<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
										</div>
										<h4 class="panel-title">Non recurring</h4>
									</div>
									<div class="panel-body">
										<div class="dataTables_wrapper form-inline dt-bootstrap no-footer">
											<table id="worklocationsTable" class="table table-striped">
												<thead>
													<tr>
														<th>Customer name</th>
														<th>Address</th>
														<th>Date</th>
														<th>Duration</th>
														<th>Assigned to</th>
														<th>Added by</th>
														<th>Priority</th>
														<th>Created on</th>
														<th></th>
													</tr>
												</thead>
												<tbody>
					
												</tbody>
											</table>
										</div>
									</div>
								</div>
								<div class="panel panel-primary m-t-25">
									<div class="panel-heading">
										<div class="panel-heading-btn">
											<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
											<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
											<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
										</div>
										<h4 class="panel-title">Recurring</h4>
									</div>
									<div class="panel-body">
										<div class="dataTables_wrapper form-inline dt-bootstrap no-footer">
											<table id="recurringWorklocationsTable" class="table table-striped">
												<thead>
													<tr>
														<th>Customer name</th>
														<th>Address</th>
														<th>Occurs on</th>
														<th>Estimated duration</th>
														<th>Assigned to</th>
														<th>Added by</th>
														<th>Priority</th>
														<th>Created on</th>
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
					<div class="tab-pane fade in" id="calendar-view">
						<div class="vertical-box-column p-r-30 d-none d-lg-table-cell width230">
							<div id="calendarEmployeeDIV" class="m-b-15" hidden>
								<select id="addCalendarEmployeeSelect" class="form-control">
									<option value="">View events for...</option>
								</select>
							</div>
							<div id="external-events" class="fc-event-list">
								<div id="calendarFilters">
												   
								</div>
								<hr class="bg-grey-lighter m-b-15">
								<h5 class="m-t-0 m-b-15">Legend</h5>
								<div class="fc-event"><div class="fc-event-icon"><i class="fa fa-circle fa-fw text-danger"></i></div>Not visited</div>
								<div class="fc-event"><div class="fc-event-icon"><i class="fa fa-circle fa-fw text-success"></i></div>Visited</div>
								<div class="fc-event"><div class="fc-event-icon"><i class="fa fa-circle fa-fw text-primary"></i></div>Recurring</div>
							</div>
						</div>
						<div id="calendar" class="vertical-box-column p-15 calendar">
							
						</div>
					</div>
					<div class="tab-pane fade in" id="nfc-view">
						<button class="btn btn-primary" onClick="showAddNFCPopup()">Add a NFC tag</button>
						<div class="row">
							<div class="col-md-12">
								<div class="panel panel-primary m-t-25">
									<div class="panel-heading">
										<div class="panel-heading-btn">
											<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
											<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
											<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
										</div>
										<h4 class="panel-title">NFC Tags</h4>
									</div>
									<div class="panel-body">
										<div class="dataTables_wrapper form-inline dt-bootstrap no-footer">
											<table id="nfcTable" class="table table-striped">
												<thead>
													<tr>
														<th>Tag</th>
														<th>Content</th>
														<th>Customer</th>
														<th>Notes</th>
														<th>Created on</th>
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
					<div class="tab-pane fade in" id="report-view">
						<div class="row">
							<div class="col-md-12">
								<div id="map" class="height-md width-full">
				
								</div>
							</div>
							<div class="col-md-12">
								<div class="wrapper bg-silver-lighter">
									<!-- begin btn-toolbar -->
									<div class="btn-toolbar">
										<div class="width-sm pull-left">
											<label>From date:</label>
											<input type="text" id="logFromDateInput" class="form-control" onChange="logDateChanged()" />        
										</div>
										<div class="width-sm pull-left m-l-15">
											<label>To date:</label>
											<input type="text" id="logToDateInput" class="form-control" onChange="logDateChanged()" />
										</div>
									</div>
									<!-- end btn-toolbar -->
								</div>
								<div class="p-t-15 p-l-15 p-r-15 p-b-40 bg-white">
									
									<div class="bg-silver">
										
									</div>
									<div class="clearfix"></div>
									<table id="logTable" class="table table-striped">
										<thead>
											<tr>
												<th>Check-in type</th>
												<th>Customer name</th>
												<th>Address</th>
												<th>Employee</th>
												<th>NFC Tag</th>
												<th>Arrival date</th>
												<th>Departure date</th>
											</tr>
										</thead>
										<tbody>
						
										</tbody>
									</table>
								</div>
							</div>
						</div>
					</div>
					<div class="tab-pane fade in" id="terms-view">
						<div class="bg-white p-15">
							<h4>Terms of use<br><small>bTrack tracking application</small></h4>
							<form id="editTermsForm" action="setting/trackingterms" method="post" class="form-horizontal">
								<div class="form-group">
									<div class="col-md-6">
										<textarea id="termsInput" class="form-control" name="terms" rows="6" placeholder="Enter terms of use"></textarea>
									</div>
								</div>
								<button class="btn material success">Save terms</button>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="popupContainer" id="addNFCPopup" hidden>
		    <div class="panel panel-primary" id="addNFCDIV" hidden>
                <div class="panel-heading">
                    <div class="panel-heading-btn">
                        <button onclick="hideAddNFCPopup()" class="btn btn-xs btn-icon btn-circle btn-default"><i class="fa fa-times"></i></button>
                    </div>
                    <h4 class="panel-title">Add a NFC tag</h4>
                </div>
                <div class="panel-body">
                    <form id="addNFCForm" action="nfc/add" method="post" class="form-horizontal">
                        <div class="form-group">
							<div class="col-md-12">
								<label>Tag ID:</label>
								<input type="text" class="form-control" placeholder="NFC Tag ID" name="tag" required />
							</div>
						</div>
						<div class="form-group">
							<div class="col-md-12">
								<label>Content - location:</label>
								<input type="text" class="form-control" placeholder="NFC Content" name="content" required />
							</div>
						</div>
						<div class="form-group">
							<div class="col-md-12">
								<label>Customer:</label>
								<select id="NFCCustomerSelect" class="form-control" name="customer_id" required>
								
								</select>
							</div>
						</div>
						<div class="form-group">
							<div class="col-md-12">
								<label>Notes:</label>
								<textarea class="form-control" rows="4" placeholder="Enter any notes here" name="notes"></textarea>
							</div>
						</div>
						<button class="btn btn-success">Add NFC tag</button>
						<button type="button" onClick="hideAddNFCPopup()" class="btn btn-danger pull-right">Close</button>
                    </form>
                </div>
            </div>
			<div class="panel panel-primary" id="editNFCDIV" hidden>
                <div class="panel-heading">
                    <div class="panel-heading-btn">
                        <button onclick="hideEditNFCPopup()" class="btn btn-xs btn-icon btn-circle btn-default"><i class="fa fa-times"></i></button>
                    </div>
                    <h4 class="panel-title">Edit NFC tag</h4>
                </div>
                <div class="panel-body">
                    <form id="editNFCForm" action="nfc/edit" method="post" class="form-horizontal">
						<input id="hiddenEditNFCIDInput" type="hidden" name="nfc_id" />
                        <div class="form-group">
							<div class="col-md-12">
								<label>Tag ID:</label>
								<input id="editNFCTagInput" type="text" class="form-control" placeholder="NFC Tag ID" name="tag" required />
							</div>
						</div>
						<div class="form-group">
							<div class="col-md-12">
								<label>Content - location:</label>
								<input id="editNFCContentInput" type="text" class="form-control" placeholder="NFC Content" name="content" required />
							</div>
						</div>
						<div class="form-group">
							<div class="col-md-12">
								<label>Customer:</label>
								<select id="editNFCCustomerSelect" class="form-control" name="customer_id" required>
								
								</select>
							</div>
						</div>
						<div class="form-group">
							<div class="col-md-12">
								<label>Notes:</label>
								<textarea id="editNFCNotesInput" class="form-control" rows="4" placeholder="Enter any notes here" name="notes"></textarea>
							</div>
						</div>
						<button class="btn btn-success">Edit NFC tag</button>
						<button type="button" onClick="hideEditNFCPopup()" class="btn btn-danger pull-right">Close</button>
                    </form>
                </div>
            </div>
		</div>
		<div class="popupContainer" id="addLocationPopup" hidden>
		    <div class="panel panel-primary" id="addLocationDIV" hidden>
                <div class="panel-heading">
                    <div class="panel-heading-btn">
                        <button onclick="hideAddLocationPopup()" class="btn btn-xs btn-icon btn-circle btn-default"><i class="fa fa-times"></i></button>
                    </div>
                    <h4 class="panel-title">Add a location</h4>
                </div>
                <div class="panel-body">
                    <form id="addLocationForm" action="worklocations/add" method="post" class="form-horizontal">
                        <input type="hidden" name="latitude" id="latitudeInput" />
                        <input type="hidden" name="longitude" id="longitudeInput" />
						<div class="form-group">
							<div class="col-md-12">
								<label>Recurring: </label><br/>
								<div class="radio radio-css radio-inline radio-primary">
									<input type="radio" name="recurring" id="ms1" value="0" checked>
									<label for="ms1">
										No
									</label>
								</div>
								<div class="radio radio-css radio-inline radio-primary">
									<input type="radio" name="recurring" id="ms2" value="1">
									<label for="ms2">
										Yes
									</label>
								</div>
							</div>
						</div>
						<div class="form-group">
							<div class="col-md-12">
								<label>Priority:</label>
								<input id="locationPriorityInput" type="range" min="1" max="10" value="5" class="slider" name="priority" onInput="updateRangeValue()">
                                <label id="locationPriorityValue" style="margin-top: 3px;">5</label>
							</div>
						</div>
                        <div class="form-group">
                            <div class="col-md-12">
                                <label>Customer</label>
                                <select id="customerSelect" class="form-control" name="customer_id" required>

                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-12">
                                <label>Employees</label>
                                <select id="employeeSelect" class="form-control" name="participants[]" required multiple>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-6" id="dateDIV">
                                <label>Date</label>
								<div class="input-group location-date-picker">
									<input id="dateInput" type="text" class="form-control" name="date" placeholder="Choose a date" />
									<span class="input-group-addon btn bg-primary">
										<span class="fa fa-calendar text-white"></span>
									</span>                    
								</div>
                            </div>
							<div class="col-md-6" id="repeatDIV" hidden>
								<label>Repeat on</label>
								<select id="repeatOnSelect" class="form-control" name="repeat_on[]" multiple>
									<option value="0">Monday</option>
									<option value="1">Tuesday</option>
									<option value="2">Wednesday</option>
									<option value="3">Thursday</option>
									<option value="4">Friday</option>
									<option value="5">Saturday</option>
									<option value="6">Sunday</option>
								</select>
							</div>
							<div class="col-md-3">
								<label>Estimated start: <span class="text-danger">*</span></label>
								<div class="input-group location-time-picker">
									<input id="startTimeInput" type="text" class="form-control" name="start_time" placeholder="Start time" required />
									<span class="input-group-addon btn bg-primary">
										<span class="fa fa-clock text-white"></span>
									</span>                    
								</div>
							</div>
							<div class="col-md-3">
								<label>Estimated end: <span class="text-danger">*</span></label>
								<div class="input-group location-time-picker">
									<input id="endTimeInput" type="text" class="form-control" name="end_time" placeholder="End time" required />
									<span class="input-group-addon btn bg-primary">
										<span class="fa fa-clock text-white"></span>
									</span>                    
								</div>
							</div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-12">
                                <label>Address</label>
                                <input id="addressInput" type="text" name="address" class="form-control" placeholder="Enter an address" required />
                            </div>
                        </div>
                        <button id="addLocationBtn" class="btn material primary">Add location</button>
                    </form>
                </div>
            </div>
            <div class="panel panel-primary" id="editLocationDIV" hidden>
                <div class="panel-heading">
                    <div class="panel-heading-btn">
                        <button onclick="hideEditLocationPopup()" class="btn btn-xs btn-icon btn-circle btn-default"><i class="fa fa-times"></i></button>
                    </div>
                    <h4 class="panel-title">Edit a location</h4>
                </div>
                <div class="panel-body">
                    <form id="editLocationForm" action="worklocations/edit" method="post" class="form-horizontal">
                        <input type="hidden" name="latitude" id="editLatitudeInput" />
                        <input type="hidden" name="longitude" id="editLongitudeInput" />
                        <input type="hidden" name="location_id" id="editLocationIDInput" />
						<div class="form-group">
							<div class="col-md-12">
								<label>Recurring: </label><br/>
								<div class="radio radio-css radio-inline radio-primary">
									<input type="radio" name="recurring" id="ems1" value="0">
									<label for="ems1">
										No
									</label>
								</div>
								<div class="radio radio-css radio-inline radio-primary">
									<input type="radio" name="recurring" id="ems2" value="1">
									<label for="ems2">
										Yes
									</label>
								</div>
							</div>
						</div>
						<div class="form-group">
							<div class="col-md-12">
								<label>Priority:</label>
								<input id="editLocationPriorityInput" type="range" min="1" max="10" value="5" class="slider" name="priority" onInput="updateEditRangeValue()">
                                <label id="editLocationPriorityValue" style="margin-top: 3px;">5</label>
							</div>
						</div>
                        <div class="form-group">
                            <div class="col-md-12">
                                <label>Customer</label>
                                <select id="editCustomerSelect" class="form-control" name="customer_id" required>

                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-12">
                                <label>Employees</label>
                                <select id="editEmployeeSelect" class="form-control" name="participants[]" required multiple>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-6" id="editDateDIV">
                                <label>Date</label>
								<div class="input-group location-date-picker">
									<input id="editDateInput" type="text" class="form-control" name="date" placeholder="Choose a date" required />
									<span class="input-group-addon btn bg-primary">
										<span class="fa fa-calendar text-white"></span>
									</span>                    
								</div>
                            </div>
							<div class="col-md-6" id="editRepeatDIV" hidden>
								<label>Repeat on</label>
								<select id="editRepeatOnSelect" class="form-control" name="repeat_on[]" multiple>
									<option value="0">Monday</option>
									<option value="1">Tuesday</option>
									<option value="2">Wednesday</option>
									<option value="3">Thursday</option>
									<option value="4">Friday</option>
									<option value="5">Saturday</option>
									<option value="6">Sunday</option>
								</select>
							</div>
							<div class="col-md-3">
								<label>Estimated start: <span class="text-danger">*</span></label>
								<div class="input-group location-time-picker">
									<input id="editStartTimeInput" type="text" class="form-control" name="start_time" placeholder="Start time" required />
									<span class="input-group-addon btn bg-primary">
										<span class="fa fa-clock text-white"></span>
									</span>                    
								</div>
							</div>
							<div class="col-md-3">
								<label>Estimated end: <span class="text-danger">*</span></label>
								<div class="input-group location-time-picker">
									<input id="editEndTimeInput" type="text" class="form-control" name="end_time" placeholder="End time" required />
									<span class="input-group-addon btn bg-primary">
										<span class="fa fa-clock text-white"></span>
									</span>                    
								</div>
							</div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-12">
                                <label>Address</label>
                                <input id="editAddressInput" type="text" name="address" class="form-control" required />
                            </div>
                        </div>
                        <button class="btn material primary">Edit location</button>
                    </form>
                </div>
            </div>
		</div>
		<div class="popupContainer" id="mapPopup" hidden>
                <div class="panel panel-primary" id="mapDIV" hidden>
                        <div class="panel-heading">
                            <div class="panel-heading-btn">
                                <button onclick="hideMapPopup()" class="btn btn-xs btn-icon btn-circle btn-default"><i class="fa fa-times"></i>
                                </button>
                            </div>
                            <h4 class="panel-title">View location</h4>
                        </div>
                        <div class="panel-body p-0">
                            <div id="popupMap">
                                
                            </div>
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
	<script src="<?= ASSETS_URL . "select2/dist/js/select2.full.min.js" ?>"></script>
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
	<script src="<?= ASSETS_URL . "morris/raphael.min.js" ?>"></script>
    <script src="<?= ASSETS_URL . "morris/morris.js" ?>"></script>
	<script src="<?= ASSETS_URL . "fullcalendar/lib/moment.min.js" ?>"></script>
	<script src="<?= ASSETS_URL . "fullcalendar/fullcalendar.min.js" ?>"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/js/bootstrap-datetimepicker.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/css/bootstrap-datetimepicker.min.css" rel="stylesheet"/>
	<!-- ================== END PAGE LEVEL JS ================== -->
	
	<script>
	    var loggedEmployee = <?php echo json_encode($_SESSION["id"]); ?>;
		var isAdmin = <?php echo json_encode($_SESSION["admin"]); ?>;
		var dateformat = <?php echo json_encode($_SESSION["dateformat"]); ?>;
		var timeformat = <?php echo json_encode($_SESSION["timeformat"]); ?>;
		
		var dpFormat;
		
	    var dTable;
		var bTable;
	    var lTable;
		var nTable;
	    var customersArray;
	    var employeeArray;
	    var map;
	    var markerArray = [];
	    var firstPageLoad = true;
	    var firstLoad = true;
		
		var pMap;
		var mapMarker;
		
		var currentLocation;
		
		var eventArray = [];
		
		var selectedEmployee = loggedEmployee;
	    
		var daysOfWeek = ["Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday", "Sunday"];
	    
	    $(document).ready(function() {
			getMenuStatistics(loggedEmployee);
			
			dpFormat = dateformat.replace("YYYY", "YY");
			dpFormat = dpFormat.toLowerCase();
			
			$("#employeeSelect, #editEmployeeSelect, #customerSelect, #editCustomerSelect, #repeatOnSelect, #editRepeatOnSelect, #NFCCustomerSelect, #editNFCCustomerSelect").select2({width: "100%"});
			$("#logFromDateInput, #logToDateInput, #workLocationFromDateInput, #workLocationToDateInput").datepicker({dateFormat: dpFormat});
			$("#logFromDateInput, #logToDateInput, #workLocationFromDateInput, #workLocationToDateInput").datepicker('setDate', new Date());
			$(".location-date-picker").datetimepicker({widgetPositioning:{
                                horizontal: 'right',
                                vertical: 'top'
            }, format: dateformat, allowInputToggle: true });
			$(".location-time-picker").datetimepicker({widgetPositioning:{
                                horizontal: 'right',
                                vertical: 'top'
            },format: timeformat, stepping:5, "defaultDate": moment().add(1, "hours"), allowInputToggle: true });

			getCustomers();
			getEmployees();
			getSettings();
			getNFC();
			
			$('a[href="#report-view"]').on('shown.bs.tab', function(e){
                google.maps.event.trigger(map, 'resize');
                if (firstLoad){
                    var todaysDate = moment().format("YYYY-MM-DD");
                    getLogs(todaysDate, todaysDate);
                    firstLoad = false;
                }
            });
			
			$('a[href="#calendar-view"]').on('shown.bs.tab', function(e){
                $('#calendar').fullCalendar('render');
            });
			
			$("#addLocationForm input[name=recurring]").on("change", function(){
				var selected = $("#addLocationForm input[name=recurring]:checked").val();
				if (selected == 0){
					$("#dateInput").prop("required", true);
					$("#dateDIV").show();
					$("#repeatDIV").hide();
				}else{
					$("#dateInput").prop("required", false);
					$("#dateDIV").hide();
					$("#repeatDIV").show();
				}
			});
			
			$("#editLocationForm input[name=recurring]").on("change", function(){
				var selected = $("#editLocationForm input[name=recurring]:checked").val();
				if (selected == 0){
					$("#editDateInput").prop("required", true);
					$("#editDateDIV").show();
					$("#editRepeatDIV").hide();
				}else{
					$("#editDateInput").prop("required", false);
					$("#editDateDIV").hide();
					$("#editRepeatDIV").show();
				}
			});
			
			$('#addLocationForm').on('submit', function(e) { //use on if jQuery 1.7+
                e.preventDefault();
                    $.ajax({
                        type: "POST",
                        url: "worklocations/add",
                        data: $("#addLocationForm").serialize(),
                        success: function(msg) {
                            if (msg == "") {
                                swal(
                                    'Success!',
                                    'Location was successfully added.',
                                    'success'
                                );
                                $("#addLocationForm")[0].reset();
                                getLocations(moment($("#workLocationFromDateInput").val(), dateformat).format("YYYY-MM-DD"), moment($("#workLocationToDateInput").val(), dateformat).format("YYYY-MM-DD"));
                                hideAddLocationPopup();
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
            
            $('#editLocationForm').on('submit', function(e) { //use on if jQuery 1.7+
                e.preventDefault();
                    $.ajax({
                        type: "POST",
                        url: "worklocations/edit",
                        data: $("#editLocationForm").serialize(),
                        success: function(msg) {
                            if (msg == "") {
                                swal(
                                    'Success!',
                                    'Location was successfully edited.',
                                    'success'
                                );
                                getLocations(moment($("#workLocationFromDateInput").val(), dateformat).format("YYYY-MM-DD"), moment($("#workLocationToDateInput").val(), dateformat).format("YYYY-MM-DD"));
                                hideEditLocationPopup();
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
			
			$('#addNFCForm').on('submit', function(e) { //use on if jQuery 1.7+
                e.preventDefault();
                    $.ajax({
                        type: "POST",
                        url: "nfc/add",
                        data: $("#addNFCForm").serialize(),
                        success: function(msg) {
                            if (msg == "") {
                                swal(
                                    'Success!',
                                    'NFC tag was successfully added.',
                                    'success'
                                );
								getNFC();
                                hideAddNFCPopup();
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
			
			$('#editNFCForm').on('submit', function(e) { //use on if jQuery 1.7+
                e.preventDefault();
                    $.ajax({
                        type: "POST",
                        url: "nfc/edit",
                        data: $("#editNFCForm").serialize(),
                        success: function(msg) {
                            if (msg == "") {
                                swal(
                                    'Success!',
                                    'NFC tag was successfully edited.',
                                    'success'
                                );
								getNFC();
                                hideEditNFCPopup();
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
            
            $('#editTermsForm').on('submit', function(e) { //use on if jQuery 1.7+
                e.preventDefault();
                    $.ajax({
                        type: "POST",
                        url: "settings/trackingterms",
                        data: $("#editTermsForm").serialize(),
                        success: function(msg) {
                            if (msg == "") {
                                swal(
                                    'Success!',
                                    'Terms were successfully updated',
                                    'success'
                                );
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
			
			$('#customerSelect').on('change', function() {
                  var customer_id = this.value;
                  for (var i = 0; i < customersArray.length; i++){
                      if (customersArray[i].customer_id == customer_id){
                        $("#latitudeInput").val(customersArray[i].latitude);
                        $("#longitudeInput").val(customersArray[i].longitude);
                        $("#addressInput").val(customersArray[i].customer_address);
                      }
                  }
            });

            $('#editCustomerSelect').on('change', function() {
                  var customer_id = this.value;
                  for (var i = 0; i < customersArray.length; i++){
                      if (customersArray[i].customer_id == customer_id){
                        $("#editLatitudeInput").val(customersArray[i].latitude);
                        $("#editLongitudeInput").val(customersArray[i].longitude);
                        $("#editAddressInput").val(customersArray[i].customer_address);
                      }
                  }
            });
			
			if (isAdmin == 1){
				$("#calendarEmployeeDIV").show();
				$("#addCalendarEmployeeSelect").select2({width: "100%"});
				$("#addCalendarEmployeeSelect").on("change", function(){
					if ($(this).val() != ""){
						var showCalendarsFor = Cookies.get("wl_calendars");
						if (showCalendarsFor == undefined || showCalendarsFor == null){
							showCalendarsFor = loggedEmployee;
						}
						var showFor = showCalendarsFor.split(",");
						showFor.push($(this).val());
						Cookies.set("wl_calendars", showFor.join(","), { expires: 365 });
						getEmployees();
					}
				});
			}
	    });
		
		
	    
	    function getSettings(){
		    $.ajax({
                type: "POST",
                url: "settings/get",
                data: null,
                dataType: "json",
                success: function(settings) {
                    $("#termsInput").html(settings.tracking_terms);
                }
		    });
		}
		
		function updateRangeValue(){
		    $("#locationPriorityValue").html($("#locationPriorityInput").val());
		}
		
		function updateEditRangeValue(){
		    $("#editLocationPriorityValue").html($("#editLocationPriorityInput").val());
		}
        
		function locationDateChanged(){
			getLocations(moment($("#workLocationFromDateInput").val(), dateformat).format("YYYY-MM-DD"), moment($("#workLocationToDateInput").val(), dateformat).format("YYYY-MM-DD"));
		}
		
		function logDateChanged(){
			getLogs(moment($("#logFromDateInput").val(), dateformat).format("YYYY-MM-DD"), moment($("#logToDateInput").val(), dateformat).format("YYYY-MM-DD"));
		}
		
		function showAddNFCPopup(){
			$("#addNFCPopup, #addNFCDIV").show();
		}
		
		function hideAddNFCPopup(){
			$("#addNFCForm")[0].reset();
			$("#addNFCPopup, #addNFCDIV").hide();
		}
		
		function showEditNFCPopup(row){
			var actualRow = $(row).parents('tr');
			if (actualRow.hasClass('child')) {//Check if the current row is a child row
				actualRow = actualRow.prev();//If it is, then point to the row before it (its 'parent')
			}
            var nfc = nTable.row(actualRow).data();
			$("#hiddenEditNFCIDInput").val(nfc.nfc_id);
			$("#editNFCTagInput").val(nfc.tag);
			$("#editNFCContentInput").val(nfc.content);
			$("#editNFCCustomerSelect").val(nfc.customer_id).trigger("change");
			$("#editNFCNotesInput").html(nfc.notes);
			$("#addNFCPopup, #editNFCDIV").show();
		}
		
		function hideEditNFCPopup(row){
			$("#editNFCForm")[0].reset();
			$("#addNFCPopup, #editNFCDIV").hide();
		}
		
		function deleteNFCTag(row){
			var actualRow = $(row).parents('tr');
			if (actualRow.hasClass('child')) {//Check if the current row is a child row
				actualRow = actualRow.prev();//If it is, then point to the row before it (its 'parent')
			}
            var nfc = nTable.row(actualRow).data();
			swal({
              title: 'Confirm action',
              text: "Are you sure you want to delete this NFC tag?",
              type: 'error',
              showCancelButton: true,
              confirmButtonColor: '#3085d6',
              cancelButtonColor: '#d33',
              confirmButtonText: 'Yes, remove'
            }).then(function () {
				var postData = { nfc_id: nfc.nfc_id };
                $.ajax({
                    type: "POST",
                    url: "nfc/delete",
                    data: postData,
                    success: function(msg) {
                        if (msg == "") {
                            swal(
                                'Success!',
                                'NFC tag was successfully removed.',
                                'success'
                            );
                            getNFC();
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
		
		function getNFC(){
            $.ajax({
                type: "POST",
                url: "<?= BASE_URL ?>" + "nfc/get",
                data: null,
                dataType: "json",
                success: function(nfcs) {
					if (nTable != null){
                        nTable.clear().rows.add(nfcs).draw();
									nTable.columns([2,3]).every(function (index) {
										var column = this;
										var name;
										if (index == 2){
											name = "Customer";
										}else if (index == 3){
											name = "Added by";
										}
										$(column.header()).empty();
										var select = $(name + '<br><select><option value="">No filter</option></select>')
											.appendTo($(column.header()).empty())
											.on('change', function () {
												var val = $(this).val();
												val = $('<div/>').html(val).text();
												column
													.search( val ? '^'+val+'$' : '', true, false )
													.draw();
											});
										column.cells('', column[0]).render('display').sort().unique().each( function ( d, j ) {
											select.append( '<option value="'+d+'">'+d+'</option>' )
										});
									});
                    }else{
						nTable = $('#nfcTable').DataTable({
							"aaData": nfcs,
							"columns": [
								{ "data": "tag" },
								{ "data": "content" },
								{ "data": "customer_name" },
								{ "data": "employee_id" },
								{ "data": "created_on" },
								{ "defaultContent": '<span onClick="showEditNFCPopup(this)" data-toggle="tooltip" title="Edit NFC" class="text-primary pointer pull-left"><i class="fas fa-pencil-alt"></i></span><span onClick="deleteNFCTag(this)" data-toggle="tooltip" title="Delete NFC" class="text-danger oointer m-l-10 pull-left"><i class="fa fa-trash"></i></span>'}
							],
							initComplete: function () {
								this.api().columns([2,3]).every(function (index) {
									var column = this;
										var name;
										if (index == 2){
											name = "Customer";
										}else if (index == 3){
											name = "Added by";
										}
										$(column.header()).empty();
										var select = $(name + '<br><select><option value="">No filter</option></select>')
											.appendTo($(column.header()).empty())
											.on('change', function () {
												var val = $(this).val();
												val = $('<div/>').html(val).text();
												column
													.search( val ? '^'+val+'$' : '', true, false )
													.draw();
											});
										column.cells('', column[0]).render('display').sort().unique().each( function ( d, j ) {
											select.append( '<option value="'+d+'">'+d+'</option>' )
										});
								});
							},
							"columnDefs": [
								{
									// The `data` parameter refers to the data for the cell (defined by the
									// `data` option, which defaults to the column being worked with, in
									// this case `data: 0`.
									"render": function ( data, type, row ) {
										if (data != null){
											return "<a class='text-primary hover-underline' target='_blank' href='customerdetails?customer_id=" + row.customer_id + "' >" + data + '</a>';
										}else{
											return "Not specified";
										}
									},
									"targets": 2,
									orderable: false
								},
								{
									"render": function ( data, type, row ) {
										return "<a class='text-primary hover-underline' href='employeepage?employee_id=" + data + "' target='_blank' >" + row.employee_name + " " + row.employee_surname + '</a>';
									},
									"targets": 3,
									orderable: false
								},
								{
									"render": function ( data, type, row ) {
										if (type === 'display' || type === 'filter'){
											return moment(data).format(dateformat + ", " + timeformat);
										}else{
											return data;
										}
									},
									"targets": 4,
									orderable: false
								},
								{
									"targets": 5,
									"orderable": false
								}
							],
							responsive: true,
							dom: 'lfrtipB',
							buttons: [{
									extend: 'copy',
									className: 'btn-sm btn-primary',
									exportOptions: {
										format: {
											header: function ( data, column, row ) {
												if (column == 0){
													data = "Customer";
												}else if (column == 3){
													data = "Added by";
												}
												return data.trim();
											}
										}
									}
								},
								{
									extend: 'csv',
									className: 'btn-sm btn-primary',
									exportOptions: {
										format: {
											header: function ( data, column, row ) {
												if (column == 0){
													data = "Customer";
												}else if (column == 3){
													data = "Added by";
												}
												return data.trim();
											}
										}
									}
								},
								{
									extend: 'excel',
									className: 'btn-sm btn-primary',
									exportOptions: {
										format: {
											header: function ( data, column, row ) {
												if (column == 0){
													data = "Customer";
												}else if (column == 3){
													data = "Added by";
												}
												return data.trim();
											}
										}
									}
								},
								{
									extend: 'pdf',
									className: 'btn-sm btn-primary',
									exportOptions: {
										format: {
											header: function ( data, column, row ) {
												if (column == 0){
													data = "Customer";
												}else if (column == 3){
													data = "Added by";
												}
												return data.trim();
											}
										}
									}
								},
								{
									extend: 'print',
									className: 'btn-sm btn-primary',
									exportOptions: {
										format: {
											header: function ( data, column, row ) {
												if (column == 0){
													data = "Customer";
												}else if (column == 3){
													data = "Added by";
												}
												return data.trim();
											}
										}
									}
								}
							]
						});
					}
				}
			});
		}
	    
	    function getLogs(dateFrom, dateTo){
	        deleteMarkers();
	        var postData = { date_from: dateFrom, date_to: dateTo };
            $.ajax({
                type: "POST",
                url: "<?= BASE_URL ?>" + "worklocations/logs",
                data: postData,
                dataType: "json",
                success: function(response) {
                    var logs = response.logs;
					var locations = response.locations;
					console.log(response);
                    if (lTable != null){
                        lTable.clear().rows.add(logs).draw();
									lTable.columns([0,2]).every(function (index) {
										var column = this;
										var name;
										if (index == 0){
											name = "Customer name";
										}else if (index == 2){
											name = "Employee";
										}
										$(column.header()).empty();
										var select = $(name + '<br><select><option value="">No filter</option></select>')
											.appendTo($(column.header()).empty())
											.on('change', function () {
												var val = $(this).val();
												val = $('<div/>').html(val).text();
												column
													.search( val ? '^'+val+'$' : '', true, false )
													.draw();
											});
										column.cells('', column[0]).render('display').sort().unique().each( function ( d, j ) {
											select.append( '<option value="'+d+'">'+d+'</option>' )
										});
									});
                    }else{
						lTable = $('#logTable').DataTable({
							"aaData": logs,
							"columns": [
								{ "data": "manual_checkin" },
								{ "data": "customer_name" },
								{ "data": "address" },
								{ "data": "employee_id" },
								{ "data": "nfc_tag" },
								{ "data": "created_on" },
								{ "data": "departure_date" }
							],
							initComplete: function () {
								this.api().columns([1,3]).every(function (index) {
									var column = this;
										var name;
										if (index == 1){
											name = "Customer name";
										}else if (index == 3){
											name = "Employee";
										}
										$(column.header()).empty();
										var select = $(name + '<br><select><option value="">No filter</option></select>')
											.appendTo($(column.header()).empty())
											.on('change', function () {
												var val = $(this).val();
												val = $('<div/>').html(val).text();
												column
													.search( val ? '^'+val+'$' : '', true, false )
													.draw();
											});
										column.cells('', column[0]).render('display').sort().unique().each( function ( d, j ) {
											select.append( '<option value="'+d+'">'+d+'</option>' )
										});
								});
							},
							"columnDefs": [
								{
									"render": function ( data, type, row ) {
										if (data == 0){
											return "Automatic";
										}else{
											return "Manual";
										}
									},
									"targets": 0,
									orderable: false
								},
								{
									// The `data` parameter refers to the data for the cell (defined by the
									// `data` option, which defaults to the column being worked with, in
									// this case `data: 0`.
									"render": function ( data, type, row ) {
										if (data != null){
											return "<a class='text-primary hover-underline text-ellipsis' target='_blank' href='customerdetails?customer_id=" + row.customer_id + "' >" + data + '</a>';
										}else{
											return "Not specified";
										}
									},
									"targets": 1,
									orderable: false
								},
								{
									// The `data` parameter refers to the data for the cell (defined by the
									// `data` option, which defaults to the column being worked with, in
									// this case `data: 0`.
									"render": function ( data, type, row ) {
										return "<span class='text-primary hover-underline' onClick='showLogLocation(this)'>" + data + '</span>';
									},
									"targets": 2
								},
								{
									"render": function ( data, type, row ) {
										return "<a class='text-primary hover-underline' href='employeepage?employee_id=" + data + "' target='_blank' >" + row.employee_name + " " + row.employee_surname + '</a>';
									},
									"targets": 3,
									orderable: false
								},
								{
									"render": function ( data, type, row ) {
										return moment(data).format(dateformat + ", " + timeformat);
									},
									"targets": 5,
									"orderable": false
								},
								{
									"render": function ( data, type, row ) {
										return moment(data).format(dateformat + ", " + timeformat);
									},
									"targets": 6,
									"orderable": false
								}
							],
							responsive: true,
							dom: 'lfrtipB',
							buttons: [{
									extend: 'copy',
									className: 'btn-sm btn-primary',
									exportOptions: {
										format: {
											header: function ( data, column, row ) {
												if (column == 0){
													data = "Customer name";
												}else if (column == 2){
													data = "Employee";
												}
												return data.trim();
											}
										}
									}
								},
								{
									extend: 'csv',
									className: 'btn-sm btn-primary',
									exportOptions: {
										format: {
											header: function ( data, column, row ) {
												if (column == 0){
													data = "Customer name";
												}else if (column == 2){
													data = "Employee";
												}
												return data.trim();
											}
										}
									}
								},
								{
									extend: 'excel',
									className: 'btn-sm btn-primary',
									exportOptions: {
										format: {
											header: function ( data, column, row ) {
												if (column == 0){
													data = "Customer name";
												}else if (column == 2){
													data = "Employee";
												}
												return data.trim();
											}
										}
									}
								},
								{
									extend: 'pdf',
									className: 'btn-sm btn-primary',
									exportOptions: {
										format: {
											header: function ( data, column, row ) {
												if (column == 0){
													data = "Customer name";
												}else if (column == 2){
													data = "Employee";
												}
												return data.trim();
											}
										}
									}
								},
								{
									extend: 'print',
									className: 'btn-sm btn-primary',
									exportOptions: {
										format: {
											header: function ( data, column, row ) {
												if (column == 0){
													data = "Customer name";
												}else if (column == 2){
													data = "Employee";
												}
												return data.trim();
											}
										}
									}
								}
							]
						});
					}
					
					for (var i = 0; i < locations.length; i++){
                        var exists = false;
                        var customer_name = locations[i].customer_name;
						if (customer_name == null){
							customer_name = "Customer not known/manual check-in";
						}
                        for (var j = 0; j < logs.length; j++){
							var visitedBy = "";
                            if (logs[j].location_id == locations[i].location_id){
								visitedBy += "Visited by: " + logs[j].employee_name + " " + logs[j].employee_surname + " (" + moment(logs[j].created_on).format(timeformat) + ")<br>"; 
                                exists = true;
                            }
                        }
                        if (!exists){
                            var marker = new google.maps.Marker({
                                position: { lat: parseFloat(locations[i].latitude), lng: parseFloat(locations[i].longitude) },
                                map: map,
                                title: 'Unvisited location'
                            });
                            addInfoWindow(map, marker, "<strong>" + customer_name + "</strong><br>" + locations[i].address + "<br><br><span class='text-danger'>Not yet visited</span>", false);
                        }else{
							var marker = new google.maps.Marker({
                                position: { lat: parseFloat(locations[i].latitude), lng: parseFloat(locations[i].longitude) },
                                map: map,
                                title: 'Visited location'
                            });
                            addInfoWindow(map, marker, "<strong>" + customer_name + "</strong><br>" + locations[i].address + "<br><br><span class='text-success'>" + visitedBy + "</span>", false);
						}
                    }
                }
		    });
        }
        
        function showLogLocation(row){
			var actualRow = $(row).parents('tr');
			if (actualRow.hasClass('child')) {//Check if the current row is a child row
				actualRow = actualRow.prev();//If it is, then point to the row before it (its 'parent')
			}
            var log = lTable.row(actualRow).data();
            var center = new google.maps.LatLng(log.latitude, log.longitude);
            map.panTo(center);
        }
		
		function showOnMap(row, tableIdx){
            var actualRow = $(row).parents('tr');
			if (actualRow.hasClass('child')) {//Check if the current row is a child row
				actualRow = actualRow.prev();//If it is, then point to the row before it (its 'parent')
			}
			if (tableIdx == 0){
				var location = dTable.row(actualRow).data();
			}else{
				var location = bTable.row(actualRow).data();
			}
            
            if (mapMarker != null){
                mapMarker.setMap(null);
            }
            
            mapMarker = new google.maps.Marker({
                position: new google.maps.LatLng(location.latitude, location.longitude),
                map: pMap,
                title: 'Location'
            });
            var infoWindowContent = "<p class='f-s-12'><strong>" + location.customer_name + "</strong><br><strong>Address - </strong>" + location.address + "</p>";
            addInfoWindow(pMap, mapMarker, infoWindowContent, true);
            $("#mapPopup, #mapDIV").show();
            google.maps.event.trigger(pMap, 'resize');
            pMap.setZoom(pMap.getZoom());
            pMap.setCenter({lat: parseFloat(location.latitude), lng: parseFloat(location.longitude)});
        }
		
		function hideMapPopup(){
            $("#mapPopup, #mapDIV").hide();
        }
        
        function addInfoWindow(gMap, marker, message, autoOpen) {

            var infoWindow = new google.maps.InfoWindow({
                content: message
            });

            google.maps.event.addListener(marker, 'click', function () {
                infoWindow.open(gMap, marker);
            });
            
            if (autoOpen){
                infoWindow.open(gMap, marker);
            }
        }
        
        function clearMarkers(){
            for (var i = 0; i < markerArray.length; i++) {
              markerArray[i].setMap(null);
            }
        }
        
        function deleteMarkers(){
            clearMarkers();
            markerArray = [];
        }
	    
	    function getCustomers() {
            $.ajax({
                type: "POST",
                url: "<?= BASE_URL ?>" + "customer/get",
                data: null,
                dataType: "json",
                success: function(customers) {
                    customersArray = customers;
					$("#customerSelect, #editCustomerSelect, #NFCCustomerSelect, #editNFCCustomerSelect").append($('<option>', {
                            value: "",
                            text: "Choose a customer"
                    }));
                    for (var i = 0; i < customers.length; i++){
                        $("#customerSelect, #editCustomerSelect, #NFCCustomerSelect, #editNFCCustomerSelect").append($('<option>', {
                            value: customers[i].customer_id,
                            text: customers[i].customer_name + " (" + customers[i].customer_address + ")"
                        }));
                    }
                }
            });
	    }
	    
	    function getEmployees() {
            $.ajax({
                type: "POST",
                url: "<?= BASE_URL ?>" + "employees/list",
                data: null,
                dataType: "json",
                success: function(employees) {
					employees.sort(function(a, b){
                      return a.department_name > b.department_name;
                    });
                    employeeArray = employees;
					
					$("#employeeSelect, #editEmployeeSelect").html("");
                    var lastDepartment = null;
                    for (var i = 0; i < employees.length; i++){
                            if (lastDepartment == null){
                                $("#employeeSelect, #editEmployeeSelect").append("<optgroup label='" + employees[i].department_name + "'>");
                                lastDepartment = employees[i].department_name;
                            }else if (employees[i].department_name != lastDepartment){
                                $("#employeeSelect, #editEmployeeSelect").append("</optgroup><optgroup label='" + employees[i].department_name + "'>");
                                lastDepartment = employees[i].department_name;
                            }
                            $("#employeeSelect, #editEmployeeSelect").append($('<option>', {
                                value: employees[i].employee_id,
                                text: employees[i].employee_name + " " + employees[i].employee_surname
                            }));
                    }
					$("#employeeSelect, #editEmployeeSelect").append("</optgroup>");
	
					if (isAdmin == 1){
						var showCalendarsFor = Cookies.get("wl_calendars");
						if (showCalendarsFor == undefined || showCalendarsFor == null){
							showCalendarsFor = loggedEmployee;
						}
						var showFor = showCalendarsFor.split(",");
						$("#addCalendarEmployeeSelect").html("");
						$("#addCalendarEmployeeSelect").append($('<option>', {
									value: "",
									text: "View events for..."
						}));
						
                        var filterContent = '<div onClick="showEmployeeEvents(this, -1)" class="fc-event"><div class="fc-event-icon"></div> All events</div>';
                        var showCalendarsFor = Cookies.get("wl_calendars");
						if (showCalendarsFor == undefined || showCalendarsFor == null){
							showCalendarsFor = loggedEmployee;
						}

						for (var i = 0; i < employees.length; i++){
                            var employee = employees[i];
							
							if (showFor.indexOf(employee.employee_id) == -1 && employee.employee_id != loggedEmployee){
								$("#addCalendarEmployeeSelect").append($('<option>', {
									value: employees[i].employee_id,
									text: employees[i].employee_name + " " + employees[i].employee_surname
								}));
							}
							
							if (showFor.indexOf(employee.employee_id) == -1){
								continue;
							}
                            if (employee.employee_id == loggedEmployee){
                                filterContent += '<div onClick="showEmployeeEvents(this, ' + i + ')" class="fc-event fc-active"><div class="fc-event-icon"></div> My locations</div>';
                            }else{
                                filterContent += '<div onClick="showEmployeeEvents(this,' + i + ')" class="fc-event"><div class="fc-event-icon"><i class="fa fa-times fa-fw text-danger" onClick="removeEmployeeCalendar(' + i + ')"></i></div>' + employee.employee_name + " " + employee.employee_surname + '</div>';
                            }
                        }
                    }else{
                        var filterContent = "";
                        for (var i = 0; i < employees.length; i++){
                            var employee = employees[i];
                            if (employee.employee_id == loggedEmployee){
                                filterContent = '<div onClick="showEmployeeEvents(this, ' + i + ')" class="fc-event fc-active"><div class="fc-event-icon"><i class="fa fa-circle fa-fw text-success"></i></div> My locations</div>';
                            }
                        }
                    }
					
                    $("#calendarFilters").html(filterContent);
					var todaysDate = moment().format("YYYY-MM-DD");
                    getLocations(todaysDate, todaysDate);
                }
            });
        }
		
		function removeEmployeeCalendar(employee_id){
			var showCalendarsFor = Cookies.get("wl_calendars");
			if (showCalendarsFor == undefined || showCalendarsFor == null){
				showCalendarsFor = loggedEmployee;
			}
			var showFor = showCalendarsFor.split(",");
			showFor.splice(showFor.indexOf(employee_id), 1);
			Cookies.set("wl_calendars", showFor.join(","), { expires: 365 });
			getEmployees();
		}
        
        function getLocations(dateFrom, dateTo) {
			var postData = {
				date_from: dateFrom,
				date_to: dateTo
			};
			$.ajax({
				type: "POST",
				url: "<?= BASE_URL ?>" + "worklocations/get",
				data: postData,
				dataType: "json",
				success: function(nonRecurring) {
					getRecurring();
					makeCalendar();
					if (dTable != null) {
						dTable.clear().rows.add(nonRecurring).draw();
						dTable.columns([0, 4, 5, 6]).every(function(index) {
							var column = this;
							var name;
							if (index == 0) {
								name = "Customer name";
							} else if (index == 4) {
								name = "Assigned to";
							} else if (index == 5) {
								name = "Added by";
							} else if (index == 6) {
								name = "Priority";
							}
							$(column.header()).empty();
							var select = $(name + '<br><select><option value="">No filter</option></select>')
								.appendTo($(column.header()).empty())
								.on('change', function() {
									var val = $(this).val();
									val = $('<div/>').html(val).text();
									column
										.search(val, true, false)
										.draw();
								});
							if (index != 4){
												column.cells('', column[0]).render('display').sort().unique().each(function(d, j) {
													select.append('<option value="' + d + '">' + d + '</option>')
												});
							}else{
												var uniqueEmployees = [];
												column.cells('', column[0]).render('display').sort().unique().each(function(d, j) {
													var participants = d.split(",");
													for (var i = 0; i < participants.length; i++){
														var participant = participants[i].trim();
														if (uniqueEmployees.indexOf(participant) == -1){
															select.append('<option value="' + participant + '">' + participant + '</option>');
															uniqueEmployees.push(participant);
														}
													}
												});
							}
						});
					} else {
						dTable = $('#worklocationsTable').DataTable({
							"aaData": nonRecurring,
							"columns": [{
									"data": "customer_name"
								},
								{
									"data": "address"
								},
								{
									"data": "date"
								},
								{
									"data": "start_time"
								},
								{
									"data": "participants"
								},
								{
									"data": "employee_id"
								},
								{
									"data": "priority"
								},
								{
									"data": "created_on"
								},
								{
									"defaultContent": '<span onClick="showEditLocationPopup(this)" data-toggle="tooltip" title="Edit" class="pull-left"><i class="fas fa-pencil-alt text-primary pointer"></i></span><span onClick="deleteLocation(this)" data-toggle="tooltip" title="Delete" class="m-l-10 pull-left pointer"><i class="fa fa-trash text-danger"></i></span>'
								}
							],
							initComplete: function() {
								this.api().columns([0, 4, 5, 6]).every(function(index) {
									var column = this;
									var name;
									if (index == 0) {
										name = "Customer name";
									} else if (index == 4) {
										name = "Assigned to";
									} else if (index == 5) {
										name = "Added by";
									} else if (index == 6) {
										name = "Priority";
									}
									$(column.header()).empty();
									var select = $(name + '<br><select><option value="">No filter</option></select>')
										.appendTo($(column.header()).empty())
										.on('change', function() {
											var val = $(this).val();
											val = $('<div/>').html(val).text();
											column
												.search(val, true, false)
												.draw();
										});
									if (index != 4){
												column.cells('', column[0]).render('display').sort().unique().each(function(d, j) {
													select.append('<option value="' + d + '">' + d + '</option>')
												});
									}else{
												var uniqueEmployees = [];
												column.cells('', column[0]).render('display').sort().unique().each(function(d, j) {
													var participants = d.split(",");
													for (var i = 0; i < participants.length; i++){
														var participant = participants[i].trim();
														if (uniqueEmployees.indexOf(participant) == -1){
															select.append('<option value="' + participant + '">' + participant + '</option>');
															uniqueEmployees.push(participant);
														}
													}
												});
									}
								});
							},
							"columnDefs": [{
									// The `data` parameter refers to the data for the cell (defined by the
									// `data` option, which defaults to the column being worked with, in
									// this case `data: 0`.
									"render": function ( data, type, row ) {
										if (data != null){
											return "<a class='text-primary hover-underline' target='_blank' href='customerdetails?customer_id=" + row.customer_id + "' >" + data + '</a>';
										}else{
											return "Not specified";
										}
									},
									"targets": 0,
									orderable: false
								},
								{
									// The `data` parameter refers to the data for the cell (defined by the
									// `data` option, which defaults to the column being worked with, in
									// this case `data: 0`.
									"render": function ( data, type, row ) {
										return "<span class='hover-underline text-primary' onClick='showOnMap(this, 0)'>" + data + "</span>";
									},
									"targets": 1,
									orderable: false
								},
								{
									"render": function(data, type, row) {
										if (type === 'display' || type === 'filter') {
											return moment(data).format(dateformat);
										} else {
											return data;
										}
									},
									"targets": 2,
								},
								{
									"render": function(data, type, row) {
										if (type === 'display' || type === 'filter') {
											return moment(row.date + " " + row.start_time).format(timeformat) + " - " + moment(row.date + " " + row.end_time).format(timeformat);
										} else {
											return data;
										}
									},
									"targets": 3,
								},
								{
									"render": function(data, type, row) {
										return getEmployeeString(data);
									},
									"targets": 4
								},
								{
									"render": function(data, type, row) {
										return "<a class='text-primary hover-underline' href='employeepage?employee_id=" + data + "' target='_blank' >" + row.employee_name + " " + row.employee_surname + '</a>';
									},
									"targets": 5,
									orderable: false
								},
								{
									"targets": 6,
									orderable: false
								},
								{
									"render": function(data, type, row) {
										if (type === 'display' || type === 'filter') {
											return moment(row.created_on).format(dateformat + ", " + timeformat);
										} else {
											return data;
										}
									},
									"targets": 7
								},
								{
									"targets": 8,
									"orderable": false
								}
							],
							responsive: true,
							dom: 'lfrtipB',
							buttons: [{
									extend: 'copy',
									className: 'btn-sm btn-primary',
									exportOptions: {
										format: {
											header: function ( data, column, row ) {
												if (column == 0) {
													data = "Customer name";
												} else if (column == 5) {
													data = "Added by";
												} else if (column == 6) {
													data = "Priority";
												}
												return data.trim();
											}
										}
									}
								},
								{
									extend: 'csv',
									className: 'btn-sm btn-primary',
									exportOptions: {
										format: {
											header: function ( data, column, row ) {
												if (column == 0) {
													data = "Customer name";
												} else if (column == 5) {
													data = "Added by";
												} else if (column == 6) {
													data = "Priority";
												}
												return data.trim();
											}
										}
									}
								},
								{
									extend: 'excel',
									className: 'btn-sm btn-primary',
									exportOptions: {
										format: {
											header: function ( data, column, row ) {
												if (column == 0) {
													data = "Customer name";
												} else if (column == 5) {
													data = "Added by";
												} else if (column == 6) {
													data = "Priority";
												}
												return data.trim();
											}
										}
									}
								},
								{
									extend: 'pdf',
									className: 'btn-sm btn-primary',
									exportOptions: {
										format: {
											header: function ( data, column, row ) {
												if (column == 0) {
													data = "Customer name";
												} else if (column == 5) {
													data = "Added by";
												} else if (column == 6) {
													data = "Priority";
												}
												return data.trim();
											}
										}
									}
								},
								{
									extend: 'print',
									className: 'btn-sm btn-primary',
									exportOptions: {
										format: {
											header: function ( data, column, row ) {
												if (column == 0) {
													data = "Customer name";
												} else if (column == 5) {
													data = "Added by";
												} else if (column == 6) {
													data = "Priority";
												}
												return data.trim();
											}
										}
									}
								}
							]
						});
						if (firstPageLoad) {
							App.init();
							firstPageLoad = false;
						}
					}
				}
			});
		}
        
		function getRecurring() {
			$.ajax({
				type: "POST",
				url: "<?= BASE_URL ?>" + "worklocations/recurring",
				data: null,
				dataType: "json",
				success: function(recurring) {
					if (bTable != null) {
						bTable.clear().rows.add(recurring).draw();
						bTable.columns([0, 5, 6]).every(function(index) {
							var column = this;
							var name;
							if (index == 0) {
								name = "Customer name";
							} else if (index == 5) {
								name = "Added by";
							} else if (index == 6) {
								name = "Priority";
							}
							$(column.header()).empty();
							var select = $(name + '<br><select><option value="">No filter</option></select>')
								.appendTo($(column.header()).empty())
								.on('change', function() {
									var val = $(this).val();
									val = $('<div/>').html(val).text();
									column
										.search(val ? '^' + val + '$' : '', true, false)
										.draw();
								});
							column.cells('', column[0]).render('display').sort().unique().each(function(d, j) {
								select.append('<option value="' + d + '">' + d + '</option>')
							});
						});
					} else {
						bTable = $('#recurringWorklocationsTable').DataTable({
							"aaData": recurring,
							"columns": [{
									"data": "customer_name"
								},
								{
									"data": "address"
								},
								{
									"data": "repeat_on"
								},
								{
									"data": "start_time"
								},
								{
									"data": "participants"
								},
								{
									"data": "employee_id"
								},
								{
									"data": "priority"
								},
								{
									"data": "created_on"
								},
								{
									"defaultContent": '<span onClick="showEditRecurringLocationPopup(this)" data-toggle="tooltip" title="Edit" class="pull-left"><i class="fas fa-pencil-alt text-primary pointer"></i></span><span onClick="deleteRecurringLocation(this)" data-toggle="tooltip" title="Delete" class="m-l-10 pull-left pointer"><i class="fa fa-trash text-danger"></i></span>'
								}
							],
							initComplete: function() {
								this.api().columns([0, 5, 6]).every(function(index) {
									var column = this;
									var name;
									if (index == 0) {
										name = "Customer name";
									} else if (index == 5) {
										name = "Added by";
									} else if (index == 6) {
										name = "Priority";
									}
									$(column.header()).empty();
									var select = $(name + '<br><select><option value="">No filter</option></select>')
										.appendTo($(column.header()).empty())
										.on('change', function() {
											var val = $(this).val();
											val = $('<div/>').html(val).text();
											column
												.search(val ? '^' + val + '$' : '', true, false)
												.draw();
										});
									column.cells('', column[0]).render('display').sort().unique().each(function(d, j) {
										select.append('<option value="' + d + '">' + d + '</option>')
									});
								});
							},
							"columnDefs": [{
									// The `data` parameter refers to the data for the cell (defined by the
									// `data` option, which defaults to the column being worked with, in
									// this case `data: 0`.
									"render": function ( data, type, row ) {
										if (data != null){
											return "<a class='text-primary hover-underline' target='_blank' href='customerdetails?customer_id=" + row.customer_id + "' >" + data + '</a>';
										}else{
											return "Not specified";
										}
									},
									"targets": 0,
									orderable: false
								},
								{
									// The `data` parameter refers to the data for the cell (defined by the
									// `data` option, which defaults to the column being worked with, in
									// this case `data: 0`.
									"render": function ( data, type, row ) {
										return "<span class='hover-underline text-primary' onClick='showOnMap(this, 1)'>" + data + "</span>";
									},
									"targets": 1,
									orderable: false
								},
								{
									"render": function(data, type, row) {
										var days = data.split(",");
										var daysString = "";
										for (var i = 0; i < days.length; i++) {
											if (daysString != "") {
												daysString += ", " + daysOfWeek[days[i]];
											} else {
												daysString += daysOfWeek[days[i]];
											}
										}
										return daysString;
									},
									"targets": 2
								},
								{
									"render": function(data, type, row) {
										if (type === 'display' || type === 'filter') {
											return row.start_time + " - " + row.end_time;
										} else {
											return data;
										}
									},
									"targets": 3,
								},
								{
									"render": function(data, type, row) {
										return getEmployeeString(data);
									},
									"targets": 4
								},
								{
									"render": function(data, type, row) {
										return "<a class='text-primary hover-underline' href='employeepage?employee_id=" + data + "' target='_blank' >" + row.employee_name + " " + row.employee_surname + '</a>';
									},
									"targets": 5,
									orderable: false
								},
								{
									"targets": 6,
									orderable: false
								},
								{
									"render": function(data, type, row) {
										if (type === 'display' || type === 'filter') {
											return moment(row.created_on).format(dateformat + ", " + timeformat);
										} else {
											return data;
										}
									},
									"targets": 7
								},
								{
									"targets": 8,
									"orderable": false
								}
							],
							responsive: true,
							dom: 'lfrtipB',
							buttons: [{
									extend: 'copy',
									className: 'btn-sm btn-primary',
									exportOptions: {
										format: {
											header: function ( data, column, row ) {
												if (column == 0) {
													data = "Customer name";
												} else if (column == 5) {
													data = "Added by";
												} else if (column == 6) {
													data = "Priority";
												}
												return data.trim();
											}
										}
									}
								},
								{
									extend: 'csv',
									className: 'btn-sm btn-primary',
									exportOptions: {
										format: {
											header: function ( data, column, row ) {
												if (column == 0) {
													data = "Customer name";
												} else if (column == 5) {
													data = "Added by";
												} else if (column == 6) {
													data = "Priority";
												}
												return data.trim();
											}
										}
									}
								},
								{
									extend: 'excel',
									className: 'btn-sm btn-primary',
									exportOptions: {
										format: {
											header: function ( data, column, row ) {
												if (column == 0) {
													data = "Customer name";
												} else if (column == 5) {
													data = "Added by";
												} else if (column == 6) {
													data = "Priority";
												}
												return data.trim();
											}
										}
									}
								},
								{
									extend: 'pdf',
									className: 'btn-sm btn-primary',
									exportOptions: {
										format: {
											header: function ( data, column, row ) {
												if (column == 0) {
													data = "Customer name";
												} else if (column == 5) {
													data = "Added by";
												} else if (column == 6) {
													data = "Priority";
												}
												return data.trim();
											}
										}
									}
								},
								{
									extend: 'print',
									className: 'btn-sm btn-primary',
									exportOptions: {
										format: {
											header: function ( data, column, row ) {
												if (column == 0) {
													data = "Customer name";
												} else if (column == 5) {
													data = "Added by";
												} else if (column == 6) {
													data = "Priority";
												}
												return data.trim();
											}
										}
									}
								}
							]
						});
						
						if (firstPageLoad) {
							App.init();
							firstPageLoad = false;
						}
					}
				}
			});
		}
		
		var green = "#00acac";
	    var red = "#ff5b57";
	    var blue = "#348fe2";
	    var orange = "#f59c1a";
	    var lime = "#49b6d6";
		
		function showEmployeeEvents(div, index){
            $(".fc-active").removeClass("fc-active");
            $(div).addClass("fc-active");
			
            var employee = employeeArray[index];
            var events = $("#calendar").fullCalendar("clientEvents");
			
			if (index != -1){
				for (var i = 0; i < events.length; i++){
					var event = events[i];
					if (event.participants.split(",").indexOf(employee.employee_id) != -1){
						event.display = true;
					}else{
						event.display = false;
					}
				}
				selectedEmployee = employee.employee_id;
			}else{
				for (var i = 0; i < events.length; i++){
					var event = events[i];
					event.display = true;
				}
				selectedEmployee = null;
			}
			
            $('#calendar').fullCalendar('updateEvents', events);
        }
		
		function makeCalendar() {
			$.ajax({
				type: "POST",
				url: "<?= BASE_URL ?>" + "worklocations/getall",
				data: null,
				dataType: "json",
				success: function(events) {
					eventArray = events;
					var actualEvents = [];
					for (var i = 0; i < events.length; i++){
						var event = events[i];
						
						var display = true;
						if (isAdmin == 1 && firstPageLoad && event.participants.split(",").indexOf(loggedEmployee) == -1){
							display = false;
						}else if (!firstPageLoad){
							if (selectedEmployee != null){
								if (event.participants.split(",").indexOf(selectedEmployee) != -1){
									display = true;
								}else{
									display = false;
								}
							}else{
								display = true;
							}
						}
						if (event.recurring == 0){
							var eventColor = red;
							if (event.visited == 1){
								eventColor = green;
							}
							actualEvents.push({
								id: event.location_id,
								participants: event.participants,
								display: display,
								title: event.address,
								start: moment(event.date + " " + event.start_time),
								end: moment(event.date + " " + event.end_time),
								color: eventColor
							});
						}else{
							var repeat_on = event.repeat_on.split(",");
							var daysOfWeek = [];
							for (var j = 0; j < repeat_on.length; j++){
								if (parseInt(repeat_on[j]) != 6){ //In DB, 0 is monday, in fullcalendar it's sunday, so add +1 to everything but sunday
									daysOfWeek.push(parseInt(repeat_on[j]) + 1);
								}else{
									daysOfWeek.push(0); //Sunday
								}
							}
							actualEvents.push({
								id: event.location_id,
								participants: event.participants,
								display: display,
								title: event.address,
								start: event.start_time,
								end: event.end_time,
								dow: daysOfWeek,
								color: blue
							});
						}
					}
					
					$('#calendar').fullCalendar({
						header: {
							left: 'month,agendaWeek,agendaDay,listWeek',
							center: 'title',
							right: 'prev,today,next '
						},
						firstDay: 1,
						navLinks: true,
						height: "auto",
						slotDuration: '00:30:00',
						snapDuration: '00:30:00',
						agendaEventMinHeight: 100,
						minTime: "01:00",
						maxTime: "24:00",
						defaultView: "month",
						nowIndicator: true,
						selectable: true,
						eventDurationEditable: false,
						selectHelper: true,
						eventClick: function(event, element) {
							for (var i = 0; i < eventArray.length; i++){
								if (eventArray[i].location_id == event.id){
									currentLocation = eventArray[i];
									break;
								}
							}
							showEditCurrentLocationPopup();
						},
						select: function(start, end) {
								showAddLocationPopup();
								$("#dateInput").val(start.format(dateformat));
								$('#calendar').fullCalendar('unselect');
						},
						eventRender: function(event, element) {
							if (!event.display) {
								$(element).css("display", "none");
							} else {
								$(element).css("display", "block");
							}
						},
						axisFormat: 'HH:mm',
						timeFormat: 'HH:mm',
						editable: true,
						eventLimit: true, // allow "more" link when too many events
						events: actualEvents
					});
				}
			});
		}
        
        function getEmployeeString(assigned_to){
			var participantString = "";
			var participants = assigned_to.split(",");
			for (var i = 0; i < participants.length; i++) {
				for (var j = 0; j < employeeArray.length; j++){
					var employee = employeeArray[j];
					if (employee.employee_id == participants[i]){
						if (participantString != ""){
							participantString += ", <a target='_blank' href='employeepage?employee_id=" + employee.employee_id + "' />" + employee.employee_name + " " + employee.employee_surname + "</a>";
						}else{
							participantString = "<a target='_blank' href='employeepage?employee_id=" + employee.employee_id + "' />" + employee.employee_name + " " + employee.employee_surname + "</a>";
						}
						break;
					}
				}
			}
			return participantString;
		}
        
        function showEditLocationPopup(row){
            var location = dTable.row($(row).parents('tr')).data();
			$("#editLocationForm input[name=recurring]").val([location.recurring]).trigger("change");
            $("#editLocationIDInput").val(location.location_id);
			$("#editLocationPriorityInput").val(location.priority);
			updateEditRangeValue();
            $("#editLatitudeInput").val(location.latitude);
            $("#editLongitudeInput").val(location.longitude);
            $("#editCustomerSelect").val(location.customer_id).trigger("change");
            $("#editDateInput").val(moment(location.date).format(dateformat));
			$("#editStartTimeInput").val(moment(location.date + " " + location.start_time).format(timeformat));
			$("#editEndTimeInput").val(moment(location.date + " " + location.end_time).format(timeformat));
			$("#editRepeatOnSelect").val(location.repeat_on.split(",")).trigger("change");
            $("#editEmployeeSelect").val(location.participants.split(",")).trigger("change");
            $("#editAddressInput").val(location.address);
            $("#addLocationPopup, #editLocationDIV").show();
        }
		
		function showEditRecurringLocationPopup(row){
			var location = bTable.row($(row).parents('tr')).data();
			$("#editLocationForm input[name=recurring]").val([location.recurring]).trigger("change");
            $("#editLocationIDInput").val(location.location_id);
			$("#editLocationPriorityInput").val(location.priority);
			updateEditRangeValue();
            $("#editLatitudeInput").val(location.latitude);
            $("#editLongitudeInput").val(location.longitude);
            $("#editCustomerSelect").val(location.customer_id).trigger("change");
            $("#editDateInput").val(moment(location.date).format(dateformat));
			$("#editStartTimeInput").val(moment(location.date + " " + location.start_time).format(timeformat));
			$("#editEndTimeInput").val(moment(location.date + " " + location.end_time).format(timeformat));
			$("#editRepeatOnSelect").val(location.repeat_on.split(",")).trigger("change");
            $("#editEmployeeSelect").val(location.participants.split(",")).trigger("change");
            $("#editAddressInput").val(location.address);
            $("#addLocationPopup, #editLocationDIV").show();
		}
		
		function showEditCurrentLocationPopup(){
			var location = currentLocation;
			if (location.recurring == 0){
				$("#editLocationForm input[name=recurring]").val([location.recurring]).trigger("change");
				$("#editLocationIDInput").val(location.location_id);
				$("#editLocationPriorityInput").val(location.priority);
				updateEditRangeValue();
				$("#editLatitudeInput").val(location.latitude);
				$("#editLongitudeInput").val(location.longitude);
				$("#editCustomerSelect").val(location.customer_id).trigger("change");
				$("#editDateInput").val(moment(location.date).format(dateformat));
				$("#editStartTimeInput").val(moment(location.date + " " + location.start_time).format(timeformat));
				$("#editEndTimeInput").val(moment(location.date + " " + location.end_time).format(timeformat));
				$("#editRepeatOnSelect").val(location.repeat_on.split(",")).trigger("change");
				$("#editEmployeeSelect").val(location.participants.split(",")).trigger("change");
				$("#editAddressInput").val(location.address);
				$("#addLocationPopup, #editLocationDIV").show();
			}else{
				$("#editLocationForm input[name=recurring]").val([location.recurring]).trigger("change");
				$("#editLocationIDInput").val(location.location_id);
				$("#editLocationPriorityInput").val(location.priority);
				updateEditRangeValue();
				$("#editLatitudeInput").val(location.latitude);
				$("#editLongitudeInput").val(location.longitude);
				$("#editCustomerSelect").val(location.customer_id).trigger("change");
				$("#editDateInput").val(moment(location.date).format(dateformat));
				$("#editStartTimeInput").val(moment(location.date + " " + location.start_time).format(timeformat));
				$("#editEndTimeInput").val(moment(location.date + " " + location.end_time).format(timeformat));
				$("#editRepeatOnSelect").val(location.repeat_on.split(",")).trigger("change");
				$("#editEmployeeSelect").val(location.participants.split(",")).trigger("change");
				$("#editAddressInput").val(location.address);
				$("#addLocationPopup, #editLocationDIV").show();
			}
		}
        
        function hideEditLocationPopup(){
            $("#editLocationForm")[0].reset();
			$("#editRepeatOnSelect").val("").trigger("change");
            $("#editEmployeeSelect").val("").trigger("change");
            $("#addLocationPopup, #editLocationDIV").hide();
        }
	    
	    function initMap(){
            var searchBox = new google.maps.places.SearchBox(document.getElementById('addressInput'));
            var editSearchBox = new google.maps.places.SearchBox(document.getElementById('editAddressInput'));
                    
            google.maps.event.addListener(searchBox, 'places_changed', function() {
                var places = searchBox.getPlaces();
                var i, place;
                for (i = 0; place = places[i]; i++) {
                    (function(place) {
                        var location = place.geometry.location;
                        $("#latitudeInput").val(location.lat());
                        $("#longitudeInput").val(location.lng());
                        $("#addLocationBtn").prop("disabled", false); //enable button when an address is selected.
                    }(place));
                }
            });
            
            google.maps.event.addListener(editSearchBox, 'places_changed', function() {
                var places = editSearchBox.getPlaces();
                var i, place;
                for (i = 0; place = places[i]; i++) {
                    (function(place) {
                        var location = place.geometry.location;
                        $("#editLatitudeInput").val(location.lat());
                        $("#editLongitudeInput").val(location.lng());
                    }(place));
                }
            });
            
            var myOptions = {
                zoom: parseInt(14),
                center: new google.maps.LatLng(46.054899, 14.503739),
                mapTypeId: google.maps.MapTypeId.ROADMAP
            };
            map = new google.maps.Map(document.getElementById('map'), myOptions);
			pMap = new google.maps.Map(document.getElementById('popupMap'), myOptions);
            trafficLayer = new google.maps.TrafficLayer();
            trafficLayer.setMap(map);
            
            
            
		}
		
		function showAddLocationPopup(){
			$("#addLocationForm input[name=recurring]").val([0]).trigger("change");
			$("#repeatOnSelect").val("").trigger("change");
			$("#customerSelect").val("").trigger("change");
			$("#dateInput").val(moment().format(dateformat));
			$("#startTimeInput").val(moment().format(timeformat));
			$("#endTimeInput").val(moment().add(1, "hours").format(timeformat));
		    $("#addLocationPopup, #addLocationDIV").show();
		}
		
		function hideAddLocationPopup(){
			$("#addLocationForm")[0].reset();
			$("#employeeSelect").val("").trigger("change");
		    $("#addLocationPopup, #addLocationDIV").hide();
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
	    
	    function deleteLocation(row){
			var actualRow = $(row).parents('tr');
			if (actualRow.hasClass('child')) {//Check if the current row is a child row
				actualRow = actualRow.prev();//If it is, then point to the row before it (its 'parent')
			}
            var location = dTable.row(actualRow).data();
            swal({
              title: 'Confirm action',
              text: "Are you sure you want to delete this work location?",
              type: 'error',
              showCancelButton: true,
              confirmButtonColor: '#3085d6',
              cancelButtonColor: '#d33',
              confirmButtonText: 'Yes, remove'
            }).then(function () {
                var values = { location_id: location.location_id };
                $.ajax({
                    type: "POST",
                    url: "worklocations/delete",
                    data: values,
                    success: function(msg) {
                        if (msg == "") {
                            swal(
                                'Success!',
                                'Work location was successfully removed.',
                                'success'
                            );
                            getLocations(moment($("#workLocationFromDateInput").val(), dateformat).format("YYYY-MM-DD"), moment($("#workLocationToDateInput").val(), dateformat).format("YYYY-MM-DD"));
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
		
		function deleteRecurringLocation(row){
			var actualRow = $(row).parents('tr');
			if (actualRow.hasClass('child')) {//Check if the current row is a child row
				actualRow = actualRow.prev();//If it is, then point to the row before it (its 'parent')
			}
            var location = bTable.row(actualRow).data();
            swal({
              title: 'Confirm action',
              text: "Are you sure you want to delete this work location?",
              type: 'error',
              showCancelButton: true,
              confirmButtonColor: '#3085d6',
              cancelButtonColor: '#d33',
              confirmButtonText: 'Yes, remove'
            }).then(function () {
                var values = { location_id: location.location_id };
                $.ajax({
                    type: "POST",
                    url: "worklocations/delete",
                    data: values,
                    success: function(msg) {
                        if (msg == "") {
                            swal(
                                'Success!',
                                'Work location was successfully removed.',
                                'success'
                            );
                            getLocations(moment($("#workLocationFromDateInput").val(), dateformat).format("YYYY-MM-DD"), moment($("#workLocationToDateInput").val(), dateformat).format("YYYY-MM-DD"));
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
	</script>
	<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyByTQPUumUXa7XiemK1liQCKT3839oj7DE&callback=initMap&language=en&libraries=places"></script>
</body>
</html>
