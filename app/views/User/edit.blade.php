@extends('layouts.master')
@section('content')
<div class="tab-pane  active" id="tab_3">
								<div class="portlet box blue">
									<div class="portlet-title">
										<div class="caption">
											<i class="fa fa-reorder"></i>Τροποποίηση χρήστη
										</div>
										<div class="tools">
											<span>
											<select class="form-control" name="userId" id="userIdSelect">
												<option value="0" selected>--</option>
												@foreach(User::all() as $key=>$value)
												<option value="{{$value->id}}">{{$value->username}}</option>																	
												@endforeach
											</select>
												<?php
													if(Session::has('message'))
														echo Session::get('message');
													else
														echo 'no message';
												?>
											</span>
										</div>
									</div>
									<div class="portlet-body form">
										<!-- BEGIN FORM-->
										<form action="/azadmin/myproject/public/app/data/User/edit" class="form-horizontal userEditForm" method="post">
											{{Form::token()}}
											{{ Form::text("id", $value = "0", array('class'=>"ajax_id" , "hidden" =>true));}}
											<div class="form-body">
												<h3 class="form-section">Γενικές Πληροφορίες</h3>
												<div class="row">
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">Username</label>
															<div class="col-md-9">
																<input type="text" class="form-control ajax_username" name="username"  placeholder="Επώνυμο">
															</div>
														</div>
													</div>
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">Email</label>
															<div class="col-md-9">
																<input type="text" class="form-control ajax_email" name="email"  placeholder="Email">
															</div>
														</div>
													</div>
													<!--/span-->
												</div>
													
												<h3 class="form-section">Πληροφορίες επικοινωνίας</h3>
												<!--/row-->
												<div class="row">
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">Κωδικός</label>
															<div class="col-md-9">
																<input type="password" class="form-control ajax_password" name="password"  placeholder="Κωδικός">
															</div>
														</div>
													</div>													
												</div>
												</div>
												<div class="row">
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">Συσχέτιση υπαλλήλου</label>
															<div class="col-md-9">
																<select class="form-control ajax_userId" name="userId">
																	@foreach(Employee::all() as $key=>$value)
																	<option value="{{$value->id}}">{{$value->name}}</option>
																	@endforeach
																</select>
																<span class="help-block">
																	Συσχετίστε χρήστη με υπάλληλο!
																</span>
															</div>
														</div>
													</div>
												</div>
												<!--/row-->
											</div>
											<div class="form-actions fluid">
												<div class="row">
													<div class="col-md-6">
														<div class="col-md-offset-3 col-md-9">
															<button type="submit" class="btn green">Αποθήκευση αλλαγών</button>
															<a class="btn red" data-toggle="modal" href="#basic">Διαγραφή Χρήστη</a>
														</div>
													</div>
													<div class="col-md-6">
													</div>
												</div>
											</div>
										</form>
										<!-- END FORM-->
									</div>
								</div>
							</div>
							<div class="modal fade" id="basic" tabindex="-1" role="basic" aria-hidden="true" style="display: none;">
								<div class="modal-dialog">
									<div class="modal-content">
										<div class="modal-header">
											<button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
											<h4 class="modal-title">Διαγραφή χρήστη!</h4>
										</div>
										<div class="modal-body">
											 Θα χαθούν όλα τα στοιχεία περασμένα και συσχετισμένα με την εγγραφή αυτή. 
											 Είστε σίγουρος/η ότι θέλετε να προχωρήσετε με τη διαγραφή
										</div>
										<div class="modal-footer">
											<button type="button" class="btn default" data-dismiss="modal">Close</button>
											<button type="button " class="btn blue userDelete"><i class="fa fa-times"></i>Διαγραφή</button>
										</div>
									</div>
									<!-- /.modal-content -->
								</div>
								<!-- /.modal-dialog -->
							</div>
@stop