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
	 
	  	global $post;
	  	$brand = get_field('product_brand');
		$cats = wp_get_post_terms( $post->ID, 'product_cat' );

	  	foreach ( $cats as $cat ) $cats_array[] = $cat->term_id;

	  $query_args = array( 'post__not_in' => array( $post->ID ), 
	  	'posts_per_page' => 3, 
	  	'no_found_rows' => 1, 
	  	'post_status' => 'publish', 
	  	'post_type' => 'product', 
	  	'order' => 'ASC',
		'meta_key' => 'product_brand',
		'meta_value' => $brand,
	  	'tax_query' => array( 
		    array(
		      'taxonomy' => 'product_cat',
		      'field' => 'id',
			  'posts_per_page' => 3,	      
		      'terms' => $cats_array
	    )));
	 
	  $brands = new WP_Query($query_args);
			
	  if ($brands->have_posts()) {
	    ?>
	      <?php while ($brands->have_posts()) : $brands->the_post(); global $product; ?>
				<div class="span three item">
					<a href="<?php the_permalink(); ?>">
						<?php the_post_thumbnail('thumbnail'); ?>
						<h4><?php the_title(); ?></h4>
					</a>								
				</div>
	      <?php endwhile; ?>
	    <?php
	    wp_reset_query();
	  }	 
	}
	?>		
	</div>
	<div class="span five break-on-mobile">
		<h2><?php _e( 'Similar Products', 'woocommerce' ); ?></h2>
	<?php

		/**
		 * Products From Same Category
		 *
		 */	
	 
	if ( is_singular('product') ) {
	 
	  global $post;
	  $terms = wp_get_post_terms( $post->ID, 'product_cat' );
	  foreach ( $terms as $term ) $cats_array[] = $term->term_id;

	  $query_args = array( 'post__not_in' => array( $post->ID ), 
	  	'posts_per_page' => 3, 
	  	'no_found_rows' => 1, 
	  	'post_status' => 'publish', 
	  	'post_type' => 'product', 
	  	'order' => 'ASC',
	  	'tax_query' => array( 
		    array(
		      'taxonomy' => 'product_cat',
		      'field' => 'id',
			  'posts_per_page' => 3,	      
		      'terms' => $cats_array
	    )));
	 
	  $r = new WP_Query($query_args);
			
	  if ($r->have_posts()) {
	    ?>
	      <?php while ($r->have_posts()) : $r->the_post(); global $product; ?>
				<div class="span three item">
					<a href="<?php the_permalink(); ?>">
						<?php the_post_thumbnail('thumbnail'); ?>
						<h4><?php the_title(); ?></h4>
					</a>								
				</div>
	      <?php endwhile; ?>
	    <?php
	    wp_reset_query();
	  }	 
	}
	?>		
	</div>
</div>

<?php do_action( 'woocommerce_after_single_product' ); ?>
