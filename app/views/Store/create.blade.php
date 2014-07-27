@extends('layouts.master')
@section('content')
<div class="row">
				<div class="col-md-12">
					<!-- BEGIN PAGE TITLE & BREADCRUMB-->
					<h4 class="page-title">
					Κατάστημα<small> βασικές πληροφορίες</small>
					</h4>
					<!-- END PAGE TITLE & BREADCRUMB-->
				</div>
			</div>
<div class="tab-pane active" id="tab_2">
								<div class="portlet box green">
									<div class="portlet-title">
										<div class="caption">
											<i class="fa fa-reorder"></i>Φορμα δημιουργίας
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
										<!-- /azadmin/myproject/public/app/custom/Order/create -->
										<form action="/myproject/public/app/custom/Store/create" class="form-horizontal" method="post">
											{{Form::token()}}
											<div class="form-body">
												<h3 class="form-section">Γενικές Πληροφορίες</h3>
												<div class="row">
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">Ονομασία</label>
															<div class="col-md-9">
																<input type="text" class="form-control" name="brand" placeholder="π.χ Azade">
																<span class="help-block">
																	Η ονομασία της εταιρίας
																</span>
															</div>
														</div>
													</div>
													<!--/span-->
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">Υπεύθυνος υπάλληλος</label>
															<div class="col-md-9">
																<select class="form-control" name="employeeId">
																	@foreach(Employee::all() as $key=>$value)
																	<option value="{{$value->id}}">{{$value->name}}</option>																	
																	@endforeach
																</select>
																<span class="help-block">
																	Διαλέξτε τον υπεύθυνο υπάλληλο
																</span>
															</div>
														</div>
													</div>
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">Κωδικός πελάτη</label>
															<div class="col-md-9">
																<input type="text" class="form-control" name="storeId" placeholder="π.χ HC">
																<span class="help-block">
																	Κωδικός πελάτη αποθέτη 
																</span>
															</div>
														</div>
													</div>
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">Κωδικός παραλήπτη</label>
															<div class="col-md-9">
																<input type="text" class="form-control" name="receiverId" placeholder="π.χ HC.0206">
																<span class="help-block">
																	Κωδικός Παραλήπτη-πελάτη
																</span>
															</div>
														</div>
													</div>
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">Σημείο παράδοσης</label>
															<div class="col-md-9">
																<input type="text" class="form-control" name="deliveryId" placeholder="π.χ HC.0206/5">
																<span class="help-block">
																	Κωδικός σημείου παράδοσης
																</span>
															</div>
														</div>
													</div>
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">Κωδικός σημείου παράδοσης-κωδικός παραλήπτη</label>
															<div class="col-md-9">
																<input type="text" class="form-control" name="deliveryReceiverId" placeholder="π.χ HC.0206/5">
																<span class="help-block">
																	Κωδικός σημείου παράδοσης-κωδικός παραλήπτη
																</span>
															</div>
														</div>
													</div>
													<div class="col-md-12">
														<div class="form-group">
															<div class="col-md-12">
																<h4>Brands</h4>
															       <div class="clearfix">
															        <div class="btn-group btn-group-justified" data-toggle="buttons">
															        	@foreach(Brand::all() as $key=>$value)
														        			<label class="btn default brandbutton">
														        				<input type="checkbox" class="toggle" name="brand___{{$value->id}}___{{$value->title}}">
														        				{{$value->title}}
														        			</label>						
																		@endforeach
															        </div>
														       </div>
														   </div>
														</div>
														<div class="form-group">
															<div class="col-md-12">
															        <div class="btn-group btn-group-justified" data-toggle="buttons">
															        	@foreach(Brand::all() as $key=>$value)
														        			<label class="btn default brandbutton">
														        				<span class="help-block">
																					 Από:
																				</span>
														        				<input class="form-control form-control-inline input-small date-picker" name="brandFrom__{{$value->id}}" size="12" type="text" value="" readonly>
																				
														        			</label>
																		@endforeach
															        </div>
														   </div>
														</div>
													</div>
												</div>
													
												<h3 class="form-section">Γεωγραφικές πληροφορίες</h3>
												<!--/row-->
												<div class="row">
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">Διεύθυνση</label>
															<div class="col-md-9">
																<input type="text" name="address" class="form-control">
															</div>
														</div>
													</div>
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">Περιοχή</label>
															<div class="col-md-9">
																<input type="text" name="area" class="form-control" placeholder="Περιοχή">
															</div>
														</div>
													</div>
												</div>
												<div class="row">
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">Post Code</label>
															<div class="col-md-9">
																<input type="text" name='postcode' class="form-control">
															</div>
														</div>
													</div>
													<!--/span-->
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">Πόλη</label>
															<div class="col-md-9">
																<input type="text" name="city" class="form-control" placeholder="Πόλη">
															</div>
														</div>
													</div>
													<!--/span-->
												</div>
												<!--/row-->
												<div class="row">
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">Νομός</label>
															<div class="col-md-9">
																<input type="text" name="county" class="form-control" placeholder="Νομός">
															</div>
														</div>
													</div>
													<!--/span-->
												</div>
												<!--/row-->
											</div>
											<div class="form-actions fluid">
												<div class="row">
													<div class="col-md-6">
														<div class="col-md-offset-3 col-md-9">
															<button type="submit" class="btn green">Υποβολή</button>
															<button type="button" class="btn default" id="fieldsReset">Εκαθάρηση πεδίων</button>
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
@stop