-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 10-05-2023 a las 06:26:48
-- Versión del servidor: 10.4.24-MariaDB
-- Versión de PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `ventas`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `articulos`
--

CREATE TABLE `articulos` (
  `id_producto` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `nombre_articulo` varchar(50) DEFAULT NULL,
  `descripcion` varchar(500) DEFAULT NULL,
  `precio` double DEFAULT NULL,
  `stock` int(11) DEFAULT NULL,
  `fechaCaptura` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `articulos`
--

INSERT INTO `articulos` (`id_producto`, `id_usuario`, `nombre_articulo`, `descripcion`, `precio`, `stock`, `fechaCaptura`) VALUES
(1, 1, 'Cuadernos Cuadriculados', 'Cuadernos medianos cuadriculados', 1.29, 133, '2022-11-10'),
(4, 1, 'Crayolas', 'Crayolas de la marca Faber Castell', 5.708333333333333, 84, '2022-11-11'),
(9, 1, 'Paginas papel bond', 'Paginas blancas', 0.1, 2000, '2022-11-20'),
(11, 1, 'Pegamento Scotch', 'Super pegamento Blanco', 8.4, 50, '2022-11-20'),
(12, 1, 'Tijeras Facella', 'Tijeras de mango suave', 1.8333333333333333, 15, '2022-11-20'),
(17, 4, 'Paginas de color', ' Paginas de colores pastel y neutros', 0.034594594594594595, 370, '2022-11-23'),
(18, 6, 'Paginas rayadas', 'Tamaño carta', 0.2727272727272727, 275, '2022-11-23');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

CREATE TABLE `categorias` (
  `id_categoria` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `nombre_categoria` varchar(150) DEFAULT NULL,
  `fechaCaptura` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`id_categoria`, `id_usuario`, `nombre_categoria`, `fechaCaptura`) VALUES
(1, 1, 'Cuadernos', '2022-11-20'),
(2, 1, 'Crayolas', '2022-11-20'),
(3, 1, 'Paginas', '2022-11-20'),
(4, 1, 'Pegamento', '2022-11-20'),
(5, 1, 'Tijera', '2022-11-20');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE `clientes` (
  `id_cliente` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `nombre` varchar(200) DEFAULT NULL,
  `apellido` varchar(200) DEFAULT NULL,
  `direccion` varchar(200) DEFAULT NULL,
  `email` varchar(200) DEFAULT NULL,
  `telefono` varchar(200) DEFAULT NULL,
  `rfc` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`id_cliente`, `id_usuario`, `nombre`, `apellido`, `direccion`, `email`, `telefono`, `rfc`) VALUES
(3, 1, 'Ronald Antonio', 'Sermeño Aguilar', 'Ejemplo----', 'rasa0821@hotmail.com', '70895605', '0559722');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comision`
--

CREATE TABLE `comision` (
  `id_comision` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `nombre_comision` varchar(150) DEFAULT NULL,
  `venta_base` double DEFAULT NULL,
  `venta_limite` double DEFAULT NULL,
  `porcentaje` int(11) DEFAULT NULL,
  `fechaCaptura` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `comision`
--

INSERT INTO `comision` (`id_comision`, `id_usuario`, `nombre_comision`, `venta_base`, `venta_limite`, `porcentaje`, `fechaCaptura`) VALUES
(1, 1, 'Regla 1', 100, 500, 5, '2022-11-10'),
(2, 1, 'Regla 2', 501, 1000, 10, '2022-11-10'),
(3, 1, 'Regla 3', 1002, 2000, 20, '2022-11-10');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `compras`
--

CREATE TABLE `compras` (
  `id_compra` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `id_producto` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `precio_compra` double NOT NULL,
  `fechaCaptura` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `compras`
--

INSERT INTO `compras` (`id_compra`, `id_usuario`, `id_producto`, `cantidad`, `precio_compra`, `fechaCaptura`) VALUES
(1, 1, 1, 20, 1.1, '2022-11-20'),
(6, 1, 4, 15, 2.5, '2022-11-21'),
(7, 1, 13, 12, 0.9, '2022-11-21'),
(8, 1, 1, 12, 1.5, '2022-11-21');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `departamento`
--

CREATE TABLE `departamento` (
  `id_departamento` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `nombre_departamento` varchar(100) NOT NULL,
  `fechaCaptura` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `departamento`
--

INSERT INTO `departamento` (`id_departamento`, `id_usuario`, `nombre_departamento`, `fechaCaptura`) VALUES
(1, 1, 'Sala de Ventas San Salvador', '2022-11-11'),
(3, 1, 'Agencia Usulutan 2', '2022-11-11'),
(5, 1, 'Agencia Lucero', '2022-11-11'),
(6, 1, 'Agencia El Astro', '2022-11-11');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empleado`
--

CREATE TABLE `empleado` (
  `id_empleado` int(11) NOT NULL,
  `id_usuario` int(11) DEFAULT NULL,
  `id_departamento` int(11) DEFAULT NULL,
  `nombre` varchar(150) NOT NULL,
  `apellido` varchar(150) NOT NULL,
  `direccion` varchar(200) NOT NULL,
  `email` varchar(150) NOT NULL,
  `telefono` char(50) NOT NULL,
  `dui` varchar(50) NOT NULL,
  `salario` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `empleado`
--

INSERT INTO `empleado` (`id_empleado`, `id_usuario`, `id_departamento`, `nombre`, `apellido`, `direccion`, `email`, `telefono`, `dui`, `salario`) VALUES
(1, 1, 5, 'Ronald Antonio', 'Sermeño Aguilar', 'Ejemplo', 'rasa0821@hotmail.com', '70895605', '055976913', 500),
(2, 1, 1, 'Jessica Esmeralda', 'Garcia Panameño', 'Ejemplo', 'jess@hotmail.com', '78756321', '045782361', 700);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rol`
--

CREATE TABLE `rol` (
  `id_rol` int(11) NOT NULL,
  `id_usuario` int(11) DEFAULT NULL,
  `nombre_rol` varchar(100) DEFAULT NULL,
  `fechaCaptura` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id_usuario` int(11) NOT NULL,
  `nombre` varchar(50) DEFAULT NULL,
  `apellido` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `usuario` varchar(200) NOT NULL,
  `password` tinytext DEFAULT NULL,
  `fechaCaptura` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id_usuario`, `nombre`, `apellido`, `email`, `usuario`, `password`, `fechaCaptura`) VALUES
(4, 'Nancy', 'Ramirez', NULL, 'Administrador', 'd033e22ae348aeb5660fc2140aec35850c4da997', '2022-11-23'),
(6, 'Jennifer', 'Monge', NULL, 'Empleado', 'f9f011a553550aef31a8ee2690e1d1b5f261c9ff', '2022-11-23'),
(7, 'Nancy', 'pues', NULL, 'Asesor', '8a0f1df8c5d09034fea47f01c48a2015e6ade5d6', '2023-05-04'),
(8, 'empleado', 'Administrador', NULL, 'Empleado', 'f9f011a553550aef31a8ee2690e1d1b5f261c9ff', '2023-05-04');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ventas`
--

CREATE TABLE `ventas` (
  `id_venta` int(11) NOT NULL,
  `id_empleado` int(11) DEFAULT NULL,
  `id_producto` int(11) DEFAULT NULL,
  `id_usuario` int(11) DEFAULT NULL,
  `precio` float DEFAULT NULL,
  `fechaCompra` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `ventas`
--

INSERT INTO `ventas` (`id_venta`, `id_empleado`, `id_producto`, `id_usuario`, `precio`, `fechaCompra`) VALUES
(3, 1, 1, 1, 25, '2022-11-09'),
(3, 1, 1, 1, 25, '2022-11-09'),
(3, 1, 2, 1, 300, '2022-11-09'),
(4, 1, 1, 1, 25, '2022-11-09'),
(4, 1, 3, 1, 90, '2022-11-09'),
(5, 1, 1, 1, 25, '2022-11-09'),
(5, 1, 1, 1, 25, '2022-11-09'),
(5, 1, 1, 1, 25, '2022-11-09'),
(5, 1, 1, 1, 25, '2022-11-09'),
(5, 1, 3, 1, 90, '2022-11-09'),
(5, 1, 1, 1, 25, '2022-11-09'),
(6, 3, 1, 1, 25, '2022-11-10'),
(6, 3, 1, 1, 25, '2022-11-10'),
(6, 3, 1, 1, 25, '2022-11-10'),
(6, 3, 1, 1, 25, '2022-11-10'),
(6, 3, 1, 1, 25, '2022-11-10'),
(6, 3, 3, 1, 90, '2022-11-10'),
(7, 2, 4, 1, 625, '2022-11-11'),
(7, 2, 1, 1, 790, '2022-11-11'),
(7, 2, 1, 1, 790, '2022-11-11'),
(8, 1, 4, 1, 625, '2022-11-11'),
(8, 1, 4, 1, 625, '2022-11-11'),
(8, 1, 4, 1, 625, '2022-11-11'),
(8, 1, 4, 1, 625, '2022-11-11'),
(9, 1, 5, 1, 2000, '2022-11-11'),
(10, 1, 1, 1, 790, '2022-11-11'),
(10, 1, 5, 1, 2000, '2022-11-11'),
(11, 1, 1, 1, 790, '2022-11-12'),
(11, 1, 1, 1, 790, '2022-11-12');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `articulos`
--
ALTER TABLE `articulos`
  ADD PRIMARY KEY (`id_producto`);

--
-- Indices de la tabla `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`id_categoria`);

--
-- Indices de la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`id_cliente`);

--
-- Indices de la tabla `comision`
--
ALTER TABLE `comision`
  ADD PRIMARY KEY (`id_comision`);

--
-- Indices de la tabla `compras`
--
ALTER TABLE `compras`
  ADD PRIMARY KEY (`id_compra`),
  ADD KEY `FK_PRODUCTO` (`id_producto`),
  ADD KEY `FK_USUARIO` (`id_usuario`);

--
-- Indices de la tabla `departamento`
--
ALTER TABLE `departamento`
  ADD PRIMARY KEY (`id_departamento`);

--
-- Indices de la tabla `empleado`
--
ALTER TABLE `empleado`
  ADD PRIMARY KEY (`id_empleado`),
  ADD KEY `FK_DEPARTAMENTO` (`id_departamento`);

--
-- Indices de la tabla `rol`
--
ALTER TABLE `rol`
  ADD PRIMARY KEY (`id_rol`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `articulos`
--
ALTER TABLE `articulos`
  MODIFY `id_producto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT de la tabla `categorias`
--
ALTER TABLE `categorias`
  MODIFY `id_categoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `clientes`
--
ALTER TABLE `clientes`
  MODIFY `id_cliente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `comision`
--
ALTER TABLE `comision`
  MODIFY `id_comision` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `compras`
--
ALTER TABLE `compras`
  MODIFY `id_compra` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `departamento`
--
ALTER TABLE `departamento`
  MODIFY `id_departamento` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `empleado`
--
ALTER TABLE `empleado`
  MODIFY `id_empleado` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `rol`
--
ALTER TABLE `rol`
  MODIFY `id_rol` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
