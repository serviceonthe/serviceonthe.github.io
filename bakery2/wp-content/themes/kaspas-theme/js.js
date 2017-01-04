function postToTwitter(input) {
	var inputValue = jQuery(input).val();
	inputValue.replace(' ','%20');
	var twitterStatusUrl = "http://twitter.com/home?status=@kaspasdesserts " + inputValue;
	window.open(twitterStatusUrl, '_blank')
}

jQuery(document).ready(function(){
	jQuery('input#posttwitterstatus').click(function(){
		postToTwitter('input#twitterstatusinput');
	});

	jQuery('*[data-menu-category]').click(function(){
		var menuCategory = jQuery(this).attr('data-menu-category');
		jQuery('.menu_category[data-menu-category]').addClass('span_6');
		jQuery('.menu_category[data-menu-category]').removeClass('span_12');
		jQuery('.menu_category[data-menu-category] .preview').removeClass('span_6');
		jQuery('.menu_category[data-menu-category] .preview').addClass('span_12');
		jQuery('*[data-menu-category]').removeClass('active');

		jQuery('*[data-menu-category="'+menuCategory+'"]').toggleClass('active');
		jQuery('.menu_category[data-menu-category="'+menuCategory+'"]').toggleClass('span_6');
		jQuery('.menu_category[data-menu-category="'+menuCategory+'"]').toggleClass('span_12');		
		jQuery('.menu_category[data-menu-category="'+menuCategory+'"] .preview').toggleClass('span_6');
		jQuery('.menu_category[data-menu-category="'+menuCategory+'"] .preview').toggleClass('span_12');
	});

	jQuery('.franchise-button').click(function(){
		jQuery('#contact-form-bg').fadeIn();
	});
	jQuery('#contact-form-bg, #close-form-container').click(function(){
		jQuery('#contact-form-bg').fadeOut();
	});
	jQuery('#contact-form-bg #contact-form-container').click(function(e){
		e.stopPropagation();
	});

	jQuery(document).on('click', 'a.show-hide', function(){
		jQuery('div#cbp-spmenu').toggle();
	});

	if(jQuery('.food_item').length){
		var count = 0;
		var indPrev = 0;
		var height1 = 0;
		var height2 = 0;
		var setHeight = 0;
		jQuery('.food_item').each(function(index){
			count++;
			if(count === 2){
				height2 = jQuery(this).height();
				if(height1 > height2){
					setHeight = height1;
				}
				else {
					setHeight = height2;
				}
				jQuery(this).height(setHeight);
				jQuery('.food_item').eq(indPrev).height(setHeight);
				
				indPrev = 0;
				height1 = 0;
				height2 = 0;
				setHeight = 0;
				count = 0;
			}
			else{
				height1 = jQuery(this).height();
				indPrev = index;
			}
		});
	}
});