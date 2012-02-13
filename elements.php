<?php
/**
 *  Functions for WordPress admin-panel
 *
 *  Created 2011 by /gebruederheitz - Freiburg/Germany
 *  kontakt@gebruederheitz.de - @gebruederheitz
 *
 *  Developed by
 *  Hans Christian Reinl
 *  h@ghdev.de - @drublic 
 */





/**
 *  Generates Output for a title in back-end
 *
 *  @param string $title - title for row
 *  @return html
 */
function bo_title ($title) {
  $output =
    '<tr>
       <th scope="row" colspan="2">
         <h2>'.$title.'</h2>
       </th>
     </tr>';

  return $output;
}


/**
 *  Generates Output for a small title in back-end
 *
 *  @param string $title - title for row
 *  @return html
 */
function bo_smalltitle ($title) {
  $output =
    '<tr>
       <th scope="row" colspan="2">
         <strong>'.$title.'</strong>
       </th>
     </tr>';

  return $output;
}





/**
 *  Generates Output for a big title in back-end
 *
 *  @param string $title - title for row
 *  @return html
 */
function bo_headline ($title) {
  $output = '<div class="wrap"><h2>'.$title.'</h2></div>';

  return $output;
}




/**
 *  Generates Output for form headers in back-end
 *
 *  @param string $title - title for form
 *  @param string $slug - short id for form
 *  @param string $saved - print message or not
 *  @return html
 */
function bo_form_header ($title, $slug, $saved) {
  global $theme_code;
  
  print bo_headline ($title);
  print '<form method="post" id="' . $slug . '">';
  
  if ( $saved ) {
    print '<div id="message"><p><strong>'.__('Settings saved!', $theme_code).'</strong></p></div>';
  }
}



/**
 *  Generates Output for form footer in back-end
 *
 *  @return html
 */
function bo_form_footer () {
  bo_box_buttons ();
  print '</form>';
}




/**
 *  Generates Output for form buttons in back-end
 *
 *  @return html
 */
function bo_box_buttons () {
  global $theme_code;
?>
  <p class="submit">
    <input onclick="return setAnchor();" name="save" type="submit" value="<?php _e('Save Changes', $theme_code); ?>" class="button-primary" />    
    <input type="hidden" name="action" value="save" />
  </p>
<?
}



/**
 *  Prints Output for forms in back-end
 *
 *  @param string $type - Type posts or theme
 *  @param string $page
 *  @param string $details - Fields to display
 *  @return html
 */
function new_options ($type, $page, $details) {
  
  // Do some init stuff
  if ($type == 'posts') {
    global $post;
    print '<table class="form-table metabox"><tbody>';
  }


  foreach( $details as $option ) {
    
    // Standard value for field
    $option_value = '';
    
    // Get post-meta for posts
    if ($type == 'posts') {
      $option_value = ( get_post_meta($post->ID, $option['name'].'', true) != '') ? get_post_meta($post->ID, $option['name'].'', true) : $option['std'];
    // And options for theme
    } elseif ($type == 'theme') {
		  $option_value = ( get_option( $option['name'] ) != '') ? get_option( $option['name'] ) : $option['std'];
		}
		
		
		
		// Print what is needed depending on option-type
		switch ( $option['type'] ) {
		  
		  // Open Tab - Only for Theme-Options
			case 'open':
			  print '<div class="inner ' . $option['class'] . '" id="' . $option['name'] . '">';
			  print '<table class="form-table metabox"><tbody>';
			  break;

			// Close Tab - Only for Theme-Options
			case 'close':
			  print '</tbody></table>';
			  print '</div>';
			  break;
      
      // Text-Fields
      case 'text':
			  print bo_text ($option['name'], $option['title'], $option['description'], $option_value);
			  break;
      
      // Date-Fields
			case 'date':
			  if ( 1 === preg_match( '~^[1-9][0-9]*$~', $option_value ) ) :
			    $option_value = date('d.m.Y', $option_value);
			  endif;
			  
			  print bo_text ($option['name'], $option['title'], $option['description'], $option_value, '20');
			  break;
			
			// Textareas
			case 'textarea':
				print bo_textarea ($option['name'], $option['title'], $option['description'], $option_value);
        break;
      
      // Dropdowns
			case 'select':
				print bo_select ($option['name'], $options['title'], $option['options'], $option['description'], $option_value, $post->ID);
				break;
			
			// Single Checkbox
			case 'checkbox':
				print bo_checkbox ($option['name'], $option['title'], $option['description'], $post->ID);
				break;		
			
			// Multiple Checkboxes
			case 'checkboxes':
				print bo_checkboxes ($option['name'], $option['title'], $option['options'], $option['description'], $post->ID);
				break;	
			
			// Uploader
			case 'imageupload':
			  print bo_imageupload ($option['title'], $option['description']);
			  break;

      // Show uploaded image as link
		  case 'image_text':
			  print bo_image_text ($option, $option_value);
			  break;
			
			// Three dirfferent Headlines
			case 'headline':
			  print bo_headline ($option['title']);
			  break;
			case 'title':
			  print bo_title ($option['title']);
			  break;
			case 'smalltitle':
			  print bo_smalltitle ($option['title']);
			  break;


/*   Dramatically needed!
  			case 'radio':
			  print bo_radio ($option['title']);
			  break;
	*/
			
		} // endswitch
	} // endforeach
	
	if ($type == 'posts' && ! $page ) {
    print '</tbody></table>';
  }
    
}



// If user is admin, initiate some scripts and styles
if ( is_admin() ) {
  wp_enqueue_style( 'thickbox' );
  wp_enqueue_style( 'backendstyles', get_bloginfo ('template_directory') . '/functions/css/style.css' );
  wp_enqueue_script( 'backendscript', get_bloginfo ('template_directory') . '/functions/js/script.js' );
  wp_enqueue_script( 'thickbox' );
}













