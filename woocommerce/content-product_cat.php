<?php
/**
 * The template for displaying product category thumbnails within loops.
 *
 * Override this template by copying it to yourtheme/woocommerce/content-product_cat.php
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     1.6.4
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

global $woocommerce_loop;

// Store loop count we're currently on
if ( empty( $woocommerce_loop['loop'] ) )
	$woocommerce_loop['loop'] = 0;

// Store column count for displaying the grid
if ( empty( $woocommerce_loop['columns'] ) )
	$woocommerce_loop['columns'] = apply_filters( 'loop_shop_columns', 4 );

// Increase loop count
$woocommerce_loop['loop']++;
?>
<li class="product-category product<?php
    if ( ( $woocommerce_loop['loop'] - 1 ) % $woocommerce_loop['columns'] == 0 || $woocommerce_loop['columns'] == 1 )
        echo ' first';
	if ( $woocommerce_loop['loop'] % $woocommerce_loop['columns'] == 0 )
		echo ' last';
	?>">

	<?php do_action( 'woocommerce_before_subcategory', $category ); ?>

	<a href="<?php echo get_term_link( $category->slug, 'product_cat' ); ?>">


		<?php
			/**
			 * woocommerce_before_subcategory_title hook
			 *
			 * @hooked woocommerce_subcategory_thumbnail - 10
			 */
			// do_action( 'woocommerce_before_subcategory_title', $category );

		    $thumbnail_id = get_woocommerce_term_meta( $category->term_id, 'thumbnail_id', true );
		    $image = wp_get_attachment_url( $thumbnail_id );
		    if ( $image ) {
		    	echo '<div class="image-holder equal-height">';
			    echo '<img class="vertical-align" src="' . $image . '" alt="" />';
			    echo '</div>';
			}

		?>

		<h3>
			<?php
				echo $category->name;

				if ( $category->count > 0 )
					echo apply_filters( 'woocommerce_subcategory_count_html', ' <mark class="count">(' . $category->count . ')</mark>', $category );
			?>
		</h3>

			<?php $category_description = get_field('category_description', 'product_cat_' . $category->term_id); ?>

			<?php 
				  $excerpt = $category_description;
				  $excerpt = strip_tags($excerpt);
				  $excerpt = substr($excerpt, 0, 200);
				  $excerpt = substr($excerpt, 0, strripos($excerpt, " "));
				  $excerpt = $excerpt . ' ...';
			?>
			<p class="excerpt"><?php echo $excerpt; ?></p>		

		<?php
			/**
			 * woocommerce_after_subcategory_title hook
			 */
			do_action( 'woocommerce_after_subcategory_title', $category );
		?>

	</a>

	<?php do_action( 'woocommerce_after_subcategory', $category ); ?>

</li>