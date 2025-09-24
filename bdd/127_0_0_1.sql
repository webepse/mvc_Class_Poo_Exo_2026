-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : mer. 24 sep. 2025 à 09:58
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
-- Base de données : `blog2`
--
CREATE DATABASE IF NOT EXISTS `blog2` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `blog2`;

-- --------------------------------------------------------

--
-- Structure de la table `comments`
--

DROP TABLE IF EXISTS `comments`;
CREATE TABLE IF NOT EXISTS `comments` (
  `id` int NOT NULL AUTO_INCREMENT,
  `post_id` int NOT NULL,
  `author` varchar(60) NOT NULL,
  `comment` text NOT NULL,
  `comment_date` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `comments`
--

INSERT INTO `comments` (`id`, `post_id`, `author`, `comment`, `comment_date`) VALUES
(1, 1, 'test', 'test test', '2018-10-18 18:36:35'),
(2, 5, 'test', 'test', '2018-11-04 13:48:54'),
(3, 6, 'test', 'testt', '2018-11-11 15:16:42'),
(4, 6, 'test', 'test', '2018-11-11 15:17:33'),
(5, 5, 'test', 'test', '2019-10-13 17:55:48'),
(6, 7, 'jo', 'dfqs', '2019-11-02 13:16:26'),
(7, 8, 'jordan', 'test test', '2020-10-18 12:33:53'),
(8, 8, 'Berti', 'test', '2020-10-23 14:49:18'),
(9, 8, 'Jordan 23', 'test 23', '2020-10-23 15:01:18'),
(10, 8, 'tedst', 'fdsqfsqdf', '2020-10-23 15:08:04'),
(11, 9, 'Jordan', ' Lorem ipsum dolor sit amet, consectetur adipiscing elit. In neque augue, malesuada id sodales et, posuere facilisis sem. Proin erat nisl, scelerisque at efficitur non, bibendum a arcu. Donec dignissim pretium quam, sed finibus leo vehicula vel. Sed vitae lorem non sem pretium tristique in fermentum purus. Nam ornare ullamcorper risus, a tristique ante vulputate eu. Curabitur vehicula posuere elit vitae dignissim. Proin eget orci quis augue pellentesque ultrices. Maecenas fringilla ultricies diam, ac maximus mauris tristique id. Curabitur cursus mattis faucibus.\r\n\r\nSuspendisse pretium a lacus ut pellentesque. Vivamus et dolor non metus ultricies dictum id ac felis. Maecenas sed pellentesque elit, sit amet dignissim eros. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae; Proin eu nibh magna. In eu bibendum ipsum. Sed velit nulla, ullamcorper ut leo sit amet, accumsan tristique mauris. Proin vitae ligula nunc. Pellentesque nulla orci, varius a purus et, pellentesque convallis enim. Curabitur vestibulum leo id accumsan ornare. ', '2020-10-27 12:00:42');

-- --------------------------------------------------------

--
-- Structure de la table `posts`
--

DROP TABLE IF EXISTS `posts`;
CREATE TABLE IF NOT EXISTS `posts` (
  `id` int NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `creation_date` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `posts`
--

INSERT INTO `posts` (`id`, `title`, `content`, `creation_date`) VALUES
(1, 'test', 'lorem', '2018-10-18 05:12:14'),
(2, 'test 2', ' Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi consectetur felis nulla, a convallis metus viverra non. Nunc interdum tincidunt mollis. Sed tincidunt blandit mi a sagittis. Duis ac elit ac nunc pellentesque sagittis. Vestibulum eu ullamcorper ex, sit amet venenatis nisi. Nam elementum, metus sed ultricies placerat, sapien augue tristique purus, in pellentesque ligula lorem vel orci. Fusce in metus et lorem finibus porta. Ut ac porttitor lectus. Suspendisse ultrices urna tellus, sed lacinia lorem interdum sit amet. Maecenas et faucibus est, in consectetur risus. Aenean cursus neque eu quam rutrum mattis. Maecenas eget augue velit.\r\n\r\nSed dictum efficitur tellus, et placerat lectus tincidunt non. Sed fermentum scelerisque urna, id mollis magna consequat id. Nam vehicula urna nibh, nec sollicitudin sapien placerat at. Aenean quis elit mi. Duis ex nisl, aliquam quis consequat eu, interdum eu odio. Mauris dapibus tortor ac felis sagittis, id aliquet velit aliquam. Nam porttitor tempor neque. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; In hac habitasse platea dictumst. Vivamus enim leo, finibus sit amet turpis quis, elementum laoreet metus. ', '2018-10-17 00:00:00'),
(3, 'test 3', ' Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi consectetur felis nulla, a convallis metus viverra non. Nunc interdum tincidunt mollis. Sed tincidunt blandit mi a sagittis. Duis ac elit ac nunc pellentesque sagittis. Vestibulum eu ullamcorper ex, sit amet venenatis nisi. Nam elementum, metus sed ultricies placerat, sapien augue tristique purus, in pellentesque ligula lorem vel orci. Fusce in metus et lorem finibus porta. Ut ac porttitor lectus. Suspendisse ultrices urna tellus, sed lacinia lorem interdum sit amet. Maecenas et faucibus est, in consectetur risus. Aenean cursus neque eu quam rutrum mattis. Maecenas eget augue velit.\r\n\r\nSed dictum efficitur tellus, et placerat lectus tincidunt non. Sed fermentum scelerisque urna, id mollis magna consequat id. Nam vehicula urna nibh, nec sollicitudin sapien placerat at. Aenean quis elit mi. Duis ex nisl, aliquam quis consequat eu, interdum eu odio. Mauris dapibus tortor ac felis sagittis, id aliquet velit aliquam. Nam porttitor tempor neque. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; In hac habitasse platea dictumst. Vivamus enim leo, finibus sit amet turpis quis, elementum laoreet metus. ', '2018-10-22 00:00:00'),
(4, 'test', 'test', '2018-10-23 18:41:35'),
(5, 'encore un test', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed odio est, ultricies viverra ipsum ut, accumsan tincidunt odio. Suspendisse hendrerit eu velit vel blandit. Aenean feugiat a nisi in congue. Nullam vitae lobortis lorem. Sed lobortis auctor neque. Suspendisse congue ullamcorper urna. Mauris ornare in ex a tincidunt. Praesent ipsum lectus, eleifend at gravida laoreet, suscipit sit amet dui. Nullam commodo augue id erat pellentesque fermentum. Curabitur sagittis augue ac elit sollicitudin, ac molestie velit condimentum. Pellentesque sit amet leo ligula. ', '2018-10-23 18:45:56'),
(6, 'nouveau test', 'test pour l\'exercice classbdd4', '2018-11-05 18:22:42'),
(7, 'test', 'test', '2019-10-12 18:31:48'),
(8, 'test 17h', 'test', '2020-10-14 17:04:57'),
(9, 'test 19', 'test', '2020-10-19 08:55:13');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
