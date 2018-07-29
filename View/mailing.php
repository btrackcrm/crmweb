<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
<!--<![endif]-->
<head>
	<meta charset="utf-8" />
	<title>Campaigns</title>
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
    <link href="<?= ASSETS_URL . "dropzone/min/dropzone.min.css" ?>" rel="stylesheet" />
	<!-- ================== END PAGE LEVEL STYLE ================== -->
	
	<!-- ================== BEGIN BASE JS ================== -->
	<script src="<?= ASSETS_URL . "pace/pace.min.js" ?>" ></script>
	<!-- ================== END BASE JS ================== -->
</head>
<style>
   
    
    .kanban-board:first-child{
        margin-left: 0px !important;
    }
    
    .kanban-board:last-child{
        margin-right: 0px !important;
    }
    
    .kanban-container{
        width: 100% !important;
        display: flex;
        justify-content: space-between;
    }
    
    .kanban-board{
        width: 33% !important;
    }
    
    
    #addTaskDIV, #editTaskDIV, #editDescriptionDIV, #uploadFileDIV, #editModeratorDIV, #inviteDIV, #addSMSCampaignDIV, #addEmailListDIV, #addSMSListDIV, #syncMailchimpDIV, #desyncMailchimpDIV{
        width: 700px;
        height: auto;
        position: relative;
        margin: 10% auto 0px auto;
    }
    
    #addEmailCampaignDIV{
        width: 900px;
        height: auto;
        position: relative;
        margin: 3% auto 0px auto;
    }
    
    .dateSpan{
        position: absolute;
        bottom: 1px;
        right: 6px;
        color: #828b95 !important;
        font-size: 11px;
    }
    
    .bottom25{
        margin-bottom: 25px;
    }
    
    .bottom15{
        margin-bottom: 15px;
    }
    
    .top25{
        margin-top: 25px;
    }
    
    .top10{
        margin-top: 10px;
    }
    
    .whiteBG{
        background-color: white;
        padding: 20px;
        border-radius: 2px;
    }
    
    #messageList{
        margin-bottom: 0px;
    }
    
    #messageList li{
        background-color: white;
        padding: 15px;
        margin-bottom: 10px;
    }
    
    #messageList li:last-child{
        margin-bottom: 0px;
    }
    
    .group-title{
        position: relative;
        padding: 0 0 12px 0;
        margin: 0 0 12px 0;
        border-bottom: 1px solid #ebf1f4;
        font: bold 13px "Helvetica Neue", Arial,Helvetica,sans-serif;
        color: #535c69;
    }
    
    .workgroup-img{
        width: 42px;
        margin-right: 10px;
    }
    
    .tbl-row {
        border-bottom: 1px solid #ebf1f4;
    }
    
    .tbl-column-left {
        padding: 16px 10px 16px 4px;
        color: #535c69;
        font-size: 13px;
        white-space: nowrap;
        vertical-align: top;
    }
    
    .tbl-column-right {
        padding: 16px 0 16px 0;
        color: #000;
        vertical-align: top;
    }
    
    .table-fullwidth {
        margin: 0 0 30px 0;
        width: 100%;
        border-collapse: collapse;
    }
    
    .socialnetwork-group-user-avatar {
        display: block;
        float: left;
        height: 42px;
        margin: 0 11px 0 0;
        width: 42px;
        -webkit-border-radius: 50%;
        border-radius: 50%;
    }
    
    .user-default-avatar {
        background: #535c6a url(http://track.appdev.si/Web/assets/img/user-default-avatar.svg) no-repeat center;
        background-size: 50%;
        position: relative;
    }
    
    .user-default-avatar:before{
        content: '';
        position: absolute;
        right: 0px;
        bottom: -2px;
        width: 12px;
        height: 12px;
        border: 2px solid #fff;
        background: #33B679 !important;
        border-radius: 8px;
    }
    
    .user-offline-avatar {
        background: #535c6a url(http://track.appdev.si/Web/assets/img/user-default-avatar.svg) no-repeat center;
        background-size: 50%;
        position: relative;
    }
    
    .user-offline-avatar:before{
        content: '';
        position: absolute;
        right: 0px;
        bottom: -2px;
        width: 12px;
        height: 12px;
        border: 2px solid #fff;
        background: #ff5252 !important;
        border-radius: 8px;
    }
    
    .user-busy-avatar {
        background: #535c6a url(http://track.appdev.si/Web/assets/img/user-default-avatar.svg) no-repeat center;
        background-size: 50%;
        position: relative;
    }
    
    .user-busy-avatar:before{
        content: '';
        position: absolute;
        right: 0px;
        bottom: -2px;
        width: 12px;
        height: 12px;
        border: 2px solid #fff;
        background: #F9C927 !important;
        border-radius: 8px;
    }
    
    .tab-content {
        padding: 5px 0px 0px 0px;
        margin-bottom: 20px;
        background: none;
        -webkit-border-radius: 3px;
        -moz-border-radius: 3px;
        border-radius: 3px;
    }
    
    #calendar {
        background-color: white;
        border-top: 3px solid #222;
    }
    
    #taskTable{
        width: 100% !important;
        color: #525c69;
        font-weight: bold;
        font-size: 15px;
    }
    
    #taskTable>tbody>tr>td, #taskTable>tbody>tr>th, #taskTable>tfoot>tr>td, #taskTable>tfoot>tr>th, #taskTable>thead>tr>td, #taskTable>thead>tr>th {
        border-color: #ddd;
        padding: 15px 15px 10px 15px;
    }
    
    .input-search{
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
    }
    
    input.icon::-webkit-input-placeholder {
        font-family:'FontAwesome';
    }
    
    input.icon::-moz-placeholder {
        font-family:'FontAwesome';
    }
    
    input.icon::-ms-input-placeholder {
        font-family:'FontAwesome';
    }
    
    .right25{
        margin-right: 25px;
    }
    
    .group-title-lg{
        line-height: 36px;
        font-size: 26px;
    }
    
    .kanban-item {
        cursor: pointer;
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
    
    .kanban-board .kanban-drag {
        min-height: 400px;
        padding: 20px;
    }
    
    div[data-id="todoBoard"] .kanban-item{
        background-color: #ff5252;
        color: white;
    }
    
    div[data-id="workingBoard"] .kanban-item{
        background-color: #2196f3;
        color: white;
    }
    
    div[data-id="doneBoard"] .kanban-item{
        background-color: #33B679;
        color: white;
    }
    
    .kanbanHeaderBtn{
        font-size: 20px;
        line-height: 22px;
        cursor: pointer;
    }
    
    .top15{
        margin-top: 15px;
    }
    
    .chatbox{
        width: 100%;
        padding: 12px;
        border: none;
        background-color: #eee;
        outline: none;
        resize: none;
    }
    
    .left15{
        padding-left: 15px;
    }
    
    .pointer{
        cursor: pointer;
    }
    
    .blue{
        color: #2196f3;
        font-size: 11px;
        line-height: 17px;
    }
    
    .blue:hover{
        text-decoration: underline;
    }
    
    #folderStructureDIV{
        background-color: white;
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
    
    .fc-active{
        background-color: #222 !important;
        color: white !important;
    }
    
    .f-s-24{
        font-size: 24px;
    }
    
    .f-s-14{
        font-size: 14px;
    }
    
    .task-item{
        cursor: pointer;
    }
    
    .collapsible {
        margin: 0 0 1rem 0;
        webkit-box-shadow: 0 2px 2px 0 rgba(0,0,0,0.14), 0 1px 5px 0 rgba(0,0,0,0.12), 0 3px 1px -2px rgba(0,0,0,0.2);
        box-shadow: 0 2px 2px 0 rgba(0,0,0,0.14), 0 1px 5px 0 rgba(0,0,0,0.12), 0 3px 1px -2px rgba(0,0,0,0.2);
        list-style: none;
        -webkit-padding-start: 0px;
    }
    
    .collapsible-header {
        display: -webkit-box;
		display: -webkit-flex;
		display: -ms-flexbox;
		display: flex;
		cursor: pointer;
		-webkit-tap-highlight-color: transparent;
		line-height: 1.5;
		padding: 1.5rem;
		color: black;
		background-color: #fff;
		border-bottom: 1px solid #ddd;
    }
	
	.collapsible-header i{
		width: 2rem;
		font-size: 1.6rem;
		display: inline-block;
		text-align: center;
		margin-right: 1rem;
	}
    
    .collapsible-body {
        display: none;
        border-bottom: 1px solid #ddd;
        -webkit-box-sizing: border-box;
        box-sizing: border-box;
        padding: 1.5rem;
        background-color: white;
    }
    
    list-group-item:hover{
        cursor: pointer;
        background-color: #eee;
    }
    
    
    
    .list-group li:hover .email-checkbox label{
        color: #222;
    }
    
    .text-black{
        color: #484848;
    }
    
    
    
    #loadingSpinnerDIV{
        width: 400px;
        height: 400px;
        position: relative;
        background-color: white;
        margin: 15% auto 0px auto;
    }
    
    
    .loadingLabel{
        position: absolute;
        text-align: center;
        font-weight: bold;
        font-size: 20px;
        bottom: 20px;
        width: 100%;
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
    					        echo '<li class="has-sub active">
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
							<h4 class="m-t-10 m-b-10">Campaigns</h4>
							<?php
								if ($settings["mailchimp_key"] == ""){
									echo '<button id="syncMailChimpBtn" class="btn btn-white btn-sm" onClick="showSyncMailchimpDIV()">Sync with MailChimp</button>';
									echo '<button id="desyncMailChimpBtn" class="btn btn-white btn-sm hide" onClick="desyncMailchimp()">Stop MailChimp sync</button>';
									echo '<button id="resyncMailChimpBtn" class="btn btn-white btn-sm m-r-15 hide" onClick="syncMailchimp()">Resync with MailChimp</button>';
								}else{
									echo '<button id="syncMailChimpBtn" class="btn btn-white btn-sm hide" onClick="showSyncMailchimpDIV()">Sync with MailChimp</button>';
									echo '<button id="desyncMailChimpBtn" class="btn btn-white btn-sm" onClick="desyncMailchimp()">Stop MailChimp sync</button>';
									echo '<button id="resyncMailChimpBtn" class="btn btn-white btn-sm m-r-15" onClick="syncMailchimp()">Resync with MailChimp</button>';
								}
							?>
						</div>
						<!-- END profile-header-info -->
					</div>
					<!-- END profile-header-content -->
					<!-- BEGIN profile-header-tab -->
					<ul class="profile-header-tab nav nav-tabs">
						<li class="nav-item active"><a href="#mailing-overview" class="nav-link" data-toggle="tab">OVERVIEW</a></li>
						<li class="nav-item"><a href="#mailing-campaigns" class="nav-link" data-toggle="tab">CAMPAIGNS</a></li>
						<li class="nav-item"><a href="#mailing-lists" class="nav-link" data-toggle="tab">LISTS</a></li>
					</ul>
					<!-- END profile-header-tab -->
				</div>
			</div>
			<!-- end profile -->
            <div class="profile-content">
                    <div class="tab-content">
                        <div class="tab-pane fade in active" id="mailing-overview">
                            <div class="row">
                                <div class="col-md-12">
                                    <h4>Recent activity</h4>
                                </div>
                                <div class="col-md-4">
                                    <ul class="collapsible" data-collapsible="expandable">
                                        <li class="">
                                          <div id="recentlySentCampaignsHeader" class="collapsible-header active"><i class="far fa-envelope-open text-success"></i>&nbsp;Recently sent campaigns</div>
                                          <div class="collapsible-body">
                                              <div id="recentlySentCampaignsList">No sent campaigns.</div>
                                          </div>
                                        </li>
                                    </ul>
                                </div>
                                <div class="col-md-4">
                                    <ul class="collapsible" data-collapsible="expandable">
                                        <li>
                                          <div id="recentlyCreatedCampaignsHeader" class="collapsible-header active"><i class="far fa-paper-plane text-primary"></i>&nbsp;Newly created campaigns</div>
                                          <div class="collapsible-body">
                                              <div id="recentlyCreatedCampaignsList">No created campaigns.</div>
                                          </div>
                                        </li>
                                    </ul>
                                </div>
                                <div class="col-md-4">
                                    <ul class="collapsible" data-collapsible="expandable">
                                        <li>
                                           <div id="recentlyCreatedListsHeader" class="collapsible-header active"><i class="fas fa-list-ul text-success"></i>&nbsp;Newly created lists</div>
                                           <div class="collapsible-body">
                                              <div id="recentlyCreatedListsList">No created lists.</div>
                                          </div> 
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="mailing-campaigns">
                            <div class="row" id="campaignListContainer">
                                <div class="col-md-12">
                                            <div class="wrapper bg-silver-lighter">
                                                <input id="campaignSearchInput" class="search-input-gray m-r-15 " type="text" placeholder="Search campaigns..." onkeydown="filterCampaignList()">
                                                <button class="btn btn-sm btn-primary" onClick="showEmailCampaignDIV()">New e-mail campaign</button>
                                                <button class="btn btn-sm btn-primary" onClick="showSMSCampaignDIV()">New SMS campaign</button>
                                                <button class="btn btn-sm btn-success" data-toggle="tooltip" data-placement="top" data-title="Refresh" data-original-title="" title="" onClick="getCampaigns()"><i class="fa fa-sync" ></i></button>
                                                <div class="btn-group pull-right">
                                                    <button class="btn btn-sm btn-danger hide" data-campaign-action="delete"><i class="fa fa-trash m-r-3"></i> <span class="hidden-xs">Delete</span></button>
                                                </div>
                                            </div>
                                            <ul id="campaignList" class="list-group list-group-lg no-radius list-email">
                                                
                                            </ul>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="mailing-lists">
                            <div class="row">
                                <div class="col-md-12">
                                        <div class="wrapper bg-silver-lighter">
                                                <input id="subscriberSearchInput" class="search-input-gray m-r-15 " type="text" placeholder="Search lists..." onkeydown="filterSubscriberList()">
                                                <button class="btn btn-sm btn-primary" onClick="showEmailListDIV()">New e-mail list</button>
                                                <button class="btn btn-sm btn-primary" onClick="showSMSListDIV()">New SMS list</button>
                                                <button class="btn btn-sm btn-success" data-toggle="tooltip" data-placement="top" data-title="Refresh" data-original-title="" title="" onClick="getLists()"><i class="fa fa-sync" ></i></button>
                                                <div class="btn-group pull-right">
                                                    <button class="btn btn-sm btn-danger hide" data-list-action="delete"><i class="fa fa-trash m-r-3"></i> <span class="hidden-xs">Delete</span></button>
                                                </div>
                                        </div>
                                        <ul id="subscriberList" class="list-group list-email">
                                            
                                        </ul>
                                </div>
                            </div>
                        </div>
                    </div>
			</div>
		</div>
		<div class="popupContainer" id="campaignPopup" hidden>
            <div class="panel panel-primary" id="addEmailCampaignDIV" hidden>
                <div class="panel-heading">
                    <div class="panel-heading-btn">
                        <button onclick="hideEmailCampaignDIV()" class="btn btn-xs btn-icon btn-circle btn-default"><i class="fa fa-times"></i>
                        </button>
                    </div>
                    <h4 class="panel-title">New e-mail campaign</h4>
                </div>
                <div class="panel-body">
                    <form id="addEmailCampaignForm" action="campaign/add" method="post" class="form-horizontal" enctype="multipart/form-data">
                        <input type="hidden" name="workgroup_id" id="hiddenEmailCampaignIDInput" />
                        <div class="form-group">
                            <div class="col-md-6">
                                <label>Campaign name:</label>
                                <input type="text" class="form-control" name="campaign_name" placeholder="Campaign name" required>
                                <input type="hidden" name="campaign_type" value="0">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-6">
                                <label>E-mail subject:</label>
                                <input type="text" class="form-control" name="campaign_subject" placeholder="E-mail subject" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-12">
                                <textarea id="emailContentsArea" class="form-control" name="campaign_content" placeholder="Enter e-mail contents here" rows="8"></textarea>
                            </div>
                        </div>
        
                        <div class="form-group">
                            <div class="col-md-6">
                                <label>Sending list:</label>
                                <select id="emailCampaignListSelect" class="form-control" name="campaign_list">
                                    <option value=""></option>
                                </select>
                            </div>
                        </div>
                        <button class="btn material primary">Create campaign</button>
                    </form>
                </div>
            </div>
            <div class="panel panel-primary" id="addSMSCampaignDIV" hidden>
                <div class="panel-heading">
                    <div class="panel-heading-btn">
                        <button onclick="hideSMSCampaignDIV()" class="btn btn-xs btn-icon btn-circle btn-default"><i class="fa fa-times"></i>
                        </button>
                    </div>
                    <h4 class="panel-title">New SMS campaign</h4>
                </div>
                <div class="panel-body">
                    <form id="addSMSCampaignForm" action="campaign/add" method="post" class="form-horizontal" enctype="multipart/form-data">
                        <input type="hidden" name="workgroup_id" id="hiddenSMSCampaignIDInput" />
                        <input type="hidden" name="campaign_type" value="1">
                        <div class="form-group">
                            <div class="col-md-6">
                                <label>Campaign name:</label>
                                <input type="text" class="form-control" name="campaign_name" placeholder="Campaign name" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-12">
                                <textarea class="form-control" name="campaign_content" placeholder="Enter contents here" maxlength="255" rows="3"></textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-6">
                                <label>Sending list:</label>
                                <select id="smsCampaignListSelect" class="form-control" name="campaign_list">
                                    <option value=""></option>
                                </select>
                            </div>
                        </div>
                        <button class="btn material primary">Create campaign</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="popupContainer" id="listPopup" hidden>
            <div class="panel panel-primary" id="addEmailListDIV" hidden>
                <div class="panel-heading">
                    <div class="panel-heading-btn">
                        <button onclick="hideEmailListDIV()" class="btn btn-xs btn-icon btn-circle btn-default"><i class="fa fa-times"></i>
                        </button>
                    </div>
                    <h4 class="panel-title">New e-mail list</h4>
                </div>
                <div class="panel-body">
                    <form id="addEmailListForm" action="campaignlist/add" method="post" class="form-horizontal" enctype="multipart/form-data">
                        <input type="hidden" name="workgroup_id" id="hiddenEmailListIDInput" />
                        <input type="hidden" name="list_type" value="0">
                        <div class="form-group">
                            <div class="col-md-8">
                                <label>List name:</label>
                                <input id="addEmailListNameInput" type="text" class="form-control" name="list_name" placeholder="List name" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-6">
                                <label>Default from name:</label>
                                <input id="addEmailListFromNameInput" type="text" class="form-control" name="from_name" placeholder="From name" required >
                            </div>
                            <div class="col-md-6">
                                <label>Default from e-mail:</label>
                                <input id="addEmailListFromEmailInput" type="text" class="form-control" name="from_email" placeholder="From email" required >
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-12">
                                <label>Permission reminder:</label>
                                <input id="addEmailListPermissionReminderInput" type="text" class="form-control" name="permission_reminder" placeholder="Permission reminder" required >
                            </div>
                        </div>
                        <button class="btn material primary">Create list</button>
                    </form>
                </div>
            </div>
            <div class="panel panel-primary" id="addSMSListDIV" hidden>
                <div class="panel-heading">
                    <div class="panel-heading-btn">
                        <button onclick="hideSMSListDIV()" class="btn btn-xs btn-icon btn-circle btn-default"><i class="fa fa-times"></i>
                        </button>
                    </div>
                    <h4 class="panel-title">New SMS list</h4>
                </div>
                <div class="panel-body">
                    <form id="addSMSListForm" action="campaignlist/add" method="post" class="form-horizontal" enctype="multipart/form-data">
                        <input type="hidden" name="workgroup_id" id="hiddenSMSListIDInput" />
                        <input type="hidden" name="list_type" value="1">
                        <div class="form-group">
                            <div class="col-md-8">
                                <label>List name:</label>
                                <input id="addSmsListNameInput" type="text" class="form-control" name="list_name" placeholder="List name" required>
                            </div>
                        </div>
                        
                        <button class="btn material primary">Create list</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="popupContainer" id="mailchimpPopup" hidden>
            <div class="panel panel-primary" id="syncMailchimpDIV" hidden>
                <div class="panel-heading">
                    <div class="panel-heading-btn">
                        <button onclick="hideSyncMailchimpDIV()" class="btn btn-xs btn-icon btn-circle btn-default"><i class="fa fa-times"></i>
                        </button>
                    </div>
                    <h4 class="panel-title">Sync with MailChimp</h4>
                </div>
                <div class="panel-body">
                    <form id="syncMailchimpForm" action="mailchimp/sync" method="post" class="form-horizontal">
                        <input type="hidden" name="workgroup_id" id="hiddenSyncMailchimpIDInput" />
                        <div class="form-group">
                            <div class="col-md-12">
                                <label>MailChimp API key:</label>
                                <input type="text" class="form-control m-b-5" name="mailchimp_key" placeholder="Enter your MailChimp key" required>
                                <a target="_blank" href="https://kb.mailchimp.com/integrations/api-integrations/about-api-keys">What's an API key?</a>
                            </div>
                        </div>
                        <button class="btn material primary"><i class="fa fa-sync"></i>&nbsp;Sync with MailChimp</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="popupContainer" id="loadingPopup" hidden>
            <div id="loadingSpinnerDIV">
                <span class="spinner"></span>
                <p class="loadingLabel">Processing...</p>
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
	<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/js/materialize.min.js"></script>
	<!-- ================== END PAGE LEVEL JS ================== -->
	
	<script>
	
	    var loggedEmployee = <?php echo json_encode($_SESSION["id"]); ?>;
	    var days = ['Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'];
	    var months = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];
	    var listArray = [];
	    var campaignArray = [];
	    
	    var firstPageLoad = true;
	    
	    $(document).ready(function() {
			getRecentActions();
			getCampaigns();
			getLists();
			getMenuStatistics(loggedEmployee);
			
			tinymce.init({
                selector: 'textarea#emailContentsArea',
                menubar: false,
                min_height: 400,
                plugins: 'image code',
                image_title: true,
                automatic_uploads: true,
                images_upload_url: 'campaign/uploadImage',
                images_upload_base_path: "<?= DIR_URL ?>",
                file_picker_types: 'image',
                convert_urls: false,
                file_picker_callback: function(cb, value, meta) {
                    var input = document.createElement('input');
                    input.setAttribute('type', 'file');
                    input.setAttribute('accept', 'image/*');
        
                    input.onchange = function() {
                        var file = this.files[0];
                        var id = 'blobid' + (new Date()).getTime();
                        var blobCache = tinymce.activeEditor.editorUpload.blobCache;
                        var blobInfo = blobCache.create(id, file);
                        blobCache.add(blobInfo);
                        cb(blobInfo.blobUri(), {
                            title: file.name
                        });
                    };
                    input.click();
                },
                setup: function (editor) {
                    editor.on('change', function () {
                        editor.save();
                    });
                }
            });
			
			$('#syncMailchimpForm').on('submit', function(e) { //use on if jQuery 1.7+
			    e.preventDefault();
                    $.ajax({
                        type: "POST",
                        url: "mailchimp/sync",
                        data: $("#syncMailchimpForm").serialize(),
                        success: function(msg) {
                            if (msg == "") {
                                $("#syncMailchimpBtn").addClass("hide");
                                $("#desyncMailchimpBtn, #resyncMailchimpBtn").removeClass("hide");
                                syncMailchimp();
                                hideSyncMailchimpDIV();
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
            
            $('#addEmailCampaignForm').on('submit', function(e) { //use on if jQuery 1.7+
			    e.preventDefault();
			    hideEmailCampaignDIV();
			    showLoadingPopup();
                    $.ajax({
                        type: "POST",
                        url: "campaign/add",
                        data: $("#addEmailCampaignForm").serialize(),
                        success: function(msg) {
                            if (msg == "") {
                                swal(
                                    'Success',
                                    'Campaign was successfully added.',
                                    'success'
                                );
                                $("#addEmailCampaignForm")[0].reset();
                                getCampaigns();
                                hideLoadingPopup();
                            } else {
                                swal(
                                    'Error!',
                                    'The server encountered the following error: ' + msg,
                                    'error'
                                );
                                hideLoadingPopup();
                            }
                        }
                    });
            });
            
            $('#addSMSCampaignForm').on('submit', function(e) { //use on if jQuery 1.7+
			    e.preventDefault();
                    $.ajax({
                        type: "POST",
                        url: "campaign/add",
                        data: $("#addSMSCampaignForm").serialize(),
                        success: function(msg) {
                            if (msg == "") {
                                swal(
                                    'Success',
                                    'Campaign was successfully added.',
                                    'success'
                                );
                                $("#addSMSCampaignForm")[0].reset();
                                getCampaigns();
                                hideSMSCampaignDIV();
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
            
            $('#addEmailListForm').on('submit', function(e) { //use on if jQuery 1.7+
			    e.preventDefault();
			    hideEmailListDIV();
			    showLoadingPopup();
			    var postData = { "list_name": $("#addEmailListNameInput").val(), "from_name": $("#addEmailListFromNameInput").val(), "from_email": $("#addEmailListFromEmailInput").val(), "permission_reminder": $("#addEmailListPermissionReminderInput").val(), "list_type": 0, "workgroup_id": null };
                    $.ajax({
                        type: "POST",
                        url: "campaignlist/add",
                        data: postData,
                        success: function(msg) {
                            if (msg == "") {
                                swal(
                                    'Success',
                                    'List was successfully added.',
                                    'success'
                                );
                                $("#addEmailListForm")[0].reset();
                                getLists();
                                hideLoadingPopup();
                            } else {
                                swal(
                                    'Error!',
                                    'The server encountered the following error: ' + msg,
                                    'error'
                                );
                                hideLoadingPopup();
                            }
                        }
                    });
            });
            
            $('#addSMSListForm').on('submit', function(e) { //use on if jQuery 1.7+
			    e.preventDefault();
			    
			    var postData = { "list_name": $("#addSmsListNameInput").val(), "list_type": 1, "workgroup_id": null };
                    $.ajax({
                        type: "POST",
                        url: "campaignlist/add",
                        data: postData,
                        success: function(msg) {
                            if (msg == "") {
                                swal(
                                    'Success',
                                    'List was successfully added.',
                                    'success'
                                );
                                $("#addSMSListForm")[0].reset();
                                getLists();
                                hideSMSListDIV();
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
            
            $('#subscriberList').on('click', 'li .email-info', function () {
               window.open("<?= BASE_URL ?>" + "campaignlist/details?list_id=" + listArray[$(this).parent("li").index()].list_id);
            });
            
            $('#campaignList').on('click', 'li .email-info', function () {
               window.open("<?= BASE_URL ?>" + "campaign/details?campaign_id=" + campaignArray[$(this).parent("li").index()].campaign_id);
            });
            
            $("[data-checked=campaign-checkbox]").live("click", function() {
                var e = $(this).closest("label");
                var t = $(this).closest("li");
                if ($(this).prop("checked")) {
                    $(e).addClass("active");
                    $(t).addClass("selected")
                } else {
                    $(e).removeClass("active");
                    $(t).removeClass("selected")
                }
                handleCampaignActionButtonStatus();
            });
        
            $("[data-campaign-action]").live("click", function() {
                var e = "[data-checked=campaign-checkbox]:checked";
                if ($(e).length !== 0) {
                    $(e).closest("li").slideToggle(function() {
                        var indexOfLi = $(this).index();
                        var campaign_id = campaignArray[indexOfLi].campaign_id;
                        removeCampaign(campaign_id);
                        campaignArray.splice(indexOfLi, 1);
                        $(this).remove();
                        handleCampaignActionButtonStatus();
                    })
                }
            });
            
            $("[data-checked=list-checkbox]").live("click", function() {
                var e = $(this).closest("label");
                var t = $(this).closest("li");
                if ($(this).prop("checked")) {
                    $(e).addClass("active");
                    $(t).addClass("selected")
                } else {
                    $(e).removeClass("active");
                    $(t).removeClass("selected")
                }
                handleListActionButtonStatus();
            });
        
            $("[data-list-action]").live("click", function() {
                var e = "[data-checked=list-checkbox]:checked";
                if ($(e).length !== 0) {
                    $(e).closest("li").slideToggle(function() {
                        var indexOfLi = $(this).index();
                        var list_id = listArray[indexOfLi].list_id;
                        removeList(list_id);
                        listArray.splice(indexOfLi, 1);
                        $(this).remove();
                        handleListActionButtonStatus();
                    });
                }
            });
            
	    });
	    
	    function filterCampaignList(){
		    var searchQ = $("#campaignSearchInput").val().toLowerCase();
		    $('#campaignList li').each(function(i){
                if ($(this).html().toLowerCase().includes(searchQ)){
                    $(this).show();
                }else{
                    $(this).hide();
                }
            });
		}
		
		function filterSubscriberList(){
		    var searchQ = $("#subscriberSearchInput").val().toLowerCase();
		    $('#subscriberList li').each(function(i){
                if ($(this).html().toLowerCase().includes(searchQ)){
                    $(this).show();
                }else{
                    $(this).hide();
                }
            });
		}
		
		function handleCampaignActionButtonStatus() {
            if ($("[data-checked=campaign-checkbox]:checked").length !== 0) {
                $("[data-campaign-action]").removeClass("hide")
            } else {
                $("[data-campaign-action]").addClass("hide")
            }
        };
        
        function handleListActionButtonStatus() {
            if ($("[data-checked=list-checkbox]:checked").length !== 0) {
                $("[data-list-action]").removeClass("hide")
            } else {
                $("[data-list-action]").addClass("hide")
            }
        };
	    
	    function getCampaigns(){
            var postData = { workgroup_id: null };
            $.ajax({
                type: "POST",
                url: "<?= BASE_URL ?>" + "campaign/get",
                data: postData,
                dataType: "json",
                success: function(campaigns) {
                    campaignArray = campaigns;
                    var campaignContent = "";
                    for (var i = 0; i < campaigns.length; i++){
                        var campaign = campaigns[i];
                        var campaignType = '<i class="ion-android-mail text-white"></i>';
                        if (campaign.campaign_type == 1){
                            campaignType = '<i class="ion-android-textsms text-white"></i>';
                        }
                        var statusLine;
                        var campaignStatusColor;
                        var campaignIcon;
                        if (campaign.status == 0){ //pending
                            var mDate = new Date(campaign.created_on);
                            campaignStatusColor = "danger";
                            campaignIcon = "fa fa-times-circle email-list-icon text-danger";
                            mDate = days[mDate.getDay()] + ", " + mDate.getDate() + ". " + months[mDate.getMonth()] + " @ " + ("0" + mDate.getHours()).slice(-2) + ":" + ("0" + mDate.getMinutes()).slice(-2);
                            statusLine = "Created <strong>" + mDate + "</strong>";
                        }else{
                            var mDate = new Date(campaign.send_time);
                            campaignStatusColor = "success";
                            campaignIcon = "fa fa-check-circle email-list-icon text-success";
                            mDate = days[mDate.getDay()] + ", " + mDate.getDate() + ". " + months[mDate.getMonth()] + " @ " + ("0" + mDate.getHours()).slice(-2) + ":" + ("0" + mDate.getMinutes()).slice(-2);
                            statusLine = "Sent <strong>" + mDate + " </strong>to " + campaign.subscribers.split(";").length + " recipients";
                        }
                        
                        campaignContent += '<li class="list-group-item unread">' +
                                                '<div class="email-checkbox"><label><i class="far fa-square"></i><input type="checkbox" data-checked="campaign-checkbox"></label></div>' +
												'<div class="email-user m-r-10 bg-' + campaignStatusColor + '">' +
												    campaignType + 
												'</div>' +
												'<div class="email-info">' +
													'<div>' +
														'<span class="email-time">' + moment(campaign.created_on).format("ddd, Do MMM") + '</span>' +
														'<span class="email-title">' + campaign.campaign_name  + '</span>' +
														'<span class="email-desc">' + campaign.list_name + '<b>	&#183; </b>' + statusLine + '</span>' +
													'</div>' +
												'</div>' +
											'</li>';
                    }
                    
                    $("#campaignList").html(campaignContent);
                    if (firstPageLoad){
                        App.init();
                        firstPageLoad = false;
                    }
                }
            });
        }
        
        function getLists(){
            var postData = { workgroup_id: null };
            $.ajax({
                type: "POST",
                url: "<?= BASE_URL ?>" + "campaignlist/get",
                data: postData,
                dataType: "json",
                success: function(lists) {
                    listArray = lists;
                    $("#emailCampaignListSelect, #smsCampaignListSelect").html("");
                    $("#emailCampaignListSelect, #smsCampaignListSelect").append($('<option>', {
                                    value: "",
                                    text: ""
                    }));
                    var subscriberContent = "";
                    for (var i = 0; i < lists.length; i++){
                        if (lists[i].list_type == 0){ //email list
                            $("#emailCampaignListSelect").append($('<option>', {
                                    value: lists[i].list_id,
                                    text: lists[i].list_name
                            }));
                        }else{
                            $("#smsCampaignListSelect").append($('<option>', {
                                    value: lists[i].list_id,
                                    text: lists[i].list_name
                            }));
                        }
                        var mDate = new Date(lists[i].created_on);
                        mDate = days[mDate.getDay()] + ", " + mDate.getDate() + ". " + months[mDate.getMonth()] + " @ " + ("0" + mDate.getHours()).slice(-2) + ":" + ("0" + mDate.getMinutes()).slice(-2);
                        var statusLine = "Created <strong>" + mDate + "</strong>";
                        var listType = "E-mail";
                        if (lists[i].list_type == 1){
                            listType = "SMS";
                        }
                        var nrOfSubs = 0;
                        if (lists[i].subscribers != ""){
                            nrOfSubs = lists[i].subscribers.split(";").length
                        }
                        subscriberContent += '<li class="list-group-item unread">' +
                                                '<div class="email-checkbox"><label><i class="far fa-square"></i><input type="checkbox" data-checked="list-checkbox"></label></div>' +
												'<div class="email-user m-r-10 bg-blue">' +
												    '<i class="ion-android-share-alt text-white"></i>' + 
												'</div>' +
												'<div class="email-info">' +
													'<div>' +
														'<span class="email-time">' + moment(lists[i].created_on).format("ddd, Do MMM") + '</span>' +
														'<span class="email-title">' + lists[i].list_name  + '</span>' +
														'<span class="email-desc">' + listType + "<b> 	&#183; </b><strong>" + nrOfSubs + ' </strong>Subscribers</span>' +
													'</div>' +
												'</div>' +
											'</li>';
                                             
                                            
                    }
                    $("#subscriberList").html(subscriberContent);
                }
            });
        }
        
        function getRecentActions(){
            var postData = { workgroup_id: null };
            $.ajax({
                type: "POST",
                url: "<?= BASE_URL ?>" + "campaign/overview",
                data: postData,
                dataType: "json",
                success: function(overview) {
                    console.log(overview);
                    var recentlySentCampaigns = overview.sent_campaigns;
                    var recentlyCreatedCampaigns = overview.created_campaigns;
                    var recentlyCreatedLists = overview.created_lists;
                    var recentlyCreatedCampaignContent = "";
                    var recentlySentCampaignContent = "";
                    var recentlyCreatedListContent = "";
                    for (var i = 0; i < recentlyCreatedCampaigns.length; i++){
                        var campaign = recentlyCreatedCampaigns[i];
                        var mDate = new Date(campaign.created_on);
                        mDate = days[mDate.getDay()] + ", " + mDate.getDate() + ". " + months[mDate.getMonth()] + " @ " + ("0" + mDate.getHours()).slice(-2) + ":" + ("0" + mDate.getMinutes()).slice(-2);
                        recentlyCreatedCampaignContent += '<div class="task-item p-15 m-b-15 bg-primary" ><strong class="f-s-14">' + campaign.campaign_name + '</strong><p class="m-0">' + mDate + '</p></div>';
                    }
                    for (var i = 0; i < recentlySentCampaigns.length; i++){
                        var campaign = recentlySentCampaigns[i];
                        var mDate = new Date(campaign.send_time);
                        mDate = days[mDate.getDay()] + ", " + mDate.getDate() + ". " + months[mDate.getMonth()] + " @ " + ("0" + mDate.getHours()).slice(-2) + ":" + ("0" + mDate.getMinutes()).slice(-2);
                        recentlySentCampaignContent += '<div class="task-item p-15 m-b-15 bg-primary" ><strong class="f-s-14">' + campaign.campaign_name + '</strong><p class="m-0">' + mDate + '</p></div>';
                    }
                    for (var i = 0; i < recentlyCreatedLists.length; i++){
                        var list = recentlyCreatedLists[i];
                        var mDate = new Date(list.created_on);
                        mDate = days[mDate.getDay()] + ", " + mDate.getDate() + ". " + months[mDate.getMonth()] + " @ " + ("0" + mDate.getHours()).slice(-2) + ":" + ("0" + mDate.getMinutes()).slice(-2);
                        recentlyCreatedListContent += '<div class="task-item p-15 m-b-15 bg-primary" ><strong class="f-s-14">' + list.list_name + '</strong><p class="m-0">' + mDate + '</p></div>';
                    }
                    if (recentlyCreatedCampaignContent != "") {
						$("#recentlyCreatedCampaignsList").html(recentlyCreatedCampaignContent);
					}
					if (recentlySentCampaignContent != "") {
						$("#recentlySentCampaignsList").html(recentlySentCampaignContent);
					}
					if (recentlyCreatedListContent) {
						$("#recentlyCreatedListsList").html(recentlyCreatedListContent);
					}
                }
            });
        }
        
        function desyncMailchimp(){
		    swal({
              title: 'Desync MailChimp',
              text: "Are you sure you want to desync MailChimp?",
              type: 'warning',
              showCancelButton: true,
              confirmButtonColor: '#3085d6',
              cancelButtonColor: '#d33',
              confirmButtonText: 'Yes, desync'
            }).then(function () {
    		     var postData = { workgroup_id: null };
    		     $.ajax({
                        type: "POST",
                        url: "<?= BASE_URL ?>" + "mailchimp/desync",
                        data: postData,
                        success: function(msg) {
                            if (msg == "") {
                                swal(
                                    'Success',
                                    'MailChimp desync successful.',
                                    'success'
                                );
                                $("#syncMailchimpBtn").removeClass("hide");
                                $("#desyncMailchimpBtn, #resyncMailchimpBtn").addClass("hide");
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
		
		function syncMailchimp(){
		     //retrieves lists and campaigns from MailChimp
		     showLoadingPopup();
		     var postData = { workgroup_id: null };
		     $.ajax({
                    type: "POST",
                    url: "<?= BASE_URL ?>" + "campaign/mailchimp",
                    data: postData,
                    success: function(msg) {
                        if (msg == "") {
                            swal(
                                'Success',
                                'MailChimp sync successful.',
                                'success'
                            );
                            getLists();
                            getCampaigns();
                            hideLoadingPopup();
                        } else {
                            swal(
                                'Error!',
                                'The server encountered the following error: ' + msg,
                                'error'
                            );
                            hideLoadingPopup();
                        }
                    }
            });
		}
		
		function showLoadingPopup(){
		    $("#loadingPopup").show();
		}
		
		function hideLoadingPopup(){
		    $("#loadingPopup").hide();
		}
		
		function showSyncMailchimpDIV(){
		    $("#mailchimpPopup, #syncMailchimpDIV").show();
		}
		
		function hideSyncMailchimpDIV(){
		    $("#mailchimpPopup, #syncMailchimpDIV").hide();
		}
		
		function showSMSListDIV(){
            $("#listPopup, #addSMSListDIV").show();
        }
        
        function hideSMSListDIV(){
            $("#listPopup, #addSMSListDIV").hide();
        }
        
        function showEmailListDIV(){
            $("#listPopup, #addEmailListDIV").show();
        }
        
        function hideEmailListDIV(){
            $("#listPopup, #addEmailListDIV").hide();
        }
		
		function showEmailCampaignDIV(){
		    $("#campaignPopup, #addEmailCampaignDIV").show();
		}
		
		function hideEmailCampaignDIV(){
		    $("#campaignPopup, #addEmailCampaignDIV").hide();
		}
		
		function showSMSCampaignDIV(){
		    $("#campaignPopup, #addSMSCampaignDIV").show();
		}
		
		function hideSMSCampaignDIV(){
		    $("#campaignPopup, #addSMSCampaignDIV").hide();
		}
		
		function removeList(list_id){
            var postData = { list_id: list_id };
            $.ajax({
                type: "POST",
                url: "<?= BASE_URL ?>" + "campaignlist/delete",
                data: postData,
                success: function(response) {
                    if (response == ""){
                        console.log("List removed");
                    }else{
                        swal(
                            'Error',
                            'The server ran into the following error : ' + response,
                            'error'
                        );
                    }
                }
            });
        }
        
        function removeCampaign(campaign_id){
            var postData = { campaign_id: campaign_id };
            console.log(postData);
            $.ajax({
                type: "POST",
                url: "<?= BASE_URL ?>" + "campaign/delete",
                data: postData,
                success: function(response) {
                    if (response == ""){
                        console.log("Campaign removed");
                    }else{
                        swal(
                            'Error',
                            'The server ran into the following error : ' + response,
                            'error'
                        );
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
	    
	</script>
</body>
</html>
