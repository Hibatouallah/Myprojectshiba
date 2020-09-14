-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le :  jeu. 15 nov. 2018 à 18:56
-- Version du serveur :  10.1.28-MariaDB
-- Version de PHP :  7.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `sics`
--

-- --------------------------------------------------------

--
-- Structure de la table `infermier`
--

CREATE TABLE `infermier` (
  `id_infermier` int(11) NOT NULL,
  `nom_infermier` varchar(60) NOT NULL,
  `CIN_infermier` varchar(60) NOT NULL,
  `adresse_infermier` varchar(60) NOT NULL,
  `email_infermier` varchar(60) NOT NULL,
  `login_infermier` varchar(60) NOT NULL,
  `password_infermier` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `medecin`
--

CREATE TABLE `medecin` (
  `id_medecin` int(11) NOT NULL,
  `nom_medecin` varchar(60) NOT NULL,
  `prenom_medecin` varchar(40) NOT NULL,
  `cin_medecin` varchar(60) NOT NULL,
  `adresse_medecin` varchar(60) NOT NULL,
  `email_medecin` varchar(60) NOT NULL,
  `login_medecin` varchar(60) NOT NULL,
  `password_medecin` varchar(60) NOT NULL,
  `specialite_medecin` varchar(60) NOT NULL,
  `service` varchar(60) NOT NULL,
  `matricule_medecin` varchar(60) NOT NULL,
  `medecin_chef` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `medecin`
--

INSERT INTO `medecin` (`id_medecin`, `nom_medecin`, `prenom_medecin`, `cin_medecin`, `adresse_medecin`, `email_medecin`, `login_medecin`, `password_medecin`, `specialite_medecin`, `service`, `matricule_medecin`, `medecin_chef`) VALUES
(1, 'boulsane', 'hibatou allah', 'JF53674', 'agadir', 'boulsane.1996@gmail.com', 'hibatou allah', 'hiba', 'pediatre', 'pediatrie', '56666', 1);

-- --------------------------------------------------------

--
-- Structure de la table `medicament`
--

CREATE TABLE `medicament` (
  `id_medicament` int(11) NOT NULL,
  `id_medecin` int(11) DEFAULT NULL,
  `id_infermier` int(11) DEFAULT NULL,
  `id_patient` int(11) NOT NULL,
  `id_medicamentstock` int(11) NOT NULL,
  `date_delivmed` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `medicament_stock`
--

CREATE TABLE `medicament_stock` (
  `id_medicamentstock` int(11) NOT NULL,
  `description_medicamentstock` varchar(60) NOT NULL,
  `nombre_unite` varchar(60) NOT NULL,
  `titre_medicamentstock` varchar(60) NOT NULL,
  `unite_minimal` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `patient`
--

CREATE TABLE `patient` (
  `id_patient` int(11) NOT NULL,
  `prenom_patient` varchar(20) NOT NULL,
  `nom_patient` varchar(60) NOT NULL,
  `cin_patient` varchar(60) NOT NULL,
  `adresse_patient` varchar(60) NOT NULL,
  `email_patient` varchar(60) NOT NULL,
  `date_ajout_p` varchar(60) NOT NULL,
  `password_patient` varchar(60) NOT NULL,
  `date_naissance` varchar(60) NOT NULL,
  `situation` varchar(60) NOT NULL,
  `genre_p` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `rendezvous`
--

CREATE TABLE `rendezvous` (
  `id_rendezvous` int(11) NOT NULL,
  `date_rendezvous` varchar(60) NOT NULL,
  `heure_rendezvous` varchar(60) NOT NULL,
  `description_rendezvous` varchar(60) NOT NULL,
  `id_patient` int(11) NOT NULL,
  `id_medecin` int(11) NOT NULL,
  `id_infermier` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `visite`
--

CREATE TABLE `visite` (
  `id_visite` int(11) NOT NULL,
  `type_visite` varchar(60) NOT NULL,
  `date_visite` varchar(60) NOT NULL,
  `id_patient` int(11) NOT NULL,
  `id_medecin` int(11) NOT NULL,
  `id_infermier` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `infermier`
--
ALTER TABLE `infermier`
  ADD PRIMARY KEY (`id_infermier`);

--
-- Index pour la table `medecin`
--
ALTER TABLE `medecin`
  ADD PRIMARY KEY (`id_medecin`);

--
-- Index pour la table `medicament`
--
ALTER TABLE `medicament`
  ADD PRIMARY KEY (`id_medicament`),
  ADD KEY `fk_7` (`id_medecin`),
  ADD KEY `fk_8` (`id_infermier`),
  ADD KEY `fk_9` (`id_medicamentstock`),
  ADD KEY `fk_10` (`id_patient`);

--
-- Index pour la table `medicament_stock`
--
ALTER TABLE `medicament_stock`
  ADD PRIMARY KEY (`id_medicamentstock`);

--
-- Index pour la table `patient`
--
ALTER TABLE `patient`
  ADD PRIMARY KEY (`id_patient`);

--
-- Index pour la table `rendezvous`
--
ALTER TABLE `rendezvous`
  ADD PRIMARY KEY (`id_rendezvous`),
  ADD KEY `fk_4` (`id_infermier`),
  ADD KEY `fk_5` (`id_patient`),
  ADD KEY `fk_6` (`id_medecin`);

--
-- Index pour la table `visite`
--
ALTER TABLE `visite`
  ADD PRIMARY KEY (`id_visite`),
  ADD KEY `fk_1` (`id_medecin`),
  ADD KEY `fk_2` (`id_patient`),
  ADD KEY `fk_3` (`id_infermier`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `infermier`
--
ALTER TABLE `infermier`
  MODIFY `id_infermier` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `medecin`
--
ALTER TABLE `medecin`
  MODIFY `id_medecin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `medicament`
--
ALTER TABLE `medicament`
  MODIFY `id_medicament` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `medicament_stock`
--
ALTER TABLE `medicament_stock`
  MODIFY `id_medicamentstock` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `patient`
--
ALTER TABLE `patient`
  MODIFY `id_patient` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `rendezvous`
--
ALTER TABLE `rendezvous`
  MODIFY `id_rendezvous` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `visite`
--
ALTER TABLE `visite`
  MODIFY `id_visite` int(11) NOT NULL AUTO_INCREMENT;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `medicament`
--
ALTER TABLE `medicament`
  ADD CONSTRAINT `fk_10` FOREIGN KEY (`id_patient`) REFERENCES `patient` (`id_patient`),
  ADD CONSTRAINT `fk_7` FOREIGN KEY (`id_medecin`) REFERENCES `medecin` (`id_medecin`),
  ADD CONSTRAINT `fk_8` FOREIGN KEY (`id_infermier`) REFERENCES `infermier` (`id_infermier`),
  ADD CONSTRAINT `fk_9` FOREIGN KEY (`id_medicamentstock`) REFERENCES `medicament_stock` (`id_medicamentstock`);

--
-- Contraintes pour la table `rendezvous`
--
ALTER TABLE `rendezvous`
  ADD CONSTRAINT `fk_4` FOREIGN KEY (`id_infermier`) REFERENCES `infermier` (`id_infermier`),
  ADD CONSTRAINT `fk_5` FOREIGN KEY (`id_patient`) REFERENCES `patient` (`id_patient`),
  ADD CONSTRAINT `fk_6` FOREIGN KEY (`id_medecin`) REFERENCES `medecin` (`id_medecin`);

--
-- Contraintes pour la table `visite`
--
ALTER TABLE `visite`
  ADD CONSTRAINT `fk_1` FOREIGN KEY (`id_medecin`) REFERENCES `medecin` (`id_medecin`),
  ADD CONSTRAINT `fk_2` FOREIGN KEY (`id_patient`) REFERENCES `patient` (`id_patient`),
  ADD CONSTRAINT `fk_3` FOREIGN KEY (`id_infermier`) REFERENCES `infermier` (`id_infermier`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
