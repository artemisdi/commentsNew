<?php

$CommentUser['name'] = strip_tags(trim($_POST['name']));  //функция strip_tags() - убирает все теги
$CommentUser['mail'] = strip_tags(trim($_POST['email'])); //функция trip удаляет в начале строки и в конце все пробелы
$CommentUser['comment'] = strip_tags(trim($_POST['comment']));

$connect = mysqli_connect('localhost','root', '', 'baseComent');

//запрос к базе данных для вывода данных с таблицы (всех)
// по подключению выбираем * - все из таблицы userComment
if ($_POST[type] == 'windowOnload') {
    $resultOnload = mysqli_query($connect, "SELECT * FROM userComment");
    while ($row = mysqli_fetch_assoc($resultOnload)) {
        $resultClient[] = $row;
    }
    echo json_encode($resultClient);
}


//запрос к базе данных для вывода данных с таблицы (последнего добавленного)
// по подключению выбираем * - все из таблицы userComment
if ($_POST[type] == 'click')  //проверка, кнопка ли нажата или загрузка страницы
{
    // проерка на наличие пришедших данных
    if (!empty($_POST[name]) &&
        !empty($_POST[email]) &&
        !empty($_POST[comment])) {
        //записал в базу новуе данные
        mysqli_query($connect, "
        INSERT INTO userComment( name, email, comment)
        VALUES ('$CommentUser[name]','$CommentUser[mail]','$CommentUser[comment]')
        ");
        $resultLast = mysqli_query($connect, "SELECT * FROM userComment ORDER BY id DESC LIMIT 1");
        while ($row = mysqli_fetch_assoc($resultLast)) {
            $resultClient[id] = $row[id];
            $resultClient[name] = $row[name];
            $resultClient[email] = $row[email];
            $resultClient[comment] = $row[comment];
        }
        echo json_encode($resultClient);
    }

}

mysqli_close($connect);

