<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
<!--<![endif]-->
<head>
	<meta charset="utf-8" />
	<title>Invoices</title>
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
	<!-- ================== END PAGE LEVEL STYLE ================== -->
	
	<!-- ================== BEGIN BASE JS ================== -->
	<script src="<?= ASSETS_URL . "pace/pace.min.js" ?>" ></script>
	<!-- ================== END BASE JS ================== -->
</head>
<style>
    #invoicesTable, #premiseTable{
        width: 100% !important;
    }
    
   
    
    #movablePremiseDIV, #immovablePremiseDIV{
        width: 820px;
        height: auto;
        position: relative;
        margin: 10% auto 0px auto;
    }
    
    .panel-footer{
        overflow: auto;
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
								echo '<li class="active">
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
							<h4 class="m-t-10 m-b-5">Invoicing</h4>
						</div>
						<!-- END profile-header-info -->
					</div>
					<!-- END profile-header-content -->
					<!-- BEGIN profile-header-tab -->
					<ul class="profile-header-tab nav nav-tabs">
						<li class="nav-item active"><a href="#invoices-overview" class="nav-link" data-toggle="tab">OVERVIEW</a></li>
						<li class="nav-item"><a href="#invoices-view" class="nav-link" data-toggle="tab">INVOICES</a></li>
						<li class="nav-item"><a href="#premises-view" class="nav-link" data-toggle="tab">BUSINESS PREMISES</a></li>
					</ul>
					<!-- END profile-header-tab -->
				</div>
			</div>
			<!-- begin profile-content -->
            <div class="profile-content">
            	<!-- begin tab-content -->
            	<div class="tab-content p-0">
            		<!-- begin #profile-about tab -->
            		<div class="tab-pane fade in active" id="invoices-overview">
            			
            		</div>
            		<div class="tab-pane fade" id="invoices-view">
            		    <div class="col-md-12">
            			        <div class="panel panel-primary">
                                    <div class="panel-heading">
                                        <div class="panel-heading-btn">
                                            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
                                            <a href="reloadInvoices()" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-repeat"></i></a>
                                            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
                                            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
                                        </div>
                                        <h4 class="panel-title">Invoice list</h4>
                                    </div>
                                    <div class="panel-body">
                                        <div class="dataTables_wrapper form-inline dt-bootstrap no-footer">
                                            <table id="invoicesTable" class="table table-striped table-bordered">
                                                <thead>
                                                    <tr>
                                                        <th>Issued by</th>
                                                        <th>Invoice nr.</th>
                                                        <th>Date</th>
                                                        <th>EOR</th>
                                                        <th>Cost</th>
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
            		<div class="tab-pane fade" id="premises-view">
            		    <div class="col-md-12">
            		            <div class="btn-group m-b-25">
            		                <button class="btn btn-primary" onClick="showMovablePremisePopup()">New movable premise</button>
            		                <button class="btn btn-primary" onClick="showImmovablePremisePopup()">New immovable premise</button>
            		            </div>
            			        <div class="panel panel-primary">
                                    <div class="panel-heading">
                                        <div class="panel-heading-btn">
                                            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
                                            <a href="reloadInvoices()" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-repeat"></i></a>
                                            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
                                            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
                                        </div>
                                        <h4 class="panel-title">Business premises</h4>
                                    </div>
                                    <div class="panel-body">
                                        <div class="dataTables_wrapper form-inline dt-bootstrap no-footer">
                                            <table id="premiseTable" class="table table-striped table-bordered">
                                                <thead>
                                                    <tr>
                                                        <th>Premise name</th>
                                                        <th>Premise type</th>
                                                        <th>Created on</th>
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
		    </div>
		</div>
		<!-- end #content -->
		<div class="popupContainer" id="premisePopup" hidden>
    		<div class="panel panel-inverse" id="movablePremiseDIV" hidden>
                    <div class="panel-heading">
                        <div class="panel-heading-btn">
                            <button onclick="hideMovablePremisePopup()" class="btn btn-xs btn-icon btn-circle btn-default"><i class="fa fa-times"></i></button>
                        </div>
                        <h4 class="panel-title">Create business premise</h4>
                    </div>
                    <div class="panel-body">
                        <form id="newMovablePremiseForm" action="<?= BASE_URL . "invoices/addMovablePremise" ?>" method="post" class="form-horizontal">
                            <div class="form-group">
                                <div class="col-md-12">
                                    <label>Premise type:</label><br>
                                    <div class="radio radio-css radio-inline radio-primary">
                                        <input type="radio" name="premise_type" value="A" id="mbp1" checked>
                                        <label for="mbp1">
                                            Movable object
                                        </label>
                                    </div>
                                    <div class="radio radio-css radio-inline radio-primary">
                                        <input type="radio" name="premise_type" value="B" id="mbp2">
                                        <label for="mbp2">
                                            Object at permanent location
                                        </label>
                                    </div>
                                    <div class="radio radio-css radio-inline radio-primary">
                                        <input type="radio" name="premise_type" value="C" id="mbp3">
                                        <label for="mbp3">
                                            Individual electronic device
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-12">
                                    <label>Premise mark: <span class="text-danger"> *</span></label>
                                    <input type="text" class="form-control" name="premise_mark" placeholder="Enter business premise mark/name" pattern="^[a-zA-Z0-9]*$" required />
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-12">
                                    <label>Business tax number:<span class="text-danger"> *</span></label>
                                    <input type="text" class="form-control" name="premise_taxnumber" placeholder="Enter tax number" pattern="^[0-9]*$" required />
                                </div>
                            </div>
                    </div>
                    <div class="panel-footer">
                        <button class="btn btn-sm btn-primary pull-left">Create business premise</button>
                        <button type="button" class="btn btn-sm btn-white pull-right" onClick="hideMovablePremisePopup()">Cancel</button>
                        </form>
                    </div>
            </div>
            <div class="panel panel-inverse" id="immovablePremiseDIV" hidden>
                    <div class="panel-heading">
                        <div class="panel-heading-btn">
                            <button onclick="hideImmovablePremisePopup()" class="btn btn-xs btn-icon btn-circle btn-default"><i class="fa fa-times"></i></button>
                        </div>
                        <h4 class="panel-title">Create business premise</h4>
                    </div>
                    <div class="panel-body">
                        <form id="newImmovablePremiseForm" action="<?= BASE_URL . "invoices/addImmovablePremise" ?>" method="post" class="form-horizontal">
                            <div class="form-group">
                                <div class="col-md-12">
                                    <label>Premise mark:<span class="text-danger"> *</span></label>
                                    <input type="text" class="form-control" name="premise_mark" placeholder="Enter business premise mark/name" pattern="^[a-zA-Z0-9]*$" required />
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-12">
                                    <label>Business tax number:<span class="text-danger"> *</span></label>
                                    <input type="text" class="form-control" name="premise_taxnumber" placeholder="Enter tax number" pattern="^[0-9]*$" required />
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-4">
                                    <label>Cadastral number:<span class="text-danger"> *</span></label>
                                    <input type="text" class="form-control" name="premise_cadastralnr" placeholder="Enter cadastral number" pattern="[0-9]{4}" required /> 
                                </div>
                                <div class="col-md-4">
                                    <label>Building number:<span class="text-danger"> *</span></label>
                                    <input type="text" class="form-control" name="premise_buildingnr" placeholder="Enter building number" pattern="[0-9]{5}" required />
                                </div>
                                <div class="col-md-4">
                                    <label>Building section number:<span class="text-danger"> *</span></label>
                                    <input type="text" class="form-control" name="premise_buildingsectionnr" placeholder="Enter section number" pattern="[0-9]{4}" required />
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-6">
                                    <label>Street:<span class="text-danger"> *</span></label>
                                    <input type="text" class="form-control" name="premise_street" placeholder="Enter street" required />
                                </div>
                                <div class="col-md-3">
                                    <label>House number:<span class="text-danger"> *</span></label>
                                    <input type="text" class="form-control" name="premise_housenr" placeholder="Enter house number" required />
                                </div>
                                <div class="col-md-3">
                                    <label>House number addition:<span class="text-danger"> *</span></label>
                                    <input type="text" class="form-control" name="premise_housenraddition" placeholder="House number addition" required />
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-6">
                                    <label>City:<span class="text-danger"> *</span></label>
                                    <input type="text" class="form-control" name="premise_city" placeholder="Enter city" required />
                                </div>
                                <div class="col-md-3">
                                    <label>Post office:<span class="text-danger"> *</span></label>
                                    <input type="text" class="form-control" name="premise_post" placeholder="Enter post office" required />
                                </div>
                                <div class="col-md-3">
                                    <label>Postal code:<span class="text-danger"> *</span></label>
                                    <input type="text" class="form-control" name="premise_postalcode" placeholder="Enter postal code" pattern="[0-9]{4}" required />
                                </div>
                            </div>
                    </div>
                    <div class="panel-footer">
                        <button class="btn btn-sm btn-primary pull-left">Create business premise</button>
                        <button type="button" class="btn btn-sm btn-white pull-right" onClick="hideMovablePremisePopup()">Cancel</button>
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
	<link href="<?= ASSETS_URL . "DataTables/media/css/dataTables.bootstrap.min.css" ?>" rel="stylesheet" />
	<link href="<?= ASSETS_URL . "DataTables/extensions/Responsive/css/responsive.bootstrap.min.css" ?>" rel="stylesheet" />
	<script src="<?= ASSETS_URL . "DataTables/media/js/jquery.dataTables.js" ?>"></script>
	<script src="<?= ASSETS_URL . "DataTables/media/js/dataTables.bootstrap.min.js" ?>"></script>
	<script src="<?= ASSETS_URL . "DataTables/extensions/Responsive/js/dataTables.responsive.min.js" ?>"></script>
	<!-- ================== END PAGE LEVEL JS ================== -->
	
	<script>
	    var dTable;
	    var bTable;
	    var loggedEmployee = <?php echo json_encode($_SESSION["id"]); ?>;
		$(document).ready(function() {
			App.init();
			getMenuStatistics(loggedEmployee);
			getInvoices();
			getBusinessPremises();
			$('#newMovablePremiseForm').on('submit', function(e) { //use on if jQuery 1.7+
                e.preventDefault();
                $.ajax({
                    type: "POST",
                    url: "invoices/addMovablePremise",
                    data: $(this).serialize(),
                    success: function(msg) {
                        if (msg == "") {
                            swal(
                                'Success!',
                                'Premise was successfully added.',
                                'success'
                            );
                            getBusinessPremises();
                            hideMovablePremisePopup();
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
            
            $('#newImmovablePremiseForm').on('submit', function(e) { //use on if jQuery 1.7+
                e.preventDefault();
                $.ajax({
                    type: "POST",
                    url: "invoices/addImmovablePremise",
                    data: $(this).serialize(),
                    success: function(msg) {
                        if (msg == "") {
                            swal(
                                'Success!',
                                'Premise was successfully added.',
                                'success'
                            );
                            getBusinessPremises();
                            hideImmovablePremisePopup();
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
		
		function showMovablePremisePopup(){
		    $("#premisePopup, #movablePremiseDIV").show();
		}
		
		function hideMovablePremisePopup(){
		    $("#newMovablePremiseForm")[0].reset();
		    $("#premisePopup, #movablePremiseDIV").hide();
		}
		
		function showImmovablePremisePopup(){
		    $("#premisePopup, #immovablePremiseDIV").show();
		}
		
		function hideImmovablePremisePopup(){
		    $("#newImmovablePremiseForm")[0].reset();
		    $("#premisePopup, #immovablePremiseDIV").hide();
		}
		
		function getBusinessPremises(){
		    $.ajax({
                type: "POST",
                url: "<?= BASE_URL ?>" + "premises/get",
                data: null,
                dataType: "json",
                success: function(premises) {
                    if (bTable != null){
                        bTable.destroy();
                    }else{
                        bTable = $('#premiseTable').DataTable( {
                            "aaData": premises,
                            "columns": [
                                { "data": "premise_mark" },
                                { "data": "premise_type" },
                                { "data": "created_on" },
                                { "defaultContent": '<span onClick="showInvoiceDetails(this)" data-toggle="tooltip" title="View invoice" class="blueSpan pull-left"><i class="fa fa-folder-open"></i></span>'}
                            ],
                            "columnDefs": [
                                {
                                    "targets": 3,
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
		
		function getInvoices(){
		    $.ajax({
                type: "POST",
                url: "<?= BASE_URL ?>" + "invoices/get",
                data: null,
                dataType: "json",
                success: function(invoices) {
                    if (dTable != null){
                        dTable.destroy();
                    }else{
                        dTable = $('#invoicesTable').DataTable( {
                            "aaData": invoices,
                            "columns": [
                                { "data": "user_id" },
                                { "data": "invoice_number" },
                                { "data": "datetime" },
                                { "data": "eor" },
                                { "data": "cost" },
                                { "defaultContent": '<span onClick="showInvoiceDetails(this)" data-toggle="tooltip" title="View invoice" class="blueSpan pull-left"><i class="fa fa-folder-open"></i></span>'}
                            ],
                            "columnDefs": [
                                {
                                    // The `data` parameter refers to the data for the cell (defined by the
                                    // `data` option, which defaults to the column being worked with, in
                                    // this case `data: 0`.
                                    "render": function ( data, type, row ) {
                                        return row.employee_name + " " + row.employee_surname;
                                    },
                                    "targets": 0
                                },
                                {
                                    // The `data` parameter refers to the data for the cell (defined by the
                                    // `data` option, which defaults to the column being worked with, in
                                    // this case `data: 0`.
                                    "render": function ( data, type, row ) {
                                        return data + " €";
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
		
		function showInvoiceDetails(row){
		    var invoice = dTable.row($(row).parents('tr')).data();
		    location.href = "<?= BASE_URL ?>" + "invoicedetails?invoice_id=" + invoice.invoice_id;
		}
	</script>
</body>
</html>
