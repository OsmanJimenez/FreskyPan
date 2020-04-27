-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 27-04-2020 a las 16:28:15
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
-- Base de datos: `panaderiaerp`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `agenda`
--

CREATE TABLE `agenda` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(150) COLLATE utf8_spanish_ci DEFAULT NULL,
  `body` text COLLATE utf8_spanish_ci NOT NULL,
  `url` varchar(150) COLLATE utf8_spanish_ci NOT NULL,
  `class` varchar(45) COLLATE utf8_spanish_ci NOT NULL DEFAULT 'event-important',
  `start` varchar(15) COLLATE utf8_spanish_ci NOT NULL,
  `end` varchar(15) COLLATE utf8_spanish_ci NOT NULL,
  `inicio_normal` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `final_normal` varchar(50) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `agenda`
--

INSERT INTO `agenda` (`id`, `title`, `body`, `url`, `class`, `start`, `end`, `inicio_normal`, `final_normal`) VALUES
(89, 'Prueba_1', 'Esta es la descripción', 'http://localhost/linea/backend/calendario/descripcion_evento.php?id=89', 'event-success', '1583862720000', '1583430720000', '10/03/2020 12:52:00', '05/03/2020 12:52:00'),
(90, 'sds', 'dsadsa', 'http://localhost/linea/backend/calendario/descripcion_evento.php?id=90', 'event-info', '1584294780000', '1584381180000', '15/03/2020 12:53:00', '16/03/2020 12:53:00'),
(92, 'Esto es un titulo especial', 'el evento es especial.', 'http://localhost/linea/backend/calendario/descripcion_evento.php?id=92', 'event-special', '1584594000000', '1584939600000', '19/03/2020 00:00:00', '23/03/2020 00:00:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bodega`
--

CREATE TABLE `bodega` (
  `ID_BODEGA` int(11) NOT NULL,
  `descripcion` varchar(30) NOT NULL,
  `estado` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bodega_insumo`
--

CREATE TABLE `bodega_insumo` (
  `FK_ID_BODEGA` int(11) NOT NULL,
  `FK_ID_INSUMO` int(11) NOT NULL,
  `fechaRegistro` date NOT NULL,
  `transaccion` tinyint(1) NOT NULL,
  `unidades` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bodega_materiaprima`
--

CREATE TABLE `bodega_materiaprima` (
  `FK_ID_BODEGA` int(11) NOT NULL,
  `FK_ID_MATERIAPRIMA` int(11) NOT NULL,
  `FK_ID_CALENDARIO` int(11) NOT NULL,
  `fechaVencimiento` date NOT NULL,
  `fechaRegistro` date NOT NULL,
  `unidades` int(11) NOT NULL,
  `transaccion` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `calendario`
--

CREATE TABLE `calendario` (
  `ID_CALENDARIO` int(11) NOT NULL,
  `nombre` varchar(30) NOT NULL,
  `hora` varchar(5) NOT NULL,
  `detalles` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `catproducto`
--

CREATE TABLE `catproducto` (
  `ID_CATPRODUCTO` int(11) NOT NULL,
  `nombre` varchar(10) NOT NULL,
  `descripcion` varchar(40) NOT NULL,
  `precio` int(11) NOT NULL,
  `stock` int(11) NOT NULL,
  `imagen` varchar(200) NOT NULL,
  `duracion` int(11) NOT NULL,
  `sabor` varchar(12) NOT NULL,
  `iva` int(11) NOT NULL,
  `estado` tinyint(1) NOT NULL,
  `FK_ID_SUBTIPOPRODUCTO` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `catproducto_materiaprima`
--

CREATE TABLE `catproducto_materiaprima` (
  `FK_ID_CATPRODUCTO` int(11) NOT NULL,
  `FK_ID_MATERIAPRIMA` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `devolucion`
--

CREATE TABLE `devolucion` (
  `ID_DEVOLUCION` int(11) NOT NULL,
  `descripcion` varchar(30) NOT NULL,
  `fecha` date NOT NULL,
  `estado` tinyint(1) NOT NULL,
  `FK_ID_PEDIDO` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `eventoespecifico`
--

CREATE TABLE `eventoespecifico` (
  `ID_EVENTOESPECIFICO` int(11) NOT NULL,
  `FK_ID_CALENDARIO` int(11) NOT NULL,
  `fecha` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `factura`
--

CREATE TABLE `factura` (
  `ID_FACTURA` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `FK_ID_PEDIDO` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `insumo`
--

CREATE TABLE `insumo` (
  `ID_INSUMO` int(11) NOT NULL,
  `nombre` varchar(10) NOT NULL,
  `stock` int(11) NOT NULL,
  `descripcion` varchar(30) NOT NULL,
  `precio` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `iva` int(11) NOT NULL,
  `estado` tinyint(1) NOT NULL,
  `FK_ID_TIPOINSUMO` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `log`
--

CREATE TABLE `log` (
  `ID_LOG` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `hora` varchar(5) DEFAULT NULL,
  `descripcion` varchar(50) NOT NULL,
  `FK_ID_USUARIO` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `materiaprima`
--

CREATE TABLE `materiaprima` (
  `ID_MATERIAPRIMA` int(11) NOT NULL,
  `nombre` varchar(10) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `descripcion` varchar(30) NOT NULL,
  `precio` int(11) NOT NULL,
  `iva` int(11) NOT NULL,
  `stock` int(11) NOT NULL,
  `estado` tinyint(1) NOT NULL,
  `FK_ID_MEDIDACANTIDAD` int(11) NOT NULL,
  `FK_ID_TIPOMATERIAPRIMA` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `medidacantidad`
--

CREATE TABLE `medidacantidad` (
  `ID_MEDIDACANTIDAD` int(11) NOT NULL,
  `nombre` varchar(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedido`
--

CREATE TABLE `pedido` (
  `ID_PEDIDO` int(11) NOT NULL,
  `FK_ID_CALENDARIO` int(11) NOT NULL,
  `plazo` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `exigencia` varchar(100) NOT NULL,
  `estado` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedido_insumo`
--

CREATE TABLE `pedido_insumo` (
  `FK_ID_PEDIDO` int(11) NOT NULL,
  `FK_ID_INSUMO` int(11) NOT NULL,
  `unidades` int(11) NOT NULL,
  `cancelado` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedido_materiaprima`
--

CREATE TABLE `pedido_materiaprima` (
  `FK_ID_PEDIDO` int(11) NOT NULL,
  `FK_ID_MATERIAPRIMA` int(11) NOT NULL,
  `unidades` int(11) NOT NULL,
  `cancelado` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedido_proveedor`
--

CREATE TABLE `pedido_proveedor` (
  `FK_ID_PEDIDO` int(11) NOT NULL,
  `FK_ID_PROVEEDOR` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `produccion`
--

CREATE TABLE `produccion` (
  `ID_PRODUCCION` int(11) NOT NULL,
  `FK_ID_CALENDARIO` int(11) NOT NULL,
  `fechaProduccion` date NOT NULL,
  `unidades` int(11) NOT NULL,
  `cantidadInicial` int(11) NOT NULL,
  `FK_ID_CATPRODUCTO` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proveedor`
--

CREATE TABLE `proveedor` (
  `ID_PROVEEDOR` int(11) NOT NULL,
  `prNombre` varchar(10) NOT NULL,
  `segNombre` varchar(10) NOT NULL,
  `prApellido` varchar(10) NOT NULL,
  `segApellido` varchar(10) NOT NULL,
  `correo` varchar(30) NOT NULL,
  `estado` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proveedor_insumo`
--

CREATE TABLE `proveedor_insumo` (
  `FK_ID_PROVEEDOR` int(11) NOT NULL,
  `FK_ID_INSUMO` int(11) NOT NULL,
  `estado` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proveedor_materiaprima`
--

CREATE TABLE `proveedor_materiaprima` (
  `FK_ID_MATERIAPRIMA` int(11) NOT NULL,
  `FK_ID_PROVEEDOR` int(11) NOT NULL,
  `estado` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `subtipoproducto`
--

CREATE TABLE `subtipoproducto` (
  `ID_SUBTIPOPRODUCTO` int(11) NOT NULL,
  `nombre` varchar(10) NOT NULL,
  `FK_ID_TIPOPRODUCTO` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `telefono`
--

CREATE TABLE `telefono` (
  `FK_ID_PROVEEDOR` int(11) NOT NULL,
  `ID_TELEFONO` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipoinsumo`
--

CREATE TABLE `tipoinsumo` (
  `ID_TIPOINSUMO` int(11) NOT NULL,
  `nombre` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipomateriaprima`
--

CREATE TABLE `tipomateriaprima` (
  `ID_TIPOMATERIAPRIMA` int(11) NOT NULL,
  `nombre` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipoproducto`
--

CREATE TABLE `tipoproducto` (
  `ID_TIPOPRODUCTO` int(11) NOT NULL,
  `nombre` varchar(16) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `ID_USUARIO` int(11) NOT NULL,
  `prNombre` varchar(10) NOT NULL,
  `prApellido` varchar(10) NOT NULL,
  `contrasena` varchar(25) NOT NULL,
  `rol` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `venta`
--

CREATE TABLE `venta` (
  `ID_VENTA` int(11) NOT NULL,
  `fecha` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `venta_produccion`
--

CREATE TABLE `venta_produccion` (
  `FK_ID_PRODUCCION` int(11) NOT NULL,
  `FK_ID_VENTA` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `bodega`
--
ALTER TABLE `bodega`
  ADD PRIMARY KEY (`ID_BODEGA`);

--
-- Indices de la tabla `bodega_insumo`
--
ALTER TABLE `bodega_insumo`
  ADD PRIMARY KEY (`FK_ID_BODEGA`,`FK_ID_INSUMO`),
  ADD KEY `FK_ID_INSUMO_BODEGA_INSUMO` (`FK_ID_INSUMO`);

--
-- Indices de la tabla `bodega_materiaprima`
--
ALTER TABLE `bodega_materiaprima`
  ADD PRIMARY KEY (`FK_ID_BODEGA`,`FK_ID_MATERIAPRIMA`,`FK_ID_CALENDARIO`),
  ADD KEY `FK_ID_MATERIAPRIMA_BODEGA_MATERIAPRIMA` (`FK_ID_MATERIAPRIMA`),
  ADD KEY `FK_ID_CALENDARIO_BODEGA_MATERIAPRIMA` (`FK_ID_CALENDARIO`);

--
-- Indices de la tabla `calendario`
--
ALTER TABLE `calendario`
  ADD PRIMARY KEY (`ID_CALENDARIO`);

--
-- Indices de la tabla `catproducto`
--
ALTER TABLE `catproducto`
  ADD PRIMARY KEY (`ID_CATPRODUCTO`),
  ADD KEY `FK_ID_SUBTIPOPRODUCTO_CATPRODUCTO` (`FK_ID_SUBTIPOPRODUCTO`);

--
-- Indices de la tabla `catproducto_materiaprima`
--
ALTER TABLE `catproducto_materiaprima`
  ADD PRIMARY KEY (`FK_ID_CATPRODUCTO`,`FK_ID_MATERIAPRIMA`);

--
-- Indices de la tabla `devolucion`
--
ALTER TABLE `devolucion`
  ADD PRIMARY KEY (`ID_DEVOLUCION`),
  ADD KEY `FK_ID_PEDIDO_DEVOLUCION` (`FK_ID_PEDIDO`);

--
-- Indices de la tabla `eventoespecifico`
--
ALTER TABLE `eventoespecifico`
  ADD PRIMARY KEY (`ID_EVENTOESPECIFICO`,`FK_ID_CALENDARIO`),
  ADD KEY `FK_ID_CALENDARIO_EVENTOESPECIFICO` (`FK_ID_CALENDARIO`);

--
-- Indices de la tabla `factura`
--
ALTER TABLE `factura`
  ADD PRIMARY KEY (`ID_FACTURA`),
  ADD KEY `FK_ID_PEDIDO_FACTURA` (`FK_ID_PEDIDO`);

--
-- Indices de la tabla `insumo`
--
ALTER TABLE `insumo`
  ADD PRIMARY KEY (`ID_INSUMO`),
  ADD KEY `FK_ID_TIPOINSUMO_INSUMO` (`FK_ID_TIPOINSUMO`);

--
-- Indices de la tabla `log`
--
ALTER TABLE `log`
  ADD PRIMARY KEY (`ID_LOG`),
  ADD KEY `FK_ID_USUARIO_LOG` (`FK_ID_USUARIO`);

--
-- Indices de la tabla `materiaprima`
--
ALTER TABLE `materiaprima`
  ADD PRIMARY KEY (`ID_MATERIAPRIMA`),
  ADD KEY `FK_ID_TIPOMATERIAPRIMA_MateriaPrima` (`FK_ID_TIPOMATERIAPRIMA`);

--
-- Indices de la tabla `medidacantidad`
--
ALTER TABLE `medidacantidad`
  ADD PRIMARY KEY (`ID_MEDIDACANTIDAD`);

--
-- Indices de la tabla `pedido`
--
ALTER TABLE `pedido`
  ADD PRIMARY KEY (`ID_PEDIDO`,`FK_ID_CALENDARIO`),
  ADD KEY `FK_ID_CALENDARIO_PEDIDO` (`FK_ID_CALENDARIO`);

--
-- Indices de la tabla `pedido_insumo`
--
ALTER TABLE `pedido_insumo`
  ADD PRIMARY KEY (`FK_ID_PEDIDO`,`FK_ID_INSUMO`),
  ADD KEY `FK_ID_INSUMO_PEDIDO_INSUMO` (`FK_ID_INSUMO`);

--
-- Indices de la tabla `pedido_materiaprima`
--
ALTER TABLE `pedido_materiaprima`
  ADD PRIMARY KEY (`FK_ID_PEDIDO`,`FK_ID_MATERIAPRIMA`),
  ADD KEY `FK_ID_MATERIAPRIMA_PEDIDO_MATERIAPRIMA` (`FK_ID_MATERIAPRIMA`);

--
-- Indices de la tabla `pedido_proveedor`
--
ALTER TABLE `pedido_proveedor`
  ADD PRIMARY KEY (`FK_ID_PEDIDO`,`FK_ID_PROVEEDOR`),
  ADD KEY `FK_ID_PROVEEDOR_PEDIDO_PROVEEDOR` (`FK_ID_PROVEEDOR`);

--
-- Indices de la tabla `produccion`
--
ALTER TABLE `produccion`
  ADD PRIMARY KEY (`ID_PRODUCCION`,`FK_ID_CALENDARIO`),
  ADD KEY `FK_ID_CALENDARIO_PRODUCCION` (`FK_ID_CALENDARIO`),
  ADD KEY `FK_ID_CATPRODUCTO_PRODUCCION` (`FK_ID_CATPRODUCTO`);

--
-- Indices de la tabla `proveedor`
--
ALTER TABLE `proveedor`
  ADD PRIMARY KEY (`ID_PROVEEDOR`);

--
-- Indices de la tabla `proveedor_insumo`
--
ALTER TABLE `proveedor_insumo`
  ADD PRIMARY KEY (`FK_ID_PROVEEDOR`,`FK_ID_INSUMO`),
  ADD KEY `FK_ID_INSUMO_PROVEEDOR_INSUMO` (`FK_ID_INSUMO`);

--
-- Indices de la tabla `proveedor_materiaprima`
--
ALTER TABLE `proveedor_materiaprima`
  ADD PRIMARY KEY (`FK_ID_MATERIAPRIMA`,`FK_ID_PROVEEDOR`),
  ADD KEY `FK_ID_PROVEEDOR_PROVEEDOR_MATERIAPRIMA` (`FK_ID_PROVEEDOR`);

--
-- Indices de la tabla `subtipoproducto`
--
ALTER TABLE `subtipoproducto`
  ADD PRIMARY KEY (`ID_SUBTIPOPRODUCTO`),
  ADD KEY `FK_ID_TIPOPRODUCTO_SUBTIPOPRODUCTO` (`FK_ID_TIPOPRODUCTO`);

--
-- Indices de la tabla `telefono`
--
ALTER TABLE `telefono`
  ADD PRIMARY KEY (`FK_ID_PROVEEDOR`,`ID_TELEFONO`);

--
-- Indices de la tabla `tipoinsumo`
--
ALTER TABLE `tipoinsumo`
  ADD PRIMARY KEY (`ID_TIPOINSUMO`);

--
-- Indices de la tabla `tipomateriaprima`
--
ALTER TABLE `tipomateriaprima`
  ADD PRIMARY KEY (`ID_TIPOMATERIAPRIMA`);

--
-- Indices de la tabla `tipoproducto`
--
ALTER TABLE `tipoproducto`
  ADD PRIMARY KEY (`ID_TIPOPRODUCTO`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`ID_USUARIO`);

--
-- Indices de la tabla `venta`
--
ALTER TABLE `venta`
  ADD PRIMARY KEY (`ID_VENTA`);

--
-- Indices de la tabla `venta_produccion`
--
ALTER TABLE `venta_produccion`
  ADD PRIMARY KEY (`FK_ID_PRODUCCION`,`FK_ID_VENTA`),
  ADD KEY `FK_ID_VENTA_VENTA` (`FK_ID_VENTA`);

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `bodega_insumo`
--
ALTER TABLE `bodega_insumo`
  ADD CONSTRAINT `FK_ID_BODEGA_BODEGA_INSUMO` FOREIGN KEY (`FK_ID_BODEGA`) REFERENCES `bodega` (`ID_BODEGA`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_ID_INSUMO_BODEGA_INSUMO` FOREIGN KEY (`FK_ID_INSUMO`) REFERENCES `insumo` (`ID_INSUMO`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `bodega_materiaprima`
--
ALTER TABLE `bodega_materiaprima`
  ADD CONSTRAINT `FK_ID_BODEGA_BODEGA_MATERIAPRIMA` FOREIGN KEY (`FK_ID_BODEGA`) REFERENCES `bodega` (`ID_BODEGA`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_ID_CALENDARIO_BODEGA_MATERIAPRIMA` FOREIGN KEY (`FK_ID_CALENDARIO`) REFERENCES `calendario` (`ID_CALENDARIO`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_ID_MATERIAPRIMA_BODEGA_MATERIAPRIMA` FOREIGN KEY (`FK_ID_MATERIAPRIMA`) REFERENCES `materiaprima` (`ID_MATERIAPRIMA`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `catproducto`
--
ALTER TABLE `catproducto`
  ADD CONSTRAINT `FK_ID_SUBTIPOPRODUCTO_CATPRODUCTO` FOREIGN KEY (`FK_ID_SUBTIPOPRODUCTO`) REFERENCES `subtipoproducto` (`ID_SUBTIPOPRODUCTO`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `devolucion`
--
ALTER TABLE `devolucion`
  ADD CONSTRAINT `FK_ID_PEDIDO_DEVOLUCION` FOREIGN KEY (`FK_ID_PEDIDO`) REFERENCES `pedido` (`ID_PEDIDO`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `eventoespecifico`
--
ALTER TABLE `eventoespecifico`
  ADD CONSTRAINT `FK_ID_CALENDARIO_EVENTOESPECIFICO` FOREIGN KEY (`FK_ID_CALENDARIO`) REFERENCES `calendario` (`ID_CALENDARIO`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `factura`
--
ALTER TABLE `factura`
  ADD CONSTRAINT `FK_ID_PEDIDO_FACTURA` FOREIGN KEY (`FK_ID_PEDIDO`) REFERENCES `pedido` (`ID_PEDIDO`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `insumo`
--
ALTER TABLE `insumo`
  ADD CONSTRAINT `FK_ID_TIPOINSUMO_INSUMO` FOREIGN KEY (`FK_ID_TIPOINSUMO`) REFERENCES `tipoinsumo` (`ID_TIPOINSUMO`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `log`
--
ALTER TABLE `log`
  ADD CONSTRAINT `FK_ID_USUARIO_LOG` FOREIGN KEY (`FK_ID_USUARIO`) REFERENCES `usuario` (`ID_USUARIO`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `materiaprima`
--
ALTER TABLE `materiaprima`
  ADD CONSTRAINT `FK_ID_MEDIDACANTIDAD_MATERIAPRIMA` FOREIGN KEY (`FK_ID_TIPOMATERIAPRIMA`) REFERENCES `tipomateriaprima` (`ID_TIPOMATERIAPRIMA`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_ID_TIPOMATERIAPRIMA_MateriaPrima` FOREIGN KEY (`FK_ID_TIPOMATERIAPRIMA`) REFERENCES `tipomateriaprima` (`ID_TIPOMATERIAPRIMA`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `pedido`
--
ALTER TABLE `pedido`
  ADD CONSTRAINT `FK_ID_CALENDARIO_PEDIDO` FOREIGN KEY (`FK_ID_CALENDARIO`) REFERENCES `calendario` (`ID_CALENDARIO`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `pedido_insumo`
--
ALTER TABLE `pedido_insumo`
  ADD CONSTRAINT `FK_ID_INSUMO_PEDIDO_INSUMO` FOREIGN KEY (`FK_ID_INSUMO`) REFERENCES `insumo` (`ID_INSUMO`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_ID_PEDIDO_PEDIDO_INSUMO` FOREIGN KEY (`FK_ID_PEDIDO`) REFERENCES `pedido` (`ID_PEDIDO`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `pedido_materiaprima`
--
ALTER TABLE `pedido_materiaprima`
  ADD CONSTRAINT `FK_ID_MATERIAPRIMA_PEDIDO_MATERIAPRIMA` FOREIGN KEY (`FK_ID_MATERIAPRIMA`) REFERENCES `materiaprima` (`ID_MATERIAPRIMA`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_ID_PEDIDO_PEDIDO_MATERIAPRIMA` FOREIGN KEY (`FK_ID_PEDIDO`) REFERENCES `pedido` (`ID_PEDIDO`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `pedido_proveedor`
--
ALTER TABLE `pedido_proveedor`
  ADD CONSTRAINT `FK_ID_PEDIDO_PEDIDO_PROVEEDOR` FOREIGN KEY (`FK_ID_PEDIDO`) REFERENCES `pedido` (`ID_PEDIDO`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_ID_PROVEEDOR_PEDIDO_PROVEEDOR` FOREIGN KEY (`FK_ID_PROVEEDOR`) REFERENCES `proveedor` (`ID_PROVEEDOR`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `produccion`
--
ALTER TABLE `produccion`
  ADD CONSTRAINT `FK_ID_CALENDARIO_PRODUCCION` FOREIGN KEY (`FK_ID_CALENDARIO`) REFERENCES `calendario` (`ID_CALENDARIO`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_ID_CATPRODUCTO_PRODUCCION` FOREIGN KEY (`FK_ID_CATPRODUCTO`) REFERENCES `catproducto` (`ID_CATPRODUCTO`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `proveedor_insumo`
--
ALTER TABLE `proveedor_insumo`
  ADD CONSTRAINT `FK_ID_INSUMO_PROVEEDOR_INSUMO` FOREIGN KEY (`FK_ID_INSUMO`) REFERENCES `insumo` (`ID_INSUMO`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_ID_PROVEEDOR_PROVEEDOR_INSUMO` FOREIGN KEY (`FK_ID_PROVEEDOR`) REFERENCES `proveedor` (`ID_PROVEEDOR`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `proveedor_materiaprima`
--
ALTER TABLE `proveedor_materiaprima`
  ADD CONSTRAINT `FK_ID_MATERIAPRIMA_PROVEEDOR_MATERIAPRIMA` FOREIGN KEY (`FK_ID_MATERIAPRIMA`) REFERENCES `materiaprima` (`ID_MATERIAPRIMA`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_ID_PROVEEDOR_PROVEEDOR_MATERIAPRIMA` FOREIGN KEY (`FK_ID_PROVEEDOR`) REFERENCES `proveedor` (`ID_PROVEEDOR`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `subtipoproducto`
--
ALTER TABLE `subtipoproducto`
  ADD CONSTRAINT `FK_ID_TIPOPRODUCTO_SUBTIPOPRODUCTO` FOREIGN KEY (`FK_ID_TIPOPRODUCTO`) REFERENCES `tipoproducto` (`ID_TIPOPRODUCTO`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `telefono`
--
ALTER TABLE `telefono`
  ADD CONSTRAINT `FK_ID_PROVEEDOR_TELEFONO` FOREIGN KEY (`FK_ID_PROVEEDOR`) REFERENCES `proveedor` (`ID_PROVEEDOR`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `venta_produccion`
--
ALTER TABLE `venta_produccion`
  ADD CONSTRAINT `FK_ID_PRODUCCION_VENTA_PRODUCCION` FOREIGN KEY (`FK_ID_PRODUCCION`) REFERENCES `produccion` (`ID_PRODUCCION`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_ID_VENTA_VENTA` FOREIGN KEY (`FK_ID_VENTA`) REFERENCES `venta` (`ID_VENTA`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
