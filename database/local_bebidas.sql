-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 28-09-2024 a las 04:28:52
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `local_bebidas`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE `clientes` (
  `id_cliente` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `telefono` varchar(15) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `direccion` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`id_cliente`, `nombre`, `telefono`, `email`, `direccion`) VALUES
(1, 'Carlos Pérez', '555123456', 'carlos.perez@example.com', 'Calle del Sol 123, Ciudad'),
(2, 'María González', '555987654', 'maria.gonzalez@example.com', 'Avenida de la Paz 456, Ciudad'),
(3, 'Luis Martínez', '555112233', 'luis.martinez@example.com', 'Calle Luna 789, Ciudad');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `compras`
--

CREATE TABLE `compras` (
  `id_compra` int(11) NOT NULL,
  `id_proveedor` int(11) DEFAULT NULL,
  `fecha_compra` date NOT NULL,
  `total` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `compras`
--

INSERT INTO `compras` (`id_compra`, `id_proveedor`, `fecha_compra`, `total`) VALUES
(1, 1, '2023-09-18', 500.00),
(2, 2, '2023-09-19', 1000.00),
(3, 3, '2023-09-20', 750.00);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_compras`
--

CREATE TABLE `detalle_compras` (
  `id_detalle_compra` int(11) NOT NULL,
  `id_compra` int(11) DEFAULT NULL,
  `id_producto` int(11) DEFAULT NULL,
  `cantidad` int(11) NOT NULL,
  `precio_unitario` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `detalle_compras`
--

INSERT INTO `detalle_compras` (`id_detalle_compra`, `id_compra`, `id_producto`, `cantidad`, `precio_unitario`) VALUES
(1, 1, 3, 200, 1.00),
(2, 2, 2, 50, 14.00),
(3, 3, 1, 100, 2.30);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_ventas`
--

CREATE TABLE `detalle_ventas` (
  `id_detalle_venta` int(11) NOT NULL,
  `id_venta` int(11) DEFAULT NULL,
  `id_producto` int(11) DEFAULT NULL,
  `cantidad` int(11) NOT NULL,
  `precio_unitario` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `detalle_ventas`
--

INSERT INTO `detalle_ventas` (`id_detalle_venta`, `id_venta`, `id_producto`, `cantidad`, `precio_unitario`) VALUES
(1, 1, 1, 5, 2.50),
(2, 1, 3, 10, 1.20),
(3, 2, 2, 3, 15.00),
(4, 3, 4, 10, 0.80);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empleados`
--

CREATE TABLE `empleados` (
  `id_empleado` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `puesto` varchar(50) DEFAULT NULL,
  `salario` decimal(10,2) DEFAULT NULL,
  `fecha_contratacion` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `empleados`
--

INSERT INTO `empleados` (`id_empleado`, `nombre`, `puesto`, `salario`, `fecha_contratacion`) VALUES
(1, 'Juan López', 'Cajero', 1200.00, '2023-01-15'),
(2, 'Ana Fernández', 'Gerente', 2500.00, '2022-05-20'),
(3, 'Pedro Sánchez', 'Mesero', 1000.00, '2023-03-01');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `id_producto` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `descripcion` text DEFAULT NULL,
  `precio` decimal(10,2) NOT NULL,
  `stock` int(11) NOT NULL,
  `id_proveedor` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id_producto`, `nombre`, `descripcion`, `precio`, `stock`, `id_proveedor`) VALUES
(1, 'Cerveza Artesanal', 'Cerveza local artesanal de alta calidad', 2.50, 100, 3),
(2, 'Vino Tinto Reserva', 'Vino tinto de alta gama', 15.00, 50, 2),
(3, 'Refresco de Cola', 'Refresco popular con sabor a cola', 1.20, 200, 1),
(4, 'Agua Mineral', 'Agua mineral natural sin gas', 0.80, 300, 1),
(5, 'Ron Añejo', 'Ron añejo con sabor suave y dulce', 12.50, 75, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proveedores`
--

CREATE TABLE `proveedores` (
  `id_proveedor` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `telefono` varchar(15) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `direccion` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `proveedores`
--

INSERT INTO `proveedores` (`id_proveedor`, `nombre`, `telefono`, `email`, `direccion`) VALUES
(1, 'Bebidas Nacionales S.A.', '123456789', 'contacto@bebidasnacionales.com', 'Calle Principal 123, Ciudad'),
(2, 'Distribuidora Internacional', '987654321', 'ventas@distribuidorainternacional.com', 'Avenida Central 456, Ciudad'),
(3, 'La Cervecería Local', '112233445', 'info@cervecerialocal.com', 'Calle Cerveza 789, Ciudad');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `username`, `password`) VALUES
(1, 'admin', '81dc9bdb52d04dc20036dbd8313ed055');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ventas`
--

CREATE TABLE `ventas` (
  `id_venta` int(11) NOT NULL,
  `id_cliente` int(11) DEFAULT NULL,
  `id_empleado` int(11) DEFAULT NULL,
  `fecha_venta` date NOT NULL,
  `total` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `ventas`
--

INSERT INTO `ventas` (`id_venta`, `id_cliente`, `id_empleado`, `fecha_venta`, `total`) VALUES
(1, 1, 1, '2023-09-20', 30.00),
(2, 2, 2, '2023-09-21', 45.50),
(3, 3, 3, '2023-09-22', 18.75),
(54, 1, 1, '2023-09-20', 30.00),
(55, 2, 2, '2023-09-21', 45.50),
(56, 3, 3, '2023-09-22', 18.75),
(57, 1, 1, '2023-09-23', 25.00),
(58, 2, 2, '2023-09-24', 60.00),
(59, 3, 3, '2023-09-25', 15.50),
(60, 1, 1, '2023-09-26', 32.00),
(61, 2, 2, '2023-09-27', 47.25),
(62, 3, 3, '2023-09-28', 22.00),
(63, 1, 1, '2023-09-29', 29.99),
(64, 2, 2, '2023-09-30', 55.50),
(65, 3, 3, '2023-10-01', 20.75),
(66, 1, 1, '2023-10-02', 35.00),
(67, 2, 2, '2023-10-03', 40.00),
(68, 3, 3, '2023-10-04', 19.50),
(69, 1, 1, '2023-10-05', 27.00),
(70, 2, 2, '2023-10-06', 42.25),
(71, 3, 3, '2023-10-07', 15.00),
(72, 1, 1, '2023-10-08', 30.50),
(73, 2, 2, '2023-10-09', 50.00),
(74, 3, 3, '2023-10-10', 17.00),
(75, 1, 1, '2023-10-11', 28.75),
(76, 2, 2, '2023-10-12', 21.00),
(77, 3, 3, '2023-10-13', 33.50),
(78, 1, 1, '2023-10-14', 46.75),
(79, 2, 2, '2023-10-15', 18.25),
(80, 3, 3, '2023-10-16', 26.00),
(81, 1, 1, '2023-10-17', 54.00),
(82, 2, 2, '2023-10-18', 23.50),
(83, 3, 3, '2023-10-19', 31.25),
(84, 1, 1, '2023-10-20', 49.99),
(85, 2, 2, '2023-10-21', 50.50),
(86, 3, 3, '2023-10-22', 24.00),
(87, 1, 1, '2023-10-23', 36.50),
(88, 2, 2, '2023-10-24', 41.75),
(89, 3, 3, '2023-10-25', 29.00),
(90, 1, 1, '2023-10-26', 35.50),
(91, 2, 2, '2023-10-27', 45.00),
(92, 3, 3, '2023-10-28', 20.00),
(93, 1, 1, '2023-10-29', 38.75),
(94, 2, 2, '2023-10-30', 55.25),
(95, 3, 3, '2023-10-31', 15.50),
(96, 1, 1, '2023-11-01', 34.00),
(97, 2, 2, '2023-11-02', 42.00),
(98, 3, 3, '2023-11-03', 27.50),
(99, 1, 1, '2023-11-04', 29.00),
(100, 2, 2, '2023-11-05', 45.00),
(101, 3, 3, '2023-11-06', 22.25),
(102, 1, 1, '2023-11-07', 30.50),
(103, 2, 2, '2023-11-08', 52.50),
(104, 3, 3, '2023-11-09', 18.00),
(105, 1, 1, '2023-09-20', 30.00),
(106, 2, 2, '2023-09-20', 45.50),
(107, 3, 3, '2023-09-20', 18.75),
(108, 1, 1, '2023-09-20', 25.00),
(109, 2, 2, '2023-09-20', 60.00),
(110, 3, 3, '2023-09-20', 15.50),
(111, 1, 1, '2023-09-21', 32.00),
(112, 2, 2, '2023-09-21', 47.25),
(113, 3, 3, '2023-09-21', 22.00),
(114, 1, 1, '2023-09-21', 29.99);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`id_cliente`);

--
-- Indices de la tabla `compras`
--
ALTER TABLE `compras`
  ADD PRIMARY KEY (`id_compra`),
  ADD KEY `id_proveedor` (`id_proveedor`);

--
-- Indices de la tabla `detalle_compras`
--
ALTER TABLE `detalle_compras`
  ADD PRIMARY KEY (`id_detalle_compra`),
  ADD KEY `id_compra` (`id_compra`),
  ADD KEY `id_producto` (`id_producto`);

--
-- Indices de la tabla `detalle_ventas`
--
ALTER TABLE `detalle_ventas`
  ADD PRIMARY KEY (`id_detalle_venta`),
  ADD KEY `id_venta` (`id_venta`),
  ADD KEY `id_producto` (`id_producto`);

--
-- Indices de la tabla `empleados`
--
ALTER TABLE `empleados`
  ADD PRIMARY KEY (`id_empleado`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`id_producto`),
  ADD KEY `id_proveedor` (`id_proveedor`);

--
-- Indices de la tabla `proveedores`
--
ALTER TABLE `proveedores`
  ADD PRIMARY KEY (`id_proveedor`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indices de la tabla `ventas`
--
ALTER TABLE `ventas`
  ADD PRIMARY KEY (`id_venta`),
  ADD KEY `id_cliente` (`id_cliente`),
  ADD KEY `id_empleado` (`id_empleado`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `clientes`
--
ALTER TABLE `clientes`
  MODIFY `id_cliente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `compras`
--
ALTER TABLE `compras`
  MODIFY `id_compra` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `detalle_compras`
--
ALTER TABLE `detalle_compras`
  MODIFY `id_detalle_compra` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `detalle_ventas`
--
ALTER TABLE `detalle_ventas`
  MODIFY `id_detalle_venta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `empleados`
--
ALTER TABLE `empleados`
  MODIFY `id_empleado` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `id_producto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `proveedores`
--
ALTER TABLE `proveedores`
  MODIFY `id_proveedor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `ventas`
--
ALTER TABLE `ventas`
  MODIFY `id_venta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=115;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `compras`
--
ALTER TABLE `compras`
  ADD CONSTRAINT `compras_ibfk_1` FOREIGN KEY (`id_proveedor`) REFERENCES `proveedores` (`id_proveedor`);

--
-- Filtros para la tabla `detalle_compras`
--
ALTER TABLE `detalle_compras`
  ADD CONSTRAINT `detalle_compras_ibfk_1` FOREIGN KEY (`id_compra`) REFERENCES `compras` (`id_compra`),
  ADD CONSTRAINT `detalle_compras_ibfk_2` FOREIGN KEY (`id_producto`) REFERENCES `productos` (`id_producto`);

--
-- Filtros para la tabla `detalle_ventas`
--
ALTER TABLE `detalle_ventas`
  ADD CONSTRAINT `detalle_ventas_ibfk_1` FOREIGN KEY (`id_venta`) REFERENCES `ventas` (`id_venta`),
  ADD CONSTRAINT `detalle_ventas_ibfk_2` FOREIGN KEY (`id_producto`) REFERENCES `productos` (`id_producto`);

--
-- Filtros para la tabla `productos`
--
ALTER TABLE `productos`
  ADD CONSTRAINT `productos_ibfk_1` FOREIGN KEY (`id_proveedor`) REFERENCES `proveedores` (`id_proveedor`);

--
-- Filtros para la tabla `ventas`
--
ALTER TABLE `ventas`
  ADD CONSTRAINT `ventas_ibfk_1` FOREIGN KEY (`id_cliente`) REFERENCES `clientes` (`id_cliente`),
  ADD CONSTRAINT `ventas_ibfk_2` FOREIGN KEY (`id_empleado`) REFERENCES `empleados` (`id_empleado`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
