;(function( $, window, document, undefined ) {

	

    $(document).ready(function() {
         if( $.fn.select2 ) {
            $("select.mws-select2").select2(data: {
    
      {title: "My shiny group", children: [
          {id: 1, title: "My shiny item"}, 
          {id: 2, title: "My shiny item2"}
      ]}
    ,{title: "My shiny group 2", children: [
          {id: 3, title: "My shiny item"}, 
          {id: 4, title: "My shiny item2"}
      ]},
    text: "title");
        }
        $("#mws-form-dialog").dialog({
                autoOpen: false,
                modal: true,
                width: "640"
            });		 
    });

}) (jQuery, window, document);