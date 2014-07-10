<?php
/**
 * Megamenu Separator Widget Class
 */
class MegaMenuSeparator extends WP_Widget {
 
 
    /** constructor -- name this the same as the class above */
    function MegaMenuSeparator() {
        parent::WP_Widget(false, $name = 'Dropdown Menu Separator');	
    }
 
    /** @see WP_Widget::widget -- do not rename this */
    function widget($args, $instance) {	
        extract( $args );
        $title 		= apply_filters('widget_title', $instance['title']);
        $link 	= $instance['link'];
        $buttontext = $instance['buttontext'];
        ?>
              <?php echo $before_widget; ?>
                  <div class="separator">
                    <span><?php echo $title; ?></span>
                    <a class="button" href="<?php echo $link; ?>">
                    <?php echo $buttontext; ?>
                    </a>
                  </div>
              <?php echo $after_widget; ?>
        <?php
    }
 
    /** @see WP_Widget::update -- do not rename this */
    function update($new_instance, $old_instance) {		
		$instance = $old_instance;
		$instance['title'] = strip_tags($new_instance['title']);
		$instance['link'] = strip_tags($new_instance['link']);
    $instance['buttontext'] = strip_tags($new_instance['buttontext']);
        return $instance;
    }
 
    /** @see WP_Widget::form -- do not rename this */
    function form($instance) {	
 
        $title 		= esc_attr($instance['title']);
        $link	= esc_attr($instance['link']);
        $buttontext = esc_attr($instance['buttontext']);

        ?>
         <p>
          <label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:'); ?></label> 
          <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" />
        </p>
		    <p>
          <label for="<?php echo $this->get_field_id('link'); ?>"><?php _e('Button Link:'); ?></label> 
          <input class="widefat" id="<?php echo $this->get_field_id('link'); ?>" name="<?php echo $this->get_field_name('link'); ?>" type="text" value="<?php echo $link; ?>" />
        </p>
        <p>
          <label for="<?php echo $this->get_field_id('buttontext'); ?>"><?php _e('Button Text:'); ?></label> 
          <input class="widefat" id="<?php echo $this->get_field_id('buttontext'); ?>" name="<?php echo $this->get_field_name('buttontext'); ?>" type="text" value="<?php echo $link; ?>" />
        </p>        
        <?php 
    }
 
 
} // end class MegaMenuSeparator
add_action('widgets_init', create_function('', 'return register_widget("MegaMenuSeparator");'));
?>