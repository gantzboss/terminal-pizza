-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Окт 24 2021 г., 21:25
-- Версия сервера: 5.7.31
-- Версия PHP: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `maksim_terminal_pizza`
--

-- --------------------------------------------------------

--
-- Структура таблицы `orders`
--

DROP TABLE IF EXISTS `orders`;
CREATE TABLE IF NOT EXISTS `orders` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_pizza` int(11) NOT NULL,
  `id_size_pizza` int(11) NOT NULL,
  `id_sauces` int(11) DEFAULT NULL,
  `date_order` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `price_order` float DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id_pizza` (`id_pizza`),
  KEY `id_size_pizza` (`id_size_pizza`),
  KEY `id_sauces` (`id_sauces`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `orders`
--

INSERT INTO `orders` (`id`, `id_pizza`, `id_size_pizza`, `id_sauces`, `date_order`, `price_order`) VALUES
(1, 3, 2, 1, '2021-10-22 20:32:38', NULL),
(2, 1, 3, 3, '2021-10-22 20:32:38', NULL),
(3, 3, 2, 4, '2021-10-22 20:33:46', NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `pizza`
--

DROP TABLE IF EXISTS `pizza`;
CREATE TABLE IF NOT EXISTS `pizza` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(25) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `pizza`
--

INSERT INTO `pizza` (`id`, `name`, `price`) VALUES
(1, 'Пепперони', '25.00'),
(2, 'Деревенская', '19.00'),
(3, 'Гавайская', '21.00'),
(4, 'Грибная', '27.12');

-- --------------------------------------------------------

--
-- Структура таблицы `sauces`
--

DROP TABLE IF EXISTS `sauces`;
CREATE TABLE IF NOT EXISTS `sauces` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(25) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `sauces`
--

INSERT INTO `sauces` (`id`, `name`, `price`) VALUES
(1, 'сырный', '3.32'),
(2, 'кисло-сладкий', '2.50'),
(3, 'чесночный', '2.10'),
(4, 'барбекю', '4.00');

-- --------------------------------------------------------

--
-- Структура таблицы `size_pizza`
--

DROP TABLE IF EXISTS `size_pizza`;
CREATE TABLE IF NOT EXISTS `size_pizza` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `size` int(11) NOT NULL,
  `factor` decimal(10,2) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `size` (`size`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `size_pizza`
--

INSERT INTO `size_pizza` (`id`, `size`, `factor`) VALUES
(1, 21, '1.00'),
(2, 26, '1.25'),
(3, 31, '1.50'),
(4, 45, '2.50');

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`id_pizza`) REFERENCES `pizza` (`id`),
  ADD CONSTRAINT `orders_ibfk_2` FOREIGN KEY (`id_size_pizza`) REFERENCES `size_pizza` (`id`),
  ADD CONSTRAINT `orders_ibfk_3` FOREIGN KEY (`id_sauces`) REFERENCES `sauces` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
