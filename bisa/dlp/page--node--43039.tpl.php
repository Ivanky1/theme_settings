<?php if ($tabs): ?><div id="tabs-wrapper" class="clearfix"><?php endif; ?>
<?php if ($tabs): ?><?php print render($tabs); ?></div><?php endif; ?>
<?php print render($tabs2); ?>
<?php print $messages; ?>
<?php print render($page['help']); ?>
<?php if ($action_links): ?><ul class="action-links"><?php print render($action_links); ?></ul><?php endif; ?>
<?php // print render($page['content']); ?>

<?php

define( 'IPS_XML_RPC_DEBUG_ON'  , 0 );
define( 'IPS_XML_RPC_DEBUG_FILE', '' );

// Adjust this path as needed
$inc = '/'.libraries_get_path('ipb');

include $_SERVER['DOCUMENT_ROOT']. $inc."/classXmlRpc.php";


$classXmlRpc	= new classXmlRpc();
//echo $classXmlRpc->doc_type;
//print_r($classXmlRpc);

// Adjust the URL as needed, and supply a valid api_key
print_r($classXmlRpc->sendXmlRpc( "http://forum.bis-expert.ru/interface/board/index.php", "postTopic", array(
    'api_module' => 'ipb',
    'api_key' => '93c03675f10f4d5b46b88fe04bfa84a3',
   // 'forum_ids' => '32',
  //  'member_field'       => 'string',
   // 'member_key'         => '114',
   // 'forum_id'           => 32,
    'topic_title'		 => '114/фстэк-создаёт-систему-разработки-и-эксплуатац',
    //'post_content'       => 'string',
) ) );


exit;
