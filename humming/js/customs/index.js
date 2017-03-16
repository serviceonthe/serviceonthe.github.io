$(function() {
	
	"use strict";

	new WOW().init();
	
	/* COUNTERUP
	=============================*/		
	$('.counter').counterUp({
		delay: 10,
		time: 2000
	});
			
	/* FILTERIZR ===================== */
	
	$('.filtr-container').imagesLoaded().always( function( instance ) {
	
		var content = $(".photogallery ul"),
		tab= $("ul.tab li a");
		$(".tab li:first-child a").addClass("pg-active");

		tab.on('click',function(e){
			tab.removeClass('pg-active').filter(this).addClass('pg-active');				
			e.preventDefault();		
		});
		
		var options = {
			animationDuration: 0.5, //in seconds
			filter: 'all', //Initial filter
			callbacks: { 
				onFilteringStart: function() { },
				onFilteringEnd: function() { }
			},
			delay: 0, //Transition delay in ms
			delayMode: 'progressive', //'progressive' or 'alternate'
			easing: 'ease-out',
			
			filterOutCss: { //Filtering out animation
				opacity: 0,
				transform: 'scale(0)'
			},
			
			filterInCss: { //Filtering in animation
				opacity: 1,
				transform: 'scale(1)'
			},
			
			layout: 'sameSize', //See layouts
			selector: '.filtr-container',
			setupControls: true 
		} 
		//You can override any of these options and then call...
		var filterizd = $('.filtr-container').filterizr(options);
		//If you have already instantiated your Filterizr then call...
		filterizd.filterizr('setOptions', options);

	})
	
	/* Magnific Popup
	=============================*/

	$('.gallery-item').magnificPopup({
		type: 'image',
		gallery:{
			enabled:true
		}
	});
	
	$('.slider-projects').magnificPopup({
		type: 'image',
		gallery:{
			enabled:true
		}
	});
	
	$('.slider-blog').magnificPopup({
		type: 'image'				
	});
					
	/* Owl Carousel
	============================*/
				  
	$("#owl-carousel-latest-projects").owlCarousel({		 
		autoPlay: 4000,
		slideSpeed : 300,
		paginationSpeed : 1000,
		singleItem:true,
		stopOnHover : true		 
	});
	
	$("#owl-carousel-tabs-1").owlCarousel({		 
		autoPlay: 2500,
		slideSpeed : 300,
		paginationSpeed : 400,
		singleItem:true,
		stopOnHover : true		 
	});
	
	$("#owl-carousel-creviews").owlCarousel({		 
		autoPlay: 3000, //Set AutoPlay to 3 seconds		 
		items :1,
		itemsDesktop : [1199,1],
		itemsDesktopSmall : [979,1],
		itemsTablet: [768,1],
		itemsTabletSmall: false,
		itemsMobile : [479,1],
		singleItem : false,
		itemsScaleUp : false,
		stopOnHover : true				
	});
	
	$("#owl-carousel-news").owlCarousel({		 
		autoPlay: 3000, //Set AutoPlay to 3 seconds		 
		items :3,
		itemsDesktop : [1199,3],
		itemsDesktopSmall : [979,3],
		stopOnHover : true		 
	});
	
	$("#owl-carousel-blog").owlCarousel({		 
		autoPlay: 3000, //Set AutoPlay to 3 seconds		 
		items :3,
		itemsDesktop : [1199,3],
		itemsDesktopSmall : [979,2],
		itemsTablet: [768,2],
		itemsTabletSmall: false,
		itemsMobile : [479,1],
		singleItem : false,
		itemsScaleUp : false,
		stopOnHover : true		 
	});	

	$("#owl-carousel-features").owlCarousel({		 
		autoPlay: 3000, //Set AutoPlay to 3 seconds		 
		items :1,
		itemsCustom : false,
		itemsDesktop : [1199,1],
		itemsDesktopSmall : [980,1],
		itemsTablet: [768,1],
		itemsTabletSmall: false,
		itemsMobile : [479,1],
		singleItem : false,
		itemsScaleUp : false,
		stopOnHover : true		 
	});	


	/* ToTop
	=============================*/
	$('body, html').toTop();	
	
	/* Progress Bars
	=============================*/
	$(".progress-wrapper").each(function() {
		var progressBar = $(".progress-bar");
		progressBar.each(function(indx){
			$(this).css("width", $(this).attr("aria-valuenow") + "%");
			$(this).append($(this).attr("aria-valuenow")+"%");
		});
	});
	
	/* Modals
	=============================*/
	$('#myModal').on('shown.bs.modal', function () {
		$('#myInput').focus()
	})
					
	/* COLOR PANEL
	=============================*/	
	$("#swatch>ul>li>a>i").hide();
	
	$("#swatch ul li a.theme_option:first i").show();
	$("#swatch ul li a.theme_option:first").addClass("color-active");
		
	$("#swatch ul li a.theme_option_menu:first i").show();
	$("#swatch ul li a.theme_option_menu:first").addClass("color-active-menu");
	
	var colorpt = $(".color-panel-toggle");
	
	colorpt.on('click',function(e){
		$(".color-panel").toggleClass("color-panel-margin");		
	});
	
	var to = $('.theme_option');
	
	to.on('click',function(e){
		
		$(".theme_option").removeClass("color-active");
		$(this).toggleClass("color-active");
		
		$("#swatch ul li a.theme_option i").hide();
		$(this).find("i").show();
		
		event.preventDefault();
		less.modifyVars({
			'@defaultcolor': $("#swatch a.color-active").attr('data-theme'),
			'@default-menu-color': $("#swatch a.color-active-menu").attr('data-theme')
		});
		
	});
	
	var tom = $('.theme_option_menu');
	
	tom.on('click',function(e){
		
		$(".theme_option_menu").removeClass("color-active-menu");
		$(this).toggleClass("color-active-menu");
		
		$("#swatch ul li a.theme_option_menu i").hide();
		$(this).find("i").show();
		
		event.preventDefault();
		less.modifyVars({
			'@default-menu-color': $("#swatch a.color-active-menu").attr('data-theme'),
			'@defaultcolor': $("#swatch a.color-active").attr('data-theme')
		});
		
	});
	
});	


$(window).on('load', function() {
	// Animate loader off screen
	$(".se-pre-con").fadeOut("slow");
});
