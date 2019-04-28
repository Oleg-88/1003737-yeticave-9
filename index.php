<?php

require_once 'data.php';
require_once 'helpers.php';

$link = mysqli_connect("localhost", "root", "", "yeticave");

mysqli_set_charset($link, "utf8");

$sql = "SELECT * FROM categories;";
$categories = db_fetch_data($link, $sql);

$sql = "SELECT l.id AS id, l.name AS name, image, price, UNIX_TIMESTAMP(l.end_date) AS end_date, c.name AS category
FROM lots l
JOIN categories c ON l.category_id = c.id
ORDER BY l.id DESC;";
$items = db_fetch_data($link, $sql);

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