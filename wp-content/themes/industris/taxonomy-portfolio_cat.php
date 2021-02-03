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
			while ( have_posts() ) :
			the_post();

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

