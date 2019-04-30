<?php

$link = mysqli_connect("localhost", "root", "", "yeticave");

if (!$link) {
    print("Ошибка подключения: " . mysqli_connect_error());
    die;
}

mysqli_set_charset($link, "utf8");