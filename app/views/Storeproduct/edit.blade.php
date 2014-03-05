@extends('layouts.master')
@section('content')
<div class="tab-pane  active" id="tab_3">
								<div class="portlet box blue">
									<div class="portlet-title">
										<div class="caption">
											<i class="fa fa-reorder"></i>Τροποποίηση αποθέματος
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
										<form action="/azadmin/myproject/public/app/data/Store/edit" class="form-horizontal shopEditForm" method="post">
											{{ Form::text("id", $value = "0", array('class'=>"ajax_id" , "hidden" =>true));}}
											{{Form::token()}}
											<div class="form-body">
												<h3 class="form-section">Γενικές Πληροφορίες</h3>
												<div class="row">
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">Εταιρία προιόν</label>
															<div class="col-md-9">
																<select class="form-control select2 storeProductSelect2" name="storeId">
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
																<select class="form-control select2 productOfStoreSelect2" name="productId">
																	<option value="-1">-------------------</option>																	
																	@foreach(Product::all() as $key=>$value)
																	<option value="{{$value->id}}">{{$value->title}}</option>																	
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
															<button type="button" class="btn green shopEdit">Αποθήκευση αλλαγών</button>
															<a class="btn red" data-toggle="modal" href="#basic">Διαγραφή υπαλλήλου</a>
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