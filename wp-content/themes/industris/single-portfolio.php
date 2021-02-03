<?php
/**
 * The template for displaying all portfolio
 *
 * This is the template that displays all portfolio by default.
 * Please note that this is the WordPress construct of portfolio
 * and that other 'portfolio' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Industris
 */

get_header();
?>

    <?php while ( have_posts() ) : the_post(); the_content(); endwhile; ?>

<?php
get_footer();