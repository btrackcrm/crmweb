<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
<!--<![endif]-->
<head>
	<meta charset="utf-8" />
	<title>Events</title>
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
	<link href="<?= ASSETS_URL . "fullcalendar/fullcalendar.print.css" ?>" rel="stylesheet" media="print" />
	<link href="<?= ASSETS_URL . "fullcalendar/fullcalendar.min.css" ?>" rel="stylesheet" />
	<link href="<?= ASSETS_URL . "dropzone/min/dropzone.min.css" ?>" rel="stylesheet" />
	<link href="<?= ASSETS_URL . "telinput/build/css/intlTelInput.css" ?>" rel="stylesheet" />
	<!-- ================== END BASE CSS STYLE ================== -->
	
	<!-- ================== BEGIN PAGE LEVEL STYLE ================== -->
	<link href="<?= ASSETS_URL . "jquery-jvectormap/jquery-jvectormap.css" ?>" rel="stylesheet" />
	<link href="<?= ASSETS_URL . "bootstrap-datepicker/css/bootstrap-datepicker.css" ?>" rel="stylesheet" />
    <link href="<?= ASSETS_URL . "gritter/css/jquery.gritter.css" ?>" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.6.9/sweetalert2.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.6.9/sweetalert2.min.css">
    <link href="<?= ASSETS_URL . "jquery-file-upload/blueimp-gallery/blueimp-gallery.min.css" ?>" rel="stylesheet" />
    <link href="<?= ASSETS_URL . "jquery-file-upload/css/jquery.fileupload.css" ?>" rel="stylesheet" />
	<link href="<?= ASSETS_URL . "jquery-file-upload/css/jquery.fileupload-ui.css" ?>" rel="stylesheet" />
	<link href="<?= ASSETS_URL . "select2/dist/css/select2.css" ?>" rel="stylesheet" />
	<!-- ================== END PAGE LEVEL STYLE ================== -->
	
	<!-- ================== BEGIN BASE JS ================== -->
	<script src="<?= ASSETS_URL . "pace/pace.min.js" ?>" ></script>
	<!-- ================== END BASE JS ================== -->
</head>
<style>
    #eventsTable{
        width: 100% !important;
    }
    
    #eventMap{
        width: 100%;
        height: 500px;
    }

    
    #addEventDIV, #editEventDIV, #addCustomerDIV, #editCustomerDIV, #mapDIV{
        width: 840px;
        height: auto;
        position: relative;
        margin: 60px auto 0px auto;
    }
    
    #viewEventDIV{
        width: 500px;
        height: auto;
		background-color: #fff;
        margin: 100px auto 0px auto;
		-webkit-box-shadow: 0 24px 38px 3px rgba(0,0,0,0.14), 0 9px 46px 8px rgba(0,0,0,0.12), 0 11px 15px -7px rgba(0,0,0,0.2);
		box-shadow: 0 24px 38px 3px rgba(0,0,0,0.14), 0 9px 46px 8px rgba(0,0,0,0.12), 0 11px 15px -7px rgba(0,0,0,0.2);
    }
	
	.view-event-header{
		flex: none;
		height: 128px;
		overflow: visible;
		position: relative;
		background-color: #4285F4;
	}
	
	.view-event-actions{
		height: 70px;
		padding: 5px;
	}
	
	.view-event-subject{
		font-size: 20px;
		line-height: 26px;
		color: #fff;
		padding: 0 32px 0 64px;
	}
	
	.view-event-body{
		max-height: 450px;
		overflow-y: auto;
	}
	
	.btn-trans{
		background-color: transparent;
	}
	
	.btn-trans:hover{
		background-color: rgba(255,255,255,0.122)
	}
	
	.btn-status{
		background-color: transparent;
		padding: 0px 12px;
		float: right;
	}
	
	.btn-edit{
		position: absolute;
		bottom: -15px;
		left: 15px;
		width: 40px;
		height: 40px;
		background-color: #4285F4 !important;
		-webkit-box-shadow: 0 6px 10px 0 rgba(0,0,0,0.14), 0 1px 18px 0 rgba(0,0,0,0.12), 0 3px 5px -1px rgba(0,0,0,0.2);
		box-shadow: 0 6px 10px 0 rgba(0,0,0,0.14), 0 1px 18px 0 rgba(0,0,0,0.12), 0 3px 5px -1px rgba(0,0,0,0.2);
	}
    
    .tab-content {
        padding: 5px 0px 0px 0px;
        margin-bottom: 20px;
        background: none;
        -webkit-border-radius: 3px;
        -moz-border-radius: 3px;
        border-radius: 3px;
    }
	
	.b-t-g{
		border-top: 1px solid rgba(0,0,0,0.12)
	}
    
    .fa-bell{
        font-size: 14px;
        margin-top: 2px;
    }
    
     .bottom25{
        margin-bottom: 25px;
    }
    
    .left25{
        margin-left: 25px;
    }
    
    .width15{
        width: 15%;
    }
    
    
    #mapContainer{
        width: 100%;
    }
    
    #map{
        height: 80vh;
    }
    
    .span-add{
        display: inline;
        padding: 0;
        width: auto;
        border: 0;
        color: #00acac;
        cursor: pointer;
        transition: all 220ms ease;
    }
    
    .span-add:hover{
        text-decoration: underline;
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
    
    .pointer{
        cursor: pointer;
    }
    
    .hover-underline:hover{
        cursor: pointer;
        text-decoration: underline;
    }
	
	#eventsTable td:last-child{
		min-width: 125px;
	}
	
	.socialnetwork-group-user-avatar {
        display: block;
        float: left;
        height: 42px;
        margin: 0 11px 0 0;
        width: 42px;
        -webkit-border-radius: 50%;
        border-radius: 50%;
    }
    
    .user-default-avatar {
        background: #535c6a url(/assets/img/user-default-avatar.svg) no-repeat center;
        background-size: 50%;
        position: relative;
    }
    
    .user-default-avatar:before{
        content: '';
        position: absolute;
        right: 0px;
        bottom: -2px;
        width: 12px;
        height: 12px;
        border: 2px solid #fff;
        background: #33B679 !important;
        border-radius: 8px;
    }
    
    .user-offline-avatar {
        background: #535c6a url(/assets/img/user-default-avatar.svg) no-repeat center;
        background-size: 50%;
        position: relative;
    }
    
    .user-offline-avatar:before{
        content: '';
        position: absolute;
        right: 0px;
        bottom: -2px;
        width: 12px;
        height: 12px;
        border: 2px solid #fff;
        background: #ff5252 !important;
        border-radius: 8px;
    }
    
    .user-busy-avatar {
        background: #535c6a url(/assets/img/user-default-avatar.svg) no-repeat center;
        background-size: 50%;
        position: relative;
    }
    
    .user-busy-avatar:before{
        content: '';
        position: absolute;
        right: 0px;
        bottom: -2px;
        width: 12px;
        height: 12px;
        border: 2px solid #fff;
        background: #F9C927 !important;
        border-radius: 8px;
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
    					<li class="has-sub active">
    						<a href="javascript:;">
    						    <b class="caret pull-right"></b>
    							<i class="ion-android-calendar"></i> 
    							<span id="eventSpan">Activities</span>
    						</a>
    						<ul class="sub-menu">
    						    <li class="active"><a id="eventLink" href="<?= BASE_URL . "events" ?>">Events</a></li>
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
							<h4 class="m-t-10 m-b-5">Events</h4>
							<div class="m-t-10">
								<button class="btn btn-white btn-sm" onClick="showNewEventPopup()"><i class="far fa-calendar-alt text-success m-r-5"></i>Add an event</button>
								<button id="gAuthorizeBtn" class="btn btn-white btn-sm pull-right" style="display: none;"><i class="fab fa-google text-danger" aria-hidden="true"></i> Sync with Google Calendar</button>
								<button id="gSignOutBtn" class="btn btn-white btn-sm pull-right" style="display: none;"><i class="fab fa-google text-danger" aria-hidden="true"></i> Stop syncing with Google Calendar</button>
							</div>
						</div>
						<!-- END profile-header-info -->
					</div>
					<!-- END profile-header-content -->
					<!-- BEGIN profile-header-tab -->
					<ul class="profile-header-tab nav nav-tabs">
						<li class="nav-item active"><a href="#events-calendar" class="nav-link" data-toggle="tab">CALENDAR</a></li>
						<li class="nav-item"><a href="#events-overview" class="nav-link" data-toggle="tab">OVERVIEW</a></li>
						<li class="nav-item"><a href="#events-map" class="nav-link" data-toggle="tab">LIVE MAP</a></li>
					</ul>
					<!-- END profile-header-tab -->
				</div>
			</div>
			<!-- end profile -->
            <div class="profile-content">
				<div class="tab-content">
					<div class="tab-pane fade" id="events-overview">
						<div class="row">
							<div class="col-md-12">
								<div class="panel panel-primary">
									<div class="panel-heading">
										<div class="panel-heading-btn">
											<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
											<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
											<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
										</div>
										<h4 class="panel-title">Events</h4>
									</div>
									<div class="panel-body">
										<div class="m-b-20">
											<div class="radio radio-css radio-inline radio-danger m-t-0">
												<input type="radio" name="hide_finished" id="wxr1" value="0" checked>
												<label for="wxr1">
													Show only incomplete events
												</label>
											</div>
											<div class="radio radio-css radio-inline radio-success m-t-0">
												<input type="radio" name="hide_finished" id="wxr2" value="1">
												<label for="wxr2">
													Show all events
											</div>
										</div>
										<div class="dataTables_wrapper form-inline dt-bootstrap no-footer">
											<table id="eventsTable" class="table table-striped table-hover table-sm">
												<thead>
													<tr>
														<th>Subject</th>
														<th>Customer</th>
														<th>Location</th>
														<th>Start date</th>
														<th>End date</th>
														<th>Status</th>
														<th>Created by</th>
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
				<div class="tab-pane fade in active" id="events-calendar">
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
							<div class="fc-event"><div class="fc-event-icon"><i class="fa fa-circle fa-fw text-warning"></i></div>Incomplete</div>
							<div class="fc-event"><div class="fc-event-icon"><i class="fa fa-circle fa-fw text-primary"></i></div>In progress</div>
							<div class="fc-event"><div class="fc-event-icon"><i class="fa fa-circle fa-fw text-success"></i></div>Finished</div>
							<div class="fc-event"><div class="fc-event-icon"><i class="fa fa-circle fa-fw text-danger"></i></div>Canceled</div>
						</div>
					</div>
					<div id="calendar" class="vertical-box-column p-15 calendar">
						
					</div>
				</div>
				<div class="tab-pane fade" id="events-map">
					<div id="map">
						
					</div>
				</div>
				<div class="popupContainer" id="customerPopupDIV" hidden>
					<div class="panel panel-primary" id="addCustomerDIV" hidden>
						<div class="panel-heading">
							<div class="panel-heading-btn">
								<button onclick="hideNewCustomerPopup()" class="btn btn-xs btn-icon btn-circle btn-default"><i class="fa fa-times"></i>
								</button>
							</div>
							<h4 class="panel-title">Add a customer</h4>
						</div>
						<div class="panel-body">
							<form id="addCustomerForm" action="<?= BASE_URL . " customer/add " ?>" method="post" class="form-horizontal">
								<input type="hidden" id="newCustomerLatitudeInput" name="latitude" />
								<input type="hidden" id="newCustomerLongitudeInput" name="longitude" />
								<div class="form-group">
									<div class="col-md-6">
										<label>Search for companies:</label>
										<div class="input-group">
										  <input id="vatInput" type="text" class="form-control" placeholder="Enter company name or VAT">
										  <span class="input-group-btn">
											<button class="btn btn-success" type="button" onClick="searchByVAT()"><i class="fa fa-search"></i>&nbsp;Search</button>
										  </span>
										</div>
									</div>
									<div class="col-md-6">
										<label>Search results:</label>
										<select id="searchResultsSelect" class="form-control">
											
										</select>
									</div>
								</div>
								<div class="form-group">
									<div class="col-md-3">
										<label>VAT:</label>
										<input id="addCustomerVATInput" type="text" class="form-control" name="customer_vat" placeholder="Enter VAT" />
									</div>
									<div class="col-md-3">
										<label>Visibility:</label><br>
										<div class="radio radio-css radio-inline radio-success">
											<input type="radio" id="acb1" name="customer_visibility" value="1" checked>
											<label for="acb1">
												Public
											</label>
										</div>
										<div class="radio radio-css radio-inline radio-danger">
											<input type="radio" id="acb2" name="customer_visibility" value="0">
											<label for="acb2">
												Private
											</label>
										</div>
									</div>
									<div class="col-md-3">
										<label>Business entity:</label><br>
										<div class="radio radio-css radio-inline radio-success">
											<input type="radio" id="ncb1" name="business_entity" value="1">
											<label for="ncb1">
												Yes
											</label>
										</div>
										<div class="radio radio-css radio-inline radio-danger">
											<input type="radio" id="ncb2" name="business_entity" value="0" checked>
											<label for="ncb2">
												No
											</label>
										</div>
									</div>
									<div class="col-md-3">
										<label>Tax payer:</label><br>
										<div class="radio radio-css radio-inline radio-success">
											<input type="radio" id="ncr1" name="taxpayer" value="1">
											<label for="ncr1">
												Yes
											</label>
										</div>
										<div class="radio radio-css radio-inline radio-danger">
											<input type="radio" id="ncr2" name="taxpayer" value="0" checked>
											<label for="ncr2">
												No
											</label>
										</div>
									</div>
								</div>
								<div class="form-group">
									<div class="col-xs-12 col-sm-6 col-md-8">
										<label>Company name: <span class="red">*</span>
										</label>
										<input id="addCustomerNameInput" type="text" name="customer_name" class="form-control" placeholder="Enter company name or title" required />
									</div>
									<div class="col-md-4">
										<label>Industry:</label>
										<select class="form-control" name="customer_industry">
											<option>Information technology</option>
											<option>Telecommunication</option>
											<option>Manufacturing</option>
											<option>Banking services</option>
											<option>Consulting</option>
											<option>Finance</option>
											<option>Government</option>
											<option>Delivery</option>
											<option>Entertainment</option>
											<option>Non-profit</option>
											<option>Other</option>
										</select>
									</div>
								</div>
								<div class="form-group">
									<div class="col-md-4">
										<label>Phone number:
										</label>
										<input type="tel" name="customer_phone[]" class="tel-input form-control m-b-5" />
										<div id="phoneNrsDIV" class="m-b-5">
											
										</div>
										<span class="span-add" onClick="addPhoneNr()"><i class="fas fa-plus-circle m-r-5"></i>Add a phone number</span>
									</div>
									<div class="col-md-4">
										<label>E-Mail: 
										</label>
										<input type="email" name="customer_email[]" class="form-control" placeholder="E-mail" />
										<div id="emailsDIV" class="m-b-5">
											
										</div>
										<span class="span-add" onClick="addEmail()"><i class="fas fa-plus-circle m-r-5"></i>Add an email address</span>
									</div>
									<div class="col-md-4">
										<label>Website:</label>
										<input type="text" class="form-control" name="customer_website" placeholder="Website address" />
									</div>
								</div>
								<div class="form-group">
									<div class="col-xs-12 col-sm-4 col-md-4">
										<label>Building: <span class="red">*</span></label>
										<input type="text" class="form-control" name="customer_building" placeholder="Enter building name" required />
									</div>
									<div class="col-xs-12 col-sm-8 col-md-8">
										<label>Address: <span class="red">*</span></label>
										<input id="customerAddressInput" type="text" name="customer_address" class="form-control" placeholder="Enter an address" required />
									</div>
								</div>
								<div class="form-group">
									<div class="col-xs-12 col-sm-6 col-md-4">
										<label>Key account manager:</label>
										<select id="customerEmployeeSelect" name="employee_id" class="form-control">
											<option value="">Choose an employee</option>
										</select>
									</div>
									<div class="col-md-8">
										<label>Importance</label>
										<input id="newCustomerRangeInput" type="range" min="1" max="10" value="5" class="slider" name="customer_importance" onInput="updateRangeValue()">
										<label id="newCustomerRangeValue" style="margin-top: 3px;">5</label>
									</div>
								</div>
								<div class="form-group">
									<div class="col-md-12">
										<label>Notes: </label>
										<textarea class="form-control" name="customer_notes" placeholder="Enter notes" rows="4"></textarea>
									</div>
								</div>
								<button id="addCustomerBtn" class="btn material primary" disabled>Add customer</button>
								<button type="button" class="btn material danger pull-right" onClick="hideNewCustomerPopup()">Close</button>
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
								<h4 class="panel-title">Location</h4>
							</div>
							<div class="panel-body p-0">
								<div id="eventMap">
									
								</div>
							</div>
						</div>
				</div>
				<div class="popupContainer" id="viewEventPopup" hidden>
					<div id="viewEventDIV">
						<div class="view-event-header m-b-25">
							<div class="view-event-actions">
								<button onclick="hideViewEventPopup()" data-toggle="tooltip" data-placement="bottom" title="Close" class="btn btn-trans btn-circle f-s-16 pull-right"><i class="fa fa-times text-white"></i></button>	
								<button onclick="viewEventPage()" data-toggle="tooltip" data-placement="bottom" title="Event page" class="btn btn-trans btn-circle f-s-16 pull-right"><i class="fas fa-clipboard text-white"></i></button>		
								<button onclick="cancelEventID()" data-toggle="tooltip" data-placement="bottom" title="Delete event" class="btn btn-trans btn-circle f-s-16 pull-right"><i class="fas fa-trash-alt text-white"></i></button>
							</div>
							<button onClick="showEditEventPopupID()" data-toggle="tooltip" data-placement="bottom" title="Edit event" class="btn btn-primary btn-circle btn-edit"><i class="fas fa-pencil-alt text-white"></i></button>
							<p class="view-event-subject" id="event-subject">
								Povabilo na sestanek
							<p>
						</div>
						<div class="view-event-body m-t-10 p-t-5 p-l-25 p-r-25 p-b-25 f-s-14">
							<div class="row m-b-15">
								<div class="col-md-1" id="status-circle">
									
								</div>
								<div class="col-md-11" id="event-status">
									
								</div>
							</div>
							<div class="row m-b-15">
								<div class="col-md-1">
									<i class="far fa-clock"></i>
								</div>
								<div class="col-md-11" id="event-duration">
								</div>
							</div>
							<div class="row m-b-15">
								<div class="col-md-1">
									<i class="fas fa-users"></i>
								</div>
								<div class="col-md-11" id="event-participants">
								</div>
							</div>
							<div class="row m-b-15">
								<div class="col-md-1">
									<i class="fas fa-map-marker-alt text-danger"></i>
								</div>
								<div class="col-md-11" id="event-location">
								</div>
							</div>
							<div class="row m-b-15">
								<div class="col-md-1">
									<i class="fas fa-align-left"></i>
								</div>
								<div class="col-md-11" id="event-description">
								</div>
							</div>
						</div>
						<div class="m-t-10 p-l-25 p-r-25 p-t-10 p-b-10 b-t-g f-s-14">
							<div class="row">
								<div class="col-md-2">
									<span class="f-w-600">Mark as</span>
								</div>
								<div class="col-md-10">
									<button onClick="setEventStatus(3)" class="btn btn-status text-danger">Canceled</button>
									<button onClick="setEventStatus(2)" class="btn btn-status text-success">Finished</button>
									<button onClick="setEventStatus(1)" class="btn btn-status text-primary">In progress</button>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="popupContainer" id="eventPopupDIV" hidden>
							<div class="panel panel-primary" id="addEventDIV" hidden>
								<div class="panel-heading">
									<div class="panel-heading-btn">
										<button onclick="hideNewEventPopup()" class="btn btn-xs btn-icon btn-circle btn-default" ><i class="fa fa-times"></i></button>
									</div>
									<h4 class="panel-title">Add an event</h4>
								</div>
								<div class="panel-body">
									<form id="addEventForm" action="<?= BASE_URL . "event/add" ?>" method="post" class="form-horizontal">
										<input type="hidden" id="hiddenNewEventLatitudeInput" name="latitude" />
										<input type="hidden" id="hiddenNewEventLongitudeInput" name="longitude" />
										<div class="form-group">
											<div class="col-xs-12 col-sm-6 col-md-4">
												<label>Event type: <span class="text-danger">*</span></label><br/>
												<div class="radio radio-css radio-inline radio-primary">
													<input type="radio" name="event_type" id="mmr1" value="Regular" checked>
													<label for="mmr1">
														Regular
													</label>
												</div>
												<div class="radio radio-css radio-inline radio-primary">
													<input type="radio" name="event_type" id="mmr2" value="Meeting">
													<label for="mmr2">
													   Meeting
													</label>
												</div>
												<div class="radio radio-css radio-inline radio-primary">
													<input type="radio" name="event_type" id="mmr3" value="Task">
													<label for="mmr3">
													   Task
													</label>
												</div>
											</div>
											<div class="col-xs-12 col-sm-6 col-md-4">
												<label>Importance: <span class="text-danger">*</span></label><br/>
												<div class="radio radio-css radio-inline radio-success">
													<input type="radio" name="importance" id="nmr1" value="Low">
													<label for="nmr1">
														Low
													</label>
												</div>
												<div class="radio radio-css radio-inline radio-primary">
													<input type="radio" name="importance" id="nmr2" value="Normal" checked>
													<label for="nmr2">
													   Normal
													</label>
												</div>
												<div class="radio radio-css radio-inline radio-danger">
													<input type="radio" name="importance" id="nmr3" value="High">
													<label for="nmr3">
													   High
													</label>
												</div>
											</div>
										</div>
										<div class="form-group">
											<div class="col-xs-12 col-sm-12 col-md-12">
												<label>Subject: <span class="text-danger">*</span></label>
												<input type="text" name="event_subject" class="form-control"  placeholder="Subject" required />
											</div>
										</div>
										<div class="form-group">
											<div class="col-xs-12 col-sm-6 col-md-6">
												<label>Customer: </label>
												<select id="eventCustomerSelect" class="form-control" name="customer_id" >
													<option value="">None</option>
												</select>
												<span class="btn btn-link p-0" onclick="showNewCustomerPopup()">Add a customer</span>
											</div>
											<div class="col-xs-12 col-sm-6 col-md-6">
												<label>Subsidiary:</label>
												<select id="eventSubsidiarySelect" class="form-control" name="subsidiary_id" >
													<option value="">None</option>
												</select>
											</div>
										</div>
										<div class="form-group">
											<div class="col-md-12">
												<label>Location: </label>
												<input type="text" class="form-control" name="event_address" id="newEventAddressInput" />
											</div>
										</div>
										<div class="form-group">
											<div class="col-xs-12 col-sm-6 col-md-3">
												<label>Start date: <span class="text-danger">*</span></label>
												<div class="input-group event-date-picker">
													<input id="eventStartDateInput" type="text" name="event_startdate" class="form-control"  placeholder="Choose start date" required />
													<span class="input-group-addon btn bg-primary">
													   <span class="fa fa-calendar text-white"></span>
													</span>                    
												</div>
											</div>
											<div class="col-sm-6 col-md-3">
												<label>Start time: <span class="text-danger">*</span></label>
												<div class="input-group event-time-picker">
													<input id="eventStartTimeInput" type="text" name="event_starttime" class="form-control"  placeholder="Choose start time" required />
													<span class="input-group-addon btn bg-primary">
													   <span class="fa fa-clock text-white"></span>
													</span>                    
												</div>
											</div>
											<div class="col-xs-12 col-sm-6 col-md-3">
												<label>End date: <span class="text-danger">*</span></label>
												<div class="input-group event-date-picker">
													<input id="eventEndDateInput" type="text" name="event_enddate" class="form-control"  placeholder="Choose end date" required />
													<span class="input-group-addon btn bg-primary">
													   <span class="fa fa-calendar text-white"></span>
													</span>                    
												</div>
											</div>
											<div class="col-md-3">
												<label>End time: <span class="text-danger">*</span></label>
												<div class="input-group event-time-picker">
													<input id="eventEndTimeInput" type="text" name="event_endtime" class="form-control"  placeholder="Choose end time" required />
													<span class="input-group-addon btn bg-primary">
													   <span class="fa fa-clock text-white"></span>
													</span>                    
												</div>
											</div>
										</div>
										<div class="form-group">
											<div class="col-md-12 hide" id="eventEmployeeSelectDIV">
												<label>Participants:</label>
												<select id="eventEmployeeSelect" name="participants[]" class="form-control" multiple required>
													
												</select>
											</div>
										</div>
										<div class="form-group">
											<div class="col-md-6">
												<label><i class="fas fa-users text-primary"></i> External participants</label><br>
												<div id="newEventExternalParticipantsDIV">
														
												</div>
												<button type="button" class="btn btn-link p-0" onClick="addNewEventExternalParticipant()">Add external participant</span>
											</div>
											<div class="col-md-6">
												<label><i class="fas fa-bell text-primary"></i> Reminders</label><br>
												<div id="newEventReminderDIV">
														
												</div>
												<button type="button" class="btn btn-link p-0" onClick="addNewEventReminder()">Add a reminder</span>
											</div>
										</div>
										<div class="form-group">
											<div class="col-xs-12 col-sm-12 col-md-12">
												<label>Description: </label>
												<textarea class="form-control" name="event_description" rows="4" placeholder="Enter event description or notes"></textarea>
											</div>
										</div>
										<div class="form-group">
											<div class="col-md-12">
												<label><i class="fas fa-paperclip text-primary"></i> Attachments</label><br>
												<ul id="files" class="attached-document clearfix m-0">
												</ul>
												<span class="btn btn-link p-0 fileinput-button">
													<span>Attach a file</span>
													<!-- The file input field used as target for the file upload widget -->
													<input id="eventFileUpload" type="file" name="file" multiple>
												</span>
											</div>
										</div>
								</div>
								<div class="panel-footer">
									<button id="addEventBtn" class="btn btn-success">Add event</button>
									<button type="button" class="btn btn-primary pull-right" onClick="hideNewEventPopup()">Close</button>
									</form>
								</div>
							</div>
						<div class="panel panel-primary" id="editEventDIV" hidden>
							<div class="panel-heading">
								<div class="panel-heading-btn">
									<button class="btn btn-xs btn-icon btn-circle btn-default" onClick="hideEditEventPopup()"><i class="fa fa-times"></i></button>
								</div>
								<h4 class="panel-title">Edit event</h4>
							</div>
							<div class="panel-body">
									<form id="editEventForm" action="<?= BASE_URL . "event/edit" ?>" method="post" class="form-horizontal">
										<input id="hiddenEditEventIDInput" name="event_id" type="hidden" />
										<input type="hidden" id="hiddenEditEventLatitudeInput" name="latitude" />
										<input type="hidden" id="hiddenEditEventLongitudeInput" name="longitude" />
										<div class="form-group">
											<div class="col-md-12">
													<label>Event status: </label><br/>
													<div class="radio radio-css radio-inline radio-warning">
														<input type="radio" name="status" id="ms1" value="0">
														<label for="ms1">
															Incomplete
														</label>
													</div>
													<div class="radio radio-css radio-inline radio-primary">
														<input type="radio" name="status" id="ms3" value="1">
														<label for="ms3">
														   In progress
														</label>
													</div>
													<div class="radio radio-css radio-inline radio-success">
														<input type="radio" name="status" id="ms4" value="2">
														<label for="ms4">
														   Finished
														</label>
													</div>
													<div class="radio radio-css radio-inline radio-danger">
														<input type="radio" name="status" id="ms5" value="3">
														<label for="ms5">
														   Canceled
														</label>
													</div>
											</div>
										</div>
										<div class="form-group">
											<div class="col-xs-12 col-sm-6 col-md-4">
												<label>Event type: <span class="text-danger">*</span></label><br/>
												<div class="radio radio-css radio-inline radio-primary">
													<input type="radio" name="event_type" id="emmr1" value="Regular">
													<label for="emmr1">
														Regular
													</label>
												</div>
												<div class="radio radio-css radio-inline radio-primary">
													<input type="radio" name="event_type" id="emmr2" value="Meeting">
													<label for="emmr2">
													   Meeting
													</label>
												</div>
												<div class="radio radio-css radio-inline radio-primary">
													<input type="radio" name="event_type" id="emmr3" value="Task">
													<label for="emmr3">
													   Task
													</label>
												</div>
											</div>
											<div class="col-md-4">
												<label>Importance: <span class="text-danger">*</span></label><br/>
												<div class="radio radio-css radio-inline radio-success">
													<input type="radio" name="importance" id="enmr1" value="Low">
													<label for="enmr1">
														Low
													</label>
												</div>
												<div class="radio radio-css radio-inline radio-primary">
													<input type="radio" name="importance" id="enmr2" value="Normal" checked>
													<label for="enmr2">
													   Normal
													</label>
												</div>
												<div class="radio radio-css radio-inline radio-danger">
													<input type="radio" name="importance" id="enmr3" value="High">
													<label for="enmr3">
													   High
													</label>
												</div>
											</div>
										</div>
										<div class="form-group">
											<div class="col-xs-12 col-sm-21 col-md-12">
												<label>Subject: <span class="text-danger">*</span></label>
												<input id="editEventSubjectInput" type="text" name="event_subject" class="form-control"  placeholder="Subject" required />
											</div>
										</div>
										<div class="form-group">
											<div class="col-xs-12 col-sm-6 col-md-6">
												<label>Customer: </label>
												<select id="editEventCustomerSelect" class="form-control" name="customer_id" >
													<option value="">None</option>
												</select>
											</div>
											<div class="col-xs-12 col-sm-6 col-md-6">
												<label>Subsidiary:</label>
												<select id="editEventSubsidiarySelect" class="form-control" name="subsidiary_id" >
													<option value="">None</option>
												</select>
											</div>
										</div>
										<div class="form-group">
											<div class="col-md-12">
												<label>Location: </label>
												<input type="text" class="form-control" name="event_address" id="editEventAddressInput" />
											</div>
										</div>
										<div class="form-group">
											<div class="col-xs-12 col-sm-6 col-md-3">
												<label>Start date: <span class="text-danger">*</span></label>
												<div class="input-group event-date-picker">
													<input id="editEventStartDateInput" type="text" name="event_startdate" class="form-control"  placeholder="Choose start date" required />
													<span class="input-group-addon btn bg-primary">
													   <span class="fa fa-calendar text-white"></span>
													</span>                    
												</div>
											</div>
											<div class="col-xs-12 col-sm-6 col-md-3">
												<label>Start time: <span class="text-danger">*</span></label>
												<div class="input-group event-time-picker">
													<input id="editEventStartTimeInput" type="text" name="event_starttime" class="form-control"  placeholder="Choose start time" required />
													<span class="input-group-addon btn bg-primary">
													   <span class="fa fa-clock text-white"></span>
													</span>                    
												</div>
											</div>
											<div class="col-xs-12 col-sm-6 col-md-3">
												<label>End date: <span class="text-danger">*</span></label>
												<div class="input-group event-date-picker">
													<input id="editEventEndDateInput" type="text" name="event_enddate" class="form-control"  placeholder="Choose end date" required />
													<span class="input-group-addon btn bg-primary">
													   <span class="fa fa-calendar text-white"></span>
													</span>                    
												</div>
											</div>
											<div class="col-xs-12 col-sm-6 col-md-3">
												<label>End time: <span class="text-danger">*</span></label>
												<div class="input-group event-time-picker">
													<input id="editEventEndTimeInput" type="text" name="event_endtime" class="form-control"  placeholder="Choose end time" required />
													<span class="input-group-addon btn bg-primary">
													   <span class="fa fa-clock text-white"></span>
													</span>                    
												</div>
											</div>
										</div>
										<div class="form-group">
											<div class="col-md-12 hide" id="editEventEmployeeSelectDIV">
												<label>Participants:</label>
												<select id="editEventEmployeeSelect" name="participants[]" class="form-control" multiple required>
													
												</select>
											</div>
										</div>
										<div class="form-group">
											<div class="col-md-6">
												<label><i class="fas fa-users text-primary"></i> External participants</label><br>
												<div id="existingParticipantsDIV">
												
												</div>
												<div id="editEventExternalParticipantsDIV">
														
												</div>
												<button type="button" class="btn btn-link p-0" onClick="addEditEventExternalParticipant()">Add external participant</span>
											</div>
											<div class="col-md-6">
												<label><i class="fas fa-bell text-primary"></i> Reminders</label><br>
												<div id="existingReminderDIV">
												</div>
												<div id="editEventReminderDIV">
														
												</div>
												<button type="button" class="btn btn-link p-0" onClick="addEditEventReminder()">Add a reminder</span>
											</div>
										</div>
										<div class="form-group">
											<div class="col-xs-12 col-sm-12 col-md-12">
												<label>Description: </label>
												<textarea id="editEventDescriptionInput" class="form-control" name="event_description" rows="4" placeholder="Enter event description or notes"></textarea>
											</div>
										</div> 
										<div class="form-group">
											<div class="col-md-12">
												<label><i class="fas fa-paperclip text-primary"></i> Attachments</label><br>
												<ul id="editEventFiles" class="attached-document clearfix m-0">
												</ul>
												<span class="btn btn-link p-0 fileinput-button">
													<span>Attach a file</span>
													<!-- The file input field used as target for the file upload widget -->
													<input id="editEventFileUpload" type="file" name="file" multiple>
												</span>
											</div>
										</div>
							</div>
							<div class="panel-footer">
								<button id="editEventBtn" class="btn btn-success pull-left m-r-10">Edit event</button>
								<button type="button" class="btn btn-danger pull-left" onClick="cancelEventID()">Delete event</button>
								<button type="button" onClick="hideEditEventPopup()" class="btn btn-primary pull-right">Close</button>
								</form>
							</div>
						</div>
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
	<script src="<?= ASSETS_URL . "fullcalendar/lib/moment.min.js" ?>"></script>
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
	<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/js/bootstrap-datetimepicker.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/css/bootstrap-datetimepicker.min.css" rel="stylesheet"/>
    <script src="<?= ASSETS_URL . "fullcalendar/fullcalendar.min.js" ?>"></script>
    <script src="<?= ASSETS_URL . "dropzone/min/dropzone.min.js" ?>"></script>
    <script src="<?= ASSETS_URL . "jquery-file-upload/js/jquery.fileupload.js" ?>"></script>
    <script src="<?= ASSETS_URL . "telinput/build/js/intlTelInput.min.js" ?>"></script>
    <script src="<?= ASSETS_URL . "telinput/build/js/utils.js" ?>"></script>
    <script src="<?= ASSETS_URL . "select2/dist/js/select2.full.min.js" ?>"></script>
	<!-- ================== END PAGE LEVEL JS ================== -->
	
	<script>
		var loggedEmployee = <?php echo json_encode($_SESSION["id"]); ?>;
	    var isAdmin = <?php echo json_encode($_SESSION["admin"]); ?>;
		var dateformat = <?php echo json_encode($_SESSION["dateformat"]); ?>;
		var timeformat = <?php echo json_encode($_SESSION["timeformat"]); ?>;
		
	    var dTable;
	    var customersArray;
	    var subsidiariesArray;
	    var eventArray;
	    var employeeArray;
	    var currentEvent;
	    var selectedEmployee = loggedEmployee;
		var selectedStatus = -1;
	    var workFrom;
	    var workTo;
	    var firstPageLoad = true;
	    
	    var eventFiles = [];
	    var editEventFiles = [];
	    var trafficLayer;
	    var map;
	    var eventMap;
	    var markers = [];
	    var mapMarker;
		
		var calendarInitiated = false;
	    
	    var geocoder;
		var firstMapResize = true;
		
		var googleEvents = 0;
        var googleEventCount = 0;
        var googleSignedIn = false;
		var eventUIDs = [];
		
		var displayChanged = false;
		
		var isDraggingEvent = false;
		
		var hideFinished = true;
	    
	    // Client ID and API key from the Developer Console
        var CLIENT_ID = '199528804001-7dj1br8mm8le62dhfo2465666ikobfrt.apps.googleusercontent.com';
        var API_KEY = 'AIzaSyA30xyNam0_t-0MIrFtJ9M9ovgq9eB9AgE';
        
        // Array of API discovery doc URLs for APIs used by the quickstart
        var DISCOVERY_DOCS = ["https://www.googleapis.com/discovery/v1/apis/calendar/v3/rest"];
        
        // Authorization scopes required by the API; multiple scopes can be
        // included, separated by spaces.
        var SCOPES = "https://www.googleapis.com/auth/calendar";
        
        /**
         *  On load, called to load the auth2 library and API client library.
         */
        function handleClientLoad() {
            gapi.load('client:auth2', initClient);
        }
        
        /**
         *  Initializes the API client library and sets up sign-in state
         *  listeners.
         */
        function initClient() {
            gapi.client.init({
                apiKey: API_KEY,
                clientId: CLIENT_ID,
                discoveryDocs: DISCOVERY_DOCS,
                scope: SCOPES
            }).then(function() {
                // Listen for sign-in state changes.
                gapi.auth2.getAuthInstance().isSignedIn.listen(updateSigninStatus);
        
                // Handle the initial sign-in state.
                var signedIn = gapi.auth2.getAuthInstance().isSignedIn.get();
                updateSigninStatus(signedIn);
             
                $("#gAuthorizeBtn").click(function(e) {
                    handleAuthClick(e);
                });
                $("#gSignOutBtn").click(function(e) {
                    handleSignoutClick(e);
                });
            });
        }
        
        /**
         *  Called when the signed in status changes, to update the UI
         *  appropriately. After a sign-in, the API is called.
         */
        function updateSigninStatus(isSignedIn) {
            googleSignedIn = isSignedIn;
            if (isSignedIn) {
                $("#gAuthorizeBtn").hide();
                $("#gSignOutBtn").show();
				googleEvents = 0;
				googleEventCount = 0;
                listUpcomingEvents();
            } else {
                $("#gAuthorizeBtn").show();
                $("#gSignOutBtn").hide();
            }
        }
        
        /**
         *  Sign in the user upon button click.
         */
        function handleAuthClick(event) {
            gapi.auth2.getAuthInstance().signIn();
        }
        
        /**
         *  Sign out the user upon button click.
         */
        function handleSignoutClick(event) {
            gapi.auth2.getAuthInstance().signOut();
        }
        
        /**
         * Append a pre element to the body containing the given message
         * as its text node. Used to display the results of the API call.
         *
         * @param {string} message Text to be placed in pre element.
         */
        function appendEvent(id, subject, description, dateStart, dateEnd, location, last_modified) {
            if (description == null){
                description = "";
            }
            var start = new Date(dateStart);
            var end = new Date(dateEnd);
            var startDate = moment(start).format('YYYY-MM-DD');
            var startTime = moment(start).format('HH:mm');
            var endDate = moment(end).format('YYYY-MM-DD');
            var endTime = moment(end).format('HH:mm');
            
            var postData = { 
                event_uid: id,
                event_subject: subject,
                event_startdate: startDate,
                event_starttime: startTime,
                event_enddate: endDate,
                event_endtime: endTime,
                event_description: description,
                event_address: location,
                latitude: "",
                longitude: "",
                last_modified: last_modified
            };
            
            $.ajax({
                type: "POST",
                url: "events/checkGoogle",
                data: postData,
                dataType: "json",
                success: function(result) {
					console.log(result);
                    var exists = result.exists;
                    googleEventCount++;
                    if (googleEventCount == googleEvents){
						checkForDeletedEvents();
                        if (isAdmin == 1){
                            getEvents();
                        }else{
                            getEventsEmployee(loggedEmployee);
                        } //Load all events once we've retrieved all Google events from calendar.
                    }
                    if (!exists){
                        geocoder.geocode({ 'address': location}, function(results, status) {
                                if (status == 'OK') {
                                    var latitude = results[0].geometry.location.lat();
                                    var longitude = results[0].geometry.location.lng();
                                    var locationData = { event_id: result.event_id, latitude: latitude, longitude: longitude };
                                    $.ajax({
                                        type: "POST",
                                        url: "event/updatelocation",
                                        data: locationData,
                                        success: function(result) {
                                           
                                        }
                                    });
                                }
                        });
                    }else{
                        if (result.event_location != location){
                            geocoder.geocode({ 'address': location}, function(results, status) {
                                if (status == 'OK') {
                                    var latitude = results[0].geometry.location.lat();
                                    var longitude = results[0].geometry.location.lng();
                                    var locationData = { event_id: result.event_id, latitude: latitude, longitude: longitude };
                                    $.ajax({
                                        type: "POST",
                                        url: "event/updatelocation",
                                        data: locationData,
                                        success: function(result) {
                                            
                                        }
                                    });
                                }
                            });
                        }
                    }
                }
            });
            
        }
        
        /**
         * Print the summary and start datetime/date of the next ten events in
         * the authorized user's calendar. If no events are found an
         * appropriate message is printed.
         */
        function listUpcomingEvents() {
            eventUIDs = [];
            var curDate = new Date();
            var lastWeek = curDate - 1000 * 60 * 60 * 24 * 7; // date for 7 days ago
            lastWeek = new Date(lastWeek);
            gapi.client.calendar.events.list({
                'calendarId': 'primary',
                'showDeleted': false,
                'singleEvents': true,
                'timeMin': (lastWeek).toISOString(),
                'orderBy': 'startTime'
            }).then(function(response) {
                var events = response.result.items;
                googleEvents = events.length;
                if (events.length > 0) {
                    for (i = 0; i < events.length; i++) {
                        var event = events[i];
                        var dateStart = event.start.dateTime;
                        var dateEnd = event.end.dateTime;
                        if (!dateStart) {
                            dateStart = event.start.date;
                        }
                        if (!dateEnd) {
                            dateEnd = event.start.end;
                        }
                        var last_modified = event.updated;
                        var location = event.location;
						if (event.location == null || event.location == undefined){
							location = "";
						}
                        appendEvent(event.id, event.summary, event.description, dateStart, dateEnd, location, last_modified);
						eventUIDs.push(event.id);
                    }
                }else{
					checkForDeletedEvents();
                    if (isAdmin == 1){
                        getEvents();
                    }else{
                        getEventsEmployee(loggedEmployee);
                    }
                }
                
            });
        }
        
        Date.prototype.toIsoString = function() {
                var tzo = -this.getTimezoneOffset(),
                    dif = tzo >= 0 ? '+' : '-',
                    pad = function(num) {
                        var norm = Math.floor(Math.abs(num));
                        return (norm < 10 ? '0' : '') + norm;
                    };
                return this.getFullYear() +
                    '-' + pad(this.getMonth() + 1) +
                    '-' + pad(this.getDate()) +
                    'T' + pad(this.getHours()) +
                    ':' + pad(this.getMinutes()) +
                    ':' + pad(this.getSeconds()) +
                    dif + pad(tzo / 60) +
                    ':' + pad(tzo % 60);
        }
	    
		$(document).ready(function() {
			
			getMenuStatistics(loggedEmployee);
		
			try{
			    var wF = <?php echo json_encode($_SESSION["workfrom"]); ?>;
			    if (wF != ""){
			        workFrom = wF;
			    }
			    var wT = <?php echo json_encode($_SESSION["workto"]); ?>;
			    if (wT != ""){
			        workTo = wT;
			    }
			}catch (err){
			    
			}
			
			$("input[type=radio][name=hide_finished]").change(function(){
				var selectedValue = $(this).val();
				if (selectedValue == 1){
					hideFinished = false;
				}else{
					hideFinished = true;
				}
				displayChanged = true;
				if (isAdmin == 1){
					getEvents();
				}else{
					getEventsEmployee(loggedEmployee);
				}
			});
			
			if (isAdmin == 1){
			    $("#eventEmployeeSelectDIV, #editEventEmployeeSelectDIV").removeClass("hide");
				$("#calendarEmployeeDIV").show();
				$("#addCalendarEmployeeSelect").select2({width: "100%"});
				$("#addCalendarEmployeeSelect").on("change", function(){
					if ($(this).val() != ""){
						var showCalendarsFor = Cookies.get("events_calendars");
						if (showCalendarsFor == undefined || showCalendarsFor == null || showCalendarsFor == ""){
							showCalendarsFor = loggedEmployee;
						}
						var showFor = showCalendarsFor.split(",");
						showFor.push($(this).val());
						Cookies.set("events_calendars", showFor.join(","), { expires: 365 });
						getEmployees();
					}
				});
			}
			
			$("a[href='#events-map']").on('shown.bs.tab', function(){
				if (firstMapResize){
					var myOptions = {
						zoom: parseInt(14),
						center: new google.maps.LatLng(46.053517, 14.505625),
						mapTypeId: google.maps.MapTypeId.ROADMAP
					};
					map = new google.maps.Map(document.getElementById('map'), myOptions);
					drawOnMap(eventArray);
				}
				firstMapResize = !firstMapResize;
            });
            
            $("a[href='#events-calendar']").on('shown.bs.tab', function(){
                $('#calendar').fullCalendar('rerenderEvents');
            });
			
			$(".tel-input").intlTelInput({ initialCountry: "auto",
			geoIpLookup: function(callback) {
                $.get('https://ipinfo.io', function() {}, "jsonp").always(function(resp) {
                  var countryCode = (resp && resp.country) ? resp.country : "";
                  callback(countryCode);
                });
            }});
			
			$("#eventEmployeeSelect, #editEventEmployeeSelect, #eventCustomerSelect, #editEventCustomerSelect, #eventSubsidiarySelect, #editEventSubsidiarySelect").select2({width: "100%"});
			
            $('#eventFileUpload').fileupload({
               url: "event/upload",
               dataType : 'json',
               add : function(e,data){
                    $.each(data.files, function (index, file) {
						$("#files").append('<li class="fa-file">' +
											'<div class="document-file">' +
												'<a href="' + "<?= UPLOADS_URL ?>" + "EventFiles/" + file.name + '" download="' + file.name  + '" ><i class="fa fa-file-image"></i></a>' +
											'</div>' +
											'<div class="document-name"><a href="' + "<?= UPLOADS_URL ?>" + "EventFiles/" + file.name  + '" download="' + file.name  + '" >' + file.name  + '</a></div>' +
										'</li>');
                    });
					$("#addEventBtn").html('<i class="fa fa-spinner fa-spin"></i> Uploading file...');
                    $("#addEventBtn").prop("disabled", true);
                    data.submit();
               },
               
               done: function(e,data){
                   if (!data.result.error){
                       eventFiles.push(data.result.filename);
                   }else{
					   swal(
							'Error!',
							'The server encountered the following error: ' + data.result.message,
							'error'
						);
                   }
				   $("#addEventBtn").html("Add event");
                   $("#addEventBtn").prop("disabled", false);
               }
            });
            
            $('#editEventFileUpload').fileupload({
               url: "event/upload",
               dataType : 'json',
               add : function(e,data){
                    $.each(data.files, function (index, file) {
                        $("#editEventFiles").append('<li class="fa-file">' +
											'<div class="document-file">' +
												'<a href="' + "<?= UPLOADS_URL ?>" + "EventFiles/" + file.name + '" download="' + file.name  + '" ><i class="fa fa-file-image"></i></a>' +
											'</div>' +
											'<div class="document-name"><a href="' + "<?= UPLOADS_URL ?>" + "EventFiles/" + file.name  + '" download="' + file.name  + '" >' + file.name  + '</a></div>' +
										'</li>');
                    });
					$("#editEventBtn").html('<i class="fa fa-spinner fa-spin"></i> Uploading file...');
                    $("#editEventBtn").prop("disabled", true);
                    data.submit();
               },
               
               done: function(e,data){
                   if (!data.result.error){
                       editEventFiles.push(data.result.filename);
                   }else{
                       swal(
							'Error!',
							'The server encountered the following error: ' + data.result.message,
							'error'
						);
                   }
				   $("#editEventBtn").html('Edit event');
                   $("#editEventBtn").prop("disabled", false);
               }
            });
			
			$(".event-date-picker").datetimepicker({format: dateformat, allowInputToggle: true });
			$(".event-time-picker").datetimepicker({widgetPositioning:{
                                horizontal: 'right',
                                vertical: 'auto'
                            },format: timeformat, stepping:5, "defaultDate": moment().add(1, "hours"), allowInputToggle: true });
			
			
		
			$("#searchResultsSelect").on("change", function(){
                var naziv = $(this).val();
                if (naziv != ""){
                    searchByVAT(naziv);
                }
            });
			
			$('#addEventForm').on('submit', function(e) { //use on if jQuery 1.7+
					e.preventDefault();
					var startD = moment($("#eventStartDateInput").val(), dateformat).format("YYYY-MM-DD") + " " + $("#eventStartTimeInput").val();
					var endD = moment($("#eventEndDateInput").val(), dateformat).format("YYYY-MM-DD") + " " + $("#eventEndTimeInput").val();
					if (moment(startD).isBefore(moment(endD))){
						var selectedEmployee = $("#eventEmployeeSelect").val();
						if (googleSignedIn && selectedEmployee == loggedEmployee) {
							var eventSubject = $("#addEventForm input[name=event_subject]").val();
							var eventDescription = $("#addEventForm input[name=event_description]").val();
							var location = $("#addEventForm input[name=event_address]").val();
							var startDate = startD + ":00";
							var endDate = endD + ":00";
							var eventToInsert = {
								'summary': eventSubject,
								'description': eventDescription,
								'location': location,
								'start': {
									'dateTime': new Date(startDate).toISOString(),
									'timeZone': 'Europe/Ljubljana'
								},
								'end': {
									'dateTime': new Date(endDate).toISOString(),
									'timeZone': 'Europe/Ljubljana'
								}
							};
							gapi.client.calendar.events.insert({
								'calendarId': 'primary',
								'resource': eventToInsert
							}).then(function(response) {
								var postData = $('#addEventForm').serializeArray();
								var event_uid = response.result.id;
								var last_modified = response.result.updated;
								postData.push({ name: 'files', value: eventFiles });
								postData.push({ name: 'event_uid', value: event_uid });
								postData.push({ name: 'last_modified', value: last_modified });
								var time = new Date();
								$.ajax({
									type: "POST",
									url: "event/add",
									data: postData,
									success: function(msg) {
										var execTime = new Date();
										console.log(execTime.getTime() - time.getTime());
										eventFiles = [];
										if (msg == "") {
											swal(
												'Success!',
												'Event was successfully added.',
												'success'
											);
											if (isAdmin == 1){
												getEvents();
											}else{
												getEventsEmployee(loggedEmployee);
											}
											hideNewEventPopup();
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
						}else{
							var postData = $('#addEventForm').serializeArray();
							postData.push({ name: 'files', value: eventFiles });
							postData.push({ name: 'event_uid', value: "" });
							postData.push({ name: 'last_modified', value: "" });
							var time = new Date();
							$.ajax({
								type: "POST",
								url: "event/add",
								data: postData,
								success: function(msg) {
									eventFiles = [];
									var execTime = new Date();
									console.log(execTime.getTime() - time.getTime());
									if (msg == "") {
										swal(
											'Success!',
											'Event was successfully added.',
											'success'
										);
										if (isAdmin == 1){
											getEvents();
										}else{
											getEventsEmployee(loggedEmployee);
										}
										hideNewEventPopup();
									} else {
										swal(
											'Error!',
											'The server encountered the following error: ' + msg,
											'error'
										);
									}
								}
							});
						}
					} else{
						swal(
							'Error!',
							'Event starting time must be before ending time!',
							'error'
						);
					}
            });
            
            $('#editEventForm').on('submit', function(e) { //use on if jQuery 1.7+
					e.preventDefault();
					var startD = moment($("#editEventStartDateInput").val(), dateformat).format("YYYY-MM-DD") + " " + $("#editEventStartTimeInput").val();
					var endD = moment($("#editEventEndDateInput").val(), dateformat).format("YYYY-MM-DD") + " " + $("#editEventEndTimeInput").val();
					if (moment(startD).isBefore(moment(endD))){
						if (googleSignedIn && currentEvent.employee_id == loggedEmployee && currentEvent.event_uid != ""){
							var eventToUpdate = gapi.client.calendar.events.get({
								"calendarId": 'primary', 
								"eventId": currentEvent.event_uid,
							});
							var editedTitle = $("#editEventSubjectInput").val();
							var editedDescription = $("#editEventDescriptionInput").val();
							var editedLocation = $("#editEventAddressInput").val();
							eventToUpdate.summary = editedTitle; //Replace with your values of course :)
							eventToUpdate.description = editedDescription;
							eventToUpdate.location = editedLocation;
							var startDate = startD + ":00";
							var endDate = endD + ":00";
							eventToUpdate.start = {
								'dateTime': (new Date(startDate).toISOString()), 
								'timeZone': 'Europe/Ljubljana'
							};
							eventToUpdate.end = {
								'dateTime': (new Date(endDate).toISOString()),
								'timeZone': 'Europe/Ljubljana'
							};
							
							gapi.client.calendar.events.update({
							  'calendarId': 'primary',
							  'eventId': currentEvent.event_uid,
							  'resource': eventToUpdate
							}).then(function(response) {
								var last_modified = response.result.updated;
								var postData = $('#editEventForm').serializeArray();
								postData.push({ name: 'files', value: editEventFiles });
								postData.push({ name: 'event_uid', value: currentEvent.event_uid });
								postData.push({ name: 'last_modified', value: last_modified });
								$.ajax({
									type: "POST",
									url: "event/edit",
									data: postData,
									success: function(msg) {
										if (msg == "") {
											swal(
												'Success!',
												'Event was successfully edited.',
												'success'
											);
											if (isAdmin == 1){
												getEvents();
											}else{
												getEventsEmployee(loggedEmployee);
											}
											hideEditEventPopup();
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
						}else{
							var postData = $('#editEventForm').serializeArray();
							postData.push({ name: 'files', value: editEventFiles });
							postData.push({ name: 'event_uid', value: "" });
							postData.push({ name: 'last_modified', value: "" });
							$.ajax({
									type: "POST",
									url: "event/edit",
									data: postData,
									success: function(msg) {
										if (msg == "") {
											swal(
												'Success!',
												'Event was successfully edited.',
												'success'
											);
											if (isAdmin == 1){
												getEvents();
											}else{
												getEventsEmployee(loggedEmployee);
											}
											hideEditEventPopup();
										} else {
											swal(
												'Error!',
												'The server encountered the following error: ' + msg,
												'error'
											);
										}
									}
							});
						}
					} else{
						swal(
							'Error!',
							'Event starting time must be before ending time!',
							'error'
						);
					}
            });
            
            $('#addCustomerForm').on('submit', function(e) { //use on if jQuery 1.7+
                e.preventDefault();
                var fullPhoneNrs = [];
                $("#addCustomerForm .tel-input").each(function(index) {
                  fullPhoneNrs.push($(this).intlTelInput("getNumber"));
                });
                var postData = $("#addCustomerForm").serializeArray();
                postData.push({ name: "customer_phonenr", value: fullPhoneNrs });
                
                $.ajax({
                    type: "POST",
                    url: "customer/add",
                    data: postData,
                    dataType: "json",
                    success: function(response) {
                        if (!response.error) {
                            var customer_id = response.customer_id;
                            swal(
                                'Success',
                                'Customer added successfully', 
                                'success'
                            );
                            getCustomersEvent(customer_id);
                            hideNewCustomerPopup();
                            $("#eventPopupDIV, #addEventDIV").show();
                        } else {
                            swal(
                                'Error!',
                                'The server encountered the following error: ' + response.msg,
                                'error'
                            );
                        }
                    }
                });
            });
            
            $('#editCustomerForm').on('submit', function(e) { //use on if jQuery 1.7+
                e.preventDefault();
                var fullPhoneNrs = [];
                $("#editCustomerForm .tel-input").each(function(index) {
                  fullPhoneNrs.push($(this).intlTelInput("getNumber"));
                });
                var postData = $("#editCustomerForm").serializeArray();
                postData.push({ name: "customer_phonenr", value: fullPhoneNrs });
                $.ajax({
                    type: "POST",
                    url: "customer/edit",
                    data: postData,
                    success: function(msg) {
                        if (msg == "") {
                            swal(
                                'Success!',
                                'Customer was successfully edited.',
                                'success'
                            );
                            $("#editCustomerForm")[0].reset();
                            getCustomers();
                            hideEditCustomerPopup();
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
            
            $('#eventCustomerSelect').on('change', function() {
                  var customer_id = this.value;
				  if (customer_id != ""){
					  for (var i = 0; i < customersArray.length; i++){
						  var curCustomer = customersArray[i];
						  if (curCustomer.customer_id == customer_id){
							$("#hiddenNewEventLatitudeInput").val(curCustomer.latitude);
							$("#hiddenNewEventLongitudeInput").val(curCustomer.longitude);
							$("#newEventAddressInput").val(curCustomer.customer_address);
							$("#eventSubsidiarySelect").html("");
							$("#eventSubsidiarySelect").append($('<option>', {
								value: "",
								text: "Main company"
							}));
							for (var j = 0; j < subsidiariesArray.length; j++){
								var subsidiary = subsidiariesArray[j];
								if (subsidiary.customer_id == curCustomer.customer_id){
									$("#eventSubsidiarySelect").append($('<option>', {
										value: subsidiary.subsidiary_id,
										text: subsidiary.subsidiary_name
									}));
								}
							}
							break;
						  }
					  }
				  }else{
					  $("#eventSubsidiarySelect").html("");
					  $("#eventSubsidiarySelect").append($('<option>', {
								value: "",
								text: "None"
					  }));
				  }
            });
			
			$("#eventSubsidiarySelect").on("change", function(){
				var subsidiary_id = this.value;
				if (subsidiary_id != ""){
					for (var i = 0; i < subsidiariesArray.length; i++){
						var subsidiary = subsidiariesArray[i];
						if (subsidiary.subsidiary_id == subsidiary_id){
							$("#hiddenNewEventLatitudeInput").val(subsidiary.latitude);
							$("#hiddenNewEventLongitudeInput").val(subsidiary.longitude);
							$("#newEventAddressInput").val(subsidiary.subsidiary_address);
							break;
						}
					}
				}else{
					$("#eventCustomerSelect").trigger("change");
				}
			});
            
            $('#editEventCustomerSelect').on('change', function() {
                  var customer_id = this.value;
				  if (customer_id != ""){
					  for (var i = 0; i < customersArray.length; i++){
						  var curCustomer = customersArray[i];
						  if (curCustomer.customer_id == customer_id){
							$("#hiddenEditEventLatitudeInput").val(curCustomer.latitude);
							$("#hiddenEditEventLongitudeInput").val(curCustomer.longitude);
							$("#editEventAddressInput").val(curCustomer.customer_address);
							$("#editEventSubsidiarySelect").html("");
							$("#editEventSubsidiarySelect").append($('<option>', {
								value: "",
								text: "Main company"
							}));
							for (var j = 0; j < subsidiariesArray.length; j++){
								var subsidiary = subsidiariesArray[j];
								if (subsidiary.customer_id == curCustomer.customer_id){
									$("#editEventSubsidiarySelect").append($('<option>', {
										value: subsidiary.subsidiary_id,
										text: subsidiary.subsidiary_name
									}));
								}
							}
							break;
						  }
					  }
				  }else{
					  $("#editEventSubsidiarySelect").html("");
					  $("#editEventSubsidiarySelect").append($('<option>', {
								value: "",
								text: "None"
					  }));
				  }				  
            });
            
			$("#editEventSubsidiarySelect").on("change", function(){
				var subsidiary_id = this.value;
				if (subsidiary_id != ""){
					for (var i = 0; i < subsidiariesArray.length; i++){
						var subsidiary = subsidiariesArray[i];
						if (subsidiary.subsidiary_id == subsidiary_id){
							$("#hiddenEditEventLatitudeInput").val(subsidiary.latitude);
							$("#hiddenEditEventLongitudeInput").val(subsidiary.longitude);
							$("#editEventAddressInput").val(subsidiary.subsidiary_address);
							break;
						}
					}
				}else{
					$("#editEventCustomerSelect").trigger("change");
				}
			});
            
			if (isAdmin == 1){
			    $(".admin-visible").show();
			}
			
			setInterval(function(){
				if (!isDraggingEvent){
					if (isAdmin == 1){
						getEvents();
					}else{
						getEventsEmployee(loggedEmployee);
					}
				}
			}, 20000);
			getEmployees();
			getCustomers();
			getSubsidiaries();
		});
		
		function checkForDeletedEvents(){
			var postData = { "event_uids": eventUIDs.toString() };
			console.log(postData);
			$.ajax({
                type: "POST",
                url: "<?= BASE_URL ?>" + "event/checkdeleted",
                data: postData,
                success: function(response) {
					console.log(response);
				}
			});
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
		
		function initMap(){
            var searchBox = new google.maps.places.SearchBox(document.getElementById('newEventAddressInput'));
            var editSearchBox = new google.maps.places.SearchBox(document.getElementById('editEventAddressInput'));
            
            var searchBoxCustomer = new google.maps.places.SearchBox(document.getElementById('customerAddressInput'));
            
            var myOptions = {
                zoom: parseInt(14),
                center: new google.maps.LatLng(46.053517, 14.505625),
                mapTypeId: google.maps.MapTypeId.ROADMAP
            };
            
            eventMap = new google.maps.Map(document.getElementById('eventMap'), myOptions);
            
            if (navigator.geolocation) {
                 navigator.geolocation.getCurrentPosition(function (position) {
                     var initialLocation = new google.maps.LatLng(position.coords.latitude, position.coords.longitude);
                     eventMap.setCenter(initialLocation);
                 });
            }
            
            google.maps.event.addListener(searchBox, 'places_changed', function() {
                var places = searchBox.getPlaces();
                var i, place;
                for (i = 0; place = places[i]; i++) {
                    (function(place) {
                        var location = place.geometry.location;
                        $("#hiddenNewEventLatitudeInput").val(location.lat());
                        $("#hiddenNewEventLongitudeInput").val(location.lng());
                    }(place));
                }
            });
            
            google.maps.event.addListener(editSearchBox, 'places_changed', function() {
                var places = editSearchBox.getPlaces();
                var i, place;
                for (i = 0; place = places[i]; i++) {
                    (function(place) {
                        var location = place.geometry.location;
                        $("#hiddenEditEventLatitudeInput").val(location.lat());
                        $("#hiddenEditEventLongitudeInput").val(location.lng());
                    }(place));
                }
            });
            
            google.maps.event.addListener(searchBoxCustomer, 'places_changed', function() {
                var places = searchBoxCustomer.getPlaces();
                var i, place;
                for (i = 0; place = places[i]; i++) {
                    (function(place) {
                        var location = place.geometry.location;
                        $("#newCustomerLatitudeInput").val(location.lat());
                        $("#newCustomerLongitudeInput").val(location.lng());
                        $("#addCustomerBtn").prop("disabled", false); //enable button when an address is selected.
                    }(place));
                }
            });
            
            geocoder = new google.maps.Geocoder;
		}
		
		function addNewEventReminder(){
			$("#newEventReminderDIV").append('<div class="m-t-5">' +
											   '<input type="number" class="input-gray pull-left m-r-10 w-60" value="10" min="1" name="reminder_time[]" />' +
													'<select class="input-gray pull-left m-r-10" name="reminder_unit[]">' +
														'<option value="minutes">Minutes</option>' +
														'<option value="hours">Hours</option>' +
														'<option value="days">Days</option>' +
													'</select>' +
													'<button class="btn btn-link pull-left text-danger" onClick="removeParentDIV(this)"><i class="fa fa-times"></i></button>' +
													'<div class="clearfix"></div>' +
												'</div>');
		}
		
		function addEditEventReminder(){
			$("#editEventReminderDIV").append('<div class="m-t-5">' +
											   '<input type="number" class="input-gray pull-left m-r-10 w-60" value="10" min="1" name="reminder_time[]" />' +
													'<select class="input-gray pull-left m-r-10" name="reminder_unit[]">' +
														'<option value="minutes">Minutes</option>' +
														'<option value="hours">Hours</option>' +
														'<option value="days">Days</option>' +
													'</select>' +
													'<button class="btn btn-link pull-left text-danger" onClick="removeParentDIV(this)"><i class="fa fa-times"></i></button>' +
													'<div class="clearfix"></div>' +
												'</div>');
		}
		
		function addNewEventExternalParticipant(){
			$("#newEventExternalParticipantsDIV").append('<div class="m-t-5">' +
													'<input type="text" class="input-gray pull-left m-r-10" placeholder="Name and surname" name="external_names[]" required />' +
													'<input type="email" class="input-gray pull-left m-r-10" placeholder="E-mail address" name="external_emails[]" required />' +
													'<button class="btn btn-link pull-left text-danger" onClick="removeParentDIV(this)"><i class="fa fa-times"></i></button>' +
													'<div class="clearfix"></div>' +
												'</div>');
		}
		
		function addEditEventExternalParticipant(){
			$("#editEventExternalParticipantsDIV").append('<div class="m-t-5">' +
													'<input type="text" class="input-gray pull-left m-r-10" placeholder="Name and surname" name="external_names[]" required />' +
													'<input type="email" class="input-gray pull-left m-r-10" placeholder="E-mail address" name="external_emails[]" required />' +
													'<button class="btn btn-link pull-left text-danger" onClick="removeParentDIV(this)"><i class="fa fa-times"></i></button>' +
													'<div class="clearfix"></div>' +
												'</div>');
		}
		
		function removeParentDIV(btn){
			$(btn).parent().remove();
		}
		
		
		
		function getEvents() {
            $.ajax({
                type: "POST",
                url: "<?= BASE_URL ?>" + "event/get",
                data: null,
                dataType: "json",
                success: function(events) {
                    eventArray = events;
                    makeCalendar(events);
                    if (dTable != null){
						if (hideFinished){
							var activeEvents = [];
							for (var i = 0; i < events.length; i++){
								if (events[i].status < 2){
									activeEvents.push(events[i]);
								}
							}
							dTable.clear().rows.add(activeEvents).draw(false);
						}else{
							dTable.clear().rows.add(events).draw(false);
						}
						if (displayChanged){
							dTable.columns([1,2,5,6]).every(function (index) {
										var column = this;
										var name;
											if (index == 1){
												name = "Customer";
											}else if (index == 2){
												name = "Assigned to";
											}else if (index == 5){
												name = "Status";
											}else{
												name = "Created by";
											}
										var select = $(name + '<br><select id="select' + index + '" ><option value="">No filter</option></select>')
											.appendTo($(column.header()).empty())
											.on('change', function() {
												var val = $(this).val();
												val = $('<div/>').html(val).text();
												column
													.search(val, true, false)
													.draw();
											});
										if (index != 2){
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
							displayChanged = false;
							dTable.search('').columns().search('').draw(false);
						}
                    }else{
						var activeEvents = [];
						for (var i = 0; i < events.length; i++){
							if (events[i].status < 2){
								activeEvents.push(events[i]);
							}
						}
						dTable = $('#eventsTable').DataTable({
							initComplete: function () {
								this.api().columns([1,2,5,6]).every(function (index) {
									var column = this;
									var name;
									if (index == 1){
										name = "Customer";
									}else if (index == 2){
										name = "Assigned to";
									}else if (index == 5){
										name = "Status";
									}else{
										name = "Created by";
									}
									var select = $(name + '<br><select id="select' + index + '" ><option value="">No filter</option></select>')
										.appendTo($(column.header()).empty())
										.on('change', function() {
											var val = $(this).val();
											val = $('<div/>').html(val).text();
											column
												.search(val, true, false)
												.draw();
										});
									if (index != 2){
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
							"aaData": activeEvents,
							"columns": [
								{ "data": "event_subject" },
								{ "data": "customer_name" },
								{ "data": "participants" },
								{ "data": "event_startdate" },
								{ "data": "event_enddate" },
								{ "data": "status" },
								{ "data": "employee_id" },
								{ "defaultContent": ''}
							],
							"columnDefs": [
							{
									// The `data` parameter refers to the data for the cell (defined by the
									// `data` option, which defaults to the column being worked with, in
									// this case `data: 0`.
									"render": function ( data, type, row ) {
										return "<strong>" + data + "</strong>";
									},
									"targets": 0
								},
								{
									// The `data` parameter refers to the data for the cell (defined by the
									// `data` option, which defaults to the column being worked with, in
									// this case `data: 0`.
									"render": function ( data, type, row ) {
										if (data != null){
											return "<span class='text-primary hover-underline text-ellipsis' onClick='viewCustomer(this)'>" + data + '</span>';
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
										return getEmployeeString(data);
									},
									"targets": 2,
									orderable: false
								},
								{
									// The `data` parameter refers to the data for the cell (defined by the
									// `data` option, which defaults to the column being worked with, in
									// this case `data: 0`.
									"render": function ( data, type, row ) {
										if (type === 'display' || type === 'filter'){
											return moment(row.event_startdate).format(dateformat);
										}else{
											return data;
										}
									},
									"targets": 3
								},
								{
									// The `data` parameter refers to the data for the cell (defined by the
									// `data` option, which defaults to the column being worked with, in
									// this case `data: 0`.
									"render": function ( data, type, row ) {
										if (type === 'display' || type === 'filter'){
											return moment(row.event_enddate).format(dateformat);
										}else{
											return data;
										}
									},
									"targets": 4
								},
								{
											// The `data` parameter refers to the data for the cell (defined by the
											// `data` option, which defaults to the column being worked with, in
											// this case `data: 0`.
											"render": function ( data, type, row ) {
												if (data == 0){ //status 0 is confirmed, default status.
													return "<label class='label label-warning'>Incomplete</label>";
												}else if (data == 1){ //in progress, set when employee reaches event destination
													return "<label class='label label-primary'>In progress</label>";
												}else if (data == 2){ //done, set when user marks it as such on Android app
													return "<label class='label label-success'>Completed</label>";
												}else{
													return "<label class='label label-danger'>Canceled</label>";
												}
											},
											"targets": 5,
											orderable: false
								},
								{
									// The `data` parameter refers to the data for the cell (defined by the
									// `data` option, which defaults to the column being worked with, in
									// this case `data: 0`.
									"render": function ( data, type, row ) {
										return "<a class='text-primary hover-underline' href='employeepage?employee_id=" + data + "' target='_blank' >" + row.employee_name + " " + row.employee_surname + '</a>';
									},
									"targets": 6,
									orderable: false
								},
								{
									"render": function ( data, type, row ) {
											var mapBtn = "";
											if (row.event_address != ""){
												mapBtn = mapBtn = '<span onClick="showMapPopup(this)" class="text-primary pointer pull-left m-l-10" data-toggle="tooltip" title="View on map"><i class="fas fa-map-marker-alt text-success"></i></span>';
											}
											if (row.status != 1){
												return '<span data-toggle="tooltip" title="Edit event" onClick="showEditEventPopup(this)" class="text-primary pointer pull-left"><i class="fas fa-pencil-alt"></i></span><span data-toggle="tooltip" title="View event page" onClick="showEventPage(this)" class="text-primary pointer pull-left m-l-10"><i class="fas fa-th-list"></i></span>' + mapBtn + '<span onClick="cancelEvent(this)" class="text-danger pointer pull-left m-l-10"><i class="fa fa-trash"></i></span>';
											}else{
												return '<span data-toggle="tooltip" title="Edit event" onClick="showEditEventPopup(this)" class="text-primary pointer pull-left"><i class="fas fa-pencil-alt"></i></span><span data-toggle="tooltip" title="View event page" onClick="showEventPage(this)" class="text-primary pointer pull-left m-l-10"><i class="fas fa-th-list"></i></span>' + mapBtn + '<span onClick="cancelEvent(this)" class="text-danger pointer pull-left m-l-10"><i class="fa fa-trash"></i></span>'
											}
									},
									"targets": 7,
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
												if (column == 1){
													data = "Customer";
												}else if (column == 2){
													data = "Assigned to";
												}else if (column == 5){
													data = "Status";
												}else{
													data = "Created by";
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
												if (column == 1){
													data = "Customer";
												}else if (column == 2){
													data = "Assigned to";
												}else if (column == 5){
													data = "Status";
												}else{
													data = "Created by";
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
												if (column == 1){
													data = "Customer";
												}else if (column == 2){
													data = "Assigned to";
												}else if (column == 5){
													data = "Status";
												}else{
													data = "Created by";
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
												if (column == 1){
													data = "Customer";
												}else if (column == 2){
													data = "Assigned to";
												}else if (column == 5){
													data = "Status";
												}else{
													data = "Created by";
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
												if (column == 1){
													data = "Customer";
												}else if (column == 2){
													data = "Assigned to";
												}else if (column == 5){
													data = "Status";
												}else{
													data = "Created by";
												}
												return data.trim();
											}
										}
									}
								}
							]
						});
					
					}
                    
                    if (firstPageLoad){
                        App.init();
                        firstPageLoad = false;
                    }
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
		
		function showEventPage(row){
			var actualRow = $(row).parents('tr');
			if (actualRow.hasClass('child')) {//Check if the current row is a child row
				actualRow = actualRow.prev();//If it is, then point to the row before it (its 'parent')
			}
            var event = dTable.row(actualRow).data();
			var url = "<?= BASE_URL ?>" + "eventdetails?event_id=" + event.event_id;
		    window.open(url, "_blank");
		}
		
		function viewEventPage(){
			var url = "<?= BASE_URL ?>" + "eventdetails?event_id=" + currentEvent.event_id;
		    window.open(url, "_blank");
		}
        
        function showMapPopup(row){
            var actualRow = $(row).parents('tr');
			if (actualRow.hasClass('child')) {//Check if the current row is a child row
				actualRow = actualRow.prev();//If it is, then point to the row before it (its 'parent')
			}
            var event = dTable.row(actualRow).data();
            
            if (mapMarker != null){
                mapMarker.setMap(null);
            }
            
            mapMarker = new google.maps.Marker({
                position: new google.maps.LatLng(event.latitude, event.longitude),
                map: eventMap,
                title: 'Event location'
            });
            
            var infoWindowContent = "<p class='f-s-12'><strong>" + event.event_subject + "</strong><br><br><strong>Address - </strong>" + event.event_address + "</p>";
            addInfoWindow(eventMap, mapMarker, infoWindowContent);
            $("#mapPopup, #mapDIV").show();
            google.maps.event.trigger(eventMap, 'resize');
            map.setZoom(eventMap.getZoom());
            map.setCenter({lat: parseFloat(event.latitude), lng: parseFloat(event.longitude)});
        }
        
        function hideMapPopup(){
            $("#mapPopup, #mapDIV").hide();
        }
        
        function searchByVAT(naziv){
		        var searchQ = $("#vatInput").val();
		        if (naziv != null){
		            searchQ = naziv;
		        }
		        $("#searchResultsSelect").html("");
    		    var postData = { "searchQ": searchQ };
    		    $.ajax({
                        type: "POST",
                        url: "vat/search",
                        data: postData,
                        dataType: "json",
                        success: function(response) {
                            if (response.list != null){
                                if (response.list.length == 1){
                                    $("#addCustomerNameInput").val(response.list[0].Naziv);
                                    var address = response.list[0].Naslov;
                                    $("#customerAddressInput").val(address);
                                    geocoder.geocode( { 'address': address}, function(results, status) {
                                      if (status == 'OK') {
                                        
                                        $("#newCustomerLatitudeInput").val(results[0].geometry.location.lat());
                                        $("#newCustomerLongitudeInput").val(results[0].geometry.location.lng());
                                        $("#addCustomerBtn").prop("disabled", false); //enable button when an address is selected.
                                        if (response.list[0].Tip != "Fizicna oseba"){
                                            $("#addCustomerForm input[name=business_entity]").val([1]);
                                        }else{
                                            $("#addCustomerForm input[name=business_entity]").val([0]);
                                        }
                                        if (response.list[0].PlacnikDDV){
                                            $("#addCustomerForm input[name=taxpayer]").val([1]);
                                        }else{
                                            $("#addCustomerForm input[name=taxpayer]").val([0]);
                                        }
                                      } else {
                                        swal(
                                            'Error',
                                            'Company address not found, please enter the address manually',
                                            'error'
                                        );
                                      }
                                    });
                                }else if (response.list.length > 1){
                                    $("#searchResultsSelect").append($('<option>', {
                                            value: "",
                                            text: "Choose a company"
                                    }));
                                    for (var i = 0; i < response.list.length; i++){
                                        $("#searchResultsSelect").append($('<option>', {
                                            value: response.list[i].DavcnaStevilkaKratka,
                                            text: response.list[i].Naziv
                                        }));
                                    }
                                }else{
                                    swal(
                                        'Error',
                                        'Company with matching VAT or name was not found.',
                                        'error'
                                    );
                                }
                            }else{
                                swal(
                                    'Error',
                                    'Company with matching VAT or name was not found.',
                                    'error'
                                );
                            }
                        },
                        error: function(response){
                            swal(
                                'Error',
                                'Company with matching VAT or name was not found.',
                                'error'
                            );
                        }
    		    });
		    
		}
        
        function getEventsEmployee(employee_id) {
            var postData = { employee_id: employee_id };
            $.ajax({
                type: "POST",
                url: "<?= BASE_URL ?>" + "event/getEmployee",
                data: postData,
                dataType: "json",
                success: function(events) {
                    eventArray = events;
                    makeCalendar(events);
                    if (isAdmin != 1){
                        if (dTable != null){
							if (hideFinished){
								var activeEvents = [];
								for (var i = 0; i < events.length; i++){
									if (events[i].status < 2){
										activeEvents.push(events[i]);
									}
								}
								dTable.clear().rows.add(activeEvents).draw(false);
							}else{
								dTable.clear().rows.add(events).draw(false);
							}
							if (displayChanged){
								dTable.columns([1,2,5,6]).every(function(index) {
											var column = this;
											var name;
												if (index == 1){
													name = "Customer";
												}else if (index == 2){
													name = "Assigned to";
												}else if (index == 5){
													name = "Status";
												}else{
													name = "Created by";
												}
											var select = $(name + '<br><select id="select' + index + '" ><option value="">No filter</option></select>')
												.appendTo($(column.header()).empty())
												.on('change', function() {
													var val = $(this).val();
													val = $('<div/>').html(val).text();
													column
														.search(val, true, false)
														.draw();
												});
											if (index != 2){
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
								dTable.search('').columns().search('').draw(false);
							}
                        }else{
							var activeEvents = [];
							for (var i = 0; i < events.length; i++){
								if (events[i].status < 2){
									activeEvents.push(events[i]);
								}
							}
							dTable = $('#eventsTable').DataTable({
								initComplete: function () {
									this.api().columns([1,2,5,6]).every(function (index) {
										var column = this;
										var name;
											if (index == 1){
												name = "Customer";
											}else if (index == 2){
												name = "Assigned to";
											}else if (index == 5){
												name = "Status";
											}else{
												name = "Created by";
											}
										var select = $(name + '<br><select id="select' + index + '" ><option value="">No filter</option></select>')
											.appendTo($(column.header()).empty())
											.on('change', function() {
												var val = $(this).val();
												val = $('<div/>').html(val).text();
												column
													.search(val, true, false)
													.draw();
											});
										if (index != 2){
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
								"aaData": activeEvents,
								"columns": [
									{ "data": "event_subject" },
									{ "data": "customer_name" },
									{ "data": "participants" },
									{ "data": "event_startdate" },
									{ "data": "event_enddate" },
									{ "data": "status" },
									{ "data": "employee_id" },
									{ "defaultContent": ''}
								],
								"columnDefs": [
								{
										// The `data` parameter refers to the data for the cell (defined by the
										// `data` option, which defaults to the column being worked with, in
										// this case `data: 0`.
										"render": function ( data, type, row ) {
											return "<strong>" + data + "</strong>";
										},
										"targets": 0
									},
									{
										// The `data` parameter refers to the data for the cell (defined by the
										// `data` option, which defaults to the column being worked with, in
										// this case `data: 0`.
										"render": function ( data, type, row ) {
											if (data != null){
												return "<span class='text-primary hover-underline text-ellipsis' onClick='viewCustomer(this)'>" + data + '</span>';
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
											return getEmployeeString(data);
										},
										"targets": 2,
										orderable: false
									},
									{
										// The `data` parameter refers to the data for the cell (defined by the
										// `data` option, which defaults to the column being worked with, in
										// this case `data: 0`.
										"render": function ( data, type, row ) {
											if (type === 'display' || type === 'filter'){
												return moment(row.event_startdate).format(dateformat);
											}else{
												return data;
											}
										},
										"targets": 3
									},
									{
										// The `data` parameter refers to the data for the cell (defined by the
										// `data` option, which defaults to the column being worked with, in
										// this case `data: 0`.
										"render": function ( data, type, row ) {
											if (type === 'display' || type === 'filter'){
												return moment(row.event_enddate).format(dateformat);
											}else{
												return data;
											}
										},
										"targets": 4
									},
									{
												// The `data` parameter refers to the data for the cell (defined by the
												// `data` option, which defaults to the column being worked with, in
												// this case `data: 0`.
												"render": function ( data, type, row ) {
													if (data == 0){ //status 0 is confirmed, default status.
														return "<label class='label label-warning'>Incomplete</label>";
													}else if (data == 1){ //in progress, set when employee reaches event destination
														return "<label class='label label-primary'>In progress</label>";
													}else if (data == 2){ //done, set when user marks it as such on Android app
														return "<label class='label label-success'>Completed</label>";
													}else{
														return "<label class='label label-danger'>Canceled</label>";
													}
												},
												"targets": 5,
												orderable: false
									},
									{
										// The `data` parameter refers to the data for the cell (defined by the
										// `data` option, which defaults to the column being worked with, in
										// this case `data: 0`.
										"render": function ( data, type, row ) {
											return "<a class='text-primary hover-underline' href='employeepage?employee_id=" + data + "' target='_blank' >" + row.employee_name + " " + row.employee_surname + '</a>';
										},
										"targets": 6,
										orderable: false
									},
									{
										"render": function ( data, type, row ) {
												var mapBtn = "";
												if (row.event_address != ""){
													mapBtn = mapBtn = '<span onClick="showMapPopup(this)" class="text-primary pointer pull-left m-l-10" data-toggle="tooltip" title="View on map"><i class="fas fa-map-marker-alt text-success"></i></span>';
												}
												if (row.status != 1){
													return '<span data-toggle="tooltip" title="Edit event" onClick="showEditEventPopup(this)" class="text-primary pointer pull-left"><i class="fas fa-pencil-alt"></i></span><span data-toggle="tooltip" title="View event page" onClick="showEventPage(this)" class="text-primary pointer pull-left m-l-10"><i class="fas fa-th-list"></i></span>' + mapBtn + '<span onClick="cancelEvent(this)" class="text-danger pointer pull-left m-l-10"><i class="fa fa-trash"></i></span>';
												}else{
													return '<span data-toggle="tooltip" title="Edit event" onClick="showEditEventPopup(this)" class="text-primary pointer pull-left"><i class="fas fa-pencil-alt"></i></span><span data-toggle="tooltip" title="View event page" onClick="showEventPage(this)" class="text-primary pointer pull-left m-l-10"><i class="fas fa-th-list"></i></span>' + mapBtn + '<span onClick="cancelEvent(this)" class="text-danger pointer pull-left m-l-10"><i class="fa fa-trash"></i></span>'
												}
										},
										"targets": 7,
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
												if (column == 1){
													data = "Customer";
												}else if (column == 2){
													data = "Assigned to";
												}else if (column == 5){
													data = "Status";
												}else{
													data = "Created by";
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
												if (column == 1){
													data = "Customer";
												}else if (column == 2){
													data = "Assigned to";
												}else if (column == 5){
													data = "Status";
												}else{
													data = "Created by";
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
												if (column == 1){
													data = "Customer";
												}else if (column == 2){
													data = "Assigned to";
												}else if (column == 5){
													data = "Status";
												}else{
													data = "Created by";
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
												if (column == 1){
													data = "Customer";
												}else if (column == 2){
													data = "Assigned to";
												}else if (column == 5){
													data = "Status";
												}else{
													data = "Created by";
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
												if (column == 1){
													data = "Customer";
												}else if (column == 2){
													data = "Assigned to";
												}else if (column == 5){
													data = "Status";
												}else{
													data = "Created by";
												}
												return data.trim();
											}
										}
									}
								}
							]
							});
						}
                        
                        if (firstPageLoad){
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
        
        function makeCalendar(events){
            var actualEvents = [];
            for (var i = 0; i < events.length; i++){
                var event = events[i];
                var eventColor = red;
                if (event.status == 0){
                    eventColor = orange;
                }else if (event.status == 1){
                    eventColor = blue;
                }else if (event.status == 2){
                    eventColor = green;
                }else if (event.status == 3){
                    eventColor = red;
                }
                var nrOfReminders = event.event_reminders.split(";");
                var eventIcons = "";
                for (var j = 0; j < nrOfReminders; j++){
                    if (nrOfReminders[j] != ""){
                        eventIcons += '<i class="fa fa-bell pull-right" aria-hidden="true"></i>';
                    }
                }
				var display = true;
				if (isAdmin == 1 && firstPageLoad && event.participants.split(",").indexOf(loggedEmployee) == -1){
					display = false;
				}else if (!firstPageLoad){
					if (selectedEmployee != null){
						if (selectedStatus == -1){
							if (event.participants.split(",").indexOf(selectedEmployee) != -1){
								display = true;
							}else{
								display = false;
							}
						}else{
							if (event.participants.split(",").indexOf(selectedEmployee) != -1 && event.status == selectedStatus){
								display = true;
							}else{
								display = false;
							}
						}
					}else{
						if (selectedStatus == -1){
							display = true;
						}else{
							if (event.status == selectedStatus){
								display = true;
							}else{
								display = false;
							}
						}
					}
				}
                actualEvents.push({id: event.event_id, eid: event.event_id, participants: event.participants, display: display, status: event.status, icons: eventIcons, title: event.event_subject, start: event.event_startdate + " " + event.event_starttime, end: event.event_enddate + " " + event.event_endtime, description: event.event_description, color: eventColor});
			}
            
			var lastView = Cookies.get('events_defaultView') || 'month';
			
			if (calendarInitiated){
				var events = $("#calendar").fullCalendar("clientEvents");
				if (events.length == actualEvents.length){
					for (var i = 0; i < events.length; i++){
						var eventToUpdate = events[i];
						for (var j = 0; j < actualEvents.length; j++){
							var cEvent = actualEvents[j];
							if (eventToUpdate.id == cEvent.id){
								eventToUpdate.title = cEvent.title;
								eventToUpdate.participants = cEvent.participants;
								eventToUpdate.status = cEvent.status;
								eventToUpdate.start = cEvent.start;
								eventToUpdate.end = cEvent.end;
								eventToUpdate.description = cEvent.description;
								eventToUpdate.color = cEvent.color;
								eventToUpdate.display = cEvent.display;
							}
						}
					}
					$("#calendar").fullCalendar("updateEvents", events);
				}else{
					$('#calendar').fullCalendar('removeEvents');
					$('#calendar').fullCalendar('addEventSource', actualEvents);
				}
			}else{
				$('#calendar').fullCalendar({
							customButtons: {
								allBtn: {
									text: "All events",
									click: function(){
										$(this).addClass("fc-state-active");
										$(".fc-canceledBtn-button, .fc-progressBtn-button, .fc-incompleteBtn-button, .fc-finishedBtn-button").removeClass("fc-state-active");
										filterEventsByStatus(-1);
									}
								},
								canceledBtn: {
									text: 'Canceled',
									click: function() {
										$(this).addClass("fc-state-active");
										$(".fc-progressBtn-button, .fc-finishedBtn-button, .fc-incompleteBtn-button, .fc-allBtn-button").removeClass("fc-state-active");
										filterEventsByStatus(3);
									}
								},
								finishedBtn: {
									text: 'Finished',
									click: function() {
										$(this).addClass("fc-state-active");
										$(".fc-canceledBtn-button, .fc-progressBtn-button, .fc-incompleteBtn-button, .fc-allBtn-button").removeClass("fc-state-active");
										filterEventsByStatus(2);
									}
								},
								progressBtn: {
									text: "In progress",
									click: function(){
										$(this).addClass("fc-state-active");
										$(".fc-canceledBtn-button, .fc-finishedBtn-button, .fc-incompleteBtn-button, .fc-allBtn-button").removeClass("fc-state-active");
										filterEventsByStatus(1);
									}
								},
								incompleteBtn: {
									text: "Incomplete",
									click: function(){
										$(this).addClass("fc-state-active");
										$(".fc-canceledBtn-button, .fc-finishedBtn-button, .fc-progressBtn-button, .fc-allBtn-button").removeClass("fc-state-active");
										filterEventsByStatus(0);
									}
								},
							},
							header: {
								left: 'month,agendaWeek,agendaDay,listWeek, allBtn,finishedBtn,progressBtn,incompleteBtn,canceledBtn',
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
							defaultView: lastView,
							nowIndicator: true,
							selectable: true,
							eventDurationEditable: false,
							selectHelper: true,
							viewRender: function(view) {
								Cookies.set('events_defaultView', view.name, { expires: 365 });
							},
							eventDragStart: function( event, jsEvent, ui, view ) { 
								isDraggingEvent = true;
							},
							eventDragStop: function( event, jsEvent, ui, view ) {
								isDraggingEvent = false;
							},
							select: function(start, end) {
								showNewEventPopup();
								if ($("#calendar").fullCalendar('getView').name != "month"){
									$("#eventStartDateInput").val(start.format(dateformat));
									$("#eventStartTimeInput").val(start.format(timeformat));
									$("#eventEndDateInput").val(start.format(dateformat));
									$("#eventEndTimeInput").val(start.add(1, "hours").format(timeformat));
								}else{
									$("#eventStartDateInput").val(start.format(dateformat));
									$("#eventEndDateInput").val(start.format(dateformat));
								}
								$('#calendar').fullCalendar('unselect');
							},
							eventClick: function(event, element) {
								for (var i = 0; i < eventArray.length; i++){
									if (eventArray[i].event_id == event.eid){
										currentEvent = eventArray[i];
										break;
									}
								}
								showViewEventPopup(element);
							},
							eventDrop: function(event, delta, revertFunc, jsEvent, ui, view){
								updateEvent(event.eid, event.start.format("YYYY-MM-DD"), event.start.format("HH:mm"), event.end.format("YYYY-MM-DD"), event.end.format("HH:mm"));
							},
							eventRender: function(event, element) {
								if ($("#calendar").fullCalendar('getView').name != "agendaWeek"){
									element.find(".fc-title").append(event.icons);
								}else{
									element.find(".fc-time").css({"font-size": "14px", "padding-left": "4px", "padding-top": "4px"});
									element.find(".fc-title").css({"font-size": "14px", "padding-left": "4px"});
								}
								if(!event.display) {
									$(element).css("display", "none");
								} else {
									$(element).css("display", "block");
								}
							},
							dayOfMonthFormat: 'ddd ' + dateformat,
							slotLabelFormat: timeformat,
							timeFormat: timeformat,
							editable: true,
							eventLimit: true, // allow "more" link when too many events
							events: actualEvents
				});
				$(".fc-allBtn-button").addClass("fc-state-active");
				calendarInitiated = true;
			}
            
            
        }
		
		function showViewEventPopup(element){
			//$("#viewEventDIV").css("top", element.clientY - element.offsetY);
			//$("#viewEventDIV").css("left", element.clientX - 510 - element.offsetX);
			$("#event-subject").html(currentEvent.event_subject + "<br><span class='f-s-14'>" + currentEvent.event_type + "</span>");
			var statusText;
			var statusColor;
			if (currentEvent.status == 0){
				statusText = "Incomplete";
				statusColor = "<i class='fa fa-circle text-warning'></i>";
			}else if (currentEvent.status == 1){
				statusText = "In progress";
				statusColor = "<i class='fa fa-circle text-primary'></i>";
			}else if (currentEvent.status == 2){
				statusText = "Finished";
				statusColor = "<i class='fa fa-circle text-success'></i>";
			}else{
				statusText = "Canceled";
				statusColor = "<i class='fa fa-circle text-danger'></i>";
			}
			$("#event-status").html(statusText);
			$("#status-circle").html(statusColor);
			$("#event-duration").html(moment(currentEvent.event_startdate + " " + currentEvent.event_starttime).format(dateformat + ", " + timeformat) + " - " + moment(currentEvent.event_enddate + " " + currentEvent.event_endtime).format(dateformat + ", " + timeformat));
			var eventParticipants = "";
			var actualParticipants = currentEvent.participants.split(",");
			var actualExternalParticipants = currentEvent.external_participants.split(";");
			for (var i = 0; i < actualParticipants.length; i++){
				for (var j = 0; j < employeeArray.length; j++){
					var cEmployee = employeeArray[j];
					if (actualParticipants[i] == cEmployee.employee_id){
						var circleClass = "user-busy-avatar";
						if (currentEvent.declined_by.split(",").indexOf(cEmployee.employee_id) != -1){
							circleClass = "user-offline-avatar";
						}else if (currentEvent.accepted_by.split(",").indexOf(cEmployee.employee_id) != -1){
							circleClass = "user-default-avatar";
						}
						eventParticipants += '<div class="m-t-5"><a class="socialnetwork-group-user-avatar ' + circleClass + '" href="#"></a></div><div><h5>' + cEmployee.employee_name + " " + cEmployee.employee_surname + '</h5></div><div class="clearfix"></div>';
						break;
					}
				}
			}
			for (var i = 0; i < actualExternalParticipants.length; i++){
				if (actualExternalParticipants[i] != ""){
					var participant = actualExternalParticipants[i].split("|");
					var circleClass = "user-busy-avatar";
					if (participant[2] == "DECLINED"){
						circleClass = "user-offline-avatar";
					}else if (participant[2] == "ACCEPTED"){
						circleClass = "user-default-avatar";
					}
					eventParticipants += '<div class="m-t-5"><a class="socialnetwork-group-user-avatar ' + circleClass + '" href="#"></a></div><div><h5>' + participant[0] + '</h5></div><div class="clearfix"></div>';
				}
			}
			$("#event-participants").html(eventParticipants);
			var locationString = "Not specified";
			if (currentEvent.event_address != ""){
				locationString = currentEvent.event_address;
			}
			$("#event-location").html(locationString);
			$("#event-description").html(currentEvent.event_description);
			$("#viewEventPopup").show();
		}
		
		function hideViewEventPopup(){
			$("#viewEventPopup").hide();
		}
        
        function drawOnMap(events){
            var currentDate = moment();
            
            for (var i = 0; i < markers.length; i++){
                markers[i].setMap(null);
            }
            
            markers = [];
            
            for (var i = 0; i < events.length; i++){
                var event = events[i];
                var eventDate = moment(event.event_startdate);
                if (eventDate.isSame(currentDate, 'day') && event.event_address != ""){
                    var markerIcon = 'https://maps.google.com/mapfiles/ms/icons/green-dot.png';
                    if (event.status == 0 || event.status == 1){
                        markerIcon = 'https://maps.google.com/mapfiles/ms/icons/red-dot.png';
                    }
                    var marker = new google.maps.Marker({
                        position: { lat: parseFloat(event.latitude), lng: parseFloat(event.longitude) },
                        map: map,
                        icon: markerIcon,
                        title: 'Event with ' + event.customer_name
                    });
                    var infoWindowContent = "<p class='f-s-16'><h4>" + event.event_subject + "</h4></p><strong>Address: </strong>" + event.event_address + "<br><strong>Starts at:</strong> " + event.event_starttime + "<br><strong>Description:</strong> " + event.event_description + "</p>";
                    addInfoWindow(map, marker, infoWindowContent);
                    markers.push(marker);
                }
            }
        }
        
        function addInfoWindow(gMap, marker, message) {
            var infoWindow = new google.maps.InfoWindow({
                content: message
            });

            google.maps.event.addListener(marker, 'click', function () {
                infoWindow.open(gMap, marker);
            });
            
            infoWindow.open(gMap, marker);
        }
        
        function hideNewCustomerPopup() {
			$("#addCustomerForm")[0].reset();
            $("#emailsDIV, #phoneNrsDIV").html("");
            $("#customerPopupDIV, #addCustomerDIV").hide();
        }
    
        function showNewCustomerPopup() {
            $("#eventPopupDIV, #addEventDIV").hide();
            $("#customerPopupDIV, #addCustomerDIV").show();
        }
        
        function viewCustomer(row){
            var actualRow = $(row).parents('tr');
			if (actualRow.hasClass('child')) {//Check if the current row is a child row
				actualRow = actualRow.prev();//If it is, then point to the row before it (its 'parent')
			}
            var event = dTable.row(actualRow).data();
            var customer_id = event.customer_id;
            var url = "<?= BASE_URL ?>" + "customerdetails?customer_id=" + customer_id;
		    window.open(url, "_blank");
        }
           
        function updateRangeValue(){
		    $("#newCustomerRangeValue").html($("#newCustomerRangeInput").val());
		}
		
		function addEmail(){
		    $("#emailsDIV").append('<div class="m-t-5"><input type="email" name="customer_email[]" class="form-control" placeholder="E-mail"/></div>');
		}
		
		function addEditEmail(){
		    $("#editEmailsDIV").append('<div class="m-t-5"><input type="email" name="customer_email[]" class="form-control" placeholder="E-mail"/></div>');
		}
		
		function addPhoneNr(){
		    $("#phoneNrsDIV").append('<div class="m-t-5"><input type="tel" name="customer_phone[]" class="tel-input form-control" /></div>');
		    $(".tel-input").intlTelInput({ initialCountry: "auto",
			geoIpLookup: function(callback) {
                $.get('https://ipinfo.io', function() {}, "jsonp").always(function(resp) {
                  var countryCode = (resp && resp.country) ? resp.country : "";
                  callback(countryCode);
                });
            }});
		}
		
		function addEditPhone(){
		    $("#editPhoneNrsDIV").append('<div class="m-t-5"><input type="tel" name="customer_phone[]" class="tel-input form-control" /></div>');
		    $(".tel-input").intlTelInput({ initialCountry: "auto",
			geoIpLookup: function(callback) {
                $.get('https://ipinfo.io', function() {}, "jsonp").always(function(resp) {
                  var countryCode = (resp && resp.country) ? resp.country : "";
                  callback(countryCode);
                });
            }});
		}
		
		function updateEditRangeValue(){
		    $("#editCustomerRangeValue").html($("#editCustomerImportanceInput").val());
		}
        
        function filterEventsByStatus(status){
            var events = $("#calendar").fullCalendar("clientEvents");
			if (selectedEmployee == null){
				if (status != -1){
					for (var i = 0; i < events.length; i++){
						var event = events[i];
						if (event.status == status){
							event.display = true;
						}else{
							event.display = false;
						}
					}
				}else{
					for (var i = 0; i < events.length; i++){
						var event = events[i];
						event.display = true;
					}
				}
			}else{
				if (status != -1){
					for (var i = 0; i < events.length; i++){
						var event = events[i];
						if (event.status == status && event.participants.split(",").indexOf(selectedEmployee) != -1){
							event.display = true;
						}else{
							event.display = false;
						}
					}
				}else{
					for (var i = 0; i < events.length; i++){
						var event = events[i];
						if (event.participants.split(",").indexOf(selectedEmployee) != -1){
							event.display = true;
						}else{
							event.display = false;
						}
					}
				}
			}
			selectedStatus = status;
            $('#calendar').fullCalendar('updateEvents', events);
        }
        
        function updateEvent(event_id, event_startdate, event_starttime, event_enddate, event_endtime){
			var event;
			for (var i = 0; i < eventArray.length; i++){
				if (eventArray[i].event_id == event_id){
					event = eventArray[i];
					event.event_startdate = event_startdate;
					event.event_starttime = event_starttime;
					event.event_enddate = event_enddate;
					event.event_endtime = event_endtime;
					if (dTable != null){
						dTable.clear().rows.add(eventArray).draw(false);
					}
					break;
				}
			}
			
		    var postData = { "event_id": event_id, "event_startdate": event_startdate, "event_starttime": event_starttime, "event_enddate": event_enddate, "event_endtime": event_endtime }; 
		    $.ajax({
                type: "POST",
                url: "event/update",
                data: postData,
                success: function(msg) {
					if (msg == ""){
						if (googleSignedIn && event.employee_id == loggedEmployee && event.event_uid != ""){
							var eventToUpdate = gapi.client.calendar.events.get({
								"calendarId": 'primary', 
								"eventId": event.event_uid,
							});
							var editedTitle = event.event_subject;
							var editedDescription = event.event_description;
							eventToUpdate.summary = editedTitle; //Replace with your values of course :)
							eventToUpdate.description = editedDescription;
							var startD = event_startdate + " " + event_starttime;
							var endD = event_enddate + " " + event_endtime;
							var startDat = startD + ":00";
							var endDat = endD + ":00";
							eventToUpdate.start = {
								'dateTime': (new Date(startDat).toISOString()), 
								'timeZone': 'Europe/Ljubljana'
							};
							eventToUpdate.end = {
								'dateTime': (new Date(endDat).toISOString()),
								'timeZone': 'Europe/Ljubljana'
							};
							
							gapi.client.calendar.events.update({
							  'calendarId': 'primary',
							  'eventId': event.event_uid,
							  'resource': eventToUpdate
							}).then(function(response) {
								console.log(response);
							});
						}
					}else{
						swal(
                                'Error!',
                                'The server encountered the following error: ' + msg,
                                'error'
                            );
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
                    employeeArray = employees;
                    $("#editEventEmployeeSelect, #eventEmployeeSelect, #travelOrderEmployeeSelect, #editCustomerEmployeeSelect, #customerEmployeeSelect").html("");
                    $("#editEventEmployeeSelect, #eventEmployeeSelect, #travelOrderEmployeeSelect, #editCustomerEmployeeSelect, #customerEmployeeSelect").append($('<option>', {
                            value: "",
                            text: "Choose an employee"
                    }));
					
                    for (var i = 0; i < employees.length; i++){
                        $("#editCustomerEmployeeSelect, #customerEmployeeSelect").append($('<option>', {
                            value: employees[i].employee_id,
                            text: employees[i].employee_name + " " + employees[i].employee_surname
                        }));
                    }
                    
                    if (isAdmin == 1){
						var showCalendarsFor = Cookies.get("events_calendars");
						if (showCalendarsFor == undefined || showCalendarsFor == null || showCalendarsFor == ""){
							showCalendarsFor = loggedEmployee;
						}
						var showFor = showCalendarsFor.split(",");
						Cookies.set("events_calendars", showFor.join(","), { expires: 365 });
						$("#addCalendarEmployeeSelect").html("");
						$("#addCalendarEmployeeSelect").append($('<option>', {
									value: "",
									text: "View events for..."
						}));
                        for (var i = 0; i < employees.length; i++){
                            $("#editEventEmployeeSelect, #eventEmployeeSelect").append($('<option>', {
                                value: employees[i].employee_id,
                                text: employees[i].employee_name + " " + employees[i].employee_surname
                            }));
							if (showFor.indexOf(employees[i].employee_id) == -1 && employees[i].employee_id != loggedEmployee){
								$("#addCalendarEmployeeSelect").append($('<option>', {
									value: employees[i].employee_id,
									text: employees[i].employee_name + " " + employees[i].employee_surname
								}));
							}
                        }
                    }else{
                        for (var i = 0; i < employees.length; i++){
                            if (employees[i].employee_id == loggedEmployee){
                                $("#editEventEmployeeSelect, #eventEmployeeSelect").append($('<option>', {
                                    value: employees[i].employee_id,
                                    text: employees[i].employee_name + " " + employees[i].employee_surname
                                }));
                                break;
                            }
                        }
                    }
                    if (isAdmin == 1){
                        var filterContent = '<div onClick="showEmployeeEvents(this, -1)" class="fc-event"><div class="fc-event-icon"></div> All events</div>';
                        var showCalendarsFor = Cookies.get("events_calendars");
						if (showCalendarsFor == undefined || showCalendarsFor == null || showCalendarsFor == ""){
							showCalendarsFor = loggedEmployee;
						}
						var showFor = showCalendarsFor.split(",");
						Cookies.set("events_calendars", showFor.join(","), { expires: 365 });
						for (var i = 0; i < employees.length; i++){
                            var employee = employees[i];
							if (showFor.indexOf(employee.employee_id) == -1){
								continue;
							}
                            if (employee.employee_id == loggedEmployee){
                                filterContent += '<div onClick="showEmployeeEvents(this, ' + i + ')" class="fc-event fc-active"><div class="fc-event-icon"></div> My events</div>';
                            }else{
                                filterContent += '<div onClick="showEmployeeEvents(this,' + i + ')" class="fc-event"><div class="fc-event-icon"><i class="fa fa-times fa-fw text-danger" onClick="removeEmployeeCalendar(event, ' + i + ')"></i></div>' + employee.employee_name + " " + employee.employee_surname + '</div>';
                            }
                        }
                    }else{
                        var filterContent = "";
                        for (var i = 0; i < employees.length; i++){
                            var employee = employees[i];
                            if (employee.employee_id == loggedEmployee){
                                filterContent = '<div onClick="showEmployeeEvents(this, ' + i + ')" class="fc-event fc-active"><div class="fc-event-icon"><i class="fa fa-circle fa-fw text-success"></i></div> My events</div>';
                            }
                        }
                    }
                    $("#calendarFilters").html(filterContent);
					if (isAdmin == 1){
						$(".admin-visible").show();
						getEvents();
					}else{
						getEventsEmployee(loggedEmployee);
					}
                }
            });
        }
		
		function removeEmployeeCalendar(event, employee_id){
			event.stopPropagation();
			var showCalendarsFor = Cookies.get("events_calendars");
			if (showCalendarsFor == undefined || showCalendarsFor == null || showCalendarsFor == ""){
				showCalendarsFor = loggedEmployee;
			}
			var showFor = showCalendarsFor.split(",");
			showFor.splice(showFor.indexOf(employee_id), 1);
			Cookies.set("events_calendars", showFor.join(","), { expires: 365 });
			selectedEmployee = loggedEmployee;
			getEmployees();
		}
		
        
        function showEmployeeEvents(div, index){
            $(".fc-active").removeClass("fc-active");
            $(div).addClass("fc-active");
			
            var employee = employeeArray[index];
            var events = $("#calendar").fullCalendar("clientEvents");
			if (selectedStatus == -1){
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
			}else{
				if (index != -1){
					for (var i = 0; i < events.length; i++){
						var event = events[i];
						if (event.status == selectedStatus && event.participants.split(",").indexOf(employee.employee_id) != -1){
							event.display = true;
						}else{
							event.display = false;
						}
					}
					selectedEmployee = employee.employee_id;
				}else{
					for (var i = 0; i < events.length; i++){
						var event = events[i];
						if (event.status == selectedStatus){
							event.display = true;
						}
					}
					selectedEmployee = null;
				}
			}
            $('#calendar').fullCalendar('updateEvents', events);
        }
        
        function getCustomers() {
            $.ajax({
                type: "POST",
                url: "<?= BASE_URL ?>" + "customer/get",
                data: null,
				dataType: "json",
                success: function(customers) {
                    customersArray = customers;
                    for (var i = 0; i < customers.length; i++){
                        $("#editEventCustomerSelect, #eventCustomerSelect").append($('<option>', {
                            value: customers[i].customer_id,
                            text: customers[i].customer_name
                        }));
                    }
                }
            });
        }
		
		function getSubsidiaries(){
			$.ajax({
                type: "POST",
                url: "<?= BASE_URL ?>" + "subsidiary/getall",
                data: null,
				dataType: "json",
                success: function(subsidiaries) {
                    subsidiariesArray = subsidiaries;
                }
            });
		}
        
        function getCustomersEvent(customer_id) {
            $.ajax({
                type: "POST",
                url: "<?= BASE_URL ?>" + "customer/get",
                data: null,
                dataType: "json",
                success: function(customers) {
                    customersArray = customers;
					$("#editEventCustomerSelect, #eventCustomerSelect").html("");
					$("#editEventCustomerSelect, #eventCustomerSelect").append($('<option>', {
                            value: "",
                            text: "None"
                    }));
                    for (var i = 0; i < customers.length; i++){
                        $("#editEventCustomerSelect, #eventCustomerSelect").append($('<option>', {
                            value: customers[i].customer_id,
                            text: customers[i].customer_name
                        }));
                    }
                    $("#eventCustomerSelect").val(customer_id).trigger("change");
                }
            });
        }
        
        function hideNewEventPopup() {
            eventFiles = [];
            $("#files").html("");
            $("#addEventForm")[0].reset();
            $("#eventCustomerSelect").val("").trigger("change");
			$("#newEventExternalParticipantsDIV, #newEventReminderDIV").html("");
            $("#eventPopupDIV, #addEventDIV").hide();
        }
    
        function showNewEventPopup() {
            $("#eventEmployeeSelect").val(loggedEmployee.split(",")).trigger("change");
			$("#eventStartDateInput, #eventEndDateInput").val(moment().format(dateformat));
			$("#eventStartTimeInput").val(moment().format(timeformat));
			$("#eventEndTimeInput").val(moment().add(1, "hours").format(timeformat));
            $("#eventPopupDIV, #addEventDIV").show();
        }
        
        function hideTravelOrderPopup() {
            $("#travelOrderPopupContainer, #travelOrderDIV").hide();
        }
    
        function showTravelOrderPopup() {
            $("#travelOrderPopupContainer, #travelOrderDIV").show();
        }
        
        function showEditEventPopupID(){
            var event = currentEvent;
            var reminders = event.event_reminders.split(";");
			var external_participants = event.external_participants.split(";");
            var fileContent = "";
            var files = event.event_files.split(";");
            for (var i = 0; i < files.length; i++){
                if (files[i] != ""){
                    fileContent += '<li class="fa-file">' +
										'<div class="document-file">' +
										   	'<a href="' + "<?= UPLOADS_URL ?>" + "EventFiles/" + files[i] + '" download="' + files[i] + '" ><i class="fa fa-file-image"></i></a>' +
										'</div>' +
										'<div class="document-name"><a href="' + "<?= UPLOADS_URL ?>" + "EventFiles/" + files[i] + '" download="' + files[i] + '" >' + files[i] + '</a></div>' +
									'</li>';
                }
            }
            $("#hiddenEditEventIDInput").val(event.event_id);
            $("#hiddenEditEventLatitudeInput").val(event.latitude);
            $("#hiddenEditEventLongitudeInput").val(event.longitude);
            $("#editEventSubjectInput").val(event.event_subject);
            $("#editEventCustomerSelect").val(event.customer_id).trigger("change");
			$("#editEventSubsidiarySelect").val(event.subsidiary_id).trigger("change");
            $("#editEventStartDateInput").val(moment(event.event_startdate).format(dateformat));
            $("#editEventStartTimeInput").val(moment(event.event_startdate + " " + event.event_starttime).format(timeformat));
			$("#editEventEndDateInput").val(moment(event.event_enddate).format(dateformat));
			$("#editEventEndTimeInput").val(moment(event.event_enddate + " " + event.event_endtime).format(timeformat));
            $("#editEventEmployeeSelect").val(event.participants.split(",")).trigger("change");
            $('#editEventForm input:radio[name=importance]').val([event.event_importance]);
            $("#editEventDescriptionInput").val(event.event_description);
            $("#editEventAddressInput").val(event.event_address);
            $("#editEventForm input[name=status]").val([event.status]);
			$("#editEventForm input[name=event_type]").val([event.event_type]);
			for (var i = 0; i < reminders.length; i++){
				var reminder = reminders[i];
				if (reminder != ""){
					$("#existingReminderDIV").append('<div class="m-t-5">' +
													'<input type="text" class="input-gray pull-left m-r-10" name="event_reminder[]" value="' + reminders[i] + '" disabled />' +
													'<button class="btn btn-link pull-left text-danger" onClick="removeParentDIV(this)"><i class="fa fa-times"></i></button>' +
													'<div class="clearfix"></div>' +
													'</div>');
				}
			}
			for (var i = 0; i < external_participants.length; i++){
				var participant = external_participants[i];
				if (participant != ""){
					var splitP = participant.split("|");
					$("#existingParticipantsDIV").append('<input type="text" class="input-gray width-sm m-t-5" value="' + splitP[0] + ' (' + splitP[1] + ')' + '" disabled />');
				}
			}
            $("#editEventFiles").html(fileContent);
			hideViewEventPopup();
            $("#eventPopupDIV, #editEventDIV").show();
        }
    
        function showEditEventPopup(row) {
            var actualRow = $(row).parents('tr');
			if (actualRow.hasClass('child')) {//Check if the current row is a child row
				actualRow = actualRow.prev();//If it is, then point to the row before it (its 'parent')
			}
            var event = dTable.row(actualRow).data();
			currentEvent = event;
            var reminders = event.event_reminders.split(";");
			var external_participants = event.external_participants.split(";");
            var fileContent = "";
            var files = event.event_files.split(";");
            for (var i = 0; i < files.length; i++){
                if (files[i] != ""){
                    fileContent += '<li class="fa-file">' +
										'<div class="document-file">' +
										   	'<a href="' + "<?= UPLOADS_URL ?>" + "EventFiles/" + files[i] + '" download="' + files[i] + '" ><i class="fa fa-file-image"></i></a>' +
										'</div>' +
										'<div class="document-name"><a href="' + "<?= UPLOADS_URL ?>" + "EventFiles/" + files[i] + '" download="' + files[i] + '" >' + files[i] + '</a></div>' +
									'</li>';
                }
            }
            $("#hiddenEditEventIDInput").val(event.event_id);
            $("#hiddenEditEventLatitudeInput").val(event.latitude);
            $("#hiddenEditEventLongitudeInput").val(event.longitude);
            $("#editEventSubjectInput").val(event.event_subject);
            $("#editEventCustomerSelect").val(event.customer_id).trigger("change");
			$("#editEventSubsidiarySelect").val(event.subsidiary_id).trigger("change");
            $("#editEventStartDateInput").val(moment(event.event_startdate).format(dateformat));
            $("#editEventStartTimeInput").val(moment(event.event_startdate + " " + event.event_starttime).format(timeformat));
			$("#editEventEndDateInput").val(moment(event.event_enddate).format(dateformat));
			$("#editEventEndTimeInput").val(moment(event.event_enddate + " " + event.event_endtime).format(timeformat));
            $("#editEventEmployeeSelect").val(event.participants.split(",")).trigger("change");
            $('#editEventForm input:radio[name=importance]').val([event.event_importance]);
            $("#editEventDescriptionInput").val(event.event_description);
            $("#editEventAddressInput").val(event.event_address);
            $("#editEventForm input[name=status]").val([event.status]);
			$("#editEventForm input[name=event_type]").val([event.event_type]);
			for (var i = 0; i < reminders.length; i++){
				var reminder = reminders[i];
				if (reminder != ""){
					$("#existingReminderDIV").append('<div class="m-t-5">' +
													'<input type="text" class="input-gray pull-left m-r-10" name="event_reminder[]" value="' + reminders[i] + '" disabled />' +
													'<button class="btn btn-link pull-left text-danger" onClick="removeParentDIV(this)"><i class="fa fa-times"></i></button>' +
													'<div class="clearfix"></div>' +
													'</div>');
				}
			}
			for (var i = 0; i < external_participants.length; i++){
				var participant = external_participants[i];
				if (participant != ""){
					var splitP = participant.split("|");
					$("#existingParticipantsDIV").append('<input type="text" class="input-gray width-sm m-t-5" value="' + splitP[0] + ' (' + splitP[1] + ')' + '" disabled />');
				}
			}
            $("#editEventFiles").html(fileContent);
            $("#eventPopupDIV, #editEventDIV").show();
        }
    
        function hideEditEventPopup() {
            editEventFiles = [];
            $("#editEventFiles").html("");
            $("#editEventForm")[0].reset();
			$("#existingReminderDIV, #editEventReminderDIV, #existingParticipantsDIV, #editEventExternalParticipantsDIV").html("");
            $("#eventPopupDIV, #editEventDIV").hide();
        }
        
        function cancelEvent(row){
            var actualRow = $(row).parents('tr');
			if (actualRow.hasClass('child')) {//Check if the current row is a child row
				actualRow = actualRow.prev();//If it is, then point to the row before it (its 'parent')
			}
            var event = dTable.row(actualRow).data();
            swal({
              title: 'Confirm action',
              text: "Are you sure you want to delete this event?",
              type: 'error',
              showCancelButton: true,
              confirmButtonColor: '#3085d6',
              cancelButtonColor: '#d33',
              confirmButtonText: 'Yes, remove'
            }).then(function () {
				if (googleSignedIn && event.employee_id == loggedEmployee && event.event_uid != ""){
                    var eventToDelete = gapi.client.calendar.events.delete({
                        "calendarId": 'primary', 
                        "eventId": event.event_uid,
                    }).then(function(response) {
						console.log(response);
					});
				}
                var values = { event_id: event.event_id };
                $.ajax({
                    type: "POST",
                    url: "event/delete",
                    data: values,
                    success: function(msg) {
                        if (msg == "") {
                            swal(
                                'Success!',
                                'Event was successfully removed.',
                                'success'
                            );
                            if (isAdmin == 1){
                			    getEvents();
                			}else{
                			    getEventsEmployee(loggedEmployee);
                			}
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
        
        function cancelEventID(){
            swal({
              title: 'Confirm action',
              text: "Are you sure you want to delete this event?",
              type: 'error',
              showCancelButton: true,
              confirmButtonColor: '#3085d6',
              cancelButtonColor: '#d33',
              confirmButtonText: 'Yes, remove'
            }).then(function () {
				if (googleSignedIn && currentEvent.employee_id == loggedEmployee && currentEvent.event_uid != ""){
                    var eventToDelete = gapi.client.calendar.events.delete({
                        "calendarId": 'primary', 
                        "eventId": currentEvent.event_uid,
                    }).then(function(response) {
						console.log(response);
					});
				}
                var values = { event_id: currentEvent.event_id };
                $.ajax({
                    type: "POST",
                    url: "event/delete",
                    data: values,
                    success: function(msg) {
                        if (msg == "") {
                            swal(
                                'Success!',
                                'Event was successfully removed.',
                                'success'
                            );
                            hideEditEventPopup();
							hideViewEventPopup();
                            if (isAdmin == 1){
                			    getEvents();
                			}else{
                			    getEventsEmployee(loggedEmployee);
                			}
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
		
		function setEventStatus(status){
			var postData = { event_id: currentEvent.event_id, status: status };
			$.ajax({
                    type: "POST",
                    url: "event/status",
                    data: postData,
                    success: function(msg) {
						if (msg == ""){
							currentEvent.status = status;
							var statusText;
							var statusColor;
							if (status == 1){
								statusText = "In progress";
								statusColor = "<i class='fa fa-circle text-primary'></i>";
							}else if (status == 2){
								statusText = "Finished";
								statusColor = "<i class='fa fa-circle text-success'></i>";
							}else{
								statusText = "Canceled";
								statusColor = "<i class='fa fa-circle text-danger'></i>";
							}
							$("#event-status").html(statusText);
							$("#status-circle").html(statusColor);
							if (isAdmin == 1){
								getEvents();
							}else{
								getEventsEmployee(loggedEmployee);
							}
						}
						
					}
			});
		}
	</script>
	<script async defer src="https://maps.googleapis.com/maps/api/js?v=3&key=AIzaSyByTQPUumUXa7XiemK1liQCKT3839oj7DE&callback=initMap&language=en&libraries=places"></script>
	<script async defer src="https://apis.google.com/js/api.js" onload="this.onload=function(){};handleClientLoad()" onreadystatechange="if (this.readyState === 'complete') this.onload()"></script>
</body>
</html>
