-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 30-03-2022 a las 22:05:33
-- Versión del servidor: 10.4.11-MariaDB
-- Versión de PHP: 7.2.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `agendadigital`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `citas`
--

CREATE TABLE `citas` (
  `id_cita` int(11) NOT NULL,
  `id_cliente` int(11) DEFAULT NULL,
  `id_usuario` int(11) DEFAULT NULL,
  `fecha_inicio` date NOT NULL DEFAULT current_timestamp(),
  `fecha_final` date NOT NULL DEFAULT current_timestamp(),
  `comentarios` text DEFAULT NULL,
  `tipo_contacto` varchar(100) DEFAULT NULL,
  `color` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `citas`
--

INSERT INTO `citas` (`id_cita`, `id_cliente`, `id_usuario`, `fecha_inicio`, `fecha_final`, `comentarios`, `tipo_contacto`, `color`) VALUES
(34, 24, 1, '2022-03-09', '2022-03-11', 'Detallar Compra', 'Iki', '#8d2065'),
(35, 26, 1, '2022-03-27', '2022-02-24', 'Dudas compra', 'Telefono', '#931b1b'),
(36, 27, 1, '2022-02-24', '2022-02-25', 'Acordar fecha compra', 'Video llamada', '#931b1b'),
(50, 21, 9, '2022-03-29', '2022-03-29', 'Prueba2', 'Hhh', '#198058'),
(51, 21, 1, '2022-03-23', '2022-03-30', 'AAA', 'Llamada', '#000000');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE `clientes` (
  `id_cliente` int(11) NOT NULL,
  `nombre` varchar(200) DEFAULT NULL,
  `apellidos` varchar(200) DEFAULT NULL,
  `telefono` varchar(100) NOT NULL,
  `correo` varchar(150) DEFAULT NULL,
  `calle` varchar(200) NOT NULL,
  `numero_casa` varchar(15) NOT NULL,
  `colonia` varchar(200) NOT NULL,
  `estado` varchar(200) NOT NULL,
  `imagen` varchar(250) DEFAULT NULL,
  `fecha_registro` timestamp NOT NULL DEFAULT current_timestamp(),
  `estatus` tinyint(3) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`id_cliente`, `nombre`, `apellidos`, `telefono`, `correo`, `calle`, `numero_casa`, `colonia`, `estado`, `imagen`, `fecha_registro`, `estatus`) VALUES
(21, 'Ramona', ' Alameda', '(222)-544-6467', 'ramona@gmail.com', '8 poniente', '1312', 'Amalucan', 'Puebla', '69909990025043.jpeg', '2022-02-15 17:08:24', 1),
(22, 'Sofía', 'Cedillo', '(222)-785-8375', 'sofi@gmail.com', '3 sur', '324', 'Gonzalo', 'Puebla', '69909172113895.jpeg', '2022-02-15 17:09:58', 1),
(23, 'Lucía', 'Gutiérrez', '(222)-676-5836', 'luci@gmail.com', '15 de septiembre', '76', 'Centro', 'Puebla', '69909923099995.jpeg', '2022-02-15 17:11:17', 1),
(24, 'María', 'Jiménez ', '(221)-356-5666', 'maria@gmail.com', '9', 'sur', 'El salvador', 'Puebla', '174952285004.png', '2022-02-15 17:14:49', 1),
(25, 'Paula', 'Yáñez', '(221)-758-3758', 'pau@gmail.com', '7 oriente', '831', 'El salvador', 'Puebla', '14308877157927.jpeg', '2022-02-15 17:15:51', 1),
(26, 'Daniela', 'Ruiz', '(222)-683-6483', 'dani@gmail.com', 'Margaritas', '512', 'Chachapa', 'Puebla', '17495837898016.png', '2022-02-15 17:17:11', 1),
(27, 'Valeria', 'Téllez', '(221)-643-6882', 'vale@gmail.com', '4 norte', '1390', 'Centro', 'Puebla', '1430888520050.jpeg', '2022-02-15 17:18:34', 1),
(28, 'Claudia', 'Muñoz', '(222)-256-5778', 'caludi@gmail.com', 'Barranquilla', '812', 'El salvador', 'Puebla', '1430850096989.jpeg', '2022-02-15 17:19:48', 1),
(29, 'qwe', 'qwe', '(121)-212-1212', 'qwe@gmail.com', 'qwe', '123', 'qwe', 'qwe', '31673180521011.jpg', '2022-02-15 17:44:18', 0),
(30, 'Ana Sofia', 'Salazar', '1234567890', 'Ana@gmail.com', 'Los Pinos', '7', 'Los Vinos', 'Puebla', 'add.png', '2022-03-02 03:45:12', 0),
(31, 'Montserrat1', 'Hsh', '8998989', 'Prueba@gmail.com', 'Los Pinos', '23', 'Puebla', 'Puebla', 'add.png', '2022-03-21 20:33:21', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `id_producto` int(11) NOT NULL,
  `nombre` varchar(200) NOT NULL,
  `precio` varchar(250) NOT NULL,
  `descripcion` text DEFAULT NULL,
  `estatus` tinyint(3) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id_producto`, `nombre`, `precio`, `descripcion`, `estatus`) VALUES
(5, 'Motosierra', '1341', 'Motosierra Gasolina.', 1),
(6, 'Esmeriladora', '648', 'Mini Esmeriladora', 1),
(7, 'Soldadora', '1410', 'Soldadora Inversor', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id_usuario` int(11) NOT NULL,
  `nombre` varchar(200) NOT NULL,
  `apellidos` varchar(200) NOT NULL,
  `correo` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `tipo` int(11) NOT NULL COMMENT '1. Administrador, 2. Asistente',
  `estatus` tinyint(3) NOT NULL DEFAULT 1,
  `fecha_registro` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id_usuario`, `nombre`, `apellidos`, `correo`, `password`, `tipo`, `estatus`, `fecha_registro`) VALUES
(1, 'Administrador', '1', 'admin1@gmail.com', 'f865b53623b121fd34ee5426c792e5c33af8c227', 1, 1, '2022-01-24 11:12:34'),
(2, 'Administrador', '2', 'admin2@gmail.com', 'f865b53623b121fd34ee5426c792e5c33af8c227', 3, 0, '2022-01-18 11:12:31'),
(8, 'qwe', 'qwe', 'qwe@gmail.com', '056eafe7cf52220de2df36845b8ed170c67e23e3', 3, 0, '2022-02-15 17:43:48'),
(9, 'Montse', 'Tlachi', 'Montse@gmail.com', 'montse1234', 2, 1, '2022-02-17 12:32:39'),
(10, 'Universidad', 'De Puebla', 'Hola@gmail.com', '777', 2, 0, '2022-03-01 21:44:36'),
(11, 'Maria Maria', 'Sanchez', 'Mar@gmail.com', '7765', 2, 0, '2022-03-16 16:59:15'),
(12, 'Fernando', 'Guzman', 'Fernando@gmail.com', '123', 1, 0, '2022-03-28 13:55:57');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ventas`
--

CREATE TABLE `ventas` (
  `id_venta` int(11) NOT NULL,
  `id_cliente` int(11) NOT NULL,
  `concepto` varchar(500) DEFAULT NULL,
  `descripcion` text DEFAULT NULL,
  `subtotal` varchar(250) NOT NULL,
  `iva` varchar(250) NOT NULL,
  `total` varchar(250) NOT NULL,
  `fecha_registro` timestamp NOT NULL DEFAULT current_timestamp(),
  `estatus` tinyint(3) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `ventas`
--

INSERT INTO `ventas` (`id_venta`, `id_cliente`, `concepto`, `descripcion`, `subtotal`, `iva`, `total`, `fecha_registro`, `estatus`) VALUES
(1, 27, 'Venta herramientas soldador', 'qwe', '6867.00', '1098.72', '7965.72', '2022-02-16 19:46:29', 1),
(4, 21, 'Web', 'Prueba', '6789', '1086', '7875', '2022-03-28 20:20:46', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ventas_productos`
--

CREATE TABLE `ventas_productos` (
  `id_ventapro` int(11) NOT NULL,
  `id_producto` int(11) NOT NULL,
  `id_venta` int(11) DEFAULT NULL,
  `cantidad` int(11) NOT NULL,
  `costo_unitario` varchar(259) NOT NULL,
  `total` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `ventas_productos`
--

INSERT INTO `ventas_productos` (`id_ventapro`, `id_producto`, `id_venta`, `cantidad`, `costo_unitario`, `total`) VALUES
(1, 5, 1, 1, '1341', '1341'),
(2, 6, 1, 2, '648', '1296');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `citas`
--
ALTER TABLE `citas`
  ADD PRIMARY KEY (`id_cita`);

--
-- Indices de la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`id_cliente`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`id_producto`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_usuario`);

--
-- Indices de la tabla `ventas`
--
ALTER TABLE `ventas`
  ADD PRIMARY KEY (`id_venta`);

--
-- Indices de la tabla `ventas_productos`
--
ALTER TABLE `ventas_productos`
  ADD PRIMARY KEY (`id_ventapro`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `citas`
--
ALTER TABLE `citas`
  MODIFY `id_cita` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT de la tabla `clientes`
--
ALTER TABLE `clientes`
  MODIFY `id_cliente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `id_producto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `ventas`
--
ALTER TABLE `ventas`
  MODIFY `id_venta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `ventas_productos`
--
ALTER TABLE `ventas_productos`
  MODIFY `id_ventapro` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
