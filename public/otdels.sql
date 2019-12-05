-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1
-- Время создания: Дек 05 2019 г., 14:10
-- Версия сервера: 10.1.40-MariaDB
-- Версия PHP: 7.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `kst`
--

-- --------------------------------------------------------

--
-- Структура таблицы `otdels`
--

CREATE TABLE `otdels` (
  `id` int(10) UNSIGNED NOT NULL,
  `otdelname` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `otdelfullname` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'full_name_otdel',
  `user_id` int(10) UNSIGNED NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `otdels`
--

INSERT INTO `otdels` (`id`, `otdelname`, `otdelfullname`, `user_id`) VALUES
(1, 'Общий кст', 'Общий отдел для все', 0),
(26, 'Кадры', 'Отдел кадров', 0),
(27, 'Бухгалтерия', 'Бухгалтерия', 0),
(28, 'ОПЭ и ОТиЗ', 'Отдел планово-экономический, ОТиЗ', 0),
(29, 'Эксплуатация', 'Отдел эксплуотации', 0),
(30, 'ПТО и МТО', 'Производственно технический отдел', 0),
(31, 'Управление', 'Управление кст', 0);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `otdels`
--
ALTER TABLE `otdels`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `otdels`
--
ALTER TABLE `otdels`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
