-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 29-04-2020 a las 03:48:34
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
('Cardio en casa Coronavirus version', 35, 1, 29, 30, 'media', 0, '2020-04-22');

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
-- Estructura de tabla para la tabla `pedidos`
--

CREATE TABLE `pedidos` (
  `id` int(8) NOT NULL,
  `fecha` date NOT NULL DEFAULT current_timestamp(),
  `precio` float NOT NULL DEFAULT 0,
  `fecha_entrega` date DEFAULT NULL,
  `usuario` varchar(20) NOT NULL,
  `estado` varchar(12) NOT NULL DEFAULT 'SIN_TRAMITAR'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `id` int(8) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `precio` float NOT NULL,
  `tipo` varchar(8) NOT NULL,
  `precio_alquiler` float NOT NULL,
  `descripcion` varchar(300) NOT NULL,
  `imagen` varchar(200) NOT NULL,
  `estado` varchar(10) NOT NULL DEFAULT 'en_carro',
  `pedido` int(8) NOT NULL,
  `cantidad` int(3) NOT NULL DEFAULT 1,
  `usuario` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id`, `nombre`, `precio`, `tipo`, `precio_alquiler`, `descripcion`, `imagen`, `estado`, `pedido`, `cantidad`, `usuario`) VALUES
(1, 'Mancuernas Barbaria 17.5kg', 25.99, 'maquina', 8.59, 'Mancuernas Barbaria 17.5kg', 'http://localhost/cornersports/img/productos/mancuernas1.jpg', 'pagado', 12345, 1, 'admin');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos_disponibles`
--

CREATE TABLE `productos_disponibles` (
  `id` int(10) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `tipo` varchar(20) NOT NULL,
  `imagen` varchar(200) NOT NULL,
  `descripcion` varchar(300) NOT NULL,
  `precio` float NOT NULL,
  `precio_alquiler` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `productos_disponibles`
--

INSERT INTO `productos_disponibles` (`id`, `nombre`, `tipo`, `imagen`, `descripcion`, `precio`, `precio_alquiler`) VALUES
(5, 'Mancuernas Barbaria 17.5kg', 'maquina', 'http://localhost/cornersports/img/productos/mancuernas1.jpg', 'Mancuernas Barbaria 17.5kg', 25.99, 6.85),
(6, 'Eliptica Bodytone DEE15', 'maquina', 'http://localhost/cornersports/img/productos/eliptica1.jpg', 'Eliptica Bodytone DEE15', 258.99, 24.99),
(7, 'Guantes de boxeo Everlast M', 'deporte', 'http://localhost/cornersports/img/productos/guantes_boxeo1.jpg', 'Guantes de boxeo Everlast', 58.64, 15.65),
(8, 'Balón Fútbol Nike', 'deporte', 'http://localhost/cornersports/img/productos/pelota_futbol.jpg', 'Balón de fútbol Nike diseñado en color verde con detalles y logotipo en negro.', 15.99, 5.8),
(9, 'Bate de beisbol KIPSTA', 'deporte', 'http://localhost/cornersports/img/productos/bate.jpg', 'Bate de béisbol de aleación de aluminio marca KIPSTA modelo BA150 34 pulgadas', 22, 8.59),
(10, 'Fitness Uniform Jum', 'prendaMujer', 'http://localhost/cornersports/img/productos/prendaMujer.jpg', 'Fitness Uniform Jum Talla M 100% Licra Conjunto completo', 35.99, 12.8),
(11, 'Emporio Armani EA7', 'prendaHombre', 'http://localhost/cornersports/img/productos/prendaHombre.jpg', 'Emporio Armani EA7 chándal Poly Tricot júnior S. Conjunto de poliéster muy versátil.', 58.99, 12);

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
  `pedido_activo` int(8) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`username`, `password`, `nombre`, `apellidos`, `email`, `provincia`, `localidad`, `calle`, `codPostal`, `portal`, `perfil`, `entrenamiento_activo`, `pedido_activo`) VALUES
('admin', '$2y$10$MTwLq7RS.AAPoBeHx0tH7ufP406mN1aVe7GwJgG8xPnxS3aoJrjrK', 'admin', 'admin', 'adasd@', 'sadas', 'dasd', 'dsds', 'fsdsd', 'dasda', 'admin', 29, NULL),
('vicky', '$2y$10$IqkfN1PkF9cdhix7UJd2.Oz8yT3NRTTs/nutHxW3tF.a574cLpOjq', 'Viktoriia', 'Gnatiuk', 'adas#¡@adasa.com', 'adas', 'adasa', 'daasdad', 'dasda', 'dada', 'usuario', NULL, NULL);

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
-- Indices de la tabla `pedidos`
--
ALTER TABLE `pedidos`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `usuario` (`usuario`) USING BTREE;

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `pedido` (`pedido`),
  ADD UNIQUE KEY `usuario` (`usuario`);

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
  ADD UNIQUE KEY `entrenamiento_activo` (`entrenamiento_activo`) USING BTREE,
  ADD UNIQUE KEY `pedido_activo` (`pedido_activo`) USING BTREE;

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
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT de la tabla `entrenamientos_disponibles`
--
ALTER TABLE `entrenamientos_disponibles`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `pedidos`
--
ALTER TABLE `pedidos`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `productos_disponibles`
--
ALTER TABLE `productos_disponibles`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

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
-- Filtros para la tabla `pedidos`
--
ALTER TABLE `pedidos`
  ADD CONSTRAINT `pedidos_ibfk_1` FOREIGN KEY (`usuario`) REFERENCES `usuarios` (`username`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `usuarios_ibfk_1` FOREIGN KEY (`entrenamiento_activo`) REFERENCES `entrenamientos` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `usuarios_ibfk_2` FOREIGN KEY (`pedido_activo`) REFERENCES `pedidos` (`id`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
