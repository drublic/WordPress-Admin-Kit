<?php
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
