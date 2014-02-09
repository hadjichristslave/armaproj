jQuery( document ).ready(function( $ ) {
  // Code using $ as usual goes here.
  alert('this');
	$( "#companyIdSelect" ).change(function() {
		  $.get( "/azadmin/myproject/public/app/return/Store/"+$(this).val()+"/true", function( data ) {
		  	console.log(data);
		  	 $.each(data, function(index, element) {
	            console.log(element);

	        });
		});
	});
	
});