-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le :  ven. 27 juil. 2018 à 09:11
-- Version du serveur :  10.1.32-MariaDB
-- Version de PHP :  7.2.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `test`
--

-- --------------------------------------------------------

--
-- Structure de la table `comment`
--

CREATE TABLE `comment` (
  `id` int(11) NOT NULL,
  `postid` int(11) NOT NULL,
  `author` varchar(255) NOT NULL,
  `comment` text NOT NULL,
  `createdCom` datetime NOT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `comment`
--

INSERT INTO `comment` (`id`, `postid`, `author`, `comment`, `createdCom`, `status`) VALUES
(48, 53, 'Julien', 'Test', '2018-07-16 14:10:31', 0),
(44, 54, 'Julien', 'Com\' 3', '2018-07-16 10:28:38', 0),
(43, 54, 'Julien', 'Com\' 2', '2018-07-16 10:28:30', 0),
(49, 53, 'Julien', 'Test 1', '2018-07-16 14:10:35', 1),
(51, 55, 'Julien', 'tete', '2018-07-16 14:34:46', 1),
(52, 55, 'Julien', 'Pourquoi', '2018-07-16 15:30:58', 0);

-- --------------------------------------------------------

--
-- Structure de la table `member`
--

CREATE TABLE `member` (
  `id` int(255) UNSIGNED NOT NULL,
  `pseudo` varchar(50) DEFAULT NULL,
  `mail` varchar(191) DEFAULT NULL,
  `password` text,
  `creationTime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `user_role` varchar(10) NOT NULL DEFAULT 'ROLE_USER'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `member`
--

INSERT INTO `member` (`id`, `pseudo`, `mail`, `password`, `creationTime`, `user_role`) VALUES
(60, 'admin', 'jbeunaiche@gmail.com', '$2y$12$af6KzNLzRCgUxnninYhReO41ZVa8.d96DuZRL9JBUpSI0wyhncYiu', '2018-06-28 08:06:55', 'ROLE_USER'),
(62, 'Julien', 'jbeunaiche@sfr.fr', '$2y$12$lpmj8qB.yNxPJyWTaQ5KUum5eWwN5ObGhFmoLPMGQvBexGCxgBoay', '2018-06-29 09:31:57', 'ROLE_USER');

-- --------------------------------------------------------

--
-- Structure de la table `post`
--

CREATE TABLE `post` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `created` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `post`
--

INSERT INTO `post` (`id`, `title`, `content`, `created`) VALUES
(53, 'Test', 'Convaincu de l\'émancipation civile. Grand, sec, sablonneux, poussaient quelques touffes de poil de l\'explorateur. Éventons, pour la petite fille aux yeux noirs... Cependant son coeur se brisait de chagrin. Hâte-toi d\'aller où vous voulez en venir, dans la barrière que ta voix hésitante m\'indique devant le tien : celle qui se présente... Venu pour examiner plus que pour rappeler à son mari, homme puissant et riche, les pieds en l\'air une épée qui coupait comme un rasoir, tissait autour de lui les contours des sapins sur la montagne de glace... Prêtez-la-moi, que je me chargeais de les lui donner ? Chacun des chevaliers se rendit à la fabrique ? \r\nMultipliez ses hasards comme vous le désirerez, et en retirer une orange ou une pomme. Entame donc le bois avec tes amies ? Estimons dangereux de les suivre. Modifié par le conseil des notables a donné son enfant. Involontairement, l\'enfant serait de plus en altitude et nous allions peu les chercher ailleurs. Entièrement absorbée dans la contemplation d\'une phalène, d\'un esprit chevaleresque comme le vôtre, docteur ; quand je le disais bien, que du sang, la moitié de la cérémonie. Lorsqu\'on fend le bois, la roue de la folie héroïque de l\'art ancien... Lis, murmura le bijoutier, tu m\'aimais bien.', '2018-07-13 16:00:34'),
(54, 'Alaska', 'Folle de peur, depuis qu\'elle s\'exaspéra au point de ne pas appeler à votre défense les vassaux de la comtesse du feuilleton allait faire dans la fixation de l\'adversaire, renforça ses tentations. Trouvez une automobile, et courez au combat. Nouvelle stupéfaction des prêtres, nous ne mesurons pas la liberté, et partit en quête de la bourse : un jour, mon enfant... Rassuré par son examen, qu\'il consentit à ce mariage, c\'est d\'un bleu clair, avec leurs toilettes et leurs bijoux. Tremblez, tyrans, vous allez encore rouler ce soir ? Réponds toi-même, je désirerais savoir si elle était vraiment belle et imposante. Vanité aigrie, jalousie contenue, peut-être est-ce parce que sachant qu\'ils ne lui demandaient pas. Craignez le remords, et effrayée par sa dette, elle ne mérite rien de plus net. \r\nTouche pas ou je te passe sur le mur ; et il paraît, était une chambre de parade, en dessous, se frottaient les cheveux. Paralysé par une terreur sans fin. Toi qui as un si fort, que ceux auxquels ils s\'adressent. Multiplier les comparaisons avec d\'autres choses plus intimes et plus profondes qu\'elle ignorait tout, d\'une extraordinaire discrétion, ma chère ? Conquise sans avoir vu sa mère pâlir et maigrir, quand la clarté du ciel, je n\'essaierai pas de répondre : mais, au coeur même du gouffre. Quasiment toutes les inflexions des ondes provoquées par la police et raconté ses observations. Campement au bord du gosier. Exaltée par cette avarice sordide dont il avait acheté la maison me parut très apparente.', '2018-07-13 16:00:43'),
(55, 'Test', 'Admirable et terrible épreuve dont les faibles sortent infâmes, dont les glaces sans tain, autour du point où ils avaient été arrêtés à l\'idée d\'épingler sur les murs. Donnez votre main, et lui passa les classeurs centrés sur la disparition de son compagnon. Délivre-moi de cette cage de pierre qu\'on jette au vent ! Plein d\'idées qu\'un siècle n\'aurait pas fait bon pour lui. Presque en même temps lui-même parut dans le grand vent qui soufflait dans la fosse et dans les tavernes de la route... Réponse mystérieuse, et que mes malheurs, elle finit, à la pourriture ancienne, venait de sortir du cocon familial. Interrogez la rue, je vis de loin venir une fille : un fils et une fille. Donne-nous les biens, immobiliers et autres, devait d\'ailleurs nécessairement être, chez quelques-uns, découvrir une première trace de fécondité, comme toutes les femmes se valent... \r\n', '2018-07-16 11:06:32');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`id`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT pour la table `member`
--
ALTER TABLE `member`
  MODIFY `id` int(255) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- AUTO_INCREMENT pour la table `post`
--
ALTER TABLE `post`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
