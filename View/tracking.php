<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
<!--<![endif]-->
<head>
	<meta charset="utf-8" />
	<title>Tracking</title>
	<meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport" />
	<meta content="" name="description" />
	<meta content="" name="author" />
	
	<!-- ================== BEGIN BASE CSS STYLE ================== -->
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
	<link href="<?= ASSETS_URL . "jquery-ui/themes/base/minified/jquery-ui.min.css" ?>" rel="stylesheet" />
	<link href="<?= ASSETS_URL . "bootstrap/css/bootstrap.min.css" ?>" rel="stylesheet" />
	<link href="<?= ASSETS_URL . "font-awesome/css/font-awesome.min.css" ?>" rel="stylesheet" />
	<link href="<?= ASSETS_URL . "ionicons/css/ionicons.min.css" ?>" rel="stylesheet" />
	<link href="<?= ASSETS_URL . "flag-icon/css/flag-icon.css" ?>" rel="stylesheet" />
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
    <link rel="stylesheet" type="text/css" href="https://js.cit.api.here.com/v3/3.0/mapsjs-ui.css" />
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css">
	<link href="<?= ASSETS_URL . "jquery-file-upload/blueimp-gallery/blueimp-gallery.min.css" ?>" rel="stylesheet" />
    <link href="<?= ASSETS_URL . "jquery-file-upload/css/jquery.fileupload.css" ?>" rel="stylesheet" />
	<link href="<?= ASSETS_URL . "jquery-file-upload/css/jquery.fileupload-ui.css" ?>" rel="stylesheet" />
	<!-- ================== END PAGE LEVEL STYLE ================== -->
	
	<!-- ================== BEGIN BASE JS ================== -->
	
	<!-- ================== END BASE JS ================== -->
</head>
<style>
	
	
	#travelOrderDIV, #editTravelOrderDIV, #travelOrderPreviewDIV{
        width: 700px;
        height: auto;
        position: relative;
        margin: 80px auto 0px auto;
    }
    
    #mapDIV{
        width: 800px;
        height: auto;
        position: relative;
        margin: 5% auto 0px auto;
    }
	
	#popupMap{
		width: 100%;
		height: 500px;
	}
	
    .white{
        color: #fff;
    }
	
	option {
	  /* wrap text in compatible browsers */
	  -moz-white-space:pre-wrap; 
	  -o-white-space:pre-wrap; 
	  white-space:pre-wrap; 

	  /* hide text that can't wrap with an ellipsis */
	  overflow: hidden;
	  text-overflow:ellipsis;

	  /* add border after every option */
	  border-bottom: 1px solid #DDD;
	}
    
    .yellow{
        color: #FFFF00;
    }
    
    .sidebar-stats{
        font-size: 24px;
        font-weight: 300;
        color: #fff;
        margin-bottom: 10px;
    }
    
    .sidebar-stats small{
            font-size: 20px;
            color: #6d6d6d;
            color: rgba(255,255,255,.5);
            display: block;
    }
    
    .map-float-table {
        position: absolute;
        left: 10px;
        bottom: 35px;
        background: url(../img/transparent/black-0.6.png);
        background: rgba(0, 0, 0, .7);
    }
    
    .map-float-stops {
        position: absolute;
        left: 340px;
        bottom: 35px;
        background: url(../img/transparent/black-0.6.png);
        background: rgba(0, 0, 0, .7);
    }
    
    .map-float-graph{
        position: absolute;
        bottom: 35px;
        left: 800px;
        background: url(../img/transparent/black-0.6.png);
        background: rgba(0, 0, 0, .7);
    }
    
    .height-350{
        height: 350px;
    }
    
    .table.table-inverse>tbody>tr>td, .table.table-inverse>tbody>tr>th, .table.table-inverse>tfoot>tr>td, .table.table-inverse>tfoot>tr>th, .table.table-inverse>thead>tr>td, .table.table-inverse>thead>tr>th {
        border-color: #999!important;
        border-color: rgba(0, 0, 0, .2)!important;
        background: 0 0!important;
        width: 50%;
    }
    
    .infoHeader{
        margin-bottom: 5px;
        margin-top: 5px;
    }
    

    
    .mapIcon{
        display: inline-block;
        font-size: 17px;
        line-height: 25px;
        color: #6d6d6d;
        text-align: center;
        vertical-align: bottom;
    }
    
    .td33>tbody>tr>td, .td33>tbody>tr>th, .td33>tfoot>tr>td, .td33>tfoot>tr>th, .td33>thead>tr>td, .td33>thead>tr>th {
        border-color: #999!important;
        border-color: rgba(0, 0, 0, .2)!important;
        background: 0 0!important;
        width: 33% !important;
    }
	
	.width-150{
		width: 150px;
	}
	
	.width-200{
		width: 200px;
	}
    
    .pointer{
        cursor: pointer;
    }
    
    .H_ib_close > svg.H_icon {
        display: block;
        width: 2em;
        height: 2em;
        fill: #a4aeb2;
        color: #a4aeb2;
    }
    
    .H_ib_body {
        background: white;
        position: absolute;
        bottom: .5em;
        padding: 5px;
        border-radius: .2em;
        margin-right: -1em;
        right: 0;
        -webkit-box-shadow: 0px 0px 5px rgba(33, 33, 33, 0.4);
        -moz-box-shadow: 0px 0px 5px rgba(33, 33, 33, 0.4);
        box-shadow: 0px 0px 5px rgba(33, 33, 33, 0.4);
    }
	
    .H_ib_content {
        min-width: 300px;
        margin: .2em 0;
        padding: 0 .2em;
        font-size: 14px;
        color: #444444;
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
    
    .activeBG a{
        background: #00acac !important;
        color: white !important;
    }
    
    #bottomBar{
		position: absolute;
        height: 310px;
		left: 220px;
		right: 300px;
		bottom: 0px;
    }
	
	#speedGraph{
		width: 100%;
		height: 100%;
	}
	
	.page-sidebar-minified #bottomBar {
		left: 60px;
	}
    
    #unknownStopsTable, #eventTbl, #eventsTable, #travelOrdersTable{
        width: 100% !important;
    }
    
    .menu-btn{
        margin-top: 22px;
    }
	
	.hover-underline:hover{
        cursor: pointer;
        text-decoration: underline;
    }
	
	.sidebar-tracking {
		position: absolute;
		padding-top: 50px;
		z-index: 1010;
		-webkit-transform: translateZ(0);
		transform: translateZ(0);
		background: #ffffff;
		width: 300px;
		right: 0;
		top: 0;
		bottom: 0;
		border-left: 1px solid #e7e7e7;
	}
	
	.sidebar-seperator{
		background-color: #e8e8e8;
	}
	
	.input-search{
		width: 100%;
		padding: 5px 30px 5px 15px;
		height: 32px;
		background: #f2f3f4;
		border-color: #f2f3f4;
		border-radius: 30px;
	}
	
	.admin-visible{
		display: none;
	}
	
	.span-search{
		position: absolute;
		right: 15px;
		top: 8px;
		border: none;
		background: 0 0;
		border-radius: 0 30px 30px 0;
	}
	
	.p-relative{
		position: relative;
	}
	
	.widget-list-item:hover{
		background-color: #e8f6fc;
		cursor: pointer;
	}
	
	.gray-input{
		width: 100%;
		padding: 6px 12px;
		border: none;
		background-color: #f2f3f4;
	}
</style>
<body>
	<!-- begin #page-loader -->
	<div id="page-loader" class="fade in"><span class="spinner"></span></div>
	<!-- end #page-loader -->
	
	<!-- begin #page-container -->
	<div id="page-container" class="fade page-header-fixed page-with-two-sidebar show page-sidebar-fixed page-right-sidebar-collapsed">
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
								echo '<li class="active">
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
		<div class="sidebar-tracking ">
			<div class="sidebar-seperator p-t-5 p-b-5 p-l-15 p-r-15">
				<span class="text-inverse f-w-600">LOGS</span>
			</div>
			<div class="p-15">
				<select id="employeeSelect" class="gray-input admin-visible">
					<option value="">Choose an employee</option>
				</select>
				<input type="text" id="dateTimeInput" class="gray-input m-t-10" placeholder="Choose a date" />
			</div>
			<div class="sidebar-seperator p-t-5 p-b-5 p-l-15 p-r-15">
				<span class="text-inverse f-w-600">ONLINE</span>
				<span id="onlineSpan" class="pull-right text-inverse f-w-600">3</span>
			</div>
			<div id="onlineList" class="widget-list">
				
			</div>
			<div class="sidebar-seperator p-t-5 p-b-5 p-l-15 p-r-15">
				<span class="text-inverse f-w-600">STOPPED</span>
				<span id="stoppedSpan" class="pull-right text-inverse f-w-600">3</span>
			</div>
			<div id="stoppedList" class="widget-list">
					
			</div>
			<div class="sidebar-seperator p-t-5 p-b-5 p-l-15 p-r-15">
				<span class="text-inverse f-w-600">OFFLINE</span>
				<span id="offlineSpan" class="pull-right text-inverse f-w-600">3</span>
			</div>
			<div id="offlineList" class="widget-list">

			</div>
		</div>
		<div class="sidebar-bg"></div>
		
		<!-- end #sidebar -->
		<!-- begin #content -->
	<div id="content" class="content content-full-width">
			<div class="map-full-screen">
				<div id="map" class="full-width full-height">
				
				</div>
			</div>
			<div id="bottomBar" class="bg-white">
						
							<!-- end widget-header -->
							<!-- begin vertical-box -->
							<div class="vertical-box with-grid with-border-top">
								<!-- begin vertical-box-column -->
								<div class="vertical-box-column" style="width: 30%;">
									<div class="widget-chart-info">
										<div class="widget-chart-info">
											<div class="widget-list widget-list-rounded">
												<div class="widget-list-item">
													<div class="widget-list-media icon">
														<i class="fas fa-user bg-blue text-white"></i>
													</div>
													<div class="widget-list-content">
														<h4 class="widget-list-title">Name & surname</h4>
													</div>
													<div class="widget-list-action text-nowrap text-right">
														<span class="badge badge-primary" id="nameSurnameSpan"></span>
													</div>
												</div>
												<div class="widget-list-item">
													<div class="widget-list-media icon">
														<i class="fas fa-industry bg-blue text-white"></i>
													</div>
													<div class="widget-list-content">
														<h4 class="widget-list-title">Department</h4>
													</div>
													<div class="widget-list-action text-nowrap text-right">
														<span class="badge badge-primary" id="departmentSpan"></span>
													</div>
												</div>
												<div class="widget-list-item">
													<div class="widget-list-media icon">
														<i class="fas fa-graduation-cap bg-blue text-white"></i>
													</div>
													<div class="widget-list-content">
														<h4 class="widget-list-title">Position</h4>
													</div>
													<div class="widget-list-action text-nowrap text-right">
														<span class="badge badge-primary" id="positionSpan"></span>
													</div>
												</div>
												<div class="widget-list-item">
													<div class="widget-list-media icon">
														<i class="fas fa-signal bg-pink text-white"></i>
													</div>
													<div class="widget-list-content">
														<h4 class="widget-list-title">Status</h4>
													</div>
													<div class="widget-list-action text-nowrap text-right">
														<span id="statusSpan"></span>									
													</div>
												</div>
												<div class="widget-list-item">
													<div class="widget-list-media icon">
														<i class="fas fa-road bg-pink text-white"></i>
													</div>
													<div class="widget-list-content">
														<h4 class="widget-list-title">Elapsed distance</h4>
													</div>
													<div class="widget-list-action text-nowrap text-right">
														<span id="distanceSpan"></span>									
													</div>
												</div>
												<div class="widget-list-item">
													<div class="widget-list-media icon">
														<i class="fas fa-tachometer-alt bg-pink text-white"></i>
													</div>
													<div class="widget-list-content">
														<h4 class="widget-list-title">Last speed</h4>
													</div>
													<div class="widget-list-action text-nowrap text-right">
														<span id="speedSpan"></span>									
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
								<!-- begin vertical-box-column -->
								<div class="vertical-box-column widget-chart-content p-0">
									<div id="speedGraph" class="morris-inverse" style="height: 100%; position: relative; -webkit-tap-highlight-color: rgba(0, 0, 0, 0);">

									</div>
								</div>
								<!-- end vertical-box-column -->
								<!-- end vertical-box-column -->
							</div>
							<!-- end vertical-box -->
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
								<div id="popupMap">
									
								</div>
							</div>
						</div>
		</div>
		
		<div class="popupContainer" id="travelOrderPopup" hidden>
			    <div class="panel panel-primary" id="travelOrderDIV" hidden>
                        <div class="panel-heading">
                            <div class="panel-heading-btn">
                                <button class="btn btn-xs btn-icon btn-circle btn-default" onClick="hideTravelOrderPopup()"><i class="fa fa-times"></i></button>
                            </div>
                            <h4 class="panel-title">New travel order</h4>
                        </div>
                        <div class="panel-body">
                            <form id="newTravelOrderForm" action="<?= BASE_URL . "travelorders/add" ?>" method="post" class="form-horizontal">
                                <div class="form-group">
                                    <div class="col-md-6">
                                        <label>Employee: <span class="red">*</span></label>
                                        <select id="travelOrderEmployeeSelect" class="form-control" name="employee_id" required>
                                        
                                        </select>
                                    </div>
                                    <div class="col-md-6">
                                        <label>Vehicle: <span class="red">*</span></label>
                                        <select id="newTravelOrderVehicleSelect" class="form-control" name="vehicle_id">
                                            
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-6">
                                        <label>Travel order start date: <span class="red">*</span></label>
                                        <input type="text" id="travelOrderDateFrom" class="form-control" name="date_from" required/>
                                    </div>
                                    <div class="col-md-6">
                                        <label>Travel order end date: <span class="red">*</span></label>
                                        <input type="text" id="travelOrderDateTo" class="form-control" name="date_to" required/>
                                    </div>
                                </div>
                                <button class="btn btn-primary" style="width: 100%;">Create travel order</button>
                            </form>
                        </div>
                </div>
			    <div class="panel panel-primary" id="editTravelOrderDIV" hidden>
                    <div class="panel-heading">
                        <div class="panel-heading-btn">
                            <button class="btn btn-xs btn-icon btn-circle btn-default" onClick="hideEditTravelOrderPopup()"><i class="fa fa-times"></i></button>
                        </div>
                        <h4 class="panel-title">Edit travel order</h4>
                    </div>
                    <div class="panel-body">
                            <form id="editTravelOrderForm" action="<?= BASE_URL . "travelorders/edit" ?>" method="post" class="form-horizontal">
                                <input type="hidden" id="editTravelOrderHiddenIDInput" name="travelorder_id" />
                                <div class="form-group">
                                    <div class="col-md-6">
                                        <label>Employee: <span class="red">*</span></label>
                                        <select id="editTravelOrderEmployeeSelect" class="form-control" name="employee_id" required>
                                        
                                        </select>
                                    </div>
                                    <div class="col-md-6">
                                        <label>Vehicle: <span class="red">*</span></label>
                                        <select id="editTravelOrderVehicleSelect" class="form-control" name="vehicle_id">
                                            
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-6">
                                        <label>Travel order start date: <span class="red">*</span></label>
                                        <input type="text" id="editTravelOrderDateFrom" class="form-control" name="date_to" required/>
                                    </div>
                                    <div class="col-md-6">
                                        <label>Travel order end date: <span class="red">*</span></label>
                                        <input type="text" id="editTravelOrderDateTo" class="form-control" name="date_to" required/>
                                    </div>
                                </div>
                                <button class="btn btn-primary" style="width: 100%;">Edit travel order</button>
                            </form>
                    </div>
                </div>
                <div class="panel panel-primary" id="travelOrderPreviewDIV" hidden>
                        <div class="panel-heading">
                            <div class="panel-heading-btn">
                                <button class="btn btn-xs btn-icon btn-circle btn-default" onClick="hideGenerateTravelOrderPopup()"><i class="fa fa-times"></i></button>
                            </div>
                            <h4 class="panel-title">Travel order preview</h4>
                        </div>
                        <div class="panel-body">
                            <form id="generateTravelOrderForm" action="<?= BASE_URL . "travelorders/generate" ?>" method="post" class="form-horizontal">
                                <input type="hidden" name="travelorder_id" id="generateTravelOrderHiddenIDInput" />
                                <input type="hidden" name="events" id="generateTravelOrderHiddenEventInput" />
                                <div class="form-group">
                                    <div class="col-md-6">
                                        <label>Employee: <span class="red">*</span></label>
                                        <select id="generateTravelOrderEmployeeSelect" class="form-control" name="employee_id" readonly>
                                        
                                        </select>
                                    </div>
                                    <div class="col-md-6">
                                        <label>Vehicle: <span class="red">*</span></label>
                                        <select id="vehicleSelect" name="vehicle_id" class="form-control" readonly>
                                            
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-6">
                                        <label>Date from: <span class="red">*</span></label>
                                        <input type="text" id="generateTravelOrderDateFrom" class="form-control" name="date_from" />
                                    </div>
                                    <div class="col-md-6">
                                        <label>Date to: <span class="red">*</span></label>
                                        <input type="text" id="generateTravelOrderDateTo" class="form-control" name="date_to" />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-12">
                                        <label>Customers visited:</label>
                                        <p id="eventContentDIV">
                                            
                                        </p>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-4">
                                        <label>Elapsed distance: <span class="red">*</span></label>
                                        <input type="text" id="generateTravelOrderDistance" class="form-control" name="elapsed_distance" readonly/>
                                    </div>
                                    <div class="col-md-4">
                                        <label>Elapsed time: <span class="red">*</span></label>
                                        <input type="text" id="generateTravelOrderTime" class="form-control" name="elapsed_time" readonly/>
                                    </div>
                                    <div class="col-md-4">
                                        <label>Travel order base cost: <span class="red">*</span></label>
                                        <input type="text" id="generateTravelOrderCost" class="form-control" name="cost" readonly/>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-4">
                                        <label>Food cost:</label>
                                        <input type="text" name="foodcost" class="form-control" pattern="^[0-9]+(\.[0-9]{1,2})?$" placeholder="Enter food cost" />
                                    </div>
                                    <div class="col-md-4">
                                        <label>Additional fees:</label>
                                        <input type="text" name="additionalfees" class="form-control" pattern="^[0-9]+(\.[0-9]{1,2})?$" placeholder="Enter additional fees" />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-12">
                                        <label>Additional fees description:</label>
                                        <textarea name="additionaldescription" class="form-control" placeholder="Additional fees description"></textarea>
                                    </div>
                                </div>
                                <div class="form-group">
                                        <div class="col-md-12">
                                            <span class="btn btn-success fileinput-button">
                                                <i class="fa fa-upload"></i>
                                                <span>Attach a file</span>
                                                <!-- The file input field used as target for the file upload widget -->
                                                <input id="travelOrderFileUpload" type="file" name="file" multiple>
                                            </span>
                                    <br>
                                    <br>
                                        
                                        <!-- The container for the uploaded files -->
                                    <div id="files" class="files"></div>
                                    </div>
                                </div>
                                <button id="generateTravelOrderBtn" class="btn btn-success" style="width: 100%;">Generate travel order</button>
                            </form>
                        </div>
                </div>
			</div>

		<div class="theme-panel">
			<div class="theme-panel-content">
				<h5 class="m-t-0">Theme settings</h5>
				<ul class="theme-list clearfix">
					<li class=""><a href="javascript:;" class="bg-green" data-theme="default" data-theme-file="<?= CSS_URL . "theme/default.css " ?>" data-click="theme-selector" data-toggle="tooltip" data-trigger="hover" data-container="body" data-title="Default" data-original-title="" title="">&nbsp;</a></li>
					<li class="active"><a href="javascript:;" class="bg-red" data-theme="red" data-theme-file="<?= CSS_URL . "theme/red.css " ?>" data-click="theme-selector" data-toggle="tooltip" data-trigger="hover" data-container="body" data-title="Red" data-original-title="" title="">&nbsp;</a></li>
					<li><a href="javascript:;" class="bg-blue" data-theme="blue" data-theme-file="<?= CSS_URL . "theme/blue.css " ?>" data-click="theme-selector" data-toggle="tooltip" data-trigger="hover" data-container="body" data-title="Blue" data-original-title="" title="">&nbsp;</a></li>
					<li class=""><a href="javascript:;" class="bg-purple" data-theme="purple" data-theme-file="<?= CSS_URL . "theme/purple.css " ?>" data-click="theme-selector" data-toggle="tooltip" data-trigger="hover" data-container="body" data-title="Purple" data-original-title="" title="">&nbsp;</a></li>
					<li class=""><a href="javascript:;" class="bg-orange" data-theme="orange" data-theme-file="<?= CSS_URL . "theme/orange.css " ?>" data-click="theme-selector" data-toggle="tooltip" data-trigger="hover" data-container="body" data-title="Orange" data-original-title="" title="">&nbsp;</a></li>
					<li class=""><a href="javascript:;" class="bg-black" data-theme="black" data-theme-file="<?= CSS_URL . "theme/black.css " ?>" data-click="theme-selector" data-toggle="tooltip" data-trigger="hover" data-container="body" data-title="Black" data-original-title="" title="">&nbsp;</a></li>
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
	<script src="<?= ASSETS_URL . "fullcalendar/lib/moment.min.js" ?>"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/js/bootstrap-datetimepicker.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/css/bootstrap-datetimepicker.min.css" rel="stylesheet"/>
    <script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>
    <script src="<?= ASSETS_URL . "fullcalendar/lib/moment.min.js" ?>"></script>
    <script type="text/javascript" src="https://js.cit.api.here.com/v3/3.0/mapsjs-core.js"></script>
    <script type="text/javascript" src="https://js.cit.api.here.com/v3/3.0/mapsjs-service.js"></script>
    <script type="text/javascript" src="https://js.cit.api.here.com/v3/3.0/mapsjs-ui.js"></script>
    <script type="text/javascript" src="https://js.cit.api.here.com/v3/3.0/mapsjs-mapevents.js"></script>
    <script type="text/javascript" src="https://js.cit.api.here.com/v3/3.0/mapsjs-places.js"></script>
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
	<link href="<?= ASSETS_URL . "select2/dist/css/select2.css" ?>" rel="stylesheet" />
	<script src="<?= ASSETS_URL . "select2/dist/js/select2.full.min.js" ?>"></script>
    <script src="<?= ASSETS_URL . "pace/pace.min.js" ?>" ></script>
	<script src="<?= ASSETS_URL . "jquery-file-upload/js/jquery.fileupload.js" ?>"></script>
	<!-- ================== END BASE JS ================== -->
	
	<!-- ================== BEGIN PAGE LEVEL JS ================== -->
	<script src="<?= JS_URL . "apps.min.js" ?>"></script>
	<script src="<?= JS_URL . "timedisplay.js" ?>"></script>
	<script src="<?= JS_URL . "inactivity.js" ?>"></script>
	<!-- ================== END PAGE LEVEL JS ================== -->
	
	<script>
		var loggedEmployee = <?php echo json_encode($_SESSION["id"]); ?>;
        var isAdmin = <?php echo json_encode($_SESSION["admin"]); ?>;
		var dateformat = <?php echo json_encode($_SESSION["dateformat"]); ?>;
		var timeformat = <?php echo json_encode($_SESSION["timeformat"]); ?>;
		
		var dpFormat;
		
	    var dTable;
		var eTable;
		var tTable;
		var eventTable;
	    
	    var map;
        var employeePath;
        var employeeArray;
        var markers = [];
        var stopsMarkers = [];
        var eventMarkers = [];
        var graphMarker;
        
        var currentBubble;
        var firstPageLoad = true;
		var currentEmployee;
		var selectInitialized = false;
		
		var mapMarker;
        
        
        //Step 1: initialize communication with the platform
        var platform = new H.service.Platform({
            app_id: 'g0vAmv9H232kbGqA6Ca6',
            app_code: 'KKi2vzeGsz6P9oBVQ5Z-uA',
            useCIT: false,
            useHTTPS: true
        });
        var defaultLayers = platform.createDefaultLayers();
        
        //Step 2: initialize a map  - not specificing a location will give a whole world view.
        var map = new H.Map(document.getElementById('map'), defaultLayers.normal.map);
		var popupMap = new H.Map(document.getElementById('popupMap'), defaultLayers.normal.map);
        
        //Step 3: make the map interactive
        // MapEvents enables the event system
        // Behavior implements default interactions for pan/zoom (also on mobile touch environments)
        var behavior = new H.mapevents.Behavior(new H.mapevents.MapEvents(map));
		var behavior2 = new H.mapevents.Behavior(new H.mapevents.MapEvents(popupMap));
        
        // Create the default UI components
        var ui = H.ui.UI.createDefault(map, defaultLayers);
		var ui2 = H.ui.UI.createDefault(popupMap, defaultLayers);
        
        // Now use the map as required...
        moveMapToLjubljana(map);
        
        graphMarker = new H.map.Marker({
            lat: 0,
            lng: 0
        });
        
        map.addObject(graphMarker);
        
        function moveMapToLjubljana(map) {
            map.setCenter({
                lat: 46.056267,
                lng: 14.505500
            });
            map.setZoom(13);
        }
        
        $("#speedGraph").mouseleave(function() {
                graphMarker.setPosition({
                    lat: 0,
                    lng: 0
                });
        });
        
        $(document).ready(function() {
            getMenuStatistics(loggedEmployee);
			
			dpFormat = dateformat.replace("YYYY", "YY");
			dpFormat = dpFormat.toLowerCase();
			
			updateEmployeeLocations();
			getEmployees();
			getVehicles();
			getSettings();
			setInterval(getEmployees, 30000);
			setInterval(updateEmployeeLocations, 3000);
			
			$("#editTravelOrderDateFrom, #editTravelOrderDateTo, #generateTravelOrderDateFrom, #generateTravelOrderDateTo").datetimepicker({format: "YYYY-MM-DD", "defaultDate": new Date()});
            $("#dateTimeInput, #trackingFromDateInput, #trackingToDateInput").datepicker({dateFormat: dpFormat });
            $("#dateTimeInput, #trackingFromDateInput, #trackingToDateInput").datepicker('setDate', new Date());
			
            $('#dateTimeInput').change(function(e){ 
                displayEmployeeDetails();
            });
			
			$('#travelOrderFileUpload').fileupload({
               url: "travelorders/upload",
               dataType : 'json',
               add : function(e,data){
                    $.each(data.files, function (index, file) {
                        $('<p/>').text(file.name).appendTo('#files');
                    });
                    $("#generateTravelOrderBtn").prop("disabled", true);
                    data.submit();
               },
               done: function(e,data){
                   if (!data.result.error){
                       travelOrderFiles.push(data.result.filename);
                       console.log(travelOrderFiles);
                   }else{
                       console.log(data.result.error);
                   }
                   $("#generateTravelOrderBtn").prop("disabled", false);
               }
            });
			
			$('#editTravelOrderForm').on('submit', function(e) { //use on if jQuery 1.7+
                e.preventDefault();
                    $.ajax({
                        type: "POST",
                        url: "travelorders/edit",
                        data: $("#editTravelOrderForm").serialize(),
                        success: function(msg) {
                            if (msg == "") {
                                swal(
                                    'Success!',
                                    'Travel order was successfully edited.',
                                    'success'
                                );
                                $("#editTravelOrderForm")[0].reset();
                                getEventsAndStops();
                                hideEditTravelOrderPopup();
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
            
            $('#generateTravelOrderForm').on('submit', function(e) { //use on if jQuery 1.7+
                e.preventDefault();
                var postData = $('#generateTravelOrderForm').serializeArray();
                    postData.push( { name: 'files[]', value: travelOrderFiles } );
                    $.ajax({
                        type: "POST",
                        url: "travelorders/generate",
                        data: postData,
                        success: function(msg) {
                            if (msg == "") {
                                swal(
                                    'Success!',
                                    'Travel order was successfully generated.',
                                    'success'
                                );
                                $("#generateTravelOrderForm")[0].reset();
                                getEventsAndStops();
                                hideGenerateTravelOrderPopup();
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
			
            $("#employeeSelect").change(function(e) {
                var selectedVal = $("#employeeSelect option:selected").val();
        
                if (selectedVal != "") {
                    for (var i = 0; i < employeeArray.length; i++) {
                        if (employeeArray[i].employee_id == selectedVal) {
                            $(".menu-btn").removeClass("hide");
                            currentEmployee = employeeArray[i];
							getLogDatesForEmployee();
                            break;
                        }
                    }
                    
                } else {
                    currentEmployee = null;
                    $(".menu-btn").addClass("hide");
                    if (employeePath != null) {
                        employeePath.setMap(null);
                        employeePath = null;
                    }
                }
            });
			
			$('a[href="#report-view"]').on('shown.bs.tab', function(e){
                map.getViewPort().resize();
            });
			
			$(window).on("resize", function(){
				map.getViewPort().resize();
			});
            
            if (isAdmin == 1){
                $(".admin-visible").show();
				$("#employeeSelect").select2({width: "100%"});
                App.init();
                firstPageLoad = false;
            }
			
			//getEventsAndStops($("#trackingFromDateInput").val(), $("#trackingToDateInput").val());
        });
		
		
		function getSettings(){
		    $.ajax({
                type: "POST",
                url: "settings/get",
                data: null,
                dataType: "json",
                success: function(settings) {
                    tripCost = parseFloat(settings.trip_cost);
                    allowance = parseFloat(settings.daily_allowance);
                }
		    });
		}
		
		function getVehicles(){
		    $.ajax({
                type: "POST",
                url: "<?= BASE_URL ?>" + "vehicles/get",
                data: null,
                dataType: "json",
                success: function(vehicles) {
                    for (var i = 0; i < vehicles.length; i++){
                        $("#editTravelOrderVehicleSelect, #vehicleSelect").append($('<option>', {
                            value: vehicles[i].vehicle_id,
                            text: vehicles[i].vehicle_brand + " " + vehicles[i].vehicle_model
                        }));
                    }
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
		
		function trackingDateChanged(){
			getEventsAndStops($("#trackingFromDateInput").val(), $("#trackingToDateInput").val());
		}
		
		function getLogDatesForEmployee(){
            var postData = { "employee_id": currentEmployee.employee_id };
            $.ajax({
                type: "POST",
                url: "employees/logDates",
                data: postData,
                dataType: "json",
                success: function(dates) {
                    var travelDays = [];
                    for (var i = 0; i < dates.length; i++){
                        travelDays.push(dates[i].datetime);
                    }
                    $("#dateTimeInput").datepicker( "destroy" );
                    $("#dateTimeInput").datepicker({ 
                        dateFormat: dpFormat,
                        beforeShowDay: function(date) {
                            var dateString = date.getFullYear() + "-" + ('0' + (date.getMonth() + 1)).slice(-2) + "-" + ('0' + date.getDate()).slice(-2);
                            if ($.inArray(dateString, travelDays) != -1) {
                                return [true, 'activeBG', ''];
                            }
                            return [true];
                        }
                    });
                    displayEmployeeDetails();
                }
		    });
        }
		
		function getEventsAndStops(date_from, date_to) {
			var postData = {
				"date_from": date_from,
				"date_to": date_to
			};
			$.ajax({
				type: "POST",
				url: "<?= BASE_URL ?>" + "tracking/stats",
				data: postData,
				dataType: "json",
				success: function(response) {
					var events = response.events;
					var stops = response.unknownstops;
					var travelOrders = response.travelorders;
					if (tTable != null) {
						tTable.clear().rows.add(travelOrders).draw();
						tTable.columns([1, 2, 3, 4, 5]).every(function(index) {
							var column = this;
							var name;
							if (index == 1) {
										name = "Employee";
									} else if (index == 2) {
										name = "Vehicle";
									} else if (index == 3) {
										name = "From date";
									} else if (index == 4) {
										name = "To date";
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
					}else{
						tTable = $('#travelOrdersTable').DataTable({
							"aaData": travelOrders,
							initComplete: function() {
								this.api().columns([1, 2, 3, 4, 5]).every(function(index) {
									var column = this;
									var name;
									if (index == 1) {
										name = "Employee";
									} else if (index == 2) {
										name = "Vehicle";
									} else if (index == 3) {
										name = "From date";
									} else if (index == 4) {
										name = "To date";
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
									"data": "travelorder_number"
								},
								{
									"data": "employee_id"
								},
								{
									"data": "vehicle_registration"
								},
								{
									"data": "date_from"
								},
								{
									"data": "date_from"
								},
								{
									"data": "status"
								},
								{
									"defaultContent": '<span onClick="showGenerateTravelOrderPopup(this)" class="text-success pointer pull-left"><i class="fa fa-address-card"></i></span><span onClick="showEditTravelOrderPopup(this)" class="text-primary pointer pull-left m-l-10"><i class="fa fa-edit"></i></span><span onClick="deleteTravelOrder(this)" class="text-danger pointer pull-left m-l-10"><i class="fa fa-trash"></i></span>'
								}
							],
							"columnDefs": [{
									// The `data` parameter refers to the data for the cell (defined by the
									// `data` option, which defaults to the column being worked with, in
									// this case `data: 0`.
									"render": function(data, type, row) {
										return row.employee_name + " " + row.employee_surname;
									},
									"targets": 1,
									orderable: false
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
										return moment(row.date_from).format(dateformat);
									},
									"targets": 3,
									orderable: false
								},
								{
									// The `data` parameter refers to the data for the cell (defined by the
									// `data` option, which defaults to the column being worked with, in
									// this case `data: 0`.
									"render": function(data, type, row) {
										return moment(row.date_to).format(dateformat);
									},
									"targets": 4,
									orderable: false
								},
								{
									// The `data` parameter refers to the data for the cell (defined by the
									// `data` option, which defaults to the column being worked with, in
									// this case `data: 0`.
									"render": function(data, type, row) {
										if (data == 1) {
											return "<label class='label label-success'>Completed</label>";
										} else {
											return "<label class='label label-danger'>Pending</label>";
										}
									},
									"targets": 5,
									orderable: false
								},
								{
									"render": function(data, type, row) {
										if (row.status == 1) {
											return '<span onClick="viewTravelOrder(this)" class="text-primary pointer pull-left"><i class="fas fa-th-list"></i></span><span onClick="showEditTravelOrderPopup(this)" class="text-primary pointer pull-left m-l-10"><i class="fa fa-edit"></i></span><span onClick="deleteTravelOrder(this)" class="text-danger pointer pull-left m-l-10"><i class="fa fa-trash"></i></span>';
										} else {
											return '<span onClick="showGenerateTravelOrderPopup(this)" class="text-success pointer pull-left"><i class="fa fa-address-card"></i></span><span onClick="showEditTravelOrderPopup(this)" class="text-primary pointer pull-left m-l-10"><i class="fa fa-edit"></i></span><span onClick="deleteTravelOrder(this)" class="text-danger pointer pull-left m-l-10"><i class="fa fa-trash"></i></span>';
										}
									},
									"orderable": false,
									"targets": 6
								},
							],
							responsive: true,
							dom: 'lfrtipB',
							buttons: [{
									extend: 'copy',
									className: 'btn-sm btn-primary'
								},
								{
									extend: 'csv',
									className: 'btn-sm btn-primary'
								},
								{
									extend: 'excel',
									className: 'btn-sm btn-primary'
								},
								{
									extend: 'pdf',
									className: 'btn-sm btn-primary'
								},
								{
									extend: 'print',
									className: 'btn-sm btn-primary'
								}
							]
						});
					}
					
					if (eventTable != null) {
						eventTable.clear().rows.add(events).draw();
						eventTable.columns([1, 3, 5, 6]).every(function(index) {
							var column = this;
							var name;
							if (index == 1) {
								name = "Customer";
							} else if (index == 3) {
								name = "Date";
							} else if (index == 5) {
								name = "Status";
							} else {
								name = "Employee";
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
						eventTable = $('#eventsTable').DataTable({
							"aaData": events,
							initComplete: function() {
								this.api().columns([1, 3, 5, 6]).every(function(index) {
									var column = this;
									var name;
									if (index == 1) {
										name = "Customer";
									} else if (index == 3) {
										name = "Date";
									} else if (index == 5) {
										name = "Status";
									} else {
										name = "Employee";
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
									"data": "event_subject"
								},
								{
									"data": "customer_id"
								},
								{
									"data": "event_address"
								},
								{
									"data": "event_startdate"
								},
								{
									"data": "event_arrivaldate"
								},
								{
									"data": "status"
								},
								{
									"data": "employee_id"
								},
								{
									"defaultContent": '<span data-toggle="tooltip" title="View event page" onClick="showEventPage(this)" class="text-success pointer pull-left m-l-10"><i class="fas fa-th-list"></i></span>'
								},
							],
							"columnDefs": [{
									// The `data` parameter refers to the data for the cell (defined by the
									// `data` option, which defaults to the column being worked with, in
									// this case `data: 0`.
									"render": function(data, type, row) {
										if (data != null || data != undefined) {
											return "<span class='text-primary hover-underline' onClick='showCustomerPage(this)'>" + row.customer_name + "</span>";
										} else {
											return "None";
										}
									},
									"targets": 1,
									orderable: false
								},
								{
									// The `data` parameter refers to the data for the cell (defined by the
									// `data` option, which defaults to the column being worked with, in
									// this case `data: 0`.
									"render": function(data, type, row) {
										if (data != "") {
											return "<span class='text-primary hover-underline' onClick='showEventLocation(this)'>" + data + '</span>';
										} else {
											return "Not specified";
										}
									},
									"targets": 2
								},
								{
									// The `data` parameter refers to the data for the cell (defined by the
									// `data` option, which defaults to the column being worked with, in
									// this case `data: 0`.
									"render": function(data, type, row) {
										return moment(row.event_startdate).format(dateformat);
									},
									"targets": 3,
									orderable: false
								},
								{
									// The `data` parameter refers to the data for the cell (defined by the
									// `data` option, which defaults to the column being worked with, in
									// this case `data: 0`.
									"render": function(data, type, row) {
										var arrivaldate = "Not visited yet";
										if (row.event_arrivaldate != "") {
											arrivaldate = moment(row.event_arrivaldate).format(timeformat);
										}
										if (row.event_endingdate != "") {
											arrivaldate += " - " + moment(row.event_endingdate).format(timeformat);
										}
										return arrivaldate;
									},
									"targets": 4
								},
								{
									// The `data` parameter refers to the data for the cell (defined by the
									// `data` option, which defaults to the column being worked with, in
									// this case `data: 0`.
									"render": function(data, type, row) {
										if (data == 0) { //status 0 is confirmed, default status.
											return "<label class='label label-warning'>Incomplete</label>";
										} else if (data == 1) { //in progress, set when employee reaches event destination
											return "<label class='label label-primary'>In progress</label>";
										} else if (data == 2) { //done, set when user marks it as such on Android app
											return "<label class='label label-success'>Completed</label>";
										} else {
											return "<label class='label label-danger'>Canceled</label>";
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
										return row.employee_name + " " + row.employee_surname;
									},
									"targets": 6,
									orderable: false
								}
							],
							responsive: true,
							dom: 'lfrtipB',
							buttons: [{
									extend: 'copy',
									className: 'btn-sm btn-primary'
								},
								{
									extend: 'csv',
									className: 'btn-sm btn-primary'
								},
								{
									extend: 'excel',
									className: 'btn-sm btn-primary'
								},
								{
									extend: 'pdf',
									className: 'btn-sm btn-primary'
								},
								{
									extend: 'print',
									className: 'btn-sm btn-primary'
								}
							]
						});
					}
					if (dTable != null) {
						dTable.clear().rows.add(stops).draw();
						dTable.columns([0, 1]).every(function(index) {
							var column = this;
							var name;
							if (index == 0) {
								name = "Employee";
							} else {
								name = "Date";
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
						dTable = $('#unknownStopsTable').DataTable({
							"aaData": stops,
							initComplete: function() {
								this.api().columns([0, 1]).every(function(index) {
									var column = this;
									var name;
									if (index == 0) {
										name = "Employee";
									} else {
										name = "Date";
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
									"data": "employee_id"
								},
								{
									"data": "start_time"
								},
								{
									"data": "end_time"
								},
								{
									"data": "duration"
								},
								{
									"defaultContent": '<span onClick="showStopLocation(this)" data-toggle="tooltip" title="Show on map" class="pull-left text-danger pointer"><i class="fas fa-map-marker-alt"></i></span>'
								},
							],
							"columnDefs": [{
									// The `data` parameter refers to the data for the cell (defined by the
									// `data` option, which defaults to the column being worked with, in
									// this case `data: 0`.
									"render": function(data, type, row) {
										return row.employee_name + " " + row.employee_surname;
									},
									"targets": 0,
									orderable: false
								},
								{
									// The `data` parameter refers to the data for the cell (defined by the
									// `data` option, which defaults to the column being worked with, in
									// this case `data: 0`.
									"render": function(data, type, row) {
										return moment(data).format(dateformat);
									},
									"targets": 1,
									orderable: false
								},
								{
									// The `data` parameter refers to the data for the cell (defined by the
									// `data` option, which defaults to the column being worked with, in
									// this case `data: 0`.
									"render": function(data, type, row) {
										return moment(row.start_time).format(timeformat) + " to " + moment(row.end_time).format(timeformat);
									},
									"targets": 2
								},
								{
									// The `data` parameter refers to the data for the cell (defined by the
									// `data` option, which defaults to the column being worked with, in
									// this case `data: 0`.
									"render": function(data, type, row) {
										return data + " minutes";
									},
									"targets": 3
								},
								{
									"targets": 4,
									orderable: false
								}
							],
							responsive: true,
							dom: 'lfrtipB',
							buttons: [{
									extend: 'copy',
									className: 'btn-sm btn-primary'
								},
								{
									extend: 'csv',
									className: 'btn-sm btn-primary'
								},
								{
									extend: 'excel',
									className: 'btn-sm btn-primary'
								},
								{
									extend: 'pdf',
									className: 'btn-sm btn-primary'
								},
								{
									extend: 'print',
									className: 'btn-sm btn-primary'
								}
							]
						});
					}
				}
			});
		}
		
		function showGenerateTravelOrderPopup(row){
		    var actualRow = $(row).parents('tr');
			if (actualRow.hasClass('child')) {//Check if the current row is a child row
				actualRow = actualRow.prev();//If it is, then point to the row before it (its 'parent')
			}
            var travelOrder = tTable.row(actualRow).data();
		    var postData = { "employee_id": travelOrder.employee_id, "date_from": travelOrder.date_from, "date_to": travelOrder.date_to };

		    $.ajax({
                type: "POST",
                url: "travelorders/stats",
                data: postData,
                dataType: "json",
                success: function(stats) {
                    console.log(stats);

                    var startLog;
                    var endLog;
                    var eventContent = "";
                    var dbEvents = "";
                    
                    var logs = stats.logs;
                    var events = stats.events;
                    var distances = stats.distances;
                    var todays_distance = stats.todays_distance;
					console.log(events);
                    
                    for (var i = 0; i < events.length; i++){
                        var event = events[i];
                        if (event.status == 2 || event.status == 3){
                            var duration = Math.round((new Date(event.event_endingdate) - new Date(event.event_arrivaldate)) / 1000 / 60);
							if (event.customer_name == null || event.customer_name == undefined){
								event.customer_name = "Not specified";
							}
                            eventContent += event.customer_name + " (<strong>From</strong> " + event.event_arrivaldate + " <strong>to</strong> " + event.event_endingdate + ", <strong>duration</strong>: " + duration + " minutes)<br>";
                            if (dbEvents != ""){
                                dbEvents += ";" + event.customer_name + "|" + event.event_address + "|" + event.distance + "|" + event.event_arrivaldate + "|" + event.event_endingdate;
                            }else{
                                dbEvents = event.customer_name + "|" + event.event_address + "|" + event.distance + "|" + event.event_arrivaldate + "|" + event.event_endingdate;
                            }
                        }
                    }
                    
                    startLog = (new Date()).getTime();
                    endLog = (new Date()).getTime();
                    if (logs.length > 0){
                        startLog = logs[0].datetime;
                        endLog = logs[logs.length - 1].datetime;
                    }
                    
                    var elapsedTime = new Date(endLog) - new Date(startLog);
                    var minutes = Math.round(elapsedTime / 1000 / 60);
                    var tripAllowance = allowance;
                    var totalDistance = 0;
                    for (var i = 0; i < distances.length; i++){
                        totalDistance += distances[i].elapsed_distance;
                    }
                    
                    totalDistance += todays_distance;

                    $("#generateTravelOrderHiddenIDInput").val(travelOrder.travelorder_id);
                    $("#generateTravelOrderHiddenEventInput").val(dbEvents);
                    $("#generateTravelOrderEmployeeSelect").val(travelOrder.employee_id);
                    $("#vehicleSelect").val(travelOrder.vehicle_id);
                    $("#generateTravelOrderDateFrom").val(travelOrder.date_from);
                    $("#generateTravelOrderDateTo").val(travelOrder.date_to);
                    $("#generateTravelOrderDistance").val(totalDistance / 1000);
                    $("#generateTravelOrderTime").val(minutes);
                    if (minutes < 720 && minutes >= 480){
                        tripAllowance = tripAllowance / 2;
                    }else if (minutes < 480 && minutes >= 360){
                        tripAllowance = allowance / 4;
                    }
                    $("#generateTravelOrderCost").val(Math.round(parseFloat(totalDistance / 1000) * tripCost * 100 + allowance) / 100);
                    $("#eventContentDIV").html(eventContent);
                    $("#travelOrderPopup, #travelOrderPreviewDIV").show();
                    
                    
                }
		    });
		}
		
		function viewTravelOrder(row){
		    var actualRow = $(row).parents('tr');
			if (actualRow.hasClass('child')) {//Check if the current row is a child row
				actualRow = actualRow.prev();//If it is, then point to the row before it (its 'parent')
			}
            var travelOrder = tTable.row(actualRow).data();
		    window.open("<?= BASE_URL ?>" + "travelorderdetails?travelorder_id=" + travelOrder.travelorder_id);
		}
		
		function hideGenerateTravelOrderPopup(){
		    $("#travelOrderPopup, #travelOrderPreviewDIV").hide();
		}
		
		function showEditTravelOrderPopup(row){
		    var actualRow = $(row).parents('tr');
			if (actualRow.hasClass('child')) {//Check if the current row is a child row
				actualRow = actualRow.prev();//If it is, then point to the row before it (its 'parent')
			}
            var travelOrder = tTable.row(actualRow).data();
		    $("#editTravelOrderHiddenIDInput").val(travelOrder.travelorder_id);
		    $("#editTravelOrderEmployeeSelect").val(travelOrder.employee_id);
		    $("#editTravelOrderVehicleSelect").val(travelOrder.vehicle_id);
		    $("#editTravelOrderDateFrom").val(travelOrder.date_from);
		    $("#editTravelOrderDateTo").val(travelOrder.date_to);
		    $("#travelOrderPopup, #editTravelOrderDIV").show();
		}
        
        function hideEditTravelOrderPopup() {
            $("#travelOrderPopup, #editTravelOrderDIV").hide();
        }
    
		function deleteTravelOrder(row){
		    var actualRow = $(row).parents('tr');
			if (actualRow.hasClass('child')) {//Check if the current row is a child row
				actualRow = actualRow.prev();//If it is, then point to the row before it (its 'parent')
			}
            var travelOrder = tTable.row(actualRow).data();
            swal({
              title: 'Confirm action',
              text: "Are you sure you want to remove this travel order?",
              type: 'error',
              showCancelButton: true,
              confirmButtonColor: '#3085d6',
              cancelButtonColor: '#d33',
              confirmButtonText: 'Yes, remove'
            }).then(function () {
                var values = { travelorder_id: travelOrder.travelorder_id };
                $.ajax({
                    type: "POST",
                    url: "travelorders/delete",
                    data: values,
                    success: function(msg) {
                        if (msg == "") {
                            swal(
                                'Success!',
                                'Travel order was successfully removed.',
                                'success'
                            );
                            getEventsAndStops();
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
		
		function showEventLocation(row){
            var actualRow = $(row).parents('tr');
			if (actualRow.hasClass('child')) {//Check if the current row is a child row
				actualRow = actualRow.prev();//If it is, then point to the row before it (its 'parent')
			}
            var event = eventTable.row(actualRow).data();
            
            if (mapMarker == null){
				mapMarker = new H.map.Marker({
					lat: event.latitude,
					lng: event.longitude
				});
				popupMap.addObject(mapMarker);
				popupMap.setZoom(16);
			}else{
				mapMarker.setPosition({
                    lat: event.latitude,
					lng: event.longitude
                });
			}
			popupMap.setCenter({
                lat: event.latitude,
                lng: event.longitude
            });
			$("#mapPopup, #mapDIV").show();
			popupMap.getViewPort().resize(); 
        }
		
		function showStopLocation(row){
            var actualRow = $(row).parents('tr');
			if (actualRow.hasClass('child')) {//Check if the current row is a child row
				actualRow = actualRow.prev();//If it is, then point to the row before it (its 'parent')
			}
            var stop = dTable.row(actualRow).data();
            
            if (mapMarker == null){
				mapMarker = new H.map.Marker({
					lat: stop.latitude,
					lng: stop.longitude
				});
				popupMap.addObject(mapMarker);
				popupMap.setZoom(16);
			}else{
				mapMarker.setPosition({
                    lat: stop.latitude,
					lng: stop.longitude
                });
			}
			popupMap.setCenter({
                lat: stop.latitude,
                lng: stop.longitude
            });
			$("#mapPopup, #mapDIV").show();
			popupMap.getViewPort().resize(); 
        }
		
		function showEventPage(row){
			var actualRow = $(row).parents('tr');
			if (actualRow.hasClass('child')) {//Check if the current row is a child row
				actualRow = actualRow.prev();//If it is, then point to the row before it (its 'parent')
			}
            var event = eventTable.row(actualRow).data();
			var url = "<?= BASE_URL ?>" + "eventdetails?event_id=" + event.event_id;
		    window.open(url, "_blank");
		}
		
		function showEventPageTracking(row){
			var actualRow = $(row).parents('tr');
			if (actualRow.hasClass('child')) {//Check if the current row is a child row
				actualRow = actualRow.prev();//If it is, then point to the row before it (its 'parent')
			}
            var event = eTable.row(actualRow).data();
			var url = "<?= BASE_URL ?>" + "eventdetails?event_id=" + event.event_id;
		    window.open(url, "_blank");
		}
        
        
        
        
        
        function displayEmployeeDetails() {
            if (currentEmployee != null){
                var datetime = $("#dateTimeInput").val();
                if (datetime == ""){
                    datetime =  moment().format("YYYY-MM-DD");
                }else{
					datetime = moment(datetime, dateformat).format("YYYY-MM-DD");
				}
				
                var postData = {
                    "employee_id": currentEmployee.employee_id,
                    "datetime": datetime
                };

				
                $.ajax({
                    type: "POST",
                    url: "employee/stats",
                    data: postData,
                    dataType: "json",
                    success: function(stats) {
						console.log(stats);
						var statusStr = "Online";
						if (currentEmployee.employee_online == 0){
							statusStr = "Offline";
						}
						$("#nameSurnameSpan").html(currentEmployee.employee_name + " " + currentEmployee.employee_surname);
						$("#departmentSpan").html(currentEmployee.department_name);
						$("#positionSpan").html(currentEmployee.employee_position);
						$("#statusSpan").html(statusStr);
						$("#speedSpan").html(currentEmployee.speed + " km/h");
						if (currentEmployee.latitude != ""){
							map.setCenter({
								lat: currentEmployee.latitude,
								lng: currentEmployee.longitude
							});
							map.setZoom(17);
						}
                        drawEmployeePolyline(currentEmployee.employee_id, datetime, stats.speed, stats.distance);
                    }
                });
            }
        }
        
        
        
        function getEmployees() {
            $.ajax({
                type: "POST",
                url: "employees/list",
                data: null,
                dataType: "json",
                success: function(employees) {
                    employeeArray = employees;
                    $("#employeeSelect, #editTravelOrderEmployeeSelect, #generateTravelOrderEmployeeSelect").html("");
                    $('#employeeSelect').append($('<option>', {
                        value: "",
                        text: "Choose an employee"
                    }));
                    
                    for (var i = 0; i < employees.length; i++) {
                        if (employees[i].employee_id == loggedEmployee && !selectInitialized){
                            currentEmployee = employees[i];
                        }
                        $('#employeeSelect').append($('<option>', {
                            value: employees[i].employee_id,
                            text: employees[i].employee_name + " " + employees[i].employee_surname
                        }));
                    }
					
					if (isAdmin == 1){
                        for (var i = 0; i < employees.length; i++){
                            $("#editTravelOrderEmployeeSelect, #generateTravelOrderEmployeeSelect").append($('<option>', {
                                value: employees[i].employee_id,
                                text: employees[i].employee_name + " " + employees[i].employee_surname
                            }));
                        }
                    } else{
                        for (var i = 0; i < employees.length; i++){
                            if (employees[i].employee_id == loggedEmployee){
                                $("#editTravelOrderEmployeeSelect, #generateTravelOrderEmployeeSelect").append($('<option>', {
                                    value: employees[i].employee_id,
                                    text: employees[i].employee_name + " " + employees[i].employee_surname
                                }));
                            }
                        }
                    }
                    
                    if (currentEmployee != null){
                        $("#employeeSelect").val(currentEmployee.employee_id);
                    }
					if (!selectInitialized){
						getLogDatesForEmployee();
						selectInitialized = true;
					}
                }
            });
        }
		
		function hideMapPopup(){
			$("#mapPopup, #mapDIV").hide();
		}
        
        
        function updateEmployeeLocations() {
            $.ajax({
                type: "POST",
                url: "employees/list",
                data: null,
                dataType: "json",
                success: function(employees) {
                    var employeeIcon = new H.map.Icon("<?= IMG_URL ?>" + "driver_icon.png");
					var onlineListContent = "";
					var stoppedListContent = "";
					var offlineListContent = "";
					var online = 0;
					var offline = 0;
					var stopped = 0;
                    for (var i = 0; i < employees.length; i++) { //creates new markers or updates existing marker positions based on employee.
                        var employee = employees[i];
						var imgURL = "<?= IMG_URL ?>" + "user-12.jpg";
						if (employee.profile_image != "") {
							imgURL = "<?= IMG_URL ?>" + employee.profile_image;
						}
						if (employee.employee_online == 1){
							online++;
							var lastLogin = "Never";
							if (employee.last_login_web != ""){
								lastLogin = moment(employee.last_login_web).format(dateformat + ", " + timeformat);
							}
							onlineListContent += '<a href="employeepage?employee_id=' + employee.employee_id + '" target="_blank" class="widget-list-item">' +
								'<div class="widget-list-media">' +
									'<img src="' + imgURL + '" alt="" class="rounded">' +
								'</div>' +
								'<div class="widget-list-content">' +
									'<h4 class="widget-list-title">' + employee.employee_name + ' ' + employee.employee_surname + '</h4>' +
									'<p class="widget-list-desc">Online since ' + lastLogin + '</p>' +
								'</div>' +
							'</a>';
						}else{
							offline++;
							var lastLogin = "Never";
							if (employee.last_login != ""){
								lastLogin = moment(employee.last_login).format(dateformat + ", " + timeformat);
							}
							offlineListContent += '<a href="employeepage?employee_id=' + employee.employee_id + '" target="_blank" class="widget-list-item">' +
								'<div class="widget-list-media">' +
									'<img src="' + imgURL + '" alt="" class="rounded">' +
								'</div>' +
								'<div class="widget-list-content">' +
									'<h4 class="widget-list-title">' + employee.employee_name + ' ' + employee.employee_surname + '</h4>' +
									'<p class="widget-list-desc">Last online on ' + lastLogin + '</p>' +
								'</div>' +
							'</a>';
						}
                        var exists = false;
                        for (var j = 0; j < markers.length; j++) {
                            if (markers[j].getData().id == employee.employee_id) {
                                exists = markers[j];
								break;
                            }
                        }
                        if (exists != false) { //if marker exists, do not create a new one, but update existing one instead.
                            exists.setPosition({
                                lat: employee.latitude,
                                lng: employee.longitude
                            });
							var statusStr = "<span class='text-success'>ONLINE</span>";
							if (employee.employee_online == 0){
								statusStr = "<span class='text-danger'>OFFLINE</span>";
							}
                            var markerHTML = '<div class="infobubble-list-item">' +
											'<div class="infobubble-list-media">' +
												'<img src="' + imgURL + '" alt="" class="rounded">' +
											'</div>' +
											'<div class="infobubble-list-content">' +
												'<h4 class="infobubble-list-title"><a target="_blank" href="employeepage?employee_id=' + employee.employee_id + '" >' + employee.employee_name + ' ' + employee.employee_surname + '</a></h4>' +
												'<p class="infobubble-list-desc">Contact ' + employee.employee_phone + '</p>' +
											'</div>' +
										'</div>' + 
										'<div class="infobubble-list-item-alt">' +
											'<div class="infobubble-list-media">' +
												'<i class="fas fa-info-circle text-primary text-center" style="display:block;"></i>' +
											'</div>' +
											'<div class="infobubble-list-content">' +
												'<h4 class="infobubble-list-title">STATUS</h4>' +
												'<p class="infobubble-list-desc">' + statusStr + '</p>' +
											'</div>' +
											'<div class="infobubble-list-content">' +
												'<h4 class="infobubble-list-title">LAST SPEED</h4>' +
												'<p class="infobubble-list-desc">' + employee.speed + ' km/h</p>' +
											'</div>' +
										'</div>' +
										'<div class="infobubble-list-item-alt">' +
											'<div class="infobubble-list-media">' +
												'<i class="fas fa-road text-danger text-center" style="display:block;"></i>' +
											'</div>' +
											'<div class="infobubble-list-content">' +
												'<h4 class="infobubble-list-title">DISTANCE</h4>' +
												'<p class="infobubble-list-desc">' + (employee.distance / 1000) + ' km</p>' +
											'</div>' +
											'<div class="infobubble-list-content">' +
												'<h4 class="infobubble-list-title">LAST LOGIN</h4>' +
												'<p class="infobubble-list-desc">' + moment(employee.last_login).format(dateformat + ", " + timeformat) + '</p>' +
											'</div>' +
										'</div>' +
										'<div class="infobubble-list-item-alt">' +
											'<div class="infobubble-list-media">' +
												'<i class="fas fa-globe text-success text-center" style="display:block;"></i>' +
											'</div>' +
											'<div class="infobubble-list-content">' +
												'<h4 class="infobubble-list-title">TRACKING</h4>' +
												'<p class="infobubble-list-desc"><span class="text-success">ON</span></p>' +
											'</div>' +
											'<div class="infobubble-list-content">' +
												
											'</div>' +
										'</div>' + 
										'<div class="infobubble-list-item-alt">' +
											'<div class="infobubble-list-content">' +
												'<a href="employeepage?employee_id=' + employee.employee_id + '" target="_blank" data-toggle="tooltip" title="View employee page" class="infobubble-link" ><i class="fas fa-fw fa-user"></i></a>' +
												'<a href="mailto:' + employee.employee_email + '" data-toggle="tooltip" title="Send e-mail" class="infobubble-link" ><i class="fas fa-fw fa-envelope"></i></a>' +
												'<span onClick="sendPushNotification()" data-toggle="tooltip" title="Send push notification" class="infobubble-link" ><i class="fas fa-fw fa-mobile-alt"></i></span>' +
											'</div>' +
										'</div>';
                            exists.setData({
                                id: employee.employee_id,
                                html: markerHTML,
                                lat: employee.latitude,
                                lng: employee.longitude
                            });
                        } else {
                            var marker = new H.map.Marker({ lat: employee.latitude, lng: employee.longitude }, { icon: employeeIcon });
							var statusStr = "<span class='text-success'>ONLINE</span>";
							if (employee.employee_online == 0){
								statusStr = "<span class='text-danger'>OFFLINE</span>";
							}
                            var markerHTML = '<div class="infobubble-list-item">' +
											'<div class="infobubble-list-media">' +
												'<img src="' + imgURL + '" alt="" class="rounded">' +
											'</div>' +
											'<div class="infobubble-list-content">' +
												'<h4 class="infobubble-list-title"><a target="_blank" href="employeepage?employee_id=' + employee.employee_id + '" >' + employee.employee_name + ' ' + employee.employee_surname + '</a></h4>' +
												'<p class="infobubble-list-desc">Contact ' + employee.employee_phone + '</p>' +
											'</div>' +
										'</div>' + 
										'<div class="infobubble-list-item-alt">' +
											'<div class="infobubble-list-media">' +
												'<i class="fas fa-info-circle text-primary text-center" style="display:block;"></i>' +
											'</div>' +
											'<div class="infobubble-list-content">' +
												'<h4 class="infobubble-list-title">STATUS</h4>' +
												'<p class="infobubble-list-desc">' + statusStr + '</p>' +
											'</div>' +
											'<div class="infobubble-list-content">' +
												'<h4 class="infobubble-list-title">LAST SPEED</h4>' +
												'<p class="infobubble-list-desc">' + employee.speed + ' km/h</p>' +
											'</div>' +
										'</div>' +
										'<div class="infobubble-list-item-alt">' +
											'<div class="infobubble-list-media">' +
												'<i class="fas fa-road text-danger text-center" style="display:block;"></i>' +
											'</div>' +
											'<div class="infobubble-list-content">' +
												'<h4 class="infobubble-list-title">DISTANCE</h4>' +
												'<p class="infobubble-list-desc">' + (employee.distance / 1000) + ' km</p>' +
											'</div>' +
											'<div class="infobubble-list-content">' +
												'<h4 class="infobubble-list-title">LAST LOGIN</h4>' +
												'<p class="infobubble-list-desc">' + moment(employee.last_login).format(dateformat + ", " + timeformat) + '</p>' +
											'</div>' +
										'</div>' +
										'<div class="infobubble-list-item-alt">' +
											'<div class="infobubble-list-media">' +
												'<i class="fas fa-globe text-success text-center" style="display:block;"></i>' +
											'</div>' +
											'<div class="infobubble-list-content">' +
												'<h4 class="infobubble-list-title">TRACKING</h4>' +
												'<p class="infobubble-list-desc"><span class="text-success">ON</span></p>' +
											'</div>' +
											'<div class="infobubble-list-content">' +
											'</div>' +
										'</div>' + 
										'<div class="infobubble-list-item-alt">' +
											'<div class="infobubble-list-content">' +
												'<a href="employeepage?employee_id=' + employee.employee_id + '" target="_blank" data-toggle="tooltip" title="View employee page" class="infobubble-link" ><i class="fas fa-fw fa-user"></i></a>' +
												'<a href="mailto:' + employee.employee_email + '" data-toggle="tooltip" title="Send e-mail" class="infobubble-link" ><i class="fas fa-fw fa-envelope"></i></a>' +
												'<span onClick="sendPushNotification()" data-toggle="tooltip" title="Send push notification" class="infobubble-link" ><i class="fas fa-fw fa-mobile-alt"></i></span>' +
											'</div>' +
										'</div>';
                            marker.setData({
                                id: employee.employee_id,
                                html: markerHTML,
                                lat: employee.latitude,
                                lng: employee.longitude
                            });
                            
                            marker.addEventListener('tap', function(evt) {
                                // event target is the marker itself, group is a parent event target
                                // for all objects that it contains
                                map.setCenter({
                                    lat: evt.target.getData().lat,
                                    lng: evt.target.getData().lng
                                });
                                var bubble = new H.ui.InfoBubble(evt.target.getPosition(), {
                                    // read custom data
                                    content: evt.target.getData().html
                                });
        
                                if (currentBubble != null) { //ensures we can only have 1 infobubble open at a time
                                    currentBubble.close();
                                }
                                currentBubble = bubble;
                                // show info bubble
                                ui.addBubble(bubble);
                            }, false);
        
                            map.addObject(marker);
        
                            markers.push(marker);
                        }
                    }
					$("#onlineList").html(onlineListContent);
					$("#offlineList").html(offlineListContent);
					$("#onlineSpan").html(online);
					$("#offlineSpan").html(offline);
					$("#stoppedSpan").html(stopped);
                    for (var i = 0; i < markers.length; i++) {
                        var employeeOnline = false;
                        for (var j = 0; j < employees.length; j++) {
                            if (markers[i].getData().id == employees[j].employee_id) {
                                employeeOnline = true;
                            }
                        }
                        if (!employeeOnline) { // if employee for this marker is no longer online, remove marker from map.
                            map.removeObject(markers[i]);
                            markers.splice(i, 1);
                        }
                    }
                }
            });
        }
        
        
        function drawEmployeePolyline(employee_id, datetime, speed, distance) {
            var postData = {
                "employee_id": employee_id,
                "datetime": datetime
            };
            if (employeePath != null) {
                map.removeObject(employeePath);
                employeePath = null;
            }
            $.ajax({
                type: "POST",
                url: "employees/logs",
                data: postData,
                dataType: "json",
                success: function(logs) {
                    $.ajax({
                        type: "POST",
                        url: "employee/stops",
                        data: postData,
                        dataType: "json",
                        success: function(response) {
							var stops = response.stops;
							var events = response.events;
                            for (var i = stopsMarkers.length - 1; i >= 0; i--){
                                map.removeObject(stopsMarkers[i]);
                            }
                            stopsMarkers = [];
							
							for (var i = eventMarkers.length - 1; i >= 0; i--){
								map.removeObject(eventMarkers[i]);
							}
							eventMarkers = [];
                            var stopIcon = new H.map.Icon("<?= IMG_URL ?>" + "stop_icon.png");
                            for (var i = 0; i < stops.length; i++){
                                var stop = stops[i];
                                var marker = new H.map.Marker({ lat: stop.latitude, lng: stop.longitude }, { icon: stopIcon });
                                
                                marker.setData({
                                    id: stop.stop_id,
                                    html: "<p>Unknown stop</p>",
                                    lat: stop.latitude,
                                    lng: stop.longitude
                                });
                                
                                map.addObject(marker);
            
                                stopsMarkers.push(marker);
                            }
							
							for (var i = 0; i < events.length; i++){
								var event = events[i];
								if (event.event_address != ""){
									var marker = new H.map.Marker({ lat: event.latitude, lng: event.longitude });
									var arrivalDate = "Not yet visited";
									if (event.event_arrivaldate != ""){
										arrivalDate = moment(event.event_arrivaldate).format(dateformat + ", " + timeformat);
									}
									if (event.event_endingdate != ""){
										arrivalDate += " <strong>to</strong> " + moment(event.event_endingdate).format(dateformat + ", " + timeformat);
									}
									var statusString;;
									if (event.status == 0){ //status 0 is confirmed, default status.
										statusString = "<i class='fa fa-circle text-warning m-r-5'></i>Incomplete";
									}else if (event.status == 1){ //in progress, set when employee reaches event destination
										statusString = "<i class='fa fa-circle text-primary m-r-5'></i>In progress";
									}else if (event.status == 2){ //done, set when user marks it as such on Android app
										statusString = "<i class='fa fa-circle text-success m-r-5'></i>Finished";
									}else{
										statusString = "<i class='fa fa-circle text-danger m-r-5'></i>Canceled";
									}
									var content = "<h5 class='infoHeader'>" + event.event_subject + "</h5><p>" + statusString + "<br><strong>Created by: </strong>" + event.employee_name + " " + event.employee_surname +
									"<br /><strong>Scheduled for: </strong>" + moment(event.event_startdate + " " + event.event_starttime).format(dateformat + ", " + timeformat) + " <strong>to</strong> " + moment(event.event_enddate + " " + event.event_endtime).format(dateformat + ", " + timeformat) +
									event.event_startdate + "<br/><strong>Actual duration from: </strong>" + arrivalDate + 
									"<br/><strong>Importance: </strong>" + event.event_importance + "<br/><strong>Description: </strong>" + event.event_description + "</p>";
									
									marker.setData({
										id: event.event_id,
										html: content,
										lat: event.latitude,
										lng: event.longitude
									});
									
									marker.addEventListener('tap', function(evt) {
										// event target is the marker itself, group is a parent event target
										// for all objects that it contains
										map.setCenter({
											lat: evt.target.getData().lat,
											lng: evt.target.getData().lng
										});
										var bubble = new H.ui.InfoBubble(evt.target.getPosition(), {
											// read custom data
											content: evt.target.getData().html
										});
				
										if (currentBubble != null) { //ensures we can only have 1 infobubble open at a time
											currentBubble.close();
										}
										currentBubble = bubble;
										// show info bubble
										ui.addBubble(bubble);
									}, false);
									
									map.addObject(marker);
				
									eventMarkers.push(marker);
								}
							}
                            
                            var coords = [];
                            var waypointPath;
                            var curCoords = [];
                            
                            if (logs.length > 1) {
                                var lineString = new H.geo.LineString();
                                for (var i = 0; i < logs.length; i++) {
                                    var latitude = parseFloat(logs[i].latitude);
                                    var longitude = parseFloat(logs[i].longitude);
                                    lineString.pushPoint({lat: latitude, lng: longitude});
                                    if (i == logs.length - 1){
                                        map.setCenter({
                                            lat: latitude,
                                            lng: longitude
                                        });
                                    }
                                }
                                employeePath = new H.map.Polyline(lineString, { style: { lineWidth: 7 }, arrows: { fillColor: 'white', frequency: 2, width: 0.8, length: 0.7 }});
                                map.addObject(employeePath);
                                $("#speedGraph").empty();
                                
                                new Morris.Bar({
                                    element: 'speedGraph',
                                    data: logs,
                                    xkey: 'datetime',
                                    ykeys: ['speed'],
                                    hideHover: "auto",
                                    resize: true,
                                    gridTextColor: "#222",
                                    axes: "y",
                                    barColors: ["#007aff"],
                                    hoverCallback: function(index, options, content, row) {
                                        graphMarker.setPosition({
                                            lat: row.latitude,
                                            lng: row.longitude
                                        });
                                        return content;
                                    },
                                    labels: ['Speed(km/h)']
                                });
                            }
                            
                            $("#distanceSpan").html((distance / 1000) + " km");
                            
                            if (firstPageLoad){
                                App.init();
                                firstPageLoad = false;
                            }
                        }
                    });
                    
        
                }
            });
        }
		
		function showEventAddress(row){
			var actualRow = $(row).parents('tr');
			if (actualRow.hasClass('child')) {//Check if the current row is a child row
				actualRow = actualRow.prev();//If it is, then point to the row before it (its 'parent')
			}
            var event = eTable.row(actualRow).data();
			map.setCenter({
                lat: event.latitude,
                lng: event.longitude
            });
		}
        
        function showLastLogs(){
            var lastLog = $("#logsSpan").html();
            if (lastLog != ""){
                var lastDate = lastLog.split(" ")[0]; //get first part of YYYY-MM-DD HH:mm:ss date
                $("#dateTimeInput").val(lastDate).trigger("change");
            }
        }
        
        function showCustomerPage(row){
		    var stop = dTable.row($(row).parents('tr')).data();
		    var url = "<?= BASE_URL ?>" + "customerdetails?customer_id=" + stop.customer_id;
		    window.open(url, "_blank");
		}
		
		function showEmployeePage(row){
		    var url = "<?= BASE_URL ?>" + "employeepage?employee_id=" + currentEmployee.employee_id;
		    window.open(url, "_blank");
		}
		
		function showOnMap(row){
		    var stop = dTable.row($(row).parents('tr')).data();
            map.setCenter({
                lat: stop.latitude,
                lng: stop.longitude
            });
        }
        
        function toggleSpeedGraph(){
            if ($("#speedGraph").hasClass("hide")){
                $("#tableDIV").addClass("hide");
                $("#speedGraph").removeClass("hide");
                $("#speedGraph").trigger("resize");
            }else{
                $("#tableDIV").removeClass("hide");
                $("#speedGraph").addClass("hide");
                $("#speedGraph").trigger("resize");
            }
        }
		
		
	</script>
</body>
</html>
