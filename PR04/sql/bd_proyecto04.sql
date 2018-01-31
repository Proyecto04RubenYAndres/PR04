-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 24-01-2018 a las 19:16:23
-- Versión del servidor: 10.1.28-MariaDB
-- Versión de PHP: 7.1.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `bd_proyecto04`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_contactos`
--

CREATE TABLE `tbl_contactos` (
  `id_contacto` int(11) NOT NULL,
  `nombre_contacto` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `apellido_contacto` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `correo_contacto` varchar(60) COLLATE utf8_spanish_ci NOT NULL,
  `telf_movil` int(9) NOT NULL,
  `telf_fijo` int(9) NOT NULL,
  `direc_casa` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `direc_trabajo` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `contacto_de` enum('Andres','Juan') COLLATE utf8_spanish_ci DEFAULT NULL,
  `estado` enum('disponible','eliminado') COLLATE utf8_spanish_ci NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_users`
--

CREATE TABLE `tbl_users` (
  `id_user` int(11) NOT NULL,
  `nombre_user` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `apellidos_user` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `correo_user` varchar(60) COLLATE utf8_spanish_ci NOT NULL,
  `contraseña_user` varchar(9) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `tbl_users`
--

INSERT INTO `tbl_users` (`id_user`, `nombre_user`, `apellidos_user`, `correo_user`, `contraseña_user`) VALUES
(1, 'Andres', 'Gonzalez Pradas', 'agonzalez@joan23.fje.edu', 'qweQWE123'),
(2, 'Ruben', 'Diaz Ruiz', 'rdiaz@joan23.fje.edu', 'asdASD123');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `tbl_contactos`
--
ALTER TABLE `tbl_contactos`
  ADD PRIMARY KEY (`id_contacto`),
  ADD KEY `FK_user` (`id_user`);

--
-- Indices de la tabla `tbl_users`
--
ALTER TABLE `tbl_users`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `tbl_contactos`
--
ALTER TABLE `tbl_contactos`
  MODIFY `id_contacto` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tbl_users`
--
ALTER TABLE `tbl_users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `tbl_contactos`
--
ALTER TABLE `tbl_contactos`
  ADD CONSTRAINT `FK_user` FOREIGN KEY (`id_user`) REFERENCES `tbl_users` (`id_user`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
