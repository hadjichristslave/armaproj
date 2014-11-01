var counter = 0;
var currentProdId;
var ComponentsDropdowns = function () {

    var handleSelect2 = function () {


        function format(state) {
            if (!state.id) return state.text; // optgroup
            return "<img class='flag' src='../../assets/global/img/flags/" + state.id.toLowerCase() + ".png'/>&nbsp;&nbsp;" + state.text;
        }
      
        function movieFormatResult(movie) {
            var markup = "<table class='results'><tr>";
            
                markup += "<td productId='"+movie.id+"' >"+movie.text+"</td>";
            
            // if (movie.posters !== undefined && movie.posters.thumbnail !== undefined) {
            //     markup += "<td valign='top'><img src='" + movie.posters.thumbnail + "'/></td>";
            // }
            // markup += "<td valign='top'><h5>" + movie.title + "</h5>";
            // if (movie.critics_consensus !== undefined) {
            //     markup += "<div class='movie-synopsis'>" + movie.critics_consensus + "</div>";
            // } else if (movie.synopsis !== undefined) {
            //     markup += "<div class='movie-synopsis'>" + movie.synopsis + "</div>";
            // }
            markup += "</tr></table>"
            return markup;
        }

        function movieFormatSelection(movie) {
            return movie.text;
        }

        $(".select2_sample"+counter).select2({
            placeholder: "Αναζητήστε προϊόν ή κωδικό προϊόντος",
            minimumInputLength: 3,
            ajax: { // instead of writing the function to execute the request we use Select2's convenient helper
                url: "/azadmin/myproject/public/app/search/Product",
                allowClear: true,
                data: function (term, page) {
                    return {
                        q: term // search term
                    };
                },
                results: function(data){
                    var results = [];
                    for(var i = 0; i < data.length; ++i){
                        results.push({id: data[i].id, text: data[i].text});
                    }
                    return {results: results}
                }
            },
           
            formatResult: movieFormatResult, // omitted for brevity, see the source of this page
            formatSelection: movieFormatSelection, // omitted for brevity, see the source of this page
            dropdownCssClass: "bigdrop", // apply css that makes the dropdown taller
            escapeMarkup: function (m) {
                return m;
            } // we do not want to escape markup since we are displaying html in results
        }) .on("change", function(e) { 
            var selection = $(this);
            order = selection.parent().parent().attr('producttr');
            selection.parent().parent().attr('itemId', e.val);
            selection.parent().next().find('input').attr('itemId' , e.val);
            updateSingleCell(order , 'Order', 'productId', e.val);
            $.get("/azadmin/myproject/public/app/return/Product/"+e.val+"/true",function(data){
                console.log(data.slice(0,-4));
                dat = JSON.parse(data.slice(0,-4));
                console.log(dat);
                currentProdId = dat.id;
                selection.parent().find('.subtotal').text( dat.unitPrice + " €");
                selection.parent().next().next().next().text( dat.availableStock);
                selection.parent().parent().find('td').find('button').last().attr('onclick' , 'deleteProduct('+e.val+',"Order")');

                orderId = $("input[orderSelectInput]").first().attr('orderSelectInput');
                $.get("/azadmin/myproject/public/app/discount/"+currentProdId+"/"+orderId, function(data){
                    selection.parent().next().next().next().next().text( data+ " %");
                });
                $(".editAddDelete").attr('onclick' , "deleteProduct( "+order+",'Order' ,"+dat.id+") ");

            });
            // console.log("change "+JSON.stringify({val:e.val, added:e.added, removed:e.removed})); 
        });
        counter++;
    }

    return {
        //main function to initiate the module
        init: function () {            
            handleSelect2();
        }
    };

}();