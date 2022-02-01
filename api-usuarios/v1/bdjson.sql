
CREATE DATABASE IF NOT EXISTS `bdjson` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci;
USE `bdjson`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
CREATE TABLE IF NOT EXISTS `usuarios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(60) COLLATE utf8mb4_spanish_ci NOT NULL,
  `apellido` varchar(60) COLLATE utf8mb4_spanish_ci NOT NULL,
  `foto` varchar(225) COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `nombre`, `apellido`, `foto`) VALUES
(1, 'Pedro', 'Pérez Hernández', '1.jpg'),
(2, 'María', 'García Martínez', '2.jpg'),
(3, 'Jesús', 'Fernández Mateo', '3.jpg'),
(4, 'Rosa', 'Miralles Iglesias', '4.jpg'),
(5, 'Fernando', 'Sevilla Nieto', '5.jpg'),
(6, 'Cruz', 'Melchor Herrea', '6.jpg'),
(7, 'Carmen', 'Matilla López', '7.jpg'),
(8, 'José Carlos', 'Parra Castillo', '8.jpg');
