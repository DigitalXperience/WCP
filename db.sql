-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:3306
-- Généré le : mer. 05 jan. 2022 à 09:54
-- Version du serveur :  10.3.32-MariaDB-log
-- Version de PHP : 7.3.32

SET FOREIGN_KEY_CHECKS=0;
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `exportfoot_can2022`
--

-- --------------------------------------------------------

--
-- Structure de la table `admin_config`
--

CREATE TABLE `admin_config` (
  `id` int(11) NOT NULL,
  `label` varchar(200) NOT NULL,
  `valeur` varchar(200) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `admin_config`
--

INSERT INTO `admin_config` (`id`, `label`, `valeur`) VALUES
(3, 'pt_prono_issue', '5'),
(2, 'pt_prono_score', '10'),
(4, 'pt_prono_ouverture_score', '3'),
(5, 'pt_prono_premier_buteur', '1');

-- --------------------------------------------------------

--
-- Structure de la table `ci_sessions`
--

CREATE TABLE `ci_sessions` (
  `id` varchar(40) NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `timestamp` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `data` blob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `competitions`
--

CREATE TABLE `competitions` (
  `id` int(11) NOT NULL,
  `nom` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `image` varchar(500) COLLATE utf8_unicode_ci DEFAULT '0',
  `date_heure_debut` datetime NOT NULL,
  `date_heure_fin` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `competitions`
--

INSERT INTO `competitions` (`id`, `nom`, `status`, `image`, `date_heure_debut`, `date_heure_fin`) VALUES
(1, 'Fête du Football Masculin', 1, '0', '2021-10-07 17:00:00', '2021-11-14 20:00:00');

-- --------------------------------------------------------

--
-- Structure de la table `equipes`
--

CREATE TABLE `equipes` (
  `id` int(11) NOT NULL,
  `name` varchar(60) NOT NULL,
  `flag` varchar(200) DEFAULT NULL,
  `id_competition` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Noms et drapeaux des équipes';

--
-- Déchargement des données de la table `equipes`
--

INSERT INTO `equipes` (`id`, `name`, `flag`, `id_competition`) VALUES
(1, 'Cameroun', 'https://images.33export-foot.com/cam3.png', 0),
(2, 'Mozambique', 'https://images.33export-foot.com/moz3.png', 0),
(3, 'Malawi', 'https://images.33export-foot.com/mal.png', 0),
(4, 'Côte d\'Ivoire', 'https://images.33export-foot.com/c-iv.png', 0),
(5, 'Burkina Faso', 'https://images.33export-foot.com/bfaso.png', 0),
(6, 'Ethiopie', 'https://images.33export-foot.com/ethiopia.png', 0),
(7, 'Cap-Vert', 'https://images.33export-foot.com/capvert.png', 0);

-- --------------------------------------------------------

--
-- Structure de la table `notifications_fb`
--

CREATE TABLE `notifications_fb` (
  `id` int(11) NOT NULL,
  `utilisateur_id` int(11) NOT NULL,
  `msg` varchar(120) COLLATE utf8_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `notifications_fb`
--

INSERT INTO `notifications_fb` (`id`, `utilisateur_id`, `msg`, `status`) VALUES
(1, 4, 'Votre pronostique était bon! Bravo!!!', 0),
(2, 7, 'Votre pronostique était bon! Bravo!!!', 0),
(3, 26, 'Votre pronostique était bon! Bravo!!!', 0),
(4, 35, 'Votre pronostique était bon! Bravo!!!', 0),
(5, 37, 'Votre pronostique était bon! Bravo!!!', 0),
(6, 45, 'Votre pronostique était bon! Bravo!!!', 0),
(7, 46, 'Votre pronostique était bon! Bravo!!!', 0),
(8, 54, 'Votre pronostique était bon! Bravo!!!', 0),
(9, 6, 'Votre pronostique était bon! Bravo!!!', 0),
(10, 20, 'Votre pronostique était bon! Bravo!!!', 0),
(11, 33, 'Votre pronostique était bon! Bravo!!!', 0),
(12, 37, 'Votre pronostique était bon! Bravo!!!', 0),
(13, 82, 'Votre pronostique était bon! Bravo!!!', 0),
(14, 194, 'Votre pronostique était bon! Bravo!!!', 0),
(15, 195, 'Votre pronostique était bon! Bravo!!!', 0),
(16, 214, 'Votre pronostique était bon! Bravo!!!', 0),
(17, 222, 'Votre pronostique était bon! Bravo!!!', 0);

-- --------------------------------------------------------

--
-- Structure de la table `pronostics`
--

CREATE TABLE `pronostics` (
  `id` int(11) NOT NULL,
  `rencontre_id` int(11) NOT NULL,
  `utilisateur_id` int(11) NOT NULL,
  `score_eq1` int(11) DEFAULT NULL,
  `score_eq2` int(11) DEFAULT NULL,
  `vainqueur_id` int(11) DEFAULT NULL,
  `score_ouverture` int(11) DEFAULT NULL COMMENT 'Id de léquipe qui ouvre le score',
  `score_min` enum('0-15','15-30','30-45','45-60','60-75','75-90') DEFAULT NULL COMMENT 'Minute ouverture du score',
  `dateheure` datetime NOT NULL DEFAULT current_timestamp(),
  `pts_obtenus` int(4) DEFAULT NULL,
  `bonus_obtenus` int(11) DEFAULT NULL,
  `last_update` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `last_ip_for_update` varchar(15) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `pronostics`
--

INSERT INTO `pronostics` (`id`, `rencontre_id`, `utilisateur_id`, `score_eq1`, `score_eq2`, `vainqueur_id`, `score_ouverture`, `score_min`, `dateheure`, `pts_obtenus`, `bonus_obtenus`, `last_update`, `last_ip_for_update`) VALUES
(1, 1, 194, 2, 0, NULL, 1, '15-30', '2022-01-04 09:29:24', NULL, NULL, '2022-01-04 00:29:24', '41.202.207.133'),
(2, 2, 194, 1, 2, NULL, NULL, '15-30', '2022-01-04 09:29:24', NULL, NULL, '2022-01-04 00:29:24', '41.202.207.133'),
(3, 1, 197, 3, 0, NULL, 1, '15-30', '2022-01-04 18:32:00', NULL, NULL, '2022-01-04 09:32:00', '129.0.226.197'),
(4, 2, 197, 1, 1, NULL, 6, '30-45', '2022-01-04 18:32:00', NULL, NULL, '2022-01-04 09:32:00', '129.0.226.197'),
(5, 1, 56, 1, 0, NULL, 1, '15-30', '2022-01-05 09:21:36', NULL, NULL, '2022-01-05 00:21:36', '129.0.125.249'),
(6, 2, 56, 1, 1, NULL, 7, '30-45', '2022-01-05 09:21:36', NULL, NULL, '2022-01-05 00:21:36', '129.0.125.249'),
(7, 1, 499, 2, 1, NULL, 1, '15-30', '2022-01-05 09:37:45', NULL, NULL, '2022-01-05 00:37:45', '129.0.125.249'),
(8, 2, 499, 0, 0, NULL, NULL, NULL, '2022-01-05 09:37:45', NULL, NULL, '2022-01-05 00:37:45', '129.0.125.249');

-- --------------------------------------------------------

--
-- Structure de la table `stades`
--

CREATE TABLE `stades` (
  `id` int(11) NOT NULL,
  `nom` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `image` varchar(500) COLLATE utf8_unicode_ci DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `rencontres`
--

CREATE TABLE `rencontres` (
  `id` int(11) NOT NULL,
  `equipe_id1` int(11) NOT NULL,
  `equipe_id2` int(11) NOT NULL,
  `date_heure` datetime NOT NULL,
  `score_eq1` tinyint(2) DEFAULT NULL,
  `score_eq2` tinyint(2) DEFAULT NULL,
  `score_ouverture` int(11) DEFAULT NULL,
  `score_min` enum('0-15','15-30','30-45','45-60','60-75','75-90') DEFAULT NULL,
  `en_avant` int(1) NOT NULL DEFAULT 0,
  `id_competition` int(11) NOT NULL,
  `id_stade` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `rencontres`
--

INSERT INTO `rencontres` (`id`, `equipe_id1`, `equipe_id2`, `date_heure`, `score_eq1`, `score_eq2`, `score_ouverture`, `score_min`, `en_avant`, `id_competition`) VALUES
(1, 1, 5, '2022-01-09 17:00:00', NULL, NULL, NULL, NULL, 1, 1),
(2, 6, 7, '2022-01-09 20:00:00', NULL, NULL, NULL, NULL, 1, 1);

-- --------------------------------------------------------

--
-- Structure de la table `traces`
--

CREATE TABLE `traces` (
  `id` int(11) NOT NULL,
  `logs` text NOT NULL,
  `heure` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `traces`
--

INSERT INTO `traces` (`id`, `logs`, `heure`) VALUES
(1, 'Tentative de login Facebook pour Patient Assontia avec id=10159086850519961 et email assontia@gmail.com', '2022-01-03 21:17:44'),
(2, 'Affiche page mon profil de Patient Assontia id: 1', '2022-01-03 21:17:44'),
(3, 'Affiche page des pronostics par Patient Assontia id: 1', '2022-01-03 21:17:49'),
(4, 'Tentative de login Facebook pour David Zemix avec id=124645193325267 et email ', '2022-01-04 09:27:35'),
(5, 'Affiche page mon profil de David Zemix id: 194', '2022-01-04 09:28:01'),
(6, 'Affiche page classement de David Zemix id: 194', '2022-01-04 09:28:27'),
(7, 'Affiche page des pronostics par David Zemix id: 194', '2022-01-04 09:28:28'),
(8, 'Affiche page des pronostics par David Zemix id: 194', '2022-01-04 09:29:11'),
(9, 'Affiche page des pronostics par David Zemix id: 194', '2022-01-04 09:29:11'),
(10, 'Affiche page des pronostics par David Zemix id: 194', '2022-01-04 09:29:24'),
(11, 'Affiche page des pronostics par David Zemix id: 194', '2022-01-04 09:29:25'),
(12, 'Affiche page mon profil de David Zemix id: 194', '2022-01-04 09:29:44'),
(13, 'Affiche page mon profil de David Zemix id: 194', '2022-01-04 09:29:54'),
(14, 'Affiche page mon profil de David Zemix id: 194', '2022-01-04 09:30:37'),
(15, 'Tentative de login Facebook pour Boris Mballa avec id=1399903680424997 et email ', '2022-01-04 18:30:19'),
(16, 'Affiche page mon profil de Boris Mballa id: 197', '2022-01-04 18:30:20'),
(17, 'Affiche page des pronostics par Boris Mballa id: 197', '2022-01-04 18:30:42'),
(18, 'Affiche page des pronostics par Boris Mballa id: 197', '2022-01-04 18:32:00'),
(19, 'Affiche page des pronostics par Boris Mballa id: 197', '2022-01-04 18:32:01'),
(20, 'Affiche page des pronostics par Boris Mballa id: 197', '2022-01-04 18:32:15'),
(21, 'Affiche page mon profil de Boris Mballa id: 197', '2022-01-04 18:32:18'),
(22, 'Affiche page des pronostics par Boris Mballa id: 197', '2022-01-04 18:32:29'),
(23, 'Affiche page mon profil de Boris Mballa id: 197', '2022-01-04 18:32:50'),
(24, 'Affiche page des pronostics par Boris Mballa id: 197', '2022-01-04 18:32:51'),
(25, 'Affiche page des pronostics par Boris Mballa id: 197', '2022-01-04 18:32:51'),
(26, 'Tentative de login Facebook pour HervÃ© Carafe avec id=1747097648813857 et email ', '2022-01-05 09:18:45'),
(27, 'Affiche page mon profil de HervÃ© Carafe id: 56', '2022-01-05 09:18:45'),
(28, 'Affiche page des pronostics par HervÃ© Carafe id: 56', '2022-01-05 09:18:59'),
(29, 'Affiche page des pronostics par HervÃ© Carafe id: 56', '2022-01-05 09:20:28'),
(30, 'Affiche page des pronostics par HervÃ© Carafe id: 56', '2022-01-05 09:20:29'),
(31, 'Affiche page mon profil de HervÃ© Carafe id: 56', '2022-01-05 09:20:52'),
(32, 'Affiche page classement de HervÃ© Carafe id: 56', '2022-01-05 09:21:06'),
(33, 'Affiche page des pronostics par HervÃ© Carafe id: 56', '2022-01-05 09:21:07'),
(34, 'Affiche page classement de HervÃ© Carafe id: 56', '2022-01-05 09:21:18'),
(35, 'Affiche page des pronostics par HervÃ© Carafe id: 56', '2022-01-05 09:21:19'),
(36, 'Affiche page des pronostics par HervÃ© Carafe id: 56', '2022-01-05 09:21:36'),
(37, 'Affiche page des pronostics par HervÃ© Carafe id: 56', '2022-01-05 09:21:36'),
(38, 'Tentative de login Facebook pour Marc Aurel Nkombo avec id=449890146754536 et email ', '2022-01-05 09:31:46'),
(39, 'Enregistrement de Marc Aurel Nkombo avec id enregistrement 499', '2022-01-05 09:31:46'),
(40, 'Affiche page mon profil de Marc Aurel Nkombo id: 499', '2022-01-05 09:31:48'),
(41, 'Affiche page des pronostics par Marc Aurel Nkombo id: 499', '2022-01-05 09:32:04'),
(42, 'Affiche page mon profil de Marc Aurel Nkombo id: 499', '2022-01-05 09:34:53'),
(43, 'Affiche page des pronostics par Marc Aurel Nkombo id: 499', '2022-01-05 09:35:19'),
(44, 'Affiche page des pronostics par Marc Aurel Nkombo id: 499', '2022-01-05 09:37:45'),
(45, 'Affiche page des pronostics par Marc Aurel Nkombo id: 499', '2022-01-05 09:38:30'),
(46, 'Tentative de login Facebook pour Blaise Paolo Ngomo avec id=5965558886868853 et email ngomoemile@yahoo.fr', '2022-01-05 14:12:15'),
(47, 'Enregistrement de Blaise Paolo Ngomo avec id enregistrement 500', '2022-01-05 14:12:15'),
(48, 'Tentative de login Facebook pour Blaise Paolo Ngomo avec id=5965558886868853 et email ngomoemile@yahoo.fr', '2022-01-05 14:12:15'),
(49, 'Affiche page mon profil de Blaise Paolo Ngomo id: 500', '2022-01-05 14:12:16'),
(50, 'Affiche page mon profil de Blaise Paolo Ngomo id: 500', '2022-01-05 14:12:16'),
(51, 'Affiche page des pronostics par Blaise Paolo Ngomo id: 500', '2022-01-05 14:13:01'),
(52, 'Affiche page des pronostics par Blaise Paolo Ngomo id: 500', '2022-01-05 14:13:01');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `user` varchar(32) NOT NULL,
  `pass` varchar(32) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `user`, `pass`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3');

-- --------------------------------------------------------

--
-- Structure de la table `utilisateurs`
--

CREATE TABLE `utilisateurs` (
  `id` int(11) NOT NULL,
  `oauth_uid` varchar(32) COLLATE utf8_unicode_ci DEFAULT NULL,
  `oauth_provider` enum('','facebook','google','twitter') COLLATE utf8_unicode_ci NOT NULL,
  `nom` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `picture_url` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `genre` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `date_naissance` date DEFAULT NULL,
  `numero` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `code` varchar(4) COLLATE utf8_unicode_ci DEFAULT NULL,
  `num_ok` enum('oui','non') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'non',
  `email` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL,
  `mode_prono` int(1) NOT NULL DEFAULT 0,
  `last_login` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `creation_date` datetime NOT NULL DEFAULT current_timestamp(),
  `last_ip` varchar(15) COLLATE utf8_unicode_ci DEFAULT NULL,
  `banned` char(1) COLLATE utf8_unicode_ci DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `utilisateurs`
--

INSERT INTO `utilisateurs` (`id`, `oauth_uid`, `oauth_provider`, `nom`, `picture_url`, `genre`, `date_naissance`, `numero`, `code`, `num_ok`, `email`, `mode_prono`, `last_login`, `creation_date`, `last_ip`, `banned`) VALUES
(1, '10159086850519961', 'facebook', 'Patient Assontia', 'https://graph.facebook.com/10159086850519961/picture?width=200&amp;height=200', NULL, NULL, NULL, NULL, 'non', 'assontia@gmail.com', 0, '2022-01-03 21:17:49', '2021-10-06 19:52:10', '154.72.150.177', '0'),
(2, '116835020832011422059', 'google', 'Bonny Keubou', 'https://lh3.googleusercontent.com/a/AATXAJyb1gFlkQAL8INXZRUjJZvSqiYpqiS8lMsZ0QSL=s96-c', NULL, NULL, NULL, NULL, 'non', 'peguy20@gmail.com', 0, '2021-10-07 15:09:26', '2021-10-07 07:08:45', '41.202.219.66', '0'),
(3, '115384090544105809332', 'google', 'Martial Dawe', 'https://lh3.googleusercontent.com/a-/AOh14GgY_UFJK1sBao4QjRgBwXFHG9BCeATnSgu-fWaO=s96-c', NULL, NULL, NULL, NULL, 'non', 'dawemartial1@gmail.com', 0, '2021-10-07 17:29:20', '2021-10-07 09:27:36', '41.244.240.215', '0'),
(4, '112262862834400466642', 'google', 'Steevens biyong', 'https://lh3.googleusercontent.com/a/AATXAJxKrb0nJolGmHm7g5DBDnxeCs5AcGNLzgdU4txd=s96-c', NULL, NULL, NULL, NULL, 'non', 'biyongsteevens@gmail.com', 0, '2021-11-16 06:09:40', '2021-10-07 09:48:06', '129.0.226.167', '0'),
(5, '280306290614530', 'facebook', 'Bonny Keubou', NULL, NULL, NULL, NULL, NULL, 'non', 'bkeubou@yahoo.fr', 0, '2021-11-18 01:00:19', '2021-10-07 18:04:03', '41.202.219.77', '0'),
(6, '4025862627518700', 'facebook', 'Charles Marcus Dawe', NULL, NULL, NULL, NULL, NULL, 'non', 'charlesdawe21@yahoo.fr', 0, '2021-11-16 07:47:05', '2021-10-07 18:27:55', '41.202.219.245', '0'),
(7, '115201054216127551314', 'google', 'Andre Wapa', 'https://lh3.googleusercontent.com/a/AATXAJwLm_q4Qqc3Vlf11dmId9Ynu8KRKr3iXJdblxoC=s96-c', NULL, NULL, NULL, NULL, 'non', 'wapaandre087@gmail.com', 0, '2021-10-07 18:51:02', '2021-10-07 10:43:30', '129.0.211.241', '0'),
(8, '1893860044129895', 'facebook', 'Boris La Gloire Mbougnia', NULL, NULL, NULL, NULL, NULL, 'non', 'borismbougnia93@gmail.com', 0, '2021-10-07 18:53:45', '2021-10-07 18:50:10', '41.202.219.64', '0'),
(9, '4418465514888433', 'facebook', 'Cedric Dzikou', NULL, NULL, NULL, NULL, NULL, 'non', 'cedricdzikougathe@yahoo.fr', 0, '2021-10-07 19:10:09', '2021-10-07 19:05:57', '41.202.219.70', '0'),
(10, '4581155795239300', 'facebook', 'Fabrice Nkolo', NULL, NULL, NULL, NULL, NULL, 'non', 'felixfabricen@yahoo.fr', 0, '2021-10-07 19:10:41', '2021-10-07 19:10:41', '129.0.76.141', '0'),
(12, '4576676035732750', 'facebook', 'Laluna Farnese Summer', NULL, NULL, NULL, NULL, NULL, 'non', 'astridefarnese@yahoo.fr', 0, '2021-11-16 17:49:16', '2021-10-07 20:18:46', '154.72.167.205', '0'),
(13, '1546374302362212', 'facebook', 'Martial Nguimatio', NULL, NULL, NULL, NULL, NULL, 'non', '', 0, '2021-11-16 03:05:05', '2021-10-07 20:43:08', '41.202.207.1', '0'),
(14, '4733405493361023', 'facebook', 'Williams Baba', NULL, NULL, NULL, NULL, NULL, 'non', 'dieudonne.baba@yahoo.fr', 0, '2021-10-14 07:57:19', '2021-10-07 20:53:05', '41.202.219.70', '0'),
(15, '2372537572880953', 'facebook', 'Ivan Aurelien Edimo', NULL, NULL, NULL, NULL, NULL, 'non', '', 0, '2021-11-15 09:27:54', '2021-10-07 21:11:34', '41.202.207.9', '0'),
(16, '1525519354460022', 'facebook', 'Christian Yani', NULL, NULL, NULL, NULL, NULL, 'non', 'christianyani89@yahoo.fr', 0, '2021-10-07 21:33:14', '2021-10-07 21:29:31', '41.202.207.142', '0'),
(17, '1284234628705177', 'facebook', 'Franky Tekeu', NULL, NULL, NULL, NULL, NULL, 'non', 'wambafranky1@gmail.com', 0, '2021-11-16 23:43:41', '2021-10-07 21:40:13', '154.72.150.254', '0'),
(18, '4622777744432565', 'facebook', 'Prisca Sorele', NULL, NULL, NULL, NULL, NULL, 'non', 'soreledjomo@yahoo.fr', 0, '2021-11-02 15:54:51', '2021-10-07 22:37:35', '129.0.76.201', '0'),
(19, '4766348303399410', 'facebook', 'Jimmy Nuebissi', NULL, NULL, NULL, NULL, NULL, 'non', 'nuebessi@yahoo.fr', 0, '2021-11-19 12:02:43', '2021-10-07 22:44:14', '129.0.99.189', '0'),
(20, '1284957841963700', 'facebook', 'ZÃ©bÃ© Saturus SystÃ©mique Newlife', NULL, NULL, NULL, NULL, NULL, 'non', 'valdotcheutsong@gmail.com', 0, '2021-11-30 17:48:14', '2021-10-08 00:06:07', '129.0.76.177', '0'),
(21, '284870746810207', 'facebook', 'Jonathan Tcheukap', NULL, NULL, NULL, NULL, NULL, 'non', '', 0, '2021-11-30 17:39:43', '2021-10-08 00:26:28', '129.0.76.177', '0'),
(22, '1511594839200982', 'facebook', 'RÅsvÄ“ll AÃ±gÄ“lÄ«tÅ', NULL, NULL, NULL, NULL, NULL, 'non', '', 0, '2021-11-15 22:22:14', '2021-10-08 00:47:28', '129.0.99.5', '0'),
(23, '105207960591708609346', 'google', 'Munguo Philip Chia', 'https://lh3.googleusercontent.com/a-/AOh14GitkHnMEBsN0eMEhcn31d_uyImxSIP78F-ZDMhN=s96-c', NULL, NULL, NULL, NULL, 'non', 'munguophilipchia@gmail.com', 0, '2021-10-08 04:27:40', '2021-10-07 20:25:37', '129.0.80.219', '0'),
(24, '1530823557266936', 'facebook', 'Brice Abega', NULL, NULL, NULL, NULL, NULL, 'non', 'sabcjeux@gmail.com', 0, '2021-11-15 09:01:00', '2021-10-08 05:45:02', '41.202.219.76', '0'),
(25, '3091331584476930', 'facebook', 'Emerson Misse Emerson', NULL, NULL, NULL, NULL, NULL, 'non', 'missekoucyrille@gmail.com', 0, '2021-11-15 14:27:47', '2021-10-08 06:06:57', '129.0.76.196', '0'),
(26, '2007282952761005', 'facebook', 'Patricia Tchombe', NULL, NULL, NULL, NULL, NULL, 'non', 'patriciatchombe@yahoo.fr', 0, '2021-12-06 16:36:49', '2021-10-08 06:19:38', '129.0.83.227', '0'),
(27, '6157594857614952', 'facebook', 'Aghamba Hadison', NULL, NULL, NULL, NULL, NULL, 'non', 'donhadison@yahoo.com', 0, '2021-10-14 08:01:15', '2021-10-08 06:35:35', '41.244.240.27', '0'),
(28, '4968497389845734', 'facebook', 'Remy Stephanie Fosso', NULL, NULL, NULL, NULL, NULL, 'non', 'sfosso2006@yahoo.fr', 0, '2021-11-02 06:54:50', '2021-10-08 07:58:57', '129.0.99.243', '0'),
(29, '4472638112804957', 'facebook', 'Ulrich Vallin Tchatchouang', NULL, NULL, NULL, NULL, NULL, 'non', 'ulrichvallintchatchouang@yahoo.fr', 0, '2021-11-18 08:52:58', '2021-10-08 08:18:56', '129.0.205.34', '0'),
(30, '3008381606075190', 'facebook', 'Josias Tido', NULL, NULL, NULL, NULL, NULL, 'non', 'josiasjiozang@yahoo.fr', 0, '2021-11-13 13:44:28', '2021-10-08 08:35:05', '129.0.76.112', '0'),
(31, '898408541081539', 'facebook', 'Ta PoupÃ©e Erika', NULL, NULL, NULL, NULL, NULL, 'non', 'calexnjapom5@gmail.com', 0, '2021-10-08 08:49:10', '2021-10-08 08:48:38', '41.202.219.76', '0'),
(32, '3011951969092149', 'facebook', 'SÃ´Ã±hÃ¢ Ã‚dÃ¢m Ã‹Ã±zÃ´', NULL, NULL, NULL, NULL, NULL, 'non', 'gildastsoata@gmail.com', 0, '2021-11-15 09:14:21', '2021-10-08 08:49:05', '129.0.99.131', '0'),
(33, '115799621505273356763', 'google', 'simon ngwang', 'https://lh3.googleusercontent.com/a/AATXAJzan8DnKoJ051VAFvOd7cxrS3vpwNUBJepjNyPA=s96-c', NULL, NULL, NULL, NULL, 'non', 'ngwangsimon145@gmail.com', 0, '2021-11-16 19:29:45', '2021-10-08 01:00:07', '129.0.76.171', '0'),
(34, '2947990238848140', 'facebook', 'Laure Tido', NULL, NULL, NULL, NULL, NULL, 'non', 'lauretido@yahoo.com', 0, '2021-10-15 07:28:18', '2021-10-08 09:00:15', '129.0.80.244', '0'),
(35, '116229746277431357025', 'google', 'Soutien aux lions Indomptables', 'https://lh3.googleusercontent.com/a/AATXAJwOL3YhLZCKmt-2IbtDa7FjVS2UJ85qeyfTqnqt=s96-c', NULL, NULL, NULL, NULL, 'non', 'soutienauxlionsindomptables@gmail.com', 0, '2021-12-02 06:59:32', '2021-10-08 01:07:22', '129.0.76.116', '0'),
(36, '577249970253805', 'facebook', 'Christian Edima', NULL, NULL, NULL, NULL, NULL, 'non', 'franckyongheu1@gmail.com', 0, '2021-10-11 09:53:03', '2021-10-08 09:13:07', '41.202.219.68', '0'),
(37, '564408158218346', 'facebook', 'Serge Boumal', NULL, NULL, NULL, NULL, NULL, 'non', 'franckyongheu3@gmail.com', 0, '2021-11-16 09:14:54', '2021-10-08 09:19:11', '129.0.99.172', '0'),
(38, '2923159127947756', 'facebook', 'Carole Labelle', NULL, NULL, NULL, NULL, NULL, 'non', '', 0, '2021-11-15 09:21:55', '2021-10-08 09:22:20', '41.202.219.72', '0'),
(39, '564657458193106', 'facebook', 'Boris Nana', NULL, NULL, NULL, NULL, NULL, 'non', 'franckyongheu2@gmail.com', 0, '2021-11-16 09:11:00', '2021-10-08 09:24:29', '129.0.99.172', '0'),
(40, '1817001895173761', 'facebook', 'Calex Yongheu', NULL, NULL, NULL, NULL, NULL, 'non', 'calexyongheu@yahoo.com', 0, '2021-11-24 10:38:38', '2021-10-08 09:28:07', '129.0.99.25', '0'),
(41, '2024547461046871', 'facebook', 'Duplex Piwo', NULL, NULL, NULL, NULL, NULL, 'non', 'duplexpiwo@gmail.com', 0, '2021-11-01 20:58:17', '2021-10-08 09:54:59', '41.202.219.65', '0'),
(42, '4868142339896892', 'facebook', 'Aime Bitjel', NULL, NULL, NULL, NULL, NULL, 'non', 'aimebitjel55@gmail.com', 0, '2021-11-01 19:46:59', '2021-10-08 11:00:58', '129.0.76.30', '0'),
(43, '105322749451454290745', 'google', 'Marel Ngongang', 'https://lh3.googleusercontent.com/a-/AOh14GjoOgMYl_6ZmwQlusCCvYolDGFM7AOyXrq-R6rveQ=s96-c', NULL, NULL, NULL, NULL, 'non', 'ngongangmarel@gmail.com', 0, '2021-10-09 10:04:45', '2021-10-08 03:39:52', '154.72.171.25', '0'),
(44, '1552601181781804', 'facebook', 'Brice Tabi', NULL, NULL, NULL, NULL, NULL, 'non', '', 0, '2021-10-08 13:27:56', '2021-10-08 13:25:29', '41.202.219.76', '0'),
(45, '102260127700176760771', 'google', 'cingue vanold', 'https://lh3.googleusercontent.com/a/AATXAJzYIl3BfvjZA-h2VYK2jjesXh1LvzM7kfibcMpf=s96-c', NULL, NULL, NULL, NULL, 'non', 'vanoldcingue9526@gmail.com', 0, '2021-11-22 17:08:47', '2021-10-08 07:14:50', '102.244.178.91', '0'),
(46, '2913109689018687', 'facebook', 'Achille Yitmi', NULL, NULL, NULL, NULL, NULL, 'non', 'achilleyitmi@gmail.com', 0, '2021-11-30 13:34:35', '2021-10-08 15:41:14', '129.0.99.204', '0'),
(47, '3922689387833097', 'facebook', 'Brice Fokoua', NULL, NULL, NULL, NULL, NULL, 'non', 'pfdjembou@yahoo.fr', 0, '2021-10-13 21:17:58', '2021-10-08 15:44:42', '129.0.76.52', '0'),
(48, '2881410105506678', 'facebook', 'Euro Knb', NULL, NULL, NULL, NULL, NULL, 'non', 'bonifacekamtha@gmail.com', 0, '2021-11-30 12:09:27', '2021-10-08 16:40:19', '41.202.219.246', '0'),
(49, '1821202048067679', 'facebook', 'Hernandez Biyong Andres Steevens', NULL, NULL, NULL, NULL, NULL, 'non', '', 0, '2021-11-02 17:27:47', '2021-10-08 19:01:24', '41.202.207.3', '0'),
(50, '1854295361628667', 'facebook', 'Marios Nyapa', NULL, NULL, NULL, NULL, NULL, 'non', '', 0, '2021-11-20 16:03:35', '2021-10-08 22:45:42', '129.0.99.178', '0'),
(51, '1980244525480165', 'facebook', 'Cryhs Eitel', NULL, NULL, NULL, NULL, NULL, 'non', 'eitelmbango@yahoo.fr', 0, '2021-11-15 20:05:52', '2021-10-10 21:35:10', '129.0.76.102', '0'),
(52, '1542609806093342', 'facebook', 'Apollo Mba Amaya', NULL, NULL, NULL, NULL, NULL, 'non', 'christianapollo@yahoo.fr', 0, '2021-11-17 17:12:18', '2021-10-11 11:10:58', '41.202.219.70', '0'),
(53, '111113241137259600049', 'google', 'astride nekoben', 'https://lh3.googleusercontent.com/a-/AOh14Ghm2_gIYWRnBCY9YlDtondazjLWkqdr_jG_RkNRcA=s96-c', NULL, NULL, NULL, NULL, 'non', 'astridefarnese@gmail.com', 0, '2021-10-11 11:50:49', '2021-10-11 03:49:02', '45.91.20.84', '0'),
(54, '2942821789364801', 'facebook', 'Liliane Dekou', NULL, NULL, NULL, NULL, NULL, 'non', '', 0, '2021-11-19 12:53:57', '2021-10-11 12:19:30', '129.0.76.162', '0'),
(55, '100353612336009482639', 'google', 'Meh Ransom', 'https://lh3.googleusercontent.com/a/AATXAJwukP43j82cKXV7nnlP-bzFQ3H2lLF3n01o5xBm=s96-c', NULL, NULL, NULL, NULL, 'non', 'mehransom993@gmail.com', 0, '2021-10-11 12:25:05', '2021-10-11 04:21:11', '129.0.213.192', '0'),
(56, '1747097648813857', 'facebook', 'HervÃ© Carafe', NULL, NULL, NULL, NULL, NULL, 'non', '', 0, '2022-01-05 09:21:36', '2021-10-11 12:24:30', '129.0.125.249', '0'),
(57, '1647653625441148', 'facebook', 'Djeff Dadji Leteta', NULL, NULL, NULL, NULL, NULL, 'non', '', 0, '2021-11-03 13:12:05', '2021-10-11 12:32:29', '41.202.207.162', '0'),
(58, '395172742171749', 'facebook', 'Zainab Zainiya', NULL, NULL, NULL, NULL, NULL, 'non', 'zainabzainiya@gmail.com', 0, '2021-10-11 12:35:39', '2021-10-11 12:34:49', '129.0.211.245', '0'),
(59, '', 'facebook', '', NULL, NULL, NULL, NULL, NULL, 'non', '', 0, '2021-11-19 10:07:30', '2021-10-11 12:39:34', '41.202.207.4', '0'),
(60, '108927168794820818116', 'google', 'Roche Mbebi', 'https://lh3.googleusercontent.com/a-/AOh14GjDY9fdNZ0zMKKIDsgBlHKOkAsOHuXkNsLwqgsd=s96-c', NULL, NULL, NULL, NULL, 'non', 'mbebiroche98@gmail.com', 0, '2021-10-11 12:45:45', '2021-10-11 04:44:25', '129.0.99.246', '0'),
(61, '117208326689106542834', 'google', 'Rodson Libela', 'https://lh3.googleusercontent.com/a-/AOh14Gjl8kFM9KPvqTApoUsGspbIhyOGW_VexPAptwtf=s96-c', NULL, NULL, NULL, NULL, 'non', 'libela.rodson2005@gmail.com', 0, '2021-10-11 15:16:18', '2021-10-11 04:50:52', '41.202.207.2', '0'),
(62, '3041932476077660', 'facebook', 'Innocent Metsogako', NULL, NULL, NULL, NULL, NULL, 'non', 'innocentndefre@yahoo.fr', 0, '2021-10-11 13:03:56', '2021-10-11 12:58:10', '129.0.76.40', '0'),
(63, '1962571110564611', 'facebook', 'Christiane Wantong', NULL, NULL, NULL, NULL, NULL, 'non', 'christianetchoutouo@yahoo.fr', 0, '2021-10-11 13:08:36', '2021-10-11 13:03:20', '129.0.80.251', '0'),
(64, '2074325746065200', 'facebook', 'Zouki Njet', NULL, NULL, NULL, NULL, NULL, 'non', '', 0, '2021-10-11 13:21:25', '2021-10-11 13:13:19', '41.202.219.245', '0'),
(65, '104538423200856320942', 'google', 'brice albert', 'https://lh3.googleusercontent.com/a/AATXAJzzWqwIRtbCXyxJZqKKt7NvH8XgFKbhIJJrVTyf=s96-c', NULL, NULL, NULL, NULL, 'non', 'albertbrice96@gmail.com', 0, '2021-10-11 13:24:57', '2021-10-11 05:24:06', '41.202.207.10', '0'),
(66, '862222527989980', 'facebook', 'Mohamed Awelou', NULL, NULL, NULL, NULL, NULL, 'non', 'mouafonkoko@gmail.com', 0, '2021-10-11 13:33:19', '2021-10-11 13:31:29', '154.72.171.252', '0'),
(67, '413291240416035', 'facebook', 'Andy Blaise', NULL, NULL, NULL, NULL, NULL, 'non', '', 0, '2021-11-15 16:43:49', '2021-10-11 13:36:18', '129.0.205.10', '0'),
(68, '4322829804467896', 'facebook', 'SÃ©vÃ©rine SigniÃ©', NULL, NULL, NULL, NULL, NULL, 'non', 'signieseverine@yahoo.fr', 0, '2021-11-12 11:46:02', '2021-10-11 13:48:32', '154.72.171.182', '0'),
(69, '2853540531625369', 'facebook', 'Nguemale Peter Maxime Toko', NULL, NULL, NULL, NULL, NULL, 'non', '', 0, '2021-11-16 19:41:38', '2021-10-11 13:56:53', '129.0.76.146', '0'),
(70, '232603278858938', 'facebook', 'Lolit Less', NULL, NULL, NULL, NULL, NULL, 'non', '', 0, '2021-10-11 14:44:03', '2021-10-11 14:41:16', '129.0.76.160', '0'),
(71, '361012679142792', 'facebook', 'Muya Blaise', NULL, NULL, NULL, NULL, NULL, 'non', '', 0, '2021-10-11 09:21:04', '2021-10-11 17:21:04', NULL, '0'),
(72, '105439025255475', 'facebook', 'Louis Mbopda', NULL, NULL, NULL, NULL, NULL, 'non', '', 0, '2021-11-15 10:58:36', '2021-10-13 14:21:03', '41.202.219.67', '0'),
(73, '108076103595866671370', 'google', 'tngm tngm', 'https://lh3.googleusercontent.com/a-/AOh14GhE7oJNIhxQXeSdyTqs97zLuH7iVfiZsUJdUYRtnw=s96-c', NULL, NULL, NULL, NULL, 'non', 'tatsinzoundoguymarcel@gmail.com', 0, '2021-11-02 00:23:00', '2021-10-13 06:24:37', '129.0.226.152', '0'),
(74, '6183364945067626', 'facebook', 'Rene Belinga Ndongo', NULL, NULL, NULL, NULL, NULL, 'non', 'bndongo44@yahoo.fr', 0, '2021-10-13 14:31:13', '2021-10-13 14:29:46', '41.202.219.76', '0'),
(75, '4490229497690003', 'facebook', 'Olivier Tietsap', NULL, NULL, NULL, NULL, NULL, 'non', 'tietsapolivier@gmail.com', 0, '2021-11-12 18:49:45', '2021-10-13 15:12:57', '154.72.168.25', '0'),
(76, '2090725181078154', 'facebook', 'Etienne Martial Tonye-tho', NULL, NULL, NULL, NULL, NULL, 'non', 'etiennemartialtonyetho@yahoo.fr', 0, '2021-11-02 11:09:51', '2021-10-13 19:26:59', '129.0.125.52', '0'),
(77, '3022446604689168', 'facebook', 'Boris Bbg', NULL, NULL, NULL, NULL, NULL, 'non', '', 0, '2021-11-16 12:54:44', '2021-10-13 19:28:37', '129.0.226.207', '0'),
(78, '100323730122326325109', 'google', 'Boris gabin Boumtje', 'https://lh3.googleusercontent.com/a/AATXAJxekiWKo4_KpfyBSN9O_UKg5dhQa74pNIwbY4Bj=s96-c', NULL, NULL, NULL, NULL, 'non', 'boumtjeborisgabin237@gmail.com', 0, '2021-10-13 19:30:50', '2021-10-13 11:30:17', '129.0.205.110', '0'),
(79, '2965027153759778', 'facebook', 'Scott Tane', NULL, NULL, NULL, NULL, NULL, 'non', '', 0, '2021-11-24 16:47:44', '2021-10-13 23:25:39', '129.0.99.216', '0'),
(80, '2228805630620311', 'facebook', 'Albert Milan Zintchem', NULL, NULL, NULL, NULL, NULL, 'non', '', 0, '2021-10-14 01:15:05', '2021-10-14 01:11:01', '154.72.162.123', '0'),
(81, '3005294496411237', 'facebook', 'Consty Fouda', NULL, NULL, NULL, NULL, NULL, 'non', 'csergefouda@gmail.com', 0, '2021-11-20 15:31:33', '2021-10-15 02:02:37', '41.202.207.12', '0'),
(82, '1472806196429726', 'facebook', 'Kenne Bienvenu', NULL, NULL, NULL, NULL, NULL, 'non', '', 0, '2021-11-16 23:38:40', '2021-10-17 01:01:06', '129.0.76.141', '0'),
(83, '4616018718449406', 'facebook', 'Michael Botoum Ngansop', NULL, NULL, NULL, NULL, NULL, 'non', 'bngansop@yahoo.fr', 0, '2021-11-24 17:10:56', '2021-10-21 12:31:52', '41.202.219.70', '0'),
(84, '627432791999381', 'facebook', 'Georginio Joel Nzeffo New', NULL, NULL, NULL, NULL, NULL, 'non', 'nzeffogeorges@gmail.com', 0, '2021-11-13 10:16:00', '2021-11-01 19:44:22', '129.0.99.218', '0'),
(85, '2122157644606623', 'facebook', 'Delphino Cent Douze', NULL, NULL, NULL, NULL, NULL, 'non', '', 0, '2021-11-01 19:45:28', '2021-11-01 19:44:26', '129.0.226.182', '0'),
(86, '4428184160593513', 'facebook', 'Joe Katanga', NULL, NULL, NULL, NULL, NULL, 'non', 'joekatanga2010@yahoo.fr', 0, '2021-11-02 09:57:28', '2021-11-01 19:46:12', '41.202.219.67', '0'),
(87, '4572804719423073', 'facebook', 'Yannick Saounde II', NULL, NULL, NULL, NULL, NULL, 'non', 'ysaounde2@yahoo.fr', 0, '2021-11-01 19:55:24', '2021-11-01 19:53:49', '41.202.219.66', '0'),
(88, '4244434468994571', 'facebook', 'Foumakoundi Koumbia Jose', NULL, NULL, NULL, NULL, NULL, 'non', 'akimmistik1@yahoo.fr', 0, '2021-11-16 19:01:57', '2021-11-01 19:53:54', '41.202.219.68', '0'),
(89, '109326356467671922855', 'google', 'Jacques Rim', 'https://lh3.googleusercontent.com/a-/AOh14Gh5OOKLK__vzwxsV6i3ioJUhJZ7QVY7wJCu6W5Dzg=s96-c', NULL, NULL, NULL, NULL, 'non', 'jacksrim@gmail.com', 0, '2021-11-01 19:57:16', '2021-11-01 11:57:15', '92.38.152.223', '0'),
(90, '906946573539318', 'facebook', 'Ingrid Ndp', NULL, NULL, NULL, NULL, NULL, 'non', 'nguiademingrid389@gmail.com', 0, '2021-11-17 00:33:23', '2021-11-01 19:58:22', '41.202.207.8', '0'),
(91, '117917985199044052756', 'google', 'WULTOF LAND', 'https://lh3.googleusercontent.com/a-/AOh14GiHSUqBNg2dAe5XLIJs_IUl82YKkXBZE6XCKmlI=s96-c', NULL, NULL, NULL, NULL, 'non', 'jikijemman11@gmail.com', 0, '2021-11-01 20:07:42', '2021-11-01 12:07:41', '41.202.219.242', '0'),
(92, '103490870400464829828', 'google', 'Andy Noubissie', 'https://lh3.googleusercontent.com/a/AATXAJwxb5SepMKae3DF86LKDNlUVc6L6LyKr1R8JBff=s96-c', NULL, NULL, NULL, NULL, 'non', 'andynoubissie@gmail.com', 0, '2021-11-01 20:15:16', '2021-11-01 12:08:59', '129.0.76.170', '0'),
(93, '1194905897686821', 'facebook', 'Chris Kinsley', NULL, NULL, NULL, NULL, NULL, 'non', '', 0, '2021-11-01 20:11:23', '2021-11-01 20:09:07', '102.244.73.16', '0'),
(94, '1911212792390460', 'facebook', 'Leon Haman Sanda', NULL, NULL, NULL, NULL, NULL, 'non', '', 0, '2021-11-02 18:42:58', '2021-11-01 20:09:15', '41.202.207.141', '0'),
(95, '956425511623728', 'facebook', 'MichÃ¨le Mich', NULL, NULL, NULL, NULL, NULL, 'non', '', 0, '2021-11-01 20:19:06', '2021-11-01 20:17:45', '154.72.150.197', '0'),
(96, '1524736117861931', 'facebook', 'Bell Anie', NULL, NULL, NULL, NULL, NULL, 'non', '', 0, '2021-11-01 20:24:13', '2021-11-01 20:17:47', '41.202.207.136', '0'),
(97, '1736679733387902', 'facebook', 'Andy Brayan Noubissie', NULL, NULL, NULL, NULL, NULL, 'non', '', 0, '2021-11-02 18:45:12', '2021-11-01 20:18:49', '129.0.76.9', '0'),
(98, '1343985386037152', 'facebook', 'DwÄÃ¿nÄ™ Ambassa Ier', NULL, NULL, NULL, NULL, NULL, 'non', 'dwayneambassa0@gmail.com', 0, '2021-11-16 09:34:57', '2021-11-01 20:29:05', '41.202.207.8', '0'),
(99, '1505105359853838', 'facebook', 'Jordan Mbety', NULL, NULL, NULL, NULL, NULL, 'non', '', 0, '2021-11-01 20:41:49', '2021-11-01 20:40:34', '41.202.219.64', '0'),
(100, '107003068778311905599', 'google', 'Serge Sida', 'https://lh3.googleusercontent.com/a-/AOh14GiIhM8lX07fMPib0uHCvU_cQa502T5Vw17nAzGH=s96-c', NULL, NULL, NULL, NULL, 'non', 'sidaserge83@gmail.com', 0, '2021-11-01 20:43:36', '2021-11-01 12:43:36', '41.202.207.12', '0'),
(101, '3123903424599136', 'facebook', 'Malcolm Bedime', NULL, NULL, NULL, NULL, NULL, 'non', '', 0, '2021-11-01 20:56:23', '2021-11-01 20:54:06', '41.202.207.6', '0'),
(102, '1185712818586530', 'facebook', 'Emmanuel Zaza', NULL, NULL, NULL, NULL, NULL, 'non', '', 0, '2021-11-01 20:58:02', '2021-11-01 20:55:55', '41.202.219.66', '0'),
(103, '1385838935151186', 'facebook', 'Lucie Halal Madouce', NULL, NULL, NULL, NULL, NULL, 'non', '', 0, '2021-11-01 21:01:59', '2021-11-01 21:00:46', '102.244.73.202', '0'),
(104, '271710264885118', 'facebook', 'Fletcher Franz', NULL, NULL, NULL, NULL, NULL, 'non', '', 0, '2021-11-01 21:01:53', '2021-11-01 21:01:52', '41.202.219.65', '0'),
(105, '2921692034746797', 'facebook', 'Elat Ledoux', NULL, NULL, NULL, NULL, NULL, 'non', 'ekwelle2@yahoo.fr', 0, '2021-12-02 20:24:34', '2021-11-01 21:03:51', '41.202.219.75', '0'),
(106, '4662361433852778', 'facebook', 'Nana Willy Vladimir', NULL, NULL, NULL, NULL, NULL, 'non', 'nwivlad94@gmail.com', 0, '2021-11-01 21:12:12', '2021-11-01 21:11:29', '41.202.219.249', '0'),
(107, '4490511791052792', 'facebook', 'Aubin Michel', NULL, NULL, NULL, NULL, NULL, 'non', 'cruzheffo@yahoo.fr', 0, '2021-11-01 21:18:52', '2021-11-01 21:17:22', '41.202.207.1', '0'),
(108, '115223617879442167988', 'google', 'boris bamis', 'https://lh3.googleusercontent.com/a/AATXAJybe8QAwMu0OhYOS_678JYkpkKnc8rss9Edrc5U=s96-c', NULL, NULL, NULL, NULL, 'non', 'bamisboris@gmail.com', 0, '2021-11-01 21:18:46', '2021-11-01 13:18:45', '5.188.226.170', '0'),
(109, '4479161558835766', 'facebook', 'Dimitri Le Russe', NULL, NULL, NULL, NULL, NULL, 'non', 'btdimitri@yahoo.fr', 0, '2021-11-16 15:20:59', '2021-11-01 21:23:21', '41.202.219.74', '0'),
(110, '2076660319175694', 'facebook', 'Roger Bamal', NULL, NULL, NULL, NULL, NULL, 'non', 'rogerbamal01@gmail.com', 0, '2021-11-01 21:29:37', '2021-11-01 21:28:44', '41.202.219.74', '0'),
(111, '1481913505526305', 'facebook', 'Marcellinsylvestre Mba', NULL, NULL, NULL, NULL, NULL, 'non', '', 0, '2021-11-01 21:44:38', '2021-11-01 21:44:38', '41.202.219.64', '0'),
(112, '610112913469512', 'facebook', 'Brice Minlo', NULL, NULL, NULL, NULL, NULL, 'non', '', 0, '2021-11-02 16:12:00', '2021-11-01 21:59:42', '41.202.207.12', '0'),
(113, '983951359002084', 'facebook', 'Pharel Alex Elat', NULL, NULL, NULL, NULL, NULL, 'non', '', 0, '2021-11-15 21:11:11', '2021-11-01 22:02:23', '154.72.169.143', '0'),
(114, '429610461914620', 'facebook', 'LÃ©onel Calvert LÃ©win', NULL, NULL, NULL, NULL, NULL, 'non', '', 0, '2021-11-01 22:09:11', '2021-11-01 22:04:56', '129.0.76.40', '0'),
(115, '3089862491337533', 'facebook', 'Laila Ovoundi', NULL, NULL, NULL, NULL, NULL, 'non', 'ovoundilaila@gmail.com', 0, '2021-11-01 22:34:29', '2021-11-01 22:31:31', '129.0.205.37', '0'),
(116, '3095726900749624', 'facebook', 'Maurice Onana', NULL, NULL, NULL, NULL, NULL, 'non', 'agscm14@gmail.com', 0, '2021-11-01 22:40:02', '2021-11-01 22:39:38', '129.0.125.119', '0'),
(117, '114086170956157682038', 'google', 'Nwati Enoh', 'https://lh3.googleusercontent.com/a-/AOh14Gg1TfTbcxgQP_z5dDDMkg9dnfHyUwX2YDJ5G0xFug=s96-c', NULL, NULL, NULL, NULL, 'non', 'frizzyenoh@gmail.com', 0, '2021-11-01 23:00:19', '2021-11-01 14:59:39', '196.202.236.195', '0'),
(118, '602516814529763', 'facebook', 'Morgan Ekarangamba', NULL, NULL, NULL, NULL, NULL, 'non', '', 0, '2021-11-15 12:42:15', '2021-11-01 23:17:12', '129.0.226.202', '0'),
(119, '5241548969206071', 'facebook', 'Bidjo Emmanuel Cedric', NULL, NULL, NULL, NULL, NULL, 'non', 'bidjo101@live.fr', 0, '2021-11-02 01:52:17', '2021-11-02 01:50:15', '41.202.219.73', '0'),
(120, '416171216734686', 'facebook', 'Cindy Ornelle', NULL, NULL, NULL, NULL, NULL, 'non', 'eligeeck@gmail.com', 0, '2021-11-02 04:17:46', '2021-11-02 04:17:08', '41.202.207.10', '0'),
(121, '110373281133793883496', 'google', 'Alain Cheko', 'https://lh3.googleusercontent.com/a/AATXAJwHWJicSEHA15e_8pqP7BIlCmpyG_yvNpDKadlb=s96-c', NULL, NULL, NULL, NULL, 'non', 'alainchekokayaben95@gmail.com', 0, '2021-11-02 05:49:33', '2021-11-01 21:46:33', '129.0.226.252', '0'),
(122, '118371240522637917295', 'google', 'Jean Passang', 'https://lh3.googleusercontent.com/a-/AOh14GjUng9nDMjreqfAZ6wBHMDB_RisjvDsUbchFpBXSg=s96-c', NULL, NULL, NULL, NULL, 'non', 'passangjean@gmail.com', 0, '2021-11-02 05:49:58', '2021-11-01 21:48:08', '41.202.207.2', '0'),
(123, '4619262598094794', 'facebook', 'Patrick Gouverneur Atanga', NULL, NULL, NULL, NULL, NULL, 'non', 'atanpas@yahoo.fr', 0, '2021-11-17 16:23:56', '2021-11-02 06:05:57', '41.202.207.132', '0'),
(124, '1998220787019929', 'facebook', 'Fabrice Angelo', NULL, NULL, NULL, NULL, NULL, 'non', 'fabriceangelo23@gmail.com', 0, '2021-11-02 06:24:30', '2021-11-02 06:24:01', '102.244.178.77', '0'),
(125, '1084755005629129', 'facebook', 'Caroline Etouga', NULL, NULL, NULL, NULL, NULL, 'non', '', 0, '2021-11-02 06:25:16', '2021-11-02 06:25:16', '102.244.178.77', '0'),
(126, '1223553554799104', 'facebook', 'Ankel Elemba', NULL, NULL, NULL, NULL, NULL, 'non', 'ankelankel14@gmail.com', 0, '2021-11-15 09:21:03', '2021-11-02 06:28:15', '41.202.207.7', '0'),
(127, '924227931555452', 'facebook', 'Avom Marie Vanelle', NULL, NULL, NULL, NULL, NULL, 'non', '', 0, '2021-11-02 06:28:55', '2021-11-02 06:28:54', '102.244.178.77', '0'),
(128, '257211253126463', 'facebook', 'Phar Nelle', NULL, NULL, NULL, NULL, NULL, 'non', '', 0, '2021-11-02 06:29:49', '2021-11-02 06:29:49', '102.244.178.77', '0'),
(129, '336411671582967', 'facebook', 'Richard Elemba', NULL, NULL, NULL, NULL, NULL, 'non', '', 0, '2021-11-16 21:12:28', '2021-11-02 06:30:33', '41.202.207.152', '0'),
(130, '250386183778736', 'facebook', 'TÃ¢ Pillule SuÃ§Å•ee', NULL, NULL, NULL, NULL, NULL, 'non', '', 0, '2021-11-02 06:31:18', '2021-11-02 06:31:18', '102.244.178.77', '0'),
(131, '1001607833718047', 'facebook', 'Audrey Maeva', NULL, NULL, NULL, NULL, NULL, 'non', '', 0, '2021-11-02 06:38:36', '2021-11-02 06:37:17', '41.202.219.68', '0'),
(132, '4768135986552223', 'facebook', 'Daniel Mbehou', NULL, NULL, NULL, NULL, NULL, 'non', '', 0, '2021-11-16 21:17:32', '2021-11-02 06:46:57', '129.0.76.17', '0'),
(133, '624393232026551', 'facebook', 'Osvalde Djuidje', NULL, NULL, NULL, NULL, NULL, 'non', '', 0, '2021-11-16 21:22:25', '2021-11-02 07:06:17', '129.0.210.248', '0'),
(134, '4372983916131961', 'facebook', 'Ulrich Tnu', NULL, NULL, NULL, NULL, NULL, 'non', 'tchatchouangu@yahoo.fr', 0, '2021-11-15 10:04:41', '2021-11-02 08:10:56', '129.0.205.108', '0'),
(135, '4488126157946385', 'facebook', 'Jean Marie Allafi Lago', NULL, NULL, NULL, NULL, NULL, 'non', 'jm.lagoallafi@yahoo.fr', 0, '2021-11-30 11:51:10', '2021-11-02 08:54:09', '154.72.150.164', '0'),
(136, '147135604305390', 'facebook', 'Akeva Scof', NULL, NULL, NULL, NULL, NULL, 'non', '', 0, '2021-11-16 22:41:46', '2021-11-02 09:56:56', '41.202.207.5', '0'),
(137, '1526924714329472', 'facebook', 'Aboubakar Jacques', NULL, NULL, NULL, NULL, NULL, 'non', '', 0, '2021-11-02 10:05:51', '2021-11-02 10:05:30', '41.202.207.133', '0'),
(138, '1904772849708290', 'facebook', 'Enone Manga Giresse', NULL, NULL, NULL, NULL, NULL, 'non', 'manganice@yahoo.com', 0, '2021-11-16 11:13:31', '2021-11-02 11:18:50', '129.0.211.251', '0'),
(139, '1324787934623314', 'facebook', 'Karysma Le Bantu', NULL, NULL, NULL, NULL, NULL, 'non', 'landry2ngosso@gmail.com', 0, '2021-11-23 15:20:46', '2021-11-02 12:56:23', '129.0.125.71', '0'),
(140, '111720530140074698147', 'google', 'Jean Bernard Piankeu', 'https://lh3.googleusercontent.com/a-/AOh14GgEvlRp-dbAWH_HiW8s_Zg2FTwbzxYSgS066vTvnA=s96-c', NULL, NULL, NULL, NULL, 'non', 'jbpiankeu@gmail.com', 0, '2021-11-02 13:23:13', '2021-11-02 05:21:13', '129.0.125.37', '0'),
(141, '1530125753998483', 'facebook', 'Djanabou Hamidou', NULL, NULL, NULL, NULL, NULL, 'non', 'djanabou.hamidou@gmail.com', 0, '2021-11-02 14:07:42', '2021-11-02 14:07:21', '129.0.211.217', '0'),
(142, '4600545136699009', 'facebook', 'LÃ« CÅ·clÃ´ne', NULL, NULL, NULL, NULL, NULL, 'non', 'paulintsala@yahoo.fr', 0, '2021-11-02 15:48:28', '2021-11-02 15:45:37', '41.202.207.4', '0'),
(143, '6327337077341658', 'facebook', 'Takam Fabrice', NULL, NULL, NULL, NULL, NULL, 'non', 'fabricetakam@ymail.com', 0, '2021-11-02 15:46:51', '2021-11-02 15:46:03', '129.0.76.234', '0'),
(144, '117544381019857455106', 'google', 'Eve Nanous', 'https://lh3.googleusercontent.com/a-/AOh14GirJuN5oXG25xudy40gCDEPXb1ATsNFCx8VTroZ-g=s96-c', NULL, NULL, NULL, NULL, 'non', 'evenana94@gmail.com', 0, '2021-11-19 13:22:06', '2021-11-02 07:48:32', '41.202.219.77', '0'),
(145, '4359387857512671', 'facebook', 'Willyam Valdez', NULL, NULL, NULL, NULL, NULL, 'non', '', 0, '2021-11-02 15:59:55', '2021-11-02 15:57:23', '129.0.99.249', '0'),
(146, '1770630009790877', 'facebook', 'Ngambo Stany', NULL, NULL, NULL, NULL, NULL, 'non', '', 0, '2021-11-02 15:58:19', '2021-11-02 15:57:29', '129.0.99.238', '0'),
(147, '2205086246298891', 'facebook', 'Rodriguez Mbopda Kemdeng', NULL, NULL, NULL, NULL, NULL, 'non', '', 0, '2021-11-02 16:03:47', '2021-11-02 16:00:45', '41.202.219.66', '0'),
(148, '4244429415686145', 'facebook', 'Sahtcha Paulin Yatchet', NULL, NULL, NULL, NULL, NULL, 'non', 'sahtchapaulin@yahoo.fr', 0, '2021-11-02 16:03:38', '2021-11-02 16:00:50', '129.0.76.137', '0'),
(149, '4538851822862066', 'facebook', 'Appolinaire Mvogo Belibi', NULL, NULL, NULL, NULL, NULL, 'non', 'belibi232@gmail.com', 0, '2021-11-02 16:07:25', '2021-11-02 16:05:43', '41.202.207.2', '0'),
(150, '117841506724388380971', 'google', 'Nathan Scott', 'https://lh3.googleusercontent.com/a/AATXAJzY4X2dYg70nSzxPHSLNw5KUB0jVDp3jEdwhjp-=s96-c', NULL, NULL, NULL, NULL, 'non', 'scottn205@gmail.com', 0, '2021-11-02 16:09:11', '2021-11-02 08:07:58', '41.202.219.74', '0'),
(151, '2979326692320689', 'facebook', 'Frank Balti', NULL, NULL, NULL, NULL, NULL, 'non', 'frankandresson@yahoo.fr', 0, '2021-11-16 10:59:29', '2021-11-02 16:18:31', '41.202.207.132', '0'),
(152, '1727876010734586', 'facebook', 'Sylvain Djakaye', NULL, NULL, NULL, NULL, NULL, 'non', '', 0, '2021-11-02 16:27:15', '2021-11-02 16:24:49', '129.0.205.183', '0'),
(153, '2046642042168769', 'facebook', 'Loic Delano Louokdom', NULL, NULL, NULL, NULL, NULL, 'non', 'yvesdupont@yahoo.fr', 0, '2021-11-13 13:19:24', '2021-11-02 16:43:18', '129.0.76.121', '0'),
(154, '107058652420782446251', 'google', 'Yaya Fuego Dinero', 'https://lh3.googleusercontent.com/a-/AOh14Gj0eUfK-7bL3kPcAy5-hWWwy9Ra4Y62d71hJiFF9w=s96-c', NULL, NULL, NULL, NULL, 'non', 'yayayacouba77@gmail.com', 0, '2021-11-02 16:44:05', '2021-11-02 08:43:40', '102.244.74.174', '0'),
(155, '111022584414770254582', 'google', 'pierre fondjo', 'https://lh3.googleusercontent.com/a/AATXAJzEj69pmM7fPYgM7kfsvyfEsq65b0Kp1sd-AUpF=s96-c', NULL, NULL, NULL, NULL, 'non', 'pierrefondjo2019@gmail.com', 0, '2021-11-02 16:52:40', '2021-11-02 08:50:35', '129.0.76.92', '0'),
(156, '4513514498729441', 'facebook', 'Ledoux Elongbil', NULL, NULL, NULL, NULL, NULL, 'non', 'filsledouxelongbilngoma@yahoo.fr', 0, '2021-12-02 09:05:59', '2021-11-02 17:04:27', '154.72.150.197', '0'),
(157, '105050277061709013100', 'google', 'DAYAN MAEL KABAM', 'https://lh3.googleusercontent.com/a/AATXAJwflSIaV_L093jf7t7tt4IjJN2JWASiT0V9ISJ8=s96-c', NULL, NULL, NULL, NULL, 'non', 'kabamdayan@gmail.com', 0, '2021-11-02 17:23:20', '2021-11-02 09:22:55', '41.202.207.157', '0'),
(158, '3126408921017667', 'facebook', 'Medarh Melong', NULL, NULL, NULL, NULL, NULL, 'non', '', 0, '2021-11-15 11:19:59', '2021-11-02 19:29:20', '129.0.226.28', '0'),
(159, '3020776258205412', 'facebook', 'Simon Bada', NULL, NULL, NULL, NULL, NULL, 'non', 'badasimon60@gmail.com', 0, '2021-11-02 19:42:49', '2021-11-02 19:41:10', '41.202.207.129', '0'),
(160, '2383071415160265', 'facebook', 'Tekam Signie', NULL, NULL, NULL, NULL, NULL, 'non', '', 0, '2021-11-02 19:50:51', '2021-11-02 19:50:14', '41.202.219.74', '0'),
(161, '2624248281051839', 'facebook', 'Junior Armand Simeu', NULL, NULL, NULL, NULL, NULL, 'non', '', 0, '2021-11-02 21:33:53', '2021-11-02 21:28:43', '129.0.80.215', '0'),
(162, '1283325712080951', 'facebook', 'Brandon Mix Premier', NULL, NULL, NULL, NULL, NULL, 'non', '', 0, '2021-11-16 22:14:56', '2021-11-02 21:33:10', '129.0.99.26', '0'),
(163, '1627486997643313', 'facebook', 'MÃ¶nsiÃ«ur Christian', NULL, NULL, NULL, NULL, NULL, 'non', '', 0, '2021-11-02 21:49:22', '2021-11-02 21:43:58', '41.202.207.1', '0'),
(164, '1986919078150021', 'facebook', 'Nguimbock MalankÃµv', NULL, NULL, NULL, NULL, NULL, 'non', '', 0, '2021-11-02 23:25:00', '2021-11-02 23:24:16', '129.0.76.243', '0'),
(165, '102115611137242116411', 'google', 'Mounir Djabar', 'https://lh3.googleusercontent.com/a-/AOh14GgDoQf8G8lACgIhM0qSifwo67ai1cCILDVixh_fzg=s96-c', NULL, NULL, NULL, NULL, 'non', 'mounirodjabar@gmail.com', 0, '2021-11-06 12:15:09', '2021-11-02 15:34:31', '154.73.115.101', '0'),
(166, '2917465595250651', 'facebook', 'HÃ¸mmÃ« SÃ®mplÄ“', NULL, NULL, NULL, NULL, NULL, 'non', 'koblacharlotte@gmail.com', 0, '2021-11-02 23:39:11', '2021-11-02 23:38:41', '41.202.219.69', '0'),
(167, '182634390699655', 'facebook', 'Serge Martial', NULL, NULL, NULL, NULL, NULL, 'non', '', 0, '2021-11-03 00:34:12', '2021-11-03 00:33:34', '41.202.219.76', '0'),
(168, '904067213565353', 'facebook', 'Junior Mintoo', NULL, NULL, NULL, NULL, NULL, 'non', 'biermanmintoo11@gmail.com', 0, '2021-11-03 04:42:05', '2021-11-03 04:38:45', '41.202.207.16', '0'),
(169, '4457286254362530', 'facebook', 'Franck Arnaud Tsokouang', NULL, NULL, NULL, NULL, NULL, 'non', 'tpfakopke@yahoo.fr', 0, '2021-11-07 04:44:19', '2021-11-03 05:25:50', '41.202.219.78', '0'),
(170, '4724299760947778', 'facebook', 'Christian Temgoua', NULL, NULL, NULL, NULL, NULL, 'non', 'yannicktemgoua@yahoo.fr', 0, '2021-11-03 06:25:54', '2021-11-03 06:24:09', '129.0.103.24', '0'),
(171, '4686565641388327', 'facebook', 'Thierry Sion', NULL, NULL, NULL, NULL, NULL, 'non', 'essohthier@yahoo.fr', 0, '2021-11-03 06:40:35', '2021-11-03 06:40:27', '41.202.219.65', '0'),
(172, '114620813382001544622', 'google', 'Stephane dawa kemguem', 'https://lh3.googleusercontent.com/a-/AOh14GjlJ5JGI7bVec0e7Bm74xACLf3P7kpQ4taBh6ZTwg=s96-c', NULL, NULL, NULL, NULL, 'non', 'dawakemguem@gmail.com', 0, '2021-11-03 06:58:31', '2021-11-02 22:56:53', '41.202.219.69', '0'),
(173, '2534189530049902', 'facebook', 'Yann Yanick Yana', NULL, NULL, NULL, NULL, NULL, 'non', '', 0, '2021-11-17 20:50:39', '2021-11-03 07:14:40', '41.202.219.67', '0'),
(174, '2451866978281956', 'facebook', 'Fabio Sirina GrÃ©gory', NULL, NULL, NULL, NULL, NULL, 'non', 'gregorysirina@yahoo.com', 0, '2021-11-03 07:59:05', '2021-11-03 07:57:32', '154.72.167.83', '0'),
(175, '4168535676591522', 'facebook', 'Olivier Moukoko', NULL, NULL, NULL, NULL, NULL, 'non', 'moukokolivier@yahoo.fr', 0, '2021-11-03 09:06:04', '2021-11-03 09:04:20', '41.244.235.50', '0'),
(176, '2944700932526218', 'facebook', 'Atemo Kingdom', NULL, NULL, NULL, NULL, NULL, 'non', '', 0, '2021-11-03 09:30:53', '2021-11-03 09:27:44', '196.202.236.195', '0'),
(177, '3092576401068609', 'facebook', 'William Bias', NULL, NULL, NULL, NULL, NULL, 'non', '', 0, '2021-11-03 09:40:02', '2021-11-03 09:38:53', '41.202.219.78', '0'),
(178, '116848195928593686586', 'google', 'Henri Mbella', 'https://lh3.googleusercontent.com/a-/AOh14Gj_ZCqVtUwdBsA4vaARIKEtVM4IPV4S_hKO4z1TJw=s96-c', NULL, NULL, NULL, NULL, 'non', 'mbellahenri1@gmail.com', 0, '2021-11-03 11:20:43', '2021-11-03 03:19:10', '154.72.170.143', '0'),
(179, '3857096467723806', 'facebook', 'Franck LomiÃ©', NULL, NULL, NULL, NULL, NULL, 'non', 'francklomie@gmail.com', 0, '2021-11-03 11:28:47', '2021-11-03 11:27:50', '41.202.207.6', '0'),
(180, '1215061062304755', 'facebook', 'Bikoy Bi Yomkil Blaise', NULL, NULL, NULL, NULL, NULL, 'non', 'yomkilarsene@gmail.com', 0, '2021-11-03 03:55:28', '2021-11-03 11:55:28', NULL, '0'),
(181, '1174621920030220', 'facebook', 'Manfred Dong', NULL, NULL, NULL, NULL, NULL, 'non', '', 0, '2021-11-03 12:28:43', '2021-11-03 12:25:45', '41.202.219.68', '0'),
(182, '416794683413230', 'facebook', 'Maturin Nzume', NULL, NULL, NULL, NULL, NULL, 'non', '', 0, '2021-11-03 12:31:53', '2021-11-03 12:30:19', '129.0.205.227', '0'),
(183, '450124666648302', 'facebook', 'Lionnel Penda Mangala', NULL, NULL, NULL, NULL, NULL, 'non', '', 0, '2021-11-03 12:32:13', '2021-11-03 12:31:06', '41.202.219.74', '0'),
(184, '703551517714288', 'facebook', 'Michel Chulang', NULL, NULL, NULL, NULL, NULL, 'non', '', 0, '2021-11-03 13:00:17', '2021-11-03 12:53:12', '129.0.99.210', '0'),
(185, '276388691163569', 'facebook', 'Diderot Kouemo', NULL, NULL, NULL, NULL, NULL, 'non', 'diderotkouemo@gmail.com', 0, '2021-11-03 13:48:28', '2021-11-03 13:46:47', '41.244.243.198', '0'),
(186, '993304737916199', 'facebook', 'Steve LoÃ¯c Otls', NULL, NULL, NULL, NULL, NULL, 'non', '', 0, '2021-11-03 14:47:04', '2021-11-03 14:45:51', '129.0.81.243', '0'),
(187, '108158583560703257163', 'google', 'Samer Djohn', 'https://lh3.googleusercontent.com/a/AATXAJzs7cY9rWhJLrN6xc3L4hjlYbdrDIL-yfH4VnL8=s96-c', NULL, NULL, NULL, NULL, 'non', 'samerdjohn@gmail.com', 0, '2021-11-06 19:30:51', '2021-11-06 10:05:01', '41.202.219.76', '0'),
(188, '4619071248187107', 'facebook', 'Franck Nsoe', NULL, NULL, NULL, NULL, NULL, 'non', 'fcedric42@yahoo.fr', 0, '2021-11-12 14:50:04', '2021-11-12 14:47:16', '41.202.207.4', '0'),
(189, '3136171790040181', 'facebook', 'Kherty Devis', NULL, NULL, NULL, NULL, NULL, 'non', '', 0, '2021-12-28 06:19:46', '2021-11-12 16:53:15', '41.202.207.9', '0'),
(190, '10227457178044825', 'facebook', 'Edmond Ntenlep', NULL, NULL, NULL, NULL, NULL, 'non', 'edmond2roland@yahoo.fr', 0, '2021-11-17 11:59:32', '2021-11-12 18:36:38', '41.202.207.15', '0'),
(191, '610496626651341', 'facebook', 'Maigari Wassang', NULL, NULL, NULL, NULL, NULL, 'non', '', 0, '2021-11-28 19:06:03', '2021-11-12 22:06:14', '102.244.75.254', '0'),
(192, '592457478733473', 'facebook', 'Sylvian Abena', NULL, NULL, NULL, NULL, NULL, 'non', 'calexnjapom10@gmail.com', 0, '2021-11-13 10:11:49', '2021-11-13 01:46:16', '129.0.103.9', '0'),
(193, '4630321360397869', 'facebook', 'Ondoua Brice', NULL, NULL, NULL, NULL, NULL, 'non', 'andreondoua@yahoo.fr', 0, '2021-11-13 08:12:24', '2021-11-13 07:48:58', '41.202.207.5', '0'),
(194, '124645193325267', 'facebook', 'David Zemix', NULL, NULL, NULL, NULL, NULL, 'non', '', 0, '2022-01-04 09:30:37', '2021-11-13 08:03:32', '41.202.207.133', '0'),
(195, '116360281879171184061', 'google', 'simon ngwang', 'https://lh3.googleusercontent.com/a/AATXAJwkeaX63MnzKqpmTck96MgOzc9IicHLFQSJdapW=s96-c', NULL, NULL, NULL, NULL, 'non', 'ngwang1966@gmail.com', 0, '2021-11-16 19:27:20', '2021-11-13 00:35:51', '129.0.76.171', '0'),
(196, '115517344739493956181', 'google', 'georges joel Nzeffo tiotsop', 'https://lh3.googleusercontent.com/a-/AOh14GhR32jzbU56K7t8dVoOPeqS83AjOjUa6VV2y-C8=s96-c', NULL, NULL, NULL, NULL, 'non', 'joel.nzeffo123@gmail.com', 0, '2021-11-13 09:56:43', '2021-11-13 00:55:02', '129.0.99.218', '0'),
(197, '1399903680424997', 'facebook', 'Boris Mballa', NULL, NULL, NULL, NULL, NULL, 'non', '', 0, '2022-01-04 18:32:51', '2021-11-13 10:00:05', '129.0.226.197', '0'),
(198, '613020896788943', 'facebook', 'Didier Kadji', NULL, NULL, NULL, NULL, NULL, 'non', '', 0, '2021-11-13 10:09:54', '2021-11-13 10:08:28', '129.0.99.218', '0'),
(199, '612584946829675', 'facebook', 'Franck Anguissa', NULL, NULL, NULL, NULL, NULL, 'non', '', 0, '2021-11-13 10:20:07', '2021-11-13 10:18:59', '129.0.99.218', '0'),
(200, '666199651211187', 'facebook', 'Benedicte Tiotsop', NULL, NULL, NULL, NULL, NULL, 'non', '', 0, '2021-11-13 10:27:23', '2021-11-13 10:22:31', '129.0.99.218', '0'),
(201, '599412061479323', 'facebook', 'John Bradley', NULL, NULL, NULL, NULL, NULL, 'non', '', 0, '2021-11-13 10:28:53', '2021-11-13 10:28:17', '129.0.99.218', '0'),
(202, '442600080547788', 'facebook', 'Joseph Eric', NULL, NULL, NULL, NULL, NULL, 'non', '', 0, '2021-11-13 10:35:47', '2021-11-13 10:33:41', '129.0.99.218', '0'),
(203, '254051380089054', 'facebook', 'Michael Scofield New', NULL, NULL, NULL, NULL, NULL, 'non', 'kancolorado4@gmail.com', 0, '2021-11-13 10:52:40', '2021-11-13 10:49:22', '129.0.99.218', '0'),
(204, '262547592588653', 'facebook', 'Romeo Sancho', NULL, NULL, NULL, NULL, NULL, 'non', 'emrejoe2@gmail.com', 0, '2021-11-13 10:56:03', '2021-11-13 10:54:58', '129.0.99.218', '0'),
(205, '612203786883683', 'facebook', 'Roger Metanbok', NULL, NULL, NULL, NULL, NULL, 'non', '', 0, '2021-11-13 10:59:42', '2021-11-13 10:59:17', '129.0.99.218', '0'),
(206, '287304089969852', 'facebook', 'Bertrand Mao', NULL, NULL, NULL, NULL, NULL, 'non', '', 0, '2021-11-13 20:22:45', '2021-11-13 11:03:45', '129.0.76.70', '0'),
(207, '365357985333419', 'facebook', 'Max Ivan Biyong', NULL, NULL, NULL, NULL, NULL, 'non', '', 0, '2021-11-13 23:03:35', '2021-11-13 12:07:03', '41.202.207.3', '0'),
(208, '10217585014530780', 'facebook', 'Bill Hamsa', NULL, NULL, NULL, NULL, NULL, 'non', 'sadjoh85@yahoo.fr', 0, '2021-11-13 13:05:02', '2021-11-13 13:03:01', '102.244.74.241', '0'),
(209, '573428783752427', 'facebook', 'Boris Le Mignon', NULL, NULL, NULL, NULL, NULL, 'non', '', 0, '2021-11-20 02:21:10', '2021-11-13 15:08:37', '41.202.207.14', '0'),
(210, '315344210427524', 'facebook', 'Zidane Zinedine', NULL, NULL, NULL, NULL, NULL, 'non', 'felixmbuembue@gmail.com', 0, '2021-11-15 09:05:06', '2021-11-15 09:04:28', '41.202.219.161', '0'),
(211, '1353286878419716', 'facebook', 'NoÃ¹shÃ­ FlÄ—x Rostand', NULL, NULL, NULL, NULL, NULL, 'non', '', 0, '2021-11-15 09:06:19', '2021-11-15 09:05:06', '41.202.219.75', '0'),
(212, '1758120414386343', 'facebook', 'Akbar Njoya Fofana', NULL, NULL, NULL, NULL, NULL, 'non', 'ndamibrahim70@gmail.com', 0, '2021-11-15 09:06:37', '2021-11-15 09:05:17', '129.0.103.24', '0'),
(213, '115157921148215723331', 'google', 'Youssouf Matagnigni', 'https://lh3.googleusercontent.com/a-/AOh14Gh3HUETmLgaE7VrKSJ6ke-tzkRRx_Pi2UhDJhEVoA=s96-c', NULL, NULL, NULL, NULL, 'non', 'mataniniyoussouf@gmail.com', 0, '2021-11-16 19:17:04', '2021-11-15 00:08:36', '129.0.80.220', '0'),
(214, '4483206281745109', 'facebook', 'Ignacejoel Mba', NULL, NULL, NULL, NULL, NULL, 'non', 'ignacejoelmba@yahoo.fr', 0, '2021-11-16 19:27:00', '2021-11-15 09:10:03', '41.202.219.254', '0'),
(215, '116847486622824949069', 'google', 'Armel Kelly Gbah', 'https://lh3.googleusercontent.com/a/AATXAJwLNIXqHQ8T2CVoMejDsM0mFO9MX_HoK8CoyJw=s96-c', NULL, NULL, NULL, NULL, 'non', 'armelkellygbah08@gmail.com', 0, '2021-11-15 09:16:44', '2021-11-15 00:13:43', '41.202.207.7', '0'),
(216, '4333504680111795', 'facebook', 'Berthelo Kueda', NULL, NULL, NULL, NULL, NULL, 'non', 'berthelokueda@yahoo.fr', 0, '2021-11-15 09:16:33', '2021-11-15 09:15:49', '129.0.78.102', '0'),
(217, '390368946124894', 'facebook', 'Armel Kelly Gbah', NULL, NULL, NULL, NULL, NULL, 'non', '', 0, '2021-11-15 09:21:21', '2021-11-15 09:21:21', '41.202.207.7', '0'),
(218, '109426374814968632750', 'google', 'francky xavier nyÃ©bÃ©', 'https://lh3.googleusercontent.com/a-/AOh14Gj5LrNBF_axDm2eUxtirFXtUo64kXVd5sUju4wa=s96-c', NULL, NULL, NULL, NULL, 'non', 'franckyxaviern@gmail.com', 0, '2021-11-15 09:43:47', '2021-11-15 00:39:16', '129.0.226.222', '0'),
(219, '111554880759830841767', 'google', 'Weisman Wangso Kolwe', 'https://lh3.googleusercontent.com/a-/AOh14GjxWFrEB0Al4u_pZwGxMhJN7ITE0g7HH6Tozhpn=s96-c', NULL, NULL, NULL, NULL, 'non', 'wangsokolweweisman@gmail.com', 0, '2021-11-16 08:54:22', '2021-11-15 01:37:09', '102.244.75.60', '0'),
(220, '10224408867707704', 'facebook', 'Jr Ndje', NULL, NULL, NULL, NULL, NULL, 'non', 'jarhymes@hotmail.fr', 0, '2021-11-17 21:20:19', '2021-11-15 10:37:33', '154.70.108.90', '0'),
(221, '202182715401657', 'facebook', 'EcossÃ£Ä«t BrÃ£ndÅn', NULL, NULL, NULL, NULL, NULL, 'non', '', 0, '2021-11-16 21:40:38', '2021-11-15 11:04:53', '129.0.99.26', '0'),
(222, '1304046033364371', 'facebook', 'Le-zedo Odilon', NULL, NULL, NULL, NULL, NULL, 'non', '', 0, '2021-11-16 23:01:28', '2021-11-15 11:44:33', '41.202.219.166', '0'),
(223, '3035000580161589', 'facebook', 'Kpwem MbitÃºckrÃ£', NULL, NULL, NULL, NULL, NULL, 'non', '', 0, '2021-11-15 13:56:09', '2021-11-15 13:53:33', '129.0.76.141', '0'),
(224, '436489594734642', 'facebook', 'Armel Chouatinho', NULL, NULL, NULL, NULL, NULL, 'non', 'travissscott98@gmail.com', 0, '2021-11-17 09:16:06', '2021-11-15 14:30:12', '41.202.207.132', '0'),
(225, '5221414444541610', 'facebook', 'Alain Amang', NULL, NULL, NULL, NULL, NULL, 'non', 'amangcarlee@yahoo.fr', 0, '2021-11-15 15:04:55', '2021-11-15 15:00:31', '41.202.219.66', '0'),
(226, '2063297517158238', 'facebook', 'Asra Sosthene', NULL, NULL, NULL, NULL, NULL, 'non', 'sallahasra@yahoo.com', 0, '2021-11-15 15:11:24', '2021-11-15 15:05:41', '41.202.207.5', '0'),
(227, '1554907544860389', 'facebook', 'Mbayam Serge WÄ«zkÄ¯d', NULL, NULL, NULL, NULL, NULL, 'non', '', 0, '2021-11-15 15:28:46', '2021-11-15 15:26:10', '41.202.207.4', '0'),
(228, '419720876427415', 'facebook', 'Marinette Emani', NULL, NULL, NULL, NULL, NULL, 'non', '', 0, '2021-11-15 15:40:49', '2021-11-15 15:39:03', '154.72.167.148', '0'),
(229, '101229218992232418477', 'google', 'Gabin Nguelet', 'https://lh3.googleusercontent.com/a/AATXAJwdfzFyJm_JLO0bYhXyobKlNRLHkBe3IaIf-cY=s96-c', NULL, NULL, NULL, NULL, 'non', 'gabinnguelet66@gmail.com', 0, '2021-11-15 15:55:20', '2021-11-15 06:52:56', '41.202.207.13', '0'),
(230, '207612161489125', 'facebook', 'Roy Elrick', NULL, NULL, NULL, NULL, NULL, 'non', '', 0, '2021-11-15 16:33:27', '2021-11-15 16:31:31', '41.202.219.70', '0'),
(231, '2970720426511833', 'facebook', 'Samuel Kadji', NULL, NULL, NULL, NULL, NULL, 'non', '', 0, '2021-11-16 19:57:24', '2021-11-15 16:58:20', '196.202.236.195', '0'),
(232, '4518431414860832', 'facebook', 'Achille Noah', NULL, NULL, NULL, NULL, NULL, 'non', 'achillenoah75@yahoo.fr', 0, '2021-11-16 21:01:44', '2021-11-15 17:44:22', '41.202.219.64', '0'),
(233, '106626159509311591881', 'google', 'Jean Jacques', 'https://lh3.googleusercontent.com/a/AATXAJwwCtb3FIjbSk5XdXNKyx0anF2VdCCAnUfmp-d6=s96-c', NULL, NULL, NULL, NULL, 'non', 'jeanjacquevalerie1@gmail.com', 0, '2021-11-15 18:06:38', '2021-11-15 09:05:05', '129.0.226.218', '0'),
(234, '1251412995304052', 'facebook', 'Sylvain Tsogo', NULL, NULL, NULL, NULL, NULL, 'non', 'sylvaintsogo562@gmail.com', 0, '2021-11-15 18:20:18', '2021-11-15 18:18:30', '129.0.205.186', '0'),
(235, '109433705106141892466', 'google', 'Essono Kiky', 'https://lh3.googleusercontent.com/a/AATXAJz8frkZ0o8gxFDH_uwkQfs61S-Dcz3okt0ei8bs=s96-c', NULL, NULL, NULL, NULL, 'non', 'kikyessono95@gmail.com', 0, '2021-11-15 21:19:51', '2021-11-15 12:16:45', '41.202.207.1', '0'),
(236, '112376379473096060387', 'google', 'Samson Abole', 'https://lh3.googleusercontent.com/a-/AOh14GhZWCWfdqOLUk1uyMFeUMD3FIoKTPzXLH0kZvX2=s96-c', NULL, NULL, NULL, NULL, 'non', 'abolesamson@gmail.com', 0, '2021-11-16 07:19:03', '2021-11-15 22:17:35', '41.202.207.14', '0'),
(237, '101912877281742287067', 'google', 'Franck Nzalle', 'https://lh3.googleusercontent.com/a/AATXAJzWhBR-JWXcbt8xob9VtyBcIpVy-5S6owhg6q6n=s96-c', NULL, NULL, NULL, NULL, 'non', 'nzallefranck9@gmail.com', 0, '2021-11-16 07:38:40', '2021-11-15 22:38:39', '129.0.99.187', '0'),
(238, '107462386142929724186', 'google', 'Ivan Ondoua', 'https://lh3.googleusercontent.com/a/AATXAJzUMCAIY_sNmcfoJkXjvdYtzz3sgXoI3mYb7MGS=s96-c', NULL, NULL, NULL, NULL, 'non', 'ondouaivan@gmail.com', 0, '2021-11-16 11:38:07', '2021-11-16 02:36:50', '41.202.207.12', '0'),
(239, '2707205286247891', 'facebook', 'Derick Evina', NULL, NULL, NULL, NULL, NULL, 'non', '', 0, '2021-11-16 14:20:14', '2021-11-16 14:14:36', '41.202.207.6', '0'),
(240, '257834596374188', 'facebook', 'Aldo Etambe', NULL, NULL, NULL, NULL, NULL, 'non', '', 0, '2021-11-16 15:03:47', '2021-11-16 15:01:36', '129.0.80.127', '0'),
(241, '603477767739421', 'facebook', 'Thierry Gloire', NULL, NULL, NULL, NULL, NULL, 'non', '', 0, '2021-11-16 16:55:14', '2021-11-16 16:53:00', '129.0.99.224', '0'),
(242, '1980228382148789', 'facebook', 'Emmanuel Ayissi Endrick', NULL, NULL, NULL, NULL, NULL, 'non', 'emmanuelayissi@ymail.com', 0, '2021-12-03 07:07:59', '2021-11-16 18:57:20', '41.202.207.13', '0'),
(243, '862707761272485', 'facebook', 'Creme Bonheur Zoltan', NULL, NULL, NULL, NULL, NULL, 'non', '', 0, '2021-11-17 10:07:01', '2021-11-16 18:59:38', '129.0.125.20', '0'),
(244, '114383615710226086832', 'google', 'Emmanuel Basas', 'https://lh3.googleusercontent.com/a/AATXAJzyzWg0PUDAU6ZbbAFSu7qHD4RBJN0QTTDQ87ju=s96-c', NULL, NULL, NULL, NULL, 'non', 'emmanuelbasas10@gmail.com', 0, '2021-11-17 08:07:38', '2021-11-16 10:02:14', '196.202.236.195', '0'),
(245, '1390633721339164', 'facebook', 'Alex Zefa', NULL, NULL, NULL, NULL, NULL, 'non', '', 0, '2021-11-16 20:14:26', '2021-11-16 20:12:45', '129.0.204.210', '0'),
(246, '417875509714844', 'facebook', 'Nahgwa Rose', NULL, NULL, NULL, NULL, NULL, 'non', '', 0, '2021-11-16 21:04:16', '2021-11-16 21:02:20', '129.0.76.91', '0'),
(247, '3144159555908650', 'facebook', 'Perry Afadani', NULL, NULL, NULL, NULL, NULL, 'non', '', 0, '2021-11-16 21:03:14', '2021-11-16 21:03:13', '129.0.79.101', '0'),
(248, '3300890743481372', 'facebook', 'Kingsley Agbor', NULL, NULL, NULL, NULL, NULL, 'non', '', 0, '2021-11-16 21:04:44', '2021-11-16 21:03:19', '41.202.219.72', '0'),
(249, '115867808437486525083', 'google', 'fokouafeussi clinton', 'https://lh3.googleusercontent.com/a/AATXAJxhH_gmENT3gKf53MsYNNbqQ-Jbe2Zlv0HRPjuC=s96-c', NULL, NULL, NULL, NULL, 'non', 'clintonfokoua237@gmail.com', 0, '2021-11-16 21:04:18', '2021-11-16 12:03:50', '129.0.205.128', '0'),
(250, '109681052123751537853', 'google', 'Bani Etienne', 'https://lh3.googleusercontent.com/a/AATXAJxUjvHpFTAiIvp3VrCuFD5vLHhh1PaZSzqbGrrV=s96-c', NULL, NULL, NULL, NULL, 'non', 'banietienne@gmail.com', 0, '2021-11-16 21:06:22', '2021-11-16 12:03:50', '129.0.99.137', '0'),
(251, '265763558849000', 'facebook', 'Msr Kenne', NULL, NULL, NULL, NULL, NULL, 'non', 'kennekennedy1995@gmail.com', 0, '2021-11-17 06:31:14', '2021-11-16 21:03:53', '41.202.219.75', '0'),
(252, '638037400686621', 'facebook', 'Grace Tchoya', NULL, NULL, NULL, NULL, NULL, 'non', '', 0, '2021-11-16 21:05:50', '2021-11-16 21:03:55', '129.0.205.124', '0');
INSERT INTO `utilisateurs` (`id`, `oauth_uid`, `oauth_provider`, `nom`, `picture_url`, `genre`, `date_naissance`, `numero`, `code`, `num_ok`, `email`, `mode_prono`, `last_login`, `creation_date`, `last_ip`, `banned`) VALUES
(253, '215020050768785', 'facebook', 'ValÃ¨re Dubois', NULL, NULL, NULL, NULL, NULL, 'non', '', 0, '2021-11-16 21:09:11', '2021-11-16 21:04:00', '41.202.219.67', '0'),
(254, '103651246685446464641', 'google', 'Wilfred Ombe', 'https://lh3.googleusercontent.com/a-/AOh14Ghypf0_ZWs9e1KuSCMP_D6Z5SMigMr8Xc_oLWk3DQ=s96-c', NULL, NULL, NULL, NULL, 'non', 'wilfredombe2@gmail.com', 0, '2021-11-16 21:07:12', '2021-11-16 12:04:04', '41.202.219.75', '0'),
(255, '1248787062253932', 'facebook', 'Ivan Cesar', NULL, NULL, NULL, NULL, NULL, 'non', '', 0, '2021-11-16 21:05:45', '2021-11-16 21:04:05', '41.202.219.70', '0'),
(256, '3037280816526040', 'facebook', 'Romeo Ouatat', NULL, NULL, NULL, NULL, NULL, 'non', '', 0, '2021-11-16 21:04:13', '2021-11-16 21:04:12', '41.202.219.247', '0'),
(257, '113508319314426247273', 'google', 'R Bambod', 'https://lh3.googleusercontent.com/a/AATXAJymQa3ovrkfRqFzPOBBR8cP72nKJRzwQmmAyejc=s96-c', NULL, NULL, NULL, NULL, 'non', 'rbambod5@gmail.com', 0, '2021-11-16 21:04:15', '2021-11-16 12:04:13', '129.0.76.172', '0'),
(258, '104818765113806156731', 'google', 'Bel Kenfack', 'https://lh3.googleusercontent.com/a/AATXAJyjVfvb2d8VXIkKNJA0qVVx8yP4Es2hk0P_MhBB=s96-c', NULL, NULL, NULL, NULL, 'non', 'belfast.kenfack@gmail.com', 0, '2021-11-16 21:06:38', '2021-11-16 12:04:14', '41.202.219.76', '0'),
(259, '116734342322220754751', 'google', 'Polycape Doungue', 'https://lh3.googleusercontent.com/a-/AOh14Gh0hh5NCaZxHzkYF8e-vw2eGunNYzMiwcsZargmBw=s96-c', NULL, NULL, NULL, NULL, 'non', 'polycapedoungue@gmail.com', 0, '2021-11-16 21:07:41', '2021-11-16 12:04:26', '129.0.99.2', '0'),
(260, '112247858490791831236', 'google', 'Emile Regis Owona', 'https://lh3.googleusercontent.com/a-/AOh14Gj3MVvGujG__bgf5eiW1qPZSRpgJvSOT335Ecnn=s96-c', NULL, NULL, NULL, NULL, 'non', 'bikeleemile1@gmail.com', 0, '2021-11-16 21:05:41', '2021-11-16 12:04:27', '41.202.207.4', '0'),
(261, '1333148087118033', 'facebook', 'Jean Ponli', NULL, NULL, NULL, NULL, NULL, 'non', '', 0, '2021-11-16 21:09:30', '2021-11-16 21:04:29', '129.0.79.224', '0'),
(262, '608661867214350', 'facebook', 'Eva Lotin', NULL, NULL, NULL, NULL, NULL, 'non', '', 0, '2021-11-16 21:05:37', '2021-11-16 21:04:30', '41.202.207.169', '0'),
(263, '638849300467923', 'facebook', 'Anatole France Effa Okoa', NULL, NULL, NULL, NULL, NULL, 'non', 'effaanatole09@gmail.com', 0, '2021-11-16 21:05:14', '2021-11-16 21:04:30', '129.0.226.227', '0'),
(264, '107094529350524317413', 'google', 'Richard TIFFO', 'https://lh3.googleusercontent.com/a/AATXAJx1tuXOCKjjEK-VCuZ4720mCxZvGGk3h4I1hsbB=s96-c', NULL, NULL, NULL, NULL, 'non', 'richardtiffo@gmail.com', 0, '2021-11-16 21:04:34', '2021-11-16 12:04:31', '41.202.219.67', '0'),
(265, '111684886423981825165', 'google', 'Lawsamba Ivan Kimbung', 'https://lh3.googleusercontent.com/a/AATXAJyyUwja-hsyEydBOkuIiRAN35nZ89LVW8MWVAqq=s96-c', NULL, NULL, NULL, NULL, 'non', 'ivanlawsamba@gmail.com', 0, '2021-11-16 21:05:45', '2021-11-16 12:04:32', '129.0.204.202', '0'),
(266, '1502002670171665', 'facebook', 'Silas Sawalda', NULL, NULL, NULL, NULL, NULL, 'non', '', 0, '2021-11-16 21:04:46', '2021-11-16 21:04:41', '41.202.219.68', '0'),
(267, '421755592836217', 'facebook', 'LoÃ¯c Naza Junior', NULL, NULL, NULL, NULL, NULL, 'non', '', 0, '2021-11-16 21:05:18', '2021-11-16 21:04:41', '41.202.207.8', '0'),
(268, '3006789789536451', 'facebook', 'Djiki Yo ToundÃ©', NULL, NULL, NULL, NULL, NULL, 'non', 'djikib@yahoo.fr', 0, '2021-11-16 21:06:07', '2021-11-16 21:04:43', '102.244.73.110', '0'),
(269, '4783448631705481', 'facebook', 'Jean Jacques Tapra Fewa', NULL, NULL, NULL, NULL, NULL, 'non', 'jtaprafewa@yahoo.fr', 0, '2021-11-16 21:04:47', '2021-11-16 21:04:44', '102.244.73.111', '0'),
(270, '659368138415151', 'facebook', 'Yannick Ebanga', NULL, NULL, NULL, NULL, NULL, 'non', '', 0, '2021-11-19 10:07:27', '2021-11-16 21:04:44', '41.202.207.4', '0'),
(271, '1043763153083572', 'facebook', 'Kanwan Celestor', NULL, NULL, NULL, NULL, NULL, 'non', 'olivermarc876@gmail.com', 0, '2021-11-16 21:06:03', '2021-11-16 21:04:46', '129.0.205.147', '0'),
(272, '1608489556160656', 'facebook', 'ÄŒhÃ¸Ã§ÃµlÃ¤t DÃ« DÃ¯Ä™Ã¼', NULL, NULL, NULL, NULL, NULL, 'non', '', 0, '2021-11-16 21:05:58', '2021-11-16 21:04:51', '41.202.219.64', '0'),
(273, '360644329168631', 'facebook', 'Ktr Buzz', NULL, NULL, NULL, NULL, NULL, 'non', '', 0, '2021-11-16 21:04:58', '2021-11-16 21:04:55', '41.202.219.67', '0'),
(274, '4193438000768323', 'facebook', 'Loic Keumo Sandjo', NULL, NULL, NULL, NULL, NULL, 'non', 'loickeumo@yahoo.fr', 0, '2021-11-16 21:05:42', '2021-11-16 21:05:00', '41.202.207.135', '0'),
(275, '726661354973258', 'facebook', 'Gabriel Tammo', NULL, NULL, NULL, NULL, NULL, 'non', '', 0, '2021-11-16 21:07:58', '2021-11-16 21:05:02', '41.202.219.77', '0'),
(276, '132213665833866', 'facebook', 'Razan Toure', NULL, NULL, NULL, NULL, NULL, 'non', 'nazarius.mvogo@yahoo.fr', 0, '2021-11-16 21:05:25', '2021-11-16 21:05:03', '41.202.219.76', '0'),
(277, '115493116187897910504', 'google', 'Jean de dieu Fongang', 'https://lh3.googleusercontent.com/a/AATXAJwWLRWxo9pv3zdyPv8o_-8nJHEDsyudG0Nw7BZN=s96-c', NULL, NULL, NULL, NULL, 'non', 'fongangj724@gmail.com', 0, '2021-11-16 21:06:06', '2021-11-16 12:05:12', '129.0.125.12', '0'),
(278, '105818280984196339665', 'google', 'Alim Shopping', 'https://lh3.googleusercontent.com/a-/AOh14Ggl6bW2tpyHgVBMSMBNazVnS6QwZPfgop_7lFOi=s96-c', NULL, NULL, NULL, NULL, 'non', 'alimshopping1@gmail.com', 0, '2021-11-16 21:08:19', '2021-11-16 12:05:18', '102.244.74.167', '0'),
(279, '5199426680086912', 'facebook', 'Mpondo Franck Kolle', NULL, NULL, NULL, NULL, NULL, 'non', 'franck.kolle@yahoo.com', 0, '2021-11-16 21:06:03', '2021-11-16 21:05:18', '41.202.207.5', '0'),
(280, '909463503332509', 'facebook', 'Daniel Dou Rikam', NULL, NULL, NULL, NULL, NULL, 'non', 'rikamdanieldou@gmail.com', 0, '2021-11-16 21:06:24', '2021-11-16 21:05:32', '41.202.219.78', '0'),
(281, '4637173496363414', 'facebook', 'Roland Eko', NULL, NULL, NULL, NULL, NULL, 'non', 'ekober6@hotmail.com', 0, '2021-11-16 21:05:39', '2021-11-16 21:05:32', '41.202.207.14', '0'),
(282, '4502033269877582', 'facebook', 'Moussa Djobli', NULL, NULL, NULL, NULL, NULL, 'non', 'aboufayed43@yahoo.fr', 0, '2021-11-16 21:06:33', '2021-11-16 21:05:36', '129.0.211.212', '0'),
(283, '904537230484628', 'facebook', 'Melancolisme Tanguy', NULL, NULL, NULL, NULL, NULL, 'non', 'ghislainpangam@gmail.com', 0, '2021-11-16 21:07:50', '2021-11-16 21:05:37', '41.202.219.244', '0'),
(284, '103014917180728054751', 'google', 'Steve Stevensito', 'https://lh3.googleusercontent.com/a-/AOh14GhlXmBLufVAU2hEyNd9IENpkZqDcHa0iV6_-RuayA=s96-c', NULL, NULL, NULL, NULL, 'non', 'stevepatricksimeu@gmail.com', 0, '2021-11-16 21:06:40', '2021-11-16 12:05:38', '129.0.205.231', '0'),
(285, '996875570870212', 'facebook', 'Olinga Alexandre Ze', NULL, NULL, NULL, NULL, NULL, 'non', '', 0, '2021-11-16 21:11:49', '2021-11-16 21:05:47', '41.202.207.10', '0'),
(286, '111035391274732856217', 'google', 'honore makolea', 'https://lh3.googleusercontent.com/a/AATXAJxF1685WQkkUV9zuURUeZSbzOBj0k6fWdRznUMw=s96-c', NULL, NULL, NULL, NULL, 'non', 'honoremakolea08@gmail.com', 0, '2021-11-16 21:09:56', '2021-11-16 12:05:49', '129.0.76.212', '0'),
(287, '3114888038833882', 'facebook', 'Gaetan Olinga', NULL, NULL, NULL, NULL, NULL, 'non', 'gaetanolinga316@gmail.com', 0, '2021-11-16 21:07:20', '2021-11-16 21:05:57', '41.202.207.2', '0'),
(288, '106949168693594200191', 'google', 'Christele Ngana', 'https://lh3.googleusercontent.com/a-/AOh14GhF8jI4J80mlmWLFUYpMyCJgw4h1oZBcq46aY1RWw=s96-c', NULL, NULL, NULL, NULL, 'non', 'christelengana71@gmail.com', 0, '2021-11-16 21:09:04', '2021-11-16 12:06:01', '41.202.207.16', '0'),
(289, '254821909961225', 'facebook', 'Ornella Kaishaa', NULL, NULL, NULL, NULL, NULL, 'non', 'tochieolivia7@gmail.com', 0, '2021-11-16 21:07:14', '2021-11-16 21:06:11', '41.202.219.66', '0'),
(290, '421660249437700', 'facebook', 'MT Asong', NULL, NULL, NULL, NULL, NULL, 'non', '', 0, '2021-11-16 12:06:18', '2021-11-16 21:06:18', NULL, '0'),
(291, '2976765979254727', 'facebook', 'Marcel Junior', NULL, NULL, NULL, NULL, NULL, 'non', '', 0, '2021-11-16 21:07:42', '2021-11-16 21:06:22', '41.202.219.70', '0'),
(292, '1788286978226736', 'facebook', 'Crescence Minlang', NULL, NULL, NULL, NULL, NULL, 'non', '', 0, '2021-11-21 11:38:23', '2021-11-16 21:06:23', '129.0.226.183', '0'),
(293, '2744231099209861', 'facebook', 'Sorelle Foka', NULL, NULL, NULL, NULL, NULL, 'non', 'sorelle.foka@yahoo.fr', 0, '2021-11-16 12:06:24', '2021-11-16 21:06:24', NULL, '0'),
(294, '2290762644405726', 'facebook', 'MÃ®ÄhÃ¢Ãªl Å ÄÃ´field', NULL, NULL, NULL, NULL, NULL, 'non', 'abdoulkadirb@yahoo.com', 0, '2021-11-16 21:07:13', '2021-11-16 21:06:27', '41.202.207.128', '0'),
(295, '1555427864809455', 'facebook', 'Cabrel Michel', NULL, NULL, NULL, NULL, NULL, 'non', '', 0, '2021-11-16 21:09:12', '2021-11-16 21:06:27', '129.0.226.221', '0'),
(296, '1515931012116837', 'facebook', 'Alain LÃ£ptÅp Linjouom', NULL, NULL, NULL, NULL, NULL, 'non', 'linjouom9@gmail.com', 0, '2021-11-16 21:13:28', '2021-11-16 21:06:29', '41.202.219.75', '0'),
(297, '3009917275891359', 'facebook', 'Andre Dimitri Yamsi Tchuiani', NULL, NULL, NULL, NULL, NULL, 'non', 'yamsiandre2013@gmail.com', 0, '2021-11-16 21:08:22', '2021-11-16 21:06:29', '102.244.73.142', '0'),
(298, '1075608949869974', 'facebook', 'Pierre Tamouya', NULL, NULL, NULL, NULL, NULL, 'non', 'tamouyapierre054@gmail.com', 0, '2021-11-16 21:09:34', '2021-11-16 21:06:31', '41.202.219.164', '0'),
(299, '641100280606902', 'facebook', 'Karim Benz', NULL, NULL, NULL, NULL, NULL, 'non', 'benzkarim732@gmail.com', 0, '2021-11-16 21:07:33', '2021-11-16 21:06:34', '41.202.219.244', '0'),
(300, '1121697695242861', 'facebook', 'Philippe Awana Judith', NULL, NULL, NULL, NULL, NULL, 'non', '', 0, '2021-11-17 11:21:11', '2021-11-16 21:06:35', '41.202.207.7', '0'),
(301, '101124655178358302017', 'google', 'Tchio Le king', 'https://lh3.googleusercontent.com/a/AATXAJw9d_wPMnrKXPmN8gJu6L8x4IonXBYIRmDLvtcl=s96-c', NULL, NULL, NULL, NULL, 'non', 'lekingtchio@gmail.com', 0, '2021-11-16 21:08:51', '2021-11-16 12:06:37', '41.202.207.9', '0'),
(302, '116121822239698888260', 'google', 'Stephano Fomo', 'https://lh3.googleusercontent.com/a/AATXAJzgdiTaaHny4uFcpiSz6HC4Vh5w9vw0zqI5YRk=s96-c', NULL, NULL, NULL, NULL, 'non', 'fomostephano7@gmail.com', 0, '2021-11-16 21:06:45', '2021-11-16 12:06:40', '41.202.219.247', '0'),
(303, '411279307375117', 'facebook', 'Kendra Kenou', NULL, NULL, NULL, NULL, NULL, 'non', '', 0, '2021-11-16 21:06:42', '2021-11-16 21:06:40', '41.202.207.6', '0'),
(304, '568911967513034', 'facebook', 'Geovy New', NULL, NULL, NULL, NULL, NULL, 'non', 'gbeligus2@gmail.com', 0, '2021-11-16 21:08:05', '2021-11-16 21:06:41', '41.202.219.169', '0'),
(305, '10228365648272348', 'facebook', 'AndrÃ© Ndzengue', NULL, NULL, NULL, NULL, NULL, 'non', 'dydan20002001@yahoo.fr', 0, '2021-11-16 21:08:04', '2021-11-16 21:06:45', '154.72.162.184', '0'),
(306, '314471560679058', 'facebook', 'Mike Kouam', NULL, NULL, NULL, NULL, NULL, 'non', '', 0, '2021-11-16 12:06:47', '2021-11-16 21:06:47', NULL, '0'),
(307, '625888758594833', 'facebook', 'BÃ¸by JamÄ™s', NULL, NULL, NULL, NULL, NULL, 'non', '', 0, '2021-11-16 21:10:55', '2021-11-16 21:06:52', '129.0.99.213', '0'),
(308, '102896023168001157005', 'google', 'Didi Abamot', 'https://lh3.googleusercontent.com/a/AATXAJyDTvysSIv5FPHcmZrRPOYuTd8rBqRlW-VqmKPC=s96-c', NULL, NULL, NULL, NULL, 'non', 'didiabamot@gmail.com', 0, '2021-11-16 21:17:25', '2021-11-16 12:06:53', '129.0.213.219', '0'),
(309, '1711997938996269', 'facebook', 'Joel Cheuffa', NULL, NULL, NULL, NULL, NULL, 'non', '', 0, '2021-11-16 21:08:11', '2021-11-16 21:06:55', '41.202.219.69', '0'),
(310, '1063703607712687', 'facebook', 'Paul Celestin Dibena Moukoudi', NULL, NULL, NULL, NULL, NULL, 'non', '', 0, '2021-11-16 21:07:45', '2021-11-16 21:06:55', '129.0.205.7', '0'),
(311, '4654812627921347', 'facebook', 'AndrÃ© Toche', NULL, NULL, NULL, NULL, NULL, 'non', 'transeco@yahoo.fr', 0, '2021-11-16 21:07:58', '2021-11-16 21:06:56', '41.202.219.74', '0'),
(312, '3062822164036681', 'facebook', 'Azsnee Sean', NULL, NULL, NULL, NULL, NULL, 'non', 'momo_dilane@yahoo.fr', 0, '2021-11-16 21:07:49', '2021-11-16 21:06:59', '41.202.207.8', '0'),
(313, '4438052732973858', 'facebook', 'Viviane Sandrine Mfangam', NULL, NULL, NULL, NULL, NULL, 'non', 'vyvysandryne@yahoo.fr', 0, '2021-11-16 21:08:19', '2021-11-16 21:07:01', '41.202.207.5', '0'),
(314, '115438791103004019157', 'google', 'Dilane Foyou', 'https://lh3.googleusercontent.com/a/AATXAJxNIY1og5N2wqOGcGd-VeD18_NiGmNsH-vFPmjY=s96-c', NULL, NULL, NULL, NULL, 'non', 'foyoudilane27@gmail.com', 0, '2021-11-16 21:09:49', '2021-11-16 12:07:01', '41.202.219.73', '0'),
(315, '4214099108701892', 'facebook', 'Cesaire Elemba', NULL, NULL, NULL, NULL, NULL, 'non', 'cesaireelemba@yahoo.fr', 0, '2021-11-16 21:08:35', '2021-11-16 21:07:02', '102.244.74.29', '0'),
(316, '1527605794290878', 'facebook', 'Tainene Chancelier Jacob', NULL, NULL, NULL, NULL, NULL, 'non', 'tainenejacob0@gmail.com', 0, '2021-11-16 21:08:08', '2021-11-16 21:07:02', '129.0.226.164', '0'),
(317, '581137469775540', 'facebook', 'LÃ£ RÃ£gÃ« TrÃ£qÃ¼Ã¬llÃ«', NULL, NULL, NULL, NULL, NULL, 'non', '', 0, '2021-11-16 21:08:34', '2021-11-16 21:07:05', '41.202.207.13', '0'),
(318, '2036767759809539', 'facebook', 'Marie Gisele Ndem', NULL, NULL, NULL, NULL, NULL, 'non', 'mgndem@outlook.fr', 0, '2021-11-16 21:07:14', '2021-11-16 21:07:12', '41.202.219.66', '0'),
(319, '108876546923123402565', 'google', 'hosia Mbah', 'https://lh3.googleusercontent.com/a/AATXAJzgrP_fu12KJPRoiOaZ80KLL_dLTzaElqthMjqW=s96-c', NULL, NULL, NULL, NULL, 'non', 'hosia1mbah@gmail.com', 0, '2021-11-16 21:08:29', '2021-11-16 12:07:12', '129.0.226.233', '0'),
(320, '10227360120447278', 'facebook', 'Djeukeu William', NULL, NULL, NULL, NULL, NULL, 'non', 'djeukeuwilliam@yahoo.fr', 0, '2021-11-16 21:09:52', '2021-11-16 21:07:12', '41.202.219.78', '0'),
(321, '255832383251189', 'facebook', 'Serges Mbomo', NULL, NULL, NULL, NULL, NULL, 'non', '', 0, '2021-11-16 21:10:04', '2021-11-16 21:07:15', '41.202.207.152', '0'),
(322, '109435860082472330032', 'google', 'henri bata', 'https://lh3.googleusercontent.com/a/AATXAJypnvZIfefdUULXGOlKQYa8wmiivybeLcE-GiUF=s96-c', NULL, NULL, NULL, NULL, 'non', 'amayenabata@gmail.com', 0, '2021-11-16 21:08:11', '2021-11-16 12:07:17', '41.202.207.10', '0'),
(323, '2919325351713452', 'facebook', 'Awalou Ben Daouda Iya', NULL, NULL, NULL, NULL, NULL, 'non', 'mohamadouawaloudaouda@gmail.com', 0, '2021-11-16 21:08:12', '2021-11-16 21:07:20', '129.0.213.202', '0'),
(324, '4783541288344112', 'facebook', 'Fred Christian', NULL, NULL, NULL, NULL, NULL, 'non', 'elfranix@voila.fr', 0, '2021-11-16 21:08:05', '2021-11-16 21:07:21', '41.202.207.11', '0'),
(325, '452561273182251', 'facebook', 'Stefano Fomo', NULL, NULL, NULL, NULL, NULL, 'non', 'fomostephano7@gmail.com', 0, '2021-11-16 12:07:24', '2021-11-16 21:07:24', NULL, '0'),
(326, '1584910111854928', 'facebook', 'KÃ¯ngRÃ¼ssÄ“ Ã˜ffÃ­ÄÃ¬Ã«l', NULL, NULL, NULL, NULL, NULL, 'non', '', 0, '2021-11-16 21:07:32', '2021-11-16 21:07:30', '41.202.219.79', '0'),
(327, '4296233317140743', 'facebook', 'Arthur Ndzana', NULL, NULL, NULL, NULL, NULL, 'non', 'arthur.ndzana@yahoo.fr', 0, '2021-11-16 21:09:02', '2021-11-16 21:07:32', '41.202.207.16', '0'),
(328, '1306796599742099', 'facebook', 'El MBappe LOic', NULL, NULL, NULL, NULL, NULL, 'non', 'stevembappe94@gmail.com', 0, '2021-11-16 21:07:38', '2021-11-16 21:07:36', '41.202.207.10', '0'),
(329, '115860687569366', 'facebook', 'LÃ©once KÃ©vin Tchanwoussi', NULL, NULL, NULL, NULL, NULL, 'non', 'tchanwoussi@gmail.com', 0, '2021-11-16 21:07:49', '2021-11-16 21:07:41', '41.202.207.10', '0'),
(330, '1629416740754423', 'facebook', 'Jermain Ekat Dibobe', NULL, NULL, NULL, NULL, NULL, 'non', 'dibobefils@gmail.com', 0, '2021-11-16 21:11:55', '2021-11-16 21:07:43', '41.202.207.11', '0'),
(331, '111706232366301175002', 'google', 'Reyes Nidjieu', 'https://lh3.googleusercontent.com/a/AATXAJxqk7yDsqnEgTzKB6bqU540gLzcGri2d_RmjAFw=s96-c', NULL, NULL, NULL, NULL, 'non', 'nidjieureyes@gmail.com', 0, '2021-11-16 21:07:48', '2021-11-16 12:07:44', '129.0.99.136', '0'),
(332, '1377338946036931', 'facebook', 'Blandon LiÃµn', NULL, NULL, NULL, NULL, NULL, 'non', '', 0, '2021-11-16 21:10:07', '2021-11-16 21:07:47', '129.0.213.246', '0'),
(333, '109812474391091541131', 'google', 'mike kouam', 'https://lh3.googleusercontent.com/a/AATXAJxdZcA5w7nc1MKd5xGUSUpaMgXvAkpcGGatVbbm=s96-c', NULL, NULL, NULL, NULL, 'non', 'mikekouam1@gmail.com', 0, '2021-11-16 21:12:18', '2021-11-16 12:07:52', '129.0.103.9', '0'),
(334, '105308972373440997877', 'google', 'Steve Nzopop', 'https://lh3.googleusercontent.com/a-/AOh14Gg2WWanA6yMoNz-Hx-yonNP7KRWKuvzyzy8qQ5h=s96-c', NULL, NULL, NULL, NULL, 'non', 'stevenzopop@gmail.com', 0, '2021-11-16 21:11:22', '2021-11-16 12:07:54', '129.0.80.247', '0'),
(335, '4007665419333999', 'facebook', 'Christian Menguede', NULL, NULL, NULL, NULL, NULL, 'non', 'christianmenguede@yahoo.fr', 0, '2021-11-16 21:09:35', '2021-11-16 21:08:01', '41.202.207.5', '0'),
(336, '105942542829100216536', 'google', 'Enoa Ndzana', 'https://lh3.googleusercontent.com/a/AATXAJxmtRiXy6OP-GnGg50O6DTr9nZZ5THqmzBxAP_L=s96-c', NULL, NULL, NULL, NULL, 'non', 'enoandzana132@gmail.com', 0, '2021-11-16 21:09:36', '2021-11-16 12:08:02', '41.202.207.4', '0'),
(337, '104788980961845358566', 'google', 'HS KViewers', 'https://lh3.googleusercontent.com/a/AATXAJw_vUj3fJru1rOG-5n6L_qrRuxVk_0zqjPQirwEfg=s96-c', NULL, NULL, NULL, NULL, 'non', 'haroldkouonga55@gmail.com', 0, '2021-11-16 21:08:44', '2021-11-16 12:08:03', '129.0.76.17', '0'),
(338, '1516633012026530', 'facebook', 'Chris Torys', NULL, NULL, NULL, NULL, NULL, 'non', '', 0, '2021-11-16 22:07:22', '2021-11-16 21:08:08', '41.202.207.2', '0'),
(339, '4374138052685192', 'facebook', 'Jules Frank Ngankam Kamakem', NULL, NULL, NULL, NULL, NULL, 'non', 'ngankajulfrank@gmail.com', 0, '2021-11-16 21:09:45', '2021-11-16 21:08:09', '154.72.167.116', '0'),
(340, '106302527284486609726', 'google', 'Dilane Walter', 'https://lh3.googleusercontent.com/a/AATXAJyVbaPgGOYlv3SYGcqlXbxHAOfwUOwcvm9DoIkb=s96-c', NULL, NULL, NULL, NULL, 'non', 'dilanevaneck@gmail.com', 0, '2021-11-16 21:24:51', '2021-11-16 12:08:17', '129.0.213.244', '0'),
(341, '106853226814456791496', 'google', 'Cedric Ndeffo', 'https://lh3.googleusercontent.com/a/AATXAJyEtF1zJO6mHhKPk0y7PWb0aESxF7MVcBdhA4ET=s96-c', NULL, NULL, NULL, NULL, 'non', 'cedricndeffo16s@gmail.com', 0, '2021-11-16 21:11:27', '2021-11-16 12:08:18', '129.0.226.211', '0'),
(342, '4475494652571688', 'facebook', 'Louis Bruno Danou', NULL, NULL, NULL, NULL, NULL, 'non', 'louis.danou@yahoo.com', 0, '2021-11-16 12:08:19', '2021-11-16 21:08:19', NULL, '0'),
(343, '1598286417230151', 'facebook', 'Gabin Serge Gabin', NULL, NULL, NULL, NULL, NULL, 'non', '', 0, '2021-11-16 21:09:39', '2021-11-16 21:08:20', '41.202.219.247', '0'),
(344, '3123193994621083', 'facebook', 'Aoudou Nganjou', NULL, NULL, NULL, NULL, NULL, 'non', '', 0, '2021-11-16 21:08:24', '2021-11-16 21:08:21', '41.202.219.242', '0'),
(345, '407663607490313', 'facebook', 'Chi Ignatius Bernard', NULL, NULL, NULL, NULL, NULL, 'non', '', 0, '2021-11-16 21:08:25', '2021-11-16 21:08:23', '129.0.76.30', '0'),
(346, '298184308977147', 'facebook', 'Juan Miguel Ek', NULL, NULL, NULL, NULL, NULL, 'non', 'jekpwa@gmail.com', 0, '2021-11-16 21:12:30', '2021-11-16 21:08:24', '129.0.209.216', '0'),
(347, '4471680569576783', 'facebook', 'Yogoua Brice Herve Yimga', NULL, NULL, NULL, NULL, NULL, 'non', 'yogouabrice@yahoo.fr', 0, '2021-11-16 21:14:18', '2021-11-16 21:08:24', '41.202.207.11', '0'),
(348, '10158080779896384', 'facebook', 'Thierry Kouanou', NULL, NULL, NULL, NULL, NULL, 'non', 'thierrykouanou10@yahoo.fr', 0, '2021-11-16 21:09:37', '2021-11-16 21:08:24', '41.202.219.73', '0'),
(349, '1930090773845112', 'facebook', 'Herman Mougoue', NULL, NULL, NULL, NULL, NULL, 'non', 'herman.mougoue@yahoo.fr', 0, '2021-11-16 21:09:54', '2021-11-16 21:08:26', '154.72.150.241', '0'),
(350, '4470340126398646', 'facebook', 'Hugo De Madrid Toga', NULL, NULL, NULL, NULL, NULL, 'non', 'togatallaboris@yahoo.fr', 0, '2021-11-16 21:09:47', '2021-11-16 21:08:28', '41.202.207.14', '0'),
(351, '1116300695788358', 'facebook', 'Colbert Njanpou Nankap', NULL, NULL, NULL, NULL, NULL, 'non', '', 0, '2021-11-16 21:11:48', '2021-11-16 21:08:28', '41.202.207.5', '0'),
(352, '1861851420685629', 'facebook', 'Laure Konchipe', NULL, NULL, NULL, NULL, NULL, 'non', 'laurekonchipe40@gmail.com', 0, '2021-11-16 21:08:35', '2021-11-16 21:08:34', '129.0.76.240', '0'),
(353, '3116776155307797', 'facebook', 'Nah Femy', NULL, NULL, NULL, NULL, NULL, 'non', '', 0, '2021-11-16 21:52:36', '2021-11-16 21:08:42', '41.202.207.129', '0'),
(354, '3057468567802150', 'facebook', 'Christian Wandji', NULL, NULL, NULL, NULL, NULL, 'non', 'wandjichristian97@yahoo.com', 0, '2021-11-16 21:10:26', '2021-11-16 21:08:44', '41.202.207.13', '0'),
(355, '236519825215399', 'facebook', 'Styve Ariel', NULL, NULL, NULL, NULL, NULL, 'non', 'arielstyvekamlakengne@gmail.com', 0, '2021-11-16 21:10:14', '2021-11-16 21:08:51', '41.202.207.9', '0'),
(356, '102893792677682533101', 'google', 'Raissa Kamwouo', 'https://lh3.googleusercontent.com/a/AATXAJwUSiHeSYP5IArHEPJcljEnZA5jTsAUxW5m4JqW=s96-c', NULL, NULL, NULL, NULL, 'non', 'rkamwouo@gmail.com', 0, '2021-11-16 21:12:49', '2021-11-16 12:09:00', '129.0.76.133', '0'),
(357, '2202574559895425', 'facebook', 'Franky Kemdem', NULL, NULL, NULL, NULL, NULL, 'non', 'qxr29370@pisls.com', 0, '2021-11-16 21:09:08', '2021-11-16 21:09:03', '41.202.207.14', '0'),
(358, '4639732262772829', 'facebook', 'Joel Nzoumba', NULL, NULL, NULL, NULL, NULL, 'non', 'joelnzoumba@yahoo.fr', 0, '2021-11-16 21:09:05', '2021-11-16 21:09:03', '41.202.219.244', '0'),
(359, '1246756602497808', 'facebook', 'Vidrique Wamba', NULL, NULL, NULL, NULL, NULL, 'non', '', 0, '2021-11-16 21:11:44', '2021-11-16 21:09:03', '41.202.207.3', '0'),
(360, '4608103422584938', 'facebook', 'Thibaut Teutu', NULL, NULL, NULL, NULL, NULL, 'non', 'thibautdeparis@yahoo.fr', 0, '2021-11-16 21:11:46', '2021-11-16 21:09:05', '154.70.108.90', '0'),
(361, '1556613384683492', 'facebook', 'William Bilong', NULL, NULL, NULL, NULL, NULL, 'non', '', 0, '2021-11-16 21:10:23', '2021-11-16 21:09:06', '41.202.207.6', '0'),
(362, '432249071843815', 'facebook', 'ZÃ¸ldÅr Ã˜ffÄ¯cÃ¯Ä™l', NULL, NULL, NULL, NULL, NULL, 'non', '', 0, '2021-11-16 21:14:04', '2021-11-16 21:09:07', '41.202.219.73', '0'),
(363, '2739824616322223', 'facebook', 'HÃ©lÃ¨ne RaÃ¯ssa Ngo Bodiong', NULL, NULL, NULL, NULL, NULL, 'non', 'bohera94@yahoo.fr', 0, '2021-11-16 21:10:13', '2021-11-16 21:09:18', '102.244.73.65', '0'),
(364, '435020651472388', 'facebook', 'Simeon Ibrahimovic', NULL, NULL, NULL, NULL, NULL, 'non', '', 0, '2021-11-16 21:10:52', '2021-11-16 21:09:20', '129.0.205.219', '0'),
(365, '10220131235215780', 'facebook', 'Moise Bertrand Yando', NULL, NULL, NULL, NULL, NULL, 'non', 'moisebertrand@yahoo.fr', 0, '2021-11-17 12:25:52', '2021-11-16 21:09:28', '129.0.226.242', '0'),
(366, '102943098325062461169', 'google', 'David Nzie Nzie', 'https://lh3.googleusercontent.com/a/AATXAJx_tr1q66w9aJLrkz7y9lAxn3RcfTcfZ_c7ZwJo=s96-c', NULL, NULL, NULL, NULL, 'non', 'davidnzienzie@gmail.com', 0, '2021-11-16 21:13:39', '2021-11-16 12:09:33', '41.202.207.12', '0'),
(367, '1311318722641307', 'facebook', 'Jean Maina', NULL, NULL, NULL, NULL, NULL, 'non', '', 0, '2021-11-16 21:11:54', '2021-11-16 21:09:37', '102.244.73.88', '0'),
(368, '113388874770682826009', 'google', 'NGONG JERVIS', 'https://lh3.googleusercontent.com/a-/AOh14GiwG8PadA7NjUQdgDuNlNDSebp13X65gMYAs-ff=s96-c', NULL, NULL, NULL, NULL, 'non', '653jervisngong@gmail.com', 0, '2021-11-16 12:09:38', '2021-11-16 12:09:38', NULL, '0'),
(369, '1998666586963822', 'facebook', 'Viany Fofoue', NULL, NULL, NULL, NULL, NULL, 'non', 'fofouezva@gmail.com', 0, '2021-11-16 21:14:06', '2021-11-16 21:09:38', '129.0.99.30', '0'),
(370, '5350044361679100', 'facebook', 'Kandy Zenly', NULL, NULL, NULL, NULL, NULL, 'non', 'magazinezinzin@gmail.com', 0, '2021-11-16 21:12:35', '2021-11-16 21:09:45', '41.202.219.64', '0'),
(371, '3088113641432851', 'facebook', 'Franklin Ning', NULL, NULL, NULL, NULL, NULL, 'non', 'ningf@yahoo.fr', 0, '2021-11-16 21:12:24', '2021-11-16 21:09:47', '129.0.99.231', '0'),
(372, '113978734906592360151', 'google', 'Cyrille Brice Kemta', 'https://lh3.googleusercontent.com/a/AATXAJwdU54ZvypH8ANlmN8wnv_NQ5KlG_p3S6nqKQI=s96-c', NULL, NULL, NULL, NULL, 'non', 'kemtacyrillebrice@gmail.com', 0, '2021-11-16 21:13:51', '2021-11-16 12:09:48', '41.202.207.11', '0'),
(373, '115234263637197970022', 'google', 'Jonas Waindo', 'https://lh3.googleusercontent.com/a/AATXAJyiYyCQFgHSqjp5c89W9GVIPiC1v_l086Rbs1xK=s96-c', NULL, NULL, NULL, NULL, 'non', 'waindoj@gmail.com', 0, '2021-11-16 21:11:43', '2021-11-16 12:09:51', '129.0.210.248', '0'),
(374, '109414616169643370072', 'google', 'Marco Dica', 'https://lh3.googleusercontent.com/a/AATXAJyf8Qk1mnrdlPwfjcibWmth6bXOIyqu4NEHNMUh=s96-c', NULL, NULL, NULL, NULL, 'non', 'dicamarco9@gmail.com', 0, '2021-11-16 21:11:54', '2021-11-16 12:09:53', '102.244.74.154', '0'),
(375, '1572729139740616', 'facebook', 'Emmanuel Nounous', NULL, NULL, NULL, NULL, NULL, 'non', '', 0, '2021-11-16 21:20:09', '2021-11-16 21:09:58', '41.202.207.13', '0'),
(376, '1309174616184158', 'facebook', 'Francis Tchatchoua', NULL, NULL, NULL, NULL, NULL, 'non', 'francischatchouang@gmail.com', 0, '2021-11-16 21:10:58', '2021-11-16 21:09:59', '41.202.219.67', '0'),
(377, '116563212583597883117', 'google', 'ledon etoundi', 'https://lh3.googleusercontent.com/a/AATXAJz8PgERxqq4G8hNF681BcYbRRqICh9IQFypTXzO=s96-c', NULL, NULL, NULL, NULL, 'non', 'letoundi09@gmail.com', 0, '2021-11-16 21:11:34', '2021-11-16 12:10:00', '129.0.76.181', '0'),
(378, '100600177676211304256', 'google', 'Yannick Momo', 'https://lh3.googleusercontent.com/a/AATXAJyLON_qnHDM4AXr37ZOmFAJTbv1NZrQNmsgN8eo=s96-c', NULL, NULL, NULL, NULL, 'non', 'yannickmomo94@gmail.com', 0, '2021-11-16 21:13:59', '2021-11-16 12:10:06', '129.0.99.202', '0'),
(379, '282448373743220', 'facebook', 'Davido Laflamme De Jesus', NULL, NULL, NULL, NULL, NULL, 'non', '', 0, '2021-11-16 21:11:40', '2021-11-16 21:10:09', '41.202.219.74', '0'),
(380, '10217179786201452', 'facebook', 'Browny Kaleb Mendimi', NULL, NULL, NULL, NULL, NULL, 'non', 'browny_kaleb@yahoo.fr', 0, '2021-11-16 21:11:04', '2021-11-16 21:10:10', '41.202.207.3', '0'),
(381, '101550602216461546488', 'google', 'King Musculator', 'https://lh3.googleusercontent.com/a-/AOh14Gi3eAzcVsQj2c12ziPUZxfO5jGiKZtuiEFlUOai=s96-c', NULL, NULL, NULL, NULL, 'non', 'monumentvital@gmail.com', 0, '2021-11-16 21:11:08', '2021-11-16 12:10:13', '41.202.219.245', '0'),
(382, '2108692435965037', 'facebook', 'DÄ“sÃ¸rmÃ¤Ä¯s Ã‡Ã¸mmissÃ£Ã¯re', NULL, NULL, NULL, NULL, NULL, 'non', 'kanastephane95@yahoo.fr', 0, '2021-11-16 21:11:39', '2021-11-16 21:10:14', '129.0.99.187', '0'),
(383, '115261316974735270721', 'google', 'Arsene Nkotto', 'https://lh3.googleusercontent.com/a/AATXAJwGH086-LDsv9TN_c9cfZ7bftwnFY4yILs9BkN0=s96-c', NULL, NULL, NULL, NULL, 'non', 'nkottoarsene@gmail.com', 0, '2021-11-16 21:12:13', '2021-11-16 12:10:17', '154.70.108.90', '0'),
(384, '3772018196356524', 'facebook', 'Lionel Mofor', NULL, NULL, NULL, NULL, NULL, 'non', 'lionelmofor@gmail.com', 0, '2021-11-18 20:31:08', '2021-11-16 21:10:19', '129.0.99.214', '0'),
(385, '4857917874253269', 'facebook', 'Etienne Tresor', NULL, NULL, NULL, NULL, NULL, 'non', 'williamtresor@yahoo.fr', 0, '2021-11-16 21:10:22', '2021-11-16 21:10:22', '41.202.219.66', '0'),
(386, '4539721192748130', 'facebook', 'Archange Mouafo', NULL, NULL, NULL, NULL, NULL, 'non', 'mouafoarchange@yahoo.fr', 0, '2021-11-16 21:10:30', '2021-11-16 21:10:29', '41.202.219.77', '0'),
(387, '1404597036622788', 'facebook', 'Fabrice Lando', NULL, NULL, NULL, NULL, NULL, 'non', '', 0, '2021-11-16 21:15:54', '2021-11-16 21:10:39', '129.0.213.213', '0'),
(388, '427172532253872', 'facebook', 'RamsÃ¨s El Campero', NULL, NULL, NULL, NULL, NULL, 'non', '', 0, '2021-11-16 21:12:29', '2021-11-16 21:10:44', '129.0.205.177', '0'),
(389, '395813095617369', 'facebook', 'Falonne Tchakam', NULL, NULL, NULL, NULL, NULL, 'non', '', 0, '2021-11-16 21:12:38', '2021-11-16 21:10:57', '129.0.204.220', '0'),
(390, '369533271609294', 'facebook', 'Fabrice Tchepounou', NULL, NULL, NULL, NULL, NULL, 'non', '', 0, '2021-11-16 21:18:34', '2021-11-16 21:11:04', '41.202.219.77', '0'),
(391, '391949342676224', 'facebook', 'Serge Alain Ewoudou', NULL, NULL, NULL, NULL, NULL, 'non', '', 0, '2021-11-16 21:12:32', '2021-11-16 21:11:04', '154.72.171.203', '0'),
(392, '2181859551989487', 'facebook', 'Victoire Dim', NULL, NULL, NULL, NULL, NULL, 'non', 'victoiredim@yahoo.fr', 0, '2021-11-16 21:11:08', '2021-11-16 21:11:07', '41.202.219.74', '0'),
(393, '4706963235990961', 'facebook', 'Fac Mbilleur', NULL, NULL, NULL, NULL, NULL, 'non', 'aimeconstant1@yahoo.fr', 0, '2021-11-16 21:11:13', '2021-11-16 21:11:13', '41.202.219.76', '0'),
(394, '1337059566732061', 'facebook', 'Franklin Fotso', NULL, NULL, NULL, NULL, NULL, 'non', '', 0, '2021-11-16 21:11:25', '2021-11-16 21:11:14', '129.0.205.82', '0'),
(395, '1379745485818078', 'facebook', 'Kennedy Piata', NULL, NULL, NULL, NULL, NULL, 'non', '', 0, '2021-11-16 21:13:14', '2021-11-16 21:11:34', '41.202.219.247', '0'),
(396, '914523412782202', 'facebook', 'Ledon Lemana', NULL, NULL, NULL, NULL, NULL, 'non', '', 0, '2021-11-16 21:13:15', '2021-11-16 21:11:35', '129.0.76.181', '0'),
(397, '10217576589880979', 'facebook', 'Serge Ndeges', NULL, NULL, NULL, NULL, NULL, 'non', 'sndeges@yahoo.fr', 0, '2021-11-16 21:11:47', '2021-11-16 21:11:46', '129.0.76.248', '0'),
(398, '124323660031554', 'facebook', 'Christ Koudji', NULL, NULL, NULL, NULL, NULL, 'non', '', 0, '2021-11-16 21:12:02', '2021-11-16 21:12:02', '41.202.219.246', '0'),
(399, '1241888866316489', 'facebook', 'Flaubert Le Grand Nokize', NULL, NULL, NULL, NULL, NULL, 'non', 'pythagorelegrand@gmail.com', 0, '2021-11-16 21:15:58', '2021-11-16 21:12:04', '41.202.219.75', '0'),
(400, '425977159119839', 'facebook', 'BlÃ«u DaÃ¯mÅn', NULL, NULL, NULL, NULL, NULL, 'non', 'tsopbengernest@gmail.com', 0, '2021-11-16 21:15:16', '2021-11-16 21:12:20', '41.202.219.245', '0'),
(401, '1334773976956741', 'facebook', 'Billa Bertrand Em', NULL, NULL, NULL, NULL, NULL, 'non', 'billabertrand00@gmail.com', 0, '2021-11-16 21:43:27', '2021-11-16 21:12:25', '41.244.240.209', '0'),
(402, '217808767141472', 'facebook', 'Cabrel Colince Kim', NULL, NULL, NULL, NULL, NULL, 'non', '', 0, '2021-11-16 21:13:54', '2021-11-16 21:12:25', '41.202.207.13', '0'),
(403, '101281045551086186823', 'google', 'Paul Douandji', 'https://lh3.googleusercontent.com/a/AATXAJzT_KL_KKAHSYmpxKaNlJC8aW8RHHTBDCOLysOl=s96-c', NULL, NULL, NULL, NULL, 'non', 'douandjipaul@gmail.com', 0, '2021-11-16 21:14:46', '2021-11-16 12:12:28', '41.202.219.254', '0'),
(404, '103832516155866519114', 'google', 'les baos premier', 'https://lh3.googleusercontent.com/a/AATXAJzUC055lhZ2ft_xokkEn7I4ozOrPHuNBoK2eoGX=s96-c', NULL, NULL, NULL, NULL, 'non', 'kamgosomo@gmail.com', 0, '2021-11-16 21:16:02', '2021-11-16 12:12:33', '41.202.219.79', '0'),
(405, '631310747880105', 'facebook', 'Ibrahim Cherif', NULL, NULL, NULL, NULL, NULL, 'non', 'rinndourachida@gmail.com', 0, '2021-11-16 21:18:30', '2021-11-16 21:12:38', '129.0.99.163', '0'),
(406, '1512385552478585', 'facebook', 'Joelle Kuate', NULL, NULL, NULL, NULL, NULL, 'non', 'joellekuate2016@gmail.com', 0, '2021-11-16 21:17:20', '2021-11-16 21:12:42', '41.202.219.73', '0'),
(407, '354892816392492', 'facebook', 'Martial Menyeng', NULL, NULL, NULL, NULL, NULL, 'non', 'guymenyeng04@gmail.com', 0, '2021-11-16 21:13:16', '2021-11-16 21:12:46', '41.202.207.15', '0'),
(408, '414604927032621', 'facebook', 'Daniel Siad', NULL, NULL, NULL, NULL, NULL, 'non', 'siaddaniel7@gmail.com', 0, '2021-11-16 22:23:10', '2021-11-16 21:12:47', '129.0.205.120', '0'),
(409, '133530512368655', 'facebook', 'FrÃ¨d Bitomo', NULL, NULL, NULL, NULL, NULL, 'non', '', 0, '2021-11-21 22:22:23', '2021-11-16 21:13:04', '129.0.205.187', '0'),
(410, '1231943220550300', 'facebook', 'Michelle Nomba', NULL, NULL, NULL, NULL, NULL, 'non', '', 0, '2021-11-16 21:16:08', '2021-11-16 21:13:11', '129.0.233.6', '0'),
(411, '695305805189764', 'facebook', 'Serge Ghislin', NULL, NULL, NULL, NULL, NULL, 'non', '', 0, '2021-11-16 21:41:37', '2021-11-16 21:13:24', '129.0.226.138', '0'),
(412, '112084659770280491325', 'google', 'Johnas Lambi', 'https://lh3.googleusercontent.com/a/AATXAJwjsleN7sZQNfI_GQHh3xZK-jZ7S0VrLsyBlNi3=s96-c', NULL, NULL, NULL, NULL, 'non', 'l91111540@gmail.com', 0, '2021-11-16 21:13:49', '2021-11-16 12:13:43', '129.0.205.120', '0'),
(413, '612535819882512', 'facebook', 'Choco FrÃ«nzy', NULL, NULL, NULL, NULL, NULL, 'non', '', 0, '2021-11-16 21:15:34', '2021-11-16 21:13:47', '41.202.219.66', '0'),
(414, '2705428346420161', 'facebook', 'Richard Atah', NULL, NULL, NULL, NULL, NULL, 'non', '', 0, '2021-11-16 21:16:31', '2021-11-16 21:13:54', '41.202.207.134', '0'),
(415, '935922414011995', 'facebook', 'Moi Tresor', NULL, NULL, NULL, NULL, NULL, 'non', 'alex79125440@gmail.com', 0, '2021-11-16 21:16:48', '2021-11-16 21:13:58', '129.0.205.158', '0'),
(416, '1333277713759995', 'facebook', 'Jonas Wailet', NULL, NULL, NULL, NULL, NULL, 'non', '', 0, '2021-11-16 21:22:59', '2021-11-16 21:14:05', '129.0.210.248', '0'),
(417, '2073238109492765', 'facebook', 'Yvan Chrys Tch', NULL, NULL, NULL, NULL, NULL, 'non', 'yvannchoucounett@yahoo.fr', 0, '2021-11-16 21:14:09', '2021-11-16 21:14:08', '129.0.76.161', '0'),
(418, '107078077334641235881', 'google', 'Ã‰lysÃ©e Amos', 'https://lh3.googleusercontent.com/a/AATXAJwolMMwYIniR9gn8JdRfLx99K7SF1SGVOResWeB=s96-c', NULL, NULL, NULL, NULL, 'non', 'elyseeamos05@gmail.com', 0, '2021-11-16 21:25:06', '2021-11-16 12:14:29', '41.202.219.79', '0'),
(419, '393360755802334', 'facebook', 'Uriel Florent Ekongolo', NULL, NULL, NULL, NULL, NULL, 'non', '', 0, '2021-11-16 21:15:38', '2021-11-16 21:14:46', '41.202.207.15', '0'),
(420, '103504725704700562109', 'google', 'Guevin Tsopmeza', 'https://lh3.googleusercontent.com/a/AATXAJwXOMxrWRyE7h5Wmbw3BYf096hIaJH0SHwwVYiQ=s96-c', NULL, NULL, NULL, NULL, 'non', 'tsopmezaguevin@gmail.com', 0, '2021-11-16 21:24:57', '2021-11-16 12:14:53', '41.202.207.13', '0'),
(421, '150451720640285', 'facebook', 'Frederic Nonga', NULL, NULL, NULL, NULL, NULL, 'non', '', 0, '2021-11-16 12:14:58', '2021-11-16 21:14:58', NULL, '0'),
(422, '109031864933598', 'facebook', 'Colbert Njams', NULL, NULL, NULL, NULL, NULL, 'non', '', 0, '2021-11-19 10:12:48', '2021-11-16 21:15:08', '41.202.207.16', '0'),
(423, '113944536862946638313', 'google', 'Mabelle Nkeundo', 'https://lh3.googleusercontent.com/a/AATXAJygpizBaXD1BvY6KDFpOzoY8ysJFGm5Hv824_ZN=s96-c', NULL, NULL, NULL, NULL, 'non', 'suzannenkeundo@gmail.com', 0, '2021-11-16 21:15:23', '2021-11-16 12:15:23', '129.0.76.69', '0'),
(424, '144299567933922', 'facebook', 'RÃ©becca Seynath', NULL, NULL, NULL, NULL, NULL, 'non', '', 0, '2021-11-16 21:17:10', '2021-11-16 21:16:00', '41.202.207.152', '0'),
(425, '117167558583407385780', 'google', 'FrÃ©dÃ©ric Nonga', 'https://lh3.googleusercontent.com/a/AATXAJz1NEep9G9vcTWrvfSy1S4f1f0sXKISTaEPJjKf=s96-c', NULL, NULL, NULL, NULL, 'non', 'fredericnonga925@gmail.com', 0, '2021-11-16 21:21:08', '2021-11-16 12:16:07', '154.70.108.90', '0'),
(426, '413651553571952', 'facebook', 'Roger Emanda Otele', NULL, NULL, NULL, NULL, NULL, 'non', '', 0, '2021-11-16 21:16:58', '2021-11-16 21:16:22', '129.0.226.171', '0'),
(427, '2076783179152388', 'facebook', 'Rodolphe Mbakeu', NULL, NULL, NULL, NULL, NULL, 'non', '', 0, '2021-11-16 21:17:01', '2021-11-16 21:17:00', '41.202.207.11', '0'),
(428, '118199910845032432207', 'google', 'Doubla Madi', 'https://lh3.googleusercontent.com/a/AATXAJxD6T2ZwCzhw5O0a4qqToU5n35nCOdldQO4in8n=s96-c', NULL, NULL, NULL, NULL, 'non', 'doublamadi83@gmail.com', 0, '2021-11-16 21:21:10', '2021-11-16 12:17:02', '129.0.231.7', '0'),
(429, '4849460858439077', 'facebook', 'Beltus Ronhi Tapamo', NULL, NULL, NULL, NULL, NULL, 'non', 'francklove79@yahoo.fr', 0, '2021-11-16 21:18:40', '2021-11-16 21:17:08', '154.72.167.149', '0'),
(430, '106716409021936113315', 'google', 'NKAFU Cliffort', 'https://lh3.googleusercontent.com/a-/AOh14GigAbU3A801A16TnHsdo_bZ03jqJWCNj3rVXn57vw=s96-c', NULL, NULL, NULL, NULL, 'non', 'nkafucliffort@gmail.com', 0, '2021-11-16 21:19:48', '2021-11-16 12:17:21', '129.0.76.45', '0'),
(431, '1453759881686344', 'facebook', 'Johnas Lambi', NULL, NULL, NULL, NULL, NULL, 'non', '', 0, '2021-11-16 21:20:23', '2021-11-16 21:17:56', '129.0.205.120', '0'),
(432, '458053602317632', 'facebook', 'Landry Noahasso', NULL, NULL, NULL, NULL, NULL, 'non', 'landrynoah72@gmail.com', 0, '2021-11-16 21:26:47', '2021-11-16 21:18:04', '129.0.226.152', '0'),
(433, '591333402134568', 'facebook', 'Chantal Mekouo', NULL, NULL, NULL, NULL, NULL, 'non', '', 0, '2021-11-16 21:21:48', '2021-11-16 21:18:26', '129.0.103.2', '0'),
(434, '606524653882201', 'facebook', 'Basile Jeanno', NULL, NULL, NULL, NULL, NULL, 'non', '', 0, '2021-11-16 22:37:51', '2021-11-16 21:19:41', '41.202.219.78', '0'),
(435, '991233881460149', 'facebook', 'KhÃ¥lÃ®fÃ¥ Ta PÃ¸Ã¼pÃ©e', NULL, NULL, NULL, NULL, NULL, 'non', 'kylamalickha@gmail.com', 0, '2021-11-16 21:21:33', '2021-11-16 21:20:15', '41.202.219.69', '0'),
(436, '2074060456092154', 'facebook', 'Root Charles GÃ ezer', NULL, NULL, NULL, NULL, NULL, 'non', 'kevinmo@solidarityworld.org', 0, '2021-11-16 21:21:36', '2021-11-16 21:20:45', '41.202.219.67', '0'),
(437, '103885924400691230396', 'google', 'CrÃ©pin Nhebek', 'https://lh3.googleusercontent.com/a/AATXAJw3uUj22qjt2kQSmU4jvwA_UuiOgkQg3uqOYGaZ=s96-c', NULL, NULL, NULL, NULL, 'non', 'nhebekcrepin@gmail.com', 0, '2021-11-16 21:21:34', '2021-11-16 12:20:46', '129.0.83.227', '0'),
(438, '1312474845878074', 'facebook', 'KÃ­ff Lp', NULL, NULL, NULL, NULL, NULL, 'non', '', 0, '2021-11-16 21:24:42', '2021-11-16 21:21:02', '129.0.99.198', '0'),
(439, '1253668175108603', 'facebook', 'Marie Tolane', NULL, NULL, NULL, NULL, NULL, 'non', '', 0, '2021-11-16 21:21:05', '2021-11-16 21:21:03', '41.244.225.181', '0'),
(440, '101193728473600002739', 'google', 'Roy Tchana Yankeu', 'https://lh3.googleusercontent.com/a/AATXAJyf-qHvlkJdjpCc4jOGPTaRjdWJk6J_Reaa4wZ0=s96-c', NULL, NULL, NULL, NULL, 'non', 'ytroymista2@gmail.com', 0, '2021-11-16 21:23:45', '2021-11-16 12:21:25', '41.202.207.2', '0'),
(441, '424806719213855', 'facebook', 'Arlan Tiokeng', NULL, NULL, NULL, NULL, NULL, 'non', 'arlanmboho@gmail.com', 0, '2021-11-26 19:02:01', '2021-11-16 21:21:25', '129.0.80.100', '0'),
(442, '4365776573533794', 'facebook', 'Mikel Fonyam', NULL, NULL, NULL, NULL, NULL, 'non', 'michealfonyam@yahoo.com', 0, '2021-11-16 21:23:11', '2021-11-16 21:21:43', '129.0.76.210', '0'),
(443, '4399532273476686', 'facebook', 'Christian Stephano Fankem', NULL, NULL, NULL, NULL, NULL, 'non', 'kefacs74020411@gmail.com', 0, '2021-11-16 21:27:27', '2021-11-16 21:22:19', '41.202.207.1', '0'),
(444, '108876618259251992204', 'google', 'Gautier Dang', 'https://lh3.googleusercontent.com/a/AATXAJwJBo_NfIGK1dvHQ7PP8x2LaerYgvMFcyQBolZg=s96-c', NULL, NULL, NULL, NULL, 'non', 'gautierdang22@gmail.com', 0, '2021-11-16 21:25:08', '2021-11-16 12:22:21', '41.202.207.3', '0'),
(445, '1409320689463887', 'facebook', 'Ferdinand Mono', NULL, NULL, NULL, NULL, NULL, 'non', '', 0, '2021-11-16 21:56:39', '2021-11-16 21:23:22', '129.0.99.135', '0'),
(446, '1057435854826826', 'facebook', 'Ayuk Desmond', NULL, NULL, NULL, NULL, NULL, 'non', '', 0, '2021-11-16 21:24:47', '2021-11-16 21:23:25', '129.0.79.114', '0'),
(447, '420125533056303', 'facebook', 'Rodrigue Tagne', NULL, NULL, NULL, NULL, NULL, 'non', '', 0, '2021-11-16 21:24:24', '2021-11-16 21:23:47', '41.202.219.246', '0'),
(448, '111490284185197254794', 'google', 'Rodrigue Segue', 'https://lh3.googleusercontent.com/a/AATXAJxiimpfkk9_pVRJRaH8trAXomjMOyJOeZTF0xx6=s96-c', NULL, NULL, NULL, NULL, 'non', 'rodriguesegue47@gmail.com', 0, '2021-11-16 21:24:27', '2021-11-16 12:24:24', '129.0.205.233', '0'),
(449, '4507004332752321', 'facebook', 'Brice Medjial', NULL, NULL, NULL, NULL, NULL, 'non', 'bricemedjialeu@yahoo.fr', 0, '2021-11-16 21:25:57', '2021-11-16 21:24:27', '129.0.76.191', '0'),
(450, '105292727768289985999', 'google', 'Bossadieke Francoise', 'https://lh3.googleusercontent.com/a/AATXAJznbO-kpsbUvmK4RxXAHMUyARxyFi-8B98y0Bk=s96-c', NULL, NULL, NULL, NULL, 'non', 'bossadiekefrancoise@gmail.com', 0, '2021-11-16 21:32:10', '2021-11-16 12:25:30', '41.202.219.75', '0'),
(451, '148609367497102', 'facebook', 'Lee Fort Babouin', NULL, NULL, NULL, NULL, NULL, 'non', '', 0, '2021-11-16 21:37:56', '2021-11-16 21:26:33', '129.0.226.24', '0'),
(452, '4626511127462019', 'facebook', 'Stephane Raoul Silatchom', NULL, NULL, NULL, NULL, NULL, 'non', 'fotso.falone@yahoo.fr', 0, '2021-11-16 21:28:14', '2021-11-16 21:28:14', '41.202.207.14', '0'),
(453, '1219755321768026', 'facebook', 'Adama Ongba', NULL, NULL, NULL, NULL, NULL, 'non', '', 0, '2021-11-16 21:30:35', '2021-11-16 21:28:26', '129.0.205.31', '0'),
(454, '430541055101771', 'facebook', 'Antoinette NadÃ¨ge', NULL, NULL, NULL, NULL, NULL, 'non', '', 0, '2021-12-02 09:20:46', '2021-11-16 21:29:25', '41.202.207.15', '0'),
(455, '10221181221064787', 'facebook', 'Ben Ekoume', NULL, NULL, NULL, NULL, NULL, 'non', 'ben_ekoume@yahoo.fr', 0, '2021-11-16 21:43:04', '2021-11-16 21:29:51', '154.72.170.126', '0'),
(456, '118036215285167023346', 'google', 'Mr. C', 'https://lh3.googleusercontent.com/a-/AOh14Gh57P41SsnXFOHw2OzaH2aN5xJ8OHrslPLyzM_pVg=s96-c', NULL, NULL, NULL, NULL, 'non', 'cabrelchrist3@gmail.com', 0, '2021-11-16 21:32:34', '2021-11-16 12:30:42', '41.244.240.191', '0'),
(457, '629778805120800', 'facebook', 'Omeres Njiki', NULL, NULL, NULL, NULL, NULL, 'non', '', 0, '2021-11-16 21:34:30', '2021-11-16 21:32:19', '129.0.76.121', '0'),
(458, '140981334939950', 'facebook', 'Giresse AimÃ©', NULL, NULL, NULL, NULL, NULL, 'non', '', 0, '2021-11-16 21:37:50', '2021-11-16 21:32:20', '129.0.205.185', '0'),
(459, '4821219954566050', 'facebook', 'Yvan-Terence Chechoi', NULL, NULL, NULL, NULL, NULL, 'non', 'yvanchechoi9@yahoo.fr', 0, '2021-11-16 21:33:05', '2021-11-16 21:33:04', '41.202.207.16', '0'),
(460, '348470687038155', 'facebook', 'Geudro Pleine', NULL, NULL, NULL, NULL, NULL, 'non', '', 0, '2021-11-16 21:37:51', '2021-11-16 21:34:00', '41.202.207.15', '0'),
(461, '605742727139614', 'facebook', 'Deutschkurs Duala', NULL, NULL, NULL, NULL, NULL, 'non', '', 0, '2021-11-16 21:36:33', '2021-11-16 21:35:55', '129.0.76.80', '0'),
(462, '1308745496262751', 'facebook', 'Achille Dacourt', NULL, NULL, NULL, NULL, NULL, 'non', '', 0, '2021-11-16 21:37:11', '2021-11-16 21:36:05', '41.202.207.130', '0'),
(463, '102510868338640472979', 'google', 'Paola Ennone', 'https://lh3.googleusercontent.com/a/AATXAJzUKmfYcemRQrgJXOgUya3ZGylmrmdbAK-1v92C=s96-c', NULL, NULL, NULL, NULL, 'non', 'paolaennone@gmail.com', 0, '2021-11-16 21:38:03', '2021-11-16 12:36:15', '129.0.80.81', '0'),
(464, '117414591447959241834', 'google', 'Mc Takus', 'https://lh3.googleusercontent.com/a/AATXAJxCeCtdYj1ZMVnoSetsT33q8jil9E9f5Gdjt-Vi=s96-c', NULL, NULL, NULL, NULL, 'non', 'mctakus82@gmail.com', 0, '2021-11-16 21:38:24', '2021-11-16 12:36:28', '41.202.207.4', '0'),
(465, '117127979897948390842', 'google', 'Dereck groove Tchana', 'https://lh3.googleusercontent.com/a/AATXAJzbqQyjF7JjZxEUkpKlyAU1NmZS1i0eRxKNVB13=s96-c', NULL, NULL, NULL, NULL, 'non', 'dereckgroove46@gmail.com', 0, '2021-11-16 21:37:56', '2021-11-16 12:37:52', '129.0.205.15', '0'),
(466, '287186419977032', 'facebook', 'Suzanne Claudine Ngahan', NULL, NULL, NULL, NULL, NULL, 'non', '', 0, '2021-11-16 21:41:05', '2021-11-16 21:39:19', '129.0.76.121', '0'),
(467, '4699914116712526', 'facebook', 'Jacques Bitolog', NULL, NULL, NULL, NULL, NULL, 'non', 'karldouceur@yahoo.fr', 0, '2021-11-16 21:43:25', '2021-11-16 21:41:59', '41.202.207.13', '0'),
(468, '292705322716790', 'facebook', 'Marie Nguetie', NULL, NULL, NULL, NULL, NULL, 'non', '', 0, '2021-11-16 21:48:46', '2021-11-16 21:43:18', '41.202.219.70', '0'),
(469, '4556797064398919', 'facebook', 'Tamoifo Guillaume', NULL, NULL, NULL, NULL, NULL, 'non', 'tamoifog@yahoo.fr', 0, '2021-11-16 21:46:59', '2021-11-16 21:44:04', '129.0.76.25', '0'),
(470, '310389210907850', 'facebook', 'Lewis Ebongue', NULL, NULL, NULL, NULL, NULL, 'non', 'lewisebongue4072@yahoo.com', 0, '2021-11-16 21:45:40', '2021-11-16 21:44:41', '41.202.207.3', '0'),
(471, '271993091607081', 'facebook', 'Dimitrie Nsr', NULL, NULL, NULL, NULL, NULL, 'non', '', 0, '2021-11-16 21:54:12', '2021-11-16 21:53:18', '129.0.204.56', '0'),
(472, '116669058117066751000', 'google', 'Roosvelt Damso', 'https://lh3.googleusercontent.com/a/AATXAJyF0tjUD3A3LSEyRKmSo0UbxXJBJpfoZdfBFnWH=s96-c', NULL, NULL, NULL, NULL, 'non', 'roosveltdamso@gmail.com', 0, '2021-11-16 21:53:59', '2021-11-16 12:53:58', '41.244.240.230', '0'),
(473, '104251549411459148217', 'google', 'Lady Dine', 'https://lh3.googleusercontent.com/a/AATXAJwP2hcA6R8aSsttG86oXj8ObMURD3aPB-ijkEnM=s96-c', NULL, NULL, NULL, NULL, 'non', 'dinelady5@gmail.com', 0, '2021-11-16 21:57:45', '2021-11-16 12:56:46', '41.202.207.15', '0'),
(474, '2093095264188190', 'facebook', 'Marceline Njamo', NULL, NULL, NULL, NULL, NULL, 'non', 'njamomarceline@yahoo.fr', 0, '2021-11-16 22:04:47', '2021-11-16 22:03:31', '41.202.219.79', '0'),
(475, '621511892534441', 'facebook', 'Koulibali Djousse Kenne Steve', NULL, NULL, NULL, NULL, NULL, 'non', '', 0, '2021-11-16 13:05:37', '2021-11-16 22:05:37', NULL, '0'),
(476, '103072494323556332112', 'google', 'Arold Mbeukam', 'https://lh3.googleusercontent.com/a/AATXAJynMnU0vOf2LQfluF_3P-axUu7rrKBbMh25TOOa=s96-c', NULL, NULL, NULL, NULL, 'non', 'mbeukamarold@gmail.com', 0, '2021-11-16 22:12:01', '2021-11-16 13:08:10', '129.0.206.225', '0'),
(477, '608488167016116', 'facebook', 'Flaubert Nana', NULL, NULL, NULL, NULL, NULL, 'non', 'nanaflaubert7@gmail.com', 0, '2021-11-16 22:09:16', '2021-11-16 22:09:16', '41.202.207.9', '0'),
(478, '4554951857918409', 'facebook', 'Nkongho Eseme', NULL, NULL, NULL, NULL, NULL, 'non', 'esemedan@yahoo.com', 0, '2021-11-16 22:23:39', '2021-11-16 22:13:41', '129.0.76.127', '0'),
(479, '103167015542803754416', 'google', 'Marcelline Konda', 'https://lh3.googleusercontent.com/a/AATXAJzcCDMRgsX5AKUJnpc1hakDQvL3fP7nRGp_rXzf=s96-c', NULL, NULL, NULL, NULL, 'non', 'marcellinekonda@gmail.com', 0, '2021-11-16 22:15:33', '2021-11-16 13:15:31', '102.244.75.64', '0'),
(480, '106117322413803423607', 'google', 'Pierre Abeeb', 'https://lh3.googleusercontent.com/a/AATXAJzhr6_t7qfAgrrKWUBbTiI0XK5JWx4ymr42b3Ew=s96-c', NULL, NULL, NULL, NULL, 'non', 'pierreabeeb86@gmail.com', 0, '2021-11-16 22:26:10', '2021-11-16 13:21:14', '129.0.205.246', '0'),
(481, '422932306090766', 'facebook', 'Olivier Jean Yoyi', NULL, NULL, NULL, NULL, NULL, 'non', '', 0, '2021-11-16 22:34:22', '2021-11-16 22:30:12', '41.202.207.12', '0'),
(482, '106008394074627769860', 'google', 'odilon lasky', 'https://lh3.googleusercontent.com/a-/AOh14GgElI1VFlePI3WDfUjRV-7VwwLUktSrrmzpwGSW=s96-c', NULL, NULL, NULL, NULL, 'non', 'odilonlasky@gmail.com', 0, '2021-12-02 16:36:08', '2021-11-16 13:53:28', '41.202.219.161', '0'),
(483, '109784241525214', 'facebook', 'Force Nk', NULL, NULL, NULL, NULL, NULL, 'non', '', 0, '2021-11-17 05:19:42', '2021-11-17 05:17:27', '41.202.219.245', '0'),
(484, '1021390268443432', 'facebook', 'Biamif Bata', NULL, NULL, NULL, NULL, NULL, 'non', 'francisbata134@gmail.com', 0, '2021-11-17 18:35:17', '2021-11-17 05:54:24', '129.0.81.246', '0'),
(485, '662340488506130', 'facebook', 'James Smitte', NULL, NULL, NULL, NULL, NULL, 'non', 'auguindini@gmail.com', 0, '2021-11-17 06:26:27', '2021-11-17 06:24:40', '41.202.219.70', '0'),
(486, '4394544527266507', 'facebook', 'Fear Ndifor Base', NULL, NULL, NULL, NULL, NULL, 'non', 'ndifor.ronald@yahoo.com', 0, '2021-11-17 12:34:55', '2021-11-17 12:33:55', '129.0.205.5', '0'),
(487, '104377684147136016888', 'google', 'Anayiza rovine Sonwa tchoffo', 'https://lh3.googleusercontent.com/a/AATXAJxUbnlBkn_Ww0C9nbhpZ1WURp7VCF7rEShnx3Im=s96-c', NULL, NULL, NULL, NULL, 'non', 'anayizarovine@gmail.com', 0, '2021-11-17 19:24:20', '2021-11-17 10:24:18', '129.0.76.108', '0'),
(488, '104413855717142915119', 'google', 'FrÃ©dÃ©ric Kouga', 'https://lh3.googleusercontent.com/a/AATXAJwZlpXzevzbBP8QUGISi7yCUSMmM6mV3wET_d-P=s96-c', NULL, NULL, NULL, NULL, 'non', 'frederickouga@gmail.com', 0, '2021-11-18 09:25:20', '2021-11-18 00:23:45', '129.0.231.2', '0'),
(489, '1505341619850118', 'facebook', 'Pemahbu Ulritcho', NULL, NULL, NULL, NULL, NULL, 'non', 'pemahbulritcho@gmail.com', 0, '2022-01-03 08:23:46', '2021-11-18 12:17:30', '129.0.205.101', '0'),
(490, '2996085360642444', 'facebook', 'Jojo Ndan Ga', NULL, NULL, NULL, NULL, NULL, 'non', 'teyomnou197@yahoo.fr', 0, '2021-11-18 22:21:00', '2021-11-18 22:20:07', '129.0.205.230', '0'),
(491, '3580700702156292', 'facebook', 'Vanold Cingue', NULL, NULL, NULL, NULL, NULL, 'non', 'vanoldcingue@gmail.com', 0, '2021-11-28 20:05:13', '2021-11-28 20:03:56', '102.244.178.93', '0'),
(492, '598634411194472', 'facebook', 'Thierry Paho', NULL, NULL, NULL, NULL, NULL, 'non', '', 0, '2021-11-30 15:49:36', '2021-11-30 15:42:40', '129.0.205.72', '0'),
(493, '591347215465789', 'facebook', 'Eder Nani', NULL, NULL, NULL, NULL, NULL, 'non', '', 0, '2021-12-01 09:02:38', '2021-12-01 08:57:46', '41.202.219.72', '0'),
(494, '615090376357370', 'facebook', 'Moni Robi', NULL, NULL, NULL, NULL, NULL, 'non', '', 0, '2021-12-02 09:14:02', '2021-12-02 09:10:34', '129.0.99.158', '0'),
(495, '3140155122973239', 'facebook', 'Adele Marcelle Biyaga', NULL, NULL, NULL, NULL, NULL, 'non', '', 0, '2021-12-02 10:01:08', '2021-12-02 09:36:10', '129.0.99.217', '0'),
(496, '638832387296808', 'facebook', 'Germain Le Parigo Kokeu', NULL, NULL, NULL, NULL, NULL, 'non', '', 0, '2021-12-03 14:11:52', '2021-12-03 14:10:30', '196.202.236.195', '0'),
(497, '418128656423785', 'facebook', 'Ã˜ffÄ«Ã§Ã®Ã©r DÃ« LÃ  SÃ¥p', NULL, NULL, NULL, NULL, NULL, 'non', '', 0, '2021-12-03 19:43:43', '2021-12-03 19:40:36', '41.202.219.79', '0');
INSERT INTO `utilisateurs` (`id`, `oauth_uid`, `oauth_provider`, `nom`, `picture_url`, `genre`, `date_naissance`, `numero`, `code`, `num_ok`, `email`, `mode_prono`, `last_login`, `creation_date`, `last_ip`, `banned`) VALUES
(498, '100924199112547', 'facebook', 'HervÃ© HervÃ©', NULL, NULL, NULL, NULL, NULL, 'non', '', 0, '2021-12-27 20:02:04', '2021-12-04 06:23:40', '129.0.205.238', '0'),
(499, '449890146754536', 'facebook', 'Marc Aurel Nkombo', NULL, NULL, NULL, NULL, NULL, 'non', '', 0, '2022-01-05 09:38:30', '2022-01-05 09:31:46', '129.0.125.249', '0'),
(500, '5965558886868853', 'facebook', 'Blaise Paolo Ngomo', NULL, NULL, NULL, NULL, NULL, 'non', 'ngomoemile@yahoo.fr', 0, '2022-01-05 14:13:01', '2022-01-05 14:12:15', '129.0.205.180', '0');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `admin_config`
--
ALTER TABLE `admin_config`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `ci_sessions`
--
ALTER TABLE `ci_sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ci_sessions_timestamp` (`timestamp`);

--
-- Index pour la table `competitions`
--
ALTER TABLE `competitions`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `equipes`
--
ALTER TABLE `equipes`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `notifications_fb`
--
ALTER TABLE `notifications_fb`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `pronostics`
--
ALTER TABLE `pronostics`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `prono_rc_user` (`rencontre_id`,`utilisateur_id`);

--
-- Index pour la table `rencontres`
--
ALTER TABLE `rencontres`
  ADD PRIMARY KEY (`id`),
  ADD KEY `equipe_id1` (`equipe_id1`),
  ADD KEY `equipe_id2` (`equipe_id2`);

--
-- Index pour la table `traces`
--
ALTER TABLE `traces`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `admin_config`
--
ALTER TABLE `admin_config`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `competitions`
--
ALTER TABLE `competitions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `equipes`
--
ALTER TABLE `equipes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT pour la table `notifications_fb`
--
ALTER TABLE `notifications_fb`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT pour la table `pronostics`
--
ALTER TABLE `pronostics`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT pour la table `rencontres`
--
ALTER TABLE `rencontres`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `traces`
--
ALTER TABLE `traces`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=501;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `rencontres`
--
ALTER TABLE `rencontres`
  ADD CONSTRAINT `rencontres_ibfk_1` FOREIGN KEY (`equipe_id1`) REFERENCES `equipes` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `rencontres_ibfk_3` FOREIGN KEY (`equipe_id2`) REFERENCES `equipes` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
SET FOREIGN_KEY_CHECKS=1;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
