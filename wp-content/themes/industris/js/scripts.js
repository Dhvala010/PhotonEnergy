(function($) {
  	"use strict";
	/* ========================================== 
	Sticky Header Desktop
	========================================== */
	$(window).on("scroll", function(){
		var main_header_top = 1;

		if( $('.top-bar').length ){
		    var main_header_top = $('.top-bar').outerHeight();		    
		}else if( $('.header2 .main-header').length ){
		    var main_header_top = $('.header2 .main-header').outerHeight();		    
		}
		
	    if ($(window).scrollTop() >= main_header_top) {	    	
	        $('.is-sticky.header1').find('.main-header, .msticky').addClass('sticked');	        
	        $('.is-sticky.header2').find('.bg-second, .msticky').addClass('sticked');	        
	    }else {
	        $('.is-sticky.header1').find('.main-header, .msticky').removeClass('sticked');		              
	        $('.is-sticky.header2').find('.bg-second, .msticky').removeClass('sticked');		              
	    }
	});

	/* ========================================== 
	Search on Header
	========================================== */
	$('.toggle_search > i').on("click", function(){
        $(this).next().toggleClass('show');
        if ($(this).hasClass( "ion-md-search" )) {
			$(this).removeClass( "ion-md-search" ).addClass("ion-md-close");
        }else{
			$(this).removeClass( "ion-md-close" ).addClass("ion-md-search");
        }
    });

	//Back To Top
    if ($('#back-to-top').length) {
	    var scrollTrigger = 500, // px
	        backToTop = function () {
	            var scrollTop = $(window).scrollTop();
	            if (scrollTop > scrollTrigger) {
	                $('#back-to-top').addClass('show');
	            } else {
	                $('#back-to-top').removeClass('show');
	            }
	        };
	    backToTop();
	    $(window).on('scroll', function () {
	        backToTop();
	    });
	    $('#back-to-top').on('click', function (e) {
	        e.preventDefault();
	        $('html,body').animate({
	            scrollTop: 0
	        }, 700);
	    });	
    }

    // Scrooll to next div
    $("#scroll-next").on('click', function(e) {
    	e.preventDefault();
	    $('html,body').animate({
	        scrollTop: $(this).parents('.elementor-top-section').next().offset().top -=100
	    }, 1000);
	});

})(jQuery);