-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 02-04-2020 a las 19:52:03
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
-- Base de datos: `cornersports`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `entrenamientos`
--

CREATE TABLE `entrenamientos` (
  `Nombre` varchar(50) NOT NULL,
  `Precio` double NOT NULL,
  `Entrenador` varchar(50) NOT NULL,
  `Usuario` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `username` varchar(20) NOT NULL,
  `password` varchar(60) NOT NULL,
  `nombre` varchar(20) NOT NULL,
  `apellidos` varchar(40) NOT NULL,
  `email` varchar(20) NOT NULL,
  `provincia` varchar(20) NOT NULL,
  `localidad` varchar(40) NOT NULL,
  `calle` varchar(40) NOT NULL,
  `codPostal` varchar(5) NOT NULL,
  `portal` varchar(20) NOT NULL,
  `perfil` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`username`, `password`, `nombre`, `apellidos`, `email`, `provincia`, `localidad`, `calle`, `codPostal`, `portal`, `perfil`) VALUES
('admin', '$2y$10$MTwLq7RS.AAPoBeHx0tH7ufP406mN1aVe7GwJgG8xPnxS3aoJrjrK', 'admin', 'admin', 'adasd@', 'sadas', 'dasd', 'dsds', 'fsdsd', 'dasda', 'admin'),
('Sergio', '$2y$10$kOvIruo0D2c/zDzbfUod5OVPtN4sEaM7DROQb7/hJnIrwTDmlgLh2', 'Sergio', 'Morales', 'crespillo.sergio@gma', 'Madrid', 'Madrid', 'calle Rodio', '28040', '4A, 5ºC', 'usuario'),
('vicky', '$2y$10$IqkfN1PkF9cdhix7UJd2.Oz8yT3NRTTs/nutHxW3tF.a574cLpOjq', 'Viktoriia', 'Gnatiuk', 'adas#¡@adasa.com', 'adas', 'adasa', 'daasdad', 'dasda', 'dada', 'usuario');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD UNIQUE KEY `username` (`username`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
