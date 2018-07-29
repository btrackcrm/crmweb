<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
<!--<![endif]-->

<head>
    <meta charset="utf-8" />
    <title>Task details</title>
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
	.popupContainer{
        width: 100%;
    	height: 1400px;
    	z-index: 99 !important;
    	top: 0;
    	left: 0;
    	position: fixed;
    	background-color: rgb(0, 0, 0);
    	background-color: rgba(0, 0, 0, 0.4);
    	overflow: auto;
    }
    
    #editTaskDIV, #mapDIV{
        width: 840px;
        height: auto;
        position: relative;
        margin: 60px auto 0px auto;
    }
	
	#taskMap{
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
						<li>
						    <a href="<?= BASE_URL . "dashboard" ?>">
    						    <i class="fa fa-th-large"></i>
    						    <span>Dashboard</span>
    					    </a>
    					</li>
    					<?php 
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
                            	<i class="ion-android-call"></i> 
                            	<span>Telephony</span>
                            </a>
                            <ul class="sub-menu">
                            	<li><a href="<?= BASE_URL . "telephonydashboard" ?>">Overview</a></li>
                            	<li><a href="<?= BASE_URL . "callcenter" ?>">Call center</a></li>
                            	
                            </ul>
                        </li>
						<li class="has-sub">
							<a href="javascript:;">
                				<b class="caret pull-right"></b>
								<i class="ion-help-buoy"></i>
								<span>Support</span>
							</a>
							<ul class="sub-menu">
                			    <li><a href="<?= BASE_URL . "ticketingdashboard" ?>">Ticketing</a></li>
                				<li><a href="<?= BASE_URL . "ticketing" ?>">My tickets</a></li>
                			</ul>
						</li>
						<li>
    					    <a href="<?= BASE_URL . "assets" ?>">
    						    <i class="ion-android-share-alt"></i>
    						    <span>Assets</span>
    					    </a>
    					</li>
    					<li class="has-sub">
                			<a href="javascript:;">
                				<b class="caret pull-right"></b>
                				<i class="ion-android-globe"></i> 
                				<span>Tracking</span>
                			</a>
                			<ul class="sub-menu">
                			    <li><a href="<?= BASE_URL . "basic_tracking" ?>">Basic tracking</a></li>
                				<li><a href="<?= BASE_URL . "tracking" ?>">Advanced tracking</a></li>
                			</ul>
                		</li>
                		<li class="has-sub">
                			<a href="javascript:;">
                				<b class="caret pull-right"></b>
                				<i class="ion-android-people"></i> 
                				<span>CRM</span>
                			</a>
                			<ul class="sub-menu">
                			    <li><a href="<?= BASE_URL . "customers" ?>">Customers</a></li>
                			    <li><a href="<?= BASE_URL . "leads" ?>">Leads</a></li>
                				<li><a href="<?= BASE_URL . "opportunities" ?>">Opportunities</a></li>
                			</ul>
                		</li>
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
    					<li class="active">
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
    					<li>
    					    <a href="<?= BASE_URL . "documents" ?>">
    						    <i class="ion-cloud"></i>
    						    <span>Documents</span>
    					    </a>
    					</li>
    					<li>
    					    <a href="<?= BASE_URL . "workorders" ?>">
    						    <i class="fas fa-cube"></i>
    						    <span>Work orders</span>
    					    </a>
    					</li>
    					<?php
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
    					?>
    					<li>
    					    <a href="<?= BASE_URL . "invoices" ?>">
    						    <i class="ion-pricetags"></i>
    						    <span>Invoicing</span>
    					    </a>
    					</li>
    					<?php 
    					    if ($_SESSION["admin"] == 1){
    					    echo '<li>
            					    <a href="' . BASE_URL . 'reports">
            						    <i class="fa fa-chart-pie"></i>
            						    <span>Reports</span>
            					    </a>
            					</li>';
    					    }
    					?>
    					<?php
    					    if ($_SESSION["admin"] == 1){
    					        echo '<li>
                					    <a href="' . BASE_URL . 'gdpr">
                						    <i class="fa fa-info-circle"></i>
                						    <span>GDPR</span>
                					    </a>
                					 </li>';
    					    }
    					?>
    					<?php
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
							<h4 class="m-t-10 m-b-5"><?php echo $task["task_subject"] ?></h4>
							<p class="m-b-10">Overview and history</p>
							<button class="btn btn-sm btn-white" onClick="showEditTaskPopup()"><i class="fas fa-pencil-alt text-primary m-r-5"></i>Edit task</button>
						</div>
						<!-- END profile-header-info -->
					</div>
					<ul class="profile-header-tab nav nav-tabs">
						<li class="nav-item active"><a href="#task-overview" class="nav-link" data-toggle="tab">OVERVIEW</a></li>
						<li class="nav-item"><a href="#task-history" class="nav-link" data-toggle="tab">HISTORY</a></li>
					</ul>
					<!-- END profile-header-content -->
				</div>
			</div>
			<!-- begin profile-content -->
            <div class="profile-content">
				<div class="tab-content p-0">
					<!-- begin #profile-about tab -->
            		<div class="tab-pane fade in active" id="task-overview">
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
											<?php echo $task["task_subject"]; ?>
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
												if ($task["status"] == 0){
													$status = "<i class='fa fa-circle text-warning m-r-5'></i> Incomplete";
												}else if ($task["status"] == 1){
													$status = "<i class='fa fa-circle text-primary m-r-5'></i> In progress";
												}else if ($task["status"] == 2){
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
											<?php 
												$visibility = "Public";
												if ($task["task_visibility"] == 0){
													$visibility = "Private";
												}
												echo $visibility;
											?>
										</div>
									</div>
									<div class="widget-list-item">
										<div class="widget-list-media icon">
											<i class="fas fa-fire bg-danger text-white"></i>
										</div>
										<div class="widget-list-content">
											<h4 class="widget-list-title">Priority</h4>
										</div>
										<div class="widget-list-action text-nowrap text-right">
											<?php echo $task["priority"]; ?>
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
												if ($task["customer_id"] != null){
													echo '<a href="customerdetails?customer_id=' . $task["customer_id"] . '" target="_blank" >' . $task["customer_name"] . '</a>';
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
												if ($task["subsidiary_id"] != null){
													echo '<a href="customerdetails?customer_id=' . $task["customer_id"] . '" target="_blank" >' . $task["customer_name"] . '</a>';
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
												if ($task["task_location"] != ""){
													echo '<span class="hover-underline text-primary" onclick="showMapPopup()">' . $task["task_location"] . '</span>';
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
											<?php echo date("l, jS F Y @ H:i", strtotime($task["event_startdate"] . " " . $task["event_starttime"])); ?>
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
											<?php echo date("l, jS F Y @ H:i", strtotime($task["task_enddate"] . " " . $task["task_endtime"])); ?>
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
											<?php echo $task["task_description"]; ?>
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
					<div class="tab-pane fade" id="task-history">
						<div class="panel panel-inverse">
							<div class="panel-heading">
								<div class="panel-heading-btn">
									<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
									<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-redo"></i></a>
									<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
									<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
								</div>
								<h4 class="panel-title">Employees notes</h4>
							</div>
							<div class="panel-body">
									<ul id="noteList" class="media-list media-list-with-divider media-messaging">
										<?php
											foreach ($task_actions as $action){
												if ($action["type"] == 1){
													$imgURL = "/assets/img/b-io.png";
													if ($action["profile_image"] != ""){
														$imgURL = "/assets/img/" . $action["profile_image"];
													}
													echo ('<li class="media media-sm">
															<a href="javascript:;" class="pull-left">
																<img src="' . $imgURL . '" alt="" class="media-object rounded-corner">
															</a>
															<div class="media-body">
																<h5 class="media-heading">' . $action["employee_name"] . " " . $action["employee_surname"] . '</h5>
																<p class="m-b-5 text-primary">' . $action["description"] . '</p>
																<i class="text-muted">On ' . date("l, jS F Y @ H:i", strtotime($action["created_on"])) . '</i>
															</div>
														</li>');
												}
											}
										?>
									</ul>
							</div>
							<div class="panel-footer">
								<form id="addNoteForm" action="workgroup/tasknote" method="post">
									<input type="hidden" name="task_id" value="<?php echo $task["task_id"]; ?>" />
									<div class="input-group">
										<input type="text" class="form-control bg-silver" name="description" placeholder="Enter a task note">
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
											foreach ($task_actions as $action){
												if ($action["type"] == 0){
													$imgURL = "/assets/img/b-io.png";
													if ($action["profile_image"] != ""){
														$imgURL = "/assets/img/" . $action["profile_image"];
													}
													echo ('<li class="media media-sm">
															<a href="javascript:;" class="pull-left">
																<img src="' . $imgURL . '" alt="" class="media-object rounded-corner">
															</a>
															<div class="media-body">
																<h5 class="media-heading">' . $action["employee_name"] . " " . $action["employee_surname"] . '</h5>
																<p class="m-b-5 text-primary">' . $action["description"] . '</p>
																<i class="text-muted">On ' . date("l, jS F Y @ H:i", strtotime($action["created_on"])) . '</i>
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
                            <h4 class="panel-title">Task location</h4>
                        </div>
                        <div class="panel-body p-0">
                            <div id="taskMap">
                                
                            </div>
                        </div>
                    </div>
            </div>
            <div class="popupContainer" id="taskPopup" hidden>
                <div class="panel panel-primary" id="editTaskDIV" hidden>
                    <div class="panel-heading">
                        <div class="panel-heading-btn">
                            <button onclick="hideEditTaskPopup()" class="btn btn-xs btn-icon btn-circle btn-default"><i class="fa fa-times"></i>
                            </button>
                        </div>
                        <h4 class="panel-title">Edit task</h4>
                    </div>
                    <div class="panel-body">
                            <form id="editTaskForm" action="<?= BASE_URL . "workgroup/editTask" ?>" method="post" class="form-horizontal">
                                <input id="hiddenEditTaskIDInput" type="hidden" name="task_id" />
                                <input id="hiddenEditTaskLatitudeInput" type="hidden" name="latitude" />
                                <input id="hiddenEditTaskLongitudeInput" type="hidden" name="longitude" />
								
                                <div class="form-group">
                                    <div class="col-md-6">
                                        <label>Task type:</label><br/>
                                        <div class="radio radio-css radio-inline radio-success">
                                            <input type="radio" id="eab1" name="task_visibility" value="1" checked="">
                                            <label for="eab1">
                                            	Public task
                                            </label>
                                        </div>
                                        <div class="radio radio-css radio-inline radio-danger">
                                            <input type="radio" id="eab2" name="task_visibility" value="0">
                                            <label for="eab2">
                                            	Private task
                                            </label>
                                        </div>
                                    </div>
                                </div>
								<div class="form-group">
									<div class="col-md-6">
											<label>Task status:</label><br/>
											<div class="radio radio-css radio-inline radio-danger">
												<input type="radio" id="xab1" name="status" value="0">
												<label for="xab1">
													Incomplete
												</label>
											</div>
											<div class="radio radio-css radio-inline radio-primary">
												<input type="radio" id="xab2" name="status" value="1">
												<label for="xab2">
													In progress
												</label>
											</div>
											<div class="radio radio-css radio-inline radio-success">
												<input type="radio" id="xab3" name="status" value="2">
												<label for="xab3">
													Finished
												</label>
											</div>
									</div>
									<div class="col-md-6">
										<label>Priority:</label><br>
										<div class="radio radio-css radio-inline radio-success">
											<input type="radio" id="epob1" name="priority" value="Low">
											<label for="epob1">
													Low
												</label>
											</div>
											<div class="radio radio-css radio-inline radio-primary">
												<input type="radio" id="epob2" name="priority" value="Normal" checked>
												<label for="epob2">
													Normal
												</label>
											</div>
											<div class="radio radio-css radio-inline radio-danger">
												<input type="radio" id="epob3" name="priority" value="High">
												<label for="epob3">
													High
												</label>
											</div>
									</div>
								</div>
                                <div class="form-group">
                                    <div class="col-md-12">
                                        <label>Task subject: <span class="text-danger">*</span></label>
                                        <input id="editTaskSubjectInput" type="text" name="task_subject" class="form-control" placeholder="Task subject" required />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-xs-12 col-md-3">
                                        <label>Start date: <span class="text-danger">*</span></label>
                                        <div class="input-group task-date-picker">
                                            <input id="editTaskStartDateInput" type="text" name="task_startdate" class="form-control" placeholder="Choose a date" required />
                                            <span class="input-group-addon btn bg-primary">
                                                <span class="fa fa-calendar text-white"></span>
                                            </span>                    
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-md-3">
                                        <label>Start time: <span class="text-danger">*</span></label>
                                        <div class="input-group task-time-picker">
                                            <input id="editTaskStartTimeInput" type="text" name="task_starttime" class="form-control" placeholder="Time" required />
                                            <span class="input-group-addon btn bg-primary">
                                                <span class="fa fa-clock text-white"></span>
                                            </span>                    
                                        </div>
                                    </div>
									<div class="col-xs-12 col-md-3">
                                        <label>End date: </label>
                                        <div class="input-group task-date-picker">
                                            <input id="editTaskEndDateInput" type="text" name="task_enddate" class="form-control"  placeholder="Choose a date" />
                                            <span class="input-group-addon btn bg-primary">
                                                <span class="fa fa-calendar text-white"></span>
                                            </span>                    
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-md-3">
                                        <label>End time: </label>
                                        <div class="input-group task-time-picker">
                                            <input id="editTaskEndTimeInput" type="text" name="task_endtime" class="form-control"  placeholder="Time" />
                                            <span class="input-group-addon btn bg-primary">
                                                <span class="fa fa-clock text-white"></span>
                                            </span>                    
                                        </div>
                                    </div>
                                </div>
								<div class="form-group">
									<div class="col-xs-12 col-sm-6 col-md-6">
										<label>Customer: </label>
										<select id="editTaskCustomerSelect" class="form-control" name="customer_id" >
											<option value="">None</option>
										</select>
									</div>
									<div class="col-xs-12 col-sm-6 col-md-6">
										<label>Subsidiary:</label>
										<select id="editTaskSubsidiarySelect" class="form-control" name="subsidiary_id" >
											<option value="">None</option>
										</select>
									</div>
								</div>
                                <div class="form-group">
                                    <div class="col-md-12">
                                        <label>Location:</label>
                                        <input id="editTaskLocationInput" type="text" class="form-control" name="task_location" placeholder="Enter task location" />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-12">
                                        <label>Participants: <span class="text-danger">*</span></label>
                                        <select id="editTaskEmployeeSelect" name="participants[]" class="form-control" multiple required>
                                            
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-12">
                                        <label>Task description: <span class="text-danger">*</span></label>
                                        <textarea id="editTaskDescriptionInput" class="form-control" name="task_description" rows="4" placeholder="Enter task description"></textarea>
                                    </div>
                                </div>
								<div class="form-group">
										<div class="col-md-12">
											<label><i class="fas fa-paperclip text-primary"></i> Attachments</label><br>
											<ul id="taskFilesDIV" class="attached-document clearfix m-0">
											</ul>
											<span class="btn btn-link p-0 fileinput-button">
												<span>Attach a file</span>
												<!-- The file input field used as target for the file upload widget -->
												<input id="editTaskFileUpload" type="file" name="file" multiple>
											</span>
										</div>
                                </div>
                    </div>
					<div class="panel-footer">
						<button class="btn btn-success">Edit task</button>
						<button type="button" class="btn btn-danger" onClick="deleteTaskID()">Delete task</button>
                        <button class="btn btn-primary pull-right" type="button" onClick="hideEditTaskPopup()">Close</button>
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
		var task = <?php echo json_encode($task); ?>;
		var members = <?php echo json_encode($members); ?>;
		var workgroup_id = <?php echo json_encode($task["workgroup_id"]); ?>;
		var dateformat = <?php echo json_encode($_SESSION["dateformat"]); ?>;
		var timeformat = <?php echo json_encode($_SESSION["timeformat"]); ?>;
		
		var map;
		var mapMarker;
		
		var editTaskFiles = [];
		var customersArray = [];
		var subsidiariesArray = [];
		
	    $(document).ready(function() {
	        App.init();
			getMenuStatistics(loggedEmployee);
			getCustomers();
			getSubsidiaries();
			
			console.log(members);
			for (var i = 0; i < members.length; i++){
				$("#editTaskEmployeeSelect").append($('<option>', {
					value: members[i].employee_id,
					text: members[i].employee_name + " " + members[i].employee_surname
				}));
			}
			
			$(".task-date-picker").datetimepicker({
				format: dateformat,
				"defaultDate": new Date(),
				allowInputToggle: true
			});
			
			$(".task-time-picker").datetimepicker({
				format: timeformat,
				stepping: 5,
				"defaultDate": new Date(),
				allowInputToggle: true,
				widgetPositioning: {
					horizontal: 'right',
					vertical: 'auto'
				}
			});
			
			$("#editTaskEmployeeSelect, #editTaskCustomerSelect, #editTaskSubsidiarySelect").select2({width: "100%"});
			
			$('#editTaskFileUpload').fileupload({
			   formData: {workgroup_id: workgroup_id},
               url: "wgtask/upload",
               dataType : 'json',
               add : function(e,data){
                    $.each(data.files, function (index, file) {
                        $("#taskFilesDIV").append('<li class="fa-file">' +
											'<div class="document-file">' +
												'<a href="' + "<?= DIR_URL ?>" + "Workgroups/Workgroup" + workgroup_id + "/"  + file.name + '" download="' + file.name  + '" ><i class="fa fa-file-image"></i></a>' +
											'</div>' +
											'<div class="document-name"><a href="' + "<?= DIR_URL ?>" + "Workgroups/Workgroup" + workgroup_id + "/" + file.name  + '" download="' + file.name  + '" >' + file.name  + '</a></div>' +
										'</li>');
                    });
					$("#editTaskBtn").html('<i class="fa fa-spinner fa-spin"></i> Uploading file...');
                    $("#editTaskBtn").prop("disabled", true);
                    data.submit();
               },
               
               done: function(e,data){
                   if (!data.result.error){
                       editTaskFiles.push(data.result.filename);
                   }else{
                       swal(
							'Error!',
							'The server encountered the following error: ' + data.result.message,
							'error'
						);
                   }
				   $("#editTaskBtn").html("Edit task");
                   $("#editTaskBtn").prop("disabled", false);
               }
            });
			
			$('#addNoteForm').on('submit', function(e) { //use on if jQuery 1.7+
					e.preventDefault();
                    $.ajax({
                        type: "POST",
                        url: "workgroup/tasknote",
                        data: $(this).serialize(),
						dataType: "json",
                        success: function(response) {
							console.log(response);
							if (response.error){
                                swal(
                                    'Error!',
                                    'The server encountered the following error: ' + response.message,
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
															'<p class="m-b-5 text-primary">' + note.description + '</p>' +
															'<i class="text-muted">On ' + moment(note.created_on).format("dddd, Do MMMM YYYY @ HH:mm") + '</i>' +
														'</div>' +
													'</li>');
								$("#addNoteForm")[0].reset();
							}
                        }
                    });
            });
			
			$('#editTaskForm').on('submit', function(e) { //use on if jQuery 1.7+
				e.preventDefault();
				var startDate = moment($("#editTaskStartDateInput").val(), dateformat).format("YYYY-MM-DD");
				var startTime = $("#editTaskStartTimeInput").val();
				var endDate = moment($("#editTaskEndDateInput").val(), dateformat).format("YYYY-MM-DD");
				var endTime = $("#editTaskEndTimeInput").val();
				var startD = startDate + " " + startTime;
				var endD = endDate + " " + endTime;
				if (moment(startD).isBefore(moment(endD))) {
					var postData = $('#editTaskForm').serializeArray();
					postData.push({
						name: 'files',
						value: editTaskFiles
					});
					$.ajax({
						type: "POST",
						url: "workgroup/editTask",
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
				} else {
					swal(
						'Error!',
						'Task start date must be before task end date!',
						'error'
					);
				}
			});
			
			$('#editTaskCustomerSelect').on('change', function() {
                  var customer_id = this.value;
				  if (customer_id != ""){
					  for (var i = 0; i < customersArray.length; i++){
						  var curCustomer = customersArray[i];
						  if (curCustomer.customer_id == customer_id){
							$("#hiddenEditTaskLatitudeInput").val(curCustomer.latitude);
							$("#hiddenEditTaskLongitudeInput").val(curCustomer.longitude);
							$("#editTaskLocationInput").val(curCustomer.customer_address);
							$("#editTaskSubsidiarySelect").html("");
							$("#editTaskSubsidiarySelect").append($('<option>', {
								value: "",
								text: "Main company"
							}));
							for (var j = 0; j < subsidiariesArray.length; j++){
								var subsidiary = subsidiariesArray[j];
								if (subsidiary.customer_id == curCustomer.customer_id){
									$("#editTaskSubsidiarySelect").append($('<option>', {
										value: subsidiary.subsidiary_id,
										text: subsidiary.subsidiary_name
									}));
								}
							}
							break;
						  }
					  }
				  }else{
					  $("#editTaskSubsidiarySelect").html("");
					  $("#editTaskSubsidiarySelect").append($('<option>', {
								value: "",
								text: "None"
					  }));
				  }				  
            });
            
			$("#editTaskSubsidiarySelect").on("change", function(){
				var subsidiary_id = this.value;
				if (subsidiary_id != ""){
					for (var i = 0; i < subsidiariesArray.length; i++){
						var subsidiary = subsidiariesArray[i];
						if (subsidiary.subsidiary_id == subsidiary_id){
							$("#hiddenTaskEventLatitudeInput").val(subsidiary.latitude);
							$("#hiddenTaskEventLongitudeInput").val(subsidiary.longitude);
							$("#editTaskLocationInput").val(subsidiary.subsidiary_address);
							break;
						}
					}
				}else{
					$("#editTaskCustomerSelect").trigger("change");
				}
			});
	    });
		
		function getCustomers() {
            $.ajax({
                type: "POST",
                url: "<?= BASE_URL ?>" + "customer/get",
                data: null,
				dataType: "json",
                success: function(customers) {
                    customersArray = customers;
                    for (var i = 0; i < customers.length; i++){
                        $("#editTaskCustomerSelect").append($('<option>', {
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
		
		
		
		function markTaskAsOpened(task_id){
            var postData = { task_id: task_id };
            $.ajax({
                type: "POST",
                url: "<?= BASE_URL ?>" + "workgroup/taskOpened",
                data: postData,
                success: function(response) {
                    if (response == ""){
                        console.log("Task open date set");
                    }else{
                        swal(
                            'Error',
                            'The server ran into the following error : ' + response,
                            'error'
                        );
                    }
                }
            });
        }
		
		function showEditTaskPopup() {
            if (task.opened_on == ""){
                markTaskAsOpened(task.task_id);
                task.opened_on = new Date();
            }
            $("#hiddenEditTaskIDInput").val(task.task_id);
			$("#editTaskSubjectInput").val(task.task_subject);
			$("#editTaskDescriptionInput").val(task.task_description);
			$("#editTaskStartDateInput").val(moment(task.task_startdate).format(dateformat));
			$("#editTaskStartTimeInput").val(moment(task.task_startdate + " " + task.task_starttime).format(timeformat));
			$("#editTaskEndDateInput").val(moment(task.task_enddate).format(dateformat));
			$("#editTaskEndTimeInput").val(moment(task.task_enddate + " " + task.task_endtime).format(timeformat));
			$("#editTaskCustomerSelect").val(task.customer_id).trigger("change");
			$("#editTaskSubsidiarySelect").val(task.subsidiary_id).trigger("change");
			$("#editTaskLocationInput").val(task.task_location);
			$("#hiddenEditTaskLatitudeInput").val(task.latitude);
			$("#hiddenEditTaskLongitudeInput").val(task.longitude);
			$("#editTaskForm input[name=task_visibility]").val([task.task_visibility]);
			$("#editTaskForm input[name=status]").val([task.status]);
			$("#editTaskEmployeeSelect").val(task.participants.split(",")).trigger("change");
			var fileContent = "";
            var files = task.task_files.split(";");
            for (var i = 0; i < files.length; i++){
                if (files[i] != ""){
                    fileContent += '<li class="fa-file">' +
                						'<div class="document-file">' +
                							'<a href="' + "<?= UPLOADS_URL ?>" + "TaskFiles/" + files[i] + '" download="' + files[i] + '" ><i class="fa fa-file-image"></i></a>' +
                						'</div>' +
                						'<div class="document-name"><a href="' + "<?= UPLOADS_URL ?>" + "TaskFiles/" + files[i] + '" download="' + files[i] + '" >' + files[i] + '</a></div>' +
                					'</li>';
                }
            }
            $("#taskFilesDIV").html(fileContent);
            $("#taskPopup, #editTaskDIV").show();
        }
		
		function hideEditTaskPopup(row){
			$("#taskFilesDIV").html("");
            editTaskFiles = [];
            $("#editTaskForm")[0].reset();
            $("#taskPopup, #editTaskDIV").hide();
        }
		
		function initMap(){
            var editSearchBox = new google.maps.places.SearchBox(document.getElementById('editTaskLocationInput'));
            
            var myOptions = {
                zoom: parseInt(14),
                center: new google.maps.LatLng(parseFloat(task.latitude), parseFloat(task.longitude)),
                mapTypeId: google.maps.MapTypeId.ROADMAP
            };
            
            
            
            google.maps.event.addListener(editSearchBox, 'places_changed', function() {
                var places = editSearchBox.getPlaces();
                var i, place;
                for (i = 0; place = places[i]; i++) {
                    (function(place) {
                        var location = place.geometry.location;
                        $("#hiddenEditTaskLatitudeInput").val(location.lat());
                        $("#hiddenEditTaskLongitudeInput").val(location.lng());
                    }(place));
                }
            });
            
            map = new google.maps.Map(document.getElementById('taskMap'), myOptions);
		}
		
		
		function showMapPopup(){
            
            if (mapMarker != null){
	            mapMarker.setMap(null);
	        }
	        
            mapMarker = new google.maps.Marker({
                position: new google.maps.LatLng(task.latitude, task.longitude),
                map: map,
                title: 'Task location'
            });
            
            
            var infoWindowContent = "<p class='f-s-12'><strong>" + task.task_location + "</strong></p>";
            addInfoWindow(map, mapMarker, infoWindowContent, true);
            $("#mapPopup, #mapDIV").show();
            google.maps.event.trigger(map, 'resize');
            map.setZoom(map.getZoom());
            map.setCenter({lat: parseFloat(task.latitude), lng: parseFloat(task.longitude)});
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
		
		
		
	</script>
	<script async defer src="https://maps.googleapis.com/maps/api/js?v=3&key=AIzaSyByTQPUumUXa7XiemK1liQCKT3839oj7DE&callback=initMap&language=en&libraries=places"></script>
</body>

