<?php

// Tell WordPress to run wpak_setup() when the 'after_setup_theme' hook is called
add_action( 'after_setup_theme', 'wpak_setup' );

if ( ! function_exists( 'wpak_setup' ) ):
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * @since WordPress Admin-Kit 1.0
 */
function wpak_setup() {

	// This theme styles the visual editor with editor-style.css to match the theme style.
	add_editor_style('css/editor-style.css');

	// This theme uses post thumbnails
	add_theme_support( 'post-thumbnails' );
  set_post_thumbnail_size( 140, 140 );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => __( 'Primary Navigation', $theme_code ),
	) );

}
endif;







/**
 * Get our wp_nav_menu() fallback, wp_page_menu(), to show a home link.
 *
 * To override this in a child theme, remove the filter and optionally add
 * your own function tied to the wp_page_menu_args filter hook.
 *
 * @since WordPress Admin-Kit 1.0
 */
function wpak_page_menu_args( $args ) {
	$args['show_home'] = true;
	return $args;
}
add_filter( 'wp_page_menu_args', 'wpak_page_menu_args' );









add_action( 'init', 'wpak_init' );
function wpak_init() {
	
	// create a new taxonomy for 'Bücher'
	register_taxonomy(
		'books_category',
		'books',
		array(
		  'hierarchical' => true,
      'labels' => array(
        'name' => _x( 'Kategorie', 'taxonomy general name' ),
        'singular_name' => _x( 'Kategorie', 'taxonomy singular name' ),
        'search_items' =>  __( 'Kategorie durchsuchen' ),
        'all_items' => __( 'Alle Kategorien' ),
        'parent_item' => __( '&Uuml;bergeordnete Kategorie' ),
        'parent_item_colon' => __( '&Uuml;bergeordnete Kategorie:' ),
        'edit_item' => __( 'Kategorie bearbeiten' ), 
        'update_item' => __( 'Kategorie aktualisieren' ),
        'add_new_item' => __( 'Neue Kategorie hinzuf&uuml;gen' ),
        'new_item_name' => __( 'Neuer Kategorie-Name' ),
        'menu_name' => __( 'Kategorien' )
      ),
		  'sort' => true,
			'args' => array('orderby' => 'term_order'),
			'rewrite' => array('slug' => 'kategorie')
		)
	);
	
	
  // Register some Scripts
  if (!is_admin()) {
    
    wp_deregister_script('jquery');
    wp_register_script('jquery', 'http://ajax.googleapis.com/ajax/libs/jquery/1.6.4/jquery.min.js', false, '1', true);
    wp_enqueue_script('jquery');
    
    wp_deregister_script('comment-reply');
    wp_deregister_script('l10n');
  }
  

}




/**
 * Removes the versioning vor Scripts that are loaded from the Google-Servers
 * in Order to allow the user to use the cached file
 *
 *
 *
 */
function script_loader_filter ($src) {
  if (FALSE === strpos ($src, '//ajax.googleapis.com/')) {
    return $src;
  }
  $new_src = explode('?', $src);
  return $new_src[0];
  
}
add_filter('script_loader_src', 'script_loader_filter');





/**
 * Removes the default styles that are packaged with the Recent Comments widget.
 *
 * @since WordPress Admin-Kit 1.0
 */
function remove_recent_comments_style() {
	global $wp_widget_factory;
	remove_action( 'wp_head', array( $wp_widget_factory->widgets['WP_Widget_Recent_Comments'], 'recent_comments_style' ) );
}
add_action( 'widgets_init', 'remove_recent_comments_style' );


/**
 * Removes the default styles of a gallery
 *
 * @since WordPress Admin-Kit 1.0
 */
function remove_gallery_style( $a ) {
  return preg_replace("%<style type=\'text/css\'>(.*?)</style>%s", "", $a);
}
add_filter('gallery_style', 'remove_gallery_style');





/**
 *  Registers a new 'read more'-link for excerpts.
 */
function new_excerpt_more($more) {
       global $post;
	return '<p><a title="Link zu '.$post->post_title.'" class="more-link" href="'. get_permalink($post->ID) . '">' . 'Lesen Sie mehr' . '</a></p>';
}
add_filter('excerpt_more', 'new_excerpt_more');




// Shortcode [talks year="value"]
function talks_func( $atts ) {
  global $post_query_talk;
  $post_query_talk = 'post_type=talk&talk_category=' . $atts['year'];
  
}
add_shortcode( 'talks', 'talks_func' );





add_filter( 'show_admin_bar', '__return_false' );

remove_action('wp_head', 'rsd_link');
remove_action('wp_head', 'wlwmanifest_link');
remove_action('wp_head', 'start_post_rel_link');
remove_action('wp_head', 'adjacent_posts_rel_link_wp_head');














