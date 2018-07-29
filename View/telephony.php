<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
<!--<![endif]-->

<head>
    <meta charset="utf-8" />
    <title>Call center</title>
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
	
	<!-- ================== END BASE JS ================== -->
</head>
<style>
	#loadingSpinnerDIV{
        width: 400px;
        height: 80px;
        position: relative;
        background-color: white;
        margin: 15% auto 0px auto;
    }
	
	.spinner-loading {
		height: 40px;
		width: 40px;
		position: absolute;
		top: 50%;
		left: 50px;
		margin: -20px 0 0 -20px;
		border: 2px solid #00acac;
		border-top: 2px solid #fff;
		border-radius: 100%;
		animation: rotation .6s infinite linear;
	}
    
    .loadingLabel {
		position: absolute;
		text-align: center;
		font-size: 18px;
		line-height: 80px;
		width: 100%;
	}
    
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
	
	.list-email .read .email-title {
		font-weight: 600;
	}
    
    #incomingCallDIV, #outgoingCallDIV, #editCallDIV, #setupDIV, #editCustomerDIV, #campaignCallDIV, #blacklistDIV, #addBlacklistDIV, #editBlacklistDIV, #addSubscriberDIV, #editCampaignDIV, #emailSetupDIV, #simulateCallDIV{
        width: 700px;
        height: auto;
        position: relative;
        margin: 5% auto 0px auto;
    }
    
    
    
    #addCustomerDIV{
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
	
	.hover-pointer:hover{
		background-color: #f4f4f4;
		cursor: pointer;
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
    
    
    
    #emailList li:hover{
        background-color: #f4f4f4;
		cursor: pointer;
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
	
	.email-checkbox:hover{
		cursor: pointer;
	}
	
	#emailTicketsUL{
		list-style: none;
		-webkit-margin-before: 1em;
		-webkit-margin-after: 1em;
		-webkit-margin-start: 0px;
		-webkit-margin-end: 0px;
		-webkit-padding-start: 0px;
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
    
    
    
    #completedTable, #pendingTable, #allCallsTable, #missedCallsTable, #blacklistTable, #ticketsTable, #todaysCallsTable{
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
	
	#completedTable tr td:last-child, #pendingTable tr td:last-child, #allCallsTable tr td:last-child, #missedCallsTable tr td:last-child, #blacklistTable tr td:last-child, #ticketsTable tr td:last-child, #todaysCallsTable tr td:last-child{
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
								echo '<li class="has-sub active">
									<a href="javascript:;">
										<b class="caret pull-right"></b>
										<i class="ion-android-call"></i> 
										<span>Telephony</span>
									</a>
									<ul class="sub-menu">
										<li><a href="' . BASE_URL . 'telephonydashboard">Overview</a></li>
										<li class="active"><a href="' . BASE_URL . 'callcenter">Call center</a></li>
										
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
							<h4 class="m-t-10 m-b-5">Call center</h4>
							<p class="m-b-10"><?php echo "(Queue: " . $_SESSION["queue"] . ", Extension: " . $_SESSION["extension"] . ")"; ?></p>
						</div>
						<div class="input-group input-group-sm pull-left width-md">
                              <input id="callCustomerPhoneNumberInput" type="text" class="form-control" placeholder="Enter number to call" />
                              <span class="input-group-btn" >
                                <button class="btn btn-primary" type="button" onClick="callCustomer()"><i class="fa fa-phone"></i>&nbsp;Call</button>
                                <button class="btn btn-success mobile-btn" type="button" onClick="callMobile()"><i class="fas fa-mobile-alt"></i>&nbsp;Mobile</button>
                              </span>
                        </div>
                        <div class="pull-right">
						<button class="btn btn-white btn-sm" onClick="simulateCall()"><i class="fa fa-phone m-r-5 text-primary"></i>Simulate call</button>
                        <button class="btn btn-white btn-sm" onClick="showNewBlankTicketPopup()"><i class="fas fa-tag m-r-5 text-success"></i>Create a ticket</button>
                        <button class="btn btn-white btn-sm" onClick="showSetupPopup()"><i class="fas fa-cog m-r-5 text-primary"></i>Telephony settings</button>
						<button class="btn btn-white btn-sm" onClick="showEmailSetupPopup()"><i class="fas fa-cog m-r-5 text-primary"></i>E-mail settings</button>
                        <button class="btn btn-white btn-sm" onClick="logoutTelephony()"><i class="fas fa-sign-out-alt m-r-5 text-danger"></i>Logout</button>
                        </div>
                        <div class="clearfix"></div>
						<!-- END profile-header-info -->
					</div>
					<!-- END profile-header-content -->
					<!-- BEGIN profile-header-tab -->
					<ul class="profile-header-tab nav nav-tabs">
						<li class="nav-item active"><a href="#telephony-general" class="nav-link" data-toggle="tab" aria-expanded="true">GENERAL</a></li>
						<li class="nav-item"><a href="#telephony-overview" class="nav-link" data-toggle="tab" aria-expanded="false">OVERVIEW</a></li>
						<li class="nav-item"><a href="#telephony-ticketing" class="nav-link" data-toggle="tab" aria-expanded="false">TICKETING</a></li>
						<li class="nav-item"><a href="#campaign-overview" class="nav-link" data-toggle="tab" aria-expanded="false">CAMPAIGNS</a></li>
						<li class="nav-item"><a href="#blacklist-overview" class="nav-link" data-toggle="tab" aria-expanded="false">BLACKLIST</a></li>
					</ul>
					<!-- END profile-header-tab -->
				</div>
			</div>
			<div class="profile-content">
			<div class="tab-content">
			    <div class="tab-pane fade in active" id="telephony-general">
                    <div class="row">
                        <div class="col-md-8">
                            <div class="panel panel-inverse">
                                <div class="panel-heading">
                                    <div class="panel-heading-btn">
                                                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
                                                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
                                                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
                                    </div>
                                    <h4 class="panel-title">Todays calls</h4>
                                </div>
                                <div class="panel-body">
                                    <table id="todaysCallsTable" class="table table-striped ">
                                        <thead>
                                            <tr>
                                                <th>
                                                    Type
                                                </th>
												<th>
													Status
												</th>
                                                <th>
                                                    Agent
                                                </th>
                                                <th>
                                                    Customer
                                                </th>
                                                <th>
                                                    Time
                                                </th>
                                                <th>
                                                    Subject
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
                        <div class="col-md-4">
                            <div class="panel panel-inverse">
                                <div class="panel-heading">
                                <div class="panel-heading-btn">
                                            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
                                            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
                                            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
                                </div>
                                <h4 class="panel-title">Missed calls</h4>
                            </div>
                            <div class="panel-body">
                            <table id="missedCallsTable" class="table table-striped ">
                                <thead>
                                    <tr>
										<th>
											Queue
										</th>
                                        <th>
                                            Number
                                        </th>
                                        <th>
                                            Date
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
                    <div class="row" id="emailRow" hidden>
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
											if ($employee["telephony_email"] == 0){
												echo "IMAP account " . $employee["imap_username"];
											}else if ($employee["telephony_email"] == 1){
												echo "Office365 account";
											}else if ($employee["telephony_email"] == 2){
												echo "Exchange account " . $employee["exchange_username"];
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
                <div class="tab-pane fade" id="telephony-overview">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="panel panel-inverse">
                                <div class="panel-heading">
                                    <div class="panel-heading-btn">
                                        <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
                                        <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
                                        <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
                                    </div>
                                    <h4 class="panel-title">All calls</h4>
                                </div>
                                <div class="panel-body">
                                    
                                    <table id="allCallsTable" class="table table-striped ">
                                        <thead>
                                            <tr>
                                                <th>
                                                    Type
                                                </th>
												<th>
													Status
												</th>
                                                <th>
                                                    Agent
                                                </th>
                                                <th>
                                                    Customer
                                                </th>
                                                <th>
                                                    Date
                                                </th>
                                                <th>
                                                    Duration
                                                </th>
                                                <th>
                                                    Subject
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
                </div>
                <div class="tab-pane fade" id="telephony-ticketing">
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
									<div style="clear: both;"></div>
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
                </div>
                <div class="tab-pane fade" id="campaign-overview">
                    <div class="row m-b-15">
                        <div class="col-md-12">
                            <div class="pull-left">
                                <select id="campaignSelect" class="form-control width-sm">
                                    <option value="">Select a campaign to view</option>
                                </select>
                            </div>
                            <button class="btn btn-success pull-right m-l-10" onClick="showWizardPopup()">Create a campaign</button>
                            <button id="finishCampaignBtn" class="btn btn-danger pull-right m-l-10 hide" onClick="finishCampaign()">Finish campaign</button>
                            <button id="addSubscriberBtn" class="btn btn-primary pull-right m-l-10 hide" onClick="showAddSubscriberPopup()">Add a campaign subscriber</button>
                            <button id="editCampaignBtn" class="btn btn-primary pull-right hide" onClick="showEditCampaignPopup()">Edit campaign</button>
                        </div>
                    </div>
                    <div class="row">
                       <div class="col-md-6">
                                <div class="panel panel-inverse">
                                    <div class="panel-heading">
                                        <div class="panel-heading-btn">
                                                    <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
                                                    <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
                                                    <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
                                        </div>
                                        <h4 class="panel-title">Completed calls</h4>
                                    </div>
                                    <div class="panel-body">
                                        <table id="completedTable" class="table table-striped ">
                                            <thead>
                                                <tr>
                                                    <th>
                                                        Agent
                                                    </th>
                                                    <th>
                                                        Customer
                                                    </th>
                                                    <th>
                                                        Phone number
                                                    </th>
                                                    <th>
                                                        Notes
                                                    </th>
                                                    <th>
                                                        Date
                                                    </th>
                                                    
                                                </tr>
                                            </thead>
                                            <tbody>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                        </div>
                        <div class="col-md-6">
                                <div class="panel panel-inverse">
                                    <div class="panel-heading">
                                        <div class="panel-heading-btn">
                                                    <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
                                                    <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
                                                    <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
                                        </div>
                                        <h4 class="panel-title">Pending calls</h4>
                                    </div>
                                    <div class="panel-body">
                                        <table id="pendingTable" class="table table-striped ">
                                            <thead>
                                                <tr>
                                                    <th>
                                                        Campaign
                                                    </th>
                                                    <th>
                                                        Customer
                                                    </th>
                                                    <th>
                                                        Phone number
                                                    </th>
                                                    <th>
                                                        Notes
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
                    <div class="row">
        			    <div class="col-md-12">
                            <div class="widget-chart with-sidebar bg-black">
                                <div class="widget-chart-content">
                                    <h4 class="chart-title">
                        			     Campaign statistics 
                        			     <small>calls in last 7 days</small>
                        			</h4>
                                    <div id="campaign-line-chart" class="morris-inverse" style="height: 260px; position: relative; -webkit-tap-highlight-color: rgba(0, 0, 0, 0);">
                        
                                    </div>
                                </div>
                                <div class="widget-chart-sidebar bg-black-darker">
                                    <div class="chart-number">
                                        Calls
                                        <small>statistics for today</small>
                                    </div>
                                    <div id="campaign-donut-chart" style="height: 160px">
                        
                                    </div>
                                    <ul class="chart-legend">
                                        <li><i class="fa fa-circle-o fa-fw text-success m-r-5"></i><span>Completed</span>
                                        </li>
                                        <li><i class="fa fa-circle-o fa-fw text-danger m-r-5"></i><span>Pending</span>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="blacklist-overview">
                    <div class="row m-b-15">
                        <div class="col-md-12">
                            <button class="btn btn-primary" onClick="showAddBlacklistPopup()">Blacklist a number</button>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                                <div class="panel panel-inverse">
                                    <div class="panel-heading">
                                        <div class="panel-heading-btn">
                                                    <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
                                                    <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
                                                    <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
                                        </div>
                                        <h4 class="panel-title">Blacklist</h4>
                                    </div>
                                    <div class="panel-body">
                                        <table id="blacklistTable" class="table table-striped ">
                                            <thead>
                                                <tr>
                                                    <th>
                                                        Created by
                                                    </th>
                                                    <th>
                                                        Phone number
                                                    </th>
                                                    <th>
                                                        Reason
                                                    </th>
                                                    <th>
                                                        Created on
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
                </div>
            </div>
            </div>
        </div>
        <!-- end #content -->
        
        <div class="popupContainer" id="setupPopup" hidden>
			<div class="panel panel-primary" id="setupDIV" hidden>
				<div class="panel-heading">
					<div class="panel-heading-btn">
						<button onclick="hideSetupPopup()" class="btn btn-xs btn-icon btn-circle btn-default"><i class="fa fa-times"></i></button>
					</div>
					<h4 class="panel-title">Login into a queue</h4>
				</div>
				<div class="panel-body">
					<form id="setupForm" action="telephony/usersetup" method="post" class="form-horizontal">
						<div class="form-group">
							<div class="col-md-8">
								<label>Queue:</label>
								<input type="text" class="form-control" name="queue" placeholder="Enter queue number e.g. 6700" pattern="[0-9]+" value="<?php echo $_SESSION["queue"]; ?>" required />
							</div>
							<div class="col-md-4">
								<label>Extension:</label>
								<input type="text" class="form-control" name="extension" placeholder="Enter extension e.g. 100" pattern="[0-9]+" value="<?php echo $_SESSION["extension"]; ?>" required />
							</div>
						</div>
						<button class="btn btn-primary">Login into queue</button>
						<button class="btn btn-danger pull-right" type="button" onClick="hideSetupPopup()">Close</button>
					</form>
				</div>
			</div>
			<div class="panel panel-default panel-with-tabs" id="emailSetupDIV" hidden>
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
        
        <div class="popupContainer" id="wizardPopup" hidden>
            <div class="panel panel-primary" id="wizardDIV">
                    <div class="panel-heading">
                        <div class="panel-heading-btn">
                            <button onclick="hideWizardPopup()" class="btn btn-xs btn-icon btn-circle btn-default" ><i class="fa fa-times"></i></button>
                        </div>
                        <h4 class="panel-title">Telephony setup</h4>
                    </div>
                    <div class="panel-body">
                        <div id="wizard">
                                    <ol>
                                        <li>
                                            Create campaign
                                            <small>Basic campaign info</small>
                                        </li>
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
                                            <legend class="pull-left width-full">Create campaign</legend>
                                            <form id="telephonyCampaignForm" action="<?= BASE_URL . "telephony/campaign" ?>" method="post" enctype="multipart/form-data" class="form-horizontal">
                                                <div class="form-group">
                                                    <div class="col-md-12">
                                                        <label>Campaign name</label>
                                                        <input type="text" class="form-control" name="campaign_name" placeholder="Enter campaign name" required />
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="col-md-12">
                                                        <label>Participants</label>
                                                        <select id="campaignParticipantSelect" class="form-control" name="campaign_participants[]" multiple required>
                                                            
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="col-md-12">
                                                        <label>Description</label>
                                                        <textarea class="form-control" name="campaign_description" placeholder="Enter a short description" rows="4"></textarea>
                                                    </div>
                                                </div>
                                                <button class="btn btn-danger">Create campaign</button>
                                            </form>
                                        </fieldset>
                                    </div>
                                    <div class="wizard-step-2">
                                        <fieldset>
                                            <legend class="pull-left width-full">Import CSV</legend>
                                            <form id="importCSVForm" action="<?= BASE_URL . "csv/import" ?>" method="post" enctype="multipart/form-data" class="form-horizontal box has-advanced-upload">
                                                <div class="form-group">
                                                    <div class="col-md-12">
                                                        <label for="file" class="box__label"><strong class="hover-label">Choose a file</strong><span> or drag it here</span>.</label>
                                                        <input type="file" name="csv" id="file" class="box__file" required/>
                                                    </div>
                                                </div>
                                                <button class="btn btn-danger btn-centered">Upload file</button>
                                            </form>
                                        </fieldset>
                                    </div>
                                    <div class="wizard-step-3">
                                        <fieldset>
                                            <legend class="pull-left width-full">Import results</legend>
                                            <h4>Example data from file</h4>
                                            <table id="exampleDataTable" class="table table-striped">
                                                
                                            </table>
                                            <h4>Setup import fields</h4>
                                            <form id="csvFieldsForm" action="<?= BASE_URL . "telephony/import" ?>" method="post" enctype="multipart/form-data" class="form-horizontal">
                                                <input id="hiddenCampaignIDInput" name="campaign_id" type="hidden" />
                                                <div class="form-group">
                                                    <div class="col-md-4">
                                                        <label>Customer name: <span class="text-danger">*</span></label>
                                                        <select name="customer_name" class="form-control import-select" required >
                                                        </select>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <label>Phonenumber: <span class="text-danger">*</span>
                                                        </label>
                                                        <select name="customer_phone" class="form-control import-select" required >
                                                        </select>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <label>E-mail: 
                                                        </label>
                                                        <select name="customer_email" class="form-control import-select" >
                                                            <option value="-1">Leave blank</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="col-md-4">
                                                        <label>Notes: 
                                                        </label>
                                                        <select name="customer_notes" class="form-control import-select" >
                                                            <option value="-1">Leave blank</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <button class="btn btn-primary">Finalize import</button>
                                            </form>
                                        </fieldset>
                                    </div>
                                    <div class="wizard-step-4">
                                        <fieldset>
                                            <legend class="pull-left width-full">Finalization</legend>
                                            <p class="f-s-20">Import completed, please click the button below to finalize the import.</p>
											<button class="btn btn-success" onClick="refreshPage()">Finalize import</button>
                                        </fieldset>
                                    </div>
                                </div>
                            </div>
                        </div>
            </div>
        </div>
        
        <div class="popupContainer" id="editCampaignPopup" hidden>
            <div class="panel panel-primary" id="editCampaignDIV">
                <div class="panel-heading">
                    <div class="panel-heading-btn">
                        <button onclick="hideEditCampaignPopup()" class="btn btn-xs btn-icon btn-circle btn-default" ><i class="fa fa-times"></i></button>
                    </div>
                    <h4 class="panel-title">Edit campaign</h4>
                </div>
                <div class="panel-body">
                    <form id="editCampaignForm" action="telephony/editcampaign" method="post" class="form-horizontal">
                        <input type="hidden" id="hiddenEditCampaignIDInput" name="campaign_id" />
                        <div class="form-group">
                            <div class="col-md-12">
                                <label>Campaign name:</label>
                                <input id="editCampaignNameInput" type="text" name="campaign_name" class="form-control" placeholder="Enter campaign name" required />
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-12">
                                <label>Participants:</label>
                                <select id="editCampaignParticipantSelect" class="form-control" name="campaign_participants[]" multiple required>
                                    
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-12">
                                <label>Description:</label>
                                <textarea id="editCampaignDescriptionInput" class="form-control" name="campaign_description" placeholder="Enter campaign description" rows="4"></textarea>
                            </div>
                        </div>
                        <button class="btn btn-primary">Save changes</button>
                    </form>
                </div>
            </div>
        </div>
        
        <div class="popupContainer" id="campaignCallPopup" hidden>
            <div class="panel panel-primary" id="campaignCallDIV">
                <div class="panel-heading">
                    <div class="panel-heading-btn">
                        <button onclick="hideCampaignCallPopup()" class="btn btn-xs btn-icon btn-circle btn-default" ><i class="fa fa-times"></i></button>
                    </div>
                    <h4 class="panel-title">Campaign call</h4>
                </div>
                <div class="panel-body">
                    <form id="campaignCallForm" action="telephony/insertcampaigncall" method="post" class="form-horizontal">
                        <input type="hidden" id="hiddenCampaignCallCampaignIDInput" name="campaign_id" />
                        <input type="hidden" id="hiddenCampaignCallCustomerIDInput" name="customer_id" />
                        <input type="hidden" id="hiddenCampaignCallPhonenumberInput" name="customer_phone" />
                        <div class="form-group">
                            <div class="col-md-12">
                                <label>Status: <span class="text-danger">*</span></label><br>
                                <div class="radio radio-css radio-inline radio-danger">
                                    <input type="radio" name="call_type" id="ncr1" value="1">
                                    <label for="ncr1">
                                        Missed
                                    </label>
                                </div>
                                <div class="radio radio-css radio-inline radio-success">
                                    <input type="radio" name="call_type" id="ncr2" value="0" checked>
                                    <label for="ncr2">
                                        Answered
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-12">
                                <label>Notes:</label>
                                <textarea name="call_notes" placeholder="Enter call notes" class="form-control" rows="4"></textarea>
                            </div>
                        </div>
                    </form>
                    <button class="btn btn-primary pull-left" form="campaignCallForm" >Save call</button>
                    <button class="btn btn-danger pull-right" onClick="addToBlacklist()" >Add to blacklist</button>
                </div>
            </div>
        </div>
        
        <div class="popupContainer" id="blacklistPopup" hidden>
            <div class="panel panel-primary" id="blacklistDIV" hidden>
                <div class="panel-heading">
                    <div class="panel-heading-btn">
                        <button onclick="hideBlacklistPopup()" class="btn btn-xs btn-icon btn-circle btn-default" ><i class="fa fa-times"></i></button>
                    </div>
                    <h4 class="panel-title">Blacklist number</h4>
                </div>
                <div class="panel-body">
                    <form id="blacklistForm" action="blacklist/add" method="post" class="form-horizontal">
                        <div class="form-group">
                            <div class="col-md-6">
                                <label>Phone number:</label>
                                <input id="blacklistPhoneInput" type="text" class="form-control" name="blacklist_phone" readonly />
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-12">
                                <label>Reason:</label>
                                <textarea name="blacklist_reason" placeholder="Enter blacklist reason" class="form-control" rows="4" required></textarea>
                            </div>
                        </div>
                        <button class="btn btn-primary">Add to blacklist</button>
                    </form>    
                </div>
            </div>
            <div class="panel panel-primary" id="addBlacklistDIV" hidden>
                <div class="panel-heading">
                    <div class="panel-heading-btn">
                        <button onclick="hideAddBlacklistPopup()" class="btn btn-xs btn-icon btn-circle btn-default" ><i class="fa fa-times"></i></button>
                    </div>
                    <h4 class="panel-title">Blacklist number</h4>
                </div>
                <div class="panel-body">
                    <form id="addBlacklistForm" action="blacklist/add" method="post" class="form-horizontal">
                        <div class="form-group">
                            <div class="col-md-6">
                                <label>Phone number:</label>
                                <input type="text" class="form-control" name="blacklist_phone" />
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-12">
                                <label>Reason:</label>
                                <textarea name="blacklist_reason" placeholder="Enter blacklist reason" class="form-control" rows="4" required></textarea>
                            </div>
                        </div>
                        <button class="btn btn-primary">Add to blacklist</button>
                    </form>    
                </div>
            </div>
            <div class="panel panel-primary" id="editBlacklistDIV" hidden>
                <div class="panel-heading">
                    <div class="panel-heading-btn">
                        <button onclick="hideEditBlacklistPopup()" class="btn btn-xs btn-icon btn-circle btn-default" ><i class="fa fa-times"></i></button>
                    </div>
                    <h4 class="panel-title">Edit blacklist</h4>
                </div>
                <div class="panel-body">
                    <form id="editBlacklistForm" action="blacklist/edit" method="post" class="form-horizontal">
                        <div class="form-group">
                            <div class="col-md-6">
                                <label>Phone number:</label>
                                <input id="editBlacklistPhoneInput" type="text" class="form-control" name="blacklist_phone" readonly />
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-12">
                                <label>Reason:</label>
                                <textarea id="editBlacklistReasonInput" name="blacklist_reason" placeholder="Enter blacklist reason" class="form-control" rows="4" required></textarea>
                            </div>
                        </div>
                        <button class="btn btn-primary">Edit blacklist</button>
                    </form>    
                </div>
            </div>
        </div>
        
        <div class="popupContainer" id="addSubscriberPopup" hidden>
            <div class="panel panel-primary" id="addSubscriberDIV" hidden>
                    <div class="panel-heading">
                        <div class="panel-heading-btn">
                            <button onclick="hideAddSubscriberPopup()" class="btn btn-xs btn-icon btn-circle btn-default" ><i class="fa fa-times"></i></button>
                        </div>
                        <h4 class="panel-title">Add a subscriber</h4>
                    </div>
                    <div class="panel-body">
                        <form id="addSubscriberForm" action="telephony/addsubscriber" method="post" class="form-horizontal">
                            <input type="hidden" name="campaign_id" id="hiddenAddSubscriberCampaignIDInput" />
                            <div class="form-group">
                                <div class="col-md-12">
                                    <label>Customer name: <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" name="customer_name" placeholder="Enter customer name" />
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-6">
                                    <label>Phone number: <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" name="customer_phone" pattern="\d" placeholder="Enter phone number" />
                                </div>
                                <div class="col-md-6">
                                    <label>E-mail:</label>
                                    <input type="text" class="form-control" name="customer_email" placeholder="Enter e-mail" />
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-12">
                                    <label>Notes:</label>
                                    <textarea class="form-control" name="customer_notes" placeholder="Enter customer notes" rows="4"></textarea>
                                </div>
                            </div>
                            <button class="btn btn-primary">Add subscriber</button>
                        </form>
                    </div>
            </div>
        </div>
		
		<div class="popupContainer" id="simulateCallPopup" hidden>
            <div class="panel panel-primary" id="simulateCallDIV">
                    <div class="panel-heading">
                        <div class="panel-heading-btn">
                            <button onclick="hideSimulateCallPopup()" class="btn btn-xs btn-icon btn-circle btn-default" ><i class="fa fa-times"></i></button>
                        </div>
                        <h4 class="panel-title">Simulate call</h4>
                    </div>
                    <div class="panel-body">
                        <form id="simulateCallForm" action="telephony/addsubscriber" method="post" class="form-horizontal">
                            <div class="form-group">
                                <div class="col-md-12">
                                    <label>Enter a number to call:</label>
                                    <input id="simulateCallInput" class="form-control" placeholder="Enter a phone number" required />
                                </div>
                            </div>
                            <button class="btn btn-primary">Simulate call</button>
                        </form>
                    </div>
            </div>
        </div>
        
        <div class="popupContainer" id="callPopupDIV" hidden>
            <div class="panel panel-primary" id="incomingCallDIV" hidden>
                    <div class="panel-heading">
                        <div class="panel-heading-btn">
                            <button onclick="hideIncomingCallPopup()" class="btn btn-xs btn-icon btn-circle btn-default" ><i class="fa fa-times"></i></button>
                        </div>
                        <h4 class="panel-title">Incoming call</h4>
                    </div>
                    <div class="panel-body">
                        <div class="col-md-5">
                            <p class="f-s-18">Caller info</p>
                            <div id="incomingCallCustomerDIV">
                                
							</div>
                        </div>
                        <div class="col-md-7">
                            <form id="incomingCallForm" action="telephony/insertCall" method="post" class="form-horizontal">
                                    <input type="hidden" name="call_phonenumber" id="incomingCallPhonenumberInput" />
                                    <input type="hidden" name="customer_id" id="incomingCallCustomerIDInput" />
                                    <input type="hidden" name="call_duration" id="incomingCallDurationInput" />
                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <label>Subject: <span class="text-danger">*</span></label><br>
                                            <div class="radio radio-css radio-inline radio-info">
                                                <input type="radio" name="call_subject" id="nbr1" value="Information" checked>
                                                <label for="nbr1">
                                                    Information
                                                </label>
                                            </div>
                                            <div class="radio radio-css radio-inline radio-danger">
                                                <input type="radio" name="call_subject" id="nbr2" value="Reclamation" >
                                                <label for="nbr2">
                                                    Reclamation
                                                </label>
                                            </div>
                                            <div class="radio radio-css radio-inline radio-success">
                                                <input type="radio" name="call_subject" id="nbr3" value="Order">
                                                <label for="nbr3">
                                                    Order
                                                </label>
                                            </div>
                                            <div class="radio radio-css radio-inline radio-primary">
                                                <input type="radio" name="call_subject" id="nbr4" value="Other">
                                                <label for="nbr4">
                                                    Other
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <label>Notes:</label>
                                            <textarea class="form-control" name="call_notes" rows="4" placeholder="Enter notes"></textarea>
                                        </div>
                                    </div>
                        </div>
						<div class="panel-footer">
							<button class="btn btn-primary">Save call</button>
                            <button type="button" class="btn btn-danger pull-right" onClick="hideIncomingCallPopup()">Close</button>
                            </form>
						</div>
                    </div>
            </div>
			<div class="panel panel-primary" id="outgoingCallDIV" hidden>
                    <div class="panel-heading">
                        <div class="panel-heading-btn">
                            <button onclick="hideOutgoingCallPopup()" class="btn btn-xs btn-icon btn-circle btn-default" ><i class="fa fa-times"></i></button>
                        </div>
                        <h4 class="panel-title">Outgoing call</h4>
                    </div>
                    <div class="panel-body">
                        <div class="col-md-5">
                            <p class="f-s-18">Caller info</p>
                            <div id="outgoingCallCustomerDIV">
                                
							</div>
                        </div>
                        <div class="col-md-7">
                            <form id="outgoingCallForm" action="telephony/outgoing" method="post" class="form-horizontal">
                                    <input type="hidden" name="call_phonenumber" id="outgoingCallPhonenumberInput" />
                                    <input type="hidden" name="customer_id" id="outgoingCallCustomerIDInput" />
									<div class="form-group">
										<div class="col-md-12">
											<label>Call status: <span class="text-danger">*</span></label><br>
											<div class="radio radio-css radio-inline radio-danger">
                                                <input type="radio" name="call_status" id="kbr2" value="0" >
                                                <label for="kbr2">
                                                    Busy
                                                </label>
                                            </div>
											<div class="radio radio-css radio-inline radio-success">
                                                <input type="radio" name="call_status" id="kbr1" value="1" checked>
                                                <label for="kbr1">
                                                    Answered
                                                </label>
                                            </div>
										</div>
									</div>
                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <label>Subject: <span class="text-danger">*</span></label><br>
                                            <div class="radio radio-css radio-inline radio-info">
                                                <input type="radio" name="call_subject" id="bbr1" value="Information" checked>
                                                <label for="bbr1">
                                                    Information
                                                </label>
                                            </div>
                                            <div class="radio radio-css radio-inline radio-danger">
                                                <input type="radio" name="call_subject" id="bbr2" value="Reclamation" >
                                                <label for="bbr2">
                                                    Reclamation
                                                </label>
                                            </div>
                                            <div class="radio radio-css radio-inline radio-success">
                                                <input type="radio" name="call_subject" id="bbr3" value="Order">
                                                <label for="bbr3">
                                                    Order
                                                </label>
                                            </div>
                                            <div class="radio radio-css radio-inline radio-primary">
                                                <input type="radio" name="call_subject" id="bbr4" value="Other">
                                                <label for="bbr4">
                                                    Other
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <label>Notes:</label>
                                            <textarea class="form-control" name="call_notes" rows="4" placeholder="Enter notes"></textarea>
                                        </div>
                                    </div>
                        </div>
                    </div>
					<div class="panel-footer">
							<button class="btn btn-primary">Save call</button>
                            <button type="button" class="btn btn-danger pull-right" onClick="hideOutgoingCallPopup()">Close</button>
                            </form>
					</div>
            </div>
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
                                        <label>Subject: <span class="text-danger">*</span></label><br>
                                        <div class="radio radio-css radio-inline radio-info">
                                                <input type="radio" name="call_subject" id="nar1" value="Information" checked>
                                                <label for="nar1">
                                                    Information
                                                </label>
                                            </div>
                                            <div class="radio radio-css radio-inline radio-danger">
                                                <input type="radio" name="call_subject" id="nar2" value="Reclamation" >
                                                <label for="nar2">
                                                    Reclamation
                                                </label>
                                            </div>
                                            <div class="radio radio-css radio-inline radio-success">
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
                    </div>
					<div class="panel-footer">
						<button class="btn btn-primary">Save changes</button>
                        <button type="button" class="btn btn-danger pull-right" onClick="hideEditCallPopup()">Close</button>
                        </form>
					</div>
            </div>
        </div>
        <div class="popupContainer" id="customerPopupDIV" hidden>
                <div class="panel panel-primary" id="addCustomerDIV" hidden>
                    <div class="panel-heading">
                        <div class="panel-heading-btn">
                            <button onclick="hideAddCustomerPopup()" class="btn btn-xs btn-icon btn-circle btn-default"><i class="fa fa-times"></i>
                            </button>
                        </div>
                        <h4 class="panel-title">Add a customer</h4>
                    </div>
                    <div class="panel-body">
                        <form id="addCustomerForm" action="<?= BASE_URL . "customer/add" ?>" method="post" class="form-horizontal">
                            <input type="hidden" id="addCustomerLatitudeInput" name="latitude" />
                            <input type="hidden" id="addCustomerLongitudeInput" name="longitude" />
                            <div class="form-group">
                                <div class="col-md-6">
                                    <label>Find by VAT:</label>
                                    <div class="input-group">
                                      <input id="vatInput" type="text" class="form-control" pattern="\d{8}" maxlength="8" placeholder="Enter VAT number">
                                      <span class="input-group-btn">
                                        <button class="btn btn-success" type="button" onClick="searchByVAT()"><i class="fa fa-search"></i>&nbsp;Search</button>
                                      </span>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-6">
                                    <label>Customer code:</label>
                                    <input type="text" class="form-control" name="customer_code" placeholder="Enter customer code" />
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-3">
                                    <label>Business entity:</label><br>
                                    <label class="radio-inline">
                                      <input type="radio" name="business_entity" value="1">Yes
                                    </label>
                                    <label class="radio-inline">
                                      <input type="radio" name="business_entity" value="0" checked>No
                                    </label>
                                </div>
                                <div class="col-md-3">
                                    <label>Tax payer:</label><br>
                                    <label class="radio-inline">
                                      <input type="radio" name="taxpayer" value="1">Yes
                                    </label>
                                    <label class="radio-inline">
                                      <input type="radio" name="taxpayer" value="0" checked>No
                                    </label>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-xs-12 col-sm-6 col-md-8">
                                    <label>Name or title: <span class="text-danger">*</span>
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
                                    <input id="addCustomerPhoneInput" type="tel" name="customer_phone[]" class="tel-input form-control m-b-5" required />
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
                                    <input id="addCustomerRangeInput" type="range" min="1" max="10" value="5" class="slider" name="customer_importance" onInput="updateRangeValue()">
                                    <label id="addCustomerRangeValue" style="margin-top: 3px;">5</label>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-12">
                                    <label>Notes: </label>
                                    <textarea class="form-control" name="customer_notes" placeholder="Enter notes"></textarea>
                                </div>
                            </div>
                            <button id="addCustomerBtn" class="btn btn-primary" disabled>Add customer</button>
                            <button type="button" class="btn btn-danger pull-right" onClick="hideAddCustomerPopup()">Close</button>
                        </form>
                    </div>
                </div>
                <div class="panel panel-inverse" id="editCustomerDIV" hidden>
                    <div class="panel-heading">
                        <div class="panel-heading-btn">
                            <button onclick="hideEditCustomerPopup()" class="btn btn-xs btn-icon btn-circle btn-default" ><i class="fa fa-times"></i></button>
                        </div>
                        <h4 class="panel-title">Edit customer</h4>
                    </div>
                    <div class="panel-body">
                        <form id="editCustomerForm" action="<?= BASE_URL . "customer/edit" ?>" method="post" class="form-horizontal">
                            <input type="hidden" id="hiddenEditCustomerIDInput" name="customer_id" />
                            <input type="hidden" id="editCustomerLatitudeInput" name="latitude" />
                            <input type="hidden" id="editCustomerLongitudeInput" name="longitude" />
                            <div class="form-group">
                                <div class="col-md-6">
                                    <label>Customer code:</label>
                                    <input id="editCustomerCodeInput" type="text" class="form-control" name="customer_code" placeholder="Enter customer code" />
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-3">
                                    <label>Business entity:</label><br>
                                    <label class="radio-inline">
                                      <input type="radio" name="business_entity" value="1">Yes
                                    </label>
                                    <label class="radio-inline">
                                      <input type="radio" name="business_entity" value="0" checked>No
                                    </label>
                                </div>
                                <div class="col-md-3">
                                    <label>Tax payer:</label><br>
                                    <label class="radio-inline">
                                      <input type="radio" name="taxpayer" value="1">Yes
                                    </label>
                                    <label class="radio-inline">
                                      <input type="radio" name="taxpayer" value="0" checked>No
                                    </label>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-xs-12 col-sm-6 col-md-8">
                                    <label>Name or title: <span class="text-danger">*</span>
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
                                    <label>Phone number: <span class="text-danger">*</span>
                                    </label>
                                    <input id="editCustomerContactInput" type="text" class="tel-input form-control m-b-5" required />
                                    <div id="editPhoneNrsDIV">
                                        
                                    </div>
                                    <span class="span-add" onClick="addEditPhone()">Add a phone number</span>
                                </div>
                                <div class="col-md-4">
                                    <label>E-Mail: <span class="text-danger">*</span>
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
                                <div class="col-xs-12 col-sm-6 col-md-8">
                                    <label>Address: <span class="text-danger">*</span>
                                    </label>
                                    <input id="editCustomerAddressInput" type="text" name="customer_address" class="form-control" placeholder="Enter an address" required />
                                </div>
                                <div class="col-xs-12 col-sm-6 col-md-4">
                                    <label>Key account manager: </label>
                                    <select id="editCustomerEmployeeSelect" name="employee_id" class="form-control">
                                        <option value="">Choose an employee</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-12">
                                    <label>Importance</label>
                                    <input id="editCustomerImportanceInput" type="range" min="1" max="10" value="5" class="slider" name="customer_importance" onInput="updateEditRangeValue()">
                                    <label id="editCustomerRangeValue" style="margin-top: 3px;">5</label>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-12">
                                    <label>Notes: </label>
                                    <textarea id="editCustomerNotesInput" class="form-control" name="customer_notes" placeholder="Enter notes"></textarea>
                                </div>
                            </div>
                            <button class="btn btn-primary">Edit customer</button>
                            <button type="button" class="btn btn-danger pull-right" onClick="hideEditCustomerPopup()">Close</button>
                        </form>
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
							<div class="message-content">
								<div id="emailMessageDIV">
										
								</div>
								
								<ul id="emailAttachmentDIV" class="attached-document clearfix">
															
								</ul>
							</div>
						</div>
						<div class="col-md-4 bg-silver-lighter">
							<div class="p-15">
								<h4 class="m-t-0 f-w-500">Conversations</h4>
								<ul id="emailThreadsUL" class="list-group">
									
								</ul>
								<h4 class="m-t-0 f-w-500">Tickets</h4>
								<ul id="emailTicketsUL" class="list-group">
									
								</ul>
							</div>
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
                        <button id="addTicketBtn" class="btn btn-primary">Create ticket</button>
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
                                        <label>Billing from date: <span class="text-danger">*</span></label>
                                        <div class="input-group ticket-date-picker">
                                            <input id="editTicketStartDateInput" type="text" name="billing_fromdate" class="form-control" placeholder="Choose a date" />
                                            <span class="input-group-addon btn bg-primary">
                                                <span class="fa fa-calendar text-white"></span>
                                            </span>                    
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <label>Billing from time: <span class="text-danger">*</span></label>
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
                        <button id="editTicketBtn" class="btn btn-primary">Edit ticket</button>
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
		
		<div class="popupContainer" id="loadingPopup" hidden>
            <div id="loadingSpinnerDIV">
                <span class="spinner-loading"></span>
                <p class="loadingLabel">Fetching e-mails...</p>
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

        <!-- begin scroll to top btn -->
        <a href="javascript:;" class="btn btn-icon btn-circle btn-primary btn-scroll-to-top fade" data-click="scroll-top"><i class="fa fa-angle-up"></i></a>
        <!-- end scroll to top btn -->
        
     </div>
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
	<script src="<?= ASSETS_URL . "bootstrap-wizard/js/bwizard.js" ?>"></script>
	<script src="<?= ASSETS_URL . "select2/dist/js/select2.full.min.js" ?>"></script>
	<script src="<?= ASSETS_URL . "morris/raphael.min.js" ?>"></script>
    <script src="<?= ASSETS_URL . "morris/morris.js" ?>"></script>
    <script src="<?= ASSETS_URL . "jquery-tag-it/js/tag-it.min.js" ?>"></script>
    <script src="<?= ASSETS_URL . "tinymce/js/tinymce/tinymce.min.js" ?>"></script>
	<script src="<?= ASSETS_URL . "jquery-file-upload/js/jquery.fileupload.js" ?>"></script>
	
    <script>
        var loggedEmployee = <?php echo json_encode($_SESSION["id"]); ?>;
        var queue = <?php echo json_encode($_SESSION["queue"]); ?>;
        var ext = <?php echo json_encode($_SESSION["extension"]); ?>;
        var showEmails = <?php echo json_encode($settings["telephony_showemails"]); ?>;
        var showMobile = <?php echo json_encode($settings["telephony_showmobile"]); ?>;
		var isAdmin = <?php echo json_encode($_SESSION["admin"]); ?>;
		
		var dateformat = <?php echo json_encode($_SESSION["dateformat"]); ?>;
		var timeformat = <?php echo json_encode($_SESSION["timeformat"]); ?>;
		
		var currentCaller;
		var agentInCall = false;
        
        var missedCallsTable;
        var missedCallsArray = [];
        var callTable;
        var ticketsTable;
        var allCallsTable;
        var completedTable;
        var pendingTable;
        var blacklistTable;
        
        var eventsListener;
        var lastCallUID;
		var lastCallRow;
        var geocoder;
        var cDuration;
        var droppedFiles;
        var currentCampaignID; 
        var campaignArray = [];
		var employeeArray = [];
        var customersArray = [];
		var subsidiariesArray = [];
        var ticketArray = [];
        
		
        var campaignSubscriberInterval;
        var campaignCallInterval;
        
        var firstPageLoad = true;
		var hideInactive = true;
		var displayChanged = false;

		var ticketFiles = [];
		var editTicketFiles = [];
        
        $(document).ready(function() {
			getMenuStatistics(loggedEmployee);
			$("#wizard").bwizard();
			if (showEmails == 1){
			    $("#emailRow").show();
			}
			if (showMobile == 0){
			    $(".mobile-btn").hide();
			    App.init();
			    firstPageLoad = false;
			}
			getTodaysCalls();
			getAllCalls();
			getCustomers();
			getEmployees();
			getTelephonyCampaigns();
			getBlacklist();
			getTickets();
			getSubsidiaries();
			getCategories();
			
			setInterval(function(){
				getTickets();
				getTodaysCalls();
				getAllCalls();
			}, 30000);
			
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
			
			$("#campaignParticipantSelect, #editCampaignParticipantSelect").select2({width: "100%"});
			$("#ticketCustomerSelect, #editTicketCustomerSelect, #ticketSubsidiarySelect, #editTicketSubsidiarySelect, #ticketEmployeeSelect, #editTicketEmployeeSelect").select2({width: "100%"});
			
			$("#campaignSelect").change(function() {
			    currentCampaignID = $(this).val();
			    if (currentCampaignID != ""){
			        $("#addSubscriberBtn, #finishCampaignBtn, #editCampaignBtn").removeClass("hide");
			    }else{
			        $("#addSubscriberBtn, #finishCampaignBtn, #editCampaignBtn").addClass("hide");
			    }
                displayCampaignSubscribers(currentCampaignID);
                displayCampaignCalls(currentCampaignID);
                drawCampaignGraph(currentCampaignID);
                if (campaignSubscriberInterval != null){
                    clearInterval(campaignSubscriberInterval);
                    clearInterval(campaignCallInterval);
                }
                campaignSubscriberInterval = setInterval(function(){ displayCampaignSubscribers(currentCampaignID); }, 5000);
                campaignCallInterval = setInterval(function(){ displayCampaignCalls(currentCampaignID); }, 5000);
            });
           
			
			

			if (queue == 0 || ext == 0){
			    showSetupPopup();
			}else{
    			checkPhoneStatus();
    		    setInterval(checkPhoneStatus, 5000);
			}
		
			
			$(".tel-input").intlTelInput({ initialCountry: "auto",
			geoIpLookup: function(callback) {
                $.get('https://ipinfo.io', function() {}, "jsonp").always(function(resp) {
                  var countryCode = (resp && resp.country) ? resp.country : "";
                  callback(countryCode);
                });
            }});
            
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
			
			 
            
			$('#simulateCallForm').on('submit', function(e) { //use on if jQuery 1.7+
                e.preventDefault();
				showOutgoingCallPopup($("#simulateCallInput").val());
				$("#simulateCallForm")[0].reset();
				$("#simulateCallPopup").hide();
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
                            swal(
                                'Success!',
                                'Customer was successfully added.',
                                'success'
                            );
                            $("#addCustomerForm")[0].reset();
                            var customerData = { phonenumber: fullPhoneNrs[0] };
                            $.ajax({
                                type: "POST",
                                url: "<?= BASE_URL ?>" + "customer/getByPhone",
                                data: customerData,
                                dataType: "json",
                                success: function(customer) {
                                    $("#incomingCallCustomerDIV").html('<dl><dt>Title</dt><dd>' + customer.customer_name + '</dd><dt>Phone number</dt><dd>' + customer.customer_phone + '</dd><dt>E-mail</dt><dd>' + customer.customer_email + '</dd><dt>Address</dt><dd>' + customer.customer_address +'</dd></dl>');
                                    $("#incomingCallCustomerIDInput").val(customer.customer_id);
                                    hideAddCustomerPopup();
                                }
                            });
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
		    
		    $('#incomingCallForm').on('submit', function(e) { //use on if jQuery 1.7+
                e.preventDefault();
                $.ajax({
                    type: "POST",
                    url: "<?= BASE_URL ?>" + "telephony/insertCall",
                    data: $("#incomingCallForm").serialize(),
                    success: function(response) {
                        if (response == ""){
                            swal(
                                'Success!',
                                'Call was successfully saved.',
                                'success'
                            );
                            getTodaysCalls();
                            hideIncomingCallPopup();
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
			
			$('#outgoingCallForm').on('submit', function(e) { //use on if jQuery 1.7+
                e.preventDefault();
                $.ajax({
                    type: "POST",
                    url: "<?= BASE_URL ?>" + "telephony/outgoing",
                    data: $("#outgoingCallForm").serialize(),
                    success: function(response) {
                        if (response == ""){
                            swal(
                                'Success!',
                                'Call was successfully saved.',
                                'success'
                            );
							if (lastCallUID != null){
								updateMissedCallStatus(lastCallUID, lastCallRow);
							}
                            getTodaysCalls();
                            hideOutgoingCallPopup();
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
                            getTodaysCalls();
							getAllCalls();
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
		    
		    $('#newTicketForm').on('submit', function(e) { //use on if jQuery 1.7+
                e.preventDefault();
				var postData = $("#newTicketForm").serializeArray();
				postData.push({ name: 'files', value: ticketFiles });
				if (currentMail != null){
					postData.push({ name: "email_subject", value: currentMail.subject });
					postData.push({ name: "email_message", value: currentMail.message });
					postData.push({ name: "email_from", value: currentMail.from });
					postData.push({ name: "email_date", value: currentMail.date });
				}
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
							if (isEmail == 1){
								refreshEmails(false);
							}
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
		    
		    $('#addSubscriberForm').on('submit', function(e) { //use on if jQuery 1.7+
                e.preventDefault();
                $.ajax({
                    type: "POST",
                    url: "<?= BASE_URL ?>" + "telephony/addsubscriber",
                    data: $("#addSubscriberForm").serialize(),
                    success: function(response) {
                        if (response == ""){
                            swal(
                                'Success!',
                                'Subscriber was successfully added to campaign',
                                'success'
                            );
                            hideAddSubscriberPopup();
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
		    
		    $('#editCampaignForm').on('submit', function(e) { //use on if jQuery 1.7+
                e.preventDefault();
                $.ajax({
                    type: "POST",
                    url: "<?= BASE_URL ?>" + "telephony/editcampaign",
                    data: $("#editCampaignForm").serialize(),
                    success: function(response) {
                        if (response == ""){
                            swal(
                                'Success!',
                                'Campaign was successfully edited',
                                'success'
                            );
                            getTelephonyCampaigns();
                            hideEditCampaignPopup();
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
            
            $('#campaignCallForm').on('submit', function(e) { //use on if jQuery 1.7+
                e.preventDefault();
                $.ajax({
                    type: "POST",
                    url: "<?= BASE_URL ?>" + "telephony/insertcampaigncall",
                    data: $("#campaignCallForm").serialize(),
                    success: function(msg) {
                        if (msg == ""){
                            swal(
                                'Success',
                                'Call was successfully saved',
                                'success'
                            );
                            displayCampaignSubscribers(currentCampaignID);
                            displayCampaignCalls(currentCampaignID);
                            hideCampaignCallPopup();
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
            
            $('#setupForm').on('submit', function(e) { //use on if jQuery 1.7+
                e.preventDefault();
                $.ajax({
                    type: "POST",
                    url: "<?= BASE_URL ?>" + "telephony/usersetup",
                    data: $("#setupForm").serialize(),
                    success: function(msg) {
                        if (msg == ""){
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
            
        
            
             $('#importCSVForm').on('submit', function(e) { //use on if jQuery 1.7+
                e.preventDefault();
                var formdata = new FormData(this);
                if (droppedFiles){
                    $.each( droppedFiles, function(i, file){
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
                            $(".import-select").append($('<option>', {
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
                        $("#exampleDataTable").html(tableContent);
                        $("#wizard").bwizard("next");
                    }
                });
            });
            
            $('#telephonyCampaignForm').on('submit', function(e) { //use on if jQuery 1.7+
                e.preventDefault();
                $.ajax({
                    type: "POST",
                    url: "telephony/campaign",
                    data: $("#telephonyCampaignForm").serialize(),
                    success: function(id) {
                        if (id != null) {
                            $("#hiddenCampaignIDInput").val(id);
                            $("#wizard").bwizard("next");
                        } else {
                            swal(
                                'Error!',
                                'The server encountered the following error: ' + id,
                                'error'
                            );
                        }
                    }
                });
            });
            
            $('#blacklistForm').on('submit', function(e) { //use on if jQuery 1.7+
                e.preventDefault();
                $.ajax({
                    type: "POST",
                    url: "blacklist/add",
                    data: $("#blacklistForm").serialize(),
                    success: function(msg) {
                        if (msg == "") {
                            swal(
                                'Success',
                                'Phone number successfully blacklisted',
                                'success'
                            );
                            getBlacklist();
                            hideBlacklistPopup();
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
            
            $('#addBlacklistForm').on('submit', function(e) { //use on if jQuery 1.7+
                e.preventDefault();
                $.ajax({
                    type: "POST",
                    url: "blacklist/add",
                    data: $("#addBlacklistForm").serialize(),
                    success: function(msg) {
                        if (msg == "") {
                            swal(
                                'Success',
                                'Phone number successfully blacklisted',
                                'success'
                            );
                            getBlacklist();
                            hideAddBlacklistPopup();
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
            
            $('#editBlacklistForm').on('submit', function(e) { //use on if jQuery 1.7+
                e.preventDefault();
                $.ajax({
                    type: "POST",
                    url: "blacklist/edit",
                    data: $("#editBlacklistForm").serialize(),
                    success: function(msg) {
                        if (msg == "") {
                            swal(
                                'Success',
                                'Blacklist entry was successfully edited.',
                                'success'
                            );
                            getBlacklist();
                            hideEditBlacklistPopup();
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
            
            $('#csvFieldsForm').on('submit', function(e) { //use on if jQuery 1.7+
                e.preventDefault();
                $.ajax({
                    type: "POST",
                    url: "telephony/import",
                    data: $("#csvFieldsForm").serialize(),
                    success: function(msg) {
						console.log(msg);
                        if (msg == "") {
                            $("#wizard").bwizard("next");
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
            
            $('#importCSVForm').on('drag dragstart dragend dragover dragenter dragleave', function(e) {
                e.preventDefault();
                e.stopPropagation();
            });
            
             $('#importCSVForm').on('drop', function(e) {
                e.preventDefault();
                e.stopPropagation();
                droppedFiles = e.originalEvent.dataTransfer.files;
                $("#file").attr("required", false);
                $(".box__label").html(droppedFiles[0].name)
            });
            
            $("#file").on('change',function(){
                $(".box__label").html(this.files[0].name);
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
		
		function getCategories(){
			$.ajax({
                type: "POST",
                url: "<?= BASE_URL ?>" + "ticketcategory/get",
                data: null,
                dataType: "json",
                success: function(categories) {
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
			});
		}
        
        function finishCampaign(){
            var postData = { "campaign_id": currentCampaignID };
            $.ajax({
                type: "POST",
                url: "<?= BASE_URL ?>" + "telephony/finishcampaign",
                data: postData,
                success: function(msg) {
                    if (msg == "") {
                            swal(
                                'Success!',
                                'Campaign was successfully finished.',
                                'success'
                            );
                            $("#finishCampaignBtn").addClass("hide");
                            getTelephonyCampaigns();
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
		
		
		
		function refreshPage(){
			location.reload();
		}
		
	
		
		function disconnectIMAP(){
			swal({
              title: 'Confirm action',
              text: "Are you sure you want to disconnect your IMAP account?",
              type: 'error',
              showCancelButton: true,
              confirmButtonColor: '#3085d6',
              cancelButtonColor: '#d33',
              confirmButtonText: 'Disconnect'
            }).then(function () {
				$.ajax({
                    type: "POST",
                    url: "telephony/imapdisconnect",
                    data: null,
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
		}
		
		function disconnectExchange(){
			swal({
              title: 'Confirm action',
              text: "Are you sure you want to disconnect your Exchange account?",
              type: 'error',
              showCancelButton: true,
              confirmButtonColor: '#3085d6',
              cancelButtonColor: '#d33',
              confirmButtonText: 'Disconnect'
            }).then(function () {
				$.ajax({
                    type: "POST",
                    url: "employee/exchangedisconnect",
                    data: null,
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
		}
		
		function disconnectOffice365(){
			swal({
              title: 'Confirm action',
              text: "Are you sure you want to disconnect your Office365 account?",
              type: 'error',
              showCancelButton: true,
              confirmButtonColor: '#3085d6',
              cancelButtonColor: '#d33',
              confirmButtonText: 'Disconnect'
            }).then(function () {
				$.ajax({
                    type: "POST",
                    url: "employee/office365disconnect",
                    data: null,
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
		}
		
        
        function showWizardPopup(){
            $("#wizardPopup").show();
        }
        
        function hideWizardPopup(){
            $("#wizardPopup").hide();
        }
        
        function isEmail(email) {
            var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
            return regex.test(email);
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
										$(row).addClass('row-danger');
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
        
        function getBlacklist(){
            $.ajax({
                type: "POST",
                url: "<?= BASE_URL ?>" + "blacklist/get",
                data: null,
                dataType: "json",
                success: function(blacklist) {
                    if (blacklistTable != null){
                        blacklistTable.destroy();
                    }
                    blacklistTable = $('#blacklistTable').DataTable( {
                        "aaData": blacklist,
                        "columns": [
                            { "data": "employee_id" },
                            { "data": "blacklist_phone" },
                            { "data": "blacklist_reason" },
                            { "data": "datetime" },
                            { "defaultContent": '<span onClick="showEditBlacklistPopup(this)" class="text-primary pull-left m-l-10 pointer"><i class="fas fa-pencil-alt"></i></span><span onClick="deleteBlacklist(this)" class="text-danger pull-left m-l-10 pointer"><i class="fa fa-trash"></i></span>'}
                        ],
                        "columnDefs": [
                            {
                                // The `data` parameter refers to the data for the cell (defined by the
                                // `data` option, which defaults to the column being worked with, in
                                // this case `data: 0`.
                                "render": function(data, type, row) {
									return "<a class='text-primary hover-underline' href='employeepage?employee_id=" + data + "' target='_blank'>"  + row.employee_name + " " + row.employee_surname + "</a>";
								},
                                "targets": 0
                            },
                            {
                                    "targets": 2,
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
        
        function getTelephonyCampaigns(){
            $.ajax({
                type: "POST",
                url: "<?= BASE_URL ?>" + "telephony/campaignlist",
                data: null,
                dataType: "json",
                success: function(campaigns) {
                    campaignArray = campaigns;
                    for (var i = 0; i < campaigns.length; i++){
                        var campaignParticipants = campaigns[i].campaign_participants.split(",");
                        if (campaignParticipants.indexOf(loggedEmployee) != -1){
                            $("#campaignSelect").append($('<option>', {
                                value: campaigns[i].campaign_id,
                                text: campaigns[i].campaign_name
                            }));
                        }
                    }
                }
            });
        }
        
        function drawCampaignGraph(campaign_id){
            var postData = { "campaign_id": campaign_id };
            $.ajax({
                type: "POST",
                url: "<?= BASE_URL ?>" + "telephony/campaignstats",
                data: postData,
                dataType: "json",
                success: function(stats) {
                    var calls = stats.calls;
                    var chartData = [];
                    var complete = stats.completed;
                    var pending = stats.remaining;
                    for (var i = 0; i < calls.length; i++){
                        chartData.push({ "x": calls[i].date, "y": calls[i].nrOfCalls })
                    }
                    Morris.Line({
                        element: "campaign-line-chart",
                        data: chartData,
                        xkey: "x",
                        ykeys: "y",
                        labels: ["Number of calls"],
                        lineColors: ["#f9c922"],
                        pointFillColors: ["#f9c922"],
                        lineWidth: "2px",
                        pointStrokeColors: ["rgba(0,0,0,0.6)"],
                        resize: !0,
                        gridTextFamily: "inherit",
                        gridTextColor: "rgba(255,255,255,0.4)",
                        gridTextWeight: "normal",
                        gridTextSize: "12px",
                        gridLineColor: "rgba(255,255,255,0.15)",
                        hideHover: "auto"
                    });
                    Morris.Donut({
                        element: "campaign-donut-chart",
                        data: [{
                            label: "Completed",
                            value: complete
                        },{
                            label: "Pending",
                            value: pending
                        }],
                        colors: ["#39a34b", "#d9534f"],
                        labelFamily: "inherit",
                        labelColor: "rgba(255,255,255,0.4)",
                        labelTextSize: "12px",
                        backgroundColor: "#111"
                    });
                }
            });
        }
        
        function displayCampaignSubscribers(campaign_id){
            var postData = { "campaign_id": campaign_id };
            $.ajax({
                type: "POST",
                url: "<?= BASE_URL ?>" + "telephony/campaignsubs",
                data: postData,
                dataType: "json",
                success: function(campaignSubs) {
                    if (pendingTable != null){
                        pendingTable.destroy();
                    }
                    pendingTable = $('#pendingTable').DataTable( {
                        "aaData": campaignSubs,
                        "columns": [
                            { "data": "campaign_name" },
                            { "data": "customer_name" },
                            { "data": "customer_phone" },
                            { "data": "customer_notes" },
                            { "defaultContent": '<span onClick="campaignCallout(this)" class="text-primary pull-left pointer"><i class="fa fa-phone"></i></span>'}
                        ],
                        "columnDefs": [
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
        
        function displayCampaignCalls(campaign_id){
            var postData = { "campaign_id": campaign_id };
            $.ajax({
                type: "POST",
                url: "<?= BASE_URL ?>" + "telephony/campaigncalls",
                data: postData,
                dataType: "json",
                success: function(calls) {
                    if (completedTable != null){
                        completedTable.destroy();
                    }
                    completedTable = $('#completedTable').DataTable( {
                        "aaData": calls,
                        "columns": [
                            { "data" : "employee_id" },
                            { "data": "customer_name" },
                            { "data": "customer_phone" },
                            { "data": "call_notes" },
                            { "data": "call_datetime" }
                        ],
                        "columnDefs": [
                            {
                                // The `data` parameter refers to the data for the cell (defined by the
                                // `data` option, which defaults to the column being worked with, in
                                // this case `data: 0`.
                                "render": function(data, type, row) {
									return "<a class='text-primary hover-underline' href='employeepage?employee_id=" + data + "' target='_blank'>"  + row.employee_name + " " + row.employee_surname + "</a>";
								},
                                "targets": 0
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
        
        function showEditCampaignPopup(){
            var campaign;
            for (var i = 0; i < campaignArray.length; i++){
                if (campaignArray[i].campaign_id == currentCampaignID){
                    campaign = campaignArray[i];
                    break;
                }
            }
            $("#hiddenEditCampaignIDInput").val(campaign.campaign_id);
            $("#editCampaignNameInput").val(campaign.campaign_name);
            $("#editCampaignParticipantSelect").val(campaign.campaign_participants.split(",")).trigger("change");
            $("#editCampaignDescriptionInput").html(campaign.campaign_description);
            $("#editCampaignPopup, #editCampaignDIV").show();
        }
        
        function hideEditCampaignPopup(){
            $("#editCampaignForm")[0].reset();
            $("#editCampaignPopup, #editCampaignDIV").hide();
        }
        
        function viewCampaignCallNotes(row){
			var actualRow = $(row).parents('tr');
			if (actualRow.hasClass('child')) {//Check if the current row is a child row
				actualRow = actualRow.prev();//If it is, then point to the row before it (its 'parent')
			}
            var completedCall = completedTable.row(actualRow).data();
            swal(
                'Call notes',
                completedCall.call_notes,
                'info'
            );
        }
        
        function addToBlacklist(){
            var phoneNr = $("#hiddenCampaignCallPhonenumberInput").val();
            $("#blacklistPhoneInput").val(phoneNr);
            $("#blacklistPopup, #blacklistDIV").show();
        }
        
        function hideBlacklistPopup(){
            $("#blacklistForm")[0].reset();
            $("#blacklistPopup, #blacklistDIV").hide();
        }
        
        function showAddBlacklistPopup(){
            $("#blacklistPopup, #addBlacklistDIV").show();
        }
        
        function hideAddBlacklistPopup(){
            $("#addBlacklistForm")[0].reset();
            $("#blacklistPopup, #addBlacklistDIV").hide();
        }
        
        function showEditBlacklistPopup(row){
			var actualRow = $(row).parents('tr');
			if (actualRow.hasClass('child')) {//Check if the current row is a child row
				actualRow = actualRow.prev();//If it is, then point to the row before it (its 'parent')
			}
            var blacklistEntry = blacklistTable.row(actualRow).data();
            $("#editBlacklistPhoneInput").val(blacklistEntry.blacklist_phone);
            $("#editBlacklistReasonInput").val(blacklistEntry.blacklist_reason);
            $("#blacklistPopup, #editBlacklistDIV").show();
        }
        
        function hideEditBlacklistPopup(){
            $("#editBlacklistForm")[0].reset();
            $("#blacklistPopup, #editBlacklistDIV").hide();
        }
        
        function showAddSubscriberPopup(){
            $("#hiddenAddSubscriberCampaignIDInput").val(currentCampaignID);
            $("#addSubscriberPopup, #addSubscriberDIV").show();
        }
        
        function hideAddSubscriberPopup(){
            $("#addSubscriberForm")[0].reset();
            $("#addSubscriberPopup, #addSubscriberDIV").hide();
        }
        
        function deleteBlacklist(row){
            var actualRow = $(row).parents('tr');
			if (actualRow.hasClass('child')) {//Check if the current row is a child row
				actualRow = actualRow.prev();//If it is, then point to the row before it (its 'parent')
			}
            var blacklistEntry = blacklistTable.row(actualRow).data();
            swal({
              title: 'Confirm action',
              text: "Are you sure you want to remove this blacklist entry?",
              type: 'error',
              showCancelButton: true,
              confirmButtonColor: '#3085d6',
              cancelButtonColor: '#d33',
              confirmButtonText: 'Yes, remove'
            }).then(function () {
                var values = { blacklist_id: blacklistEntry.blacklist_id };
                $.ajax({
                    type: "POST",
                    url: "blacklist/delete",
                    data: values,
                    success: function(msg) {
                        if (msg == "") {
                            swal(
                                'Success!',
                                'Blacklist entry was successfully removed.',
                                'success'
                            );
                            getBlacklist();
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
					
                    for (var i = 0; i < employees.length; i++){
                        $("#editCustomerEmployeeSelect, #customerEmployeeSelect, #campaignParticipantSelect, #editCampaignParticipantSelect").append($('<option>', {
                            value: employees[i].employee_id,
                            text: employees[i].employee_name + " " + employees[i].employee_surname
                        }));
                    }
                }
            });
        }
        
        
        function createCampaign(){
            $("#wizardDIV").show();
        }
        
        function initMap(){
            var searchBox = new google.maps.places.SearchBox(document.getElementById('customerAddressInput'));
			var ticketSearchBox = new google.maps.places.SearchBox(document.getElementById('ticketLocationInput'));
			var editTicketSearchBox = new google.maps.places.SearchBox(document.getElementById('editTicketLocationInput'));
                    
            google.maps.event.addListener(searchBox, 'places_changed', function() {
                var places = searchBox.getPlaces();
                var i, place;
                for (i = 0; place = places[i]; i++) {
                    (function(place) {
                        var location = place.geometry.location;
                        $("#addCustomerLatitudeInput").val(location.lat());
                        $("#addCustomerLongitudeInput").val(location.lng());
                        $("#addCustomerBtn").prop("disabled", false); //enable button when an address is selected.
                    }(place));
                }
            });
			
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
		
		function searchByVAT(){
		    var vatNr = $("#vatInput").val();
		    if (isNaN(vatNr)){
		        swal(
                    'Error!',
                    'VAT number must be numerical.',
                    'error'
                );
		    }else{
    		    var postData = { "vat": $("#vatInput").val() };
    		    $.ajax({
                        type: "POST",
                        url: "vat/search",
                        data: postData,
                        dataType: "json",
                        success: function(response) {
                            if (response.list != null){
                                $("#addCustomerNameInput").val(response.list[0].Naziv);
                                $("#customerAddressInput").val(response.list[0].Naslov);
                                
                                if (response.list[0].Tip != "Fizična oseba"){
                                    $("#addCustomerForm input[name=business_entity]").val([1]);
                                }else{
                                    $("#addCustomerForm input[name=business_entity]").val([0]);
                                }
                                if (response.list[0].PlacnikDDV){
                                    $("#addCustomerForm input[name=taxpayer]").val([1]);
                                }else{
                                    $("#addCustomerForm input[name=taxpayer]").val([0]);
                                }
                            }else{
                                swal(
                                    'Error',
                                    'Company with matching VAT number was not found.',
                                    'error'
                                );
                            }
                        }
    		    });
		    }
		}
		
		
		
		function hideAddCustomerPopup() {
            $("#emailsDIV, #phoneNrsDIV").html("");
            $("#customerPopupDIV, #addCustomerDIV").hide();
            $("#callPopupDIV, #incomingCallDIV").show();
        }
    
        function showAddCustomerPopup() {
            $("#callPopupDIV, #incomingCallDIV").hide();
            $("#addCustomerPhoneInput").val(currentCaller);
            $("#customerPopupDIV, #addCustomerDIV").show();
        }
        
        function viewCustomer(row){
			var actualRow = $(row).parents('tr');
			if (actualRow.hasClass('child')) {//Check if the current row is a child row
				actualRow = actualRow.prev();//If it is, then point to the row before it (its 'parent')
			}
            var customer = callTable.row(actualRow).data();
            var url = "<?= BASE_URL ?>" + "customerdetails?customer_id=" + customer.customer_id;
		    window.open(url, "_blank");
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
        
        function showEditCustomerPopup(row) {
            var actualRow = $(row).parents('tr');
			if (actualRow.hasClass('child')) {//Check if the current row is a child row
				actualRow = actualRow.prev();//If it is, then point to the row before it (its 'parent')
			}
            var customer = callTable.row(actualRow).data();
            $("#hiddenEditCustomerIDInput").val(customer.customer_id);
            $("#editCustomerLongitudeInput").val(customer.longitude);
            $("#editCustomerLatitudeInput").val(customer.latitude);
            $("#editCustomerNameInput").val(customer.customer_name);
            $("#editCustomerCodeInput").val(customer.customer_code);
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
            $("#editCustomerIndustrySelect").val(customer.customer_industry);
            $("#editCustomerEmployeeSelect").val(customer.employee_id);
            $("#editCustomerImportanceInput").val(customer.customer_importance);
            $("#editCustomerRangeValue").html(customer.customer_importance);
            $("#editCustomerNotesInput").val(customer.customer_notes);
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
        
        function updateRangeValue(){
		    $("#addCustomerRangeValue").html($("#addCustomerRangeInput").val());
		}
		
		function updateEditRangeValue(){
		    $("#editCustomerRangeValue").html($("#editCustomerImportanceInput").val());
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
        
        function showSetupPopup(){
            $("#setupPopup, #setupDIV").show();
        }
		
		function showEmailSetupPopup(){
			$("#setupPopup, #emailSetupDIV").show();
		}
        
        function hideSetupPopup(){
            $("#setupForm")[0].reset();
            $("#setupPopup, #setupDIV").hide();
        }
		
		function hideEmailSetupPopup(){
			$("#setupPopup, #emailSetupDIV").hide();
		}
        
        function showEditTodaysCallPopup(row){
			var actualRow = $(row).parents('tr');
			if (actualRow.hasClass('child')) {//Check if the current row is a child row
				actualRow = actualRow.prev();//If it is, then point to the row before it (its 'parent')
			}
            var regularCall = callTable.row(actualRow).data();
            $("#editCallHiddenIDInput").val(regularCall.call_id);
            $("#editCallCustomerSelect").val(regularCall.customer_id);
            $("#editCallNotesInput").val(regularCall.call_notes);
            $("#editCallForm input[name=call_subject]").val([regularCall.call_subject]);
            $("#callPopupDIV, #editCallDIV").show();
        }
        
        function showEditCallPopup(row){
			var actualRow = $(row).parents('tr');
			if (actualRow.hasClass('child')) {//Check if the current row is a child row
				actualRow = actualRow.prev();//If it is, then point to the row before it (its 'parent')
			}
            var regularCall = allCallsTable.row(actualRow).data();
            $("#editCallHiddenIDInput").val(regularCall.call_id);
            $("#editCallCustomerSelect").val(regularCall.customer_id);
            $("#editCallNotesInput").val(regularCall.call_notes);
            $("#editCallForm input[name=call_subject]").val([regularCall.call_subject]);
            $("#callPopupDIV, #editCallDIV").show();
        }
        
        function hideEditCallPopup(){
            $("#editCallForm")[0].reset();
            $("#callPopupDIV, #editCallDIV").hide();
        }
        
        function simulateCall(){
			$("#simulateCallPopup").show();
        }
		
		function hideSimulateCallPopup(){
			$("#simulateCallForm")[0].reset();
			$("#simulateCallPopup").hide();
		}
        
        function showIncomingCallPopup(phonenr){
            $("#incomingCallPhonenumberInput").val(phonenr);
            var customerData = { phonenumber: phonenr };
            $.ajax({
                type: "POST",
                url: "<?= BASE_URL ?>" + "customer/getByPhone",
                data: customerData,
                dataType: "json",
                success: function(customer) {
                    if (customer.exists == 0){
                        $("#incomingCallCustomerDIV").html('<p>No customer found with this phone number.</p><button type="button" class="btn btn-primary" onClick="showAddCustomerPopup()">Add customer</button>')
                        $("#callPopupDIV, #incomingCallDIV").show();  
                    }else{
                        $("#incomingCallCustomerDIV").html('<dl><dt>Title</dt><dd>' + customer.customer_name + '</dd><dt>Phone number</dt><dd>' + phonenr + '</dd><dt>E-mail</dt><dd>' + customer.customer_email + '</dd><dt>Address</dt><dd>' + customer.customer_address +'</dd></dl>');
                        $("#incomingCallCustomerIDInput").val(customer.customer_id);
                        $("#callPopupDIV, #incomingCallDIV").show();  
                    }
                }
            });
        }
        
        function hideIncomingCallPopup(){
            $("#incomingCallForm")[0].reset();
            $("#callPopupDIV, #incomingCallDIV").hide();
        }
		
		function showOutgoingCallPopup(phonenr){
            $("#outgoingCallPhonenumberInput").val(phonenr);
            var customerData = { phonenumber: phonenr };
            $.ajax({
                type: "POST",
                url: "<?= BASE_URL ?>" + "customer/getByPhone",
                data: customerData,
                dataType: "json",
                success: function(customer) {
					console.log(customer);
                    if (customer.exists == 0){
                        $("#outgoingCallCustomerDIV").html('<p>No customer found with this phone number.</p><button type="button" class="btn btn-primary" onClick="showAddCustomerPopup()">Add customer</button>')
                        $("#callPopupDIV, #outgoingCallDIV").show();  
                    }else{
                        $("#outgoingCallCustomerDIV").html('<dl><dt>Title</dt><dd>' + customer.customer_name + '</dd><dt>Phone number</dt><dd>' + phonenr + '</dd><dt>E-mail</dt><dd>' + customer.customer_email + '</dd><dt>Address</dt><dd>' + customer.customer_address +'</dd></dl>');
                        $("#outgoingCallCustomerIDInput").val(customer.customer_id);
                        $("#callPopupDIV, #outgoingCallDIV").show();  
                    }
                }
            });
        }
        
        function hideOutgoingCallPopup(){
            $("#outgoingCallForm")[0].reset();
            $("#callPopupDIV, #outgoingCallDIV").hide();
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
                        $("#editCallCustomerSelect, #incomingCallCustomerSelect, #ticketCustomerSelect, #editTicketCustomerSelect").append($('<option>', {
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
        
        function getAllCalls(){
            $.ajax({
                type: "POST",
                url: "<?= BASE_URL ?>" + "telephony/getCalls",
                data: null,
                dataType: "json",
                success: function(calls) {
                    if (allCallsTable != null){
						allCallsTable.clear().rows.add(calls).draw();
						allCallsTable.columns([2,6]).every(function(index) {
							var column = this;
							var select = $("#allCallsTableSelect" + index);
							var currentValue = select.val();
							select.html("");
							select.append('<option value="">No filter</option>');
							column.cells('', column[0]).render('display').sort().unique().each(function(d, j) {
								select.append('<option value="' + d + '">' + d + '</option>')
							});
							select.val(currentValue);
						});
                    }else{
						allCallsTable = $('#allCallsTable').DataTable( {
							initComplete: function () {
								this.api().columns([2,6]).every( function (index) {
									var column = this;
									var name;
									if (index == 2){
										name = "Employee";
									}else{
										name = "Subject";
									}
									var select = $(name + '<br><select id="allCallsTableSelect' + index + '"><option value="">No filter</option></select>')
										.appendTo( $(column.header()).empty())
										.on( 'change', function () {
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
							"aaData": calls,
							"columns": [
								{ "data": "call_type" },
								{ "data": "call_answered" },
								{ "data": "employee_id" },
								{ "data": "customer_id" },
								{ "data": "call_datetime" },
								{ "data": "call_duration" },
								{ "data": "call_subject" },
								{ "defaultContent": ''}
							],
							"columnDefs": [
								{
									// The `data` parameter refers to the data for the cell (defined by the
									// `data` option, which defaults to the column being worked with, in
									// this case `data: 0`.
									"render": function ( data, type, row ) {
										var ticketIcon = "";
										if (row.ticket_id != null){
											ticketIcon = '<label class="label label-primary m-r-5"><i class="fa fa-tag"></i></label>';
										}
										if (data == 1 && row.call_source == "Telephone"){
											return ticketIcon + '<label class="label label-danger"><i class="fas fa-sign-out-alt"></i>&nbsp;Telephone</label>';
										}else if (data == 1){
											 return ticketIcon + '<label class="label label-danger"><i class="fas fa-sign-out-alt"></i>&nbsp;Mobile</label>';
										}else if (data == 0 && row.call_source == "Telephone"){
											 return ticketIcon + '<label class="label label-success"><i class="fas fa-sign-in-alt"></i>&nbsp;Telephone</label>';
										}else{
											 return ticketIcon + '<label class="label label-success"><i class="fas fa-sign-in-alt"></i>&nbsp;Mobile</label>';
										}
									},
									"targets": 0
								},
								{
									// The `data` parameter refers to the data for the cell (defined by the
									// `data` option, which defaults to the column being worked with, in
									// this case `data: 0`.
									"render": function ( data, type, row ) {
										if (data == 1){
											return '<label class="label label-success">Answered</label>';
										}else{
											 return '<label class="label label-danger">Busy</label>';
										}
									},
									"targets": 1
								},
								{
									// The `data` parameter refers to the data for the cell (defined by the
									// `data` option, which defaults to the column being worked with, in
									// this case `data: 0`.
									"render": function(data, type, row) {
										return "<a class='text-primary hover-underline' href='employeepage?employee_id=" + data + "' target='_blank'>"  + row.employee_name + " " + row.employee_surname + "</a>";
									},
									"targets": 2,
									"orderable": false
								},
								{
									// The `data` parameter refers to the data for the cell (defined by the
									// `data` option, which defaults to the column being worked with, in
									// this case `data: 0`.
									"render": function ( data, type, row ) {
										if (data == null){
											return row.call_phonenumber;
										}else{
											return "<span class='text-primary hover-underline text-ellipsis' onClick='viewCustomer(this)'>" + row.customer_name + "</span>";
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
											return moment(data).format(dateformat + ", " + timeformat);
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
										if (data == ""){
											return "Unknown";
										}
										return data;
									},
									"targets": 5
								},
								{
									// The `data` parameter refers to the data for the cell (defined by the
									// `data` option, which defaults to the column being worked with, in
									// this case `data: 0`.
									"render": function ( data, type, row ) {
										if (data == "Information"){
											return "<label class='label label-info'>Information</label>";
										}else if (data == "Reclamation"){
											return "<label class='label label-danger'>Reclamation</label>";
										}else if (data == "Order"){
											return "<label class='label label-success'>Order</label>";
										}else{
											return "<label class='label label-primary'>Other</label>";
										}
										return data;
									},
									"targets": 6,
									"orderable": false
								},
								{
									"render": function ( data, type, row ) {
										if (row.ticket_id == null){
											return '<span onClick="showNewTicketPopup(this)" data-toggle="tooltip" title="Create a ticket" class="text-primary pull-left pointer"><i class="far fa-list-alt"></i></span><span data-toggle="tooltip" title="Call this number" onClick="regularCalloutAll(this)" data-toggle="tooltip" title="Initiate call" class="text-success pull-left pointer m-l-10"><i class="fa fa-phone"></i></span><span onClick="mobileCalloutAll(this)" data-toggle="tooltip" title="Call this number via app" class="text-success pull-left m-l-10 pointer"><i class="fas fa-mobile-alt"></i></span><span data-toggle="tooltip" title="Edit call" onClick="showEditCallPopup(this)" data-toggle="tooltip" title="Edit call" class="text-primary pull-left m-l-10 pointer"><i class="fas fa-pencil-alt"></i></span>';
										}else{
											return '<span onClick="viewTicket(' + row.ticket_id + ')" data-toggle="tooltip" title="View ticket" class="text-success pull-left pointer"><i class="far fa-list-alt"></i></span><span data-toggle="tooltip" title="Call this number" onClick="regularCalloutAll(this)" data-toggle="tooltip" title="Initiate call" class="text-success pull-left pointer m-l-10"><i class="fa fa-phone"></i></span><span onClick="mobileCalloutAll(this)" data-toggle="tooltip" title="Call this number via app" class="text-success pull-left m-l-10 pointer"><i class="fas fa-mobile-alt"></i></span><span data-toggle="tooltip" title="Edit call" onClick="showEditCallPopup(this)" data-toggle="tooltip" title="Edit call" class="text-primary pull-left m-l-10 pointer"><i class="fas fa-pencil-alt"></i></span>';
										}
									},
									"orderable": false,
									"targets": 7
								}
							],
							"order": [],
							responsive: true,
							dom: 'lfrtipB',
							buttons: [{
										extend: 'copy',
										className: 'btn-sm btn-primary',
										exportOptions: {
											format: {
												header: function ( data, column, row ) {
													if (column == 2){
														data = "Employee";
													}else if (column == 4){
														column = "Subject";
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
													if (column == 2){
														data = "Employee";
													}else if (column == 4){
														column = "Subject";
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
													if (column == 2){
														data = "Employee";
													}else if (column == 4){
														column = "Subject";
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
													if (column == 2){
														data = "Employee";
													}else if (column == 4){
														column = "Subject";
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
													if (column == 2){
														data = "Employee";
													}else if (column == 4){
														column = "Subject";
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
		
		function showWorkOrderPage(row){
            var actualRow = $(row).parents('tr');
			if (actualRow.hasClass('child')) {//Check if the current row is a child row
				actualRow = actualRow.prev();//If it is, then point to the row before it (its 'parent')
			}
            var ticket = ticketsTable.row(actualRow).data();
            var url = "<?= BASE_URL ?>" + "workorderdetails?workorder_id=" + ticket.workorder_id;
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
            if (customer_id != 0 && customer_id != null){
                var customer;
                for (var i = 0; i < customersArray.length; i++){
                    if (customersArray[i].customer_id == customer_id){
                        customer = customersArray[i];
                        break;
                    }
                }
                $("#ticketCustomerSelect").val(customer_id).trigger("change");
                $("#ticketEmployeeSelect").val(customer.employee_id).trigger("change");
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
            if (customer_id != 0 && customer_id != null){
                var customer;
                for (var i = 0; i < customersArray.length; i++){
                    if (customersArray[i].customer_id == customer_id){
                        customer = customersArray[i];
                        break;
                    }
                }
                $("#ticketCustomerSelect").val(customer_id).trigger("change");
                $("#ticketEmployeeSelect").val(customer.employee_id).trigger("change");
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
        
        function getTodaysCalls(){
            $.ajax({
                type: "POST",
                url: "<?= BASE_URL ?>" + "telephony/getTodaysCalls",
                data: null,
                dataType: "json",
                success: function(calls) {
                    if (callTable != null){
                        callTable.clear().rows.add(calls).draw();
						callTable.columns([2,5]).every(function(index) {
							var column = this;
							var select = $("#callTableSelect" + index);
							var currentValue = select.val();
							select.html("");
							select.append('<option value="">No filter</option>');
							column.cells('', column[0]).render('display').sort().unique().each(function(d, j) {
								select.append('<option value="' + d + '">' + d + '</option>')
							});
							select.val(currentValue);
						});
                    }else{
						callTable = $('#todaysCallsTable').DataTable( {
							initComplete: function () {
								this.api().columns([2,5]).every( function (index) {
									var column = this;
									var name;
									if (index == 2){
										name = "Employee";
									}else{
										name = "Subject";
									}
									var select = $(name + '<br><select id="callTableSelect' + index + '"><option value="">No filter</option></select>')
										.appendTo( $(column.header()).empty())
										.on( 'change', function () {
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
							"aaData": calls,
							"columns": [
								{ "data": "call_type" },
								{ "data": "call_answered" },
								{ "data": "employee_id" },
								{ "data": "customer_id" },
								{ "data": "call_datetime" },
								{ "data": "call_subject" },
								{ "defaultContent": ''}
							],
							"columnDefs": [
								{
									// The `data` parameter refers to the data for the cell (defined by the
									// `data` option, which defaults to the column being worked with, in
									// this case `data: 0`.
									"render": function ( data, type, row ) {
										var ticketIcon = "";
										if (row.ticket_id != null){
											ticketIcon = "<label class='label label-primary m-r-5'><i class='fa fa-tag'></i></label>";
										}
										if (data == 1 && row.call_source == "Telephone"){
											return ticketIcon + '<label class="label label-danger"><i class="fas fa-sign-out-alt"></i>&nbsp;Telephone</label>';
										}else if (data == 1){
											 return ticketIcon + '<label class="label label-danger"><i class="fas fa-sign-out-alt"></i>&nbsp;Mobile</label>';
										}else if (data == 0 && row.call_source == "Telephone"){
											 return ticketIcon + '<label class="label label-success"><i class="fas fa-sign-in-alt"></i>&nbsp;Telephone</label>';
										}else{
											 return ticketIcon + '<label class="label label-success"><i class="fas fa-sign-in-alt"></i>&nbsp;Mobile</label>';
										}
									},
									"targets": 0
								},
								{
									// The `data` parameter refers to the data for the cell (defined by the
									// `data` option, which defaults to the column being worked with, in
									// this case `data: 0`.
									"render": function ( data, type, row ) {
										if (data == 1){
											return '<label class="label label-success">Answered</label>';
										}else{
											 return '<label class="label label-danger">Busy</label>';
										}
									},
									"targets": 1
								},
								{
									// The `data` parameter refers to the data for the cell (defined by the
									// `data` option, which defaults to the column being worked with, in
									// this case `data: 0`.
									"render": function(data, type, row) {
										return "<a class='text-primary hover-underline' href='employeepage?employee_id=" + data + "' target='_blank'>"  + row.employee_name + " " + row.employee_surname + "</a>";
									},
									"targets": 2,
									orderable: false
								},
								{
									// The `data` parameter refers to the data for the cell (defined by the
									// `data` option, which defaults to the column being worked with, in
									// this case `data: 0`.
									"render": function ( data, type, row ) {
										if (data == null){
											return row.call_phonenumber;
										}else{
											return "<span class='text-primary hover-underline text-ellipsis' onClick='viewCustomer(this)'>" + row.customer_name + "</span>";
										}
									},
									"targets": 3
								},
								{
									// The `data` parameter refers to the data for the cell (defined by the
									// `data` option, which defaults to the column being worked with, in
									// this case `data: 0`.
									"render": function ( data, type, row ) {
										return moment(data).format(timeformat);
									},
									"targets": 4
								},
								{
									// The `data` parameter refers to the data for the cell (defined by the
									// `data` option, which defaults to the column being worked with, in
									// this case `data: 0`.
									"render": function ( data, type, row ) {
										if (data == "Information"){
											return "<label class='label label-info'>Information</label>";
										}else if (data == "Reclamation"){
											return "<label class='label label-danger'>Reclamation</label>";
										}else if (data == "Order"){
											return "<label class='label label-success'>Order</label>";
										}else{
											return "<label class='label label-primary'>Other</label>";
										}
										return data;
									},
									"targets": 5,
									orderable: false
								},
								{
									"render": function ( data, type, row ) {
										if (row.ticket_id == null){
											return '<span onClick="showNewTicketPopupToday(this)" data-toggle="tooltip" title="Create a ticket" class="text-primary pull-left pointer"><i class="far fa-list-alt"></i></span><span data-toggle="tooltip" title="Call this number" onClick="regularCallout(this)" class="text-success pull-left pointer m-l-10"><i class="fa fa-phone"></i></span><span data-toggle="tooltip" title="Call this number via app" onClick="mobileCallout(this)" class="text-success pull-left m-l-10 pointer"><i class="fas fa-mobile-alt"></i></span><span data-toggle="tooltip" title="Edit call" onClick="showEditTodaysCallPopup(this)" class="text-primary pull-left m-l-10 pointer"><i class="fas fa-pencil-alt"></i></span>';
										}else{
											return '<span onClick="viewTicket(' + row.ticket_id + ')" data-toggle="tooltip" title="View ticket" class="text-success pull-left pointer"><i class="far fa-list-alt"></i></span><span data-toggle="tooltip" title="Call this number" onClick="regularCallout(this)" class="text-success pull-left pointer m-l-10"><i class="fa fa-phone"></i></span><span data-toggle="tooltip" title="Call this number via app" onClick="mobileCallout(this)" class="text-success pull-left m-l-10 pointer"><i class="fas fa-mobile-alt"></i></span><span data-toggle="tooltip" title="Edit call" onClick="showEditTodaysCallPopup(this)" class="text-primary pull-left m-l-10 pointer"><i class="fas fa-pencil-alt"></i></span>';
										}
									},
									"orderable": false,
									"targets": 6
								}
							],
							"order": [],
							responsive: true,
							dom: 'lfrtipB',
							buttons: [
									{ extend: 'copy', className: 'btn-sm btn-primary' },
									{ extend: 'csv', className: 'btn-sm btn-primary' },
									{ extend: 'excel', className: 'btn-sm btn-primary' },
									{ extend: 'pdf', className: 'btn-sm btn-primary' },
									{ extend: 'print', className: 'btn-sm btn-primary'}
							],
						});
					}
				}
            });
        }
        
        
        function setIncomingCallSubject(subject){
            var actualSubject = "Other";
            if (subject == 0){
                actualSubject = "Information";
            }else if (subject == 1){
                actualSubject = "Reclamation";
            }else if (subject == 2){
                actualSubject = "Order";
            }
            $("#incomingCallSubjectInput").val(actualSubject);
        }
        
        
        
        function logoutTelephony(){
            location.href = "telephony/logout";
        }
        
        function checkPhoneStatus() {
            var getData = { "q": queue, "days": "1" };
            $.ajax({
                type: "GET",
                url: "<?= TELEPHONY_URL ?>" + "amicore.php",
                data: getData,
                dataType: "json",
                success: function(response) {
					console.log(response);
                    if (response.missedcalls.length > 0){
                        if (missedCallsTable == null){
                            missedCallsTable = $('#missedCallsTable').DataTable( {
                                "aaData": response.missedcalls,
                                "columns": [
									{ "data": "queue" },
                                    { "data": "clid" },
                                    { "data": "datetime" },
                                    { "defaultContent": '<span data-toggle="tooltip" title="Call this number" onClick="missedCallout(this)" class="text-success pull-left pointer"><i class="fa fa-phone"></i></span><span data-toggle="tooltip" title="Call this number via app" onClick="mobileMissedCallout(this)" class="text-success pull-left m-l-10 pointer"><i class="fas fa-mobile-alt"></i></span><span data-toggle="tooltip" title="Mark as called" onClick="setCallAsAnswered(this)" class="pull-left text-primary m-l-10 pointer"><i class="fas fa-exchange-alt"></i></span>'}
                                ],
								"columnDefs": [
									{
										"render": function ( data, type, row ) {
											return moment(data).format(dateformat + ", " + timeformat);
										},
										"targets": 2,
										orderable: false
									},
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
                        }else{
                            missedCallsTable.clear().rows.add(response.missedcalls).draw(false);
                        }
                    }
                    if (response.calls.length > 0) {
						var hasCallConnected = false;
						var firstRingingIndex = null;
                        for (var i = 0; i < response.calls.length; i++) {
                            var currentCall = response.calls[i];
                            if (currentCall.status == "Connected" && currentCall.agentname == ext) {
                                    if ($("#incomingCallDIV").is(":hidden") && currentCaller != currentCall.clidnum) {
                                        showIncomingCallPopup(currentCall.clidnum);
                                        currentCaller = currentCall.clidnum;
                                        $(".phone-panel").removeClass("active");
                                        $("#phone-panel-from").html("");
                                    }else{
                                        cDuration = currentCall.duration;
                                        $("#incomingCallDurationInput").val(cDuration);
                                    }
									hasCallConnected = true;
                            }else if (currentCall.status == "Ringing" && !agentInCall && firstRingingIndex == null){
                                cDuration = currentCall.duration;
                                $("#incomingCallDurationInput").val(cDuration);
                                $(".phone-panel").addClass("active");
                                $("#phone-panel-from").html(currentCall.clidnum);
								firstRingingIndex = i;
                            }
                        }
						agentInCall = hasCallConnected;
                    } else{
                    	currentCaller = null;
                    	$(".phone-panel").removeClass("active");
                        $("#phone-panel-from").html("");
						agentInCall = false;
                    }
                }
            });
        
        }
        
        function regularCallout(row){
            var actualRow = $(row).parents('tr');
			if (actualRow.hasClass('child')) {//Check if the current row is a child row
				actualRow = actualRow.prev();//If it is, then point to the row before it (its 'parent')
			}
            var regularCall = callTable.row(actualRow).data();
            var uid = "12345678"; //random UID just so script works
            var phoneNr = regularCall.call_phonenumber;
            var customer_id = regularCall.customer_id;
            if (customer_id === null){
                swal({
                  text: 'Do you want to call - ' + phoneNr + "?",
                  type: 'info',
                  showCancelButton: true,
                  confirmButtonColor: '#4CD964',
                  cancelButtonColor: '#d33',
                  cancelButtonText: "Cancel",
                  confirmButtonText: 'Call'
                }).then(function () {
                   callPhoneNumberRegularly(phoneNr, uid, customer_id);
                   showOutgoingCallPopup(phoneNr);
                });
            }else{
                var customer_name = regularCall.customer_name
                swal({
                  title: 'Customer ' + customer_name,
                  text: 'Do you want to call - ' + phoneNr + "?",
                  type: 'info',
                  showCancelButton: true,
                  confirmButtonColor: '#4CD964',
                  cancelButtonColor: '#d33',
                  cancelButtonText: "Cancel",
                  confirmButtonText: 'Call'
                }).then(function () {
                   callPhoneNumberRegularly(phoneNr, uid, customer_id);
                   showOutgoingCallPopup(phoneNr);
                });
            }
        }
		
		function regularCalloutAll(row){
			var actualRow = $(row).parents('tr');
			if (actualRow.hasClass('child')) {//Check if the current row is a child row
				actualRow = actualRow.prev();//If it is, then point to the row before it (its 'parent')
			}
            var regularCall = allCallsTable.row(actualRow).data();
            var uid = "12345678"; //random UID just so script works
            var phoneNr = regularCall.call_phonenumber;
            var customer_id = regularCall.customer_id;
            if (customer_id === null){
                swal({
                  text: 'Do you want to call - ' + phoneNr + "?",
                  type: 'info',
                  showCancelButton: true,
                  confirmButtonColor: '#4CD964',
                  cancelButtonColor: '#d33',
                  cancelButtonText: "Cancel",
                  confirmButtonText: 'Call'
                }).then(function () {
                   callPhoneNumberRegularly(phoneNr, uid, customer_id);
                   showOutgoingCallPopup(phoneNr);
                });
            }else{
                var customer_name = regularCall.customer_name
                swal({
                  title: 'Customer ' + customer_name,
                  text: 'Do you want to call - ' + phoneNr + "?",
                  type: 'info',
                  showCancelButton: true,
                  confirmButtonColor: '#4CD964',
                  cancelButtonColor: '#d33',
                  cancelButtonText: "Cancel",
                  confirmButtonText: 'Call'
                }).then(function () {
                   callPhoneNumberRegularly(phoneNr, uid, customer_id);
                   showOutgoingCallPopup(phoneNr);
                });
            }
		}
        
        function callMobile(phonenumber){
            var uid = "12345678"; //random UID just so script works
            var customerData = { phonenumber: phonenumber };
            $.ajax({
                    type: "POST",
                    url: "<?= BASE_URL ?>" + "customer/getByPhone",
                    data: customerData,
                    dataType: "json",
                    success: function(customer) {
                        if (customer.exists == 0){
                            swal({
                              text: 'Do you want to call - ' + phonenumber + "?",
                              type: 'info',
                              showCancelButton: true,
                              confirmButtonColor: '#4CD964',
                              cancelButtonColor: '#d33',
                              cancelButtonText: "Cancel",
                              confirmButtonText: 'Call'
                            }).then(function () {
                                sendCallToMobile(phonenumber, "", "");
                            });
                        }else{
                            swal({
                              title: "Customer " + customer.customer_name,
                              text: 'Do you want to call - ' + phonenumber + "?",
                              type: 'info',
                              showCancelButton: true,
                              confirmButtonColor: '#4CD964',
                              cancelButtonColor: '#d33',
                              cancelButtonText: "Cancel",
                              confirmButtonText: 'Call'
                            }).then(function () {
                                sendCallToMobile(phonenumber, customer.customer_id, customer.customer_name);
                            });
                        }
                    }
            });
        }
        
        function mobileCallout(row){
            var actualRow = $(row).parents('tr');
			if (actualRow.hasClass('child')) {//Check if the current row is a child row
				actualRow = actualRow.prev();//If it is, then point to the row before it (its 'parent')
			}
            var regularCall = callTable.row(actualRow).data();
            var phonenumber = regularCall.call_phonenumber;
            var customerData = { phonenumber: phonenumber };
            $.ajax({
                    type: "POST",
                    url: "<?= BASE_URL ?>" + "customer/getByPhone",
                    data: customerData,
                    dataType: "json",
                    success: function(customer) {
                        if (customer.exists == 0){
                            swal({
                              text: 'Do you want to call - ' + phonenumber + "?",
                              type: 'info',
                              showCancelButton: true,
                              confirmButtonColor: '#4CD964',
                              cancelButtonColor: '#d33',
                              cancelButtonText: "Cancel",
                              confirmButtonText: 'Call'
                            }).then(function () {
                                sendCallToMobile(phonenumber, "", "");
                            });
                        }else{
                            swal({
                              title: "Customer " + customer.customer_name,
                              text: 'Do you want to call - ' + phonenumber + "?",
                              type: 'info',
                              showCancelButton: true,
                              confirmButtonColor: '#4CD964',
                              cancelButtonColor: '#d33',
                              cancelButtonText: "Cancel",
                              confirmButtonText: 'Call'
                            }).then(function () {
                                sendCallToMobile(phonenumber, customer.customer_id, customer.customer_name);
                            });
                        }
                    }
            });
        }
		
		function mobileCalloutAll(row){
            var actualRow = $(row).parents('tr');
			if (actualRow.hasClass('child')) {//Check if the current row is a child row
				actualRow = actualRow.prev();//If it is, then point to the row before it (its 'parent')
			}
            var regularCall = allCallsTable.row(actualRow).data();
            var phonenumber = regularCall.call_phonenumber;
            var customerData = { phonenumber: phonenumber };
            $.ajax({
                    type: "POST",
                    url: "<?= BASE_URL ?>" + "customer/getByPhone",
                    data: customerData,
                    dataType: "json",
                    success: function(customer) {
                        if (customer.exists == 0){
                            swal({
                              text: 'Do you want to call - ' + phonenumber + "?",
                              type: 'info',
                              showCancelButton: true,
                              confirmButtonColor: '#4CD964',
                              cancelButtonColor: '#d33',
                              cancelButtonText: "Cancel",
                              confirmButtonText: 'Call'
                            }).then(function () {
                                sendCallToMobile(phonenumber, "", "");
                            });
                        }else{
                            swal({
                              title: "Customer " + customer.customer_name,
                              text: 'Do you want to call - ' + phonenumber + "?",
                              type: 'info',
                              showCancelButton: true,
                              confirmButtonColor: '#4CD964',
                              cancelButtonColor: '#d33',
                              cancelButtonText: "Cancel",
                              confirmButtonText: 'Call'
                            }).then(function () {
                                sendCallToMobile(phonenumber, customer.customer_id, customer.customer_name);
                            });
                        }
                    }
            });
        }
        
        function campaignCallout(row){
            var actualRow = $(row).parents('tr');
			if (actualRow.hasClass('child')) {//Check if the current row is a child row
				actualRow = actualRow.prev();//If it is, then point to the row before it (its 'parent')
			}
            var campaignCall = pendingTable.row(actualRow).data();
            var uid = "12345678"; //random UID just so script works
            var phoneNr = campaignCall.customer_phone;
            var customer_name = campaignCall.customer_name
            var customer_id = campaignCall.customer_id;
            swal({
                  title: 'Customer ' + customer_name,
                  text: 'Do you want to call - ' + phoneNr + "?",
                  type: 'info',
                  showCancelButton: true,
                  confirmButtonColor: '#4CD964',
                  cancelButtonColor: '#d33',
                  cancelButtonText: "Cancel",
                  confirmButtonText: 'Call'
                }).then(function () {
                   callCampaignNumber(phoneNr, uid, customer_id);
                   showCampaignCallPopup(campaignCall);
            });
        }
        
        function showCampaignCallPopup(campaignCall){
            $("#hiddenCampaignCallCampaignIDInput").val(campaignCall.campaign_id);
            $("#hiddenCampaignCallCustomerIDInput").val(campaignCall.customer_id);
            $("#hiddenCampaignCallPhonenumberInput").val(campaignCall.customer_phone);
            $("#campaignCallPopup, #campaignCallDIV").show();
        }
        
        function hideCampaignCallPopup(){
            $("#campaignCallForm")[0].reset();
            $("#campaignCallPopup, #campaignCallDIV").hide();
        }
        
        function callCustomer(){
            var uid = "12345678"; //random UID just so script works
            var phonenumber = $("#callCustomerPhoneNumberInput").val();
            if (phonenumber == ""){
                return;
            }else{
                var customerData = { phonenumber: phonenumber };
                $.ajax({
                    type: "POST",
                    url: "<?= BASE_URL ?>" + "customer/getByPhone",
                    data: customerData,
                    dataType: "json",
                    success: function(customer) {
                        if (customer.exists == 0){
                            swal({
                              text: 'Do you want to call - ' + phonenumber + "?",
                              type: 'info',
                              showCancelButton: true,
                              confirmButtonColor: '#4CD964',
                              cancelButtonColor: '#d33',
                              cancelButtonText: "Cancel",
                              confirmButtonText: 'Call'
                            }).then(function () {
                               callPhoneNumberRegularly(phonenumber, uid, 0);
                               showOutgoingCallPopup(phonenumber);
                            });
                        }else{
                            swal({
                              title: "Customer " + customer.customer_name,
                              text: 'Do you want to call - ' + phonenumber + "?",
                              type: 'info',
                              showCancelButton: true,
                              confirmButtonColor: '#4CD964',
                              cancelButtonColor: '#d33',
                              cancelButtonText: "Cancel",
                              confirmButtonText: 'Call'
                            }).then(function () {
                                lastCustomerID = customer.customer_id;
                                $("#hiddenCustomerInput").val(customer.customer_id);
                                $("#welcomeMessageSpan").html(customer.customer_greeting);
                                $("#pageHeader").html("Stranka: " + customer.customer_name + " (" + customer.customer_phonenumber + ")");
                                $("#emailSubjectInput").val("Prejeti klic iz " + customer.customer_name);
                                $("#callCustomerPhoneNumberInput").val("");
                                callPhoneNumberRegularly(phonenumber, uid, customer.customer_id);
                                showOutgoingCallPopup(phonenumber);
                            });
                        }
                    }
                });
                
            }
        }
        
        function callMobile(){
            var uid = "12345678"; //random UID just so script works
            var phonenumber = $("#callCustomerPhoneNumberInput").val();
            if (phonenumber == ""){
                return;
            }else{
                var customerData = { phonenumber: phonenumber };
                $.ajax({
                    type: "POST",
                    url: "<?= BASE_URL ?>" + "customer/getByPhone",
                    data: customerData,
                    dataType: "json",
                    success: function(customer) {
                        if (customer.exists == 0){
                            swal({
                              text: 'Do you want to call - ' + phonenumber + "?",
                              type: 'info',
                              showCancelButton: true,
                              confirmButtonColor: '#4CD964',
                              cancelButtonColor: '#d33',
                              cancelButtonText: "Cancel",
                              confirmButtonText: 'Call'
                            }).then(function () {
                                sendCallToMobile(phonenumber, "", "");
                            });
                        }else{
                            swal({
                              title: "Customer " + customer.customer_name,
                              text: 'Do you want to call - ' + phonenumber + "?",
                              type: 'info',
                              showCancelButton: true,
                              confirmButtonColor: '#4CD964',
                              cancelButtonColor: '#d33',
                              cancelButtonText: "Cancel",
                              confirmButtonText: 'Call'
                            }).then(function () {
                                sendCallToMobile(phonenumber, customer.customer_id, customer.customer_name);
                            });
                        }
                    }
                });
                
            }
        }
        
        function sendCallToMobile(phoneNr, customer_id, customer_name){
            var postData = { "phonenumber": phoneNr, "customer_id": customer_id, "customer_name": customer_name };
            $.ajax({
                type: "POST",
                url: "<?= BASE_URL ?>" + "telephony/pushmobile",
                data: postData,
                success: function(response) {
                    
                }
            });
        }
        
        function addOutgoingCall(phoneNr, customer_id){
            var postData = { "phonenumber": phoneNr, "customer_id": customer_id };
            $.ajax({
                type: "POST",
                url: "<?= BASE_URL ?>" + "telephony/outgoing",
                data: postData,
                success: function(response) {
                    getTodaysCalls();
                }
            });
        }
        
        function callPhoneNumberRegularly(phonenumber, uid, customer_id){
            var getData = { "exten": ext, "num": phonenumber, "uid": uid };
            $.ajax({
                type: "GET",
                url: "<?= TELEPHONY_URL ?>" + "callout.php",
                data: getData,
                success: function(response) {
                   
                }
            });
        }
        
        function callCampaignNumber(phonenumber, uid, customer_id){
            var getData = { "exten": ext, "num": phonenumber, "uid": uid };
            $.ajax({
                type: "GET",
                url: "<?= TELEPHONY_URL ?>" + "callout.php",
                data: getData,
                success: function(response) {
                    var postData = { "customer_id": customer_id, "status": 1 };
                    $.ajax({
                        type: "POST",
                        url: "<?= BASE_URL ?>" + "telephony/customercalled",
                        data: postData,
                        dataType: "json",
                        success: function(response) {
                            
                        }
                    });
                }
            });
        }
        
        function missedCallout(row){
            var actualRow = $(row).parents('tr');
			if (actualRow.hasClass('child')) {//Check if the current row is a child row
				actualRow = actualRow.prev();//If it is, then point to the row before it (its 'parent')
			}
            var missedCall = missedCallsTable.row(actualRow).data();
            var uid = missedCall.callid;
            var phoneNr = missedCall.clid;
			var queue = missedCall.queue;
			var callerID = "105547994";
			if (queue == "6700"){
				callerID = "105547993"
			}
            var customerData = { "phonenumber": phoneNr };
            $.ajax({
                type: "POST",
                url: "<?= BASE_URL ?>" + "customer/getByPhone",
                data: customerData,
                dataType: "json",
                success: function(customer) {
                    if (customer.exists == 0){
                        swal({
                          text: 'Do you want to call the following number: ' + phoneNr + "?",
                          type: 'info',
                          showCancelButton: true,
                          confirmButtonColor: '#4CD964',
                          cancelButtonColor: '#d33',
                          cancelButtonText: "Cancel",
                          confirmButtonText: 'Call'
                        }).then(function () {
                           callPhoneNumber(phoneNr, uid, row, callerID);
                           showOutgoingCallPopup(phoneNr);
                        });
                    }else{
                        swal({
                          title: "Call customer - " + customer.customer_name,
                          text: 'Do you want to call the following number: ' + phoneNr + "?",
                          type: 'info',
                          showCancelButton: true,
                          confirmButtonColor: '#4CD964',
                          cancelButtonColor: '#d33',
                          cancelButtonText: "Cancel",
                          confirmButtonText: 'Call'
                        }).then(function () {
                           callPhoneNumber(phoneNr, uid, row, callerID);
                           showOutgoingCallPopup(phoneNr);
                        });
                    }
                }
            });
        }
        
        function mobileMissedCallout(row){
            var actualRow = $(row).parents('tr');
			if (actualRow.hasClass('child')) {//Check if the current row is a child row
				actualRow = actualRow.prev();//If it is, then point to the row before it (its 'parent')
			}
            var missedCall = missedCallsTable.row(actualRow).data();
            var uid = missedCall.callid;
            var phoneNr = missedCall.clid;
            var customerData = { "phonenumber": phoneNr };
            $.ajax({
                type: "POST",
                url: "<?= BASE_URL ?>" + "customer/getByPhone",
                data: customerData,
                dataType: "json",
                success: function(customer) {
                    if (customer.exists == 0){
                        swal({
                          text: 'Do you want to call the following number: ' + phoneNr + "?",
                          type: 'info',
                          showCancelButton: true,
                          confirmButtonColor: '#4CD964',
                          cancelButtonColor: '#d33',
                          cancelButtonText: "Cancel",
                          confirmButtonText: 'Call'
                        }).then(function () {
                           sendCallToMobile(phonenumber, "", "");
                           updateMissedCallStatus(uid, row);
                        });
                    }else{
                        swal({
                          title: "Call customer - " + customer.customer_name,
                          text: 'Do you want to call the following number: ' + phoneNr + "?",
                          type: 'info',
                          showCancelButton: true,
                          confirmButtonColor: '#4CD964',
                          cancelButtonColor: '#d33',
                          cancelButtonText: "Cancel",
                          confirmButtonText: 'Call'
                        }).then(function () {
                           sendCallToMobile(phonenumber, "", "");
                           updateMissedCallStatus(uid, row);
                        });
                    }
                }
            });
        }
        
        function callPhoneNumber(phonenumber, uid, row, callerID){
            var getData = { "exten": ext, "num": phonenumber, "uid": uid, "callerid": callerID };
			console.log(getData);
            $.ajax({
                type: "GET",
                url: "<?= TELEPHONY_URL ?>" + "callout.php",
                data: getData,
                success: function(response) {
                    lastCallUID = uid;
					lastCallRow = row;
                }
            });
        }
        
        function updateMissedCallStatus(uid, row){
            var updateData = { "uid": uid, "status": "done" };
            $.ajax({
                type: "GET",
                url: "<?= TELEPHONY_URL ?>" + "updatestatus.php",
                data: updateData,
                success: function(response) {
                    missedCallsTable.row($(row).parents('tr')).remove().draw();
					lastCallUID = null;
					lastCallRow = null;
                }
            });
        }
        
        function setCallAsAnswered(row){
            var missedCall = missedCallsTable.row($(row).parents('tr')).data();
            var uid = missedCall.callid;
            var updateData = { "uid": uid, "status": "done" };
            $.ajax({
                type: "GET",
                url: "<?= TELEPHONY_URL ?>" + "updatestatus.php",
                data: updateData,
                success: function(response) {
                    missedCallsTable.row($(row).parents('tr')).remove().draw();
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