-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 21-06-2021 a las 04:50:51
-- Versión del servidor: 10.4.17-MariaDB
-- Versión de PHP: 8.0.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `exiware_supermecado`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `db.cliente`
--

CREATE TABLE `db.cliente` (
  `id_cliente` int(11) NOT NULL,
  `documento_cliente` bigint(20) NOT NULL,
  `nombre_cliente` varchar(50) NOT NULL,
  `apellido_cliente` varchar(50) NOT NULL,
  `estado_cliente` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `db.detalle_pedido`
--

CREATE TABLE `db.detalle_pedido` (
  `id_detalle_pedido` int(11) NOT NULL,
  `fk_id_pedido` int(11) NOT NULL,
  `fk_id_producto` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `db.empleado`
--

CREATE TABLE `db.empleado` (
  `id_empleado` int(11) NOT NULL,
  `documento_empleado` bigint(20) NOT NULL,
  `nombre_empleado` varchar(50) NOT NULL,
  `apellido_empleado` varchar(50) NOT NULL,
  `estado_empleado` varchar(50) NOT NULL,
  `rol_empleado` varchar(20) NOT NULL,
  `correo_empleado` varchar(50) NOT NULL,
  `contrasena_empleado` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `db.empleado`
--

INSERT INTO `db.empleado` (`id_empleado`, `documento_empleado`, `nombre_empleado`, `apellido_empleado`, `estado_empleado`, `rol_empleado`, `correo_empleado`, `contrasena_empleado`) VALUES
(1, 1000464327, 'Nicolas', 'Ordonez', 'Activo', 'Admin', 'nico@correo.com', '123');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `db.pedido`
--

CREATE TABLE `db.pedido` (
  `id_pedido` int(11) NOT NULL,
  `consecutivo_pedido` varchar(20) NOT NULL,
  `fecha_pedido` varchar(20) NOT NULL,
  `hora_pedido` varchar(50) NOT NULL,
  `valor_total_pedido` bigint(20) NOT NULL,
  `fk_id_sucursal` int(11) NOT NULL,
  `fk_id_empleado` int(11) NOT NULL,
  `fk_id_cliente` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `db.producto`
--

CREATE TABLE `db.producto` (
  `id_producto` int(11) NOT NULL,
  `referencia_producto` bigint(20) NOT NULL,
  `nombre_producto` varchar(50) NOT NULL,
  `stock_producto` varchar(50) NOT NULL,
  `valor_unitario_producto` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `db.producto`
--

INSERT INTO `db.producto` (`id_producto`, `referencia_producto`, `nombre_producto`, `stock_producto`, `valor_unitario_producto`) VALUES
(1, 12345, 'super ricas', '6', 10000),
(2, 56789, 'bom bo bum', '54', 300);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `db.sucursal`
--

CREATE TABLE `db.sucursal` (
  `id_sucursal` int(11) NOT NULL,
  `nombre_sucursal` varchar(50) NOT NULL,
  `apellido_sucursal` varchar(50) NOT NULL,
  `direccion_sucursal` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `db.cliente`
--
ALTER TABLE `db.cliente`
  ADD PRIMARY KEY (`id_cliente`);

--
-- Indices de la tabla `db.detalle_pedido`
--
ALTER TABLE `db.detalle_pedido`
  ADD PRIMARY KEY (`id_detalle_pedido`),
  ADD KEY `fk_detalle_pedido_pedido` (`fk_id_pedido`),
  ADD KEY `fk_detalle_pedido_producto` (`fk_id_producto`);

--
-- Indices de la tabla `db.empleado`
--
ALTER TABLE `db.empleado`
  ADD PRIMARY KEY (`id_empleado`);

--
-- Indices de la tabla `db.pedido`
--
ALTER TABLE `db.pedido`
  ADD PRIMARY KEY (`id_pedido`),
  ADD KEY `fk_pedido_sucursal` (`fk_id_sucursal`),
  ADD KEY `fk_pedido_empleado` (`fk_id_empleado`),
  ADD KEY `fk_pedido_cliente` (`fk_id_cliente`);

--
-- Indices de la tabla `db.producto`
--
ALTER TABLE `db.producto`
  ADD PRIMARY KEY (`id_producto`);

--
-- Indices de la tabla `db.sucursal`
--
ALTER TABLE `db.sucursal`
  ADD PRIMARY KEY (`id_sucursal`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `db.cliente`
--
ALTER TABLE `db.cliente`
  MODIFY `id_cliente` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `db.detalle_pedido`
--
ALTER TABLE `db.detalle_pedido`
  MODIFY `id_detalle_pedido` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `db.empleado`
--
ALTER TABLE `db.empleado`
  MODIFY `id_empleado` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `db.pedido`
--
ALTER TABLE `db.pedido`
  MODIFY `id_pedido` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `db.producto`
--
ALTER TABLE `db.producto`
  MODIFY `id_producto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `db.sucursal`
--
ALTER TABLE `db.sucursal`
  MODIFY `id_sucursal` int(11) NOT NULL AUTO_INCREMENT;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `db.detalle_pedido`
--
ALTER TABLE `db.detalle_pedido`
  ADD CONSTRAINT `fk_detalle_pedido_pedido` FOREIGN KEY (`fk_id_pedido`) REFERENCES `db.pedido` (`id_pedido`),
  ADD CONSTRAINT `fk_detalle_pedido_producto` FOREIGN KEY (`fk_id_producto`) REFERENCES `db.producto` (`id_producto`);

--
-- Filtros para la tabla `db.pedido`
--
ALTER TABLE `db.pedido`
  ADD CONSTRAINT `fk_pedido_cliente` FOREIGN KEY (`fk_id_cliente`) REFERENCES `db.cliente` (`id_cliente`),
  ADD CONSTRAINT `fk_pedido_empleado` FOREIGN KEY (`fk_id_empleado`) REFERENCES `db.empleado` (`id_empleado`),
  ADD CONSTRAINT `fk_pedido_sucursal` FOREIGN KEY (`fk_id_sucursal`) REFERENCES `db.sucursal` (`id_sucursal`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
