<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package fantrac
 * @since fantrac 1.0
 */

get_header(); ?>

<div id="page" class="container">
	<div id="sidebar" class="span two break-on-mobile">
		<?php dynamic_sidebar( 'news-sidebar' ); ?>
	</div>
	<div id="content" class="span eight break-on-mobile">

		<?php if ( have_posts() ) : ?>
				<?php while ( have_posts() ) : the_post(); ?>
					<article id="<?php echo $post->ID; ?>" class="post">
						<a href="<?php the_permalink(); ?>">
							<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
						</a>
						<?php the_excerpt(); ?>
					</article>

				<?php endwhile; ?>
				<?php get_template_part('inc/pagination'); ?>	

			<?php else : ?>
				<!-- If no content, include the "No posts found" template.
				//get_template_part( 'content', 'none' ); -->

			<?php endif; ?>

	</div>
</div><!-- #page -->
<?php get_footer(); ?>