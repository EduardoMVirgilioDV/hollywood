-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 01-07-2019 a las 07:03:19
-- Versión del servidor: 10.1.38-MariaDB
-- Versión de PHP: 7.3.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `hollywood`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `actores`
--

CREATE TABLE `actores` (
  `id` int(11) NOT NULL,
  `nombre` varchar(45) NOT NULL,
  `apellido` varchar(45) NOT NULL,
  `nacionalidad` varchar(45) DEFAULT NULL,
  `descripcion` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `actores`
--

INSERT INTO `actores` (`id`, `nombre`, `apellido`, `nacionalidad`, `descripcion`) VALUES
(4, 'Meryl', 'Streep', 'Estado Unidense', 'Actriz de teatro, cine y televisión'),
(5, 'Penelope', 'Cruz', 'EspaÃ±ola', ' Actriz y modelo.'),
(11, 'Ricardo', 'Darin', 'Argentino', ' Actor y Director de cine y tv.'),
(13, 'Natalie', 'Portman', 'Isrraelí', 'Actriz, productora y directora '),
(14, 'Kate', 'Winslet', 'Estado Unidense', 'Actriz de cine, tv y teatro.'),
(15, 'Gary', 'Oldman', 'Inglesa', ' actor, director, guionista, músico '),
(16, 'Brad', 'Pitt', 'Estado Unidense', 'Actor y productor de cine.'),
(17, 'Javier ', 'Bardem', 'Española', 'Actor.'),
(18, 'Tilda ', 'Swinton', 'Inglesa', ' Actriz y modelo'),
(19, 'Jean', 'Reno', 'Francesa', 'Actor.'),
(20, 'Keira Christina', 'Knightley', 'Inglesa', 'Actriz y Modelo.'),
(21, 'Christian ', 'Bale', 'Inglés', 'Actor.'),
(22, 'Cate ', 'Blanchett', 'Australiana', 'Actriz de cine y teatro.');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `actores_premios`
--

CREATE TABLE `actores_premios` (
  `actores_id` int(11) NOT NULL,
  `premios_idpremios` int(11) NOT NULL,
  `anio` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `actores_premios`
--

INSERT INTO `actores_premios` (`actores_id`, `premios_idpremios`, `anio`) VALUES
(11, 8, '2016'),
(11, 9, '2010'),
(13, 1, '2011'),
(13, 2, '2011'),
(14, 3, '2009'),
(15, 4, '2018'),
(17, 5, '2007'),
(18, 7, '2007'),
(21, 6, '2014'),
(22, 10, '2014'),
(22, 11, '1999'),
(22, 12, '2005');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `premios`
--

CREATE TABLE `premios` (
  `idpremios` int(11) NOT NULL,
  `nombre` varchar(45) NOT NULL,
  `descripcion` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `premios`
--

INSERT INTO `premios` (`idpremios`, `nombre`, `descripcion`) VALUES
(1, 'Premio Oscar', 'Mejor Actriz'),
(2, 'BAFTA Film Award', 'Mejor Actriz '),
(3, 'Bafta', 'Mejor Actriz'),
(4, 'Premio Oscar', 'Mejor Actor'),
(5, 'Oscar', 'Mejor actor de reparto'),
(6, 'SAG', 'Mejor actor de reparto'),
(7, 'Oscar', 'Mejor Actriz de reparto'),
(8, 'Goya', 'Mejor Actor'),
(9, 'Condor de Plata', 'Mejor Actor'),
(10, 'Oscar', 'Mejor Actriz'),
(11, 'Globo de oro', 'Mejor actriz drama'),
(12, 'Oscar', 'Mejor actriz de reparto');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `actores`
--
ALTER TABLE `actores`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `actores_premios`
--
ALTER TABLE `actores_premios`
  ADD PRIMARY KEY (`actores_id`,`premios_idpremios`),
  ADD KEY `fk_actores_has_premios_premios1_idx` (`premios_idpremios`),
  ADD KEY `fk_actores_has_premios_actores_idx` (`actores_id`);

--
-- Indices de la tabla `premios`
--
ALTER TABLE `premios`
  ADD PRIMARY KEY (`idpremios`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `actores`
--
ALTER TABLE `actores`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT de la tabla `premios`
--
ALTER TABLE `premios`
  MODIFY `idpremios` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `actores_premios`
--
ALTER TABLE `actores_premios`
  ADD CONSTRAINT `fk_actores_has_premios_actores` FOREIGN KEY (`actores_id`) REFERENCES `actores` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_actores_has_premios_premios1` FOREIGN KEY (`premios_idpremios`) REFERENCES `premios` (`idpremios`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
