-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 15-03-2020 a las 21:19:44
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
-- Base de datos: `panaderia`
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
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE `clientes` (
  `ced_cl` varchar(10) COLLATE utf8_spanish_ci NOT NULL,
  `nom_cl` varchar(10) COLLATE utf8_spanish_ci NOT NULL,
  `des_cl` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `dir_cl` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `a1_cl` varchar(9) COLLATE utf8_spanish_ci NOT NULL,
  `a2_cl` varchar(9) COLLATE utf8_spanish_ci NOT NULL,
  `est_cl` varchar(1) COLLATE utf8_spanish_ci NOT NULL,
  `pas_cl` varchar(10) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`ced_cl`, `nom_cl`, `des_cl`, `dir_cl`, `a1_cl`, `a2_cl`, `est_cl`, `pas_cl`) VALUES
('10986', 'hj', 'jkln', 'jkl', 'jk', 'jkl', '1', 'pass'),
('1098765456', 'Juan', 'Ninguna', 'alguna', 'Algo', 'Nada', '1', '12345678'),
('12', 'Jose', 'hjk', '40, Porta Bello, La Vuelta, FusagasugÃ¡, Cundinama', 'jose', 'Hernandez', '1', '123'),
('1234', 'jkl', 'uh', 'hk', 'hjk', 'bkj', '1', 'pass'),
('12345', 'jkl', 'uh', 'hk', 'hjk', 'bkj', '1', 'pass'),
('123456', 'jkl', 'uh', 'hk', 'hjk', 'bkj', '1', 'pass'),
('15', 'Jose', 'Chonchitos', '40, Porta Bello, La Vuelta, FusagasugÃ¡, Cundinama', 'jose', 'Hernandez', '1', '12'),
('2113', 'dsafd', 'dsa', 'fsa', 'asdf', 'saf', '1', '1234'),
('78', 'Jose', 'Chonchitos', '40, Porta Bello, La Vuelta', 'jose', 'Hernandez', '1', '12');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `contratos`
--

CREATE TABLE `contratos` (
  `cod_con` varchar(4) COLLATE utf8_spanish_ci NOT NULL,
  `tip_con` varchar(6) COLLATE utf8_spanish_ci NOT NULL,
  `id_ped` int(3) NOT NULL,
  `fec_ent` varchar(10) COLLATE utf8_spanish_ci NOT NULL,
  `hor_ent` varchar(5) COLLATE utf8_spanish_ci NOT NULL,
  `id_cl` varchar(15) COLLATE utf8_spanish_ci NOT NULL,
  `est_con` varchar(1) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `contratos`
--

INSERT INTO `contratos` (`cod_con`, `tip_con`, `id_ped`, `fec_ent`, `hor_ent`, `id_cl`, `est_con`) VALUES
('32', 'Mes', 6, '763', '12', '2', '1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `devolucion`
--

CREATE TABLE `devolucion` (
  `cod_dev` varchar(10) COLLATE utf8_spanish_ci NOT NULL,
  `cod_con` int(3) NOT NULL,
  `can_dev` varchar(4) COLLATE utf8_spanish_ci NOT NULL,
  `des_dev` varchar(40) COLLATE utf8_spanish_ci NOT NULL,
  `fec_dev` varchar(11) COLLATE utf8_spanish_ci NOT NULL,
  `est_dev` varchar(1) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `devolucion`
--

INSERT INTO `devolucion` (`cod_dev`, `cod_con`, `can_dev`, `des_dev`, `fec_dev`, `est_dev`) VALUES
('444', 1, '78', 'ñk', '10/30/2019', '1'),
('9', 1, '78', 'klS', '10/31/2019', '1'),
('90', 1, '78', 'klS', '10/31/2019', '1'),
('99', 1, '78', 'klS', '10/31/2019', '1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `lote`
--

CREATE TABLE `lote` (
  `id_lot` varchar(11) COLLATE utf8_spanish_ci NOT NULL,
  `fec` varchar(10) COLLATE utf8_spanish_ci NOT NULL,
  `cod_pro` varchar(3) COLLATE utf8_spanish_ci NOT NULL,
  `st_prn` smallint(6) NOT NULL DEFAULT 1,
  `est_lot` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci ROW_FORMAT=REDUNDANT;

--
-- Volcado de datos para la tabla `lote`
--

INSERT INTO `lote` (`id_lot`, `fec`, `cod_pro`, `st_prn`, `est_lot`) VALUES
('1', '2019-09-07', '68', 12, 1),
('1', '2019-10-01', '1', 100, 1),
('1', '2019-10-03', '68', 12, 1),
('1', '2019-10-17', '12', 12, 1),
('1', '2019-10-21', '15', 2, 1),
('1', '2019-10-22', '1', 12, 1),
('1', '2019-10-29', '1', 20, 1),
('1', '2019-10-30', '67', 12, 1),
('1', '2019-11-12', '12', 12, 1),
('1', '2019-11-14', '15', 80, 1),
('1', '2019-11-20', '1', 12, 1),
('1', '2019-11-21', '1', 90, 1),
('1', '2019-11-22', '1', 2, 1),
('1', '2019-11-30', '92', 12, 1),
('2', '2019-10-03', '68', 12, 1),
('2', '2019-10-21', '15', 2, 1),
('2', '2019-10-29', '1', 11, 1),
('2', '2019-10-30', '67', 2, 1),
('2', '2019-11-20', '1', 80, 1),
('2', '2019-11-30', '92', 12, 1),
('3', '2019-10-29', '2', 453, 1),
('3', '2019-10-30', '68', 20, 1),
('4', '2019-10-29', '1', 12, 1),
('4', '2019-10-30', '67', 12, 1);

--
-- Disparadores `lote`
--
DELIMITER $$
CREATE TRIGGER `cambialote` BEFORE INSERT ON `lote` FOR EACH ROW BEGIN
    SET NEW.`id_lot` = (
       SELECT IFNULL(MAX(id_lot), 0) + 1
       FROM lote
       WHERE `fec`  = NEW.fec
         
    );
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedidos`
--

CREATE TABLE `pedidos` (
  `Id_ped` int(3) NOT NULL,
  `Fec_ped` varchar(15) COLLATE utf8_spanish_ci NOT NULL,
  `can_ped` int(11) NOT NULL,
  `dir_ped` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `des_ped` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `cod_pro` varchar(3) COLLATE utf8_spanish_ci NOT NULL,
  `ced_cl` varchar(10) COLLATE utf8_spanish_ci NOT NULL,
  `est_ped` varchar(1) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `pedidos`
--

INSERT INTO `pedidos` (`Id_ped`, `Fec_ped`, `can_ped`, `dir_ped`, `des_ped`, `cod_pro`, `ced_cl`, `est_ped`) VALUES
(1, '10/29/2019', 78, '40, Porta Bello, La ', 'jk', '67', '15', '1'),
(2, '11/01/2019', 12, 'hk', 'xz', '12', '12345', '1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `cod_pro` varchar(3) COLLATE utf8_spanish_ci NOT NULL,
  `nom_pro` varchar(15) COLLATE utf8_spanish_ci NOT NULL,
  `can_pro` int(11) NOT NULL,
  `cat_pro` varchar(11) COLLATE utf8_spanish_ci NOT NULL,
  `des_pro` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `pre_pro` int(11) NOT NULL,
  `sab_pro` varchar(10) COLLATE utf8_spanish_ci NOT NULL,
  `img_pro` varchar(200) COLLATE utf8_spanish_ci NOT NULL,
  `est_pro` varchar(8) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`cod_pro`, `nom_pro`, `can_pro`, `cat_pro`, `des_pro`, `pre_pro`, `sab_pro`, `img_pro`, `est_pro`) VALUES
('1', 'Pan galleta', 97, 'Pasteleria', 'Pan blando y economico', 500, 'dulce', 'fotos/PAN-GALLETA-1.jpg', '1'),
('12', 'Rollo', 200, 'Pasteleria', 'Pan blando y economico', 200, 'salado', 'fotos/1.jpg', '1'),
('13', 'Alineado', 200, 'Pasteleria', 'Pan blando y economico', 200, 'salado', 'fotos/2.jpg', '1'),
('15', 'Liso', 300, 'Panaderia', 'Pan blando y economico', 200, 'salado', 'fotos/3.jpg', '1'),
('2', 'Pistacho', 600, 'Panaderia', 'Donas glaceadas', 800, 'dulce', 'fotos/4.jpg', '1'),
('4', 'Torta', 1000, 'tortas', 'Torta dulce', 1200, 'tortas', 'fotos/5.jpg', '1'),
('45', 'Roscon', 300, 'Panaderia', 'Pan blando y economico', 400, 'dulce', 'fotos/6.jpg', '1'),
('50', 'Dona', 444, 'Panaderia', 'Pan blando y economico', 1200, 'postres', 'fotos/7.jpg', '1'),
('67', 'Dona', 233, 'Panaderia', 'Pan blando y economico', 550, 'salado', 'fotos/8.jpg', '1'),
('68', 'Pera', 234, 'Panaderia', 'Pan blando y economico', 500, 'dulce', 'fotos/9.jpg', '1'),
('92', 'Brazo de reina', 300, 'Postres', 'Brazo de reina blanco', 700, 'dulce', 'fotos/brazo-de-reina-1-FP.jpg', '1'),
('98', 'Nevado', 0, 'Pasteleria', '123', 12, 'Salado', 'fotos/nevado.jpg', '1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `telcl`
--

CREATE TABLE `telcl` (
  `ced_cl` varchar(10) COLLATE utf8_spanish_ci NOT NULL,
  `tel_cl` varchar(10) CHARACTER SET utf8 COLLATE utf8_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `telcl`
--

INSERT INTO `telcl` (`ced_cl`, `tel_cl`) VALUES
('10986', '890'),
('12', '313245678'),
('1234', '9088'),
('12345', '9088'),
('123456', '9088'),
('15', '312678907'),
('2113', '21321'),
('78', '312678907');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `agenda`
--
ALTER TABLE `agenda`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `inicio_normal` (`inicio_normal`),
  ADD UNIQUE KEY `final_normal` (`final_normal`);

--
-- Indices de la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`ced_cl`);

--
-- Indices de la tabla `contratos`
--
ALTER TABLE `contratos`
  ADD PRIMARY KEY (`cod_con`),
  ADD KEY `id_ped` (`id_ped`);

--
-- Indices de la tabla `devolucion`
--
ALTER TABLE `devolucion`
  ADD PRIMARY KEY (`cod_dev`),
  ADD KEY `cod_con` (`cod_con`);

--
-- Indices de la tabla `lote`
--
ALTER TABLE `lote`
  ADD PRIMARY KEY (`id_lot`,`fec`),
  ADD KEY `cod_pro` (`cod_pro`);

--
-- Indices de la tabla `pedidos`
--
ALTER TABLE `pedidos`
  ADD PRIMARY KEY (`Id_ped`),
  ADD KEY `cod_pro` (`cod_pro`),
  ADD KEY `ced_cl` (`ced_cl`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`cod_pro`);

--
-- Indices de la tabla `telcl`
--
ALTER TABLE `telcl`
  ADD PRIMARY KEY (`ced_cl`,`tel_cl`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `agenda`
--
ALTER TABLE `agenda`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=93;

--
-- AUTO_INCREMENT de la tabla `pedidos`
--
ALTER TABLE `pedidos`
  MODIFY `Id_ped` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `devolucion`
--
ALTER TABLE `devolucion`
  ADD CONSTRAINT `devolucion_ibfk_1` FOREIGN KEY (`cod_con`) REFERENCES `pedidos` (`Id_ped`);

--
-- Filtros para la tabla `lote`
--
ALTER TABLE `lote`
  ADD CONSTRAINT `lote_ibfk_1` FOREIGN KEY (`cod_pro`) REFERENCES `productos` (`cod_pro`);

--
-- Filtros para la tabla `pedidos`
--
ALTER TABLE `pedidos`
  ADD CONSTRAINT `pedidos_ibfk_1` FOREIGN KEY (`ced_cl`) REFERENCES `clientes` (`ced_cl`),
  ADD CONSTRAINT `pedidos_ibfk_2` FOREIGN KEY (`cod_pro`) REFERENCES `productos` (`cod_pro`);

--
-- Filtros para la tabla `telcl`
--
ALTER TABLE `telcl`
  ADD CONSTRAINT `fk_1` FOREIGN KEY (`ced_cl`) REFERENCES `clientes` (`ced_cl`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
