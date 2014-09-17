<?php
/**
 * The template for displaying product content in the single-product.php template
 *
 * Override this template by copying it to yourtheme/woocommerce/content-single-product.php
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     1.6.4
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
?>

<?php
	/**
	 * woocommerce_before_single_product hook
	 *
	 * @hooked wc_print_notices - 10
	 */
	 do_action( 'woocommerce_before_single_product' );

	 if ( post_password_required() ) {
	 	echo get_the_password_form();
	 	return;
	 }
?>

<div itemscope itemtype="<?php echo woocommerce_get_product_schema(); ?>" id="product-<?php the_ID(); ?>" <?php post_class(); ?>>

	<?php
		do_action( 'woocommerce_before_single_product_summary' );
	?>

	<div class="summary entry-summary">
		<?php
			do_action( 'woocommerce_single_product_summary' );
		?>

			<?php if(get_field('datasheet_file')): ?>
				<a href="<?php the_field('datasheet_file'); ?>" class="download-btn"><?php the_field('datasheet_name'); ?></a>
			<?php endif; ?>

	</div><!-- .summary -->
	<meta itemprop="url" content="<?php the_permalink(); ?>" />		

</div><!-- #product-<?php the_ID(); ?> -->


<div class="more-products">
	<div class="span five break-on-mobile">
		<h2><?php _e( 'Related Products', 'woocommerce' ); ?></h2>
	<?php

		/**
		 * Products From Same Brand
		 *
		 */	
	 
	if ( is_singular('product') ) {
	  $related_products = get_field('related_products');
	  if($related_products):
		foreach ($related_products as $post):
           	setup_postdata( $post );
    ?>
				<div class="span three item">
					<a href="<?php the_permalink(); ?>">
						<?php the_post_thumbnail('thumbnail'); ?>
						<h4><?php the_title(); ?></h4>
					</a>								
				</div>
	    <?php endforeach; endif; } ?>
	    <?php wp_reset_postdata(); ?>	
	</div>
	<div class="span five break-on-mobile">
		<h2><?php _e( 'Similar Products', 'woocommerce' ); ?></h2>
	<?php

		/**
		 * Products From Same Category
		 *
		 */	
	 
	if ( is_singular('product') ) {
	 
	  $similar_products = get_field('similar_products');
	  if($similar_products):
		foreach ($similar_products as $post):
           	setup_postdata( $post );
    ?>
				<div class="span three item">
					<a href="<?php the_permalink(); ?>">
						<?php the_post_thumbnail('thumbnail'); ?>
						<h4><?php the_title(); ?></h4>
					</a>								
				</div>
	    <?php endforeach; endif;} ?>
	    <?php wp_reset_postdata(); ?>
	</div>
</div>

<?php do_action( 'woocommerce_after_single_product' ); ?>
