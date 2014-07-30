<?php
/*
 * Template Name: Full Width
 */

get_header(); ?>

<div id="page" class="container">
	<div id="sidebar" class="span two">
		<!-- Sidebar Selector-->
		<?php 
			$value = get_field_object('choose_sidebar');
		 	$sidebar = $value['value'];
		 ?>
		 <?php if ($sidebar == 'commercial' ): ?>
		 	<?php dynamic_sidebar( 'commercial-sidebar' ); ?>
		 <?php else:  ?>
		 	<?php dynamic_sidebar( 'education-sidebar' ); ?>
		 <?php endif; ?>
		
	</div>
	<div id="content" class="span eight full-width">
		<div class="span ten break-on-mobile content-inner">
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
	</div>
</div><!-- #page -->
<?php get_footer(); ?>