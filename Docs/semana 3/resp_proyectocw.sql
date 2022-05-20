-- MariaDB dump 10.19  Distrib 10.4.24-MariaDB, for Win64 (AMD64)
--
-- Host: localhost    Database: proyectocw
-- ------------------------------------------------------
-- Server version	10.4.24-MariaDB

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `alumno`
--

DROP TABLE IF EXISTS `alumno`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `alumno` (
  `ID_Email` int(11) NOT NULL,
  `Nombre` char(50) NOT NULL,
  `Apellidos` char(50) NOT NULL,
  `No_Cuenta` int(11) NOT NULL,
  `Telefono` int(11) NOT NULL,
  `Usuario` char(50) NOT NULL,
  `ID_TipoUsuario` int(11) NOT NULL,
  `Contrasena` varchar(50) NOT NULL,
  `ID_Grado` int(11) NOT NULL,
  `ID_Grupo` int(11) NOT NULL,
  PRIMARY KEY (`ID_Email`),
  UNIQUE KEY `No_Cuenta` (`No_Cuenta`),
  KEY `ID_TipoUsuario` (`ID_TipoUsuario`),
  KEY `ID_Grado` (`ID_Grado`),
  KEY `ID_Grupo` (`ID_Grupo`),
  CONSTRAINT `alumno_ibfk_1` FOREIGN KEY (`ID_Email`) REFERENCES `email` (`ID_Email`),
  CONSTRAINT `alumno_ibfk_2` FOREIGN KEY (`ID_TipoUsuario`) REFERENCES `tipo_usuario` (`ID_TipoUsuario`),
  CONSTRAINT `alumno_ibfk_3` FOREIGN KEY (`ID_Grado`) REFERENCES `grado` (`ID_Grado`),
  CONSTRAINT `alumno_ibfk_4` FOREIGN KEY (`ID_Grupo`) REFERENCES `grupo` (`ID_Grupo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `alumno`
--

LOCK TABLES `alumno` WRITE;
/*!40000 ALTER TABLE `alumno` DISABLE KEYS */;
/*!40000 ALTER TABLE `alumno` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `creacionclase`
--

DROP TABLE IF EXISTS `creacionclase`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `creacionclase` (
  `ID_Clase` int(11) NOT NULL,
  `ID_Email` int(11) NOT NULL,
  `Grupo` tinyint(4) NOT NULL,
  `ID_Materia` int(11) NOT NULL,
  `Descripcion` text NOT NULL,
  PRIMARY KEY (`ID_Clase`),
  KEY `ID_Email` (`ID_Email`),
  KEY `ID_Materia` (`ID_Materia`),
  CONSTRAINT `creacionclase_ibfk_1` FOREIGN KEY (`ID_Email`) REFERENCES `email` (`ID_Email`),
  CONSTRAINT `creacionclase_ibfk_2` FOREIGN KEY (`ID_Materia`) REFERENCES `materia` (`ID_Materia`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `creacionclase`
--

LOCK TABLES `creacionclase` WRITE;
/*!40000 ALTER TABLE `creacionclase` DISABLE KEYS */;
/*!40000 ALTER TABLE `creacionclase` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `email`
--

DROP TABLE IF EXISTS `email`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `email` (
  `ID_Email` int(11) NOT NULL AUTO_INCREMENT,
  `Email` varchar(255) NOT NULL,
  PRIMARY KEY (`ID_Email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `email`
--

LOCK TABLES `email` WRITE;
/*!40000 ALTER TABLE `email` DISABLE KEYS */;
/*!40000 ALTER TABLE `email` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `email_h_publicaciones`
--

DROP TABLE IF EXISTS `email_h_publicaciones`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `email_h_publicaciones` (
  `ID_EHP` int(11) NOT NULL,
  `ID_Email` int(11) NOT NULL,
  `ID_TipoPublicaciones` int(11) NOT NULL,
  `Fecha` datetime NOT NULL,
  `ID_Clase` int(11) NOT NULL,
  `ID_Respuestas` int(11) NOT NULL,
  `ComentarioPublicacion` text NOT NULL,
  PRIMARY KEY (`ID_EHP`),
  KEY `ID_Email` (`ID_Email`),
  KEY `ID_TipoPublicaciones` (`ID_TipoPublicaciones`),
  KEY `ID_Clase` (`ID_Clase`),
  KEY `ID_Respuestas` (`ID_Respuestas`),
  CONSTRAINT `email_h_publicaciones_ibfk_1` FOREIGN KEY (`ID_Email`) REFERENCES `email` (`ID_Email`),
  CONSTRAINT `email_h_publicaciones_ibfk_2` FOREIGN KEY (`ID_TipoPublicaciones`) REFERENCES `tipo_publicaciones` (`ID_TipoPublicaciones`),
  CONSTRAINT `email_h_publicaciones_ibfk_3` FOREIGN KEY (`ID_Clase`) REFERENCES `creacionclase` (`ID_Clase`),
  CONSTRAINT `email_h_publicaciones_ibfk_4` FOREIGN KEY (`ID_Respuestas`) REFERENCES `respuestas` (`ID_Respuestas`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `email_h_publicaciones`
--

LOCK TABLES `email_h_publicaciones` WRITE;
/*!40000 ALTER TABLE `email_h_publicaciones` DISABLE KEYS */;
/*!40000 ALTER TABLE `email_h_publicaciones` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `grado`
--

DROP TABLE IF EXISTS `grado`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `grado` (
  `ID_Grado` int(11) NOT NULL AUTO_INCREMENT,
  `Grado` tinyint(4) NOT NULL,
  PRIMARY KEY (`ID_Grado`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `grado`
--

LOCK TABLES `grado` WRITE;
/*!40000 ALTER TABLE `grado` DISABLE KEYS */;
/*!40000 ALTER TABLE `grado` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `grupo`
--

DROP TABLE IF EXISTS `grupo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `grupo` (
  `ID_Grupo` int(11) NOT NULL AUTO_INCREMENT,
  `Grupo` tinyint(4) NOT NULL,
  PRIMARY KEY (`ID_Grupo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `grupo`
--

LOCK TABLES `grupo` WRITE;
/*!40000 ALTER TABLE `grupo` DISABLE KEYS */;
/*!40000 ALTER TABLE `grupo` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `materia`
--

DROP TABLE IF EXISTS `materia`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `materia` (
  `ID_Materia` int(11) NOT NULL,
  `Materia` char(255) NOT NULL,
  PRIMARY KEY (`ID_Materia`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `materia`
--

LOCK TABLES `materia` WRITE;
/*!40000 ALTER TABLE `materia` DISABLE KEYS */;
/*!40000 ALTER TABLE `materia` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `profesor`
--

DROP TABLE IF EXISTS `profesor`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `profesor` (
  `ID_Email` int(11) NOT NULL,
  `Nombre` char(50) NOT NULL,
  `Apellidos` char(50) NOT NULL,
  `No_Trabajador` int(11) NOT NULL,
  `Telefono` int(11) NOT NULL,
  `Usuario` char(50) NOT NULL,
  `ID_TipoUsuario` int(11) NOT NULL,
  `Contrasena` varchar(50) NOT NULL,
  PRIMARY KEY (`ID_Email`),
  UNIQUE KEY `No_Trabajador` (`No_Trabajador`),
  KEY `ID_TipoUsuario` (`ID_TipoUsuario`),
  CONSTRAINT `profesor_ibfk_1` FOREIGN KEY (`ID_Email`) REFERENCES `email` (`ID_Email`),
  CONSTRAINT `profesor_ibfk_2` FOREIGN KEY (`ID_TipoUsuario`) REFERENCES `tipo_usuario` (`ID_TipoUsuario`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `profesor`
--

LOCK TABLES `profesor` WRITE;
/*!40000 ALTER TABLE `profesor` DISABLE KEYS */;
/*!40000 ALTER TABLE `profesor` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `respuestas`
--

DROP TABLE IF EXISTS `respuestas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `respuestas` (
  `ID_Respuestas` int(11) NOT NULL,
  `ID_TipoRespuestas` int(11) NOT NULL,
  PRIMARY KEY (`ID_Respuestas`),
  KEY `ID_TipoRespuestas` (`ID_TipoRespuestas`),
  CONSTRAINT `respuestas_ibfk_1` FOREIGN KEY (`ID_TipoRespuestas`) REFERENCES `tipo_respuestas` (`ID_TipoRespuestas`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `respuestas`
--

LOCK TABLES `respuestas` WRITE;
/*!40000 ALTER TABLE `respuestas` DISABLE KEYS */;
/*!40000 ALTER TABLE `respuestas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tipo_publicaciones`
--

DROP TABLE IF EXISTS `tipo_publicaciones`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tipo_publicaciones` (
  `ID_TipoPublicaciones` int(11) NOT NULL,
  `TipoPublicaciones` char(255) NOT NULL,
  PRIMARY KEY (`ID_TipoPublicaciones`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tipo_publicaciones`
--

LOCK TABLES `tipo_publicaciones` WRITE;
/*!40000 ALTER TABLE `tipo_publicaciones` DISABLE KEYS */;
/*!40000 ALTER TABLE `tipo_publicaciones` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tipo_respuestas`
--

DROP TABLE IF EXISTS `tipo_respuestas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tipo_respuestas` (
  `ID_TipoRespuestas` int(11) NOT NULL,
  `TipoRespuestas` char(255) NOT NULL,
  PRIMARY KEY (`ID_TipoRespuestas`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tipo_respuestas`
--

LOCK TABLES `tipo_respuestas` WRITE;
/*!40000 ALTER TABLE `tipo_respuestas` DISABLE KEYS */;
/*!40000 ALTER TABLE `tipo_respuestas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tipo_usuario`
--

DROP TABLE IF EXISTS `tipo_usuario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tipo_usuario` (
  `ID_TipoUsuario` int(11) NOT NULL,
  `TipoUsuario` varchar(20) NOT NULL,
  PRIMARY KEY (`ID_TipoUsuario`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tipo_usuario`
--

LOCK TABLES `tipo_usuario` WRITE;
/*!40000 ALTER TABLE `tipo_usuario` DISABLE KEYS */;
/*!40000 ALTER TABLE `tipo_usuario` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2022-05-19 20:35:22
