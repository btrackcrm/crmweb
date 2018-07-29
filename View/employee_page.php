<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
<!--<![endif]-->
<head>
	<meta charset="utf-8" />
	<title>Employee details</title>
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
	<link href="<?= ASSETS_URL . "jstree/dist/themes/default/style.min.css" ?>" rel="stylesheet" />
	<link href="<?= ASSETS_URL . "jquery-jvectormap/jquery-jvectormap.css" ?>" rel="stylesheet" />
	<link href="<?= ASSETS_URL . "bootstrap-datepicker/css/bootstrap-datepicker.css" ?>" rel="stylesheet" />
    <link href="<?= ASSETS_URL . "gritter/css/jquery.gritter.css" ?>" rel="stylesheet" />
    <link href="<?= ASSETS_URL . "morris/morris.css" ?>" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.6.9/sweetalert2.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.6.9/sweetalert2.min.css">
    <link href="<?= ASSETS_URL . "dropzone/min/dropzone.min.css" ?>" rel="stylesheet" />
    <link href="<?= ASSETS_URL . "select2/dist/css/select2.css" ?>" rel="stylesheet" />
    <link href="<?= ASSETS_URL . "jquery-file-upload/css/jquery.fileupload.css" ?>" rel="stylesheet" />
	<link href="<?= ASSETS_URL . "jquery-file-upload/css/jquery.fileupload-ui.css" ?>" rel="stylesheet" />
	<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css">

	<!-- ================== END PAGE LEVEL STYLE ================== -->
	
	<!-- ================== BEGIN BASE JS ================== -->
	<script src="<?= ASSETS_URL . "pace/pace.min.js" ?>" ></script>
	<!-- ================== END BASE JS ================== -->
</head>
<style>
    
    
    #map{
        width: 100%;
        height: 500px;
    }
    
    #uploadFileDIV, #changePasswordDIV, #editUserDIV, #mapDIV{
        width: 700px;
        height: auto;
        position: relative;
        margin: 80px auto 0px auto;
    }
    
    #addEventDIV, #editEventDIV, #addTaskDIV, #editTaskDIV{
        width: 700px;
        height: auto;
        position: relative;
        margin: 60px auto 0px auto;
    }
    
    .profile-header-img {
        float: left;
        width: 120px;
        max-height: 120px;
        height: auto;
        overflow: hidden;
        position: relative;
        z-index: 10;
        margin: 0 0 -20px;
        padding: 3px;
        border-radius: 4px;
        background: #fff;
    }
    
    
    
    .pointer{
        cursor: pointer;
    }
    
    .card-img-top {
        border-top-right-radius: 4px;
        border-top-left-radius: 4px;
        width: 100%;
        height: 200px;
        position: relative;
    }
    
    .card{
        max-width: 20%;
    }
    
    .image-capt{
        position: absolute;
        top: 15px;
        left: 0px;
        color: rgb(255, 255, 255);
        background: rgba(0, 0, 0, 0.6);
        padding: 5px 15px;
        margin: 0px;
    }
    
    .search-input-gray{
        width: 300px;
        position: relative;
        padding: 0 15px 0 15px;
        height: 36px;
        border: 0;
        border-radius: 2px;
        font: 15px/30px "Helvetica Neue",Arial,Helvetica,sans-serif;
        -webkit-transition: background .3s;
        transition: background .3s;
        -webkit-box-sizing: border-box;
        box-sizing: border-box;
        outline: 0;
        z-index: 1;
        background-color: #eee;
    }
    
    .input-sm{
        height: 28px;
        line-height: 12px;
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
                				echo '<li class="has-sub active">
                            			<a href="javascript:;">
                            				<b class="caret pull-right"></b>
                            				<i class="fas fa-building"></i> 
                            				<span>Company</span>
                            			</a>
                            			<ul class="sub-menu">
                            			    <li><a href="' . BASE_URL . 'departments">Structure</a></li>
                            				<li class="active"><a href="' . BASE_URL . 'employees">Employees</a></li>
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
			<!-- begin profile -->
			<div class="profile">
				<div class="profile-header">
					<!-- BEGIN profile-header-cover -->
					<div class="profile-header-cover"></div>
					<!-- END profile-header-cover -->
					<!-- BEGIN profile-header-content -->
					<div class="profile-header-content">
						<!-- BEGIN profile-header-img -->
						<?php
						    if ($employee["profile_image"] != ""){
						       echo '<div class="profile-header-img">
            							<img src="' . IMG_URL . $employee["profile_image"] . '" alt="">
            						</div>';
						    }
						?>
						<!-- END profile-header-img -->
						<!-- BEGIN profile-header-info -->
						<div class="profile-header-info">
							<h4 class="m-t-10 m-b-5"><?php echo $employee["employee_name"] . " " . $employee["employee_surname"]; ?></h4>
							<p class="m-b-10"><?php echo $employee["employee_position"] ?></p>
						</div>
						<!-- END profile-header-info -->
					</div>
					<!-- END profile-header-content -->
					<!-- BEGIN profile-header-tab -->
					<ul class="profile-header-tab nav nav-tabs">
						<li class="nav-item active"><a href="#profile-about" class="nav-link" data-toggle="tab">ABOUT</a></li>
						<li class="nav-item"><a href="#profile-workgroups" class="nav-link" data-toggle="tab">WORKGROUPS</a></li>
						<li class="nav-item"><a href="#profile-events" class="nav-link" data-toggle="tab">EVENTS</a></li>
						<li class="nav-item"><a href="#profile-documents" class="nav-link" data-toggle="tab">DOCUMENTS</a></li>
						<li class="nav-item"><a href="#profile-ticketing" class="nav-link" data-toggle="tab">TICKETING</a></li>
						<li class="nav-item"><a href="#profile-workorders" class="nav-link" data-toggle="tab">WORK ORDERS</a></li>
						<li class="nav-item"><a href="#profile-calls" class="nav-link" data-toggle="tab">CALLS</a></li>
						<li class="nav-item"><a href="#profile-tracking" class="nav-link" data-toggle="tab">TRAVEL ORDERS</a></li>
						<li class="nav-item"><a href="#profile-sla" class="nav-link" data-toggle="tab">SLA</a></li>
					</ul>
					<!-- END profile-header-tab -->
				</div>
			</div>
			<!-- end profile -->
			<!-- begin profile-content -->
            <div class="profile-content">
            	<!-- begin tab-content -->
            	<div class="tab-content p-0">
            		<!-- begin #profile-about tab -->
            		<div class="tab-pane fade in active" id="profile-about">
						<!-- begin table -->
						<div class="row">
						    <div class="col-md-6">
								<div class="m-b-10 f-s-10 m-t-10">
									<b class="text-inverse">ABOUT</b>
								</div>
								<div class="widget-list widget-list-rounded m-b-30" data-id="widget">
									<div class="widget-list-item">
										<div class="widget-list-media icon">
											<i class="fas fa-user bg-blue text-white"></i>
										</div>
										<div class="widget-list-content">
											<h4 class="widget-list-title">Name & surname</h4>
										</div>
										<div class="widget-list-action text-nowrap text-right">
											<span class="badge badge-primary"><?php echo $employee["employee_name"] . " " . $employee["employee_surname"]; ?></span>
										</div>
									</div>
									<div class="widget-list-item">
										<div class="widget-list-media icon">
											<i class="fas fa-industry bg-blue text-white"></i>
										</div>
										<div class="widget-list-content">
											<h4 class="widget-list-title">Department</h4>
										</div>
										<div class="widget-list-action text-nowrap text-right">
											<span class="badge badge-primary"><?php echo $employee["department_name"]; ?></span>
										</div>
									</div>
									<div class="widget-list-item">
										<div class="widget-list-media icon">
											<i class="fas fa-graduation-cap bg-blue text-white"></i>
										</div>
										<div class="widget-list-content">
											<h4 class="widget-list-title">Position</h4>
										</div>
										<div class="widget-list-action text-nowrap text-right">
											<span class="badge badge-primary"><?php echo $employee["employee_position"]; ?></span>
										</div>
									</div>
									<div class="widget-list-item">
										<div class="widget-list-media icon">
											<i class="fab fa-android bg-pink text-white"></i>
										</div>
										<div class="widget-list-content">
											<h4 class="widget-list-title">Last app login</h4>
										</div>
										<div class="widget-list-action text-nowrap text-right">
											<?php 
												$date = "Never";
												if ($employee["last_login"] != ""){
													$date = date("l, d. F Y, H:i", strtotime($employee["last_login"]));
												}
												echo $date;
											?>
										</div>
									</div>
									<div class="widget-list-item">
										<div class="widget-list-media icon">
											<i class="fas fa-globe bg-pink text-white"></i>
										</div>
										<div class="widget-list-content">
											<h4 class="widget-list-title">Last web login</h4>
										</div>
										<div class="widget-list-action text-nowrap text-right">
											<?php 
														$date = "Never";
														if ($employee["last_login_web"] != ""){
															$date = date("l, d. F Y, H:i", strtotime($employee["last_login_web"]));
														}
														echo $date;
														?>
										</div>
									</div>
									<div class="widget-list-item">
										<div class="widget-list-media icon">
											<i class="fas fa-mobile bg-success text-white"></i>
										</div>
										<div class="widget-list-content">
											<h4 class="widget-list-title">Mobile phone</h4>
										</div>
										<div class="widget-list-action text-nowrap text-right">
											<span class="badge badge-success"><?php echo $employee["employee_phone"]; ?></span>
										</div>
									</div>
									<div class="widget-list-item">
										<div class="widget-list-media icon">
											<i class="fas fa-phone bg-success text-white"></i>
										</div>
										<div class="widget-list-content">
											<h4 class="widget-list-title">Work phone</h4>
										</div>
										<div class="widget-list-action text-nowrap text-right">
											<span class="badge badge-success"><?php echo $employee["employee_workphone"]; ?></span>
										</div>
									</div>
									<div class="widget-list-item">
										<div class="widget-list-media icon">
											<i class="fas fa-at bg-success text-white"></i>
										</div>
										<div class="widget-list-content">
											<h4 class="widget-list-title">E-mail</h4>
										</div>
										<div class="widget-list-action text-nowrap text-right">
											<span class="badge badge-success"><?php echo $employee["employee_email"]; ?></span>
										</div>
									</div>
									<div class="widget-list-item">
										<div class="widget-list-media icon">
											<i class="fas fa-home bg-indigo text-white"></i>
										</div>
										<div class="widget-list-content">
											<h4 class="widget-list-title">Residence</h4>
										</div>
										<div class="widget-list-action text-nowrap text-right">
											<?php echo '<span class="hover-underline text-primary" onClick="showOnMap()">' . $employee["employee_residence"] . "</span>"; ?>
										</div>
									</div>
									<div class="widget-list-item">
										<div class="widget-list-media icon">
											<i class="fas fa-clock bg-indigo text-white"></i>
										</div>
										<div class="widget-list-content">
											<h4 class="widget-list-title">Work time</h4>
										</div>
										<div class="widget-list-action text-nowrap text-right">
											<?php echo $employee["employee_workfrom"] . " - " . $employee["employee_workto"]; ?>
										</div>
									</div>
									<div class="widget-list-item">
										<div class="widget-list-media icon">
											<i class="fas fa-tags bg-red text-white"></i>
										</div>
										<div class="widget-list-content">
											<h4 class="widget-list-title">Ticketing SLA</h4>
											<p class="widget-list-desc">Amount of allocated time to respond to a new ticket</p>
										</div>
										<div class="widget-list-action text-nowrap text-right">
											<span class="badge bg-red"><?php echo $employee["ticketing_sla"] . " minutes"; ?></span>
										</div>
									</div>
									<div class="widget-list-item">
										<div class="widget-list-media icon">
											<i class="ion-settings bg-red text-white"></i>
										</div>
										<div class="widget-list-content">
											<h4 class="widget-list-title">Work order SLA</h4>
											<p class="widget-list-desc">Amount of allocated time to respond to a new work order</p>
										</div>
										<div class="widget-list-action text-nowrap text-right">
											<span class="badge bg-red"><?php echo $employee["workorder_sla"] . " minutes"; ?></span>
										</div>
									</div>
									<div class="widget-list-item">
										<div class="widget-list-media icon">
											<i class="ion-shuffle bg-red text-white"></i>
										</div>
										<div class="widget-list-content">
											<h4 class="widget-list-title">Calls SLA</h4>
											<p class="widget-list-desc">Amount of allocated time to respond to incoming calls</p>
										</div>
										<div class="widget-list-action text-nowrap text-right">
											<span class="badge bg-red"><?php echo $employee["calls_sla"] . " minutes"; ?></span>
										</div>
									</div>
									<div class="widget-list-item">
										<div class="widget-list-media icon">
											<i class="fas fa-comments bg-red text-white"></i>
										</div>
										<div class="widget-list-content">
											<h4 class="widget-list-title">Work group SLA</h4>
											<p class="widget-list-desc">Amount of time allocated to respond to new tasks</p>
										</div>
										<div class="widget-list-action text-nowrap text-right">
											<span class="badge bg-red"><?php echo $employee["workgroup_sla"] . " minutes"; ?></span>
										</div>
									</div>
								</div>
							</div>
							<div class="col-md-6">
								<div class="m-b-10 f-s-10 m-t-10">
									<b class="text-inverse">QUICK OVERVIEW</b>
								</div>
								<div class="widget-list widget-list-rounded m-b-30" data-id="widget">
									<div class="widget-list-item">
										<div class="widget-list-media icon">
											<i class="fas fa-object-group bg-blue text-white"></i>
										</div>
										<div class="widget-list-content">
											<h4 class="widget-list-title">Workgroups</h4>
											<p class="widget-list-desc">Number of workgroups where this employee is a member</p>
										</div>
										<div class="widget-list-action text-nowrap text-right">
											<span class="badge badge-primary"><?php echo count($workgroups); ?></span>
										</div>
									</div>
									<div class="widget-list-item">
										<div class="widget-list-media icon">
											<i class="fab fa-elementor bg-blue text-white"></i>
										</div>
										<div class="widget-list-content">
											<h4 class="widget-list-title">Events</h4>
											<p class="widget-list-desc">Total number of events assigned to this employee</p>
										</div>
										<div class="widget-list-action text-nowrap text-right">
											<span class="badge badge-primary"><?php echo count($events); ?></span>
										</div>
									</div>
									<div class="widget-list-item">
										<div class="widget-list-media icon">
											<i class="fas fa-tags bg-blue text-white"></i>
										</div>
										<div class="widget-list-content">
											<h4 class="widget-list-title">Tickets</h4>
											<p class="widget-list-desc">Amount of tickets assigned to this employee</p>
										</div>
										<div class="widget-list-action text-nowrap text-right">
											<span class="badge badge-primary"><?php echo count($tickets); ?></span>
										</div>
									</div>
									<div class="widget-list-item">
										<div class="widget-list-media icon">
											<i class="fas fa-archive bg-blue text-white"></i>
										</div>
										<div class="widget-list-content">
											<h4 class="widget-list-title">Work orders</h4>
											<p class="widget-list-desc">Amount of work orders assigned to this employee</p>
										</div>
										<div class="widget-list-action text-nowrap text-right">
											<span class="badge badge-primary"><?php echo count($workorders); ?></span>
										</div>
									</div>
									<div class="widget-list-item">
										<div class="widget-list-media icon">
											<i class="fas fa-phone bg-blue text-white"></i>
										</div>
										<div class="widget-list-content">
											<h4 class="widget-list-title">Calls</h4>
											<p class="widget-list-desc">Number of calls taken and made by this employee</p>
										</div>
										<div class="widget-list-action text-nowrap text-right">
											<span class="badge badge-primary"><?php echo count($calls); ?></span>
										</div>
									</div>
									<div class="widget-list-item">
										<div class="widget-list-media icon">
											<i class="fas fa-plane bg-blue text-white"></i>
										</div>
										<div class="widget-list-content">
											<h4 class="widget-list-title">Travel orders</h4>
											<p class="widget-list-desc">Number of travel orders generated for this employee</p>
										</div>
										<div class="widget-list-action text-nowrap text-right">
											<span class="badge badge-primary"><?php echo count($travelorders); ?></span>
										</div>
									</div>
								</div>
							</div>
                        </div>
						<!-- end table -->
					</div>
            		<!-- end #profile-about tab -->
            		<!-- begin #profile-photos tab -->
            		<div class="tab-pane fade in" id="profile-workgroups">
            		    <div class="card-group">
                            <?php
                                $count = 1;
                                foreach ($workgroups as $workgroup){
                    				echo '<div class="card pointer" onClick="goToWorkgroup(' . $workgroup["workgroup_id"] . ')">' .
                							'<img class="card-img-top" src="/assets/img/gallery/gallery-' . $count . '.jpg" alt="Card image cap">' .
                							'<div class="image-capt">' . date("l jS F Y", strtotime($workgroup["created_on"])) . '</div>' .
                							'<div class="card-block">' .
                								'<h4 class="card-title">' . $workgroup["name"] . '<br><small>' . count(explode(",", $workgroup["users"])) . ' members<span class="pull-right">by <span class="text-primary">' . $workgroup["employee_name"] . " " . $workgroup["employee_surname"] . '</span></span></small></h4>' .
                								'<p class="card-text">' . $workgroup["description"] . '</p>' .
                								'<p class="card-text"></p>' .
                							'</div>' .
                						'</div>';
                						$count++;
                                }
            				?>
                        </div>
            		</div>
            		<!-- end #profile-photos tab -->
            		<!-- begin #profile-videos tab -->
            		<div class="tab-pane fade in" id="profile-events">
            		    <div class="wrapper bg-primary">
                                <!-- begin btn-toolbar -->
                                <div class="btn-toolbar">
                                    <!-- begin btn-group -->
                                    <input id="searchEventInput" type="text" class="form-control width-sm input-sm pull-left" placeholder="Search events" onkeyup="filterEvents()"/>
                                    
                                    <!-- end btn-group -->
                                    <!-- begin btn-group -->
                                    <div class="btn-group pull-right">
                                        <button class="btn btn-sm btn-white" data-toggle="tooltip" data-placement="bottom" data-title="Refresh" data-original-title="" title="" onclick="getEvents()"><i class="ion-refresh"></i></button>
                                    </div>
                                    <div class="btn-group dropdown pull-right">
                                        <button class="btn btn-white btn-sm dropdown-toggle" data-toggle="dropdown">
                                            View <span class="caret"></span>
                                        </button>
                                        <ul id="eventViewDropdown" class="dropdown-menu text-left text-sm">
                                            <li class="active"><a href="javascript:;"><i class="fa fa-circle f-s-10 fa-fw m-r-5"></i> All</a></li>
                                            <li><a href="javascript:;"><i class="fa fa-circle f-s-10 fa-fw m-r-5"></i> This week</a></li>
                                            <li><a href="javascript:;"><i class="fa fa-circle f-s-10 fa-fw m-r-5"></i> This month</a></li>
                                            <li><a href="javascript:;"><i class="fa fa-circle f-s-10 fa-fw m-r-5"></i> This year</a></li>
                                        </ul>
                                    </div>
                                    <!-- end btn-group -->
                                </div>
                                <!-- end btn-toolbar -->
                        </div>
            		    <ul id="eventTimeline" class="timeline bg-silver">
                			<?php
                			    foreach ($events as $event){
                			        $status;
                    			        if ($event["status"] == 0){
                    			            $status = "timeline-warning";
											$statusTxt = "Incomplete";
                    			        }else if ($event["status"] == 1){
                    			            $status = "timeline-primary";
											$statusTxt = "In progress";
                    			        }else if ($event["status"] == 2){
                    			            $status = "timeline-success";
											$statusTxt = "Finished";
                    			        }else{
                    			            $status = "timeline-danger";
											$statusTxt = "Canceled";
                    			        }
									$participants = explode(",", $event["participants"]);
									$participantString = "";
									foreach ($participants as $participant){
										foreach ($employees as $emp){
											if ($emp["employee_id"] == $participant){
												$participantString .= "<li><a target='_blank' href='employeepage?employee_id=" . $emp["employee_id"] . "' >" . $emp["employee_name"] . " " . $emp["employee_surname"] . "</a></li>";
												break;
											}
										}
									}
									$customerBtn = "";
									if ($event["customer_id"] != null){
										$customerBtn = '<button onClick="viewEventCustomer(' . $event["customer_id"] . ')" class="btn btn-link m-r-15"><i class="fas fa-home fa-fw fa-lg m-r-3"></i> View customer</button>';
									}
									$mapBtn = "";
									if ($event["event_address"] != ""){
										$mapBtn = '<button onClick="viewEventOnMap(' . $event["event_id"] . ')" class="btn btn-link m-r-15"><i class="fa fa-map-marker-alt fa-fw fa-lg m-r-3"></i> View on map</button>';
									}
                    				echo '<li>
                    			        <div class="timeline-time">
                    			            <span class="date">' . date("l, jS F Y", strtotime($event["event_startdate"])) . '</span>
                    			            <span class="time">' . $event["event_starttime"] . '</span>
                    			        </div>
                    			        <div class="timeline-icon ' . $status . '">
                    			            <a data-toggle="tooltip" title="' . $statusTxt . '" href="javascript:;">&nbsp;</a>
                    			        </div>
                    			        <div class="timeline-body">
                    			            <div class="timeline-header">
                    			                <span class="username">' . $event["event_subject"] . '</span>
                    			            </div>
                    			            <div class="timeline-content">
												<h5 class="template-title"> 
													<label class="label label-primary">' . $event["event_type"] . '</label>' .  
												'</h5>
                    			                <h5 class="template-title">'
                    			                    . $event["event_description"] . '
                    			                </h5>
												<h6 class="m-t-15">Participants</h6>
												<ul>' . $participantString . '</ul>
                                            </div>
                    			            <div class="timeline-footer">'
                    			                . $mapBtn . $customerBtn . '
                    			            </div>
                    			        </div>
                    			    </li>';
                                }
                			?>
            			</ul>
            		</div>
            		<div class="tab-pane fade" id="profile-documents">
            		    <div class="wrapper bg-primary">
                                <!-- begin btn-toolbar -->
                                <div class="btn-toolbar">
                                    <!-- begin btn-group -->
                                    <input id="fileSearchInput" type="text" class="form-control width-sm input-sm pull-left" placeholder="Search files"/>
                                    
                                    <!-- end btn-group -->
                                    <!-- begin btn-group -->
                                    <div class="btn-group pull-right">
                                        <button class="btn btn-sm btn-white" data-toggle="tooltip" data-placement="bottom" data-title="Refresh" data-original-title="" title="" onclick="getEmployeeDocuments()"><i class="ion-refresh"></i></button>
                                    </div>
                                    <!-- end btn-group -->
                                </div>
                                <!-- end btn-toolbar -->
                        </div>
                        <div class="bg-silver p-15">
            		        <?php
            		            echo '<h4 class="m-l-15 m-t-0 p-t-10">Disk used (' . $disk_free["disk_used"] .' out of 1 GB)</h4>';
            		            $totalSpace = 1000000000;
            		            $disk_used_bytes = $disk_free["disk_bytes"];
            		            $percentUsage = ($disk_used_bytes / $totalSpace ) * 100;
                		        echo '<div class="progress rounded-corner progress-striped m-l-15">
                                          <div class="progress-bar bg-red" style="width: ' . $percentUsage . '%">
                                          </div>
                                        </div>';
            		        ?>
                            <h4 class="m-l-15">My files<button id="treeDownloadBtn" class="btn material primary hide pull-right m-r-15" onclick="treeDownloadClicked()">Download file</button><br><small>Tree view</small></h4>
                            <div id="documentsTree" class="p-b-10">
                        
                            </div>
                        </div>
            		</div>
					<div class="tab-pane fade" id="profile-ticketing">
						<div class="wrapper bg-primary">
                                <!-- begin btn-toolbar -->
                                <div class="btn-toolbar">
                                    <input id="searchTicketsInput" type="text" class="form-control width-sm input-sm pull-left" placeholder="Search tickets" onkeyup="filterTickets()"/>
                                    <!-- begin btn-group -->
                                    <div class="btn-group pull-right">
                                        <button class="btn btn-sm btn-white" data-toggle="tooltip" data-placement="bottom" data-title="Refresh" data-original-title="" title="" onclick="getTickets()"><i class="ion-refresh"></i></button>
                                    </div>
                                    <!-- begin btn-group -->
                                    
                                    <!-- end btn-group -->
                                </div>
                                <!-- end btn-toolbar -->
                            </div>
                		    <ul id="ticketsTimeline" class="timeline bg-silver">
                    			<?php
                    			    foreach ($tickets as $ticket){
                    			        $viewWorkorderBtn = "";
                    			        if ($ticket["workorder_id"] != null){
                    			            $viewWorkorderBtn = '<a target="_blank" href="workorderdetails?workorder_id=' . $ticket["workorder_id"] . '" class="btn btn-link m-r-15"><i class="fa fa-edit fa-fw fa-lg m-r-3"></i> View work order</a>';
                    			        }
										$subsidiaryName = $ticket["subsidiary_name"];
										if ($subsidiaryName == null){
											$subsidiaryName = "Main company";
										}
										$status;
										if ($ticket["ticket_status"] == 0){
											$status = "timeline-warning";
											$statusTxt = "Pending";
										}else if ($ticket["ticket_status"] == 1){
											$status = "timeline-info";
											$statusTxt = "In progress";
										}else if ($ticket["ticket_status"] == 2){
											$status = "timeline-primary";
											$statusTxt = "Finished";
										}else if ($ticket["ticket_status"] == 3){
											$status = "timeline-success";
											$statusTxt = "Approved";
										}else{
											$status = "timeline-danger";
											$statusTxt = "Canceled";
										}
                        				echo '<li>
                        			        <div class="timeline-time">
                        			            <span class="date">' . date("l, jS F Y", strtotime($ticket["ticket_date"])) . '</span>
                        			        </div>
                        			        <div class="timeline-icon ' . $status . '">
												<a data-toggle="tooltip" title="' . $statusTxt . '" href="javascript:;">&nbsp;</a>
											</div>
                        			        <div class="timeline-body">
												<label class="label label-primary">' . $ticket["category_name"] . '</label>
                        			            <div class="timeline-header">
                        			                <span class="username">' . $ticket["ticket_subject"] . '</span>
                        			            </div>
                        			            <div class="timeline-content">
                        			                <h5 class="template-title">' 
                        			                    . $subsidiaryName . '
                        			                </h5>
													<h4>' . $ticket["ticket_location"] . '</h4>
													<p>Created by <a target="_blank" href="employeepage?employee_id=' . $ticket["employee_id"] . '">' . $ticket["employee_name"] . " " . $ticket["employee_surname"] . '</a></p>
                        			                <p>' . $ticket["ticket_notes"] . '</p>
                                                </div>
                        			            <div class="timeline-footer">
                        			                <a target="_blank" href="ticketdetails?ticket_id=' . $ticket["ticket_id"] . '" class="btn btn-link m-r-15"><i class="fa fa-edit fa-fw fa-lg m-r-3"></i> View ticket</a>' . $viewWorkorderBtn . '
                        			            </div>
                        			        </div>
                        			    </li>';
                                    }
                    			?>
                			</ul>
					</div>
					<div class="tab-pane fade" id="profile-calls">
						<div class="wrapper bg-primary">
                                <!-- begin btn-toolbar -->
                                <div class="btn-toolbar">
                                    <input id="searchCallsInput" type="text" class="form-control width-sm input-sm pull-left" placeholder="Search calls" onkeyup="filterCalls()"/>
                                    <!-- begin btn-group -->
                                    <div class="btn-group pull-right">
                                        <button class="btn btn-sm btn-white" data-toggle="tooltip" data-placement="bottom" data-title="Refresh" data-original-title="" title="" onclick="getCalls()"><i class="ion-refresh"></i></button>
                                    </div>
                                    <!-- end btn-group -->
                                    <!-- begin btn-group -->
                                    
                                    <!-- end btn-group -->
                                </div>
                                <!-- end btn-toolbar -->
                            </div>
                		    <ul id="callTimeline" class="timeline bg-silver">
                    			<?php
                    			    foreach ($calls as $call){
                    			        $viewTicketBtn = "";
                    			        if ($call["ticket_id"] != null){
                    			            $viewTicketBtn = '<button onClick="viewTicket(' . $call["ticket_id"] . ')" class="btn btn-link m-r-15"><i class="fa fa-edit fa-fw fa-lg m-r-3"></i> View ticket</button>';
                    			        }
                        				echo '<li>
                        			        <div class="timeline-time">
                        			            <span class="date">' . date("l, jS F Y", strtotime($call["call_datetime"])) . '</span>
                        			            <span class="time">' . date("H:i", strtotime(explode(" ", $call["call_datetime"])[1])) . '</span>
                        			        </div>
                        			        <div class="timeline-icon timeline-primary">
                        			            <a href="javascript:;">&nbsp;</a>
                        			        </div>
                        			        <div class="timeline-body">
                        			            <div class="timeline-header">
                        			                <span class="username">' . $call["call_subject"] . '</span>
                        			            </div>
                        			            <div class="timeline-content">
                        			                <h5 class="template-title">
                        			                    <i class="fa fa-phone text-primary fa-fw"></i> '
                        			                    . $call["call_phonenumber"] . '
                        			                </h5>
                        			                <p>' . $call["call_notes"] . '</p>
                                                </div>
                        			            <div class="timeline-footer">
                        			                <button onClick="viewCall(' . $call["call_id"] . ')" class="btn btn-link m-r-15"><i class="fa fa-edit fa-fw fa-lg m-r-3"></i> View call</button>' . $viewTicketBtn . '
                        			            </div>
                        			        </div>
                        			    </li>';
                                    }
                    			?>
                			</ul>
					</div>
					<div class="tab-pane fade" id="profile-tracking">
						<div class="wrapper bg-primary">
                                <!-- begin btn-toolbar -->
                                <div class="btn-toolbar">
									<input id="searchTravelOrdersInput" type="text" class="form-control width-sm input-sm pull-left" placeholder="Search travel orders" onkeyup="filterTravelOrders()"/>
                                    <!-- begin btn-group -->
                                    <div class="btn-group pull-right">
                                        <button class="btn btn-sm btn-white" data-toggle="tooltip" data-placement="bottom" data-title="Refresh" data-original-title="" title="" onclick="getTravelOrders()"><i class="ion-refresh"></i></button>
                                    </div>
                                    <!-- end btn-group -->
                                </div>
                                <!-- end btn-toolbar -->
                        </div>
						<ul id="travelorderTimeline" class="timeline bg-silver">
							<?php
								foreach ($travelorders as $travelorder){
									$statusColor = "timeline-danger";
									$statusString = "Incomplete";
									if ($travelorder["status"] == 1){
										$statusColor = "timeline-success";
										$statusString = "Finished";
									}
                    				echo '<li>
                    			        <div class="timeline-time">
                    			            <span class="date">' . date("l, jS F Y, H:i", strtotime($travelorder["date_from"] . ' ' . $travelorder["time_from"])) . '</span>
                    			            <span class="time">' . date("l, jS F Y, H:i", strtotime($travelorder["date_to"] . ' ' . $travelorder["time_to"])) . '</span>
                    			        </div>
                    			        <div class="timeline-icon ' . $statusColor . '">
                    			            <a data-toggle="tooltip" title="' . $statusString . '" href="javascript:;">&nbsp;</a>
                    			        </div>
                    			        <div class="timeline-body">
                    			            <div class="timeline-header">
                    			                <span class="username">' . $travelorder["travelorder_number"] . '</span>
                    			            </div>
                    			            <div class="timeline-content">
												<h4 class="template-title"> '
													. $travelorder["vehicle_brand"] . ' ' . $travelorder["vehicle_model"] .
												'</h4>
                    			                <h5 class="template-title">'
                    			                    . $travelorder["vehicle_registration"] . '
                    			                </h5>
                                            </div>
                    			            <div class="timeline-footer">
												<a target="_blank" href="travelorderdetails?travelorder_id=' . $travelorder["travelorder_id"] . '" class="btn btn-link m-r-15"><i class="fas fa-eye fa-fw fa-lg m-r-3"></i>View travel order</a>
												<a target="_blank" href="triporderdetails?trip_id=' . $travelorder["trip_id"] . '" class="btn btn-link m-r-15"><i class="fas fa-eye fa-fw fa-lg m-r-3"></i>View trip order</a>
                    			            </div>
                    			        </div>
                    			    </li>';
                                }
							?>
						</ul>
					</div>
					<div class="tab-pane fade" id="profile-workorders">
							<div class="wrapper bg-primary">
                                <!-- begin btn-toolbar -->
                                <div class="btn-toolbar">
                                    <input id="searchWorkordersInput" type="text" class="form-control width-sm input-sm pull-left" placeholder="Search work orders" onkeyup="filterWorkorders()"/>
                                    <!-- begin btn-group -->
                                    <div class="btn-group pull-right">
                                        <button class="btn btn-sm btn-white" data-toggle="tooltip" data-placement="bottom" data-title="Refresh" data-original-title="" title="" onclick="getWorkorders()"><i class="ion-refresh"></i></button>
                                    </div>
                                    <!-- begin btn-group -->
                                    
                                    <!-- end btn-group -->
                                </div>
                                <!-- end btn-toolbar -->
                            </div>
                		    <ul id="workordersTimeline" class="timeline bg-silver">
                    			<?php
                    			    foreach ($workorders as $workorder){
                    			        $viewTicketBtn = "";
                    			        if ($workorder["ticket_id"] != null){
                    			            $viewTicketBtn = '<a target="_blank" href="ticketdetails?ticket_id=' . $workorder["ticket_id"] . '" class="btn btn-link m-r-15"><i class="fa fa-edit fa-fw fa-lg m-r-3"></i> View ticket</a>';
                    			        }
										$subsidiaryName = $workorder["subsidiary_name"];
										if ($subsidiaryName == null){
											$subsidiaryName = "Main company";
										}
										$status;
										if ($workorder["status"] == 0){
											$status = "timeline-warning";
											$statusTxt = "Incomplete";
										}else if ($workorder["status"] == 1){
											$status = "timeline-info";
											$statusTxt = "In progress";
										}else if ($workorder["status"] == 2){
											$status = "timeline-success";
											$statusTxt = "Finished";
										}else{
											$status = "timeline-danger";
											$statusTxt = "Canceled";
										}
                        				echo '<li>
                        			        <div class="timeline-time">
                        			            <span class="date">' . date("l, jS F Y", strtotime($workorder["workorder_startdate"])) . '</span>
												<span class="time">' . date("l, jS F Y", strtotime($workorder["workorder_enddate"])) . '</span>
                        			        </div>
                        			        <div class="timeline-icon ' . $status . '">
												<a data-toggle="tooltip" title="' . $statusTxt . '" href="javascript:;">&nbsp;</a>
											</div>
                        			        <div class="timeline-body">
                        			            <div class="timeline-header">
                        			                <span class="username">' . $workorder["workorder_subject"] . '</span>
                        			            </div>
                        			            <div class="timeline-content">
                        			                <h5 class="template-title">' 
                        			                    . $subsidiaryName . '
                        			                </h5>
													<h4>' . $workorder["workorder_location"] . '</h4>
													<p>Created by <a target="_blank" href="employeepage?employee_id=' . $workorder["employee_id"] . '">' . $workorder["employee_name"] . " " . $workorder["employee_surname"] . '</a></p>
                        			                <p>' . $workorder["workorder_notes"] . '</p>
                                                </div>
                        			            <div class="timeline-footer">
                        			                <a target="_blank" href="workorderdetails?workorder_id=' . $workorder["workorder_id"] . '" class="btn btn-link m-r-15"><i class="fa fa-edit fa-fw fa-lg m-r-3"></i> View work order</a>' . $viewTicketBtn . '
                        			            </div>
                        			        </div>
                        			    </li>';
                                    }
                    			?>
                			</ul>
					</div>
					<div class="tab-pane fade" id="profile-sla">
						<div class="row">
							<div class="col-md-12">
								<div class="widget widget-rounded m-b-30">
									<!-- begin widget-header -->
									<div class="widget-header">
										<h4 class="widget-header-title">Tickets overview</h4>
									</div>
									<!-- end widget-header -->
									<!-- begin vertical-box -->
									<div class="vertical-box with-grid with-border-top">
										<!-- begin vertical-box-column -->
										<div class="vertical-box-column p-15" style="width: 25%;">
											<div class="widget-chart-info">
												<h4 class="widget-chart-info-title">Average turn around times</h4>
												<p class="widget-chart-info-desc">This employee has had a total of <strong><span id="ticketsTotalSpan"></span> ticket(s)</strong>, with the following average turn around times (by priority).</p>
												<div class="widget-chart-info-progress">	<b>Low priority</b>
													<span id="ticketsLowPrioritySpan" class="pull-right"></span>
												</div>
												<div class="progress progress-sm m-b-15">
													<div id="ticketsLowPriorityBar" class="progress-bar progress-bar-striped progress-bar-animated rounded-corner"></div>
												</div>
												<div class="widget-chart-info-progress">	<b>Normal priority</b>
													<span id="ticketsNormalPrioritySpan" class="pull-right"></span>
												</div>
												<div class="progress progress-sm m-b-15">
													<div id="ticketsNormalPriorityBar" class="progress-bar progress-bar-striped progress-bar-animated rounded-corner"></div>
												</div>
												<div class="widget-chart-info-progress">	<b>High priority</b>
													<span id="ticketsHighPrioritySpan" class="pull-right"></span>
												</div>
												<div class="progress progress-sm m-b-15">
													<div id="ticketsHighPriorityBar" class="progress-bar progress-bar-striped progress-bar-animated rounded-corner"></div>
												</div>
												<p class="widget-chart-info-desc">The average turn around time is <strong><span id="ticketsAverageTAT"></span> minutes</strong>.</p>
												<hr>
												<div class="widget-chart-info">
													<h4 class="widget-chart-info-title">Ticket statistics</h4>
													<p class="widget-chart-info-desc">The statuses of all tickets assigned to this employee are shown below.</p>
													<div class="widget-chart-info-progress">	<b>Incomplete</b>
														<span id="ticketsIncompleteSpan" class="pull-right"></span>
													</div>
													<div class="progress progress-sm m-b-15">
														<div id="ticketsIncompleteBar" class="progress-bar progress-bar-striped progress-bar-animated rounded-corner bg-warning"></div>
													</div>
													<div class="widget-chart-info-progress">	<b>In progress</b>
														<span id="ticketsInProgressSpan" class="pull-right"></span>
													</div>
													<div class="progress progress-sm m-b-15">
														<div id="ticketsInProgressBar" class="progress-bar progress-bar-striped progress-bar-animated rounded-corner bg-info"></div>
													</div>
													<div class="widget-chart-info-progress">	<b>Finished</b>
														<span id="ticketsFinishedSpan" class="pull-right"></span>
													</div>
													<div class="progress progress-sm">
														<div id="ticketsFinishedBar" class="progress-bar progress-bar-striped progress-bar-animated rounded-corner bg-primary"></div>
													</div>
													<div class="widget-chart-info-progress">	<b>Approved</b>
														<span id="ticketsApprovedSpan" class="pull-right"></span>
													</div>
													<div class="progress progress-sm">
														<div id="ticketsApprovedBar" class="progress-bar progress-bar-striped progress-bar-animated rounded-corner bg-success"></div>
													</div>
													<div class="widget-chart-info-progress">	<b>Canceled</b>
														<span id="ticketsCanceledSpan" class="pull-right"></span>
													</div>
													<div class="progress progress-sm">
														<div id="ticketsCanceledBar" class="progress-bar progress-bar-striped progress-bar-animated rounded-corner bg-danger"></div>
													</div>
												</div>
											</div>
										</div>
										<!-- end vertical-box-column -->
										<!-- begin vertical-box-column -->
										<div class="vertical-box-column widget-chart-content">
											<div id="ticket-line-chart" class="morris-inverse" style="height: 100%; position: relative; -webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></div>
										</div>
										<!-- end vertical-box-column -->
									</div>
									<!-- end vertical-box -->
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-4">
								<div class="widget widget-rounded m-b-30">
									<!-- begin widget-header -->
									<div class="widget-header">
										<h4 class="widget-header-title">Ticket ratios by type</h4>
									</div>
									<!-- end widget-header -->
									<!-- begin vertical-box -->
									<div class="vertical-box with-grid with-border-top">
										<div id="ticket-type-donut-chart" style="height: 250px;">
												
										</div>
									</div>
								</div>
							</div>
							<div class="col-md-4">
								<div class="widget widget-rounded m-b-30">
									<!-- begin widget-header -->
									<div class="widget-header">
										<h4 class="widget-header-title">Ticket ratios by priority</h4>
									</div>
									<!-- end widget-header -->
									<!-- begin vertical-box -->
									<div class="vertical-box with-grid with-border-top">
										<div id="ticket-priority-donut-chart" style="height: 250px;">
												
										</div>
									</div>
								</div>
							</div>
							<div class="col-md-4">
								<div class="widget widget-rounded m-b-30">
									<!-- begin widget-header -->
									<div class="widget-header">
										<h4 class="widget-header-title">Ticket ratios by customer</h4>
									</div>
									<!-- end widget-header -->
									<!-- begin vertical-box -->
									<div class="vertical-box with-grid with-border-top">
										<div id="ticket-customer-donut-chart" style="height: 250px;">
												
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-12">
								<div class="widget widget-rounded m-b-30">
									<!-- begin widget-header -->
									<div class="widget-header">
										<h4 class="widget-header-title">Work order overview</h4>
									</div>
									<!-- end widget-header -->
									<!-- begin vertical-box -->
									<div class="vertical-box with-grid with-border-top">
										<!-- begin vertical-box-column -->
										<div class="vertical-box-column p-15" style="width: 30%;">
											<div class="widget-chart-info">
												<h4 class="widget-chart-info-title">Average turn around times</h4>
												<p class="widget-chart-info-desc">This employee has had a total of <strong><span id="workordersTotalSpan"></span> work order(s)</strong>, with the following average turn around times (by priority).</p>
												<div class="widget-chart-info-progress">	<b>Low priority</b>
													<span id="workordersLowPrioritySpan" class="pull-right"></span>
												</div>
												<div class="progress progress-sm m-b-15">
													<div id="workordersLowPriorityBar" class="progress-bar progress-bar-striped progress-bar-animated rounded-corner"></div>
												</div>
												<div class="widget-chart-info-progress">	<b>Normal priority</b>
													<span id="workordersNormalPrioritySpan" class="pull-right"></span>
												</div>
												<div class="progress progress-sm m-b-15">
													<div id="workordersNormalPriorityBar" class="progress-bar progress-bar-striped progress-bar-animated rounded-corner"></div>
												</div>
												<div class="widget-chart-info-progress">	<b>High priority</b>
													<span id="workordersHighPrioritySpan" class="pull-right"></span>
												</div>
												<div class="progress progress-sm m-b-15">
													<div id="workordersHighPriorityBar" class="progress-bar progress-bar-striped progress-bar-animated rounded-corner"></div>
												</div>
												<p class="widget-chart-info-desc">The average turn around time is <strong><span id="workordersAverageTAT"></span> minutes</strong>.</p>
												<hr>
												<div class="widget-chart-info">
													<h4 class="widget-chart-info-title">Customer statistics</h4>
													<p class="widget-chart-info-desc">All work orders sorted by status</p>
													<div class="widget-chart-info-progress">	<b>Incomplete</b>
														<span id="workordersIncompleteSpan" class="pull-right"></span>
													</div>
													<div class="progress progress-sm m-b-15">
														<div id="workordersIncompleteBar" class="progress-bar progress-bar-striped progress-bar-animated rounded-corner bg-danger"></div>
													</div>
													<div class="widget-chart-info-progress">	<b>In progress</b>
														<span id="workordersInProgressSpan" class="pull-right"></span>
													</div>
													<div class="progress progress-sm m-b-15">
														<div id="workordersInProgressBar" class="progress-bar progress-bar-striped progress-bar-animated rounded-corner bg-primary"></div>
													</div>
													<div class="widget-chart-info-progress">	<b>Completed</b>
														<span id="workordersFinishedSpan" class="pull-right"></span>
													</div>
													<div class="progress progress-sm">
														<div id="workordersFinishedBar" class="progress-bar progress-bar-striped progress-bar-animated rounded-corner bg-success"></div>
													</div>
												</div>
											</div>
											<hr>
										</div>
										<!-- end vertical-box-column -->
										<!-- begin vertical-box-column -->
										<div class="vertical-box-column widget-chart-content">
											<div id="workorder-line-chart" class="morris-inverse" style="height: 100%; position: relative; -webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></div>
										</div>
										<!-- end vertical-box-column -->
									</div>
									<!-- end vertical-box -->
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-6">
								<div class="widget widget-rounded m-b-30">
									<!-- begin widget-header -->
									<div class="widget-header">
										<h4 class="widget-header-title">Workorder ratios by priority</h4>
									</div>
									<!-- end widget-header -->
									<!-- begin vertical-box -->
									<div class="vertical-box with-grid with-border-top">
										<div id="workorder-priority-donut-chart" style="height: 250px;">
												
										</div>
									</div>
								</div>
							</div>
							<div class="col-md-6">
								<div class="widget widget-rounded m-b-30">
									<!-- begin widget-header -->
									<div class="widget-header">
										<h4 class="widget-header-title">Workorder ratios by customer</h4>
									</div>
									<!-- end widget-header -->
									<!-- begin vertical-box -->
									<div class="vertical-box with-grid with-border-top">
										<div id="workorder-customer-donut-chart" style="height: 250px;">
												
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-2">
								<div class="panel panel-primary">
									<div class="panel-heading">
										<div class="panel-heading-btn">
											<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
										</div>
										<h4 class="panel-title">SLA Settings</h4>
									</div>
									<div class="panel-body">
										<form id="employeeSLAForm" action="<?= BASE_URL . "employee/sla" ?>" method="post" class="form-horizontal">
											<input type="hidden" name="employee_id" value="<?php echo $employee["employee_id"]; ?>" />
											<div class="form-group">
												<div class="col-md-12">
													<label>Ticketing SLA:</label>
													<div class="input-group">
														<input type="number" name="ticketing_sla" class="form-control" min="1" step="1" value="<?php echo $employee["ticketing_sla"]; ?>" required />
														<span class="input-group-addon" id="basic-addon2">minutes</span>
													</div>
												</div>
											</div>
											<div class="form-group">
												<div class="col-md-12">
													<label>Work order SLA:</label>
													<div class="input-group">
														<input type="number" name="workorder_sla" class="form-control" min="1" step="1" value="<?php echo $employee["workorder_sla"]; ?>" required />
														<span class="input-group-addon" id="basic-addon2">minutes</span>
													</div>
												</div>
											</div>
											<div class="form-group">
												<div class="col-md-12">
													<label>Work group SLA:</label>
													<div class="input-group">
														<input type="number" name="workgroup_sla" class="form-control" min="1" step="1" value="<?php echo $employee["workgroup_sla"]; ?>" required />
														<span class="input-group-addon" id="basic-addon2">minutes</span>
													</div>
												</div>
											</div>
											<div class="form-group">
												<div class="col-md-12">
													<label>Calls SLA:</label>
													<div class="input-group">
													  <input type="number" name="calls_sla" class="form-control" min="1" step="1" value="<?php echo $employee["calls_sla"]; ?>" required />
													  <span class="input-group-addon" id="basic-addon2">minutes</span>
													</div>
												</div>
											</div>
											<button class="btn btn-success btn-block">Save settings</button>
										</form>
									</div>
								</div>
							</div>
						</div>
					</div>
            		<!-- end #profile-videos tab -->
				</div>
            	<!-- end tab-content -->
            </div>
			<!-- end profile-content -->
		</div>
		<!-- end #content -->
		<div class="popupContainer" id="mapPopup" hidden>
                <div class="panel panel-primary" id="mapDIV" hidden>
                        <div class="panel-heading">
                            <div class="panel-heading-btn">
                                <button onclick="hideMapPopup()" class="btn btn-xs btn-icon btn-circle btn-default"><i class="fa fa-times"></i>
                                </button>
                            </div>
                            <h4 class="panel-title">Employee residence</h4>
                        </div>
                        <div class="panel-body p-0">
                            <div id="map">
                                
                            </div>
                        </div>
                    </div>
        </div>
        <div class="popupContainer" id="uploadPopup" hidden>
            <div class="panel panel-primary" id="uploadFileDIV" hidden>
                    <div class="panel-heading">
                        <div class="panel-heading-btn">
                            <button onclick="hideUploadFilePopup()" class="btn btn-xs btn-icon btn-circle btn-default"><i class="fa fa-times"></i>
                            </button>
                        </div>
                        <h4 class="panel-title">Upload a file</h4>
                    </div>
                    <div class="panel-body">
                        <form id="uploadFileForm" action="files/upload" method="post" class="form-horizontal dropzone" enctype="multipart/form-data">
                            <input id="uploadDirectoryInput" type="hidden" name="directory" />
                        </form>
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
	<script src="<?= ASSETS_URL . "jstree/dist/jstree.min.js" ?>"></script>
	<script src="<?= ASSETS_URL . "slimscroll/jquery.slimscroll.min.js" ?>"></script>
	<script src="<?= JS_URL . "js.cookie.js" ?>"></script>
	<script src="<?= ASSETS_URL . "dropzone/min/dropzone.min.js" ?>"></script>
	<link href="<?= ASSETS_URL . "telinput/build/css/intlTelInput.css" ?>" rel="stylesheet" />
	<script src="<?= ASSETS_URL . "telinput/build/js/intlTelInput.min.js" ?>"></script>
	<script src="<?= ASSETS_URL . "telinput/build/js/utils.js" ?>"></script>
	<script src="<?= ASSETS_URL . "select2/dist/js/select2.full.min.js" ?>"></script>
	<script src="<?= ASSETS_URL . "fullcalendar/lib/moment.min.js" ?>"></script>
	<script src="<?= ASSETS_URL . "jquery-file-upload/js/jquery.fileupload.js" ?>"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/js/bootstrap-datetimepicker.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/css/bootstrap-datetimepicker.min.css" rel="stylesheet"/>
	<!-- ================== END BASE JS ================== -->
	
	<!-- ================== BEGIN PAGE LEVEL JS ================== -->
	<script src="<?= JS_URL . "apps.min.js" ?>"></script>
	<script src="<?= JS_URL . "timedisplay.js" ?>"></script>
	<script src="<?= JS_URL . "inactivity.js" ?>"></script>
	<script src="<?= ASSETS_URL . "morris/raphael.min.js" ?>"></script>
    <script src="<?= ASSETS_URL . "morris/morris.js" ?>"></script>
	
    
	<!-- ================== END PAGE LEVEL JS ================== -->
	
	<script>
	    var loggedEmployee = <?php echo json_encode($_SESSION["id"]); ?>;
	    var employee_id = <?php echo json_encode($employee["employee_id"]); ?>;
	    var events = <?php echo json_encode($events); ?>;
	    var isAdmin = <?php echo json_encode($_SESSION["admin"]); ?>;
		var employee = <?php echo json_encode($employee); ?>;
	    var eventFiles = [];
	    var editEventFiles = [];
	    var taskFiles = [];
	    var editTaskFiles = [];
	    
		var ticketLineGraph;
		var workorderLineGraph;
	    
	    var currentTask;
	    var googleSignedIn;
		
		var graphsInitialized = false;
	    
	    var map;
	    var mapMarker;
	    
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
			getEmployeeDocuments();
			getEmployees();
			getCustomers();
			
			
			$('a[data-toggle="tab"]').on('shown.bs.tab', function(e) {
			  var target = $(e.target).attr("href") // activated tab

			  switch (target) {
				case "#profile-sla":
				  if (!graphsInitialized){
					getEmployeeTicketSLA(employee_id);
					getEmployeeWorkorderSLA(employee_id);
					graphsInitialized = true;
				  }
				  break;
			  }
			});
			
			$("#eventEmployeeSelect, #editEventEmployeeSelect, #eventCustomerSelect, #editEventCustomerSelect, #editTaskEmployeeSelect, #newTaskEmployeeSelect").select2({width: "100%"});
			
			$(".tel-input").intlTelInput({ initialCountry: "auto",
			hiddenInput: "customer_phone",
			geoIpLookup: function(callback) {
                $.get('https://ipinfo.io', function() {}, "jsonp").always(function(resp) {
                  var countryCode = (resp && resp.country) ? resp.country : "";
                  callback(countryCode);
                });
            }});
            
			Dropzone.options.uploadFileForm = {
			  dictDefaultMessage: "<i class='fa fa-cloud text-primary'></i>&nbsp;Drag and drop files here to upload",
              init: function () {
                this.on("complete", function (file) {
                  if (this.getUploadingFiles().length === 0 && this.getQueuedFiles().length === 0) {
                    getEmployeeDocuments();
                  }
                });
                this.on('error', function(file, response) {
                    swal(
                        'Error!',
                        'The server encountered the following error while uploading the file: ' + response,
                        'error'
                    );
                });
              }
            };
			
			$('#employeeSLAForm').on('submit', function(e) { //use on if jQuery 1.7+
                e.preventDefault();
                $.ajax({
                    type: "POST",
                    url: "employee/sla",
                    data: $("#employeeSLAForm").serialize(),
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
            
            
            $("a[href='#customers-map']").on('shown.bs.tab', function(){
              google.maps.event.trigger(bigMap, 'resize');
            });
            
            $("#eventViewDropdown li").on("click", function(){
                var selected = $(this).index();
                $("#eventViewDropdown li").removeClass("active");
                $(this).addClass("active");
                filterEventsByDate(selected)
            });
            
            $("#taskViewDropdown li").on("click", function(){
                var selected = $(this).index();
                $("#taskViewDropdown li").removeClass("active");
                $(this).addClass("active");
                filterTasksByDate(selected)
            });
            
            $("#fileSearchInput").keyup(function() {
                var searchString = $(this).val();
                $('#documentsTree').jstree(true).search(searchString);
            });
            
            $('#eventCustomerSelect').on('change', function() {
                  var customer_id = this.value;
                  for (var i = 0; i < customersArray.length; i++){
                      if (customersArray[i].customer_id == customer_id){
                        $("#hiddenNewEventLatitudeInput").val(customersArray[i].latitude);
                        $("#hiddenNewEventLongitudeInput").val(customersArray[i].longitude);
                        $("#newEventAddressInput").val(customersArray[i].customer_address);
                      }
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
            
            $('#changePasswordForm').on('submit', function(e) { //use on if jQuery 1.7+
                e.preventDefault();
                checkPasswordValidity();
                $.ajax({
                    type: "POST",
                    url: "<?= BASE_URL ?>" + "employee/password",
                    data: $("#changePasswordForm").serialize(),
                    success: function(msg) {
                        if (msg == "") {
                            swal(
                                'Success!',
                                'Your password has been successfully changed.',
                                'success'
                            );
                            $("#changePasswordForm")[0].reset();
                            
                            hideChangePasswordPopup();
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
            
            Dropzone.options.uploadFileForm = {
			  dictDefaultMessage: "<i class='fa fa-cloud text-primary'></i>&nbsp;Drag and drop files here to upload",
              init: function () {
                this.on("complete", function (file) {
                  if (this.getUploadingFiles().length === 0 && this.getQueuedFiles().length === 0) {
                    getEmployeeDocuments();
                  }
                });
              }
            };
            
            $('#uploadFileForm').on('submit', function(e) { //use on if jQuery 1.7+
			    e.preventDefault();
                var formData = new FormData();
                formData.append('file', $('#fileToUpload')[0].files[0]);
                formData.append('directory', $("#uploadDirectoryInput").val());
                $("#uploadFileBtn").html('<i class="fa fa-spinner fa-pulse"></i>&nbsp;Uploading file...');
                $.ajax({
                       url : "<?= BASE_URL ?>" + 'files/upload',
                       type : 'POST',
                       data : formData,
                       processData: false,  // tell jQuery not to process the data
                       contentType: false,  // tell jQuery not to set contentType
                       success : function(response) {
                           if (response == ""){ //Everything okay
                               swal(
                                    'Upload successful',
                                    'Your file was successfully uploaded.',
                                    'success'
                                );
                                getEmployeeDocuments();
                                hideUploadFilePopup();
                                $("#uploadFileBtn").html('Upload file');
                           }else{
                               swal(
                                    'Upload error',
                                    'The upload ran into the following error : ' + response,
                                    'error'
                                );
                                $("#uploadFileBtn").html('Upload file');
                           }
                       }
                });
            });
			 
            $('#editUserForm').on('submit', function(e) { //use on if jQuery 1.7+
                e.preventDefault();
                var postData = $("#editUserForm").serializeArray();
                postData.push({ name: "employee_mobile", value: $("#editUserPhoneInput").intlTelInput("getNumber")});
                postData.push({ name: "employee_work", value: $("#editUserWorkPhoneInput").intlTelInput("getNumber")})

                $.ajax({
                    type: "POST",
                    url: "<?= BASE_URL ?>" + "profile/edit",
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
                        $("#editEventCustomerSelect, #eventCustomerSelect").append($('<option>', {
                            value: customers[i].customer_id,
                            text: customers[i].customer_name
                        }));
                    }
                }
            });
        }
		
		function showOnMap(){
            if (mapMarker != null){
                mapMarker.setMap(null);
            }
            
            mapMarker = new google.maps.Marker({
                position: new google.maps.LatLng(employee.residence_latitude, employee.residence_longitude),
                map: map,
                title: 'Employee residence'
            });
            var infoWindowContent = "<p class='f-s-12'><strong>" + employee.employee_name + " " + employee.employee_surname + "</strong><br><br><strong>Address - </strong>" + employee.employee_residence + "</p>";
            addInfoWindow(map, mapMarker, infoWindowContent, true);
            $("#mapPopup, #mapDIV").show();
            google.maps.event.trigger(map, 'resize');
            map.setZoom(map.getZoom());
            map.setCenter({lat: parseFloat(employee.residence_latitude), lng: parseFloat(employee.residence_longitude)});
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
        
        function hideMapPopup(){
            $("#mapPopup, #mapDIV").hide();
        }
	    
	    function getEmployees() {
            $.ajax({
                type: "POST",
                url: "<?= BASE_URL ?>" + "employees/list",
                data: null,
                dataType: "json",
                success: function(employees) {
                    employeeArray = employees;
                    $("#editEventEmployeeSelect, #eventEmployeeSelect, #editTaskEmployeeSelect, #newTaskEmployeeSelect").html("");
                    $("#editEventEmployeeSelect, #eventEmployeeSelect, #editTaskEmployeeSelect, #newTaskEmployeeSelect").append($('<option>', {
                            value: "",
                            text: "Choose an employee"
                    }));
                    if (isAdmin == 1){
                        for (var i = 0; i < employees.length; i++){
                            $("#editEventEmployeeSelect, #eventEmployeeSelect, #editTaskEmployeeSelect, #newTaskEmployeeSelect").append($('<option>', {
                                value: employees[i].employee_id,
                                text: employees[i].employee_name + " " + employees[i].employee_surname
                            }));
                        }
                    }else{
                        for (var i = 0; i < employees.length; i++){
                            if (employees[i].employee_id == loggedEmployee){
                                $("#editEventEmployeeSelect, #eventEmployeeSelect, #editTaskEmployeeSelect, #newTaskEmployeeSelect").append($('<option>', {
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
		
		function getEmployeeTicketSLA(employee_id){
			var postData = { employee_id: employee_id };
			$.ajax({
                type: "POST",
                url: "<?= BASE_URL ?>" + "employee/ticketsla",
                data: postData,
				dataType: "json",
                success: function(response) {
					var tickets_by_date = response.tickets_by_date;
					var ticket_resolution_times = response.ticket_resolution_times;
					var tickets_by_type = response.tickets_by_type;
					var tickets_by_customer = response.tickets_by_customer;
					var tickets = response.tickets;
					var chartData = [];
					for (var i = 0; i < tickets_by_date.length; i++) {
						chartData.push({
							"x": tickets_by_date[i].date,
							"y": tickets_by_date[i].ticketcount
						})
					}
					if (chartData.length > 0) {
						$("#ticket-line-chart").html("");
						ticketLineGraph = Morris.Line({
							element: "ticket-line-chart",
							data: chartData,
							xkey: "x",
							ykeys: "y",
							labels: ["Tickets"],
							lineColors: ["#348fe2"],
							pointFillColors: ["#348fe2"],
							lineWidth: "2px",
							pointStrokeColors: ["rgba(255,255,255,0.6)"],
							resize: true,
							gridTextFamily: "inherit",
							gridTextColor: "rgba(0,0,0,0.4)",
							gridTextWeight: "normal",
							gridTextSize: "12px",
							gridLineColor: "rgba(0,0,0,0.15)",
							hideHover: "auto"
						});
					}
					
					var chartData2 = [];
					for (var i = 0; i < tickets_by_type.length; i++){
						chartData2.push({
							label: tickets_by_type[i].category_name,
							value: tickets_by_type[i].ticketcount
						})
					}
					
					if (chartData2.length > 0) {
						$("#ticket-type-donut-chart").html("");
						Morris.Donut({
							element: "ticket-type-donut-chart",
							data: chartData2,
							colors: ["#348fe2"],
							resize: true,
							hideHover: "auto"
						});
					}
					
					var lowPriority = 0;
					var normalPriority = 0;
					var highPriority = 0;
					
					var employeeSLA = response.employee_sla;
					
					var chartData3 = [];
					
					for (var i = 0; i < ticket_resolution_times.length; i++){
						var res = ticket_resolution_times[i];
						if (res.ticket_priority == "Normal"){
							normalPriority = res.resolution_time;
							chartData3.push({
								label: "Normal",
								value: res.ticketcount
							});
						}else if (res.ticket_priority == "High"){
							highPriority = res.resolution_time;
							chartData3.push({
								label: "High",
								value: res.ticketcount
							});
						}else{
							lowPriority = res.resolution_time;
							chartData3.push({
								label: "Low",
								value: res.ticketcount
							});
						}
					}
					
					if (chartData3.length > 0) {
						$("#ticket-priority-donut-chart").html("");
						Morris.Donut({
							element: "ticket-priority-donut-chart",
							data: chartData3,
							colors: ["#00acac", "#348fe2", "#ff5b57"],
							resize: true,
							hideHover: "auto"
						});
					}
					
					var chartData4 = [];
					for (var i = 0; i < tickets_by_customer.length; i++){
						chartData4.push({
							label: tickets_by_customer[i].customer_name,
							value: tickets_by_customer[i].ticketcount
						})
					}
					
					if (chartData4.length > 0) {
						$("#ticket-customer-donut-chart").html("");
						Morris.Donut({
							element: "ticket-customer-donut-chart",
							data: chartData4,
							colors: ["#00acac", "#348fe2", "#ff5b57"],
							resize: true,
							hideHover: "auto"
						});
					}
					
					var averageTAT = Math.round((parseInt(lowPriority) + parseInt(normalPriority) + parseInt(highPriority)) / ticket_resolution_times.length);
					
					$("#ticketsLowPrioritySpan").html(Math.round(lowPriority) + " minutes");
					var lowRatio = (lowPriority / employeeSLA) * 100;
					$("#ticketsLowPriorityBar").css("width", lowRatio + "%");
					if (lowRatio >= 100){
						$("#ticketsLowPriorityBar").addClass("bg-danger");
					}else{
						$("#ticketsLowPriorityBar").addClass("bg-success");
					}
					var normalRatio = (normalPriority / employeeSLA) * 100;
					$("#ticketsNormalPrioritySpan").html(Math.round(normalPriority) + " minutes");
					$("#ticketsNormalPriorityBar").css("width", normalRatio + "%");
					if (normalRatio >= 100){
						$("#ticketsNormalPriorityBar").addClass("bg-danger");
					}else{
						$("#ticketsNormalPriorityBar").addClass("bg-success");
					}
					var highRatio = (highPriority / employeeSLA) * 100;
					$("#ticketsHighPrioritySpan").html(Math.round(highPriority) + " minutes");
					$("#ticketsHighPriorityBar").css("width", highRatio + "%");
					if (highRatio >= 100){
						$("#ticketsHighPriorityBar").addClass("bg-danger");
					}else{
						$("#ticketsHighPriorityBar").addClass("bg-success");
					}
					
					$("#ticketsAverageTAT").html(averageTAT);
		
					var approved = 0;
					var complete = 0;
					var incomplete = 0;
					var progress = 0;
					var canceled = 0;
					for (var i = 0; i < tickets.length; i++) {
						var ticket = tickets[i];
						if (ticket.ticket_status == 0) {
							incomplete++;
						} else if (ticket.ticket_status == 1) {
							progress++;
						} else if (ticket.ticket_status == 2) {
							complete++;
						} else if (ticket.ticket_status == 3) {
							approved++;
						} else {
							canceled++;
						}
					}
					var total = canceled + approved + complete + progress + incomplete;
					$("#ticketsTotalSpan").html(total);
					if (total > 0) {
						$("#ticketsIncompleteSpan").html(incomplete + " tickets");
						$("#ticketsIncompleteBar").css("width", ((incomplete / total) * 100) + "%");
						$("#ticketsInProgressSpan").html(progress + " tickets");
						$("#ticketsInProgressBar").css("width", ((progress / total) * 100) + "%");
						$("#ticketsFinishedSpan").html(complete + " tickets");
						$("#ticketsFinishedBar").css("width", ((complete / total) * 100) + "%");
						$("#ticketsApprovedSpan").html(approved + " tickets");
						$("#ticketsApprovedBar").css("width", ((approved / total) * 100) + "%");
						$("#ticketsCanceledSpan").html(canceled + " tickets");
						$("#ticketsCanceledBar").css("width", ((canceled / total) * 100) + "%");
					} else {
						$("#ticketsIncompleteSpan").html("No tickets");
						$("#ticketsInProgressSpan").html("No tickets");
						$("#ticketsFinishedSpan").html("No tickets");
						$("#ticketsApprovedSpan").html("No tickets");
						$("#ticketsCanceledSpan").html("No tickets");
					}
				}
			});
		}
		
		function getEmployeeWorkorderSLA(employee_id){
			var postData = { employee_id: employee_id };
			$.ajax({
                type: "POST",
                url: "<?= BASE_URL ?>" + "employee/workordersla",
                data: postData,
				dataType: "json",
                success: function(response) {
					var workorders_by_date = response.workorders_by_date;
					var workorders_by_customer = response.workorders_by_customer;
					var workorder_resolution_times = response.workorder_resolution_times;
					var workorders = response.workorders;
					var chartData = [];
					for (var i = 0; i < workorders_by_date.length; i++) {
						chartData.push({
							"x": workorders_by_date[i].date,
							"y": workorders_by_date[i].workordercount
						})
					}
					if (chartData.length) {
						$("#workorder-line-chart").html("");
						workorderLineGraph = Morris.Line({
							element: "workorder-line-chart",
							data: chartData,
							xkey: "x",
							ykeys: "y",
							labels: ["Work orders"],
							lineColors: ["#348fe2"],
							pointFillColors: ["#348fe2"],
							lineWidth: "2px",
							pointStrokeColors: ["rgba(255,255,255,0.6)"],
							resize: true,
							gridTextFamily: "inherit",
							gridTextColor: "rgba(0,0,0,0.4)",
							gridTextWeight: "normal",
							gridTextSize: "12px",
							gridLineColor: "rgba(0,0,0,0.15)",
							hideHover: "auto"
						});
					}
					
					var lowPriority = 0;
					var normalPriority = 0;
					var highPriority = 0;
					
					var employeeSLA = response.employee_sla;
					
					var chartData3 = [];
					
					for (var i = 0; i < workorder_resolution_times.length; i++){
						var res = workorder_resolution_times[i];
						if (res.priority == "Normal"){
							normalPriority = res.resolution_time;
							chartData3.push({
								label: "Normal",
								value: res.workordercount
							});
						}else if (res.priority == "High"){
							highPriority = res.resolution_time;
							chartData3.push({
								label: "High",
								value: res.workordercount
							});
						}else{
							lowPriority = res.resolution_time;
							chartData3.push({
								label: "Low",
								value: res.workordercount
							});
						}
					}
					
					if (chartData3.length > 0) {
						$("#workorder-priority-donut-chart").html("");
						Morris.Donut({
							element: "workorder-priority-donut-chart",
							data: chartData3,
							colors: ["#00acac", "#348fe2", "#ff5b57"],
							resize: true,
							hideHover: "auto"
						});
					}
					
					var averageTAT = Math.round((parseInt(lowPriority) + parseInt(normalPriority) + parseInt(highPriority)) / workorder_resolution_times.length);
					
					$("#workordersLowPrioritySpan").html(Math.round(lowPriority) + " minutes");
					var lowRatio = (lowPriority / employeeSLA) * 100;
					$("#workordersLowPriorityBar").css("width", lowRatio + "%");
					if (lowRatio >= 100){
						$("#workordersLowPriorityBar").addClass("bg-danger");
					}else{
						$("#workordersLowPriorityBar").addClass("bg-success");
					}
					var normalRatio = (normalPriority / employeeSLA) * 100;
					$("#workordersNormalPrioritySpan").html(Math.round(normalPriority) + " minutes");
					$("#workordersNormalPriorityBar").css("width", normalRatio + "%");
					if (normalRatio >= 100){
						$("#workordersNormalPriorityBar").addClass("bg-danger");
					}else{
						$("#workordersNormalPriorityBar").addClass("bg-success");
					}
					var highRatio = (highPriority / employeeSLA) * 100;
					$("#workordersHighPrioritySpan").html(Math.round(highPriority) + " minutes");
					$("#workordersHighPriorityBar").css("width", highRatio + "%");
					if (highRatio >= 100){
						$("#workordersHighPriorityBar").addClass("bg-danger");
					}else{
						$("#workordersHighPriorityBar").addClass("bg-success");
					}
					
					$("#workordersAverageTAT").html(averageTAT);
					
					var chartData4 = [];
					for (var i = 0; i < workorders_by_customer.length; i++){
						chartData4.push({
							label: workorders_by_customer[i].customer_name,
							value: workorders_by_customer[i].workordercount
						})
					}
					
					if (chartData4.length > 0) {
						$("#workorder-customer-donut-chart").html("");
						Morris.Donut({
							element: "workorder-customer-donut-chart",
							data: chartData4,
							colors: ["#00acac", "#348fe2", "#ff5b57"],
							resize: true,
							hideHover: "auto"
						});
					}
					
					var complete = 0;
					var incomplete = 0;
					var progress = 0;
					for (var i = 0; i < workorders.length; i++) {
						var workorder = workorders[i];
						if (workorder.status == 0) {
							incomplete++;
						} else if (workorder.status == 1) {
							progress++;
						} else {
							complete++;
						}
					}
					var total = complete + progress + incomplete;
					$("#workordersTotalSpan").html(total);
					if (total > 0) {
						$("#workordersIncompleteSpan").html(incomplete + " work orders");
						$("#workordersIncompleteBar").css("width", ((incomplete / total) * 100) + "%");
						$("#workordersInProgressSpan").html(progress + " work orders");
						$("#workordersInProgressBar").css("width", ((progress / total) * 100) + "%");
						$("#workordersFinishedSpan").html(complete + " work orders");
						$("#workordersFinishedBar").css("width", ((complete / total) * 100) + "%");
					} else {
						$("#workordersIncompleteSpan").html("No work orders");
						$("#workordersInProgressSpan").html("No work orders");
						$("#workordersFinishedSpan").html("No work orders");
					}
				}
			});
		}
	    
	    function getEmployeeDocuments(){
	        var postData = { "employee_id": employee_id };
            $.ajax({
                type: "POST",
                url: "<?= BASE_URL ?>" + "employee/files",
                data: postData,
                dataType: "json",
                success: function(files) {
                    try{
                        $("#documentsTree").jstree(true).destroy();
                    }catch (err){
                    }
                    $("#documentsTree").on('open_node.jstree', function (event, data) {
                        if (data.node.type == "default"){
                            data.instance.set_type(data.node,'folder-open');
                        }
                    }).on('close_node.jstree', function (event, data) {
                        if (data.node.type == "folder-open"){
                            data.instance.set_type(data.node,'default');
                        }
                    }).on("select_node.jstree",
                         function(evt, data){
                              var nodeType = data.node.type;
                              if (nodeType == "default" || nodeType == "folder-open"){
                                  $("#treeDownloadBtn").addClass("hide");
                              }else{
                                  $("#treeDownloadBtn").removeClass("hide");
                              }
                     }).on('rename_node.jstree', function (e, data) {
                        var parentNode = $('#documentsTree').jstree(true).get_node(data.node.parent);
                        var newFileName = data.text;
                        var oldFileURL = data.node.original.dirurl;
                        if (oldFileURL == null){ //only happens when we're creating a new directory.
                            var parentDirectory = parentNode.original.dirurl;
                            createDirectory(parentDirectory + "/" + newFileName);
                        }else{
                            if (data.node.type != "default" && data.node.type != "folder-open"){
                                renameFile(oldFileURL, newFileName);
                            }else{
                                renameDirectory(oldFileURL, newFileName);
                            }
                        }
                    }).on("delete_node.jstree", function (e, data) {
                        var fileURL = data.node.original.dirurl;
                        deleteFile(fileURL);
                    }).on("move_node.jstree", function(e, data) {
                        var parentNode = $('#documentsTree').jstree(true).get_node(data.node.parent);
                        var parentDirectory = parentNode.original.dirurl;
                        var oldDirectory = data.node.original.dirurl;
                        if (data.old_parent != data.parent){
                            data.node.original.dirurl = "Uploads/" + $("#documentsTree").jstree(true).get_path(data.node,"/"); //replace with new file path.
                            moveFile(oldDirectory, parentDirectory);
                        }
                    }).jstree({
                        "core": {
                            "themes": {
                                "responsive": true,
                                "variant" : "large"
                            },
                            "check_callback" : function(operation, node, node_parent, node_position, more) {
                                if (operation == 'move_node') {
                                    if (node_parent.type == 'default' || node_parent.type == 'folder-open') {
                                        return true
                                    } else
                                        return false;
                                }
                            },
                            'data': files
                        },
                        "dnd" : {
                            "is_draggable" : function(node) {
                                var type = node[0].type;
                                if (type != 'default' && type != "folder-open") {
                                    return true;
                                }
                                return false;
                            }
                        },
                        "types": {
                            "default": {
                                "icon": "fa fa-folder text-warning fa-2x"
                            },
                            "folder-open": {
                                "icon": "fa fa-folder-open text-warning fa-2x"  
                            },
                            "file": {
                                "icon": "fas fa-file text-gray fa-2x"
                            },
                            "excel": {
                                "icon": "fas fa-file-excel text-success fa-2x"
                            },
                            "code": {
                                "icon": "fas fa-file-code text-gray fa-2x"
                            },
                            "pdf": {
                                "icon": "fas fa-file-pdf text-danger fa-2x"
                            },
                            "image": {
                                "icon": "fas fa-file-image text-purple fa-2x"
                            },
                            "text": {
                                "icon": "fas fa-file-text text-gray fa-2x"
                            },
                            "word": {
                                "icon": "fas fa-file-word text-primary fa-2x"
                            },
                            "powerpoint": {
                                "icon": "fas fa fa-file-powerpoint text-warning fa-2x"  
                            },
                            "video": {
                                "icon": "fas fa-file-video text-gray fa-2x"
                            },
                            "audio": {
                                "icon": "fas fa-file-audio text-gray fa-2x"
                            },
                            "archive": {
                                "icon": "fas fa-file-archive text-gray fa-2x"
                            }
                        },
                        "contextmenu":{         
                            "items": function(node) {
                                var nodeType = node.type;
                                if (nodeType != "default" && nodeType != "folder-open"){
                                    var tree = $("#documentsTree").jstree(true);
                                        return {
                                            "Download/View file": {
                                                "separator_before": false,
                                                "separator_after": false,
                                                "label": "Download/View file",
                                                "icon": "fa fa-download text-primary",
                                                "action": function (obj) { 
                                                    window.open("<?= DIR_URL ?>" + node.original.dirurl);
                                                }
                                            }
                                        };
                                }
                            }
                        },
                        "plugins": ["contextmenu", "types", "search", "dnd", "state"]
                    });
                }
            });
	    }
	    
	    function treeDownloadClicked(){
            var selectedNode = $("#documentsTree").jstree("get_selected",true);
            
            window.open("<?= DIR_URL ?>" + selectedNode[0].original.dirurl);
        }
        
        function renameFile(oldFileName, newFileName){
            var postData = { "file_location": oldFileName, "new_name": newFileName };
                $.ajax({
                    type: "POST",
                    url: "workgroup/renameFile",
                    data: postData,
                    success: function(response) {
                        if (response != ""){
                            swal(
                                    'Error',
                                    'The server encountered the following error: ' + response,
                                    'error'
                                );
                        }
                    }
                });
        }
        
        function renameDirectory(oldFileName, newFileName){
            var postData = { "file_location": oldFileName, "new_name": newFileName };
                $.ajax({
                    type: "POST",
                    url: "workgroup/renameFile",
                    data: postData,
                    success: function(response) {
                        if (response != ""){
                            swal(
                                'Error',
                                'The server encountered the following error: ' + response,
                                'error'
                            );
                            
                        }
                        getEmployeeDocuments();
                    }
                });
        }
        
        function moveFile(oldDirectory, newDirectory){
            var postData = { "old_location": oldDirectory, "new_location": newDirectory };
            $.ajax({
                type: "POST",
                url: "workgroup/moveFile",
                data: postData,
                success: function(response) {
                    if (response != ""){
                        swal(
                            'Error',
                            'The server encountered the following error: ' + response,
                            'error'
                        );
                    }
                }
            });
        }
        
        function createDirectory(directoryURL){
            var postData = { "dirname": directoryURL};
            console.log(postData);
                $.ajax({
                    type: "POST",
                    url: "workgroup/createDir",
                    data: postData,
                    success: function(response) {
                        if (response != ""){
                            swal(
                                'Error',
                                'The server encountered the following error: ' + response,
                                'error'
                            );
                            
                        }
                        getEmployeeDocuments();
                    }
                });
        }
        
        function getEvents(){
            var postData = { employee_id: employee_id };
            $.ajax({
                type: "POST",
                url: "<?= BASE_URL ?>" + "event/getEmployee",
                data: postData,
                dataType: "json",
                success: function(newEvents) {
                    events = newEvents;
                    var timelineContent = "";
                    for (var i = 0; i < events.length; i++){
                        var event = events[i];
                        var status;
						var statusTxt;
                    	if (event.status == 0){
                    		status = "timeline-warning";
							statusTxt = "Incomplete";
                    	}else if (event.status == 1){
                    		status = "timeline-primary";
							statusTxt = "In progress";
                    	}else if (event.status == 2){
                    		status = "timeline-success";
							statusTxt = "Finished";
                    	}else{
                    		status = "timeline-danger";
							statusTxt = "Canceled";
                    	}
						var participants = event.participants.split(",");
						var participantString = "";
						for (var i = 0; i < participants.length; i++){
							for (var j = 0; i < employeeArray.length; j++){
								var employee = employeeArray[j];
								if (employee.employee_id = participants[i]){
									participantString += "<li><a target='_blank' href='employeepage?employee_id=" + employee.employee_id + "' >" + employee.employee_name + " " + employee.employee_surname + "</a></li>";
									break;
								}
							}
						}
						var customerBtn = "";
						if (event.customer_id != null){
							customerBtn = '<button onClick="viewEventCustomer(' + event.customer_id + ')" class="btn btn-link m-r-15"><i class="fas fa-home fa-fw fa-lg m-r-3"></i> View customer</button>';
						}
						var mapBtn = "";
						if (event.event_address != ""){
							mapBtn = '<button onClick="viewEventOnMap(' + event.event_id + ')" class="btn btn-link m-r-15"><i class="fa fa-map-marker-alt fa-fw fa-lg m-r-3"></i> View on map</button>';
						}
                        timelineContent += '<li>' +
                        			        '<div class="timeline-time">' +
                        			            '<span class="date">' + moment(event.event_startdate).format("dddd, Do MMMM YYYY") + '</span>' +
                        			            '<span class="time">' + event.event_starttime + '</span>' +
                        			        '</div> ' +
                        			        '<div class="timeline-icon ' + status + '">' +
                        			            '<a data-toggle="tooltip" title="' + statusTxt + '" href="javascript:;">&nbsp;</a>' +
                        			        '</div>' +
                        			        '<div class="timeline-body">' +
                        			            '<div class="timeline-header">' +
                        			                '<span class="username">' + event.event_subject + '</span>' +
                        			            '</div>' +
                        			            '<div class="timeline-content">' +
													'<h5 class="template-title">' +
														'<label class="label label-primary">' + event.event_type + '</label>' +
													'</h5>' +
                            			            '<h5 class="template-title">' + 
                            			                event.event_description + 
                        			                '</h5>' +
                        			                '<h6 class="m-t-15">Participants</h6><ul>' + participantString + '</ul>' +
                                                '</div>' +
                        			            '<div class="timeline-footer">' +
                        			                mapBtn + customerBtn +
                        			            '</div>' +
                        			        '</div>' +
                        			    '</li>';
                    }
                    $("#eventTimeline").html(timelineContent);
                }
		    });
        }
        
        function filterEvents(){
		    var input, filter, ul, li, a, i;
            input = document.getElementById("searchEventInput");
            filter = input.value.toUpperCase();
            ul = document.getElementById("eventTimeline");
            li = ul.getElementsByTagName("li");
            for (i = 0; i < li.length; i++) {
                if (li[i].innerHTML.toUpperCase().indexOf(filter) > -1) {
                    li[i].style.display = "";
                } else {
                    li[i].style.display = "none";
        
                }
            }
		}
		
		function filterCalls(){
	        var input, filter, ul, li, a, i;
            input = document.getElementById("searchCallsInput");
            filter = input.value.toUpperCase();
            ul = document.getElementById("callTimeline");
            li = ul.getElementsByTagName("li");
            for (i = 0; i < li.length; i++) {
                if (li[i].innerHTML.toUpperCase().indexOf(filter) > -1) {
                    li[i].style.display = "";
                } else {
                    li[i].style.display = "none";
        
                }
            }
	    }
		
		function filterTickets(){
	        var input, filter, ul, li, a, i;
            input = document.getElementById("searchTicketsInput");
            filter = input.value.toUpperCase();
            ul = document.getElementById("ticketsTimeline");
            li = ul.getElementsByTagName("li");
            for (i = 0; i < li.length; i++) {
                if (li[i].innerHTML.toUpperCase().indexOf(filter) > -1) {
                    li[i].style.display = "";
                } else {
                    li[i].style.display = "none";
        
                }
            }
	    }
		
		function filterWorkorders(){
	        var input, filter, ul, li, a, i;
            input = document.getElementById("searchWorkordersInput");
            filter = input.value.toUpperCase();
            ul = document.getElementById("workordersTimeline");
            li = ul.getElementsByTagName("li");
            for (i = 0; i < li.length; i++) {
                if (li[i].innerHTML.toUpperCase().indexOf(filter) > -1) {
                    li[i].style.display = "";
                } else {
                    li[i].style.display = "none";
        
                }
            }
	    }

		function filterEventsByDate(selected){
    		    var today = moment();
                var dayDiff;
                if (selected == 1){
                    dayDiff = 7;
                }else if (selected == 2){
                    dayDiff = 31;
                }else if (selected == 3){
                    dayDiff = 365;
                }
                var timelineContent = "";
                if (selected != 0){
                    for (var i = 0; i < events.length; i++){
                        var event = events[i];
						var eventDate = moment(event.event_startdate)
                        if (dayDiff != null && today.diff(eventDate, 'days') <= dayDiff) {
							var status;
							var statusTxt;
							if (event.status == 0){
								status = "timeline-warning";
								statusTxt = "Incomplete";
							}else if (event.status == 1){
								status = "timeline-primary";
								statusTxt = "In progress";
							}else if (event.status == 2){
								status = "timeline-success";
								statusTxt = "Finished";
							}else{
								status = "timeline-danger";
								statusTxt = "Canceled";
							}
							var participants = event.participants.split(",");
							var participantString = "";
							for (var n = 0; n < participants.length; n++){
								for (var j = 0; j < employeeArray.length; j++){
									var employee = employeeArray[j];
									if (employee.employee_id = participants[n]){
										participantString += "<li><a target='_blank' href='employeepage?employee_id=" + employee.employee_id + "' >" + employee.employee_name + " " + employee.employee_surname + "</a></li>";
										break;
									}
								}
							}
							var customerBtn = "";
							if (event.customer_id != null){
								customerBtn = '<button onClick="viewEventCustomer(' + event.customer_id + ')" class="btn btn-link m-r-15"><i class="fas fa-home fa-fw fa-lg m-r-3"></i> View customer</button>';
							}
							var mapBtn = "";
							if (event.event_address != ""){
								mapBtn = '<button onClick="viewEventOnMap(' + event.event_id + ')" class="btn btn-link m-r-15"><i class="fa fa-map-marker-alt fa-fw fa-lg m-r-3"></i> View on map</button>';
							}
							timelineContent += '<li>' +
												'<div class="timeline-time">' +
													'<span class="date">' + moment(event.event_startdate).format("dddd, Do MMMM YYYY") + '</span>' +
													'<span class="time">' + event.event_starttime + '</span>' +
												'</div> ' +
												'<div class="timeline-icon ' + status + '">' +
													'<a data-toggle="tooltip" title="' + statusTxt + '" href="javascript:;">&nbsp;</a>' +
												'</div>' +
												'<div class="timeline-body">' +
													'<div class="timeline-header">' +
														'<span class="username">' + event.event_subject + '</span>' +
													'</div>' +
													'<div class="timeline-content">' +
														'<h5 class="template-title">' +
															'<label class="label label-primary">' + event.event_type + '</label>' +
														'</h5>' +
														'<h5 class="template-title">' + 
															event.event_description + 
														'</h5>' +
														'<h6 class="m-t-15">Participants</h6><ul>' + participantString + '</ul>' +
													'</div>' +
													'<div class="timeline-footer">' +
														mapBtn + customerBtn +
													'</div>' +
												'</div>' +
											'</li>';
						}
					}
                }else{
                    for (var i = 0; i < events.length; i++){
                        var event = events[i];
                        var status;
						var statusTxt;
                    	if (event.status == 0){
                    		status = "timeline-warning";
							statusTxt = "Incomplete";
                    	}else if (event.status == 1){
                    		status = "timeline-primary";
							statusTxt = "In progress";
                    	}else if (event.status == 2){
                    		status = "timeline-success";
							statusTxt = "Finished";
                    	}else{
                    		status = "timeline-danger";
							statusTxt = "Canceled";
                    	}
						var participants = event.participants.split(",");
						var participantString = "";
						for (var n = 0; n < participants.length; n++){
							for (var j = 0; j < employeeArray.length; j++){
								var employee = employeeArray[j];
								if (employee.employee_id = participants[n]){
									participantString += "<li><a target='_blank' href='employeepage?employee_id=" + employee.employee_id + "' >" + employee.employee_name + " " + employee.employee_surname + "</a></li>";
									break;
								}
							}
						}
						var customerBtn = "";
						if (event.customer_id != null){
							customerBtn = '<button onClick="viewEventCustomer(' + event.customer_id + ')" class="btn btn-link m-r-15"><i class="fas fa-home fa-fw fa-lg m-r-3"></i> View customer</button>';
						}
						var mapBtn = "";
						if (event.event_address != ""){
							mapBtn = '<button onClick="viewEventOnMap(' + event.event_id + ')" class="btn btn-link m-r-15"><i class="fa fa-map-marker-alt fa-fw fa-lg m-r-3"></i> View on map</button>';
						}
                        timelineContent += '<li>' +
                        			        '<div class="timeline-time">' +
                        			            '<span class="date">' + moment(event.event_startdate).format("dddd, Do MMMM YYYY") + '</span>' +
                        			            '<span class="time">' + event.event_starttime + '</span>' +
                        			        '</div> ' +
                        			        '<div class="timeline-icon ' + status + '">' +
                        			            '<a data-toggle="tooltip" title="' + statusTxt + '" href="javascript:;">&nbsp;</a>' +
                        			        '</div>' +
                        			        '<div class="timeline-body">' +
                        			            '<div class="timeline-header">' +
                        			                '<span class="username">' + event.event_subject + '</span>' +
                        			            '</div>' +
                        			            '<div class="timeline-content">' +
													'<h5 class="template-title">' +
														'<label class="label label-primary">' + event.event_type + '</label>' +
													'</h5>' +
                            			            '<h5 class="template-title">' + 
                            			                event.event_description + 
                        			                '</h5>' +
                        			                '<h6 class="m-t-15">Participants</h6><ul>' + participantString + '</ul>' +
                                                '</div>' +
                        			            '<div class="timeline-footer">' +
                        			                mapBtn + customerBtn +
                        			            '</div>' +
                        			        '</div>' +
                        			    '</li>';
                    }
                }
                $("#eventTimeline").html(timelineContent);
		}
		
		
	    function initMap(){
		    var myOptions = {
                zoom: parseInt(14),
                center: new google.maps.LatLng(46.056946, 14.505751),
                mapTypeId: google.maps.MapTypeId.ROADMAP
            };
            map = new google.maps.Map(document.getElementById('map'), myOptions);
            google.maps.event.trigger(map, 'resize');			
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
	    
	    function viewEventOnMap(event_id){
	        var event;
	        for (var i = 0; i < events.length; i++){
	            if (events[i].event_id == event_id){
	                event = events[i];
	                break;
	            }
	        }
	        if (mapMarker != null){
	            mapMarker.setMap(null);
	        }
            mapMarker = new google.maps.Marker({
                position: new google.maps.LatLng(event.latitude, event.longitude),
                map: map,
                title: 'Event location'
            });
            
            var infoWindowContent = "<p class='f-s-12'><strong>" + event.event_address + "</strong><br><br><strong>Customer - </strong>" + event.customer_name + "</p>";
            addInfoWindow(map, mapMarker, infoWindowContent, true);
            $("#mapPopup, #mapDIV").show();
            google.maps.event.trigger(map, 'resize');
            map.setZoom(map.getZoom());
            map.setCenter({lat: parseFloat(event.latitude), lng: parseFloat(event.longitude)});
	    }
	    
	    
	    function viewEventCustomer(customer_id){
		    var url = "<?= BASE_URL ?>" + "customerdetails?customer_id=" + customer_id;
		    window.open(url, "_blank");
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
	    
	    function showUploadPopup(){
	        $("#uploadPopup, #uploadFileDIV").show();
	    }
	    
	    function hideUploadPopup(){
	        $("#uploadPopup, #uploadFileDIV").hide();
	    }
	    
	    function showUploadFilePopup(directory){
		    $("#uploadDirectoryInput").val(directory);
		    $("#uploadPopup, #uploadFileDIV").show();
		}
		
		function hideUploadFilePopup(){
		    $("#uploadFileForm")[0].reset();
		    $("#uploadPopup, #uploadFileDIV").hide();
		}
	    
        function goToWorkgroup(workgroup_id){
            var url = "<?= BASE_URL ?>" + "workgroupdetails?workgroup_id=" + workgroup_id;
            window.open(url, "_blank");
        }

	</script>
	<script async defer src="https://maps.googleapis.com/maps/api/js?v=3&key=AIzaSyDC7Pj2_CZRL3p1eJy1HdL0EFtO70D7JvI&callback=initMap&language=en&libraries=places"></script>
	<script async defer src="https://apis.google.com/js/api.js" onload="this.onload=function(){};handleClientLoad()" onreadystatechange="if (this.readyState === 'complete') this.onload()"></script>
</body>
</html>
