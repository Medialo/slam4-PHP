-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : lun. 26 oct. 2020 à 10:53
-- Version du serveur :  8.0.21
-- Version de PHP : 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `phptd2slam4`
--

-- --------------------------------------------------------

--
-- Structure de la table `passager`
--

DROP TABLE IF EXISTS `passager`;
CREATE TABLE IF NOT EXISTS `passager` (
  `id_trajet` int NOT NULL,
  `id_user` varchar(32) NOT NULL,
  PRIMARY KEY (`id_trajet`,`id_user`),
  KEY `id_user` (`id_user`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `passager`
--

INSERT INTO `passager` (`id_trajet`, `id_user`) VALUES
(1, 'pb'),
(2, 'yo');

-- --------------------------------------------------------

--
-- Structure de la table `trajet`
--

DROP TABLE IF EXISTS `trajet`;
CREATE TABLE IF NOT EXISTS `trajet` (
  `id` int NOT NULL AUTO_INCREMENT,
  `pointDeDepart` varchar(32) DEFAULT NULL,
  `pointDarriver` varchar(32) DEFAULT NULL,
  `datet` date DEFAULT NULL,
  `nbplaces` int DEFAULT NULL,
  `prix` int DEFAULT NULL,
  `conducteur_login` varchar(32) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK1` (`conducteur_login`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `trajet`
--

INSERT INTO `trajet` (`id`, `pointDeDepart`, `pointDarriver`, `datet`, `nbplaces`, `prix`, `conducteur_login`) VALUES
(1, 'Paris', 'Marseille', '2020-09-24', 5, 750, 'kchauvin'),
(2, 'Gap', 'Gap centre ville', '2020-09-02', 3, 45, 'kchauvin');

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

DROP TABLE IF EXISTS `utilisateur`;
CREATE TABLE IF NOT EXISTS `utilisateur` (
  `login` varchar(32) NOT NULL,
  `name` varchar(32) DEFAULT NULL,
  `fname` varchar(32) DEFAULT NULL,
  `mdp` varchar(64) DEFAULT NULL,
  `admin` tinyint(1) NOT NULL DEFAULT '0',
  `email` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `nonce` varchar(32) DEFAULT NULL,
  PRIMARY KEY (`login`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `utilisateur`
--

INSERT INTO `utilisateur` (`login`, `name`, `fname`, `mdp`, `admin`, `email`, `nonce`) VALUES
('kchauvin', 'KAREN', 'Karen', 'f9ccde371257bc75e0a9bbfebb5c77b2d89e992526ba31f2653981591675b5e4', 0, NULL, NULL),
('pb', 'Brelet', 'Paul', 'b8f81af9e4d353426be71ea008d507707dc40e6d0a319c30a9283ef270daacce', 1, NULL, NULL),
('Medialo', 'zefezf', 'Breletxsbs', 'b8f81af9e4d353426be71ea008d507707dc40e6d0a319c30a9283ef270daacce', 0, NULL, NULL),
('pbrelet', 'Paul Brelet', 'Brelet', 'b8f81af9e4d353426be71ea008d507707dc40e6d0a319c30a9283ef270daacce', 0, 'zute2zute@gmail.com', 'e71236668651aad407963725718eac98');

-- --------------------------------------------------------

--
-- Structure de la table `voiture`
--

DROP TABLE IF EXISTS `voiture`;
CREATE TABLE IF NOT EXISTS `voiture` (
  `marque` varchar(25) DEFAULT NULL,
  `couleur` varchar(12) DEFAULT NULL,
  `immatriculation` varchar(8) NOT NULL,
  PRIMARY KEY (`immatriculation`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `voiture`
--

INSERT INTO `voiture` (`marque`, `couleur`, `immatriculation`) VALUES
('Tesla', 'Tesla', '65az4d'),
('voiturerere', 'blouge', 'azeaze'),
('tesla', 'rouge', '<h1>Hack'),
('azeaze', 'bleu', '&immat=h'),
(NULL, NULL, ''),
('Renault', 'Vert', 'CH01020');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
