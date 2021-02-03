<!-- Main header start -->
<div class="main-header">
	<div class="container container-bigger">
		<div class="dtable">

			<div id="site-logo" class="dcell md-hidden sm-hidden">
				<a href="<?php echo esc_url( home_url( '/' ) ); ?>">
					<img src="<?php echo industris_get_option('logo') ?>" alt="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>">
				</a>
			</div>

			<?php if ( industris_get_option('info_switch') ){ ?>
			<!-- contact info -->
			<ul class="info-list dcell">
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

			<?php if ( industris_get_option('search_switch') ){ ?>
			<div class="toggle_search dcell md-hidden sm-hidden">
				<i class="icon ion-md-search"></i>
				<div class="h-search-form-field">
					<?php get_search_form(); ?>
				</div>
			</div>
			<?php } if ( class_exists( 'woocommerce' ) ) { ?>
			<div class="cart-btn dcell md-hidden sm-hidden">
				<a class="cart-header" href="<?php echo esc_url( wc_get_cart_url() ); ?>"><i class="fas fa-shopping-cart" aria-hidden="true"></i></a>
			</div>
			<?php } ?>

			<?php $btns = industris_get_option( 'cta_btn', array() ); if($btns) { ?> 
			<div class="cta-btns dcell md-hidden sm-hidden">
				<div class="btns">                        
					<?php foreach ( $btns as $btn ) { ?>
						<a <?php if($btn['nwin']) echo 'target="_blank"'; ?> class="btn" href="<?php echo esc_url($btn['link']); ?>"><?php echo wp_specialchars_decode($btn['name']); ?></a>
					<?php } ?>
				</div>
			</div>
			<?php } ?>
			
		</div>
	</div>
	<div class="bg-second md-hidden sm-hidden">
		<div class="container container-bigger">
			<nav id="site-navigation" class="main-navigation">			
				<?php
					wp_nav_menu( array(
						'theme_location' => 'primary',
						'menu_id'        => 'primary-menu',
						'container'      => '',
					) );
				?>
			</nav>
		</div>
	</div>
</div>
<!-- Main header close -->