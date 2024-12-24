-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le : mar. 24 déc. 2024 à 12:44
-- Version du serveur :  10.4.14-MariaDB
-- Version de PHP : 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `das`
--

-- --------------------------------------------------------

--
-- Structure de la table `communes`
--

CREATE TABLE `communes` (
  `code` varchar(10) NOT NULL,
  `commune_name` text NOT NULL,
  `id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `communes`
--

INSERT INTO `communes` (`code`, `commune_name`, `id`) VALUES
('02', 'أوماش', 1),
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
('14', 'عين الناقة', 19),
('18', 'عين زعطوط', 20),
('26', 'فوغالة', 21),
('19', 'الوطاية', 22),
('23', 'ليشانة ', 23),
('22', 'ليوة ', 24),
('30', 'مخادمة ', 25),
('12', 'مشونش', 26),
('25', 'امليلي', 27),
('00', 'غير معرفة', 28);

-- --------------------------------------------------------

--
-- Structure de la table `company`
--

CREATE TABLE `company` (
  `id_comp` int(1) NOT NULL,
  `ville` varchar(50) NOT NULL,
  `ville_fr` varchar(50) NOT NULL,
  `ministere` varchar(50) NOT NULL,
  `ministere_fr` varchar(100) NOT NULL,
  `direction` varchar(50) NOT NULL,
  `direction_fr` varchar(100) NOT NULL,
  `padding` int(11) DEFAULT NULL,
  `year` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `company`
--

INSERT INTO `company` (`id_comp`, `ville`, `ville_fr`, `ministere`, `ministere_fr`, `direction`, `direction_fr`, `padding`, `year`) VALUES
(1, 'بسكرة', 'Biskra', 'التضامن الوطني و الأسرة و قضايا المرأة', 'Ministère de la Solidarité Nationale de la Famille et de la Condition de la Femme', 'النشاط الاجتماعي والتضامن', 'DAS', 8, '2024');

-- --------------------------------------------------------

--
-- Structure de la table `handicaps`
--

CREATE TABLE `handicaps` (
  `id_handicap` int(11) NOT NULL,
  `name_handicap` text DEFAULT NULL,
  `acronym` text DEFAULT NULL,
  `threshold` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `handicaps`
--

INSERT INTO `handicaps` (`id_handicap`, `name_handicap`, `acronym`, `threshold`) VALUES
(1, 'اعاقة حركية', 'ا.ح', 50),
(2, 'اعاقة سمعية', 'ا.س', 80),
(3, 'اعاقة بصرية', 'ا.ب', 95),
(4, 'اعاقة ذهنية', 'ا.ه', 50),
(5, 'متعدد الإعاقات', 'م.إ', 50),
(9, 'صم بكم', NULL, 0),
(10, 'ذهني حركي', NULL, 0),
(11, 'حركي بصري', NULL, 0),
(12, 'ذهني بصري', NULL, 0),
(13, 'ذهني سمعي', NULL, 0),
(14, 'سمعي حركي', NULL, 0),
(15, 'ذهني صم بكم', NULL, 0),
(16, 'ذهني صم', NULL, 0),
(17, 'ذهني حركي صم بكم', NULL, 0),
(18, 'حركي صم', NULL, 0),
(19, 'حركي بصري صم بكم', NULL, 0),
(20, 'ذهني حركي سمعي', NULL, 0),
(21, 'حركي صم بكم', NULL, 0),
(22, 'ذهني سمعي بصري', NULL, 0),
(23, 'ذهني بصري صم بكم', NULL, 0),
(24, 'صم بكم بصري', NULL, 0),
(25, 'ذهني حركي بصري', NULL, 0),
(26, 'بصري صم', NULL, 0),
(27, 'ذهني بكم', NULL, 0),
(28, 'سمعي بصري', NULL, 0),
(29, 'حركي بكم', NULL, 0);

-- --------------------------------------------------------

--
-- Structure de la table `paddings`
--

CREATE TABLE `paddings` (
  `id` int(11) NOT NULL,
  `handicap` int(11) NOT NULL,
  `benefit` int(11) NOT NULL,
  `wilaya` int(11) NOT NULL,
  `names` int(11) NOT NULL,
  `date_N` int(11) NOT NULL,
  `lieu_N` int(11) NOT NULL,
  `adresse` int(11) NOT NULL,
  `names_fr` int(11) NOT NULL,
  `num` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `paddings`
--

INSERT INTO `paddings` (`id`, `handicap`, `benefit`, `wilaya`, `names`, `date_N`, `lieu_N`, `adresse`, `names_fr`, `num`) VALUES
(1, 7, 5, 5, 4, 1, 1, 1, 1, 2);

-- --------------------------------------------------------

--
-- Structure de la table `recours`
--

CREATE TABLE `recours` (
  `id_recours` int(11) NOT NULL,
  `patient` int(11) NOT NULL,
  `old_taux` int(5) NOT NULL,
  `new_taux` int(5) NOT NULL,
  `date_recours` date NOT NULL,
  `old_num` text NOT NULL,
  `new_num` text NOT NULL,
  `recours_from` int(11) DEFAULT NULL,
  `recours_by` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `safe`
--

CREATE TABLE `safe` (
  `id` int(11) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `safe`
--

INSERT INTO `safe` (`id`, `password`) VALUES
(1, 'admin'),
(2, '1234'),
(51, 'lola');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` int(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `full_name` varchar(255) NOT NULL,
  `position` varchar(255) NOT NULL,
  `service` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `photo` text NOT NULL,
  `chapitre` text DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `username`, `full_name`, `position`, `service`, `password`, `photo`, `chapitre`) VALUES
(2, 'chef', 'Chef', 'Chef', 'Chef', '$2y$10$iJ7WcYC8kYOfkz3CDH/PkuICpjcaYhH0QYEZNaMIGpeRIyvMvuLfK', 'uploads/users/1_user_avatar.jpg', NULL),
(1, 'agent', 'Agent', 'Employé', 'Agent', '$2y$10$r2IcZRQatDkDfGGG6UMu6eTqMhLndAmMAfxZ/pZDXbo.rU8YzcrAW', 'img/user_avatar.jpg', NULL),
(50, 'admin', 'Administrateur', 'Admin', 'Admin', '$2y$10$N34kPOmf7fWr7xNbgCSG2ORVmq7jAtrtsZaj1FNuSzqWiOqBWc7GW', 'uploads/users/1_user_avatar.jpg', NULL),
(51, 'lola', 'lola', 'Employé', 'Agent', '$2y$10$Opse3Hbmk1gImFpNVgew1uhqYded782.flEwJkZqstIMtfpC.LAZq', 'img/user_avatar.jpg', NULL),
(0, 'bot', 'Fichier EXCEL', ' ', ' ', ' ', ' ', ' ');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `communes`
--
ALTER TABLE `communes`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `company`
--
ALTER TABLE `company`
  ADD PRIMARY KEY (`id_comp`);

--
-- Index pour la table `handicaps`
--
ALTER TABLE `handicaps`
  ADD PRIMARY KEY (`id_handicap`);

--
-- Index pour la table `paddings`
--
ALTER TABLE `paddings`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `recours`
--
ALTER TABLE `recours`
  ADD PRIMARY KEY (`id_recours`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `communes`
--
ALTER TABLE `communes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT pour la table `company`
--
ALTER TABLE `company`
  MODIFY `id_comp` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `handicaps`
--
ALTER TABLE `handicaps`
  MODIFY `id_handicap` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT pour la table `paddings`
--
ALTER TABLE `paddings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `recours`
--
ALTER TABLE `recours`
  MODIFY `id_recours` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
