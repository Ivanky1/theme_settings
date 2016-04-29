
<div id="node-<?php print $node->nid; ?>" class="<?php print $classes; ?>"<?php print $attributes; ?>>

  <?php print render($title_prefix); ?>
  <?php if (!$page): ?>
  <?php if ($display_submitted): ?>
    <span class="submitted"><?php print $submitted ?>


	</span>
  <?php endif; ?>
    <h2<?php print $title_attributes; ?>><a href="<?php print $node_url; ?>"><?php print $title; ?></a></h2>
  <?php endif; ?>
  <?php print render($title_suffix); ?>
  <div class="content clearfix"<?php print $content_attributes; ?>>
    <?php

    echo array_values($node->body)[0][0]['value'];
    $sections = recursiveCompanyInfo($node->nid);
    if ($sections) {
        echo  get_tree($sections, $node->nid);
    }


    function get_tree($tree, $pid) {
         $html = '';
        foreach ($tree as $row) {
            if ($row['pid'] == $pid) {
                $html .= '<li>' . "\n";
                $html .= '    ' . $row['title'];
                $html .= '    <p>' . $row['body'] . "\n</p>";
                if (count($tree) > 1) $html .= '    ' . get_tree($tree, $row['nid']);
                $html .= '</li>' . "\n";
            }
        }
        return $html ? '<ul>' . $html . '</ul>' . "\n" : '';
    }


    function recursiveCompanyInfo($nid) {
        static $companySections = array();
        $q = db_select('field_data_field_link_to_company_section', 'link');
        $q->leftJoin('field_data_body', 'b', 'b.entity_id = link.entity_id');
        $q->leftJoin('node', 'n', 'n.nid = link.entity_id');
        $q->condition('link.field_link_to_company_section_nid', $nid);
        $q->fields('link', array('entity_id',));
        $q->fields('b', array('body_value'));
        $q->fields('n', array('title'));
        $res = $q->execute()->fetchAssoc();
        if (isset($res['entity_id'])) {
            $companySections[] = array('pid' => $nid, 'nid' => $res['entity_id'], 'title' => $res['title'], 'body' => $res['body_value']);
            recursiveCompanyInfo($res['entity_id']);
        }
        return $companySections;
    }

    ?>
  </div>
  </div>

