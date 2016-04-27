<?php if ($tabs): ?><div id="tabs-wrapper" class="clearfix"><?php endif; ?>
<?php if ($tabs): ?><?php print render($tabs); ?></div><?php endif; ?>
<?php print render($tabs2); ?>
<?php print $messages; ?>
<?php print render($page['help']); ?>
<?php if ($action_links): ?><ul class="action-links"><?php print render($action_links); ?></ul><?php endif; ?>
<?php print render($page['content']); ?>


<?php

$q = db_select('node', 'n');
$q->innerJoin('field_data_field_term','term', 'n.nid = term.entity_id');
$q->condition('term.field_term_tid', array(1435, 1434, 1437, 1436), 'in');
$q->fields('n', array('created'));
$q->orderBy('n.created');
$res = $q->execute()->fetchAll();
$creates =array();
foreach($res as $r) {
    $creates[] = $r->created;
}
echo '<input class="news_time_full" type="hidden" value="'.implode(',',$creates).'">';