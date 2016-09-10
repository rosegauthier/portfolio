$(function(){

    $('.hamburger').on('click', function(){
        $('.hamburger').toggleClass('open');
        $('.menu').slideToggle('active');
        $('.hamburger').toggleClass('toggle-color');
    });

    $('.nav-bar a').on('click', function() {
      $('.hamburger').toggleClass('open');
      $('.menu').slideToggle('active');
      $('.hamburger').toggleClass('toggle-color');
    });

    var logoBkg = wpPath + '/images/wallpaper.jpg';

	// create svg drawing
    var draw = SVG('drawing');


    // create image
    var image = draw.image(logoBkg);
    image.size(60, 60).y(0);

    // create text
    var text = draw.text('RG').move(30, 10)
    text.font({
      family: '"Josefin Sans", sans-serif'
    , weight: 700 
    , size: 40
    , anchor: 'middle'
    , leading: 1
    });

    // clip image with text
    image.clipWith(text);


    var drawTwo = SVG('drawing-2');

    var imageTwo = drawTwo.image(logoBkg);
    imageTwo.size(60, 60).y(0);

    var textTwo = drawTwo.text('RG').move(30, 10)
    textTwo.font({
      family: '"Josefin Sans", sans-serif'
    , weight: 700 
    , size: 40
    , anchor: 'middle'
    , leading: 1
    });

    imageTwo.clipWith(textTwo);


    //wordpress theme sliding image

    $('.code-wrapper').on( "mousemove", function(e) {
      var offsets = $(this).offset();
      var fullWidth = $(this).width();
      var mouseX = e.pageX - offsets.left;
     
      if (mouseX < 0) { mouseX = 0; }
      else if (mouseX > fullWidth) { mouseX = fullWidth }
     
     
      $(this).parent().find('.divider-bar').css({
        left: mouseX,
        transition: 'none'
      });
      $(this).find('.design-wrapper').css({
        transform: 'translateX(' + (mouseX) + 'px)',
        transition: 'none'
      });
      $(this).find('.design-image').css({
        transform: 'translateX(' + (-1*mouseX) + 'px)',
        transition: 'none'
      });
    });
    $('.divider-wrapper').on( "mouseleave", function() {
      $(this).parent().find('.divider-bar').css({
        left: '50%',
        transition: 'all .3s'
      });
      $(this).find('.design-wrapper').css({
        transform: 'translateX(50%)',
        transition: 'all .3s'
      });
      $(this).find('.design-image').css({
        transform: 'translateX(-50%)',
        transition: 'all .3s'
      });
    });



    // Smooth Scroll Effect
    $('a[href*="#"]:not([href="#"])').click(function() {
    if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') && location.hostname == this.hostname) {
      var target = $(this.hash);
      target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
      if (target.length) {
        $('html, body').animate({
          scrollTop: target.offset().top
        }, 1000);
        return false;
      }
    }
    });

    // Back to Top
    $('#scroll').click(function(){ 
        $("html, body").animate({ scrollTop: 0 }, 600); 
        return false; 
    }); 

});