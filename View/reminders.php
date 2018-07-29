<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
<!--<![endif]-->
<head>
	<meta charset="utf-8" />
	<title>Reminders</title>
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
    <link href="<?= ASSETS_URL . "fullcalendar/fullcalendar.print.css" ?>" rel="stylesheet" media="print" />
	<link href="<?= ASSETS_URL . "fullcalendar/fullcalendar.min.css" ?>" rel="stylesheet" />
	<link href="<?= ASSETS_URL . "select2/dist/css/select2.css" ?>" rel="stylesheet" />
	<!-- ================== END PAGE LEVEL STYLE ================== -->
	
	<!-- ================== BEGIN BASE JS ================== -->
	<script src="<?= ASSETS_URL . "pace/pace.min.js" ?>" ></script>
	<!-- ================== END BASE JS ================== -->
</head>
<style>
    
	.hover-underline:hover{
        cursor: pointer;
        text-decoration: underline;
    }
    
    #loadingSpinnerDIV{
        width: 400px;
        height: 250px;
        position: relative;
        background-color: white;
        margin: 15% auto 0px auto;
    }
    
    .reminderList{
        list-style-type: none;
        -webkit-margin-before: 1em;
        -webkit-margin-after: 1em;
        -webkit-margin-start: 0px;
        -webkit-margin-end: 0px;
        -webkit-padding-start: 0px;
    }
    
    .reminderList li{
        background-color: #ffffff;
        padding: 15px;
        margin-bottom: 15px;
        list-style-type: none;
    }
    
    .reminderIcon{
        font-size: 60px;
        line-height: 100px;
        float: right;
    }
    
    .loadingLabel{
        position: absolute;
        text-align: center;
        font-weight: bold;
        font-size: 20px;
        bottom: 20px;
        width: 100%;
    }
    
    .redBorderTop{
        border-top: 4px solid #d9534f;
    }
    
    .greenBorderTop{
        border-top: 4px solid #39a34b;
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
    
    .activeBG a{
        background: #007aff !important;
        border: 1px solid black !important;
    }
    
    .tab-content {
        padding: 15px 0px 0px 0px;
        margin-bottom: 20px;
        background: none;
        -webkit-border-radius: 3px;
        -moz-border-radius: 3px;
        border-radius: 3px;
    }
    
    #remindersTable{
        width: 100% !important;
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
    						    <li><a id="eventLink" href="<?= BASE_URL . "events" ?>">Events</a></li>
    						    <li class="active"><a id="reminderLink" href="<?= BASE_URL . "reminders" ?>">Reminders</a></li>
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
							<h4 class="m-t-10 m-b-5">Reminders</h4>
						</div>
						<!-- END profile-header-info -->
					</div>
					<!-- END profile-header-content -->
					<!-- BEGIN profile-header-tab -->
					<ul class="profile-header-tab nav nav-tabs">
						<li class="nav-item active"><a href="#reminder-calendar" class="nav-link" data-toggle="tab">CALENDAR</a></li>
						<li class="nav-item"><a href="#reminder-overview" class="nav-link" data-toggle="tab">OVERVIEW</a></li>
					</ul>
					<!-- END profile-header-tab -->
				</div>
			</div>
			<!-- end profile -->
            <div class="profile-content">
				<div class="tab-content">
					<div class="tab-pane fade in active" id="reminder-calendar">
						<div class="row">
							<div class="col-md-12">
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
										<div class="fc-event"><div class="fc-event-icon"><i class="fa fa-circle fa-fw text-danger"></i></div>Unsent</div>
										<div class="fc-event"><div class="fc-event-icon"><i class="fa fa-circle fa-fw text-success"></i></div>Sent</div>
									</div>
								</div>
								<div id="calendar" class="vertical-box-column p-15 calendar">
							
								</div>
							</div>
						</div>
					</div>
					<div class="tab-pane fade" id="reminder-overview">
						<div class="row">
							<div class="col-md-12">
								<div class="pull-left bottom25 width15">
									<label>Show reminders from:</label>
									<input type="text" id="dateInput" class="form-control" placeholder="Select a date" />
								</div>
								<div class="pull-left bottom25 left25 width15 admin-visible" hidden>
									<label>Display reminders for:</label>
									<select id="employeeSelect" class="form-control" >
									</select>
								</div>
							</div>
							<div class="col-md-12">
								<div class="panel panel-primary">
									<div class="panel-heading">
										<div class="panel-heading-btn">
											<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
											<a href="getEvents()" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-repeat"></i></a>
											<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
											<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
										</div>
										<h4 class="panel-title">Reminders</h4>
									</div>
									<div class="panel-body">
										<div class="dataTables_wrapper form-inline dt-bootstrap no-footer">
											<table id="remindersTable" class="table table-striped">
												<thead>
													<tr>
														<th>Employee</th>
														<th>Event</th>
														<th>Date</th>
														<th>Status</th>
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
			</div>
		</div>
    <!-- end #content -->
    
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
	<script src="<?= ASSETS_URL . "fullcalendar/lib/moment.min.js" ?>"></script>
	<script src="<?= ASSETS_URL . "fullcalendar/fullcalendar.min.js" ?>"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/js/bootstrap-datetimepicker.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/css/bootstrap-datetimepicker.min.css" rel="stylesheet"/>
	<script src="<?= ASSETS_URL . "select2/dist/js/select2.full.min.js" ?>"></script>
	<!-- ================== END PAGE LEVEL JS ================== -->
	
	<script>
	    var workFrom;
	    var workTo;
	    var dTable;
	    var firstPageLoad = true;
	    var employeeArray;
	    var selectedEmployee;
	    var loggedEmployee = <?php echo json_encode($_SESSION["id"]); ?>;
	    var isAdmin = <?php echo json_encode($_SESSION["admin"]); ?>;
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
    		$("#dateInput").datepicker({dateFormat: 'yy-mm-dd'});
			$("#dateInput").datepicker('setDate', new Date());
			if (isAdmin == 1){
			    $(".admin-visible").show();
				$("#calendarEmployeeDIV").show();
				$("#addCalendarEmployeeSelect").select2({width: "100%"});
				$("#addCalendarEmployeeSelect").on("change", function(){
					if ($(this).val() != ""){
						var showCalendarsFor = Cookies.get("reminders_calendars");
						if (showCalendarsFor == undefined || showCalendarsFor == null){
							showCalendarsFor = loggedEmployee;
						}
						var showFor = showCalendarsFor.split(",");
						showFor.push($(this).val());
						Cookies.set("reminders_calendars", showFor.join(","), { expires: 365 });
						getEmployees();
					}
				});
			    getAllReminders();
			}else{
			    getRemindersDate(loggedEmployee, $("#dateInput").val());
			    getRemindersEmployee(loggedEmployee);
			}
			
			getEmployees();
			$("#employeeSelect, #dateInput").change(function(e){
			    var selectedVal = $("#employeeSelect option:selected" ).val();
			    var selectedDate = $("#dateInput").val();
			    if (selectedDate != ""){
			        getRemindersDate(selectedVal, selectedDate);
			    }
			});
			$("#calendarEmployeeSelect").change(function(e){
			    var selectedVal = $("#calendarEmployeeSelect option:selected" ).val();
			    getRemindersEmployee(selectedVal);
			    
			});
		});
		
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
        
        var green = "#00acac";
	    var red = "#ff5b57";
	    var blue = "#348fe2";
	    var orange = "#f59c1a";
	    var lime = "#49b6d6";
		
		function getAllReminders(){
		    $.ajax({
                type: "POST",
                url: "<?= BASE_URL ?>" + "reminders/get",
                data: null,
                dataType: "json",
                success: function(reminders) {
                        if (dTable != null){
                            dTable.destroy();
                        }
                        dTable = $('#remindersTable').DataTable({
                            "aaData": reminders,
                            "columns": [
                                { "data": "employee_id" },
                                { "data": "event_id" },
                                { "data": "reminder_datetime" },
                                { "data": "reminder_active" },
                            ],
                            "columnDefs": [
                                {
                                    // The `data` parameter refers to the data for the cell (defined by the
                                    // `data` option, which defaults to the column being worked with, in
                                    // this case `data: 0`.
                                    "render": function ( data, type, row ) {
                                        return "<span onClick='viewEventPage(this)' class='hover-underline text-primary'>" + row.event_subject + '</span>';
                                    },
                                    "targets": 1
                                },
                                {
                                    // The `data` parameter refers to the data for the cell (defined by the
                                    // `data` option, which defaults to the column being worked with, in
                                    // this case `data: 0`.
                                    "render": function ( data, type, row ) {
										if (type === 'display' || type === 'filter'){
											return moment(data).format("ddd. Do MMMM @ HH:mm");
										}else{
											return data;
										}
                                    },
                                    "targets": 2
                                },
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
                                        if (data == 1){
                                            return "<label class='label label-danger'>Pending</label>";
                                        }else{
                                            return "<label class='label label-success'>Finished</label>";
                                        }
        
                                    },
                                    "targets": 3
                                }
                            ],
                            "order": [[ 3, "desc" ]],
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
        		    var actualEvents = [];
                    for (var i = 0; i < reminders.length; i++){
                        var reminder = reminders[i];
                        var reminderColor = red;
                        if (reminder.reminder_active == 0){
                            reminderColor = green;
                        }
						var display = true;
						if (isAdmin == 1 && firstPageLoad && reminder.employee_id != loggedEmployee){
							display = false;
						}
                        actualEvents.push({eid: reminder.reminder_id, display: display, employee_id: reminder.employee_id, title: "Subject: " + reminder.event_subject + "\nEmployee: " + reminder.employee_name + " " + reminder.employee_surname, start: reminder.reminder_datetime, end: reminder.reminder_datetime, color: reminderColor});
                    }
                    
                    var lastView = $("#calendar").fullCalendar('getView');
                    if (lastView.name == null) {
                        lastView.name = Cookies.get('reminders_defaultView') || 'month';
                    }
        
                    $('#calendar').fullCalendar('destroy');
                    $('#calendar').fullCalendar({
                        header: {
                            left: 'month,agendaWeek,agendaDay, listWeek',
                            center: 'title',
                            right: 'prev,today,next '
                        },
						navLinks: true,
                        height: 900,
                        slotDuration: '00:30:00',
                        snapDuration: '00:30:00',
                        minTime: "01:00",
                        maxTime: "24:00",
                        defaultView: lastView.name,
                        nowIndicator: true,
                        selectable: true,
                        selectHelper: true,
                        axisFormat: 'HH:mm',
                        timeFormat: 'HH:mm',
                        editable: false,
                        eventLimit: true, // allow "more" link when too many events
                        events: actualEvents,
						viewRender: function(view) {
							Cookies.set('reminders_defaultView', view.name);
						},
						eventClick: function(event, element) {
							showEventPage(event.eid);
						},
                        eventRender: function(event, element) {
                            if(!event.display) {
                                $(element).css("display", "none");
                            } else {
                                $(element).css("display", "block");
                            }
                        }
                    });
                    if (firstPageLoad){
                        App.init();
                        firstPageLoad = false;
                    }
                }
		    });
		}
		
		function showEmployeeReminders(div, index){
            $(".fc-active").removeClass("fc-active");
            $(div).addClass("fc-active");
            var employee = employeeArray[index];
            var events = $("#calendar").fullCalendar("clientEvents");
            if (index != -1){
                for (var i = 0; i < events.length; i++){
                    var event = events[i];
                    if (event.employee_id == employee.employee_id){
                        event.display = true;
                    }else{
                        event.display = false;
                    }
                }
                selectedEmployee = employee.employee_id;
            }else{
                for (var i = 0; i < events.length; i++){
                    var event = events[i];
					var showCalendarsFor = Cookies.get("reminders_calendars");
					if (showCalendarsFor == undefined || showCalendarsFor == null){
						showCalendarsFor = loggedEmployee;
					}
					var showFor = showCalendarsFor.split(",");
					if (showFor.indexOf(event.employee_id) != -1){
						event.display = true;
					}else{
						event.display = false;
					}
                }
                selectedEmployee = null;
            }
            $('#calendar').fullCalendar('updateEvents', events);
        }
		
		function viewEventPage(row){
			var event = dTable.row($(row).parents('tr')).data();
			var url = "<?= BASE_URL ?>" + "eventdetails?event_id=" + event.event_id;
		    window.open(url, "_blank");
		}
		
		function showEventPage(event_id){
			var url = "<?= BASE_URL ?>" + "eventdetails?event_id=" + event_id;
		    window.open(url, "_blank");
		}
		
		function getRemindersEmployee(employee_id){
		    var postData = { "employee_id": employee_id };
		    $.ajax({
                type: "POST",
                url: "<?= BASE_URL ?>" + "reminders/getEmployee",
                data: postData,
                dataType: "json",
                success: function(reminders) {
                    var actualEvents = [];
                    for (var i = 0; i < reminders.length; i++){
                        var reminder = reminders[i];
                        var reminderColor = red;
                        if (reminder.reminder_active == 0){
                            reminderColor = green;
                        }
                        actualEvents.push({eid: reminder.reminder_id, display: true, employee_id: reminder.employee_id, title: "Subject: " + reminder.event_subject + "\nEmployee: " + reminder.employee_name + " " + reminder.employee_surname, start: reminder.reminder_datetime, end: reminder.reminder_datetime, color: reminderColor});
                    }
                    var lastView = $("#calendar").fullCalendar('getView');
                    if (lastView.name == null) {
                        lastView.name = "agendaWeek";
                    }
                    
                    $('#calendar').fullCalendar('destroy');
                    $('#calendar').fullCalendar({
                        header: {
                            left: 'month,agendaWeek,agendaDay',
                            center: 'title',
                            right: 'prev,today,next '
                        },
                        height: 900,
                        slotDuration: '00:15:00',
                        snapDuration: '00:15:00',
                        minTime: workFrom,
                        maxTime: workTo,
                        defaultView: lastView.name,
                        nowIndicator: true,
                        selectable: true,
                        selectHelper: true,
                        axisFormat: 'HH:mm',
                        timeFormat: 'HH:mm',
                        editable: true,
                        eventLimit: true, // allow "more" link when too many events
                        events: actualEvents,
						eventClick: function(event, element) {
							showEventPage(event.eid);
						},
                        eventRender: function(event, element) {
                            if(!event.display) {
                                $(element).css("display", "none");
                            } else {
                                $(element).css("display", "block");
                            }
                        }
                    });
                    if (firstPageLoad){
                        App.init();
                        firstPageLoad = false;
                    }
                }
		    });
		}
		
		function getRemindersDate(employee_id, selectedDate){
		   
		    if (selectedDate != ""){
    		    var postData = {"datetime": selectedDate, "employee_id": employee_id};
    		   
    		    $.ajax({
                    type: "POST",
                    url: "<?= BASE_URL ?>" + "reminders/getByDate",
                    data: postData,
                    dataType: "json",
                    success: function(reminders) {
                        if (dTable != null){
                            dTable.destroy();
                        }
                        dTable = $('#remindersTable').DataTable({
                            "aaData": reminders,
                            "columns": [
                                { "data": "employee_id" },
                                { "data": "event_id" },
                                { "data": "reminder_datetime" },
                                { "data": "reminder_active" },
                            ],
                            "columnDefs": [
                                {
                                    // The `data` parameter refers to the data for the cell (defined by the
                                    // `data` option, which defaults to the column being worked with, in
                                    // this case `data: 0`.
                                    "render": function ( data, type, row ) {
                                        return row.event_subject;
        
                                    },
                                    "targets": 1
                                },
                                {
                                    // The `data` parameter refers to the data for the cell (defined by the
                                    // `data` option, which defaults to the column being worked with, in
                                    // this case `data: 0`.
                                    "render": function ( data, type, row ) {
                                        return moment(data).format("ddd. Do MMMM @ HH:mm");
        
                                    },
                                    "targets": 2
                                },
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
                                        if (data == 1){
                                            return "<label class='label label-danger'>Pending</label>";
                                        }else{
                                            return "<label class='label label-success'>Finished</label>";
                                        }
        
                                    },
                                    "targets": 3
                                }
                            ],
                            "order": [[ 3, "desc" ]],
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
		}
		
		function getEmployees() {
            $.ajax({
                type: "POST",
                url: "<?= BASE_URL ?>" + "employees/list",
                data: null,
                dataType: "json",
                success: function(employees) {
                    employeeArray = employees;
                    $("#employeeSelect, #calendarEmployeeSelect").append($('<option>', {
                        value: "",
                        text: "All employees"
                    }));
                    for (var i = 0; i < employees.length; i++){
                        $("#employeeSelect, #calendarEmployeeSelect").append($('<option>', {
                            value: employees[i].employee_id,
                            text: employees[i].employee_name + " " + employees[i].employee_surname
                        }));
                    }
                    if (isAdmin == 1){
						$("#employeeSelect").val(loggedEmployee);
						var showCalendarsFor = Cookies.get("reminders_calendars");
						if (showCalendarsFor == undefined || showCalendarsFor == null){
							showCalendarsFor = loggedEmployee;
						}
						var showFor = showCalendarsFor.split(",");
						$("#addCalendarEmployeeSelect").html("");
						$("#addCalendarEmployeeSelect").append($('<option>', {
									value: "",
									text: "View events for..."
						}));
                        var filterContent = '<div onClick="showEmployeeReminders(this, -1)" class="fc-event"><div class="fc-event-icon"></div> All reminders</div>';
                        for (var i = 0; i < employees.length; i++){
                            var employee = employees[i];
							if (showFor.indexOf(employees[i].employee_id) == -1 && employees[i].employee_id != loggedEmployee){
								$("#addCalendarEmployeeSelect").append($('<option>', {
									value: employees[i].employee_id,
									text: employees[i].employee_name + " " + employees[i].employee_surname
								}));
							}else{
								if (employee.employee_id == loggedEmployee){
									filterContent += '<div onClick="showEmployeeReminders(this, ' + i + ')" class="fc-event fc-active"><div class="fc-event-icon"><i class="fa fa-times fa-fw text-danger" onClick="removeEmployeeCalendar(' + i + ')"></i></div> My reminders</div>';
								}else{
									filterContent += '<div onClick="showEmployeeReminders(this,' + i + ')" class="fc-event"><div class="fc-event-icon"><i class="fa fa-times fa-fw text-danger" onClick="removeEmployeeCalendar(' + i + ')"></i></div>' + employee.employee_name + " " + employee.employee_surname + '</div>';
								}
							}
                        }
                    }else{
                        var filterContent = "";
                        for (var i = 0; i < employees.length; i++){
                            var employee = employees[i];
                            if (employee.employee_id == loggedEmployee){
                                filterContent = '<div onClick="showEmployeeReminders(this, ' + i + ')" class="fc-event fc-active"><div class="fc-event-icon"><i class="fa fa-circle fa-fw text-success"></i></div> My reminders</div>';
                            }
                        }
                    }
                    $("#calendarFilters").html(filterContent);
                }
            });
        }
		
		function removeEmployeeCalendar(employee_id){
			var showCalendarsFor = Cookies.get("reminders_calendars");
			if (showCalendarsFor == undefined || showCalendarsFor == null){
				showCalendarsFor = loggedEmployee;
			}
			var showFor = showCalendarsFor.split(",");
			showFor.splice(showFor.indexOf(employee_id), 1);
			Cookies.set("reminders_calendars", showFor.join(","), { expires: 365 });
			getEmployees();
		}
		
	</script>
</body>
</html>
