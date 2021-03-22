-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  lun. 22 mars 2021 à 17:04
-- Version du serveur :  5.7.26
-- Version de PHP :  7.3.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `ppe`
--

-- --------------------------------------------------------

--
-- Structure de la table `connexions`
--

DROP TABLE IF EXISTS `connexions`;
CREATE TABLE IF NOT EXISTS `connexions` (
  `idConnexions` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(30) COLLATE utf8_bin NOT NULL,
  `prenom` varchar(30) COLLATE utf8_bin NOT NULL,
  `email` varchar(60) COLLATE utf8_bin NOT NULL,
  `password` varchar(256) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`idConnexions`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Déchargement des données de la table `connexions`
--

INSERT INTO `connexions` (`idConnexions`, `nom`, `prenom`, `email`, `password`) VALUES
(2, 'mathithayan', 'steven', 'stev940@hotmail.fr', '123456'),
(3, 'Nicolas', 'Abreu', 'nicona423@gmail.com', 'zakaria'),
(4, 'Nicolas', 'Abreu', 'nicona423@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b'),
(5, 'Nicolas', 'Abreu', 'nicolas_abreu@live.fr', '827ccb0eea8a706c4c34a16891f84e7b');

-- --------------------------------------------------------

--
-- Structure de la table `stock`
--

DROP TABLE IF EXISTS `stock`;
CREATE TABLE IF NOT EXISTS `stock` (
  `idStock` int(11) NOT NULL AUTO_INCREMENT,
  `genre` varchar(1) COLLATE utf8_bin NOT NULL,
  `typeVet` varchar(30) COLLATE utf8_bin NOT NULL,
  `taille` varchar(30) COLLATE utf8_bin NOT NULL,
  `couleur` varchar(30) COLLATE utf8_bin NOT NULL,
  `quantite` int(11) NOT NULL,
  `prix` int(11) NOT NULL,
  PRIMARY KEY (`idStock`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Déchargement des données de la table `stock`
--

INSERT INTO `stock` (`idStock`, `genre`, `typeVet`, `taille`, `couleur`, `quantite`, `prix`) VALUES
(1, 'M', 'Pantalon', 'Adulte', 'Rouge', 20, 30),
(2, 'F', 'Pull', 'M', 'bleu', 20, 40),
(3, 'F', 'robe', 's', 'vert', 20, 40),
(4, 'M', 'chaussure', '36', 'noir', 40, 100),
(5, 'F', 't-shirt', 'M', 'orange', 40, 20);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
