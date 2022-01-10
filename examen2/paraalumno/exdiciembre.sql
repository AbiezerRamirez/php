-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Versión del servidor:         10.4.21-MariaDB - mariadb.org binary distribution
-- SO del servidor:              Win64
-- HeidiSQL Versión:             11.2.0.6213
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Volcando estructura de base de datos para exdiciembre
CREATE DATABASE IF NOT EXISTS `exdiciembre` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci */;
USE `exdiciembre`;

-- Volcando estructura para tabla exdiciembre.alias_clave
CREATE TABLE IF NOT EXISTS `alias_clave` (
  `dni` char(8) COLLATE utf8mb4_spanish_ci NOT NULL,
  `alias` varchar(20) COLLATE utf8mb4_spanish_ci NOT NULL,
  `clave` varchar(256) COLLATE utf8mb4_spanish_ci NOT NULL,
  PRIMARY KEY (`dni`),
  UNIQUE KEY `alias` (`alias`),
  CONSTRAINT `alias_clave_ibfk_1` FOREIGN KEY (`dni`) REFERENCES `persona` (`DNI`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

-- Volcando datos para la tabla exdiciembre.alias_clave: ~11 rows (aproximadamente)
DELETE FROM `alias_clave`;
/*!40000 ALTER TABLE `alias_clave` DISABLE KEYS */;
INSERT INTO `alias_clave` (`dni`, `alias`, `clave`) VALUES
	('00296770', 'joseangel', '$2y$10$SCGJMXYxeyILGgWvaFxVp.OchGxTUtqWgwUJ5wyDgQrRUim9CH9ca'),
	('16488117', 'fernando', '$2y$10$xpc7EwsBWpOtqEuZFVcT7OAx18j4tbES664bT3WU2yUcMnc1ssF/i'),
	('32683973', 'lourdes', '$2y$10$RUrVQ8Zq3t/z/RQRVyFWD.JlWSN7/nQV.3AKiubPBj0CJqcRIsJnO'),
	('32752131', 'carmen', '$2y$10$8HrxZcCJI5Tp/7re67rrJuqB/pFpdXwDmjuwx6PkMnAOUIEUJ2B/q'),
	('35753171', 'jorge', '$2y$10$sItPr5Y3Wznnj.xGvKRU2OLAWUCrY9NZMxjwjpGLmLLgRmIfbe2C2'),
	('48906002', 'pedro', '$2y$10$NhU/NaP9Vp5oM0YpWoFLxeGW.sMA75GqqSaZn8oUQckz1WysFWnJq'),
	('49471767', 'cruz', '$2y$10$xpFxCYBudt7RWFCIIY.01.jC06wwVKIautv.KKaAyBYq2zrxVXYCy'),
	('50495457', 'carlos', '$2y$10$vuwHGTpl5Ftf.4.9203UBeXtjPKXb2g3rws9d2BucKjmGiMByxhNe'),
	('54658699', 'marisol', '$2y$10$6e2UxNT10CNglpA8Pfwvt.cl5Yx.fFgCFAF0xi8PkFMT5fX6xgZg.'),
	('67123987', 'julio', '$2y$10$5ldGL9GW18tXl3TTf2V6nulMCZ72PVwhEs0Pruzaby/nMBwF/gJu6'),
	('86736996', 'teresa', '$2y$10$/BFkJPi0JxF5DsFJtjQGtOkJ27ofGULRHuUs53SbNnGHJ9Ejixqgq'),
	('87496546', 'luis', '$2y$10$IplV..D4/jcH.ebacpur/e0D4a/nTIlPE2GSfGtcefn/Bw.cI95H.');
/*!40000 ALTER TABLE `alias_clave` ENABLE KEYS */;

-- Volcando estructura para tabla exdiciembre.asignaturas
CREATE TABLE IF NOT EXISTS `asignaturas` (
  `idAsignatura` int(10) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(25) COLLATE utf8mb4_spanish_ci NOT NULL,
  `dniprofesor` char(8) COLLATE utf8mb4_spanish_ci NOT NULL,
  PRIMARY KEY (`idAsignatura`),
  KEY `indice` (`dniprofesor`),
  CONSTRAINT `asignaturas_ibfk_1` FOREIGN KEY (`dniprofesor`) REFERENCES `persona` (`DNI`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

-- Volcando datos para la tabla exdiciembre.asignaturas: ~10 rows (aproximadamente)
DELETE FROM `asignaturas`;
/*!40000 ALTER TABLE `asignaturas` DISABLE KEYS */;
INSERT INTO `asignaturas` (`idAsignatura`, `nombre`, `dniprofesor`) VALUES
	(1, 'Fundamentos del Hardware', '35753171'),
	(2, 'Lenguaje de marcas', '54658699'),
	(3, 'Sists. Operativos en Red', '54658699'),
	(7, 'Implantación de Aplic Web', '35753171'),
	(8, 'Bases de datos', '32683973'),
	(9, 'Programación', '35753171'),
	(11, 'FOL', '00296770'),
	(13, 'Desarrollo Web Ent_Servid', '32683973'),
	(14, 'Aplicaciones Web', '32683973'),
	(15, 'Empresa e Inic. Emprended', '00296770');
/*!40000 ALTER TABLE `asignaturas` ENABLE KEYS */;

-- Volcando estructura para tabla exdiciembre.notas
CREATE TABLE IF NOT EXISTS `notas` (
  `DNI` char(8) COLLATE utf8mb4_spanish_ci NOT NULL,
  `idAsignatura` int(10) NOT NULL,
  `evaluacion` int(10) NOT NULL,
  `calificacion` tinyint(2) DEFAULT NULL,
  PRIMARY KEY (`DNI`,`evaluacion`,`idAsignatura`) USING BTREE,
  KEY `identico` (`DNI`),
  KEY `evalua` (`evaluacion`),
  KEY `idAsignatura` (`idAsignatura`),
  CONSTRAINT `notas_ibfk_1` FOREIGN KEY (`DNI`) REFERENCES `persona` (`DNI`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `notas_ibfk_3` FOREIGN KEY (`idAsignatura`) REFERENCES `asignaturas` (`idAsignatura`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

-- Volcando datos para la tabla exdiciembre.notas: ~120 rows (aproximadamente)
DELETE FROM `notas`;
/*!40000 ALTER TABLE `notas` DISABLE KEYS */;
INSERT INTO `notas` (`DNI`, `idAsignatura`, `evaluacion`, `calificacion`) VALUES
	('16488117', 1, 1, 5),
	('16488117', 7, 1, 5),
	('16488117', 9, 1, 5),
	('16488117', 11, 1, 5),
	('16488117', 14, 1, 5),
	('16488117', 1, 2, 6),
	('16488117', 7, 2, 6),
	('16488117', 9, 2, 6),
	('16488117', 11, 2, 6),
	('16488117', 14, 2, 8),
	('16488117', 1, 3, 6),
	('16488117', 7, 3, 6),
	('16488117', 9, 3, 6),
	('16488117', 11, 3, 6),
	('16488117', 14, 3, 10),
	('32752131', 1, 1, 7),
	('32752131', 7, 1, 10),
	('32752131', 9, 1, 10),
	('32752131', 11, 1, 6),
	('32752131', 1, 2, 3),
	('32752131', 7, 2, 3),
	('32752131', 9, 2, 3),
	('32752131', 11, 2, 5),
	('32752131', 1, 3, 5),
	('32752131', 7, 3, 8),
	('32752131', 9, 3, 5),
	('32752131', 11, 3, 5),
	('48906002', 1, 1, 2),
	('48906002', 7, 1, 4),
	('48906002', 9, 1, 2),
	('48906002', 11, 1, 2),
	('48906002', 1, 2, 0),
	('48906002', 7, 2, 9),
	('48906002', 9, 2, 9),
	('48906002', 11, 2, 9),
	('48906002', 1, 3, 7),
	('48906002', 7, 3, 9),
	('48906002', 9, 3, 5),
	('48906002', 11, 3, 5),
	('49471767', 1, 1, 8),
	('49471767', 2, 1, 5),
	('49471767', 7, 1, 8),
	('49471767', 9, 1, 8),
	('49471767', 11, 1, 8),
	('49471767', 1, 2, 2),
	('49471767', 2, 2, 6),
	('49471767', 7, 2, 2),
	('49471767', 9, 2, 2),
	('49471767', 11, 2, 2),
	('49471767', 1, 3, 2),
	('49471767', 2, 3, 7),
	('49471767', 7, 3, 2),
	('49471767', 9, 3, 2),
	('49471767', 11, 3, 2),
	('50495457', 1, 1, 4),
	('50495457', 7, 1, 10),
	('50495457', 9, 1, 1),
	('50495457', 11, 1, 2),
	('50495457', 15, 1, 7),
	('50495457', 1, 2, 3),
	('50495457', 7, 2, 10),
	('50495457', 9, 2, 5),
	('50495457', 11, 2, 6),
	('50495457', 15, 2, 8),
	('50495457', 1, 3, 7),
	('50495457', 7, 3, 8),
	('50495457', 9, 3, 9),
	('50495457', 11, 3, 10),
	('50495457', 15, 3, 4),
	('67123987', 1, 1, 2),
	('67123987', 2, 1, 5),
	('67123987', 7, 1, 2),
	('67123987', 8, 1, 5),
	('67123987', 9, 1, 2),
	('67123987', 11, 1, 2),
	('67123987', 1, 2, 5),
	('67123987', 2, 2, 6),
	('67123987', 7, 2, 5),
	('67123987', 8, 2, 8),
	('67123987', 9, 2, 5),
	('67123987', 11, 2, 5),
	('67123987', 1, 3, 7),
	('67123987', 2, 3, 8),
	('67123987', 7, 3, 7),
	('67123987', 8, 3, 4),
	('67123987', 9, 3, 7),
	('67123987', 11, 3, 7),
	('86736996', 1, 1, 1),
	('86736996', 7, 1, 2),
	('86736996', 9, 1, 3),
	('86736996', 11, 1, 4),
	('86736996', 15, 1, 3),
	('86736996', 1, 2, 5),
	('86736996', 7, 2, 6),
	('86736996', 9, 2, 7),
	('86736996', 11, 2, 8),
	('86736996', 15, 2, 2),
	('86736996', 1, 3, 9),
	('86736996', 7, 3, 10),
	('86736996', 9, 3, 10),
	('86736996', 11, 3, 10),
	('86736996', 15, 3, 1),
	('87496546', 1, 1, 9),
	('87496546', 3, 1, 2),
	('87496546', 7, 1, 9),
	('87496546', 9, 1, 9),
	('87496546', 11, 1, 9),
	('87496546', 13, 1, 2),
	('87496546', 1, 2, 7),
	('87496546', 3, 2, 6),
	('87496546', 7, 2, 7),
	('87496546', 9, 2, 7),
	('87496546', 11, 2, 7),
	('87496546', 13, 2, 3),
	('87496546', 1, 3, 7),
	('87496546', 3, 3, 0),
	('87496546', 7, 3, 7),
	('87496546', 9, 3, 10),
	('87496546', 11, 3, 7),
	('87496546', 13, 3, 0);
/*!40000 ALTER TABLE `notas` ENABLE KEYS */;

-- Volcando estructura para tabla exdiciembre.persona
CREATE TABLE IF NOT EXISTS `persona` (
  `DNI` char(8) COLLATE utf8mb4_spanish_ci NOT NULL,
  `Nombre` varchar(20) COLLATE utf8mb4_spanish_ci NOT NULL,
  `Apellido1` varchar(15) COLLATE utf8mb4_spanish_ci NOT NULL,
  `Apellido2` varchar(15) COLLATE utf8mb4_spanish_ci NOT NULL,
  `tipo` tinyint(1) NOT NULL DEFAULT 0,
  `avatar` varchar(300) COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  PRIMARY KEY (`DNI`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

-- Volcando datos para la tabla exdiciembre.persona: ~11 rows (aproximadamente)
DELETE FROM `persona`;
/*!40000 ALTER TABLE `persona` DISABLE KEYS */;
INSERT INTO `persona` (`DNI`, `Nombre`, `Apellido1`, `Apellido2`, `tipo`, `avatar`) VALUES
	('00296770', 'José Angel', 'García', 'Martín', 1, '../recursos/avatar/joseangel.jpg'),
	('16488117', 'Fernando', 'Hernández', 'Pérez', 0, '../recursos/avatar/fernando1607336721.jpg'),
	('32683973', 'Lourdes', 'Izquierdo', 'Sánchez', 1, '../recursos/avatar/lourdes.jpg'),
	('32752131', 'Carmen', 'Sierra', 'López', 0, '../recursos/avatar/carmen.jpg'),
	('35753171', 'Jorge', 'García', 'Flores', 1, '../recursos/avatar/jorge.jpg'),
	('48906002', 'Pedro', 'Vega', 'Hernández', 0, '../recursos/avatar/pedro1607336656.jpg'),
	('49471767', 'Cruz', 'Puentes', 'García', 0, '../recursos/avatar/cruz1607336809.jpg'),
	('50495457', 'Carlos', 'Vega', 'Martín', 0, '../recursos/avatar/carlos.jpg'),
	('54658699', 'Marisol', 'Díaz', 'Sánchez', 1, '../recursos/avatar/marisol.jpg'),
	('67123987', 'Julio', 'González', 'González', 0, '../recursos/avatar/11639900292.jpg'),
	('86736996', 'Teresa', 'Ruíz', 'Parra', 0, '../recursos/avatar/teresa1607336915.jpg'),
	('87496546', 'Luis', 'Pérez', 'Oliva', 0, '../recursos/avatar/luis1607336629.jpg');
/*!40000 ALTER TABLE `persona` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
