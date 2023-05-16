-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 14-04-2023 a las 07:42:03
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
-- Base de datos: `doctordiary`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `admin`
--

CREATE TABLE `admin` (
  `aemail` varchar(255) NOT NULL,
  `apassword` varchar(255) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `admin`
--

INSERT INTO `admin` (`aemail`, `apassword`) VALUES
('admin@edoc.com', '123'),
('admin@doctordiary.com', '123');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `appointment`
--

CREATE TABLE `appointment` (
  `appoid` int(11) NOT NULL,
  `pid` int(10) DEFAULT NULL,
  `apponum` int(3) DEFAULT NULL,
  `scheduleid` int(10) DEFAULT NULL,
  `appodate` date DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `appointment`
--

INSERT INTO `appointment` (`appoid`, `pid`, `apponum`, `scheduleid`, `appodate`) VALUES
(1, 1, 1, 1, '2022-06-03'),
(4, 3, 2, 1, '2023-04-06'),
(5, 3, 1, 9, '2023-04-09'),
(6, 3, 2, 9, '2023-04-09');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `doctor`
--

CREATE TABLE `doctor` (
  `docid` int(11) NOT NULL,
  `docemail` varchar(255) DEFAULT NULL,
  `docname` varchar(255) DEFAULT NULL,
  `docpassword` varchar(255) DEFAULT NULL,
  `docnic` varchar(15) DEFAULT NULL,
  `doctel` varchar(15) DEFAULT NULL,
  `specialties` int(2) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `doctor`
--

INSERT INTO `doctor` (`docid`, `docemail`, `docname`, `docpassword`, `docnic`, `doctel`, `specialties`) VALUES
(1, 'drsilva@gmail.com', 'Dr. Silva', '123', '000000000', '0110000000', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `patient`
--

CREATE TABLE `patient` (
  `pid` int(11) NOT NULL,
  `pemail` varchar(255) DEFAULT NULL,
  `pname` varchar(255) DEFAULT NULL,
  `ppassword` varchar(255) DEFAULT NULL,
  `paddress` varchar(255) DEFAULT NULL,
  `pnic` varchar(15) DEFAULT NULL,
  `pdob` date DEFAULT NULL,
  `ptel` varchar(15) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `patient`
--

INSERT INTO `patient` (`pid`, `pemail`, `pname`, `ppassword`, `paddress`, `pnic`, `pdob`, `ptel`) VALUES
(3, 'ramses@gmail.com', 'Ramses Diaz', '123', 'Col. Bosques del Sur', '010101', '2001-07-27', '0712345678');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `schedule`
--

CREATE TABLE `schedule` (
  `scheduleid` int(11) NOT NULL,
  `docid` varchar(255) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `scheduledate` date DEFAULT NULL,
  `scheduletime` time DEFAULT NULL,
  `nop` int(4) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `schedule`
--

INSERT INTO `schedule` (`scheduleid`, `docid`, `title`, `scheduledate`, `scheduletime`, `nop`) VALUES
(9, '1', '1', '2023-04-18', '00:42:00', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `specialties`
--

CREATE TABLE `specialties` (
  `id` int(2) NOT NULL,
  `sname` varchar(50) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `specialties`
--

INSERT INTO `specialties` (`id`, `sname`) VALUES
(1, 'Medicina de urgencias'),
(2, 'Alergología'),
(3, 'Anestesiología'),
(4, 'Cardiología'),
(5, 'Psiquiatría infantil'),
(6, 'Química Clínica'),
(7, 'Neurofisiología clínica'),
(8, 'Radiología clínica'),
(9, 'Dermatología'),
(10, 'Endocrinología'),
(11, 'Gastroenterología'),
(12, 'Hematología general'),
(13, 'Práctica general'),
(14, 'Cirugía General'),
(15, 'Geriatría'),
(16, 'Inmunología'),
(17, 'Enfermedades infecciosas'),
(18, 'Medicina Interna'),
(19, 'Laboratorista');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `webuser`
--

CREATE TABLE `webuser` (
  `email` varchar(255) NOT NULL,
  `usertype` char(1) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `webuser`
--

INSERT INTO `webuser` (`email`, `usertype`) VALUES
('admin@edoc.com', 'a'),
('drsilva@gmail.com', 'd'),
('ramses@gmail.com', 'p'),
('admin@doctordiary.com', 'a');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`aemail`);

--
-- Indices de la tabla `appointment`
--
ALTER TABLE `appointment`
  ADD PRIMARY KEY (`appoid`),
  ADD KEY `pid` (`pid`),
  ADD KEY `scheduleid` (`scheduleid`);

--
-- Indices de la tabla `doctor`
--
ALTER TABLE `doctor`
  ADD PRIMARY KEY (`docid`),
  ADD KEY `specialties` (`specialties`);

--
-- Indices de la tabla `patient`
--
ALTER TABLE `patient`
  ADD PRIMARY KEY (`pid`);

--
-- Indices de la tabla `schedule`
--
ALTER TABLE `schedule`
  ADD PRIMARY KEY (`scheduleid`),
  ADD KEY `docid` (`docid`);

--
-- Indices de la tabla `specialties`
--
ALTER TABLE `specialties`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `webuser`
--
ALTER TABLE `webuser`
  ADD PRIMARY KEY (`email`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `appointment`
--
ALTER TABLE `appointment`
  MODIFY `appoid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `doctor`
--
ALTER TABLE `doctor`
  MODIFY `docid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `patient`
--
ALTER TABLE `patient`
  MODIFY `pid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `schedule`
--
ALTER TABLE `schedule`
  MODIFY `scheduleid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
