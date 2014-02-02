;(function( $, window, document, undefined ) {

	

    $(document).ready(function() {
         if( $.fn.select2 ) {
            $("select.mws-select2").select2({
                var select2Options = {
              data: {
                results: [
                  {title: "My shiny group", children: [
                      {id: 1, title: "My shiny item"}, 
                      {id: 2, title: "My shiny item2"}
                  ]}
                ],
                text: "title"
              }
            };
                
            });
        }
        $("#mws-form-dialog").dialog({
                autoOpen: false,
                modal: true,
                width: "640"
            });		 
    });

}) (jQuery, window, document);