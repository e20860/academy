-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Хост: localhost
-- Время создания: Янв 31 2019 г., 02:50
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
-- Структура таблицы `profteach`
--

CREATE TABLE `profteach` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `img` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `profteach`
--

INSERT INTO `profteach` (`id`, `name`, `subject`, `img`) VALUES
(1, 'Гусак В.В.', 'УПД', 'gusak.jpg'),
(2, 'Барабанов В.В.', 'Управление войсками', 'barabanov.jpg'),
(3, 'Кобылин Ю.В.', 'Стрельба и управление огнём', 'kobylin.jpg'),
(4, 'Гарасюк В.В.', 'Тактика', 'garasyuk.jpg'),
(5, 'Никонов Н.П.', '', 'nikonov.jpg'),
(6, 'Горохов М.Е.', '', 'gorokhov.jpg'),
(7, 'Савелов Е.М.', '', 'savelov.jpg'),
(8, 'Ячкула Н.И.', '', 'yatchkula.jpg'),
(9, 'Черепнин В.И.', '', 'tcherepnin.jpg'),
(10, 'Лучанинов М.П.', 'Стрельба и управление огнём', 'luchaninov.jpg'),
(11, 'Фомин А.С.', '', 'fomin.jpg'),
(12, 'Рагулин А.П.', 'Управление войсками', 'ragulin.jpg'),
(13, 'Костюков В.И.', '', 'kostyukov.jpg'),
(14, 'Гинюк Л.В.', '', 'ginyuk.jpg'),
(15, 'Солёнов Ю.А.', '', 'solenov.jpg'),
(16, 'Косов А.Ф.', '', 'kosov.jpg'),
(17, 'Борисов О.П.', '', 'borisov.jpg'),
(18, 'Маврин А.С.', 'Стрельба и управление огнём', 'mavrin.jpg'),
(19, 'Стрелков П.В.', 'Физическая подготовка', 'strelkov.jpg'),
(20, 'Петрович В.И.', '', 'petrovich.jpg');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `profteach`
--
ALTER TABLE `profteach`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `profteach`
--
ALTER TABLE `profteach`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
