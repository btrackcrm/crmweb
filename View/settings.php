<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
<!--<![endif]-->
<head>
	<meta charset="utf-8" />
	<title>Settings</title>
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
    <link href="<?= ASSETS_URL . "morris/morris.css" ?>" rel="stylesheet" />
    <link href="<?= ASSETS_URL . "telinput/build/css/intlTelInput.css" ?>" rel="stylesheet" />
	<link href="<?= ASSETS_URL . "dropzone/min/dropzone.min.css" ?>" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.6.9/sweetalert2.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.6.9/sweetalert2.min.css">

	<!-- ================== END PAGE LEVEL STYLE ================== -->
	
	<!-- ================== BEGIN BASE JS ================== -->
	<script src="<?= ASSETS_URL . "pace/pace.min.js" ?>" ></script>
	<!-- ================== END BASE JS ================== -->
</head>
<style>
	
    .padded15{
        padding: 15px;
    }
    
    .tab-content {
        padding: 15px 0px 0px 0px;
        margin-bottom: 20px;
        background: none;
        -webkit-border-radius: 3px;
        -moz-border-radius: 3px;
        border-radius: 3px;
    }
    
     #emailTemplateTable, #smsTemplateTable{
        width: 100% !important;
    }
    
    .control-label{
        text-align: left !important;
    }
    
    .intl-tel-input {
        display: block;
    }
	
	#uploadPictureDIV{
        width: 700px;
        height: auto;
        position: relative;
        margin: 7% auto 0px auto;
    }
    
    body.dragging, body.dragging * {
  cursor: move !important; }

/* line 4, /Users/jonasvonandrian/jquery-sortable/source/css/jquery-sortable.css.sass */
.dragged {
  position: absolute;
  top: 0;
  opacity: 0.5;
  z-index: 2000; }

/* line 10, /Users/jonasvonandrian/jquery-sortable/source/css/jquery-sortable.css.sass */
ol.vertical {
  margin: 0 0 9px 0;
  min-height: 10px; }
  /* line 13, /Users/jonasvonandrian/jquery-sortable/source/css/jquery-sortable.css.sass */
  ol.vertical li {
    display: block;
    margin: 5px;
    padding: 5px;
    border: 1px solid #cccccc;
    color: #0088cc;
    background: #eeeeee; }
  /* line 20, /Users/jonasvonandrian/jquery-sortable/source/css/jquery-sortable.css.sass */
  ol.vertical li.placeholder {
    position: relative;
    margin: 0;
    padding: 0;
    border: none; }
    /* line 25, /Users/jonasvonandrian/jquery-sortable/source/css/jquery-sortable.css.sass */
    ol.vertical li.placeholder:before {
      position: absolute;
      content: "";
      width: 0;
      height: 0;
      margin-top: -5px;
      left: -5px;
      top: -4px;
      border: 5px solid transparent;
      border-left-color: red;
      border-right: none; }

/* line 32, /Users/jonasvonandrian/jquery-sortable/source/css/application.css.sass */
ol {
  list-style-type: none; }
  /* line 34, /Users/jonasvonandrian/jquery-sortable/source/css/application.css.sass */
  ol i.icon-move {
    cursor: pointer; }
  /* line 36, /Users/jonasvonandrian/jquery-sortable/source/css/application.css.sass */
  ol li.highlight {
    background: #333333;
    color: #999999; }
    
    ol{
        padding: 0px;
    }
	
	.profile-header .profile-header-tab {
		padding: 0 0 0 10px;
	}
	
	.whiteBG{
        background-color: white;
        padding: 20px;
        border-radius: 2px;
		webkit-box-shadow: 0 2px 2px 0 rgba(0,0,0,0.14), 0 1px 5px 0 rgba(0,0,0,0.12), 0 3px 1px -2px rgba(0,0,0,0.2);
		box-shadow: 0 2px 2px 0 rgba(0,0,0,0.14), 0 1px 5px 0 rgba(0,0,0,0.12), 0 3px 1px -2px rgba(0,0,0,0.2);
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
    					        echo '<li class="active">
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
						<!-- BEGIN profile-header-info -->
						<div class="profile-header-info">
							<h4 class="m-t-10 m-b-5">Settings</h4>
							<div class="m-t-10">
								<button class="btn btn-sm btn-white" onClick="showUploadPopup()"><i class="fas fa-cloud-upload-alt text-success m-r-5"></i>Upload company logo</button>
								<a class="btn btn-white btn-sm" href="http://track.appdev.si/Downloads/btrack-simple.apk" download ><i class="fas fa-cloud-download-alt text-primary m-r-5"></i>Download Tracking app</a>
								<a class="btn btn-white btn-sm" href="http://track.appdev.si/Downloads/btrack-crm.apk" download ><i class="fas fa-cloud-download-alt text-primary m-r-5"></i>Download CRM app</a>	
							</div>
						</div>
						<!-- END profile-header-info -->
					</div>
					<!-- END profile-header-content -->
					<!-- BEGIN profile-header-tab -->
					<ul class="profile-header-tab nav nav-tabs">
						<li class="nav-item active"><a href="#crm-settings" class="nav-link" data-toggle="tab">GENERAL</a></li>
						<li class="nav-item"><a href="#telephony-settings" class="nav-link" data-toggle="tab">TELEPHONY AND TICKETING</a></li>
						<li class="nav-item"><a href="#tracking-settings" class="nav-link" data-toggle="tab">TRACKING</a></li>
						<li class="nav-item"><a href="#integrations-view" class="nav-link" data-toggle="tab">SMS</a></li>
						<li class="nav-item"><a href="#template-view" class="nav-link" data-toggle="tab">NOTIFICATION TEMPLATES</a></li>
					</ul>
					<!-- END profile-header-tab -->
				</div>
			</div>
			<!-- end profile -->
            <div class="profile-content">
				<div class="tab-content">
					<div class="tab-pane fade in active" id="crm-settings">
						<div class="row">
							<div class="col-md-12">
								<div class="panel panel-primary">
									<div class="panel-heading">
										<div class="panel-heading-btn">
											<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
										</div>
										<h4 class="panel-title">General settings</h4>
									</div>
									<div class="panel-body">
										<h4>Company logo</h4>
										<img id="logoIMG" src="" alt="" style="max-width: 30%;">
										<form id="editSettingsForm" action="<?= BASE_URL . "settings/edit" ?>" method="post" class="form-horizontal">
											<input type="hidden" id="companyLatitudeInput" name="latitude" />
											<input type="hidden" id="companyLongitudeInput" name="longitude" />
											<div class="form-group">
												<div class="col-md-4">
													<label>Display inactive users:</label><br>
													<div class="radio radio-css radio-inline radio-success">
														<input type="radio" id="ccb1" name="employees_showinactive" value="1" checked>
														<label for="ccb1">
															Enabled
														</label>
													</div>
													<div class="radio radio-css radio-inline radio-danger">
														<input type="radio" id="ccb2" name="employees_showinactive" value="0">
														<label for="ccb2">
															Disabled
														</label>
													</div>
												</div>
												<div class="col-md-4">
													<label>Decimal seperator:</label><br>
													<div class="radio radio-css radio-inline radio-primary">
														<input type="radio" id="zcb2" name="decimal_seperator" value="0">
														<label for="zcb2">
															Dot
														</label>
													</div>
													<div class="radio radio-css radio-inline radio-primary">
														<input type="radio" id="zcb1" name="decimal_seperator" value="1">
														<label for="zcb1">
															Comma
														</label>
													</div>
												</div>
											</div>
											<div class="form-group">
												<div class="col-md-8">
													<label>Send system notifications to:</label>
													<input id="notificationsEmail" type="text" class="form-control" name="notifications_email" placeholder="Enter notifications e-mail" required />
												</div>
											</div>
											<div class="form-group">
												<div class="col-md-8">
													<label>Company name:</label>
													<input id="companyName" type="text" class="form-control" value="" name="company_name" placeholder="Enter company name" required/>
												</div>
												<div class="col-md-4">
													<label>Phone number:</label>
													<input id="companyPhone" type="text" class="tel-input form-control" value="" placeholder="Enter company phone number" required/>
												</div>
											</div>
											<div class="form-group">
												<div class="col-md-6">
													<label>Company address:</label>
													<input id="companyAddress" type="text" class="form-control" value="" name="company_address" placeholder="Enter company address" required/>
												</div>
												<div class="col-md-4">
													<label>City:</label>
													<input id="companyCity" type="text" class="form-control" value="" name="company_city" placeholder="Enter company city" required/>
												</div>
												<div class="col-md-2">
													<label>Zipcode:</label>
													<input id="companyZipcode" type="text" class="form-control" value="" name="company_zipcode" pattern="\d{1,6}" placeholder="Enter zipcode" required/>
												</div>
											</div>
											<button class="btn btn-primary">Save settings</button>
										</form>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="tab-pane fade" id="telephony-settings">
						<div class="row">
							<div class="col-md-12">
								<div class="panel panel-primary">
									<div class="panel-heading">
										<div class="panel-heading-btn">
											<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
										</div>
										<h4 class="panel-title">Telephony and ticketing settings</h4>
									</div>
									<div class="panel-body">
										<form id="editTelephonySettingsForm" action="<?= BASE_URL . "settings/telephony" ?>" method="post" class="form-horizontal">
											<div class="form-group">
												<div class="col-md-4">
													<label>Show e-mail on telephony page:</label><br>
													<div class="radio radio-css radio-inline radio-success">
														<input type="radio" id="acb1" name="telephony_showemails" value="1" checked>
														<label for="acb1">
															Enabled
														</label>
													</div>
													<div class="radio radio-css radio-inline radio-danger">
														<input type="radio" id="acb2" name="telephony_showemails" value="0">
														<label for="acb2">
															Disabled
														</label>
													</div>
												</div>
												<div class="col-md-4">
													<label>Click to call mobile functionality:</label><br>
													<div class="radio radio-css radio-inline radio-success">
														<input type="radio" id="bcb1" name="telephony_showmobile" value="1" checked>
														<label for="bcb1">
															Enabled
														</label>
													</div>
													<div class="radio radio-css radio-inline radio-danger">
														<input type="radio" id="bcb2" name="telephony_showmobile" value="0">
														<label for="bcb2">
															Disabled
														</label>
													</div>
												</div>
											</div>
											<div class="form-group">
												<div class="col-md-4">
													<label>Telephony central:</label>
													<select class="form-control" name="telephony_central">
														<option value="0">Asterisk 11</option>
														<option value="1">Asterisk 13</option>
														<option value="2">Asterisk 14</option>
														<option value="3">Yeastar</option>
													</select>
												</div>
												<div class="col-md-4">
													<label>Ticket numbering prefix:</label>
													<input id="ticketPrefix" type="text" class="form-control" name="ticketing_prefix" value="TCKT-2018-" required />
												</div>
												<div class="col-md-4">
													<label>Work order numbering prefix:</label>
													<input id="workorderPrefix" type="text" class="form-control" name="workorder_prefix" value="WO-2018-" required />
												</div>
											</div>
											<button class="btn material primary">Save settings</button>
										</form>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="tab-pane fade" id="tracking-settings">
						<div class="row">
							<div class="col-md-12">
								<div class="panel panel-primary">
									<div class="panel-heading">
										<div class="panel-heading-btn">
											<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
										</div>
										<h4 class="panel-title">Tracking settings</h4>
									</div>
									<div class="panel-body">
										<form id="editTrackingSettingsForm" action="<?= BASE_URL . "settings/tracking" ?>" method="post" class="form-horizontal">
											<div class="form-group">
												<div class="col-md-2">
													<label>Event detection radius (meters):</label>
													<input id="eventRadius" type="text" class="form-control" value="50" name="event_radius" required/>
												</div>
												<div class="col-md-2">
													<label>Work location detection radius (meters):</label>
													<input id="workLocationRadius" type="text" class="form-control" value="50" name="location_radius" required/>
												</div>
												<div class="col-md-2">
													<label>Stop minimum duration (minutes):</label>
													<input id="stopDuration" type="text" class="form-control" name="stop_duration" value="20" required/>
												</div>
											</div>
											<div class="form-group">
												<div class="col-md-2">
													<label>Work time from:</label>
													<input id="workTimeFrom" type="text" class="form-control" value="08:00" name="worktime_from" required/>
												</div>
												<div class="col-md-2">
													<label>Work time to:</label>
													<input id="workTimeTo" type="text" class="form-control" value="16:00" name="worktime_to" required/>
												</div>
											</div>
											<div class="form-group">
												<div class="col-md-1">
													<label>Trip cost per km:</label>
													<input id="kmCost" type="text" class="form-control" name="trip_cost" value="1" required/>
												</div>
												<div class="col-md-1">
													<label>Daily allowance:</label>
													<input id="dailyAllowance" type="text" class="form-control" name="daily_allowance" value="20" required/>
												</div>
												<div class="col-md-2">
													<label>Travel order numbering prefix:</label>
													<input id="travelPrefix" type="text" class="form-control" name="travelorder_prefix" value="Order-2017" required/>
												</div>
											</div>
											<button class="btn material primary">Save settings</button>
										</form>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="tab-pane fade" id="integrations-view">
						<div class="row">
							<div class="col-md-12">
								<div class="panel panel-primary">
									<div class="panel-heading">
										<div class="panel-heading-btn">
											<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
										</div>
										<h4 class="panel-title">T2 SMS API</h4>
									</div>
									<div class="panel-body">
										<form id="setupSMSForm" action="<?= BASE_URL . "settings/sms" ?>" method="post" class="form-horizontal m-t-15">
											<div class="form-group">
												<div class="col-md-8">
													<label>Company SMS URL:</label>
													<input type="text" class="form-control" name="sms_url" placeholder="Enter company SMS API URL" required />
												</div>
												<div class="col-md-4">
													<label>From label or number:</label>
													<input type="text" class="form-control" name="sms_label" placeholder="Enter phone number or from label" required />
												</div>
											</div>
											<div class="form-group">
												<div class="col-md-6">
													<label>Username:</label>
													<input type="text" class="form-control" name="sms_username" placeholder="Enter your username" required />
												</div>
												<div class="col-md-6">
													<label>Password:</label>
													<input type="password" class="form-control" name="sms_password" placeholder="Enter your password" required />
												</div>
											</div>
											<button class="btn material primary">Save settings</button>
										</form>
										
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="tab-pane fade" id="template-view">
						<div class="panel panel-primary">
							<div class="panel-heading">
								<div class="panel-heading-btn">
									<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
								</div>
								<h4 class="panel-title">E-mail templates</h4>
							</div>
							<div class="panel-body">
							<div class="dataTables_wrapper form-inline dt-bootstrap no-footer">
								<table id="emailTemplateTable" class="table table-striped table-bordered">
									<thead>
										<tr>
											<th>Title</th>
											<th>Subject</th>
											<th></th>
										</tr>
									</thead>
									<tbody>
							
									</tbody>
								</table>
							</div>
							</div>
						</div>
						<div class="panel panel-primary">
							<div class="panel-heading">
								<div class="panel-heading-btn">
									<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
								</div>
								<h4 class="panel-title">SMS templates</h4>
							</div>
							<div class="panel-body">
							<div class="dataTables_wrapper form-inline dt-bootstrap no-footer">
								<table id="smsTemplateTable" class="table table-striped table-bordered">
									<thead>
										<tr>
											<th>Title</th>
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
		<div class="popupContainer" id="uploadPopup" hidden>
            <div class="panel panel-primary" id="uploadPictureDIV" hidden>
                <div class="panel-heading">
                    <div class="panel-heading-btn">
                        <button onclick="hideUploadPopup()" class="btn btn-xs btn-icon btn-circle btn-default"><i class="fa fa-times"></i></button>
                    </div>
                    <h4 class="panel-title">Upload your company logo</h4>
                </div>
                <div class="panel-body">
                    <form id="uploadPictureForm" action="settings/picture" method="post" class="form-horizontal dropzone">
                    </form>
                </div>
            </div>
		</div>
		<!-- end #content -->
		<!-- begin theme-panel -->
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
        <!-- end theme-panel -->
        
		
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
	<script src="<?= JS_URL . "jquery.sortable.js" ?>"></script>
	<!-- ================== END BASE JS ================== -->
	
	<!-- ================== BEGIN PAGE LEVEL JS ================== -->
	<script src="<?= JS_URL . "apps.min.js" ?>"></script>
    <script src="<?= JS_URL . "timedisplay.js" ?>"></script>
    <script src="<?= JS_URL . "inactivity.js" ?>"></script>
    <script src="<?= ASSETS_URL . "fullcalendar/lib/moment.min.js" ?>"></script>
	<script src="<?= ASSETS_URL . "dropzone/min/dropzone.min.js" ?>"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/js/bootstrap-datetimepicker.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/css/bootstrap-datetimepicker.min.css" rel="stylesheet"/>
    <script src="<?= ASSETS_URL . "tinymce/js/tinymce/tinymce.min.js" ?>"></script>
    <link href="<?= ASSETS_URL . "DataTables/media/css/dataTables.bootstrap.min.css" ?>" rel="stylesheet" />
	<link href="<?= ASSETS_URL . "DataTables/extensions/Responsive/css/responsive.bootstrap.min.css" ?>" rel="stylesheet" />
	<script src="<?= ASSETS_URL . "DataTables/media/js/jquery.dataTables.js" ?>"></script>
	<script src="<?= ASSETS_URL . "DataTables/media/js/dataTables.bootstrap.min.js" ?>"></script>
	<script src="<?= ASSETS_URL . "DataTables/extensions/Responsive/js/dataTables.responsive.min.js" ?>"></script>
	<script src="<?= ASSETS_URL . "telinput/build/js/intlTelInput.min.js" ?>"></script>
	<script src="<?= ASSETS_URL . "telinput/build/js/utils.js" ?>"></script>
	<!-- ================== END PAGE LEVEL JS ================== -->
	
	<script>
	    $("#workTimeFrom, #workTimeTo").datetimepicker({format: "HH:mm"});
	    var etTable;
	    var smsTable;
	    var adjustment;
	    var group;
	    var loggedEmployee = <?php echo json_encode($_SESSION["id"]); ?>;
		var firstPageLoad = true;
	    var hash = document.location.hash;
        if (hash == "#emails") {
            $('.nav-pills a[href="#email-view"]').tab('show');
        } 
        if (hash == "#sms"){
            $('.nav-pills a[href="#sms-view"]').tab('show');
        }
        
        // Client ID and API key from the Developer Console
        var CLIENT_ID = '199528804001-7dj1br8mm8le62dhfo2465666ikobfrt.apps.googleusercontent.com';
        
        // Array of API discovery doc URLs for APIs used by the quickstart
        var DISCOVERY_DOCS = ["https://www.googleapis.com/discovery/v1/apis/gmail/v1/rest"];
        
        // Authorization scopes required by the API; multiple scopes can be
        // included, separated by spaces.
        var SCOPES = 'https://www.googleapis.com/auth/gmail.modify';
        
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
                discoveryDocs: DISCOVERY_DOCS,
                clientId: CLIENT_ID,
                scope: SCOPES
            }).then(function() {
                // Listen for sign-in state changes.
                gapi.auth2.getAuthInstance().isSignedIn.listen(updateSigninStatus);
        
                // Handle the initial sign-in state.
                updateSigninStatus(gapi.auth2.getAuthInstance().isSignedIn.get());
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
            if (isSignedIn) {
                $("#gAuthorizeBtn").hide();
                $("#gSignOutBtn").show();
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
            location.reload();
        }
        
	    $(document).ready(function() {
			getMenuStatistics(loggedEmployee);
			getSettings();
			getUserSettings();
			getEmailTemplates();
			getSMSTemplates();
			
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
			
			$(".tel-input").intlTelInput({ initialCountry: "si",
			hiddenInput: "company_phonenumber"});
			
			tinymce.init({
                selector: 'textarea#emailTemplate',
                height: 400,
                  plugins: 'print preview fullpage searchreplace autolink directionality visualblocks visualchars fullscreen image link media template codesample table charmap hr pagebreak nonbreaking anchor toc insertdatetime advlist lists textcolor wordcount imagetools contextmenu colorpicker textpattern',
                  toolbar1: 'formatselect | bold italic strikethrough forecolor backcolor | link | alignleft aligncenter alignright alignjustify  | numlist bullist outdent indent  | removeformat',
            });

            group = $("ol.simple_with_animation").sortable({
              group: 'simple_with_animation',
              pullPlaceholder: false,
              // animation on drop
              onDrop: function  ($item, container, _super) {
                var $clonedItem = $('<li/>').css({height: 0});
                $item.before($clonedItem);
                $clonedItem.animate({'height': $item.height()});
            
                $item.animate($clonedItem.position(), function  () {
                  $clonedItem.detach();
                  _super($item, container);
                });
                
                var data = group.sortable("serialize").get();

                var jsonString = JSON.stringify(data, null, ' ');
            
                console.log(jsonString);
              },
            
              // set $item relative to cursor position
              onDragStart: function ($item, container, _super) {
                var offset = $item.offset(),
                    pointer = container.rootGroup.pointer;
            
                adjustment = {
                  left: pointer.left - offset.left,
                  top: pointer.top - offset.top
                };
            
                _super($item, container);
              },
              onDrag: function ($item, position) {
                $item.css({
                  left: position.left - adjustment.left,
                  top: position.top - adjustment.top
                });
              }
            });
            
			$('#editSettingsForm').on('submit', function(e) { //use on if jQuery 1.7+
                e.preventDefault();
                $.ajax({
                    type: "POST",
                    url: "settings/edit",
                    data: $("#editSettingsForm").serialize(),
                    success: function(msg) {
                        if (msg == "") {
                            swal(
                                'Success!',
                                'Settings were successfully changed.',
                                'success'
                            );
                            $("#editSettingsForm")[0].reset();
                            getSettings();
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
			
			$('#editTelephonySettingsForm').on('submit', function(e) { //use on if jQuery 1.7+
                e.preventDefault();
                $.ajax({
                    type: "POST",
                    url: "settings/telephony",
                    data: $("#editTelephonySettingsForm").serialize(),
                    success: function(msg) {
                        if (msg == "") {
                            swal(
                                'Success!',
                                'Settings were successfully changed.',
                                'success'
                            );
                            getSettings();
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
			
			$('#editTrackingSettingsForm').on('submit', function(e) { //use on if jQuery 1.7+
                e.preventDefault();
                $.ajax({
                    type: "POST",
                    url: "settings/tracking",
                    data: $("#editTrackingSettingsForm").serialize(),
                    success: function(msg) {
                        if (msg == "") {
                            swal(
                                'Success!',
                                'Settings were successfully changed.',
                                'success'
                            );
                            getSettings();
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
            
            $('#generalSettingsForm').on('submit', function(e) { //use on if jQuery 1.7+
                e.preventDefault();
                $.ajax({
                    type: "POST",
                    url: "settings/personal",
                    data: $("#generalSettingsForm").serialize(),
                    success: function(msg) {
                        if (msg == "") {
                            swal(
                                'Success!',
                                'Settings were successfully changed.',
                                'success'
                            );
                            getUserSettings();
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
            
            $('#setupEmailForm').on('submit', function(e) { //use on if jQuery 1.7+
                e.preventDefault();
                $.ajax({
                    type: "POST",
                    url: "settings/email",
                    data: $("#setupEmailForm").serialize(),
                    success: function(msg) {
                        if (msg == "") {
                            swal(
                                'Success!',
                                'Settings were successfully changed.',
                                'success'
                            );
                            getUserSettings();
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
            
            $('#setupSMSForm').on('submit', function(e) { //use on if jQuery 1.7+
                e.preventDefault();
                $.ajax({
                    type: "POST",
                    url: "settings/sms",
                    data: $("#setupSMSForm").serialize(),
                    success: function(msg) {
                        if (msg == "") {
                            swal(
                                'Success!',
                                'SMS credentials were successfully saved.',
                                'success'
                            );
                            getSettings();
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
		
		function initMap(){
            var searchBox = new google.maps.places.SearchBox(document.getElementById('companyAddress'));
                    
            google.maps.event.addListener(searchBox, 'places_changed', function() {
                var places = searchBox.getPlaces();
                console.log(places);
                var i, place;
                for (i = 0; place = places[i]; i++) {
                    (function(place) {
                        var location = place.geometry.location;
                        $("#companyLatitudeInput").val(location.lat());
                        $("#companyLongitudeInput").val(location.lng());
                    }(place));
                }
            });
		}
		
		function testEmailConnection(){
		    $.ajax({
                type: "POST",
                url: "<?= BASE_URL ?>" + "settings/connection",
                data: $("#setupEmailForm").serialize(),
                success: function(response) {
                    console.log(response);
                    if (response == "OK"){
                            swal(
                                'Connection established',
                                'Connection with e-mail server was successfully established.',
                                'success'
                            );
                    }else{
                        swal(
                                'Connection failed',
                                'Please try connecting with another set of parameters.',
                                'error'
                            );
                    }
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
		
		function getSettings(){
		    $.ajax({
                type: "POST",
                url: "settings/get",
                data: null,
                dataType: "json",
                success: function(settings) {
					$("#logoIMG").prop("src", "<?= IMG_URL ?>" + settings.company_logo);
                    $("#notificationsEmail").val(settings.notifications_email);
                    $("#companyLatitudeInput").val(settings.company_latitude);
                    $("#companyLongitudeInput").val(settings.company_longitude);
                    $("#companyName").val(settings.company_name);
                    $("#companyAddress").val(settings.company_address);
					$("#companyCity").val(settings.company_city);
					$("#companyZipcode").val(settings.company_zipcode);
                    $("#companyPhone").val(settings.company_phonenumber);
                    $("#eventRadius").val(settings.event_radius);
                    $("#workLocationRadius").val(settings.location_radius);
                    $("#workTimeFrom").val(settings.worktime_from);
                    $("#workTimeTo").val(settings.worktime_to);
                    $("#stopDuration").val(settings.stop_duration);
                    $("#kmCost").val(settings.trip_cost);
                    $("#dailyAllowance").val(settings.daily_allowance);
                    $("#travelPrefix").val(settings.travelorder_prefix);
                    $("#editSettingsForm input[name=decimal_seperator]").val([settings.decimal_seperator]);
                    $("#editTelephonySettingsForm input[name=telephony_showemails]").val([settings.telephony_showemails]);
                    $("#editTelephonySettingsForm input[name=telephony_showmobile]").val([settings.telephony_showmobile]);
                    $("#editTelephonySettingsForm input[name=employees_showinactive]").val([settings.employees_showinactive]);
					$("#workorderPrefix").val(settings.workorder_prefix);
					$("#ticketPrefix").val(settings.ticketing_prefix);
					$("#setupSMSForm input[name=sms_url]").val(settings.sms_url);
					$("#setupSMSForm input[name=sms_label]").val(settings.sms_label);
					$("#setupSMSForm input[name=sms_username]").val(settings.sms_username);
					$("#setupSMSForm input[name=sms_password]").val(settings.sms_password);
                    $("#emailHost").val(settings.email_host);
                    $("#emailUsername").val(settings.email_username);
                    $("#emailPassword").val(settings.email_password);
                    if (settings.email_ssl == 1){
                        $("#emailSSL").prop("checked", true);
                    }
                    if (settings.email_validatecert == 1){
                        $("#emailCert").prop("checked", true);
                    }
					if (firstPageLoad){
						App.init();
						firstPageLoad = false;
					}
                }
		    });
		}
		
		function getUserSettings(){
		     $.ajax({
                type: "POST",
                url: "user/settings",
                data: null,
                dataType: "json",
                success: function(settings) {
                    $("#languageInput").val(settings.language);
                    $("#dateformatInput").val(settings.dateformat);
                    $("#timeformatInput").val(settings.timeformat);
                }
		     });
		}
		
		function getEmailTemplates(){
		    $.ajax({
                type: "POST",
                url: "emailtemplates/get",
                data: null,
                dataType: "json",
                success: function(templates) {
                    if (etTable != null){
                        etTable.destroy();
                    }
                    etTable = $('#emailTemplateTable').DataTable({
                        "aaData": templates,
                        "columns": [
                            { "data": "template_title" },
                            { "data": "template_subject" },
                            { "defaultContent": '<span onClick="viewEmailTemplate(this)" data-toggle="tooltip" title="View template" class="text-primary pull-left"><i class="fa fa-edit"></i></span>'}
                        ],
                        "columnDefs": [
                            {
                                    "targets": 2,
                                    "orderable": false
                            }
                        ],
                        dom: 'lfrtip'
                    });
                }
		    });
		}
		
		function getSMSTemplates(){
		    $.ajax({
                type: "POST",
                url: "smstemplates/get",
                data: null,
                dataType: "json",
                success: function(templates) {
                    if (smsTable != null){
                        smsTable.destroy();
                    }
                    smsTable = $('#smsTemplateTable').DataTable({
                        "aaData": templates,
                        "columns": [
                            { "data": "template_title" },
                            { "defaultContent": '<span onClick="viewSMSTemplate(this)" data-toggle="tooltip" title="View template" class="text-primary pull-left"><i class="fa fa-edit"></i></span>'}
                        ],
                        "columnDefs": [
                            {
                                    "targets": 1,
                                    "orderable": false
                            }
                        ],
                        dom: 'lfrtip'
                    });
                }
		    });
		}
		
		function showUploadPopup(){
	        $("#uploadPopup, #uploadPictureDIV").show();
	    }
	    
	    function hideUploadPopup(){
	        $("#uploadPopup, #uploadPictureDIV").hide();
	    }
		
		function viewEmailTemplate(row){
		    var template = etTable.row($(row).parents('tr')).data();
		    window.location.href = "emailtemplates/view?template_id=" + template.template_id;
		}
		
		function viewSMSTemplate(row){
		    var template = smsTable.row($(row).parents('tr')).data();
		    window.location.href = "smstemplates/view?template_id=" + template.template_id;
		}
	</script>
	<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyByTQPUumUXa7XiemK1liQCKT3839oj7DE&callback=initMap&language=en&libraries=places"></script>
	<script async defer src="https://apis.google.com/js/api.js" onload="this.onload=function(){};handleClientLoad()" onreadystatechange="if (this.readyState === 'complete') this.onload()"></script>
</body>
</html>
