-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 01-11-2017 a las 10:54:32
-- Versión del servidor: 10.1.28-MariaDB
-- Versión de PHP: 7.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `proyectou4`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto`
--

CREATE TABLE `producto` (
  `id` mediumint(9) NOT NULL,
  `clave` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nombre` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `descripcion` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `precio` decimal(10,2) DEFAULT NULL,
  `unidades_stock` int(11) DEFAULT NULL,
  `deleted` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `producto`
--

INSERT INTO `producto` (`id`, `clave`, `nombre`, `descripcion`, `precio`, `unidades_stock`, `deleted`) VALUES
(1, 'm02', 'Coca cola', 'Coke company', '300.40', 100, 0),
(2, 'm03', 'Agua Ciel', 'Agua purificada', '15.50', 100, 1),
(3, 'kakashi1', 'Tenis', '30', '30.00', 30, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id` mediumint(9) NOT NULL,
  `user` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nombre` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `apellido_paterno` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `apellido_materno` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fecha_nac` date DEFAULT NULL,
  `sexo` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `telefono` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `privilegios` int(11) DEFAULT NULL,
  `active` int(11) DEFAULT NULL,
  `deleted` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id`, `user`, `nombre`, `apellido_paterno`, `apellido_materno`, `fecha_nac`, `sexo`, `telefono`, `email`, `password`, `privilegios`, `active`, `deleted`) VALUES
(1, 'hitler', 'jose', 'antonio', 'molina', '2017-10-10', 'hombre', '39393', 'iewuweiru', 'adolf', 1, 0, 1),
(2, 'yuri', 'Yuridia', 'Montelongo', 'Padilla', '0000-00-00', 'Mujer', '7836736', 'yuri@hotmail.com', 'yuri', 0, 0, 1),
(3, 'mariana', 'Mariana', 'Hinojosa', 'Tijerina', '2017-10-17', 'Mujer', '834784', 'iiuweiwui', 'contramariana', 1, 0, 0),
(4, 'fher', 'Fher', 'Torres', 'Paz', '2017-10-31', 'Hombre', '2342', '3242324', 'torres', 0, 0, 1),
(5, 'miguel', 'Miguel', 'hdz', 'rdz', '2017-10-11', 'Hombre', '83483728', 'emailMiguel', 'miguel', 1, 0, 0),
(6, 'lucesita', 'Luz', 'Gonzalez', 'Torres', '2017-10-28', 'Mujer', '31002321', 'luz@hotmail.com', 'luz', 0, 0, 0),
(7, 'mario', 'Mario Humberto', 'Rodriguez', 'Chavez', '2017-10-29', 'Hombre', '3129392', 'mario@systemas.com', 'mario', 1, 0, 0),
(8, 'm', 'Mariana', 'hino', 'tihe', '2017-10-17', 'Mujer', '5454545', 'jhfgjhhj', 'm', 1, 0, 1),
(9, 'kakashi1', 'Miguel', 'Hernandez', 'Rodriguez', '2017-10-12', 'Hombre', '326472678', 'miguel@hotmail.com', 'kakashi1', 1, 0, 0),
(10, 'adolf', 'Jose Antonio', 'Molina', 'De la Fuente', '2017-11-30', 'Hombre', '31231', 'qwequwe', 'hitler', 0, 0, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `venta`
--

CREATE TABLE `venta` (
  `id` mediumint(9) NOT NULL,
  `clave` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fecha` date DEFAULT NULL,
  `total` decimal(10,0) DEFAULT NULL,
  `pago_efectivo` decimal(10,0) DEFAULT NULL,
  `pago_tarjeta` decimal(10,0) DEFAULT NULL,
  `clave_usuario` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `venta`
--

INSERT INTO `venta` (`id`, `clave`, `fecha`, `total`, `pago_efectivo`, `pago_tarjeta`, `clave_usuario`, `deleted`) VALUES
(1, '342', '2017-10-30', '32', '32', '0', 'hitler', 0),
(2, '2', '2017-10-30', '300', '32', '300', 'hitler', 0),
(3, '2017-11-01', '2017-11-01', '500', '300', '200', 'adolf', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `venta_producto`
--

CREATE TABLE `venta_producto` (
  `id` mediumint(9) NOT NULL,
  `id_venta` mediumint(9) NOT NULL,
  `clave_venta` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `clave_producto` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cantidad_producto` mediumint(9) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `producto`
--
ALTER TABLE `producto`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `clave` (`clave`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `user` (`user`);

--
-- Indices de la tabla `venta`
--
ALTER TABLE `venta`
  ADD PRIMARY KEY (`id`,`clave`),
  ADD KEY `clave_usuario` (`clave_usuario`);

--
-- Indices de la tabla `venta_producto`
--
ALTER TABLE `venta_producto`
  ADD PRIMARY KEY (`id`,`id_venta`,`clave_venta`,`clave_producto`),
  ADD KEY `id_venta` (`id_venta`,`clave_venta`),
  ADD KEY `clave_producto` (`clave_producto`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `producto`
--
ALTER TABLE `producto`
  MODIFY `id` mediumint(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` mediumint(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `venta`
--
ALTER TABLE `venta`
  MODIFY `id` mediumint(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `venta_producto`
--
ALTER TABLE `venta_producto`
  MODIFY `id` mediumint(9) NOT NULL AUTO_INCREMENT;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `venta`
--
ALTER TABLE `venta`
  ADD CONSTRAINT `venta_ibfk_1` FOREIGN KEY (`clave_usuario`) REFERENCES `usuario` (`user`);

--
-- Filtros para la tabla `venta_producto`
--
ALTER TABLE `venta_producto`
  ADD CONSTRAINT `venta_producto_ibfk_1` FOREIGN KEY (`id_venta`,`clave_venta`) REFERENCES `venta` (`id`, `clave`),
  ADD CONSTRAINT `venta_producto_ibfk_2` FOREIGN KEY (`clave_producto`) REFERENCES `producto` (`clave`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
