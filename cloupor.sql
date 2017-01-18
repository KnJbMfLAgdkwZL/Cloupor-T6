-- phpMyAdmin SQL Dump
-- version 4.1.4
-- http://www.phpmyadmin.net
--
-- Хост: 127.0.0.1
-- Время создания: Дек 22 2014 г., 10:41
-- Версия сервера: 5.6.15-log
-- Версия PHP: 5.5.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- База данных: `cloupor`
--

-- --------------------------------------------------------

--
-- Структура таблицы `couriers`
--

CREATE TABLE IF NOT EXISTS `couriers` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `Name` varchar(255) NOT NULL,
  `Lastname` varchar(255) NOT NULL,
  `Support` int(11) NOT NULL,
  `DOB` int(10) unsigned NOT NULL,
  `Sex` tinyint(1) NOT NULL,
  `Street` varchar(255) NOT NULL,
  `Appartment` varchar(255) NOT NULL,
  `Zip` varchar(255) NOT NULL,
  `City` varchar(255) NOT NULL,
  `Country` varchar(255) NOT NULL,
  `DHL_Office` varchar(255) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `Skype_ICQ` varchar(255) NOT NULL,
  `Phone` varchar(255) NOT NULL,
  `Scan_ID` varchar(255) NOT NULL,
  `Scan_Registration` varchar(255) NOT NULL,
  `Scan_Agreement` varchar(255) NOT NULL,
  `Start_Date` int(10) unsigned NOT NULL,
  `Finish_Date` int(10) unsigned NOT NULL,
  `Pay_Comment` text NOT NULL,
  `Staff_Comment` text NOT NULL,
  `Status` tinyint(4) NOT NULL,
  PRIMARY KEY (`Id`),
  KEY `Support` (`Support`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=11 ;

--
-- Дамп данных таблицы `couriers`
--

INSERT INTO `couriers` (`Id`, `Name`, `Lastname`, `Support`, `DOB`, `Sex`, `Street`, `Appartment`, `Zip`, `City`, `Country`, `DHL_Office`, `Email`, `Skype_ICQ`, `Phone`, `Scan_ID`, `Scan_Registration`, `Scan_Agreement`, `Start_Date`, `Finish_Date`, `Pay_Comment`, `Staff_Comment`, `Status`) VALUES
(9, 'Новый', 'Тест', 19, 1417936800, 0, 'Ленина', '74', '753951', 'Киев', 'Украина', 'Нету', 'test@mail.ru', 'dfgfd', '12-34-56-78', 'http://cs406719.vk.me/v406719734/6bbf/Dtvj6MyldBQ.jpg', 'http://sl-gorod.ru/content/images/news/20.03.2012/propiska.jpg', 'http://kursk2009.ucoz.ru/kupiprodai_avto/osobye-uslovija_2.jpg', 1417936800, 1420010400, 'про', 'прорпо', 1),
(6, 'Виктор', 'Колпаков', 19, 648368400, 1, 'ул Пушкина', '36', '456789', 'Киев', 'Украина', 'дхл', 'test@mail.ru', 'testskype', '45-67-89', 'http://www.google.com/image1', 'www.google.com/image2', 'www.google.com/image3', 1414826400, 1420010400, 'fghgh', 'орпор', 0),
(5, 'Ваня', 'Ерохин', 19, 546934800, 1, 'pushkina', 'kolotushkina', '45568', 'Kiev', 'Ukraine', 'some dhl', 'dgdfgfdgfdt@gmail.com', 'iopipio', '21-59-58', 'www.google.com/image1', 'www.google.com/image2', 'www.google.com/image3', 1414826400, 1420010400, 'Пиу пиу', 'Иу иу иу', 1),
(8, 'Иван', 'Карасик', 19, 725786400, 1, 'ghjgh', 'ghjghjgh', 'ghjghj', 'jghj', 'ghjghj', 'jghjghj', 'jghjgh', 'jjh', '6768 67867', 'hjkhj', 'khjkjh', 'gbnb', 1404195600, 1420010400, 'kghjkhjkhk', 'hjkhj', 3),
(10, 'hgfh', 'gfhgfh', 28, 1417764000, 1, 'hkjhk', 'jhkhjk', 'hjkhjkhj', 'khjkhj', 'hjkjhk', 'hjkjhk', 'hjkhjk', 'jhkhjk', 'hjkhkjh', 'kjhkjhk', 'khjkhjk', 'jhkhkhj', 1417504800, 1419405600, 'hjkhjkh', 'jkhjk', 2);

-- --------------------------------------------------------

--
-- Структура таблицы `goods`
--

CREATE TABLE IF NOT EXISTS `goods` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `Merchandise` varchar(255) NOT NULL,
  `Price` double NOT NULL DEFAULT '0',
  `Count` int(11) NOT NULL DEFAULT '0',
  `Shop_link` varchar(255) NOT NULL,
  `PacksId` int(11) NOT NULL,
  PRIMARY KEY (`Id`),
  KEY `PacksId` (`PacksId`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=15 ;

--
-- Дамп данных таблицы `goods`
--

INSERT INTO `goods` (`Id`, `Merchandise`, `Price`, `Count`, `Shop_link`, `PacksId`) VALUES
(1, 'Планшет', 2, 3, 'www.sdfsd.ru', 36),
(2, 'Телефон', 4, 2, 'www.dfgdfgr.rt', 36),
(3, 'Автомобиль', 40, 2, 'www.fdg.rt', 36),
(4, 'ghfg', 6, 2, 'gfhgfh', 37),
(5, 'gfh', 5, 5, 'bjbm', 37),
(6, 'hjkhjk', 7, 7, 'hkhj', 38),
(7, 'hkjk', 7, 7, 'hkj', 38),
(8, 'fghfh', 5, 6, 'gng', 39),
(9, 'ghfh', 2, 3, 'gn', 39),
(10, 'vf', 4, 5, 'hfh', 40),
(11, 'про', 66, 1, 'прорпо', 43),
(12, 'тиь', 1, 7, 'итьтиь', 43),
(13, '67', 6, 6, '6', 44),
(14, 'hjk', 7, 7, 'hgm', 45);

-- --------------------------------------------------------

--
-- Структура таблицы `news`
--

CREATE TABLE IF NOT EXISTS `news` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `Header` text NOT NULL,
  `Body` text NOT NULL,
  `Date` date NOT NULL,
  `OnlyFor` int(11) NOT NULL,
  PRIMARY KEY (`Id`),
  KEY `OnlyFor` (`OnlyFor`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=12 ;

--
-- Дамп данных таблицы `news`
--

INSERT INTO `news` (`Id`, `Header`, `Body`, `Date`, `OnlyFor`) VALUES
(7, 'Стафер новости', 'Тело новости', '2014-12-15', 3),
(8, 'ццццц', 'иппро', '2014-12-15', 2),
(9, 'Функции PHP Функции обработки строк substr', 'Если length положительный, возвращаемая строка будет не длиннее length символов. Если длина строки string меньше или равна start символов, возвращается FALSE.\r\n\r\n\r\n Если length отрицательный, то будет отброшено указанное этим аргументом число символов с конца строки string. Если при этом позиция начала подстроки, определяемая аргументом start, находится в отброшенной части строки, возвращается пустая строка.\r\n\r\n', '2014-12-15', 2),
(10, 'Еще одна новость ', 'апрапрпа апрпа рапр ап рапр66515  пар аркцыздыфльвыьв ыа ыв ыва ыв а', '2014-12-15', 3),
(11, 'апрапр', 'апрапр', '2014-12-19', 3);

-- --------------------------------------------------------

--
-- Структура таблицы `newsshown`
--

CREATE TABLE IF NOT EXISTS `newsshown` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `IdNews` int(11) NOT NULL,
  `IdUsers` int(11) NOT NULL,
  PRIMARY KEY (`Id`),
  KEY `IdNews` (`IdNews`,`IdUsers`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=13 ;

--
-- Дамп данных таблицы `newsshown`
--

INSERT INTO `newsshown` (`Id`, `IdNews`, `IdUsers`) VALUES
(11, 11, 29),
(10, 11, 27);

-- --------------------------------------------------------

--
-- Структура таблицы `packs`
--

CREATE TABLE IF NOT EXISTS `packs` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `Date` date NOT NULL,
  `Courier` int(11) NOT NULL,
  `Staffer` int(11) NOT NULL,
  `Track` varchar(255) NOT NULL,
  `Comment` text,
  `Skup_reShip` varchar(255) DEFAULT NULL,
  `Summ` double NOT NULL,
  `Currency` varchar(255) NOT NULL,
  `Status` int(11) NOT NULL,
  PRIMARY KEY (`Id`),
  KEY `Courier` (`Courier`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=46 ;

--
-- Дамп данных таблицы `packs`
--

INSERT INTO `packs` (`Id`, `Date`, `Courier`, `Staffer`, `Track`, `Comment`, `Skup_reShip`, `Summ`, `Currency`, `Status`) VALUES
(1, '2014-12-11', 8, 27, 'DHL 32435362323', 'чемодан', '', 450, 'Rub', 2),
(28, '2014-12-16', 6, 27, 'hj76867hg', 'ghjhgj', '', 18, 'Usd', 0),
(37, '2014-12-10', 6, 27, 'gjh6hjh', 'hjhgj 565 fghgfh', '', 37, 'Usd', 0),
(4, '2014-12-15', 5, 27, 'DHL 324885362323', 'часы', '', 10, 'Usd', 5),
(5, '2014-12-07', 5, 27, 'DHL 3995362323', 'айфон', '', 20, 'Eur', 4),
(45, '2014-12-09', 9, 29, 'jklkj', 'kj', 'jklkjl', 49, 'Eur', 0),
(44, '2014-12-04', 10, 27, 'ghjghj', 'ghj', 'g', 36, 'Usd', 0),
(43, '2014-12-09', 6, 27, '56765ип', 'про', '', 73, 'Eur', 0),
(42, '2014-12-09', 6, 27, '56765ип', 'про', '', 73, 'Eur', 0),
(40, '2014-12-17', 6, 27, 'vcv', 'cvv', '', 20, 'Usd', 0),
(38, '2014-12-09', 5, 27, 'hjkhj', 'khjk', 'hjkh', 98, 'Usd', 0),
(39, '2014-12-18', 5, 27, 'fghgfh', 'fghgf', 'gfhfgh', 36, 'Usd', 0),
(36, '2014-12-31', 6, 27, 'кекуеfgfd456456', 'Чемодан', '', 94, 'Usd', 0),
(27, '2014-12-02', 5, 27, 'uykjhk6hkhjk', 'jhhjkjhk', '', 10, 'Rub', 0),
(32, '2014-12-10', 6, 27, '454прпар', 'лдждл', 'прпо', 20, 'Usd', 0),
(33, '2014-12-23', 5, 27, '56765hgjhgj678', 'hkhk', 'njml', 91, 'Usd', 0);

-- --------------------------------------------------------

--
-- Структура таблицы `skup`
--

CREATE TABLE IF NOT EXISTS `skup` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `Merchandise` text NOT NULL,
  `Comment` text NOT NULL,
  `No1` varchar(255) DEFAULT NULL,
  `No2` varchar(255) DEFAULT NULL,
  `No3` varchar(255) DEFAULT NULL,
  `Skupforever` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`Id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

--
-- Дамп данных таблицы `skup`
--

INSERT INTO `skup` (`Id`, `Merchandise`, `Comment`, `No1`, `No2`, `No3`, `Skupforever`) VALUES
(1, 'jgjhk', 'hjkhjk', '10', '15', '20', 1),
(2, 'mhj', 'kjhkjhk', '0', '0', '0', 0),
(3, 'qqq', 'qqq', '1', '1', '1', 0),
(4, 'ww', 'ww', '1', '2', '3', 0),
(5, 'aa', 'aa', '1', '1', '1', 1),
(6, 'ss', 'sss', '1', '2', '3', 1),
(7, 'апр', 'апрпа', '6', '34', '34', 1);

-- --------------------------------------------------------

--
-- Структура таблицы `staffercoriers`
--

CREATE TABLE IF NOT EXISTS `staffercoriers` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `IdStaffer` int(11) NOT NULL,
  `IdCoriers` int(11) NOT NULL,
  `Request` smallint(6) NOT NULL DEFAULT '0',
  PRIMARY KEY (`Id`),
  KEY `IdStaffer` (`IdStaffer`,`IdCoriers`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=13 ;

--
-- Дамп данных таблицы `staffercoriers`
--

INSERT INTO `staffercoriers` (`Id`, `IdStaffer`, `IdCoriers`, `Request`) VALUES
(1, 27, 5, 1),
(2, 27, 6, 1),
(8, 27, 9, 1),
(4, 26, 8, 1),
(7, 27, 8, 1),
(9, 27, 10, 1),
(10, 29, 9, 1),
(11, 29, 5, 0),
(12, 29, 10, 0);

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `Login` varchar(255) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `Reg_Date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `Role` int(11) NOT NULL,
  PRIMARY KEY (`Id`),
  UNIQUE KEY `Login` (`Login`),
  KEY `Role` (`Role`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=32 ;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`Id`, `Login`, `Password`, `Reg_Date`, `Role`) VALUES
(18, 'admin', '$2a$13$Do/D5kY7RaWY6KoZdjoa6OACV1nPQVABamUUGGAFXoYwcbBbeok4K', '2014-12-01 08:16:41', 1),
(19, 'Sup', '$2a$13$i4gAjkTVc9INTIFOMCa4/uNAALoQD8C3RQxyuBCFpjBoeXC/UZ.Uu', '2014-12-01 11:03:25', 2),
(29, 'newstuf', '$2a$13$2.s50k/EHxrBrYWjvYxtK.x6eUw/Q5VfEKkB2QpcYtsX3KNvK4DWy', '2014-12-19 02:40:30', 3),
(28, 'NewSup', '$2a$13$veld/omsvS7DxPvz14CReOCSYSstOuZJbJvBfBgISuLQnhpNZLwPi', '2014-12-19 02:26:28', 2),
(27, 'Stuf', '$2a$13$v86w5Nql4edZN2iN8RhrFeZGKa065KzUECcYX.i1vW5oC5njJ0g5O', '2014-12-06 19:33:20', 3);

-- --------------------------------------------------------

--
-- Структура таблицы `users_roles`
--

CREATE TABLE IF NOT EXISTS `users_roles` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `Name` varchar(255) NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Дамп данных таблицы `users_roles`
--

INSERT INTO `users_roles` (`Id`, `Name`) VALUES
(1, 'Admin'),
(2, 'Support'),
(3, 'Staffer');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
