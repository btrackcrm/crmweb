<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
<!--<![endif]-->
<head>
	<meta charset="utf-8" />
	<title>My profile</title>
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
	<link href="<?= ASSETS_URL . "password-indicator/css/password-indicator.css" ?>" rel="stylesheet" />

	<!-- ================== END PAGE LEVEL STYLE ================== -->
	
	<!-- ================== BEGIN BASE JS ================== -->
	<script src="<?= ASSETS_URL . "pace/pace.min.js" ?>" ></script>
	<!-- ================== END BASE JS ================== -->
</head>
<style>
   
	.border-top-strong{
		border-top: 1px solid #bbb;
	}
    
    #map{
        width: 100%;
        height: 500px;
    }
    
    #uploadFileDIV, #uploadPictureDIV, #changePasswordDIV, #editUserDIV, #mapDIV{
        width: 700px;
        height: auto;
        position: relative;
        margin: 7% auto 0px auto;
    }
    
    #addEventDIV, #addCustomerDIV{
        width: 840px;
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
        background-color: #f2f3f4;
    }
    
    .input-sm{
        height: 28px;
        line-height: 12px;
    }
	
	.hover-underline:hover{
        cursor: pointer;
        text-decoration: underline;
    }
	
	.gray-box-input{
		background-color: #f2f3f4;
		border: none;
		padding: 6px 12px;
		color: #222;
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
						<ul class="nav nav-profile expand" style="display: block;">
                            <li class="active"><a href="<?= BASE_URL . "profilepage" ?>"><i class="fas fa-pen-square"></i><span> My profile</span></a></li>
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
							<h4 class="m-t-10 m-b-5"><?php echo $_SESSION["namesurname"] ?></h4>
							<p class="m-b-10"><?php echo $_SESSION["position"] ?></p>
							 <?php
                                if ($_SESSION["2fa_status"] == 0){
                                    echo '<button id="enableBtn" class="btn btn-xs btn-success" onClick="enable2FA()">Enable 2FA</button>';
                                }else{
                                    echo '<button id="disableBtn "class="btn btn-xs btn-danger" onClick="disable2FA()">Disable 2FA</button>';
                                }
                            ?>
							<button class="btn btn-xs btn-white" onClick="showUploadPopup()">Change profile image</button>
							<button class="btn btn-xs btn-white" onClick="showEditUserPopup()">Edit data</button>
							<button class="btn btn-xs btn-white" onClick="showChangePasswordPopup()">Change password</button>
						</div>
						<!-- END profile-header-info -->
					</div>
					<!-- END profile-header-content -->
					<!-- BEGIN profile-header-tab -->
					<ul class="profile-header-tab nav nav-tabs">
						<li class="nav-item active"><a href="#profile-about" class="nav-link" data-toggle="tab">ABOUT ME</a></li>
						<li class="nav-item"><a href="#profile-workgroups" class="nav-link" data-toggle="tab">MY WORKGROUPS</a></li>
						<li class="nav-item"><a href="#profile-events" class="nav-link" data-toggle="tab">MY EVENTS</a></li>
						<li class="nav-item"><a href="#profile-documents" class="nav-link" data-toggle="tab">MY DOCUMENTS</a></li>
						<li class="nav-item"><a href="#profile-calls" class="nav-link" data-toggle="tab">MY CALLS</a></li>
						<li class="nav-item"><a href="#profile-tracking" class="nav-link" data-toggle="tab">MY TRAVEL ORDERS</a></li>
						<li class="nav-item"><a href="#profile-ticketing" class="nav-link" data-toggle="tab">MY TICKETS</a></li>
						<li class="nav-item"><a href="#profile-workorders" class="nav-link" data-toggle="tab">MY WORK ORDERS</a></li>
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
									<b class="text-inverse">ABOUT ME</b>
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
									<div class="widget-list-item border-top-strong">
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
									<div class="widget-list-item border-top-strong">
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
											<i class="fas fa-home bg-success text-white"></i>
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
											<i class="fas fa-clock bg-success text-white"></i>
										</div>
										<div class="widget-list-content">
											<h4 class="widget-list-title">Work time</h4>
										</div>
										<div class="widget-list-action text-nowrap text-right">
											<?php echo $employee["employee_workfrom"] . " - " . $employee["employee_workto"]; ?>
										</div>
									</div>
									<div class="widget-list-item border-top-strong">
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
									<b class="text-inverse">GENERAL SETTINGS</b>
								</div>
								<div class="widget-list widget-list-rounded m-b-30" data-id="widget">
									<form id="personalSettingsForm" action="settings/personal" method="post" class="form-horizontal">
										<a href="#" class="widget-list-item">
											<div class="widget-list-media icon">
												<i class="fas fa-language bg-yellow"></i>
											</div>
											<div class="widget-list-content">
												<h4 class="widget-list-title">Language</h4>
											</div>
											<div class="widget-list-action text-nowrap text-right text-grey-darker">
												<select id="languageInput" class="gray-box-input width-xs" name="language">
														<option value="en">English</option>
														<option value="si">Slovenian</option>
														<option value="de">German</option>
												</select>
											</div>
										</a>
										<a href="#" class="widget-list-item">
											<div class="widget-list-media icon">
												<i class="fas fa-calendar-alt bg-yellow"></i>
											</div>
											<div class="widget-list-content">
												<h4 class="widget-list-title">Date format</h4>
											</div>
											<div class="widget-list-action text-nowrap text-right text-grey-darker">
												<select id="dateformatInput" class="gray-box-input width-xs" name="date_format">
													<option value="DD.MM.YYYY">dd.mm.yyyy (12.1.2018)</option>
													<option value="MM/DD/YYYY">mm/dd/yyyy (1/12/2018)</option>
													<option value="DD-MM-YYYY">dd-mm-yyyy (12-1-2018)</option>
												</select>
											</div>
										</a>
										<a href="#" class="widget-list-item">
											<div class="widget-list-media icon">
												<i class="fas fa-clock bg-yellow"></i>
											</div>
											<div class="widget-list-content">
												<h4 class="widget-list-title">Time format</h4>
											</div>
											<div class="widget-list-action text-nowrap text-right text-grey-darker">
												<select id="timeformatInput" class="gray-box-input width-xs" name="time_format">
													<option value="HH:mm">24 hour</option>
													<option value="hh:mm A">12 hour</option>
												</select>
											</div>
										</a>
									</form>
								</div>
								<div class="m-b-10 f-s-10 m-t-10">
									<b class="text-inverse">NOTIFICATION SETTINGS</b>
								</div>
								<div class="widget-list widget-list-rounded m-b-30" data-id="widget">
									<form id="notificationSettingsForm" action="settings/notifications" method="post" class="form-horizontal">
										<a href="#" class="widget-list-item">
											<div class="widget-list-media icon">
												<i class="fas fa-envelope bg-pink text-white"></i>
											</div>
											<div class="widget-list-content">
												<h4 class="widget-list-title">E-mail notifications</h4>
												<p class="widget-list-desc">Get all enabled notifications via e-mail</p>
											</div>
											<div class="widget-list-action text-nowrap text-right text-grey-darker">
												<label class="switch m-b-0">
												  <input type="hidden" name="employee_mailing" value="0" />
												  <input type="checkbox" name="employee_mailing" value="1" <?php 
													if ($employee["employee_mailing"] == 1){
														echo "checked";
													}
												  ?>/>
												  <span class="checkbox-slider round"></span>
												</label>
											</div>
										</a>
										<a href="#" class="widget-list-item">
											<div class="widget-list-media icon">
												<i class="fas fa-mobile-alt bg-pink text-white"></i>
											</div>
											<div class="widget-list-content">
												<h4 class="widget-list-title">SMS notifications</h4>
												<p class="widget-list-desc">Get all enabled notifications via SMS</p>
											</div>
											<div class="widget-list-action text-nowrap text-right text-grey-darker">
												<label class="switch m-b-0">
												  <input type="hidden" name="employee_sms" value="0" />
												  <input type="checkbox" name="employee_sms" value="1" <?php 
													if ($employee["employee_sms"] == 1){
														echo "checked";
													}
												  ?> />
												  <span class="checkbox-slider round"></span>
												</label>
											</div>
										</a>
										<a href="#" class="widget-list-item">
											<div class="widget-list-media icon">
												<i class="fab fa-elementor bg-success text-white"></i>
											</div>
											<div class="widget-list-content">
												<h4 class="widget-list-title">Event notifications</h4>
												<p class="widget-list-desc">Get notifications about newly created and edited events</p>
											</div>
											<div class="widget-list-action text-nowrap text-right text-grey-darker">
												<label class="switch m-b-0">
												  <input type="hidden" name="event_notifications" value="0" />
												  <input type="checkbox" name="event_notifications" value="1" <?php 
													if ($employee["event_notifications"] == 1){
														echo "checked";
													}
												  ?> />
												  <span class="checkbox-slider round"></span>
												</label>
											</div>
										</a>
										<a href="#" class="widget-list-item">
											<div class="widget-list-media icon">
												<i class="fab fa-cloudsmith bg-red text-white"></i>
											</div>
											<div class="widget-list-content">
												<h4 class="widget-list-title">Work order notifications</h4>
												<p class="widget-list-desc">Get notifications about newly created and edited work orders</p>
											</div>
											<div class="widget-list-action text-nowrap text-right text-grey-darker">
												<label class="switch m-b-0">
												  <input type="hidden" name="workorder_notifications" value="0" />
												  <input type="checkbox" name="workorder_notifications" value="1" <?php 
													if ($employee["workorder_notifications"] == 1){
														echo "checked";
													}
												  ?>  />
												  <span class="checkbox-slider round"></span>
												</label>
											</div>
										</a>
										<a href="#" class="widget-list-item">
											<div class="widget-list-media icon">
												<i class="fas fa-tags bg-indigo text-white"></i>
											</div>
											<div class="widget-list-content">
												<h4 class="widget-list-title">Ticketing notifications</h4>
												<p class="widget-list-desc">Get notifications about newly created and edited tickets</p>
											</div>
											<div class="widget-list-action text-nowrap text-right text-grey-darker">
												<label class="switch m-b-0">
												 <input type="hidden" name="ticketing_notifications" value="0" />
												  <input type="checkbox" name="ticketing_notifications" value="1" <?php 
													if ($employee["ticketing_notifications"] == 1){
														echo "checked";
													}
												  ?>  />
												  <span class="checkbox-slider round"></span>
												</label>
											</div>
										</a>
										<a href="#" class="widget-list-item">
											<div class="widget-list-media icon">
												<i class="fas fa-object-group bg-blue text-white"></i>
											</div>
											<div class="widget-list-content">
												<h4 class="widget-list-title">Workgroup notifications</h4>
												<p class="widget-list-desc">Get notifications about various activities in your workgroups</p>
											</div>
											<div class="widget-list-action text-nowrap text-right text-grey-darker">
												<label class="switch m-b-0">
												  <input type="hidden" name="workgroup_notifications" value="0" />
												  <input type="checkbox" name="workgroup_notifications" value="1" <?php 
													if ($employee["workgroup_notifications"] == 1){
														echo "checked";
													}
												  ?>  />
												  <span class="checkbox-slider round"></span>
												</label>
											</div>
										</a>
									</form>
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
                                            View from <span class="caret"></span>
                                        </button>
                                        <ul id="eventViewDropdown" class="dropdown-menu text-left text-sm">
                                            <li class="active"><a href="javascript:;"><i class="fa fa-circle f-s-10 fa-fw m-r-5"></i> All</a></li>
                                            <li><a href="javascript:;"><i class="fa fa-circle f-s-10 fa-fw m-r-5"></i> Last week</a></li>
                                            <li><a href="javascript:;"><i class="fa fa-circle f-s-10 fa-fw m-r-5"></i> Last month</a></li>
                                            <li><a href="javascript:;"><i class="fa fa-circle f-s-10 fa-fw m-r-5"></i> Last year</a></li>
                                        </ul>
                                    </div>
                                    <button class="btn btn-sm btn-white pull-right" onClick="showNewEventPopup()">Add an event</button>
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
										$customerBtn = '<a target="_blank" href="customerdetails?customer_id=' . $event["customer_id"] . '" class="btn btn-link m-r-15"><i class="fas fa-home fa-fw fa-lg m-r-3"></i> View customer</a>';
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
                    			            <div class="timeline-footer">
                    			                <a target="_blank" href="eventdetails?event_id=' . $event["event_id"] . '" class="btn btn-link m-r-15"><i class="fas fa-eye fa-fw fa-lg m-r-3"></i> View event</a>'
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
                            <h4 class="m-l-15">My files<button id="treeUploadBtn" class="btn material success hide pull-right" onclick="treeUploadClicked()">Upload a file</button><button id="treeDeleteBtn" class="btn material danger hide pull-right" onclick="treeDeleteClicked()">Delete file</button><button id="treeDownloadBtn" class="btn material primary hide pull-right m-r-15" onclick="treeDownloadClicked()">Download file</button><br><small>Tree view</small></h4>
                            <div id="documentsTree" class="p-b-10">
                        
                            </div>
                        </div>
            		</div>
					<div class="tab-pane fade" id="profile-calls">
						<div class="wrapper bg-primary">
                                <!-- begin btn-toolbar -->
                                <div class="btn-toolbar">
                                    <!-- begin btn-group -->
									<input id="searchCallsInput" type="text" class="form-control width-sm input-sm pull-left" placeholder="Search calls" onkeyup="filterCalls()"/>
                                    <div class="btn-group pull-right">
                                        <button class="btn btn-sm btn-white" data-toggle="tooltip" data-placement="bottom" data-title="Refresh" data-original-title="" title="" onclick="getCalls()"><i class="ion-refresh"></i></button>
                                    </div>
                                    <!-- end btn-group -->
                                </div>
                                <!-- end btn-toolbar -->
                        </div>
						<ul id="callTimeline" class="timeline bg-silver">
                			<?php
                			    foreach ($calls as $call){
									$customerBtn = "";
									if ($call["customer_id"] != null){
										$customerBtn = '<a href="customerdetails?customer_id=' . $call["customer_id"] . '" target="_blank" class="btn btn-link m-r-15"><i class="fas fa-home fa-fw fa-lg m-r-3"></i> View customer</a>';
									}
                    				echo '<li>
                    			        <div class="timeline-time">
                    			            <span class="date">' . date("l, jS F Y", strtotime($call["call_datetime"])) . '</span>
                    			            <span class="time">' . date("H:i", strtotime($call["call_datetime"])) . '</span>
                    			        </div>
                    			        <div class="timeline-icon timeline-primary">
                    			            <a data-toggle="tooltip" title="' . $call["call_subject"] . '" href="javascript:;">&nbsp;</a>
                    			        </div>
                    			        <div class="timeline-body">
                    			            <div class="timeline-header">
                    			                <span class="username">' . $call["call_subject"] . '</span>
                    			            </div>
                    			            <div class="timeline-content">
												<h5 class="template-title">' 
													. $call["call_phonenumber"] .  
												'</h5>
                    			                <h5 class="template-title">'
                    			                    . $call["call_notes"] . '
                    			                </h5>
                                            </div>
                    			            <div class="timeline-footer">'
                    			                .  $customerBtn . '
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
					<div class="tab-pane fade" id="profile-workorders">
						<div class="wrapper bg-primary">
                                <!-- begin btn-toolbar -->
                                <div class="btn-toolbar">
                                    <!-- begin btn-group -->
									<input id="searchWorkOrdersInput" type="text" class="form-control width-sm input-sm pull-left" placeholder="Search work orders" onkeyup="filterWorkOrders()"/>
                                    <div class="btn-group pull-right">
                                        <button class="btn btn-sm btn-white" data-toggle="tooltip" data-placement="bottom" data-title="Refresh" data-original-title="" title="" onclick="getWorkOrders()"><i class="ion-refresh"></i></button>
                                    </div>
                                    <!-- end btn-group -->
                                </div>
                                <!-- end btn-toolbar -->
                        </div>
						<ul id="workorderTimeline" class="timeline bg-silver">
						<?php
                			    foreach ($workorders as $workorder){
									$statusColor = "timeline-danger";
									$statusString = "Incomplete";
									if ($workorder["status"] == 1){
										$statusColor = "timeline-primary";
										$statusString = "In progress";
									}else if ($workorder["status"] == 2){
										$statusColor = "timeline-success";
										$statusString = "Finished";
									}
                    				echo '<li>
                    			        <div class="timeline-time">
                    			            <span class="date">Due ' . date("l, jS F Y", strtotime($workorder["workorder_enddate"])) . '</span>
											<span class="time">' . date("l, jS F Y", strtotime($workorder["workorder_startdate"])) . '</span>
                    			        </div>
                    			        <div class="timeline-icon ' . $statusColor . '">
                    			            <a data-toggle="tooltip" title="' . $statusString . '" href="javascript:;">&nbsp;</a>
                    			        </div>
                    			        <div class="timeline-body">
                    			            <div class="timeline-header">
                    			                <span class="username">' . $workorder["workorder_subject"] . '</span>
                    			            </div>
                    			            <div class="timeline-content">
												<h4 class="template-title"> '
													. $workorder["customer_name"] .  
												'</h4>
                    			                <h5 class="template-title">'
                    			                    . $workorder["workorder_notes"] . '
                    			                </h5>
                                            </div>
                    			            <div class="timeline-footer">
												<a href="workorderdetails?workorder_id=' . $workorder["workorder_id"] . '" target="_blank" class="btn btn-link m-r-15"><i class="fas fa-eye fa-fw fa-lg m-r-3"></i>View work order</a>
												<button onClick="viewWorkorderOnMap(' . $workorder["workorder_id"] . ')" class="btn btn-link m-r-15"><i class="fa fa-map-marker-alt fa-fw fa-lg m-r-3"></i> View on map</button>
                    			                <a href="customerdetails?customer_id=' . $workorder["customer_id"] . '" target="_blank" class="btn btn-link m-r-15"><i class="fas fa-home fa-fw fa-lg m-r-3"></i> View customer</a>
                    			            </div>
                    			        </div>
                    			    </li>';
                                }
                			?>
						</ul>
					</div>
            		<!-- end #profile-videos tab -->
				</div>
            	<!-- end tab-content -->
            </div>
			<!-- end profile-content -->
		</div>
		<!-- end #content -->
		
		
		<div class="popupContainer" id="changePasswordPopup" hidden>
		    <div class="panel panel-primary" id="changePasswordDIV" hidden>
                <div class="panel-heading">
                    <div class="panel-heading-btn">
                        <button onclick="hideChangePasswordPopup()" class="btn btn-xs btn-icon btn-circle btn-default"><i class="fa fa-times"></i></button>
                    </div>
                    <h4 class="panel-title">Change password</h4>
                </div>
                <div class="panel-body">
                    <form id="changePasswordForm" action="employee/picture" method="post" class="form-horizontal">
						<div class="form-group">
                            <div class="col-md-12">
                                <label>Current password:</label>
                                <input type="password" class="form-control passwordInput" name="current_password" placeholder="Enter your current password" required/>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-12">
                                <label>New password</label>
                                <input id="passwordInput" type="password" class="form-control passwordInput" name="password" pattern="^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?!.*\s).*$" title="Password must be at least 8 characters long and contain 1 uppercase, 1 lowercase and 1 numerical character" onChange="checkPasswordValidity()" placeholder="Enter your new password" required/>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-12">
                                <label>Repeat password</label>
                                <input id="confirmPasswordInput" type="password" class="form-control passwordInput" pattern="^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?!.*\s).*$" title="Password must be at least 8 characters long and contain 1 uppercase, 1 lowercase and 1 numerical character" name="repeat_password" onkeyup="checkPasswordValidity()" placeholder="Repeat above password" required/>
								<span id="confirmPasswordSpan" class="text-danger"></span>
                            </div>
                        </div>
                </div>
				<div class="panel-footer">
					<button class="btn btn-primary">Change password</button>
					<button type="button" class="btn btn-danger pull-right" onClick="hideChangePasswordPopup()">Close</button>
					</form>
				</div>
            </div>
		</div>
		<div class="popupContainer" id="userPopupDIV" hidden>
		    <div class="panel panel-primary" id="editUserDIV" hidden>
                <div class="panel-heading">
                    <div class="panel-heading-btn">
                        <button class="btn btn-xs btn-icon btn-circle btn-default" onClick="hideEditUserPopup()"><i class="fa fa-times"></i>
                        </button>
                    </div>
                    <h4 class="panel-title">My profile data</h4>
                </div>
                <div class="panel-body">
                    <form id="editUserForm" action="<?= BASE_URL . "profile/edit" ?>" method="post" class="form-horizontal">
                        <input type="hidden" id="editUserIDInput" name="employee_id" value="<?php echo $employee["employee_id"]; ?>" />
						<input type="hidden" id="hiddenEditUserLatitudeInput" name="latitude" value="<?php echo $employee["residence_latitude"]; ?>" />
						<input type="hidden" id="hiddenEditUserLongitudeInput" name="longitude" value="<?php echo $employee["residence_longitude"]; ?>" />
                        <div class="form-group">
                            <div class="col-xs-12 col-sm-6 col-md-4">
                                <label>Name: <span class="text-danger">*</span>
                                </label>
                                <input id="editUserNameInput" type="text" name="employee_name" class="form-control" placeholder="Name" value="<?php echo $employee["employee_name"]; ?>" required />
                            </div>
                            <div class="col-xs-12 col-sm-6 col-md-4">
                                <label>Surname: <span class="text-danger">*</span>
                                </label>
                                <input id="editUserSurnameInput" type="text" name="employee_surname" class="form-control" placeholder="Surname" value="<?php echo $employee["employee_surname"]; ?>" required />
                            </div>
                            <div class="col-xs-12 col-sm-6 col-md-4">
                                <label>E-mail: <span class="text-danger">*</span>
                                </label>
                                <input id="editUserEmailInput" type="email" name="employee_email" class="form-control" placeholder="E-mail" value="<?php echo $employee["employee_email"]; ?>" required />
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-xs-12 col-sm-6 col-md-4">
                                <label>Work phone: </label>
                                <input id="editUserWorkPhoneInput" type="text" name="employee_workphone" class="tel-input form-control" value="<?php echo $employee["employee_workphone"]; ?>" />
                            </div>
                            <div class="col-xs-12 col-sm-6 col-md-4">
                                <label>Cell number: <span class="text-danger">*</span>
                                </label>
                                <input id="editUserPhoneInput" type="text" name="employee_phone" class="tel-input form-control" value="<?php echo $employee["employee_phone"]; ?>" required />
                            </div>
                        </div>
						<div class="form-group">
                            <div class="col-md-12">
                                <label>Address / residence: <span class="text-danger">*</span></label>
                                <input id="editUserResidenceInput" type="text" name="employee_residence" class="form-control" placeholder="Enter employee address" value="<?php echo $employee["employee_residence"]; ?>" required />
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-4">
                                <label>Position: <span class="text-danger">*</span></label>
                                <input id="editUserPositionInput" type="text" class="form-control"  name="employee_position" value="<?php echo $employee["employee_position"]; ?>" />
                            </div>
                            <div class="col-md-4">
                                <label>Working time from: <span class="text-danger">*</span></label>
                                <input id="editWorkTimeFrom" type="text" class="form-control" name="employee_workfrom" value="<?php echo $employee["employee_workfrom"]; ?>" required />
                            </div>
                            <div class="col-md-4">
                                <label>Working time to:<span class="text-danger">*</span> </label>
                                <input id="editWorkTimeTo" type="text" class="form-control" name="employee_workto" value="<?php echo $employee["employee_workto"]; ?>" required />
                            </div>
                        </div>
                </div>
				<div class="panel-footer">
					<button class="btn btn-primary">Save changes</button>
					<button class="btn btn-danger pull-right" type="button" onClick="hideEditUserPopup()">Close</button>
                    </form>
				</div>
            </div>
		</div>
		<div class="popupContainer" id="uploadPopup" hidden>
            <div class="panel panel-primary" id="uploadPictureDIV" hidden>
                <div class="panel-heading">
                    <div class="panel-heading-btn">
                        <button onclick="hideUploadPopup()" class="btn btn-xs btn-icon btn-circle btn-default"><i class="fa fa-times"></i></button>
                    </div>
                    <h4 class="panel-title">Upload a profile picture</h4>
                </div>
                <div class="panel-body">
					<p class="f-s-13"><i class="text-primary fa fa-info-circle m-r-5"></i>Profile image must be in portrait orientation and must be one of the following types: JPG, GIF or PNG</p>
                    <form id="uploadPictureForm" action="employee/picture" method="post" class="form-horizontal dropzone">
                    </form>
                </div>
            </div>
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
                            <div id="map">
                                
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
											<div class="col-xs-12 col-sm-6 col-md-4">
												<label>Start date: <span class="text-danger">*</span></label>
												<div class="input-group event-date-picker">
													<input id="eventStartDateInput" type="text" name="event_startdate" class="form-control"  placeholder="Choose start date" required />
													<span class="input-group-addon btn bg-primary">
													   <span class="fa fa-calendar text-white"></span>
													</span>                    
												</div>
											</div>
											<div class="col-sm-6 col-md-2">
												<label>Start time: <span class="text-danger">*</span></label>
												<div class="input-group event-time-picker">
													<input id="eventStartTimeInput" type="text" name="event_starttime" class="form-control"  placeholder="Choose start time" required />
													<span class="input-group-addon btn bg-primary">
													   <span class="fa fa-clock text-white"></span>
													</span>                    
												</div>
											</div>
											<div class="col-xs-12 col-sm-6 col-md-4">
												<label>End date: <span class="text-danger">*</span></label>
												<div class="input-group event-date-picker">
													<input id="eventEndDateInput" type="text" name="event_enddate" class="form-control"  placeholder="Choose end date" required />
													<span class="input-group-addon btn bg-primary">
													   <span class="fa fa-calendar text-white"></span>
													</span>                    
												</div>
											</div>
											<div class="col-md-2">
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
										<label>Search for customers:</label>
										<div class="input-group">
										  <input id="vatInput" type="text" class="form-control" placeholder="Enter VAT or name">
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
									<div class="col-md-12">
										<label>Customer code:</label>
										<input type="text" class="form-control" name="customer_code" placeholder="Enter customer code" />
									</div>
								</div>
								<div class="form-group">
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
										<label>Company name: <span class="text-danger">*</span>
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
										<label>Phone number: <span class="text-danger">*</span>
										</label>
										<input type="tel" name="customer_phone[]" class="tel-input form-control m-b-5"  required />
										<div id="phoneNrsDIV">
											
										</div>
										<span class="span-add" onClick="addPhoneNr()">Add a phone number</span>
									</div>
									<div class="col-md-4">
										<label>E-Mail: <span class="text-danger">*</span>
										</label>
										<input type="email" name="customer_email[]" class="form-control" placeholder="E-mail" required />
										<div id="emailsDIV">
											
										</div>
										<span class="span-add" onClick="addEmail()">Add an email address</span>
									</div>
									<div class="col-md-4">
										<label>Website:</label>
										<input type="text" class="form-control" name="customer_website" placeholder="Website address" />
									</div>
								</div>
								<div class="form-group">
									<div class="col-xs-12 col-sm-6 col-md-8">
										<label>Address: <span class="text-danger">*</span>
										</label>
										<input id="customerAddressInput" type="text" name="customer_address" class="form-control" placeholder="Enter an address" required />
									</div>
									<div class="col-xs-12 col-sm-6 col-md-4">
										<label>Key account manager:</label>
										<select id="customerEmployeeSelect" name="employee_id" class="form-control">
											<option value="">Choose an employee</option>
										</select>
									</div>
								</div>
								<div class="form-group">
									<div class="col-md-12">
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
	<script src="<?= ASSETS_URL . "bootstrap-show-password/bootstrap-show-password.js" ?>"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/js/bootstrap-datetimepicker.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/css/bootstrap-datetimepicker.min.css" rel="stylesheet"/>
	<!-- ================== END BASE JS ================== -->
	
	<!-- ================== BEGIN PAGE LEVEL JS ================== -->
	<script src="<?= JS_URL . "apps.min.js" ?>"></script>
	<script src="<?= JS_URL . "timedisplay.js" ?>"></script>
	<script src="<?= JS_URL . "inactivity.js" ?>"></script>
	
    
	<!-- ================== END PAGE LEVEL JS ================== -->
	
	<script>
	    var loggedEmployee = <?php echo json_encode($_SESSION["id"]); ?>;
	    var events = <?php echo json_encode($events); ?>;
		var calls = <?php echo json_encode($calls); ?>;
		var workorders = <?php echo json_encode($travelorders); ?>;
		var workorders = <?php echo json_encode($workorders); ?>;
	    var isAdmin = <?php echo json_encode($_SESSION["admin"]); ?>;
		var employee = <?php echo json_encode($employee); ?>;
		var dateformat = <?php echo json_encode($_SESSION["dateformat"]); ?>;
		var timeformat = <?php echo json_encode($_SESSION["timeformat"]); ?>;
	    var eventFiles = [];
	    var taskFiles = [];
	    var editTaskFiles = [];
		var employeeArray = [];
		var subsidiariesArray = [];
		
	    
	    var currentEvent;
	    var googleSignedIn;
	    
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
			getSubsidiaries();
			
			$("#dateformatInput").val(employee.date_format);
			$("#timeformatInput").val(employee.time_format);
			
			$("#eventEmployeeSelect, #eventCustomerSelect, eventSubsidiarySelect").select2({width: "100%"});
			
			$(".tel-input").intlTelInput({ initialCountry: "auto",
			hiddenInput: "customer_phone",
			geoIpLookup: function(callback) {
                $.get('https://ipinfo.io', function() {}, "jsonp").always(function(resp) {
                  var countryCode = (resp && resp.country) ? resp.country : "";
                  callback(countryCode);
                });
            }});
			
			$(".passwordInput").password({
				eyeClass: 'fa',
				eyeOpenClass: 'fa-eye',
				eyeCloseClass: 'fa-eye-slash'
			});
            
			Dropzone.options.uploadPictureForm = {
			  dictDefaultMessage: "<i class='fa fa-cloud text-primary'></i>&nbsp;Drag and drop file here to upload",
              init: function () {
                this.on("complete", function (file) {
                  if (this.getUploadingFiles().length === 0 && this.getQueuedFiles().length === 0) {
                    
                  }
                }),
                this.on("success", function(file, response) {
                    console.log(response);
                    location.reload();
                });
              }
            };
            
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
            
            $('#taskFileUpload').fileupload({
               url: "task/upload",
               dataType : 'json',
               add : function(e,data){
                    $.each(data.files, function (index, file) {
                        $("#taskFiles").append('<li class="fa-file">' +
											'<div class="document-file">' +
												'<a href="' + "<?= UPLOADS_URL ?>" + "TaskFiles/" + file.name + '" download="' + file.name  + '" ><i class="fa fa-file-image"></i></a>' +
											'</div>' +
											'<div class="document-name"><a href="' + "<?= UPLOADS_URL ?>" + "TaskFiles/" + file.name  + '" download="' + file.name  + '" >' + file.name  + '</a></div>' +
										'</li>');
                    });
					$("#addTaskBtn").html('<i class="fa fa-spinner fa-spin"></i> Uploading file...');
                    $("#addTaskBtn").prop("disabled", true);
                    data.submit();
               },
               
               done: function(e,data){
                   if (!data.result.error){
                       taskFiles.push(data.result.filename);
                   }else{
                       swal(
							'Error!',
							'The server encountered the following error: ' + data.result.message,
							'error'
						);
                   }
				   $("#addTaskBtn").html("Add task");
                   $("#addTaskBtn").prop("disabled", false);
               }
            });
            
            $('#editTaskFileUpload').fileupload({
               url: "task/upload",
               dataType : 'json',
               add : function(e,data){
                    $.each(data.files, function (index, file) {
                        $("#taskFilesDIV").append('<li class="fa-file">' +
											'<div class="document-file">' +
												'<a href="' + "<?= UPLOADS_URL ?>" + "TaskFiles/" + file.name + '" download="' + file.name  + '" ><i class="fa fa-file-image"></i></a>' +
											'</div>' +
											'<div class="document-name"><a href="' + "<?= UPLOADS_URL ?>" + "TaskFiles/" + file.name  + '" download="' + file.name  + '" >' + file.name  + '</a></div>' +
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
            
            $(".event-date-picker").datetimepicker({format: dateformat, "defaultDate": new Date(), allowInputToggle: true });
			$(".event-time-picker").datetimepicker({format: timeformat, stepping:5, "defaultDate": new Date(), allowInputToggle: true });
			
            
			$("#notificationSettingsForm input[type=checkbox]").on("change", function(){
				$("#notificationSettingsForm").submit();
			});
			
            $("a[href='#customers-map']").on('shown.bs.tab', function(){
              google.maps.event.trigger(bigMap, 'resize');
            });
			
			$("#dateformatInput").on("change", function(){
				$("#personalSettingsForm").submit();
			});
			
			$("#timeformatInput").on("change", function(){
				$("#personalSettingsForm").submit();
			});
            
            $("#eventViewDropdown li").on("click", function(){
                var selected = $(this).index();
                $("#eventViewDropdown li").removeClass("active");
                $(this).addClass("active");
                filterEventsByDate(selected)
            });
			
			$("#eventStatusDropdown li").on("click", function(){
                var selected = $(this).index();
                $("#eventStatusDropdown li").removeClass("active");
                $(this).addClass("active");
                filterEventsByStatus(selected)
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
			
			$('#notificationSettingsForm').on('submit', function(e) { //use on if jQuery 1.7+
                e.preventDefault();
                $.ajax({
                    type: "POST",
                    url: "settings/notifications",
                    data: $("#notificationSettingsForm").serialize(),
                    success: function(msg) {
                        if (msg == "") {
                            console.log("Settings updated");
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
            
            $('#changePasswordForm').on('submit', function(e) { //use on if jQuery 1.7+
                e.preventDefault();
                checkPasswordValidity();
                $.ajax({
                    type: "POST",
                    url: "employee/password",
                    data: $("#changePasswordForm").serialize(),
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
            
            Dropzone.options.uploadFileForm = {
			  dictDefaultMessage: "<i class='fa fa-cloud text-primary'></i>&nbsp;Drag and drop files here to upload",
              init: function () {
                this.on("success", function(file, response) {
                    if (response == ""){
                        swal(
                            'File uploaded',
                            'File upload was successful.',
                            'success'
                        );
                    }else{
                        swal(
                            'Error!',
                            'The server encountered the following error while uploading the file: ' + response,
                            'error'
                        );
                    }
                });
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
			
			$('#personalSettingsForm').on('submit', function(e) { //use on if jQuery 1.7+
                e.preventDefault();

                $.ajax({
                    type: "POST",
                    url: "settings/personal",
                    data: $("#personalSettingsForm").serialize(),
                    success: function(response) {
                        if (response == "") {
                            console.log("Settings updated");
                        } else {
                            swal(
                                'Error!',
                                'The server encountered the following error: ' + response,
                                'error'
                            );
                        }
                    }
                });
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
								$.ajax({
									type: "POST",
									url: "event/add",
									data: postData,
									success: function(msg) {
										eventFiles = [];
										if (msg == "") {
											swal(
												'Success!',
												'Event was successfully added.',
												'success'
											);
											
											getEvents();
											
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
							$.ajax({
								type: "POST",
								url: "event/add",
								data: postData,
								success: function(msg) {
									eventFiles = [];
									if (msg == "") {
										swal(
											'Success!',
											'Event was successfully added.',
											'success'
										);
										
										getEvents();
										
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
            
            
            
            $('#editUserForm').on('submit', function(e) { //use on if jQuery 1.7+
                e.preventDefault();
                var postData = $("#editUserForm").serializeArray();
                postData.push({ name: "employee_mobile", value: $("#editUserPhoneInput").intlTelInput("getNumber")});
                postData.push({ name: "employee_work", value: $("#editUserWorkPhoneInput").intlTelInput("getNumber")})

                $.ajax({
                    type: "POST",
                    url: "profile/edit",
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
		
		function addNewEventExternalParticipant(){
			$("#newEventExternalParticipantsDIV").append('<div class="m-t-5">' +
													'<input type="text" class="input-gray pull-left m-r-10" placeholder="Name and surname" name="external_names[]" />' +
													'<input type="email" class="input-gray pull-left m-r-10" placeholder="E-mail address" name="external_emails[]" />' +
													'<button class="btn btn-link pull-left text-danger" onClick="removeParentDIV(this)"><i class="fa fa-times"></i></button>' +
													'<div class="clearfix"></div>' +
												'</div>');
		}
		
		function removeParentDIV(btn){
			$(btn).parent().remove();
		}
		
		function getCustomersEvent(customer_id) {
            $.ajax({
                type: "POST",
                url: "<?= BASE_URL ?>" + "customer/get",
                data: null,
                dataType: "json",
                success: function(customers) {
                    customersArray = customers;
					$("#eventCustomerSelect").html("");
					$("#eventCustomerSelect").append($('<option>', {
                            value: "",
                            text: "None"
                    }));
                    for (var i = 0; i < customers.length; i++){
                        $("#eventCustomerSelect").append($('<option>', {
                            value: customers[i].customer_id,
                            text: customers[i].customer_name
                        }));
                    }
                    $("#eventCustomerSelect").val(customer_id).trigger("change");
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
	    
	    function getCustomers() {
            $.ajax({
                type: "POST",
                url: "<?= BASE_URL ?>" + "customer/get",
                data: null,
                dataType: "json",
                success: function(customers) {
                    customersArray = customers;
                    for (var i = 0; i < customers.length; i++){
                        $("#eventCustomerSelect").append($('<option>', {
                            value: customers[i].customer_id,
                            text: customers[i].customer_name
                        }));
                    }
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
	    
	    function getEmployees() {
            $.ajax({
                type: "POST",
                url: "<?= BASE_URL ?>" + "employees/list",
                data: null,
                dataType: "json",
                success: function(employees) {
                    employeeArray = employees;
                    $("#eventEmployeeSelect").html("");
                    $("#eventEmployeeSelect").append($('<option>', {
                            value: "",
                            text: "Choose an employee"
                    }));
                    if (isAdmin == 1){
                        for (var i = 0; i < employees.length; i++){
                            $("#eventEmployeeSelect").append($('<option>', {
                                value: employees[i].employee_id,
                                text: employees[i].employee_name + " " + employees[i].employee_surname
                            }));
                        }
                    }else{
                        for (var i = 0; i < employees.length; i++){
                            if (employees[i].employee_id == loggedEmployee){
                                $("#eventEmployeeSelect").append($('<option>', {
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
	    
	    function getEmployeeDocuments(){
	        var postData = { employee_id: loggedEmployee };
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
                                  $("#treeUploadBtn").removeClass("hide");
                                  $("#treeDeleteBtn").addClass("hide");
                              }else{
                                  $("#treeDownloadBtn").removeClass("hide");
                                  $("#treeUploadBtn").addClass("hide");
                                  $("#treeDeleteBtn").removeClass("hide");
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
				if (node.parent == "#"){ //root node
                                    var tree = $("#documentsTree").jstree(true);
                                        return {
                                            "Upload a file": {
                                                "separator_before": false,
                                                "separator_after": false,
                                                "label": "Upload a file",
                                                "icon": "fa fa-upload text-primary",
                                                "action": function (obj) { 
                                                    showUploadFilePopup(node.original.dirurl);
                                                }
                                            },
                                            "Create a subfolder": {
                                                "separator_before": false,
                                                "separator_after": false,
                                                "label": "Create a subfolder",
                                                "icon": "fa fa-folder text-warning",
                                                "action": function (obj) { 
                                                    node = tree.create_node(node);
                                                    tree.edit(node);
                                                }
                                            },
                                        };
                                }else if (nodeType != "default" && nodeType != "folder-open"){
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
                                            },
                                            "Rename file": {
                                                "separator_before": false,
                                                "separator_after": false,
                                                "label": "Rename file",
                                                "icon": "fas fa-pencil-alt text-success",
                                                "action": function (obj) {
                                                    tree.edit(node);
                                                }
                                            },                         
                                            "Remove file": {
                                                "separator_before": false,
                                                "separator_after": false,
                                                "label": "Remove file",
                                                "icon": "fa fa-trash text-danger",
                                                "action": function (obj) { 
                                                    swal({
                                                      title: 'Confirm action',
                                                      text: "Are you sure you want to remove this file?",
                                                      type: 'error',
                                                      showCancelButton: true,
                                                      confirmButtonColor: '#3085d6',
                                                      cancelButtonColor: '#d33',
                                                      confirmButtonText: 'Yes, remove'
                                                    }).then(function () {
                                                        tree.delete_node(node);
                                                        
                                                    });
                                                }
                                            }
                                        };
                                }else{
                                    var tree = $("#documentsTree").jstree(true);
                                        return {
                                            "Upload a file": {
                                                "separator_before": false,
                                                "separator_after": false,
                                                "label": "Upload a file",
                                                "icon": "fa fa-upload text-primary",
                                                "action": function (obj) { 
                                                    showUploadFilePopup(node.original.dirurl);
                                                }
                                            },
                                            "Create a subfolder": {
                                                "separator_before": false,
                                                "separator_after": false,
                                                "label": "Create a subfolder",
                                                "icon": "fa fa-folder text-warning",
                                                "action": function (obj) { 
                                                    node = tree.create_node(node);
                                                    tree.edit(node);
                                                }
                                            },
                                            "Rename folder": {
                                                "separator_before": false,
                                                "separator_after": false,
                                                "label": "Rename directory",
                                                "icon": "fas fa-pencil-alt text-success",
                                                "action": function (obj) {
                                                    tree.edit(node);
                                                }
                                            },                         
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
        
        function treeUploadClicked(){
            var selectedNode = $("#documentsTree").jstree("get_selected",true);
            showUploadFilePopup(selectedNode[0].original.dirurl);
        }
        
        function treeDeleteClicked(){
            var selectedNode = $("#documentsTree").jstree("get_selected", true);
            swal({
                title: 'Confirm action',
                text: "Are you sure you want to remove this file?",
                type: 'error',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, remove'
            }).then(function() {
                $("#documentsTree").jstree("delete_node", selectedNode);
            });
        }
        
        function deleteFile(fileURL){
                var postData = { "file_location": fileURL };
                $.ajax({
                    type: "POST",
                    url: "workgroup/deleteFile",
                    data: postData,
                    success: function(response) {
                        if (response == ""){
                            swal(
                                    'Success!',
                                    'File was successfully removed.',
                                    'success'
                            );
                        }else{
                            swal(
                                    'Error',
                                    'The server encountered the following error: ' + response,
                                    'error'
                                );
                        }
                    }
                });
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
                        getEmployeeDocuments();
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
		
		function hideNewCustomerPopup() {
			$("#addCustomerForm")[0].reset();
            $("#emailsDIV, #phoneNrsDIV").html("");
            $("#customerPopupDIV, #addCustomerDIV").hide();
        }
    
        function showNewCustomerPopup() {
            $("#eventPopupDIV, #addEventDIV").hide();
            $("#customerPopupDIV, #addCustomerDIV").show();
        }
        
        function getEvents(){
            var postData = { employee_id: loggedEmployee };
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
							customerBtn = '<a href="customerdetails?customer_id=' + event.customer_id + '" target="_blank" class="btn btn-link m-r-15"><i class="fas fa-home fa-fw fa-lg m-r-3"></i> View customer</a>';
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
                        			                '<a target="_blank" href="eventdetails?event_id=' + event.event_id + '" class="btn btn-link m-r-15"><i class="fas fa-eye fa-fw fa-lg m-r-3"></i> View event</a>' +
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
		
		function getCalls(){
            var postData = { employee_id: loggedEmployee };
            $.ajax({
                type: "POST",
                url: "<?= BASE_URL ?>" + "telephony/getEmployeeCalls",
                data: postData,
                dataType: "json",
                success: function(newCalls) {
                    calls = newCalls;
                    var timelineContent = "";
                    for (var i = 0; i < calls.length; i++){
						var call = calls[i];
                        var customerBtn = "";
						if (call.customer_id != null){
							customerBtn = '<a href="customerdetails?customer_id=' + call.customer_id + '" target="_blank" class="btn btn-link m-r-15"><i class="fas fa-home fa-fw fa-lg m-r-3"></i> View customer</a>';
						}
                    	timelineContent += '<li>' +
                    			        '<div class="timeline-time">' +
                    			            '<span class="date">' + moment(call.call_datetime).format("dddd, Do MMMM YYYY") + '</span>' +
                    			        '</div>' +
                    			        '<div class="timeline-icon timeline-primary">' +
                    			            '<a data-toggle="tooltip" title="' + call.call_subject + '" href="javascript:;">&nbsp;</a>' +
                    			        '</div>' +
                    			        '<div class="timeline-body">' +
                    			            '<div class="timeline-header">' +
                    			                '<span class="username">' + call.call_subject + '</span>' +
                    			            '</div>' +
                    			            '<div class="timeline-content">' +
												'<h5 class="template-title">' +
													'<label class="label label-primary">' + call.call_phonenumber + '</label>' +  
												'</h5>' +
                    			                '<h5 class="template-title">' +
                    			                    call.call_notes +
                    			                '</h5>' +
                                            '</div>' +
                    			            '<div class="timeline-footer">' +
                    			                 customerBtn +
                    			            '</div>' +
                    			        '</div>' +
							'</li>';
                    }
                    $("#callTimeline").html(timelineContent);
					
                }
		    });
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
		
		function getTravelOrders(){
            var postData = { employee_id: loggedEmployee };
            $.ajax({
                type: "POST",
                url: "<?= BASE_URL ?>" + "travelorders/employee",
                data: postData,
                dataType: "json",
                success: function(newTravelorders) {
					console.log(newTravelorders);
                    travelorders = newTravelorders;
                    var timelineContent = "";
                    for (var i = 0; i < travelorders.length; i++){
						var travelorder = travelorders[i];
						var statusColor = "timeline-danger";
						var statusString = "Incomplete";
						if (travelorder.status == 1){
							statusColor = "timeline-success";
							statusString = "Finished";
						}
                    	timelineContent += '<li>' +
                    			        '<div class="timeline-time">' +
                    			            '<span class="date">' + moment(travelorder.date_from + ' ' + travelorder.time_from).format("dddd, Do MMMM YYYY, HH:mm") + '</span>' +
											'<span class="time">' + moment(travelorder.date_to + ' ' + travelorder.time_to).format("dddd, Do MMMM YYYY, HH:mm") + '</span>' +
                    			        '</div>' +
                    			        '<div class="timeline-icon ' + statusColor + '">' +
                    			            '<a data-toggle="tooltip" title="' + statusString + '" href="javascript:;">&nbsp;</a>' +
                    			        '</div>' +
                    			        '<div class="timeline-body">' +
                    			            '<div class="timeline-header">' +
                    			                '<span class="username">' + travelorder.travelorder_number + '</span>' +
                    			            '</div>' +
                    			            '<div class="timeline-content">' +
												'<h4 class="template-title">' + 
													travelorder.vehicle_brand + ' ' + travelorder.vehicle_model +  
												'</h4>' +
                    			                '<h5 class="template-title">' +
													travelorder.vehicle_registration +
                    			                '</h5>' +
                                            '</div>' +
                    			            '<div class="timeline-footer">' +
												'<a target="_blank" href="travelorderdetails?travelorder_id=' + travelorder.travelorder_id + '" class="btn btn-link m-r-15"><i class="fas fa-eye fa-fw fa-lg m-r-3"></i>View travel order</a>' +
												'<a target="_blank" href="triporderdetails?trip_id=' + travelorder.trip_id + '" class="btn btn-link m-r-15"><i class="fas fa-eye fa-fw fa-lg m-r-3"></i>View trip order</a>' +
                    			            '</div>' +
                    			        '</div>' +
                    			    '</li>';
                    }
                    $("#travelorderTimeline").html(timelineContent);
					
                }
		    });
        }
		
		function filterTravelOrders(){
			var input, filter, ul, li, a, i;
            input = document.getElementById("searchTravelOrdersInput");
            filter = input.value.toUpperCase();
            ul = document.getElementById("travelorderTimeline");
            li = ul.getElementsByTagName("li");
            for (i = 0; i < li.length; i++) {
                if (li[i].innerHTML.toUpperCase().indexOf(filter) > -1) {
                    li[i].style.display = "";
                } else {
                    li[i].style.display = "none";
        
                }
            }
		}
		
		function getWorkOrders(){
            var postData = { employee_id: loggedEmployee };
            $.ajax({
                type: "POST",
                url: "<?= BASE_URL ?>" + "workorders/getEmployee",
                data: postData,
                dataType: "json",
                success: function(newWorkorders) {
                    workorders = newWorkorders;
                    var timelineContent = "";
                    for (var i = 0; i < workorders.length; i++){
						var workorder = workorders[i];
						var statusColor = "timeline-danger";
						var statusString = "Incomplete";
						if (workorder.status == 1){
							statusColor = "timeline-primary";
							statusString = "In progress";
						}else if (workorder.status == 2){
							statusColor = "timeline-success";
							statusString = "Finished";
						}
                    	timelineContent += '<li>' +
                    			        '<div class="timeline-time">' +
                    			            '<span class="date">Due ' + moment(workorder.workorder_enddate).format("dddd, Do MMMM YYYY") + '</span>' +
											'<span class="time">' + moment(workorder.workorder_enddate).format("dddd, Do MMMM YYYY") + '</span>' +
                    			        '</div>' +
                    			        '<div class="timeline-icon ' + statusColor + '">' +
                    			            '<a data-toggle="tooltip" title="' + statusString + '" href="javascript:;">&nbsp;</a>' +
                    			        '</div>' +
                    			        '<div class="timeline-body">' +
                    			            '<div class="timeline-header">' +
                    			                '<span class="username">' + workorder.workorder_subject + '</span>' +
                    			            '</div>' +
                    			            '<div class="timeline-content">' +
												'<h5 class="template-title">' + 
													'<h4>' + workorder.customer_name + '</h4>' +  
												'</h5>' +
                    			                '<h5 class="template-title">' +
													workorder.workorder_notes +
                    			                '</h5>' +
                                            '</div>' +
                    			            '<div class="timeline-footer">' +
												'<a href="workorderdetails?workorder_id=' + workorder.workorder_id + '" target="_blank" class="btn btn-link m-r-15"><i class="fas fa-eye fa-fw fa-lg m-r-3"></i>View work order</a>' +
												'<button onClick="viewWorkorderOnMap(' + workorder.workorder_id + ')" class="btn btn-link m-r-15"><i class="fa fa-map-marker-alt fa-fw fa-lg m-r-3"></i> View on map</button>' +
                    			                '<a href="customerdetails?customer_id=' + workorder.customer_id + '" target="_blank" class="btn btn-link m-r-15"><i class="fas fa-home fa-fw fa-lg m-r-3"></i> View customer</a>' +
                    			            '</div>' +
                    			        '</div>' +
                    			    '</li>';
                    }
                    $("#workorderTimeline").html(timelineContent);
					
                }
		    });
        }
		
		function filterWorkOrders(){
			var input, filter, ul, li, a, i;
            input = document.getElementById("searchWorkOrdersInput");
            filter = input.value.toUpperCase();
            ul = document.getElementById("workorderTimeline");
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
								customerBtn = '<a href="customerdetails?customer_id=' + event.customer_id + '" target="_blank" class="btn btn-link m-r-15"><i class="fas fa-home fa-fw fa-lg m-r-3"></i> View customer</a>';
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
														'<a target="_blank" href="eventdetails?event_id=' + event.event_id + '" class="btn btn-link m-r-15"><i class="fas fa-eye fa-fw fa-lg m-r-3"></i> View event</a>' +
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
							customerBtn = '<a href="customerdetails?customer_id=' + event.customer_id + '" target="_blank" class="btn btn-link m-r-15"><i class="fas fa-home fa-fw fa-lg m-r-3"></i> View customer</a>';
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
                        			                '<a target="_blank" href="eventdetails?event_id=' + event.event_id + '" class="btn btn-link m-r-15"><i class="fas fa-eye fa-fw fa-lg m-r-3"></i> View event</a>' +
                        			                mapBtn + customerBtn +
                        			            '</div>' +
                        			        '</div>' +
                        			    '</li>';
                    }
                }
                $("#eventTimeline").html(timelineContent);
		}
		
	    
	    function showEditUserPopup(){
	        $("#userPopupDIV, #editUserDIV").show();
	    }
	    
	    function hideEditUserPopup(){
	        $("#userPopupDIV, #editUserDIV").hide();
	    }
	    
	    function checkPasswordValidity(){
	        var p1 = $("#passwordInput").val();
	        var p2 = $("#confirmPasswordInput").val();
	        if (p1 != p2){
	            $('#confirmPasswordSpan').html("Passwords don't match");
	        }else {
                $('#confirmPasswordSpan').html('');
            }
	    }
	    
	    function showChangePasswordPopup(){
	        $("#changePasswordPopup, #changePasswordDIV").show();
	    }
	    
	    function hideChangePasswordPopup(){
	        $("#changePasswordPopup, #changePasswordDIV").hide();
	    }
	    
	    function enable2FA(){
	        var postData = { "status": 1 };
	        $.ajax({
                type: "POST",
                url: "<?= BASE_URL ?>" + "employee/2FA",
                data: postData,
                success: function(msg) {
                    location.reload();
                }
	        });
	    }
	    
	    function disable2FA(){
	        var postData = { "status": 0 };
	        $.ajax({
                type: "POST",
                url: "<?= BASE_URL ?>" + "employee/2FA",
                data: postData,
                success: function(msg) {
                    location.reload();
                }
	        });
	    }
	    
	    function initMap(){
		    var myOptions = {
                zoom: parseInt(14),
                center: new google.maps.LatLng(46.056946, 14.505751),
                mapTypeId: google.maps.MapTypeId.ROADMAP
            };
            map = new google.maps.Map(document.getElementById('map'), myOptions);
            google.maps.event.trigger(map, 'resize');
			
			var searchBox = new google.maps.places.SearchBox(document.getElementById('newEventAddressInput'));
			
            
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
		
		function viewWorkorderOnMap(workorder_id){
	        var workorder;
	        for (var i = 0; i < workorders.length; i++){
	            if (workorders[i].workorder_id == workorder_id){
	                workorder = workorders[i];
	                break;
	            }
	        }
	        if (mapMarker != null){
	            mapMarker.setMap(null);
	        }
            mapMarker = new google.maps.Marker({
                position: new google.maps.LatLng(workorder.latitude, workorder.longitude),
                map: map,
                title: 'Work order location'
            });
            
            var infoWindowContent = "<p class='f-s-12'><strong>" + workorder.workorder_location + "</strong><br><br><strong>Customer - </strong>" + workorder.customer_name + "</p>";
            addInfoWindow(map, mapMarker, infoWindowContent, true);
            $("#mapPopup, #mapDIV").show();
            google.maps.event.trigger(map, 'resize');
            map.setZoom(map.getZoom());
            map.setCenter({lat: parseFloat(workorder.latitude), lng: parseFloat(workorder.longitude)});
	    }
	    
	    function hideMapPopup(){
            $("#mapPopup, #mapDIV").hide();
        }
	    
	   
        function showUploadFilePopup(directory){
		    $("#uploadDirectoryInput").val(directory);
		    $("#uploadPopup, #uploadFileDIV").show();
		}
		
		function hideUploadFilePopup(){
		    $("#uploadFileForm")[0].reset();
		    $("#uploadPopup, #uploadFileDIV").hide();
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
	        $("#uploadPopup, #uploadPictureDIV").show();
	    }
	    
	    function hideUploadPopup(){
	        $("#uploadPopup, #uploadPictureDIV").hide();
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
