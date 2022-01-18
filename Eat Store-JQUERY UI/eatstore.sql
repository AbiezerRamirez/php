--
-- Base de datos: `eatstore`
--

DROP DATABASE IF EXISTS `eatstore`;
CREATE DATABASE IF NOT EXISTS `eatstore` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci;
USE `eatstore`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cliente`
--

CREATE TABLE `cliente` (
  `idcliente` int(11) UNSIGNED NOT NULL,
  `dni` varchar(9) NOT NULL,
  `nombre` varchar(150) NOT NULL,
  `direccion` varchar(255) NOT NULL,
  `correoe` varchar(100) NOT NULL,
  `contras` varchar(255) NOT NULL
) ENGINE=InnoDB;

--
-- Volcado de datos para la tabla `cliente`
--

INSERT INTO `cliente` (`idcliente`, `dni`, `nombre`, `direccion`, `correoe`, `contras`) VALUES
(1, '11111111H', 'Lourdes Izquierdo', 'Avd. Comuneros, 123, 5G. 37007 Salamanca', 'prueba@gmail.com', '$2y$10$RUrVQ8Zq3t/z/RQRVyFWD.JlWSN7/nQV.3AKiubPBj0CJqcRIsJnO');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `compra`
--

CREATE TABLE `compra` (
  `idcompra` int(11) UNSIGNED NOT NULL,
  `idcliente` int(11) UNSIGNED NOT NULL,
  `fcompra` date NOT NULL,
  `descuento` double DEFAULT 0,
  `formapago` varchar(50) DEFAULT 'Efectivo',
  `total` double NOT NULL
) ENGINE=InnoDB;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_compra`
--

CREATE TABLE `detalle_compra` (
  `iddetalle` int(10) UNSIGNED NOT NULL,
  `idplato` int(11) UNSIGNED NOT NULL,
  `idcompra` int(11) UNSIGNED NOT NULL,
  `cantidad` int(11) UNSIGNED DEFAULT 1,
  `precio` double NOT NULL
) ENGINE=InnoDB;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoria`
--

CREATE TABLE `categoria` (
  `idcategoria` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `nombre` varchar(100) NOT NULL UNIQUE,
  `descripcion` varchar(255) NOT NULL
) ENGINE=InnoDB;

--
-- Volcado de datos para la tabla `categoria`
--

INSERT INTO `categoria` (`idcategoria`, `nombre`, `descripcion`) VALUES
(1, 'Arroces', 'Plato cuyo ingrediente principal es el arroz');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `plato`
--

CREATE TABLE `plato` (
  `idplato` int(11) UNSIGNED NOT NULL PRIMARY KEY,
  `nombre` varchar(100) NOT NULL UNIQUE,
  `foto` varchar(255) NOT NULL,
  `descripcion` varchar(255) NOT NULL,
  `idcategoria` int(11) NOT NULL,
  `precio` double NOT NULL,
  CONSTRAINT `plato_ibfk_1` FOREIGN KEY (`idcategoria`) REFERENCES `categoria` (`idcategoria`)
) ENGINE=InnoDB;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`idcliente`),
  ADD UNIQUE (`dni`),
  ADD UNIQUE (`correoe`);

--
-- Indices de la tabla `compra`
--
ALTER TABLE `compra`
  ADD PRIMARY KEY (`idcompra`);

--
-- Indices de la tabla `detalle_compra`
--
ALTER TABLE `detalle_compra`
  ADD PRIMARY KEY (`iddetalle`,`idplato`,`idcompra`);

--
-- Indices de la tabla `categoria`
--
-- ALTER TABLE `categoria`
--   ADD PRIMARY KEY (`idcategoria`),
--   ADD UNIQUE (`nombre`);

--
-- Indices de la tabla `plato`
--
-- ALTER TABLE `plato`
--   ADD PRIMARY KEY (`idplato`),
--   ADD UNIQUE (`nombre`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `cliente`
--
ALTER TABLE `cliente`
  MODIFY `idcliente` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `compra`
--
ALTER TABLE `compra`
  MODIFY `idcompra` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;

--
-- AUTO_INCREMENT de la tabla `detalle_compra`
--
ALTER TABLE `detalle_compra`
  MODIFY `iddetalle` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;

--
-- AUTO_INCREMENT de la tabla `categoria`
--
-- ALTER TABLE `categoria`
--   MODIFY `idcategoria` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `plato`
--
ALTER TABLE `plato`
  MODIFY `idplato` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `compra`
--
ALTER TABLE `compra`
  ADD CONSTRAINT `compra_ibfk_1` FOREIGN KEY (`idcliente`) REFERENCES `cliente` (`idcliente`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `detalle_compra`
--
ALTER TABLE `detalle_compra`
  ADD CONSTRAINT `detalle_compra_ibfk_1` FOREIGN KEY (`idplato`) REFERENCES `plato` (`idplato`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `detalle_compra_ibfk_2` FOREIGN KEY (`idcompra`) REFERENCES `compra` (`idcompra`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `plato`
--
-- ALTER TABLE `plato`
--   ADD CONSTRAINT `categ_plato_ibfk_1` FOREIGN KEY (`idcategoria`) REFERENCES `categoria` (`idcategoria`);

