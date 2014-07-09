<?php
/**
 * Example Widget Class
 */
class Auto_Childs extends WP_Widget {
 
 
    /** constructor -- name this the same as the class above */
    function Auto_Childs() {
        parent::WP_Widget(false, $name = 'Auto list Child pages widget');	
    }
 
    /** @see WP_Widget::widget -- do not rename this */
    function widget($args, $instance) {	
        extract( $args );
        $title 		= apply_filters('widget_title', $instance['title']);
        ?>
              <?php echo $before_widget; ?>
                  <?php if ( $title ) echo $before_title . $title . $after_title; ?>
					<?php 
						$parent = array_reverse(get_post_ancestors($post->ID));
						$first_parent = get_page($parent[0]);
						$top_parent =  $first_parent->ID;
						$top_parent_title = $first_parent->post_title;
						$current = get_the_id();

							$args = array(
							    'post_type'      => 'page',
							    'posts_per_page' => -1,
							    'post_parent'    => $top_parent,
							    'orderby'        => 'menu_order'
							 );
							
						$parent = new WP_Query( $args );

						if ( $parent->have_posts() ) : 
							echo '<ul class="childpages">';
							    while ( $parent->have_posts() ) : $parent->the_post(); ?>
							    	<li <?php if ($current == get_the_id()) {echo 'class="current"';} ?>>

										<a href="<?php the_permalink(); ?>"><?php the_title(); ?> </a>
									<?php echo '</li>';
							    endwhile;
							echo '</ul>';
						endif; wp_reset_query(); 
					?>
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
 
 
} // end class Auto_Childs
add_action('widgets_init', create_function('', 'return register_widget("Auto_Childs");'));
?>