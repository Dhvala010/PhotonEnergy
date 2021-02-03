<div class="project-item col-md-4 col-sm-6">
    <div class="relative">
        <div class="overlay">
            <div class="pmeta font-second">
                <?php the_terms( $post->ID, 'portfolio_cat', '', ' / ' ); ?>
            </div>
            <h4 class="project-name">
                <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
            </h4>
            <?php the_excerpt(); ?>
            <a class="btn-details" href="<?php the_permalink(); ?>"><?php echo esc_html__('View details').' <i class="icon ion-md-add-circle-outline"></i>'; ?></a>
        </div>
        <a href="<?php the_permalink(); ?>">
            <img src="<?php echo wp_get_attachment_url(get_post_thumbnail_id()); ?>" alt="<?php the_title(); ?>" />
        </a>
    </div>
</div>