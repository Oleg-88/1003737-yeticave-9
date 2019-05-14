<?php

require_once 'helpers.php';
require_once 'start.php';

date_default_timezone_set('Europe/Berlin');

$categories = get_categories($link);
//Если форма отправлена, то это должно произойти методом POST. В таком случае проверяем, чтоб все поля были заполнены.
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $lot = $_POST['lot'];
    $required_fields = ['name', 'category', 'description', 'price', 'bet_step', 'end_date'];
    $errors = [];
    foreach ($required_fields as $field) {
        if (empty($lot[$field])) {
            $errors[$field] = 'Поле не заполнено';
        }
    }
    if ($lot['category'] === 'select') {
        $errors['category'] = 'Поле не заполнено';
    }
    if ($lot['price'] <= 0) {
        $errors['price'] = 'Введите число больше ноля';
    }
    if ($lot['bet_step'] <= 0 or intval($lot['bet_step']) !== $lot['bet_step']) {
        $errors['bet_step'] = 'Введите целое число больше ноля';
    }
    if (!is_date_valid($lot['end_date'])) {
        $errors['end_date'] = 'Введите дату в формате «ГГГГ-ММ-ДД»';
    } elseif (strtotime($lot['end_date']) - strtotime("tomorrow") < 0) {
        $errors['end_date'] = 'Укажите дату больше текущей даты';
    }
    //проверка загружаемого файла и его типа, дальнейшие манипуляции с файлом, если все верно
    if (!empty($_FILES['image']['name'])) {
        $tmp_name = $_FILES['image']['tmp_name'];
        $path = $_FILES['image']['name'];
        $finfo = finfo_open(FILEINFO_MIME_TYPE);
        $file_type = finfo_file($finfo, $tmp_name);
        if ($file_type === "image/png" or $file_type === "image/jpeg") {
            move_uploaded_file($tmp_name, 'img/' . $path);
            $lot['image'] = ('img/' . $path);
        } else {
            $errors['image'] = 'Загрузите изображение в формате png, jpg или jpeg';
        }
    } else {
        $errors['image'] = 'Вы не загрузили изображение';
    }
    if (count($errors) > 0) {
        $page_content = include_template('add.php', [
            'lot' => $lot,
            'errors' => $errors,
            'categories' => $categories
    ]);
    } else {
        $lot['end_date'] = date("Y-m-d", strtotime($lot['end_date']));
        $new_lot = [
            $lot['name'],
            $lot['description'],
            $lot['image'],
            $lot['price'],
            $lot['end_date'],
            $lot['bet_step'],
            $lot['category']
        ];
     add_lot($link, $new_lot);
     $lot_id = mysqli_insert_id($link);
     header("Location: lot.php?id=" . $lot_id);
    }
}

$layout_content = include_template('layout.php', [
        'page_content' => $page_content,
        'categories' => $categories,
        'is_auth' => $is_auth,
        'user_name' => $user_name,
    ]
);

print($layout_content);