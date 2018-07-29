<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
<!--<![endif]-->
<head>
	<meta charset="utf-8" />
	<title>Departments</title>
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
    <link href="<?= ASSETS_URL . "treant/treant/treant.css" ?>" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.6.9/sweetalert2.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.6.9/sweetalert2.min.css">
	<!-- ================== END PAGE LEVEL STYLE ================== -->
	
	<!-- ================== BEGIN BASE JS ================== -->
	<script src="<?= ASSETS_URL . "pace/pace.min.js" ?>" ></script>
	<!-- ================== END BASE JS ================== -->
</head>
<style>
    
    
    .Treant {
        overflow: auto;
    }
    
    #addUserDIV, #editUserDIV, #addDepartmentDIV, #editDepartmentDIV{
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
    
    .Treant > p { font-weight: bold; font-size: 12px; }
    
    .node-name { font-weight: bold;}
    
    .departmentNode{
        padding: 10px;
        -webkit-border-radius: 3px;
        -moz-border-radius: 3px;
        border-radius: 3px;
        background-color: #348fe2;
        width: 175px;
        font-size: 12px;
        color: #ffffff;
        text-align: center;
    }

    .regularNode {
        padding: 10px;
        -webkit-border-radius: 3px;
        -moz-border-radius: 3px;
        border-radius: 3px;
        background-color: #348fe2;
        width: 250px;
        font-size: 12px;
        color: #ffffff;
    }
    
    
    
    .regularNode p, .departmentNode p{
        margin: 0px;
    }

    .regularNode img {
        margin-right:  10px;
        width: 54px;
        height: 54px;
    }
    
    .Treant > a:link {
        color: #ffffff;
    }
    
    .Treant > a:visited {
        color: #ffffff;
    }
    
    .Treant > a:link:hover {
        color: white;
        text-decoration: none;
    }
    
    .pointer{
        cursor: pointer;
    }
    
    .department-node{
        text-align: center;
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
                            			    <li class="active"><a href="' . BASE_URL . 'departments">Structure</a></li>
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
							<h4 class="m-t-10 m-b-5">Departments</h4>
							<div class="m-t-10">
								<button class="btn btn-white btn-sm" onclick="showNewDepartmentPopup()"><i class="fas fa-plus text-primary"></i> Add a department</button>
							</div>
						</div>
						<!-- END profile-header-info -->
					</div>
					<!-- END profile-header-content -->
					<!-- BEGIN profile-header-tab -->
					<ul class="profile-header-tab nav nav-tabs">
						<li class="nav-item active"><a href="#department-overview" class="nav-link" data-toggle="tab">OVERVIEW</a></li>
						<li class="nav-item"><a href="#department-structure" class="nav-link" data-toggle="tab">COMPANY STRUCTURE</a></li>
					</ul>
					<!-- END profile-header-tab -->
				</div>
			</div>
			<!-- end profile -->
            <div class="profile-content">
				<div class="tab-content">
					<div class="tab-pane fade in active" id="department-overview">
						<div class="row">
							<div class="col-md-12">
								<div class="panel panel-primary">
									<div class="panel-heading">
										<div class="panel-heading-btn">
											<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
											<a href="getDepartments()" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-repeat"></i></a>
											<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
											<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
										</div>
										<h4 class="panel-title">Departments</h4>
									</div>
									<div class="panel-body">
										<div class="dataTables_wrapper form-inline dt-bootstrap no-footer">
											<table id="allDepartmentsTable" class="table table-striped">
												<thead>
													<tr>
														<th>
															Department name
														</th>
														<th>Number of members</th>
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
					<div class="tab-pane fade" id="department-structure">
						<div class="row">
							<div class="col-md-12">
								<div class="bg-white p-15">
									<h4>Company organisational chart<br><small>Departments and members</small></h4>
									<div id="department-tree">
										
									</div>
								</div>
								
							</div>
						</div>
					</div>
				</div>
			</div>
        <div class="popupContainer" id="userPopupDIV" hidden>
            <div class="panel panel-primary" id="addDepartmentDIV" hidden>
                <div class="panel-heading">
                    <div class="panel-heading-btn">
                        <button class="btn btn-xs btn-icon btn-circle btn-default" onClick="hideNewDepartmentPopup()"><i class="fa fa-times"></i>
                        </button>
                    </div>
                    <h4 class="panel-title">Add a department</h4>
                </div>
                <div class="panel-body">
                    <form id="addDepartmentForm" action="<?= BASE_URL . "department/add" ?>" method="post" class="form-horizontal">
                        <div class="form-group">
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <label>Department name: <span class="red">*</span>
                                </label>
                                <input type="text" name="department_name" class="form-control" placeholder="Department name" required />
                            </div>
                        </div>
                </div>
				<div class="panel-footer">
					<button class="btn btn-success">Add department</button>
					<button type="button" class="btn btn-primary pull-right" onClick="hideNewDepartmentPopup()">Close</button>
                    </form>
				</div>
            </div>
            <div class="panel panel-primary" id="editDepartmentDIV" hidden>
                <div class="panel-heading">
                    <div class="panel-heading-btn">
                        <button class="btn btn-xs btn-icon btn-circle btn-default" onClick="hideEditDepartmentPopup()"><i class="fa fa-times"></i>
                        </button>
                    </div>
                    <h4 class="panel-title">Edit department</h4>
                </div>
                <div class="panel-body">
                    <form id="editDepartmentForm" action="<?= BASE_URL . "department/edit" ?>" method="post" class="form-horizontal">
                        <input type="hidden" id="editDepartmentIDInput" name="department_id" />
                        <div class="form-group">
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <label>Department name: <span class="red">*</span>
                                </label>
                                <input id="editDepartmentNameInput" type="text" name="department_name" class="form-control" placeholder="Department name" required />
                            </div>
                        </div>
                </div>
				<div class="panel-footer">
					<button class="btn btn-success">Edit department</button>
					<button type="button" class="btn btn-primary pull-right" onClick="hideEditDepartmentPopup()">Close</button>
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
	<script src="<?= ASSETS_URL . "orgchart/dist/js/jquery.orgchart.min.js" ?>"></script>
	<link href="<?= ASSETS_URL . "orgchart/dist/css/jquery.orgchart.min.css" ?>" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/js/bootstrap-datetimepicker.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/css/bootstrap-datetimepicker.min.css" rel="stylesheet"/>
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
	<script src="<?= ASSETS_URL . "morris/raphael.min.js" ?>"></script>
	<script src="<?= ASSETS_URL . "treant/treant/treant.js" ?>"></script>
	<!-- ================== END PAGE LEVEL JS ================== -->
	
	<script>
	
	    var mTable;
	    var loggedEmployee = <?php echo json_encode($_SESSION["id"]); ?>;
		var dateformat = <?php echo json_encode($_SESSION["dateformat"]); ?>;
		var timeformat = <?php echo json_encode($_SESSION["timeformat"]); ?>;
	    var departmentArray = [];
	    var employeeArray = [];
		var tChart;
	    
		$(document).ready(function() {
			App.init();
			getMenuStatistics(loggedEmployee);
			
			$("a[href='#department-structure']").on('shown.bs.tab', function(){
				drawOrgChart(departmentArray);
            });
			
            $('#addDepartmentForm').on('submit', function(e) { //use on if jQuery 1.7+
                e.preventDefault();
                $.ajax({
                    type: "POST",
                    url: "department/add",
                    data: $("#addDepartmentForm").serialize(),
                    success: function(msg) {
                        if (msg == "") {
                            swal(
                                'Success!',
                                'Department was successfully added.',
                                'success'
                            );
                            getDepartments();
                            hideNewDepartmentPopup();
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
            
            $('#editDepartmentForm').on('submit', function(e) { //use on if jQuery 1.7+
                e.preventDefault();
                $.ajax({
                    type: "POST",
                    url: "department/edit",
                    data: $("#editDepartmentForm").serialize(),
                    success: function(msg) {
                        if (msg == "") {
                            swal(
                                'Success!',
                                'Department was successfully edited.',
                                'success'
                            );
                            getDepartments();
                            hideEditDepartmentPopup();
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
            getDepartments();
		});
		
		
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
        
        function hideNewDepartmentPopup() {
            $("#userPopupDIV, #addDepartmentDIV").hide();
            $("#addDepartmentForm")[0].reset();
        }
    
        function showNewDepartmentPopup() {
            $("#userPopupDIV, #addDepartmentDIV").show();
        }
    
        
        function getDepartments() {
            $.ajax({
                type: "POST",
                url: "<?= BASE_URL ?>" + "department/get",
                data: null,
                dataType: "json",
                success: function(departments) {
                    departmentArray = departments;
                    if (mTable != null){
                        mTable.destroy();
                    }
                    mTable = $('#allDepartmentsTable').DataTable({
                        "aaData": departments,
                        "columns": [
                            { "data": "department_name" },
							{ "data": "department_members" },
							{ "data": "created_on" },
                            { "defaultContent": '<span onClick="showEditDepartmentPopup(this)" data-toggle="tooltip" title="Edit" class="text-primary pull-left pointer"><i class="fas fa-pencil-alt"></i></span><span onClick="deleteDepartment(this)" data-toggle="tooltip" title="Delete" class="text-danger pull-left m-l-10 pointer"><i class="fa fa-trash"></i></span>'}
                        ],
                        "columnDefs": [
                            {
                                "orderable": false,
                                "targets": 1
                            },
							{
								"render": function ( data, type, row ) {
									return moment(data).format(dateformat + ", " + timeformat);
								},
                                "orderable": false,
                                "targets": 2
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
		
		function drawOrgChart(departments){
			$.ajax({
                        type: "POST",
                        url: "<?= BASE_URL ?>" + "employees/list",
                        data: null,
                        dataType: "json",
                        success: function(employees) {
                            employeeArray = employees;
                            var companyDepartments = [];
                            $("#department-tree").html("");
                            for (var i = 0; i < departments.length; i++){
                                var department = departments[i];
                                var departmentEmployees = [];
                                for (var j = 0; j < employees.length; j++){
									var imgURL = "http://www.sheffield.com/wp-content/uploads/2013/06/placeholder.png";
                                    if (employees[j].employee_department == department.department_id){
										if (employees[j].profile_image != ""){
											imgURL = "<?= IMG_URL ?>" + employees[j].profile_image;
										}
                                        departmentEmployees.push({ HTMLclass: 'regularNode', link: { href: "employeepage?employee_id=" + employees[j].employee_id, target: "_blank" }, text: { name: employees[j].employee_name + " " + employees[j].employee_surname, title: employees[j].employee_email, contact: employees[j].employee_phone }, image: imgURL});
                                    }
                                }
                                var memberString = " members";
                                if (departmentEmployees.length == 1){
                                    memberString = " member";
                                }
                                companyDepartments.push({ HTMLclass: 'departmentNode', text: { name: department.department_name, title: departmentEmployees.length + memberString }, children: departmentEmployees, stackChildren: true });
                            }
                            var chart_config = {
                                chart: {
                                    container: "#department-tree",
                                    connectors: {
                                        type: "step",
                                        style: {
                    						'stroke': '#222',
                    					}
                                    }
                                },
                                nodeStructure: {
                                    HTMLclass: 'departmentNode',
                                    text: {
                                        name: "Your company"
                                    },
                                    children: companyDepartments
                                }
                            };
                            if (tChart != null){
								tChart.destroy();
							}
                            tChart = new Treant(chart_config);
                        }
                    });
		}
        
        function moveEmployeeToDepartment(employee_id, department_id){
            swal({
              title: 'Confirm action',
              text: "Are you sure you want to move this employee to this department?",
              type: 'info',
              showCancelButton: true,
              confirmButtonColor: '#3085d6',
              cancelButtonColor: '#d33',
              confirmButtonText: 'Yes, move'
            }).then(function () {
                var postData = { department_id: department_id, employee_id: employee_id };
                $.ajax({
                    type: "POST",
                    url: "employee/department",
                    data: postData,
                    success: function(msg) {
                        swal(
                            'Success!',
                            'Employee was successfully moved to new department.',
                            'success'
                        );
                    }
                });
            });
        }
        
        function showEditDepartmentPopup(row){
			var actualRow = $(row).parents('tr');
			if (actualRow.hasClass('child')) {//Check if the current row is a child row
				actualRow = actualRow.prev();//If it is, then point to the row before it (its 'parent')
			}
            var department = mTable.row(actualRow).data();
            $("#editDepartmentIDInput").val(department.department_id);
            $("#editDepartmentNameInput").val(department.department_name);
            $("#userPopupDIV, #editDepartmentDIV").show();
        }
        
        function hideEditDepartmentPopup(){
            $("#userPopupDIV, #editDepartmentDIV").hide();
            $("#editDepartmentForm")[0].reset();
        }
        
        function deleteDepartment(row){
            var department = mTable.row($(row).parents('tr')).data();
			if (department.department_members != 0){
				swal({
				  title: 'Error',
				  text: "Department must be empty before it can be removed.",
				  type: 'error'
				});
				return;
			}
            swal({
              title: 'Confirm action',
              text: "Are you sure you want to remove this department?",
              type: 'error',
              showCancelButton: true,
              confirmButtonColor: '#3085d6',
              cancelButtonColor: '#d33',
              confirmButtonText: 'Yes, remove'
            }).then(function () {
                var values = { department_id: department.department_id };
                $.ajax({
                    type: "POST",
                    url: "department/delete",
                    data: values,
                    success: function(msg) {
                        if (msg == "") {
                            swal(
                                'Success!',
                                'Department was successfully removed.',
                                'success'
                            );
                            getDepartments();
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
</body>
</html>
