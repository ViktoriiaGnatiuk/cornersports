-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 02-05-2020 a las 05:39:51
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

UPDATE `entrenadores` SET `id` = 1,`nombre` = 'Viktoriia',`escpecialidad` = 'Cardio',`sueldo` = '1500',`puntuacion` = 4 WHERE `entrenadores`.`id` = 1;

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

UPDATE `entrenamientos` SET `Nombre` = 'Cardio en casa Coronavirus version',`Precio` = 35,`Entrenador` = 1,`id` = 29,`dias` = 30,`dificultad` = 'media',`dia_actual` = 0,`fecha_comienzo` = '2020-04-22' WHERE `entrenamientos`.`id` = 29;

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

UPDATE `entrenamientos_disponibles` SET `id` = 1,`nombre` = 'Cardio en casa Coronavirus version',`dias` = 30,`precio` = 35,`entrenador` = 1,`dificultad` = 'media',`imagen` = 'entrenamientos/e1.jpg',`descripcion` = 'Entrena con nosotros desde tu casa ahora que no puedes salir.' WHERE `entrenamientos_disponibles`.`id` = 1;
UPDATE `entrenamientos_disponibles` SET `id` = 2,`nombre` = 'Definición mujer',`dias` = 30,`precio` = 45,`entrenador` = 1,`dificultad` = 'alta',`imagen` = 'entrenamientos/e2.jpg',`descripcion` = 'Define tus musculos con nosotros.' WHERE `entrenamientos_disponibles`.`id` = 2;

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

--
-- Volcado de datos para la tabla `pedidos`
--

UPDATE `pedidos` SET `id` = 101,`fecha` = '2020-05-01',`precio` = 0,`fecha_entrega` = NULL,`usuario` = 'admin',`estado` = 'PAGADO' WHERE `pedidos`.`id` = 101;
UPDATE `pedidos` SET `id` = 102,`fecha` = '2020-05-02',`precio` = 0,`fecha_entrega` = NULL,`usuario` = 'admin',`estado` = 'PAGADO' WHERE `pedidos`.`id` = 102;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `id` int(8) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `precio` float NOT NULL,
  `tipo` varchar(12) NOT NULL,
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

UPDATE `productos` SET `id` = 46,`nombre` = 'Guantes de boxeo Everlast M',`precio` = 58.64,`tipo` = 'deporte',`precio_alquiler` = 15.65,`descripcion` = 'Guantes de boxeo Everlast',`imagen` = 'http://localhost/cornersports/img/productos/guantes_boxeo1.jpg',`estado` = 'pagado',`pedido` = 101,`cantidad` = 4,`usuario` = 'admin' WHERE `productos`.`id` = 46;
UPDATE `productos` SET `id` = 47,`nombre` = 'Eliptica Bodytone DEE15',`precio` = 258.99,`tipo` = 'maquina',`precio_alquiler` = 24.99,`descripcion` = 'Eliptica Bodytone DEE15',`imagen` = 'http://localhost/cornersports/img/productos/eliptica1.jpg',`estado` = 'pagado',`pedido` = 101,`cantidad` = 2,`usuario` = 'admin' WHERE `productos`.`id` = 47;
UPDATE `productos` SET `id` = 48,`nombre` = 'Mancuernas Barbaria 17.5kg',`precio` = 25.99,`tipo` = 'maquina',`precio_alquiler` = 6.85,`descripcion` = 'Mancuernas Barbaria 17.5kg',`imagen` = 'http://localhost/cornersports/img/productos/mancuernas1.jpg',`estado` = 'pagado',`pedido` = 101,`cantidad` = 1,`usuario` = 'admin' WHERE `productos`.`id` = 48;
UPDATE `productos` SET `id` = 49,`nombre` = 'Balón Fútbol Nike',`precio` = 15.99,`tipo` = 'deporte',`precio_alquiler` = 5.8,`descripcion` = 'Balón de fútbol Nike diseñado en color verde con detalles y logotipo en negro.',`imagen` = 'http://localhost/cornersports/img/productos/pelota_futbol.jpg',`estado` = 'pagado',`pedido` = 101,`cantidad` = 1,`usuario` = 'admin' WHERE `productos`.`id` = 49;
UPDATE `productos` SET `id` = 51,`nombre` = 'Eliptica Bodytone DEE15',`precio` = 207.192,`tipo` = 'maquina',`precio_alquiler` = 24.99,`descripcion` = 'Eliptica Bodytone DEE15',`imagen` = 'http://localhost/cornersports/img/productos/eliptica1.jpg',`estado` = 'pagado',`pedido` = 102,`cantidad` = 1,`usuario` = 'admin' WHERE `productos`.`id` = 51;

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
  `precio_alquiler` float NOT NULL,
  `descuento` int(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `productos_disponibles`
--

UPDATE `productos_disponibles` SET `id` = 5,`nombre` = 'Mancuernas Barbaria 17.5kg',`tipo` = 'maquina',`imagen` = 'http://localhost/cornersports/img/productos/mancuernas1.jpg',`descripcion` = 'Mancuernas Barbaria 17.5kg',`precio` = 25.99,`precio_alquiler` = 6.85,`descuento` = NULL WHERE `productos_disponibles`.`id` = 5;
UPDATE `productos_disponibles` SET `id` = 6,`nombre` = 'Eliptica Bodytone DEE15',`tipo` = 'maquina',`imagen` = 'http://localhost/cornersports/img/productos/eliptica1.jpg',`descripcion` = 'Eliptica Bodytone DEE15',`precio` = 258.99,`precio_alquiler` = 24.99,`descuento` = 20 WHERE `productos_disponibles`.`id` = 6;
UPDATE `productos_disponibles` SET `id` = 7,`nombre` = 'Guantes de boxeo Everlast M',`tipo` = 'deporte',`imagen` = 'http://localhost/cornersports/img/productos/guantes_boxeo1.jpg',`descripcion` = 'Guantes de boxeo Everlast',`precio` = 58.64,`precio_alquiler` = 15.65,`descuento` = NULL WHERE `productos_disponibles`.`id` = 7;
UPDATE `productos_disponibles` SET `id` = 8,`nombre` = 'Balón Fútbol Nike',`tipo` = 'deporte',`imagen` = 'http://localhost/cornersports/img/productos/pelota_futbol.jpg',`descripcion` = 'Balón de fútbol Nike diseñado en color verde con detalles y logotipo en negro.',`precio` = 15.99,`precio_alquiler` = 5.8,`descuento` = 15 WHERE `productos_disponibles`.`id` = 8;
UPDATE `productos_disponibles` SET `id` = 9,`nombre` = 'Bate de beisbol KIPSTA',`tipo` = 'deporte',`imagen` = 'http://localhost/cornersports/img/productos/bate.jpg',`descripcion` = 'Bate de béisbol de aleación de aluminio marca KIPSTA modelo BA150 34 pulgadas',`precio` = 22,`precio_alquiler` = 8.59,`descuento` = NULL WHERE `productos_disponibles`.`id` = 9;
UPDATE `productos_disponibles` SET `id` = 10,`nombre` = 'Fitness Uniform Jum',`tipo` = 'prendaMujer',`imagen` = 'http://localhost/cornersports/img/productos/prendaMujer.jpg',`descripcion` = 'Fitness Uniform Jum Talla M 100% Licra Conjunto completo',`precio` = 35.99,`precio_alquiler` = 12.8,`descuento` = 22 WHERE `productos_disponibles`.`id` = 10;
UPDATE `productos_disponibles` SET `id` = 11,`nombre` = 'Emporio Armani EA7',`tipo` = 'prendaHombre',`imagen` = 'http://localhost/cornersports/img/productos/prendaHombre.jpg',`descripcion` = 'Emporio Armani EA7 chándal Poly Tricot júnior S. Conjunto de poliéster muy versátil.',`precio` = 58.99,`precio_alquiler` = 12,`descuento` = NULL WHERE `productos_disponibles`.`id` = 11;
UPDATE `productos_disponibles` SET `id` = 12,`nombre` = 'Nike Revolution 38',`tipo` = 'prendaMujer',`imagen` = 'http://localhost/cornersports/img/productos/zapatillas.jpg',`descripcion` = 'Disfruta de tus salidas de running o footing con las zapatillas para mujer Nike Revolution 5 talla 38.',`precio` = 42.49,`precio_alquiler` = 8,`descuento` = 12 WHERE `productos_disponibles`.`id` = 12;

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

UPDATE `usuarios` SET `username` = 'admin',`password` = '$2y$10$k/uand3zawwsfFGTRFI7r./N8kejaRznrbu5KntpxroaIZ55J6Uli',`nombre` = 'Administrador',`apellidos` = 'Cornersports',`email` = 'adasd@',`provincia` = 'sadas',`localidad` = 'dasd',`calle` = 'dsds',`codPostal` = 'fsdsd',`portal` = 'dasda',`perfil` = 'admin',`entrenamiento_activo` = 29,`pedido_activo` = NULL WHERE `usuarios`.`username` = 'admin';
UPDATE `usuarios` SET `username` = 'vicky',`password` = '$2y$10$IqkfN1PkF9cdhix7UJd2.Oz8yT3NRTTs/nutHxW3tF.a574cLpOjq',`nombre` = 'Viktoriia',`apellidos` = 'Gnatiuk',`email` = 'adas#¡@adasa.com',`provincia` = 'adas',`localidad` = 'adasa',`calle` = 'daasdad',`codPostal` = 'dasda',`portal` = 'dada',`perfil` = 'usuario',`entrenamiento_activo` = NULL,`pedido_activo` = NULL WHERE `usuarios`.`username` = 'vicky';

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
  ADD KEY `usuario` (`usuario`) USING BTREE;

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `usuario` (`usuario`) USING BTREE,
  ADD KEY `pedido` (`pedido`) USING BTREE;

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
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=103;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT de la tabla `productos_disponibles`
--
ALTER TABLE `productos_disponibles`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

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
