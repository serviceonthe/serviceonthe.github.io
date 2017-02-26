(function($) {
"use strict";
    $.fn.rotateme = function(params){
        return this.each(function(index, el){
            var defaults = {
                text : [],
                interval : 2000
            };
            
            var options = $.extend({}, defaults, params);
            var i = 0;
            
            if(options.text.length){
                setInterval(function(){
                    i = i < options.text.length -1 ? ++i : 0;
                    $(el).fadeOut(function(){ 
                        $(this).text(options.text[i]).fadeIn();
                    });
                }, options.interval);
            }
        });
    };
})(jQuery);