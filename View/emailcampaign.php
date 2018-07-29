<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
<!--<![endif]-->
<head>
	<meta charset="utf-8" />
	<title>Campaign details</title>
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
	<!-- ================== END PAGE LEVEL STYLE ================== -->
	
	<!-- ================== BEGIN BASE JS ================== -->
	<script src="<?= ASSETS_URL . "pace/pace.min.js" ?>" ></script>
	<!-- ================== END BASE JS ================== -->
</head>
<style>
    
    
    #editEmailCampaignDIV, #editSMSCampaignDIV{
        width: 900px;
        height: auto;
        position: relative;
        margin: 3% auto 0px auto;
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
        background-color: #222;
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
                						    <li class="active"><a href="' . BASE_URL . 'campaign">Campaigns</a></li>
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
				<li><a href="javascript:;">E-mail campaign</a></li>
			</ol>
			
			<h1 class="page-header"><?php echo $campaign["campaign_name"]; ?></h1>
			<div class="row">
			    <div class="col-md-12">
        			<ul class="view-switcher">
                        <li class="active">
                            <a href="#campaign-preview" data-toggle="tab" aria-expanded="true">Preview</a>
                        </li>
                        <li>
                            <a href="#campaign-details" data-toggle="tab" aria-expanded="false">Details</a>
                        </li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane fade in active" id="campaign-preview">
                            <div class="whiteBG p-15">
                                <h4 class="m-b-15 m-t-0 p-b-10 underline"><?php echo $campaign["campaign_subject"] ?></h4>
                                <ul class="media-list underline m-b-20 p-b-15">
                                    <li class="media media-sm clearfix">
                                        <a href="javascript:;" class="pull-left"><img class="media-object rounded-corner" alt="" src="http://track.appdev.si/Web/assets/img/user-14.jpg"></a>
                                        <div class="media-body"><span class="email-from text-inverse f-w-600">From: <?php echo $campaign["from_name"]; ?> </span><span class="text-muted m-l-5"><i class="fa fa-clock-o fa-fw"></i><?php echo (date("l, d. F Y H:i", strtotime($campaign["created_on"]))); ?></span></div>
                                    </li>
                                </ul>
                                <?php echo $campaign["campaign_content"]; ?>
                            </div>
                            <?php 
                                if ($campaign["status"] == 0){ //not sent
                                    echo '<div id="sendFormDIV" class="m-t-15">' .
                                         '<form id="sendCampaignForm" action="campaign/send" method="post" class="form-horizontal">' .
                                            '<input type="hidden" name="campaign_id" value="' . $campaign["campaign_id"] . '">' .
                                         '</form>' .
                                    '</div>';
                                    echo '<button id="sendCampaignBtn" form="sendCampaignForm" class="btn material success">Send campaign</button>';
                                    if ($campaign["campaign_type"] == 0){
                                        echo '<button id="editEmailCampaignBtn" class="btn material primary m-l-15" onClick="showEmailCampaignDIV()">Edit campaign</button>';
                                    }else{
                                        echo '<button id="editSMSCampaignBtn" class="btn material primary m-l-15" onClick="showSMSCampaignDIV()">Edit campaign</button>';
                                    }
                                }
                            ?>
                        </div>
                        <div class="tab-pane fade in" id="campaign-details">
                            <div class="row">
                                <div class="col-md-12">
                                    <table id="campaign-overview-stats" class="mc-table scroll-small">
                                        <tbody>
                                            <tr class="odd">
                                                <th>Created on</th>
                                                <td><?php echo (date("l, d. F Y H:i", strtotime($campaign["created_on"]))); ?></td>
                                            </tr>
                                            <tr class="even">
                                                <th>Send time</th>
                                                <td><?php 
                                                    if ($campaign["send_time"] != ""){
                                                        echo (date("l, d. F Y H:i", strtotime($campaign["send_time"]))); 
                                                    }
                                                ?></td>
                                            </tr>
                                            <tr class="odd">
                                                <th>Subject line</th>
                                                <td><?php echo $campaign["campaign_subject"] ?></td>
                                            </tr>
                                            <tr class="even">
                                                <th>From name</th>
                                                <td><?php echo $campaign["from_name"] ?></td>
                                            </tr>
                                            <tr class="odd">
                                                <th>From e-mail</th>
                                                <td><?php echo $campaign["from_email"]; ?></td>
                                            </tr>
                                            <tr class="even">
                                                <th>Recipient list</th>
                                                <td><?php echo $campaign["list_name"] . " (" . count(explode(";", $campaign["recipients"])) . " recipients)"; ?></td>
                                            </tr>
                                            <?php
                                                if ($campaign["status"] == 1 && $campaign["campaign_type"] == 0){
                                                    echo '<tr class="odd"><th>Opens</th><td>' . $campaign["opens"] . '</td></tr>';
                                                }
                                            ?>
                                            <tr class="odd">
                                                <th>Status</th>
                                                <td><?php 
                                                    if ($campaign["status"] == 0){
                                                        echo "Pending"; 
                                                    }else{
                                                        echo "Sent";
                                                    }
                                                ?></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
		</div>
		<div class="popupContainer" id="campaignPopup" hidden>
            <div class="panel panel-primary" id="editEmailCampaignDIV" hidden>
                <div class="panel-heading">
                    <div class="panel-heading-btn">
                        <button onclick="hideEmailCampaignDIV()" class="btn btn-xs btn-icon btn-circle btn-default"><i class="fa fa-times"></i>
                        </button>
                    </div>
                    <h4 class="panel-title">Edit e-mail campaign</h4>
                </div>
                <div class="panel-body">
                    <form id="editEmailCampaignForm" action="campaign/add" method="post" class="form-horizontal" enctype="multipart/form-data">
                        <input type="hidden" name="campaign_id" id="hiddenEmailCampaignIDInput" value="<?php echo $campaign["campaign_id"] ?>" />
                        <input type="hidden" name="campaign_type" value="0">
                        <div class="form-group">
                            <div class="col-md-6">
                                <label>Campaign name:</label>
                                <input id="editEmailCampaignNameInput" type="text" class="form-control" name="campaign_name" placeholder="Campaign name" value="<?php echo $campaign["campaign_name"] ?>" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-6">
                                <label>E-mail subject:</label>
                                <input id="editEmailCampaignSubjectInput" type="text" class="form-control" name="campaign_subject" placeholder="E-mail subject" value="<?php echo $campaign["campaign_subject"] ?>" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-12">
                                <textarea id="emailContentsArea" class="form-control" name="campaign_content" placeholder="Enter e-mail contents here" rows="8"><?php echo $campaign["campaign_content"] ?></textarea>
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
                        <button class="btn material primary">Edit campaign</button>
                    </form>
                </div>
            </div>
            <div class="panel panel-primary" id="editSMSCampaignDIV" hidden>
                <div class="panel-heading">
                    <div class="panel-heading-btn">
                        <button onclick="hideSMSCampaignDIV()" class="btn btn-xs btn-icon btn-circle btn-default"><i class="fa fa-times"></i>
                        </button>
                    </div>
                    <h4 class="panel-title">Edit SMS campaign</h4>
                </div>
                <div class="panel-body">
                    <form id="editSMSCampaignForm" action="campaign/edit" method="post" class="form-horizontal" enctype="multipart/form-data">
                        <input type="hidden" name="campaign_id" id="hiddenSMSCampaignIDInput" value="<?php echo $campaign["campaign_id"] ?>" />
                        <input type="hidden" name="campaign_type" value="1">
                        <div class="form-group">
                            <div class="col-md-6">
                                <label>Campaign name:</label>
                                <input id="editSMSCampaignNameInput" type="text" class="form-control" name="campaign_name" placeholder="Campaign name" value="<?php echo $campaign["campaign_name"] ?>" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-12">
                                <textarea id="editSMSCampaignContentInput" class="form-control" name="campaign_content" placeholder="Enter contents here" maxlength="255" rows="3"><?php echo $campaign["campaign_content"] ?></textarea>
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
                        <button class="btn material primary">Edit campaign</button>
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
	<script src="<?= ASSETS_URL . "tinymce/js/tinymce/tinymce.min.js" ?>"></script>
	<script src="<?= ASSETS_URL . "morris/raphael.min.js" ?>"></script>
    <script src="<?= ASSETS_URL . "morris/morris.js" ?>"></script>
	<!-- ================== END PAGE LEVEL JS ================== -->
	
	<script>
	    var loggedEmployee = <?php echo json_encode($_SESSION["id"]); ?>;
	    var campaign_id = <?php echo json_encode($campaign["campaign_id"]); ?>;
	    var workgroup_id = <?php echo json_encode($campaign["workgroup_id"]); ?>;
	    var list_id = <?php echo json_encode($campaign["list_id"]); ?>;
	    var donutChart;
	    $(document).ready(function() {
			App.init();
			getMenuStatistics(loggedEmployee);
			getLists();
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
			$('#sendCampaignForm').on('submit', function(e) { //use on if jQuery 1.7+
			    e.preventDefault();
			    swal({
                  title: 'Confirm send',
                  text: "Are you sure you want to send this campaign?",
                  type: 'info',
                  showCancelButton: true,
                  confirmButtonColor: '#3085d6',
                  cancelButtonColor: '#d33',
                  confirmButtonText: 'Yes, send'
                }).then(function () {
                    $.ajax({
                        type: "POST",
                        url: "<?= BASE_URL ?>" + "campaign/send",
                        data: $("#sendCampaignForm").serialize(),
                        success: function(msg) {
                            if (msg == "") {
                                swal(
                                    'Success',
                                    'Campaign was successfully sent',
                                    'success'
                                );
                                
                                $("#sendFormDIV, #sendCampaignBtn, #editEmailCampaignBtn, #editSMSCampaignBtn").hide();
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
            });
            
            $('#editEmailCampaignForm').on('submit', function(e) { //use on if jQuery 1.7+
			    e.preventDefault();
			    showLoadingPopup();
                    $.ajax({
                        type: "POST",
                        url: "<?= BASE_URL ?>" + "campaign/edit",
                        data: $("#editEmailCampaignForm").serialize(),
                        success: function(msg) {
                            if (msg == "") {
                                location.reload();
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
            
            $('#editSMSCampaignForm').on('submit', function(e) { //use on if jQuery 1.7+
			    e.preventDefault();
                    $.ajax({
                        type: "POST",
                        url: "<?= BASE_URL ?>" + "campaign/edit",
                        data: $("#editSMSCampaignForm").serialize(),
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
            
            $('a[data-toggle="tab"]').on('shown.bs.tab', function(e) {
              var target = $(e.target).attr("href") // activated tab
              if (donutChart == null){
                  switch (target) {
                    case "#campaign-details":
                        var recipients = <?php echo json_encode($campaign["recipients"]); ?>;
                        var opens = <?php echo json_encode($campaign["opens"]); ?>;
                        
                        var donutChart = Morris.Donut({
                                    element: "campaign-donut-chart",
                                    data: [{
                                        label: "Recipients",
                                        value: recipients
                                    },{
                                        label: "Opens",
                                        value: opens
                                    }],
                                    colors: ["#39a34b", "#d9534f"],
                                    labelFamily: "inherit",
                                    labelColor: "rgba(255,255,255,0.4)",
                                    labelTextSize: "12px",
                                    backgroundColor: "#222"
                        });
                        break;
                  }
              }
            });
            
	    });
	    
	    function showLoadingPopup(){
		    $("#loadingPopup").show();
		}
		
		function hideLoadingPopup(){
		    $("#loadingPopup").hide();
		}
	    
	    function getLists(){
            var postData = { workgroup_id: workgroup_id };
            $.ajax({
                type: "POST",
                url: "<?= BASE_URL ?>" + "campaignlist/get",
                data: postData,
                dataType: "json",
                success: function(lists) {
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
                        
                    }
                    $("#emailCampaignListSelect, #smsCampaignListSelect").val(list_id);
                    
                }
            });
        }
	    
	    function showEmailCampaignDIV(){
	        $("#hiddenEmailCampaignIDInput").val(campaign_id);
		    $("#campaignPopup, #editEmailCampaignDIV").show();
		}
		
		function hideEmailCampaignDIV(){
		    $("#campaignPopup, #editEmailCampaignDIV").hide();
		}
		
		function showSMSCampaignDIV(){
		     $("#hiddenSMSCampaignIDInput").val(campaign_id);
		    $("#campaignPopup, #editSMSCampaignDIV").show();
		}
		
		function hideSMSCampaignDIV(){
		    $("#campaignPopup, #editSMSCampaignDIV").hide();
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
