<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
<!--<![endif]-->
<head>
	<meta charset="utf-8" />
	<title>Employees</title>
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
	<link href="<?= ASSETS_URL . "bootstrap-wizard/css/bwizard.min.css" ?>" rel="stylesheet" />
	<link href="<?= CSS_URL . "theme/default.css" ?>" rel="stylesheet" id="theme" />
	<!-- ================== END BASE CSS STYLE ================== -->
	
	<!-- ================== BEGIN PAGE LEVEL STYLE ================== -->
	<link href="<?= ASSETS_URL . "jquery-jvectormap/jquery-jvectormap.css" ?>" rel="stylesheet" />
	<link href="<?= ASSETS_URL . "bootstrap-datepicker/css/bootstrap-datepicker.css" ?>" rel="stylesheet" />
    <link href="<?= ASSETS_URL . "gritter/css/jquery.gritter.css" ?>" rel="stylesheet" />
    <link href="<?= ASSETS_URL . "telinput/build/css/intlTelInput.css" ?>" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.6.9/sweetalert2.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.6.9/sweetalert2.min.css">
    <link href="<?= ASSETS_URL . "select2/dist/css/select2.css" ?>" rel="stylesheet" />
	<link href="<?= ASSETS_URL . "password-indicator/css/password-indicator.css" ?>" rel="stylesheet" />
	<!-- ================== END PAGE LEVEL STYLE ================== -->
	
	<!-- ================== BEGIN BASE JS ================== -->
	<script src="<?= ASSETS_URL . "pace/pace.min.js" ?>" ></script>
	<!-- ================== END BASE JS ================== -->
</head>
<style>
    
    
    #allUsersTable td:last-child{
		min-width: 180px;
	}
    
    .pointer{
        cursor: pointer;
    }
    
    #addUserDIV, #editUserDIV, #addDepartmentDIV, #notificationDIV{
        width: 700px;
        height: auto;
        position: relative;
        margin: 10% auto 0px auto;
    }
    
    .nFilter{
        max-width: 250px;
    }
    
    .green{
        color: #39a34b;
    }
    .red{
        color: #bf2c24;
    }
    
    #allUsersTable, #allDepartmentsTable{
        width: 100% !important;
    }
    
    input[pattern]:invalid{
      color:red;
    }
    
    .tab-content {
        padding: 15px 0px 0px 0px;
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
                				echo '<li class="has-sub active">
                            			<a href="javascript:;">
                            				<b class="caret pull-right"></b>
                            				<i class="fas fa-building"></i> 
                            				<span>Company</span>
                            			</a>
                            			<ul class="sub-menu">
                            			    <li><a href="' . BASE_URL . 'departments">Structure</a></li>
                            				<li class="active"><a href="' . BASE_URL . 'employees">Employees</a></li>
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
							<h4 class="m-t-10 m-b-5">Employees</h4>
							<div class="m-t-10">
								<button class="btn btn-white btn-sm" onclick="showNewUserPopup()"><i class="fas fa-plus text-primary"></i> Add an employee</button>
								<button class="btn btn-white btn-sm pull-right" onClick="importEmployees()"><i class="fas fa-upload text-success"></i> Import from CSV</button>
							</div>
						</div>
						<!-- END profile-header-info -->
					</div>
					<!-- END profile-header-content -->
				</div>
			</div>
			<!-- end profile -->
            <div class="profile-content">
			<div class="tab-content">
				<div class="tab-pane fade in active" id="employees-view">
					<div class="row">
						<div class="col-md-12">
							<div class="panel panel-primary">
								<div class="panel-heading">
									<div class="panel-heading-btn">
										<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
										<a href="getUsers()" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-repeat"></i></a>
										<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
										<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
									</div>
									<h4 class="panel-title">Employees</h4>
								</div>
								<div class="panel-body">
									<div class="dataTables_wrapper form-inline dt-bootstrap no-footer">
										<table id="allUsersTable" class="table table-striped">
											<thead>
												<tr>
													<th>
														Department
													</th>
													<th>
														Name
													</th>
													<th>
														Surname
													</th>
													<th>
														Cell number
													</th>
													<th>
														Work phone
													</th>
													<th>
														Email
													</th>
													<th>
														Presence
													</th>
													<th>
														Status
													</th>
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
												<form id="csvFieldsForm" action="<?= BASE_URL . "employees/import" ?>" method="post" enctype="multipart/form-data" class="form-horizontal">
													<div class="form-group">
														<div class="col-md-4">
															<label>Name: <span class="text-danger">*</span></label>
															<select id="importNameSelect" name="employee_name" class="form-control" required >
															</select>
														</div>
														<div class="col-md-4">
															<label>Surname: <span class="text-danger">*</span>
															</label>
															<select id="importSurnameSelect" name="employee_surname" class="form-control" required >
															</select>
														</div>
														<div class="col-md-4">
															<label>E-mail: <span class="text-danger">*</span>
															</label>
															<select id="importEmailSelect" name="employee_email" class="form-control" required >
															</select>
														</div>
													</div>
													<div class="form-group">
														<div class="col-md-4">
															<label>Residence: <span class="text-danger">*</span></label>
															<select id="importResidenceSelect" name="employee_residency" class="form-control" >
															  
															</select>
														</div>
													</div>
													<div class="form-group">
														<div class="col-xs-12 col-sm-6 col-md-4">
															<label>Work phone: </label>
															<select id="importWorkPhoneSelect" name="employee_workphone" class="form-control" >
																<option value="-1">Leave blank</option>
															</select>
														</div>
														<div class="col-xs-12 col-sm-6 col-md-4">
															<label>Cell number: <span class="text-danger">*</span>
															</label>
															<select id="importPhoneSelect" name="employee_phone" class="form-control" required >
															</select>
														</div>
														<div class="col-xs-12 col-sm-6 col-md-4">
															<label>Department: <span class="text-danger">*</span>
															</label>
															<select id="importDepartmentSelect" name="employee_department" class="form-control" required >
																<option value="">Choose default department</option>
															</select>
														</div>
													</div>
													<div class="form-group">
														<div class="col-xs-12 col-sm-6 col-md-4">
															<label>Password: <span class="text-danger">*</span>
															</label>
															<select id="importPasswordSelect" name="employee_password" class="form-control" required >
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
			</div>
		</div>
        <div class="popupContainer" id="userPopupDIV" hidden>
            <div class="panel panel-primary" id="addUserDIV" hidden>
                <div class="panel-heading">
                    <div class="panel-heading-btn">
                        <button onclick="hideNewUserPopup()" class="btn btn-xs btn-icon btn-circle btn-default"><i class="fa fa-times"></i>
                        </button>
                    </div>
                    <h4 class="panel-title">Add an employee</h4>
                </div>
                <div class="panel-body">
                    <form id="addUserForm" action="<?= BASE_URL . "employees/add" ?>" method="post" class="form-horizontal">
						<input type="hidden" id="hiddenUserLatitudeInput" name="latitude" />
						<input type="hidden" id="hiddenUserLongitudeInput" name="longitude" />
                        <div class="form-group">
                            <div class="col-xs-12 col-sm-6 col-md-4">
                                <label>Employee type: </label><br/>
                                <div class="radio radio-css radio-inline radio-success">
                                    <input type="radio" name="employee_type" id="nyr1" value="0" checked>
                                    <label for="nyr1">
                                        Regular
                                    </label>
                                </div>
                                <div class="radio radio-css radio-inline radio-primary">
                                    <input type="radio" name="employee_type" id="nyr2" value="1">
                                    <label for="nyr2">
                                        Admin
                                    </label>
                                </div>
                            </div>
							<div class="col-xs-12 col-sm-6 col-md-4">
                                <label>E-mail notifications: </label><br/>
                                <div class="radio radio-css radio-inline radio-success">
                                    <input type="radio" name="employee_mailing" id="nxr1" value="1" checked>
                                    <label for="nxr1">
                                        Enabled
                                    </label>
                                </div>
                                <div class="radio radio-css radio-inline radio-danger">
                                    <input type="radio" name="employee_mailing" id="nxr2" value="0">
                                    <label for="nxr2">
                                        Disabled
                                    </label>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-6 col-md-4">
                                <label>SMS notifications: </label><br/>
                                <div class="radio radio-css radio-inline radio-success">
                                    <input type="radio" name="employee_sms" id="nxr3" value="1" checked>
                                    <label for="nxr3">
                                        Enabled
                                    </label>
                                </div>
                                <div class="radio radio-css radio-inline radio-danger">
                                    <input type="radio" name="employee_sms" id="nxr4" value="0">
                                    <label for="nxr4">
                                        Disabled
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-xs-12 col-sm-6 col-md-4">
                                <label>Name: <span class="text-danger">*</span>
                                </label>
                                <input type="text" name="employee_name" class="form-control" placeholder="Name" required />
                            </div>
                            <div class="col-xs-12 col-sm-6 col-md-4">
                                <label>Surname: <span class="text-danger">*</span>
                                </label>
                                <input type="text" name="employee_surname" class="form-control"  placeholder="Surname" required />
                            </div>
                            <div class="col-xs-12 col-sm-6 col-md-4">
                                <label>E-mail: <span class="text-danger">*</span>
                                </label>
                                <input type="email" name="employee_email" class="form-control" placeholder="E-mail" required />
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-12">
                                <label>Address / residence: <span class="text-danger">*</span></label>
                                <input id="userResidenceInput" type="text" name="employee_residence" class="form-control" placeholder="Enter employee address" required />
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-xs-12 col-sm-6 col-md-4">
                                <label>Work phone: </label>
                                <input type="text" id="addUserWorkPhoneInput" name="employee_workphone" class="tel-input form-control" />
                            </div>
                            <div class="col-xs-12 col-sm-6 col-md-4">
                                <label>Cell number: <span class="text-danger">*</span>
                                </label>
                                <input type="text" id="addUserPhoneInput" name="employee_phone" class="tel-input form-control" required />
                            </div>
                            <div class="col-xs-12 col-sm-6 col-md-4">
                                <label>Department: <span class="text-danger">*</span>
                                </label>
                                <select id="newEmployeeDepartmentSelect" class="form-control" name="employee_department">
    
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-4">
                                <label>Position: <span class="text-danger">*</span></label>
                                <input type="text" class="form-control"  name="employee_position" placeholder="Position" required />
                            </div>
                            <div class="col-md-4">
                                <label>Working time from: <span class="text-danger">*</span></label>
                                <div class="input-group employee-time-picker" >
                                    <input id="workTimeFrom" type="text" class="form-control"  name="employee_workfrom" required />
                                    <span class="input-group-addon btn bg-primary">
                                        <span class="fa fa-clock text-white"></span>
                                    </span>                    
                                </div>
                            </div>
                            <div class="col-md-4">
                                <label>Working time to: <span class="text-danger">*</span></label>
                                <div class="input-group employee-time-picker">
                                    <input id="workTimeTo" type="text" class="form-control" name="employee_workto" required />
                                    <span class="input-group-addon btn bg-primary">
                                        <span class="fa fa-clock text-white"></span>
                                    </span>                    
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-xs-12 col-sm-6 col-md-12">
                                <label>Password: <span class="text-danger">*</span>
                                </label>
                                <input type="password" name="password" class="form-control passwordInput" placeholder="Password" required />
                            </div>
                        </div>
                </div>
				<div class="panel-footer">
					<button class="btn btn-success">Create employee</button>
                    <button type="button" class="btn btn-primary pull-right" onClick="hideNewUserPopup()">Close</button>
                    </form>
				</div>
            </div>
            <div class="panel panel-primary" id="editUserDIV" hidden>
                <div class="panel-heading">
                    <div class="panel-heading-btn">
                        <button class="btn btn-xs btn-icon btn-circle btn-default" onClick="hideEditUserPopup()"><i class="fa fa-times"></i>
                        </button>
                    </div>
                    <h4 class="panel-title">Edit employee</h4>
                </div>
                <div class="panel-body">
                    <form id="editUserForm" action="<?= BASE_URL . "employees/edit" ?>" method="post" class="form-horizontal">
                        <input type="hidden" id="editUserIDInput" name="employee_id" />
						<input type="hidden" id="hiddenEditUserLatitudeInput" name="latitude" />
						<input type="hidden" id="hiddenEditUserLongitudeInput" name="longitude" />
                        <div class="form-group">
                            <div class="col-xs-12 col-sm-6 col-md-4">
                                <label>Employee type: </label><br/>
                                <div class="radio radio-css radio-inline radio-success">
                                    <input type="radio" name="employee_type" id="nar1" value="0" checked>
                                    <label for="nar1">
                                        Regular
                                    </label>
                                </div>
                                <div class="radio radio-css radio-inline radio-primary">
                                    <input type="radio" name="employee_type" id="nar2" value="1">
                                    <label for="nar2">
                                        Admin
                                    </label>
                                </div>
                            </div>
							<div class="col-xs-12 col-sm-6 col-md-4">
                                <label>E-mail notifications: </label><br/>
                                <div class="radio radio-css radio-inline radio-success">
                                    <input type="radio" name="employee_mailing" id="nmr1" value="1" checked>
                                    <label for="nmr1">
                                        Enabled
                                    </label>
                                </div>
                                <div class="radio radio-css radio-inline radio-danger">
                                    <input type="radio" name="employee_mailing" id="nmr2" value="0">
                                    <label for="nmr2">
                                        Disabled
                                    </label>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-6 col-md-4">
                                <label>SMS notifications: </label><br/>
                                <div class="radio radio-css radio-inline radio-success">
                                    <input type="radio" name="employee_sms" id="nmr3" value="1" checked>
                                    <label for="nmr3">
                                        Enabled
                                    </label>
                                </div>
                                <div class="radio radio-css radio-inline radio-danger">
                                    <input type="radio" name="employee_sms" id="nmr4" value="0">
                                    <label for="nmr4">
                                        Disabled
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-xs-12 col-sm-6 col-md-4">
                                <label>Name: <span class="text-danger">*</span>
                                </label>
                                <input id="editUserNameInput" type="text" name="employee_name" class="form-control" placeholder="Name" required />
                            </div>
                            <div class="col-xs-12 col-sm-6 col-md-4">
                                <label>Surname: <span class="text-danger">*</span>
                                </label>
                                <input id="editUserSurnameInput" type="text" name="employee_surname" class="form-control" placeholder="Surname" required />
                            </div>
                            <div class="col-xs-12 col-sm-6 col-md-4">
                                <label>E-mail: <span class="text-danger">*</span>
                                </label>
                                <input id="editUserEmailInput" type="email" name="employee_email" class="form-control" placeholder="E-mail" required />
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-12">
                                <label>Residence: <span class="text-danger">*</span></label>
                                <input id="editUserResidenceInput" type="text" name="employee_residence" class="form-control" placeholder="Enter employee address" required />
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-xs-12 col-sm-6 col-md-4">
                                <label>Work phone: </label>
                                <input id="editUserWorkPhoneInput" type="text" name="employee_workphone" class="tel-input form-control" />
                            </div>
                            <div class="col-xs-12 col-sm-6 col-md-4">
                                <label>Cell number: <span class="text-danger">*</span>
                                </label>
                                <input id="editUserPhoneInput" type="text" name="employee_phone" class="tel-input form-control" required />
                            </div>
                            <div class="col-xs-12 col-sm-6 col-md-4">
                                <label>Department: <span class="text-danger">*</span>
                                </label>
                                <select id="editEmployeeDepartmentSelect" class="form-control" name="employee_department">
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-4">
                                <label>Position: <span class="text-danger">*</span></label>
                                <input id="editUserPositionInput" type="text" class="form-control"  name="employee_position" placeholder="Position" />
                            </div>
                            <div class="col-md-4">
                                <label>Working time from: <span class="text-danger">*</span></label>
                                <div class="input-group employee-time-picker">
                                    <input id="editWorkTimeFrom" type="text" class="form-control" name="employee_workfrom" placeholder="Select time from" required />
                                    <span class="input-group-addon btn bg-primary">
                                        <span class="fa fa-clock text-white"></span>
                                    </span>                    
                                </div>
                            </div>
                            <div class="col-md-4">
                                <label>Working time to: <span class="text-danger">*</span></label>
                                <div class="input-group employee-time-picker">
                                    <input id="editWorkTimeTo" type="text" class="form-control" name="employee_workto" placeholder="Select time to" required />
                                    <span class="input-group-addon btn bg-primary">
                                        <span class="fa fa-clock text-white"></span>
                                    </span>                    
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-xs-12 col-sm-6 col-md-12">
                                <label>New password (Optional):
                                </label>
                                <input type="password" name="password" class="form-control passwordInput" placeholder="Password" />
                            </div>
                        </div>
                </div>
				<div class="panel-footer">
					<button class="btn btn-success">Edit employee</button>
                    <button type="button" class="btn btn-primary pull-right" onClick="hideEditUserPopup()">Close</button>
                    </form>
				</div>
            </div>
        </div>
        <div class="popupContainer" id="notificationPopup" hidden>
            <div class="panel panel-primary" id="notificationDIV">
                <div class="panel-heading">
                    <div class="panel-heading-btn">
                        <button class="btn btn-xs btn-icon btn-circle btn-default" onClick="hidePushNotificationPopup()"><i class="fa fa-times"></i>
                        </button>
                    </div>
                    <h4 class="panel-title">Send push notification</h4>
                </div>
                <div class="panel-body">
                    <form id="pushNotificationForm" action="<?= BASE_URL . "employees/notification" ?>" method="post" class="form-horizontal">
                        <div class="form-group">
                            <div class="col-md-12">
                                <label>Recipients:</label>
                                <select id="pushNotificationRecipientSelect" class="form-control" name="recipients[]" multiple required>
                                    <option value="">Choose recipients</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-12">
                                <label>Message:</label>
                                <textarea class="form-control" name="message" rows="4" placeholder="Enter message here" required></textarea>
                            </div>
                        </div>
                </div>
                <div class="panel-footer">
                    <button class="btn btn-success">Send push notification</button>
                    <button type="button" class="btn btn-primary pull-right" onClick="hidePushNotificationPopup()">Close</button>
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
	<script src="<?= ASSETS_URL . "fullcalendar/lib/moment.min.js" ?>"></script>
	<script src="<?= ASSETS_URL . "bootstrap-wizard/js/bwizard.js" ?>"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/js/bootstrap-datetimepicker.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/css/bootstrap-datetimepicker.min.css" rel="stylesheet"/>
	<link href="<?= ASSETS_URL . "DataTables/media/css/dataTables.bootstrap.min.css" ?>" rel="stylesheet" />
	<link href="<?= ASSETS_URL . "DataTables/extensions/Responsive/css/responsive.bootstrap.min.css" ?>" rel="stylesheet" />
	<script src="<?= ASSETS_URL . "DataTables/media/js/jquery.dataTables.js" ?>"></script>
	<script src="<?= ASSETS_URL . "DataTables/extensions/Buttons/js/dataTables.buttons.min.js" ?>"></script>
	<script src="<?= ASSETS_URL . "DataTables/extensions/Buttons/js/buttons.bootstrap.min.js" ?>"></script>
	<script src="<?= ASSETS_URL . "DataTables/extensions/Buttons/js/buttons.flash.min.js" ?>"></script>
	<script src="<?= ASSETS_URL . "DataTables/extensions/Buttons/js/jszip.min.js" ?>"></script>
	<script src="<?= ASSETS_URL . "DataTables/extensions/Buttons/js/pdfmake.min.js" ?>"></script>
	<script src="<?= ASSETS_URL . "DataTables/extensions/Buttons/js/vfs_fonts.min.js" ?>"></script>
	<script src="<?= ASSETS_URL . "DataTables/extensions/Buttons/js/buttons.html5.min.js" ?>"></script>
	<script src="<?= ASSETS_URL . "DataTables/extensions/Buttons/js/buttons.print.min.js" ?>"></script>
	<script src="<?= ASSETS_URL . "DataTables/media/js/dataTables.bootstrap.min.js" ?>"></script>
	<script src="<?= ASSETS_URL . "DataTables/extensions/Responsive/js/dataTables.responsive.min.js" ?>"></script>
	<script src="<?= ASSETS_URL . "telinput/build/js/intlTelInput.min.js" ?>"></script>
	<script src="<?= ASSETS_URL . "telinput/build/js/utils.js" ?>"></script>
	<script src="<?= ASSETS_URL . "select2/dist/js/select2.full.min.js" ?>"></script>
	<script src="<?= ASSETS_URL . "bootstrap-show-password/bootstrap-show-password.js" ?>"></script>
	<!-- ================== END PAGE LEVEL JS ================== -->
	
	<script>
	
	    var dTable;
	    var defaultWorkTimeFrom;
	    var defaultWorkTimeTo;
	    var loggedEmployee = <?php echo json_encode($_SESSION["id"]); ?>;
	    var droppedFiles;
		$(document).ready(function() {
			App.init();
			getMenuStatistics(loggedEmployee);
			$("#wizard").bwizard();
			$(".tel-input").intlTelInput({ initialCountry: "auto",
			hiddenInput: "customer_phone",
			geoIpLookup: function(callback) {
                $.get('https://ipinfo.io', function() {}, "jsonp").always(function(resp) {
                  var countryCode = (resp && resp.country) ? resp.country : "";
                  callback(countryCode);
                });
            }});
			
			$(".passwordInput").password({
				eyeClass: 'fa',
				eyeOpenClass: 'fa-eye',
				eyeCloseClass: 'fa-eye-slash'
			});
			
			$("#pushNotificationRecipientSelect").select2({"width": "100%"});
			$(".employee-time-picker").datetimepicker({widgetPositioning:{
                                horizontal: 'right',
                                vertical: 'top'
                            }, format: "HH:mm", stepping:5, "defaultDate": new Date(), allowInputToggle: true });
			
			$('#addUserForm').on('submit', function(e) { //use on if jQuery 1.7+
                e.preventDefault();
                var postData = $("#addUserForm").serializeArray();
                postData.push({ name: "employee_mobile", value: $("#addUserPhoneInput").intlTelInput("getNumber") });
                postData.push({ name: "employee_work", value: $("#addUserWorkPhoneInput").intlTelInput("getNumber") });
                $.ajax({
                    type: "POST",
                    url: "employees/add",
                    data: postData,
                    success: function(msg) {
                        if (msg == "") {
                            swal(
                                'Success!',
                                'Employee was successfully added.',
                                'success'
                            );
                            $("#addUserForm")[0].reset();
                            getEmployees();
                            hideNewUserPopup();
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
            
            $('#editUserForm').on('submit', function(e) { //use on if jQuery 1.7+
                e.preventDefault();
                var postData = $("#editUserForm").serializeArray();
                postData.push({ name: "employee_mobile", value: $("#editUserPhoneInput").intlTelInput("getNumber") });
                postData.push({ name: "employee_work", value: $("#editUserWorkPhoneInput").intlTelInput("getNumber")})
                $.ajax({
                    type: "POST",
                    url: "employees/edit",
                    data: postData,
                    success: function(msg) {
                        if (msg == "") {
                            swal(
                                'Success!',
                                'Employee was successfully edited.',
                                'success'
                            );
                            $("#editUserForm")[0].reset();
                            getEmployees();
                            hideEditUserPopup();
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
            
            $('#pushNotificationForm').on('submit', function(e) { //use on if jQuery 1.7+
                e.preventDefault();
                $.ajax({
                    type: "POST",
                    url: "employees/notification",
                    data: $(this).serialize(),
                    success: function(msg) {
                        if (msg == "") {
                            swal(
                                'Success!',
                                'Notification sent.',
                                'success'
                            );
                            $("#pushNotificationForm")[0].reset();
                            hidePushNotificationPopup();
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
                            $("#importNameSelect, #importSurnameSelect, #importEmailSelect, #importWorkPhoneSelect, #importPhoneSelect, #importPasswordSelect, #importResidenceSelect").append($('<option>', {
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
                    url: "employees/import",
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
           
            getEmployees();
            getDepartments();
            getSettings();
		});
		
		function importEmployees(){
		    $("#wizardDIV").show();
		}
		
		function getSettings(){
		    $.ajax({
                type: "POST",
                url: "settings/get",
                data: null,
                dataType: "json",
                success: function(settings) {
                    defaultWorkTimeFrom = settings.worktime_from;
                    defaultWorkTimeTo = settings.worktime_to;
                    $("#editWorkTimeFrom, #workTimeFrom").val(defaultWorkTimeFrom);
                    $("#editWorkTimeTo, #workTimeTo").val(defaultWorkTimeTo);
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
		
		function hideNewUserPopup() {
            $("#userPopupDIV, #addUserDIV").hide();
        }
    
        function showNewUserPopup() {
            $("#editWorkTimeFrom, #workTimeFrom").val(defaultWorkTimeFrom);
            $("#editWorkTimeTo, #workTimeTo").val(defaultWorkTimeTo);
            $("#userPopupDIV, #addUserDIV").show();
        }
        
        
    
        function showEditUserPopup(row) {
			var actualRow = $(row).parents('tr');
			if (actualRow.hasClass('child')) {//Check if the current row is a child row
				actualRow = actualRow.prev();//If it is, then point to the row before it (its 'parent')
			}
            var employee = dTable.row(actualRow).data();
            $("#editWorkTimeFrom").val(employee.employee_workfrom);
            $("#editWorkTimeTo").val(employee.employee_workto);
            $("#editUserPositionInput").val(employee.employee_position);
            $("#editUserIDInput").val(employee.employee_id);
            $("#editUserNameInput").val(employee.employee_name);
            $("#editUserSurnameInput").val(employee.employee_surname);
            $("#editUserResidenceInput").val(employee.employee_residence);
			$("#hiddenEditUserLatitudeInput").val(employee.residence_latitude);
			$("#hiddenEditUserLongitudeInput").val(employee.residence_longitude);
            $("#editUserEmailInput").val(employee.employee_email);
            $("#editUserPhoneInput").val(employee.employee_phone);
            $("#editUserWorkPhoneInput").val(employee.employee_workphone);
            $("#editUserForm input[name=employee_type]").val([employee.employee_type]);
            $("#editUserForm input[name=employee_mailing]").val([employee.employee_mailing]);
            $("#editUserForm input[name=employee_sms]").val([employee.employee_sms]);
            $("#editEmployeeDepartmentSelect").val(employee.employee_department);
            $("#editUserUsernameInput").val(employee.username);
            $("#userPopupDIV, #editUserDIV").show();
        }
        
        function viewEmployeePage(row){
			var actualRow = $(row).parents('tr');
			if (actualRow.hasClass('child')) {//Check if the current row is a child row
				actualRow = actualRow.prev();//If it is, then point to the row before it (its 'parent')
			}
            var employee = dTable.row(actualRow).data();
            var url = "<?= BASE_URL ?>" + "employeepage?employee_id=" + employee.employee_id;
		    window.open(url, "_blank");
        }
        
        function toggleMailing(row){
            var actualRow = $(row).parents('tr');
			if (actualRow.hasClass('child')) {//Check if the current row is a child row
				actualRow = actualRow.prev();//If it is, then point to the row before it (its 'parent')
			}
            var employee = dTable.row(actualRow).data();
            var mailing = 0;
            var message = "Turn E-mail notifications off for this user?"
            if (employee.employee_mailing == 0){
                mailing = 1;
                message = "Turn E-mail notifications on for this user?"
            }
            swal({
              title: 'Confirm action',
              text: message,
              type: 'error',
              showCancelButton: true,
              confirmButtonColor: '#3085d6',
              cancelButtonColor: '#d33',
              confirmButtonText: 'Yes'
            }).then(function () {
                var postData = { employee_id: employee.employee_id, employee_mailing: mailing };
                $.ajax({
                    type: "POST",
                    url: "employee/mailing",
                    data: postData,
                    success: function(msg) {
                        if (msg == "") {
                            swal(
                                'Success!',
                                'E-mail notification settings were successfully changed.',
                                'success'
                            );
                            getEmployees();
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
        
        function toggleSMS(row){
            var actualRow = $(row).parents('tr');
			if (actualRow.hasClass('child')) {//Check if the current row is a child row
				actualRow = actualRow.prev();//If it is, then point to the row before it (its 'parent')
			}
            var employee = dTable.row(actualRow).data();
            var sms = 0;
            var message = "Turn SMS notifications off for this user?"
            if (employee.employee_sms == 0){
                sms = 1;
                message = "Turn SMS notifications on for this user?"
            }
            swal({
              title: 'Confirm action',
              text: message,
              type: 'error',
              showCancelButton: true,
              confirmButtonColor: '#3085d6',
              cancelButtonColor: '#d33',
              confirmButtonText: 'Yes'
            }).then(function () {
                var postData = { employee_id: employee.employee_id, employee_sms: sms };
                $.ajax({
                    type: "POST",
                    url: "employee/sms",
                    data: postData,
                    success: function(msg) {
                        if (msg == "") {
                            swal(
                                'Success!',
                                'SMS notification settings were successfully changed.',
                                'success'
                            );
                            getEmployees();
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
    
        function hideEditUserPopup() {
            $("#userPopupDIV, #editUserDIV").hide();
        }
		
		function initMap(){
            var searchBox = new google.maps.places.SearchBox(document.getElementById('userResidenceInput'));
            var editSearchBox = new google.maps.places.SearchBox(document.getElementById('editUserResidenceInput'));
                    
            google.maps.event.addListener(searchBox, 'places_changed', function() {
                var places = searchBox.getPlaces();
                var i, place;
                for (i = 0; place = places[i]; i++) {
                    (function(place) {
                        var location = place.geometry.location;
                        $("#hiddenUserLatitudeInput").val(location.lat());
                        $("#hiddenUserLongitudeInput").val(location.lng());
                    }(place));
                }
            });
            
            google.maps.event.addListener(editSearchBox, 'places_changed', function() {
                var places = editSearchBox.getPlaces();
                var i, place;
                for (i = 0; place = places[i]; i++) {
                    (function(place) {
                        var location = place.geometry.location;
                        $("#hiddenEditUserLatitudeInput").val(location.lat());
                        $("#hiddenEditUserLongitudeInput").val(location.lng());
                    }(place));
                }
            });
		}
        
        function getDepartments() {
            $.ajax({
                type: "POST",
                url: "<?= BASE_URL ?>" + "department/get",
                data: null,
                dataType: "json",
                success: function(departments) {
                    $("#newEmployeeDepartmentSelect, #editEmployeeDepartmentSelect, #importDepartmentSelect").html("");
                    
                    for (var i = 0; i < departments.length; i++){
                        $("#newEmployeeDepartmentSelect, #editEmployeeDepartmentSelect, #importDepartmentSelect").append($('<option>', {
                            value: departments[i].department_id,
                            text: departments[i].department_name
                        }));
                    }
                }
            });
        }
        
        function getEmployees() {
            $.ajax({
                type: "POST",
                url: "<?= BASE_URL ?>" + "employees/listall",
                data: null,
                dataType: "json",
                success: function(employees) {
					$("#pushNotificationRecipientSelect").html("");
                    for (var i = 0; i < employees.length; i++){
						if (employees[i].employee_type == 1 && employees[i].employee_id != loggedEmployee){
							continue;
						}
                        $("#pushNotificationRecipientSelect").append($('<option>', {
                            value: employees[i].employee_id,
                            text: employees[i].employee_name + " " + employees[i].employee_surname
                        }));
                    }
                    if (dTable != null){
                        dTable.destroy();
                    }
                    dTable = $('#allUsersTable').DataTable({
                        "aaData": employees,
                        "columns": [
                            { "data": "department_name" },
                            { "data": "employee_name" },
                            { "data": "employee_surname" },
                            { "data": "employee_phone" },
                            { "data": "employee_workphone" },
                            { "data": "employee_email" },
                            { "data": "logged_in"},
                            { "data": "employee_active"},
                            { "defaultContent": ''}
                        ],
                        "columnDefs": [
                            {
                                // The `data` parameter refers to the data for the cell (defined by the
                                // `data` option, which defaults to the column being worked with, in
                                // this case `data: 0`.
                                "render": function ( data, type, row ) {
                                    if (data == 1){
                                        return "<label class='label label-success'>Online</label>";
                                    }else if (data == 0){
                                        return "<label class='label label-danger'>Offline</label>";
                                    }else{
                                        return "<label class='label label-warning'>Busy</label>"
                                    }
                                },
                                "targets": 6
                            },
                            {
                                // The `data` parameter refers to the data for the cell (defined by the
                                // `data` option, which defaults to the column being worked with, in
                                // this case `data: 0`.
                                "render": function ( data, type, row ) {
                                    if (data == 1){
                                        return "<label class='label label-success'>Active</label>";
                                    }else{
                                        return "<label class='label label-danger'>Inactive</label>";
                                    }
                                },
                                "targets": 7
                            },
                            {
                                // The `data` parameter refers to the data for the cell (defined by the
                                // `data` option, which defaults to the column being worked with, in
                                // this case `data: 0`.
                                "render": function ( data, type, row ) {
									if (row.employee_type == 1 && row.employee_id != loggedEmployee){
										return "";
									}
                                    var classNameMailing = "text-success";
                                    var classNameSMS = "text-success";
                                    var classNameToggle = "fa-toggle-on text-success";
                                    if (row.employee_mailing == 0){
                                        classNameMailing = "text-danger";
                                    }
                                    if (row.employee_sms == 0){
                                        classNameSMS = "text-danger";
                                    }
                                    if (row.employee_active == 0){
                                        classNameToggle = "fa-toggle-off text-danger";
                                    }
                                    return '<span onClick="showPushNotificationPopup(this)" data-toggle="tooltip" title="Send push notification" class="text-primary pointer pull-left"><i class="far fa-comment-alt"></i></span><span onClick="viewEmployeePage(this)" data-toggle="tooltip" title="View employee page" class="text-success pointer pull-left m-l-10"><i class="fas fa-th-list"></i></span><span onClick="showEditUserPopup(this)" data-toggle="tooltip" title="Edit" class="text-primary pull-left pointer m-l-10"><i class="fas fa-pencil-alt"></i></span><span onClick="toggleActivity(this)" data-toggle="tooltip" title="Toggle activity" class="pull-left m-l-10 pointer"><i class="fa ' + classNameToggle + '"></i></span><span onClick="toggleMailing(this)" data-toggle="tooltip" title="Toggle e-mail notifications" class="' + classNameMailing + ' pull-left m-l-10 pointer"><i class="fa fa-inbox"></i></span><span onClick="toggleSMS(this)" data-toggle="tooltip" title="Toggle SMS notifications" class="' + classNameSMS + ' pull-left m-l-10 pointer"><i class="fa fa-bell"></i></span>';
                                },
                                "targets": 8,
                                "orderable": false,
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
        
        function showPushNotificationPopup(row){
            var actualRow = $(row).parents('tr');
			if (actualRow.hasClass('child')) {//Check if the current row is a child row
				actualRow = actualRow.prev();//If it is, then point to the row before it (its 'parent')
			}
            var employee = dTable.row(actualRow).data();
            $("#pushNotificationRecipientSelect").val(employee.employee_id).trigger("change");
            $("#notificationPopup").show();
        }
        
        function hidePushNotificationPopup(){
            $("#pushNotificationForm")[0].reset();
            $("#notificationPopup").hide();
        }
        
        function toggleActivity(row){
            var actualRow = $(row).parents('tr');
			if (actualRow.hasClass('child')) {//Check if the current row is a child row
				actualRow = actualRow.prev();//If it is, then point to the row before it (its 'parent')
			}
            var employee = dTable.row(actualRow).data();
            var activity = 0;
            var aStatus = "inactive";
            if (employee.employee_active == 0){
                activity = 1;
                aStatus = "active";
            }
            swal({
              title: 'Confirm action',
              text: "Are you sure you want to set this employee to " + aStatus + " ?",
              type: 'error',
              showCancelButton: true,
              confirmButtonColor: '#3085d6',
              cancelButtonColor: '#d33',
              confirmButtonText: 'Yes'
            }).then(function () {
                var postData = { "employee_id": employee.employee_id, "employee_activity": activity };
                $.ajax({
                        type: "POST",
                        url: "employees/activity",
                        data: postData,
                        success: function(msg) {
                            if (msg == "") {
                                swal(
                                    'Success!',
                                    'Employees activity was successfully changed.',
                                    'success'
                                );
                                getEmployees();
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
        
        function deleteUser(row){
            var actualRow = $(row).parents('tr');
			if (actualRow.hasClass('child')) {//Check if the current row is a child row
				actualRow = actualRow.prev();//If it is, then point to the row before it (its 'parent')
			}
            var employee = dTable.row(actualRow).data();
            swal({
              title: 'Confirm action',
              text: "Are you sure you want to remove this employee?",
              type: 'error',
              showCancelButton: true,
              confirmButtonColor: '#3085d6',
              cancelButtonColor: '#d33',
              confirmButtonText: 'Yes, remove'
            }).then(function () {
                var values = { employee_id: employee.employee_id };
                $.ajax({
                    type: "POST",
                    url: "employees/delete",
                    data: values,
                    success: function(msg) {
                        if (msg == "") {
                            swal(
                                'Success!',
                                'Employee was successfully removed.',
                                'success'
                            );
                            getEmployees();
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
