<?php
/**
 * Register widgetized areas, including two sidebars and four widget-ready columns in the footer.
 *
 * To override haufeapps_widgets_init() in a child theme, remove the action hook and add your own
 * function tied to the init hook.
 *
 * @since Twenty Ten 1.0
 * @uses register_sidebar
 */
function haufeapps_widgets_init() {	

	// Located on Homepage. Empty by default.
	register_sidebar( array(
		'name' => __( 'Widget Area on Homepage', $theme_code ),
		'id' => 'home-widget-area',
		'description' => __( 'Widget Area on Homepage', $theme_code ),
		'before_widget' => '<div class="%2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h3>',
		'after_title' => '</h3>',
	) );


  // Sidebar. Empty by default.
	register_sidebar( array(
		'name' => __( 'Sidebar für Start-Seite', $theme_code ),
		'id' => 'sidebar-home-widget-area',
		'description' => __( 'Sidebar für Start-Seite', $theme_code ),
		'before_widget' => '<div class="%2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h3>',
		'after_title' => '</h3>',
	) );



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


	// Sidebar. Empty by default.
	register_sidebar( array(
		'name' => __( 'Sidebar für Kongress Widget Area', $theme_code ),
		'id' => 'sidebar-congress-widget-area',
		'description' => __( 'Sidebar für Congress Widget Area', $theme_code ),
		'before_widget' => '<div class="%2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h3>',
		'after_title' => '</h3>',
	) );

  // Sidebar. Empty by default.
	register_sidebar( array(
		'name' => __( 'Sidebar für Bücher Seite', $theme_code ),
		'id' => 'sidebar-books-widget-area',
		'description' => __( 'Sidebar für Bücher Seite', $theme_code ),
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
	
	

	// Area 5, located in the footer. Empty by default.
	register_sidebar( array(
		'name' => __( 'Third Footer Widget Area', $theme_code ),
		'id' => 'third-footer-widget-area',
		'description' => __( 'The third footer widget area', $theme_code ),
		'before_widget' => '<div class="%2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h3>',
		'after_title' => '</h3>',
	) );



	// Area 6, located in the footer. Empty by default.
	register_sidebar( array(
		'name' => __( 'Fourth Footer Widget Area', $theme_code ),
		'id' => 'fourth-footer-widget-area',
		'description' => __( 'The fourth footer widget area', $theme_code ),
		'before_widget' => '<div class="%2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h3>',
		'after_title' => '</h3>',
	) );


	// Area 7, located in the footer. Empty by default.
	register_sidebar( array(
		'name' => __( 'Fifth Footer Widget Area', $theme_code ),
		'id' => 'fifth-footer-widget-area',
		'description' => __( 'The fifth footer widget area', $theme_code ),
		'before_widget' => '<div class="%2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h3>',
		'after_title' => '</h3>',
	) );
}

/** Register sidebars by running haufeapps_widgets_init() on the widgets_init hook. */
add_action( 'widgets_init', 'haufeapps_widgets_init' );







