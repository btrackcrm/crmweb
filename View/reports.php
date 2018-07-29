<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
<!--<![endif]-->

<head>
    <meta charset="utf-8" />
    <title>Reports</title>
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
	<script src="https://cdnjs.cloudflare.com/ajax/libs/d3/3.5.2/d3.min.js"></script>
	<script src="<?= ASSETS_URL . "nvd3/build/nv.d3.js" ?>"></script>
	<!-- ================== END PAGE LEVEL STYLE ================== -->
	
	<!-- ================== BEGIN BASE JS ================== -->
	<script src="<?= ASSETS_URL . "pace/pace.min.js" ?>" ></script>
	<!-- ================== END BASE JS ================== -->
</head>
<style>
	.pointer{
        cursor: pointer;
    }
    
    .hover-underline:hover{
        cursor: pointer;
        text-decoration: underline;
    }
	
	table tr td:last-child{
		width: 100px;
	}
	
	#ticketsTable, #workOrderTable{
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
								echo '<li class="active">
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
							<h4 class="m-t-10 m-b-5">Reports</h4>
						</div>
						<!-- END profile-header-info -->
					</div>
					<ul class="profile-header-tab nav nav-tabs">
						<li class="nav-item active"><a href="#general-reports" class="nav-link" data-toggle="tab">GENERAL</a>
						</li>
						<li class="nav-item"><a href="#ticketing-reports" class="nav-link" data-toggle="tab">TICKETING</a>
						</li>
						<li class="nav-item"><a href="#workorder-reports" class="nav-link" data-toggle="tab">WORK ORDERS</a>
						</li>
						<li class="nav-item"><a href="#call-reports" class="nav-link" data-toggle="tab">CALLS</a>
						</li>
					</ul>
					<!-- END profile-header-content -->
				</div>
			</div>
			<div class="profile-content">
				<div class="tab-content">
					<div class="tab-pane fade in active" id="general-reports">
						<div class="row">
							<div class="col-md-6">
								<div class="widget widget-rounded m-b-30">
									<!-- begin widget-header -->
									<div class="widget-header">
										<h4 class="widget-header-title">Number of tickets</h4>
									</div>
									<div class="vertical-box with-grid with-border-top">
										<!-- begin vertical-box-column -->
										<div class="vertical-box-column widget-chart-content">
											<div id="ticket-employees-bar-chart" class="morris-inverse" style="height: 300px; position: relative; -webkit-tap-highlight-color: rgba(0, 0, 0, 0);">

											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="col-md-6">
								<div class="widget widget-rounded m-b-30">
									<!-- begin widget-header -->
									<div class="widget-header">
										<h4 class="widget-header-title">Average ticket turn around time</h4>
									</div>
									<div class="vertical-box with-grid with-border-top">
										<!-- begin vertical-box-column -->
										<div class="vertical-box-column widget-chart-content">
											<div id="ticket-resolution-bar-chart" class="morris-inverse" style="height: 300px; position: relative; -webkit-tap-highlight-color: rgba(0, 0, 0, 0);">

											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-6">
								<div class="widget widget-rounded m-b-30">
									<!-- begin widget-header -->
									<div class="widget-header">
										<h4 class="widget-header-title">Number of work orders</h4>
									</div>
									<div class="vertical-box with-grid with-border-top">
										<!-- begin vertical-box-column -->
										<div class="vertical-box-column widget-chart-content">
											<div id="workorder-employees-bar-chart" class="morris-inverse" style="height: 300px; position: relative; -webkit-tap-highlight-color: rgba(0, 0, 0, 0);">

											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="col-md-6">
								<div class="widget widget-rounded m-b-30">
									<!-- begin widget-header -->
									<div class="widget-header">
										<h4 class="widget-header-title">Average work order turn around time</h4>
									</div>
									<div class="vertical-box with-grid with-border-top">
										<!-- begin vertical-box-column -->
										<div class="vertical-box-column widget-chart-content">
											<div id="workorder-resolution-bar-chart" class="morris-inverse" style="height: 300px; position: relative; -webkit-tap-highlight-color: rgba(0, 0, 0, 0);">

											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="tab-pane fade" id="ticketing-reports">
						<div class="row m-b-15">
							<div class="col-md-12">
								<select id="ticketEmployeeSelect" class="form-control width-sm">
									<option value="">Choose an employee</option>
								</select>
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
										<h4 class="panel-title">Tickets</h4>
									</div>
									<div class="panel-body">
										<div class="m-b-20">
											<div class="radio radio-css radio-inline radio-danger m-t-0">
												<input type="radio" name="hide_inactive" id="pxr1" value="0" checked>
												<label for="pxr1">
													Hide inactive tickets
												</label>
											</div>
											<div class="radio radio-css radio-inline radio-success m-t-0">
												<input type="radio" name="hide_inactive" id="pxr2" value="1">
												<label for="pxr2">
													Show inactive tickets
												</label>
											</div>
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
																Work order
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
					</div>
					<div class="tab-pane fade" id="workorder-reports">
						<div class="row m-b-15">
							<div class="col-md-12">
								<select id="workorderEmployeeSelect" class="form-control width-sm">
									<option value="">Choose an employee</option>
								</select>
							</div>
						</div>
						<div class="row">
							<div class="col-md-12">
								<div class="panel panel-primary">
									<div class="panel-heading">
										<div class="panel-heading-btn">
											<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
											<a href="getWorkorders()" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-repeat"></i></a>
											<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
											<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
										</div>
										<h4 class="panel-title">Work orders</h4>
									</div>
									<div class="panel-body">
										<div class="m-b-20">
											<div class="radio radio-css radio-inline radio-danger m-t-0">
												<input type="radio" name="hide_finished" id="wxr1" value="0" checked>
												<label for="wxr1">
													Hide finished work orders
												</label>
											</div>
											<div class="radio radio-css radio-inline radio-success m-t-0">
												<input type="radio" name="hide_finished" id="wxr2" value="1">
												<label for="wxr2">
													Show finished work orders
												</label>
											</div>
										</div>
										<div class="dataTables_wrapper form-inline dt-bootstrap no-footer">
											<table id="workOrderTable" class="table table-striped">
												<thead>
													<tr>
														<th>Subject</th>
														<th>Priority</th>
														<th>Assigned to</th>
														<th>Customer</th>
														<th>Subsidiary</th>
														<th>Start date</th>
														<th>Due date</th>
														<th>Location</th>
														<th>Status</th>
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
					</div>
					<div class="tab-pane fade" id="call-reports"></div>
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
	<script src="<?= ASSETS_URL . "nvd3/build/nv.d3.js" ?>"></script>
    
    <script>
        var loggedEmployee = <?php echo json_encode($_SESSION["id"]); ?>;
		var ticketCount = <?php echo json_encode($ticket_count); ?>;
		var workorderCount = <?php echo json_encode($workorder_count); ?>;
		var ticketResponses = <?php echo json_encode($ticket_response_times); ?>;
        var workorderResponses = <?php echo json_encode($workorder_response_times); ?>;
		
		var ticketsTable;
		var dTable;
		
		var employeeArray = [];
		
		var hideInactive = true;
		var hideFinished = true;
		
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
		
        $(document).ready(function() {
			App.init();
			getMenuStatistics(loggedEmployee);
			getEmployees();
			drawTicketGraph();
			drawWorkorderGraph();
			
			$("input[type=radio][name=hide_inactive]").change(function(){
				var selectedValue = $(this).val();

				if (selectedValue == 1){
					hideInactive = false;
				}else{
					hideInactive = true;
				}
				var emp_id = $("#ticketEmployeeSelect").val();
				if (emp_id != ""){
					getTickets(emp_id);
				}
			});
			
			$("input[type=radio][name=hide_finished]").change(function(){
				var selectedValue = $(this).val();

				if (selectedValue == 1){
					hideFinished = false;
				}else{
					hideFinished = true;
				}
				var emp_id = $("#workorderEmployeeSelect").val();
				if (emp_id != ""){
					getWorkOrders(emp_id);
				}
			});
			
			$("#ticketEmployeeSelect").on("change", function(){
				if ($(this).val() != ""){
					getEmployeeTicketSLA($(this).val());
					getTickets($(this).val());
				}
			});
			
			$("#workorderEmployeeSelect").on("change", function(){
				if ($(this).val() != ""){
					getEmployeeWorkorderSLA($(this).val());
					getWorkOrders($(this).val());
				}
			});
        });
		
		function getWorkOrders(employee_id) {
			var postData = {
				employee_id: employee_id
			};
			$.ajax({
				type: "POST",
				url: "<?= BASE_URL ?>" + "workorders/getEmployee",
				data: postData,
				dataType: "json",
				success: function(workorders) {
					if (dTable != null) {
						if (hideFinished){
							var activeWorkorders = [];
							for (var i = 0; i < workorders.length; i++){
								if (workorders[i].status < 2){
									activeWorkorders.push(workorders[i]);
								}
							}
							dTable.clear().rows.add(activeWorkorders).draw(false);
						}else{
							dTable.clear().rows.add(workorders).draw(false);
						}
						dTable.columns([1,2,3,4,8]).every(function(index) {
									var column = this;
									var name;
									if (index == 1) {
										name = "Priority";
									} else if (index == 2) {
										name = "Assigned to";
									} else if (index == 3) {
										name = "Customer";
									} else if (index == 4) {
										name = "Subsidiary";
									} else {
										name = "Status";
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
					} else {
						var activeWorkorders = [];
							for (var i = 0; i < workorders.length; i++){
								if (workorders[i].status < 2){
									activeWorkorders.push(workorders[i]);
								}
							}
						dTable = $('#workOrderTable').DataTable({
							"aaData": activeWorkorders,
							initComplete: function() {
								this.api().columns([1,2,3,4,8]).every(function(index) {
									var column = this;
									var name;
									if (index == 1) {
										name = "Priority";
									} else if (index == 2) {
										name = "Assigned to";
									} else if (index == 3) {
										name = "Customer";
									} else if (index == 4) {
										name = "Subsidiary";
									} else {
										name = "Status";
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
							},
							"columns": [{
									"data": "workorder_subject"
								},
								{ 
									"data": "priority"
								},
								{
									"data": "employee_id"
								},
								{
									"data": "customer_name"
								},
								{
									"data": "subsidiary_name"
								},
								{
									"data": "workorder_startdate"
								},
								{
									"data": "workorder_enddate"
								},
								{
									"data": "workorder_location"
								},
								{
									"data": "status"
								},
								{
									"defaultContent": ''
								}
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
									"render": function(data, type, row) {
										return "<a class='text-primary hover-underline' href='employeepage?employee_id=" + data + "' target='_blank'>"  + row.employee_name + " " + row.employee_surname + "</a>";
									},
									"targets": 2,
									orderable: false
								},
								{
									"render": function(data, type, row) {
										if (data != null){
											return "<span class='text-primary hover-underline' onClick='viewCustomer(this)'>" + data + '</span>';
										}else{
											return "";
										}
									},
									"targets": 3,
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
									"targets": 4,
									orderable: false
								},
								{
									// The `data` parameter refers to the data for the cell (defined by the
									// `data` option, which defaults to the column being worked with, in
									// this case `data: 0`.
									"render": function(data, type, row) {
										if (type === 'display' || type === 'filter') {
											return moment(data).format("dddd, Do MMMM");
										} else {
											return data;
										}
									},
									"targets": 5
								},
								{
									// The `data` parameter refers to the data for the cell (defined by the
									// `data` option, which defaults to the column being worked with, in
									// this case `data: 0`.
									"render": function(data, type, row) {
										if (type === 'display' || type === 'filter') {
											return moment(data).format("dddd, Do MMMM");
										} else {
											return data;
										}
									},
									"targets": 6
								},
								{
									// The `data` parameter refers to the data for the cell (defined by the
									// `data` option, which defaults to the column being worked with, in
									// this case `data: 0`.
									"render": function(data, type, row) {
										if (data != "") {
											return "<span class='text-primary hover-underline' onClick='showMapPopup(this)'>" + data + '</span>';
										} else {
											return "Not specified";
										}
									},
									"targets": 7
								},
								{
									"render": function(data, type, row) {
										if (data == 0) {
											return "<label class='label label-danger'>Incomplete</label>";
										} else if (data == 1) {
											return "<label class='label label-primary'>In progress</label>";
										} else {
											return "<label class='label label-success'>Completed</label>";
										}
									},
									"targets": 8,
									orderable: false
								},
								{
									"render": function(data, type, row) {
										return "<a target='_blank' data-toggle='tooltip' title='View work order' href='workorderdetails?workorder_id=" + row.workorder_id + "'><i class='far fa-list-alt text-success pointer'></i></a>"
									},
									"targets": 9,
									"orderable": false
								}
							],
							"order": [[ 5, "desc" ]],
							responsive: true,
							dom: 'lfrtipB',
							buttons: [{
										extend: 'copy',
										className: 'btn-sm btn-primary',
										exportOptions: {
											format: {
												header: function ( data, column, row ) {
													if (column == 1) {
														data = "Priority";
													} else if (column == 2) {
														data = "Assigned to";
													} else if (column == 3) {
														data = "Customer";
													} else if (column == 4) {
														data = "Subsidiary";
													} else if (column == 8){
														name = "Status";
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
													if (column == 1) {
														data = "Priority";
													} else if (column == 2) {
														data = "Assigned to";
													} else if (column == 3) {
														data = "Customer";
													} else if (column == 4) {
														data = "Subsidiary";
													} else if (column == 8){
														name = "Status";
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
													if (column == 1) {
														data = "Priority";
													} else if (column == 2) {
														data = "Assigned to";
													} else if (column == 3) {
														data = "Customer";
													} else if (column == 4) {
														data = "Subsidiary";
													} else if (column == 8){
														name = "Status";
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
													if (column == 1) {
														data = "Priority";
													} else if (column == 2) {
														data = "Assigned to";
													} else if (column == 3) {
														data = "Customer";
													} else if (column == 4) {
														data = "Subsidiary";
													} else if (column == 8){
														name = "Status";
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
													if (column == 1) {
														data = "Priority";
													} else if (column == 2) {
														data = "Assigned to";
													} else if (column == 3) {
														data = "Customer";
													} else if (column == 4) {
														data = "Subsidiary";
													} else if (column == 8){
														name = "Status";
													}
													return data.trim();
												}
											}
										}
									}
								]
						});
					}
				}
			});
		}
		
		function getTickets(employee_id) {
			var postData = {
				employee_id: employee_id
			};
			$.ajax({
				type: "POST",
				url: "<?= BASE_URL ?>" + "employee/tickets",
				data: postData,
				dataType: "json",
				success: function(response) {
					var tickets = response.tickets;
					if (ticketsTable != null) {
						if (hideInactive) {
							var activeTickets = [];
							for (var i = 0; i < tickets.length; i++) {
								if (tickets[i].ticket_status < 2) {
									activeTickets.push(tickets[i]);
								}
							}
							ticketsTable.clear().rows.add(activeTickets).draw(false);
						} else {
							ticketsTable.clear().rows.add(tickets).draw(false);
						}
						ticketsTable.columns([1, 2, 4, 5, 6, 7, 10]).every(function(index) {
							var column = this;
							var name;
							if (index == 1) {
								name = "Priority";
							} else if (index == 2) {
								name = "Type";
							} else if (index == 4) {
								name = "Customer";
							} else if (index == 5) {
								name = "Subsidiary";
							} else if (index == 6) {
								name = "Assigned to";
							} else if (index == 7) {
								name = "Created by";
							} else {
								name = "Status";
							}
							var select = $(name + '<br><select id="ticketSelect' + index + '"><option value="">No filter</option></select>')
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
					} else {
						var activeTickets = [];
						for (var i = 0; i < tickets.length; i++) {
							if (tickets[i].ticket_status < 2) {
								activeTickets.push(tickets[i]);
							}
						}
						ticketsTable = $('#ticketsTable').DataTable({
							initComplete: function() {
								this.api().columns([1, 2, 4, 5, 6, 7, 10]).every(function(index) {
									var column = this;
									var name;
									if (index == 1) {
										name = "Priority";
									} else if (index == 2) {
										name = "Type";
									} else if (index == 4) {
										name = "Customer";
									} else if (index == 5) {
										name = "Subsidiary";
									} else if (index == 6) {
										name = "Assigned to";
									} else if (index == 7) {
										name = "Created by";
									} else {
										name = "Status";
									}
									var select = $(name + '<br><select id="ticketSelect' + index + '"><option value="">No filter</option></select>')
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
							},
							"aaData": activeTickets,
							"columns": [{
									"data": "ticket_subject"
								},
								{
									"data": "ticket_priority"
								},
								{
									"data": "category_name"
								},
								{
									"data": "ticket_date"
								},
								{
									"data": "customer_name"
								},
								{
									"data": "subsidiary_name"
								},
								{
									"data": "assigned_to"
								},
								{
									"data": "employee_id"
								},
								{
									"data": "created_on"
								},
								{
									"data": "last_modified"
								},
								{
									"data": "ticket_status"
								},
								{
									"data": "workorder_id"
								},
								{
									"defaultContent": ''
								}
							],
							"columnDefs": [{
									// The `data` parameter refers to the data for the cell (defined by the
									// `data` option, which defaults to the column being worked with, in
									// this case `data: 0`.
									"render": function(data, type, row) {
										if (data == "Low") {
											return "<label class='label label-success'>" + data + "</label>";
										} else if (data == "Normal") {
											return "<label class='label label-primary'>" + data + "</label>";
										} else {
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
									"render": function(data, type, row) {
										if (type === 'display' || type === 'filter') {
											if (moment().diff(moment(data), 'days') <= 0) {
												return moment(data).format("dddd, Do MMMM");
											} else {
												return "<span class='text-danger'>" + moment(data).format("dddd, Do MMMM") + '</span>';
											}
										} else {
											return data;
										}
									},
									"targets": 3
								},
								{
									// The `data` parameter refers to the data for the cell (defined by the
									// `data` option, which defaults to the column being worked with, in
									// this case `data: 0`.
									"render": function(data, type, row) {
										return "<span class='text-primary hover-underline' onClick='viewTicketCustomer(this)'>" + row.customer_name + "</span>";
									},
									"targets": 4,
									orderable: false
								},
								{
									"render": function(data, type, row) {
										if (data != null) {
											return data;
										} else {
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
										return "<a class='text-primary hover-underline' href='employeepage?employee_id=" + data + "' target='_blank'>" + row.employee_name + " " + row.employee_surname + "</a>";
									},
									"targets": 7,
									"orderable": false
								},
								{
									// The `data` parameter refers to the data for the cell (defined by the
									// `data` option, which defaults to the column being worked with, in
									// this case `data: 0`.
									"render": function(data, type, row) {
										if (type === 'display' || type === 'filter') {
											return moment(data).format("ddd. Do MMM, HH:mm");
										} else {
											return data;
										}
									},
									"targets": 8
								},
								{
									// The `data` parameter refers to the data for the cell (defined by the
									// `data` option, which defaults to the column being worked with, in
									// this case `data: 0`.
									"render": function(data, type, row) {
										if (type === 'display' || type === 'filter') {
											return moment(data).format("ddd. Do MMM, HH:mm");
										} else {
											return data;
										}
									},
									"targets": 9
								},
								{
									// The `data` parameter refers to the data for the cell (defined by the
									// `data` option, which defaults to the column being worked with, in
									// this case `data: 0`.
									"render": function(data, type, row) {
										if (data == 0) {
											return "<label class='label label-warning'>Pending</label>";
										} else if (data == 1) {
											return "<label class='label label-info'>In progress</label>";
										} else if (data == 2) {
											return "<label class='label label-primary'>Finished</label>";
										} else if (data == 3) {
											return "<label class='label label-success'>Approved</label>";
										} else {
											return "<label class='label label-danger'>Canceled</label>";
										}
									},
									"targets": 10,
									"orderable": false
								},
								{
									// The `data` parameter refers to the data for the cell (defined by the
									// `data` option, which defaults to the column being worked with, in
									// this case `data: 0`.
									"render": function(data, type, row) {
										if (data == null) {
											return "";
										} else {
											return "<a target='_blank' href='workorderdetails?workorder_id=" + data + "' class='btn btn-white btn-sm'><i class='fas fa-briefcase text-primary m-r-5'></i>View</a>";
										}
									},
									"targets": 11
								},
								{
									"render": function(data, type, row) {
										return "<a target='_blank' data-toggle='tooltip' title='View ticket' href='ticketdetails?ticket_id=" + row.ticket_id + "'><i class='far fa-list-alt text-success pointer'></i></a>"
									},
									"orderable": false,
									"targets": 12
								}
							],
							"order": [
								[9, "desc"]
							],
							responsive: true,
							dom: 'lfrtipB',
							buttons: [{
										extend: 'copy',
										className: 'btn-sm btn-primary',
										exportOptions: {
											format: {
												header: function ( data, column, row ) {
													if (column == 1){
														data = "Source";
													}else if (column == 2){
														data = "Priority";
													}else if (column == 3){
														data = "Type";
													}else if (column == 6){
														data = "Customer";
													}else if (column == 7){
														data = "Subsidiary";
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
														data = "Source";
													}else if (column == 2){
														data = "Priority";
													}else if (column == 3){
														data = "Type";
													}else if (column == 6){
														data = "Customer";
													}else if (column == 7){
														data = "Subsidiary";
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
														data = "Source";
													}else if (column == 2){
														data = "Priority";
													}else if (column == 3){
														data = "Type";
													}else if (column == 6){
														data = "Customer";
													}else if (column == 7){
														data = "Subsidiary";
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
														data = "Source";
													}else if (column == 2){
														data = "Priority";
													}else if (column == 3){
														data = "Type";
													}else if (column == 6){
														data = "Customer";
													}else if (column == 7){
														data = "Subsidiary";
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
														data = "Source";
													}else if (column == 2){
														data = "Priority";
													}else if (column == 3){
														data = "Type";
													}else if (column == 6){
														data = "Customer";
													}else if (column == 7){
														data = "Subsidiary";
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
					
					console.log(ticket_resolution_times);
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
		
		function getEmployees() {
            $.ajax({
                type: "POST",
                url: "<?= BASE_URL ?>" + "employees/list",
                data: null,
                dataType: "json",
                success: function(employees) {
					employeeArray = employees;
                    for (var i = 0; i < employees.length; i++){
                        $("#ticketEmployeeSelect, #workorderEmployeeSelect").append($('<option>', {
                            value: employees[i].employee_id,
                            text: employees[i].employee_name + " " + employees[i].employee_surname
                        }));
                    }
                }
            });
        }
		
		function drawTicketGraph(){
			var chartData = [];
			var chartData2 = [];
			
            for (var i = 0; i < ticketCount.length; i++){
                var entry = ticketCount[i];
                chartData.push({ label: entry.employee_name + " " + entry.employee_surname, value: entry.ticketcount });
            } 
                    
            Morris.Bar({
				element: "ticket-employees-bar-chart",
				data: chartData,
				xkey: "label",
				ykeys: ["value"],
				labels: ["Number of tickets"],
				barRatio: .4,
				barColors: ["#00acac"],
				resize: true,
				gridTextFamily: "inherit",
                gridTextColor: "rgba(0,0,0,0.4)",
                gridTextWeight: "normal",
                gridTextSize: "12px",
                gridLineColor: "rgba(0,0,0,0.15)",
                hideHover: "auto",
			});  

			for (var i = 0; i < ticketResponses.length; i++){
				var entry = ticketResponses[i];
				chartData2.push({ label: entry.employee_name + " " + entry.employee_surname, value: entry.resolution_time });
			}
			
			Morris.Bar({
				element: "ticket-resolution-bar-chart",
				data: chartData2,
				xkey: "label",
				ykeys: ["value"],
				labels: ["Average resolution time (minutes)"],
				barRatio: .4,
				barColors: ["#348fe2"],
				resize: true,
				gridTextFamily: "inherit",
                gridTextColor: "rgba(0,0,0,0.4)",
                gridTextWeight: "normal",
                gridTextSize: "12px",
                gridLineColor: "rgba(0,0,0,0.15)",
                hideHover: "auto",
			});  
		}
		
		function drawWorkorderGraph(){
			var chartData = [];
			var chartData2 = [];
			
            for (var i = 0; i < workorderCount.length; i++){
                var entry = workorderCount[i];
                chartData.push({ label: entry.employee_name + " " + entry.employee_surname, value: entry.workordercount });
            } 
                    
            Morris.Bar({
				element: "workorder-employees-bar-chart",
				data: chartData,
				xkey: "label",
				ykeys: ["value"],
				labels: ["Number of work orders"],
				barRatio: .4,
				barColors: ["#00acac"],
				resize: true,
				gridTextFamily: "inherit",
                gridTextColor: "rgba(0,0,0,0.4)",
                gridTextWeight: "normal",
                gridTextSize: "12px",
                gridLineColor: "rgba(0,0,0,0.15)",
                hideHover: "auto",
			});  
			
			for (var i = 0; i < workorderResponses.length; i++){
				var entry = workorderResponses[i];
				chartData2.push({ label: entry.employee_name + " " + entry.employee_surname, value: entry.resolution_time });
			}
			
			Morris.Bar({
				element: "workorder-resolution-bar-chart",
				data: chartData2,
				xkey: "label",
				ykeys: ["value"],
				labels: ["Average resolution time (minutes)"],
				barRatio: .4,
				barColors: ["#348fe2"],
				resize: true,
				gridTextFamily: "inherit",
                gridTextColor: "rgba(0,0,0,0.4)",
                gridTextWeight: "normal",
                gridTextSize: "12px",
                gridLineColor: "rgba(0,0,0,0.15)",
                hideHover: "auto",
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