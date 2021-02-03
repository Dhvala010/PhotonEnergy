( function( $ ) {
    'use strict';

    //Main Slider
    var mainSlider = function ( $scope, $ ) {
        $scope.find( '.industris-slides-wrapper' ).each( function () {
            var $selector = $( this ).find( '.industris-slides' ),
                elementSettings = $selector.data( 'slider_options' ),
                $arrow_wrapper = $( this ).find( '.arrows-inner' ),
                slidesToShow = parseInt( elementSettings.slidesToShow );

            $selector.not( '.slick-initialized' ).slick( {
                rtl          : $( 'body' ).hasClass( 'rtl' ),
                slidesToShow : slidesToShow,
                arrows       : elementSettings.arrows,
                appendArrows : $arrow_wrapper,
                dots         : elementSettings.dots,
                infinite     : elementSettings.infinite,
                prevArrow    : '<span class="slick-prev-arrow"><i class="ion ion-ios-arrow-dropleft"></i></span>',
                nextArrow    : '<span class="slick-next-arrow"><i class="ion ion-ios-arrow-dropright"></i></span>',
                autoplay     : elementSettings.autoplay,
                autoplaySpeed: parseInt( elementSettings.autoplaySpeed ),
                speed        : parseInt( elementSettings.speed ),
                fade         : elementSettings.fade,
                pauseOnHover : elementSettings.pauseOnHover,
                responsive: [
                    {
                        breakpoint: 1199,
                        settings: {
                            arrows: false,
                            dots: true
                        }
                    }
                ]
            } );

            var animation = $selector.data( 'animation' );

            
            $selector
                .on( 'beforeChange', function () {
                    var $sliderContent = $selector.find( '.industris-slide-content' ),
                        $sliderBackground = $selector.find( '.slick-slide-bg' ),
                        $sliderPriceBox = $selector.find( '.industris-slide-price-box' );
                    $sliderContent.each( function () {
                        var content_animation = $(this).data( 'animation' );
                        if( content_animation === 'inherit' ){
                            if( animation ){
                                $(this).removeClass( 'animated' + ' ' + animation ).hide();
                            }else{
                                $(this).hide();
                            }
                        }else{
                            $(this).removeClass( 'animated' + ' ' + content_animation ).hide();
                        }
                    } );

                    $sliderBackground.each( function () {
                        var bg_animation = $(this).data( 'animation' );
                        if( bg_animation === 'inherit' ){
                            if( animation ){
                                $(this).removeClass( 'animated' + ' ' + animation ).hide();
                            }else{
                                $(this).hide();
                            }
                        }else{
                            $(this).removeClass( 'animated' + ' ' + bg_animation ).hide();
                        }
                    } );

                } )
                .on( 'afterChange', function ( event, slick, currentSlide ) {
                    var $currentSlide = $( slick.$slides.get( currentSlide ) ),
                        current_content_animation = $currentSlide.find( '.industris-slide-content' ).data('animation'),
                        current_bg_animation = $currentSlide.find( '.slick-slide-bg' ).data('animation'),
                        $currentPriceBox = $currentSlide.find( '.industris-slide-price-box' );
                    if( current_content_animation === 'inherit' ){
                        if( animation ){
                            $currentSlide.find( '.industris-slide-content' ).show().addClass( 'animated' + ' ' + animation );
                        }else{
                            $currentSlide.find( '.industris-slide-content' ).show();
                        }
                    }else{
                        $currentSlide.find( '.industris-slide-content' ).show().addClass( 'animated' + ' ' + current_content_animation );
                    }

                    if( current_bg_animation === 'inherit' ){
                        if( animation ){
                            $currentSlide.find( '.slick-slide-bg' ).show().addClass( 'animated' + ' ' + animation );
                        }else{
                            $currentSlide.find( '.slick-slide-bg' ).show();
                        }
                    }else{
                        $currentSlide.find( '.slick-slide-bg' ).show().addClass( 'animated' + ' ' + current_bg_animation );
                    }
                } );
        } );
    };

    /*Main Slides 2*/
    var mainSlider2 = function ( $scope, $ ) {
        $scope.find( '.industris-slides-s2-wrapper' ).each( function () {
            var $selector     = $( this ),
                slideControls = $selector.find('.slide-controls-s2');
            
            $selector.find('.item-slides-bg').not( '.slick-initialized' ).slick({
                infinite: true,
                swipe: true,
                slidesToShow: 1,
                slidesToScroll: 1,
                asNavFor: '.slides-content-inner',
                autoplay: true,
                autoplaySpeed: 7000,
                adaptiveHeight: true,
                arrows: false,
                prevArrow: '<button type="button" class="prev-nav"><i class="icon ion-ios-arrow-dropleft"></i></button>',
                nextArrow: '<button type="button" class="next-nav"><i class="icon ion-ios-arrow-dropright"></i></button>',
                responsive: [
                    {
                        breakpoint: 1199,
                        settings: {
                            arrows: true,
                        }
                    }
                ]
            });

            $selector.find('.slides-content-inner').not( '.slick-initialized' ).slick({
                infinite: true,
                slidesToShow: 1,
                slidesToScroll: 1,
                asNavFor: '.item-slides-bg',
                autoplay: false,
                arrows: true,
                dots: false,
                focusOnSelect: true,
                fade: true,
                prevArrow: slideControls.find('.prev-nav'),
                nextArrow: slideControls.find('.next-nav'),
                appendArrows: slideControls,
                responsive: []
            });

            var currentSlide = $selector.find('.item-slides-bg').find('.slick-slide.slick-current').next().find('img').attr('src');
                slideControls.css('background-image', 'url("' + currentSlide + '")');
            $selector.find('.item-slides-bg')
                .on('beforeChange', function(event, slick, currentSlide, nextSlide){ 
                    var current_img_src = slideControls.css('background-image');
                    if(current_img_src != 'none'){
                        slideControls.css('background-image',' ');
                    }
                    
                } )
                .on('afterChange', function(event, slick, currentSlide, nextSlide){   
                    var dataId = $(slick.$slides[currentSlide]).data('slick-index'),
                        next_img_src = $('.slick-slide[data-slick-index=' + (dataId + 1) + ']').find('img').attr('src');
                    slideControls.css('background-image', 'url("' + next_img_src + '")');
                });
        });
    };

    /* Image Carousel */
    var imageCarousel = function ( $scope, $ ) {
        $scope.find( '.image-carousel' ).each( function () {
            var $selector = $( this ),
                $show    = $selector.data('show'),
                $m1_show  = ( $show < 5 ) ? $show : 4,
                $m2_show  = ( $show == 1 ) ? $show : 2,
                $dots    = $selector.data('dots'),
                $auto    = $selector.data('auto'),
                $arrow   = $selector.data('arrow');

            $selector.not( '.slick-initialized' ).slick( {
                infinite: true,
                slidesToShow: $show,
                slidesToScroll: 1,
                arrows: $arrow,
                dots: $dots,
                autoplay: $auto,
                autoplaySpeed: 6000,
                prevArrow: '<button type="button" class="prev-nav"><i class="icon ion-ios-arrow-dropleft"></i></button>',
                nextArrow: '<button type="button" class="next-nav"><i class="icon ion-ios-arrow-dropright"></i></button>',
                responsive: [
                    {
                        breakpoint: 991,
                        settings: {
                            slidesToShow: $m1_show,
                            slidesToScroll: 1,
                            arrows: false,
                            dots: false
                        }
                    },
                    {
                        breakpoint: 767,
                        settings: {
                            slidesToShow: $m2_show,
                            slidesToScroll: 1,
                            arrows: false,
                            dots: false
                        }
                    },
                    {
                        breakpoint: 480,
                        settings: {
                            slidesToShow: 1,
                            slidesToScroll: 1,
                            arrows: false,
                            dots: false
                        }
                    }
                ]
            } );
        } );
    };

    /*Counter*/
    var counter = function () {
        var a = 0;
        $(window).scroll(function() {
            var oTop = $('.counter-wrapper').offset().top - window.innerHeight;
            if ( a == 0 && $(window).scrollTop() > oTop ) {
                $('.number').each(function() {
                    var $this   = $(this),
                        countTo = $this.attr('data-to');
                    $({
                        countNum: $this.text()
                    }).animate({
                        countNum: countTo
                    },
                    {
                        duration: 6000,
                        easing: 'swing',
                        step: function() {
                            $this.text(Math.floor(this.countNum));
                        },
                        complete: function() {
                            $this.text(this.countNum);
                        }
                    });
                });
                a = 1;
            }
        });
    }

    //Project Filter
    var portfolioFilter = function () {
        var $container = $('#projects');
        $container.isotope({
            itemSelector: '.project-item',
            filter: '*'
        });

        $('#filters a').on("click", function() {
            var $this = $(this);
            if ($this.hasClass('selected')) {
                return false;
            }
            var $optionSet = $this.parents();
            $optionSet.find('.selected').removeClass('selected');
            $this.addClass('selected');
            var selector = $(this).attr('data-filter');
            $container.isotope({
                filter: selector
            });
            return false;
        });
    }

    //Portfolio Slider
    var portfolioSlider = function ( $scope , $ ) {
        $scope.find('.project-slider').each( function(){
            var $selector = $(this),
                $show   = $selector.data('show'),
                $arr    = $selector.data('arrow'),
                $dots   = $selector.data('dots'),
                $mshow  = $show,
                $marr   = $arr,
                $mdots  = $dots;
                if( $show == 4 ){ $mshow = $show - 1; }
                if( $(this).hasClass('arrow-s2') ){ $marr = false; $mdots = true; }
            $selector.not( '.slick-initialized' ).slick({
                slidesToShow: $show,
                slidesToScroll: 1,
                arrows: $arr,
                dots: $dots,
                autoplay: true,
                autoplaySpeed: 6000,
                adaptiveHeight: true,
                prevArrow: '<button type="button" class="prev-nav"><i class="icon ion-ios-arrow-dropleft"></i></button>',
                nextArrow: '<button type="button" class="next-nav"><i class="icon ion-ios-arrow-dropright"></i></button>',
                responsive: [
                    {
                        breakpoint: 1199,
                        settings: {
                            slidesToShow: $mshow,
                            slidesToScroll: 1,
                            infinite: true,
                            arrows: $arr,
                            dots: $dots
                        }
                    },
                    {
                        breakpoint: 991,
                        settings: {
                            slidesToShow: 2,
                            slidesToScroll: 1,
                            infinite: true,
                            arrows: $marr,
                            dots: $mdots
                        }
                    },
                    {
                        breakpoint: 600,
                        settings: {
                            slidesToShow: 1,
                            slidesToScroll: 1,
                            arrows: false,
                            dots: true
                        }
                    }
                ]
            });
        } );
    }

    //Portfolio Featured
    var portfolioFeatured = function ( $scope, $ ) {
        $scope.find('.featured-projects').each( function () {
            var $selector = $(this),
                $arr      = $selector.data('arrow'),
                $dots     = $selector.data('dots'),
                $marr     = $arr,
                $mdots    = $dots;
                if( $(this).hasClass('arrow-s2') ){ $marr = false; $mdots = true; }
            $selector.not( '.slick-initialized' ).slick({
                slidesToShow: 1,
                slidesToScroll: 1,
                arrows: $arr,
                dots: $dots,
                autoplay: true,
                autoplaySpeed: 6000,
                adaptiveHeight: true,
                prevArrow: '<button type="button" class="prev-nav"><i class="icon ion-ios-arrow-dropleft"></i></button>',
                nextArrow: '<button type="button" class="next-nav"><i class="icon ion-ios-arrow-dropright"></i></button>',
                responsive: [
                    {
                        breakpoint: 1199,
                        settings: {
                            slidesToShow: 1,
                            slidesToScroll: 1,
                            infinite: true,
                            arrows: $arr,
                            dots: $dots
                        }
                    },
                    {
                        breakpoint: 991,
                        settings: {
                            slidesToShow: 1,
                            slidesToScroll: 1,
                            infinite: true,
                            arrows: $marr,
                            dots: $mdots
                        }
                    },
                    {
                        breakpoint: 767,
                        settings: {
                            slidesToShow: 1,
                            slidesToScroll: 1,
                            arrows: false,
                            dots: true
                        }
                    },
                    {
                        breakpoint: 480,
                        settings: {
                            slidesToShow: 1,
                            slidesToScroll: 1,
                            arrows: false,
                            dots: true
                        }
                    }
                ]
            });
        });
    }

    //Portfolio Featured 2
    var portfolioFeatured2 = function ( $scope, $ ) {
        $scope.find( '.featured-projects-with-nav' ).each( function () {
            var $selector     = $( this ),
                slideControls = $selector.find('.slide-controls');
            
            $selector.find('.projects-image').not( '.slick-initialized' ).slick({
                infinite: false,
                swipe: true,
                slidesToShow: 1,
                slidesToScroll: 1,
                asNavFor: '.project-info-nav-inner',
                autoplay: true,
                autoplaySpeed: 7000,
                adaptiveHeight: true,
                arrows: false,
                prevArrow: '<button type="button" class="prev-nav"><i class="icon ion-ios-arrow-dropleft"></i></button>',
                nextArrow: '<button type="button" class="next-nav"><i class="icon ion-ios-arrow-dropright"></i></button>',
                responsive: []
            });

            $selector.find('.project-info-nav-inner').not( '.slick-initialized' ).slick({
                infinite: false,
                slidesToShow: 1,
                slidesToScroll: 1,
                asNavFor: '.projects-image',
                autoplay: false,
                arrows: true,
                dots: true,
                focusOnSelect: true,
                fade: true,
                prevArrow: slideControls.find('.prev-nav'),
                nextArrow: slideControls.find('.next-nav'),
                appendDots: slideControls,
                appendArrows: slideControls,
                dotsClass: 'custom-dots',
                customPaging : function(slider, i) {
                    return '<a class="dot">'+ 0 +(i+1)+'</a>';
                },
                responsive: []
            });
        });
    }

    //Testimonial Slider
    var testimonialSlider = function ( $scope, $ ) {
        $scope.find('.testi-slider').each( function () {
            var $selector = $(this),
                $fade     = false,
                $show     = $selector.data('show'),
                $arr      = $selector.data('arrow'),
                $dots     = $selector.data('dots'),
                $marr     = $arr,
                $mdots    = $dots;
                if( $(this).hasClass('arrow-s2') ){ $marr = false; $mdots = true; }
                if( $selector.data('fade') ){ $fade = $selector.data('fade'); }
            $selector.not( '.slick-initialized' ).slick({
                slidesToShow: $show,
                slidesToScroll: 1,
                arrows: $arr,
                dots: $dots,
                autoplay: true,
                autoplaySpeed: 6000,
                adaptiveHeight: true,
                fade: $fade,
                prevArrow: '<button type="button" class="prev-nav"><i class="icon ion-ios-arrow-dropleft"></i></button>',
                nextArrow: '<button type="button" class="next-nav"><i class="icon ion-ios-arrow-dropright"></i></button>',
                responsive: [
                    {
                        breakpoint: 991,
                        settings: {
                            slidesToShow: 1,
                            slidesToScroll: 1,
                            infinite: true,
                            arrows: $marr,
                            dots: $mdots
                        }
                    },
                    {
                        breakpoint: 767,
                        settings: {
                            slidesToShow: 1,
                            slidesToScroll: 1,
                            arrows: false,
                            dots: true
                        }
                    },
                    {
                        breakpoint: 480,
                        settings: {
                            slidesToShow: 1,
                            slidesToScroll: 1,
                            arrows: false,
                            dots: true
                        }
                    }
                ]
            });
        });
    }

    //Popup Video
    var videoPopup = function () {
        var $video_play = $('.video-popup a');
        if ($video_play.length > 0 ) {
            $video_play.magnificPopup({
                type: 'iframe',
                removalDelay: 160,
                preloader: true,
                fixedContentPos: true,
                callbacks: {
                beforeOpen: function() {
                        this.st.image.markup = this.st.image.markup.replace('mfp-figure', 'mfp-figure mfp-with-anim');
                        this.st.mainClass = this.st.el.attr('data-effect');
                    }
                },
            });
        }
    }

    /*Latest News*/
    var latestNews = function ( $scope, $ ) {
        $scope.find( '.news-slider' ).each( function () {
            var $selector = $( this ),
                $show = $selector.data('show'),
                $dot  = $selector.data('dots'),
                $auto = $selector.data('auto'),
                $arrow = $selector.data('arrow'),
                $m_show = $show;

            $selector.not( '.slick-initialized' ).slick( {
                infinite: false,
                slidesToShow: $show,
                slidesToScroll: 1,
                arrows: $arrow,
                dots: $dot,
                autoplay: $auto,
                autoplaySpeed: 6000,
                prevArrow: '<button type="button" class="prev-nav"><i class="icon ion-ios-arrow-dropleft"></i></button>',
                nextArrow: '<button type="button" class="next-nav"><i class="icon ion-ios-arrow-dropright"></i></button>',
                responsive: [
                    {
                        breakpoint: 991,
                        settings: {
                            slidesToShow: 1,
                            slidesToScroll: 1,
                            arrows: false,
                            dots: true
                        }
                    },
                ]
            } );
        } );
    };

    /*Icon box Slide*/
    var iconBox = function ( $scope, $ ) {
        $scope.find( '.icon-box-slider' ).each( function () {
            var $selector = $( this ),
                $show = $selector.data('show'),
                $dot  = $selector.data('dots'),
                $auto = $selector.data('auto'),
                $arrow = $selector.data('arrow'),
                $m_show = $show;

            $selector.not( '.slick-initialized' ).slick( {
                infinite: true,
                slidesToShow: $show,
                slidesToScroll: 1,
                arrows: $arrow,
                dots: $dot,
                autoplay: $auto,
                autoplaySpeed: 6000,
                prevArrow: '<button type="button" class="prev-nav"><i class="icon ion-ios-arrow-dropleft"></i></button>',
                nextArrow: '<button type="button" class="next-nav"><i class="icon ion-ios-arrow-dropright"></i></button>',
                responsive: [
                    {
                        breakpoint: 991,
                        settings: {
                            slidesToShow: 1,
                            slidesToScroll: 1,
                            arrows: false,
                            dots: true
                        }
                    },
                ]
            } );
        } );
    };

    /**
     * Elementor JS Hooks
     */
    $(window).on("elementor/frontend/init", function () {

        //Main Slider
        elementorFrontend.hooks.addAction(
            "frontend/element_ready/imainslider.default",
            mainSlider
        );

        //Main Slider 2
        elementorFrontend.hooks.addAction(
            "frontend/element_ready/islides2.default",
            mainSlider2
        );

        /*Image Carousel*/
        elementorFrontend.hooks.addAction(
            "frontend/element_ready/industris-image-carousel.default",
            imageCarousel
        );

        //Project Filter
        elementorFrontend.hooks.addAction(
            "frontend/element_ready/ipfilter.default",
            portfolioFilter
        );

        //Project Slider
        elementorFrontend.hooks.addAction(
            "frontend/element_ready/irprojects.default",
            portfolioSlider
        );

        //Project Featured
        elementorFrontend.hooks.addAction(
            "frontend/element_ready/ifprojects.default",
            portfolioFeatured
        );

        //Project Featured2
        elementorFrontend.hooks.addAction(
            "frontend/element_ready/ifprojects2.default",
            portfolioFeatured2
        );

        //Testimonial Slider
        elementorFrontend.hooks.addAction(
            "frontend/element_ready/itestimonials.default",
            testimonialSlider
        );

        //Video Popup
        elementorFrontend.hooks.addAction(
            "frontend/element_ready/ivideopopup.default",
            videoPopup
        );

        /*Latest News*/
        elementorFrontend.hooks.addAction(
            "frontend/element_ready/industris-latest-news.default",
            latestNews
        );

        /*Icon box*/
        elementorFrontend.hooks.addAction(
            "frontend/element_ready/iiconbox_carousel.default",
            iconBox
        );

        /*Counter*/
        elementorFrontend.hooks.addAction(
            "frontend/element_ready/industris-fun-facts.default",
            counter
        );

    });

} )( jQuery );