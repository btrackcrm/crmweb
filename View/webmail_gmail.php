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
		            <div class="wrapper bg-silver-lighter text-center">
						<button class="btn btn-white btn-block btn-sm" onClick="showComposePopup()">
							<i class="fas fa-paper-plane text-success m-r-5"></i>Compose
						</button>
					</div>
                    <div class="wrapper bg-silver p-0 b-t-gray">
						<div class="nav-title"><b>FOLDERS</b></div>
							<ul class="nav nav-inbox" id="folderList">

							</ul>
					</div>
                </div>
		        <!-- begin vertical-box-column -->
		        <div class="vertical-box-column d-none d-lg-table-cell bg-white b-l-gray">
		            <!-- begin list-email -->
		            <div id="emailOverview" class="tab-content">
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
                                    <!-- end btn-group -->
									
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
									
                                    <!-- begin btn-group -->
									<div class="input-group width-sm">
									  <input id="searchEmailsInput" type="text" class="form-control input-sm pull-left" placeholder="Search query..." >
									  <span class="input-group-btn">
										<button class="btn btn-white btn-sm" type="button" onClick="searchMessages()"><i class="fa fa-search"></i></button>
									  </span>
									</div><!-- /input-group -->
                                    <!-- end btn-group -->
                                    <!-- begin btn-group -->
                                    <div class="btn-group">
                                        <button class="btn btn-sm btn-white" data-toggle="tooltip" data-placement="bottom" data-title="Refresh" data-original-title="" title="" onClick="refreshMessages()"><i class="ion-refresh" ></i></button>
                                    </div>
									<button id="gAuthorizeBtn" class="btn btn-white btn-sm" style="display: none"><i class="fab fa-google m-r-5 text-danger" aria-hidden="true"></i>Sync with Gmail</button>
                                    <button id="gSignOutBtn" class="btn btn-white btn-sm" style="display: none"><i class="fab fa-google m-r-5 text-danger" aria-hidden="true"></i>Disconnect account</button>
                                    <!-- end btn-group -->
                                    <!-- begin btn-group -->
                                    <div class="btn-group">
                                        <button class="btn btn-sm btn-danger hide" data-email-action="delete"><i class="ion-trash-b m-r-3"></i> <span class="hidden-xs">Delete</span></button>
                                    </div>
                                    <!-- end btn-group -->
                                </div>
                                <!-- end btn-toolbar -->
                            </div>
        		            <!-- end wrapper -->
        		            <div class="tab-pane fade in active" id="inbox-view">
                                <ul id="emailList" class="list-group list-group-lg no-radius list-email">
                                    
                                </ul>
                            </div>
                    </div>
                    <div id="emailDetails" hidden>
                        <!-- begin wrapper -->
                        <div class="wrapper bg-silver-lighter p-b-15">
                                <!-- begin btn-toolbar -->
                                <div class="btn-toolbar">
                                    
                                    <button class="btn btn-sm btn-white" data-toggle="tooltip" data-placement="bottom" data-title="Back to overview" data-original-title="" title="" onClick="showEmailOverview()"><i class="ion-android-arrow-back"></i></button>
                                    
                                    <div id="deleteGrp" class="btn-group">
                                        <button class="btn btn-sm btn-white" onClick="replyToSelected()"><i class="ion-chatbox-working text-primary m-r-3"></i> <span class="hidden-xs">Reply</span></button>
                                        <button class="btn btn-sm btn-white" onClick="forwardSelected()"><i class="ion-android-send text-success m-r-3"></i> <span class="hidden-xs">Forward</span></button>
                                        <button class="btn btn-sm btn-white" onClick="deleteSelected()"><i class="ion-trash-b text-danger m-r-3"></i> <span class="hidden-xs">Delete</span></button>
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
						<input type="hidden" id="emailMessageIDInput" />
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
	<!-- ================== END PAGE LEVEL JS ================== -->
	
	
	<script>
	    var loggedEmployee = <?php echo json_encode($_SESSION["id"]); ?>;
    
        var perPage = 15;
        var currentPage = 1;
		var currentFolder = "INBOX";
        var allMessages;
        var previousMessages;
        var firstPageLoad = true;
        var retrievedMessages = [];
        var labelArray = [];
        var selectedEmail;
        var selectedEmailLi;
        
        
        // Client ID and API key from the Developer Console
        var CLIENT_ID = '199528804001-7dj1br8mm8le62dhfo2465666ikobfrt.apps.googleusercontent.com';
        
        // Array of API discovery doc URLs for APIs used by the quickstart
        var DISCOVERY_DOCS = ["https://www.googleapis.com/discovery/v1/apis/gmail/v1/rest"];
        
        // Authorization scopes required by the API; multiple scopes can be
        // included, separated by spaces.
        var SCOPES = 'https://www.googleapis.com/auth/gmail.modify';
        
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
                discoveryDocs: DISCOVERY_DOCS,
                clientId: CLIENT_ID,
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
            if (isSignedIn) {
                $("#gAuthorizeBtn").hide();
                $("#gSignOutBtn").show();
				listLabels();
                listMessages();
            } else {
                $("#gAuthorizeBtn").show();
                $("#gSignOutBtn").hide();
                App.init();
                firstPageLoad = false;
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
            location.href = "<?= BASE_URL ?>" + "webmail";
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
        
        /**
         * Print all Labels in the authorized user's inbox. If no labels
         * are found an appropriate message is printed.
         */
        function listLabels() {
			gapi.client.gmail.users.labels.list({
				'userId': 'me'
			}).then(function(response) {
				var labels = response.result.labels;
				if (labels && labels.length > 0) {
					for (i = 0; i < labels.length; i++) {
						var label = labels[i];
						labelArray.push(label.id);
						label.name = label.name.toLowerCase();
						label.name = label.name.replace("category_", "");
						var prettyLabelName = label.name.charAt(0).toUpperCase() + label.name.slice(1).toLowerCase();
						if (prettyLabelName == "Inbox"){
							$("#folderList").prepend('<li class="active" onClick="switchFolder(this,' + i + ')"><a href="#">' + prettyLabelName + '</a></li>');
						}else{
							$("#folderList").append('<li onClick="switchFolder(this,' + i + ')"><a href="#">' + prettyLabelName + '</a></li>');
						}
					}
				}
			});
		}

		function searchMessages() {
			var searchQ = $("#searchEmailsInput").val();
			if (searchQ == "") {
				listMessages();
				return;
			}
			$("#deleteGrp").show();
			retrievedMessages = [];
			$("#loadingPopup").show();
			$("#emailList").html("");
			request = gapi.client.gmail.users.messages.list({
				'userId': "me",
				"q": searchQ,
				"maxResults": 250
			}).then(function(response) {
				if (response.result.resultSizeEstimate == 0) { //no emails with this label
					allMessages = $("#emailList").children("li");
					$("#pageCount").html("Page 0 of 0");
					$("#loadingPopup").hide();
					if (!$("#emailOverview").is(":visible")) {
						$("#emailOverview").show();
						$("#emailDetails").hide();
						$("#emailBody").html("");
					}
					return;
				}
				var messages = response.result.messages;
				var msgCount = 0;
				var unreadCount = 0;
				for (var i = 0; i < messages.length; i++) {
					gapi.client.gmail.users.messages.get({
						'userId': "me",
						'id': messages[i].id
					}).then(function(response) {
						retrievedMessages.push(response);
						msgCount++;
						if (msgCount == messages.length) {
							retrievedMessages.sort(function(a, b) {
								return a.result.internalDate == b.result.internalDate ? 0 : +(a.result.internalDate < b.result.internalDate) || -1; //sort array by date, newest to oldest
							});
							var displayedMessages = 0;
							for (var n = 0; n < retrievedMessages.length; n++) {
								var rMessage = retrievedMessages[n];
								var subject;
								var from;
								var mDate;
								var labels = rMessage.result.labelIds;
								var headers = rMessage.result.payload.headers;
								for (var j = 0; j < headers.length; j++) {
									if (headers[j].name == "Subject") {
										subject = headers[j].value;
									}
									if (headers[j].name == "From") {
										from = headers[j].value.replace(/['"]+/g, '');
										
									}
									if (headers[j].name == "Date") {
										mDate = moment(headers[j].value).format("dddd, Do MMM");
									}
								}
								var isRead = (labels.indexOf("UNREAD") == -1);
								var isImportant = (labels.indexOf("IMPORTANT") != -1)
								var isStarred = (labels.indexOf("STARRED") != -1);
								var emailStatus = "read";
								var importanceColor = "danger";
								var starIcon = "far fa-star";
								if (!isRead) {
									emailColor = "unread";
									unreadCount++;
								}
								if (isImportant) {
									importanceColor = "success";
								}
								if (isStarred) {
									starIcon = "fa fa-star";
								}


								var labelColor = "blue";

								if (displayedMessages < perPage) {
									$("#emailList").append('<li class="list-group-item ' + emailStatus + '">' +
										'<div class="email-checkbox">' +
										'<label>' +
										'<i class="far fa-square"></i>' +
										'<input type="checkbox" data-checked="email-checkbox">' +
										'</label>' +
										'</div>' +
										'<div class="email-checkbox">' +
										'<i onClick="toggleStarred(this,' + n + ')" class="' + starIcon + ' text-warning"></i>' +
										'</div>' +
										'<div class="email-checkbox">' +
										'<i onClick="toggleImportant(this,' + n + ')" class="ion-fireball text-' + importanceColor + '"></i></span>' +
										'</div>' +
										'<div class="email-user m-r-10 bg-' + labelColor + '">' +
										'<span class="text-white">' + from.substring(0, 1).toUpperCase() + '</span>' +
										'</div>' +
										'<div class="email-info">' +
										'<div>' +
										'<span class="email-time">' + mDate + '</span>' +
										'<span class="email-sender">' + from + '</span>' +
										'<span class="email-title">' + subject + '</span>' +
										'<span class="email-desc">' + rMessage.result.snippet.substring(0, 60) + "..." + '</span>' +
										'</div>' +
										'</div>' +
										'</li>');
								} else {
									$("#emailList").append('<li class="list-group-item hideMe">' +
										'<div class="email-checkbox">' +
										'<label>' +
										'<i class="far fa-square"></i>' +
										'<input type="checkbox" data-checked="email-checkbox">' +
										'</label>' +
										'</div>' +
										'<div class="email-checkbox">' +
										'<i onClick="toggleStarred(this,' + n + ')" class="' + starIcon + ' text-warning"></i>' +
										'</div>' +
										'<div class="email-checkbox">' +
										'<i onClick="toggleImportant(this,' + n + ')" class="ion-fireball text-' + importanceColor + '"></i></span>' +
										'</div>' +
										'<div class="email-user m-r-10 bg-' + labelColor + '">' +
										'<span class="text-white">F</span>' +
										'</div>' +
										'<div class="email-info">' +
										'<div>' +
										'<span class="email-time">' + mDate + '</span>' +
										'<span class="email-sender">' + from + '</span>' +
										'<span class="email-title">' + subject + '</span>' +
										'<span class="email-desc">' + rMessage.result.snippet.substring(0, 60) + "..." + '</span>' +
										'</div>' +
										'</div>' +
										'</li>');
								}
								displayedMessages++;
							}
							allMessages = $("#emailList").children("li");
							$("#pageCount").html("Page 1 of " + Math.ceil(allMessages.length / perPage));
							previousMessages = allMessages.slice(0, perPage);
							if (unreadCount > 0) {
								$("#nrOfUnread").html(unreadCount);
							} else {
								$("#nrOfUnread").hide();
							}
							$("#loadingPopup").hide();
							if (!$("#emailOverview").is(":visible")) {
								$("#emailOverview").show();
								$("#emailDetails").hide();
								$("#emailBody").html("");
							}
						}

					});
				}
			});
		}

		function listMessages() {
			$("#deleteGrp").show();
			retrievedMessages = [];
			if (!firstPageLoad) {
				$("#loadingPopup").show();
			}
			$("#emailList").html("");
			request = gapi.client.gmail.users.messages.list({
				'userId': "me",
				"labelIds": [currentFolder],
				"maxResults": 250
			}).then(function(response) {
				if (response.result.resultSizeEstimate == 0) { //no emails with this label
					allMessages = $("#emailList").children("li");
					$("#pageCount").html("Page 0 of 0");
					$("#loadingPopup").hide();
					if (!$("#emailOverview").is(":visible")) {
						$("#emailOverview").show();
						$("#emailDetails").hide();
						$("#emailBody").html("");
					}
					return;
				}
				var messages = response.result.messages;
				var msgCount = 0;
				var unreadCount = 0;
				for (var i = 0; i < messages.length; i++) {
					gapi.client.gmail.users.messages.get({
						'userId': "me",
						'id': messages[i].id
					}).then(function(response) {
						retrievedMessages.push(response);
						msgCount++;
						if (msgCount == messages.length) {
							retrievedMessages.sort(function(a, b) {
								return a.result.internalDate == b.result.internalDate ? 0 : +(a.result.internalDate < b.result.internalDate) || -1; //sort array by date, newest to oldest
							});
							var displayedMessages = 0;
							for (var n = 0; n < retrievedMessages.length; n++) {
								var rMessage = retrievedMessages[n];
								var subject;
								var from;
								var mDate;
								var labels = rMessage.result.labelIds;
								var headers = rMessage.result.payload.headers;
								for (var j = 0; j < headers.length; j++) {
									if (headers[j].name == "Subject") {
										subject = headers[j].value;
									}
									if (headers[j].name == "From") {
										from = headers[j].value.replace(/['"]+/g, '');
										
									}
									if (headers[j].name == "Date") {
										mDate = moment(headers[j].value).format("dddd, Do MMM");
									}
								}
								var isRead = (labels.indexOf("UNREAD") == -1);
								var isImportant = (labels.indexOf("IMPORTANT") != -1)
								var isStarred = (labels.indexOf("STARRED") != -1);
								var emailStatus = "read";
								var importanceColor = "danger";
								var starIcon = "far fa-star";
								if (!isRead) {
									emailColor = "unread";
									unreadCount++;
								}
								if (isImportant) {
									importanceColor = "success";
								}
								if (isStarred) {
									starIcon = "fa fa-star";
								}


								var labelColor = "blue";

								if (displayedMessages < perPage) {
									$("#emailList").append('<li class="list-group-item ' + emailStatus + '">' +
										'<div class="email-checkbox">' +
										'<label>' +
										'<i class="far fa-square"></i>' +
										'<input type="checkbox" data-checked="email-checkbox">' +
										'</label>' +
										'</div>' +
										'<div class="email-checkbox">' +
										'<i onClick="toggleStarred(this,' + n + ')" class="' + starIcon + ' text-warning"></i>' +
										'</div>' +
										'<div class="email-checkbox">' +
										'<i onClick="toggleImportant(this,' + n + ')" class="ion-fireball text-' + importanceColor + '"></i></span>' +
										'</div>' +
										'<div class="email-user m-r-10 bg-' + labelColor + '">' +
										'<span class="text-white">' + from.substring(0, 1).toUpperCase() + '</span>' +
										'</div>' +
										'<div class="email-info">' +
										'<div>' +
										'<span class="email-time">' + mDate + '</span>' +
										'<span class="email-sender">' + from + '</span>' +
										'<span class="email-title">' + subject + '</span>' +
										'<span class="email-desc">' + rMessage.result.snippet.substring(0, 60) + "..." + '</span>' +
										'</div>' +
										'</div>' +
										'</li>');
								} else {
									$("#emailList").append('<li class="list-group-item hideMe">' +
										'<div class="email-checkbox">' +
										'<label>' +
										'<i class="far fa-square"></i>' +
										'<input type="checkbox" data-checked="email-checkbox">' +
										'</label>' +
										'</div>' +
										'<div class="email-checkbox">' +
										'<i onClick="toggleStarred(this,' + n + ')" class="' + starIcon + ' text-warning"></i>' +
										'</div>' +
										'<div class="email-checkbox">' +
										'<i onClick="toggleImportant(this,' + n + ')" class="ion-fireball text-' + importanceColor + '"></i></span>' +
										'</div>' +
										'<div class="email-user m-r-10 bg-' + labelColor + '">' +
										'<span class="text-white">F</span>' +
										'</div>' +
										'<div class="email-info">' +
										'<div>' +
										'<span class="email-time">' + mDate + '</span>' +
										'<span class="email-sender">' + from + '</span>' +
										'<span class="email-title">' + subject + '</span>' +
										'<span class="email-desc">' + rMessage.result.snippet.substring(0, 60) + "..." + '</span>' +
										'</div>' +
										'</div>' +
										'</li>');
								}
								displayedMessages++;
							}
							allMessages = $("#emailList").children("li");
							$("#pageCount").html("Page 1 of " + Math.ceil(allMessages.length / perPage));
							previousMessages = allMessages.slice(0, perPage);
							if (unreadCount > 0) {
								$("#nrOfUnread").html(unreadCount);
							} else {
								$("#nrOfUnread").hide();
							}
							if (firstPageLoad) {
								App.init();
								firstPageLoad = false;
							} else {
								$("#loadingPopup").hide();
							}
							if (!$("#emailOverview").is(":visible")) {
								$("#emailOverview").show();
								$("#emailDetails").hide();
								$("#emailBody").html("");
							}
						}

					});
				}

			});
		}
        
        function toggleImportant(item, index){
            var email = retrievedMessages[index];
            var labels = email.result.labelIds;
            var isImportant = (labels.indexOf("IMPORTANT") != -1);
            
            if (isImportant){
                $(item).removeClass("text-success");
                $(item).addClass("text-danger");
                gapi.client.gmail.users.messages.modify({
                    'userId': "me",
                    'id': email.result.id,
                    'removeLabelIds': ["IMPORTANT"]
                }).then(function(response){
                    labels.splice(labels.indexOf("IMPORTANT"), 1);
                    $.gritter.add({
                    	title: 'E-mail unmarked',
                    	time: 1500,
                    	text: 'Selected e-mail is now marked as unimportant'
                    });
                });
            }else{
                $(item).removeClass("text-danger");
                $(item).addClass("text-success");
                gapi.client.gmail.users.messages.modify({
                    'userId': "me",
                    'id': email.result.id,
                    'addLabelIds': ["IMPORTANT"]
                }).then(function(response){
                    labels.push("IMPORTANT");
                    $.gritter.add({
                    	title: 'E-mail marked',
                    	time: 1500,
                    	text: 'Selected e-mail is now marked as important'
                    });
                });
            }
        }
        
        function toggleStarred(item, index){
            var email = retrievedMessages[index];
            var labels = email.result.labelIds;
            var isStarred = (labels.indexOf("STARRED") != -1);
            
            if (isStarred){
                $(item).removeClass("fa fa-star");
                $(item).addClass("far fa-star");
                gapi.client.gmail.users.messages.modify({
                    'userId': "me",
                    'id': email.result.id,
                    'removeLabelIds': ["STARRED"]
                }).then(function(response){
                    labels.splice(labels.indexOf("STARRED"), 1);
                });
            }else{
                $(item).removeClass("far fa-star");
                $(item).addClass("fa fa-star");
                gapi.client.gmail.users.messages.modify({
                    'userId': "me",
                    'id': email.result.id,
                    'addLabelIds': ["STARRED"]
                }).then(function(response){
                    labels.push("STARRED");
                });
            }
        }
        
        
        function refreshMessages(){
            listMessages();
        }
        
        function replyToSelected(){
            var emailHeaders = selectedEmail.result.payload.headers;
            var replyTo;
            var inReplyTo;
            var subject;
            var messageID;
            for (var i = 0; i < emailHeaders.length; i++){
                if (emailHeaders[i].name == "Return-Path"){
                    replyTo = emailHeaders[i].value;
                    replyTo = replyTo.replace("<", "");
                    replyTo = replyTo.replace(">", "");
                }else if (emailHeaders[i].name == "Subject"){
                    subject = emailHeaders[i].value;
                }else if (emailHeaders[i].name == "Message-ID"){
                    messageID = emailHeaders[i].value;
                }
            }
            if (replyTo == null){
                for (var i = 0; i < emailHeaders.length; i++){
                    if (emailHeaders[i].name == "From"){
                        replyTo = emailHeaders[i].value;
                        replyTo = replyTo.replace(/\"/g, '&quot;');
                        break;
                    }
                }
            }
            if (replyTo == null){
                for (var i = 0; i < emailHeaders.length; i++){
                    if (emailHeaders[i].name == "To"){
                        replyTo = emailHeaders[i].value;
                        replyTo = replyTo.replace(/\"/g, '&quot;');
                        break;
                    }
                }
            }
            if (!subject.toLowerCase().includes("re:")){
                subject = "Re: " + subject;
            }
            showReplyPopup(replyTo, subject, messageID);
            
        }
        
        function forwardSelected(){
            var emailHeaders = selectedEmail.result.payload.headers;
            
            var subject;
            var from;
            var to;
            var date;
            for (var i = 0; i < emailHeaders.length; i++){
                if (emailHeaders[i].name == "Subject"){
                    subject = "Fw: " + emailHeaders[i].value;
                }else if (emailHeaders[i].name == "From"){
                    from = emailHeaders[i].value;
                    from = from.replace(/\"/g, '&quot;');
                }else if (emailHeaders[i].name == "To"){
                    to = emailHeaders[i].value;
                }else if (emailHeaders[i].name == "Date"){
                    date = emailHeaders[i].value;
                }
            }
            var emailMessage = "<br><br><br><br>---------- Forwarded message ----------" +
                            "<br>From: " + from +
                            "<br>Date: " + date +
                            "<br>Subject: " + subject + 
                            "<br>To: " + to + "<br><br>" +
                            getBody(selectedEmail.result.payload);
            showForwardPopup(subject, emailMessage);
        }
        
        function deleteSelected(){
            gapi.client.gmail.users.messages.trash({
                'userId': "me",
                'id': selectedEmail.result.id
            }).then(function(response) {
                $(selectedEmailLi).remove();
                showEmailOverview();
            });
        }
        
        
        
        function getBody(message) {
            var encodedBody = '';
            if (typeof message.parts === 'undefined' || message.parts == null) {
                encodedBody = message.body.data;
            } else {
                encodedBody = getHTMLPart(message.parts);
            }
            if (encodedBody == ""){
                encodedBody = getPlainPart(message.parts);
            }
            encodedBody = encodedBody.replace(/-/g, '+').replace(/_/g, '/').replace(/\s/g, '');

            
           
            return decodeURIComponent(escape(window.atob(encodedBody)));
        }
        
        function getHTMLPart(arr) {
            for (var x = 0; x <= arr.length; x++) {
                if (typeof arr[x] === 'undefined'){
                    continue;
                }else if (typeof arr[x].parts === 'undefined') {
                    if (arr[x].mimeType === 'text/html'){
                        return arr[x].body.data;
                    }
                } else {
                    return getHTMLPart(arr[x].parts);
                }
            }
            return '';
        }
        
        function getPlainPart(arr){
            for (var x = 0; x <= arr.length; x++) {
                if (typeof arr[x] === 'undefined'){
                    continue;
                }else if (typeof arr[x].parts === 'undefined') {
                    if (arr[x].mimeType === 'text/plain'){
                        return arr[x].body.data;
                    }
                } else {
                    return getHTMLPart(arr[x].parts);
                }
            }
            return '';
        }
        
        var aCount;
        var nrOfAttachments;
        var bodyWithAttachments;
        
        function getAttachments(message, emailBody) {
            nrOfAttachments = 0;
            aCount = 0;
            bodyWithAttachments = emailBody;
            $("#attachmentsList").html("");
            var parts = message.result.payload.parts;
            if (parts != null){
                for (var i = 0; i < parts.length; i++) {
                    var part = parts[i];
                    if (part.filename && part.filename.length > 0) {
                        nrOfAttachments++;
                        var mimeType = part.mimeType;
                        var filename = part.filename;
                        var attachId = part.body.attachmentId;
                        var indexedHeaders = part.headers.reduce(function(acc, header) {
                          acc[header.name.toLowerCase()] = header.value;
                          return acc;
                        }, {});
                        var contentId = indexedHeaders['content-id'] || '';
                        if (contentId != ""){
                            contentId = contentId.replace("<", "");
                            contentId = contentId.replace(">", "");
                        }
                        getAttachment(attachId, message.id, filename, mimeType, contentId, false);
                    }
					if (part.parts != undefined){
						var miniParts = part.parts;
						for (var j = 0; j < miniParts.length; j++){
							var curPart = miniParts[j];
							if (curPart.filename.length > 0){
								nrOfAttachments++;
								var mimeType = curPart.mimeType;
								var filename = curPart.filename;
								var attachId = curPart.body.attachmentId;
								var indexedHeaders = curPart.headers.reduce(function(acc, header) {
								  acc[header.name.toLowerCase()] = header.value;
								  return acc;
								}, {});
								var contentId = indexedHeaders['content-id'] || '';
								if (contentId != ""){
									contentId = contentId.replace("<", "");
									contentId = contentId.replace(">", "");
								}
								getAttachment(attachId, message.id, filename, mimeType, contentId, true);
							}
						}
					}
                }
                if (nrOfAttachments == 0){
                    $("#emailBody").html(bodyWithAttachments);
                    $("#emailOverview").hide();
                    $("#emailDetails").show();
                }
            }else{
                $("#emailBody").html(bodyWithAttachments);
                $("#emailOverview").hide();
                $("#emailDetails").show();
            }
        }
        
        function getAttachment(attachId, messageId, filename, mimeType, contentId, isInlineImage) {
            var request = gapi.client.gmail.users.messages.attachments.get({
                'id': attachId,
                'messageId': messageId,
                'userId': "me"
            }).then(function(attachment) {
                aCount ++;
                var attachmentLink = 'data:' + mimeType + ';base64,' + attachment.result.data.replace(/-/g, '+').replace(/_/g, '/');
				if (!isInlineImage){
					$("#attachmentsList").append('<li class="fa-file">' +
							'<div class="document-file">' +
								'<a href="' + attachmentLink + '" download="' + filename + '" ><i class="fa fa-file-image"></i></a>' +
							'</div>' +
							'<div class="document-name"><a href="' + attachmentLink + '" download="' + filename + '" >' + filename + '</a></div>' +
						'</li>');
				}
                if (contentId != ""){
					var regex = new RegExp('"cid:' + contentId + '"', "g");
					bodyWithAttachments = bodyWithAttachments.replace(regex, attachmentLink);
                }
                if (aCount == nrOfAttachments){
                    $("#emailBody").html(bodyWithAttachments);
                    $("#emailOverview").hide();
                    $("#emailDetails").show();
                }
            });
        }
        
        function showComposePopup(){
            $("#composePopup").show();
        }
        
        function hideComposePopup(){
            $("#email-to").tagit("removeAll");
			$("#email-cc-Cc").tagit("removeAll");
			$("#email-cc-Bcc").tagit("removeAll");
            $("#sendEmailForm")[0].reset();
            $("#composePopup").hide();
        }
        
        function showReplyPopup(replyTo, subject, messageID){
            $('#email-to').tagit('createTag', replyTo);
            $("#emailSubjectInput").val(subject);
            $("#emailMessageIDInput").val(messageID);
            $("#composePopup").show();
        }
        
        function showForwardPopup(subject,forwardMessage){
            $("#emailSubjectInput").val(subject);
            tinymce.get("emailMessageInput").setContent(forwardMessage);
            $("#composePopup").show();
            
        }
        
        function sendMessage(headers_obj, message){
            var email = '';
            
            for (var header in headers_obj){
                email += header += ": "+ headers_obj[header] + "\r\n";
            }
            
            email += "Content-Type: text/html; charset='UTF-8'\r\n" +
                     "Content-Transfer-Encoding: base64\r\n\r\n";
            
            email += "\r\n" + message;
            
            var sendRequest = gapi.client.gmail.users.messages.send({
                'userId': 'me',
                'resource': {
                  'raw': Base64.encode(email).replace(/\+/g, '-').replace(/\//g, '_')
                }
            }).then(function(response) {
                console.log(response);
                swal(
                    'E-mail sent',
                    'Your e-mail was sent successfully',
                    'success'
                );
                hideComposePopup();
            });
        }
        
        function goToNextPage() {
                if (currentPage < Math.ceil(allMessages.length / perPage)){
                    currentPage++;
                    $("#pageCount").html("Page " + currentPage + " of " + Math.ceil(allMessages.length / perPage));
                    var offset = (currentPage - 1) * perPage;
                
                    // hide previous items, if any
                    if (previousMessages) {
                        previousMessages.addClass('hideMe');
                    }
                
                    // show new items, and store the set
                    
                    previousMessages = allMessages.slice(offset, currentPage * perPage);
                    previousMessages.removeClass('hideMe');
                }
        }
        
        function goToPreviousPage(){
                if (currentPage > 1){
                    currentPage--;
                    $("#pageCount").html("Page " + currentPage + " of " + Math.ceil(allMessages.length / perPage));
                    var offset = (currentPage - 1) * perPage;
                
                    // hide previous items, if any
                    if (previousMessages) {
                        previousMessages.addClass('hideMe');
                    }
                
                    // show new items, and store the set
                    previousMessages = allMessages.slice(offset, currentPage * perPage).removeClass('hideMe');
                }
        }
        
        $(document).ready(function() {
            getMenuStatistics(loggedEmployee);
			
			perPage = Cookies.get("gmail_page", 15);
			if (perPage == undefined){
				perPage = 15;
				Cookies.set("gmail_page", 15, { expires: 365 });
			}
			
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
				Cookies.set('gmail_page', perPage, { expires: 365 });
				listMessages();
			});
			
            $("#email-to").tagit({
                beforeTagAdded: function(event, ui) {
                    return isEmail(ui.tagLabel);
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
                var e = "[data-checked=email-checkbox]:checked";
                if ($(e).length !== 0) {
                    $(e).closest("li").slideToggle(function() {
                        var indexOfLi = $(this).index();
                        var email = retrievedMessages[indexOfLi]; //if in inbox
                        if (showingSent){
                            email = retrievedSentMessages[indexOfLi];
                        }else if (showingDrafts){
                            email = retrievedDraftMessages[indexOfLi];
                        }else if (showingTrash){
                            email = retrievedTrashMessages[indexOfLi];
                        }
                        gapi.client.gmail.users.messages.trash({
                            'userId': "me",
                            'id': email.result.id
                        }).then(function(response) {
                            console.log(response);
                        });
                        $(this).remove();
                        handleEmailActionButtonStatus();
                    })
                }
            });
            
            $('#sendEmailForm').on('submit', function(e) { //use on if jQuery 1.7+
                e.preventDefault();
                var tags = $("#email-to").tagit("assignedTags");
				var cc = [];
				if ($("#email-cc-Cc").length){
					cc = $("#email-cc-Cc").tagit("assignedTags");
				}
				var bcc = [];
				if ($("#email-cc-Bcc").length){
					 bcc = $("#email-cc-Bcc").tagit("assignedTags");
				}
                if (tags.length == 0){
                    swal(
                        'No e-mail recipients',
                        'Please specify atleast one e-mail recipient',
                        'error'
                    );
                }else{
                    var emailHeaders = { 'To': tags, 'Cc': cc, "Bcc": bcc, 'Subject': $('#emailSubjectInput').val() };
                    if ($("#emailMessageIDInput").val() != ""){
                        emailHeaders = { 'To': tags, 'Subject': $('#emailSubjectInput').val(), 'In-Reply-To': $('#emailMessageIDInput').val(), 'References': $("#emailMessageIDInput").val() };
                    }
                    console.log(emailHeaders);
                    sendMessage(emailHeaders, tinymce.get('emailMessageInput').getContent());
                }
            });
            
            $("#emailList").on("click", "li .email-info", function() {
                var emailIndex = $(this).parent("li").index();
                selectedEmailLi = $(this).parent("li");
                selectedEmail = retrievedMessages[emailIndex];
                getEmailContents();
            });
        });
		
		function switchFolder(li, idx){
			if (li != null){
				$("#folderList li").removeClass("active");
				$(li).addClass("active");
			}
			currentFolder = labelArray[idx];
			currentPage = 1;
			retrievedMessages = [];
			$("#emailList").html("");
			listMessages();
		}
        
        function getEmailContents(){
                var subject;
                var from;
                var to;
                var mDate;
                var headers = selectedEmail.result.payload.headers;
                for (var j = 0; j < headers.length; j++) {
                    if (headers[j].name == "Subject") {
                        subject = headers[j].value;
                    }
                    if (headers[j].name == "From") {
                        from = headers[j].value.replace(/['"]+/g, '');
            
                    }
                    if (headers[j].name == "To") {
                        to = headers[j].value.replace(/['"]+/g, '');
            
                    }
                    if (headers[j].name == "Date") {
                        mDate = moment(headers[j].value).format("dddd, Do MMMM YYYY");
                    }
                }
                var emailContent = '<h4 class="m-b-15 m-t-0 p-b-10 underline">' + subject + '</h4>' +
                    '<ul class="media-list underline m-b-20 p-b-15">' +
                    '<li class="media media-sm clearfix">' +
                    '<a href="javascript:;" class="pull-left">' +
                    '<img class="media-object rounded-corner" alt="" src="/assets/img/user-14.jpg">' +
                    '</a>' +
                    '<div class="media-body">' +
                    '<span class="email-from text-inverse f-w-600">' +
                    'From: ' + from +
                    '</span> on <span class="text-inverse f-w-600">' + mDate + '</span><br>' +
                    '<span class="email-to">' +
                    'To: ' + to +
                    '</span>' +
                    '</div>' +
                    '</li>' +
                    '</ul>';
                emailContent += getBody(selectedEmail.result.payload);
                getAttachments(selectedEmail, emailContent);
                $("#deleteGrp").show();
        }
        
        function showEmailOverview(){
            $("#emailOverview").show();
            $("#emailDetails").hide();
            $("#emailBody").html("");
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
        
        
        
        function isEmail(email) {
            var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
            return regex.test(email);
        }
        
        function handleEmailActionButtonStatus() {
            if ($("[data-checked=email-checkbox]:checked").length !== 0) {
                $("[data-email-action]").removeClass("hide")
            } else {
                $("[data-email-action]").addClass("hide")
            }
        };
        
            
	</script>
    <script async defer src="https://apis.google.com/js/api.js" onload="this.onload=function(){};handleClientLoad()" onreadystatechange="if (this.readyState === 'complete') this.onload()"></script>
</body>
</html>
