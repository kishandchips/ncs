<?php
/**
 * The Template for displaying all single products.
 *
 * Override this template by copying it to yourtheme/woocommerce/single-product.php
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     1.6.4
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

get_header( 'shop' ); ?>

<div id="page" class="container">
	<div id="sidebar" class="span two">
		<?php dynamic_sidebar( 'product-sidebar' ); ?>
	</div>	
	<div id="content" class="span eight break-on-mobile">
		<div class="breadcrumb">
			<?php
				woocommerce_breadcrumb();
			?>
		</div>
		<div id="product">
			<?php while ( have_posts() ) : the_post(); ?>
				<?php wc_get_template_part( 'content', 'single-product' ); ?>
			<?php endwhile; ?>				
		</div>
		<?php get_template_part( 'woocommerce/right-product', 'page' ); ?>

	</div>
</div>	
<?php get_footer( 'shop' ); ?>