<?php
define('HOST', 'localhost'); //сервер
define('USER', 'root');  //имя
define('PASSWORD', '');  //пароль
define('DB', 'baseComent'); //название базы

$connect = mysqli_connect('localhost','root', '', 'baseComent'); // подклчение
//var_dump($connect); //проверка подключения

if (!$connect ) {
    exit('Ошибка подключения к базе данных');
}


// ответ с базы если что то не верно
//$query = mysqli_query($connect,'SELECT * FROM `userComment`'); //запрос к базе данных
//while ($row = mysqli_fetch_assoc($query)) {  //цикл для получения всех данных
//    echo $row[name] .'</br>'; //выводим данные
//}