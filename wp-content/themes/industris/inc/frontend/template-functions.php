<?php
/**
 * Functions which enhance the theme by hooking into WordPress
 *
 * @package Industris
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function industris_body_classes( $classes ) {
	// Adds a class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}

	// Add a class if there is a custom header.
	if ( industris_get_option('preload') != false ){
		$classes[] = 'royal_preloader';
	}

	return $classes;
}
add_filter( 'body_class', 'industris_body_classes' );

/**
 * Add a pingback url auto-discovery header for single posts, pages, or attachments.
 */
function industris_pingback_header() {
	if ( is_singular() && pings_open() ) {
		echo '<link rel="pingback" href="', esc_url( get_bloginfo( 'pingback_url' ) ), '">';
	}
}
add_action( 'wp_head', 'industris_pingback_header' );

//Get layout post & page.
if ( ! function_exists( 'industris_get_layout' ) ) :
	function industris_get_layout() {
		// Get layout.
		if( is_page() && !is_home() ) {
			$page_layout = rwmb_meta('page_layout');
		}else{
			$page_layout = industris_get_option( 'blog_layout' );
		}

		return $page_layout;
	}
endif;

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
if ( ! function_exists( 'industris_content_columns' ) ) :
	function industris_content_columns() {

		$blog_content_width = array();

		// Check if layout is one column.
		if ( 'content-sidebar' === industris_get_layout() && is_active_sidebar( 'primary' ) ) {
			$blog_content_width[] = 'col-lg-8 col-md-8 col-sm-12 col-xs-12';
		}elseif ('sidebar-content' === industris_get_layout() && is_active_sidebar( 'primary' ) ) {
			$blog_content_width[] = 'col-lg-8 col-md-8 col-sm-12 col-xs-12 pull-right';
		}else{
			$blog_content_width[] = 'col-lg-12 col-md-12 col-sm-12 col-xs-12';
		}

		// return the $classes array
    	echo implode( ' ', $blog_content_width );
	}
endif;

if(!function_exists('industris_custom_frontend_scripts')){
    function industris_custom_frontend_scripts(){
    ?>  
      <?php if ( industris_get_option('preload') != false ){ ?>
        <script type="text/javascript">
            window.jQuery = window.$ = jQuery;  
            (function($) { "use strict";
            	//Preloader
				Royal_Preloader.config({
					mode           : 'logo',
					logo           : '<?php echo industris_get_option('preload_logo'); ?>',
					logo_size      : [<?php echo industris_get_option('preload_logo_width'); ?>, <?php echo industris_get_option('preload_logo_height'); ?>],
					showProgress   : true,
					showPercentage : true,
			        text_colour: '<?php echo industris_get_option('preload_text_color'); ?>',
                    background:  '<?php echo industris_get_option('preload_bgcolor'); ?>'
				});
            })(jQuery);
        </script>
    <?php } ?>          
<?php        
    }
}
add_action('wp_footer', 'industris_custom_frontend_scripts');

/**
 * Polylang Shortcode - https://wordpress.org/plugins/polylang/
 * Add this code in your functions.php
 * Put shortcode [polylang_langswitcher show_flags="0" show_names="1" echo="0" dropdown="1"] to post/page for display flags
 *
 * @return string
 */
function industris_custom_polylang_langswitcher($atts) {
	$custom_plllang = shortcode_atts( array(
		'show_flags' => 0,
		'show_names' => 1,
		'echo' => 0,
		'dropdown' => 1,
	), $atts );

	$output = '';
	if ( function_exists( 'pll_the_languages' ) ) {
		$args   = array(
			'show_flags' => $custom_plllang['show_flags'],
			'show_names' => $custom_plllang['show_names'],
			'echo'       => $custom_plllang['echo'],
			'dropdown' => $custom_plllang['dropdown'],
		);
		$output = '<ul class="polylang_langswitcher">'.pll_the_languages( $args ). '</ul>';
	}
	return $output;
}
add_shortcode( 'polylang_langswitcher', 'industris_custom_polylang_langswitcher' );

if(!function_exists('industris_custom_frontend_scripts')){
    function industris_custom_frontend_scripts(){
    ?>  
      <?php if ( industris_get_option('preload') != false ){ ?>
        <script type="text/javascript">
            window.jQuery = window.$ = jQuery;  
            (function($) { "use strict";
            	//Preloader
				Royal_Preloader.config({
					mode           : 'logo',
					logo           : '<?php echo industris_get_option('preload_logo'); ?>',
					logo_size      : [<?php echo industris_get_option('preload_logo_width'); ?>, <?php echo industris_get_option('preload_logo_height'); ?>],
					showProgress   : true,
					showPercentage : true,
			        text_colour: '<?php echo industris_get_option('preload_text_color'); ?>',
                    background:  '<?php echo industris_get_option('preload_bgcolor'); ?>'
				});
            })(jQuery);
        </script>
    <?php } ?>          
<?php        
    }
}
add_action('wp_footer', 'industris_custom_frontend_scripts');