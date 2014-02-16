@extends('layouts.master')
@section('content')
<div class="tab-pane  active" id="tab_3">
	<div class="portlet box blue">
		<div class="portlet-title">
			<div class="caption">
				<i class="fa fa-reorder"></i>Δημιουργία Παραγγελίας
				<div class="sumDiv">
					<label class="control-label col-md-6">Σύνολο:</label>
					<div class="input-group">
						<input type="text" class="form-control placeholder" ajax_sum="Σύνολο" value=15 readonly>
						<span class="input-group-addon">
							<i class="fa fa-euro"></i>
						</span>
					</div>
				</div>
			</div>
			<div class="tools">
				<span>
					<?php
						if(Session::has('message'))
							echo Session::get('message');
					?>
				</span>
			</div>
		</div>
		<div class="portlet-body form">
			<!-- BEGIN FORM-->
			<form action="/azadmin/myproject/public/app/data/Order/create" class="form-horizontal" method="post">
				{{Form::token()}}
				<div class="form-body">
					<h3 class="form-section" style="padding-bottom:15px;">Γενικές Πληροφορίες</h3>
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label class="control-label col-md-3">Κατάστημα</label>
								<div class="col-md-9">
										<select class="form-control ajax_storeId" name="storeId">
											@foreach(Store::all() as $key=>$value)
											<option value="{{$value->id}}">{{$value->brand}}</option>
											@endforeach
										</select>
										<span class="help-block">
											Διαλέξτε το κατάστημα για το οποίο θα καταχωρηθεί η παραγγελία
										</span>
									</div>
							</div>
						</div>
						<!--/span-->
					</div>
					<h3 class="form-section" style="padding-bottom:15px;">Προιόντα</h3>
					<div class="row">
						<span style="float:right;">
								<a href="#" class="btn green addOrderProduct">Προσθήκη  <i class="fa fa-plus"></i></a>
								<a href="#" class="btn red removeOrderProduct">Διαγραφή <i class="fa fa-minus"></i></a>
						</span>
					</div>
					<div class="row productRow">
						<div class="col-md-6">
							<div class="form-group">
								<label class="control-label col-md-3">Προιόν</label>
								<div class="col-md-9">
										<select class="form-control ajax_productId" name="productId">
											@foreach(Product::all() as $key=>$value)
											<option value="{{$value->id}}">{{$value->title}}</option>
											@endforeach
										</select>
										<span class="help-block">
											Διαλέξτε το προιόν βάσει του τίτλου του
										</span>
									</div>
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label class="control-label col-md-3">Ποσότητα</label>
								<div class="col-md-9">
									<input type="number" class="form-control ajax_quantity" name="quantity"  placeholder="Ποσότητα">
								</div>
							</div>
						</div>
						<div class="col-md-12">
							<div class="form-group">
								<label class="control-label col-md-3">Σχόλια</label>
								<div class="col-md-9">
									<input class="form-control ajax_comments" name="comments"  placeholder="Σχόλια" / >
								</div>
							</div>
						</div>
						<!--/span-->
						<hr>
				     </div>
				 </div>
				     <div class="form-actions fluid">
					<div class="row">
						<div class="col-md-6">
							<div class="col-md-offset-3 col-md-9">
								<button type="submit" class="btn green">Αποθήκευση Παραγγελίας</button>
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