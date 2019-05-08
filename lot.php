<?php

require_once 'helpers.php';
require_once 'start.php';

date_default_timezone_set('Europe/Berlin');

$categories = get_categories($link);

$lot_id = $_GET['id'] ?? '';
$lot = get_lot($link, $lot_id);

if ($lot) {
    $page_content = include_template('lot.php', [
        'lot' => $lot,
        'categories' => $categories,
        'lot_id' => $lot_id,
    ]);
} else {
    http_response_code(404);
    $page_content = http_response_code(404);
}

$layout_content = include_template('layout.php', [
        'page_name' => 'Главная',
        'page_content' => $page_content,
        'categories' => $categories,
        'is_auth' => $is_auth,
        'user_name' => $user_name,
    ]
);

print($layout_content);