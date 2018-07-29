<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
<!--<![endif]-->
<head>
	<meta charset="utf-8" />
	<title>Customers</title>
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
	<!-- ================== END PAGE LEVEL STYLE ================== -->
	
	<!-- ================== BEGIN BASE JS ================== -->
	<script src="<?= ASSETS_URL . "pace/pace.min.js" ?>" ></script>
	<!-- ================== END BASE JS ================== -->
</head>
<style>
    .blueSpan{
        font-size: 20px;
        color: #007aff;
        cursor: pointer;
        margin-top: -4px;
    }
    
    .orangeSpan{
        font-size: 20px;
        color: #FF9500;
        cursor: pointer;
        margin-top: -4px;
    }
    
    .greenSpan{
        font-size: 20px;
        color: #4CD964;
        cursor: pointer;
        margin-top: -4px;
    }
    
    .redSpan{
        font-size: 20px;
        color: #FF3B30;
        cursor: pointer;
        margin-top: -3px;
    }
    
    .negativeTop{
        margin-top: -4px !important;
    }
    
    #customersTable{
        width: 100% !important;
    }
    
    
    #addCustomerDIV, #editCustomerDIV, #addContactDIV, #mapDIV, #addSubsidiaryDIV{
        width: 800px;
        height: auto;
        position: relative;
        margin: 5% auto 0px auto;
    }
    
    #map{
        width: 100%;
        height: 500px;
    }
    
    #bigMap{
        width: 100%;
        height: 75vh;
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
    
    .pac-container {
        z-index: 10000 !important;
    }
    
    .pointer{
        cursor: pointer;
    }
    
    .hover-underline:hover{
        cursor: pointer;
        text-decoration: underline;
    }
	
	#customersTable td:last-child{
		min-width: 125px;
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
			<div class="profile">
				<div class="profile-header profile-header-no-image">
					<!-- BEGIN profile-header-cover -->
					<div class="profile-header-cover"></div>
					<!-- END profile-header-cover -->
					<!-- BEGIN profile-header-content -->
					<div class="profile-header-content">
						
						<!-- BEGIN profile-header-info -->
						<div class="profile-header-info">
							<h4 class="m-t-10 m-b-5">Customers</h4>
							<div class="m-t-10">
								<button class="btn btn-white btn-sm" onclick="showNewCustomerPopup()"><i class="fas fa-plus text-primary"></i> Add a customer</button>
								<button class="btn btn-white btn-sm pull-right" onClick="importCustomers()"><i class="fas fa-upload text-success"></i> Import from CSV</button>
							</div>
						</div>
						<!-- END profile-header-info -->
					</div>
					<!-- END profile-header-content -->
					<!-- BEGIN profile-header-tab -->
					<ul class="profile-header-tab nav nav-tabs">
						<li class="nav-item active"><a href="#customers-overview" class="nav-link" data-toggle="tab">OVERVIEW</a></li>
						<li class="nav-item"><a href="#customers-map" class="nav-link" data-toggle="tab">CUSTOMERS MAP</a></li>
					</ul>
					<!-- END profile-header-tab -->
				</div>
			</div>
			<!-- end profile -->
            <div class="profile-content">
				<div class="tab-content">
					<div class="tab-pane fade in active" id="customers-overview">
						<div class="row">
							<div class="col-md-12">
								<div class="panel panel-primary">
									<div class="panel-heading">
										<div class="panel-heading-btn">
											<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
											<a href="getCustomers()" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-repeat"></i></a>
											<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
											<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
										</div>
										<h4 class="panel-title">Customers</h4>
									</div>
									<div class="panel-body">
										<div class="dataTables_wrapper form-inline dt-bootstrap no-footer">
											<table id="customersTable" class="table table-striped">
												<thead>
													<tr>
														<th>Name</th>
														<th>Main phone number</th>
														<th>E-mail</th>
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
								<div id="wizardDIV" class="bg-white p-15 m-t-15" hidden>
											<div id="wizard">
												<ol>
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
														<legend class="pull-left width-full">Import CSV</legend>
														<form id="importCSVForm" action="<?= BASE_URL . "csv/import" ?>" method="post" enctype="multipart/form-data" class="form-horizontal box has-advanced-upload">
															<div class="form-group">
																<div class="col-md-12">
																	<label for="file" class="box__label"><strong class="hover-label">Choose a file</strong><span> or drag it here</span>.</label>
																	<input type="file" name="csv" id="file" class="box__file" required/>
																</div>
															</div>
															<button class="btn material danger btn-centered">Upload file</button>
														</form>
													</fieldset>
												</div>
												<div class="wizard-step-2">
													<fieldset>
														<legend class="pull-left width-full">Import results</legend>
														<h4>Example data from file</h4>
														<table id="exampleDataTable" class="table table-striped">
															
														</table>
														<h4>Setup import fields</h4>
														<form id="csvFieldsForm" action="<?= BASE_URL . "customers/import" ?>" method="post" enctype="multipart/form-data" class="form-horizontal">
															<div class="form-group">
																<div class="col-md-4">
																	<label>Name or title: <span class="red">*</span>
																	</label>
																	<select name="customer_name" class="form-control import-select" required >
																	</select>
																</div>
																<div class="col-md-4">
																	<label>Phone number: <span class="red">*</span>
																	</label>
																	<select id="importPhoneSelect" name="customer_phone" class="form-control import-select" required >
																	</select>
																</div>
																<div class="col-md-4">
																	<label>E-Mail: <span class="red">*</span>
																	</label>
																	<select id="importEmailSelect" name="customer_email" class="form-control import-select" required >
																	</select>
																</div>
															</div>
															<div class="form-group">
																<div class="col-md-4">
																	<label>Website:</label>
																	<select id="importWebsiteSelect" name="customer_website" class="form-control import-select" >
																		<option value="-1">Leave empty</option>
																	</select>
																</div>
																<div class="col-xs-12 col-sm-6 col-md-4">
																	<label>Address: <span class="red">*</span>
																	</label>
																	<select id="importAddressSelect" name="customer_address" class="form-control import-select" required >
																	</select>
																</div>
																<div class="col-xs-12 col-sm-6 col-md-4">
																	<label>Key account manager:</label>
																	<select id="importEmployeeSelect" name="employee_id" class="form-control import-select" required>
																		<option value="">Choose default manager</option>
																	</select>
																</div>
															</div>
															<div class="form-group">
																<div class="col-md-4">
																	<label>Address latitude: <span class="red">*</span></label>
																	<select id="importLatitudeSelect" name="customer_latitude" class="form-control import-select" required >
																	</select>
																</div>
																<div class="col-md-4">
																	<label>Address longitude: <span class="red">*</span></label>
																	<select id="importLongitudeSelect" name="customer_longitude" class="form-control import-select" required >
																	</select>
																</div>
															</div>
															<div class="form-group">
																<div class="col-md-4">
																	<label>Industry: </label>
																	<select id="importIndustrySelect" name="customer_industry" class="form-control import-select">
																		<option value="-1">Other</option>
																	</select>
																</div>
																<div class="col-md-4">
																	<label>Notes: </label>
																	<select id="importNotesSelect" name="customer_notes" class="form-control import-select" required >
																	</select>
																</div>
															</div>
															<button class="btn material primary">Finalize import</button>
														</form>
													</fieldset>
												</div>
												<div class="wizard-step-3">
													<fieldset>
														<legend class="pull-left width-full">Finalization</legend>
														<p class="f-s-20">Import completed, please refresh the page to view the results :)</p>
													</fieldset>
												</div>
											</div>
										</div>
							</div>
						</div>
					</div>
					<div class="tab-pane fade" id="customers-map">
						<div id="bigMap">
							
						</div>
					</div>
				</div>
			</div>
            <div class="popupContainer" id="customerPopupDIV" hidden>
                <div class="panel panel-primary" id="addCustomerDIV" hidden>
                    <div class="panel-heading">
                        <div class="panel-heading-btn">
                            <button onclick="hideNewCustomerPopup()" class="btn btn-xs btn-icon btn-circle btn-default"><i class="fa fa-times"></i>
                            </button>
                        </div>
                        <h4 class="panel-title">Add a customer</h4>
                    </div>
                    <div class="panel-body">
                        <form id="addCustomerForm" action="<?= BASE_URL . " customer/add " ?>" method="post" class="form-horizontal">
                            <input type="hidden" id="newCustomerLatitudeInput" name="latitude" />
                            <input type="hidden" id="newCustomerLongitudeInput" name="longitude" />
                            <div class="form-group">
                                <div class="col-md-6">
                                    <label>Search for companies:</label>
                                    <div class="input-group">
                                      <input id="vatInput" type="text" class="form-control" placeholder="Enter company name or VAT">
                                      <span class="input-group-btn">
                                        <button class="btn btn-success" type="button" onClick="searchByVAT()"><i class="fa fa-search"></i>&nbsp;Search</button>
                                      </span>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label>Search results:</label>
                                    <select id="searchResultsSelect" class="form-control">
                                        
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-3">
                                    <label>VAT:</label>
                                    <input id="addCustomerVATInput" type="text" class="form-control" name="customer_vat" placeholder="Enter VAT" />
                                </div>
								<div class="col-md-3">
                                    <label>Visibility:</label><br>
                                    <div class="radio radio-css radio-inline radio-success">
                                        <input type="radio" id="acb1" name="customer_visibility" value="1" checked>
                                        <label for="acb1">
                                        	Public
                                        </label>
                                    </div>
                                    <div class="radio radio-css radio-inline radio-danger">
                                        <input type="radio" id="acb2" name="customer_visibility" value="0">
                                        <label for="acb2">
                                        	Private
                                        </label>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <label>Business entity:</label><br>
                                    <div class="radio radio-css radio-inline radio-success">
                                        <input type="radio" id="ncb1" name="business_entity" value="1">
                                        <label for="ncb1">
                                        	Yes
                                        </label>
                                    </div>
                                    <div class="radio radio-css radio-inline radio-danger">
                                        <input type="radio" id="ncb2" name="business_entity" value="0" checked>
                                        <label for="ncb2">
                                        	No
                                        </label>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <label>Tax payer:</label><br>
                                    <div class="radio radio-css radio-inline radio-success">
                                        <input type="radio" id="ncr1" name="taxpayer" value="1">
                                        <label for="ncr1">
                                        	Yes
                                        </label>
                                    </div>
                                    <div class="radio radio-css radio-inline radio-danger">
                                        <input type="radio" id="ncr2" name="taxpayer" value="0" checked>
                                        <label for="ncr2">
                                        	No
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-xs-12 col-sm-6 col-md-8">
                                    <label>Company name: <span class="red">*</span>
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
                                    <label>Phone number:
									</label>
                                    <input type="tel" name="customer_phone[]" class="tel-input form-control m-b-5" />
                                    <div id="phoneNrsDIV" class="m-b-5">
                                        
                                    </div>
                                    <span class="span-add" onClick="addPhoneNr()"><i class="fas fa-plus-circle m-r-5"></i>Add a phone number</span>
                                </div>
                                <div class="col-md-4">
                                    <label>E-Mail: 
                                    </label>
                                    <input type="email" name="customer_email[]" class="form-control" placeholder="E-mail" />
                                    <div id="emailsDIV" class="m-b-5">
                                        
                                    </div>
                                    <span class="span-add" onClick="addEmail()"><i class="fas fa-plus-circle m-r-5"></i>Add an email address</span>
                                </div>
                                <div class="col-md-4">
                                    <label>Website:</label>
                                    <input type="text" class="form-control" name="customer_website" placeholder="Website address" />
                                </div>
                            </div>
                            <div class="form-group">
								<div class="col-xs-12 col-sm-4 col-md-4">
									<label>Building: <span class="red">*</span></label>
									<input type="text" class="form-control" name="customer_building" placeholder="Enter building name" required />
								</div>
                                <div class="col-xs-12 col-sm-8 col-md-8">
                                    <label>Address: <span class="red">*</span></label>
                                    <input id="customerAddressInput" type="text" name="customer_address" class="form-control" placeholder="Enter an address" required />
                                </div>
                            </div>
                            <div class="form-group">
								<div class="col-xs-12 col-sm-6 col-md-4">
                                    <label>Key account manager:</label>
                                    <select id="customerEmployeeSelect" name="employee_id" class="form-control">
                                        <option value="">Choose an employee</option>
                                    </select>
                                </div>
                                <div class="col-md-8">
                                    <label>Importance</label>
                                    <input id="newCustomerRangeInput" type="range" min="1" max="10" value="5" class="slider" name="customer_importance" onInput="updateRangeValue()">
                                    <label id="newCustomerRangeValue" style="margin-top: 3px;">5</label>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-12">
                                    <label>Notes: </label>
                                    <textarea class="form-control" name="customer_notes" placeholder="Enter notes" rows="4"></textarea>
                                </div>
                            </div>
                            <button id="addCustomerBtn" class="btn material primary" disabled>Add customer</button>
                            <button type="button" class="btn material danger pull-right" onClick="hideNewCustomerPopup()">Close</button>
                        </form>
                    </div>
                </div>
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
                            <div id="map">
                                
                            </div>
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
                            <input id="hiddenAddContactCustomerIDInput" type="hidden" name="customer_id" />
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
                                    <label>Phone number:
                                    </label>
                                    <input type="text" name="contact_phone[]" class="tel-input form-control m-b-5" required />
                                    <div id="contactPhoneNrsDIV">
                                        
                                    </div>
                                    <span class="span-add" onClick="addContactPhoneNr()">Add a phone number</span>
                                </div>
                                <div class="col-md-6">
                                    <label>E-Mail:
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
	<script src="<?= ASSETS_URL . "telinput/build/js/intlTelInput.min.js" ?>"></script>
	<script src="<?= ASSETS_URL . "telinput/build/js/utils.js" ?>"></script>
	<script src="<?= ASSETS_URL . "bootstrap-wizard/js/bwizard.js" ?>"></script>

	<!-- ================== END PAGE LEVEL JS ================== -->
	
	<script>
	    var dTable;
	    var sTable;
	    var geocoder;
	    var loggedEmployee = <?php echo json_encode($_SESSION["id"]); ?>;
	    var droppedFiles;
	    var mapMarker;
	    var customerMarkers = [];
	    var map;
	    var bigMap;
		var isFirstResize = true;
	    
	    var firstPageLoad = true;
	    
		$(document).ready(function() {
			getMenuStatistics(loggedEmployee);
			$("#wizard").bwizard();
			$(".tel-input").intlTelInput({ initialCountry: "auto",
			geoIpLookup: function(callback) {
                $.get('https://ipinfo.io', function() {}, "jsonp").always(function(resp) {
                  var countryCode = (resp && resp.country) ? resp.country : "";
                  callback(countryCode);
                });
            }});
            
            $("#searchResultsSelect").on("change", function(){
                var naziv = $(this).val();
                if (naziv != ""){
                    searchByVAT(naziv);
                }
            });
            
            $("a[href='#customers-map']").on('shown.bs.tab', function(){
				if (isFirstResize){
					var myOptions = {
						zoom: parseInt(14),
						center: new google.maps.LatLng(46.056946, 14.505751),
						mapTypeId: google.maps.MapTypeId.ROADMAP
					};
					bigMap = new google.maps.Map(document.getElementById('bigMap'), myOptions);
					getCustomers();
				}
				isFirstResize = !isFirstResize;
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
                            var customer_id = response.customer_id;
                            swal({
                              title: 'Customer successfully added',
                              text: "Do you want to add a contact to this customer?",
                              type: 'success',
                              showCancelButton: true,
                              confirmButtonColor: '#3085d6',
                              cancelButtonColor: '#d33',
                              cancelButtonText: "Close",
                              confirmButtonText: 'Add a contact'
                            }).then(function () {
                                showAddContactPopupID(customer_id);
                            });
                            $("#addCustomerForm")[0].reset();
                            getCustomers();
                            hideNewCustomerPopup();
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
            
            $('#editCustomerForm').on('submit', function(e) { //use on if jQuery 1.7+
                e.preventDefault();
                var fullPhoneNrs = [];
                $("#editCustomerForm .tel-input").each(function(index) {
                  fullPhoneNrs.push($(this).intlTelInput("getNumber"));
                });
                var postData = $("#editCustomerForm").serializeArray();
                postData.push({ name: "customer_phonenr", value: fullPhoneNrs });
				
				console.log(postData);
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
                            getCustomers();
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
            
            $('#csvFieldsForm').on('submit', function(e) { //use on if jQuery 1.7+
                e.preventDefault();
                $.ajax({
                    type: "POST",
                    url: "customers/import",
                    data: $("#csvFieldsForm").serialize(),
                    success: function(msg) {
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
            
			getCustomers();
			getEmployees();
		
		});
		
		function showAddContactPopup(row){
			var actualRow = $(row).parents('tr');
			if (actualRow.hasClass('child')) {//Check if the current row is a child row
				actualRow = actualRow.prev();//If it is, then point to the row before it (its 'parent')
			}
            var customer = dTable.row(actualRow).data();
		    $("#hiddenAddContactCustomerIDInput").val(customer.customer_id);
		    $("#contactPhoneNrsDIV, #contactEmailsDIV").html("");
		    $("#contactPopupDIV, #addContactDIV").show();
		}
		
		function showAddSubsidiaryPopup(row){
			var actualRow = $(row).parents('tr');
			if (actualRow.hasClass('child')) {//Check if the current row is a child row
				actualRow = actualRow.prev();//If it is, then point to the row before it (its 'parent')
			}
            var customer = dTable.row(actualRow).data();
		    $("#hiddenSubsidiaryCustomerIDInput").val(customer.customer_id);
		    $("#subsidiaryPhoneNrsDIV, #subsidiaryEmailsDIV").html("");
		    $("#subsidiaryPopupDIV, #addSubsidiaryDIV").show();
		}
		
		function showAddContactPopupID(customer_id){
		    $("#hiddenAddContactCustomerIDInput").val(customer_id);
		    $("#contactPhoneNrsDIV, #contactEmailsDIV").html("");
		    $("#contactPopupDIV, #addContactDIV").show();
		}
		
		function hideAddContactPopup(){
		    $("#addContactForm")[0].reset();
		    $("#contactPopupDIV, #addContactDIV").hide();
		}
		
		function hideAddSubsidiaryPopup(){
			$("#addSubsidiaryForm")[0].reset();
			$("#subsidiaryPopupDIV, #addSubsidiaryDIV").hide();
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
		
		function addEmail(){
		    $("#emailsDIV").append('<div class="m-t-5"><input type="email" name="customer_email[]" class="form-control" placeholder="E-mail"/></div>');
		}
		
		function addContactEmail(){
		    $("#contactEmailsDIV").append('<div class="m-t-5"><input type="email" name="contact_email[]" class="form-control" placeholder="E-mail"/></div>');
		}
		
		function addSubsidiaryEmail(){
		    $("#subsidiaryEmailsDIV").append('<div class="m-t-5"><input type="email" name="subsidiary_email[]" class="form-control" placeholder="E-mail"/></div>');
		}
		
		function addEditEmail(){
		    $("#editEmailsDIV").append('<div class="m-t-5"><input type="email" name="customer_email[]" class="form-control" placeholder="E-mail"/></div>');
		}
		
		function importCustomers(){
		    $("#wizardDIV").show();
		}
		
		function viewCustomerContacts(row){
		    var actualRow = $(row).parents('tr');
			if (actualRow.hasClass('child')) {//Check if the current row is a child row
				actualRow = actualRow.prev();//If it is, then point to the row before it (its 'parent')
			}
            var customer = dTable.row(actualRow).data();
		    var url = "<?= BASE_URL ?>" + "customerdetails?customer_id=" + customer.customer_id;
		    window.open(url, "_blank");
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
		
		function updateRangeValue(){
		    $("#newCustomerRangeValue").html($("#newCustomerRangeInput").val());
		}
		
		function updateEditRangeValue(){
		    $("#editCustomerRangeValue").html($("#editCustomerImportanceInput").val());
		}
		
		function searchByVAT(naziv){
		        var searchQ = $("#vatInput").val();
		        if (naziv != null){
		            searchQ = naziv;
		        }
		        $("#searchResultsSelect").html("");
    		    var postData = { "searchQ": searchQ };
    		    $.ajax({
                        type: "POST",
                        url: "vat/search",
                        data: postData,
                        dataType: "json",
                        success: function(response) {
							console.log(response);
                            if (response.list != null){
                                if (response.list.length == 1){
                                    $("#addCustomerNameInput").val(response.list[0].Naziv);
									$("#addCustomerVATInput").val(response.list[0].DavcnaStevilkaKratka);
                                    var address = response.list[0].Naslov;
                                    $("#customerAddressInput").val(address);
                                    geocoder.geocode( { 'address': address}, function(results, status) {
                                        console.log(status);
                                      if (status == 'OK') {
                                        $("#newCustomerLatitudeInput").val(results[0].geometry.location.lat());
                                        $("#newCustomerLongitudeInput").val(results[0].geometry.location.lng());
                                        $("#addCustomerBtn").prop("disabled", false); //enable button when an address is selected.
                                        if (response.list[0].Tip != "Fizièna oseba"){
                                            $("#addCustomerForm input[name=business_entity]").val([1]);
                                        }else{
                                            $("#addCustomerForm input[name=business_entity]").val([0]);
                                        }
                                        if (response.list[0].PlacnikDDV){
                                            $("#addCustomerForm input[name=taxpayer]").val([1]);
                                        }else{
                                            $("#addCustomerForm input[name=taxpayer]").val([0]);
                                        }
                                      } else {
                                        swal(
                                            'Error',
                                            'Company address not found, please enter the address manually',
                                            'error'
                                        );
                                      }
                                    });
                                }else if (response.list.length > 1){
                                    $("#searchResultsSelect").append($('<option>', {
                                            value: "",
                                            text: "Choose a company"
                                    }));
                                    for (var i = 0; i < response.list.length; i++){
                                        $("#searchResultsSelect").append($('<option>', {
                                            value: response.list[i].DavcnaStevilkaKratka,
                                            text: response.list[i].Naziv
                                        }));
                                    }
                                }else{
                                    swal(
                                        'Error',
                                        'Company with matching VAT or name was not found.',
                                        'error'
                                    );
                                }
                            }else{
                                swal(
                                    'Error',
                                    'Company with matching VAT or name was not found.',
                                    'error'
                                );
                            }
                        },
                        error: function(response){
                            swal(
                                'Error',
                                'Company with matching VAT or name was not found.',
                                'error'
                            );
                        }
    		    });
		    
		}
		
		function initMap(){
		    var myOptions = {
                zoom: parseInt(14),
                center: new google.maps.LatLng(46.056946, 14.505751),
                mapTypeId: google.maps.MapTypeId.ROADMAP
            };
            map = new google.maps.Map(document.getElementById('map'), myOptions);
            bigMap = new google.maps.Map(document.getElementById('bigMap'), myOptions);
            google.maps.event.trigger(map, 'resize');
            google.maps.event.trigger(bigMap, 'resize');
            
            var searchBox = new google.maps.places.SearchBox(document.getElementById('customerAddressInput'));
            var editSearchBox = new google.maps.places.SearchBox(document.getElementById('editCustomerAddressInput'));
			var subsidiarySearchBox = new google.maps.places.SearchBox(document.getElementById('subsidiaryAddressInput'));
                    
            google.maps.event.addListener(searchBox, 'places_changed', function() {
                var places = searchBox.getPlaces();
                var i, place;
                for (i = 0; place = places[i]; i++) {
                    (function(place) {
                        var location = place.geometry.location;
                        $("#newCustomerLatitudeInput").val(location.lat());
                        $("#newCustomerLongitudeInput").val(location.lng());
                        $("#addCustomerBtn").prop("disabled", false); //enable button when an address is selected.
                    }(place));
                }
            });
            
            google.maps.event.addListener(editSearchBox, 'places_changed', function() {
                var places = editSearchBox.getPlaces();
                var i, place;
                for (i = 0; place = places[i]; i++) {
                    (function(place) {
                        var location = place.geometry.location;
                        $("#editCustomerLatitudeInput").val(location.lat());
                        $("#editCustomerLongitudeInput").val(location.lng());
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
            
            geocoder = new google.maps.Geocoder;
		}
		
	
		
		function getCustomers() {
            $.ajax({
                type: "POST",
                url: "<?= BASE_URL ?>" + "customers/list",
                data: null,
                dataType: "json",
                success: function(customers) {
                    if (dTable != null){
                        dTable.clear().rows.add(customers).draw();
									dTable.columns([4]).every(function (index) {
										var column = this;
										var name;
										if (index == 4){
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
                    }else{
						dTable = $('#customersTable').DataTable({
							"aaData": customers,
							initComplete: function () {
								this.api().columns([4]).every(function (index) {
									var column = this;
									var name;
									if (index == 4){
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
								{ "data": "customer_name" },
								{ "data": "customer_phone" },
								{ "data": "customer_email" },
								{ "data": "customer_address" },
								{ "data": "employee_id" },
								{ "defaultContent": '<span onClick="showEditCustomerPopup(this)" data-toggle="tooltip" title="Edit" class="text-primary pull-left pointer"><i class="fas fa-pencil-alt"></i></span><span onClick="showAddSubsidiaryPopup(this)" data-toggle="tooltip" title="Add a subsidiary company" class="text-primary pull-left m-l-10 pointer"><i class="fas fa-building"></i></span><span onClick="showAddContactPopup(this)" data-toggle="tooltip" title="Add a contact" class="text-primary pull-left m-l-10 pointer"><i class="fa fa-user-plus"></i></span><span onClick="viewCustomerContacts(this)" data-toggle="tooltip" title="View customer page" class="text-success pull-left m-l-10 pointer"><i class="fas fa-th-list"></i></span><span onClick="deleteCustomer(this)" data-toggle="tooltip" title="Delete" class="text-danger pointer pull-left m-l-10"><i class="fa fa-trash"></i></span>'}
							],
							"columnDefs": [
							{
									// The `data` parameter refers to the data for the cell (defined by the
									// `data` option, which defaults to the column being worked with, in
									// this case `data: 0`.
									"render": function ( data, type, row ) {
										return "<a class='text-primary hover-underline' href='employeepage?employee_id=" + data + "' target='_blank'>"  + row.employee_name + " " + row.employee_surname + "</a>";
									},
									"targets": 4,
									orderable: false
								},
								{
									// The `data` parameter refers to the data for the cell (defined by the
									// `data` option, which defaults to the column being worked with, in
									// this case `data: 0`.
									"render": function ( data, type, row ) {
										return '<span class="text-primary hover-underline" onClick="showOnMap(this)">' + data + '</span>';
									},
									"targets": 3
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
									// The `data` parameter refers to the data for the cell (defined by the
									// `data` option, which defaults to the column being worked with, in
									// this case `data: 0`.
									"render": function ( data, type, row ) {
										return "<strong>" + data + "</strong>";
									},
									"targets": 0
								},
								{
									"targets": 5,
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
                    
                    for (var i = 0; i < customerMarkers.length; i++){
                        customerMarkers[i].setMap(null);
                    }
                    customerMarkers = [];
                    for (var i = 0; i < customers.length; i++){
                        var customer = customers[i];
                        var mapMarker = new google.maps.Marker({
                            position: new google.maps.LatLng(customer.latitude, customer.longitude),
                            map: bigMap,
                            title: 'Customer'
                        });
						var width = customer.customer_importance * 10;
                        var infoWindowContent = '<div class="infobubble-list-item">' +
													'<div class="infobubble-list-content">' +
														'<h4 class="infobubble-list-title">' +
															'<a target="_blank" href="customerdetails?customer_id=' + customer.customer_id + '" >' + customer.customer_name + '</a>' +
														'</h4>' +
														'<p class="infobubble-list-desc">' + customer.customer_industry + '</p>' +
													'</div>' +
												'</div>' +
												'<div class="infobubble-list-item p-t-0 p-b-0">' +
													'<div class="infobubble-list-content p-t-0 p-b-0">' +
														'<div class="widget-chart-info-progress">' +
															'<b>Importance</b>' +
														'</div>' +
														'<div class="progress progress-sm m-b-0">' +
															'<div style="width:' + width + '%;" class="progress-bar progress-bar-striped progress-bar-animated rounded-corner bg-primary"></div>' +
														'</div>' +
													'</div>' + 
												'</div>' +
												'<div class="p-l-10 p-r-10 p-b-5 p-t-10">' +
													'<i class="fas fa-plus-circle text-primary m-r-5 fa-fw"></i><a href="employeepage?employee_id=' + customer.employee_id + '" target="_blank" >' + customer.employee_name + " " +  customer.employee_surname + "</a>" + 
												'</div>' +
												'<div class="p-l-10 p-r-10 p-b-5 p-t-5">' +
													'<i class="fa fa-phone text-primary m-r-5 fa-fw"></i>' + customer.customer_phone.split(";")[0] + 
												'</div>' +
												'<div class="p-l-10 p-r-10 p-b-5 p-t-5">' +
													'<i class="fas fa-paper-plane text-primary m-r-5 fa-fw"></i>' + customer.customer_email.split(";")[0] + 
												'</div>' +
												'<div class="p-l-10 p-r-10 p-b-5 p-t-5">' +
													'<i class="fas fa-map-marker-alt text-danger m-r-5 fa-fw"></i>' + customer.customer_address + 
												'</div>' +
												'<div class="p-l-10 p-r-10 p-b-5 p-t-5">' +
													'<i class="fas fa-home text-success m-r-5 fa-fw"></i>' + customer.customer_building + 
												'</div>';
												
						addInfoWindow(bigMap, mapMarker, infoWindowContent, false);
                        customerMarkers.push(mapMarker);
                    }
                    if (firstPageLoad){
                        App.init();
                        firstPageLoad = false;
                    }
                }
            });
        }
        
        function showOnMap(row){
            var actualRow = $(row).parents('tr');
			if (actualRow.hasClass('child')) {//Check if the current row is a child row
				actualRow = actualRow.prev();//If it is, then point to the row before it (its 'parent')
			}
            var customer = dTable.row(actualRow).data();
            
            if (mapMarker != null){
                mapMarker.setMap(null);
            }
            
            mapMarker = new google.maps.Marker({
                position: new google.maps.LatLng(customer.latitude, customer.longitude),
                map: map,
                title: 'Task location'
            });
            var infoWindowContent = "<p class='f-s-12'><strong>" + customer.customer_name + "</strong><br><br><strong>Address - </strong>" + customer.customer_address + "<br><strong>Phone - </strong>" + customer.customer_phone.split(";") + "<br><strong>E-mail - </strong>" + customer.customer_email.split(";") + "</p>";
            addInfoWindow(map, mapMarker, infoWindowContent, true);
            $("#mapPopup, #mapDIV").show();
            google.maps.event.trigger(map, 'resize');
            map.setZoom(map.getZoom());
            map.setCenter({lat: parseFloat(customer.latitude), lng: parseFloat(customer.longitude)});
        }
        
        function addInfoWindow(gMap, marker, message, autoOpen) {
            var infoWindow = new google.maps.InfoWindow({
                content: message
            });

            google.maps.event.addListener(marker, 'click', function () {
                infoWindow.open(gMap, marker);
            });
            
            if (autoOpen){
                infoWindow.open(gMap, marker);
            }
        }
        
        function hideMapPopup(){
            $("#mapPopup, #mapDIV").hide();
        }
        
        function getEmployees() {
            $.ajax({
                type: "POST",
                url: "<?= BASE_URL ?>" + "employees/list",
                data: null,
                dataType: "json",
                success: function(employees) {
                    for (var i = 0; i < employees.length; i++){
                        $("#editCustomerEmployeeSelect, #customerEmployeeSelect, #importEmployeeSelect").append($('<option>', {
                            value: employees[i].employee_id,
                            text: employees[i].employee_name + " " + employees[i].employee_surname
                        }));
                    }
                }
            });
        }
        
        function hideNewCustomerPopup() {
            $("#emailsDIV, #phoneNrsDIV").html("");
            $("#customerPopupDIV, #addCustomerDIV").hide();
        }
    
        function showNewCustomerPopup() {
            $("#customerPopupDIV, #addCustomerDIV").show();
        }
    
        function showEditCustomerPopup(row) {
            var actualRow = $(row).parents('tr');
			if (actualRow.hasClass('child')) {//Check if the current row is a child row
				actualRow = actualRow.prev();//If it is, then point to the row before it (its 'parent')
			}
            var customer = dTable.row(actualRow).data();
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
        
        function deleteCustomer(row){
            var actualRow = $(row).parents('tr');
			if (actualRow.hasClass('child')) {//Check if the current row is a child row
				actualRow = actualRow.prev();//If it is, then point to the row before it (its 'parent')
			}
            var customer = dTable.row(actualRow).data();
            swal({
              title: 'Confirm action',
              text: "Are you sure you want to remove this customer?",
              type: 'error',
              showCancelButton: true,
              confirmButtonColor: '#3085d6',
              cancelButtonColor: '#d33',
              confirmButtonText: 'Yes, remove'
            }).then(function () {
                var values = { customer_id: customer.customer_id };
                $.ajax({
                    type: "POST",
                    url: "customer/delete",
                    data: values,
                    success: function(msg) {
                        if (msg == "") {
                            swal(
                                'Success!',
                                'Customer was successfully removed.',
                                'success'
                            );
                            getCustomers();
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
