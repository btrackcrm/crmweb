<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
<!--<![endif]-->
<head>
	<meta charset="utf-8" />
	<title>Webmail</title>
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
    
    #loadingSpinnerDIV{
        width: 400px;
        height: 80px;
        position: relative;
        background-color: white;
        margin: 15% auto 0px auto;
    }
    
    #composeEmailDIV{
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
    					<li class="active">
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
		<div id="content" class="content content-full-width inbox">
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
                                    <div class="btn-group">
                                        <button class="btn btn-sm btn-white m-r-5" data-toggle="tooltip" data-placement="bottom" data-title="Refresh" data-original-title="" title="" onClick="refreshEmails()"><i class="fas fa-sync-alt text-success"></i></button>
                                    </div>
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
		<div class="popupContainer" id="loadingPopup" hidden>
            <div id="loadingSpinnerDIV">
                <span class="spinner-loading"></span>
                <p class="loadingLabel">Fetching e-mails...</p>
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
					<form id="newMailboxForm" action="<?= BASE_URL . "webmail/365foldercreate" ?>" method="post" class="form-horizontal">
						<div class="form-group">
							<div class="col-md-12">
								<label>Folder name:</label>
								<input type="text" class="form-control" name="folder_name" required />
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
                    <form id="sendEmailForm" action="<?= BASE_URL . "email/send" ?>" method="post" enctype="multipart/form-data" class="form-horizontal">
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
						<label class="control-label">Attachments:</label>
                        <div class="m-b-15">
							<input type="file" name="uploaded_file">
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
		var emailArray = [];
		var folderArray;
		var firstPageLoad = true;
		var allMessages;
        var currentPage = 1;
        var perPage;
		
		var is_reply = 0;
		var is_forward = 0;
		
		var loadedPages = [];
		
		var currentMail;
		var currentFolder;
		
		$(document).ready(function() {
			perPage = Cookies.get("365_page", 15);
			if (perPage == undefined){
				perPage = 15;
				Cookies.set("365_page", 15, { expires: 365 });
			}
			getFolders();
			getMenuStatistics(loggedEmployee);
			$("#email-to").tagit({
                beforeTagAdded: function(event, ui) {
                    return isEmail(ui.tagLabel);
                }
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
				Cookies.set('365_page', perPage, { expires: 365 });
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
			
			
			
			$('#newMailboxForm').on('submit', function(e) { //use on if jQuery 1.7+
                e.preventDefault();
				var postData = $("#newMailboxForm").serializeArray();
				postData.push({"root_folder_id": currentFolder.parent_id});
                    $.ajax({
                    	type: "POST",
                    	url: "<?= BASE_URL ?>" + "webmail/365foldercreate",
                    	data: postData,
                    	success: function(response) {
							console.log(response);
                        	if (!response.error){
                            		swal(
                                		'Success',
                                		'Folder was successfully created',
                                		'success'
                            		);
                                    getFolders();
                                    hideNewMailboxPopup();
                        	}else {
                            		swal(
                                		'Error!',
                                		'The server encountered the following error: ' + response.message,
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
					var postData = new FormData(this);
					postData.append('recipients', recipients);
					postData.append('cc', cc);
					postData.append('bcc', bcc);
					postData.append('is_reply', is_reply);
					postData.append('is_forward', is_forward);
					if (currentMail != null){
						postData.append('mail_id', currentMail.mail_id);
					}
                    $.ajax({
                    	type: "POST",
                    	url: "<?= BASE_URL ?>" + "email/365send",
						processData: false,
						contentType: false,
						cache: false,
                    	data: postData,
						dataType: "json",
                    	success: function(response) {
							console.log(response);
                        	if (!response.error){
                            		swal(
                                		'Success',
                                		'E-mail was sent successfully',
                                		'success'
                            		);
                                    refreshEmails();
                                    hideComposePopup();
                        	}else {
                            		swal(
                                		'Error!',
                                		'The server encountered the following error: ' + response.message,
                                		'error'
                            		);
                        	}
                    	}
                    });
                }
            });
		});
		
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
		
		function showComposePopup(){
            $("#composePopup").show();
        }
		
		function showReplyPopup(){
			is_reply = 1;
            $("#emailPopupDIV, #emailPopupPanel").hide();
			$("#email-to").tagit('createTag', currentMail.from);
			$("#emailSubjectInput").val("Re: " + currentMail.subject);
			$("#composePopup").show();
		}
		
		function showForwardPopup(){
			is_forward = 0;
            $("#emailPopupDIV, #emailPopupPanel").hide();
			tinymce.get('emailMessageInput').setContent(currentMail.message);
			$("#emailSubjectInput").val("Fw: " + currentMail.subject);
			$("#composePopup").show();
		}
        
        function hideComposePopup(){
			is_reply = 0;
			is_forward = 0;
            $("#email-to, #email-cc-Cc, #email-cc-Bcc").tagit("removeAll");
            $("#sendEmailForm")[0].reset();
            $("#composePopup").hide();
        }
		
		function getFolders(){
			$.ajax({
                type: "POST",
                url: "<?= BASE_URL ?>" + "webmail/365folders",
                data: null,
                dataType: "json",
                success: function(folders) {
					console.log(folders);
					folderArray = folders;
					var moveListContent = "";
					$("#folderList").html("");
					var inboxIdx = null;
					for (var i = 0; i < folders.length; i++){
						var folder = folders[i];
						var actualFolderName = folder.name;
						if (actualFolderName == "Prejeto" || actualFolderName == "Inbox"){
							inboxIdx = i;
						}
						moveListContent += "<li><a href='#'>" + actualFolderName + "</a></li>";
						var folderIcon = '<i class="fas fa-envelope fa-fw m-r-5"></i>';
						if (actualFolderName == "Inbox" || actualFolderName == "Prejeto"){
							folderIcon = '<i class="fa fa-inbox fa-fw m-r-5"></i>';
						}else if (actualFolderName == "Archive" || actualFolderName == "Arhivirano"){
							folderIcon = '<i class="fas fa-archive fa-fw m-r-5"></i>'
						}else if (actualFolderName == "Junk"){
							folderIcon = '<i class="fas fa-eject fa-fw m-r-5"></i>'
						}else if (actualFolderName == "Trash" || actualFolderName == "Izbrisano"){
							folderIcon = '<i class="fa fa-trash fa-fw m-r-5"></i>';
						}else if (actualFolderName == "Drafts" || actualFolderName == "Osnutki"){
							folderIcon = '<i class="fa fa-pencil-alt fa-fw m-r-5"></i>';
						}else if (actualFolderName == "Spam"){
							folderIcon = '<i class="fas fa-bullhorn fa-fw m-r-5"></i>';
						}else if (actualFolderName == "Sent" || "actualFolderName" == "Poslano"){
							folderIcon = '<i class="fas fa-paper-plane fa-fw m-r-5"></i>';
						}
						if (i == inboxIdx){
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
					switchFolder(null, inboxIdx); //get inbox
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
			var moveTo = folderArray[folderIndex];
			var postData = { "mail_ids": toMove, "folder_id": moveTo.id };
			$.ajax({
				type: "POST",
				url: "<?= BASE_URL ?>" + "webmail/365move",
				data: postData,
				success: function(response) {
					console.log(response);
					if (!response.error){
						refreshEmails();
					}else{
						swal(
							'Error',
							'There was an unexpected error ' + response.message,
							'error'
						);
					}
				}
			});
		}
		
		function switchFolder(li, idx){
			if (li != null){
				$("#folderList li").removeClass("active");
				$(li).addClass("active");
			}
			showEmailOverview();
			currentFolder = folderArray[idx];
			allMessages = folderArray[idx].count;
			currentPage = 1;
			loadedPages = [];
			emailArray = [];
			$("#emailList").html("");
			getEmails();
		}
		
		function getEmails(){
				if (loadedPages.indexOf(currentPage) == -1){ //we haven't loaded this page yet, so load it
					var postData = { "current_page": currentPage, "per_page": perPage, "folder_id": currentFolder.id };
					if (!firstPageLoad){
						$("#loadingPopup").show();
					}
					$.ajax({
						type: "POST",
						url: "<?= BASE_URL ?>" + "webmail/365list",
						data: postData,
						dataType: "json",
						success: function(responseEmails) {
							console.log(responseEmails);
							loadedPages.push(currentPage);
							for (var i = 0; i < responseEmails.length; i++){
								emailArray.push(responseEmails[i]);
							}
							var showFrom = (currentPage - 1) * perPage;
							var showTo = showFrom + perPage;
							if (showTo > allMessages){
								showTo = allMessages;
							}
							var emailContent = "";
							for (var i = showFrom; i < showTo; i++){
								var email = emailArray[i];
								if (email == null || email == undefined){
									break;
								}
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
								
								if (currentFolder.name.indexOf("Junk") != -1 || currentFolder.name.indexOf("Trash") != -1){
									checkbox = "";
								}
							
								var fromField = email.fromname;
								if (currentFolder.name == "Poslano" || currentFolder.name == "Sent" || currentFolder.name == "Osnutki" || currentFolder.name == "Drafts"){
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
															'<span class="email-desc">' + email.snippet.substring(0,60) + '...</span>' +
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
								
								if (currentFolder.name.indexOf("Junk") != -1 || currentFolder.name.indexOf("Trash") != -1){
									checkbox = "";
								}
							
								var fromField = email.fromname;
								if (currentFolder.name == "Poslano" || currentFolder.name == "Sent" || currentFolder.name == "Osnutki" || currentFolder.name == "Drafts"){
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
															'<span class="email-desc">' + email.snippet.substring(0,60) + '...</span>' +
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
		
		function refreshEmails(){
			loadedPages = [];
			emailArray = [];
			currentPage = 1;
			var postData = { "current_page": currentPage, "per_page": perPage, "folder_id": currentFolder.id };
			if (!firstPageLoad){
				$("#loadingPopup").show();
			}
			$.ajax({
						type: "POST",
						url: "<?= BASE_URL ?>" + "webmail/365list",
						data: postData,
						dataType: "json",
						success: function(responseEmails) {
							loadedPages.push(currentPage);
							for (var i = 0; i < responseEmails.length; i++){
								emailArray.push(responseEmails[i]);
							}
							var showFrom = (currentPage - 1) * perPage;
							var showTo = showFrom + perPage;
							if (showTo > allMessages){
								showTo = allMessages;
							}
							var emailContent = "";
							for (var i = showFrom; i < showTo; i++){
								var email = emailArray[i];
								if (email == null || email == undefined){
									break;
								}
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
								
								if (currentFolder.name.indexOf("Junk") != -1 || currentFolder.name.indexOf("Trash") != -1){
									checkbox = "";
								}
							
								var fromField = email.fromname;
								if (currentFolder.name == "Poslano" || currentFolder.name == "Sent"){
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
															'<span class="email-desc">' + email.snippet.substring(0,60) + '...</span>' +
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
			var postData = { "query": searchQ, "folder_id": currentFolder.id };
					if (!firstPageLoad){
						$("#loadingPopup").show();
					}
					$.ajax({
						type: "POST",
						url: "<?= BASE_URL ?>" + "webmail/365search",
						data: postData,
						dataType: "json",
						success: function(responseEmails) {
							console.log(responseEmails);
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
								
								if (currentFolder.name.indexOf("Junk") != -1 || currentFolder.name.indexOf("Trash") != -1){
									checkbox = "";
								}
							
								var fromField = email.fromname;
								if (currentFolder.name == "Poslano" || currentFolder.name == "Sent" || currentFolder.name == "Osnutki" || currentFolder.name == "Drafts"){
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
															'<span class="email-desc">' + email.snippet.substring(0,60) + '...</span>' +
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
		
		function toggleStarred(item, index){
            var email = emailArray[index];
            
            var isStarred = (email.flagged == 1);
            
            if (isStarred){
				$(item).removeClass("fa fa-star");
                $(item).addClass("far fa-star");
                var postData = { "mail_id": email.mail_id, "importance": "Normal" };
				$.ajax({
					type: "POST",
					url: "<?= BASE_URL ?>" + "webmail/365star",
					data: postData,
					success: function(response) {
						console.log(response);
						email.flagged = 0;
					}
				});
            }else{
				$(item).removeClass("far fa-star");
                $(item).addClass("fa fa-star");
                var postData = { "mail_id": email.mail_id, "importance": "High" };
				$.ajax({
					type: "POST",
					url: "<?= BASE_URL ?>" + "webmail/365star",
					data: postData,
					success: function(response) {
						console.log(response);
						email.flagged = 1;
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
			var postData = { "mail_id": email.mail_id, "folder_id": currentFolder.id };
            $.ajax({
                type: "POST",
                url: "<?= BASE_URL ?>" + "webmail/365attachments",
                data: postData,
				dataType: "json",
                success: function(attachments) {

					email.attachments = attachments;
					currentMail = email;
					var imgURL = "<?= IMG_URL ?>" + "b-io.png";
					var message = email.message;
					var prettyDate = moment(email.date).format("dddd Do MMMM, HH:mm");
					if (email.seen == 0) {
						markEmailAsRead();
					}

					var fromField = "from " + email.fromname + " (" + email.from + ")";
					if (currentFolder.name == "Poslano" || currentFolder.name == "Sent" || currentFolder.name == "Osnutki" || currentFolder.name == "Drafts"){
						fromField = email.to;
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
					var files = currentMail.attachments;
					for (var i = 0; i < files.length; i++) {
						var curFile = files[i];
						console.log(curFile);
						var attachmentLink = 'data:' + curFile.content_type + ';base64,' + curFile.content_bytes.replace(/-/g, '+').replace(/_/g, '/');
						if (curFile.content_id != "" && curFile.is_inline) {
							var regex = new RegExp('"cid:' + curFile.content_id + '"', "g");
							message = message.replace(regex, attachmentLink);
						} else {
							fileContent += '<li class="fa-file">' +
								'<div class="document-file">' +
								'<a href="' + attachmentLink + '" download="' + curFile.name + '" ><i class="fa fa-file-image"></i></a>' +
								'</div>' +
								'<div class="document-name"><a href="' + attachmentLink + '" download="' + curFile.name + '" >' + curFile.name + '</a></div>' +
								'</li>';
						}
					}
					email.message = message;
					$("#emailBody").html(emailHeader + message);
					$("#attachmentsList").html(fileContent);
					$("#emailOverview").hide();
					$("#emailDetails").show();
				}
			});
		}
		
		function markEmailAsRead(){
            var postData = { "mail_id": currentMail.mail_id };
            $.ajax({
                type: "POST",
                url: "<?= BASE_URL ?>" + "webmail/365read",
                data: postData,
				dataType: "json",
                success: function(response) {
					console.log(response);
					if (!response.error){
						currentMail.seen = 1;
					}
                }
            });
        }
		
		function showEmailOverview() {
			currentMail = null;
			$("#emailOverview").show();
			$("#emailDetails").hide();
			$("#emailBody").html("");
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
			var postData = { "mail_ids": toDelete, "folder_id": currentFolder.id };
			$.ajax({
				type: "POST",
				url: "<?= BASE_URL ?>" + "webmail/365delete",
				data: postData,
				dataType: "json",
				success: function(response) {
					console.log(response);
					if (!response.error){
						swal(
							'Delete completed',
							'E-mails were successfully deleted',
							'success'
						);
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
                    var postData = { "mail_ids": currentMail.mail_id, "folder_id": currentFolder.id };
					$.ajax({
						type: "POST",
						url: "<?= BASE_URL ?>" + "webmail/365delete",
						data: postData,
						dataType: "json",
						success: function(response) {
							console.log(response);
							if (!response.error){
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
		
		function showNewMailboxPopup(){
			$("#newMailboxPopup").show();
		}
		
		function hideNewMailboxPopup(){
			$("#newMailboxPopup").hide();
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
</body>
</html>
