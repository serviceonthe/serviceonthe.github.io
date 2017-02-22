/*=========================================

Template Name: Kreasi - Creative Portfolio HTML Template
Author: Hidra
Version: 1.0
Design and Developed by: Hidra

NOTE: This is the custom jQuery file for the template

=========================================*/


(function ($) {
    "use strict";


    /*=================== preloader ===================*/
    $(document).ready(function($) {
        $(window).on('load',function() { $(".preloading").fadeOut("slow"); })
    });
    

    /*=================== PAGE AND MENU FUNCTIONS ===================*/
    $('#about-content,#resume-content,#skills-content,#portfolio-content,#blog-content,#contact-content').on("click", function() {
        var base = this.id;
        $('section.content').not( base ).removeClass('active');
        $('section.content.' + base ).addClass('active');

    });


    /*=================== MENU FUNCTIONS MOBILE VIEW ===================*/
    $("nav .mobile-view-menu #menu-btn").on("click", function() {
        $("nav .desktop-view-menu").slideToggle("slow");
    });


    /*=================== THEME COLOR PANEL FUNCTIONS ===================*/
    $(".style-option-wrap #style-btn").on("click", function() {
        $(this).parent(".style-option-wrap").toggleClass("open-style");
    });


    /*=================== THEME COLOR FUNCTIONS ===================*/
    $(".theme-panel #default").on("click", function() {
        $("body").removeAttr('class');
    });

    $('#red-style,#sky-blue,#green-style,#pink-style,#brown-style').on("click", function() {
        var style = this.id;
        $("body").attr('class', style);
    });
    

    /*=================== TOP NAV ACTIVE MENU ===================*/
    $("nav ul.nav-menu li a").on("click", function() { 
        $('nav ul.nav-menu li a').attr('class','');
        $(this).addClass('page-active');
    }); 


    /*=================== SIDEBAR ON MOBILE VIEW ===================*/
    $("a#enter-mobile").on("click", function() {
        $('aside').addClass('upup');  
    });


    /*=================== PORTFOLIO FILTER ===================*/ 
    //no filter to showing all image
    $('#portfolio-page a#f-all').on("click", function() {
        $('#portfolio-page .portfolio-box').removeClass('portfolio-hidden')       
    });

    $('#filter-photography,#filter-cover,#filter-banner').on("click", function() {
        var filter_image = this.id;
        $('#portfolio-page .portfolio-box').addClass('portfolio-hidden');   
        $('#portfolio-page .portfolio-box.' + filter_image ).removeClass('portfolio-hidden');   
    });


   /*=================== GALLERY FUNCTIONS ===================*/ 
    loadGallery(true, 'a.viewthumb');

    function disableButtons(counter_max, counter_current){
        $('#show-previous-image, #show-next-image').show();
        if(counter_max == counter_current){
            $('#show-next-image').hide();
        } else if (counter_current == 1){
            $('#show-previous-image').hide();
        }
    }


    function loadGallery(setIDs, setClickAttr){
        var current_image,
            selector,
            counter = 0;

        $('#show-next-image, #show-previous-image').on("click", function() {
            if($(this).attr('id') == 'show-previous-image'){
                current_image--;
            } else {
                current_image++;
            }

            selector = $('[data-image-id="' + current_image + '"]');
            updateGallery(selector);
        });

        function updateGallery(selector) {
            var $sel = selector;
            current_image = $sel.data('image-id');
            $('#image-gallery-caption').text($sel.data('caption'));
            $('#image-gallery-title').text($sel.data('title'));
            $('#image-gallery-image').attr('src', $sel.data('image'));
            disableButtons(counter, $sel.data('image-id'));
        }

        if(setIDs == true){
            $('[data-image-id]').each(function(){
                counter++;
                $(this).attr('data-image-id',counter);
            });
        }
        $(setClickAttr).on('click',function(){
            updateGallery($(this));
        });
    }


    /*=================== TESTIMONIAL ===================*/ 
      //Set the carousel options
      $('#quote-carousel').carousel({
        pause: true,
        interval: 4000,
      });


    /*=================== SOCIAL NETWORK FUNCTIONS ===================*/
    $("aside .sidebar-network").clone().appendTo($("nav .sidebar-network-2"));


    /*=================== SCROLLABLE ICON ===================*/
    $.fn.hasScrollBar = function() {
        return this.get(0).scrollHeight > this.innerHeight();
    }
    
    $('.content .container-custom').filter(function() { 
        return $(this).hasScrollBar(); 
    }).addClass('scrollable');
    $(".scrollable-icon.scrollable-arrow.bounce").clone().appendTo($(".content .container-custom.scrollable"));

    $('.content .container-custom').scroll(function () {
        if ($(this).scrollTop() > 1) {
            $('.content.active').addClass('hide-scrollable-icon');   
        } else {
           $('.content.active').removeClass('hide-scrollable-icon'); 
        }
    });


 })(jQuery);