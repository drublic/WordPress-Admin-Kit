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
 *  Generates Output for Textfields in back-end
 *
 *  @param string $name - name (id) of field
 *  @param string $title - title for label
 *  @param string $description - short description of field
 *  @param string $meta_box_value - current value of field
 *  @param string $size - size of input-field
 *  @return html
 */
function bo_text ($name, $title, $description, $meta_box_value, $size = '42' ) {
  $output = '<tr>';
  
  if (!empty($title)) {
    $output .= '<th scope="row" class="labelpadding">
         <label for="'.$name.'">'.$title.'</label>
       </th>';
    if ($size == '42') $size = '70';
  }
       
  $output .= '<td>
         <input type="text" name="'.$name.'" value="'.$meta_box_value.'" size="' . $size . '" class="medium-text" /><br />
         <span class="mbdesc">'.$description.'</span>
       </td>
     </tr>';

  return $output;
}



/**
 *  Generates Output for Textareas in back-end
 *
 *  @param string $name - name (id) of field
 *  @param string $title - title for label
 *  @param string $description - short description of field
 *  @param string $meta_box_value - current value of field
 *  @return html
 */
function bo_textarea ($name, $title, $description, $meta_box_value) {
  $output =
    '<tr>
       <th scope="row" class="labelpadding">
         <label for="'.$name.'">'.$title.'</label>
       </th>
       
       <td>
         <textarea name="'.$name.'" class="medium-text" style="width: 100%; height: 130px;">'.stripslashes($meta_box_value).'</textarea><br />
         <span class="mbdesc">'.$description.'</span>
       </td>
      </tr>';

  return $output;
}




/**
 *  Generates Output for Selects in back-end
 *
 *  @param string $name - name (id) of field
 *  @param string $title - title for label
 *  @param string $options - all possible options
 *  @param string $description - short description of field
 *  @param string $std - standard value of selectbox
 *  @param string $post_id - id of post
 *  @return html
 */
function bo_select ($name, $title, $options, $description, $std, $post_id = '') {
  $output =
    '<tr>
       <th scope="row">
         <label for="'.$name.'">'.$title.'</label>
       </th>
       
       <td>
         <select name="'.$name.'" />';

  foreach ($options as $opt_val => $option) {
		$output .= '<option value="' . $opt_val . '"';
		
		if (!empty($post_id)) {
		  if (get_post_meta ($post_id, $name.'', true) == $opt_val)  {
		    $output .= ' selected';
		  }
		} elseif ($std == $opt_val) {
		  $output .= ' selected';
		}

    $output .= '>'.$option.'</option>';
	}
	
	$output .= '</select><br>
	   <span class="mbdesc">'.$description.'</span>
	   </td></tr>';

  return $output;
}



/**
 *  Generates Output for a single checkbox in back-end
 *
 *  @param string $name - name (id) of field
 *  @param string $title - title for label
 *  @param string $description - short description of field
 *  @param string $post_id - id of post
 *  @return html
 */
function bo_checkbox ($name, $title, $desciption, $post_id) {
  $checked = '';
  if (get_post_meta($post_id, $name.'', true) != '') {
    $checked = ' checked="checked"';
  }
  
  $output = 
    '<tr>
       <th scope="row" colspan="2">
         <input type="checkbox" id="'.$name.'" name="'.$name.'"'.$checked.' class="checkbox" />
         <label for="'.$name.'">'.$title.'</label>
         <span class="mbdesc">'.$description.'</span>
       </th>
    </tr>';
  
  return $output;
}


/**
 *  Generates Output for a checkboxes that belong together in back-end
 *
 *  @param string $name - name (id) of field
 *  @param string $title - title for label
 *  @param string $options - all possible options
 *  @param string $description - short description of field
 *  @param string $post_id - id of post
 *  @return html
 */
function bo_checkboxes ($name, $title, $options, $desciption, $post_id) {
  $output = '<tr><th scope="row">' . $title . '</td><td>';

  foreach ( $options as $key => $val) {
    $checked = '';
    if (get_post_meta($post_id, $name.'-'.$key, true) != '') {
      $checked = ' checked="checked"';
    }
  
		$output .= '<div>
		  <input type="checkbox" id="'.$name.'-' . $key . '" name="'.$name.'-' . $key . '" '.$checked.' class="checkbox" value="' . $key . '">
      <label for="'.$name.'-' . $key .'">'.$val.'</label>
    </div>';
	}
  
  $output .= '<span class="mbdesc">'.$description.'</span></td></tr>';
  
  return $output;
}




/**
 *  Generates Output for an uploader in back-end
 *
 *  @param string $title - title for label
 *  @param string $description - short description of field
 *  @return html
 */
function bo_imageupload ($title, $description) {
  $output = '<tr>';
  
  if ($title != '') {
    $output .= '<th scope="row">
         <label>'.$title.'</label>
       </th>';
  }
  
  $output .= '<td>
         <a class="button thickbox" href="media-upload.php?&amp;type=image&amp;TB_iframe=true" id="add_image" title="Image Upload" onclick="jQuery(this).attr(\'href\',jQuery(this).attr(\'href\').replace(\'\?\',\'?post_id=\'+jQuery(\'#post_ID\').val())); return thickbox(this);">Dateien hochladen und URL auslesen</a><br />
         <span>'.$description.'</span>
       </td>
     </tr>';

  return $output;
}




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













