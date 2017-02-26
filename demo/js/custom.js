(function($) {
 "use strict"

	// DM Top
	jQuery(window).scroll(function(){
		if (jQuery(this).scrollTop() > 1) {
			jQuery('.dmtop').css({bottom:"25px"});
		} else {
			jQuery('.dmtop').css({bottom:"-100px"});
		}
	});
	jQuery('.dmtop') .on("click",function() {
		jQuery('html, body').animate({scrollTop: '0px'}, 800);
		return false;
	});
	
	// Page Preloader
	$(window).load(function() {
		$(".loader").delay(300).fadeOut();
		$(".animationload").delay(600).fadeOut("slow");
	});

	// Count
        function count($this){
        var current = parseInt($this.html(), 10);
        current = current + 1; /* Where 50 is increment */    
        $this.html(++current);
            if(current > $this.data('count')){
                $this.html($this.data('count'));
            } else {    
                setTimeout(function(){count($this)}, 50);
            }
        }            
        $(".stat-count").each(function() {
          $(this).data('count', parseInt($(this).html(), 10));
          $(this).html('0');
          count($(this));
        });
		
// TOOLTIP
    $('.social-icons, .bs-example-tooltips').tooltip({
      selector: "[data-toggle=tooltip]",
      container: "body"
    })

// RIGHT MENU
	$("#showbutton") .on("click",function() {
		$('#slidediv').toggle('slide', { direction: 'right' }, 500);
	});
	$("#hidebutton") .on("click",function() {
		$("#slidediv").hide( "slide", { direction: "right"  }, 500 );
	});

// HEADER MENU
   // Add slideup & fadein animation to dropdown
   // $('.dropdown').on('show.bs.dropdown', function(e){
   //    var $dropdown = $(this).find('.dropdown-menu');
   //    var orig_margin_top = parseInt($dropdown.css('margin-top'));
   //    $dropdown.css({'margin-top': (orig_margin_top + 10) + 'px', opacity: 0}).animate({'margin-top': orig_margin_top + 'px', opacity: 1}, 250, function(){
   //       $(this).css({'margin-top':''});
   //    });
   // });
   // Add slidedown & fadeout animation to dropdown
   // $('.dropdown').on('hide.bs.dropdown', function(e){
   //    var $dropdown = $(this).find('.dropdown-menu');
   //    var orig_margin_top = parseInt($dropdown.css('margin-top'));
   //    $dropdown.css({'margin-top': orig_margin_top + 'px', opacity: 1, display: 'block'}).animate({'margin-top': (orig_margin_top + 10) + 'px', opacity: 0}, 250, function(){
   //       $(this).css({'margin-top':'', display:''});
   //    });
   // });

	$("#header-container").affix({
		offset: {
			top: 100, 
			bottom: function () {
			return (this.bottom = $('#copyrights').outerHeight(true))
			}
		}
	})
	
// Parallax
	$(window) .on('bind','body', function() {
		parallaxInit();
	});
	function parallaxInit() {
		$('.fullscreen').parallax("30%", 0.1);
		$('#two-parallax').parallax("30%", 0.1);
		$('#three-parallax').parallax("30%", 0.1);
		$('#four-parallax').parallax("30%", 0.4);
		$('#five-parallax').parallax("30%", 0.4);
		$('#six-parallax').parallax("30%", 0.4);
		$('#seven-parallax').parallax("30%", 0.4);
	}

// wow
var wow = new WOW(
  {
    boxClass:     'wow',      // animated element css class (default is wow)
    animateClass: 'animated', // animation css class (default is animated)
    offset:       100,          // distance to the element when triggering the animation (default is 0)
    mobile:       true,       // trigger animations on mobile devices (default is true)
    live:         true        // act on asynchronously loaded content (default is true)
  }
);
wow.init();
	
// Accordion Toggle Items
   var iconOpen = 'fa fa-minus',
        iconClose = 'fa fa-plus';

    $(document).on('show.bs.collapse hide.bs.collapse', '.accordion', function (e) {
        var $target = $(e.target)
          $target.siblings('.accordion-heading')
          .find('em').toggleClass(iconOpen + ' ' + iconClose);
          if(e.type == 'show')
              $target.prev('.accordion-heading').find('.accordion-toggle').addClass('active');
          if(e.type == 'hide')
              $(this).find('.accordion-toggle').not($target).removeClass('active');
    });
	

	
})(jQuery);


$(document).ready(function(){
    $('ul.nav li.dropdown').hover(function() {
      $(this).find('.dropdown-menu').stop(true, true).delay(300).fadeIn(300);
    }, function() {
      $(this).find('.dropdown-menu').stop(true, true).delay(100).fadeOut(100);
    });  
});