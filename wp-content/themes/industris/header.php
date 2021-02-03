<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Industris
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="site">
	<header id="site-header" class="site-header <?php echo industris_get_option('header_layout'); if( industris_get_option('header_desktop_sticky') ) echo ' is-sticky'; ?>">
		<?php 
			if( industris_get_option('header_layout') == "header2" ){
				get_template_part('inc/frontend/headers/header-2');
			}else{
		?>
		<?php if ( industris_get_option('topbar_switch') ){ ?>
		<!-- Top bar start -->
		<div class="top-bar">
			<div class="container container-bigger">
				<?php if ( industris_get_option('info_switch') ){ ?>
	            <!-- contact info -->
	            <ul class="info-list f-left">
	                <?php $contact_infos = industris_get_option( 'header_contact_info', array() ); ?>
	                <?php foreach ( $contact_infos as $contact_info ) { ?>
	                    <li>
	                        <?php if($contact_info['info_icon'] != ''){ ?><i class="fa fa-<?php echo esc_attr($contact_info['info_icon']); ?>"></i><?php } ?>
	                        <?php echo wp_specialchars_decode($contact_info['info_content']); ?>
	                    </li>
	                <?php } ?>
	            </ul>
	            <!-- contact info close -->
		        <?php } ?>
                <div class="f-right right-box dtable">
					<?php if ( industris_get_option('search_switch') ){ ?>
					<div class="toggle_search dcell md-hidden sm-hidden">
						<i class="icon ion-md-search"></i>
						<div class="h-search-form-field">
							<?php get_search_form(); ?>
						</div>
					</div>
					<?php } if ( industris_get_option('login_switch') ){ ?>
					<div class="dcell md-hidden sm-hidden">
						<a class="login-btn" href="<?php echo wp_login_url(); ?>"><?php echo esc_html__('Login', 'industris'); ?></a>
					</div>
					<?php } if ( function_exists( 'pll_the_languages' ) ) { ?>
					<div class="poly-switcher dcell md-hidden sm-hidden">
						<?php echo do_shortcode('[polylang_langswitcher]'); ?>
					</div>
					<?php } if ( class_exists( 'woocommerce' ) ) { ?>
					<div class="cart-btn dcell md-hidden sm-hidden">
						<a class="cart-header" href="<?php echo esc_url( wc_get_cart_url() ); ?>"><i class="fas fa-shopping-cart" aria-hidden="true"></i></a>
					</div>
					<?php } ?>
                </div>
			</div>
		</div>
		<!-- Top bar close -->
		<?php } ?>

		<!-- Main header start -->
		<div class="main-header md-hidden sm-hidden">
			<div class="container container-bigger">
				<div class="dtable">

					<div id="site-logo" class="dcell">
						<a href="<?php echo esc_url( home_url( '/' ) ); ?>">
							<img src="<?php echo industris_get_option('logo') ?>" alt="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>">
						</a>
					</div>

					<nav id="site-navigation" class="main-navigation dcell">			
						<?php
							wp_nav_menu( array(
								'theme_location' => 'primary',
								'menu_id'        => 'primary-menu',
								'container'      => '',
							) );
						?>
					</nav>
					
					<?php $btns = industris_get_option( 'cta_btn', array() ); if($btns) { ?> 
					<div class="cta-btns dcell">
						<div class="btns">                        
							<?php foreach ( $btns as $btn ) { ?>
								<a <?php if($btn['nwin']) echo 'target="_blank"'; ?> class="btn" href="<?php echo esc_url($btn['link']); ?>"><?php echo wp_specialchars_decode($btn['name']); ?></a>
							<?php } ?>
						</div>
					</div>
					<?php } ?>

				</div>
			</div>
		</div>		
		<!-- Main header close -->
		<?php } ?>
		<!-- Header mobile open -->
		<?php get_template_part('inc/frontend/headers/header-mobile');  ?>
		<!-- Header mobile close -->

	</header><!-- #site-header -->

	<div id="content" class="site-content">
    <?php industris_page_header(); ?>
