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
			<div class="case-study-header">
				<div class="span six break-on-mobile equal-height title">
					<div class="inner">
						<span class="date"><?php the_time('F Y'); ?></span>
						<h1><?php the_title(); ?></h1>

					</div>
					<?php get_template_part('inc/sharethis'); ?>
				</div>
				<?php 
					$thumb = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'medium-large' );
					$url = $thumb['0'];
				 ?>
				<div class="span four break-on-mobile equal-height thumbnail" <?php if(has_post_thumbnail()) :?> style="background-image: url('<?php echo $url; ?>') "<?php endif;?>>	
				</div>
			</div><!-- /Case Study Header  -->
			<div class="span four break-on-mobile sidebar">
				<?php dynamic_sidebar( 'articles' ); ?>
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
				<?php wp_reset_query(); ?>
			</div>

			<?php if(get_field('show_related_case_studies', $id)): ?>
				<div class="related-cs span ten">
			<?php 
		 
			$related = get_field('select_related_case_studies');
		 
			if( $related ): ?>
					<h1 class="case-studies-title">Related Articles & Case Studies</h1>
					<div id="case-studies" class="related clearfix">	
					<?php $i = 1; ?>
					<?php foreach( $related as $p ): // variable must NOT be called $post (IMPORTANT) ?>
					<article class="study span one-third equal-height break-on-mobile <?php if($i % 6 == 3): ?>wide<?php endif; ?>">
						<a href="<?php echo get_permalink( $p->ID ); ?>">
							<?php  ?>

							<?php 
								echo get_the_post_thumbnail($p->ID,array(330, 240, 'bfi_thumb' => true) );
							 ?>						

							<div class="title">
								<h2 class="entry-title"><?php echo get_the_title($p->ID ); ?></h2>
							</div>
							<span class="readmore"><?php _e('Read our Case Study') ?></span>
						</a>
					</article>
					<?php $i++; ?>
					<?php endforeach; ?>
					<?php wp_reset_postdata(); ?>

					</div>
				</div>
			<?php endif; ?>
		<?php endif; ?>			
		</div>

	</div>
</div><!-- #page -->
<?php get_footer(); ?>