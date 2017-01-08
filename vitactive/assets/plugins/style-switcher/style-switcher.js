/*
 *
 *		STYLE-SWITHER.JS
 *
 */

$(document).ready(function() {
    
	var style_switch_content = ' \
		<h4>Theme Options</h4> \
		<a href="#"></a> \
		<br> \
		<h5>Change Color</h5> \
		<div class="colors clearfix"> \
			<a id="default" href="#" data-style="default"></a> \
			<a id="purple" href="#" data-style="purple"></a> \
			<a id="blue" href="#" data-style="blue"></a> \
			<a id="green" href="#" data-style="green"></a> \
		</div><!-- colors --> \
		<h5>Change Layout</h5> \
		<div class="layout clearfix"> \
			<a class="wide" href="#" data-style="wide"><img src="assets/plugins/style-switcher/images/wide.png" alt="">Wide</a> \
			<a class="boxed" href="#" data-style="boxed"><img src="assets/plugins/style-switcher/images/boxed.png" alt="">Boxed</a> \
		</div><!-- layout --> \
		<h5>Change Pattern</h5> \
		<div class="patterns clearfix"> \
			<a class="pattern-1" href="#" data-style="pattern-1"></a> \
			<a class="pattern-2" href="#" data-style="pattern-2"></a> \
			<a class="pattern-3" href="#" data-style="pattern-3"></a> \
			<a class="pattern-4" href="#" data-style="pattern-4"></a> \
			<a class="pattern-5" href="#" data-style="pattern-5"></a> \
		</div><!-- pattern --> \
		<h5>Change Background</h5> \
		<div class="bg-patterns clearfix"> \
			<a class="bg-pattern-1" href="#" data-style="bg-pattern-1"></a> \
			<a class="bg-pattern-2" href="#" data-style="bg-pattern-2"></a> \
			<a class="bg-pattern-3" href="#" data-style="bg-pattern-3"></a> \
			<a class="bg-pattern-4" href="#" data-style="bg-pattern-4"></a> \
			<a class="bg-pattern-5" href="#" data-style="bg-pattern-5"></a> \
			<a class="bg-pattern-6" href="#" data-style="bg-pattern-6"></a> \
			<a class="bg-pattern-7" href="#" data-style="bg-pattern-7"></a> \
			<a class="bg-pattern-8" href="#" data-style="bg-pattern-8"></a> \
			<a class="bg-pattern-9" href="#" data-style="bg-pattern-9"></a> \
			<a class="bg-pattern-10" href="#" data-style="bg-pattern-10"></a> \
		</div><!-- pattern --> \
	\ ';
	
	$("#style-switcher").prepend(style_switch_content);
	
	$("#style-switcher > a").on("click", function(e) {
        
		e.preventDefault();
		$("#style-switcher").toggleClass("open");
		
    });
	
	
	var link = $('link[data-style="styles"]');
	var dakota_colors = $.cookie('dakota_colors'),
		dakota_layout = $.cookie('dakota_layout'),		
		dakota_bg_pattern = $.cookie('dakota_bg_pattern'),
		dakota_pattern = $.cookie('dakota_pattern');
		
	if (!($.cookie('dakota_colors'))) {
		
		$.cookie('dakota_colors', 'default', 365);
		dakota_colors = $.cookie('dakota_colors');
		$('#style-switcher .colors a[data-style="'+dakota_colors+'"]');
		
	} else {
		
		link.attr('href','assets/css/alternative-styles/' + dakota_colors + '.css');
		$('#style-switcher .colors a[data-style="'+dakota_colors+'"]');
		
	};

	if (!($.cookie('dakota_layout'))) {
		
		$.cookie('dakota_layout', 'wide', 365);
		dakota_layout = $.cookie('dakota_layout');
		$("body").addClass(dakota_layout);
		$('#style-switcher .layout a[data-style="wide"]');
		
	} else {
		
		if (dakota_layout=="boxed") {
			
			$("body").addClass(dakota_layout);
			$("body").removeClass("wide");
			
		} else { 
		
			$("body").addClass(dakota_layout);
			$("body").removeClass("boxed bg-pattern-1 bg-pattern-2 bg-pattern-3 bg-pattern-4 bg-pattern-5 bg-pattern-6 bg-pattern-7 bg-pattern-8 bg-pattern-9 bg-pattern-10");
			
		};
		
	};

	if ((dakota_layout =="boxed") && $.cookie('dakota_bg_pattern')) {
		
		$("body").removeClass("bg-pattern-1 bg-pattern-2 bg-pattern-3 bg-pattern-4 bg-pattern-5 bg-pattern-6 bg-pattern-7 bg-pattern-8 bg-pattern-9 bg-pattern-10 wide");
		$("body").addClass(dakota_bg_pattern); 
		
	} else { 
	
		if (dakota_layout =="boxed") {
			
			$("body").removeClass("bg-pattern-1 bg-pattern-2 bg-pattern-3 bg-pattern-4 bg-pattern-5 bg-pattern-6 bg-pattern-7 bg-pattern-8 bg-pattern-9 bg-pattern-10");
			
		} else {
			
			$("body").removeClass("bg-pattern-1 bg-pattern-2 bg-pattern-3 bg-pattern-4 bg-pattern-5 bg-pattern-6 bg-pattern-7 bg-pattern-8 bg-pattern-9 bg-pattern-10 boxed");
			
		}
		
	};

	if ($.cookie('dakota_pattern')) {
		
		$("body").removeClass("pattern-1 pattern-2 pattern-3 pattern-4 pattern-5");
		$("body").addClass(dakota_pattern); 
		
	};

	// CHANGE COLOR //
	$('#style-switcher .colors a').on('click',function(e) {
		
		var $this = $(this),
			dakota_colors = $this.data('style');
			
		e.preventDefault();
		
		link.attr('href', 'assets/css/alternative-styles/' + dakota_colors + '.css');
		$.cookie('dakota_colors', dakota_colors, 365);
				
	});

	// BOXED LAYOUT //
	$('#style-switcher .layout a.boxed').on('click',function(e) {
		
		e.preventDefault(); 
		
		$("body").addClass("boxed");
		$("body").removeClass("wide");
		$.cookie('dakota_layout', 'boxed', 365);
		
		if ($.cookie('dakota_bg_pattern')) {
			
			var dakota_bg_pattern = $.cookie('dakota_bg_pattern');
			
			$("body").removeClass("bg-pattern-1 bg-pattern-2 bg-pattern-3 bg-pattern-4 bg-pattern-5 bg-pattern-6 bg-pattern-7 bg-pattern-8 bg-pattern-9 bg-pattern-10");
			$("body").addClass(dakota_bg_pattern);
			
		}
		
		document.location.reload();
		
	});

	// WIDE LAYOUT
	$('#style-switcher .layout a.wide').on('click',function(e) {
		
		e.preventDefault(); 
		
		$("body").addClass("wide");
		$("body").removeClass("boxed bg-pattern-1 bg-pattern-2 bg-pattern-3 bg-pattern-4 bg-pattern-5 bg-pattern-6 bg-pattern-7 bg-pattern-8 bg-pattern-9 bg-pattern-10");
		$.cookie('dakota_layout', 'wide', 365);
		
		document.location.reload();
		
	});
	
	// CHANGE BACKGROUND PATTERNS //
	$('#style-switcher .bg-patterns a').on('click',function(e) {
		
		var $this = $(this),
			dakota_bg_pattern = $this.data('style');
			
		e.preventDefault();
			 
		$("body").removeClass("bg-pattern-1 bg-pattern-2 bg-pattern-3 bg-pattern-4 bg-pattern-5 bg-pattern-6 bg-pattern-7 bg-pattern-8 bg-pattern-9 bg-pattern-10 wide");
		$("body").addClass(dakota_bg_pattern);
		$("#style-switcher select").val("boxed");
		$.cookie('dakota_bg_pattern', dakota_bg_pattern, 365);
		
	});
	
	// CHANGE PATTERNS //
	$('#style-switcher .patterns a').on('click',function(e) {
		
		var $this = $(this),
			dakota_pattern = $this.data('style');
			
		e.preventDefault();
			 
		$("body").removeClass("pattern-1 pattern-2 pattern-3 pattern-4 pattern-5");
		$("body").addClass(dakota_pattern);
		$.cookie('dakota_pattern', dakota_pattern, 365);
		
	});

});    	