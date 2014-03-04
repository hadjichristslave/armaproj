/**
	Variable declaration
*/
var divCounter     = 0;
var orderProductId = 0;
var orderViewId    = 0;
var token  = $("input[name='_token']").val();

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
		cloneProductElement();
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


	$("#employeeorderIdSelect").on("change", function() {
		 clearProductElements();
		 var firstProduct   = true;
		 orderViewId        = $(this).val();
		$.get( "/azadmin/myproject/public/app/customreturn/Employeeorder/"+orderViewId+"/true", function(data) {
		  	$.each(data.order,function(key, val){
		  		$(".ajax_"+key).val(val);
		  		myform = $(".myuberform");
		  		myform.find(".ajax_"+key).select2("val", val);
		  	});
		  	$.each(data.orderData , function(key, val){
		  		if(firstProduct){
		  			firstProduct = !firstProduct;
	  				var elementToModify = $("div.productRow:last");
	  				$.each(val, function(key2,val2){
			  			elementToModify.find("input[name='"+key2+"']").val(val2);
			  			elementToModify.find(".ajax_"+key2).val(val2);
			  		});
		  		}else{
			  		cloneProductElement();
			  		var elementToModify = $("div.productRow:last");
			  		$.each(val, function(key2,val2){
			  			elementToModify.find("input[name='"+key2+"_"+divCounter+"']").val(val2);
			  			elementToModify.find(".ajax_"+key2).val(val2);
			  		});
			  	}
		  	});
		  	
		});
	 });
	$(document).on('click' , ".employeeOrderProduct", function(evt){
		orderProductId = $(this).parent().parent().parent().parent().find(".ajax_id").val();
	});

	$(document).on('click',".orderProductDelete", function(evt){
   		var request = $.ajax({
		  url: "/azadmin/myproject/public/app/data/Order/delete/"+orderProductId+ "/id/noredirect",
		  type: "POST",
		  data: { _token : token , id: orderProductId},
		});
		request.done(function( msg ) {
		   $('.ajax_id').each(function(){
		   		if($(this).val()==orderProductId)
		   			$(this).parent().hide('slow').remove();
		   })
		});

	});

	$(".completeOrderDelete").click(function(){
		$(".employeeOrderFormId").val(orderViewId);
		$('.myuberform').attr('action' , '/myproject/public/app/custom/Employeeorder/delete/id');
		$('.myuberform').submit();
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

function cloneProductElement(){
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
}
function clearProductElements(){
	$("div.productRow:not(:first)").remove();
}