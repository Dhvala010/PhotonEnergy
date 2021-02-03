(function($) {
  "use strict";
    /* ========================================== 
	Header Mobile
	========================================== */
	// mobile_mainmenu create span
	$('.collapse .mobile_mainmenu li:has(ul)').prepend('<span class="arrow"><i class="fa fa-plus"></i></span>');

	$( "#mmenu_toggle" ).on('click', function() {
		$(this).toggleClass( "active" );

		if ($(this).hasClass( "active" )) {
			$('.mobile_nav').stop().slideDown();
		}else{
			$('.mobile_nav').stop().slideUp();
		}		
	});

	$(".mobile_mainmenu > li span.arrow").click(function() {
        $(this).parent().find("> ul").stop().slideToggle()
        $(this).toggleClass( "active" ); 
    });

})(jQuery);