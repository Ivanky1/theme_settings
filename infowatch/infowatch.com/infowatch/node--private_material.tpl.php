<?php
    foreach(glob($_SERVER['DOCUMENT_ROOT'].'/sites/default/files/private_files/temporary/*') as $files) {
        drupal_unlink($files);
    }
?>

<?php if ($page == 0){ ?>
    <div id="node-<?php print $node->nid; ?>" class="<?php print $classes; ?>"<?php print $attributes; ?>>

        <div class="content clearfix"<?php print $content_attributes; ?>>
            <?php
            // We hide the comments and links now so that we can render them later.
            hide($content['comments']);
            hide($content['links']);
            print render($content);

            ?>
        </div>
    </div>

<?php }?>
<?php if ($page == 1){ ?>
    <?php if ($display_submitted): ?>
        <span class="submitted"><?php //print $submitted ?></span>
    <?php endif; ?>

    <div class="content clearfix"<?php print $content_attributes; ?>>
        <div class="social-blocks" style="overflow: visible;height: 48px;">
            <div class="soc-block">
                <script charset="utf-8" src="//yandex.st/share/share.js" type="text/javascript"></script>
        <div class="yashare-auto-init" data-yasharel10n="en" data-yasharequickservices="vkontakte,lj,linkedin" data-yasharetype="icon">
            <span class="b-share"><a class="b-share__handle" data-hdirection="" data-vdirection="" id="ya-share-0.5163214536836552-1330440540967"><img alt="" class="b-share-icon" src="//yandex.st/share/static/b-share.png" /></a></span></div>
    </div>
    <div class="soc-block twitter-soc-block">
        <a class="twitter-share-button" data-lang="en" href="https://twitter.com/share">Твитнуть</a> <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="//platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script></div>
    <div class="soc-block fb-soc-block" style="margin-top: 14px;">
        <div id="fb-root">
            &nbsp;</div>
        <script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) {return;}
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.3";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
        <div class="fb-like" data-action="recommend" data-layout="button_count" data-send="false" data-show-faces="false" data-width="250">
            &nbsp;</div>
            </div>
        </div>
        <?php
        hide($content['comments']);
        hide($content['links']);
        $options = array(
            'type' => 'full',
            'label'=>'hidden',
        );
        $body = field_view_field('node', $node, 'body', $options);
        echo render($body);

        if (!variable_get('profile_anonim_email') && $user->uid == 0) {
            global $variables;
            $block = module_invoke('statistics_upload', 'block_view','profile-anonim-users-form' );
            print theme_status_messages($variables);
            echo render($block['content']);
        } else {
            require "inc/ajax_private_material_script.php";
            if ($user->uid != 0) $email = $user->mail;
            else {
                $email = variable_get('profile_anonim_email');
                variable_set('profile_anonim_email','');
            }
            $profile_podpiska = (variable_get('profile_podpiska')) ?variable_get('profile_podpiska') :'';
            variable_set('profile_podpiska','');
            $fileType = pathinfo($node->field_file_private_material['und'][0]['filename'], PATHINFO_EXTENSION );
            $classFile = returnClassFile($fileType);
            $scripts_ajax = statistic_ajax_script($node->nid, $user->uid, $email, $profile_podpiska);
            $file = field_get_items('node', $node, 'field_file_private_material');
            $field_file = field_view_value('node', $node, 'field_file_private_material', $file[0]);
            echo "<h2 class='cg mtop36 mbot12'>Download material:</h2>";
            $fileHtml = preg_replace('/<img.*?>/','',render($field_file));
           // echo preg_replace('/(a.* href=").*?(".*>).*(<\/a>.*)/is','$1#$2'.$node->title.'$3',render($field_file));
            echo "<div class='mbot36'><span class='file'><a class='donwload_icon {$classFile}' href='#'>{$node->title}</a></span></div>";
            echo $scripts_ajax;
        }

        ?>
    </div>
    <div class="clearfix">
        <?php if (!empty($content['links'])): ?>
            <div class="links"><?php print render($content['links']); ?></div>
        <?php endif; ?>

        <?php print render($content['comments']); ?>
    </div>
<?php }?>
