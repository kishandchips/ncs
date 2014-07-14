<?php
/**
 * Example Widget Class
 */
class Help_Box_Widget extends WP_Widget {
 
 
    /** constructor -- name this the same as the class above */
    function Help_Box_Widget() {
        parent::WP_Widget(false, $name = 'Help Box Widget');	
    }
 
    /** @see WP_Widget::widget -- do not rename this */
    function widget($args, $instance) {	
        extract( $args );
        $title 		= apply_filters('widget_title', $instance['title']);
        ?>
              <?php echo $before_widget; ?>
                  <?php if ( $title )
                        echo $before_title . $title . $after_title; ?>
							<div class="help-box">
                                <div class="span six">
                                    <img class="profile" src="<?php bloginfo( 'template_url' ); ?>/images/misc/help_profile.jpg" alt="">
                    				<p class="title"><?php _e('Need help finding the right product?') ?></p>
                                    <p><?php _e('Our expert team can advise you on the latest advancements in technology and recommend affordable products that will best suit your needs. Contact us to find out more.
                                ') ?></p>
                                </div>
                                <div class="span four">
        							<div class="phone"><span><?php the_field('phone_number', 'option'); ?></span></div>
        							<a href="#" class="call-me-back">
        								<?php _e('Call Me Back') ?>
        							</a>								
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
} // end class Help_Box_Widget
add_action('widgets_init', create_function('', 'return register_widget("Help_Box_Widget");'));
?>