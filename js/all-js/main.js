/**
* Main Scripts File
* @author: Rachel Baker
*
* Place any jQuery/helper plugins in here.
*
* This file will be called automatically in the footer so as not to slow the page load.
**/
jQuery(document).ready(function($) {
    // load touchdown resposnive nav
    $('#site-navigation .menu').Touchdown();

    // check window size
    if (matchMedia) {
        var mq = window.matchMedia("(min-width: 769px)");
        mq.addListener(WidthChange);
        WidthChange(mq);
    }
    // load or hide horizontalNav depending on window width
    function WidthChange(mq) {
        if (mq.matches) {
        $('#site-navigation .menu').horizontalNav({});
         $('#site-navigation .menu').show();
         }
         else {
            $('#site-navigation .menu').hide();
         }
    }(window.jQuery)
});