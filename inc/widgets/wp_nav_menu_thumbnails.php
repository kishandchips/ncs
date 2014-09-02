<?php

 /**
 * Navigation Menu widget with THumbnails  class
 *
 * @since 3.0.0
 */


class Thumbnail_Walker extends Walker_Nav_Menu {

	function start_el(&$output, $item, $depth, $args) {
		$classes     = empty ( $item->classes ) ? array () : (array) $item->classes;

		$class_names = join(
		    ' '
		,   apply_filters(
		        'nav_menu_css_class'
		    ,   array_filter( $classes ), $item
		    )
		);

		! empty ( $class_names )
		    and $class_names = ' class="'. esc_attr( $class_names ) . '"';

		$output .= "<li id='menu-item-$item->ID' $class_names>";

		$attributes  = '';

		! empty( $item->attr_title )
		    and $attributes .= ' title="'  . esc_attr( $item->attr_title ) .'"';
		! empty( $item->target )
		    and $attributes .= ' target="' . esc_attr( $item->target     ) .'"';
		! empty( $item->xfn )
		    and $attributes .= ' rel="'    . esc_attr( $item->xfn        ) .'"';
		! empty( $item->url )
		    and $attributes .= ' href="'   . esc_attr( $item->url        ) .'"';

		// insert thumbnail
		// you may change this
		  $thumbnail = '';
		    if ( has_post_thumbnail( $item->object_id ) ) {
		  $thumbnail = get_the_post_thumbnail( $item->object_id, 'custom-navigation' );
		  }
		  



		$title = apply_filters( 'the_title', $item->title, $item->ID );

		$item_output = $args->before
		    . "<a $attributes>"
		    . $args->link_before
		    . "<span>"
		    . $title
		    . "</span>"
		    . $thumbnail
		    . '</a> '
		    . $args->link_after
		    . $args->after;

		// Since $output is called by reference we don't need to return anything.
		$output .= apply_filters(
		    'walker_nav_menu_start_el'
		,   $item_output
		,   $item
		,   $depth
		,   $args
		);
	}
}

 class WP_Nav_Menu_Thumbnails_Widget extends WP_Nav_Menu_Widget {

    function WP_Nav_Menu_Thumbnails_Widget() {
        parent::WP_Widget(false, $name = 'Custom Menu with Thumbnails');	
    }

	public function widget($args, $instance) {
		// Get menu
		$nav_menu = ! empty( $instance['nav_menu'] ) ? wp_get_nav_menu_object( $instance['nav_menu'] ) : false;

		if ( !$nav_menu )
			return;

		/** This filter is documented in wp-includes/default-widgets.php */
		$instance['title'] = apply_filters( 'widget_title', empty( $instance['title'] ) ? '' : $instance['title'], $instance, $this->id_base );

		echo $args['before_widget'];

		if ( !empty($instance['title']) )
			echo $args['before_title'] . $instance['title'] . $args['after_title'];

		wp_nav_menu( array( 'fallback_cb' => '', 'menu' => $nav_menu, 'walker' => new Thumbnail_Walker, 'menu_class' => 'menu_thumb' ) );

		echo $args['after_widget'];
	}
}

add_action('widgets_init', create_function('', 'return register_widget("WP_Nav_Menu_Thumbnails_Widget");'));
?>