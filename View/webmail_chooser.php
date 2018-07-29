<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
<!--<![endif]-->
<head>
	<meta charset="utf-8" />
	<title>Webmail</title>
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.6.9/sweetalert2.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.6.9/sweetalert2.min.css">
	<!-- ================== END PAGE LEVEL STYLE ================== -->
	
	<!-- ================== BEGIN BASE JS ================== -->
	<script src="<?= ASSETS_URL . "pace/pace.min.js" ?>" ></script>
	<!-- ================== END BASE JS ================== -->
</head>
<style>
    #imapDIV, #exchangeDIV{
        width: 700px;
        height: auto;
        position: relative;
        margin: 10% auto 0px auto;
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
    					<li class="active">
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
							<h4 class="m-t-10 m-b-5">Webmail</h4>
						</div>
						<!-- END profile-header-info -->
					</div>
					<!-- END profile-header-content -->
				</div>
			</div>
			<div class="profile-content">
				<div class="row">
					<div class="col-md-6">
						<div class="widget-card widget-card-rounded m-b-20">
							<div class="widget-card-cover" style="background-image: url(https://www.mailjet.com/wp-content/themes/mailjet/mailjet/img/azure-bg.jpg);"></div>
							<div class="widget-card-content">
								<h3 class="text-white">IMAP Server</h3>
								<p class="text-white">Connect to any IMAP enabled e-mail server.</p>
							</div>
							<div class="widget-card-content bottom">
								<?php
										if ($employee["imap_hostaddress"] != ""){
											echo '<a href="' . BASE_URL . 'webmail/imap" class="btn btn-white m-r-10"><i class="fas fa-envelope text-primary m-r-5"></i>Go to webmail</a>';
											echo '<button class="btn btn-white m-r-10" onClick="disconnectIMAP()"><i class="fas fa-sign-out-alt text-danger m-r-5"></i>Disconnect from IMAP</button>';
										}
								?>
								<button class="btn btn-white m-r-10" onClick="showImapPopup()"><i class="fas fa-cog text-primary m-r-5"></i>Setup</button>
							</div>
						</div>
					</div>	
					<div class="col-md-6">
						<div class="widget-card widget-card-rounded m-b-20">
							<div class="widget-card-cover" style="background-image: url(http://hdqwalls.com/wallpapers/material-design-dark-red-black-ap.jpg);"></div>
							<div class="widget-card-content">
								<h3 class="text-white">Gmail</h3>
								<p class="text-white">Sync your Google account e-mails and view them here.</p>
							</div>
							<div class="widget-card-content bottom">
								<a id="gWebmailLink" href="<?php echo BASE_URL . "webmail/gmail"; ?>" class="btn btn-white m-r-10" style="display: none;"><i class="fas fa-envelope text-primary m-r-5"></i>Go to webmail</a>
								<button id="gAuthorizeBtn" class="btn btn-white m-r-10" style="display: none"><i class="fab fa-google text-danger m-r-5" aria-hidden="true"></i>Sync with Gmail</button>
								<button id="gSignOutBtn" class="btn btn-white m-r-10" style="display: none"><i class="fab fa-google text-danger m-r-5" aria-hidden="true"></i>Disconnect Gmail account</button>
							</div>
						</div>
					</div>	
				</div>
				<div class="row">
					<div class="col-md-6">
						<div class="widget-card widget-card-rounded m-b-20">
								<div class="widget-card-cover" style="background: #0171c5;"></div>
								<div class="widget-card-content">
									<h3 class="text-white">Exchange</h3>
									<p class="text-white">Connect your Exchange account.</p>
								</div>
								<div class="widget-card-content bottom">
									<?php
										if ($employee["exchange_host"] != "" && $employee["exchange_host"] != null){
											echo '<a href="' . BASE_URL . 'webmail/exchange" class="btn btn-white m-r-10"><i class="fas fa-envelope text-primary m-r-5"></i>Go to webmail</a>';
											echo '<button class="btn btn-white m-r-10" onClick="disconnectExchange()"><i class="fas fa-sign-out-alt text-danger m-r-5"></i>Disconnect from Exchange</button>';
										}
									?>
									<button class="btn btn-white m-r-10" onClick="showExchangePopup()"><i class="fas fa-cog text-primary m-r-5"></i>Setup</button>
								</div>
						</div>
					</div>
					<div class="col-md-6">
						<div class="widget-card widget-card-rounded m-b-20">
								<div class="widget-card-cover" style="background: #e53d10;"></div>
								<div class="widget-card-content">
									<h3 class="text-white">Office 365</h3>
									<p class="text-white">Connect your Office365 account.</p>
								</div>
								<div class="widget-card-content bottom">
									<?php
									if ($employee["access_token"] == ""){
										echo '<a href="https://login.microsoftonline.com/1f50a38f-9604-4967-804d-bc6a7cf705ae/oauth2/v2.0/authorize?client_id=c2785070-f16d-46f5-bc12-304410eca8ad&response_type=code&response_mode=query&scope=profile%20offline_access%20https%3A%2F%2Fgraph.microsoft.com%2Fmail.read%20https%3A%2F%2Fgraph.microsoft.com%2Fmail.send%20https%3A%2F%2Fgraph.microsoft.com%2Fmail.readwrite%20https%3A%2F%2Fgraph.microsoft.com%2Fcalendars.readwrite%20https%3A%2F%2Fgraph.microsoft.com%2Fcontacts.readwrite%20https%3A%2F%2Fgraph.microsoft.com%2Ftasks.readwrite%20openid&state=12345&prompt=consent&redirect_uri=https://copy.btrackcore.com/index.php/office365/callback" class="btn btn-white m-r-5">Sync your Office365 account</a>';
									}else{
										echo '<a href="' . BASE_URL . 'webmail/office365" class="btn btn-white m-r-10"><i class="fas fa-envelope text-primary m-r-5"></i>Go to webmail</a>';
										echo '<button class="btn btn-white m-r-10" onClick="disconnectOffice365()"><i class="fas fa-sign-out-alt text-danger m-r-5"></i>Disconnect from Office365</button>';
									}
									?>
								</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	
	<div class="popupContainer" id="imapPopup" hidden>
		<div class="panel panel-primary" id="imapDIV" hidden>
			<div class="panel-heading">
				<div class="panel-heading-btn">
					<button onclick="hideImapPopup()" class="btn btn-xs btn-icon btn-circle btn-default"><i class="fa fa-times"></i></button>
				</div>
				<h4 class="panel-title">IMAP setup</h4>
			</div>
			<div class="panel-body">
				<form id="imapForm" action="employee/imap" method="post" class="form-horizontal m-t-10">
					<div class="form-group">
						<div class="col-md-6">
							<label>IMAP Server address:</label>
							<input type="text" class="form-control" name="imap_host" placeholder="mail.domain.com" value="<?php echo $employee["imap_hostaddress"]; ?>" required />
						</div>
						<div class="col-md-3">
							<label>Inbound port</label>
							<input type="number" class="form-control" name="imap_port" placeholder="993" value="<?php echo $employee["imap_port"]; ?>" required />
						</div>
						<div class="col-md-3">
							<label>Outbound port</label>
							<input type="number" class="form-control" name="imap_outboundport" placeholder="465" value="<?php echo $employee["imap_outboundport"]; ?>" required />
						</div>
					</div>
					<div class="form-group">
						<div class="col-md-6">
							<label>E-mail:</label>
							<input type="text" class="form-control" name="imap_username" placeholder="info@domain.com" value="<?php echo $employee["imap_username"]; ?>" required />
						</div>
						<div class="col-md-6">
							<label>Password</label>
							<input type="password" class="form-control" name="imap_password" value="<?php echo $employee["imap_password "]; ?>" required>
						</div>
					</div>
					<div class="form-group">
						<div class="col-md-3">
							<label>Use SSL/TLS: </label><br>
							<div class="radio radio-css radio-inline radio-danger">
								<input type="radio" name="imap_ssl" id="axr1" value="0" <?php if ($employee["imap_ssl"]==0 ){ echo "checked"; } ?> >
								<label for="axr1">
																No
															</label>
							</div>
							<div class="radio radio-css radio-inline radio-success">
								<input type="radio" name="imap_ssl" id="axr2" value="1" <?php if ($employee["imap_ssl"]==1 ){ echo "checked"; } ?> >
								<label for="axr2">
																Yes
															</label>
							</div>
						</div>
						<div class="col-md-4">
							<label>Validate certificate: </label><br>
							<div class="radio radio-css radio-inline radio-danger">
								<input type="radio" name="imap_certificate" id="bxr1" value="0" <?php if ($employee["imap_certificate"]==0 ){ echo "checked"; } ?>>
								<label for="bxr1">
																No
															</label>
							</div>
							<div class="radio radio-css radio-inline radio-success">
								<input type="radio" name="imap_certificate" id="bxr2" value="1" <?php if ($employee["imap_certificate"]==1 ){ echo "checked"; } ?>>
								<label for="bxr2">
																Yes
															</label>
							</div>
						</div>
					</div>
					<button class="btn btn-primary">Connect with IMAP</button>
				</form>
			</div>
		</div>
	</div>
	<div class="popupContainer" id="exchangePopup" hidden>
		<div class="panel panel-primary" id="exchangeDIV" hidden>
			<div class="panel-heading">
				<div class="panel-heading-btn">
					<button onclick="hideExchangePopup()" class="btn btn-xs btn-icon btn-circle btn-default"><i class="fa fa-times"></i></button>
				</div>
				<h4 class="panel-title">Exchange setup</h4>
			</div>
			<div class="panel-body">
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
				</form>
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
	<script src="<?= JS_URL . "timedisplay.js" ?>"></script>
	<script src="<?= JS_URL . "inactivity.js" ?>"></script>
	<script src="<?= JS_URL . "base64.js" ?>"></script>
	

	<script src="<?= ASSETS_URL . "fullcalendar/lib/moment.min.js" ?>"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/js/bootstrap-datetimepicker.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/css/bootstrap-datetimepicker.min.css" rel="stylesheet"/>
    <script src="<?= ASSETS_URL . "tinymce/js/tinymce/tinymce.min.js" ?>"></script>
    <link href="<?= ASSETS_URL . "DataTables/media/css/dataTables.bootstrap.min.css" ?>" rel="stylesheet" />
	<link href="<?= ASSETS_URL . "DataTables/extensions/Responsive/css/responsive.bootstrap.min.css" ?>" rel="stylesheet" />
	<script src="<?= ASSETS_URL . "DataTables/media/js/jquery.dataTables.js" ?>"></script>
	<script src="<?= ASSETS_URL . "DataTables/media/js/dataTables.bootstrap.min.js" ?>"></script>
	<script src="<?= ASSETS_URL . "DataTables/extensions/Responsive/js/dataTables.responsive.min.js" ?>"></script>
	<script src="<?= ASSETS_URL . "jquery-tag-it/js/tag-it.min.js" ?>"></script>
	<script src="<?= ASSETS_URL . "bootstrap-wysihtml5/dist/bootstrap3-wysihtml5.all.min.js" ?>"></script>
	<script src="<?= ASSETS_URL . "gritter/js/jquery.gritter.min.js" ?>" ></script>
	<script src="<?= ASSETS_URL . "tinymce/js/tinymce/tinymce.min.js" ?>"></script>
	
	<script>
		var loggedEmployee = <?php echo json_encode($_SESSION["id"]); ?>;
		
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
				
				App.init();
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
				$("#gWebmailLink").show();
            } else {
                $("#gAuthorizeBtn").show();
                $("#gSignOutBtn").hide();
				$("#gWebmailLink").hide();
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
		
		$(document).ready(function() {
			getMenuStatistics(loggedEmployee);
			
			$('#imapForm').on('submit', function(e) { //use on if jQuery 1.7+
                e.preventDefault();
                $.ajax({
                    type: "POST",
                    url: "employee/imap",
                    data: $("#imapForm").serialize(),
                    success: function(msg) {
                        if (msg == "OK") {
                            location.href = "webmail/imap";
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
			
			$('#exchangeForm').on('submit', function(e) { //use on if jQuery 1.7+
                e.preventDefault();
                $.ajax({
                    type: "POST",
                    url: "employee/exchange",
                    data: $("#exchangeForm").serialize(),
                    success: function(msg) {
                        if (msg == "OK") {
                            location.href = "webmail/exchange";
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
			
		});
		
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
                    url: "employee/imapdisconnect",
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
		
		function showImapPopup(){
			$("#imapPopup, #imapDIV").show();
		}
		
		function hideImapPopup(){
			$("#imapPopup, #imapDIV").hide();
		}
		
		function showExchangePopup(){
			$("#exchangePopup, #exchangeDIV").show();
		}
		
		function hideExchangePopup(){
			$("#exchangePopup, #exchangeDIV").hide();
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
	<script async defer src="https://apis.google.com/js/api.js" onload="this.onload=function(){};handleClientLoad()" onreadystatechange="if (this.readyState === 'complete') this.onload()"></script>
</body>
</html>
	