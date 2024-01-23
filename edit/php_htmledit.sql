-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 01-06-2019 a las 23:05:13
-- Versión del servidor: 10.1.37-MariaDB
-- Versión de PHP: 7.3.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `php_htmledit`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios_detalles`
--

CREATE TABLE `usuarios_detalles` (
  `Id` int(11) NOT NULL,
  `Nombres` varchar(50) DEFAULT NULL,
  `Apellidos` varchar(50) DEFAULT NULL,
  `Ciudad` varchar(50) DEFAULT NULL,
  `Cel` varchar(50) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `usuarios_detalles`
--

INSERT INTO `usuarios_detalles` (`Id`, `Nombres`, `Apellidos`, `Ciudad`, `Cel`) VALUES
(1, 'Mario', 'Kalkaterra', 'Mexico', '90056231'),
(2, 'Carlos', 'Lujan', 'Bogota', '90056232'),
(3, 'Luisa', 'Retamozo', 'Montevideo', '90056233'),
(4, 'Valentin', 'Hidalgo', 'Quito', '90056236'),
(5, 'Maria', 'Quintanilla', 'Lima', '90056239');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `usuarios_detalles`
--
ALTER TABLE `usuarios_detalles`
  ADD PRIMARY KEY (`Id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `usuarios_detalles`
--
ALTER TABLE `usuarios_detalles`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
