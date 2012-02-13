<?php

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
