<?php
function typography_customize_settings() {
    /**
     * Customizer configuration
     */

    $settings = array(
        'theme' => 'industris',
    );

    $panels = array(
        
    );

    $sections = array(
        'typography'           => array(
            'title'       => esc_html__( 'Typography', 'industris' ),
            'description' => '',
            'priority'    => 15,
            'capability'  => 'edit_theme_options',
        ),
    );

    $fields = array(
        // Typography
        'body_typo'    => array(
            'type'     => 'typography',
            'label'    => esc_html__( 'Body', 'industris' ),
            'section'  => 'typography',
            'priority' => 10,
            'default'  => array(
                'font-family'    => 'Poppins',
                'variant'        => 'regular',
                'font-size'      => '15px',
                'line-height'    => '1.86',
                'letter-spacing' => '0',
                'subsets'        => array( 'latin-ext' ),
                'color'          => '#fff',
                'text-transform' => 'none',
            ),
        ),
        'heading1_typo'                           => array(
            'type'     => 'typography',
            'label'    => esc_html__( 'Heading 1', 'industris' ),
            'section'  => 'typography',
            'priority' => 10,
            'default'  => array(
                'font-family'    => 'Poppins',
                'variant'        => '600',
                'font-size'      => '36px',
                'line-height'    => '1.33',
                'letter-spacing' => '0',
                'subsets'        => array( 'latin-ext' ),
                'color'          => '#fff',
                'text-transform' => 'none',
            ),
        ),
        'heading2_typo'                           => array(
            'type'     => 'typography',
            'label'    => esc_html__( 'Heading 2', 'industris' ),
            'section'  => 'typography',
            'priority' => 10,
            'default'  => array(
                'font-family'    => 'Poppins',
                'variant'        => '600',
                'font-size'      => '30px',
                'line-height'    => '1.33',
                'letter-spacing' => '0',
                'subsets'        => array( 'latin-ext' ),
                'color'          => '#fff',
                'text-transform' => 'none',
            ),
        ),
        'heading3_typo'                           => array(
            'type'     => 'typography',
            'label'    => esc_html__( 'Heading 3', 'industris' ),
            'section'  => 'typography',
            'priority' => 10,
            'default'  => array(
                'font-family'    => 'Poppins',
                'variant'        => '600',
                'font-size'      => '24px',
                'line-height'    => '1.33',
                'letter-spacing' => '0',
                'subsets'        => array( 'latin-ext' ),
                'color'          => '#fff',
                'text-transform' => 'none',
            ),
        ),
        'heading4_typo'                           => array(
            'type'     => 'typography',
            'label'    => esc_html__( 'Heading 4', 'industris' ),
            'section'  => 'typography',
            'priority' => 10,
            'default'  => array(
                'font-family'    => 'Poppins',
                'variant'        => '600',
                'font-size'      => '18px',
                'line-height'    => '1.33',
                'letter-spacing' => '0',
                'subsets'        => array( 'latin-ext' ),
                'color'          => '#fff',
                'text-transform' => 'none',
            ),
        ),
        'heading5_typo'                           => array(
            'type'     => 'typography',
            'label'    => esc_html__( 'Heading 5', 'industris' ),
            'section'  => 'typography',
            'priority' => 10,
            'default'  => array(
                'font-family'    => 'Poppins',
                'variant'        => '600',
                'font-size'      => '16px',
                'line-height'    => '1.33',
                'letter-spacing' => '0',
                'subsets'        => array( 'latin-ext' ),
                'color'          => '#fff',
                'text-transform' => 'none',
            ),
        ),
        'heading6_typo'                           => array(
            'type'     => 'typography',
            'label'    => esc_html__( 'Heading 6', 'industris' ),
            'section'  => 'typography',
            'priority' => 10,
            'default'  => array(
                'font-family'    => 'Poppins',
                'variant'        => '600',
                'font-size'      => '12px',
                'line-height'    => '1.33',
                'letter-spacing' => '0',
                'subsets'        => array( 'latin-ext' ),
                'color'          => '#fff',
                'text-transform' => 'none',
            ),
        ),
        'menu_typo'                               => array(
            'type'     => 'typography',
            'label'    => esc_html__( 'Menu', 'industris' ),
            'section'  => 'typography',
            'priority' => 10,
            'default'  => array(
                'font-family'    => 'Poppins',
                'variant'        => '500',
                'subsets'        => array( 'latin-ext' ),
                'font-size'      => '13px',
                'text-transform' => 'none',
            ),
        ),

    );

    $settings['panels']   = apply_filters( 'industris_customize_panels', $panels );
    $settings['sections'] = apply_filters( 'industris_customize_sections', $sections );
    $settings['fields']   = apply_filters( 'industris_customize_fields', $fields );

    return $settings;
}

$industris_customize = new Industris_Customize( typography_customize_settings() );