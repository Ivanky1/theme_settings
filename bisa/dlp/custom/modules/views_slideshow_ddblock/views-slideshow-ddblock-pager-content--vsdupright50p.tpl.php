<?php
// $Id$ 

/*!
 * Dynamic display block module template: vsdupright50p - pager template
 * (c) Copyright Phelsa Information Technology, 2011. All rights reserved.
 * Version 1.1 (05-JUL-2011)
 * Licenced under GPL license 
 * http://www.gnu.org/licenses/gpl.html 
 */

/**
 * @file
 * Dynamic display block module template: vsdupright50p - pager template
 * - Custom pager with images and text
 *
 * Available variables:
 * - $settings['delta']: Block number of the block.
 * - $settings['pager']: Type of pager to add
 * - $settings['pager2']: Add prev/next pager
 * - $settings['pager_position']: position of the slider (top | bottom) 
 * - $views_slideshow_ddblock_pager_items: array with pager_items
 *
 * notes: don't change the ID names, they are used by the jQuery script.
 */
 $settings = $views_slideshow_ddblock_pager_settings;

 $number_of_items = $settings['nr_of_items'];        // total number of items to show 
 $number_of_items_per_row=$settings['nr_of_pager_items'];  // number of items to show in a row

?>
<!-- custom pager with images and text. -->
<?php if ($settings['pager_position'] == 'bottom'): ?>
 <div class="spacer-horizontal"><b></b></div>
<?php endif; ?>
<div id="views-slideshow-ddblock-custom-pager-<?php print $settings['delta'] ?>" class="<?php print $settings['pager'] ?> clear-block border">
 <div class="<?php print $settings['pager'] ?>-inner clear-block border">
  <?php if ($views_slideshow_ddblock_pager_items): ?>
   <?php $item_counter=0; ?>
   <?php foreach ($views_slideshow_ddblock_pager_items as $pager_item): ?>
    <div class="<?php print $settings['pager'] ?>-item <?php print $settings['pager'] ?>-item-<?php print $item_counter ?>">
     <div class="<?php print $settings['pager'] ?>-item-inner"> 
      <a onClick="location.href='<?php  print_r($pager_item['node_id']);?>'" href="#" class="pager-link"><?php print $pager_item['pager_image']; ?><?php print $pager_item['pager_text']; ?></a>
     </div>
    </div> <!-- /custom-pager-item -->     
   <?php endforeach; ?>
  <?php endif; ?>
 </div> <!-- /pager-inner-->
</div>  <!-- /pager-->
<?php if ($settings['pager2'] == 1 && $settings['pager2_position']['slide'] === 'slide'): ?>
 <div class="views-slideshow-ddblock-prev-next-slide">
  <div class="prev-container">
   <a class="prev" href="#"><?php print $settings['pager2_slide_prev']?></a>
  </div>
  <div class="next-container">
   <a class="next" href="#"><?php print $settings['pager2_slide_next'] ?></a>
  </div>
 </div>
<?php endif; ?> 

