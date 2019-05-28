<?php
include_once("db.php"); // подключил файл в котором идет подключение к базе данных
//$connect = mysqli_connect('localhost','root', '', 'baseComent');



//запрос всех данных из таблицы userComment
//$query2 = "SELECT * FROM userComment";


//стучимся за ответами 1-подключение, 2- что нужно
//$resultComent =  mysqli_query($connect, $query2);
//Если есть такая таблица ок
//if(!$resultComent) echo 'произошла ошибка';
//else echo 'данные полученны';

/**
 * Блок ниже выводит все данные с таблицы через цикл
 * функция - mysqli_fetch_row - выдает все значения идентификаор поля цифра
 */
//while ( $row = mysqli_fetch_row($resultComent)) {
//    echo "идентификатор: $row[0]. Имя: $row[1] . почта: $row[2] . Коментарий: $row[3] <br/>";
//}


/**
 * Блок ниже выводит все данные с таблицы через цикл
 * функция - mysqli_fetch_assoc - выдает все значения идентификаор поля имя
 */
//while ( $row = mysqli_fetch_assoc($resultComent)) {
//    echo "идентификатор: $row[id]. Имя: $row[name] . почта: $row[email] . Коментарий: $row[comment] <br/>";
//}


/**
 * Удаление таблицы
 * $connect -  подключение к базе
 * DROP TABLE userComment - удаление таблицы userComment
 */
//mysqli_query($connect, "DROP TABLE userComment");

