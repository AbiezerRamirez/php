--
-- Base de datos: `biblioteca`
--
CREATE DATABASE IF NOT EXISTS `biblioteca` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `biblioteca`;
-- --------------------------------------------------------
--
-- Estructura de tabla para la tabla `autor`
--
CREATE TABLE `autor` (
    `id` int(10) UNSIGNED NOT NULL,
    `nombre` varchar(50) NOT NULL,
    `fotoAutor` varchar(100) DEFAULT 'sinFoto.png'
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4;
--
-- Volcado de datos para la tabla `autor`
--
INSERT INTO `autor` (`id`, `nombre`, `fotoAutor`)
VALUES (1, 'Frank Kafka', 'Kafka.jpg'),
    (2, 'Albert Camus', 'Camus.jpg'),
    (3, 'Joseph Conrad', 'Conrad.jpg'),
    (4, 'Miguel de Cervantes', 'Cervantes.jpg'),
    (5, 'William Shakespeare', 'Shakespeare.jpg'),
    (6, 'Jorge Luis Borges', 'Borges.jpg'),
    (7, 'Anónimo', 'sinFoto.png'),
    (8, 'Antonio Machado', 'Machado.jpg'),
    (9, 'Carmen Laforet', 'Laforet.jpg'),
    (10, 'Ana María Matute', 'Matute.jpg'),
    (11, 'Miguel de Unamuno', 'Unamuno.jpg'),
    (12, 'Julio Cortázar', 'Cortazar.jpg');
-- --------------------------------------------------------
--
-- Estructura de tabla para la tabla `libro`
--
CREATE TABLE `libro` (
    `id` int(10) UNSIGNED NOT NULL,
    `titulo` varchar(100) NOT NULL,
    `editorial` varchar(50) NOT NULL DEFAULT 'Desconocida',
    `tema` varchar(50) DEFAULT 'Sin Clasificar',
    `idAutor` int(10) UNSIGNED NOT NULL,
    `portada` varchar(100) DEFAULT 'sinPortada.png'
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4;
--
-- Volcado de datos para la tabla `libro`
--
INSERT INTO `libro` (
        `id`,
        `titulo`,
        `editorial`,
        `tema`,
        `idAutor`,
        `portada`
    )
VALUES (
        1,
        'El proceso',
        'Alianza Editorial',
        'Novela',
        1,
        'Elproceso.jpg'
    ),
    (
        2,
        'Metamorfosis',
        'Planeta',
        'Novela',
        1,
        'Metamorfosis.jpg\r\n'
    ),
    (
        3,
        'Mi primera memoria',
        'Universal',
        'Novela',
        10,
        'Memoria.jpg'
    ),
    (
        4,
        'Luciérnagas',
        'Universal',
        'Novela',
        10,
        'Luciernagas.jpg'
    ),
    (
        5,
        'El extranjero',
        'Universal',
        'Novela',
        2,
        'Elextranjero.jpg'
    ),
    (
        6,
        'La peste',
        'Planeta',
        'Novela',
        2,
        'Lapeste.jpg'
    ),
    (
        7,
        'Campos de Castilla',
        'Clásicos',
        'Poesía',
        8,
        'Campos.png'
    ),
    (
        8,
        'Soledades',
        'Clásicos',
        'Poesía',
        8,
        'Soledades.jpg'
    ),
    (
        9,
        'Juan de Mairena',
        'Clásicos',
        'Novela',
        8,
        'Mairena.jpg'
    ),
    (
        10,
        'El corazón de las tinieblas',
        'Británica',
        'Novela',
        3,
        'Corazon.jpg'
    ),
    (
        11,
        'El agente secreto',
        'Británica',
        'Sin Clasificar',
        3,
        'Elagente.jpg'
    ),
    (
        12,
        'Don Quijote de la Mancha',
        'Clásicos',
        'Novela',
        4,
        'DonQuijote.jpg'
    ),
    (
        13,
        'El coloquio de los perros',
        'Planeta',
        'Novela',
        4,
        'Elcoloquio.jpg'
    ),
    (
        14,
        'El retablo de las maravillas',
        'Clásicos',
        'Teatro',
        4,
        'Elretablo.jpg'
    ),
    (
        15,
        'Hamlet',
        'Británica',
        'Teatro',
        5,
        'Hamlet.jpg'
    ),
    (
        16,
        'Macbeth',
        'Británica',
        'Teatro',
        5,
        'Macbeth.jpg'
    ),
    (
        17,
        'El rey Lear',
        'Universal',
        'Teatro',
        5,
        'Lear.jpg'
    ),
    (
        18,
        'El Aleph',
        'Americana',
        'Cuentos',
        6,
        'Aleph.jpg'
    ),
    (
        19,
        'Las ruinas circulares',
        'Americana',
        'Cuentos',
        6,
        'Ruinas.jpg'
    ),
    (
        20,
        'Luna de enfrente',
        'Universal',
        'Poesía',
        6,
        'LunaEnfrente.jpg'
    ),
    (21, 'Nada', 'Planeta', 'Novela', 9, 'Nada.jpg'),
    (
        22,
        'Rayuela',
        'Clásicos',
        'Novela',
        12,
        'Rayuela.jpg'
    ),
    (
        23,
        'Bestiario',
        'Americana',
        'Cuentos',
        12,
        'Bestiario.jpg'
    ),
    (
        24,
        'Salvo el crepúsculo',
        'Americana',
        'Poesía',
        12,
        'Salvo.jpg'
    ),
    (
        25,
        'Niebla',
        'Clásicos',
        'Novela',
        11,
        'Niebla.jpg'
    ),
    (
        26,
        'El lazarillo de Tormes',
        'Clásicos',
        'Novela',
        7,
        'Lazarillo.jpg'
    ),
    (
        27,
        'El cantar del mío Cid',
        'Clásicos',
        'Poesía',
        7,
        'Cid.jpg'
    );
-- --------------------------------------------------------
--
-- Estructura de tabla para la tabla `usuarios`
--
CREATE TABLE `usuarios` (
    `id` int(10) NOT NULL,
    `nombre` varchar(255) NOT NULL,
    `clave` varchar(255) NOT NULL,
    `fotoUsuario` varchar(255) DEFAULT 'root.png'
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4;
--
-- Volcado de datos para la tabla `usuarios`
--
INSERT INTO `usuarios` (`id`, `nombre`, `clave`, `fotoUsuario`)
VALUES (1, 'root', '123', 'root.png');
--
-- Índices para tablas volcadas
--
--
-- Indices de la tabla `autor`
--
ALTER TABLE `autor`
ADD PRIMARY KEY (`id`);
--
-- Indices de la tabla `libro`
--
ALTER TABLE `libro`
ADD PRIMARY KEY (`id`),
    ADD KEY `idAutor` (`idAutor`);
--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
ADD PRIMARY KEY (`id`);
--
-- AUTO_INCREMENT de las tablas volcadas
--
--
-- AUTO_INCREMENT de la tabla `autor`
--
ALTER TABLE `autor`
MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
    AUTO_INCREMENT = 13;
--
-- AUTO_INCREMENT de la tabla `libro`
--
ALTER TABLE `libro`
MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
    AUTO_INCREMENT = 28;
--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
MODIFY `id` int(10) NOT NULL AUTO_INCREMENT,
    AUTO_INCREMENT = 2;
--
-- Restricciones para tablas volcadas
--
--
-- Filtros para la tabla `libro`
--
ALTER TABLE `libro`
ADD CONSTRAINT `libro_ibfk_1` FOREIGN KEY (`idAutor`) REFERENCES `autor` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
