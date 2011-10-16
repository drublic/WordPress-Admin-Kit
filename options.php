<?php

/**
 * Backend - Options for Theme
 * Displayed in Appereance -> Theme Einstellungen
 */
$theme_options = array ();
if ( is_admin() ) {
  array_push ( $theme_options,
    
    // General options
		array(
		  'type'        => 'open',
		  'name'        => 'options',
		  'class'       => 'first'),
    
    // Title for Breadcrumb
		array(
		  'name'        => 'gen-opt_breadcrumb-title',
			'std'         => 'Sie sind hier:',
			'type'        => 'text',
			'title'       => __('Text, der vor der Breadcrumb angezeigt wird:', $theme_code),
			'description' => ''),
    
    // Seperator for Breadcrumb
		array(
		  'name'        => 'gen-opt_breadcrumb-seperator',
			'std'         => '/',
			'type'        => 'text',
			'title'       => __('Trenner zwischen Breadcrumb-Links:', $theme_code),
			'description' => ''),
    
    // Text for "Homepage" in Breadcrumb
		array(
		  'name'        => 'gen-opt_breadcrumb-start',
			'std'         => 'Start',
			'type'        => 'text',
			'title'       => __('Breadcrumb - Titel des Links zur Startseite:', $theme_code),
			'description' => ''),

    // E-Mail-Address for Support, Contact and/or Order
		array(
		  'name'        => 'gen-opt_support-mail',
			'std'         => 'info@domain.de',
			'type'        => 'text',
			'title'       => __('E-Mail-Adresse f&uuml;r Support:', $theme_code),
			'description' => ''),

		array('type'    => 'close')
		
  );
}


/**
 *  Renders output for tabs in back-end
 *
 *  @return string
 */
function options_tabs () {
?>
  <ul class="tabs big-tabs">
    <li class="current"><a href="#options"><?php _e('Optionen', $theme_code); ?></a></li>
	</ul>
<?
}




/**
 *  Renders output for Admin-Page 'Options'
 *
 *  @return string
*/
function haufe_admin_options () {
  global $theme_options;
  
  $saved = ( $_REQUEST['saved'] ) ? true : false;
  
  bo_form_header ('Generelle Einstellungen', 'haufe_admin_options', $saved);
  
  options_tabs ();
  
  // Output of tabs-content
  print '<div id="tabs">';
  new_options( 'theme', false, $theme_options);
  print '</div>';
  
  bo_form_footer ();
}





// Add Admin-Options if we are admin
if (is_admin ())
  add_action('admin_menu', 'haufe_add_admin_options');


/**
 * Handels save, update and delete for options
 *
 * @retun
*/
function haufe_add_admin_options () {	
	global $theme, $theme_code, $theme_options;
	
	$page = 'options';
	
	if ( $_GET['page'] ==  $page) {
	
		if ('save' == $_REQUEST['action'] ) {
		  
		  // Itterate through options and deal with them
			foreach ($theme_options as $value) {
				
				if ( isset($_REQUEST[$value['name']]) ) {
				
				  $val = $_REQUEST[ $value['name'] ];
					if ($value['type'] == 'textarea') {
            $val = stripslashes( $val );
          }

					update_option( $value['name'], $val );
				} else {
				  delete_option( $value['name'] );
				}
        
        $val = '';
			}
			
			// If there is another anchor set in the request
			$anchor = '';
			if ($_REQUEST['anchor'] !== '') {
			  $anchor = $_REQUEST['anchor'];
			}

      // Go to location and quit script
			header ('Location: admin.php?page=themes.php&page=' . $page . '&saved=true'.$anchor);
			wp_die();
		}
	}
	
	// Add options-page in back-end menu
	if ( function_exists('add_submenu_page') ) {
    add_submenu_page('themes.php', __('Theme Einstellungen'), __('Theme Einstellungen'), 'manage_options', $page, 'haufe_admin_options');
  }

}










