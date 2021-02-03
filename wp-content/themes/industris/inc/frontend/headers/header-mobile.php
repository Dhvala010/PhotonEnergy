<div class="header_mobile<?php if( industris_get_option('header_mobile_sticky') ) echo ' msticky'; ?>">
	<div class="mlogo_wrapper container clearfix dtable">
        <div class="mobile_logo dcell">
            <a href="<?php echo esc_url( home_url( '/' ) ); ?>"><img src="<?php echo industris_get_option('logo') ?>" alt="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>"></a>
    	</div>
        <div id="mmenu_toggle" class="dcell">
	        <button></button>
	    </div>
    </div>
    <div class="mmenu_wrapper">		
		<div class="mobile_nav collapse container">
			<?php
				wp_nav_menu( array(
					'theme_location' => 'primary',
					'menu_class'     => 'mobile_mainmenu',
					'container'      => '',
				) );
			?>
		</div>   	
    </div>
</div>
