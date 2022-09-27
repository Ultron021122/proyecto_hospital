-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 27-09-2022 a las 19:09:46
-- Versión del servidor: 10.4.24-MariaDB
-- Versión de PHP: 8.0.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `usuario`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `citas`
--

CREATE TABLE `citas` (
  `CURP_paciente` varchar(18) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `CURP_medico` varchar(18) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `fecha` date NOT NULL,
  `hora` time NOT NULL,
  `Codigo_cita` bigint(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `diagnosticos`
--

CREATE TABLE `diagnosticos` (
  `Num_expediente` bigint(15) NOT NULL,
  `Fecha_observacion` date NOT NULL,
  `Hora` time NOT NULL,
  `Observacion` text CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `Nombre_medico` varchar(35) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `Last_name` varchar(150) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `ID` bigint(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `expediente`
--

CREATE TABLE `expediente` (
  `Nombre_paciente` varchar(35) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `Last_name` varchar(150) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `CURP` varchar(18) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `Domicilio_paciente` varchar(150) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `Telefono_contacto` bigint(15) NOT NULL,
  `Sexo` varchar(15) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `Edad` int(3) NOT NULL,
  `Num_expediente` bigint(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `medico`
--

CREATE TABLE `medico` (
  `CURP` varchar(18) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `Domicilio` varchar(150) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `Nombre` varchar(35) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `First_name` varchar(150) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `Especialidad` varchar(35) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `Telefono_contacto` bigint(15) NOT NULL,
  `Fecha_contratacion` date NOT NULL,
  `Sexo` varchar(20) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `Edad` int(11) NOT NULL,
  `Email` varchar(255) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `medico`
--

INSERT INTO `medico` (`CURP`, `Domicilio`, `Nombre`, `First_name`, `Especialidad`, `Telefono_contacto`, `Fecha_contratacion`, `Sexo`, `Edad`, `Email`) VALUES
('MALS021122HJCRPBA8', '95 Monte Alban, CD. Aztlán, Tonalá, Jalisco, México', 'Sebastián', 'Martínez López', 'Oftalmología', 3320302203, '2018-02-15', 'Masculino', 19, 'sebastian.martinez7643@alumnos.udg.mx');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `paciente`
--

CREATE TABLE `paciente` (
  `Nombre` varchar(45) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `Last_name` varchar(150) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `CURP` varchar(18) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `Domicilio` varchar(150) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `Telefono_contacto` bigint(20) NOT NULL,
  `Sexo` varchar(20) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `Edad` int(3) NOT NULL,
  `Email` varchar(255) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `recepcionista`
--

CREATE TABLE `recepcionista` (
  `CURP` varchar(18) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `Nombre` varchar(35) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `First_name` varchar(150) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `Domicilio` varchar(150) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `Telefono_contacto` bigint(20) NOT NULL,
  `Fecha_contratacion` date NOT NULL,
  `Sexo` varchar(20) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `Edad` int(3) NOT NULL,
  `Email` varchar(255) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

CREATE TABLE `roles` (
  `id` int(2) NOT NULL,
  `rol` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `roles`
--

INSERT INTO `roles` (`id`, `rol`) VALUES
(1, 'administrador'),
(2, 'recepcionista'),
(3, 'medico');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sesion`
--

CREATE TABLE `sesion` (
  `idUsuario` int(10) NOT NULL,
  `Nombre_usuario` varchar(30) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `Password` varchar(60) CHARACTER SET utf8 NOT NULL,
  `rol_id` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `sesion`
--

INSERT INTO `sesion` (`idUsuario`, `Nombre_usuario`, `Password`, `rol_id`) VALUES
(1, 'admin', '1234', 1),
(2, 'recepcionista', '1234', 2),
(3, 'MALS021122HJCRPBA8', '$2y$10$aaXnVXHGjsYXImb.Q8qNzeaASIyVpwCYsaCmcihhuiQppVUONgxz.', 3);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `citas`
--
ALTER TABLE `citas`
  ADD PRIMARY KEY (`Codigo_cita`),
  ADD KEY `curpmedico` (`CURP_medico`),
  ADD KEY `curppaciente` (`CURP_paciente`);

--
-- Indices de la tabla `diagnosticos`
--
ALTER TABLE `diagnosticos`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `numexpediente` (`Num_expediente`);

--
-- Indices de la tabla `expediente`
--
ALTER TABLE `expediente`
  ADD PRIMARY KEY (`Num_expediente`),
  ADD KEY `RCURP` (`CURP`);

--
-- Indices de la tabla `medico`
--
ALTER TABLE `medico`
  ADD PRIMARY KEY (`CURP`);

--
-- Indices de la tabla `paciente`
--
ALTER TABLE `paciente`
  ADD PRIMARY KEY (`CURP`);

--
-- Indices de la tabla `recepcionista`
--
ALTER TABLE `recepcionista`
  ADD PRIMARY KEY (`CURP`);

--
-- Indices de la tabla `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `sesion`
--
ALTER TABLE `sesion`
  ADD PRIMARY KEY (`idUsuario`),
  ADD KEY `roles_id` (`rol_id`),
  ADD KEY `sesionrecep` (`Nombre_usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `citas`
--
ALTER TABLE `citas`
  MODIFY `Codigo_cita` bigint(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `diagnosticos`
--
ALTER TABLE `diagnosticos`
  MODIFY `ID` bigint(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `expediente`
--
ALTER TABLE `expediente`
  MODIFY `Num_expediente` bigint(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `sesion`
--
ALTER TABLE `sesion`
  MODIFY `idUsuario` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `citas`
--
ALTER TABLE `citas`
  ADD CONSTRAINT `curpmedico` FOREIGN KEY (`CURP_medico`) REFERENCES `medico` (`CURP`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `curppaciente` FOREIGN KEY (`CURP_paciente`) REFERENCES `paciente` (`CURP`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `diagnosticos`
--
ALTER TABLE `diagnosticos`
  ADD CONSTRAINT `numexpediente` FOREIGN KEY (`Num_expediente`) REFERENCES `expediente` (`Num_expediente`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `expediente`
--
ALTER TABLE `expediente`
  ADD CONSTRAINT `RCURP` FOREIGN KEY (`CURP`) REFERENCES `paciente` (`CURP`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `sesion`
--
ALTER TABLE `sesion`
  ADD CONSTRAINT `roles_id` FOREIGN KEY (`rol_id`) REFERENCES `roles` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
