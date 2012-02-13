<?php
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
