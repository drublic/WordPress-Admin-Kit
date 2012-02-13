<?php
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
