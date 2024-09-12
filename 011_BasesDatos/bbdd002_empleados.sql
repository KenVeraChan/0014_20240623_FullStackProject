-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 12-09-2024 a las 19:15:19
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `bbdd002_empleados`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `contactos_empresa`
--

CREATE TABLE `contactos_empresa` (
  `ID` int(3) NOT NULL,
  `NOMBRE` varchar(30) DEFAULT NULL,
  `APELLIDOS` varchar(50) DEFAULT NULL,
  `DIRECCION` varchar(50) DEFAULT NULL,
  `POBLACION` varchar(20) DEFAULT NULL,
  `PROFESION` varchar(30) DEFAULT NULL,
  `SALAR_ANT` int(6) DEFAULT NULL,
  `CONTRATACION` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `contactos_empresa`
--

INSERT INTO `contactos_empresa` (`ID`, `NOMBRE`, `APELLIDOS`, `DIRECCION`, `POBLACION`, `PROFESION`, `SALAR_ANT`, `CONTRATACION`) VALUES
(1, 'Rasselín', 'Wissangel Rousher', 'calle fuente plateada 32', 'Valencia', 'Estudiante', 234000, 'APROBADA'),
(2, 'Vitrea', 'Horiz', 'Calle cirios cruzados 82', 'Barcelona', 'Oficial', 3144, 'DENEGADA'),
(3, 'Emiliam', 'Bastreriz', 'calle musicalizacion 32', 'Northwith', 'Oficial', 30922, 'APROBADA'),
(4, 'Verduliz', 'Sainz', 'Calle Vilnus 12', 'Tarragona', 'Profesor/a', 32312, 'PENDIENTE'),
(5, 'Veddina', 'Henion', 'calle arbolados 9', 'Northwith', 'Camarero/a', 34021, 'DENEGADA'),
(6, 'Samira', 'Savadez', 'Calle Manuel Azaña 64', 'Northwith', 'Recepcionista', 12121, 'DENEGADA'),
(7, 'Christal', 'Gedishen', 'nuevos atos', 'Madrid', 'Funcionario/a', 20000, 'APROBADA'),
(8, 'Jill', 'Anherson', 'nuevos ministerios', 'Tarragona', 'Profesor/a', 234000, 'APROBADA'),
(9, 'Shail', 'Matsiz', 'arces 3', 'Barcelona', 'Profesor/a', 120000, 'APROBADA'),
(10, 'Ken', 'Horiz', 'Calle Manuel Azaña 64', 'Barcelona', 'Taxista', 12121, 'DENEGADA'),
(11, 'Neth', 'Horiz', 'nuevas platas', 'Barcelona', 'Profesor/a', 12121, 'APROBADA');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `contactos_empresa`
--
ALTER TABLE `contactos_empresa`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `contactos_empresa`
--
ALTER TABLE `contactos_empresa`
  MODIFY `ID` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
