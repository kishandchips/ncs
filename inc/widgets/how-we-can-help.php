<?php
/**
 * How We Can Help Widget Class
 */
class HowWeCanHelp_Widget extends WP_Widget {
 
 
    /** constructor -- name this the same as the class above */
    function HowWeCanHelp_Widget() {
        parent::WP_Widget(false, $name = 'How We Can Help Widget');	
    }
 
    /** @see WP_Widget::widget -- do not rename this */
    function widget($args, $instance) {	
        extract( $args );
        $title 		= apply_filters('widget_title', $instance['title']);
        ?>
              <?php echo $before_widget; ?>
                  <?php if ( $title )
                        echo $before_title . $title . $after_title; ?>
                    <div class="support-box">
                      <p><?php _e('How can we help your business? Please feel free to contact us at:') ?></p>
                      <div class="phone"><span><?php the_field('phone_number', 'option'); ?></span></div>
                      <a href="<?php bloginfo('url'); ?>/get-in-touch" class="call-me-back">
                        <?php _e('Call Me Back') ?>
                      </a>
                      <div class="bubble">
                        <?php _e('Just fill in your details and we\'ll call you back at a convenient time.') ?>
                      </div>          
                      
                    </div>
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
 
 
} // end class HowWeCanHelp_Widget
add_action('widgets_init', create_function('', 'return register_widget("HowWeCanHelp_Widget");'));
?>