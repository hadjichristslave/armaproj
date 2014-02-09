@extends('layouts.master')
@section('content')
<div class="row">
				<div class="col-md-12">
					<!-- BEGIN PAGE TITLE & BREADCRUMB-->
					<h4 class="page-title">
					Εταιρία<small> βασικές πληροφορίες</small>
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
											<a href="javascript:;" class="collapse"></a>
											<a href="#portlet-config" data-toggle="modal" class="config"></a>
											<a href="javascript:;" class="reload"></a>
											<a href="javascript:;" class="remove"></a>
										</div>
									</div>
									<div class="portlet-body form">
										<!-- BEGIN FORM-->
										<form action="/azadmin/myproject/public/app/data/Store/create" class="form-horizontal" method="post">
											{{Form::token();}}
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
																<select class="form-control">
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