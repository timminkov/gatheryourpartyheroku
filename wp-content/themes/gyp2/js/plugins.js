// Avoid `console` errors in browsers that lack a console.
(function() {
    var method;
    var noop = function () {};
    var methods = [
        'assert', 'clear', 'count', 'debug', 'dir', 'dirxml', 'error',
        'exception', 'group', 'groupCollapsed', 'groupEnd', 'info', 'log',
        'markTimeline', 'profile', 'profileEnd', 'table', 'time', 'timeEnd',
        'timeStamp', 'trace', 'warn'
    ];
    var length = methods.length;
    var console = (window.console = window.console || {});

    while (length--) {
        method = methods[length];

        // Only stub undefined methods.
        if (!console[method]) {
            console[method] = noop;
        }
    }
}());

// jQuery/helper plugins in here.

// Search/submit 

$(document).ready(function() {

    $("#header-search").hide();

    $("#search-button").click(function() {
        $("#header-nav").slideUp(400);
        $("#header-search").slideDown(400);
        $("#search-box").focus();   
    });

    $('#submit').click(function() {
      $(this).val('Sending...');
    });

});

// Set full-width images to actually be full-width
// If you can think of a better way to do this, please
// contribute your fixes BACK IN TIME TO SEPTEMBER 6TH 2013 THANKS

$(window).resize(function(){
    $(".size-full").width($(window).width());
    var left_gutter = -1*(($(window).width() - $('#single-article').width() ) / 2);
    $(".size-full").css("margin-left", left_gutter);

// This should happen right when the page loads yo

}).resize();

// Jump to page button

var root = location.protocol + '//' + location.host;

$(document).ready(function() {
     $('#jump-to-page-form').submit( function() {              
          goUrl = root + '/page/' + $('#jump-to-page').val().toLowerCase();
          window.location = goUrl;
          return false;  // Prevent the default form behaviour
     });
});

// keep stream aspect ratio at 4:3

$(window).resize(function(){
    $('#video-stream').height($('.stream').width()*0.75);

}).resize();

// Smooth scrolling to anchors. With a capital 'smoo'

$(function() {
  $('a[href*=#]:not([href=#])').click(function() {
    if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') && location.hostname == this.hostname) {
      var target = $(this.hash);
      target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
      if (target.length) {
        $('html,body').animate({
          scrollTop: target.offset().top
        }, 1000);
        return false;
      }
    }
  });
});