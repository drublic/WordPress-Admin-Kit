<?php
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