@extends('layouts.master')
@section('content')
	<!-- BEGIN CONTENT -->
			<!-- END SAMPLE PORTLET CONFIGURATION MODAL FORM-->
			<!-- BEGIN PAGE HEADER-->
			<div class="row">
				<div class="col-md-12">
					<!-- BEGIN PAGE TITLE & BREADCRUMB-->
					<h3 class="page-title">
					Products <small>product listing</small>
					</h3>
					<ul class="page-breadcrumb breadcrumb">
						<li>
							<i class="fa fa-home"></i>
							<a href="/myproject/public/app/user/">Home</a>
							<i class="fa fa-angle-right"></i>
						</li>
						<li>
							<a href="/myproject/public/app/data/Product/view">Products</a>
						</li>
						<li class="btn-group actionli">
							<button type="button" class="btn blue addAllProducts" data-toggle="modal" href="#responsive" data-hover="dropdown" data-delay="1000" data-close-others="true">
							<span>Προσθήκη όλων</span>
							</button>
							<button type="button" class="btn green">
							<span>Αποθήκευση παραγγελίας</span>
							</button>
						</li>


					</ul>
					<!-- END PAGE TITLE & BREADCRUMB-->
				</div>
			</div>
															<h3>Statistic Blocks</h3>
												<div class="row">
													<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
														<div class="dashboard-stat blue">
															<div class="visual">
																<i class="fa fa-comments"></i>
															</div>
															<div class="details">
																<div class="number">
																	 {{Product::count()}}
																</div>
																<div class="desc">
																	 Σύνολο προϊόντων
																</div>
															</div>
															<a class="more" href="#">
															. <i class="m-icon-swapright m-icon-white"></i>
															</a>
														</div>
													</div>
													<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
														<div class="dashboard-stat blue">
															<div class="visual">
																<i class="fa fa-shopping-cart"></i>
															</div>
															<div class="details">
																<div class="number">
																	 549
																</div>
																<div class="desc">
																	 Προϊόντα πραγγελίας
																</div>
															</div>
															<a class="more" href="#">
															. <i class="m-icon-swapright m-icon-white"></i>
															</a>
														</div>
													</div>
													<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
														<div class="dashboard-stat blue">
															<div class="visual">
																<i class="fa fa-globe"></i>
															</div>
															<div class="details">
																<div class="number">
																	 +89%
																</div>
																<div class="desc">
																	 Κόστος παραγγελίας
																</div>
															</div>
															<a class="more" href="#">
															. <i class="m-icon-swapright m-icon-white"></i>
															</a>
														</div>
													</div>
													<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
														<div class="dashboard-stat blue">
															<div class="visual">
																<i class="fa fa-bar-chart-o"></i>
															</div>
															<div class="details">
																<div class="number storeName">
																	 Εταιρία
																</div>
																<div class="desc">
																	 Κατάστημα
																</div>
															</div>
															 <a class="more" data-toggle="modal" href="#basic">Επιλογή εταιρίας
														     <i class="m-icon-swapright m-icon-white"></i>
															 </a>
														</div>
													</div>
												</div>
												<!-- End stat blocks -->
												<!-- Begin Tiles -->
			<!-- END PAGE HEADER-->
			<!-- BEGIN PAGE CONTENT-->

			<div class="row">
				<div class="col-md-12">
					<!-- Begin: life time stats -->
					<div class="portlet">
						<div class="portlet-body">
							<div class="table-container">
								<div class="table-actions-wrapper">
									<span>
									</span>
									<select class="table-group-action-input form-control input-inline input-small input-sm">
										<option value="">Select...</option>
										<option value="publish">Publish</option>
										<option value="unpublished">Un-publish</option>
										<option value="delete">Delete</option>
									</select>
									<button class="btn btn-sm yellow table-group-action-submit"><i class="fa fa-check"></i> Submit</button>
								</div>
								<table class="table table-striped table-bordered table-hover" id="datatable_products">
								<thead>	
								<tr role="row" class="heading">
									<th width="1%">
									</th>
									<th width="3%">
										 ID
									</th>
									<th width="3%">
										 Image
									</th>
									<th width="4%">
										 SKU
									</th>
									<th width="7%">
										 Barcode
									</th>
									<th width="35%">
										 Product&nbsp;Name
									</th>
									<th width="20%">
										 Category
									</th>
									<th width="5%">
										 Price
									</th>
									<th width="9%">
										 Stock
									</th>
									<th width="9%">
										 Εισήχθη
									</th>
									<th width="3%">
										 Actions
									</th>
								</tr>
								<tr role="row" class="filter filter-tr">
									<td></td>
									<td>
									</td>
									<td>
									</td>
									<td>
										<input type="text" class="form-control form-filter input-sm filter-sku" name="sku">
									</td>
									<td>
										<input type="text" class="form-control form-filter input-sm filter-category" name="barcode">
									</td>

									<td>
										<input type="text" class="form-control form-filter input-sm filter-name" name="title">
									</td>
									<td>
										<select name="product-category--" class="form-control form-filter input-sm">
											<option value="0">---</option>
											@foreach(Brand::all() as $p)
											<option value="{{$p->id}}">{{$p->title}}</option>
											@endforeach
										</select>
									</td>
									<td>
										<input type="text" class="form-control form-filter input-sm" name="unitPrice"/>
									</td>
									<td>
										<div class="margin-bottom-5">
											<input type="text" class="form-control form-filter input-sm" name="availableStock-From" placeholder="From"/>
										</div>
										<input type="text" class="form-control form-filter input-sm" name="availableStock-to" placeholder="To"/>
									</td>
									<td>
										<div class="input-group date date-picker margin-bottom-5" data-date-format="dd/mm/yyyy">
											<input type="text" class="form-control form-filter input-sm" readonly name="product-created-from" placeholder="From">
											<span class="input-group-btn">
											<button class="btn btn-sm default" type="button"><i class="fa fa-calendar"></i></button>
											</span>
										</div>
										<div class="input-group date date-picker" data-date-format="dd/mm/yyyy">
											<input type="text" class="form-control form-filter input-sm" readonly name="product-created-to " placeholder="To">
											<span class="input-group-btn">
											<button class="btn btn-sm default" type="button"><i class="fa fa-calendar"></i></button>
											</span>
										</div>
									</td>
									<td>
										<div class="margin-bottom-5">
											<button class="btn btn-sm yellow filter-submit margin-bottom" id="filter-search">
												<i class="fa fa-search"></i> Φιλτρο</button>
										</div>
										<button class="btn btn-sm red filter-cancel" id="filter-reset">
											<i class="fa fa-times"></i> Reset</button>
									</td>
								</tr>
								</thead>
								<tbody class="filter-tbody">		
									<?php
										$class="odd";
									?>
									@foreach(Product::where('imageURI', '!=', '')->take(51)->get() as $key=>$value)
										<tr role="row" class="{{$class}}" rowId="{{$value->id}}">
											<td><input type="checkbox" class="group-checkable" checkbox="{{$value->id}}"></td>
											<td class="sorting_1">{{$value->id}}</td>
											<td class="sorting_1"><img class="avatar productImage" alt="" src="/myproject/public/pictures/{{$value->sku}}"></td>
											<td><b>{{$value->sku}}</b></td>
											<td>{{$value->barcode}}</td>
											<td>{{$value->title}}</td>
											<td>{{$value->brand}}</td>
											<td>{{$value->unitPrice}} €</td>
											<td>{{$value->availableStock}}</td>
											<td>{{$value->lastImport}}</td>
											<td>
												<a class="btn btn-xs default btn-editable addSingleProduct" productId={{$value->id}}  data-toggle="modal" href="#responsive">
	
													<i class="fa fa-plus"></i> Add Product
												</a>
											</td>	
										</tr>						
									@endforeach

									<?php
										$class= $class=="odd"?"even":"odd";
									?>
								</tbody>
								</table>
							</div>
						</div>
					</div>
					<!-- End: life time stats -->
				</div>
			</div>
			<!-- END PAGE CONTENT-->
		</div>
	</div>
	<!-- END CONTENT -->
	<!-- BEGIN QUICK SIDEBAR -->
	<!-- END QUICK SIDEBAR -->
</div>
<div class="modal fade" id="basic" tabindex="-1" role="basic" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
				<h4 class="modal-title">Επιλογή καταστήματος</h4>
			</div>
			<div class="modal-body">
				 <div class="col-md-6">
					<select class="form-control storeSelect" name="storeId">
						<option value="-1" disabled>Επιλέξτε κατάστημα</option>
						@foreach(Employee::where('id', '=' , Auth::user()->userId)->first()->store as $key=>$value)
						<option value="{{$value->id}}">{{$value->brand}}</option>
						@endforeach
					</select>
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn default" data-dismiss="modal">Κλείσιμο</button>
				<button type="button" class="btn blue storeSubmit" data-dismiss="modal">Επιλογή καταστήματος</button>
			</div>
		</div>
		<!-- /.modal-content -->
	</div>
	<!-- /.modal-dialog -->
</div>

	<div id="responsive" class="modal fade" tabindex="-1" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
					<h4 class="modal-title">Τρέχουσα παραγγελία</h4>
				</div>
				<div class="modal-body">
					<div class="scroller" style="height:300px" data-always-visible="1" data-rail-visible1="1">
						<div class="row">
							<div class="col-md-12">
								<h4>Προϊόντα <p class="pull-right">Σύνολο: <input type="text" class="form-control cartTotal" val="" readonly /> </p></h4>
								<div class="portlet">
									<div class="portlet-body">
										<div class="table-container">											
										<table class="table table-striped table-bordered table-hover">
										<thead>	
								<tr role="row" class="heading">
									<th width="3%">
										 ID
									</th>
									<th width="35%">
										 Product&nbsp;Name
									</th>
									<th width="10%">
										 Price
									</th>
									<th>
										 Ποσότητα
									</th>
									<th width="1%">
										 Διαγραφή προϊόντος
									</th>
								</tr>
								</thead>
								<tbody class="selectedProducts">
										<tr role="row">
											<td></td>
											<td></td>
											<td></td>
											<td></td>
											<td></td>
										</tr>
								</tbody>
								</table>
							</div>
						</div>
					</div>
							</div>
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" data-dismiss="modal" class="btn default">Close</button>
					<button type="button" class="btn green">Save changes</button>
				</div>
			</div>
		</div>
	</div>
		


@stop