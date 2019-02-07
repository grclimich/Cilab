-- phpMyAdmin SQL Dump
-- version 3.4.5
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 28-11-2013 a las 21:00:39
-- Versión del servidor: 5.5.16
-- Versión de PHP: 5.3.8

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `cilab`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `accion_entrada`
--

CREATE TABLE IF NOT EXISTS `accion_entrada` (
  `id_e` int(11) NOT NULL,
  `razon_entrada` varchar(100) NOT NULL,
  PRIMARY KEY (`id_e`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `accion_salida`
--

CREATE TABLE IF NOT EXISTS `accion_salida` (
  `id_s` int(5) NOT NULL,
  `razon_salida` varchar(100) NOT NULL,
  PRIMARY KEY (`id_s`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `entrada_insumo`
--

CREATE TABLE IF NOT EXISTS `entrada_insumo` (
  `cod_e` int(5) NOT NULL AUTO_INCREMENT,
  `accion_de_entrada` int(11) NOT NULL,
  `proveedor` varchar(30) NOT NULL,
  `fecha_e` varchar(20) NOT NULL,
  `observacion` varchar(100) NOT NULL,
  PRIMARY KEY (`cod_e`),
  KEY `accion_de_entrada` (`accion_de_entrada`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `entrada_pro`
--

CREATE TABLE IF NOT EXISTS `entrada_pro` (
  `id_entrada` int(11) NOT NULL AUTO_INCREMENT,
  `cod_e` int(11) NOT NULL,
  `cod_i` int(11) NOT NULL,
  `lote` int(11) NOT NULL,
  `cantidad_entrada` int(11) NOT NULL,
  `fecha_v` date NOT NULL,
  PRIMARY KEY (`id_entrada`),
  KEY `cod_i` (`cod_i`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `existencia`
--

CREATE TABLE IF NOT EXISTS `existencia` (
  `id_existencia` int(11) NOT NULL AUTO_INCREMENT,
  `fecha_v` varchar(20) NOT NULL,
  `lote` int(11) NOT NULL,
  `n_cantidad` int(11) NOT NULL,
  `cod_i` int(11) NOT NULL,
  `cod_e` int(11) NOT NULL,
  PRIMARY KEY (`id_existencia`),
  KEY `cod_i` (`cod_i`),
  KEY `cod_e` (`cod_e`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=28 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `insumo`
--

CREATE TABLE IF NOT EXISTS `insumo` (
  `cod_i` int(11) NOT NULL,
  `descripcion` varchar(100) NOT NULL,
  `presentacion` int(11) NOT NULL,
  `almacen` varchar(30) NOT NULL,
  `observacion` varchar(120) NOT NULL,
  `tipo_p` varchar(20) NOT NULL,
  `n_cantidad` int(11) NOT NULL,
  PRIMARY KEY (`cod_i`),
  KEY `presentacion` (`presentacion`),
  KEY `tipo_p` (`tipo_p`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `insumo`
--

INSERT INTO `insumo` (`cod_i`, `descripcion`, `presentacion`, `almacen`, `observacion`, `tipo_p`, `n_cantidad`) VALUES
(12, 'Tromboplastina pt', 1, 'Coordinación de Laboratorios', '', 'Reactivos', 0),
(11, 'Cefaloplastina ptt', 1, 'Coordinación de Laboratorios', '', 'Reactivos', 0),
(10, 'Microhematocrito s/ heparina', 4, 'Coordinación de Laboratorios', '', 'Materiales', 0),
(9, 'Microhematocrito c/ heparina', 4, 'Coordinación de Laboratorios', '', 'Materiales', 0),
(8, 'Liquido de turk', 3, 'Coordinación de Laboratorios', '', 'Materiales', 0),
(7, 'Drabkin', 3, 'Coordinación de Laboratorios', '', 'Reactivos', 0),
(6, 'Plaquetas', 2, 'Coordinación de Laboratorios', '', 'Reactivos', 0),
(5, 'Hemoclasificador anti "D"', 1, 'Coordinación de Laboratorios', '', 'Reactivos', 0),
(4, 'Hemoclasificador anti "B"', 1, 'Coordinación de Laboratorios', '', 'Reactivos', 0),
(3, 'Hemoclasificador anti "A"', 1, 'Coordinación de Laboratorios', '', 'Reactivos', 0),
(2, 'Patron hemoglowiener', 1, 'Coordinación de Laboratorios', '', 'Reactivos', 0),
(1, 'Hemoglowiener', 1, 'Coordinación de Laboratorios', '', 'Reactivos', 0),
(13, 'Cloruro de calcio', 1, 'Coordinación de Laboratorios', '', 'Reactivos', 0),
(14, 'Acido urico', 2, 'Coordinación de Laboratorios', '', 'Reactivos', 0),
(15, 'Amilasa', 2, 'Coordinación de Laboratorios', '', 'Reactivos', 0),
(16, 'Albumina', 2, 'Coordinación de Laboratorios', '', 'Reactivos', 0),
(17, 'Anticoagulante', 2, 'Coordinación de Laboratorios', '', 'Reactivos', 0),
(18, 'Bilirrubina total y directa', 2, 'Coordinación de Laboratorios', '', 'Reactivos', 0),
(19, 'Creatinina', 2, 'Coordinación de Laboratorios', '', 'Reactivos', 0),
(20, 'Colesterol', 2, 'Coordinación de Laboratorios', '', 'Reactivos', 0),
(21, 'HDL-Colesterol', 2, 'Coordinación de Laboratorios', '', 'Reactivos', 0),
(22, 'Calcio', 2, 'Coordinación de Laboratorios', '', 'Reactivos', 0),
(23, 'CK-NAC', 2, 'Coordinación de Laboratorios', '', 'Reactivos', 0),
(24, 'CK-MB', 2, 'Coordinación de Laboratorios', '', 'Reactivos', 0),
(25, 'Cloro/Cloruros', 2, 'Coordinación de Laboratorios', '', 'Reactivos', 0),
(26, 'Control normal', 1, 'Coordinación de Laboratorios', '', 'Reactivos', 0),
(27, 'Control anormal', 1, 'Coordinación de Laboratorios', '', 'Reactivos', 0),
(28, 'Fosforo', 2, 'Coordinación de Laboratorios', '', 'Reactivos', 0),
(29, 'Fosfatasa alcalina', 2, 'Coordinación de Laboratorios', '', 'Reactivos', 0),
(30, 'Glucosa / glicemia', 2, 'Coordinación de Laboratorios', '', 'Reactivos', 0),
(31, 'Hierro serico', 2, 'Coordinación de Laboratorios', '', 'Reactivos', 0),
(32, 'Magnesio', 2, 'Coordinación de Laboratorios', '', 'Reactivos', 0),
(33, 'LDH', 2, 'Coordinación de Laboratorios', '', 'Reactivos', 0),
(34, 'Proteinas totales y fraccionad', 2, 'Coordinación de Laboratorios', '', 'Reactivos', 0),
(35, 'Potasio', 2, 'Coordinación de Laboratorios', '', 'Reactivos', 0),
(36, 'Sodio', 2, 'Coordinación de Laboratorios', '', 'Reactivos', 0),
(37, 'Stardar de bilirrubina', 2, 'Coordinación de Laboratorios', '', 'Reactivos', 0),
(38, 'Transaminasa TGO (AST)', 2, 'Coordinación de Laboratorios', '', 'Reactivos', 0),
(39, 'Transaminasa TGO (ALT)', 2, 'Coordinación de Laboratorios', '', 'Reactivos', 0),
(40, 'Trigliceridos', 2, 'Coordinación de Laboratorios', '', 'Reactivos', 0),
(41, 'Transferrina (TIBC)', 2, 'Coordinación de Laboratorios', '', 'Reactivos', 0),
(42, 'Urea', 2, 'Coordinación de Laboratorios', '', 'Reactivos', 0),
(43, 'Uremia + Ureasa', 2, 'Coordinación de Laboratorios', '', 'Reactivos', 0),
(44, 'Agua destilada', 5, 'Coordinación de Laboratorios', '', 'Insumos', 0),
(45, 'Alcohol Isopropilico ', 5, 'Coordinación de Laboratorios', '', 'Insumos', 0),
(46, 'Algodon ', 6, 'Coordinación de Laboratorios', '', 'Insumos', 0),
(47, 'Aplicadores D/madera C/ algodo', 7, 'Coordinación de Laboratorios', '', 'Insumos', 0),
(48, 'Aplicadores D/madera S/ algodo', 8, 'Coordinación de Laboratorios', '', 'Insumos', 0),
(49, 'Alcohol prepad', 8, 'Coordinación de Laboratorios', '', 'Insumos', 0),
(50, 'Curitas redondas', 8, 'Coordinación de Laboratorios', '', 'Insumos', 0),
(51, 'Gasa quirurgica', 7, 'Coordinación de Laboratorios', '', 'Insumos', 0),
(52, 'Guantes talla S', 8, 'Coordinación de Laboratorios', '', 'Insumos', 0),
(53, 'Guantes talla M', 8, 'Coordinación de Laboratorios', '', 'Insumos', 0),
(54, 'Guantes talla L', 8, 'Coordinación de Laboratorios', '', 'Insumos', 0),
(55, 'Inyectadora de 10cc', 8, 'Coordinación de Laboratorios', '', 'Insumos', 0),
(56, 'Inyectadora de 5cc', 8, 'Coordinación de Laboratorios', '', 'Insumos', 0),
(57, 'Inyectadora de 3cc', 8, 'Coordinación de Laboratorios', '', 'Insumos', 0),
(58, 'Jabon P/vidriera', 5, 'Coordinación de Laboratorios', '', 'Insumos', 0),
(59, 'Mascarilla quirurgica', 8, 'Coordinación de Laboratorios', '', 'Insumos', 0),
(60, 'Mechero de alcohol', 9, 'Coordinación de Laboratorios', '', 'Insumos', 0),
(61, 'Pipetas automaticas 100/1000 U/L', 9, 'Coordinación de Laboratorios', '', 'Insumos', 0),
(62, 'Scalp Nº23', 8, 'Coordinación de Laboratorios', '', 'Insumos', 0),
(63, 'Diluente MINDRAY', 8, 'Coordinación de Laboratorios', '', 'Reactivos', 0),
(64, 'Detergente MINDRAY', 8, 'Coordinación de Laboratorios', '', 'Reactivos', 0),
(65, 'Lisante MINDRAY', 4, 'Coordinación de Laboratorios', '', 'Reactivos', 0),
(66, 'Cleaner MINDRAY', 4, 'Coordinación de Laboratorios', '', 'Reactivos', 0),
(67, 'Diluente CELLDYN', 8, 'Coordinación de Laboratorios', '', 'Reactivos', 0),
(68, 'Detergente CELLDYN', 8, 'Coordinación de Laboratorios', '', 'Reactivos', 0),
(69, 'Lisante CELLDYN', 8, 'Coordinación de Laboratorios', '', 'Reactivos', 0),
(70, 'Papel tornasol', 1, 'Coordinación de Laboratorios', '', 'Reactivos', 0),
(71, 'Papel PH', 1, 'Coordinación de Laboratorios', '', 'Reactivos', 0),
(72, 'Proti U/L', 2, 'Coordinación de Laboratorios', '', 'Reactivos', 0),
(73, 'Tiras reactivas para Orina', 4, 'Coordinación de Laboratorios', '', 'Reactivos', 0),
(74, 'Gasa precortada', 8, 'Coordinación de Laboratorios', '', 'Materiales', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `laboratorio_receptor`
--

CREATE TABLE IF NOT EXISTS `laboratorio_receptor` (
  `cod_r` int(11) NOT NULL,
  `nombre_2` varchar(100) NOT NULL,
  `direccion` varchar(100) DEFAULT NULL,
  `telefono` varchar(12) NOT NULL,
  `nro_fax` varchar(12) NOT NULL,
  `nro_rif` varchar(30) NOT NULL,
  `municipio` varchar(35) NOT NULL,
  PRIMARY KEY (`cod_r`),
  KEY `id_m` (`municipio`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `municipio`
--

CREATE TABLE IF NOT EXISTS `municipio` (
  `id_m` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_municipio` varchar(100) NOT NULL,
  PRIMARY KEY (`id_m`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `perfl`
--

CREATE TABLE IF NOT EXISTS `perfl` (
  `id_perfil` int(11) NOT NULL,
  `nombre_perfil` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id_perfil`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `perfl`
--

INSERT INTO `perfl` (`id_perfil`, `nombre_perfil`) VALUES
(1, 'Administrador'),
(2, 'Usuario');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `presentacion`
--

CREATE TABLE IF NOT EXISTS `presentacion` (
  `cod_presentacion` int(11) NOT NULL,
  `clase_presentacion` varchar(100) NOT NULL,
  PRIMARY KEY (`cod_presentacion`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `presentacion`
--

INSERT INTO `presentacion` (`cod_presentacion`, `clase_presentacion`) VALUES
(6, 'ROLLO'),
(5, 'GALON'),
(4, 'FRASCO'),
(3, 'LITRO'),
(2, 'KIT'),
(1, 'VIAL'),
(7, 'PAQUETE'),
(8, 'CAJA'),
(9, 'UNIDAD');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `salida_insumo`
--

CREATE TABLE IF NOT EXISTS `salida_insumo` (
  `cod_s` int(5) NOT NULL,
  `accion_de_salida` int(11) NOT NULL,
  `cod_r` int(11) NOT NULL,
  `fecha_s` date NOT NULL,
  `observaciones` varchar(100) NOT NULL,
  `nro_solicitud` int(11) NOT NULL,
  PRIMARY KEY (`cod_s`),
  KEY `accion_de_salida` (`accion_de_salida`),
  KEY `cod_r` (`cod_r`),
  KEY `nro_solicitud` (`nro_solicitud`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sali_pro`
--

CREATE TABLE IF NOT EXISTS `sali_pro` (
  `id_sapi` int(11) NOT NULL AUTO_INCREMENT,
  `cod_i` int(11) NOT NULL,
  `cod_s` int(11) NOT NULL,
  `cantidad_salida` int(11) NOT NULL,
  PRIMARY KEY (`id_sapi`),
  KEY `cod_s` (`cod_s`),
  KEY `cod_i` (`cod_i`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `solicitud`
--

CREATE TABLE IF NOT EXISTS `solicitud` (
  `nro_solicitud` int(11) NOT NULL,
  `fecha_solicitud` varchar(20) NOT NULL,
  `cod_r` int(11) NOT NULL,
  `status` varchar(100) NOT NULL,
  PRIMARY KEY (`nro_solicitud`),
  KEY `cod_r` (`cod_r`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `soli_pro`
--

CREATE TABLE IF NOT EXISTS `soli_pro` (
  `cod_i` int(11) NOT NULL,
  `nro_solicitud` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `id_sp` int(11) NOT NULL AUTO_INCREMENT,
  `status` varchar(20) NOT NULL DEFAULT '',
  PRIMARY KEY (`id_sp`),
  KEY `nro_solicitud` (`nro_solicitud`),
  KEY `cod_i` (`cod_i`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=56 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE IF NOT EXISTS `usuario` (
  `id_usuario` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_usuario` varchar(20) NOT NULL,
  `pass` varchar(20) NOT NULL,
  `id_perfil` int(11) NOT NULL,
  PRIMARY KEY (`id_usuario`),
  KEY `id_perfil` (`id_perfil`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id_usuario`, `nombre_usuario`, `pass`, `id_perfil`) VALUES
(5, 'administrador', 'per2013', 1);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
