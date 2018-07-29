<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
<!--<![endif]-->

<head>
    <meta charset="utf-8" />
    <title>Telephony dashboard</title>
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
    <link href="<?= ASSETS_URL . "nvd3/build/nv.d3.css" ?>" rel="stylesheet" />
   
	<!-- ================== END PAGE LEVEL STYLE ================== -->
	
	<!-- ================== BEGIN BASE JS ================== -->
	<script src="<?= ASSETS_URL . "pace/pace.min.js" ?>" ></script>
	<!-- ================== END BASE JS ================== -->
</head>
<style>

	#queueDetailsDIV, #agentDetailsDIV{
        width: 700px;
        height: auto;
        position: relative;
        margin: 10% auto 0px auto;
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

    
    .graph-container{
		background: #ffffff;
		padding: 25px;
	}
    
	.f-s-32{
		font-size: 32px;
	}
    
</style>

<body>
    <!-- begin #page-loader -->
    <div id="page-loader" class="fade in"><div id="loader"></div></span>
    </div>
    
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
										<li class="active"><a href="' . BASE_URL . 'telephonydashboard">Overview</a></li>
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
            <div class="profile">
				<div class="profile-header profile-header-no-image">
					<!-- BEGIN profile-header-cover -->
					<div class="profile-header-cover"></div>
					<!-- END profile-header-cover -->
					<!-- BEGIN profile-header-content -->
					<div class="profile-header-content">
						<!-- BEGIN profile-header-info -->
						<div class="profile-header-info">
							<h4 class="m-t-10 m-b-5">Telephony dashboard</h4>
						</div>
						<!-- END profile-header-info -->
					</div>
					<!-- END profile-header-content -->
				</div>
			</div>
            <div class="profile-content">
				<div class="row">
					<div class="col-md-2">
						<div class="graph-container">
							<div class="text-center">
								<b>Service level</b><br>Today
							</div>
							<div class="circle m-15">
							
							</div>
						</div>
					</div>
					<div class="col-md-2">
						<div class="graph-container">
							<div class="text-center">
								<b>Avg. abandon time</b><br>Today
							</div>
							<div class="circle m-15">
							
							</div>
						</div>
					</div>
					<div class="col-md-2">
						<div class="graph-container">
							<div class="text-center">
								<b>Avg. wait time</b><br>Today
							</div>
							<div class="circle m-15">
							
							</div>
						</div>
					</div>
					<div class="col-md-2">
						<div class="graph-container">
							<div class="text-center">
								<b>Longest wait time</b><br>Today
							</div>
							<div class="circle m-15">
							
							</div>
						</div>
					</div>
					<div class="col-md-2">
						<div class="graph-container">
							<div class="text-center">
								<b>Agents online</b><br>Currently
							</div>
							<div id="onlineCircle" class="circle m-15">
							
							</div>
						</div>
					</div>
					<div class="col-md-2">
						<div class="graph-container">
							<div class="text-center">
								<b>Agents offline</b><br>Currently
							</div>
							<div id="offlineCircle" class="circle m-15">
							</div>
						</div>
					</div>
				</div>
				<div class="row m-t-20">
					<div class="col-md-3">
						<div class="widget widget-rounded">
							<!-- begin widget-header -->
							<div class="widget-header">
								<h4 class="widget-header-title">Agent statuses</h4>
							</div>
							<!-- end widget-header -->
							<!-- begin vertical-box -->
							<div class="vertical-box with-grid with-border-top">
								<!-- begin widget-list -->
								<div class="widget-list widget-list-rounded" id="agentList">
								  
								</div>
								<!-- end widget-list -->
							</div>
						</div>
					</div>
					<div class="col-md-3">
						<div class="widget widget-rounded">
							<!-- begin widget-header -->
							<div class="widget-header">
								<h4 class="widget-header-title">Queues</h4>
							</div>
							<!-- end widget-header -->
							<!-- begin vertical-box -->
							<div class="vertical-box with-grid with-border-top">
								<!-- begin widget-list -->
								<div class="widget-list widget-list-rounded" id="queueList">
								  
								</div>
								<!-- end widget-list -->
							</div>
						</div>
					</div>
					<div class="col-md-3">
						<div class="widget widget-rounded">
							<!-- begin widget-header -->
							<div class="widget-header">
								<h4 class="widget-header-title">Calls per agent</h4>
							</div>
							<!-- end widget-header -->
							<!-- begin vertical-box -->
							<div class="vertical-box with-grid with-border-top">
								<div id="nv-bar-chart" style="height: 260px;">
									
								</div>
							</div>
						</div>
					</div>
					<div class="col-md-3">
						<div class="widget widget-rounded">
							<!-- begin widget-header -->
							<div class="widget-header">
								<h4 class="widget-header-title">Calls in queue</h4>
							</div>
							<!-- end widget-header -->
							<!-- begin vertical-box -->
							<div class="vertical-box with-grid with-border-top">
								<div id="nv-call-chart" style="height: 260px;">
									
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-3 height-100">
						<div class="bg-white height-full p-15">
							<p class="m-b-0 f-s-20 text-center">CALLS RECEIVED</p>
							<p class="m-b-0 f-s-32 text-center text-primary">45</p>
						</div>
					</div>
					<div class="col-md-3 height-100">
						<div class="bg-white height-full p-15">
							<p class="m-b-0 f-s-20 text-center">CALLS HANDLED</p>
							<p class="m-b-0 f-s-32 text-center text-success">32</p>
						</div>
					</div>
					<div class="col-md-3 height-100">
						<div class="bg-white height-full p-15">
							<p class="m-b-0 f-s-20 text-center">CALLS ABANDONED</p>
							<p class="m-b-0 f-s-32 text-center text-warning">8</p>
						</div>
					</div>
					<div class="col-md-3 height-100">
						<div class="bg-white height-full p-15">
							<p class="m-b-0 f-s-20 text-center">CALLS MISSED</p>
							<p class="m-b-0 f-s-32 text-center text-danger">5</p>
						</div>
					</div>
				</div>
				<div class="row m-t-20">
					<div class="col-md-12">
						<div class="widget widget-rounded m-b-30">
							<!-- begin widget-header -->
							<div class="widget-header">
								<h4 class="widget-header-title">Calls overview</h4>
							</div>
							<!-- end widget-header -->
							<!-- begin vertical-box -->
							<div class="vertical-box with-grid with-border-top">
								<!-- begin vertical-box-column -->
								<div class="vertical-box-column p-15" style="width: 30%;">
									<div class="widget-chart-info">
										<h4 class="widget-chart-info-title">Todays calls</h4>
										<p class="widget-chart-info-desc">There have been <strong><span id="callsTotalSpan"></span> call(s)</strong> made and received today</p>

										<hr>
										<div class="widget-chart-info">
											<h4 class="widget-chart-info-title">Current statistics</h4>
											<p class="widget-chart-info-desc">Todays calls sorted by subject</p>
											<div class="widget-chart-info-progress">
												<b>Orders</b>
												<span id="ordersCallsSpan" class="pull-right"></span>
											</div>
											<div class="progress progress-sm m-b-15">
												<div id="ordersIncompleteBar" class="progress-bar progress-bar-striped progress-bar-animated rounded-corner bg-success"></div>
											</div>
											<div class="widget-chart-info-progress">
												<b>Information</b>
												<span id="informationCallsSpan" class="pull-right"></span>
											</div>
											<div class="progress progress-sm m-b-15">
												<div id="informationProgressBar" class="progress-bar progress-bar-striped progress-bar-animated rounded-corner bg-primary"></div>
											</div>
											<div class="widget-chart-info-progress">
												<b>Reclamations</b>
												<span id="reclamationCallsSpan" class="pull-right"></span>
											</div>
											<div class="progress progress-sm">
												<div id="reclamationProgressBar" class="progress-bar progress-bar-striped progress-bar-animated rounded-corner bg-danger"></div>
											</div>
											<div class="widget-chart-info-progress">
												<b>Other</b>
												<span id="otherCallsSpan" class="pull-right"></span>
											</div>
											<div class="progress progress-sm">
												<div id="otherProgressBar" class="progress-bar progress-bar-striped progress-bar-animated rounded-corner bg-warning"></div>
											</div>
										</div>
									</div>
									<hr>
								</div>
								<!-- begin vertical-box-column -->
								<div class="vertical-box-column widget-chart-content">
									<div id="calls-line-chart" class="morris-inverse" style="height: 100%; position: relative; -webkit-tap-highlight-color: rgba(0, 0, 0, 0);">
					
									</div>
								</div>
								<!-- end vertical-box-column -->
								<!-- end vertical-box-column -->
							</div>
							<!-- end vertical-box -->
						</div>
					</div>
				</div>
			</div>
			<div class="popupContainer" id="agentDetailsPopup" hidden>
				<div class="panel panel-primary" id="agentDetailsDIV">
					<div class="panel-heading">
						<div class="panel-heading-btn">
							<button class="btn btn-xs btn-icon btn-circle btn-default" onClick="hideAgentDetails()"><i class="fa fa-times"></i>
							</button>
						</div>
						<h4 class="panel-title">View agent statistics</h4>
					</div>
					<div class="panel-body">
						<div class="widget-list widget-list-rounded" id="queueDetailsBody">
							<div class="widget-list-item">
								<div class="widget-list-media icon">
									<i class="fas fa-user bg-blue text-white"></i>
								</div>
								<div class="widget-list-content">
									<h4 class="widget-list-title">Agent number</h4>
									<p class="widget-list-desc">The number of this agent</p>
								</div>
								<div class="widget-list-action text-nowrap text-right">
									<span class="badge badge-primary" id="agentDetailsNumber"></span>
								</div>
							</div>
							<div class="widget-list-item">
								<div class="widget-list-media icon">
									<i class="fas fa-user bg-blue text-white"></i>
								</div>
								<div class="widget-list-content">
									<h4 class="widget-list-title">Agent name</h4>
									<p class="widget-list-desc">The name of this agent</p>
								</div>
								<div class="widget-list-action text-nowrap text-right">
									<span class="badge badge-primary" id="agentDetailsName"></span>
								</div>
							</div>
							<div class="widget-list-item">
								<div class="widget-list-media icon">
									<i class="fas fa-user bg-blue text-white"></i>
								</div>
								<div class="widget-list-content">
									<h4 class="widget-list-title">Status</h4>
									<p class="widget-list-desc">The current status of this agent</p>
								</div>
								<div class="widget-list-action text-nowrap text-right">
									<span class="badge badge-primary" id="agentDetailsStatus"></span>
								</div>
							</div>
							<div class="widget-list-item">
								<div class="widget-list-media icon">
									<i class="fas fa-user bg-blue text-white"></i>
								</div>
								<div class="widget-list-content">
									<h4 class="widget-list-title">Penalty</h4>
									<p class="widget-list-desc">The penalty level of this agent</p>
								</div>
								<div class="widget-list-action text-nowrap text-right">
									<span class="badge badge-primary" id="agentDetailsPenalty"></span>
								</div>
							</div>
							<div class="widget-list-item">
								<div class="widget-list-media icon">
									<i class="fas fa-user bg-blue text-white"></i>
								</div>
								<div class="widget-list-content">
									<h4 class="widget-list-title">Membership</h4>
									<p class="widget-list-desc">Type of membership</p>
								</div>
								<div class="widget-list-action text-nowrap text-right">
									<span class="badge badge-primary" id="agentDetailsMembership"></span>
								</div>
							</div>
							<div class="widget-list-item">
								<div class="widget-list-media icon">
									<i class="fas fa-user bg-blue text-white"></i>
								</div>
								<div class="widget-list-content">
									<h4 class="widget-list-title">Location</h4>
									<p class="widget-list-desc">The location of this agent</p>
								</div>
								<div class="widget-list-action text-nowrap text-right">
									<span class="badge badge-primary" id="agentDetailsLocation"></span>
								</div>
							</div>
							<div class="widget-list-item">
								<div class="widget-list-media icon">
									<i class="fas fa-user bg-blue text-white"></i>
								</div>
								<div class="widget-list-content">
									<h4 class="widget-list-title">Queues</h4>
									<p class="widget-list-desc">The queues this agent is logged into</p>
								</div>
								<div class="widget-list-action text-nowrap text-right">
									<span class="badge badge-primary" id="agentDetailsQueues"></span>
								</div>
							</div>
							<div class="widget-list-item">
								<div class="widget-list-media icon">
									<i class="fas fa-user bg-blue text-white"></i>
								</div>
								<div class="widget-list-content">
									<h4 class="widget-list-title">Calls taken</h4>
									<p class="widget-list-desc">The number of calls this agent has taken</p>
								</div>
								<div class="widget-list-action text-nowrap text-right">
									<span class="badge badge-primary" id="agentDetailsCallsTaken"></span>
								</div>
							</div>
							<div class="widget-list-item">
								<div class="widget-list-media icon">
									<i class="fas fa-user bg-blue text-white"></i>
								</div>
								<div class="widget-list-content">
									<h4 class="widget-list-title">Last call</h4>
									<p class="widget-list-desc">When this agents last call was made</p>
								</div>
								<div class="widget-list-action text-nowrap text-right">
									<span class="badge badge-primary" id="agentDetailsLastCall"></span>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="popupContainer" id="queueDetailsPopup" hidden>
				<div class="panel panel-primary" id="queueDetailsDIV">
					<div class="panel-heading">
						<div class="panel-heading-btn">
							<button class="btn btn-xs btn-icon btn-circle btn-default" onClick="hideQueueDetails()"><i class="fa fa-times"></i>
							</button>
						</div>
						<h4 class="panel-title">View queue statistics</h4>
					</div>
					<div class="panel-body">
						<div class="widget-list widget-list-rounded" id="queueDetailsBody">
							<div class="widget-list-item">
								<div class="widget-list-media icon">
									<i class="fas fa-user bg-blue text-white"></i>
								</div>
								<div class="widget-list-content">
									<h4 class="widget-list-title">Queue number</h4>
									<p class="widget-list-desc">The number of this queue</p>
								</div>
								<div class="widget-list-action text-nowrap text-right">
									<span class="badge badge-primary" id="queueDetailsNumber"></span>
								</div>
							</div>
							<div class="widget-list-item">
								<div class="widget-list-media icon">
									<i class="fas fa-user bg-blue text-white"></i>
								</div>
								<div class="widget-list-content">
									<h4 class="widget-list-title">Max wait time</h4>
									<p class="widget-list-desc">The maximum number of seconds a caller can wait in a queue before being pulled out (0 for unlimited)</p>
								</div>
								<div class="widget-list-action text-nowrap text-right">
									<span class="badge badge-primary" id="queueDetailsMax"></span>
								</div>
							</div>
							<div class="widget-list-item">
								<div class="widget-list-media icon">
									<i class="fas fa-user bg-blue text-white"></i>
								</div>
								<div class="widget-list-content">
									<h4 class="widget-list-title">Average hold time</h4>
									<p class="widget-list-desc">Average time that calls are on hold</p>
								</div>
								<div class="widget-list-action text-nowrap text-right">
									<span class="badge badge-primary" id="queueDetailsHoldTime"></span>
								</div>
							</div>
							<div class="widget-list-item">
								<div class="widget-list-media icon">
									<i class="fas fa-user bg-blue text-white"></i>
								</div>
								<div class="widget-list-content">
									<h4 class="widget-list-title">Completed calls</h4>
									<p class="widget-list-desc">Number of calls that were answered</p>
								</div>
								<div class="widget-list-action text-nowrap text-right">
									<span class="badge badge-primary" id="queueDetailsCompleted"></span>
								</div>
							</div>
							<div class="widget-list-item">
								<div class="widget-list-media icon">
									<i class="fas fa-user bg-blue text-white"></i>
								</div>
								<div class="widget-list-content">
									<h4 class="widget-list-title">Abandoned calls</h4>
									<p class="widget-list-desc">Number of calls that were missed</p>
								</div>
								<div class="widget-list-action text-nowrap text-right">
									<span class="badge badge-primary" id="queueDetailsAbandoned"></span>
								</div>
							</div>
							<div class="widget-list-item">
								<div class="widget-list-media icon">
									<i class="fas fa-user bg-blue text-white"></i>
								</div>
								<div class="widget-list-content">
									<h4 class="widget-list-title">Service level</h4>
									<p class="widget-list-desc">Maximum time an agent has to answer a call in seconds</p>
								</div>
								<div class="widget-list-action text-nowrap text-right">
									<span class="badge badge-primary" id="queueDetailsServiceLevel"></span>
								</div>
							</div>
							<div class="widget-list-item">
								<div class="widget-list-media icon">
									<i class="fas fa-user bg-blue text-white"></i>
								</div>
								<div class="widget-list-content">
									<h4 class="widget-list-title">Service level performance</h4>
									<p class="widget-list-desc">Percentage of calls that were answered in time</p>
								</div>
								<div class="widget-list-action text-nowrap text-right">
									<span class="badge badge-primary" id="queueDetailsServiceLevelPerf"></span>
								</div>
							</div>
							<div class="widget-list-item">
								<div class="widget-list-media icon">
									<i class="fas fa-user bg-blue text-white"></i>
								</div>
								<div class="widget-list-content">
									<h4 class="widget-list-title">Weight</h4>
									<p class="widget-list-desc">The priority of this queue</p>
								</div>
								<div class="widget-list-action text-nowrap text-right">
									<span class="badge badge-primary" id="queueDetailsWeight"></span>
								</div>
							</div>
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
			
        <!-- end #content -->


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
	<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/js/bootstrap-datetimepicker.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/css/bootstrap-datetimepicker.min.css" rel="stylesheet"/>
	<script src="<?= JS_URL . "timedisplay.js" ?>"></script>
	<script src="<?= ASSETS_URL . "morris/raphael.min.js" ?>"></script>
    <script src="<?= ASSETS_URL . "morris/morris.js" ?>"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/d3/3.5.2/d3.min.js"></script>
    <script src="<?= ASSETS_URL . "nvd3/build/nv.d3.js" ?>"></script>
    <script src="<?= ASSETS_URL . "jquery-circle-progress/dist/circle-progress.min.js" ?>"></script>
	<script src="<?= ASSETS_URL . "jquery-circle-progress/dist/progressbar.min.js" ?>"></script>
    <script src="<?= JS_URL . "inactivity.js" ?>"></script>
    
    <script>
        var loggedEmployee = <?php echo json_encode($_SESSION["id"]); ?>;
		var dateformat = <?php echo json_encode($_SESSION["dateformat"]); ?>;
		var timeformat = <?php echo json_encode($_SESSION["timeformat"]); ?>;
        var blue = "#007aff",
        blueLight = "#409bff",
        blueDark = "#005bbf",
        aqua = "#5AC8FA",
        aquaLight = "#83d6fb",
        aquaDark = "#4396bb",
        green = "#4CD964",
        greenLight = "#79e38b",
        greenDark = "#39a34b",
        orange = "#FF9500",
        orangeLight = "#ffb040",
        orangeDark = "#bf7000",
        dark = "#222222",
        grey = "#bbbbbb",
        purple = "#5856D6",
        purpleLight = "#8280e0",
        purpleDark = "#4240a0",
        red = "#FF3B30";
		
		var circleWidth;
		var onlineCircle;
		var offlineCircle;
		
		var queueArray = [];
		var agentArray = [];
        
        $(document).ready(function() {
			App.init()
			getMenuStatistics(loggedEmployee);
			drawCallsGraphs();
			drawAgentGraphs();
			getAgentList();
			getQueueList();
			
			setInterval(function(){
				getAgentList();
				getQueueList();
			}, 3000);
			
			circleWidth = $(".circle").width();
			
			$('.circle').circleProgress({
				value: 0.75,
				size: circleWidth,
				fill: {
				  gradient: ["#ff5b57", "#f59c1a"]
				}
			});
        });
		
		function getAgentList(){
			$.ajax({
                type: "POST",
                url: "<?= BASE_URL ?>" + "telephony/agentstatus",
                data: null,
                dataType: "json",
                success: function(agents) {
					agentArray = agents;
					var agentListHTML = "";
					var online = 0;
					var offline = 0;
					for (var i = 0; i < agents.length; i++){
						var agent = agents[i];
						var statusColor = "text-success";
						if (agent.status == "Online"){
							online++;
						} else if (agent.status == "Offline"){
							statusColor = "text-danger";
							offline++;
						} else if (agent.status == "Paused"){
							statusColor = "text-warning";
							online++;
						}else{
							online++;
						}
						agentListHTML += '<div class="widget-list-item hover-bg-gray pointer" onClick="showAgentDetails(' + i + ')">' +
									'<div class="widget-list-content">' +
									  '<h4 class="widget-list-title">' + agent.name + '</h4>' +
									  '<p class="widget-list-desc">In queue ' + agent.queue + '</p>' +
									'</div>' +
									'<div class="widget-list-action">' +
										'<i class="fas fa-circle ' + statusColor + ' fa-lg m-l-5"></i>' +
									'</div>' +
								  '</div>';
					}
					$("#agentList").html(agentListHTML);
					
					if (onlineCircle == null){
						onlineCircle = $('#onlineCircle').circleProgress({
							value: online / agents.length,
							size: circleWidth,
							fill: {
							  gradient: ["#00acac"]
							}
						});
						
						offlineCircle = $('#offlineCircle').circleProgress({
							value: offline / agents.length,
							size: circleWidth,
							fill: {
							  gradient: ["#ff5b57"]
							}
						});
					} else{
						onlineCircle.circleProgress('value', online / agents.length);
						offlineCircle.circleProgress( {value: offline / agents.length });
					}
				}
			});
		}
		
		function getQueueList(){
			$.ajax({
                type: "POST",
                url: "<?= BASE_URL ?>" + "telephony/queuestatus",
                data: null,
                dataType: "json",
                success: function(queues) {
					console.log(queues);
					queueArray = queues;
					var queueListHTML = "";
					for (var i = 0; i < queues.length; i++){
						var queue = queues[i];
						queueListHTML += '<div class="widget-list-item">' +
									'<div class="widget-list-content">' +
									  '<h4 class="widget-list-title">' + queue.queue + '</h4>' +
									  '<p class="widget-list-desc"><i class="fas fa-phone text-success m-r-5"></i>' + queue.completed + '<i class="fas fa-phone text-danger m-l-5 m-r-5"></i>' + queue.abandoned + '</p>' +
									'</div>' +
									'<div class="widget-list-action pointer-text text-nowrap text-grey-darker" onClick="showQueueDetails(' + i + ')">' +
										'More info' +
										'<i class="fa fa-angle-right t-plus-1 fa-lg m-l-5"></i>' +
									'</div>' +
								  '</div>';
					}
					$("#queueList").html(queueListHTML);
				}
			});
		}
		
		function showQueueDetails(index){
			var queue = queueArray[index];
			$("#queueDetailsNumber").html(queue.queue);
			$("#queueDetailsMax").html(queue.max);
			$("#queueDetailsHoldTime").html(queue.hold_time);
			$("#queueDetailsCompleted").html(queue.completed);
			$("#queueDetailsAbandoned").html(queue.abandoned);
			$("#queueDetailsServiceLevel").html(queue.service_level);
			$("#queueDetailsServiceLevelPerf").html(parseInt(queue.service_level_perf) + " %");
			$("#queueDetailsWeight").html(queue.weight);
			$("#queueDetailsPopup").show();
		}
		
		function hideQueueDetails(){
			$("#queueDetailsPopup").hide();
		}
		
		function showAgentDetails(index){
			var agent = agentArray[index];
			console.log(agent);
			$("#agentDetailsNumber").html(agent.agent);
			$("#agentDetailsName").html(agent.name);
			$("#agentDetailsStatus").html(agent.status);
			$("#agentDetailsPenalty").html(agent.penalty);
			$("#agentDetailsMembership").html(agent.membership);
			$("#agentDetailsLocation").html(agent.location);
			$("#agentDetailsQueues").html(agent.queue);
			$("#agentDetailsCallsTaken").html(agent.calls_taken);
			if (agent.last_call != ""){
				$("#agentDetailsLastCall").html(moment(agent.last_call).format(dateformat + " " + timeformat));
			}else{
				$("#agentDetailsLastCall").html("No calls taken today");
			}
			$("#agentDetailsPopup").show();
		}
		
		function hideAgentDetails(){
			$("#agentDetailsPopup").hide();
		}
        
        function drawAgentGraphs() {
             $.ajax({
                type: "POST",
                url: "<?= BASE_URL ?>" + "employees/list",
                data: null,
                dataType: "json",
                success: function(employees) {
                    var online = 0;
                    var offline = 0;
                    for (var i = 0; i < employees.length; i++){
                        if (employees[i].employee_online == 1){
                            online++;
                        }else{
                            offline++;
                        }
                    }
                }
             });
            
        }
        
        function drawCallsGraphs() {
            $.ajax({
                type: "POST",
                url: "<?= BASE_URL ?>" + "telephony/stats",
                data: null,
                dataType: "json",
                success: function(calls) {
                    console.log(calls);
                    var callsWeek = calls.week;
                    var callsToday = calls.today;
                    var callsByAgent = calls.agents;
                    var chartData = [];
                    for (var i = 0; i < callsWeek.length; i++){
                        chartData.push({ "x": callsWeek[i].call_datetime.split(" ")[0], "y": callsWeek[i].nrOfCalls })
                    }
                    Morris.Line({
                        element: "calls-line-chart",
                        data: chartData,
                        xkey: "x",
                        ykeys: ["y"],
                        labels: ["Calls"],
                        lineColors: ["#33b679", "#2196f3", "#ff5252"],
                        pointFillColors: ["#33b679", "#2196f3", "#ff5252"],
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
                    var orders = 0;
                    var info = 0;
                    var reclamations = 0;
                    var other = 0;
                    for (var i = 0; i < callsToday.length; i++){
                        if (callsToday[i].call_subject == "Order"){
                            orders = parseInt(callsToday[i].nrOfCalls);
                        }else if (callsToday[i].call_subject == "Information"){
                            info = parseInt(callsToday[i].nrOfCalls);
                        }else if (callsToday[i].call_subject == "Reclamation"){
                            reclamations = parseInt(callsToday[i].nrOfCalls);
                        }else if (callsToday[i].call_subject == "Other"){
                            other = parseInt(callsToday[i].nrOfCalls);
                        }
                    }
					
					var total = orders + info + reclamations + other;
                    
                    $("#callsTotalSpan").html(total);
                    $("#ordersCallsSpan").html(orders + " orders");
					$("#ordersProgressBar").css("width", ((orders / total) * 100) + "%");
					$("#informationCallsSpan").html(info+ " information calls");
					$("#informationProgressBar").css("width", ((info / total) * 100) + "%");
					$("#reclamationCallsSpan").html(reclamations + " reclamations");
					$("#reclamationProgressBar").css("width", ((reclamations / total) * 100) + "%");
					$("#otherCallsSpan").html(other + " other calls");
					$("#otherProgressBar").css("width", ((other / total) * 100) + "%");
                    
                    var values = [];
                    var colors = [red, orange, green, aqua, blue, purple, grey, dark];
                    for (var i = 0; i < callsByAgent.length; i++){
                        var entry = callsByAgent[i];
                        values.push({ label: entry.employee_name + " " + entry.employee_surname, value: entry.nrOfCalls, color: colors[i] });
                    } 
                    
                    var e = [{
                        key: "Agents",
                        values: values
                    }];
                    nv.addGraph(function() {
                        var a = nv.models.discreteBarChart().x(function(e) {
                            return e.label
                        }).y(function(e) {
                            return e.value
                        }).showValues(!0).duration(250);
                        return a.yAxis.axisLabel("Total calls"), a.xAxis.axisLabel("Agents"), d3.select("#nv-bar-chart").append("svg").datum(e).call(a), nv.utils.windowResize(a.update), a
                    });
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

</body>

</html>