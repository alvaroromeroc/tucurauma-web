                           

(function ($) { "use strict";
	
/* ========================================================================= */
/*	Page Preloader
/* ========================================================================= */

// window.load = function () {
// 	document.getElementById('preloader').style.display = 'none';
// }

$(window).on("load",function(){
    $('#preloader').fadeOut('slow',function(){$(this).remove();});
});









/* ========================================================================= */
/*	Testimonial Carousel
/* =========================================================================  */

//Init the slider
$('.testimonial-slider').slick({
    slidesToShow: 3,
    slidesToScroll: 1,
    infinite: true,
    dots:true,
    arrows:false,
    autoplay: true,
      autoplaySpeed: 2000,
      responsive: [
        {
          breakpoint: 600,
          settings: {
            slidesToShow: 1,
            slidesToScroll: 2
          }
        },
        {
          breakpoint: 480,
          settings: {
            slidesToShow: 1,
            slidesToScroll: 1
          }
        }
      ]
});


/* ========================================================================= */
/*	Clients Slider Carousel
/* =========================================================================  */





/* ========================================================================= */
/*	Awars Counter Js
/* =========================================================================  */





/* ========================================================================= */
/*   Contact Form Validating
/* ========================================================================= */




/* ========================================================================= */
/*	Header Scroll Background Change
/* ========================================================================= */	


})(jQuery);


google.maps.event.addDomListener(window, 'load', initialize);