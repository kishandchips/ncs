<?php
/**
 * The Template for displaying product archives, including the main shop page which is a post type archive.
 *
 * Override this template by copying it to yourtheme/woocommerce/archive-product.php
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     2.0.0
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

get_header( 'shop' ); ?>

<div id="page" class="container">
	<div id="sidebar" class="span two">
		<?php dynamic_sidebar( 'product-sidebar' ); ?>
	</div>	
	<div id="content" class="span eight break-on-mobile content-inner">
	<?php query_posts('page_id=16'); ?>
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
	</div>	
</div>	
<?php get_footer( 'shop' ); ?>