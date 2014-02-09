</body>
</html>

<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en" class="no-js">
<!--<![endif]-->
<!-- BEGIN HEAD -->
<head>
<meta charset="utf-8"/>
<title>Metronic | Login Options - Login Form 2</title>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta content="width=device-width, initial-scale=1.0" name="viewport"/>
<meta content="" name="description"/>
<meta content="" name="author"/>
<meta name="MobileOptimized" content="320">
<!-- BEGIN GLOBAL MANDATORY STYLES -->
<link href="/azadmin/assets/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
<link href="/azadmin/assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
<link href="/azadmin/assets/plugins/uniform/css/uniform.default.css" rel="stylesheet" type="text/css"/>
<!-- END GLOBAL MANDATORY STYLES -->
<!-- BEGIN PAGE LEVEL STYLES -->
<link rel="stylesheet" type="text/css" href="/azadmin/assets/plugins/select2/select2_metro.css"/>
<!-- END PAGE LEVEL SCRIPTS -->
<!-- BEGIN THEME STYLES -->
<link href="/azadmin/assets/css/style-metronic.css" rel="stylesheet" type="text/css"/>
<link href="/azadmin/assets/css/style.css" rel="stylesheet" type="text/css"/>
<link href="/azadmin/assets/css/style-responsive.css" rel="stylesheet" type="text/css"/>
<link href="/azadmin/assets/css/plugins.css" rel="stylesheet" type="text/css"/>
<link href="/azadmin/assets/css/themes/default.css" rel="stylesheet" type="text/css" id="style_color"/>
<link href="/azadmin/assets/css/pages/login-soft.css" rel="stylesheet" type="text/css"/>
<link href="/azadmin/assets/css/custom.css" rel="stylesheet" type="text/css"/>
<!-- END THEME STYLES -->
<link rel="shortcut icon" href="favicon.ico"/>
</head>
<!-- END HEAD -->
<!-- BEGIN BODY -->
<body class="login">
<!-- BEGIN LOGO -->
<div class="logo">
	<img src="/azadmin/assets/img/logo-big.png" alt=""/>
</div>
<!-- END LOGO -->
<!-- BEGIN LOGIN -->
<div class="content">
	<!-- BEGIN LOGIN FORM -->
	{{ Form::open(array("url" => "/azadmin/myproject/public/auth/token/".$token."/".$email , "method"=>"post")) }}

{{ Form::label('password', 'Password')}}<br>
{{ Form::password('password', Input::old('password')) }}<br>
{{ Form::label('rpassword', 'rPassword')}}<br>
{{ Form::password('rpassword', Input::old('password')) }}<br>
{{ Form::text('token' , $token, array('hidden' =>true)) }}<br>
{{ Form::text('email' , $email, array('hidden' =>true)) }}<br>
{{ Form::submit('Register!') }}

{{ Form::token() . Form::close() }}
	<!-- END LOGIN FORM -->
	<!-- BEGIN FORGOT PASSWORD FORM -->
	<form class="forget-form" action="/auth/forgot" method="post">
		{{ Form::token()}}
		<h3>Forget Password ?</h3>
		<p>
			 Enter your e-mail address below to reset your password.
		</p>
		<div class="form-group">
			<div class="input-icon">
				<i class="fa fa-envelope"></i>
				<input class="form-control placeholder-no-fix" type="text" autocomplete="off" placeholder="Email" name="email"/>
			</div>
		</div>
		<div class="form-actions">
			<button type="button" id="back-btn" class="btn">
			<i class="m-icon-swapleft"></i> Back </button>
			<button type="submit" class="btn blue pull-right">
			Submit <i class="m-icon-swapright m-icon-white"></i>
			</button>
		</div>
	</form>
	<!-- END FORGOT PASSWORD FORM -->
</div>
<!-- END LOGIN -->
<!-- BEGIN COPYRIGHT -->
<div class="copyright">
	 2014 &copy; Slave - Saint Al. productions
</div>
<!-- END COPYRIGHT -->
<!-- BEGIN JAVASCRIPTS(Load javascripts at bottom, this will reduce page load time) -->
<!-- BEGIN CORE PLUGINS -->
<!--[if lt IE 9]>
	<script src="/azadmin/assets/plugins/respond.min.js"></script>
	<script src="/azadmin/assets/plugins/excanvas.min.js"></script> 
	<![endif]-->
<script src="/azadmin/assets/plugins/jquery-1.10.2.min.js" type="text/javascript"></script>
<script src="/azadmin/assets/plugins/jquery-migrate-1.2.1.min.js" type="text/javascript"></script>
<script src="/azadmin/assets/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
<script src="/azadmin/assets/plugins/bootstrap-hover-dropdown/twitter-bootstrap-hover-dropdown.min.js" type="text/javascript"></script>
<script src="/azadmin/assets/plugins/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
<script src="/azadmin/assets/plugins/jquery.blockui.min.js" type="text/javascript"></script>
<script src="/azadmin/assets/plugins/jquery.cokie.min.js" type="text/javascript"></script>
<script src="/azadmin/assets/plugins/uniform/jquery.uniform.min.js" type="text/javascript"></script>
<!-- END CORE PLUGINS -->
<!-- BEGIN PAGE LEVEL PLUGINS -->
<script src="/azadmin/assets/plugins/jquery-validation/dist/jquery.validate.min.js" type="text/javascript"></script>
<script src="/azadmin/assets/plugins/backstretch/jquery.backstretch.min.js" type="text/javascript"></script>
<script type="text/javascript" src="/azadmin/assets/plugins/select2/select2.min.js"></script>
<!-- END PAGE LEVEL PLUGINS -->
<!-- BEGIN PAGE LEVEL SCRIPTS -->
<script src="/azadmin/assets/scripts/app.js" type="text/javascript"></script>
<script src="/azadmin/assets/scripts/login-soft.js" type="text/javascript"></script>
<!-- END PAGE LEVEL SCRIPTS -->
<script>
		jQuery(document).ready(function() {     
		  App.init();
		  Login.init();
		});
	</script>
<!-- END JAVASCRIPTS -->
</body>
<!-- END BODY -->
</html>