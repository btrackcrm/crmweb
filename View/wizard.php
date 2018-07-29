<!DOCTYPE html>
<html>

<head>
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
	<link href="<?= ASSETS_URL . "parsley/src/parsley.css" ?>" rel="stylesheet" />
	<!-- ================== END BASE CSS STYLE ================== -->
	
	<!-- ================== BEGIN PAGE LEVEL STYLE ================== -->
	<link href="<?= ASSETS_URL . "jquery-jvectormap/jquery-jvectormap.css" ?>" rel="stylesheet" />
	<link href="<?= ASSETS_URL . "bootstrap-datepicker/css/bootstrap-datepicker.css" ?>" rel="stylesheet" />
    <link href="<?= ASSETS_URL . "gritter/css/jquery.gritter.css" ?>" rel="stylesheet" />
    <link href="<?= ASSETS_URL . "morris/morris.css" ?>" rel="stylesheet" />
    <link href="<?= ASSETS_URL . "telinput/build/css/intlTelInput.css" ?>" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.6.9/sweetalert2.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.6.9/sweetalert2.min.css">
    <title>Setup wizard</title>
	<!-- ================== END PAGE LEVEL STYLE ================== -->
	
</head>
<style>
    body{
        background-color: #f2f2f2;
        font-family: arial;
        color: #333333
    }
    
    .popupContainer{
        width: 100%;
    	height: 1400px;
    	z-index: 99 !important;
    	top: 0;
    	left: 0;
    	position: fixed;
    	background-color: rgb(0, 0, 0);
    	background-color: rgba(0, 0, 0, 0.4);
    	overflow: auto;
    }
    
    #syncMailchimpDIV{
        width: 700px;
        height: auto;
        position: relative;
        margin: 10% auto 0px auto;
    }
    
    .div-centered{
        margin: 0 auto;
        position: relative;
        top: 50%;
        transform: translateY(-50%);
    }
    
    .width-45{
        width: 45%;
    }
    
    .height-full{
        height: 100%;
    }
    
    .intl-tel-input {
        position: relative;
        display: block;
    }
</style>
<body>
    <div class="height-full">
        <div class="bg-white height-lg width-45 div-centered p-15">
            <form action="wizardcomplete" method="POST" data-parsley-validate="true" name="form-wizard">
                <div id="wizard">
                    <ol>
                        <li>
                            Identification
                            <small>Basic info about your company</small>
                        </li>
                        <li>
                            Sync
                            <small>Sync our app with various API's</small>
                        </li>
                        <li>
                            Completed
                            <small>Finish setup</small>
                        </li>
                    </ol>
                    <!-- begin wizard step-1 -->
                    <div class="wizard-step-1">
                        <fieldset>
                            <legend class="pull-left width-full">Identification</legend>
                            <!-- begin row -->
                            <div class="row">
                                <!-- begin col-4 -->
                                <div class="col-md-12">
                                    <div class="form-group block1">
                                        <label>Company name</label>
                                        <input type="text" name="company_name" placeholder="Company name" class="form-control" data-parsley-group="wizard-step-1" required />
                                    </div>
                                </div>
                                <!-- end col-4 -->
                                <!-- begin col-4 -->
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Company address</label>
                                        <input id="companyAddressInput" type="text" name="company_address" placeholder="Company address" class="form-control" data-parsley-group="wizard-step-1" required />
                                    </div>
                                </div>
                                <!-- end col-4 -->
                                <!-- begin col-4 -->
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>City</label>
                                        <input type="text" name="company_city" placeholder="City" class="form-control" data-parsley-group="wizard-step-1" required />
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Zipcode</label>
                                        <input type="text" name="company_zipcode" placeholder="Zipcode" class="form-control" data-parsley-group="wizard-step-1" required />
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Phone number</label>
                                        <input type="text" class="tel-input form-control" data-parsley-group="wizard-step-1" required />
                                    </div>
                                </div>
                                <!-- end col-4 -->
                            </div>
                            <!-- end row -->
                        </fieldset>
                    </div>
                    <!-- end wizard step-1 -->
                    <!-- begin wizard step-3 -->
                    <div class="wizard-step-2">
                        <fieldset>
                            <legend class="pull-left width-full">Sync</legend>
                            <!-- begin row -->
                            <div class="row">
                                <!-- begin col-4 -->
                                <div class="col-md-6">
                                    <h4>Sync with Google</h4>
                                    <button type="button" id="gAuthorizeBtn" class="btn material primary"><i class="fa fa-google"></i>&nbsp;Sync with Google</button>
                                    <button type="button" id="gSignOutBtn" class="btn material danger" style="display: none;"><i class="fa fa-google" aria-hidden="true"></i> Stop syncing with Google</button>
                                </div>
                                <div class="col-md-6">
                                    <h4>Sync with MailChimp</h4>
                                    <button type="button" id="syncMailchimpBtn" class="btn material primary" onClick="showSyncMailchimpDIV()"><i class="fa fa-envelope"></i>&nbsp;Sync with MailChimp</button>
                                    <button type="button" id="desyncMailchimpBtn" class="btn material danger hide" onClick="desyncMailchimp()">Stop MailChimp sync</button>
                                </div>
                                <!-- end col-6 -->
                            </div>
                            <!-- end row -->
                        </fieldset>
                    </div>
                    <!-- end wizard step-3 -->
                    <!-- begin wizard step-4 -->
                    <div>
                        <div class="jumbotron m-b-0 text-center">
                            <h1>Basic setup successful</h1>
                            <p>You may now start using our application :) </p>
                            <p><button class="btn material success">Proceed to dashboard</button></p>
                        </div>
                    </div>
                    <!-- end wizard step-4 -->
                </div>
            </form>
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
                        <button class="btn material primary"><i class="fa fa-refresh"></i>&nbsp;Sync with MailChimp</button>
                    </form>
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
	<script src="<?= ASSETS_URL . "jquery-cookie/jquery.cookie.js" ?>"></script>
	<script src="<?= ASSETS_URL . "parsley/dist/parsley.js" ?>"></script>
	<script src="<?= ASSETS_URL . "bootstrap-wizard/js/bwizard.js" ?>"></script>
	<script src="<?= ASSETS_URL . "telinput/build/js/intlTelInput.min.js" ?>"></script>
	<script src="<?= ASSETS_URL . "telinput/build/js/utils.js" ?>"></script>
	<script async defer src="https://apis.google.com/js/api.js" onload="this.onload=function(){};handleClientLoad()" onreadystatechange="if (this.readyState === 'complete') this.onload()"></script>
	<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyByTQPUumUXa7XiemK1liQCKT3839oj7DE&callback=initMap&language=en&libraries=places"></script>
	<!-- ================== END BASE JS ================== -->
    <script>
        // Client ID and API key from the Developer Console
        var CLIENT_ID = '199528804001-7dj1br8mm8le62dhfo2465666ikobfrt.apps.googleusercontent.com';
        var API_KEY = 'AIzaSyA30xyNam0_t-0MIrFtJ9M9ovgq9eB9AgE';
        
        // Array of API discovery doc URLs for APIs used by the quickstart
        var DISCOVERY_DOCS = ["https://www.googleapis.com/discovery/v1/apis/calendar/v3/rest", "https://www.googleapis.com/discovery/v1/apis/drive/v3/rest", "https://www.googleapis.com/discovery/v1/apis/gmail/v1/rest"];
        
        // Authorization scopes required by the API; multiple scopes can be
        // included, separated by spaces.
        var SCOPES = "https://www.googleapis.com/auth/calendar https://www.googleapis.com/auth/gmail.modify https://www.googleapis.com/auth/drive";
        
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
                var signedIn = gapi.auth2.getAuthInstance().isSignedIn.get();
                updateSigninStatus(signedIn);
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
        }
        
        function initMap(){
            var searchBox = new google.maps.places.SearchBox(document.getElementById('companyAddressInput'));
                    
            google.maps.event.addListener(searchBox, 'places_changed', function() {
                var places = searchBox.getPlaces();
                var i, place;
                for (i = 0; place = places[i]; i++) {
                    (function(place) {
                    }(place));
                }
            });
            
            
		}
        
        function showSyncMailchimpDIV(){
		    $("#mailchimpPopup, #syncMailchimpDIV").show();
		}
		
		function hideSyncMailchimpDIV(){
		    $("#mailchimpPopup, #syncMailchimpDIV").hide();
		}
        
        $(function(){
            handleBootstrapWizardsValidation();
            $(".tel-input").intlTelInput({ initialCountry: "si",
			hiddenInput: "company_contact"});
            $('#syncMailchimpForm').on('submit', function(e) { //use on if jQuery 1.7+
			    e.preventDefault();
                    $.ajax({
                        type: "POST",
                        url: "mailchimp/sync",
                        data: $("#syncMailchimpForm").serialize(),
                        success: function(msg) {
                            if (msg == "") {
                                swal(
                                    'Success',
                                    'MailChimp sync successful.',
                                    'success'
                                );
                                $("#syncMailchimpBtn").addClass("hide");
                                $("#desyncMailchimpBtn").removeClass("hide");
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
        });
        
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
                                $("#desyncMailchimpBtn").addClass("hide");
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
        
        
        function handleBootstrapWizardsValidation() {
            $("#wizard").bwizard({
                validating: function(e, t) {
                    if (t.index == 0) {
                        if (false === $('form[name="form-wizard"]').parsley().validate("wizard-step-1")) {
                            return false
                        }
                    } 
                }
            })
        };
    </script>
</body>

</html>
