<?php

if (is_numeric($_GET['page'])) {
    $page = abs($_GET['page']);
    $view = views_get_view('news_escap');
    $view->set_display('page');
    $view->set_items_per_page($page);
    print $view->render();
}



?>

