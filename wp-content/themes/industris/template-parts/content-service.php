<div class="service-item col-md-4 col-sm-6">
	<div class="relative">
        <a class="overlay" href="<?php the_permalink(); ?>"></a>
        <div class="service-info">
            <h4 class="service-name">
            	<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
            </h4>
        	<a class="btn-details" href="<?php the_permalink(); ?>"><?php echo esc_html__('View details').' <i class="icon ion-md-add-circle-outline"></i>'; ?></a>
        </div>
    	<img src="<?php echo wp_get_attachment_url(get_post_thumbnail_id()); ?>" alt="<?php the_title(); ?>" />
    </div>
</div>