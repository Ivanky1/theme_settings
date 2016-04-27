<?php

/**
 * @file
 * Rate widget theme
 */
?>
<div><?php print t('Rate the material');?>:</div>
<?php
print theme('item_list', array('items' => $stars));

if ($info) {
  print '<div class="rate-info">' . $info . '</div>';
}

if ($display_options['description']) {
  print '<div class="rate-description">' . $display_options['description'] . '</div>';
}
