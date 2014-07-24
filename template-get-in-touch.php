<?php
/**
 * Template Name: Get In Touch
 */

get_header(); ?>

<div id="page" class="container">
	<div id="get-in-touch">
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