(function($) {
    "use strict";
	
/* sticky header */
/* --------------------------------------------------------------------- */
jQuery(window).scroll(function(){
		if (jQuery(this).scrollTop() > 40){
			jQuery('body').addClass("sticky-for-body");
			jQuery('header').addClass("sticky-for-header");
			jQuery('header .toolbar').addClass('toolbar_hidden');
		}else{
			jQuery('body').removeClass("sticky-for-body");
			jQuery('header').removeClass("sticky-for-header");
			jQuery('header .toolbar').removeClass('toolbar_hidden');
		}
	});
/* --------------------------------------------------------------------- */

/*	Scroll to top
/* ---------------------------------------------------------------------- */
  jQuery(document).ready(function(){ 
 
        jQuery(window).scroll(function(){
            if (jQuery(this).scrollTop() > 100) {
                jQuery('.scroll-up').fadeIn();
            } else {
                jQuery('.scroll-up').fadeOut();
            }
        }); 
 
        jQuery('.scroll-up').click(function(){
            jQuery("html, body").animate({ scrollTop: 0 }, 800);
            return false;
        });
 
    });
/* --------------------------------------------------------------------- */

/* For Tooltips 
/* ---------------------------------------------------------------------- */
jQuery(function () {
        jQuery(".tooltip-top").tooltip({
            placement : 'top'
        });
        jQuery(".tooltip-right").tooltip({
            placement : 'right'
        });
        jQuery(".tooltip-bottom").tooltip({
            placement : 'bottom'
        });
        jQuery(".tooltip-left").tooltip({
            placement : 'left'
        });
});

/* Popovers
/* ---------------------------------------------------------------------- */
jQuery(function () {
    jQuery("[data-toggle=popover]") 
    .popover() 
});
/* --------------------------------------------------------------------- */

/* for Mega Menu
/* ---------------------------------------------------------------------- */
jQuery(function() {
        window.prettyPrint && prettyPrint()
        jQuery(document).on('click', '.megamenu .dropdown-menu', function(e) {
          e.stopPropagation()
        })
      });
/* --------------------------------------------------------------------- */

/* For dropdown menus on hover rather than click 
/* ------------------------------------------------------------- */
jQuery(document).ready(function() {
    jQuery('.nav li.dropdown').hover(function() {
        jQuery(this).addClass('open');
    }, function() {
        jQuery(this).removeClass('open');
    });
});

/* ------------------------------------------------------------- */

/* FAQ with Categories
/* ------------------------------------------------------------- */
jQuery(document).ready(function() {
    jQuery('.collapse').on('show.bs.collapse', function() {
        var id = jQuery(this).attr('id');
        jQuery('a[href="#' + id + '"]').closest('.panel-heading').addClass('active-faq');
        jQuery('a[href="#' + id + '"] .panel-title span').html('<i class="glyphicon glyphicon-minus"></i>');
    });
    jQuery('.collapse').on('hide.bs.collapse', function() {
        var id = jQuery(this).attr('id');
        jQuery('a[href="#' + id + '"]').closest('.panel-heading').removeClass('active-faq');
        jQuery('a[href="#' + id + '"] .panel-title span').html('<i class="glyphicon glyphicon-plus"></i>');
    });
});
/* ------------------------------------------------------------- */

/* Shop List Grid View
/* ---------------------------------------------- */
jQuery(document).ready(function() {
    jQuery('#list').click(function(event){event.preventDefault();jQuery('#products .item').addClass('list-group-item');});
    jQuery('#grid').click(function(event){event.preventDefault();jQuery('#products .item').removeClass('list-group-item');jQuery('#products .item').addClass('grid-group-item');});
});
/* ---------------------------------------------- */

/* Stop carousel
/* ---------------------------------------------- */
jQuery(document).ready(function() {
  jQuery('.carousel').carousel({
	interval: false
  });
});
/* ---------------------------------------------- */

/* Tooltip for Timeline
/* ---------------------------------------------- */
jQuery(document).ready(function(){
    var my_posts = jQuery("[rel=tooltip]");
	var i;
    for(i=0;i<my_posts.length;i++){
        the_post = jQuery(my_posts[i]);
        if(the_post.hasClass('invert')){
            the_post.tooltip({ placement: 'left'});
            the_post.css("cursor","pointer");
        }else{
            the_post.tooltip({ placement: 'right'});
            the_post.css("cursor","pointer");
        }
    }
});
/* ---------------------------------------------- */

/* Animation Css Class
/* ---------------------------------------------- */
jQuery(document).ready(function(){
    var wow = new WOW(
      {
        animateClass: 'animated',
        offset:       100,
        callback:     function(box) {
          console.log("WOW: animating <" + box.tagName.toLowerCase() + ">")
        }
      }
    );
    wow.init();
});
/* ---------------------------------------------- */
jQuery(document).ready(function(){
  
  var base_url = "http://vitactive.co.uk/admin/index.php/"; 
  // var base_url = "http://localhost/sow/vitactive/admin/index.php/"; 
  
  $("#investor-submit").click(function(event) {
      /* stop form from submitting normally */
      event.preventDefault();

      var v = grecaptcha.getResponse();
      if(v.length == 0)
      {
          document.getElementById('captcha').innerHTML="You can't leave Captcha Code empty";
          return false;
      }else{
        document.getElementById('captcha').innerHTML="";
          /* get the action attribute from the <form action=""> element */
          var $form = $( this ),
              url = base_url + "welcome/investor_contact";

          /* Send the data using post with element id name and name2*/
          var posting = $.post( url, { 
            title: $('#title').val(), 
            first_name: $('#firstName').val(), 
            last_name: $('#lastName').val(), 
            email: $('#email').val(),
            how_did_you_hear: $('#howDidYouHearAbout').val(), 
            preferred_call_time: $('#preferredCallTime').val(),
            land_line_contact: $('#landLineContact').val(),
            mobile_number: $('#mobileNumber').val(),
            'g-recaptcha-response': v
          });

          /* Alerts the results */
          posting.done(function( data ) {
            console.log(data); 
            data = JSON.parse(data); 
              alert(data.message); 
              if (data.status){
                document.location.href="/";
              }
          });
        
      }
      });


  $("#contactus-form").submit(function(event) {

      /* stop form from submitting normally */
      event.preventDefault();

      var v = grecaptcha.getResponse();
      if(v.length == 0)
      {
          document.getElementById('captcha').innerHTML="You can't leave Captcha Code empty";
          return false;
      }else{
        document.getElementById('captcha').innerHTML="";
          /* get the action attribute from the <form action=""> element */
          var $form = $( this ),
              url = base_url + "welcome/contact_us";

          /* Send the data using post with element id name and name2*/
          var posting = $.post( url, { 
            first_name: $('#contact-first-name').val(), 
            last_name: $('#contact-last-name').val(), 
            email: $('#contact-email').val(),
            message: $('#contact-message').val(), 
            newsletter: $('#contact-newsletter').val(),
            'g-recaptcha-response': v
          });

          /* Alerts the results */
          posting.done(function( data ) {
            console.log(data); 
            data = JSON.parse(data); 
              alert(data.message); 
              if (data.status){
                document.location.href="/";
              }
          });
        
      }
      });

/* attach a submit handler to the form */
    $("#contact-form-1").submit(function(event) {

      /* stop form from submitting normally */
      event.preventDefault();

      /* get the action attribute from the <form action=""> element */
      var $form = $( this ),
          url = base_url + "welcome/subscribe";

      /* Send the data using post with element id name and name2*/
      var posting = $.post( url, { name: $('#user-name').val(), email: $('#user-email').val() } );

      /* Alerts the results */
      posting.done(function( data ) {
        data = JSON.parse(data); 
          alert(data.message); 
          if (data.status){
            document.location.href="/";
          }
      });
    });

    $("#newsletter-unsubscription-form").submit(function(event) {

      /* stop form from submitting normally */
      event.preventDefault();

      /* get the action attribute from the <form action=""> element */
      var $form = $( this ),
          url = base_url + "welcome/unsubscribe";

      /* Send the data using post with element id name and name2*/
      var posting = $.post( url, { email: $('#email').val() } );

      /* Alerts the results */
      posting.done(function( data ) {
        data = JSON.parse(data); 
          alert(data.message); 
          if (data.status){
            document.location.href="/";
          }
      });
    });
});
})(jQuery);