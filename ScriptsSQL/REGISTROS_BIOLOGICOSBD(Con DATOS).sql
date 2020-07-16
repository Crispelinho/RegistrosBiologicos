-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 16-07-2020 a las 13:29:15
-- Versión del servidor: 10.4.11-MariaDB
-- Versión de PHP: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `registros_biologicosbd`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ecoregion`
--

CREATE TABLE `ecoregion` (
  `idEcoregion` int(11) NOT NULL,
  `nombre` varchar(45) DEFAULT NULL,
  `descripcion` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `ecoregion`
--

INSERT INTO `ecoregion` (`idEcoregion`, `nombre`, `descripcion`) VALUES
(1, 'fdfdf', 'dfdf'),
(3, 'fdfd', 'dfdf'),
(4, 'sdsdsds', 'dsd');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proyecto`
--

CREATE TABLE `proyecto` (
  `idProyecto` int(11) NOT NULL,
  `nombre` varchar(45) DEFAULT NULL,
  `descripcion` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `proyecto`
--

INSERT INTO `proyecto` (`idProyecto`, `nombre`, `descripcion`) VALUES
(1, 'EFRAIN', 'ASSS'),
(16, 'ssdsd', 'sdsdsd'),
(17, 'asas', 'aasas');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `registro`
--

CREATE TABLE `registro` (
  `idRegistro` int(11) NOT NULL,
  `especie` varchar(45) DEFAULT NULL,
  `familia` varchar(45) DEFAULT NULL,
  `nombre_comun` varchar(45) DEFAULT NULL,
  `base_registro` enum('observacionHumana','especimen') DEFAULT NULL,
  `identificador` varchar(45) DEFAULT NULL,
  `ano` varchar(45) DEFAULT NULL,
  `identificacion` varchar(45) DEFAULT NULL,
  `departamento` varchar(45) DEFAULT NULL,
  `municipio` varchar(45) DEFAULT NULL,
  `localidad` varchar(45) DEFAULT NULL,
  `latitud` varchar(45) DEFAULT NULL,
  `longitud` varchar(45) DEFAULT NULL,
  `autor` varchar(45) DEFAULT NULL,
  `fecha` varchar(45) DEFAULT NULL,
  `captura` varchar(45) DEFAULT NULL,
  `idProyecto` int(11) NOT NULL,
  `idEcoregion` int(11) NOT NULL,
  `fechaCreacion` datetime DEFAULT NULL,
  `fechaActualizacion` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `registro`
--

INSERT INTO `registro` (`idRegistro`, `especie`, `familia`, `nombre_comun`, `base_registro`, `identificador`, `ano`, `identificacion`, `departamento`, `municipio`, `localidad`, `latitud`, `longitud`, `autor`, `fecha`, `captura`, `idProyecto`, `idEcoregion`, `fechaCreacion`, `fechaActualizacion`) VALUES
(1, 'ALBERTO', 'sdsd', '', '', 'sdsd', '', 'ssd', 'sdsd', 'sdsd', 'sdsd', 'sdsd', 'sdsd', 'sdsd', 'ssdsd', '', 1, 1, '2020-07-16 12:51:14', '2020-07-16 12:51:14'),
(9, 'sdsd', 'sds', 'sdsd', 'observacionHumana', 'sdsd', 'sdsd', 'sdsd', 'sdsd', 'sdsd', 'sdsd', 'sdsd', 'sds', 'sdsd', 'sdsd', 'sdsd', 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(10, 'sdsd', 'sds', 'sdsd', 'observacionHumana', 'sdsd', 'sdsd', 'sdsd', 'sdsd', 'sdsd', 'sdsd', 'sdsd', 'sds', 'sdsd', 'sdsd', 'sdsd', 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(11, 'asas', 'as', 'asas', 'observacionHumana', 'asas', 'asas', 'asas', 'asas', 'asas', 'asas', 'asas', 'as', 'asas', 'asa', 'asas', 1, 1, '2020-07-16 12:53:04', '2020-07-16 12:53:04');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `ecoregion`
--
ALTER TABLE `ecoregion`
  ADD PRIMARY KEY (`idEcoregion`);

--
-- Indices de la tabla `proyecto`
--
ALTER TABLE `proyecto`
  ADD PRIMARY KEY (`idProyecto`);

--
-- Indices de la tabla `registro`
--
ALTER TABLE `registro`
  ADD PRIMARY KEY (`idRegistro`),
  ADD KEY `fk_Registro_Proyecto` (`idProyecto`),
  ADD KEY `fk_Registro_Ecoregion` (`idEcoregion`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `ecoregion`
--
ALTER TABLE `ecoregion`
  MODIFY `idEcoregion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `proyecto`
--
ALTER TABLE `proyecto`
  MODIFY `idProyecto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT de la tabla `registro`
--
ALTER TABLE `registro`
  MODIFY `idRegistro` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `registro`
--
ALTER TABLE `registro`
  ADD CONSTRAINT `fk_Registro_Ecoregion` FOREIGN KEY (`idEcoregion`) REFERENCES `ecoregion` (`idEcoregion`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Registro_Proyecto` FOREIGN KEY (`idProyecto`) REFERENCES `proyecto` (`idProyecto`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
