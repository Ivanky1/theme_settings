<?php if ($tabs): ?><div id="tabs-wrapper" class="clearfix"><?php endif; ?>
<?php if ($tabs): ?><?php print render($tabs); ?></div><?php endif; ?>
<?php print render($tabs2); ?>
<?php print $messages; ?>
<?php print render($page['help']); ?>
<?php if ($action_links): ?><ul class="action-links"><?php print render($action_links); ?></ul><?php endif; ?>
<?php print render($page['content']); ?>
<?php
$view = views_get_view('news_escap');
$view->set_display('page');
$view->set_items_per_page(3);
print $view->render();




/*
$q = db_select('field_data_body', 'b');
$q->condition('b.body_value', '%ЗАО «ИнфоВотч»%', 'LIKE');
$q->fields('b', array('body_value', 'entity_id'));
$r = $q->execute()->fetchAll();
foreach($r as $v) { print_r($v);
    $b = preg_replace('/ЗАО «ИнфоВотч»/', 'АО «ИнфоВотч»', $v->body_value);
    //$n = node_load($v->entity_id);
    //$n->body['ru'][0]['value'] = $b;
    //node_save($n);
} */



?>

