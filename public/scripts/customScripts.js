jQuery( document ).ready(function( $ ) {
  // Code using $ as usual goes here.
  setupClickBehaviour();
	$( "#companyIdSelect" ).change(function() {
		  $.get( "/azadmin/myproject/public/app/return/Store/"+$(this).val()+"/true", function(data) {
		  	console.log(data.slice(0,-4));
		  	var response = JSON.parse(data.slice(0,-4));
		  	 $.each(response, function(index, element) {
            	$(".ajax_"+index).val(element);
	        });
		});
	});

	$( "#employeeIdSelect" ).change(function() {
		alert('thid');
		  $.get( "/azadmin/myproject/public/app/return/Employee/"+$(this).val()+"/true", function(data) {
		  	console.log(data.slice(0,-4));
		  	var response = JSON.parse(data.slice(0,-4));
		  	 $.each(response, function(index, element) {
            	$(".ajax_"+index).val(element);
	        });
		});
	});
	$( "#userIdSelect" ).change(function() {
		alert('thid');
		  $.get( "/azadmin/myproject/public/app/return/User/"+$(this).val()+"/true", function(data) {
		  	console.log(data.slice(0,-4));
		  	var response = JSON.parse(data.slice(0,-4));
		  	 $.each(response, function(index, element) {
            	$(".ajax_"+index).val(element);
	        });
		});
	});

	$( "#productIdSelect" ).change(function() {
		alert('thid');
		  $.get( "/azadmin/myproject/public/app/return/Product/"+$(this).val()+"/true", function(data) {
		  	console.log(data.slice(0,-4));
		  	var response = JSON.parse(data.slice(0,-4));
		  	 $.each(response, function(index, element) {
            	$(".ajax_"+index).val(element);
	        });
		});
	});

	$( "#orderIdSelect" ).change(function() {
		alert('thid');
		  $.get( "/azadmin/myproject/public/app/return/Product/"+$(this).val()+"/true", function(data) {
		  	console.log(data.slice(0,-4));
		  	var response = JSON.parse(data.slice(0,-4));
		  	 $.each(response, function(index, element) {
            	$(".ajax_"+index).val(element);
	        });
		});
	});
	
	$('.shopEdit').click(function(){
		$('.shopEditForm').submit();
	});
	$('.shopDelete').click(function(){
		$('.shopEditForm').attr('action' , '/azadmin/myproject/public/app/data/Store/delete');
		$('.shopEditForm').submit();
	});
	$('.employeeDelete').click(function(){
		$('.employeeEditForm').attr('action' , '/azadmin/myproject/public/app/custom/Employee/delete');
		$('.employeeEditForm').submit();
	});
	$('.userDelete').click(function(){
		$('.userEditForm').attr('action' , '/azadmin/myproject/public/app/data/User/delete');
		$('.userEditForm').submit();
	});
	$('.productDelete').click(function(){
		$('.productEditForm').attr('action' , '/azadmin/myproject/public/app/data/Product/delete');
		$('.productEditForm').submit();
	});

	$('.orderDelete').click(function(){
		$('.orderEditForm').attr('action' , '/azadmin/myproject/public/app/data/Order/delete');
		$('.orderEditForm').submit();
	});

});


function setupClickBehaviour(){
	$(".addOrderProduct").click(function(){
		$("div.productRow").clone().appendTo(".form-body");
	});
	$(".removeOrderProduct").click(function(){
		$(this).parent().parent().remove();
	});
}
function updateClickBehaviour(){
	$(".addOrderProduct").click(function(){
		$("div.productRow:first").clone().appendTo(".form-body");
	});
	$(".removeOrderProduct").click(function(){
		$(this).parent().parent().remove();
	});
}