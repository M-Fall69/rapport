-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  Dim 23 oct. 2022 à 23:44
-- Version du serveur :  8.0.18
-- Version de PHP :  7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `sges`
--

-- --------------------------------------------------------

--
-- Structure de la table `arrondissement`
--

DROP TABLE IF EXISTS `arrondissement`;
CREATE TABLE IF NOT EXISTS `arrondissement` (
  `nom_arr` varchar(50) NOT NULL,
  `description` text,
  `nom_dep` varchar(50) NOT NULL,
  `etat` tinyint(3) NOT NULL DEFAULT '-1' COMMENT '-1=soon 0=processing 1=done',
  PRIMARY KEY (`nom_arr`) USING BTREE,
  KEY `FK_arr` (`nom_dep`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `arrondissement`
--

INSERT INTO `arrondissement` (`nom_arr`, `description`, `nom_dep`, `etat`) VALUES
('Almadies', ' ', 'Dakar', -1),
('Dakar-Plateau', NULL, 'Dakar', -1),
('Grand Dakar', '  ', 'Dakar', -1),
('Guédiawaye', ' ', 'Guédiawaye', -1),
('Niayes', NULL, 'Keur Massar', -1),
('Parcelles Assainies', '', 'Dakar', -1),
('Pikine Dagoudane', '  ', 'Pikine', -1),
('Thiaroye', NULL, 'Pikine', -1),
('Rufisque Est ', ' ', 'Rufisque', -1),
('Rufisque Nord', NULL, 'Rufisque', -1),
('Rufisque Ouest', NULL, 'Rufisque', -1);

-- --------------------------------------------------------

--
-- Structure de la table `bureau`
--

DROP TABLE IF EXISTS `bureau`;
CREATE TABLE IF NOT EXISTS `bureau` (
  `nom_bureau` varchar(50) NOT NULL,
  `nombre_inscrits` int(11) NOT NULL,
  `suffrage_exprimes` int(11) NOT NULL,
  `suffrage_valables` int(11) DEFAULT '0',
  `nom_centre` varchar(50) NOT NULL,
  `etat` tinyint(3) NOT NULL DEFAULT '-1' COMMENT '-1=soon 0=processing 1=done',
  PRIMARY KEY (`nom_bureau`,`nom_centre`),
  KEY `FK_br` (`nom_centre`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `bureau`
--

INSERT INTO `bureau` (`nom_bureau`, `nombre_inscrits`, `suffrage_exprimes`, `suffrage_valables`, `nom_centre`, `etat`) VALUES
('bureau_1', 0, 0, 0, 'Fass Mbao Ecole Elementaire', -1),
('bureau_2', 0, 0, 0, 'Fass Mbao Ecole Elementaire', -1),
('bureau_1', 2, 0, 0, 'Sicap Mbao Ecole Elementaire', -1),
('bureau_2', 0, 0, 0, 'Sicap Mbao Ecole Elementaire', -1);

-- --------------------------------------------------------

--
-- Structure de la table `candidat`
--

DROP TABLE IF EXISTS `candidat`;
CREATE TABLE IF NOT EXISTS `candidat` (
  `code_candidat` smallint(6) NOT NULL AUTO_INCREMENT,
  `nom_partie` varchar(20) DEFAULT NULL,
  `num_cni` int(20) NOT NULL,
  `nom` varchar(25) NOT NULL,
  `prenom` varchar(50) NOT NULL,
  `date_nais` date NOT NULL,
  `mail` varchar(30) NOT NULL,
  `code_profile` int(11) DEFAULT NULL,
  `login` varchar(25) DEFAULT NULL,
  PRIMARY KEY (`code_candidat`),
  KEY `FK_cand` (`login`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Structure de la table `centre`
--

DROP TABLE IF EXISTS `centre`;
CREATE TABLE IF NOT EXISTS `centre` (
  `nom_centre` varchar(50) NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  `nom_com` varchar(50) DEFAULT NULL,
  `etat` tinyint(3) NOT NULL DEFAULT '-1' COMMENT '-1=soon 0=processing 1=done',
  PRIMARY KEY (`nom_centre`),
  KEY `FK_ct` (`nom_com`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `centre`
--

INSERT INTO `centre` (`nom_centre`, `description`, `nom_com`, `etat`) VALUES
('Fass Mbao Ecole Elementaire', 'A coté du pont à péage', 'Diamaguene Sicap Mbao 	', -1),
('Sicap Mbao Ecole Elementaire', 'A coté du CEM Diamagueune Sicap', 'Diamaguene Sicap Mbao', -1);

-- --------------------------------------------------------

--
-- Structure de la table `commune`
--

DROP TABLE IF EXISTS `commune`;
CREATE TABLE IF NOT EXISTS `commune` (
  `nom_com` varchar(50) NOT NULL,
  `nombre_habitant` int(11) DEFAULT NULL,
  `nom_arr` varchar(50) NOT NULL,
  `etat` tinyint(3) NOT NULL DEFAULT '-1' COMMENT '-1=soon 0=processing 1=done',
  PRIMARY KEY (`nom_com`) USING BTREE,
  KEY `nom_arr` (`nom_arr`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `commune`
--

INSERT INTO `commune` (`nom_com`, `nombre_habitant`, `nom_arr`, `etat`) VALUES
('Mermoz', 29798, 'Almadies', -1),
('Ngor', 17783, 'Almadies', -1),
('Ouakam', 74692, 'Almadies', -1),
('Yoff', 89442, 'Almadies', -1),
('Diacksao ', 40561, 'Thiaroye', -1),
('Diamaguene Sicap Mbao', 158512, 'Thiaroye', -1),
('Mbao', 96930, 'Thiaroye', -1),
('Thiaroye-Gare', 24834, 'Thiaroye', -1),
('Thiaroye-sur-Mer', 52773, 'Thiaroye', -1),
('Dalifort', 30418, 'Pikine Dagoudane', -1),
('Djidah Thiaroye Kaw', 96951, 'Pikine Dagoudane', -1),
('Guinaw Rail Nord', 30057, 'Pikine Dagoudane', -1),
('Guinaw Rail Sud', 38859, 'Pikine Dagoudane', -1),
('Pikine Est', 32451, 'Pikine Dagoudane', -1),
('Pikine Ouest', 52154, 'Pikine Dagoudane', -1),
('Pikine Sud', 46780, 'Pikine Dagoudane', -1);

-- --------------------------------------------------------

--
-- Structure de la table `compte`
--

DROP TABLE IF EXISTS `compte`;
CREATE TABLE IF NOT EXISTS `compte` (
  `login` varchar(25) NOT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `num_cni` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  PRIMARY KEY (`login`),
  KEY `num_cni` (`num_cni`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `compte`
--

INSERT INTO `compte` (`login`, `password`, `num_cni`) VALUES
('aw', '$2y$10$k1D220sSVg83YbUisysxM.DDFzO78UOUFxwnmjY9GhsEiG60aGWZe', '1999199901999'),
('tapha', '$2y$10$o0p2aK5UtWNB6YFGzqviN.qEYsZehqXGv9U26bjwQoyTmlJ1l5nwK', '1758199601727');

-- --------------------------------------------------------

--
-- Structure de la table `departement`
--

DROP TABLE IF EXISTS `departement`;
CREATE TABLE IF NOT EXISTS `departement` (
  `nom_dep` varchar(50) NOT NULL,
  `description` text,
  `nom_reg` varchar(50) NOT NULL,
  `etat` tinyint(3) NOT NULL DEFAULT '-1' COMMENT '-1=soon 0=processing 1=done',
  PRIMARY KEY (`nom_dep`) USING BTREE,
  KEY `FK_dp` (`nom_reg`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `departement`
--

INSERT INTO `departement` (`nom_dep`, `description`, `nom_reg`, `etat`) VALUES
('Dakar', 'Ville de Dakar', 'Dakar', -1),
('Pikine', 'Le Département le plus peuplé de Dakar. Par ailleurs la banlieu.', 'Dakar', -1),
('Guédiawaye', NULL, 'Dakar', -1),
('Rufisque', 'Le plus grand département de Dakar', 'Dakar', -1),
('Keur Massar', 'Nouveau Département de Dakar suite au découpage administratif du Pr Macky Sall ', '', -1);

-- --------------------------------------------------------

--
-- Structure de la table `electeur`
--

DROP TABLE IF EXISTS `electeur`;
CREATE TABLE IF NOT EXISTS `electeur` (
  `num_cni` varchar(20) NOT NULL,
  `nom` varchar(25) NOT NULL,
  `prenom` varchar(50) NOT NULL,
  `date_nais` date NOT NULL,
  `lieu_nais` varchar(25) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `commune` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `quartier` varchar(30) NOT NULL,
  `telephone` varchar(10) NOT NULL,
  `mail` varchar(30) NOT NULL,
  `code_profile` int(11) DEFAULT '0',
  `nom_bureau` varchar(30) NOT NULL DEFAULT 'Neant',
  `nom_centre` varchar(30) NOT NULL DEFAULT 'Neant',
  PRIMARY KEY (`num_cni`),
  KEY `code_profile` (`code_profile`),
  KEY `nom_bureau` (`nom_bureau`,`nom_centre`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `electeur`
--

INSERT INTO `electeur` (`num_cni`, `nom`, `prenom`, `date_nais`, `lieu_nais`, `commune`, `quartier`, `telephone`, `mail`, `code_profile`, `nom_bureau`, `nom_centre`) VALUES
('1758199601727', 'FALL', 'Moustapha', '1998-04-26', 'Dakar', 'Diamaguene Sicap Mbao', 'Fass Mbao', '785444400', 'mail.moustapha.fall@gmail.com', 0, 'bureau_1', 'Sicap Mbao Ecole Elementaire'),
('1999199901999', 'Aw', 'Moussa', '1997-01-24', 'Pikine', 'Diamaguene Sicap Mbao', 'Sicap Mbao', '775044400', 'moussaAw97@gmail.com', 0, 'bureau_1', 'Sicap Mbao Ecole Elementaire');

-- --------------------------------------------------------

--
-- Structure de la table `election`
--

DROP TABLE IF EXISTS `election`;
CREATE TABLE IF NOT EXISTS `election` (
  `code_election` int(11) NOT NULL AUTO_INCREMENT,
  `libelle` varchar(100) DEFAULT NULL,
  `date` date NOT NULL,
  `etat` smallint(6) NOT NULL DEFAULT '-1' COMMENT '-1=soon 0=processing 1=done',
  `num_vote` varchar(25) DEFAULT NULL,
  PRIMARY KEY (`code_election`),
  KEY `FK_vot` (`num_vote`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Structure de la table `profile`
--

DROP TABLE IF EXISTS `profile`;
CREATE TABLE IF NOT EXISTS `profile` (
  `code_profile` int(11) NOT NULL,
  `libelle` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`code_profile`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `profile`
--

INSERT INTO `profile` (`code_profile`, `libelle`) VALUES
(3, 'moderateur'),
(2, 'candidat'),
(1, 'electeur'),
(0, 'membre'),
(4, 'president_centre'),
(5, 'administrateur');

-- --------------------------------------------------------

--
-- Structure de la table `region`
--

DROP TABLE IF EXISTS `region`;
CREATE TABLE IF NOT EXISTS `region` (
  `nom_reg` varchar(50) NOT NULL,
  `description` text,
  `etat` tinyint(3) NOT NULL DEFAULT '-1' COMMENT '-1=soon 0=processing 1=done',
  PRIMARY KEY (`nom_reg`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `region`
--

INSERT INTO `region` (`nom_reg`, `description`, `etat`) VALUES
('Dakar', 'La région capitale du Sénégal. Par ailleurs la région la plus peuplé du Sénégal.', -1);

-- --------------------------------------------------------

--
-- Structure de la table `vote`
--

DROP TABLE IF EXISTS `vote`;
CREATE TABLE IF NOT EXISTS `vote` (
  `num_vote` varchar(25) NOT NULL,
  `heure` time DEFAULT NULL,
  `num_cni` int(20) NOT NULL,
  `code_candidat` smallint(6) NOT NULL,
  `nom_bureau` varchar(50) NOT NULL,
  `nom_centre` varchar(50) NOT NULL,
  PRIMARY KEY (`num_vote`),
  KEY `FK_vot` (`num_cni`),
  KEY `code_candidat` (`code_candidat`),
  KEY `nom_bureau` (`nom_bureau`,`nom_centre`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
