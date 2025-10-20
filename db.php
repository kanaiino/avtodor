<?php
$host = "localhost";
$user = "root";
$password = "";
$db_name = "avtodor";

// Соединяемся с базой данных
$conn = mysqli_connect($host, $user, $password, $db_name);

// Проверяем подключение
if (!$conn) {
    die("Ошибка подключения к базе данных: " . mysqli_connect_error());
}
?>
