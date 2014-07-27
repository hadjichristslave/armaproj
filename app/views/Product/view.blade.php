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
								<i class="fa fa-gift"></i>Products
							</div>
						</div>
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
									<th width="4%">
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
											<button class="btn btn-sm yellow filter-submit margin-bottom" id="filter-search"><i class="fa fa-search"></i> Search</button>
										</div>
										<button class="btn btn-sm red filter-cancel" id="filter-reset"><i class="fa fa-times"></i> Reset</button>
									</td>
								</tr>
								</thead>
								<tbody class="filter-tbody">		
									<?php
										$class="odd";
									?>
									@foreach(Product::where('imageURI', '!=', '')->take(51)->get() as $key=>$value)
										<tr role="row" class="{{$class}}">
											<td class="sorting_1">{{$value->id}}</td>
											<td class="sorting_1"><img class="avatar productImage" alt="" src="/myproject/public/pictures/{{$value->sku}}"></td>
											<td><b>{{$value->sku}}</b></td>
											<td>{{$value->barcode}}</td>
											<td>{{$value->title}}</td>
											<td>{{$value->brand}}</td>
											<td>{{$value->unitPrice}} €</td>
											<td>{{$value->availableStock}}</td>
											<td>{{$value->lastImport}}</td>
											<td><a class="btn btn-xs default btn-editable" href="ecommerce_products_edit.html"><i class="fa fa-pencil"></i> Edit</a></td>	
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
@stop