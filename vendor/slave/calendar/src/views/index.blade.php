<link media="all" type="text/css" rel="stylesheet" href="packages/slave/calendar/css/select2.css">

<link media="all" type="text/css" rel="stylesheet" href="packages/slave/calendar/css/fullcalendar.css">
<link media="all" type="text/css" rel="stylesheet" href="packages/slave/calendar/css/fullcalendar.print.css">
<!-- jQuery-UI Stylesheet -->
<link media="all" type="text/css" rel="stylesheet" href="packages/slave/calendar/css/jquery.ui.all.css">
<div style="width:50%;height:50%;margin:0 auto;">
<div id="mws-calendar"></div>


<div id="mws-form-dialog">
	<form class="mws-form" id="message_view">
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
						<label class="mws-form-label">Last Modify From:</label>
							<select class="mws-select2 medium ev_creator_class" name="user_id" disabled="disabled">
							     <option value="1" selected >panos</option>
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
</div>

    <!-- JavaScript Plugins -->

    <script src="packages/slave/calendar/js/jquery-1.8.3.min.js"></script>
    <!-- jQuery-UI Dependent Scripts -->

    <script src="packages/slave/calendar/js/jquery-ui-1.9.2.min.js"></script>

    <script src="packages/slave/calendar/js/fullcalendar.min.js"></script>

    <!-- Demo Scripts (remove if not needed) -->
    <script src="packages/slave/calendar/js/dataTableScripts.js"></script>
    <script src="packages/slave/calendar/js/demo.calendar.js"></script> 
    <script src="packages/slave/calendar/js/cmsScripts.js"></script>	
    <script src="packages/slave/calendar/js/select2.min.js"></script>