-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 17-02-2019 a las 01:28:46
-- Versión del servidor: 10.1.37-MariaDB
-- Versión de PHP: 7.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `mascotas`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE `clientes` (
  `id` int(11) NOT NULL,
  `nombre` varchar(64) COLLATE latin1_general_ci NOT NULL,
  `apellidos` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `run` varchar(10) COLLATE latin1_general_ci NOT NULL,
  `email` varchar(64) COLLATE latin1_general_ci NOT NULL,
  `direccion` varchar(150) COLLATE latin1_general_ci NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `fecha_registro` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`id`, `nombre`, `apellidos`, `run`, `email`, `direccion`, `id_usuario`, `fecha_registro`) VALUES
(2, 'JOHN', 'GUERRERO', '18762905', 'guerrerojohnalexander@gmail.com', 'SAN AGUSTIN', 1, '2019-02-17');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `colores`
--

CREATE TABLE `colores` (
  `id_color` int(11) NOT NULL,
  `color` varchar(25) COLLATE latin1_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Volcado de datos para la tabla `colores`
--

INSERT INTO `colores` (`id_color`, `color`) VALUES
(1, 'BLANCO'),
(2, 'NEGRO'),
(3, 'AMARILLO'),
(4, 'GRIS'),
(5, 'AMARILLO-CAFÉ'),
(6, 'AMARILLO-CAFÉ-ROJO'),
(7, 'AMARILLO-ROJO'),
(8, 'BLANCO-AMARILLO'),
(9, 'BLANCO-AMARILLO-CAFÉ'),
(10, 'BLANCO-AMARILLO-ROJO'),
(11, 'BLANCO-CAFÉ'),
(12, 'BLANCO-CAFÉ-ROJO'),
(13, 'BLANCO-CREMA'),
(14, 'BLANCO-CREMA-AMARILLO'),
(15, 'BLANCO-CREMA-CAFÉ'),
(16, 'BLANCO-CREMA-ROJO'),
(17, 'BLANCO-GRIS'),
(18, 'BLANCO-GRIS-AMARILLO'),
(19, 'BLANCO-GRIS-CAFÉ'),
(20, 'BLANCO-GRIS-CREMA'),
(21, 'BLANCO-GRIS-ROJO'),
(22, 'BLANCO-NEGRO'),
(23, 'BLANCO-NEGRO-AMARILLO'),
(24, 'BLANCO-NEGRO-CAFÉ');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `especies`
--

CREATE TABLE `especies` (
  `id` int(11) NOT NULL,
  `nombre` varchar(64) COLLATE latin1_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Volcado de datos para la tabla `especies`
--

INSERT INTO `especies` (`id`, `nombre`) VALUES
(1, 'PERRO'),
(2, 'GATO');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mascota`
--

CREATE TABLE `mascota` (
  `id_mascota` int(11) NOT NULL,
  `microchip` varchar(60) COLLATE latin1_general_ci NOT NULL,
  `nombre` varchar(60) COLLATE latin1_general_ci NOT NULL,
  `id_especie` int(11) NOT NULL,
  `id_raza` int(11) NOT NULL,
  `sexo` int(1) NOT NULL,
  `fecha_nacimiento` date NOT NULL,
  `id_color` int(11) NOT NULL,
  `id_patron_color` int(11) NOT NULL,
  `esterilizado` int(1) NOT NULL,
  `id_propietario` int(11) NOT NULL,
  `id_obtencion` int(11) NOT NULL,
  `id_razon` int(11) NOT NULL,
  `certificado` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `calidad` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `fecha_registro` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Volcado de datos para la tabla `mascota`
--

INSERT INTO `mascota` (`id_mascota`, `microchip`, `nombre`, `id_especie`, `id_raza`, `sexo`, `fecha_nacimiento`, `id_color`, `id_patron_color`, `esterilizado`, `id_propietario`, `id_obtencion`, `id_razon`, `certificado`, `calidad`, `id_usuario`, `fecha_registro`) VALUES
(1, '00012', 'VALENTINA', 1, 18, 2, '2019-01-29', 3, 1, 1, 1, 1, 1, '0001constancia 16431652.pdf', '0001constancia 25024151.pdf', 1, '2019-02-11');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `obtencion`
--

CREATE TABLE `obtencion` (
  `id_obtencion` int(11) NOT NULL,
  `obtencion` varchar(64) COLLATE latin1_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Volcado de datos para la tabla `obtencion`
--

INSERT INTO `obtencion` (`id_obtencion`, `obtencion`) VALUES
(1, 'COMPRA'),
(5, 'REGALO'),
(6, 'NACIDO EN CASA'),
(7, 'ADOPCIÓN O REUBICACIÓN'),
(8, 'RECOGIDO');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `patron_color`
--

CREATE TABLE `patron_color` (
  `id_patron` int(11) NOT NULL,
  `patron` varchar(50) COLLATE latin1_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Volcado de datos para la tabla `patron_color`
--

INSERT INTO `patron_color` (`id_patron`, `patron`) VALUES
(1, 'BANDAS O FRANJAS'),
(2, 'JASPEADO');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `razas`
--

CREATE TABLE `razas` (
  `id` int(11) NOT NULL,
  `id_especie` int(11) NOT NULL,
  `nombre` varchar(64) COLLATE latin1_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Volcado de datos para la tabla `razas`
--

INSERT INTO `razas` (`id`, `id_especie`, `nombre`) VALUES
(15, 2, 'SIAMÉS'),
(18, 1, 'GOLDEN');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `razon`
--

CREATE TABLE `razon` (
  `id_razon` int(11) NOT NULL,
  `razon` varchar(64) COLLATE latin1_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Volcado de datos para la tabla `razon`
--

INSERT INTO `razon` (`id_razon`, `razon`) VALUES
(1, 'COMPAÑIA'),
(4, 'ASISTENCIA'),
(5, 'CAZA'),
(6, 'DEPORTE'),
(7, 'EXPOSICIÓN'),
(8, 'OTRO'),
(9, 'REPRODUCCIÓN'),
(10, 'SEGURIDAD'),
(11, 'TERAPIA'),
(12, 'TRABAJO');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `Id` mediumint(8) NOT NULL,
  `Name` varchar(64) COLLATE latin1_general_ci NOT NULL,
  `Usuario` varchar(64) COLLATE latin1_general_ci NOT NULL,
  `Password` varchar(128) COLLATE latin1_general_ci NOT NULL,
  `nivel` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL COMMENT 'usuario que esta registrando',
  `fecha_registro` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`Id`, `Name`, `Usuario`, `Password`, `nivel`, `id_usuario`, `fecha_registro`) VALUES
(1, 'NELSON ACOSTA', 'nelsonacostavargas@yahoo.com', '$2y$10$ldWWDyFFM1.wNq5Gy0KVjuQant0q7OTQ6vkfxN7Fi9eWjajIDz1.a', 1, 1, '2019-02-03');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `colores`
--
ALTER TABLE `colores`
  ADD PRIMARY KEY (`id_color`);

--
-- Indices de la tabla `especies`
--
ALTER TABLE `especies`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `mascota`
--
ALTER TABLE `mascota`
  ADD PRIMARY KEY (`id_mascota`);

--
-- Indices de la tabla `obtencion`
--
ALTER TABLE `obtencion`
  ADD PRIMARY KEY (`id_obtencion`);

--
-- Indices de la tabla `patron_color`
--
ALTER TABLE `patron_color`
  ADD PRIMARY KEY (`id_patron`);

--
-- Indices de la tabla `razas`
--
ALTER TABLE `razas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `razon`
--
ALTER TABLE `razon`
  ADD PRIMARY KEY (`id_razon`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`Id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `clientes`
--
ALTER TABLE `clientes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `colores`
--
ALTER TABLE `colores`
  MODIFY `id_color` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT de la tabla `especies`
--
ALTER TABLE `especies`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `mascota`
--
ALTER TABLE `mascota`
  MODIFY `id_mascota` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `obtencion`
--
ALTER TABLE `obtencion`
  MODIFY `id_obtencion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `patron_color`
--
ALTER TABLE `patron_color`
  MODIFY `id_patron` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `razas`
--
ALTER TABLE `razas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT de la tabla `razon`
--
ALTER TABLE `razon`
  MODIFY `id_razon` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `Id` mediumint(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
