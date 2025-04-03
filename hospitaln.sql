-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:8889
-- Tiempo de generación: 22-07-2024 a las 15:41:29
-- Versión del servidor: 5.7.39
-- Versión de PHP: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `hospitaln`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cita`
--

CREATE TABLE `cita` (
  `idcita` int(11) NOT NULL,
  `idpaciente` int(11) NOT NULL,
  `iddoctor` int(11) NOT NULL,
  `fechacita` datetime NOT NULL,
  `motivo` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `cita`
--

INSERT INTO `cita` (`idcita`, `idpaciente`, `iddoctor`, `fechacita`, `motivo`) VALUES
(1, 1, 2, '2024-07-20 09:00:00', 'Chequeo general'),
(2, 3, 1, '2024-07-21 10:30:00', 'Consulta de seguimiento'),
(3, 4, 5, '2024-07-22 14:00:00', 'Revisión de resultados'),
(4, 2, 3, '2024-07-23 16:15:00', 'Consulta por dolor de cabeza'),
(5, 5, 4, '2024-07-24 11:45:00', 'Evaluación de síntomas'),
(6, 1, 1, '2024-07-05 14:00:00', 'asxsx');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `doctor`
--

CREATE TABLE `doctor` (
  `iddoctor` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `papellido` varchar(100) NOT NULL,
  `mapellido` varchar(100) DEFAULT NULL,
  `direccion` varchar(255) DEFAULT NULL,
  `edad` int(11) DEFAULT NULL,
  `sexo` char(1) DEFAULT NULL,
  `telefono` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `doctor`
--

INSERT INTO `doctor` (`iddoctor`, `nombre`, `papellido`, `mapellido`, `direccion`, `edad`, `sexo`, `telefono`) VALUES
(1, 'Roberto', 'Castro', 'Gómez', 'Calle del Sol 456', 45, 'm', '555112233'),
(2, 'María', 'Sánchez', 'Mendoza', 'Avenida del Río 789', 38, 'f', '555445566'),
(3, 'Jorge', 'López', 'Fernández', 'Boulevard de la Salud 101', 50, 'm', '555778899'),
(4, 'Ana', 'Morales', 'Pérez', 'Calle de la Esperanza 202', 42, 'f', '555223344'),
(5, 'Carlos', 'Ramírez', 'Gutiérrez', 'Plaza Mayor 303', 35, 'm', '555667788'),
(7, 'ana', 'a', 'a', 'a', 1, 'a', 'a');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `especialidad`
--

CREATE TABLE `especialidad` (
  `idespe` int(11) NOT NULL,
  `iddoctor` int(11) NOT NULL,
  `nombre_espe` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `especialidad`
--

INSERT INTO `especialidad` (`idespe`, `iddoctor`, `nombre_espe`) VALUES
(1, 1, 'Cardiología'),
(2, 2, 'Neurología'),
(3, 3, 'Dermatología'),
(4, 4, 'Pediatría'),
(5, 5, 'Oftalmologíaaa');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `paciente`
--

CREATE TABLE `paciente` (
  `idpaciente` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `papellido` varchar(100) NOT NULL,
  `mapellido` varchar(100) DEFAULT NULL,
  `direccion` varchar(255) DEFAULT NULL,
  `edad` int(11) DEFAULT NULL,
  `sexo` char(1) DEFAULT NULL,
  `telefono` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `paciente`
--

INSERT INTO `paciente` (`idpaciente`, `nombre`, `papellido`, `mapellido`, `direccion`, `edad`, `sexo`, `telefono`) VALUES
(1, 'Laura', 'Fernández', 'Sánchez', 'Calle del Lago 123', 29, 'f', '555123456'),
(2, 'Miguel', 'Gómez', 'López', 'Avenida Central 456', 34, 'm', '555654321'),
(3, 'Elena', 'Martínez', 'Cruz', 'Boulevard de los Sueños 789', 41, 'f', '555987654'),
(4, 'Antonio', 'Reyes', 'Torres', 'Plaza de España 101', 55, 'm', '555345678'),
(5, 'Valeria', 'Morales', 'Jiménez', 'Calle 45 202', 23, 'f', '555678901');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sessiones_login`
--

CREATE TABLE `sessiones_login` (
  `cuenta_correo` varchar(255) NOT NULL,
  `nombre` varchar(255) DEFAULT NULL,
  `password_hash` varchar(255) DEFAULT NULL,
  `registration_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `sessiones_login`
--

INSERT INTO `sessiones_login` (`cuenta_correo`, `nombre`, `password_hash`, `registration_date`) VALUES
('a@gmail.com', 'A', 'e65cf99ae53e2c447ef50aba6fceb3d4d468bbfea19a4a43c2c3b1a4cb2af355c18b71c6b0a4aeef90609cee03b6a13baf562dfb56eeb25d26e5252377ab64ca', '2024-07-19'),
('karen@gmail.com', 'karen', 'e65cf99ae53e2c447ef50aba6fceb3d4d468bbfea19a4a43c2c3b1a4cb2af355c18b71c6b0a4aeef90609cee03b6a13baf562dfb56eeb25d26e5252377ab64ca', '2024-07-19');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `cita`
--
ALTER TABLE `cita`
  ADD PRIMARY KEY (`idcita`),
  ADD KEY `idpaciente` (`idpaciente`),
  ADD KEY `iddoctor` (`iddoctor`);

--
-- Indices de la tabla `doctor`
--
ALTER TABLE `doctor`
  ADD PRIMARY KEY (`iddoctor`);

--
-- Indices de la tabla `especialidad`
--
ALTER TABLE `especialidad`
  ADD PRIMARY KEY (`idespe`),
  ADD KEY `iddoctor` (`iddoctor`);

--
-- Indices de la tabla `paciente`
--
ALTER TABLE `paciente`
  ADD PRIMARY KEY (`idpaciente`);

--
-- Indices de la tabla `sessiones_login`
--
ALTER TABLE `sessiones_login`
  ADD PRIMARY KEY (`cuenta_correo`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `cita`
--
ALTER TABLE `cita`
  MODIFY `idcita` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `doctor`
--
ALTER TABLE `doctor`
  MODIFY `iddoctor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `especialidad`
--
ALTER TABLE `especialidad`
  MODIFY `idespe` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `paciente`
--
ALTER TABLE `paciente`
  MODIFY `idpaciente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `cita`
--
ALTER TABLE `cita`
  ADD CONSTRAINT `cita_ibfk_1` FOREIGN KEY (`idpaciente`) REFERENCES `paciente` (`idpaciente`) ON DELETE CASCADE,
  ADD CONSTRAINT `cita_ibfk_2` FOREIGN KEY (`iddoctor`) REFERENCES `doctor` (`iddoctor`) ON DELETE CASCADE;

--
-- Filtros para la tabla `especialidad`
--
ALTER TABLE `especialidad`
  ADD CONSTRAINT `especialidad_ibfk_1` FOREIGN KEY (`iddoctor`) REFERENCES `doctor` (`iddoctor`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
