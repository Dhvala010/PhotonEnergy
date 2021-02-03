<?php
function header_customize_settings() {
	/**
	 * Customizer configuration
	 */

	$settings = array(
		'theme' => 'industris',
	);

	$panels = array(	
	    'header'        => array(
			'title'      => esc_html__( 'Header', 'industris' ),
			'priority'   => 9,
			'capability' => 'edit_theme_options',
		),
	);

	$sections = array(
        'main_header'           => array(
            'title'       => esc_html__( 'General', 'industris' ),
            'description' => '',
            'priority'    =>15,
            'capability'  => 'edit_theme_options',
            'panel'       => 'header',
        ),
		'topbar_header'           => array(
			'title'       => esc_html__( 'Top Bar', 'industris' ),
			'description' => '',
			'priority'    => 16,
			'capability'  => 'edit_theme_options',
			'panel'       => 'header',
		),
        'logo_header'           => array(
            'title'       => esc_html__( 'Logo', 'industris' ),
            'description' => '',
            'priority'    =>17,
            'capability'  => 'edit_theme_options',
            'panel'       => 'header',
        ),
        'menu_header'           => array(
            'title'       => esc_html__( 'Main Menu', 'industris' ),
            'description' => '',
            'priority'    =>18,
            'capability'  => 'edit_theme_options',
            'panel'       => 'header',
        ),
        'cta_header'           => array(
            'title'       => esc_html__( 'Call To Action', 'industris' ),
            'description' => '',
            'priority'    =>19,
            'capability'  => 'edit_theme_options',
            'panel'       => 'header',
        ),
	    'header_styling'           => array(
			'title'       => esc_html__( 'Styling', 'industris' ),
			'description' => '',
			'priority'    =>20,
			'capability'  => 'edit_theme_options',
			'panel'       => 'header',
		),
        'preload_section'     => array(
            'title'       => esc_attr__( 'Preloader', 'industris' ),
            'description' => '',
            'priority'    => 15,
            'capability'  => 'edit_theme_options',
        ),
	);

	$fields = array(	
		// Topbar Header
		'topbar_switch'     => array(
			'type'        => 'toggle',
			'label'       => esc_attr__( 'Top Bar On/Off?', 'industris' ),
			'section'     => 'topbar_header',
			'default'     => 1,
			'priority'    => 1,
		),

		// Topbar Contact Info
		'info_separator'     => array(
			'type'        => 'custom',
			'label'       => '',
			'section'     => 'topbar_header',
			'default'     => '<hr>',
			'priority'    => 2,
		),
		'info_switch'     => array(
			'type'        => 'toggle',
			'label'       => esc_attr__( 'Contact Info On/Off?', 'industris' ),
			'section'     => 'topbar_header',
			'default'     => 1,
			'priority'    => 3,
		),
		'header_contact_info'     => array(
			'type'     => 'repeater',
			'label'    => esc_html__( 'Contact Info', 'industris' ),
			'section'  => 'topbar_header',
			'priority' => 4,
			'active_callback' => array(
				array(
					'setting'  => 'info_switch',
					'operator' => '==',
					'value'    => 1,
				),
			),
			'row_label' => array(
				'type' => 'field',
				'value' => esc_attr__('Contact Info', 'industris' ),
				'field' => 'info_name',
			),
			'default'  => array(),
			'fields'   => array(
				'info_name' => array(
					'type'        => 'text',
					'label'       => esc_html__( 'Contact info name', 'industris' ),
					'description' => esc_html__( 'This will be the contact info name', 'industris' ),
					'default'     => '',
				),
				'info_icon' => array(
					'type'        => 'text',
					'label'       => esc_html__( 'Icon class name', 'industris' ),
					'description' => esc_html__( 'This will be the contact info icon: https://fontawesome.com/v4.7.0/icons/#brand , ex: phone', 'industris' ),
					'default'     => '',
				),
				'info_content' => array(
					'type'        => 'textarea',
					'label'       => esc_html__( 'Contact info content', 'industris' ),
					'description' => esc_html__( 'This will be the contact info content', 'industris' ),
					'default'     => '',
				),				
			),
        ),
        'search_switch'     => array(
            'type'        => 'toggle',
            'label'       => esc_attr__( 'Search Button On/Off?', 'industris' ),
            'section'     => 'topbar_header',
            'default'     => 1,
            'priority'    => 5,
        ), 
        'login_switch'     => array(
            'type'        => 'toggle',
            'label'       => esc_attr__( 'Login Button On/Off?', 'industris' ),
            'section'     => 'topbar_header',
            'default'     => 1,
            'priority'    => 6,
        ), 

		// Main Header
        'header_layout'    => array(
            'type'        => 'radio-image',
            'label'       => esc_attr__( 'Header Layout', 'industris' ),
            'section'     => 'main_header',
            'default'     => 'header1',
            'priority'    => 1,
            'multiple'    => 1,
            'choices'     => array(
                'header1' => get_template_directory_uri() . '/inc/backend/images/header1.png',
                'header2' => get_template_directory_uri() . '/inc/backend/images/header2.png',
            ),
        ),	
		'header_desktop_sticky'        => array(
            'type'     => 'toggle',
            'label'    => esc_html__( 'Sticky Header On Desktop', 'industris' ),
            'section'  => 'main_header',
            'default'  => '1',
            'priority' => 3,
        ),
        'header_mobile_sticky' => array(
            'type'     => 'toggle',
            'label'    => esc_html__( 'Sticky Header On Mobile', 'industris' ),
            'section'  => 'main_header',
            'default'  => '0',
            'priority' => 4,
        ),

        //Logo Setting
		'logo'         => array(
			'type'     => 'image',
			'label'    => esc_attr__( 'Upload Your Static Logo Image on Header Static (.jpg, .png, .svg)', 'industris' ),
			'section'  => 'logo_header',
			'default'  => trailingslashit( get_template_directory_uri() ) . 'images/logo.svg',
			'priority' => 3,
		),
        'logo_width'     => array(
            'type'     => 'number',
            'label'    => esc_html__( 'Logo Width (px)', 'industris' ),
            'section'  => 'logo_header',
            'priority' => 4,
            'default'  => '268',
            'output'    => array(
                array(
                    'element'  => '#site-logo a img',
                    'property' => 'width',
                    'units'	   => 'px'
                ),
            ),
        ),
        'logo_height'    => array(
            'type'     => 'number',
            'label'    => esc_html__( 'Logo Height (px)', 'industris' ),
            'section'  => 'logo_header',
            'priority' => 5,
            'default'  => '75',
            'output'    => array(
                array(
                    'element'  => '#site-logo a img',
                    'property' => 'height',
                    'units'	   => 'px'
                ),
            ),
        ),
        'logo_spacing'  => array(
            'type'     => 'dimensions',
            'label'    => esc_html__( 'Logo Padding (ex: 10px)', 'industris' ),
            'section'  => 'logo_header',
            'priority' => 6,
            'default'  => array(
                'top'    => '20px',
                'bottom' => '20px',
                'left'   => '0',
                'right'  => '0',
            ),
            'output'    => array(
                array(
                    'element'  => '#site-logo',
                    'property' => 'padding',
                    'units'	   => 'px'
                ),
            ),
        ),

        //Call To Action
        'cta_btn'      => array(
            'type'     => 'repeater',
            'label'    => esc_html__( 'CTA Buttons', 'icos' ),
            'section'  => 'cta_header',
            'priority' => 10,
            'default'  => array(),
            'row_label' => array(
				'type' => 'field',
				'value' => esc_attr__('Button', 'industris' ),
				'field' => 'name',
			),
            'fields'   => array(
                'name' => array(
                    'type'        => 'textarea',
                    'label'       => esc_html__( 'Label Button', 'icos' ),
                ),
                'link' => array(
                    'type'        => 'text',
                    'label'       => esc_html__( 'Link Button', 'icos' ),
                ),
                'nwin'  => array(
                    'type'        => 'checkbox',
                    'label'       => esc_html__( 'Open In New Window', 'icos' ),
                ),
            ),
        ),

        //Header Styling        
        'separator_tophead'     => array(
            'type'        => 'custom',
            'label'       => '',
            'section'     => 'header_styling',
            'default'     => '<hr>',
            'priority'    => 8,
        ),
        'bg_topbar'    => array(
            'type'     => 'color',
            'label'    => esc_html__( 'Top Bar Background Color', 'industris' ),
            'section'  => 'header_styling',
            'default'  => '',
            'priority' => 9,
            'output'    => array(
                array(
                    'element'  => '.top-bar, .header2 .main-header',
                    'property' => 'background'
                ),
            ),
        ),
        'color_topbar'    => array(
            'type'     => 'color',
            'label'    => esc_html__( 'Top Bar Text Color', 'industris' ),
            'section'  => 'header_styling',
            'default'  => '',
            'priority' => 11,
            'output'    => array(
                array(
                    'element'  => '.top-bar, .top-bar a, .header2 .info-list, .header2 .toggle_search > i',
                    'property' => 'color'
                ),
            ),
        ),

        'separator_1'     => array(
            'type'        => 'custom',
            'label'       => '',
            'section'     => 'header_styling',
            'default'     => '<hr>',
            'priority'    => 12,
        ),
        'bg_menu'    => array(
            'type'     => 'color',
            'label'    => esc_html__( 'Main Navigation Background Color', 'industris' ),
            'section'  => 'header_styling',
            'default'  => '',
            'priority' => 13,
            'output'    => array(
                array(
                    'element'  => '.main-header, .header2 .bg-second',
                    'property' => 'background'
                ),
            ),
        ),
        'color_menu'    => array(
            'type'     => 'color',
            'label'    => esc_html__( 'Menu Item Color', 'industris' ),
            'section'  => 'header_styling',
            'default'  => '',
            'priority' => 14,
            'output'    => array(
                array(
                    'element'  => '.main-navigation > ul > li > a',
                    'property' => 'color'
                ),
            ),
        ),
        'separator_2'     => array(
            'type'        => 'custom',
            'label'       => '',
            'section'     => 'header_styling',
            'default'     => '<hr>',
            'priority'    => 15,
        ),
        'bg_smenu'    => array(
            'type'     => 'color',
            'label'    => esc_html__( 'Background Color for Dropdown Menu', 'industris' ),
            'section'  => 'header_styling',
            'default'  => '',
            'priority' => 16,
            'output'    => array(
                array(
                    'element'  => '.main-navigation ul ul',
                    'property' => 'background'
                ),                
            ),
        ),
        'border_smenu'    => array(
            'type'     => 'color',
            'label'    => esc_html__( 'Border Color for Dropdown Menu Item', 'industris' ),
            'section'  => 'header_styling',
            'default'  => '',
            'priority' => 17,
            'output'    => array(
                array(
                    'element'  => '.main-navigation li ul',
                    'property' => 'border-color'
                ),
            ),
        ),
        'color_smenu'    => array(
            'type'     => 'color',
            'label'    => esc_html__( 'Color for Dropdown Menu Item', 'industris' ),
            'section'  => 'header_styling',
            'default'  => '',
            'priority' => 18,
            'output'    => array(
                array(
                    'element'  => '.main-navigation ul li li a',
                    'property' => 'color'
                ),
            ),
        ),

        'hmobile_style'    => array(
            'type'        => 'select',
            'label'       => esc_attr__( 'Header Style', 'industris' ),
            'section'     => 'header_mobile_styling',
            'default'     => 'stylelight',
            'priority'    => 1,
            'multiple'    => 1,
            'choices'     => array(
                'stylelight' => 'Light Style',
                'styledark' => 'Dark Style',
				'styleblue' => 'Blue Style',                
            ),
        ),

        // Preloader Setting
        'preload'     => array(
            'type'        => 'toggle',
            'label'       => esc_attr__( 'Preloader', 'industris' ),
            'section'     => 'preload_section',
            'default'     => '1',
            'priority'    => 10,
        ),
        'preload_logo'    => array(
            'type'     => 'image',
            'label'    => esc_html__( 'Logo Preload', 'industris' ),
            'section'  => 'preload_section',
            'default'  => trailingslashit( get_template_directory_uri() ) . 'images/logo.png',
            'priority' => 11,
            'active_callback' => array(
                array(
                    'setting'  => 'preload',
                    'operator' => '==',
                    'value'    => 1,
                ),
            ),
        ),
        'preload_logo_width'     => array(
            'type'     => 'number',
            'label'    => esc_html__( 'Logo Width', 'industris' ),
            'section'  => 'preload_section',
            'default'  => 152,
            'priority' => 12,
            'active_callback' => array(
                array(
                    'setting'  => 'preload',
                    'operator' => '==',
                    'value'    => 1,
                ),
            ),
        ),
        'preload_logo_height'    => array(
            'type'     => 'number',
            'label'    => esc_html__( 'Logo Height', 'industris' ),
            'section'  => 'preload_section',
            'default'  => 70,
            'priority' => 13,
            'active_callback' => array(
                array(
                    'setting'  => 'preload',
                    'operator' => '==',
                    'value'    => 1,
                ),
            ),
        ),
        'preload_text_color'    => array(
            'type'     => 'color',
            'label'    => esc_html__( 'Text Color', 'industris' ),
            'section'  => 'preload_section',
            'default'  => '#0a0f2b',
            'priority' => 14,
            'active_callback' => array(
                array(
                    'setting'  => 'preload',
                    'operator' => '==',
                    'value'    => 1,
                ),
            ),
        ),
        'preload_bgcolor'    => array(
            'type'     => 'color',
            'label'    => esc_html__( 'Background Color', 'industris' ),
            'section'  => 'preload_section',
            'default'  => '#fff',
            'priority' => 15,
            'active_callback' => array(
                array(
                    'setting'  => 'preload',
                    'operator' => '==',
                    'value'    => 1,
                ),
            ),
        ),
        'preload_typo' => array(
            'type'        => 'typography',
            'label'       => esc_attr__( 'Preload Font', 'industris' ),
            'section'     => 'preload_section',
            'default'     => array(
                'font-family'    => 'Roboto',
                'variant'        => 'regular',
                'font-size'      => '13px',
                'line-height'    => '40px',
                'letter-spacing' => '2px',
                'subsets'        => array( 'latin-ext' ),                
                'text-transform' => 'none',
                'text-align'     => 'center'
            ),
            'priority'    => 16,
            'output'      => array(
                array(
                    'element' => '#royal_preloader.royal_preloader_logo .royal_preloader_percentage',
                ),
            ),
        ),
	);

	$settings['panels']   = apply_filters( 'industris_customize_panels', $panels );
	$settings['sections'] = apply_filters( 'industris_customize_sections', $sections );
	$settings['fields']   = apply_filters( 'industris_customize_fields', $fields );

	return $settings;
}

$industris_customize = new Industris_Customize( header_customize_settings() );