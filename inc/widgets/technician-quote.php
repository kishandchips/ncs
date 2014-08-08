<?php
/**
 * Technician Quote
 */
class Technician_Quote extends WP_Widget {
 
 
    /** constructor -- name this the same as the class above */
    function Technician_Quote() {
        parent::WP_Widget(false, $name = 'Technician Quote');	
    }
 
    /** @see WP_Widget::widget -- do not rename this */
    function widget($args, $instance) {	
        extract( $args );
        $title      = apply_filters('widget_title', $instance['title']);
        $quote    = $instance['quote'];
        $author    = $instance['author'];
        $position    = $instance['position'];
        ?>
              <?php echo $before_widget; ?>
                  <?php if ( $title )
                        echo $before_title . $title . $after_title; ?>
							<div class="tech-quote">
                                
                                <div class="image">
                                    <img src="<?php bloginfo('template_directory')?>/images/misc/tech-quote.jpg" alt="">
                                </div>
                                <div class="copy">
                                    <div class="quote">
                                        <?php echo $quote; ?>
                                    </div>
                                    <div class="meta">
                                        <span class="author">
                                            <?php echo $author; ?>
                                        </span>
                                        <span class="position">
                                            <?php echo $position ?>
                                        </span>
                                    </div>
                                    <img class="author-image" src="<?php echo $image[0]; ?>" alt="">
                                </div>                                
							</div>
              <?php echo $after_widget; ?>
        <?php
    }
 
    /** @see WP_Widget::update -- do not rename this */
    function update($new_instance, $old_instance) {		
		$instance = $old_instance;
		$instance['title'] = strip_tags($new_instance['title']);
        $instance['quote'] = strip_tags($new_instance['quote']);
        $instance['author'] = strip_tags($new_instance['author']);
        $instance['position'] = strip_tags($new_instance['position']);
        return $instance;
    }
 
    /** @see WP_Widget::form -- do not rename this */
    function form($instance) {	
 
        $title = esc_attr($instance['title']);
        ?>
         <p>
          <label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:'); ?></label> 
          <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" />
        </p>
        <?php 

        $quote = esc_attr($instance['quote']);
        ?>
         <p>
          <label for="<?php echo $this->get_field_id('quote'); ?>"><?php _e('Quote:'); ?></label> 
          <input class="widefat" id="<?php echo $this->get_field_id('quote'); ?>" name="<?php echo $this->get_field_name('quote'); ?>" type="text" value="<?php echo $quote; ?>" />
        </p>
        <?php 

        $author = esc_attr($instance['author']);
        ?>
         <p>
          <label for="<?php echo $this->get_field_id('author'); ?>"><?php _e('Author:'); ?></label> 
          <input class="widefat" id="<?php echo $this->get_field_id('author'); ?>" name="<?php echo $this->get_field_name('author'); ?>" type="text" value="<?php echo $author; ?>" />
        </p>
        <?php  

        $position = esc_attr($instance['position']);
        ?>
         <p>
          <label for="<?php echo $this->get_field_id('position'); ?>"><?php _e('Position:'); ?></label> 
          <input class="widefat" id="<?php echo $this->get_field_id('position'); ?>" name="<?php echo $this->get_field_name('position'); ?>" type="text" value="<?php echo $position; ?>" />
        </p>
        <?php                 
    }
} // end class Technician_Quote
add_action('widgets_init', create_function('', 'return register_widget("Technician_Quote");'));
?>