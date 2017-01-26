  $(function($){

"use strict";     

/*
|----------------------------------------------------------------------------
| TESTIMONIAL CAROUSEL
|----------------------------------------------------------------------------
*/
  $("#testimonial-carousel").owlCarousel({
    navigation : true, // Show next and prev buttons
    slideSpeed : 300,
    paginationSpeed : 400,
    singleItem:true,
    pagination: false,
    navigationText: ['<img src="./images/slider/arrow/angle-left.png" />', '<img src="./images/slider/arrow/angle-right.png" />'] 
  });

/*
|----------------------------------------------------------------------------
| MAIN SLIDER
|----------------------------------------------------------------------------
*/
  var mainslider; 
  mainslider = jQuery("#rev_slider_1").revolution({
    sliderType:"standard",
    sliderLayout:"fullwidth",
    responsiveLevels:[2400,1400,1024,768],
    delay:9000,
     navigation: {
        keyboardNavigation: "on",
        keyboard_direction: "horizontal",
        mouseScrollNavigation: "off",
        onHoverStop: "off",
        touch: {
            touchenabled: "on",
            swipe_threshold: 75,
            swipe_min_touches: 1,
            swipe_direction: "horizontal",
            drag_block_vertical: false
        },
        arrows: {
            style: "persephone",
            enable: true,
            hide_onmobile: true,
            hide_onleave: true,
            tmp: '',
            left: {
                h_align: "left",
                v_align: "center",
                h_offset: 50,
                v_offset: 0
            },
            right: {
                h_align: "right",
                v_align: "center",
                h_offset: 50,
                v_offset: 0
            }
        },
        bullets: {
            enable: true,
            hide_onmobile: false,
            style: "persephone",
            hide_onleave: false,
            direction: "horizontal",
            h_align: "center",
            v_align: "middle",
            h_offset: 0,
            v_offset: 70,
            space: 15,
            tmp: ''
        }
    },      
    gridwidth:[1140,1140,750,320],
    gridheight:[990,800,600,400]
  });

/*
|----------------------------------------------------------------------------
| TEAM SLIDER
|----------------------------------------------------------------------------
*/
var revapi; 
  revapi = jQuery("#rev_slider_2").revolution({
    sliderType:"standard",
    sliderLayout:"fullwidth",
    responsiveLevels:[4096,1400,992,768],
    delay:9000,
    navigation: {
      touch:{
        touchenabled:"on",
        swipe_threshold: 75,
        swipe_min_touches: 1,
        swipe_direction: "horizontal",
        drag_block_vertical: false
      },
      arrows:{
        enable:true
      },
      thumbnails: {
          style: "circle",
          enable: true,
          width: 120,
          height: 120,
          min_width: 100,
          wrapper_padding: 5,
          wrapper_color: "transparent",
          wrapper_opacity: "1",
          tmp: '<span class="tp-thumb-img-wrap">  <span class="tp-thumb-image"></span></span>',
          visibleAmount: 3,
          hide_onmobile: true,
          hide_onleave: false,
          direction: "horizontal",
          span: false,
          position: "inner",
          space: 60,
          h_align: "center",
          v_align: "bottom",
          h_offset: 250,
          v_offset: 50
      }    
    },      
    gridwidth:[1140,992,750,320],
    gridheight:[800,800,600,500]    
  });


/*
|----------------------------------------------------------------------------
|   COUNTERUP JS
|----------------------------------------------------------------------------
*/
$('.counter').counterUp({
    delay: 10,
    time: 1000
});


}(jQuery));



						
					
						
				