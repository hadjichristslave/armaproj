@extends('layouts.master')
@section('content')
<div class="row">
				<div class="col-md-12">
					<!-- BEGIN PAGE TITLE & BREADCRUMB-->
					<h4 class="page-title">
					Συσχέτιση<small>εταιρίας προιόντος</small>
					</h4>
					<!-- END PAGE TITLE & BREADCRUMB-->
				</div>
			</div>
<div class="tab-pane active" id="tab_2">
								<div class="portlet box green">
									<div class="portlet-title">
										<div class="caption">
											<i class="fa fa-reorder"></i>Συσχετίστε
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
										<form action="/azadmin/myproject/public/app/data/Storeproduct/create" class="form-horizontal" method="post">
											{{Form::token()}}
											<div class="form-body">
												<h3 class="form-section">Γενικές Πληροφορίες</h3>
												<div class="row">
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">Εταιρία προιόν</label>
															<div class="col-md-9">
																<select class="form-control select2" name="storeId">
																	@foreach(Store::all() as $key=>$value)
																	<option value="{{$value->id}}">{{$value->brand}}</option>																	
																	@endforeach
																</select>
																<span class="help-block">
																	Διαλέξτε εταιρία για συσχέτιση
																</span>
															</div>
														</div>
													</div>
													<!--/span-->
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">Προιόν</label>
															<div class="col-md-9">
																<select class="form-control select2" name="productId">
																	@foreach(Employee::all() as $key=>$value)
																	<option value="{{$value->id}}">{{$value->name}}</option>																	
																	@endforeach
																</select>
																<span class="help-block">
																	Διαλέξτε προιόν να συσχετίσετε με εταιρία
																</span>
															</div>
														</div>
													</div>
												</div>
												<div class="row">
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">Διαθέσιμο απόθεμα</label>
															<div class="col-md-9">
																<input type="number" min="0" max="10000" class="form-control" name="stock"  placeholder="Ποσότητα">
																<span class="help-block">
																	Διαλέξτε εταιρία για συσχέτιση
																</span>
															</div>
														</div>
													</div>
												</div>
													
												
											</div>
											<div class="form-actions fluid">
												<div class="row">
													<div class="col-md-6">
														<div class="col-md-offset-3 col-md-9">
															<button type="submit" class="btn green">Αποθήκευση</button>
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