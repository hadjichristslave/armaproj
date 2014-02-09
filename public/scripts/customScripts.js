jQuery( document ).ready(function( $ ) {
  // Code using $ as usual goes here.
  alert('this');
	$( "#companyIdSelect" ).change(function() {
		  $.get( "/azadmin/myproject/public/app/return/Store/"+$(this).val()+"/true", function(data) {
		  	console.log(data.slice(0,-4));
		  	var response = JSON.parse(data.slice(0,-4));
		  	 $.each(response, function(index, element) {
	            console.log(element);

	        });
		});
	});
	
});