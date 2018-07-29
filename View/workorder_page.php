<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
<!--<![endif]-->

<head>
    <meta charset="utf-8" />
    <title>Work order details</title>
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
	
	#editWorkorderDIV, #workorderNoteDIV, #addItemDIV{
        width: 900px;
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
								echo '<li class="active">
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
			<div class="profile">
				<div class="profile-header profile-header-no-image">
					<!-- BEGIN profile-header-cover -->
					<div class="profile-header-cover"></div>
					<!-- END profile-header-cover -->
					<!-- BEGIN profile-header-content -->
					<div class="profile-header-content">
						<!-- BEGIN profile-header-info -->
						<div class="profile-header-info">
							<h4 class="m-t-10 m-b-5">Work order</h4>
						</div>
						<!-- END profile-header-info -->
					</div>
					<!-- END profile-header-content -->
				</div>
			</div>
			<!-- end profile -->
			<div class="profile-content">
			<!-- begin invoice -->
				<div class="invoice">
					<div class="invoice-company">
						<span class="pull-right hidden-print">
						<button class="btn btn-sm btn-white m-b-10" onClick="showWorkorderNotePopup()"><i class="fas fa-align-left text-primary m-r-5"></i>Add a note</button>
						<button class="btn btn-sm btn-white m-b-10" onClick="showEditWorkorderPopup()"><i class="fa fa-edit text-primary m-r-5"></i>Edit work order</button>
						<?php
							if ($workorder["ticket_id"] != null){
								echo '<a href="ticketdetails?ticket_id=' . $workorder["ticket_id"] . '" class="btn btn-sm btn-white m-b-10"><i class="fa fa-eye text-primary m-r-5"></i>View ticket</a>';
							}
						?>
						<button onclick="window.print()" class="btn btn-sm btn-white m-b-10"><i class="fa fa-print text-success m-r-5"></i> Print</button>
						</span>
						<?php
							if ($settings["company_logo"] != ""){
								echo '<img src="' . IMG_URL . $settings["company_logo"] . '" style="max-width: 200px;" /><br>';
							}
							$statusLabel = "<span class='f-s-14'><i class='fa fa-circle text-warning m-r-5'></i>Incomplete</span>";
							if ($workorder["status"] == 1){
								$statusLabel = "<span class='f-s-14'><i class='fa fa-circle text-primary m-r-5'></i>In progress</span>";
							}else if ($workorder["status"] == 2){
								$statusLabel = "<span class='f-s-14'><i class='fa fa-circle text-success m-r-5'></i>Finished</span>";
							}else if ($workorder["status"] == 3){
								$statusLabel = "<span class='f-s-14'><i class='fa fa-circle text-danger m-r-5'></i>Canceled</span>";
							}
							
							echo "Work order - " . $workorder["workorder_subject"] . "<br>";
							echo $statusLabel;
						?>
						
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
									if ($workorder["subsidiary_name"] != null){
										echo $workorder["subsidiary_name"];
									}else{
										echo "Main company";
									}
								?><br/>
								<?php echo $customer["customer_address"]; ?><br />
								<?php echo $customer["customer_phone"]; ?>
							</address>
						</div>
						<div class="invoice-date">
							<small>Details:</small>
							<div class="m-t-5"><strong>Work order code - </strong><?php echo $workorder["workorder_code"]; ?></div>
							<div class="date">Due <?php echo date("l, F jS" , strtotime($workorder["workorder_enddate"])); ?></div>
							<div class="invoice-detail">
								<strong>Created on</strong> <?php echo date("l, F jS, H:i" , strtotime($workorder["created_on"])); ?><br/>
								<?php
									if ($workorder["opened_on"] != ""){
										echo "<strong>Opened on</strong> " . date("l, F jS, H:i" , strtotime($workorder["opened_on"]));
									}
									if ($workorder["finished_on"] != "" && $workorder["status"] == 2){
										echo "<br><strong>Finished on</strong> " . date("l, F jS, H:i" , strtotime($workorder["finished_on"]));
									}
								?>
							</div>
						</div>
					</div>
					<div class="invoice-content">
						<div class="table-responsive">
							<table class="table table-invoice">
								<thead>
									<tr>
										<th>ITEM INFO</th>
										<th class="text-center">TYPE</th>
										<th class="text-center">PRICE</th>
										<th class="text-center">AMOUNT</th>
										<th class="text-center">VAT</th>
										<th class="text-center">TOTAL</th>
									</tr>
								</thead>
								<tbody>
									<?php
										foreach ($items as $item){
											echo '
											<tr>
												<td><span class="text-inverse">' . $item["item_name"] . '</span><br><small>' . $item["item_description"] . '</small></td>
												<td class="text-center">' . $item["item_type"] . '</td>
												<td class="text-center">' . $item["item_price"] . ' ' . $item["item_currency"] . '</td>
												<td class="text-center">' . $item["item_amount"] . ' ' . $item["item_unit"] . '</td>
												<td class="text-center">' . $item["item_vat"] . ' %</td>
												<td class="text-center">' . ($item["item_amount"] * ($item["item_price"] + ($item["item_vat"] * $item["item_price"]) / 100)) . ' ' . $item["item_currency"] . '</td>
											</tr>';
										}
									?>
								</tbody>
							</table>
						</div>
					</div>
					<div style="clear: both;"></div>
					<div class="invoice-content">
						<div class="invoice-price">
							<div class="invoice-price-left">
								<div class="invoice-price-row">
									<div class="sub-price">
										<small>SUBTOTAL</small>
										<span class="text-inverse"><?php
											$subtotal = 0;
											foreach ($items as $item){
												$subtotal += $item["item_amount"] * $item["item_price"];
											}
											echo $subtotal . ' ' . $item["item_currency"];
										?></span>
									</div>
									<div class="sub-price">
										<i class="fa fa-plus text-muted"></i>
									</div>
									<div class="sub-price">
										<small>VAT</small>
										<span class="text-inverse"><?php
											$vat = 0;
											foreach ($items as $item){
												$vat += ($item["item_amount"] * (($item["item_vat"] * $item["item_price"]) / 100));
											}
											echo $vat . ' ' . $item["item_currency"];
										?></span>
									</div>
								</div>
							</div>
							<div class="invoice-price-right">
								<small>Total</small>
								<?php
									$totalCost = 0;
									$currency = $items[0]["item_currency"];
									foreach ($items as $item){
										$totalCost += ($item["item_amount"] * ($item["item_price"] + ($item["item_vat"] * $item["item_price"]) / 100));
									}
									echo $totalCost . ' ' . $currency;
								?>
							</div>
						</div>
					</div>
					<div class="row hidden-print">
						<div class="col-md-6">
							<ul id="workorderActions" class="media-list media-list-with-divider media-messaging">
								<?php
									$count = 0;
									foreach ($actions as $action){
										if ($count == 0){
											echo '<h5>Work order history</h5>';
										}
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
											$count++;
									}
								?>
							</ul>
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
									  echo '<a href="' . DIR_URL . $file["filepath"] . '" class="widget-list-item" download>
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
			<!-- end invoice -->
		</div>	
	</div>
	<div class="popupContainer" id="workorderPopup" hidden>
			<div class="panel panel-primary" id="editWorkorderDIV" hidden>
				<div class="panel-heading">
					<div class="panel-heading-btn">
						<button onclick="hideEditWorkorderPopup()" class="btn btn-xs btn-icon btn-circle btn-default"><i class="fa fa-times"></i>
						</button>
					</div>
					<h4 class="panel-title">Edit workorder</h4>
				</div>
				<div class="panel-body">
					<form id="editWorkorderForm" action="<?= BASE_URL . "workorders/edit" ?>" method="post" class="form-horizontal">
						<input type="hidden" id="hiddenEditWorkorderLatitudeInput" name="latitude" />
						<input type="hidden" id="hiddenEditWorkorderLongitudeInput" name="longitude" />
						<input type="hidden" name="workorder_id" />
						<div class="form-group">
                                <div class="col-md-6">
                                    <label>Status:</label><br>
									<div class="radio radio-css radio-inline radio-warning">
										<input type="radio" id="cob1" name="status" value="0">
										<label for="cob1">
											Incomplete
										</label>
										</div>
                                    <div class="radio radio-css radio-inline radio-primary">
                                        <input type="radio" id="cob2" name="status" value="1">
                                        <label for="cob2">
                                        	In progress
                                        </label>
                                    </div>
                                    <div class="radio radio-css radio-inline radio-success">
                                        <input type="radio" id="cob3" name="status" value="2">
                                        <label for="cob3">
                                        	Finished
                                        </label>
                                    </div>
									<div class="radio radio-css radio-inline radio-danger">
                                        <input type="radio" id="cob4" name="status" value="3">
                                        <label for="cob4">
                                        	Canceled
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
											<input type="radio" id="epob2" name="priority" value="Normal">
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
								<label>Subject: <span class="text-danger">*</span></label>
								<input id="editWorkorderSubjectInput" type="text" class="form-control" name="workorder_subject" placeholder="Enter a subject" required />
							</div>
						</div>
						<div class="form-group">
							<div class="col-md-6">
								<label>Assign to: <span class="text-danger">*</span></label>
								<select id="editEmployeeSelect" class="form-control" name="assign_to[]" multiple required>
								
								</select>
							</div>
							<div class="col-md-3">
								<label>Start date: <span class="text-danger">*</span></label>
								<input id="editWorkorderStartDateInput" type="text" class="form-control date-picker-input" name="start_date" placeholder="Select a start date" required />
							</div>
							<div class="col-md-3">
								<label>End date: <span class="text-danger">*</span></label>
								<input id="editWorkorderEndDateInput" type="text" class="form-control date-picker-input" name="end_date" placeholder="Select a end date" required />
							</div>
						</div>
						<div class="form-group">
							<div class="col-md-6">
								<label>Customer: <span class="text-danger">*</span></label>
								<select id="editWorkorderCustomerSelect" class="form-control" name="customer_id">
									<option value="">Choose a customer</option>
								</select>
							</div>
							<div class="col-md-6">
								<label>Subsidiary: <span class="text-danger">*</span></label>
								<select id="editWorkorderSubsidiarySelect" class="form-control" name="subsidiary_id">
									<option value="">Main company</option>
								</select>
							</div>
						</div>
						<div class="form-group">
							<div class="col-md-12">
								<label>Location:</label>
								<input id="editWorkorderLocationInput" type="text" class="form-control" name="workorder_location" placeholder="Enter an address" />
							</div>
						</div>
						<div class="form-group">
							<div class="col-md-10">
								<label>Item: </label>
								<select id="editItemSelect" class="form-control" name="items[]" required>
									<option value="">Choose an item</option>
								</select>
								<div class="m-t-5">
									<span class="span-add m-r-15" onClick="addEditItem()"><i class="fas fa-plus-circle m-r-5"></i>Add an item</span>
									<span class="span-add text-success" onClick="showAddItemPopup(2)"><i class="fas fa-plus-circle m-r-5"></i>Create an item</span>
								</div>
							</div>
							<div class="col-md-2">
								<label>Amount: </label>
								<input id="editItemAmountInput" type="number" class="form-control" name="item_amount[]" min="0.1" step="0.1" value="1" />
							</div>
						</div>
						<div id="editItemsDIV">
								
						</div>
						<div class="form-group">
							<div class="col-md-12">
								<label>Notes: </label>
								<textarea id="editWorkorderNotesInput" class="form-control" name="workorder_notes" rows="4"></textarea>
							</div>
						</div>
						<div class="form-group">
							<div class="col-md-12">
								<label><i class="fas fa-paperclip text-primary"></i> Attachments</label><br>
								<ul id="editWorkorderFiles" class="attached-document clearfix m-0">
								</ul>
								<span class="btn btn-link p-0 fileinput-button">
								<span>Attach a file</span>
									<!-- The file input field used as target for the file upload widget -->
									<input id="editWorkorderFileUpload" type="file" name="file" multiple>
								</span>
							</div>
						</div>
					</div>
					<div class="panel-footer">
						<button id="editWorkorderBtn" class="btn btn-success pull-left">Edit work order</button>
						<button class="btn btn-danger pull-right" type="button" onClick="hideEditWorkorderPopup()">Close</button>
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
								<label>Unit of measurement: <span class="text-danger">*</span></label>
								<input type="text" class="form-control" name="item_unit" placeholder="Enter unit" required />
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
								<label>Description: <span class="text-danger">*</span></label>
								<textarea class="form-control" rows="4" name="item_description" placeholder="Enter a short description here" required></textarea>
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
		<div class="popupContainer" id="workorderNotePopupDIV" hidden>
                <div class="panel panel-inverse" id="workorderNoteDIV" hidden>
                    <div class="panel-heading">
                        <div class="panel-heading-btn">
                            <button onclick="hideWorkorderNotePopup()" class="btn btn-xs btn-icon btn-circle btn-default" ><i class="fa fa-times"></i></button>
                        </div>
                        <h4 class="panel-title">Add a note</h4>
                    </div>
                    <div class="panel-body">
                        <form id="workorderNoteForm" action="<?= BASE_URL . "workorders/addnote" ?>" method="post" class="form-horizontal">
							<input type="hidden" name="workorder_id" value="<?php echo $workorder["workorder_id"] ?>" />
							<div class="form-group">
								<div class="col-md-12">
									<label>Note: <span class="text-danger">*</label>
									<textarea class="form-control" name="description" rows="4" placeholder="Enter your notes here"></textarea>
								</div>
							</div>
                    </div>
					<div class="panel-footer">
						<button class="btn btn-success pull-left">Add note</button>
						<button class="btn btn-danger pull-right" type="button" onClick="hideWorkorderNotePopup()">Close</button>
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
		
		var workorder = <?php echo json_encode($workorder); ?>;
		var items = <?php echo json_encode($items); ?>;
		var dateformat = <?php echo json_encode($_SESSION["dateformat"]); ?>;
		var timeformat = <?php echo json_encode($_SESSION["timeformat"]); ?>;
		
		var customersArray = [];
		var subsidiariesArray = [];
		
		var editWorkorderFiles = [];
		
		var addItemSource = 0;
		var addItemID;
		
		var editItemCount = 0;
		
	    $(document).ready(function() {
	        App.init();
			getMenuStatistics(loggedEmployee);
			getItems();
			getEmployees();
			getCustomers();
			getSubsidiaries();
			
			$(".date-picker-input").datetimepicker({format: dateformat, "defaultDate": new Date(), allowInputToggle: true });
			$("#editEmployeeSelect, #editWorkorderCustomerSelect, #editWorkorderSubsidiarySelect, #editItemSelect").select2({width: "100%"});
			
			$('#editWorkorderForm').on('submit', function(e) { //use on if jQuery 1.7+
                e.preventDefault();
				var postData = $("#editWorkorderForm").serializeArray();
				postData.push({ name: 'files', value: editWorkorderFiles });
				var startD = moment($("#editWorkorderStartDateInput").val(), dateformat).format("YYYY-MM-DD");
				var endD = moment($("#editWorkorderEndDateInput").val(), dateformat).format("YYYY-MM-DD");
				if (startD == endD || moment(startD).isBefore(moment(endD))){
					$.ajax({
						type: "POST",
						url: "workorders/edit",
						data: postData,
						success: function(response) {
							if (response == "") {
								location.reload();
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
			
			$('#workorderNoteForm').on('submit', function(e) { //use on if jQuery 1.7+
                e.preventDefault();
                $.ajax({
                    type: "POST",
                    url: "<?= BASE_URL ?>" + "workorders/addnote",
                    data: $("#workorderNoteForm").serialize(),
					dataType: "json",
                    success: function(response) {
                        if (!response.error){
							var action = response.action;
							$("#workorderActions").append('<div class="widget-list-item">' +
																'<div class="widget-list-media icon p-l-0">' +
																	'<i class="' + icon + '"></i>' +
																'</div>' +
																'<div class="widget-list-content">' +
																	'<h4 class="widget-list-title">' + action.action_description + '</h4>' +
																	'<p class="widget-list-desc">By <b>' + action.employee_name + " " + action.employee_surname + '</b> on <b>' + moment(action.created_on).format("dddd, Do MMMM, HH:mm") +  '</b></p>' +
																'</div>' +
															'</div>');
												
							hideWorkorderNotePopup();
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
			
			$('#editWorkorderCustomerSelect').on('change', function() {
                  var customer_id = this.value;
				  if (customer_id != ""){
					  for (var i = 0; i < customersArray.length; i++){
						  var curCustomer = customersArray[i];
						  if (curCustomer.customer_id == customer_id){
							$("#hiddenEditWorkorderLatitudeInput").val(curCustomer.latitude);
							$("#hiddenEditWorkorderLongitudeInput").val(curCustomer.longitude);
							$("#editWorkorderLocationInput").val(curCustomer.customer_address);
							$("#editWorkorderSubsidiarySelect").html("");
							$("#editWorkorderSubsidiarySelect").append($('<option>', {
								value: "",
								text: "Main company"
							}));
							for (var j = 0; j < subsidiariesArray.length; j++){
								var subsidiary = subsidiariesArray[j];
								if (subsidiary.customer_id == curCustomer.customer_id){
									$("#editWorkorderSubsidiarySelect").append($('<option>', {
										value: subsidiary.subsidiary_id,
										text: subsidiary.subsidiary_name
									}));
								}
							}
							break;
						  }
					  }
				  }else{
					  $("#editWorkorderSubsidiarySelect").html("");
					  $("#editWorkorderSubsidiarySelect").append($('<option>', {
								value: "",
								text: "None"
					  }));
				  }
            });
			
			$("#editWorkorderSubsidiarySelect").on("change", function(){
				var subsidiary_id = this.value;
				if (subsidiary_id != ""){
					for (var i = 0; i < subsidiariesArray.length; i++){
						var subsidiary = subsidiariesArray[i];
						if (subsidiary.subsidiary_id == subsidiary_id){
							$("#hiddenEditWorkorderLatitudeInput").val(subsidiary.latitude);
							$("#hiddenEditWorkorderLongitudeInput").val(subsidiary.longitude);
							$("#editWorkorderLocationInput").val(subsidiary.subsidiary_address);
							break;
						}
					}
				}else{
					$("#editWorkorderCustomerSelect").trigger("change");
				}
			});
			
			$('#editWorkorderFileUpload').fileupload({
               url: "<?= BASE_URL ?>" + "workorders/upload",
               dataType : 'json',
               add : function(e,data){
                    $.each(data.files, function (index, file) {
                        $("#editWorkorderFiles").append('<li class="fa-file">' +
											'<div class="document-file">' +
												'<a href="' + "<?= UPLOADS_URL ?>" + "OtherFiles/" + file.name + '" download="' + file.name  + '" ><i class="fa fa-file-image"></i></a>' +
											'</div>' +
											'<div class="document-name"><a href="' + "<?= UPLOADS_URL ?>" + "OtherFiles/" + file.name  + '" download="' + file.name  + '" >' + file.name  + '</a></div>' +
										'</li>');
                    });
					$("#editWorkorderBtn").html('<i class="fa fa-spinner fa-spin"></i> Uploading file...');
                    $("#editWorkorderBtn").prop("disabled", true);
                    data.submit();
               },
               
               done: function(e,data){
				   console.log(data);
                   if (!data.result.error){
                       editWorkorderFiles.push(data.result.filename);
                   }else{
                       swal(
							'Error!',
							'The server encountered the following error: ' + data.result.message,
							'error'
						);
                   }
				   $("#editWorkorderBtn").html('Edit work order');
                   $("#editWorkorderBtn").prop("disabled", false);
               }
            });
			
			
	    });
		
		function addEditItem(){
			$("#editItemsDIV").append('<div class="form-group"><div class="col-md-9">' +
									'<select id="select' + editItemCount + '" class="form-control" name="items[]" required>' +
										$("#editItemSelect").html() + 
									'</select>' +
									'</div>' +
									'<div class="col-md-2">' +
										'<input type="number" class="form-control" name="item_amount[]" min="0.1" step="0.1" value="1" />' +
									'</div>'+
									'<div class="col-md-1 p-0">' +
										'<button type="button" class="btn btn-link text-danger" onClick="removeParentDIV(this)"><i class="fa fa-trash"></i></button>' +
									'</div>' +
								'</div>');
			$("#select" + editItemCount).select2({width: "100%"});
			editItemCount++;
		}
		
		function removeParentDIV(btn){
			$(btn).closest(".form-group").remove();
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
		
		function getItems(){
			$.ajax({
                type: "POST",
                url: "<?= BASE_URL ?>" + "items/get",
                data: null,
                dataType: "json",
                success: function(items) {
					$("#itemSelect, #editItemSelect").html("");
					$("#itemSelect, #editItemSelect").append($('<option>', {
                            value: "",
                            text: "Choose an item"
                    }));
					for (var i = 0; i < items.length; i++){
						$("#itemSelect, #editItemSelect").append($('<option>', {
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
		
		
		function getCustomers(){
            $.ajax({
                type: "POST",
                url: "<?= BASE_URL ?>" + "customer/get",
                data: null,
                dataType: "json",
                success: function(customers) {
                    customersArray = customers;
                    for (var i = 0; i < customers.length; i++){
                        $("#editWorkorderCustomerSelect").append($('<option>', {
                                value: customers[i].customer_id,
                                text: customers[i].customer_name
                        }));
                    }
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
                    for (var i = 0; i < employees.length; i++){
                        $("#editEmployeeSelect").append($('<option>', {
                            value: employees[i].employee_id,
                            text: employees[i].employee_name + " " + employees[i].employee_surname
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
		
		function initMap(){
			var editSearchBox = new google.maps.places.SearchBox(document.getElementById('editWorkorderLocationInput'));
	
			google.maps.event.addListener(editSearchBox, 'places_changed', function() {
                var places = editSearchBox.getPlaces();
                var i, place;
                for (i = 0; place = places[i]; i++) {
                    (function(place) {
                        var location = place.geometry.location;
                        $("#hiddenEditWorkorderLatitudeInput").val(location.lat());
                        $("#hiddenEditWorkorderLongitudeInput").val(location.lng());
                    }(place));
                }
            });
		}
		
		function showEditWorkorderPopup(){
			for (var i = 0; i < items.length; i++){
						if (i == 0){
							$("#editItemSelect").val(items[i].item_id).trigger("change");
							$("#editItemAmountInput").val(items[i].item_amount);
						}else{
							$("#editItemsDIV").append('<div class="form-group"><div class="col-md-9">' +
									'<select id="editItemSelect' + i + '" class="form-control" name="items[]" required>' +
										$("#editItemSelect").html() + 
									'</select>' +
									'</div>' +
									'<div class="col-md-2">' +
										'<input type="number" class="form-control" name="item_amount[]" min="0.1" step="0.1" value="' + items[i].item_amount + '" />' +
									'</div>' +
									'<div class="col-md-1 p-0">' +
											'<button type="button" class="btn btn-link text-danger" onClick="removeParentDIV(this)"><i class="fa fa-trash"></i></button>' +
									'</div>' +
								'</div>');
							$("#editItemSelect" + i).select2({width: "100%"});
							$("#editItemSelect" + i).val(items[i].item_id).trigger("change");
						}
			}
			$("#editWorkorderForm input[name=workorder_id]").val(workorder.workorder_id);
			$("#editWorkorderForm input[name=priority]").val([workorder.priority]);
			$("#editWorkorderForm input[name=status]").val([workorder.status]);
			$("#editWorkorderSubjectInput").val(workorder.workorder_subject);
			$("#editEmployeeSelect").val(workorder.assigned_to.split(",")).trigger("change");
			$("#editWorkorderStartDateInput").val(moment(workorder.workorder_startdate).format(dateformat));
			$("#editWorkorderEndDateInput").val(moment(workorder.workorder_enddate).format(dateformat));
			$("#editWorkorderCustomerSelect").val(workorder.customer_id).trigger("change");
			$("#editWorkorderSubsidiarySelect").val(workorder.subsidiary_id).trigger("change");
			$("#editWorkorderLocationInput").val(workorder.workorder_location);
			$("#editWorkOrderForm input[name=latitude]").val(workorder.latitude);
			$("#editWorkOrderForm input[name=longitude]").val(workorder.longitude);
			$("#editWorkorderNotesInput").html(workorder.workorder_notes);
			var fileContent = "";
            var files = workorder.workorder_files.split(";");
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
			$("#editWorkorderFiles").html(fileContent);
			$("#workorderPopup, #editWorkorderDIV").show();
		}
		
		function hideEditWorkorderPopup(){
			$("#editWorkorderForm")[0].reset();
			editWorkorderFiles = [];
			$("#editWorkorderFiles").html("");
			$("#workorderPopup, #editWorkorderDIV").hide();
		}
		
		function showWorkorderNotePopup(){
			$("#workorderNotePopupDIV, #workorderNoteDIV").show();
		}
		
		function hideWorkorderNotePopup(){
			$("#workorderNotePopupDIV, #workorderNoteDIV").hide();
		}
	</script>
	<script async defer src="https://maps.googleapis.com/maps/api/js?v=3&key=AIzaSyDC7Pj2_CZRL3p1eJy1HdL0EFtO70D7JvI&callback=initMap&language=en&libraries=places"></script>
</body>
</html>

