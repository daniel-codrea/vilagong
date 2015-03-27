'use strict';

$('#homepage-carousel').carousel({
    pause: false,
    interval: 4000
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