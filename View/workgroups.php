<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
<!--<![endif]-->
<head>
	<meta charset="utf-8" />
	<title>Workgroups</title>
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
	<!-- ================== END PAGE LEVEL STYLE ================== -->
	
	<!-- ================== BEGIN BASE JS ================== -->
	<script src="<?= ASSETS_URL . "pace/pace.min.js" ?>" ></script>
	<!-- ================== END BASE JS ================== -->
</head>
<style>
    .image-capt{
            position: absolute;
            top: 15px;
            left: 0px;
            color: rgb(255, 255, 255);
            background: rgba(0, 0, 0, 0.6);
            padding: 5px 15px;
            margin: 0px;
    }
    
    #addWorkgroupDIV{
        width: 700px;
        height: auto;
        position: relative;
        margin: 10% auto 0px auto;
    }
    
    .pointer{
        cursor: pointer;
    }
    
    .card-img-top {
        border-top-right-radius: 4px;
        border-top-left-radius: 4px;
        width: 100%;
        height: 200px;
        position: relative;
    }
    
    .card{
        max-width: 20%;
    }
	
	.text-gray{
		color: #707478;
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
    					<li class="active">
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
				<div class="profile-header">
					<!-- BEGIN profile-header-cover -->
					<div class="profile-header-cover"></div>
					<!-- END profile-header-cover -->
					<!-- BEGIN profile-header-content -->
					<div class="profile-header-content">
						<!-- BEGIN profile-header-info -->
						<div class="profile-header-info">
							<h4 class="m-t-10 m-b-5">Workgroups</h4>
							<div class="m-t-10">
								<button class="btn btn-white btn-sm" onClick="showNewWorkgroupPopup()"><i class="fas fa-plus text-primary m-r-5"></i> Create a workgroup</button>
								<button id="toggleBtn" class="btn btn-white btn-sm" onClick="toggleInactive()"><i class="fas fa-eye text-primary m-r-5"></i> Show inactive workgroups</button>
							</div>
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
						<div id="workgroupList">
							
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- end #content -->
		<div class="popupContainer" id="workgroupPopup" hidden>
		    <div class="panel panel-primary" id="addWorkgroupDIV" hidden>
                    <div class="panel-heading">
                        <div class="panel-heading-btn">
                            <button onclick="hideNewWorkgroupPopup()" class="btn btn-xs btn-icon btn-circle btn-default"><i class="fa fa-times"></i></button>
                        </div>
                        <h4 class="panel-title">New workgroup</h4>
                    </div>
                    <div class="panel-body">
                        <form id="addWorkgroupForm" action="<?= BASE_URL . "workgroup/add" ?>" method="post" class="form-horizontal">
                            <div class="form-group">
                                <div class="col-md-12">
                                    <div class="radio radio-css radio-inline radio-success">
                                        <input type="radio" name="workgroup_type" id="ncr1" value="0" checked>
                                        <label for="ncr1">
                                            Public workgroup
                                        </label>
                                    </div>
                                    <div class="radio radio-css radio-inline radio-danger">
                                        <input type="radio" name="workgroup_type" id="ncr2" value="1">
                                        <label for="ncr2">
                                            Private workgroup
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-12">
                                    <label>Workgroup name: <span class="text-danger">*</span></label>
                                    <input type="text" name="workgroup_name" class="form-control" placeholder="Task subject" required />
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-xs-12 col-sm-6 col-md-12">
                                    <label>Members:</label>
                                    <select multiple id="newWorkgroupEmployeeSelect" name="members[]" class="form-control">
                                        
                                    </select>
                                </div> 
                            </div>
                            <div class="form-group">
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <label>Description: <span class="text-danger">*</span></label>
                                    <textarea class="form-control" name="workgroup_description" rows="4" placeholder="Enter workgroup description" required></textarea>
                                </div>
                            </div>
                            <button class="btn material success pull-left">Create workgroup</button>
                            <button class="btn material danger pull-right" type="button" onClick="hideNewWorkgroupPopup()">Cancel</button>
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
	<script src="<?= ASSETS_URL . "select2/dist/js/select2.full.min.js" ?>"></script>
	<script src="<?= ASSETS_URL . "fullcalendar/lib/moment.min.js" ?>"></script>
	<!-- ================== END PAGE LEVEL JS ================== -->
	
	<script>
	    var dTable;
	    var workgroupArray = [];
	    var days = ['Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'];
	    var months = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];
	    var loggedEmployee = <?php echo json_encode($_SESSION["id"]); ?>;
	    var isAdmin = <?php echo json_encode($_SESSION["type"]); ?>;
		var hideInactive = true;
		
		$(document).ready(function() {	
			getMenuStatistics(loggedEmployee);
			getWorkgroups();
			getEmployees();
			$("#newWorkgroupEmployeeSelect").select2({ width: "100%" });
			$('#addWorkgroupForm').on('submit', function(e) { //use on if jQuery 1.7+
			    e.preventDefault();
                $.ajax({
                    type: "POST",
                    url: "workgroup/add",
                    data: $("#addWorkgroupForm").serialize(),
                    success: function(msg) {
                        if (msg == "") {
                            swal(
                                'Success',
                                'Workgroup was successfully created',
                                'success'
                            );
                            getWorkgroups();
                            hideNewWorkgroupPopup();
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
			App.init();
		});
		
		function toggleInactive(){
			hideInactive = !hideInactive;
			if (!hideInactive){
				$("#toggleBtn").html('<i class="fas fa-eye-slash text-primary m-r-5"></i> Hide inactive workgroups</i>');
			}else{
				$("#toggleBtn").html('<i class="fas fa-eye text-primary m-r-5"></i> Show inactive workgroups</i>');
			}
			getWorkgroups();
		}
		
		function getWorkgroups(){
		    $.ajax({
                type: "POST",
                url: "<?= BASE_URL ?>" + "workgroups/get",
                data: null,
                dataType: "json",
                success: function(workgroups) {
                    var workgroupContent = "";
                    workgroupArray = workgroups;
                    var count = 0;
                    for (var i = 0; i < workgroups.length; i++){
                        var workgroup = workgroups[i];
						if (hideInactive && workgroup.active == 0){
							continue;
						}
                        var members = workgroup.users;
						var moderators = workgroup.moderators;
						var owner = workgroup.owner_id;
						var isMember = members.indexOf(loggedEmployee) != -1 || moderators.indexOf(loggedEmployee) != -1 || owner == loggedEmployee;
						var isOwner = owner == loggedEmployee;
                        if (workgroup.type == 1 && !isMember){ //if workgroup is private and we're not a part of workgroup, don't show it.
                            continue;
                        }
						
						var joinBtn = '<div class="card-text"><button class="btn btn-danger btn-sm" onClick="leaveWorkgroup(' + i + ')">Leave workgroup</button></div>';
						if (isOwner && workgroup.active == 1){
							joinBtn = '<div class="card-text"><button class="btn btn-danger btn-sm" onClick="deactivateWorkgroup(' + i + ')">Deactivate workgroup</button></div>';
						}else if (isOwner && workgroup.active == 0){
							joinBtn = '<div class="card-text"><button class="btn btn-success btn-sm" onClick="reactivateWorkgroup(' + i + ')">Reactivate workgroup</button></div>';
						}else if (!isMember){
							joinBtn = '<div class="card-text"><button class="btn btn-primary btn-sm" onClick="sendJoinRequest(' + i + ')">Join workgroup</button></div>';
						}
                        
                        if (count == 0){
                            workgroupContent += '<div class="card-group">';
                        }
                        workgroupContent += '<div class="card pointer" >' +
							'<img class="card-img-top" onClick="goToWorkgroup(' + i + ')" src="/assets/img/gallery/gallery-' + (i + 1) + '.jpg" alt="Card image cap">' +
							'<div class="image-capt">Created ' + moment(workgroup.created_on).format("dddd, Do MMMM YYYY") + '</div>' +
							'<div class="card-block">' + 
								'<h4 class="card-title" onClick="goToWorkgroup(' + i + ')">' +  workgroup.name + '<br><p class="text-gray f-s-12 m-t-5">' + workgroup.users.split(",").length + ' members<span class="pull-right">by <span class="text-primary">' + workgroup.employee_name + " " + workgroup.employee_surname + '</span></span></p></h4>' +
								'<p class="card-text" onClick="goToWorkgroup(' + i + ')"><strong>Description</strong><br>' + workgroup.description.substr(0, 255).trim() + '</p>' +
								joinBtn +
							'</div>' +
						'</div>';
						
						count ++;
						
						if (count == 5 || i == workgroups.length - 1){
						    workgroupContent += '</div>';
						    count = 0;
						}
                        //workgroupContent += '<div class="media media-sm" onClick="goToWorkgroup(' + i + ')"><a class="media-left" href="javascript:;"><img src="' + "<?= IMG_URL ?>" + 'user-1.jpg" alt="" class="media-object"></a><div class="media-body"><h4 class="media-heading">' + workgroup.name + '</h4><p>' + workgroup.description.substr(0, 255).trim() + "..." + '</p></div></div>'
                    }
                    $("#workgroupList").html(workgroupContent);
                }
		    });
		}
		
		function showNewWorkgroupPopup(){
		    $("#workgroupPopup, #addWorkgroupDIV").show();
		}
		
		function hideNewWorkgroupPopup(){
		    $("#addWorkgroupForm")[0].reset();
		    $("#workgroupPopup, #addWorkgroupDIV").hide();
		}
		
		function goToWorkgroup(index){
		    var workgroup = workgroupArray[index];
		    var members = workgroup.users;
			var moderators = workgroup.moderators;
			var owner = workgroup.owner_id;
			if (workgroup.active == 0 && owner != loggedEmployee){
				swal(
                    'Entry prohibited',
                    'You cannot view this workgroup since it has been deactivated by the owner. ',
                    'error'
                );
			}else if (members.indexOf(loggedEmployee) != -1 || moderators.indexOf(loggedEmployee) != -1 || owner == loggedEmployee){
		        location.href = "<?= BASE_URL ?>" + "workgroupdetails?workgroup_id=" + workgroup.workgroup_id;
		    }else{
		        swal(
                    'Entry prohibited',
                    'You cannot view this workgroup since you\'re not a member. ',
                    'error'
                );
		    }
		}

		function sendJoinRequest(index){
			var workgroup = workgroupArray[index];
			swal({
              title: 'Confirm action',
              text: "Are you sure you want to join this workgroup?",
              type: 'info',
              showCancelButton: true,
              confirmButtonColor: '#3085d6',
              cancelButtonColor: '#d33',
              confirmButtonText: 'Yes'
            }).then(function () {
				var postData = { "workgroup_id": workgroup.workgroup_id};
				$.ajax({
					type: "POST",
					url: "<?= BASE_URL ?>" + "workgroup/request",
					data: postData,
					success: function(msg) {
						if (msg == ""){
							swal(
									'Success',
									'Request to join workgroup has been successfully sent',
									'success'
								);
							getWorkgroups();
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
		}
		
		function leaveWorkgroup(index){
			var workgroup = workgroupArray[index];
			swal({
              title: 'Confirm action',
              text: "Are you sure you want to leave this workgroup?",
              type: 'info',
              showCancelButton: true,
              confirmButtonColor: '#3085d6',
              cancelButtonColor: '#d33',
              confirmButtonText: 'Yes'
            }).then(function () {
				var postData = { "workgroup_id": workgroup.workgroup_id};
				$.ajax({
					type: "POST",
					url: "<?= BASE_URL ?>" + "workgroup/leave",
					data: postData,
					success: function(msg) {
						if (msg == ""){
							swal(
									'Success',
									'Workgroup left.',
									'success'
								);
							getWorkgroups();
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
		}
		
		function deactivateWorkgroup(index){
			var workgroup = workgroupArray[index];
			swal({
              title: 'Confirm action',
              text: "Are you sure you want to deactivate this workgroup?",
              type: 'info',
              showCancelButton: true,
              confirmButtonColor: '#3085d6',
              cancelButtonColor: '#d33',
              confirmButtonText: 'Yes'
            }).then(function () {
				var postData = { "workgroup_id": workgroup.workgroup_id};
				$.ajax({
					type: "POST",
					url: "<?= BASE_URL ?>" + "workgroup/deactivate",
					data: postData,
					success: function(msg) {
						if (msg == ""){
							swal(
									'Success',
									'Workgroup deactivated.',
									'success'
								);
							getWorkgroups();
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
		}
		
		function reactivateWorkgroup(index){
			var workgroup = workgroupArray[index];
			swal({
              title: 'Confirm action',
              text: "Are you sure you want to reactivate this workgroup?",
              type: 'info',
              showCancelButton: true,
              confirmButtonColor: '#3085d6',
              cancelButtonColor: '#d33',
              confirmButtonText: 'Yes'
            }).then(function () {
				var postData = { "workgroup_id": workgroup.workgroup_id};
				$.ajax({
					type: "POST",
					url: "<?= BASE_URL ?>" + "workgroup/reactivate",
					data: postData,
					success: function(msg) {
						if (msg == ""){
							swal(
									'Success',
									'Workgroup reactivated.',
									'success'
								);
							getWorkgroups();
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
                    var lastDepartment = null;
                    for (var i = 0; i < employees.length; i++){
                        if (employees[i].employee_id != loggedEmployee){
                            if (lastDepartment == null){
                                $("#newWorkgroupEmployeeSelect").append("<optgroup label='" + employees[i].department_name + "'>");
                                lastDepartment = employees[i].department_name;
                            }else if (employees[i].department_name != lastDepartment){
                                $("#newWorkgroupEmployeeSelect").append("</optgroup><optgroup label='" + employees[i].department_name + "'>");
                                lastDepartment = employees[i].department_name;
                            }
                            $("#newWorkgroupEmployeeSelect").append($('<option>', {
                                value: employees[i].employee_id,
                                text: employees[i].employee_name + " " + employees[i].employee_surname
                            }));
                        }
                    }
                    $("#newWorkgroupEmployeeSelect").append("</optgroup>");
                    
                }
            });
        }
	</script>
</body>
</html>
