-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:3306
-- Généré le : mar. 19 oct. 2021 à 11:35
-- Version du serveur : 5.7.33
-- Version de PHP : 7.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `travaux`
--

-- --------------------------------------------------------

--
-- Structure de la table `intervention`
--

CREATE TABLE `intervention` (
  `id_intervention` int(11) NOT NULL,
  `date_intervention` date NOT NULL,
  `etage_intervention` smallint(6) NOT NULL,
  `id_tache` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `intervention`
--

INSERT INTO `intervention` (`id_intervention`, `date_intervention`, `etage_intervention`, `id_tache`) VALUES
(121, '2021-10-13', 2, 1),
(122, '2021-10-15', 1, 42),
(123, '2021-10-22', 6, 41),
(124, '2021-10-22', 4, 1),
(125, '2021-10-21', 3, 46),
(126, '2021-10-06', 2, 1),
(127, '2021-10-14', 3, 47);

-- --------------------------------------------------------

--
-- Structure de la table `tache`
--

CREATE TABLE `tache` (
  `id_tache` int(11) NOT NULL,
  `libelle_tache` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `tache`
--

INSERT INTO `tache` (`id_tache`, `libelle_tache`) VALUES
(1, 'Changer ampoule'),
(2, 'Peindre murs'),
(3, 'Réparer radiateurs'),
(41, 'Réparer robinet'),
(42, 'Balayer'),
(43, 'Arroser les plantes'),
(44, 'Changer une serrure'),
(45, 'Entretenir la ventilation'),
(46, 'Réparer rampe d\'escalier'),
(47, 'Ramoner');

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `login_user` varchar(255) NOT NULL,
  `pwd_user` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id_user`, `login_user`, `pwd_user`) VALUES
(2, 'yamina', '$2y$10$5gV8UT/D.xI443xt/u3mdOxG.ZoX/UTQ6mAF4cL18Wl3dqVJw3ESS'),
(3, 'florent', '$2y$10$l7HoWoNBvS1HW.rj8aYunuM/OV5rFltqMMs4mT0ZhgnBk5IKSgWmu'),
(4, 'Anais', '$2y$10$JCMyWmGtAifisC4mmLIcmegGhRXlE3VFx7zJoXfMW1cjtcihHjjLu');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `intervention`
--
ALTER TABLE `intervention`
  ADD PRIMARY KEY (`id_intervention`),
  ADD KEY `id_tache` (`id_tache`);

--
-- Index pour la table `tache`
--
ALTER TABLE `tache`
  ADD PRIMARY KEY (`id_tache`);

--
-- Index pour la table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `intervention`
--
ALTER TABLE `intervention`
  MODIFY `id_intervention` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=128;

--
-- AUTO_INCREMENT pour la table `tache`
--
ALTER TABLE `tache`
  MODIFY `id_tache` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `intervention`
--
ALTER TABLE `intervention`
  ADD CONSTRAINT `intervention_ibfk_1` FOREIGN KEY (`id_tache`) REFERENCES `tache` (`id_tache`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
