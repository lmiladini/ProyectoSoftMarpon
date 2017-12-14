-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 23-11-2017 a las 23:14:52
-- Versión del servidor: 10.1.19-MariaDB
-- Versión de PHP: 7.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `mydb`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE `clientes` (
  `idClientes` int(10) UNSIGNED NOT NULL,
  `Tipo_Documento` enum('C.C','C.E','T.I','R.C','Otros') NOT NULL,
  `Documento` int(11) NOT NULL,
  `Nombre` varchar(45) NOT NULL,
  `Apellido` varchar(45) NOT NULL,
  `Telefono` int(11) NOT NULL,
  `Email` varchar(45) NOT NULL,
  `Direccion` varchar(45) NOT NULL,
  `Ciudad` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`idClientes`, `Tipo_Documento`, `Documento`, `Nombre`, `Apellido`, `Telefono`, `Email`, `Direccion`, `Ciudad`) VALUES
(1, 'C.C', 1238888888, 'rrrr', 'rrr', 222, 'paponguta@misena.edu.co', 'fghj', 'ghjj'),
(2, 'C.C', 2345678, 'ertyu', 'erty', 5678, 'ee@gg', 'rrr', 'tt');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle`
--

CREATE TABLE `detalle` (
  `idDetalle` int(10) UNSIGNED NOT NULL,
  `Valor_Unitario` float(7,3) NOT NULL,
  `Venta` int(10) UNSIGNED NOT NULL,
  `Producto` int(30) NOT NULL,
  `Cantidad` int(11) NOT NULL,
  `Total` float(7,3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `detalle`
--

INSERT INTO `detalle` (`idDetalle`, `Valor_Unitario`, `Venta`, `Producto`, `Cantidad`, `Total`) VALUES
(1, 50.000, 2, 1, 4, 0.000),
(2, 22.000, 2, 3, 2, 0.000),
(3, 20.000, 3, 3, 8, 0.000),
(12, 100.000, 2, 3, 2, 0.000),
(13, 3.000, 2, 3, 2, 0.000),
(14, 222.000, 3, 2, 2, 333.000),
(15, 12.000, 2, 3, 4, 48.000);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `gastos`
--

CREATE TABLE `gastos` (
  `idGastos` int(10) UNSIGNED NOT NULL,
  `Nombre` varchar(45) NOT NULL,
  `Apellido` varchar(45) NOT NULL,
  `Documento` int(11) NOT NULL,
  `Fecha` date NOT NULL,
  `Descripcion` text NOT NULL,
  `Horas` int(11) NOT NULL,
  `Valor_Hora` float NOT NULL,
  `Producto` int(11) NOT NULL,
  `Total` float(6,3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `gastos`
--

INSERT INTO `gastos` (`idGastos`, `Nombre`, `Apellido`, `Documento`, `Fecha`, `Descripcion`, `Horas`, `Valor_Hora`, `Producto`, `Total`) VALUES
(1, 'nnn', 'nnnn', 2147483647, '2017-11-16', 'en buen estado', 12, 23000, 3, 111.000),
(2, 'milady', 'socha', 2147483647, '2017-11-10', 'en buen estadog', 3, 5, 4, 15.000);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ingresos`
--

CREATE TABLE `ingresos` (
  `idIngresos` int(10) UNSIGNED NOT NULL,
  `Cantidad` int(11) NOT NULL,
  `Tipo_Materia` int(11) NOT NULL,
  `Proveedor` int(10) UNSIGNED NOT NULL,
  `Fecha` date NOT NULL,
  `Valor_Unitario` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto`
--

CREATE TABLE `producto` (
  `idProducto` int(11) NOT NULL,
  `Nombre` varchar(50) NOT NULL,
  `Foto` varchar(100) NOT NULL,
  `Precio` varchar(45) NOT NULL,
  `Estado` enum('Activo','Inactivo') NOT NULL,
  `Descripcion` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `producto`
--

INSERT INTO `producto` (`idProducto`, `Nombre`, `Foto`, `Precio`, `Estado`, `Descripcion`) VALUES
(1, 'image/download.jpg', '111', '1111', 'Inactivo', 'qqqq'),
(2, 'image/N.Tesla.JPG', 'madera', '45000', 'Activo', 'en buen esrado'),
(3, 'madera pura', 'image/download (1).jpg', '34000', 'Activo', 'en buen estado'),
(4, 'nnnm', 'image/descarga.jpg', '12', 'Activo', 'en buen estado'),
(5, 'pppp', 'image/descarga.jpg', '12', 'Activo', 'ppppp');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proveedor`
--

CREATE TABLE `proveedor` (
  `idProveedor` int(10) UNSIGNED NOT NULL,
  `Razon_Social` varchar(45) NOT NULL,
  `Nit_Rut` int(11) NOT NULL,
  `Ciudad` varchar(45) NOT NULL,
  `Direccion` varchar(45) NOT NULL,
  `Telefono` int(11) NOT NULL,
  `Contrato` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `proveedor`
--

INSERT INTO `proveedor` (`idProveedor`, `Razon_Social`, `Nit_Rut`, `Ciudad`, `Direccion`, `Telefono`, `Contrato`) VALUES
(1, 'yyyuu', 2147483647, 'eeeee', 'errrrr', 2147483647, 'ddfdfff');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `salidas`
--

CREATE TABLE `salidas` (
  `idSalidas` int(10) UNSIGNED NOT NULL,
  `Producto` int(11) NOT NULL,
  `Tipo_Materia` int(11) NOT NULL,
  `Cantidad` decimal(10,0) NOT NULL,
  `Fecha` date NOT NULL,
  `Valor_Unitario` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_materia`
--

CREATE TABLE `tipo_materia` (
  `idTipo_Materia` int(11) NOT NULL,
  `Nombre` varchar(45) NOT NULL,
  `Cantidad` double NOT NULL,
  `Valor` float NOT NULL,
  `U_Medida` enum('Metros','Centimetros','Pulgadas','Mililitros') NOT NULL,
  `Tipo` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tipo_materia`
--

INSERT INTO `tipo_materia` (`idTipo_Materia`, `Nombre`, `Cantidad`, `Valor`, `U_Medida`, `Tipo`) VALUES
(1, 'mm', 8, 77, '', 'yy'),
(2, 'Madera corta', 3, 12000, 'Centimetros', 'fff');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `idUsuarios` int(10) UNSIGNED NOT NULL,
  `Email` varchar(45) NOT NULL,
  `Usuario` varchar(45) NOT NULL,
  `Password` varchar(45) NOT NULL,
  `Estado` enum('Activo','Inactivo') NOT NULL,
  `Perfil` enum('Administrador','Empleado') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`idUsuarios`, `Email`, `Usuario`, `Password`, `Estado`, `Perfil`) VALUES
(1, 'Milady@misena.cos', 'Milady nino', '4828a7ff4b7ccfec63ee2943af5b151e', 'Activo', 'Administrador'),
(2, 'CHAROL@MISENA.CO', 'CHAROLLL', '12345678', 'Activo', 'Administrador'),
(3, 'david@misena.co', 'David Andres', '4828a7ff4b7ccfec63ee2943af5b151e', 'Activo', 'Empleado'),
(4, 'Natalia@misena.co', 'Empleados', '123456789', 'Activo', 'Empleado');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `venta`
--

CREATE TABLE `venta` (
  `idVenta` int(10) UNSIGNED NOT NULL,
  `Fecha` date NOT NULL,
  `Consecutivo` int(11) NOT NULL,
  `Clientes` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `venta`
--

INSERT INTO `venta` (`idVenta`, `Fecha`, `Consecutivo`, `Clientes`) VALUES
(2, '2017-11-18', 778, 1),
(3, '2017-11-18', 6, 1),
(4, '2017-11-10', 0, 2),
(5, '2017-11-16', 1009, 1),
(6, '2017-11-10', 1014, 2);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`idClientes`),
  ADD UNIQUE KEY `idClientes_UNIQUE` (`idClientes`);

--
-- Indices de la tabla `detalle`
--
ALTER TABLE `detalle`
  ADD PRIMARY KEY (`idDetalle`,`Venta`,`Producto`),
  ADD UNIQUE KEY `idDetalle_UNIQUE` (`idDetalle`),
  ADD KEY `fk_Venta_has_Producto_Producto1_idx` (`Producto`),
  ADD KEY `fk_Venta_has_Producto_Venta1_idx` (`Venta`);

--
-- Indices de la tabla `gastos`
--
ALTER TABLE `gastos`
  ADD PRIMARY KEY (`idGastos`),
  ADD UNIQUE KEY `idGastos_UNIQUE` (`idGastos`),
  ADD KEY `fk_Gastos_Producto1_idx` (`Producto`);

--
-- Indices de la tabla `ingresos`
--
ALTER TABLE `ingresos`
  ADD PRIMARY KEY (`idIngresos`,`Tipo_Materia`,`Proveedor`),
  ADD UNIQUE KEY `idIngresos_UNIQUE` (`idIngresos`),
  ADD KEY `fk_Tipo_Materia_has_Proveedor_Proveedor1_idx` (`Proveedor`),
  ADD KEY `fk_Tipo_Materia_has_Proveedor_Tipo_Materia1_idx` (`Tipo_Materia`);

--
-- Indices de la tabla `producto`
--
ALTER TABLE `producto`
  ADD PRIMARY KEY (`idProducto`),
  ADD UNIQUE KEY `idProducto_UNIQUE` (`idProducto`);

--
-- Indices de la tabla `proveedor`
--
ALTER TABLE `proveedor`
  ADD PRIMARY KEY (`idProveedor`),
  ADD UNIQUE KEY `idProveedor_UNIQUE` (`idProveedor`);

--
-- Indices de la tabla `salidas`
--
ALTER TABLE `salidas`
  ADD PRIMARY KEY (`idSalidas`,`Producto`,`Tipo_Materia`),
  ADD UNIQUE KEY `idSalidas_UNIQUE` (`idSalidas`),
  ADD KEY `fk_Producto_has_Tipo_Materia_Tipo_Materia1_idx` (`Tipo_Materia`),
  ADD KEY `fk_Producto_has_Tipo_Materia_Producto1_idx` (`Producto`);

--
-- Indices de la tabla `tipo_materia`
--
ALTER TABLE `tipo_materia`
  ADD PRIMARY KEY (`idTipo_Materia`),
  ADD UNIQUE KEY `idTipo_Materia_UNIQUE` (`idTipo_Materia`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`idUsuarios`),
  ADD UNIQUE KEY `idUsuarios_UNIQUE` (`idUsuarios`);

--
-- Indices de la tabla `venta`
--
ALTER TABLE `venta`
  ADD PRIMARY KEY (`idVenta`),
  ADD UNIQUE KEY `idVenta_UNIQUE` (`idVenta`),
  ADD KEY `fk_Venta_Clientes_idx` (`Clientes`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `clientes`
--
ALTER TABLE `clientes`
  MODIFY `idClientes` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `detalle`
--
ALTER TABLE `detalle`
  MODIFY `idDetalle` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT de la tabla `gastos`
--
ALTER TABLE `gastos`
  MODIFY `idGastos` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `ingresos`
--
ALTER TABLE `ingresos`
  MODIFY `idIngresos` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `producto`
--
ALTER TABLE `producto`
  MODIFY `idProducto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT de la tabla `proveedor`
--
ALTER TABLE `proveedor`
  MODIFY `idProveedor` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `salidas`
--
ALTER TABLE `salidas`
  MODIFY `idSalidas` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `tipo_materia`
--
ALTER TABLE `tipo_materia`
  MODIFY `idTipo_Materia` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `idUsuarios` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `venta`
--
ALTER TABLE `venta`
  MODIFY `idVenta` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `detalle`
--
ALTER TABLE `detalle`
  ADD CONSTRAINT `fk_Venta_has_Producto_Producto1` FOREIGN KEY (`Producto`) REFERENCES `producto` (`idProducto`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Venta_has_Producto_Venta1` FOREIGN KEY (`Venta`) REFERENCES `venta` (`idVenta`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `gastos`
--
ALTER TABLE `gastos`
  ADD CONSTRAINT `fk_Gastos_Producto1` FOREIGN KEY (`Producto`) REFERENCES `producto` (`idProducto`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `ingresos`
--
ALTER TABLE `ingresos`
  ADD CONSTRAINT `fk_Tipo_Materia_has_Proveedor_Proveedor1` FOREIGN KEY (`Proveedor`) REFERENCES `proveedor` (`idProveedor`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Tipo_Materia_has_Proveedor_Tipo_Materia1` FOREIGN KEY (`Tipo_Materia`) REFERENCES `tipo_materia` (`idTipo_Materia`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `salidas`
--
ALTER TABLE `salidas`
  ADD CONSTRAINT `fk_Producto_has_Tipo_Materia_Producto1` FOREIGN KEY (`Producto`) REFERENCES `producto` (`idProducto`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Producto_has_Tipo_Materia_Tipo_Materia1` FOREIGN KEY (`Tipo_Materia`) REFERENCES `tipo_materia` (`idTipo_Materia`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `venta`
--
ALTER TABLE `venta`
  ADD CONSTRAINT `fk_Venta_Clientes` FOREIGN KEY (`Clientes`) REFERENCES `clientes` (`idClientes`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
