-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 10-05-2020 a las 23:07:24
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
CREATE DATABASE IF NOT EXISTS `cornersports` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `cornersports`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `entrenadores`
--

CREATE TABLE `entrenadores` (
  `id` int(10) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `especialidad` varchar(20) NOT NULL,
  `sueldo` decimal(10,0) NOT NULL,
  `puntuacion` int(2) NOT NULL,
  `imagen` varchar(200) NOT NULL,
  `descripcion` varchar(500) NOT NULL,
  `imagen_grande` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `entrenadores`
--

INSERT INTO `entrenadores` (`id`, `nombre`, `especialidad`, `sueldo`, `puntuacion`, `imagen`, `descripcion`, `imagen_grande`) VALUES
(1, 'Jame Wilson', 'MUSCULACIÓN', '3400', 5, 'http://localhost/cornersports/img/entrenadores/wilson.jpg', 'James \"The Beast\" Wilson, uno de los kickboxer más conocidos mundialmente en la categoría de peso pesado.\r\nEn su explosiva clase en CYBEROBICS® desafiará con todas sus fuerzas a todo el que se atreva a enfrentarse él.', 'http://localhost/cornersports/img/entrenadores/wilson2.jpg'),
(2, 'Graham Labass', 'CARDIO', '2400', 4, 'http://localhost/cornersports/img/entrenadores/labass.jpg', 'Te hará sudar, te hará llorar - pero al final te llevará más lejos de lo que jamás habrías pensado. Súbete a la bici y deja que el \"Speed Star\" te enseñe el verdadero significado del cardio.', 'http://localhost/cornersports/img/entrenadores/labass2.jpg'),
(3, 'Trice Johnson', 'DEFINICIÓN', '1900', 3, 'http://localhost/cornersports/img/entrenadores/johnson.jpg', 'Trice lleva muchos años encima como entrenadora personal motivando a celebrities y a miles de fans a dar lo mejor de ellos mismos. Entrenate con ella para esculpir tu cuerpo.', 'http://localhost/cornersports/img/entrenadores/johnson2.jpg'),
(4, 'Briohny Smyth', 'YOGA', '2600', 4, 'http://localhost/cornersports/img/entrenadores/smyth.jpg', 'Como “Artist of Yoga” Briohny ha inspirado a millones de personas con sus fascinantes vídeos de fitness y espectaculares entrenamientos. Encuentra tú también tu equilibrio interior con esta estrella internacional del yoga.', 'http://localhost/cornersports/img/entrenadores/smyth2.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `entrenamientos`
--

CREATE TABLE `entrenamientos` (
  `nombre` varchar(50) CHARACTER SET utf8 NOT NULL,
  `precio` float NOT NULL,
  `entrenador` int(10) NOT NULL,
  `id` int(10) NOT NULL,
  `dias` int(11) NOT NULL,
  `dificultad` varchar(10) CHARACTER SET utf8 NOT NULL,
  `dia_actual` int(2) NOT NULL,
  `fecha_comienzo` date NOT NULL DEFAULT current_timestamp(),
  `imagen` varchar(200) NOT NULL,
  `descripcion` varchar(500) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `entrenamientos`
--

INSERT INTO `entrenamientos` (`nombre`, `precio`, `entrenador`, `id`, `dias`, `dificultad`, `dia_actual`, `fecha_comienzo`, `imagen`, `descripcion`) VALUES
('BOOTCAMP', 78, 1, 32, 28, 'ALTA', 0, '2020-05-03', 'http://localhost/cornersports/img/entrenamientos/musculacion.jpg', 'Este ejecutor te llevará hasta tu límite absoluto con intensos ejercicios de autocargas como los Prison Squads y Spiderman Push Ups.');

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
  `imagen` varchar(200) NOT NULL,
  `descripcion` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `entrenamientos_disponibles`
--

INSERT INTO `entrenamientos_disponibles` (`id`, `nombre`, `dias`, `precio`, `entrenador`, `dificultad`, `imagen`, `descripcion`) VALUES
(2, 'Definición mujer', 30, 45, 3, 'ALTA', 'http://localhost/cornersports/img/entrenamientos/e2.jpg', 'Define tus musculos con nosotros.'),
(4, 'YOGA SPIRITS', 28, 54, 4, 'BAJA', 'http://localhost/cornersports/img/entrenamientos/yoga.jpg', 'Comienza tu entrenamiento el Saludo al Sol con 12 energéticas asanas que activarán tu cuerpo y tu espíritu. Junto a Briohny pondrás tu respiración y movimiento en armonía.'),
(5, 'BOOTCAMP', 28, 78, 1, 'ALTA', 'http://localhost/cornersports/img/entrenamientos/musculacion.jpg', 'Este ejecutor te llevará hasta tu límite absoluto con intensos ejercicios de autocargas como los Prison Squads y Spiderman Push Ups.'),
(10, 'Cardio en casa Coronavirus version', 30, 35, 2, 'MEDIA', 'http://localhost/cornersports/img/entrenamientos/e1.jpg', 'Entrena con nosotros desde tu casa ahora que no puedes salir.');

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
  `tipo` varchar(12) NOT NULL,
  `precio_alquiler` float NOT NULL,
  `descripcion` varchar(300) NOT NULL,
  `imagen` varchar(200) NOT NULL,
  `estado` varchar(10) NOT NULL DEFAULT 'en_carro',
  `pedido` int(8) NOT NULL,
  `cantidad` int(3) NOT NULL DEFAULT 1,
  `usuario` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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

INSERT INTO `productos_disponibles` (`id`, `nombre`, `tipo`, `imagen`, `descripcion`, `precio`, `precio_alquiler`, `descuento`) VALUES
(5, 'Mancuernas Barbaria 17.5kg', 'maquina', 'http://localhost/cornersports/img/productos/mancuernas1.jpg', 'Mancuernas Barbaria 17.5kg', 25.99, 6.85, NULL),
(6, 'Eliptica Bodytone DEE15', 'maquina', 'http://localhost/cornersports/img/productos/eliptica1.jpg', 'Eliptica Bodytone DEE15', 258.99, 24.99, NULL),
(7, 'Guantes de boxeo Everlast M', 'deporte', 'http://localhost/cornersports/img/productos/guantes_boxeo1.jpg', 'Guantes de boxeo Everlast', 58.64, 15.65, NULL),
(8, 'Balón Fútbol Nike', 'deporte', 'http://localhost/cornersports/img/productos/pelota_futbol.jpg', 'Balón de fútbol Nike diseñado en color verde con detalles y logotipo en negro.', 15.99, 5.8, 15),
(9, 'Bate de beisbol KIPSTA', 'deporte', 'http://localhost/cornersports/img/productos/bate.jpg', 'Bate de béisbol de aleación de aluminio marca KIPSTA modelo BA150 34 pulgadas', 22, 8.59, NULL),
(10, 'Fitness Uniform Jum', 'prendaMujer', 'http://localhost/cornersports/img/productos/prendaMujer.jpg', 'Fitness Uniform Jum Talla M 100% Licra Conjunto completo', 35.99, 12.8, 22),
(11, 'Emporio Armani EA7', 'prendaHombre', 'http://localhost/cornersports/img/productos/prendaHombre.jpg', 'Emporio Armani EA7 chándal Poly Tricot júnior S. Conjunto de poliéster muy versátil.', 58.99, 12, NULL),
(12, 'Nike Revolution 38', 'prendaMujer', 'http://localhost/cornersports/img/productos/zapatillas.jpg', 'Disfruta de tus salidas de running o footing con las zapatillas para mujer Nike Revolution 5 talla 38.', 42.49, 8, 12),
(13, 'SONGMICS Mancuernas ', 'maquina', 'http://localhost/cornersports/img/productos/mancuernas2.jpg', 'SONGMICS Juego de Mancuernas Ajustables de Hierro Fundido, para Hombres y Mujeres.\r\n20 kg ( 2 x 10 kg ): 4 x 2,5 kg, 4 x 1,25 kg, 2 x barras, 4 x cierres de rosca.', 38.99, 5, 12);

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
('admin', '$2y$10$4RvwoK9/HEF46EbKzuOTOOlrAI/WOW3wbYlNiF9zSK00VK7wXpDQe', 'Administrador', 'Cornersports', 'admin@ucm.es', 'Madrid', 'Madrid', 'Profesor', '28805', '3', 'admin', 32, NULL);

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
  ADD KEY `Entrenador` (`entrenador`) USING BTREE;

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
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `entrenamientos`
--
ALTER TABLE `entrenamientos`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT de la tabla `entrenamientos_disponibles`
--
ALTER TABLE `entrenamientos_disponibles`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `pedidos`
--
ALTER TABLE `pedidos`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=140;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=79;

--
-- AUTO_INCREMENT de la tabla `productos_disponibles`
--
ALTER TABLE `productos_disponibles`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

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
