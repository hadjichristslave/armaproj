<!DOCTYPE html>
<!-- 
Template Name: Metronic - Responsive Admin Dashboard Template build with Twitter Bootstrap 3.2.0
Version: 3.1.2
Author: KeenThemes
Website: http://www.keenthemes.com/
Contact: support@keenthemes.com
Follow: www.twitter.com/keenthemes
Like: www.facebook.com/keenthemes
Purchase: http://themeforest.net/item/metronic-responsive-admin-dashboard-template/4021469?ref=keenthemes
License: You must have a valid license purchased only from themeforest(the above link) in order to legally use the theme for your project.
-->
<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
<!--<![endif]-->
<!-- BEGIN HEAD -->
<head>
<meta charset="utf-8"/>
<title>Metronic | Extra - Lock Screen</title>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta content="width=device-width, initial-scale=1.0" name="viewport"/>
<meta content="" name="description"/>
<meta content="" name="author"/>
<!-- BEGIN GLOBAL MANDATORY STYLES -->
<link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css"/>
<link href="/azadmin/myproject/public/assets/global/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
<link href="/azadmin/myproject/public/assets/global/plugins/simple-line-icons/simple-line-icons.min.css" rel="stylesheet" type="text/css"/>
<link href="/azadmin/myproject/public/assets/global/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
<link href="/azadmin/myproject/public/assets/global/plugins/uniform/css/uniform.default.css" rel="stylesheet" type="text/css"/>
<link href="/azadmin/myproject/public/assets/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css" rel="stylesheet" type="text/css"/>
<!-- END GLOBAL MANDATORY STYLES -->
<!-- BEGIN PAGE LEVEL STYLES -->
<link href="/azadmin/myproject/public/assets/admin/pages/css/lock.css" rel="stylesheet" type="text/css"/>
<!-- END PAGE LEVEL STYLES -->
<!-- BEGIN THEME STYLES -->
<link href="/azadmin/myproject/public/assets/global/css/components.css" rel="stylesheet" type="text/css"/>
<link href="/azadmin/myproject/public/assets/global/css/plugins.css" rel="stylesheet" type="text/css"/>
<link href="/azadmin/myproject/public/assets/admin/layout/css/layout.css" rel="stylesheet" type="text/css"/>
<link id="style_color" href="/azadmin/myproject/public/assets/admin/layout/css/themes/default.css" rel="stylesheet" type="text/css"/>
<link href="/azadmin/myproject/public/assets/admin/layout/css/custom.css" rel="stylesheet" type="text/css"/>
<!-- END THEME STYLES -->
<link rel="shortcut icon" href="favicon.ico"/>
</head>
<!-- END HEAD -->
<!-- BEGIN BODY -->
<!-- DOC: Apply "page-header-fixed-mobile" and "page-footer-fixed-mobile" class to body element to force fixed header or footer in mobile devices -->
<!-- DOC: Apply "page-sidebar-closed" class to the body and "page-sidebar-menu-closed" class to the sidebar menu element to hide the sidebar by default -->
<!-- DOC: Apply "page-sidebar-hide" class to the body to make the sidebar completely hidden on toggle -->
<!-- DOC: Apply "page-sidebar-closed-hide-logo" class to the body element to make the logo hidden on sidebar toggle -->
<!-- DOC: Apply "page-sidebar-hide" class to body element to completely hide the sidebar on sidebar toggle -->
<!-- DOC: Apply "page-sidebar-fixed" class to have fixed sidebar -->
<!-- DOC: Apply "page-footer-fixed" class to the body element to have fixed footer -->
<!-- DOC: Apply "page-sidebar-reversed" class to put the sidebar on the right side -->
<!-- DOC: Apply "page-full-width" class to the body element to have full width page without the sidebar menu -->
<body>
<div class="page-lock">
	<div class="page-logo">
		<a class="brand" href="index.html">
		<img src="http://armancon.com/azadmin/myproject/public/logo.png" alt="logo"/>
		</a>
	</div>
	<div class="page-body">
		<img class="page-lock-img" src="/azadmin/myproject/public/assets/admin/pages/media/profile/profile.jpg" alt="">
		<div class="page-lock-info">
			<span>
				<?php
					if(Session::has('message'))
						echo Session::get('message');
				?>
			</span>
			<h1>{{Auth::user()->employee->name}} {{Auth::user()->employee->lname}}</h1>
			<span class="email">
			{{Auth::user()->email}} </span>
			<span class="locked">
			Locked </span>
			<form class="form-inline" action="/azadmin/myproject/public/app/reauthenticate" method="post">
				{{Form::token()}}
				<div class="input-group input-medium">
					<input type="password" class="form-control" name="password" placeholder="Password">
					<span class="input-group-btn">
					<button type="submit" class="btn blue icn-only"><i class="m-icon-swapright m-icon-white"></i></button>
					</span>
				</div>
				<!-- /input-group -->
				<div class="relogin">
					<a href="/azadmin/myproject/public/auth/logout">
					Όχι ο λογαριασμός του {{Auth::user()->employee->name}} {{Auth::user()->employee->lname}}? </a>
				</div>
			</form>
		</div>
	</div>
	<!-- <div class="page-footer-custom">
		 2014 &copy; Metronic. Admin Dashboard Template.
	</div> -->
</div>
<!-- BEGIN JAVASCRIPTS(Load javascripts at bottom, this will reduce page load time) -->
<!-- BEGIN CORE PLUGINS -->
<!--[if lt IE 9]>
<script src="/azadmin/myproject/public/assets/global/plugins/respond.min.js"></script>
<script src="/azadmin/myproject/public/assets/global/plugins/excanvas.min.js"></script> 
<![endif]-->
<script src="/azadmin/myproject/public/assets/global/plugins/jquery-1.11.0.min.js" type="text/javascript"></script>
<script src="/azadmin/myproject/public/assets/global/plugins/jquery-migrate-1.2.1.min.js" type="text/javascript"></script>
<!-- IMPORTANT! Load jquery-ui-1.10.3.custom.min.js before bootstrap.min.js to fix bootstrap tooltip conflict with jquery ui tooltip -->
<script src="/azadmin/myproject/public/assets/global/plugins/jquery-ui/jquery-ui-1.10.3.custom.min.js" type="text/javascript"></script>
<script src="/azadmin/myproject/public/assets/global/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
<script src="/azadmin/myproject/public/assets/global/plugins/bootstrap-hover-dropdown/bootstrap-hover-dropdown.min.js" type="text/javascript"></script>
<script src="/azadmin/myproject/public/assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
<script src="/azadmin/myproject/public/assets/global/plugins/jquery.blockui.min.js" type="text/javascript"></script>
<script src="/azadmin/myproject/public/assets/global/plugins/jquery.cokie.min.js" type="text/javascript"></script>
<script src="/azadmin/myproject/public/assets/global/plugins/uniform/jquery.uniform.min.js" type="text/javascript"></script>
<script src="/azadmin/myproject/public/assets/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js" type="text/javascript"></script>
<!-- END CORE PLUGINS -->
<!-- BEGIN PAGE LEVEL PLUGINS -->
<script src="/azadmin/myproject/public/assets/global/plugins/backstretch/jquery.backstretch.min.js" type="text/javascript"></script>
<!-- END PAGE LEVEL PLUGINS -->
<script src="/azadmin/myproject/public/assets/global/scripts/metronic.js" type="text/javascript"></script>
<script src="/azadmin/myproject/public/assets/admin/layout/scripts/layout.js" type="text/javascript"></script>
<script src="/azadmin/myproject/public/assets/admin/layout/scripts/quick-sidebar.js" type="text/javascript"></script>
<script src="/azadmin/myproject/public/assets/admin/pages/scripts/lock.js"></script>
<script src="/azadmin/myproject/public/scripts/customScripts.js" type="text/javascript"></script>

<script>
jQuery(document).ready(function() {    
   Metronic.init(); // init metronic core components
Layout.init(); // init current layout
QuickSidebar.init() // init quick sidebar
   Lock.init();
});
</script>
<!-- END JAVASCRIPTS -->
</body>
<!-- END BODY -->
</html>