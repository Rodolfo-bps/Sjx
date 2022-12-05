-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 05-12-2022 a las 21:05:05
-- Versión del servidor: 10.4.24-MariaDB
-- Versión de PHP: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `bsmapas`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

CREATE TABLE `categorias` (
  `id_categoria` int(11) NOT NULL,
  `nombre_categoria` varchar(250) NOT NULL,
  `color_categoria` varchar(250) NOT NULL,
  `fecha_creacion` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`id_categoria`, `nombre_categoria`, `color_categoria`, `fecha_creacion`) VALUES
(1, 'Desconocido', 'red', '2022-12-03'),
(4, 'Otro2', 'blue', '2022-12-02');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mapa`
--

CREATE TABLE `mapa` (
  `id_planta` int(11) NOT NULL,
  `localidad` varchar(200) COLLATE utf8_spanish2_ci NOT NULL,
  `direccion` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `descripcion` varchar(200) COLLATE utf8_spanish2_ci NOT NULL,
  `imagen` varchar(200) COLLATE utf8_spanish2_ci NOT NULL,
  `estado` varchar(200) COLLATE utf8_spanish2_ci NOT NULL,
  `lat` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `lng` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `categoria` varchar(250) COLLATE utf8_spanish2_ci NOT NULL,
  `fecha_registro` date NOT NULL,
  `fecha_baja` date NOT NULL,
  `fecha_actualizacion` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `mapa`
--

INSERT INTO `mapa` (`id_planta`, `localidad`, `direccion`, `descripcion`, `imagen`, `estado`, `lat`, `lng`, `categoria`, `fecha_registro`, `fecha_baja`, `fecha_actualizacion`) VALUES
(46, 'Santo Domingo Tonahuixtla', 'Abarrotes Villa Mar', 'San Jeronimow', '1667426520_1664320454_biznaga1.jpg', 'activo', '18.209906622307617', '-97.9182392320247', 'Desconocido', '0000-00-00', '2021-02-20', '2021-02-20'),
(48, 'Barranca Salda', '74957 San Jerónimo Xayacatlán, Puebla', 'Micheladas shoks', '1667952649_1366_2000.jpg', 'activo', '18.22263778714631', '-97.94708464841214', 'Desconocido', '0000-00-00', '0000-00-00', '2022-12-05'),
(49, 'Barranca Salda', 'PUE 455, 74957 Acatlán, Pue.', 'Carnitas De Puerco/Taco', '1667952715_1664926341_0002.jpg', 'inactivo', '18.226021089692765', '-97.93429587596268', 'Otro2', '0000-00-00', '2022-12-05', '2022-12-05');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reporteindice`
--

CREATE TABLE `reporteindice` (
  `id_mayor_indice` int(11) NOT NULL,
  `mayor` text NOT NULL,
  `fecha_reporte` varchar(50) NOT NULL,
  `menor` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `reporteindice`
--

INSERT INTO `reporteindice` (`id_mayor_indice`, `mayor`, `fecha_reporte`, `menor`) VALUES
(1, 'Barranca Salda : 3', '18-11-2022', ' Barrio San Pedro : 0  Canada Estaca : 0  Canada San Miguel : 0  El Carrizal : 0  El Cuajilote : 0  El Mosco : 0  Gabino Barreda : 0  La Huertilla : 0  San Jeronimo Primera Seccion : 0  San Jeronimo Segunda Seccion : 0  San Pedro : 0  Canada Sandia : 0 ');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id_usuario` int(11) NOT NULL,
  `nombre_usuario` varchar(150) NOT NULL,
  `nombre` varchar(200) NOT NULL,
  `apellidos` varchar(200) NOT NULL,
  `correo` varchar(200) NOT NULL,
  `password` varchar(150) NOT NULL,
  `rol` varchar(80) NOT NULL,
  `tipo_usuario` int(11) NOT NULL,
  `imagen` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id_usuario`, `nombre_usuario`, `nombre`, `apellidos`, `correo`, `password`, `rol`, `tipo_usuario`, `imagen`) VALUES
(1, 'bps101', 'Adolfo', 'Dominguez Velazquez', 'rodolfo.bps@gmail.com', '7c222fb2927d828af22f592134e8932480637c0d', 'Administrador Web', 1, '1666305181__n.jpg'),
(5, '@Yosie', 'Adolfo', 'Dominguez Velazquez', 'adolfo.bps@gmail.com', 'fc008c7a6dcc617f8eb5823842631a1244e9d36f', 'Administrador Web', 1, '1666297866_68e9a694-e13e-43c6-8350-0d736af82dfd.jfif'),
(16, 'p4nd4', 'Julio Cesar', 'Rojas Nando', 'julio.bps@gmail.com', '080ef80493eb0edf0c7a266aa5a271ae25705944', 'Usuario Estandar', 2, '1669151359_1366_2000.jpg'),
(17, '@chino', 'Marlon', 'A', 'marlon@gmail.com', '080ef80493eb0edf0c7a266aa5a271ae25705944', 'Administrador Web', 1, '1670090896_QATAR.jpg');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`id_categoria`);

--
-- Indices de la tabla `mapa`
--
ALTER TABLE `mapa`
  ADD PRIMARY KEY (`id_planta`);

--
-- Indices de la tabla `reporteindice`
--
ALTER TABLE `reporteindice`
  ADD PRIMARY KEY (`id_mayor_indice`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categorias`
--
ALTER TABLE `categorias`
  MODIFY `id_categoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `mapa`
--
ALTER TABLE `mapa`
  MODIFY `id_planta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT de la tabla `reporteindice`
--
ALTER TABLE `reporteindice`
  MODIFY `id_mayor_indice` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
