/**
* Main Scripts File
* @author: Rachel Baker
*
* Place any jQuery/helper plugins in here.
*
* This file will be called automatically in the footer so as not to slow the page load.
**/
/*! A fix for the iOS orientationchange zoom bug.
 Script by @scottjehl, rebound by @wilto.
 MIT / GPLv2 License.
*/
(function(w){

    // This fix addresses an iOS bug, so return early if the UA claims it's something else.
    var ua = navigator.userAgent;
    if( !( /iPhone|iPad|iPod/.test( navigator.platform ) && /OS [1-5]_[0-9_]* like Mac OS X/i.test(ua) && ua.indexOf( "AppleWebKit" ) > -1 ) ){
        return;
    }

    var doc = w.document;

    if( !doc.querySelector ){ return; }

    var meta = doc.querySelector( "meta[name=viewport]" ),
        initialContent = meta && meta.getAttribute( "content" ),
        disabledZoom = initialContent + ",maximum-scale=1",
        enabledZoom = initialContent + ",maximum-scale=10",
        enabled = true,
        x, y, z, aig;

    if( !meta ){ return; }

    function restoreZoom(){
        meta.setAttribute( "content", enabledZoom );
        enabled = true;
    }

    function disableZoom(){
        meta.setAttribute( "content", disabledZoom );
        enabled = false;
    }

    function checkTilt( e ){
        aig = e.accelerationIncludingGravity;
        x = Math.abs( aig.x );
        y = Math.abs( aig.y );
        z = Math.abs( aig.z );

        // If portrait orientation and in one of the danger zones
        if( (!w.orientation || w.orientation === 180) && ( x > 7 || ( ( z > 6 && y < 8 || z < 8 && y > 6 ) && x > 5 ) ) ){
            if( enabled ){
                disableZoom();
            }
        }
        else if( !enabled ){
            restoreZoom();
        }
    }

    w.addEventListener( "orientationchange", restoreZoom, false );
    w.addEventListener( "devicemotion", checkTilt, false );

})( this );
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