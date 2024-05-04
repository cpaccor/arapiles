-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 05-05-2024 a las 01:07:41
-- Versión del servidor: 10.4.27-MariaDB
-- Versión de PHP: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `pruebaarapiles`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `equipos`
--

CREATE TABLE `equipos` (
  `id` int(11) NOT NULL,
  `nombreEquipo` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `equipos`
--

INSERT INTO `equipos` (`id`, `nombreEquipo`) VALUES
(1, 'PRUEBA'),
(2, 'PRUEBA2');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `participantes`
--

CREATE TABLE `participantes` (
  `id` int(11) NOT NULL,
  `idEquipo` int(11) DEFAULT NULL,
  `nombre` varchar(255) NOT NULL,
  `apellido1` varchar(255) NOT NULL,
  `apellido2` varchar(255) NOT NULL,
  `dni` varchar(20) NOT NULL,
  `sexo` varchar(20) NOT NULL,
  `fechaNacimiento` date NOT NULL,
  `fcse` enum('Si','No') NOT NULL,
  `matricula` varchar(20) DEFAULT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `participantes`
--

INSERT INTO `participantes` (`id`, `idEquipo`, `nombre`, `apellido1`, `apellido2`, `dni`, `sexo`, `fechaNacimiento`, `fcse`, `matricula`, `email`) VALUES
(1, 1, 'CRISTIAN', 'PACHE', 'PACHECO', '41569975M', 'F', '1900-02-20', 'Si', '2541LKJ', 'CRISTIAN_PAC@LIVE.COM'),
(2, 1, 'CRISTIAN FERNANDO', 'PACHECI', 'PACHECO CORRALES', '41569975M', 'M', '2009-08-15', 'No', '9635LKJ', 'CRISTIAN_PAC@LIVE.COM'),
(3, 1, 'CRISTIAN FERNANDO', 'PLJDSA', 'PACHECO CORRALES', '41569975M', 'F', '2001-02-18', 'Si', '', 'CRISTIAN_PAC@LIVE.COM'),
(4, 1, 'CRISTIAN', 'ASDRT', 'PACHECO', '41569975M', 'M', '2002-09-06', 'No', '7852MSD', 'CRISTIAN_PAC@LIVE.COM'),
(5, 2, 'ALBA', 'ALBA', 'ALBA', '41569975M', 'F', '2001-01-01', 'Si', '0592ASD', 'ASD@ASD.ES'),
(6, 2, 'ALBA', 'ALBA', 'ALBA', '41569975M', 'F', '2005-02-01', 'Si', '9587LKJ', 'ASD@ASD.ES'),
(7, 2, 'ALBA', 'ALBA', 'ALBA', '41569975M', 'M', '2007-06-01', 'No', '4759HSD', 'ASD@ASD.ES'),
(8, 2, 'ALB', 'ALABAS', 'NANO', '41569975M', 'M', '2008-12-04', 'No', '444444', 'ASD@ASD.ES');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `equipos`
--
ALTER TABLE `equipos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `participantes`
--
ALTER TABLE `participantes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idEquipo` (`idEquipo`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `equipos`
--
ALTER TABLE `equipos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `participantes`
--
ALTER TABLE `participantes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `participantes`
--
ALTER TABLE `participantes`
  ADD CONSTRAINT `participantes_ibfk_1` FOREIGN KEY (`idEquipo`) REFERENCES `equipos` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
