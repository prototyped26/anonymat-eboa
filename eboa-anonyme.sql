-- phpMyAdmin SQL Dump
-- version 4.8.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le :  lun. 29 oct. 2018 à 11:38
-- Version du serveur :  10.1.33-MariaDB
-- Version de PHP :  7.2.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `eboa-anonyme`
--

-- --------------------------------------------------------

--
-- Structure de la table `anonymat`
--

CREATE TABLE `anonymat` (
  `id` int(11) NOT NULL,
  `eleve_id` int(11) NOT NULL,
  `epreuve_id` int(11) NOT NULL,
  `numero` varchar(200) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `anonymat`
--

INSERT INTO `anonymat` (`id`, `eleve_id`, `epreuve_id`, `numero`, `created_at`, `updated_at`) VALUES
(1, 4, 1, '201801ENS04P001', '2018-10-28 22:16:55', '2018-10-28 21:16:55'),
(2, 2, 1, '201801ENS02P001', '2018-10-28 22:16:55', '2018-10-28 21:16:55'),
(3, 1, 1, '201801ENS01P001', '2018-10-28 22:16:55', '2018-10-28 21:16:55'),
(4, 3, 1, '201801ENS03P001', '2018-10-28 22:16:55', '2018-10-28 21:16:54'),
(5, 4, 1, '201801ENS04P100', '2018-10-28 21:20:23', '2018-10-28 21:20:23'),
(6, 3, 1, '201801ENS03P001', '2018-10-28 21:20:23', '2018-10-28 21:20:23'),
(7, 1, 1, '201801ENS01P001', '2018-10-28 21:20:23', '2018-10-28 21:20:23'),
(8, 2, 1, '201801ENS02P001', '2018-10-28 21:20:23', '2018-10-28 21:20:23');

-- --------------------------------------------------------

--
-- Structure de la table `cycle`
--

CREATE TABLE `cycle` (
  `id` int(11) NOT NULL,
  `label` varchar(45) DEFAULT NULL,
  `desc` varchar(45) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `cycle`
--

INSERT INTO `cycle` (`id`, `label`, `desc`, `created_at`, `updated_at`) VALUES
(1, '1er Cycle', 'Premier Cycle', '2018-10-25 05:51:59', '2018-10-25 05:51:59'),
(2, '2nd Cycle', 'Second Cycle', '2018-10-26 13:37:52', '2018-10-26 13:37:52');

-- --------------------------------------------------------

--
-- Structure de la table `eleve`
--

CREATE TABLE `eleve` (
  `id` int(11) NOT NULL,
  `num_enregistrement` varchar(100) DEFAULT NULL,
  `nom` varchar(200) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `prenom` varchar(250) DEFAULT NULL,
  `date_naiss` varchar(45) DEFAULT NULL,
  `lieu_naiss` varchar(200) DEFAULT NULL,
  `option_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `eleve`
--

INSERT INTO `eleve` (`id`, `num_enregistrement`, `nom`, `created_at`, `updated_at`, `prenom`, `date_naiss`, `lieu_naiss`, `option_id`) VALUES
(1, 'ABENS0001', 'KENFACK', '2018-10-28 19:36:25', '2018-10-28 19:36:25', 'Manuel Loic', '12-12-2018', 'Yaoundé', 2),
(2, 'EBOENS0002', 'TEMEZING', '2018-10-28 19:56:32', '2018-10-28 19:56:32', 'Ornel Edlly', '12-12-2018', 'Yaoundé', 2),
(3, 'EBOENS0004', 'TCHANKEU', '2018-10-28 19:57:34', '2018-10-28 19:57:34', 'Rodolphe', '12-12-2018', 'Yaoundé', 2),
(4, 'EBOENS0005', 'MEKONSTO NDE', '2018-10-28 19:58:36', '2018-10-28 19:58:36', 'Ernest', '12-12-2018', 'Yaoundé', 2);

-- --------------------------------------------------------

--
-- Structure de la table `epreuve`
--

CREATE TABLE `epreuve` (
  `id` int(11) NOT NULL,
  `label` varchar(45) DEFAULT NULL,
  `desc` varchar(45) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `epreuve`
--

INSERT INTO `epreuve` (`id`, `label`, `desc`, `created_at`, `updated_at`) VALUES
(1, '1er Epreuve', 'Première épreuve du concours', '2018-10-26 16:27:52', '2018-10-26 16:27:52'),
(2, '2eme Epreuve', 'Deuxième épreuve du concours', '2018-10-28 18:33:57', '2018-10-28 18:33:57');

-- --------------------------------------------------------

--
-- Structure de la table `filiere`
--

CREATE TABLE `filiere` (
  `id` int(11) NOT NULL,
  `label` varchar(45) DEFAULT NULL,
  `desc` varchar(254) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `cycle_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `filiere`
--

INSERT INTO `filiere` (`id`, `label`, `desc`, `created_at`, `updated_at`, `cycle_id`) VALUES
(1, 'INGENIEURS & INDUSTRIELS', 'SCIENCES DE L’INGÉNIEUR ET TECHNIQUES INDUSTRIELLES', '2018-10-27 18:44:23', '2018-10-28 18:51:39', 1);

-- --------------------------------------------------------

--
-- Structure de la table `matiere`
--

CREATE TABLE `matiere` (
  `id` int(11) NOT NULL,
  `option_id` int(11) NOT NULL,
  `epreuve_id` int(11) NOT NULL,
  `label` varchar(254) DEFAULT NULL,
  `desc` longtext,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `matiere`
--

INSERT INTO `matiere` (`id`, `option_id`, `epreuve_id`, `label`, `desc`, `created_at`, `updated_at`) VALUES
(1, 2, 1, 'Informatique', 'Informatique programme Licence', '2018-10-28 19:04:57', '2018-10-28 19:04:57'),
(2, 2, 2, 'Mathématiques L3', 'Mathématiques programme de licence 3 de technologie', '2018-10-28 19:31:10', '2018-10-28 19:31:10');

-- --------------------------------------------------------

--
-- Structure de la table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2016_06_01_000001_create_oauth_auth_codes_table', 1),
(4, '2016_06_01_000002_create_oauth_access_tokens_table', 1),
(5, '2016_06_01_000003_create_oauth_refresh_tokens_table', 1),
(6, '2016_06_01_000004_create_oauth_clients_table', 1),
(7, '2016_06_01_000005_create_oauth_personal_access_clients_table', 1);

-- --------------------------------------------------------

--
-- Structure de la table `note`
--

CREATE TABLE `note` (
  `anonymat_id` int(11) NOT NULL,
  `matiere_id` int(11) NOT NULL,
  `valeur` decimal(10,0) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `oauth_access_tokens`
--

CREATE TABLE `oauth_access_tokens` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `client_id` int(11) NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `oauth_access_tokens`
--

INSERT INTO `oauth_access_tokens` (`id`, `user_id`, `client_id`, `name`, `scopes`, `revoked`, `created_at`, `updated_at`, `expires_at`) VALUES
('01cca54d575293bb57722904cbbeecd07447f3d1c8ecba4f3eb4abed111078846ced5ce82a349d7f', 1, 3, 'MyApp', '[]', 0, '2018-10-25 15:48:46', '2018-10-25 15:48:46', '2019-10-25 16:48:46'),
('36f63e7782c1cf5e61b12773cf1e10e3bf307b4119e51a4629e3299e305c9d5333bd3ac0302e1129', 1, 3, 'TutsForWeb', '[]', 0, '2018-10-28 21:27:15', '2018-10-28 21:27:15', '2019-10-28 22:27:15'),
('385f96351f5be55f98401dcfc3630630076ec6bce65765267e2d47ea2c7ec4a3133ee4989a73c676', 1, 3, 'TutsForWeb', '[]', 1, '2018-10-26 11:51:15', '2018-10-26 11:51:15', '2019-10-26 12:51:15'),
('5e48b344a1d71b3fb6284664b44c460ec2abcede72a187e67f24d69e4c73b0715ff4f27510c39b11', 1, 3, 'MyApp', '[]', 1, '2018-10-26 10:13:12', '2018-10-26 10:13:12', '2019-10-26 11:13:12'),
('835abe9583b233354593bc747091ca13320340b295a91488a524efd8884c0d6b5c8cf7d70c7701a8', 1, 3, 'MyApp', '[]', 1, '2018-10-25 04:39:24', '2018-10-25 04:39:24', '2019-10-25 05:39:24'),
('99debb075fb3d04969d323d089e4aa48689925388972795ac555eca02a3ceacf36990d5d06b6da71', 1, 3, 'MyApp', '[]', 0, '2018-10-26 11:01:36', '2018-10-26 11:01:36', '2019-10-26 12:01:36'),
('a8798947662485139314607df49820997f2f7eb8fb3317cca689e217caadd68f7d6d517061c11895', 1, 3, 'TutsForWeb', '[]', 0, '2018-10-26 11:12:21', '2018-10-26 11:12:21', '2019-10-26 12:12:21'),
('b5b7824776a66f8e5c2d863cf358156757cccecc8de8d730da871dc9a5f7c9baab02a63ffb9a4d50', 2, 3, 'TutsForWeb', '[]', 0, '2018-10-26 12:00:06', '2018-10-26 12:00:06', '2019-10-26 13:00:06'),
('f0af9dd98e750a2c43e1bdf858a32ef2a9d632fcf6327eac83c9ad0fb0f0e29f6571fb22ac99282c', 1, 3, 'MyApp', '[]', 0, '2018-10-25 07:27:23', '2018-10-25 07:27:23', '2019-10-25 08:27:23');

-- --------------------------------------------------------

--
-- Structure de la table `oauth_auth_codes`
--

CREATE TABLE `oauth_auth_codes` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(11) NOT NULL,
  `client_id` int(11) NOT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `oauth_clients`
--

CREATE TABLE `oauth_clients` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `secret` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `redirect` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `personal_access_client` tinyint(1) NOT NULL,
  `password_client` tinyint(1) NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `oauth_clients`
--

INSERT INTO `oauth_clients` (`id`, `user_id`, `name`, `secret`, `redirect`, `personal_access_client`, `password_client`, `revoked`, `created_at`, `updated_at`) VALUES
(1, NULL, 'Laravel Personal Access Client', 'liboiTzc5s0Wi5dLqWyFYOG1jVJ0NX3Rs1hJlggr', 'http://localhost', 1, 0, 0, '2018-10-25 04:38:25', '2018-10-25 04:38:25'),
(2, NULL, 'Laravel Password Grant Client', '12HMlfw4RgzrJ2vfyLN19Ijbebxfd3a8lvHje9NB', 'http://localhost', 0, 1, 0, '2018-10-25 04:38:25', '2018-10-25 04:38:25'),
(3, NULL, 'Laravel Personal Access Client', 'wapv2hdQZb4eA5Nuugf2ldVsg3Ar69ZIZT9EARCw', 'http://localhost', 1, 0, 0, '2018-10-25 04:38:44', '2018-10-25 04:38:44'),
(4, NULL, 'Laravel Password Grant Client', 'uAaBOABQChfvSzNnwLipf14Sd6r9MvLSzzm66NMq', 'http://localhost', 0, 1, 0, '2018-10-25 04:38:44', '2018-10-25 04:38:44');

-- --------------------------------------------------------

--
-- Structure de la table `oauth_personal_access_clients`
--

CREATE TABLE `oauth_personal_access_clients` (
  `id` int(10) UNSIGNED NOT NULL,
  `client_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `oauth_personal_access_clients`
--

INSERT INTO `oauth_personal_access_clients` (`id`, `client_id`, `created_at`, `updated_at`) VALUES
(1, 1, '2018-10-25 04:38:25', '2018-10-25 04:38:25'),
(2, 3, '2018-10-25 04:38:44', '2018-10-25 04:38:44');

-- --------------------------------------------------------

--
-- Structure de la table `oauth_refresh_tokens`
--

CREATE TABLE `oauth_refresh_tokens` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `access_token_id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `option`
--

CREATE TABLE `option` (
  `id` int(11) NOT NULL,
  `label` varchar(45) DEFAULT NULL,
  `desc` varchar(45) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `filiere_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `option`
--

INSERT INTO `option` (`id`, `label`, `desc`, `created_at`, `updated_at`, `filiere_id`) VALUES
(1, 'TIC APP', NULL, '2018-10-27 19:01:49', '2018-10-27 19:01:49', 1),
(2, 'Informatique Industrielle', NULL, '2018-10-28 18:56:45', '2018-10-28 18:56:45', 1);

-- --------------------------------------------------------

--
-- Structure de la table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `role`
--

CREATE TABLE `role` (
  `id` int(11) NOT NULL,
  `label` varchar(45) DEFAULT NULL,
  `desc` varchar(45) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `role`
--

INSERT INTO `role` (`id`, `label`, `desc`, `created_at`, `updated_at`) VALUES
(1, 'ADMINSTRATEUR', 'Admin Système', NULL, NULL),
(2, 'NOTATION', 'Insertion Notes', NULL, NULL),
(3, 'ANONYMAT', 'Gestion des anonymats', NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(125) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `password` varchar(254) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `role_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `password`, `created_at`, `updated_at`, `role_id`) VALUES
(1, 'ADMIN PRO', 'admin@gmail.com', '$2y$10$WmihZ971ESlFuvbULa2wveDCL9Kgdj09xPNSB5YZcwfv232BQM9TC', '2018-10-25 04:20:36', '2018-10-25 04:20:36', 1),
(2, 'DEV ADMIN', 'dev@cardonegroup.com', '$2y$10$xqgBzquvYRfcDfPG7CB0juA7hZyiAsVNDPugg/WZMGHyqg3/tEiPa', '2018-10-26 11:59:48', '2018-10-26 11:59:48', 1);

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `anonymat`
--
ALTER TABLE `anonymat`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_eleve_has_epreuve_epreuve1_idx` (`epreuve_id`),
  ADD KEY `fk_eleve_has_epreuve_eleve1_idx` (`eleve_id`);

--
-- Index pour la table `cycle`
--
ALTER TABLE `cycle`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `eleve`
--
ALTER TABLE `eleve`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_eleve_option1_idx` (`option_id`);

--
-- Index pour la table `epreuve`
--
ALTER TABLE `epreuve`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `filiere`
--
ALTER TABLE `filiere`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_filiere_cycle1_idx` (`cycle_id`);

--
-- Index pour la table `matiere`
--
ALTER TABLE `matiere`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_option_has_epreuve_epreuve1_idx` (`epreuve_id`),
  ADD KEY `fk_option_has_epreuve_option1_idx` (`option_id`);

--
-- Index pour la table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `note`
--
ALTER TABLE `note`
  ADD KEY `fk_anonymat_has_matiere_matiere1_idx` (`matiere_id`),
  ADD KEY `fk_anonymat_has_matiere_anonymat1_idx` (`anonymat_id`);

--
-- Index pour la table `oauth_access_tokens`
--
ALTER TABLE `oauth_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_access_tokens_user_id_index` (`user_id`);

--
-- Index pour la table `oauth_auth_codes`
--
ALTER TABLE `oauth_auth_codes`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `oauth_clients`
--
ALTER TABLE `oauth_clients`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_clients_user_id_index` (`user_id`);

--
-- Index pour la table `oauth_personal_access_clients`
--
ALTER TABLE `oauth_personal_access_clients`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_personal_access_clients_client_id_index` (`client_id`);

--
-- Index pour la table `oauth_refresh_tokens`
--
ALTER TABLE `oauth_refresh_tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_refresh_tokens_access_token_id_index` (`access_token_id`);

--
-- Index pour la table `option`
--
ALTER TABLE `option`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_option_filiere1_idx` (`filiere_id`);

--
-- Index pour la table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Index pour la table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_user_role_idx` (`role_id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `anonymat`
--
ALTER TABLE `anonymat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT pour la table `cycle`
--
ALTER TABLE `cycle`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `eleve`
--
ALTER TABLE `eleve`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `epreuve`
--
ALTER TABLE `epreuve`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `filiere`
--
ALTER TABLE `filiere`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `matiere`
--
ALTER TABLE `matiere`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT pour la table `oauth_clients`
--
ALTER TABLE `oauth_clients`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `oauth_personal_access_clients`
--
ALTER TABLE `oauth_personal_access_clients`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `option`
--
ALTER TABLE `option`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `role`
--
ALTER TABLE `role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `anonymat`
--
ALTER TABLE `anonymat`
  ADD CONSTRAINT `fk_eleve_has_epreuve_eleve1` FOREIGN KEY (`eleve_id`) REFERENCES `eleve` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_eleve_has_epreuve_epreuve1` FOREIGN KEY (`epreuve_id`) REFERENCES `epreuve` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `eleve`
--
ALTER TABLE `eleve`
  ADD CONSTRAINT `fk_eleve_option1` FOREIGN KEY (`option_id`) REFERENCES `option` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `filiere`
--
ALTER TABLE `filiere`
  ADD CONSTRAINT `fk_filiere_cycle1` FOREIGN KEY (`cycle_id`) REFERENCES `cycle` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `matiere`
--
ALTER TABLE `matiere`
  ADD CONSTRAINT `fk_option_has_epreuve_epreuve1` FOREIGN KEY (`epreuve_id`) REFERENCES `epreuve` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_option_has_epreuve_option1` FOREIGN KEY (`option_id`) REFERENCES `option` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `note`
--
ALTER TABLE `note`
  ADD CONSTRAINT `fk_anonymat_has_matiere_anonymat1` FOREIGN KEY (`anonymat_id`) REFERENCES `anonymat` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_anonymat_has_matiere_matiere1` FOREIGN KEY (`matiere_id`) REFERENCES `matiere` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `option`
--
ALTER TABLE `option`
  ADD CONSTRAINT `fk_option_filiere1` FOREIGN KEY (`filiere_id`) REFERENCES `filiere` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `fk_user_role` FOREIGN KEY (`role_id`) REFERENCES `role` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
