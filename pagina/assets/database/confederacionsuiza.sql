-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 24-11-2022 a las 11:02:10
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
-- Base de datos: `confederacionsuiza`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `asistencia`
--

CREATE TABLE `asistencia` (
  `id` int(4) NOT NULL,
  `idusuario` int(4) NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `estado` enum('presente','ausente','tarde') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `asistencia`
--

INSERT INTO `asistencia` (`id`, `idusuario`, `fecha`, `estado`) VALUES
(1, 18, '2022-11-24 00:35:35', 'presente'),
(6, 20, '2022-11-24 09:41:43', 'presente'),
(7, 23, '2022-11-24 09:42:33', 'presente'),
(8, 22, '2022-11-24 09:42:33', 'ausente'),
(9, 27, '2022-11-24 09:42:33', 'tarde');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `curso`
--

CREATE TABLE `curso` (
  `id` int(10) NOT NULL,
  `idusuario` int(10) NOT NULL,
  `idcurso` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `curso`
--

INSERT INTO `curso` (`id`, `idusuario`, `idcurso`) VALUES
(0, 18, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cursos`
--

CREATE TABLE `cursos` (
  `id` int(4) NOT NULL,
  `year` int(1) NOT NULL,
  `division` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `cursos`
--

INSERT INTO `cursos` (`id`, `year`, `division`) VALUES
(1, 6, 11),
(2, 4, 10);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rol`
--

CREATE TABLE `rol` (
  `id` int(4) NOT NULL,
  `idusuario` int(4) NOT NULL,
  `idrol` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `rol`
--

INSERT INTO `rol` (`id`, `idusuario`, `idrol`) VALUES
(1, 18, 3),
(2, 22, 1),
(3, 23, 3),
(4, 27, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

CREATE TABLE `roles` (
  `id` int(4) NOT NULL,
  `rol` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `roles`
--

INSERT INTO `roles` (`id`, `rol`) VALUES
(1, 'alumno'),
(2, 'preceptor'),
(3, 'admin');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tag`
--

CREATE TABLE `tag` (
  `id` int(4) NOT NULL,
  `tag` varchar(14) NOT NULL,
  `idusuario` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tag`
--

INSERT INTO `tag` (`id`, `tag`, `idusuario`) VALUES
(7, '637a9d7e0d30d', 18),
(8, '637a9df81fc7a', 19),
(9, '637d74bc34ffd', 20),
(10, '637ecb9a1cc9e', 21),
(11, '637ee479045b3', 22),
(12, '637ee4a387378', 23),
(13, '637ee5d064f83', 24),
(14, '637ee6565d9ac', 25),
(15, '637ee6cfa6e0c', 26),
(16, '637ee6ff84ade', 27);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id` int(255) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `apellido` varchar(20) NOT NULL,
  `email` varchar(100) NOT NULL,
  `telefono` int(10) NOT NULL,
  `contrasena` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id`, `nombre`, `apellido`, `email`, `telefono`, `contrasena`) VALUES
(18, 'Valentin', 'anchart', 'valen@gmail.com', 123, '$2y$10$rMcTzirUqtklX7CUutbp3uWSl4EOzBkH8xAJfoBERBV8ym1DvrVqm'),
(19, 'noelia', 'laura', 'noe@gmail.com', 123, '$2y$10$HXIT9hM//47gN9VEtVQuKe4Y7uXtFdYiiKYujcZVaCcZO9mAERUc.'),
(20, 'aylen', 'aylen', 'aylen', 123, '$2y$10$ujAsXm9a9io36zJ1.EMJy.ST3cNjKAi7arq7W1/btYEMaHpollYY2'),
(21, 'asd', 'asd', 'asd@asd', 123, '$2y$10$xXwRnZuczoxR8l6KJTiui.fMxVgt75S8g9OoUN/XuJLj7PnbcesRu'),
(22, 'alumno', 'alumno', 'alumno@gmail.com', 1100000000, '$2y$10$W.Gb3exDYAFvdU8NtTgyGe2OO4ayU4okzN.zs4Pk8HnhkXxijHa3G'),
(23, 'admin', 'admin', '@admin', 1111111111, '$2y$10$jN34ytyaffVWCODtibsYJu11hhs.0rNwKapwDB6WOWr456IwWm0/.'),
(27, 'preceptor', 'preceptor', 'preceptor@gmail.com', 1111111111, '$2y$10$iN/idok76br85t3Fbhbq1.jGdMUM9blvbJurdIe.0GLs01dftTYTS');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `asistencia`
--
ALTER TABLE `asistencia`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `cursos`
--
ALTER TABLE `cursos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `rol`
--
ALTER TABLE `rol`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tag`
--
ALTER TABLE `tag`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `asistencia`
--
ALTER TABLE `asistencia`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `cursos`
--
ALTER TABLE `cursos`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `rol`
--
ALTER TABLE `rol`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `tag`
--
ALTER TABLE `tag`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
