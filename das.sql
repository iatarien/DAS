-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Apr 21, 2024 at 07:00 PM
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
-- Database: `das`
--

-- --------------------------------------------------------

--
-- Table structure for table `company`
--

DROP TABLE IF EXISTS `company`;
CREATE TABLE IF NOT EXISTS `company` (
  `id_comp` int(1) NOT NULL AUTO_INCREMENT,
  `ville` varchar(50) NOT NULL,
  `ville_fr` varchar(50) NOT NULL,
  `ministere` varchar(50) NOT NULL,
  `ministere_fr` varchar(100) NOT NULL,
  `direction` varchar(50) NOT NULL,
  `direction_fr` varchar(100) NOT NULL,
  `year` varchar(50) NOT NULL,
  PRIMARY KEY (`id_comp`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `company`
--

INSERT INTO `company` (`id_comp`, `ville`, `ville_fr`, `ministere`, `ministere_fr`, `direction`, `direction_fr`, `year`) VALUES
(1, 'بسكرة', 'Biskra', 'التضامن الوطني و الأسرة و قضايا المرأة', 'Ministère de la Solidarité Nationale de la Famille et de la Condition de la Femme', 'النشاط الاجتماعي والتضامن', 'DAS', '2023');

-- --------------------------------------------------------

--
-- Table structure for table `handicaps`
--

DROP TABLE IF EXISTS `handicaps`;
CREATE TABLE IF NOT EXISTS `handicaps` (
  `id_handicap` int(11) NOT NULL AUTO_INCREMENT,
  `name_handicap` text NOT NULL,
  `acronym` text NOT NULL,
  PRIMARY KEY (`id_handicap`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `handicaps`
--

INSERT INTO `handicaps` (`id_handicap`, `name_handicap`, `acronym`) VALUES
(1, 'اعاقة حركية', 'ا.ح'),
(2, 'اعاقة سمعية', 'ا.س'),
(3, 'اعاقة بصرية', 'ا.ب'),
(4, 'اعاقة ذهنية', 'ا.ه');

-- --------------------------------------------------------

--
-- Table structure for table `patients`
--

DROP TABLE IF EXISTS `patients`;
CREATE TABLE IF NOT EXISTS `patients` (
  `id_patient` int(11) NOT NULL AUTO_INCREMENT,
  `nom` text NOT NULL,
  `prenom` text NOT NULL,
  `nom_fr` text NOT NULL,
  `prenom_fr` text NOT NULL,
  `sexe` varchar(10) NOT NULL,
  `father` text NOT NULL,
  `mother` text NOT NULL,
  `date_naissance` date NOT NULL,
  `lieu_naissance` text NOT NULL,
  `adresse` text NOT NULL,
  `handicap` int(11) NOT NULL,
  `taux` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `confirmed_by` int(11) DEFAULT NULL,
  `num_card` text,
  `date_card` date DEFAULT NULL,
  `inserted_at` date DEFAULT NULL,
  `year` varchar(4) NOT NULL,
  PRIMARY KEY (`id_patient`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `patients`
--

INSERT INTO `patients` (`id_patient`, `nom`, `prenom`, `nom_fr`, `prenom_fr`, `sexe`, `father`, `mother`, `date_naissance`, `lieu_naissance`, `adresse`, `handicap`, `taux`, `user_id`, `confirmed_by`, `num_card`, `date_card`, `inserted_at`, `year`) VALUES
(2, 'اعطريان', 'وليد', 'iatarien', 'walid', 'ذكر', 'عبد العزيز', 'نادية', '2000-12-04', 'القصبة الجزائر', 'الجزائر العاصمة', 4, 100, 1, NULL, '8100', '2024-04-19', '2024-04-20', '2024');

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
(2, '12345');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `full_name` varchar(255) NOT NULL,
  `position` varchar(255) NOT NULL,
  `service` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `photo` text NOT NULL,
  `chapitre` text,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=MyISAM AUTO_INCREMENT=50 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `full_name`, `position`, `service`, `password`, `photo`, `chapitre`) VALUES
(1, 'admin', 'Administrateur', 'Admin', 'Admin', '$2y$10$N34kPOmf7fWr7xNbgCSG2ORVmq7jAtrtsZaj1FNuSzqWiOqBWc7GW', 'uploads/users/1_user_avatar.jpg', NULL),
(2, 'comptable', 'comptable 1', 'Employé', 'Agent', '$2y$10$XL18PhrmUiGC8A/vKh29z./ClSg.48gbRN6NzPAltEW2Sl6om5hAy', 'img/user_avatar.jpg', NULL);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
