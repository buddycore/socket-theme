jQuery(document).ready(function($) {
    "use strict";

    var autocomplete_terms = JSON.parse( yourtheme_autocomplete.autocomplete );


    $('#s').autocomplete({
        source: autocomplete_terms,
        minLength: 1
    });

});