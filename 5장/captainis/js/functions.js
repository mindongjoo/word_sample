window.$ = jQuery;
// 슬라이드 작동
    $(window).load(function() {
        $('#slider').nivoSlider({
        randomStart: true // Start on a random slide
    	});
    });

// 아래는 placeholder 적용 	
 $('input[placeholder], textarea[placeholder]').placeholder();

// remap jQuery to $
(function($){})(window.jQuery);


/* trigger when page is ready */
$(document).ready(function (){

	// your functions go here

});


/* optional triggers

$(window).load(function() {
	
});

$(window).resize(function() {
	
});

*/

