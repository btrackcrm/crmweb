<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
<!--<![endif]-->
<head>
	<meta charset="utf-8" />
	<title>Dashboard</title>
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
    <link href="<?= ASSETS_URL . "gritter/css/jquery.gritter.css" ?>" rel="stylesheet" />
	<link href="<?= ASSETS_URL . "bootstrap-calendar/css/bootstrap_calendar.css" ?>" rel="stylesheet" />
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.6.9/sweetalert2.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.6.9/sweetalert2.min.css">
	<link href="<?= ASSETS_URL . "bootstrap-datepicker/css/bootstrap-datepicker.css" ?>" rel="stylesheet" />
	
	<!-- ================== END PAGE LEVEL STYLE ================== -->
	
	<!-- ================== BEGIN BASE JS ================== -->
	<script src="<?= ASSETS_URL . "pace/pace.min.js" ?>" ></script>
	<!-- ================== END BASE JS ================== -->
</head>
<style>
    .padded15{
        padding: 15px;
    }
	
	#todoList{
		min-height: 70px;
	}
	
	.activeBG a{
        background: #007aff !important;
        border: 1px solid black !important;
    }
    
    .pointer{
        cursor: pointer;
    }
	
	.todolist-title{
		width: 100%;
	}
	
	.todolist-title i{
		line-height: 1.5;
	}
	
	.table-condensed{
		border-spacing: 5px;
		border-collapse: initial;
	}
	
	.table-condensed td{
		border-radius: 100px;
	}
	
	.gray-input{
		    padding: 6px 12px;
			border: none;
			background: rgb(240, 243, 244);
			width: 100%;
	}
	
	#schedule-list a:hover{
		background-color: #f3f4f6;
	}
</style>
<body>
	<!-- begin #page-loader -->
	<div id="page-loader" class="fade in"><span class="spinner"></span></div>
	<!-- end #page-loader -->
	
	<!-- begin #page-container -->
	<div id="page-container" class="fade page-header-fixed page-with-two-sidebar show page-sidebar-fixed">
		<!-- begin #header -->
		
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
								echo '<li class="active">
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
			<div class="profile">
				<div class="profile-header profile-header-no-image">
					<!-- BEGIN profile-header-cover -->
					<div class="profile-header-cover"></div>
					<!-- END profile-header-cover -->
					<!-- BEGIN profile-header-content -->
					<div class="profile-header-content">
						<!-- BEGIN profile-header-info -->
						<div class="profile-header-info">
							<h4 class="m-t-10 m-b-5">Dashboard</h4>
						</div>
						<!-- END profile-header-info -->
					</div>
					<!-- END profile-header-content -->
				</div>
			</div>
			<!-- begin profile-content -->
            <div class="profile-content">
				<div class="row">
					<div class="col-md-4 col-sm-6">
						<div class="widget widget-stats bg-red p-15">
							<div class="stats-icon"><i class="fa fa-users"></i></div>
							<div class="stats-info">
								<h4>TODAYS EVENTS</h4>
								<p id="eventsToday"></p>
							</div>
							<div class="stats-link">
								<a href="events">View details <i class="fa fa-arrow-alt-circle-right"></i></a>
							</div>
						</div>
					</div>
					<div class="col-md-4 col-sm-6">
						<div class="widget widget-stats bg-blue p-15">
							<div class="stats-icon"><i class="fa fa-tag"></i></div>
							<div class="stats-info">
								<h4>TODAYS TICKETS</h4>
								<p id="ticketsToday"></p>
							</div>
							<div class="stats-link">
								<a href="ticketing">View details <i class="fa fa-arrow-alt-circle-right"></i></a>
							</div>
						</div>
					</div>
					<div class="col-md-4 col-sm-6">
						<div class="widget widget-stats bg-green p-15">
							<div class="stats-icon"><i class="fa fa-archive"></i></div>
							<div class="stats-info">
								<h4>TODAYS WORK ORDERS</h4>
								<p id="workordersToday"></p>
							</div>
							<div class="stats-link">
								<a href="workorders">View details <i class="fa fa-arrow-alt-circle-right"></i></a>
							</div>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-8">
						<!-- begin widget-todolist -->
						<div class="widget-todolist widget-todolist-rounded">
							<!-- begin widget-todolist-header -->
							<div class="widget-todolist-header">
								<div class="widget-todolist-header-left">
									<h4 class="widget-todolist-header-title">My todolist</h4>
								</div>
								<div class="widget-todolist-header-right">
									<div class="widget-todolist-header-total">
										<span id="totalSpan" class="text-inverse">0</span>
										<small>Done</small>
									</div>
								</div>
							</div>
							<!-- end widget-todolist-header -->

							<!-- begin widget-todolist-body -->
							<div class="widget-todolist-body">
								<!-- begin widget-todolist-item -->
								<div id="todoList">

								</div>
								<!-- begin widget-todolist-item -->
								<div class="widget-todolist-item" style="border-top: 1px solid #f0f3f4;">
									<div class="widget-todolist-content">
										<form id="addTodolistForm" method="post" action="todolist/add" class="form-horizontal">
											<div class="form-group">
												<div class="col-md-12">
													<input type="text" class="gray-input" name="title" placeholder="Enter a title..." required />
												</div>
											</div>
											<div class="form-group">
												<div class="col-md-12">
													<textarea class="gray-input" name="description" rows="4" placeholder="Enter a short description..." required></textarea>
												</div>
											</div>
											<button class="btn btn-primary">Add to todolist</button>
										</form>
									</div>
								</div>
								<!-- end widget-todolist-item -->
							</div>
							<!-- end widget-todolist-body -->
						</div>
						<!-- end widget-todolist -->
					</div>
					<div class="col-md-4">
						<div class="widget widget-rounded m-b-30">
							<!-- begin widget-header -->
							<div class="widget-header">
								<h4 class="widget-header-title">Calendar</h4>
							</div>
							<!-- end widget-header -->
							<!-- begin vertical-box -->
							<div class="vertical-box with-grid with-border-top">
								<div id="schedule-calendar" class="bootstrap-calendar">
								</div>
								<ul class="list-group m-b-0" id="schedule-list" style="border-top: 1px solid #f3f4f6;">

								</ul>
							</div>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-12">
						<div class="widget widget-rounded m-b-30">
							<!-- begin widget-header -->
							<div class="widget-header">
								<h4 class="widget-header-title">Event overview</h4>
							</div>
							<!-- end widget-header -->
							<!-- begin vertical-box -->
							<div class="vertical-box with-grid with-border-top">
								<!-- begin vertical-box-column -->
								<div class="vertical-box-column p-15" style="width: 30%;">
									<div class="widget-chart-info">
										<h4 class="widget-chart-info-title">Events</h4>
										<p class="widget-chart-info-desc">You have <strong><span id="eventsTotalSpan"></span> event(s)</strong> scheduled for today</p>

										<hr>
										<div class="widget-chart-info">
											<h4 class="widget-chart-info-title">Current statistics</h4>
											<p class="widget-chart-info-desc">Todays events sorted by status</p>
											<div class="widget-chart-info-progress">
												<b>Incomplete</b>
												<span id="eventsIncompleteSpan" class="pull-right"></span>
											</div>
											<div class="progress progress-sm m-b-15">
												<div id="eventsIncompleteBar" class="progress-bar progress-bar-striped progress-bar-animated rounded-corner bg-warning"></div>
											</div>
											<div class="widget-chart-info-progress">
												<b>In progress</b>
												<span id="eventsInProgressSpan" class="pull-right"></span>
											</div>
											<div class="progress progress-sm m-b-15">
												<div id="eventsInProgressBar" class="progress-bar progress-bar-striped progress-bar-animated rounded-corner bg-primary"></div>
											</div>
											<div class="widget-chart-info-progress">
												<b>Finished</b>
												<span id="eventsFinishedSpan" class="pull-right"></span>
											</div>
											<div class="progress progress-sm">
												<div id="eventsFinishedBar" class="progress-bar progress-bar-striped progress-bar-animated rounded-corner bg-success"></div>
											</div>
											<div class="widget-chart-info-progress">
												<b>Canceled</b>
												<span id="eventsCanceledSpan" class="pull-right"></span>
											</div>
											<div class="progress progress-sm">
												<div id="eventsCanceledBar" class="progress-bar progress-bar-striped progress-bar-animated rounded-corner bg-danger"></div>
											</div>
										</div>
									</div>
									<hr>
								</div>
								<!-- begin vertical-box-column -->
								<div class="vertical-box-column widget-chart-content">
									<div id="events-line-chart" class="morris-inverse" style="height: 100%; position: relative; -webkit-tap-highlight-color: rgba(0, 0, 0, 0);">

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
								<h4 class="widget-header-title">Tickets overview</h4>
							</div>
							<!-- end widget-header -->
							<!-- begin vertical-box -->
							<div class="vertical-box with-grid with-border-top">
								<!-- begin vertical-box-column -->
								<div class="vertical-box-column p-15" style="width: 30%;">
									<div class="widget-chart-info">
										<h4 class="widget-chart-info-title">Tickets</h4>
										<p class="widget-chart-info-desc">You have <strong><span id="ticketsTotalSpan"></span> ticket(s)</strong> due today</p>

										<hr>
										<div class="widget-chart-info">
											<h4 class="widget-chart-info-title">Current statistics</h4>
											<p class="widget-chart-info-desc">Todays tickets sorted by status</p>
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
										<h4 class="widget-chart-info-title">Work orders</h4>
										<p class="widget-chart-info-desc">You have <strong><span id="workordersTotalSpan"></span> work order(s)</strong> scheduled for today</p>

										<hr>
										<div class="widget-chart-info">
											<h4 class="widget-chart-info-title">Current statistics</h4>
											<p class="widget-chart-info-desc">Todays work orders sorted by status</p>
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
			
		</div>
		<!-- end #content -->
		
        
		
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
	<!-- ================== END BASE JS ================== -->
	
	<!-- ================== BEGIN PAGE LEVEL JS ================== -->
	<script src="<?= ASSETS_URL . "fullcalendar/lib/moment.min.js" ?>"></script>
	<script src="<?= JS_URL . "js.cookie.js" ?>"></script>
	<script src="<?= JS_URL . "apps.min.js" ?>"></script>
	<script src="<?= JS_URL . "timedisplay.js" ?>"></script>
	<script src="<?= JS_URL . "inactivity.js" ?>"></script>
	<script src="<?= ASSETS_URL . "morris/raphael.min.js" ?>"></script>
    <script src="<?= ASSETS_URL . "morris/morris.js" ?>"></script>
	<script src="<?= ASSETS_URL . "bootstrap-datepicker/js/bootstrap-datepicker.js" ?>"></script>
	<!-- ================== END PAGE LEVEL JS ================== -->
	
	<script>
	
	    var month = [];
            month[0] = "January";
            month[1] = "February";
            month[2] = "March";
            month[3] = "April";
            month[4] = "May";
            month[5] = "Jun";
            month[6] = "July";
            month[7] = "August";
            month[8] = "September";
            month[9] = "October";
            month[10] = "November";
            month[11] = "December";
			
		var todoArray = [];
            
        var loggedEmployee = <?php echo json_encode($_SESSION["id"]); ?>;
		
		var cSelectedDate = moment().format("YYYY-MM-DD");
            
		$(document).ready(function() {
			getMenuStatistics(loggedEmployee);
			getTodaysEvents();
			getTodaysTickets();
			getTodaysWorkOrders();
			getTodoList();
			setupCalendar();

			$('#addTodolistForm').on('submit', function(e) { //use on if jQuery 1.7+
                e.preventDefault();
                $.ajax({
                    type: "POST",
                    url: "todolist/add",
                    data: $(this).serialize(),
                    success: function(msg) {
                        if (msg != "") {
                            swal(
                                'Error!',
                                'The server encountered the following error: ' + msg,
                                'error'
                            );
                        }
						$("#addTodolistForm")[0].reset();
						getTodoList();
                    }
                });
            });
		});
		
		function goToEvents(){
		    window.open("events");
		}
		
		function goToWorkOrders(){
		    window.open("workorders");
		}
		
		function setupCalendar(){
			var postData = { employee_id: loggedEmployee };
			$.ajax({
                type: "POST",
                url: "<?= BASE_URL ?>" + "event/dates",
                data: postData,
                dataType: "json",
                success: function(dates) {
					var travelDays = [];
					for (var i = 0; i < dates.length; i++){
						travelDays.push(dates[i].event_date);
					}
					$("#schedule-calendar").datepicker({
						todayHighlight: true,
						dateFormat: 'yy-mm-dd',
						beforeShowDay: function(date) {
							var dateString = moment(date).format("YYYY-MM-DD");						
							if (travelDays.indexOf(dateString) != -1) {
								return {classes: 'text-primary'};
							}
							return [true];
						}
					});
					
					$("#schedule-calendar").datepicker().on("changeDate", function(e) {
					   cSelectedDate = moment(e.date).format("YYYY-MM-DD");
					   getEvents();
					});
				}
			});
		}
		
		function getTodoList(){
			$.ajax({
                type: "POST",
                url: "<?= BASE_URL ?>" + "todolist/get",
                data: null,
                dataType: "json",
                success: function(todolist) {
					todoArray = todolist;
					var todoContent = "";
					for (var i = 0; i < todolist.length; i++){
						var todoTask = todolist[i];
						var completed = 0;
						if (todoTask.status == 1){
							todoContent += '<div class="widget-todolist-item">' +
											  '<div class="widget-todolist-input">' +
												'<div class="checkbox checkbox-css checkbox-success">' +
												  '<input type="checkbox" id="widget_todolist_' + i + '" checked/>' +
												  '<label for="widget_todolist_' + i + '" class="p-l-15"></label>' +
												'</div>' +
											  '</div>' +
											  '<div class="widget-todolist-content">' +
												'<h4 class="widget-todolist-title">' + todoTask.title + '</h4>' +
												'<p class="widget-todolist-desc">' + todoTask.description + '</p>' + 
											  '</div>' +
											  '<div class="widget-todolist-icon">' +
												'<a href="#"><i class="fas fa-trash-alt text-danger"></i></a>' +
											  '</div>' +
											'</div>';
							completed++;
						}else{
							todoContent += '<div class="widget-todolist-item">' +
											  '<div class="widget-todolist-input">' +
												'<div class="checkbox checkbox-css checkbox-success">' +
												  '<input type="checkbox" id="widget_todolist_' + i + '" />' +
												  '<label for="widget_todolist_' + i + '" class="p-l-15"></label>' +
												'</div>' +
											  '</div>' +
											  '<div class="widget-todolist-content">' +
												'<h4 class="widget-todolist-title">' + todoTask.title + '</h4>' +
												'<p class="widget-todolist-desc">' + todoTask.description + '</p>' + 
											  '</div>' +
											  '<div class="widget-todolist-icon">' +
												'<a href="#"><i class="fas fa-trash-alt text-danger"></i></a>' +
											  '</div>' +
											'</div>';
						}
					}
					
					
					
					$("#todoList").html(todoContent);
					$("#totalSpan").html(completed);
					
					$(".widget-todolist-item input[type=checkbox]").on("change", function() {					
						var a = $(this).closest(".widget-todolist-item");
						var idx = $(a).index();

						if (!$(this).is(":checked")){
							setTodoStatus(idx, 0);
							$("#totalSpan").html(parseInt($("#totalSpan").html()) - 1);
						}else{
							setTodoStatus(idx, 1);
							$("#totalSpan").html(parseInt($("#totalSpan").html()) + 1);
						}
					});
					
					$(".widget-todolist-item .widget-todolist-icon").on("click", function() {					
						var a = $(this).closest(".widget-todolist-item");
						var idx = $(a).index();

						removeTodo(idx);
					});
					
					getEvents();
				}
			});
		}
		
		function getEvents() {
			var postData = { "date": cSelectedDate };
			$.ajax({
                type: "POST",
                url: "<?= BASE_URL ?>" + "dashboard/getCalendar",
                data: postData,
                dataType: "json",
                success: function(events) {
					$("#schedule-list").html("");
					
					for (var i = 0; i < events.length; i++) {
						var event = events[i];
						var color = "bg-warning";
						if (event.status == 1){
							color = "bg-primary";
						}else if (event.status == 2){
							color = "bg-success";
						}else if (event.status == 3){
							color = "bg-danger";
						}
						var icon = "fab fa-elementor";
						if (event.event_type == "Meeting"){
							icon = "far fa-handshake";
						}else if (event.event_type == "Task"){
							icon = "fas fa-tasks";
						}
						
						$("#schedule-list").append('<a href="eventdetails?event_id=' + event.event_id + '" target="_blank" class="widget-list-item">' +
							'<div class="widget-list-media icon">' +
								'<i class="' + icon + ' ' + color + ' text-white"></i>' +
							'</div>' +
							'<div class="widget-list-content">' +
								'<h4 class="widget-list-title">' + event.event_subject + '</h4>' +
							'</div>' +
							'<div class="widget-list-action text-right">' +
								'<i class="fa fa-angle-right fa-lg text-muted"></i>' +
							'</div>' +
						'</a>');
						
					}
				}
			});
		}
		
		function setTodoStatus(idx, status){
			var todo = todoArray[idx];

			var postData = { todo_id: todo.todo_id, status: status };
			console.log(postData);
            $.ajax({
                type: "POST",
                url: "<?= BASE_URL ?>" + "todolist/status",
                data: postData,
                success: function(msg) {
					if (msg != "") {
                        swal(
                            'Error!',
                            'The server encountered the following error: ' + msg,
                            'error'
                        );
                    }
				}
			});
		}
		
		function removeTodo(idx){
			var todo = todoArray[idx];
			swal({
              title: 'Remove todolist task',
              text: "Are you sure you want to remove this task?",
              type: 'error',
              showCancelButton: true,
              confirmButtonColor: '#3085d6',
              cancelButtonColor: '#d33',
              confirmButtonText: 'Yes, remove'
            }).then(function () {
				var postData = { todo_id: todo.todo_id};
				$.ajax({
					type: "POST",
					url: "<?= BASE_URL ?>" + "todolist/remove",
					data: postData,
					success: function(msg) {
						if (msg != "") {
							swal(
								'Error!',
								'The server encountered the following error: ' + msg,
								'error'
							);
						}else{
							getTodoList();
						}
					}
				});
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
        
        function getEventsLastWeek(incomplete, progress, complete, canceled){
            $.ajax({
                type: "POST",
                url: "<?= BASE_URL ?>" + "event/lastweek",
                data: null,
                dataType: "json",
                success: function(events) {
					var total = incomplete + progress + complete + canceled;
                    var chartData = [];
                    for (var i = 0; i < events.length; i++){
                        chartData.push({ "x": events[i].date, "y": events[i].eventcount })
                    }
                    
                    if (chartData.length){
                        Morris.Line({
                            element: "events-line-chart",
                            data: chartData,
                            xkey: "x",
                            ykeys: "y",
                            labels: ["Events"],
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
					
					$("#eventsTotalSpan").html(total);
                    $("#eventsIncompleteSpan").html(incomplete + " events");
					$("#eventsIncompleteBar").css("width", ((incomplete / total) * 100) + "%");
					$("#eventsInProgressSpan").html(progress + " events");
					$("#eventsInProgressBar").css("width", ((progress / total) * 100) + "%");
					$("#eventsFinishedSpan").html(complete + " events");
					$("#eventsFinishedBar").css("width", ((complete / total) * 100) + "%");
					$("#eventsCanceledSpan").html(canceled + " events");
					$("#eventsCanceledBar").css("width", ((canceled / total) * 100) + "%");
                }
		    });
        }
        
		
		function getTodaysEvents(){
		    $.ajax({
                type: "POST",
                url: "<?= BASE_URL ?>" + "event/alltoday",
                data: null,
                dataType: "json",
                success: function(events) {
                    var complete = 0;
					var progress = 0;
                    var incomplete = 0;
                    var canceled = 0;
					var today = 0;
                    for (var i = 0; i < events.length; i++){
                        var event = events[i];
						var eParticipants = event.participants.split(",");
                        if (event.status == 2){
                            complete++;
                        }else if (event.status == 1){
                            progress++;
                        }else if (event.status == 0){
                            incomplete++;
                        }else{
							canceled++;
						}
						
						if (eParticipants.indexOf(loggedEmployee) != -1){
							today++;
						}
                    }
					
                    $("#eventsToday").html(today);
                    getEventsLastWeek(incomplete, progress, complete, canceled);
                }
		    });
		}
		
		function getTodaysTickets(){
		    $.ajax({
                type: "POST",
                url: "<?= BASE_URL ?>" + "tickets/alltoday",
                data: null,
                dataType: "json",
                success: function(tickets) {
					var approved = 0;
                    var complete = 0;
                    var incomplete = 0;
					var progress = 0;
					var canceled = 0;
                    for (var i = 0; i < tickets.length; i++){
                        var ticket = tickets[i];
                        if (ticket.ticket_status == 0){
                            incomplete++;
                        }else if (ticket.ticket_status == 1){
							progress++;
						}else if (ticket.ticket_status == 2){
							complete++;
						}else if (ticket.ticket_status == 3){
							approved++;
						}else{
                            canceled++;
                        }
                    }
                    $("#ticketsToday").html(tickets.length);
                    getTicketsLastWeek(canceled, approved, complete, progress, incomplete);
                }
		    });
		}
		
		function getTicketsLastWeek(canceled, approved, complete, progress, incomplete){
		    $.ajax({
                type: "POST",
                url: "<?= BASE_URL ?>" + "tickets/lastweek",
                data: null,
                dataType: "json",
                success: function(tickets) {
					var total = canceled + approved + complete + progress + incomplete;
                    var chartData = [];
                    for (var i = 0; i < tickets.length; i++){
                        chartData.push({ "x": tickets[i].ticketdate, "y": tickets[i].ticketcount })
                    }
                    
                    if (chartData.length){
                        Morris.Line({
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
					
					$("#ticketsTotalSpan").html(total);
					if (total > 0){
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
					}else{
						$("#ticketsIncompleteSpan").html("No tickets");
						$("#ticketsInProgressSpan").html("No tickets");
						$("#ticketsFinishedSpan").html("No tickets");
						$("#ticketsApprovedSpan").html("No tickets");
						$("#ticketsCanceledSpan").html("No tickets");
					}
                    
                   
                }
		    });
		}
		
		
		
		function getTodaysWorkOrders(){
		    $.ajax({
                type: "POST",
                url: "<?= BASE_URL ?>" + "workorders/alltoday",
                data: null,
                dataType: "json",
                success: function(workorders) {
                    var complete = 0;
                    var incomplete = 0;
					var progress = 0;
                    for (var i = 0; i < workorders.length; i++){
                        var workorder = workorders[i];
                        if (workorder.status == 0){
                            incomplete++;
                        }else if (workorder.status == 1){
							progress++;
						}else{
                            complete++;
                        }
                    }
                    $("#workordersToday").html(workorders.length);
                    getWorkOrdersLastWeek(complete, progress, incomplete);
                }
		    });
		}
		
		function getWorkOrdersLastWeek(complete, progress, incomplete){
		    $.ajax({
                type: "POST",
                url: "<?= BASE_URL ?>" + "workorders/lastweek",
                data: null,
                dataType: "json",
                success: function(workorders) {
					var total = complete + progress + incomplete;
                    var chartData = [];
                    for (var i = 0; i < workorders.length; i++){
                        chartData.push({ "x": workorders[i].date, "y": workorders[i].workordercount })
                    }
                    
                    if (chartData.length){
                    
                        Morris.Line({
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
					
					$("#workordersTotalSpan").html(total);
					if (total > 0){
						$("#workordersIncompleteSpan").html(incomplete + " work orders");
						$("#workordersIncompleteBar").css("width", ((incomplete / total) * 100) + "%");
						$("#workordersInProgressSpan").html(progress + " work orders");
						$("#workordersInProgressBar").css("width", ((progress / total) * 100) + "%");
						$("#workordersFinishedSpan").html(complete + " work orders");
						$("#workordersFinishedBar").css("width", ((complete / total) * 100) + "%");
					}else{
						$("#workordersIncompleteSpan").html("No work orders");
						$("#workordersInProgressSpan").html("No work orders");
						$("#workordersFinishedSpan").html("No work orders");
					}
                    
                   
                }
		    });
		    
		    App.init();
		}
		
		function getMonthName(number) {
            return month[number];
        };
		
	</script>
</body>
</html>
