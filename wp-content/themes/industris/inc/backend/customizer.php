<?php
/**
 * Theme customizer
 *
 * @package Industris
 */

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class Industris_Customize {
	/**
	 * Customize settings
	 *
	 * @var array
	 */
	protected $config = array();

	/**
	 * The class constructor
	 *
	 * @param array $config
	 */
	public function __construct( $config ) {
		$this->config = $config;

		if ( ! class_exists( 'Kirki' ) ) {
			return;
		}

		$this->register();
	}

	/**
	 * Register settings
	 */
	public function register() {

		/**
		 * Add the theme configuration
		 */
		if ( ! empty( $this->config['theme'] ) ) {
			Kirki::add_config(
				$this->config['theme'], array(
					'capability'  => 'edit_theme_options',
					'option_type' => 'theme_mod',
				)
			);
		}

		/**
		 * Add panels
		 */
		if ( ! empty( $this->config['panels'] ) ) {
			foreach ( $this->config['panels'] as $panel => $settings ) {
				Kirki::add_panel( $panel, $settings );
			}
		}

		/**
		 * Add sections
		 */
		if ( ! empty( $this->config['sections'] ) ) {
			foreach ( $this->config['sections'] as $section => $settings ) {
				Kirki::add_section( $section, $settings );
			}
		}

		/**
		 * Add fields
		 */
		if ( ! empty( $this->config['theme'] ) && ! empty( $this->config['fields'] ) ) {
			foreach ( $this->config['fields'] as $name => $settings ) {
				if ( ! isset( $settings['settings'] ) ) {
					$settings['settings'] = $name;
				}

				Kirki::add_field( $this->config['theme'], $settings );
			}
		}
	}

	/**
	 * Get config ID
	 *
	 * @return string
	 */
	public function get_theme() {
		return $this->config['theme'];
	}

	/**
	 * Get customize setting value
	 *
	 * @param string $name
	 *
	 * @return bool|string
	 */
	public function get_option( $name ) {

		$default = $this->get_option_default( $name );

		return get_theme_mod( $name, $default );
	}

	/**
	 * Get default option values
	 *
	 * @param $name
	 *
	 * @return mixed
	 */
	public function get_option_default( $name ) {
		if ( ! isset( $this->config['fields'][ $name ] ) ) {
			return false;
		}

		return isset( $this->config['fields'][ $name ]['default'] ) ? $this->config['fields'][ $name ]['default'] : false;
	}
}

/**
 * This is a short hand function for getting setting value from customizer
 *
 * @param string $name
 *
 * @return bool|string
 */
function industris_get_option( $name ) {
	global $industris_customize;

	$value = false;

	if ( class_exists( 'Kirki' ) ) {
		$value = Kirki::get_option( 'industris', $name );
	} elseif ( ! empty( $industris_customize ) ) {
		$value = $industris_customize->get_option( $name );
	}

	return apply_filters( 'industris_get_option', $value, $name );
}

/**
 * Get default option values
 *
 * @param $name
 *
 * @return mixed
 */
function industris_get_option_default( $name ) {
	global $industris_customize;

	if ( empty( $industris_customize ) ) {
		return false;
	}

	return $industris_customize->get_option_default( $name );
}

/**
 * Move some default sections to `general` panel that registered by theme
 *
 * @param object $wp_customize
 */
function industris_customize_modify( $wp_customize ) {
	$wp_customize->get_section( 'title_tagline' )->panel     = 'general';
	$wp_customize->get_section( 'static_front_page' )->panel = 'general';
}

add_action( 'customize_register', 'industris_customize_modify' );


/**
 * Get customize settings
 *
 * Priority (Order) WordPress Live Customizer default: 
 * @link https://developer.wordpress.org/themes/customize-api/customizer-objects/
 *
 * @return array
 */
function industris_customize_settings() {
	/**
	 * Customizer configuration
	 */

	$settings = array(
		'theme' => 'industris',
	);

	$panels = array(
		'general'     => array(
			'priority' => 5,
			'title'    => esc_html__( 'General', 'industris' ),
		),
        'blog'        => array(
			'title'      => esc_html__( 'Blog', 'industris' ),
			'priority'   => 10,
			'capability' => 'edit_theme_options',
		),
	);

	$sections = array(
		'blog_page'           => array(
			'title'       => esc_html__( 'Blog Page', 'industris' ),
			'description' => '',
			'priority'    => 9,
			'capability'  => 'edit_theme_options',
			'panel'       => 'blog',
		),
        'single_post'           => array(
			'title'       => esc_html__( 'Single Post', 'industris' ),
			'description' => '',
			'priority'    => 10,
			'capability'  => 'edit_theme_options',
			'panel'       => 'blog',
		),

		'styling'           => array(
            'title'       => esc_html__( 'Styling', 'industris' ),
            'description' => '',
            'priority'    => 25,
            'capability'  => 'edit_theme_options',
        ),
	);

	$fields = array( 
		//Shop
		'per_page'     => array(
            'type'     => 'number',
            'label'    => esc_html__( 'Product Per Page', 'industris' ),
            'section'  => 'woocommerce_product_catalog',
            'default'  => 6,
            'priority' => 10,
            'description' => 'Enter number products display per page.',
        ),
        'loop_columns' => array(
            'type'     => 'select',
            'label'    => esc_html__( 'Product Loop Columns', 'industris' ),
            'section'  => 'woocommerce_product_catalog',
            'default'  => 2,
            'choices'  => array(
                '2'    => esc_html__( '2 Columns', 'industris' ),
                '3'    => esc_html__( '3 Columns', 'industris' ),
                '4'    => esc_html__( '4 Columns', 'industris' ),
            ),
            'priority' => 10,
            'description' => 'Choose number columns display per row.',
        ),
        //Styling
        'bg_body'      => array(
            'type'     => 'color',
            'label'    => esc_html__( 'Background Body', 'industris' ),
            'section'  => 'styling',
            'default'  => '',
            'priority' => 10,
            'output'   => array(
                array(
                    'element'  => 'body, .site-content',
                    'property' => 'background-color',
                ),
            ),
        ),
        'main_color'   => array(
            'type'     => 'color',
            'label'    => esc_html__( 'Primary Color', 'industris' ),
            'section'  => 'styling',
            'default'  => '#ffd100',
            'priority' => 10,
        ),
        'second_color' => array(
            'type'     => 'color',
            'label'    => esc_html__( 'Second Color', 'industris' ),
            'section'  => 'styling',
            'default'  => '#03132b',
            'priority' => 10,
        ),
	);
	$settings['panels']   = apply_filters( 'industris_customize_panels', $panels );
	$settings['sections'] = apply_filters( 'industris_customize_sections', $sections );
	$settings['fields']   = apply_filters( 'industris_customize_fields', $fields );

	return $settings;
}

$industris_customize = new Industris_Customize( industris_customize_settings() );

require get_template_directory() . '/inc/backend/customizer-blog.php';
require get_template_directory() . '/inc/backend/customizer-header.php';
require get_template_directory() . '/inc/backend/customizer-page-header.php';
require get_template_directory() . '/inc/backend/customizer-footer.php';
require get_template_directory() . '/inc/backend/customizer-typography.php';