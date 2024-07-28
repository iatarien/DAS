-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le : ven. 19 juil. 2024 à 16:51
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

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `paddings`
--
ALTER TABLE `paddings`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `paddings`
--
ALTER TABLE `paddings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
