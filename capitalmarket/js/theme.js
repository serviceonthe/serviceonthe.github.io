/*
===========================================
Table Of Contents
-------------------------------------------
- On Window Load
    - Preloader
- On Dom Load
    - Bootstrap Essential
    - Hero Carousel
    - Featured Post Carousel
    - Post Gallery Carousel
    - Show Social Icons and Search box
    - Ajax Contact Form
===========================================

*/
// On Window Load
$(window).on('load', function() {
    "use strict";

    // Preloader
    $('.preloader-area').fadeOut();
    $('.preloader-area').delay(350).fadeOut('slow');
    $('body').delay(550);
});

// Adjust Header Menu On Scroll Down
$(window).on('scroll', function() {
    var menu1 = $('.menu-style-1');
    var menu2 = $('.menu-style-2');
    var menu3 = $('.menu-style-3');
    var wScroll = $(this).scrollTop();
    var wh = $(window).height();
    if ( wScroll > 0 ) {
        menu1.addClass('fixed-header');
        menu3.addClass('fixed-header');
    }else {
        menu1.removeClass('fixed-header');
        menu3.removeClass('fixed-header');
    }

    if( wScroll > 203 ) {
        menu2.addClass('fixed-header');
    }else {
        menu2.removeClass('fixed-header');
    }

});

// On Dom Load
(function($) {
    "use strict";

    // Bootstrap Essential
    $(".embed-responsive iframe").addClass("embed-responsive-item");
    $(".carousel-inner .item:first-child").addClass("active");
    $('[data-toggle="tooltip"]').tooltip();

    // Hero Carousel
    function hero_slider() {
        var owl = $("#hero-slider");
        owl.owlCarousel({
            loop: true,
            margin: 10,
            responsiveClass: true,
            nav: true,
            navText: ["<i class='fa fa-angle-left'></i> ", "<i class='fa fa-angle-right'></i>"],
            items: 1,
            smartSpeed: 2000,
            addClassActive: true,
            dots: false,
            autoplay: false,
            autoplayTimeout: 5000,
            mouseDrag: true,
            touchDrag: true,
            pullDrag: false,
            responsive: {}
        });
    }
    hero_slider();

    // Featured Post Carousel
    function featured_post_slider() {
        var owl = $("#featured-slider");
        owl.owlCarousel({
            loop: true,
            margin: 10,
            responsiveClass: true,
            nav: false,
            navText: ["<i class='fa fa-angle-left'></i> ", "<i class='fa fa-angle-right'></i>"],
            items: 3,
            animateIn: 'slideInDown',
            animateOut: 'slideOutRight',
            smartSpeed: 2000,
            addClassActive: true,
            dots: true,
            autoplay: true,
            autoplayTimeout: 5000,
            mouseDrag: true,
            touchDrag: true,
            pullDrag: false,
            responsive: {
                0: {
                    items: 1
                },
                600: {
                    items: 2
                },
                768: {
                    items: 3
                }
            }
        });
    }
    featured_post_slider();

    // Post Gallery Carousel
    function post_gallery_slider() {
        var owl = $(".carousel-post-gallery");
        owl.owlCarousel({
            loop: true,
            margin: 10,
            responsiveClass: true,
            nav: true,
            navText: ["<i class='fa fa-angle-left'></i> ", "<i class='fa fa-angle-right'></i>"],
            items: 1,
            animateIn: 'slideInDown',
            animateOut: 'slideOutRight',
            smartSpeed: 2000,
            addClassActive: true,
            dots: true,
            autoplay: true,
            autoplayTimeout: 5000,
            mouseDrag: true,
            touchDrag: true,
            pullDrag: false,
            responsive: {}
        });
    }
    post_gallery_slider();

    // Showing Social Icons and Search box
    $('.show-social').on('click', function() {
        $('.social-share-icons').toggleClass('show-social-icons');
    });
    $('.show-social').on('blur', function() {
        $('.social-share-icons').removeClass('show-social-icons');
    });
    $('.show-search').on('click', function() {
        $('.top-search-form').toggleClass('show-search-form');
    });
    $('.show-search').on('blur', function() {
        $('.top-search-form').removeClass('show-search-form');
    });

    // Ajax Contact Form
    $('.cf-msg').hide();
    $('form#cf button#submit').on('click', function() {
        var fname = $('#fname').val();
        var subject = $('#subject').val();
        var email = $('#email').val();
        var website = $('#website').val();
        var msg = $('#msg').val();
        var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;

        if (!regex.test(email)) {
            alert('Please enter valid email');
            return false;
        }

        fname = $.trim(fname);
        subject = $.trim(subject);
        email = $.trim(email);
        website = $.trim(website);
        msg = $.trim(msg);

        if (fname != '' && email != '' && msg != '') {
            var values = "fname=" + fname + "&subject=" + subject + "&email=" + email + "&website= " + website + " &msg=" + msg;
            $.ajax({
                type: "POST",
                url: "sendMail.php",
                data: values,
                success: function() {
                    $('#fname').val('');
                    $('#subject').val('');
                    $('#email').val('');
                    $('#website').val('');
                    $('#msg').val('');

                    $('.cf-msg').fadeIn().html('<div class="alert alert-success"><strong>Success!</strong> Email has been sent successfully.</div>');
                    setTimeout(function() {
                        $('.cf-msg').fadeOut('slow');
                    }, 4000);
                }
            });
        } else {
            $('.cf-msg').fadeIn().html('<div class="alert alert-danger"><strong>Warning!</strong> Please fillup the informations correctly.</div>')
        }
        return false;
    });

    // Smooth Scrolling Effect
    $('.smoothscroll').on('click', function(e) {
        e.preventDefault();
        var target = this.hash;
        var navHeight = $('.navbar-default').height();

        $('html, body').stop().animate({
            'scrollTop': $(target).offset().top - navHeight
        }, 1200);
    });


}(jQuery));
