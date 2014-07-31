@extends('layouts.master')
@section('content')
			<div class="row">
				<div class="col-md-12">
					
					<!-- Begin: life time stats -->
					<div class="portlet">
						<div class="portlet-title">
							<div class="caption">
								<i class="fa fa-shopping-cart"></i>Παραγγελίες Πωλητή
							</div>
							<div class="actions">
								<a href="/azadmin/myproject/public/app/data/Order/Create" class="btn default yellow-stripe">
								<i class="fa fa-plus"></i>
								<span class="hidden-480">
								Νέα παραγγελία </span>
								</a>
								<div class="btn-group">
									<a class="btn default yellow-stripe" href="#" data-toggle="dropdown">
									<i class="fa fa-share"></i>
									<span class="hidden-480">
									Εργαλεία </span>
									<i class="fa fa-angle-down"></i>
									</a>
									<ul class="dropdown-menu pull-right">
										<li>
											<a href="#">
											Εξαγωγή σε Excel </a>
										</li>
										<li>
											<a href="#">
											Εξαγωγή σε CSV </a>
										</li>
										
										
									</ul>
								</div>
							</div>
						</div>
						<div class="portlet-body">
							<div class="table-container">
								<div class="table-actions-wrapper">
									<span>
									</span>
									<select class="table-group-action-input form-control input-inline input-small input-sm">
										<option value="">Select...</option>
										<option value="Cancel">Cancel</option>
										<option value="Cancel">Hold</option>
										<option value="Cancel">On Hold</option>
										<option value="Close">Close</option>
									</select>
									<button class="btn btn-sm yellow table-group-action-submit"><i class="fa fa-check"></i> Submit</button>
								</div>
								<table class="table table-striped table-bordered table-hover" id="datatable_orders">
								<thead>
								<tr role="row" class="heading">
									<th width="2%">
										<input type="checkbox" class="group-checkable">
									</th>
									<th width="5%">
										 Παραγγελία&nbsp;#
									</th>
									<th width="15%">
										 Ημερομηνία
									</th>
									<th width="15%">
										 Κατάστημα
									</th>
									
									<th width="10%">
										 Κόστος
									</th>
									
									<th width="10%">
										 Κατάσταση
									</th>
									<th width="10%">
										 Ενέργειες
									</th>
								</tr>
								<tr role="row" class="filter filter-tr">
									<td>
									</td>
									<td>
										<input type="text" class="form-control form-filter input-sm" name="id">
									</td>
									<td>
										<div class="input-group date date-picker margin-bottom-5" data-date-format="dd/mm/yyyy">
											<input type="text" class="form-control form-filter input-sm" readonly name="order_date_from" placeholder="From">
											<span class="input-group-btn">
											<button class="btn btn-sm default" type="button"><i class="fa fa-calendar"></i></button>
											</span>
										</div>
										<div class="input-group date date-picker" data-date-format="dd/mm/yyyy">
											<input type="text" class="form-control form-filter input-sm" readonly name="order_date_to" placeholder="To">
											<span class="input-group-btn">
											<button class="btn btn-sm default" type="button"><i class="fa fa-calendar"></i></button>
											</span>
										</div>
									</td>
									<td>
										<input type="text" class="form-control form-filter input-sm" name="store_Name">
									</td>
									
									<td>
										<div class="margin-bottom-5">
											<input type="text" class="form-control form-filter input-sm" name="order_total_price_from" placeholder="From"/>
										</div>
										<input type="text" class="form-control form-filter input-sm" name="order_total_price_to" placeholder="To"/>
									</td>
									
									<td>
										<select name="stateId" class="form-control form-filter input-sm">
											<option value="">Επιλέξτε...</option>
											<option value="1">Ανοιχτή</option>
											<option value="2">Κλειστή</option>
											<option value="3">Σε αναμονή</option>
											<option value="4">Ακυρωμένη</option>
										</select>
									</td>
									<td>
										<div class="margin-bottom-5">
											<button class="btn btn-sm yellow filter-submit margin-bottom filterOrders"><i class="fa fa-search"></i> Search</button>
										</div>
										<button class="btn btn-sm red filter-cancel"><i class="fa fa-times"></i> Reset</button>
									</td>
								</tr>
								</thead>
								<tbody class="filter-tbody">
									@foreach(Employeeorder::where('employeeId' , '=' , Auth::user()->userId)->get() as $ord)
										<tr>
									<td><input type="checkbox" class="group-checkable"></td>
									<td>{{$ord->id}}</td>
									<td>{{$ord->created_at}}</td>
									<td>{{Store::find($ord->storeId)->brand}}</td>
									<td>{{$ord->totalPrice}}€</td>
									<td><span class="label label-sm label-success">{{Orderstate::find($ord->stateId)->name}}</span></td>
									<td>
									<a href="/azadmin/myproject/public/app/data/Order/display/{{$ord->id}}" class="btn btn-xs default btn-editable"><i class="fa fa-search"></i> Edit</a>
									</td>
									</tr>
									@endforeach
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
	
</div>

@stop