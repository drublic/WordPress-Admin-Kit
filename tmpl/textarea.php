<?php
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
