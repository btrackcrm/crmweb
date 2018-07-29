<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
<!--<![endif]-->
<head>
	<meta charset="utf-8" />
	<title>Documents</title>
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
	<link href="<?= ASSETS_URL . "jstree/dist/themes/default/style.min.css" ?>" rel="stylesheet" />
	<link href="<?= ASSETS_URL . "jquery-jvectormap/jquery-jvectormap.css" ?>" rel="stylesheet" />
	<link href="<?= ASSETS_URL . "bootstrap-datepicker/css/bootstrap-datepicker.css" ?>" rel="stylesheet" />
    <link href="<?= ASSETS_URL . "gritter/css/jquery.gritter.css" ?>" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.6.9/sweetalert2.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.6.9/sweetalert2.min.css">
    <link href="<?= ASSETS_URL . "dropzone/min/dropzone.min.css" ?>" rel="stylesheet" />
	<!-- ================== END PAGE LEVEL STYLE ================== -->
	
	<!-- ================== BEGIN BASE JS ================== -->
	<script src="<?= ASSETS_URL . "pace/pace.min.js" ?>" ></script>
	<!-- ================== END BASE JS ================== -->
</head>
<style>
    
    
    #fileTable{
        width: 100% !important;
    }
    
    #loadingSpinnerDIV{
        width: 250px;
        height: 250px;
        position: relative;
        background-color: white;
        margin: 15% auto 0px auto;
    }
    
    .loadingLabel{
        position: absolute;
        text-align: center;
        font-size: 16px;
        bottom: 20px;
        width: 100%;
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
    
    #uploadFileDIV{
        width: 700px;
        height: auto;
        position: relative;
        margin: 10% auto 0px auto;
    }
    
    .activeBG a{
        background: #00acac !important;
		color: white !important;
    }
    
    .tab-content {
        padding: 5px 0px 0px 0px;
        margin-bottom: 20px;
        background: none;
        -webkit-border-radius: 3px;
        -moz-border-radius: 3px;
        border-radius: 3px;
    }
    
    .text-gray{
        color: #878787 !important;
    }
    
    .search-input-gray{
        width: 300px;
        position: relative;
        padding: 0 15px 0 15px;
        height: 36px;
        border: 0;
        border-radius: 2px;
        font: 15px/30px "Helvetica Neue",Arial,Helvetica,sans-serif;
        -webkit-transition: background .3s;
        transition: background .3s;
        -webkit-box-sizing: border-box;
        box-sizing: border-box;
        outline: 0;
        z-index: 1;
        background-color: #eee;
    }
    
    .hover-underline:hover{
        cursor: pointer;
        text-decoration: underline;
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
    					<li class="active">
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
							<h4 class="m-t-10 m-b-5">Documents</h4>
							<div class="m-t-10">
								<button id="gAuthorizeBtn" class="btn btn-white btn-sm" style="display: none;"><i class="fab fa-google text-danger" aria-hidden="true"></i> Sync with Google Drive</button>
								<button id="gSignOutBtn" class="btn btn-white btn-sm" style="display: none;"><i class="fab fa-google text-danger" aria-hidden="true"></i> Stop syncing with Google Drive</button>
							</div>
						</div>
						<!-- END profile-header-info -->
					</div>
					<!-- END profile-header-content -->
					<!-- BEGIN profile-header-tab -->
					<ul class="profile-header-tab nav nav-tabs">
						<li class="nav-item active"><a href="#general-view" class="nav-link" data-toggle="tab">GENERAL</a></li>
						<li class="nav-item"><a href="#drive-view" class="nav-link" data-toggle="tab">GOOGLE DRIVE</a></li>
					</ul>
					<!-- END profile-header-tab -->
				</div>
			</div>
			<!-- end profile -->
            <div class="profile-content">
				<div class="tab-content">
					<div class="tab-pane fade in active" id="general-view">
						<div class="row">
							<div class="col-md-12">
								<div class="pull-left bottom25 width15">
									<label>Display documents from:</label>
									<input type="text" id="dateInput" class="form-control" placeholder="Select date" />
								</div>
								<div class="pull-left bottom25 left25 width15 admin-visible" hidden>
									<label>Display documents for:</label>
									<select id="employeeSelect" class="form-control" >
									</select>
								</div>
								<div style="clear: both;"></div>
								<div class="panel panel-primary">
									<div class="panel-heading">
										<div class="panel-heading-btn">
											<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
											<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
											<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
										</div>
										<h4 class="panel-title">Uploaded documents</h4>
									</div>
									<div class="panel-body">
										<div class="dataTables_wrapper form-inline dt-bootstrap no-footer">
											<table id="fileTable" class="table table-striped">
												<thead>
													<tr>
														<th>Source</th>
														<th>
															Uploaded by
														</th>
														<th>
															File name
														</th>
														<th>
															Reference
														</th>
														<th>
															Uploaded on
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
								<div class="bg-white p-15 m-t-15">
									<h4 class="m-l-15">Uploaded files<button id="treeUploadBtn" class="btn material success hide pull-right" onclick="treeUploadClicked()">Upload a file</button><button id="treeDeleteBtn" class="btn material danger hide pull-right" onclick="treeDeleteClicked()">Delete file</button><button id="treeDownloadBtn" class="btn material primary hide pull-right m-r-15" onclick="treeDownloadClicked()">Download file</button><br><small>Tree view</small></h4>
									<input id="fileSearchInput" class="search-input-gray m-l-15 m-b-15" type="text" placeholder="Search files...">
									<div id="directoryStructureDIV">
							
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="tab-pane fade" id="drive-view">
						<div class="panel panel-inverse">
									<div class="panel-heading">
										<div class="panel-heading-btn">
											<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
											<button onClick="listFolders()" style="margin-left: 8px;" class="btn btn-xs btn-icon btn-circle btn-success"><i class="fa fa-repeat"></i></button>
											<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
											<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
										</div>
										<h4 class="panel-title">Google Drive files</h4>
									</div>
									<div class="panel-body">
										<div id="folderStructureDIV">
							
										</div>
									</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="popupContainer" id="uploadPopup" hidden>
            <div class="panel panel-primary" id="uploadFileDIV" hidden>
                <div class="panel-heading">
                    <div class="panel-heading-btn">
                        <button onclick="hideUploadFilePopup()" class="btn btn-xs btn-icon btn-circle btn-default"><i class="fa fa-times"></i>
                        </button>
                    </div>
                    <h4 class="panel-title">Upload a file</h4>
                </div>
                <div class="panel-body">
                    <form id="uploadFileForm" action="files/upload" method="post" class="form-horizontal dropzone" enctype="multipart/form-data">
                        <input id="uploadDirectoryInput" type="hidden" name="directory" />
                    </form>
                </div>
            </div>
        </div>
        <div class="popupContainer" id="loadingPopup" hidden>
            <div id="loadingSpinnerDIV">
                <span class="spinner"></span>
                <p class="loadingLabel">Syncing with Google Drive...</p>
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
	<script src="<?= ASSETS_URL . "jstree/dist/jstree.min.js" ?>"></script>
	<!-- ================== END BASE JS ================== -->
	
	<!-- ================== BEGIN PAGE LEVEL JS ================== -->
	<script src="<?= JS_URL . "apps.min.js" ?>"></script>
	<script src="<?= JS_URL . "timedisplay.js" ?>"></script>
	<script src="<?= JS_URL . "inactivity.js" ?>"></script>
	
	<script src="<?= ASSETS_URL . "dropzone/min/dropzone.min.js" ?>"></script>
	<link href="<?= ASSETS_URL . "DataTables/media/css/dataTables.bootstrap.min.css" ?>" rel="stylesheet" />
	<link href="<?= ASSETS_URL . "DataTables/extensions/Responsive/css/responsive.bootstrap.min.css" ?>" rel="stylesheet" />
	<script src="<?= ASSETS_URL . "DataTables/media/js/jquery.dataTables.js" ?>"></script>
	<script src="<?= ASSETS_URL . "DataTables/media/js/dataTables.bootstrap.min.js" ?>"></script>
	<script src="<?= ASSETS_URL . "DataTables/extensions/Responsive/js/dataTables.responsive.min.js" ?>"></script>
	<script src="<?= ASSETS_URL . "fullcalendar/lib/moment.min.js" ?>"></script>
	<!-- ================== END PAGE LEVEL JS ================== -->
	

	
	<script>
	    var loggedEmployee = <?php echo json_encode($_SESSION["id"]); ?>;
	    var isAdmin = <?php echo json_encode($_SESSION["admin"]); ?>;
		var dateformat = <?php echo json_encode($_SESSION["dateformat"]); ?>;
		var timeformat = <?php echo json_encode($_SESSION["timeformat"]); ?>;
		var dpFormat;
		
	    var googleSignedIn = false;
	    var firstLoad = true;
	    var firstPageLoad = true;
	    var rootID;
	    var loadedNodes = [];
	    var mimeTypesArray = [
	        { type: "application/vnd.ms-excel", fileType: "excel" },
	        { type: "application/vnd.openxmlformats-officedocument.spreadsheetml.sheet", fileType: "excel" },
	        { type: "application/vnd.ms-powerpoint", fileType: "excel" },
	        { type: "application/vnd.openxmlformats-officedocument.presentationml.presentation", fileType: "powerpoint" },
            { type: 'text/xml', fileType: "code"  },
            { type: 'text/csv', fileType: "excel" },
            { type: 'application/pdf', fileType: "pdf"  },
            { type: 'application/x-httpd-php', fileType: "code"  },
            { type: 'image/jpeg', fileType: "image"  },
            { type: 'image/png', fileType: "image"  },
            { type: 'image/gif', fileType: "image"  },
            { type: 'image/bmp', fileType: "image"  },
            { type: 'text/plain', fileType: "text"  },
            { type: 'application/msword', fileType: "word"  },
            { type: 'application/vnd.openxmlformats-officedocument.wordprocessingml.document', fileType: "word" },
            { type: 'text/js', fileType: "code" },
            { type: 'application/x-shockwave-flash', fileType: "video"  },
            { type: 'audio/mpeg', fileType: "audio"  },
            { type: 'application/zip', fileType: "archive" },
            { type: 'application/tar', fileType: "archive" },
            { type: 'application/rar', fileType: "archive" },
            { type: 'application/arj', fileType: "archive" },
            { type: 'application/cab', fileType: "archive" }
        ];
        // Client ID and API key from the Developer Console
        var CLIENT_ID = '199528804001-7dj1br8mm8le62dhfo2465666ikobfrt.apps.googleusercontent.com';
        var API_KEY = 'AIzaSyA30xyNam0_t-0MIrFtJ9M9ovgq9eB9AgE';
        
        // Array of API discovery doc URLs for APIs used by the quickstart
        var DISCOVERY_DOCS = ["https://www.googleapis.com/discovery/v1/apis/drive/v3/rest"];
        
        // Authorization scopes required by the API; multiple scopes can be
        // included, separated by spaces.
        var SCOPES = 'https://www.googleapis.com/auth/drive';
        
        /**
         *  On load, called to load the auth2 library and API client library.
         */
        function handleClientLoad() {
            gapi.load('client:auth2', initClient);
        }
        
        /**
         *  Initializes the API client library and sets up sign-in state
         *  listeners.
         */
        function initClient() {
            gapi.client.init({
                apiKey: API_KEY,
                clientId: CLIENT_ID,
                discoveryDocs: DISCOVERY_DOCS,
                scope: SCOPES
            }).then(function() {
                // Listen for sign-in state changes.
                gapi.auth2.getAuthInstance().isSignedIn.listen(updateSigninStatus);
        
                // Handle the initial sign-in state.
                updateSigninStatus(gapi.auth2.getAuthInstance().isSignedIn.get());
                $("#gAuthorizeBtn").click(function(e) {
                    handleAuthClick(e);
                });
                $("#gSignOutBtn").click(function(e) {
                    handleSignoutClick(e);
                });
            });
        }
        
        /**
         *  Called when the signed in status changes, to update the UI
         *  appropriately. After a sign-in, the API is called.
         */
        function updateSigninStatus(isSignedIn) {
            googleSignedIn = isSignedIn;
            if (isSignedIn) {
                $("#gAuthorizeBtn").hide();
                $("#gSignOutBtn").show();
                listFolders();
            } else {
                $("#gAuthorizeBtn").show();
                $("#gSignOutBtn").hide();
            }
        }
        
        /**
         *  Sign in the user upon button click.
         */
        function handleAuthClick(event) {
            gapi.auth2.getAuthInstance().signIn();
        }
        
        /**
         *  Sign out the user upon button click.
         */
        function handleSignoutClick(event) {
            gapi.auth2.getAuthInstance().signOut();
			location.reload();
        }
        
        /**
         * Append a pre element to the body containing the given message
         * as its text node. Used to display the results of the API call.
         *
         * @param {string} message Text to be placed in pre element.
         */
        function appendPre(message) {
            console.log(message);
        }
        
        function listFolders() {
            if (!firstPageLoad){
                $("#loadingPopup").show();
            }
            firstLoad = true;
            loadedNodes = [];
            rootID = null;
            try{
                $("#folderStructureDIV").jstree(true).destroy();
            }catch (err){
                
            }
            var rootFolder;
            var request = gapi.client.drive.files.get({
                'fileId': "root"
            }).then(function(response) {
                rootFolder = response.result;
                rootID = rootFolder.id;
                var folderStructure = [];
                folderStructure.push({
                    "id": rootID,
                    "text": rootFolder.name,
                    "fileid": rootID,
                    "url": "/",
                    "state": {
                            "selected": true
                    },
                    "children": []
                })
                gapi.client.drive.files.list({
                    'q': "trashed = false and '" + rootID + "' in parents",
                    'fields': "nextPageToken, files"
                }).then(function(response) {
                    var files = response.result.files;
                    var rootChildren = [];
                    if (files && files.length > 0) {
                        for (var i = 0; i < files.length; i++) {
                            var file = files[i];
                            if (file.mimeType == "application/vnd.google-apps.folder" && file.parents != null && file.parents.indexOf(rootID) != -1) { //folders directly under root folder
                                rootChildren.push({
                                    "id": file.id,
                                    "text": file.name,
                                    "fileid": file.id,
                                    "url": "/"
                                });
                            } else {
                                
                                var downloadLink = file.webContentLink;
                                if (downloadLink == null){
                                    downloadLink = file.webViewLink;
                                }
                                rootChildren.push({
                                    "id": file.id,
                                    "icon": file.iconLink,
                                    "text": file.name,
                                    "fileid": file.id,
                                    "url": downloadLink,
                                    "type": "file"
                                })
                            }
                        }
                        folderStructure[0].children = rootChildren;
                    } else {
                        appendPre('No folders found.');
                    }
                    $("#folderStructureDIV").on('rename_node.jstree', function (e, data) {
                        var file_id = data.node.original.fileid;
                        var body = {'name': data.text};
                        gapi.client.drive.files.update({
                            'fileId': file_id,
                            'resource': body
                        }).then(function(response) {
                            console.log(response);
                        });
                    }).on('open_node.jstree', function (event, data) {
                        console.log(data);
                        if (data.node.type == "default"){
                            data.instance.set_type(data.node,'folder-open');
                        }
                    }).on('close_node.jstree', function (event, data) {
                        if (data.node.type == "folder-open"){
                            data.instance.set_type(data.node,'default');
                        }
                    }).on("delete_node.jstree", function (e, data) {
                        console.log("Deleting node");
                        var file_id = data.node.original.fileid;
                        gapi.client.drive.files.delete({
                            'fileId': file_id
                        }).then(function(response) {
                            console.log(response);
                        });
                    }).on('select_node.jstree', function(e, data) {
                            if (firstLoad){
                                firstLoad = false;
                                return;
                            }
                            for (var i = 0; i < data.selected.length; i++) {
                                var node = data.instance.get_node(data.selected[i]);
                                if (node.type != "file" && node.id != rootID && loadedNodes.indexOf(node.id) == -1){ //if not root folder, load folder contents from Drive
                                    loadedNodes.push(node.id);
                                    gapi.client.drive.files.list({
                                        'q': "'" + node.id + "' in parents",
                                        'fields': "nextPageToken, files"
                                    }).then(function(response) {
                                        var files = response.result.files;
                                        var rootChildren = [];
                                        if (files && files.length > 0) {
                                            for (var i = 0; i < files.length; i++) {
                                                var file = files[i];
                                                if (file.mimeType == "application/vnd.google-apps.folder") { //folders directly under root folder
                                                    $('#folderStructureDIV').jstree().create_node(node.id, {
                                                      "id": file.id,
                                                      "text": file.name,
                                                      "fileid": file.id,
                                                      "url": "/"
                                                    }, "last", function() {
                                                      console.log("Child created");
                                                    });
                                                } else{
                                                    var downloadLink = file.webContentLink;
                                                    if (downloadLink == null){
                                                        downloadLink = file.webViewLink;
                                                    }
                                                    $('#folderStructureDIV').jstree().create_node(node.id, {
                                                      "id": file.id,
                                                      "icon": file.iconLink,
                                                      "text": file.name,
                                                      "fileid": file.id,
                                                      "url": downloadLink,
                                                      "type": "file",
                                                    }, "last", function() {
                                                      console.log("Child created");
                                                    });
                                                    
                                                }
                                            }
                                            
                                            $('#folderStructureDIV').jstree(true).open_node(node);
                                            $('#folderStructureDIV').jstree(true).redraw();
                                           
                                            
                                        }
                                        
                                    });
                                }
                            }
                        }).jstree({
                        "core": {
                            "themes": {
                                "responsive": true,
                                "variant" : "large"
                            },
                            "check_callback": true,
                            'data': folderStructure
                        },
                        "types": {
                            "default": {
                                "icon": "fa fa-folder text-warning fa-2x"
                            },
                            "folder-open": {
                                "icon": "fa fa-folder-open text-warning fa-2x"  
                            },
                            "file": {
                                "icon": "fas fa-file text-gray fa-2x"
                            },
                            "excel": {
                                "icon": "fas fa-file-excel text-success fa-2x"
                            },
                            "code": {
                                "icon": "fas fa-file-code text-gray fa-2x"
                            },
                            "pdf": {
                                "icon": "fas fa-file-pdf text-danger fa-2x"
                            },
                            "image": {
                                "icon": "fas fa-file-image text-purple fa-2x"
                            },
                            "text": {
                                "icon": "fas fa-file-text text-gray fa-2x"
                            },
                            "word": {
                                "icon": "fas fa-file-word text-primary fa-2x"
                            },
                            "powerpoint": {
                                "icon": "fas fa fa-file-powerpoint text-warning fa-2x"  
                            },
                            "video": {
                                "icon": "fas fa-file-video text-gray fa-2x"
                            },
                            "audio": {
                                "icon": "fas fa-file-audio text-gray fa-2x"
                            },
                            "archive": {
                                "icon": "fas fa-file-archive text-gray fa-2x"
                            }
                        },
                        "contextmenu":{         
                            "items": function(node) {
                                var tree = $("#folderStructureDIV").jstree(true);
                                return {
                                    "Download/View file": {
                                        "separator_before": false,
                                        "separator_after": false,
                                        "label": "Download/View file",
                                        "action": function (obj) { 
                                            if (node.type == "file"){
                                                window.open(node.original.url);
                                            }
                                        }
                                    },
                                    "Rename file": {
                                        "separator_before": false,
                                        "separator_after": false,
                                        "label": "Rename file",
                                        "action": function (obj) {
                                            tree.edit(node);
                                        }
                                    },                         
                                    "Remove file": {
                                        "separator_before": false,
                                        "separator_after": false,
                                        "label": "Remove file",
                                        "action": function (obj) { 
                                            tree.delete_node(node);
                                        }
                                    }
                                };
                            }
                        },
                        "plugins": ["contextmenu", "state", "types", "state", "dnd"]
                    });
                    setTimeout(function(){
                        $("#loadingPopup").hide();
                    }, 500);
                });
                
            });
        
        }
        
        /**
         * Print files.
         */
        function listFiles() {
            gapi.client.drive.files.list({
                'orderBy': "folder",
                'fields': "nextPageToken, files"
            }).then(function(response) {
                var files = response.result.files;
                if (files && files.length > 0) {
                    for (var i = 0; i < files.length; i++) {
                        var file = files[i];
                        appendPre(file.name + ' (' + file.id + ')');
                    }
                } else {
                    appendPre('No files found.');
                }
            });
        }
        
        var dTable;
        var loggedEmployee = <?php echo json_encode($_SESSION["id"]); ?>;
		
        $(document).ready(function() {
            
			dpFormat = dateformat.replace("YYYY", "YY");
			dpFormat = dpFormat.toLowerCase();
			
            getEmployees();
            getMenuStatistics(loggedEmployee);
			
            $("#dateInput").datepicker({
                dateFormat: dpFormat
            });
			
            $("#dateInput").datepicker('setDate', new Date());
            if (isAdmin == 1){
                $(".admin-visible").show();
            }
            getUploadDates(loggedEmployee);
            getEmployeeFiles(loggedEmployee, moment($("#dateInput").val(), dateformat).format("YYYY-MM-DD"));
        
            $("#employeeSelect, #dateInput").change(function(e) {
                var selectedVal = $("#employeeSelect option:selected").val();
                var selectedDate = $("#dateInput").val();
				getUploadDates(selectedVal);
                if (selectedVal != "" && selectedDate != "") {
                    getEmployeeFiles(selectedVal, moment(selectedDate, dateformat).format("YYYY-MM-DD"));
                }
            });
            
            $("#fileSearchInput").keyup(function() {
                var searchString = $(this).val();
                $('#directoryStructureDIV').jstree(true).search(searchString);
            });
            
            Dropzone.options.uploadFileForm = {
			  dictDefaultMessage: "<i class='fa fa-cloud text-primary'></i>&nbsp;Drag and drop files here to upload",
              init: function () {
                this.on("success", function(file, response) {
                    if (response == ""){
                        swal(
                            'File uploaded',
                            'File upload was successful.',
                            'success'
                        );
                    }else{
                        swal(
                            'Error!',
                            'The server encountered the following error while uploading the file: ' + response,
                            'error'
                        );
                    }
                });
                this.on("complete", function (file) {
                  if (this.getUploadingFiles().length === 0 && this.getQueuedFiles().length === 0) {
                    getEmployeeFiles(loggedEmployee, moment($("#dateInput").val(), dateformat).format("YYYY-MM-DD"));
                  }
                });
                this.on('error', function(file, response) {
                    swal(
                        'Error!',
                        'The server encountered the following error while uploading the file: ' + response,
                        'error'
                    );
                });
              }
            };
            
            $('#uploadFileForm').on('submit', function(e) { //use on if jQuery 1.7+
			    e.preventDefault();
                var formData = new FormData();
                formData.append('file', $('#fileToUpload')[0].files[0]);
                formData.append('directory', $("#uploadDirectoryInput").val());
                $("#uploadFileBtn").html('<i class="fa fa-spinner fa-pulse"></i>&nbsp;Uploading file...');
                $.ajax({
                       url : 'files/upload',
                       type : 'POST',
                       data : formData,
                       processData: false,  // tell jQuery not to process the data
                       contentType: false,  // tell jQuery not to set contentType
                       success : function(response) {
                           if (response == ""){ //Everything okay
                               swal(
                                    'Upload successful',
                                    'Your file was successfully uploaded.',
                                    'success'
                                );
                                getEmployeeFiles(loggedEmployee, moment($("#dateInput").val(), dateformat).format("YYYY-MM-DD"));
                                
                                hideUploadFilePopup();
                                $("#uploadFileBtn").html('Upload file');
                           }else{
                               swal(
                                    'Upload error',
                                    'The upload ran into the following error : ' + response,
                                    'error'
                                );
                                $("#uploadFileBtn").html('Upload file');
                           }
                       }
                });
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
        
        function getUploadDates(employee_id) {
            var postData = {
                "employee_id": employee_id
            };
            $.ajax({
                type: "POST",
                url: "<?= BASE_URL ?>" + "files/getDates",
                data: postData,
                dataType: "json",
                success: function(dates) {
                    var uploadDays = [];
                    for (var i = 0; i < dates.length; i++) {
                        uploadDays.push(dates[i].datetime);
                    }
                    $("#dateInput").datepicker("destroy");
                    $("#dateInput").datepicker({
                        dateFormat: dpFormat,
                        beforeShowDay: function(date) {
                            var m = ('0' + (date.getMonth() + 1)).slice(-2),
                                d = ('0' + date.getDate()).slice(-2),
                                y = date.getFullYear();
                            for (i = 0; i < uploadDays.length; i++) {
        
                                if ($.inArray(y + '-' + m + '-' + d, uploadDays) != -1) {
                                    //return [false];
                                    return [true, 'activeBG', ''];
                                }
                            }
                            return [true];
                        }
                    });
        
                }
            });
        }
        
        function getFiles() {
            var uploadURL = "<?= DIR_URL ?>";
            $.ajax({
                type: "POST",
                url: "<?= BASE_URL ?>" + "files/get",
                data: null,
                dataType: "json",
                success: function(response) {
                    var files = response.files;
                    var directories = response.listdir;
                    if (dTable != null) {
                        dTable.destroy();
                    }
                    dTable = $('#fileTable').DataTable({
                        "aaData": files,
                        "columns": [
							{
								"data": "upload_source"
							},
							{
                                "data": "employee_id"
                            },
                            {
                                "data": "filename"
                            },
							{ 
								"defaultContent": ''
							},
                            {
                                "data": "datetime"
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
                                "render": function(data, type, row) {
                                    if (data == 0){
										return "<label class='label label-primary'>Web</label>";
									}
									return "<label class='label label-success'>App</label>";
                                },
                                "targets": 0
                            },
							{
                                // The `data` parameter refers to the data for the cell (defined by the
                                // `data` option, which defaults to the column being worked with, in
                                // this case `data: 0`.
                                "render": function(data, type, row) {
                                    return "<a class='text-primary hover-underline' href='employeepage?employee_id=" + data + "' target='_blank'>"  + row.employee_name + " " + row.employee_surname + "</a>";
                                },
                                "targets": 1
                            },
                            {
                                // The `data` parameter refers to the data for the cell (defined by the
                                // `data` option, which defaults to the column being worked with, in
                                // this case `data: 0`.
                                "render": function(data, type, row) {
                                    var actualURL = uploadURL + encodeURI(row.filepath);
                                    return '<a target="_blank" href="' + actualURL + '" class="text-primary pull-left hover-underline">' + data + '</a>';
                                },
                                "targets": 2
                            },
							{
                                // The `data` parameter refers to the data for the cell (defined by the
                                // `data` option, which defaults to the column being worked with, in
                                // this case `data: 0`.
                                "render": function(data, type, row) {
                                    if (row.event_id != null){
										return "<a target='_blank' href='eventdetails?event_id=" + row.event_id + "'>View event" + "</a>";
									} else if (row.wgtask_id != null){
										return "<a target='_blank' href='taskdetails?task_id=" + row.wgtask_id + "'>View task" + "</a>";
									} else if(row.ticket_id != null){
										return "<a target='_blank' href='ticketdetails?ticket_id=" + row.ticket_id + "'>View ticket" + "</a>";
									} else if(row.workorder_id != null){
										return "<a target='_blank' href='workorderdetails?workorder_id=" + row.workorder_id + "'>View work order" + "</a>";
									} else{
										return "No references";
									}
                                },
                                "targets": 3
                            },
							{
                                // The `data` parameter refers to the data for the cell (defined by the
                                // `data` option, which defaults to the column being worked with, in
                                // this case `data: 0`.
                                "render": function(data, type, row) {
									if (type === 'display' || type === 'filter'){
										return moment(data).format(dateformat + ", " + timeformat);
									}else{
										return data;
									}
                                },
                                "targets": 4
                            },
                            {
                                "render": function(data, type, row) {
                                    var actualURL = uploadURL + encodeURI(row.filepath);
                                    return '<a download href="' + actualURL + '" class="text-primary pull-left pointer" data-toggle="tooltip" title="Download file"><i class="fa fa-download"></i></a>';
                                },
                                "targets": 6,
                                "orderable": false
                            }
                        ],
			"order": [[ 2, "desc" ]],
                        responsive: true,
                        dom: 'lfrtip'
                    });
                    
                    drawFileTree(directories);
                    
                    if (firstPageLoad){
                        App.init();
                        firstPageLoad = false;
                    }
                }
            });
        }
        
        function drawFileTree(directories){
            try{
                        $("#directoryStructureDIV").jstree(true).destroy();
                    }catch (err){
                    }
                    $("#directoryStructureDIV").on('open_node.jstree', function (event, data) {
                        if (data.node.type == "default"){
                            data.instance.set_type(data.node,'folder-open');
                        }
                    }).on('close_node.jstree', function (event, data) {
                        if (data.node.type == "folder-open"){
                            data.instance.set_type(data.node,'default');
                        }
                    }).on("select_node.jstree",
                         function(evt, data){
                              var nodeType = data.node.type;
                              if (nodeType == "default" || nodeType == "folder-open"){
                                  $("#treeDownloadBtn").addClass("hide");
                                  $("#treeUploadBtn").removeClass("hide");
                                  $("#treeDeleteBtn").addClass("hide");
                              }else{
                                  $("#treeDownloadBtn").removeClass("hide");
                                  $("#treeUploadBtn").addClass("hide");
                                  $("#treeDeleteBtn").removeClass("hide");
                              }
                     }).on('rename_node.jstree', function (e, data) {
                        var parentNode = $('#directoryStructureDIV').jstree(true).get_node(data.node.parent);
                        var newFileName = data.text;
                        var oldFileURL = data.node.original.dirurl;
                        if (oldFileURL == null){ //only happens when we're creating a new directory.
                            var parentDirectory = parentNode.original.dirurl;
                            createDirectory(parentDirectory + "/" + newFileName);
                        }else{
                            if (data.node.type != "default" && data.node.type != "folder-open"){
                                renameFile(oldFileURL, newFileName);
                            }else{
                                renameDirectory(oldFileURL, newFileName);
                            }
                        }
                    }).on("delete_node.jstree", function (e, data) {
                        var fileURL = data.node.original.dirurl;
                        deleteFile(fileURL);
                    }).on("move_node.jstree", function(e, data) {
                        var parentNode = $('#directoryStructureDIV').jstree(true).get_node(data.node.parent);
                        var parentDirectory = parentNode.original.dirurl;
                        var oldDirectory = data.node.original.dirurl;
                        if (data.old_parent != data.parent){
                            data.node.original.dirurl = "Uploads/" + $("#directoryStructureDIV").jstree(true).get_path(data.node,"/"); //replace with new file path.
                            moveFile(oldDirectory, parentDirectory);
                        }
                    }).jstree({
                        "core": {
                            "themes": {
                                "responsive": true,
                                "variant" : "large"
                            },
                            "check_callback" : function(operation, node, node_parent, node_position, more) {
                                if (operation == 'move_node') {
                                    if (node_parent.type == 'default' || node_parent.type == 'folder-open') {
                                        return true
                                    } else
                                        return false;
                                }
                            },
                            'data': directories
                        },
                        "dnd" : {
                            "is_draggable" : function(node) {
                                var type = node[0].type;
                                if (type != 'default' && type != "folder-open") {
                                    return true;
                                }
                                return false;
                            }
                        },
                        "types": {
                            "default": {
                                "icon": "fa fa-folder text-warning fa-2x"
                            },
                            "folder-open": {
                                "icon": "fa fa-folder-open text-warning fa-2x"  
                            },
                            "file": {
                                "icon": "fas fa-file text-gray fa-2x"
                            },
                            "excel": {
                                "icon": "fas fa-file-excel text-success fa-2x"
                            },
                            "code": {
                                "icon": "fas fa-file-code text-gray fa-2x"
                            },
                            "pdf": {
                                "icon": "fas fa-file-pdf text-danger fa-2x"
                            },
                            "image": {
                                "icon": "fas fa-file-image text-purple fa-2x"
                            },
                            "text": {
                                "icon": "fas fa-file-text text-gray fa-2x"
                            },
                            "word": {
                                "icon": "fas fa-file-word text-primary fa-2x"
                            },
                            "powerpoint": {
                                "icon": "fas fa fa-file-powerpoint text-warning fa-2x"  
                            },
                            "video": {
                                "icon": "fas fa-file-video text-gray fa-2x"
                            },
                            "audio": {
                                "icon": "fas fa-file-audio text-gray fa-2x"
                            },
                            "archive": {
                                "icon": "fas fa-file-archive text-gray fa-2x"
                            }
                        },
                        "contextmenu":{         
                            "items": function(node) {
                                var nodeType = node.type;
                                if (nodeType != "default" && nodeType != "folder-open"){
                                    var tree = $("#directoryStructureDIV").jstree(true);
                                        return {
                                            "Download/View file": {
                                                "separator_before": false,
                                                "separator_after": false,
                                                "label": "Download/View file",
                                                "icon": "fa fa-download text-primary",
                                                "action": function (obj) { 
                                                    window.open("<?= DIR_URL ?>" + node.original.dirurl);
                                                }
                                            },
                                            "Rename file": {
                                                "separator_before": false,
                                                "separator_after": false,
                                                "label": "Rename file",
                                                "icon": "fas fa-pencil-alt text-success",
                                                "action": function (obj) {
                                                    tree.edit(node);
                                                }
                                            },                         
                                            "Remove file": {
                                                "separator_before": false,
                                                "separator_after": false,
                                                "label": "Remove file",
                                                "icon": "fa fa-trash text-danger",
                                                "action": function (obj) { 
                                                    swal({
                                                      title: 'Confirm action',
                                                      text: "Are you sure you want to remove this file?",
                                                      type: 'error',
                                                      showCancelButton: true,
                                                      confirmButtonColor: '#3085d6',
                                                      cancelButtonColor: '#d33',
                                                      confirmButtonText: 'Yes, remove'
                                                    }).then(function () {
                                                        tree.delete_node(node);
                                                        
                                                    });
                                                }
                                            }
                                        };
                                }else{
                                    var tree = $("#directoryStructureDIV").jstree(true);
                                        return {
                                            "Upload a file": {
                                                "separator_before": false,
                                                "separator_after": false,
                                                "label": "Upload a file",
                                                "icon": "fa fa-upload text-primary",
                                                "action": function (obj) { 
                                                    showUploadFilePopup(node.original.dirurl);
                                                }
                                            }                        
                                        };
                                }
                            }
                        },
                        "plugins": ["contextmenu", "types", "search", "dnd", "state"]
                    });
        }
        
        function treeDownloadClicked(){
            var selectedNode = $("#directoryStructureDIV").jstree("get_selected",true);
            window.open("<?= DIR_URL ?>" + selectedNode[0].original.dirurl);
        }
        
        function treeUploadClicked(){
            var selectedNode = $("#directoryStructureDIV").jstree("get_selected",true);
            showUploadFilePopup(selectedNode[0].original.dirurl);
        }
        
        function treeDeleteClicked(){
            var selectedNode = $("#directoryStructureDIV").jstree("get_selected", true);
            swal({
                title: 'Confirm action',
                text: "Are you sure you want to remove this file?",
                type: 'error',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, remove'
            }).then(function() {
                $("#directoryStructureDIV").jstree("delete_node", selectedNode);
            });
        }
        
        function deleteFile(fileURL){
                var postData = { "file_location": fileURL };
                $.ajax({
                    type: "POST",
                    url: "workgroup/deleteFile",
                    data: postData,
                    success: function(response) {
                        if (response == ""){
                            swal(
                                'Success!',
                                'File was successfully removed.',
                                'success'
                            );
							$("#treeDownloadBtn").removeClass("hide");
                            $("#treeUploadBtn").addClass("hide");
                            $("#treeDeleteBtn").removeClass("hide");
                        }else{
                            swal(
                                'Error',
                                'The server encountered the following error: ' + response,
                                'error'
                            );
                        }
                    }
                });
        }
        
        function showUploadFilePopup(directory){
		    $("#uploadDirectoryInput").val(directory);
		    $("#uploadPopup, #uploadFileDIV").show();
		}
		
		function hideUploadFilePopup(){
		    $("#uploadFileForm")[0].reset();
		    $("#uploadPopup, #uploadFileDIV").hide();
		}
        
        function renameFile(oldFileName, newFileName){
            var postData = { "file_location": oldFileName, "new_name": newFileName };
                $.ajax({
                    type: "POST",
                    url: "workgroup/renameFile",
                    data: postData,
                    success: function(response) {
                        if (response != ""){
                            swal(
                                    'Error',
                                    'The server encountered the following error: ' + response,
                                    'error'
                                );
                        }
			
                        getEmployeeFiles(loggedEmployee, moment($("#dateInput").val(), dateformat).format("YYYY-MM-DD"));
                        

                    }
                });
        }
        
        function renameDirectory(oldFileName, newFileName){
            var postData = { "file_location": oldFileName, "new_name": newFileName };
                $.ajax({
                    type: "POST",
                    url: "workgroup/renameFile",
                    data: postData,
                    success: function(response) {
                        if (response != ""){
                            swal(
                                'Error',
                                'The server encountered the following error: ' + response,
                                'error'
                            );
                            
                        }
                        getEmployeeFiles(loggedEmployee, moment($("#dateInput").val(), dateformat).format("YYYY-MM-DD"));
                        
                    }
                });
        }
        
        function moveFile(oldDirectory, newDirectory){
            var postData = { "old_location": oldDirectory, "new_location": newDirectory };
            $.ajax({
                type: "POST",
                url: "workgroup/moveFile",
                data: postData,
                success: function(response) {
                    if (response != ""){
                        swal(
                            'Error',
                            'The server encountered the following error: ' + response,
                            'error'
                        );
                    }
                }
            });
        }
        
        function createDirectory(directoryURL){
            var postData = { "dirname": directoryURL};
            console.log(postData);
                $.ajax({
                    type: "POST",
                    url: "workgroup/createDir",
                    data: postData,
                    success: function(response) {
                        if (response != ""){
                            swal(
                                'Error',
                                'The server encountered the following error: ' + response,
                                'error'
                            );
                            
                        }
                        getEmployeeFiles(loggedEmployee, moment($("#dateInput").val(), dateformat).format("YYYY-MM-DD"));
                        
                    }
                });
        }
        
        
        
        function getEmployeeFiles(employee_id, datetime) {
            var uploadURL = "<?= DIR_URL ?>";
            var postData = {
                "employee_id": employee_id,
                "datetime": datetime
            };
			console.log(postData);
            $.ajax({
                type: "POST",
                url: "<?= BASE_URL ?>" + "files/getForEmployee",
                data: postData,
                dataType: "json",
                success: function(response) {
					console.log(response);
                    var files = response.files;
                    var directories = response.listdir;
                    if (dTable != null) {
                        dTable.destroy();
                    }
                    dTable = $('#fileTable').DataTable({
                        "aaData": files,
                        "columns": [
							{
								"data": "upload_source"
							},
							{
                                "data": "employee_id"
                            },
                            {
                                "data": "filename"
                            },
							{
                                "defaultContent": ''
                            },
                            {
                                "data": "datetime"
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
                                "render": function(data, type, row) {
                                    if (data == 0){
										return "<label class='label label-primary'>Web</label>";
									}
									return "<label class='label label-success'>App</label>";
                                },
                                "targets": 0
                            },
							{
                                // The `data` parameter refers to the data for the cell (defined by the
                                // `data` option, which defaults to the column being worked with, in
                                // this case `data: 0`.
                                "render": function(data, type, row) {
                                    return "<a class='text-primary hover-underline' href='employeepage?employee_id=" + data + "' target='_blank'>"  + row.employee_name + " " + row.employee_surname + "</a>";
                                },
                                "targets": 1
                            },
                            {
                                // The `data` parameter refers to the data for the cell (defined by the
                                // `data` option, which defaults to the column being worked with, in
                                // this case `data: 0`.
                                "render": function(data, type, row) {
                                    var actualURL = uploadURL + encodeURI(row.filepath);
                                    return '<a target="_blank" href="' + actualURL + '" class="text-primary pull-left hover-underline">' + data + '</a>';
                                },
                                "targets": 2
                            },
							{
                                // The `data` parameter refers to the data for the cell (defined by the
                                // `data` option, which defaults to the column being worked with, in
                                // this case `data: 0`.
                                "render": function(data, type, row) {
                                    if (row.event_id != null){
										return "<a target='_blank' href='eventdetails?event_id=" + row.event_id + "'>View event" + "</a>";
									} else if (row.wgtask_id != null){
										return "<a target='_blank' href='taskdetails?task_id=" + row.wgtask_id + "'>View task" + "</a>";
									} else if(row.ticket_id != null){
										return "<a target='_blank' href='ticketdetails?ticket_id=" + row.ticket_id + "'>View ticket" + "</a>";
									} else if(row.workorder_id != null){
										return "<a target='_blank' href='workorderdetails?workorder_id=" + row.workorder_id + "'>View work order" + "</a>";
									} else{
										return "No references";
									}
                                },
                                "targets": 3
                            },
							{
                                // The `data` parameter refers to the data for the cell (defined by the
                                // `data` option, which defaults to the column being worked with, in
                                // this case `data: 0`.
                                "render": function(data, type, row) {
									if (type === 'display' || type === 'filter'){
										return moment(data).format(dateformat + ", " + timeformat);
									}else{
										return data;
									}
                                },
                                "targets": 4
                            },
                            {
                                "render": function(data, type, row) {
                                    var actualURL = uploadURL + encodeURI(row.filepath);
                                    return '<a download href="' + actualURL + '" class="text-primary pull-left pointer" data-toggle="tooltip" title="Download file"><i class="fa fa-download"></i></a>';
                                },
                                "targets": 5,
                                "orderable": false
                            }
                        ],
                        responsive: true,
                        dom: 'lfrtip'
                    });
                    drawFileTree(directories);
                    if (firstPageLoad){
                        App.init();
                        firstPageLoad = false;
                    }
        
                }
            });
        }
        
        function getEmployees() {
            $.ajax({
                type: "POST",
                url: "employees/list",
                data: null,
                dataType: "json",
                success: function(employees) {
                    $("#employeeSelect").html("");
                    
                    for (var i = 0; i < employees.length; i++) {
                        $('#employeeSelect').append($('<option>', {
                            value: employees[i].employee_id,
                            text: employees[i].employee_surname + " " + employees[i].employee_name
                        }));
                    }
                    if (isAdmin != 1){
                        $("#employeeSelect").val(loggedEmployee);
                    }
                }
            });
        }
        		
		
	</script>
	<script async defer src="https://apis.google.com/js/api.js" onload="this.onload=function(){};handleClientLoad()" onreadystatechange="if (this.readyState === 'complete') this.onload()"></script>
</body>
</html>
