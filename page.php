<?php
/**
 * Page template
 * @package ncs
 * @since ncs 1.0
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
	<div id="content" class="span eight">
		<div class="span four break-on-mobile sidebar">
			<?php if(has_post_thumbnail()) :?>
				<?php the_post_thumbnail(); ?>
			<?php endif;?>

			<?php dynamic_sidebar( 'pages' ); ?>
		</div>		
		<div class="span six break-on-mobile">
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