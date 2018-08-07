-- phpMyAdmin SQL Dump
-- version 4.7.3
-- https://www.phpmyadmin.net/
--
-- Hôte : jbeunaicmcblogp4.mysql.db
-- Généré le :  mar. 07 août 2018 à 11:02
-- Version du serveur :  5.6.39-log
-- Version de PHP :  7.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `jbeunaicmcblogp4`
--

-- --------------------------------------------------------

--
-- Structure de la table `comment`
--

CREATE TABLE `comment` (
  `id` int(11) NOT NULL,
  `postid` int(11) NOT NULL,
  `author` varchar(255) CHARACTER SET utf8 NOT NULL,
  `comment` text CHARACTER SET utf8 NOT NULL,
  `createdCom` datetime NOT NULL,
  `status` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `comment`
--

INSERT INTO `comment` (`id`, `postid`, `author`, `comment`, `createdCom`, `status`) VALUES
(5, 12, 'Julien', 'Joli début de Roman', '2018-08-06 15:56:33', 0),
(6, 12, 'Jean Forteroche', 'Merci . ', '2018-08-06 15:56:48', 0),
(10, 9, 'Julien', 'Beau début', '2018-08-06 16:03:39', 0);

-- --------------------------------------------------------

--
-- Structure de la table `member`
--

CREATE TABLE `member` (
  `id` int(255) UNSIGNED NOT NULL,
  `pseudo` varchar(50) DEFAULT NULL,
  `mail` varchar(191) DEFAULT NULL,
  `password` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `member`
--

INSERT INTO `member` (`id`, `pseudo`, `mail`, `password`) VALUES
(60, 'Forteroche', 'jbeunaiche@gmail.com', '$2y$12$af6KzNLzRCgUxnninYhReO41ZVa8.d96DuZRL9JBUpSI0wyhncYiu'),
(62, 'Julien', 'jbeunaiche@sfr.fr', '$2y$12$lpmj8qB.yNxPJyWTaQ5KUum5eWwN5ObGhFmoLPMGQvBexGCxgBoay');

-- --------------------------------------------------------

--
-- Structure de la table `post`
--

CREATE TABLE `post` (
  `id` int(11) NOT NULL,
  `title` varchar(255) CHARACTER SET utf8 NOT NULL,
  `resume` varchar(255) CHARACTER SET utf8 NOT NULL,
  `content` text CHARACTER SET utf8 NOT NULL,
  `created` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `post`
--

INSERT INTO `post` (`id`, `title`, `resume`, `content`, `created`) VALUES
(9, 'Alaska', '<p>Chapitre 1</p>', '<p style=\"margin: 0px 0px 1em; padding: 0px; border: 0px; outline: 0px; font-size: 15px; vertical-align: baseline; background-image: initial; background-position: 0px 0px; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; line-height: 1.6em; font-family: Helvetica;\">UN &Eacute;CUEIL FUYANT</p>\r\n<p style=\"margin: 0px 0px 1em; padding: 0px; border: 0px; outline: 0px; font-size: 15px; vertical-align: baseline; background-image: initial; background-position: 0px 0px; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; line-height: 1.6em; font-family: Helvetica;\">L\'ann&eacute;e 1866 fut marqu&eacute;e par un &eacute;v&eacute;nement bizarre, un ph&eacute;nom&egrave;ne inexpliqu&eacute; et inexplicable que personne n\'a sans doute oubli&eacute;. Sans parler des rumeurs qui agitaient les populations des ports et surexcitaient l\'esprit public &agrave; l\'int&eacute;rieur des continents les gens de mer furent particuli&egrave;rement &eacute;mus. Les n&eacute;gociants, armateurs, capitaines de navires, skippers et masters de l\'Europe et de l\'Am&eacute;rique, officiers des marines militaires de tous pays, et, apr&egrave;s eux, les gouvernements des divers &Eacute;tats des deux continents, se pr&eacute;occup&egrave;rent de ce fait au plus haut point.</p>', '2018-08-06 15:54:21'),
(10, 'Alaska', '<p>Chapitre 2</p>', '<p style=\"margin: 0px 0px 1em; padding: 0px; border: 0px; outline: 0px; font-size: 15px; vertical-align: baseline; background-image: initial; background-position: 0px 0px; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; line-height: 1.6em; font-family: Helvetica;\">Les faits relatifs &agrave; cette apparition, consign&eacute;s aux divers livres de bord, s\'accordaient assez exactement sur la structure de l\'objet ou de l\'&ecirc;tre en question, la vitesse inou&iuml;e de ses mouvements, la puissance surprenante de sa locomotion, la vie particuli&egrave;re dont il semblait dou&eacute;. Si c\'&eacute;tait un c&eacute;tac&eacute;, il surpassait en volume tous ceux que la science avait class&eacute;s jusqu\'alors. Ni Cuvier, ni Lac&eacute;p&egrave;de, ni M. Dumeril, ni M. de Quatrefages n\'eussent admis l\'existence d\'un tel monstre -- &agrave; moins de l\'avoir vu, ce qui s\'appelle vu de leurs propres yeux de savants.</p>\r\n<p style=\"margin: 0px 0px 1em; padding: 0px; border: 0px; outline: 0px; font-size: 15px; vertical-align: baseline; background-image: initial; background-position: 0px 0px; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; line-height: 1.6em; font-family: Helvetica;\">A prendre la moyenne des observations faites &agrave; diverses reprises -- en rejetant les &eacute;valuations timides qui assignaient &agrave; cet objet une longueur de deux cents pieds et en repoussant les opinions exag&eacute;r&eacute;es qui le disaient large d\'un mille et long de trois -- on pouvait affirmer, cependant, que cet &ecirc;tre ph&eacute;nom&eacute;nal d&eacute;passait de beaucoup toutes les dimensions admises jusqu\'&agrave; ce jour par les ichtyologistes -- s\'il existait toutefois.</p>\r\n<p style=\"margin: 0px 0px 1em; padding: 0px; border: 0px; outline: 0px; font-size: 15px; vertical-align: baseline; background-image: initial; background-position: 0px 0px; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; line-height: 1.6em; font-family: Helvetica;\">Or, il existait, le fait en lui-m&ecirc;me n\'&eacute;tait plus niable, et, avec ce penchant qui pousse au merveilleux la cervelle humaine, on comprendra l\'&eacute;motion produite dans le monde entier par cette surnaturelle apparition. Quant &agrave; la rejeter au rang des fables, il fallait y renoncer.</p>', '2018-08-06 15:54:49'),
(11, 'En route pour l\'aventure', '<p>Chapitre 3&nbsp;</p>', '<p><span style=\"font-family: Helvetica; font-size: 15px;\">Pareil fait fut &eacute;galement observ&eacute; le 23 juillet de la m&ecirc;me ann&eacute;e, dans les mers du Pacifique, par le _Cristobal-Colon_, de West India and Pacific steam navigation Company. Donc, ce c&eacute;tac&eacute; extraordinaire pouvait se transporter d\'un endroit &agrave; un autre avec une v&eacute;locit&eacute; surprenante, puisque &agrave; trois jours d\'intervalle, le _Governor-Higginson_ et le _Cristobal-Colon_ l\'avaient observ&eacute; en deux points de la carte s&eacute;par&eacute;s par une distance de plus de sept cents lieues marines. Quinze jours plus tard, &agrave; deux mille lieues de l&agrave; l\'</span><em style=\"margin: 0px; padding: 0px; border: 0px; outline: 0px; font-size: 15px; vertical-align: baseline; background-image: initial; background-position: 0px 0px; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; font-family: Helvetica;\">Helvetia</em><span style=\"font-family: Helvetica; font-size: 15px;\">, de la Compagnie Nationale, et le&nbsp;</span><em style=\"margin: 0px; padding: 0px; border: 0px; outline: 0px; font-size: 15px; vertical-align: baseline; background-image: initial; background-position: 0px 0px; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; font-family: Helvetica;\">Shannon</em><span style=\"font-family: Helvetica; font-size: 15px;\">, du Royal-Mail, marchant &agrave; contrebord dans cette portion de l\'Atlantique comprise entre les &Eacute;tats-Unis et l\'Europe, se signal&egrave;rent respectivement le monstre par 42&deg;15\' de latitude nord, et 60&deg;35\' de longitude &agrave; l\'ouest du m&eacute;ridien de Greenwich. Dans cette observation simultan&eacute;e, on crut pouvoir &eacute;valuer la longueur minimum du mammif&egrave;re &agrave; plus de trois cent cinquante pieds anglais, puisque le&nbsp;</span><em style=\"margin: 0px; padding: 0px; border: 0px; outline: 0px; font-size: 15px; vertical-align: baseline; background-image: initial; background-position: 0px 0px; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; font-family: Helvetica;\">Shannon</em><span style=\"font-family: Helvetica; font-size: 15px;\">&nbsp;et l\'</span><em style=\"margin: 0px; padding: 0px; border: 0px; outline: 0px; font-size: 15px; vertical-align: baseline; background-image: initial; background-position: 0px 0px; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; font-family: Helvetica;\">Helvetia</em><span style=\"font-family: Helvetica; font-size: 15px;\">&nbsp;&eacute;taient de dimension inf&eacute;rieure &agrave; lui, bien qu\'ils mesurassent cent m&egrave;tres de l\'&eacute;trave &agrave; l\'&eacute;tambot. Or, les plus vastes baleines, celles qui fr&eacute;quentent les parages des &icirc;les Al&eacute;outiennes, le Kulammak et l\'Umgullick, n\'ont jamais d&eacute;pass&eacute; la longueur de cinquante-six m&egrave;tres, -- si m&ecirc;me elles l\'atteignent.</span></p>', '2018-08-06 15:55:31'),
(12, 'Toujours l\'aventure', '<p>Chapitre 2&nbsp;</p>', '<p style=\"margin: 0px 0px 1em; padding: 0px; border: 0px; outline: 0px; font-size: 15px; vertical-align: baseline; background-image: initial; background-position: 0px 0px; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; line-height: 1.6em; font-family: Helvetica;\">Six mois durant, la guerre se poursuivit avec des chances diverses. Aux articles de fond de l\'Institut g&eacute;ographique du Br&eacute;sil, de l\'Acad&eacute;mie royale des sciences de Berlin, de l\'Association Britannique, de l\'Institution Smithsonnienne de Washington, aux discussions du&nbsp;<em style=\"margin: 0px; padding: 0px; border: 0px; outline: 0px; vertical-align: baseline; background: 0px 0px;\">The Indian Archipelago</em>, du&nbsp;<em style=\"margin: 0px; padding: 0px; border: 0px; outline: 0px; vertical-align: baseline; background: 0px 0px;\">Cosmos</em>&nbsp;de l\'abb&eacute; Moigno, des&nbsp;<em style=\"margin: 0px; padding: 0px; border: 0px; outline: 0px; vertical-align: baseline; background: 0px 0px;\">Mittheilungen</em>&nbsp;de Petermann, aux chroniques scientifiques des grands journaux de la France et de l\'&eacute;tranger, la petite presse ripostait avec une verve intarissable. Ses spirituels &eacute;crivains parodiant un mot de Linn&eacute;, cit&eacute; par les adversaires du monstre, soutinrent en effet que &laquo; la nature ne faisait pas de sots &raquo;, et ils adjur&egrave;rent leurs contemporains de ne point donner un d&eacute;menti &agrave; la nature, en admettant l\'existence des Krakens, des serpents de mer, des &laquo; Moby Dick &raquo;, et autres &eacute;lucubrations de marins en d&eacute;lire. Enfin, dans un article d\'un journal satirique tr&egrave;s redout&eacute;, le plus aim&eacute; de ses r&eacute;dacteurs, brochant sur le tout, poussa au monstre, comme Hippolyte, lui porta un dernier coup et l\'acheva au milieu d\'un &eacute;clat de rire universel. L\'esprit avait vaincu la science.</p>\r\n<p style=\"margin: 0px 0px 1em; padding: 0px; border: 0px; outline: 0px; font-size: 15px; vertical-align: baseline; background-image: initial; background-position: 0px 0px; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; line-height: 1.6em; font-family: Helvetica;\">Pendant les premiers mois de l\'ann&eacute;e 1867, la question parut &ecirc;tre enterr&eacute;e, et elle ne semblait pas devoir rena&icirc;tre, quand de nouveaux faits furent port&eacute;s &agrave; la connaissance du public.</p>', '2018-08-06 15:56:06'),
(13, 'Test', '<p>Bonjour</p>', '<p>mDDDDDDDDDDD</p>', '2018-08-07 09:57:33');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_post_id` (`postid`);

--
-- Index pour la table `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `mail` (`mail`),
  ADD UNIQUE KEY `pseudo` (`pseudo`),
  ADD UNIQUE KEY `pseudo_2` (`pseudo`,`mail`),
  ADD UNIQUE KEY `pseudo_3` (`pseudo`,`mail`),
  ADD UNIQUE KEY `pseudo_4` (`pseudo`),
  ADD UNIQUE KEY `mail_2` (`mail`);

--
-- Index pour la table `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `comment`
--
ALTER TABLE `comment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT pour la table `member`
--
ALTER TABLE `member`
  MODIFY `id` int(255) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;
--
-- AUTO_INCREMENT pour la table `post`
--
ALTER TABLE `post`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `comment`
--
ALTER TABLE `comment`
  ADD CONSTRAINT `fk_post_id` FOREIGN KEY (`postid`) REFERENCES `post` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
