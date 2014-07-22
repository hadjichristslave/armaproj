@extends('layouts.master')
@section('content')
<div class="tab-pane  active" id="tab_3">
								<div class="portlet box blue">
									<div class="portlet-title">
										<div class="caption">
											<i class="fa fa-reorder"></i>Τροποποίηση καταστήματος
										</div>
										<div class="tools">
											<span>
											<select class="form-control" name="companyId" id="companyIdSelect">
												<option value="0" selected>--</option>
												@foreach(Store::all() as $key=>$value)
												<option value="{{$value->id}}">{{$value->brand}}</option>																	
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
										<form action="/myproject/public/app/custom/Store/edit" class="form-horizontal shopEditForm" method="post">
											{{Form::token()}}
											{{ Form::text("id", $value = "0", array('class'=>"ajax_id" , "hidden" =>true));}}
											<div class="form-body">
												<h3 class="form-section">Γενικές Πληροφορίες</h3>
												<div class="row">
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">Ονομασία</label>
															<div class="col-md-9">
																<input type="text" class="form-control ajax_brand" name="brand"  placeholder="π.χ Azade">
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
																<select class="form-control ajax_employeeId" name="employeeId">
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
													<div class="col-md-12">
														<div class="form-group">
															<div class="col-md-12">
																<h4>Brands</h4>
															       <div class="clearfix">
															        <div class="btn-group btn-group-justified" data-toggle="buttons">
															        	@foreach(Brand::all() as $key=>$value)
														        			<label class="btn default ajax_brandButton ajax_brandButton_{{$value->id}}">
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
														        			<label class="btn default ajax_brandButtonDate ajax_brandButtonDate_{{$value->id}}">
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
																<input type="text" name="address" class="ajax_address form-control">
															</div>
														</div>
													</div>
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">Περιοχή</label>
															<div class="col-md-9">
																<input type="text" name="area" class="ajax_area form-control" placeholder="Περιοχή">
															</div>
														</div>
													</div>
												</div>
												<div class="row">
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">Post Code</label>
															<div class="col-md-9">
																<input type="text" name='postcode' class="ajax_postcode form-control">
															</div>
														</div>
													</div>
													<!--/span-->
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">Πόλη</label>
															<div class="col-md-9">
																<input type="text" name="city" class="ajax_city form-control" placeholder="Πόλη">
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
																<input type="text" name="county" class="ajax_county form-control" placeholder="Νομός">
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
															<button type="button" class="btn green shopEdit">Αποθήκευση αλλαγών</button>
															<a class="btn red" data-toggle="modal" href="#basic">Διαγραφή εταιρίας</a>
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
											 Θα χαθούν όλα τα στοιχεία περασμένα και συσχετισμένα με την εγγραφή αυτή.<br>
											 Είστε σίγουρος/η ότι θέλετε να προχωρήσετε με τη διαγραφή?
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