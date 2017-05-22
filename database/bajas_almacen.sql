-- phpMyAdmin SQL Dump
-- version 4.6.5.1
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:8889
-- Tiempo de generación: 13-02-2017 a las 18:16:41
-- Versión del servidor: 5.6.34
-- Versión de PHP: 5.5.38

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `inventario`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bajas_reubicaciones_almacen`
--

CREATE TABLE `bajas_reubicaciones_almacen` (
  `id` int(10) NOT NULL,
  `solicitud` int(10) NOT NULL,
  `tipo` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `f_registro` date NOT NULL,
  `estado1` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `f_cierre` date NOT NULL,
  `estado2` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `observaciones` varchar(550) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `bajas_reubicaciones_almacen`
--

INSERT INTO `bajas_reubicaciones_almacen` (`id`, `solicitud`, `tipo`, `f_registro`, `estado1`, `f_cierre`, `estado2`, `observaciones`) VALUES
(1, 1, 'BAJA', '2017-01-17', 'ENVIADO A EMMA', '0000-00-00', '', ''),
(2, 2, 'BAJA', '2017-01-17', 'ENVIADO A EMMA', '0000-00-00', '', ''),
(3, 3, 'BAJA', '2017-01-17', 'ENVIADO A EMMA', '0000-00-00', '', ''),
(4, 4, 'BAJA', '2017-01-17', 'ENVIADO A EMMA', '0000-00-00', '', ''),
(5, 5, 'BAJA', '2017-01-17', 'ENVIADO A EMMA', '0000-00-00', '', ''),
(11, 6, 'BAJA', '2017-02-13', 'ENVIADO A EMMA', '0000-00-00', '', 'NO TIENE'),
(12, 7, 'BAJA', '2017-02-13', 'ENVIADO A EMMA', '0000-00-00', '', 'NO TIENE');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `bajas_reubicaciones_almacen`
--
ALTER TABLE `bajas_reubicaciones_almacen`
  ADD PRIMARY KEY (`solicitud`),
  ADD UNIQUE KEY `id` (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `bajas_reubicaciones_almacen`
--
ALTER TABLE `bajas_reubicaciones_almacen`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
