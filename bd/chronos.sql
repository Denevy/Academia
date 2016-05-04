-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 13-11-2015 a las 07:57:16
-- Versión del servidor: 5.6.16
-- Versión de PHP: 5.5.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `chronos`
--

DELIMITER $$
--
-- Procedimientos
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `DETPROGRA`(IN DPROGRA INT)
BEGIN
SELECT * FROM DETALLEPROGRAMACION DPRO
INNER JOIN DOCENTE AS DOC ON DPRO.FK_IDDOCENTE=DOC.IDDOCENTE
INNER JOIN RESTRICCIONDOCENTE RDOC ON DOC.FK_IDRESTRICCIONPROGRAMACION=RDOC.IDRESTRICCIONPROGRAMACION
INNER JOIN DIA ON DIA.IDDIA=DPRO.FK_IDDIA
INNER JOIN CURSO ON CURSO.IDCURSO = DPRO.FK_IDCURSO
WHERE DPRO.FK_IDENCABEZADOPROG = DPROGRA
ORDER BY DIA.NOMBREDIA DESC;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `PROGRA`(IN CENTRO INT, CARRERA INT)
BEGIN
SELECT * FROM PROGRAMACION AS PRO
INNER JOIN PENSUM AS PEN ON PRO.FK_IDPENSUM=PEN.IDPENSUM
INNER JOIN CICLO AS CC ON PRO.FK_IDCICLO=CC.IDCICLO
INNER JOIN SECCIONES AS SEC ON PRO.FK_IDSECCIONES=SEC.IDSECCIONES
WHERE PEN.FK_IDCENTROU = CENTRO AND FK_IDCARRERA =CARRERA
ORDER BY PRO.FECHA, PEN.ANIOPENSUM, SEC.NOMBRESECCION ASC;
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `carrera`
--

CREATE TABLE IF NOT EXISTS `carrera` (
  `idcarrera` int(11) NOT NULL AUTO_INCREMENT,
  `codigoCarrera` varchar(10) NOT NULL,
  `nombreCarrera` varchar(45) NOT NULL,
  PRIMARY KEY (`idcarrera`),
  UNIQUE KEY `codigoCarrera_UNIQUE` (`codigoCarrera`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=14 ;

--
-- Volcado de datos para la tabla `carrera`
--

INSERT INTO `carrera` (`idcarrera`, `codigoCarrera`, `nombreCarrera`) VALUES
(8, '80', 'Ingenieria en Sitemas'),
(9, '08', 'Derecho'),
(12, '90', 'INGENIERIA EN SISTEMAS PLAN FIN DE SEMANA'),
(13, '12', 'INGENIERIA INDUSTRIAL, ESCUINTLA');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `centrou`
--

CREATE TABLE IF NOT EXISTS `centrou` (
  `idcentroU` int(11) NOT NULL AUTO_INCREMENT,
  `codigoCentroU` varchar(10) NOT NULL,
  `nombreCentroU` varchar(45) NOT NULL,
  PRIMARY KEY (`idcentroU`),
  UNIQUE KEY `codigoCentroU_UNIQUE` (`codigoCentroU`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=11 ;

--
-- Volcado de datos para la tabla `centrou`
--

INSERT INTO `centrou` (`idcentroU`, `codigoCentroU`, `nombreCentroU`) VALUES
(1, '10', 'COATEPEQUE'),
(2, '01', 'GUATEMALA'),
(3, '02', 'EL PROGRESO'),
(4, '03', 'SACATEPEQUEZ'),
(5, '04', 'CHIMALTENANGO'),
(6, '05', 'ESCUINTLA'),
(7, '06', 'SANTA ROSA'),
(8, '07', 'SOLOLA'),
(9, '08', 'TOTONICAPAN'),
(10, '09', 'QUETZALTENANGO');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ciclo`
--

CREATE TABLE IF NOT EXISTS `ciclo` (
  `idciclo` int(11) NOT NULL AUTO_INCREMENT,
  `nombreCiclo` varchar(15) NOT NULL,
  PRIMARY KEY (`idciclo`),
  UNIQUE KEY `nombreCiclo_UNIQUE` (`nombreCiclo`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Volcado de datos para la tabla `ciclo`
--

INSERT INTO `ciclo` (`idciclo`, `nombreCiclo`) VALUES
(4, 'CUARTO'),
(1, 'PRIMERO'),
(5, 'QUINTO'),
(2, 'SEGUNDO'),
(6, 'SEXTO'),
(3, 'TERCERO');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `curso`
--

CREATE TABLE IF NOT EXISTS `curso` (
  `idcurso` int(11) NOT NULL AUTO_INCREMENT,
  `codigoCurso` varchar(10) NOT NULL,
  `nombreCurso` varchar(45) NOT NULL,
  `lab` varchar(10) NOT NULL,
  PRIMARY KEY (`idcurso`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9 ;

--
-- Volcado de datos para la tabla `curso`
--

INSERT INTO `curso` (`idcurso`, `codigoCurso`, `nombreCurso`, `lab`) VALUES
(1, '401', 'DESARROLLO HUMANO Y PROFESIONAL', 'No'),
(2, '402', 'LOGICA', 'No'),
(3, '403', 'MATEMATICA BASICA', 'No'),
(4, '404', 'INTRODUCCION A LOS SISTEMAS DE COMPUTO*', 'Si'),
(5, '451', 'CONTABILIDAD GENERAL', 'No'),
(6, '407', 'ALGORITMOS*', 'Si'),
(7, '409', 'COMUNICACION ORAL Y ESCRITA', 'No'),
(8, '452', 'CONTABILIDAD ADMINISTRATIVA', 'Si');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detallepensum`
--

CREATE TABLE IF NOT EXISTS `detallepensum` (
  `iddetallepensum` int(11) NOT NULL AUTO_INCREMENT,
  `fk_idcurso` int(11) NOT NULL,
  `fk_idciclo` int(11) NOT NULL,
  `fk_idpensum` int(11) NOT NULL,
  PRIMARY KEY (`iddetallepensum`),
  KEY `fk_detallepensum_curso1_idx` (`fk_idcurso`),
  KEY `fk_detallepensum_ciclo1_idx` (`fk_idciclo`),
  KEY `fk_detallepensum_pensum1_idx` (`fk_idpensum`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=26 ;

--
-- Volcado de datos para la tabla `detallepensum`
--

INSERT INTO `detallepensum` (`iddetallepensum`, `fk_idcurso`, `fk_idciclo`, `fk_idpensum`) VALUES
(2, 1, 1, 1),
(3, 4, 1, 1),
(4, 5, 1, 3),
(5, 3, 2, 1),
(6, 6, 2, 1),
(7, 7, 2, 1),
(9, 1, 1, 1),
(10, 1, 1, 1),
(12, 2, 1, 1),
(14, 1, 1, 3),
(15, 1, 1, 1),
(16, 2, 1, 1),
(17, 5, 1, 1),
(18, 6, 2, 1),
(20, 5, 5, 1),
(21, 3, 5, 1),
(23, 1, 1, 1),
(24, 1, 1, 5),
(25, 5, 2, 5);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalleprogramacion`
--

CREATE TABLE IF NOT EXISTS `detalleprogramacion` (
  `idhorarios` int(11) NOT NULL AUTO_INCREMENT,
  `horaIni` time NOT NULL,
  `horaFin` time NOT NULL,
  `fk_iddia` int(11) NOT NULL,
  `fk_iddocente` int(11) DEFAULT NULL,
  `fk_idcurso` int(11) DEFAULT NULL,
  `fk_idencabezadoProg` int(11) NOT NULL,
  PRIMARY KEY (`idhorarios`),
  KEY `fk_horarios_dias1_idx` (`fk_iddia`),
  KEY `fk_programacion_docente1_idx` (`fk_iddocente`),
  KEY `fk_programacion_curso1_idx` (`fk_idcurso`),
  KEY `fk_programacion_encabezadoProg1_idx` (`fk_idencabezadoProg`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=37 ;

--
-- Volcado de datos para la tabla `detalleprogramacion`
--

INSERT INTO `detalleprogramacion` (`idhorarios`, `horaIni`, `horaFin`, `fk_iddia`, `fk_iddocente`, `fk_idcurso`, `fk_idencabezadoProg`) VALUES
(20, '09:00:00', '11:00:00', 6, 1, 1, 1),
(23, '07:00:00', '09:00:00', 6, 1, 7, 34),
(24, '11:00:00', '13:00:00', 6, 2, 6, 1),
(25, '09:00:00', '11:00:00', 6, 2, 6, 1),
(26, '14:00:00', '16:00:00', 6, 1, 6, 1),
(27, '07:00:00', '09:00:00', 1, 1, 1, 45),
(28, '07:00:00', '09:00:00', 6, 1, 4, 1),
(29, '09:00:00', '11:00:00', 1, 2, 2, 45),
(33, '07:00:00', '09:00:00', 1, 2, 3, 46),
(34, '11:00:00', '13:00:00', 1, 2, 4, 45),
(35, '13:00:00', '14:00:00', 1, 2, 5, 47),
(36, '07:00:00', '09:00:00', 6, 2, 4, 1);

--
-- Disparadores `detalleprogramacion`
--
DROP TRIGGER IF EXISTS `horas_docente`;
DELIMITER //
CREATE TRIGGER `horas_docente` BEFORE INSERT ON `detalleprogramacion`
 FOR EACH ROW begin
DECLARE msng VARCHAR(255);


   
    IF EXISTS (SELECT * FROM detalleprogramacion WHERE fk_iddia = NEW.fk_iddia
								 and fk_iddocente = NEW.fk_iddocente
								 and ((NEW.horaIni >= horaIni AND NEW.horaFin <= horaFin) 
                                       OR (horaIni >= NEW.horaIni AND horaFin <= NEW.horaFin)
									   OR (( NEW.horaIni >= horaIni AND NEW.horaIni  <   horaFin) AND NEW.horaFin >=  horaFin)  
									   OR (NEW.horaIni <=  horaIni  AND  (NEW.horaFin > horaIni AND NEW.horaFin <=   horaFin) )  
)	
								) THEN

        SET msng= concat('TriggerERROR: "',NEW.fk_idencabezadoProg,',',NEW.fk_iddia,',',NEW.fk_iddocente,',',NEW.horaIni,',',NEW.horaFin,'" . Ya existe en este horario'); 
         signal sqlstate '45000' SET message_text = msng;
    END IF;
    

END
//
DELIMITER ;
DROP TRIGGER IF EXISTS `horas_docente_Up`;
DELIMITER //
CREATE TRIGGER `horas_docente_Up` BEFORE UPDATE ON `detalleprogramacion`
 FOR EACH ROW begin
DECLARE msng VARCHAR(255);
   
    IF EXISTS (SELECT * FROM detalleprogramacion WHERE fk_iddia = NEW.fk_iddia
								 and fk_iddocente = NEW.fk_iddocente
								 and ((NEW.horaIni >= horaIni AND NEW.horaFin <= horaFin) 
                                       OR (horaIni >= NEW.horaIni AND horaFin <= NEW.horaFin)
									   OR (( NEW.horaIni >= horaIni AND NEW.horaIni  <   horaFin) AND NEW.horaFin >=  horaFin)  
									   OR (NEW.horaIni <=  horaIni  AND  (NEW.horaFin > horaIni AND NEW.horaFin <=   horaFin) )  
)	
								) THEN

        SET msng= concat('TriggerERROR: "',NEW.fk_idencabezadoProg,',',NEW.fk_iddia,',',NEW.fk_iddocente,',',NEW.horaIni,',',NEW.horaFin,'" . Ya existe en este horario'); 
         signal sqlstate '45000' SET message_text = msng;
    END IF;
    

END
//
DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `dia`
--

CREATE TABLE IF NOT EXISTS `dia` (
  `iddia` int(11) NOT NULL AUTO_INCREMENT,
  `nombreDia` varchar(15) NOT NULL,
  PRIMARY KEY (`iddia`),
  UNIQUE KEY `nombreDias_UNIQUE` (`nombreDia`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

--
-- Volcado de datos para la tabla `dia`
--

INSERT INTO `dia` (`iddia`, `nombreDia`) VALUES
(7, 'Domingo'),
(4, 'Jueves'),
(1, 'Lunes'),
(2, 'Martes'),
(3, 'Miercoles'),
(6, 'Sabado'),
(5, 'Viernes');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `docente`
--

CREATE TABLE IF NOT EXISTS `docente` (
  `iddocente` int(11) NOT NULL AUTO_INCREMENT,
  `carnet` varchar(45) NOT NULL,
  `nombre` varchar(45) NOT NULL,
  `profesion` varchar(45) NOT NULL,
  `telefono` int(11) DEFAULT NULL,
  `correo` varchar(45) DEFAULT NULL,
  `fk_idEstados` int(11) NOT NULL,
  `fk_idrestriccionprogramacion` int(11) DEFAULT NULL,
  PRIMARY KEY (`iddocente`),
  KEY `fk_docente_estados1_idx` (`fk_idEstados`),
  KEY `fk_docente_restricciondocente1_idx` (`fk_idrestriccionprogramacion`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `docente`
--

INSERT INTO `docente` (`iddocente`, `carnet`, `nombre`, `profesion`, `telefono`, `correo`, `fk_idEstados`, `fk_idrestriccionprogramacion`) VALUES
(1, '10', 'LIZA CASTILLO', 'ING ELECTRONICA', 55555555, 'UMG1@.COM', 1, 1),
(2, '11', 'BYRON ANLEU', 'ING EN SISTEMAS', 88888888, 'UMG@.COM', 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estados`
--

CREATE TABLE IF NOT EXISTS `estados` (
  `idEstados` int(11) NOT NULL AUTO_INCREMENT,
  `NombreEstado` varchar(45) NOT NULL,
  PRIMARY KEY (`idEstados`),
  UNIQUE KEY `NombreEstado_UNIQUE` (`NombreEstado`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `estados`
--

INSERT INTO `estados` (`idEstados`, `NombreEstado`) VALUES
(1, 'Activo'),
(2, 'Suspendido');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `nivelacceso`
--

CREATE TABLE IF NOT EXISTS `nivelacceso` (
  `idNivelAcceso` int(11) NOT NULL AUTO_INCREMENT,
  `privilegio` varchar(45) NOT NULL,
  PRIMARY KEY (`idNivelAcceso`),
  UNIQUE KEY `privilegio_UNIQUE` (`privilegio`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Volcado de datos para la tabla `nivelacceso`
--

INSERT INTO `nivelacceso` (`idNivelAcceso`, `privilegio`) VALUES
(1, 'Administrador'),
(2, 'Coord Carrera'),
(3, 'Coord Centro U');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pensum`
--

CREATE TABLE IF NOT EXISTS `pensum` (
  `idpensum` int(11) NOT NULL AUTO_INCREMENT,
  `anioPensum` varchar(45) NOT NULL,
  `fk_idcentroU` int(11) NOT NULL,
  `fk_idcarrera` int(11) NOT NULL,
  PRIMARY KEY (`idpensum`),
  KEY `fk_pensum_centroU_idx` (`fk_idcentroU`),
  KEY `fk_pensum_carrera1_idx` (`fk_idcarrera`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Volcado de datos para la tabla `pensum`
--

INSERT INTO `pensum` (`idpensum`, `anioPensum`, `fk_idcentroU`, `fk_idcarrera`) VALUES
(1, '2005', 1, 8),
(2, '2010', 1, 9),
(3, '2011', 8, 12),
(5, '2015', 8, 12);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `programacion`
--

CREATE TABLE IF NOT EXISTS `programacion` (
  `idencabezadoProg` int(11) NOT NULL AUTO_INCREMENT,
  `fecha` date NOT NULL,
  `fk_idusuario` int(11) NOT NULL,
  `fk_idpensum` int(11) NOT NULL,
  `fk_idrestriccionprogramacion` int(11) NOT NULL,
  `fk_idSecciones` int(11) NOT NULL,
  `fk_idciclo` int(11) NOT NULL,
  PRIMARY KEY (`idencabezadoProg`),
  KEY `fk_encabezadoProg_usuario1_idx` (`fk_idusuario`),
  KEY `fk_encabezadoProg_pensum1_idx` (`fk_idpensum`),
  KEY `fk_encabezadoProg_restriccionprogramacion1_idx` (`fk_idrestriccionprogramacion`),
  KEY `fk_encabezadoProg_secciones1_idx` (`fk_idSecciones`),
  KEY `fk_encabezadoProg_ciclo1_idx` (`fk_idciclo`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=48 ;

--
-- Volcado de datos para la tabla `programacion`
--

INSERT INTO `programacion` (`idencabezadoProg`, `fecha`, `fk_idusuario`, `fk_idpensum`, `fk_idrestriccionprogramacion`, `fk_idSecciones`, `fk_idciclo`) VALUES
(1, '2015-10-27', 10, 1, 1, 2, 2),
(34, '2015-10-28', 10, 1, 1, 5, 2),
(35, '2015-10-29', 10, 1, 1, 3, 2),
(36, '2015-10-29', 10, 1, 1, 3, 1),
(37, '2015-10-29', 10, 1, 1, 4, 1),
(38, '2015-10-29', 10, 1, 1, 4, 1),
(39, '2015-10-29', 10, 1, 1, 4, 2),
(40, '2015-11-02', 10, 1, 1, 1, 2),
(42, '2015-11-03', 10, 1, 1, 3, 1),
(43, '2015-11-03', 10, 1, 1, 6, 2),
(44, '2015-11-03', 10, 1, 1, 3, 1),
(45, '2015-11-07', 37, 3, 1, 1, 1),
(46, '2015-11-12', 37, 5, 1, 1, 1),
(47, '2015-11-12', 37, 5, 1, 2, 1);

--
-- Disparadores `programacion`
--
DROP TRIGGER IF EXISTS `fechasistema`;
DELIMITER //
CREATE TRIGGER `fechasistema` BEFORE INSERT ON `programacion`
 FOR EACH ROW SET NEW.fecha = NOW()
//
DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `restricciondocente`
--

CREATE TABLE IF NOT EXISTS `restricciondocente` (
  `idrestriccionprogramacion` int(11) NOT NULL AUTO_INCREMENT,
  `horainiD` varchar(45) NOT NULL,
  `horafinD` varchar(45) NOT NULL,
  `fk_iddia` int(11) NOT NULL,
  PRIMARY KEY (`idrestriccionprogramacion`),
  KEY `fk_restricciondocente_dias1_idx` (`fk_iddia`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `restricciondocente`
--

INSERT INTO `restricciondocente` (`idrestriccionprogramacion`, `horainiD`, `horafinD`, `fk_iddia`) VALUES
(1, 'A', 'FS', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `restriccionprogramacion`
--

CREATE TABLE IF NOT EXISTS `restriccionprogramacion` (
  `idrestriccionprogramacion` int(11) NOT NULL AUTO_INCREMENT,
  `tiempocurso` time DEFAULT NULL,
  PRIMARY KEY (`idrestriccionprogramacion`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `restriccionprogramacion`
--

INSERT INTO `restriccionprogramacion` (`idrestriccionprogramacion`, `tiempocurso`) VALUES
(1, '00:00:04');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `secciones`
--

CREATE TABLE IF NOT EXISTS `secciones` (
  `idSecciones` int(11) NOT NULL AUTO_INCREMENT,
  `NombreSeccion` varchar(45) NOT NULL,
  PRIMARY KEY (`idSecciones`),
  UNIQUE KEY `NombreSeccion_UNIQUE` (`NombreSeccion`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Volcado de datos para la tabla `secciones`
--

INSERT INTO `secciones` (`idSecciones`, `NombreSeccion`) VALUES
(1, 'A'),
(2, 'B'),
(3, 'C'),
(4, 'D'),
(5, 'E'),
(6, 'F');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE IF NOT EXISTS `usuario` (
  `idusuario` int(11) NOT NULL AUTO_INCREMENT,
  `Usuario` varchar(45) NOT NULL,
  `contrasenia` varchar(10) NOT NULL,
  `NombreCompleto` varchar(45) NOT NULL,
  `fk_idEstados` int(11) NOT NULL,
  `fk_idNivelAcceso` int(11) NOT NULL,
  `fk_idcarrera` int(11) DEFAULT NULL,
  `fk_idcentroU` int(11) DEFAULT NULL,
  PRIMARY KEY (`idusuario`),
  UNIQUE KEY `Usuario_UNIQUE` (`Usuario`),
  KEY `fk_usuario_estados1_idx` (`fk_idEstados`),
  KEY `fk_usuario_nivelacceso1_idx` (`fk_idNivelAcceso`),
  KEY `fk_usuario_carrera1_idx` (`fk_idcarrera`),
  KEY `fk_usuario_centrou1_idx` (`fk_idcentroU`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=40 ;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`idusuario`, `Usuario`, `contrasenia`, `NombreCompleto`, `fk_idEstados`, `fk_idNivelAcceso`, `fk_idcarrera`, `fk_idcentroU`) VALUES
(10, 'sstivanni', 'sstivanni', 'Sstivanni Ruiz Orellana', 1, 2, 8, 1),
(13, 'obil', 'obil', 'Walter Obil', 2, 3, 8, 1),
(14, 'diana', 'diana', 'lisbeth', 1, 1, 8, 1),
(35, 'liza', 'liza', 'Liza Castillo', 1, 3, 9, 1),
(36, 'sstivani', 'sstivani', 'Sstivani Ruiz', 1, 2, 8, 9),
(37, 'felix', 'felix', 'Felix Ch', 1, 2, 12, 8),
(38, 'buender', 'buender', 'Buender Role', 1, 1, 12, 9),
(39, 'rony', 'rony', 'Rony de Leon', 2, 2, 13, 9);

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `usuarios`
--
CREATE TABLE IF NOT EXISTS `usuarios` (
`idusuario` int(11)
,`Usuario` varchar(45)
,`contrasenia` varchar(10)
,`NombreCompleto` varchar(45)
,`fk_idEstados` int(11)
,`fk_idNivelAcceso` int(11)
,`fk_idcarrera` int(11)
,`fk_idcentroU` int(11)
,`idEstados` int(11)
,`NombreEstado` varchar(45)
,`idNivelAcceso` int(11)
,`privilegio` varchar(45)
);
-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `vwprogra`
--
CREATE TABLE IF NOT EXISTS `vwprogra` (
`idencabezadoProg` int(11)
,`fecha` date
,`fk_idusuario` int(11)
,`fk_idpensum` int(11)
,`fk_idrestriccionprogramacion` int(11)
,`fk_idSecciones` int(11)
,`fk_idciclo` int(11)
,`idpensum` int(11)
,`anioPensum` varchar(45)
,`fk_idcentroU` int(11)
,`fk_idcarrera` int(11)
,`idciclo` int(11)
,`nombreCiclo` varchar(15)
,`idSecciones` int(11)
,`NombreSeccion` varchar(45)
);
-- --------------------------------------------------------

--
-- Estructura para la vista `usuarios`
--
DROP TABLE IF EXISTS `usuarios`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `usuarios` AS select `us`.`idusuario` AS `idusuario`,`us`.`Usuario` AS `Usuario`,`us`.`contrasenia` AS `contrasenia`,`us`.`NombreCompleto` AS `NombreCompleto`,`us`.`fk_idEstados` AS `fk_idEstados`,`us`.`fk_idNivelAcceso` AS `fk_idNivelAcceso`,`us`.`fk_idcarrera` AS `fk_idcarrera`,`us`.`fk_idcentroU` AS `fk_idcentroU`,`es`.`idEstados` AS `idEstados`,`es`.`NombreEstado` AS `NombreEstado`,`na`.`idNivelAcceso` AS `idNivelAcceso`,`na`.`privilegio` AS `privilegio` from ((`usuario` `us` join `estados` `es` on((`us`.`fk_idEstados` = `es`.`idEstados`))) join `nivelacceso` `na` on((`na`.`idNivelAcceso` = `us`.`fk_idNivelAcceso`)));

-- --------------------------------------------------------

--
-- Estructura para la vista `vwprogra`
--
DROP TABLE IF EXISTS `vwprogra`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vwprogra` AS select `pro`.`idencabezadoProg` AS `idencabezadoProg`,`pro`.`fecha` AS `fecha`,`pro`.`fk_idusuario` AS `fk_idusuario`,`pro`.`fk_idpensum` AS `fk_idpensum`,`pro`.`fk_idrestriccionprogramacion` AS `fk_idrestriccionprogramacion`,`pro`.`fk_idSecciones` AS `fk_idSecciones`,`pro`.`fk_idciclo` AS `fk_idciclo`,`pen`.`idpensum` AS `idpensum`,`pen`.`anioPensum` AS `anioPensum`,`pen`.`fk_idcentroU` AS `fk_idcentroU`,`pen`.`fk_idcarrera` AS `fk_idcarrera`,`cc`.`idciclo` AS `idciclo`,`cc`.`nombreCiclo` AS `nombreCiclo`,`sec`.`idSecciones` AS `idSecciones`,`sec`.`NombreSeccion` AS `NombreSeccion` from (((`programacion` `pro` join `pensum` `pen` on((`pro`.`fk_idpensum` = `pen`.`idpensum`))) join `ciclo` `cc` on((`pro`.`fk_idciclo` = `cc`.`idciclo`))) join `secciones` `sec` on((`pro`.`fk_idSecciones` = `sec`.`idSecciones`))) where ((`pen`.`fk_idcentroU` = 1) and (`pen`.`fk_idcarrera` = 8)) order by `pro`.`fecha` desc;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `detallepensum`
--
ALTER TABLE `detallepensum`
  ADD CONSTRAINT `fk_detallepensum_ciclo1` FOREIGN KEY (`fk_idciclo`) REFERENCES `ciclo` (`idciclo`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_detallepensum_curso1` FOREIGN KEY (`fk_idcurso`) REFERENCES `curso` (`idcurso`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_detallepensum_pensum1` FOREIGN KEY (`fk_idpensum`) REFERENCES `pensum` (`idpensum`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `detalleprogramacion`
--
ALTER TABLE `detalleprogramacion`
  ADD CONSTRAINT `fk_horarios_dias1` FOREIGN KEY (`fk_iddia`) REFERENCES `dia` (`iddia`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_programacion_curso1` FOREIGN KEY (`fk_idcurso`) REFERENCES `curso` (`idcurso`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_programacion_docente1` FOREIGN KEY (`fk_iddocente`) REFERENCES `docente` (`iddocente`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_programacion_encabezadoProg1` FOREIGN KEY (`fk_idencabezadoProg`) REFERENCES `programacion` (`idencabezadoProg`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `docente`
--
ALTER TABLE `docente`
  ADD CONSTRAINT `fk_docente_estados1` FOREIGN KEY (`fk_idEstados`) REFERENCES `estados` (`idEstados`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_docente_restricciondocente1` FOREIGN KEY (`fk_idrestriccionprogramacion`) REFERENCES `restricciondocente` (`idrestriccionprogramacion`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `pensum`
--
ALTER TABLE `pensum`
  ADD CONSTRAINT `fk_pensum_carrera1` FOREIGN KEY (`fk_idcarrera`) REFERENCES `carrera` (`idcarrera`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_pensum_centroU` FOREIGN KEY (`fk_idcentroU`) REFERENCES `centrou` (`idcentroU`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `programacion`
--
ALTER TABLE `programacion`
  ADD CONSTRAINT `fk_encabezadoProg_ciclo1` FOREIGN KEY (`fk_idciclo`) REFERENCES `ciclo` (`idciclo`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_encabezadoProg_pensum1` FOREIGN KEY (`fk_idpensum`) REFERENCES `pensum` (`idpensum`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_encabezadoProg_restriccionprogramacion1` FOREIGN KEY (`fk_idrestriccionprogramacion`) REFERENCES `restriccionprogramacion` (`idrestriccionprogramacion`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_encabezadoProg_secciones1` FOREIGN KEY (`fk_idSecciones`) REFERENCES `secciones` (`idSecciones`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_encabezadoProg_usuario1` FOREIGN KEY (`fk_idusuario`) REFERENCES `usuario` (`idusuario`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `restricciondocente`
--
ALTER TABLE `restricciondocente`
  ADD CONSTRAINT `fk_restricciondocente_dias1` FOREIGN KEY (`fk_iddia`) REFERENCES `dia` (`iddia`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `fk_usuario_carrera1` FOREIGN KEY (`fk_idcarrera`) REFERENCES `carrera` (`idcarrera`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_usuario_centrou1` FOREIGN KEY (`fk_idcentroU`) REFERENCES `centrou` (`idcentroU`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_usuario_estados1` FOREIGN KEY (`fk_idEstados`) REFERENCES `estados` (`idEstados`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_usuario_nivelacceso1` FOREIGN KEY (`fk_idNivelAcceso`) REFERENCES `nivelacceso` (`idNivelAcceso`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
