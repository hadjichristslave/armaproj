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
var currentOrder       = 0;
var selectified        = '';
var editCounter         = 0;
var postResponse ='';
var currDiscount;
/*---End of variable dec--------*/

jQuery( document ).ready(function($) {
	$("#nav_up").hide();
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
			  	 		$(".ajax_brandButtonDiscount_"+element.brandId).find('input').first().val(element.discount);
		            	
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

	$(".groupbrand").on('change', function(){
		productGroup = $('.productGroup_'+$(this).attr('target')).val();
		brandId      = $(this).val();
		if($(this).attr('tableId')==0){
			createEmptyModel("Productbrand", '');
			updateSingleCell(currentOrder.id, "Productbrand" , 'brandId' , brandId);
			updateSingleCell(currentOrder.id, "Productbrand" , 'productGroup' , productGroup);
			$(this).attr('tableId',currentOrder.id);
		}else
			updateSingleCell($(this).attr('tableId') , "Productbrand" , 'brandId' , brandId);
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

	$(".modalDeleteOrder").click(function(){
		$(".deleteOrder").attr('orderId' , $(this).attr('orderId'));
	});	

	$(".deleteOrder").click(function(){
		var currentIdz = $(this).attr('orderId');
		var token      = $('input[name="_token"]').val();
		$.post("/azadmin/myproject/public/app/custom/Employeeorder/delete?id="+currentIdz+"&_token="+token, function(data){
			location.reload();

		});
	});

	$(".storeSubmit").click(function(){
		storeId = $(".storeSelect").val();
		name = $(".storeSelect option:selected").text();
		name = name.length>12?name.substring(0,10)+"...":name;
		$(".storeName").text(name);
		getOrderCost('true' ,storeId);
	});

	$(document).on('change' , ".ajax_productId", function(){
		updateOrderCost();
	});

	$("#filter-search").click(function(){
		hasfiltered = true;
		var filters = getFiltervars();
		$.get('/azadmin/myproject/public/app/customreturn/Filter?filtz='+JSON.stringify(filters), function(data){
			$(".filter-tbody").html(data)
		});
	});
	
	$(".filterOrders").click(function(){
		hasfiltered = true;
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
		console.log(filters);
		$.get('/azadmin/myproject/public/app/customreturn/orderFilter?filtz='+JSON.stringify(filters), function(data){
			$(".filter-tbody").html(data)
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
	});

	$(".addAllProducts").on('click', function(){
		
		$("input").each(function(){  
			if($(this).attr('secondary')){
				var active = $(this).is(":checked");
				if(active){
					productId = $(this).attr('checkbox');
					updateProducts(productId);
				}
			}
		});
		$(".checker").each(function(){ 
			active = $(this).find('span').first().hasClass('checked');
			if(active){
				productId = $(this).find('input').first().attr('checkbox');
				updateProducts(productId);
			}
		});
	});

	$(".newOrderSave").click(function(){
		if(storeId==0){
			alert('Το πεδίο κατάστημα είναι υποχρεωτικό!');
			return false;
		}else if(itemCartProducts.length==0){
			alert('Τουλάχιστον ένα προιόν πρέπει να είναι στο καλάθι!');
			return false;
		}

		formData = {};
		formData['storeId'] = storeId;
		for(i in itemCartProducts){
			productPrefix = 'productId' + '_' + i;
			quantityPrefix = 'quantity' + '_' + i;
			formData[productPrefix] = itemCartProducts[i].prodId;
			formData[quantityPrefix] = itemCartProducts[i].prodQty;
		}
		$.ajax({
        type:  'post',
        cache:  false ,
        url:  '/azadmin/myproject/public/app/custom/Order/create',
        data:  {cart:JSON.stringify(formData),_token:token},
        success: function(resp) {
        	console.log(resp);
        	window.location.href = resp;
        } 
      });
	});


	 $('input.createInput').on('keyup' , function(){
	 	productEditCartPopulate();
	 	setSubtotal(id);
	 	getOrderCost('true' , storeId);
	 });


	$('input.editInput').on('change' , function(){
		productEditCartPopulate();

		id = $(this).attr('productId');
		model   = "Order";
		key     = $(this).attr('key');
		value   = $(this).val();
		updateSingleCell(id , model, key, value);
		
		setSubtotal(id);
		getOrderCost('true',storeId);

		updateDBCost();
	});

	$(".orderEditStateChange").change(function(){
		orderId = $(this).attr('orderId');
		key     = $(this).attr('key');
		value   = $(this).val();
		model   = "Employeeorder";
		updateSingleCell(orderId , model, key, value);
	});



	$(".productEditAdd").on('click',function(){
		args = {'orderId' : $('tbody.productBody').attr('orderId') };

		objId = createEmpty('Order', args);
		order = "Order";
		getAllProducts($('tbody.productBody').attr('orderId'));
		obj = "<tr class='productEditTr' itemId='1' orderId='"+$('tbody.productBody').attr('orderId')+"' productTr='"+currentOrder.id+"'><td> "+selectified+"</td> <td> <div id=''> <div class='input-group' style='width:150px;'> <div class='spinner-buttons input-group-btn'> <button type='button' class='btn spinner-down' onclick=cartify('"+currentOrder.id+"','false') > <i class='fa fa-minus'></i> </button> </div> <input type='text' class='spinner-input form-control editInput' itemId='1' productId-edit='on' key='quantity' productId='"+currentOrder.id+"' maxlength='3' value='0' onchange=cartify("+currentOrder.id+",\"true\",\"manual\") > <div class='spinner-buttons input-group-btn'> <button type='button' class='btn spinner-up' onclick=cartify('"+currentOrder.id+"','true') > <i class='fa fa-plus'></i> </button> </div> </div> </div> </td> <td> -- </td> <td> --  </td> <td>  -- </td>  <td class='subtotal' subtotal='on'> 0€ </td> <td > <div class='input-group deleteEditProduct'> <button type='button' class='close editAddDelete' onclick=deleteProduct("+currentOrder.id+",'Order')></button> </div> </td> </tr>";
		$(".productBody").append(obj);
		select2Format(true);

	});

	$(".csvExport").click(function(){
		id        = $("tbody.productBody").attr('orderId');
		isCorrect = true;
		$(".orderProducts").find('tbody tr').each(function(){
		 	stock = parseInt($(this).find('td:nth-child(4)').text());
		 	console.log(stock);
		 	if(stock<=0)
		 		isCorrect = false;
		});
			if(isCorrect){
				$.get("/azadmin/myproject/public/app/export/"+id,function(data){
					newwindow = window.open(data);
				});
			}else{
				alert("Παρακάλώ διαγράψτε όλα τα προϊόντα με μηδενικό απόθεμα προτού εξάγετε την παραγγελία");
			}
	});

	
	$(window).scroll(function() {
	    if ($(this).scrollTop() > 100) {
	        $('#nav_up').fadeIn();
	    } else {
	        $('#nav_up').fadeOut();
	    }
	     if($(this).scrollTop() + $(this).height() > $(document).height() - 100) {

		 	if($("#datatable_products").length>0){
		 		var skip = $("#datatable_products").find('tbody').first().find('tr').length-1
		 		var filters = getFiltervars();
		 		$("#datatable_products").fadeTo('slow',0.4);
		 		$.get('/azadmin/myproject/public/app/customreturn/Filter/'+skip+'?filtz='+JSON.stringify(filters), function(data){
					$(".filter-tbody").append(data);

				});
				$("#datatable_products").fadeTo('fast',1);
		 	}
		 }
	});

	storeId = $(".storeTitle").attr('storeId');

});


function getFiltervars(){
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
		return filters;
}
function addToCart(productId){
	updateProducts(productId);
}
function select2Format(tabledata){	
		ComponentsDropdowns.init();
}

function getAllProducts(orderId){
	$.ajax({
        type:  'get',
        cache:  false ,
        async : false, 
        url:  '/azadmin/myproject/public/app/selectify/Product/'+editCounter+'/'+orderId,
        success: function(resp) {
			selectified = resp;
        } 
      });
	editCounter++;
}

function returnSmth(model, id , singlerecord){
	$.get("/azadmin/myproject/public/app/return/"+model + "/"+ id+"/"+singlerecord, function(data){
		currentOrder = data;
	});
}

function createEmpty(model , data){
	args = JSON.stringify(data);
	$.ajax({
        type:  'post',
        cache:  false ,
        async : false, 
        url:  '/azadmin/myproject/public/app/createempty/Order',
        data:  {args:args},
        success: function(resp) {
			currentOrder = resp;
        } 
      });
}
function createEmptyModel(model , data){
	args = JSON.stringify(data);
	$.ajax({
        type:  'post',
        cache:  false ,
        async : false, 
        url:  '/azadmin/myproject/public/app/createempty/'+model,
        data:  {args:args},
        success: function(resp) {
			currentOrder = resp;
        } 
      });
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
		prodName     = $.find('tr[rowId="'+productId+'"] td:nth-child(6)')[0].textContent;
		unitPrice    = $.find('tr[rowId="'+productId+'"] td:nth-child(8)')[0].textContent;
		itemCartProducts.push(new itemCart(productId, prodName, prodQty, unitPrice));
	}
	updateProductView();
}
function productEditCartPopulate(){
	itemCartProducts = new Array();
	totalProducts    = 0;
	$(".productEditTr").each(function(){
		productId       = $(this).attr('itemId');
		prodQty         = $(this).find('td:nth-child(2)').find('input').first().val();
		totalProducts  += parseInt(prodQty);
		itemCartProducts.push(new itemCart(productId, " ", prodQty, ""));
	});
	$('.productTotalNumber').text(totalProducts);
}
function getTotalProducts(){
	total = 0;
	for(i in itemCartProducts)
		total += itemCartProducts[i].prodQty;
	return total;
}
function updateProductView(){
	$(".selectedProducts").empty();
	for(var i in itemCartProducts){
		var tempHtml = "<tr productTr="+itemCartProducts[i].prodId+" class='productEditTr' >";
		tempHtml += '<td>'+itemCartProducts[i].prodId+'</td>';
		tempHtml += '<td>'+itemCartProducts[i].prodName+'</td>';
		tempHtml += '<td>'+itemCartProducts[i].unitPrice+'</td>';
		tempHtml += '<td><div><div class="input-group" style="width:150px;"><div class="spinner-buttons input-group-btn"><button type="button" class="btn spinner-down" onclick=decreaseValue('+itemCartProducts[i].prodId+')><i class="fa fa-minus"></i></button></div><input type="text" class="spinner-input form-control" maxlength="3" value="'+itemCartProducts[i].prodQty+'" productId="'+itemCartProducts[i].prodId+'" onchange=manualChange('+itemCartProducts[i].prodId+')><div class="spinner-buttons input-group-btn"><button type="button" class="btn spinner-up" onclick=increaseValue('+itemCartProducts[i].prodId+')><i class="fa fa-plus"></i></button></div></div></div></td><td><div class="input-group productDeletebut"><button type="button" class="close" onclick=deleteProduct('+itemCartProducts[i].prodId+')></button></div></td>';
		tempHtml += '<tr>';
		$(".selectedProducts").append(tempHtml);
	}
	$('.orderProducts').text(getTotalProducts());
}
function deleteProduct(orderIndex , model , productId){
	if(typeof productId!=="undefined")
			productEditCartPopulate();
	for(var i in itemCartProducts){
		if(typeof productId=== 'undefined'){
			console.log("undefined");
			if(itemCartProducts[i].prodId==orderIndex)
				removeByIndex(itemCartProducts, i);
		}else{
			console.log("defined");
			if(itemCartProducts[i].prodId==productId){
				removeByIndex(itemCartProducts, i);
			}
		}
			
	}
	$("tr[productTr='"+orderIndex+"']").remove();

	$('.orderProducts').text(getTotalProducts());
	 if(typeof model !== 'undefined'){
	 	deleteByIndex(orderIndex, model);
 	}
	getOrderCost('true',storeId);
}

function deleteByIndex(id, model){
	console.log(id + model);
	$.post('/azadmin/myproject/public/app/data/'+model+'/delete'+'?id='+id, function(data){
		if(data){
			console.log('success');
			deleteProduct(id);
		}
	});
}
function manualChange(productId){
	price = $('input[productId="'+productId+'"]').val();
	if(price=='') price = 0;
	price = parseInt(price);
	console.log(price);
	$('input[productId="'+productId+'"]').val(price);
	updateProductQuantity(productId, price);
	getOrderCost('',storeId);
}
function increaseValue(productId){
	price = $('input[productId="'+productId+'"]').val();
	if(price=='') price = '0';
	price = parseInt(price);
	price++;
	$('input[productId="'+productId+'"]').val(price);
	updateProductQuantity(productId, price);
	getOrderCost('',storeId);
}
function decreaseValue(productId){
	price = $('input[productId="'+productId+'"]').val();
	if(price=='') price = '0';
	if(price=='0') return;
	price = parseInt(price);
	price--;
	$('input[productId="'+productId+'"]').val(price<0?0:price);
	updateProductQuantity(productId, price);
	getOrderCost('',storeId);
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

function getOrderCost(editView , storeId){
	orderObjects = new Array();
	for(var i in itemCartProducts){
			var productId  = itemCartProducts[i].prodId;
			var productQtt = itemCartProducts[i].prodQty;
			orderObjects.push(new orderCart(productId, productQtt));	
	}
	if(storeId==0){
		alert('Παρακαλώ διαλέξτε κατάστημα για το σωστό υπολογισμό κόστους!');
		return false;
	}
	$.ajax({
        type:  'get',
        cache:  false ,
        async: false,
        url:  '/azadmin/myproject/public/app/updatecost',
        data:  {cart:JSON.stringify(orderObjects), storeId:storeId},
        success: function(resp) {
            $('.cartTotal').val(resp);
            cost = resp + " €";
            if (typeof editView != 'undefined' && editView =='true' ){
				$('.totalCostz').text(cost);
			}
			else{
            	$(".orderCost").text(cost);
			}
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

function cartify(productId , action , manualAction){
	productEditCartPopulate();
	if(typeof manualAction !== "undefined"){
		action =  manualChange(productId);
	}else
		action=="true"?increaseValue(productId):decreaseValue(productId);

	getOrderCost('true' ,storeId);
	setSubtotal(productId);
	updateSingleCell(productId , 'Order', 'quantity', $('input[productId="'+productId+'"]').val() );
	updateDBCost();
}

function updateDBCost(){
	totalCost = $(".totalCostz").text();
	totalCost = totalCost.slice(0,-1);
	updateSingleCell($('tbody.productBody').attr('orderId') , 'Employeeorder', 'totalPrice', parseFloat(totalCost));
}

function setSubtotal(productId){
	input = $("input[productId='"+productId+"']");
	qty   = input.val();
	itmId = input.attr('itemId');

	$.get('/azadmin/myproject/public/app/subtotal?productId='+itmId+"&quantity="+qty, function(data){
		answer = data + " €";
		$("tr[itemId='"+itmId+"']").find('td[subtotal="on"]').text(answer);
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
function updateSingleCell(id , Model, key, value){
	url = "/azadmin/myproject/public/app/update/"+Model+"?"+key+"="+value+"&id="+id+"&_token="+token;
	$.post(url, function(data){
		postResponse = data;
	});
}
function animateToTop(){
	$('html, body').animate({ scrollTop: 0 }, 'fast');
}

function getProdStoreDiscount(productId,storeId){
	 url  ="/azadmin/myproject/public/app/prodStoreDiscount/"+productId+"/"+storeId;
	$.get(url, function(data){
		currDiscount = data;
	});
}
function getIfActive(currentUrl){
	url = document.URL;
	return url.indexOf(currentUrl) > -1?"active":"";
}