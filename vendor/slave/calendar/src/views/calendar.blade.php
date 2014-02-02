@extends('layouts.master')
@section('content')
			<div class="row">
				<div class="col-md-12">
					<div class="portlet box blue calendar">
						<div class="portlet-title">
							<div class="caption">
								<i class="fa fa-reorder"></i>Calendar
							</div>
						</div>
						<div class="portlet-body light-grey">
							<div class="row">
								<div class="col-md-12 col-sm-12">
									<div id="calendar" class="has-toolbar">
									</div>
								</div>
							</div>
							<!-- END CALENDAR PORTLET-->
						</div>
					</div>
				</div>
			</div>
			<!-- END PAGE CONTENT-->
		</div>
	</div>
	<!-- END CONTENT -->
</div>
<!-- END CONTAINER -->
<!-- BEGIN FOOTER -->
<div class="footer">
	<div class="footer-inner">
		 2013 &copy; Metronic by keenthemes.
	</div>
	<div class="footer-tools">
		<span class="go-top">
			<i class="fa fa-angle-up"></i>
		</span>
	</div>
</div>



<div id="mws-form-dialog">
	<form class="form" id="message_view">
		{{Form::token()}}
    	<div class="mws-form-inline">
					<input type="text" class="medium modal_msg_id" name="id"  value="" style="display:none;">
					<div class="mws-form-row">
						<label class="mws-form-label">Title</label>
						<div class="mws-form-item">
							<input type="text" class="medium modal_msg_name" name="title" >
						</div>
					</div>
					<div class="mws-form-row" style="display:none;">
						<label class="mws-form-label">Start</label>
						<div class="mws-form-item">
							<input type="text"  class="mws-dtpicker calendar_start"  name="start" readonly="readonly" />
						</div> 
					</div>
					<div class="mws-form-row" style="display:none;">
						<label class="mws-form-label">End</label> 
						<div class="mws-form-item">
							<input type="text" class="mws-dtpicker calendar_end"   name="end" readonly="readonly" />
						</div>
					</div>
					<div class="mws-form-row">
						<label class="mws-form-label">Comments</label>
						<div class="mws-form-item">
							<input type="text" class="medium mws-autocomplete ev_comments_class" name="extras">
						</div>
					</div>
					<div class="mws-form-row">
						<label class="mws-form-label">Διαθέσιμοι υπάληλοι:</label><br>
							<select class="select2 medium ev_creator_class" name="user_id">
				               <optgroup label="0 φορές αυτό το μήνα">
				                   <option value="3">Casper</option>
				               </optgroup>
				               <optgroup label="1 φορά μέσα στο μήνα">
				                   <option value="2">homer</option>
				               </optgroup>
				               <optgroup label="κάθε μέρα του μήνα">
				                   <option value="1">panos</option>
				                   <option value="1">alex</option>
				               </optgroup>
							</select>
					</div>
					<div class="mws-form-row" style="display:none;">
						<label class="mws-form-label">All day </label>
						<div class="mws-form-item"> 
							<input type="text" class="mws-dtpicker calendar_allday" name="allDay" readonly="readonly" />
						</div>
					</div>
		</div>
	</form>
 </div>
<!-- END FOOTER -->

<style>
.select2{
	width:150px;
}
</style>


@stop