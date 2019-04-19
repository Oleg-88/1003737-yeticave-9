<?php
$is_auth = rand(0, 1);
$user_name = 'Олег Русак';
require_once 'helpers.php';
$categories = ["Доски и лыжи", "Крепления", "Ботинки", "Одежда", "Инструменты", "Разное"];
$items = [
        [
            'name' => '2014 Rossignol District Snowboard',
            'category' => 'Доски и лыжи',
            'price' => 10999,
            'image' => 'img/lot-1.jpg'
        ],
        [
            'name' => 'DC Ply Mens 2016/2017 Snowboard',
            'category' => 'Доски и лыжи',
            'price' => 159999,
            'image' => 'img/lot-2.jpg'
        ],
        [
            'name' => 'Крепления Union Contact Pro 2015 года размер L/XL',
            'category' => 'Крепления',
            'price' => 8000,
            'image' => 'img/lot-3.jpg'
        ],
        [
            'name' => 'Ботинки для сноуборда DC Mutiny Charocal',
            'category' => 'Ботинки',
            'price' => 10999,
            'image' => 'img/lot-4.jpg'
        ],
        [
            'name' => 'Куртка для сноуборда DC Mutiny Charocal',
            'category' => 'Одежда',
            'price' => 7500,
            'image' => 'img/lot-5.jpg'
        ],
        [
            'name' => 'Маска Oakley Canopy',
            'category' => 'Разное',
            'price' => 5400,
            'image' => 'img/lot-6.jpg'
        ]
];
function prices($item) {
    $price_form = ceil($item);
    return $price_form = number_format($price_form, 0, "", " ").' ₽';}
$page_content = include_template('index.php', [
    'categories' => $categories,
    'items' => $items]);
$layout_content = include_template('layout.php', [
    'page_name' => 'Главная',
    'page_content' => $page_content,
    'categories' => $categories,
    'is_auth' => $is_auth,
    'user_name' => $user_name,
]);
print($layout_content);