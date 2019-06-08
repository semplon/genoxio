jQuery ( function($) {

    $('.woocommerce-tabs > .x-nav > .x-nav-tabs-item > a').on('click', function() {
    
    var index = $(this).data( 'cs-tab-toggle' );
    
    setTimeout( function() {
    $( '.woocommerce-tabs > .x-tab-content > div[data-cs-tab-index="' + index + '"] .x-nav > .x-nav-tabs-item:first-child a' ).trigger('click');
    }, 200 );
    
    } );
    
    $( document ).ready ( function() {
    
    $('.woocommerce-tabs > .x-nav > .x-nav-tabs-item:first-child > a').trigger('click');
    
    } );
    
} );