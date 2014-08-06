@extends('layouts.master')
@section('content')
<div class="tab-pane  active" id="tab_3">
								<div class="portlet box blue">
									<div class="portlet-title">
										<div class="caption">
											<i class="fa fa-reorder"></i>Δημιουργία Προιόντος
										</div>
										<div class="tools">
											<span>
												<?php
													if(Session::has('message'))
														echo Session::get('message');
													else
														echo 'Κανένα μήνυμα πλατφόρμας';
												?>
											</span>
										</div>
									</div>
									<div class="portlet-body form">
										<!-- BEGIN FORM-->
										<form action="/azadmin/myproject/public/app/data/Product/create" class="form-horizontal" method="post">
											{{Form::token()}}
											<div class="form-body">
												<h3 class="form-section">Γενικές Πληροφορίες</h3>
												<div class="row">
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">Αποθήκη</label>
															<div class="col-md-9">
																<select class="form-control" name="warehouseId">
																	@foreach(Warehouse::all() as $key=>$value)
																	<option value="{{$value->id}}">{{$value->name}}</option>
																	@endforeach
																</select>
																<span class="help-block">
																	Συσχετίστε προιόν με αποθήκη!
																</span>
															</div>
														</div>
													</div>
													<!--/span-->
												</div>
											</div>
											<div class="form-actions fluid">
												<div class="row">
													<div class="col-md-6">
														<div class="col-md-offset-3 col-md-9">
															<button type="submit" class="btn green">Αποθήκευση Συσχετίσεων</button>
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