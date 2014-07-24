<?php

// Custom Widgets

require_once( get_template_directory() . '/inc/classes/BFI_Thumb.php' );

require( get_template_directory() . '/inc/widgets/technical-support.php' );

require( get_template_directory() . '/inc/widgets/how-we-can-help.php' );

require( get_template_directory() . '/inc/widgets/help.php' );

require( get_template_directory() . '/inc/widgets/auto_childrens.php' );

require( get_template_directory() . '/inc/widgets/wp_nav_menu_thumbnails.php' );

require( get_template_directory() . '/inc/widgets/menu_separator.php' );

require( get_template_directory() . '/inc/widgets/woocommerce_cats_with_thumbnail.php');

// Custom Actions

add_action( 'init', 'custom_init');

// Custom Filters

//Custom Shortcodes

require( get_template_directory() . '/inc/default/shortcodes.php');

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
	add_image_size( 'custom-navigation', 106, 67, true);
}
add_action( 'init', 'custom_setup_theme' );	

function custom_scripts() {
	
	wp_deregister_script('jquery');
	wp_enqueue_script('modernizr', get_template_directory_uri().'/js/libs/modernizr.min.js');

	if (!is_front_page()) {
		wp_enqueue_script('mobile_nav', get_template_directory_uri().'/js/nav.js', '', '', true);	
	}
	

	wp_enqueue_script('jquery',  get_template_directory_uri().'/js/libs/jquery.min.js');
	wp_enqueue_script('magnific', get_template_directory_uri().'/js/plugins/magnific_popup.min.js', array('jquery'), '', true);
	wp_enqueue_script('main', get_template_directory_uri().'/js/main.js', array('jquery'), '', true);
}
add_action('wp_enqueue_scripts', 'custom_scripts');

//Custom Sidebards

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

	register_sidebar( array(
		'name'          => __( 'Get in Touch Sidebar', 'ncs' ),
		'id'            => 'get-in-touch',
		'description'   => __( 'Sidebar that appears on the Get in Touch Page.', 'ncs' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title"><span>',
		'after_title'   => '</span></h1>',
	));	

	register_sidebar( array(
		'name'          => __( 'Articles Sidebar', 'ncs' ),
		'id'            => 'articles',
		'description'   => __( 'Sidebar that appears on the Article pages.', 'ncs' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title"><span>',
		'after_title'   => '</span></h1>',
	));	

	register_sidebar( array(
		'name'          => __( 'Testimonials Sidebar', 'ncs' ),
		'id'            => 'testimonials',
		'description'   => __( 'Sidebar that appears on the Testimonials pages.', 'ncs' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title"><span>',
		'after_title'   => '</span></h1>',
	));	

	register_sidebar( array(
		'name'          => __( 'Pages Sidebar', 'ncs' ),
		'id'            => 'pages',
		'description'   => __( 'Sidebar that appears on Pages.', 'ncs' ),
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


if ( ! function_exists( 'excerpt' )) {
function excerpt($num) {
	    $limit = $num+1;
	    $excerpt = explode(' ', get_the_excerpt(), $limit);
	    array_pop($excerpt);
	    $excerpt = implode(" ",$excerpt)."... (<a href='" .get_permalink($post->ID) ." '>Read more</a>)";
	    echo $excerpt;
	}
}

if(function_exists('acf_add_options_page')) acf_add_options_page();


//Top level Page Slug to Body Class
if ( ! function_exists( 'add_slug_body_class' )) {
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
}

if ( ! function_exists( 'single_cat_body_class' ))  {
	function single_cat_body_class( $classes ) {
		if (is_single()) {
			$category = get_the_category();
			$cat_name = $category[0]->slug;
			$classes[] = 'page-'. $cat_name;
		}
		return $classes;	
	}
	add_filter( 'body_class', 'single_cat_body_class' );
}

function wpb_first_and_last_menu_class($items) {
    $items[1]->classes[] = 'first';
    $items[count($items)]->classes[] = 'last';
    return $items;
}
add_filter('wp_nav_menu_objects', 'wpb_first_and_last_menu_class');

//Custom Post types
function custom_init(){
	
	require( get_template_directory() . '/inc/classes/custom-post-type.php' );
	$testimonial = new Custom_Post_Type( 'Testimonial', 
 		array(
 			'rewrite' => array( 'with_front' => false, 'slug' => 'testimonials' ),
 			'capability_type' => 'post',
 		 	'publicly_queryable' => true,
   			'has_archive' => true, 
    		'hierarchical' => false,
    		'exclude_from_search' => true,
    		'menu_position' => null,
    		'supports' => array('title', 'editor', 'page-attributes', 'thumbnail'),
    		'plural' => 'Testimonials'
   		)
   	);

	$testimonial->add_taxonomy("Testimonial Category",
		array(
			'hierarchical' => true,
			'rewrite' => array( 'with_front' => false, 'slug' => 'testimonial-category' )
		),
		array(
			'plural' => "Categories"
		)
	);   	

	$case_study = new Custom_Post_Type( 'Case Study', 
 		array(
 			'rewrite' => array( 'with_front' => false, 'slug' => 'case-study' ),
 			'capability_type' => 'post',
 		 	'publicly_queryable' => true,
   			'has_archive' => true, 
    		'hierarchical' => false,
    		'exclude_from_search' => true,
    		'menu_position' => null,
    		'supports' => array('title', 'editor', 'page-attributes', 'thumbnail'),
    		'plural' => 'Case Studies'
   		)
   	);

	$case_study->add_taxonomy("Case Study Category",
		array(
			'hierarchical' => true,
			'rewrite' => array( 'with_front' => false, 'slug' => 'case-study-category' )
		),
		array(
			'plural' => "Categories"
		)
	);  	

	$service = new Custom_Post_Type( 'Service', 
 		array(
 			'rewrite' => array( 'with_front' => false, 'slug' => 'services' ),
 			'capability_type' => 'page',
 		 	'publicly_queryable' => true,
   			'has_archive' => true, 
    		'hierarchical' => false,
    		'exclude_from_search' => true,
    		'menu_position' => null,
    		'supports' => array('title', 'editor', 'page-attributes', 'thumbnail'),
    		'plural' => 'Services'
   		)
   	);  

	$press = new Custom_Post_Type( 'Press', 
 		array(
 			'rewrite' => array( 'with_front' => false, 'slug' => 'press' ),
 			'capability_type' => 'post',
 		 	'publicly_queryable' => true,
   			'has_archive' => true, 
    		'hierarchical' => false,
    		'exclude_from_search' => true,
    		'menu_position' => null,
    		'supports' => array('title', 'editor', 'page-attributes', 'thumbnail'),
    		'plural' => 'Press'
   		)
   	);     		
}


add_action("gform_field_standard_settings", "custom_gform_standard_settings", 10, 2);
function custom_gform_standard_settings($position, $form_id){
    if($position == 25){
    	?>
        <li style="display: list-item; ">
            <label for="field_placeholder">Placeholder Text</label>
            <input type="text" id="field_placeholder" size="35" onkeyup="SetFieldProperty('placeholder', this.value);">
        </li>
        <?php
    }
}
// disable gforms tabindex
add_filter("gform_tabindex", "gform_tabindexer");
function gform_tabindexer() {
    $starting_index = 1000; // if you need a higher tabindex, update this number
    return GFCommon::$tab_index >= $starting_index ? GFCommon::$tab_index : $starting_index;
}

add_action('gform_enqueue_scripts',"custom_gform_enqueue_scripts", 10, 2);
function custom_gform_enqueue_scripts($form, $is_ajax=false){
    ?>
<script>
    jQuery(function(){
        <?php
        foreach($form['fields'] as $i=>$field){
            if(isset($field['placeholder']) && !empty($field['placeholder'])){
                ?>
                jQuery('#input_<?php echo $form['id']?>_<?php echo $field['id']?>').attr('placeholder','<?php echo $field['placeholder']?>');
                <?php
            }
        }
        ?>
    });
    </script>
    <?php
}

