-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : lun. 04 déc. 2023 à 21:03
-- Version du serveur : 5.7.36
-- Version de PHP : 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `backgolf`
--
CREATE DATABASE IF NOT EXISTS `backgolf` DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci;
USE `backgolf`;

-- --------------------------------------------------------

--
-- Structure de la table `golfeur`
--

DROP TABLE IF EXISTS `golfeur`;
CREATE TABLE IF NOT EXISTS `golfeur` (
  `IDgolfeur` int(50) NOT NULL AUTO_INCREMENT,
  `nom` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `prenom` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `mail` varchar(90) COLLATE utf8_unicode_ci NOT NULL,
  `competition` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`IDgolfeur`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `golfeur`
--

INSERT INTO `golfeur` (`IDgolfeur`, `nom`, `prenom`, `mail`, `competition`) VALUES
(3, 'johannot', 'malo', 'malojohannot@gmail.com', 'semaine 25'),
(2, 'malo', 'malo', 'malo@malo.malo', 'semaine 25'),
(4, 'lea', 'lea', 'lea@lea.lea', '1'),
(5, 'z', 'z', 'z@z.Z', 'semaine 25'),
(6, 'u', 'u', 'u@u.u', 'semaine 27');

-- --------------------------------------------------------

--
-- Structure de la table `utilisateurs`
--

DROP TABLE IF EXISTS `utilisateurs`;
CREATE TABLE IF NOT EXISTS `utilisateurs` (
  `IDutilisateur` int(60) NOT NULL AUTO_INCREMENT,
  `mail` varchar(300) COLLATE utf8_unicode_ci NOT NULL,
  `nom` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `prenom` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `mdp` varchar(300) COLLATE utf8_unicode_ci NOT NULL,
  `competition` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`IDutilisateur`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `utilisateurs`
--

INSERT INTO `utilisateurs` (`IDutilisateur`, `mail`, `nom`, `prenom`, `mdp`, `competition`) VALUES
(1, 'malo@malo.malo', 'malo', 'malo', 'malo', ''),
(2, 'a@a.a', 'a', 'a', '4a11fc9524e0a016134bde1611921529846f2768', 'semaine 25');
--
-- Base de données : `golf`
--
CREATE DATABASE IF NOT EXISTS `golf` DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci;
USE `golf`;

-- --------------------------------------------------------

--
-- Structure de la table `utilisateurs`
--

DROP TABLE IF EXISTS `utilisateurs`;
CREATE TABLE IF NOT EXISTS `utilisateurs` (
  `IDutilisateur` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(35) COLLATE utf8_unicode_ci NOT NULL,
  `prenom` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(70) COLLATE utf8_unicode_ci NOT NULL,
  `motdepasse` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `competition` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`IDutilisateur`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `utilisateurs`
--

INSERT INTO `utilisateurs` (`IDutilisateur`, `nom`, `prenom`, `email`, `motdepasse`, `competition`) VALUES
(7, 'm', 'm', 'm@m.m', 'm', 'semaine 26'),
(6, 'z', 'z', 'z@z.Z', 'z', 'semaine 25'),
(3, 'lea', 'lea', 'lea@lea.lea', 'lea', '1'),
(8, 'u', 'u', 'u@u.u', 'u', 'semaine 27');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
