<?php
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
