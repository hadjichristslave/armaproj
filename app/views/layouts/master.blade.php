<!DOCTYPE html>
<!-- 
Template Name: Metronic - Responsive Admin Dashboard Template build with Twitter Bootstrap 3.0.3
Version: 1.5.5
Author: KeenThemes
Website: http://www.keenthemes.com/
Purchase: http://themeforest.net/item/metronic-responsive-admin-dashboard-template/4021469?ref=keenthemes
-->
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
<link media="all" type="text/css" rel="stylesheet" href="/myproject/public/css/customStyle.css">
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
		<img src="/azadmin/assets/img/logo.png" alt="logo" class="img-responsive"/>
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
			<li class="dropdown" id="header_notification_bar">
				<a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
				<i class="fa fa-warning"></i>
				<span class="badge">
					 6
				</span>
				</a>
				<ul class="dropdown-menu extended notification">
					<li>
						<p>
							 You have 17 new notifications
						</p>
					</li>
					<li>
						<ul class="dropdown-menu-list scroller" style="height: 250px;">
							<li>
								<a href="#">
								<span class="label label-icon label-success">
									<i class="fa fa-plus"></i>
								</span>
								 New user registered.
								<span class="time">
									 Just now
								</span>
								</a>
							</li>
							<li>
								<a href="#">
								<span class="label label-icon label-danger">
									<i class="fa fa-bolt"></i>
								</span>
								 Server #12 overloaded.
								<span class="time">
									 15 mins
								</span>
								</a>
							</li>
							<li>
								<a href="#">
								<span class="label label-icon label-warning">
									<i class="fa fa-bell-o"></i>
								</span>
								 Server #2 not responding.
								<span class="time">
									 22 mins
								</span>
								</a>
							</li>
							<li>
								<a href="#">
								<span class="label label-icon label-info">
									<i class="fa fa-bullhorn"></i>
								</span>
								 Application error.
								<span class="time">
									 40 mins
								</span>
								</a>
							</li>
							<li>
								<a href="#">
								<span class="label label-icon label-danger">
									<i class="fa fa-bolt"></i>
								</span>
								 Database overloaded 68%.
								<span class="time">
									 2 hrs
								</span>
								</a>
							</li>
							<li>
								<a href="#">
								<span class="label label-icon label-danger">
									<i class="fa fa-bolt"></i>
								</span>
								 2 user IP blocked.
								<span class="time">
									 5 hrs
								</span>
								</a>
							</li>
							<li>
								<a href="#">
								<span class="label label-icon label-warning">
									<i class="fa fa-bell-o"></i>
								</span>
								 Storage Server #4 not responding.
								<span class="time">
									 45 mins
								</span>
								</a>
							</li>
							<li>
								<a href="#">
								<span class="label label-icon label-info">
									<i class="fa fa-bullhorn"></i>
								</span>
								 System Error.
								<span class="time">
									 55 mins
								</span>
								</a>
							</li>
							<li>
								<a href="#">
								<span class="label label-icon label-danger">
									<i class="fa fa-bolt"></i>
								</span>
								 Database overloaded 68%.
								<span class="time">
									 2 hrs
								</span>
								</a>
							</li>
						</ul>
					</li>
					<li class="external">
						<a href="#">See all notifications <i class="m-icon-swapright"></i></a>
					</li>
				</ul>
			</li>
			<!-- END NOTIFICATION DROPDOWN -->
			<!-- BEGIN INBOX DROPDOWN -->
			<li class="dropdown" id="header_inbox_bar">
				<a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
				<i class="fa fa-envelope"></i>
				<span class="badge">
					 5
				</span>
				</a>
				<ul class="dropdown-menu extended inbox">
					<li>
						<p>
							 You have 12 new messages
						</p>
					</li>
					<li>
						<ul class="dropdown-menu-list scroller" style="height: 250px;">
							<li>
								<a href="inbox.html?a=view">
								<span class="photo">
									<img src="/azadmin/assets/img/avatar2.jpg" alt=""/>
								</span>
								<span class="subject">
									<span class="from">
										 Lisa Wong
									</span>
									<span class="time">
										 Just Now
									</span>
								</span>
								<span class="message">
									 Vivamus sed auctor nibh congue nibh. auctor nibh auctor nibh...
								</span>
								</a>
							</li>
							<li>
								<a href="inbox.html?a=view">
								<span class="photo">
									<img src="/azadmin/assets/img/avatar3.jpg" alt=""/>
								</span>
								<span class="subject">
									<span class="from">
										 Richard Doe
									</span>
									<span class="time">
										 16 mins
									</span>
								</span>
								<span class="message">
									 Vivamus sed congue nibh auctor nibh congue nibh. auctor nibh auctor nibh...
								</span>
								</a>
							</li>
							<li>
								<a href="inbox.html?a=view">
								<span class="photo">
									<img src="/azadmin/assets/img/avatar1.jpg" alt=""/>
								</span>
								<span class="subject">
									<span class="from">
										 Bob Nilson
									</span>
									<span class="time">
										 2 hrs
									</span>
								</span>
								<span class="message">
									 Vivamus sed nibh auctor nibh congue nibh. auctor nibh auctor nibh...
								</span>
								</a>
							</li>
							<li>
								<a href="inbox.html?a=view">
								<span class="photo">
									<img src="/azadmin/assets/img/avatar2.jpg" alt=""/>
								</span>
								<span class="subject">
									<span class="from">
										 Lisa Wong
									</span>
									<span class="time">
										 40 mins
									</span>
								</span>
								<span class="message">
									 Vivamus sed auctor 40% nibh congue nibh...
								</span>
								</a>
							</li>
							<li>
								<a href="inbox.html?a=view">
								<span class="photo">
									<img src="/azadmin/assets/img/avatar3.jpg" alt=""/>
								</span>
								<span class="subject">
									<span class="from">
										 Richard Doe
									</span>
									<span class="time">
										 46 mins
									</span>
								</span>
								<span class="message">
									 Vivamus sed congue nibh auctor nibh congue nibh. auctor nibh auctor nibh...
								</span>
								</a>
							</li>
						</ul>
					</li>
					<li class="external">
						<a href="inbox.html">See all messages <i class="m-icon-swapright"></i></a>
					</li>
				</ul>
			</li>
			<!-- END INBOX DROPDOWN -->
			<!-- BEGIN TODO DROPDOWN -->
			<li class="dropdown" id="header_task_bar">
				<a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
				<i class="fa fa-tasks"></i>
				<span class="badge">
					 5
				</span>
				</a>
				<ul class="dropdown-menu extended tasks">
					<li>
						<p>
							 You have 12 pending tasks
						</p>
					</li>
					<li>
						<ul class="dropdown-menu-list scroller" style="height: 250px;">
							<li>
								<a href="#">
								<span class="task">
									<span class="desc">
										 New release v1.2
									</span>
									<span class="percent">
										 30%
									</span>
								</span>
								<span class="progress">
									<span style="width: 40%;" class="progress-bar progress-bar-success" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100">
										<span class="sr-only">
											 40% Complete
										</span>
									</span>
								</span>
								</a>
							</li>
							<li>
								<a href="#">
								<span class="task">
									<span class="desc">
										 Application deployment
									</span>
									<span class="percent">
										 65%
									</span>
								</span>
								<span class="progress progress-striped">
									<span style="width: 65%;" class="progress-bar progress-bar-danger" aria-valuenow="65" aria-valuemin="0" aria-valuemax="100">
										<span class="sr-only">
											 65% Complete
										</span>
									</span>
								</span>
								</a>
							</li>
							<li>
								<a href="#">
								<span class="task">
									<span class="desc">
										 Mobile app release
									</span>
									<span class="percent">
										 98%
									</span>
								</span>
								<span class="progress">
									<span style="width: 98%;" class="progress-bar progress-bar-success" aria-valuenow="98" aria-valuemin="0" aria-valuemax="100">
										<span class="sr-only">
											 98% Complete
										</span>
									</span>
								</span>
								</a>
							</li>
							<li>
								<a href="#">
								<span class="task">
									<span class="desc">
										 Database migration
									</span>
									<span class="percent">
										 10%
									</span>
								</span>
								<span class="progress progress-striped">
									<span style="width: 10%;" class="progress-bar progress-bar-warning" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100">
										<span class="sr-only">
											 10% Complete
										</span>
									</span>
								</span>
								</a>
							</li>
							<li>
								<a href="#">
								<span class="task">
									<span class="desc">
										 Web server upgrade
									</span>
									<span class="percent">
										 58%
									</span>
								</span>
								<span class="progress progress-striped">
									<span style="width: 58%;" class="progress-bar progress-bar-info" aria-valuenow="58" aria-valuemin="0" aria-valuemax="100">
										<span class="sr-only">
											 58% Complete
										</span>
									</span>
								</span>
								</a>
							</li>
							<li>
								<a href="#">
								<span class="task">
									<span class="desc">
										 Mobile development
									</span>
									<span class="percent">
										 85%
									</span>
								</span>
								<span class="progress progress-striped">
									<span style="width: 85%;" class="progress-bar progress-bar-success" aria-valuenow="85" aria-valuemin="0" aria-valuemax="100">
										<span class="sr-only">
											 85% Complete
										</span>
									</span>
								</span>
								</a>
							</li>
							<li>
								<a href="#">
								<span class="task">
									<span class="desc">
										 New UI release
									</span>
									<span class="percent">
										 18%
									</span>
								</span>
								<span class="progress progress-striped">
									<span style="width: 18%;" class="progress-bar progress-bar-important" aria-valuenow="18" aria-valuemin="0" aria-valuemax="100">
										<span class="sr-only">
											 18% Complete
										</span>
									</span>
								</span>
								</a>
							</li>
						</ul>
					</li>
					<li class="external">
						<a href="#">See all tasks <i class="m-icon-swapright"></i></a>
					</li>
				</ul>
			</li>
			<!-- END TODO DROPDOWN -->
			<!-- BEGIN USER LOGIN DROPDOWN -->
			<li class="dropdown user">
				<a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
				<img alt="" src="/azadmin/assets/img/avatar1_small.jpg"/>
				<span class="username">
					 Bob Nilson
				</span>
				<i class="fa fa-angle-down"></i>
				</a>
				<ul class="dropdown-menu">
					<li>
						<a href="extra_profile.html"><i class="fa fa-user"></i> My Profile</a>
					</li>
					<li>
						<a href="page_calendar.html"><i class="fa fa-calendar"></i> My Calendar</a>
					</li>
					<li>
						<a href="inbox.html"><i class="fa fa-envelope"></i> My Inbox
						<span class="badge badge-danger">
							 3
						</span>
						</a>
					</li>
					<li>
						<a href="#"><i class="fa fa-tasks"></i> My Tasks
						<span class="badge badge-success">
							 7
						</span>
						</a>
					</li>
					<li class="divider">
					</li>
					<li>
						<a href="javascript:;" id="trigger_fullscreen"><i class="fa fa-move"></i> Full Screen</a>
					</li>
					<li>
						<a href="extra_lock.html"><i class="fa fa-lock"></i> Lock Screen</a>
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
					<!-- BEGIN RESPONSIVE QUICK SEARCH FORM -->
					<form class="sidebar-search" action="extra_search.html" method="POST">
						<div class="form-container">
							<div class="input-box">
								<a href="javascript:;" class="remove"></a>
								<input type="text" placeholder="Search..."/>
								<input type="button" class="submit" value=" "/>
							</div>
						</div>
					</form>
					<!-- END RESPONSIVE QUICK SEARCH FORM -->
				</li>
				<li class="start ">
					<a href="/azadmin/myproject/public/app/user">
					<i class="fa fa-home"></i>
					<span class="title">
						 Dashboard
					</span>
					</a>
				</li>
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
						<li class="tooltips" data-container="body" data-placement="right" data-html="true" data-original-title="Δημιουργία χρήστη πλατφόρμας">
							<a href="/azadmin/myproject/public/app/data/User/create">
								<span class="title">
									Δημιουργία
								</span>
							</a>
						</li>
						<li class="tooltips" data-container="body" data-placement="right" data-html="true" data-original-title="Τροποποίηση/Διαγραφή χρήστη πλατφόρμας">
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
						<li class="tooltips" data-container="body" data-placement="right" data-html="true" data-original-title="Δημιουργία χρήστη πλατφόρμας">
							<a href="/azadmin/myproject/public/app/data/Employee/create">
								<span class="title">
									Δημιουργία
								</span>
							</a>
						</li>
						<li class="tooltips" data-container="body" data-placement="right" data-html="true" data-original-title="Τροποποίηση/Διαγραφή χρήστη πλατφόρμας">
							<a href="/azadmin/myproject/public/app/data/Employee/edit">
								<span class="title">
									Τροποποίηση
								</span>
							</a>
						</li>
					</ul>
				</li>
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
						<li class="tooltips" data-container="body" data-placement="right" data-html="true" data-original-title="Δημιουργία χρήστη πλατφόρμας">
							<a href="/azadmin/myproject/public/app/data/Store/create">
								<span class="title">
									Δημιουργία
								</span>
							</a>
						</li>
						<li class="tooltips" data-container="body" data-placement="right" data-html="true" data-original-title="Τροποποίηση/Διαγραφή χρήστη πλατφόρμας">
							<a href="/azadmin/myproject/public/app/data/Store/edit">
								<span class="title">
									Τροποποίηση
								</span>
							</a>
						</li>
					</ul>
				</li>
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
						<li class="tooltips" data-container="body" data-placement="right" data-html="true" data-original-title="Δημιουργία προιόντων">
							<a href="/azadmin/myproject/public/app/data/Storeproduct/create">
								<span class="title">
									Δημιουργία
								</span>
							</a>
						</li>
						<li class="tooltips" data-container="body" data-placement="right" data-html="true" data-original-title="Τροποποίηση/Διαγραφή χρήστη προιόντων">
							<a href="/azadmin/myproject/public/app/data/Storeproduct/edit">
								<span class="title">
									Τροποποίηση
								</span>
							</a>
						</li>
					</ul>
				</li>
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
						<li class="tooltips" data-container="body" data-placement="right" data-html="true" data-original-title="Δημιουργία χρήστη πλατφόρμας">
							<a href="/azadmin/myproject/public/app/data/Order/create">
								<span class="title">
									Δημιουργία
								</span>
							</a>
						</li>
						<li class="tooltips" data-container="body" data-placement="right" data-html="true" data-original-title="Τροποποίηση/Διαγραφή χρήστη πλατφόρμας">
							<a href="/azadmin/myproject/public/app/data/Order/edit">
								<span class="title">
									Τροποποίηση
								</span>
							</a>
						</li>
					</ul>
				</li>
				<li class="">
					<a href="javascript:;">
						<i class="fa fa-bar-chart-o"></i>
						<span class="title">
							Καταστατικό
						</span>
						<span class="arrow">
						</span>
					</a>
					<ul class="sub-menu" style="display: none;">
						<li class="tooltips" data-container="body" data-placement="right" data-html="true" data-original-title="Δημιουργία χρήστη πλατφόρμας">
							<a href="/azadmin/myproject/public/app/data/View/orders">
								<span class="title">
									Συνολο παραγγελιών
								</span>
							</a>
						</li>
						<li class="tooltips" data-container="body" data-placement="right" data-html="true" data-original-title="Δημιουργία χρήστη πλατφόρμας">
							<a href="/azadmin/myproject/public/app/View/singleOrder">
								<span class="title">
									Μεμονομένη παραγγελία
								</span>
							</a>
						</li>
					</ul>
				</li>
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
						<li class="tooltips" data-container="body" data-placement="right" data-html="true" data-original-title="Δημιουργία προιόντος">
							<a href="/azadmin/myproject/public/app/data/Product/create">
								<span class="title">
									Δημιουργία
								</span>
							</a>
						</li>
						<li class="tooltips" data-container="body" data-placement="right" data-html="true" data-original-title="Τροποποίηση/Διαγραφή προιόντων">
							<a href="/azadmin/myproject/public/app/data/Product/edit">
								<span class="title">
									Τροποποίηση
								</span>
							</a>
						</li>
						<li class="tooltips" data-container="body" data-placement="right" data-html="true" data-original-title="Συνολο προιόντων">
							<a href="/azadmin/myproject/public/app/data/Product/view">
								<span class="title">
									Συνολο προιόντων
								</span>
							</a>
						</li>
					</ul>
				</li>
				<li class="last ">
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
			<!-- BEGIN SAMPLE PORTLET CONFIGURATION MODAL FORM-->
			<div class="modal fade" id="portlet-config" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
							<h4 class="modal-title">Modal title</h4>
						</div>
						<div class="modal-body">
							 Widget settings form goes here
						</div>
						<div class="modal-footer">
							<button type="button" class="btn blue">Save changes</button>
							<button type="button" class="btn default" data-dismiss="modal">Close</button>
						</div>
					</div>
					<!-- /.modal-content -->
				</div>
				<!-- /.modal-dialog -->
			</div>
			<!-- /.modal -->
						
			
			@yield('content')


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
<script src="/myproject/public/scripts/customScripts.js" type="text/javascript"></script>
<script src="/azadmin/assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
<script src="/azadmin/assets/scripts/custom/components-pickers.js"></script>
<!-- END LOGIN SCRIPTS -->


<!-- ORDER CREATE-->
<!-- ORDER CREATE END-->
<!-- END PAGE LEVEL SCRIPTS -->
<script>
    jQuery(document).ready(function() {       
       // initiate layout and plugins
       	App.init();
		Login.init();
		ComponentsPickers.init();
		ComponentsDropdowns.init();
    });  
</script>	

<!-- END PAGE LEVEL SCRIPTS -->
</body>
<!-- END BODY -->
</html>