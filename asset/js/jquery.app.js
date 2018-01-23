jQuery(document).ready(function($){

    // UDPATE CNAV
    $('ul.primary li a span, ul.buddypress li a span.toggle, ul.categories li a span, ul.product-categories li a span, ul.sub-level li a span').cenav();

    $('ul.primary, ul.buddypress, ul.categories, ul.product-categories, ul.top-level').on('click', function(e){
        
        e.stopPropagation();
        
    });

    $('html').on('click', function(e){
        
        $('.close, .active').removeClass('close active');

    });

    $('button.toggle-filter').on('click', function(){

        $(this).toggleClass('close').next('ul').toggleClass('active');

    });
    // END CNAV UPDATE

    $(".widget-content").mCustomScrollbar();
});