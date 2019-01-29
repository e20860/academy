-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Хост: localhost
-- Время создания: Янв 24 2019 г., 02:19
-- Версия сервера: 8.0.13
-- Версия PHP: 7.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `maa94`
--

-- --------------------------------------------------------

--
-- Структура таблицы `achievs`
--

CREATE TABLE `achievs` (
  `id` int(10) UNSIGNED NOT NULL,
  `graduates_locals_id` int(10) UNSIGNED NOT NULL,
  `graduates_id` int(10) UNSIGNED NOT NULL,
  `descr` varchar(255) NOT NULL,
  `acv_types_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `acv_types`
--

CREATE TABLE `acv_types` (
  `id` int(10) UNSIGNED NOT NULL,
  `ord` tinyint(3) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `acv_types`
--

INSERT INTO `acv_types` (`id`, `ord`, `name`) VALUES
(1, 1, 'Герои Российской Федерации'),
(2, 2, 'Имеют генеральские звания'),
(3, 3, 'Закончили академию ГШ'),
(4, 4, 'Имеют учёные степени');

-- --------------------------------------------------------

--
-- Структура таблицы `cnt_types`
--

CREATE TABLE `cnt_types` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `cnt_types`
--

INSERT INTO `cnt_types` (`id`, `name`) VALUES
(1, 'Мобильный'),
(2, 'Домашний'),
(3, 'email'),
(4, 'skype'),
(5, 'сайт'),
(6, 'WhatsApp');

-- --------------------------------------------------------

--
-- Структура таблицы `contacts`
--

CREATE TABLE `contacts` (
  `id` int(10) UNSIGNED NOT NULL,
  `graduates_locals_id` int(10) UNSIGNED NOT NULL,
  `cnt_types_id` int(10) UNSIGNED NOT NULL,
  `graduates_id` int(10) UNSIGNED NOT NULL,
  `cont_info` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `galleries`
--

CREATE TABLE `galleries` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `units_id` int(10) UNSIGNED NOT NULL,
  `ord` tinyint(3) UNSIGNED NOT NULL,
  `desct` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `galleries`
--

INSERT INTO `galleries` (`id`, `name`, `units_id`, `ord`, `desct`) VALUES
(1, 'Галерея 10 отделения', 1, 1, 'Сказать нечего - красавцы'),
(2, 'Галерея 11 отделения', 2, 2, 'Сказать нечего - красавцы'),
(3, 'Галерея 12 отделения', 3, 3, 'Сказать нечего - красавцы'),
(4, 'Галерея 13 отделения', 4, 4, 'Сказать нечего - красавцы'),
(5, 'Галерея 14 отделения', 5, 5, 'Сказать нечего - красавцы'),
(6, 'Галерея 15 отделения', 6, 6, 'Сказать нечего - красавцы'),
(7, 'Галерея 16 отделения', 7, 7, 'Сказать нечего - красавцы'),
(8, 'Галерея 17 отделения', 8, 8, 'Сказать нечего - красавцы'),
(9, 'Галерея 18 отделения', 9, 9, 'Сказать нечего - красавцы'),
(10, 'Галерея 19 отделения', 10, 10, 'Сказать нечего - красавцы'),
(11, 'Галерея 20 отделения', 11, 11, 'Сказать нечего - красавцы');

-- --------------------------------------------------------

--
-- Структура таблицы `gal_imgs`
--

CREATE TABLE `gal_imgs` (
  `id` int(10) UNSIGNED NOT NULL,
  `galleries_id` int(10) UNSIGNED NOT NULL,
  `img` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `graduates`
--

CREATE TABLE `graduates` (
  `id` int(10) UNSIGNED NOT NULL,
  `units_id` int(10) UNSIGNED NOT NULL,
  `fam` varchar(30) NOT NULL,
  `nam` varchar(30) NOT NULL,
  `sur` varchar(30) NOT NULL,
  `photo1` varchar(255) NOT NULL,
  `photo2` varchar(255) NOT NULL,
  `info` text NOT NULL,
  `rip` tinyint(3) UNSIGNED NOT NULL,
  `locals_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `locals`
--

CREATE TABLE `locals` (
  `id` int(10) UNSIGNED NOT NULL,
  `country` char(10) NOT NULL,
  `town` varchar(30) NOT NULL,
  `crd` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `locals`
--

INSERT INTO `locals` (`id`, `country`, `town`, `crd`) VALUES
(1, 'Россия', 'Москва', '55.76,37.61'),
(2, 'Россия', 'Cанкт-Петербург', '59.94,30.32'),
(3, 'Россия', 'Тверь', '56.86,35.92'),
(4, 'Россия', 'Екатеринбург', '56.84,60.60'),
(5, 'Россия', 'Новосибирск', '55.06,82.92'),
(6, 'Россия', 'Абакан', '53.72,91.45'),
(7, 'Украина', 'Киев', '50.44,30.52'),
(8, 'Россия', 'Балашиха', '55.79,37.93'),
(9, 'Украина', 'Одесса', '46.48,30.73'),
(10, 'Украина', 'Запорожье', '47.83,35.14'),
(11, 'Украина', 'Хмельницкий', '49.41,26.97'),
(12, 'Россия', 'Выборг', '60.71,28.74'),
(13, 'Россия', 'Гатчина', '59.56,30.12'),
(14, 'Россия', 'Бийск', '52.53,85.21'),
(15, 'Белоруссия', 'Минск', '53.89,27.56'),
(16, 'Россия', 'Анапа', '44.89,37.31'),
(17, 'Россия', 'Коломна', '55.10,38.75'),
(18, 'Россия', 'Воронеж', '51.65,39.20'),
(19, 'Украина', 'Кривой рог', '47.90,33.38'),
(20, 'Россия', 'Ростов на Дону', '47.22,39.72'),
(21, 'Россия', 'Краснодар', '45.03,38.98'),
(22, 'Россия', 'Омск', '54.98,73.37'),
(23, 'Россия', 'Хабаровск', '48.48,135.08'),
(24, 'Россия', 'Нахабино', '55.84,37.18'),
(25, 'Россия', 'Красногорск', '55.82,37.31'),
(26, 'Россия', 'Казань', '55.81,49.11'),
(27, 'Россия', 'Сочи', '43.58,39.72'),
(28, 'Россия', 'Мулино', '56.31,42.94'),
(29, 'Россия', 'Смоленск', '54.77,32.06'),
(30, 'Россия', 'Чайковский', '56.76,54.15'),
(31, 'Россия', 'Липецк', '52.60,39.59'),
(32, 'Россия', 'Суджа', '51.18,35.26'),
(33, 'Россия', 'Челябинск', '55.15,61.40'),
(34, 'Белоруссия', 'Бобруйск', '53.13,29.22'),
(35, 'Россия', 'Саратов', '51.53,46.03'),
(36, 'Белоруссия', 'Борисов', '54.22,28.51'),
(37, 'Россия', 'Орел', '52.96,36.06'),
(38, 'Россия', 'Нижний Новгород', '56.32,44.00'),
(39, 'Россия', 'Солнечногорс', '56.18,36.97'),
(40, 'Россия', 'Курск', '51.72,36.19'),
(41, 'Россия', 'Симферополь', '44.97,34.10'),
(42, 'Россия', 'Чита', '52.02,113.49'),
(43, 'Россия', 'Самара', '53.19,50.11'),
(44, 'Россия', 'Тюмень', '57.14,65.53'),
(45, 'Россия', 'Чебаркуль', '54.97,60.37'),
(46, 'Россия', 'Тольятти', '53.50,49.43'),
(47, 'Россия', 'Феодосия', '45.03,35.38');

-- --------------------------------------------------------

--
-- Структура таблицы `menu`
--

CREATE TABLE `menu` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `link` varchar(255) NOT NULL,
  `parent` tinyint(3) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `menu`
--

INSERT INTO `menu` (`id`, `name`, `link`, `parent`) VALUES
(1, 'Главная', 'site/index', 0),
(2, 'Руководство', '#', 0),
(3, 'Отделения', '#', 0),
(4, 'Статистика', '#', 0),
(5, 'Мультимедиа', '#', 0),
(6, 'О сайте', 'site/about', 0),
(7, 'Регистрация', 'site/contact', 0),
(8, 'Вход', 'site/login', 0),
(9, 'Академии', 'management/top', 2),
(10, 'Факультета', '/management/faculty', 2),
(11, 'Преподаватели', '/management/profteach', 2),
(12, '10 учебное отделение', 'test/menu', 3),
(13, '11 учебное отделение', 'site/index', 3),
(14, '12 учебное отделение', 'site/index', 3),
(15, '13 учебное отделение', 'site/index', 3),
(16, '14 учебное отделение', 'site/index', 3),
(17, '15 учебное отделение', 'site/index', 3),
(18, '16 учебное отделение', 'site/index', 3),
(19, '17 учебное отделение', 'site/index', 3),
(20, '18 учебное отделение', 'site/index', 3),
(21, '19 учебное отделение', 'site/index', 3),
(22, 'Достижения', 'site/index', 4),
(23, 'География', 'site/index', 4),
(24, 'Цифры', 'site/index', 4),
(25, 'Ушедшие', 'site/index', 4),
(26, 'Старые фото', 'site/index', 5),
(27, 'Галерея встречи', 'site/index', 5),
(28, 'Видеоматериалы', 'site/index', 5);

-- --------------------------------------------------------

--
-- Структура таблицы `units`
--

CREATE TABLE `units` (
  `id` int(10) UNSIGNED NOT NULL,
  `ord` tinyint(3) UNSIGNED NOT NULL,
  `name` varchar(30) NOT NULL,
  `descr` text NOT NULL,
  `commander` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `units`
--

INSERT INTO `units` (`id`, `ord`, `name`, `descr`, `commander`) VALUES
(1, 1, '10 учебное отделение', 'Первое отделение на курсе', 0),
(2, 2, '11 учебное отделение', 'Второе отделение на курсе', 0),
(3, 3, '12 учебное отделение', 'Третье отделение на курсе', 0),
(4, 4, '13 учебное отделение', 'Четвёртое отделение на курсе', 0),
(5, 5, '14 учебное отделение', 'Пятое отделение на курсе', 0),
(6, 6, '15 учебное отделение', 'Шестое отделение на курсе', 0),
(7, 7, '16 учебное отделение', 'Седьмое отделение на курсе', 0),
(8, 8, '17 учебное отделение', 'Восьмое отделение на курсе', 0),
(9, 9, '18 учебное отделение', 'Девятое отделение на курсе', 0),
(10, 10, '19 УО (Ракетчики)', 'Не совсем артиллеристы', 0),
(11, 11, '20 УО (Разведчики)', 'Вообще с другого курса (приблудные)', 0);

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `graduates_locals_id` int(10) UNSIGNED NOT NULL,
  `graduates_id` int(10) UNSIGNED NOT NULL,
  `login` varchar(30) NOT NULL,
  `pass` varchar(255) NOT NULL,
  `rights` tinyint(3) UNSIGNED NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `video`
--

CREATE TABLE `video` (
  `id` int(10) UNSIGNED NOT NULL,
  `ord` tinyint(3) UNSIGNED NOT NULL,
  `descr` text NOT NULL,
  `link` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `achievs`
--
ALTER TABLE `achievs`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `acv_types`
--
ALTER TABLE `acv_types`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `cnt_types`
--
ALTER TABLE `cnt_types`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `galleries`
--
ALTER TABLE `galleries`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `gal_imgs`
--
ALTER TABLE `gal_imgs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `gal_imgs_FKIndex1` (`galleries_id`);

--
-- Индексы таблицы `graduates`
--
ALTER TABLE `graduates`
  ADD PRIMARY KEY (`id`),
  ADD KEY `graduates_FKIndex1` (`units_id`),
  ADD KEY `graduates_FKIndex3` (`locals_id`);

--
-- Индексы таблицы `locals`
--
ALTER TABLE `locals`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `units`
--
ALTER TABLE `units`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `video`
--
ALTER TABLE `video`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `acv_types`
--
ALTER TABLE `acv_types`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT для таблицы `cnt_types`
--
ALTER TABLE `cnt_types`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT для таблицы `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `galleries`
--
ALTER TABLE `galleries`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT для таблицы `gal_imgs`
--
ALTER TABLE `gal_imgs`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `graduates`
--
ALTER TABLE `graduates`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `locals`
--
ALTER TABLE `locals`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT для таблицы `menu`
--
ALTER TABLE `menu`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT для таблицы `units`
--
ALTER TABLE `units`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `video`
--
ALTER TABLE `video`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `gal_imgs`
--
ALTER TABLE `gal_imgs`
  ADD CONSTRAINT `gal_imgs_ibfk_1` FOREIGN KEY (`galleries_id`) REFERENCES `galleries` (`id`);

--
-- Ограничения внешнего ключа таблицы `graduates`
--
ALTER TABLE `graduates`
  ADD CONSTRAINT `graduates_ibfk_1` FOREIGN KEY (`units_id`) REFERENCES `units` (`id`),
  ADD CONSTRAINT `graduates_ibfk_3` FOREIGN KEY (`locals_id`) REFERENCES `locals` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
