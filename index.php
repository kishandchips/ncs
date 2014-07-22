<?php
/**
 * Article / Blog archive template
 * @package ncs
 * @since ncs 1.0
 */

get_header(); ?>

<div id="page" class="container">
	<div id="sidebar" class="span two">
		<?php dynamic_sidebar( 'news-sidebar' ); ?>
	</div>
	<div id="content" class="span eight">
		<div id="news">
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