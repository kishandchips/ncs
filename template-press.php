<?php
/**
 * Template Name: Press
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
			<div id="press">
				<div class="span seven break-on-mobile">
					<div class="page-content">
						<?php if ( have_posts() ) : ?>
							<?php while ( have_posts() ) : the_post(); ?>
								<?php the_content(); ?>
							<?php endwhile; ?>
						<?php endif; ?>	
						<?php wp_reset_postdata(); ?>						
					</div>

					<?php 

						query_posts( array ( 
							'post_type'			=>	'press',
							'posts_per_page' 	=>  -1
						)); 
					?>

					<?php if ( have_posts() ) : ?>
						<?php while ( have_posts() ) : the_post(); ?>
							<article class="press">
								<div class="span three image">
								<?php 
									$thumb = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full' );
									$url = $thumb['0'];
								 ?>
									<a class="img" href="<?php echo $url; ?>">
										<?php the_post_thumbnail(array(200, 'bfi_thumb' => true)); ?>
									</a>
								</div>
								<div class="span seven content">
									<h2 class="title"><?php the_title(); ?></h2>
									
									<?php the_content(); ?>
								</div>
							</article>
						<?php endwhile; ?>
					<?php endif; ?>	
				</div>
				<div class="span three break-on-mobile sidebar">
					<?php dynamic_sidebar( 'news-sidebar' ); ?>
				</div>		
			</div>	
		</div>
	</div>
</div><!-- #page -->
<?php get_footer(); ?>