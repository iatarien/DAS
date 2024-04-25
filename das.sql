-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Apr 25, 2024 at 04:41 PM
-- Server version: 5.7.31
-- PHP Version: 7.4.9

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
-- Table structure for table `communes`
--

DROP TABLE IF EXISTS `communes`;
CREATE TABLE IF NOT EXISTS `communes` (
  `code` varchar(10) NOT NULL,
  `commune_name` text NOT NULL,
  `id` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=28 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `communes`
--

INSERT INTO `communes` (`code`, `commune_name`, `id`) VALUES
('02', 'أوماش ', 1),
('03', 'البرانيس', 2),
('32', 'الحاجب ', 3),
('13', 'الحوش', 4),
('31', 'الغروس ', 5),
('16', 'الفيض ', 6),
('17', 'القنطرة ', 7),
('28', 'مزيرعة', 8),
('27', 'برج بن عزوز', 9),
('01', 'بسكرة ', 10),
('29', 'بوشقرون ', 11),
('20', 'جمورة', 12),
('33', ' خنقة سيدي ناجي', 13),
('24', 'اورلال ', 14),
('15', 'زربية الوادي', 15),
('11', 'سيدي عقبة', 16),
('04', 'شتمة ', 17),
('21', 'طولقة ', 18),
('14', ' عين الناقة', 19),
('18', ' عين زعطوط', 20),
('26', 'فوغاله', 21),
('19', 'لوطاية ', 22),
('23', 'ليشانه ', 23),
('22', 'ليوة ', 24),
('30', 'مخادمة ', 25),
('12', 'مشونش', 26),
('25', 'مليلي', 27);

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
  `threshold` int(11) NOT NULL,
  PRIMARY KEY (`id_handicap`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `handicaps`
--

INSERT INTO `handicaps` (`id_handicap`, `name_handicap`, `acronym`, `threshold`) VALUES
(1, 'اعاقة حركية', 'ا.ح', 50),
(2, 'اعاقة سمعية', 'ا.س', 80),
(3, 'اعاقة بصرية', 'ا.ب', 95),
(4, 'اعاقة ذهنية', 'ا.ه', 50),
(5, 'متعدد الإعاقات', 'م.إ', 50);

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
  `commune` varchar(10) DEFAULT NULL,
  `adresse` text NOT NULL,
  `handicap` int(11) NOT NULL,
  `taux` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `confirmed_by` int(11) DEFAULT NULL,
  `rejected_by` int(11) DEFAULT NULL,
  `num_card` text,
  `date_card` date DEFAULT NULL,
  `medical_file` text,
  `inserted_at` date DEFAULT NULL,
  `year` varchar(4) NOT NULL,
  PRIMARY KEY (`id_patient`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `patients`
--

INSERT INTO `patients` (`id_patient`, `nom`, `prenom`, `nom_fr`, `prenom_fr`, `sexe`, `father`, `mother`, `date_naissance`, `lieu_naissance`, `commune`, `adresse`, `handicap`, `taux`, `user_id`, `confirmed_by`, `rejected_by`, `num_card`, `date_card`, `medical_file`, `inserted_at`, `year`) VALUES
(2, 'اعطريان', 'وليد', 'iatarien', 'walid', 'ذكر', 'عبد العزيز', 'نادية', '2000-12-04', 'القصبة الجزائر', '10', 'الجزائر العاصمة', 4, 100, 1, 2, NULL, '8100', '2024-04-19', '/files/23928-39.pdf', '2024-04-20', '2024'),
(3, 'لول', 'لال', 'lol', 'lal', 'ذكر', 'a', 'b', '2008-03-13', 'alger', '17', 'alger', 5, 80, 1, 2, NULL, '8001', '2024-04-22', NULL, '2024-04-22', '2024'),
(8, 'بقي', 'عيسى', 'Beggui', 'Aissa', 'ذكر', 'محمد', 'غربي فاطمة', '1982-10-24', 'عين البيضاء ورقلة', '17', 'حي بني ثور ورقلة', 5, 40, 1, NULL, 1, '8520', '2024-04-23', '/files/8Bilan 1ére trimestre 2024 ADM- PSD - Final.pdf', '2024-04-23', '2024'),
(9, 'ميسي', 'ليونل', 'Messi', 'Lionel', 'أنثى', 'اليخاندرو', 'ليلى', '1982-10-12', 'الارجنتين', '25', 'لوس أنجلس ميامي', 4, 50, 1, NULL, NULL, '2560', '2024-04-24', '/files/9vignette 2021 5000 da.pdf', '2024-04-24', '2024'),
(10, 'ديابي', 'عبدو', 'Abdou', 'Diaby', 'أنثى', 'جاك', 'نعيمة', '1962-04-12', 'لندن', '18', 'صبحى ريالتي سنتر', 1, 50, 1, 1, NULL, '1200', '2024-04-26', '/files/10college.pdf', '2024-04-24', '2024');

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
