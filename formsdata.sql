-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : mar. 27 août 2024 à 13:12
-- Version du serveur : 10.4.32-MariaDB
-- Version de PHP : 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `formsdata`
--

-- --------------------------------------------------------

--
-- Structure de la table `depense`
--

CREATE TABLE `depense` (
  `id` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `cin` varchar(255) NOT NULL,
  `prix` decimal(10,2) NOT NULL,
  `motif` varchar(255) NOT NULL DEFAULT 'frais de repas',
  `date` date NOT NULL,
  `time` time NOT NULL,
  `saisie_par` varchar(255) NOT NULL,
  `bon_number` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `depense`
--

INSERT INTO `depense` (`id`, `nom`, `prenom`, `cin`, `prix`, `motif`, `date`, `time`, `saisie_par`, `bon_number`) VALUES
(11, 'aghouri', 'yassine', 'PA16000', 200.00, 'frais de repas', '2024-08-19', '14:59:23', 'YOUNESS', 1),
(12, 'aghouri', 'yassine', 'PA16000', 200.00, 'frais de repas', '2024-08-19', '15:03:48', 'YOUNESS', 2),
(39, 'ennouary', 'elhoussaine', 'P167101', 200.00, 'frais de repas', '2024-08-19', '15:48:32', 'YOUNESS EL ALAOUI', 29),
(40, 'ennouary', 'elhoussaine', 'P167101', 200.00, 'frais de repas', '2024-08-19', '15:49:44', 'YOUNESS EL ALAOUI', 30),
(41, 'ennouary', 'elhoussaine', 'P167101', 200.00, 'frais de repas', '2024-08-19', '15:50:52', 'YOUNESS EL ALAOUI', 31),
(42, 'ennouary', 'elhoussaine', 'P167101', 200.00, 'frais de repas', '2024-08-19', '15:51:33', 'YOUNESS EL ALAOUI', 32),
(43, 'ennouary', 'elhoussaine', 'P167101', 200.00, 'frais de repas', '2024-08-19', '15:52:07', 'YOUNESS EL ALAOUI', 33),
(44, 'ennouary', 'elhoussaine', 'P167101', 200.00, 'frais de repas', '2024-08-19', '15:52:42', 'YOUNESS EL ALAOUI', 34),
(45, 'ennouary', 'elhoussaine', 'P167101', 200.00, 'frais de repas', '2024-08-19', '15:53:04', 'YOUNESS EL ALAOUI', 35),
(46, 'ennouary', 'elhoussaine', 'P167101', 200.00, 'frais de repas', '2024-08-19', '15:53:16', 'YOUNESS EL ALAOUI', 36),
(47, 'ennouary', 'hyu', 'uiui', 5.00, 'frais de repas', '2024-08-19', '15:53:29', 'YOUNESS EL ALAOUI', 37),
(48, 'ennouary', 'hyu', 'uiui', 5.00, 'frais de repas', '2024-08-19', '15:55:34', 'YOUNESS EL ALAOUI', 38),
(49, 'ennouary', 'hyu', 'uiui', 5.00, 'frais de repas', '2024-08-19', '15:56:15', 'YOUNESS EL ALAOUI', 39),
(50, 'ennouary', 'hyu', 'uiui', 5.00, 'frais de repas', '2024-08-19', '15:56:43', 'YOUNESS EL ALAOUI', 40),
(51, 'ennouary', 'hyu', 'uiui', 5.00, 'frais de repas', '2024-08-19', '15:57:03', 'YOUNESS EL ALAOUI', 41),
(52, 'ennouary', 'hyu', 'uiui', 5.00, 'frais de repas', '2024-08-19', '15:58:34', 'YOUNESS EL ALAOUI', 42),
(53, 'ennouary', 'hyu', 'uiui', 5.00, 'frais de repas', '2024-08-19', '16:00:53', 'YOUNESS EL ALAOUI', 43),
(63, 'ennouary', 'hyu', 'uiui', 5.00, 'frais de repas', '2024-08-19', '16:10:53', 'YOUNESS EL ALAOUI', 53),
(64, 'ennouary', 'hyu', 'uiui', 5.00, 'frais de repas', '2024-08-19', '16:12:04', 'YOUNESS EL ALAOUI', 54),
(65, 'ennouary', 'hyu', 'uiui', 5.00, 'frais de repas', '2024-08-19', '16:12:49', 'YOUNESS EL ALAOUI', 55),
(66, 'ennouary', 'hyu', 'uiui', 5.00, 'frais de repas', '2024-08-19', '16:16:14', 'YOUNESS EL ALAOUI', 56),
(67, 'ennouary', 'hyu', 'uiui', 5.00, 'frais de repas', '2024-08-19', '16:17:24', 'YOUNESS EL ALAOUI', 57),
(68, 'ennouary', 'hyu', 'uiui', 5.00, 'frais de repas', '2024-08-19', '16:18:00', 'YOUNESS EL ALAOUI', 58),
(69, 'ennouary', 'hyu', 'uiui', 5.00, 'frais de repas', '2024-08-19', '16:18:26', 'YOUNESS EL ALAOUI', 59),
(70, 'ennouary', 'hyu', 'uiui', 5.00, 'frais de repas', '2024-08-19', '16:18:53', 'YOUNESS EL ALAOUI', 60),
(71, 'ennouary', 'said', 'P92145', 100.00, 'frais de repas', '2024-08-22', '13:33:39', 'YOUNESS EL ALAOUI', 35),
(72, 'ennouary', 'said', 'P92145', 100.00, 'frais de repas', '2024-08-22', '13:35:28', 'YOUNESS EL ALAOUI', 36),
(73, 'ennouary', 'said', 'P92145', 100.00, 'frais de repas', '2024-08-22', '13:35:41', 'YOUNESS EL ALAOUI', 37),
(74, 'ennouary', 'said', 'P92145', 100.00, 'frais de repas', '2024-08-22', '13:38:27', 'YOUNESS EL ALAOUI', 38),
(75, 'ennouary', 'said', 'P92145', 100.00, 'frais de repas', '2024-08-22', '13:39:10', 'YOUNESS EL ALAOUI', 39),
(76, 'ennouary', 'said', 'P92145', 100.00, 'frais de repas', '2024-08-22', '13:39:39', 'YOUNESS EL ALAOUI', 40),
(77, 'ennouary', 'said', 'P92145', 100.00, 'frais de repas', '2024-08-22', '13:40:03', 'YOUNESS EL ALAOUI', 41),
(78, 'ennouary', 'said', 'P92145', 100.00, 'frais de repas', '2024-08-22', '13:41:43', 'YOUNESS EL ALAOUI', 42),
(79, 'ennouary', 'said', 'P92145', 100.00, 'frais de repas', '2024-08-22', '13:43:32', 'YOUNESS EL ALAOUI', 43),
(80, 'ennouary', 'said', 'P92145', 100.00, 'frais de repas', '2024-08-22', '13:43:45', 'YOUNESS EL ALAOUI', 44),
(81, 'ennouary', 'said', 'P92145', 100.00, 'frais de repas', '2024-08-22', '13:44:14', 'YOUNESS EL ALAOUI', 45),
(82, 'ennouary', 'said', 'P92145', 100.00, 'frais de repas', '2024-08-22', '13:44:29', 'YOUNESS EL ALAOUI', 46),
(83, 'ennouary', 'said', 'P92145', 100.00, 'frais de repas', '2024-08-22', '13:44:47', 'YOUNESS EL ALAOUI', 47),
(84, 'ennouary', 'said', 'P92145', 100.00, 'frais de repas', '2024-08-22', '13:45:15', 'YOUNESS EL ALAOUI', 48),
(85, 'ennouary', 'said', 'P92145', 100.00, 'frais de repas', '2024-08-22', '13:46:21', 'YOUNESS EL ALAOUI', 49),
(86, 'ennouary', 'said', 'P92145', 100.00, 'frais de repas', '2024-08-22', '13:47:18', 'YOUNESS EL ALAOUI', 50),
(87, 'ennouary', 'said', 'P92145', 100.00, 'frais de repas', '2024-08-22', '13:48:41', 'YOUNESS EL ALAOUI', 51),
(88, 'ennouary', 'lhou', 'pa167101', 200.00, 'frais de repas', '2024-08-22', '13:55:49', 'YOUNESS EL ALAOUI', 52),
(89, 'ennouary', 'lhou', 'pa167101', 200.00, 'frais de repas', '2024-08-22', '13:59:08', 'YOUNESS EL ALAOUI', 53),
(90, 'ennouary', 'lhou', 'pa167101', 200.00, 'frais de repas', '2024-08-22', '13:59:41', 'YOUNESS EL ALAOUI', 54),
(91, 'ennouary', 'lhou', 'pa167101', 200.00, 'frais de repas', '2024-08-22', '14:00:50', 'YOUNESS EL ALAOUI', 55),
(92, 'ennouary', 'lhou', 'pa167101', 200.00, 'frais de repas', '2024-08-22', '14:01:36', 'YOUNESS EL ALAOUI', 56),
(93, 'ennouary', 'lhou', 'pa167101', 200.00, 'frais de repas', '2024-08-22', '14:03:08', 'YOUNESS EL ALAOUI', 57),
(94, 'ennouary', 'lhou', 'pa167101', 200.00, 'frais de repas', '2024-08-22', '14:21:48', 'YOUNESS EL ALAOUI', 58),
(95, 'ouhda', 'mimoun', 'PA178129', 100.00, 'frais de repas', '2024-08-23', '12:44:08', 'YOUNESS EL ALAOUI', 59);

-- --------------------------------------------------------

--
-- Structure de la table `enregistrer`
--

CREATE TABLE `enregistrer` (
  `id` int(11) NOT NULL,
  `nom` varchar(100) NOT NULL,
  `prenom` varchar(100) NOT NULL,
  `cin` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `enregistrer`
--

INSERT INTO `enregistrer` (`id`, `nom`, `prenom`, `cin`) VALUES
(15, 'aghouri', 'yassine', 'PA263990'),
(16, 'ennouary', 'elhou', 'PA167101');

-- --------------------------------------------------------

--
-- Structure de la table `enregistrer2`
--

CREATE TABLE `enregistrer2` (
  `id` int(11) NOT NULL,
  `nom` varchar(100) NOT NULL,
  `prenom` varchar(1000) NOT NULL,
  `cin` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `enregistrer2`
--

INSERT INTO `enregistrer2` (`id`, `nom`, `prenom`, `cin`) VALUES
(1, 'oulya', 'omar', 'PA283190'),
(2, 'aghouri', 'yassine', 'PA200756'),
(3, 'ennouary', 'elhou', 'PA167101'),
(4, 'ouhda', 'mimoun', 'PA178129');

-- --------------------------------------------------------

--
-- Structure de la table `masrouf`
--

CREATE TABLE `masrouf` (
  `id` int(11) NOT NULL,
  `nom` varchar(100) NOT NULL,
  `prix` decimal(10,2) NOT NULL,
  `motif` varchar(255) DEFAULT NULL,
  `date` date NOT NULL DEFAULT curdate(),
  `total` decimal(10,2) DEFAULT NULL,
  `file_data` longblob DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `masrouf`
--

INSERT INTO `masrouf` (`id`, `nom`, `prix`, `motif`, `date`, `total`, `file_data`) VALUES
(16, 'PA167101', 100.00, 'achat de mongue ', '2024-08-19', 100.00, NULL),
(17, 'PA263990', 100.00, 'achat de fruit', '2024-08-19', 200.00, NULL),
(18, 'PA263990', 100.00, 'chats', '2024-08-19', 300.00, NULL),
(21, 'PA167101', 100.00, 'chat de matriels', '2024-08-23', 400.00, NULL),
(22, 'PA167101', 100.00, 'lhou', '2024-08-27', 500.00, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `recette`
--

CREATE TABLE `recette` (
  `id` int(11) NOT NULL,
  `nom` varchar(100) NOT NULL,
  `prix` decimal(10,2) NOT NULL,
  `motif` varchar(255) DEFAULT NULL,
  `date` date NOT NULL DEFAULT curdate(),
  `total` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `recette`
--

INSERT INTO `recette` (`id`, `nom`, `prix`, `motif`, `date`, `total`) VALUES
(18, 'PA200756', 200.00, 'la maise ', '2024-08-19', 200.00),
(19, 'PA167101', 100.00, 'mohsinin', '2024-08-19', 300.00),
(20, 'PA283190', 300.00, 'la mise', '2024-08-19', 600.00),
(21, 'PA178129', 1000.00, 'la laise ', '2024-08-23', 1600.00),
(23, 'PA283190', 100.00, 'la jnwf', '2024-08-26', 1700.00),
(24, 'PA200756', 400.00, 'la maise', '2024-08-26', 2100.00),
(25, 'PA283190', 100.00, 'achat de fruit', '2024-08-27', 2200.00);

-- --------------------------------------------------------

--
-- Structure de la table `regestration`
--

CREATE TABLE `regestration` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `regestration`
--

INSERT INTO `regestration` (`id`, `name`, `password`) VALUES
(12, 'ennouary', '1234'),
(17, 'lhou', '12345'),
(19, 'aspsagadir', '1234567');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `depense`
--
ALTER TABLE `depense`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `enregistrer`
--
ALTER TABLE `enregistrer`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `enregistrer2`
--
ALTER TABLE `enregistrer2`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `masrouf`
--
ALTER TABLE `masrouf`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `recette`
--
ALTER TABLE `recette`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `regestration`
--
ALTER TABLE `regestration`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `depense`
--
ALTER TABLE `depense`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=96;

--
-- AUTO_INCREMENT pour la table `enregistrer`
--
ALTER TABLE `enregistrer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT pour la table `enregistrer2`
--
ALTER TABLE `enregistrer2`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `masrouf`
--
ALTER TABLE `masrouf`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT pour la table `recette`
--
ALTER TABLE `recette`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT pour la table `regestration`
--
ALTER TABLE `regestration`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
