<?php

require_once 'data.php';
require_once 'helpers.php';
require_once 'start.php';

$categories = get_categories($link);
$lots = get_items($link);

$page_content = include_template('index.php', [
    'categories' => $categories,
    'lots' => $lots,
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