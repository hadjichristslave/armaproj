@extends('layouts.master')
@section('content')
<div class="tab-pane  active" id="tab_3">
	<div class="portlet box blue">
		<div class="portlet-title">
			<div class="caption">
				<i class="fa fa-reorder"></i>Δημιουργία Παραγγελίας
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
					<h3 class="form-section">Γενικές Πληροφορίες</h3>
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label class="control-label col-md-3">Κατάστημα</label>
								<div class="col-md-9">
										<select class="form-control ajax_storeId" name="storeId">
											@foreach(Store::all() as $key=>$value)
											<option value="{{$value->id}}">{{$value->name}}</option>
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
					<i class="fa fa-plus"></i>
					<i class="fa fa-minus"></i>
					<div class="row productRow">
						<div class="col-md-4">
							<div class="form-group">
								<label class="control-label col-md-3">Προιόν</label>
								<div class="col-md-9">
										<select class="form-control ajax_productId" name="productId">
											@foreach(Product::all() as $key=>$value)
											<option value="{{$value->id}}">{{$value->name}}</option>
											@endforeach
										</select>
										<span class="help-block">
											Διαλέξτε το προιόν βάσει του τίτλου του
										</span>
									</div>
							</div>
						</div>
						<div class="col-md-4">
							<div class="form-group">
								<label class="control-label col-md-3">Ποσότητα</label>
								<div class="col-md-9">
									<input type="number" class="form-control ajax_quantity" name="quantity"  placeholder="Ποσότητα">
								</div>
							</div>
						</div>
						<div class="col-md-4">
							<div class="form-group">
								<label class="control-label col-md-3">Σχόλια</label>
								<div class="col-md-9">
									<input type="text" class="form-control ajax_comments" name="comments"  placeholder="Σχόλια">
								</div>
							</div>
						</div>
						<!--/span-->
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