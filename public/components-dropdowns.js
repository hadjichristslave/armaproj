var ComponentsDropdowns = function () {

    var handleSelect2 = function () {


        function format(state) {
            if (!state.id) return state.text; // optgroup
            return "<img class='flag' src='../../assets/global/img/flags/" + state.id.toLowerCase() + ".png'/>&nbsp;&nbsp;" + state.text;
        }
      
        function movieFormatResult(movie) {
            console.log('moveiFormatResults');
            console.log(movie);
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
            console.log('movie format selection');
            console.log(movie);
            return movie.text;
        }

        $("#select2_sample6").select2({
            placeholder: "Search for a movie",
            minimumInputLength: 3,
            ajax: { // instead of writing the function to execute the request we use Select2's convenient helper
                url: "/myproject/public/app/search/Product",
                data: function (term, page) {
                    return {
                        q: term // search term
                    };
                },
                results: function(data){
                    console.log(data);
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
        });
    }

    return {
        //main function to initiate the module
        init: function () {            
            handleSelect2();
        }
    };

}();