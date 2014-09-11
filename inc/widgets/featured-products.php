<?php 

class Featured_Products_Widget extends WP_Widget {
    
    function Featured_Products_Widget() {
        $widget_opts = array( 'description' => __('Display Featured Products') );
        parent::WP_Widget(false, 'Featured Products', $widget_opts);
    }

    function form($instance) {
        $title = (isset($instance['title'])) ? esc_attr($instance['title']) : '';  
        ?>

        <p>
            <label>Title: <input class="widefat" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" /></label>
        </p>

        <?php
    }

    function update($new_instance, $old_instance){
        return $new_instance;
    }
    
    function widget($args, $instance) {
        global $post;

         $title  = apply_filters('widget_title', $instance['title']);
        echo $args['before_widget'];

        $queried_object = get_queried_object(); 
        $taxonomy = $queried_object->taxonomy;
        $term_id = $queried_object->term_id; 
        ?>

        <?php $products = get_field('featured_products', $taxonomy . '_' . $term_id); ?>

        <?php if($products): ?>
            <?php if ( $title ): ?>
                <h1 class="widget-title">
                    <span><?php echo $before_title . $title . $after_title; ?></span>
                </h1>
            <?php endif; ?>
            <ul class="product_list_widget">
                <?php foreach ($products as $post): ?>
                    <?php setup_postdata( $post ); ?>
                    <li>
                        <a href="<?php the_permalink();?>" title="<?php the_title(); ?>">
                            <?php the_post_thumbnail('shop_thumbnail'); ?>
                            <?php the_title(); ?>
                        </a>
                    </li>
                <?php endforeach; ?>  
            </ul>
            <?php wp_reset_postdata(); ?>
        <?php endif; ?>

        <?php echo $args['after_widget']; ?>
        <?php 
    }
}

register_widget('Featured_Products_Widget');



?>
