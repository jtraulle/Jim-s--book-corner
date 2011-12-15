-- phpMyAdmin SQL Dump
-- version 3.2.4
-- http://www.phpmyadmin.net
--
-- Serveur: localhost
-- Généré le : Dim 20 Novembre 2011 à 20:59
-- Version du serveur: 5.1.44
-- Version de PHP: 5.3.1

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

--
-- Base de données: `omgl3_pjt`
--
CREATE DATABASE `omgl3_pjt` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `omgl3_pjt`;

-- --------------------------------------------------------

--
-- Structure de la table `auteur`
--

CREATE TABLE IF NOT EXISTS `auteur` (
  `numAuteur` int(10) NOT NULL AUTO_INCREMENT,
  `prenomAuteur` varchar(50) NOT NULL,
  `nomAuteur` varchar(50) NOT NULL,
  PRIMARY KEY (`numAuteur`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Contenu de la table `auteur`
--


-- --------------------------------------------------------

--
-- Structure de la table `auteur_livre`
--

CREATE TABLE IF NOT EXISTS `auteur_livre` (
  `numAuteur` int(10) NOT NULL,
  `numLivre` int(10) NOT NULL,
  PRIMARY KEY (`numAuteur`,`numLivre`),
  KEY `numLivre` (`numLivre`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `auteur_livre`
--


-- --------------------------------------------------------

--
-- Structure de la table `critiquer`
--

CREATE TABLE IF NOT EXISTS `critiquer` (
  `numEmprunteur` int(10) NOT NULL,
  `numLivre` int(10) NOT NULL,
  `noteCritique` tinyint(1) NOT NULL,
  `commentaireCritique` text NOT NULL,
  `visibiliteCritique` tinyint(1) NOT NULL,
  PRIMARY KEY (`numEmprunteur`,`numLivre`),
  KEY `numLivre` (`numLivre`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `critiquer`
--


-- --------------------------------------------------------

--
-- Structure de la table `editeur`
--

CREATE TABLE IF NOT EXISTS `editeur` (
  `numEditeur` int(10) NOT NULL AUTO_INCREMENT,
  `editeur` varchar(50) NOT NULL,
  PRIMARY KEY (`numEditeur`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Contenu de la table `editeur`
--


-- --------------------------------------------------------

--
-- Structure de la table `emprunter`
--

CREATE TABLE IF NOT EXISTS `emprunter` (
  `numEmprunteur` int(10) NOT NULL,
  `numLivre` int(10) NOT NULL,
  `dateEmprunt` datetime NOT NULL,
  `nbRappels` tinyint(1) NOT NULL,
  PRIMARY KEY (`numEmprunteur`,`numLivre`),
  KEY `numLivre` (`numLivre`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `emprunter`
--


-- --------------------------------------------------------

--
-- Structure de la table `emprunteur`
--

CREATE TABLE IF NOT EXISTS `emprunteur` (
  `numEmprunteur` int(10) NOT NULL AUTO_INCREMENT,
  `nomEmprunteur` varchar(50) NOT NULL,
  `prenomEmprunteur` varchar(50) NOT NULL,
  `numRueEmprunteur` int(4) NOT NULL,
  `nomRueEmprunteur` varchar(150) NOT NULL,
  `villeEmprunteur` varchar(50) NOT NULL,
  `CodePostalEmprunteur` varchar(5) NOT NULL,
  `identifiantEmprunteur` varchar(50) NOT NULL,
  `mdpEmprunteur` varchar(50) NOT NULL,
  `telFixeEmprunteur` varchar(10) NOT NULL,
  `telPortableEmprunteur` varchar(10) NOT NULL,
  PRIMARY KEY (`numEmprunteur`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Contenu de la table `emprunteur`
--


-- --------------------------------------------------------

--
-- Structure de la table `evenement`
--

CREATE TABLE IF NOT EXISTS `evenement` (
  `numEvenement` int(10) NOT NULL AUTO_INCREMENT,
  `nomEvenement` varchar(150) NOT NULL,
  `themeEvenement` varchar(50) NOT NULL,
  `lieuEvenement` varchar(50) NOT NULL,
  `dateEvenement` date NOT NULL,
  `heureEvenement` time NOT NULL,
  `numGestionnaire` int(10) NOT NULL,
  PRIMARY KEY (`numEvenement`),
  KEY `numGestionnaire` (`numGestionnaire`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Contenu de la table `evenement`
--


-- --------------------------------------------------------

--
-- Structure de la table `genre`
--

CREATE TABLE IF NOT EXISTS `genre` (
  `numGenre` int(10) NOT NULL AUTO_INCREMENT,
  `genre` varchar(50) NOT NULL,
  PRIMARY KEY (`numGenre`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Contenu de la table `genre`
--


-- --------------------------------------------------------

--
-- Structure de la table `genre_livre`
--

CREATE TABLE IF NOT EXISTS `genre_livre` (
  `numGenre` int(10) NOT NULL,
  `numLivre` int(10) NOT NULL,
  PRIMARY KEY (`numGenre`,`numLivre`),
  KEY `numLivre` (`numLivre`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `genre_livre`
--


-- --------------------------------------------------------

--
-- Structure de la table `gestionnaire`
--

CREATE TABLE IF NOT EXISTS `gestionnaire` (
  `numGestionnaire` int(10) NOT NULL AUTO_INCREMENT,
  `pseudoGestionnaire` varchar(50) NOT NULL,
  `mdpGestionnaire` varchar(50) NOT NULL,
  `telGestionnaire` varchar(10) NOT NULL,
  `emailGestionnaire` varchar(150) NOT NULL,
  `nomGestionnaire` varchar(50) NOT NULL,
  `prenomGestionnaire` varchar(50) NOT NULL,
  PRIMARY KEY (`numGestionnaire`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Contenu de la table `gestionnaire`
--


-- --------------------------------------------------------

--
-- Structure de la table `livre`
--

CREATE TABLE IF NOT EXISTS `livre` (
  `numLivre` int(11) NOT NULL AUTO_INCREMENT,
  `titreLivre` varchar(150) NOT NULL,
  `resumeLivre` text NOT NULL,
  `langueLivre` varchar(50) NOT NULL,
  `nbExemplaireLivre` tinyint(4) NOT NULL,
  `numEditeur` int(10) NOT NULL,
  PRIMARY KEY (`numLivre`),
  KEY `numEditeur` (`numEditeur`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Contenu de la table `livre`
--


-- --------------------------------------------------------

--
-- Structure de la table `reserver`
--

CREATE TABLE IF NOT EXISTS `reserver` (
  `numEmprunteur` int(10) NOT NULL,
  `numLivre` int(10) NOT NULL,
  `dateReservation` datetime NOT NULL,
  `retireReservation` tinyint(1) NOT NULL,
  PRIMARY KEY (`numEmprunteur`,`numLivre`),
  KEY `numLivre` (`numLivre`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `reserver`
--


--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `auteur_livre`
--
ALTER TABLE `auteur_livre`
  ADD CONSTRAINT `auteur_livre_ibfk_2` FOREIGN KEY (`numLivre`) REFERENCES `livre` (`numLivre`),
  ADD CONSTRAINT `auteur_livre_ibfk_1` FOREIGN KEY (`numAuteur`) REFERENCES `auteur` (`numAuteur`);

--
-- Contraintes pour la table `critiquer`
--
ALTER TABLE `critiquer`
  ADD CONSTRAINT `critiquer_ibfk_2` FOREIGN KEY (`numLivre`) REFERENCES `livre` (`numLivre`),
  ADD CONSTRAINT `critiquer_ibfk_1` FOREIGN KEY (`numEmprunteur`) REFERENCES `emprunteur` (`numEmprunteur`);

--
-- Contraintes pour la table `emprunter`
--
ALTER TABLE `emprunter`
  ADD CONSTRAINT `emprunter_ibfk_2` FOREIGN KEY (`numLivre`) REFERENCES `livre` (`numLivre`),
  ADD CONSTRAINT `emprunter_ibfk_1` FOREIGN KEY (`numEmprunteur`) REFERENCES `emprunteur` (`numEmprunteur`);

--
-- Contraintes pour la table `evenement`
--
ALTER TABLE `evenement`
  ADD CONSTRAINT `evenement_ibfk_1` FOREIGN KEY (`numGestionnaire`) REFERENCES `gestionnaire` (`numGestionnaire`);

--
-- Contraintes pour la table `genre_livre`
--
ALTER TABLE `genre_livre`
  ADD CONSTRAINT `genre_livre_ibfk_2` FOREIGN KEY (`numLivre`) REFERENCES `livre` (`numLivre`),
  ADD CONSTRAINT `genre_livre_ibfk_1` FOREIGN KEY (`numGenre`) REFERENCES `genre` (`numGenre`);

--
-- Contraintes pour la table `livre`
--
ALTER TABLE `livre`
  ADD CONSTRAINT `livre_ibfk_1` FOREIGN KEY (`numEditeur`) REFERENCES `editeur` (`numEditeur`);

--
-- Contraintes pour la table `reserver`
--
ALTER TABLE `reserver`
  ADD CONSTRAINT `reserver_ibfk_2` FOREIGN KEY (`numLivre`) REFERENCES `livre` (`numLivre`),
  ADD CONSTRAINT `reserver_ibfk_1` FOREIGN KEY (`numEmprunteur`) REFERENCES `emprunteur` (`numEmprunteur`);