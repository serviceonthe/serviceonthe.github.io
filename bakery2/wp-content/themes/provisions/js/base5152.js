'use strict';

/**
 * Core
 *
 * @package WP Provisions
 * @subpackage JavaScript
 */

jQuery.noConflict();

(function($) {
	$(document).ready(function(){

		"use strict";

		$('.flexslider').resize();

		/*-----------------------------------------------------------------------------------*/
		/* Main Nav Setup */
		/*-----------------------------------------------------------------------------------*/

		$('#nav .sub-menu').before('<i class="icon-angle-down"></i>');
		
		var masthead_anim_to;

		$("ul.sub-menu").closest("li").addClass("drop");

		var masthead = $('#masthead'),
			masthead_h = masthead.height();
			masthead_anim_to = ($('body').hasClass('admin-bar')) ? '32px' : '0px';

		//TODO: Support CSS animation
		masthead.waypoint(function(direction) {
  			if(direction == 'down') {
  				masthead.css('top', '-'+masthead_h+'px').addClass('sticky').animate({'top': masthead_anim_to});
  			}
  			if(direction == 'up') {
  				masthead.removeClass('sticky').css('top', '');
  			}
		}, {
			offset: function() { return -$(this).height(); }
		});

		/*-----------------------------------------------------------------------------------*/
		/* Events Widget */
		/*-----------------------------------------------------------------------------------*/
		
		$('.widget_ct_events .events').cycle({ 
			fx:     'fade', 
			speed:  'fast', 
			timeout: 0, 
			next:   '.next.event-item', 
			prev:   '.prev.event-item' 
		});

		/*-----------------------------------------------------------------------------------*/
		/* Remove height/width from WP inserted images */
		/*-----------------------------------------------------------------------------------*/

		$('img').removeAttr('width').removeAttr('height');

		/*-----------------------------------------------------------------------------------*/
		/* Booking Modal Form */
		/*-----------------------------------------------------------------------------------*/

		$("#reservation br").remove();
		$("#cancel-reservation").text(function(index, text) {
	        return text.replace('Cancel reservation', 'Cancel');
        });
        $("#back-to-reservation").text(function(index, text) {
	        return text.replace('Back to reservation page', 'Back');
        });
        

		$(".book-now").click(function() {

	        $("#overlay").addClass('open');
			$('#persons').customSelect();

	    });

	    $(".close").click(function() {
	        $("#overlay").removeClass('open');
	    });

		/*-----------------------------------------------------------------------------------*/
		/* Add Zoom Class to Default WordPress Gallery */
		/*-----------------------------------------------------------------------------------*/

		$(".gallery-icon").addClass("zoom");

		/*-----------------------------------------------------------------------------------*/
		/* Remove Zoom Class from Woo Main Image */
		/*-----------------------------------------------------------------------------------*/

		$(".woocommerce-main-image").removeClass("zoom");

		/*-----------------------------------------------------------------------------------*/
		/* FitVids */
		/*-----------------------------------------------------------------------------------*/

		$("article").fitVids();

		/*-----------------------------------------------------------------------------------*/
		/* Symple Skillbar Shortcode */
		/*-----------------------------------------------------------------------------------*/

		$('.symple-skillbar').each(function(){
			$(this).find('.symple-skillbar-bar').animate({ width: $(this).attr('data-percent') }, 1500 );
		});

		/*-----------------------------------------------------------------------------------*/
		/* Initialize FitVids */
		/*-----------------------------------------------------------------------------------*/

		$(".container").fitVids();

		/*-----------------------------------------------------------------------------------*/
		/* Add class for prev/next icons */
		/*-----------------------------------------------------------------------------------*/

		$('.prev-next .nav-prev a').addClass('icon-arrow-left');
		$('.prev-next .nav-next a').addClass('icon-arrow-right');

		/*-----------------------------------------------------------------------------------*/
		/* Add Font Awesome Icon to Sitemap list */
		/*-----------------------------------------------------------------------------------*/

		$('.page-template-template-sitemap-php #main-content li a').before('<i class="icon-caret-right"></i>');

		/*-----------------------------------------------------------------------------------*/
		/* Isotope for portfolio filtering */
		/*-----------------------------------------------------------------------------------*/

		var $container = $('#isotope-container');

		// filter items when filter link is clicked
		$('#tags-filter a').click(function(e){
			e.preventDefault();
			var t = $(this);

			if(!t.hasClass('selected')) {
				var selector = t.attr('data-filter');
				$container.isotope({ filter: selector });
				$('#tags-filter a').removeClass('selected');
				t.addClass('selected');
			}
		});

		function wocPortfolioIsotope() {
            $container.imagesLoaded( function(){
                $container.isotope({
                    itemSelector: '.item',
                    layoutMode: 'sloppyMasonry',
                    animationOptions: {
                        duration: 400,
                        easing: 'swing',
                        queue: false
                    }
                });
            });
		}

        wocPortfolioIsotope();

		// Orientation change
		if (window.addEventListener) {
			window.addEventListener("orientationchange", function() {
				$container.isotope("reLayout");
			});
		}

		/*-----------------------------------------------------------------------------------*/
		/* Add margin right 0 isotope items */
		/*-----------------------------------------------------------------------------------*/

         $(".post-type-archive .grid li:nth-child(3n+3)").css("margin-right", "0");

         $(".page-template-demotemplate-4col-portfolio-php .grid li:nth-child(4n+4)").css("margin-right", "0");

         $(".page-template-demotemplate-2col-portfolio-php .grid li:nth-child(2n+2)").css("margin-right", "0");

		/*-----------------------------------------------------------------------------------*/
		/* Add last class to every fourth related portfolio item */
		/*-----------------------------------------------------------------------------------*/

		$(".single-portfolio .grid li:nth-child(4n+4)").css("margin-right", "0");

		/*-----------------------------------------------------------------------------------*/
		/* Add last class to every third related item, and every second testimonial */
		/*-----------------------------------------------------------------------------------*/

		$("li.related:nth-child(3n+3), .testimonial-home li:nth-child(2n+1)").addClass("last");

		/*-----------------------------------------------------------------------------------*/
		/* Add last class to footer widgets */
		/*-----------------------------------------------------------------------------------*/

		$("#latest-shoots li:nth-child(4n)").addClass("omega");

		/*-----------------------------------------------------------------------------------*/
		/* Search Bar Expansion */
		/*-----------------------------------------------------------------------------------*/

		var sbar = $('#search-bar'),
			search_input = $('#search-input');

		function toggle_search_bar() {
				if(!$(window).data('search-open')){
					sbar.show().animate({'height': '52px'}, 'fast');
					search_input.focus();
					$(window).data('search-open', true);
				} else {
					sbar.animate({'height': '0px'}, 'fast', function(){ sbar.hide(); });
					$(window).data('search-open', false);
				}
			}

			$('#activate-search, #search-close').click(function(e){
				e.preventDefault();
				toggle_search_bar();
			});
		});

})(jQuery);

/*-----------------------------------------------------------------------------------*/
/* Social Popups */
/*-----------------------------------------------------------------------------------*/

function popup(pageURL,title,w,h) {
	var left = (screen.width/2)-(w/2);
	var top = (screen.height/2)-(h/2);
	var targetWin = window.open (pageURL, title, 'toolbar=no, location=no, directories=no, status=no, menubar=no, scrollbars=no, resizable=no, copyhistory=no, width='+w+', height='+h+', top='+top+', left='+left);
}

function validateEmail(email) { 
    var re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    return re.test(email);
} 
