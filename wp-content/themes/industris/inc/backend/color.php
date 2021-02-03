<?php 

//Custom Style Frontend
if(!function_exists('industris_color_scheme')){
    function industris_color_scheme(){
        $color_scheme = '';

        //Main Color
        if( industris_get_option('main_color') != '#ffd100' ){
            $color_scheme = 
            '

            	/*Background Color*/
    			blockquote:before,
                .bg-primary,
                .btn,
                .btn.btn-second:hover, .btn.btn-second:focus,
                .main-navigation li ul a:hover,
                .page-pagination li span, .page-pagination li a:hover,
                .blog-post .tagcloud a:hover,
                .comments-area .comment-item .comment-reply a:hover,
                .widget .tagcloud a:hover,
                .site-content .widget ul:not(.recent-news) > li a:hover,
                .site-content .widget ul:not(.recent-news) > li.current-menu-item a,
                .slick-dotted .slick-dots li.slick-active button,
                .ot-button .btn.has-icon i,
                .process-bar .step-item .line,
                .video-popup a:hover,
                .featured-projects-with-nav .project-info-nav-wraper .project-info-nav-inner,
                .mc4wp-form button,
                #back-to-top,
                .woocommerce table.cart td.actions button.button,
                .woocommerce .wc-proceed-to-checkout a.checkout-button,
                .woocommerce span.onsale,
                .woocommerce ul.products li.product .product-info a.add_to_cart_button, .woocommerce ul.products li.product .product-info a.added_to_cart,
                .content-woocommerce nav.woocommerce-pagination ul.page-numbers li span.current, .content-woocommerce nav.woocommerce-pagination ul.page-numbers li a:hover,
                .inner-content-wrap button.button.alt, .inner-content-wrap a.button.wc-forward,
                .inner-content-wrap div.product div.woocommerce-tabs #reviews .form-submit #submit,
                form.woocommerce-checkout .woocommerce-checkout-payment button.button.alt,
                .woocommerce form.woocommerce-form-coupon button.button, .woocommerce form.woocommerce-form-login button.button,
                .woocommerce .return-to-shop a.button,
                .woocommerce-account .woocommerce form.login button.button, .woocommerce-account .woocommerce form.lost_reset_password button.button, .woocommerce-account .woocommerce form.register button.button, .woocommerce-account .woocommerce form.edit-account button.button,
                .product-sidebar .widget_price_filter .price_slider_wrapper .ui-widget-content .ui-slider-range,
                .product-sidebar .widget_price_filter .price_slider_wrapper .ui-widget-content .ui-slider-handle,
                .product-sidebar .widget_price_filter .price_slider_wrapper .price_slider_amount button{background: '.industris_get_option('main_color').'}

                /*Border Color*/
                .page-pagination li span, .page-pagination li a:hover,
                .slick-dotted .slick-dots li.slick-active,
                .process-bar .step-item .line:before,
                .woocommerce ul.products li.product:hover .product-thumbnail,
                .content-woocommerce nav.woocommerce-pagination ul.page-numbers li span.current, .content-woocommerce nav.woocommerce-pagination ul.page-numbers li a:hover,
                .inner-content-wrap div.product div.images .flex-control-thumbs > li img.flex-active{border-color: '.industris_get_option('main_color').'}

                /*Border-top Color*/
                .main-navigation li ul{border-top-color: '.industris_get_option('main_color').'}

    			/*Color*/
			    .text-primary,
                a:hover, a:focus, a:active,
                .top-bar a:hover,
                .toggle_search .icon:hover,
                .info-list li i,
                .header2 .cart-btn .cart-header:hover,
                .main-navigation .menu-main-menu-container > ul > li.menu-item-has-children:hover > a:after,
                .main-navigation .menu-main-menu-container > ul > li.current-menu-ancestor > a, .main-navigation .menu-main-menu-container > ul > li.current-menu-ancestor > a:after,
                .main-navigation li.current-menu-item > a,
                .header2 .main-navigation .menu-main-menu-container > ul > li > a:hover,
                .header2 .main-navigation .menu-main-menu-container > ul > li.current-menu-ancestor > a, .header2 .main-navigation .menu-main-menu-container > ul > li.current-menu-item > a,
                .header_mobile .mobile_nav .mobile_mainmenu li li a:hover,.header_mobile .mobile_nav .mobile_mainmenu ul > li > ul > li.current-menu-ancestor > a,
                .header_mobile .mobile_nav .mobile_mainmenu > li > a:hover, .header_mobile .mobile_nav .mobile_mainmenu > li.current-menu-item > a,.header_mobile .mobile_nav .mobile_mainmenu > li.current-menu-ancestor > a,
                .page-header,
                .page-header .breadcrumbs li a:hover,
                .post-box .inner-post h4 a:hover,
                .post-box:hover .post-link,
                .rm-link.dark:hover,
                .btn-details.light:hover, .btn-details.light:visited:hover,
                .iarrow .slick-arrow:not(.slick-disabled):hover,
                .industris-slides-wrapper .slick-arrow:hover,
                .team-wrap .team-social a:hover,
                .video-popup a,
                .testi-slider.no_shadow .testimonial-wrap i,
                .grid-projects .project-item .pmeta a:hover,
                .grid-projects .project-item h4 a:hover,
                .grid-projects .project-item .btn-details,
                .project-filter .cat-filter a.selected, .project-filter .cat-filter a:hover,
                .grid-services .service-item .service-info a:hover,
                .news-slider .post-box .inner-post h4 a:hover,
                .fun-facts .counter-wrapper i,
                .fun-facts .counter-wrapper .counter-title, .fun-facts .counter-wrapper .counter-number,
                .main-footer ul a:hover,
                .ot-socials a:hover,
                .woocommerce table.cart td a,
                .woocommerce .cart-collaterals table tbody tr td,
                .woocommerce ul.products li.product .product-info h2.woocommerce-loop-product__title:hover,
                .woocommerce ul.products li.product .product-info .price-rate .price,
                .inner-content-wrap div.entry-summary p.price,
                .inner-content-wrap div.entry-summary span.price,
                .inner-content-wrap .product_meta > span a:hover,
                .woocommerce p.stars a, .woocommerce .star-rating,
                .woocommerce p.stars a:before, .woocommerce .star-rating:before,
                form.woocommerce-checkout .woocommerce-checkout-review-order table tbody td.product-total,
                form.woocommerce-checkout .woocommerce-checkout-review-order table tfoot td, form.woocommerce-checkout .woocommerce-checkout-review-order table tfoot strong,
                .woocommerce .woocommerce-form-coupon-toggle .woocommerce-info .showcoupon, .woocommerce .woocommerce-form-coupon-toggle .woocommerce-info .showlogin, .woocommerce .woocommerce-form-login-toggle .woocommerce-info .showcoupon, .woocommerce .woocommerce-form-login-toggle .woocommerce-info .showlogin,
                .woocommerce-account .woocommerce nav.woocommerce-MyAccount-navigation ul > li a:hover,
                .product-sidebar .product-categories li.current-cat > a,
                .product-sidebar .widget_recent_reviews ul.product_list_widget li .product-title:hover, .product-sidebar .widget_top_rated_products ul.product_list_widget li .product-title:hover, .product-sidebar .widget_products ul.product_list_widget li .product-title:hover{color: '.industris_get_option('main_color').'} 
                .woocommerce table.cart td a.remove{color: '.industris_get_option('main_color').'!important}

			';
        }

        //Second Color
        if( industris_get_option('second_color') != '#03132b' ){
            $color_scheme .= '
    
                /*Background Color*/
                .bg-second,
                .btn:hover, .btn:focus,
                .btn.btn-second,
                .btn.btn-outline:hover, .btn.btn-outline:focus,
                .top-bar,
                .header2 .main-header,
                #mmenu_toggle button,
                #mmenu_toggle button:before,
                #mmenu_toggle button:after,
                .ot-button .btn.btn-main i,
                .site-footer,
                .woocommerce table.cart td.actions button.button:hover, .woocommerce table.cart td.actions button.button:focus,
                .woocommerce .wc-proceed-to-checkout a.checkout-button:hover, .woocommerce .wc-proceed-to-checkout a.checkout-button:focus,
                .woocommerce ul.products li.product .product-info a.added_to_cart:hover,
                .woocommerce ul.products li.product .product-info a.add_to_cart_button:hover,
                .inner-content-wrap button.button.alt:hover, .inner-content-wrap button.button.alt:focus, .inner-content-wrap a.button.wc-forward:hover, .inner-content-wrap a.button.wc-forward:focus,
                .inner-content-wrap div.product div.woocommerce-tabs #reviews .form-submit #submit:hover, .inner-content-wrap div.product div.woocommerce-tabs #reviews .form-submit #submit:focus,
                form.woocommerce-checkout .woocommerce-checkout-payment button.button.alt:hover, form.woocommerce-checkout .woocommerce-checkout-payment button.button.alt:focus,
                .woocommerce form.woocommerce-form-coupon button.button:hover, .woocommerce form.woocommerce-form-coupon button.button:focus, .woocommerce form.woocommerce-form-login button.button:hover, .woocommerce form.woocommerce-form-login button.button:focus,
                .woocommerce .return-to-shop a.button:hover, .woocommerce .return-to-shop a.button:focus,
                .woocommerce-account .woocommerce form.login button.button:hover, .woocommerce-account .woocommerce form.login button.button:focus, .woocommerce-account .woocommerce form.lost_reset_password button.button:hover, .woocommerce-account .woocommerce form.lost_reset_password button.button:focus, .woocommerce-account .woocommerce form.register button.button:hover, .woocommerce-account .woocommerce form.register button.button:focus, .woocommerce-account .woocommerce form.edit-account button.button:hover, .woocommerce-account .woocommerce form.edit-account button.button:focus,
                .product-sidebar .widget_price_filter .price_slider_wrapper .price_slider_amount button:hover{background: '.industris_get_option('second_color').'}

                /*Border Color*/
                .btn.btn-outline:hover, .btn.btn-outline:focus{border-color: '.industris_get_option('second_color').'}

                /*Color*/
                h1, h2, h3, h4, h5, h6,
                a.text-primary:hover,
                .text-second,
                .btn.btn-second:hover, .btn.btn-second:focus,
                .btn.btn-outline,
                a,
                a:visited,
                .main-navigation li ul a:hover,
                .post-box .inner-post .entry-meta a:hover,
                .btn-details:hover,.btn-details:visited:hover,
                .blog-post .tagcloud a:hover,
                .comments-area .comment-reply-title small a:hover,
                .comments-area .comment-item .comment-reply a:hover,
                .comment-form .logged-in-as a:hover,
                .widget .tagcloud a:hover,
                .site-content .widget ul:not(.recent-news) > li a:hover,
                .site-content .widget ul:not(.recent-news) > li a:hover + span,
                .site-content .widget ul:not(.recent-news) > li.current-menu-item a,
                .search-form .search-submit:hover,
                .widget .recent-news h6 a:hover,
                .rm-link.light:hover,
                .btn-details.dark, .btn-details.dark:visited,
                .process-bar i,
                .process-bar h6,
                .featured-projects-with-nav .project-info-nav-wraper .slide-controls.iarrow .slick-arrow:not(.slick-disabled):hover,
                .featured-projects-with-nav .project-info-nav-wraper .custom-dots li.slick-active a,
                .news-slider .post-box .inner-post h4 a,
                div.elementor-widget-heading.elementor-widget-heading .elementor-heading-title,
                .mc4wp-form button,
                .woocommerce ul.products li.product .product-info a.add_to_cart_button, .woocommerce ul.products li.product .product-info a.added_to_cart,
                .inner-content-wrap div.entry-summary .product_title,
                .woocommerce .cart .quantity .qty{color: '.industris_get_option('second_color').'}
            ';
        }

        if(! empty($color_scheme)){
			echo '<style type="text/css">'.$color_scheme.'</style>';
		}
    }
}
add_action('wp_head', 'industris_color_scheme');