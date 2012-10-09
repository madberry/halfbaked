/**
* Plugins Script File
* @author: Rachel Baker
*
* Imports all jQuery plugin files prefixed with _ in same folder
*
* This file will be called automatically in the footer so as not to slow the page load.
*
*/
// Avoid `console` errors in browsers that lack a console.
if (!(window.console && console.log)) {
    (function() {
        var noop = function() {};
        var methods = ['assert', 'clear', 'count', 'debug', 'dir', 'dirxml', 'error', 'exception', 'group', 'groupCollapsed', 'groupEnd', 'info', 'log', 'markTimeline', 'profile', 'profileEnd', 'markTimeline', 'table', 'time', 'timeEnd', 'timeStamp', 'trace', 'warn'];
        var length = methods.length;
        var console = window.console = {};
        while (length--) {
            console[methods[length]] = noop;
        }
    }());
}

//@codekit-append "_touchdown.js"
//@codekit-append "_horizontalNav.js"