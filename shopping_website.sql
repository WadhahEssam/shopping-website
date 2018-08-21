-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- المزود: 127.0.0.1
-- أنشئ في: 02 ديسمبر 2017 الساعة 07:01
-- إصدارة المزود: 5.5.57-0ubuntu0.14.04.1
-- PHP إصدارة: 5.5.9-1ubuntu4.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- قاعدة البيانات: `shopping_website`
--

-- --------------------------------------------------------

--
-- بنية الجدول `COMMENT`
--

CREATE TABLE IF NOT EXISTS `COMMENT` (
  `ITEM_ID` int(5) NOT NULL,
  `TEXT` varchar(128) NOT NULL,
  `STARS` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- بنية الجدول `ITEM`
--

CREATE TABLE IF NOT EXISTS `ITEM` (
  `ID` int(5) NOT NULL AUTO_INCREMENT,
  `PRICE` double(10,3) DEFAULT NULL,
  `DESCRIPTION` varchar(200) DEFAULT NULL,
  `IMAGE` varchar(128) DEFAULT NULL,
  `USER_ID` int(5) DEFAULT NULL,
  `RATING` int(1) DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- بنية الجدول `NOTIFICATION`
--

CREATE TABLE IF NOT EXISTS `NOTIFICATION` (
  `USER_ID` int(5) NOT NULL,
  `ITEM_ID` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- بنية الجدول `REQUESTED_ITEM`
--

CREATE TABLE IF NOT EXISTS `REQUESTED_ITEM` (
  `ITEM` varchar(128) NOT NULL,
  `USER_ID` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- بنية الجدول `USER`
--

CREATE TABLE IF NOT EXISTS `USER` (
  `ID` int(5) NOT NULL AUTO_INCREMENT,
  `USERNAME` varchar(123) DEFAULT NULL,
  `EMAIL` varchar(128) DEFAULT NULL,
  `PASSWORD` varchar(128) DEFAULT NULL,
  `PHONE_NUMBER` varchar(20) DEFAULT NULL,
  `PROFILE_PICTURE` varchar(128) NOT NULL,
  `NOTIFICATION` tinyint(4) DEFAULT NULL,
  PRIMARY KEY (`ID`),
  UNIQUE KEY `EMAIL` (`EMAIL`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- إرجاع أو استيراد بيانات الجدول `USER`
--

INSERT INTO `USER` (`ID`, `USERNAME`, `EMAIL`, `PASSWORD`, `PHONE_NUMBER`, `PROFILE_PICTURE`, `NOTIFICATION`) VALUES
(1, 'kytyzov', 'w@w.w', 'd0970714757783e6cf17b26fb8e2298f', '888', 'imgs/example.jpg', 0),
(2, 'Wadhah Essam', 'wadah-wleed@hotmail.com', 'd0970714757783e6cf17b26fb8e2298f', '0551292881', 'images/example.jpg', 1),
(3, 'zogif', 'a@a.a', 'd0970714757783e6cf17b26fb8e2298f', '0551292881', 'images/example.jpg', 0),
(6, 'wadahwleed21', 'm@m.m', 'd0970714757783e6cf17b26fb8e2298f', '0652626', 'images/example.jpg', 0),
(7, 'wadahesamhaider', 'e@e.e', 'd0970714757783e6cf17b26fb8e2298f', '0551292881', 'images/example.jpg', 1);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
