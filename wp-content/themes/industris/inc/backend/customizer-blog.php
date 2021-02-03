<?php
function blog_customize_settings() {
	/**
	 * Customizer configuration
	 */

	$settings = array(
		'theme' => 'industris',
	);

	$sections = array(
		'blog_page'           => array(
			'title'       => esc_html__( 'Blog', 'industris' ),
			'description' => '',
			'priority'    => 10,
			'capability'  => 'edit_theme_options',
		),
	);

	$fields = array(
		// Blog Page
		'blog_layout'           => array(
			'type'        => 'radio-image',
			'label'       => esc_html__( 'Blog Layout', 'industris' ),
			'section'     => 'blog_page',
			'default'     => 'content-sidebar',
			'priority'    => 9,
			'description' => esc_html__( 'Select default sidebar for the blog page.', 'industris' ),
			'choices'     => array(
				'content-sidebar' 	=> get_template_directory_uri() . '/inc/backend/images/right.png',
				'sidebar-content' 	=> get_template_directory_uri() . '/inc/backend/images/left.png',
				'full-content' 		=> get_template_directory_uri() . '/inc/backend/images/full.png',
			)
		),
		'post_entry_meta'              => array(
            'type'     => 'multicheck',
            'label'    => esc_html__( 'Entry Meta', 'industris' ),
            'section'  => 'blog_page',
            'default'  => array( 'date', 'author', 'cat' ),
            'choices'  => array(
                'date'    => esc_html__( 'Date', 'industris' ),
                'cat'     => esc_html__( 'Categories', 'industris' ),
                'author'  => esc_html__( 'Author', 'industris' ),
            ),
            'priority' => 10,
        ),
		'blog_read_more'               => array(
			'type'            => 'text',
			'label'           => esc_html__( 'Read More Button', 'industris' ),
			'section'         => 'blog_page',
			'default'         => esc_html__( 'Read more', 'industris' ),
			'priority'        => 11,
		),
	);
	
	$settings['sections'] = apply_filters( 'industris_customize_sections', $sections );
	$settings['fields']   = apply_filters( 'industris_customize_fields', $fields );

	return $settings;
}

$industris_customize = new Industris_Customize( blog_customize_settings() );