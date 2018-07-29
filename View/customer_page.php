<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
<!--<![endif]-->
<head>
	<meta charset="utf-8" />
	<title>Customer details</title>
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
	<link href="<?= ASSETS_URL . "bootstrap-wizard/css/bwizard.min.css" ?>" rel="stylesheet" />
	<!-- ================== END BASE CSS STYLE ================== -->
	
	<!-- ================== BEGIN PAGE LEVEL STYLE ================== -->
	<link href="<?= ASSETS_URL . "jquery-jvectormap/jquery-jvectormap.css" ?>" rel="stylesheet" />
	<link href="<?= ASSETS_URL . "bootstrap-datepicker/css/bootstrap-datepicker.css" ?>" rel="stylesheet" />
    <link href="<?= ASSETS_URL . "gritter/css/jquery.gritter.css" ?>" rel="stylesheet" />
    <link href="<?= ASSETS_URL . "telinput/build/css/intlTelInput.css" ?>" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.6.9/sweetalert2.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.6.9/sweetalert2.min.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/css/bootstrap-datetimepicker.min.css" rel="stylesheet"/>
    <link href="<?= ASSETS_URL . "jquery-file-upload/blueimp-gallery/blueimp-gallery.min.css" ?>" rel="stylesheet" />
    <link href="<?= ASSETS_URL . "jquery-file-upload/css/jquery.fileupload.css" ?>" rel="stylesheet" />
	<link href="<?= ASSETS_URL . "jquery-file-upload/css/jquery.fileupload-ui.css" ?>" rel="stylesheet" />
	<link href="<?= ASSETS_URL . "select2/dist/css/select2.css" ?>" rel="stylesheet" />
	<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css">
	<!-- ================== END PAGE LEVEL STYLE ================== -->
	
	<!-- ================== BEGIN BASE JS ================== -->
	<script src="<?= ASSETS_URL . "pace/pace.min.js" ?>" ></script>
	<!-- ================== END BASE JS ================== -->
</head>
<style>
    
    #contactList{
        cursor: pointer;
    }
    
    #contactList li:hover{
        background-color: #f4f4f4;
    }
    
    #pMap{
        width: 100%;
        height: 500px;
    }
    
    
    #addCustomerDIV, #editCustomerDIV, #addContactDIV, #editContactDIV, #viewEventDIV, #editEventDIV, #addEventDIV, #mapDIV, #uploadFileDIV, #editCallDIV, #addSubsidiaryDIV, #editSubsidiaryDIV{
        width: 800px;
        height: auto;
        position: relative;
        margin: 5% auto 0px auto;
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
    
    .tab-content {
        padding: 15px 0px 0px 0px;
        margin-bottom: 20px;
        background: none;
        -webkit-border-radius: 3px;
        -moz-border-radius: 3px;
        border-radius: 3px;
    }
    
    input[pattern]:invalid{
      color:red;
    }
    
    .profile-header .profile-header-tab {
        background: #fff;
        list-style-type: none;
        margin: -10px 0 0;
        padding: 0 0 0 10px;
        white-space: nowrap;
        border-radius: 0;
    }
    
    .span-add{
        display: inline;
        padding: 0;
        width: auto;
        border: 0;
        border-bottom: 1px dotted #cbced2;
        background: 0;
        color: #80868e;
        font: 12px/14px "Helvetica Neue",Helvetica,Arial,sans-serif;
        cursor: pointer;
        transition: all 220ms ease;
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
    
    .intl-tel-input {
        display: block;
    }
    
    #locationContainer{
        position: absolute;
        top: 191px;
        left: 220px;
        bottom: 0px;
        right: 60px;
        z-index: 0;
        transform: translateZ(0);
    }
    
    .page-right-sidebar-collapsed #locationContainer {
        right: 0;
    }
    
    .full-width{
        width: 100%;
    }
    
    .full-height{
        height: 100%;
    }
    
    .list-email .email-time {
        position: absolute;
        width: 200px;
        padding: 15px;
        top: 0;
        bottom: 0;
        right: 0;
        font-size: 11px;
        color: #9ba3ab;
        text-align: right;
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
    
    .box.has-advanced-upload {
        outline: 2px dashed darkblue;
        outline-offset: -10px;
        -webkit-transition: outline-offset .15s ease-in-out, background-color .15s linear;
        transition: outline-offset .15s ease-in-out, background-color .15s linear;
    }
	
	.pointer{
		cursor: pointer;
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
    
    .input-sm{
        height: 28px;
        line-height: 12px;
    }
	
	#contactsTable, #subsidiariesTable{
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
						<li class="has-sub active">
                			<a href="javascript:;">
                				<b class="caret pull-right"></b>
                				<i class="fas fa-users"></i> 
                				<span>CRM</span>
                			</a>
                			<ul class="sub-menu">
                			    <li class="active"><a href="<?= BASE_URL . "customers" ?>">Customers</a></li>
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
						<!-- END profile-header-img -->
						<!-- BEGIN profile-header-info -->
						<div class="profile-header-info">
							<h4 class="m-t-10 m-b-5"><?php echo $customer["customer_name"] ?></h4>
							<p class="m-b-10"><?php echo $customer["customer_industry"] ?></p>
						</div>
						<!-- END profile-header-info -->
					</div>
					<!-- END profile-header-content -->
					<!-- BEGIN profile-header-tab -->
					<ul class="profile-header-tab nav nav-tabs">
						<li class="nav-item active"><a href="#customer-about" class="nav-link" data-toggle="tab">ABOUT</a></li>
						<li class="nav-item"><a href="#customer-events" class="nav-link" data-toggle="tab">EVENTS</a></li>
						<li class="nav-item"><a href="#customer-calls" class="nav-link" data-toggle="tab">CALLS</a></li>
						<li class="nav-item"><a href="#customer-documents" class="nav-link" data-toggle="tab">DOCUMENTS</a></li>
						<li class="nav-item"><a href="#customer-contacts" class="nav-link" data-toggle="tab">CONTACTS</a></li>
						<li class="nav-item"><a href="#customer-subsidiaries" class="nav-link" data-toggle="tab">SUBSIDIARIES</a></li>
						<li class="nav-item"><a href="#customer-tickets" class="nav-link" data-toggle="tab">TICKETS</a></li>
						<li class="nav-item"><a href="#customer-workorders" class="nav-link" data-toggle="tab">WORK ORDERS</a></li>
						<li class="nav-item"><a href="#customer-location" class="nav-link" data-toggle="tab">LOCATION</a></li>
						<li class="nav-item"><a href="#customer-sla" class="nav-link" data-toggle="tab">SLA</a></li>
					</ul>
					<!-- END profile-header-tab -->
				</div>
			</div>
			<!-- end profile -->
            <div class="profile-content">
            	<!-- begin tab-content -->
            	<div class="tab-content p-0">
            		<!-- begin #profile-about tab -->
            		<div class="tab-pane fade in active" id="customer-about">
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
											<h4 class="widget-list-title">Name</h4>
										</div>
										<div class="widget-list-action text-nowrap text-right">
											<?php echo $customer["customer_name"]; ?>
										</div>
									</div>
									<div class="widget-list-item">
										<div class="widget-list-media icon">
											<i class="fa fa-circle bg-blue text-white"></i>
										</div>
										<div class="widget-list-content">
											<h4 class="widget-list-title">Visibility</h4>
										</div>
										<div class="widget-list-action text-nowrap text-right">
											<?php
												$visibility = "Public";
												if ($customer["customer_visibility"] == 0){
													$visibility = "Private";
												}
												echo $visibility;
											?>
										</div>
									</div>
									<div class="widget-list-item">
										<div class="widget-list-media icon">
											<i class="fab fa-elementor bg-blue text-white"></i>
										</div>
										<div class="widget-list-content">
											<h4 class="widget-list-title">Business entity</h4>
										</div>
										<div class="widget-list-action text-nowrap text-right">
											<?php
												$business_entity = "Yes";
												if ($customer["business_entity"] == 0){
													$business_entity = "No";
												}
												echo $business_entity;
											?>
										</div>
									</div>
									<div class="widget-list-item">
										<div class="widget-list-media icon">
											<i class="fas fa-fire bg-blue text-white"></i>
										</div>
										<div class="widget-list-content">
											<h4 class="widget-list-title">Tax payer</h4>
										</div>
										<div class="widget-list-action text-nowrap text-right">
											<?php
												$taxpayer = "Yes";
												if ($customer["taxpayer"] == 0){
													$taxpayer = "No";
												}
												echo $taxpayer;
											?>
										</div>
									</div>
									<?php
										$customer_phones = explode(";", $customer["customer_phone"]);
										foreach ($customer_phones as $mobile){
											echo '<div class="widget-list-item">
												<div class="widget-list-media icon">
													<i class="fa fa-phone bg-blue text-white"></i>
												</div>
												<div class="widget-list-content">
													<h4 class="widget-list-title">Phone number</h4>
												</div>
												<div class="widget-list-action text-nowrap text-right">'
													. $mobile . '
												</div>
											</div>';
										}
										$customer_emails = explode(";", $customer["customer_email"]);
										foreach ($customer_emails as $email){
											echo '<div class="widget-list-item">
												<div class="widget-list-media icon">
													<i class="fas fa-envelope bg-blue text-white"></i>
												</div>
												<div class="widget-list-content">
													<h4 class="widget-list-title">E-mail</h4>
												</div>
												<div class="widget-list-action text-nowrap text-right">'
													. '<a href="mailto:' . $email . '">' . $email . '</a>
												</div>
											</div>';
										}
									?>
									<div class="widget-list-item">
										<div class="widget-list-media icon">
											<i class="fas fa-globe bg-blue text-white"></i>
										</div>
										<div class="widget-list-content">
											<h4 class="widget-list-title">Website</h4>
										</div>
										<div class="widget-list-action text-nowrap text-right">
											<?php
												if ($customer["customer_website"] != ""){
													echo '<a target="_blank" href="http://' . $customer["customer_website"] . '"><i class="fas fa-globe text-success fa-lg m-r-5"></i>' . $customer["customer_website"] . '</a>';
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
											<h4 class="widget-list-title">Address</h4>
										</div>
										<div class="widget-list-action text-nowrap text-right">
											<?php
												echo '<span class="hover-underline text-primary" onClick="showOnMap()">' . $customer["customer_address"] . '</span>';
											?>
										</div>
									</div>
									<div class="widget-list-item">
										<div class="widget-list-media icon">
											<i class="fas fa-user bg-blue text-white"></i>
										</div>
										<div class="widget-list-content">
											<h4 class="widget-list-title">Added by</h4>
										</div>
										<div class="widget-list-action text-nowrap text-right">
											<?php echo '<a href="employeepage?employee_id=' . $added_by["employee_id"] . '">' . $added_by["employee_name"] . " " . $added_by["employee_surname"] . '</a>'; ?>
										</div>
									</div>
									<div class="widget-list-item">
										<div class="widget-list-media icon">
											<i class="fas fa-user bg-success text-white"></i>
										</div>
										<div class="widget-list-content">
											<h4 class="widget-list-title">Key account manager</h4>
										</div>
										<div class="widget-list-action text-nowrap text-right">
											<?php 
												if ($employee["employee_name"] != null){
												  echo $employee["employee_name"] . " " . $employee["employee_surname"];
												}else{
													echo "None";
												}
											?>
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
											<?php echo $customer["customer_notes"]; ?>
										</div>
									</div>
								</div>
						</div>
						<div class="col-md-6">
							<div class="m-b-10 f-s-10 m-t-10">
								<b class="text-inverse">SERVICE LEVEL AGREEMENT</b>
							</div>
							<div class="widget-list widget-list-rounded m-b-30">
									<div class="widget-list-item">
										<div class="widget-list-media icon">
											<i class="fas fa-align-left bg-success text-white"></i>
										</div>
										<div class="widget-list-content">
											<h4 class="widget-list-title">Low priority SLA</h4>
										</div>
										<div class="widget-list-action text-nowrap text-right">
											<?php echo $customer["low_sla"] . " minutes"; ?>
										</div>
									</div>
									<div class="widget-list-item">
										<div class="widget-list-media icon">
											<i class="fas fa-align-left bg-blue text-white"></i>
										</div>
										<div class="widget-list-content">
											<h4 class="widget-list-title">Normal priority SLA</h4>
										</div>
										<div class="widget-list-action text-nowrap text-right">
											<?php echo $customer["normal_sla"] . " minutes"; ?>
										</div>
									</div>
									<div class="widget-list-item">
										<div class="widget-list-media icon">
											<i class="fas fa-align-left bg-danger text-white"></i>
										</div>
										<div class="widget-list-content">
											<h4 class="widget-list-title">High priority SLA</h4>
										</div>
										<div class="widget-list-action text-nowrap text-right">
											<?php echo $customer["high_sla"] . " minutes"; ?>
										</div>
									</div>
							</div>
						</div>
            		</div>
            		<div class="tab-pane fade" id="customer-events">
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
                                    <button class="btn btn-sm btn-white pull-right" onClick="showNewEventPopup()">Add a event</button>
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
													<a target="_blank" href="eventdetails?event_id=' . $event["event_id"] . '" class="btn btn-link m-r-15"><i class="fa fa-edit fa-fw fa-lg m-r-3"></i> View event</a>'
													. $mapBtn . '
												</div>
											</div>
										</li>';
									}
								?>
                			</ul>
            		</div>
            		<div class="tab-pane fade" id="customer-calls">
            		        <div class="wrapper bg-primary">
                                <!-- begin btn-toolbar -->
                                <div class="btn-toolbar">
                                    <input id="searchCallsInput" type="text" class="form-control width-sm input-sm pull-left" placeholder="Search calls" onkeyup="filterCalls()"/>
                                    <!-- begin btn-group -->
                                    <div class="btn-group pull-right">
                                        <button class="btn btn-sm btn-white" data-toggle="tooltip" data-placement="bottom" data-title="Refresh" data-original-title="" title="" onclick="getCalls()"><i class="ion-refresh"></i></button>
                                    </div>
                                    <div class="btn-group dropdown pull-right">
                                        <button class="btn btn-white btn-sm dropdown-toggle" data-toggle="dropdown">
                                            View <span class="caret"></span>
                                        </button>
                                        <ul id="callViewDropdown" class="dropdown-menu text-left text-sm">
                                            <li class="active"><a href="javascript:;"><i class="fa fa-circle f-s-10 fa-fw m-r-5"></i> All</a></li>
                                            <li><a href="javascript:;"><i class="fa fa-circle f-s-10 fa-fw m-r-5"></i> This week</a></li>
                                            <li><a href="javascript:;"><i class="fa fa-circle f-s-10 fa-fw m-r-5"></i> This month</a></li>
                                            <li><a href="javascript:;"><i class="fa fa-circle f-s-10 fa-fw m-r-5"></i> This year</a></li>
                                        </ul>
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
            		<div class="tab-pane fade" id="customer-documents">
            		        <div class="wrapper bg-primary">
                                <!-- begin btn-toolbar -->
                                <div class="btn-toolbar">
                                    <input id="searchDocumentsInput" type="text" class="form-control width-sm input-sm pull-left" placeholder="Search documents" onkeyup="filterDocuments()"/>
                                    <!-- begin btn-group -->
                                    <div class="btn-group pull-right">
                                        <button class="btn btn-sm btn-white" data-toggle="tooltip" data-placement="bottom" data-title="Refresh" data-original-title="" title="" onclick="getDocuments()"><i class="ion-refresh"></i></button>
                                    </div>
                                    <div class="btn-group dropdown pull-right">
                                        <button class="btn btn-white btn-sm dropdown-toggle" data-toggle="dropdown">
                                            View <span class="caret"></span>
                                        </button>
                                        <ul id="documentViewDropdown" class="dropdown-menu text-left text-sm">
                                            <li class="active"><a href="javascript:;"><i class="fa fa-circle f-s-10 fa-fw m-r-5"></i> All</a></li>
                                            <li><a href="javascript:;"><i class="fa fa-circle f-s-10 fa-fw m-r-5"></i> This week</a></li>
                                            <li><a href="javascript:;"><i class="fa fa-circle f-s-10 fa-fw m-r-5"></i> This month</a></li>
                                            <li><a href="javascript:;"><i class="fa fa-circle f-s-10 fa-fw m-r-5"></i> This year</a></li>
                                        </ul>
                                    </div>
                                    <!-- end btn-group -->
                                    <!-- begin btn-group -->
                                    
                                    <button class="btn btn-sm btn-white pull-right" onClick="showUploadPopup()">Upload a file</button>
                                    <!-- end btn-group -->
                                </div>
                                <!-- end btn-toolbar -->
                            </div>
                		    <ul id="documentTimeline" class="timeline bg-silver">
                    			<?php
                    			    foreach ($documents as $document){
                        				echo '<li>
                        			        <div class="timeline-time">
                        			            <span class="date">' . date("l, jS F Y", strtotime($document["datetime"])) . '</span>
                        			            <span class="time">' . date("H:i", strtotime(explode(" ", $document["datetime"])[1])) . '</span>
                        			        </div>
                        			        <div class="timeline-icon timeline-primary">
                        			            <a href="javascript:;">&nbsp;</a>
                        			        </div>
                        			        <div class="timeline-body">
                        			            <div class="timeline-header">
                        			                <span class="username">' . $document["filename"] . '</span>
                        			            </div>
                        			            <div class="timeline-content">
                        			                <h5 class="template-title">
                        			                    Uploaded by: '
                        			                    . $document["employee_name"] . " " . $document["employee_surname"] . '
                        			                </h5>
                                                </div>
                        			            <div class="timeline-footer">
                        			                <a href="' . DIR_URL . $document["filepath"] . '" download class="btn btn-link m-r-15"><i class="fa fa-download fa-fw fa-lg m-r-3"></i> Download file</a>
                        			            </div>
                        			        </div>
                        			    </li>';
                                    }
                    			?>
                			</ul>
            		</div>
            		<div class="tab-pane fade" id="customer-contacts">
            		    <div class="row">
							<div class="col-md-12">
								<button class="btn btn-white m-b-15" onClick="showAddContactPopup()"><i class="fa fa-plus text-primary m-r-5"></i>Add a contact</button>
								<div class="panel panel-primary">
									<div class="panel-heading">
										<div class="panel-heading-btn">
											<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
											<a href="getContacts()" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="ion-refresh"></i></a>
											<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
											<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
										</div>
										<h4 class="panel-title">Contacts</h4>
									</div>
									<div class="panel-body">
										<div class="dataTables_wrapper form-inline dt-bootstrap no-footer">
											<table id="contactsTable" class="table table-striped">
												<thead>
													<tr>
														<th>Name</th>
														<th>Surname</th>
														<th>Type</th>
														<th>Phone number</th>
														<th>E-mail</th>
														<th>Added by</th>
														<th>Added on</th>
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
					<div class="tab-pane fade" id="customer-subsidiaries">
						<div class="row">
							<div class="col-md-12">
								<button class="btn btn-white m-b-15" onClick="showAddSubsidiaryPopup()"><i class="fa fa-plus text-primary m-r-5"></i>Add a subsidiary company</button>
								<div class="panel panel-primary">
									<div class="panel-heading">
										<div class="panel-heading-btn">
											<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
											<a href="getSubsidiaries()" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="ion-refresh"></i></a>
											<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
											<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
										</div>
										<h4 class="panel-title">Subsidiaries</h4>
									</div>
									<div class="panel-body">
										<div class="dataTables_wrapper form-inline dt-bootstrap no-footer">
											<table id="subsidiariesTable" class="table table-striped">
												<thead>
													<tr>
														<th>Name</th>
														<th>Main phone number</th>
														<th>E-mail</th>
														<th>Building</th>
														<th>Address</th>
														<th>Added by</th>
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
					<div class="tab-pane fade" id="customer-tickets">
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
									$tickets = $sla["tickets"];
                    			    foreach ($tickets as $ticket){
                    			        $viewWorkorderBtn = "";
                    			        if ($ticket["workorder_id"] != null){
                    			            $viewWorkorderBtn = '<a target="_blank" href="workorderdetails?workorder_id=' . $ticket["workorder_id"] . '" class="btn btn-link m-r-15"><i class="fa fa-edit fa-fw fa-lg m-r-3"></i> View work order</a>';
                    			        }
										$subsidiaryName = $workorder["subsidiary_name"];
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
					<div class="tab-pane fade" id="customer-workorders">
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
									$workorders = $sla["workorders"];
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
            		<div class="tab-pane fade" id="customer-location">
            		    <div id="locationContainer">
            		        <div id="map" class="full-width full-height">
                        
                            </div>
            		    </div>
            		</div>
					<div class="tab-pane fade" id="customer-sla">
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
										<div class="vertical-box-column p-15" style="width: 30%;">
											<div class="widget-chart-info">
												<h4 class="widget-chart-info-title">Average turn around times</h4>
												<p class="widget-chart-info-desc">This customer has had a total of <strong><span id="ticketsTotalSpan"></span> ticket(s)</strong>, with the following average turn around times (by priority).</p>
												<div class="widget-chart-info-progress">
														<b>Low priority</b>
														<span id="ticketsLowPrioritySpan" class="pull-right"></span>
													</div>
												<div class="progress progress-sm m-b-15">
													<div id="ticketsLowPriorityBar" class="progress-bar progress-bar-striped progress-bar-animated rounded-corner"></div>
												</div>
												<div class="widget-chart-info-progress">
														<b>Normal priority</b>
														<span id="ticketsNormalPrioritySpan" class="pull-right"></span>
													</div>
												<div class="progress progress-sm m-b-15">
													<div id="ticketsNormalPriorityBar" class="progress-bar progress-bar-striped progress-bar-animated rounded-corner"></div>
												</div>
												<div class="widget-chart-info-progress">
														<b>High priority</b>
														<span id="ticketsHighPrioritySpan" class="pull-right"></span>
													</div>
												<div class="progress progress-sm m-b-15">
													<div id="ticketsHighPriorityBar" class="progress-bar progress-bar-striped progress-bar-animated rounded-corner"></div>
												</div>
												<p class="widget-chart-info-desc">The average turn around time is <strong><span id="ticketsAverageTAT"></span> minutes</strong>.</p>
												<hr>
												<div class="widget-chart-info">
													<h4 class="widget-chart-info-title">Ticket statistics</h4>
													<p class="widget-chart-info-desc">The statuses of all tickets assigned to this customer are shown below.</p>
													<div class="widget-chart-info-progress">
														<b>Incomplete</b>
														<span id="ticketsIncompleteSpan" class="pull-right"></span>
													</div>
													<div class="progress progress-sm m-b-15">
														<div id="ticketsIncompleteBar" class="progress-bar progress-bar-striped progress-bar-animated rounded-corner bg-warning"></div>
													</div>
													<div class="widget-chart-info-progress">
														<b>In progress</b>
														<span id="ticketsInProgressSpan" class="pull-right"></span>
													</div>
													<div class="progress progress-sm m-b-15">
														<div id="ticketsInProgressBar" class="progress-bar progress-bar-striped progress-bar-animated rounded-corner bg-info"></div>
													</div>
													<div class="widget-chart-info-progress">
														<b>Finished</b>
														<span id="ticketsFinishedSpan" class="pull-right"></span>
													</div>
													<div class="progress progress-sm">
														<div id="ticketsFinishedBar" class="progress-bar progress-bar-striped progress-bar-animated rounded-corner bg-primary"></div>
													</div>
													<div class="widget-chart-info-progress">
														<b>Approved</b>
														<span id="ticketsApprovedSpan" class="pull-right"></span>
													</div>
													<div class="progress progress-sm">
														<div id="ticketsApprovedBar" class="progress-bar progress-bar-striped progress-bar-animated rounded-corner bg-success"></div>
													</div>
													<div class="widget-chart-info-progress">
														<b>Canceled</b>
														<span id="ticketsCanceledSpan" class="pull-right"></span>
													</div>
													<div class="progress progress-sm">
														<div id="ticketsCanceledBar" class="progress-bar progress-bar-striped progress-bar-animated rounded-corner bg-danger"></div>
													</div>
												</div>
											</div>
											<hr>
										</div>
										<!-- begin vertical-box-column -->
										<div class="vertical-box-column widget-chart-content">
											<div id="ticket-line-chart" class="morris-inverse" style="height: 100%; position: relative; -webkit-tap-highlight-color: rgba(0, 0, 0, 0);">

											</div>
										</div>
										<!-- end vertical-box-column -->
										<!-- end vertical-box-column -->
									</div>
									<!-- end vertical-box -->
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
												<p class="widget-chart-info-desc">This customer has had a total of <strong><span id="workordersTotalSpan"></span> work order(s)</strong>, with the following average turn around times (by priority).</p>
												<div class="widget-chart-info-progress">
														<b>Low priority</b>
														<span id="workordersLowPrioritySpan" class="pull-right"></span>
													</div>
												<div class="progress progress-sm m-b-15">
													<div id="workordersLowPriorityBar" class="progress-bar progress-bar-striped progress-bar-animated rounded-corner"></div>
												</div>
												<div class="widget-chart-info-progress">
														<b>Normal priority</b>
														<span id="workordersNormalPrioritySpan" class="pull-right"></span>
													</div>
												<div class="progress progress-sm m-b-15">
													<div id="workordersNormalPriorityBar" class="progress-bar progress-bar-striped progress-bar-animated rounded-corner"></div>
												</div>
												<div class="widget-chart-info-progress">
														<b>High priority</b>
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
													<div class="widget-chart-info-progress">
														<b>Incomplete</b>
														<span id="workordersIncompleteSpan" class="pull-right"></span>
													</div>
													<div class="progress progress-sm m-b-15">
														<div id="workordersIncompleteBar" class="progress-bar progress-bar-striped progress-bar-animated rounded-corner bg-danger"></div>
													</div>
													<div class="widget-chart-info-progress">
														<b>In progress</b>
														<span id="workordersInProgressSpan" class="pull-right"></span>
													</div>
													<div class="progress progress-sm m-b-15">
														<div id="workordersInProgressBar" class="progress-bar progress-bar-striped progress-bar-animated rounded-corner bg-primary"></div>
													</div>
													<div class="widget-chart-info-progress">
														<b>Completed</b>
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
											<div id="workorder-line-chart" class="morris-inverse" style="height: 100%; position: relative; -webkit-tap-highlight-color: rgba(0, 0, 0, 0);">

											</div>
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
										<form id="customerSLAForm" action="<?= BASE_URL . "customer/sla" ?>" method="post" class="form-horizontal">
											<input type="hidden" name="customer_id" value="<?php echo $customer["customer_id"]; ?>" />
											<div class="form-group">
												<div class="col-md-12">
													<label>Low priority SLA:</label>
													<div class="input-group">
														<input type="number" name="low_sla" class="form-control" min="1" step="1" value="<?php echo $customer["low_sla"]; ?>" required />
														<span class="input-group-addon" id="basic-addon2">minutes</span>
													</div>
												</div>
											</div>
											<div class="form-group">
												<div class="col-md-12">
													<label>Normal priority SLA:</label>
													<div class="input-group">
														<input type="number" name="normal_sla" class="form-control" min="1" step="1" value="<?php echo $customer["normal_sla"]; ?>" required />
														<span class="input-group-addon" id="basic-addon2">minutes</span>
													</div>
												</div>
											</div>
											<div class="form-group">
												<div class="col-md-12">
													<label>High priority SLA:</label>
													<div class="input-group">
														<input type="number" name="high_sla" class="form-control" min="1" step="1" value="<?php echo $customer["high_sla"]; ?>" required />
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
            </div>
            <div class="popupContainer" id="customerPopupDIV" hidden>
                <div class="panel panel-primary" id="editCustomerDIV" hidden>
                    <div class="panel-heading">
                        <div class="panel-heading-btn">
                            <button class="btn btn-xs btn-icon btn-circle btn-default" onClick="hideEditCustomerPopup()"><i class="fa fa-times"></i>
                            </button>
                        </div>
                        <h4 class="panel-title">Edit customer</h4>
                    </div>
                    <div class="panel-body">
                        <form id="editCustomerForm" action="<?= BASE_URL . "customer/edit" ?>" method="post" class="form-horizontal">
                            <input type="hidden" id="hiddenEditCustomerIDInput" name="customer_id" />
                            <input type="hidden" id="editCustomerLatitudeInput" name="latitude" />
                            <input type="hidden" id="editCustomerLongitudeInput" name="longitude" />
                            <div class="form-group">
                                <div class="col-md-3">
                                    <label>VAT:</label>
                                    <input id="editCustomerVATInput" type="text" class="form-control" name="customer_vat" placeholder="Enter VAT" />
                                </div>
								<div class="col-md-3">
                                    <label>Visibility:</label><br>
                                    <div class="radio radio-css radio-inline radio-success">
                                        <input type="radio" id="ecb1" name="customer_visibility" value="1" checked>
                                        <label for="ecb1">
                                        	Public
                                        </label>
                                    </div>
                                    <div class="radio radio-css radio-inline radio-danger">
                                        <input type="radio" id="ecb2" name="customer_visibility" value="0">
                                        <label for="ecb2">
                                        	Private
                                        </label>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <label>Business entity:</label><br>
                                    <div class="radio radio-css radio-inline radio-success">
                                        <input type="radio" id="exb1" name="business_entity" value="1">
                                        <label for="exb1">
                                        	Yes
                                        </label>
                                    </div>
                                    <div class="radio radio-css radio-inline radio-danger">
                                        <input type="radio" id="exb2" name="business_entity" value="0" checked>
                                        <label for="exb2">
                                        	No
                                        </label>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <label>Tax payer:</label><br>
                                    <div class="radio radio-css radio-inline radio-success">
                                        <input type="radio" id="ecr1" name="taxpayer" value="1">
                                        <label for="ecr1">
                                        	Yes
                                        </label>
                                    </div>
                                    <div class="radio radio-css radio-inline radio-danger">
                                        <input type="radio" id="ecr2" name="taxpayer" value="0" checked>
                                        <label for="ecr2">
                                        	No
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-xs-12 col-sm-6 col-md-8">
                                    <label>Company name: <span class="red">*</span>
                                    </label>
                                    <input id="editCustomerNameInput" type="text" name="customer_name" class="form-control" placeholder="Customer name" required />
                                </div>
                                <div class="col-md-4">
                                    <label>Industry:</label>
                                    <select id="editCustomerIndustrySelect" class="form-control" name="customer_industry">
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
                                    <input id="editCustomerContactInput" type="text" class="tel-input form-control m-b-5" required />
                                    <div id="editPhoneNrsDIV">
                                        
                                    </div>
                                    <span class="span-add" onClick="addEditPhone()">Add a phone number</span>
                                </div>
                                <div class="col-md-4">
                                    <label>E-Mail: 
                                    </label>
                                    <input id="editCustomerEmailInput" type="email" name="customer_email[]" class="form-control" placeholder="E-mail" required />
                                    <div id="editEmailsDIV">
                                        
                                    </div>
                                    <span class="span-add" onClick="addEditEmail()">Add an email address</span>
                                </div>
                                <div class="col-md-4">
                                    <label>Website:</label>
                                    <input id="editCustomerWebsiteInput" type="text" class="form-control" name="customer_website" placeholder="Website address" />
                                </div>
                            </div>
                            <div class="form-group">
								<div class="col-xs-12 col-sm-4 col-md-4">
									<label>Building: <span class="red">*</span></label>
									<input id="editCustomerBuildingInput" type="text" class="form-control" name="customer_building" placeholder="Enter building name" required />
								</div>
                                <div class="col-xs-12 col-sm-6 col-md-8">
                                    <label>Address: <span class="red">*</span>
                                    </label>
                                    <input id="editCustomerAddressInput" type="text" name="customer_address" class="form-control" placeholder="Enter an address" required />
                                </div>
                            </div>
                            <div class="form-group">
								<div class="col-xs-12 col-sm-6 col-md-4">
                                    <label>Key account manager: </label>
                                    <select id="editCustomerEmployeeSelect" name="employee_id" class="form-control">
                                        <option value="">Choose an employee</option>
                                    </select>
                                </div>
                                <div class="col-md-8">
                                    <label>Importance</label>
                                    <input id="editCustomerImportanceInput" type="range" min="1" max="10" value="5" class="slider" name="customer_importance" onInput="updateEditRangeValue()">
                                    <label id="editCustomerRangeValue" style="margin-top: 3px;">5</label>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-12">
                                    <label>Notes: </label>
                                    <textarea id="editCustomerNotesInput" class="form-control" name="customer_notes" placeholder="Enter notes" rows="4"></textarea>
                                </div>
                            </div>
                            <button class="btn material primary">Edit customer</button>
                            <button type="button" class="btn material danger pull-right" onClick="hideEditCustomerPopup()">Close</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="popupContainer" id="contactPopupDIV" hidden>
                <div class="panel panel-primary" id="addContactDIV" hidden>
                    <div class="panel-heading">
                        <div class="panel-heading-btn">
                            <button class="btn btn-xs btn-icon btn-circle btn-default" onClick="hideAddContactPopup()"><i class="fa fa-times"></i>
                            </button>
                        </div>
                        <h4 class="panel-title">Add a contact</h4>
                    </div>
                    <div class="panel-body">
                        <form id="addContactForm" action="<?= BASE_URL . "contacts/add" ?>" method="post" class="form-horizontal">
                            <input type="hidden" name="customer_id" value="<?php echo $customer["customer_id"]; ?>" />
                            <div class="form-group">
                                <div class="col-md-12">
                                    <label>Contact type:</label><br>
                                    <div class="radio radio-css radio-inline radio-primary">
                                        <input type="radio" id="cob1" name="contact_type" value="Client" checked>
                                        <label for="cob1">
                                        	Client
                                        </label>
                                    </div>
                                    <div class="radio radio-css radio-inline radio-primary">
                                        <input type="radio" id="cob2" name="contact_type" value="Supplier">
                                        <label for="cob2">
                                        	Supplier
                                        </label>
                                    </div>
                                    <div class="radio radio-css radio-inline radio-primary">
                                        <input type="radio" id="cob3" name="contact_type" value="Partner">
                                        <label for="cob3">
                                        	Partner
                                        </label>
                                    </div>
                                    <div class="radio radio-css radio-inline radio-primary">
                                        <input type="radio" id="cob4" name="contact_type" value="Other">
                                        <label for="cob4">
                                            Other
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-6">
                                    <label>Name: <span class="red">*</span></label>
                                    <input type="text" class="form-control" name="contact_name" placeholder="Contact name" />
                                </div>
                                <div class="col-md-6">
                                    <label>Surname: <span class="red">*</span></label>
                                    <input type="text" class="form-control" name="contact_surname" placeholder="Contact surname" />
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-12">
                                    <label>Position:</label>
                                    <input type="text" class="form-control" name="contact_position" placeholder="Position" />
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-6">
                                    <label>Phone number: <span class="red">*</span>
                                    </label>
                                    <input type="text" name="contact_phone[]" class="tel-input form-control m-b-5"  required />
                                    <div id="contactPhoneNrsDIV">
                                        
                                    </div>
                                    <span class="span-add" onClick="addContactPhoneNr()">Add a phone number</span>
                                </div>
                                <div class="col-md-6">
                                    <label>E-Mail: <span class="red">*</span>
                                    </label>
                                    <input type="email" name="contact_email[]" class="form-control" placeholder="E-mail" required />
                                    <div id="contactEmailsDIV">
                                        
                                    </div>
                                    <span class="span-add" onClick="addContactEmail()">Add an email address</span>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-12">
                                    <label>Notes:</label>
                                    <textarea class="form-control" name="contact_notes" placeholder="Enter contact notes" rows="4"></textarea>
                                </div>
                            </div>
                            <button class="btn material success">Save contact</button>
                            <button type="button" class="btn material danger pull-right" onClick="hideAddContactPopup()">Cancel</button>
                        </form>
                    </div>
                </div>
                <div class="panel panel-primary" id="editContactDIV" hidden>
                    <div class="panel-heading">
                        <div class="panel-heading-btn">
                            <button class="btn btn-xs btn-icon btn-circle btn-default" onClick="hideEditContactPopup()"><i class="fa fa-times"></i>
                            </button>
                        </div>
                        <h4 class="panel-title">Edit contact</h4>
                    </div>
                    <div class="panel-body">
                        <form id="editContactForm" action="<?= BASE_URL . "contacts/edit" ?>" method="post" class="form-horizontal">
                            <input id="hiddenEditContactIDInput" type="hidden" name="contact_id" />
							<div class="form-group">
								<div class="col-md-12">
									<label id="contactCreatedByLabel"></label><br>
									<label id="contactLastModifiedLabel"></label>
								</div>
							</div>
                            <div class="form-group">
                                <div class="col-md-12">
                                    <label>Contact type:</label><br>
                                    <div class="radio radio-css radio-inline radio-primary">
                                        <input type="radio" id="cqb1" name="contact_type" value="Client" checked>
                                        <label for="cqb1">
                                        	Client
                                        </label>
                                    </div>
                                    <div class="radio radio-css radio-inline radio-primary">
                                        <input type="radio" id="cqb2" name="contact_type" value="Supplier">
                                        <label for="cqb2">
                                        	Supplier
                                        </label>
                                    </div>
                                    <div class="radio radio-css radio-inline radio-primary">
                                        <input type="radio" id="cqb3" name="contact_type" value="Partner">
                                        <label for="cqb3">
                                        	Partner
                                        </label>
                                    </div>
                                    <div class="radio radio-css radio-inline radio-primary">
                                        <input type="radio" id="cqb4" name="contact_type" value="Other">
                                        <label for="cqb4">
                                            Other
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-6">
                                    <label>Name: <span class="red">*</span></label>
                                    <input id="editContactNameInput" type="text" class="form-control" name="contact_name" placeholder="Contact name" />
                                </div>
                                <div class="col-md-6">
                                    <label>Surname: <span class="red">*</span></label>
                                    <input id="editContactSurnameInput" type="text" class="form-control" name="contact_surname" placeholder="Contact surname" />
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-12">
                                    <label>Position:</label>
                                    <input id="editContactPositionInput" type="text" class="form-control" name="contact_position" placeholder="Position" />
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-6">
                                    <label>Phone number: <span class="red">*</span>
                                    </label>
                                    <input id="editContactPhoneInput" type="text" name="contact_phone[]" class="tel-input form-control m-b-5"  required />
                                    <div id="editContactPhoneNrsDIV">
                                        
                                    </div>
                                    <span class="span-add" onClick="addEditContactPhoneNr()">Add a phone number</span>
                                </div>
                                <div class="col-md-6">
                                    <label>E-Mail: <span class="red">*</span>
                                    </label>
                                    <input id="editContactEmailInput" type="email" name="contact_email[]" class="form-control" placeholder="E-mail" required />
                                    <div id="editContactEmailsDIV">
                                        
                                    </div>
                                    <span class="span-add" onClick="addEditContactEmail()">Add an email address</span>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-12">
                                    <label>Notes:</label>
                                    <textarea id="editContactNotesInput" class="form-control" name="contact_notes" placeholder="Enter contact notes" rows="4"></textarea>
                                </div>
                            </div>
                            <button class="btn material success">Save changes</button>
                            <button type="button" class="btn material danger pull-right" onClick="hideEditContactPopup()">Cancel</button>
                        </form>
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
											<div class="col-xs-12 col-sm-6 col-md-4">
												<label>Start date: <span class="text-danger">*</span></label>
												<div class="input-group event-date-picker">
													<input id="editEventStartDateInput" type="text" name="event_startdate" class="form-control"  placeholder="Choose start date" required />
													<span class="input-group-addon btn bg-primary">
													   <span class="fa fa-calendar text-white"></span>
													</span>                    
												</div>
											</div>
											<div class="col-xs-12 col-sm-6 col-md-2">
												<label>Start time: <span class="text-danger">*</span></label>
												<div class="input-group event-time-picker">
													<input id="editEventStartTimeInput" type="text" name="event_starttime" class="form-control"  placeholder="Choose start time" required />
													<span class="input-group-addon btn bg-primary">
													   <span class="fa fa-clock text-white"></span>
													</span>                    
												</div>
											</div>
											<div class="col-xs-12 col-sm-6 col-md-4">
												<label>End date: <span class="text-danger">*</span></label>
												<div class="input-group event-date-picker">
													<input id="editEventEndDateInput" type="text" name="event_enddate" class="form-control"  placeholder="Choose end date" required />
													<span class="input-group-addon btn bg-primary">
													   <span class="fa fa-calendar text-white"></span>
													</span>                    
												</div>
											</div>
											<div class="col-xs-12 col-sm-6 col-md-2">
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
            <div class="popupContainer" id="uploadPopup" hidden>
                <div class="panel panel-primary" id="uploadFileDIV" hidden>
                    <div class="panel-heading">
                        <div class="panel-heading-btn">
                            <button onclick="hideUploadPopup()" class="btn btn-xs btn-icon btn-circle btn-default"><i class="fa fa-times"></i></button>
                        </div>
                        <h4 class="panel-title">Upload a document</h4>
                    </div>
                    <div class="panel-body">
                        <form id="uploadFileForm" action="customer/upload" method="post" class="form-horizontal dropzone" enctype="multipart/form-data">
                            <input id="uploadCustomerIDInput" type="hidden" name="customer_id" value="<?php echo $customer["customer_id"] ?>" />
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
                        <div id="pMap">
                        </div>
                    </div>
                </div>
            </div>
            <div class="popupContainer" id="callPopupDIV" hidden>
                <div class="panel panel-primary" id="editCallDIV" hidden>
                        <div class="panel-heading">
                            <div class="panel-heading-btn">
                                <button onclick="hideEditCallPopup()" class="btn btn-xs btn-icon btn-circle btn-default" ><i class="fa fa-times"></i></button>
                            </div>
                            <h4 class="panel-title">Edit call</h4>
                        </div>
                        <div class="panel-body">
                            <form id="editCallForm" action="telephony/editCall" method="post" class="form-horizontal">
                                    <input type="hidden" id="editCallHiddenIDInput" name="call_id" >
                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <label>Subject: <span class="red">*</span></label><br>
                                            <div class="radio radio-css radio-inline radio-primary">
                                                    <input type="radio" name="call_subject" id="nar1" value="Information" checked>
                                                    <label for="nar1">
                                                        Information
                                                    </label>
                                                </div>
                                                <div class="radio radio-css radio-inline radio-primary">
                                                    <input type="radio" name="call_subject" id="nar2" value="Reclamation" >
                                                    <label for="nar2">
                                                        Reclamation
                                                    </label>
                                                </div>
                                                <div class="radio radio-css radio-inline radio-primary">
                                                    <input type="radio" name="call_subject" id="nar3" value="Order">
                                                    <label for="nar3">
                                                        Order
                                                    </label>
                                                </div>
                                                <div class="radio radio-css radio-inline radio-primary">
                                                    <input type="radio" name="call_subject" id="nar4" value="Other">
                                                    <label for="nar4">
                                                        Other
                                                    </label>
                                                </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <label>Customer: </label>
                                            <select id="editCallCustomerSelect" class="form-control" name="customer_id">
                                                <option value="">Choose a customer</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <label>Notes:</label>
                                            <textarea id="editCallNotesInput" class="form-control" name="call_notes" rows="4" placeholder="Enter call notes"></textarea>
                                        </div>
                                    </div>
                                    <button class="btn material primary">Save changes</button>
                                    <button class="btn material danger pull-right">Cancel</button>
                            </form>
                    </div>
                </div>
			</div>
			<div class="popupContainer" id="subsidiaryPopupDIV" hidden>
					<div class="panel panel-primary" id="addSubsidiaryDIV" hidden>
						<div class="panel-heading">
							<div class="panel-heading-btn">
								<button class="btn btn-xs btn-icon btn-circle btn-default" onClick="hideAddSubsidiaryPopup()"><i class="fa fa-times"></i>
								</button>
							</div>
							<h4 class="panel-title">Add a subsidiary company</h4>
						</div>
						<div class="panel-body">
							<form id="addSubsidiaryForm" action="<?= BASE_URL . "subsidiary/add" ?>" method="post" class="form-horizontal">
								<input id="hiddenSubsidiaryCustomerIDInput" type="hidden" name="customer_id" />
								<input id="hiddenSubsidiaryLatitudeInput" type="hidden" name="latitude" />
								<input id="hiddenSubsidiaryLongitudeInput" type="hidden" name="longitude" />
								<div class="form-group">
									<div class="col-md-8">
										<label>Subsidiary name: <span class="red">*</span></label>
										<input type="text" class="form-control" name="subsidiary_name" placeholder="Subsidiary name" />
									</div>
									<div class="col-md-4">
										<label>VAT:</label>
										<input type="text" class="form-control" name="subsidiary_vat" placeholder="VAT" />
									</div>
								</div>
								<div class="form-group">
									<div class="col-md-6">
										<label>Phone number:
										</label>
										<input type="text" name="contact_phone[]" class="tel-input form-control m-b-5" />
										<div id="subsidiaryPhoneNrsDIV" class="m-b-5">
											
										</div>
										<span class="span-add" onClick="addSubsidiaryPhoneNr()"><i class="fas fa-plus-circle m-r-5"></i>Add a phone number</span>
									</div>
									<div class="col-md-6">
										<label>E-Mail:
										</label>
										<input type="email" name="subsidiary_email[]" class="form-control" placeholder="E-mail" />
										<div id="subsidiaryEmailsDIV" class="m-b-5">
											
										</div>
										<span class="span-add" onClick="addSubsidiaryEmail()"><i class="fas fa-plus-circle m-r-5"></i>Add an email address</span>
									</div>
								</div>
								<div class="form-group">
									<div class="col-xs-12 col-sm-4 col-md-4">
										<label>Building: <span class="red">*</span></label>
										<input id="subsidiaryBuildingInput" type="text" class="form-control" name="subsidiary_building" placeholder="Enter building name" required />
									</div>
									<div class="col-xs-12 col-sm-6 col-md-8">
										<label>Address: <span class="red">*</span>
										</label>
										<input id="subsidiaryAddressInput" type="text" name="subsidiary_address" class="form-control" placeholder="Enter an address" required />
									</div>
								</div>
								<div class="form-group">
									<div class="col-md-12">
										<label>Notes:</label>
										<textarea class="form-control" name="subsidiary_notes" placeholder="Enter contact notes" rows="4"></textarea>
									</div>
								</div>
								<button class="btn material success">Add subsidiary company</button>
								<button type="button" class="btn material danger pull-right" onClick="hideAddContactPopup()">Cancel</button>
							</form>
						</div>
					</div>
					<div class="panel panel-primary" id="editSubsidiaryDIV" hidden>
						<div class="panel-heading">
							<div class="panel-heading-btn">
								<button class="btn btn-xs btn-icon btn-circle btn-default" onClick="hideEditSubsidiaryPopup()"><i class="fa fa-times"></i>
								</button>
							</div>
							<h4 class="panel-title">Edit subsidiary</h4>
						</div>
						<div class="panel-body">
							<form id="editSubsidiaryForm" action="<?= BASE_URL . "subsidiary/edit" ?>" method="post" class="form-horizontal">
								<input id="hiddenEditSubsidiaryIDInput" type="hidden" name="subsidiary_id" />
								<input id="hiddenEditSubsidiaryCustomerIDInput" type="hidden" name="customer_id" />
								<input id="hiddenEditSubsidiaryLatitudeInput" type="hidden" name="latitude" />
								<input id="hiddenEditSubsidiaryLongitudeInput" type="hidden" name="longitude" />
								<div class="form-group">
									<div class="col-md-8">
										<label>Subsidiary name: <span class="red">*</span></label>
										<input id="editSubsidiaryNameInput" type="text" class="form-control" name="subsidiary_name" placeholder="Subsidiary name" />
									</div>
									<div class="col-md-4">
										<label>VAT:</label>
										<input id="editSubsidiaryVATInput" type="text" class="form-control" name="subsidiary_vat" placeholder="VAT" />
									</div>
								</div>
								<div class="form-group">
									<div class="col-md-6">
										<label>Phone number:
										</label>
										<input id="editSubsidiaryContactInput" type="text" name="contact_phone[]" class="tel-input form-control m-b-5" />
										<div id="editSubsidiaryPhoneNrsDIV" class="m-b-5">
											
										</div>
										<span class="span-add" onClick="addEditSubsidiaryPhoneNr()"><i class="fas fa-plus-circle m-r-5"></i>Add a phone number</span>
									</div>
									<div class="col-md-6">
										<label>E-Mail:
										</label>
										<input id="editSubsidiaryEmailInput" type="email" name="subsidiary_email[]" class="form-control" placeholder="E-mail" />
										<div id="editSubsidiaryEmailsDIV" class="m-b-5">
											
										</div>
										<span class="span-add" onClick="addEditSubsidiaryEmail()"><i class="fas fa-plus-circle m-r-5"></i>Add an email address</span>
									</div>
								</div>
								<div class="form-group">
									<div class="col-xs-12 col-sm-4 col-md-4">
										<label>Building: <span class="red">*</span></label>
										<input id="editSubsidiaryBuildingInput" type="text" class="form-control" name="subsidiary_building" placeholder="Enter building name" required />
									</div>
									<div class="col-xs-12 col-sm-6 col-md-8">
										<label>Address: <span class="red">*</span>
										</label>
										<input id="editSubsidiaryAddressInput" type="text" name="subsidiary_address" class="form-control" placeholder="Enter an address" required />
									</div>
								</div>
								<div class="form-group">
									<div class="col-md-12">
										<label>Notes:</label>
										<textarea id="editSubsidiaryNotesInput" class="form-control" name="subsidiary_notes" placeholder="Enter contact notes" rows="4"></textarea>
									</div>
								</div>
								<button class="btn material success">Edit subsidiary company</button>
								<button type="button" class="btn material danger pull-right" onClick="hideAddContactPopup()">Cancel</button>
							</form>
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
	<script src="<?= ASSETS_URL . "dropzone/min/dropzone.min.js" ?>"></script>
	<link href="<?= ASSETS_URL . "dropzone/min/dropzone.min.css" ?>" rel="stylesheet" />
	<link href="<?= ASSETS_URL . "DataTables/media/css/dataTables.bootstrap.min.css" ?>" rel="stylesheet" />
	<link href="<?= ASSETS_URL . "DataTables/extensions/Responsive/css/responsive.bootstrap.min.css" ?>" rel="stylesheet" />
	<script src="<?= ASSETS_URL . "DataTables/media/js/jquery.dataTables.js" ?>"></script>
	<script src="<?= ASSETS_URL . "DataTables/media/js/dataTables.bootstrap.min.js" ?>"></script>
	<script src="<?= ASSETS_URL . "DataTables/extensions/Responsive/js/dataTables.responsive.min.js" ?>"></script>
	<script src="<?= ASSETS_URL . "telinput/build/js/intlTelInput.min.js" ?>"></script>
	<script src="<?= ASSETS_URL . "telinput/build/js/utils.js" ?>"></script>
	<script src="<?= ASSETS_URL . "bootstrap-wizard/js/bwizard.js" ?>"></script>
	<script src="<?= ASSETS_URL . "fullcalendar/lib/moment.min.js" ?>"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/js/bootstrap-datetimepicker.min.js"></script>
	<script src="<?= ASSETS_URL . "jquery-file-upload/js/jquery.fileupload.js" ?>"></script>
	<script src="<?= ASSETS_URL . "select2/dist/js/select2.full.min.js" ?>"></script>
	<script src="<?= ASSETS_URL . "morris/raphael.min.js" ?>"></script>
    <script src="<?= ASSETS_URL . "morris/morris.js" ?>"></script>
	
	<!-- ================== END PAGE LEVEL JS ================== -->
	
	<script>
	    var loggedEmployee = <?php echo json_encode($_SESSION["id"]); ?>;
	    var contacts = <?php echo json_encode($contacts); ?>;
		var subsidiaries = <?php echo json_encode($subsidiaries); ?>;
	    var customer = <?php echo json_encode($customer); ?>;
	    var events = <?php echo json_encode($events); ?>;
	    var calls = <?php echo json_encode($calls); ?>;
		var sla = <?php echo json_encode($sla); ?>;
	    var documents = <?php echo json_encode($documents); ?>;
	    var customer_id = <?php echo json_encode($customer["customer_id"]); ?>;
	    var isAdmin = <?php echo json_encode($_SESSION["admin"]); ?>;
	    
	    var map;
	    var eventFiles = [];
	    var droppedFiles = [];
	    var pMap;
	    var mapMarker;
		var sTable;
		var cTable;
		
		var currentEvent;
	    var googleSignedIn;
		
		var employeeArray = [];
		var customersArray = [];
		var subsidiariesArray = [];
		
		var eventFiles = [];
		var editEventFiles = [];
		
		var mapMarkers = [];
		
		var ticketChart;
		var workorderChart;
		
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
			getMenuStatistics(loggedEmployee);
			App.init();
			getEmployees();
			getCustomers();
			initContacts();
			initSubsidiaries();
			getAllSubsidiaries();
			drawTicketsChart();
			drawWorkordersChart();
			
			$('a[data-toggle="tab"]').on('shown.bs.tab', function(e) {
			  var target = $(e.target).attr("href") // activated tab

			  switch (target) {
				case "#customer-sla":
				  if (ticketChart != null){
					ticketChart.redraw();
				  }
				  if (workorderChart != null){
					workorderChart.redraw();
				  }
				  $(window).trigger('resize');
				  break;
			  }
			});


			$(".tel-input").intlTelInput({ initialCountry: "auto",
			geoIpLookup: function(callback) {
                $.get('https://ipinfo.io', function() {}, "jsonp").always(function(resp) {
                  var countryCode = (resp && resp.country) ? resp.country : "";
                  callback(countryCode);
                });
            }});
            
            if (isAdmin == 1){
			    $("#eventEmployeeSelectDIV, #editEventEmployeeSelectDIV").removeClass("hide");
			}
            
            $("#eventEmployeeSelect, #editEventEmployeeSelect, #eventCustomerSelect, #editEventCustomerSelect, #eventSubsidiarySelect, #editEventSubsidiarySelect").select2({width: "100%"});
            
            $(".event-date-picker").datetimepicker({format: "YYYY-MM-DD", "defaultDate": new Date(), allowInputToggle: true });
			$(".event-time-picker").datetimepicker({format: "HH:mm", stepping:5, "defaultDate": new Date(), allowInputToggle: true });
			$("#newEventFirstReminder, #newEventSecondReminder, #newEventThirdReminder, #editEventFirstReminder, #editEventSecondReminder, #editEventThirdReminder").datetimepicker({format: "YYYY-MM-DD HH:mm", stepping: 5});
            
            $('#customerSLAForm').on('submit', function(e) { //use on if jQuery 1.7+
                e.preventDefault();
                $.ajax({
                    type: "POST",
                    url: "customer/sla",
                    data: $("#customerSLAForm").serialize(),
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
            
            $("#eventViewDropdown li").on("click", function(){
                var selected = $(this).index();
                $("#eventViewDropdown li").removeClass("active");
                $(this).addClass("active");
                filterEventsByDate(selected)
            });
            
            $("#callViewDropdown li").on("click", function(){
                var selected = $(this).index();
                $("#callViewDropdown li").removeClass("active");
                $(this).addClass("active");
                filterCallsByDate(selected)
            });
            
            $("#documentViewDropdown li").on("click", function(){
                var selected = $(this).index();
                $("#documentViewDropdown li").removeClass("active");
                $(this).addClass("active");
                filterDocumentsByDate(selected)
            });
            
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
                    getDocuments();
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
                formData.append('customer_id', $("#uploadCustomerIDInput").val());
                $("#uploadFileBtn").html('<i class="fa fa-spinner fa-pulse"></i>&nbsp;Uploading file...');
                console.log(formData);
                $.ajax({
                    url: "customer/upload",
                    type: "POST",
                    data: formdata,
                    mimeTypes:"multipart/form-data",
                    contentType: false,
                    cache: false,
                    processData: false,
                    dataType: "json",
                    success: function(response){
                        if (!response.error) {
                            swal(
                                'Success!',
                                'File was successfully uploaded.',
                                'success'
                            );
                            getDocuments();
                            hideUploadPopup();
                        } else {
                            swal(
                                'Error!',
                                'There was an error while uploading the file, please try again.',
                                'error'
                            );
                        }
                    }
                });
            });
            
            
            
            $('#editCallForm').on('submit', function(e) { //use on if jQuery 1.7+
                e.preventDefault();
                $.ajax({
                    type: "POST",
                    url: "<?= BASE_URL ?>" + "telephony/editCall",
                    data: $("#editCallForm").serialize(),
                    success: function(response) {
                        if (response == ""){
                            swal(
                                'Success!',
                                'Call was successfully edited.',
                                'success'
                            );
                            getCalls();
                            hideEditCallPopup();
                        }else{
                            swal(
                                'Error!',
                                'The server encountered the following error: ' + msg,
                                'error'
                            );
                        }
                    }
                });
		    });
			
			$('#addSubsidiaryForm').on('submit', function(e) { //use on if jQuery 1.7+
                e.preventDefault();
                var fullPhoneNrs = [];
                $("#addSubsidiaryForm .tel-input").each(function(index) {
                  fullPhoneNrs.push($(this).intlTelInput("getNumber"));
                });
                var postData = $("#addSubsidiaryForm").serializeArray();
                postData.push({ name: "subsidiary_phones", value: fullPhoneNrs });
                
                $.ajax({
                    type: "POST",
                    url: "subsidiary/add",
                    data: postData,
                    success: function(msg) {
                        if (msg == "") {
                            swal(
                                'Success!',
                                'Subsidiary company was successfully added.',
                                'success'
                            );
							getSubsidiaries();
                            hideAddSubsidiaryPopup();
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
			
			$('#editSubsidiaryForm').on('submit', function(e) { //use on if jQuery 1.7+
                e.preventDefault();
                var fullPhoneNrs = [];
                $("#editSubsidiaryForm .tel-input").each(function(index) {
                  fullPhoneNrs.push($(this).intlTelInput("getNumber"));
                });
                var postData = $("#editSubsidiaryForm").serializeArray();
                postData.push({ name: "subsidiary_phones", value: fullPhoneNrs });
                
                $.ajax({
                    type: "POST",
                    url: "subsidiary/edit",
                    data: postData,
                    success: function(msg) {
                        if (msg == "") {
                            swal(
                                'Success!',
                                'Subsidiary company was successfully edited.',
                                'success'
                            );
							getSubsidiaries();
                            hideEditSubsidiaryPopup();
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
            
            $('#addContactForm').on('submit', function(e) { //use on if jQuery 1.7+
                e.preventDefault();
                var fullPhoneNrs = [];
                $("#addContactForm .tel-input").each(function(index) {
                  fullPhoneNrs.push($(this).intlTelInput("getNumber"));
                });
                var postData = $("#addContactForm").serializeArray();
                postData.push({ name: "contact_phones", value: fullPhoneNrs });
                
                $.ajax({
                    type: "POST",
                    url: "contacts/add",
                    data: postData,
                    success: function(msg) {
                        if (msg == "") {
                            swal(
                                'Success!',
                                'Contact was successfully added.',
                                'success'
                            );
                            getContacts();
                            hideAddContactPopup();
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
            
            $('#addEventForm').on('submit', function(e) { //use on if jQuery 1.7+
					e.preventDefault();
					var startD = $("#eventStartDateInput").val() + " " + $("#eventStartTimeInput").val();
					var endD = $("#eventEndDateInput").val() + " " + $("#eventEndTimeInput").val();
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
            
            $('#editEventForm').on('submit', function(e) { //use on if jQuery 1.7+
					e.preventDefault();
					var startD = $("#editEventStartDateInput").val() + " " + $("#editEventStartTimeInput").val();
					var endD = $("#editEventEndDateInput").val() + " " + $("#editEventEndTimeInput").val();
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
											
											getEvents();
											
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
											
											getEvents();
											
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
            
            $('#editContactForm').on('submit', function(e) { //use on if jQuery 1.7+
                e.preventDefault();
                var fullPhoneNrs = [];
                $("#editContactForm .tel-input").each(function(index) {
                  fullPhoneNrs.push($(this).intlTelInput("getNumber"));
                });
                var postData = $("#editContactForm").serializeArray();
                postData.push({ name: "contact_phones", value: fullPhoneNrs });
                $.ajax({
                    type: "POST",
                    url: "contacts/edit",
                    data: postData,
                    success: function(msg) {
                        if (msg == "") {
                            swal(
                                'Success!',
                                'Contact was successfully edited.',
                                'success'
                            );
                            getContacts();
                            hideEditContactPopup();
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
		
		function drawTicketsChart() {
			var tickets_by_date = sla.tickets_by_date;
			var tickets_by_type = sla.tickets_by_type;
			var ticket_resolution_times = sla.ticket_resolution_times;
			var tickets = sla.tickets;
			var chartData = [];
			for (var i = 0; i < tickets_by_date.length; i++) {
				chartData.push({
					"x": tickets_by_date[i].date,
					"y": tickets_by_date[i].ticketcount
				})
			}
			if (chartData.length) {
				ticketChart = Morris.Line({
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
			
			var custLow = customer.low_sla;
			var custNormal = customer.normal_sla;
			var custHigh = customer.high_sla;
			
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
			
			
			var averageTAT = Math.round((parseInt(lowPriority) + parseInt(normalPriority) + parseInt(highPriority)) / ticket_resolution_times.length);
			
			
			$("#ticketsLowPrioritySpan").html(Math.round(lowPriority) + " minutes");
			var lowRatio = (lowPriority / custLow) * 100;
			$("#ticketsLowPriorityBar").css("width", lowRatio + "%");
			if (lowRatio >= 100){
				$("#ticketsLowPriorityBar").addClass("bg-danger");
			}else{
				$("#ticketsLowPriorityBar").addClass("bg-success");
			}
			var normalRatio = (normalPriority / custNormal) * 100;
			$("#ticketsNormalPrioritySpan").html(Math.round(normalPriority) + " minutes");
			$("#ticketsNormalPriorityBar").css("width", normalRatio + "%");
			if (normalRatio >= 100){
				$("#ticketsNormalPriorityBar").addClass("bg-danger");
			}else{
				$("#ticketsNormalPriorityBar").addClass("bg-success");
			}
			var highRatio = (highPriority / custHigh) * 100;
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
		
		function drawWorkordersChart() {
			var workorders_by_date = sla.workorders_by_date;
			var workorder_resolution_times = sla.workorder_resolution_times;
			var workorders = sla.workorders;
			var chartData = [];
			for (var i = 0; i < workorders_by_date.length; i++) {
				chartData.push({
					"x": workorders_by_date[i].date,
					"y": workorders_by_date[i].workordercount
				})
			}
			if (chartData.length) {
				workorderChart = Morris.Line({
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
			
			var custLow = customer.low_sla;
			var custNormal = customer.normal_sla;
			var custHigh = customer.high_sla;
			
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
			var lowRatio = (lowPriority / custLow) * 100;
			$("#workordersLowPriorityBar").css("width", lowRatio + "%");
			if (lowRatio >= 100){
				$("#workordersLowPriorityBar").addClass("bg-danger");
			}else{
				$("#workordersLowPriorityBar").addClass("bg-success");
			}
			var normalRatio = (normalPriority / custNormal) * 100;
			$("#workordersNormalPrioritySpan").html(Math.round(normalPriority) + " minutes");
			$("#workordersNormalPriorityBar").css("width", normalRatio + "%");
			if (normalRatio >= 100){
				$("#workordersNormalPriorityBar").addClass("bg-danger");
			}else{
				$("#workordersNormalPriorityBar").addClass("bg-success");
			}
			var highRatio = (highPriority / custHigh) * 100;
			$("#workordersHighPrioritySpan").html(Math.round(highPriority) + " minutes");
			$("#workordersHighPriorityBar").css("width", highRatio + "%");
			if (highRatio >= 100){
				$("#workordersHighPriorityBar").addClass("bg-danger");
			}else{
				$("#workordersHighPriorityBar").addClass("bg-success");
			}
			
			$("#workordersAverageTAT").html(averageTAT);
			
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
		
		function getSubsidiaries(){
			var postData = { customer_id: customer.customer_id };
			$.ajax({
				type: "POST",
				url: "subsidiary/get",
				data: postData,
				dataType: "json",
				success: function(newSubsidiaries) {
					subsidiaries = newSubsidiaries;
					sTable.clear().rows.add(subsidiaries).draw();
					sTable.columns([5]).every(function(index) {
						var column = this;
						var name;
						if (index == 5) {
							name = "Added by";
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
					drawLocationsOnMap();
				}
			});
		}
		
		function initContacts(){
						cTable = $('#contactsTable').DataTable({
							"aaData": contacts,
							initComplete: function () {
								this.api().columns([5]).every(function (index) {
									var column = this;
									var name;
									if (index == 5){
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
										} );

									column.cells('', column[0]).render('display').sort().unique().each( function ( d, j ) {
										select.append( '<option value="'+d+'">'+d+'</option>' )
									} );
								} );
							},
							"columns": [
								{ "data": "contact_name" },
								{ "data": "contact_surname" },
								{ "data": "contact_type" },
								{ "data": "contact_phone" },
								{ "data": "contact_email" },
								{ "data": "employee_id" },
								{ "data": "created_on" },
								{ "defaultContent": '<span onClick="showEditContactPopup(this)" data-toggle="tooltip" title="Edit" class="text-primary pull-left pointer"><i class="fa fa-edit"></i></span></span><span onClick="deleteContact(this)" data-toggle="tooltip" title="Delete" class="text-danger m-l-5 pull-left pointer"><i class="fa fa-trash"></i></span>'}
							],
							"columnDefs": [
								{
									// The `data` parameter refers to the data for the cell (defined by the
									// `data` option, which defaults to the column being worked with, in
									// this case `data: 0`.
									"render": function ( data, type, row ) {
										return "<a class='text-primary hover-underline' href='employeepage?employee_id=" + data + "' target='_blank' >" + row.employee_name + " " + row.employee_surname + '</a>';
									},
									"targets": 5,
									orderable: false
								},
								{
									// The `data` parameter refers to the data for the cell (defined by the
									// `data` option, which defaults to the column being worked with, in
									// this case `data: 0`.
									"render": function ( data, type, row ) {
										return moment(data).format("ddd, Do MMM, HH:mm");
									},
									"targets": 6,
									orderable: false
								},
								{
									"targets": 7,
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
		
		function deleteSubsidiary(row){
			var actualRow = $(row).parents('tr');
			if (actualRow.hasClass('child')) {//Check if the current row is a child row
				actualRow = actualRow.prev();//If it is, then point to the row before it (its 'parent')
			}
            var subsidiary = subsidiariesTable.row(actualRow).data();
            swal({
              title: 'Confirm action',
              text: "Are you sure you want to delete this subsidiary?",
              type: 'error',
              showCancelButton: true,
              confirmButtonColor: '#3085d6',
              cancelButtonColor: '#d33',
              confirmButtonText: 'Yes, remove'
            }).then(function () {
                var values = { subsidiary_id: subsidiary.subsidiary_id };
                $.ajax({
                    type: "POST",
                    url: "subsidiary/delete",
                    data: values,
                    success: function(msg) {
                        if (msg == "") {
                            swal(
                                'Success!',
                                'Subsidiary was successfully removed.',
                                'success'
                            );
                            getSubsidiaries();
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
		
		function deleteContact(row){
			var actualRow = $(row).parents('tr');
			if (actualRow.hasClass('child')) {//Check if the current row is a child row
				actualRow = actualRow.prev();//If it is, then point to the row before it (its 'parent')
			}
            var contact = contactsTable.row(actualRow).data();
            swal({
              title: 'Confirm action',
              text: "Are you sure you want to delete this contact?",
              type: 'error',
              showCancelButton: true,
              confirmButtonColor: '#3085d6',
              cancelButtonColor: '#d33',
              confirmButtonText: 'Yes, remove'
            }).then(function () {
                var values = { contact_id: contact.contact_id };
                $.ajax({
                    type: "POST",
                    url: "contacts/delete",
                    data: values,
                    success: function(msg) {
                        if (msg == "") {
                            swal(
                                'Success!',
                                'Contact was successfully removed.',
                                'success'
                            );
                            getContacts();
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
		
		function initSubsidiaries(){
			sTable = $('#subsidiariesTable').DataTable({
							"aaData": subsidiaries,
							initComplete: function () {
								this.api().columns([5]).every(function (index) {
									var column = this;
									var name;
									if (index == 5){
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
										} );

									column.cells('', column[0]).render('display').sort().unique().each( function ( d, j ) {
										select.append( '<option value="'+d+'">'+d+'</option>' )
									} );
								} );
							},
							"columns": [
								{ "data": "subsidiary_name" },
								{ "data": "subsidiary_phone" },
								{ "data": "subsidiary_email" },
								{ "data": "subsidiary_building" },
								{ "data": "subsidiary_address" },
								{ "data": "employee_id" },
								{ "defaultContent": '<span onClick="showEditSubsidiaryPopup(this)" data-toggle="tooltip" title="Edit" class="text-primary pull-left pointer"><i class="fa fa-edit"></i></span><span onClick="deleteSubsidiary(this)" data-toggle="tooltip" title="Delete" class="text-danger m-l-5 pull-left pointer"><i class="fa fa-trash"></i></span>'}
							],
							"columnDefs": [
							{
									// The `data` parameter refers to the data for the cell (defined by the
									// `data` option, which defaults to the column being worked with, in
									// this case `data: 0`.
									"render": function ( data, type, row ) {
										return "<a class='text-primary hover-underline' href='employeepage?employee_id=" + data + "' target='_blank' >" + row.employee_name + " " + row.employee_surname + '</a>';
									},
									"targets": 5,
									orderable: false
								},
								{
									// The `data` parameter refers to the data for the cell (defined by the
									// `data` option, which defaults to the column being worked with, in
									// this case `data: 0`.
									"render": function ( data, type, row ) {
										return '<span class="text-primary hover-underline" onClick="showSubsidiaryOnMap(this)">' + data + '</span>';
									},
									"targets": 4
								},
								{
									// The `data` parameter refers to the data for the cell (defined by the
									// `data` option, which defaults to the column being worked with, in
									// this case `data: 0`.
									"render": function ( data, type, row ) {
										return data.split(";")[0];
									},
									"targets": 2
								},
								{
									// The `data` parameter refers to the data for the cell (defined by the
									// `data` option, which defaults to the column being worked with, in
									// this case `data: 0`.
									"render": function ( data, type, row ) {
										return data.split(";")[0];
									},
									"targets": 1
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
		}
		
		function showOnMap(){
            if (mapMarker != null){
	            mapMarker.setMap(null);
	        }
            mapMarker = new google.maps.Marker({
                position: new google.maps.LatLng(customer.latitude, customer.longitude),
                map: pMap,
                title: 'Customer location'
            });
            
            
            $("#mapPopup, #mapDIV").show();
            google.maps.event.trigger(pMap, 'resize');
            pMap.setZoom(map.getZoom());
			var center = new google.maps.LatLng(parseFloat(subsidiary.latitude), parseFloat(subsidiary.longitude));
            pMap.panTo(center);
        }
		
		function getAllSubsidiaries(){
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
		
		function showSubsidiaryOnMap(row){
			var actualRow = $(row).parents('tr');
			if (actualRow.hasClass('child')) {//Check if the current row is a child row
				actualRow = actualRow.prev();//If it is, then point to the row before it (its 'parent')
			}
            var subsidiary = sTable.row(actualRow).data();
			
            if (mapMarker != null){
	            mapMarker.setMap(null);
	        }
            mapMarker = new google.maps.Marker({
                position: new google.maps.LatLng(subsidiary.latitude, subsidiary.longitude),
                map: pMap,
                title: 'Subsidiary location'
            });
            
            
            $("#mapPopup, #mapDIV").show();
            google.maps.event.trigger(pMap, 'resize');
            pMap.setZoom(map.getZoom());
			var center = new google.maps.LatLng(parseFloat(subsidiary.latitude), parseFloat(subsidiary.longitude));
            pMap.panTo(center);
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
													'<input type="text" class="input-gray pull-left m-r-10" placeholder="Name and surname" name="external_names[]" />' +
													'<input type="email" class="input-gray pull-left m-r-10" placeholder="E-mail address" name="external_emails[]" />' +
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
		
		function addSubsidiaryPhoneNr(){
		    $("#subsidiaryPhoneNrsDIV").append('<div class="m-t-5"><input type="tel" name="subsidiary_phone[]" class="tel-input form-control" /></div>');
		    $(".tel-input").intlTelInput({ initialCountry: "auto",
			geoIpLookup: function(callback) {
                $.get('https://ipinfo.io', function() {}, "jsonp").always(function(resp) {
                  var countryCode = (resp && resp.country) ? resp.country : "";
                  callback(countryCode);
                });
            }});
		}
		
		function addSubsidiaryEmail(){
		    $("#subsidiaryEmailsDIV").append('<div class="m-t-5"><input type="email" name="subsidiary_email[]" class="form-control" placeholder="E-mail"/></div>');
		}
		
		function addEditSubsidiaryPhoneNr(){
		    $("#editSubsidiaryPhoneNrsDIV").append('<div class="m-t-5"><input type="tel" name="subsidiary_phone[]" class="tel-input form-control" /></div>');
		    $(".tel-input").intlTelInput({ initialCountry: "auto",
			geoIpLookup: function(callback) {
                $.get('https://ipinfo.io', function() {}, "jsonp").always(function(resp) {
                  var countryCode = (resp && resp.country) ? resp.country : "";
                  callback(countryCode);
                });
            }});
		}
		
		function addEditSubsidiaryEmail(){
		    $("#editSubsidiaryEmailsDIV").append('<div class="m-t-5"><input type="email" name="subsidiary_email[]" class="form-control" placeholder="E-mail"/></div>');
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
	    
	    function filterDocuments(){
	        var input, filter, ul, li, a, i;
            input = document.getElementById("searchDocumentsInput");
            filter = input.value.toUpperCase();
            ul = document.getElementById("documentTimeline");
            li = ul.getElementsByTagName("li");
            for (i = 0; i < li.length; i++) {
                if (li[i].innerHTML.toUpperCase().indexOf(filter) > -1) {
                    li[i].style.display = "";
                } else {
                    li[i].style.display = "none";
        
                }
            }
	    }
		
		function getEvents(){
            var postData = { customer_id: customer.customer_id };
            $.ajax({
                type: "POST",
                url: "<?= BASE_URL ?>" + "event/getCustomer",
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
                        			                '<button onClick="editEvent(' + event.event_id + ')" class="btn btn-link m-r-15"><i class="fa fa-edit fa-fw fa-lg m-r-3"></i> Edit event</button>' +
                        			                mapBtn +
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
														'<button onClick="editEvent(' + event.event_id + ')" class="btn btn-link m-r-15"><i class="fa fa-edit fa-fw fa-lg m-r-3"></i> Edit event</button>' +
														mapBtn +
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
                        			                '<button onClick="editEvent(' + event.event_id + ')" class="btn btn-link m-r-15"><i class="fa fa-edit fa-fw fa-lg m-r-3"></i> Edit event</button>' +
                        			                mapBtn +
                        			            '</div>' +
                        			        '</div>' +
                        			    '</li>';
                    }
                }
                $("#eventTimeline").html(timelineContent);
		}
		
		function getCalls(){
		    var postData = { customer_id: customer_id };
		    $.ajax({
                type: "POST",
                url: "<?= BASE_URL ?>" + "customer/calls",
                data: postData,
                dataType: "json",
                success: function(newCalls) {
                    calls = newCalls;
                    var timelineContent = "";
                    for (var i = 0; i < calls.length; i++){
                        var call = calls[i];
                        timelineContent += '<li>' +
                        			        '<div class="timeline-time">' +
                        			            '<span class="date">' + moment(call.call_datetime).format("dddd, Do MMMM YYYY") + '</span>' +
                        			            '<span class="time">' + moment(call.call_datetime).format("HH:mm") + '</span>' +
                        			        '</div> ' +
                        			        '<div class="timeline-icon">' +
                        			            '<a href="javascript:;">&nbsp;</a>' +
                        			        '</div>' +
                        			        '<div class="timeline-body">' +
                        			            '<div class="timeline-header">' +
                        			                '<span class="username">' + call.call_subject + '</span>' +
                        			            '</div>' +
                        			            '<div class="timeline-content">' +
                        			                '<h5 class="template-title">' +
                        			                    '<i class="fa fa-phone text-primary fa-fw"></i> ' + call.call_phonenumber + 
                        			                '</h5>' +
                        			                '<p>' + call.call_notes + '</p>' +
                                                '</div>' +
                        			            '<div class="timeline-footer">' +
                        			                '<button onClick="viewCall(' + call.call_id + ')" class="btn btn-link m-r-15"><i class="fa fa-edit fa-fw fa-lg m-r-3"></i> View call</button>' +
                        			            '</div>' +
                        			        '</div>' +
                        			    '</li>';
                    }
                    $("#callTimeline").html(timelineContent);
                }
		    });
		}
		
		function filterCallsByDate(selected){
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
                    for (var i = 0; i < calls.length; i++){
                        var call = calls[i];
                        var callDate = moment(call.call_datetime);
                        if (dayDiff != null && today.diff(callDate, 'days') <= dayDiff) {
                            timelineContent += '<li>' +
                        			        '<div class="timeline-time">' +
                        			            '<span class="date">' + callDate.format("dddd, Do MMMM YYYY") + '</span>' +
                        			            '<span class="time">' + callDate.format("HH:mm") + '</span>' +
                        			        '</div> ' +
                        			        '<div class="timeline-icon timeline-primary">' +
                        			            '<a href="javascript:;">&nbsp;</a>' +
                        			        '</div>' +
                        			        '<div class="timeline-body">' +
                        			            '<div class="timeline-header">' +
                        			                '<span class="username">' + call.call_subject + '</span>' +
                        			            '</div>' +
                        			            '<div class="timeline-content">' +
                        			                '<h5 class="template-title">' +
                        			                    '<i class="fa fa-phone text-primary fa-fw"></i> ' + call.call_phonenumber + 
                        			                '</h5>' +
                        			                '<p>' + call.call_notes + '</p>' +
                                                '</div>' +
                        			            '<div class="timeline-footer">' +
                        			                '<button onClick="viewCall(' + call.call_id + ')" class="btn btn-link m-r-15"><i class="fa fa-edit fa-fw fa-lg m-r-3"></i> View call</button>' +
                        			            '</div>' +
                        			        '</div>' +
                        			    '</li>';
                        }
                    }
                }else{
                    for (var i = 0; i < calls.length; i++){
                        var call = calls[i];
                        var callDate = moment(call.call_datetime);
                        timelineContent += '<li>' +
                        			        '<div class="timeline-time">' +
                        			            '<span class="date">' + callDate.format("dddd, Do MMMM YYYY") + '</span>' +
                        			            '<span class="time">' + callDate.format("HH:mm") + '</span>' +
                        			        '</div> ' +
                        			        '<div class="timeline-icon timeline-primary">' +
                        			            '<a href="javascript:;">&nbsp;</a>' +
                        			        '</div>' +
                        			        '<div class="timeline-body">' +
                        			            '<div class="timeline-header">' +
                        			                '<span class="username">' + call.call_subject + '</span>' +
                        			            '</div>' +
                        			            '<div class="timeline-content">' +
                        			                '<h5 class="template-title">' +
                        			                    '<i class="fa fa-phone text-primary fa-fw"></i> ' + call.call_phonenumber + 
                        			                '</h5>' +
                        			                '<p>' + call.call_notes + '</p>' +
                                                '</div>' +
                        			            '<div class="timeline-footer">' +
                        			                '<button onClick="viewCall(' + call.call_id + ')" class="btn btn-link m-r-15"><i class="fa fa-edit fa-fw fa-lg m-r-3"></i> View call</button>' +
                        			            '</div>' +
                        			        '</div>' +
                        			    '</li>';
                    }
                }
                $("#callTimeline").html(timelineContent);
		}
		
		function getDocuments(){
		    var postData = { customer_id: customer_id };
		    $.ajax({
                type: "POST",
                url: "<?= BASE_URL ?>" + "customer/documents",
                data: postData,
                dataType: "json",
                success: function(newDocuments) {
                    documents = newDocuments;
                    var timelineContent = "";
                    for (var i = 0; i < documents.length; i++){
                        var doc = documents[i];
                        timelineContent += '<li>' +
                        			        '<div class="timeline-time">' +
                        			            '<span class="date">' + moment(doc.datetime).format("dddd, Do MMMM YYYY") + '</span>' +
                        			            '<span class="time">' + moment(doc.datetime).format("HH:mm") + '</span>' +
                        			        '</div> ' +
                        			        '<div class="timeline-icon timeline-primary">' +
                        			            '<a href="javascript:;">&nbsp;</a>' +
                        			        '</div>' +
                        			        '<div class="timeline-body">' +
                        			            '<div class="timeline-header">' +
                        			                '<span class="username">' + doc.filename + '</span>' +
                        			            '</div>' +
                        			            '<div class="timeline-content">' +
                        			                '<h5 class="template-title">' +
                        			                    'Uploaded by: ' + doc.employee_name + " " + doc.employee_surname +
                        			                '</h5>' +
                                                '</div>' +
                        			            '<div class="timeline-footer">' +
                        			                '<a href="' + "<?= DIR_URL ?>"  + doc.filepath + '" download class="btn btn-link m-r-15"><i class="fa fa-download fa-fw fa-lg m-r-3"></i> Download file</a>' + 
                        			            '</div>' +
                        			        '</div>' +
                        			    '</li>';
                    }
                    $("#documentTimeline").html(timelineContent);
                }
		    });
		}
		
		function filterDocumentsByDate(selected) {
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
                for (var i = 0; i < documents.length; i++) {
                    var doc = documents[i];
                    var docDate = moment(doc.datetime);
                    if (dayDiff != null && today.diff(docDate, 'days') <= dayDiff) {
                        timelineContent += '<li>' +
                            '<div class="timeline-time">' +
                            '<span class="date">' + docDate.format("dddd, Do MMMM YYYY") + '</span>' +
                            '<span class="time">' + docDate.format("HH:mm") + '</span>' +
                            '</div> ' +
                            '<div class="timeline-icon timeline-primary">' +
                            '<a href="javascript:;">&nbsp;</a>' +
                            '</div>' +
                            '<div class="timeline-body">' +
                            '<div class="timeline-header">' +
                            '<span class="username">' + doc.filename + '</span>' +
                            '</div>' +
                            '<div class="timeline-content">' +
                            '<h5 class="template-title">' +
                            'Uploaded by: ' + doc.employee_name + " " + doc.employee_surname +
                            '</h5>' +
                            '</div>' +
                            '<div class="timeline-footer">' +
                            '<a href="' + "<?= DIR_URL ?>" + doc.filepath + '" download class="btn btn-link m-r-15"><i class="fa fa-download fa-fw fa-lg m-r-3"></i> Download file</a>' +
                            '</div>' +
                            '</div>' +
                            '</li>';
                    }
                }
            }else{
                for (var i = 0; i < documents.length; i++) {
                    var doc = documents[i];
                    var docDate = moment(doc.datetime);
                    timelineContent += '<li>' +
                            '<div class="timeline-time">' +
                            '<span class="date">' + docDate.format("dddd, Do MMMM YYYY") + '</span>' +
                            '<span class="time">' + docDate.format("HH:mm") + '</span>' +
                            '</div> ' +
                            '<div class="timeline-icon timeline-primary">' +
                            '<a href="javascript:;">&nbsp;</a>' +
                            '</div>' +
                            '<div class="timeline-body">' +
                            '<div class="timeline-header">' +
                            '<span class="username">' + doc.filename + '</span>' +
                            '</div>' +
                            '<div class="timeline-content">' +
                            '<h5 class="template-title">' +
                            'Uploaded by: ' + doc.employee_name + " " + doc.employee_surname +
                            '</h5>' +
                            '</div>' +
                            '<div class="timeline-footer">' +
                            '<a href="' + "<?= DIR_URL ?>" + doc.filepath + '" download class="btn btn-link m-r-15"><i class="fa fa-download fa-fw fa-lg m-r-3"></i> Download file</a>' +
                            '</div>' +
                            '</div>' +
                            '</li>';
                    
                }
            }
            $("#documentTimeline").html(timelineContent);
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
                            $("#editCustomerEmployeeSelect").append($('<option>', {
                                value: employees[i].employee_id,
                                text: employees[i].employee_name + " " + employees[i].employee_surname
                            }));
                    }
                    
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
		
		function getCustomers() {
            $.ajax({
                type: "POST",
                url: "<?= BASE_URL ?>" + "customer/get",
                data: null,
                dataType: "json",
                success: function(customers) {
                    customersArray = customers;
                    for (var i = 0; i < customers.length; i++){
                        $("#editEventCustomerSelect, #eventCustomerSelect, #editCallCustomerSelect").append($('<option>', {
                            value: customers[i].customer_id,
                            text: customers[i].customer_name
                        }));
                    }
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
        
        function viewCall(call_id){
            var call;
            for (var i = 0; i < calls.length; i++){
                if (calls[i].call_id == call_id){
                    call = calls[i];
                    break;
                }
            }
            $("#editCallHiddenIDInput").val(call.call_id);
            $("#editCallCustomerSelect").val(call.customer_id);
            $("#editCallNotesInput").val(call.call_notes);
            $("#editCallForm input[name=call_subject]").val([call.call_subject]);
            $("#callPopupDIV, #editCallDIV").show();
        }
        
        function viewTicket(ticket_id){
            var url = "<?= BASE_URL ?>" + "ticketdetails?ticket_id=" + ticket_id;
		    window.open(url, "_blank");
        }
        
        function hideEditCallPopup(){
            $("#editCallForm")[0].reset();
            $("#callPopupDIV, #editCallDIV").hide();
        }
		
		function initMap(){
		    var searchBox = new google.maps.places.SearchBox(document.getElementById('newEventAddressInput'));
            var editSearchBox = new google.maps.places.SearchBox(document.getElementById('editEventAddressInput'));
			var subsidiarySearchBox = new google.maps.places.SearchBox(document.getElementById('subsidiaryAddressInput'));
			var editSubsidiarySearchBox = new google.maps.places.SearchBox(document.getElementById('editSubsidiaryAddressInput'));
            
            var myOptions = {
                zoom: parseInt(14),
                center: new google.maps.LatLng(parseFloat(customer.latitude), parseFloat(customer.longitude)),
                mapTypeId: google.maps.MapTypeId.ROADMAP
            };
            
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
			
			google.maps.event.addListener(subsidiarySearchBox, 'places_changed', function() {
                var places = subsidiarySearchBox.getPlaces();
                var i, place;
                for (i = 0; place = places[i]; i++) {
                    (function(place) {
                        var location = place.geometry.location;
                        $("#hiddenSubsidiaryLatitudeInput").val(location.lat());
                        $("#hiddenSubsidiaryLongitudeInput").val(location.lng());
                    }(place));
                }
            });
			
			google.maps.event.addListener(editSubsidiarySearchBox, 'places_changed', function() {
                var places = editSubsidiarySearchBox.getPlaces();
                var i, place;
                for (i = 0; place = places[i]; i++) {
                    (function(place) {
                        var location = place.geometry.location;
                        $("#hiddenEditSubsidiaryLatitudeInput").val(location.lat());
                        $("#hiddenEditSubsidiaryLongitudeInput").val(location.lng());
                    }(place));
                }
            });
            
            map = new google.maps.Map(document.getElementById('map'), myOptions);
            pMap = new google.maps.Map(document.getElementById('pMap'), myOptions);
            
			drawLocationsOnMap();
			
            trafficLayer = new google.maps.TrafficLayer();
            trafficLayer.setMap(map);
		}
		
		function drawLocationsOnMap(){
			for (var i = 0; i < mapMarkers.length; i++){
				mapMarkers[i].setMap(null);
			}
			
			mapMarkers = [];
			
			var marker = new google.maps.Marker({
                position: { lat: parseFloat(customer.latitude), lng: parseFloat(customer.longitude) },
                map: map,
                title: 'Customer location'
            });
            var infoWindowContent = "<h4>Main company</h4><p class='f-s-12'><h5>" + customer.customer_name + "</h5><strong>Building: </strong>" + customer.customer_building + "<br><strong>Address: </strong>" + customer.customer_address + "</p>";
            addInfoWindow(map, marker, infoWindowContent);
			
			for (var i = 0; i < subsidiaries.length; i++){
				var subsidiary = subsidiaries[i];
				var marker = new google.maps.Marker({
					position: { lat: parseFloat(subsidiary.latitude), lng: parseFloat(subsidiary.longitude) },
					map: map,
					icon: "http://maps.google.com/mapfiles/ms/icons/blue-dot.png",
					title: 'Subsidiary location'
				});
				var infoWindowContent = "<h4>Subsidiary</h4><p class='f-s-12'><h5>" + subsidiary.subsidiary_name + "</h5><strong>Building: </strong>" + subsidiary.subsidiary_building + "<br><strong>Address: </strong>" + subsidiary.subsidiary_address + "</p>";
				addInfoWindow(map, marker, infoWindowContent);
			}
		}
		
		function addInfoWindow(gMap, marker, message) {
            var infoWindow = new google.maps.InfoWindow({
                content: message
            });

            google.maps.event.addListener(marker, 'click', function () {
                infoWindow.open(gMap, marker);
            });   
			
			mapMarkers.push(marker);
        }
	
		
		function getContacts(){
		    var postData = { customer_id: customer_id };
		    $.ajax({
                type: "POST",
                url: "customer/contacts",
                data: postData,
                dataType: "json",
                success: function(contactArray) {
                    contacts = contactArray;
                    cTable.clear().rows.add(contacts).draw();
					cTable.columns([5]).every(function(index) {
						var column = this;
						var name;
						if (index == 5) {
							name = "Added by";
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
                }
		    });
		}
		
		function viewEvent(event_id){
		    console.log("Viewing event");
		    var event;
		    for (var i = 0; i < events.length; i++){
		        if (events[i].event_id == event_id){
		            event = events[i];
		            break;
		        }
		    }
		    $("#eventSubjectInput").html(event.event_subject);
		    $("#eventStartDateInput").html(event.event_startdate + " " + event.event_starttime);
		    $("#eventLocationInput").html(event.event_address);
		    $("#eventDescriptionInput").html(event.event_description);
		    $("#eventPopupDIV, #viewEventDIV").show();
		}
		
		function hideViewEventPopup(){
		    $("#eventSubjectInput").html("");
		    $("#eventStartDateInput").html("");
		    $("#eventDescriptionInput").html("");
		    $("#eventPopupDIV, #viewEventDIV").hide();
		}
		
		function showUploadPopup(){
	        $("#uploadPopup, #uploadFileDIV").show();
	    }
	    
	    function hideUploadPopup(){
	        $("#uploadPopup, #uploadFileDIV").hide();
	    }
		
		function showAddContactPopup(){
		    $("#contactPopupDIV, #addContactDIV").show();
		}
		
		function hideAddContactPopup(){
		    $("#addContactForm")[0].reset();
		    $("#contactPhoneNrsDIV, #contactEmailsDIV").html("");
		    $("#contactPopupDIV, #addContactDIV").hide();
		}
		
		function showAddSubsidiaryPopup(row){
		    $("#hiddenSubsidiaryCustomerIDInput").val(customer.customer_id);
		    $("#subsidiaryPhoneNrsDIV, #subsidiaryEmailsDIV").html("");
		    $("#subsidiaryPopupDIV, #addSubsidiaryDIV").show();
		}
		
		function hideAddSubsidiaryPopup(){
			$("#addSubsidiaryForm")[0].reset();
			$("#subsidiaryPopupDIV, #addSubsidiaryDIV").hide();
		}
		
		function showEditSubsidiaryPopup(row){
		    var actualRow = $(row).parents('tr');
			if (actualRow.hasClass('child')) {//Check if the current row is a child row
				actualRow = actualRow.prev();//If it is, then point to the row before it (its 'parent')
			}
            var subsidiary = sTable.row(actualRow).data();
			$("#hiddenEditSubsidiaryIDInput").val(subsidiary.subsidiary_id);
			$("#hiddenEditSubsidiaryCustomerIDInput").val(subsidiary.customer_id);
			$("#hiddenEditSubsidiaryLatitudeInput").val(subsidiary.latitude);
			$("#hiddenEditSubsidiaryLongitudeInput").val(subsidiary.longitude);
			$("#editSubsidiaryNameInput").val(subsidiary.subsidiary_name);
			$("#editSubsidiaryVATInput").val(subsidiary.subsidiary_vat);
			var phoneNumbers = subsidiary.subsidiary_phone.split(";");
            var emails = subsidiary.subsidiary_email.split(";");
            $("#editSubsidiaryContactInput").val(phoneNumbers[0]);
            $("#editSubsidiaryEmailInput").val(emails[0]);
			$("#editSubsidiaryPhoneNrsDIV, #editSubsidiaryEmailsDIV").html("");
            if (phoneNumbers.length > 1){
                for (var i = 1; i < phoneNumbers.length; i++){
                    $("#editSubsidiaryPhoneNrsDIV").append('<div class="m-t-5"><input type="tel" name="subsidiary_phone[]" class="tel-input form-control" value="' + phoneNumbers[i] + '" /></div>')
                }
            }
            if (emails.length > 1){
                for (var i = 1; i < emails.length; i++){
                    $("#editSubsidiaryEmailsDIV").append('<div class="m-t-5"><input type="email" name="subsidiary_email[]" class="form-control" placeholder="E-mail" value="' + emails[i] + '" /></div>')
                }
            }
			$("#editSubsidiaryBuildingInput").val(subsidiary.subsidiary_building);
			$("#editSubsidiaryAddressInput").val(subsidiary.subsidiary_address);
			$("#editSubsidiaryNotesInput").html(subsidiary.subsidiary_notes);
			
			$(".tel-input").intlTelInput({ initialCountry: "auto",
			geoIpLookup: function(callback) {
                $.get('https://ipinfo.io', function() {}, "jsonp").always(function(resp) {
                  var countryCode = (resp && resp.country) ? resp.country : "";
                  callback(countryCode);
                });
            }});
			
			$("#subsidiaryPopupDIV, #editSubsidiaryDIV").show();
		}
		
		function hideEditSubsidiaryPopup(){
			$("#editSubsidiaryForm")[0].reset();
			$("#subsidiaryPopupDIV, #editSubsidiaryDIV").hide();
		}
		
		function showEditContactPopup(row){
		    var actualRow = $(row).parents('tr');
			if (actualRow.hasClass('child')) {//Check if the current row is a child row
				actualRow = actualRow.prev();//If it is, then point to the row before it (its 'parent')
			}
            var contact = cTable.row(actualRow).data();
		    $("#hiddenEditContactIDInput").val(contact.contact_id);
			$("#contactCreatedByLabel").html("Created by: " + contact.employee_name + " " + contact.employee_surname);
			$("#contactLastModifiedLabel").html("Last modified on: " + moment(contact.last_modified).format("dddd, Do MMMM, HH:mm"));
		    $("#editContactNameInput").val(contact.contact_name);
		    $("#editContactSurnameInput").val(contact.contact_surname);
		    $("#editContactPositionInput").val(contact.contact_position);
		    $("#editContactNotesInput").html(contact.contact_notes);
		    $("#editContactForm input[name=contact_type]").val([contact.contact_type]);
		    var phoneNumbers = contact.contact_phone.split(";");
            var emails = contact.contact_email.split(";");
            $("#editContactPhoneInput").val(phoneNumbers[0]);
            $("#editContactEmailInput").val(emails[0]);
            if (phoneNumbers.length > 1){
                for (var i = 1; i < phoneNumbers.length; i++){
                    $("#editContactPhoneNrsDIV").append('<div class="m-t-5"><input type="tel" name="contact_phone[]" class="tel-input form-control" value="' + phoneNumbers[i] + '" /></div>')
                }
            }
            if (emails.length > 1){
                for (var i = 1; i < emails.length; i++){
                    $("#editContactEmailsDIV").append('<div class="m-t-5"><input type="email" name="contact_email[]" class="form-control" placeholder="E-mail" value="' + emails[i] + '" /></div>')
                }
            }
            
            $("#contactPopupDIV, #editContactDIV").show();
		}
		
		function hideEditContactPopup(){
		    $("#editContactForm")[0].reset();
		    $("#editContactPhoneNrsDIV").html("");
		    $("#editContactEmailsDIV").html("");
		    $("#contactPopupDIV, #editContactDIV").hide();
		}
		
		function addContactPhoneNr(){
		    $("#contactPhoneNrsDIV").append('<div class="m-t-5"><input type="tel" name="contact_phone[]" class="tel-input form-control" /></div>');
		    $(".tel-input").intlTelInput({ initialCountry: "auto",
			geoIpLookup: function(callback) {
                $.get('https://ipinfo.io', function() {}, "jsonp").always(function(resp) {
                  var countryCode = (resp && resp.country) ? resp.country : "";
                  callback(countryCode);
                });
            }});
		}
		
		function addContactEmail(){
		    $("#contactEmailsDIV").append('<div class="m-t-5"><input type="email" name="contact_email[]" class="form-control" placeholder="E-mail"/></div>');
		}
		
		function addEditContactPhoneNr(){
		    $("#editContactPhoneNrsDIV").append('<div class="m-t-5"><input type="tel" name="contact_phone[]" class="tel-input form-control" /></div>');
		    $(".tel-input").intlTelInput({ initialCountry: "auto",
			geoIpLookup: function(callback) {
                $.get('https://ipinfo.io', function() {}, "jsonp").always(function(resp) {
                  var countryCode = (resp && resp.country) ? resp.country : "";
                  callback(countryCode);
                });
            }});
		}
		
		function addEditContactEmail(){
		    $("#editContactEmailsDIV").append('<div class="m-t-5"><input type="email" name="contact_email[]" class="form-control" placeholder="E-mail"/></div>');
		}
		
		function addEditEmail(){
		    $("#editEmailsDIV").append('<div class="m-t-5"><input type="email" name="customer_email[]" class="form-control" placeholder="E-mail"/></div>');
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
		
		function showEditCustomerPopup() {
            $("#hiddenEditCustomerIDInput").val(customer.customer_id);
            $("#editCustomerLongitudeInput").val(customer.longitude);
            $("#editCustomerLatitudeInput").val(customer.latitude);
            $("#editCustomerNameInput").val(customer.customer_name);
            $("#editCustomerVATInput").val(customer.customer_vat);
            var phoneNumbers = customer.customer_phone.split(";");
            var emails = customer.customer_email.split(";");
            $("#editCustomerContactInput").val(phoneNumbers[0]);
            $("#editCustomerEmailInput").val(emails[0]);
            if (phoneNumbers.length > 1){
                for (var i = 1; i < phoneNumbers.length; i++){
                    $("#editPhoneNrsDIV").append('<div class="m-t-5"><input type="tel" name="customer_phone[]" class="tel-input form-control" value="' + phoneNumbers[i] + '" /></div>')
                }
            }
            if (emails.length > 1){
                for (var i = 1; i < emails.length; i++){
                    $("#editEmailsDIV").append('<div class="m-t-5"><input type="email" name="customer_email[]" class="form-control" placeholder="E-mail" value="' + emails[i] + '" /></div>')
                }
            }
            
            $("#editCustomerWebsiteInput").val(customer.customer_website);
            $("#editCustomerAddressInput").val(customer.customer_address);
			$("#editCustomerBuildingInput").val(customer.customer_building);
            $("#editCustomerIndustrySelect").val(customer.customer_industry);
            $("#editCustomerEmployeeSelect").val(customer.employee_id);
            $("#editCustomerImportanceInput").val(customer.customer_importance);
            $("#editCustomerRangeValue").html(customer.customer_importance);
            $("#editCustomerNotesInput").val(customer.customer_notes);
            $("#editCustomerForm input[name=customer_visibility]").val([customer.customer_visibility]);
            $("#editCustomerForm input[name=business_entity]").val([customer.business_entity]);
            $("#editCustomerForm input[name=taxpayer]").val([customer.taxpayer]);
            $("#customerPopupDIV, #editCustomerDIV").show();
            
            $(".tel-input").intlTelInput({ initialCountry: "auto",
			geoIpLookup: function(callback) {
                $.get('https://ipinfo.io', function() {}, "jsonp").always(function(resp) {
                  var countryCode = (resp && resp.country) ? resp.country : "";
                  callback(countryCode);
                });
            }});
        }
        
        function hideEditCustomerPopup() {
            $("#editEmailsDIV, #editPhoneNrsDIV").html("");
            $("#customerPopupDIV, #editCustomerDIV").hide();
        }
        
        function editEvent(event_id){
            var event;
            for (var i = 0; i < events.length; i++){
                if (events[i].event_id == event_id){
                    event = events[i];
                }
            }
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
            $("#editEventStartDateInput").val(event.event_startdate);
            $("#editEventStartTimeInput").val(event.event_starttime);
			$("#editEventEndDateInput").val(event.event_enddate);
			$("#editEventEndTimeInput").val(event.event_endtime);
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
			$("#eventStartDateInput, #eventEndDateInput").val(moment().format("YYYY-MM-DD"));
			$("#eventStartTimeInput").val(moment().format("HH:mm"));
			$("#eventEndTimeInput").val(moment().add(1, "hours").format("HH:mm"));
			$("#eventCustomerSelect").val(customer_id).trigger("change");
            $("#eventPopupDIV, #addEventDIV").show();
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
                map: pMap,
                title: 'Event location'
            });
            
            
            $("#mapPopup, #mapDIV").show();
            google.maps.event.trigger(pMap, 'resize');
            map.setZoom(map.getZoom());
            map.setCenter({lat: parseFloat(event.latitude), lng: parseFloat(event.longitude)});
	    }
	    
	    function hideMapPopup(){
            $("#mapPopup, #mapDIV").hide();
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
                            
                			getEvents();
                			
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
	<script async defer src="https://apis.google.com/js/api.js" onload="this.onload=function(){};handleClientLoad()" onreadystatechange="if (this.readyState === 'complete') this.onload()"></script>
</body>
</html>
