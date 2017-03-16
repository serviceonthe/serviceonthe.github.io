$(function() {
	
	"use strict";
						
	/* ToTop
	=============================*/
	$('body').toTop();			
			
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