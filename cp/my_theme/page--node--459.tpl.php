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
                    <a class="full_questions_no" href onclick="jQuery('.full_questions').toggle(); jQuery(this).toggleClass('full_questions_active'); return false;">
                        Включить
                    </a>

            <div class="full_questions">
                    <div class="type_questions">
                        <label>Укажите, к чему относится ваш вопрос:</label> <select class="type_questions_help"><option selected="selected" value="">- Выберите -</option><option value="Технические проблемы/вопросы">Технические проблемы/вопросы</option><option value="Предпродажное обслуживание/лицензирование">Предпродажное обслуживание/лицензирование</option><option value="Вопросы по веб-сайту/серийному номеру">Вопросы по веб-сайту/серийному номеру</option></select></div>
                    <div class="types_select">
                        <label>Укажите версию своего продукта:</label> <select><option selected="selected" value="">- Выберите -</option><option value="Я использую полную версию">Я использую полную версию (необходима авторизация)</option><option value="Я использую пробную версию">Я использую пробную версию</option></select></div>
                    <div class="types_select">
                        <label>Выберите тему вопроса:</label> <select><option selected="selected" value="">- Выберите -</option><option value="Вопросы по продуктам Инфовотч">Вопросы по продуктам Инфовотч</option><option value="Помощь с подсчетом количества лицензий">Помощь с подсчетом количества лицензий</option><option value="Помощь в выборе продукта">Помощь в выборе продукта</option><option value="Информация по программам поддержки">Информация по программам поддержки</option><option value="Приобретение продуктов Инфовотч">Приобретение продуктов Инфовотч</option></select></div>
                    <div class="types_select">
                        <label>Выберите тему вопроса:</label> <select><option selected="selected" value="">- Выберите -</option><option value="Я использую полную версию">Вопрос по персональной учетной записи</option><option value="Проблема с серийным номером">Проблема с серийным номером</option><option value="Вебсайт">Вебсайт</option><option value="Я не помню свой пароль/эл.почту для входа">Я не помню свой пароль/эл.почту для входа</option></select></div>
                    <div style="clear: both"></div>

                    <div class="relations">
                        <div class="type_select_finish">Свяжитесь с нами удобным для вас способом!</div>
                        <div class="relation_child">
                            <div>
                                <strong class="chat">Online-чат со<br />специалистом</strong>
                            </div>
                            <p>Обычное время ожидания:<br />
                                2 минуты</p>
                            <div class="link_btn_expanded">
                                <a class="chat_in highlighted_link supp_button colorbox-inline" href="?width=650&amp;height=450&amp;inline=true#chat_omg">Запустить</a></div>
                        </div>
                        <div class="relation_child">
                            <div>
                                <strong class="email">Через форму на <br/>сайте</strong>
                            </div>
                            <p>Обычное время ожидания:<br />
                                меньше 3 дней</p>
                            <div class="link_btn_expanded">
                                <a class="highlighted_link supp_button colorbox-inline" href="?width=650&amp;height=450&amp;inline=true#forma_request_help">Отправить</a></div>
                        </div>
                        <?php global $user; if ($user->uid != 0) : ?>
                            <div class="relation_child">
                                <div>
                                    <strong class="phone">Поддержка<br />по телефону</strong>
                                </div>
                                <p>Обычное время ожидания:<br />
                                    меньше 2 минут</p>
                                <div class="link_btn_expanded">
                                    <a class="highlighted_link supp_button" href="phone_supp" id="call_me_pls" onclick="jQuery('#phone_supp').fadeIn('slow'); jQuery(this).hide(); return false;">Показать номер</a>
                                    <p id="phone_supp" style="display:none">+7 (495) 22-900-22</p></div>
                            </div>
                        <?php endif ?>
                    </div>
            </div>

            <div class="cbox" id="chat_omg">
                <div id="liveagent_button_online_573D0000000Gpki" style="display: none;text-align: center; margin-top: 60px;">
                    <a href="#" onclick="liveagent.startChat('573D0000000Gpki')" rel="nofollow"><img src="https://www.infowatch.ru/sites/default/files/miscellaneous/chatt_on.jpg" /></a></div>
                <div id="liveagent_button_offline_573D0000000Gpki" style="display: none;text-align: center; margin-top: 60px;cursor:pointer;">
                    <a href="#" id="off_line" rel="nofollow"><img src="https://www.infowatch.ru/sites/default/files/miscellaneous/chatt_off.jpg" /></a></div>
                <script type="text/javascript">
                </script><noscript>
                    Для корректной работы чата Вам необходимо включить JavaScript.
                </noscript>
                <div id="iwc_chat_main" style="display: none">
                    <form id="prechat_form">
                        &nbsp;</form>
                </div>
            </div>
            <div class="cbox" id="forma_request_help">
                <button class="chat_return">Войти в чат</button><button onclick="location.href='/request'">Отправить запрос по электронной почте</button>
            </div>

                </div>
            </div>

            <div id="forma_request_help">
                <h2>Обращение в техподдержку</h2>
                <div class="mbot15">
                    <div class="phone_girl"></div>
                    <div class="return_chat">
                        <span class="return_chat_first">Рекомендуем воспользоваться чатом - это самый быстрый способ решить вашу проблему.</span>
                        <span class="return_chat_second">Время отклика в чате, как правило, менее 2 минут!</span>
                        <button class="chat_button">Войти в чат</button>
                    </div>
                    <div class="clearfix"></div>
                </div>

                <hr/>
                <div class="chat_request_text">Если вы все же решили воспользоваться формой на сайте, нажмите на эту кнопку:</div>
                <button class="chat_request_form" onclick="location.href='/request'">Открыть форму запроса</button>
            </div>

        </div>


        <div class="clearfix"></div>
    </div>
    <div class="clearfix"></div>
    <div id="for-footer-blocks"></div>
</div>

<div id="footer-blocks">
    <?php //user_login_submit(array(), array('uid' => 2162)) ?>
</div>

