/**
 * CT Mobile Menu
 *
 * @package WP Provisions
 * @subpackage JavaScript
 */

jQuery(function($){
	$(document).ready(function(){

		$('.sub-menu li a').before('<i class="icon-angle-right"></i>');

		$('.mobile-nav ul').removeClass('cbp-tm-menu');
		$('.mobile-nav ul').addClass('cbp-spmenu');
		
		$("<a href='#' id='showLeftPush' class='show-hide'><i class='icon-reorder'></i>", {
		}).appendTo("#masthead .container");		

		var menuLeft = document.getElementById( 'cbp-spmenu' ),
			showLeftPush = document.getElementById( 'showLeftPush' ),
			body = document.body;
			container = document.getElementById( 'wrapper' ),

		showLeftPush.onclick = function() {
			classie.toggle( this, 'active' );
			classie.toggle( body, 'cbp-spmenu-push-toleft' );
			classie.toggle( menuLeft, 'cbp-spmenu-open' );
		};
	
	});
});