-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 09-12-2019 a las 19:41:12
-- Versión del servidor: 10.1.35-MariaDB
-- Versión de PHP: 7.2.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `montielmusicadaw2`
--
CREATE DATABASE IF NOT EXISTS `montielmusicadaw2` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `montielmusicadaw2`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `alumno`
--

DROP TABLE IF EXISTS `alumno`;
CREATE TABLE `alumno` (
  `id` int(11) NOT NULL,
  `apellidos` varchar(45) NOT NULL,
  `nombre` varchar(45) NOT NULL,
  `telefono` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `alumno`
--

INSERT INTO `alumno` (`id`, `apellidos`, `nombre`, `telefono`) VALUES
(1, 'Benítez De la Cruz', 'Sara', '628111222'),
(2, 'Martínez Reyes', 'Eric', '629010101'),
(3, 'González Sanjuán', 'Ramón', '606787878'),
(4, 'Gómez López', 'Rosa', '617454545'),
(5, 'Gómez Corriente', 'Alberto', '612345678'),
(6, 'Rubio García', 'David', '956787934'),
(7, 'Rey Gómez', 'Francisca', '956080809'),
(8, 'Grandes Montero', 'Almudena', '955801569');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `alumno_has_instrumento`
--

DROP TABLE IF EXISTS `alumno_has_instrumento`;
CREATE TABLE `alumno_has_instrumento` (
  `alumno_id` int(11) NOT NULL,
  `instrumento_id` int(11) NOT NULL,
  `dia_semana` enum('L','M','X','J','V') NOT NULL,
  `hora` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `alumno_has_instrumento`
--

INSERT INTO `alumno_has_instrumento` (`alumno_id`, `instrumento_id`, `dia_semana`, `hora`) VALUES
(1, 3, 'V', '12:00:00'),
(2, 3, 'V', '12:00:00'),
(3, 4, 'V', '11:00:00'),
(4, 3, 'V', '12:00:00'),
(5, 1, 'V', '18:00:00'),
(6, 1, 'V', '19:00:00'),
(7, 4, 'V', '10:00:00'),
(8, 3, 'V', '12:00:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `falta`
--

DROP TABLE IF EXISTS `falta`;
CREATE TABLE `falta` (
  `id` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `hora` time NOT NULL,
  `alumno_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `instrumento`
--

DROP TABLE IF EXISTS `instrumento`;
CREATE TABLE `instrumento` (
  `id` int(11) NOT NULL,
  `nombre` varchar(45) NOT NULL,
  `tipo` enum('viento','cuerda','percusión','eléctrico') DEFAULT NULL,
  `imagen` varchar(45) DEFAULT NULL,
  `caracteristicas` text,
  `profesor_codigo` varchar(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `instrumento`
--

INSERT INTO `instrumento` (`id`, `nombre`, `tipo`, `imagen`, `caracteristicas`, `profesor_codigo`) VALUES
(1, 'Guitarra', 'cuerda', 'guitarra.png', 'La guitarra, también conocida como guitarra clásica o guitarra española,1? es un instrumento musical de cuerda pulsada, compuesto de una caja de resonancia, un mástil sobre el que va adosado el diapasón o trastero -generalmente con un agujero acústico en el centro de la tapa (boca)-, y seis cuerdas. Sobre el diapasón van incrustados los trastes, que permiten las diferentes notas. Algunos instrumentos de su familia son el cuatro, el ukelele, el requinto, el charango y distintos tipos de guitarrón, como el guitarrón mexicano, de uso frecuente por los mariachis.', 'G001'),
(2, 'Piano', 'cuerda', 'piano.png', 'El piano (acortamiento de «pianoforte», palabra que en italiano está compuesta por los términos «piano», «suave», y «forte», «fuerte») es un instrumento musical armónico clasificado como instrumento de percusión y de cuerdas percutidas por el sistema de clasificación tradicional, y según la clasificación de Hornbostel-Sachs es un cordófono simple.', 'P001'),
(3, 'Lenguaje musical', NULL, NULL, NULL, 'G001'),
(4, 'Violín', 'cuerda', 'violin.png', 'El violín (del italiano violino, diminutivo de viola) es un instrumento de origen italiano de cuerdas frotadas (también llamado \"de arco\"), que tiene cuatro de ellas. Es el más pequeño y agudo de la familia de los instrumentos de cuerda clásicos, los cuales están integrados por el violín, la viola, el violonchelo y el contrabajo, todos ellos derivados de las violas medievales, en especial de la fídula.', 'V001'),
(5, 'Trompeta', 'viento', 'trompeta.png', 'La trompeta es un instrumento musical de viento, perteneciente a la familia de los instrumentos de viento metal o metales, fabricado en aleación de metal. El sonido se produce gracias a la vibración de los labios del intérprete en la parte denominada boquilla a partir de la columna del aire (flujo del aire). Comúnmente, suele estar afinada en si ? (bemol), es decir, un tono por debajo de la afinación escrita en el pentagrama, aunque también hay trompetas afinadas en fa, en do, en la y en mi ? -bemol-.', 'T001');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `profesor`
--

DROP TABLE IF EXISTS `profesor`;
CREATE TABLE `profesor` (
  `codigo` varchar(6) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `usuario` varchar(20) NOT NULL,
  `password` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `profesor`
--

INSERT INTO `profesor` (`codigo`, `nombre`, `usuario`, `password`) VALUES
('G001', 'Moisés Montiel', 'moimon', '2462ba879b624b57224fbee1a84ce6c7'),
('P001', 'Rubén Pérez', 'ruben', '32252792b9dccf239f5a5bd8e778dbc2'),
('T001', 'Susana Ramírez', 'susana', '3f06a7247d5c04d0618552dd3276ac40'),
('V001', 'Sophia Leckberg', 'sophia', '2ee0272b8e1a9705dc3ebe91c10b32f4');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `alumno`
--
ALTER TABLE `alumno`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `alumno_has_instrumento`
--
ALTER TABLE `alumno_has_instrumento`
  ADD PRIMARY KEY (`alumno_id`,`instrumento_id`,`dia_semana`,`hora`),
  ADD KEY `fk_alumno_has_instrumento_instrumento1_idx` (`instrumento_id`),
  ADD KEY `fk_alumno_has_instrumento_alumno1_idx` (`alumno_id`);

--
-- Indices de la tabla `falta`
--
ALTER TABLE `falta`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_falta_alumno1_idx` (`alumno_id`);

--
-- Indices de la tabla `instrumento`
--
ALTER TABLE `instrumento`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_instrumento_profesor_idx` (`profesor_codigo`);

--
-- Indices de la tabla `profesor`
--
ALTER TABLE `profesor`
  ADD PRIMARY KEY (`codigo`),
  ADD UNIQUE KEY `usuario_UNIQUE` (`usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `alumno`
--
ALTER TABLE `alumno`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `falta`
--
ALTER TABLE `falta`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `instrumento`
--
ALTER TABLE `instrumento`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `alumno_has_instrumento`
--
ALTER TABLE `alumno_has_instrumento`
  ADD CONSTRAINT `fk_alumno_has_instrumento_alumno1` FOREIGN KEY (`alumno_id`) REFERENCES `alumno` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_alumno_has_instrumento_instrumento1` FOREIGN KEY (`instrumento_id`) REFERENCES `instrumento` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `falta`
--
ALTER TABLE `falta`
  ADD CONSTRAINT `fk_falta_alumno1` FOREIGN KEY (`alumno_id`) REFERENCES `alumno` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `instrumento`
--
ALTER TABLE `instrumento`
  ADD CONSTRAINT `fk_instrumento_profesor` FOREIGN KEY (`profesor_codigo`) REFERENCES `profesor` (`codigo`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
