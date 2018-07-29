<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
<!--<![endif]-->
<head>
	<meta charset="utf-8" />
	<title>Campaign list</title>
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
    <link href="<?= ASSETS_URL . "morris/morris.css" ?>" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.6.9/sweetalert2.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.6.9/sweetalert2.min.css">
	<!-- ================== END PAGE LEVEL STYLE ================== -->
	
	<!-- ================== BEGIN BASE JS ================== -->
	<script src="<?= ASSETS_URL . "pace/pace.min.js" ?>" ></script>
	<!-- ================== END BASE JS ================== -->
</head>
<style>
    
    
    #importDIV, #addSubscriberDIV{
        width: 700px;
        height: auto;
        position: relative;
        margin: 10% auto 0px auto;
    }
    
    .view-switcher li {
        color: #545c6a;
        display: inline;
        margin-right: 10px;
        padding: 4px 0px 4px 0px;
    }
    
    .view-switcher .active {
        border-bottom: 2px solid #33B679;
    }

    .view-switcher li a {
        font: 14px/30px 'OpenSans-Regular',"Helvetica Neue",Helvetica,Arial,sans-serif;
        color: #545c6a;
        padding: 4px 0px 4px 0px;
    }
    
    .view-switcher li a:hover, .view-switcher li a:active, .view-switcher li a:focus, .view-switcher li a:visited{
        text-decoration: none;
    }

    .view-switcher{
        margin: 0 18px 0 0;
        font: 14px/30px 'OpenSans-Regular',"Helvetica Neue",Helvetica,Arial,sans-serif;
        color: #545c6a;
        -webkit-transition: color .3s;
        transition: color .3s;
        cursor: pointer;
        text-decoration: none;
        display: block;
        list-style-type: none;
        -webkit-margin-before: 1em;
        -webkit-margin-after: 1em;
        -webkit-margin-start: 0px;
        -webkit-margin-end: 0px;
        -webkit-padding-start: 0px;
    }
    
    .tab-content {
        padding: 5px 0px 0px 0px;
        margin-bottom: 20px;
        background: none;
        -webkit-border-radius: 3px;
        -moz-border-radius: 3px;
        border-radius: 3px;
    }
    
    .whiteBG{
        background-color: white;
    }
    
    .scroll-small th, .scroll-small td {
        overflow: hidden;
        text-overflow: ellipsis;
        white-space: nowrap;
    }
    
    .mc-table th, .mc-table td {
        vertical-align: top;
        padding: 12px 15px;
    }
    
    .mc-table th {
        word-break: normal;
        text-align: left;
        background-color: #2196f3;
        color: white;
        border-bottom: 1px solid #e0e0e0;
        border-top: 1px solid #e0e0e0;
        font-weight: 600;
    }
    
    .scroll-small {
        table-layout: fixed;
    }

    .mc-table {
        table-layout: auto;
        word-break: normal;
        font-size: 15px;
        margin-bottom: 30px;
        width: 100%;
    }

    table {
        border-collapse: separate;
        border-spacing: 0;
    }
    
    .scroll-small th, .scroll-small td {
        overflow: hidden;
        text-overflow: ellipsis;
        white-space: nowrap;
    }

    .mc-table th, .mc-table td {
        vertical-align: top;
        padding: 12px 15px;
    }
    .mc-table td {
        border-bottom: 1px dotted #e0e0e0;
        cursor: default;
        background-color: white;
    }
    
    .image-centered{
        margin: 0 auto;
        padding: 32px 0px 0px 16px;
        display: block;
    }
    
    .text-lightblack{
        color: #484848;
    }
    
    .underline-on-hover{
        cursor: pointer;
    }
    
    .underline-on-hover{
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
		<div id="content" class="content">
			<!-- begin breadcrumb -->
			<ol class="breadcrumb pull-right">
				<li><a href="javascript:;">Campaign list</a></li>
			</ol>
			
			<h1 class="page-header"><?php echo $campaignlist["list_name"]; ?></h1>
			<div class="row">
			    <div class="col-md-12">
			        <div class="wrapper bg-silver-lighter">
                        <button class="btn btn-sm btn-primary" onClick="showAddSubscriberPopup()">Add a subscriber</button>
                        <button class="btn btn-sm btn-primary" onClick="showImportPopup()">Import from file</button>
                        <div class="pull-right">
                            <?php
                                if($campaignlist["subscribers"] != ""){
                                    echo '<button class="btn btn-sm btn-danger" onClick="removeAllSubscribers()">Remove all subscribers</button>';
                                }
                            ?>
                            
                            <button class="btn btn-sm btn-danger m-l-15 hide" data-subscriber-action="delete"><i class="fa fa-trash m-r-3"></i> <span class="hidden-xs">Remove selected</span></button>
                        </div>
                    </div>
                    <ul id="subscriberList" class="list-group list-group-lg no-radius list-email">
                                                
                    </ul>
                    <div id="noContactsDIV" class="bg-white height-sm" hidden>
                        <img class="image-centered" src="<?= IMG_URL . "empty-lists.svg" ?>" >
                        <p class="f-s-20 text-center m-t-20 f-w-700 text-lightblack">This list has no subscribers</p>
                        <p class="f-s-16 text-center"><span class="text-primary underline-on-hover" onClick="showImportPopup()">Import subscribers</span> or <span class="text-primary underline-on-hover" onClick="showAddSubscriberPopup()">choose subscribers from existing customers</span> to get started</p>
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
                        <form id="importCSVForm" action="<?= BASE_URL . " csv/import " ?>" method="post" enctype="multipart/form-data" class="form-horizontal box has-advanced-upload">
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
                        <form id="csvFieldsForm" action="<?= BASE_URL . "campaignlist/import" ?>" method="post" enctype="multipart/form-data" class="form-horizontal">
                            <input type="hidden" name="list_id" value="<?php echo $campaignlist["list_id"] ?>" />
                            <div class="form-group">
                                <div class="col-md-4">
                                    <label>Name: <span class="red">*</span>
                                                                </label>
                                    <select name="subscriber_name" class="form-control import-select" required>
                                                                </select>
                                </div>
                                <div class="col-md-4">
                                    <label>Surname: <span class="red">*</span>
                                                                </label>
                                    <select id="importSurnameSelect" name="subscriber_surname" class="form-control import-select" required>
                                                                </select>
                                </div>
                                <div class="col-md-4">
                                    <label>Contact: <span class="red">*</span>
                                                                </label>
                                    <select id="importContactSelect" name="subscriber_contact" class="form-control import-select" required>
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
		
        <div class="popupContainer" id="addSubscriberPopup" hidden>
            <div class="panel panel-primary" id="addSubscriberDIV" hidden>
                <div class="panel-heading">
                    <div class="panel-heading-btn">
                        <button onclick="hideAddSubscriberPopup()" class="btn btn-xs btn-icon btn-circle btn-default"><i class="fa fa-times"></i>
                        </button>
                    </div>
                    <h4 class="panel-title">Add a subscriber</h4>
                </div>
                <div class="panel-body">
                    <form id="addSubscriberForm" action="campaignlist/addsub" method="post" class="form-horizontal">
                        <input type="hidden" name="list_id" value="<?php echo $campaignlist["list_id"] ?>" >
                        <div class="form-group">
                            <div class="col-md-12">
                                <label id="contactTypeLabel">E-mail address</label>
                                <input id="subscriberContactInput" type="text" class="form-control" name="subscriber_contact" required />
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-12">
                                <label>First name</label>
                                <input id="subscriberNameInput" type="text" class="form-control" placeholder="First name" name="subscriber_name" />
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-12">
                                <label>Last name</label>
                                <input id="subscriberSurnameInput" type="text" class="form-control" placeholder="Last name" name="subscriber_surname" />
                            </div>
                        </div>
                        <button class="btn material primary">Add subscriber</button>
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
	<script src="<?= ASSETS_URL . "fullcalendar/lib/moment.min.js" ?>"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/js/bootstrap-datetimepicker.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/css/bootstrap-datetimepicker.min.css" rel="stylesheet"/>
    <script src="<?= ASSETS_URL . "tinymce/js/tinymce/tinymce.min.js" ?>"></script>
    <link href="<?= ASSETS_URL . "DataTables/media/css/dataTables.bootstrap.min.css" ?>" rel="stylesheet" />
	<link href="<?= ASSETS_URL . "DataTables/extensions/Responsive/css/responsive.bootstrap.min.css" ?>" rel="stylesheet" />
	<script src="<?= ASSETS_URL . "DataTables/media/js/jquery.dataTables.js" ?>"></script>
	<script src="<?= ASSETS_URL . "DataTables/media/js/dataTables.bootstrap.min.js" ?>"></script>
	<script src="<?= ASSETS_URL . "DataTables/extensions/Responsive/js/dataTables.responsive.min.js" ?>"></script>
	<script src="<?= ASSETS_URL . "bootstrap-wizard/js/bwizard.js" ?>"></script>
	<!-- ================== END PAGE LEVEL JS ================== -->
	
	<script>
	    var loggedEmployee = <?php echo json_encode($_SESSION["id"]); ?>;
	    var subscribers = <?php echo json_encode($campaignlist["subscribers"]); ?>;
	    var list_id = <?php echo json_encode($campaignlist["list_id"]); ?>;
	    var list_type = <?php echo json_encode($campaignlist["list_type"]); ?>;
	    var subscriberArray = [];
	    var removedSubscribers = [];
	    var droppedFiles;
	    
	    $(document).ready(function() {
			App.init();
			getMenuStatistics(loggedEmployee);
			$("#wizard").bwizard();
			if (list_type == 1){
			    $("#contactTypeLabel").html("Phone number");
			}
			if (subscribers != ""){
			    subscribers = subscribers.split(";");
        		for (var i = 0; i < subscribers.length; i++){
        			var subscriber = subscribers[i];
        	        var sub_fields = subscriber.split("|");
        	        subscriberArray.push({ "subscriber_name": sub_fields[0], "subscriber_surname": sub_fields[1], "subscriber_contact": sub_fields[2] })
        		}
			}else{
			    $("#noContactsDIV").show();
			}
			setupSubscriberList();
			
			$("[data-subscriber-action]").on("click", function() {
			    removedSubscribers = [];
                var e = "[data-checked=subscriber-checkbox]:checked";
                if ($(e).length !== 0) {
                    $(e).closest("li").slideToggle(function() {
                        var indexOfLi = $(this).index();
                        removedSubscribers.push(subscriberArray[indexOfLi]);
                        subscriberArray.splice(indexOfLi, 1);
                        $(this).remove();
                        handleSubscriberActionButtonStatus();
                    })
                }
            });
            
            $("[data-checked=subscriber-checkbox]").on("click", function() {
                var e = $(this).closest("label");
                var t = $(this).closest("li");
                if ($(this).prop("checked")) {
                    $(e).addClass("active");
                    $(t).addClass("selected")
                } else {
                    $(e).removeClass("active");
                    $(t).removeClass("selected")
                }
                handleSubscriberActionButtonStatus();
            });
            
            $('#addSubscriberForm').on('submit', function(e) { //use on if jQuery 1.7+
			        e.preventDefault();
			        var subname = $("#subscriberNameInput").val();
			        var subsurname = $("#subscriberSurnameInput").val();
			        var subcontact = $("#subscriberContactInput").val();
                    $.ajax({
                        type: "POST",
                        url: "<?= BASE_URL ?>" + "campaignlist/addsub",
                        data: $("#addSubscriberForm").serialize(),
                        success: function(msg) {
                            if (msg == "") {
                               swal(
                                    'Subscriber added',
                                    'Subscriber was successfully added to list.',
                                    'success'
                                ); 
                                $("#addSubscriberForm")[0].reset();
                                var subscriberContent = '<li class="list-group-item primary">' +
                                    '<div class="email-checkbox">' +
                                    '<label class=""><i class="ion-android-checkbox-blank"></i>' +
                                    '<input type="checkbox" data-checked="subscriber-checkbox">' +
                                    '</label>' +
                                    '</div>' +
                                    '<div class="email-info">' +
                                    '<h5 class="email-title">' + subname + " " + subsurname + '</h5>' +
                                    '<p class="email-desc"><strong>' + subcontact + '</strong></p>' +
                                    '</div>' +
                                    '</li>';
                                $("#subscriberList").append(subscriberContent);
                                subscriberArray.push({ "subscriber_name": subname, "subscriber_surname": subsurname, "subscriber_contact": subcontact });
                                $("#noContactsDIV").hide();
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
                    url: "<?= BASE_URL ?>" + "csv/import",
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
                    url: "<?= BASE_URL ?>" + "campaignlist/import",
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
        
	    });
	    
	    function handleSubscriberActionButtonStatus() {
            if ($("[data-checked=subscriber-checkbox]:checked").length !== 0) {
                $("[data-subscriber-action]").removeClass("hide")
            } else {
                if (removedSubscribers.length > 0){
                    var postData = { "list_id": list_id, "unsubscribed_list": removedSubscribers, "subscribed_list": subscriberArray };
                    $.ajax({
                        type: "POST",
                        url: "<?= BASE_URL ?>" + "campaignlist/removesubs",
                        data: postData,
                        success: function(msg) {
                            if (msg != ""){
                                swal(
                                    'Error!',
                                    'The server encountered the following error: ' + msg,
                                    'error'
                                );
                            }
                        }
                    });
                }
                $("[data-subscriber-action]").addClass("hide")
            }
        };
        
        function removeAllSubscribers(){
             swal({
              title: 'Remove all subscribers',
              text: "Are you sure you want to remove all subscribers from this list?",
              type: 'warning',
              showCancelButton: true,
              confirmButtonColor: '#3085d6',
              cancelButtonColor: '#d33',
              confirmButtonText: 'Yes, remove'
            }).then(function () {
                removedSubscribers = [];
                var postData = { "list_id": list_id, "unsubscribed_list": subscriberArray, "subscribed_list": removedSubscribers };
                $.ajax({
                    type: "POST",
                    url: "<?= BASE_URL ?>" + "campaignlist/removesubs",
                    data: postData,
                    success: function(msg) {
                        if (msg != ""){
                            swal(
                                'Error!',
                                'The server encountered the following error: ' + msg,
                                'error'
                            );
                        }else{
                            swal(
                                'All subscribers removed',
                                "All subscribers were successfully removed from this list",
                                'success'
                            );
                            subscriberArray = [];
                            $("#subscriberList").html("");
                            $("#noContactsDIV").show();
                        }
                    }
                });
            });
        }
        
        function showImportPopup(){
            $("#wizardDIV").show();
        }
        
        function showAddSubscriberPopup(){
            $("#addSubscriberPopup, #addSubscriberDIV").show();
        }
        
        function hideAddSubscriberPopup(){
            $("#addSubscriberForm")[0].reset();
            $("#addSubscriberPopup, #addSubscriberDIV").hide();
        }
        
	    function setupSubscriberList(){
	        var subscriberContent = "";
    	    for (var i = 0; i < subscriberArray.length; i++){
    	        var subscriber = subscriberArray[i];
        	    subscriberContent += '<li class="list-group-item unread">' +
                                                '<div class="email-checkbox"><label><i class="far fa-square"></i><input type="checkbox" data-checked="subscriber-checkbox"></label></div>' +
												'<div class="email-user m-r-10 bg-blue">' +
												    '<i class="ion-android-person text-white"></i>' + 
												'</div>' +
												'<div class="email-info">' +
													'<div>' +
														'<span class="email-title">' + subscriber.subscriber_name + " " + subscriber.subscriber_surname  + '</span>' +
														'<span class="email-desc">' + subscriber.subscriber_contact + '</span>' +
													'</div>' +
												'</div>' +
											'</li>';
    	    }
	        $("#subscriberList").html(subscriberContent);
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
