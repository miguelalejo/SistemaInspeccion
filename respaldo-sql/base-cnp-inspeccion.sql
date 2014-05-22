/*
SQLyog Ultimate v8.71 
MySQL - 5.0.89-community-nt : Database - cnpbasedatosinspeccion
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`cnpbasedatosinspeccion` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `cnpbasedatosinspeccion`;

/*Table structure for table `alumno` */

DROP TABLE IF EXISTS `alumno`;

CREATE TABLE `alumno` (
  `codigoalumno` int(11) NOT NULL auto_increment,
  `cedula` varchar(11) NOT NULL,
  `nombre` varchar(30) NOT NULL,
  `apellido` varchar(30) NOT NULL,
  `fechanacimiento` date NOT NULL,
  `telefono` varchar(12) default NULL,
  `celular` varchar(13) default NULL,
  `correoelectronico` varchar(100) default NULL,
  `cedularepresentante` varchar(11) NOT NULL,
  `nombrerepresentante` varchar(30) NOT NULL,
  `apellidorepresentante` varchar(30) NOT NULL,
  `telefonorepresentante` varchar(12) default NULL,
  `celularrepresentante` varchar(13) default NULL,
  `correoelectronicorepresentante` varchar(250) default NULL,
  `imagen` longblob,
  PRIMARY KEY  (`codigoalumno`),
  UNIQUE KEY `CedulaIndex_idx` (`cedula`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

/*Data for the table `alumno` */

insert  into `alumno`(`codigoalumno`,`cedula`,`nombre`,`apellido`,`fechanacimiento`,`telefono`,`celular`,`correoelectronico`,`cedularepresentante`,`nombrerepresentante`,`apellidorepresentante`,`telefonorepresentante`,`celularrepresentante`,`correoelectronicorepresentante`,`imagen`) values (3,'171975773-2','Carla','Flores Perez','1996-07-02','(222)-256972','(098)-8846721','carly@hotmai.com','100257630-2','Jose Fernando','Flores Perez','(222)-278002','(098)-2217872','mikaso@gmail.com','52a8c66a534fadc27c23a69067ba34fbb14bb8b9.jpg'),(4,'171426643-2','Beatriz Angelica','Bastidas Morocho','2003-08-01','(034)-568282','(098)-2727677','btran@gamil.com','170894888-8','Estefania','Morocho Vera','(222)-222222','(097)-6909000','bera@gamil.com','32cb003047f40a8b8dcc775eedf1be58c32ec6df.jpg'),(5,'171586504-2','Adriana Herrera','Bastidas Vera','1994-01-03','(022)-888989','(098)-2882828','mikasomk34@hotmail.com','100257630-2','Miguel','Ponce','(020)-129191','(020)-2020201','pe@gamil.com','757314482965b770761f7e1e97b6fa7dc80437e0.jpg'),(7,'100257630-2','Miguel Alejandro','Ponce Proaño','2000-01-02','(222)-225437','(097)-3673881','mikaso@gmail.com','100257630-2','Miguel Eduardo','Ponce Vargas','(222)-225989','','mikaso@gmail.com','1841def312a345c46090ab8feb87af02436246e7.jpg');

/*Table structure for table `curso` */

DROP TABLE IF EXISTS `curso`;

CREATE TABLE `curso` (
  `codigocurso` int(11) NOT NULL auto_increment,
  `curso` varchar(15) NOT NULL,
  PRIMARY KEY  (`codigocurso`),
  UNIQUE KEY `CursoParaleloPeriodoIndex_idx` (`curso`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `curso` */

insert  into `curso`(`codigocurso`,`curso`) values (1,'Primero'),(2,'Segundo');

/*Table structure for table `cursoalumno` */

DROP TABLE IF EXISTS `cursoalumno`;

CREATE TABLE `cursoalumno` (
  `codigocursoalumno` int(11) NOT NULL auto_increment,
  `codigoalumno` int(11) NOT NULL,
  `codigoperiodo` int(11) NOT NULL,
  `codigocurso` int(11) NOT NULL,
  `codigoparalelo` int(11) NOT NULL,
  PRIMARY KEY  (`codigocursoalumno`),
  UNIQUE KEY `CursoAlumnoIndex_idx` (`codigoalumno`,`codigoperiodo`,`codigocurso`,`codigoparalelo`),
  KEY `codigoperiodo_idx` (`codigoperiodo`),
  KEY `codigocurso_idx` (`codigocurso`),
  KEY `codigoparalelo_idx` (`codigoparalelo`),
  KEY `codigoalumno_idx` (`codigoalumno`),
  CONSTRAINT `cursoalumno_ibfk_1` FOREIGN KEY (`codigoperiodo`) REFERENCES `periodo` (`codigoperiodo`),
  CONSTRAINT `cursoalumno_ibfk_2` FOREIGN KEY (`codigoparalelo`) REFERENCES `paralelo` (`codigoparalelo`),
  CONSTRAINT `cursoalumno_ibfk_3` FOREIGN KEY (`codigocurso`) REFERENCES `curso` (`codigocurso`),
  CONSTRAINT `cursoalumno_ibfk_4` FOREIGN KEY (`codigoalumno`) REFERENCES `alumno` (`codigoalumno`),
  CONSTRAINT `cursoalumno_ibfk_5` FOREIGN KEY (`codigoperiodo`) REFERENCES `periodo` (`codigoperiodo`),
  CONSTRAINT `cursoalumno_ibfk_6` FOREIGN KEY (`codigoparalelo`) REFERENCES `paralelo` (`codigoparalelo`),
  CONSTRAINT `cursoalumno_ibfk_7` FOREIGN KEY (`codigocurso`) REFERENCES `curso` (`codigocurso`),
  CONSTRAINT `cursoalumno_ibfk_8` FOREIGN KEY (`codigoalumno`) REFERENCES `alumno` (`codigoalumno`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `cursoalumno` */

insert  into `cursoalumno`(`codigocursoalumno`,`codigoalumno`,`codigoperiodo`,`codigocurso`,`codigoparalelo`) values (1,3,1,1,1),(2,3,2,1,2);

/*Table structure for table `cursomateriahorario` */

DROP TABLE IF EXISTS `cursomateriahorario`;

CREATE TABLE `cursomateriahorario` (
  `codigocursomateriahorario` int(11) NOT NULL auto_increment,
  `codigoperiodo` int(11) NOT NULL,
  `codigocurso` int(11) NOT NULL,
  `codigoparalelo` int(11) NOT NULL,
  `codigohorario` int(11) NOT NULL,
  `codigodia` int(11) NOT NULL,
  `codigomateria` int(11) NOT NULL,
  `descripcion` text,
  PRIMARY KEY  (`codigocursomateriahorario`),
  UNIQUE KEY `CursoMateriaHorarioIndex_idx` (`codigoperiodo`,`codigocurso`,`codigoparalelo`,`codigohorario`,`codigodia`,`codigomateria`),
  KEY `codigoperiodo_idx` (`codigoperiodo`),
  KEY `codigocurso_idx` (`codigocurso`),
  KEY `codigoparalelo_idx` (`codigoparalelo`),
  KEY `codigomateria_idx` (`codigomateria`),
  KEY `codigodia_idx` (`codigodia`),
  KEY `codigohorario_idx` (`codigohorario`),
  CONSTRAINT `cursomateriahorario_ibfk_1` FOREIGN KEY (`codigoperiodo`) REFERENCES `periodo` (`codigoperiodo`),
  CONSTRAINT `cursomateriahorario_ibfk_10` FOREIGN KEY (`codigohorario`) REFERENCES `horario` (`codigohorario`),
  CONSTRAINT `cursomateriahorario_ibfk_11` FOREIGN KEY (`codigodia`) REFERENCES `dia` (`codigodia`),
  CONSTRAINT `cursomateriahorario_ibfk_12` FOREIGN KEY (`codigocurso`) REFERENCES `curso` (`codigocurso`),
  CONSTRAINT `cursomateriahorario_ibfk_2` FOREIGN KEY (`codigoparalelo`) REFERENCES `paralelo` (`codigoparalelo`),
  CONSTRAINT `cursomateriahorario_ibfk_3` FOREIGN KEY (`codigomateria`) REFERENCES `materia` (`codigomateria`),
  CONSTRAINT `cursomateriahorario_ibfk_4` FOREIGN KEY (`codigohorario`) REFERENCES `horario` (`codigohorario`),
  CONSTRAINT `cursomateriahorario_ibfk_5` FOREIGN KEY (`codigodia`) REFERENCES `dia` (`codigodia`),
  CONSTRAINT `cursomateriahorario_ibfk_6` FOREIGN KEY (`codigocurso`) REFERENCES `curso` (`codigocurso`),
  CONSTRAINT `cursomateriahorario_ibfk_7` FOREIGN KEY (`codigoperiodo`) REFERENCES `periodo` (`codigoperiodo`),
  CONSTRAINT `cursomateriahorario_ibfk_8` FOREIGN KEY (`codigoparalelo`) REFERENCES `paralelo` (`codigoparalelo`),
  CONSTRAINT `cursomateriahorario_ibfk_9` FOREIGN KEY (`codigomateria`) REFERENCES `materia` (`codigomateria`)
) ENGINE=InnoDB AUTO_INCREMENT=81 DEFAULT CHARSET=latin1;

/*Data for the table `cursomateriahorario` */

insert  into `cursomateriahorario`(`codigocursomateriahorario`,`codigoperiodo`,`codigocurso`,`codigoparalelo`,`codigohorario`,`codigodia`,`codigomateria`,`descripcion`) values (1,2,1,1,1,1,1,''),(2,2,1,1,2,1,1,''),(3,2,1,1,3,1,2,''),(4,2,1,2,1,1,3,''),(5,2,2,1,1,1,2,'ASDas'),(6,1,1,1,1,1,4,''),(7,1,1,1,2,1,3,''),(8,1,1,1,3,1,2,''),(9,1,1,1,4,1,4,''),(10,2,1,1,5,1,6,''),(11,1,1,1,7,1,6,''),(12,2,1,1,8,1,4,''),(13,2,1,1,1,2,3,''),(14,2,1,1,2,2,3,''),(15,2,1,1,3,2,3,''),(16,2,1,1,4,2,4,''),(17,2,1,1,5,2,2,''),(18,1,1,1,7,2,6,''),(19,2,1,1,8,2,5,''),(20,1,1,1,1,3,6,''),(21,2,1,1,2,3,5,''),(22,2,1,1,3,3,6,''),(23,2,1,1,4,3,5,''),(24,2,1,1,5,3,7,''),(25,2,1,1,7,3,7,''),(26,2,1,1,8,3,7,''),(27,1,1,1,1,4,4,''),(28,2,1,1,2,4,4,''),(29,2,1,1,3,4,6,''),(30,2,1,1,4,4,4,''),(31,2,1,1,5,4,3,''),(32,2,1,1,7,4,7,''),(33,2,1,1,8,4,5,''),(34,2,1,1,1,5,1,''),(35,2,1,1,2,5,1,''),(36,1,1,1,3,5,1,''),(37,2,1,1,4,5,2,''),(38,2,1,1,5,5,5,''),(39,1,1,1,7,5,4,''),(40,2,1,1,8,5,3,''),(41,2,2,2,1,1,4,''),(42,2,1,2,2,1,3,''),(43,2,1,2,3,1,4,''),(44,2,1,1,4,1,4,''),(45,2,1,1,5,1,1,''),(46,2,1,1,7,1,3,''),(47,2,1,1,8,1,6,''),(48,2,1,1,1,2,4,''),(49,2,1,1,2,2,4,''),(50,2,1,1,3,2,2,''),(51,2,1,1,4,2,3,''),(52,2,1,1,5,2,5,''),(53,2,1,1,7,2,6,''),(54,2,1,1,8,2,7,''),(55,2,1,1,1,3,6,''),(56,2,1,1,2,3,1,''),(57,2,1,1,3,3,4,''),(58,2,1,1,4,3,4,''),(59,2,1,1,5,3,4,''),(60,2,1,1,7,3,4,''),(61,2,1,1,8,3,5,''),(62,2,1,1,1,4,4,''),(63,2,1,1,2,4,6,''),(64,2,1,1,3,4,5,''),(65,2,1,1,4,4,5,''),(66,2,1,1,5,4,6,''),(67,2,1,1,7,4,3,''),(68,2,1,1,8,4,6,''),(70,2,1,1,1,5,3,''),(72,2,1,1,3,5,1,''),(73,2,1,1,4,5,6,''),(74,2,1,1,5,5,6,''),(75,2,1,1,7,5,4,''),(76,2,1,1,8,5,1,''),(78,2,2,1,2,1,1,''),(79,1,2,2,2,1,4,''),(80,2,2,2,2,1,5,'');

/*Table structure for table `dia` */

DROP TABLE IF EXISTS `dia`;

CREATE TABLE `dia` (
  `codigodia` int(11) NOT NULL auto_increment,
  `dia` varchar(30) NOT NULL,
  `horas` int(11) NOT NULL,
  PRIMARY KEY  (`codigodia`),
  UNIQUE KEY `DiaIndex_idx` (`dia`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

/*Data for the table `dia` */

insert  into `dia`(`codigodia`,`dia`,`horas`) values (1,'Lunes',9),(2,'Martes',9),(3,'Miercoles',9),(4,'Jueves',2),(5,'Viernes',8);

/*Table structure for table `falta` */

DROP TABLE IF EXISTS `falta`;

CREATE TABLE `falta` (
  `codigofalta` int(11) NOT NULL auto_increment,
  `codigoalumno` int(11) NOT NULL,
  `codigoinspector` int(11) NOT NULL,
  `codigotipofalta` int(11) NOT NULL,
  `codigoparcial` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `descripcion` text,
  PRIMARY KEY  (`codigofalta`),
  KEY `codigoalumno_idx` (`codigoalumno`),
  KEY `codigoinspector_idx` (`codigoinspector`),
  KEY `codigotipofalta_idx` (`codigotipofalta`),
  KEY `codigoparcial_idx` (`codigoparcial`),
  CONSTRAINT `falta_ibfk_1` FOREIGN KEY (`codigotipofalta`) REFERENCES `tipofalta` (`codigotipofalta`),
  CONSTRAINT `falta_ibfk_2` FOREIGN KEY (`codigoparcial`) REFERENCES `parcial` (`codigoparcial`),
  CONSTRAINT `falta_ibfk_3` FOREIGN KEY (`codigoinspector`) REFERENCES `inspector` (`codigoinspector`),
  CONSTRAINT `falta_ibfk_4` FOREIGN KEY (`codigoalumno`) REFERENCES `alumno` (`codigoalumno`),
  CONSTRAINT `falta_ibfk_5` FOREIGN KEY (`codigotipofalta`) REFERENCES `tipofalta` (`codigotipofalta`),
  CONSTRAINT `falta_ibfk_6` FOREIGN KEY (`codigoparcial`) REFERENCES `parcial` (`codigoparcial`),
  CONSTRAINT `falta_ibfk_7` FOREIGN KEY (`codigoinspector`) REFERENCES `inspector` (`codigoinspector`),
  CONSTRAINT `falta_ibfk_8` FOREIGN KEY (`codigoalumno`) REFERENCES `alumno` (`codigoalumno`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `falta` */

insert  into `falta`(`codigofalta`,`codigoalumno`,`codigoinspector`,`codigotipofalta`,`codigoparcial`,`fecha`,`descripcion`) values (1,3,2,1,10,'2014-04-30','');

/*Table structure for table `horario` */

DROP TABLE IF EXISTS `horario`;

CREATE TABLE `horario` (
  `codigohorario` int(11) NOT NULL auto_increment,
  `horario` varchar(50) NOT NULL,
  `descripcion` text,
  PRIMARY KEY  (`codigohorario`),
  UNIQUE KEY `HorarioIndex_idx` (`horario`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

/*Data for the table `horario` */

insert  into `horario`(`codigohorario`,`horario`,`descripcion`) values (1,'Primera','Hora desde las 7:00 AM hasta las 7:40 AM'),(2,'Segunda','Hora desde las 7:40 AM hasta las 8:20 AM'),(3,'Tercera','Hora desde las 8:20 AM hasta las 9:00 AM'),(4,'Cuarta','Hora desde las 9:00 AM hasta las 9:40 AM'),(5,'Quinta','Hora desde las 9:40 AM hasta las 10:20 AM'),(7,'Sexta','Hora desde las 10:40 AM hasta las 11:20 AM'),(8,'Septima','Hora desde las 11:20 AM hasta las 12:00 AM');

/*Table structure for table `inspector` */

DROP TABLE IF EXISTS `inspector`;

CREATE TABLE `inspector` (
  `codigoinspector` int(11) NOT NULL auto_increment,
  `cedula` varchar(11) NOT NULL,
  `nombre` varchar(30) NOT NULL,
  `apellido` varchar(30) NOT NULL,
  `telefono` varchar(12) default NULL,
  `celular` varchar(13) default NULL,
  `correoelectronico` varchar(100) default NULL,
  `imagen` longblob,
  PRIMARY KEY  (`codigoinspector`),
  UNIQUE KEY `CedulaIndex_idx` (`cedula`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `inspector` */

insert  into `inspector`(`codigoinspector`,`cedula`,`nombre`,`apellido`,`telefono`,`celular`,`correoelectronico`,`imagen`) values (1,'050317074-8','Henry Ramiro','Toapanta Calero','(236)-788890','(098)-3737221','hcal@gmail.com','8a182d4791103bdb3b99cd92cd1f43fa1a37cecd.jpg'),(2,'171586504-2','Judith Adriana','Bastidas Morocho','(025)-467332','(097)-8211111','bast@yahoo.com','57658b06b499e8e07f1fe0e3764e1bfbd29d605f.jpg');

/*Table structure for table `materia` */

DROP TABLE IF EXISTS `materia`;

CREATE TABLE `materia` (
  `codigomateria` int(11) NOT NULL auto_increment,
  `materia` varchar(30) NOT NULL,
  `descripcion` text,
  `imagen` longblob,
  PRIMARY KEY  (`codigomateria`),
  UNIQUE KEY `MateriaIndex_idx` (`materia`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

/*Data for the table `materia` */

insert  into `materia`(`codigomateria`,`materia`,`descripcion`,`imagen`) values (1,'Fisica','Ciencia natural que estudia las propiedades y el comportamiento de la energía y la materia','cfcdde715d5894ee71aa03a979ad9ead0b4f4ac2.jpg'),(2,'Quimica','Es la ciencia que estudia tanto la composición, estructura y propiedades de la materia como los cambios que ésta experimenta durante las reacciones químicas','666c8397a67d171d9e9215b9584d6ab0669ade37.jpg'),(3,'Ingles','Es una lengua controlada y construida basada en la simplificación del vocabulario y la gramática de la lengua inglesa natural.','b45fccab0fd6b8c48a914b777ca206c13c46e742.gif'),(4,'Ciencias Naturales','Tienen por objeto el estudio de la naturaleza siguiendo la modalidad del método científico conocida como método experimental','4d6b58f6d47abd7d1ea42f999713e023fed21724.jpg'),(5,'Computacion','Estudia métodos, procesos, técnicas, con el fin de almacenar, procesar y transmitir información y datos en formato digital','ed66c2940e0902c632bc43675ace4bad734a9827.jpg'),(6,'Matematica','Estudia las propiedades y relaciones entre entidades abstractas con números, figuras geométricas o símbolos,','f8e74cb8b9d7a6ec47119dda922868f61aea2db8.png'),(7,'Historia','Es la ciencia que tiene como objeto de estudio el pasado de la humanidad ','44b1a7d78e45c02e431df1ac9e514fc5859418df.jpg');

/*Table structure for table `novedad` */

DROP TABLE IF EXISTS `novedad`;

CREATE TABLE `novedad` (
  `codigonovedad` int(11) NOT NULL auto_increment,
  `codigoalumno` int(11) NOT NULL,
  `codigoinspector` int(11) NOT NULL,
  `codigoparcial` int(11) NOT NULL,
  `fugas` int(11) NOT NULL,
  `atrasos` int(11) NOT NULL,
  `indisciplinas` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `descripcion` text,
  PRIMARY KEY  (`codigonovedad`),
  KEY `codigoalumno_idx` (`codigoalumno`),
  KEY `codigoinspector_idx` (`codigoinspector`),
  KEY `codigoparcial_idx` (`codigoparcial`),
  CONSTRAINT `novedad_ibfk_1` FOREIGN KEY (`codigoparcial`) REFERENCES `parcial` (`codigoparcial`),
  CONSTRAINT `novedad_ibfk_2` FOREIGN KEY (`codigoinspector`) REFERENCES `inspector` (`codigoinspector`),
  CONSTRAINT `novedad_ibfk_3` FOREIGN KEY (`codigoalumno`) REFERENCES `alumno` (`codigoalumno`),
  CONSTRAINT `novedad_ibfk_4` FOREIGN KEY (`codigoparcial`) REFERENCES `parcial` (`codigoparcial`),
  CONSTRAINT `novedad_ibfk_5` FOREIGN KEY (`codigoinspector`) REFERENCES `inspector` (`codigoinspector`),
  CONSTRAINT `novedad_ibfk_6` FOREIGN KEY (`codigoalumno`) REFERENCES `alumno` (`codigoalumno`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `novedad` */

insert  into `novedad`(`codigonovedad`,`codigoalumno`,`codigoinspector`,`codigoparcial`,`fugas`,`atrasos`,`indisciplinas`,`fecha`,`descripcion`) values (1,3,1,10,1,1,2,'2014-04-30','');

/*Table structure for table `novedadcursomateriahorario` */

DROP TABLE IF EXISTS `novedadcursomateriahorario`;

CREATE TABLE `novedadcursomateriahorario` (
  `codigonovedadcursomateriahorario` int(11) NOT NULL auto_increment,
  `codigonovedad` int(11) NOT NULL,
  `codigocursomateriahorario` int(11) NOT NULL,
  `codigotiponovedad` int(11) NOT NULL,
  PRIMARY KEY  (`codigonovedadcursomateriahorario`),
  UNIQUE KEY `CursoNovedadMateriaHorarioIndex_idx` (`codigonovedad`,`codigocursomateriahorario`,`codigotiponovedad`),
  KEY `codigonovedad_idx` (`codigonovedad`),
  KEY `codigocursomateriahorario_idx` (`codigocursomateriahorario`),
  KEY `codigotiponovedad_idx` (`codigotiponovedad`),
  CONSTRAINT `novedadcursomateriahorario_ibfk_1` FOREIGN KEY (`codigotiponovedad`) REFERENCES `tiponovedad` (`codigotiponovedad`),
  CONSTRAINT `novedadcursomateriahorario_ibfk_2` FOREIGN KEY (`codigonovedad`) REFERENCES `novedad` (`codigonovedad`),
  CONSTRAINT `novedadcursomateriahorario_ibfk_3` FOREIGN KEY (`codigocursomateriahorario`) REFERENCES `cursomateriahorario` (`codigocursomateriahorario`),
  CONSTRAINT `novedadcursomateriahorario_ibfk_4` FOREIGN KEY (`codigotiponovedad`) REFERENCES `tiponovedad` (`codigotiponovedad`),
  CONSTRAINT `novedadcursomateriahorario_ibfk_5` FOREIGN KEY (`codigonovedad`) REFERENCES `novedad` (`codigonovedad`),
  CONSTRAINT `novedadcursomateriahorario_ibfk_6` FOREIGN KEY (`codigocursomateriahorario`) REFERENCES `cursomateriahorario` (`codigocursomateriahorario`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

/*Data for the table `novedadcursomateriahorario` */

insert  into `novedadcursomateriahorario`(`codigonovedadcursomateriahorario`,`codigonovedad`,`codigocursomateriahorario`,`codigotiponovedad`) values (3,1,20,1),(4,1,20,2);

/*Table structure for table `paralelo` */

DROP TABLE IF EXISTS `paralelo`;

CREATE TABLE `paralelo` (
  `codigoparalelo` int(11) NOT NULL auto_increment,
  `paralelo` varchar(15) NOT NULL,
  PRIMARY KEY  (`codigoparalelo`),
  UNIQUE KEY `CursoParaleloPeriodoIndex_idx` (`paralelo`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `paralelo` */

insert  into `paralelo`(`codigoparalelo`,`paralelo`) values (1,'A'),(2,'B');

/*Table structure for table `paralelomateriahorario` */

DROP TABLE IF EXISTS `paralelomateriahorario`;

CREATE TABLE `paralelomateriahorario` (
  `codigoparalelomateriahorario` int(11) NOT NULL auto_increment,
  `codigoparalelo` int(11) NOT NULL,
  `codigohorario` int(11) NOT NULL,
  `codigodia` int(11) NOT NULL,
  `codigomateria` int(11) NOT NULL,
  `descripcion` text,
  PRIMARY KEY  (`codigoparalelomateriahorario`),
  UNIQUE KEY `CursoMateriaHorarioIndex_idx` (`codigoparalelo`,`codigohorario`,`codigodia`,`codigomateria`),
  KEY `codigoparalelo_idx` (`codigoparalelo`),
  KEY `codigomateria_idx` (`codigomateria`),
  KEY `codigodia_idx` (`codigodia`),
  KEY `codigohorario_idx` (`codigohorario`),
  CONSTRAINT `paralelomateriahorario_ibfk_1` FOREIGN KEY (`codigoparalelo`) REFERENCES `paralelo` (`codigoparalelo`),
  CONSTRAINT `paralelomateriahorario_ibfk_2` FOREIGN KEY (`codigomateria`) REFERENCES `materia` (`codigomateria`),
  CONSTRAINT `paralelomateriahorario_ibfk_3` FOREIGN KEY (`codigohorario`) REFERENCES `horario` (`codigohorario`),
  CONSTRAINT `paralelomateriahorario_ibfk_4` FOREIGN KEY (`codigodia`) REFERENCES `dia` (`codigodia`),
  CONSTRAINT `paralelomateriahorario_ibfk_5` FOREIGN KEY (`codigoparalelo`) REFERENCES `paralelo` (`codigoparalelo`),
  CONSTRAINT `paralelomateriahorario_ibfk_6` FOREIGN KEY (`codigomateria`) REFERENCES `materia` (`codigomateria`),
  CONSTRAINT `paralelomateriahorario_ibfk_7` FOREIGN KEY (`codigohorario`) REFERENCES `horario` (`codigohorario`),
  CONSTRAINT `paralelomateriahorario_ibfk_8` FOREIGN KEY (`codigodia`) REFERENCES `dia` (`codigodia`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `paralelomateriahorario` */

/*Table structure for table `parametro` */

DROP TABLE IF EXISTS `parametro`;

CREATE TABLE `parametro` (
  `codigoparametro` int(11) NOT NULL auto_increment,
  `parametro` varchar(30) NOT NULL,
  `tipoparametro` char(1) NOT NULL,
  `valorint` int(11) default NULL,
  `valorstring` varchar(20) default NULL,
  `imagen` longblob,
  PRIMARY KEY  (`codigoparametro`),
  UNIQUE KEY `ParametroIndex_idx` (`parametro`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `parametro` */

/*Table structure for table `parcial` */

DROP TABLE IF EXISTS `parcial`;

CREATE TABLE `parcial` (
  `codigoparcial` int(11) NOT NULL auto_increment,
  `codigoperiodoescolar` int(11) NOT NULL,
  `parcial` varchar(50) NOT NULL,
  `descripcion` text,
  PRIMARY KEY  (`codigoparcial`),
  UNIQUE KEY `PeriodoIndex_idx` (`codigoperiodoescolar`,`parcial`),
  KEY `codigoperiodoescolar_idx` (`codigoperiodoescolar`),
  CONSTRAINT `parcial_ibfk_1` FOREIGN KEY (`codigoperiodoescolar`) REFERENCES `periodoescolar` (`codigoperiodoescolar`),
  CONSTRAINT `parcial_ibfk_2` FOREIGN KEY (`codigoperiodoescolar`) REFERENCES `periodoescolar` (`codigoperiodoescolar`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

/*Data for the table `parcial` */

insert  into `parcial`(`codigoparcial`,`codigoperiodoescolar`,`parcial`,`descripcion`) values (1,1,'Primer Parcial',''),(2,1,'Segundo Parcial',''),(3,2,'Primer Parcial',''),(4,2,'Segundo Parcial',''),(5,3,'Primer Parcial',''),(6,4,'Primer Parcial',''),(7,1,'Tercer Parcial','Tercer parcial el Primer Trimestre'),(8,4,'Segundo Parcial',''),(9,4,'Tercer Parcial',''),(10,5,'Primer Parcial',''),(11,5,'Segundo Parcial',''),(12,5,'Tercer Parcial','');

/*Table structure for table `periodo` */

DROP TABLE IF EXISTS `periodo`;

CREATE TABLE `periodo` (
  `codigoperiodo` int(11) NOT NULL auto_increment,
  `periodo` int(11) NOT NULL,
  `descripcion` text,
  PRIMARY KEY  (`codigoperiodo`),
  UNIQUE KEY `PeriodoIndex_idx` (`periodo`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `periodo` */

insert  into `periodo`(`codigoperiodo`,`periodo`,`descripcion`) values (1,2013,'Periodo lectivo a partir del septiembre del 2012 hasta junio de 2013'),(2,2014,'Periodo lectivo a partir del septiembre del 2013 hasta junio de 2014');

/*Table structure for table `periodoescolar` */

DROP TABLE IF EXISTS `periodoescolar`;

CREATE TABLE `periodoescolar` (
  `codigoperiodoescolar` int(11) NOT NULL auto_increment,
  `codigoperiodo` int(11) NOT NULL,
  `periodoescolar` varchar(50) NOT NULL,
  `descripcion` text,
  `fechainicio` date NOT NULL,
  `fechafin` date NOT NULL,
  PRIMARY KEY  (`codigoperiodoescolar`),
  UNIQUE KEY `PeriodoIndex_idx` (`codigoperiodo`,`periodoescolar`),
  KEY `codigoperiodo_idx` (`codigoperiodo`),
  CONSTRAINT `periodoescolar_ibfk_1` FOREIGN KEY (`codigoperiodo`) REFERENCES `periodo` (`codigoperiodo`),
  CONSTRAINT `periodoescolar_ibfk_2` FOREIGN KEY (`codigoperiodo`) REFERENCES `periodo` (`codigoperiodo`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

/*Data for the table `periodoescolar` */

insert  into `periodoescolar`(`codigoperiodoescolar`,`codigoperiodo`,`periodoescolar`,`descripcion`,`fechainicio`,`fechafin`) values (1,1,'Primer Trimestre','Primer Trimestre','2012-09-01','2012-11-30'),(2,1,'Segundo Trimestre','','2012-12-01','2013-03-31'),(3,2,'Primer Trimestre','','2013-09-01','2013-11-30'),(4,2,'Segundo Trimestre','','2013-12-01','2014-03-31'),(5,2,'Tercer Trimestre','','2014-04-01','2014-06-30'),(6,1,'Tercer Trimestre','','2013-04-01','2013-06-30');

/*Table structure for table `sf_guard_group` */

DROP TABLE IF EXISTS `sf_guard_group`;

CREATE TABLE `sf_guard_group` (
  `id` int(11) NOT NULL auto_increment,
  `name` varchar(255) default NULL,
  `description` text,
  `created_at` datetime default NULL,
  `updated_at` datetime default NULL,
  PRIMARY KEY  (`id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

/*Data for the table `sf_guard_group` */

insert  into `sf_guard_group`(`id`,`name`,`description`,`created_at`,`updated_at`) values (1,'administradores','administradores',NULL,'2014-02-19 03:19:55'),(2,'alumnos','alumnos',NULL,NULL),(3,'inspectores','inspectores',NULL,NULL);

/*Table structure for table `sf_guard_group_permission` */

DROP TABLE IF EXISTS `sf_guard_group_permission`;

CREATE TABLE `sf_guard_group_permission` (
  `group_id` int(11) NOT NULL default '0',
  `permission_id` int(11) NOT NULL default '0',
  `created_at` datetime default NULL,
  `updated_at` datetime default NULL,
  PRIMARY KEY  (`group_id`,`permission_id`),
  KEY `permission_id` (`permission_id`),
  CONSTRAINT `sf_guard_group_permission_ibfk_1` FOREIGN KEY (`permission_id`) REFERENCES `sf_guard_permission` (`id`) ON DELETE CASCADE,
  CONSTRAINT `sf_guard_group_permission_ibfk_2` FOREIGN KEY (`group_id`) REFERENCES `sf_guard_group` (`id`) ON DELETE CASCADE,
  CONSTRAINT `sf_guard_group_permission_ibfk_3` FOREIGN KEY (`permission_id`) REFERENCES `sf_guard_permission` (`id`) ON DELETE CASCADE,
  CONSTRAINT `sf_guard_group_permission_ibfk_4` FOREIGN KEY (`group_id`) REFERENCES `sf_guard_group` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `sf_guard_group_permission` */

insert  into `sf_guard_group_permission`(`group_id`,`permission_id`,`created_at`,`updated_at`) values (1,1,'2014-02-19 03:16:03','2014-02-19 03:16:03'),(2,2,'2014-02-19 03:27:51','2014-02-19 03:27:51'),(3,3,'2014-02-19 04:03:16','2014-02-19 04:03:16');

/*Table structure for table `sf_guard_permission` */

DROP TABLE IF EXISTS `sf_guard_permission`;

CREATE TABLE `sf_guard_permission` (
  `id` int(11) NOT NULL auto_increment,
  `name` varchar(255) default NULL,
  `description` text,
  `created_at` datetime default NULL,
  `updated_at` datetime default NULL,
  PRIMARY KEY  (`id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

/*Data for the table `sf_guard_permission` */

insert  into `sf_guard_permission`(`id`,`name`,`description`,`created_at`,`updated_at`) values (1,'administrar','administrar',NULL,NULL),(2,'reporte','reporte','2014-02-19 03:27:25','2014-02-19 03:27:25'),(3,'registrar','registrar',NULL,'2014-02-19 04:02:21');

/*Table structure for table `sf_guard_remember_key` */

DROP TABLE IF EXISTS `sf_guard_remember_key`;

CREATE TABLE `sf_guard_remember_key` (
  `id` int(11) NOT NULL auto_increment,
  `user_id` int(11) default NULL,
  `remember_key` varchar(32) default NULL,
  `ip_address` varchar(50) NOT NULL default '',
  `created_at` datetime default NULL,
  `updated_at` datetime default NULL,
  PRIMARY KEY  (`id`,`ip_address`),
  KEY `user_id_idx` (`user_id`),
  CONSTRAINT `sf_guard_remember_key_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `sf_guard_user` (`id`) ON DELETE CASCADE,
  CONSTRAINT `sf_guard_remember_key_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `sf_guard_user` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `sf_guard_remember_key` */

/*Table structure for table `sf_guard_user` */

DROP TABLE IF EXISTS `sf_guard_user`;

CREATE TABLE `sf_guard_user` (
  `id` int(11) NOT NULL auto_increment,
  `username` varchar(128) NOT NULL,
  `algorithm` varchar(128) NOT NULL default 'sha1',
  `salt` varchar(128) default NULL,
  `password` varchar(128) default NULL,
  `is_active` tinyint(1) default '1',
  `is_super_admin` tinyint(1) default '0',
  `last_login` datetime default NULL,
  `created_at` datetime default NULL,
  `updated_at` datetime default NULL,
  PRIMARY KEY  (`id`),
  UNIQUE KEY `username` (`username`),
  KEY `is_active_idx_idx` (`is_active`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

/*Data for the table `sf_guard_user` */

insert  into `sf_guard_user`(`id`,`username`,`algorithm`,`salt`,`password`,`is_active`,`is_super_admin`,`last_login`,`created_at`,`updated_at`) values (1,'admin','sha1','7809ecc74d897eed9df36bdbecc7ea17','4f2873315906352b4519ddb47798f06edfa8cb89',1,1,'2014-04-30 02:09:09','2014-04-28 01:33:54','2014-04-30 02:09:09'),(2,'alumno','sha1','7fb9ce79b05148cac8db003f34eac74e','40f96d5edad55cef00f89e0fe68340f8b53627ee',1,0,'2014-04-28 03:22:01','2014-02-19 03:20:58','2014-04-28 03:22:01'),(3,'inspector','sha1','74eb58c85b8ab4995c1a2b69381fc87f','f1d4c1a822e75982b4c46c03707f0fda2bdb99ec',1,0,'2014-04-21 11:45:26','2014-02-19 04:04:37','2014-04-21 23:45:26');

/*Table structure for table `sf_guard_user_group` */

DROP TABLE IF EXISTS `sf_guard_user_group`;

CREATE TABLE `sf_guard_user_group` (
  `user_id` int(11) NOT NULL default '0',
  `group_id` int(11) NOT NULL default '0',
  `created_at` datetime default NULL,
  `updated_at` datetime default NULL,
  PRIMARY KEY  (`user_id`,`group_id`),
  KEY `group_id` (`group_id`),
  CONSTRAINT `sf_guard_user_group_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `sf_guard_user` (`id`) ON DELETE CASCADE,
  CONSTRAINT `sf_guard_user_group_ibfk_2` FOREIGN KEY (`group_id`) REFERENCES `sf_guard_group` (`id`) ON DELETE CASCADE,
  CONSTRAINT `sf_guard_user_group_ibfk_3` FOREIGN KEY (`user_id`) REFERENCES `sf_guard_user` (`id`) ON DELETE CASCADE,
  CONSTRAINT `sf_guard_user_group_ibfk_4` FOREIGN KEY (`group_id`) REFERENCES `sf_guard_group` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `sf_guard_user_group` */

insert  into `sf_guard_user_group`(`user_id`,`group_id`,`created_at`,`updated_at`) values (1,1,'2014-02-19 03:15:11','2014-02-19 03:15:11'),(2,2,'2014-02-19 03:20:58','2014-02-19 03:20:58'),(3,3,'2014-02-19 04:09:22','2014-02-19 04:09:22');

/*Table structure for table `sf_guard_user_permission` */

DROP TABLE IF EXISTS `sf_guard_user_permission`;

CREATE TABLE `sf_guard_user_permission` (
  `user_id` int(11) NOT NULL default '0',
  `permission_id` int(11) NOT NULL default '0',
  `created_at` datetime default NULL,
  `updated_at` datetime default NULL,
  PRIMARY KEY  (`user_id`,`permission_id`),
  KEY `permission_id` (`permission_id`),
  CONSTRAINT `sf_guard_user_permission_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `sf_guard_user` (`id`) ON DELETE CASCADE,
  CONSTRAINT `sf_guard_user_permission_ibfk_2` FOREIGN KEY (`permission_id`) REFERENCES `sf_guard_permission` (`id`) ON DELETE CASCADE,
  CONSTRAINT `sf_guard_user_permission_ibfk_3` FOREIGN KEY (`user_id`) REFERENCES `sf_guard_user` (`id`) ON DELETE CASCADE,
  CONSTRAINT `sf_guard_user_permission_ibfk_4` FOREIGN KEY (`permission_id`) REFERENCES `sf_guard_permission` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `sf_guard_user_permission` */

insert  into `sf_guard_user_permission`(`user_id`,`permission_id`,`created_at`,`updated_at`) values (1,1,'2014-02-19 03:16:03','2014-02-19 03:16:03'),(2,2,'2014-02-19 03:42:26','2014-02-19 03:42:26'),(3,2,'2014-02-19 04:04:37','2014-02-19 04:04:37'),(3,3,'2014-02-19 04:04:37','2014-02-19 04:04:37');

/*Table structure for table `tipofalta` */

DROP TABLE IF EXISTS `tipofalta`;

CREATE TABLE `tipofalta` (
  `codigotipofalta` int(11) NOT NULL auto_increment,
  `falta` varchar(30) NOT NULL,
  `descripcion` text,
  PRIMARY KEY  (`codigotipofalta`),
  UNIQUE KEY `FaltaIndex_idx` (`falta`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `tipofalta` */

insert  into `tipofalta`(`codigotipofalta`,`falta`,`descripcion`) values (1,'Justificada','El alumno presentó la documentación en un plazo no menor a dos días'),(2,'Injustificada','El alumno no ha presnetado ninguna documentación respecto de una falta, este estado se mantedrá mientras no presenta la documentacion respectiva');

/*Table structure for table `tiponovedad` */

DROP TABLE IF EXISTS `tiponovedad`;

CREATE TABLE `tiponovedad` (
  `codigotiponovedad` int(11) NOT NULL auto_increment,
  `novedad` varchar(30) NOT NULL,
  `descripcion` text,
  PRIMARY KEY  (`codigotiponovedad`),
  UNIQUE KEY `NovedadIndex_idx` (`novedad`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `tiponovedad` */

insert  into `tiponovedad`(`codigotiponovedad`,`novedad`,`descripcion`) values (1,'Fuga','Registras las fugas de los alumnos '),(2,'Atraso','Registra los atrasos por el alumno a las diferentes materias');

/*Table structure for table `faltaalumnoparcial` */

DROP TABLE IF EXISTS `faltaalumnoparcial`;

/*!50001 DROP VIEW IF EXISTS `faltaalumnoparcial` */;
/*!50001 DROP TABLE IF EXISTS `faltaalumnoparcial` */;

/*!50001 CREATE TABLE  `faltaalumnoparcial`(
 `codigofalta` int(11) ,
 `codigoalumno` int(11) ,
 `codigoparcial` int(11) ,
 `fecha` date ,
 `apellido` varchar(30) ,
 `nombre` varchar(30) ,
 `falta` varchar(30) ,
 `descripcion` text 
)*/;

/*Table structure for table `novedadalumnoparcial` */

DROP TABLE IF EXISTS `novedadalumnoparcial`;

/*!50001 DROP VIEW IF EXISTS `novedadalumnoparcial` */;
/*!50001 DROP TABLE IF EXISTS `novedadalumnoparcial` */;

/*!50001 CREATE TABLE  `novedadalumnoparcial`(
 `codigonovedadcursomateriahorario` int(11) ,
 `codigoalumno` int(11) ,
 `codigoparcial` int(11) ,
 `fecha` date ,
 `apellido` varchar(30) ,
 `nombre` varchar(30) ,
 `novedad` varchar(30) ,
 `curso` varchar(15) ,
 `paralelo` varchar(15) ,
 `materia` varchar(30) ,
 `horario` varchar(50) 
)*/;

/*View structure for view faltaalumnoparcial */

/*!50001 DROP TABLE IF EXISTS `faltaalumnoparcial` */;
/*!50001 DROP VIEW IF EXISTS `faltaalumnoparcial` */;

/*!50001 CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `faltaalumnoparcial` AS select `f`.`codigofalta` AS `codigofalta`,`f`.`codigoalumno` AS `codigoalumno`,`f`.`codigoparcial` AS `codigoparcial`,`f`.`fecha` AS `fecha`,`i`.`apellido` AS `apellido`,`i`.`nombre` AS `nombre`,`tf`.`falta` AS `falta`,`f`.`descripcion` AS `descripcion` from ((`falta` `f` join `tipofalta` `tf`) join `inspector` `i`) where ((`f`.`codigotipofalta` = `tf`.`codigotipofalta`) and (`f`.`codigoinspector` = `i`.`codigoinspector`)) order by `f`.`fecha` */;

/*View structure for view novedadalumnoparcial */

/*!50001 DROP TABLE IF EXISTS `novedadalumnoparcial` */;
/*!50001 DROP VIEW IF EXISTS `novedadalumnoparcial` */;

/*!50001 CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `novedadalumnoparcial` AS select `ncmh`.`codigonovedadcursomateriahorario` AS `codigonovedadcursomateriahorario`,`n`.`codigoalumno` AS `codigoalumno`,`n`.`codigoparcial` AS `codigoparcial`,`n`.`fecha` AS `fecha`,`i`.`apellido` AS `apellido`,`i`.`nombre` AS `nombre`,`tn`.`novedad` AS `novedad`,`c`.`curso` AS `curso`,`p`.`paralelo` AS `paralelo`,`m`.`materia` AS `materia`,`h`.`horario` AS `horario` from ((((((((`novedad` `n` join `novedadcursomateriahorario` `ncmh`) join `inspector` `i`) join `tiponovedad` `tn`) join `cursomateriahorario` `cmh`) join `curso` `c`) join `paralelo` `p`) join `materia` `m`) join `horario` `h`) where ((`n`.`codigonovedad` = `ncmh`.`codigonovedad`) and (`n`.`codigoinspector` = `i`.`codigoinspector`) and (`ncmh`.`codigotiponovedad` = `tn`.`codigotiponovedad`) and (`ncmh`.`codigocursomateriahorario` = `cmh`.`codigocursomateriahorario`) and (`cmh`.`codigocurso` = `c`.`codigocurso`) and (`cmh`.`codigoparalelo` = `p`.`codigoparalelo`) and (`cmh`.`codigomateria` = `m`.`codigomateria`) and (`cmh`.`codigohorario` = `h`.`codigohorario`)) order by `n`.`fecha` */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
