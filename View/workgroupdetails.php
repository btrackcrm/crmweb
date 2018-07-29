<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
<!--<![endif]-->
<head><meta http-equiv="Content-Type" content="text/html; charset=gb18030">
	
	<title>Workgroup</title>
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
    <link href="<?= ASSETS_URL . "fullcalendar/fullcalendar.print.css" ?>" rel="stylesheet" media="print" />
	<link href="<?= ASSETS_URL . "fullcalendar/fullcalendar.min.css" ?>" rel="stylesheet" />
	<link rel="stylesheet" href="<?= ASSETS_URL . "jkanban/dist/jkanban.min.css" ?>" />
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dragula/3.7.2/dragula.min.css" />
	<link href="<?= ASSETS_URL . "jstree/dist/themes/default/style.min.css" ?>" rel="stylesheet" />
	<link href="<?= ASSETS_URL . "dropzone/min/dropzone.min.css" ?>" rel="stylesheet" />
	<link href="<?= ASSETS_URL . "scheduler/css/timelineScheduler.css" ?>" rel="stylesheet" />
	<link href="<?= ASSETS_URL . "scheduler/css/timelineScheduler.styling.css" ?>" rel="stylesheet" />
	<link href="<?= ASSETS_URL . "scheduler/css/calendar.css" ?>" rel="stylesheet" />
	<link href="<?= ASSETS_URL . "jquery-tag-it/css/jquery.tagit.css" ?>" rel="stylesheet" />
	<link href="<?= ASSETS_URL . "select2/dist/css/select2.css" ?>" rel="stylesheet" />
	<link href="<?= ASSETS_URL . "jquery-file-upload/css/jquery.fileupload.css" ?>" rel="stylesheet" />
	<link href="<?= ASSETS_URL . "jquery-file-upload/css/jquery.fileupload-ui.css" ?>" rel="stylesheet" />
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
    
    
    #addTaskDIV, #editTaskDIV, #editDescriptionDIV, #uploadFileDIV, #editModeratorDIV, #inviteDIV, #addSMSCampaignDIV, #addEmailListDIV, #addSMSListDIV, #syncMailchimpDIV, #desyncMailchimpDIV, #viewTaskDIV, #taskNoteDIV, #mapDIV{
        width: 840px;
        height: auto;
        position: relative;
        margin: 70px auto 0px auto;
    }
	
	#viewTaskDIV{
        width: 500px;
        height: auto;
		background-color: #fff;
        margin: 100px auto 0px auto;
		-webkit-box-shadow: 0 24px 38px 3px rgba(0,0,0,0.14), 0 9px 46px 8px rgba(0,0,0,0.12), 0 11px 15px -7px rgba(0,0,0,0.2);
		box-shadow: 0 24px 38px 3px rgba(0,0,0,0.14), 0 9px 46px 8px rgba(0,0,0,0.12), 0 11px 15px -7px rgba(0,0,0,0.2);
    }
	
	.view-task-header{
		flex: none;
		height: 128px;
		overflow: visible;
		position: relative;
		background-color: #4285F4;
	}
	
	.view-task-actions{
		height: 70px;
		padding: 5px;
	}
	
	.view-task-subject{
		font-size: 20px;
		line-height: 26px;
		color: #fff;
		padding: 0 32px 0 64px;
	}
	
	.view-task-body{
		max-height: 450px;
		overflow-y: auto;
	}
	
	.btn-trans{
		background-color: transparent;
	}
	
	.btn-trans:hover{
		background-color: rgba(255,255,255,0.122)
	}
	
	.btn-status{
		background-color: transparent;
		padding: 0px 12px;
		float: right;
	}
	
	.btn-edit{
		position: absolute;
		bottom: -15px;
		left: 15px;
		width: 40px;
		height: 40px;
		background-color: #4285F4 !important;
		-webkit-box-shadow: 0 6px 10px 0 rgba(0,0,0,0.14), 0 1px 18px 0 rgba(0,0,0,0.12), 0 3px 5px -1px rgba(0,0,0,0.2);
		box-shadow: 0 6px 10px 0 rgba(0,0,0,0.14), 0 1px 18px 0 rgba(0,0,0,0.12), 0 3px 5px -1px rgba(0,0,0,0.2);
	}
    
    #map{
        width: 100%;
        height: 500px;
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
		webkit-box-shadow: 0 2px 2px 0 rgba(0,0,0,0.14), 0 1px 5px 0 rgba(0,0,0,0.12), 0 3px 1px -2px rgba(0,0,0,0.2);
		box-shadow: 0 2px 2px 0 rgba(0,0,0,0.14), 0 1px 5px 0 rgba(0,0,0,0.12), 0 3px 1px -2px rgba(0,0,0,0.2);
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
        font-size: 13px;
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
        background: #535c6a url(/assets/img/user-default-avatar.svg) no-repeat center;
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
        background: #535c6a url(/assets/img/user-default-avatar.svg) no-repeat center;
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
        background: #535c6a url(/assets/img/user-default-avatar.svg) no-repeat center;
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
    
    #taskTable{
        width: 100% !important;
    }
    
    
    
    .input-search{
        width: 300px;
        position: relative;
        padding: 0 15px 0 15px;
        height: 36px;
        border: 0;
        border-radius: 2px;
        font-size: 14px;
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
        font-size: 14px;
        color: #545c6a;
        padding: 4px 0px 4px 0px;
    }
    
    .view-switcher li a:hover, .view-switcher li a:active, .view-switcher li a:focus, .view-switcher li a:visited{
        text-decoration: none;
    }

    .view-switcher{
        margin: 0 18px 0 0;
        font-size: 14px;
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
        background-color: #ff5b57;
        color: white;
    }
    
    div[data-id="workingBoard"] .kanban-item{
        background-color: #348fe2;
        color: white;
    }
    
    div[data-id="doneBoard"] .kanban-item{
        background-color: #00acac;
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
        font-size: 14px;
        -webkit-transition: background .3s;
        transition: background .3s;
        -webkit-box-sizing: border-box;
        box-sizing: border-box;
        outline: 0;
        z-index: 1;
        background-color: #eee;
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
    
    .list-group-item:hover{
        cursor: pointer;
        background-color: #eee;
    }
    
    
    
    .list-group li:hover .email-checkbox label{
        color: #222;
    }
    
	.profile-header .profile-header-tab {
		padding: 0 0 0 10px;
	}
    
    
    .text-black{
        color: #484848;
    }
    
    .hover-underline:hover{
        cursor: pointer;
        text-decoration: underline;
    }
    
    .email-list-icon{
        position: absolute;
        right: 15px;
        top: 25px;
        font-size: 50px;
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
			<!-- begin profile -->
			<div class="profile">
				<div class="profile-header">
					<!-- BEGIN profile-header-cover -->
					<div class="profile-header-cover"></div>
					<!-- END profile-header-cover -->
					<!-- BEGIN profile-header-content -->
					<div class="profile-header-content">
						
						<!-- BEGIN profile-header-info -->
						<div class="profile-header-info">
							<h4 class="m-t-10 m-b-5"><?php echo $workgroup["name"] ?></h4>
							<p class="m-b-10"><?php echo (count($employees)) . " members"; ?></p>
							 
						</div>
						<!-- END profile-header-info -->
					</div>
					<!-- END profile-header-content -->
					<!-- BEGIN profile-header-tab -->
					<ul class="profile-header-tab nav nav-tabs">
						<li class="nav-item active"><a href="#general-view" class="nav-link" data-toggle="tab">GENERAL</a></li>
						<li class="nav-item"><a href="#task-view" class="nav-link" data-toggle="tab">TASKS</a></li>
						<li class="nav-item"><a href="#file-view" class="nav-link" data-toggle="tab">FILES</a></li>
						<li class="nav-item"><a href="#mailing-view" class="nav-link" data-toggle="tab">CAMPAIGNS</a></li>
						<li class="nav-item"><a href="#history-view" class="nav-link" data-toggle="tab">HISTORY</a></li>
						<?php
							if ($owner["employee_id"] == $_SESSION["id"]){
								echo '<li class="nav-item"><a href="#settings-view" class="nav-link" data-toggle="tab">SETTINGS</a></li>';
							}
						?>
					</ul>
					<!-- END profile-header-tab -->
				</div>
			</div>
			<!-- end profile -->
            <div class="profile-content">
            <div class="tab-content p-0">
                <div class="tab-pane fade in active" id="general-view">
                    <div class="row">     
							<div class="col-md-4">
									<div class="whiteBG">
										<h4><?php echo $workgroup["name"]; ?><br><small>Workgroup overview</small></h4>
										<h5 class="group-title">Owner</h5>
										<div id="ownerDIV">
										
										</div>
										<table cellspacing="0" class="table-fullwidth">
											<tbody>
												<tr class="tbl-row">
													<td class="tbl-column-left">Created on:</td>
													<td class="tbl-column-right">
														<?php echo (date("l, d. F Y", strtotime($workgroup["created_on"]))); ?> </td>
												</tr>
												<tr class="tbl-row">
													<td class="tbl-column-left">Members:</td>
													<td class="tbl-column-right"><?php echo (count($employees)); ?></td>
												</tr>
												<tr class="tbl-row">
													<td class="tbl-column-left">Group Type:</td>
													<td class="tbl-column-right">Private Workgroup </td>
												</tr>
											</tbody>
										</table>
										<h5 class="group-title">Description<span class="pull-right pointer blue" onClick="showEditDescriptionPopup()">Edit description</span></h5>
										<p class="bottom25" id="workgroupDescriptionInput"><?php echo ($workgroup["description"]); ?></p>
										<h5 class="group-title">Moderators<span class="pull-right pointer blue" onClick="showEditModeratorPopup()">Edit moderators</span></h5>
										<div id="moderatorsDIV">
											
										</div>
										<div style="clear: both" class="bottom25"></div>
										<h5 class="group-title">Members <span class="pull-right pointer blue" onClick="showInvitePopup()">Invite to group</span></h5>
										<div id="membersDIV">
											
										</div>
										<div style="clear: both"></div>
										<?php 
										if ($owner["employee_id"] != $_SESSION["id"]){
											echo '<div class="m-t-25">
												<button class="btn btn-white btn-block" onClick="leaveWorkgroup()"><i class="fas fa-sign-out-alt text-danger"></i> Leave workgroup</button>
											 </div>';
										}
										?>
									</div>
							</div>
							<div class="col-md-4">
								<!-- begin widget-chat -->
								<div class="widget-chat widget-chat-rounded">
								  <!-- begin widget-chat-header -->
								  <div class="widget-chat-header">
									
									<div class="widget-chat-header-content">
									  <h4 class="widget-chat-header-title">Workgroup chat</h4>
									  <p class="widget-chat-header-desc"><span id="nrOfMessages"></span> messages</p>
									</div>
								  </div>
								  <!-- end widget-chat-header -->
								  
								  <!-- begin widget-chat-body -->
								  
								  <div class="widget-chat-body" data-scrollbar="true" data-height="450px">
										<div id="chatList" class="height-md">
											
										</div>
								  </div>
								  <!-- end widget-chat-body -->
								  
								  <!-- begin widget-input -->
								  <div class="widget-input widget-input-rounded">
									<form id="postMessageForm" action="chat/addMessage" method="post">
									  <div class="widget-input-container p-l-10">
										<div class="widget-input-box">
										  <input id="messageContentInput" type="text" class="form-control form-control-sm" name="content" placeholder="Write a message..." />
										</div>
										<div class="widget-input-icon"><button class="btn btn-link text-grey"><i class="fas fa-comment-alt"></i></button></div>
									  </div>
									</form>
								  </div>
								  <!-- end widget-input -->
								</div>
								<!-- end widget-chat -->
							</div>
							<div class="col-md-4">
									<ul class="collapsible" data-collapsible="expandable">
										<li>
										  <div id="todaysTasksHeader" class="collapsible-header active"><i class="fas fa-fire text-danger"></i>&nbsp;Today</div>
										  <div class="collapsible-body">
											  <div id="todaysTasksList">
													
											  </div>
										  </div>
										</li>
										<li>
										  <div id="upcomingTasksHeader" class="collapsible-header active"><i class="far fa-calendar-alt text-primary"></i>&nbsp;Upcoming</div>
										  <div class="collapsible-body">
											  <div id="upcomingTasksList">
											
											  </div>
										  </div>
										</li>
									</ul>
							</div>
                        </div>
                </div>
                <div class="tab-pane fade" id="task-view">
                    <ul class="nav nav-pills">
                        <li class="active">
                            <a href="#task-overview" data-toggle="tab" aria-expanded="true">Overview</a>
                        </li>
                        <li>
                            <a href="#task-scheduler" data-toggle="tab" aria-expanded="true">Schedule</a>
                        </li>
                        <li>
                            <a href="#task-calendar" data-toggle="tab" aria-expanded="false">Calendar</a>
                        </li>
                        <li>
                            <a href="#task-kanban" data-toggle="tab" aria-expanded="false">Kanban board</a>
                        </li>
                    </ul>
                    <div class="tab-content">
                        <div id="task-overview" class="tab-pane fade in active">
							<button class="btn btn-primary m-b-10 tp-visible" onClick="showNewTaskPopup(0)">Add a task</button>
                            <div class="panel panel-primary">
                                <div class="panel-heading">
                                    <div class="panel-heading-btn">
                                        <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
                                        <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
                                        <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
                                    </div>
                                    <h4 class="panel-title">Workgroup tasks</h4>
                                </div>
                                <div class="panel-body">
									<div class="m-b-20">
											<div class="radio radio-css radio-inline radio-danger m-t-0">
												<input type="radio" name="hide_finished" id="wxr1" value="0" checked>
												<label for="wxr1">
													Show only incomplete tasks
												</label>
											</div>
											<div class="radio radio-css radio-inline radio-success m-t-0">
												<input type="radio" name="hide_finished" id="wxr2" value="1">
												<label for="wxr2">
													Show all tasks
											</div>
									</div>
									<div style="clear: both;"></div>
                                    <div class="dataTables_wrapper form-inline dt-bootstrap no-footer">
                                        <table id="taskTable" class="table table-striped">
                                            <thead>
                                                <tr>
                                                    <th>
                                                        Subject
                                                    </th>
													<th>
														Priority
													</th>
													<th>
														Customer
													</th>
                                                    <th>
                                                        Assigned to
                                                    </th>
                                                    <th>
                                                        Start date
                                                    </th>
													<th>
														End date
													</th>
                                                    <th>
                                                        Created by
                                                    </th>
                                                    <th>
                                                        Status
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
                        </div>
                        <div id="task-scheduler" class="tab-pane fade">
                            <div class="schedulerContainer whiteBG p-15">
                                
                            </div>
                        </div>
                        <div id="task-calendar" class="tab-pane fade">
                            
                            <div style="clear: both;"></div>
                            <div class="vertical-box-column p-r-30 d-none d-lg-table-cell width230">
                                <div id="external-events" class="fc-event-list">
                                    <div id="calendarFilters">
                                       
                                    </div>
                                    <hr class="bg-grey-lighter m-b-15">
                                    <h5 class="m-t-0 m-b-15">Legend</h5>
                                    <div class="fc-event"><div class="fc-event-icon"><i class="fa fa-circle fa-fw text-danger"></i></div>Incomplete</div>
                                    <div class="fc-event"><div class="fc-event-icon"><i class="fa fa-circle fa-fw text-primary"></i></div>In progress</div>
                                    <div class="fc-event"><div class="fc-event-icon"><i class="fa fa-circle fa-fw text-success"></i></div>Finished</div>
                                </div>
                                <button class="btn material primary m-t-15 btn-block tp-visible" onClick="showNewTaskPopup(0)">New task</button>
                            </div>
                            <div id="calendar" class="vertical-box-column p-15 calendar">
                                
                            </div>
                        </div>
                        <div id="task-kanban" class="tab-pane fade">
                            <div id="kanbanBoard">
                                    
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="file-view">
                    <div class="whiteBG">
                        <h4 class="left15">Workgroup files<button id="treeUploadBtn" class="btn material success hide pull-right" onClick="treeUploadClicked()" >Upload a file</button><button id="treeDeleteBtn" class="btn material danger hide pull-right" onClick="treeDeleteClicked()">Delete file</button><button id="treeDownloadBtn" class="btn material primary hide pull-right m-r-15" onClick="treeDownloadClicked()" >Download file</button><br><small>Tree view</small></h4>
                        <?php
            		            echo '<h4 class="m-l-15 m-t-0 p-t-10">Disk used (' . $disk_free["disk_used"] .' out of 1 GB)</h4>';
            		            $totalSpace = 1000000000;
            		            $disk_used_bytes = $disk_free["disk_bytes"];
            		            $percentUsage = ($disk_used_bytes / $totalSpace ) * 100;
                		        echo '<div class="progress rounded-corner progress-striped m-l-15">
                                          <div class="progress-bar bg-red" style="width: ' . $percentUsage . '%">
                                          </div>
                                        </div>';
            		    ?>
						<input id="fileSearchInput" class="search-input-gray m-l-15 m-b-15" type="text" placeholder="Search workgroup files..." />
                        <div id="folderStructureDIV">
                            
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="mailing-view">
                    <ul class="nav nav-pills">
                        <li class="active">
                            <a href="#mailing-overview" data-toggle="tab" aria-expanded="true">Overview</a>
                        </li>
                        <li>
                            <a href="#mailing-campaigns" data-toggle="tab" aria-expanded="false">Campaigns</a>
                        </li>
                        <li>
                            <a href="#mailing-lists" data-toggle="tab" aria-expanded="false">Lists</a>
                        </li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane fade in active" id="mailing-overview">
                            <div class="row">
                                <div class="col-md-12">
                                    <h4>Recent activity</h4>
									<?php
										if ($workgroup["mailchimp_key"] == ""){
											echo '<button id="syncMailChimpBtn" class="btn material primary m-b-15" onClick="showSyncMailchimpDIV()">Sync with MailChimp</button>';
											echo '<button id="desyncMailChimpBtn" class="btn material danger m-b-15 hide" onClick="desyncMailchimp()">Stop MailChimp sync</button>';
											echo '<button id="resyncMailChimpBtn" class="btn material success m-b-15 hide" onClick="syncMailchimp()">Resync with MailChimp</button>';
										}else{
											echo '<button id="syncMailChimpBtn" class="btn material primary m-b-15 hide" onClick="showSyncMailchimpDIV()">Sync with MailChimp</button>';
											echo '<button id="desyncMailChimpBtn" class="btn material danger m-b-15" onClick="desyncMailchimp()">Stop MailChimp sync</button>';
											echo '<button id="resyncMailChimpBtn" class="btn material success m-b-15" onClick="syncMailchimp()">Resync with MailChimp</button>';
										}
									?>
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
                                                <button class="btn btn-sm btn-primary cp-visible" onClick="showEmailCampaignDIV()">New e-mail campaign</button>
                                                <button class="btn btn-sm btn-primary cp-visible" onClick="showSMSCampaignDIV()">New SMS campaign</button>
                                                <button class="btn btn-sm btn-success" data-toggle="tooltip" data-placement="top" data-title="Refresh" data-original-title="" title="" onClick="getCampaigns()"><i class="fa fa-sync" ></i></button>
                                                <div class="btn-group pull-right cp-visible">
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
                                                <button class="btn btn-sm btn-primary cp-visible" onClick="showEmailListDIV()">New e-mail list</button>
                                                <button class="btn btn-sm btn-primary cp-visible" onClick="showSMSListDIV()">New SMS list</button>
                                                <button class="btn btn-sm btn-success" data-toggle="tooltip" data-placement="top" data-title="Refresh" data-original-title="" title="" onClick="getLists()"><i class="fa fa-sync" ></i></button>
                                                <div class="btn-group pull-right cp-visible">
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
				<div class="tab-pane fade" id="history-view">
					<!-- begin widget-list -->
					<div id="historyList" class="widget-list widget-list-rounded m-b-30">
						<?php 
							foreach ($history as $activity){
								$imgURL = IMG_URL . "user-13.jpg";
								if ($activity["profile_image"] != "") {
									$imgURL = IMG_URL . $activity["profile_image"];
								}
								echo '<div class="widget-list-item">
									<div class="widget-list-media">
									  <img src="' . $imgURL . '" class="rounded" />
									</div>
									<div class="widget-list-content">
									  <h4 class="widget-list-title">' . $activity["employee_name"] . " " . $activity["employee_surname"] . '</h4>
									  <p class="widget-list-desc">' . $activity["description"] . '</p>
									  <p class="widget-list-desc text-primary">' . date("l, d. F Y, H:i", strtotime($activity["created_on"])) . '</p>
									</div>
								  </div>';
							}
						?>
					</div>
					<!-- end widget-list -->
				</div>
                <div class="tab-pane fade" id="settings-view">
                    
                        <div class="col-md-12 whiteBG p-15">
                            <h4>Workgroup settings<br><small>General</small></h4>
                            <form id="workgroupSettingsForm" action="<?= BASE_URL . "workgroup/settings" ?>" method="post" class="form-horizontal">
                                    <input id="hiddenSettingsIDInput" type="hidden" name="workgroup_id" />
                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <label>Workgroup name:</label>
                                            <input id="settingsNameInput" type="text" class="form-control" name="workgroup_name" placeholder="Enter workgroup name" required />
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <label>Users allowed to create and manage tasks:</label>
                                            <select id="settingsTaskSelect" class="form-control" name="workgroup_taskpermissions">
                                                <option value="0">All workgroup members</option>
                                                <option value="1">Owner and moderators</option>
                                                <option value="2">Owner</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <label>Permission to view all tasks:</label>
                                            <select id="settingsViewSelect" class="form-control" name="workgroup_viewpermissions">
                                                <option value="0">All workgroup members</option>
                                                <option value="1">Owner and moderators</option>
                                                <option value="2">Owner</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <label>Reminder time for tasks:</label>
                                            <select id="settingsReminderSelect" class="form-control" name="workgroup_remindertime">
                                                <option value="1">1 hours</option>
                                                <option value="2">2 hours</option>
                                                <option value="3">3 hours</option>
                                                <option value="4">4 hours</option>
                                                <option value="5">5 hours</option>
                                                <option value="6">6 hours</option>
                                                <option value="7">7 hours</option>
                                                <option value="8">8 hours</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <label>Users allowed to create and manage files:</label>
                                            <select id="settingsFileSelect" class="form-control" name="workgroup_filepermissions">
                                                <option value="0">All workgroup members</option>
                                                <option value="1">Owner and moderators</option>
                                                <option value="2">Owner</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <label>Users allowed to create and manage campaigns:</label>
                                            <select id="settingsCampaignSelect" class="form-control" name="workgroup_campaignpermissions">
                                                <option value="0">All workgroup members</option>
                                                <option value="1">Owner and moderators</option>
                                                <option value="2">Owner</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <input type="hidden" name="workgroup_ownernotifications" value="0" />
                                            <input id="settingsNotificationCheckbox" type="checkbox" name="workgroup_ownernotifications" value="1"/> Notify me about pending tasks
                                        </div>
                                    </div>
                                    <button class="btn material success">Save settings</button>
                            </form>
                        </div>
                </div>
            </div>
			</div>
        </div>
        <div class="popupContainer" id="taskPopup" hidden>
            <div class="panel panel-primary" id="addTaskDIV" hidden>
                    <div class="panel-heading">
                        <div class="panel-heading-btn">
                            <button onclick="hideNewTaskPopup()" class="btn btn-xs btn-icon btn-circle btn-default"><i class="fa fa-times"></i>
                            </button>
                        </div>
                        <h4 class="panel-title">Create a task</h4>
                    </div>
                    <div class="panel-body">
                        <form id="addTaskForm" action="<?= BASE_URL . "workgroup/addTask" ?>" method="post" class="form-horizontal">
                            <input id="hiddenAddTaskWorkgroupIDInput" type="hidden" name="workgroup_id" />
                            <input id="hiddenAddTaskStatusInput" type="hidden" name="task_status" value="0" />
                            <input id="hiddenTaskLatitudeInput" type="hidden" name="latitude"  />
                            <input id="hiddenTaskLongitudeInput" type="hidden" name="longitude"  />
                            <div class="form-group">
                                <div class="col-md-6">
                                    <label>Task type:</label><br/>
                                    <div class="radio radio-css radio-inline radio-success">
                                        <input type="radio" id="ecb1" name="task_visibility" value="1" checked="">
                                        <label for="ecb1">
                                        	Public task
                                        </label>
                                    </div>
                                    <div class="radio radio-css radio-inline radio-danger">
                                        <input type="radio" id="ecb2" name="task_visibility" value="0">
                                        <label for="ecb2">
                                        	Private task
                                        </label>
                                    </div>
                                </div>
								<div class="col-md-6">
									<label>Priority:</label><br>
									<div class="radio radio-css radio-inline radio-success">
										<input type="radio" id="pob1" name="priority" value="Low">
										<label for="pob1">
												Low
											</label>
										</div>
										<div class="radio radio-css radio-inline radio-primary">
											<input type="radio" id="pob2" name="priority" value="Normal" checked>
											<label for="pob2">
												Normal
											</label>
										</div>
										<div class="radio radio-css radio-inline radio-danger">
											<input type="radio" id="pob3" name="priority" value="High">
											<label for="pob3">
												High
											</label>
										</div>
								</div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-12">
                                    <label>Task subject: <span class="text-danger">*</span></label>
                                    <input type="text" name="task_subject" class="form-control" placeholder="Task subject" required />
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-xs-12 col-md-3">
                                    <label>Start date: <span class="text-danger">*</span></label>
                                    <div class="input-group task-date-picker">
                                        <input id="newTaskStartDateInput" type="text" name="task_startdate" class="form-control"  placeholder="Choose a date" required />
                                        <span class="input-group-addon btn bg-primary">
                                            <span class="fa fa-calendar text-white"></span>
                                        </span>                    
                                    </div>
                                </div>
                                <div class="col-xs-12 col-md-3">
                                    <label>Start time: <span class="text-danger">*</span></label>
                                    <div class="input-group task-time-picker">
                                        <input id="newTaskStartTimeInput" type="text" name="task_starttime" class="form-control"  placeholder="Time" required />
                                        <span class="input-group-addon btn bg-primary">
                                            <span class="fa fa-clock text-white"></span>
                                        </span>                    
                                    </div>
                                </div>
								<div class="col-xs-12 col-md-3">
                                    <label>End date: </label>
                                    <div class="input-group task-date-picker">
                                        <input id="newTaskEndDateInput" type="text" name="task_enddate" class="form-control"  placeholder="Choose a date" />
                                        <span class="input-group-addon btn bg-primary">
                                            <span class="fa fa-calendar text-white"></span>
                                        </span>                    
                                    </div>
                                </div>
                                <div class="col-xs-12 col-md-3">
                                    <label>End time: </label>
                                    <div class="input-group task-time-picker">
                                        <input id="newTaskEndTimeInput" type="text" name="task_endtime" class="form-control"  placeholder="Time" />
                                        <span class="input-group-addon btn bg-primary">
                                            <span class="fa fa-clock text-white"></span>
                                        </span>                    
                                    </div>
                                </div>
                            </div>
							<div class="form-group">
								<div class="col-xs-12 col-sm-6 col-md-6">
									<label>Customer: </label>
									<select id="taskCustomerSelect" class="form-control" name="customer_id" >
										<option value="">None</option>
									</select>
								</div>
								<div class="col-xs-12 col-sm-6 col-md-6">
									<label>Subsidiary:</label>
									<select id="taskSubsidiarySelect" class="form-control" name="subsidiary_id" >
										<option value="">None</option>
									</select>
								</div>
							</div>
                            <div class="form-group">
                                <div class="col-md-12">
                                    <label>Location:</label>
                                    <input id="taskLocationInput" type="text" class="form-control" name="task_location" placeholder="Enter task location" />
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-12">
                                    <label>Participants: <span class="text-danger">*</span></label>
                                    <select multiple id="newTaskEmployeeSelect" name="participants[]" class="form-control" required>
                                        
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-12">
                                    <label>Task description: <span class="text-danger">*</span></label>
                                    <textarea class="form-control" name="task_description" rows="4" placeholder="Enter task description"></textarea>
                                </div>
                            </div>
							<div class="form-group">
										<div class="col-md-12">
											<label><i class="fas fa-paperclip text-primary"></i> Attachments</label><br>
											<ul id="taskFiles" class="attached-document clearfix m-0">
											</ul>
											<span class="btn btn-link p-0 fileinput-button">
												<span>Attach a file</span>
												<!-- The file input field used as target for the file upload widget -->
												<input id="taskFileUpload" type="file" name="file" multiple>
											</span>
										</div>
                            </div>
                    </div>
					<div class="panel-footer">
						<button class="btn btn-success pull-left">Create task</button>
                        <button class="btn btn-primary pull-right" type="button" onClick="hideNewTaskPopup()">Close</button>
                        </form>
					</div>
                </div>
                <div class="panel panel-primary" id="editTaskDIV" hidden>
                    <div class="panel-heading">
                        <div class="panel-heading-btn">
                            <button onclick="hideEditTaskPopup()" class="btn btn-xs btn-icon btn-circle btn-default"><i class="fa fa-times"></i>
                            </button>
                        </div>
                        <h4 class="panel-title">Edit task</h4>
                    </div>
                    <div class="panel-body">
                            <form id="editTaskForm" action="<?= BASE_URL . "workgroup/editTask" ?>" method="post" class="form-horizontal">
                                <input id="hiddenEditTaskIDInput" type="hidden" name="task_id" />
                                <input id="hiddenEditTaskLatitudeInput" type="hidden" name="latitude" />
                                <input id="hiddenEditTaskLongitudeInput" type="hidden" name="longitude" />
								
                                <div class="form-group">
                                    <div class="col-md-6">
                                        <label>Task type:</label><br/>
                                        <div class="radio radio-css radio-inline radio-success">
                                            <input type="radio" id="eab1" name="task_visibility" value="1" checked="">
                                            <label for="eab1">
                                            	Public task
                                            </label>
                                        </div>
                                        <div class="radio radio-css radio-inline radio-danger">
                                            <input type="radio" id="eab2" name="task_visibility" value="0">
                                            <label for="eab2">
                                            	Private task
                                            </label>
                                        </div>
                                    </div>
                                </div>
								<div class="form-group">
									<div class="col-md-6">
											<label>Task status:</label><br/>
											<div class="radio radio-css radio-inline radio-danger">
												<input type="radio" id="xab1" name="status" value="0">
												<label for="xab1">
													Incomplete
												</label>
											</div>
											<div class="radio radio-css radio-inline radio-primary">
												<input type="radio" id="xab2" name="status" value="1">
												<label for="xab2">
													In progress
												</label>
											</div>
											<div class="radio radio-css radio-inline radio-success">
												<input type="radio" id="xab3" name="status" value="2">
												<label for="xab3">
													Finished
												</label>
											</div>
									</div>
									<div class="col-md-6">
										<label>Priority:</label><br>
										<div class="radio radio-css radio-inline radio-success">
											<input type="radio" id="epob1" name="priority" value="Low">
											<label for="epob1">
													Low
												</label>
											</div>
											<div class="radio radio-css radio-inline radio-primary">
												<input type="radio" id="epob2" name="priority" value="Normal" checked>
												<label for="epob2">
													Normal
												</label>
											</div>
											<div class="radio radio-css radio-inline radio-danger">
												<input type="radio" id="epob3" name="priority" value="High">
												<label for="epob3">
													High
												</label>
											</div>
									</div>
								</div>
                                <div class="form-group">
                                    <div class="col-md-12">
                                        <label>Task subject: <span class="text-danger">*</span></label>
                                        <input id="editTaskSubjectInput" type="text" name="task_subject" class="form-control" placeholder="Task subject" required />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-xs-12 col-md-3">
                                        <label>Start date: <span class="text-danger">*</span></label>
                                        <div class="input-group task-date-picker">
                                            <input id="editTaskStartDateInput" type="text" name="task_startdate" class="form-control" placeholder="Choose a date" required />
                                            <span class="input-group-addon btn bg-primary">
                                                <span class="fa fa-calendar text-white"></span>
                                            </span>                    
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-md-3">
                                        <label>Start time: <span class="text-danger">*</span></label>
                                        <div class="input-group task-time-picker">
                                            <input id="editTaskStartTimeInput" type="text" name="task_starttime" class="form-control" placeholder="Time" required />
                                            <span class="input-group-addon btn bg-primary">
                                                <span class="fa fa-clock text-white"></span>
                                            </span>                    
                                        </div>
                                    </div>
									<div class="col-xs-12 col-md-3">
                                        <label>End date: </label>
                                        <div class="input-group task-date-picker">
                                            <input id="editTaskEndDateInput" type="text" name="task_enddate" class="form-control"  placeholder="Choose a date" />
                                            <span class="input-group-addon btn bg-primary">
                                                <span class="fa fa-calendar text-white"></span>
                                            </span>                    
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-md-3">
                                        <label>End time: </label>
                                        <div class="input-group task-time-picker">
                                            <input id="editTaskEndTimeInput" type="text" name="task_endtime" class="form-control"  placeholder="Time" />
                                            <span class="input-group-addon btn bg-primary">
                                                <span class="fa fa-clock text-white"></span>
                                            </span>                    
                                        </div>
                                    </div>
                                </div>
								<div class="form-group">
									<div class="col-xs-12 col-sm-6 col-md-6">
										<label>Customer: </label>
										<select id="editTaskCustomerSelect" class="form-control" name="customer_id" >
											<option value="">None</option>
										</select>
									</div>
									<div class="col-xs-12 col-sm-6 col-md-6">
										<label>Subsidiary:</label>
										<select id="editTaskSubsidiarySelect" class="form-control" name="subsidiary_id" >
											<option value="">None</option>
										</select>
									</div>
								</div>
                                <div class="form-group">
                                    <div class="col-md-12">
                                        <label>Location:</label>
                                        <input id="editTaskLocationInput" type="text" class="form-control" name="task_location" placeholder="Enter task location" />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-12">
                                        <label>Participants: <span class="text-danger">*</span></label>
                                        <select id="editTaskEmployeeSelect" name="participants[]" class="form-control" multiple required>
                                            
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-12">
                                        <label>Task description: <span class="text-danger">*</span></label>
                                        <textarea id="editTaskDescriptionInput" class="form-control" name="task_description" rows="4" placeholder="Enter task description"></textarea>
                                    </div>
                                </div>
								<div class="form-group">
										<div class="col-md-12">
											<label><i class="fas fa-paperclip text-primary"></i> Attachments</label><br>
											<ul id="taskFilesDIV" class="attached-document clearfix m-0">
											</ul>
											<span class="btn btn-link p-0 fileinput-button">
												<span>Attach a file</span>
												<!-- The file input field used as target for the file upload widget -->
												<input id="editTaskFileUpload" type="file" name="file" multiple>
											</span>
										</div>
                                </div>
                    </div>
					<div class="panel-footer">
						<button class="btn btn-success">Edit task</button>
						<button type="button" class="btn btn-danger" onClick="deleteTaskID()">Delete task</button>
                        <button class="btn btn-primary pull-right" type="button" onClick="hideEditTaskPopup()">Close</button>
                        </form>
					</div>
                </div>
                <div class="panel panel-primary" id="taskNoteDIV" hidden>
                    <div class="panel-heading">
                        <div class="panel-heading-btn">
                            <button onclick="hideAddTaskNotePopup()" class="btn btn-xs btn-icon btn-circle btn-default"><i class="fa fa-times"></i>
                            </button>
                        </div>
                        <h4 class="panel-title">New task note</h4>
                    </div>
                    <div class="panel-body">
    					<form id="taskNoteForm" action="<?= BASE_URL . "workgroup/tasknote" ?>" method="post" class="form-horizontal">
                            <input id="hiddenAddTaskNoteIDInput" type="hidden" name="task_id" />
                            <div class="form-group">
                                <div class="col-md-12">
                                    <label>Task note:</label>
                                    <textarea class="form-control" name="task_note" rows="4" placeholder="Enter note here" required></textarea>
                                </div>
                            </div>
                            <button class="btn material primary">Add note</button>
                            <button type="button" class="btn material danger pull-right" onClick="hideAddTaskNotePopup()">Cancel</button>
                        </form>
					</div>
                </div>
        </div>
        <div class="popupContainer" id="workgroupPopup" hidden>
            <div class="panel panel-primary" id="editDescriptionDIV" hidden>
                <div class="panel-heading">
                    <div class="panel-heading-btn">
                        <button onclick="hideEditDescriptionPopup()" class="btn btn-xs btn-icon btn-circle btn-default"><i class="fa fa-times"></i>
                        </button>
                    </div>
                    <h4 class="panel-title">Edit description</h4>
                </div>
                <div class="panel-body">
                    <form id="editDescriptionForm" action="<?= BASE_URL . "workgroup/editDescription" ?>" method="post" class="form-horizontal">
                        <input id="hiddenEditDescriptionWorkgroupIDInput" type="hidden" name="workgroup_id" />
                        <div class="form-group">
                            <div class="col-md-12">
                                <label>Description:</label>
                                <textarea id="editWorkgroupDescriptionInput" class="form-control" name="workgroup_description" rows="4" placeholder="Enter workgroup description" required></textarea>
                            </div>
                        </div>
                        <button class="btn material primary">Save changes</button>
                    </form>
                </div>
            </div>
            <div class="panel panel-primary" id="editModeratorDIV" hidden>
                <div class="panel-heading">
                    <div class="panel-heading-btn">
                        <button onclick="hideEditModeratorPopup()" class="btn btn-xs btn-icon btn-circle btn-default"><i class="fa fa-times"></i>
                        </button>
                    </div>
                    <h4 class="panel-title">Workgroup moderators</h4>
                </div>
                <div class="panel-body">
                    <form id="editModeratorsForm" action="<?= BASE_URL . "workgroup/editModerators" ?>" method="post" class="form-horizontal">
                        <input id="hiddenEditModeratorsWorkgroupIDInput" type="hidden" name="workgroup_id" />
                        <div class="form-group">
                            <div class="col-md-12">
                                <label>Change to moderator:</label>
                                <input id="moderatorInput" class="form-control" name="moderators" required />
                            </div>
                        </div>
                    </form>
                    <div class="well m-t-15">
                        <div id="moderatorTree">
                            
                        </div>
                    </div>
                    <button class="btn material primary m-t-15" form="editModeratorsForm">Save changes</button>
                </div>
            </div>
            <div class="panel panel-primary" id="inviteDIV" hidden>
                <div class="panel-heading">
                    <div class="panel-heading-btn">
                        <button onclick="hideInvitePopup()" class="btn btn-xs btn-icon btn-circle btn-default"><i class="fa fa-times"></i>
                        </button>
                    </div>
                    <h4 class="panel-title">Invite new members</h4>
                </div>
                <div class="panel-body">
                    <form id="sendInvitesForm" action="<?= BASE_URL . "workgroup/sendinvites" ?>" method="post" class="form-horizontal">
                        <input id="hiddenInviteWorkgroupIDInput" type="hidden" name="workgroup_id" />
                        <div class="form-group">
                            <div class="col-md-12">
                                <label>Send invites to:</label>
                                <input id="inviteInput" class="form-control" name="members" required />
                            </div>
                        </div>
                    </form>
                    <div class="well m-t-15">
                        <div id="inviteTree">
                            
                        </div>
                    </div>
                    <button class="btn material primary m-t-15" form="sendInvitesForm">Send invites</button>
                </div>
            </div>
        </div>
		<div class="popupContainer" id="viewTaskPopup" hidden>
					<div id="viewTaskDIV">
						<div class="view-task-header m-b-25">
							<div class="view-task-actions">
								<button onclick="hideViewTaskPopup()" data-toggle="tooltip" data-placement="bottom" title="Close" class="btn btn-trans btn-circle f-s-16 pull-right"><i class="fa fa-times text-white"></i></button>	
								<button onclick="showCurrentTaskPage()" data-toggle="tooltip" data-placement="bottom" title="Event page" class="btn btn-trans btn-circle f-s-16 pull-right"><i class="fas fa-clipboard text-white"></i></button>		
								<button onclick="deleteTaskID()" data-toggle="tooltip" data-placement="bottom" title="Delete task" class="btn btn-trans btn-circle f-s-16 pull-right"><i class="fas fa-trash-alt text-white"></i></button>
							</div>
							<button onClick="showEditCurrentTaskPopup()" data-toggle="tooltip" data-placement="bottom" title="Edit task" class="btn btn-primary btn-circle btn-edit"><i class="fas fa-pencil-alt text-white"></i></button>
							<p class="view-task-subject" id="task-subject">
							<p>
						</div>
						<div class="view-task-body m-t-10 p-t-5 p-l-25 p-r-25 p-b-25 f-s-14">
							<div class="row m-b-15">
								<div class="col-md-1" id="status-circle">
									
								</div>
								<div class="col-md-11" id="task-status">
									
								</div>
							</div>
							<div class="row m-b-15">
								<div class="col-md-1">
									<i class="far fa-clock"></i>
								</div>
								<div class="col-md-11" id="task-duration">
								</div>
							</div>
							<div class="row m-b-15">
								<div class="col-md-1">
									<i class="fas fa-users"></i>
								</div>
								<div class="col-md-11" id="task-participants">
								</div>
							</div>
							<div class="row m-b-15">
								<div class="col-md-1">
									<i class="fas fa-map-marker-alt text-danger"></i>
								</div>
								<div class="col-md-11" id="task-location">
								</div>
							</div>
							<div class="row m-b-15">
								<div class="col-md-1">
									<i class="fas fa-align-left"></i>
								</div>
								<div class="col-md-11" id="task-description">
								</div>
							</div>
						</div>
						<div class="m-t-10 p-l-25 p-r-25 p-t-10 p-b-10 b-t-g f-s-14">
							<div class="row">
								<div class="col-md-2">
									<span class="f-w-600">Mark as</span>
								</div>
								<div class="col-md-10">
									<button onClick="setTaskStatus(2)" class="btn btn-status text-success">Finished</button>
									<button onClick="setTaskStatus(1)" class="btn btn-status text-primary">In progress</button>
									<button onClick="setTaskStatus(0)" class="btn btn-status text-danger">Incomplete</button>
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
                    <form id="uploadFileForm" action="workgroup/upload" method="post" class="form-horizontal dropzone" enctype="multipart/form-data">
                        <input id="uploadDirectoryInput" type="hidden" name="directory" />
                    </form>
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
                        <div id="map">
                            
                        </div>
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
	<script src="<?= ASSETS_URL . "fullcalendar/fullcalendar.min.js" ?>"></script>
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/dragula/3.7.2/dragula.min.js"></script>
    <script src="<?= ASSETS_URL . "jkanban/dist/jkanban.min.js" ?>"></script>
    <script src="<?= ASSETS_URL . "jstree/dist/jstree.min.js" ?>"></script>
    <script src="<?= ASSETS_URL . "dropzone/min/dropzone.min.js" ?>"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/js/materialize.min.js"></script>
    <script src="<?= ASSETS_URL . "tinymce/js/tinymce/tinymce.min.js" ?>"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/js/bootstrap-datetimepicker.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/css/bootstrap-datetimepicker.min.css" rel="stylesheet"/>
    <script src="<?= ASSETS_URL . "scheduler/js/timelineScheduler.js" ?>"></script>
    <script src="<?= ASSETS_URL . "jquery-tag-it/js/tag-it.min.js" ?>"></script>
    <script src="<?= ASSETS_URL . "select2/dist/js/select2.full.min.js" ?>"></script>
    <script src="<?= ASSETS_URL . "jquery-file-upload/js/jquery.fileupload.js" ?>"></script>
	<!-- ================== END PAGE LEVEL JS ================== -->
	
	<script>
	    var dTable;
		var kanbanBoard;
		var days = ['Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'];
		var months = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];
		
		var loggedEmployee = <?php echo json_encode($_SESSION["id"]); ?>;
		var owner_id = <?php echo json_encode($workgroup["owner_id"]); ?>;
		var moderators = <?php echo json_encode($moderators); ?>;
		var isAdmin = <?php echo json_encode($_SESSION["admin"]); ?>;
		var workgroup_id = <?php echo json_encode($workgroup["workgroup_id"]); ?>;
		var employees = <?php echo json_encode($employees) ?>;
		var dateformat = <?php echo json_encode($_SESSION["dateformat"]); ?>;
		var timeformat = <?php echo json_encode($_SESSION["timeformat"]); ?>;
		
		var green = "#00acac";
		var red = "#ff5b57";
		var blue = "#348fe2";
		var orange = "#f59c1a";
		var lime = "#49b6d6";
		var taskArray;
		var firstPageLoad = true;
		var listArray = [];
		var campaignArray = [];
		var employeeIds = [];
		var invitedArray = [];
		var moderatorArray = [];
		var customersArray = [];
		var subsidiariesArray = [];
		var cScheduler;
		var selectedEmployee = loggedEmployee;
		var selectedStatus = -1;
		var wGroup = <?php echo json_encode($workgroup); ?>;;
		var isModerator = false;
		var isOwner = false;
		
		var displayChanged = false;
		
		var hideFinished = true;
		if (owner_id == loggedEmployee) {
			isOwner = true;
			isModerator = true;
		} else {
			for (var i = 0; i < moderators.length; i++){
				if (moderators[i].employee_id == loggedEmployee){
					isModerator = true;
					break;
				}
			}
		}
		
		

		var selectedTask;
		var mapMarker;
		var taskFiles = [];
		var editTaskFiles = [];
		var employeeArray = [];
		var treesLoaded = false;
		var calendarInitiated = false;
		var isDraggingEvent = false;

		var taskPermissions = wGroup.workgroup_taskpermissions; //0 for all members, 1 for moderators and owner, 2 for owner only
		var hasTaskPermissions = (isAdmin == 1 || taskPermissions == 0 || (taskPermissions == 1 && isModerator) || (taskPermissions == 2 && isOwner));
		var viewPermissions = wGroup.workgroup_viewpermissions;
		var hasViewPermissions = (isAdmin == 1 || viewPermissions == 0 || (viewPermissions == 1 && isModerator) || (viewPermissions == 2 && isOwner));
		var campaignPermissions = wGroup.workgroup_campaignpermissions; //0 for all members, 1 for moderators and owner, 2 for owner only
		var hasCampaignPermissions = (isAdmin == 1 || campaignPermissions == 0 || (campaignPermissions == 1 && isModerator) || (campaignPermissions == 2 && isOwner));
							
		$(document).ready(function() {
			getMenuStatistics(loggedEmployee);
			setupWorkgroup();
			
			$("#inviteInput").tagit({
				readOnly: true,
				afterTagRemoved: function(evt, ui) {
					var tagName = ui.tagLabel;
					for (var i = 0; i < employees.length; i++) {
						var employeeName = employees[i].employee_name + " " + employees[i].employee_surname;
						if (employeeName == tagName) {
							invitedArray.splice(invitedArray.indexOf(employees[i].employee_id), 1);
							break;
						}
					}
				}
			});
			$("#moderatorInput").tagit({
				readOnly: true,
				afterTagRemoved: function(evt, ui) {
					var tagName = ui.tagLabel;
					for (var i = 0; i < employees.length; i++) {
						var employeeName = employees[i].employee_name + " " + employees[i].employee_surname;
						if (employeeName == tagName) {
							moderatorArray.splice(moderatorArray.indexOf(employees[i].employee_id), 1);
							break;
						}
					}
				}
			});
			
			$("input[type=radio][name=hide_finished]").change(function(){
				var selectedValue = $(this).val();
				if (selectedValue == 1){
					hideFinished = false;
				}else{
					hideFinished = true;
				}
				displayChanged = true;
				getWorkgroupTasks();
			});
			
			$(".task-date-picker").datetimepicker({
				format: dateformat,
				"defaultDate": new Date(),
				allowInputToggle: true
			});
			
			$(".task-time-picker").datetimepicker({
				format: timeformat,
				stepping: 5,
				"defaultDate": new Date(),
				allowInputToggle: true,
				widgetPositioning: {
					horizontal: 'right',
					vertical: 'auto'
				}
			});
			
			$("#editTaskEmployeeSelect, #newTaskEmployeeSelect, #taskCustomerSelect, #editTaskCustomerSelect, #taskSubsidiarySelect, #editTaskSubsidiarySelect").select2({
				width: "100%"
			});
			
			updateMemberStatuses();
			setInterval(getWorkgroupMessages, 5000);
			setInterval(updateMemberStatuses, 20000);
			setInterval(function(){
				if (!isDraggingEvent){
					getWorkgroupTasks();
				}
				getWorkgroupHistory();
			}, 20000);
			
			getCustomers();
			getSubsidiaries();
			
			Dropzone.options.uploadFileForm = {
				dictDefaultMessage: "<i class='fa fa-cloud text-primary'></i>&nbsp;Drag and drop files here to upload",
				init: function() {
					this.on("success", function(file, response) {
						if (response == "") {
							swal(
								'File uploaded',
								'File upload was successful.',
								'success'
							);
						} else {
							swal(
								'Error!',
								'The server encountered the following error while uploading the file: ' + response,
								'error'
							);
						}
					});
					this.on("complete", function(file) {
						if (this.getUploadingFiles().length === 0 && this.getQueuedFiles().length === 0) {
							getWorkgroupFiles();
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
				setup: function(editor) {
					editor.on('change', function() {
						editor.save();
					});
				}
			});
			$('#taskFileUpload').fileupload({
				formData: {
					workgroup_id: workgroup_id
				},
				url: "wgtask/upload",
				dataType: 'json',
				add: function(e, data) {
					$.each(data.files, function(index, file) {
						$("#taskFiles").append('<li class="fa-file">' +
							'<div class="document-file">' +
							'<a href="' + "<?= DIR_URL ?>" + "Workgroups/Workgroup" + workgroup_id + "/" + file.name + '" download="' + file.name + '" ><i class="fa fa-file-image"></i></a>' +
							'</div>' +
							'<div class="document-name"><a href="' + "<?= DIR_URL ?>" + "Workgroups/Workgroup" + workgroup_id + "/" + file.name + '" download="' + file.name + '" >' + file.name + '</a></div>' +
							'</li>');
					});
					$("#addTaskBtn").html('<i class="fa fa-spinner fa-spin"></i> Uploading file...');
					$("#addTaskBtn").prop("disabled", true);
					data.submit();
				},
				done: function(e, data) {
					if (!data.result.error) {
						taskFiles.push(data.result.filename);
					} else {
						swal(
							'Error!',
							'The server encountered the following error: ' + data.result.message,
							'error'
						);
					}
					$("#addTaskBtn").html("Add task");
					$("#addTaskBtn").prop("disabled", false);
				}
			});
			$('#editTaskFileUpload').fileupload({
				formData: {
					workgroup_id: workgroup_id
				},
				url: "wgtask/upload",
				dataType: 'json',
				add: function(e, data) {
					$.each(data.files, function(index, file) {
						$("#taskFilesDIV").append('<li class="fa-file">' +
							'<div class="document-file">' +
							'<a href="' + "<?= DIR_URL ?>" + "Workgroups/Workgroup" + workgroup_id + "/" + file.name + '" download="' + file.name + '" ><i class="fa fa-file-image"></i></a>' +
							'</div>' +
							'<div class="document-name"><a href="' + "<?= DIR_URL ?>" + "Workgroups/Workgroup" + workgroup_id + "/" + file.name + '" download="' + file.name + '" >' + file.name + '</a></div>' +
							'</li>');
					});
					$("#editTaskBtn").html('<i class="fa fa-spinner fa-spin"></i> Uploading file...');
					$("#editTaskBtn").prop("disabled", true);
					data.submit();
				},
				done: function(e, data) {
					if (!data.result.error) {
						editTaskFiles.push(data.result.filename);
					} else {
						swal(
							'Error!',
							'The server encountered the following error: ' + data.result.message,
							'error'
						);
					}
					$("#editTaskBtn").html("Edit task");
					$("#editTaskBtn").prop("disabled", false);
				}
			});
			$("a[href='#task-scheduler']").on('shown.bs.tab', function() {
				cScheduler.Init();
			});
			$("a[href='#task-calendar']").on('shown.bs.tab', function() {
				$('#calendar').fullCalendar('render');
				$('#calendar').fullCalendar('rerenderEvents');
			});
			$("#newTaskDateTimeInput, #editTaskDateTimeInput").datetimepicker({
				format: "YYYY-MM-DD HH:mm",
				"defaultDate": new Date()
			});
			
			
			$('#postMessageForm').on('submit', function(e) { //use on if jQuery 1.7+
				e.preventDefault();
				var messageContent = $("#messageContentInput").val();
				if (messageContent != "") {
					var postData = {
						content: messageContent,
						workgroup_id: workgroup_id
					};
					$.ajax({
						type: "POST",
						url: "chat/addMessage",
						data: postData,
						success: function(msg) {
							if (msg == "") {
								$("#postMessageForm")[0].reset();
								getWorkgroupMessages();
							} else {
								swal(
									'Error!',
									'The server encountered the following error: ' + msg,
									'error'
								);
							}
						}
					});
				} else {
					swal(
						'Error',
						'Message cannot be empty.',
						'error'
					);
				}
			});
			$('#addTaskForm').on('submit', function(e) { //use on if jQuery 1.7+
				e.preventDefault();
				var startDate = moment($("#newTaskStartDateInput").val(), dateformat).format("YYYY-MM-DD");
				var startTime = $("#newTaskStartTimeInput").val();
				var endDate = moment($("#newTaskEndDateInput").val(), dateformat).format("YYYY-MM-DD");
				var endTime = $("#newTaskEndTimeInput").val();
				var startD = startDate + " " + startTime;
				var endD = endDate + " " + endTime;
				if (moment(startD).isBefore(moment(endD))) {
					var postData = $('#addTaskForm').serializeArray();
					postData.push({
						name: 'files',
						value: taskFiles
					});
					$.ajax({
						type: "POST",
						url: "workgroup/addTask",
						data: postData,
						success: function(msg) {
							if (msg == "") {
								swal(
									'Success',
									'Task was successfully added',
									'success'
								);
								getWorkgroupTasks();
								hideNewTaskPopup();
							} else {
								swal(
									'Error!',
									'The server encountered the following error: ' + msg,
									'error'
								);
							}
						}
					});
				} else {
					swal(
						'Error!',
						'Task start date must be before task end date!',
						'error'
					);
				}
			});
			$('#editTaskForm').on('submit', function(e) { //use on if jQuery 1.7+
				e.preventDefault();
				var startDate = moment($("#editTaskStartDateInput").val(), dateformat).format("YYYY-MM-DD");
				var startTime = $("#editTaskStartTimeInput").val();
				var endDate = moment($("#editTaskEndDateInput").val(), dateformat).format("YYYY-MM-DD");
				var endTime = $("#editTaskEndTimeInput").val();
				var startD = startDate + " " + startTime;
				var endD = endDate + " " + endTime;
				if (moment(startD).isBefore(moment(endD))) {
					var postData = $('#editTaskForm').serializeArray();
					postData.push({
						name: 'files',
						value: editTaskFiles
					});
					$.ajax({
						type: "POST",
						url: "workgroup/editTask",
						data: postData,
						success: function(msg) {
							if (msg == "") {
								swal(
									'Success',
									'Task was successfully edited',
									'success'
								);
								getWorkgroupTasks();
								hideEditTaskPopup();
							} else {
								swal(
									'Error!',
									'The server encountered the following error: ' + msg,
									'error'
								);
							}
						}
					});
				} else {
					swal(
						'Error!',
						'Task start date must be before task end date!',
						'error'
					);
				}
			});
			$('#taskNoteForm').on('submit', function(e) { //use on if jQuery 1.7+
				e.preventDefault();
				$.ajax({
					type: "POST",
					url: "workgroup/tasknote",
					data: $("#taskNoteForm").serialize(),
					success: function(msg) {
						if (msg == "") {
							swal(
								'Success',
								'Note successfully added',
								'success'
							);
							getWorkgroupTasks();
							hideAddTaskNotePopup();
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
			$('#editDescriptionForm').on('submit', function(e) { //use on if jQuery 1.7+
				e.preventDefault();
				$.ajax({
					type: "POST",
					url: "workgroup/editDescription",
					data: $("#editDescriptionForm").serialize(),
					success: function(msg) {
						if (msg == "") {
							swal(
								'Success',
								'Workgroup description was successfully edited',
								'success'
							);
							$("#workgroupDescriptionInput").html($("#editWorkgroupDescriptionInput").val());
							hideEditDescriptionPopup();
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
			$('#editModeratorsForm').on('submit', function(e) { //use on if jQuery 1.7+
				e.preventDefault();
				var postData = {
					"workgroup_id": workgroup_id,
					"moderators": moderatorArray
				};
				$.ajax({
					type: "POST",
					url: "workgroup/editModerators",
					data: postData,
					success: function(msg) {
						if (msg == "") {
							location.reload();
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
			$('#sendInvitesForm').on('submit', function(e) { //use on if jQuery 1.7+
				e.preventDefault();
				var postData = {
					"workgroup_id": workgroup_id,
					"members": invitedArray
				};
				$.ajax({
					type: "POST",
					url: "workgroup/sendinvites",
					data: postData,
					success: function(msg) {
						if (msg == "") {
							swal(
								'Success',
								'Invites were successfully sent.',
								'success'
							);
							hideInvitePopup();
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
				var postData = {
					"list_name": $("#addEmailListNameInput").val(),
					"from_name": $("#addEmailListFromNameInput").val(),
					"from_email": $("#addEmailListFromEmailInput").val(),
					"permission_reminder": $("#addEmailListPermissionReminderInput").val(),
					"list_type": 0,
					"workgroup_id": workgroup_id
				};
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
				var postData = {
					"list_name": $("#addSmsListNameInput").val(),
					"list_type": 1,
					"workgroup_id": workgroup_id
				};
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
			$('#workgroupSettingsForm').on('submit', function(e) { //use on if jQuery 1.7+
				e.preventDefault();
				$.ajax({
					type: "POST",
					url: "workgroup/settings",
					data: $("#workgroupSettingsForm").serialize(),
					success: function(msg) {
						if (msg == "") {
							location.reload();
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
			$('#uploadFileForm').on('submit', function(e) { //use on if jQuery 1.7+
				e.preventDefault();
				var formData = new FormData();
				formData.append('file', $('#fileToUpload')[0].files[0]);
				formData.append('directory', $("#uploadDirectoryInput").val());
				$("#uploadFileBtn").html('<i class="fa fa-spinner fa-pulse"></i>&nbsp;Uploading file...');
				$.ajax({
					url: 'workgroup/upload',
					type: 'POST',
					data: formData,
					processData: false, // tell jQuery not to process the data
					contentType: false, // tell jQuery not to set contentType
					success: function(response) {
						if (response == "") { //Everything okay
							swal(
								'Upload successful',
								'Your file was successfully uploaded.',
								'success'
							);
							getWorkgroupFiles();
							hideUploadFilePopup();
							$("#uploadFileBtn").html('Upload file');
						} else {
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
			$("#fileSearchInput").keyup(function() {
				var searchString = $(this).val();
				$('#folderStructureDIV').jstree(true).search(searchString);
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
			$('#subscriberList').on('click', 'li .email-info', function() {
				var campaignPermissions = wGroup.workgroup_campaignpermissions; //0 for all members, 1 for moderators and owner, 2 for owner only
				var hasCampaignPermissions = (campaignPermissions == 0 || (campaignPermissions == 1 && isModerator) || (campaignPermissions == 2 && isOwner));
				if (hasCampaignPermissions) {
					window.open("<?= BASE_URL ?>" + "campaignlist/details?list_id=" + listArray[$(this).parent("li").index()].list_id);
				}
			});
			$('#campaignList').on('click', 'li .email-info', function() {
				var campaignPermissions = wGroup.workgroup_campaignpermissions; //0 for all members, 1 for moderators and owner, 2 for owner only
				var hasCampaignPermissions = (campaignPermissions == 0 || (campaignPermissions == 1 && isModerator) || (campaignPermissions == 2 && isOwner));
				if (hasCampaignPermissions) {
					window.open("<?= BASE_URL ?>" + "campaign/details?campaign_id=" + campaignArray[$(this).parent("li").index()].campaign_id);
				}
			});
			$('#taskCustomerSelect').on('change', function() {
                  var customer_id = this.value;
				  if (customer_id != ""){
					  for (var i = 0; i < customersArray.length; i++){
						  var curCustomer = customersArray[i];
						  if (curCustomer.customer_id == customer_id){
							$("#hiddenTaskLatitudeInput").val(curCustomer.latitude);
							$("#hiddenTaskLongitudeInput").val(curCustomer.longitude);
							$("#taskLocationInput").val(curCustomer.customer_address);
							$("#taskSubsidiarySelect").html("");
							$("#taskSubsidiarySelect").append($('<option>', {
								value: "",
								text: "Main company"
							}));
							for (var j = 0; j < subsidiariesArray.length; j++){
								var subsidiary = subsidiariesArray[j];
								if (subsidiary.customer_id == curCustomer.customer_id){
									$("#taskSubsidiarySelect").append($('<option>', {
										value: subsidiary.subsidiary_id,
										text: subsidiary.subsidiary_name
									}));
								}
							}
							break;
						  }
					  }
				  }else{
					  $("#taskSubsidiarySelect").html("");
					  $("#taskSubsidiarySelect").append($('<option>', {
								value: "",
								text: "None"
					  }));
				  }
            });
			
			$("#taskSubsidiarySelect").on("change", function(){
				var subsidiary_id = this.value;
				if (subsidiary_id != ""){
					for (var i = 0; i < subsidiariesArray.length; i++){
						var subsidiary = subsidiariesArray[i];
						if (subsidiary.subsidiary_id == subsidiary_id){
							$("#hiddenTaskLatitudeInput").val(subsidiary.latitude);
							$("#hiddenTaskLongitudeInput").val(subsidiary.longitude);
							$("#taskLocationInput").val(subsidiary.subsidiary_address);
							break;
						}
					}
				}else{
					$("#taskCustomerSelect").trigger("change");
				}
			});
            
            $('#editTaskCustomerSelect').on('change', function() {
                  var customer_id = this.value;
				  if (customer_id != ""){
					  for (var i = 0; i < customersArray.length; i++){
						  var curCustomer = customersArray[i];
						  if (curCustomer.customer_id == customer_id){
							$("#hiddenEditTaskLatitudeInput").val(curCustomer.latitude);
							$("#hiddenEditTaskLongitudeInput").val(curCustomer.longitude);
							$("#editTaskLocationInput").val(curCustomer.customer_address);
							$("#editTaskSubsidiarySelect").html("");
							$("#editTaskSubsidiarySelect").append($('<option>', {
								value: "",
								text: "Main company"
							}));
							for (var j = 0; j < subsidiariesArray.length; j++){
								var subsidiary = subsidiariesArray[j];
								if (subsidiary.customer_id == curCustomer.customer_id){
									$("#editTaskSubsidiarySelect").append($('<option>', {
										value: subsidiary.subsidiary_id,
										text: subsidiary.subsidiary_name
									}));
								}
							}
							break;
						  }
					  }
				  }else{
					  $("#editTaskSubsidiarySelect").html("");
					  $("#editTaskSubsidiarySelect").append($('<option>', {
								value: "",
								text: "None"
					  }));
				  }				  
            });
            
			$("#editTaskSubsidiarySelect").on("change", function(){
				var subsidiary_id = this.value;
				if (subsidiary_id != ""){
					for (var i = 0; i < subsidiariesArray.length; i++){
						var subsidiary = subsidiariesArray[i];
						if (subsidiary.subsidiary_id == subsidiary_id){
							$("#hiddenTaskEventLatitudeInput").val(subsidiary.latitude);
							$("#hiddenTaskEventLongitudeInput").val(subsidiary.longitude);
							$("#editTaskLocationInput").val(subsidiary.subsidiary_address);
							break;
						}
					}
				}else{
					$("#editTaskCustomerSelect").trigger("change");
				}
			});
		});

		function initMap() {
			var myOptions = {
				zoom: parseInt(14),
				center: new google.maps.LatLng(46.051261, 14.504626),
				mapTypeId: google.maps.MapTypeId.ROADMAP
			};
			map = new google.maps.Map(document.getElementById('map'), myOptions);
			google.maps.event.trigger(map, 'resize');
			var searchBox = new google.maps.places.SearchBox(document.getElementById('taskLocationInput'));
			var editSearchBox = new google.maps.places.SearchBox(document.getElementById('editTaskLocationInput'));
			google.maps.event.addListener(searchBox, 'places_changed', function() {
				var places = searchBox.getPlaces();
				var i, place;
				for (i = 0; place = places[i]; i++) {
					(function(place) {
						var location = place.geometry.location;
						$("#hiddenTaskLatitudeInput").val(location.lat());
						$("#hiddenTaskLongitudeInput").val(location.lng());
					}(place));
				}
			});
			google.maps.event.addListener(editSearchBox, 'places_changed', function() {
				var places = editSearchBox.getPlaces();
				var i, place;
				for (i = 0; place = places[i]; i++) {
					(function(place) {
						var location = place.geometry.location;
						$("#hiddenEditTaskLatitudeInput").val(location.lat());
						$("#hiddenEditTaskLongitudeInput").val(location.lng());
					}(place));
				}
			});
		}

		function filterCampaignList() {
			var searchQ = $("#campaignSearchInput").val().toLowerCase();
			$('#campaignList li').each(function(i) {
				if ($(this).html().toLowerCase().includes(searchQ)) {
					$(this).show();
				} else {
					$(this).hide();
				}
			});
		}

		function filterSubscriberList() {
			var searchQ = $("#subscriberSearchInput").val().toLowerCase();
			$('#subscriberList li').each(function(i) {
				if ($(this).html().toLowerCase().includes(searchQ)) {
					$(this).show();
				} else {
					$(this).hide();
				}
			});
		}

		function showViewTaskPopup(element) {
					$("#task-subject").html(selectedTask.task_subject);
					var statusText;
					var statusColor;
					if (selectedTask.status == 0) {
						statusText = "Incomplete";
						statusColor = "<i class='fa fa-circle text-danger'></i>";
					} else if (selectedTask.status == 1) {
						statusText = "In progress";
						statusColor = "<i class='fa fa-circle text-primary'></i>";
					} else {
						statusText = "Finished";
						statusColor = "<i class='fa fa-circle text-success'></i>";
					}
					$("#task-status").html(statusText);
					$("#status-circle").html(statusColor);
					$("#task-duration").html(moment(selectedTask.task_startdate + " " + selectedTask.task_starttime).format(dateformat + ", " + timeformat) + " - " + moment(selectedTask.task_enddate + " " + selectedTask.task_endtime).format(dateformat + ", " + timeformat));
					var taskParticipants = "";
					var actualParticipants = selectedTask.participants.split(",");
					for (var i = 0; i < actualParticipants.length; i++) {
						for (var j = 0; j < employeeArray.length; j++) {
							var cEmployee = employeeArray[j];
							if (actualParticipants[i] == cEmployee.employee_id) {
								var circleClass = "user-default-avatar";		                
								taskParticipants += '<div class="m-t-5"><a class="socialnetwork-group-user-avatar ' + circleClass + '" href="#"></a></div><div><h5>' + cEmployee.employee_name + " " + cEmployee.employee_surname + '</h5></div><div class="clearfix"></div>';
								break;
							}
						}
					}
					$("#task-participants").html(taskParticipants);
					var locationString = "Not specified";
					if (selectedTask.task_location != "") {
						locationString = selectedTask.task_location;
					}
					$("#task-location").html(locationString);
					$("#task-description").html(selectedTask.task_description);
					$("#viewTaskPopup").show();
		}		
		
		function getWorkgroupHistory(){
			var postData = {
				workgroup_id: workgroup_id
			}
			$.ajax({
				type: "POST",
				url: "workgroup/history",
				data: postData,
				dataType: "json",
				success: function(history) {
					console.log(history);
					var historyContent = "";
					for (var i = 0; i < history.length; i++){
						var activity = history[i];
						
						var imgURL = "<?= IMG_URL ?>" + "user-13.jpg";
						if (activity.profile_image != "") {
							imgURL = "<?= IMG_URL ?>" + activity.profile_image;
						}
						historyContent += '<div class="widget-list-item">' +
								'<div class="widget-list-media">' +
									'<img src="' + imgURL + '" class="rounded" />' +
								'</div>' +
								'<div class="widget-list-content">' +
									'<h4 class="widget-list-title">' + activity.employee_name + " " + activity.employee_surname + '</h4>' +
									'<p class="widget-list-desc">' + activity.description + '</p>' +
									'<p class="widget-list-desc text-primary">' + moment(activity.created_on).format(dateformat + ", " + timeformat) + '</p>' +
								'</div>' +
							'</div>';
					}
					$("#historyList").html(historyContent);
				}
			});
		}
		
		function setupWorkgroup() {
			var postData = {
				workgroup_id: workgroup_id
			};
			$.ajax({
				type: "POST",
				url: "workgroup/getByID",
				data: postData,
				dataType: "json",
				success: function(workgroup) {
					wGroup = workgroup;
					$("#hiddenSettingsIDInput").val(workgroup_id);
					$("#settingsNameInput").val(workgroup.name);
					$("#settingsTaskSelect").val(workgroup.workgroup_taskpermissions);
					$("#settingsViewSelect").val(workgroup.workgroup_viewpermissions);
					$("#settingsReminderSelect").val(workgroup.workgroup_remindertime);
					$("#settingsFileSelect").val(workgroup.workgroup_filepermissions);
					$("#settingsCampaignSelect").val(workgroup.workgroup_campaignpermissions);
					if (workgroup.workgroup_ownernotifications == 1) {
						$("#settingsNotificationCheckbox").prop("checked", true);
					}
					if (!hasTaskPermissions) {
						$(".tp-visible").addClass("hide"); //hide task related buttons
					}
					if (!hasCampaignPermissions) {
						$(".cp-visible").addClass("hide"); //hide campaign related buttons
					}
					getWorkgroupMessages();
					getWorkgroupFiles();
					getEmployees();
					getCampaigns();
					getLists();
					getRecentActions();
				}
			});
		}
		
		function getCustomers() {
            $.ajax({
                type: "POST",
                url: "<?= BASE_URL ?>" + "customer/get",
                data: null,
				dataType: "json",
                success: function(customers) {
                    customersArray = customers;
                    for (var i = 0; i < customers.length; i++){
                        $("#editTaskCustomerSelect, #taskCustomerSelect").append($('<option>', {
                            value: customers[i].customer_id,
                            text: customers[i].customer_name
                        }));
                    }
                }
            });
        }
		
		function getSubsidiaries(){
			$.ajax({
                type: "POST",
                url: "<?= BASE_URL ?>" + "subsidiary/getall",
                data: null,
				dataType: "json",
                success: function(subsidiaries) {
                    subsidiariesArray = subsidiaries;
                }
            });
		}

		function updateMemberStatuses() {
			var postData = {
				workgroup_id: workgroup_id
			};
			$.ajax({
				type: "POST",
				url: "workgroup/members",
				data: postData,
				dataType: "json",
				success: function(response) {
					var curEmployeeIds = [];
					var newEmployeeIds = [];
					for (var i = 0; i < employees.length; i++) {
						curEmployeeIds.push(employees[i].employee_id);
					}
					for (var i = 0; i < response.employees.length; i++) {
						newEmployeeIds.push(response.employees[i].employee_id);
					}
					var sameEmployees = curEmployeeIds.sort().join(",") === newEmployeeIds.sort().join(",");
					employees = response.employees;
					moderators = response.moderators;
					owner = response.owner;
					var employeeContent = "";
					var moderatorContent = "";
					var ownerContent = "";
					for (var i = 0; i < employees.length; i++) {
						var employee = employees[i];
						if (employee.employee_id != owner.employee_id) {
							var kickBtn = "";
							if (owner.employee_id == loggedEmployee) {
								kickBtn = '<button class="btn btn-link pull-right" onClick="kickEmployee(' + employee.employee_id + ')" >Kick</button>';
							}
							if (employee.logged_in == 0) {
								employeeContent += '<a class="socialnetwork-group-user-avatar user-offline-avatar" href="#"></a>' +
									'<div>' + kickBtn + '<h5>' + employee.employee_name + " " + employee.employee_surname + '</h5><h6>' + employee.employee_email + '</h6></div>';
							} else if (employee.logged_in == 2) {
								var lastSeenTime = moment(employee.inactive_since).format(dateformat + ", " + timeformat);
								employeeContent += '<a class="socialnetwork-group-user-avatar user-busy-avatar" href="#"></a>' +
									'<div>' + kickBtn + '<h5>' + employee.employee_name + " " + employee.employee_surname + ' (Last seen: ' + lastSeenTime + ')</h5><h6>' + employee.employee_email + '</h6></div>';
							} else {
								employeeContent += '<a class="socialnetwork-group-user-avatar user-default-avatar" href="#"></a>' +
									'<div>' + kickBtn + '<h5>' + employee.employee_name + " " + employee.employee_surname + '</h5><h6>' + employee.employee_email + '</h6></div>';
							}
						}
					}
					for (var i = 0; i < moderators.length; i++) {
						var employee = moderators[i];
						if (employee.employee_id != owner.employee_id) {
							if (employee.logged_in == 0) {
								moderatorContent += '<a class="socialnetwork-group-user-avatar user-offline-avatar" href="#"></a>' +
									'<div><h5>' + employee.employee_name + " " + employee.employee_surname + '</h5><h6>' + employee.employee_email + '</h6></div>';
							} else if (employee.logged_in == 2) {
								var lastSeenTime = moment(employee.inactive_since).format(dateformat + ", " + timeformat);
								moderatorContent += '<a class="socialnetwork-group-user-avatar user-busy-avatar" href="#"></a>' +
									'<div><h5>' + employee.employee_name + " " + employee.employee_surname + ' (Last seen: ' + lastSeenTime + ')</h5><h6>' + employee.employee_email + '</h6></div>';
							} else {
								moderatorContent += '<a class="socialnetwork-group-user-avatar user-default-avatar" href="#"></a>' +
									'<div><h5>' + employee.employee_name + " " + employee.employee_surname + '</h5><h6>' + employee.employee_email + '</h6></div>';
							}
						}
					}
					if (owner.logged_in == 0) {
						ownerContent == '<a class="socialnetwork-group-user-avatar user-offline-avatar" href="#"></a>' +
							'<div><h5>' + owner.employee_name + " " + owner.employee_surname + '</h5><h6>' + owner.employee_email + '</h6></div>';
					} else if (owner.logged_in == 2) {
						var lastSeenTime = moment(employee.inactive_since).format(dateformat + ", " + timeformat);
						ownerContent += '<a class="socialnetwork-group-user-avatar user-busy-avatar" href="#"></a>' +
							'<div><h5>' + employee.employee_name + " " + employee.employee_surname + ' (Last seen: ' + lastSeenTime + ')</h5><h6>' + employee.employee_email + '</h6></div>';
					} else {
						ownerContent += '<a class="socialnetwork-group-user-avatar user-default-avatar" href="#"></a>' +
							'<div><h5>' + owner.employee_name + " " + owner.employee_surname + '</h5><h6>' + owner.employee_email + '</h6></div>';
					}
					$("#membersDIV").html(employeeContent);
					$("#moderatorsDIV").html(moderatorContent);
					$("#ownerDIV").html(ownerContent);
					if (!sameEmployees) {
						getEmployees();
					}
				}
			});
		}

		function desyncMailchimp() {
			swal({
				title: 'Desync MailChimp',
				text: "Are you sure you want to desync MailChimp?",
				type: 'warning',
				showCancelButton: true,
				confirmButtonColor: '#3085d6',
				cancelButtonColor: '#d33',
				confirmButtonText: 'Yes, desync'
			}).then(function() {
				var postData = {
					workgroup_id: workgroup_id
				};
				$.ajax({
					type: "POST",
					url: "mailchimp/desync",
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

		function syncMailchimp() {
			//retrieves lists and campaigns from MailChimp
			showLoadingPopup();
			var postData = {
				workgroup_id: workgroup_id
			};
			$.ajax({
				type: "POST",
				url: "campaign/mailchimp",
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

		function showLoadingPopup() {
			$("#loadingPopup").show();
		}

		function hideLoadingPopup() {
			$("#loadingPopup").hide();
		}

		function showSyncMailchimpDIV() {
			$("#hiddenSyncMailchimpIDInput").val(workgroup_id);
			$("#mailchimpPopup, #syncMailchimpDIV").show();
		}

		function hideSyncMailchimpDIV() {
			$("#mailchimpPopup, #syncMailchimpDIV").hide();
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

		function hideInvitePopup() {
			invitedArray = [];
			$("#inviteInput").tagit("removeAll");
			$("#workgroupPopup, #inviteDIV").hide();
		}

		function showInvitePopup() {
			$("#hiddenInviteWorkgroupIDInput").val(workgroup_id);
			$("#workgroupPopup, #inviteDIV").show();
		}

		function showSMSListDIV() {
			$("#hiddenSMSListIDInput").val(workgroup_id);
			$("#listPopup, #addSMSListDIV").show();
		}

		function hideSMSListDIV() {
			$("#listPopup, #addSMSListDIV").hide();
		}

		function showEmailListDIV() {
			$("#hiddenEmailListIDInput").val(workgroup_id);
			$("#listPopup, #addEmailListDIV").show();
		}

		function hideEmailListDIV() {
			$("#listPopup, #addEmailListDIV").hide();
		}

		function showEmailCampaignDIV() {
			$("#hiddenEmailCampaignIDInput").val(workgroup_id);
			$("#campaignPopup, #addEmailCampaignDIV").show();
		}

		function hideEmailCampaignDIV() {
			$("#campaignPopup, #addEmailCampaignDIV").hide();
		}

		function showSMSCampaignDIV() {
			$("#hiddenSMSCampaignIDInput").val(workgroup_id);
			$("#campaignPopup, #addSMSCampaignDIV").show();
		}

		function hideSMSCampaignDIV() {
			$("#campaignPopup, #addSMSCampaignDIV").hide();
		}

		function showUploadFilePopup(directory) {
			$("#uploadDirectoryInput").val(directory);
			$("#uploadPopup, #uploadFileDIV").show();
		}

		function hideUploadFilePopup() {
			$("#uploadFileForm")[0].reset();
			$("#uploadPopup, #uploadFileDIV").hide();
		}

		function showEditModeratorPopup() {
			$("#hiddenEditModeratorsWorkgroupIDInput").val(workgroup_id);
			for (var i = 0; i < moderators.length; i++) {
				moderatorArray.push(moderators[i].employee_id);
				$("#moderatorInput").tagit("createTag", moderators[i].employee_name + " " + moderators[i].employee_surname);
			}
			$("#workgroupPopup, #editModeratorDIV").show();
		}

		function hideEditModeratorPopup() {
			moderatorArray = [];
			$("#moderatorInput").tagit("removeAll");
			$("#workgroupPopup, #editModeratorDIV").hide();
		}

		function showEditDescriptionPopup() {
			$("#hiddenEditDescriptionWorkgroupIDInput").val(workgroup_id);
			$("#editWorkgroupDescriptionInput").val(<?php echo json_encode($workgroup["description"]); ?>);
			$("#workgroupPopup, #editDescriptionDIV").show();
		}

		function hideEditDescriptionPopup() {
			$("#editDescriptionForm")[0].reset();
			$("#workgroupPopup, #editDescriptionDIV").hide();
		}

		function showNewTaskPopup(status) {
			$("#hiddenAddTaskWorkgroupIDInput").val(workgroup_id);
			$("#hiddenAddTaskStatusInput").val(status);
			$("#newTaskStartDateInput, #newTaskEndDateInput").val(moment().format(dateformat));
			$("#newTaskStartTimeInput").val(moment().format(timeformat));
			$("#newTaskEndTimeInput").val(moment().add(1, "hours").format(timeformat));
			$("#newTaskEmployeeSelect").val("").trigger("change");
			$("#taskPopup, #addTaskDIV").show();
		}

		function hideNewTaskPopup() {
			$("#taskFiles").html("");
			taskFiles = [];
			$("#addTaskForm")[0].reset();
			$("#taskPopup, #addTaskDIV").hide();
		}

		function showAddTaskNotePopup(row) {
			var actualRow = $(row).parents('tr');
			if (actualRow.hasClass('child')) {//Check if the current row is a child row
				actualRow = actualRow.prev();//If it is, then point to the row before it (its 'parent')
			}
			var task = dTable.row(actualRow).data();
			$("#hiddenAddTaskNoteIDInput").val(task.task_id);
			var postData = {
				task_id: task.task_id
			};
			$.ajax({
				type: "POST",
				url: "<?= BASE_URL ?>" + "workgroup/tasknotes",
				data: postData,
				dataType: "json",
				success: function(notes) {
					var noteContent = "";
					for (var i = 0; i < notes.length; i++) {
						noteContent += '<div class="note note-primary m-b-15">' +
							'<div class="note-content">' +
							'<h4>' + notes[i].employee_name + " " + notes[i].employee_surname + '</h4>' +
							'<p>' + notes[i].task_note + '</p>' +
							'<small>' + moment(notes[i].created_on).format(dateformat) + '</small>' +
							'</div>' +
							'</div>';
					}
					$("#taskNotesDIV").html(noteContent);
					$("#taskPopup, #taskNoteDIV").show();
				}
			});
		}

		function hideAddTaskNotePopup() {
			$("#taskNoteForm")[0].reset();
			$("#taskPopup, #taskNoteDIV").hide();
		}

		function showEditTaskPopup(row) {
			var actualRow = $(row).parents('tr');
			if (actualRow.hasClass('child')) {//Check if the current row is a child row
				actualRow = actualRow.prev();//If it is, then point to the row before it (its 'parent')
			}
			var task = dTable.row(actualRow).data();
			if (task.opened_on == "") {
				markTaskAsOpened(task.task_id);
				task.opened_on = new Date();
			}
			$("#hiddenEditTaskIDInput").val(task.task_id);
			$("#editTaskSubjectInput").val(task.task_subject);
			$("#editTaskDescriptionInput").val(task.task_description);
			$("#editTaskStartDateInput").val(moment(task.task_startdate).format(dateformat));
			$("#editTaskStartTimeInput").val(moment(task.task_startdate + " " + task.task_starttime).format(timeformat));
			$("#editTaskEndDateInput").val(moment(task.task_enddate).format(dateformat));
			$("#editTaskEndTimeInput").val(moment(task.task_enddate + " " + task.task_endtime).format(timeformat));
			$("#editTaskCustomerSelect").val(task.customer_id).trigger("change");
			$("#editTaskSubsidiarySelect").val(task.subsidiary_id).trigger("change");
			$("#editTaskLocationInput").val(task.task_location);
			$("#hiddenEditTaskLatitudeInput").val(task.latitude);
			$("#hiddenEditTaskLongitudeInput").val(task.longitude);
			$("#editTaskForm input[name=task_visibility]").val([task.task_visibility]);
			$("#editTaskForm input[name=status]").val([task.status]);
			$("#editTaskEmployeeSelect").val(task.participants.split(",")).trigger("change");
			var fileContent = "";
			var files = task.task_files.split(";");
			for (var i = 0; i < files.length; i++) {
				if (files[i] != "") {
					fileContent += '<li class="fa-file">' +
						'<div class="document-file">' +
						'<a href="' + "<?= UPLOADS_URL ?>" + "TaskFiles/" + files[i] + '" download="' + files[i] + '" ><i class="fa fa-file-image"></i></a>' +
						'</div>' +
						'<div class="document-name"><a href="' + "<?= UPLOADS_URL ?>" + "TaskFiles/" + files[i] + '" download="' + files[i] + '" >' + files[i] + '</a></div>' +
						'</li>';
				}
			}
			$("#taskFilesDIV").html(fileContent);
			$("#taskPopup, #editTaskDIV").show();
		}

		function showOnMap(row) {
			var actualRow = $(row).parents('tr');
			if (actualRow.hasClass('child')) {//Check if the current row is a child row
				actualRow = actualRow.prev();//If it is, then point to the row before it (its 'parent')
			}
			var task = dTable.row(actualRow).data();
			if (mapMarker != null) {
				mapMarker.setMap(null);
			}
			mapMarker = new google.maps.Marker({
				position: new google.maps.LatLng(task.latitude, task.longitude),
				map: map,
				title: 'Task location'
			});
			var infoWindowContent = "<p class='f-s-12'><strong>" + task.task_subject + "</strong><br>" + task.task_location + "</p>";
			addInfoWindow(map, mapMarker, infoWindowContent);
			$("#mapPopup, #mapDIV").show();
			google.maps.event.trigger(map, 'resize');
			map.setZoom(map.getZoom());
			map.setCenter({
				lat: parseFloat(task.latitude),
				lng: parseFloat(task.longitude)
			});
		}

		function hideMapPopup() {
			$("#mapPopup, #mapDIV").hide();
		}

		function addInfoWindow(gMap, marker, message) {
			var infoWindow = new google.maps.InfoWindow({
				content: message
			});
			google.maps.event.addListener(marker, 'click', function() {
				infoWindow.open(map, marker);
			});
			infoWindow.open(gMap, marker);
		}

		function kickEmployee(employee_id) {
			var postData = {
				workgroup_id: workgroup_id,
				employee_id: employee_id
			};
			swal({
				title: 'Confirm action',
				text: "Are you sure you want to kick this employee?",
				type: 'error',
				showCancelButton: true,
				confirmButtonColor: '#3085d6',
				cancelButtonColor: '#d33',
				confirmButtonText: 'Yes, kick'
			}).then(function() {
				$.ajax({
					type: "POST",
					url: "<?= BASE_URL ?>" + "workgroup/kick",
					data: postData,
					success: function(response) {
						if (response == "") {
							swal(
								'Member kicked',
								'Employee was kicked from workgroup',
								'success'
							);
							updateMemberStatuses();
						} else {
							swal(
								'Error',
								'The server ran into the following error : ' + response,
								'error'
							);
						}
					}
				});
			});
		};

		function markTaskAsOpened(task_id) {
			var postData = {
				task_id: task_id
			};
			$.ajax({
				type: "POST",
				url: "<?= BASE_URL ?>" + "workgroup/taskOpened",
				data: postData,
				success: function(response) {
					if (response == "") {
						console.log("Task open date set");
					} else {
						swal(
							'Error',
							'The server ran into the following error : ' + response,
							'error'
						);
					}
				}
			});
		}

		function showEditCurrentTaskPopup() {
			hideViewTaskPopup();
			var task = selectedTask;
			
			if (task.opened_on == "") {
				markTaskAsOpened(task.task_id);
				task.opened_on = new Date();
			}
			$("#hiddenEditTaskIDInput").val(task.task_id);
			$("#editTaskSubjectInput").val(task.task_subject);
			$("#editTaskDescriptionInput").val(task.task_description);
			$("#editTaskStartDateInput").val(moment(task.task_startdate).format(dateformat));
			$("#editTaskStartTimeInput").val(moment(task.task_startdate + " " + task.task_starttime).format(timeformat));
			$("#editTaskEndDateInput").val(moment(task.task_enddate).format(dateformat));
			$("#editTaskEndTimeInput").val(moment(task.task_enddate + " " + task.task_endtime).format(timeformat));
			$("#editTaskCustomerSelect").val(task.customer_id).trigger("change");
			$("#editTaskSubsidiarySelect").val(task.subsidiary_id).trigger("change");
			$("#editTaskLocationInput").val(task.task_location);
			$("#hiddenEditTaskLatitudeInput").val(task.latitude);
			$("#hiddenEditTaskLongitudeInput").val(task.longitude);
			$("#editTaskForm input[name=task_visibility]").val([task.task_visibility]);
			$("#editTaskForm input[name=status]").val([task.status]);
			$("#editTaskEmployeeSelect").val(task.participants.split(",")).trigger("change");
			var fileContent = "";
			var files = task.task_files.split(";");
			for (var i = 0; i < files.length; i++) {
				if (files[i] != "") {
					fileContent += '<li class="fa-file">' +
						'<div class="document-file">' +
						'<a href="' + "<?= UPLOADS_URL ?>" + "TaskFiles/" + files[i] + '" download="' + files[i] + '" ><i class="fa fa-file-image"></i></a>' +
						'</div>' +
						'<div class="document-name"><a href="' + "<?= UPLOADS_URL ?>" + "TaskFiles/" + files[i] + '" download="' + files[i] + '" >' + files[i] + '</a></div>' +
						'</li>';
				}
			}
			$("#taskFilesDIV").html(fileContent);
			$("#taskPopup, #editTaskDIV").show();
		}

		function showEditTaskPopupID(task_id) {
			var task;
			for (var i = 0; i < taskArray.length; i++) {
				if (taskArray[i].task_id == task_id) {
					task = taskArray[i];
					break;
				}
			}
			selectedTask = task;
			if (task.opened_on == "") {
				markTaskAsOpened(task.task_id);
				task.opened_on = new Date();
			}
			$("#hiddenEditTaskIDInput").val(task.task_id);
			$("#editTaskSubjectInput").val(task.task_subject);
			$("#editTaskDescriptionInput").val(task.task_description);
			$("#editTaskStartDateInput").val(moment(task.task_startdate).format(dateformat));
			$("#editTaskStartTimeInput").val(moment(task.task_startdate + " " + task.task_starttime).format(timeformat));
			$("#editTaskEndDateInput").val(moment(task.task_enddate).format(dateformat));
			$("#editTaskEndTimeInput").val(moment(task.task_enddate + " " + task.task_endtime).format(timeformat));
			$("#editTaskCustomerSelect").val(task.customer_id).trigger("change");
			$("#editTaskSubsidiarySelect").val(task.subsidiary_id).trigger("change");
			$("#editTaskLocationInput").val(task.task_location);
			$("#hiddenEditTaskLatitudeInput").val(task.latitude);
			$("#hiddenEditTaskLongitudeInput").val(task.longitude);
			$("#editTaskForm input[name=task_visibility]").val([task.task_visibility]);
			$("#editTaskForm input[name=status]").val([task.status]);
			$("#editTaskEmployeeSelect").val(task.participants.split(",")).trigger("change");
			var fileContent = "";
			var files = task.task_files.split(";");
			for (var i = 0; i < files.length; i++) {
				if (files[i] != "") {
					fileContent += '<li class="fa-file">' +
						'<div class="document-file">' +
						'<a href="' + "<?= UPLOADS_URL ?>" + "TaskFiles/" + files[i] + '" download="' + files[i] + '" ><i class="fa fa-file-image"></i></a>' +
						'</div>' +
						'<div class="document-name"><a href="' + "<?= UPLOADS_URL ?>" + "TaskFiles/" + files[i] + '" download="' + files[i] + '" >' + files[i] + '</a></div>' +
						'</li>';
				}
			}
			$("#taskFilesDIV").html(fileContent);
			$("#taskPopup, #editTaskDIV").show();
		}

		function hideEditTaskPopup(row) {
			$("#taskFilesDIV").html("");
			editTaskFiles = [];
			$("#editTaskForm")[0].reset();
			$("#taskPopup, #editTaskDIV").hide();
		}

		function hideViewTaskPopup() {
			$("#viewTaskPopup").hide();
		}

		function getRecentActions() {
			var postData = {
				workgroup_id: workgroup_id
			};
			$.ajax({
				type: "POST",
				url: "<?= BASE_URL ?>" + "campaign/overview",
				data: postData,
				dataType: "json",
				success: function(overview) {
					var recentlySentCampaigns = overview.sent_campaigns;
					var recentlyCreatedCampaigns = overview.created_campaigns;
					var recentlyCreatedLists = overview.created_lists;
					var recentlyCreatedCampaignContent = "";
					var recentlySentCampaignContent = "";
					var recentlyCreatedListContent = "";
					for (var i = 0; i < recentlyCreatedCampaigns.length; i++) {
						var campaign = recentlyCreatedCampaigns[i];
						var mDate = new Date(campaign.created_on);
						mDate = days[mDate.getDay()] + ", " + mDate.getDate() + ". " + months[mDate.getMonth()] + " @ " + ("0" + mDate.getHours()).slice(-2) + ":" + ("0" + mDate.getMinutes()).slice(-2);
						recentlyCreatedCampaignContent += '<div class="task-item p-15 m-b-15 bg-primary" ><strong class="f-s-14">' + campaign.campaign_name + '</strong><p class="m-0">' + mDate + '</p></div>';
					}
					for (var i = 0; i < recentlySentCampaigns.length; i++) {
						var campaign = recentlySentCampaigns[i];
						var mDate = new Date(campaign.send_time);
						mDate = days[mDate.getDay()] + ", " + mDate.getDate() + ". " + months[mDate.getMonth()] + " @ " + ("0" + mDate.getHours()).slice(-2) + ":" + ("0" + mDate.getMinutes()).slice(-2);
						recentlySentCampaignContent += '<div class="task-item p-15 m-b-15 bg-primary" ><strong class="f-s-14">' + campaign.campaign_name + '</strong><p class="m-0">' + mDate + '</p></div>';
					}
					for (var i = 0; i < recentlyCreatedLists.length; i++) {
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

		function getCampaigns() {
			var postData = {
				workgroup_id: workgroup_id
			};
			$.ajax({
				type: "POST",
				url: "<?= BASE_URL ?>" + "campaign/get",
				data: postData,
				dataType: "json",
				success: function(campaigns) {
					campaignArray = campaigns;
					var campaignContent = "";
					for (var i = 0; i < campaigns.length; i++) {
						var campaign = campaigns[i];
						var campaignType = '<i class="ion-android-mail text-white"></i>';
						if (campaign.campaign_type == 1) {
							campaignType = '<i class="ion-android-textsms text-white"></i>';
						}
						var statusLine;
						var campaignStatusColor;
						var campaignIcon;
						if (campaign.status == 0) { //pending
							var mDate = new Date(campaign.created_on);
							campaignStatusColor = "danger";
							campaignIcon = "fa fa-times-circle email-list-icon text-danger";
							mDate = days[mDate.getDay()] + ", " + mDate.getDate() + ". " + months[mDate.getMonth()] + " @ " + ("0" + mDate.getHours()).slice(-2) + ":" + ("0" + mDate.getMinutes()).slice(-2);
							statusLine = "Created <strong>" + mDate + "</strong>";
						} else {
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
							'<span class="email-time">' + moment(campaign.created_on).format(dateformat) + '</span>' +
							'<span class="email-title">' + campaign.campaign_name + '</span>' +
							'<span class="email-desc">' + campaign.list_name + '<b>	&#183; </b>' + statusLine + '</span>' +
							'</div>' +
							'</div>' +
							'</li>';
					}
					$("#campaignList").html(campaignContent);
				}
			});
		}

		function getLists() {
			var postData = {
				workgroup_id: workgroup_id
			};
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
					for (var i = 0; i < lists.length; i++) {
						if (lists[i].list_type == 0) { //email list
							$("#emailCampaignListSelect").append($('<option>', {
								value: lists[i].list_id,
								text: lists[i].list_name
							}));
						} else {
							$("#smsCampaignListSelect").append($('<option>', {
								value: lists[i].list_id,
								text: lists[i].list_name
							}));
						}
						var mDate = new Date(lists[i].created_on);
						mDate = days[mDate.getDay()] + ", " + mDate.getDate() + ". " + months[mDate.getMonth()] + " @ " + ("0" + mDate.getHours()).slice(-2) + ":" + ("0" + mDate.getMinutes()).slice(-2);
						var statusLine = "Created <strong>" + mDate + "</strong>";
						var listType = "E-mail";
						if (lists[i].list_type == 1) {
							listType = "SMS";
						}
						var nrOfSubs = 0;
						if (lists[i].subscribers != "") {
							nrOfSubs = lists[i].subscribers.split(";").length
						}
						subscriberContent += '<li class="list-group-item unread">' +
							'<div class="email-checkbox"><label><i class="far fa-square"></i><input type="checkbox" data-checked="list-checkbox"></label></div>' +
							'<div class="email-user m-r-10 bg-blue">' +
							'<i class="ion-android-share-alt text-white"></i>' +
							'</div>' +
							'<div class="email-info">' +
							'<div>' +
							'<span class="email-time">' + moment(lists[i].created_on).format(dateformat) + '</span>' +
							'<span class="email-title">' + lists[i].list_name + '</span>' +
							'<span class="email-desc">' + listType + "<b> 	&#183; </b><strong>" + nrOfSubs + ' </strong>Subscribers</span>' +
							'</div>' +
							'</div>' +
							'</li>';
					}
					$("#subscriberList").html(subscriberContent);
				}
			});
		}

		function removeList(list_id) {
			var postData = {
				list_id: list_id
			};
			$.ajax({
				type: "POST",
				url: "<?= BASE_URL ?>" + "campaignlist/delete",
				data: postData,
				success: function(response) {
					if (response == "") {
						console.log("List removed");
					} else {
						swal(
							'Error',
							'The server ran into the following error : ' + response,
							'error'
						);
					}
				}
			});
		}

		function removeCampaign(campaign_id) {
			var postData = {
				campaign_id: campaign_id
			};
			console.log(postData);
			$.ajax({
				type: "POST",
				url: "<?= BASE_URL ?>" + "campaign/delete",
				data: postData,
				success: function(response) {
					if (response == "") {
						console.log("Campaign removed");
					} else {
						swal(
							'Error',
							'The server ran into the following error : ' + response,
							'error'
						);
					}
				}
			});
		}

		function getEmployees() {
			$.ajax({
				type: "POST",
				url: "<?= BASE_URL ?>" + "employees/listall",
				data: null,
				dataType: "json",
				success: function(allemployees) {
					employeeArray = allemployees;
					allemployees.sort(function(a, b) {
						return a.department_name > b.department_name;
					});
					var departments = [];
					var fileTreeArray = [];
					var membersArray = [];
					var moderatorIds = [];
					employeeIds = [];
					for (var i = 0; i < allemployees.length; i++) {
						if (departments.indexOf(allemployees[i].department_name) == -1) {
							departments.push(allemployees[i].department_name);
							fileTreeArray.push({
								text: allemployees[i].department_name,
								type: "default",
								children: []
							});
							membersArray.push({
								text: allemployees[i].department_name,
								type: "default",
								children: []
							});
						}
					}
					for (var i = 0; i < employees.length; i++) {
						employeeIds.push(employees[i].employee_id);
					}
					for (var i = 0; i < moderators.length; i++) {
						moderatorIds.push(moderators[i].employee_id);
					}
					$("#editTaskEmployeeSelect, #newTaskEmployeeSelect").html("");
					var lastDepartment = null;
					for (var i = 0; i < allemployees.length; i++) {
						if (employeeIds.indexOf(allemployees[i].employee_id) != -1) {
							if (lastDepartment == null) {
								$("#editTaskEmployeeSelect, #newTaskEmployeeSelect").append("<optgroup label='" + allemployees[i].department_name + "'>");
								lastDepartment = allemployees[i].department_name;
							} else if (allemployees[i].department_name != lastDepartment) {
								$("#editTaskEmployeeSelect, #newTaskEmployeeSelect").append("</optgroup><optgroup label='" + allemployees[i].department_name + "'>");
								lastDepartment = allemployees[i].department_name;
							}
							$("#editTaskEmployeeSelect, #newTaskEmployeeSelect").append($('<option>', {
								value: allemployees[i].employee_id,
								text: allemployees[i].employee_name + " " + allemployees[i].employee_surname
							}));
						}
					}
					$("#editTaskEmployeeSelect, #newTaskEmployeeSelect").append("</optgroup>");
					for (var i = 0; i < allemployees.length; i++) {
						if (employeeIds.indexOf(allemployees[i].employee_id) == -1) {
							for (var j = 0; j < fileTreeArray.length; j++) {
								var currentDepartment = fileTreeArray[j];
								if (currentDepartment.text == allemployees[i].department_name) {
									currentDepartment.children.push({
										id: allemployees[i].employee_id,
										type: "user",
										text: allemployees[i].employee_name + " " + allemployees[i].employee_surname
									});
									break;
								}
							}
						} else {
							for (var j = 0; j < membersArray.length; j++) {
								var currentDepartment = membersArray[j];
								if (currentDepartment.text == allemployees[i].department_name) {
									if (moderatorIds.indexOf(allemployees[i].employee_id) != -1) {
										currentDepartment.children.push({
											id: allemployees[i].employee_id,
											type: "user",
											state: {
												selected: true,
												opened: false,
												disabled: false
											},
											text: allemployees[i].employee_name + " " + allemployees[i].employee_surname
										});
									} else {
										currentDepartment.children.push({
											id: allemployees[i].employee_id,
											type: "user",
											text: allemployees[i].employee_name + " " + allemployees[i].employee_surname
										});
									}
									break;
								}
							}
						}
					}
					if (!treesLoaded) {
						$('#inviteTree')
							.on('select_node.jstree', function(e, data) {
								var objNode = data.instance.get_node(data.selected);
								if (objNode.type == "user") {
									if (invitedArray.indexOf(objNode.id) == -1) {
										$('#inviteInput').tagit('createTag', objNode.text);
										invitedArray.push(objNode.id);
									} else {
										$('#inviteInput').tagit('removeTagByLabel', objNode.text);
										invitedArray.splice(invitedArray.indexOf(objNode.id), 1);
									}
								}
							}).on('deselect_node.jstree', function(e, data) {
								var objNode = data.node;
								if (objNode.type == "user") {
									$('#inviteInput').tagit('removeTagByLabel', objNode.text);
									invitedArray.splice(invitedArray.indexOf(objNode.id), 1);
								}
							}).jstree({
								core: {
									data: fileTreeArray
								},
								"types": {
									"default": {
										"icon": "fa fa-folder text-warning fa-lg"
									},
									"user": {
										"icon": "fa fa-user text-primary fa-lg"
									}
								},
								plugins: ["types"]
							});
						$('#moderatorTree')
							.on('select_node.jstree', function(e, data) {
								var objNode = data.instance.get_node(data.selected);
								if (objNode.type == "user") {
									if (moderatorArray.indexOf(objNode.id) == -1) {
										$('#moderatorInput').tagit('createTag', objNode.text);
										moderatorArray.push(objNode.id);
									} else {
										$('#moderatorInput').tagit('removeTagByLabel', objNode.text);
										moderatorArray.splice(moderatorArray.indexOf(objNode.id), 1);
									}
								}
							}).on('deselect_node.jstree', function(e, data) {
								var objNode = data.node;
								if (objNode.type == "user") {
									$('#moderatorInput').tagit('removeTagByLabel', objNode.text);
									moderatorArray.splice(moderatorArray.indexOf(objNode.id), 1);
								}
							}).jstree({
								core: {
									data: membersArray
								},
								"types": {
									"default": {
										"icon": "fa fa-folder text-warning fa-lg"
									},
									"user": {
										"icon": "fa fa-user text-primary fa-lg"
									}
								},
								plugins: ["types"]
							});
						treesLoaded = true;
						
						if (hasViewPermissions){
							var filterContent = '<div onClick="showEmployeeTasks(this, -1)" class="fc-event"><div class="fc-event-icon"><i class="fa fa-circle fa-fw text-primary"></i></div> All tasks</div>';
							for (var i = 0; i < employees.length; i++) {
								var employee = employees[i];
								if (employee.employee_id == loggedEmployee) {
									filterContent += '<div onClick="showEmployeeTasks(this, ' + i + ')" class="fc-event fc-active"><div class="fc-event-icon"><i class="fa fa-circle fa-fw text-success"></i></div> My tasks</div>';
								} else {
									filterContent += '<div onClick="showEmployeeTasks(this,' + i + ')" class="fc-event"><div class="fc-event-icon"><i class="fa fa-circle fa-fw text-danger"></i></div>' + employee.employee_name + " " + employee.employee_surname + '</div>';
								}
							}
							$("#calendarFilters").html(filterContent);
						}else{
							var filterContent;
							for (var i = 0; i < employees.length; i++) {
								var employee = employees[i];
								if (employee.employee_id == loggedEmployee) {
									filterContent = '<div onClick="showEmployeeTasks(this, ' + i + ')" class="fc-event"><div class="fc-event-icon"><i class="fa fa-circle fa-fw text-success"></i></div> My tasks</div>';
									break;
								}
							}
							$("#calendarFilters").html(filterContent);
						}
					}
					getWorkgroupTasks();
				}
			});
		}


		function getWorkgroupTasks() {
			var postData = {
				workgroup_id: workgroup_id
			};
			$.ajax({
				type: "POST",
				url: "workgroup/getTasks",
				data: postData,
				dataType: "json",
				success: function(tasks) {
					taskArray = tasks;
					
					handleTable(tasks);
					
					var todoItems = [];
					var workingItems = [];
					var finishedItems = [];
					var todaysDate = new Date();
					var tommorowDate = new Date(todaysDate.getFullYear(), todaysDate.getMonth(), todaysDate.getDate() + 1);
					var dayAfterTommorowDate = new Date(todaysDate.getFullYear(), todaysDate.getMonth(), todaysDate.getDate() + 2);
					var todaysTasksContent = "";
					var upcomingTasksContent = "";
					var todaysCount = 0;
					var mToday = moment();
					for (var j = 0; j < tasks.length; j++) {
						var task = tasks[j];
						var taskDate = new Date(task.task_startdate + " " + task.task_starttime + ":00");
						var taskParticipants = task.participants.split(",");
						var participantString = getParticipantString(taskParticipants);
						if ((mToday.isBetween(moment(task.task_startdate), moment(task.task_enddate)) || mToday.isSame(moment(task.task_startdate), "day") || mToday.isSame(moment(task.task_enddate), "day")) && taskParticipants.indexOf(loggedEmployee) != -1) {
							if (tasks[j].status == 0) {
								todoItems.push({
									'id': task.task_id,
									'title': "<strong class='f-s-14'>" + task.task_subject + "</strong><span class='pull-right f-s-24'><i class='fa fa-clock'></i>&nbsp;" + task.task_starttime + "</span><br><p class='m-0'>" + participantString + "</p>",
									"dragend": function(el) {
										var kanbanTask = $(el).attr("data-eid"); //gets ID of dropped task in Kanban board
										getTaskBoard(kanbanTask);
									}
								});
							} else if (tasks[j].status == 1) {
								workingItems.push({
									'id': tasks[j].task_id,
									'title': "<strong class='f-s-14'>" + task.task_subject + "</strong><span class='pull-right f-s-24'><i class='fa fa-clock'></i>&nbsp;" + task.task_starttime + "</span><p class='m-0'>" + participantString + "</p>",
									"dragend": function(el) {
										var kanbanTask = $(el).attr("data-eid"); //gets ID of dropped task in Kanban board
										getTaskBoard(kanbanTask);
									}
								});
							} else {
								finishedItems.push({
									'id': tasks[j].task_id,
									'title': "<strong class='f-s-14'>" + task.task_subject + "</strong><span class='pull-right f-s-24'><i class='fa fa-clock'></i>&nbsp;" + task.task_starttime + "</span><p class='m-0'>" + participantString + "</p>",
									"dragend": function(el) {
										var kanbanTask = $(el).attr("data-eid"); //gets ID of dropped task in Kanban board
										getTaskBoard(kanbanTask);
									}
								});
							}
							taskColor = "bg-success text-white";
							if (task.status == 0) {
								taskColor = "bg-danger text-white";
							} else if (task.status == 1) {
								taskColor = "bg-primary text-white";
							}
							todaysTasksContent += '<div class="task-item p-15 m-b-15 ' + taskColor + '" onClick="showEditTaskPopupID(' + task.task_id + ')" ><strong class="f-s-14">' + task.task_subject + '</strong><span class="pull-right f-s-24"><i class="fa fa-clock"></i>&nbsp;' + task.task_starttime + '</span><p class="m-0">' + participantString + '</p></div>';
							todaysCount++;
						} else if (taskDate.setHours(0, 0, 0, 0) == tommorowDate.setHours(0, 0, 0, 0) || taskDate.setHours(0, 0, 0, 0) == dayAfterTommorowDate.setHours(0, 0, 0, 0)) {
							taskColor = "bg-success text-white";
							if (task.status == 0) {
								taskColor = "bg-danger text-white";
							} else if (task.status == 1) {
								taskColor = "bg-primary text-white";
							}
							var prettyTaskDate = moment(new Date(task.task_startdate + " " + task.task_starttime)).format(dateformat + ", " + timeformat);
							upcomingTasksContent += '<div class="task-item p-15 m-b-15 ' + taskColor + '" onClick="showEditTaskPopupID(' + task.task_id + ')" ><strong class="f-s-14">' + task.task_subject + '</strong><span class="pull-right f-s-24"><i class="fa fa-clock"></i>&nbsp;' + prettyTaskDate + '</span><p class="m-0">' + participantString + '</p></div>';
						}
					}
					if (todaysTasksContent != "") {
						$("#todaysTasksList").html(todaysTasksContent);
					} else {
						$("#todaysTasksList").html("You have no tasks scheduled for today.");
					}
					if (upcomingTasksContent != "") {
						$("#upcomingTasksList").html(upcomingTasksContent);
					} else {
						$("#upcomingTasksList").html("You have no upcoming tasks.");
					}
					if (hasViewPermissions) {
						var sections = [];
						var items = [];
						for (var i = 0; i < employees.length; i++) {
							var employee = employees[i];
							sections.push({
								id: employee.employee_id,
								name: employee.employee_name + " " + employee.employee_surname
							});
						}
						for (var i = 0; i < tasks.length; i++) {
							var task = tasks[i];
							taskColor = "bg-success text-white";
							if (task.status == 0) {
								taskColor = "bg-danger text-white";
							} else if (task.status == 1) {
								taskColor = "bg-primary text-white";
							}
							var participantArray = task.participants.split(",");
							for (var j = 0; j < participantArray.length; j++) { //create task for each employee participating in task
								if (task.status != 2) {
									items.push({
										id: i,
										name: '<div onClick="showEditTaskPopupID(' + task.task_id + ')">' + task.task_subject + '</div>',
										sectionID: participantArray[j],
										start: moment(new Date(task.task_startdate + " " + task.task_starttime)),
										end: moment(new Date(task.task_enddate + " " + task.task_endtime)),
										classes: taskColor
									});
								} else {
									items.push({
										id: i,
										name: '<div onClick="showTaskPageID(' + task.task_id + ')">' + task.task_subject + '</div>',
										sectionID: participantArray[j],
										start: moment(new Date(task.task_startdate + " " + task.task_starttime)),
										end: moment(new Date(task.task_enddate + " " + task.task_endtime)),
										classes: taskColor
									});
								}
							}
						}
						var today = moment().startOf('day');
						cScheduler = {
							Periods: [{
									Name: 'Today',
									Label: 'Today',
									TimeframePeriod: (120 * 1),
									TimeframeOverall: (60 * 24 * 1),
									TimeframeHeaders: [
										'Do MMMM YYYY',
									]
								},
								{
									Name: '3 days',
									Label: '3 days',
									TimeframePeriod: (60 * 2),
									TimeframeOverall: (60 * 24 * 3),
									TimeframeHeaders: [
										'Do MMM',
										'HH'
									],
									Classes: 'period-3day'
								},
								{
									Name: '1 week',
									Label: '1 week',
									TimeframePeriod: (60 * 24),
									TimeframeOverall: (60 * 24 * 7),
									TimeframeHeaders: [
										'MMMM YYYY',
										'dddd Do'
									]
								}
							],
							Items: items,
							Sections: sections,
							Init: function() {
								TimeScheduler.Options.GetSections = cScheduler.GetSections;
								TimeScheduler.Options.GetSchedule = cScheduler.GetSchedule;
								TimeScheduler.Options.Start = today;
								TimeScheduler.Options.Periods = cScheduler.Periods;
								TimeScheduler.Options.SelectedPeriod = 'Today';
								TimeScheduler.Options.Element = $('.schedulerContainer');
								TimeScheduler.Options.AllowDragging = false;
								TimeScheduler.Options.AllowResizing = false;
								TimeScheduler.Options.Events.ItemClicked = cScheduler.Item_Clicked;
								TimeScheduler.Options.Events.ItemDropped = cScheduler.Item_Dragged;
								TimeScheduler.Options.Events.ItemResized = cScheduler.Item_Resized;
								TimeScheduler.Options.Events.ItemMovement = cScheduler.Item_Movement;
								TimeScheduler.Options.Events.ItemMovementStart = cScheduler.Item_MovementStart;
								TimeScheduler.Options.Events.ItemMovementEnd = cScheduler.Item_MovementEnd;
								TimeScheduler.Options.Text.NextButton = '&nbsp;';
								TimeScheduler.Options.Text.PrevButton = '&nbsp;';
								TimeScheduler.Options.MaxHeight = 100;
								TimeScheduler.Init();
							},
							GetSections: function(callback) {
								callback(cScheduler.Sections);
							},
							GetSchedule: function(callback, start, end) {
								callback(cScheduler.Items);
							},
							Item_Clicked: function(item) {
								console.log(item);
							},
							Item_Dragged: function(item, sectionID, start, end) {
								var foundItem;
								for (var i = 0; i < cScheduler.Items.length; i++) {
									foundItem = cScheduler.Items[i];
									if (foundItem.id === item.id) {
										foundItem.sectionID = sectionID;
										foundItem.start = start;
										foundItem.end = end;
										cScheduler.Items[i] = foundItem;
									}
								}
								TimeScheduler.Init();
							},
							Item_Resized: function(item, start, end) {
								var foundItem;
								for (var i = 0; i < cScheduler.Items.length; i++) {
									foundItem = cScheduler.Items[i];
									if (foundItem.id === item.id) {
										foundItem.start = start;
										foundItem.end = end;
										cScheduler.Items[i] = foundItem;
									}
								}
								TimeScheduler.Init();
							},
							Item_Movement: function(item, start, end) {
								var html;
								html = '<div>';
								html += '   <div>';
								html += '       Start: ' + start.format('Do MMM YYYY HH:mm');
								html += '   </div>';
								html += '   <div>';
								html += '       End: ' + end.format('Do MMM YYYY HH:mm');
								html += '   </div>';
								html += '</div>';
								$('.realtime-info').empty().append(html);
							},
							Item_MovementStart: function() {
								$('.realtime-info').show();
							},
							Item_MovementEnd: function() {
								$('.realtime-info').hide();
							}
						};
					} else {
						var sections = [];
						var items = [];
						for (var i = 0; i < employees.length; i++) {
							var employee = employees[i];
							if (employee.employee_id == loggedEmployee) {
								sections.push({
									id: employee.employee_id,
									name: employee.employee_name + " " + employee.employee_surname
								});
								break;
							}
						}
						for (var i = 0; i < tasks.length; i++) {
							var task = tasks[i];
							taskColor = "bg-success text-white";
							if (task.status == 0) {
								taskColor = "bg-danger text-white";
							} else if (task.status == 1) {
								taskColor = "bg-primary text-white";
							}
							var participantArray = task.participants.split(",");
							if (participantArray.indexOf(loggedEmployee) != -1) {
								for (var j = 0; j < participantArray.length; j++) { //create task for each employee participating in task
									if (task.status != 2) {
										items.push({
											id: i,
											name: '<div onClick="showEditTaskPopupID(' + task.task_id + ')">' + task.task_subject + '</div>',
											sectionID: participantArray[j],
											start: moment(new Date(task.task_startdate + " " + task.task_starttime)),
											end: moment(new Date(task.task_enddate + " " + task.task_endtime)),
											classes: taskColor
										});
									} else {
										items.push({
											id: i,
											name: '<div onClick="showTaskPageID(' + task.task_id + ')">' + task.task_subject + '</div>',
											sectionID: participantArray[j],
											start: moment(new Date(task.task_startdate + " " + task.task_starttime)),
											end: moment(new Date(task.task_enddate + " " + task.task_endtime)),
											classes: taskColor
										});
									}
								}
							}
						}
						var today = moment().startOf('day');
						cScheduler = {
							Periods: [{
									Name: 'Today',
									Label: 'Today',
									TimeframePeriod: (120 * 1),
									TimeframeOverall: (60 * 24 * 1),
									TimeframeHeaders: [
										'Do MMMM YYYY',
									]
								},
								{
									Name: '1 week',
									Label: '1 week',
									TimeframePeriod: (60 * 24),
									TimeframeOverall: (60 * 24 * 7),
									TimeframeHeaders: [
										'MMMM YYYY',
										'dddd Do'
									]
								}
							],
							Items: items,
							Sections: sections,
							Init: function() {
								TimeScheduler.Options.GetSections = cScheduler.GetSections;
								TimeScheduler.Options.GetSchedule = cScheduler.GetSchedule;
								TimeScheduler.Options.Start = today;
								TimeScheduler.Options.Periods = cScheduler.Periods;
								TimeScheduler.Options.SelectedPeriod = '1 week';
								TimeScheduler.Options.Element = $('.schedulerContainer');
								TimeScheduler.Options.AllowDragging = false;
								TimeScheduler.Options.AllowResizing = false;
								TimeScheduler.Options.Events.ItemClicked = cScheduler.Item_Clicked;
								TimeScheduler.Options.Events.ItemDropped = cScheduler.Item_Dragged;
								TimeScheduler.Options.Events.ItemResized = cScheduler.Item_Resized;
								TimeScheduler.Options.Events.ItemMovement = cScheduler.Item_Movement;
								TimeScheduler.Options.Events.ItemMovementStart = cScheduler.Item_MovementStart;
								TimeScheduler.Options.Events.ItemMovementEnd = cScheduler.Item_MovementEnd;
								TimeScheduler.Options.Text.NextButton = '&nbsp;';
								TimeScheduler.Options.Text.PrevButton = '&nbsp;';
								TimeScheduler.Options.MaxHeight = 100;
								TimeScheduler.Init();
							},
							GetSections: function(callback) {
								callback(cScheduler.Sections);
							},
							GetSchedule: function(callback, start, end) {
								callback(cScheduler.Items);
							},
							Item_Clicked: function(item) {
								console.log(item);
							},
							Item_Dragged: function(item, sectionID, start, end) {
								var foundItem;
								for (var i = 0; i < cScheduler.Items.length; i++) {
									foundItem = cScheduler.Items[i];
									if (foundItem.id === item.id) {
										foundItem.sectionID = sectionID;
										foundItem.start = start;
										foundItem.end = end;
										cScheduler.Items[i] = foundItem;
									}
								}
								TimeScheduler.Init();
							},
							Item_Resized: function(item, start, end) {
								var foundItem;
								for (var i = 0; i < cScheduler.Items.length; i++) {
									foundItem = cScheduler.Items[i];
									if (foundItem.id === item.id) {
										foundItem.start = start;
										foundItem.end = end;
										cScheduler.Items[i] = foundItem;
									}
								}
								TimeScheduler.Init();
							},
							Item_Movement: function(item, start, end) {
								var html;
								html = '<div>';
								html += '   <div>';
								html += '       Start: ' + start.format('Do MMM YYYY HH:mm');
								html += '   </div>';
								html += '   <div>';
								html += '       End: ' + end.format('Do MMM YYYY HH:mm');
								html += '   </div>';
								html += '</div>';
								$('.realtime-info').empty().append(html);
							},
							Item_MovementStart: function() {
								$('.realtime-info').show();
							},
							Item_MovementEnd: function() {
								$('.realtime-info').hide();
							}
						};
					}
					$("#kanbanBoard").html("");
					kanbanBoard = new jKanban({
						element: '#kanbanBoard',
						boards: [{
								'id': 'todoBoard',
								'title': 'Incomplete<span onClick="showNewTaskPopup(0)" class="kanbanHeaderBtn pull-right"><i class="fa fa-plus-circle"></i></span>',
								'class': 'bg-danger',
								'item': todoItems
							},
							{
								'id': 'workingBoard',
								'title': 'In progress<span onClick="showNewTaskPopup(1)" class="kanbanHeaderBtn pull-right"><i class="fa fa-plus-circle"></i></span>',
								'class': 'bg-primary',
								'item': workingItems
							},
							{
								'id': 'doneBoard',
								'title': 'Finished<span onClick="showNewTaskPopup(2)" class="kanbanHeaderBtn pull-right"><i class="fa fa-plus-circle"></i></span>',
								'class': 'bg-success',
								'item': finishedItems
							}
						]
					});
					
					handleCalendar(tasks);
					
					if (firstPageLoad) {
						App.init();
						firstPageLoad = false;
					}
				}
			});
		}

		function handleCalendar(tasks){
					var actualEvents = [];
					for (var i = 0; i < tasks.length; i++) {
						var color = green;
						var task = tasks[i];
						if (task.status == 0) {
							color = red;
						} else if (task.status == 1) {
							color = blue;
						}
						var snippet = task.task_description.substr(0, 32);
						if (task.task_description.length > 32) {
							snippet += "...";
						}
						var participants = task.participants.split(",");
						var displayMe = false;
						if (firstPageLoad && participants.indexOf(loggedEmployee) != -1) {
							displayMe = true;
						} else if (!firstPageLoad) {
							if (selectedEmployee != null) {
								if (selectedStatus == -1) {
									if (participants.indexOf(loggedEmployee) != -1) {
										displayMe = true;
									} else {
										displayMe = false;
									}
								} else {
									if (participants.indexOf(loggedEmployee) != -1 && task.status == selectedStatus) {
										displayMe = true;
									} else {
										displayMe = false;
									}
								}
							} else {
								if (selectedStatus == -1) {
									displayMe = true;
								} else {
									if (task.status == selectedStatus) {
										displayMe = true;
									} else {
										displayMe = false;
									}
								}
							}
						}
						actualEvents.push({
							id: task.task_id,
							display: displayMe,
							participants: task.participants,
							status: task.status,
							employee_id: task.employee_id,
							title: task.task_subject,
							start: task.task_startdate + " " + task.task_starttime,
							end: task.task_enddate + " " + task.task_endtime,
							description: task.task_description,
							color: color
						});
					}
					var lastView = Cookies.get('workgroup_defaultView') || 'month';

					if (calendarInitiated){
						var events = $("#calendar").fullCalendar("clientEvents");
						if (events.length == actualEvents.length){
							for (var i = 0; i < events.length; i++){
								var eventToUpdate = events[i];
								for (var j = 0; j < actualEvents.length; j++){
									var cEvent = actualEvents[j];
									if (eventToUpdate.id == cEvent.id){
										eventToUpdate.title = cEvent.title;
										eventToUpdate.participants = cEvent.participants;
										eventToUpdate.status = cEvent.status;
										eventToUpdate.start = cEvent.start;
										eventToUpdate.end = cEvent.end;
										eventToUpdate.description = cEvent.description;
										eventToUpdate.color = cEvent.color;
										eventToUpdate.display = cEvent.display;
									}
								}
							}
							$("#calendar").fullCalendar("updateEvents", events);
						}else{
							$('#calendar').fullCalendar('removeEvents');
							$('#calendar').fullCalendar('addEventSource', actualEvents);
						}
					}else{
						$('#calendar').fullCalendar({
							customButtons: {
								allBtn: {
									text: "All tasks",
									click: function() {
										$(this).addClass("fc-state-active");
										$(".fc-progressBtn-button, .fc-pendingBtn-button, .fc-finishedBtn-button").removeClass("fc-state-active");
										filterTasksByStatus(-1);
									}
								},
								finishedBtn: {
									text: 'Finished',
									click: function() {
										$(this).addClass("fc-state-active");
										$(".fc-progressBtn-button, .fc-pendingBtn-button, .fc-allBtn-button").removeClass("fc-state-active");
										filterTasksByStatus(2);
									}
								},
								progressBtn: {
									text: "In progress",
									click: function() {
										$(this).addClass("fc-state-active");
										$(".fc-finishedBtn-button, .fc-pendingBtn-button, .fc-allBtn-button").removeClass("fc-state-active");
										filterTasksByStatus(1);
									}
								},
								pendingBtn: {
									text: "Incomplete",
									click: function() {
										$(this).addClass("fc-state-active");
										$(".fc-progressBtn-button, .fc-finishedBtn-button, .fc-allBtn-button").removeClass("fc-state-active");
										filterTasksByStatus(0);
									}
								}
							},
							header: {
								left: 'month,agendaWeek,agendaDay,listWeek, allBtn,finishedBtn,progressBtn,pendingBtn',
								center: 'title',
								right: 'prev,today,next '
							},
							navLinks: true,
							height: 900,
							slotDuration: '00:30:00',
							snapDuration: '00:30:00',
							minTime: "01:00",
							maxTime: "24:00",
							defaultTimedEventDuration: '01:00',
							defaultView: lastView,
							nowIndicator: true,
							selectable: true,
							selectHelper: true,
							eventDurationEditable: false,
							slotLabelFormat: timeformat,
							dayOfMonthFormat: 'ddd ' + dateformat,
							timeFormat: timeformat,
							editable: hasTaskPermissions,
							eventLimit: true, // allow "more" link when too many events
							events: actualEvents,
							viewRender: function(view) {
								Cookies.set('workgroup_defaultView', view.name);
							},
							eventDragStart: function( event, jsEvent, ui, view ) { 
								isDraggingEvent = true;
							},
							eventDragStop: function( event, jsEvent, ui, view ) {
								isDraggingEvent = false;
							},
							select: function(start, end) {
								showNewTaskPopup();
								if ($("#calendar").fullCalendar('getView').name != "month"){
									$("#newTaskStartDateInput").val(start.format(dateformat));
									$("#newTaskStartTimeInput").val(start.format(timeformat));
									$("#newTaskEndDateInput").val(end.format(dateformat));
									$("#newTaskEndTimeInput").val(end.format(timeformat));
								}
								$('#calendar').fullCalendar('unselect');
							},
							eventRender: function(event, element, view) {
								if (!event.display) {
									$(element).css("display", "none");
								} else {
									$(element).css("display", "block");
								}
							},
							eventDrop: function(event, delta, revertFunc, jsEvent, ui, view) {
								swal({
									title: 'Confirm task rescheduling',
									text: "Are you sure you want to reschedule this task?",
									type: 'info',
									showCancelButton: true,
									confirmButtonColor: '#3085d6',
									cancelButtonColor: '#d33',
									confirmButtonText: 'Yes, reschedule'
								}).then(
									value => {
										updateTask(event.id, event.start.format("YYYY-MM-DD"), event.start.format("HH:mm"), event.end.format("YYYY-MM-DD"), event.end.format("HH:mm"));
									},
									dismiss => {
										revertFunc();
									}
								).catch(swal.noop);
							},
							eventClick: function(event, element) {
								var task;
								for (var i = 0; i < taskArray.length; i++) {
									if (taskArray[i].task_id == event.id) {
										task = taskArray[i];
										break;
									}
								}
								selectedTask = task;
								showViewTaskPopup(element);
							}
						});
						$(".fc-allBtn-button").addClass("fc-state-active");
						calendarInitiated = true;
					}
		}

		function handleTable(tasks){
					if (dTable != null) {
						if (hideFinished){
							var activeTasks = [];
							for (var i = 0; i < tasks.length; i++){
								if (tasks[i].status < 2){
									activeTasks.push(tasks[i]);
								}
							}
							dTable.clear().rows.add(activeTasks).draw(false);
						}else{
							dTable.clear().rows.add(tasks).draw(false);
						}
						if (displayChanged){
							dTable.columns([1,2,3,6,7]).every(function(index) {
										var column = this;
										var name;
										if (index == 1){
											name = "Priority";
										}else if (index == 2) {
											name = "Customer";
										}else if (index == 3) {
											name = "Assigned to";
										}else if (index == 6) {
											name = "Created by";
										} else {
											name = "Status";
										}
										var select = $(name + '<br><select id="select' + index + '" ><option value="">No filter</option></select>')
											.appendTo($(column.header()).empty())
											.on('change', function() {
												var val = $(this).val();
												val = $('<div/>').html(val).text();
												column
													.search(val, true, false)
													.draw();
											});
										if (index != 3){
											column.cells('', column[0]).render('display').sort().unique().each(function(d, j) {
												select.append('<option value="' + d + '">' + d + '</option>')
											});
										}else{
											var uniqueEmployees = [];
											column.cells('', column[0]).render('display').sort().unique().each(function(d, j) {
												var participants = d.split(",");
														for (var i = 0; i < participants.length; i++){
															var participant = participants[i].trim();
															if (uniqueEmployees.indexOf(participant) == -1){
																select.append('<option value="' + participant + '">' + participant + '</option>');
																uniqueEmployees.push(participant);
															}
														}
											});
										}
									});
							dTable.search('').columns().search('').draw(false);
							displayChanged = false;
						}
					}else{
						var activeTasks = [];
						for (var i = 0; i < tasks.length; i++){
							if (tasks[i].status < 2){
								activeTasks.push(tasks[i]);
							}
						}
						dTable = $('#taskTable').DataTable({
							initComplete: function() {
								this.api().columns([1,2,3,6,7]).every(function(index) {
									var column = this;
									var name;
									if (index == 1){
										name = "Priority";
									}else if (index == 2) {
										name = "Customer";
									}else if (index == 3) {
										name = "Assigned to";
									}else if (index == 6) {
										name = "Created by";
									} else {
										name = "Status";
									}
									var select = $(name + '<br><select id="select' + index + '" ><option value="">No filter</option></select>')
										.appendTo($(column.header()).empty())
										.on('change', function() {
											var val = $(this).val();
											val = $('<div/>').html(val).text();
											column
												.search(val, true, false)
												.draw();
										});
									if (index != 3){
										column.cells('', column[0]).render('display').sort().unique().each(function(d, j) {
											select.append('<option value="' + d + '">' + d + '</option>')
										});
									}else{
										var uniqueEmployees = [];
										column.cells('', column[0]).render('display').sort().unique().each(function(d, j) {
											var participants = d.split(",");
													for (var i = 0; i < participants.length; i++){
														var participant = participants[i].trim();
														if (uniqueEmployees.indexOf(participant) == -1){
															select.append('<option value="' + participant + '">' + participant + '</option>');
															uniqueEmployees.push(participant);
														}
													}
										});
									}
								});
							},
							"aaData": activeTasks,
							"order": [
								[3, "asc"]
							],
							"columns": [
								{
									"data": "task_subject"
								},
								{
									"data": "priority"
								},
								{
									"data": "customer_id"
								},
								{
									"data": "participants"
								},
								{
									'data': "task_startdate",
								},
								{
									'data': "task_enddate",
								},
								{
									"data": "employee_name"
								},
								{
									"data": "status"
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
										"render": function ( data, type, row ) {
											if (data == "Low"){
												return "<label class='label label-success'>" + data + "</label>";
											}else if (data == "Normal"){
												return "<label class='label label-primary'>" + data + "</label>";
											}else{
												return "<label class='label label-danger'>" + data + "</label>";
											}
										},
										"targets": 1,
										"orderable": false
								},
								{
									// The `data` parameter refers to the data for the cell (defined by the
									// `data` option, which defaults to the column being worked with, in
									// this case `data: 0`.
									"render": function ( data, type, row ) {
										if (data != null){
											return "<a target='_blank' class='text-primary hover-underline text-ellipsis' href='customerdetails?customer_id=" + data + "'>" + row.customer_name + '</span>';
										}else{
											return "Not specified";
										}
									},
									"targets": 2,
									orderable: false
								},
								{
									// The `data` parameter refers to the data for the cell (defined by the
									// `data` option, which defaults to the column being worked with, in
									// this case `data: 0`.
									"render": function(data, type, row) {
										return getEmployeeString(data);
									},
									"targets": 3,
									orderable: false
								},
								{
									// The `data` parameter refers to the data for the cell (defined by the
									// `data` option, which defaults to the column being worked with, in
									// this case `data: 0`.
									"render": function(data, type, row) {
										if (type === 'display' || type === 'filter'){
											return moment(row.task_startdate + " " + row.task_starttime).format(dateformat + ", " + timeformat);
										}else{
											return data;
										}
									},
									"targets": 4
								},
								{
									// The `data` parameter refers to the data for the cell (defined by the
									// `data` option, which defaults to the column being worked with, in
									// this case `data: 0`.
									"render": function(data, type, row) {
										return moment(row.task_enddate + " " + row.task_endtime).format(dateformat + ", " + timeformat);
									},
									"targets": 5
								},
								{
									// The `data` parameter refers to the data for the cell (defined by the
									// `data` option, which defaults to the column being worked with, in
									// this case `data: 0`.
									"render": function(data, type, row) {
										return "<a class='text-primary hover-underline' href='employeepage?employee_id=" + data + "' target='_blank'>"  + row.employee_name + " " + row.employee_surname + "</a>";
									},
									"targets": 6,
									orderable: false
								},
								{
									// The `data` parameter refers to the data for the cell (defined by the
									// `data` option, which defaults to the column being worked with, in
									// this case `data: 0`.
									"render": function(data, type, row) {
										if (data == 0) {
											return "<label class='label label-danger'>Incomplete</label>";
										} else if (data == 1) {
											return "<label class='label label-primary'>In progress</label>";
										} else {
											return "<label class='label label-success'>Finished</label>";
										}
									},
									"targets": 7,
									orderable: false
								},
								{
									// The `data` parameter refers to the data for the cell (defined by the
									// `data` option, which defaults to the column being worked with, in
									// this case `data: 0`.
									"render": function(data, type, row) {
										var mapBtn = "";
										if (row.task_location != ""){
											mapBtn = '<span onClick="showOnMap(this)" class="text-primary pointer pull-left m-l-10" data-toggle="tooltip" title="View on map"><i class="fas fa-map-marker-alt text-success"></i></span>';
										}
										if (!hasTaskPermissions) {
											var actionButtons = '<span onClick="showTaskPage(this)" data-toggle="tooltip" title="View this task" class="text-primary pointer pull-left"><i class="fa fa-eye"></i></span>' + mapBtn;
											return actionButtons;
										} else {
											var actionButtons = '<span onClick="showEditTaskPopup(this)" data-toggle="tooltip" title="Edit task" class="text-primary pointer pull-left"><i class="fas fa-pencil-alt"></i></span><span onClick="showTaskPage(this)" data-toggle="tooltip" title="View task page" class="text-primary pointer pull-left m-l-10"><i class="fas fa-th-list"></i></span>' + mapBtn + '<span onClick="deleteTask(this)" data-toggle="tooltip" title="Delete task" class="text-danger pointer pull-left m-l-10"><i class="fa fa-trash"></i></span>';
											if (row.status == 1) {
												actionButtons = '<span onClick="showEditTaskPopup(this)" data-toggle="tooltip" title="Edit task" class="text-primary pointer pull-left"><i class="fas fa-pencil-alt"></i></span><span onClick="showTaskPage(this)" data-toggle="tooltip" title="View task page" class="text-primary pointer pull-left m-l-10"><i class="fas fa-th-list"></i></span>' + mapBtn + '<span onClick="deleteTask(this)" data-toggle="tooltip" title="Delete task" class="text-danger pointer pull-left m-l-10"><i class="fa fa-trash"></i></span>';
											} else if (row.status == 0) {
												actionButtons = '<span onClick="showEditTaskPopup(this)" data-toggle="tooltip" title="Edit task" class="text-primary pointer pull-left"><i class="fas fa-pencil-alt"></i></span><span onClick="showTaskPage(this)" data-toggle="tooltip" title="View task page" class="text-primary pointer pull-left m-l-10"><i class="fas fa-th-list"></i></span>' + mapBtn + '<span onClick="deleteTask(this)" data-toggle="tooltip" title="Delete task" class="text-danger pointer pull-left m-l-10"><i class="fa fa-trash"></i></span>';
											}
											return actionButtons;
										}
									},
									"orderable": false,
									"targets": 8
								}
							],
							responsive: true,
							dom: 'lfrtipB',
							buttons: [{
									extend: 'copy',
									className: 'btn-sm btn-primary',
									exportOptions: {
										format: {
											header: function ( data, column, row ) {
												if (column == 1){
													data = "Priority";
												}else if (column == 2) {
													data = "Customer";
												}else if (column == 3) {
													data = "Assigned to";
												}else if (column == 6) {
													data = "Created by";
												} else if (column == 7){
													data = "Status";
												}
												return data.trim();
											}
										}
									}
								},
								{
									extend: 'csv',
									className: 'btn-sm btn-primary',
									exportOptions: {
										format: {
											header: function ( data, column, row ) {
												if (column == 1){
													data = "Priority";
												}else if (column == 2) {
													data = "Customer";
												}else if (column == 3) {
													data = "Assigned to";
												}else if (column == 6) {
													data = "Created by";
												} else if (column == 7){
													data = "Status";
												}
												return data.trim();
											}
										}
									}
								},
								{
									extend: 'excel',
									className: 'btn-sm btn-primary',
									exportOptions: {
										format: {
											header: function ( data, column, row ) {
												if (column == 1){
													data = "Priority";
												}else if (column == 2) {
													data = "Customer";
												}else if (column == 3) {
													data = "Assigned to";
												}else if (column == 6) {
													data = "Created by";
												} else if (column == 7){
													data = "Status";
												}
												return data.trim();
											}
										}
									}
								},
								{
									extend: 'pdf',
									className: 'btn-sm btn-primary',
									exportOptions: {
										format: {
											header: function ( data, column, row ) {
												if (column == 1){
													data = "Priority";
												}else if (column == 2) {
													data = "Customer";
												}else if (column == 3) {
													data = "Assigned to";
												}else if (column == 6) {
													data = "Created by";
												} else if (column == 7){
													data = "Status";
												}
												return data.trim();
											}
										}
									}
								},
								{
									extend: 'print',
									className: 'btn-sm btn-primary',
									exportOptions: {
										format: {
											header: function ( data, column, row ) {
												if (column == 1){
													data = "Priority";
												}else if (column == 2) {
													data = "Customer";
												}else if (column == 3) {
													data = "Assigned to";
												}else if (column == 6) {
													data = "Created by";
												} else if (column == 7){
													data = "Status";
												}
												return data.trim();
											}
										}
									}
								}
							]
						});
					}
		}
		
		function getEmployeeString(assigned_to){
			var participantString = "";
			var participants = assigned_to.split(",");
			for (var i = 0; i < participants.length; i++) {
				for (var j = 0; j < employeeArray.length; j++){
					var employee = employeeArray[j];
					if (employee.employee_id == participants[i]){
						if (participantString != ""){
							participantString += ", <a target='_blank' href='employeepage?employee_id=" + employee.employee_id + "' />" + employee.employee_name + " " + employee.employee_surname + "</a>";
						}else{
							participantString = "<a target='_blank' href='employeepage?employee_id=" + employee.employee_id + "' />" + employee.employee_name + " " + employee.employee_surname + "</a>";
						}
						break;
					}
				}
			}
			return participantString;
		}

		function filterTasksByStatus(status) {
			var events = $("#calendar").fullCalendar("clientEvents");
			if (selectedEmployee == null) {
				if (status != -1) {
					for (var i = 0; i < events.length; i++) {
						var event = events[i];
						if (event.status == status) {
							event.display = true;
						} else {
							event.display = false;
						}
					}
				} else {
					for (var i = 0; i < events.length; i++) {
						var event = events[i];
						event.display = true;
					}
				}
			} else {
				if (status != -1) {
					for (var i = 0; i < events.length; i++) {
						var event = events[i];
						var participants = event.participants.split(",");
						if (event.status == status && participants.indexOf(selectedEmployee) != -1) {
							event.display = true;
						} else {
							event.display = false;
						}
					}
				} else {
					for (var i = 0; i < events.length; i++) {
						var event = events[i];
						var participants = event.participants.split(",");
						if (participants.indexOf(selectedEmployee) != -1) {
							event.display = true;
						} else {
							event.display = false;
						}
					}
				}
			}
			selectedStatus = status;
			$('#calendar').fullCalendar('updateEvents', events);
		}

		function getParticipantString(participants) {
			var participantString = "";
			for (var i = 0; i < participants.length; i++) {
				var employeePosition = employeeIds.indexOf(participants[i]); //get position of employee ID in employees array to get name/surname
				if (employeePosition != -1) {
					var employee = employees[employeePosition];
					participantString += '<i class="fa fa-user"></i>&nbsp;' + employee.employee_name + " " + employee.employee_surname + "&nbsp;";
				}
			}
			return participantString;
		}

		function getParticipantStringImages(participants) {
			var participantString = "";
			for (var i = 0; i < participants.length; i++) {
				var employeePosition = employeeIds.indexOf(participants[i]); //get position of employee ID in employees array to get name/surname
				if (employeePosition != -1) {
					var employee = employees[employeePosition];
					if (employee.logged_in == 0) {
						participantString += '<a class="socialnetwork-group-user-avatar user-offline-avatar" href="#"></a>' +
							'<div><h5>' + employee.employee_name + " " + employee.employee_surname + '</h5><h6>' + employee.employee_email + '</h6></div>';
					} else if (employee.logged_in == 2) {
						var lastSeenTime = new Date(employee.inactive_since);
						participantString += '<a class="socialnetwork-group-user-avatar user-busy-avatar" href="#"></a>' +
							'<div><h5>' + employee.employee_name + " " + employee.employee_surname + ' (Last seen: ' + lastSeenTime.getHours() + ":" + lastSeenTime.getMinutes() + ')</h5><h6>' + employee.employee_email + '</h6></div>';
					} else {
						participantString += '<a class="socialnetwork-group-user-avatar user-default-avatar" href="#"></a>' +
							'<div><h5>' + employee.employee_name + " " + employee.employee_surname + '</h5><h6>' + employee.employee_email + '</h6></div>';
					}
				}
			}
			return participantString;
		}

		function showTaskPage(row) {
			var actualRow = $(row).parents('tr');
			if (actualRow.hasClass('child')) {//Check if the current row is a child row
				actualRow = actualRow.prev();//If it is, then point to the row before it (its 'parent')
			}
			var task = dTable.row(actualRow).data();
			var url = "<?= BASE_URL ?>" + "taskdetails?task_id=" + task.task_id;
			window.open(url, "_blank");
		}

		function showCurrentTaskPage(){
			var url = "<?= BASE_URL ?>" + "taskdetails?task_id=" + selectedTask.task_id;
			window.open(url, "_blank");
		}

		function showTaskPageID(task_id){
			var url = "<?= BASE_URL ?>" + "taskdetails?task_id=" + task_id;
			window.open(url, "_blank");
		}

		function showEmployeeTasks(div, index) {
			$(".fc-active").removeClass("fc-active");
			$(div).addClass("fc-active");
			var employee = employeeArray[index];
			var events = $("#calendar").fullCalendar("clientEvents");
			if (selectedStatus != -1) {
				if (index != -1) {
					for (var i = 0; i < events.length; i++) {
						var event = events[i];
						var participants = event.participants.split(",");
						if (participants.indexOf(employee.employee_id) != -1 && event.status == selectedStatus) {
							event.display = true;
						} else {
							event.display = false;
						}
					}
					selectedEmployee = employee.employee_id;
				} else {
					for (var i = 0; i < events.length; i++) {
						var event = events[i];
						if (event.status == selectedStatus) {
							event.display = true;
						} else {
							event.display = false;
						}
					}
					selectedEmployee = null;
				}
			} else {
				if (index != -1) {
					for (var i = 0; i < events.length; i++) {
						var event = events[i];
						var participants = event.participants.split(",");
						if (participants.indexOf(employee.employee_id) != -1) {
							event.display = true;
						} else {
							event.display = false;
						}
					}
					selectedEmployee = employee.employee_id;
				} else {
					for (var i = 0; i < events.length; i++) {
						var event = events[i];
						event.display = true;
					}
					selectedEmployee = null;
				}
			}
			$('#calendar').fullCalendar('updateEvents', events);
		}

		function treeUploadClicked() {
			var selectedNode = $("#folderStructureDIV").jstree("get_selected", true);
			showUploadFilePopup(selectedNode[0].original.dirurl);
		}

		function treeDownloadClicked() {
			var selectedNode = $("#folderStructureDIV").jstree("get_selected", true);
			window.open("<?= DIR_URL ?>" + selectedNode[0].original.dirurl);
		}

		function treeDeleteClicked() {
			var selectedNode = $("#folderStructureDIV").jstree("get_selected", true);
			swal({
				title: 'Confirm action',
				text: "Are you sure you want to remove this file?",
				type: 'error',
				showCancelButton: true,
				confirmButtonColor: '#3085d6',
				cancelButtonColor: '#d33',
				confirmButtonText: 'Yes, remove'
			}).then(function() {
				$("#folderStructureDIV").jstree("delete_node", selectedNode);
			});
		}

		function getWorkgroupFiles() {
			var postData = {
				workgroup_id: workgroup_id
			};
			$.ajax({
				type: "POST",
				url: "workgroup/getDirectory",
				data: postData,
				dataType: "json",
				success: function(folderStructure) {
					console.log(folderStructure);
					try {
						$("#folderStructureDIV").jstree(true).destroy();
					} catch (err) {}
					var filePermissions = wGroup.workgroup_filepermissions;
					var hasFilePermissions = (isAdmin == 1 || filePermissions == 0 || (filePermissions == 1 && isModerator) || (filePermissions == 2 && isOwner));
					$("#folderStructureDIV").on('open_node.jstree', function(event, data) {
						if (data.node.type == "default") {
							data.instance.set_type(data.node, 'folder-open');
						}
					}).on('close_node.jstree', function(event, data) {
						if (data.node.type == "folder-open") {
							data.instance.set_type(data.node, 'default');
						}
					}).on("select_node.jstree",
						function(evt, data) {
							var nodeType = data.node.type;
							if (nodeType == "default" || nodeType == "folder-open") {
								$("#treeDownloadBtn").addClass("hide");
								if (hasFilePermissions) {
									$("#treeUploadBtn").removeClass("hide");
									$("#treeDeleteBtn").addClass("hide");
								}
							} else {
								$("#treeDownloadBtn").removeClass("hide");
								if (hasFilePermissions) {
									$("#treeUploadBtn").addClass("hide");
									$("#treeDeleteBtn").removeClass("hide");
								}
							}
						}).on('rename_node.jstree', function(e, data) {
						var parentNode = $('#folderStructureDIV').jstree(true).get_node(data.node.parent);
						var newFileName = data.text;
						var oldFileURL = data.node.original.dirurl;
						if (oldFileURL == null) { //only happens when we're creating a new directory.
							var parentDirectory = parentNode.original.dirurl;
							createDirectory(parentDirectory + "/" + newFileName);
						} else {
							if (data.node.type != "default" && data.node.type != "folder-open") {
								renameFile(oldFileURL, newFileName);
							} else {
								renameDirectory(oldFileURL, newFileName);
							}
						}
					}).on("delete_node.jstree", function(e, data) {
						var fileURL = data.node.original.dirurl;
						deleteFile(fileURL);
					}).on("move_node.jstree", function(e, data) {
						var parentNode = $('#folderStructureDIV').jstree(true).get_node(data.node.parent);
						var parentDirectory = parentNode.original.dirurl;
						var oldDirectory = data.node.original.dirurl;
						if (data.old_parent != data.parent) {
							data.node.original.dirurl = "Workgroups/" + $("#folderStructureDIV").jstree(true).get_path(data.node, "/"); //replace with new file path.
							moveFile(oldDirectory, parentDirectory);
						}
					}).jstree({
						"core": {
							"themes": {
								"responsive": true,
								"variant": "large"
							},
							"check_callback": function(operation, node, node_parent, node_position, more) {
								if (operation == 'move_node') {
									if (node_parent.type == 'default' || node_parent.type == 'folder-open') {
										return true
									} else
										return false;
								}
							},
							'data': folderStructure
						},
						"dnd": {
							"is_draggable": function(node) {
								var type = node[0].type;
								if (type != 'default' && type != "folder-open" && hasFilePermissions) {
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
						"contextmenu": {
							"items": function(node) {
								var nodeType = node.type;
								if (node.parent == "#") { //root node
									var tree = $("#folderStructureDIV").jstree(true);
									if (hasFilePermissions) {
										return {
											"Upload a file": {
												"separator_before": false,
												"separator_after": false,
												"label": "Upload a file",
												"icon": "fa fa-upload text-primary",
												"action": function(obj) {
													showUploadFilePopup(node.original.dirurl);
												}
											},
											"Create a subfolder": {
												"separator_before": false,
												"separator_after": false,
												"label": "Create a subfolder",
												"icon": "fa fa-folder text-warning",
												"action": function(obj) {
													node = tree.create_node(node);
													tree.edit(node);
												}
											}
										};
									}
								} else if (nodeType != "default" && nodeType != "folder-open") {
									var tree = $("#folderStructureDIV").jstree(true);
									if (hasFilePermissions) {
										return {
											"Download/View file": {
												"separator_before": false,
												"separator_after": false,
												"label": "Download/View file",
												"icon": "fa fa-download text-primary",
												"action": function(obj) {
													window.open("<?= DIR_URL ?>" + node.original.dirurl);
												}
											},
											"Rename file": {
												"separator_before": false,
												"separator_after": false,
												"label": "Rename file",
												"icon": "fas fa-pencil-alt text-success",
												"action": function(obj) {
													tree.edit(node);
												}
											},
											"Remove file": {
												"separator_before": false,
												"separator_after": false,
												"label": "Remove file",
												"icon": "fa fa-trash text-danger",
												"action": function(obj) {
													swal({
														title: 'Confirm action',
														text: "Are you sure you want to remove this file?",
														type: 'error',
														showCancelButton: true,
														confirmButtonColor: '#3085d6',
														cancelButtonColor: '#d33',
														confirmButtonText: 'Yes, remove'
													}).then(function() {
														tree.delete_node(node);
													});
												}
											}
										};
									} else {
										return {
											"Download/View file": {
												"separator_before": false,
												"separator_after": false,
												"label": "Download/View file",
												"icon": "fa fa-download text-primary",
												"action": function(obj) {
													window.open("<?= DIR_URL ?>" + node.original.dirurl);
												}
											}
										};
									}
								} else {
									var tree = $("#folderStructureDIV").jstree(true);
									if (hasFilePermissions) {
										return {
											"Upload a file": {
												"separator_before": false,
												"separator_after": false,
												"label": "Upload a file",
												"icon": "fa fa-upload text-primary",
												"action": function(obj) {
													showUploadFilePopup(node.original.dirurl);
												}
											},
											"Create a subfolder": {
												"separator_before": false,
												"separator_after": false,
												"label": "Create a subfolder",
												"icon": "fa fa-folder text-warning",
												"action": function(obj) {
													node = tree.create_node(node);
													tree.edit(node);
												}
											},
											"Rename folder": {
												"separator_before": false,
												"separator_after": false,
												"label": "Rename directory",
												"icon": "fas fa-pencil-alt text-success",
												"action": function(obj) {
													tree.edit(node);
												}
											},
										};
									}
								}
							}
						},
						"plugins": ["contextmenu", "types", "search", "dnd", "state"]
					});
				}
			});
		}

		function deleteFile(fileURL) {
			var postData = {
				"file_location": fileURL
			};
			$.ajax({
				type: "POST",
				url: "workgroup/deleteFile",
				data: postData,
				success: function(response) {
					if (response == "") {
						swal(
							'Success!',
							'File was successfully removed.',
							'success'
						);
					} else {
						swal(
							'Error',
							'The server encountered the following error: ' + response,
							'error'
						);
					}
				}
			});
		}

		function renameFile(oldFileName, newFileName) {
			var postData = {
				"file_location": oldFileName,
				"new_name": newFileName
			};
			$.ajax({
				type: "POST",
				url: "workgroup/renameFile",
				data: postData,
				success: function(response) {
					if (response != "") {
						swal(
							'Error',
							'The server encountered the following error: ' + response,
							'error'
						);
					}
					getWorkgroupFiles();
				}
			});
		}

		function renameDirectory(oldFileName, newFileName) {
			var postData = {
				"file_location": oldFileName,
				"new_name": newFileName
			};
			$.ajax({
				type: "POST",
				url: "workgroup/renameFile",
				data: postData,
				success: function(response) {
					if (response != "") {
						swal(
							'Error',
							'The server encountered the following error: ' + response,
							'error'
						);
					}
					getWorkgroupFiles();
				}
			});
		}

		function moveFile(oldDirectory, newDirectory) {
			var postData = {
				"old_location": oldDirectory,
				"new_location": newDirectory
			};
			console.log(postData);
			$.ajax({
				type: "POST",
				url: "workgroup/moveFile",
				data: postData,
				success: function(response) {
					if (response != "") {
						swal(
							'Error',
							'The server encountered the following error: ' + response,
							'error'
						);
					}
				}
			});
		}

		function createDirectory(directoryURL) {
			var postData = {
				"dirname": directoryURL
			};
			console.log(postData);
			$.ajax({
				type: "POST",
				url: "workgroup/createDir",
				data: postData,
				success: function(response) {
					if (response != "") {
						swal(
							'Error',
							'The server encountered the following error: ' + response,
							'error'
						);
					}
					getWorkgroupFiles();
				}
			});
		}

		function getTaskBoard(task_id) {
			var todoBoard = kanbanBoard.getBoardElements('todoBoard');
			todoBoard.forEach(function(item, index) {
				if ($(item).attr("data-eid") == task_id) {
					updateTaskStatus(task_id, 0); //set task to pending, since it was dropped on pending board.
					console.log("Status set to pending");
					return;
				}
			});
			var workingBoard = kanbanBoard.getBoardElements('workingBoard');
			workingBoard.forEach(function(item, index) {
				if ($(item).attr("data-eid") == task_id) {
					updateTaskStatus(task_id, 1); //set task to in progress, since it was dropped on pending board.
					console.log("Status set to in progress");
					return;
				}
			});
			var finishedBoard = kanbanBoard.getBoardElements('doneBoard');
			finishedBoard.forEach(function(item, index) {
				if ($(item).attr("data-eid") == task_id) {
					updateTaskStatus(task_id, 2); //set task to finished, since it was dropped on pending board.
					console.log("Status set to finished");
					return;
				}
			});
		}

		function updateTask(task_id, task_startdate, task_starttime, task_enddate, task_endtime) {
			for (var i = 0; i < taskArray.length; i++) {
				if (taskArray[i].task_id == task_id) {
					taskArray[i].task_startdate = task_startdate;
					taskArray[i].task_starttime = task_starttime;
					taskArray[i].task_enddate = task_enddate;
					taskArray[i].task_endtime = task_endtime;
					if (dTable != null) {
						dTable.clear().rows.add(taskArray).draw(false);
					}
				}
			}
			var postData = {
				task_id: task_id,
				task_startdate: task_startdate,
				task_starttime: task_starttime,
				task_enddate: task_enddate,
				task_endtime: task_endtime
			};
			$.ajax({
				type: "POST",
				url: "<?= BASE_URL ?>" + "workgroup/moveTask",
				data: postData,
				success: function(msg) {
					if (msg == "") {
					} else {
						swal(
							'Error!',
							'The server encountered the following error: ' + msg,
							'error'
						);
					}
				}
			});
		}

		function changeTaskStatus(row) {
			var actualRow = $(row).parents('tr');
			if (actualRow.hasClass('child')) {//Check if the current row is a child row
				actualRow = actualRow.prev();//If it is, then point to the row before it (its 'parent')
			}
			var task = dTable.row(actualRow).data();
			console.log(task);
			var status = (parseInt(task.status) + 1);
			var statusString = "In progress";
			if (status == 2) {
				statusString = "Finished";
			}
			swal({
				title: 'Confirm action',
				text: "Are you sure you want to mark this task as " + statusString + "?",
				type: 'info',
				showCancelButton: true,
				confirmButtonColor: '#3085d6',
				cancelButtonColor: '#d33',
				confirmButtonText: 'Yes'
			}).then(function() {
				var postData = {
					task_id: task.task_id,
					status: status
				};
				$.ajax({
					type: "POST",
					url: "<?= BASE_URL ?>" + "workgroup/updateTask",
					data: postData,
					success: function(msg) {
						if (msg == "") {
							swal(
								'Task updated',
								'Task is now marked as ' + statusString,
								'success'
							);
							getWorkgroupTasks();
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

		function updateTaskStatus(task_id, status) {
			var postData = {
				task_id: task_id,
				status: status
			};
			$.ajax({
				type: "POST",
				url: "<?= BASE_URL ?>" + "workgroup/updateTask",
				data: postData,
				success: function(msg) {
					getWorkgroupTasks();
				}
			});
		}

		function updateCurrentTaskStatus(status) {
			var postData = {
				task_id: selectedTask.task_id,
				status: status
			};
			$.ajax({
				type: "POST",
				url: "<?= BASE_URL ?>" + "workgroup/updateTask",
				data: postData,
				success: function(msg) {
					swal(
						'Success!',
						'Task status was successfully updated.',
						'success'
					);
					hideViewTaskPopup();
				}
			});
		}

		function getWorkgroupMessages() {
			var postData = {
				workgroup_id: workgroup_id
			};
			$.ajax({
				type: "POST",
				url: "<?= BASE_URL ?>" + "chat/get",
				data: postData,
				dataType: "json",
				success: function(messages) {
					var chatContent = "";
					var oldContent = $("#chatList").html();
					var lastDate = moment(messages[0].datetime).format("dddd, Do MMMM");
					var todaysDate = moment().format("dddd, Do MMMM");
					if (lastDate == todaysDate){
						chatContent += '<div class="text-center text-muted m-10 f-w-600">Today</div>';
					}else{
						chatContent += '<div class="text-center text-muted m-10 f-w-600">' + lastDate + '</div>';
					}
					for (var i = 0; i < messages.length; i++) {
						var message = messages[i];
						var msgDate = moment(messages[i].datetime).format("dddd, Do MMMM");
						if (msgDate != lastDate){
							if (msgDate == todaysDate){
								chatContent += '<div class="text-center text-muted m-10 f-w-600">Today</div>';
							}else{
								chatContent += '<div class="text-center text-muted m-10 f-w-600">' + msgDate + '</div>';
							}
							lastDate = msgDate;
						}
						if (message.employee_id == loggedEmployee){
							chatContent += '<div class="widget-chat-item right">' +
											'<div class="widget-chat-info">' +
												'<div class="widget-chat-info-container">' +
													'<div class="widget-chat-message">' + message.content + '</div>' +
													'<div class="widget-chat-time">' + moment(message.datetime).format(timeformat) + '</div>' +
												'</div>' +
											'</div>' +
										'</div>';
						}else{
							chatContent += '<div class="widget-chat-item with-media left">' +
											'<div class="widget-chat-media">' +
												'<img alt="" src="' + imgURL  + '">' +
											'</div>' +
											'<div class="widget-chat-info">' +
												'<div class="widget-chat-info-container">' +
													'<div class="widget-chat-name text-success">' + message.employee_name + " " + message.employee_surname + '</div>' +
													'<div class="widget-chat-message">' + message.content + '</div>' +
													'<div class="widget-chat-time">' + moment(message.datetime).format(timeformat) + '</div>' +
												'</div>' +
											'</div>' +
										'</div>';
						}
						
						var imgURL = "<?= IMG_URL ?>" + "user-13.jpg";
						if (message.profile_image != "") {
							imgURL = "<?= IMG_URL ?>" + message.profile_image;
						}
						
					}
					if (oldContent != chatContent) {
						$("#chatList").html(chatContent);
						
						$("#nrOfMessages").html(messages.length);
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

		function deleteTask(row) {
			var actualRow = $(row).parents('tr');
			if (actualRow.hasClass('child')) {//Check if the current row is a child row
				actualRow = actualRow.prev();//If it is, then point to the row before it (its 'parent')
			}
			var task = dTable.row(actualRow).data();
			swal({
				title: 'Confirm action',
				text: "Are you sure you want to remove this task?",
				type: 'error',
				showCancelButton: true,
				confirmButtonColor: '#3085d6',
				cancelButtonColor: '#d33',
				confirmButtonText: 'Yes, remove'
			}).then(function() {
				var values = {
					task_id: task.task_id
				};
				$.ajax({
					type: "POST",
					url: "workgroup/deleteTask",
					data: values,
					success: function(msg) {
						if (msg == "") {
							swal(
								'Success!',
								'Task was successfully removed.',
								'success'
							);
							getWorkgroupTasks();
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

		function deleteTaskID() {
			swal({
				title: 'Confirm action',
				text: "Are you sure you want to remove this task?",
				type: 'error',
				showCancelButton: true,
				confirmButtonColor: '#3085d6',
				cancelButtonColor: '#d33',
				confirmButtonText: 'Yes, remove'
			}).then(function() {
				var values = {
					task_id: selectedTask.task_id
				};
				$.ajax({
					type: "POST",
					url: "workgroup/deleteTask",
					data: values,
					success: function(msg) {
						if (msg == "") {
							swal(
								'Success!',
								'Task was successfully removed.',
								'success'
							);
							hideEditTaskPopup();
							getWorkgroupTasks();
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

		function leaveWorkgroup() {
			swal({
				title: 'Confirm action',
				text: "Are you sure you want to leave this workgroup?",
				type: 'warning',
				showCancelButton: true,
				confirmButtonColor: '#3085d6',
				cancelButtonColor: '#d33',
				confirmButtonText: 'Yes, leave'
			}).then(function() {
				var postData = {
					workgroup_id: workgroup_id
				};
				$.ajax({
					type: "POST",
					url: "workgroup/leave",
					data: postData,
					success: function(msg) {
						if (msg == "") {
							location.href = "workgroups";
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

		function setTaskStatus(status){
					var postData = {
						task_id: selectedTask.task_id,
						status: status
					};
					$.ajax({
							type: "POST",
							url: "workgroup/updateTask",
							data: postData,
							success: function(msg) {
								if (msg == ""){
									selectedTask.status = status;
									var statusText;
									var statusColor;
									if (status == 1){
										statusText = "In progress";
										statusColor = "<i class='fa fa-circle text-primary'></i>";
									}else if (status == 2){
										statusText = "Finished";
										statusColor = "<i class='fa fa-circle text-success'></i>";
									}else{
										statusText = "Incomplete";
										statusColor = "<i class='fa fa-circle text-danger'></i>";
									}
									$("#task-status").html(statusText);
									$("#status-circle").html(statusColor);
									getWorkgroupTasks();
								}
								
							}
					});
		}
</script>
<script async defer src="https://maps.googleapis.com/maps/api/js?v=3&key=AIzaSyByTQPUumUXa7XiemK1liQCKT3839oj7DE&callback=initMap&language=en&libraries=places"></script>
</body>
</html>
