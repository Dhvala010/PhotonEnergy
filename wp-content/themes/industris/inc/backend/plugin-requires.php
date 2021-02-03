<?php
/**
 * Register required, recommended plugins for theme
 *
 * @link http://tgmpluginactivation.com/configuration/
 *
 * @package Industris
 */
require_once get_template_directory() . '/inc/libs/class-tgm-plugin-activation.php';
function industris_register_required_plugins() {
	$protocol = is_ssl() ? 'https' : 'http';
	$plugins = array(
		array(
			'name'               => esc_html__( 'Meta Box', 'industris' ),
			'slug'               => 'meta-box',
			'required'           => true,
		),
		array(
			'name'               => esc_html__( 'Kirki', 'industris' ),
			'slug'               => 'kirki',
			'required'           => true,
		),
		array(
			'name'               => esc_html__( 'Elementor Page Builder', 'industris' ),
			'slug'               => 'elementor',
			'required'           => true,
		),
		array(
            'name'               => esc_html__( 'Contact Form 7', 'industris' ),
            'slug'               => 'contact-form-7',
            'required'           => false,
		),
		array(
            'name'               => esc_html__( 'MailChimp for WordPress', 'industris' ),
            'slug'               => 'mailchimp-for-wp',
            'required'           => false,
        ),
        array(
            'name'               => esc_html__( 'Woocommerce', 'industris' ),
            'slug'               => 'woocommerce',
            'required'           => false,
        ),
        array(
            'name'               => esc_html__( 'OT Services', 'industris' ), // The plugin name.
            'slug'               => 'ot_service', // The plugin slug (typically the folder name).
            'source'             => esc_url($protocol.'://oceanthemes.net/ot-plugins/ot_service.zip'), // The plugin source.
            'required'           => false, // If false, the plugin is only 'recommended' instead of required.
        ),
        array(
            'name'               => esc_html__( 'OT Portfolio', 'industris' ), // The plugin name.
            'slug'               => 'ot_portfolio', // The plugin slug (typically the folder name).
            'source'             => esc_url($protocol.'://oceanthemes.net/ot-plugins/ot_portfolio.zip'), // The plugin source.
            'required'           => false, // If false, the plugin is only 'recommended' instead of required.
        ),
        array(            
            'name'               => esc_html__( 'OT One Click Demo Content', 'industris' ), // The plugin name.
            'slug'               => 'soo-demo-importer', // The plugin slug (typically the folder name).
            'source'             => esc_url($protocol.'://oceanthemes.net/plugins-required/soo-demo-importer.zip'), // The plugin source.
            'required'           => false, // If false, the plugin is only 'recommended' instead of required.
        ),
	);
	$config  = array(
		'domain'       => 'industris',
		'default_path' => '',
		'menu'         => 'install-required-plugins',
		'has_notices'  => true,
		'is_automatic' => false,
		'message'      => '',
		'strings'      => array(
			'page_title'                      => esc_html__( 'Install Required Plugins', 'industris' ),
			'menu_title'                      => esc_html__( 'Install Plugins', 'industris' ),
			'installing'                      => esc_html__( 'Installing Plugin: %s', 'industris' ),
			'oops'                            => esc_html__( 'Something went wrong with the plugin API.', 'industris' ),
			'notice_can_install_required'     => _n_noop( 'This theme requires the following plugin: %1$s.', 'This theme requires the following plugins: %1$s.', 'industris' ),
			'notice_can_install_recommended'  => _n_noop( 'This theme recommends the following plugin: %1$s.', 'This theme recommends the following plugins: %1$s.', 'industris' ),
			'notice_cannot_install'           => _n_noop( 'Sorry, but you do not have the correct permissions to install the %s plugin. Contact the administrator of this site for help on getting the plugin installed.', 'Sorry, but you do not have the correct permissions to install the %s plugins. Contact the administrator of this site for help on getting the plugins installed.', 'industris' ),
			'notice_can_activate_required'    => _n_noop( 'The following required plugin is currently inactive: %1$s.', 'The following required plugins are currently inactive: %1$s.', 'industris' ),
			'notice_can_activate_recommended' => _n_noop( 'The following recommended plugin is currently inactive: %1$s.', 'The following recommended plugins are currently inactive: %1$s.', 'industris' ),
			'notice_cannot_activate'          => _n_noop( 'Sorry, but you do not have the correct permissions to activate the %s plugin. Contact the administrator of this site for help on getting the plugin activated.', 'Sorry, but you do not have the correct permissions to activate the %s plugins. Contact the administrator of this site for help on getting the plugins activated.', 'industris' ),
			'notice_ask_to_update'            => _n_noop( 'The following plugin needs to be updated to its latest version to ensure maximum compatibility with this theme: %1$s.', 'The following plugins need to be updated to their latest version to ensure maximum compatibility with this theme: %1$s.', 'industris' ),
			'notice_cannot_update'            => _n_noop( 'Sorry, but you do not have the correct permissions to update the %s plugin. Contact the administrator of this site for help on getting the plugin updated.', 'Sorry, but you do not have the correct permissions to update the %s plugins. Contact the administrator of this site for help on getting the plugins updated.', 'industris' ),
			'install_link'                    => _n_noop( 'Begin installing plugin', 'Begin installing plugins', 'industris' ),
			'activate_link'                   => _n_noop( 'Activate installed plugin', 'Activate installed plugins', 'industris' ),
			'return'                          => esc_html__( 'Return to Required Plugins Installer', 'industris' ),
			'plugin_activated'                => esc_html__( 'Plugin activated successfully.', 'industris' ),
			'complete'                        => esc_html__( 'All plugins installed and activated successfully. %s', 'industris' ),
			'nag_type'                        => 'updated',
		),
	);

	tgmpa( $plugins, $config );
}

add_action( 'tgmpa_register', 'industris_register_required_plugins' );
