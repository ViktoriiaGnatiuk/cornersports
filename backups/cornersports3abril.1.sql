-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 03-04-2020 a las 00:53:54
-- Versión del servidor: 10.4.11-MariaDB
-- Versión de PHP: 7.4.2

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
-- Estructura de tabla para la tabla `entrenadores`
--

CREATE TABLE `entrenadores` (
  `id` int(10) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `escpecialidad` varchar(20) NOT NULL,
  `sueldo` decimal(10,0) NOT NULL,
  `puntuacion` int(2) NOT NULL,
  `entrenamientos` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `entrenamientos`
--

CREATE TABLE `entrenamientos` (
  `Nombre` varchar(50) CHARACTER SET utf8 NOT NULL,
  `Precio` double NOT NULL,
  `Entrenador` int(10) NOT NULL,
  `id` int(10) NOT NULL,
  `dias` int(11) NOT NULL,
  `dificultad` varchar(10) CHARACTER SET utf8 NOT NULL,
  `dia_actual` int(2) NOT NULL,
  `fecha_comienzo` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `entrenamientos_disponibles`
--

CREATE TABLE `entrenamientos_disponibles` (
  `id` int(10) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `dias` int(2) NOT NULL,
  `precio` int(2) NOT NULL,
  `entrenador` int(10) NOT NULL,
  `dificultad` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
  `perfil` varchar(20) NOT NULL,
  `entrenamiento_activo` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`username`, `password`, `nombre`, `apellidos`, `email`, `provincia`, `localidad`, `calle`, `codPostal`, `portal`, `perfil`, `entrenamiento_activo`) VALUES
('admin', '$2y$10$MTwLq7RS.AAPoBeHx0tH7ufP406mN1aVe7GwJgG8xPnxS3aoJrjrK', 'admin', 'admin', 'adasd@', 'sadas', 'dasd', 'dsds', 'fsdsd', 'dasda', 'admin', NULL),
('vicky', '$2y$10$IqkfN1PkF9cdhix7UJd2.Oz8yT3NRTTs/nutHxW3tF.a574cLpOjq', 'Viktoriia', 'Gnatiuk', 'adas#¡@adasa.com', 'adas', 'adasa', 'daasdad', 'dasda', 'dada', 'usuario', NULL);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `entrenadores`
--
ALTER TABLE `entrenadores`
  ADD PRIMARY KEY (`id`),
  ADD KEY `entrenamientos` (`entrenamientos`);

--
-- Indices de la tabla `entrenamientos`
--
ALTER TABLE `entrenamientos`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `Entrenador` (`Entrenador`) USING BTREE;

--
-- Indices de la tabla `entrenamientos_disponibles`
--
ALTER TABLE `entrenamientos_disponibles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `entrenador` (`entrenador`) USING BTREE;

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `entrenamiento_activo` (`entrenamiento_activo`) USING BTREE;

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `entrenadores`
--
ALTER TABLE `entrenadores`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `entrenamientos`
--
ALTER TABLE `entrenamientos`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `entrenamientos_disponibles`
--
ALTER TABLE `entrenamientos_disponibles`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `entrenadores`
--
ALTER TABLE `entrenadores`
  ADD CONSTRAINT `entrenadores_ibfk_1` FOREIGN KEY (`entrenamientos`) REFERENCES `entrenamientos` (`id`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `entrenamientos`
--
ALTER TABLE `entrenamientos`
  ADD CONSTRAINT `entrenamientos_ibfk_1` FOREIGN KEY (`Entrenador`) REFERENCES `entrenadores` (`id`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `entrenamientos_disponibles`
--
ALTER TABLE `entrenamientos_disponibles`
  ADD CONSTRAINT `entrenamientos_disponibles_ibfk_1` FOREIGN KEY (`entrenador`) REFERENCES `entrenadores` (`id`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `usuarios_ibfk_1` FOREIGN KEY (`entrenamiento_activo`) REFERENCES `entrenamientos` (`id`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
