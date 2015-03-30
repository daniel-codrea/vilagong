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

$('.nav a').on('click', function(){
    $('.navbar-toggle').click();
});

 function cbpAnimatedHeader() {
    var docElem = document.documentElement,
      didScroll = false,
      changeHeaderOn = 300;
    function init() {
      window.addEventListener( 'scroll', function( ) {
        if( !didScroll ) {
          didScroll = true;
          setTimeout( scrollPage, 250 );
        }
      }, false );
    }
    function scrollPage() {
      var sy = scrollY();
      if ( sy >= changeHeaderOn ) {
        $( '.navbar-default' ).addClass('navbar-shrink' );
      }
      else {
        $( '.navbar-default' ).removeClass('navbar-shrink' );
      }
      didScroll = false;
    }
    function scrollY() {
      return window.pageYOffset || docElem.scrollTop;
    }
    init();
  }
  
  cbpAnimatedHeader();