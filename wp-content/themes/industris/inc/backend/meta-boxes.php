<?php
/**
 * Registering meta boxes
 *
 * Using Meta Box plugin: http://www.deluxeblogtips.com/meta-box/
 *
 * @see https://docs.metabox.io/
 *
 * @param array $meta_boxes Default meta boxes. By default, there are no meta boxes.
 *
 * @return array All registered meta boxes
 */
function industris_register_meta_boxes( $meta_boxes ) {
	// Page Settings
	$meta_boxes[] = array(
		'id'       => 'page-settings',
		'title'    => esc_html__( 'Page Settings', 'industris' ),
		'pages'    => array( 'page' ),
		'context'  => 'normal',
		'priority' => 'high',
		'autosave' => true,
		'fields'   => array(
            array(
                'id'        => 'page_layout',
                'name'      => esc_html__( 'Page Layout', 'industris' ),
                'type'      => 'image_select',
                'options'   => array(
                    'full-content'    => get_template_directory_uri() . '/inc/backend/images/full.png',
                    'content-sidebar' => get_template_directory_uri() . '/inc/backend/images/right.png',
                    'sidebar-content' => get_template_directory_uri() . '/inc/backend/images/left.png',
                ),
                'std'       => 'full-content'
            ),
            array(
                'name'             => esc_html__( 'Page Header On/Off?', 'industris' ),
                'id'               => 'pheader_switch',
                'type'             => 'switch',
                'style'            => 'rounded',
                'on_label'         => 'On',
                'off_label'        => 'Off',
                'std'              => 'on'
            ),
            array(
                'name'             => esc_html__( 'Background Image Page Header', 'industris' ),
                'id'               => 'pheader_bg_image',
                'type'             => 'image_advanced',
                'max_file_uploads' => 1,
            )
		),
	);

    $meta_boxes[] = array(
        'id'       => 'extra-settings',
        'title'    => esc_html__( 'Extra Settings', 'industris' ),
        'pages'    => array( 'ot_service', 'ot_portfolio' ),
        'context'  => 'normal',
        'priority' => 'high',
        'autosave' => true,
        'fields'   => array(
            array(
                'name'             => esc_html__( 'Page Header On/Off?', 'industris' ),
                'id'               => 'pheader_switch',
                'type'             => 'switch',
                'style'            => 'rounded',
                'on_label'         => 'On',
                'off_label'        => 'Off',
                'std'              => 'on'
            ),
            array(
                'name'             => esc_html__( 'Background Image Page Header', 'industris' ),
                'id'               => 'pheader_bg_image',
                'type'             => 'image_advanced',
                'max_file_uploads' => 1,
            )
        ),
    );

    $meta_boxes[] = array(
        'id'       => 'project-settings',
        'title'    => esc_html__( 'Project Settings', 'industris' ),
        'pages'    => array( 'ot_portfolio' ),
        'context'  => 'normal',
        'priority' => 'high',
        'autosave' => true,
        'fields'   => array(
            array(
                'name'             => esc_html__( 'Slider Image', 'industris' ),
                'id'               => 'slide_image',
                'type'             => 'image_advanced',
                'max_file_uploads' => 1,
            )
        ),
    );

	return $meta_boxes;
}

add_filter( 'rwmb_meta_boxes', 'industris_register_meta_boxes' );
