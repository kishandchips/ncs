<?php
/**
 * Template Name: Testimonials
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
			<div id="testimonials">
		
				<div class="span seven break-on-mobile content-inner">
					<?php 
						$parent = array_reverse(get_post_ancestors($post->ID));
						$first_parent = get_page($parent[0]);
						$slug =  $first_parent->post_name;

					 ?>
					<?php 
						$have_image = array();
						$have_no_image = array();

						query_posts( array ( 
							'post_type'			=>	'testimonial',
							'taxonomy'			=>	'testimonial_category',
							'term' 				=> 	$slug,
							'posts_per_page' 	=>  -1,
							'order'				=> 'DESC'
						)); 
					?>

					<?php if ( have_posts() ) : ?>
						<?php while ( have_posts() ) : the_post(); ?>
							<?php if (get_field('image')): ?>
								<?php $have_image[] = $post;  ?>
							<?php else: ?>
								<?php $have_no_image[] = $post; ?>
							<?php endif; ?>
						<?php endwhile; ?>
					<?php endif; ?>

					<div class="span six image">
						<?php foreach ($have_image as $post): ?>
							<?php setup_postdata($post); ?>
								<div class="testimonial box">
									<div class="image">
										<?php 
											$attachment_id = get_field('image');
											$size = "full"; 
											$image = wp_get_attachment_image_src( $attachment_id, $size );
										?>								
										<img src="<?php echo $image[0]; ?>" alt="">
									</div>
									<div class="copy">
										<?php 
											$attachment_id = get_field('person_image');
											$size = "small-thumbnail"; 
											$image = wp_get_attachment_image_src( $attachment_id, $size );
										?>
										<img class="author-image" src="<?php echo $image[0]; ?>" alt="">
										<div class="quote">
											<?php the_title(); ?>	
										</div>
										<div class="meta">
											<span class="author">
												<?php the_field('testimonial_author'); ?>	
											</span>
											<span class="position">
												<?php the_field('position'); ?>
											</span>
										</div>
									</div>
								</div>
						<?php endforeach ?>
						<?php wp_reset_postdata(); ?>				
					</div>				

					<div class="span four imageless">
						<?php foreach ($have_no_image as $post): ?>
							<?php setup_postdata($post); ?>
								<div class="testimonial">
									<div class="quote">
										<?php the_title(); ?>	
									</div>
									<div class="meta">
										<span class="author">
											<?php the_field('testimonial_author'); ?>	
										</span>
										<span class="position">
											<?php the_field('position'); ?>
										</span>
									</div>
								</div>
						<?php endforeach ?>
						<?php wp_reset_postdata(); ?>			
					</div>
				</div>
				<div class="span three break-on-mobile sidebar">
					<?php dynamic_sidebar( 'testimonials' ); ?>
				</div>		
			</div>	
		</div>
	</div>
</div><!-- #page -->
<?php get_footer(); ?>