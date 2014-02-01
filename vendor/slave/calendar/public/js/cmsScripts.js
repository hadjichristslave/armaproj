var token;
token = $('input[name=_token]').val();

function calendarModifyCall(url , data){
	$.ajax({
	  	type: "POST",
	  	url: url,
		async: false,
	  	data: data
		}).done(function( results ) {
			$(".modal_msg_id").val(results);
	});
}
