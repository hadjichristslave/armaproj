@extends('layouts.master')
@section('content')
<!--
	<?php var_dump(Auth::user()); ?>
	-->
<link href="http://armancon.com/azadmin/assets/css/pages/profile.css" rel="stylesheet" type="text/css"/>
			<div class="row">
				<div class="col-md-12">
					<!-- BEGIN PAGE TITLE & BREADCRUMB-->
					<h3 class="page-title">
					Προφίλ Υπαλλήλου <small>πωλητής</small>
					</h3>
					<ul class="page-breadcrumb breadcrumb">
						<li class="btn-group">
							<button type="button" class="btn {{Session::has('message')?'red':'blue'}} dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-delay="1000" data-close-others="true">
							<span>
								<?php
									if(Session::has('message'))
										echo Session::get('message');
									else
										echo 'Καμία ειδοποίηση';
								?>
							</span>
							</button>
						</li>
						<li>
							<i class="fa fa-home"></i>
							<a href="index.html">Αρχική</a>
							<i class="fa fa-angle-right"></i>
						</li>
						<li>
							<a href="#">Ανθρώπινο Δυναμικό</a>
							<i class="fa fa-angle-right"></i>
						</li>
						<li>
							<a href="#">Προφίλ Υπαλλήλου</a>
						</li>
					</ul>
					<!-- END PAGE TITLE & BREADCRUMB-->
				</div>
			</div>
			<!-- END PAGE HEADER-->
			<!-- BEGIN PAGE CONTENT-->
			<div class="row profile">
				<div class="col-md-12">
					<!--BEGIN TABS-->
					<div class="tabbable tabbable-custom tabbable-full-width">
						<ul class="nav nav-tabs">
							<li class="active">
								<a href="#tab_1_1" data-toggle="tab">Πληροφορίες</a>
							</li>
							<li>
								<a href="#tab_1_3" data-toggle="tab">Ρυθμίσεις</a>
							</li>
							<li>
								<a href="#tab_1_4" data-toggle="tab">Καταστήματα</a>
							</li>
							<!-- <li>
								<a href="#tab_1_6" data-toggle="tab">FAQ</a>
							</li> -->
						</ul>
						<div class="tab-content">
							<div class="tab-pane active" id="tab_1_1">
								<div class="row">
									<div class="col-md-3">
										<ul class="list-unstyled profile-nav">
											<li>
												<!-- <img src="/azadmin/assets/img/profile/profile-img.png" class="img-responsive" alt=""/> -->
												<?

													if (file_exists('useravatars/user'.Auth::user()->id))
														echo '<img src="/azadmin/myproject/public/useravatars/user'.Auth::user()->id.'" class="img-responsive" alt=""/> ';
													else
														 echo '<img src="/azadmin/assets/img/profile/profile-img.png" class="img-responsive" alt=""/> ';
												?>
											</li>
											<li>
												<a href="#">Μηνύματα
												<span>
													3
												</span>
												</a>
											</li>
											<li>
												<a href="#">Πωλήσεις</a>
											</li>
											<!-- <li>
												<a href="#">Friends</a>
											</li> -->
											<!-- <li>
												<a href="#">Settings</a>
											</li> -->
										</ul>
									</div>
									<div class="col-md-9">
										<div class="row">
											<div class="col-md-8 profile-info">
												<h1>{{Auth::user()->employee->name}} {{Auth::user()->employee->lname}}</h1>
												<!-- <p>
													Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt laoreet dolore magna aliquam tincidunt erat volutpat laoreet dolore magna aliquam tincidunt erat volutpat.
												</p> -->
												
												<ul class="list-inline">
													<li>
														<i class="fa fa-map-marker"></i> Αθήνα, Ελλάδα
													</li>
													<li>
														<i class="fa fa-calendar"></i> 18 Ιαν. 1982
													</li>
													<li>
														<i class="fa fa-mobile"></i> {{Auth::user()->employee->mobile}}
													</li>
													<li>
														<i class="fa fa-phone"></i> {{Auth::user()->employee->phone}}
													</li>
													<li>
														<i class="fa fa-envelope-o"></i> {{Auth::user()->email}}
													</li>
													
												</ul>
											</div>
											<!--end col-md-8-->
											<div class="col-md-4">
												<div class="portlet sale-summary">
													<div class="portlet-title">
														<div class="caption">
															Σύνοψη Παραγγελιών
														</div>
														<div class="tools">
															<a class="reload" href="javascript:;"></a>
														</div>
													</div>
													<div class="portlet-body">
														<ul class="list-unstyled">
															<li>
																<span class="sale-info">
																	Παραγγελιες Ημερας <i class="fa fa-img-up"></i>
																</span>
																<span class="sale-num">
																	{{Employeeorder::getOrdersWithinDays(1 , 'Employeeorder')}}
																</span>
															</li>
															<li>
																<span class="sale-info">
																	Παραγγελιες Εβδομαδας <i class="fa fa-img-down"></i>
																</span>
																<span class="sale-num">
																	{{Employeeorder::getOrdersWithinDays(7, 'Employeeorder')}}
																</span>
															</li>
															<li>
																<span class="sale-info">
																	Συνολικες Παραγγελιες
																</span>
																<span class="sale-num">
																	{{Employeeorder::getOrdersWithinDays(3000, 'Employeeorder')}}
																</span>
															</li>
															<li>
																<span class="sale-info">
																	Εσοδα
																</span>
																<span class="sale-num">
																	{{Employeeorder::getTotalOrderIncome()}}€
																</span>
															</li>
														</ul>
													</div>
												</div>
											</div>
											<!--end col-md-4-->
										</div>
										<!--end row-->
										<div class="tabbable tabbable-custom tabbable-custom-profile">
											<ul class="nav nav-tabs">
												<li class="active">
													<a href="#tab_1_11" data-toggle="tab">Τελευταίες Παραγγελίες</a>
												</li>
												<!--<li>
													<a href="#tab_1_22" data-toggle="tab">Τελευταία Μηνύματα</a>
												</li> -->
											</ul>
											<div class="tab-content">
												<div class="tab-pane active" id="tab_1_11">
													<div class="portlet-body">
														<table class="table table-striped table-bordered table-advance table-hover">
														<thead>
														<tr>
															<th>
																<i class="fa fa-briefcase"></i> Κατάστημα
															</th>
															<!-- <th class="hidden-xs">
																<i class="fa fa-question"></i> Περιγραφή
															</th> -->
															<th>
																<i class="glyphicon glyphicon-euro"></i> Ποσό
															</th>
															<th>
																<i class="glyphicon glyphicon-list-alt"></i> Κατάσταση
															</th>
															<th>
																<i class="fa fa-bookmark"></i> Δημιουργήθηκε
															</th>
															<th>
																<i class="glyphicon glyphicon-pencil"></i> Τροποποίηση
															</th>
														</tr>
														</thead>
														<tbody>
														@foreach(Employeeorder::where('employeeId' , '=' , Auth::user()->userId)->orderBy('created_at','desc')->limit(6)->get() as $ord)
														<tr>
															<td>
																<a href="#">{{Store::find($ord->storeId)->brand}}</a>
															</td>
															<!-- <td class="hidden-xs">
																Πρεπει να δρομολογηθεί το αργότερο μέχρι άυριο.
															</td> -->
															<td class="hidden-xs">
																{{$ord->totalPrice}}€
															</td>
															<td>
																
																<span class="label label-success label-sm label-{{Orderstate::getStateLabel(Orderstate::find($ord->stateId)->id)}}">
																	{{Orderstate::find($ord->stateId)->name}}
																</span>
															</td>
															<td>
																{{$ord->created_at}}
															</td>
															<td>
																<a class="btn default btn-xs green-stripe" href="http://armancon.com/azadmin/myproject/public/app/data/Order/display/{{$ord->id}}">Εμφάνιση</a>
															</td>
														</tr>
														@endforeach
														</tbody>
														</table>
													</div>
												</div>
												<!--tab-pane-->
												<div class="tab-pane" id="tab_1_22">
													<div class="tab-pane active" id="tab_1_1_1">
														<div class="scroller" data-height="290px" data-always-visible="1" data-rail-visible1="1">
															<ul class="feeds">
																<li>
																	<div class="col1">
																		<div class="cont">
																			<div class="cont-col1">
																				<div class="label label-success">
																					<i class="fa fa-bell-o"></i>
																				</div>
																			</div>
																			<div class="cont-col2">
																				<div class="desc">
																					 You have 4 pending tasks.
																					<span class="label label-danger label-sm">
																						 Take action <i class="fa fa-share"></i>
																					</span>
																				</div>
																			</div>
																		</div>
																	</div>
																	<div class="col2">
																		<div class="date">
																			 Just now
																		</div>
																	</div>
																</li>
																<li>
																	<a href="#">
																	<div class="col1">
																		<div class="cont">
																			<div class="cont-col1">
																				<div class="label label-success">
																					<i class="fa fa-bell-o"></i>
																				</div>
																			</div>
																			<div class="cont-col2">
																				<div class="desc">
																					 New version v1.4 just lunched!
																				</div>
																			</div>
																		</div>
																	</div>
																	<div class="col2">
																		<div class="date">
																			 20 mins
																		</div>
																	</div>
																	</a>
																</li>
															</ul>
														</div>
													</div>
												</div>
												<!--tab-pane-->
											</div>
										</div>
									</div>
								</div>
							</div>
							<!--tab_1_2-->
							<div class="tab-pane" id="tab_1_3">
								<div class="row profile-account">
									<div class="col-md-3">
										<ul class="ver-inline-menu tabbable margin-bottom-10">
											<li class="active">
												<a data-toggle="tab" href="#tab_1-1">
												<i class="fa fa-cog"></i> Προσωπικές Πληροφορίες </a>
												<span class="after">
												</span>
											</li>
											<li>
												<a data-toggle="tab" href="#tab_2-2"><i class="fa fa-picture-o"></i> Αλλαγή Εικόνας</a>
											</li>
											<li>
												<a data-toggle="tab" href="#tab_3-3"><i class="fa fa-lock"></i> Ευαίσθητα στοιχεία</a>
											</li>
											<!-- <li>
												<a data-toggle="tab" href="#tab_4-4"><i class="fa fa-eye"></i> Privacity Settings</a>
											</li> -->
										</ul>
									</div>
									<div class="col-md-9">
										<div class="tab-content">
											<div id="tab_1-1" class="tab-pane active">
												<form role="form" action="http://armancon.com/azadmin/myproject/public/app/update/Employee" method="post">
													{{Form::token()}}
													<div class="form-group">
														<label class="control-label">Όνομα</label>
														<input type="text" name="name" placeholder="πχ. Παναγιώτης" value="{{Auth::user()->employee->name}}" class="form-control"/>
													</div>
													<div class="form-group">
														<label class="control-label">Επώνυμο</label>
														<input type="text" name="lname" placeholder="πχ. Παπαδόπουλος" class="form-control" value="{{Auth::user()->employee->lname}}"/>
													</div>
													<div class="form-group">
														<label class="control-label">Κινητό Τηλέφωνο</label>
														<input type="text" name="mobile" placeholder="πχ. 698 888 8888" class="form-control" value="{{Auth::user()->employee->mobile}}"/>
													</div>
													<div class="form-group">
														<label class="control-label">Σταθερό τηλέφωνο</label>
														<input type="text" name="phone" placeholder="πχ. 210 771 11 69" class="form-control" value="{{Auth::user()->employee->phone}}"/>
													</div>
													<div class="margiv-top-10">
														<button type ="submit" class="btn green" value="Save changes">Save Changes</button>
														<a href="#" class="btn default">Cancel</a>
													</div>
												</form>
											</div>
											<div id="tab_2-2" class="tab-pane">
												<p>
													Επιτρεπτά αρχεία: .jpg,.png,gif <br>
													Μέγιστο επιτρεπτό μέγεθος 2ΜΒ.
												</p>
												<form action="/azadmin/myproject/public/app/picture" enctype="multipart/form-data" method="post" role="form">
													{{Form::token()}}
													<div class="form-group">
														<div class="thumbnail" style="width: 310px;">
															<img src="http://www.placehold.it/310x170/EFEFEF/AAAAAA&amp;text=no+image" alt="">
														</div>
														<div class="margin-top-10 fileupload fileupload-new" data-provides="fileupload">
															<div class="input-group input-group-fixed">
																<span class="input-group-btn">
																	<span class="uneditable-input">
																		<i class="fa fa-file fileupload-exists"></i>
																		<span class="fileupload-preview">
																		</span>
																	</span>
																</span>
																<span class="btn default btn-file">
																	<span class="fileupload-new">
																		<i class="fa fa-paper-clip"></i> Select file
																	</span>
																	<span class="fileupload-exists">
																		<i class="fa fa-undo"></i> Change
																	</span>
																	<input type="file" name="file" class="default"/>
																</span>
																<a href="#" class="btn red fileupload-exists" data-dismiss="fileupload"><i class="fa fa-trash-o"></i> Remove</a>
															</div>
														</div>
													</div>
													<div class="margin-top-10">
														<button type="submit" class="btn green">Submit</button>
														<input name="id" value="{{Auth::user()->id}}" hidden />
													</div>
												</form>
											</div>
											<div id="tab_3-3" class="tab-pane">
												<form action="http://armancon.com/azadmin/myproject/public/app/update/User" id="updateSensibleDataForm" method="post"> 
													{{Form::token()}}
													<div class="form-group">
														<label class="control-label">Τρέχων Κωδικός</label>
														<input type="password" name="password" class="form-control" placeholder="Για οποιαδήποτε αλλαγή στα πεδία πληκτρολογήστε και τον κωδικό σας"/>
													</div>
													<div class="form-group">
														<label class="control-label">Νέος Κωδικός</label>
														<input type="password" name="newpassword" id="newpassword" placeholder="Για μή αλλαγή του κωδικού αφήστε αυτό το πεδίο κενό" class="form-control"/>
														<span></span>
													</div>
													<div class="form-group">
														<label class="control-label">Επανάληψη Νέου Κωδικού</label>
														<input type="password" name="rnewpassword" placeholder="Για μή αλλαγή του κωδικού αφήστε αυτό το πεδίο κενό"  class="form-control"/>
														<span></span>
													</div>
													<div class="form-group">
														<label>Input with Icon</label>
														<div class="input-group input-icon right">
															<span class="input-group-addon">
															<i class="fa fa-envelope"></i>
															</span>
															<i class="fa fa-exclamation tooltips" data-original-title="Invalid email." data-container="body" aria-describedby="tooltip414054"></i>
															<input type="text" name="email" placeholder="πχ onoma@azade.com" class="input-error form-control mailUpdate" value="{{Auth::user()->email}}"/>
														</div>
													</div>
													<div class="margin-top-10">
														<input name="id" value="{{Auth::user()->id}}" hidden />
														<button type="submit" class="btn default">Αποθήκευση αλλαγών</button>
													</div>
												</form>
											</div>
										</div>
									</div>
									<!--end col-md-9-->
								</div>
							</div>
							<!--end tab-pane-->
							<div class="tab-pane" id="tab_1_4">
								<div class="row">
									<div class="col-md-12">
										<div class="add-portfolio">
											<span>
												Συνολικές παραγγελιές καταστημάτων υπαλλήλου: {{Employeeorder::getOrdersWithinDays(date("d"), 'Employeeorder')}}.
											</span>
											
										</div>
									</div>
								</div>
								<!--end add-portfolio-->
								@foreach(Store::where('employeeId', '=', Auth::user()->userId)->get() as $store)
								<div class="row portfolio-block">
									<div class="col-md-5">
										<div class="portfolio-text">
											<img src="http://armancon.com/azadmin/assets/img/profile/portfolio/logo_metronic.jpg" alt=""/>
											<div class="portfolio-text-info">
												<h4>{{$store->brand}}</h4>
												<p>
													{{$store->address}}
												</p>
											</div>
										</div>
									</div> 
									<div class="col-md-5 portfolio-stat">
										<div class="portfolio-info">
											 Πωλησεις Μηνα
											<span>
												{{Employeeorder::where('storeId' , '=' , $store->id)->count('id')}}
											</span>
										</div>
										
										<div class="portfolio-info">
											 εσοδα: 
											<span>
												{{Employeeorder::where('storeId' , '=' , $store->id)->where('stateId','=',2)->sum('totalPrice')}}
											</span>
										</div>
									</div>
									<div class="col-md-2">
										<div class="portfolio-btn">
											<a href="http://armancon.com/azadmin/myproject/public/app/data/Store/edit/{{$store->id}}" class="btn bigicn-only">
											<span>
												Κατάστημα
											</span>
											</a>
										</div>
									</div>
								</div>
								@endforeach
								<!--end row-->
							</div>
						</div>
					</div>
					<!--END TABS-->
				</div>
			</div>
			<!-- END PAGE CONTENT-->
@stop