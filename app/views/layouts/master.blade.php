<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en" class="no-js">
<!--<![endif]-->
<!-- BEGIN HEAD -->
<head>
<meta charset="utf-8"/>
<title>Azadmin stock control flow mainpage</title>
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
<link href="/azadmin/assets/plugins/fullcalendar/fullcalendar/fullcalendar.css" rel="stylesheet"/>
<!-- END PAGE LEVEL STYLES -->
<!-- BEGIN THEME STYLES -->
<link href="/azadmin/assets/css/style-metronic.css" rel="stylesheet" type="text/css"/>
<link href="/azadmin/assets/css/style.css" rel="stylesheet" type="text/css"/>
<link href="/azadmin/assets/css/style-responsive.css" rel="stylesheet" type="text/css"/>
<link href="/azadmin/assets/css/plugins.css" rel="stylesheet" type="text/css"/>
<link href="/azadmin/assets/css/themes/default.css" rel="stylesheet" type="text/css" id="style_color"/>
<link href="/azadmin/assets/css/custom.css" rel="stylesheet" type="text/css"/>
<link media="all" type="text/css" rel="stylesheet" href="/azadmin/myproject/public/packages/slave/calendar/css/fullcalendar.print.css">
<link media="all" type="text/css" rel="stylesheet" href="/azadmin/myproject/public/packages/slave/calendar/css/select2.css">
<link media="all" type="text/css" rel="stylesheet" href="/azadmin/myproject/public/packages/slave/calendar/css/jquery.ui.all.css">
<link media="all" type="text/css" rel="stylesheet" href="/azadmin/assets/css/customStyle.css">
<!-- END THEME STYLES -->
<!-- Login styles	-->
<link rel="stylesheet" type="text/css" href="/azadmin/assets/plugins/select2/select2_metro.css"/>
<!-- Login styles end	-->
<link rel="shortcut icon" href="favicon.ico"/>
</head>
<!-- END HEAD -->
<!-- BEGIN BODY -->
<body class="page-header-fixed">
<!-- BEGIN HEADER -->
<div class="header navbar navbar-inverse navbar-fixed-top">
	<!-- BEGIN TOP NAVIGATION BAR -->
	<div class="header-inner">
		<!-- BEGIN LOGO -->
		<a class="navbar-brand" href="index.html">
		<img src="/azadmin/myproject/public/logo.png" alt="logo" class="img-responsive"/>
		</a>
		<!-- END LOGO -->
		<!-- BEGIN RESPONSIVE MENU TOGGLER -->
		<a href="javascript:;" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
		<img src="/azadmin/assets/img/menu-toggler.png" alt=""/>
		</a>
		<!-- END RESPONSIVE MENU TOGGLER -->
		<!-- BEGIN TOP NAVIGATION MENU -->
		<ul class="nav navbar-nav pull-right">
			<!-- BEGIN NOTIFICATION DROPDOWN -->
			@if(Usergroup::find(Auth::user()->employee->groupId)->privilegeValue>=1)
			<li class="dropdown" id="header_notification_bar">
				<a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
				<i class="fa fa-warning"></i>
				<span class="badge">
					 {{Employeeorder::where('stateId' , '=' , 4)->where('employeeId', '=' ,Auth::user()->userId)->count()}}
				</span>
				</a>
				<ul class="dropdown-menu extended notification">
					<li>
						<p>
							 You have {{Employeeorder::where('stateId' , '=' , 4)->where('employeeId', '=' ,Auth::user()->userId)->count()}} new notifications
						</p>
					</li>
					<li>
						<ul class="dropdown-menu-list scroller" style="height: 250px;">
							@foreach(Employeeorder::select(DB::raw("*,(UNIX_TIMESTAMP(now())-UNIX_TIMESTAMP(created_at))/60 AS minutes"))->where('stateId', '=' , 4)->where('employeeId', '=' ,Auth::user()->userId)->orderBy('minutes','desc')->get() as $ord)
							<li>
								<a href="/azadmin/myproject/public/app/data/Order/display/{{$ord->id}}">
								<span class="label label-icon label-success">
									<i class="fa fa-plus"></i>
								</span>
								 Νέα παραγγελία κωδικός {{$ord->id}}!<br>
								<span class="time">
									{{Employeeorder::getDatediff($ord->id)}}
								</span>
								</a>
							</li>
							@endforeach
						</ul>
					</li>
					<li class="external">
						<a href="/azadmin/myproject/public/app/data/Order/orders">Δείτε όλες τις παραγγελίες <i class="m-icon-swapright"></i></a>
					</li>
				</ul>
			</li>
			@endif
			<!-- END NOTIFICATION DROPDOWN -->
			<!-- BEGIN INBOX DROPDOWN -->
			<!-- END INBOX DROPDOWN -->
			<!-- BEGIN TODO DROPDOWN -->

			<!-- END TODO DROPDOWN -->
			<!-- BEGIN USER LOGIN DROPDOWN -->
			<li class="dropdown user">
				<a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
				<img alt="" src="/azadmin/assets/img/avatar1_small.jpg"/>
				<span class="username">
					 {{Employee::find(Auth::user()->userId)->name}} {{Employee::find(Auth::user()->userId)->lname}}
				</span>
				<i class="fa fa-angle-down"></i>
				</a>
				<ul class="dropdown-menu">
					<li>
						<a href="/azadmin/myproject/public/app/user"><i class="fa fa-user"></i> My Profile</a>
					</li>
					<li>
						<a href="/azadmin/myproject/public/calendar/calendar"><i class="fa fa-calendar"></i> My Calendar</a>
					</li>
				
					<li class="divider">
					</li>
					<li>
						<a href="javascript:;" id="trigger_fullscreen"><i class="fa fa-move"></i> Full Screen</a>
					</li>
					<li>
						<a href="/azadmin/myproject/public/app/lock"><i class="fa fa-lock"></i> Lock Screen</a>
					</li>
					<li>
						<a href="/azadmin/myproject/public/auth/logout"><i class="fa fa-key"></i> Log Out</a>
					</li>
				</ul>
			</li>
			<!-- END USER LOGIN DROPDOWN -->
		</ul>
		<!-- END TOP NAVIGATION MENU -->
	</div>
	<!-- END TOP NAVIGATION BAR -->
</div>
<!-- END HEADER -->
<div class="clearfix">
</div>
<!-- BEGIN CONTAINER -->
<div class="page-container">
	<!-- BEGIN SIDEBAR -->
	<div class="page-sidebar-wrapper">
		<div class="page-sidebar navbar-collapse collapse">
			<!-- BEGIN SIDEBAR MENU -->
			<ul class="page-sidebar-menu">
				<li class="sidebar-toggler-wrapper">
					<!-- BEGIN SIDEBAR TOGGLER BUTTON -->
					<div class="sidebar-toggler hidden-phone">
					</div>
					<!-- BEGIN SIDEBAR TOGGLER BUTTON -->
				</li>
				<li class="sidebar-search-wrapper">
				</li>
				@if(Usergroup::find(Auth::user()->employee->groupId)->privilegeValue>=1)
				<li class="start {{Product::getIfActive('azadmin/myproject/public/app/user')}}">
					<a href="/azadmin/myproject/public/app/user">
					<i class="fa fa-home"></i>
					<span class="title">
						 Dashboard
					</span>
					</a>
				</li>
				@endif
				@if(Usergroup::find(Auth::user()->employee->groupId)->privilegeValue>=5)
				<li class="">
					<a href="javascript:;">
						<i class="fa fa-user"></i>
						<span class="title">
							Χρήστης
						</span>
						<span class="arrow">
						</span>
					</a>
					<ul class="sub-menu" style="display: none;">
						<li class="tooltips {{Product::getIfActive('azadmin/myproject/public/app/data/User/create')}}" data-container="body" data-placement="right" data-html="true" >
							<a href="/azadmin/myproject/public/app/data/User/create">
								<span class="title">
									Δημιουργία
								</span>
							</a>
						</li>
						<li class="tooltips {{Product::getIfActive('azadmin/myproject/public/app/data/User/edit')}}" data-container="body" data-placement="right" data-html="true" >
							<a href="/azadmin/myproject/public/app/data/User/edit">
								<span class="title">
									Τροποποίηση
								</span>
							</a>
						</li>
					</ul>
				</li>
				 <li class="">
					<a href="javascript:;">
						<i class="fa fa-briefcase"></i>
						<span class="title">
							Υπάληλος
						</span>
						<span class="arrow">
						</span>
					</a>
					<ul class="sub-menu" style="display: none;">
						<li class="tooltips {{Product::getIfActive('azadmin/myproject/public/app/data/Employee/create')}}" data-container="body" data-placement="right" data-html="true" >
							<a href="/azadmin/myproject/public/app/data/Employee/create">
								<span class="title">
									Δημιουργία
								</span>
							</a>
						</li>
						<li class="tooltips {{Product::getIfActive('azadmin/myproject/public/app/data/Employee/edit')}}" data-container="body" data-placement="right" data-html="true" >
							<a href="/azadmin/myproject/public/app/data/Employee/edit">
								<span class="title">
									Τροποποίηση
								</span>
							</a>
						</li>
					</ul>
				</li>
				@endif
				@if(Usergroup::find(Auth::user()->employee->groupId)->privilegeValue>=2)
				 <li class="">
					<a href="javascript:;">
						<i class="fa fa-shopping-cart"></i>
						<span class="title">
							Κατάστημα
						</span>
						<span class="arrow">
						</span>
					</a>
					<ul class="sub-menu" style="display: none;">
						<li class="tooltips {{Product::getIfActive('azadmin/myproject/public/app/data/Store/create')}}" data-container="body" data-placement="right" data-html="true" >
							<a href="/azadmin/myproject/public/app/data/Store/create">
								<span class="title">
									Δημιουργία
								</span>
							</a>
						</li>
						<li class="tooltips {{Product::getIfActive('azadmin/myproject/public/app/data/Store/edit')}}" data-container="body" data-placement="right" data-html="true" >
							<a href="/azadmin/myproject/public/app/data/Store/edit">
								<span class="title">
									Τροποποίηση
								</span>
							</a>
						</li>
					</ul>
				</li>
				@endif
				@if(Usergroup::find(Auth::user()->employee->groupId)->privilegeValue>=10)
				<li class="">
					<a href="javascript:;">
						<i class="fa fa-archive"></i>
						<span class="title">
							Αποθέματα
						</span>
						<span class="arrow">
						</span>
					</a>
					<ul class="sub-menu" style="display: none;">
						<li class="tooltips {{Product::getIfActive('azadmin/myproject/public/app/data/Store/edit')}}" data-container="body" data-placement="right" data-html="true" >
							<a href="/azadmin/myproject/public/app/data/Storeproduct/create">
								<span class="title">
									Δημιουργία
								</span>
							</a>
						</li>
						<li class="tooltips {{Product::getIfActive('azadmin/myproject/public/app/data/Store/edit')}}" data-container="body" data-placement="right" data-html="true" >
							<a href="/azadmin/myproject/public/app/data/Storeproduct/edit">
								<span class="title">
									Τροποποίηση
								</span>
							</a>
						</li>
					</ul>
				</li>
				@endif
				@if(Usergroup::find(Auth::user()->employee->groupId)->privilegeValue>=1)
				<li class="">
					<a href="javascript:;">
						<i class="fa fa-truck"></i>
						<span class="title">
							Παραγγελία
						</span>
						<span class="arrow">
						</span>
					</a>
						<ul class="sub-menu" style="display: none;">
						<li class="tooltips {{Product::getIfActive('azadmin/myproject/public/app/data/Product/view')}} " data-container="body" data-placement="right" data-html="true" >
								<a href="/azadmin/myproject/public/app/data/Product/view">
									<span class="title">
										Δημιουργία
									</span>
								</a>
							</li>
						<li class="tooltips {{Product::getIfActive('azadmin/myproject/public/app/data/Order/orders')}}" data-container="body" data-placement="right" data-html="true" >
							<a href="/azadmin/myproject/public/app/data/Order/orders">
								<span class="title">
									Παραγγελίες
								</span>
							</a>
						</li>
					</ul>
				</li>
				@endif
				@if(Usergroup::find(Auth::user()->employee->groupId)->privilegeValue>=2)
				<li class="">
					<a href="javascript:;">
						<i class="fa fa-barcode"></i>
						<span class="title">
							Προιόν
						</span>
						<span class="arrow">
						</span>
					</a>
					<ul class="sub-menu" style="display: none;">
						<li class="tooltips" data-container="body" data-placement="right" data-html="true" >
							<a href="/azadmin/myproject/public/app/data/Product/create">
								<span class="title">
									Δημιουργία
								</span>
							</a>
						</li>
						<li class="tooltips" data-container="body" data-placement="right" data-html="true" >
							<a href="/azadmin/myproject/public/app/data/Product/edit">
								<span class="title">
									Τροποποίηση
								</span>
							</a>
						</li>
						<li class="tooltips" data-container="body" data-placement="right" data-html="true" >
							<a href="/azadmin/myproject/public/app/data/Product/productbrand">
								<span class="title">
									Συσχετιση προιόντος-brand
								</span>
							</a>
						</li>
					</ul>
				</li>
				@endif
				<li class="last {{Product::getIfActive('azadmin/myproject/public/calendar/calendar')}} ">
					<a href="/azadmin/myproject/public/calendar/calendar">
					<i class="fa fa-calendar"></i>
					<span class="title">
						 Calendar
					</span>
					</a>
				</li>
			</ul>
			<!-- END SIDEBAR MENU -->
		</div>
	</div>
	<!-- END SIDEBAR -->
	<!-- BEGIN CONTENT -->
	<div class="page-content-wrapper">
		<div class="page-content">
			@yield('content')

		</div>
			<div class="page-footer-tools pull-right backToTop" id="nav_up" onclick="animateToTop()">
				<span class="go-top">
				<i class="fa fa-angle-up"></i>
				</span>
			</div>
	</div>



			<!-- BEGIN JAVASCRIPTS(Load javascripts at bottom, this will reduce page load time) -->
<!-- BEGIN CORE PLUGINS -->
<!--[if lt IE 9]>
<script src="assets/plugins/respond.min.js"></script>
<script src="assets/plugins/excanvas.min.js"></script> 
<![endif]-->
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script> 
<script src="/azadmin/assets/plugins/jquery-migrate-1.2.1.min.js" type="text/javascript"></script>
<!-- IMPORTANT! Load jquery-ui-1.10.3.custom.min.js before bootstrap.min.js to fix bootstrap tooltip conflict with jquery ui tooltip -->
<script src="/azadmin/assets/plugins/jquery-ui/jquery-ui-1.10.3.custom.min.js" type="text/javascript"></script>
<script src="/azadmin/assets/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
<script src="/azadmin/assets/plugins/bootstrap-hover-dropdown/twitter-bootstrap-hover-dropdown.min.js" type="text/javascript"></script>
<script src="/azadmin/assets/plugins/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
<script src="/azadmin/assets/plugins/jquery.blockui.min.js" type="text/javascript"></script>
<script src="/azadmin/assets/plugins/jquery.cokie.min.js" type="text/javascript"></script>
<script src="/azadmin/assets/plugins/uniform/jquery.uniform.min.js" type="text/javascript"></script>
<!-- END CORE PLUGINS -->
<!-- BEGIN PAGE LEVEL PLUGINS -->
<!-- IMPORTANT! fullcalendar depends on jquery-ui-1.10.3.custom.min.js for drag & drop support -->
<script src="/azadmin/myproject/public/packages/slave/calendar/js/fullcalendar.min.js"></script>
<script src="/azadmin/assets/plugins/select2/select2.js"></script>

<!-- END PAGE LEVEL PLUGINS -->
<!-- BEGIN PAGE LEVEL SCRIPTS -->
<script src="/azadmin/assets/scripts/app.js"></script>
<script src="/azadmin/assets/scripts/calendar.js"></script>
<script src="/azadmin/myproject/public/packages/slave/calendar/js/dataTableScripts.js"></script>
<script src="/azadmin/myproject/public/packages/slave/calendar/js/demo.calendar.js"></script> 
<script src="/azadmin/myproject/public/packages/slave/calendar/js/cmsScripts.js"></script>	
<!--user scripts-->
<script type="text/javascript" src="/azadmin/assets/plugins/bootstrap-fileupload/bootstrap-fileupload.js"></script>
<!--user scripts end-->
<!-- LOGIN SCRIPTS-->
<script src="/azadmin/assets/plugins/jquery-validation/dist/jquery.validate.min.js" type="text/javascript"></script>
<script src="/azadmin/assets/plugins/backstretch/jquery.backstretch.min.js" type="text/javascript"></script>
<script src="/azadmin/myproject/public/scripts/login-soft.js" type="text/javascript"></script>
<script src="/azadmin/myproject/public/scripts/customScripts.js" type="text/javascript"></script>
<script src="/azadmin/assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
<script src="/azadmin/myproject/public/components-pickers.js"></script>
<script src="/azadmin/myproject/public/components-dropdowns.js"></script>

<!-- END LOGIN SCRIPTS -->
 
<!-- order display scripts -->
<!-- <script src="/azadmin/assets/global/scripts/metronic.js" type="text/javascript"></script>
<script src="/azadmin/assets/admin/layout/scripts/layout.js" type="text/javascript"></script>
<script src="/azadmin/assets/admin/layout/scripts/quick-sidebar.js" type="text/javascript"></script>
<script src="/azadmin/assets/global/scripts/datatable.js"></script>
<script src="/azadmin/assets/admin/pages/scripts/ecommerce-orders-view.js"></script>
<script src="/azadmin/assets/admin/pages/scripts/components-form-tools.js"></script> -->
<!-- order display scripts -->




<!-- ORDER CREATE-->
<!-- ORDER CREATE END-->
<!-- END PAGE LEVEL SCRIPTS -->
<script>
    jQuery(document).ready(function() {       
       // initiate layout and plugins
       	App.init();
		Login.init();
		ComponentsPickers.init();
    });  
</script>	

<!-- END PAGE LEVEL SCRIPTS -->
</body>
<!-- END BODY -->
</html>