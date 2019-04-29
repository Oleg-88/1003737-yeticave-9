<?php

require_once 'data.php';
require_once 'helpers.php';

$link = mysqli_connect("localhost", "root", "", "yeticave");
if (!$link) {
    print("Ошибка подключения: " . mysqli_connect_error());
} else {
    print("Соединение установлено");
}

mysqli_set_charset($link, "utf8");

$categories = get_categories($link);
$items = get_items($link);

$page_content = include_template('index.php', [
    'categories' => $categories,
    'items' => $items,
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