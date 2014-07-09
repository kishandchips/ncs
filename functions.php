<?php

require( get_template_directory() . '/inc/widgets/support.php' );

require( get_template_directory() . '/inc/widgets/auto_childrens.php' );

// Custom Actions

// Custom Filters

//Custom Shortcodes

function custom_setup_theme() {

	register_nav_menus( array(
		'primary_header' => __( 'Primary Header Nav', 'ncs' ),
		'secondary_header' => __('Secondary Header Nav', 'ncs'),
		'footer-nav' => __('Footer Nav', 'ncs'),
		'footer-credits' => __('Footer Credits Nav', 'ncs'),
	));	

	add_theme_support( 'post-thumbnails' ); 

	add_post_type_support('page', 'excerpt');
	
	add_editor_style('/css/editor-styles.css');

	add_image_size( 'frontpage', 283, 210, true);
	add_image_size( 'small-thumbnail', 100, 100, true);
	add_image_size( 'custom-medium', 330, 330, true);
}
add_action( 'init', 'custom_setup_theme' );	

function custom_scripts() {
	
	wp_deregister_script('jquery');
	wp_enqueue_script('modernizr', get_template_directory_uri().'/js/libs/modernizr.min.js');
	wp_enqueue_script('jquery',  get_template_directory_uri().'/js/libs/jquery.min.js');
	wp_enqueue_script('main', get_template_directory_uri().'/js/main.js', array('jquery'), '', true);
}
add_action('wp_enqueue_scripts', 'custom_scripts');

function custom_widgets_init() {

	register_sidebar( array(
		'name'          => __( 'News Sidebar', 'ncs' ),
		'id'            => 'news-sidebar',
		'description'   => __( 'Sidebar that appears on the left of the News pages.', 'ncs' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title"><span>',
		'after_title'   => '</span></h1>',
	));

	register_sidebar( array(
		'name'          => __( 'Education Sidebar', 'ncs' ),
		'id'            => 'education-sidebar',
		'description'   => __( 'Sidebar that appears on the left of the Education pages.', 'ncs' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title"><span>',
		'after_title'   => '</span></h1>',
	));	

	register_sidebar( array(
		'name'          => __( 'Commercial Sidebar', 'ncs' ),
		'id'            => 'commercial-sidebar',
		'description'   => __( 'Sidebar that appears on the left of the Commercial pages.', 'ncs' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title"><span>',
		'after_title'   => '</span></h1>',
	));	

	register_sidebar( array(
		'name'          => __( 'Products Sidebar', 'ncs' ),
		'id'            => 'product-sidebar',
		'description'   => __( 'Sidebar that appears on the left of the Product pages.', 'ncs' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title"><span>',
		'after_title'   => '</span></h1>',
	));		

	register_sidebar( array(
		'name'          => __( 'Footer Column 1', 'ncs' ),
		'id'            => 'footer-first',
		'description'   => __( 'Sidebar that appears on the first column of the footer.', 'ncs' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title"><span>',
		'after_title'   => '</span></h1>',
	));	

	register_sidebar( array(
		'name'          => __( 'Footer Column 2', 'ncs' ),
		'id'            => 'footer-second',
		'description'   => __( 'Sidebar that appears on the second column of the footer.', 'ncs' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title"><span>',
		'after_title'   => '</span></h1>',
	));	

	register_sidebar( array(
		'name'          => __( 'Footer Column 3', 'ncs' ),
		'id'            => 'footer-third',
		'description'   => __( 'Sidebar that appears on the third column of the footer.', 'ncs' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title"><span>',
		'after_title'   => '</span></h1>',
	));					

}
add_action( 'widgets_init', 'custom_widgets_init' );

function custom_styles() {
	global $wp_styles;

	wp_enqueue_style( 'style', get_template_directory_uri() . '/css/style.css' );
	wp_enqueue_style( 'ie7', get_template_directory_uri() . '/css/ie7.css' );

	$wp_styles->add_data('ie7', 'conditional', 'lt IE 8');
}

add_action('wp_enqueue_scripts', 'custom_styles');


function excerpt($num) {
    $limit = $num+1;
    $excerpt = explode(' ', get_the_excerpt(), $limit);
    array_pop($excerpt);
    $excerpt = implode(" ",$excerpt)."... (<a href='" .get_permalink($post->ID) ." '>Read more</a>)";
    echo $excerpt;
}

if(function_exists('acf_add_options_page')) acf_add_options_page();

//Top level Page Slug to Body Class
function add_slug_body_class( $classes ) {
	global $post;
	if ( isset( $post ) ) {
		$parent = array_reverse(get_post_ancestors($post->ID));
		$first_parent = get_page($parent[0]);
		$classes[] = $post->post_type . '-' . $first_parent->post_name;
	}
	return $classes;
}
add_filter( 'body_class', 'add_slug_body_class' );