-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : lun. 31 mars 2025 à 15:30
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
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=utf8mb4 ;

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
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 ;

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
) ENGINE=InnoDB AUTO_INCREMENT=73 DEFAULT CHARSET=utf8mb4 ;

--
-- Déchargement des données de la table `lesson`
--

INSERT INTO `lesson` (`id`, `id_module`, `description`, `is_hp`, `date`, `time_start`, `time_end`, `created_at`, `created_by`, `updated_at`, `updated_by`) VALUES
(54, 1, NULL, 0, '2024-09-06', '08:00:00', '12:00:00', '0000-00-00 00:00:00', NULL, NULL, NULL),
(55, 2, NULL, 0, '2024-09-03', '08:00:00', '12:00:00', '0000-00-00 00:00:00', NULL, NULL, NULL),
(56, 2, NULL, 0, '2024-09-04', '08:00:00', '12:00:00', '0000-00-00 00:00:00', NULL, NULL, NULL),
(57, 1, NULL, 0, '2024-09-05', '08:00:00', '12:00:00', '0000-00-00 00:00:00', NULL, NULL, NULL),
(58, 1, NULL, 0, '2024-09-02', '08:30:00', '12:30:00', '0000-00-00 00:00:00', NULL, NULL, NULL),
(59, 2, NULL, 0, '2024-09-02', '13:30:00', '16:30:00', '0000-00-00 00:00:00', NULL, NULL, NULL),
(60, 1, NULL, 0, '2024-09-05', '13:30:00', '16:30:00', '0000-00-00 00:00:00', NULL, NULL, NULL),
(61, 2, NULL, 0, '2024-09-18', '08:30:00', '12:30:00', '0000-00-00 00:00:00', NULL, NULL, NULL),
(62, 1, NULL, 0, '2024-09-18', '13:30:00', '16:30:00', '0000-00-00 00:00:00', NULL, NULL, NULL),
(63, 1, NULL, 0, '2024-09-13', '08:30:00', '12:30:00', '0000-00-00 00:00:00', NULL, NULL, NULL),
(64, 1, NULL, 0, '2024-09-13', '13:30:00', '16:30:00', '0000-00-00 00:00:00', NULL, NULL, NULL),
(65, 1, NULL, 0, '2024-09-12', '08:30:00', '12:30:00', '0000-00-00 00:00:00', NULL, NULL, NULL),
(66, 1, NULL, 0, '2024-09-12', '13:30:00', '16:30:00', '0000-00-00 00:00:00', NULL, NULL, NULL),
(67, 2, NULL, 0, '2024-09-11', '08:30:00', '12:30:00', '0000-00-00 00:00:00', NULL, NULL, NULL),
(68, 2, NULL, 0, '2024-09-20', '08:30:00', '12:30:00', '0000-00-00 00:00:00', NULL, NULL, NULL),
(69, 2, NULL, 0, '2024-09-04', '13:30:00', '16:30:00', '0000-00-00 00:00:00', NULL, NULL, NULL),
(70, 1, NULL, 0, '2024-09-03', '13:30:00', '16:30:00', '0000-00-00 00:00:00', NULL, NULL, NULL),
(71, 3, NULL, 0, '2024-09-10', '08:30:00', '12:30:00', '0000-00-00 00:00:00', NULL, NULL, NULL),
(72, 3, NULL, 0, '2024-09-10', '13:30:00', '16:30:00', '0000-00-00 00:00:00', NULL, NULL, NULL);

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
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 ;

--
-- Déchargement des données de la table `module`
--

INSERT INTO `module` (`id`, `id_class`, `id_session`, `nom`, `description`, `duration`, `color`, `is_option`, `created_at`, `created_by`, `updated_at`, `updated_by`) VALUES
(1, 1, 1, 'Module 1A', 'Description for Module 1A', 40, '#FF5733', 0, '2025-01-10 14:53:08', 'admin', NULL, NULL),
(2, 2, 2, 'Module 2B', 'Description for Module 2B', 35, '#33FF57', 1, '2025-01-10 14:53:08', 'admin', NULL, NULL),
(3, 3, 1, 'Caca boudin', NULL, 34, '#3a48f8', 1, '0000-00-00 00:00:00', NULL, NULL, NULL),
(4, 3, 1, 'fqsdfq', NULL, 0, '#72a8e6', 0, '0000-00-00 00:00:00', NULL, NULL, NULL),
(5, 3, 1, 'qsdf', NULL, 1, '#0a5051', 1, '0000-00-00 00:00:00', NULL, NULL, NULL);

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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 ;

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
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 ;

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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 ;

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
