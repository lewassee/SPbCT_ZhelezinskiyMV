-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Хост: 127.0.0.1
-- Время создания: Дек 05 2022 г., 21:02
-- Версия сервера: 5.5.25
-- Версия PHP: 5.2.12

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- База данных: `statsnew`
--

-- --------------------------------------------------------

--
-- Структура таблицы `visits`
--

CREATE TABLE IF NOT EXISTS `visits` (
  `visit_id` int(12) NOT NULL AUTO_INCREMENT,
  `date` date NOT NULL,
  `hosts` char(20) NOT NULL,
  `pages` char(20) NOT NULL,
  `views` int(11) NOT NULL,
  `client_system` varchar(250) NOT NULL COMMENT 'Данные системы посетителя',
  KEY `visit_id` (`visit_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9 ;

--
-- Дамп данных таблицы `visits`
--

INSERT INTO `visits` (`visit_id`, `date`, `hosts`, `pages`, `views`, `client_system`) VALUES
(1, '2022-12-03', '127.0.0.1', 'index.php', 9, 'Mozilla/5.0 (Windows NT 6.3; Win64; x64; rv:107.0) Gecko/20100101 Firefox/107.0'),
(2, '2022-12-03', '127.0.0.1', 'About', 4, 'Mozilla/5.0 (Windows NT 6.3; Win64; x64; rv:107.0) Gecko/20100101 Firefox/107.0'),
(3, '2022-12-03', '127.0.0.1', 'Products.php', 5, 'Mozilla/5.0 (Windows NT 6.3; Win64; x64; rv:107.0) Gecko/20100101 Firefox/107.0'),
(4, '2022-12-03', '127.0.0.1', 'Service.php', 6, 'Mozilla/5.0 (Windows NT 6.3; Win64; x64; rv:107.0) Gecko/20100101 Firefox/107.0'),
(5, '2022-12-05', '127.0.0.1', 'index.php', 6, 'Mozilla/5.0 (Windows NT 6.3; Win64; x64; rv:107.0) Gecko/20100101 Firefox/107.0'),
(6, '2022-12-05', '127.0.0.1', 'Products.php', 3, 'Mozilla/5.0 (Windows NT 6.3; Win64; x64; rv:107.0) Gecko/20100101 Firefox/107.0'),
(7, '2022-12-05', '127.0.0.1', 'About', 2, 'Mozilla/5.0 (Windows NT 6.3; Win64; x64; rv:107.0) Gecko/20100101 Firefox/107.0'),
(8, '2022-12-05', '127.0.0.1', 'Service.php', 2, 'Mozilla/5.0 (Windows NT 6.3; Win64; x64; rv:107.0) Gecko/20100101 Firefox/107.0');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
