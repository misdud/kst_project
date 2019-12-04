-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1
-- Время создания: Дек 04 2019 г., 17:25
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
-- Структура таблицы `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` int(10) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_01_075300_create_roles_table', 1),
(5, '2019_12_01_080416_create_roles_users_table', 1);

-- --------------------------------------------------------

--
-- Структура таблицы `roles`
--

CREATE TABLE `roles` (
  `id` int(10) UNSIGNED NOT NULL,
  `rolename` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `inforole` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `roles`
--

INSERT INTO `roles` (`id`, `rolename`, `inforole`, `created_at`, `updated_at`) VALUES
(26, 'admin', 'admin full', '2019-12-03 09:21:20', '2019-12-03 09:21:20'),
(27, 'moder_kanc', 'Validator oldres kancler', '2019-12-03 09:30:33', '2019-12-03 09:30:33'),
(28, 'menjr_kanc', 'Open\\clos zaiv +edit sp prod', '2019-12-03 09:31:16', '2019-12-03 09:31:16'),
(29, 'user_all', 'For access all service', '2019-12-03 09:31:31', '2019-12-03 09:31:31'),
(30, 'test', 'test', '2019-12-04 07:09:39', '2019-12-04 07:09:39');

-- --------------------------------------------------------

--
-- Структура таблицы `roles_users`
--

CREATE TABLE `roles_users` (
  `id` int(10) UNSIGNED NOT NULL,
  `role_id` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `user_id` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `roles_users`
--

INSERT INTO `roles_users` (`id`, `role_id`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 27, 2, NULL, NULL),
(2, 29, 5, NULL, NULL),
(3, 29, 5, NULL, NULL),
(4, 29, 5, NULL, NULL),
(5, 30, 7, NULL, NULL),
(6, 30, 7, NULL, NULL),
(7, 27, 7, NULL, NULL),
(8, 28, 7, NULL, NULL),
(9, 27, 7, NULL, NULL),
(10, 27, 6, NULL, NULL),
(11, 28, 6, NULL, NULL),
(12, 28, 6, NULL, NULL),
(13, 29, 6, NULL, NULL),
(14, 30, 6, NULL, NULL),
(15, 30, 6, NULL, NULL),
(16, 26, 6, NULL, NULL),
(17, 30, 2, NULL, NULL),
(18, 29, 2, NULL, NULL),
(19, 28, 2, NULL, NULL),
(20, 29, 7, NULL, NULL),
(21, 30, 3, NULL, NULL),
(22, 29, 3, NULL, NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `login` varchar(8) COLLATE utf8mb4_unicode_ci NOT NULL,
  `activ` smallint(6) NOT NULL DEFAULT '0',
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `name`, `login`, `activ`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Дудко Михаил', '378512', 1, '$2y$10$vma5AfbpJLBTygSEeb3ySuR2IJLcX1Og4cim2M8KcTn63bsKmPoMW', 'rN1Lwf7zCi2JzXaW0TIIeAaPTMpr9DrwwJTLSyFwFzdJLUBypKnNIM80bD2L', NULL, NULL),
(2, 'Атрошкина Ирина', '280830', 0, '$2y$10$qlSfMe.Ie7dc8nOCuYUjRuDpPP2jHCqYbI4Ei4rteoIcY/yNk7oZq', NULL, '2019-12-02 08:27:21', '2019-12-03 08:14:09'),
(3, 'Халькин Николай', '258350', 1, '$2y$10$dX62WvbIwQ6f6Z9XKf2e0uWyvS4WsWCtBUhUP7c5UJ2O9Irl4m3BK', NULL, '2019-12-02 08:48:21', '2019-12-03 03:58:02'),
(4, 'Головастая Юлия', '335790', 0, '$2y$10$Qvyyw2L6t7tN0mP9u.31Ne0PI0siAzEJM5lwK4cla4oQHpQbh7GUu', NULL, '2019-12-02 08:52:51', '2019-12-02 08:52:51'),
(5, 'Ахраменко Дмитрий', '426764', 0, '$2y$10$NghXjdHJSYi.6om6E/g5kuFVVwMrjoJdZX8Ewm5JQajWYwONz./oW', NULL, '2019-12-02 09:04:10', '2019-12-04 09:32:10'),
(6, 'Бараченя Мая', '109291', 1, '$2y$10$sp.WFaxlIY93teFsPqfD0ufDkNc0P6UkPhi8SgfhGprYaa0wEOoZ.', NULL, '2019-12-02 10:06:05', '2019-12-04 04:45:25'),
(7, 'Барышев Александр', '107683', 1, '$2y$10$lJnDvlPBZu9yOST7dKAnzOAo8DvQecl7HBod/qR25NoTIAP1Yh2rK', NULL, '2019-12-03 03:59:04', '2019-12-04 07:07:40');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `roles_users`
--
ALTER TABLE `roles_users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `roles_users_role_id_foreign` (`role_id`),
  ADD KEY `roles_users_user_id_foreign` (`user_id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT для таблицы `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT для таблицы `roles_users`
--
ALTER TABLE `roles_users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `roles_users`
--
ALTER TABLE `roles_users`
  ADD CONSTRAINT `roles_users_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`),
  ADD CONSTRAINT `roles_users_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
