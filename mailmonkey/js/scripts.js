jQuery.noConflict()(function($){
	$('#navs').onePageNav({
	filter: ':not(.external)',
	scrollThreshold: 0.25,
	scrollOffset: 30
	});
	
    });
/* ---------- @ Scroll to Top -----------*/
jQuery.noConflict()(function($){
    // Scroll to top button
    var scrollTimeout;
    
    $('a.scroll-top').click(function(){
        $('html,body').animate({scrollTop:0},500);
        return false;
    });

    $(window).scroll(function(){
        clearTimeout(scrollTimeout);
        if($(window).scrollTop()>400){
            scrollTimeout = setTimeout(function(){$('a.scroll-top:hidden').fadeIn()},100);
        }
        else{
            scrollTimeout = setTimeout(function(){$('a.scroll-top:visible').fadeOut()},100);    
    }
    });
    
});
	
/* ---------- @ Flexslider -----------*/
jQuery.noConflict()(function($){
    $(window).load(function() {
      $('.flexslider').flexslider({
        animation: "fade",             //String: Select your animation type, "fade" or "slide"
        slideDirection: "horizontal",   //String: Select the sliding direction, "horizontal" or "vertical"
        slideshow: true,                //Boolean: Animate slider automatically
        slideshowSpeed: 7000,           //Integer: Set the speed of the slideshow cycling, in milliseconds
        animationDuration: 600,         //Integer: Set the speed of animations, in milliseconds
        directionNav: false,             //Boolean: Create navigation for previous/next navigation? (true/false)
        controlNav: true,               //Boolean: Create navigation for paging control of each clide? Note: Leave true for manualControls usage
        keyboardNav: true,              //Boolean: Allow slider navigating via keyboard left/right keys
        mousewheel: false,              //Boolean: Allow slider navigating via mousewheel
        prevText: "",           //String: Set the text for the "previous" directionNav item
        nextText: "",               //String: Set the text for the "next" directionNav item
        pausePlay: false,               //Boolean: Create pause/play dynamic element
        pauseText: '',             //String: Set the text for the "pause" pausePlay item
        playText: 'Play',               //String: Set the text for the "play" pausePlay item
        randomize: false,               //Boolean: Randomize slide order
        slideToStart: 0,                //Integer: The slide that the slider should start on. Array notation (0 = first slide)
        animationLoop: true,            //Boolean: Should the animation loop? If false, directionNav will received "disable" classes at either end
        pauseOnAction: true,            //Boolean: Pause the slideshow when interacting with control elements, highly recommended.
        pauseOnHover: false,            //Boolean: Pause the slideshow when hovering over slider, then resume when no longer hovering
        controlsContainer: "",          //Selector: Declare which container the navigation elements should be appended too. Default container is the flexSlider element. Example use would be ".flexslider-container", "#container", etc. If the given element is not found, the default action will be taken.
        manualControls: "",             //Selector: Declare custom control navigation. Example would be ".flex-control-nav li" or "#tabs-nav li img", etc. The number of elements in your controlNav should match the number of slides/tabs.
        start: function(){},            //Callback: function(slider) - Fires when the slider loads the first slide
        before: function(){},           //Callback: function(slider) - Fires asynchronously with each slider animation
        after: function(){},            //Callback: function(slider) - Fires after each slider animation completes
        end: function(){}
      });
    });
    });

/* ---------- @ Portfolio -----------*/
jQuery.noConflict()(function($){
$(window).load(function() {   
 $(function(){
      
      var $container = $('#portfolio');
      

                $container.isotope({
                  itemSelector : '.block',
                  layoutMode : 'masonry'
                  
                });
      
      
      var $optionSets = $('#options .option-set'),
          $optionLinks = $optionSets.find('a');

      $optionLinks.click(function(){
        var $this = $(this);
        // don't proceed if already selected
        if ( $this.hasClass('selected') ) {
          return false;
        }
        var $optionSet = $this.parents('.option-set');
        $optionSet.find('.selected').removeClass('selected');
        $this.addClass('selected');
  
        // make option object dynamically, i.e. { filter: '.my-filter-class' }
        var options = {},
            key = $optionSet.attr('data-option-key'),
            value = $this.attr('data-option-value');
        // parse 'false' as false boolean
        value = value === 'false' ? false : value;
        options[ key ] = value;
        if ( key === 'layoutMode' && typeof changeLayoutMode === 'function' ) {
          // changes in layout modes need extra logic
          changeLayoutMode( $this, options )
        } else {
          // otherwise, apply new options
          $container.isotope( options );
        }
        
        return false;
      });

         });
    });
});


/* ---------- @ Prettyphoto -----------*/
jQuery.noConflict()(function($){

    jQuery("a[data-rel^='prettyPhoto']").prettyPhoto({hook: 'data-rel'});
    jQuery('a[data-rel]').each(function() {
        jQuery(this).attr('rel', $(this).attr('data-rel')).removeAttr('data-rel');
    });
    

});


/* ---------- @ Client -----------*/    
jQuery.noConflict()(function($){
    $(window).load(function() {
        
        jQuery('#clients-scroll').carouFredSel({
          responsive  : true,
          items: {
              visible   : {
                min     : 1,
                max     : 4
              },
              width: 300,
            },
          scroll: 1,
          auto : {
              easing    : "linear",
              duration  : 1000,
              timeoutDuration: 4000,
              pauseOnHover: true
              },
          prev : "#clients-prev",
          next : "#clients-next",
          
        }); 
        
        });
    });
/* ---------- @ twitter -----------*/  
 jQuery.noConflict()(function($){
    $(window).load(function() {   
            // twitter feed
            $(".tweet").tweet({
					  modpath: 'twitter/',
                      username: "envato",
                      join_text: "auto",
                      avatar_size: 32,
                      count: 2,
                      auto_join_text_default: " we said, ", 
                      auto_join_text_ed: " we ",
                      auto_join_text_ing: " we were ",
                      auto_join_text_reply: " we replied to ",
                      auto_join_text_url: " we were checking out ",
                      loading_text: "loading tweets..."
            });

          });
    });

 /* ---------- @ GoogleMap ------*/
jQuery.noConflict()(function($){
            jQuery("#map-content").gMap({ address: "9930 124th Avenue Northeast Kirkland, Washington",
                zoom: 14,
                navigationControl: true, 
                maptype: "ROADMAP",
                draggable: false, zoomControl: false, scrollwheel: false, disableDragging: true,
                markers: [
                  { "address" : "9930 124th Avenue Northeast Kirkland, Washington" }
                ] }); 
             });

/* ---------- @ Ajax Contact Form ------*/
jQuery.noConflict()(function($){
 $(document).ready(function ()
{ 
  $('#submit').formValidator({
    scope: '#form'
  });
  
  $('#post-comment').formValidator({
    scope: '#comments-form'
  });
  
  $('#submit,#post-comment').click(function() {
        $('input.error-input, textarea.error-input').delay(300).animate({marginLeft:0},100).animate({marginLeft:10},100).animate({marginLeft:0},100).animate({marginLeft:10},100);
    });

  // Form plugin

  var options = {

    beforeSubmit: function() {
      $('.sending').show();

    },
    success: function() {
      $('.sending').hide();
      $('#form').hide();
      $(".mess").show().html('<h5>Thanks !</h5><h5>Your message has been sent.</h5>'); // Change Your message post send
      $('.mess').delay(3000).fadeOut(function() {

        $('#form').clearForm();
        $('#form').delay(3500).show();

      });
    }
  };
  

  $('#form').submit(function() {
    $(this).ajaxSubmit(options);
    return false;
  });
});
});