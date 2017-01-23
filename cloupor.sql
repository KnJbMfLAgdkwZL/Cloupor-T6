-- phpMyAdmin SQL Dump
-- version 4.1.4
-- http://www.phpmyadmin.net
--
-- Хост: 127.0.0.1
-- Время создания: Дек 27 2014 г., 21:47
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
(9, 'Новый', 'Тест', 19, 1417936800, 0, 'Ленина', '74', '753951', 'Киев', 'Украина', 'Нету', 'test@mail.ru', 'dfgfd', '12-34-56-78', 'http://cs406719.vk.me/v406719734/6bbf/Dtvj6MyldBQ.jpg', 'http://sl-gorod.ru/content/images/news/20.03.2012/propiska.jpg', 'http://kursk2009.ucoz.ru/kupiprodai_avto/osobye-uslovija_2.jpg', 1417936800, 1420010400, 'про', 'пeqweqweqwe', 1),
(6, 'Виктор', 'Колпаков', 19, 648368400, 1, 'ул Пушкина', '36', '456789', 'Киев', 'Украина', 'дхл', 'test@mail.ru', 'testskype', '45-67-89', 'http://www.google.com/image1', 'www.google.com/image2', 'www.google.com/image3', 1414826400, 1420010400, 'fghgh', 'орпор', 0),
(5, 'Ваня', 'Ерохин', 19, 546934800, 1, 'pushkina', 'kolotushkina', '45568', 'Kiev', 'Ukraine', 'some dhl', 'dgdfgfdgfdt@gmail.com', 'iopipio', '21-59-58', 'www.google.com/image1', 'www.google.com/image2', 'www.google.com/image3', 1414826400, 1420010400, 'Пиу пиу', 'Иу иу иу', 1),
(8, 'Иван', 'Карасик', 19, 725786400, 1, 'ghjgh', 'ghjghjgh', 'ghjghj', 'jghj', 'ghjghj', 'jghjghj', 'jghjgh', 'jjh', '6768 67867', 'hjkhj', 'khjkjh', 'gbnb', 1404195600, 1420010400, 'kghjkhjkhk', 'hjkhj', 3),
(10, 'hgfh', 'gfhgfh', 28, 1417764000, 1, 'hkjhk', 'jhkhjk', 'hjkhjkhj', 'khjkhj', 'hjkjhk', 'hjkjhk', 'hjkhjk', 'jhkhjk', 'hjkhkjh', 'kjhkjhk', 'khjkhjk', 'jhkhkhj', 1417504800, 1419405600, 'hjkhjkh', 'jkhjk', 2);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
