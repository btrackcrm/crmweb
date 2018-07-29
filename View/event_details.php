<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
<!--<![endif]-->

<head>
    <meta charset="utf-8" />
    <title>Event details</title>
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.6.9/sweetalert2.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.6.9/sweetalert2.min.css">
    <link href="<?= ASSETS_URL . "telinput/build/css/intlTelInput.css" ?>" rel="stylesheet" />
    <link href="<?= ASSETS_URL . "bootstrap-wizard/css/bwizard.min.css" ?>" rel="stylesheet" />
    <link href="<?= ASSETS_URL . "select2/dist/css/select2.css" ?>" rel="stylesheet" />
    <link href="<?= ASSETS_URL . "morris/morris.css" ?>" rel="stylesheet" />
    <link href="<?= ASSETS_URL . "jquery-tag-it/css/jquery.tagit.css" ?>" rel="stylesheet" />
	<link href="<?= ASSETS_URL . "jquery-file-upload/css/jquery.fileupload.css" ?>" rel="stylesheet" />
	<link href="<?= ASSETS_URL . "jquery-file-upload/css/jquery.fileupload-ui.css" ?>" rel="stylesheet" />
	<link href="<?= ASSETS_URL . "select2/dist/css/select2.css" ?>" rel="stylesheet" />
	<!-- ================== END PAGE LEVEL STYLE ================== -->
	
	<!-- ================== BEGIN BASE JS ================== -->
	<script src="<?= ASSETS_URL . "pace/pace.min.js" ?>" ></script>
	<!-- ================== END BASE JS ================== -->
</head>
<style>
	
    
    #editEventDIV, #mapDIV{
        width: 840px;
        height: auto;
        position: relative;
        margin: 60px auto 0px auto;
    }
	
	#eventMap{
        width: 100%;
        height: 500px;
    }
	
    .list-email .email-time {
        width: 250px;
    }
	
	.profile-header .profile-header-tab {
		padding: 0 0 0 10px;
	}
	
	.whiteBG {
		background-color: white;
		border-radius: 2px;
		webkit-box-shadow: 0 2px 2px 0 rgba(0,0,0,0.14), 0 1px 5px 0 rgba(0,0,0,0.12), 0 3px 1px -2px rgba(0,0,0,0.2);
		box-shadow: 0 2px 2px 0 rgba(0,0,0,0.14), 0 1px 5px 0 rgba(0,0,0,0.12), 0 3px 1px -2px rgba(0,0,0,0.2);
	}
	
	.hover-underline:hover{
        cursor: pointer;
        text-decoration: underline;
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
				<div class="profile-header">
					<!-- BEGIN profile-header-cover -->
					<div class="profile-header-cover"></div>
					<!-- END profile-header-cover -->
					<!-- BEGIN profile-header-content -->
					<div class="profile-header-content">
						<!-- BEGIN profile-header-info -->
						<div class="profile-header-info">
							<h4 class="m-t-10 m-b-5"><?php echo $event["event_subject"] ?></h4>
							<p class="m-b-10">Overview and history</p>
							<button class="btn btn-sm btn-white" onClick="showEditEventPopup()"><i class="fas fa-pencil-alt text-primary m-r-5"></i>Edit event</button>
						</div>
						<!-- END profile-header-info -->
					</div>
					<ul class="profile-header-tab nav nav-tabs">
						<li class="nav-item active"><a href="#event-overview" class="nav-link" data-toggle="tab">OVERVIEW</a></li>
						<li class="nav-item"><a href="#event-history" class="nav-link" data-toggle="tab">HISTORY</a></li>
					</ul>
					<!-- END profile-header-content -->
				</div>
			</div>
			<!-- begin profile-content -->
            <div class="profile-content">
				<div class="tab-content p-0">
					<!-- begin #profile-about tab -->
            		<div class="tab-pane fade in active" id="event-overview">
						<div class="row">
							<div class="col-md-6">
								<div class="m-b-10 f-s-10 m-t-10">
									<b class="text-inverse">GENERAL</b>
								</div>
								<div class="widget-list widget-list-rounded m-b-30">
									<div class="widget-list-item">
										<div class="widget-list-media icon">
											<i class="fas fa-align-left bg-blue text-white"></i>
										</div>
										<div class="widget-list-content">
											<h4 class="widget-list-title">Subject</h4>
										</div>
										<div class="widget-list-action text-nowrap text-right">
											<?php echo $event["event_subject"]; ?>
										</div>
									</div>
									<div class="widget-list-item">
										<div class="widget-list-media icon">
											<i class="fa fa-circle bg-blue text-white"></i>
										</div>
										<div class="widget-list-content">
											<h4 class="widget-list-title">Status</h4>
										</div>
										<div class="widget-list-action text-nowrap text-right">
											<?php
												$status;
												if ($event["status"] == 0){
													$status = "<i class='fa fa-circle text-warning m-r-5'></i> Incomplete";
												}else if ($event["status"] == 1){
													$status = "<i class='fa fa-circle text-primary m-r-5'></i> In progress";
												}else if ($event["status"] == 2){
													$status = "<i class='fa fa-circle text-success m-r-5'></i> Finished";
												}else{
													$status = "<i class='fa fa-circle text-danger m-r-5'></i> Canceled";
												}
												echo $status;
											?>
										</div>
									</div>
									<div class="widget-list-item">
										<div class="widget-list-media icon">
											<i class="fab fa-elementor bg-blue text-white"></i>
										</div>
										<div class="widget-list-content">
											<h4 class="widget-list-title">Type</h4>
										</div>
										<div class="widget-list-action text-nowrap text-right">
											<?php echo $event["event_type"]; ?>
										</div>
									</div>
									<div class="widget-list-item">
										<div class="widget-list-media icon">
											<i class="fas fa-fire bg-danger text-white"></i>
										</div>
										<div class="widget-list-content">
											<h4 class="widget-list-title">Importance</h4>
										</div>
										<div class="widget-list-action text-nowrap text-right">
											<?php echo $event["event_importance"]; ?>
										</div>
									</div>
									<div class="widget-list-item">
										<div class="widget-list-media icon">
											<i class="fas fa-building bg-blue text-white"></i>
										</div>
										<div class="widget-list-content">
											<h4 class="widget-list-title">Customer</h4>
										</div>
										<div class="widget-list-action text-nowrap text-right">
											<?php
												if ($event["customer_id"] != null){
													echo '<a href="customerdetails?customer_id=' . $event["customer_id"] . '" target="_blank" >' . $event["customer_name"] . '</a>';
												}else{
													echo "Not specified";
												}
											?>
										</div>
									</div>
									<div class="widget-list-item">
										<div class="widget-list-media icon">
											<i class="fas fa-home bg-blue text-white"></i>
										</div>
										<div class="widget-list-content">
											<h4 class="widget-list-title">Subsidiary</h4>
										</div>
										<div class="widget-list-action text-nowrap text-right">
											<?php
												if ($event["subsidiary_id"] != null){
													echo '<a href="customerdetails?customer_id=' . $event["customer_id"] . '" target="_blank" >' . $event["customer_name"] . '</a>';
												}else{
													echo "Not specified";
												}
											?>
										</div>
									</div>
									<div class="widget-list-item">
										<div class="widget-list-media icon">
											<i class="fas fa-map-marker-alt bg-blue text-white"></i>
										</div>
										<div class="widget-list-content">
											<h4 class="widget-list-title">Location</h4>
										</div>
										<div class="widget-list-action text-nowrap text-right">
											<?php 
												if ($event["event_address"] != ""){
													echo '<span class="hover-underline text-primary" onclick="showMapPopup()">' . $event["event_address"] . '</span>';
												}else{
													echo "Not specified";
												}
											?>
										</div>
									</div>
									<div class="widget-list-item">
										<div class="widget-list-media icon">
											<i class="fas fa-clock bg-success text-white"></i>
										</div>
										<div class="widget-list-content">
											<h4 class="widget-list-title">Starts on</h4>
										</div>
										<div class="widget-list-action text-nowrap text-right">
											<?php echo date("l, jS F Y @ H:i", strtotime($event["event_startdate"] . " " . $event["event_starttime"])); ?>
										</div>
									</div>
									<div class="widget-list-item">
										<div class="widget-list-media icon">
											<i class="fas fa-clock bg-danger text-white"></i>
										</div>
										<div class="widget-list-content">
											<h4 class="widget-list-title">Ends on</h4>
										</div>
										<div class="widget-list-action text-nowrap text-right">
											<?php echo date("l, jS F Y @ H:i", strtotime($event["event_enddate"] . " " . $event["event_endtime"])); ?>
										</div>
									</div>
									<div class="widget-list-item">
										<div class="widget-list-media icon">
											<i class="fas fa-align-justify bg-primary text-white"></i>
										</div>
										<div class="widget-list-content">
											<h4 class="widget-list-title">Description</h4>
										</div>
										<div class="widget-list-action text-nowrap text-right">
											<?php echo $event["event_description"]; ?>
										</div>
									</div>
								</div>
							</div>
							<div class="col-md-6">
								<div class="m-b-10 f-s-10 m-t-10">
									<b class="text-inverse">PARTICIPANTS</b>
								</div>
								<div class="widget-list widget-list-rounded m-b-30">
								<?php
									foreach ($participants as $participant){
										echo ('<a href="' . BASE_URL . 'employeepage?employee_id=' . $participant["employee_id"] . '" target="_blank" class="widget-list-item">
												<div class="widget-list-media icon">
													<i class="fas fa-user bg-primary text-white"></i>
												</div>
												<div class="widget-list-content">
													<h4 class="widget-list-title"> ' . $participant["employee_name"] . ' ' . $participant["employee_surname"] . '</h4>
												</div>
												<div class="widget-list-action text-nowrap text-right">
													Employee
												</div>
											</a>');
									}
									if ($event["external_participants"] != ""){
										$external_participants = explode(";", $event["external_participants"]);
										foreach ($external_participants as $external){
											$participant = explode("|", $external);
											$status = $participant[2];
											$status_color = "bg-warning";
											if ($status == "ACCEPTED"){
												$status_color = "bg-success";
											}else if ($status == "DECLINED"){
												$status_color = "bg-danger";
											}else if ($status == "TENTATIVE"){
												$status_color = "bg-primary";
											}
											echo ('<div class="widget-list-item">
												<div class="widget-list-media icon">
													<i class="fas fa-user ' . $status_color . ' text-white"></i>
												</div>
												<div class="widget-list-content">
													<h4 class="widget-list-title">' . $participant[0] . '</h4>
												</div>
												<div class="widget-list-action text-nowrap text-right">
													External 
												</div>
											</div>');
										}
									}
								?>
								</div>
								<div class="widget-list widget-list-rounded m-b-30">
										<?php
											if ($event["event_reminders"] != ""){
												$reminders = explode(";", $event["event_reminders"]);
												echo '<div class="m-b-10 f-s-10 m-t-10">
															<b class="text-inverse">REMINDERS</b>
													</div>';
												foreach ($reminders as $reminder){
													echo '<div class="widget-list-item">
														<div class="widget-list-media icon">
															<i class="fas fa-bell bg-indigo text-white"></i>
														</div>
														<div class="widget-list-content">
															<h4 class="widget-list-title">' . date("l, jS F Y @ H:i", strtotime($reminder)) . '</h4>
														</div>
													</div>';
												}
											}
										?>
								</div>
								<div class="widget-list widget-list-rounded m-b-30">
										<?php
											if (count($files) > 0){
												echo '<div class="m-b-10 f-s-10 m-t-10">
													<b class="text-inverse">ATTACHMENTS</b>
												</div>';
											}
											foreach ($files as $file){
											  $icon = "fas fa-globe bg-primary text-white";
											  if ($file["upload_source"] == 1){
												$icon = "fas fa-mobile-alt bg-success text-white";
											  }
											  echo '<a href="' . DIR_URL . $file["filepath"] . '" class="widget-list-item">
														<div class="widget-list-media icon">
															<i class="' . $icon . '"></i>
														</div>
														<div class="widget-list-content">
															<h4 class="widget-list-title">' . $file["filename"] . '</h4>
															<p class="widget-list-desc">By <b>' . $file["employee_name"] . ' ' . $file["employee_surname"] . '</b> on <b>' . date("l, F jS, H:i", strtotime($file["datetime"])) . '</b></p>
														</div>
														<div class="widget-list-action text-nowrap text-right text-grey-darker">
														</div>
													</a>';
											}
										?>
								</div>
							</div>
						</div>
					</div>
					<div class="tab-pane fade" id="event-history">
						<div class="panel panel-inverse">
							<div class="panel-heading">
								<div class="panel-heading-btn">
									<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
									<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-redo"></i></a>
									<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
									<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
								</div>
								<h4 class="panel-title">Employee notes</h4>
							</div>
							<div class="panel-body">
									<ul id="noteList" class="media-list media-list-with-divider media-messaging">
										<?php
											foreach ($event_actions as $action){
												if ($action["type"] == 1){
													echo ('<li class="media media-sm">
															<a href="javascript:;" class="pull-left">
																<img src="/assets/img/user-5.jpg" alt="" class="media-object rounded-corner">
															</a>
															<div class="media-body">
																<h5 class="media-heading">' . $action["employee_name"] . " " . $action["employee_surname"] . '</h5>
																<p class="m-b-5">' . $action["description"] . '</p>
																<i class="text-muted">On ' . $action["created_on"] . '</i>
															</div>
														</li>');
												}
											}
										?>
									</ul>
							</div>
							<div class="panel-footer">
								<form id="addNoteForm" action="event/note" method="post">
									<input type="hidden" name="event_id" value="<?php echo $event["event_id"]; ?>" />
									<div class="input-group">
										<input type="text" class="form-control bg-silver" name="description" placeholder="Enter a event note">
										<span class="input-group-btn">
											<button class="btn btn-primary"><i class="fa fa-pencil-alt"></i></button>
										</span>
									</div>
								</form>
							</div>
						</div>
						<div class="panel panel-inverse">
							<div class="panel-heading">
								<div class="panel-heading-btn">
									<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
									<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-redo"></i></a>
									<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
									<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
								</div>
								<h4 class="panel-title">History</h4>
							</div>
							<div class="panel-body">
									<ul id="noteList" class="media-list media-list-with-divider media-messaging">
										<?php
											foreach ($event_actions as $action){
												if ($action["type"] == 0){
													echo ('<li class="media media-sm">
															<a href="javascript:;" class="pull-left">
																<img src="/assets/img/user-5.jpg" alt="" class="media-object rounded-corner">
															</a>
															<div class="media-body">
																<h5 class="media-heading">' . $action["employee_name"] . " " . $action["employee_surname"] . '</h5>
																<p class="m-b-5">' . $action["description"] . '</p>
																<i class="text-muted">On ' . $action["created_on"] . '</i>
															</div>
														</li>');
												}
											}
										?>
									</ul>
							</div>
						</div>
					</div>
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
                            <h4 class="panel-title">Event location</h4>
                        </div>
                        <div class="panel-body p-0">
                            <div id="eventMap">
                                
                            </div>
                        </div>
                    </div>
            </div>
            <div class="popupContainer" id="eventPopupDIV" hidden>
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
	<script src="<?= ASSETS_URL . "jquery-file-upload/js/jquery.fileupload.js" ?>"></script>
	<script src="<?= ASSETS_URL . "fullcalendar/lib/moment.min.js" ?>"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/js/bootstrap-datetimepicker.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/css/bootstrap-datetimepicker.min.css" rel="stylesheet"/>
	<script src="<?= ASSETS_URL . "select2/dist/js/select2.full.min.js" ?>"></script>
	<!-- ================== END BASE JS ================== -->
	
	<!-- ================== BEGIN PAGE LEVEL JS ================== -->
		<script src="<?= JS_URL . "apps.min.js" ?>"></script>
	<!-- ================== END PAGE LEVEL JS ================== -->
	<script>
		var loggedEmployee = <?php echo json_encode($_SESSION["id"]); ?>;
	    var isAdmin = <?php echo json_encode($_SESSION["admin"]); ?>;
		
		var currentEvent = <?php echo json_encode($event); ?>;
		var dateformat = <?php echo json_encode($_SESSION["dateformat"]); ?>;
		var timeformat = <?php echo json_encode($_SESSION["timeformat"]); ?>;
		
		var map;
		var mapMarker;
		
		var googleSignedIn;
		var editEventFiles = [];
		
		var subsidiariesArray = [];
		var customersArray = [];
		
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
                // Handle the initial sign-in state.
                var signedIn = gapi.auth2.getAuthInstance().isSignedIn.get();
                googleSignedIn = signedIn;
            });
        }
		
	    $(document).ready(function() {
	        App.init();
			getMenuStatistics(loggedEmployee);
			if (isAdmin == 1){
			    $("#eventEmployeeSelectDIV, #editEventEmployeeSelectDIV").removeClass("hide");
			}
			$("#editEventEmployeeSelect, #editEventCustomerSelect").select2({width: "100%"});
			$('#addNoteForm').on('submit', function(e) { //use on if jQuery 1.7+
					e.preventDefault();
                    $.ajax({
                        type: "POST",
                        url: "event/note",
                        data: $(this).serialize(),
						dataType: "json",
                        success: function(response) {
							console.log(response);
							if (response.error){
                                swal(
                                    'Error!',
                                    'The server encountered the following error: ' + msg,
                                    'error'
                                );
                            }else{
								var note = response.note;
								$("#noteList").append('<li class="media media-sm">' +
														'<a href="javascript:;" class="pull-left">' +
															'<img src="/assets/img/user-5.jpg" alt="" class="media-object rounded-corner">' +
														'</a>' +
														'<div class="media-body">' +
															'<h5 class="media-heading">' + note.employee_name + " " + note.employee_surname + '</h5>' +
															'<p class="m-b-5">' + note.description + '</p>' +
															'<i class="text-muted">On ' + note.created_on + '</i>' +
														'</div>' +
													'</li>');
							}
                        }
                    });
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
											location.reload();
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
											location.reload();
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
			
			$('#editEventCustomerSelect').on('change', function() {
                  var customer_id = this.value;
                  for (var i = 0; i < customersArray.length; i++){
                      if (customersArray[i].customer_id == customer_id){
                        $("#hiddenEditEventLatitudeInput").val(customersArray[i].latitude);
                        $("#hiddenEditEventLongitudeInput").val(customersArray[i].longitude);
                        $("#editEventAddressInput").val(customersArray[i].customer_address);
                      }
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
			
			getEmployees();
			getCustomers();
			getSubsidiaries();
	    });
		
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
            var editSearchBox = new google.maps.places.SearchBox(document.getElementById('editEventAddressInput'));
            
            var myOptions = {
                zoom: parseInt(14),
                center: new google.maps.LatLng(parseFloat(currentEvent.latitude), parseFloat(currentEvent.longitude)),
                mapTypeId: google.maps.MapTypeId.ROADMAP
            };
            
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
            
            map = new google.maps.Map(document.getElementById('eventMap'), myOptions);
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
		
		function addEditEventExternalParticipant(){
			$("#editEventExternalParticipantsDIV").append('<div class="m-t-5">' +
													'<input type="text" class="input-gray pull-left m-r-10" placeholder="Name and surname" name="external_names[]" />' +
													'<input type="email" class="input-gray pull-left m-r-10" placeholder="E-mail address" name="external_emails[]" />' +
													'<button class="btn btn-link pull-left text-danger" onClick="removeParentDIV(this)"><i class="fa fa-times"></i></button>' +
													'<div class="clearfix"></div>' +
												'</div>');
		}
		
		function removeParentDIV(btn){
			$(btn).parent().remove();
		}
		
		function showMapPopup(){
            
            if (mapMarker != null){
                mapMarker.setMap(null);
            }
            
            mapMarker = new google.maps.Marker({
                position: new google.maps.LatLng(currentEvent.latitude, currentEvent.longitude),
                map: map,
                title: 'Event location'
            });
            
            var infoWindowContent = "<p class='f-s-12'><strong>" + currentEvent.event_subject + "</strong><br><br><strong>Address - </strong>" + currentEvent.event_address + "</p>";
            addInfoWindow(map, mapMarker, infoWindowContent);
            $("#mapPopup, #mapDIV").show();
            google.maps.event.trigger(map, 'resize');
            map.setZoom(map.getZoom());
            map.setCenter({lat: parseFloat(currentEvent.latitude), lng: parseFloat(currentEvent.longitude)});
        }
        
        function hideMapPopup(){
            $("#mapPopup, #mapDIV").hide();
        }
		
		function addInfoWindow(gMap, marker, message) {
            var infoWindow = new google.maps.InfoWindow({
                content: message
            });

            google.maps.event.addListener(marker, 'click', function () {
                infoWindow.open(map, marker);
            });
            
            infoWindow.open(gMap, marker);
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
                        $("#editEventCustomerSelect").append($('<option>', {
                            value: customers[i].customer_id,
                            text: customers[i].customer_name
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
                    employeeArray = employees;
                    $("#editEventEmployeeSelect").html("");
                    $("#editEventEmployeeSelect").append($('<option>', {
                            value: "",
                            text: "Choose an employee"
                    }));
                    
                    if (isAdmin == 1){
                        for (var i = 0; i < employees.length; i++){
                            $("#editEventEmployeeSelect, #eventEmployeeSelect").append($('<option>', {
                                value: employees[i].employee_id,
                                text: employees[i].employee_name + " " + employees[i].employee_surname
                            }));
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
                    
                }
            });
        }
		
		function showEditEventPopup() {
            var reminders = currentEvent.event_reminders.split(";");
			var external_participants = currentEvent.external_participants.split(";");
            var fileContent = "";
            var files = currentEvent.event_files.split(";");
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
            $("#hiddenEditEventIDInput").val(currentEvent.event_id);
            $("#hiddenEditEventLatitudeInput").val(currentEvent.latitude);
            $("#hiddenEditEventLongitudeInput").val(currentEvent.longitude);
            $("#editEventSubjectInput").val(currentEvent.event_subject);
            $("#editEventCustomerSelect").val(currentEvent.customer_id).trigger("change");
			$("#editEventSubsidiarySelect").val(currentEvent.subsidiary_id).trigger("change");
            $("#editEventStartDateInput").val(moment(currentEvent.event_startdate).format(dateformat));
            $("#editEventStartTimeInput").val(moment(currentEvent.event_startdate + " " + currentEvent.event_starttime).format(timeformat));
			$("#editEventEndDateInput").val(moment(currentEvent.event_enddate).format(dateformat));
			$("#editEventEndTimeInput").val(moment(currentEvent.event_enddate + " " + currentEvent.event_endtime).format(timeformat));
            $("#editEventEmployeeSelect").val(currentEvent.participants.split(",")).trigger("change");
            $('#editEventForm input:radio[name=importance]').val([currentEvent.event_importance]);
            $("#editEventDescriptionInput").val(currentEvent.event_description);
            $("#editEventAddressInput").val(currentEvent.event_address);
            $("#editEventForm input[name=status]").val([currentEvent.status]);
			$("#editEventForm input[name=event_type]").val([currentEvent.event_type]);
			for (var i = 0; i < reminders.length; i++){
				var reminder = reminders[i];
				if (reminder != ""){
					$("#existingReminderDIV").append('<div class="m-t-5">' +
													'<input type="text" class="input-gray pull-left m-r-10" name="event_reminder[]" value="' + reminders[i] + '" readonly />' +
													'<button class="btn btn-link pull-left text-danger" onClick="removeParentDIV(this)"><i class="fa fa-times"></i></button>' +
													'<div class="clearfix"></div>' +
													'</div>');
				}
			}
			for (var i = 0; i < external_participants.length; i++){
				var participant = external_participants[i];
				if (participant != ""){
					var splitP = participant.split("|");
					$("#existingParticipantsDIV").append('<input type="text" class="input-gray width-sm m-t-5" value="' + splitP[0] + ' (' + splitP[1] + ')' + '" readonly />');
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
                            location.href = "events";
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
	<script async defer src="https://maps.googleapis.com/maps/api/js?v=3&key=AIzaSyByTQPUumUXa7XiemK1liQCKT3839oj7DE&callback=initMap&language=en&libraries=places"></script>
	<script async defer src="https://apis.google.com/js/api.js" onload="this.onload=function(){};handleClientLoad()" onreadystatechange="if (this.readyState === 'complete') this.onload()"></script>
</body>

