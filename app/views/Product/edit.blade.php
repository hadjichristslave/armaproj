@extends('layouts.master')
@section('content')
<div class="tab-pane  active" id="tab_3">
								<div class="portlet box blue">
									<div class="portlet-title">
										<div class="caption">
											<i class="fa fa-reorder"></i>Τροποποίηση προιόντος
										</div>
										<div class="tools">
											<span>
											<select class="form-control select2" name="productId" id="productIdSelect">
												<option value="0" selected>--</option>
												@foreach(Product::all() as $key=>$value)
												<option value="{{$value->id}}">{{$value->title}}</option>																	
												@endforeach
											</select>
												<?php
													if(Session::has('message'))
														echo Session::get('message');
												?>
											</span>
										</div>
									</div>
										<div class="portlet-body form">
										<!-- BEGIN FORM-->
										<form action="/azadmin/myproject/public/app/data/Product/edit" class="form-horizontal productEditForm" method="post">
											{{Form::token()}}
											{{ Form::text("id", $value = "0", array('class'=>"ajax_id" , "hidden" =>true));}}
											<div class="form-body">
												<h3 class="form-section">Γενικές Πληροφορίες</h3>
												<div class="row">
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">SKU</label>
															<div class="col-md-9">
																<input type="text" class="form-control ajax_sku" name="sku"  placeholder="SKU">
															</div>
														</div>
													</div>
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">Barcode</label>
															<div class="col-md-9">
																<input type="text" class="form-control ajax_barcode" name="barcode"  placeholder="Barcode">
															</div>
														</div>
													</div>
													<!--/span-->
												</div>
												<div class="row">
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">Τίτλος</label>
															<div class="col-md-9">
																<input type="text" class="form-control ajax_title" name="title"  placeholder="Τίτλος">
															</div>
														</div>
													</div>
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">Αποθήκη</label>
															<div class="col-md-9">
																<select class="form-control ajax_warehouseId" name="warehouseId">
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
												<div class="row">
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">Συνολικό Απόθεμα</label>
															<div class="col-md-9">
																<input type="number" class="form-control ajax_totalStock" name="totalStock"  placeholder="Απόθεμα">
															</div>
														</div>
													</div>
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">Διαθέσιμο Απόθεμα</label>
															<div class="col-md-9">
																<input type="number" class="form-control ajax_availableStock" name="availableStock"  placeholder="Διαθέσιμο Απόθεμα">
															</div>
														</div>
													</div>
													<!--/span-->
												</div>
												<div class="row">
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">Τιμή μονάδας</label>
															<div class="col-md-9">
																<input type="text" class="form-control ajax_unitPrice" name="unitPrice"  placeholder="Τιμή μονάδας">
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
															<button type="submit" class="btn green">Αποθήκευση Προιόντος</button>
															<a class="btn red" data-toggle="modal" href="#basic">Διαγραφή Προιόνοτος</a>
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
											<h4 class="modal-title">Διαγραφή προιόντος!</h4>
										</div>
										<div class="modal-body">
											 Θα χαθούν όλα τα στοιχεία περασμένα και συσχετισμένα με την εγγραφή αυτή. 
											 Είστε σίγουρος/η ότι θέλετε να προχωρήσετε με τη διαγραφή
										</div>
										<div class="modal-footer">
											<button type="button" class="btn default" data-dismiss="modal">Close</button>
											<button type="button " class="btn blue productDelete"><i class="fa fa-times"></i>Διαγραφή</button>
										</div>
									</div>
									<!-- /.modal-content -->
								</div>
								<!-- /.modal-dialog -->
							</div>
@stop