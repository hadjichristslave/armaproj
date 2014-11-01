@extends('layouts.master')
@section('content')
			<!-- END SAMPLE PORTLET CONFIGURATION MODAL FORM-->
			<!-- END STYLE CUSTOMIZER -->
			<!-- BEGIN PAGE HEADER-->
			<div class="row">
				<div class="col-md-12">
					<!-- BEGIN PAGE TITLE & BREADCRUMB-->
					<h3 class="page-title">
					Παραγγελία <small>λεπτομέρειες </small>
					</h3>
					<ul class="page-breadcrumb breadcrumb">
						<li class="btn-group">
							<button type="button" class="btn blue dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-delay="1000" data-close-others="true">
							<span>Ενέργειες</span><i class="fa fa-angle-down"></i>
							</button>
							<ul class="dropdown-menu pull-right" role="menu">
								<li>
									<a class="more" data-toggle="modal" href="#basic">Εξαγωγή παραγγελίας σε csv
								     <i class="m-icon-swapright m-icon-white"></i>
									 </a>
								</li>
							</ul>
						</li>
						<li>
							<i class="fa fa-home"></i>
							<a href="index.html">Αρχική</a>
							<i class="fa fa-angle-right"></i>
						</li>
						<li>
							<a href="#">Παραγγελίες</a>
							<i class="fa fa-angle-right"></i>
						</li>
						<li>
							<a href="#">Παραγγελία</a>
						</li>
					</ul>
					<!-- END PAGE TITLE & BREADCRUMB-->
				</div>
			</div>
			<!-- END PAGE HEADER-->
			<!-- BEGIN PAGE CONTENT-->
			<div class="row">
				<div class="col-md-12">
					<!-- Begin: life time stats -->
					<div class="portlet">
						<div class="portlet-title">
							<div class="caption">
								<i class="fa fa-shopping-cart"></i>Παραγγελία {{Employeeorder::find($id)->id}} <span class="hidden-480">
								| {{Employeeorder::find($id)->created_at}} </span>
							</div>
							<div class="actions">
								<a href="#" class="btn default yellow-stripe">
								<i class="fa fa-angle-left"></i>
								<span class="hidden-480">
								Back </span>
								</a>
								<div class="btn-group">
									<a class="btn default yellow-stripe" href="#" data-toggle="dropdown">
									<i class="fa fa-cog"></i>
									<span class="hidden-480">
									Tools </span>
									<i class="fa fa-angle-down"></i>
									</a>
									<ul class="dropdown-menu pull-right">
										<li>
											<a href="#">
											Export to Excel </a>
										</li>
										<li>
											<a href="#">
											Export to CSV </a>
										</li>
										<li>
											<a href="#">
											Export to XML </a>
										</li>
										<li class="divider">
										</li>
										<li>
											<a href="#">
											Print Invoice </a>
										</li>
									</ul>
								</div>
							</div>
						</div>
						<div class="portlet-body">
							<div class="tabbable">
								<ul class="nav nav-tabs nav-tabs-lg">
									<li class="active">
										<a href="#tab_1" data-toggle="tab">
										Details </a>
									</li>
									<!-- <li>
										<a href="#tab_2" data-toggle="tab">
										Invoices <span class="badge badge-success">
										4 </span>
										</a>
									</li>
									<li>
										<a href="#tab_3" data-toggle="tab">
										Credit Memos </a>
									</li>
									<li>
										<a href="#tab_4" data-toggle="tab">
										Shipments <span class="badge badge-danger">
										2 </span>
										</a>
									</li>
									<li>
										<a href="#tab_5" data-toggle="tab">
										History </a>
									</li> -->
								</ul>
								<div class="tab-content">
									<div class="tab-pane active" id="tab_1">
										<div class="row">
											<div class="col-md-6 col-sm-12">
												<div class="portlet yellow box">
													<div class="portlet-title">
														<div class="caption">
															<i class="fa fa-cogs"></i>Λεπτομέρειες
														</div>
														<!-- <div class="actions">
															<a href="#" class="btn btn-default btn-sm">
															<i class="fa fa-pencil"></i> Edit </a>
														</div> -->
													</div>
													<div class="portlet-body">
														<div class="row static-info">
															<div class="col-md-5 name">
																 Παραγγελία #:
															</div>
															<div class="col-md-7 value">
															 <span class="label label-info label-sm">
															 	{{Employeeorder::find($id)->id}}
															 </span>
															</div>
														</div>
														<div class="row static-info">
															<div class="col-md-5 name">
																 Ημερομηνία Δημιουργίας:
															</div>
															<div class="col-md-7 value">
																 {{Employeeorder::find($id)->created_at}}
															</div>
														</div>
														<div class="row static-info">
															<div class="col-md-5 name">
																 Κατάσταση:
															</div>
															<div class="col-md-7 value">
																<select class="form-control orderEditStateChange" orderId="{{$id}}" key="stateId" name="employeeId">
																	@foreach(Orderstate::all() as $ord)
																		<option value="{{$ord->id}}"  {{Orderstate::find(Employeeorder::find($id)->stateId)->id==$ord->id?'selected':''}}>{{$ord->name}}</option>																	
																	@endforeach																
																</select>
															</div>
														</div>
														<div class="row static-info">
															<div class="col-md-5 name">
																 Προϊόντα:
															</div>
															<div class="col-md-7 value productTotalNumber">
																 {{Order::totalNumberOfPproducts($id)}}
															</div>
														</div>														
													</div>
												</div>
											</div>
											<div class="col-md-6 col-sm-12">
												<div class="portlet blue box">
													<div class="portlet-title">
														<div class="caption">
															<i class="fa fa-cogs"></i>Κατάστημα
														</div>
														<!-- <div class="actions">
															<a href="#" class="btn btn-default btn-sm">
															<i class="fa fa-pencil"></i> Edit </a>
														</div> -->
													</div>
													<div class="portlet-body">
														<div class="row static-info">
															<div class="col-md-5 name">
																 Τίτλος:
															</div>
															<div class="col-md-7 value storeTitle" storeId="{{Employeeorder::find($id)->storeId}}">
																 {{Store::find(Employeeorder::find($id)->storeId)->brand}}
															</div>
														</div>
														<div class="row static-info">
															<div class="col-md-5 name">
																 Υπεύθυνος:
															</div>
															<div class="col-md-7 value">
																 {{Employee::find(Employeeorder::find($id)->employeeId)->name}}
															</div>
														</div>
														
														<div class="row static-info">
															<div class="col-md-5 name">
																 Διέυθυνση:
															</div>
															<div class="col-md-7 value">
																 {{Store::find(Employeeorder::find($id)->storeId)->address}}																 
															</div>
														</div>
														<div class="row static-info">
															<div class="col-md-5 name">
																 Τηλέφωνο:
															</div>
															<div class="col-md-7 value">
																 {{Employee::find(Employeeorder::find($id)->employeeId)->phone}}
															</div>
														</div>
														<!-- <div class="row static-info">
															<div class="col-md-5 name">
																 Email:
															</div>
															<div class="col-md-7 value">
																 {{Employee::find(Employeeorder::find($id)->employeeId)->email}}
															</div>
														</div> -->
														
													</div>
												</div>
											</div>
										</div>
										
										<div class="row">
											<div class="col-md-12 col-sm-12">
												<div class="portlet grey box">
													<div class="portlet-title">
														<div class="caption">
															<i class="fa fa-cogs"></i>Προϊόντα
														</div>
														<div class="actions">
															<a href="#" class="btn btn-default btn-sm productEditAdd">
															<i class="fa fa-plus"></i> Προσθήκη</a>
														</div>
													</div>
													<div class="portlet-body">
														<div class="table-responsive">
															<table class="table table-hover table-bordered table-striped">
															<thead>
															<tr>
																<th>
																	 Προϊόν
																</th>
																<th>
																	 Ποσότητα
																</th>
																<th>
																	 Τιμή
																</th>
																<th>
																	 Απόθεμα
																</th>
																<th>
																	 Έκπτωση
																</th>
																<th>
																	 Σύνολο
																</th>
																<th style="width:1%">
																	 Διαγραφή
																</th>
															</tr>
															</thead>
															<tbody class="productBody" orderId="{{$id}}" >
																@foreach(Order::where('orderId' , '=' , $id)->get() as $ord)
																	<tr class="productEditTr" itemId="{{$ord->productId}}" orderId="{{$id}}" productTr="{{$ord->id}}">
																<td>
																	<?php 
																			echo (Product::find($ord->productId)->availableStock<=0)?"<del>":"";
																	?>
																	<a href="#">{{Product::find($ord->productId)->title}}</a>
																	<?php 
																		echo (Product::find($ord->productId)->availableStock<=0)?"</del>":"";
																	?>
																</td>
																<td>
																	<div id="spinner4">
																		<div class="input-group" style="width:150px;">
																			<div class="spinner-buttons input-group-btn">
																				<button type="button" class="btn spinner-down" onclick=cartify("{{$ord->id}}","false") >
																				<i class="fa fa-minus"></i>
																				</button>
																			</div>
																			<input type="text" class="spinner-input form-control editInput" itemId="{{$ord->productId}}" productId-edit='on' key="quantity" productId="{{$ord->id}}" maxlength="3" value="{{$ord->quantity}}">
																			<div class="spinner-buttons input-group-btn">
																				<button type="button" class="btn spinner-up" onclick=cartify("{{$ord->id}}","true") >
																				<i class="fa fa-plus"></i>
																				</button>
																			</div>
																		</div>
																	</div>
																</td>
																<td>
																	 {{Product::find($ord->productId)->unitPrice}}€
																</td>
																<td>
																	<?php 
																		echo (Product::find($ord->productId)->availableStock==0)?"<del>":"";
																	?>
																	 {{Product::find($ord->productId)->availableStock}}
																	 <?php 
																		echo (Product::find($ord->productId)->availableStock==0)?"</del>":"";
																	?>
																</td>
																<td>
																	<?
																		$discount = Order::getDiscount($ord->productId,Employeeorder::find($id)->storeId);

																		if($discount=="1")
																			echo "0%";
																		else
																			echo $discount*100. "%";
																	?>
																</td>
																
																<td class="subtotal" subtotal="on">
																	{{Product::getSubtotal($ord->productId, $ord->quantity)}}€
																</td>
																<td >
																	<div class="input-group deleteEditProduct">
																		<button type="button" class="close" onclick="deleteProduct({{$ord->id}} , 'Order')"></button>
																	</div>
																</td>
															</tr>
																@endforeach
															
															</tbody>
															</table>
														</div>
													</div>
												</div>
											</div>
										</div>
										<div class="row">
											<div class="col-md-6">
											</div>
											<div class="col-md-6">
												<div class="well">
													<div class="row static-info align-reverse">
														<div class="col-md-8 name">
															 Σύνολο Τελικό:
														</div>
														<div class="col-md-3 value totalCostz">
															{{Employeeorder::find($id)->totalPrice}}€
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
									<div class="tab-pane" id="tab_2">
										<div class="table-container">
											<div class="table-actions-wrapper">
												<span>
												</span>
												<select class="table-group-action-input form-control input-inline input-small input-sm">
													<option value="">Select...</option>
													<option value="pending">Pending</option>
													<option value="paid">Paid</option>
													<option value="canceled">Canceled</option>
												</select>
												<button class="btn btn-sm yellow table-group-action-submit"><i class="fa fa-check"></i> Submit</button>
											</div>
											<table class="table table-striped table-bordered table-hover" id="datatable_invoices">
											<thead>
											<tr role="row" class="heading">
												<th width="5%">
													<input type="checkbox" class="group-checkable">
												</th>
												<th width="5%">
													 Invoice&nbsp;#
												</th>
												<th width="15%">
													 Bill To
												</th>
												<th width="15%">
													 Invoice&nbsp;Date
												</th>
												<th width="10%">
													 Amount
												</th>
												<th width="10%">
													 Status
												</th>
												<th width="10%">
													 Actions
												</th>
											</tr>
											<tr role="row" class="filter">
												<td>
												</td>
												<td>
													<input type="text" class="form-control form-filter input-sm" name="order_invoice_no">
												</td>
												<td>
													<input type="text" class="form-control form-filter input-sm" name="order_invoice_bill_to">
												</td>
												<td>
													<div class="input-group date date-picker margin-bottom-5" data-date-format="dd/mm/yyyy">
														<input type="text" class="form-control form-filter input-sm" readonly name="order_invoice_date_from" placeholder="From">
														<span class="input-group-btn">
														<button class="btn btn-sm default" type="button"><i class="fa fa-calendar"></i></button>
														</span>
													</div>
													<div class="input-group date date-picker" data-date-format="dd/mm/yyyy">
														<input type="text" class="form-control form-filter input-sm" readonly name="order_invoice_date_to" placeholder="To">
														<span class="input-group-btn">
														<button class="btn btn-sm default" type="button"><i class="fa fa-calendar"></i></button>
														</span>
													</div>
												</td>
												<td>
													<div class="margin-bottom-5">
														<input type="text" class="form-control form-filter input-sm" name="order_invoice_amount_from" placeholder="From"/>
													</div>
													<input type="text" class="form-control form-filter input-sm" name="order_invoice_amount_to" placeholder="To"/>
												</td>
												<td>
													<select name="order_invoice_status" class="form-control form-filter input-sm">
														<option value="">Select...</option>
														<option value="pending">Pending</option>
														<option value="paid">Paid</option>
														<option value="canceled">Canceled</option>
													</select>
												</td>
												<td>χ
													<div class="margin-bottom-5">
														<button class="btn btn-sm yellow filter-submit margin-bottom"><i class="fa fa-search"></i> Search</button>
													</div>
													<button class="btn btn-sm red filter-cancel"><i class="fa fa-times"></i> Reset</button>
												</td>
											</tr>
											</thead>
											<tbody>
											</tbody>
											</table>
										</div>
									</div>
									<div class="tab-pane" id="tab_3">
										<div class="table-container">
											<table class="table table-striped table-bordered table-hover" id="datatable_credit_memos">
											<thead>
											<tr role="row" class="heading">
												<th width="5%">
													 Credit&nbsp;Memo&nbsp;#
												</th>
												<th width="15%">
													 Bill To
												</th>
												<th width="15%">
													 Created&nbsp;Date
												</th>
												<th width="10%">
													 Status
												</th>
												<th width="10%">
													 Actions
												</th>
											</tr>
											</thead>
											<tbody>
											</tbody>
											</table>
										</div>
									</div>
									<div class="tab-pane" id="tab_4">
										<div class="table-container">
											<table class="table table-striped table-bordered table-hover" id="datatable_shipment">
											<thead>
											<tr role="row" class="heading">
												<th width="5%">
													 Shipment&nbsp;#
												</th>
												<th width="15%">
													 Ship&nbsp;To
												</th>
												<th width="15%">
													 Shipped&nbsp;Date
												</th>
												<th width="10%">
													 Quantity
												</th>
												<th width="10%">
													 Actions
												</th>
											</tr>
											<tr role="row" class="filter">
												<td>
													<input type="text" class="form-control form-filter input-sm" name="order_shipment_no">
												</td>
												<td>
													<input type="text" class="form-control form-filter input-sm" name="order_shipment_ship_to">
												</td>
												<td>
													<div class="input-group date date-picker margin-bottom-5" data-date-format="dd/mm/yyyy">
														<input type="text" class="form-control form-filter input-sm" readonly name="order_shipment_date_from" placeholder="From">
														<span class="input-group-btn">
														<button class="btn btn-sm default" type="button"><i class="fa fa-calendar"></i></button>
														</span>
													</div>
													<div class="input-group date date-picker" data-date-format="dd/mm/yyyy">
														<input type="text" class="form-control form-filter input-sm" readonly name="order_shipment_date_to" placeholder="To">
														<span class="input-group-btn">
														<button class="btn btn-sm default" type="button"><i class="fa fa-calendar"></i></button>
														</span>
													</div>
												</td>
												<td>
													<div class="margin-bottom-5">
														<input type="text" class="form-control form-filter input-sm" name="order_shipment_quantity_from" placeholder="From"/>
													</div>
													<input type="text" class="form-control form-filter input-sm" name="order_shipment_quantity_to" placeholder="To"/>
												</td>
												<td>
													<div class="margin-bottom-5">
														<button class="btn btn-sm yellow filter-submit margin-bottom"><i class="fa fa-search"></i> Search</button>
													</div>
													<button class="btn btn-sm red filter-cancel"><i class="fa fa-times"></i> Reset</button>
												</td>
											</tr>
											</thead>
											<tbody>
											</tbody>
											</table>
										</div>
									</div>
									<div class="tab-pane" id="tab_5">
										<div class="table-container">
											<table class="table table-striped table-bordered table-hover" id="datatable_history">
											<thead>
											<tr role="row" class="heading">
												<th width="25%">
													 Datetime
												</th>
												<th width="55%">
													 Description
												</th>
												<th width="10%">
													 Notification
												</th>
												<th width="10%">
													 Actions
												</th>
											</tr>
											<tr role="row" class="filter">
												<td>
													<div class="input-group date datetime-picker margin-bottom-5" data-date-format="dd/mm/yyyy hh:ii">
														<input type="text" class="form-control form-filter input-sm" readonly name="order_history_date_from" placeholder="From">
														<span class="input-group-btn">
														<button class="btn btn-sm default date-set" type="button"><i class="fa fa-calendar"></i></button>
														</span>
													</div>
													<div class="input-group date datetime-picker" data-date-format="dd/mm/yyyy hh:ii">
														<input type="text" class="form-control form-filter input-sm" readonly name="order_history_date_to" placeholder="To">
														<span class="input-group-btn">
														<button class="btn btn-sm default date-set" type="button"><i class="fa fa-calendar"></i></button>
														</span>
													</div>
												</td>
												<td>
													<input type="text" class="form-control form-filter input-sm" name="order_history_desc" placeholder="To"/>
												</td>
												<td>
													<select name="order_history_notification" class="form-control form-filter input-sm">
														<option value="">Select...</option>
														<option value="pending">Pending</option>
														<option value="notified">Notified</option>
														<option value="failed">Failed</option>
													</select>
												</td>
												<td>
													<div class="margin-bottom-5">
														<button class="btn btn-sm yellow filter-submit margin-bottom"><i class="fa fa-search"></i> Search</button>
													</div>
													<button class="btn btn-sm red filter-cancel"><i class="fa fa-times"></i> Reset</button>
												</td>
											</tr>
											</thead>
											<tbody>
											</tbody>
											</table>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<!-- End: life time stats -->
				</div>
			</div>
			<!-- END PAGE CONTENT-->


<div class="modal fade" id="basic" tabindex="-1" role="basic" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
				<h4 class="modal-title">Το προιόν θα εξαχθεί σε μορφή csv!</h4>
			</div>
			<div class="modal-body">
				 <div class="col-md-6">
					Είστε σίγουρος οτι θέλετε να προχωρήσετε με την εξαγωγή;
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn default" data-dismiss="modal">Κλείσιμο</button>
				<button type="button" class="btn blue csvExport" data-dismiss="modal">
					<i class="glyphicon glyphicon-download-alt"></i>Εξαγωγή σε csv και κατέβασμα!</button>
			</div>
		</div>
		<!-- /.modal-content -->
	</div>
	<!-- /.modal-dialog -->
</div>




@stop