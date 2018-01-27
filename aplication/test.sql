-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 20-01-2018 a las 21:50:02
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
-- Base de datos: `test`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalles_diagnostico`
--

CREATE TABLE `detalles_diagnostico` (
  `ID_DC_P` int(11) DEFAULT NULL,
  `CANTIDAD` int(50) NOT NULL,
  `CONCEPTO` varchar(255) NOT NULL,
  `SUB_TOTAL` double NOT NULL,
  `TOTAL` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalles_empleado`
--

CREATE TABLE `detalles_empleado` (
  `ID_D_E` varchar(24) DEFAULT NULL,
  `NOMBRE` varchar(20) NOT NULL,
  `APELLIDO` varchar(12) NOT NULL,
  `EDAD` int(3) NOT NULL,
  `GENERO` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empleados`
--

CREATE TABLE `empleados` (
  `USUARIO` varchar(24) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `paciente`
--

CREATE TABLE `paciente` (
  `ID_PACIENTE` int(11) DEFAULT NULL,
  `NOMBRE` varchar(24) NOT NULL,
  `APELLIDO` varchar(24) NOT NULL,
  `CEDULA` int(15) NOT NULL,
  `DIAGNOSTICO` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles_empleado`
--

CREATE TABLE `roles_empleado` (
  `ID_R_E` varchar(24) DEFAULT NULL,
  `PROFESION` varchar(100) NOT NULL,
  `ROL` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `servicios_empleado`
--

CREATE TABLE `servicios_empleado` (
  `ID_SERVICIOS` varchar(25) NOT NULL,
  `NOMBRE` varchar(255) NOT NULL,
  `ID_S_PACIENTE` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `detalles_diagnostico`
--
ALTER TABLE `detalles_diagnostico`
  ADD KEY `ID_DD_P` (`ID_DC_P`);

--
-- Indices de la tabla `detalles_empleado`
--
ALTER TABLE `detalles_empleado`
  ADD KEY `ID_E` (`ID_D_E`);

--
-- Indices de la tabla `empleados`
--
ALTER TABLE `empleados`
  ADD PRIMARY KEY (`USUARIO`);

--
-- Indices de la tabla `paciente`
--
ALTER TABLE `paciente`
  ADD PRIMARY KEY (`CEDULA`),
  ADD UNIQUE KEY `CEDULA` (`CEDULA`),
  ADD KEY `ID_P` (`ID_PACIENTE`),
  ADD KEY `CEDULA_2` (`CEDULA`);

--
-- Indices de la tabla `roles_empleado`
--
ALTER TABLE `roles_empleado`
  ADD PRIMARY KEY (`ROL`),
  ADD KEY `ID_R_E` (`ID_R_E`);

--
-- Indices de la tabla `servicios_empleado`
--
ALTER TABLE `servicios_empleado`
  ADD PRIMARY KEY (`ID_S_PACIENTE`),
  ADD KEY `ID_S_E` (`ID_SERVICIOS`),
  ADD KEY `ID_S_E_2` (`ID_SERVICIOS`),
  ADD KEY `ID_SERVICIOS` (`ID_SERVICIOS`);

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `detalles_diagnostico`
--
ALTER TABLE `detalles_diagnostico`
  ADD CONSTRAINT `detalles_diagnostico_ibfk_1` FOREIGN KEY (`ID_DC_P`) REFERENCES `paciente` (`CEDULA`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `detalles_empleado`
--
ALTER TABLE `detalles_empleado`
  ADD CONSTRAINT `detalles_empleado_ibfk_1` FOREIGN KEY (`ID_D_E`) REFERENCES `empleados` (`USUARIO`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `paciente`
--
ALTER TABLE `paciente`
  ADD CONSTRAINT `paciente_ibfk_1` FOREIGN KEY (`ID_PACIENTE`) REFERENCES `servicios_empleado` (`ID_S_PACIENTE`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `roles_empleado`
--
ALTER TABLE `roles_empleado`
  ADD CONSTRAINT `roles_empleado_ibfk_1` FOREIGN KEY (`ID_R_E`) REFERENCES `empleados` (`USUARIO`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `servicios_empleado`
--
ALTER TABLE `servicios_empleado`
  ADD CONSTRAINT `servicios_empleado_ibfk_1` FOREIGN KEY (`ID_SERVICIOS`) REFERENCES `roles_empleado` (`ROL`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
