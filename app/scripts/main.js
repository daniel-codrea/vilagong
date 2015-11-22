'use strict';

$('#homepage-carousel').carousel({
    pause: false,
    interval: 4000000
});

$('#homepage-carousel .carousel-inner div.item img').each(function() {
  var imgSrc = $(this).attr('src');
  $(this).next('.image-container').css({
    'position': 'absolute',
    'width': '100%',
    'height': '100%',
    'background': 'url('+imgSrc+') center center no-repeat',
    'background-size': 'cover',
    'z-index': '10'
  });
  $(this).remove();
});

$(function() {
    $('a.jumpLink').click(function() {
        if (location.pathname.replace(/^\//,'') === this.pathname.replace(/^\//,'') && location.hostname === this.hostname) {
            var target = $(this.hash);
            target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
            if (target.length) {
                $('html,body').animate({
                    scrollTop: (target.offset().top)
                }, 1000);
                return false;
            }
        }
    });
});

var cbpAnimatedHeader = (function() {
    var docElem = document.documentElement,
        header = document.querySelector( '.navbar-default' ),
        didScroll = false,
        changeHeaderOn = 300;
    function init() {
        window.addEventListener( 'scroll', function( event ) {
            if( !didScroll ) {
                didScroll = true;
                setTimeout( scrollPage, 250 );
            }
        }, false );
    }
    function scrollPage() {
        var sy = scrollY();
        if ( sy >= changeHeaderOn ) {
            $('.navbar').addClass('navbar-shrink' );
        }
        else {
            $('.navbar').removeClass('navbar-shrink' );
        }
        didScroll = false;
    }
    function scrollY() {
        return window.pageYOffset || docElem.scrollTop;
    }
    init();
})();


$('.navbar-nav li a').click(function(event) {
    $('.navbar-collapse').collapse('hide');
});
$('#mainNavigation').on('shown.bs.collapse', function(){
    $('#mainNavigation').addClass('navbar-mobile');
});
$('#mainNavigation').on('hidden.bs.collapse', function(){
    $('#mainNavigation').removeClass('navbar-mobile');
});
$('.custom-tab-nav').on('click', function(){
    var target = $(this).data('target');
    $('.nav-pills a[href="#' + target + '"]').tab('show');
});

var date = new Date();
var currentYear = date.getFullYear();
$('#currentYear').html(currentYear);

$('.sightseeing-text').enscroll({
    addPaddingToPane: false,
    propagateWheelEvent: false
});