<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
<!--<![endif]-->

<head>
    <meta charset="utf-8" />
    <title>My tickets</title>
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
    
    
    #ticketsTable{
        width: 100% !important;
    }
    
    #ticketsTable td:last-child{
        min-width: 100px;
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
    
    #newTicketDIV, #editTicketDIV{
        width: 900px;
        height: auto;
        position: relative;
        margin: 5% auto 0px auto;
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
										<li><a href="' . BASE_URL . 'ticketingdashboard">Ticketing</a></li>
										<li class="active"><a href="' . BASE_URL . 'ticketing">My tickets</a></li>
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
							<h4 class="m-t-10 m-b-5">My tickets</h4>
						</div>
						<!-- END profile-header-info -->
					</div>
					<!-- END profile-header-content -->
				</div>
			</div>
			<div class="profile-content">
				<div class="row">
					<div class="col-md-12">
						<div class="panel panel-inverse">
							<div class="panel-heading">
								<div class="panel-heading-btn">
									<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
									<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
									<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
								</div>
								<h4 class="panel-title">My tickets</h4>
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
				<div class="row">
					<div class="col-md-12">
						<div class="widget widget-rounded m-b-30">
							<!-- begin widget-header -->
							<div class="widget-header">
								<h4 class="widget-header-title">My tickets</h4>
							</div>
							<!-- end widget-header -->
							<!-- begin vertical-box -->
							<div class="vertical-box with-grid with-border-top">
								<!-- begin vertical-box-column -->
								<div class="vertical-box-column widget-chart-content">
									<div id="ticket-line-chart" class="morris-inverse" style="height: 100%; position: relative; -webkit-tap-highlight-color: rgba(0, 0, 0, 0);">

									</div>
								</div>
								<!-- end vertical-box-column -->
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
												<div id="ticketsInProgressBar" class="progress-bar progress-bar-striped progress-bar-animated rounded-corner bg-primary"></div>
											</div>
											<div class="widget-chart-info-progress">
												<b>Finished</b>
												<span id="ticketsFinishedSpan" class="pull-right"></span>
											</div>
											<div class="progress progress-sm">
												<div id="ticketsFinishedBar" class="progress-bar progress-bar-striped progress-bar-animated rounded-corner bg-success"></div>
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
								<!-- end vertical-box-column -->
							</div>
							<!-- end vertical-box -->
						</div>
					</div>
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
                                            <input id="editTicketStartDateInput" type="text" name="billing_fromdate" class="form-control" placeholder="Choose a date" required />
                                            <span class="input-group-addon btn bg-primary">
                                                <span class="fa fa-calendar text-white"></span>
                                            </span>                    
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <label>Billing from time: <span class="text-danger">*</span></label>
                                        <div class="input-group ticket-time-picker">
                                            <input id="editTicketStartTimeInput" type="text" name="billing_fromtime" class="form-control" placeholder="Time" required />
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
	<script src="<?= ASSETS_URL . "jquery-file-upload/js/jquery.fileupload.js" ?>"></script>
    
    <script>
        var loggedEmployee = <?php echo json_encode($_SESSION["id"]); ?>;
		var isAdmin = <?php echo json_encode($_SESSION["admin"]); ?>;
		var dateformat = <?php echo json_encode($_SESSION["dateformat"]); ?>;
		var timeformat = <?php echo json_encode($_SESSION["timeformat"]); ?>;
        var ticketsTable;
        var firstPageLoad = true;
        var ticketArray;
		
		var customersArray = [];
		var subsidiariesArray = [];
		var employeeArray = [];
		
		var hideInactive = true;
		
		var ticketFiles = [];
		var editTicketFiles = [];
		
		var displayChanged = false;
        
        $(document).ready(function() {
			getMenuStatistics(loggedEmployee);
			getEmployeeTickets(loggedEmployee);
			getEmployees();
			getCustomers();
			getSubsidiaries();
			getCategories();
			getTodaysTickets();
			
			$(".ticket-date-picker").datetimepicker({format: dateformat, allowInputToggle: true });
			$(".ticket-time-picker").datetimepicker({format: timeformat, stepping: 5, allowInputToggle: true });
			
			$("#editTicketCustomerSelect, #editTicketSubsidiarySelect, #editTicketEmployeeSelect").select2({width: "100%"});
			
			$("input[type=radio][name=hide_inactive]").change(function(){
				var selectedValue = $(this).val();

				if (selectedValue == 1){
					hideInactive = false;
				}else{
					hideInactive = true;
				}
				displayChanged = true;
				getEmployeeTickets(loggedEmployee);
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
                            getEmployeeTickets(loggedEmployee);
                            hideEditTicketPopup();
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
		
		function initMap(){
			var editTicketSearchBox = new google.maps.places.SearchBox(document.getElementById('editTicketLocationInput'));
                    
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
        
        function hideEditTicketPopup(){
			$("#editTicketForm")[0].reset();
			editTicketFiles = [];
			$("#editTicketFiles").html("");
            $("#ticketPopupDIV, #editTicketDIV").hide();
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
        
        function viewTicketCustomer(row){
            var actualRow = $(row).parents('tr');
			if (actualRow.hasClass('child')) {//Check if the current row is a child row
				actualRow = actualRow.prev();//If it is, then point to the row before it (its 'parent')
			}
            var customer = ticketsTable.row(actualRow).data();
            var url = "<?= BASE_URL ?>" + "customerdetails?customer_id=" + customer.customer_id;
		    window.open(url, "_blank");
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
		
		function getTodaysTickets(){
		    $.ajax({
                type: "POST",
                url: "<?= BASE_URL ?>" + "tickets/alltoday",
                data: null,
                dataType: "json",
                success: function(tickets) {
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
						}else{
                            canceled++;
                        }
                    }
                    $("#ticketsToday").html(tickets.length);
                    getTicketsLastWeek(canceled, complete, progress, incomplete);
                }
		    });
		}
		
		function getTicketsLastWeek(canceled, complete, progress, incomplete){
		    $.ajax({
                type: "POST",
                url: "<?= BASE_URL ?>" + "tickets/lastweek",
                data: null,
                dataType: "json",
                success: function(tickets) {
					var total = canceled + complete + progress + incomplete;
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
						$("#ticketsCanceledSpan").html(canceled + " tickets");
						$("#ticketsCanceledBar").css("width", ((canceled / total) * 100) + "%");
					}else{
						$("#ticketsIncompleteSpan").html("No tickets");
						$("#ticketsInProgressSpan").html("No tickets");
						$("#ticketsFinishedSpan").html("No tickets");
						$("#ticketsCanceledSpan").html("No tickets");
					}
                    
                   
                }
		    });
		}
        
        function getEmployeeTickets(employee_id){
            var postData = { "employee_id": employee_id };
            
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
									ticketsTable.columns([1,2,4,5,6,9]).every( function (index) {
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
									this.api().columns([1,2,4,5,6,9]).every( function (index) {
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
										column.cells('', column[0]).render('display').sort().unique().each( function ( d, j ) {
											select.append( '<option value="'+d+'">'+d+'</option>' )
										});
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
										"render": function ( data, type, row ) {
											if (type === 'display' || type === 'filter'){
												return moment(data).format(dateformat + " " + timeformat);
											}else{
												return data;
											}
										},
										"targets": 7
									},
									{
										// The `data` parameter refers to the data for the cell (defined by the
										// `data` option, which defaults to the column being worked with, in
										// this case `data: 0`.
										"render": function ( data, type, row ) {
											if (type === 'display' || type === 'filter'){
												return moment(data).format(dateformat + " " + timeformat);
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
										"targets": 9,
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
										"targets": 10
									}
								],
								createdRow: function (row, data, index) {
									if (moment().diff(moment(data.ticket_date), 'days') > 0 && data.ticket_status != 2 && data.ticket_status != 3){
										$(row).addClass('row-danger');
									}
								},
								"order": [[ 8, "desc" ]],
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
													}else if (column == 9){
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
													}else if (column == 9){
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
													}else if (column == 9){
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
													}else if (column == 9){
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
													}else if (column == 9){
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
            
            if (firstPageLoad){
                App.init();
                firstPageLoad = false;
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
		
		function showWorkOrderPage(row){
            var actualRow = $(row).parents('tr');
			if (actualRow.hasClass('child')) {//Check if the current row is a child row
				actualRow = actualRow.prev();//If it is, then point to the row before it (its 'parent')
			}
            var ticket = ticketsTable.row(actualRow).data();
            var url = "<?= BASE_URL ?>" + "workorderdetails?workorder_id=" + ticket.workorder_id;
		    window.open(url, "_blank");
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
                            getEmployeeTickets(loggedEmployee);
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
                            getEmployeeTickets(loggedEmployee);
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
</body>
</html>