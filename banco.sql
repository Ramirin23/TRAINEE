-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3307
-- Tiempo de generación: 09-08-2023 a las 04:15:26
-- Versión del servidor: 10.4.21-MariaDB
-- Versión de PHP: 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `banco`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cliente`
--

CREATE TABLE `cliente` (
  `ID` int(11) NOT NULL,
  `Tipo_de_identificacion` varchar(50) NOT NULL,
  `Numero_identificacion` varchar(50) NOT NULL,
  `Nombres` varchar(50) NOT NULL,
  `Apellidos` varchar(50) NOT NULL,
  `Razon_social` varchar(50) NOT NULL,
  `Municipio` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `cliente`
--

INSERT INTO `cliente` (`ID`, `Tipo_de_identificacion`, `Numero_identificacion`, `Nombres`, `Apellidos`, `Razon_social`, `Municipio`) VALUES
(1, 'INE', '32423423', 'Luis', 'Suarez', '', 'Morelia'),
(2, 'INE', '23423444', 'Sergio', 'Perez', '', 'Morelia'),
(3, 'Acta Constitutiva', '123123', '', '', 'EMKODE', 'Morelia'),
(4, 'INE', '000514', 'Ramiro', 'Cortes', '', 'Patzcuaro'),
(5, 'INE', '000514', 'Ramiro', 'Cortes', '', 'Patzcuaro'),
(6, 'INE', '000514', 'Ramiro', 'Cortes', '', 'Patzcuaro'),
(7, 'INE', '000514', 'Ramiro', 'Cortes', '', 'Patzcuaro'),
(8, 'INE', '000514', 'Ramiro', 'Cortes', '', 'Patzcuaro'),
(9, 'INE', '000514', 'Ramiro', 'Cortes', '', 'Patzcuaro');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `cliente`
--
ALTER TABLE `cliente`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
