-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Versión del servidor:         10.4.17-MariaDB - mariadb.org binary distribution
-- SO del servidor:              Win64
-- HeidiSQL Versión:             11.0.0.5919
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Volcando estructura de base de datos para curso_paginacion
CREATE DATABASE IF NOT EXISTS `curso_paginacion` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `curso_paginacion`;

-- Volcando estructura para tabla curso_paginacion.articulos
CREATE TABLE IF NOT EXISTS `articulos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `articulos` mediumtext NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4;

-- Volcando datos para la tabla curso_paginacion.articulos: ~20 rows (aproximadamente)
/*!40000 ALTER TABLE `articulos` DISABLE KEYS */;
INSERT INTO `articulos` (`id`, `articulos`) VALUES
	(1, 'Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s'),
	(2, ' Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC'),
	(3, 'The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested'),
	(4, 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form'),
	(5, 'All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary'),
	(6, ' Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.'),
	(7, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua'),
	(8, 'Nor again is there anyone who loves or pursues or desires to obtain pain of itself, because it is pain'),
	(9, 'On the other hand, we denounce with righteous indignation and dislike men who are so beguiled and demoralized by the charms of pleasure of the moment'),
	(10, 'Et harum quidem rerum facilis est et expedita distinctio'),
	(11, 'The wise man therefore always holds in these matters to this principle of selection'),
	(12, 'Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text'),
	(13, 'Various versions have evolved over the years, sometimes by accident'),
	(14, 'There are many variations of passages of Lorem Ipsum available'),
	(15, ' If you are going to use a passage of Lorem Ipsum'),
	(16, 'All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary'),
	(17, 'Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words'),
	(18, 'The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters'),
	(19, 'Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text'),
	(20, 'Various versions have evolved over the years, sometimes by accident');
/*!40000 ALTER TABLE `articulos` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
