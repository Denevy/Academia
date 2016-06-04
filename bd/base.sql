-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu1
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 04-06-2016 a las 00:27:49
-- Versión del servidor: 5.7.12-0ubuntu1
-- Versión de PHP: 7.0.4-7ubuntu2.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `siem`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoria`
--

CREATE TABLE `categoria` (
  `idcategoria` int(11) NOT NULL,
  `tipo` varchar(100) NOT NULL,
  `descripcion` varchar(1000) NOT NULL,
  `nivelAcademico_idnivelAcademico` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `categoria`
--

INSERT INTO `categoria` (`idcategoria`, `tipo`, `descripcion`, `nivelAcademico_idnivelAcademico`) VALUES
(3, 'Ciencias Exactas', 'Ciencias Exactas', 3),
(4, 'Literatura', 'Literatura', 3),
(5, 'Programacion', 'Programacion Algoritmos', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `curso`
--

CREATE TABLE `curso` (
  `idcurso` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `descripcion` varchar(1000) NOT NULL,
  `categoria_idcategoria` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `curso`
--

INSERT INTO `curso` (`idcurso`, `nombre`, `descripcion`, `categoria_idcategoria`) VALUES
(3, 'Matematicas', 'Algebra', 3),
(4, 'Fisica', 'Leyes de Newton', 3),
(5, 'Algoritmos', 'Algoritmos computacionales', 5),
(6, 'Caligrafia', 'Estudio de la Escritura', 4),
(8, 'Idiomas', 'Estudio de Idiomas', 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estado`
--

CREATE TABLE `estado` (
  `idestado` int(11) NOT NULL,
  `tipo` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `estado`
--

INSERT INTO `estado` (`idestado`, `tipo`) VALUES
(1, 'Activo'),
(2, 'Inactivo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Evaluacion`
--

CREATE TABLE `Evaluacion` (
  `idEvaluacion` int(11) NOT NULL,
  `curso` varchar(45) DEFAULT NULL,
  `estadoEvalucion` int(11) DEFAULT NULL,
  `idcurso` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `nivelAcademico`
--

CREATE TABLE `nivelAcademico` (
  `idnivelAcademico` int(11) NOT NULL,
  `grado` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `nivelAcademico`
--

INSERT INTO `nivelAcademico` (`idnivelAcademico`, `grado`) VALUES
(3, '1ero. Basico'),
(1, 'Universitario');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `opcion`
--

CREATE TABLE `opcion` (
  `idopcion` int(11) NOT NULL,
  `nombre` varchar(45) DEFAULT NULL,
  `Preguntas_idPreguntas` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Preguntas`
--

CREATE TABLE `Preguntas` (
  `idPreguntas` int(11) NOT NULL,
  `pregunta` varchar(45) DEFAULT NULL,
  `Evaluacion_idEvaluacion` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rol`
--

CREATE TABLE `rol` (
  `idrol` int(11) NOT NULL,
  `privilegio` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `rol`
--

INSERT INTO `rol` (`idrol`, `privilegio`) VALUES
(1, 'Administrador'),
(2, 'Estudiante');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `idusuario` int(11) NOT NULL,
  `alias` varchar(45) NOT NULL,
  `nombres` varchar(45) NOT NULL,
  `apellidos` varchar(45) NOT NULL,
  `edad` int(11) NOT NULL,
  `password` varchar(45) NOT NULL,
  `estado_idestado` int(11) NOT NULL,
  `rol_idrol` int(11) NOT NULL,
  `nivelAcademico_idnivelAcademico` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`idusuario`, `alias`, `nombres`, `apellidos`, `edad`, `password`, `estado_idestado`, `rol_idrol`, `nivelAcademico_idnivelAcademico`) VALUES
(1, 'admin', 'Denevy', 'Saquic', 25, 'd033e22ae348aeb5660fc2140aec35850c4da997', 1, 1, 1),
(2, 'Alex', 'Alexander', 'Saquic', 25, '60c6d277a8bd81de7fdde19201bf9c58a3df08f4', 1, 2, 3);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`idcategoria`),
  ADD UNIQUE KEY `idcategoria_UNIQUE` (`idcategoria`),
  ADD UNIQUE KEY `tipo_UNIQUE` (`tipo`),
  ADD KEY `fk_categoria_nivelAcademico1_idx` (`nivelAcademico_idnivelAcademico`);

--
-- Indices de la tabla `curso`
--
ALTER TABLE `curso`
  ADD PRIMARY KEY (`idcurso`),
  ADD UNIQUE KEY `idcurso_UNIQUE` (`idcurso`),
  ADD UNIQUE KEY `nombre_UNIQUE` (`nombre`),
  ADD KEY `fk_curso_categoria1_idx` (`categoria_idcategoria`);

--
-- Indices de la tabla `estado`
--
ALTER TABLE `estado`
  ADD PRIMARY KEY (`idestado`),
  ADD UNIQUE KEY `tipo_UNIQUE` (`tipo`),
  ADD UNIQUE KEY `idestado_UNIQUE` (`idestado`);

--
-- Indices de la tabla `Evaluacion`
--
ALTER TABLE `Evaluacion`
  ADD PRIMARY KEY (`idEvaluacion`);

--
-- Indices de la tabla `nivelAcademico`
--
ALTER TABLE `nivelAcademico`
  ADD PRIMARY KEY (`idnivelAcademico`),
  ADD UNIQUE KEY `idnivelAcademico_UNIQUE` (`idnivelAcademico`),
  ADD UNIQUE KEY `grado_UNIQUE` (`grado`);

--
-- Indices de la tabla `opcion`
--
ALTER TABLE `opcion`
  ADD PRIMARY KEY (`idopcion`),
  ADD KEY `fk_opcion_Preguntas1_idx` (`Preguntas_idPreguntas`);

--
-- Indices de la tabla `Preguntas`
--
ALTER TABLE `Preguntas`
  ADD PRIMARY KEY (`idPreguntas`),
  ADD KEY `fk_Preguntas_Evaluacion1_idx` (`Evaluacion_idEvaluacion`);

--
-- Indices de la tabla `rol`
--
ALTER TABLE `rol`
  ADD PRIMARY KEY (`idrol`),
  ADD UNIQUE KEY `privilegio_UNIQUE` (`privilegio`),
  ADD UNIQUE KEY `idrol_UNIQUE` (`idrol`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`idusuario`),
  ADD UNIQUE KEY `alias_UNIQUE` (`alias`),
  ADD UNIQUE KEY `idusuario_UNIQUE` (`idusuario`),
  ADD KEY `fk_usuario_estado_idx` (`estado_idestado`),
  ADD KEY `fk_usuario_rol1_idx` (`rol_idrol`),
  ADD KEY `fk_usuario_nivelAcademico1_idx` (`nivelAcademico_idnivelAcademico`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categoria`
--
ALTER TABLE `categoria`
  MODIFY `idcategoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT de la tabla `curso`
--
ALTER TABLE `curso`
  MODIFY `idcurso` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT de la tabla `estado`
--
ALTER TABLE `estado`
  MODIFY `idestado` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `nivelAcademico`
--
ALTER TABLE `nivelAcademico`
  MODIFY `idnivelAcademico` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `rol`
--
ALTER TABLE `rol`
  MODIFY `idrol` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `idusuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `categoria`
--
ALTER TABLE `categoria`
  ADD CONSTRAINT `fk_categoria_nivelAcademico1` FOREIGN KEY (`nivelAcademico_idnivelAcademico`) REFERENCES `nivelAcademico` (`idnivelAcademico`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `curso`
--
ALTER TABLE `curso`
  ADD CONSTRAINT `fk_curso_categoria1` FOREIGN KEY (`categoria_idcategoria`) REFERENCES `categoria` (`idcategoria`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `opcion`
--
ALTER TABLE `opcion`
  ADD CONSTRAINT `fk_opcion_Preguntas1` FOREIGN KEY (`Preguntas_idPreguntas`) REFERENCES `Preguntas` (`idPreguntas`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `Preguntas`
--
ALTER TABLE `Preguntas`
  ADD CONSTRAINT `fk_Preguntas_Evaluacion1` FOREIGN KEY (`Evaluacion_idEvaluacion`) REFERENCES `Evaluacion` (`idEvaluacion`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `fk_usuario_estado` FOREIGN KEY (`estado_idestado`) REFERENCES `estado` (`idestado`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_usuario_nivelAcademico1` FOREIGN KEY (`nivelAcademico_idnivelAcademico`) REFERENCES `nivelAcademico` (`idnivelAcademico`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_usuario_rol1` FOREIGN KEY (`rol_idrol`) REFERENCES `rol` (`idrol`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
