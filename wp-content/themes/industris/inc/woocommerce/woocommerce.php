<?php
/**
 * WooCommerce Compatibility File
 *
 * @link https://woocommerce.com/
 *
 * @package Industris
 */

/**
 * WooCommerce setup function.
 *
 * @link https://docs.woocommerce.com/document/third-party-custom-theme-compatibility/
 * @link https://github.com/woocommerce/woocommerce/wiki/Enabling-product-gallery-features-(zoom,-swipe,-lightbox)-in-3.0.0
 *
 * @return void
 */
function industris_woocommerce_setup() {
	add_theme_support( 'woocommerce' );
	add_theme_support( 'wc-product-gallery-zoom' );
	add_theme_support( 'wc-product-gallery-lightbox' );
	add_theme_support( 'wc-product-gallery-slider' );
}
add_action( 'after_setup_theme', 'industris_woocommerce_setup' );

/**
 * WooCommerce specific scripts & stylesheets.
 *
 * @return void
 */
function industris_woocommerce_scripts() {
	wp_enqueue_style( 'industris-woocommerce-style', get_template_directory_uri() . '/css/woocommerce.css' );

	$font_path   = WC()->plugin_url() . '/assets/fonts/';
	$inline_font = '@font-face {
			font-family: "star";
			src: url("' . $font_path . 'star.eot");
			src: url("' . $font_path . 'star.eot?#iefix") format("embedded-opentype"),
				url("' . $font_path . 'star.woff") format("woff"),
				url("' . $font_path . 'star.ttf") format("truetype"),
				url("' . $font_path . 'star.svg#star") format("svg");
			font-weight: normal;
			font-style: normal;
		}';

	wp_add_inline_style( 'industris-woocommerce-style', $inline_font );
}
add_action( 'wp_enqueue_scripts', 'industris_woocommerce_scripts' );

/**
 * Disable the default WooCommerce stylesheet.
 *
 * Removing the default WooCommerce stylesheet and enqueing your own will
 * protect you during WooCommerce core updates.
 *
 * @link https://docs.woocommerce.com/document/disable-the-default-stylesheet/
 */
// add_filter( 'woocommerce_enqueue_styles', '__return_empty_array' );

/**
 * Add 'woocommerce-active' class to the body tag.
 *
 * @param  array $classes CSS classes applied to the body tag.
 * @return array $classes modified to include 'woocommerce-active' class.
 */
function industris_woocommerce_active_body_class( $classes ) {
	$classes[] = 'woocommerce-active';

	return $classes;
}
add_filter( 'body_class', 'industris_woocommerce_active_body_class' );

/**
 * Products per page.
 *
 * @return integer number of products.
 */
function industris_woocommerce_products_per_page() {
	return industris_get_option('per_page');
}
add_filter( 'loop_shop_per_page', 'industris_woocommerce_products_per_page' );

/**
 * Product gallery thumnbail columns.
 *
 * @return integer number of columns.
 */
function industris_woocommerce_thumbnail_columns() {
	return 4;
}
add_filter( 'woocommerce_product_thumbnails_columns', 'industris_woocommerce_thumbnail_columns' );

/**
 * Default loop columns on product archives.
 *
 * @return integer products per row.
 */
function industris_woocommerce_loop_columns() {
	return industris_get_option('loop_columns');
}
add_filter( 'loop_shop_columns', 'industris_woocommerce_loop_columns' );

/**
 * Related Products Args.
 *
 * @param array $args related products args.
 * @return array $args related products args.
 */
function industris_woocommerce_related_products_args( $args ) {
	$defaults = array(
		'posts_per_page' => 3,
		'columns'        => 3,
	);

	$args = wp_parse_args( $defaults, $args );

	return $args;
}
add_filter( 'woocommerce_output_related_products_args', 'industris_woocommerce_related_products_args' );

if ( ! function_exists( 'industris_woocommerce_product_columns_wrapper' ) ) {
	/**
	 * Product columns wrapper.
	 *
	 * @return  void
	 */
	function industris_woocommerce_product_columns_wrapper() {
		$columns = industris_woocommerce_loop_columns();
		echo '<div class="columns-' . absint( $columns ) . '">';
	}
}
add_action( 'woocommerce_before_shop_loop', 'industris_woocommerce_product_columns_wrapper', 40 );

if ( ! function_exists( 'industris_woocommerce_product_columns_wrapper_close' ) ) {
	/**
	 * Product columns wrapper close.
	 *
	 * @return  void
	 */
	function industris_woocommerce_product_columns_wrapper_close() {
		echo '</div>';
	}
}
add_action( 'woocommerce_after_shop_loop', 'industris_woocommerce_product_columns_wrapper_close', 40 );

/**
 * Remove default WooCommerce wrapper.
 */
remove_action( 'woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10 );
remove_action( 'woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 10 );

if ( ! function_exists( 'industris_woocommerce_wrapper_before' ) ) {
	/**
	 * Before Content.
	 *
	 * Wraps all WooCommerce content in wrappers which match the theme markup.
	 *
	 * @return void
	 */
	function industris_woocommerce_wrapper_before() {
		?>
		<div class="container">
			<div class="row">
			<?php
	}
}
add_action( 'woocommerce_before_main_content', 'industris_woocommerce_wrapper_before' );

if ( ! function_exists( 'industris_woocommerce_wrapper_after' ) ) {
	/**
	 * After Content.
	 *
	 * Closes the wrapping divs.
	 *
	 * @return void
	 */
	function industris_woocommerce_wrapper_after() {
			?>
			</div><!-- .row -->
		</div><!-- .container -->
		<?php
	}
}
add_action( 'woocommerce_after_main_content', 'industris_woocommerce_wrapper_after' );

/**
 * Show cart contents / total Ajax
 */
function industris_woocommerce_header_add_to_cart_fragment( $fragments ) {
	global $woocommerce;
	ob_start();
	?>
	<a class="cart-header" href="<?php echo esc_url( wc_get_cart_url() ); ?>" title="<?php _e('View your shopping cart', 'industris'); ?>">
		<i class="fas fa-shopping-cart" aria-hidden="true"></i>
		<?php echo sprintf(_n('%d', '%d', $woocommerce->cart->cart_contents_count, 'industris'), $woocommerce->cart->cart_contents_count);?>
	</a>
	<?php
	$fragments['a.cart-header'] = ob_get_clean();
	return $fragments;
}
add_filter( 'woocommerce_add_to_cart_fragments', 'industris_woocommerce_header_add_to_cart_fragment' );

// Remove Breadcrumb Woocommerce
remove_action('woocommerce_before_main_content', 'woocommerce_breadcrumb', 20, 0 );

// Remove link before and after product
remove_action( 'woocommerce_before_shop_loop_item', 'woocommerce_template_loop_product_link_open', 10 );
remove_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_product_link_close', 5 );
