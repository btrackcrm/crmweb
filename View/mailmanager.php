<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
<!--<![endif]-->
<head>
	<meta charset="utf-8" />
	<title>MailManager</title>
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
    <link href="<?= ASSETS_URL . "morris/morris.css" ?>" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.6.9/sweetalert2.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.6.9/sweetalert2.min.css">
    <link href="<?= ASSETS_URL . "jquery-tag-it/css/jquery.tagit.css" ?>" rel="stylesheet" />
    <link href="<?= ASSETS_URL . "bootstrap-wysihtml5/src/bootstrap3-wysihtml5.css" ?>" rel="stylesheet" />

	<!-- ================== END PAGE LEVEL STYLE ================== -->
	
	<!-- ================== BEGIN BASE JS ================== -->
	<script src="<?= ASSETS_URL . "pace/pace.min.js" ?>" ></script>
	<!-- ================== END BASE JS ================== -->
</head>
<style>
    .hideMe{
        display: none;
    }
    
    #loadingSpinnerDIV, #filteringSpinnerDIV{
        width: 400px;
        height: 80px;
        position: relative;
        background-color: white;
        margin: 15% auto 0px auto;
    }
    
    #composeEmailDIV, #newFilterDIV, #editFilterDIV{
        width: 900px;
        height: auto;
        position: relative;
        margin: 5% auto 0px auto;
    }
	
	#newMailboxDIV{
        width: 400px;
        height: auto;
        position: relative;
        margin: 5% auto 0px auto;
    }
	
	.spinner-loading {
		height: 40px;
		width: 40px;
		position: absolute;
		top: 50%;
		left: 50px;
		margin: -20px 0 0 -20px;
		border: 2px solid #00acac;
		border-top: 2px solid #fff;
		border-radius: 100%;
		animation: rotation .6s infinite linear;
	}
    
    .loadingLabel {
		position: absolute;
		text-align: center;
		font-size: 18px;
		line-height: 80px;
		width: 100%;
	}
    
    #emailDetails{
        margin-bottom: 20px;
        background: #fff;
        -webkit-border-radius: 3px;
        -moz-border-radius: 3px;
        border-radius: 3px;
    }
    
    .tab-content{
        background:none;
        padding: 0px;
    }
    
    .list-group li:hover{
        cursor: pointer;
        background-color: #eee;
    }
    
    .list-group li:hover .email-checkbox label{
        color: #222;
    }
    
    #emailBody img{
        max-width: 100%;
        height: auto;
    }
    
    .vertical-box-column{
        position: relative;
    }
    
    #paginationDIV{
        position: absolute;
        bottom: 0px;
        left: initial;
        width: 100%;
    }
    
    .b-l-gray{
        border-left: 1px solid rgb(217, 223, 226);
    }
    
    .b-t-gray{
        border-top: 1px solid rgb(217, 223, 226);
    }
    
    .b-b-gray{
        border-bottom: 1px solid rgb(217, 223, 226);
    }
    
    .list-email .read .email-title {
        font-weight: 600;
    }
	
	.input-sm {
		display: initial;
		height: 28px;
	}
	
	#filtersTable{
		width: 100% !important;
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
								echo '<li class="active">
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
		<div id="content" class="content content-full-width inbox">
			<ul class="nav nav-tabs">
						<li class="nav-items">
							<a href="#webmail-tab" data-toggle="tab" class="nav-link active show">
								<span>Webmail</span>
							</a>
						</li>
						<li class="nav-items">
							<a href="#filters-tab" data-toggle="tab" class="nav-link">
								<span>Filters</span>
							</a>
						</li>
						<li class="nav-items">
							<a href="#history-tab" data-toggle="tab" class="nav-link">
								<span>History</span>
							</a>
						</li>
			</ul>
			<div class="tab-content">
				<div class="tab-pane active" id="webmail-tab">
					<div id="mailContainer">
					<!-- begin vertical-box -->
					<div class="vertical-box">
						<!-- begin vertical-box-column -->
						
						<div class="vertical-box-column d-none d-lg-table-cell width-200 bg-silver">
							<div class="wrapper bg-silver-lighter">
								<button class="btn btn-white btn-block btn-sm" onClick="showComposePopup()">
									<i class="fas fa-paper-plane text-success m-r-5"></i>Compose
								</button>
							</div>
							<div class="wrapper bg-silver p-0 b-t-gray">
								<div class="nav-title"><b>FOLDERS</b></div>
								<ul id="folderList" class="nav nav-inbox">
								</ul>
							</div>
							<div class="p-15">
								<button class="btn btn-white btn-block" onClick="showNewMailboxPopup()"><i class="fas fa-folder text-warning m-r-5"></i>Add a folder</button>
							</div>
						</div>
						<!-- begin vertical-box-column -->
						<div class="vertical-box-column d-none d-lg-table-cell bg-white b-l-gray">
							<!-- begin list-email -->
							<div id="emailOverview">
									<!-- begin wrapper -->
									<div class="wrapper bg-silver-lighter">
										<!-- begin btn-toolbar -->
										<div class="btn-toolbar">
											<!-- begin btn-group -->
											<div class="btn-group pull-right">
												<button class="btn btn-white btn-sm" onClick="goToPreviousPage()">
													<i class="ion-chevron-left"></i>
												</button>
												<button class="btn btn-white btn-sm" onClick="goToNextPage()">
													<i class="ion-chevron-right"></i>
												</button>
											</div>
											<div class="m-t-5 pull-right m-r-5" id="pageCount"></div>
											<div class="btn-group">
												<div class="dropdown">
												  <button class="btn btn-white btn-sm dropdown-toggle pull-left" type="button" data-toggle="dropdown">Per page
												  <span class="caret"></span></button>
												  <ul id="pageList" class="dropdown-menu">
													<li><a href="#">5</a></li>
													<li><a href="#">10</a></li>
													<li><a href="#">15</a></li>
													<li><a href="#">20</a></li>
													<li><a href="#">25</a></li>
												  </ul>
												</div>
											</div>
											<div class="input-group width-sm">
											  <input id="searchEmailsInput" type="text" class="form-control input-sm pull-left" placeholder="Search query..." >
											  <span class="input-group-btn">
												<button class="btn btn-white btn-sm" type="button" onClick="filterEmails()"><i class="fa fa-search"></i></button>
											  </span>
											</div><!-- /input-group -->
											
											<!-- begin btn-group -->
	
											<button class="btn btn-sm btn-white m-r-5" data-toggle="tooltip" data-placement="bottom" data-title="Refresh" data-original-title="" title="" onClick="refreshEmails()"><i class="fas fa-sync-alt text-primary"></i></button>
											<button class="btn btn-sm btn-white m-r-5" data-toggle="tooltip" data-placement="bottom" data-title="Run filtering" data-original-title="" title="" onClick="runFiltering()"><i class="fas fa-filter text-primary"></i></button>
											
											<!-- end btn-group -->
											<!-- begin btn-group -->
											<div class="btn-group">
												<div class="dropdown">
												  <button id="moveBtn" class="btn btn-white btn-sm dropdown-toggle pull-left hide" type="button" data-toggle="dropdown">Move to
												  <span class="caret"></span></button>
												  <ul id="moveList" class="dropdown-menu">
													
												  </ul>
												</div>
											</div>
											<button class="btn btn-sm btn-white m-r-5 pull-left hide" data-email-action="delete"><i class="fa fa-trash text-danger m-r-3"></i> <span class="hidden-xs">Delete</span></button>
											<!-- end btn-group -->
										</div>
										<!-- end btn-toolbar -->
									</div>
									<!-- end wrapper -->
									<ul id="emailList" class="list-group list-group-lg no-radius list-email">
											
									</ul>
							</div>
							<div id="emailDetails" hidden>
								<!-- begin wrapper -->
								<div class="wrapper bg-silver-lighter p-b-15">
										<!-- begin btn-toolbar -->
										<div class="btn-toolbar">
											
											<button class="btn btn-sm btn-white" data-toggle="tooltip" data-placement="bottom" data-title="Back to overview" data-original-title="" title="" onClick="showEmailOverview()"><i class="ion-android-arrow-back"></i></button>
											
											<div id="deleteGrp" class="btn-group">
												<button class="btn btn-sm btn-white" onClick="showReplyPopup()"><i class="ion-chatbox-working text-primary m-r-3"></i> <span class="hidden-xs">Reply</span></button>
												<button class="btn btn-sm btn-white" onClick="showForwardPopup()"><i class="ion-android-send text-success m-r-3"></i> <span class="hidden-xs">Forward</span></button>
												<button class="btn btn-sm btn-white" onClick="deleteEmail()"><i class="ion-trash-b text-danger m-r-3"></i> <span class="hidden-xs">Delete</span></button>
											</div>
											<!-- end btn-group -->
										</div>
										<!-- end btn-toolbar -->
								</div>
								<div id="emailBody" class="p-15">
										
								</div>
								<div id="emailAttachments" class="p-15">
									<ul id="attachmentsList" class="attached-document clearfix">
				
									</ul>
								</div>
							</div>
							
							<!-- end list-email -->
							

						</div>
						<!-- end vertical-box-column -->
					</div>
					<!-- end vertical-box -->
					</div>
				</div>
				<div class="tab-pane" id="filters-tab">
					<div class="row p-30">
						<div class="col-md-12">
							<button onClick="showNewFilterPopup()" class="btn btn-white m-b-20"><i class="fa fa-plus text-primary m-r-5"></i>Add a filter</button>
							<div class="panel panel-primary">
								<div class="panel-heading">
									<div class="panel-heading-btn">
										<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
										<a href="getFilters()" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-repeat"></i></a>
										<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
										<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
									</div>
									<h4 class="panel-title">Filters</h4>
								</div>
								<div class="panel-body">
									<div class="dataTables_wrapper form-inline dt-bootstrap no-footer">
										<table id="filtersTable" class="table table-striped">
											<thead>
												<tr>
													<th>
														Search in
													</th>
													<th>
														Filter text
													</th>
													<th>
														Move to
													</th>
													<th>
														Added by
													</th>
													<th>
														Created on
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
						</div>
					</div>
				</div>
				<div class="tab-pane" id="history-tab">
					<div class="p-30">
						<div class="wrapper bg-silver-lighter">
									<!-- begin btn-toolbar -->
									<div class="btn-toolbar">
										<!-- begin btn-group -->
										<input id="historyDateInput" type="text" class="form-control width-xs input-sm pull-left" placeholder="Select a date">
										<div class="btn-group pull-right">
											<button class="btn btn-sm btn-white" data-toggle="tooltip" data-placement="bottom" data-title="Refresh" data-original-title="" title="" onclick="getHistoryByDate()"><i class="ion-refresh"></i></button>
										</div>
										<!-- end btn-group -->
									</div>
									<!-- end btn-toolbar -->
						</div>
						<div id="managerActions" class="widget-list widget-list-rounded">
							<div class="widget-list-item">
																	
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="popupContainer" id="loadingPopup" hidden>
            <div id="loadingSpinnerDIV">
                <span class="spinner-loading"></span>
                <p class="loadingLabel">Fetching e-mails...</p>
            </div>
        </div>
		<div class="popupContainer" id="filteringPopup" hidden>
            <div id="filteringSpinnerDIV">
                <span class="spinner-loading"></span>
                <p class="loadingLabel">Filtering e-mails...</p>
            </div>
        </div>
		<div class="popupContainer" id="filterPopup" hidden>
			<div class="panel panel-inverse" id="newFilterDIV" hidden>
                <div class="panel-heading">
                    <div class="panel-heading-btn">
                        <button onclick="hideNewFilterPopup()" class="btn btn-xs btn-icon btn-circle btn-default"><i class="fa fa-times"></i></button>
                    </div>
                    <h4 class="panel-title">Add a filter</h4>
                </div>
                <div class="panel-body">
					<form id="newFilterForm" action="<?= BASE_URL . "webmail/addfilter" ?>" method="post" class="form-horizontal">
						<div class="form-group">
							<div class="col-xs-12 col-sm-6 col-md-4">
                                <label>Search in </label><br/>
                                <div class="radio radio-css radio-inline radio-success">
                                    <input type="radio" name="filter_field" id="nyr1" value="TEXT" checked>
                                    <label for="nyr1">
                                        Whole e-mail
                                    </label>
                                </div>
                                <div class="radio radio-css radio-inline radio-primary">
                                    <input type="radio" name="filter_field" id="nyr2" value="SUBJECT">
                                    <label for="nyr2">
                                        Subject
                                    </label>
                                </div>
								<div class="radio radio-css radio-inline radio-primary">
                                    <input type="radio" name="filter_field" id="nyr3" value="FROM">
                                    <label for="nyr3">
                                        From
                                    </label>
                                </div>
                            </div>
						</div>
						<div class="form-group">
							<div class="col-md-12">
								<label>Filter text:</label>
								<input type="text" class="form-control" name="filter_text" placeholder="Enter text to filter by" required />
							</div>
						</div>
						<div class="form-group">
							<div class="col-md-12">
								<label>Move filtered e-mails to:</label>
								<select id="filterMailboxSelect" class="form-control" name="filter_mailbox">
								
								</select>
							</div>
						</div>
				</div>
				<div class="panel-footer">
					<button class="btn btn-primary">Add filter</button>
					<button type="button" onClick="hideNewFilterPopup()" class="btn btn-danger pull-right">Close</button>
					</form>
				</div>
			</div>
			<div class="panel panel-inverse" id="editFilterDIV" hidden>
                <div class="panel-heading">
                    <div class="panel-heading-btn">
                        <button onclick="hideEditFilterPopup()" class="btn btn-xs btn-icon btn-circle btn-default"><i class="fa fa-times"></i></button>
                    </div>
                    <h4 class="panel-title">Edit filter</h4>
                </div>
                <div class="panel-body">
					<form id="editFilterForm" action="<?= BASE_URL . "webmail/editfilter" ?>" method="post" class="form-horizontal">
						<input id="editFilterIDInput" type="hidden" name="filter_id" />
						<div class="form-group">
							<div class="col-xs-12 col-sm-6 col-md-4">
                                <label>Search in </label><br/>
                                <div class="radio radio-css radio-inline radio-success">
                                    <input type="radio" name="filter_field" id="byr1" value="TEXT" checked>
                                    <label for="byr1">
                                        Whole e-mail
                                    </label>
                                </div>
                                <div class="radio radio-css radio-inline radio-primary">
                                    <input type="radio" name="filter_field" id="byr2" value="SUBJECT">
                                    <label for="byr2">
                                        Subject
                                    </label>
                                </div>
								<div class="radio radio-css radio-inline radio-primary">
                                    <input type="radio" name="filter_field" id="byr3" value="FROM">
                                    <label for="byr3">
                                        From
                                    </label>
                                </div>
                            </div>
						</div>
						<div class="form-group">
							<div class="col-md-12">
								<label>Filter text:</label>
								<input id="editFilterTextInput" type="text" class="form-control" name="filter_text" placeholder="Enter text to filter by" required />
							</div>
						</div>
						<div class="form-group">
							<div class="col-md-12">
								<label>Move e-mails to:</label>
								<select id="editFilterMailboxSelect" class="form-control" name="filter_mailbox">
								
								</select>
							</div>
						</div>
				</div>
				<div class="panel-footer">
					<button class="btn btn-primary">Edit filter</button>
					<button type="button" onClick="hideEditFilterPopup()" class="btn btn-danger pull-right">Close</button>
					</form>
				</div>
			</div>
		</div>
		<div class="popupContainer" id="newMailboxPopup" hidden>
			<div class="panel panel-inverse" id="newMailboxDIV">
                <div class="panel-heading">
                    <div class="panel-heading-btn">
                        <button onclick="hideNewMailboxPopup()" class="btn btn-xs btn-icon btn-circle btn-default"><i class="fa fa-times"></i></button>
                    </div>
                    <h4 class="panel-title">Create new folder</h4>
                </div>
                <div class="panel-body">
					<form id="newMailboxForm" action="<?= BASE_URL . "webmail/imapfoldercreate" ?>" method="post" class="form-horizontal">
						<div class="form-group">
							<div class="col-md-12">
								<label>Folder name:</label>
								<input type="text" class="form-control" name="mailbox_name" required />
							</div>
						</div>
				</div>
				<div class="panel-footer">
					<button class="btn btn-primary">Create folder</button>
					<button type="button" onClick="hideNewMailboxPopup()" class="btn btn-danger pull-right">Close</button>
					</form>
				</div>
			</div>
		</div>
        <div class="popupContainer" id="composePopup" hidden>
            <div class="panel panel-inverse" id="composeEmailDIV">
                <div class="panel-heading">
                    <div class="panel-heading-btn">
                        <button onclick="hideComposePopup()" class="btn btn-xs btn-icon btn-circle btn-default"><i class="fa fa-times"></i></button>
                    </div>
                    <h4 class="panel-title">Compose</h4>
                </div>
                <div class="panel-body inbox">
                    <form id="sendEmailForm" action="<?= BASE_URL . "email/send" ?>" method="post" class="form-horizontal">
                        <div class="email-to">
												<span class="float-right-link">
													<a href="#" data-click="add-cc" data-name="Cc" class="m-r-5">Cc</a>
													<a href="#" data-click="add-cc" data-name="Bcc">Bcc</a>
												</span>
												<label class="control-label">To:</label>
												<ul id="email-to" class="primary line-mode tagit ui-widget ui-widget-content ui-corner-all">
													
													
												</ul>
											</div>
						<div data-id="extra-cc"></div>
                        <div class="email-subject">
												<input id="emailSubjectInput" type="text" class="form-control form-control-lg" name="email_subject" placeholder="Subject">
											</div>
						<div class="email-content p-t-15">
							<textarea id="emailMessageInput" class="form-control" name="email_message" placeholder="Enter e-mail message"></textarea>
						</div>
                </div>
				<div class="panel-footer">
					<button class="btn btn-primary">Send e-mail</button>
					<button type="button" class="btn btn-danger pull-right" onClick="hideComposePopup()">Close</button>
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
	<!-- ================== END BASE JS ================== -->
	
	<!-- ================== BEGIN PAGE LEVEL JS ================== -->
	<script src="<?= JS_URL . "apps.min.js" ?>"></script>
	<script src="<?= JS_URL . "timedisplay.js" ?>"></script>
	<script src="<?= JS_URL . "inactivity.js" ?>"></script>
	<script src="<?= JS_URL . "base64.js" ?>"></script>
	

	<script src="<?= ASSETS_URL . "fullcalendar/lib/moment.min.js" ?>"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/js/bootstrap-datetimepicker.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/css/bootstrap-datetimepicker.min.css" rel="stylesheet"/>
    <script src="<?= ASSETS_URL . "tinymce/js/tinymce/tinymce.min.js" ?>"></script>
    <link href="<?= ASSETS_URL . "DataTables/media/css/dataTables.bootstrap.min.css" ?>" rel="stylesheet" />
	<link href="<?= ASSETS_URL . "DataTables/extensions/Responsive/css/responsive.bootstrap.min.css" ?>" rel="stylesheet" />
	<script src="<?= ASSETS_URL . "DataTables/media/js/jquery.dataTables.js" ?>"></script>
	<script src="<?= ASSETS_URL . "DataTables/media/js/dataTables.bootstrap.min.js" ?>"></script>
	<script src="<?= ASSETS_URL . "DataTables/extensions/Responsive/js/dataTables.responsive.min.js" ?>"></script>
	<script src="<?= ASSETS_URL . "jquery-tag-it/js/tag-it.min.js" ?>"></script>
	<script src="<?= ASSETS_URL . "bootstrap-wysihtml5/dist/bootstrap3-wysihtml5.all.min.js" ?>"></script>
	<script src="<?= ASSETS_URL . "gritter/js/jquery.gritter.min.js" ?>" ></script>
	<script src="<?= ASSETS_URL . "tinymce/js/tinymce/tinymce.min.js" ?>"></script>
	<!-- ================== END PAGE LEVEL JS ================== -->
	<script>
		var loggedEmployee = <?php echo json_encode($_SESSION["id"]); ?>;
		var dateformat = <?php echo json_encode($_SESSION["dateformat"]); ?>;
		var timeformat = <?php echo json_encode($_SESSION["timeformat"]); ?>;
		var emailArray = [];
		var folderArray;
		var firstPageLoad = true;
		var allMessages;
        var currentPage = 1;
        var perPage;
		
		var loadedPages = [];
		
		var currentMail;
		var currentFolder;
		
		var dTable;
		var dpFormat;
		
		$(document).ready(function() {
			dpFormat = dateformat.replace("YYYY", "YY");
			dpFormat = dpFormat.toLowerCase();
			perPage = Cookies.get("imap_page", 15);
			if (perPage == undefined){
				perPage = 15;
				Cookies.set("imap_page", 15, { expires: 365 });
			}
			getFolders();
			getFilters();
			getHistory(moment(new Date()).format("YYYY-MM-DD"));
			getMenuStatistics(loggedEmployee);
			$("#email-to").tagit({
                beforeTagAdded: function(event, ui) {
                    return isEmail(ui.tagLabel);
                }
            });
			
			$("#historyDateInput").datepicker({dateFormat: dpFormat });
			$('#historyDateInput').change(function(e){ 
                getHistoryByDate();
            });
			
			$("#pageList li").click(function(){
				var idx = $(this).index();
				if (idx == 0){
					perPage = 5;
				}else if (idx == 1){
					perPage = 10;
				}else if (idx == 2){
					perPage = 15;
				}else if (idx == 3){
					perPage = 20;
				}else{
					perPage = 25;
				}
				Cookies.set('imap_page', perPage, { expires: 365 });
				refreshEmails();
			});
			
			tinymce.init({
                selector: 'textarea#emailMessageInput',
                menubar: false,
                min_height: 400,
                convert_urls: false,
                setup: function (editor) {
                    editor.on('change', function () {
                        editor.save();
                    });
                }
            });
			
			$(document).on("click", '[data-click="add-cc"]', function(a) {
				a.preventDefault();
				var t = $(this).attr("data-name"),
					l = "email-cc-" + t,
					n = '\t<div class="email-to">\t\t<label class="control-label">' + t + ':</label>\t\t<ul id="' + l + '" class="primary line-mode"></ul>\t</div>';
				$('[data-id="extra-cc"]').append(n), $("#" + l).tagit({
					beforeTagAdded: function(event, ui) {
						return isEmail(ui.tagLabel);
					}
				}), $(this).remove()
			})
			
			$("[data-checked=email-checkbox]").live("click", function() {
                var e = $(this).closest("label");
                var t = $(this).closest("li");
                if ($(this).prop("checked")) {
                    $(e).addClass("active");
                    $(t).addClass("selected")
                } else {
                    $(e).removeClass("active");
                    $(t).removeClass("selected")
                }
                handleEmailActionButtonStatus();
            });
        
		
		
			
            $("[data-email-action]").live("click", function() {
				var checked = [];
				$('[data-checked=email-checkbox]:checked').each(function() {
					checked.push($(this));
				});
				var emailsToDelete = [];
				for (var i = checked.length - 1; i >= 0; i--){
					emailsToDelete.push($(checked[i]).closest("li").index());
					$(checked[i]).closest("li").slideToggle(function() {
						$(this).remove();
						handleEmailActionButtonStatus();
					});
				}
				deleteEmails(emailsToDelete);
            });
			
			$('#newFilterForm').on('submit', function(e) { //use on if jQuery 1.7+
                e.preventDefault();
                    $.ajax({
                    	type: "POST",
                    	url: "<?= BASE_URL ?>" + "webmail/addfilter",
                    	data: $("#newFilterForm").serialize(),
                    	success: function(msg) {
                        	if (msg == ""){
                            		swal(
                                		'Success',
                                		'Filter created',
                                		'success'
                            		);
                                       getFilters();
                                       hideNewFilterPopup();

                        	}else {
                            		swal(
                                		'Error!',
                                		'The server encountered the following error: ' + msg,
                                		'error'
                            		);
                        	}
                    	}
                    });
            });
			
			$('#editFilterForm').on('submit', function(e) { //use on if jQuery 1.7+
                e.preventDefault();
                    $.ajax({
                    	type: "POST",
                    	url: "<?= BASE_URL ?>" + "webmail/editfilter",
                    	data: $("#editFilterForm").serialize(),
                    	success: function(msg) {
                        	if (msg == ""){
                            		swal(
                                		'Success',
                                		'Filter edited',
                                		'success'
                            		);
                                       getFilters();
                                       hideEditFilterPopup();

                        	}else {
                            		swal(
                                		'Error!',
                                		'The server encountered the following error: ' + msg,
                                		'error'
                            		);
                        	}
                    	}
                    });
            });
			
			$('#newMailboxForm').on('submit', function(e) { //use on if jQuery 1.7+
                e.preventDefault();
                    $.ajax({
                    	type: "POST",
                    	url: "<?= BASE_URL ?>" + "webmail/imapfoldercreate",
                    	data: $("#newMailboxForm").serialize(),
                    	success: function(msg) {
                        	if (msg == ""){
                            		swal(
                                		'Success',
                                		'Mailbox created',
                                		'success'
                            		);
                                       getFolders();
                                       hideNewMailboxPopup();

                        	}else {
                            		swal(
                                		'Error!',
                                		'The server encountered the following error: ' + msg,
                                		'error'
                            		);
                        	}
                    	}
                    });
                
            });
			
			$('#sendEmailForm').on('submit', function(e) { //use on if jQuery 1.7+
                e.preventDefault();
                var recipients = $("#email-to").tagit("assignedTags");
				var cc = [];
				if ($("#email-cc-Cc").length){
					cc = $("#email-cc-Cc").tagit("assignedTags");
				}
				var bcc = [];
				if ($("#email-cc-Bcc").length){
					 bcc = $("#email-cc-Bcc").tagit("assignedTags");
				}
                if (recipients.length == 0){
                    swal(
                        'No e-mail recipients',
                        'Please specify atleast one e-mail recipient',
                        'error'
                    );
                }else{
					var postData = $("#sendEmailForm").serializeArray();
					postData.push( {name: 'recipients', value: recipients});
					postData.push( {name: 'cc', value: cc });
					postData.push( {name: 'bcc', value: bcc });
                    $.ajax({
                    	type: "POST",
                    	url: "<?= BASE_URL ?>" + "email/send",
                    	data: postData,
                    	success: function(msg) {
                        	if (msg == ""){
                            		swal(
                                		'Success',
                                		'E-mail was sent successfully',
                                		'success'
                            		);
                                        getEmails();
                                        hideComposePopup();

                        	}else {
                            		swal(
                                		'Error!',
                                		'The server encountered the following error: ' + msg,
                                		'error'
                            		);
                        	}
                    	}
                    });
                }
            });
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
		
		function getHistoryByDate(){
			var selectedDate = moment($("#historyDateInput").val(), dateformat).format("YYYY-MM-DD");
			getHistory(selectedDate);
		}
		
		function getHistory(historyDate){
			var postData = { "date": historyDate };
			$.ajax({
                type: "POST",
                url: "<?= BASE_URL ?>" + "webmail/actions",
                data: postData,
				dataType: "json",
                success: function(history) {
					console.log(history);
					$("#managerActions").html("");
					for (var i = 0; i < history.length; i++){
						var action = history[i];
						var icon = "bg-primary fas fa-user";
						if (action.action_type == 0){
							icon = "bg-danger fas fa-desktop";
						}
						if (action.employee_id != null){
							$("#managerActions").append('<div class="widget-list-item">' +
																'<div class="widget-list-media icon">' +
																	'<i class="' + icon + '"></i>' +
																'</div>' +
																'<div class="widget-list-content">' +
																	'<h4 class="widget-list-title">' + action.action_description + '</h4>' +
																	'<p class="widget-list-desc">By <b>' + action.employee_name + " " + action.employee_surname + '</b> on <b>' + moment(action.created_on).format("dddd, Do MMMM, HH:mm") +  '</b></p>' +
																'</div>' +
															'</div>');
						}else{
							$("#managerActions").append('<div class="widget-list-item">' +
																'<div class="widget-list-media icon">' +
																	'<i class="' + icon + '"></i>' +
																'</div>' +
																'<div class="widget-list-content">' +
																	'<h4 class="widget-list-title">' + action.action_description + '</h4>' +
																	'<p class="widget-list-desc"><b>System function</b> on <b>' + moment(action.created_on).format("dddd, Do MMMM, HH:mm") +  '</b></p>' +
																'</div>' +
															'</div>');
						}
					}
				}
			});
		}
		
		function runFiltering(){
			$("#filteringPopup").show();
			$.ajax({
                type: "POST",
                url: "<?= BASE_URL ?>" + "webmail/runfilters",
                data: null,
                success: function(response) {
					if (response == ""){
                        refreshEmails();
                    }else {
                        swal(
                            'Error!',
                            'The server encountered the following error: ' + response,
                            'error'
                        );
                    }
					$("#filteringPopup").hide();
				}
			});
		}
		
		function getFilters(){
			$.ajax({
                type: "POST",
                url: "<?= BASE_URL ?>" + "webmail/filters",
                data: null,
                dataType: "json",
                success: function(filters) {
					if (dTable != null){
                        dTable.clear().rows.add(filters).draw();
                    }else{
						dTable = $('#filtersTable').DataTable({
							"aaData": filters,
							"columns": [
							    { "data": "filter_field" },
								{ "data": "filter_text" },
								{ "data": "filter_mailbox" },
								{ "data": "employee_id" },
								{ "data": "created_on" },
								{ "defaultContent": '<span onClick="showEditFilterPopup(this)" data-toggle="tooltip" title="Edit" class="text-primary pull-left pointer"><i class="fas fa-pencil-alt"></i></span><span onClick="deleteFilter(this)" data-toggle="tooltip" title="Delete" class="text-danger pointer pull-left m-l-10"><i class="fa fa-trash"></i></span>'}
							],
							"columnDefs": [
								{
									"render": function ( data, type, row ) {
										if (data == "TEXT"){
											return "<label class='label label-success'>Whole e-mail</label>";
										}else{
											return "<label class='label label-primary'>Subject</label>";
										}
									},
									"targets": 0
								},
								{
									"render": function ( data, type, row ) {
										var foldername = data.split(".");
										var actualFolderName = data.toLowerCase();
										if (foldername.length > 1){
											actualFolderName = foldername[foldername.length - 1].toLowerCase();
										}
										return actualFolderName.charAt(0).toUpperCase() + actualFolderName.slice(1);
									},
									"targets": 2
								},
								{
									"render": function ( data, type, row ) {
										return "<a class='text-primary hover-underline' href='employeepage?employee_id=" + data + "' target='_blank'>"  + row.employee_name + " " + row.employee_surname + "</a>";
									},
									"targets": 3
								},
								{
									"render": function ( data, type, row ) {
										return moment(data).format(dateformat + " " + timeformat);
									},
									"targets": 4
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
				}
			});
		}
		
		function showNewFilterPopup(){
			$("#filterPopup, #newFilterDIV").show();
		}
		
		function hideNewFilterPopup(){
			$("#newFilterForm")[0].reset();
			$("#filterPopup, #newFilterDIV").hide();
		}
		
		function showEditFilterPopup(row){
			var actualRow = $(row).parents('tr');
			if (actualRow.hasClass('child')) {//Check if the current row is a child row
				actualRow = actualRow.prev();//If it is, then point to the row before it (its 'parent')
			}
            var filter = dTable.row(actualRow).data();
			$("#editFilterIDInput").val(filter.filter_id);
			$("#editFilterTextInput").val(filter.filter_text);
			$("#editFilterMailboxSelect").val(filter.filter_mailbox);
			$("#filterPopup, #editFilterDIV").show();
		}
		
		function hideEditFilterPopup(){
			$("#editFilterForm")[0].reset();
			$("#filterPopup, #editFilterDIV").hide();
		}
		
		function deleteFilter(row){
			var actualRow = $(row).parents('tr');
			if (actualRow.hasClass('child')) {//Check if the current row is a child row
				actualRow = actualRow.prev();//If it is, then point to the row before it (its 'parent')
			}
			var filter = dTable.row(actualRow).data();
			swal({
              title: 'Confirm action',
              text: "Are you sure you want to delete this filter?",
              type: 'error',
              showCancelButton: true,
              confirmButtonColor: '#3085d6',
              cancelButtonColor: '#d33',
              confirmButtonText: 'Yes, remove'
            }).then(function () {
                var values = { filter_id: filter.filter_id };
                $.ajax({
                    type: "POST",
                    url: "webmail/deletefilter",
                    data: values,
                    success: function(msg) {
                        if (msg == "") {
                            swal(
                                'Success!',
                                'Filter was successfully removed.',
                                'success'
                            );
                            getFilters();
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
		
		function showNewMailboxPopup(){
			$("#newMailboxPopup").show();
		}
		
		function hideNewMailboxPopup(){
			$("#newMailboxForm")[0].reset();
			$("#newMailboxPopup").hide();
		}
		
		function isEmail(email) {
            var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
            return regex.test(email);
        }
		
		function handleEmailActionButtonStatus() {
            if ($("[data-checked=email-checkbox]:checked").length !== 0) {
                $("[data-email-action], #moveBtn").removeClass("hide")
            } else {
                $("[data-email-action], #moveBtn").addClass("hide")
            }
        };
		
		function getFolders(){
			$.ajax({
                type: "POST",
                url: "<?= BASE_URL ?>" + "webmail/imapfolders",
                data: null,
                dataType: "json",
                success: function(folders) {
					console.log(folders);
					folderArray = folders;
					var moveListContent = "";
					$("#folderList").html("");
					$("#editFilterMailboxSelect, #filterMailboxSelect").html("");
					for (var i = 0; i < folders.length; i++){
						var folder = folders[i];
						var foldername = folder.shortpath.split(".");
						var actualFolderName = folder.shortpath.toLowerCase();
						if (foldername.length > 1){
							actualFolderName = foldername[foldername.length - 1].toLowerCase();
						}
						actualFolderName = actualFolderName.charAt(0).toUpperCase() + actualFolderName.slice(1);
						moveListContent += "<li><a href='#'>" + actualFolderName + "</a></li>";
						
						$("#editFilterMailboxSelect, #filterMailboxSelect").append($('<option>', {
							value: folder.shortpath,
							text: actualFolderName
						}));
					
						var folderIcon = '<i class="fas fa-envelope fa-fw m-r-5"></i>';
						if (actualFolderName == "Inbox"){
							folderIcon = '<i class="fa fa-inbox fa-fw m-r-5"></i>';
						}else if (actualFolderName == "Archive"){
							folderIcon = '<i class="fas fa-archive fa-fw m-r-5"></i>'
						}else if (actualFolderName == "Junk"){
							folderIcon = '<i class="fas fa-eject fa-fw m-r-5"></i>'
						}else if (actualFolderName == "Trash"){
							folderIcon = '<i class="fa fa-trash fa-fw m-r-5"></i>';
						}else if (actualFolderName == "Drafts"){
							folderIcon = '<i class="fa fa-pencil-alt fa-fw m-r-5"></i>';
						}else if (actualFolderName == "Spam"){
							folderIcon = '<i class="fas fa-bullhorn fa-fw m-r-5"></i>';
						}else if (actualFolderName == "Sent"){
							folderIcon = '<i class="fas fa-paper-plane fa-fw m-r-5"></i>';
						}
						if (i == 0){
							$("#folderList").append('<li class="active" onClick="switchFolder(this,' + i + ')"><a href="#">' + folderIcon + actualFolderName + '</a></li>');
						}else{
							$("#folderList").append('<li onClick="switchFolder(this,' + i + ')"><a href="#">' + folderIcon + actualFolderName + '</a></li>');
						}
					}
					$("#moveList").html(moveListContent);
					
					
					$("#moveList li").click(function(){
						var folderIndex = $(this).index();
						var checked = [];
						$('[data-checked=email-checkbox]:checked').each(function() {
							checked.push($(this));
						});
						var emailsToMove = [];
						for (var i = checked.length - 1; i >= 0; i--){
							emailsToMove.push($(checked[i]).closest("li").index());
							$(checked[i]).closest("li").slideToggle(function() {
								$(this).remove();
								handleEmailActionButtonStatus();
							});
						}
						moveSelectedEmail(folderIndex, emailsToMove);
					});
					switchFolder(null, 0); //get inbox
				}
			});
		}
		
		function switchFolder(li, idx){
			if (li != null){
				$("#folderList li").removeClass("active");
				$(li).addClass("active");
			}
			showEmailOverview();
			currentFolder = folderArray[idx].shortpath;
			currentPage = 1;
			loadedPages = [];
			emailArray = [];
			$("#emailList").html("");
			getEmails();
		}
		
		function refreshEmails(){
			loadedPages = [];
			emailArray = [];
			currentPage = 1;
			var postData = { "current_page": currentPage, "per_page": perPage, "folder": currentFolder };
			if (!firstPageLoad){
				$("#loadingPopup").show();
			}
			$.ajax({
				type: "POST",
				url: "<?= BASE_URL ?>" + "webmail/imaplist",
				data: postData,
				dataType: "json",
				success: function(response) {
							loadedPages.push(currentPage);
							var responseEmails = response.emails;
							for (var i = 0; i < responseEmails.length; i++){
								emailArray.push(responseEmails[i]);
							}
							allMessages = response.amount;
							var showFrom = (currentPage - 1) * perPage;
							var showTo = showFrom + perPage;
							
							if (showTo > allMessages){
								showTo = allMessages;
							}
							var emailContent = "";
							for (var i = showFrom; i < showTo; i++){
								var email = emailArray[i];
								var color = "blue";
								var isRead = "unread";
								if (email.seen == 1){
									isRead = "read";
								}
								var prettyDate = moment(email.date).format("Do MMMM, HH:mm");
								var starIcon = "far fa-star";
								if (email.flagged == 1){
									starIcon = "fa fa-star";
								}
								
								var checkbox = '<div class="email-checkbox">' +
														'<label>' +
															'<i class="far fa-square"></i>' +
															'<input type="checkbox" data-checked="email-checkbox">' +
														'</label>' +
													'</div>';
								
								if (currentFolder.indexOf("Junk") != -1 || currentFolder.indexOf("Trash") != -1){
									checkbox = "";
								}
							
								var fromField = email.fromname;
								if (currentFolder.indexOf("Poslano") != -1 || currentFolder.indexOf("Sent") != -1){
									fromField = email.to;
								}
								
								var listItem = '<li class="list-group-item ' + isRead + '">' +
													checkbox +
													'<div class="email-checkbox">' +
														'<i onClick="toggleStarred(this,' + i + ')" class="' + starIcon + ' text-warning"></i>' +
													'</div>' +
													'<div class="email-user m-r-10 bg-' + color + '" onClick="viewEmail(' + i + ')">' +
														'<span class="text-white">' + fromField.substring(0, 1).toUpperCase() + '</span>' +
													'</div>' +
													'<div class="email-info" onClick="viewEmail(' + i + ')">' +
														'<div>' +
															'<span class="email-time">' + prettyDate + '</span>' +
															'<span class="email-sender">' + fromField + '</span>' +
															'<span class="email-title">' + email.subject + '</span>' +
														'</div>' +
													'</div>' +
												'</li>';
								emailContent += listItem
								
							}
							$("#emailList").html(emailContent);
							
							$("#pageCount").html("Page " + currentPage + " of " + Math.ceil(allMessages / perPage));
							if (firstPageLoad){
								App.init();
								firstPageLoad = false;
							}else{
								$("#loadingPopup").hide();
							}
						}
					});
		}
		
		function filterEmails(){
			loadedPages = [];
			emailArray = [];
			currentPage = 1;
			var searchQ = $("#searchEmailsInput").val();
			if (searchQ == ""){
				refreshEmails();
				return;
			}
			var postData = { "query": searchQ, "folder": currentFolder };
					if (!firstPageLoad){
						$("#loadingPopup").show();
					}
					$.ajax({
						type: "POST",
						url: "<?= BASE_URL ?>" + "webmail/imapsearch",
						data: postData,
						dataType: "json",
						success: function(response) {
							var responseEmails = response.emails;
							var emailContent = "";
							for (var i = 0; i < responseEmails.length; i++){
								var email = responseEmails[i];
								var color = "blue";
								var isRead = "unread";
								if (email.seen == 1){
									isRead = "read";
								}
								var prettyDate = moment(email.date).format("Do MMMM, HH:mm");
								var starIcon = "far fa-star";
								if (email.flagged == 1){
									starIcon = "fa fa-star";
								}
								
								var checkbox = '<div class="email-checkbox">' +
														'<label>' +
															'<i class="far fa-square"></i>' +
															'<input type="checkbox" data-checked="email-checkbox">' +
														'</label>' +
													'</div>';
								
								if (currentFolder.indexOf("Junk") != -1 || currentFolder.indexOf("Trash") != -1){
									checkbox = "";
								}
							
								var fromField = email.fromname;
								if (currentFolder.indexOf("Poslano") != -1 || currentFolder.indexOf("Sent") != -1){
									fromField = email.to;
								}
								
								var listItem = '<li class="list-group-item ' + isRead + '">' +
													checkbox +
													'<div class="email-checkbox">' +
														'<i onClick="toggleStarred(this,' + i + ')" class="' + starIcon + ' text-warning"></i>' +
													'</div>' +
													'<div class="email-user m-r-10 bg-' + color + '" onClick="viewEmail(' + i + ')">' +
														'<span class="text-white">' + fromField.substring(0, 1).toUpperCase() + '</span>' +
													'</div>' +
													'<div class="email-info" onClick="viewEmail(' + i + ')">' +
														'<div>' +
															'<span class="email-time">' + prettyDate + '</span>' +
															'<span class="email-sender">' + fromField + '</span>' +
															'<span class="email-title">' + email.subject + '</span>' +
														'</div>' +
													'</div>' +
												'</li>';
								emailContent += listItem
								
							}
							$("#emailList").html(emailContent);
							
							$("#pageCount").html("Page " + currentPage + " of 1");
							$("#loadingPopup").hide();
						}
					});
		}
		
		function getEmails(){
				if (loadedPages.indexOf(currentPage) == -1){ //we haven't loaded this page yet, so load it
					var postData = { "current_page": currentPage, "per_page": perPage, "folder": currentFolder };
					if (!firstPageLoad){
						$("#loadingPopup").show();
					}
					$.ajax({
						type: "POST",
						url: "<?= BASE_URL ?>" + "webmail/imaplist",
						data: postData,
						dataType: "json",
						success: function(response) {
							loadedPages.push(currentPage);
							console.log(response);
							var responseEmails = response.emails;
							for (var i = 0; i < responseEmails.length; i++){
								emailArray.push(responseEmails[i]);
							}
							allMessages = response.amount;
							var showFrom = (currentPage - 1) * perPage;
							var showTo = showFrom + perPage;
							if (showTo > allMessages){
								showTo = allMessages;
							}
							var emailContent = "";
							for (var i = showFrom; i < showTo; i++){
								var email = emailArray[i];
								var color = "blue";
								var isRead = "unread";
								if (email.seen == 1){
									isRead = "read";
								}
								var prettyDate = moment(email.date).format("Do MMMM, HH:mm");
								var starIcon = "far fa-star";
								if (email.flagged == 1){
									starIcon = "fa fa-star";
								}
								
								var checkbox = '<div class="email-checkbox">' +
														'<label>' +
															'<i class="far fa-square"></i>' +
															'<input type="checkbox" data-checked="email-checkbox">' +
														'</label>' +
													'</div>';
								
								if (currentFolder.indexOf("Junk") != -1 || currentFolder.indexOf("Trash") != -1){
									checkbox = "";
								}
							
								var fromField = email.fromname;
								if (currentFolder.indexOf("Poslano") != -1 || currentFolder.indexOf("Sent") != -1){
									fromField = email.to;
								}
								
								var listItem = '<li class="list-group-item ' + isRead + '">' +
													checkbox +
													'<div class="email-checkbox">' +
														'<i onClick="toggleStarred(this,' + i + ')" class="' + starIcon + ' text-warning"></i>' +
													'</div>' +
													'<div class="email-user m-r-10 bg-' + color + '" onClick="viewEmail(' + i + ')">' +
														'<span class="text-white">' + fromField.substring(0, 1).toUpperCase() + '</span>' +
													'</div>' +
													'<div class="email-info" onClick="viewEmail(' + i + ')">' +
														'<div>' +
															'<span class="email-time">' + prettyDate + '</span>' +
															'<span class="email-sender">' + fromField + '</span>' +
															'<span class="email-title">' + email.subject + '</span>' +
														'</div>' +
													'</div>' +
												'</li>';
								emailContent += listItem
								
							}
							$("#emailList").html(emailContent);
							
							
							$("#pageCount").html("Page " + currentPage + " of " + Math.ceil(allMessages / perPage));
							if (firstPageLoad){
								App.init();
								firstPageLoad = false;
							}else{
								$("#loadingPopup").hide();
							}
						}
					});
				}else{
					var showFrom = (currentPage - 1) * perPage;
					var showTo = showFrom + perPage;
					if (showTo > allMessages){
						showTo = allMessages;
					}
					var emailContent = "";
							for (var i = showFrom; i < showTo; i++){
								var email = emailArray[i];
								var color = "blue";
								var isRead = "unread";
								if (email.seen == 1){
									isRead = "read";
								}
								var prettyDate = moment(email.date).format("Do MMMM, HH:mm");
								var starIcon = "far fa-star";
								if (email.flagged == 1){
									starIcon = "fa fa-star";
								}
								
								var checkbox = '<div class="email-checkbox">' +
														'<label>' +
															'<i class="far fa-square"></i>' +
															'<input type="checkbox" data-checked="email-checkbox">' +
														'</label>' +
													'</div>';
								
								if (currentFolder.indexOf("Junk") != -1 || currentFolder.indexOf("Trash") != -1){
									checkbox = "";
								}
							
								var fromField = email.fromname;
								if (currentFolder.indexOf("Poslano") != -1 || currentFolder.indexOf("Sent") != -1){
									fromField = email.to;
								}

								var listItem = '<li class="list-group-item ' + isRead + '">' +
													checkbox +
													'<div class="email-checkbox">' +
														'<i onClick="toggleStarred(this,' + i + ')" class="' + starIcon + ' text-warning"></i>' +
													'</div>' +
													'<div class="email-user m-r-10 bg-' + color + '" onClick="viewEmail(' + i + ')">' +
														'<span class="text-white">' + fromField.substring(0, 1).toUpperCase() + '</span>' +
													'</div>' +
													'<div class="email-info" onClick="viewEmail(' + i + ')">' +
														'<div>' +
															'<span class="email-time">' + prettyDate + '</span>' +
															'<span class="email-sender">' + fromField + '</span>' +
															'<span class="email-title">' + email.subject + '</span>' +
														'</div>' +
													'</div>' +
												'</li>';
								emailContent += listItem
								
							}
							$("#emailList").html(emailContent);
							
							$("#pageCount").html("Page " + currentPage + " of " + Math.ceil(allMessages / perPage));
							if (firstPageLoad){
								App.init();
								firstPageLoad = false;
							}else{
								$("#loadingPopup").hide();
							}
				}
        }
		
		function toggleStarred(item, index){
            var email = emailArray[index];
            
            var isStarred = (email.flagged == 1);
            
            if (isStarred){
				$(item).removeClass("fa fa-star");
                $(item).addClass("far fa-star");
                var postData = { "mail_id": email.mail_id, "starred": 0 };
				$.ajax({
					type: "POST",
					url: "<?= BASE_URL ?>" + "webmail/imapstar",
					data: postData,
					success: function(response) {
						console.log(response);
						
					}
				});
            }else{
				$(item).removeClass("far fa-star");
                $(item).addClass("fa fa-star");
                var postData = { "mail_id": email.mail_id, "starred": 1 };
				$.ajax({
					type: "POST",
					url: "<?= BASE_URL ?>" + "webmail/imapstar",
					data: postData,
					success: function(response) {
						console.log(response);
					}
				});
            }
        }
		
		function goToNextPage() {
			if (currentPage < Math.ceil(allMessages / perPage)){
                currentPage++;
                $("#pageCount").html("Page " + currentPage + " of " + Math.ceil(allMessages / perPage));
                
                getEmails();
			}
        }
        
        function goToPreviousPage(){
			if (currentPage > 1){
				currentPage--;
				$("#pageCount").html("Page " + currentPage + " of " + Math.ceil(allMessages / perPage));
				
				getEmails();
			}
        }
		
		function viewEmail(index) {
			var email = emailArray[index];
			
			var postData = { "mail_id": email.mail_id, "folder": currentFolder };
			$.ajax({
                type: "POST",
                url: "<?= BASE_URL ?>" + "webmail/getmail",
                data: postData,
				dataType: "json",
                success: function(responseMail) {
					currentMail = responseMail;
					var imgURL = "<?= IMG_URL ?>" + "b-io.png";
					email = responseMail;
					var message = email.htmlmsg;
					if (message == "" || message == null) {
						message = email.message;
					}
					if (message == null || message == undefined){
						message = "";
					}
					var fromField = "from " + email.fromname + " (" + email.from + ")";
					if (currentFolder.indexOf("Poslano") != -1 || currentFolder.indexOf("Sent") != -1){
						fromField = "to " + email.to;
					}
					var prettyDate = moment(email.date).format("dddd Do MMMM, HH:mm");
					if (email.seen == 0) {
						markEmailAsRead();
					}
					var emailHeader = '<h3 class="m-t-0 m-b-15 f-w-500">' + email.subject + '</h3>' +
						'<ul class="media-list underline m-b-15 p-b-15">' +
						'<li class="media media-sm clearfix">' +
						'<img src="' + imgURL + '" class="pull-left media-object rounded-corner" />' +
						'<div class="media-body">' +
						'<div class="email-from text-inverse f-s-14 f-w-600 m-b-3">' +
						fromField + 
						'</div>' +
						'<div class="m-b-3"><i class="fa fa-clock fa-fw"></i>&nbsp;' + prettyDate + '</div>' +
						'</div>' +
						'</li>' +
						'</ul>';
					var fileContent = "";
					var files = email.attachments.split(";");
					for (var i = 0; i < files.length; i++) {
						if (files[i] != "") {
							fileContent += '<li class="fa-file">' +
								'<div class="document-file">' +
								'<a href="' + "<?= UPLOADS_URL ?>" + "EmailAttachments/" + files[i] + '" download="' + files[i] + '" ><i class="fa fa-file-image"></i></a>' +
								'</div>' +
								'<div class="document-name"><a href="' + "<?= UPLOADS_URL ?>" + "EmailAttachments/" + files[i] + '" download="' + files[i] + '" >' + files[i] + '</a></div>' +
								'</li>';
						}
					}
					$("#emailBody").html(emailHeader + message);
					$("#attachmentsList").html(fileContent);
					$("#emailOverview").hide();
					$("#emailDetails").show();
				}
			});
		}
        
        function markEmailAsRead(){
            var postData = { "mail_id": currentMail.mail_id, "folder": currentFolder };
            $.ajax({
                type: "POST",
                url: "<?= BASE_URL ?>" + "webmail/imapread",
                data: postData,
                success: function(msg) {
                    if (msg == ""){
                        
                    }else {
                        alert("Error: " + msg);
                    }
                }
            });
        }
		
		function showEmailOverview() {
			$("#emailOverview").show();
			$("#emailDetails").hide();
			$("#emailBody").html("");
		}
		
		function showComposePopup(){
            $("#composePopup").show();
        }
		
		function showReplyPopup(){
            $("#emailPopupDIV, #emailPopupPanel").hide();
			$("#email-to").tagit('createTag', currentMail.from);
			$("#emailSubjectInput").val("Re: " + currentMail.subject);
			$("#composePopup").show();
		}
		
		function showForwardPopup(){
            $("#emailPopupDIV, #emailPopupPanel").hide();
			tinymce.get('emailMessageInput').setContent(currentMail.htmlmsg);
			$("#emailSubjectInput").val("Fw: " + currentMail.subject);
			$("#composePopup").show();
		}
        
        function hideComposePopup(){
            $("#email-to, #email-cc-Cc, #email-cc-Bcc").tagit("removeAll");
            $("#sendEmailForm")[0].reset();
            $("#composePopup").hide();
        }
		
		function deleteEmails(emailsToDelete){
			var toDelete = "";
			for (var i = 0; i < emailsToDelete.length; i++){
				if (toDelete == ""){
					toDelete = emailArray[emailsToDelete[i]].mail_id;
				}else{
					toDelete += "," + emailArray[emailsToDelete[i]].mail_id;
				}
			}
			var postData = { "mail_ids": toDelete, "folder": currentFolder };
			$.ajax({
				type: "POST",
				url: "<?= BASE_URL ?>" + "webmail/imapdelete",
				data: postData,
				success: function(response) {
					if (response == ""){
						swal(
							'Delete completed',
							'E-mails were successfully deleted',
							'success'
						);
					}else{
						swal(
							'Error',
							'There was an unexpected error ' + response,
							'error'
						);
					}
				}
			});
		}
		
		function moveSelectedEmail(folderIndex, emailsToMove){
			var toMove = "";
			for (var i = 0; i < emailsToMove.length; i++){
				if (toMove == ""){
					toMove = emailArray[emailsToMove[i]].mail_id;
				}else{
					toMove += "," + emailArray[emailsToMove[i]].mail_id;
				}
			}

			var moveTo = folderArray[folderIndex].shortpath;
			var postData = { "mail_ids": toMove, "curfolder": currentFolder, "folder": moveTo };
			$.ajax({
				type: "POST",
				url: "<?= BASE_URL ?>" + "webmail/imapmove",
				data: postData,
				success: function(response) {
					if (response == ""){
						
					}else{
						swal(
							'Error',
							'There was an unexpected error ' + response,
							'error'
						);
					}
				}
			});
		}
		
		function deleteEmail(item, index){
			swal({
				title: "Deletion confirmation",
                text: 'Are you sure you want to delete this e-mail?',
                type: 'error',
                showCancelButton: true,
                cancelButtonColor: '#d33',
                cancelButtonText: "Cancel",
                confirmButtonText: 'Delete e-mail'
                }).then(function () {
                    var postData = { "mail_id": currentMail.mail_id, "folder": currentFolder };
					$.ajax({
						type: "POST",
						url: "<?= BASE_URL ?>" + "webmail/imapdelete",
						data: postData,
						success: function(response) {
							if (response == ""){
								swal(
									'Delete completed',
									'E-mail was successfully deleted',
									'success'
								);
								showEmailOverview();
								refreshEmails();
							}else{
								swal(
									'Error',
									'There was an unexpected error ' + response,
									'error'
								);
							}
						}
					});
                });
		}
	</script>
    <!-- <script async defer src="https://apis.google.com/js/api.js" onload="this.onload=function(){};handleClientLoad()" onreadystatechange="if (this.readyState === 'complete') this.onload()"></script> -->
</body>
</html>
