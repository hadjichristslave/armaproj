/**
	Variable declaration
*/
var divCounter         = 0;
var orderProductId     = 0;
var orderViewId        = 0;
var storeId            = 0;
var hasfiltered         = false;
var itemCartProducts   = new Array();
var token  = $("input[name='_token']").val();

/*---End of variable dec--------*/

jQuery( document ).ready(function($) {
  // Code using $ as usual goes here.
	$(".select2").each(function(){
		$(this).select2();
	});

	$("#fieldsReset").click(function(){
		$('input').each(function(){ $(this).val('')});
	});

	$( "#companyIdSelect" ).change(function() {
		  $.get( "/azadmin/myproject/public/app/return/Store/"+$(this).val()+"/true", function(data) {
		  	var response = JSON.parse(data.slice(0,-4));
		  	 $.each(response, function(index, element) {
            	$(".ajax_"+index).val(element);
	       		});
			});
		  $(".ajax_brandButton").each(function(){ console.log($(this).find('input').first().val('')); $(this).removeClass('active')});
  		  $(".ajax_brandButtonDate").each(function(){ $(this).find('input').first().val('')});
		  jQuery.ajax({
		         url:    "/azadmin/myproject/public/app/customreturn/Storebrand/"+$(this).val()+"/false",
		         success: function(data) {
			  	 	$.each(data, function(index, element) {
			  	 		$(".ajax_brandButton_"+element.brandId).click();
			  	 		var rawDate = element.startingDate;
			  	 		var rawDateArray = rawDate.split('-');
			  	 		var rawDate = rawDateArray[1] + '/' + rawDateArray[2] + '/' + rawDateArray[0];
			  	 		$(".ajax_brandButtonDate_"+element.brandId).find('input').first().val(rawDate);
		            	
		       	 	});
                  },
		         async:   false
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
		$('.shopEditForm').attr('action' , '/azadmin/myproject/public/app/custom/Store/delete');
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
		 var firstProduct                       = true;
		 orderViewId                            = $(this).val();
		 $(".employeeOrderFormId").val($(this).val());
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
		if(orderProductId==0){
			alert('Διαλέξτε παραγγελία πρώτα!');
			return false;
		}
		if($("div.productRow").length==1){
			alert('Η παραγγελία θα πρέπει να έχει τουλάχιστον ένα προιόν!');
			return false;
		}
   		var request = $.ajax({
		  url: "/azadmin/myproject/public/app/data/Order/delete/"+orderProductId+ "/id/noredirect",
		  type: "POST",
		  data: { _token : token , id: orderProductId},
		});
		request.done(function( msg ) {
		   $('.ajax_id').each(function(){
		   		if($(this).val()==orderProductId)
		   			$(this).parent().hide('slow').remove();
		   				reCreateInitialRow();
		   });
		});

	});

	$(".completeOrderDelete").click(function(){
		$(".employeeOrderFormId").val(orderViewId);
		$('.myuberform').attr('action' , '/azadmin/myproject/public/app/custom/Employeeorder/delete/id');
		$('.myuberform').submit();
	});

	$(".storeSubmit").click(function(){
		storeId = $(".storeSelect").val();
		$(".storeName").text($(".storeSelect option[value='"+storeId+"']").text());
	});

	$(document).on('change' , ".ajax_productId", function(){
		updateOrderCost();
	});

	$("#filter-search").click(function(){
		hasfiltered = true;
		$('body').css({ opacity: 0.5 , backgroundImage: "/azadmin/myproject/public/assets/global/plugins/carousel-owl-carousel/owl-carousel/AjaxLoader.gif"});
		var filters = {};
		$(".filter-tr").find('input').each(function(){
			if($(this).val!=undefined){
				name = $(this).attr('name');
				filters[name] = $(this).val();
			}
		});
		$(".filter-tr").find('select').each(function(){
			if($(this).val!=undefined){
				name = $(this).attr('name');
				filters[name] = $(this).val();
			}
		});
		$.get('/azadmin/myproject/public/app/customreturn/Filter?filtz='+JSON.stringify(filters), function(data){
			$(".filter-tbody").html(data)
		});
		$('body').css({ opacity: 1 , backgroundImage:''});
	});
	$("#filter-reset").click(function(){
		$.get('/azadmin/myproject/public/app/return/Product', function(data){

		});
	});

	$(".storeProductSelect2").on("change",function(){
		newSelectData = new Array();
		$.get("/azadmin/myproject/public/app/customreturn/Store/"+$(this).val()+"/true/products" , function(data){
			 // the selected values
			   	for (var i=0; i<data.length; i++) {
			   		newSelectData.push(data[i].productId);
			   	}
			   	$(".select2-result-label").each(function()
			        {
			            console.log($(this).text());
			        });		  	
		});
	});

	$(".addSingleProduct").on('click', function(){
		productId = $(this).attr('productId');
		updateProducts(productId);
		console.log(itemCartProducts);
	});

	$(".addAllProducts").on('click', function(){
		if(hasfiltered){
			$("input").each(function(){  
				console.log("filtered");
				if($(this).attr('checkbox')){
					var active = $(this).is(":checked");
					if(active){
						productId = $(this).attr('checkbox');
						updateProducts(productId);
					}
				}
			});
		}else{
			$(".checker").each(function(){ 
				active = $(this).find('span').first().hasClass('checked');
				if(active){
					productId = $(this).find('input').first().attr('checkbox');
					updateProducts(productId);
				}
			});
		}
	});
});
function addToCart(productId){
	updateProducts(productId);
}
function updateProducts(productId){
	flag = false;
	for(var i in itemCartProducts)
		if(itemCartProducts[i].prodId == productId){
			console.log('exists');
			flag = true;
		}else console.log('did not exist');
	if(flag == false){
		prodQty      = 0;
		prodName     = $.find('tr[rowId="'+productId+'"] td:nth-child(6)')[0].innerText;
		unitPrice    = $.find('tr[rowId="'+productId+'"] td:nth-child(8)')[0].innerText;
		itemCartProducts.push(new itemCart(productId, prodName, prodQty, unitPrice));
	}
	updateProductView();
}
function getTotalProducts(){
	total = 0;
	for(i in itemCartProducts)
		total += itemCartProducts[i].prodQty;
	return total;
}
function updateProductView(){
	console.log(itemCartProducts);
	$(".selectedProducts").empty();
	console.log(itemCartProducts);
	for(var i in itemCartProducts){
		var tempHtml = "<tr productTr="+itemCartProducts[i].prodId+">";
		tempHtml += '<td>'+itemCartProducts[i].prodId+'</td>';
		tempHtml += '<td>'+itemCartProducts[i].prodName+'</td>';
		tempHtml += '<td>'+itemCartProducts[i].unitPrice+'</td>';
		tempHtml += '<td><div id="spinner4"><div class="input-group" style="width:150px;"><div class="spinner-buttons input-group-btn"><button type="button" class="btn spinner-down" onclick=decreaseValue('+itemCartProducts[i].prodId+')><i class="fa fa-minus"></i></button></div><input type="text" class="spinner-input form-control" maxlength="3" value="'+itemCartProducts[i].prodQty+'" productId="'+itemCartProducts[i].prodId+'" readonly><div class="spinner-buttons input-group-btn"><button type="button" class="btn spinner-up" onclick=increaseValue('+itemCartProducts[i].prodId+')><i class="fa fa-plus"></i></button></div></div></div></td><td><div class="input-group productDeletebut"><button type="button" class="close" onclick=deleteProduct('+itemCartProducts[i].prodId+')></button></div></td>';
		tempHtml += '<tr>';
		$(".selectedProducts").append(tempHtml);
	}
	$('.orderProducts').text(getTotalProducts());
}
function deleteProduct(productId){
	for(var i in itemCartProducts)
		if(itemCartProducts[i].prodId==productId)
			removeByIndex(itemCartProducts, i);
	$("tr[productTr='"+productId+"']").fadeOut(400);
	getOrderCost();
	$('.orderProducts').text(getTotalProducts());
}
function increaseValue(productId){
	price = $('input[productId="'+productId+'"]').val();
	if(price=='') price = '0';
	price = parseInt(price);
	price++;
	$('input[productId="'+productId+'"]').val(price);
	updateProductQuantity(productId, price);
	getOrderCost();
}
function decreaseValue(productId){
	price = $('input[productId="'+productId+'"]').val();
	if(price=='') price = '0';
	price = parseInt(price);
	price--;
	$('input[productId="'+productId+'"]').val(price<0?0:price);
	updateProductQuantity(productId, price);
	getOrderCost();
}
function updateProductQuantity(productId, Qty){
	for(var i in itemCartProducts){
		if(itemCartProducts[i].prodId == productId)
			itemCartProducts[i].prodQty =Qty
	}
}
//used for the new product table view
function itemCart(prodId, prodName, prodQty, unitPrice){
	this.prodName = prodName;
	this.prodId   = prodId
	this.prodQty = prodQty;
	this.unitPrice = unitPrice;
}
//used in older versions
function orderCart(productId,quantity)
{
	this.productId=productId;
	this.quantity=quantity;
}
//completely deprecated
function orderBasicInfo(orderId, storeId, employeeId, stateId, date){
	this.orderId = orderId;
	this.storeId = storeId;
	this.employeeId = employeeId;
	this.stateId = stateId;
	this.date = date;
}
//completely deprecated
function orderItem(productId, quantity, comments){
	this.productId=productId;
	this.comments=comments;
	this.quantity=quantity;
}

function getOrderCost(){
	orderObjects = new Array();
	for(var i in itemCartProducts){
			var productId  = itemCartProducts[i].prodId;
			var productQtt = itemCartProducts[i].prodQty;
			orderObjects.push(new orderCart(productId, productQtt));	
	}
	$.ajax({
        type:  'get',
        cache:  false ,
        url:  '/azadmin/myproject/public/app/updatecost',
        data:  {cart:JSON.stringify(orderObjects)},
        success: function(resp) {
            $('.cartTotal').val(resp);
            cost = resp + " €";
            $(".orderCost").text(cost);
        } 
      });
	$('.orderProducts').text(getTotalProducts());
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
function reCreateInitialRow(){
	$("div.productRow:first").find("select").attr('name' , 'productId');
	$("div.productRow:first").find("input:last").attr('name' , 'comments');
	$("div.productRow:first").find("input[type='number']").attr('name' , 'quantity');
}
function clearProductElements(){
	$("div.productRow:not(:first)").remove();
}

function removeByIndex(arr, index) {
    arr.splice(index, 1);
}