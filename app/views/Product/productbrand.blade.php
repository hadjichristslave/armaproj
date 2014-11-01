@extends('layouts.master')
@section('content')
<div class="tab-pane  active" id="tab_3">
								<div class="portlet box blue">
									<div class="portlet-title">
										<div class="caption">
											<i class="fa fa-reorder"></i>Συσχετίστε προιόν με brand!
										</div>
										<div class="tools">
											<span>
												<?php
													if(Session::has('message'))
														echo Session::get('message');
													else
														echo '';
												?>
											</span>
										</div>
									</div>
									<div class="portlet-body form">
										<!-- BEGIN FORM-->
											{{Form::token()}}
											<div class="form-body">
												<div class="row">
												@foreach(Product::select(array('brand','id'))->where('brand', '!=', '')->groupBy('brand')->get() as $prod)
													<div class="col-md-3 associationdiv">
														<div class="form-group">
															<label class="control-label col-md-6">
																<input type="text" readonly class="form-control input-large productGroup_{{$prod->id}}" value="{{$prod->brand}}" name="product_{{$prod->id}}" /> 
															</label>
															<div class="col-md-9">
																<select class="form-control input-large groupbrand" name="brand" target="{{$prod->id}}" 
																	tableId="{{Productbrand::where('productGroup','=',$prod->brand)->count()>0?Productbrand::where('productGroup','=',$prod->brand)->first()->id:0}}">
																	<option value="">--</option>
																	@foreach(Brand::all() as $key=>$value)
																	<option value="{{$value->id}}" {{Productbrand::where('brandId','=',$value->id)->where('productGroup' , '=' ,$prod->brand)->count()==1?"selected":""}}>{{$value->title}}</option>
																	@endforeach
																</select>
																<span class="help-block">
																</span>
															</div>
														</div>
													</div>
													<!--/span-->
												
												@endforeach
												</div>
											</div>
											<!-- <div class="form-actions fluid">
												<div class="row">
													<div class="col-md-6">
														<div class="col-md-offset-3 col-md-9">
															<button type="submit" class="btn green">Αποθήκευση Συσχετίσεων</button>
														</div>
													</div>
													<div class="col-md-6">
													</div>
												</div>
											</div> -->
										</form>
										<!-- END FORM-->
									</div>
								</div>
							</div>
@stop