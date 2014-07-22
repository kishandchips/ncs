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
	<div id="single">
		<div id="sidebar" class="span two">
			<?php dynamic_sidebar( 'news-sidebar' ); ?>
		</div>
		<div id="content" class="span eight">
			<div class="span four break-on-mobile sidebar">
				<?php if(has_post_thumbnail()) :?>
					<?php the_post_thumbnail(); ?>
				<?php endif;?>
					
				<?php dynamic_sidebar( 'get-in-touch' ); ?>

			</div>		
			<div class="span six break-on-mobile content-inner">
			<?php while ( have_posts() ) : the_post(); ?>
				<?php if(!$post->post_content == ''): ?>
				<div class="page-content">
					<?php the_content(); ?>
				</div>
				<?php endif; ?>
				<?php if ( get_field('content')):?>
					<?php get_template_part('inc/content'); ?>
				<?php endif; ?>			
			</div>
			<?php endwhile; // end of the loop. ?>
		</div>
	</div>
</div><!-- #page -->
<?php get_footer(); ?>