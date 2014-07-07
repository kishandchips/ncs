<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package fantrac
 * @since fantrac 1.0
 */

get_header(); ?>

<div id="page" class="container">
	<div id="sidebar" class="span two break-on-mobile">
		<?php dynamic_sidebar( 'news-sidebar' ); ?>
	</div>
	<div id="content" class="span eight break-on-mobile">
		<?php while ( have_posts() ) : the_post(); ?>
			<?php if(!$post->post_content == ''): ?>
			<div class="page-content">
				<?php the_content(); ?>
			</div>
			<?php endif; ?>
			<?php if ( get_field('content')):?>
				<?php get_template_part('inc/content'); ?>
			<?php endif; ?>
		<?php endwhile; // end of the loop. ?>
	</div>
</div><!-- #page -->
<?php get_footer(); ?>