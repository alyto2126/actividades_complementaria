-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 30-10-2017 a las 18:53:37
-- Versión del servidor: 10.1.19-MariaDB
-- Versión de PHP: 5.6.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `solicitudes`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `act_complementaria`
--

CREATE TABLE `act_complementaria` (
  `clave_act` int(11) NOT NULL,
  `nombre_act` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `act_complementaria`
--

INSERT INTO `act_complementaria` (`clave_act`, `nombre_act`) VALUES
(1, 'Tutorias'),
(2, 'Ajedrez'),
(5, 'musica'),
(7, 'zumba'),
(8, 'fotografia');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `carrera`
--

CREATE TABLE `carrera` (
  `clave_carrera` varchar(45) NOT NULL,
  `nombre_carrera` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `carrera`
--

INSERT INTO `carrera` (`clave_carrera`, `nombre_carrera`) VALUES
('COPU-2010-205', 'Contador Publico'),
('IAMD-2010-213', 'Ingeniería en Administración'),
('ICIV-2010-203', 'Ingenieria Civil'),
('IINF-2010-220', 'Ingeniería en Informática'),
('LADM-2010-234', 'Licenciatura en Administración'),
('LBIO-2010-233', 'Licenciatura en Biologia');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `departamento`
--

CREATE TABLE `departamento` (
  `clave_depa` varchar(45) NOT NULL,
  `nombre_departamento` varchar(45) DEFAULT NULL,
  `trabajador_rfc` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `departamento`
--

INSERT INTO `departamento` (`clave_depa`, `nombre_departamento`, `trabajador_rfc`) VALUES
('1', 'Servicios Escolares', 'GOVL801204159'),
('2', 'Desarrollo Academico', 'ARSAME873625');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estudiante`
--

CREATE TABLE `estudiante` (
  `No_control` int(11) NOT NULL,
  `nombre_estudiante` varchar(45) DEFAULT NULL,
  `apellido_p_estudiante` varchar(45) DEFAULT NULL,
  `apellido_m_estudiante` varchar(45) DEFAULT NULL,
  `semestre` varchar(45) DEFAULT NULL,
  `clave_carrera` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `estudiante`
--

INSERT INTO `estudiante` (`No_control`, `nombre_estudiante`, `apellido_p_estudiante`, `apellido_m_estudiante`, `semestre`, `clave_carrera`) VALUES
(15930159, 'Citlali', 'Arroyo', 'Romero', 'V', 'IINF-2010-220'),
(15930178, 'Jorge', 'Roque', 'Pineda', 'V', 'IINF-2010-220'),
(15930194, 'Jorge Luis', 'Ocampo', 'Millan', 'V', 'IINF-2010-220'),
(15930212, 'Judith Selenia', 'Sanchez ', 'Gallardo', 'V', 'IINF-2010-220');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `instituto`
--

CREATE TABLE `instituto` (
  `clave` varchar(45) NOT NULL,
  `nombre_instituto` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `instituto`
--

INSERT INTO `instituto` (`clave`, `nombre_instituto`) VALUES
('16ZIT00367', 'Instituto Superio de Huetamo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `instructor`
--

CREATE TABLE `instructor` (
  `rfc` varchar(45) NOT NULL,
  `nombre_instructor` varchar(45) DEFAULT NULL,
  `apellido_p_instructor` varchar(45) DEFAULT NULL,
  `apellido_m_instructor` varchar(45) DEFAULT NULL,
  `act_complementaria_clave_act` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `instructor`
--

INSERT INTO `instructor` (`rfc`, `nombre_instructor`, `apellido_p_instructor`, `apellido_m_instructor`, `act_complementaria_clave_act`) VALUES
('DLCGA87638', 'Daniel', 'Macedonio', 'Toledo', 2),
('GAVECS1637', 'Cesar Sandino', 'Garcia', 'Vega', 2),
('GOVL801204159', 'Leonel', 'González', 'Vidales', 1),
('MACAD1672', 'Mario de Jesus', 'Carranza ', 'Diaz', 5);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `solicitud`
--

CREATE TABLE `solicitud` (
  `folio` int(11) NOT NULL,
  `asunto` varchar(45) DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  `lugar` varchar(45) DEFAULT NULL,
  `instituto_clave` varchar(45) NOT NULL,
  `instructor_rfc` varchar(45) NOT NULL,
  `estudiante_No_contro` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `solicitud`
--

INSERT INTO `solicitud` (`folio`, `asunto`, `fecha`, `lugar`, `instituto_clave`, `instructor_rfc`, `estudiante_No_contro`) VALUES
(1, 'ingreso', '2017-10-02', 'Ciudad Altamirano', '16ZIT00367', 'GOVL801204159', 15930159);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `trabajador`
--

CREATE TABLE `trabajador` (
  `rfc` varchar(45) NOT NULL,
  `nombre_trabajador` varchar(45) DEFAULT NULL,
  `apellido_p_trabajador` varchar(45) DEFAULT NULL,
  `apellido_m_trabajador` varchar(45) DEFAULT NULL,
  `clave_presupuestal` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `trabajador`
--

INSERT INTO `trabajador` (`rfc`, `nombre_trabajador`, `apellido_p_trabajador`, `apellido_m_trabajador`, `clave_presupuestal`) VALUES
('ARSAME873625', 'Aracely', 'Salgado', 'Mendoza', '2'),
('CESAGAVE7765', 'Cesar Sandino', 'Garcia', 'Vega', '4'),
('GOVL801204159', 'Leonel', 'González', 'Vidales', '3');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `act_complementaria`
--
ALTER TABLE `act_complementaria`
  ADD PRIMARY KEY (`clave_act`);

--
-- Indices de la tabla `carrera`
--
ALTER TABLE `carrera`
  ADD PRIMARY KEY (`clave_carrera`);

--
-- Indices de la tabla `departamento`
--
ALTER TABLE `departamento`
  ADD PRIMARY KEY (`clave_depa`),
  ADD KEY `fk_departamento_trabajador1_idx` (`trabajador_rfc`);

--
-- Indices de la tabla `estudiante`
--
ALTER TABLE `estudiante`
  ADD PRIMARY KEY (`No_control`,`clave_carrera`),
  ADD KEY `fk_estudiante_carrera1_idx` (`clave_carrera`);

--
-- Indices de la tabla `instituto`
--
ALTER TABLE `instituto`
  ADD PRIMARY KEY (`clave`);

--
-- Indices de la tabla `instructor`
--
ALTER TABLE `instructor`
  ADD PRIMARY KEY (`rfc`),
  ADD KEY `fk_instructor_act_complementaria_idx` (`act_complementaria_clave_act`);

--
-- Indices de la tabla `solicitud`
--
ALTER TABLE `solicitud`
  ADD PRIMARY KEY (`folio`),
  ADD KEY `fk_solicitud_instituto1_idx` (`instituto_clave`),
  ADD KEY `fk_solicitud_instructor1_idx` (`instructor_rfc`),
  ADD KEY `fk_solicitud_estudiante1_idx` (`estudiante_No_contro`);

--
-- Indices de la tabla `trabajador`
--
ALTER TABLE `trabajador`
  ADD PRIMARY KEY (`rfc`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `solicitud`
--
ALTER TABLE `solicitud`
  MODIFY `folio` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `departamento`
--
ALTER TABLE `departamento`
  ADD CONSTRAINT `fk_departamento_trabajador1` FOREIGN KEY (`trabajador_rfc`) REFERENCES `trabajador` (`rfc`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `estudiante`
--
ALTER TABLE `estudiante`
  ADD CONSTRAINT `fk_estudiante_carrera1` FOREIGN KEY (`clave_carrera`) REFERENCES `carrera` (`clave_carrera`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `instructor`
--
ALTER TABLE `instructor`
  ADD CONSTRAINT `fk_instructor_act_complementaria` FOREIGN KEY (`act_complementaria_clave_act`) REFERENCES `act_complementaria` (`clave_act`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `solicitud`
--
ALTER TABLE `solicitud`
  ADD CONSTRAINT `fk_solicitud_estudiante1` FOREIGN KEY (`estudiante_No_contro`) REFERENCES `estudiante` (`No_control`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_solicitud_instituto1` FOREIGN KEY (`instituto_clave`) REFERENCES `instituto` (`clave`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_solicitud_instructor1` FOREIGN KEY (`instructor_rfc`) REFERENCES `instructor` (`rfc`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
