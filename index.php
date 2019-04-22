<?php

require_once 'data.php';
require_once 'helpers.php';

$page_content = include_template('index.php', [
    'categories' => $categories,
    'items' => $items,
    'end_date' => $end_date,
    'cur_date' => $cur_date
    ]
);

$layout_content = include_template('layout.php', [
    'page_name' => 'Главная',
    'page_content' => $page_content,
    'categories' => $categories,
    'is_auth' => $is_auth,
    'user_name' => $user_name,
    ]
);

print($layout_content);