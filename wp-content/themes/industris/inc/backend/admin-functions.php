<?php

//Admin Style
if ( ! function_exists( 'industris_custom_wp_admin_style' ) ) :
    function industris_custom_wp_admin_style() {
        wp_register_style( 'industris_custom_wp_admin_css', get_template_directory_uri() . '/inc/backend/css/admin-style.css', false, '1.0.0' );
        wp_enqueue_style( 'industris_custom_wp_admin_css' );
    }
    add_action( 'admin_enqueue_scripts', 'industris_custom_wp_admin_style' );
endif;

//Typography Settings
if ( ! function_exists( 'industris_typography_css' ) ) :
    /**
     * Get typography CSS base on settings
     *
     * @since 1.1.6
     */
    function industris_typography_css() {
        $css        = '';
        $properties = array(
            'font-family'    => 'font-family',
            'font-size'      => 'font-size',
            'variant'        => 'font-weight',
            'line-height'    => 'line-height',
            'letter-spacing' => 'letter-spacing',
            'color'          => 'color',
            'text-transform' => 'text-transform',
        );

        $settings = array(
            'body_typo'          => 'body, p',
            'heading1_typo'      => 'h1',
            'heading2_typo'      => 'h2',
            'heading3_typo'      => 'h3',
            'heading4_typo'      => 'h4',
            'heading5_typo'      => 'h5',
            'heading6_typo'      => 'h6',
            'menu_typo'          => '.main-navigation a, .main-navigation ul ul a',
        );

        foreach ( $settings as $setting => $selector ) {
            $typography = industris_get_option( $setting );
            $default    = (array) industris_get_option_default( $setting );
            $style      = '';

            foreach ( $properties as $key => $property ) {
                if ( isset( $typography[ $key ] ) && ! empty( $typography[ $key ] ) ) {
                    if ( isset( $default[ $key ] ) && strtoupper( $default[ $key ] ) == strtoupper( $typography[ $key ] ) ) {
                        continue;
                    }
                    $value = 'font-family' == $key ? '"' . rtrim( trim( $typography[ $key ] ), ',' ) . '"' : $typography[ $key ];
                    $value = 'variant' == $key ? str_replace( 'regular', '400', $value ) : $value;

                    if ( $value ) {
                        $style .= $property . ': ' . $value . ';';
                    }
                }
            }

            if ( ! empty( $style ) ) {
                $css .= $selector . '{' . $style . '}';
            }
        }

        $css .= industris_get_heading_typography_css();

        return $css;
    }
endif;

/**
 * Returns CSS for the typography.
 *
 *
 * @param array $body_typo Color scheme body typography.
 *
 * @return string typography CSS.
 */
function industris_get_heading_typography_css() {

    $headings   = array(
        'h1' => 'heading1_typo',
        'h2' => 'heading2_typo',
        'h3' => 'heading3_typo',
        'h4' => 'heading4_typo',
        'h5' => 'heading5_typo',
        'h6' => 'heading6_typo',
    );
    $inline_css = '';
    foreach ( $headings as $heading ) {
        $keys = array_keys( $headings, $heading );
        if ( $keys ) {
            $inline_css .= industris_get_heading_font( $keys[0], $heading );
        }
    }

    return $inline_css;

}

/**
 * Returns CSS for the typography.
 *
 *
 * @param array $body_typo Color scheme body typography.
 *
 * @return string typography CSS.
 */
function industris_get_heading_font( $key, $heading ) {

    $inline_css   = '';
    $heading_typo = industris_get_option( $heading );

    if ( $heading_typo ) {
        if ( isset( $heading_typo['font-family'] ) && strtolower( $heading_typo['font-family'] ) !== 'poppins' ) {
            $typo       = rtrim( trim( $heading_typo['font-family'] ), ',' );
            $inline_css .= $key . '{font-family:' . $typo . ', Arial, sans-serif}';

            if ( isset( $heading_typo['variant'] ) ) {
                $inline_css .= $key . '.vc_custom_heading{font-weight:' . $heading_typo['variant'] . '}';
            }
        }
    }

    if ( empty( $inline_css ) ) {
        return;
    }

    return <<<CSS
    {$inline_css}
CSS;
}

//Custom Style Frontend
if(!function_exists('industris_custom_frontend_style')){

    function industris_custom_frontend_style(){
        $style_css 	= '';
        $style_css .= industris_typography_css();

        if(! empty($style_css)){
            echo '<style type="text/css">'.$style_css.'</style>';
        }
    }
}
add_action('wp_head', 'industris_custom_frontend_style');

// Load the theme's custom Widgets so that they appear in the Elementor element panel.
add_action( 'elementor/widgets/widgets_registered', 'industris_register_elementor_widgets' );
function industris_register_elementor_widgets() {
	// We check if the Elementor plugin has been installed / activated.
	if ( defined( 'ELEMENTOR_PATH' ) && class_exists('Elementor\Widget_Base') ) {
        // Include Elementor Widget files here.
        
        // Remove this 2 require_once line below after completed the theme.
        require_once( get_template_directory() . '/inc/backend/elementor-widgets/ot-widget.php' );
 	}
}

// Add a custom 'category_industris' category for to the Elementor element panel so that 
// our theme's widgets have their own category.
add_action( 'elementor/init', function() {
	\Elementor\Plugin::$instance->elements_manager->add_category( 
		'category_industris',
		[
			'title' => __( 'Industris', 'industris' ),
			'icon' => 'fa fa-plug', //default icon
		],
		1 // position
	);
});