<div id="wrapper">
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
    <div id="container">
        <div id="center">
            <div id="squeeze">
                <?php

                ?>
                <?php if ($messages) : ?>
                    <?php print $messages; ?>
                <?php endif ?>
                <?php print render($page['help']); ?>
                <?php print render($tabs); ?>
                <?php print render($page['highlighted']); ?>
                <?php print render($page['content']); ?>

            </div>
        </div>
    </div>
    <div id="for-footer-blocks"></div>
</div>

<div id="footer-blocks">
    <?php print render($page['footer']); ?>
</div>