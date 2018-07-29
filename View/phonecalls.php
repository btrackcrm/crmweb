<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
<!--<![endif]-->
<head>
	<meta charset="utf-8" />
	<title>Phone calls</title>
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
	<link href="<?= ASSETS_URL . "telinput/build/css/intlTelInput.css" ?>" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.6.9/sweetalert2.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.6.9/sweetalert2.min.css">
	<!-- ================== END PAGE LEVEL STYLE ================== -->
	
	<!-- ================== BEGIN BASE JS ================== -->
	<script src="<?= ASSETS_URL . "pace/pace.min.js" ?>" ></script>
	<!-- ================== END BASE JS ================== -->
</head>
<style>
    #callsTable{
        width: 100% !important;
    }
    
    .bottom25{
        margin-bottom: 25px;
    }
    
    .left25{
        margin-left: 25px;
    }
    
    .width15{
        width: 15%;
    }
    
    .blueIcon{
        font-size: 20px;
        color: #007aff;
        cursor: pointer;
    }
    
    .activeBG a{
        background: #00acac !important;
        color: white !important;
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
	
	.intl-tel-input {
        display: block;
    }
    
    .hover-underline:hover{
        cursor: pointer;
        text-decoration: underline;
    }
    
    #addCustomerDIV{
        width: 800px;
        height: auto;
        position: relative;
        margin: 5% auto 0px auto;
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
	
	.pointer{
		cursor: pointer;
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
    					<li class="has-sub active">
    						<a href="javascript:;">
    						    <b class="caret pull-right"></b>
    							<i class="ion-android-calendar"></i> 
    							<span id="eventSpan">Activities</span>
    						</a>
    						<ul class="sub-menu">
    						    <li><a id="eventLink" href="<?= BASE_URL . "events" ?>">Events</a></li>
    						    <li><a id="reminderLink" href="<?= BASE_URL . "reminders" ?>">Reminders</a></li>
    						    <li class="active"><a href="<?= BASE_URL . "calls" ?>">Phone calls</a></li>
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
							<h4 class="m-t-10 m-b-5">Phone calls</h4>
						</div>
						<!-- END profile-header-info -->
					</div>
					<!-- END profile-header-content -->
				</div>
			</div>
			<!-- end profile -->
            <div class="profile-content">
				<div class="row">
					<div class="col-md-12">
						<div class="pull-left bottom25 width15">
							<label>Show phone calls from:</label>
							<input type="text" id="dateInput" class="form-control" placeholder="Select a date" />
						</div>
						<div class="pull-left bottom25 left25 width15 admin-visible" hidden>
							<label>Display phone calls for:</label>
							<select id="employeeSelect" class="form-control" >
							</select>
						</div>
					</div>
					<div class="col-md-12">
						<div class="panel panel-primary">
							<div class="panel-heading">
								<div class="panel-heading-btn">
									<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
									<a href="getPhoneCalls()" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-repeat"></i></a>
									<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
									<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
								</div>
								<h4 class="panel-title">Phone calls</h4>
							</div>
							<div class="panel-body">
								<div class="dataTables_wrapper form-inline dt-bootstrap no-footer">
									<table id="callsTable" class="table table-striped">
										<thead>
											<tr>
												<th>Employee</th>
												<th>Customer</th>
												<th>Phone number</th>
												<th>Call start</th>
												<th>Duration</th>
												<th>Type</th>
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
		<!-- end #content -->
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
                                    <input id="customerContactInput" type="tel" name="customer_phone[]" class="tel-input form-control m-b-5" />
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
	<script src="<?= ASSETS_URL . "fullcalendar/lib/moment.min.js" ?>"></script>
	<link href="<?= ASSETS_URL . "DataTables/media/css/dataTables.bootstrap.min.css" ?>" rel="stylesheet" />
	<link href="<?= ASSETS_URL . "DataTables/extensions/Responsive/css/responsive.bootstrap.min.css" ?>" rel="stylesheet" />
	<script src="<?= ASSETS_URL . "DataTables/media/js/jquery.dataTables.js" ?>"></script>
	<script src="<?= ASSETS_URL . "DataTables/media/js/dataTables.bootstrap.min.js" ?>"></script>
	<script src="<?= ASSETS_URL . "DataTables/extensions/Responsive/js/dataTables.responsive.min.js" ?>"></script>
	<script src="<?= ASSETS_URL . "telinput/build/js/intlTelInput.min.js" ?>"></script>
	<script src="<?= ASSETS_URL . "telinput/build/js/utils.js" ?>"></script>
	<!-- ================== END PAGE LEVEL JS ================== -->
	
	<script>
	    var dTable;
	    var loggedEmployee = <?php echo json_encode($_SESSION["id"]); ?>;
	    var isAdmin = <?php echo json_encode($_SESSION["admin"]); ?>;
		var dateformat = <?php echo json_encode($_SESSION["dateformat"]); ?>;
		var timeformat = <?php echo json_encode($_SESSION["timeformat"]); ?>;
		var dpFormat;
		var geocoder;
		
		$(document).ready(function() {
			App.init();
			
			dpFormat = dateformat.replace("YYYY", "YY");
			dpFormat = dpFormat.toLowerCase();
			
			getMenuStatistics(loggedEmployee);
			
			$("#dateInput").datepicker({dateFormat: dpFormat});
			$("#dateInput").datepicker('setDate', new Date());
			
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
			
			if (isAdmin == 1){
			    $(".admin-visible").show();
    			getPhoneCallDates("");
    			getPhoneCallsDate("", moment($("#dateInput").val(), dateformat).format("YYYY-MM-DD"));
			}else{
			    getPhoneCallDates(loggedEmployee);
    			getPhoneCallsDate(loggedEmployee, moment($("#dateInput").val(), dateformat).format("YYYY-MM-DD"));
			}
			getEmployees();
			$("#employeeSelect, #dateInput").change(function(e){
			    var selectedVal = $("#employeeSelect option:selected" ).val();
			    getPhoneCallDates(selectedVal);
			    var selectedDate = $("#dateInput").val();
			    if (selectedDate != ""){
			        getPhoneCallsDate(selectedVal, moment(selectedDate, dateformat).format("YYYY-MM-DD"));
			    }
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
                            swal(
                                'Success',
                                'Customer was successfully added',
                                'success'
                            );
                            $("#addCustomerForm")[0].reset();
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
		});
		
		function initMap(){
		   
            
            var searchBox = new google.maps.places.SearchBox(document.getElementById('customerAddressInput'));

                    
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
  
            geocoder = new google.maps.Geocoder;
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
		
		function addEmail(){
		    $("#emailsDIV").append('<div class="m-t-5"><input type="email" name="customer_email[]" class="form-control" placeholder="E-mail"/></div>');
		}
		
		function updateRangeValue(){
		    $("#newCustomerRangeValue").html($("#newCustomerRangeInput").val());
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
		
		function getPhoneCallDates(employee_id){
		    var postData = { "employee_id": employee_id };
		    $.ajax({
                type: "POST",
                url: "<?= BASE_URL ?>" + "calls/getDates",
                data: postData,
                dataType: "json",
                success: function(dates) {
					console.log(dates);
                    var travelDays = [];
                    for (var i = 0; i < dates.length; i++){
                        travelDays.push(dates[i].datetime);
                    }
                    $("#dateInput").datepicker("destroy");
                    $("#dateInput").datepicker({ 
                        dateFormat: dpFormat,
                        beforeShowDay: function(date) {
                            var dateString = date.getFullYear() + "-" + ('0' + (date.getMonth() + 1)).slice(-2) + "-" + ('0' + date.getDate()).slice(-2);
                            if ($.inArray(dateString, travelDays) != -1) {
                                return [true, 'activeBG', ''];
                            }
                            return [true];
                        }
                    });
                }
		    });
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
		
		function getPhoneCalls(){
		    $.ajax({
                type: "POST",
                url: "<?= BASE_URL ?>" + "calls/get",
                data: null,
                dataType: "json",
                success: function(calls) {
                    if (dTable != null){
                        dTable.clear().rows.add(calls).draw(false);
                    }else{
						dTable = $('#callsTable').DataTable({
							"aaData": calls,
							"columns": [
								{ "data": "employee_id" },
								{ "data": "customer_id" },
								{ "data": "phonenumber" },
								{ "data": "call_start" },
								{ "data": "call_end" },
								{ "data": "type" },
								{ "defaultContent": "" }
							],
							"columnDefs": [
								
								{
									// The `data` parameter refers to the data for the cell (defined by the
									// `data` option, which defaults to the column being worked with, in
									// this case `data: 0`.
									"render": function ( data, type, row ) {
										if (row.employee_name == null){
											return "";
										}else{
											return row.employee_name + " " + row.employee_surname;
										}
									},
									"targets": 0
								},
								{
										// The `data` parameter refers to the data for the cell (defined by the
										// `data` option, which defaults to the column being worked with, in
										// this case `data: 0`.
										"render": function ( data, type, row ) {
											if (data != null){
												return "<a target='_blank' class='text-primary hover-underline' href='customerdetails?customer_id=" + data + "' >" + row.customer_name + '</a>';
											}else{
												return "Not in database";
											}
										},
										"targets": 1,
										orderable: false
								},
								{
									// The `data` parameter refers to the data for the cell (defined by the
									// `data` option, which defaults to the column being worked with, in
									// this case `data: 0`.
									"render": function ( data, type, row ) {
										var minutes = (new Date(row.call_end) - new Date(row.call_start)) / (1000 * 60); //get time difference in minutes
										minutes = Math.round(minutes * 100) / 100
										if (row.type == "Missed"){
											return "";
										}
										if (minutes < 1){
											return Math.round(minutes * 60) + " seconds";
										}else{
											return minutes +  " minutes";
										}
									},
									"targets": 4
								},
								{
									// The `data` parameter refers to the data for the cell (defined by the
									// `data` option, which defaults to the column being worked with, in
									// this case `data: 0`.
									"render": function ( data, type, row ) {
										if (data == "Incoming"){
											return '<label class="label label-success">Incoming</label>';
										}else if (data == "Outgoing"){
											return '<label class="label label-primary">Outgoing</label>';
										}else{
											return '<label class="label label-danger">Missed</label>';
										}
										
									},
									"targets": 5
								},
								{
									// The `data` parameter refers to the data for the cell (defined by the
									// `data` option, which defaults to the column being worked with, in
									// this case `data: 0`.
									"render": function ( data, type, row ) {
										if (row.customer_id == null){
											return "<span onClick='showNewCustomerPopup(this)'><i class='fas fa-address-book text-primary f-s-14 pointer pull-left'></i></span>";
										}
										return "";
									},
									"targets": 6
								}
								
							],
							responsive: true,
							dom: 'lfrtip'
						});
					}
                }
            });
		}
		
		function hideNewCustomerPopup() {
            $("#customerPopupDIV, #addCustomerDIV").hide();
        }
    
        function showNewCustomerPopup(row) {
            var phonecall = dTable.row($(row).parents('tr')).data();
            $("#customerContactInput").val(phonecall.phonenumber);
            $("#customerPopupDIV, #addCustomerDIV").show();
        }
		
		function getPhoneCallsDate(employee_id, datetime){
		    
		    var postData = { "employee_id": employee_id, "datetime": datetime };
		    $.ajax({
                type: "POST",
                url: "<?= BASE_URL ?>" + "calls/getDate",
                data: postData,
                dataType: "json",
                success: function(calls) {
                    if (dTable != null){
                        dTable.clear().rows.add(calls).draw(false);
                    }else{
						dTable = $('#callsTable').DataTable({
							"aaData": calls,
							"columns": [
								{ "data": "employee_id" },
								{ "data": "customer_id" },
								{ "data": "phonenumber" },
								{ "data": "call_start" },
								{ "data": "call_end" },
								{ "data": "type" },
								{ "defaultContent": "" }
							],
							"columnDefs": [
								
								{
									// The `data` parameter refers to the data for the cell (defined by the
									// `data` option, which defaults to the column being worked with, in
									// this case `data: 0`.
									"render": function ( data, type, row ) {
										if (row.employee_name == null){
											return "";
										}else{
											return row.employee_name + " " + row.employee_surname;
										}
									},
									"targets": 0
								},
								{
										// The `data` parameter refers to the data for the cell (defined by the
										// `data` option, which defaults to the column being worked with, in
										// this case `data: 0`.
										"render": function ( data, type, row ) {
											if (data != null){
												return "<a target='_blank' class='text-primary hover-underline' href='customerdetails?customer_id=" + data + "' >" + row.customer_name + '</a>';
											}else{
												return "Not in database";
											}
										},
										"targets": 1,
										orderable: false
								},
								{
									// The `data` parameter refers to the data for the cell (defined by the
									// `data` option, which defaults to the column being worked with, in
									// this case `data: 0`.
									"render": function ( data, type, row ) {
										var minutes = (new Date(row.call_end) - new Date(row.call_start)) / (1000 * 60); //get time difference in minutes
										minutes = Math.round(minutes * 100) / 100
										if (row.type == "Missed"){
											return "";
										}
										if (minutes < 1){
											return Math.round(minutes * 60) + " seconds";
										}else{
											return minutes +  " minutes";
										}
									},
									"targets": 4
								},
								{
									// The `data` parameter refers to the data for the cell (defined by the
									// `data` option, which defaults to the column being worked with, in
									// this case `data: 0`.
									"render": function ( data, type, row ) {
										if (data == "Incoming"){
											return '<label class="label label-success">Incoming</label>';
										}else if (data == "Outgoing"){
											return '<label class="label label-primary">Outgoing</label>';
										}else{
											return '<label class="label label-danger">Missed</label>';
										}
										
									},
									"targets": 5
								},
								{
									// The `data` parameter refers to the data for the cell (defined by the
									// `data` option, which defaults to the column being worked with, in
									// this case `data: 0`.
									"render": function ( data, type, row ) {
										if (row.customer_id == null){
											return "<span onClick='showNewCustomerPopup(this)'><i class='fas fa-address-book text-primary pointer f-s-14 pull-left'></i></span>";
										}
										return "";
									},
									"targets": 6
								}
							],
							responsive: true,
							dom: 'lfrtip'
						});
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
                    $("#employeeSelect").append($('<option>', {
                        value: "",
                        text: "All employees"
                    }));
                    for (var i = 0; i < employees.length; i++){
                        $("#employeeSelect").append($('<option>', {
                            value: employees[i].employee_id,
                            text: employees[i].employee_name + " " + employees[i].employee_surname
                        }));
                    }
                    if (isAdmin != 1){
                        $("#employeeSelect").val(loggedEmployee);
                    }
                }
            });
        }
		
	</script>
	<script async defer src="https://maps.googleapis.com/maps/api/js?v=3&key=AIzaSyDC7Pj2_CZRL3p1eJy1HdL0EFtO70D7JvI&callback=initMap&language=en&libraries=places"></script>
</body>
</html>
