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
 *  Saves all data for posts that are added in backen
 *
 *  @param string $post_id - Post-ID
 *  @return
 */

if ( !function_exists('save_postdata') ) {

  function save_postdata( $post_id ) {
    global $general_details, $flag;
  
  	$options = $general_details; // array_merge($general_details);
  	
    if ($flag == 0) {
      
      
      /**
       *  Checks if array is in array
       *
       *  @param array $needle - array to check
       *  @param array $haystack - array to check against
       *  @param string $field - name of field to check for
       *
       *  @retrun bool
      */
      function check_array ($needle, $haystack, $field = 'name') {
        for ($countr = 0; $countr < count($haystack); $countr++) {

          // If found, return true
          if ($haystack[$countr][$field] == $needle) {
            return true;
          }
        }
  
        return false;
      }
      
      
      $i = 1;
      // Append asynchronously added things
      foreach ($_POST as $para => $meter) {
        if (!check_array($para, $options) && substr($para, -9) != 'noncename') {
          array_push ($options, array ('name' => $para));
          $i++;
        }
      }
      
      
      // Itterate through options for save
  		foreach( $options as $meta_box ) {
  		  if ( defined('DOING_AUTOSAVE') && DOING_AUTOSAVE )
          return $post_id;
  
        if ( 'page' == $_POST['post_type'] && !current_user_can( 'edit_page', $post_id ) ) {
  				return $post_id;
        } elseif ( !current_user_can( 'edit_post', $post_id )) {
          return $post_id;
  			}
        
        $data = '';
        if (gettype ($_POST[$meta_box['name']]) == 'string') {
          $data = trim($_POST[$meta_box['name']]);
        }
  
  
        // Update or delete post meta data
        if ($data == '') {
          delete_post_meta($post_id, $meta_box['name'], get_post_meta($post_id, $meta_box['name'], true));
  			} else {
          update_post_meta($post_id, $meta_box['name'], $data);
        }
  
  		}
  
  
  	} // With flag == 0
  
    $flag = 1;
  }

}


// Add post-saving if user's an admin
if ( is_admin() ) {
  add_action('save_post', 'save_postdata');
}








