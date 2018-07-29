<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
<!--<![endif]-->
<head>
	<meta charset="utf-8" />
	<title>Work orders</title>
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.6.9/sweetalert2.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.6.9/sweetalert2.min.css">
	<link href="<?= ASSETS_URL . "select2/dist/css/select2.css" ?>" rel="stylesheet" />
	<link href="<?= ASSETS_URL . "jquery-file-upload/css/jquery.fileupload.css" ?>" rel="stylesheet" />
	<link href="<?= ASSETS_URL . "jquery-file-upload/css/jquery.fileupload-ui.css" ?>" rel="stylesheet" />
	<!-- ================== END PAGE LEVEL STYLE ================== -->
	
	<!-- ================== BEGIN BASE JS ================== -->
	<script src="<?= ASSETS_URL . "pace/pace.min.js" ?>" ></script>
	<!-- ================== END BASE JS ================== -->
</head>
<style>
	#map{
        width: 100%;
        height: 500px;
    }
	
	.hide{
		display: none;
	}
	
	#newWorkorderDIV, #editWorkorderDIV, #addItemDIV, #editItemDIV, #mapDIV {
        width: 840px;
        height: auto;
        position: relative;
        margin: 60px auto 0px auto;
    }
    
    
    #workOrderTable, #itemsTable{
        width: 100% !important;
    }
	
	.pointer{
		cursor: pointer;
	}
	
	.span-add{
        display: inline;
        padding: 0;
        width: auto;
        border: 0;
        color: #348fe2;
        cursor: pointer;
        transition: all 220ms ease;
    }
    
    .span-add:hover{
        text-decoration: underline;
    }
	
	.hover-underline:hover{
        cursor: pointer;
        text-decoration: underline;
    }
	
	#workOrderTable td:last-child, #itemsTable td:last-child{
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
								echo '<li class="active">
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
			<!-- begin breadcrumb -->
			<div class="profile">
				<div class="profile-header profile-header-no-image">
					<!-- BEGIN profile-header-cover -->
					<div class="profile-header-cover"></div>
					<!-- END profile-header-cover -->
					<!-- BEGIN profile-header-content -->
					<div class="profile-header-content">
						
						<!-- BEGIN profile-header-info -->
						<div class="profile-header-info">
							<h4 class="m-t-10 m-b-5">Work orders</h4>
							<div class="m-t-10">
								<button class="btn btn-white btn-sm" onClick="showNewWorkorderPopup()"><i class="fas fa-wrench text-success m-r-5"></i>Add a work order</button>
								<button class="btn btn-white btn-sm" onClick="showAddItemPopup(0)"><i class="fas fa-tag text-success m-r-5"></i>Add an item</button>
							</div>
						</div>
						<!-- END profile-header-info -->
					</div>
					<!-- BEGIN profile-header-tab -->
					<ul class="profile-header-tab nav nav-tabs">
						<li class="nav-item active"><a href="#wo-overview" class="nav-link" data-toggle="tab">OVERVIEW</a></li>
						<li class="nav-item"><a href="#wo-items" class="nav-link" data-toggle="tab">ITEMS</a></li>
					</ul>
					<!-- END profile-header-tab -->
					<!-- END profile-header-content -->
				</div>
			</div>
			<!-- end breadcrumb -->
			<div class="profile-content">
				<div class="tab-content">
					<div class="tab-pane fade in active" id="wo-overview">
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
													Show only active work orders
												</label>
											</div>
											<div class="radio radio-css radio-inline radio-success m-t-0">
												<input type="radio" name="hide_finished" id="wxr2" value="1">
												<label for="wxr2">
													Show all work orders
												</label>
											</div>
										</div>
										<div class="dataTables_wrapper form-inline dt-bootstrap no-footer">
											<table id="workOrderTable" class="table table-striped">
												<thead>
													<tr>
														<th>Work order number</th>
														<th>Subject</th>
														<th>Priority</th>
														<th>Assigned to</th>
														<th>Customer</th>
														<th>Subsidiary</th>
														<th>Start date</th>
														<th>Due date</th>
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
					</div>
					<div class="tab-pane fade" id="wo-items">
						<div class="row">
							<div class="col-md-12">
								<div class="panel panel-primary">
									<div class="panel-heading">
										<div class="panel-heading-btn">
											<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
											<a href="getItems()" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-repeat"></i></a>
											<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
											<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
										</div>
										<h4 class="panel-title">Items</h4>
									</div>
									<div class="panel-body">
										<div class="dataTables_wrapper form-inline dt-bootstrap no-footer">
											<table id="itemsTable" class="table table-striped">
												<thead>
													<tr>
														<th>Name</th>
														<th>Serial number</th>
														<th>Code</th>
														<th>Type</th>
														<th>Unit</th>
														<th>VAT</th>
														<th>Price</th>
														<th>Currency</th>
														<th>Added by</th>
														<th>Created on</th>
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
		<!-- end #content -->
		
		<div class="popupContainer" id="workorderPopup" hidden>
			<div class="panel panel-primary" id="newWorkorderDIV" hidden>
				<div class="panel-heading">
					<div class="panel-heading-btn">
						<button onclick="hideNewWorkorderPopup()" class="btn btn-xs btn-icon btn-circle btn-default"><i class="fa fa-times"></i>
						</button>
					</div>
					<h4 class="panel-title">New work order</h4>
				</div>
				<div class="panel-body">
					<form id="newWorkorderForm" action="<?= BASE_URL . "workorders/add" ?>" method="post" class="form-horizontal">
						<input type="hidden" id="hiddenWorkorderLatitudeInput" name="latitude" />
						<input type="hidden" id="hiddenWorkorderLongitudeInput" name="longitude" />
						<input type="hidden" name="ticket_id" value="" />
						<div class="form-group">
							<div class="col-md-6">
                                <label>Priority:</label><br>
                                <div class="radio radio-css radio-inline radio-success">
                                    <input type="radio" id="pob1" name="priority" value="Low">
                                    <label for="pob1">
                                        	Low
                                        </label>
                                    </div>
                                    <div class="radio radio-css radio-inline radio-primary">
                                        <input type="radio" id="pob2" name="priority" value="Normal" checked>
                                        <label for="pob2">
                                        	Normal
                                        </label>
                                    </div>
                                    <div class="radio radio-css radio-inline radio-danger">
                                        <input type="radio" id="pob3" name="priority" value="High">
                                        <label for="pob3">
                                        	High
                                        </label>
                                    </div>
                            </div>
						</div>
						<div class="form-group">
							<div class="col-md-12">
								<label>Subject: <span class="text-danger">*</span></label>
								<input type="text" class="form-control" name="workorder_subject" placeholder="Enter a subject" required />
							</div>
						</div>
						<div class="form-group">
							<div class="col-md-6">
								<label>Assign to: <span class="text-danger">*</span></label>
								<select id="employeeSelect" class="form-control" name="assign_to[]" multiple required>
								
								</select>
							</div>
							<div class="col-md-3">
								<label>Start date: <span class="text-danger">*</span></label>
								<input id="workorderStartDateInput" type="text" class="form-control date-picker-input" name="start_date" placeholder="Select a start date" required />
							</div>
							<div class="col-md-3">
								<label>End date: <span class="text-danger">*</span></label>
								<input id="workorderEndDateInput" type="text" class="form-control date-picker-input" name="end_date" placeholder="Select a end date" required />
							</div>
						</div>
						<div class="form-group">
							<div class="col-md-6">
								<label>Customer: <span class="text-danger">*</span></label>
								<select id="workorderCustomerSelect" class="form-control" name="customer_id" required>
									<option value="">Choose a customer</option>
								</select>
							</div>
							<div class="col-md-6">
								<label>Subsidiary: <span class="text-danger">*</span></label>
								<select id="workorderSubsidiarySelect" class="form-control" name="subsidiary_id">
									<option value="">Main company</option>
								</select>
							</div>
						</div>
						<div class="form-group">
							<div class="col-md-12">
								<label>Location:</label>
								<input id="workorderLocationInput" type="text" class="form-control" name="workorder_location" placeholder="Enter an address" />
							</div>
						</div>
						<div class="form-group">
							<div class="col-md-9">
								<label>Item: </label>
								<select id="itemSelect" class="form-control" name="items[]" required>
									<option value="">Choose an item</option>
								</select>
								<div class="m-t-5">
									<span class="span-add m-r-15" onClick="addItem()"><i class="fas fa-plus-circle m-r-5"></i>Add an item</span>
									<span class="span-add text-success" onClick="showAddItemPopup(1)"><i class="fas fa-plus-circle m-r-5"></i>Create an item</span>
								</div>
							</div>
							<div class="col-md-2">
								<label>Amount: </label>
								<input type="number" class="form-control" name="item_amount[]" min="0.1" step="0.1" value="1" />
							</div>
						</div>
						<div id="itemsDIV">
							
						</div>
						<div class="form-group">
							<div class="col-md-12">
								<label>Notes: </label>
								<textarea class="form-control" name="workorder_notes" rows="4"></textarea>
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
									<input id="workorderFileUpload" type="file" name="file" multiple>
								</span>
							</div>
						</div>
					</div>
					<div class="panel-footer">
						<button id="addWorkorderBtn" class="btn btn-success pull-left">Create work order</button>
						<button class="btn btn-danger pull-right" type="button" onClick="hideNewWorkorderPopup()">Close</button>
						</form>
					</div>
			</div>
			<div class="panel panel-primary" id="editWorkorderDIV" hidden>
				<div class="panel-heading">
					<div class="panel-heading-btn">
						<button onclick="hideEditWorkorderPopup()" class="btn btn-xs btn-icon btn-circle btn-default"><i class="fa fa-times"></i>
						</button>
					</div>
					<h4 class="panel-title">Edit work order</h4>
				</div>
				<div class="panel-body">
					<form id="editWorkorderForm" action="<?= BASE_URL . "workorders/edit" ?>" method="post" class="form-horizontal">
						<input type="hidden" id="hiddenEditWorkorderLatitudeInput" name="latitude" />
						<input type="hidden" id="hiddenEditWorkorderLongitudeInput" name="longitude" />
						<input type="hidden" name="workorder_id" />
						<div class="form-group">
                            <div class="col-md-6">
									<label>Status:</label><br>
									<div class="radio radio-css radio-inline radio-warning">
										<input type="radio" id="cob1" name="status" value="0">
										<label for="cob1">
												Incomplete
											</label>
										</div>
                                    <div class="radio radio-css radio-inline radio-primary">
                                        <input type="radio" id="cob2" name="status" value="1">
                                        <label for="cob2">
                                        	In progress
                                        </label>
                                    </div>
                                    <div class="radio radio-css radio-inline radio-success">
                                        <input type="radio" id="cob3" name="status" value="2">
                                        <label for="cob3">
                                        	Finished
                                        </label>
                                    </div>
									<div class="radio radio-css radio-inline radio-danger">
                                        <input type="radio" id="cob4" name="status" value="3">
                                        <label for="cob4">
                                        	Canceled
                                        </label>
                                    </div>
                            </div>
							<div class="col-md-6">
                                <label>Priority:</label><br>
                                <div class="radio radio-css radio-inline radio-success">
                                    <input type="radio" id="epob1" name="priority" value="Low">
                                    <label for="epob1">
                                        	Low
                                        </label>
                                    </div>
                                    <div class="radio radio-css radio-inline radio-primary">
                                        <input type="radio" id="epob2" name="priority" value="Normal">
                                        <label for="epob2">
                                        	Normal
                                        </label>
                                    </div>
                                    <div class="radio radio-css radio-inline radio-danger">
                                        <input type="radio" id="epob3" name="priority" value="High">
                                        <label for="epob3">
                                        	High
                                        </label>
                                    </div>
                            </div>
                        </div>
						<div class="form-group">
							<div class="col-md-12">
								<label>Subject: <span class="text-danger">*</span></label>
								<input id="editWorkorderSubjectInput" type="text" class="form-control" name="workorder_subject" placeholder="Enter a subject" required />
							</div>
						</div>
						<div class="form-group">
							<div class="col-md-6">
								<label>Assign to: <span class="text-danger">*</span></label>
								<select id="editEmployeeSelect" class="form-control" name="assign_to[]" multiple required>
								
								</select>
							</div>
							<div class="col-md-3">
								<label>Start date: <span class="text-danger">*</span></label>
								<input id="editWorkorderStartDateInput" type="text" class="form-control date-picker-input" name="start_date" placeholder="Select a start date" required />
							</div>
							<div class="col-md-3">
								<label>End date: <span class="text-danger">*</span></label>
								<input id="editWorkorderEndDateInput" type="text" class="form-control date-picker-input" name="end_date" placeholder="Select a end date" required />
							</div>
						</div>
						<div class="form-group">
							<div class="col-md-6">
								<label>Customer: <span class="text-danger">*</span></label>
								<select id="editWorkorderCustomerSelect" class="form-control" name="customer_id" required>
									<option value="">Choose a customer</option>
								</select>
							</div>
							<div class="col-md-6">
								<label>Subsidiary: <span class="text-danger">*</span></label>
								<select id="editWorkorderSubsidiarySelect" class="form-control" name="subsidiary_id">
									<option value="">Main company</option>
								</select>
							</div>
						</div>
						<div class="form-group">
							<div class="col-md-12">
								<label>Location:</label>
								<input id="editWorkorderLocationInput" type="text" class="form-control" name="workorder_location" placeholder="Enter an address" />
							</div>
						</div>
						<div class="form-group">
							<div class="col-md-9">
								<label>Item: </label>
								<select id="editItemSelect" class="form-control" name="items[]" required>
									<option value="">Choose an item</option>
								</select>
								<div class="m-t-5">
									<span class="span-add m-r-15" onClick="addEditItem()"><i class="fas fa-plus-circle m-r-5"></i>Add an item</span>
									<span class="span-add text-success" onClick="showAddItemPopup(2)"><i class="fas fa-plus-circle m-r-5"></i>Create an item</span>
								</div>
							</div>
							<div class="col-md-2">
								<label>Amount: </label>
								<input id="editItemAmountInput" type="number" class="form-control" name="item_amount[]" min="0.1" step="0.1" value="1" />
							</div>
						</div>
						<div id="editItemsDIV">
								
						</div>
						<div class="form-group">
							<div class="col-md-12">
								<label>Notes: </label>
								<textarea id="editWorkorderNotesInput" class="form-control" name="workorder_notes" rows="4"></textarea>
							</div>
						</div>
						<div class="form-group">
							<div class="col-md-12">
								<label><i class="fas fa-paperclip text-primary"></i> Attachments</label><br>
								<ul id="editWorkorderFiles" class="attached-document clearfix m-0">
								</ul>
								<span class="btn btn-link p-0 fileinput-button">
								<span>Attach a file</span>
									<!-- The file input field used as target for the file upload widget -->
									<input id="editWorkorderFileUpload" type="file" name="file" multiple>
								</span>
							</div>
						</div>
					</div>
					<div class="panel-footer">
						<button id="editWorkorderBtn" class="btn btn-success pull-left">Edit work order</button>
						<button class="btn btn-danger pull-right" type="button" onClick="hideEditWorkorderPopup()">Close</button>
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
					<h4 class="panel-title">Location</h4>
				</div>
				<div class="panel-body p-0">
					<div id="map">
									
					</div>
				</div>
			</div>
		</div>
		<div class="popupContainer" id="itemPopup" hidden>
			<div class="panel panel-primary" id="addItemDIV" hidden>
				<div class="panel-heading">
					<div class="panel-heading-btn">
						<button onclick="hideAddItemPopup()" class="btn btn-xs btn-icon btn-circle btn-default"><i class="fa fa-times"></i>
						</button>
					</div>
					<h4 class="panel-title">New item</h4>
				</div>
				<div class="panel-body">
					<form id="addItemForm" action="<?= BASE_URL . "items/add" ?>" method="post" class="form-horizontal">
						<div class="form-group">
							<div class="col-md-12">
								<label>Item name: <span class="text-danger">*</span></label>
								<input type="text" class="form-control" name="item_name" placeholder="Item name" required />
							</div>
						</div>
						<div class="form-group">
							<div class="col-md-6">
								<label>Serial number:</label>
								<input type="text" class="form-control" name="item_serial" placeholder="Serial number" />
							</div>
							<div class="col-md-6">
								<label>Code:</label>
								<input type="text" class="form-control" name="item_code" placeholder="Item code" />
							</div>
						</div>
						<div class="form-group">
							<div class="col-md-6">
								<label>Item type:</label>
								<select class="form-control" name="item_type">
									<option value="Goods">Goods</option>
									<option value="Material">Material</option>
									<option value="Item">Item</label>
									<option value="Intermediate item">Intermediate item</label>
									<option value="Packaging">Packaging</option>
									<option value="Services">Services</option>
									<option value="Prepayment">Prepayment</option>
									<option value="Customers material">Customers material</option>
									<option value="Customers item">Customers item</option>
									<option value="Customers intermediate item">Customers intermediate item</option>
								</select>
							</div>
							<div class="col-md-3">
								<label>Unit of measurement: <span class="text-danger">*</span></label>
								<input type="text" class="form-control" name="item_unit" placeholder="Enter unit" required />
							</div>
						</div>
						<div class="form-group">
							<div class="col-md-3">
								<label>VAT: <span class="text-danger">*</span></label>
								<input type="number" class="form-control" name="item_vat" step="0.1" min="0" value="0.0" required />
							</div>
							<div class="col-md-3">
								<label>Price:</label>
								<input type="number" class="form-control" name="item_price" step="0.01" min="0" value="0.00" />
							</div>
							<div class="col-md-2">
								<label>Currency:</label>
								<select class="form-control" name="item_currency">
									<option value="EUR">EUR</option>
									<option value="USD">USD</option>
								</select>
							</div>
						</div>
						<div class="form-group">
							<div class="col-md-12">
								<label>Description: <span class="text-danger">*</span></label>
								<textarea class="form-control" rows="4" name="item_description" placeholder="Enter a short description here" required></textarea>
							</div>
						</div>
				</div>
				<div class="panel-footer">
						<button class="btn btn-success pull-left">Add item</button>
						<button class="btn btn-danger pull-right" type="button" onClick="hideAddItemPopup()">Close</button>
					</form>
				</div>
			</div>
			<div class="panel panel-primary" id="editItemDIV" hidden>
				<div class="panel-heading">
					<div class="panel-heading-btn">
						<button onclick="hideEditItemPopup()" class="btn btn-xs btn-icon btn-circle btn-default"><i class="fa fa-times"></i>
						</button>
					</div>
					<h4 class="panel-title">Edit item</h4>
				</div>
				<div class="panel-body">
					<form id="editItemForm" action="<?= BASE_URL . "items/edit" ?>" method="post" class="form-horizontal">
						<input type="hidden" id="editItemIDInput" name="item_id" />
						<div class="form-group">
							<div class="col-md-12">
								<label>Name: <span class="text-danger">*</span></label>
								<input type="text" class="form-control" name="item_name" placeholder="Item name" required />
							</div>
						</div>
						<div class="form-group">
							<div class="col-md-6">
								<label>Serial number:</label>
								<input type="text" class="form-control" name="item_serial" placeholder="Serial number" />
							</div>
							<div class="col-md-6">
								<label>Code:</label>
								<input type="text" class="form-control" name="item_code" placeholder="Item code" />
							</div>
						</div>
						<div class="form-group">
							<div class="col-md-9">
								<label>Item type:</label>
								<select class="form-control" name="item_type">
									<option value="Goods">Goods</option>
									<option value="Material">Material</option>
									<option value="Item">Item</label>
									<option value="Intermediate item">Intermediate item</label>
									<option value="Packaging">Packaging</option>
									<option value="Services">Services</option>
									<option value="Prepayment">Prepayment</option>
									<option value="Customers material">Customers material</option>
									<option value="Customers item">Customers item</option>
									<option value="Customers intermediate item">Customers intermediate item</option>
								</select>
							</div>
							<div class="col-md-3">
								<label>Unit of measurement: <span class="text-danger">*</span></label>
								<input type="text" class="form-control" name="item_unit" placeholder="Enter unit" required />
							</div>
						</div>
						<div class="form-group">
							<div class="col-md-3">
								<label>VAT: <span class="text-danger">*</span></label>
								<input type="number" class="form-control" name="item_vat" step="0.1" min="0" value="0.0" required />
							</div>
							<div class="col-md-3">
								<label>Price:</label>
								<input type="number" class="form-control" name="item_price" step="0.01" min="0" value="0.00" />
							</div>
							<div class="col-md-4">
								<label>Currency:</label>
								<select class="form-control" name="item_currency">
									<option value="EUR">EUR</option>
									<option value="USD">USD</option>
								</select>
							</div>
						</div>
						<div class="form-group">
							<div class="col-md-12">
								<label>Description: <span class="text-danger">*</span></label>
								<textarea class="form-control" rows="4" name="item_description" placeholder="Enter a short description here" required></textarea>
							</div>
						</div>
				</div>
				<div class="panel-footer">
						<button class="btn btn-success pull-left">Edit item</button>
						<button class="btn btn-danger pull-right" type="button" onClick="hideEditItemPopup()">Close</button>
					</form>
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
	<script src="<?= ASSETS_URL . "fullcalendar/lib/moment.min.js" ?>"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/js/bootstrap-datetimepicker.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/css/bootstrap-datetimepicker.min.css" rel="stylesheet"/>
	<script src="<?= ASSETS_URL . "select2/dist/js/select2.full.min.js" ?>"></script>
	<script src="<?= ASSETS_URL . "jquery-file-upload/js/jquery.fileupload.js" ?>"></script>
	
	<!-- ================== END PAGE LEVEL JS ================== -->
	
	<script>
	    var dTable;
		var itemsTable;
	    var loggedEmployee = <?php echo json_encode($_SESSION["id"]); ?>;
		
		var dateformat = <?php echo json_encode($_SESSION["dateformat"]); ?>;
		var timeformat = <?php echo json_encode($_SESSION["timeformat"]); ?>;
		
		var employeeArray = [];
		var customersArray = [];
		var subsidiariesArray = [];
		
		var map;
		var mapMarker;
		
		var workorderFiles = [];
		var editWorkorderFiles = [];
		
		var addItemSource = 0;
		var addItemID;
		
		var addItemCount = 0;
		var editItemCount = 0;
		
		var hideFinished = true;
		
		var displayChanged = false;
		
		$(document).ready(function() {
			App.init();
			getMenuStatistics(loggedEmployee);
			getItems();
			getEmployees();
			getCustomers();
			getSubsidiaries();
			setInterval(getWorkOrders, 30000);

			$(".date-picker-input").datetimepicker({format: dateformat, "defaultDate": new Date(), allowInputToggle: true });
			$("#employeeSelect, #editEmployeeSelect, #workorderCustomerSelect, #editWorkorderCustomerSelect, #workorderSubsidiarySelect, #editWorkorderSubsidiarySelect, #itemSelect, #editItemSelect").select2({width: "100%"});
			
			$("input[type=radio][name=hide_finished]").change(function(){
				var selectedValue = $(this).val();

				if (selectedValue == 1){
					hideFinished = false;
				}else{
					hideFinished = true;
				}
				displayChanged = true;
				getWorkOrders();
			});
			
			$('#newWorkorderForm').on('submit', function(e) { //use on if jQuery 1.7+
                e.preventDefault();
				var postData = $("#newWorkorderForm").serializeArray();
				postData.push({ name: 'files', value: workorderFiles });
				var startD = moment($("#workorderStartDateInput").val(), dateformat).format("YYYY-MM-DD");
				var endD = moment($("#workorderEndDateInput").val(), dateformat).format("YYYY-MM-DD");
				if (startD == endD || moment(startD).isBefore(moment(endD))){
					$.ajax({
						type: "POST",
						url: "workorders/add",
						data: postData,
						dataType: "json",
						success: function(response) {
							if (response.workorder_id != null) {
								swal(
									'Success',
									'Workorder added successfully', 
									'success'
								);
								getWorkOrders();
								hideNewWorkorderPopup();
							} else {
								swal(
									'Error!',
									'The server encountered the following error: ' + response,
									'error'
								);
							}
						}
					});
				}else{
					swal(
						'Error!',
						'Work order start date must be before end date',
						'error'
					);
				}
            });
			
			$('#editWorkorderForm').on('submit', function(e) { //use on if jQuery 1.7+
                e.preventDefault();
				var postData = $("#editWorkorderForm").serializeArray();
				postData.push({ name: 'files', value: editWorkorderFiles });
				var startD = moment($("#editWorkorderStartDateInput").val(), dateformat).format("YYYY-MM-DD");
				var endD = moment($("#editWorkorderEndDateInput").val(), dateformat).format("YYYY-MM-DD");
				if (startD == endD || moment(startD).isBefore(moment(endD))){
					$.ajax({
						type: "POST",
						url: "workorders/edit",
						data: postData,
						success: function(response) {
							if (response == "") {
								swal(
									'Success',
									'Workorder edited successfully', 
									'success'
								);
								getWorkOrders();
								hideEditWorkorderPopup();
							} else {
								swal(
									'Error!',
									'The server encountered the following error: ' + response,
									'error'
								);
							}
						}
					});
				}else{
					swal(
						'Error!',
						'Work order start date must be before end date',
						'error'
					);
				}
            });
			
			$('#addItemForm').on('submit', function(e) { //use on if jQuery 1.7+
                e.preventDefault();
                $.ajax({
                    type: "POST",
                    url: "items/add",
                    data: $("#addItemForm").serialize(),
					dataType: "json",
                    success: function(response) {
                        if (!response.error) {
                            swal(
                                'Success',
                                'Item added successfully', 
                                'success'
                            );
							addItemID = response.item_id;
							console.log(response);
							getItems();
                            hideAddItemPopup();
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
			
			$('#editItemForm').on('submit', function(e) { //use on if jQuery 1.7+
                e.preventDefault();
                $.ajax({
                    type: "POST",
                    url: "items/edit",
                    data: $("#editItemForm").serialize(),
                    success: function(response) {
                        if (response == "") {
                            swal(
                                'Success',
                                'Item edited successfully', 
                                'success'
                            );
							getItems();
                            hideEditItemPopup();
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
			
			$('#workorderCustomerSelect').on('change', function() {
                  var customer_id = this.value;
				  if (customer_id != ""){
					  for (var i = 0; i < customersArray.length; i++){
						  var curCustomer = customersArray[i];
						  if (curCustomer.customer_id == customer_id){
							$("#hiddenWorkorderLatitudeInput").val(curCustomer.latitude);
							$("#hiddenWorkorderLongitudeInput").val(curCustomer.longitude);
							$("#workorderLocationInput").val(curCustomer.customer_address);
							$("#workorderSubsidiarySelect").html("");
							$("#workorderSubsidiarySelect").append($('<option>', {
								value: "",
								text: "Main company"
							}));
							for (var j = 0; j < subsidiariesArray.length; j++){
								var subsidiary = subsidiariesArray[j];
								if (subsidiary.customer_id == curCustomer.customer_id){
									$("#workorderSubsidiarySelect").append($('<option>', {
										value: subsidiary.subsidiary_id,
										text: subsidiary.subsidiary_name
									}));
								}
							}
							break;
						  }
					  }
				  }else{
					  $("#workorderSubsidiarySelect").html("");
					  $("#workorderSubsidiarySelect").append($('<option>', {
								value: "",
								text: "None"
					  }));
				  }
            });
			
			$("#workorderSubsidiarySelect").on("change", function(){
				var subsidiary_id = this.value;
				if (subsidiary_id != ""){
					for (var i = 0; i < subsidiariesArray.length; i++){
						var subsidiary = subsidiariesArray[i];
						if (subsidiary.subsidiary_id == subsidiary_id){
							$("#hiddenWorkorderLatitudeInput").val(subsidiary.latitude);
							$("#hiddenWorkorderLongitudeInput").val(subsidiary.longitude);
							$("#workorderLocationInput").val(subsidiary.subsidiary_address);
							break;
						}
					}
				}else{
					$("#workorderCustomerSelect").trigger("change");
				}
			});
			
			$('#editWorkorderCustomerSelect').on('change', function() {
                  var customer_id = this.value;
				  if (customer_id != ""){
					  for (var i = 0; i < customersArray.length; i++){
						  var curCustomer = customersArray[i];
						  if (curCustomer.customer_id == customer_id){
							$("#hiddenEditWorkorderLatitudeInput").val(curCustomer.latitude);
							$("#hiddenEditWorkorderLongitudeInput").val(curCustomer.longitude);
							$("#editWorkorderLocationInput").val(curCustomer.customer_address);
							$("#editWorkorderSubsidiarySelect").html("");
							$("#editWorkorderSubsidiarySelect").append($('<option>', {
								value: "",
								text: "Main company"
							}));
							for (var j = 0; j < subsidiariesArray.length; j++){
								var subsidiary = subsidiariesArray[j];
								if (subsidiary.customer_id == curCustomer.customer_id){
									$("#editWorkorderSubsidiarySelect").append($('<option>', {
										value: subsidiary.subsidiary_id,
										text: subsidiary.subsidiary_name
									}));
								}
							}
							break;
						  }
					  }
				  }else{
					  $("#editWorkorderSubsidiarySelect").html("");
					  $("#editWorkorderSubsidiarySelect").append($('<option>', {
								value: "",
								text: "None"
					  }));
				  }
            });
			
			$("#editWorkorderSubsidiarySelect").on("change", function(){
				var subsidiary_id = this.value;
				if (subsidiary_id != ""){
					for (var i = 0; i < subsidiariesArray.length; i++){
						var subsidiary = subsidiariesArray[i];
						if (subsidiary.subsidiary_id == subsidiary_id){
							$("#hiddenEditWorkorderLatitudeInput").val(subsidiary.latitude);
							$("#hiddenEditWorkorderLongitudeInput").val(subsidiary.longitude);
							$("#editWorkorderLocationInput").val(subsidiary.subsidiary_address);
							break;
						}
					}
				}else{
					$("#editWorkorderCustomerSelect").trigger("change");
				}
			});
			
			$('#workorderFileUpload').fileupload({
               url: "workorders/upload",
               dataType : 'json',
               add : function(e,data){
                    $.each(data.files, function (index, file) {
						$("#files").append('<li class="fa-file">' +
											'<div class="document-file">' +
												'<a href="' + "<?= UPLOADS_URL ?>" + "OtherFiles/" + file.name + '" download="' + file.name  + '" ><i class="fa fa-file-image"></i></a>' +
											'</div>' +
											'<div class="document-name"><a href="' + "<?= UPLOADS_URL ?>" + "OtherFiles/" + file.name  + '" download="' + file.name  + '" >' + file.name  + '</a></div>' +
										'</li>');
                    });
					$("#addWorkorderBtn").html('<i class="fa fa-spinner fa-spin"></i> Uploading file...');
                    $("#addWorkorderBtn").prop("disabled", true);
                    data.submit();
               },
               
               done: function(e,data){
                   if (!data.result.error){
                       workorderFiles.push(data.result.filename);
                   }else{
					   swal(
							'Error!',
							'The server encountered the following error: ' + data.result.message,
							'error'
						);
                   }
				   $("#addWorkorderBtn").html("Create work order");
                   $("#addWorkorderBtn").prop("disabled", false);
               }
            });
            
            $('#editWorkorderFileUpload').fileupload({
               url: "workorders/upload",
               dataType : 'json',
               add : function(e,data){
                    $.each(data.files, function (index, file) {
                        $("#editWorkorderFiles").append('<li class="fa-file">' +
											'<div class="document-file">' +
												'<a href="' + "<?= UPLOADS_URL ?>" + "OtherFiles/" + file.name + '" download="' + file.name  + '" ><i class="fa fa-file-image"></i></a>' +
											'</div>' +
											'<div class="document-name"><a href="' + "<?= UPLOADS_URL ?>" + "OtherFiles/" + file.name  + '" download="' + file.name  + '" >' + file.name  + '</a></div>' +
										'</li>');
                    });
					$("#editWorkorderBtn").html('<i class="fa fa-spinner fa-spin"></i> Uploading file...');
                    $("#editWorkorderBtn").prop("disabled", true);
                    data.submit();
               },
               
               done: function(e,data){
                   if (!data.result.error){
                       editWorkorderFiles.push(data.result.filename);
                   }else{
                       swal(
							'Error!',
							'The server encountered the following error: ' + data.result.message,
							'error'
						);
                   }
				   $("#editWorkorderBtn").html('Edit work order');
                   $("#editWorkorderBtn").prop("disabled", false);
               }
            });
		});
		
		function viewCustomer(row){
            var actualRow = $(row).parents('tr');
			if (actualRow.hasClass('child')) {//Check if the current row is a child row
				actualRow = actualRow.prev();//If it is, then point to the row before it (its 'parent')
			}
            var event = dTable.row(actualRow).data();
            var customer_id = event.customer_id;
            var url = "<?= BASE_URL ?>" + "customerdetails?customer_id=" + customer_id;
		    window.open(url, "_blank");
        }
		
		function initMap(){
			var myOptions = {
                zoom: parseInt(14),
                center: new google.maps.LatLng(46.053517, 14.505625),
                mapTypeId: google.maps.MapTypeId.ROADMAP
            };
            
            map = new google.maps.Map(document.getElementById('map'), myOptions);
			
            var searchBox = new google.maps.places.SearchBox(document.getElementById('workorderLocationInput'));
            var editSearchBox = new google.maps.places.SearchBox(document.getElementById('editWorkorderLocationInput'));
            
            google.maps.event.addListener(searchBox, 'places_changed', function() {
                var places = searchBox.getPlaces();
                var i, place;
                for (i = 0; place = places[i]; i++) {
                    (function(place) {
                        var location = place.geometry.location;
                        $("#hiddenWorkorderLatitudeInput").val(location.lat());
                        $("#hiddenWorkorderLongitudeInput").val(location.lng());
                    }(place));
                }
            });
            
            google.maps.event.addListener(editSearchBox, 'places_changed', function() {
                var places = editSearchBox.getPlaces();
                var i, place;
                for (i = 0; place = places[i]; i++) {
                    (function(place) {
                        var location = place.geometry.location;
                        $("#hiddenEditWorkorderLatitudeInput").val(location.lat());
                        $("#hiddenEditWorkorderLongitudeInput").val(location.lng());
                    }(place));
                }
            });
            
		}
		
		function addItem(){
		    $("#itemsDIV").append('<div class="form-group"><div class="col-md-9">' +
									'<select id="select' + addItemCount + '" class="form-control" name="items[]" required>' +
										$("#itemSelect").html() + 
									'</select>' +
									'</div>' +
									'<div class="col-md-2">' +
										'<input type="number" class="form-control" name="item_amount[]" min="0.1" step="0.1" value="1" />' +
									'</div>' +
									'<div class="col-md-1 p-0">' +
										'<button type="button" class="btn btn-link text-danger" onClick="removeParentDIV(this)"><i class="fa fa-trash"></i></button>' +
									'</div>' +
								'</div>');
			$("#select" + addItemCount).select2({width: "100%"});
			addItemCount++;
		}
		
		function addEditItem(){
			$("#editItemsDIV").append('<div class="form-group"><div class="col-md-9">' +
									'<select id="select' + editItemCount + '" class="form-control" name="items[]" required>' +
										$("#itemSelect").html() + 
									'</select>' +
									'</div>' +
									'<div class="col-md-2">' +
										'<input type="number" class="form-control" name="item_amount[]" min="0.1" step="0.1" value="1" />' +
									'</div>'+
									'<div class="col-md-1 p-0">' +
										'<button type="button" class="btn btn-link text-danger" onClick="removeParentDIV(this)"><i class="fa fa-trash"></i></button>' +
									'</div>' +
								'</div>');
			$("#select" + editItemCount).select2({width: "100%"});
			editItemCount++;
		}
		
		function removeParentDIV(btn){
			$(btn).closest(".form-group").remove();
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
                                $("#employeeSelect, #editEmployeeSelect").append("<optgroup label='" + employees[i].department_name + "'>");
                                lastDepartment = employees[i].department_name;
                            }else if (employees[i].department_name != lastDepartment){
                                $("#employeeSelect, #editEmployeeSelect").append("</optgroup><optgroup label='" + employees[i].department_name + "'>");
                                lastDepartment = employees[i].department_name;
                            }
                            $("#employeeSelect, #editEmployeeSelect").append($('<option>', {
                                value: employees[i].employee_id,
                                text: employees[i].employee_name + " " + employees[i].employee_surname
                            }));
                    }
                    $("#employeeSelect, #editEmployeeSelect").append("</optgroup>");
					getWorkOrders();
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
                        $("#editWorkorderCustomerSelect, #workorderCustomerSelect").append($('<option>', {
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
		
		function showNewWorkorderPopup(){
			$("#newWorkorderForm input[name=start_date], #newWorkorderForm input[name=end_date]").val(moment().format(dateformat));
			$("#workorderPopup, #newWorkorderDIV").show();
		}
		
		function hideNewWorkorderPopup(){
			$("#newWorkorderForm")[0].reset();
			$("#employeeSelect").val("").trigger("change");
			addItemCount = 0;
			$("#itemsDIV").html("");
			workorderFiles = [];
			$("#files").html("");
			$("#workorderPopup, #newWorkorderDIV").hide();
		}
		
		function markWorkorderAsOpened(workorder_id){
			var postData = { "workorder_id": workorder_id };
            $.ajax({
                type: "POST",
                url: "<?= BASE_URL ?>" + "workorders/opened",
                data: postData,
                success: function(msg) {
                    console.log("Work order opened" + msg);
                }
            });
		}
		
		function showEditWorkorderPopup(row){
			var actualRow = $(row).parents('tr');
			if (actualRow.hasClass('child')) {//Check if the current row is a child row
				actualRow = actualRow.prev();//If it is, then point to the row before it (its 'parent')
			}
            var workorder = dTable.row(actualRow).data();
			if (workorder.opened_on == ""){
				markWorkorderAsOpened(workorder.workorder_id);
			}
			var postData = { workorder_id: workorder.workorder_id };
			$.ajax({
                type: "POST",
                url: "<?= BASE_URL ?>" + "workorders/getitems",
                data: postData,
				dataType: "json",
                success: function(items) {
					for (var i = 0; i < items.length; i++){
						if (i == 0){
							$("#editItemSelect").val(items[i].item_id).trigger("change");
							$("#editItemAmountInput").val(items[i].item_amount);
						}else{
							$("#editItemsDIV").append('<div class="form-group"><div class="col-md-9">' +
									'<select id="editItemSelect' + i + '" class="form-control" name="items[]" required>' +
										$("#editItemSelect").html() + 
									'</select>' +
									'</div>' +
									'<div class="col-md-2">' +
										'<input type="number" class="form-control" name="item_amount[]" min="0.1" step="0.1" value="' + items[i].item_amount + '" />' +
									'</div>' +
									'<div class="col-md-1 p-0">' +
											'<button type="button" class="btn btn-link text-danger" onClick="removeParentDIV(this)"><i class="fa fa-trash"></i></button>' +
									'</div>' +
								'</div>');
							$("#editItemSelect" + i).select2({width: "100%"});
							$("#editItemSelect" + i).val(items[i].item_id).trigger("change");
						}
					}
					$("#workorderPopup, #editWorkorderDIV").show();
				}
			});
			$("#editWorkorderForm input[name=workorder_id]").val(workorder.workorder_id);
			$("#editWorkorderForm input[name=priority]").val([workorder.priority]);
			$("#editWorkorderForm input[name=status]").val([workorder.status]);
			$("#editWorkorderSubjectInput").val(workorder.workorder_subject);
			$("#editEmployeeSelect").val(workorder.assigned_to.split(",")).trigger("change");
			$("#editWorkorderStartDateInput").val(moment(workorder.workorder_startdate).format(dateformat));
			$("#editWorkorderEndDateInput").val(moment(workorder.workorder_enddate).format(dateformat));
			$("#editWorkorderCustomerSelect").val(workorder.customer_id).trigger("change");
			$("#editWorkorderSubsidiarySelect").val(workorder.subsidiary_id).trigger("change");
			$("#editWorkorderLocationInput").val(workorder.workorder_location);
			$("#editWorkOrderForm input[name=latitude]").val(workorder.latitude);
			$("#editWorkOrderForm input[name=longitude]").val(workorder.longitude);
			$("#editWorkorderNotesInput").html(workorder.workorder_notes);
			
			var fileContent = "";
            var files = workorder.workorder_files.split(";");
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
			$("#editWorkorderFiles").html(fileContent);
		}
		
		function hideEditWorkorderPopup(){
			$("#editWorkorderForm")[0].reset();
			editItemCount = 0;
			$("#editItemsDIV").html("");
			editWorkorderFiles = [];
			$("#editWorkorderFiles").html("");
			$("#workorderPopup, #editWorkorderDIV").hide();
		}
		
		function showAddItemPopup(source){
			addItemSource = source;
			if (addItemSource == 1){
				$("#workorderPopup, #newWorkorderDIV").hide();
			}
			if (addItemSource == 2){
				$("#workorderPopup, #editWorkorderDIV").hide();
			}
			$("#itemPopup, #addItemDIV").show();
		}
		
		function hideAddItemPopup(){
			$("#addItemForm")[0].reset();
			if (addItemSource == 1){
				$("#workorderPopup, #newWorkorderDIV").show();
				addItemSource = 0;
			}
			if (addItemSource == 2){
				$("#workorderPopup, #editWorkorderDIV").show();
				addItemSource = 0;
			}
			$("#itemPopup, #addItemDIV").hide();
		}
		
		function showEditItemPopup(row){
			var actualRow = $(row).parents('tr');
			if (actualRow.hasClass('child')) {//Check if the current row is a child row
				actualRow = actualRow.prev();//If it is, then point to the row before it (its 'parent')
			}
            var item = itemsTable.row(actualRow).data();
			$("#editItemForm input[name=item_id]").val(item.item_id);
			$("#editItemForm input[name=item_name]").val(item.item_name);
			$("#editItemForm input[name=item_serial]").val(item.item_serial);
			$("#editItemForm input[name=item_code]").val(item.item_code);
			$("#editItemForm input[name=item_type]").val(item.item_type);
			$("#editItemForm input[name=item_unit]").val(item.item_unit);
			$("#editItemForm input[name=item_vat]").val(item.item_vat);
			$("#editItemForm input[name=item_price]").val(item.item_price);
			$("#editItemForm textarea[name=item_description]").html(item.item_description);
			$("#itemPopup, #editItemDIV").show();
		}
		
		function hideEditItemPopup(){
			$("#editItemForm")[0].reset();
			$("#itemPopup, #editItemDIV").hide();
		}
		
		function getItems(){
			$.ajax({
                type: "POST",
                url: "<?= BASE_URL ?>" + "items/get",
                data: null,
                dataType: "json",
                success: function(items) {
					$("#itemSelect, #editItemSelect").html("");
					$("#itemSelect, #editItemSelect").append($('<option>', {
                            value: "",
                            text: "Choose an item"
                    }));
					for (var i = 0; i < items.length; i++){
						$("#itemSelect, #editItemSelect").append($('<option>', {
                            value: items[i].item_id,
                            text: items[i].item_name
                        }));
					}
					if (addItemSource == 1){
						$("#workorderPopup, #newWorkorderDIV").show();
						addItemSource = 0;
					}
					if (addItemSource == 2){
						$("#workorderPopup, #editWorkorderDIV").show();
						addItemSource = 0;
					}
					if (itemsTable != null){
                        itemsTable.clear().rows.add(items).draw(false);
                    }else{
						itemsTable = $('#itemsTable').DataTable({
							initComplete: function () {
								this.api().columns([3,4,7,8]).every(function (index) {
									var column = this;
									var name;
										if (index == 3){
											name = "Type";
										}else if (index == 4){
											name = "Unit";
										}else if (index == 7){
											name = "Currency";
										}else{
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
										});

									column.cells('', column[0]).render('display').sort().unique().each( function ( d, j ) {
										select.append( '<option value="'+d+'">'+d+'</option>' )
									});
								});
							},
							"aaData": items,
							"columns": [
								{ "data": "item_name" },
								{ "data": "item_serial" },
								{ "data": "item_code" },
								{ "data": "item_type" },
								{ "data": "item_unit" },
								{ "data": "item_vat" },
								{ "data": "item_price" },
								{ "data": "item_currency" },
								{ "data": "employee_id" },
								{ "data": "created_on" },
								{ "defaultContent": '<span title="Edit item" class="text-primary pointer pull-left" onClick="showEditItemPopup(this)"><i class="fas fa-pencil-alt"></i></span><span title="Delete item" class="text-danger pointer pull-left m-l-10" onClick="deleteItem(this)"><i class="fa fa-trash"></i></span>'}
							],
							"columnDefs": [
								{
									"targets": 3,
									orderable: false
								},
								{
									"targets": 4,
									orderable: false
								},
								{
									// The `data` parameter refers to the data for the cell (defined by the
									// `data` option, which defaults to the column being worked with, in
									// this case `data: 0`.
									"render": function ( data, type, row ) {
										return data + "%";
									},
									"targets": 5
								},
								{
									"targets": 7,
									orderable: false
								},
								{
									// The `data` parameter refers to the data for the cell (defined by the
									// `data` option, which defaults to the column being worked with, in
									// this case `data: 0`.
									"render": function ( data, type, row ) {
										return row.employee_name + " " + row.employee_surname;
									},
									"targets": 8,
									orderable: false
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
									"targets": 10,
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
				}
			});
		}
		
		function getWorkOrders() {
			$.ajax({
				type: "POST",
				url: "<?= BASE_URL ?>" + "workorders/get",
				data: null,
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
						if (displayChanged){
								dTable.columns([2,3,4,5,8]).every(function(index) {
									var column = this;
									var name;
									if (index == 2) {
										name = "Priority";
									} else if (index == 3) {
										name = "Assigned to";
									} else if (index == 4) {
										name = "Customer";
									} else if (index == 5) {
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
												.search(val, true, false)
												.draw();
										});
									column.cells('', column[0]).render('display').sort().unique().each(function(d, j) {
										select.append('<option value="' + d + '">' + d + '</option>')
									});
								});
								dTable.search('').columns().search('').draw(false);
								displayChanged = false;
						}
					} else {
						var activeWorkorders = [];
						for (var i = 0; i < workorders.length; i++){
							if (workorders[i].status < 2){
									activeWorkorders.push(workorders[i]);
							}
						}
						console.log(activeWorkorders);
						dTable = $('#workOrderTable').DataTable({
							"aaData": activeWorkorders,
							initComplete: function() {
								this.api().columns([2,3,4,5,8]).every(function(index) {
									var column = this;
									var name;
									if (index == 2) {
										name = "Priority";
									} else if (index == 3) {
										name = "Assigned to";
									} else if (index == 4) {
										name = "Customer";
									} else if (index == 5) {
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
												.search(val, true, false)
												.draw();
										});
									if (index != 3){
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
							"columns": [
								{
									"data": "workorder_code"
								},
								{
									"data": "workorder_subject"
								},
								{ 
									"data": "priority"
								},
								{
									"data": "assigned_to"
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
										"targets": 2,
										"orderable": false
								},
								{
									"render": function(data, type, row) {
										return getEmployeeString(data);
									},
									"targets": 3,
									orderable: false
								},
								{
									"render": function(data, type, row) {
										if (data != null){
											return "<span class='text-primary hover-underline text-ellipsis' onClick='viewCustomer(this)'>" + data + '</span>';
										}else{
											return "";
										}
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
									// The `data` parameter refers to the data for the cell (defined by the
									// `data` option, which defaults to the column being worked with, in
									// this case `data: 0`.
									"render": function(data, type, row) {
										if (type === 'display' || type === 'filter') {
											return moment(data).format(dateformat);
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
										if (type === 'display' || type === 'filter') {
											return moment(data).format(dateformat);
										} else {
											return data;
										}
									},
									"targets": 7
								},
								{
									"render": function(data, type, row) {
										if (data == 0) {
											return "<label class='label label-warning'>Incomplete</label>";
										} else if (data == 1) {
											return "<label class='label label-primary'>In progress</label>";
										} else if (data == 2) {
											return "<label class='label label-success'>Completed</label>";
										} else {
											return "<label class='label label-danger'>Canceled</label>";
										}
									},
									"targets": 8,
									orderable: false
								},
								{
									"render": function(data, type, row) {
										var mapBtn = "";
										if (row.event_address != ""){
											mapBtn = '<span onClick="showMapPopup(this)" class="text-primary pointer pull-left m-l-10" data-toggle="tooltip" title="View on map"><i class="fas fa-map-marker-alt text-success"></i></span>';
										}
										return '<span data-toggle="tooltip" title="Edit work order" class="text-primary pointer pull-left" onClick="showEditWorkorderPopup(this)"><i class="fas fa-pencil-alt"></i></span><span onClick="showWorkOrderPage(this)" data-toggle="tooltip" title="View workorder" class="text-primary pull-left pointer m-l-10"><i class="fas fa-briefcase"></i></span>' + mapBtn + '<span onClick="deleteWorkOrder(this)" data-toggle="tooltip" title="Delete work order" class="text-danger pointer pull-left m-l-10"><i class="fa fa-trash"></i></span>';
									},
									"targets": 9,
									"orderable": false
								}
							],
							"order": [[ 6, "desc" ]],
							responsive: true,
							dom: 'lfrtipB',
							buttons: [{
									extend: 'copy',
									className: 'btn-sm btn-primary',
									exportOptions: {
										format: {
											header: function ( data, column, row ) {
												if (column == 2) {
													data = "Priority";
												} else if (column == 3) {
													data = "Assigned to";
												} else if (column == 4) {
													data = "Customer";
												} else if (column == 5) {
													data = "Subsidiary";
												} else if (column == 8) {
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
												if (column == 2) {
													data = "Priority";
												} else if (column == 3) {
													data = "Assigned to";
												} else if (column == 4) {
													data = "Customer";
												} else if (column == 5) {
													data = "Subsidiary";
												} else if (column == 8) {
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
												if (column == 2) {
													data = "Priority";
												} else if (column == 3) {
													data = "Assigned to";
												} else if (column == 4) {
													data = "Customer";
												} else if (column == 5) {
													data = "Subsidiary";
												} else if (column == 8) {
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
												if (column == 2) {
													data = "Priority";
												} else if (column == 3) {
													data = "Assigned to";
												} else if (column == 4) {
													data = "Customer";
												} else if (column == 5) {
													data = "Subsidiary";
												} else if (column == 8) {
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
												if (column == 2) {
													data = "Priority";
												} else if (column == 3) {
													data = "Assigned to";
												} else if (column == 4) {
													data = "Customer";
												} else if (column == 5) {
													data = "Subsidiary";
												} else if (column == 8) {
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
            var workorder = dTable.row(actualRow).data();
            var url = "<?= BASE_URL ?>" + "workorderdetails?workorder_id=" + workorder.workorder_id;
		    window.open(url, "_blank");
        }
		
		function showMapPopup(row){
            var actualRow = $(row).parents('tr');
			if (actualRow.hasClass('child')) {//Check if the current row is a child row
				actualRow = actualRow.prev();//If it is, then point to the row before it (its 'parent')
			}
            var workorder = dTable.row(actualRow).data();
			
			console.log(workorder);
            
            if (mapMarker != null){
                mapMarker.setMap(null);
            }
            
            mapMarker = new google.maps.Marker({
                position: new google.maps.LatLng(workorder.latitude, workorder.longitude),
                map: map,
                title: 'Work order location'
            });
            
            var infoWindowContent = "<p class='f-s-12'><h5>" + workorder.workorder_subject + "</h5><strong>Address: </strong>" + workorder.workorder_location + "</p>";
            addInfoWindow(map, mapMarker, infoWindowContent);
            $("#mapPopup, #mapDIV").show();
            google.maps.event.trigger(map, 'resize');
            map.setZoom(map.getZoom());
            map.setCenter({lat: parseFloat(workorder.latitude), lng: parseFloat(workorder.longitude)});
        }
		
		function hideMapPopup(){
            $("#mapPopup, #mapDIV").hide();
        }
		
		function addInfoWindow(gMap, marker, message) {
            var infoWindow = new google.maps.InfoWindow({
                content: message
            });

            google.maps.event.addListener(marker, 'click', function () {
                infoWindow.open(gMap, marker);
            });
            
            infoWindow.open(gMap, marker);
        }
		
		function deleteWorkOrder(row) {
            var workorder = dTable.row($(row).parents('tr')).data();
            swal({
              title: 'Confirm action',
              text: "Are you sure you want to remove this work order?",
              type: 'error',
              showCancelButton: true,
              confirmButtonColor: '#3085d6',
              cancelButtonColor: '#d33',
              confirmButtonText: 'Yes, remove'
            }).then(function () {
                var values = { workorder_id: workorder.workorder_id };
                $.ajax({
                    type: "POST",
                    url: "workorders/delete",
                    data: values,
                    success: function(msg) {
                        if (msg == "") {
                            swal(
                                'Success!',
                                'Work order was successfully removed.',
                                'success'
                            );
                            getWorkOrders();
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
		
		function deleteItem(row) {
            var actualRow = $(row).parents('tr');
			if (actualRow.hasClass('child')) {//Check if the current row is a child row
				actualRow = actualRow.prev();//If it is, then point to the row before it (its 'parent')
			}
            var item = itemsTable.row(actualRow).data();
            swal({
              title: 'Confirm action',
              text: "Are you sure you want to remove this item?",
              type: 'error',
              showCancelButton: true,
              confirmButtonColor: '#3085d6',
              cancelButtonColor: '#d33',
              confirmButtonText: 'Yes, remove'
            }).then(function () {
                var values = { item_id: item.item_id };
                $.ajax({
                    type: "POST",
                    url: "items/delete",
                    data: values,
                    success: function(msg) {
                        if (msg == "") {
                            swal(
                                'Success!',
                                'Item was successfully removed.',
                                'success'
                            );
                            getItems();
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
	<script async defer src="https://maps.googleapis.com/maps/api/js?v=3&key=AIzaSyDC7Pj2_CZRL3p1eJy1HdL0EFtO70D7JvI&callback=initMap&language=en&libraries=places"></script>
</body>
</html>
