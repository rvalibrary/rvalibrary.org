

<?php
/*

Template Name: Redirect Template

*/

  $location = 'Location: ';
  $location .= get_field('redirect_href');

  header($location, true, 301);
  exit();
?>
