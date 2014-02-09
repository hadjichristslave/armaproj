@extends('layouts.master')
@section('content')
<div class="tab-pane  active" id="tab_3">
								<div class="portlet box blue">
									<div class="portlet-title">
										<div class="caption">
											<i class="fa fa-reorder"></i>Δημιουργία πωλητή/χρήστη
										</div>
										<div class="tools">
											<span>
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
										<form action="/azadmin/myproject/public/app/custom/Employee/create" class="form-horizontal" method="post">
											{{Form::token()}}
											<div class="form-body">
												<h3 class="form-section">Γενικές Πληροφορίες</h3>
												<div class="row">
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">Όνομα</label>
															<div class="col-md-9">
																<input type="text" class="form-control" name="name"  placeholder="Επώνυμο">
															</div>
														</div>
													</div>
													<!--/span-->
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">Επώνυμο</label>
															<div class="col-md-9">
																<input type="text" class="form-control" name="lname"  placeholder="Επώνυμο">
															</div>
														</div>
													</div>
												</div>
													
												<h3 class="form-section">Πληροφορίες επικοινωνίας</h3>
												<!--/row-->
												<div class="row">
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">Κινητό Τηλέφωνο</label>
															<div class="col-md-9">
																<input type="text" name="mobiel" class="form-control">
															</div>
														</div>
													</div>
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">Σταθερό Τηλέφωνο</label>
															<div class="col-md-9">
																<input type="text" name="phone" class="form-control" placeholder="Περιοχή">
															</div>
														</div>
													</div>
												</div>
												<div class="row">
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">Group υπαλλήλου</label>
															<div class="col-md-9">
																<select class="form-control" name="groupid">
																	@foreach(Usergroup::all() as $key=>$value)
																	<option value="{{$value->id}}">{{$value->name}}</option>
																	@endforeach
																</select>
																<span class="help-block">
																	Διαλέξτε το group του υπαλλήλου
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
															<button type="submit" class="btn green">Αποθήκευση υπαλλήλου</button>
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
											<h4 class="modal-title">Διαγραφή εταιρίας!</h4>
										</div>
										<div class="modal-body">
											 Θα χαθούν όλα τα στοιχεία περασμένα και συσχετισμένα με την εγγραφή αυτή. 
											 Είστε σίγουρος/η ότι θέλετε να προχωρήσετε με τη διαγραφή
										</div>
										<div class="modal-footer">
											<button type="button" class="btn default" data-dismiss="modal">Close</button>
											<button type="button " class="btn blue shopDelete"><i class="fa fa-times"></i>Διαγραφή</button>
										</div>
									</div>
									<!-- /.modal-content -->
								</div>
								<!-- /.modal-dialog -->
							</div>
@stop