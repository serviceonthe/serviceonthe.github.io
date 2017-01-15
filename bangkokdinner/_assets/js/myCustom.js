$(document).ready(function(){

	var SITE_CURRENCY="$";

  $(window).resize(function() {
		headerSubClick();
		if ($(window).width() >= 768) { wayPoint(); }
		ingredientCarousel();
	});


	/*----------------------------------------------------*/
	/*	Google Map
	/*----------------------------------------------------*/
	if($('#map-canvas').length != 0){
		var map;
		function initialize() {
			var mapOptions = {
				zoom: 8,
				scrollwheel: false,
			 	center: new google.maps.LatLng(-34.397, 150.644),
			 	styles: [
			 				{"stylers": [{ "hue": "#dd0d0d" }]},
    					{
					      "featureType": "road",
					      "elementType": "labels",
					      "stylers": [{"visibility": "off"}]
					    },
					    {
					      "featureType": "road",
					      "elementType": "geometry",
					      "stylers": [{"lightness": 100},
					            {"visibility": "simplified"}]
					    }
			 	]
			};
			map = new google.maps.Map(document.getElementById('map-canvas'), mapOptions);
			var image = '_assets/images/map-marker.png';
			var myLatLng = new google.maps.LatLng(-34.397, 150.644);
			var beachMarker = new google.maps.Marker({
				position: myLatLng,
				map: map,
				icon: image
			 });
		}

		google.maps.event.addDomListener(window, 'load', initialize);
	}

	
	'use strict';
	/*----------------------------------------------------*/
	/*	MOBILE SHARE BUTTONS APPEAR ON CLICK
	/*----------------------------------------------------*/
	$('a.mobile-social-btn').on("click",function () {
		$("ul.social-btns").toggleClass("share");
		return false; //prevent default click action from happening (page scroll to top)
	});




	/*----------------------------------------------------*/
	/*	DINING SPACE SELECTION
	/*----------------------------------------------------*/
	$('.type-wrapper').click(function () {
		$(this).closest('.dining-space').find('.type-wrapper').removeClass("is-active");
		$(this).closest('.dining-space').find('.type-wrapper input').prop('checked', false);
		$(this).find('input').prop('checked', true);
		$(this).toggleClass("is-active");
	});



  /* Nav menu overflow visibility */
	$(".navbar-nav .submenu").on('mouseenter', function(){
		$(this).css('overflow','visible');
	}).on('mouseleave', function(){
		$(this).css('overflow','hidden');
	});

	/* nav menu 2nd level */
	$(".navbar-nav .submenu li").on('mouseenter', function(){
		$(this).find('> ul')
			.css('z-index', '99').css('max-height','1000px');
		if ($(window).width() > 975){
			$(this).find('> ul').css('opacity','1');
		}
	}).on('mouseleave', function(){
		$(this).find('> ul')
			.css('z-index', '9').css('max-height','0');
		if ($(window).width() > 975){
			$(this).find('> ul').css('opacity','0');
		}
	});



  /*----------------------------------------------------*/
	/*	HEADER SUB-MENU CLICK-TO-SHOW IN TAB + MOBILE
	/*----------------------------------------------------*/
	headerSubClick();
	function headerSubClick(){
	  // if ($(window).width() < 992){
			$("#navigation-list .navbar-nav > li").on('mouseenter', function(){
				$(this).closest(".navbar-nav").css('overflow','visible');
				$(this).find(".submenu").css("max-height",1000);
			});

			$("ul.navbar-nav > li").on('mouseleave', function(){
				$("#navigation-list .navbar-nav .submenu").css("max-height",0);
			});
			$(".navbar-nav").on('mouseleave', function(){
				$(this).delay(200).queue(function(next){
					$(this).css('overflow','hidden');
					$(this).dequeue();
				});
			});
	  // }
	}
  


  /*----------------------------------------------------*/
	/*	TAB NAV MENU CLICK
	/*----------------------------------------------------*/
	$('#nav-toggle').on('click', function () {
		$(".navbar-nav").toggleClass("show-menu").css("overflow","hidden");
	});




	/*----------------------------------------------------*/
	/*	MENU PAGE FOOD-ITEMS HOVER ARROWS
	/*----------------------------------------------------*/
	$('.menu-items-wrapper').hover(function () {
		$(this).find('.nav-btns a').toggleClass("appear");
	});
	$(".nav-btns .left-btn").bind("click", (function () {
		$(this).closest(".menu-items-wrapper").find(".bx-controls-direction .bx-prev").trigger("click");
	}));
	$(".nav-btns .right-btn").bind("click", (function () {
		$(this).closest(".menu-items-wrapper").find(".bx-controls-direction .bx-next").trigger("click");
	}));



	/*----------------------------------------------------*/
	/*	MENU PAGE FOOD-ITEMS CLICK SELECT
	/*----------------------------------------------------*/
  var selectedDishes=0;
  var dish=new Array();
	$(".selected-dishes-no").html(selectedDishes);
  
	$('.price-add-select .button.white-btn').click(function () {
		
		$(this).removeClass('clicked');
		$(this).closest('.price-add-select').find('.button.green-btn').addClass("clicked");
		$(this).closest('.price-add-select').find('.button.red-btn').addClass("clicked");
		selectedDishes = selectedDishes + 1;
		$(".selected-dishes-no").html(selectedDishes);

	  ele=$(this).closest('li').data('name')+':'+$(this).closest('li').data('price');
	  dish.push(ele);	
	});


	$('.price-add-select .button.red-btn').click(function () {
		$(this).removeClass('clicked');
		$(this).closest('.price-add-select').find('.button.green-btn').removeClass("clicked");
		$(this).closest('.price-add-select').find('.button.white-btn').addClass("clicked");
		selectedDishes = selectedDishes - 1;
		$(".selected-dishes-no").html(selectedDishes);

		ele=$(this).closest('li').data('name')+':'+$(this).closest('li').data('price')+':'+'1';		
		dish.splice(dish.indexOf(ele),1);
	});



	/*----------------------------------------------------*/
	/*	ORDER-PAGE APPEAR ON CLICK
	/*----------------------------------------------------*/
	var str_order='';
	var len=0;
	$('.place-order-now-btn').click(function () {
		
		if (dish.length == 0) {
			alert("Sorry, you must select an item to continue with your order.");
		}
		else {
			$(".overlay").addClass("disp");
			var modalHeight = $(".modal").height() + 200;
			// var modalHeight = $(window).height();
			$('.inside-body-wrapper').css("max-height",modalHeight);
			$('.overlay').css("height",modalHeight);
			$('.modal').css("display","block");
			$('.modal').removeClass('animated bounceOut');
			$('.modal').addClass('animated bounceIn');
			$(".selected-dishes-no-pop").html(dish.length);
			n = Math.floor(Math.random()*10000+1);
			$("#orderid").html(n);
			str='';
			len=dish.length;
			dt=new Date();
			str_dish='';
			total_amount=0.0;
			$("#order-date").html(dt.toDateString()+' '+dt.toLocaleTimeString());
			
      for(i=0;i<dish.length;i++){
  			str+='<input type="text" class="order-dish" name="dish[]" value="'+dish[i]+'">';
  			dish_arr=dish[i].split(":");
  			str_dish+='<div class="order-pg-items clearfix">'
            +'<div class="item-details-price clearfix">'+
              '<div class="order-item-details clearfix">'+                    
                '<div class="figcap">'+
                  dish_arr[0]+
                '</div>'+
                '<div class="figcap rate">'+
                  SITE_CURRENCY+dish_arr[1]+
                '</div>'+
              '</div>'+
              '<div class="order-item-price clearfix">'+
                '<h2 class="item-total">'+SITE_CURRENCY+dish_arr[1]+'</h2>'+
								'<input type="text" class="hidden-field hid_rcp" value="'+dish_arr[0]+'" />'+	
                '<input type="text" class="hidden-field hid" value="'+dish_arr[1]+'" />'+											
                '<input type="text" name="val[]" class="hidden-field tot" value="'+dish_arr[1]+'" />'+
                '<select name="" class="item-select sel">'+
                  '<option value="1">For 1 person</option>'+
                  '<option value="2">For 2 person</option>'+
                  '<option value="3">For 3 person</option>'+
                  '<option value="4">For 4 person</option>'+
                '</select>'+
              '</div>'+
            '</div>'+
            '<div class="replace-cancel clearfix">'+                  
              '<div class="replace-cancel-btn-wrapper clearfix">'+                  
                '<a class="button red-btn delitem" href="javascript:void(0)">x</a>'+
              '</div>'+
            '</div>'+
          '</div>';
        total_amount+=Number.parseFloat(dish_arr[1]);
    	}//FOR LOOP ends
			
			$("#total_amount").html(SITE_CURRENCY+total_amount.toFixed(2));
			$("#ordered-items").html(str_dish);
			$("#dishes").html(str);
		}//IF-ELSE loop ends
	});//.PLACE-ORDER-NOW-BTN click function ends
  

	$(document).delegate(".sel", "change", function(){
			var v=parseFloat($(this).parent('.order-item-price').find('.hid').val());			
			var val=parseFloat($(this).val())*v;	
			$(this).parent('.order-item-price').find('.tot').attr('value',val);
			$(this).parent('.order-item-price').find('.item-total').html(SITE_CURRENCY+val);
			calculateTotal();
	});

	function calculateTotal(){		
		total_amount=0.0;		
		$( ".tot" ).each(function( index ) {
			total_amount+=Number.parseFloat($(this).val());								
		});	
		$("#total_amount").html(SITE_CURRENCY+total_amount.toFixed(2));				
	}

	$(document).delegate(".delitem", "click", function(){
		total_amount=0.0;
		flag=true;
		cl=false;
		if($( ".tot" ).length==1){
			flag=confirm("Do you really want to delete the last item?");
		}			
		if(flag==true){			
			len--;				
			$(this).closest('.order-pg-items').slideUp("fast",function(){
				$(this).closest('.order-pg-items').remove();		
				$(".selected-dishes-no-pop").html(len);	
				calculateTotal();												
			});
			
			if($( ".tot" ).length==1){							
				$('.inside-body-wrapper.menu-pg .modal .fa-times').trigger('click');
			}
		}//IF FLAG==TRUE
	});



	/*----------------------------------------------------*/
	/*  ORDER PAGE CLOSE 
	/*----------------------------------------------------*/
	$('.inside-body-wrapper.menu-pg .modal .fa-times').click(function () {
		$('.modal').removeClass('animated bounceIn');
		$('.inside-body-wrapper.menu-pg')
			.find('.modal').addClass('animated bounceOut')
			.delay(800)
			.queue(function(next){
				$(".inside-body-wrapper.menu-pg .overlay").removeClass("disp");
				$('.inside-body-wrapper.menu-pg').css("max-height","inherit");
				$('.inside-body-wrapper.menu-pg .overlay').css("height","auto");
				$("#order-form button.grey-btn")
					.prop("disabled",false)
					.addClass('green-btn')
					.removeClass('grey-btn disabled');
					$( this ).dequeue();
			});

		// RESETTING FORM AND ITEM ARRAY ON CLOSING POPUP
			$('.form-message').hide();
			$('#order-form').children('input').val('');
			selectedDishes = 0;
			$('.price-add-select .button.red-btn')
				.removeClass('clicked')
				.closest('.price-add-select').find('.button.green-btn').removeClass("clicked")
				.closest('.price-add-select').find('.button.white-btn').addClass("clicked");
			$(".selected-dishes-no").html(selectedDishes);
			dish = [];
	});



	/*----------------------------------------------------*/
	/*	LOGIN FORM DISPLAY
	/*----------------------------------------------------*/
	$('a.login-btn').click(function () {
		$(".overlay").addClass("disp");
		var modalHeight = $(".modal.login-page").height() + 250;
		$('.inside-body-wrapper').css("max-height",modalHeight);

		// CHECK TO SEE IF MODAL HEIGHT IS MORE THAN WINDOW HEIGHT
		if (($(".modal.login-page").height() + 200) > $(window).height())
			{ $('.overlay').css("height",modalHeight); } // IF MODAL IS GREATER THAN WINDOW
		else
			{ $('.overlay').css("height","100%"); } // IF MODAL IS SMALLER THAN WINDOW

		$('.modal').css("display","block");
		$('.modal').removeClass('animated bounceOut');
		$('.modal').addClass('animated bounceInDown');
	});



	  /*----------------------------------------------------*/
		/*  LOGIN FORM CLOSE
		/*----------------------------------------------------*/
	$('.inside-body-wrapper.index-pg .modal .fa-times').click(function () {
		$('.modal').removeClass('animated bounceInDown');
		$('.inside-body-wrapper.index-pg')
					.find('.modal').addClass('animated bounceOut')
					.delay(800)
					.queue(function(next){
							$(".inside-body-wrapper.index-pg .overlay").removeClass("disp");
    					$('.inside-body-wrapper.index-pg').css("max-height","inherit");
							$('.inside-body-wrapper.index-pg .overlay').css("height","auto");
							$( this ).dequeue();
					});
	});



	/*----------------------------------------------------*/
	/*	IMG-LIQUID
	/*----------------------------------------------------*/
	if($(".imgLiquidFill").length) {
		$(".imgLiquidFill").imgLiquid();	
	}
	


	/*----------------------------------------------------*/
	/*	CALENDAR
	/*----------------------------------------------------*/
	if($("#calendar").length){
			$(function() {
				var cal = $( '#calendar' ).calendario( {
						caldata : codropsEvents,
						displayWeekAbbr : true
					} ),
					$month = $( '#custom-month' ).html( cal.getMonthName() ),
					$year = $( '#custom-year' ).html( cal.getYear() );
				$( '#next-date' ).on( 'click', function() {
					cal.gotoNextMonth( updateMonthYear );
				} );
				$( '#prev-date' ).on( 'click', function() {
					cal.gotoPreviousMonth( updateMonthYear );
				} );
				$( '#current-date' ).on( 'click', function() {
					cal.gotoNow( updateMonthYear );
				} );

				function updateMonthYear() {				
					$month.html( cal.getMonthName() );
					$year.html( cal.getYear() );
				}
				var today = new Date();
				$('#current-date').html(today.getDate());
				cal.setData( {
								'08-01-2014' : '<a href="#">testing</a>',
								'08-10-2014' : '<a href="#">testing</a>',
								'08-12-2014' : '<a href="#">testing</a>'
							} );
			});
			
			$("#calendar").on("click", ".fc-content", function(evt) {
				var imgSrc = $(this).find("img").attr("src");
				var heading = $(this).find("a").text();
				var anchor = $(this).find("a").attr("href");
				$("#updateArticle").children("img").attr("src", imgSrc).css("height","137px").end()
								   .children("a").attr("href",anchor).text(heading);
				if(imgSrc==undefined){$("#updateArticle").children("img").remove(); }
			})
		}



	/*----------------------------------------------------*/
	/*	SLIDESHOW [ABOUT-US PAGE]
	/*----------------------------------------------------*/
	if( $("#slideshow").length > 0 )
	{
		$("#slideshow > li:gt(0)").hide();

		setInterval(function() { 
		  $('#slideshow > li:first')
		    .fadeOut(1000)
		    .next()
		    .fadeIn(1000)
		    .end()
		    .appendTo('#slideshow');
		},  3000);
	}




	/*----------------------------------------------------*/
	/*	ScrollUp
	/*----------------------------------------------------*/
	/**
	* scrollUp v1.1.0
	* Author: Mark Goodyear - http://www.markgoodyear.com
	* Git: https://github.com/markgoodyear/scrollup
	*
	* Copyright 2013 Mark Goodyear
	* Licensed under the MIT license
	* http://www.opensource.org/licenses/mit-license.php
	*/
	'use strict';
	$.scrollUp = function (options) {
		// Defaults
		var defaults = {
			scrollName: 'scrollUp', // Element ID
			topDistance: 300, // Distance from top before showing element (px)
			topSpeed: 1200, // Speed back to top (ms)
			animation: 'slide', // Fade, slide, none
			animationInSpeed: 200, // Animation in speed (ms)
			animationOutSpeed: 200, // Animation out speed (ms)
			scrollText: '', // Text for element
			scrollImg: false, // Set true to use image
			activeOverlay: false // Set CSS color to display scrollUp active point, e.g '#00FFFF'
		};

		var o = $.extend({}, defaults, options),
			scrollId = '#' + o.scrollName;

		// Create element
		$('<a/>', {
			id: o.scrollName,
			href: '#top',
			title: o.scrollText
		}).appendTo('body');
		
		// If not using an image display text
		if (!o.scrollImg) {
			$(scrollId).text(o.scrollText);
		}

		// Minium CSS to make the magic happen
		$(scrollId).css({'display':'none','position': 'fixed','z-index': '2147483647'});

		// Active point overlay
		if (o.activeOverlay) {
			$("body").append("<div id='"+ o.scrollName +"-active'></div>");
			$(scrollId+"-active").css({ 'position': 'absolute', 'top': o.topDistance+'px', 'width': '100%', 'border-top': '1px dotted '+o.activeOverlay, 'z-index': '2147483647' });
		}

		// Scroll function
		$(window).scroll(function(){	
			switch (o.animation) {
				case "fade":
					$( ($(window).scrollTop() > o.topDistance) ? $(scrollId).fadeIn(o.animationInSpeed) : $(scrollId).fadeOut(o.animationOutSpeed) );
					break;
				case "slide":
					$( ($(window).scrollTop() > o.topDistance) ? $(scrollId).slideDown(o.animationInSpeed) : $(scrollId).slideUp(o.animationOutSpeed) );
					break;
				default:
					$( ($(window).scrollTop() > o.topDistance) ? $(scrollId).show(0) : $(scrollId).hide(0) );
			}
		});

		// To the top
		$(scrollId).click( function(event) {
			$('html, body').animate({scrollTop:0}, o.topSpeed);
			event.preventDefault();
		});
	};
	$.scrollUp();







	/*----------------------------------------------------*/
	/*	MENU PAGE MENUS APPEAR IN TAB/MOBILE
	/*----------------------------------------------------*/
	$(".search-menu-list .head").click(function () {
		$(this).parent(".search-menu-list").siblings(".search-menu-list.show").removeClass("show");
		$(this).parent(".search-menu-list").addClass("show");
	});





	/*----------------------------------------------------*/
	/*	SKILL PERCENTAGE READ FROM HTML [TESTIMONIALS PG]
	/*----------------------------------------------------*/
	$( ".level-bar" ).each(function( index ) {
			var w = $(this).find(".level-bar-filled").data("level");
			var z = w+"%";
 			$(this).find(".level-bar-filled").css("width",z);
 			$(this).parent(".star-rating").find(".level-percent h3").html(w);
  });





	/*----------------------------------------------------*/
	/*	FOOD GALLERY PAGE FOOD-TYPE SELECT
	/*----------------------------------------------------*/
  $(".food-type-list a").click(function(){
  		$(this).closest(".food-type-list").find("a").removeClass("selected");
  		$(this).addClass("selected");
  });



  /*----------------------------------------------------*/
	/*	Ingredient section carousel [HOMEPAGE]
	/*----------------------------------------------------*/
	var i=5, j=4, k=3, l=2, m=1;
	if ($('.foodRecipe').length){
		var itemCount = $('.recipe-list li').length;
		if(itemCount == 1)
			{ i=j=k=l = 1; }
		else if(itemCount == 2)
			{ i=j=k = 2; }
		else if(itemCount == 3)
			{ i=j = 3; }
		else if(itemCount == 4)
			{ i = 4; }
	}

	function ingredientCarousel(){
		if ($('.foodRecipe').length){
			if($(window).width() < 975){
				$("#owl-example").owlCarousel({
			  	center : true,
			    loop : false,
			  	items : itemCount,
			  	itemsDesktop : [1199,i],
			  	itemsDesktopSmall : [991,j],
			    itemsTablet: [767,k],
			    itemsTabletSmall: [650,l],
			    itemsMobile : [479,m],
			    singleItem : false,
			    dotsEach : true
			  });
			}
			else if(($(window).width() > 975) && ($('.owl-wrapper').length)){
				$("#owl-example").data('owlCarousel').destroy();
			}
		}
	}
	ingredientCarousel();
  


  /*----------------------------------------------------*/
	/*	WIDGET SECTION TAB DISPLAY [EVENT PAGE]
	/*----------------------------------------------------*/
  if ($(".popular-events-widget .tabs > li > a").hasClass("selected"))
  	{ $(".popular-events-widget a.selected").parent().find("ul").css("display","block"); }

  $(".popular-events-widget .tabs > li > a").click(function(){
		if (!$(this).hasClass("selected")){
			$(".popular-events-widget .tabs > li > a").removeClass("selected");
			$(".popular-events-widget .tabs > li ul").css("display","none");
			$(this).addClass("selected");
			$(this).parent().find("ul").css("display","block");
		}
  });




  /*----------------------------------------------------*/
	/*	MAP SECTION FORM VALIDATION
	/*----------------------------------------------------*/
	  $("#map-search-form").validate({ 
			rules:{
				mapCity:{required: true},
				mapPin:{required: true,number:true,minlength:6}
			},
				submitHandler: function (form) { return false; }
		});

	  $(".dining-space-types.fixed-type").click(function(){
				$("#personNo").prop("readonly",true);
				$("#personNo").val($(this).find("input:checkbox").val());
		});
		$(".dining-space-types.custom-type").click(function(){
				$("#personNo").prop("readonly",false);			
				$("#personNo").val('');
		});



	/*----------------------------------------------------*/
	/*	Food Recipe Detail Section [INDEX PAGE]
	/*----------------------------------------------------*/
	var liCount = $(".slidingDiv").size();
	var liActive = parseInt(liCount/2) + 1;
	var figText = $(".recipes .container > div.slidingDiv:nth-of-type("+liActive+")").css("display","block");

	activeid="#"+$(".foodRecipe li.active").data('div');
	$(".slidingDiv-wrapper").find(activeid).show();

	$(".foodRecipe li").on("mouseenter",function(){
		// $(this).siblings().removeClass("active");
		$(this).closest('.recipe-list').find('li').removeClass("active");
		$(this).addClass("active");
		container = $(".slidingDiv-wrapper");
		child = ".slidingDiv";
		$this = $(this),
		id = $this.data("div"),
		id = "#"+id;
		container.children(child).hide();
		container.children(id).show();
	});



	/*----------------------------------------------------*/
	/*	Waypoint Animations
	/*----------------------------------------------------*/
	if ($(window).width() >= 768) { wayPoint(); }

	function wayPoint() {
		$('.map-search').waypoint(function() {
			setTimeout(function(){$('.city-search').addClass('animated flipInX')},100);
			$(".city-search").css("opacity","1");
		}, { offset: '75%' });

		$('.banner').waypoint(function() {
			setTimeout(function(){$('.banner-caption').addClass('animated fadeInDown')},100);
			setTimeout(function(){$('.banner-caption h5').addClass('animated fadeInUp')},100);
			setTimeout(function(){$('.banner-caption h2').addClass('animated fadeInUp')},100);
		}, { offset: '75%' });

		if( $(".homepage").length > 0 ) { //==========INDEX PAGE ONLY================
				$('.recipes').waypoint(function() {
					setTimeout(function(){$('.place-order').addClass('animated flipInX')},100);
					$(".place-order").css("opacity","1");
				}, { offset: '75%' });

				$('.homepage .top-content').waypoint(function() {
					setTimeout(function(){$('.homepage .sub-heading h2').addClass('animated fadeInRight')},100);
					setTimeout(function(){$('.homepage .sub-heading h6').addClass('animated fadeInLeft')},100);
					setTimeout(function(){$('.homepage .top-content > img').addClass('animated fadeInUp')},100);
				}, { offset: '20%' });
				
				$('.book-table').waypoint(function() {
					setTimeout(function(){$('.book-form').addClass('animated fadeInUp')},100);
				}, { offset: '55%' });

				$('.food-solutions').waypoint(function() {
					setTimeout(function(){$('.food-menus:nth-of-type(1)').addClass('animated fadeInRight')},100);
				}, { offset: '40%' });
				$('.food-solutions').waypoint(function() {
					setTimeout(function(){$('.food-menus:nth-of-type(2)').addClass('animated fadeInLeft')},100);
				}, { offset: '0%' });
				$('.food-solutions').waypoint(function() {
					setTimeout(function(){$('.food-menus:nth-of-type(3)').addClass('animated fadeInRight')},100);
				}, { offset: '-40%' });

				$('.everyday-events').waypoint(function() {
					setTimeout(function(){$('.feature-events-wrapper:nth-of-type(1)').addClass('animated fadeInLeft')},100);
					setTimeout(function(){$('.feature-events-wrapper:nth-of-type(2)').addClass('animated fadeInRight')},100);
					setTimeout(function(){$('.feature-events-wrapper:nth-of-type(3)').addClass('animated fadeInLeft')},100);
					setTimeout(function(){$('.feature-events-wrapper:nth-of-type(4)').addClass('animated fadeInRight')},100);
				}, { offset: '50%' });

				$('.user-reviews').waypoint(function() {
					setTimeout(function(){$('.review:nth-of-type(1)').addClass('animated fadeInLeft')},100);
					setTimeout(function(){$('.review:nth-of-type(2)').addClass('animated fadeInUp')},100);
					setTimeout(function(){$('.review:nth-of-type(3)').addClass('animated fadeInRight')},100);
				}, { offset: '40%' });

				$('.meet-chef').waypoint(function() {
					setTimeout(function(){$('.chef-details figure').addClass('animated fadeInLeft')},100);
					setTimeout(function(){$('.chef-details .figcaption').addClass('animated fadeInRight')},100);
					setTimeout(function(){$('.meet-chef .container > figure img:first-of-type').addClass('animated fadeInLeft')},100);
					setTimeout(function(){$('.meet-chef .container > figure img:last-of-type').addClass('animated fadeInRight')},100);
				}, { offset: '20%' });
		}//==================INDEX PAGE WAYPOINT ends==========================

		
		if( $(".menu-page").length > 0 ) {//=========MENU PAGE ONLY============
				$('.search-menu-list.brkfast').waypoint(function() {
					setTimeout(function(){$('.brkfstSlider li').not('bx-clone').addClass('animated fadeInUp')},100);
				}, { offset: '60%' });

				$('.search-menu-list.lnch').waypoint(function() {
					setTimeout(function(){$('.lnchSlider li').not('bx-clone').addClass('animated fadeInUp')},100);
				}, { offset: '60%' });

				$('.search-menu-list.dinr').waypoint(function() {
					setTimeout(function(){$('.dnnrSlider li').not('bx-clone').addClass('animated fadeInUp')},100);
				}, { offset: '60%' });

				$('.search-menu-list.drinks').waypoint(function() {
					setTimeout(function(){$('.drnkSlider li').not('bx-clone').addClass('animated fadeInUp')},100);
				}, { offset: '60%' });
		}//===========MENU PAGE WAYPOINT ends=========================


		if( $(".event-page").length > 0 ) {//=========EVENT PAGE ONLY============
				$('.monthly-events-section').waypoint(function() {
					setTimeout(function(){$('.month-events:nth-of-type(odd)').addClass('animated fadeInDown')},100);
					setTimeout(function(){$('.month-events:nth-of-type(even)').addClass('animated fadeInUp')},100);
				}, { offset: '60%' });

				$('.featured-events').waypoint(function() {
					setTimeout(function(){$('.feature-events:nth-of-type(odd)').addClass('animated fadeInLeft')},100);
					setTimeout(function(){$('.feature-events:nth-of-type(even)').addClass('animated fadeInRight')},100);
				}, { offset: '60%' });
		}//=========EVENT PAGE ends============


		if( $(".fav-dish").length > 0 ) {//=========FAV DISH PAGE ============
				$('.chef-details').waypoint(function() {
					setTimeout(function(){$('.chef-details .chef-img.imgLiquid').addClass('animated flipInX')},100);
					$(".place-order").css("opacity","1");
				}, { offset: '20%' });

				$('.about-dish').waypoint(function() {
					setTimeout(function(){$('.fork-icon li').addClass('animated fadeInRight')},100);
				}, { offset: '20%' });

				$('.reviews-container').waypoint(function() {
					setTimeout(function(){$('.review-comments-wrapper:nth-of-type(1)').addClass('animated fadeInLeft')},100);
					setTimeout(function(){$('.review-comments-wrapper:nth-of-type(2)').addClass('animated fadeInRight')},100);
					setTimeout(function(){$('.review-comments-wrapper:nth-of-type(3)').addClass('animated fadeInLeft')},100);
					setTimeout(function(){$('.review-comments-wrapper:nth-of-type(4)').addClass('animated fadeInRight')},100);
				}, { offset: '75%' });
		}//=========FAV DISH PAGE ends============


		if( $(".testimonials-page").length > 0 ) {
				$('.testimonials-page .review').waypoint(function() {
					setTimeout(function(){$('.review-comments-wrapper:nth-of-type(odd)').addClass('animated fadeInLeft')},100);
					setTimeout(function(){$('.review-comments-wrapper:nth-of-type(even)').addClass('animated fadeInRight')},100);
				}, { offset: '20%' });
		}


		if( $(".our-events").length > 0 ) {
			$('.upcoming-events').waypoint(function() {
				setTimeout(function(){$('.event-banner').addClass('animated fadeInUp')},100);
				setTimeout(function(){$('.bullet-wrapper').addClass('animated fadeInLeft')},100);
				setTimeout(function(){$('.name-date').addClass('animated fadeInLeft')},100);
				setTimeout(function(){$('.button-holder').addClass('animated fadeInRight')},100);
			}, { offset: '50%' });
		}


		if( $(".about-chef-page").length > 0 ) {
			$('.fav-recipes').waypoint(function() {
				setTimeout(function(){$('.fav-recipes .img-holder:nth-of-type(1)').addClass('animated fadeInDown')},100);
				setTimeout(function(){$('.fav-recipes .img-holder:nth-of-type(2)').addClass('animated fadeInDown')},100);
				setTimeout(function(){$('.fav-recipes .img-holder:nth-of-type(3)').addClass('animated fadeInDown')},100);
				setTimeout(function(){$('.fav-recipes .img-holder:nth-of-type(4)').addClass('animated fadeInUp')},100);
				setTimeout(function(){$('.fav-recipes .img-holder:nth-of-type(5)').addClass('animated fadeInUp')},100);
				setTimeout(function(){$('.fav-recipes .img-holder:nth-of-type(6)').addClass('animated fadeInUp')},100);
			}, { offset: '60%' });
		}


		if( $(".our-gallery").length > 0 ) {
			$('.in-house').waypoint(function() {
						setTimeout(function(){$('.in-house .img-wrappers').addClass('animated fadeInUp')},100);
			}, { offset: '60%' });
			$('.own-event').waypoint(function() {
						setTimeout(function(){$('.own-event .img-wrappers').addClass('animated fadeInUp')},100);
			}, { offset: '60%' });
		}
	}/* =========== WAYPOINTS ends =================================== */
	/* ============================================================ */


$(this).delay(500).queue(function(next){
					$(this).css('overflow','hidden');
					$(this).dequeue();
				});


	/* =========== FIXED HEADER [ALL] =================================== */
	if ($(window).width() > 992){

		if(($('header.new-type1').length) || ($('header.new-type3').length)){
			var upheight = $('header .upper-part').outerHeight();
			var lowheight = $('header .lower-part').outerHeight();
			$(window).on('scroll', function(){
				if($(window).scrollTop() > upheight ) {
					$('header .lower-part').addClass('is-fixed');
					$('header .upper-part').css('margin-bottom', lowheight);
				}
				else {
					$('header .lower-part').removeClass('is-fixed');
					$('header .upper-part').css('margin-bottom', 0);
				}
			});
		}

		if($('header.new-type2').length){
			var lowheight = $('header .lower-part').outerHeight();
			$(window).on('scroll', function(){
				if($(window).scrollTop() > 1 ) {
					$('header.new-type2').addClass('is-fixed');
					$('header.new-type2.is-fixed').css('height', lowheight);
				}
				else {
					$('header.new-type2').removeClass('is-fixed');
					$('header.new-type2').css('height', 'auto');
				}
			});
		}

		// ORIGINAL DEFAULT HEADER
		if($('header.default').length){
			var lowheight = $('header.default').outerHeight();
			$(window).on('scroll', function(){
				if($(window).scrollTop() > 20 ) {
					$('header.default').addClass('is-fixed')
															.css('height', lowheight);
				}
				else {
					$('header.default').removeClass('is-fixed')
															.css('height', 'auto');
				}
			});
		}
	}/* =========== FIXED HEADER ends =================================== */
	

});/* =========== DOCUMENT READY ends ========================================== */




/*----------------------------------------------------*/
/*	FITTEXT
/*----------------------------------------------------*/
jQuery(".event h3").fitText(1, {minFontSize: '30px', maxFontSize: '40px'});
jQuery(".event h4").fitText(1, {minFontSize: '20px', maxFontSize: '25px'});

