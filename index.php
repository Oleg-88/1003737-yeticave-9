<?php

require_once 'data.php';
require_once 'helpers.php';

$page_content = include_template('index.php', [
    'categories' => $categories,
    'items' => $items
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