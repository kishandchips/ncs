<?php get_header(); ?>
<section id="front-page" class="clearfix container">
<div id="main" role="main" class="clearfix">
<div id="front-page">
	<div id="page" class="container">
		<?php while ( have_posts() ) : the_post(); ?>
		<div id="content">
			<?php if(!$post->post_content == ''): ?>
			<div class="page-content">
				<h1 class="page-title"><?php the_title(); ?></h1>
				<?php the_content(); ?>
			</div>
			<?php endif; ?>
			<?php if ( get_field('content')):?>
				<?php get_template_part('inc/content'); ?>
			<?php endif; ?>
						
		</div>
		<?php endwhile; // end of the loop. ?>
	</div><!-- #page -->
</div>
</div>
</section><!-- #front-page -->
<?php get_footer(); ?>
