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

					// $terms = get_the_terms( $post->ID, 'case_study_category' );

				 //    foreach($terms as $term){
				 //    	if ($term->slug == 'commercial') {
				 //    		global $parent_id, $page_id, $wp_query;
				 //    	}
				 //    }
			  		dynamic_sidebar( 'education-sidebar' );

				} else {
				    dynamic_sidebar( 'news-sidebar' );
				}
			 ?>		
		</div>
		<div id="content" class="span eight">
			<div class="span four break-on-mobile sidebar">
				<?php if(has_post_thumbnail()) :?>
					<?php the_post_thumbnail(); ?>
				<?php endif;?>

				<?php dynamic_sidebar( 'articles' ); ?>
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