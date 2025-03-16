-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : dim. 16 mars 2025 à 14:54
-- Version du serveur : 9.1.0
-- Version de PHP : 8.3.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `projetdoriane`
--

-- --------------------------------------------------------

--
-- Structure de la table `class`
--

DROP TABLE IF EXISTS `class`;
CREATE TABLE IF NOT EXISTS `class` (
  `id` int NOT NULL AUTO_INCREMENT,
  `id_grade` int NOT NULL,
  `nom` varchar(255) NOT NULL,
  `description` text,
  `created_at` datetime NOT NULL,
  `created_by` varchar(255) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `updated_by` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id_grade` (`id_grade`)
) ENGINE=InnoDB AUTO_INCREMENT=31 ;

--
-- Déchargement des données de la table `class`
--

INSERT INTO `class` (`id`, `id_grade`, `nom`, `description`, `created_at`, `created_by`, `updated_at`, `updated_by`) VALUES
(1, 1, 'Class 1A', 'Description for Class 1A', '2025-01-10 14:53:07', 'admin', NULL, NULL),
(2, 1, 'Class 1B', 'Description for Class 1B', '2025-01-10 14:53:07', 'admin', NULL, NULL),
(3, 1, 'Class 1C', 'Description for Class 1C', '2025-01-10 14:53:07', 'admin', NULL, NULL),
(4, 2, 'Class 2A', 'Description for Class 2A', '2025-01-10 14:53:07', 'admin', NULL, NULL),
(5, 2, 'Class 2B', 'Description for Class 2B', '2025-01-10 14:53:07', 'admin', NULL, NULL),
(6, 2, 'Class 2C', 'Description for Class 2C', '2025-01-10 14:53:07', 'admin', NULL, NULL),
(7, 3, 'Class 3A', 'Description for Class 3A', '2025-01-10 14:53:07', 'admin', NULL, NULL),
(8, 3, 'Class 3B', 'Description for Class 3B', '2025-01-10 14:53:07', 'admin', NULL, NULL),
(9, 3, 'Class 3C', 'Description for Class 3C', '2025-01-10 14:53:07', 'admin', NULL, NULL),
(10, 4, 'Class 4A', 'Description for Class 4A', '2025-01-10 14:53:07', 'admin', NULL, NULL),
(11, 4, 'Class 4B', 'Description for Class 4B', '2025-01-10 14:53:07', 'admin', NULL, NULL),
(12, 4, 'Class 4C', 'Description for Class 4C', '2025-01-10 14:53:07', 'admin', NULL, NULL),
(13, 5, 'Class 5A', 'Description for Class 5A', '2025-01-10 14:53:07', 'admin', NULL, NULL),
(14, 5, 'Class 5B', 'Description for Class 5B', '2025-01-10 14:53:07', 'admin', NULL, NULL),
(15, 5, 'Class 5C', 'Description for Class 5C', '2025-01-10 14:53:07', 'admin', NULL, NULL),
(16, 6, 'Class 6A', 'Description for Class 6A', '2025-01-10 14:53:07', 'admin', NULL, NULL),
(17, 6, 'Class 6B', 'Description for Class 6B', '2025-01-10 14:53:07', 'admin', NULL, NULL),
(18, 6, 'Class 6C', 'Description for Class 6C', '2025-01-10 14:53:07', 'admin', NULL, NULL),
(19, 7, 'Class 7A', 'Description for Class 7A', '2025-01-10 14:53:07', 'admin', NULL, NULL),
(20, 7, 'Class 7B', 'Description for Class 7B', '2025-01-10 14:53:07', 'admin', NULL, NULL),
(21, 7, 'Class 7C', 'Description for Class 7C', '2025-01-10 14:53:07', 'admin', NULL, NULL),
(22, 8, 'Class 8A', 'Description for Class 8A', '2025-01-10 14:53:07', 'admin', NULL, NULL),
(23, 8, 'Class 8B', 'Description for Class 8B', '2025-01-10 14:53:07', 'admin', NULL, NULL),
(24, 8, 'Class 8C', 'Description for Class 8C', '2025-01-10 14:53:07', 'admin', NULL, NULL),
(25, 9, 'Class 9A', 'Description for Class 9A', '2025-01-10 14:53:07', 'admin', NULL, NULL),
(26, 9, 'Class 9B', 'Description for Class 9B', '2025-01-10 14:53:07', 'admin', NULL, NULL),
(27, 9, 'Class 9C', 'Description for Class 9C', '2025-01-10 14:53:07', 'admin', NULL, NULL),
(28, 10, 'Class 10A', 'Description for Class 10A', '2025-01-10 14:53:07', 'admin', NULL, NULL),
(29, 10, 'Class 10B', 'Description for Class 10B', '2025-01-10 14:53:07', 'admin', NULL, NULL),
(30, 10, 'Class 10C', 'Description for Class 10C', '2025-01-10 14:53:07', 'admin', NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `grade`
--

DROP TABLE IF EXISTS `grade`;
CREATE TABLE IF NOT EXISTS `grade` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `description` text,
  `created_at` datetime NOT NULL,
  `created_by` varchar(255) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `updated_by` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 ;

--
-- Déchargement des données de la table `grade`
--

INSERT INTO `grade` (`id`, `name`, `description`, `created_at`, `created_by`, `updated_at`, `updated_by`) VALUES
(1, 'Grade 1', 'Description for Grade 1', '2025-01-10 14:53:07', 'admin', NULL, NULL),
(2, 'Grade 2', 'Description for Grade 2', '2025-01-10 14:53:07', 'admin', NULL, NULL),
(3, 'Grade 3', 'Description for Grade 3', '2025-01-10 14:53:07', 'admin', NULL, NULL),
(4, 'Grade 4', 'Description for Grade 4', '2025-01-10 14:53:07', 'admin', NULL, NULL),
(5, 'Grade 5', 'Description for Grade 5', '2025-01-10 14:53:07', 'admin', NULL, NULL),
(6, 'Grade 6', 'Description for Grade 6', '2025-01-10 14:53:07', 'admin', NULL, NULL),
(7, 'Grade 7', 'Description for Grade 7', '2025-01-10 14:53:07', 'admin', NULL, NULL),
(8, 'Grade 8', 'Description for Grade 8', '2025-01-10 14:53:07', 'admin', NULL, NULL),
(9, 'Grade 9', 'Description for Grade 9', '2025-01-10 14:53:07', 'admin', NULL, NULL),
(10, 'Grade 10', 'Description for Grade 10', '2025-01-10 14:53:07', 'admin', NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `lesson`
--

DROP TABLE IF EXISTS `lesson`;
CREATE TABLE IF NOT EXISTS `lesson` (
  `id` int NOT NULL AUTO_INCREMENT,
  `id_module` int NOT NULL,
  `description` text,
  `is_hp` tinyint(1) NOT NULL DEFAULT '0',
  `date` date NOT NULL,
  `time_start` time NOT NULL,
  `time_end` time NOT NULL,
  `created_at` datetime NOT NULL,
  `created_by` varchar(255) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `updated_by` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id_module` (`id_module`)
) ENGINE=InnoDB AUTO_INCREMENT=54 ;

--
-- Déchargement des données de la table `lesson`
--

INSERT INTO `lesson` (`id`, `id_module`, `description`, `is_hp`, `date`, `time_start`, `time_end`, `created_at`, `created_by`, `updated_at`, `updated_by`) VALUES
(1, 1, 'Lesson 1 on Algebra', 0, '2024-09-16', '08:30:00', '12:30:00', '2025-01-10 14:53:08', 'admin', NULL, NULL),
(2, 2, 'Lesson 2 on Geometry', 0, '2024-01-16', '00:00:00', '11:00:00', '2025-01-10 14:53:08', 'admin', NULL, NULL),
(3, 1, 'machin', 0, '2024-01-23', '00:00:00', '12:00:00', '0000-00-00 00:00:00', NULL, NULL, NULL),
(4, 1, 'Introduction aux équations linéaires', 0, '2024-09-05', '09:00:00', '12:00:00', '2025-02-20 08:30:00', 'admin', NULL, NULL),
(5, 2, 'Triangles et théorème de Pythagore', 0, '2024-09-12', '13:30:00', '16:30:00', '2025-02-20 08:31:00', 'admin', NULL, NULL),
(6, 1, 'Résolution de systèmes d\'équations', 0, '2024-09-25', '09:00:00', '12:00:00', '2025-02-20 08:32:00', 'admin', NULL, NULL),
(7, 2, 'Cercles et périmètres', 1, '2024-10-04', '14:00:00', '17:00:00', '2025-02-20 08:33:00', 'admin', NULL, NULL),
(8, 1, 'Fonctions polynomiales', 0, '2024-10-18', '10:00:00', '13:00:00', '2025-02-20 08:34:00', 'admin', NULL, NULL),
(9, 2, 'Trigonométrie fondamentale', 0, '2024-11-05', '09:30:00', '12:30:00', '2025-02-20 08:35:00', 'admin', NULL, NULL),
(10, 1, 'Logarithmes et fonctions exponentielles', 1, '2024-11-22', '14:00:00', '17:00:00', '2025-02-20 08:36:00', 'admin', NULL, NULL),
(11, 2, 'Transformations géométriques', 0, '2024-12-10', '09:00:00', '12:00:00', '2025-02-20 08:37:00', 'admin', NULL, NULL),
(12, 1, 'Calcul différentiel', 0, '2025-01-15', '13:30:00', '16:30:00', '2025-02-20 08:38:00', 'admin', NULL, NULL),
(13, 2, 'Géométrie vectorielle', 1, '2025-01-29', '10:00:00', '13:00:00', '2025-02-20 08:39:00', 'admin', NULL, NULL),
(14, 1, 'Suites et séries', 0, '2025-02-12', '09:00:00', '12:00:00', '2025-02-20 08:40:00', 'admin', NULL, NULL),
(15, 2, 'Coniques et sections', 0, '2025-02-26', '14:00:00', '17:00:00', '2025-02-20 08:41:00', 'admin', NULL, NULL),
(16, 1, 'Algèbre linéaire avancée', 1, '2025-03-11', '09:30:00', '12:30:00', '2025-02-20 08:42:00', 'admin', NULL, NULL),
(17, 2, 'Géométrie dans l\'espace', 0, '2025-04-02', '13:30:00', '16:30:00', '2025-02-20 08:43:00', 'admin', NULL, NULL),
(18, 1, 'Théorie des nombres', 0, '2025-04-16', '10:00:00', '13:00:00', '2025-02-20 08:44:00', 'admin', NULL, NULL),
(19, 2, 'Symétries et groupes', 0, '2025-05-07', '09:00:00', '12:00:00', '2025-02-20 08:45:00', 'admin', NULL, NULL),
(20, 1, 'Optimisation et méthodes numériques', 1, '2025-05-21', '14:00:00', '17:00:00', '2025-02-20 08:46:00', 'admin', NULL, NULL),
(21, 2, 'Géométrie différentielle', 0, '2025-06-04', '10:30:00', '13:30:00', '2025-02-20 08:47:00', 'admin', NULL, NULL),
(22, 1, 'Analyse fonctionnelle', 0, '2025-07-02', '09:00:00', '12:00:00', '2025-02-20 08:48:00', 'admin', NULL, NULL),
(23, 2, 'Topologie élémentaire', 1, '2025-08-13', '14:00:00', '17:00:00', '2025-02-20 08:49:00', 'admin', NULL, NULL),
(24, 1, 'Théorie des ensembles', 0, '2024-09-09', '08:30:00', '11:30:00', '2025-02-20 09:00:00', 'admin', NULL, NULL),
(25, 2, 'Géométrie analytique', 0, '2024-09-16', '13:00:00', '16:00:00', '2025-02-20 09:01:00', 'admin', NULL, NULL),
(26, 1, 'Factorisation polynomiale', 1, '2024-09-23', '09:30:00', '12:30:00', '2025-02-20 09:02:00', 'admin', NULL, NULL),
(27, 2, 'Transformations isométriques', 0, '2024-09-30', '14:30:00', '17:30:00', '2025-02-20 09:03:00', 'admin', NULL, NULL),
(28, 1, 'Matrices et déterminants', 0, '2024-10-07', '08:00:00', '11:00:00', '2025-02-20 09:04:00', 'admin', NULL, NULL),
(29, 2, 'Problèmes de tangente', 1, '2024-10-14', '13:30:00', '16:30:00', '2025-02-20 09:05:00', 'admin', NULL, NULL),
(30, 1, 'Inégalités mathématiques', 0, '2024-10-21', '09:00:00', '12:00:00', '2025-02-20 09:06:00', 'admin', NULL, NULL),
(31, 2, 'Courbes paramétriques', 0, '2024-10-28', '14:00:00', '17:00:00', '2025-02-20 09:07:00', 'admin', NULL, NULL),
(32, 1, 'Équations différentielles', 1, '2024-11-04', '08:30:00', '11:30:00', '2025-02-20 09:08:00', 'admin', NULL, NULL),
(33, 2, 'Polyèdres réguliers', 0, '2024-11-11', '13:00:00', '16:00:00', '2025-02-20 09:09:00', 'admin', NULL, NULL),
(34, 1, 'Théorie des graphes', 0, '2024-11-18', '09:30:00', '12:30:00', '2025-02-20 09:10:00', 'admin', NULL, NULL),
(35, 2, 'Probabilité géométrique', 1, '2024-11-25', '14:30:00', '17:30:00', '2025-02-20 09:11:00', 'admin', NULL, NULL),
(36, 1, 'Intégration numérique', 0, '2024-12-02', '08:00:00', '11:00:00', '2025-02-20 09:12:00', 'admin', NULL, NULL),
(37, 2, 'Fractales élémentaires', 0, '2024-12-09', '13:30:00', '16:30:00', '2025-02-20 09:13:00', 'admin', NULL, NULL),
(38, 1, 'Séries de Fourier', 1, '2024-12-16', '09:00:00', '12:00:00', '2025-02-20 09:14:00', 'admin', NULL, NULL),
(39, 2, 'Projection stéréographique', 0, '2025-01-06', '14:00:00', '17:00:00', '2025-02-20 09:15:00', 'admin', NULL, NULL),
(40, 1, 'Cryptographie algébrique', 0, '2025-01-13', '08:30:00', '11:30:00', '2025-02-20 09:16:00', 'admin', NULL, NULL),
(41, 2, 'Coordonnées polaires', 1, '2025-01-20', '13:00:00', '16:00:00', '2025-02-20 09:17:00', 'admin', NULL, NULL),
(42, 1, 'Logique mathématique', 0, '2025-01-27', '09:30:00', '12:30:00', '2025-02-20 09:18:00', 'admin', NULL, NULL),
(43, 2, 'Solides de révolution', 0, '2025-02-03', '14:30:00', '17:30:00', '2025-02-20 09:19:00', 'admin', NULL, NULL),
(44, 1, 'Groupes et anneaux', 1, '2025-02-10', '08:00:00', '11:00:00', '2025-02-20 09:20:00', 'admin', NULL, NULL),
(45, 2, 'Géométrie projective', 0, '2025-02-17', '13:30:00', '16:30:00', '2025-02-20 09:21:00', 'admin', NULL, NULL),
(46, 1, 'Approximation de fonctions', 0, '2025-03-03', '09:00:00', '12:00:00', '2025-02-20 09:22:00', 'admin', NULL, NULL),
(47, 2, 'Tessellations du plan', 1, '2025-03-17', '14:00:00', '17:00:00', '2025-02-20 09:23:00', 'admin', NULL, NULL),
(48, 1, 'Méthodes asymptotiques', 0, '2025-03-31', '08:30:00', '11:30:00', '2025-02-20 09:24:00', 'admin', NULL, NULL),
(49, 2, 'Géométrie hyperbolique', 0, '2025-04-14', '13:00:00', '16:00:00', '2025-02-20 09:25:00', 'admin', NULL, NULL),
(50, 1, 'Théorie de Galois', 1, '2025-04-28', '09:30:00', '12:30:00', '2025-02-20 09:26:00', 'admin', NULL, NULL),
(51, 2, 'Sphères de Dandelin', 0, '2025-05-12', '14:30:00', '17:30:00', '2025-02-20 09:27:00', 'admin', NULL, NULL),
(52, 1, 'Analyse complexe', 0, '2025-05-26', '08:00:00', '11:00:00', '2025-02-20 09:28:00', 'admin', NULL, NULL),
(53, 2, 'Géométrie non euclidienne', 1, '2025-06-09', '13:30:00', '16:30:00', '2025-02-20 09:29:00', 'admin', NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `module`
--

DROP TABLE IF EXISTS `module`;
CREATE TABLE IF NOT EXISTS `module` (
  `id` int NOT NULL AUTO_INCREMENT,
  `id_class` int NOT NULL,
  `id_session` int NOT NULL,
  `nom` varchar(255) NOT NULL,
  `description` text,
  `duration` int DEFAULT NULL,
  `color` varchar(7) DEFAULT NULL,
  `is_option` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` datetime NOT NULL,
  `created_by` varchar(255) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `updated_by` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id_class` (`id_class`),
  KEY `id_session` (`id_session`)
) ENGINE=InnoDB AUTO_INCREMENT=3 ;

--
-- Déchargement des données de la table `module`
--

INSERT INTO `module` (`id`, `id_class`, `id_session`, `nom`, `description`, `duration`, `color`, `is_option`, `created_at`, `created_by`, `updated_at`, `updated_by`) VALUES
(1, 1, 1, 'Module 1A', 'Description for Module 1A', 40, '#FF5733', 0, '2025-01-10 14:53:08', 'admin', NULL, NULL),
(2, 2, 2, 'Module 2B', 'Description for Module 2B', 35, '#33FF57', 1, '2025-01-10 14:53:08', 'admin', NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `module_teacher`
--

DROP TABLE IF EXISTS `module_teacher`;
CREATE TABLE IF NOT EXISTS `module_teacher` (
  `id` int NOT NULL AUTO_INCREMENT,
  `id_teacher` int NOT NULL,
  `id_module` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_teacher` (`id_teacher`),
  KEY `id_module` (`id_module`)
) ENGINE=InnoDB AUTO_INCREMENT=3 ;

--
-- Déchargement des données de la table `module_teacher`
--

INSERT INTO `module_teacher` (`id`, `id_teacher`, `id_module`) VALUES
(1, 1, 1),
(2, 2, 2);

-- --------------------------------------------------------

--
-- Structure de la table `session`
--

DROP TABLE IF EXISTS `session`;
CREATE TABLE IF NOT EXISTS `session` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `description` text,
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` datetime NOT NULL,
  `created_by` varchar(255) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `updated_by` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 ;

--
-- Déchargement des données de la table `session`
--

INSERT INTO `session` (`id`, `name`, `description`, `is_active`, `created_at`, `created_by`, `updated_at`, `updated_by`) VALUES
(1, 'Session 2021', 'Description for Session 2021', 1, '2025-01-10 14:53:08', 'admin', NULL, NULL),
(2, 'Session 2022', 'Description for Session 2022', 1, '2025-01-10 14:53:08', 'admin', NULL, NULL),
(3, 'Session 2023', 'Description for Session 2023', 1, '2025-01-10 14:53:08', 'admin', NULL, NULL),
(4, 'Session 2024', 'Description for Session 2024', 1, '2025-01-10 14:53:08', 'admin', NULL, NULL),
(5, 'Session 2025', 'Description for Session 2025', 1, '2025-01-10 14:53:08', 'admin', NULL, NULL),
(6, 'Session 2026', 'Description for Session 2026', 0, '2025-01-10 14:53:08', 'admin', NULL, NULL),
(7, 'Session 2027', 'Description for Session 2027', 0, '2025-01-10 14:53:08', 'admin', NULL, NULL),
(8, 'Session 2028', 'Description for Session 2028', 1, '2025-01-10 14:53:08', 'admin', NULL, NULL),
(9, 'Session 2029', 'Description for Session 2029', 1, '2025-01-10 14:53:08', 'admin', NULL, NULL),
(10, 'Session 2030', 'Description for Session 2030', 1, '2025-01-10 14:53:08', 'admin', NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `teacher`
--

DROP TABLE IF EXISTS `teacher`;
CREATE TABLE IF NOT EXISTS `teacher` (
  `id` int NOT NULL AUTO_INCREMENT,
  `lastname` varchar(255) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `description` text,
  `created_at` datetime NOT NULL,
  `created_by` varchar(255) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `updated_by` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 ;

--
-- Déchargement des données de la table `teacher`
--

INSERT INTO `teacher` (`id`, `lastname`, `firstname`, `email`, `description`, `created_at`, `created_by`, `updated_at`, `updated_by`) VALUES
(1, 'Smith', 'John', 'jsmith@example.com', 'Expert in Math', '2025-01-10 14:53:08', 'admin', NULL, NULL),
(2, 'Doe', 'Jane', 'jdoe@example.com', 'Science Specialist', '2025-01-10 14:53:08', 'admin', NULL, NULL);

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `class`
--
ALTER TABLE `class`
  ADD CONSTRAINT `class_ibfk_1` FOREIGN KEY (`id_grade`) REFERENCES `grade` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `lesson`
--
ALTER TABLE `lesson`
  ADD CONSTRAINT `lesson_ibfk_1` FOREIGN KEY (`id_module`) REFERENCES `module` (`id`);

--
-- Contraintes pour la table `module`
--
ALTER TABLE `module`
  ADD CONSTRAINT `module_ibfk_1` FOREIGN KEY (`id_class`) REFERENCES `class` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `module_ibfk_2` FOREIGN KEY (`id_session`) REFERENCES `session` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `module_teacher`
--
ALTER TABLE `module_teacher`
  ADD CONSTRAINT `module_teacher_ibfk_1` FOREIGN KEY (`id_teacher`) REFERENCES `teacher` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `module_teacher_ibfk_2` FOREIGN KEY (`id_module`) REFERENCES `module` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
