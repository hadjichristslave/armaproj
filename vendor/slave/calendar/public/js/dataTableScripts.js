;(function( $, window, document, undefined ) {

	

    $(document).ready(function() {
         if( $.fn.select2 ) {
            $("select.mws-select2").select2();
        }
        $("#mws-form-dialog").dialog({
                autoOpen: false,
                modal: true,
                width: "640"
            });		 
    });

}) (jQuery, window, document);