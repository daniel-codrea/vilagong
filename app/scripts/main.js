'use strict';

$('#homepage-carousel').carousel({
    pause: "false",
    interval: 400000
});

$('#homepage-carousel .item').css({'position': 'absolute', 'width': '100%', 'height': '100%'});
$('#homepage-carousel .carousel-inner div.item img').each(function() {
  var imgSrc = $(this).attr('src');
  $(this).next('.image-container').css({'position': 'absolute', 'width': '100%', 'height': '100%', 'background': 'url('+imgSrc+') center center no-repeat', '-webkit-background-size': '100% ', '-moz-background-size': '100%', '-o-background-size': '100%', 'background-size': '100%', '-webkit-background-size': 'cover', '-moz-background-size': 'cover', '-o-background-size': 'cover', 'background-size': 'cover', 'z-index': '10'});
  $(this).remove();
});

$(window).on('resize', function() {
  $('#homepage-carousel').css({'width': '100%', 'height': '100%'});
});

$(function() {
    $('a[href*=#]:not([href=#], .noJumpLink)').click(function() {
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
  $('.nav a').on('click', function(){
    $('.nav li').removeClass('active');
    $(this).parent().addClass('active');
  });
});