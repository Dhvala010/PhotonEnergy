<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Industris
 */

?>

	</div><!-- #content -->

	<footer id="site-footer" class="site-footer bg-second">
		<?php if( industris_get_option('footer_widgets') ) { if ( is_active_sidebar( 'footer-area-1' ) || is_active_sidebar( 'footer-area-2' ) || is_active_sidebar( 'footer-area-3' ) || is_active_sidebar( 'footer-area-4' ) ){ ?>
		    <div class="main-footer">
		    	<div class="container container-bigger">
			    	<div class="row">
			    		<?php get_sidebar('footer');?>
			    	</div>
			    </div>
		    </div><!-- .main-footer -->
	    <?php } } if( industris_get_option('footer_bottom') ) { ?>
		<div class="footer-bottom">
			<div class="container container-bigger">
	            <div class="row">
	                <div class="col-lg-8 col-md-12">
						<?php if( industris_get_option('text_bottom') == 'cr' ) { ?>
		                <div class="footer-copyright">
		                	<?php echo wp_kses( industris_get_option('copyright'), wp_kses_allowed_html('post') ); ?>
		                </div>
						<?php }if( industris_get_option('text_bottom') == 'ci' ) { ?>
							<ul class="info-list none-style">
								<?php $contact_infos = industris_get_option( 'footer_contact_info', array() ); ?>
								<?php foreach ( $contact_infos as $contact_info ) { ?>
									<li>
										<?php if($contact_info['info_icon'] != ''){ ?><i class="fa fa-<?php echo esc_attr($contact_info['info_icon']); ?>"></i><?php } ?>
										<?php echo wp_specialchars_decode($contact_info['info_content']); ?>
									</li>
								<?php } ?>
							</ul>
						<?php } ?>
	                </div>
	                <div class="col-lg-4">
	                	<div class="footer-nav text-right mobile-center">
	                		<?php
								wp_nav_menu( array(
									'theme_location' => 'footer',
									'menu_id'        => 'footer-menu',
									'menu_class'     => 'none-style',
									'container'      => '',
								) );
							?>
	                	</div>
	                </div>
	            </div>
	        </div>
		</div><!-- .copyright-footer -->
		<?php } ?>
		<a id="back-to-top" href="#" class="show"><i class="ion ion-ios-arrow-up"></i></a>
	</footer>
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
