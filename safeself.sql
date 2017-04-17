-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Lun 17 Avril 2017 à 18:05
-- Version du serveur :  5.6.17
-- Version de PHP :  5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `safeself`
--

-- --------------------------------------------------------

--
-- Structure de la table `categorie`
--

CREATE TABLE IF NOT EXISTS `categorie` (
  `idcat` int(11) NOT NULL AUTO_INCREMENT,
  `libcat` varchar(50) NOT NULL,
  `valide` tinyint(1) NOT NULL,
  PRIMARY KEY (`idcat`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=24 ;

--
-- Contenu de la table `categorie`
--

INSERT INTO `categorie` (`idcat`, `libcat`, `valide`) VALUES
(1, 'etudiant', 1),
(2, 'eleve', 1),
(3, 'professeur', 1),
(4, 'ogecs', 1),
(19, 'thom', 0),
(18, 'aaaa', 0),
(17, '', 0),
(20, 'iii', 0),
(21, 'uuu', 0),
(22, 'yolo', 0),
(23, 'Dara', 0);

-- --------------------------------------------------------

--
-- Structure de la table `clients`
--

CREATE TABLE IF NOT EXISTS `clients` (
  `idclients` int(11) NOT NULL AUTO_INCREMENT,
  `nomclients` varchar(50) NOT NULL,
  `prenomclients` varchar(50) NOT NULL,
  `motdepasse` varchar(10) NOT NULL,
  `photo` varchar(350) NOT NULL,
  `codebarre` varchar(350) NOT NULL,
  `lunm` tinyint(1) NOT NULL,
  `luns` tinyint(1) NOT NULL,
  `marm` tinyint(1) NOT NULL,
  `mars` tinyint(1) NOT NULL,
  `merm` tinyint(1) NOT NULL,
  `mers` tinyint(1) NOT NULL,
  `jeum` tinyint(1) NOT NULL,
  `jeus` tinyint(1) NOT NULL,
  `venm` tinyint(1) NOT NULL,
  `vens` tinyint(1) NOT NULL,
  `idtypeclients` varchar(50) NOT NULL,
  `valide` tinyint(1) NOT NULL,
  PRIMARY KEY (`idclients`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Contenu de la table `clients`
--

INSERT INTO `clients` (`idclients`, `nomclients`, `prenomclients`, `motdepasse`, `photo`, `codebarre`, `lunm`, `luns`, `marm`, `mars`, `merm`, `mers`, `jeum`, `jeus`, `venm`, `vens`, `idtypeclients`, `valide`) VALUES
(1, 'Nielas', 'Aran', 'NAran', 'img/nielas.jpg', '987654321', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '3', 1),
(2, 'Aegwynn', 'Magna', '', 'img/aegwynn.jpg', '123456789', 1, 0, 1, 1, 1, 1, 0, 0, 0, 0, '1', 1);

-- --------------------------------------------------------

--
-- Structure de la table `contenir`
--

CREATE TABLE IF NOT EXISTS `contenir` (
  `idproduits` int(11) NOT NULL,
  `idrepas` int(11) NOT NULL,
  `historiquetarif` float NOT NULL,
  `valide` tinyint(1) NOT NULL,
  PRIMARY KEY (`idproduits`,`idrepas`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Contenu de la table `contenir`
--

INSERT INTO `contenir` (`idproduits`, `idrepas`, `historiquetarif`, `valide`) VALUES
(4, 1, 5.2, 1);

-- --------------------------------------------------------

--
-- Structure de la table `credit`
--

CREATE TABLE IF NOT EXISTS `credit` (
  `idcredit` int(11) NOT NULL AUTO_INCREMENT,
  `datecredit` date NOT NULL,
  `heurecredit` time NOT NULL,
  `montantcredit` float NOT NULL,
  `idclients` int(11) NOT NULL,
  `valide` int(11) NOT NULL,
  PRIMARY KEY (`idcredit`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Contenu de la table `credit`
--

INSERT INTO `credit` (`idcredit`, `datecredit`, `heurecredit`, `montantcredit`, `idclients`, `valide`) VALUES
(1, '2016-11-08', '09:24:21', 351.2, 1, 1);

-- --------------------------------------------------------

--
-- Structure de la table `produits`
--

CREATE TABLE IF NOT EXISTS `produits` (
  `idproduits` int(11) NOT NULL AUTO_INCREMENT,
  `libproduits` varchar(50) NOT NULL,
  `idtypeproduit` int(11) NOT NULL,
  `valide` tinyint(1) NOT NULL,
  PRIMARY KEY (`idproduits`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=77 ;

--
-- Contenu de la table `produits`
--

INSERT INTO `produits` (`idproduits`, `libproduits`, `idtypeproduit`, `valide`) VALUES
(1, 'cafe', 0, 1),
(2, 'bol de riz', 0, 1),
(3, 'coca', 0, 1),
(4, 'repas normal', 0, 1),
(71, 'Vins', 0, 1),
(70, 'Thé', 0, 1),
(72, 'Glace', 3, 1),
(75, 'dsf', 0, 0),
(76, 'azaz', 0, 0);

-- --------------------------------------------------------

--
-- Structure de la table `repas`
--

CREATE TABLE IF NOT EXISTS `repas` (
  `idrepas` int(11) NOT NULL AUTO_INCREMENT,
  `daterepas` date NOT NULL,
  `heurerepas` time NOT NULL,
  `prix` float NOT NULL,
  `idclients` int(11) NOT NULL,
  `idtyperepas` int(11) NOT NULL,
  `note` int(2) NOT NULL,
  `valide` tinyint(1) NOT NULL,
  PRIMARY KEY (`idrepas`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=39 ;

--
-- Contenu de la table `repas`
--

INSERT INTO `repas` (`idrepas`, `daterepas`, `heurerepas`, `prix`, `idclients`, `idtyperepas`, `note`, `valide`) VALUES
(1, '2016-11-14', '12:17:19', 2.2, 1, 1, 15, 1),
(38, '2017-04-17', '15:01:13', 6.5, 1, 1, 0, 1),
(37, '2017-04-17', '15:00:46', 6.5, 1, 1, 0, 1),
(36, '2017-04-17', '14:59:28', 6.5, 1, 1, 0, 1),
(35, '2017-04-13', '11:35:38', 6.5, 2, 1, 15, 1),
(34, '2017-04-10', '21:41:40', 6.5, 2, 1, 15, 1),
(33, '2017-04-10', '21:40:31', 6.5, 2, 1, 15, 1),
(32, '2017-04-10', '20:41:35', 6.5, 1, 1, 15, 1),
(31, '2017-04-10', '20:32:56', 6.5, 2, 1, 15, 1),
(30, '2017-04-10', '20:31:29', 6.5, 1, 0, 15, 1),
(29, '2017-04-10', '20:31:15', 6.5, 2, 0, 15, 1),
(28, '2017-04-10', '20:31:10', 6.5, 2, 0, 15, 1),
(27, '2017-04-11', '20:25:24', 6.5, 2, 0, 15, 1),
(26, '2017-04-11', '20:25:18', 6.5, 2, 0, 15, 1),
(25, '2017-04-10', '20:19:41', 6.5, 2, 0, 15, 1),
(24, '2017-04-10', '20:15:48', 6.5, 2, 0, 15, 1);

-- --------------------------------------------------------

--
-- Structure de la table `tarif`
--

CREATE TABLE IF NOT EXISTS `tarif` (
  `idproduits` int(11) NOT NULL,
  `idcat` int(11) NOT NULL,
  `tarifN` float NOT NULL,
  `tarifF` float NOT NULL,
  `valide` tinyint(1) NOT NULL,
  PRIMARY KEY (`idproduits`,`idcat`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Contenu de la table `tarif`
--

INSERT INTO `tarif` (`idproduits`, `idcat`, `tarifN`, `tarifF`, `valide`) VALUES
(4, 2, 6, 5.2, 1),
(4, 1, 6, 5.2, 1),
(4, 3, 5.2, 5.2, 1),
(4, 4, 2.4, 2.4, 1),
(76, 1, 7, 7, 1),
(76, 2, 7, 77, 1),
(76, 3, 7, 7, 1),
(76, 4, 7, 7, 1),
(75, 1, 3, 3, 1),
(75, 2, 3, 3, 1),
(75, 3, 3, 3, 1),
(75, 4, 3, 3, 1),
(0, 4, 2, 2, 1),
(0, 3, 2, 2, 1),
(0, 2, 2, 2, 1),
(0, 1, 5, 2, 1),
(74, 1, 1, 11, 1),
(74, 2, 1, 1, 1),
(74, 3, 1, 1, 1),
(74, 4, 1, 1, 1),
(72, 1, 2, 2, 1),
(72, 2, 2, 2, 1),
(72, 3, 4, 3, 1),
(72, 4, 2, 2, 1),
(71, 1, 0, 0, 1),
(71, 2, 0, 0, 1),
(71, 3, 4, 4, 1),
(71, 4, 2.5, 2.5, 1),
(70, 4, 0, 0, 1),
(70, 3, 0.2, 0.2, 1),
(70, 2, 0.3, 0.3, 1),
(70, 1, 0.99, 0.3, 1);

-- --------------------------------------------------------

--
-- Structure de la table `typeclients`
--

CREATE TABLE IF NOT EXISTS `typeclients` (
  `idtypeclients` int(11) NOT NULL AUTO_INCREMENT,
  `libtypeclients` varchar(50) NOT NULL,
  `idcat` int(11) NOT NULL,
  `valide` tinyint(1) NOT NULL,
  PRIMARY KEY (`idtypeclients`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=11 ;

--
-- Contenu de la table `typeclients`
--

INSERT INTO `typeclients` (`idtypeclients`, `libtypeclients`, `idcat`, `valide`) VALUES
(1, 'TS2 SIO', 1, 1),
(3, 'TS1 SIO', 1, 1),
(4, 'TS1 ASG', 1, 1),
(5, '1ere com', 2, 1),
(6, '2nd com', 2, 1),
(7, '3eme com', 2, 1),
(8, 'ogec', 4, 1),
(9, 'TS2 ASG', 1, 1),
(10, 'professeur', 3, 1);

-- --------------------------------------------------------

--
-- Structure de la table `typeproduit`
--

CREATE TABLE IF NOT EXISTS `typeproduit` (
  `idtypeproduit` int(11) NOT NULL AUTO_INCREMENT,
  `libtypeprod` varchar(25) NOT NULL,
  `valide` int(11) NOT NULL,
  PRIMARY KEY (`idtypeproduit`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Contenu de la table `typeproduit`
--

INSERT INTO `typeproduit` (`idtypeproduit`, `libtypeprod`, `valide`) VALUES
(1, 'Entrée', 1),
(2, 'Plat', 1),
(3, 'Dessert', 1);

-- --------------------------------------------------------

--
-- Structure de la table `typerepas`
--

CREATE TABLE IF NOT EXISTS `typerepas` (
  `idtyperepas` int(11) NOT NULL AUTO_INCREMENT,
  `libtyperepas` varchar(50) NOT NULL,
  `valide` tinyint(1) NOT NULL,
  PRIMARY KEY (`idtyperepas`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Contenu de la table `typerepas`
--

INSERT INTO `typerepas` (`idtyperepas`, `libtyperepas`, `valide`) VALUES
(1, 'midi', 1),
(2, 'soir', 1);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
