jQuery( document ).ready(function( $ ) {
  // Code using $ as usual goes here.
	$( "#companyIdSelect" ).change(function() {
		  $.get( "/azadmin/myproject/public/app/return/Store/"+$(this).val()+"/true", function( data ) {
		  	alert( "Load was performed." );
		});
	});
	
});