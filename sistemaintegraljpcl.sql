-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 19-07-2023 a las 05:55:59
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
-- Base de datos: `sistemaintegraljpcl`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `audiencias`
--

CREATE TABLE `audiencias` (
  `idAudiencia` int(11) NOT NULL,
  `aud_cliente_dni` varchar(8) DEFAULT NULL,
  `aud_estado` varchar(25) DEFAULT NULL,
  `aud_pago` varchar(25) DEFAULT NULL,
  `aud_fecha` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `docidentidad`
--

CREATE TABLE `docidentidad` (
  `id_docidentidad` varchar(5) NOT NULL,
  `doc_descripcion` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `docidentidad`
--

INSERT INTO `docidentidad` (`id_docidentidad`, `doc_descripcion`) VALUES
('20001', 'DNI');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `eventos`
--

CREATE TABLE `eventos` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `descripcion` text NOT NULL,
  `color` varchar(255) NOT NULL,
  `textColor` varchar(255) NOT NULL,
  `start` datetime NOT NULL,
  `end` datetime NOT NULL,
  `tipoproceso` varchar(35) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `eventos`
--

INSERT INTO `eventos` (`id`, `title`, `descripcion`, `color`, `textColor`, `start`, `end`, `tipoproceso`) VALUES
(1, 'Junta 1', 'Cancelado', '#000000', '#ffffff', '2023-05-03 05:23:50', '2023-05-03 05:23:50', ''),
(2, 'Junta2', 'Cancelado', '#000000', '#ffffff', '2023-05-12 23:05:19', '2023-05-12 23:05:19', ''),
(25, 'importante de atencion inmediata', 'la audiencia se realizará de manera precencial en centro jurídico', '#ff0000', '#ffffff', '2023-07-18 10:30:00', '2023-07-18 10:30:00', 'Penal'),
(28, 'fechas extremadamente importantes', 'la audiencia se realiza de manera precencial en el estudio jurídico', '#ff0000', '#ffffff', '2023-07-05 11:30:00', '2023-07-05 11:30:00', 'Penal'),
(29, 'importante pero no tan grave', 'la audiencia se realiza de manera virtual ', '#ff8800', '#ffffff', '2023-07-20 11:30:00', '2023-07-20 11:30:00', 'Penal'),
(30, 'relevante pero menos crítico', 'la audiencia se realiza de manera precencial', '#e1ff00', '#ffffff', '2023-07-28 13:30:00', '2023-07-28 13:30:00', 'civil'),
(31, 'importante pero sin gravedad', 'la audiencia se realiza de manera virtual via meet', '#00ff11', '#ffffff', '2023-07-24 09:30:00', '2023-07-24 09:30:00', 'Laboral');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `expediente`
--

CREATE TABLE `expediente` (
  `idExpediente` varchar(4) NOT NULL,
  `dniCliente` varchar(8) NOT NULL,
  `nomCliente` varchar(75) NOT NULL,
  `estadoExpediente` varchar(25) NOT NULL,
  `pagoExpediente` varchar(25) NOT NULL,
  `idProceso` varchar(2) DEFAULT NULL,
  `diaAudiencia` datetime DEFAULT NULL,
  `tipoReporte` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `expediente`
--

INSERT INTO `expediente` (`idExpediente`, `dniCliente`, `nomCliente`, `estadoExpediente`, `pagoExpediente`, `idProceso`, `diaAudiencia`, `tipoReporte`) VALUES
('1010', '74648681', 'Jerson Matamoros', 'proceso', 'cancelado', '11', '2023-07-18 20:45:49', NULL),
('1011', '87654321', 'Russbel Egoavil', 'Culminado', 'pendiente', '13', '2023-07-18 21:48:09', NULL),
('1014', '87659876', 'Marcelo', 'proceso', 'pendiente', '11', '2023-07-18 22:43:03', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `perfilusuario`
--

CREATE TABLE `perfilusuario` (
  `id_perfilusuario` varchar(5) NOT NULL,
  `per_nombre` varchar(100) NOT NULL,
  `per_modulo` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `perfilusuario`
--

INSERT INTO `perfilusuario` (`id_perfilusuario`, `per_nombre`, `per_modulo`) VALUES
('10001', 'Administrador', 'full'),
('10002', 'Secretaria', 'full');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `personal`
--

CREATE TABLE `personal` (
  `id_personal` varchar(5) NOT NULL,
  `per_nombre` varchar(50) NOT NULL,
  `per_apepaterno` varchar(50) NOT NULL,
  `per_celular` varchar(10) NOT NULL,
  `id_docidentidad` varchar(5) NOT NULL,
  `per_numdocumento` varchar(14) NOT NULL,
  `per_sexo` varchar(20) NOT NULL,
  `per_fechnacimiento` date NOT NULL,
  `per_fotourl` varchar(50) NOT NULL,
  `per_email` varchar(100) NOT NULL,
  `per_estado` bit(1) NOT NULL,
  `per_observaciones` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `personal`
--

INSERT INTO `personal` (`id_personal`, `per_nombre`, `per_apepaterno`, `per_celular`, `id_docidentidad`, `per_numdocumento`, `per_sexo`, `per_fechnacimiento`, `per_fotourl`, `per_email`, `per_estado`, `per_observaciones`) VALUES
('', '', '', '', '20001', '', '', '0000-00-00', 'mirutaafoto', '', b'1', 'Bueno'),
('11121', 'LEO', 'FLORES', '9999663', '20001', '4548787', 'Masculino', '2004-02-01', 'mirutaafoto', 'MIO@GMAIL.COM', b'1', 'Bueno'),
('41924', 'ruth', 'sanchez', '99999999', '20001', '41924044', 'Masculino', '1990-12-12', 'mirutaafoto', 'snachez@gmail.com', b'1', 'Bueno'),
('74407', 'Joyce', 'Ticlacuri', '945 675 76', '20001', '74407254', 'Masculino', '2001-10-28', 'mirutaafoto', 'joyce@gmail.com', b'1', 'Bueno'),
('74646', 'Claudio', 'Curasma Mendoza', '967 543 34', '20001', '74646765', 'Masculino', '0000-00-00', 'mirutaafoto', 'claudio@gmail.com', b'1', 'Bueno'),
('74648', 'Jerson', 'Matamoros Taipe', '935 629 71', '20001', '74648681', 'Masculino', '2003-04-28', 'mirutaafoto', 'jerson@gmail.com', b'1', 'Bueno'),
('76544', 'lucia', 'Montes Barbadillo', '985 745 75', '20001', '76544565', 'Femenino', '2005-05-16', 'mirutaafoto', 'lucia@gmail.com', b'1', 'Bueno'),
('77777', 'LEO', 'FLORES', '9999663', '20001', '4548787', 'Masculino', '2004-02-01', 'mirutaafoto', 'MIO@GMAIL.COM', b'1', 'Bueno'),
('87658', 'Maria', 'Villasana Lopez', '986 546 54', '20001', '87658645', 'Femenino', '2000-09-29', 'mirutaafoto', 'maria@gmail.com', b'1', 'Bueno'),
('88888', 'LEO', 'FLORES', '9999663', '20001', '4548787', 'Masculino', '2004-02-01', 'mirutaafoto', 'MIO@GMAIL.COM', b'1', 'Bueno'),
('90000', 'LEO', 'FLORES', '9999663', '20001', '4548787', 'Masculino', '2004-02-01', 'mirutaafoto', 'MIO@GMAIL.COM', b'1', 'Bueno'),
('90001', 'Yonatan', 'Paquiyauri', '99999999', '20001', '998961792', 'masculino', '1990-01-01', 'aaaaaa', 'aaaaa@aaaa.com', b'1', 'Bueno'),
('90002', 'Raul', 'Villar', '888888888', '20001', '20128974', 'masculino', '1990-01-02', 'bbbb', 'bbbbb@bbbb.com', b'1', 'Bueno'),
('98888', 'LEO', 'FLORES', '9999663', '20001', '4548787', 'Masculino', '2004-02-01', 'mirutaafoto', 'MIO@GMAIL.COM', b'1', 'Bueno');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proceso`
--

CREATE TABLE `proceso` (
  `idProceso` varchar(2) NOT NULL,
  `nomProceso` varchar(25) DEFAULT NULL,
  `otroProceso` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `proceso`
--

INSERT INTO `proceso` (`idProceso`, `nomProceso`, `otroProceso`) VALUES
('11', 'Civil', NULL),
('12', 'Laboral', NULL),
('13', 'Penal', NULL),
('14', 'Todos', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `schedule_list`
--

CREATE TABLE `schedule_list` (
  `id` varchar(8) NOT NULL,
  `title` varchar(8) NOT NULL,
  `description` varchar(255) NOT NULL,
  `start_datetime` datetime(6) NOT NULL,
  `end_datetime` datetime(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `schedule_list`
--

INSERT INTO `schedule_list` (`id`, `title`, `description`, `start_datetime`, `end_datetime`) VALUES
('', 'llegar', 'bieeeeas', '2023-05-09 01:18:00.000000', '2023-05-10 01:18:00.000000'),
('', 'llegar2', 'caray', '2023-05-10 01:18:00.000000', '2023-05-11 01:18:00.000000');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `treporte`
--

CREATE TABLE `treporte` (
  `idReporte` int(11) NOT NULL,
  `nomReporte` varchar(25) DEFAULT NULL,
  `otroReporte` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `treporte`
--

INSERT INTO `treporte` (`idReporte`, `nomReporte`, `otroReporte`) VALUES
(1, 'Mantencion', NULL),
(2, 'Violencia', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id_usuario` int(11) NOT NULL,
  `usu_codigo` varchar(10) NOT NULL,
  `usu_password` varchar(10) NOT NULL,
  `usu_estado` bit(1) NOT NULL,
  `id_perfilusuario` varchar(5) NOT NULL,
  `id_personal` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id_usuario`, `usu_codigo`, `usu_password`, `usu_estado`, `id_perfilusuario`, `id_personal`) VALUES
(1, 'jonatan', '12345678', b'1', '10001', '90001'),
(2, 'juana', '12345678', b'1', '10002', '90002'),
(6, 'ruth', '123456', b'1', '10001', '41924'),
(7, 'joyce', 'joyce123', b'1', '10002', '74407'),
(10, 'jerson', 'jerson123', b'1', '10001', '74648'),
(11, 'lucia', 'lucia1234', b'1', '10002', '76544'),
(12, 'maria', 'maria123', b'1', '10002', '87658'),
(13, 'claudio', 'claudio123', b'1', '10001', '74646');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `audiencias`
--
ALTER TABLE `audiencias`
  ADD PRIMARY KEY (`idAudiencia`);

--
-- Indices de la tabla `docidentidad`
--
ALTER TABLE `docidentidad`
  ADD PRIMARY KEY (`id_docidentidad`);

--
-- Indices de la tabla `eventos`
--
ALTER TABLE `eventos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `expediente`
--
ALTER TABLE `expediente`
  ADD PRIMARY KEY (`idExpediente`),
  ADD KEY `idProceso` (`idProceso`),
  ADD KEY `tipoReporte` (`tipoReporte`);

--
-- Indices de la tabla `perfilusuario`
--
ALTER TABLE `perfilusuario`
  ADD PRIMARY KEY (`id_perfilusuario`);

--
-- Indices de la tabla `personal`
--
ALTER TABLE `personal`
  ADD PRIMARY KEY (`id_personal`),
  ADD KEY `id_docidentidad` (`id_docidentidad`);

--
-- Indices de la tabla `proceso`
--
ALTER TABLE `proceso`
  ADD PRIMARY KEY (`idProceso`);

--
-- Indices de la tabla `treporte`
--
ALTER TABLE `treporte`
  ADD PRIMARY KEY (`idReporte`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id_usuario`),
  ADD KEY `id_perfilusuario` (`id_perfilusuario`),
  ADD KEY `id_personal` (`id_personal`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `audiencias`
--
ALTER TABLE `audiencias`
  MODIFY `idAudiencia` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `eventos`
--
ALTER TABLE `eventos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT de la tabla `treporte`
--
ALTER TABLE `treporte`
  MODIFY `idReporte` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `expediente`
--
ALTER TABLE `expediente`
  ADD CONSTRAINT `expediente_ibfk_1` FOREIGN KEY (`idProceso`) REFERENCES `proceso` (`idProceso`) ON DELETE CASCADE,
  ADD CONSTRAINT `expediente_ibfk_2` FOREIGN KEY (`tipoReporte`) REFERENCES `treporte` (`idReporte`) ON DELETE CASCADE;

--
-- Filtros para la tabla `personal`
--
ALTER TABLE `personal`
  ADD CONSTRAINT `personal_ibfk_1` FOREIGN KEY (`id_docidentidad`) REFERENCES `docidentidad` (`id_docidentidad`);

--
-- Filtros para la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `usuario_ibfk_1` FOREIGN KEY (`id_perfilusuario`) REFERENCES `perfilusuario` (`id_perfilusuario`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `usuario_ibfk_2` FOREIGN KEY (`id_personal`) REFERENCES `personal` (`id_personal`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
