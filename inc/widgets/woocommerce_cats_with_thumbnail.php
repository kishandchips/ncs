<?php
/**
 * Woocommerce Top level Categories With Thumbnail Widget Class
 */
class Product_Cats_With_Thumb extends WP_Widget {
 
 
    /** constructor -- name this the same as the class above */
    function Product_Cats_With_Thumb() {
        parent::WP_Widget(false, $name = 'Woocommerce Categories with Thumbnails');	
    }
 
    /** @see WP_Widget::widget -- do not rename this */
    function widget($args, $instance) {	
        extract( $args );
        $title 		= apply_filters('widget_title', $instance['title']);
        ?>
              <?php echo $before_widget; ?>
                <ul>
                  <?php if ( $title )
                        echo $before_title . $title . $after_title; ?>
                <?php
                  global $post;
                  $args = array(
                    'orderby'            => 'ASC',
                    'parent'             => 0,
                    'order'              => 'ASC',
                    'hide_empty' => 0,
                );  ?>

                <?php $catTerms = get_terms('product_cat', $args); ?>

                <?php foreach($catTerms as $catTerm) : ?>
                  <?php echo $catTerm->description ; ?>
                  <?php
                    $thumbnail_id = get_woocommerce_term_meta( $catTerm->term_id, 'thumbnail_id', true );
                    $image = wp_get_attachment_image_src($thumbnail_id, 'custom-navigation');
                    
                  ?>
                  <li>
                    <a href="<?php bloginfo('url') ?>/product-category/<?php echo $catTerm->slug; ?>">
                      <span><?php echo $catTerm->name; ?></span>
                      <?php echo '<img src="'.$image[0].'" />';  ?>
                    </a>                  
                  </li>
                <?php endforeach; ?>
                <?php wp_reset_postdata(); ?>
                </ul>
              <?php echo $after_widget; ?>
        <?php
    }
 
    /** @see WP_Widget::update -- do not rename this */
    function update($new_instance, $old_instance) {		
		$instance = $old_instance;
		$instance['title'] = strip_tags($new_instance['title']);
        return $instance;
    }
 
    /** @see WP_Widget::form -- do not rename this */
    function form($instance) {	
 
        $title 		= esc_attr($instance['title']);
        ?>
         <p>
          <label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:'); ?></label> 
          <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" />
        </p>
        <?php 
    }
 
 
} // end class Product_Cats_With_Thumb
add_action('widgets_init', create_function('', 'return register_widget("Product_Cats_With_Thumb");'));
?>