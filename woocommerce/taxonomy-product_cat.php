<?php
/**
 * The Template for displaying products in a product category. Simply includes the archive template.
 *
 * Override this template by copying it to yourtheme/woocommerce/taxonomy-product_cat.php
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
	<div id="content" class="woo-cat span eight break-on-mobile content-inner">
		<div class="breadcrumb">
			<?php
				do_action( 'woocommerce_before_main_content' );
				do_action( 'woocommerce_after_main_content' );
			?>
		</div>	

		<?php 
		 	// Get Category Header
			$queried_object = get_queried_object(); 

			$taxonomy = $queried_object->taxonomy;

			$category_name = $queried_object->name;
			$term_id = $queried_object->term_id;  

			// Get Category Thumbnails
		    $thumbnail_id = get_woocommerce_term_meta( $term_id, 'thumbnail_id', true );
		    $thumbnail = wp_get_attachment_url( $thumbnail_id );			
			 
			$cat_description = get_field('category_description', $queried_object);		 
			$cat_image = get_field('category_header_image', $taxonomy . '_' . $term_id);
 
			// Get Parent Category name;
			$prod_terms = get_the_terms( $post->ID, 'product_cat' );

			foreach ($prod_terms as $prod_term) {
			    $product_cat_id = $prod_term->term_id;
			    $product_parent_category = get_ancestors( $product_cat_id, 'product_cat' );  
			    $parent_cat_id = array_shift( $product_parent_category );
			}
		    $term = get_term_by( 'id', $parent_cat_id, 'product_cat', 'ARRAY_A' );
			$parent_name = $term['name'];

			$term = get_term_by( 'slug', get_query_var( 'term' ), get_query_var( 'taxonomy' ) );
			$parent = get_term($term->parent, get_query_var('taxonomy') );
			$children = get_term_children($term->term_id, get_query_var('taxonomy')); //					
		?>		


<?php if(($parent->term_id=="") && (sizeof($children)>0)): ?> 
	<!-- Tempalte if Category has Children -->
		<?php if ($cat_description !=''): ?>
			<div class="row cat-header">
				<div class="span five break-on-mobile">
					<?php echo $cat_description; ?>
				</div>
				<div class="span five break-on-mobile">
					<img src="<?php echo $cat_image; ?>" alt="">
				</div>			
			</div>
		<?php endif ?>	
		<div class="woo-content">
				Shiiit This is a TOP LEVEL Product Cat!	
			<?php if ( have_posts() ) : ?>
				<?php woocommerce_product_loop_start(); ?>

					<?php woocommerce_product_subcategories(); ?>

					<?php while ( have_posts() ) : the_post(); ?>

						<?php wc_get_template_part( 'content', 'product' ); ?>

					<?php endwhile; // end of the loop. ?>

				<?php woocommerce_product_loop_end(); ?>
			<?php elseif ( ! woocommerce_product_subcategories( array( 'before' => woocommerce_product_loop_start( false ), 'after' => woocommerce_product_loop_end( false ) ) ) ) : ?>

				<?php wc_get_template( 'loop/no-products-found.php' ); ?>

			<?php endif; ?>

			<?php do_action( 'woocommerce_after_main_content' ); ?>	
		</div>
	</div>

<?php elseif(($parent->term_id!="") && (sizeof($children)==0)): ?>
	<!-- Tempalte if Category has NOT Children -->

		<?php if ($cat_description !=''): ?>
			<div class="row cat-header no-child">
				<div class="span five break-on-mobile equal-height logo">
					<?php 
					    if ( $thumbnail ) {
						    echo '<img src="' . $thumbnail . '" class="vertical-align" />';
						}
					 ?>				
				</div>
				<div class="span five break-on-mobile equal-height picture">
					<img src="<?php echo $cat_image; ?>" alt="">
				</div>			
			</div>
		<?php endif ?>
		<div class="content-inner">
			<div class="woo-content span seven">	
				<?php if ($cat_description): ?>
					<h3 class="section-title"><?php echo 'About ' . $category_name; ?></h3>
					<div class="cat-description">
						<?php echo $cat_description; ?>
					</div>
				<?php endif; ?>
				<h3 class="section-title"><?php echo $parent_name; ?></h3>


				<?php if ( have_posts() ) : ?>
					<?php woocommerce_product_loop_start(); ?>

						<?php woocommerce_product_subcategories(); ?>

						<?php while ( have_posts() ) : the_post(); ?>

							<div class="span five item equal-height">
								<a href="<?php the_permalink(); ?>">
									<?php the_post_thumbnail('thumbnail'); ?>
									<h4><?php the_title(); ?></h4>
									<?php 
										  $excerpt = apply_filters( 'woocommerce_short_description', $post->post_excerpt );
										  $excerpt = strip_tags($excerpt);
										  $excerpt = substr($excerpt, 0, 200);
										  $excerpt = substr($excerpt, 0, strripos($excerpt, " "));
										  $excerpt = $excerpt . ' ...';
									?>
									<p><?php echo $excerpt; ?></p>
								</a>								
							</div>

						<?php endwhile; // end of the loop. ?>

					<?php woocommerce_product_loop_end(); ?>
				<?php elseif ( ! woocommerce_product_subcategories( array( 'before' => woocommerce_product_loop_start( false ), 'after' => woocommerce_product_loop_end( false ) ) ) ) : ?>

					<?php wc_get_template( 'loop/no-products-found.php' ); ?>

				<?php endif; ?>

			</div>
			<div class="span three">
				sidebar
			</div>
			<div class="span ten same-level-categories">
	                <?php
	                  global $post;
	                  $args = array(
	                    'orderby'            => 'ASC',
	                    'parent'             => $parent_cat_id,
	                    'order'              => 'ASC',
	                    'hide_empty' => 0,
	                );  ?>

	                <?php $catTerms = get_terms('product_cat', $args); ?>

	                <?php foreach($catTerms as $catTerm) : ?>
	                    <?php
	                        $thumbnail_id = get_woocommerce_term_meta( $catTerm->term_id, 'thumbnail_id', true );
	                        $image = wp_get_attachment_image_src($thumbnail_id, 'full');
	                    ?>
						<div class="span five item break-on-mobile">
		                    <a href="<?php bloginfo('url') ?>/product-category/<?php echo $catTerm->slug; ?>">
		                      <?php echo '<img src="'.$image[0].'" />';  ?>
		                    </a>                  
	                    </div>
	                <?php endforeach; ?>
			</div>
		</div>
		<?php get_template_part( 'woocommerce/right-product', 'page' ); ?>

		<?php do_action( 'woocommerce_after_main_content' ); ?>	
	</div>

<?php else: ?>

	middle level category
<?php endif; ?>
</div>	
<?php get_footer( 'shop' ); ?>