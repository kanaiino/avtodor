<?php
// Запускаем сессию, чтобы можно было её очистить
session_start();

// Удаляем все данные сессии
session_unset();

// Разрушаем сессию
session_destroy();

// Удаляем куки пользователя (если они были установлены)
setcookie('user_id', '', time() - 3600, "/");
setcookie('nickname', '', time() - 3600, "/");
setcookie('email', '', time() - 3600, "/");

// Перенаправляем пользователя на главную страницу или страницу входа
header("Location: login.php");
exit();
?>