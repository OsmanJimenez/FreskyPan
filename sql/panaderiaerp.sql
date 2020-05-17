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
-- Estructura de tabla para la tabla `Agenda`
--

CREATE TABLE `Agenda` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(150) DEFAULT NULL,
  `body` text NOT NULL,
  `url` varchar(150) NOT NULL,
  `class` varchar(45) NOT NULL DEFAULT 'event-important',
  `start` varchar(15) NOT NULL,
  `end` varchar(15) NOT NULL,
  `inicio_normal` varchar(50) NOT NULL,
  `final_normal` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `Agenda`
--

INSERT INTO `Agenda` (`id`, `title`, `body`, `url`, `class`, `start`, `end`, `inicio_normal`, `final_normal`) VALUES
(89, 'Prueba_1', 'Esta es la descripción', 'http://localhost/linea/backend/Calendario/descripcion_evento.php?id=89', 'event-success', '1583862720000', '1583430720000', '10/03/2020 12:52:00', '05/03/2020 12:52:00'),
(90, 'sds', 'dsadsa', 'http://localhost/linea/backend/Calendario/descripcion_evento.php?id=90', 'event-info', '1584294780000', '1584381180000', '15/03/2020 12:53:00', '16/03/2020 12:53:00'),
(92, 'Esto es un titulo especial', 'el evento es especial.', 'http://localhost/linea/backend/Calendario/descripcion_evento.php?id=92', 'event-special', '1584594000000', '1584939600000', '19/03/2020 00:00:00', '23/03/2020 00:00:00');

-- --------------------------------------------------------
--
-- Disparadores `agenda`
--
DELIMITER $$
CREATE TRIGGER `AGENDA` BEFORE INSERT ON `agenda` FOR EACH ROW BEGIN
    SET NEW.`id` = (
       SELECT IFNULL(MAX(id), 0) + 1
       FROM AGENDA 
    );
END
$$
DELIMITER ;

-- --------------------------------------------------------
--
-- Estructura de tabla para la tabla `Bodega`
--

CREATE TABLE `Bodega` (
  `ID_BODEGA` int(2) NOT NULL,
  `descripcion` varchar(50) NOT NULL,
  `estado` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `BODEGA_INSUMO`
--

CREATE TABLE `BODEGA_INSUMO` (
  `FK_ID_BODEGA` int(2) NOT NULL,
  `FK_ID_INSUMO` int(3) NOT NULL,
  `unidades` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `BODEGA_MATERIAPRIMA`
--

CREATE TABLE `BODEGA_MATERIAPRIMA` (
  `FK_ID_BODEGA` int(2) NOT NULL,
  `FK_ID_MATERIAPRIMA` int(3) NOT NULL,
  `FK_ID_AGENDA` int(10) UNSIGNED NOT NULL,
  `fechaVencimiento` date NOT NULL,
  `unidades` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `CatProducto`
--

CREATE TABLE `CatProducto` (
  `ID_CATPRODUCTO` int(2) NOT NULL,
  `nombre` varchar(20) NOT NULL,
  `descripcion` varchar(50) NOT NULL,
  `precio` int(6) NOT NULL,
  `stock` int(3) NOT NULL,
  `imagen` varchar(200) NOT NULL,
  `duracion` int(2) NOT NULL,
  `sabor` varchar(12) NOT NULL,
  `iva` int(2) NOT NULL,
  `estado` tinyint(1) NOT NULL,
  `FK_ID_SUBTIPOPRODUCTO` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Devolucion`
--

CREATE TABLE `Devolucion` (
  `ID_DEVOLUCION` int(4) NOT NULL,
  `descripcion` varchar(60) NOT NULL,
  `fecha` date NOT NULL,
  `cancelado` tinyint(1) NOT NULL,
  `estado` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Factura`
--

CREATE TABLE `Factura` (
  `ID_FACTURA` int(6) NOT NULL,
  `fecha` date NOT NULL,
  `FK_ID_PEDIDO` int(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Insumo`
--

CREATE TABLE `Insumo` (
  `ID_INSUMO` int(3) NOT NULL,
  `nombre` varchar(20) NOT NULL,
  `stock` int(3) NOT NULL,
  `descripcion` varchar(50) NOT NULL,
  `precio` int(9) NOT NULL,
  `cantidad` int(3) NOT NULL,
  `iva` int(2) NOT NULL,
  `estado` tinyint(1) NOT NULL,
  `FK_ID_TIPOINSUMO` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Log`
--

CREATE TABLE `Log` (
  `ID_LOG` int NOT NULL AUTO_INCREMENT,
  `fecha` date NOT NULL,
  `hora` varchar(5) DEFAULT NULL,
  `descripcion` varchar(50) NOT NULL,
  `FK_ID_USUARIO` int(11) NOT NULL,
  PRIMARY KEY (ID_LOG)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

-- --------------------------------------------------------
--
-- Disparadores `log`
--
DELIMITER $$
CREATE TRIGGER `logtg` BEFORE INSERT ON `Log` FOR EACH ROW SET NEW.`ID_LOG` = (
       SELECT IFNULL(MAX(ID_LOG), 0) + 1
       FROM Log
       
         
    )
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `MateriaPrima`
--

CREATE TABLE `MateriaPrima` (
  `ID_MATERIAPRIMA` int(3) NOT NULL,
  `nombre` varchar(20) NOT NULL,
  `cantidad` int(2) NOT NULL,
  `descripcion` varchar(50) NOT NULL,
  `precio` int(6) NOT NULL,
  `iva` int(2) NOT NULL,
  `stock` int(3) NOT NULL,
  `estado` tinyint(1) NOT NULL,
  `FK_ID_MEDIDACANTIDAD` int(2) NOT NULL,
  `FK_ID_TIPOMATERIAPRIMA` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `MedidaCantidad`
--

CREATE TABLE `MedidaCantidad` (
  `ID_MEDIDACANTIDAD` int(2) NOT NULL,
  `nombre` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `MedidaCantidad`
--

INSERT INTO `MedidaCantidad` (`ID_MEDIDACANTIDAD`, `nombre`) VALUES
(1,'kg'),(2,'lb'),(3,'ton'),(4,'g'),(5,'mg'),(6,'L'),(7,'mL'),(8,'oz'),(9,'galón'),(10,'cc'),(11,'Uni');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Pedido`
--

CREATE TABLE `Pedido` (
  `ID_PEDIDO` int(6) NOT NULL,
  `FK_ID_AGENDA` int(10) UNSIGNED NOT NULL,
  `plazo` int(2) NOT NULL,
  `fecha` date NOT NULL,
  `exigencia` varchar(100) NOT NULL,
  `estado` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `PEDIDO_INSUMO`
--

CREATE TABLE `PEDIDO_INSUMO` (
  `ID_PEDIDO_INSUMO` int(3) NOT NULL AUTO_INCREMENT,
  `FK_ID_PEDIDO` int(6) NOT NULL,
  `FK_ID_INSUMO` int(3) NOT NULL,
  `precio` varchar(9) NOT NULL,
  `unidades` int(3) NOT NULL,
  `cancelado` tinyint(1) NOT NULL,
  PRIMARY KEY (ID_PEDIDO_INSUMO,FK_ID_PEDIDO,FK_ID_INSUMO)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `PEDIDO_MATERIAPRIMA`
--

CREATE TABLE `PEDIDO_MATERIAPRIMA` (
  `FK_ID_PEDIDO` int(6) NOT NULL,
  `FK_ID_MATERIAPRIMA` int(3) NOT NULL,
  `precio` varchar(6) NOT NULL,
  `unidades` int(3) NOT NULL,
  `cancelado` tinyint(1) NOT NULL,
  `FK_ID_DEVOLUCION` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `PEDIDO_PROVEEDOR`
--

CREATE TABLE `PEDIDO_PROVEEDOR` (
  `FK_ID_PEDIDO` int(6) NOT NULL,
  `FK_ID_PROVEEDOR` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Produccion`
--

CREATE TABLE `Produccion` (
  `ID_PRODUCCION` int(7) NOT NULL,
  `FK_ID_AGENDA` int(10) UNSIGNED NOT NULL,
  `fechaProduccion` date NOT NULL,
  `unidades` int(3) NOT NULL,
  `cantidadInicial` int(2) NOT NULL,
  `FK_ID_CATPRODUCTO` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------
--
-- Disparadores `produccion`
--
DELIMITER $$
CREATE TRIGGER `prtg` BEFORE INSERT ON `produccion` FOR EACH ROW SET NEW.`ID_PRODUCCION` = (
       SELECT IFNULL(MAX(ID_PRODUCCION), 0) + 1
       FROM produccion
       
         
    )
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Proveedor`
--

CREATE TABLE `Proveedor` (
  `ID_PROVEEDOR` int(3) NOT NULL,
  `prNombre` varchar(10) NOT NULL,
  `segNombre` varchar(10) NOT NULL,
  `prApellido` varchar(10) NOT NULL,
  `segApellido` varchar(10) NOT NULL,
  `correo` varchar(30) NOT NULL,
  `estado` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `PROVEEDOR_INSUMO`
--

CREATE TABLE `PROVEEDOR_INSUMO` (
  `FK_ID_PROVEEDOR` int(3) NOT NULL,
  `FK_ID_INSUMO` int(3) NOT NULL,
  `estado` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `PROVEEDOR_MATERIAPRIMA`
--

CREATE TABLE `PROVEEDOR_MATERIAPRIMA` (
  `FK_ID_MATERIAPRIMA` int(3) NOT NULL,
  `FK_ID_PROVEEDOR` int(3) NOT NULL,
  `estado` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `SubtipoProducto`
--

CREATE TABLE `SubtipoProducto` (
  `ID_SUBTIPOPRODUCTO` int(2) NOT NULL,
  `nombre` varchar(20) NOT NULL,
  `FK_ID_TIPOPRODUCTO` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Telefono`
--

CREATE TABLE `Telefono` (
  `FK_ID_PROVEEDOR` int(11) NOT NULL,
  `ID_TELEFONO` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `TipoInsumo`
--

CREATE TABLE `TipoInsumo` (
  `ID_TIPOINSUMO` int(2) NOT NULL,
  `nombre` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `TipoMateriaPrima`
--

CREATE TABLE `TipoMateriaPrima` (
  `ID_TIPOMATERIAPRIMA` int(2) NOT NULL,
  `nombre` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `TipoProducto`
--

CREATE TABLE `TipoProducto` (
  `ID_TIPOPRODUCTO` int(2) NOT NULL,
  `nombre` varchar(16) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `TipoProducto`
--

INSERT INTO `TipoProducto` (`ID_TIPOPRODUCTO`, `nombre`) VALUES
(1,'Panaderia'),(2,'Cafetería'),(3,'Pastelería'),(4,'Chocolate y Bombones'),(5,'Dulces y Caramelos'),(6,'Bolleria salada'),(7,'Bolleria dulce');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Usuario`
--

CREATE TABLE `Usuario` (
  `ID_USUARIO` int(11) NOT NULL,
  `prNombre` varchar(10) NOT NULL,
  `prApellido` varchar(10) NOT NULL,
  `contrasena` varchar(25) NOT NULL,
  `rol` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Venta`
--

CREATE TABLE `Venta` (
  `ID_VENTA` int(7) NOT NULL,
  `fecha` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `VENTA_PRODUCCION`
--

CREATE TABLE `VENTA_PRODUCCION` (
  `FK_ID_PRODUCCION` int(7) NOT NULL,
  `FK_ID_VENTA` int(7) NOT NULL,
  `cantidad` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `Bodega`
--
ALTER TABLE `Bodega`
  ADD PRIMARY KEY (`ID_BODEGA`);

--
-- Indices de la tabla `Bodega`
--
ALTER TABLE `Agenda`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `BODEGA_INSUMO`
--
ALTER TABLE `BODEGA_INSUMO`
  ADD PRIMARY KEY (`FK_ID_BODEGA`,`FK_ID_INSUMO`),
  ADD KEY `FK_ID_INSUMO_BODEGA_INSUMO` (`FK_ID_INSUMO`),
  ADD KEY `FK_ID_BODEGA_BODEGA_INSUMO` (`FK_ID_BODEGA`);

--
-- Indices de la tabla `BODEGA_MATERIAPRIMA`
--
ALTER TABLE `BODEGA_MATERIAPRIMA`
  ADD PRIMARY KEY (`FK_ID_BODEGA`,`FK_ID_MATERIAPRIMA`,`FK_ID_AGENDA`),
  ADD KEY `FK_ID_MATERIAPRIMA_BODEGA_MATERIAPRIMA` (`FK_ID_MATERIAPRIMA`),
  ADD KEY `FK_ID_AGENDA_BODEGA_MATERIAPRIMA` (`FK_ID_AGENDA`),
  ADD KEY `FK_ID_BODEGA_BODEGA_MATERIAPRIMA` (`FK_ID_BODEGA`);

--
-- Indices de la tabla `CatProducto`
--
ALTER TABLE `CatProducto`
  ADD PRIMARY KEY (`ID_CATPRODUCTO`),
  ADD KEY `FK_ID_SUBTIPOPRODUCTO_CATPRODUCTO` (`FK_ID_SUBTIPOPRODUCTO`);

--
-- Indices de la tabla `Devolucion`
--
ALTER TABLE `Devolucion`
  ADD PRIMARY KEY (`ID_DEVOLUCION`);

--
-- Indices de la tabla `Factura`
--
ALTER TABLE `Factura`
  ADD PRIMARY KEY (`ID_FACTURA`),
  ADD KEY `FK_ID_PEDIDO_FACTURA` (`FK_ID_PEDIDO`);

--
-- Indices de la tabla `Insumo`
--
ALTER TABLE `Insumo`
  ADD PRIMARY KEY (`ID_INSUMO`),
  ADD KEY `FK_ID_TIPOINSUMO_INSUMO` (`FK_ID_TIPOINSUMO`);

--
-- Indices de la tabla `Log`
--
ALTER TABLE `Log`
  ADD KEY `FK_ID_USUARIO_LOG` (`FK_ID_USUARIO`);

--
-- Indices de la tabla `MateriaPrima`
--
ALTER TABLE `MateriaPrima`
  ADD PRIMARY KEY (`ID_MATERIAPRIMA`),
  ADD KEY `FK_ID_TIPOMATERIAPRIMA_MateriaPrima` (`FK_ID_TIPOMATERIAPRIMA`),
  ADD KEY `FK_ID_MEDIDACANTIDAD_MateriaPrima` (`FK_ID_MEDIDACANTIDAD`);

--
-- Indices de la tabla `MedidaCantidad`
--
ALTER TABLE `MedidaCantidad`
  ADD PRIMARY KEY (`ID_MEDIDACANTIDAD`);

--
-- Indices de la tabla `Pedido`
--
ALTER TABLE `Pedido`
  ADD PRIMARY KEY (`ID_PEDIDO`,`FK_ID_AGENDA`),
  ADD KEY `FK_ID_AGENDA_PEDIDO` (`FK_ID_AGENDA`);

--
-- Indices de la tabla `PEDIDO_INSUMO`
--
ALTER TABLE `PEDIDO_INSUMO`
  ADD KEY `FK_ID_INSUMO_PEDIDO_INSUMO` (`FK_ID_INSUMO`),
  ADD KEY `FK_ID_PEDIDO_PEDIDO_INSUMO` (`FK_ID_PEDIDO`);

--
-- Indices de la tabla `PEDIDO_MATERIAPRIMA`
--
ALTER TABLE `PEDIDO_MATERIAPRIMA`
  ADD PRIMARY KEY (`FK_ID_PEDIDO`,`FK_ID_MATERIAPRIMA`),
  ADD KEY `FK_ID_MATERIAPRIMA_PEDIDO_MATERIAPRIMA` (`FK_ID_MATERIAPRIMA`),
  ADD KEY `FK_ID_PEDIDO_PEDIDO_MATERIAPRIMA` (`FK_ID_PEDIDO`),
  ADD KEY `FK_ID_DEVOLUCION_PEDIDO_MATERIAPRIMA` (`FK_ID_DEVOLUCION`);

--
-- Indices de la tabla `PEDIDO_PROVEEDOR`
--
ALTER TABLE `PEDIDO_PROVEEDOR`
  ADD PRIMARY KEY (`FK_ID_PEDIDO`,`FK_ID_PROVEEDOR`),
  ADD KEY `FK_ID_PROVEEDOR_PEDIDO_PROVEEDOR` (`FK_ID_PROVEEDOR`),
  ADD KEY `FK_ID_PEDIDO_PEDIDO_PROVEEDOR` (`FK_ID_PEDIDO`);

--
-- Indices de la tabla `Produccion`
--
ALTER TABLE `Produccion`
  ADD PRIMARY KEY (`ID_PRODUCCION`,`FK_ID_AGENDA`),
  ADD KEY `FK_ID_AGENDA_PRODUCCION` (`FK_ID_AGENDA`),
  ADD KEY `FK_ID_CATPRODUCTO_PRODUCCION` (`FK_ID_CATPRODUCTO`);

--
-- Indices de la tabla `Proveedor`
--
ALTER TABLE `Proveedor`
  ADD PRIMARY KEY (`ID_PROVEEDOR`);

--
-- Indices de la tabla `PROVEEDOR_INSUMO`
--
ALTER TABLE `PROVEEDOR_INSUMO`
  ADD PRIMARY KEY (`FK_ID_PROVEEDOR`,`FK_ID_INSUMO`),
  ADD KEY `FK_ID_INSUMO_PROVEEDOR_INSUMO` (`FK_ID_INSUMO`),
  ADD KEY `FK_ID_PROVEEDOR_PROVEEDOR_INSUMO` (`FK_ID_PROVEEDOR`);

--
-- Indices de la tabla `PROVEEDOR_MATERIAPRIMA`
--
ALTER TABLE `PROVEEDOR_MATERIAPRIMA`
  ADD PRIMARY KEY (`FK_ID_MATERIAPRIMA`,`FK_ID_PROVEEDOR`),
  ADD KEY `FK_ID_PROVEEDOR_PROVEEDOR_MATERIAPRIMA` (`FK_ID_PROVEEDOR`),
  ADD KEY `FK_ID_MATERIAPRIMA_PROVEEDOR_MATERIAPRIMA` (`FK_ID_MATERIAPRIMA`);

--
-- Indices de la tabla `SubtipoProducto`
--
ALTER TABLE `SubtipoProducto`
  ADD PRIMARY KEY (`ID_SUBTIPOPRODUCTO`),
  ADD KEY `FK_ID_TIPOPRODUCTO_SUBTIPOPRODUCTO` (`FK_ID_TIPOPRODUCTO`);

--
-- Indices de la tabla `Telefono`
--
ALTER TABLE `Telefono`
  ADD PRIMARY KEY (`FK_ID_PROVEEDOR`,`ID_TELEFONO`),
  ADD KEY `FK_ID_PROVEEDOR_TELEFONO` (`FK_ID_PROVEEDOR`);

--
-- Indices de la tabla `TipoInsumo`
--
ALTER TABLE `TipoInsumo`
  ADD PRIMARY KEY (`ID_TIPOINSUMO`);

--
-- Indices de la tabla `TipoMateriaPrima`
--
ALTER TABLE `TipoMateriaPrima`
  ADD PRIMARY KEY (`ID_TIPOMATERIAPRIMA`);

--
-- Indices de la tabla `TipoProducto`
--
ALTER TABLE `TipoProducto`
  ADD PRIMARY KEY (`ID_TIPOPRODUCTO`);

--
-- Indices de la tabla `Usuario`
--
ALTER TABLE `Usuario`
  ADD PRIMARY KEY (`ID_USUARIO`);

--
-- Indices de la tabla `Venta`
--
ALTER TABLE `Venta`
  ADD PRIMARY KEY (`ID_VENTA`);

--
-- Indices de la tabla `VENTA_PRODUCCION`
--
ALTER TABLE `VENTA_PRODUCCION`
  ADD PRIMARY KEY (`FK_ID_PRODUCCION`,`FK_ID_VENTA`),
  ADD KEY `FK_ID_VENTA_VENTA` (`FK_ID_VENTA`),
  ADD KEY `FK_ID_PRODUCCION_VENTA` (`FK_ID_PRODUCCION`);

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `BODEGA_INSUMO`
--
ALTER TABLE `BODEGA_INSUMO`
  ADD CONSTRAINT `FK_ID_BODEGA_BODEGA_INSUMO` FOREIGN KEY (`FK_ID_BODEGA`) REFERENCES `Bodega` (`ID_BODEGA`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_ID_INSUMO_BODEGA_INSUMO` FOREIGN KEY (`FK_ID_INSUMO`) REFERENCES `Insumo` (`ID_INSUMO`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `BODEGA_MATERIAPRIMA`
--
ALTER TABLE `BODEGA_MATERIAPRIMA`
  ADD CONSTRAINT `FK_ID_BODEGA_BODEGA_MATERIAPRIMA` FOREIGN KEY (`FK_ID_BODEGA`) REFERENCES `Bodega` (`ID_BODEGA`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_ID_AGENDA_BODEGA_MATERIAPRIMA` FOREIGN KEY (`FK_ID_AGENDA`) REFERENCES `Agenda` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_ID_MATERIAPRIMA_BODEGA_MATERIAPRIMA` FOREIGN KEY (`FK_ID_MATERIAPRIMA`) REFERENCES `MateriaPrima` (`ID_MATERIAPRIMA`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `CatProducto`
--
ALTER TABLE `CatProducto`
  ADD CONSTRAINT `FK_ID_SUBTIPOPRODUCTO_CATPRODUCTO` FOREIGN KEY (`FK_ID_SUBTIPOPRODUCTO`) REFERENCES `SubtipoProducto` (`ID_SUBTIPOPRODUCTO`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `Devolucion`
--
ALTER TABLE `PEDIDO_MATERIAPRIMA`
  ADD CONSTRAINT `FK_ID_DEVOLUCION_PEDIDO_MATERIAPRIMA` FOREIGN KEY (`FK_ID_DEVOLUCION`) REFERENCES `Devolucion` (`ID_DEVOLUCION`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `Factura`
--
ALTER TABLE `Factura`
  ADD CONSTRAINT `FK_ID_PEDIDO_FACTURA` FOREIGN KEY (`FK_ID_PEDIDO`) REFERENCES `Pedido` (`ID_PEDIDO`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `Insumo`
--
ALTER TABLE `Insumo`
  ADD CONSTRAINT `FK_ID_TIPOINSUMO_INSUMO` FOREIGN KEY (`FK_ID_TIPOINSUMO`) REFERENCES `TipoInsumo` (`ID_TIPOINSUMO`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `Log`
--
ALTER TABLE `Log`
  ADD CONSTRAINT `FK_ID_USUARIO_LOG` FOREIGN KEY (`FK_ID_USUARIO`) REFERENCES `Usuario` (`ID_USUARIO`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `MateriaPrima`
--
ALTER TABLE `MateriaPrima`
  ADD CONSTRAINT `FK_ID_MEDIDACANTIDAD_MateriaPrima` FOREIGN KEY (`FK_ID_MEDIDACANTIDAD`) REFERENCES `MedidaCantidad` (`ID_MEDIDACANTIDAD`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_ID_TIPOMATERIAPRIMA_MateriaPrima` FOREIGN KEY (`FK_ID_TIPOMATERIAPRIMA`) REFERENCES `TipoMateriaPrima` (`ID_TIPOMATERIAPRIMA`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `Pedido`
--
ALTER TABLE `Pedido`
  ADD CONSTRAINT `FK_ID_AGENDA_PEDIDO` FOREIGN KEY (`FK_ID_AGENDA`) REFERENCES `Agenda` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `PEDIDO_INSUMO`
--
ALTER TABLE `PEDIDO_INSUMO`
  ADD CONSTRAINT `FK_ID_INSUMO_PEDIDO_INSUMO` FOREIGN KEY (`FK_ID_INSUMO`) REFERENCES `Insumo` (`ID_INSUMO`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_ID_PEDIDO_PEDIDO_INSUMO` FOREIGN KEY (`FK_ID_PEDIDO`) REFERENCES `Pedido` (`ID_PEDIDO`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `PEDIDO_MATERIAPRIMA`
--
ALTER TABLE `PEDIDO_MATERIAPRIMA`
  ADD CONSTRAINT `FK_ID_MATERIAPRIMA_PEDIDO_MATERIAPRIMA` FOREIGN KEY (`FK_ID_MATERIAPRIMA`) REFERENCES `MateriaPrima` (`ID_MATERIAPRIMA`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_ID_PEDIDO_PEDIDO_MATERIAPRIMA` FOREIGN KEY (`FK_ID_PEDIDO`) REFERENCES `Pedido` (`ID_PEDIDO`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `PEDIDO_PROVEEDOR`
--
ALTER TABLE `PEDIDO_PROVEEDOR`
  ADD CONSTRAINT `FK_ID_PEDIDO_PEDIDO_PROVEEDOR` FOREIGN KEY (`FK_ID_PEDIDO`) REFERENCES `Pedido` (`ID_PEDIDO`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_ID_PROVEEDOR_PEDIDO_PROVEEDOR` FOREIGN KEY (`FK_ID_PROVEEDOR`) REFERENCES `Proveedor` (`ID_PROVEEDOR`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `Produccion`
--
ALTER TABLE `Produccion`
  ADD CONSTRAINT `FK_ID_AGENDA_PRODUCCION` FOREIGN KEY (`FK_ID_AGENDA`) REFERENCES `Agenda` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_ID_CATPRODUCTO_PRODUCCION` FOREIGN KEY (`FK_ID_CATPRODUCTO`) REFERENCES `CatProducto` (`ID_CATPRODUCTO`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `PROVEEDOR_INSUMO`
--
ALTER TABLE `PROVEEDOR_INSUMO`
  ADD CONSTRAINT `FK_ID_INSUMO_PROVEEDOR_INSUMO` FOREIGN KEY (`FK_ID_INSUMO`) REFERENCES `Insumo` (`ID_INSUMO`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_ID_PROVEEDOR_PROVEEDOR_INSUMO` FOREIGN KEY (`FK_ID_PROVEEDOR`) REFERENCES `Proveedor` (`ID_PROVEEDOR`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `PROVEEDOR_MATERIAPRIMA`
--
ALTER TABLE `PROVEEDOR_MATERIAPRIMA`
  ADD CONSTRAINT `FK_ID_MATERIAPRIMA_PROVEEDOR_MATERIAPRIMA` FOREIGN KEY (`FK_ID_MATERIAPRIMA`) REFERENCES `MateriaPrima` (`ID_MATERIAPRIMA`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_ID_PROVEEDOR_PROVEEDOR_MATERIAPRIMA` FOREIGN KEY (`FK_ID_PROVEEDOR`) REFERENCES `Proveedor` (`ID_PROVEEDOR`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `SubtipoProducto`
--
ALTER TABLE `SubtipoProducto`
  ADD CONSTRAINT `FK_ID_TIPOPRODUCTO_SUBTIPOPRODUCTO` FOREIGN KEY (`FK_ID_TIPOPRODUCTO`) REFERENCES `TipoProducto` (`ID_TIPOPRODUCTO`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `Telefono`
--
ALTER TABLE `Telefono`
  ADD CONSTRAINT `FK_ID_PROVEEDOR_TELEFONO` FOREIGN KEY (`FK_ID_PROVEEDOR`) REFERENCES `Proveedor` (`ID_PROVEEDOR`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `VENTA_PRODUCCION`
--
ALTER TABLE `VENTA_PRODUCCION`
  ADD CONSTRAINT `FK_ID_PRODUCCION_VENTA_PRODUCCION` FOREIGN KEY (`FK_ID_PRODUCCION`) REFERENCES `Produccion` (`ID_PRODUCCION`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_ID_VENTA_VENTA` FOREIGN KEY (`FK_ID_VENTA`) REFERENCES `Venta` (`ID_VENTA`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
