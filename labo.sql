-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Apr 13, 2024 at 01:09 PM
-- Server version: 5.7.40
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `labo`
--

-- --------------------------------------------------------

--
-- Table structure for table `activity`
--

DROP TABLE IF EXISTS `activity`;
CREATE TABLE IF NOT EXISTS `activity` (
  `id_activity` int(11) NOT NULL AUTO_INCREMENT,
  `type_activity` varchar(50) NOT NULL,
  `niveau` int(11) DEFAULT NULL,
  `module` int(11) DEFAULT NULL,
  `sujet_trav` text,
  PRIMARY KEY (`id_activity`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `activity`
--

INSERT INTO `activity` (`id_activity`, `type_activity`, `niveau`, `module`, `sujet_trav`) VALUES
(3, 'عمل تطبيقي', 1, 1, NULL),
(2, 'عمل تطبيقي', 2, 2, 'cours d\'algebre super cool'),
(4, 'عمل تطبيقي', 1, 1, NULL),
(5, 'عمل تطبيقي', 1, 1, 'aaaaaaaaaaaa'),
(6, 'عمل تطبيقي', 1, 1, 'abc'),
(7, 'عمل تطبيقي', 1, 1, 'aaa'),
(8, 'عمل تطبيقي', 2, 2, 'lol'),
(9, 'عمل تطبيقي', 2, 2, 'la'),
(10, 'عمل تطبيقي', 1, 1, 'aaaaa'),
(11, 'عمل تطبيقي', 1, 1, 'z'),
(12, 'عمل تطبيقي', 1, 1, '&&&&&&&&');

-- --------------------------------------------------------

--
-- Table structure for table `bloc`
--

DROP TABLE IF EXISTS `bloc`;
CREATE TABLE IF NOT EXISTS `bloc` (
  `bloc_name` varchar(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `bloc`
--

INSERT INTO `bloc` (`bloc_name`) VALUES
('C');

-- --------------------------------------------------------

--
-- Table structure for table `chemical`
--

DROP TABLE IF EXISTS `chemical`;
CREATE TABLE IF NOT EXISTS `chemical` (
  `id_chemical` int(11) NOT NULL AUTO_INCREMENT,
  `name_chemical` text NOT NULL,
  `quantity` double NOT NULL,
  `unity` varchar(50) NOT NULL,
  PRIMARY KEY (`id_chemical`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `chemical`
--

INSERT INTO `chemical` (`id_chemical`, `name_chemical`, `quantity`, `unity`) VALUES
(3, 'H20', 990, 'ml'),
(4, 'CO2', 0, 'm3');

-- --------------------------------------------------------

--
-- Table structure for table `chemicals`
--

DROP TABLE IF EXISTS `chemicals`;
CREATE TABLE IF NOT EXISTS `chemicals` (
  `id_chemicals` int(11) NOT NULL AUTO_INCREMENT,
  `id_rapport` int(11) NOT NULL,
  `id_chemical` int(11) NOT NULL,
  `qty` double NOT NULL,
  `quantity_now` double NOT NULL,
  PRIMARY KEY (`id_chemicals`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `chemicals`
--

INSERT INTO `chemicals` (`id_chemicals`, `id_rapport`, `id_chemical`, `qty`, `quantity_now`) VALUES
(1, 12, 3, 2, 0),
(2, 12, 4, 1, 0),
(4, 16, 4, 50, 0);

-- --------------------------------------------------------

--
-- Table structure for table `labos`
--

DROP TABLE IF EXISTS `labos`;
CREATE TABLE IF NOT EXISTS `labos` (
  `id_labo` int(11) NOT NULL AUTO_INCREMENT,
  `name_labo` text NOT NULL,
  PRIMARY KEY (`id_labo`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `labos`
--

INSERT INTO `labos` (`id_labo`, `name_labo`) VALUES
(1, 'labo 1'),
(2, 'labo 2');

-- --------------------------------------------------------

--
-- Table structure for table `module`
--

DROP TABLE IF EXISTS `module`;
CREATE TABLE IF NOT EXISTS `module` (
  `id_module` int(11) NOT NULL AUTO_INCREMENT,
  `name_module` text NOT NULL,
  PRIMARY KEY (`id_module`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `module`
--

INSERT INTO `module` (`id_module`, `name_module`) VALUES
(1, 'Analyse'),
(2, 'Algebre');

-- --------------------------------------------------------

--
-- Table structure for table `niveau`
--

DROP TABLE IF EXISTS `niveau`;
CREATE TABLE IF NOT EXISTS `niveau` (
  `id_niveau` int(11) NOT NULL AUTO_INCREMENT,
  `name_niveau` text NOT NULL,
  PRIMARY KEY (`id_niveau`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `niveau`
--

INSERT INTO `niveau` (`id_niveau`, `name_niveau`) VALUES
(1, 'L1'),
(2, 'L2');

-- --------------------------------------------------------

--
-- Table structure for table `outils`
--

DROP TABLE IF EXISTS `outils`;
CREATE TABLE IF NOT EXISTS `outils` (
  `id_outils` int(11) NOT NULL AUTO_INCREMENT,
  `id_rapport` int(11) NOT NULL,
  `id_outil` int(11) NOT NULL,
  `type_outil` varchar(100) NOT NULL,
  `charge` varchar(100) NOT NULL,
  `state_av` varchar(100) NOT NULL,
  `avis` varchar(100) NOT NULL,
  `state_after` varchar(100) NOT NULL,
  PRIMARY KEY (`id_outils`)
) ENGINE=MyISAM AUTO_INCREMENT=18 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `outils`
--

INSERT INTO `outils` (`id_outils`, `id_rapport`, `id_outil`, `type_outil`, `charge`, `state_av`, `avis`, `state_after`) VALUES
(1, 11, 1, 'جهاز', 'تكفل داخلي', 'حالة جيدة', 'بدون تحفظ', 'بدون تحفظ'),
(2, 11, 1, 'جهاز', 'تكفل داخلي', 'حالة جيدة', 'بدون تحفظ', 'بدون تحفظ'),
(3, 11, 2, 'جهاز', 'تكفل داخلي', 'حالة جيدة', 'بدون تحفظ', 'بدون تحفظ'),
(4, 11, 2, 'جهاز', 'تكفل خارجي', 'حالة جيدة', 'بدون تحفظ', 'بدون تحفظ'),
(11, 12, 4, 'أداة', 'تكفل داخلي', 'حالة جيدة', 'بدون تحفظ', 'بدون تحفظ'),
(10, 12, 3, 'أداة', 'تكفل داخلي', 'حالة جيدة', 'بدون تحفظ', 'بدون تحفظ'),
(9, 12, 1, 'جهاز', 'تكفل داخلي', 'حالة جيدة', 'بدون تحفظ', 'بدون تحفظ'),
(17, 16, 3, 'أداة', 'تكفل داخلي', 'حالة جيدة', 'بدون تحفظ', 'بدون تحفظ'),
(16, 16, 1, 'جهاز', 'تكفل داخلي', 'حالة جيدة', 'بدون تحفظ', 'بدون تحفظ');

-- --------------------------------------------------------

--
-- Table structure for table `rapport`
--

DROP TABLE IF EXISTS `rapport`;
CREATE TABLE IF NOT EXISTS `rapport` (
  `id_rapport` int(11) NOT NULL AUTO_INCREMENT,
  `date` date NOT NULL,
  `time` varchar(50) NOT NULL,
  `labo` int(11) NOT NULL,
  `activite` int(11) NOT NULL,
  `ze_activity` varchar(100) NOT NULL,
  `engineer` varchar(10) NOT NULL,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`id_rapport`)
) ENGINE=MyISAM AUTO_INCREMENT=17 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `rapport`
--

INSERT INTO `rapport` (`id_rapport`, `date`, `time`, `labo`, `activite`, `ze_activity`, `engineer`, `user_id`) VALUES
(12, '2024-04-11', '11:00 - 12:30', 1, 10, 'نشاط بيداغوجي', 'all', 1),
(11, '2024-04-11', '14:00 - 15:30', 2, 11, 'نشاط بيداغوجي', '1', 1),
(16, '2024-04-11', '12:30 - 14:00', 1, 12, 'نشاط بيداغوجي', 'all', 1);

-- --------------------------------------------------------

--
-- Table structure for table `safe`
--

DROP TABLE IF EXISTS `safe`;
CREATE TABLE IF NOT EXISTS `safe` (
  `id` int(11) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `safe`
--

INSERT INTO `safe` (`id`, `password`) VALUES
(1, 'admin'),
(2, '0505'),
(46, '010203'),
(47, '456789'),
(48, '012345'),
(49, '2023'),
(50, '1989');

-- --------------------------------------------------------

--
-- Table structure for table `tools`
--

DROP TABLE IF EXISTS `tools`;
CREATE TABLE IF NOT EXISTS `tools` (
  `id_tool` int(11) NOT NULL AUTO_INCREMENT,
  `name_tool` varchar(50) NOT NULL,
  `type` varchar(50) NOT NULL,
  `state` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_tool`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tools`
--

INSERT INTO `tools` (`id_tool`, `name_tool`, `type`, `state`) VALUES
(1, 'حاسوب', 'جهاز', NULL),
(2, 'طابعة', 'جهاز', NULL),
(3, 'أنبوب', 'مادة', NULL),
(4, 'مسطرة', 'مادة', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `full_name` varchar(255) NOT NULL,
  `position` varchar(255) DEFAULT NULL,
  `service` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `photo` text,
  `chapitre` text,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=MyISAM AUTO_INCREMENT=51 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `full_name`, `position`, `service`, `password`, `photo`, `chapitre`) VALUES
(1, 'admin', 'Ingenieur 0123', 'Admin', 'Ingenieur', '$2y$10$QUvbulG1G1XJbKL9SznJD.Lz.gVdoXaKPWtqVCnSHztVnoW0mcqZ.', 'uploads/users/1_user_avatar.jpg', NULL),
(2, 'mehdi', 'Mehdi', 'Employé', 'Chef des Labos', '$2y$10$4HZ1pVMOEwe9ilvNpc0Xx.bZY106oa1CdqThqJLodCldccQQZVxAG', 'uploads/users/1_user_avatar.jpg', '622,302-089-002'),
(50, 'raouf', 'Raouf', 'Employé', 'Ingenieur', '$2y$10$UCmq1DgifkvBCgV91YCm1ODbPWjcsr.KS30H7jDfwbbexG58dSD.W', 'img/user_avatar.jpg', NULL);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
