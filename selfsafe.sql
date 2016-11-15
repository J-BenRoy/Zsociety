-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Client :  127.0.0.1
-- Généré le :  Ven 11 Novembre 2016 à 15:15
-- Version du serveur :  5.7.14
-- Version de PHP :  5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `selfsafe`
--

-- --------------------------------------------------------

--
-- Structure de la table `categorie`
--

CREATE TABLE `categorie` (
  `idcat` int(11) NOT NULL,
  `libcat` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `clients`
--

CREATE TABLE `clients` (
  `idclients` int(11) NOT NULL,
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
  `idtypeclients` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `contenir`
--

CREATE TABLE `contenir` (
  `idproduits` int(11) NOT NULL,
  `idrepas` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `credit`
--

CREATE TABLE `credit` (
  `idcredit` int(11) NOT NULL,
  `datecredit` date NOT NULL,
  `heurecredit` time NOT NULL,
  `montantcredit` float NOT NULL,
  `idclients` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `produits`
--

CREATE TABLE `produits` (
  `idproduits` int(11) NOT NULL,
  `libproduits` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `repas`
--

CREATE TABLE `repas` (
  `idrepas` int(11) NOT NULL,
  `daterepas` date NOT NULL,
  `heurerepas` time NOT NULL,
  `prix` float NOT NULL,
  `idclients` int(11) NOT NULL,
  `idtyperepas` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `tarif`
--

CREATE TABLE `tarif` (
  `idproduits` int(11) NOT NULL,
  `idcat` int(11) NOT NULL,
  `tarifN` float NOT NULL,
  `tarifF` float NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `typeclients`
--

CREATE TABLE `typeclients` (
  `idtypeclients` int(11) NOT NULL,
  `libtypeclients` varchar(50) NOT NULL,
  `idcat` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `typerepas`
--

CREATE TABLE `typerepas` (
  `idtyperepas` int(11) NOT NULL,
  `libtyperepas` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Index pour les tables exportées
--

--
-- Index pour la table `categorie`
--
ALTER TABLE `categorie`
  ADD PRIMARY KEY (`idcat`);

--
-- Index pour la table `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`idclients`);

--
-- Index pour la table `contenir`
--
ALTER TABLE `contenir`
  ADD PRIMARY KEY (`idproduits`,`idrepas`);

--
-- Index pour la table `credit`
--
ALTER TABLE `credit`
  ADD PRIMARY KEY (`idcredit`);

--
-- Index pour la table `produits`
--
ALTER TABLE `produits`
  ADD PRIMARY KEY (`idproduits`);

--
-- Index pour la table `repas`
--
ALTER TABLE `repas`
  ADD PRIMARY KEY (`idrepas`);

--
-- Index pour la table `tarif`
--
ALTER TABLE `tarif`
  ADD PRIMARY KEY (`idproduits`,`idcat`);

--
-- Index pour la table `typeclients`
--
ALTER TABLE `typeclients`
  ADD PRIMARY KEY (`idtypeclients`);

--
-- Index pour la table `typerepas`
--
ALTER TABLE `typerepas`
  ADD PRIMARY KEY (`idtyperepas`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `categorie`
--
ALTER TABLE `categorie`
  MODIFY `idcat` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `clients`
--
ALTER TABLE `clients`
  MODIFY `idclients` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `credit`
--
ALTER TABLE `credit`
  MODIFY `idcredit` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `produits`
--
ALTER TABLE `produits`
  MODIFY `idproduits` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `repas`
--
ALTER TABLE `repas`
  MODIFY `idrepas` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `typeclients`
--
ALTER TABLE `typeclients`
  MODIFY `idtypeclients` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `typerepas`
--
ALTER TABLE `typerepas`
  MODIFY `idtyperepas` int(11) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
