<div id="wrapper-2col">
    <div id="header-out">
        <div id="header">
            <?php if ($logo || $site_title): ?>
            <div id="logo-floater">
                    <a href="<?php print $front_page ?>">
                        <?php if ($logo): ?>
                            <img src="<?php print $logo ?>" alt="<?php print $site_name_and_slogan ?>" title="<?php print $site_name_and_slogan ?>" id="logo" />
                        <?php endif; ?>
                    </a>
             </div>
            <?php endif; ?>
            <?php print render($page['header']); ?>
        </div>
        <div id="block-muchomenu-1">
            <?php print render($page['header_block']); ?>
        </div>
    </div>
    <div id="storage">
        <div id="left-container">
            <?php if ($page['sidebar_left']): ?>
                    <?php print render($page['sidebar_left']); ?>
            <?php endif; ?>
        </div>
        <div id="container">
            <div id="center">
                <div id="squeeze">
                    <?php if ($messages) : ?>
                        <?php print $messages; ?>
                    <?php endif ?>
                    <?php print render($page['help']); ?>
                    <?php print render($tabs); ?>
                    <?php
                    if ($action_links): ?>
                        <ul class="action-links"><?php print render($action_links); ?></ul>
                    <?php endif; ?>
                    <?php if ($title): ?>
                        <h1<?php print $tabs ? ' class="with-tabs"' : '' ?>><?php print $title ?></h1>
                    <?php endif; ?>
                    <?php print render($page['content']); ?>
                </div>
            </div>
        </div>
        <div class="clearfix"></div>
    </div>
    <div class="clearfix"></div>
    <div id="for-footer-blocks"></div>
</div>

 <div id="footer-blocks">
    <?php print render($page['footer']); ?>
</div>

<?php if (!empty($page['popup'])) : ?>
    <div id="popup_custom">
        <div class="cbox" id="chat_omg">
            <div id="liveagent_button_online_573D0000000Gpki" style="display: none;text-align: center; margin-top: 60px;">
                <a href="#" onclick="liveagent.startChat('573D0000000Gpki')" rel="nofollow"><img src="https://www.infowatch.ru/sites/default/files/miscellaneous/chatt_on.jpg" /></a></div>
            <div id="liveagent_button_offline_573D0000000Gpki" style="display: none;text-align: center; margin-top: 60px;cursor:pointer;">
                <a href="#" id="off_line" rel="nofollow"><img src="https://www.infowatch.ru/sites/default/files/miscellaneous/chatt_off.jpg" /></a></div>
            <script type="text/javascript">
            </script><noscript>
                Для корректной работы чата Вам необходимо включить JavaScript.
            </noscript>
            <?php print render($page['popup']); ?>
        </div>
    </div>
<?php endif ?>
