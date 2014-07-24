<?php
/*
 * Template Name: Articles
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
		<div id="news">
			<?php 
				$parent = array_reverse(get_post_ancestors($post->ID));
				$first_parent = get_page($parent[0]);
				$slug =  $first_parent->post_name;
			 ?>
			<?php 
				global $query_string;
				query_posts( array ( 'category_name' => $slug, 'posts_per_page' => -1 ) ); 
			?>
			<?php if ( have_posts() ) : ?>
				<?php while ( have_posts() ) : the_post(); ?>
						<article id="<?php echo $post->ID; ?>" class="post span third equal-height break-on-mobile">
						<a href="<?php the_permalink(); ?>">
							<?php
								if ( has_post_thumbnail() ) {
									the_post_thumbnail('custom-medium');
								}
								else {
									echo '<img src="' . get_bloginfo( 'stylesheet_directory' ) . '/images/misc/thumbnail-default.jpg" />';
								}
							?>
							<div class="title">
								<?php the_title( '<h2 class="entry-title">', '</h2>' ); ?>	
							</div>
							
						</a>
					</article>
				<?php endwhile; ?>
				<?php get_template_part('inc/pagination'); ?>	
			<?php else : ?>
					<!-- If no content, include the "No posts found" template.
					//get_template_part( 'content', 'none' ); -->
			<?php endif; ?>
		</div>
	</div>
</div><!-- #page -->
<?php get_footer(); ?>