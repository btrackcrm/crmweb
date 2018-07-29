<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
<!--<![endif]-->

<head>
    <meta charset="utf-8" />
    <title>Ticketing</title>
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
	<!-- ================== END PAGE LEVEL STYLE ================== -->
	
	<!-- ================== BEGIN BASE JS ================== -->
	<script src="<?= ASSETS_URL . "pace/pace.min.js" ?>" ></script>
	<!-- ================== END BASE JS ================== -->
</head>
<style>
  
    .profile-header .profile-header-tab {
        background: #fff;
        list-style-type: none;
        margin: -10px 0 0;
        padding: 0 0 0 10px;
        white-space: nowrap;
        border-radius: 0;
    }
    
    #composeEmailDIV, #wizardDIV{
        width: 900px;
        height: auto;
        position: relative;
        margin: 80px auto 0px auto;
    }
	
	.list-email .read .email-title {
		font-weight: 600;
	}
    
    .email-ticket{
        float: left;
        width: 30px;
        height: 30px;
        overflow: hidden;
        font-size: 18px;
        line-height: 30px;
        text-align: center;
        margin: -5px 0;
    }
    
    #addCustomerDIV, #newCategoryDIV, #editCategoryDIV, #emailSetupDIV{
        width: 800px;
        height: auto;
        position: relative;
        margin: 5% auto 0px auto;
    }
    
    #newTicketDIV, #editTicketDIV{
        width: 900px;
        height: auto;
        position: relative;
        margin: 5% auto 0px auto;
    }
    
    #emailPopupPanel, #emailCommentPanel{
        width: 1100px;
        height: auto;
        position: relative;
        margin: 5% auto 0px auto;
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
        background: #535c6a url(http://track.appdev.si/Web/assets/img/user-default-avatar.svg) no-repeat center;
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
        background: #535c6a url(http://track.appdev.si/Web/assets/img/user-default-avatar.svg) no-repeat center;
        background-size: 50%;
        position: relative;
    }
	
	.input-sm {
		display: initial;
		height: 28px;
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
    
    .phone-panel{
        position: fixed;
        right: -300px;
        top: 150px;
        z-index: 1020;
        background: #fff;
        padding: 15px;
        box-shadow: 0 0 6px rgba(0, 0, 0, .2);
        -webkit-box-shadow: 0 0 6px rgba(0, 0, 0, .2);
        -moz-box-shadow: 0 0 6px rgba(0, 0, 0, .2);
        width: 300px;
        -webkit-transition: right .2s linear;
        -moz-transition: right .2s linear;
        transition: right .2s linear;
    }
    
    .phone-panel.active{
        right: 0px;
    }
    
    .phone-panel .phone-panel-content {
        margin: -15px;
        padding: 15px;
        background: #fff;
        position: relative;
        z-index: 1020;
    }
	
	.email-checkbox:hover{
		cursor: pointer;
	}
    
    #emailList li{
        cursor: pointer;
    }
    
    #emailList li:hover{
        background-color: #f4f4f4;
    }
    
    .tab-content {
        padding: 0px;
        margin-bottom: 20px;
        background: #fff;
        -webkit-border-radius: 3px;
        -moz-border-radius: 3px;
        border-radius: 3px;
    }
    
    .hideMe{
        display: none;
    }
    
    .emailIcon{
        position: absolute;
        bottom: 15px;
        right: 15px;
        font-size: 18px;
        cursor: pointer;
        color: #007aff;
    }
    
    .bottomRightIcon{
        position: absolute;
        bottom: 5px;
        right: 15px;
        font-size: 26px;
    }
    
    .panel-footer{
        overflow: auto;
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
    
    .tab-content {
        margin-bottom: 20px;
        background: none;
        -webkit-border-radius: 3px;
        -moz-border-radius: 3px;
        border-radius: 3px;
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
    
    #ticketsTable, #categoriesTable{
        width: 100% !important;
    }
    
    .hide{
        display: none;
    }
    
    .pointer{
        cursor: pointer;
    }
    
    .hover-underline:hover{
        cursor: pointer;
        text-decoration: underline;
    }
	
	#ticketsTable tr td:last-child{
		min-width: 100px;
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
								echo '<li class="has-sub active">
									<a href="javascript:;">
										<b class="caret pull-right"></b>
										<i class="ion-help-buoy"></i>
										<span>Support</span>
									</a>
									<ul class="sub-menu">
										<li class="active"><a href="' . BASE_URL . 'ticketingdashboard">Ticketing</a></li>
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
            <div class="profile">
				<div class="profile-header profile-header-no-image">
					<!-- BEGIN profile-header-cover -->
					<div class="profile-header-cover"></div>
					<!-- END profile-header-cover -->
					<!-- BEGIN profile-header-content -->
					<div class="profile-header-content">
						<!-- BEGIN profile-header-info -->
						<div class="profile-header-info">
							<h4 class="m-t-10 m-b-5">Ticketing</h4>
						</div>
						<button class="btn btn-white btn-sm" onClick="showNewBlankTicketPopup()"><i class="fas fa-tag m-r-5 text-success"></i>Create a ticket</button>
						<button class="btn btn-white btn-sm" onClick="showEmailSetupPopup()"><i class="fas fa-cog m-r-5 text-primary"></i>E-mail settings</button>
						<!-- END profile-header-info -->
					</div>
					<ul class="profile-header-tab nav nav-tabs">
						<li class="nav-item active"><a href="#ticketing-overview" class="nav-link" data-toggle="tab">OVERVIEW</a></li>
						<li class="nav-item"><a href="#ticketing-categories" class="nav-link" data-toggle="tab">CATEGORIES</a></li>
					</ul>
					<!-- END profile-header-content -->
				</div>
			</div>
			<div class="profile-content">
				<div class="tab-content">
					<div class="tab-pane fade in active" id="ticketing-overview">
						<div class="row">
							<div class="col-md-12">
								<div class="panel panel-inverse">
									<div class="panel-heading">
										<div class="panel-heading-btn">
											<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
											<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
											<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
										</div>
										<h4 class="panel-title">Tickets</h4>
									</div>
									<div class="panel-body">
										<div class="m-b-20">
											<div class="radio radio-css radio-inline radio-danger m-t-0">
												<input type="radio" name="hide_inactive" id="pxr1" value="0" checked>
												<label for="pxr1">
													Show unresolved tickets
												</label>
											</div>
											<div class="radio radio-css radio-inline radio-success m-t-0">
												<input type="radio" name="hide_inactive" id="pxr2" value="1">
												<label for="pxr2">
													Show all tickets
												</label>
											</div>
											<span class="pull-right"><i class="fa fa-circle text-danger m-r-5 m-l-10"></i>Overdue tickets</span>
											<span class="pull-right"><i class="fa fa-circle text-muted m-r-5"></i>Normal tickets</span>
										</div>
										<table id="ticketsTable" class="table table-striped ">
													<thead>
														<tr>
															<th>
																Subject
															</th>
															<th>
																Priority
															</th>
															<th>
																Type
															</th>
															<th>
																Due
															</th>
															<th>
																Customer
															</th>
															<th>
																Subsidiary
															</th>
															<th>
																Assigned to
															</th>
															<th>
																Created by
															</th>
															<th>
																Created on
															</th>
															<th>
																Last update
															</th>
															<th>
																Status
															</th>
															<th>
																
															</th>
														</tr>
													</thead>
													<tbody>
													</tbody>
										</table>
									</div>
								</div>
							</div>
						</div>
						<div class="row" id="emailRow">
							<div class="col-md-12">
									<div class="wrapper bg-silver-lighter">
										<!-- begin btn-toolbar -->
										<div class="btn-toolbar">
											<!-- begin btn-group -->
											
											<div class="btn-group pull-right">
												<button class="btn btn-white btn-sm" onclick="goToPreviousPage()">
													<i class="ion-chevron-left"></i>
												</button>
												<button class="btn btn-white btn-sm" onclick="goToNextPage()">
													<i class="ion-chevron-right"></i>
												</button>
											</div>
											<a href="#" class="btn btn-white btn-sm pull-right"><?php
												if ($usersettings["telephony_email"] != ""){
													echo $usersettings["telephony_email"]; 
												}else{
													echo "No e-mail address set";
												}
											?></a>
											<button class="btn btn-sm btn-white pull-left m-r-10" onclick="showComposePopup()"><i class="fas fa-paper-plane text-success m-r-5"></i>Compose</button>
											<div class="input-group width-sm">
											  <input id="searchEmailsInput" type="text" class="form-control input-sm pull-left" placeholder="Search query...">
											  <span class="input-group-btn">
												<button class="btn btn-white btn-sm" type="button" onclick="filterEmails()"><i class="fa fa-search"></i></button>
											  </span>
											</div><!-- /input-group -->
											
											<!-- begin btn-group -->
											<div class="btn-group">
												<button class="btn btn-sm btn-white m-r-5" data-toggle="tooltip" data-placement="bottom" data-title="Refresh" data-original-title="" title="" onclick="refreshEmails(true)"><i class="fas fa-sync-alt text-success"></i></button>
											</div>
											<!-- end btn-group -->
										</div>
										<!-- end btn-toolbar -->
									</div>
									<ul class="list-group list-group-lg no-radius list-email" id="emailList">
												
									</ul>
									<div class="wrapper bg-silver-lighter clearfix">
											<div class="btn-group pull-right">
												<button class="btn btn-white btn-sm" onClick="goToPreviousPage()">
													<i class="ion-chevron-left"></i>
												</button>
												<button class="btn btn-white btn-sm" onClick="goToNextPage()">
													<i class="ion-chevron-right"></i>
												</button>
											</div>
											<div class="m-t-5" id="pageCount"></div>
									</div>
							</div>
						</div>
					</div>
					<div class="tab-pane fade" id="ticketing-categories">
						<button class="btn btn-primary m-b-15" onClick="showNewCategoryPopup()">Add a category</button>
						<div class="row">
							<div class="col-md-12">
								<div class="panel panel-primary">
									<div class="panel-heading">
										<div class="panel-heading-btn">
											<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
											<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
											<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
										</div>
										<h4 class="panel-title">Categories</h4>
									</div>
									<div class="panel-body">
										<div class="dataTables_wrapper form-inline dt-bootstrap no-footer">
											<table id="categoriesTable" class="table table-striped">
												<thead>
													<tr>
														<th>Category name</th>
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
				</div>
			</div>
		</div>
    </div>
	<div class="popupContainer" id="ticketCategoryPopup" hidden>
            <div class="panel panel-inverse" id="newCategoryDIV" hidden>
                <div class="panel-heading">
                    <div class="panel-heading-btn">
                        <button onclick="hideNewCategoryPopup()" class="btn btn-xs btn-icon btn-circle btn-default"><i class="fa fa-times"></i></button>
                    </div>
                    <h4 class="panel-title">Create a category</h4>
                </div>
                <div class="panel-body">
                    <form id="newCategoryForm" action="<?= BASE_URL . "ticketcategory/add" ?>" method="post" class="form-horizontal">
						<div class="form-group">
							<div class="col-md-12">
								<label>Category name:</label>
								<input type="text" class="form-control" name="category_name" placeholder="Enter category name" />
							</div>
						</div>
						<button class="btn btn-success">Add category</button>
						<button class="btn btn-danger pull-right" type="button" onClick="hideNewCategoryPopup()">Close</button>
					</form>
				</div>
			</div>
			<div class="panel panel-inverse" id="editCategoryDIV" hidden>
                <div class="panel-heading">
                    <div class="panel-heading-btn">
                        <button onclick="hideEditCategoryPopup()" class="btn btn-xs btn-icon btn-circle btn-default"><i class="fa fa-times"></i></button>
                    </div>
                    <h4 class="panel-title">Edit category</h4>
                </div>
                <div class="panel-body">
                    <form id="editCategoryForm" action="<?= BASE_URL . "ticketcategory/edit" ?>" method="post" class="form-horizontal">
						<input type="hidden" name="category_id" id="hiddenEditCategoryIDInput" />
						<div class="form-group">
							<div class="col-md-12">
								<label>Category name:</label>
								<input id="editCategoryNameInput" type="text" class="form-control" name="category_name" placeholder="Enter category name" />
							</div>
						</div>
						<button class="btn btn-success">Edit category</button>
						<button class="btn btn-danger pull-right" type="button" onClick="hideEditCategoryPopup()">Close</button>
					</form>
				</div>
			</div>
	</div>
	
		<div class="popupContainer" id="setupPopup" hidden>
				<div class="panel panel-default panel-with-tabs" id="emailSetupDIV">
                        <div class="panel-heading ui-sortable-handle">
							<div class="panel-heading-btn">
								<button onclick="hideEmailSetupPopup()" class="btn btn-xs btn-icon btn-circle btn-danger"><i class="fa fa-times"></i></button>
							</div>
                            <ul class="nav nav-tabs pull-right m-r-15">
								<li class="nav-item active"><a href="#general-setup" data-toggle="tab" class="nav-link active"><i class="fa fa-home"></i> <span class="d-none d-md-inline">General</span></a></li>
                                <li class="nav-item"><a href="#imap-setup" data-toggle="tab" class="nav-link"><i class="fas fa-envelope"></i> <span class="d-none d-md-inline">IMAP</span></a></li>
                                <li class="nav-item"><a href="#office365-setup" data-toggle="tab" class="nav-link"><i class="fas fa-envelope"></i> <span class="d-none d-md-inline">Office365</span></a></li>
								<li class="nav-item"><a href="#exchange-setup" data-toggle="tab" class="nav-link"><i class="fas fa-envelope"></i> <span class="d-none d-md-inline">Exchange</span></a></li>
                            </ul>
                            <h4 class="panel-title">E-mail setup</h4>
                        </div>
                        <div class="tab-content">
							<div class="tab-pane active" id="general-setup">
								<div class="p-15">
									<?php
										if ($employee["imap_username"] != "" && $employee["imap_username"] != null){
											echo '<button class="btn btn-success m-r-5" onClick="useEmail(0)">Use IMAP</button>';
										}
										if ($employee["access_token"] != "" && $employee["access_token"] != null){
											echo '<button class="btn btn-success m-r-5" onClick="useEmail(1)">Use Office365</button>';
										}
										if ($employee["exchange_username"] != "" && $employee["exchange_username"] != null){
											echo '<button class="btn btn-success m-r-5" onClick="useEmail(2)">Use Exchange</button>';
										}
									?>
								</div>
							</div>
                            <div class="tab-pane" id="imap-setup">
								<div class="p-15">
									<form id="emailSetupForm" action="telephony/emailsetup" method="post" class="form-horizontal">
										<div class="form-group">
											<div class="col-md-10">
												<label>IMAP Server address:</label>
												<input type="text" class="form-control" name="telephony_emailhost" placeholder="mail.domain.com" value="<?php
																if ($usersettings["telephony_emailhost"] != ""){
																	echo $usersettings["telephony_emailhost"]; 
																}
															?>" required>
											</div>
											<div class="col-md-2">
												<label>Port:</label>
												<input type="number" class="form-control" name="telephony_emailport" placeholder="993" value="<?php
																if ($usersettings["telephony_emailport"] != 0){
																	echo $usersettings["telephony_emailport"];
																}else{
																	echo "993";
																}
															?>" required>
											</div>
										</div>
										<div class="form-group">
											<div class="col-md-8">
												<label>E-mail:</label>
												<input type="email" class="form-control" name="telephony_email" placeholder="example@btrack.io" value="<?php
																if ($usersettings["telephony_email"] != ""){
																	echo $usersettings["telephony_email"]; 
																}
															?>" required />
											</div>
											<div class="col-md-4">
												<label>E-mail password</label>
												<input type="password" class="form-control" name="telephony_password" value="<?php
																if ($usersettings["telephony_password"] != ""){
																	echo $usersettings["telephony_password"];
																}
															?>" required />
											</div>
										</div>
										<div class="form-group">
											<div class="col-md-4">
												<label>Use SSL/TLS: </label><br>
												<div class="radio radio-css radio-inline radio-danger">
													<input type="radio" name="telephony_ssl" id="lxr1" value="0">
													<label for="lxr1">
																	No
																</label>
												</div>
												<div class="radio radio-css radio-inline radio-success">
													<input type="radio" name="telephony_ssl" id="lxr2" value="1" checked="">
													<label for="lxr2">
																	Yes
																</label>
												</div>
											</div>
											<div class="col-md-4">
												<label>Validate certificate: </label><br>
												<div class="radio radio-css radio-inline radio-danger">
													<input type="radio" name="telephony_certificate" id="bxr1" value="0" checked="">
													<label for="bxr1">
																					No
																				</label>
												</div>
												<div class="radio radio-css radio-inline radio-success">
													<input type="radio" name="telephony_certificate" id="bxr2" value="1">
													<label for="bxr2">
																					Yes
																				</label>
												</div>
											</div>
										</div>
										<button class="btn btn-primary">Save settings</button>
										<?php
											if ($usersettings["telephony_emailhost"] != ""){
												echo '<button class="btn btn-danger pull-right" type="button" onClick="disconnectIMAP()">Disconnect IMAP Account</button>';
											}
										?>
									</form>
								</div>
                            </div>
                            <div class="tab-pane" id="office365-setup">
								<div class="p-15">
									<?php
										if ($employee["access_token"] == ""){
											echo '<a href="https://login.microsoftonline.com/1f50a38f-9604-4967-804d-bc6a7cf705ae/oauth2/v2.0/authorize?client_id=c2785070-f16d-46f5-bc12-304410eca8ad&response_type=code&response_mode=query&scope=profile%20offline_access%20https%3A%2F%2Fgraph.microsoft.com%2Fmail.read%20https%3A%2F%2Fgraph.microsoft.com%2Fmail.send%20https%3A%2F%2Fgraph.microsoft.com%2Fmail.readwrite%20https%3A%2F%2Fgraph.microsoft.com%2Fcalendars.readwrite%20https%3A%2F%2Fgraph.microsoft.com%2Fcontacts.readwrite%20https%3A%2F%2Fgraph.microsoft.com%2Ftasks.readwrite%20openid&state=12345&prompt=consent&redirect_uri=https://copy.btrackcore.com/index.php/office365/callback" class="btn btn-white m-r-5">Sync your Office365 account</a>';
										}else{
											echo '<button class="btn btn-danger" onClick="disconnectOffice365()"><i class="fas fa-sign-out-alt text-white m-r-5"></i>Disconnect from Office365</button>';
										}
									?>
								</div>
							</div>
							<div class="tab-pane" id="exchange-setup">
								<div class="p-15">
									<form id="exchangeForm" action="employee/exchange" method="post" class="form-horizontal m-t-10">
										<div class="form-group">
											<div class="col-md-6">
												<label>Exchange server host:</label>
												<input type="text" class="form-control" name="exchange_host" placeholder="mail.domain.com" value="<?php echo $employee["exchange_host"]; ?>" required />
											</div>
										</div>
										<div class="form-group">
											<div class="col-md-6">
												<label>E-mail:</label>
												<input type="text" class="form-control" name="exchange_username" placeholder="info@domain.com" value="<?php echo $employee["exchange_username"]; ?>" required />
											</div>
											<div class="col-md-6">
												<label>Password</label>
												<input type="password" class="form-control" name="exchange_password" value="<?php echo $employee["exchange_password"]; ?>" required>
											</div>
										</div>
										<button class="btn btn-primary">Connect with Exchange</button>
										<?php
											if ($employee["exchange_host"] != "" && $employee["exchange_host"] != null){
												echo '<button class="btn btn-danger pull-right" onClick="disconnectExchange()"><i class="fas fa-sign-out-alt text-white m-r-5"></i>Disconnect from Exchange</button>';
											}
										?>
									</form>
								</div>
							</div>
                        </div>
				</div>
		</div>
		<div class="popupContainer" id="composePopup" hidden>
            <div class="panel panel-inverse" id="composeEmailDIV">
                <div class="panel-heading">
                    <div class="panel-heading-btn">
                        <button onclick="hideComposePopup()" class="btn btn-xs btn-icon btn-circle btn-default"><i class="fa fa-times"></i></button>
                    </div>
                    <h4 class="panel-title">Compose</h4>
                </div>
                <div class="panel-body inbox">
                    <form id="sendEmailForm" action="<?= BASE_URL . "email/send" ?>" method="post" class="form-horizontal">
                        <div class="email-to">
												<span class="float-right-link">
													<a href="#" data-click="add-cc" data-name="Cc" class="m-r-5 label label-primary">CC</a>
													<a href="#" data-click="add-cc" data-name="Bcc" class="label label-primary">BCC</a>
												</span>
												<label class="control-label">To:</label>
												<ul id="email-to" class="primary line-mode tagit ui-widget ui-widget-content ui-corner-all">
													
													
												</ul>
											</div>
						<div data-id="extra-cc"></div>
                        <div class="email-subject">
												<input type="text" class="form-control form-control-lg" name="email_subject" placeholder="Subject">
											</div>
						<div class="email-content p-t-15">
							<textarea id="emailMessageInput" class="form-control" name="email_message" placeholder="Enter e-mail message"></textarea>
						</div>
                </div>
				<div class="panel-footer">
					<button class="btn btn-primary">Send e-mail</button>
					<button type="button" class="btn btn-danger pull-right" onClick="hideComposePopup()">Close</button>
					</form>
				</div>
            </div>
        </div>
        <div class="popupContainer" id="emailPopupDIV" hidden>
                <div class="panel panel-inverse" id="emailPopupPanel" hidden>
                    <div class="panel-heading">
                        <div class="panel-heading-btn">
                            <button onclick="hideEmailContent()" class="btn btn-xs btn-icon btn-circle btn-default" ><i class="fa fa-times"></i></button>
                        </div>
                        <h4 class="panel-title">E-mail</h4>
                    </div>
                    <div class="panel-body" style="overflow: hidden; position: relative;">
						<div class="col-md-8">
							<div id="emailHeaderDIV">
									
							</div>
							<div id="emailMessageDIV">
									
							</div>
							
							<ul id="emailAttachmentDIV" class="attached-document clearfix">
														
							</ul>
						</div>
						<div class="col-md-4 p-15 bg-silver-lighter" style="
							height: 100%;
							position: absolute;
							right: 0;
							top: 0;">
							<h4 class="m-t-0 f-w-500">Tickets</h4>
							<ul id="emailTicketsUL" class="list-group">
								
							</ul>
						</div>
                    </div>
                    <div id="emailActionDIV" class="panel-footer">
                        
                    </div>
                </div>
                <div class="panel panel-inverse" id="emailCommentPanel" hidden>
                    <div class="panel-heading">
                        <div class="panel-heading-btn">
                            <button onclick="hideEmailComment()" class="btn btn-xs btn-icon btn-circle btn-default" ><i class="fa fa-times"></i></button>
                        </div>
                        <h4 class="panel-title">Mark as processed</h4>
                    </div>
                    <div class="panel-body">
                        <form id="finishEmailForm" action="<?= BASE_URL . "emails/status" ?>" method="post" class="form-horizontal">
                            <div class="form-group">
                                <div class="col-md-12">
                                    <label>Notes:</label>
                                    <textarea id="emailCommentInput" class="form-control" name="email_notes" placeholder="Enter notes or comment" rows="4" required></textarea>
                                </div>
                            </div>
                    </div>
                    <div class="panel-footer">
                            <button class="btn btn-primary btn-sm">Mark as processed</button>
                            <button type="button" class="btn btn-white btn-sm pull-right" onClick="hideEmailComment()">Close</button>
                        </form>
                    </div>
                </div>
        </div>
		<div class="popupContainer" id="ticketPopupDIV" hidden>
            <div class="panel panel-inverse" id="newTicketDIV" hidden>
                <div class="panel-heading">
                    <div class="panel-heading-btn">
                        <button onclick="hideNewTicketPopup()" class="btn btn-xs btn-icon btn-circle btn-default"><i class="fa fa-times"></i></button>
                    </div>
                    <h4 class="panel-title">Create a ticket</h4>
                </div>
                <div class="panel-body">
                    <form id="newTicketForm" action="<?= BASE_URL . "telephony/addticket" ?>" method="post" class="form-horizontal">
                        <input id="newTicketLatitudeInput" type="hidden" name="latitude" />
                        <input id="newTicketLongitudeInput" type="hidden" name="longitude" />
                        <input id="newTicketCallIDInput" type="hidden" name="call_id" />
                        <input id="newTicketEmailIDInput" type="hidden" name="email_id" />
                        <div class="form-group">
                            <div class="col-md-12">
                                <label>Priority: <span class="text-danger">*</span></label><br>
                                <div class="radio radio-css radio-inline radio-success">
                                    <input type="radio" name="ticket_priority" id="nmr1" value="Low">
                                    <label for="nmr1">
                                        Low
                                    </label>
                                </div>
                                <div class="radio radio-css radio-inline radio-primary">
                                    <input type="radio" name="ticket_priority" id="nmr2" value="Normal" checked="">
                                    <label for="nmr2">
                                        Normal
                                    </label>
                                </div>
                                <div class="radio radio-css radio-inline radio-danger">
                                    <input type="radio" name="ticket_priority" id="nmr3" value="High">
                                    <label for="nmr3">
                                        High
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-8">
                                <label>Subject: <span class="text-danger">*</span></label>
                                <input id="newTicketSubjectInput" type="text" class="form-control" name="ticket_subject" required/>
                            </div>
							<div class="col-md-4">
                                <label>Due date: <span class="text-danger">*</span></label>
                                <div class="input-group ticket-date-picker">
                                    <input id="ticketDateInput" type="text" name="ticket_date" class="form-control"  placeholder="Choose a due date" required />
                                    <span class="input-group-addon btn bg-primary">
                                        <span class="fa fa-calendar text-white"></span>
                                    </span>                    
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-xs-12 col-sm-6 col-md-6">
                                <label>Customer: <span class="text-danger">*</span></label>
                                <select id="ticketCustomerSelect" name="customer_id" class="form-control" required>
                                    <option value="">Choose a customer</option>
                                </select>
                            </div>
							<div class="col-xs-12 col-sm-6 col-md-6">
								<label>Subsidiary:</label>
									<select id="ticketSubsidiarySelect" class="form-control" name="subsidiary_id" >
										<option value="">Main company</option>
									</select>
							</div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-12">
                                <label>Location:</label>
                                <input id="ticketLocationInput" type="text" name="ticket_location" class="form-control" />
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-8">
                                <label>Assign to: <span class="text-danger">*</span></label>
                                <select id="ticketEmployeeSelect" class="form-control" name="assign_to[]" multiple required>
                                    
                                </select>
                            </div>
                            <div class="col-md-4">
                                <label>Type: <span class="text-danger">*</span></label>
                                <select id="ticketTypeSelect" name="ticket_type" class="form-control" required>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-12">
                                <label>Notes:</label>
                                <textarea class="form-control" name="ticket_notes" placeholder="Enter any notes here" rows="4"></textarea>
                            </div>
                        </div>
						<div class="form-group">
							<div class="col-md-12">
								<label><i class="fas fa-paperclip text-primary"></i> Attachments</label><br>
								<ul id="ticketFiles" class="attached-document clearfix m-0">
								</ul>
								<span class="btn btn-link p-0 fileinput-button">
								<span>Attach a file</span>
									<!-- The file input field used as target for the file upload widget -->
									<input id="ticketFileUpload" type="file" name="file" multiple>
								</span>
							</div>
						</div>
                </div>
                <div class="panel-footer">
                        <button class="btn btn-primary">Create ticket</button>
                        <button type="button" class="btn btn-white pull-right" onClick="hideNewTicketPopup()">Close</button>
                    </form> 
                </div>
            </div>
            <div class="panel panel-inverse" id="editTicketDIV" hidden>
                <div class="panel-heading">
                    <div class="panel-heading-btn">
                        <button onclick="hideEditTicketPopup()" class="btn btn-xs btn-icon btn-circle btn-default"><i class="fa fa-times"></i></button>
                    </div>
                    <h4 class="panel-title">Edit ticket</h4>
                </div>
                <div class="panel-body">
                    <form id="editTicketForm" action="<?= BASE_URL . "telephony/editticket" ?>" method="post" class="form-horizontal">
                        <input id="editTicketLatitudeInput" type="hidden" name="latitude" />
                        <input id="editTicketLongitudeInput" type="hidden" name="longitude" />
                        <input id="editTicketIDInput" type="hidden" name="ticket_id" />
                        <fieldset>
                            <legend>General</legend>
                            <div class="form-group">
                                <div class="col-md-12">
                                    <label>Status: <span class="text-danger">*</span></label><br>
                                    <div class="radio radio-css radio-inline radio-warning">
                                        <input type="radio" name="ticket_status" id="axr1" value="0">
                                        <label for="axr1">
                                            Pending
                                        </label>
                                    </div>
                                    <div class="radio radio-css radio-inline radio-primary">
                                        <input type="radio" name="ticket_status" id="axr2" value="1">
                                        <label for="axr2">
                                            In progress
                                        </label>
                                    </div>
                                    <div class="radio radio-css radio-inline radio-success">
                                        <input type="radio" name="ticket_status" id="axr3" value="2">
                                        <label for="axr3">
                                            Finished
                                        </label>
                                    </div>
                                    <div class="radio radio-css radio-inline radio-danger">
                                        <input type="radio" name="ticket_status" id="axr4" value="3">
                                        <label for="axr4">
                                            Canceled
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-4">
                                    <label>Ticket ID:</label>
                                    <input type="text" class="form-control" id="editTicketCodeInput" readonly />
                                </div>
                                <div class="col-md-8">
                                    <label>Priority: <span class="text-danger">*</span></label><br>
                                    <div class="radio radio-css radio-inline radio-success">
                                        <input type="radio" name="ticket_priority" id="nxr1" value="Low">
                                        <label for="nxr1">
                                            Low
                                        </label>
                                    </div>
                                    <div class="radio radio-css radio-inline radio-primary">
                                        <input type="radio" name="ticket_priority" id="nxr2" value="Normal" checked="">
                                        <label for="nxr2">
                                            Normal
                                        </label>
                                    </div>
                                    <div class="radio radio-css radio-inline radio-danger">
                                        <input type="radio" name="ticket_priority" id="nxr3" value="High">
                                        <label for="nxr3">
                                            High
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-8">
                                    <label>Subject: <span class="text-danger">*</span></label>
                                    <input id="editTicketSubjectInput" type="text" class="form-control" name="ticket_subject" required/>
                                </div>
                                <div class="col-md-4">
                                    <label>Date: <span class="text-danger">*</span></label>
                                    <div class="input-group ticket-date-picker">
                                        <input id="editTicketDateInput" type="text" name="ticket_date" class="form-control"  placeholder="Choose a date" required />
                                        <span class="input-group-addon btn bg-primary">
                                            <span class="fa fa-calendar text-white"></span>
                                        </span>                    
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-xs-12 col-sm-6 col-md-6">
                                    <label>Customer: <span class="text-danger">*</span></label>
                                    <select id="editTicketCustomerSelect" name="customer_id" class="form-control" required>
                                        <option value="">Choose a customer</option>
                                    </select>
                                </div>
								<div class="col-xs-12 col-sm-6 col-md-6">
									<label>Subsidiary:</label>
										<select id="editTicketSubsidiarySelect" class="form-control" name="subsidiary_id" >
											<option value="">Main company</option>
										</select>
								</div>
                            </div>
							<div class="form-group">
								<div class="col-md-12">
                                    <label>Location:</label>
                                    <input id="editTicketLocationInput" type="text" name="ticket_location" class="form-control" />
                                </div>
							</div>
                            <div class="form-group">
                                <div class="col-md-8">
									<label>Assign to: <span class="text-danger">*</span></label>
									<select id="editTicketEmployeeSelect" class="form-control" name="assign_to[]" multiple required>
										
									</select>
								</div>
                                <div class="col-md-4">
                                    <label>Type: <span class="text-danger">*</span></label>
                                    <select id="editTicketTypeSelect" name="ticket_type" class="form-control" required>
                                    </select>
                                </div>
                            </div>
                        </fieldset>
                        <fieldset>
                            <legend>Billing</legend>
                            <div class="form-group">
                                    <div class="col-md-4">
                                        <label>Billing from date: </label>
                                        <div class="input-group ticket-date-picker">
                                            <input id="editTicketStartDateInput" type="text" name="billing_fromdate" class="form-control" placeholder="Choose a date" />
                                            <span class="input-group-addon btn bg-primary">
                                                <span class="fa fa-calendar text-white"></span>
                                            </span>                    
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <label>Billing from time: </label>
                                        <div class="input-group ticket-time-picker">
                                            <input id="editTicketStartTimeInput" type="text" name="billing_fromtime" class="form-control" placeholder="Time" />
                                            <span class="input-group-addon btn bg-primary">
                                                <span class="fa fa-clock text-white"></span>
                                            </span>                    
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <label>Billing to date: </label>
                                        <div class="input-group ticket-date-picker">
                                            <input id="editTicketEndDateInput" type="text" name="billing_todate" class="form-control"  placeholder="Choose a date" />
                                            <span class="input-group-addon btn bg-primary">
                                                <span class="fa fa-calendar text-white"></span>
                                            </span>                    
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <label>Billing to time: </label>
                                        <div class="input-group ticket-time-picker">
                                            <input id="editTicketEndTimeInput" type="text" name="billing_totime" class="form-control"  placeholder="Time" />
                                            <span class="input-group-addon btn bg-primary">
                                                <span class="fa fa-clock text-white"></span>
                                            </span>                    
                                        </div>
                                    </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-6">
                                    <label>Billing notes:</label>
                                    <textarea id="editTicketBillingNotesInput" class="form-control" name="billing_notes" placeholder="Enter billing notes here" rows="4"></textarea>
                                </div>
                                <div class="col-md-6">
                                    <label>General notes:</label>
                                    <textarea id="editTicketNotesInput" class="form-control" name="ticket_notes" placeholder="Enter general notes here" rows="4"></textarea>
                                </div>
                            </div>
							<div class="form-group">
								<div class="col-md-12">
									<label><i class="fas fa-paperclip text-primary"></i> Attachments</label><br>
									<ul id="editTicketFiles" class="attached-document clearfix m-0">
									</ul>
									<span class="btn btn-link p-0 fileinput-button">
									<span>Attach a file</span>
										<!-- The file input field used as target for the file upload widget -->
										<input id="editTicketFileUpload" type="file" name="file" multiple>
									</span>
								</div>
							</div>
                        </fieldset>
                </div>
                <div class="panel-footer">
                        <button class="btn btn-primary">Edit ticket</button>
                        <button type="button" class="btn btn-white pull-right" onClick="hideEditTicketPopup()">Cancel</button>
                    </form> 
                </div>
            </div>
        </div>
        <div class="phone-panel">
            <div class="phone-panel-content">
                <div class="card">
					<div class="card-block">
						<h4 class="card-title m-t-0"><i class="fa fa-phone text-success"></i>&nbsp;Incoming call</h4>
						<p class="card-text f-s-14 text-muted" id="phone-panel-from"></p>
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
	<!-- ================== END BASE JS ================== -->
	
	<!-- ================== BEGIN PAGE LEVEL JS ================== -->
		<script src="<?= JS_URL . "apps.min.js" ?>"></script>
	<!-- ================== END PAGE LEVEL JS ================== -->
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

	<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/js/bootstrap-datetimepicker.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/css/bootstrap-datetimepicker.min.css" rel="stylesheet"/>
	<script src="<?= JS_URL . "timedisplay.js" ?>"></script>
	<script src="<?= JS_URL . "inactivity.js" ?>"></script>
	<script src="<?= ASSETS_URL . "telinput/build/js/intlTelInput.min.js" ?>"></script>
	<script src="<?= ASSETS_URL . "telinput/build/js/utils.js" ?>"></script>
	<script src="<?= ASSETS_URL . "select2/dist/js/select2.full.min.js" ?>"></script>
	<script src="<?= ASSETS_URL . "morris/raphael.min.js" ?>"></script>
    <script src="<?= ASSETS_URL . "morris/morris.js" ?>"></script>
	<script src="<?= ASSETS_URL . "jquery-tag-it/js/tag-it.min.js" ?>"></script>
	<script src="<?= ASSETS_URL . "tinymce/js/tinymce/tinymce.min.js" ?>"></script>
	<script src="<?= ASSETS_URL . "jquery-file-upload/js/jquery.fileupload.js" ?>"></script>
    
    <script>
        var loggedEmployee = <?php echo json_encode($_SESSION["id"]); ?>;
		var isAdmin = <?php echo json_encode($_SESSION["admin"]); ?>;
		
		var dateformat = <?php echo json_encode($_SESSION["dateformat"]); ?>;
		var timeformat = <?php echo json_encode($_SESSION["timeformat"]); ?>;
		
        var ticketsTable; 
		var categoriesTable;
        var geocoder;
        
        var customersArray = [];
		var subsidiariesArray = [];
        var ticketArray = [];
		var emailArray;
        
        var firstPageLoad = true;
		
		var hideInactive = true;
		
		var employeeArray = [];
		var ticketFiles = [];
		var editTicketFiles = [];
		
		var displayChanged = false;
        
        $(document).ready(function() {
			getMenuStatistics(loggedEmployee);
			getCustomers();
			getEmployees();
			getCategories();
			getSubsidiaries();
			
			setInterval(function(){
				getTickets();
			}, 60000);
			
			tinymce.init({
                selector: 'textarea#emailMessageInput',
                menubar: false,
                min_height: 400,
                convert_urls: false,
                setup: function (editor) {
                    editor.on('change', function () {
                        editor.save();
                    });
                }
            });
			
			
			$('#ticketFileUpload').fileupload({
               url: "tickets/upload",
               dataType : 'json',
               add : function(e,data){
                    $.each(data.files, function (index, file) {
						$("#ticketFiles").append('<li class="fa-file">' +
											'<div class="document-file">' +
												'<a href="' + "<?= UPLOADS_URL ?>" + "OtherFiles/" + file.name + '" download="' + file.name  + '" ><i class="fa fa-file-image"></i></a>' +
											'</div>' +
											'<div class="document-name"><a href="' + "<?= UPLOADS_URL ?>" + "OtherFiles/" + file.name  + '" download="' + file.name  + '" >' + file.name  + '</a></div>' +
										'</li>');
                    });
					$("#addTicketBtn").html('<i class="fa fa-spinner fa-spin"></i> Uploading file...');
                    $("#addTicketBtn").prop("disabled", true);
                    data.submit();
               },
               
               done: function(e,data){
                   if (!data.result.error){
                       ticketFiles.push(data.result.filename);
                   }else{
					   swal(
							'Error!',
							'The server encountered the following error: ' + data.result.message,
							'error'
						);
                   }
				   $("#addTicketBtn").html("Create ticket");
                   $("#addTicketBtn").prop("disabled", false);
               }
            });
            
            $('#editTicketFileUpload').fileupload({
               url: "ticket/upload",
               dataType : 'json',
               add : function(e,data){
                    $.each(data.files, function (index, file) {
                        $("#editTicketFiles").append('<li class="fa-file">' +
											'<div class="document-file">' +
												'<a href="' + "<?= UPLOADS_URL ?>" + "OtherFiles/" + file.name + '" download="' + file.name  + '" ><i class="fa fa-file-image"></i></a>' +
											'</div>' +
											'<div class="document-name"><a href="' + "<?= UPLOADS_URL ?>" + "OtherFiles/" + file.name  + '" download="' + file.name  + '" >' + file.name  + '</a></div>' +
										'</li>');
                    });
					$("#editTicketBtn").html('<i class="fa fa-spinner fa-spin"></i> Uploading file...');
                    $("#editTicketBtn").prop("disabled", true);
                    data.submit();
               },
               
               done: function(e,data){
                   if (!data.result.error){
                       editTicketFiles.push(data.result.filename);
                   }else{
                       swal(
							'Error!',
							'The server encountered the following error: ' + data.result.message,
							'error'
						);
                   }
				   $("#editTicketBtn").html('Edit ticket');
                   $("#editTicketBtn").prop("disabled", false);
               }
            });
			
			$("#email-to").tagit({
                beforeTagAdded: function(event, ui) {
                    return isEmail(ui.tagLabel);
                }
            });
			
			$(window).on('unload', function( event ) {
                if (currentMail != null && currentMail.employee_id == loggedEmployee){
                    markEmailAsOpened(0);
                }
            });
            
            $(window).on('beforeunload', function (){
                if (currentMail != null && currentMail.employee_id == loggedEmployee){
                    markEmailAsOpened(0);
                }
            });
			
			$(document).on("click", '[data-click="add-cc"]', function(a) {
				a.preventDefault();
				var t = $(this).attr("data-name"),
					l = "email-cc-" + t,
					n = '\t<div class="email-to">\t\t<label class="control-label">' + t + ':</label>\t\t<ul id="' + l + '" class="primary line-mode"></ul>\t</div>';
				$('[data-id="extra-cc"]').append(n), $("#" + l).tagit({
					beforeTagAdded: function(event, ui) {
						return isEmail(ui.tagLabel);
					}
				}), $(this).remove()
			});
			
			$("input[type=radio][name=hide_inactive]").change(function(){
				var selectedValue = $(this).val();

				if (selectedValue == 1){
					hideInactive = false;
				}else{
					hideInactive = true;
				}
				displayChanged = true;
				getTickets();
			});
			
			$(".ticket-date-picker").datetimepicker({format: dateformat,
				allowInputToggle: true,
				widgetPositioning: {
							horizontal: 'right',
							vertical: 'auto'
				} 
			});
			$(".ticket-time-picker").datetimepicker({format: timeformat,
				stepping: 5,
				allowInputToggle: true,
				widgetPositioning: {
						horizontal: 'right',
						vertical: 'auto'
				}
			});
			
			$("#ticketCustomerSelect, #editTicketCustomerSelect, #ticketSubsidiarySelect, #editTicketSubsidiarySelect, #ticketEmployeeSelect, #editTicketEmployeeSelect").select2({width: "100%"});
			
			$('#newCategoryForm').on('submit', function(e) { //use on if jQuery 1.7+
                e.preventDefault();
                $.ajax({
                    type: "POST",
                    url: "<?= BASE_URL ?>" + "ticketcategory/add",
                    data: $("#newCategoryForm").serialize(),
                    success: function(msg) {
                        if (msg == ""){
                            swal(
                                'Status update',
                                'Category added.',
                                'success'
                            );
                            getCategories();
                            hideNewCategoryPopup();
                        }else {
                            swal(
                                'Error!',
                                'The server encountered the following error: ' + msg,
                                'error'
                            );
                        }
                    }
                });
            });
			
			$('#emailSetupForm').on('submit', function(e) { //use on if jQuery 1.7+
                e.preventDefault();
                $.ajax({
                    type: "POST",
                    url: "<?= BASE_URL ?>" + "telephony/emailsetup",
                    data: $("#emailSetupForm").serialize(),
                    success: function(msg) {
                        if (msg == "OK"){
                            location.reload();
                        }else {
                            swal(
                                'Error!',
                                'The server encountered the following error: ' + msg,
                                'error'
                            );
                        }
                    }
                });
            });
			
			$('#editCategoryForm').on('submit', function(e) { //use on if jQuery 1.7+
                e.preventDefault();
                $.ajax({
                    type: "POST",
                    url: "<?= BASE_URL ?>" + "ticketcategory/edit",
                    data: $("#editCategoryForm").serialize(),
                    success: function(msg) {
                        if (msg == ""){
                            swal(
                                'Status update',
                                'Category edited.',
                                'success'
                            );
                            getCategories();
                            hideEditCategoryPopup();
                        }else {
                            swal(
                                'Error!',
                                'The server encountered the following error: ' + msg,
                                'error'
                            );
                        }
                    }
                });
            });
			
			$('#finishEmailForm').on('submit', function(e) { //use on if jQuery 1.7+
                e.preventDefault();
                var postData = { "email_id": currentMail.email_id, "notes": $("#emailCommentInput").val(), "status": 2 };
                $.ajax({
                    type: "POST",
                    url: "<?= BASE_URL ?>" + "telephony/emailRead",
                    data: postData,
                    success: function(msg) {
                        if (msg == ""){
                            swal(
                                'Status update',
                                'E-mail is now marked as - PROCESSED.',
                                'success'
                            );
                            refreshEmails(false);
                            hideEmailContent();
                        }else {
                            swal(
                                'Error!',
                                'The server encountered the following error: ' + msg,
                                'error'
                            );
                        }
                    }
                });
            });
			
			
			
			$('#newTicketForm').on('submit', function(e) { //use on if jQuery 1.7+
                e.preventDefault();
				var postData = $("#newTicketForm").serializeArray();
				postData.push({ name: 'files', value: ticketFiles });
                $.ajax({
                    type: "POST",
                    url: "<?= BASE_URL ?>" + "telephony/addticket",
                    data: postData,
                    success: function(response) {
                        if (response == ""){
                            swal(
                                'Success!',
                                'Ticket was successfully added.',
                                'success'
                            );
							refreshEmails(false);
                            getTickets();
							if (currentMail != null){
								updateEmailTickets();
							}
                            hideNewTicketPopup();
                        }else{
                            swal(
                                'Error!',
                                'The server encountered the following error: ' + response,
                                'error'
                            );
                        }
                    }
                });
		    });
		    
		    $('#editTicketForm').on('submit', function(e) { //use on if jQuery 1.7+
                e.preventDefault();
				var postData = $("#editTicketForm").serializeArray();
				postData.push({ name: 'files', value: editTicketFiles });
                $.ajax({
                    type: "POST",
                    url: "<?= BASE_URL ?>" + "telephony/editticket",
                    data: postData,
                    success: function(response) {
                        if (response == ""){
                            swal(
                                'Success!',
                                'Ticket was successfully edited.',
                                'success'
                            );
                            getTickets();
                            hideEditTicketPopup();
                        }else{
                            swal(
                                'Error!',
                                'The server encountered the following error: ' + response,
                                'error'
                            );
                        }
                    }
                });
		    });
			
			$('#exchangeForm').on('submit', function(e) { //use on if jQuery 1.7+
                e.preventDefault();
                $.ajax({
                    type: "POST",
                    url: "employee/exchange",
                    data: $("#exchangeForm").serialize(),
                    success: function(msg) {
                        if (msg == "OK") {
                            location.reload();
                        } else {
                            swal(
                                'Error!',
                                'The credentials you\'ve entered are invalid, please try again.',
                                'error'
                            );
                        }
                    }
                });
            });
			
			$('#ticketCustomerSelect').on('change', function() {
                  var customer_id = this.value;
				  if (customer_id != ""){
					  for (var i = 0; i < customersArray.length; i++){
						  var curCustomer = customersArray[i];
						  if (curCustomer.customer_id == customer_id){
							$("#newTicketLatitudeInput").val(curCustomer.latitude);
							$("#newTicketLongitudeInput").val(curCustomer.longitude);
							$("#ticketLocationInput").val(curCustomer.customer_address);
							$("#ticketSubsidiarySelect").html("");
							$("#ticketSubsidiarySelect").append($('<option>', {
								value: "",
								text: "Main company"
							}));
							for (var j = 0; j < subsidiariesArray.length; j++){
								var subsidiary = subsidiariesArray[j];
								if (subsidiary.customer_id == curCustomer.customer_id){
									$("#ticketSubsidiarySelect").append($('<option>', {
										value: subsidiary.subsidiary_id,
										text: subsidiary.subsidiary_name
									}));
								}
							}
							break;
						  }
					  }
				  }else{
					  $("#ticketSubsidiarySelect").html("");
					  $("#ticketSubsidiarySelect").append($('<option>', {
								value: "",
								text: "Main company"
					  }));
				  }
            });
			
			$("#ticketSubsidiarySelect").on("change", function(){
				var subsidiary_id = this.value;
				if (subsidiary_id != ""){
					for (var i = 0; i < subsidiariesArray.length; i++){
						var subsidiary = subsidiariesArray[i];
						if (subsidiary.subsidiary_id == subsidiary_id){
							$("#newTicketLatitudeInput").val(subsidiary.latitude);
							$("#newTicketLongitudeInput").val(subsidiary.longitude);
							$("#ticketLocationInput").val(subsidiary.subsidiary_address);
							break;
						}
					}
				}else{
					$("#ticketCustomerSelect").trigger("change");
				}
			});
			
			$('#editTicketCustomerSelect').on('change', function() {
                  var customer_id = this.value;
				  if (customer_id != ""){
					  for (var i = 0; i < customersArray.length; i++){
						  var curCustomer = customersArray[i];
						  if (curCustomer.customer_id == customer_id){
							$("#editTicketLatitudeInput").val(curCustomer.latitude);
							$("#editTicketLongitudeInput").val(curCustomer.longitude);
							$("#editTicketLocationInput").val(curCustomer.customer_address);
							$("#editTicketSubsidiarySelect").html("");
							$("#editTicketSubsidiarySelect").append($('<option>', {
								value: "",
								text: "Main company"
							}));
							for (var j = 0; j < subsidiariesArray.length; j++){
								var subsidiary = subsidiariesArray[j];
								if (subsidiary.customer_id == curCustomer.customer_id){
									$("#editTicketSubsidiarySelect").append($('<option>', {
										value: subsidiary.subsidiary_id,
										text: subsidiary.subsidiary_name
									}));
								}
							}
							break;
						  }
					  }
				  }else{
					  $("#editTicketSubsidiarySelect").html("");
					  $("#editTicketSubsidiarySelect").append($('<option>', {
								value: "",
								text: "Main company"
					  }));
				  }
            });
			
			$("#editTicketSubsidiarySelect").on("change", function(){
				var subsidiary_id = this.value;
				if (subsidiary_id != ""){
					for (var i = 0; i < subsidiariesArray.length; i++){
						var subsidiary = subsidiariesArray[i];
						if (subsidiary.subsidiary_id == subsidiary_id){
							$("#editTicketLatitudeInput").val(subsidiary.latitude);
							$("#editTicketLongitudeInput").val(subsidiary.longitude);
							$("#editTicketLocationInput").val(subsidiary.subsidiary_address);
							break;
						}
					}
				}else{
					$("#editTicketCustomerSelect").trigger("change");
				}
			});
			
        });
		
		function useEmail(email_to_use){
			var postData = { "telephony_email": email_to_use };
			$.ajax({
                type: "POST",
                url: "<?= BASE_URL ?>" + "employee/telephonyemail",
                data: postData,
                success: function(response) {
					console.log(response);
					if (response == ""){
						location.reload();
					}else{
						swal(
                            'Error!',
                            'The server encountered the following error: ' + response,
                            'error'
                        );
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
		
		function initMap(){
			var ticketSearchBox = new google.maps.places.SearchBox(document.getElementById('ticketLocationInput'));
			var editTicketSearchBox = new google.maps.places.SearchBox(document.getElementById('editTicketLocationInput'));
                    
			google.maps.event.addListener(ticketSearchBox, 'places_changed', function() {
                var places = ticketSearchBox.getPlaces();
                var i, place;
                for (i = 0; place = places[i]; i++) {
                    (function(place) {
                        var location = place.geometry.location;
                        $("#newTicketLatitudeInput").val(location.lat());
                        $("#newTicketLongitudeInput").val(location.lng());
                    }(place));
                }
            });
			
			google.maps.event.addListener(editTicketSearchBox, 'places_changed', function() {
                var places = editTicketSearchBox.getPlaces();
                var i, place;
                for (i = 0; place = places[i]; i++) {
                    (function(place) {
                        var location = place.geometry.location;
                        $("#editTicketLatitudeInput").val(location.lat());
                        $("#editTicketLongitudeInput").val(location.lng());
                    }(place));
                }
            });
            
            geocoder = new google.maps.Geocoder;
		}
		
		function showEmailSetupPopup(){
			$("#setupPopup, #emailSetupDIV").show();
		}

		function hideEmailSetupPopup(){
			$("#setupPopup, #emailSetupDIV").hide();
		}
		
		function getCategories(){
			$.ajax({
                type: "POST",
                url: "<?= BASE_URL ?>" + "ticketcategory/get",
                data: null,
                dataType: "json",
                success: function(categories) {
					if (categoriesTable != null){
							categoriesTable.clear().rows.add(categories).draw(false);
							$("#ticketTypeSelect, #editTicketTypeSelect").html("");
							$("#ticketTypeSelect, #editTicketTypeSelect").append($('<option>', {
									value: "",
									text: "Choose a type"
								}));
							for (var i = 0; i < categories.length; i++){
								$("#ticketTypeSelect, #editTicketTypeSelect").append($('<option>', {
									value: categories[i].category_id,
									text: categories[i].category_name
								}));
							}
					}else{	
								categoriesTable = $('#categoriesTable').DataTable( {
									"aaData": categories,
									"columns": [
										{ "data": "category_name" },
										{ "defaultContent": '<span data-toggle="tooltip" title="Edit category" onClick="showEditCategoryPopup(this)" class="text-primary pointer pull-left"><i class="fas fa-pencil-alt"></i></span>' }
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
						$("#ticketTypeSelect, #editTicketTypeSelect").html("");
						$("#ticketTypeSelect, #editTicketTypeSelect").append($('<option>', {
								value: "",
								text: "Choose a type"
							}));
						for (var i = 0; i < categories.length; i++){
							$("#ticketTypeSelect, #editTicketTypeSelect").append($('<option>', {
								value: categories[i].category_id,
								text: categories[i].category_name
							}));
						}
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
                    var lastDepartment = null;
                    for (var i = 0; i < employees.length; i++){
                            if (lastDepartment == null){
                                $("#ticketEmployeeSelect, #editTicketEmployeeSelect").append("<optgroup label='" + employees[i].department_name + "'>");
                                lastDepartment = employees[i].department_name;
                            }else if (employees[i].department_name != lastDepartment){
                                $("#ticketEmployeeSelect, #editTicketEmployeeSelect").append("</optgroup><optgroup label='" + employees[i].department_name + "'>");
                                lastDepartment = employees[i].department_name;
                            }
                            $("#ticketEmployeeSelect, #editTicketEmployeeSelect").append($('<option>', {
                                value: employees[i].employee_id,
                                text: employees[i].employee_name + " " + employees[i].employee_surname
                            }));
                    }
                    $("#ticketEmployeeSelect, #editTicketEmployeeSelect").append("</optgroup>");
					getTickets();
                }
            });
        }
		
		function getCustomers(){
            $.ajax({
                type: "POST",
                url: "<?= BASE_URL ?>" + "customer/get",
                data: null,
                dataType: "json",
                success: function(customers) {
                    customersArray = customers;
                    for (var i = 0; i < customers.length; i++){
                        $("#ticketCustomerSelect, #editTicketCustomerSelect").append($('<option>', {
                                value: customers[i].customer_id,
                                text: customers[i].customer_name
                        }));
                    }
                }
            });
        }
		
		function showNewCategoryPopup(){
			hideNewTicketPopup();
			$("#ticketCategoryPopup, #newCategoryDIV").show();
		}
		
		function hideNewCategoryPopup(){
			$("#ticketCategoryPopup, #newCategoryDIV").hide();
		}
		
		function showEditCategoryPopup(row){
			var actualRow = $(row).parents('tr');
			if (actualRow.hasClass('child')) {//Check if the current row is a child row
				actualRow = actualRow.prev();//If it is, then point to the row before it (its 'parent')
			}
            var category = categoriesTable.row(actualRow).data();
			$("#hiddenEditCategoryIDInput").val(category.category_id);
			$("#editCategoryNameInput").val(category.category_name);
			$("#ticketCategoryPopup, #editCategoryDIV").show();
		}
		
		function hideEditCategoryPopup(){
			$("#ticketCategoryPopup, #editCategoryDIV").hide();
		}
		
		
		
		function deleteEmail(item, index){
			var email = emailArray[index];
			swal({
				title: "Deletion confirmation",
                text: 'Are you sure you want to delete this e-mail?',
                type: 'error',
                showCancelButton: true,
                cancelButtonColor: '#d33',
                cancelButtonText: "Cancel",
                confirmButtonText: 'Delete e-mail'
                }).then(function () {
                    var postData = { "mail_id": email.mail_id };
					$.ajax({
						type: "POST",
						url: "<?= BASE_URL ?>" + "email/delete",
						data: postData,
						success: function(response) {
							if (response == ""){
								swal(
									'Delete completed',
									'E-mail was successfully deleted',
									'success'
								);
								refreshEmails(false);
							}else{
								swal(
									'Error',
									'There was an unexpected error ' + response,
									'error'
								);
							}
						}
					});
                });
		}

		function isEmail(email) {
            var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
            return regex.test(email);
        }
		
		function markTicketAsFinished(row){
			var actualRow = $(row).parents('tr');
			if (actualRow.hasClass('child')) {//Check if the current row is a child row
				actualRow = actualRow.prev();//If it is, then point to the row before it (its 'parent')
			}
            var ticket = ticketsTable.row(actualRow).data();
            swal({
              title: 'Confirm action',
              text: "Mark this ticket as finished?",
              type: 'info',
              showCancelButton: true,
              confirmButtonColor: '#3085d6',
              cancelButtonColor: '#d33',
              confirmButtonText: 'Mark as finished'
            }).then(function () {
                var postData = { ticket_id: ticket.ticket_id, ticket_status: 2 };
                $.ajax({
                    type: "POST",
                    url: "<?= BASE_URL ?>" + "ticket/status",
                    data: postData,
                    success: function(msg) {
                        if (msg == "") {
                            swal(
                                'Success!',
                                'Ticket is now marked as finished.',
                                'success'
                            );
                            getTickets();
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
        
        function markTicketAsCanceled(row){
            var actualRow = $(row).parents('tr');
			if (actualRow.hasClass('child')) {//Check if the current row is a child row
				actualRow = actualRow.prev();//If it is, then point to the row before it (its 'parent')
			}
            var ticket = ticketsTable.row(actualRow).data();
            swal({
              title: 'Confirm action',
              text: "Mark this ticket as canceled?",
              type: 'info',
              showCancelButton: true,
              confirmButtonColor: '#3085d6',
              cancelButtonColor: '#d33',
              confirmButtonText: 'Mark as canceled'
            }).then(function () {
                var postData = { ticket_id: ticket.ticket_id, ticket_status: 4 };
                $.ajax({
                    type: "POST",
                    url: "<?= BASE_URL ?>" + "ticket/status",
                    data: postData,
                    success: function(msg) {
                        if (msg == "") {
                            swal(
                                'Success!',
                                'Ticket is now marked as canceled.',
                                'success'
                            );
                            getTickets();
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
		
		function viewTicketCustomer(row){
			var actualRow = $(row).parents('tr');
			if (actualRow.hasClass('child')) {//Check if the current row is a child row
				actualRow = actualRow.prev();//If it is, then point to the row before it (its 'parent')
			}
            var customer = ticketsTable.row(actualRow).data();
            var url = "<?= BASE_URL ?>" + "customerdetails?customer_id=" + customer.customer_id;
		    window.open(url, "_blank");
        }
		
		function showNewBlankTicketPopup(){
			$("#ticketEmployeeSelect").val("").trigger("change");
			$("#ticketCustomerSelect").val("").trigger("change");
			$("#ticketDateInput").val(moment().format(dateformat));
            $("#ticketPopupDIV, #newTicketDIV").show();
        }
        
        function showEditTicketPopup(row){
			var actualRow = $(row).parents('tr');
			if (actualRow.hasClass('child')) {//Check if the current row is a child row
				actualRow = actualRow.prev();//If it is, then point to the row before it (its 'parent')
			}
            var ticket = ticketsTable.row(actualRow).data();
			if (ticket.opened_on == ""){ //if it's the first time we're opening this ticket, mark down the date for SLA reports
				markTicketAsOpened(ticket.ticket_id);
			}
            $("#editTicketIDInput").val(ticket.ticket_id);
            $("#editTicketCodeInput").val(ticket.ticket_code);
            $("#editTicketSubjectInput").val(ticket.ticket_subject);
            $("#editTicketDateInput").val(moment(ticket.ticket_date).format(dateformat));
            $("#editTicketForm input[name=ticket_priority]").val([ticket.ticket_priority]);
            $("#editTicketCustomerSelect").val(ticket.customer_id).trigger("change");
			$("#editTicketSubsidiarySelect").val(ticket.subsidiary_id).trigger("change");
            $("#editTicketEmployeeSelect").val(ticket.assigned_to.split(",")).trigger("change");
            $("#editTicketLocationInput").val(ticket.ticket_location);
            $("#editTicketLatitudeInput").val(ticket.latitude);
            $("#editTicketLongitudeInput").val(ticket.longitude);
            $("#editTicketTypeSelect").val(ticket.ticket_type);
            if (ticket.billing_fromdate != ""){
				$("#editTicketStartDateInput").val(moment(ticket.billing_fromdate).format(dateformat));
			}
			if (ticket.billing_fromtime != ""){
				$("#editTicketStartTimeInput").val(moment(ticket.billing_fromdate + " " + ticket.billing_fromtime).format(timeformat));
			}
			if (ticket.billing_todate != ""){
				$("#editTicketEndDateInput").val(moment(ticket.billing_todate).format(dateformat));
			}
			if (ticket.billing_totime != ""){
				$("#editTicketEndTimeInput").val(moment(ticket.billing_todate + " " + ticket.billing_totime).format(timeformat));
			}
            $("#editTicketBillingNotesInput").html(ticket.billing_notes);
            $("#editTicketNotesInput").html(ticket.ticket_notes);
            $("#editTicketForm input[name=ticket_status]").val([ticket.ticket_status]);
			var fileContent = "";
            var files = ticket.ticket_files.split(";");
            for (var i = 0; i < files.length; i++){
                if (files[i] != ""){
                    fileContent += '<li class="fa-file">' +
										'<div class="document-file">' +
										   	'<a href="' + "<?= UPLOADS_URL ?>" + "OtherFiles/" + files[i] + '" download="' + files[i] + '" ><i class="fa fa-file-image"></i></a>' +
										'</div>' +
										'<div class="document-name"><a href="' + "<?= UPLOADS_URL ?>" + "OtherFiles/" + files[i] + '" download="' + files[i] + '" >' + files[i] + '</a></div>' +
									'</li>';
                }
            }
			$("#editTicketFiles").html(fileContent);
            $("#ticketPopupDIV, #editTicketDIV").show();
        }
		
		function markTicketAsOpened(ticket_id){
			var postData = { "ticket_id": ticket_id };
            $.ajax({
                type: "POST",
                url: "<?= BASE_URL ?>" + "ticket/opened",
                data: postData,
                success: function(msg) {
                    console.log("Ticket opened" + msg);
                }
            });
		}
        
        function viewTicket(ticket_id){
            var ticket;
            for (var i = 0; i < ticketArray.length; i++){
                if (ticketArray[i].ticket_id == ticket_id){
                    ticket = ticketArray[i];
                    break;
                }
            }
            var url = "<?= BASE_URL ?>" + "ticketdetails?ticket_id=" + ticket.ticket_id;
		    window.open(url, "_blank");
        }
        
        function hideEditTicketPopup(){
			$("#editTicketForm")[0].reset();
			editTicketFiles = [];
			$("#editTicketFiles").html("");
            $("#ticketPopupDIV, #editTicketDIV").hide();
        }
        
        function showNewTicketPopup(row){
			var actualRow = $(row).parents('tr');
			if (actualRow.hasClass('child')) {//Check if the current row is a child row
				actualRow = actualRow.prev();//If it is, then point to the row before it (its 'parent')
			}
            var call = allCallsTable.row(actualRow).data();
            var customer_id = call.customer_id;
			$("#ticketEmployeeSelect").val("").trigger("change");
			$("#ticketCustomerSelect").val("").trigger("change");
            if (customer_id != 0 && customer_id != null){
                var customer;
                for (var i = 0; i < customersArray.length; i++){
                    if (customersArray[i].customer_id == customer_id){
                        customer = customersArray[i];
                        break;
                    }
                }
                $("#ticketEmployeeSelect").val(customer.employee_id).trigger("change");
				$("#ticketCustomerSelect").val(customer_id).trigger("change");
            }
            $("#newTicketCallIDInput").val(call.call_id);
			$("#ticketDateInput").val(moment().format(dateformat));
            $("#ticketPopupDIV, #newTicketDIV").show();
        }
        
		function showNewTicketPopupToday(row){
			var actualRow = $(row).parents('tr');
			if (actualRow.hasClass('child')) {//Check if the current row is a child row
				actualRow = actualRow.prev();//If it is, then point to the row before it (its 'parent')
			}
            var call = callTable.row(actualRow).data();
            var customer_id = call.customer_id;
			$("#ticketEmployeeSelect").val("").trigger("change");
			$("#ticketCustomerSelect").val("").trigger("change");
            if (customer_id != 0 && customer_id != null){
                var customer;
                for (var i = 0; i < customersArray.length; i++){
                    if (customersArray[i].customer_id == customer_id){
                        customer = customersArray[i];
                        break;
                    }
                }
                $("#ticketEmployeeSelect").val(customer.employee_id).trigger("change");
				$("#ticketCustomerSelect").val(customer_id).trigger("change");
            }
            $("#newTicketCallIDInput").val(call.call_id);
			$("#ticketDateInput").val(moment().format(dateformat));
            $("#ticketPopupDIV, #newTicketDIV").show();
		}
		
        function hideNewTicketPopup(){
            $("#newTicketForm")[0].reset();
			ticketFiles = [];
			$("#ticketFiles").html("");
            $("#ticketPopupDIV, #newTicketDIV").hide();
        }
	
		function getTickets(){
			if (isAdmin == 1){
					$.ajax({
						type: "POST",
						url: "<?= BASE_URL ?>" + "telephony/gettickets",
						data: null,
						dataType: "json",
						success: function(tickets) {
							ticketArray = tickets;
							if (ticketsTable != null){
								if (hideInactive){
									var activeTickets = [];
									for (var i = 0; i < tickets.length; i++){
										if (tickets[i].ticket_status < 2){
											activeTickets.push(tickets[i]);
										}
									}
									ticketsTable.clear().rows.add(activeTickets).draw(false);
								}else{
									ticketsTable.clear().rows.add(tickets).draw(false);
								}
								if (displayChanged){
									ticketsTable.columns([1,2,4,5,6,7,10]).every( function (index) {
												var column = this;
												var name;
												if (index == 1){
													name = "Priority";
												}else if (index == 2){
													name = "Type";
												}else if (index == 4){
													name = "Customer";
												}else if (index == 5){
													name = "Subsidiary";
												}else if (index == 6){
													name = "Assigned to";
												}else if (index == 7){
													name = "Created by";
												}else{
													name = "Status";
												}
												var select = $(name + '<br><select id="ticketSelect' + index + '"><option value="">No filter</option></select>')
													.appendTo( $(column.header()).empty())
													.on( 'change', function () {
														var val = $(this).val();
														val = $('<div/>').html(val).text();
														column
															.search(val, true, false )
															.draw();
													});
												if (index != 6){
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
									ticketsTable.search('').columns().search('').draw(false);
									displayChanged = false;
								}
							}else{
								var activeTickets = [];
								for (var i = 0; i < tickets.length; i++){
									if (tickets[i].ticket_status < 2){
										activeTickets.push(tickets[i]);
									}
								}
								ticketsTable = $('#ticketsTable').DataTable( {
									initComplete: function () {
										this.api().columns([1,2,4,5,6,7,10]).every( function (index) {
											var column = this;
											var name;
											if (index == 1){
												name = "Priority";
											}else if (index == 2){
												name = "Type";
											}else if (index == 4){
												name = "Customer";
											}else if (index == 5){
												name = "Subsidiary";
											}else if (index == 6){
												name = "Assigned to";
											}else if (index == 7){
												name = "Created by";
											}else{
												name = "Status";
											}
											var select = $(name + '<br><select id="ticketSelect' + index + '"><option value="">No filter</option></select>')
												.appendTo( $(column.header()).empty())
												.on( 'change', function () {
													var val = $(this).val();
													val = $('<div/>').html(val).text();
													column
														.search(val, true, false )
														.draw();
												});
											if (index != 6){
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
									"aaData": activeTickets,
									"columns": [
										{ "data": "ticket_subject" },
										{ "data": "ticket_priority" },
										{ "data": "category_name" },
										{ "data": "ticket_date" },
										{ "data": "customer_name" },
										{ "data": "subsidiary_name" },
										{ "data": "assigned_to" },
										{ "data": "employee_id" },
										{ "data": "created_on" },
										{ "data": "last_modified" },
										{ "data": "ticket_status" },
										{ "defaultContent": '' }
									],
									"columnDefs": [
										{
											// The `data` parameter refers to the data for the cell (defined by the
											// `data` option, which defaults to the column being worked with, in
											// this case `data: 0`.
											"render": function ( data, type, row ) {
												if (data == "Low"){
													return "<label class='label label-success'>" + data + "</label>";
												}else if (data == "Normal"){
													return "<label class='label label-primary'>" + data + "</label>";
												}else{
													return "<label class='label label-danger'>" + data + "</label>";
												}
											},
											"targets": 1,
											"orderable": false
										},
										{
											"targets": 2,
											orderable: false
										},
										{
											// The `data` parameter refers to the data for the cell (defined by the
											// `data` option, which defaults to the column being worked with, in
											// this case `data: 0`.
											"render": function ( data, type, row ) {
												if (type === 'display' || type === 'filter'){
													return moment(data).format(dateformat);
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
												return "<span class='text-primary hover-underline text-ellipsis' onClick='viewTicketCustomer(this)'>" + row.customer_name + "</span>";
											},
											"targets": 4,
											orderable: false
										},
										{
											"render": function(data, type, row) {
												if (data != null){
													return data;
												}else{
													return "Main company";
												}
											},
											"targets": 5,
											orderable: false
										},
										{
											"render": function(data, type, row) {
												return getEmployeeString(data);
											},
											"targets": 6,
											orderable: false
										},
										{
											// The `data` parameter refers to the data for the cell (defined by the
											// `data` option, which defaults to the column being worked with, in
											// this case `data: 0`.
											"render": function(data, type, row) {
												return "<a class='text-primary hover-underline' href='employeepage?employee_id=" + data + "' target='_blank'>"  + row.employee_name + " " + row.employee_surname + "</a>";
											},
											"targets": 7,
											"orderable": false
										},
										{
											// The `data` parameter refers to the data for the cell (defined by the
											// `data` option, which defaults to the column being worked with, in
											// this case `data: 0`.
											"render": function ( data, type, row ) {
												if (type === 'display' || type === 'filter'){
													return moment(data).format(dateformat + ", " + timeformat);
												}else{
													return data;
												}
											},
											"targets": 8
										},
										{
											// The `data` parameter refers to the data for the cell (defined by the
											// `data` option, which defaults to the column being worked with, in
											// this case `data: 0`.
											"render": function ( data, type, row ) {
												if (type === 'display' || type === 'filter'){
													return moment(data).format(dateformat + ", " + timeformat);
												}else{
													return data;
												}
											},
											"targets": 9
										},
										{
											// The `data` parameter refers to the data for the cell (defined by the
											// `data` option, which defaults to the column being worked with, in
											// this case `data: 0`.
											"render": function ( data, type, row ) {
												if (data == 0){
													return "<label class='label label-warning'>Pending</label>";
												}else if (data == 1){
													return "<label class='label label-primary'>In progress</label>";
												}else if (data == 2){
													return "<label class='label label-success'>Finished</label>";
												}else{
													return "<label class='label label-danger'>Canceled</label>";
												}
											},
											"targets": 10,
											"orderable": false
										},
										{   
											"render": function ( data, type, row ) {
												var workorderBtn = "";
												if (row.workorder_id != null){
													workorderBtn = "<a class='m-l-10 pull-left pointer' target='_blank' data-toggle='tooltip' title='View work order' href='workorderdetails?workorder_id=" + row.workorder_id + "'><i class='fas fa-briefcase text-primary'></i></a>";;
												}
												if (row.ticket_status <= 1){
													return '<span onClick="showEditTicketPopup(this)" data-toggle="tooltip" title="Edit ticket" class="text-primary pull-left pointer"><i class="fas fa-pencil-alt"></i></span><span onClick="viewTicket(' + row.ticket_id + ')" data-toggle="tooltip" title="View ticket" class="text-success m-l-10 pull-left pointer"><i class="far fa-list-alt"></i></span>' + workorderBtn + '<span data-toggle="tooltip" title="Mark as finished" class="text-success pull-left m-l-10 pointer" onClick="markTicketAsFinished(this)"><i class="fa fa-check"></i></span><span data-toggle="tooltip" title="Mark as canceled" class="text-danger pull-left m-l-10 pointer" onClick="markTicketAsCanceled(this)"><i class="fa fa-times"></i></span>';
												}else{
													return '<span onClick="showEditTicketPopup(this)" data-toggle="tooltip" title="Edit ticket" class="text-primary pull-left pointer"><i class="fas fa-pencil-alt"></i></span><span onClick="viewTicket(' + row.ticket_id + ')" data-toggle="tooltip" title="View ticket" class="text-success m-l-10 pull-left pointer"><i class="far fa-list-alt"></i></span>' + workorderBtn;
												}
											},
											"orderable": false,
											"targets": 11
										}
									],
									createdRow: function (row, data, index) {
										if (moment().diff(moment(data.ticket_date), 'days') > 0 && data.ticket_status != 2 && data.ticket_status != 3){
											$(row).addClass('row-danger');
										}
									},
									"order": [[ 9, "desc" ]],
									responsive: true,
									dom: 'lfrtipB',
									buttons: [{
										extend: 'copy',
										className: 'btn-sm btn-primary',
										exportOptions: {
											format: {
												header: function ( data, column, row ) {
													if (column == 1){
														data = "Priority";
													}else if (column == 2){
														data = "Type";
													}else if (column == 4){
														data = "Customer";
													}else if (column == 5){
														data = "Subsidiary";
													}else if (column == 6){
														data = "Assigned to";
													}else if (column == 7){
														data = "Created by";
													}else if (column == 10){
														data = "Status";
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
														data = "Priority";
													}else if (column == 2){
														data = "Type";
													}else if (column == 4){
														data = "Customer";
													}else if (column == 5){
														data = "Subsidiary";
													}else if (column == 6){
														data = "Assigned to";
													}else if (column == 7){
														data = "Created by";
													}else if (column == 10){
														data = "Status";
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
														data = "Priority";
													}else if (column == 2){
														data = "Type";
													}else if (column == 4){
														data = "Customer";
													}else if (column == 5){
														data = "Subsidiary";
													}else if (column == 6){
														data = "Assigned to";
													}else if (column == 7){
														data = "Created by";
													}else if (column == 10){
														data = "Status";
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
														data = "Priority";
													}else if (column == 2){
														data = "Type";
													}else if (column == 4){
														data = "Customer";
													}else if (column == 5){
														data = "Subsidiary";
													}else if (column == 6){
														data = "Assigned to";
													}else if (column == 7){
														data = "Created by";
													}else if (column == 10){
														data = "Status";
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
														data = "Priority";
													}else if (column == 2){
														data = "Type";
													}else if (column == 4){
														data = "Customer";
													}else if (column == 5){
														data = "Subsidiary";
													}else if (column == 6){
														data = "Assigned to";
													}else if (column == 7){
														data = "Created by";
													}else if (column == 10){
														data = "Status";
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
								firstPageLoad = false;
								App.init();
							}
						}
					});
			}else{
				var postData = { employee_id: loggedEmployee };
				$.ajax({
					type: "POST",
					url: "<?= BASE_URL ?>" + "employee/tickets",
					data: postData,
					dataType: "json",
					success: function(response) {
						var tickets = response.tickets;
						ticketArray = tickets;
						if (ticketsTable != null){
							if (hideInactive){
								var activeTickets = [];
								for (var i = 0; i < tickets.length; i++){
									if (tickets[i].ticket_status < 2){
										activeTickets.push(tickets[i]);
									}
								}
								ticketsTable.clear().rows.add(activeTickets).draw(false);
							}else{
								ticketsTable.clear().rows.add(tickets).draw(false);
							}
							if (displayChanged){
								ticketsTable.columns([1,2,4,5,6,7,10]).every( function (index) {
											var column = this;
											var name;
											if (index == 1){
												name = "Priority";
											}else if (index == 2){
												name = "Type";
											}else if (index == 4){
												name = "Customer";
											}else if (index == 5){
												name = "Subsidiary";
											}else if (index == 6){
												name = "Assigned to";
											}else if (index == 7){
												name = "Created by";
											}else{
												name = "Status";
											}
											var select = $(name + '<br><select id="ticketSelect' + index + '"><option value="">No filter</option></select>')
												.appendTo( $(column.header()).empty())
												.on( 'change', function () {
													var val = $(this).val();
													val = $('<div/>').html(val).text();
													column
														.search(val, true, false )
														.draw();
												});
											if (index != 6){
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
								ticketsTable.search('').columns().search('').draw(false);
								displayChanged = false;
							}
						}else{
							var activeTickets = [];
							for (var i = 0; i < tickets.length; i++){
								if (tickets[i].ticket_status < 2){
									activeTickets.push(tickets[i]);
								}
							}
							ticketsTable = $('#ticketsTable').DataTable( {
								initComplete: function () {
									this.api().columns([1,2,4,5,6,7,10]).every( function (index) {
										var column = this;
										var name;
										if (index == 1){
											name = "Priority";
										}else if (index == 2){
											name = "Type";
										}else if (index == 4){
											name = "Customer";
										}else if (index == 5){
											name = "Subsidiary";
										}else if (index == 6){
											name = "Assigned to";
										}else if (index == 7){
											name = "Created by";
										}else{
											name = "Status";
										}
										var select = $(name + '<br><select id="ticketSelect' + index + '"><option value="">No filter</option></select>')
											.appendTo( $(column.header()).empty())
											.on( 'change', function () {
												var val = $(this).val();
												val = $('<div/>').html(val).text();
												column
													.search(val, true, false )
													.draw();
											});
										if (index != 6){
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
								"aaData": activeTickets,
								"columns": [
									{ "data": "ticket_subject" },
									{ "data": "ticket_priority" },
									{ "data": "category_name" },
									{ "data": "ticket_date" },
									{ "data": "customer_name" },
									{ "data": "subsidiary_name" },
									{ "data": "assigned_to" },
									{ "data": "employee_id" },
									{ "data": "created_on" },
									{ "data": "last_modified" },
									{ "data": "ticket_status" },
									{ "defaultContent": '' }
								],
								createdRow: function (row, data, index) {
									if (moment().diff(moment(data.ticket_date), 'days') > 0 && data.ticket_status != 2 && data.ticket_status != 3){
										$(row).addClass('danger');
									}
								},
								"columnDefs": [
									{
										// The `data` parameter refers to the data for the cell (defined by the
										// `data` option, which defaults to the column being worked with, in
										// this case `data: 0`.
										"render": function ( data, type, row ) {
											if (data == "Low"){
												return "<label class='label label-success'>" + data + "</label>";
											}else if (data == "Normal"){
												return "<label class='label label-primary'>" + data + "</label>";
											}else{
												return "<label class='label label-danger'>" + data + "</label>";
											}
										},
										"targets": 1,
										"orderable": false
									},
									{
										"targets": 2,
										orderable: false
									},
									{
										// The `data` parameter refers to the data for the cell (defined by the
										// `data` option, which defaults to the column being worked with, in
										// this case `data: 0`.
										"render": function ( data, type, row ) {
											if (type === 'display' || type === 'filter'){
													return moment(data).format(dateformat);
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
											return "<span class='text-primary hover-underline text-ellipsis' onClick='viewTicketCustomer(this)'>" + row.customer_name + "</span>";
										},
										"targets": 4,
										orderable: false
									},
									{
										"render": function(data, type, row) {
											if (data != null){
												return data;
											}else{
												return "Main company";
											}
										},
										"targets": 5,
										orderable: false
									},
									{
										"render": function(data, type, row) {
											return getEmployeeString(data);
										},
										"targets": 6,
										orderable: false
									},
									{
										// The `data` parameter refers to the data for the cell (defined by the
										// `data` option, which defaults to the column being worked with, in
										// this case `data: 0`.
										"render": function(data, type, row) {
											return "<a class='text-primary hover-underline' href='employeepage?employee_id=" + data + "' target='_blank'>"  + row.employee_name + " " + row.employee_surname + "</a>";
										},
										"targets": 7,
										"orderable": false
									},
									{
										// The `data` parameter refers to the data for the cell (defined by the
										// `data` option, which defaults to the column being worked with, in
										// this case `data: 0`.
										"render": function ( data, type, row ) {
											if (type === 'display' || type === 'filter'){
												return moment(data).format(dateformat + ", " + timeformat);
											}else{
												return data;
											}
										},
										"targets": 8
									},
									{
										// The `data` parameter refers to the data for the cell (defined by the
										// `data` option, which defaults to the column being worked with, in
										// this case `data: 0`.
										"render": function ( data, type, row ) {
											if (type === 'display' || type === 'filter'){
												return moment(data).format(dateformat + ", " + timeformat);
											}else{
												return data;
											}
										},
										"targets": 9
									},
									{
										// The `data` parameter refers to the data for the cell (defined by the
										// `data` option, which defaults to the column being worked with, in
										// this case `data: 0`.
										"render": function ( data, type, row ) {
											if (data == 0){
												return "<label class='label label-warning'>Pending</label>";
											}else if (data == 1){
												return "<label class='label label-primary'>In progress</label>";
											}else if (data == 2){
												return "<label class='label label-success'>Finished</label>";
											}else{
												return "<label class='label label-danger'>Canceled</label>";
											}
										},
										"targets": 10,
										"orderable": false
									},
									{   
										"render": function ( data, type, row ) {
											var workorderBtn = "";
											if (row.workorder_id != null){
												workorderBtn = "<a class='m-l-10 pull-left pointer' target='_blank' data-toggle='tooltip' title='View work order' href='workorderdetails?workorder_id=" + row.workorder_id + "'><i class='fas fa-briefcase text-primary'></i></a>";;
											}
											if (row.ticket_status <= 1){
												return '<span onClick="showEditTicketPopup(this)" data-toggle="tooltip" title="Edit ticket" class="text-primary pull-left pointer"><i class="fas fa-pencil-alt"></i></span><span onClick="viewTicket(' + row.ticket_id + ')" data-toggle="tooltip" title="View ticket" class="text-success m-l-10 pull-left pointer"><i class="far fa-list-alt"></i></span>' + workorderBtn + '<span data-toggle="tooltip" title="Mark as finished" class="text-success pull-left m-l-10 pointer" onClick="markTicketAsFinished(this)"><i class="fa fa-check"></i></span><span data-toggle="tooltip" title="Mark as canceled" class="text-danger pull-left m-l-10 pointer" onClick="markTicketAsCanceled(this)"><i class="fa fa-times"></i></span>';
											}else{
												return '<span onClick="showEditTicketPopup(this)" data-toggle="tooltip" title="Edit ticket" class="text-primary pull-left pointer"><i class="fas fa-pencil-alt"></i></span><span onClick="viewTicket(' + row.ticket_id + ')" data-toggle="tooltip" title="View ticket" class="text-success m-l-10 pull-left pointer"><i class="far fa-list-alt"></i></span>' + workorderBtn;
											}
										},
										"orderable": false,
										"targets": 11
									}
								],
								"order": [[ 9, "desc" ]],
								responsive: true,
								buttons: [{
										extend: 'copy',
										className: 'btn-sm btn-primary',
										exportOptions: {
											format: {
												header: function ( data, column, row ) {
													if (column == 1){
														data = "Priority";
													}else if (column == 2){
														data = "Type";
													}else if (column == 4){
														data = "Customer";
													}else if (column == 5){
														data = "Subsidiary";
													}else if (column == 6){
														data = "Assigned to";
													}else if (column == 7){
														data = "Created by";
													}else if (column == 10){
														data = "Status";
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
														data = "Priority";
													}else if (column == 2){
														data = "Type";
													}else if (column == 4){
														data = "Customer";
													}else if (column == 5){
														data = "Subsidiary";
													}else if (column == 6){
														data = "Assigned to";
													}else if (column == 7){
														data = "Created by";
													}else if (column == 10){
														data = "Status";
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
														data = "Priority";
													}else if (column == 2){
														data = "Type";
													}else if (column == 4){
														data = "Customer";
													}else if (column == 5){
														data = "Subsidiary";
													}else if (column == 6){
														data = "Assigned to";
													}else if (column == 7){
														data = "Created by";
													}else if (column == 10){
														data = "Status";
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
														data = "Priority";
													}else if (column == 2){
														data = "Type";
													}else if (column == 4){
														data = "Customer";
													}else if (column == 5){
														data = "Subsidiary";
													}else if (column == 6){
														data = "Assigned to";
													}else if (column == 7){
														data = "Created by";
													}else if (column == 10){
														data = "Status";
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
														data = "Priority";
													}else if (column == 2){
														data = "Type";
													}else if (column == 4){
														data = "Customer";
													}else if (column == 5){
														data = "Subsidiary";
													}else if (column == 6){
														data = "Assigned to";
													}else if (column == 7){
														data = "Created by";
													}else if (column == 10){
														data = "Status";
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
							firstPageLoad = false;
							App.init();
						}
					}
				});
			}
        }
		
		function showWorkOrderPage(row){
            var actualRow = $(row).parents('tr');
			if (actualRow.hasClass('child')) {//Check if the current row is a child row
				actualRow = actualRow.prev();//If it is, then point to the row before it (its 'parent')
			}
            var ticket = ticketsTable.row(actualRow).data();
            var url = "<?= BASE_URL ?>" + "workorderdetails?workorder_id=" + ticket.workorder_id;
		    window.open(url, "_blank");
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
		
		function deleteCategory(row){
            var actualRow = $(row).parents('tr');
			if (actualRow.hasClass('child')) {//Check if the current row is a child row
				actualRow = actualRow.prev();//If it is, then point to the row before it (its 'parent')
			}
            var category = categoriesTable.row(actualRow).data();
            swal({
              title: 'Confirm action',
              text: "Are you sure you want to delete this category?",
              type: 'error',
              showCancelButton: true,
              confirmButtonColor: '#3085d6',
              cancelButtonColor: '#d33',
              confirmButtonText: 'Yes, remove'
            }).then(function () {
                var values = { category_id: category.category_id };
                $.ajax({
                    type: "POST",
                    url: "ticketcategory/delete",
                    data: values,
                    success: function(msg) {
                        if (msg == "") {
                            swal(
                                'Success!',
                                'Category was successfully removed.',
                                'success'
                            );
                            getCategories();
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
	<?php
	
		if ($employee["telephony_email"] == 0){
			echo '<script src="' . JS_URL . 'telephony_imap.js' . '"></script>';
		}else if ($employee["telephony_email"] == 1){
			echo '<script src="' . JS_URL . 'telephony_365.js' . '"></script>';
		}else if ($employee["telephony_email"] == 2){
			echo '<script src="' . JS_URL . 'telephony_exchange.js' . '"></script>';
		}
	
	?>
</body>
</html>