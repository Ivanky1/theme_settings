<?php
// $Id: block.tpl.php,v 1.10 2010/04/26 14:10:40 dries Exp $

/**
 * @file
 * Default theme implementation to display a block.
 *
 * Available variables:
 * - $block->subject: Block title.
 * - $content: Block content.
 * - $block->module: Module that generated the block.
 * - $block->delta: An ID for the block, unique within each module.
 * - $block->region: The block region embedding the current block.
 * - $classes: String of classes that can be used to style contextually through
 *   CSS. It can be manipulated through the variable $classes_array from
 *   preprocess functions. The default values can be one or more of the following:
 *   - block: The current template type, i.e., "theming hook".
 *   - block-[module]: The module generating the block. For example, the user module
 *     is responsible for handling the default user navigation block. In that case
 *     the class would be "block-user".
 * - $title_prefix (array): An array containing additional output populated by
 *   modules, intended to be displayed in front of the main title tag that
 *   appears in the template.
 * - $title_suffix (array): An array containing additional output populated by
 *   modules, intended to be displayed after the main title tag that appears in
 *   the template.
 *
 * Helper variables:
 * - $classes_array: Array of html class attribute values. It is flattened
 *   into a string within the variable $classes.
 * - $block_zebra: Outputs 'odd' and 'even' dependent on each block region.
 * - $zebra: Same output as $block_zebra but independent of any block region.
 * - $block_id: Counter dependent on each block region.
 * - $id: Same output as $block_id but independent of any block region.
 * - $is_front: Flags true when presented in the front page.
 * - $logged_in: Flags true when the current user is a logged-in member.
 * - $is_admin: Flags true when the current user is an administrator.
 * - $block_html_id: A valid HTML ID and guaranteed unique.
 *
 * @see template_preprocess()
 * @see template_preprocess_block()
 * @see template_process()
 */



?>
    <script type="text/javascript">
        _simpelads_load('.simpleads-<?php print $tid; ?><?php if ($prefix) : ?>-<?php print $prefix; ?><?php endif; ?>', <?php print $tid; ?>, <?php print check_plain($ads_limit); ?>);
    </script>
<?php  if (count($ads) > 0) : ?>
    <?php foreach ($ads as $ad) : ?>
        <?php
            if (isset($ad['node']->field_ad_end_date['ru'])) {
                preg_match('/(\d{2})\/(\d{2})\/(\d{4})/',$ad['node']->field_ad_end_date['ru'][0]['value'],$match);
                if ( time() >  mktime(0,0,0,$match[1],$match[2],$match[3]) ) {
                    $simpleAdObj = node_load($ad['nid']);
                    $simpleAdObj->status = 0;
                    node_save($simpleAdObj);
                    drupal_goto($_GET['q']);
                }
            }

        ?>
        <?php  if ($ad['type'] == 'graphic') : ?>
            <?php if ($ad['destination_url']) : ?>
                <?php print preg_replace('/(href=").*?(")/',"$1".$ad['destination_url']."$2", theme('simpleads_img_element', array('ad' => $ad, )) ); ?>
            <?php endif ?>
        <?php elseif ($ad['type'] == 'text') : ?>
            <?php print theme('simpleads_text_element', array('ad' => $ad, 'settings' => $ad_setting)); ?>
        <?php else : ?>
            <?php print theme('simpleads_flash_element', array('ad' => $ad, 'settings' => $ad_setting)); ?>
        <?php endif; ?>
    <?php endforeach; ?>
<?php endif; ?>

<script>
    (function($) {
       var simple = function() {
        var cnt = $('div.simplead-container').length;
        var cnt2 = cnt-1;
         if (cnt>1) {
               $('div.simplead-container').each(function() {
                   var i =  Math.round(Math.random()*cnt2);
                   $(".simplead-container").eq(i);
                   $(".simplead-container").eq(i).siblings("div").hide();
                   $(".simplead-container").eq(i).show();
               })

           }
       }
        simple();
        setInterval(simple,5000);

    }) (jQuery);


</script>