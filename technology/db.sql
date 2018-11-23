
-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Хост: localhost
-- Время создания: Дек 29 2015 г., 13:50
-- Версия сервера: 10.0.20-MariaDB
-- Версия PHP: 5.2.17

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- База данных: `u588111476_155`
--

-- --------------------------------------------------------

--
-- Структура таблицы `db_admin`
--

CREATE TABLE IF NOT EXISTS `db_admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `login` varchar(55) NOT NULL,
  `password` varchar(55) NOT NULL,
  `qiwi` text NOT NULL,
  `pm` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=cp1251 AUTO_INCREMENT=2 ;

--
-- Дамп данных таблицы `db_admin`
--

INSERT INTO `db_admin` (`id`, `login`, `password`, `qiwi`, `pm`) VALUES
(1, 'admin', 'admin', '79671090004', '0');

-- --------------------------------------------------------

--
-- Структура таблицы `db_deposit`
--

CREATE TABLE IF NOT EXISTS `db_deposit` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `user_id` int(12) NOT NULL,
  `login` varchar(55) NOT NULL,
  `date_start` int(13) NOT NULL,
  `date_end` int(13) NOT NULL,
  `summa` float NOT NULL,
  `percent` float NOT NULL,
  `count` int(13) NOT NULL,
  `count_full` int(13) NOT NULL,
  `status` int(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=cp1251 AUTO_INCREMENT=8 ;

--
-- Дамп данных таблицы `db_deposit`
--

INSERT INTO `db_deposit` (`id`, `user_id`, `login`, `date_start`, `date_end`, `summa`, `percent`, `count`, `count_full`, `status`) VALUES
(1, 5, '', 1433281192, 1434046597, 500, 3, 7, 7, 1),
(2, 1, '', 1433356746, 1434368816, 150, 3, 7, 7, 1),
(3, 1, '', 1433356836, 1434394636, 150, 17.2857, 7, 7, 1),
(4, 6, '', 1433362073, 1434396689, 200, 3, 7, 7, 1),
(5, 6, '', 1433362505, 1434403937, 500, 3, 7, 7, 1),
(6, 1, '', 1433772825, 1434914300, 453, 3, 7, 7, 1),
(7, 1, '', 1434311670, 1434486949, 500, 100, 1, 1, 1);

-- --------------------------------------------------------

--
-- Структура таблицы `db_fac`
--

CREATE TABLE IF NOT EXISTS `db_fac` (
  `id` int(11) NOT NULL,
  `date` int(13) NOT NULL,
  `title` text CHARACTER SET cp1251 NOT NULL,
  `text` text CHARACTER SET cp1251 NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `db_insert`
--

CREATE TABLE IF NOT EXISTS `db_insert` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `login` varchar(55) NOT NULL,
  `user_id` int(13) NOT NULL,
  `summa` float NOT NULL,
  `date` int(13) NOT NULL,
  `status` int(1) NOT NULL,
  `purse` varchar(55) NOT NULL,
  `ps` int(55) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=cp1251 AUTO_INCREMENT=2 ;

--
-- Дамп данных таблицы `db_insert`
--

INSERT INTO `db_insert` (`id`, `login`, `user_id`, `summa`, `date`, `status`, `purse`, `ps`) VALUES
(1, 'demo', 1, 150, 1433356688, 1, '79158192517', 1);

-- --------------------------------------------------------

--
-- Структура таблицы `db_news`
--

CREATE TABLE IF NOT EXISTS `db_news` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date` int(13) NOT NULL,
  `title` text NOT NULL,
  `text` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=cp1251 AUTO_INCREMENT=4 ;

--
-- Дамп данных таблицы `db_news`
--

INSERT INTO `db_news` (`id`, `date`, `title`, `text`) VALUES
(3, 1450597005, '', '');

-- --------------------------------------------------------

--
-- Структура таблицы `db_pay`
--

CREATE TABLE IF NOT EXISTS `db_pay` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `summa` double NOT NULL,
  `user_id` int(10) NOT NULL,
  `login` varchar(55) NOT NULL,
  `date` int(13) NOT NULL,
  `status` int(1) NOT NULL,
  `code` text NOT NULL,
  `ps` int(55) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=cp1251 AUTO_INCREMENT=9 ;

--
-- Дамп данных таблицы `db_pay`
--

INSERT INTO `db_pay` (`id`, `summa`, `user_id`, `login`, `date`, `status`, `code`, `ps`) VALUES
(1, 1000, 5, 'wwwww ', 1433281123, 1, '20719720', 0),
(2, 100, 1, 'demo', 1433357665, 1, '12342314314231fef34444', 1),
(3, 100, 1, 'demo', 1433357965, 1, '12342314314231fef34444', 1),
(4, 200, 6, 'qqq', 1433361988, 1, '33333333333333333333333', 1),
(5, 500, 6, 'qqq', 1433362449, 1, '444444444444444444', 1),
(6, 34, 1, 'demo', 1433772872, 1, '423', 1),
(7, 4123, 1, 'demo', 1433772890, 1, '4215324', 1),
(8, 100, 10, '1435685914125', 1435725978, 1, '1435685896482', 1);

-- --------------------------------------------------------

--
-- Структура таблицы `db_reviews`
--

CREATE TABLE IF NOT EXISTS `db_reviews` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(55) NOT NULL,
  `date` int(11) NOT NULL,
  `text` text NOT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Структура таблицы `db_sender`
--

CREATE TABLE IF NOT EXISTS `db_sender` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `mess` text NOT NULL,
  `page` int(5) NOT NULL DEFAULT '0',
  `sended` int(7) NOT NULL DEFAULT '0',
  `status` int(1) NOT NULL DEFAULT '0',
  `date_add` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=cp1251 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Структура таблицы `db_stats`
--

CREATE TABLE IF NOT EXISTS `db_stats` (
  `id` int(1) NOT NULL AUTO_INCREMENT,
  `all_payments` float NOT NULL,
  `all_inserts` float NOT NULL,
  `all_users` int(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=cp1251 AUTO_INCREMENT=2 ;

--
-- Дамп данных таблицы `db_stats`
--

INSERT INTO `db_stats` (`id`, `all_payments`, `all_inserts`, `all_users`) VALUES
(1, 33333, 333, 20);

-- --------------------------------------------------------

--
-- Структура таблицы `db_users`
--

CREATE TABLE IF NOT EXISTS `db_users` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `login` varchar(55) CHARACTER SET cp1251 NOT NULL,
  `password` varchar(55) CHARACTER SET cp1251 NOT NULL,
  `ip` varchar(55) CHARACTER SET cp1251 NOT NULL,
  `email` varchar(55) CHARACTER SET cp1251 NOT NULL,
  `qiwi` varchar(55) CHARACTER SET cp1251 NOT NULL,
  `tel` varchar(55) CHARACTER SET cp1251 NOT NULL,
  `firstname` varchar(55) CHARACTER SET utf8 NOT NULL,
  `lastname` varchar(55) CHARACTER SET utf8 NOT NULL,
  `vk` varchar(55) CHARACTER SET cp1251 NOT NULL,
  `referer` varchar(10) CHARACTER SET cp1251 NOT NULL,
  `referer_id` int(11) NOT NULL,
  `referals` int(11) NOT NULL,
  `date_reg` int(11) NOT NULL,
  `date_login` int(11) NOT NULL,
  `banned` int(1) NOT NULL,
  `pm` varchar(55) CHARACTER SET cp1251 NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Дамп данных таблицы `db_users`
--

INSERT INTO `db_users` (`id`, `login`, `password`, `ip`, `email`, `qiwi`, `tel`, `firstname`, `lastname`, `vk`, `referer`, `referer_id`, `referals`, `date_reg`, `date_login`, `banned`, `pm`) VALUES
(1, 'demo', 'demo', '1540222017', 'demo@demo.ru', '', '', '', '', '', 'demo', 1, 12, 1367313062, 1448825981, 0, ''),
(2, 'SmartMonitor', 'K061099', '2147526606', 'kiryuha39rus@mail.ru', '', '', '', '', '', 'demo', 1, 0, 1429546957, 1429546974, 0, ''),
(3, 'falloman2', 'z123456', '2956901602', 'falloman2@gmail.com', '', '', '', '', '', 'demo', 1, 0, 1430557478, 1430557484, 0, ''),
(4, '12', '222', '1551873191', '121212@mail.ru', '', '', '', '', '', 'demo', 1, 0, 1430852981, 1430852994, 0, ''),
(5, 'wwwww ', 'wwwww', '1502959562', 'wwwww@mail.ru', '', '', '', '', '', 'demo', 1, 0, 1433281051, 1433281100, 0, ''),
(6, 'qqq', 'qqq', '1437536862', 'qqq@qqq.ru', '', '', '', '', '', 'demo', 1, 0, 1433361941, 1433361956, 0, ''),
(7, 'admin_lox', 'admin_lox', '1506541741', 'admin_lox@admin.lox', '', '', '', '', '', 'demo', 1, 0, 1433832402, 1433832408, 0, ''),
(8, 'tetibo1', '100-lohow', '783883245', 'paralohow@mail.ru', '', '', '', '', '', 'demo', 1, 0, 1434575008, 1434575018, 0, ''),
(9, 'salman21', 'madina', '1845236850', 'kingzsoft2690@gmail.com', '', '', '', '', '', 'demo', 1, 0, 1434575170, 0, 0, ''),
(10, '1435685914125', '1435685914125', '622680167', 'kzh0272@gmail.com', '', '', '', '', '', 'demo', 1, 0, 1435725795, 1435725898, 0, ''),
(11, 'jenek', '123', '1435247704', 'jenektb@gmail.com', '', '', '', '', '', 'demo', 1, 0, 1436395506, 1436395688, 0, ''),
(12, 'user01', '1234554321', '774320754', 'usus12@yandex.ru', '', '', '', '', '', 'demo', 1, 0, 1437326455, 1437326481, 0, '');

-- --------------------------------------------------------

--
-- Структура таблицы `db_users_ref`
--

CREATE TABLE IF NOT EXISTS `db_users_ref` (
  `id` int(11) NOT NULL,
  `login` varchar(10) NOT NULL,
  `money` float NOT NULL DEFAULT '0',
  `to_referer` float NOT NULL DEFAULT '0',
  `from_referals` float NOT NULL,
  `money_ban` float NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=cp1251;

--
-- Дамп данных таблицы `db_users_ref`
--

INSERT INTO `db_users_ref` (`id`, `login`, `money`, `to_referer`, `from_referals`, `money_ban`) VALUES
(1, 'demo', 4951.31, 187.95, 382.95, 1103.77),
(4, '12', 0, 0, 0, 0),
(3, 'falloman2', 0, 0, 0, 0),
(2, 'SmartMonit', 120, 15, 0, 0),
(5, 'wwwww ', 500, 75, 0, 105),
(6, 'qqq', 21, 105, 0, 126),
(7, 'admin_lox', 0, 0, 0, 0),
(8, 'tetibo1', 0, 0, 0, 0),
(9, 'salman21', 0, 0, 0, 0),
(10, '1435685914', 100, 0, 0, 0),
(11, 'jenek', 0, 0, 0, 0),
(12, 'user01', 0, 0, 0, 0);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
