-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 23-04-2020 a las 12:13:51
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
-- Estructura de tabla para la tabla `entrenadores`
--

CREATE TABLE `entrenadores` (
  `id` int(10) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `escpecialidad` varchar(20) NOT NULL,
  `sueldo` decimal(10,0) NOT NULL,
  `puntuacion` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `entrenadores`
--

INSERT INTO `entrenadores` (`id`, `nombre`, `escpecialidad`, `sueldo`, `puntuacion`) VALUES
(1, 'Viktoriia', 'Cardio', '1500', 4);

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

--
-- Volcado de datos para la tabla `entrenamientos`
--

INSERT INTO `entrenamientos` (`Nombre`, `Precio`, `Entrenador`, `id`, `dias`, `dificultad`, `dia_actual`, `fecha_comienzo`) VALUES
('Cardio en casa Coronavirus version', 35, 1, 19, 30, 'media', 0, '2020-04-03');

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
  `dificultad` varchar(10) NOT NULL,
  `imagen` varchar(50) NOT NULL,
  `descripcion` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `entrenamientos_disponibles`
--

INSERT INTO `entrenamientos_disponibles` (`id`, `nombre`, `dias`, `precio`, `entrenador`, `dificultad`, `imagen`, `descripcion`) VALUES
(1, 'Cardio en casa Coronavirus version', 30, 35, 1, 'media', 'entrenamientos/e1.jpg', 'Entrena con nosotros desde tu casa ahora que no puedes salir.'),
(2, 'Definición mujer', 30, 45, 1, 'alta', 'entrenamientos/e2.jpg', 'Define tus musculos con nosotros.');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos_disponibles`
--

CREATE TABLE `productos_disponibles` (
  `id` int(10) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `tipo` varchar(10) NOT NULL,
  `imagen` varchar(50) NOT NULL,
  `descripcion` varchar(300) NOT NULL,
  `precio` float NOT NULL,
  `precio_alquiler` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `productos_disponibles`
--

INSERT INTO `productos_disponibles` (`id`, `nombre`, `tipo`, `imagen`, `descripcion`, `precio`, `precio_alquiler`) VALUES
(1, 'Máquina musculación', 'maquina', 'productos/maquina_musculacion.png', 'Máquina musculación', 25.95, 6.95),
(5, 'Mancuernas Barbaria 17.5kg', 'maquina', 'productos/mancuernas1.jpg', 'Mancuernas Barbaria 17.5kg', 25.99, 6.85),
(6, 'Eliptica Bodytone DEE15', 'maquina', 'productos/eliptica1.jpg', 'Eliptica Bodytone DEE15', 258.99, 24.99),
(7, 'Guantes de boxeo Everlast M', 'deportes', 'productos/guantes_boxeo1.jpg', 'Guantes de boxeo Everlast', 58.64, 15.65);

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
  `entrenamiento_activo` int(10) DEFAULT NULL,
  `maquina_activa` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`username`, `password`, `nombre`, `apellidos`, `email`, `provincia`, `localidad`, `calle`, `codPostal`, `portal`, `perfil`, `entrenamiento_activo`, `maquina_activa`) VALUES
('admin', '$2y$10$MTwLq7RS.AAPoBeHx0tH7ufP406mN1aVe7GwJgG8xPnxS3aoJrjrK', 'admin', 'admin', 'adasd@', 'sadas', 'dasd', 'dsds', '', 'dasda', 'admin', 19, 1),
('kotito', '$2y$10$3sO.UL8euG9Qj7oShrstNOlC105UIkkZd8iXyKpGsKoPdAxzXYRNa', 'kotito', 'bg', 'kotito@gato.es', 'madrid', 'alcala', 'gatito 25', '20554', '5', 'usuario', NULL, 0),
('kotito2', '$2y$10$CAsAgCeOZl9rHQQ/43n8M.Qwwi8AMMmb28xQ6wFBdDTX6PCx6qOL.', 'kotito', 'bg', 'kotito@gato.es', 'madrid', 'alcala', 'gatito 25', '20554', '5', 'usuario', NULL, 0),
('vicky', '$2y$10$IqkfN1PkF9cdhix7UJd2.Oz8yT3NRTTs/nutHxW3tF.a574cLpOjq', 'Viktoriia', 'Gnatiuk', 'adas#¡@adasa.com', 'adas', 'adasa', 'daasdad', 'dasda', 'dada', 'usuario', NULL, 0);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `entrenadores`
--
ALTER TABLE `entrenadores`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `entrenamientos`
--
ALTER TABLE `entrenamientos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `Entrenador` (`Entrenador`) USING BTREE;

--
-- Indices de la tabla `entrenamientos_disponibles`
--
ALTER TABLE `entrenamientos_disponibles`
  ADD PRIMARY KEY (`id`),
  ADD KEY `entrenador` (`entrenador`) USING BTREE;

--
-- Indices de la tabla `productos_disponibles`
--
ALTER TABLE `productos_disponibles`
  ADD PRIMARY KEY (`id`);

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
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `entrenamientos`
--
ALTER TABLE `entrenamientos`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT de la tabla `entrenamientos_disponibles`
--
ALTER TABLE `entrenamientos_disponibles`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `productos_disponibles`
--
ALTER TABLE `productos_disponibles`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Restricciones para tablas volcadas
--

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
