<?php
/**
 * Hooks for importer
 *
 * @package Industris
 */


/**
 * Importer the demo content
 *
 * @since  1.0
 *
 */
function industris_importer() {
	return array(
		array(
			'name'       => 'Home 1',
			'preview'    => get_template_directory_uri().'/inc/backend/data/home1/home1.jpg',
			'content'    => get_template_directory_uri().'/inc/backend/data/demo-content.xml',
			'customizer' => get_template_directory_uri().'/inc/backend/data/customizer.dat',
			'widgets'    => get_template_directory_uri().'/inc/backend/data/widgets.wie',
			'pages'      => array(
				'front_page' => 'Home 1',
				'blog'       => 'News',
				'shop'       => 'Shop',
				'cart'       => 'Cart',
				'checkout'   => 'Checkout',
				'my_account' => 'My Account',
			),
			'menus'      => array(
				'primary'   => 'main-menu',
				'footer'    => 'footer-menu',
			)
		),
		array(
			'name'       => 'Home 2',
			'preview'    => get_template_directory_uri().'/inc/backend/data/home2/home2.jpg',
			'content'    => get_template_directory_uri().'/inc/backend/data/demo-content.xml',
			'customizer' => get_template_directory_uri().'/inc/backend/data/customizer.dat',
			'widgets'    => get_template_directory_uri().'/inc/backend/data/widgets.wie',
			'pages'      => array(
				'front_page' => 'Home 2',
				'blog'       => 'News',
				'shop'       => 'Shop',
				'cart'       => 'Cart',
				'checkout'   => 'Checkout',
				'my_account' => 'My Account',
			),
			'menus'      => array(
				'primary'   => 'main-menu',
				'footer'    => 'footer-menu',
			)
		),
		array(
			'name'       => 'Home 3',
			'preview'    => get_template_directory_uri().'/inc/backend/data/home3/home3.jpg',
			'content'    => get_template_directory_uri().'/inc/backend/data/demo-content.xml',
			'customizer' => get_template_directory_uri().'/inc/backend/data/customizer.dat',
			'widgets'    => get_template_directory_uri().'/inc/backend/data/widgets.wie',
			'pages'      => array(
				'front_page' => 'Home 3',
				'blog'       => 'News',
				'shop'       => 'Shop',
				'cart'       => 'Cart',
				'checkout'   => 'Checkout',
				'my_account' => 'My Account',
			),
			'menus'      => array(
				'primary'   => 'main-menu',
				'footer'    => 'footer-menu',
			)
		),
		array(
			'name'       => 'Home 4',
			'preview'    => get_template_directory_uri().'/inc/backend/data/home4/home4.jpg',
			'content'    => get_template_directory_uri().'/inc/backend/data/demo-content.xml',
			'customizer' => get_template_directory_uri().'/inc/backend/data/customizer.dat',
			'widgets'    => get_template_directory_uri().'/inc/backend/data/widgets.wie',
			'pages'      => array(
				'front_page' => 'Home 4',
				'blog'       => 'News',
				'shop'       => 'Shop',
				'cart'       => 'Cart',
				'checkout'   => 'Checkout',
				'my_account' => 'My Account',
			),
			'menus'      => array(
				'primary'   => 'main-menu',
				'footer'    => 'footer-menu',
			)
		),
	);
}

add_filter( 'soo_demo_packages', 'industris_importer', 30 );