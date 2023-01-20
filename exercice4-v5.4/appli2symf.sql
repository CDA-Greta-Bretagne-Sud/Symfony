-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : mar. 01 fév. 2022 à 18:38
-- Version du serveur : 10.4.21-MariaDB
-- Version de PHP : 7.4.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `appli2symf`
--

-- --------------------------------------------------------

--
-- Structure de la table `achat_produits`
--

CREATE TABLE `achat_produits` (
  `id` int(11) NOT NULL,
  `personne_id` int(11) DEFAULT NULL,
  `nom` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prix` double NOT NULL,
  `nombre` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `achat_produits`
--

INSERT INTO `achat_produits` (`id`, `personne_id`, `nom`, `prix`, `nombre`) VALUES
(1, 8, 'smartphone Android Pixel', 458.12, 1),
(2, 7, 'ordinateur HP i7', 1250.5, 2),
(3, 8, 'Livre sur Symfony3', 45.9, 1),
(4, 8, 'smartphone Android Pixel', 458.12, 1),
(6, 8, 'Livre sur Symfony2', 45.9, 1),
(13, 7, 'tv', 250, 1),
(17, 21, 'test1', 124, 1),
(18, NULL, 'machine à laver', 300, 1),
(19, NULL, 'machine à laver', 500, 1),
(20, NULL, 'test', 12, 12),
(21, 8, 'test4', 124, 1),
(22, 21, 'test5', 124, 1),
(23, 21, 'test9', 145, 1),
(24, 7, 'test989', 121, 1);

-- --------------------------------------------------------

--
-- Structure de la table `adresse`
--

CREATE TABLE `adresse` (
  `id` int(11) NOT NULL,
  `numero` int(11) NOT NULL,
  `rue` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `codepostal` int(11) NOT NULL,
  `ville` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `adresse`
--

INSERT INTO `adresse` (`id`, `numero`, `rue`, `codepostal`, `ville`) VALUES
(7, 1360935875, 'Boulevard Victor Hugo', 56000, 'Vannes'),
(8, 733212786, 'Boulevard Victor Hugo', 56000, 'Vannes'),
(9, 1209140657, 'Boulevard Victor Hugo', 56000, 'Vannes'),
(10, 1, 'des champs Elysées', 75000, 'Paris'),
(11, 36, 'rue jean jaures', 44000, 'Nantes'),
(12, 1, 'rue de maupassant', 85000, 'La Roche sur Yon'),
(13, 1, 'rue du test', 44000, 'nantes'),
(14, 1, 'test', 51000, 'test'),
(15, 1, 'bd magenta', 75000, 'paris'),
(16, 14, 'ghjghj', 45000, 'gdgg');

-- --------------------------------------------------------

--
-- Structure de la table `doctrine_migration_versions`
--

CREATE TABLE `doctrine_migration_versions` (
  `version` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `executed_at` datetime DEFAULT NULL,
  `execution_time` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `doctrine_migration_versions`
--

INSERT INTO `doctrine_migration_versions` (`version`, `executed_at`, `execution_time`) VALUES
('DoctrineMigrations\\Version20220115122514', '2022-01-15 13:27:12', 67),
('DoctrineMigrations\\Version20220115125615', '2022-01-15 13:56:27', 69),
('DoctrineMigrations\\Version20220115133921', '2022-01-15 14:39:55', 92),
('DoctrineMigrations\\Version20220115173820', '2022-01-15 18:38:37', 90),
('DoctrineMigrations\\Version20220116111553', '2022-01-16 12:16:17', 99),
('DoctrineMigrations\\Version20220116112922', '2022-01-16 12:29:42', 103),
('DoctrineMigrations\\Version20220116135249', '2022-01-16 14:53:04', 242),
('DoctrineMigrations\\Version20220131153123', '2022-01-31 16:32:02', 78);

-- --------------------------------------------------------

--
-- Structure de la table `livre`
--

CREATE TABLE `livre` (
  `id` int(11) NOT NULL,
  `titre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `edition` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `information` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `auteur` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `livre`
--

INSERT INTO `livre` (`id`, `titre`, `edition`, `information`, `auteur`) VALUES
(1, 'Madame Bovary', 'jacques Neefs', 'Livre en moyen état', 'Gustave Flaubert'),
(2, 'Le Horla', 'Folio', 'Livre en excellent état', 'Guy de Maupassant'),
(3, 'Les Miserables', 'Galimard', 'Livre en bon état', 'Victor Hugo'),
(9, 'La Gloire de mon pere', 'Hachette', 'beau livre', 'Marcel Pagnol'),
(10, 'L’autre rive du Bosphore', 'Flamarion', 'Bon état', 'Theresa REVAY');

-- --------------------------------------------------------

--
-- Structure de la table `personne`
--

CREATE TABLE `personne` (
  `id` int(11) NOT NULL,
  `nom` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prenom` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_naiss` datetime DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telephone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `login` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pwd` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `adresse_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `personne`
--

INSERT INTO `personne` (`id`, `nom`, `prenom`, `date_naiss`, `email`, `telephone`, `login`, `pwd`, `adresse_id`) VALUES
(7, 'Hugo', 'Victor', '1992-01-15 00:00:00', 'vhugo@free.fr', '0112457884', 'vhugo', 'e78974f9c242f9efa9df8df24f843b5e', 7),
(8, 'Valjean', 'Jean', '1992-01-16 00:00:00', 'jvaljean@free.fr', '0112457832', 'jvaljeanu', 'e78974f9c242f9efa9df8df24f843b5e', 8),
(17, 'melenchon', 'Jean-Luc', '1952-12-17 00:00:00', 'jmelenchon@free.fr', '0102030405', 'jmelenchon', 'f6fd339987b788ac3a0a59b88a004b7c', 11),
(18, 'Pitt', 'Bradd', '1976-12-22 00:00:00', 'bpitt@free.fr', '0201040503', 'bpitt', '25ed1bcb423b0b7200f485fc5ff71c8e', 10),
(19, 'Ruffin', 'Edouard', '1975-01-15 00:00:00', 'eruffin@free.fr', '0202010405', 'eruffin', 'e78974f9c242f9efa9df8df24f843b5e', 12),
(20, 'test', 'test', '2022-01-28 00:00:00', 'eruffin@free.fr', '0101020102', 'test', 'e78974f9c242f9efa9df8df24f843b5e', 13),
(21, 'rututu', 'dsqsdqsdqqsd', '2022-01-06 00:00:00', 'toto@free.fr', '0121452114', 'atest', 'e78974f9c242f9efa9df8df24f843b5e', 14),
(22, 'Hugo', 'victor', '2022-01-05 00:00:00', 'vhugo@free.fr', '012145457', 'vhugo', '721a9b52bfceacc503c056e3b9b93cfa', 15);

-- --------------------------------------------------------

--
-- Structure de la table `personne_livre`
--

CREATE TABLE `personne_livre` (
  `personne_id` int(11) NOT NULL,
  `livre_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `personne_livre`
--

INSERT INTO `personne_livre` (`personne_id`, `livre_id`) VALUES
(7, 3),
(7, 9),
(8, 1),
(8, 2),
(8, 3),
(17, 1),
(17, 2),
(17, 3),
(17, 9),
(17, 10),
(19, 9),
(20, 2);

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(180) COLLATE utf8mb4_unicode_ci NOT NULL,
  `roles` longtext COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '(DC2Type:json)',
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id`, `username`, `roles`, `password`) VALUES
(1, 'pascal', '[\"ROLE_ADMIN\"]', '$2y$13$/48iDosINmRU2LomL6n1FOqzeg4YWxNiu7MYOZJGbj8KMR2SKFA9e'),
(2, 'user', '[\"ROLE_USER\"]', '$2y$13$7zqWfEHqr2GnJ.6OEY3hpOsHfQqTcC0P2hiM8tphkv8arhGxiHmVa');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `achat_produits`
--
ALTER TABLE `achat_produits`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_451259A6A21BD112` (`personne_id`);

--
-- Index pour la table `adresse`
--
ALTER TABLE `adresse`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `doctrine_migration_versions`
--
ALTER TABLE `doctrine_migration_versions`
  ADD PRIMARY KEY (`version`);

--
-- Index pour la table `livre`
--
ALTER TABLE `livre`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `personne`
--
ALTER TABLE `personne`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_FCEC9EF4DE7DC5C` (`adresse_id`);

--
-- Index pour la table `personne_livre`
--
ALTER TABLE `personne_livre`
  ADD PRIMARY KEY (`personne_id`,`livre_id`),
  ADD KEY `IDX_B8825EF0A21BD112` (`personne_id`),
  ADD KEY `IDX_B8825EF037D925CB` (`livre_id`);

--
-- Index pour la table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_8D93D649F85E0677` (`username`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `achat_produits`
--
ALTER TABLE `achat_produits`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT pour la table `adresse`
--
ALTER TABLE `adresse`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT pour la table `livre`
--
ALTER TABLE `livre`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT pour la table `personne`
--
ALTER TABLE `personne`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `achat_produits`
--
ALTER TABLE `achat_produits`
  ADD CONSTRAINT `FK_451259A6A21BD112` FOREIGN KEY (`personne_id`) REFERENCES `personne` (`id`);

--
-- Contraintes pour la table `personne`
--
ALTER TABLE `personne`
  ADD CONSTRAINT `FK_FCEC9EF4DE7DC5C` FOREIGN KEY (`adresse_id`) REFERENCES `adresse` (`id`);

--
-- Contraintes pour la table `personne_livre`
--
ALTER TABLE `personne_livre`
  ADD CONSTRAINT `FK_B8825EF037D925CB` FOREIGN KEY (`livre_id`) REFERENCES `livre` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_B8825EF0A21BD112` FOREIGN KEY (`personne_id`) REFERENCES `personne` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
