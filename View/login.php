<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
<!--<![endif]-->
<head>
	<meta charset="utf-8" />
	<title>Login</title>
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
	
	<!-- ================== BEGIN BASE JS ================== -->
	<script src="<?= ASSETS_URL . "pace/pace.min.js" ?>" ></script>
	<!-- ================== END BASE JS ================== -->
</head>
<body class="pace-top bg-white">
	<!-- begin #page-loader -->
	<div id="page-loader" class="fade in"><span class="spinner"></span></div>
	<!-- end #page-loader -->
	
	<!-- begin #page-container -->
	<div id="page-container" class="fade">
	    <!-- begin login -->
        <div class="login login-with-news-feed">
            <!-- begin news-feed -->
            <div class="news-feed">
                <div class="news-image">
                    <img src="<?= IMG_URL . "login-bg/bg-3.jpg" ?>" data-id="login-cover-image" alt="" />
                </div>
                <div class="news-caption">
                    <h4 class="caption-title"> bTrack now on mobile!</h4>
                    <p>
                        Download the bTrack app for Android™ today!
                    </p>
                </div>
            </div>
            <!-- end news-feed -->
            <!-- begin right-content -->
            <div class="right-content">
                <!-- begin login-header -->
                <div class="login-header">
                    <img src="<?= IMG_URL . "logo_long.png" ?>" width="250" style="margin-left: -50px" class="m-b-5" alt="" />
                </div>
                <!-- end login-header -->
                <!-- begin login-content -->
                <div class="login-content" style="margin-top: -50px">
                    <?php echo "<p class='text-center'>" . $errorMessage . "</p>"; ?>
                    <form id="loginForm" action="<?= BASE_URL . "logmein" ?>" method="post" class="form-horizontal">
                        <div class="form-group m-b-20">
                            <input id="usernameInput" type="text" class="form-control input-lg" name="username" placeholder="E-mail" required />
                        </div>
                        <div class="form-group m-b-20">
                            <input id="passwordInput" type="password" name="password" class="form-control input-lg" placeholder="Password" required />
                        </div>
                        <div class="form-group m-b-20">
                            <div class="checkbox checkbox-css checkbox-danger">
                                <input id="rememberMe" type="checkbox" />
                                <label for="rememberMe">
                                    Remember me
                                </label>
                            </div>
                        </div>
                        
                        <div class="form-group login-buttons">
                            <button type="submit" class="btn material danger btn-block">Login</button>
                        </div>
                        <div class="form-group text-center m-t-10">
                            <a href="passwordreset" class="pull-left text-inverse">Forgot your password?</a>
                            <span class="pull-right text-inverse">Have a problem? <a href="http://www.netko.it" style="color: #2196f3">Contact us</a></span>
                        </div>
                    </form>
                </div>
                <!-- end login-content -->
            </div>
            <!-- end right-container -->
        </div>
        <!-- end login -->
        
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
	<!-- ================== END BASE JS ================== -->
	
	<!-- ================== BEGIN PAGE LEVEL JS ================== -->
	<script src="<?= JS_URL . "js.cookie.js" ?>"></script>
	<script src="<?= JS_URL . "login-v2.demo.min.js" ?>"></script>
	<script src="<?= JS_URL . "apps.min.js" ?>"></script>
	<!-- ================== END PAGE LEVEL JS ================== -->
	
	<link rel="stylesheet" type="text/css" href="//cdnjs.cloudflare.com/ajax/libs/cookieconsent2/3.0.3/cookieconsent.min.css" />
	<script src="//cdnjs.cloudflare.com/ajax/libs/cookieconsent2/3.0.3/cookieconsent.min.js"></script>

	<script>
		$(document).ready(function() {
			App.init();
			LoginV2.init();
			
			window.cookieconsent.initialise({
			  "palette": {
				"popup": {
				  "background": "#edeff5",
				  "text": "#838391"
				},
				"button": {
				  "background": "#4b81e8"
				}
			  },
			  "theme": "classic",
			  "position": "top"
			});
			
			var uname = Cookies.get("username");
			
			if (uname != ""){
    			$("#usernameInput").val(uname);
    			$("#passwordInput").val(Cookies.get("password"));
    			$("#rememberMe").prop("checked", true);
			}
			
			$('#loginForm').on('submit', function(e) { //use on if jQuery 1.7+
			    if ($("#rememberMe").is(":checked")){
                        var d = new Date();
                        d.setTime(d.getTime() + (365*24*60*60*1000));
                        var expires = "expires="+ d.toUTCString();
                        var uname = $("#usernameInput").val();
                        var password = $("#passwordInput").val();
						Cookies.set('username', uname, { expires: 365 });
						Cookies.set('password', password, { expires: 365 });
			    }else{
			        Cookies.set('username', "", { expires: 365 });
					Cookies.set('password', "", { expires: 365 });
			    }
            });
		});
		
	</script>
</body>
</html>
