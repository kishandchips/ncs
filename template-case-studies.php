<?php
/**
 * Template Name: Case Studies
 *
 */

get_header(); ?>

<div id="page" class="container">
	<div id="single">
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
			<div id="case-studies" class="clearfix">	
				<?php 
					$parent = array_reverse(get_post_ancestors($post->ID));
					$first_parent = get_page($parent[0]);
					$slug =  $first_parent->post_name;
				 ?>
				<?php 
					$have_image = array();
					$have_no_image = array();

					query_posts( array ( 
						'post_type'			=>	'case_study',
						'taxonomy'			=>	'case_study_category',
						'term' 				=> 	$slug,
						'posts_per_page' 	=>  -1,
						'order'				=> 'DESC',
						'showposts'			=> '10',
						'paged'				=> $paged
					)); 
				?>
				<?php $i = 1; ?>
				<?php if ( have_posts() ) : ?>
					<?php while ( have_posts() ) : the_post(); ?>
					<article class="study span five equal-height break-on-mobile wide">
						<a href="<?php the_permalink(); ?>">
							<?php
								if ( has_post_thumbnail() ) {
										the_post_thumbnail(array(501, 240, 'bfi_thumb' => true));	
								}
								else {
									echo '<img src="' . get_bloginfo( 'stylesheet_directory' ) . '/images/misc/thumbnail-default.jpg" />';
								}
							?>
							<div class="title">
								<?php the_title( '<h2 class="entry-title">', '</h2>' ); ?>	
							</div>
							<span class="readmore"><?php _e('Read our Case Study') ?></span>
							
						</a>
					</article>
						
					<?php $i++; ?>
					<?php endwhile; ?>
				<?php endif; ?>		
			</div>
								<?php get_template_part('inc/pagination'); ?>	
					<?php wp_reset_postdata(); ?>
		</div>
	</div>
</div><!-- #page -->
<?php get_footer(); ?>