-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Mar 15 Novembre 2016 à 10:39
-- Version du serveur :  5.7.9
-- Version de PHP :  5.5.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `safeself`
--

-- --------------------------------------------------------

--
-- Structure de la table `categorie`
--

DROP TABLE IF EXISTS `categorie`;
CREATE TABLE IF NOT EXISTS `categorie` (
  `idcat` int(11) NOT NULL AUTO_INCREMENT,
  `libcat` varchar(50) NOT NULL,
  PRIMARY KEY (`idcat`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Contenu de la table `categorie`
--

INSERT INTO `categorie` (`idcat`, `libcat`) VALUES
(1, 'etudiant'),
(2, 'eleve'),
(3, 'professeur '),
(4, 'ogec');

-- --------------------------------------------------------

--
-- Structure de la table `clients`
--

DROP TABLE IF EXISTS `clients`;
CREATE TABLE IF NOT EXISTS `clients` (
  `idclients` int(11) NOT NULL AUTO_INCREMENT,
  `nomclients` varchar(50) NOT NULL,
  `prenomclients` varchar(50) NOT NULL,
  `photo` varchar(350) NOT NULL,
  `codebarre` varchar(350) NOT NULL,
  `lundim` tinyint(1) NOT NULL,
  `lundis` tinyint(1) NOT NULL,
  `mardim` tinyint(1) NOT NULL,
  `mardis` tinyint(1) NOT NULL,
  `mercredim` tinyint(1) NOT NULL,
  `mercredis` tinyint(1) NOT NULL,
  `jeudim` tinyint(1) NOT NULL,
  `jeudis` tinyint(1) NOT NULL,
  `vendredim` tinyint(1) NOT NULL,
  `verndredis` tinyint(1) NOT NULL,
  `idtypeclients` varchar(50) NOT NULL,
  PRIMARY KEY (`idclients`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Contenu de la table `clients`
--

INSERT INTO `clients` (`idclients`, `nomclients`, `prenomclients`, `photo`, `codebarre`, `lundim`, `lundis`, `mardim`, `mardis`, `mercredim`, `mercredis`, `jeudim`, `jeudis`, `vendredim`, `verndredis`, `idtypeclients`) VALUES
(1, 'Nielas', 'Aran', 'nielas.jpg', '987654321', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '3'),
(2, 'Aegwynn', 'Magna', 'aegwynn.jpg', '123456789', 1, 0, 1, 1, 1, 1, 0, 0, 0, 0, '1');

-- --------------------------------------------------------

--
-- Structure de la table `contenir`
--

DROP TABLE IF EXISTS `contenir`;
CREATE TABLE IF NOT EXISTS `contenir` (
  `idproduits` int(11) NOT NULL,
  `idrepas` int(11) NOT NULL,
  `historiquetarif` float NOT NULL,
  PRIMARY KEY (`idproduits`,`idrepas`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Contenu de la table `contenir`
--

INSERT INTO `contenir` (`idproduits`, `idrepas`, `historiquetarif`) VALUES
(4, 1, 5.2);

-- --------------------------------------------------------

--
-- Structure de la table `credit`
--

DROP TABLE IF EXISTS `credit`;
CREATE TABLE IF NOT EXISTS `credit` (
  `idcredit` int(11) NOT NULL AUTO_INCREMENT,
  `datecredit` date NOT NULL,
  `heurecredit` time NOT NULL,
  `montantcredit` float NOT NULL,
  `idclients` int(11) NOT NULL,
  PRIMARY KEY (`idcredit`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Contenu de la table `credit`
--

INSERT INTO `credit` (`idcredit`, `datecredit`, `heurecredit`, `montantcredit`, `idclients`) VALUES
(1, '2016-11-08', '09:24:21', 351.2, 1);

-- --------------------------------------------------------

--
-- Structure de la table `produits`
--

DROP TABLE IF EXISTS `produits`;
CREATE TABLE IF NOT EXISTS `produits` (
  `idproduits` int(11) NOT NULL AUTO_INCREMENT,
  `libproduits` varchar(50) NOT NULL,
  PRIMARY KEY (`idproduits`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Contenu de la table `produits`
--

INSERT INTO `produits` (`idproduits`, `libproduits`) VALUES
(1, 'cafe'),
(2, 'bol de riz'),
(3, 'coca'),
(4, 'repas normal');

-- --------------------------------------------------------

--
-- Structure de la table `repas`
--

DROP TABLE IF EXISTS `repas`;
CREATE TABLE IF NOT EXISTS `repas` (
  `idrepas` int(11) NOT NULL AUTO_INCREMENT,
  `daterepas` date NOT NULL,
  `heurerepas` time NOT NULL,
  `prix` float NOT NULL,
  `idclients` int(11) NOT NULL,
  `idtyperepas` int(11) NOT NULL,
  PRIMARY KEY (`idrepas`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Contenu de la table `repas`
--

INSERT INTO `repas` (`idrepas`, `daterepas`, `heurerepas`, `prix`, `idclients`, `idtyperepas`) VALUES
(1, '2016-11-14', '12:17:19', 2.2, 1, 1);

-- --------------------------------------------------------

--
-- Structure de la table `tarif`
--

DROP TABLE IF EXISTS `tarif`;
CREATE TABLE IF NOT EXISTS `tarif` (
  `idproduits` int(11) NOT NULL,
  `idcat` int(11) NOT NULL,
  `tarifN` float NOT NULL,
  `tarifF` float NOT NULL,
  PRIMARY KEY (`idproduits`,`idcat`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Contenu de la table `tarif`
--

INSERT INTO `tarif` (`idproduits`, `idcat`, `tarifN`, `tarifF`) VALUES
(4, 2, 6, 5.2),
(4, 1, 6, 5.2),
(4, 3, 5.2, 5.2),
(4, 4, 2.4, 2.4);

-- --------------------------------------------------------

--
-- Structure de la table `typeclients`
--

DROP TABLE IF EXISTS `typeclients`;
CREATE TABLE IF NOT EXISTS `typeclients` (
  `idtypeclients` int(11) NOT NULL AUTO_INCREMENT,
  `libtypeclients` varchar(50) NOT NULL,
  `idcat` int(11) NOT NULL,
  PRIMARY KEY (`idtypeclients`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

--
-- Contenu de la table `typeclients`
--

INSERT INTO `typeclients` (`idtypeclients`, `libtypeclients`, `idcat`) VALUES
(1, 'TS2 SIO', 1),
(3, 'TS1 SIO', 1),
(4, 'TS1 ASG', 1),
(5, '1ere com', 2),
(6, '2nd com', 2),
(7, '3eme com', 2),
(8, 'ogec', 4),
(9, 'TS2 ASG', 1),
(10, 'professeur', 3);

-- --------------------------------------------------------

--
-- Structure de la table `typerepas`
--

DROP TABLE IF EXISTS `typerepas`;
CREATE TABLE IF NOT EXISTS `typerepas` (
  `idtyperepas` int(11) NOT NULL AUTO_INCREMENT,
  `libtyperepas` varchar(50) NOT NULL,
  PRIMARY KEY (`idtyperepas`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Contenu de la table `typerepas`
--

INSERT INTO `typerepas` (`idtyperepas`, `libtyperepas`) VALUES
(1, 'midi'),
(2, 'soir');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
