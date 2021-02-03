<?php
function footer_customize_settings() {
	/**
	 * Customizer configuration
	 */

	$settings = array(
		'theme' => 'industris',
	);

	$panels = array(	
		// Footer Customize Panel
	    'footer'        => array(
			'title'      => esc_html__( 'Footer', 'industris' ),
			'priority'   => 10,
			'capability' => 'edit_theme_options',
		),
	);

	$sections = array(			
		'main_footer'           => array(
            'title'       => esc_html__( 'Footer Content', 'industris' ),
            'description' => '',
            'priority'    => 20,
            'capability'  => 'edit_theme_options',
            'panel'       => 'footer',
        ),
        'footer_styling'           => array(
            'title'       => esc_html__( 'Footer Styling', 'industris' ),
            'description' => '',
            'priority'    => 21,
            'capability'  => 'edit_theme_options',
            'panel'       => 'footer',
        ),
	);

	$fields = array(		
		//Footer Widgets
		'footer_widgets'     => array(
            'type'        => 'toggle',
            'label'       => esc_attr__( 'Footer Widgets On/Off?', 'industris' ),
            'section'     => 'main_footer',
            'default'     => 1,
            'priority'    => 3,
        ),
		//Footer Bottom	
		'footer_bottom'     => array(
            'type'        => 'toggle',
            'label'       => esc_attr__( 'Footer Bottom On/Off?', 'industris' ),
            'section'     => 'main_footer',
            'default'     => 1,
            'priority'    => 3,
        ),
        'info_separator'     => array(
			'type'        => 'custom',
			'label'       => '',
			'section'     => 'main_footer',
			'default'     => '<hr>',
            'priority'    => 4,
            'active_callback' => array(
                array(
                    'setting'  => 'footer_bottom',
                    'operator' => '==',
                    'value'    => 1,
                ),
            ),
        ),
        'text_bottom'  => array(
            'type'     => 'select',
            'label'    => esc_html__( 'Footer Bottom Text', 'industris' ),
            'section'  => 'main_footer',
            'default'  => 'ci',
            'priority' => 5,
            'choices'  => array(
                'cr' 	 => esc_html__( 'CopyRight', 'industris' ),
                'ci' 	 => esc_html__( 'Contact Info', 'industris' ),
            ),
            'active_callback' => array(
                array(
                    'setting'  => 'footer_bottom',
                    'operator' => '==',
                    'value'    => 1,
                ),
            ),
        ),
        'copyright'     => array(
            'type'        => 'textarea',
            'label'       => esc_attr__( 'CopyRight', 'industris' ),
            'section'     => 'main_footer',
            'priority'    => 5,
            'active_callback' => array(
                array(
                    'setting'  => 'footer_bottom',
                    'operator' => '==',
                    'value'    => 1,
                ),
                array(
                    'setting'  => 'text_bottom',
                    'operator' => '==',
                    'value'    => 'cr',
                ),
            ),
        ),
        'footer_contact_info'     => array(
			'type'     => 'repeater',
			'label'    => esc_html__( 'Contact Info', 'industris' ),
			'section'  => 'main_footer',
			'priority' => 5,
			'active_callback' => array(
				array(
					'setting'  => 'footer_bottom',
					'operator' => '==',
					'value'    => 1,
                ),
                array(
                    'setting'  => 'text_bottom',
                    'operator' => '==',
                    'value'    => 'ci',
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

        //Footer Styling
        'ptop_footer'  => array(
            'type'     => 'number',
            'label'    => esc_html__( 'Padding Top Footer Widgets', 'industris' ),
            'section'  => 'footer_styling',
            'default'  => '120',
            'priority' => 1,
            'output'   => array(
                array(
                    'element'  => '.main-footer',
                    'property' => 'padding-top',
                    'units'	   => 'px'
                ),
            ),
        ),
        'pbot_footer'  => array(
            'type'     => 'number',
            'label'    => esc_html__( 'Padding Bottom Footer Widgets', 'industris' ),
            'section'  => 'footer_styling',
            'default'  => '80',
            'priority' => 1,
            'output'   => array(
                array(
                    'element'  => '.main-footer',
                    'property' => 'padding-bottom',
                    'units'	   => 'px'
                ),
            ),
        ),
        'bgimg_footer'    => array(
            'type'     => 'image',
            'label'    => esc_html__( 'Background Image Footer Widgets', 'industris' ),
            'section'  => 'footer_styling',
            'priority' => 1,
            'output'    => array(
                array(
                    'element'  => '.main-footer',
                    'property' => 'background-image',
                ),
            ),
        ),
        'bg_footer'    => array(
            'type'     => 'color',
            'label'    => esc_html__( 'Background Color Footer Widgets', 'industris' ),
            'section'  => 'footer_styling',
            'priority' => 1,
            'output'    => array(
                array(
                    'element'  => '.main-footer',
                    'property' => 'background-color',
                ),
            ),
        ),
        'color_footer' => array(
            'type'     => 'color',
            'label'    => esc_html__( 'Color Footer Widgets', 'industris' ),
            'section'  => 'footer_styling',
            'priority' => 2,
            'output'    => array(
                array(
                    'element'  => '.main-footer, .main-footer a, .main-footer h4, .main-footer ul a, .main-footer a.gray, .main-footer a.gray:visited',
                    'property' => 'color',
                ),
                array(
                    'element'  => '.main-footer a.gray, .main-footer a.gray:visited',
                    'property' => 'border-color',
                ),
            ),
        ),
        'cta_separator'     => array(
            'type'        => 'custom',
            'label'       => '',
            'section'     => 'footer_styling',
            'default'     => '<hr>',
            'priority'    => 3,
        ),
        'bg_bfooter'    => array(
            'type'     => 'color',
            'label'    => esc_html__( 'Background Bottom Footer', 'industris' ),
            'section'  => 'footer_styling',
            'priority' => 4,
            'output'    => array(
                array(
                    'element'  => '.footer-bottom',
                    'property' => 'background',
                ),
            ),
        ),
        'color_bfooter' => array(
            'type'     => 'color',
            'label'    => esc_html__( 'Color Top Footer', 'industris' ),
            'section'  => 'footer_styling',
            'priority' => 5,
            'output'    => array(
                array(
                    'element'  => '.footer-bottom a, .footer-bottom',
                    'property' => 'color',
                )
            ),
        ),
	);

	$settings['panels']   = apply_filters( 'industris_customize_panels', $panels );
	$settings['sections'] = apply_filters( 'industris_customize_sections', $sections );
	$settings['fields']   = apply_filters( 'industris_customize_fields', $fields );

	return $settings;
}

$industris_customize = new Industris_Customize( footer_customize_settings() );