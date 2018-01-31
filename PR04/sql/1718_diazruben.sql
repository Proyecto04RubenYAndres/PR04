-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 18-12-2017 a las 20:46:38
-- Versión del servidor: 10.1.26-MariaDB
-- Versión de PHP: 7.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `1718_diazruben`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `recurso`
--

CREATE TABLE `recurso` (
  `idrecurso` int(3) NOT NULL,
  `nom_recurso` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `tipo_recurso` varchar(15) COLLATE utf8_unicode_ci DEFAULT NULL,
  `estado_recurso` enum('Disponible','Eliminado') COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `recurso`
--

INSERT INTO `recurso` (`idrecurso`, `nom_recurso`, `tipo_recurso`, `estado_recurso`) VALUES
(1, 'AulaAdeteoría con Proyector', 'Aula', 'Disponible'),
(2, 'Aula B de teoría con Proyector', 'Aula', 'Disponible'),
(3, 'Aula C de teoría sin proyector', 'Aula', 'Disponible'),
(4, 'Aula de Informática A', 'Aula', 'Disponible'),
(5, 'Aula de Informática B', 'Aula', 'Disponible'),
(6, 'Despacho de entrevista A', 'Despacho', 'Disponible'),
(7, 'Despacho de entrevista B', 'Despacho', 'Disponible'),
(8, 'Sala de reuniones', 'Sala', 'Disponible'),
(9, 'Proyector portátil', 'Proyector', 'Disponible'),
(10, 'Carro de portátiles', 'Carro', 'Disponible'),
(11, 'Portátil A1', 'Portátil', 'Disponible'),
(12, 'Portátil B2', 'Portátil', 'Disponible'),
(13, 'Portátil C3', 'Portátil', 'Disponible'),
(14, 'Móvil A1', 'Móvil', 'Disponible'),
(15, 'Móvil A2', 'Móvil', 'Disponible'),
(16, 'Móvil A3', 'Móvil', 'Disponible'),
(17, 'Movil A4', 'Móvil', 'Disponible');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reserva`
--

CREATE TABLE `reserva` (
  `idreserva` int(3) NOT NULL,
  `idusuario` int(3) DEFAULT NULL,
  `disponibilidad` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `reserva`
--

INSERT INTO `reserva` (`idreserva`, `idusuario`, `disponibilidad`) VALUES
(1, 5, 0),
(2, 3, 0),
(3, NULL, 1),
(4, NULL, 1),
(5, NULL, 1),
(6, NULL, 1),
(7, NULL, 1),
(8, NULL, 1),
(9, NULL, 1),
(10, NULL, 1),
(11, NULL, 1),
(12, NULL, 1),
(13, NULL, 1),
(14, NULL, 1),
(15, NULL, 1),
(16, NULL, 1),
(17, NULL, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reserva_recurso`
--

CREATE TABLE `reserva_recurso` (
  `idreserva_recurso` int(3) NOT NULL,
  `idreserva` int(3) DEFAULT NULL,
  `idrecurso` int(3) DEFAULT NULL,
  `fecha_hora_reserva` datetime DEFAULT NULL,
  `fecha_hora_devolucion` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `reserva_recurso`
--

INSERT INTO `reserva_recurso` (`idreserva_recurso`, `idreserva`, `idrecurso`, `fecha_hora_reserva`, `fecha_hora_devolucion`) VALUES
(1, 1, 1, '2017-12-13 22:22:00', '2017-12-27 22:22:00'),
(2, 2, 1, '2017-12-18 22:22:00', '2017-12-20 22:22:00'),
(3, NULL, 3, '2017-11-30 22:22:00', '2017-12-18 20:43:02'),
(4, NULL, 4, '2017-12-14 04:04:00', '2017-12-18 19:11:47'),
(5, NULL, 5, '2017-12-18 16:23:58', '2017-12-18 16:24:05'),
(6, NULL, 6, '2017-12-20 03:33:00', '2017-12-18 17:59:41'),
(7, NULL, 7, '2017-12-12 16:19:49', '2017-12-12 16:21:29'),
(8, NULL, 8, '2017-12-12 16:19:53', '2017-12-12 16:21:33'),
(9, NULL, 9, '2017-12-12 16:19:55', '2017-12-12 16:21:27'),
(10, NULL, 10, '2017-12-12 16:21:35', '2017-12-12 17:32:08'),
(11, NULL, 11, '2017-12-15 16:21:18', '2017-12-15 16:21:23'),
(12, NULL, 12, '2017-12-15 16:21:20', '2017-12-15 16:21:25'),
(13, NULL, 13, '2017-12-15 16:21:21', '2017-12-15 16:21:26'),
(14, NULL, 14, '2017-12-15 19:54:45', '2017-12-18 18:04:03'),
(15, NULL, 15, '2017-12-15 19:54:47', '2017-12-18 18:04:06'),
(16, NULL, 16, NULL, '2017-12-18 16:43:46'),
(17, NULL, 17, NULL, '2017-12-18 20:42:27');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `idusuario` int(3) NOT NULL,
  `nombre` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `apellidos` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `alias` varchar(15) COLLATE utf8_unicode_ci DEFAULT NULL,
  `pwd` varchar(15) COLLATE utf8_unicode_ci DEFAULT NULL,
  `mail` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `nivel` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `foto` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `estado` enum('Disponible','Eliminado') COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`idusuario`, `nombre`, `apellidos`, `alias`, `pwd`, `mail`, `nivel`, `foto`, `estado`) VALUES
(1, 'Luis David', 'Pallo', 'ldavidp', 'qweQWE123', 'david.payo@fje.edu', 'administrador', 'img/payo.jpg', 'Disponible'),
(2, 'Marc', 'Calatayud', 'mcalatayud', 'qweQWE123', 'marc.calatayud@fje.edu', 'usuario', 'img/marc.jpg', 'Disponible'),
(3, 'Óscar', 'Solé', 'osole', 'asdASD123', 'oscar.sole@fje.edu', 'usuario', 'img/sole.jpg', 'Disponible'),
(4, 'Rubén', 'Jurado', 'rjurado', 'zxcZXC123', 'ruben.jurado@fje.edu', 'usuario', 'img/rubenj1.jpg', 'Disponible'),
(5, 'Ruben', 'Diaz', 'rdiaz', 'qwe', 'ruben.diaz@fje.edu', 'administrador', 'img/ruben.jpg', 'Disponible');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `recurso`
--
ALTER TABLE `recurso`
  ADD PRIMARY KEY (`idrecurso`);

--
-- Indices de la tabla `reserva`
--
ALTER TABLE `reserva`
  ADD PRIMARY KEY (`idreserva`),
  ADD KEY `FK_idusuario` (`idusuario`) USING BTREE;

--
-- Indices de la tabla `reserva_recurso`
--
ALTER TABLE `reserva_recurso`
  ADD PRIMARY KEY (`idreserva_recurso`),
  ADD KEY `FK_idreserva` (`idreserva`),
  ADD KEY `FK_idrecurso` (`idrecurso`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`idusuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `recurso`
--
ALTER TABLE `recurso`
  MODIFY `idrecurso` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT de la tabla `reserva`
--
ALTER TABLE `reserva`
  MODIFY `idreserva` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT de la tabla `reserva_recurso`
--
ALTER TABLE `reserva_recurso`
  MODIFY `idreserva_recurso` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `idusuario` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `reserva`
--
ALTER TABLE `reserva`
  ADD CONSTRAINT `FK_idusuario` FOREIGN KEY (`idusuario`) REFERENCES `usuario` (`idusuario`);

--
-- Filtros para la tabla `reserva_recurso`
--
ALTER TABLE `reserva_recurso`
  ADD CONSTRAINT `FK_idrecurso` FOREIGN KEY (`idrecurso`) REFERENCES `recurso` (`idrecurso`),
  ADD CONSTRAINT `FK_idreserva` FOREIGN KEY (`idreserva`) REFERENCES `reserva` (`idreserva`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
