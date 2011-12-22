SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;


DROP TABLE IF EXISTS `auteur`;
CREATE TABLE `auteur` (
  `numAuteur` int(10) NOT NULL AUTO_INCREMENT,
  `prenomAuteur` varchar(50) NOT NULL,
  `nomAuteur` varchar(50) NOT NULL,
  PRIMARY KEY (`numAuteur`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=286 ;

INSERT INTO `auteur` VALUES(1, 'Chinua', 'ACHEBE');
INSERT INTO `auteur` VALUES(2, 'Peter', 'ACKROYD');
INSERT INTO `auteur` VALUES(3, 'Richard', 'ADAMS');
INSERT INTO `auteur` VALUES(4, 'Fang', 'AI');
INSERT INTO `auteur` VALUES(5, 'Louisa Mary', 'ALCOTT');
INSERT INTO `auteur` VALUES(6, 'Richard', 'ALDINGTON');
INSERT INTO `auteur` VALUES(7, 'Margery', 'ALLINGHAM');
INSERT INTO `auteur` VALUES(8, 'Julia', 'ALVAREZ');
INSERT INTO `auteur` VALUES(9, 'Kingsley', 'AMIS');
INSERT INTO `auteur` VALUES(10, 'Martin', 'AMIS');
INSERT INTO `auteur` VALUES(11, 'Hans Christian', 'ANDERSEN');
INSERT INTO `auteur` VALUES(12, 'Evelyn', 'ANTHONY');
INSERT INTO `auteur` VALUES(13, 'Antonio Lobo', 'ANTUNES');
INSERT INTO `auteur` VALUES(14, 'John', 'ARBUTHNOT');
INSERT INTO `auteur` VALUES(15, 'John', 'ARDEN');
INSERT INTO `auteur` VALUES(16, 'Matthew', 'ARNOLD');
INSERT INTO `auteur` VALUES(17, 'Kate', 'ATKINSON');
INSERT INTO `auteur` VALUES(18, '', 'AUBREY');
INSERT INTO `auteur` VALUES(19, 'Louis', 'AUCHINCLOSS');
INSERT INTO `auteur` VALUES(20, 'W.H.', 'AUDEN');
INSERT INTO `auteur` VALUES(21, 'Jane', 'AUSTEN');
INSERT INTO `auteur` VALUES(22, 'Paul', 'AUSTER');
INSERT INTO `auteur` VALUES(23, 'Lynne Reid', 'BANKS');
INSERT INTO `auteur` VALUES(24, 'Gaston', 'BARDET');
INSERT INTO `auteur` VALUES(25, 'Franklin John', 'BARDIN');
INSERT INTO `auteur` VALUES(26, 'Pat', 'BARKER');
INSERT INTO `auteur` VALUES(27, 'Julian', 'BARNES');
INSERT INTO `auteur` VALUES(28, 'John', 'BARROW');
INSERT INTO `auteur` VALUES(29, 'John', 'BARTH');
INSERT INTO `auteur` VALUES(30, 'Samuel', 'BECKETT');
INSERT INTO `auteur` VALUES(31, 'Max', 'BEERBOHM');
INSERT INTO `auteur` VALUES(32, 'Saul', 'BELLOW');
INSERT INTO `auteur` VALUES(33, 'Tonino', 'BENACQUISTA');
INSERT INTO `auteur` VALUES(34, 'Peter', 'BENCHLEY');
INSERT INTO `auteur` VALUES(35, 'Stephen Vincent', 'BENÈT');
INSERT INTO `auteur` VALUES(36, 'Arnold', 'BENNETT');
INSERT INTO `auteur` VALUES(37, 'E. F.', 'BENSON');
INSERT INTO `auteur` VALUES(38, '', 'BEOWULF');
INSERT INTO `auteur` VALUES(39, 'Isaiah', 'BERLIN');
INSERT INTO `auteur` VALUES(40, '', 'BETJEMAN JOHN');
INSERT INTO `auteur` VALUES(41, 'William', 'BLAKE');
INSERT INTO `auteur` VALUES(42, 'Harold', 'BLOOM');
INSERT INTO `auteur` VALUES(43, 'Luciano', 'BOLIS');
INSERT INTO `auteur` VALUES(44, 'Edward', 'BOND');
INSERT INTO `auteur` VALUES(45, 'Guy', 'BOQUET');
INSERT INTO `auteur` VALUES(46, 'Elizabeth', 'BOWEN');
INSERT INTO `auteur` VALUES(47, 'Malcolm', 'BOWIE');
INSERT INTO `auteur` VALUES(48, 'Paul', 'BOWLES');
INSERT INTO `auteur` VALUES(49, 'William', 'BOYD');
INSERT INTO `auteur` VALUES(50, 'M.C.', 'BRADBROOK');
INSERT INTO `auteur` VALUES(51, 'George', 'BRENNAND');
INSERT INTO `auteur` VALUES(52, '(Anne, Charlotte, EmilyCollins collective ed.)', 'BRONTE SISTERS');
INSERT INTO `auteur` VALUES(53, 'Anita', 'BROOKNER');
INSERT INTO `auteur` VALUES(54, 'Robert', 'BROWNING');
INSERT INTO `auteur` VALUES(55, 'Ken', 'BRUEN');
INSERT INTO `auteur` VALUES(56, 'Bill', 'BRYSON');
INSERT INTO `auteur` VALUES(57, 'Pearl', 'BUCK');
INSERT INTO `auteur` VALUES(58, 'Basil', 'BUNTING');
INSERT INTO `auteur` VALUES(59, 'John', 'BUNYAN');
INSERT INTO `auteur` VALUES(60, 'Anthony ', 'BURGESS');
INSERT INTO `auteur` VALUES(61, 'Anthony', 'BURGESS');
INSERT INTO `auteur` VALUES(62, 'Frances Hodgson', 'BURNETT');
INSERT INTO `auteur` VALUES(63, 'Fanny', 'BURNEY');
INSERT INTO `auteur` VALUES(64, 'Robert', 'BURNS');
INSERT INTO `auteur` VALUES(65, 'William', 'BURROUGHS');
INSERT INTO `auteur` VALUES(66, 'Robert Olen', 'BUTLER');
INSERT INTO `auteur` VALUES(67, 'Samuel', 'BUTLER');
INSERT INTO `auteur` VALUES(68, 'A. S.', 'BYATT');
INSERT INTO `auteur` VALUES(69, '', 'BYRON');
INSERT INTO `auteur` VALUES(70, 'Bo', 'CALDWELL');
INSERT INTO `auteur` VALUES(71, 'Erskine', 'CALDWELL');
INSERT INTO `auteur` VALUES(72, 'Italo', 'CALVINO');
INSERT INTO `auteur` VALUES(73, 'Ethan', 'CANIN');
INSERT INTO `auteur` VALUES(74, 'Victor', 'CANNING');
INSERT INTO `auteur` VALUES(75, 'Peter', 'CAREY');
INSERT INTO `auteur` VALUES(76, 'William ', 'CARLOS WILLIAMS');
INSERT INTO `auteur` VALUES(77, 'Thomas', 'CARLYLE');
INSERT INTO `auteur` VALUES(78, 'Caleb', 'CARR');
INSERT INTO `auteur` VALUES(79, 'John Dickson', 'CARR');
INSERT INTO `auteur` VALUES(80, 'Lewis', 'CARROLL');
INSERT INTO `auteur` VALUES(81, 'Youngman', 'CARTER');
INSERT INTO `auteur` VALUES(82, 'Michael', 'CHABON');
INSERT INTO `auteur` VALUES(83, 'Raymond', 'CHANDLER');
INSERT INTO `auteur` VALUES(84, 'Bruce', 'CHATWIN');
INSERT INTO `auteur` VALUES(85, '', 'CHAUCER');
INSERT INTO `auteur` VALUES(86, 'Erskine', 'CHILDERS');
INSERT INTO `auteur` VALUES(87, 'Kate', 'CHOPIN');
INSERT INTO `auteur` VALUES(88, 'James', 'CLAVELL');
INSERT INTO `auteur` VALUES(89, 'Samuel', 'CLEMENS');
INSERT INTO `auteur` VALUES(90, 'J. M.', 'COETZEE');
INSERT INTO `auteur` VALUES(91, 'Leonard', 'COHEN');
INSERT INTO `auteur` VALUES(92, '', 'COLERIDGE');
INSERT INTO `auteur` VALUES(93, 'Norman', 'COLLINS');
INSERT INTO `auteur` VALUES(94, 'Wilkie', 'COLLINS');
INSERT INTO `auteur` VALUES(95, 'Ivy', 'COMPTON-BURNETT');
INSERT INTO `auteur` VALUES(96, 'Richard', 'CONDON');
INSERT INTO `auteur` VALUES(97, 'Joseph', 'CONRAD');
INSERT INTO `auteur` VALUES(98, 'Pat', 'CONROY');
INSERT INTO `auteur` VALUES(99, 'Peter ', 'COSTELLO');
INSERT INTO `auteur` VALUES(100, 'Stephen', 'CRANE');
INSERT INTO `auteur` VALUES(101, '/biograph Joyce', 'CRITICISM');
INSERT INTO `auteur` VALUES(102, 'James ', 'CRITICISM');
INSERT INTO `auteur` VALUES(103, 'A. J.', 'CRONIN');
INSERT INTO `auteur` VALUES(104, 'Amanda', 'CROSS');
INSERT INTO `auteur` VALUES(105, 'E. E.', 'CUMMINGS');
INSERT INTO `auteur` VALUES(106, 'Louis', 'DE BERNIÈRES');
INSERT INTO `auteur` VALUES(107, 'Umberto ', 'ECO');
INSERT INTO `auteur` VALUES(108, 'Richard ', 'ELLMANN');
INSERT INTO `auteur` VALUES(109, 'Richard', 'EMERY ROBERTS');
INSERT INTO `auteur` VALUES(110, 'Xingjian ', 'GAO');
INSERT INTO `auteur` VALUES(111, 'Henry ', 'JAMES');
INSERT INTO `auteur` VALUES(112, 'M.R', 'JAMES');
INSERT INTO `auteur` VALUES(113, 'P D', 'JAMES');
INSERT INTO `auteur` VALUES(114, 'K Jerome', 'JEROME');
INSERT INTO `auteur` VALUES(115, 'Ben ', 'JOHNSON');
INSERT INTO `auteur` VALUES(116, 'Samuel ', 'JOHNSON');
INSERT INTO `auteur` VALUES(117, 'James ', 'JOYCE');
INSERT INTO `auteur` VALUES(118, 'Stanislaus ', 'JOYCE');
INSERT INTO `auteur` VALUES(119, 'Art ', 'JOYCE''S');
INSERT INTO `auteur` VALUES(120, 'Bill ', 'KAUFMAN');
INSERT INTO `auteur` VALUES(121, 'M.N ', 'KAYE');
INSERT INTO `auteur` VALUES(122, 'John ', 'KEATS');
INSERT INTO `auteur` VALUES(123, 'G ', 'KEILOR');
INSERT INTO `auteur` VALUES(124, 'James ', 'KELMAN');
INSERT INTO `auteur` VALUES(125, 'Frank', 'KERMODE');
INSERT INTO `auteur` VALUES(126, 'Rudyard ', 'KIPLING');
INSERT INTO `auteur` VALUES(127, 'Milan ', 'KUNDERA');
INSERT INTO `auteur` VALUES(128, 'Charles', 'LAMB');
INSERT INTO `auteur` VALUES(129, 'Laurence', 'LERNER');
INSERT INTO `auteur` VALUES(130, 'Harry', 'LEVIN');
INSERT INTO `auteur` VALUES(131, 'Martin', 'LING');
INSERT INTO `auteur` VALUES(132, 'Brenda ', 'MADDOX');
INSERT INTO `auteur` VALUES(133, 'Richard', 'MARIENTRAS');
INSERT INTO `auteur` VALUES(134, 'Jean-Jacques', 'MAYOUX');
INSERT INTO `auteur` VALUES(135, 'Edna ', 'O''BRIAN');
INSERT INTO `auteur` VALUES(136, 'Jean', 'PARIS');
INSERT INTO `auteur` VALUES(137, 'Patrick ', 'PAVINDER');
INSERT INTO `auteur` VALUES(138, 'Arthur ', 'POWER');
INSERT INTO `auteur` VALUES(139, 'Jean-Michel ', 'RABATÉ');
INSERT INTO `auteur` VALUES(140, 'Ann', 'RADCLIFFE');
INSERT INTO `auteur` VALUES(141, 'Ian', 'RANKIN');
INSERT INTO `auteur` VALUES(142, 'Jean', 'RHYS');
INSERT INTO `auteur` VALUES(143, 'Adrienne', 'RICH ');
INSERT INTO `auteur` VALUES(144, 'Alan', 'RICHARDS');
INSERT INTO `auteur` VALUES(145, 'Samuel', 'RICHARDSON');
INSERT INTO `auteur` VALUES(146, 'Nora', 'ROBERTS');
INSERT INTO `auteur` VALUES(147, 'E. Arnot', 'ROBERTSON');
INSERT INTO `auteur` VALUES(148, 'Henry', 'ROTH');
INSERT INTO `auteur` VALUES(149, 'Philip', 'ROTH');
INSERT INTO `auteur` VALUES(150, 'Arundhati', 'ROY');
INSERT INTO `auteur` VALUES(151, 'Donald', 'RUBINSTEIN');
INSERT INTO `auteur` VALUES(152, 'Steele', 'RUDD ');
INSERT INTO `auteur` VALUES(153, 'Salman', 'RUSHDIE');
INSERT INTO `auteur` VALUES(154, 'Vita ', 'SACKVILLE-WEST');
INSERT INTO `auteur` VALUES(155, '', 'SAKI');
INSERT INTO `auteur` VALUES(156, '', 'SALINGER');
INSERT INTO `auteur` VALUES(157, 'Thomas', 'SANCHEZ');
INSERT INTO `auteur` VALUES(158, 'William', 'SAROYAN');
INSERT INTO `auteur` VALUES(159, 'Siegfried', 'SASSOON');
INSERT INTO `auteur` VALUES(160, 'Pieg', 'SAYERS');
INSERT INTO `auteur` VALUES(161, 'Budd', 'SCHULBERG');
INSERT INTO `auteur` VALUES(162, 'Paul', 'SCOTT');
INSERT INTO `auteur` VALUES(163, 'Walter', 'SCOTT');
INSERT INTO `auteur` VALUES(164, 'Erich', 'SEGAL');
INSERT INTO `auteur` VALUES(165, 'Will', 'SELF');
INSERT INTO `auteur` VALUES(166, 'WC', 'SELLER');
INSERT INTO `auteur` VALUES(167, 'Ramon', 'SENDER');
INSERT INTO `auteur` VALUES(168, 'Vikram', 'SETH');
INSERT INTO `auteur` VALUES(169, 'George', 'SEWARD');
INSERT INTO `auteur` VALUES(170, 'Peter', 'SHAFFER');
INSERT INTO `auteur` VALUES(171, 'William', 'SHAKESPEARE');
INSERT INTO `auteur` VALUES(172, 'Edward', 'SHANKS ');
INSERT INTO `auteur` VALUES(173, 'Tom', 'SHARPE');
INSERT INTO `auteur` VALUES(174, 'Bernard', 'SHAW');
INSERT INTO `auteur` VALUES(175, 'Mary', 'SHELLEY');
INSERT INTO `auteur` VALUES(176, 'Percy Bysshe', 'SHELLEY');
INSERT INTO `auteur` VALUES(177, 'Mary, Horace, William', 'SHELLEY, WALPOLE, BECKFORD');
INSERT INTO `auteur` VALUES(178, 'Sam', 'SHEPHERD');
INSERT INTO `auteur` VALUES(179, 'Richard', 'SHERIDAN');
INSERT INTO `auteur` VALUES(180, 'Carol', 'SHIELDS');
INSERT INTO `auteur` VALUES(181, 'Nevil', 'SHUTE');
INSERT INTO `auteur` VALUES(182, 'Philip', 'SIDNEY');
INSERT INTO `auteur` VALUES(183, 'Alan', 'SILLITOE');
INSERT INTO `auteur` VALUES(184, 'Stevie', 'SMITH');
INSERT INTO `auteur` VALUES(185, 'Zadie', 'SMITH');
INSERT INTO `auteur` VALUES(186, 'Iain', 'SMITH CRICHTON');
INSERT INTO `auteur` VALUES(187, 'Tobias', 'SMOLLET');
INSERT INTO `auteur` VALUES(188, 'C.P.', 'SNOW');
INSERT INTO `auteur` VALUES(189, 'H ', 'SOUGAU');
INSERT INTO `auteur` VALUES(190, 'Terry', 'SOUTERN');
INSERT INTO `auteur` VALUES(191, 'Wole', 'SOYINKA');
INSERT INTO `auteur` VALUES(192, 'Muriel', 'SPARK');
INSERT INTO `auteur` VALUES(193, 'Stephen', 'SPENDER');
INSERT INTO `auteur` VALUES(194, 'Art', 'SPIEGELMAN');
INSERT INTO `auteur` VALUES(195, 'Bernard', 'SPILSBURY');
INSERT INTO `auteur` VALUES(196, 'Gertrude', 'STEIN');
INSERT INTO `auteur` VALUES(197, 'John', 'STEINBECK');
INSERT INTO `auteur` VALUES(198, 'George', 'STEINER');
INSERT INTO `auteur` VALUES(199, 'Thomas', 'STERLING');
INSERT INTO `auteur` VALUES(200, 'Laurence', 'STERNE');
INSERT INTO `auteur` VALUES(201, 'Wallace', 'STEVENS');
INSERT INTO `auteur` VALUES(202, 'Robert Louis', 'STEVENSON');
INSERT INTO `auteur` VALUES(203, 'Bram', 'STOCKER');
INSERT INTO `auteur` VALUES(204, 'Tom', 'STOPPARD');
INSERT INTO `auteur` VALUES(205, 'David', 'STOREY');
INSERT INTO `auteur` VALUES(206, 'Lytton', 'STRACHEY');
INSERT INTO `auteur` VALUES(207, 'August', 'STRINBERG');
INSERT INTO `auteur` VALUES(208, 'William', 'STYRON');
INSERT INTO `auteur` VALUES(209, 'Patrick', 'SUSKIND');
INSERT INTO `auteur` VALUES(210, 'G.', 'SWIFT');
INSERT INTO `auteur` VALUES(211, '', 'SWIFT');
INSERT INTO `auteur` VALUES(212, '', 'SWINBURNE');
INSERT INTO `auteur` VALUES(213, 'Frank', 'SWINNERTON');
INSERT INTO `auteur` VALUES(214, '', 'SYNGE');
INSERT INTO `auteur` VALUES(215, 'Frank', 'TALLIS');
INSERT INTO `auteur` VALUES(216, 'Elizabeth', 'TAYLOR');
INSERT INTO `auteur` VALUES(217, '', 'TENNYSON');
INSERT INTO `auteur` VALUES(218, 'Hubert', 'TEYSSANDIER');
INSERT INTO `auteur` VALUES(219, '', 'THACKERAY');
INSERT INTO `auteur` VALUES(220, 'Paul', 'THEROUX');
INSERT INTO `auteur` VALUES(221, 'Craig', 'THOMAS');
INSERT INTO `auteur` VALUES(222, 'D.M.', 'THOMAS');
INSERT INTO `auteur` VALUES(223, 'Dylan', 'THOMAS');
INSERT INTO `auteur` VALUES(224, 'R', 'THOMAS');
INSERT INTO `auteur` VALUES(225, 'Rupert', 'THOMAS');
INSERT INTO `auteur` VALUES(226, 'Edward', 'THOMPSON');
INSERT INTO `auteur` VALUES(227, '', 'THOREAU');
INSERT INTO `auteur` VALUES(228, 'Colin', 'THUBRON');
INSERT INTO `auteur` VALUES(229, 'Colm', 'TOIBIN');
INSERT INTO `auteur` VALUES(230, 'J.R.R.', 'TOLKIEN');
INSERT INTO `auteur` VALUES(231, '', 'TOLSTOY');
INSERT INTO `auteur` VALUES(232, 'John Kennedy', 'TOOLE');
INSERT INTO `auteur` VALUES(233, 'Jean', 'TOOMER');
INSERT INTO `auteur` VALUES(234, 'Sue', 'TOWNSEND');
INSERT INTO `auteur` VALUES(235, 'William', 'TREVOR');
INSERT INTO `auteur` VALUES(236, '', 'TROLLOPE');
INSERT INTO `auteur` VALUES(237, 'Mark', 'TWAIN');
INSERT INTO `auteur` VALUES(238, 'Jill', 'TWEEDIE');
INSERT INTO `auteur` VALUES(239, 'John', 'UPDIKE');
INSERT INTO `auteur` VALUES(240, 'Peter', 'USTINOV');
INSERT INTO `auteur` VALUES(241, 'Robert', 'VAN GULIK');
INSERT INTO `auteur` VALUES(242, 'John', 'VANBRUGH');
INSERT INTO `auteur` VALUES(243, '', 'VATSANANANA');
INSERT INTO `auteur` VALUES(244, 'Henry', 'VAUGHAM');
INSERT INTO `auteur` VALUES(245, 'Sally', 'VICKERS');
INSERT INTO `auteur` VALUES(246, 'Gore', 'VIDAL');
INSERT INTO `auteur` VALUES(247, 'Barbara', 'VINE');
INSERT INTO `auteur` VALUES(248, '', 'VIRGIL');
INSERT INTO `auteur` VALUES(249, 'John ', 'WAIN');
INSERT INTO `auteur` VALUES(250, 'Alice ', 'WALKER');
INSERT INTO `auteur` VALUES(251, 'Lewis ', 'WALLACE');
INSERT INTO `auteur` VALUES(252, 'Robert James', 'WALLER');
INSERT INTO `auteur` VALUES(253, 'Horace ', 'WALPOLE');
INSERT INTO `auteur` VALUES(254, 'Hugh ', 'WALPOLE');
INSERT INTO `auteur` VALUES(255, 'Evelyn ', 'WAUGH');
INSERT INTO `auteur` VALUES(256, 'Beatrice ', 'WEBB');
INSERT INTO `auteur` VALUES(257, 'Charles ', 'WEBB');
INSERT INTO `auteur` VALUES(258, 'Mary ', 'WEBB');
INSERT INTO `auteur` VALUES(259, 'John ', 'WEBSTER');
INSERT INTO `auteur` VALUES(260, 'Fay ', 'WELDON');
INSERT INTO `auteur` VALUES(261, 'H. G.', 'WELLS');
INSERT INTO `auteur` VALUES(262, 'Arnold ', 'WESKER');
INSERT INTO `auteur` VALUES(263, 'Dorothy ', 'WEST');
INSERT INTO `auteur` VALUES(264, 'Morris ', 'WEST');
INSERT INTO `auteur` VALUES(265, 'Nathaniel ', 'WEST');
INSERT INTO `auteur` VALUES(266, 'Edith ', 'WHARTON');
INSERT INTO `auteur` VALUES(267, 'Patrick ', 'WHITE');
INSERT INTO `auteur` VALUES(268, 'Walt ', 'WHITMAN');
INSERT INTO `auteur` VALUES(269, 'John Greenleaf', 'WHITTIER');
INSERT INTO `auteur` VALUES(270, 'Oscar ', 'WILDE');
INSERT INTO `auteur` VALUES(271, 'Thornton ', 'WILDER');
INSERT INTO `auteur` VALUES(272, 'Tennessee ', 'WILLIAMS');
INSERT INTO `auteur` VALUES(273, 'Angus ', 'WILSON');
INSERT INTO `auteur` VALUES(274, 'G.', 'WILSON KNIGHT');
INSERT INTO `auteur` VALUES(275, 'Ruth R.', 'WINE');
INSERT INTO `auteur` VALUES(276, 'P. G.', 'WODEHOUSE');
INSERT INTO `auteur` VALUES(277, 'Thomas ', 'WOLFE');
INSERT INTO `auteur` VALUES(278, 'Tom ', 'WOLFE');
INSERT INTO `auteur` VALUES(279, 'Virginia ', 'WOOLF');
INSERT INTO `auteur` VALUES(280, 'Alexander ', 'WOOLLCOTT');
INSERT INTO `auteur` VALUES(281, 'William ', 'WORDSWORTH');
INSERT INTO `auteur` VALUES(282, 'Richard ', 'WRIGHT');
INSERT INTO `auteur` VALUES(283, 'W. B.', 'YEATS');
INSERT INTO `auteur` VALUES(284, 'Francis Brett', 'YOUNG');
INSERT INTO `auteur` VALUES(285, 'Theodore ', 'ZELDIN');

DROP TABLE IF EXISTS `config`;
CREATE TABLE `config` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `identifiant` varchar(255) NOT NULL,
  `valeur` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

INSERT INTO `config` VALUES(1, 'versionbdd', '0.9');

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=26 ;

INSERT INTO `emprunteur` VALUES(1, 'Aduriz', 'Xavier', 21, 'rue du vieux chêne', 'ARBOUSIER', '23453', 'toto', 'monSuperPass1', '0123456789', '0612345789', 'email@example.org');
INSERT INTO `emprunteur` VALUES(2, 'Akoka', 'Serge', 21, 'rue du vieux chêne', 'ARBOUSIER', '23453', 'toto', 'monSuperPass1', '0123456789', '0612345789', 'email@example.org');
INSERT INTO `emprunteur` VALUES(3, 'Ane', 'Jean-Marc', 21, 'rue du vieux chêne', 'ARBOUSIER', '23453', 'toto', 'monSuperPass1', '0123456789', '0612345789', 'email@example.org');
INSERT INTO `emprunteur` VALUES(4, 'Arab', 'Rachid', 21, 'rue du vieux chêne', 'ARBOUSIER', '23453', 'toto', 'monSuperPass1', '0123456789', '0612345789', 'email@example.org');
INSERT INTO `emprunteur` VALUES(5, 'Bourdin', 'Régis', 21, 'rue du vieux chêne', 'ARBOUSIER', '23453', 'toto', 'monSuperPass1', '0123456789', '0612345789', 'email@example.org');
INSERT INTO `emprunteur` VALUES(6, 'Boulanger', 'Christophe', 21, 'rue du vieux chêne', 'ARBOUSIER', '23453', 'toto', 'monSuperPass1', '0123456789', '0612345789', 'email@example.org');
INSERT INTO `emprunteur` VALUES(7, 'Boivin', 'Arnaud', 21, 'rue du vieux chêne', 'ARBOUSIER', '23453', 'toto', 'monSuperPass1', '0123456789', '0612345789', 'email@example.org');
INSERT INTO `emprunteur` VALUES(8, 'Bigot', 'Erwan', 21, 'rue du vieux chêne', 'ARBOUSIER', '23453', 'toto', 'monSuperPass1', '0123456789', '0612345789', 'email@example.org');
INSERT INTO `emprunteur` VALUES(9, 'Delcroix', 'Brigitte', 21, 'rue du vieux chêne', 'ARBOUSIER', '23453', 'toto', 'monSuperPass1', '0123456789', '0612345789', 'email@example.org');
INSERT INTO `emprunteur` VALUES(10, 'Fauvin', 'Michel', 21, 'rue du vieux chêne', 'ARBOUSIER', '23453', 'toto', 'monSuperPass1', '0123456789', '0612345789', 'email@example.org');
INSERT INTO `emprunteur` VALUES(11, 'Busquet', 'Catherine', 21, 'rue du vieux chêne', 'ARBOUSIER', '23453', 'toto', 'monSuperPass1', '0123456789', '0612345789', 'email@example.org');
INSERT INTO `emprunteur` VALUES(12, 'Flores', 'Guy', 21, 'rue du vieux chêne', 'ARBOUSIER', '23453', 'toto', 'monSuperPass1', '0123456789', '0612345789', 'email@example.org');
INSERT INTO `emprunteur` VALUES(13, 'Garnier', 'Olivier', 21, 'rue du vieux chêne', 'ARBOUSIER', '23453', 'toto', 'monSuperPass1', '0123456789', '0612345789', 'email@example.org');
INSERT INTO `emprunteur` VALUES(14, 'Gilbert', 'Franck', 21, 'rue du vieux chêne', 'ARBOUSIER', '23453', 'toto', 'monSuperPass1', '0123456789', '0612345789', 'email@example.org');
INSERT INTO `emprunteur` VALUES(15, 'Gousset', 'Thierry', 21, 'rue du vieux chêne', 'ARBOUSIER', '23453', 'toto', 'monSuperPass1', '0123456789', '0612345789', 'email@example.org');
INSERT INTO `emprunteur` VALUES(16, 'Giret', 'Agnès', 21, 'rue du vieux chêne', 'ARBOUSIER', '23453', 'toto', 'monSuperPass1', '0123456789', '0612345789', 'email@example.org');
INSERT INTO `emprunteur` VALUES(17, 'Blain', 'Françoise', 21, 'rue du vieux chêne', 'ARBOUSIER', '23453', 'toto', 'monSuperPass1', '0123456789', '0612345789', 'email@example.org');
INSERT INTO `emprunteur` VALUES(18, 'Cance', 'Claude', 21, 'rue du vieux chêne', 'ARBOUSIER', '23453', 'toto', 'monSuperPass1', '0123456789', '0612345789', 'email@example.org');
INSERT INTO `emprunteur` VALUES(19, 'Desbois', 'Laure', 21, 'rue du vieux chêne', 'ARBOUSIER', '23453', 'toto', 'monSuperPass1', '0123456789', '0612345789', 'email@example.org');
INSERT INTO `emprunteur` VALUES(20, 'Flament', 'Madeleine', 21, 'rue du vieux chêne', 'ARBOUSIER', '23453', 'toto', 'monSuperPass1', '0123456789', '0612345789', 'email@example.org');
INSERT INTO `emprunteur` VALUES(21, 'Langlois', 'Pierre', 21, 'rue du vieux chêne', 'ARBOUSIER', '23453', 'toto', 'monSuperPass1', '0123456789', '0612345789', 'email@example.org');
INSERT INTO `emprunteur` VALUES(22, 'Leroy', 'Emmanuel', 21, 'rue du vieux chêne', 'ARBOUSIER', '23453', 'toto', 'monSuperPass1', '0123456789', '0612345789', 'email@example.org');
INSERT INTO `emprunteur` VALUES(23, 'Mazo', 'Loïc', 21, 'rue du vieux chêne', 'ARBOUSIER', '23453', 'toto', 'monSuperPass1', '0123456789', '0612345789', 'email@example.org');
INSERT INTO `emprunteur` VALUES(24, 'Tardy', 'Denis', 21, 'rue du vieux chêne', 'ARBOUSIER', '23453', 'toto', 'monSuperPass1', '0123456789', '0612345789', 'email@example.org');
INSERT INTO `emprunteur` VALUES(25, 'Vidal', 'Nicolas', 21, 'rue du vieux chêne', 'ARBOUSIER', '23453', 'toto', 'monSuperPass1', '0123456789', '0612345789', 'email@example.org');

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;


DROP TABLE IF EXISTS `genre`;
CREATE TABLE `genre` (
  `numGenre` int(10) NOT NULL AUTO_INCREMENT,
  `genre` varchar(50) NOT NULL,
  PRIMARY KEY (`numGenre`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;


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
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;


DROP TABLE IF EXISTS `livre`;
CREATE TABLE `livre` (
  `numLivre` int(11) NOT NULL AUTO_INCREMENT,
  `titreLivre` varchar(150) NOT NULL,
  `numAuteur` int(11) NOT NULL,
  `resumeLivre` text NOT NULL,
  `langueLivre` varchar(50) NOT NULL,
  `nbExemplaireLivre` tinyint(4) NOT NULL,
  PRIMARY KEY (`numLivre`),
  KEY `numAuteur` (`numAuteur`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=645 ;

INSERT INTO `livre` VALUES(1, 'Arrow of God', 1, '', 'Anglais', 1);
INSERT INTO `livre` VALUES(2, 'Chatterton    ', 2, '', 'Anglais', 1);
INSERT INTO `livre` VALUES(3, 'Dan Lenox and the Limehouse Golem    ', 2, '', 'Anglais', 1);
INSERT INTO `livre` VALUES(4, 'English Music    ', 2, '', 'Anglais', 1);
INSERT INTO `livre` VALUES(5, 'London : The Biography  ', 2, '', 'Anglais', 1);
INSERT INTO `livre` VALUES(6, 'The Great Fire of London    ', 2, '', 'Anglais', 1);
INSERT INTO `livre` VALUES(7, 'The House of Doctot Dee    ', 2, '', 'Anglais', 1);
INSERT INTO `livre` VALUES(8, 'Tales from Watership Down    ', 3, '', 'Anglais', 1);
INSERT INTO `livre` VALUES(9, 'The Scholar and the Serving Maid    ', 4, '', 'Anglais', 1);
INSERT INTO `livre` VALUES(10, 'Good Wives   ', 5, '', 'Anglais', 1);
INSERT INTO `livre` VALUES(11, 'Death of a Hero    ', 6, '', 'Anglais', 1);
INSERT INTO `livre` VALUES(12, 'Soft Answers    ', 6, '', 'Anglais', 1);
INSERT INTO `livre` VALUES(13, 'The Colonel’s Daughter  ', 6, '', 'Anglais', 1);
INSERT INTO `livre` VALUES(14, 'Largo of Eagles  ', 7, '', 'Anglais', 1);
INSERT INTO `livre` VALUES(15, 'In the Time of the Butherflies    ', 8, '', 'Anglais', 1);
INSERT INTO `livre` VALUES(16, 'The Riverside Villas Murder    ', 9, '', 'Anglais', 1);
INSERT INTO `livre` VALUES(17, 'Time’s Arrow    ', 10, '', 'Anglais', 1);
INSERT INTO `livre` VALUES(18, 'Tales   ', 11, '', 'Anglais', 1);
INSERT INTO `livre` VALUES(19, 'The Tamarind Seed  ', 12, '', 'Anglais', 1);
INSERT INTO `livre` VALUES(20, 'Connaissance de l’enfer ', 13, '', 'Anglais', 1);
INSERT INTO `livre` VALUES(21, 'The History of John Bull.', 14, '', 'Anglais', 1);
INSERT INTO `livre` VALUES(22, 'Sergeant Musgrave’s Dance    ', 15, '', 'Anglais', 1);
INSERT INTO `livre` VALUES(23, 'Arnold and the >Betrayal of Language    ', 16, '', 'Anglais', 1);
INSERT INTO `livre` VALUES(24, 'Arnold, the Poet and the Humanist    ', 16, '', 'Anglais', 1);
INSERT INTO `livre` VALUES(25, 'Culture and Anarchy    ', 16, '', 'Anglais', 1);
INSERT INTO `livre` VALUES(26, 'Selected Prose   ', 16, '', 'Anglais', 1);
INSERT INTO `livre` VALUES(27, 'The Human Croquet    ', 17, '', 'Anglais', 1);
INSERT INTO `livre` VALUES(28, 'Brief Lives    ', 18, '', 'Anglais', 1);
INSERT INTO `livre` VALUES(29, 'The Indifferent Children  ', 19, '', 'Anglais', 1);
INSERT INTO `livre` VALUES(30, 'Collected Poems    ', 20, '', 'Anglais', 1);
INSERT INTO `livre` VALUES(31, 'Emma (+ critical edition)    ', 21, '', 'Anglais', 1);
INSERT INTO `livre` VALUES(32, 'Lady Susan / The Watsons / Sanditon.    ', 21, '', 'Anglais', 1);
INSERT INTO `livre` VALUES(33, 'Man sfield Park (critical ed.)    ', 21, '', 'Anglais', 1);
INSERT INTO `livre` VALUES(34, 'Northanger Abbey    ', 21, '', 'Anglais', 1);
INSERT INTO `livre` VALUES(35, 'Sense and Sensibility    ', 21, '', 'Anglais', 1);
INSERT INTO `livre` VALUES(36, 'Leviathan    ', 22, '', 'Anglais', 1);
INSERT INTO `livre` VALUES(37, 'The Invention of Solitude    ', 22, '', 'Anglais', 1);
INSERT INTO `livre` VALUES(38, 'The L-shaped Room  ', 23, '', 'Anglais', 1);
INSERT INTO `livre` VALUES(39, 'Ishrael, connais ton Dieu ', 24, '', 'Anglais', 1);
INSERT INTO `livre` VALUES(40, 'Omnibus    ', 25, '', 'Anglais', 1);
INSERT INTO `livre` VALUES(41, 'The Ghost Road    ', 26, '', 'Anglais', 1);
INSERT INTO `livre` VALUES(42, 'A History of the World in 10 _ Chapters    ', 27, '', 'Anglais', 1);
INSERT INTO `livre` VALUES(43, 'Arthur and George    ', 27, '', 'Anglais', 1);
INSERT INTO `livre` VALUES(44, 'Flaubert’s Parrot    ', 27, '', 'Anglais', 1);
INSERT INTO `livre` VALUES(45, 'Someting to Declare    ', 27, '', 'Anglais', 1);
INSERT INTO `livre` VALUES(46, 'The Mutiny of the Bounty    ', 28, '', 'Anglais', 1);
INSERT INTO `livre` VALUES(47, 'Giles Goat-Boy    ', 29, '', 'Anglais', 1);
INSERT INTO `livre` VALUES(48, 'The Floating Opera    ', 29, '', 'Anglais', 1);
INSERT INTO `livre` VALUES(49, 'The Sot-Weed Factor    ', 29, '', 'Anglais', 1);
INSERT INTO `livre` VALUES(50, '2 Critical Studies    ', 30, '', 'Anglais', 1);
INSERT INTO `livre` VALUES(51, 'A Biography by Alvarez    ', 30, '', 'Anglais', 1);
INSERT INTO `livre` VALUES(52, 'Beckett (Cahiers de l’Herne)    ', 30, '', 'Anglais', 1);
INSERT INTO `livre` VALUES(53, 'Beckett (Écrivains de toujours)    ', 30, '', 'Anglais', 1);
INSERT INTO `livre` VALUES(54, 'More Pricks than Kicks    ', 30, '', 'Anglais', 1);
INSERT INTO `livre` VALUES(55, 'Murphy    ', 30, '', 'Anglais', 1);
INSERT INTO `livre` VALUES(56, 'The Expelled and other novellas    ', 30, '', 'Anglais', 1);
INSERT INTO `livre` VALUES(57, 'Waiting for Godot    ', 30, '', 'Anglais', 1);
INSERT INTO `livre` VALUES(58, 'Zuleika Dolson   ', 31, '', 'Anglais', 1);
INSERT INTO `livre` VALUES(59, 'Dangling Man    ', 32, '', 'Anglais', 1);
INSERT INTO `livre` VALUES(60, 'Henderson the Rain King    ', 32, '', 'Anglais', 1);
INSERT INTO `livre` VALUES(61, 'Herzog    ', 32, '', 'Anglais', 1);
INSERT INTO `livre` VALUES(62, 'Mosby’s Memoirs and Other Stories    ', 32, '', 'Anglais', 1);
INSERT INTO `livre` VALUES(63, 'Seize the day    ', 32, '', 'Anglais', 1);
INSERT INTO `livre` VALUES(64, 'The Adventures of Augie March    ', 32, '', 'Anglais', 1);
INSERT INTO `livre` VALUES(65, 'The Victim    ', 32, '', 'Anglais', 1);
INSERT INTO `livre` VALUES(66, 'To Jerusalem and Back    ', 32, '', 'Anglais', 1);
INSERT INTO `livre` VALUES(67, 'La Bête noire  ', 33, '', 'Anglais', 1);
INSERT INTO `livre` VALUES(68, 'Jaws    ', 34, '', 'Anglais', 1);
INSERT INTO `livre` VALUES(69, 'The Pocket Book  ', 35, '', 'Anglais', 1);
INSERT INTO `livre` VALUES(70, 'Riceyman Steps   ', 36, '', 'Anglais', 1);
INSERT INTO `livre` VALUES(71, 'The Old Wives’ Tale    ', 36, '', 'Anglais', 1);
INSERT INTO `livre` VALUES(72, 'Lucia Vitrix    ', 37, '', 'Anglais', 1);
INSERT INTO `livre` VALUES(73, 'The Song of Beowulf    ', 38, '', 'Anglais', 1);
INSERT INTO `livre` VALUES(74, 'The Sense of Reality    ', 39, '', 'Anglais', 1);
INSERT INTO `livre` VALUES(75, 'Summoned by Bells  ', 40, '', 'Anglais', 1);
INSERT INTO `livre` VALUES(76, 'Blake : The Lyric Poetry    ', 41, '', 'Anglais', 1);
INSERT INTO `livre` VALUES(77, 'Blake (U2 Armand Colin)    ', 41, '', 'Anglais', 1);
INSERT INTO `livre` VALUES(78, 'Poems (+ Monarch notes)    ', 41, '', 'Anglais', 1);
INSERT INTO `livre` VALUES(79, 'Songs of Innocence and Experience    ', 41, '', 'Anglais', 1);
INSERT INTO `livre` VALUES(80, 'Omens of Millennium    ', 42, '', 'Anglais', 1);
INSERT INTO `livre` VALUES(81, 'Mon grain de sable    ', 43, '', 'Anglais', 1);
INSERT INTO `livre` VALUES(82, 'Lear    ', 44, '', 'Anglais', 1);
INSERT INTO `livre` VALUES(83, 'Théâtre et société : Shakespeare', 45, '', 'Anglais', 1);
INSERT INTO `livre` VALUES(84, 'A World of Love ', 46, '', 'Anglais', 1);
INSERT INTO `livre` VALUES(85, 'Proust among the Stars    ', 47, '', 'Anglais', 1);
INSERT INTO `livre` VALUES(86, 'The Sheltering Sky    ', 48, '', 'Anglais', 1);
INSERT INTO `livre` VALUES(87, 'An Ice Cream War    ', 49, '', 'Anglais', 1);
INSERT INTO `livre` VALUES(88, 'Stars and Bars    ', 49, '', 'Anglais', 1);
INSERT INTO `livre` VALUES(89, 'The Blue Afternoon    ', 49, '', 'Anglais', 1);
INSERT INTO `livre` VALUES(90, 'The New Confessions    ', 49, '', 'Anglais', 1);
INSERT INTO `livre` VALUES(91, 'Themes and Conventions of Elizabethan Tragedy', 50, '', 'Anglais', 1);
INSERT INTO `livre` VALUES(92, 'Walton’s Delight   ', 51, '', 'Anglais', 1);
INSERT INTO `livre` VALUES(93, 'Jane Eyre    ', 52, '', 'Anglais', 1);
INSERT INTO `livre` VALUES(94, 'Shirley    ', 52, '', 'Anglais', 1);
INSERT INTO `livre` VALUES(95, 'The Professor, etc…  ', 52, '', 'Anglais', 1);
INSERT INTO `livre` VALUES(96, 'The Tenant of Wildfell Hall, Agnes Grey.', 52, '', 'Anglais', 1);
INSERT INTO `livre` VALUES(97, 'Villette    ', 52, '', 'Anglais', 1);
INSERT INTO `livre` VALUES(98, 'Wuthering Heights   ', 52, '', 'Anglais', 1);
INSERT INTO `livre` VALUES(99, 'A Closed Eye    ', 53, '', 'Anglais', 1);
INSERT INTO `livre` VALUES(100, 'A Family Romance    ', 53, '', 'Anglais', 1);
INSERT INTO `livre` VALUES(101, 'A Friend from England    ', 53, '', 'Anglais', 1);
INSERT INTO `livre` VALUES(102, 'A Private View    ', 53, '', 'Anglais', 1);
INSERT INTO `livre` VALUES(103, 'A Start in Life    ', 53, '', 'Anglais', 1);
INSERT INTO `livre` VALUES(104, 'Brief Lives    ', 53, '', 'Anglais', 1);
INSERT INTO `livre` VALUES(105, 'Family and Friends    ', 53, '', 'Anglais', 1);
INSERT INTO `livre` VALUES(106, 'Fraud    ', 53, '', 'Anglais', 1);
INSERT INTO `livre` VALUES(107, 'Hotel du Lac    ', 53, '', 'Anglais', 1);
INSERT INTO `livre` VALUES(108, 'Incidents in the rue Laugier', 53, '', 'Anglais', 1);
INSERT INTO `livre` VALUES(109, 'Latecomers    ', 53, '', 'Anglais', 1);
INSERT INTO `livre` VALUES(110, 'Lewis Percy    ', 53, '', 'Anglais', 1);
INSERT INTO `livre` VALUES(111, 'Look at Me    ', 53, '', 'Anglais', 1);
INSERT INTO `livre` VALUES(112, 'Providence    ', 53, '', 'Anglais', 1);
INSERT INTO `livre` VALUES(113, 'Visitors    ', 53, '', 'Anglais', 1);
INSERT INTO `livre` VALUES(114, 'Men and Women  ', 54, '', 'Anglais', 1);
INSERT INTO `livre` VALUES(115, 'Priest    ', 55, '', 'Anglais', 1);
INSERT INTO `livre` VALUES(116, 'A Walk in the Woods    ', 56, '', 'Anglais', 1);
INSERT INTO `livre` VALUES(117, 'Made in America    ', 56, '', 'Anglais', 1);
INSERT INTO `livre` VALUES(118, 'Neither Here nor There    ', 56, '', 'Anglais', 1);
INSERT INTO `livre` VALUES(119, 'Notes from a Big Country    ', 56, '', 'Anglais', 1);
INSERT INTO `livre` VALUES(120, 'Notes from a Small Island    ', 56, '', 'Anglais', 1);
INSERT INTO `livre` VALUES(121, 'The Mother Tongue : English    ', 56, '', 'Anglais', 1);
INSERT INTO `livre` VALUES(122, 'The Devil Never Sleeps    ', 57, '', 'Anglais', 1);
INSERT INTO `livre` VALUES(123, 'The Good Earth    ', 57, '', 'Anglais', 1);
INSERT INTO `livre` VALUES(124, 'Poems    ', 58, '', 'Anglais', 1);
INSERT INTO `livre` VALUES(125, 'The Pilgrim’s Progress    ', 59, '', 'Anglais', 1);
INSERT INTO `livre` VALUES(126, 'Rejoyce', 60, '', 'Anglais', 1);
INSERT INTO `livre` VALUES(127, 'Revue Europe Special Joyce', 60, '', 'Anglais', 1);
INSERT INTO `livre` VALUES(128, 'A Deadman in Deptford    ', 61, '', 'Anglais', 1);
INSERT INTO `livre` VALUES(129, 'Earthly Powers   ', 61, '', 'Anglais', 1);
INSERT INTO `livre` VALUES(130, 'Nothing like the Sun    ', 61, '', 'Anglais', 1);
INSERT INTO `livre` VALUES(131, 'The Secret Garden  ', 62, '', 'Anglais', 1);
INSERT INTO `livre` VALUES(132, 'Evelina    ', 63, '', 'Anglais', 1);
INSERT INTO `livre` VALUES(133, 'The Diary of Fanny Burney    ', 63, '', 'Anglais', 1);
INSERT INTO `livre` VALUES(134, 'Poems    ', 64, '', 'Anglais', 1);
INSERT INTO `livre` VALUES(135, 'The Soft Machine  ', 65, '', 'Anglais', 1);
INSERT INTO `livre` VALUES(136, 'L’extraterrestre de mon cœur    ', 66, '', 'Anglais', 1);
INSERT INTO `livre` VALUES(137, 'The White Russian  ', 66, '', 'Anglais', 1);
INSERT INTO `livre` VALUES(138, 'Erewhon    ', 67, '', 'Anglais', 1);
INSERT INTO `livre` VALUES(139, 'The Way of All Flesh    ', 67, '', 'Anglais', 1);
INSERT INTO `livre` VALUES(140, 'The Matisse Stories    ', 68, '', 'Anglais', 1);
INSERT INTO `livre` VALUES(141, 'Poems    ', 69, '', 'Anglais', 1);
INSERT INTO `livre` VALUES(142, 'The Distant Land of my Father    ', 70, '', 'Anglais', 1);
INSERT INTO `livre` VALUES(143, 'God’s Little Acre    ', 71, '', 'Anglais', 1);
INSERT INTO `livre` VALUES(144, 'Journeyman    ', 71, '', 'Anglais', 1);
INSERT INTO `livre` VALUES(145, 'If on a Winter’s Night a Traveller    ', 72, '', 'Anglais', 1);
INSERT INTO `livre` VALUES(146, 'The Palace Thief    ', 73, '', 'Anglais', 1);
INSERT INTO `livre` VALUES(147, 'The Golden Salamander    ', 74, '', 'Anglais', 1);
INSERT INTO `livre` VALUES(148, 'Oscar and Lucinda    ', 75, '', 'Anglais', 1);
INSERT INTO `livre` VALUES(149, 'A Study', 76, '', 'Anglais', 1);
INSERT INTO `livre` VALUES(150, 'Poems', 76, '', 'Anglais', 1);
INSERT INTO `livre` VALUES(151, 'Sartor Resartus.   ', 77, '', 'Anglais', 1);
INSERT INTO `livre` VALUES(152, 'The Alienist    ', 78, '', 'Anglais', 1);
INSERT INTO `livre` VALUES(153, 'The Mad Hatter’s Mystery ', 79, '', 'Anglais', 1);
INSERT INTO `livre` VALUES(154, 'Works    ', 80, '', 'Anglais', 1);
INSERT INTO `livre` VALUES(155, 'Mr Campion’s Falcon  ', 81, '', 'Anglais', 1);
INSERT INTO `livre` VALUES(156, 'The Mysteries of Pittsburgh ', 82, '', 'Anglais', 1);
INSERT INTO `livre` VALUES(157, 'Collected Works (vol 1) ', 83, '', 'Anglais', 1);
INSERT INTO `livre` VALUES(158, 'What Am I Doing Here ?    ', 84, '', 'Anglais', 1);
INSERT INTO `livre` VALUES(159, 'An Introduction to Troilus and Criseyde    ', 85, '', 'Anglais', 1);
INSERT INTO `livre` VALUES(160, 'Troilus and Criseyde    ', 85, '', 'Anglais', 1);
INSERT INTO `livre` VALUES(161, 'The Riddle of the Sands', 86, '', 'Anglais', 1);
INSERT INTO `livre` VALUES(162, 'The Awakening    ', 87, '', 'Anglais', 1);
INSERT INTO `livre` VALUES(163, 'Tai-Pan    ', 88, '', 'Anglais', 1);
INSERT INTO `livre` VALUES(164, 'Langhorne (Mark Twain) : Pudd’nhead Wilson.', 89, '', 'Anglais', 1);
INSERT INTO `livre` VALUES(165, 'Waiting for the Barbarians    ', 90, '', 'Anglais', 1);
INSERT INTO `livre` VALUES(166, 'Beautiful Losers    ', 91, '', 'Anglais', 1);
INSERT INTO `livre` VALUES(167, 'The Favourite Game    ', 91, '', 'Anglais', 1);
INSERT INTO `livre` VALUES(168, 'Poetical Works    ', 92, '', 'Anglais', 1);
INSERT INTO `livre` VALUES(169, 'Penang Appointment   ', 93, '', 'Anglais', 1);
INSERT INTO `livre` VALUES(170, 'The Moonstone    ', 94, '', 'Anglais', 1);
INSERT INTO `livre` VALUES(171, 'The Woman in White    ', 94, '', 'Anglais', 1);
INSERT INTO `livre` VALUES(172, 'A Family and a Fortune', 95, '', 'Anglais', 1);
INSERT INTO `livre` VALUES(173, 'The Last and the First    ', 95, '', 'Anglais', 1);
INSERT INTO `livre` VALUES(174, 'The Manchurian Candidate  ', 96, '', 'Anglais', 1);
INSERT INTO `livre` VALUES(175, 'Heart of Darkness    ', 97, '', 'Anglais', 1);
INSERT INTO `livre` VALUES(176, 'Nostromo    ', 97, '', 'Anglais', 1);
INSERT INTO `livre` VALUES(177, 'The Nigger of the Narcissus    ', 97, '', 'Anglais', 1);
INSERT INTO `livre` VALUES(178, 'The Secret Agent    ', 97, '', 'Anglais', 1);
INSERT INTO `livre` VALUES(179, 'Victory    ', 97, '', 'Anglais', 1);
INSERT INTO `livre` VALUES(180, 'The Water is Wide    ', 98, '', 'Anglais', 1);
INSERT INTO `livre` VALUES(181, 'A Reader''s Guide to Finnegans Wake', 99, '', 'Anglais', 1);
INSERT INTO `livre` VALUES(182, 'A Skeleton Key to Finnegans Wake', 99, '', 'Anglais', 1);
INSERT INTO `livre` VALUES(183, 'Annotation to Finnegans Wake', 99, '', 'Anglais', 1);
INSERT INTO `livre` VALUES(184, 'Dubliners A Study(2)', 99, '', 'Anglais', 1);
INSERT INTO `livre` VALUES(185, 'Joyce Annotated Notes for Dubliners and A Portrait of an Artist as a Young Man', 99, '', 'Anglais', 1);
INSERT INTO `livre` VALUES(186, 'The Life of Leopold Bloom a novel', 99, '', 'Anglais', 1);
INSERT INTO `livre` VALUES(187, 'The Portrait of an Artist as a Young Man, a Study+ a Student''s Guide', 99, '', 'Anglais', 1);
INSERT INTO `livre` VALUES(188, 'Maggie, a Girl of the Street    ', 100, '', 'Anglais', 1);
INSERT INTO `livre` VALUES(189, 'The Red Badge of Courage and other stories    ', 100, '', 'Anglais', 1);
INSERT INTO `livre` VALUES(190, 'La Cuo O Litteraire', 102, '', 'Anglais', 1);
INSERT INTO `livre` VALUES(191, 'The Art of the Novel', 102, '', 'Anglais', 1);
INSERT INTO `livre` VALUES(192, 'The Portable James', 102, '', 'Anglais', 1);
INSERT INTO `livre` VALUES(193, 'Three critical studies', 102, '', 'Anglais', 1);
INSERT INTO `livre` VALUES(194, 'Une amitié litteraire', 102, '', 'Anglais', 1);
INSERT INTO `livre` VALUES(195, 'The Judas Tree    ', 103, '', 'Anglais', 1);
INSERT INTO `livre` VALUES(196, 'An Imperfect Spy    ', 104, '', 'Anglais', 1);
INSERT INTO `livre` VALUES(197, 'Poetic Justice    ', 104, '', 'Anglais', 1);
INSERT INTO `livre` VALUES(198, 'The James Joyce Murder    ', 104, '', 'Anglais', 1);
INSERT INTO `livre` VALUES(199, 'The Players come again    ', 104, '', 'Anglais', 1);
INSERT INTO `livre` VALUES(200, 'The Question of Max    ', 104, '', 'Anglais', 1);
INSERT INTO `livre` VALUES(201, 'The Theban Mysteries    ', 104, '', 'Anglais', 1);
INSERT INTO `livre` VALUES(202, 'Poems    ', 105, '', 'Anglais', 1);
INSERT INTO `livre` VALUES(203, 'Captain Corelli’s Mandolin  ', 106, '', 'Anglais', 1);
INSERT INTO `livre` VALUES(204, 'Joyce A Clew', 107, '', 'Anglais', 1);
INSERT INTO `livre` VALUES(205, 'Joyce Revue de Littérature Moderne Vol 1-2', 107, '', 'Anglais', 1);
INSERT INTO `livre` VALUES(206, 'Joyce the Revolution of the Word', 107, '', 'Anglais', 1);
INSERT INTO `livre` VALUES(207, 'The Middle Ages of Joyce', 107, '', 'Anglais', 1);
INSERT INTO `livre` VALUES(208, 'A Guide through Ulysses The New Bloomsday Book', 108, '', 'Anglais', 1);
INSERT INTO `livre` VALUES(209, 'A Making of Ulysses', 108, '', 'Anglais', 1);
INSERT INTO `livre` VALUES(210, 'A Study', 108, '', 'Anglais', 1);
INSERT INTO `livre` VALUES(211, 'Détour et Retour dans Ulysses', 108, '', 'Anglais', 1);
INSERT INTO `livre` VALUES(212, 'James Joyce and his World', 108, '', 'Anglais', 1);
INSERT INTO `livre` VALUES(213, 'James Joyce''s Ulysses ', 108, '', 'Anglais', 1);
INSERT INTO `livre` VALUES(214, 'James Joyce''s Ulysses Critical Essays', 108, '', 'Anglais', 1);
INSERT INTO `livre` VALUES(215, 'Joyce', 108, '', 'Anglais', 1);
INSERT INTO `livre` VALUES(216, 'The Aesthetics of Dedalus and Bloom', 108, '', 'Anglais', 1);
INSERT INTO `livre` VALUES(217, 'The Art of Joyce Method and Design in Ulysses and Finnegan''s Wake', 108, '', 'Anglais', 1);
INSERT INTO `livre` VALUES(218, 'The Book as World James Joyce''s Ulysses', 108, '', 'Anglais', 1);
INSERT INTO `livre` VALUES(219, 'The Poems and Verse of James Joyce', 108, '', 'Anglais', 1);
INSERT INTO `livre` VALUES(220, 'The Years of Growth (1882-1915', 108, '', 'Anglais', 1);
INSERT INTO `livre` VALUES(221, 'Ulysses 50 ans après', 108, '', 'Anglais', 1);
INSERT INTO `livre` VALUES(222, 'Ulysses An anatomy of the Tool', 108, '', 'Anglais', 1);
INSERT INTO `livre` VALUES(223, 'Ulysses Annotated', 108, '', 'Anglais', 1);
INSERT INTO `livre` VALUES(224, 'Ulysses on the Liffey', 108, '', 'Anglais', 1);
INSERT INTO `livre` VALUES(225, 'Ulysses The Corrected Text', 108, '', 'Anglais', 1);
INSERT INTO `livre` VALUES(226, 'Ulysses The larger Perspective', 108, '', 'Anglais', 1);
INSERT INTO `livre` VALUES(227, 'Last frontier', 109, '', 'Anglais', 1);
INSERT INTO `livre` VALUES(228, 'One Man’s Bible', 110, '', 'Anglais', 1);
INSERT INTO `livre` VALUES(229, 'Ghost Stories', 111, '', 'Anglais', 1);
INSERT INTO `livre` VALUES(230, 'Guy Damville', 111, '', 'Anglais', 1);
INSERT INTO `livre` VALUES(231, 'Portrait of a Lady (2)', 111, '', 'Anglais', 1);
INSERT INTO `livre` VALUES(232, 'Rodwick Hodlor', 111, '', 'Anglais', 1);
INSERT INTO `livre` VALUES(233, 'Selected Short Stories', 111, '', 'Anglais', 1);
INSERT INTO `livre` VALUES(234, 'The Ambassadors', 111, '', 'Anglais', 1);
INSERT INTO `livre` VALUES(235, 'The Aspen Papers', 111, '', 'Anglais', 1);
INSERT INTO `livre` VALUES(236, 'The Awkward Age', 111, '', 'Anglais', 1);
INSERT INTO `livre` VALUES(237, 'The Bostonians (2)', 111, '', 'Anglais', 1);
INSERT INTO `livre` VALUES(238, 'The Europeans (2)', 111, '', 'Anglais', 1);
INSERT INTO `livre` VALUES(239, 'The Princess Lajamina', 111, '', 'Anglais', 1);
INSERT INTO `livre` VALUES(240, 'The Turn of the Screw', 111, '', 'Anglais', 1);
INSERT INTO `livre` VALUES(241, 'Washington Square', 111, '', 'Anglais', 1);
INSERT INTO `livre` VALUES(242, 'What Mairy knew', 111, '', 'Anglais', 1);
INSERT INTO `livre` VALUES(243, 'Wings of the Dove', 111, '', 'Anglais', 1);
INSERT INTO `livre` VALUES(244, 'Ghost stories', 112, '', 'Anglais', 1);
INSERT INTO `livre` VALUES(245, 'Restoration plays : Dryden, Congreve…', 112, '', 'Anglais', 1);
INSERT INTO `livre` VALUES(246, 'A certain Justice (2)', 113, '', 'Anglais', 1);
INSERT INTO `livre` VALUES(247, 'A Mind to Murder', 113, '', 'Anglais', 1);
INSERT INTO `livre` VALUES(248, 'An unsuitable Job for a Woman', 113, '', 'Anglais', 1);
INSERT INTO `livre` VALUES(249, 'Death of an Expert Witness', 113, '', 'Anglais', 1);
INSERT INTO `livre` VALUES(250, 'Innocent Blood', 113, '', 'Anglais', 1);
INSERT INTO `livre` VALUES(251, 'Original Sin', 113, '', 'Anglais', 1);
INSERT INTO `livre` VALUES(252, 'Shroud for a Nightingale', 113, '', 'Anglais', 1);
INSERT INTO `livre` VALUES(253, 'The Black Tower', 113, '', 'Anglais', 1);
INSERT INTO `livre` VALUES(254, 'The Skull beneath the Skin', 113, '', 'Anglais', 1);
INSERT INTO `livre` VALUES(255, 'Three Men in a Boat', 114, '', 'Anglais', 1);
INSERT INTO `livre` VALUES(256, 'The Alchemist(2)+2 criticisms + a study', 115, '', 'Anglais', 1);
INSERT INTO `livre` VALUES(257, 'The Cavalier Poets', 115, '', 'Anglais', 1);
INSERT INTO `livre` VALUES(258, 'The History of Ranclar,Prince of Abinia', 116, '', 'Anglais', 1);
INSERT INTO `livre` VALUES(259, 'Exiles', 117, '', 'Anglais', 1);
INSERT INTO `livre` VALUES(260, 'Finnegan''s Wake (2)+(1 shorter)', 117, '', 'Anglais', 1);
INSERT INTO `livre` VALUES(261, 'Giacomo Joyce', 117, '', 'Anglais', 1);
INSERT INTO `livre` VALUES(262, 'Poems and shorter writings', 117, '', 'Anglais', 1);
INSERT INTO `livre` VALUES(263, 'Selected Joyce Letters', 117, '', 'Anglais', 1);
INSERT INTO `livre` VALUES(264, 'Stephen Hero (2)', 117, '', 'Anglais', 1);
INSERT INTO `livre` VALUES(265, 'Ulysses(1Eng 2 French)', 117, '', 'Anglais', 1);
INSERT INTO `livre` VALUES(266, 'My brother''s Keeper', 118, '', 'Anglais', 1);
INSERT INTO `livre` VALUES(267, 'Geneses et Métamorphoses du Texte Joycien', 119, '', 'Anglais', 1);
INSERT INTO `livre` VALUES(268, 'Joyce and the Art of Mediation', 119, '', 'Anglais', 1);
INSERT INTO `livre` VALUES(269, 'Joyce''s Cities Archeology of the Tool.', 119, '', 'Anglais', 1);
INSERT INTO `livre` VALUES(270, 'Les années de formation de Joyce à Dublin', 119, '', 'Anglais', 1);
INSERT INTO `livre` VALUES(271, 'Mythic Worlds and Modern Worlds:on the Art of Joyce', 119, '', 'Anglais', 1);
INSERT INTO `livre` VALUES(272, 'The Artist and the Labyirinth', 119, '', 'Anglais', 1);
INSERT INTO `livre` VALUES(273, 'The Cambridge Companion', 119, '', 'Anglais', 1);
INSERT INTO `livre` VALUES(274, 'The Centennial Symposium', 119, '', 'Anglais', 1);
INSERT INTO `livre` VALUES(275, 'Up the Down Staircase', 120, '', 'Anglais', 1);
INSERT INTO `livre` VALUES(276, 'The Far Pavillion', 121, '', 'Anglais', 1);
INSERT INTO `livre` VALUES(277, 'Letters', 122, '', 'Anglais', 1);
INSERT INTO `livre` VALUES(278, 'Poems', 122, '', 'Anglais', 1);
INSERT INTO `livre` VALUES(279, 'Lake Wobegon Day', 123, '', 'Anglais', 1);
INSERT INTO `livre` VALUES(280, 'How Late it was,how Late', 124, '', 'Anglais', 1);
INSERT INTO `livre` VALUES(281, 'Shakespeare''s language', 125, '', 'Anglais', 1);
INSERT INTO `livre` VALUES(282, 'Captain Courageous', 126, '', 'Anglais', 1);
INSERT INTO `livre` VALUES(283, 'If', 126, '', 'Anglais', 1);
INSERT INTO `livre` VALUES(284, 'Many Inventions', 126, '', 'Anglais', 1);
INSERT INTO `livre` VALUES(285, 'Short Stories vols 1-2 (2)', 126, '', 'Anglais', 1);
INSERT INTO `livre` VALUES(286, 'The Light that Fail', 126, '', 'Anglais', 1);
INSERT INTO `livre` VALUES(287, 'The Man Would be King + stories', 126, '', 'Anglais', 1);
INSERT INTO `livre` VALUES(288, 'The Second Jungle Book', 126, '', 'Anglais', 1);
INSERT INTO `livre` VALUES(289, 'March Violets', 127, '', 'Anglais', 1);
INSERT INTO `livre` VALUES(290, 'On the Road (2)', 127, '', 'Anglais', 1);
INSERT INTO `livre` VALUES(291, 'The day the Rabbi Resigned', 127, '', 'Anglais', 1);
INSERT INTO `livre` VALUES(292, 'The Unbearable Lightness of Being', 127, '', 'Anglais', 1);
INSERT INTO `livre` VALUES(293, 'Tales from Shakespeare', 128, '', 'Anglais', 1);
INSERT INTO `livre` VALUES(294, 'Shakespeare''s tragedies: an Anthology of Modern criticism', 129, '', 'Anglais', 1);
INSERT INTO `livre` VALUES(295, 'The question of Hamlet', 130, '', 'Anglais', 1);
INSERT INTO `livre` VALUES(296, 'The secret of Shakespeare', 131, '', 'Anglais', 1);
INSERT INTO `livre` VALUES(297, 'Noro, a Biography', 132, '', 'Anglais', 1);
INSERT INTO `livre` VALUES(298, 'Le Proche et le Lointain', 133, '', 'Anglais', 1);
INSERT INTO `livre` VALUES(299, 'Shakespeare', 134, '', 'Anglais', 1);
INSERT INTO `livre` VALUES(300, 'Joyce', 135, '', 'Anglais', 1);
INSERT INTO `livre` VALUES(301, 'Hamlet et Panurge', 136, '', 'Anglais', 1);
INSERT INTO `livre` VALUES(302, 'Joyce', 137, '', 'Anglais', 1);
INSERT INTO `livre` VALUES(303, 'Entretiens avec Joyce', 138, '', 'Anglais', 1);
INSERT INTO `livre` VALUES(304, '20th Century Views', 139, '', 'Anglais', 1);
INSERT INTO `livre` VALUES(305, 'A Colder Eye The Modern British Writer', 139, '', 'Anglais', 1);
INSERT INTO `livre` VALUES(306, 'A Femminist Reading', 139, '', 'Anglais', 1);
INSERT INTO `livre` VALUES(307, 'Joyce', 139, '', 'Anglais', 1);
INSERT INTO `livre` VALUES(308, 'Joyce and the Language of History', 139, '', 'Anglais', 1);
INSERT INTO `livre` VALUES(309, 'Joyce''s Catholic Comedy of Language', 139, '', 'Anglais', 1);
INSERT INTO `livre` VALUES(310, 'Joyce''s Voices', 139, '', 'Anglais', 1);
INSERT INTO `livre` VALUES(311, 'Les Héros de James Joyce', 139, '', 'Anglais', 1);
INSERT INTO `livre` VALUES(312, 'New Perspectives', 139, '', 'Anglais', 1);
INSERT INTO `livre` VALUES(313, 'The Mysteries of Udolpho', 140, '', 'Anglais', 1);
INSERT INTO `livre` VALUES(314, 'A Question of Blood', 141, '', 'Anglais', 1);
INSERT INTO `livre` VALUES(315, 'Black and Blue', 141, '', 'Anglais', 1);
INSERT INTO `livre` VALUES(316, 'Bleeding hearts', 141, '', 'Anglais', 1);
INSERT INTO `livre` VALUES(317, 'Exit Music', 141, '', 'Anglais', 1);
INSERT INTO `livre` VALUES(318, 'Fleshmarket Close', 141, '', 'Anglais', 1);
INSERT INTO `livre` VALUES(319, 'Restoration plays : Dryden, Congreve…', 141, '', 'Anglais', 1);
INSERT INTO `livre` VALUES(320, 'The Naming of the Dead', 141, '', 'Anglais', 1);
INSERT INTO `livre` VALUES(321, 'Sleep It Off Lady', 142, '', 'Anglais', 1);
INSERT INTO `livre` VALUES(322, 'The Fact of a Doorframe ', 143, '', 'Anglais', 1);
INSERT INTO `livre` VALUES(323, 'The Former Miss Merthyr Tydfil and Other Stories ', 144, '', 'Anglais', 1);
INSERT INTO `livre` VALUES(324, 'Clarissa volume 4', 145, '', 'Anglais', 1);
INSERT INTO `livre` VALUES(325, 'Critical studies', 145, '', 'Anglais', 1);
INSERT INTO `livre` VALUES(326, 'Pamela, volume 2 / volumes 1 and 2', 145, '', 'Anglais', 1);
INSERT INTO `livre` VALUES(327, 'Alan Grant', 146, '', 'Anglais', 1);
INSERT INTO `livre` VALUES(328, 'Four Frightened people', 147, '', 'Anglais', 1);
INSERT INTO `livre` VALUES(329, 'Call it sleep', 148, '', 'Anglais', 1);
INSERT INTO `livre` VALUES(330, 'American Pastoral', 149, '', 'Anglais', 1);
INSERT INTO `livre` VALUES(331, 'Goodbye, Columbus', 149, '', 'Anglais', 1);
INSERT INTO `livre` VALUES(332, 'Letting Go', 149, '', 'Anglais', 1);
INSERT INTO `livre` VALUES(333, 'My Life As a Man', 149, '', 'Anglais', 1);
INSERT INTO `livre` VALUES(334, 'Operation Shylock: A Confession', 149, '', 'Anglais', 1);
INSERT INTO `livre` VALUES(335, 'Our gang', 149, '', 'Anglais', 1);
INSERT INTO `livre` VALUES(336, 'The Great American Novel', 149, '', 'Anglais', 1);
INSERT INTO `livre` VALUES(337, 'The Human Stain', 149, '', 'Anglais', 1);
INSERT INTO `livre` VALUES(338, 'When She Was Good', 149, '', 'Anglais', 1);
INSERT INTO `livre` VALUES(339, 'The God of Small Things', 150, '', 'Anglais', 1);
INSERT INTO `livre` VALUES(340, 'John Citizen and the Law', 151, '', 'Anglais', 1);
INSERT INTO `livre` VALUES(341, 'On Our selection', 152, '', 'Anglais', 1);
INSERT INTO `livre` VALUES(342, 'Midnight children', 153, '', 'Anglais', 1);
INSERT INTO `livre` VALUES(343, 'The Moor''s Last Sigh', 153, '', 'Anglais', 1);
INSERT INTO `livre` VALUES(344, 'The Edwardians', 154, '', 'Anglais', 1);
INSERT INTO `livre` VALUES(345, 'The best of Saki', 155, '', 'Anglais', 1);
INSERT INTO `livre` VALUES(346, 'For Edmé, with love and squalor', 156, '', 'Anglais', 1);
INSERT INTO `livre` VALUES(347, 'Raise high the roof beam, Carpenter and Seymour', 156, '', 'Anglais', 1);
INSERT INTO `livre` VALUES(348, 'Rabbit boss', 157, '', 'Anglais', 1);
INSERT INTO `livre` VALUES(349, 'Little children', 158, '', 'Anglais', 1);
INSERT INTO `livre` VALUES(350, 'My name is Aram', 158, '', 'Anglais', 1);
INSERT INTO `livre` VALUES(351, 'Memoirs of a Fox-Hunting Man', 159, '', 'Anglais', 1);
INSERT INTO `livre` VALUES(352, 'Poems', 159, '', 'Anglais', 1);
INSERT INTO `livre` VALUES(353, 'An Old Woman''s Reflections', 160, '', 'Anglais', 1);
INSERT INTO `livre` VALUES(354, 'What makes Sammy run', 161, '', 'Anglais', 1);
INSERT INTO `livre` VALUES(355, 'the jewell in the crown', 162, '', 'Anglais', 1);
INSERT INTO `livre` VALUES(356, 'Old mortality', 163, '', 'Anglais', 1);
INSERT INTO `livre` VALUES(357, 'The Heart of Midlothian', 163, '', 'Anglais', 1);
INSERT INTO `livre` VALUES(358, 'The Making of the Novelist', 163, '', 'Anglais', 1);
INSERT INTO `livre` VALUES(359, 'The Talisman + study', 163, '', 'Anglais', 1);
INSERT INTO `livre` VALUES(360, 'Waverley', 163, '', 'Anglais', 1);
INSERT INTO `livre` VALUES(361, 'Love story', 164, '', 'Anglais', 1);
INSERT INTO `livre` VALUES(362, 'Man, woman and child', 164, '', 'Anglais', 1);
INSERT INTO `livre` VALUES(363, 'Cock and Bull', 165, '', 'Anglais', 1);
INSERT INTO `livre` VALUES(364, 'Grey area', 165, '', 'Anglais', 1);
INSERT INTO `livre` VALUES(365, '1066 and All that', 166, '', 'Anglais', 1);
INSERT INTO `livre` VALUES(366, 'Seven red Sundays', 167, '', 'Anglais', 1);
INSERT INTO `livre` VALUES(367, 'A  suitable boy    X2', 168, '', 'Anglais', 1);
INSERT INTO `livre` VALUES(368, 'Two lives', 168, '', 'Anglais', 1);
INSERT INTO `livre` VALUES(369, 'Sex and the social order', 169, '', 'Anglais', 1);
INSERT INTO `livre` VALUES(370, 'Amadeus', 170, '', 'Anglais', 1);
INSERT INTO `livre` VALUES(371, 'A Midsummer Night''s Dream', 171, '', 'Anglais', 1);
INSERT INTO `livre` VALUES(372, 'Anthony and Cleopatra', 171, '', 'Anglais', 1);
INSERT INTO `livre` VALUES(373, 'Coriolanus', 171, '', 'Anglais', 1);
INSERT INTO `livre` VALUES(374, 'King Lear', 171, '', 'Anglais', 1);
INSERT INTO `livre` VALUES(375, 'Macbeth', 171, '', 'Anglais', 1);
INSERT INTO `livre` VALUES(376, 'Much ado about nothing', 171, '', 'Anglais', 1);
INSERT INTO `livre` VALUES(377, 'Richard II', 171, '', 'Anglais', 1);
INSERT INTO `livre` VALUES(378, 'Romeo and Juliet', 171, '', 'Anglais', 1);
INSERT INTO `livre` VALUES(379, 'Sonnets', 171, '', 'Anglais', 1);
INSERT INTO `livre` VALUES(380, 'The Merchant of Venice', 171, '', 'Anglais', 1);
INSERT INTO `livre` VALUES(381, 'Queer Street 1', 172, '', 'Anglais', 1);
INSERT INTO `livre` VALUES(382, 'Queer Street 2', 172, '', 'Anglais', 1);
INSERT INTO `livre` VALUES(383, 'Ancestral vices', 173, '', 'Anglais', 1);
INSERT INTO `livre` VALUES(384, 'Grantchester Grind', 173, '', 'Anglais', 1);
INSERT INTO `livre` VALUES(385, 'Porterhouse Blue', 173, '', 'Anglais', 1);
INSERT INTO `livre` VALUES(386, 'The Great pursuit ', 173, '', 'Anglais', 1);
INSERT INTO `livre` VALUES(387, 'The Doctor''s Dilemma', 174, '', 'Anglais', 1);
INSERT INTO `livre` VALUES(388, 'Frankestein', 175, '', 'Anglais', 1);
INSERT INTO `livre` VALUES(389, '… studies', 176, '', 'Anglais', 1);
INSERT INTO `livre` VALUES(390, 'Poetry and Prose', 176, '', 'Anglais', 1);
INSERT INTO `livre` VALUES(391, 'Prometheus Unbound', 176, '', 'Anglais', 1);
INSERT INTO `livre` VALUES(392, 'The Castle of Otranto', 177, '', 'Anglais', 1);
INSERT INTO `livre` VALUES(393, 'Vathek', 177, '', 'Anglais', 1);
INSERT INTO `livre` VALUES(394, 'A lie of the mind', 178, '', 'Anglais', 1);
INSERT INTO `livre` VALUES(395, 'Le Critique', 179, '', 'Anglais', 1);
INSERT INTO `livre` VALUES(396, 'The Stone Diaries', 180, '', 'Anglais', 1);
INSERT INTO `livre` VALUES(397, 'A town like Alice', 181, '', 'Anglais', 1);
INSERT INTO `livre` VALUES(398, 'The Countess of Pembroke''s Arcadia', 182, '', 'Anglais', 1);
INSERT INTO `livre` VALUES(399, 'A Tree On Fire', 183, '', 'Anglais', 1);
INSERT INTO `livre` VALUES(400, 'Men, women and children', 183, '', 'Anglais', 1);
INSERT INTO `livre` VALUES(401, 'Saturday Night and Sunday Morning', 183, '', 'Anglais', 1);
INSERT INTO `livre` VALUES(402, 'The Loneliness Of The Long-Distance Runner', 183, '', 'Anglais', 1);
INSERT INTO `livre` VALUES(403, 'Poems', 184, '', 'Anglais', 1);
INSERT INTO `livre` VALUES(404, 'White teeth', 185, '', 'Anglais', 1);
INSERT INTO `livre` VALUES(405, 'Poems', 186, '', 'Anglais', 1);
INSERT INTO `livre` VALUES(406, 'A study', 187, '', 'Anglais', 1);
INSERT INTO `livre` VALUES(407, 'Humphry Clinker   X3', 187, '', 'Anglais', 1);
INSERT INTO `livre` VALUES(408, 'Roderick Random', 187, '', 'Anglais', 1);
INSERT INTO `livre` VALUES(409, 'Corridors of power    X2', 188, '', 'Anglais', 1);
INSERT INTO `livre` VALUES(410, 'Souvenirs de Joyce', 189, '', 'Anglais', 1);
INSERT INTO `livre` VALUES(411, 'The magic christian', 190, '', 'Anglais', 1);
INSERT INTO `livre` VALUES(412, 'Plays  ', 191, '', 'Anglais', 1);
INSERT INTO `livre` VALUES(413, 'A far cry from Kensington', 192, '', 'Anglais', 1);
INSERT INTO `livre` VALUES(414, 'Robinson', 192, '', 'Anglais', 1);
INSERT INTO `livre` VALUES(415, 'Short stories', 192, '', 'Anglais', 1);
INSERT INTO `livre` VALUES(416, 'Symposium', 192, '', 'Anglais', 1);
INSERT INTO `livre` VALUES(417, 'Territorial rights', 192, '', 'Anglais', 1);
INSERT INTO `livre` VALUES(418, 'The abess of Crewe', 192, '', 'Anglais', 1);
INSERT INTO `livre` VALUES(419, 'The ballad  of Peckham Rye', 192, '', 'Anglais', 1);
INSERT INTO `livre` VALUES(420, 'The comforters', 192, '', 'Anglais', 1);
INSERT INTO `livre` VALUES(421, 'The driver''s seat', 192, '', 'Anglais', 1);
INSERT INTO `livre` VALUES(422, 'The go-away bird and other stories', 192, '', 'Anglais', 1);
INSERT INTO `livre` VALUES(423, 'The prime of Miss Jean Brodie', 192, '', 'Anglais', 1);
INSERT INTO `livre` VALUES(424, 'The 30s and after', 193, '', 'Anglais', 1);
INSERT INTO `livre` VALUES(425, 'Maus', 194, '', 'Anglais', 1);
INSERT INTO `livre` VALUES(426, 'His life and cases', 195, '', 'Anglais', 1);
INSERT INTO `livre` VALUES(427, 'Fernhurst', 196, '', 'Anglais', 1);
INSERT INTO `livre` VALUES(428, 'other ? Writing', 196, '', 'Anglais', 1);
INSERT INTO `livre` VALUES(429, 'Q.E.D.', 196, '', 'Anglais', 1);
INSERT INTO `livre` VALUES(430, 'A study', 197, '', 'Anglais', 1);
INSERT INTO `livre` VALUES(431, 'Of mice and men + Cannery Row    X2', 197, '', 'Anglais', 1);
INSERT INTO `livre` VALUES(432, 'The wayward bus    X2', 197, '', 'Anglais', 1);
INSERT INTO `livre` VALUES(433, 'Tortilla flat', 197, '', 'Anglais', 1);
INSERT INTO `livre` VALUES(434, 'Travels with Charly', 197, '', 'Anglais', 1);
INSERT INTO `livre` VALUES(435, 'A reader', 198, '', 'Anglais', 1);
INSERT INTO `livre` VALUES(436, 'Antigones', 198, '', 'Anglais', 1);
INSERT INTO `livre` VALUES(437, 'Errata', 198, '', 'Anglais', 1);
INSERT INTO `livre` VALUES(438, 'In Bluebeard''s castle', 198, '', 'Anglais', 1);
INSERT INTO `livre` VALUES(439, 'Language and silence', 198, '', 'Anglais', 1);
INSERT INTO `livre` VALUES(440, 'Le sens du sens', 198, '', 'Anglais', 1);
INSERT INTO `livre` VALUES(441, 'Lessons of the masters', 198, '', 'Anglais', 1);
INSERT INTO `livre` VALUES(442, 'My unwritten books', 198, '', 'Anglais', 1);
INSERT INTO `livre` VALUES(443, 'No paasion spent', 198, '', 'Anglais', 1);
INSERT INTO `livre` VALUES(444, 'On difficulty and other essays', 198, '', 'Anglais', 1);
INSERT INTO `livre` VALUES(445, 'Proofs and 3 parables', 198, '', 'Anglais', 1);
INSERT INTO `livre` VALUES(446, 'Reading G. Steiner', 198, '', 'Anglais', 1);
INSERT INTO `livre` VALUES(447, 'Real presences', 198, '', 'Anglais', 1);
INSERT INTO `livre` VALUES(448, 'The death of the tragedy', 198, '', 'Anglais', 1);
INSERT INTO `livre` VALUES(449, 'The deeps of the sea and other fiction', 198, '', 'Anglais', 1);
INSERT INTO `livre` VALUES(450, 'The portage to San Cristobal of A H', 198, '', 'Anglais', 1);
INSERT INTO `livre` VALUES(451, 'Tolstoy or Dostoevsky     X2', 198, '', 'Anglais', 1);
INSERT INTO `livre` VALUES(452, 'What is comparative literature', 198, '', 'Anglais', 1);
INSERT INTO `livre` VALUES(453, 'The Evil of the day', 199, '', 'Anglais', 1);
INSERT INTO `livre` VALUES(454, 'Sentimental Journey', 200, '', 'Anglais', 1);
INSERT INTO `livre` VALUES(455, 'The Life and Opinions of Tristram Shandy ', 200, '', 'Anglais', 1);
INSERT INTO `livre` VALUES(456, 'Selected poems', 201, '', 'Anglais', 1);
INSERT INTO `livre` VALUES(457, 'Dr Jekyll & Mr Hyde', 202, '', 'Anglais', 1);
INSERT INTO `livre` VALUES(458, 'Essays and poems', 202, '', 'Anglais', 1);
INSERT INTO `livre` VALUES(459, 'Kidnapped', 202, '', 'Anglais', 1);
INSERT INTO `livre` VALUES(460, 'The Ebb-Tide', 202, '', 'Anglais', 1);
INSERT INTO `livre` VALUES(461, 'The Master of Ballantrae', 202, '', 'Anglais', 1);
INSERT INTO `livre` VALUES(462, 'Travels with a donkey in the Cévennes', 202, '', 'Anglais', 1);
INSERT INTO `livre` VALUES(463, 'Dracula', 203, '', 'Anglais', 1);
INSERT INTO `livre` VALUES(464, 'Every Good Boy Deserves Favour', 204, '', 'Anglais', 1);
INSERT INTO `livre` VALUES(465, 'Professional Foul', 204, '', 'Anglais', 1);
INSERT INTO `livre` VALUES(466, 'Rosencrantz and Guildenstern Are Dead', 204, '', 'Anglais', 1);
INSERT INTO `livre` VALUES(467, 'The invention of love', 204, '', 'Anglais', 1);
INSERT INTO `livre` VALUES(468, 'Travesties', 204, '', 'Anglais', 1);
INSERT INTO `livre` VALUES(469, 'This sporting life', 205, '', 'Anglais', 1);
INSERT INTO `livre` VALUES(470, 'Eminent Victorians', 206, '', 'Anglais', 1);
INSERT INTO `livre` VALUES(471, 'La Reine Victoria', 206, '', 'Anglais', 1);
INSERT INTO `livre` VALUES(472, 'The Red room', 207, '', 'Anglais', 1);
INSERT INTO `livre` VALUES(473, 'Sophie''s choice', 208, '', 'Anglais', 1);
INSERT INTO `livre` VALUES(474, 'The Long march', 208, '', 'Anglais', 1);
INSERT INTO `livre` VALUES(475, 'Perfume', 209, '', 'Anglais', 1);
INSERT INTO `livre` VALUES(476, 'Last orders                   ', 210, '', 'Anglais', 1);
INSERT INTO `livre` VALUES(477, 'Out of this world', 210, '', 'Anglais', 1);
INSERT INTO `livre` VALUES(478, 'Shuttlecocks', 210, '', 'Anglais', 1);
INSERT INTO `livre` VALUES(479, 'The sweet shop owner', 210, '', 'Anglais', 1);
INSERT INTO `livre` VALUES(480, 'Waterland', 210, '', 'Anglais', 1);
INSERT INTO `livre` VALUES(481, 'Gulliver''s travels   X4', 211, '', 'Anglais', 1);
INSERT INTO `livre` VALUES(482, 'Poems', 212, '', 'Anglais', 1);
INSERT INTO `livre` VALUES(483, 'Nocturne', 213, '', 'Anglais', 1);
INSERT INTO `livre` VALUES(484, 'Playboy of the western world', 214, '', 'Anglais', 1);
INSERT INTO `livre` VALUES(485, 'Plays Prose Poems', 214, '', 'Anglais', 1);
INSERT INTO `livre` VALUES(486, 'Mortal mischief', 215, '', 'Anglais', 1);
INSERT INTO `livre` VALUES(487, 'A wreath of roses', 216, '', 'Anglais', 1);
INSERT INTO `livre` VALUES(488, 'Blaming', 216, '', 'Anglais', 1);
INSERT INTO `livre` VALUES(489, 'Hester Lilly', 216, '', 'Anglais', 1);
INSERT INTO `livre` VALUES(490, 'Palladian', 216, '', 'Anglais', 1);
INSERT INTO `livre` VALUES(491, 'The blush', 216, '', 'Anglais', 1);
INSERT INTO `livre` VALUES(492, 'The sleeping beauty', 216, '', 'Anglais', 1);
INSERT INTO `livre` VALUES(493, 'The wedding group', 216, '', 'Anglais', 1);
INSERT INTO `livre` VALUES(494, 'In memoriam', 217, '', 'Anglais', 1);
INSERT INTO `livre` VALUES(495, 'Selected poems', 217, '', 'Anglais', 1);
INSERT INTO `livre` VALUES(496, 'Les formes de la création romanesque à l''époque de Walter Scott et de Jane Austen 1814-1820', 218, '', 'Anglais', 1);
INSERT INTO `livre` VALUES(497, 'Barry Lyndon', 219, '', 'Anglais', 1);
INSERT INTO `livre` VALUES(498, 'English humourists + the 4 Georges', 219, '', 'Anglais', 1);
INSERT INTO `livre` VALUES(499, 'Pendennis', 219, '', 'Anglais', 1);
INSERT INTO `livre` VALUES(500, 'The history of the new ?', 219, '', 'Anglais', 1);
INSERT INTO `livre` VALUES(501, 'The Virginians', 219, '', 'Anglais', 1);
INSERT INTO `livre` VALUES(502, 'Vanity fair     X3', 219, '', 'Anglais', 1);
INSERT INTO `livre` VALUES(503, 'Half moon street', 220, '', 'Anglais', 1);
INSERT INTO `livre` VALUES(504, 'Kowloon Tong', 220, '', 'Anglais', 1);
INSERT INTO `livre` VALUES(505, 'The black house', 220, '', 'Anglais', 1);
INSERT INTO `livre` VALUES(506, 'The great railway bazaar', 220, '', 'Anglais', 1);
INSERT INTO `livre` VALUES(507, 'The mosquito coast', 220, '', 'Anglais', 1);
INSERT INTO `livre` VALUES(508, 'Playing with cobras', 221, '', 'Anglais', 1);
INSERT INTO `livre` VALUES(509, 'The white hotel', 222, '', 'Anglais', 1);
INSERT INTO `livre` VALUES(510, 'A prospect of the sea', 223, '', 'Anglais', 1);
INSERT INTO `livre` VALUES(511, 'Portrait of the artist as a young dog', 223, '', 'Anglais', 1);
INSERT INTO `livre` VALUES(512, 'Under milkwood', 223, '', 'Anglais', 1);
INSERT INTO `livre` VALUES(513, 'The por choppers', 224, '', 'Anglais', 1);
INSERT INTO `livre` VALUES(514, 'The 5 gates to hell', 225, '', 'Anglais', 1);
INSERT INTO `livre` VALUES(515, 'An Indian day', 226, '', 'Anglais', 1);
INSERT INTO `livre` VALUES(516, '2 critical studies', 227, '', 'Anglais', 1);
INSERT INTO `livre` VALUES(517, 'Walden     X3', 227, '', 'Anglais', 1);
INSERT INTO `livre` VALUES(518, 'Among the Russians', 228, '', 'Anglais', 1);
INSERT INTO `livre` VALUES(519, 'The story of the night', 229, '', 'Anglais', 1);
INSERT INTO `livre` VALUES(520, 'Smith of Wooton major and Farmer Giles of Ham', 230, '', 'Anglais', 1);
INSERT INTO `livre` VALUES(521, 'Anna Karenina    X2', 231, '', 'Anglais', 1);
INSERT INTO `livre` VALUES(522, 'A confederacy of dunces', 232, '', 'Anglais', 1);
INSERT INTO `livre` VALUES(523, 'Cane', 233, '', 'Anglais', 1);
INSERT INTO `livre` VALUES(524, 'The queen and I', 234, '', 'Anglais', 1);
INSERT INTO `livre` VALUES(525, 'Ireland', 235, '', 'Anglais', 1);
INSERT INTO `livre` VALUES(526, 'Barchester towers    X3', 236, '', 'Anglais', 1);
INSERT INTO `livre` VALUES(527, 'Doctor Thorne', 236, '', 'Anglais', 1);
INSERT INTO `livre` VALUES(528, 'Framley parsonage', 236, '', 'Anglais', 1);
INSERT INTO `livre` VALUES(529, 'The book of snobs', 236, '', 'Anglais', 1);
INSERT INTO `livre` VALUES(530, 'The last chronicle of Barset     X2', 236, '', 'Anglais', 1);
INSERT INTO `livre` VALUES(531, 'The warden    X3', 236, '', 'Anglais', 1);
INSERT INTO `livre` VALUES(532, 'Huckleberry Finn', 237, '', 'Anglais', 1);
INSERT INTO `livre` VALUES(533, 'Les Etats-Unis de Mark Twain', 237, '', 'Anglais', 1);
INSERT INTO `livre` VALUES(534, 'Pudd''nhead Wilson', 237, '', 'Anglais', 1);
INSERT INTO `livre` VALUES(535, 'Tom Sawyer', 237, '', 'Anglais', 1);
INSERT INTO `livre` VALUES(536, 'Internal affairs', 238, '', 'Anglais', 1);
INSERT INTO `livre` VALUES(537, 'Couples', 239, '', 'Anglais', 1);
INSERT INTO `livre` VALUES(538, 'Of the farm', 239, '', 'Anglais', 1);
INSERT INTO `livre` VALUES(539, 'Rabbit, run', 239, '', 'Anglais', 1);
INSERT INTO `livre` VALUES(540, 'The centaur    X2', 239, '', 'Anglais', 1);
INSERT INTO `livre` VALUES(541, 'The frontiers of the sea', 240, '', 'Anglais', 1);
INSERT INTO `livre` VALUES(542, 'The Chinese gold murders', 241, '', 'Anglais', 1);
INSERT INTO `livre` VALUES(543, 'Restoration plays Dryden, Wycherley, Vanburgh, Congreve', 242, '', 'Anglais', 1);
INSERT INTO `livre` VALUES(544, 'The provoked wife     X3', 242, '', 'Anglais', 1);
INSERT INTO `livre` VALUES(545, 'The kama sutra', 243, '', 'Anglais', 1);
INSERT INTO `livre` VALUES(546, 'Poems', 244, '', 'Anglais', 1);
INSERT INTO `livre` VALUES(547, 'Miss Garnett''s angels', 245, '', 'Anglais', 1);
INSERT INTO `livre` VALUES(548, 'Myra Breckinridge', 246, '', 'Anglais', 1);
INSERT INTO `livre` VALUES(549, 'Myron', 246, '', 'Anglais', 1);
INSERT INTO `livre` VALUES(550, 'A fatal inversion', 247, '', 'Anglais', 1);
INSERT INTO `livre` VALUES(551, 'Asta''s book', 247, '', 'Anglais', 1);
INSERT INTO `livre` VALUES(552, 'No night is too long', 247, '', 'Anglais', 1);
INSERT INTO `livre` VALUES(553, 'The aeneid', 248, '', 'Anglais', 1);
INSERT INTO `livre` VALUES(554, 'Hurry on down', 249, '', 'Anglais', 1);
INSERT INTO `livre` VALUES(555, 'Meridian', 250, '', 'Anglais', 1);
INSERT INTO `livre` VALUES(556, 'Ben Hur', 251, '', 'Anglais', 1);
INSERT INTO `livre` VALUES(557, 'Border Music', 252, '', 'Anglais', 1);
INSERT INTO `livre` VALUES(558, 'The Castle of Otranto (+ Walpole, Hugh: The Cathedral; Shelley, Mary: Frankenstein; Beckford, William: Vathek)', 253, '', 'Anglais', 1);
INSERT INTO `livre` VALUES(559, 'Mr Perrin and Mr Traill', 254, '', 'Anglais', 1);
INSERT INTO `livre` VALUES(560, 'A handful of dust', 255, '', 'Anglais', 1);
INSERT INTO `livre` VALUES(561, 'Brideshead revisited', 255, '', 'Anglais', 1);
INSERT INTO `livre` VALUES(562, 'Edmund Campion (Biography)', 255, '', 'Anglais', 1);
INSERT INTO `livre` VALUES(563, 'Scoop', 255, '', 'Anglais', 1);
INSERT INTO `livre` VALUES(564, 'Work suspended', 255, '', 'Anglais', 1);
INSERT INTO `livre` VALUES(565, 'My  Apprenticeship', 256, '', 'Anglais', 1);
INSERT INTO `livre` VALUES(566, 'Home school', 257, '', 'Anglais', 1);
INSERT INTO `livre` VALUES(567, 'The Graduate', 257, '', 'Anglais', 1);
INSERT INTO `livre` VALUES(568, 'Gone to earth', 258, '', 'Anglais', 1);
INSERT INTO `livre` VALUES(569, 'The Duchess of Malfi', 259, '', 'Anglais', 1);
INSERT INTO `livre` VALUES(570, 'Polaris and other stories', 260, '', 'Anglais', 1);
INSERT INTO `livre` VALUES(571, 'The Cloning of Joanna May', 260, '', 'Anglais', 1);
INSERT INTO `livre` VALUES(572, 'The Heart of the Country', 260, '', 'Anglais', 1);
INSERT INTO `livre` VALUES(573, 'A propos de Dolores', 261, '', 'Anglais', 1);
INSERT INTO `livre` VALUES(574, 'All aboard for Arafat', 261, '', 'Anglais', 1);
INSERT INTO `livre` VALUES(575, 'Rippy’s … ?', 261, '', 'Anglais', 1);
INSERT INTO `livre` VALUES(576, 'Tales of Wonder', 261, '', 'Anglais', 1);
INSERT INTO `livre` VALUES(577, 'The Bollington of …?', 261, '', 'Anglais', 1);
INSERT INTO `livre` VALUES(578, 'The History of Mr Polly (+ study)', 261, '', 'Anglais', 1);
INSERT INTO `livre` VALUES(579, 'The New Machiavelli', 261, '', 'Anglais', 1);
INSERT INTO `livre` VALUES(580, 'Tono-Bungay', 261, '', 'Anglais', 1);
INSERT INTO `livre` VALUES(581, 'Roots', 262, '', 'Anglais', 1);
INSERT INTO `livre` VALUES(582, 'The Wedding', 263, '', 'Anglais', 1);
INSERT INTO `livre` VALUES(583, 'The Ambassador', 264, '', 'Anglais', 1);
INSERT INTO `livre` VALUES(584, 'The Devil’s Advocate', 264, '', 'Anglais', 1);
INSERT INTO `livre` VALUES(585, 'The Salamander', 264, '', 'Anglais', 1);
INSERT INTO `livre` VALUES(586, 'Complete Works', 265, '', 'Anglais', 1);
INSERT INTO `livre` VALUES(587, 'An Autobiography: A Backward Glance', 266, '', 'Anglais', 1);
INSERT INTO `livre` VALUES(588, 'Ethan Frome', 266, '', 'Anglais', 1);
INSERT INTO `livre` VALUES(589, 'The Age of Innocence', 266, '', 'Anglais', 1);
INSERT INTO `livre` VALUES(590, 'The Buccaneers', 266, '', 'Anglais', 1);
INSERT INTO `livre` VALUES(591, 'The Cruise of the Vanadis', 266, '', 'Anglais', 1);
INSERT INTO `livre` VALUES(592, 'The Ghost Stories', 266, '', 'Anglais', 1);
INSERT INTO `livre` VALUES(593, 'The Mother’s Recompense', 266, '', 'Anglais', 1);
INSERT INTO `livre` VALUES(594, 'The reef', 266, '', 'Anglais', 1);
INSERT INTO `livre` VALUES(595, 'The Stoics', 266, '', 'Anglais', 1);
INSERT INTO `livre` VALUES(596, 'Riders in the Chariot', 267, '', 'Anglais', 1);
INSERT INTO `livre` VALUES(597, 'The Cockatoos', 267, '', 'Anglais', 1);
INSERT INTO `livre` VALUES(598, 'Voss', 267, '', 'Anglais', 1);
INSERT INTO `livre` VALUES(599, 'Leaves of Grass', 268, '', 'Anglais', 1);
INSERT INTO `livre` VALUES(600, 'A study', 269, '', 'Anglais', 1);
INSERT INTO `livre` VALUES(601, 'Essays and Poems', 270, '', 'Anglais', 1);
INSERT INTO `livre` VALUES(602, 'Lord Arthur Saville’s Crime and other stories', 270, '', 'Anglais', 1);
INSERT INTO `livre` VALUES(603, 'The Picture of Dorian Gray x 2', 270, '', 'Anglais', 1);
INSERT INTO `livre` VALUES(604, 'The Uncollected Oscar Wilde', 270, '', 'Anglais', 1);
INSERT INTO `livre` VALUES(605, 'The Bridge of San Luis Rey', 271, '', 'Anglais', 1);
INSERT INTO `livre` VALUES(606, 'The Cabala', 271, '', 'Anglais', 1);
INSERT INTO `livre` VALUES(607, 'The Women of Andros', 271, '', 'Anglais', 1);
INSERT INTO `livre` VALUES(608, 'A Streetcar named Desire (+ The Glass Menagerie + Suddenly last Summer)', 272, '', 'Anglais', 1);
INSERT INTO `livre` VALUES(609, 'A Bit off the Map and other stories', 273, '', 'Anglais', 1);
INSERT INTO `livre` VALUES(610, 'Anglo-Saxon Attitudes', 273, '', 'Anglais', 1);
INSERT INTO `livre` VALUES(611, 'Kipling', 273, '', 'Anglais', 1);
INSERT INTO `livre` VALUES(612, 'The Old Men at the Zoo', 273, '', 'Anglais', 1);
INSERT INTO `livre` VALUES(613, 'The Wrong Set and other stories', 273, '', 'Anglais', 1);
INSERT INTO `livre` VALUES(614, 'The Crown of Life', 274, '', 'Anglais', 1);
INSERT INTO `livre` VALUES(615, 'The Schlemiel (Schlemihl?) as modern hero', 275, '', 'Anglais', 1);
INSERT INTO `livre` VALUES(616, 'Blandings Castle', 276, '', 'Anglais', 1);
INSERT INTO `livre` VALUES(617, 'Laughing Gas', 276, '', 'Anglais', 1);
INSERT INTO `livre` VALUES(618, 'A Study x 2', 277, '', 'Anglais', 1);
INSERT INTO `livre` VALUES(619, 'Que l’ange regarde de ce côté', 277, '', 'Anglais', 1);
INSERT INTO `livre` VALUES(620, 'The Painted Word', 278, '', 'Anglais', 1);
INSERT INTO `livre` VALUES(621, 'A Room of one’s own', 279, '', 'Anglais', 1);
INSERT INTO `livre` VALUES(622, 'A Woman’s essays', 279, '', 'Anglais', 1);
INSERT INTO `livre` VALUES(623, 'BELL Quentin: Woolf Volumes I and II', 279, '', 'Anglais', 1);
INSERT INTO `livre` VALUES(624, 'Between the Acts', 279, '', 'Anglais', 1);
INSERT INTO `livre` VALUES(625, 'Colloque de Cerisy', 279, '', 'Anglais', 1);
INSERT INTO `livre` VALUES(626, 'HARPER Howard: Between Language and Silence: The Novels of Virginia Woolf', 279, '', 'Anglais', 1);
INSERT INTO `livre` VALUES(627, 'Jacob’s Room x 2', 279, '', 'Anglais', 1);
INSERT INTO `livre` VALUES(628, 'LAURENCE Patricia Ondek: The reading of Silence: Virginia Woolf in the English Tradition', 279, '', 'Anglais', 1);
INSERT INTO `livre` VALUES(629, 'Mrs Dalloway x2', 279, '', 'Anglais', 1);
INSERT INTO `livre` VALUES(630, 'Orlando', 279, '', 'Anglais', 1);
INSERT INTO `livre` VALUES(631, 'Plus', 279, '', 'Anglais', 1);
INSERT INTO `livre` VALUES(632, 'The Voyage out', 279, '', 'Anglais', 1);
INSERT INTO `livre` VALUES(633, 'The Waves (édition française)', 279, '', 'Anglais', 1);
INSERT INTO `livre` VALUES(634, 'To the Lighthouse x 2 (+ 3 critical studies)', 279, '', 'Anglais', 1);
INSERT INTO `livre` VALUES(635, 'While Rome burns', 280, '', 'Anglais', 1);
INSERT INTO `livre` VALUES(636, 'Lyrical Ballads (with Samuel Taylor Coleridge)', 281, '', 'Anglais', 1);
INSERT INTO `livre` VALUES(637, 'The Prelude (bilingual)', 281, '', 'Anglais', 1);
INSERT INTO `livre` VALUES(638, 'Black Boy', 282, '', 'Anglais', 1);
INSERT INTO `livre` VALUES(639, 'Native Son (x2)', 282, '', 'Anglais', 1);
INSERT INTO `livre` VALUES(640, 'Collected Poems', 283, '', 'Anglais', 1);
INSERT INTO `livre` VALUES(641, 'Poems', 283, '', 'Anglais', 1);
INSERT INTO `livre` VALUES(642, 'Short Stories', 283, '', 'Anglais', 1);
INSERT INTO `livre` VALUES(643, 'The Crescent Moon', 284, '', 'Anglais', 1);
INSERT INTO `livre` VALUES(644, 'The French', 285, '', 'Anglais', 1);

DROP TABLE IF EXISTS `reserver`;
CREATE TABLE `reserver` (
  `numEmprunteur` int(10) NOT NULL,
  `numLivre` int(10) NOT NULL,
  `dateReservation` datetime NOT NULL,
  `retireReservation` tinyint(1) NOT NULL,
  PRIMARY KEY (`numEmprunteur`,`numLivre`),
  KEY `numLivre` (`numLivre`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



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

ALTER TABLE `livre`
  ADD CONSTRAINT `livre_ibfk_1` FOREIGN KEY (`numAuteur`) REFERENCES `auteur` (`numAuteur`);

ALTER TABLE `reserver`
  ADD CONSTRAINT `reserver_ibfk_1` FOREIGN KEY (`numEmprunteur`) REFERENCES `emprunteur` (`numEmprunteur`),
  ADD CONSTRAINT `reserver_ibfk_2` FOREIGN KEY (`numLivre`) REFERENCES `livre` (`numLivre`);
