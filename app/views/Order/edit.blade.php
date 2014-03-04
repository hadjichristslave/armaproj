@extends('layouts.master')
@section('content')
<div class="tab-pane  active" id="tab_3">
		<div class="portlet box blue">
			<div class="portlet-title">
				<div class="caption">
					<i class="fa fa-reorder"></i>Τροποποίηση παραγγελίας
				</div>
				<div class="sumDiv">
					<div class="input-group">
						<input type="text" class="form-control placeholder ajax_totalPrice" value=-- readonly>
						<span class="input-group-addon">
							<i class="fa fa-euro"></i>
						</span>
					</div>
				</div>
				<div class="tools customTools">
					<span>
					<select class="form-control select2 ajax_employeeId" name="orderId" id="employeeorderIdSelect">
						<option value="0" selected>--</option>
						@foreach(Employeeorder::where('storeId' , '>'  , 0)->get() as $key=>$employeeOrder)
						<option value="{{$employeeOrder->id}}">{{$employeeOrder->employee->name}} on {{$employeeOrder->store->brand}} @ {{$employeeOrder->created_at}}</option>																	
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
			<form action="/azadmin/myproject/public/app/custom/Order/create" class="form-horizontal myuberform" method="post">
				{{Form::token()}}
				<div class="form-body">
					<h3 class="form-section" style="padding-bottom:15px;">Γενικές Πληροφορίες</h3>
					<div class="row">
							<div class="col-md-6">
							<div class="form-group">
								<label class="control-label col-md-3">Κατάστημα</label>
								<div class="col-md-6">
										<select class="form-control ajax_storeId select2" name="storeId">
											<option value="-1">----------</option>
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
						<div class="col-md-6">
							<div class="form-group">
								<label class="control-label col-md-3">Αναμενόμενη παράδοση</label>
										<div class="col-md-6">
											<input class="form-control form-control-inline input-medium date-picker ajax_expectedDelivery" name="expectedDate" size="16" type="text" value="" readonly>
											<span class="help-block">
												 Αναμενόμενη παράδοση
											</span>
										</div>
									</div>
						</div>
						<!--/span-->
					</div>
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label class="control-label col-md-3">Κατάσταση παραγγελίας</label>
								<div class="col-md-6">
										<select class="form-control ajax_stateId select2" name="storeId">
											<option value="-1">----------</option>
											@foreach(Orderstate::all() as $key=>$value)
											<option value="{{$value->id}}">{{$value->name}}</option>
											@endforeach
										</select>
										<span class="help-block">
											Τρέχουσα κατάσταση παραγγελίας
										</span>
									</div>
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label class="control-label col-md-3">Υπεύθυνος υπάλληλος</label>
								<div class="col-md-6">
										<select class="form-control ajax_employeeId select2" name="storeId" disabled>
											<option value="-1">----------</option>
											@foreach(Employee::all() as $key=>$value)
											<option value="{{$value->id}}">{{$value->name}}</option>
											@endforeach
										</select>
										<span class="help-block">
											Υπεύθυνος υπάλληλος
										</span>
									</div>
							</div>
						</div>
					</div>
					<h3 class="form-section" style="padding-bottom:15px;">Προιόντα
						<span style="float:right;">
								<a href="#" class="btn green addOrderProduct">Προσθήκη  <i class="fa fa-plus"></i></a>
								<a href="#" class="btn red removeOrderProduct">Διαγραφή <i class="fa fa-minus"></i></a>
						</span>
					</h3>
					<div class="row productRow">
						<input type="text" name="id" class="ajax_id" style="display:none;" />
						<div class="col-md-6">
							<div class="form-group">
								<label class="control-label col-md-3">Προιόν</label>
								<div class="col-md-9">
										<select class="form-control ajax_productId" name="productId">
											<option value="-1">----------</option>
											@foreach(Product::all() as $key=>$value)
											<option value="{{$value->id}}">{{$value->title}} - (Τρέχων απόθεμα:{{$value->availableStock}})</option>
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
									<input type="number" min="0" max="1000" class="form-control ajax_quantity" name="quantity"  placeholder="Ποσότητα">
								</div>
							</div>
						</div>
						<div class="col-md-9">
							<div class="form-group">
								<label class="control-label col-md-3">Σχόλια</label>
								<div class="col-md-9">
									<input class="form-control ajax_comments" name="comments"  placeholder="Σχόλια" / >
								</div>
							</div>
						</div>
						<div class="col-md-3">
							<div class="form-group">
								<label class="control-label col-md-3"></label>
								<div class="col-md-3">
										<a class="btn red" data-toggle="modal" href="#basic2"><i class="fa fa-times">
											</i> Διαγραφή μεμονωμένου προίόντος
										</a>
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
								<button type="submit" class="btn green">Αποθήκευση αλλαγών</button>
								<a class="btn red" data-toggle="modal" href="#basic">Διαγραφή παραγγελίας</a>
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
					<h4 class="modal-title">Διαγραφή παραγγελίας!</h4>
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

	<div class="modal fade" id="basic2" tabindex="-1" role="basic" aria-hidden="true" style="display: none;">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
					<h4 class="modal-title">Διαγραφή προιόντος παραγγελίας.</h4>
				</div>
				<div class="modal-body">
					 Θα διαγράψετε μόνο το προιόν αυτό από την παραγγελία.
					 Είστε σίγουρος/η?
				</div>
				<div class="modal-footer">
					<button type="button" class="btn default" data-dismiss="modal">Close</button>
					<button type="button " class="btn blue orderProductDelete" data-dismiss="modal"><i class="fa fa-times"></i>Διαγραφή</button>
				</div>
			</div>
			<!-- /.modal-content -->
		</div>
		<!-- /.modal-dialog -->
</div>

@stop