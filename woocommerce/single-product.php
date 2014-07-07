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
	<div id="sidebar" class="span two break-on-mobile">
		<?php dynamic_sidebar( 'product-sidebar' ); ?>
	</div>	
	<div id="content" class="span eight break-on-mobile">
		<div class="breadcrumb">
			<?php
				do_action( 'woocommerce_before_main_content' );
			?>
		</div>

		<?php while ( have_posts() ) : the_post(); ?>
			<?php wc_get_template_part( 'content', 'single-product' ); ?>
		<?php endwhile; ?>	

		<?php do_action( 'woocommerce_after_main_content' ); ?>	
	</div>
</div>	
<?php get_footer( 'shop' ); ?>