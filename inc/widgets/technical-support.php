<?php
/**
 * Technical Support Widget Class
 */
class Support_Widget extends WP_Widget {
 
 
    /** constructor -- name this the same as the class above */
    function Support_Widget() {
        parent::WP_Widget(false, $name = 'Technical Support Widget');	
    }
 
    /** @see WP_Widget::widget -- do not rename this */
    function widget($args, $instance) {	
        extract( $args );
        $title 		= apply_filters('widget_title', $instance['title']);
        ?>
              <?php echo $before_widget; ?>
                  <?php if ( $title )
                        echo $before_title . $title . $after_title; ?>
							<div class="support">
							<p><?php _e('For Friendly Technical support or Product Advice, please call:') ?></p>
							<p><span><?php the_field('phone_number', 'option'); ?></span></p>
							<a href="<?php echo get_permalink( 318 ); ?>" class="call-me-back">
								<?php _e('Call Me Back') ?>
							</a>								
							</div>
							<a href="#" class="live-chat ClickdeskChatLink" image="false">
								<?php _e('Live Chat') ?>
							</a>
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
 
 
} // end class Support_Widget
add_action('widgets_init', create_function('', 'return register_widget("Support_Widget");'));
?>