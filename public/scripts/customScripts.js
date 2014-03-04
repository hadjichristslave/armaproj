/**
	Variable declaration
*/
var divCounter =0;

/*---End of variable dec--------*/
jQuery( document ).ready(function($) {
  // Code using $ as usual goes here.
	$(".select2").each(function(){
		$(this).select2();
	});

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
		  $.get( "/azadmin/myproject/public/app/return/Employee/"+$(this).val()+"/true", function(data) {
		  	console.log(data.slice(0,-4));
		  	var response = JSON.parse(data.slice(0,-4));
		  	 $.each(response, function(index, element) {
            	$(".ajax_"+index).val(element);
	        });
		});
	});
	$( "#userIdSelect" ).change(function() {
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

	$(".addOrderProduct").on('click', function(){
		divCounter++;
		elementToClone = $("div.productRow:first").clone().hide();
		elementToClone.find("select[name='productId']").attr('name' , 'productId_'+divCounter);
		elementToClone.find("input[name='comments']").attr('name' , 'comments_'+divCounter);
		elementToClone.find("input[name='quantity']").attr('name' , 'quantity_'+divCounter);
		elementToClone.find("select.select2").each(function(){
			$(this).select2();
		});
		elementToClone.find("div.select2").first().hide();
		elementToClone.appendTo(".form-body").fadeIn('slow');

	});
	$(".removeOrderProduct").on('click',function(){
		if($("div.productRow").length>1){
			$("div.productRow:last").hide('slow' , function(){$(this).remove()});
		}else{
			console.log('only one element on list, not removing that, for god\'s sake');
		}
	});

	$(document).on('keyup change',"input[type='number']", function(evt){
	   var charCode = (evt.which) ? evt.which : event.keyCode
		if (!(charCode > 31 && (charCode < 48 || charCode > 57))==false) return false;
		updateOrderCost();
	});


	$("#employeeorderIdSelect").on("change", function(e) { 
		$.get( "/azadmin/myproject/public/app/customreturn/Employeeorder/"+e.val+"/true", function(data) {
		  	console.log(data.order);
		  	$.each(data.order,function(key, val){
		  		$(".ajax_"+key).select2("val", val);
		  		$(".ajax_"+key).val(val);
		  	})
		  	$.each(data.orderData , function(key,val){
		  		console.log(data.orderData);
		  	});
		  	
		});
	 });


});


function orderCart(productId,quantity)
{
	this.productId=productId;
	this.quantity=quantity;
}
function updateOrderCost(){
	orderObjects = new Array();
		$('.productRow').each(function(){
			var productId  = $(this).find('.select2').select2('data').id;
			var productQtt = $(this).find('.ajax_quantity').val();
			console.log(productId  + " " + productQtt);
			orderObjects.push(new orderCart(productId, productQtt));
		});
		$.ajax({
	        type:  'get',
	        cache:  false ,
	        url:  '/azadmin/myproject/public/app/updatecost',
	        data:  {cart:JSON.stringify(orderObjects)},
	        success: function(resp) {
	            $('.ajax_sum').val(resp);
	        } 
	      });
}