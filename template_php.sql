-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Nov 26, 2022 at 09:20 PM
-- Server version: 5.7.36
-- PHP Version: 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `template_php`
--
CREATE DATABASE IF NOT EXISTS `template_php` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `template_php`;

-- --------------------------------------------------------

--
-- Table structure for table `content`
--

DROP TABLE IF EXISTS `content`;
CREATE TABLE IF NOT EXISTS `content` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `category` varchar(255) NOT NULL,
  `content` text,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `content`
--

INSERT INTO `content` (`id`, `category`, `content`) VALUES
(1, 'test', NULL),
(2, 'test', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `link`
--

DROP TABLE IF EXISTS `link`;
CREATE TABLE IF NOT EXISTS `link` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `link` varchar(255) NOT NULL,
  `type` varchar(20) DEFAULT 'interne',
  `link_group_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `link`
--

INSERT INTO `link` (`id`, `name`, `link`, `type`, `link_group_id`) VALUES
(1, 'home', 'home', 'interne', 1),
(2, 'page erreur', 'error', 'interne', 1),
(3, 'more infos', 'https://www.w3schools.com/', 'external', 1),
(4, 'article', 'article/test_1/1', 'interne', 1);

-- --------------------------------------------------------

--
-- Table structure for table `link_group`
--

DROP TABLE IF EXISTS `link_group`;
CREATE TABLE IF NOT EXISTS `link_group` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `link_group`
--

INSERT INTO `link_group` (`id`, `name`) VALUES
(1, 'main navigation');

-- --------------------------------------------------------

--
-- Table structure for table `route`
--

DROP TABLE IF EXISTS `route`;
CREATE TABLE IF NOT EXISTS `route` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `params` varchar(255) DEFAULT NULL,
  `page_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `route`
--

INSERT INTO `route` (`id`, `name`, `params`, `page_id`) VALUES
(1, '', NULL, 1),
(2, 'home', NULL, 1),
(3, 'error', NULL, 2),
(4, 'article', 'contentCategory/articleAategory/articleId', 3);

-- --------------------------------------------------------

--
-- Table structure for table `template_page`
--

DROP TABLE IF EXISTS `template_page`;
CREATE TABLE IF NOT EXISTS `template_page` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `header` int(11) DEFAULT NULL,
  `footer` int(11) DEFAULT NULL,
  `template` int(11) DEFAULT NULL,
  `worker` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `template_page`
--

INSERT INTO `template_page` (`id`, `name`, `header`, `footer`, `template`, `worker`) VALUES
(1, 'home', 1, 2, 3, 4),
(2, 'error', 1, 2, 8, NULL),
(3, 'article', 1, 2, 6, 7);

-- --------------------------------------------------------

--
-- Table structure for table `template_page_tag`
--

DROP TABLE IF EXISTS `template_page_tag`;
CREATE TABLE IF NOT EXISTS `template_page_tag` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  `value` varchar(255) DEFAULT NULL,
  `page_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `template_page_tag`
--

INSERT INTO `template_page_tag` (`id`, `name`, `value`, `page_id`) VALUES
(1, 'description', 'Ceci est une 1er description', 1),
(2, 'title', 'Accueil', 1),
(3, 'style', '5', 1),
(4, 'title', '404 ERROR', 2),
(5, 'description', 'Ceci est une 1er description', 3),
(6, 'title', 'article', 3);

-- --------------------------------------------------------

--
-- Table structure for table `template_part`
--

DROP TABLE IF EXISTS `template_part`;
CREATE TABLE IF NOT EXISTS `template_part` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type` varchar(50) NOT NULL,
  `name` varchar(20) NOT NULL,
  `path` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `template_part`
--

INSERT INTO `template_part` (`id`, `type`, `name`, `path`) VALUES
(1, 'template', 'defaultHeader', '/partials/header.php'),
(2, 'template', 'defaultFooter', '/partials/footer.php'),
(3, 'template', 'home', '/pages/home.php'),
(4, 'worker', 'home', '/home.php'),
(5, 'style', 'home', '/component/home.css'),
(6, 'template', 'article', '/pages/article.php'),
(7, 'worker', 'home', '/article.php'),
(8, 'template', 'article', '/pages/404.php');

-- --------------------------------------------------------

--
-- Table structure for table `test_article`
--

DROP TABLE IF EXISTS `test_article`;
CREATE TABLE IF NOT EXISTS `test_article` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `category` varchar(255) DEFAULT NULL,
  `title` varchar(255) NOT NULL,
  `content` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `test_article`
--

INSERT INTO `test_article` (`id`, `category`, `title`, `content`) VALUES
(1, 'test_1', 'test 1', 'test testestse tset wetest sdgverfvcxvdfvdfxc vx dcvcvfd'),
(2, 'test_2', 'test 2', 'test testestse tset wetest sdgverfvcxvdfvdfxc vx dcvcvfd');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
