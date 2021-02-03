<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Industris
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class('post-box'); ?>>
    <?php if ( has_post_thumbnail() ) { ?>
        <div class="entry-media">
            <a href="<?php the_permalink(); ?>">
                <?php the_post_thumbnail(); ?>
            </a>
        </div>
    <?php } ?>
    <div class="inner-post">
        <header class="entry-header">

            <?php if ( 'post' === get_post_type() ) : ?>
            <div class="entry-meta">
                <?php industris_post_meta(); ?>
            </div><!-- .entry-meta -->
            <?php endif; ?>

            <?php the_title( '<h4 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h4>' ); ?>

        </header><!-- .entry-header -->

        <div class="entry-summary">

            <?php the_excerpt(); ?>

        </div><!-- .entry-content -->

        <footer class="entry-footer">

            <a class="post-link btn-details" href="<?php the_permalink(); ?>"><?php if(industris_get_option('blog_read_more')){ echo wp_specialchars_decode(industris_get_option('blog_read_more').' <i class="icon ion-md-add-circle-outline"></i>'); } ?></a>
            
        </footer><!-- .entry-footer -->
    </div>
</article>