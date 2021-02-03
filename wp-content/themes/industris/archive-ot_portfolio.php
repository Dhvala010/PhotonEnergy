<?php
/**
 * The template for displaying archive portfolio pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Industris
 */

get_header(); ?>

<div class="entry-content project-page">
	<div class="container">
		<div class="grid-projects row">
			<?php if ( have_posts() ) : ?>

				<?php
				/* Start the Loop */
				if ( get_query_var('paged') ) {
				    $paged = get_query_var('paged');
				} elseif ( get_query_var('page') ) { // 'page' is used instead of 'paged' on Static Front Page
				    $paged = get_query_var('page');
				} else {
				    $paged = 1;
				}
				$args = array(
                    'post_type' => 'ot_portfolio',
                    'posts_per_page' => 6,
                    'paged' => $paged,
                );
				$wp_query = new WP_Query($args);
    			while ($wp_query -> have_posts()) : $wp_query -> the_post();

					/*
					 * Include the Post-Type-specific template for the content.
					 * If you want to override this in a child theme, then include a file
					 * called content-___.php (where ___ is the Post Type name) and that will be used instead.
					 */
					get_template_part( 'template-parts/content-project', get_post_type() );

				endwhile;

				else :

					get_template_part( 'template-parts/content', 'none' );

				endif;
			?>
		</div>
		<?php industris_posts_navigation(); ?>
	</div>
</div>

<?php
get_footer();

