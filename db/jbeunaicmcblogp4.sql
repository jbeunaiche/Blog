-- phpMyAdmin SQL Dump
-- version 4.7.3
-- https://www.phpmyadmin.net/
--
-- Hôte : jbeunaicmcblogp4.mysql.db
-- Généré le :  ven. 10 août 2018 à 19:31
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
(18, 16, 'Julien', 'Vivement le prochain article', '2018-08-07 21:12:13', 0),
(20, 16, 'Toto', 'C\'est pas terrible...', '2018-08-07 21:12:41', 0),
(21, 18, 'Julien', 'Continuez comme ça. J\'aime lire votre blog', '2018-08-07 21:13:16', 1),
(22, 18, 'Forteroche', 'Merci', '2018-08-07 21:13:26', 0),
(26, 18, 'Julien', 'Bonjour', '2018-08-10 10:17:49', 0);

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
(16, 'Partie 2', '<p>Phileas Fogg &eacute;tait membre du Reform-Club, et voil&agrave; tout</p>', '<p>&Agrave; qui s&rsquo;&eacute;tonnerait de ce qu&rsquo;un gentleman aussi myst&eacute;rieux compt&acirc;t parmi les membres de cette honorable association, on r&eacute;pondra qu&rsquo;il passa sur la recommandation de MM. Baring fr&egrave;res, chez lesquels il avait un cr&eacute;dit ouvert. De l&agrave; une certaine &laquo; surface &raquo;, due &agrave; ce que ses ch&egrave;ques &eacute;taient r&eacute;guli&egrave;rement pay&eacute;s &agrave; vue par le d&eacute;bit de son compte courant invariablement cr&eacute;diteur. Ce Phileas Fogg &eacute;tait-il riche ? Incontestablement. Mais comment il avait fait fortune, c&rsquo;est ce que les mieux inform&eacute;s ne pouvaient dire, et Mr. Fogg &eacute;tait le dernier auquel il conv&icirc;nt de s&rsquo;adresser pour l&rsquo;apprendre. En tout cas, il n&rsquo;&eacute;tait prodigue de rien, mais non avare, car partout o&ugrave; il manquait un appoint pour une chose noble, utile ou g&eacute;n&eacute;reuse, il l&rsquo;apportait silencieusement et m&ecirc;me anonymement. En somme, rien de moins communicatif que ce gentleman. Il parlait aussi peu que possible, et semblait d&rsquo;autant plus myst&eacute;rieux qu&rsquo;il &eacute;tait silencieux. Cependant sa vie &eacute;tait &agrave; jour, mais ce qu&rsquo;il faisait &eacute;tait si math&eacute;matiquement toujours la m&ecirc;me chose, que l&rsquo;imagination, m&eacute;contente, cherchait au-del&agrave;. Avait-il voyag&eacute; ? C&rsquo;&eacute;tait probable, car personne ne poss&eacute;dait mieux que lui la carte du monde. Il n&rsquo;&eacute;tait endroit si recul&eacute; dont il ne par&ucirc;t avoir une connaissance sp&eacute;ciale. Quelquefois, mais en peu de mots, brefs et clairs, il redressait les mille propos qui circulaient dans le club au sujet des voyageurs perdus ou &eacute;gar&eacute;s ; il indiquait les vraies probabilit&eacute;s, et ses paroles s&rsquo;&eacute;taient trouv&eacute;es souvent comme inspir&eacute;es par une seconde vue, tant l&rsquo;&eacute;v&eacute;nement finissait toujours par les justifier. C&rsquo;&eacute;tait un homme qui avait d&ucirc; voyager partout, &ndash; en esprit, tout au moins.&nbsp;</p>', '2018-08-07 21:09:02'),
(18, 'Partie 3 ', '<p>Ce qui &eacute;tait certain toutefois, c&rsquo;est que, depuis de longues ann&eacute;es, Phileas Fogg n&rsquo;avait pas quitt&eacute; Londres.&nbsp;</p>', '<p>Ceux qui avaient l&rsquo;honneur de le conna&icirc;tre un peu plus que les autres attestaient que &ndash; si ce n&rsquo;est sur ce chemin direct qu&rsquo;il parcourait chaque jour pour venir de sa maison au club &ndash; personne ne pouvait pr&eacute;tendre l&rsquo;avoir jamais vu ailleurs. Son seul passe-temps &eacute;tait de lire les journaux et de jouer au whist. &Agrave; ce jeu du silence, si bien appropri&eacute; &agrave; sa nature, il gagnait souvent, mais ses gains n&rsquo;entraient jamais dans sa bourse et figuraient pour une somme importante &agrave; son budget de charit&eacute;. D&rsquo;ailleurs, il faut le remarquer, Mr. Fogg jouait &eacute;videmment pour jouer, non pour gagner. Le jeu &eacute;tait pour lui un combat, une lutte contre une difficult&eacute;, mais une lutte sans mouvement, sans d&eacute;placement, sans fatigue, et cela allait &agrave; son caract&egrave;re. On ne connaissait &agrave; Phileas Fogg ni femme ni enfants, &ndash; ce qui peut arriver aux gens les plus honn&ecirc;tes, &ndash; ni parents ni amis, &ndash; ce qui est plus rare en v&eacute;rit&eacute;. Phileas Fogg vivait seul dans sa maison de Saville-row, o&ugrave; personne ne p&eacute;n&eacute;trait. De son int&eacute;rieur, jamais il n&rsquo;&eacute;tait question. Un seul domestique suffisait &agrave; le servir.</p>', '2018-08-07 21:10:53');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
--
-- AUTO_INCREMENT pour la table `member`
--
ALTER TABLE `member`
  MODIFY `id` int(255) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;
--
-- AUTO_INCREMENT pour la table `post`
--
ALTER TABLE `post`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
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
