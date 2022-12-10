-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 10-12-2022 a las 02:52:55
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
(46, 'Santo Domingo Tonahuixtla', 'Abarrotes Villa Mar', 'San Jeronimow', '1667426520_1664320454_biznaga1.jpg', 'activo', '18.209906622307617', '-97.9182392320247', 'Desconocido', '2022-12-05', '2021-02-20', '2021-02-20'),
(48, 'Barranca Salada', '74957 San Jerónimo Xayacatlán, Puebla', 'Micheladas shoks', '1667952649_1366_2000.jpg', 'activo', '18.22263778714631', '-97.94708464841214', 'Desconocido', '2022-11-15', '0000-00-00', '2022-12-05'),
(49, 'Barranca Salada', 'PUE 455, 74957 Acatlán, Pue.', 'Carnitas De Puerco/Taco', '1667952715_1664926341_0002.jpg', 'inactivo', '18.226021089692765', '-97.93429587596268', 'Otro2', '2021-12-07', '2022-12-05', '2022-12-05'),
(50, 'Barrio San Pedro', 'San Jerónimo Xayacatlán, Puebla', 'Tercera Secc San Pedro', '1670627969_descarga (1).jfif', 'activo', '18.20790193323564', '-97.91386690456903', 'Desconocido', '0000-00-00', '0000-00-00', '0000-00-00'),
(51, 'Barrio San Pedro', 'Diag. Josefa Ortiz de Domínguez, Tercera Secc San Pedro, 74954', 'San Jerónimo Xayacatlán, Pue.', '1670628206_descarga (2).jfif', 'inactivo', '18.210261458282893', '-97.91836311379507', 'Desconocido', '0000-00-00', '2022-12-10', '2022-12-10'),
(52, 'Barrio San Pedro', 'Tercera Secc San Pedro, 74954 San Jerónimo Xayacatlán, Pue.', 'Tercera Secc San Pedro', '1670628377_descarga (3).jfif', 'activo', '18.210408877254917', '-97.91661346797943', 'Desconocido', '0000-00-00', '0000-00-00', '0000-00-00'),
(53, 'Cañada Estaca', 'San Jerónimo Xayacatlán, Puebla', 'San Jerónimo Xayacatlán, Puebla', '1670628532_descarga (4).jfif', 'inactivo', '18.244764154155344', '-97.92097950549103', 'Desconocido', '0000-00-00', '2022-12-10', '2022-12-10'),
(54, 'Cañada Estaca', 'Desconocido', 'San Jerónimo Xayacatlán, Puebla', '1670628724_descarga.jfif', 'activo', '18.24421776450538', '-97.9211849736927', 'Desconocido', '0000-00-00', '0000-00-00', '0000-00-00'),
(55, 'Cañada Estaca', 'Desconocido', 'Camino Viejo', '1670628931_images (1).jfif', 'activo', '18.24222733054146', '-97.92274653202531', 'Desconocido', '0000-00-00', '0000-00-00', '0000-00-00'),
(56, 'El Cuajilote', 'Desconocido', 'Gabino barreda', '1670629148_images (2).jfif', 'inactivo', '18.162135427009375', '-97.96552376835953', 'Desconocido', '0000-00-00', '2022-12-10', '2022-12-10'),
(57, 'El Cuajilote', 'Desconocido', 'Gabino barreda', '1670629193_images (3).jfif', 'activo', '18.16758098081612', '-97.95999021930594', 'Desconocido', '0000-00-00', '0000-00-00', '0000-00-00'),
(58, 'El Cuajilote', 'Desconocido', 'Gabino barreda', '1670629276_images (4).jfif', 'inactivo', '18.14682788379372', '-97.9715031315425', 'Desconocido', '0000-00-00', '2022-12-10', '2022-12-10'),
(59, 'El Cuajilote', 'Desconocido', 'Gabino barreda', '1670629346_images (5).jfif', 'inactivo', '18.159217265607726', '-97.96639308953654', 'Desconocido', '0000-00-00', '2022-12-10', '2022-12-10'),
(60, 'El Cuajilote', 'Desconocido', 'Gabino barreda', '1670629461_images (7).jfif', 'activo', '18.178266862362484', '-97.97805632817885', 'Desconocido', '0000-00-00', '0000-00-00', '0000-00-00'),
(61, 'El Mosco', 'Desconocido', 'El mosco', '1670630349_images.jfif', 'activo', '18.227300996768353', '-97.89353364816203', 'Desconocido', '0000-00-00', '0000-00-00', '0000-00-00'),
(62, 'El Mosco', 'Desconocido', 'El mosco', '1670630413_images (10).jfif', 'activo', '18.22845970155236', '-97.89236120677204', 'Desconocido', '0000-00-00', '0000-00-00', '0000-00-00'),
(63, 'El Mosco', 'Desconocido', 'El mosco', '1670630454_images (8).jfif', 'activo', '18.229509435553304', '-97.89148625707915', 'Desconocido', '0000-00-00', '0000-00-00', '0000-00-00'),
(64, 'El Mosco', 'Desconocido', 'El mosco', '1670630544_images (7).jfif', 'activo', '18.229334480326347', '-97.89307498152147', 'Desconocido', '0000-00-00', '0000-00-00', '0000-00-00'),
(65, 'Gabino Barreda', 'Avenida Morelos', 'Gabino barreda', '1670630700_images (6).jfif', 'inactivo', '18.168652515199355', '-97.95195811278536', 'Desconocido', '0000-00-00', '2022-12-10', '2022-12-10'),
(66, 'Gabino Barreda', 'Avenida Morelos', 'Gabino barreda', '1670630754_images (5).jfif', 'activo', '18.168854189495324', '-97.95427525349241', 'Desconocido', '0000-00-00', '0000-00-00', '0000-00-00'),
(67, 'La Huertilla', 'Desconocido', 'La huertilla', '1670630888_descarga (1).jfif', 'activo', '18.250706889413305', '-97.89649880918766', 'Desconocido', '0000-00-00', '0000-00-00', '0000-00-00'),
(68, 'San Jeronimo Primera Seccion', 'C. 6 Sur, Primera Centro, 74950', 'San Jerónimo Xayacatlán, Pue.', '1670630959_descarga (2).jfif', 'activo', '18.220573292173654', '-97.9186253276455', 'Desconocido', '0000-00-00', '0000-00-00', '0000-00-00'),
(69, 'San Jeronimo Primera Seccion', '4 oriente', 'San Jerónimo Xayacatlán, Puebla', '1670631555_descarga (4).jfif', 'activo', '18.222168752217527', '-97.91316007690803', 'Desconocido', '0000-00-00', '0000-00-00', '0000-00-00'),
(70, 'San Jeronimo Primera Seccion', '5 poniente', 'San Jerónimo Xayacatlán, Puebla', '1670631714_descarga (4).jfif', 'inactivo', '18.219549369281033', '-97.91498107451683', 'Desconocido', '0000-00-00', '2022-12-10', '2022-12-10'),
(71, 'San Jeronimo Primera Seccion', 'Mascara', 'San Jeronimo', '1670632219_descarga (4).jfif', 'activo', '18.22317268452853', '-97.91292215024043', 'Desconocido', '0000-00-00', '0000-00-00', '0000-00-00'),
(72, 'San Jeronimo Primera Seccion', 'Calle 3 Poniente', 'San Jerónimo Xayacatlán, Puebla', '1670633023_images (7).jfif', 'activo', '18.221686982797504', '-97.91989695573493', 'Desconocido', '0000-00-00', '0000-00-00', '0000-00-00'),
(73, 'San Jeronimo Primera Seccion', 'Pedro de la cruz', 'San Jerónimo Xayacatlán, Puebla', '1670633084_descarga (4).jfif', 'activo', '18.22246015568924', '-97.91991291638823', 'Desconocido', '0000-00-00', '0000-00-00', '0000-00-00'),
(74, 'San Jeronimo Primera Seccion', 'Calle 8 norte', 'San Jerónimo Xayacatlán, Puebla', '1670633163_descarga (2).jfif', 'activo', '18.224051971415186', '-97.91905104110973', 'Desconocido', '0000-00-00', '0000-00-00', '0000-00-00'),
(75, 'San Jeronimo Primera Seccion', 'Calle 10 sur', 'San Jerónimo Xayacatlán, Puebla', '1670633214_images (4).jfif', 'activo', '18.22220243177365', '-97.92085459493325', 'Desconocido', '0000-00-00', '0000-00-00', '0000-00-00'),
(76, 'San Jeronimo Segunda Seccion', 'Calle 7 sur', 'San Jerónimo Xayacatlán, Puebla', '1670633300_descarga.jfif', 'activo', '18.219473566875987', '-97.91052805215207', 'Desconocido', '0000-00-00', '0000-00-00', '0000-00-00'),
(77, 'San Jeronimo Segunda Seccion', 'Calle 4 oriente', 'El llano', '1670633377_images (4).jfif', 'activo', '18.220504476411758', '-97.90518123329474', 'Desconocido', '0000-00-00', '0000-00-00', '0000-00-00'),
(78, 'San Jeronimo Segunda Seccion', 'Calle 13 norte', 'El llano', '1670633427_images (3).jfif', 'inactivo', '18.221004768544727', '-97.90484605957532', 'Desconocido', '0000-00-00', '2022-12-10', '2022-12-10'),
(79, 'San Jeronimo Segunda Seccion', 'Calle 13 sur', 'El llano', '1670633478_images (1).jfif', 'activo', '18.218018154784225', '-97.90674537731867', 'Desconocido', '0000-00-00', '0000-00-00', '0000-00-00'),
(80, 'San Jeronimo Segunda Seccion', 'Calle 2 oriente', 'El llano', '1670633535_images (10).jfif', 'activo', '18.220853165019925', '-97.90995346863308', 'Desconocido', '0000-00-00', '0000-00-00', '0000-00-00'),
(81, 'San Jeronimo Segunda Seccion', 'Calle 5 oriente', 'El llano', '1670633570_images.jfif', 'inactivo', '18.217305604843965', '-97.90494182349515', 'Desconocido', '0000-00-00', '2022-12-10', '2022-12-10');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reporteindice`
--

CREATE TABLE `reporteindice` (
  `id_mayor_indice` int(11) NOT NULL,
  `mayor` text NOT NULL,
  `fecha_reporte` varchar(50) NOT NULL,
  `menor` text NOT NULL,
  `dia_ultimo` varchar(200) NOT NULL,
  `mes_ultimo` varchar(200) NOT NULL,
  `anio_ultimo` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `reporteindice`
--

INSERT INTO `reporteindice` (`id_mayor_indice`, `mayor`, `fecha_reporte`, `menor`, `dia_ultimo`, `mes_ultimo`, `anio_ultimo`) VALUES
(7, 'Barranca Salda : 2', '09-12-2022', ' Barrio San Pedro : 0  Canada Estaca : 0  Canada San Miguel : 0  El Carrizal : 0  El Cuajilote : 0  El Mosco : 0  Gabino Barreda : 0  La Huertilla : 0  San Jeronimo Primera Seccion : 0  San Jeronimo Segunda Seccion : 0  San Pedro : 0  Canada Sandia : 0 ', '1', '2', '2');

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
  MODIFY `id_planta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=82;

--
-- AUTO_INCREMENT de la tabla `reporteindice`
--
ALTER TABLE `reporteindice`
  MODIFY `id_mayor_indice` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
