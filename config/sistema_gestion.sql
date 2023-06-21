-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 21-06-2023 a las 05:14:38
-- Versión del servidor: 10.4.28-MariaDB
-- Versión de PHP: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `sistema_gestion`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `embarcaciones`
--

CREATE TABLE `embarcaciones` (
  `matricula_id` varchar(50) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `tipo` varchar(50) NOT NULL,
  `fecha_construccion` date NOT NULL,
  `ficha_comercial` varchar(100) NOT NULL,
  `imagen` varchar(100) NOT NULL,
  `maquina_principal_id` int(11) NOT NULL,
  `motogenerador_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `embarcaciones`
--

INSERT INTO `embarcaciones` (`matricula_id`, `nombre`, `tipo`, `fecha_construccion`, `ficha_comercial`, `imagen`, `maquina_principal_id`, `motogenerador_id`) VALUES
('ARSK-SE-0024', 'CARONI', 'MOTO-EMPUJADOR', '1983-01-13', '', ' \r\n./embarcaciones/caroni.jpg', 10101, 9999),
('ARSK-SE-0025', 'APURE', 'REMOLCADOR', '1983-06-22', '', ' \r\n./embarcaciones/Apure.jpg', 9999, 10101),
('ARSK-SE-0026', 'ARAMAYA', 'MOTO-EMPUJADOR', '1989-01-01', '', '/.embarcaciones/aramaya.jpg\r\n', 10101, 9999),
('ARSK-SE-0030', 'CAPANAPARO', 'MOTO-EMPUJADOR', '1985-02-05', 'Scan_20230323_121602.jpg', './embarcaciones/capanaparo.jpg', 10101, 9999),
('ARSK-SE-0048', 'CASIQUIARE', 'REMOLCADOR', '1998-06-10', '', './embarcaciones/Casiquiare.jpg', 9999, 9999);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `equipos`
--

CREATE TABLE `equipos` (
  `equipo_id` int(11) NOT NULL,
  `equipo_image` varchar(1000) NOT NULL,
  `tipo_equipo_id` int(11) NOT NULL,
  `marca` varchar(50) NOT NULL,
  `modelo` varchar(50) NOT NULL,
  `serial` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `equipos`
--

INSERT INTO `equipos` (`equipo_id`, `equipo_image`, `tipo_equipo_id`, `marca`, `modelo`, `serial`) VALUES
(9999, '', 1, 'rarara', 'L16 645 E5', '5'),
(10101, '', 2, 'lorempp', '9747473', '121212');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `informenes`
--

CREATE TABLE `informenes` (
  `informe_id` int(11) NOT NULL,
  `informacion_informe` text DEFAULT NULL,
  `nombre_personal` varchar(50) DEFAULT NULL,
  `fecha_inicio` date DEFAULT NULL,
  `fecha_finalizacion` date DEFAULT NULL,
  `tipo_equipo` varchar(50) DEFAULT NULL,
  `marca_equipo` varchar(50) DEFAULT NULL,
  `modelo_equipo` varchar(50) DEFAULT NULL,
  `serial_equipo` int(11) DEFAULT NULL,
  `descripcion_asignacion` text DEFAULT NULL,
  `orden_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `informenes`
--

INSERT INTO `informenes` (`informe_id`, `informacion_informe`, `nombre_personal`, `fecha_inicio`, `fecha_finalizacion`, `tipo_equipo`, `marca_equipo`, `modelo_equipo`, `serial_equipo`, `descripcion_asignacion`, `orden_id`) VALUES
(1, 'prueba mantenimiento', 'Marcos Perea', NULL, '2023-06-20', 'Motogenerador', 'rarara', 'L16 645 E5', 5, 'zdrhdzjn', NULL),
(2, 'Prueba mantenimiento', 'Marcos Perea', NULL, '2023-06-20', 'Motogenerador', 'rarara', 'L16 645 E5', 5, 'zdrhdzjn', NULL),
(3, 'nfnfnfnfnf', 'Marcos Perea', NULL, '2023-06-20', 'Motogenerador', 'rarara', 'L16 645 E5', 5, 'zdrhdzjn', NULL),
(4, 'Descripcion del informe\n\n', 'Luis López', NULL, '2023-06-20', 'Motogenerador', 'rarara', 'L16 645 E5', 5, 'hehehrehr', 27),
(5, 'regethrwtgb', 'Luis López', NULL, '2023-06-20', 'Motogenerador', 'rarara', 'L16 645 E5', 5, 'kknds npivnpwegn repiv oenfwe fejgnperinw erneprepocnevieongegn epgmo`wej9egengwe gewg egmeogengieogejgeknegñpewgnpepigbegje gegegipnegeigengengepgie', 16),
(6, '', 'Luis López', NULL, '2023-06-20', 'Motogenerador', 'rarara', 'L16 645 E5', 5, 'kknds npivnpwegn repiv oenfwe fejgnperinw erneprepocnevieongegn epgmo`wej9egengwe gewg egmeogengieogejgeknegñpewgnpepigbegje gegegipnegeigengengepgie', 16),
(7, 'jyjkykulkukuku', 'Luis López', NULL, '2023-06-20', 'Motogenerador', 'rarara', 'L16 645 E5', 5, 'kknds npivnpwegn repiv oenfwe fejgnperinw erneprepocnevieongegn epgmo`wej9egengwe gewg egmeogengieogejgeknegñpewgnpepigbegje gegegipnegeigengengepgie', 16);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `orden`
--

CREATE TABLE `orden` (
  `orden_id` int(11) NOT NULL,
  `personal_id` int(11) DEFAULT NULL,
  `equipo_id` int(11) DEFAULT NULL,
  `descripcion_asignacion` varchar(200) NOT NULL,
  `fecha_emision` date NOT NULL,
  `fecha_inicio` date DEFAULT NULL,
  `fecha_finalizacion` date DEFAULT NULL,
  `tipo_mantenimiento_id` int(11) NOT NULL,
  `intervalo_dias` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `orden`
--

INSERT INTO `orden` (`orden_id`, `personal_id`, `equipo_id`, `descripcion_asignacion`, `fecha_emision`, `fecha_inicio`, `fecha_finalizacion`, `tipo_mantenimiento_id`, `intervalo_dias`) VALUES
(13, 3345, 9999, 'egegeew', '0000-00-00', '0000-00-00', NULL, 1, NULL),
(16, 3789, 9999, 'kknds npivnpwegn repiv oenfwe fejgnperinw erneprepocnevieongegn epgmo`wej9egengwe gewg egmeogengieogejgeknegñpewgnpepigbegje gegegipnegeigengengepgie', '0000-00-00', NULL, '2023-06-20', 1, 40),
(19, 6412, 10101, 'savsevwe', '0000-00-00', '0000-00-00', NULL, 1, NULL),
(21, 6412, 10101, 'ggcitvt6v85b6', '0000-00-00', '0000-00-00', NULL, 2, NULL),
(27, 3789, 9999, 'hehehrehr', '0000-00-00', '2023-06-20', NULL, 1, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `personal`
--

CREATE TABLE `personal` (
  `personal_id` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `usuario` varchar(100) NOT NULL,
  `clave` varchar(100) NOT NULL,
  `cargo` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `disponible` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `personal`
--

INSERT INTO `personal` (`personal_id`, `nombre`, `usuario`, `clave`, `cargo`, `email`, `disponible`) VALUES
(2594, 'Alejandro Acevedo', '', '', 'mecanico', '', 'disponible'),
(3345, 'Jorge Casares', '', '', 'soldador', '', 'en servicio'),
(3789, 'Luis López', '', '', 'maquinista', '', 'en servicio'),
(6412, 'Marcos Perea', '', '', 'maquinista', '', 'disponible'),
(6785, 'Iván  Lozano', '', '', 'soldador', '', 'disponible'),
(8951, 'Andrés García', '', '', 'maquinista', '', 'disponible');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_equipo`
--

CREATE TABLE `tipo_equipo` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `tipo_equipo`
--

INSERT INTO `tipo_equipo` (`id`, `nombre`) VALUES
(1, 'Motogenerador'),
(2, 'Maquina principal');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_mantenimiento`
--

CREATE TABLE `tipo_mantenimiento` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `tipo_mantenimiento`
--

INSERT INTO `tipo_mantenimiento` (`id`, `nombre`) VALUES
(1, 'Preventivo'),
(2, 'Correctivo');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `embarcaciones`
--
ALTER TABLE `embarcaciones`
  ADD PRIMARY KEY (`matricula_id`),
  ADD KEY `fk_motogenerador_id_equipo_id` (`motogenerador_id`),
  ADD KEY `fk_maquina_principal_id_equipo_id` (`maquina_principal_id`);

--
-- Indices de la tabla `equipos`
--
ALTER TABLE `equipos`
  ADD PRIMARY KEY (`equipo_id`),
  ADD KEY `fk_tipo_equipo_id` (`tipo_equipo_id`);

--
-- Indices de la tabla `informenes`
--
ALTER TABLE `informenes`
  ADD PRIMARY KEY (`informe_id`),
  ADD KEY `fk_orden` (`orden_id`);

--
-- Indices de la tabla `orden`
--
ALTER TABLE `orden`
  ADD PRIMARY KEY (`orden_id`),
  ADD KEY `fk_tipo_mantenimiento` (`tipo_mantenimiento_id`),
  ADD KEY `fk_personal` (`personal_id`),
  ADD KEY `orden_ibfk_2` (`equipo_id`);

--
-- Indices de la tabla `personal`
--
ALTER TABLE `personal`
  ADD PRIMARY KEY (`personal_id`);

--
-- Indices de la tabla `tipo_equipo`
--
ALTER TABLE `tipo_equipo`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tipo_mantenimiento`
--
ALTER TABLE `tipo_mantenimiento`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `informenes`
--
ALTER TABLE `informenes`
  MODIFY `informe_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `orden`
--
ALTER TABLE `orden`
  MODIFY `orden_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT de la tabla `tipo_equipo`
--
ALTER TABLE `tipo_equipo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `tipo_mantenimiento`
--
ALTER TABLE `tipo_mantenimiento`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `embarcaciones`
--
ALTER TABLE `embarcaciones`
  ADD CONSTRAINT `fk_maquina_principal_id_equipo_id` FOREIGN KEY (`maquina_principal_id`) REFERENCES `equipos` (`equipo_id`),
  ADD CONSTRAINT `fk_motogenerador_id_equipo_id` FOREIGN KEY (`motogenerador_id`) REFERENCES `equipos` (`equipo_id`);

--
-- Filtros para la tabla `equipos`
--
ALTER TABLE `equipos`
  ADD CONSTRAINT `fk_tipo_equipo_id` FOREIGN KEY (`tipo_equipo_id`) REFERENCES `tipo_equipo` (`id`);

--
-- Filtros para la tabla `informenes`
--
ALTER TABLE `informenes`
  ADD CONSTRAINT `fk_orden` FOREIGN KEY (`orden_id`) REFERENCES `orden` (`orden_id`) ON DELETE SET NULL;

--
-- Filtros para la tabla `orden`
--
ALTER TABLE `orden`
  ADD CONSTRAINT `fk_personal` FOREIGN KEY (`personal_id`) REFERENCES `personal` (`personal_id`) ON DELETE SET NULL,
  ADD CONSTRAINT `fk_tipo_mantenimiento` FOREIGN KEY (`tipo_mantenimiento_id`) REFERENCES `tipo_mantenimiento` (`id`),
  ADD CONSTRAINT `orden_ibfk_2` FOREIGN KEY (`equipo_id`) REFERENCES `equipos` (`equipo_id`) ON DELETE SET NULL;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
