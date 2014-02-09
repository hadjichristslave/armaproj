jQuery( document ).ready(function( $ ) {
  // Code using $ as usual goes here.
  alert('this');
	$( "#companyIdSelect" ).change(function() {
		  $.get( "/azadmin/myproject/public/app/return/Store/"+$(this).val()+"/true", function( data ) {
		  	alert( "Load was performed." );
		  	$.each(data, function(key,val){
		  		console.log(key);
		  		console.log(val);
		  	});
		});
	});
	
});