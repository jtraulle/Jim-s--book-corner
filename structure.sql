SET FOREIGN_KEY_CHECKS=0;
SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

DROP DATABASE `omgl3_pjt`;
CREATE DATABASE `omgl3_pjt` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `omgl3_pjt`;

DROP TABLE IF EXISTS `auteur`;
CREATE TABLE `auteur` (
  `numAuteur` int(10) NOT NULL AUTO_INCREMENT,
  `prenomAuteur` varchar(50) NOT NULL,
  `nomAuteur` varchar(50) NOT NULL,
  PRIMARY KEY (`numAuteur`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `auteur_livre`;
CREATE TABLE `auteur_livre` (
  `numAuteur` int(10) NOT NULL,
  `numLivre` int(10) NOT NULL,
  PRIMARY KEY (`numAuteur`,`numLivre`),
  KEY `numLivre` (`numLivre`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `config`;
CREATE TABLE `config` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `identifiant` varchar(255) NOT NULL,
  `valeur` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8;

INSERT INTO `config` (`id`, `identifiant`, `valeur`) VALUES
(1, 'versionbdd', '0.8');

DROP TABLE IF EXISTS `critiquer`;
CREATE TABLE `critiquer` (
  `numEmprunteur` int(10) NOT NULL,
  `numLivre` int(10) NOT NULL,
  `noteCritique` tinyint(1) NOT NULL,
  `commentaireCritique` text NOT NULL,
  `visibiliteCritique` tinyint(1) NOT NULL,
  PRIMARY KEY (`numEmprunteur`,`numLivre`),
  KEY `numLivre` (`numLivre`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `emprunter`;
CREATE TABLE `emprunter` (
  `numEmprunteur` int(10) NOT NULL,
  `numLivre` int(10) NOT NULL,
  `dateEmprunt` datetime NOT NULL,
  `nbRappels` tinyint(1) NOT NULL,
  PRIMARY KEY (`numEmprunteur`,`numLivre`),
  KEY `numLivre` (`numLivre`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `emprunteur`;
CREATE TABLE `emprunteur` (
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
  `emailEmprunteur` varchar(150) NOT NULL,
  PRIMARY KEY (`numEmprunteur`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `evenement`;
CREATE TABLE `evenement` (
  `numEvenement` int(10) NOT NULL AUTO_INCREMENT,
  `nomEvenement` varchar(150) NOT NULL,
  `themeEvenement` varchar(50) NOT NULL,
  `lieuEvenement` varchar(50) NOT NULL,
  `dateEvenement` date NOT NULL,
  `heureEvenement` time NOT NULL,
  `numGestionnaire` int(10) NOT NULL,
  PRIMARY KEY (`numEvenement`),
  KEY `numGestionnaire` (`numGestionnaire`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `genre`;
CREATE TABLE `genre` (
  `numGenre` int(10) NOT NULL AUTO_INCREMENT,
  `genre` varchar(50) NOT NULL,
  PRIMARY KEY (`numGenre`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `genre_livre`;
CREATE TABLE `genre_livre` (
  `numGenre` int(10) NOT NULL,
  `numLivre` int(10) NOT NULL,
  PRIMARY KEY (`numGenre`,`numLivre`),
  KEY `numLivre` (`numLivre`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `gestionnaire`;
CREATE TABLE `gestionnaire` (
  `numGestionnaire` int(10) NOT NULL AUTO_INCREMENT,
  `pseudoGestionnaire` varchar(50) NOT NULL,
  `mdpGestionnaire` varchar(50) NOT NULL,
  `telGestionnaire` varchar(10) NOT NULL,
  `emailGestionnaire` varchar(150) NOT NULL,
  `nomGestionnaire` varchar(50) NOT NULL,
  `prenomGestionnaire` varchar(50) NOT NULL,
  PRIMARY KEY (`numGestionnaire`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `livre`;
CREATE TABLE `livre` (
  `numLivre` int(11) NOT NULL AUTO_INCREMENT,
  `titreLivre` varchar(150) NOT NULL,
  `resumeLivre` text NOT NULL,
  `langueLivre` varchar(50) NOT NULL,
  `nbExemplaireLivre` tinyint(4) NOT NULL,
  PRIMARY KEY (`numLivre`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `reserver`;
CREATE TABLE `reserver` (
  `numEmprunteur` int(10) NOT NULL,
  `numLivre` int(10) NOT NULL,
  `dateReservation` datetime NOT NULL,
  `retireReservation` tinyint(1) NOT NULL,
  PRIMARY KEY (`numEmprunteur`,`numLivre`),
  KEY `numLivre` (`numLivre`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



ALTER TABLE `auteur_livre`
  ADD CONSTRAINT `auteur_livre_ibfk_1` FOREIGN KEY (`numAuteur`) REFERENCES `auteur` (`numAuteur`),
  ADD CONSTRAINT `auteur_livre_ibfk_2` FOREIGN KEY (`numLivre`) REFERENCES `livre` (`numLivre`);

ALTER TABLE `critiquer`
  ADD CONSTRAINT `critiquer_ibfk_1` FOREIGN KEY (`numEmprunteur`) REFERENCES `emprunteur` (`numEmprunteur`),
  ADD CONSTRAINT `critiquer_ibfk_2` FOREIGN KEY (`numLivre`) REFERENCES `livre` (`numLivre`);

ALTER TABLE `emprunter`
  ADD CONSTRAINT `emprunter_ibfk_1` FOREIGN KEY (`numEmprunteur`) REFERENCES `emprunteur` (`numEmprunteur`),
  ADD CONSTRAINT `emprunter_ibfk_2` FOREIGN KEY (`numLivre`) REFERENCES `livre` (`numLivre`);

ALTER TABLE `evenement`
  ADD CONSTRAINT `evenement_ibfk_1` FOREIGN KEY (`numGestionnaire`) REFERENCES `gestionnaire` (`numGestionnaire`);

ALTER TABLE `genre_livre`
  ADD CONSTRAINT `genre_livre_ibfk_1` FOREIGN KEY (`numGenre`) REFERENCES `genre` (`numGenre`),
  ADD CONSTRAINT `genre_livre_ibfk_2` FOREIGN KEY (`numLivre`) REFERENCES `livre` (`numLivre`);

ALTER TABLE `reserver`
  ADD CONSTRAINT `reserver_ibfk_1` FOREIGN KEY (`numEmprunteur`) REFERENCES `emprunteur` (`numEmprunteur`),
  ADD CONSTRAINT `reserver_ibfk_2` FOREIGN KEY (`numLivre`) REFERENCES `livre` (`numLivre`);
SET FOREIGN_KEY_CHECKS=1;
