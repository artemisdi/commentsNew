<?php
define('HOST', 'localhost'); //сервер
define('USER', 'root');  //имя
define('PASSWORD', '');  //пароль
define('DB', 'id9099243_basecoment'); //название базы

$connect = mysqli_connect('localhost','root', '', 'id9099243_basecoment'); // подклчение
//var_dump($connect); //проверка подключения

if (!$connect ) {
    exit('Ошибка подключения к базе данных');
}
