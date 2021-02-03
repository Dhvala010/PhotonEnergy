<?php
/**
 * Industris functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Industris
 */

if ( ! function_exists( 'industris_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function industris_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on _s, use a find and replace
		 * to change 'industris' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'industris', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus( array(
			'primary' => esc_html__( 'Primary', 'industris' ),
			'footer'  => esc_html__( 'Footer', 'industris' )
		) );

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );

		// Add image sizes
        add_image_size( 'industris-recent-post-thumbnail', 66, 66, array( 'center', 'center' ) );
        add_image_size( 'industris-latest-news-thumbnail', 360, 200, array( 'center', 'center' ) );

		/*
		 * This theme styles the visual editor to resemble the theme style,
		 * specifically font, colors, and column width.
	 	 */
		add_editor_style( array( 'css/editor-style.css', industris_fonts_url() ) );
		
	}
endif;
add_action( 'after_setup_theme', 'industris_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function industris_content_width() {
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters( 'industris_content_width', 640 );
}
add_action( 'after_setup_theme', 'industris_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function industris_widgets_init() {
	/* Register the 'primary' sidebar. */
	register_sidebar( array(
		'name'          => esc_html__( 'Primary Sidebar', 'industris' ),
		'id'            => 'primary',
		'description'   => esc_html__( 'Add widgets here.', 'industris' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h6 class="widget-title">',
		'after_title'   => '</h6>',
	) );
	/* Register the 'service' sidebar. */
	register_sidebar( array(
		'name'          => esc_html__( 'Service Sidebar', 'industris' ),
		'id'            => 'service',
		'description'   => esc_html__( 'Add widgets here.', 'industris' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h6 class="widget-title">',
		'after_title'   => '</h6>',
	) );
	/* Register the 'shop' sidebar. */
	register_sidebar( array(
		'name'          => esc_html__( 'Product Sidebar', 'industris' ),
		'id'            => 'product',
		'description'   => esc_html__( 'Add widgets here.', 'industris' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h6 class="widget-title">',
		'after_title'   => '</h6>',
	) );
	/* Repeat register_sidebar() code for additional sidebars. */
	register_sidebar( array(
		'name'          => __( 'Footer First Widget Area Home 3', 'industris' ),
		'id'            => 'footer-area-1-3',
		'description'   => __( 'Add widgets here to appear in your footer.', 'industris' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h4 class="widget-title">',
		'after_title'   => '</h4>',
	) );
	register_sidebar( array(
		'name'          => __( 'Footer First Widget Area Home 4', 'industris' ),
		'id'            => 'footer-area-1-4',
		'description'   => __( 'Add widgets here to appear in your footer.', 'industris' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h4 class="widget-title">',
		'after_title'   => '</h4>',
	) );
	register_sidebar( array(
		'name'          => __( 'Footer First Widget Area', 'industris' ),
		'id'            => 'footer-area-1',
		'description'   => __( 'Add widgets here to appear in your footer.', 'industris' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h4 class="widget-title">',
		'after_title'   => '</h4>',
	) );
	register_sidebar( array(
		'name'          => __( 'Footer Second Widget Area', 'industris' ),
		'id'            => 'footer-area-2',
		'description'   => __( 'Add widgets here to appear in your footer.', 'industris' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h4 class="widget-title">',
		'after_title'   => '</h4>',
	) );
	register_sidebar( array(
		'name'          => __( 'Footer Third Widget Area', 'industris' ),
		'id'            => 'footer-area-3',
		'description'   => __( 'Add widgets here to appear in your footer.', 'industris' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h4 class="widget-title">',
		'after_title'   => '</h4>',
	) );
	register_sidebar( array(
		'name'          => __( 'Footer Fourth Widget Area', 'industris' ),
		'id'            => 'footer-area-4',
		'description'   => __( 'Add widgets here to appear in your footer.', 'industris' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h4 class="widget-title">',
		'after_title'   => '</h4>',
	) );
}
add_action( 'widgets_init', 'industris_widgets_init' );

/**
 * Register custom fonts.
 */
if ( ! function_exists( 'industris_fonts_url' ) ) :
/**
 * Register Google fonts for Blessing.
 *
 * Create your own industris_fonts_url() function to override in a child theme.
 *
 * @since Blessing 1.0
 *
 * @return string Google fonts URL for the theme.
 */
function industris_fonts_url() {
	$fonts_url = '';
	$font_families     = array();
	$subsets   = 'latin,latin-ext';

	/* translators: If there are characters in your language that are not supported by Roboto Slab, translate this to 'off'. Do not translate into your own language. */
	if ( 'off' !== _x( 'on', 'Roboto font: on or off', 'industris' ) ) {
		$font_families[] = 'Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i';
	}
	if ( 'off' !== _x( 'on', 'Raleway font: on or off', 'industris' ) ) {
		$font_families[] = 'Raleway:300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i';
	}

	if ( $font_families ) {
		$fonts_url = add_query_arg( array(
			'family' => urlencode( implode( '|', $font_families ) ),
			'subset' => urlencode( $subsets ),
		), 'https://fonts.googleapis.com/css' );
	}
	return esc_url_raw( $fonts_url );
}
endif;

/**
 * Enqueue scripts and styles.
 */
function industris_scripts() {

	// Add custom fonts, used in the main stylesheet.
	wp_enqueue_style( 'industris-fonts', industris_fonts_url(), array(), null );

	/** All frontend css files **/ 
	wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/css/bootstrap.css', array(), '4.0', 'all');

	/** load fonts **/
	wp_enqueue_style( 'industris-awesome-font', get_template_directory_uri().'/css/font-awesome.css');
	wp_enqueue_style( 'ionicon-font', get_template_directory_uri().'/css/ionicon.css');

	/** Slick slider **/
    wp_enqueue_style( 'slick-slider', get_template_directory_uri().'/css/slick.css');
    wp_enqueue_style( 'slick-theme', get_template_directory_uri().'/css/slick-theme.css');

    /** Preload **/
    if( industris_get_option('preload') != false ){
		wp_enqueue_style( 'industris-preload', get_template_directory_uri().'/css/royal-preload.css');
	}

    /** Magnific Popup **/
    wp_enqueue_style( 'magnific-popup', get_template_directory_uri().'/css/magnific-popup.css');

	/** Theme stylesheet **/
	wp_enqueue_style( 'industris-style', get_stylesheet_uri() );	

	/** Theme scripts **/
	if( industris_get_option('preload') != false ){
		wp_enqueue_script("industris-royal-preloader", get_template_directory_uri()."/js/royal_preloader.min.js",array('jquery'), '1.0', false); 
	}
    wp_enqueue_script( 'slick-slider', get_template_directory_uri() . '/js/slick.min.js', array( 'jquery' ), '20190221', true );
    wp_enqueue_script( 'magnific', get_template_directory_uri() . '/js/jquery.magnific-popup.min.js', array( 'jquery' ), '20180910', true );
    wp_enqueue_script( 'isotope', get_template_directory_uri() . '/js/jquery.isotope.min.js', array( 'jquery' ), '20180910', true );
	wp_enqueue_script( 'industris-elementor', get_template_directory_uri() . '/js/elementor.js', array( 'jquery' ), '20190710', true );
	wp_enqueue_script( 'industris-header-mobile', get_template_directory_uri() . '/js/header-mobile.js', array('jquery'), '20190710', true );
	wp_enqueue_script( 'industris-scripts', get_template_directory_uri() . '/js/scripts.js', array( 'jquery' ), '20190710', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'industris_scripts' );

/**
 * Enable by default elementor for custom post type
 */
function industris_add_cpt_support() {
	//if exists, assign to $cpt_support var
	$cpt_support = get_option( 'elementor_cpt_support' );
	//check if option DOESN'T exist in db
	if( ! $cpt_support ) {
	    $cpt_support = [ 'page', 'post', 'ot_portfolio', 'ot_service' , 'product'  ]; //create array of our default supported post types
	    update_option( 'elementor_cpt_support', $cpt_support ); //write it to the database
	}
	//if it DOES exist, but ot_portfolio & ot_service is NOT defined
	else {
	    $ot_portfolio = in_array( 'ot_portfolio', $cpt_support );
		$ot_service = in_array( 'ot_service', $cpt_support );
		$product = in_array( 'product', $cpt_support );
		if( !$ot_portfolio ){
			$cpt_support[] = 'ot_portfolio'; //append to array
		}
		if( !$ot_service ){
			$cpt_support[] = 'ot_service'; //append to array
		}
		if( !$product ){
			$cpt_support[] = 'product'; //append to array
		}
		update_option( 'elementor_cpt_support', $cpt_support ); //update database
	}
	//otherwise do nothing, portfolio already exists in elementor_cpt_support option
}
add_action( 'after_switch_theme', 'industris_add_cpt_support' );

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/frontend/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/frontend/template-functions.php';

/**
 * Custom Page Header for this theme.
 */
require get_template_directory() . '/inc/frontend/breadcrumbs.php';
require get_template_directory() . '/inc/frontend/page-header.php';

/**
 * Functions which add more to backend.
 */
require get_template_directory() . '/inc/backend/admin-functions.php';

/**
 * Custom metabox for this theme.
 */
require get_template_directory() . '/inc/backend/meta-boxes.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/backend/customizer.php';
require get_template_directory() . '/inc/backend/color.php';

/**
 * Register the required plugins for this theme.
 */
require get_template_directory() . '/inc/backend/plugin-requires.php';
require get_template_directory() . '/inc/backend/importer.php';

/**
 * Load WooCommerce compatibility file.
 */
if ( class_exists( 'WooCommerce' ) ) {
	require get_template_directory() . '/inc/woocommerce/woocommerce.php';
}
