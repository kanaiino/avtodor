-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Окт 21 2025 г., 16:28
-- Версия сервера: 5.5.62
-- Версия PHP: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `avtodor`
--

-- --------------------------------------------------------

--
-- Структура таблицы `requests`
--

CREATE TABLE `requests` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `service` enum('Ремонт дороги','Проектные работы','Подключение ЖКХ','Другое') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Другое',
  `location` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('Ожидание','Одобрено','Отклонено','Завершено') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Ожидание',
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `requests`
--

INSERT INTO `requests` (`id`, `user_id`, `service`, `location`, `description`, `status`, `created_at`) VALUES
(1, 2, 'Ремонт дороги', 'г. Екатеринбург, ул. Ленина, 25', 'Необходимо заделать выбоины на проезжей части.', 'Завершено', '2023-07-13 23:11:10'),
(2, 2, 'Другое', 'г. Первоуральск, ул. Победы, 7', 'Просьба установить дорожное зеркало на перекрёстке.', 'Отклонено', '2024-02-05 06:59:40'),
(3, 3, 'Проектные работы', 'г. Нижний Тагил, ул. Центральная, 10', 'Требуется разработка проекта для новой парковки.', 'Ожидание', '2024-11-22 09:33:05'),
(4, 4, 'Подключение ЖКХ', 'г. Камышлов, ул. Советская, 9', 'Проблема с подключением электричества.', 'Одобрено', '2025-02-11 10:21:46'),
(5, 5, 'Ремонт дороги', 'г. Верхняя Пышма, пр. Строителей, 15', 'Требуется ямочный ремонт асфальта.', 'Завершено', '2025-10-21 08:19:45');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `nickname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` enum('admin','user') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `nickname`, `email`, `phone`, `password`, `role`) VALUES
(1, 'admin', 'admin@example.com', '+7(000)000-00-00', 'admin123', 'admin'),
(2, 'kanaiino', 'kanaiino@gmail.com', '+7(117)117-17-17', 'kanaiino', 'user'),
(3, 'Mariko', 'mar1ko@gmail.com', '+7(666)666-66-66', 'mariko123', 'user'),
(4, 'Yonaga Nemuko', 'nemuwu@gmail.com', '+7(777)777-77-77', 'nemuko123', 'user'),
(5, 'Фито', 'fitows@gmail.com', '+7(123)456-78-90', 'fitows123', 'user');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `requests`
--
ALTER TABLE `requests`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `requests`
--
ALTER TABLE `requests`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
