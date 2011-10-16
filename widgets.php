<?php
/**
 * Register widgetized areas, including two sidebars and four widget-ready columns in the footer.
 *
 * To override wpak_widgets_init() in a child theme, remove the action hook and add your own
 * function tied to the init hook.
 *
 * @since WordPress Admin-Kit 1.0
 * @uses register_sidebar
 */
function wpak_widgets_init() {


	// Sidebar. Empty by default.
	register_sidebar( array(
		'name' => __( 'Sidebar Widget Area', $theme_code ),
		'id' => 'sidebar-widget-area',
		'description' => __( 'The sidebar widget area', $theme_code ),
		'before_widget' => '<div class="%2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h3>',
		'after_title' => '</h3>',
	) );


	// Area 3, located in the footer. Empty by default.
	register_sidebar( array(
		'name' => __( 'First Footer Widget Area', $theme_code ),
		'id' => 'first-footer-widget-area',
		'description' => __( 'The first footer widget area', $theme_code ),
		'before_widget' => '<div class="%2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h3>',
		'after_title' => '</h3>',
	) );
	
	

	// Area 4, located in the footer. Empty by default.
	register_sidebar( array(
		'name' => __( 'Second Footer Widget Area', $theme_code ),
		'id' => 'second-footer-widget-area',
		'description' => __( 'The second footer widget area', $theme_code ),
		'before_widget' => '<div class="%2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h3>',
		'after_title' => '</h3>',
	) );
	
	
}

/** Register sidebars by running wpak_widgets_init() on the widgets_init hook. */
add_action( 'widgets_init', 'wpak_widgets_init' );







