-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : dim. 10 déc. 2023 à 09:50
-- Version du serveur : 10.4.27-MariaDB
-- Version de PHP : 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `asma`
--

-- --------------------------------------------------------

--
-- Structure de la table `eventcategories`
--

CREATE TABLE `eventcategories` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `eventcategories`
--

INSERT INTO `eventcategories` (`id`, `name`) VALUES
(1, 'NonProfit');

-- --------------------------------------------------------

--
-- Structure de la table `events`
--

CREATE TABLE `events` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `startTime` datetime NOT NULL,
  `endTime` datetime NOT NULL,
  `location` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `registrationDeadline` datetime NOT NULL,
  `organisationID` int(11) NOT NULL,
  `categoryID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `events`
--

INSERT INTO `events` (`id`, `name`, `startTime`, `endTime`, `location`, `description`, `registrationDeadline`, `organisationID`, `categoryID`) VALUES
(10, '', '2023-11-21 01:42:42', '2023-11-21 01:42:42', 'aerarazearze', 'raeaerzaeraez', '2023-11-21 01:42:42', 1, 1),
(11, 'aa', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'aaa', 'aa', '0000-00-00 00:00:00', 1, 1),
(12, 'hello ne', '2023-11-21 02:13:00', '2023-11-21 02:14:00', 'aaa', 'mmmm', '2023-11-21 05:11:00', 1, 1),
(13, 'form validator', '2023-11-12 08:31:00', '2023-11-21 08:34:00', 'aaa', 'vvvvevvvvevvvvevvvvevvvvevvvvevvvvevvvvevvvvevvvvevvvvevvvvevvvve', '2023-11-21 08:35:00', 1, 1),
(15, 'event new', '2023-11-28 09:00:00', '2023-11-29 18:00:00', 'esprit', 'this event is a charity event that envolves children and sponsors.', '2023-11-26 18:00:00', 1, 1),
(16, 'new event 1', '2023-11-28 09:34:00', '2023-11-28 13:39:00', 'esprit', 'this is the description ', '2023-11-27 09:35:00', 1, 1),
(17, 'event 5', '2023-11-28 09:36:00', '2023-11-29 09:36:00', 'esprit', 'jehaeh', '2023-11-27 09:36:00', 1, 1);

-- --------------------------------------------------------

--
-- Structure de la table `organisations`
--

CREATE TABLE `organisations` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `organisations`
--

INSERT INTO `organisations` (`id`, `name`, `email`, `phone`, `address`) VALUES
(1, 'ieee', 'ieee@gmail.com', '58906040', 'esprit');

-- --------------------------------------------------------

--
-- Structure de la table `participants`
--

CREATE TABLE `participants` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `eventID` int(11) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `participants`
--

INSERT INTO `participants` (`id`, `name`, `email`, `phone`, `eventID`, `status`) VALUES
(1, 'farouk', 'farouk.chalghoumi031@gmail.com', '66666', 13, 1),
(2, 'aa', 'bensaid.asma@esprit.tn', '66666', 10, 1),
(3, 'hello new ', 'bensaid.asma@esprit.tn', '66666', 11, 1),
(4, 'farouk', 'farouk.chalghoumi031@gmail.com', '66666', 13, 1),
(5, 'asma', 'bensaid.asma@esprit.tn', '66666', 13, 1),
(8, 'fff', 'farouk.chalghoumi031@gmail.com', '+21654303898', 11, 1);

-- --------------------------------------------------------

--
-- Structure de la table `sponsors`
--

CREATE TABLE `sponsors` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `id_event` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `sponsors`
--

INSERT INTO `sponsors` (`id`, `name`, `email`, `phone`, `address`, `id_event`) VALUES
(1, 'actia', 'actia@gmail.com', '55445544', 'ghazela', 13),
(4, 'farouk', 'farouk.chalghoumi', '99009900', 'hello', 13),
(5, 'farouk', 'farouk.chalghoumi', '99009900', 'hello', 13),
(6, 'farouk', 'farouk.chalghoumi', '99009900', 'hello', 13),
(7, 'farouk', 'farouk.chalghoumi', '99009900', 'hello', 13),
(9, 'name', 'mail', 'phone', 'address', 15),
(10, 'name', 'mail', 'phone', 'address', 15),
(11, 'name', 'mail', 'phone', 'address', 15),
(12, 'name', 'mail', 'phone', 'address', 15),
(13, 'name', 'mail', 'phone', 'address', 15),
(14, 'aa', 'bensaid.asma@esprit.tn', '6565656565', 'vevffve', 16),
(15, 'Mohamed Aziz Omezzine', 'sb.esprit@ieee.org', '54303898', 'ESPRIT engineering school', 11),
(16, 'Mohamed Aziz Omezzine', 'sb.esprit@ieee.org', '54303898', 'ESPRIT engineering school', 11),
(17, 'Mohamed Aziz Omezzine', 'sb.esprit@ieee.org', '54303898', 'ESPRIT engineering school', 11),
(18, 'Mohamed Aziz Omezzine', 'sb.esprit@ieee.org', '54303898', 'ESPRIT engineering school', 11),
(19, 'Mohamed Aziz Omezzine', 'sb.esprit@ieee.org', '54303898', 'ESPRIT engineering school', 11);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `eventcategories`
--
ALTER TABLE `eventcategories`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`),
  ADD KEY `organizerID` (`organisationID`,`categoryID`),
  ADD KEY `categoryID` (`categoryID`);

--
-- Index pour la table `organisations`
--
ALTER TABLE `organisations`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `participants`
--
ALTER TABLE `participants`
  ADD PRIMARY KEY (`id`),
  ADD KEY `eventID` (`eventID`);

--
-- Index pour la table `sponsors`
--
ALTER TABLE `sponsors`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_event` (`id_event`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `eventcategories`
--
ALTER TABLE `eventcategories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `events`
--
ALTER TABLE `events`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT pour la table `participants`
--
ALTER TABLE `participants`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT pour la table `sponsors`
--
ALTER TABLE `sponsors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `events`
--
ALTER TABLE `events`
  ADD CONSTRAINT `events_ibfk_1` FOREIGN KEY (`categoryID`) REFERENCES `eventcategories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `events_ibfk_2` FOREIGN KEY (`organisationID`) REFERENCES `organisations` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
