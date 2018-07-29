<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
<!--<![endif]-->

<head>
    <meta charset="utf-8" />
    <title>Ticket details</title>
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.6.9/sweetalert2.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.6.9/sweetalert2.min.css">
    <link href="<?= ASSETS_URL . "telinput/build/css/intlTelInput.css" ?>" rel="stylesheet" />
    <link href="<?= ASSETS_URL . "bootstrap-wizard/css/bwizard.min.css" ?>" rel="stylesheet" />
    <link href="<?= ASSETS_URL . "select2/dist/css/select2.css" ?>" rel="stylesheet" />
    <link href="<?= ASSETS_URL . "morris/morris.css" ?>" rel="stylesheet" />
    <link href="<?= ASSETS_URL . "jquery-tag-it/css/jquery.tagit.css" ?>" rel="stylesheet" />
	<link href="<?= ASSETS_URL . "jquery-file-upload/css/jquery.fileupload.css" ?>" rel="stylesheet" />
	<link href="<?= ASSETS_URL . "jquery-file-upload/css/jquery.fileupload-ui.css" ?>" rel="stylesheet" />
	<link href="<?= CSS_URL . "invoice-print.min.css" ?>" rel="stylesheet" />
	<!-- ================== END PAGE LEVEL STYLE ================== -->
	
	<!-- ================== BEGIN BASE JS ================== -->
	<script src="<?= ASSETS_URL . "pace/pace.min.js" ?>" ></script>
	<!-- ================== END BASE JS ================== -->
</head>
<style>
    .list-email .email-time {
        width: 250px;
    }
	
	#newTicketDIV, #editTicketDIV, #ticketNoteDIV, #newWorkorderDIV, #addItemDIV{
        width: 900px;
        height: auto;
        position: relative;
        margin: 5% auto 0px auto;
    }
	
	#emailPopupPanel{
        width: 1100px;
        height: auto;
        position: relative;
        margin: 5% auto 0px auto;
    }
	
	.span-add{
        display: inline;
        padding: 0;
        width: auto;
        border: 0;
        color: #348fe2;
        cursor: pointer;
        transition: all 220ms ease;
    }
    
    .span-add:hover{
        text-decoration: underline;
    }
	
	.bordered-gray{
		background-color: #f0f3f4;
		margin: 0 -20px 20px -20px;
		padding: 10px 20px 10px 20px;
		width: 50%;
		min-height: 140px;
		border: 1px solid #222;
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
								echo '<li class="has-sub active">
									<a href="javascript:;">
										<b class="caret pull-right"></b>
										<i class="ion-help-buoy"></i>
										<span>Support</span>
									</a>
									<ul class="sub-menu">
										<li class="active"><a href="' . BASE_URL . 'ticketingdashboard">Ticketing</a></li>
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
			<!-- end profile -->
			<div class="profile-content">
			<!-- begin invoice -->
				<div class="invoice">
					<div class="invoice-company">
						<span class="pull-right hidden-print">
						<button class="btn btn-sm btn-white" onClick="showTicketNotePopup()"><i class="fas fa-align-left text-primary m-r-5"></i>Add a note</button>
						<button class="btn btn-sm btn-white" onClick="showEditTicketPopup()"><i class="fa fa-edit text-primary m-r-5"></i>Edit ticket</button>
						
							<?php
								if ($ticket["workorder_id"] != null){
									echo '<a href="workorderdetails?workorder_id=' . $ticket["workorder_id"] . '" class="btn btn-sm btn-white m-r-5"><i class="fa fa-eye text-primary m-r-5"></i>View work order</a>';
								}else{
									echo '<button class="btn btn-sm btn-white m-r-5" onClick="showNewWorkorderPopup()"><i class="fas fa-briefcase text-primary m-r-5"></i>Create work order</button>';
								}
								if ($ticket["email_id"] != null){
									echo '<button onClick="viewEmail()" class="btn btn-sm btn-white"><i class="fa fa-eye text-primary m-r-5"></i>View e-mail</button>';
								}
								if ($call != null){
									echo '<button onClick="viewCall()" class="btn btn-sm btn-white">View call</button>';
								}
							?>
							<button onclick="window.print()" class="btn btn-sm btn-white"><i class="fa fa-print text-primary m-r-5"></i>Print</button>
						</span>
						<?php
							if ($settings["company_logo"] != ""){
								echo '<img src="' . IMG_URL . $settings["company_logo"] . '" style="max-width: 200px;" /><br>';
							}
							$statusCircle = "<span class='f-s-14'><i class='fa fa-circle text-warning m-r-5'></i>Incomplete</span>";
							if ($ticket["ticket_status"] == 1){
								$statusCircle = "<span class='f-s-14'><i class='fa fa-circle text-info m-r-5'></i>In progress</span>";
							}else if ($ticket["ticket_status"] == 2){
								$statusCircle = "<span class='f-s-14'><i class='fa fa-circle text-primary m-r-5'></i>Finished</span>";
							}else if ($ticket["ticket_status"] == 3){
								$statusCircle = "<span class='f-s-14'><i class='fa fa-circle text-danger m-r-5'></i>Canceled</span>";
							}
							echo $ticket["ticket_subject"] . "<br>";
							echo $statusCircle;
						?>
					</div>
					<div class="bordered-gray">
						<div class="m-b-10 f-s-10">
							<b class="text-inverse">DESCRIPTION</b>
						</div>
						<?php echo $ticket["ticket_notes"]; ?>
					</div>
					<div class="invoice-header">
						<div class="invoice-from">
							<small>Created by:</small>
							<address class="m-t-5 m-b-5">
								<strong><?php echo $employee["employee_name"] . " " . $employee["employee_surname"]; ?></strong><br />
								<?php echo $employee["employee_position"]; ?><br />
								<?php echo $employee["employee_residence"] ?><br />
								<?php echo $employee["employee_phone"]; ?>
							</address>
						</div>
						<div class="invoice-to">
							<small>Customer:</small>
							<address class="m-t-5 m-b-5">
								<strong>
									<?php 
										echo $customer["customer_name"];
									?>
								</strong><br />
								<?php
									if ($ticket["subsidiary_name"] != null){
										echo $ticket["subsidiary_name"];
									}else{
										echo "Main company";
									}
								?><br/>
								<?php echo $customer["customer_address"]; ?><br />
								<?php echo $customer["customer_phone"]; ?>
							</address>
						</div>
						<div class="invoice-date">
							<small>Details:</small><br/>
					
							<div class="date">Due <?php echo date("l, F jS" , strtotime($ticket["ticket_date"])); ?></div>
							<div class="invoice-detail">
								<strong>Created on</strong> <?php echo date("l, F jS, H:i" , strtotime($ticket["created_on"])); ?><br/>
								<?php 
									if ($ticket["opened_on"] != ""){
										echo "<strong>Opened on </strong>" . date("l, F jS, H:i" , strtotime($ticket["opened_on"])) . "<br>";
									}
									if ($ticket["finished_on"] != ""){ 
										echo "<strong>Finished on </strong>" . date("l, F jS, H:i" , strtotime($ticket["finished_on"])); 
									}
								?>
							</div>
						</div>
					</div>
					<div class="invoice-content">
						<div class="m-b-10 f-s-10 m-t-10">
							<b class="text-inverse">GENERAL</b>
						</div>
						<table class="table">
								<thead>
									
								</thead>
								<tbody>
									<tr class="highlight">
										<td class="field">Code</td>
										<td><?php echo "<b>" . $ticket["ticket_code"] . "</b>"; ?></td>
									</tr>
									<tr>
										<td class="field">Source</td>
										<td><?php
												$sourceString = "Agent";
												if ($ticket["call_id"] != null){
													$sourceString = "Call";
												}else if ($ticket["email_id"]){
													$sourceString = "E-mail";
												}
												echo $sourceString;
										?></td>
									</tr>
									<tr>
										<td class="field">Type</td>
										<td><?php echo $ticket["category_name"]; ?></td>
									</tr>
									<tr>
										<td class="field">Priority</td>
										<td><?php echo $ticket["ticket_priority"]; ?></td>
									</tr>
									<tr>
										<td class="field">Location</td>
										<td><?php echo $ticket["ticket_location"]; ?></td>
									</tr>
									<tr>
										<td class="field">Participants</td>
										<td><?php
												$participantString = "";
												foreach ($assigned_to as $emp){
													if ($participantString != ""){
														$participantString .= ", <a target='_blank' href='employeepage?employee_id=" . $emp["employee_id"] . "'>" . $emp["employee_name"] . " " . $emp["employee_surname"] . "</a>";
													}else{
														$participantString = "<a target='_blank' href='employeepage?employee_id=" . $emp["employee_id"] . "'>" . $emp["employee_name"] . " " . $emp["employee_surname"] . "</a>";
													}
												}
												echo $participantString;
										?></td>
									</tr>
									<?php
										if ($ticket["billing_fromdate"] != "" && $ticket["billing_todate"] != ""){
											echo '<tr>
												<td class="field">Participants</td>
												<td>From <b>' . date("l, F jS, H:i" , strtotime($ticket["billing_fromdate"] . ' ' . $ticket["billing_fromtime"])) . '</b> to <b>' . date("l, F jS, H:i" , strtotime($ticket["billing_todate"] . ' ' . $ticket["billing_totime"])) . '</b></td>
												</tr>';
										}
									?>
								</tbody>
							</table>
					</div>
					<div style="clear: both;"></div>
					<div class="invoice-content hidden-print">
						<div class="row">
							<div class="col-md-6">
								<h5>Ticket history</h5>
								<div id="ticketActions" class="widget-list widget-list-rounded m-b-30">
										<?php
											foreach ($actions as $action){
												if ($action["action_type"] == 0){
													$icon = "fas fa-pencil-alt bg-success text-white";
												}else{
													$icon = "fas fa-comments bg-primary text-white";
												}
															echo '<div class="widget-list-item">
																<div class="widget-list-media icon p-l-0">
																	<i class="' . $icon . '"></i>
																</div>
																<div class="widget-list-content">
																	<h4 class="widget-list-title">' . $action["action_description"] . '</h4>
																	<p class="widget-list-desc">By <b>' . $action["employee_name"] . " " . $action["employee_surname"] . '</b> on <b>' . date("l, F jS, H:i" , strtotime($action["created_on"])) .  '</b></p>
																</div>
															</div>';
											}
										?>
								</div>
							</div>
							<div class="col-md-6">
									<h5>Attachments</h5>
									<div class="widget-list widget-list-rounded m-b-30">
										<?php
											foreach ($files as $file){
											  $icon = "fas fa-globe bg-primary text-white";
											  if ($file["upload_source"] == 1){
												$icon = "fas fa-mobile-alt bg-success text-white";
											  }
											  echo '<a href="' . DIR_URL . $file["filepath"] . '" class="widget-list-item">
														<div class="widget-list-media icon p-l-0">
															<i class="' . $icon . '"></i>
														</div>
														<div class="widget-list-content">
															<h4 class="widget-list-title">' . $file["filename"] . '</h4>
															<p class="widget-list-desc">By <b>' . $file["employee_name"] . ' ' . $file["employee_surname"] . '</b> on <b>' . date("l, F jS, H:i", strtotime($file["datetime"])) . '</b></p>
														</div>
														<div class="widget-list-action text-nowrap text-right text-grey-darker">
														</div>
													</a>';
											}
										?>
									</div>
							</div>
						</div>
						
					</div>
					
					
				</div>
			</div>
			<!-- end invoice -->
		</div>
			
	</div>
		
		<div class="popupContainer" id="emailPopupDIV" hidden>
                <div class="panel panel-inverse" id="emailPopupPanel" hidden>
                    <div class="panel-heading">
                        <div class="panel-heading-btn">
                            <button onclick="hideEmailContent()" class="btn btn-xs btn-icon btn-circle btn-default" ><i class="fa fa-times"></i></button>
                        </div>
                        <h4 class="panel-title">E-mail</h4>
                    </div>
                    <div class="panel-body">
                        <div id="emailHeaderDIV">
                            
                        </div>
                        <h6>E-mail content</h6>
                        <div id="emailMessageDIV">
                            
                        </div>
                        <ul id="emailAttachmentDIV" class="attached-document clearfix">
                                                
                        </ul>
                    </div>
                    <div id="emailActionDIV" class="panel-footer">
                        
                    </div>
                </div>
        </div>
		<div class="popupContainer" id="ticketNotePopupDIV" hidden>
                <div class="panel panel-inverse" id="ticketNoteDIV" hidden>
                    <div class="panel-heading">
                        <div class="panel-heading-btn">
                            <button onclick="hideTicketNotePopup()" class="btn btn-xs btn-icon btn-circle btn-default" ><i class="fa fa-times"></i></button>
                        </div>
                        <h4 class="panel-title">Add a note</h4>
                    </div>
                    <div class="panel-body">
                        <form id="ticketNoteForm" action="<?= BASE_URL . "ticketing/addnote" ?>" method="post" class="form-horizontal">
							<input type="hidden" name="ticket_id" value="<?php echo $ticket["ticket_id"] ?>" />
							<div class="form-group">
								<div class="col-md-12">
									<label>Note: <span class="text-danger">*</label>
									<textarea class="form-control" name="description" rows="4" placeholder="Enter your notes here"></textarea>
								</div>
							</div>
                    </div>
					<div class="panel-footer">
						<button class="btn btn-success pull-left">Add note</button>
						<button class="btn btn-danger pull-right" type="button" onClick="hideTicketNotePopup()">Close</button>
						</form>
					</div>
                </div>
        </div>
		<div class="popupContainer" id="workorderPopup" hidden>
			<div class="panel panel-primary" id="newWorkorderDIV" hidden>
				<div class="panel-heading">
					<div class="panel-heading-btn">
						<button onclick="hideNewWorkorderPopup()" class="btn btn-xs btn-icon btn-circle btn-default"><i class="fa fa-times"></i>
						</button>
					</div>
					<h4 class="panel-title">New work order</h4>
				</div>
				<div class="panel-body">
					<form id="newWorkorderForm" action="<?= BASE_URL . "workorders/add" ?>" method="post" class="form-horizontal">
						<input type="hidden" id="hiddenWorkorderLatitudeInput" name="latitude" />
						<input type="hidden" id="hiddenWorkorderLongitudeInput" name="longitude" />
						<input type="hidden" name="ticket_id" value="<?php echo $ticket["ticket_id"] ?>" />
						<div class="form-group">
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
								<label>Subject: <span class="text-danger">*</span></label>
								<input type="text" class="form-control" name="workorder_subject" placeholder="Enter a subject" required />
							</div>
						</div>
						<div class="form-group">
							<div class="col-md-6">
								<label>Assign to: <span class="text-danger">*</span></label>
								<select id="employeeSelect" class="form-control" name="assign_to[]" multiple required>
								
								</select>
							</div>
							<div class="col-md-3">
								<label>Start date: <span class="text-danger">*</span></label>
								<input id="workorderStartDateInput" type="text" class="form-control date-picker-input" name="start_date" placeholder="Select a start date" required />
							</div>
							<div class="col-md-3">
								<label>End date: <span class="text-danger">*</span></label>
								<input id="workorderEndDateInput" type="text" class="form-control date-picker-input" name="end_date" placeholder="Select a end date" required />
							</div>
						</div>
						<div class="form-group">
							<div class="col-md-6">
								<label>Customer: <span class="text-danger">*</span></label>
								<select id="workorderCustomerSelect" class="form-control" name="customer_id" required>
									<option value="">Choose a customer</option>
								</select>
							</div>
							<div class="col-md-6">
								<label>Subsidiary: <span class="text-danger">*</span></label>
								<select id="workorderSubsidiarySelect" class="form-control" name="subsidiary_id">
									<option value="">Main company</option>
								</select>
							</div>
						</div>
						<div class="form-group">
							<div class="col-md-12">
								<label>Location:</label>
								<input id="workorderLocationInput" type="text" class="form-control" name="workorder_location" placeholder="Enter an address" />
							</div>
						</div>
						<div class="form-group">
							<div class="col-md-10">
								<label>Item: </label>
								<select id="itemSelect" class="form-control" name="items[]" required>
									<option value="">Choose an item</option>
								</select>
								<div class="m-t-5">
									<span class="span-add m-r-15" onClick="addItem()"><i class="fas fa-plus-circle m-r-5"></i>Add an item</span>
									<span class="span-add text-success" onClick="showAddItemPopup(1)"><i class="fas fa-plus-circle m-r-5"></i>Create an item</span>
								</div>
							</div>
							<div class="col-md-2">
								<label>Amount: </label>
								<input type="number" class="form-control" name="item_amount[]" min="0.1" step="0.1" value="1" />
							</div>
						</div>
						<div id="itemsDIV">
							
						</div>
						<div class="form-group">
							<div class="col-md-12">
								<label>Notes: </label>
								<textarea class="form-control" name="workorder_notes" rows="4"></textarea>
							</div>
						</div>
						<div class="form-group">
							<div class="col-md-12">
								<label><i class="fas fa-paperclip text-primary"></i> Attachments</label><br>
								<ul id="files" class="attached-document clearfix m-0">
								</ul>
								<span class="btn btn-link p-0 fileinput-button">
								<span>Attach a file</span>
									<!-- The file input field used as target for the file upload widget -->
									<input id="workorderFileUpload" type="file" name="file" multiple>
								</span>
							</div>
						</div>
					</div>
					<div class="panel-footer">
						<button id="addWorkorderBtn" class="btn btn-success pull-left">Create work order</button>
						<button class="btn btn-danger pull-right" type="button" onClick="hideNewWorkorderPopup()">Close</button>
						</form>
					</div>
			</div>
		</div>
		<div class="popupContainer" id="ticketPopupDIV" hidden>
            <div class="panel panel-inverse" id="editTicketDIV" hidden>
                <div class="panel-heading">
                    <div class="panel-heading-btn">
                        <button onclick="hideEditTicketPopup()" class="btn btn-xs btn-icon btn-circle btn-default"><i class="fa fa-times"></i></button>
                    </div>
                    <h4 class="panel-title">Edit ticket</h4>
                </div>
                <div class="panel-body">
                    <form id="editTicketForm" action="<?= BASE_URL . "telephony/editticket" ?>" method="post" class="form-horizontal">
                        <input id="editTicketLatitudeInput" type="hidden" name="latitude" />
                        <input id="editTicketLongitudeInput" type="hidden" name="longitude" />
                        <input id="editTicketIDInput" type="hidden" name="ticket_id" />
                        <fieldset>
                            <legend>General</legend>
                            <div class="form-group">
                                <div class="col-md-12">
                                    <label>Status: <span class="text-danger">*</span></label><br>
                                    <div class="radio radio-css radio-inline radio-warning">
                                        <input type="radio" name="ticket_status" id="axr1" value="0">
                                        <label for="axr1">
                                            Pending
                                        </label>
                                    </div>
                                    <div class="radio radio-css radio-inline radio-primary">
                                        <input type="radio" name="ticket_status" id="axr2" value="1">
                                        <label for="axr2">
                                            In progress
                                        </label>
                                    </div>
                                    <div class="radio radio-css radio-inline radio-success">
                                        <input type="radio" name="ticket_status" id="axr3" value="2">
                                        <label for="axr3">
                                            Finished
                                        </label>
                                    </div>
                                    <div class="radio radio-css radio-inline radio-danger">
                                        <input type="radio" name="ticket_status" id="axr4" value="3">
                                        <label for="axr4">
                                            Canceled
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-4">
                                    <label>Ticket ID:</label>
                                    <input type="text" class="form-control" id="editTicketCodeInput" readonly />
                                </div>
                                <div class="col-md-8">
                                    <label>Priority: <span class="text-danger">*</span></label><br>
                                    <div class="radio radio-css radio-inline radio-success">
                                        <input type="radio" name="ticket_priority" id="nxr1" value="Low">
                                        <label for="nxr1">
                                            Low
                                        </label>
                                    </div>
                                    <div class="radio radio-css radio-inline radio-primary">
                                        <input type="radio" name="ticket_priority" id="nxr2" value="Normal" checked="">
                                        <label for="nxr2">
                                            Normal
                                        </label>
                                    </div>
                                    <div class="radio radio-css radio-inline radio-danger">
                                        <input type="radio" name="ticket_priority" id="nxr3" value="High">
                                        <label for="nxr3">
                                            High
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-8">
                                    <label>Subject: <span class="text-danger">*</span></label>
                                    <input id="editTicketSubjectInput" type="text" class="form-control" name="ticket_subject" required/>
                                </div>
                                <div class="col-md-4">
                                    <label>Date: <span class="text-danger">*</span></label>
                                    <div class="input-group ticket-date-picker">
                                        <input id="editTicketDateInput" type="text" name="ticket_date" class="form-control"  placeholder="Choose a date" required />
                                        <span class="input-group-addon btn bg-primary">
                                            <span class="fa fa-calendar text-white"></span>
                                        </span>                    
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-xs-12 col-sm-6 col-md-6">
                                    <label>Customer: <span class="text-danger">*</span></label>
                                    <select id="editTicketCustomerSelect" name="customer_id" class="form-control" required>
                                        <option value="">Choose a customer</option>
                                    </select>
                                </div>
								<div class="col-xs-12 col-sm-6 col-md-6">
									<label>Subsidiary:</label>
										<select id="editTicketSubsidiarySelect" class="form-control" name="subsidiary_id" >
											<option value="">Main company</option>
										</select>
								</div>
                            </div>
							<div class="form-group">
								<div class="col-md-12">
                                    <label>Location:</label>
                                    <input id="editTicketLocationInput" type="text" name="ticket_location" class="form-control" />
                                </div>
							</div>
                            <div class="form-group">
                                <div class="col-md-8">
									<label>Assign to: <span class="text-danger">*</span></label>
									<select id="editTicketEmployeeSelect" class="form-control" name="assign_to[]" multiple required>
										
									</select>
								</div>
                                <div class="col-md-4">
                                    <label>Type: <span class="text-danger">*</span></label>
                                    <select id="editTicketTypeSelect" name="ticket_type" class="form-control" required>
                                    </select>
                                </div>
                            </div>
                        </fieldset>
                        <fieldset>
                            <legend>Billing</legend>
                            <div class="form-group">
                                    <div class="col-md-4">
                                        <label>Billing from date:</label>
                                        <div class="input-group ticket-date-picker">
                                            <input id="editTicketStartDateInput" type="text" name="billing_fromdate" class="form-control" placeholder="Choose a date" />
                                            <span class="input-group-addon btn bg-primary">
                                                <span class="fa fa-calendar text-white"></span>
                                            </span>                    
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <label>Billing from time:</label>
                                        <div class="input-group ticket-time-picker">
                                            <input id="editTicketStartTimeInput" type="text" name="billing_fromtime" class="form-control" placeholder="Time" />
                                            <span class="input-group-addon btn bg-primary">
                                                <span class="fa fa-clock text-white"></span>
                                            </span>                    
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <label>Billing to date: </label>
                                        <div class="input-group ticket-date-picker">
                                            <input id="editTicketEndDateInput" type="text" name="billing_todate" class="form-control"  placeholder="Choose a date" />
                                            <span class="input-group-addon btn bg-primary">
                                                <span class="fa fa-calendar text-white"></span>
                                            </span>                    
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <label>Billing to time: </label>
                                        <div class="input-group ticket-time-picker">
                                            <input id="editTicketEndTimeInput" type="text" name="billing_totime" class="form-control"  placeholder="Time" />
                                            <span class="input-group-addon btn bg-primary">
                                                <span class="fa fa-clock text-white"></span>
                                            </span>                    
                                        </div>
                                    </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-6">
                                    <label>Billing notes:</label>
                                    <textarea id="editTicketBillingNotesInput" class="form-control" name="billing_notes" placeholder="Enter billing notes here" rows="4"></textarea>
                                </div>
                                <div class="col-md-6">
                                    <label>General notes:</label>
                                    <textarea id="editTicketNotesInput" class="form-control" name="ticket_notes" placeholder="Enter general notes here" rows="4"></textarea>
                                </div>
                            </div>
							<div class="form-group">
								<div class="col-md-12">
									<label><i class="fas fa-paperclip text-primary"></i> Attachments</label><br>
									<ul id="editTicketFiles" class="attached-document clearfix m-0">
									</ul>
									<span class="btn btn-link p-0 fileinput-button">
									<span>Attach a file</span>
										<!-- The file input field used as target for the file upload widget -->
										<input id="editTicketFileUpload" type="file" name="file" multiple>
									</span>
								</div>
							</div>
                        </fieldset>
                </div>
                <div class="panel-footer">
                        <button class="btn btn-primary">Edit ticket</button>
                        <button type="button" class="btn btn-white pull-right" onClick="hideEditTicketPopup()">Cancel</button>
                    </form> 
                </div>
            </div>
        </div>
		<div class="popupContainer" id="itemPopup" hidden>
			<div class="panel panel-primary" id="addItemDIV" hidden>
				<div class="panel-heading">
					<div class="panel-heading-btn">
						<button onclick="hideAddItemPopup()" class="btn btn-xs btn-icon btn-circle btn-default"><i class="fa fa-times"></i>
						</button>
					</div>
					<h4 class="panel-title">New item</h4>
				</div>
				<div class="panel-body">
					<form id="addItemForm" action="<?= BASE_URL . "items/add" ?>" method="post" class="form-horizontal">
						<div class="form-group">
							<div class="col-md-12">
								<label>Item name: <span class="text-danger">*</span></label>
								<input type="text" class="form-control" name="item_name" placeholder="Item name" required />
							</div>
						</div>
						<div class="form-group">
							<div class="col-md-6">
								<label>Serial number:</label>
								<input type="text" class="form-control" name="item_serial" placeholder="Serial number" />
							</div>
							<div class="col-md-6">
								<label>Code:</label>
								<input type="text" class="form-control" name="item_code" placeholder="Item code" />
							</div>
						</div>
						<div class="form-group">
							<div class="col-md-6">
								<label>Item type:</label>
								<select class="form-control" name="item_type">
									<option value="Goods">Goods</option>
									<option value="Material">Material</option>
									<option value="Item">Item</label>
									<option value="Intermediate item">Intermediate item</label>
									<option value="Packaging">Packaging</option>
									<option value="Services">Services</option>
									<option value="Prepayment">Prepayment</option>
									<option value="Customers material">Customers material</option>
									<option value="Customers item">Customers item</option>
									<option value="Customers intermediate item">Customers intermediate item</option>
								</select>
							</div>
							<div class="col-md-3">
								<label>Unit of measurement:</label>
								<input type="text" class="form-control" name="item_unit" />
							</div>
						</div>
						<div class="form-group">
							<div class="col-md-3">
								<label>VAT: <span class="text-danger">*</span></label>
								<input type="number" class="form-control" name="item_vat" step="0.1" min="0" value="0.0" required />
							</div>
							<div class="col-md-3">
								<label>Price:</label>
								<input type="number" class="form-control" name="item_price" step="0.01" min="0" value="0.00" />
							</div>
							<div class="col-md-2">
								<label>Currency:</label>
								<select class="form-control" name="item_currency">
									<option value="EUR">EUR</option>
									<option value="USD">USD</option>
								</select>
							</div>
						</div>
						<div class="form-group">
							<div class="col-md-12">
								<label>Description:</label>
								<textarea class="form-control" rows="4" name="item_description"></textarea>
							</div>
						</div>
				</div>
				<div class="panel-footer">
						<button class="btn btn-success pull-left">Add item</button>
						<button class="btn btn-danger pull-right" type="button" onClick="hideAddItemPopup()">Close</button>
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
	</div>
    
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
	<script src="<?= ASSETS_URL . "fullcalendar/lib/moment.min.js" ?>"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/js/bootstrap-datetimepicker.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/css/bootstrap-datetimepicker.min.css" rel="stylesheet"/>
	<script src="<?= ASSETS_URL . "select2/dist/js/select2.full.min.js" ?>"></script>
	<script src="<?= ASSETS_URL . "jquery-file-upload/js/jquery.fileupload.js" ?>"></script>
	<!-- ================== END BASE JS ================== -->
	
	<!-- ================== BEGIN PAGE LEVEL JS ================== -->
		<script src="<?= JS_URL . "apps.min.js" ?>"></script>
	<!-- ================== END PAGE LEVEL JS ================== -->
	<script>
		var loggedEmployee = <?php echo json_encode($_SESSION["id"]); ?>;
		
		var ticket = <?php echo json_encode($ticket); ?>;
		var dateformat = <?php echo json_encode($_SESSION["dateformat"]); ?>;
		var timeformat = <?php echo json_encode($_SESSION["timeformat"]); ?>;
		
		var customersArray = [];
		var subsidiariesArray = [];
		
		var editTicketFiles = [];
		var workorderFiles = [];
		var addItemSource = 0;
		var addItemID;
		
		var addItemCount = 0;
		
	    $(document).ready(function() {
	        App.init();
			getMenuStatistics(loggedEmployee);
			getCustomers();
			getSubsidiaries();
			getEmployees();
			getDepartments();
			getItems();
			getCategories();
			
			
			
			$(".ticket-date-picker").datetimepicker({format: dateformat,
				"defaultDate": new Date(),
				allowInputToggle: true,
				widgetPositioning: {
							horizontal: 'right',
							vertical: 'auto'
				} 
			});
			$(".ticket-time-picker").datetimepicker({format: timeformat,
				stepping: 5,
				"defaultDate": new Date(),
				allowInputToggle: true,
				widgetPositioning: {
						horizontal: 'right',
						vertical: 'auto'
				}
			});
			
			$(".date-picker-input").datetimepicker({format: dateformat, "defaultDate": new Date(), allowInputToggle: true });
			
			$("#employeeSelect, #workorderCustomerSelect, #workorderSubsidiarySelect, #editTicketEmployeeSelect, #editTicketCustomerSelect, #editTicketSubsidiarySelect, #itemSelect").select2({width: "100%"});
			
			$('#editTicketFileUpload').fileupload({
               url: "ticket/upload",
               dataType : 'json',
               add : function(e,data){
                    $.each(data.files, function (index, file) {
                        $("#editTicketFiles").append('<li class="fa-file">' +
											'<div class="document-file">' +
												'<a href="' + "<?= UPLOADS_URL ?>" + "OtherFiles/" + file.name + '" download="' + file.name  + '" ><i class="fa fa-file-image"></i></a>' +
											'</div>' +
											'<div class="document-name"><a href="' + "<?= UPLOADS_URL ?>" + "OtherFiles/" + file.name  + '" download="' + file.name  + '" >' + file.name  + '</a></div>' +
										'</li>');
                    });
					$("#editTicketBtn").html('<i class="fa fa-spinner fa-spin"></i> Uploading file...');
                    $("#editTicketBtn").prop("disabled", true);
                    data.submit();
               },
               
               done: function(e,data){
                   if (!data.result.error){
                       editTicketFiles.push(data.result.filename);
                   }else{
                       swal(
							'Error!',
							'The server encountered the following error: ' + data.result.message,
							'error'
						);
                   }
				   $("#editTicketBtn").html('Edit ticket');
                   $("#editTicketBtn").prop("disabled", false);
               }
            });
			
			$('#workorderFileUpload').fileupload({
               url: "workorders/upload",
               dataType : 'json',
               add : function(e,data){
                    $.each(data.files, function (index, file) {
						$("#files").append('<li class="fa-file">' +
											'<div class="document-file">' +
												'<a href="' + "<?= UPLOADS_URL ?>" + "OtherFiles/" + file.name + '" download="' + file.name  + '" ><i class="fa fa-file-image"></i></a>' +
											'</div>' +
											'<div class="document-name"><a href="' + "<?= UPLOADS_URL ?>" + "OtherFiles/" + file.name  + '" download="' + file.name  + '" >' + file.name  + '</a></div>' +
										'</li>');
                    });
					$("#addWorkorderBtn").html('<i class="fa fa-spinner fa-spin"></i> Uploading file...');
                    $("#addWorkorderBtn").prop("disabled", true);
                    data.submit();
               },
               
               done: function(e,data){
                   if (!data.result.error){
                       workorderFiles.push(data.result.filename);
                   }else{
					   swal(
							'Error!',
							'The server encountered the following error: ' + data.result.message,
							'error'
						);
                   }
				   $("#addWorkorderBtn").html("Create work order");
                   $("#addWorkorderBtn").prop("disabled", false);
               }
            });

			
			$('#newWorkorderForm').on('submit', function(e) { //use on if jQuery 1.7+
                e.preventDefault();
				var postData = $("#newWorkorderForm").serializeArray();
				postData.push({ name: 'files', value: workorderFiles });
				var startD = moment($("#workorderStartDateInput").val(), dateformat).format("YYYY-MM-DD");
				var endD = moment($("#workorderEndDateInput").val(), dateformat).format("YYYY-MM-DD");
				if (startD == endD || moment(startD).isBefore(moment(endD))){
					$.ajax({
						type: "POST",
						url: "workorders/add",
						data: postData,
						dataType: "json",
						success: function(response) {
							if (response.workorder_id != null) {
								swal({
								  title: 'Work order created',
								  text: "Work order was successfully created",
								  type: 'success',
								  showCancelButton: true,
								  confirmButtonColor: '#3085d6',
								  cancelButtonColor: '#d33',
								  cancelButtonText: 'Close',
								  confirmButtonText: 'View work order'
								}).then(
									value => {
										window.open("workorderdetails?workorder_id=" + response.workorder_id, "_blank");
										location.reload();
									},
									dismiss => {
										location.reload();
									}
								).catch(swal.noop);
							} else {
								swal(
									'Error!',
									'The server encountered the following error: ' + response,
									'error'
								);
							}
						}
					});
				}else{
					swal(
						'Error!',
						'Work order start date must be before end date',
						'error'
					);
				}
            });
			
			$('#editTicketForm').on('submit', function(e) { //use on if jQuery 1.7+
                e.preventDefault();
				var postData = $("#editTicketForm").serializeArray();
				postData.push({ name: 'files', value: editTicketFiles });
                $.ajax({
                    type: "POST",
                    url: "<?= BASE_URL ?>" + "telephony/editticket",
                    data: postData,
                    success: function(response) {
                        if (response == ""){
                            location.reload();
                        }else{
                            swal(
                                'Error!',
                                'The server encountered the following error: ' + response,
                                'error'
                            );
                        }
                    }
                });
		    });
			
			$('#addItemForm').on('submit', function(e) { //use on if jQuery 1.7+
                e.preventDefault();
                $.ajax({
                    type: "POST",
                    url: "items/add",
                    data: $("#addItemForm").serialize(),
					dataType: "json",
                    success: function(response) {
                        if (!response.error) {
                            swal(
                                'Success',
                                'Item added successfully', 
                                'success'
                            );
							addItemID = response.item_id;
							getItems();
                            hideAddItemPopup();
                        } else {
                            swal(
                                'Error!',
                                'The server encountered the following error: ' + response,
                                'error'
                            );
                        }
                    }
                });
            });
			
			$('#ticketNoteForm').on('submit', function(e) { //use on if jQuery 1.7+
                e.preventDefault();
                $.ajax({
                    type: "POST",
                    url: "<?= BASE_URL ?>" + "ticketing/addnote",
                    data: $("#ticketNoteForm").serialize(),
					dataType: "json",
                    success: function(response) {
                        if (!response.error){
							var action = response.action;
							var icon;
							if (action.action_type == 0){
								icon = "fas fa-pencil-alt bg-success text-white";
							}else{
								icon = "fas fa-comments bg-primary text-white";
							}
							$("#ticketActions").append('<div class="widget-list-item">' +
																'<div class="widget-list-media icon p-l-0">' +
																	'<i class="' + icon + '"></i>' +
																'</div>' +
																'<div class="widget-list-content">' +
																	'<h4 class="widget-list-title">' + action.action_description + '</h4>' +
																	'<p class="widget-list-desc">By <b>' + action.employee_name + " " + action.employee_surname + '</b> on <b>' + moment(action.created_on).format("dddd, Do MMMM, HH:mm") +  '</b></p>' +
																'</div>' +
															'</div>');
												
							hideTicketNotePopup();
                        }else{
                            swal(
                                'Error!',
                                'The server encountered the following error: ' + response.msg,
                                'error'
                            );
                        }
                    }
                });
		    });
			
			$('#workorderCustomerSelect').on('change', function() {
                  var customer_id = this.value;
				  if (customer_id != ""){
					  for (var i = 0; i < customersArray.length; i++){
						  var curCustomer = customersArray[i];
						  if (curCustomer.customer_id == customer_id){
							$("#hiddenWorkorderLatitudeInput").val(curCustomer.latitude);
							$("#hiddenWorkorderLongitudeInput").val(curCustomer.longitude);
							$("#workorderLocationInput").val(curCustomer.customer_address);
							$("#workorderSubsidiarySelect").html("");
							$("#workorderSubsidiarySelect").append($('<option>', {
								value: "",
								text: "Main company"
							}));
							for (var j = 0; j < subsidiariesArray.length; j++){
								var subsidiary = subsidiariesArray[j];
								if (subsidiary.customer_id == curCustomer.customer_id){
									$("#workorderSubsidiarySelect").append($('<option>', {
										value: subsidiary.subsidiary_id,
										text: subsidiary.subsidiary_name
									}));
								}
							}
							break;
						  }
					  }
				  }else{
					  $("#workorderSubsidiarySelect").html("");
					  $("#workorderSubsidiarySelect").append($('<option>', {
								value: "",
								text: "None"
					  }));
				  }
            });
			
			$("#workorderSubsidiarySelect").on("change", function(){
				var subsidiary_id = this.value;
				if (subsidiary_id != ""){
					for (var i = 0; i < subsidiariesArray.length; i++){
						var subsidiary = subsidiariesArray[i];
						if (subsidiary.subsidiary_id == subsidiary_id){
							$("#hiddenWorkorderLatitudeInput").val(subsidiary.latitude);
							$("#hiddenWorkorderLongitudeInput").val(subsidiary.longitude);
							$("#workorderLocationInput").val(subsidiary.subsidiary_address);
							break;
						}
					}
				}else{
					$("#workorderCustomerSelect").trigger("change");
				}
			});
			
			$('#editTicketCustomerSelect').on('change', function() {
                  var customer_id = this.value;
				  if (customer_id != ""){
					  for (var i = 0; i < customersArray.length; i++){
						  var curCustomer = customersArray[i];
						  if (curCustomer.customer_id == customer_id){
							$("#editTicketLatitudeInput").val(curCustomer.latitude);
							$("#editTicketLongitudeInput").val(curCustomer.longitude);
							$("#editTicketLocationInput").val(curCustomer.customer_address);
							$("#editTicketSubsidiarySelect").html("");
							$("#editTicketSubsidiarySelect").append($('<option>', {
								value: "",
								text: "Main company"
							}));
							for (var j = 0; j < subsidiariesArray.length; j++){
								var subsidiary = subsidiariesArray[j];
								if (subsidiary.customer_id == curCustomer.customer_id){
									$("#editTicketSubsidiarySelect").append($('<option>', {
										value: subsidiary.subsidiary_id,
										text: subsidiary.subsidiary_name
									}));
								}
							}
							break;
						  }
					  }
				  }else{
					  $("#editTicketSubsidiarySelect").html("");
					  $("#editTicketSubsidiarySelect").append($('<option>', {
								value: "",
								text: "None"
					  }));
				  }
            });
			
			$("#editTicketSubsidiarySelect").on("change", function(){
				var subsidiary_id = this.value;
				if (subsidiary_id != ""){
					for (var i = 0; i < subsidiariesArray.length; i++){
						var subsidiary = subsidiariesArray[i];
						if (subsidiary.subsidiary_id == subsidiary_id){
							$("#editTicketLatitudeInput").val(subsidiary.latitude);
							$("#editTicketLongitudeInput").val(subsidiary.longitude);
							$("#editTicketLocationInput").val(subsidiary.subsidiary_address);
							break;
						}
					}
				}else{
					$("#editTicketCustomerSelect").trigger("change");
				}
			});
	    });
		
		function getCategories(){
			$.ajax({
                type: "POST",
                url: "<?= BASE_URL ?>" + "ticketcategory/get",
                data: null,
                dataType: "json",
                success: function(categories) {
						$("#editTicketTypeSelect").html("");
						$("#editTicketTypeSelect").append($('<option>', {
								value: "",
								text: "Choose a type"
							}));
						for (var i = 0; i < categories.length; i++){
							$("#editTicketTypeSelect").append($('<option>', {
								value: categories[i].category_id,
								text: categories[i].category_name
							}));
						}
				}
			});
		}
		
		function showAddItemPopup(source){
			addItemSource = source;
			if (addItemSource == 1){
				$("#workorderPopup, #newWorkorderDIV").hide();
			}
			if (addItemSource == 2){
				$("#workorderPopup, #editWorkorderDIV").hide();
			}
			$("#itemPopup, #addItemDIV").show();
		}
		
		function hideAddItemPopup(){
			$("#addItemForm")[0].reset();
			if (addItemSource == 1){
				$("#workorderPopup, #newWorkorderDIV").show();
				addItemSource = 0;
			}
			if (addItemSource == 2){
				$("#workorderPopup, #editWorkorderDIV").show();
				addItemSource = 0;
			}
			$("#itemPopup, #addItemDIV").hide();
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
		
		function showNewWorkorderPopup(){
			$("#newWorkorderForm input[name=workorder_subject]").val(ticket.ticket_subject);
			$("#employeeSelect").val(ticket.assigned_to.split(",")).trigger("change");
			$("#newWorkorderForm input[name=start_date]").val(moment().format(dateformat));
			$("#newWorkorderForm input[name=end_date]").val(moment(ticket.ticket_date).format(dateformat));
			$("#workorderCustomerSelect").val(ticket.customer_id).trigger("change");
			$("#workorderSubsidiarySelect").val(ticket.subsidiary_id).trigger("change");
			$("#workorderLocationInput").val(ticket.ticket_location);
			$("#newWorkorderForm input[name=latitude]").val(ticket.latitude);
			$("#newWorkorderForm input[name=longitude]").val(ticket.longitude);
			$("#newWorkorderForm textarea[name=workorder_notes]").html(ticket.ticket_notes);
			$("#workorderPopup, #newWorkorderDIV").show();
		}
		
		function hideNewWorkorderPopup(){
			$("#newWorkorderForm")[0].reset();
			$("#employeeSelect").val("").trigger("change");
			addItemCount = 0;
			$("#itemsDIV").html("");
			workorderFiles = [];
			$("#files").html("");
			$("#workorderPopup, #newWorkorderDIV").hide();
		}
		
		function addItem(){
		    $("#itemsDIV").append('<div class="form-group"><div class="col-md-9">' +
									'<select id="select' + addItemCount + '" class="form-control" name="items[]" required>' +
										$("#itemSelect").html() + 
									'</select>' +
									'</div>' +
									'<div class="col-md-2">' +
										'<input type="number" class="form-control" name="item_amount[]" min="0.1" step="0.1" value="1" />' +
									'</div>' +
									'<div class="col-md-1 p-0">' +
										'<button type="button" class="btn btn-link text-danger" onClick="removeParentDIV(this)"><i class="fa fa-trash"></i></button>' +
									'</div>' +
								'</div>');
			$("#select" + addItemCount).select2({width: "100%"});
			addItemCount++;
		}
		
		function removeParentDIV(btn){
			$(btn).closest(".form-group").remove();
		}
		
		function getItems(){
			$.ajax({
                type: "POST",
                url: "<?= BASE_URL ?>" + "items/get",
                data: null,
                dataType: "json",
                success: function(items) {
					$("#itemSelect").html("");
					$("#itemSelect").append($('<option>', {
                            value: "",
                            text: "Choose an item"
                    }));
					for (var i = 0; i < items.length; i++){
						$("#itemSelect").append($('<option>', {
                            value: items[i].item_id,
                            text: items[i].item_name
                        }));
					}
					if (addItemSource == 1){
						$("#workorderPopup, #newWorkorderDIV").show();
						addItemSource = 0;
					}
					if (addItemSource == 2){
						$("#workorderPopup, #editWorkorderDIV").show();
						addItemSource = 0;
					}
				}
			});
		}
		
		function showTicketNotePopup(){
			$("#ticketNotePopupDIV, #ticketNoteDIV").show();
		}
		
		function hideTicketNotePopup(){
			$("#ticketNoteForm")[0].reset();
			$("#ticketNotePopupDIV, #ticketNoteDIV").hide();
		}
		
		function initMap(){
			var editTicketSearchBox = new google.maps.places.SearchBox(document.getElementById('editTicketLocationInput'));
	
			google.maps.event.addListener(editTicketSearchBox, 'places_changed', function() {
                var places = editTicketSearchBox.getPlaces();
                var i, place;
                for (i = 0; place = places[i]; i++) {
                    (function(place) {
                        var location = place.geometry.location;
                        $("#editTicketLatitudeInput").val(location.lat());
                        $("#editTicketLongitudeInput").val(location.lng());
                    }(place));
                }
            });
			
			var searchBox = new google.maps.places.SearchBox(document.getElementById('workorderLocationInput'));
            
            google.maps.event.addListener(searchBox, 'places_changed', function() {
                var places = searchBox.getPlaces();
                var i, place;
                for (i = 0; place = places[i]; i++) {
                    (function(place) {
                        var location = place.geometry.location;
                        $("#hiddenWorkorderLatitudeInput").val(location.lat());
                        $("#hiddenWorkorderLongitudeInput").val(location.lng());
                    }(place));
                }
            });
		}
		
		function getCustomers(){
            $.ajax({
                type: "POST",
                url: "<?= BASE_URL ?>" + "customer/get",
                data: null,
                dataType: "json",
                success: function(customers) {
                    customersArray = customers;
                    for (var i = 0; i < customers.length; i++){
                        $("#editTicketCustomerSelect, #workorderCustomerSelect").append($('<option>', {
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
					employeeArray = employees;
                    var lastDepartment = null;
                    for (var i = 0; i < employees.length; i++){
                            if (lastDepartment == null){
                                $("#ticketEmployeeSelect, #editTicketEmployeeSelect, #employeeSelect").append("<optgroup label='" + employees[i].department_name + "'>");
                                lastDepartment = employees[i].department_name;
                            }else if (employees[i].department_name != lastDepartment){
                                $("#ticketEmployeeSelect, #editTicketEmployeeSelect, #employeeSelect").append("</optgroup><optgroup label='" + employees[i].department_name + "'>");
                                lastDepartment = employees[i].department_name;
                            }
                            $("#ticketEmployeeSelect, #editTicketEmployeeSelect, #employeeSelect").append($('<option>', {
                                value: employees[i].employee_id,
                                text: employees[i].employee_name + " " + employees[i].employee_surname
                            }));
                    }
                    $("#ticketEmployeeSelect, #editTicketEmployeeSelect, #employeeSelect").append("</optgroup>");
                }
            });
        }
        
        function getDepartments(){
            $.ajax({
                type: "POST",
                url: "<?= BASE_URL ?>" + "department/get",
                data: null,
                dataType: "json",
                success: function(departments) {
                    for (var i = 0; i < departments.length; i++){
                        $("#editTicketDepartmentSelect").append($('<option>', {
                            value: departments[i].department_id,
                            text: departments[i].department_name
                        }));
                    }
                }
            });
        }
		
		function viewEmail(){
			var imgURL = "<?= IMG_URL ?>" + "b-io.png";
            var message = ticket.email_body;
            var prettyDate = moment(ticket.email_date).format("dddd Do MMMM, HH:mm");

            var postData = { "email_id": ticket.email_id };
            $.ajax({
                type: "POST",
                url: "<?= BASE_URL ?>" + "telephony/getEmail",
                data: postData,
                dataType: "json",
                success: function(dbMail) {
						var customerData = { email: ticket.email_from};
						$.ajax({
							type: "POST",
							url: "<?= BASE_URL ?>" + "customer/getByEmail",
							data: customerData,
							dataType: "json",
							success: function(customer) {
								var emailCustomer = "";
								if (customer.exists != 0){
									emailCustomer = "<div class='email-to'><strong>Customer:</strong> " + customer.customer_name + '</div>';
								}
								var opened_by = "";
								var notesDIV = "";
								if (dbMail.status == 2){
									notesDIV = '<li class="media media-sm clearfix">' +
													'<div class="media-body">' +
														'<div class="email-from text-inverse f-s-14 f-w-600 m-b-3">' +
															"Employee notes:" +
														'</div>' +
														dbMail.notes +
													'</div>' +
												'</li>';
								}
								
								var emailHeader = '<ul class="media-list underline m-b-15 p-b-15">' +
																	'<li class="media media-sm clearfix">' +
																		'<img src="' + imgURL + '" class="pull-left media-object rounded-corner" />' + 
																		'<div class="media-body">' +
																			'<div class="email-from text-inverse f-s-14 f-w-600 m-b-3">' +
																				"from " + ticket.email_from +
																			'</div>' +
																			'<div class="m-b-3"><i class="fa fa-clock fa-fw"></i>&nbsp;' + prettyDate + '</div>' +
																			emailCustomer + 
																		'</div>' +
																	'</li>' +
																	notesDIV + 
																'</ul>';
							
								
								$("#emailHeaderDIV").html(emailHeader);
								$("#emailMessageDIV").html(message);
						  
								$("#emailPopupDIV, #emailPopupPanel").show();
							}
						});
                }
            });
        }
		
		function hideEmailContent(){
            $("#emailContentDIV").html("");
            $("#emailPopupDIV, #emailPopupPanel, #emailCommentPanel").hide();
        }
		
		function showEditTicketPopup(row){
            $("#editTicketIDInput").val(ticket.ticket_id);
            $("#editTicketCodeInput").val(ticket.ticket_code);
            $("#editTicketSubjectInput").val(ticket.ticket_subject);
            $("#editTicketDateInput").val(moment(ticket.ticket_date).format(dateformat));
            $("#editTicketForm input[name=ticket_priority]").val([ticket.ticket_priority]);
            $("#editTicketCustomerSelect").val(ticket.customer_id).trigger("change");
			$("#editTicketSubsidiarySelect").val(ticket.subsidiary_id).trigger("change");
            $("#editTicketEmployeeSelect").val(ticket.assigned_to.split(",")).trigger("change");
            $("#editTicketLocationInput").val(ticket.ticket_location);
            $("#editTicketLatitudeInput").val(ticket.latitude);
            $("#editTicketLongitudeInput").val(ticket.longitude);
            $("#editTicketTypeSelect").val(ticket.ticket_type);
            if (ticket.billing_fromdate != ""){
				$("#editTicketStartDateInput").val(moment(ticket.billing_fromdate).format(dateformat));
			}
			if (ticket.billing_fromtime != ""){
				$("#editTicketStartTimeInput").val(moment(ticket.billing_fromdate + " " + ticket.billing_fromtime).format(timeformat));
			}
			if (ticket.billing_todate != ""){
				$("#editTicketEndDateInput").val(moment(ticket.billing_todate).format(dateformat));
			}
			if (ticket.billing_totime != ""){
				$("#editTicketEndTimeInput").val(moment(ticket.billing_todate + " " + ticket.billing_totime).format(timeformat));
			}
            $("#editTicketBillingNotesInput").html(ticket.billing_notes);
            $("#editTicketNotesInput").html(ticket.ticket_notes);
            $("#editTicketForm input[name=ticket_status]").val([ticket.ticket_status]);
			var fileContent = "";
            var files = ticket.ticket_files.split(";");
            for (var i = 0; i < files.length; i++){
                if (files[i] != ""){
                    fileContent += '<li class="fa-file">' +
										'<div class="document-file">' +
										   	'<a href="' + "<?= UPLOADS_URL ?>" + "OtherFiles/" + files[i] + '" download="' + files[i] + '" ><i class="fa fa-file-image"></i></a>' +
										'</div>' +
										'<div class="document-name"><a href="' + "<?= UPLOADS_URL ?>" + "OtherFiles/" + files[i] + '" download="' + files[i] + '" >' + files[i] + '</a></div>' +
									'</li>';
                }
            }
			$("#editTicketFiles").html(fileContent);
            $("#ticketPopupDIV, #editTicketDIV").show();
        }
        
        function hideEditTicketPopup(){
			$("#editTicketForm")[0].reset();
			editTicketFiles = [];
			$("#editTicketFiles").html("");
            $("#ticketPopupDIV, #editTicketDIV").hide();
        }
		
	</script>
	<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyByTQPUumUXa7XiemK1liQCKT3839oj7DE&callback=initMap&language=en&libraries=places"></script>
</body>
</html>
