<?php
/**
 * Single Post / arcticle template
 * @package ncs
 * @since ncs 1.0
 */

get_header(); ?>

<div id="page" class="container">
	<div id="single">
		<div id="sidebar" class="span two">
			<?php 
				// if Service page
				if ( get_post_type() == 'service' )
				{
				   dynamic_sidebar( 'service-pages' );
				}
				// if Case Study Page
				elseif(get_post_type() == 'case_study') { 

			  		dynamic_sidebar( 'education-sidebar' );

				} else {
				    dynamic_sidebar( 'news-sidebar' );
				}

			 ?>		
		</div>
		<div id="content" class="span eight <?php if(get_post_type() == 'case_study'): ?>single-case-study<?php endif; ?>">
			<div class="span four break-on-mobile sidebar">
				<?php if(has_post_thumbnail()) :?>
					<?php the_post_thumbnail(); ?>
				<?php endif;?>

				<?php dynamic_sidebar( 'articles' ); ?>
			</div>		
			<div class="span six break-on-mobile content-inner">
			<?php if(get_post_type() == 'case_study'): ?> 
				<div class="case-study-header">
					<span class="date"><?php the_time('F Y'); ?></span>
					<h1><?php the_title(); ?></h1>
					<?php get_template_part('inc/sharethis'); ?>
				</div>
			<?php endif; ?> 
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