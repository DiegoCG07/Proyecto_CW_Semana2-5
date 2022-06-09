-- MariaDB dump 10.19  Distrib 10.4.24-MariaDB, for Win64 (AMD64)
--
-- Host: localhost    Database: proyectofinalcw
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
-- Table structure for table `administrador`
--

DROP TABLE IF EXISTS `administrador`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `administrador` (
  `Usuario` char(50) NOT NULL,
  `ID_Usuario` int(11) NOT NULL,
  PRIMARY KEY (`Usuario`),
  KEY `ID_Usuario` (`ID_Usuario`),
  CONSTRAINT `administrador_ibfk_1` FOREIGN KEY (`ID_Usuario`) REFERENCES `usuario` (`ID_Usuario`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `administrador`
--

LOCK TABLES `administrador` WRITE;
/*!40000 ALTER TABLE `administrador` DISABLE KEYS */;
/*!40000 ALTER TABLE `administrador` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ahorcado`
--

DROP TABLE IF EXISTS `ahorcado`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ahorcado` (
  `ID_Palabra` int(11) NOT NULL AUTO_INCREMENT,
  `ID_cHp` int(11) NOT NULL,
  `Palabra` varchar(10) NOT NULL,
  `ID_EstadoJuego` int(11) NOT NULL,
  PRIMARY KEY (`ID_Palabra`),
  KEY `ID_cHp` (`ID_cHp`),
  KEY `ID_EstadoJuego` (`ID_EstadoJuego`),
  CONSTRAINT `ahorcado_ibfk_1` FOREIGN KEY (`ID_cHp`) REFERENCES `clase_has_publicaciones` (`ID_cHp`),
  CONSTRAINT `ahorcado_ibfk_2` FOREIGN KEY (`ID_EstadoJuego`) REFERENCES `estado_juego` (`ID_EstadoJuego`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ahorcado`
--

LOCK TABLES `ahorcado` WRITE;
/*!40000 ALTER TABLE `ahorcado` DISABLE KEYS */;
/*!40000 ALTER TABLE `ahorcado` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `alumno`
--

DROP TABLE IF EXISTS `alumno`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `alumno` (
  `Num_Cuenta` int(11) NOT NULL,
  `Telefono` bigint(20) NOT NULL,
  `Usuario` char(50) NOT NULL,
  `ID_Grado` int(11) NOT NULL,
  `ID_Grupo` int(11) NOT NULL,
  `ID_Turno` int(11) NOT NULL,
  `ID_Usuario` int(11) NOT NULL,
  PRIMARY KEY (`Num_Cuenta`),
  KEY `ID_Grado` (`ID_Grado`),
  KEY `ID_Grupo` (`ID_Grupo`),
  KEY `ID_Turno` (`ID_Turno`),
  KEY `ID_Usuario` (`ID_Usuario`),
  CONSTRAINT `alumno_ibfk_4` FOREIGN KEY (`ID_Grado`) REFERENCES `grado` (`ID_Grado`),
  CONSTRAINT `alumno_ibfk_5` FOREIGN KEY (`ID_Grupo`) REFERENCES `grupo` (`ID_Grupo`),
  CONSTRAINT `alumno_ibfk_6` FOREIGN KEY (`ID_Turno`) REFERENCES `turno` (`ID_Turno`),
  CONSTRAINT `alumno_ibfk_7` FOREIGN KEY (`ID_Usuario`) REFERENCES `usuario` (`ID_Usuario`)
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
-- Table structure for table `alumno_has_clase`
--

DROP TABLE IF EXISTS `alumno_has_clase`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `alumno_has_clase` (
  `ID_aHc` int(11) NOT NULL AUTO_INCREMENT,
  `Num_Cuenta` int(11) NOT NULL,
  `ID_Clase` varchar(7) NOT NULL,
  PRIMARY KEY (`ID_aHc`),
  KEY `Num_Cuenta` (`Num_Cuenta`),
  KEY `ID_Clase` (`ID_Clase`),
  CONSTRAINT `alumno_has_clase_ibfk_1` FOREIGN KEY (`Num_Cuenta`) REFERENCES `alumno` (`Num_Cuenta`),
  CONSTRAINT `alumno_has_clase_ibfk_2` FOREIGN KEY (`ID_Clase`) REFERENCES `clase` (`ID_Clase`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `alumno_has_clase`
--

LOCK TABLES `alumno_has_clase` WRITE;
/*!40000 ALTER TABLE `alumno_has_clase` DISABLE KEYS */;
/*!40000 ALTER TABLE `alumno_has_clase` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `alumno_has_tarea`
--

DROP TABLE IF EXISTS `alumno_has_tarea`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `alumno_has_tarea` (
  `ID_aHt` int(11) NOT NULL AUTO_INCREMENT,
  `Num_Cuenta` int(11) NOT NULL,
  `ID_Tarea` int(11) NOT NULL,
  `Calificacion` int(11) DEFAULT NULL,
  `ID_RutaArchivo` int(11) DEFAULT NULL,
  `ID_EstadoTarea` int(11) NOT NULL,
  `Fecha_Entrega` datetime NOT NULL,
  PRIMARY KEY (`ID_aHt`),
  KEY `Num_Cuenta` (`Num_Cuenta`),
  KEY `ID_Tarea` (`ID_Tarea`),
  KEY `ID_RutaArchivo` (`ID_RutaArchivo`),
  KEY `ID_EstadoTarea` (`ID_EstadoTarea`),
  CONSTRAINT `alumno_has_tarea_ibfk_1` FOREIGN KEY (`Num_Cuenta`) REFERENCES `alumno` (`Num_Cuenta`),
  CONSTRAINT `alumno_has_tarea_ibfk_2` FOREIGN KEY (`ID_Tarea`) REFERENCES `tarea` (`ID_Tarea`),
  CONSTRAINT `alumno_has_tarea_ibfk_3` FOREIGN KEY (`ID_RutaArchivo`) REFERENCES `ruta_archivo` (`ID_RutaArchivo`),
  CONSTRAINT `alumno_has_tarea_ibfk_4` FOREIGN KEY (`ID_EstadoTarea`) REFERENCES `estado_tarea` (`ID_EstadoTarea`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `alumno_has_tarea`
--

LOCK TABLES `alumno_has_tarea` WRITE;
/*!40000 ALTER TABLE `alumno_has_tarea` DISABLE KEYS */;
/*!40000 ALTER TABLE `alumno_has_tarea` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `calendario`
--

DROP TABLE IF EXISTS `calendario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `calendario` (
  `ID_Fecha` int(11) NOT NULL AUTO_INCREMENT,
  `Asunto` char(255) NOT NULL,
  `Fecha` datetime NOT NULL,
  `ID_TipoFecha` int(11) NOT NULL,
  PRIMARY KEY (`ID_Fecha`),
  KEY `ID_TipoFecha` (`ID_TipoFecha`),
  CONSTRAINT `calendario_ibfk_1` FOREIGN KEY (`ID_TipoFecha`) REFERENCES `tipo_fecha` (`ID_TipoFecha`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `calendario`
--

LOCK TABLES `calendario` WRITE;
/*!40000 ALTER TABLE `calendario` DISABLE KEYS */;
/*!40000 ALTER TABLE `calendario` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `clase`
--

DROP TABLE IF EXISTS `clase`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `clase` (
  `ID_Clase` varchar(7) NOT NULL,
  `ID_Grupo` int(11) NOT NULL,
  `ID_Materia` int(11) NOT NULL,
  `Descripcion` text NOT NULL,
  `Num_Trabajador` varchar(13) NOT NULL,
  PRIMARY KEY (`ID_Clase`),
  KEY `ID_Grupo` (`ID_Grupo`),
  KEY `ID_Materia` (`ID_Materia`),
  KEY `Num_Trabajador` (`Num_Trabajador`),
  CONSTRAINT `clase_ibfk_2` FOREIGN KEY (`ID_Grupo`) REFERENCES `grupo` (`ID_Grupo`),
  CONSTRAINT `clase_ibfk_3` FOREIGN KEY (`ID_Materia`) REFERENCES `materia` (`ID_Materia`),
  CONSTRAINT `clase_ibfk_4` FOREIGN KEY (`Num_Trabajador`) REFERENCES `profesor` (`Num_Trabajador`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `clase`
--

LOCK TABLES `clase` WRITE;
/*!40000 ALTER TABLE `clase` DISABLE KEYS */;
/*!40000 ALTER TABLE `clase` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `clase_has_publicaciones`
--

DROP TABLE IF EXISTS `clase_has_publicaciones`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `clase_has_publicaciones` (
  `ID_cHp` int(11) NOT NULL AUTO_INCREMENT,
  `ID_Clase` varchar(7) NOT NULL,
  `ID_Publicacion` int(11) NOT NULL,
  PRIMARY KEY (`ID_cHp`),
  KEY `ID_Clase` (`ID_Clase`),
  KEY `ID_Publicacion` (`ID_Publicacion`),
  CONSTRAINT `clase_has_publicaciones_ibfk_1` FOREIGN KEY (`ID_Clase`) REFERENCES `clase` (`ID_Clase`),
  CONSTRAINT `clase_has_publicaciones_ibfk_2` FOREIGN KEY (`ID_Publicacion`) REFERENCES `publicaciones` (`ID_Publicacion`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `clase_has_publicaciones`
--

LOCK TABLES `clase_has_publicaciones` WRITE;
/*!40000 ALTER TABLE `clase_has_publicaciones` DISABLE KEYS */;
/*!40000 ALTER TABLE `clase_has_publicaciones` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `contrasena`
--

DROP TABLE IF EXISTS `contrasena`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `contrasena` (
  `ID_Contrasena` int(11) NOT NULL AUTO_INCREMENT,
  `Contrasena_hash` varchar(255) NOT NULL,
  `Sal` varchar(255) NOT NULL,
  PRIMARY KEY (`ID_Contrasena`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `contrasena`
--

LOCK TABLES `contrasena` WRITE;
/*!40000 ALTER TABLE `contrasena` DISABLE KEYS */;
/*!40000 ALTER TABLE `contrasena` ENABLE KEYS */;
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
-- Table structure for table `estado_juego`
--

DROP TABLE IF EXISTS `estado_juego`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `estado_juego` (
  `ID_EstadoJuego` int(11) NOT NULL AUTO_INCREMENT,
  `EstadoJuego` char(9) NOT NULL,
  PRIMARY KEY (`ID_EstadoJuego`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `estado_juego`
--

LOCK TABLES `estado_juego` WRITE;
/*!40000 ALTER TABLE `estado_juego` DISABLE KEYS */;
INSERT INTO `estado_juego` VALUES (1,'Oculto'),(2,'No oculto');
/*!40000 ALTER TABLE `estado_juego` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `estado_material`
--

DROP TABLE IF EXISTS `estado_material`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `estado_material` (
  `ID_EstadoMaterial` int(11) NOT NULL AUTO_INCREMENT,
  `EstadoMaterial` char(12) NOT NULL,
  PRIMARY KEY (`ID_EstadoMaterial`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `estado_material`
--

LOCK TABLES `estado_material` WRITE;
/*!40000 ALTER TABLE `estado_material` DISABLE KEYS */;
INSERT INTO `estado_material` VALUES (1,'Reportado'),(2,'No reportado');
/*!40000 ALTER TABLE `estado_material` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `estado_tarea`
--

DROP TABLE IF EXISTS `estado_tarea`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `estado_tarea` (
  `ID_EstadoTarea` int(11) NOT NULL AUTO_INCREMENT,
  `EstadoTarea` char(12) NOT NULL,
  PRIMARY KEY (`ID_EstadoTarea`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `estado_tarea`
--

LOCK TABLES `estado_tarea` WRITE;
/*!40000 ALTER TABLE `estado_tarea` DISABLE KEYS */;
INSERT INTO `estado_tarea` VALUES (1,'Entregada'),(2,'No entregada');
/*!40000 ALTER TABLE `estado_tarea` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `grado`
--

DROP TABLE IF EXISTS `grado`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `grado` (
  `ID_Grado` int(11) NOT NULL AUTO_INCREMENT,
  `Grado` char(10) NOT NULL,
  PRIMARY KEY (`ID_Grado`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `grado`
--

LOCK TABLES `grado` WRITE;
/*!40000 ALTER TABLE `grado` DISABLE KEYS */;
INSERT INTO `grado` VALUES (1,'Cuarto año'),(2,'Quinto año'),(3,'Sexto año');
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
  `Grupo` int(11) NOT NULL,
  PRIMARY KEY (`ID_Grupo`)
) ENGINE=InnoDB AUTO_INCREMENT=99 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `grupo`
--

LOCK TABLES `grupo` WRITE;
/*!40000 ALTER TABLE `grupo` DISABLE KEYS */;
INSERT INTO `grupo` VALUES (1,401),(2,402),(3,403),(4,404),(5,405),(6,406),(7,407),(8,408),(9,409),(10,410),(11,411),(12,412),(13,413),(14,414),(15,415),(16,416),(17,417),(18,451),(19,452),(20,453),(21,454),(22,455),(23,456),(24,457),(25,458),(26,459),(27,460),(28,461),(29,462),(30,463),(31,464),(32,465),(33,466),(34,501),(35,502),(36,503),(37,504),(38,505),(39,506),(40,507),(41,508),(42,509),(43,510),(44,511),(45,512),(46,513),(47,514),(48,515),(49,516),(50,517),(51,518),(52,551),(53,552),(54,553),(55,554),(56,555),(57,556),(58,557),(59,558),(60,559),(61,560),(62,561),(63,562),(64,563),(65,564),(66,601),(67,602),(68,603),(69,604),(70,605),(71,606),(72,607),(73,608),(74,609),(75,610),(76,611),(77,612),(78,613),(79,614),(80,615),(81,616),(82,617),(83,618),(84,619),(85,651),(86,652),(87,653),(88,654),(89,655),(90,656),(91,657),(92,658),(93,659),(94,660),(95,661),(96,662),(97,663),(98,664);
/*!40000 ALTER TABLE `grupo` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `materia`
--

DROP TABLE IF EXISTS `materia`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `materia` (
  `ID_Materia` int(11) NOT NULL AUTO_INCREMENT,
  `Materia` char(255) NOT NULL,
  PRIMARY KEY (`ID_Materia`)
) ENGINE=InnoDB AUTO_INCREMENT=98 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `materia`
--

LOCK TABLES `materia` WRITE;
/*!40000 ALTER TABLE `materia` DISABLE KEYS */;
INSERT INTO `materia` VALUES (1,'Matemáticas'),(2,'Física III'),(3,'Lengua Española'),(4,'Historia Universal'),(5,'Lógica'),(6,'Geografía'),(7,'Dibujo II'),(8,'Lengua Extranjera Inglés IV'),(9,'Lengua Extranjera Francés IV'),(10,'Danza Clásica'),(11,'Danza Contemporánea'),(12,'Danza Española'),(13,'Danza Regional Mexicana'),(14,'Escultura IV'),(15,'Fotografía IV'),(16,'Grabado IV'),(17,'Música IV'),(18,'Pintura IV'),(19,'Teatro IV'),(20,'Educación Física IV'),(21,'Orientación Educativa IV'),(22,'Informática'),(23,'Matemáticas'),(24,'Química III'),(25,'Biología IV'),(26,'Educación para la Salud'),(27,'Historia de México II'),(28,'Etimologías Grecolatinas'),(29,'Lengua Extranjera Inglés V'),(30,'Lengua Extranjera Francés V'),(31,'Lengua Extranjera Italiano I'),(32,'Lengua Extranjera Alemán I'),(33,'Lengua Extranjera Inglés I'),(34,'Lengua Extranjera Francés I'),(35,'Ética'),(36,'Educación Física V'),(37,'Danza Clásica'),(38,'Danza Contemporánea'),(39,'Danza Española'),(40,'Danza Regional Mexicana'),(41,'Escultura V'),(42,'Fotografía V'),(43,'Grabado V'),(44,'Música V'),(45,'Pintura V'),(46,'Teatro V'),(47,'Orientación Educativa V'),(48,'Literatura Universal'),(49,'Derecho'),(50,'Literatura Mex. e Iberoam.'),(51,'Inglés VI'),(52,'Francés VI'),(53,'Alemán II'),(54,'Italiano II'),(55,'Inglés II'),(56,'Francés II'),(57,'Psicología'),(58,'Higiene Mental'),(59,'Estadística y Prob.'),(60,'Matemáticas VI'),(61,'Dibujo Constructivo II'),(62,'Física IV'),(63,'Química IV'),(64,'Geología y Mineralogía'),(65,'Físico-Química'),(66,'Temas Selec. Matemáticas'),(67,'Informática Aplicada a la Ciencia y la Industria'),(68,'Biología V'),(69,'Astronomía'),(70,'Matemáticas VI'),(71,'Biología V'),(72,'Física IV'),(73,'Química IV'),(74,'Geología y Mineralogía'),(75,'Físico-Química'),(76,'Temas Selec. Biología'),(77,'Temas Selec. de Morfología y Fisiología'),(78,'Informática Aplicada a la Ciencia y la Industria'),(79,'Geografía Económica'),(80,'Introducc. Al Estudio de las Ciencias Sociales y Ec.'),(81,'Problemas Soc. Polit. y Económicos de México'),(82,'Matemáticas VI'),(83,'Contabilidad y Gestión Administrativa'),(84,'Geografía Política'),(85,'Sociología'),(86,'Introducc. Al Estudio de las Ciencias Sociales y Ec.'),(87,'Historia de la Cultura'),(88,'Historia de las Doctrinas Filosóficas'),(89,'Matemáticas VI'),(90,'Revolución Mexicana'),(91,'Pensamiento Filosófico de México'),(92,'Modelado II'),(93,'Latín'),(94,'Griego'),(95,'Comunicación Visual'),(96,'Estética'),(97,'Historia del Arte');
/*!40000 ALTER TABLE `materia` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `material`
--

DROP TABLE IF EXISTS `material`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `material` (
  `ID_Material` int(11) NOT NULL AUTO_INCREMENT,
  `ID_cHp` int(11) NOT NULL,
  `Nombre` char(255) NOT NULL,
  `Descripcion` text NOT NULL,
  `Fecha_Asignacion` datetime NOT NULL,
  `ID_RutaArchivo` int(11) NOT NULL,
  PRIMARY KEY (`ID_Material`),
  KEY `ID_cHp` (`ID_cHp`),
  KEY `ID_RutaArchivo` (`ID_RutaArchivo`),
  CONSTRAINT `material_ibfk_1` FOREIGN KEY (`ID_cHp`) REFERENCES `clase_has_publicaciones` (`ID_cHp`),
  CONSTRAINT `material_ibfk_2` FOREIGN KEY (`ID_RutaArchivo`) REFERENCES `ruta_archivo` (`ID_RutaArchivo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `material`
--

LOCK TABLES `material` WRITE;
/*!40000 ALTER TABLE `material` DISABLE KEYS */;
/*!40000 ALTER TABLE `material` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `material_tablon`
--

DROP TABLE IF EXISTS `material_tablon`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `material_tablon` (
  `ID_MaterialTablon` int(11) NOT NULL AUTO_INCREMENT,
  `Num_Cuenta` int(11) NOT NULL,
  `ID_Materia` int(11) NOT NULL,
  `ID_RutaArchivo` int(11) NOT NULL,
  `ID_EstadoMaterial` int(11) NOT NULL,
  `Fecha_Publicacion` datetime NOT NULL,
  `Fecha_Edición` datetime NOT NULL,
  `Unidad` char(255) NOT NULL,
  `Tema` char(255) NOT NULL,
  `ID_TipoMaterial` int(11) NOT NULL,
  `Megusta` int(11) NOT NULL,
  PRIMARY KEY (`ID_MaterialTablon`),
  KEY `Num_Cuenta` (`Num_Cuenta`),
  KEY `ID_Materia` (`ID_Materia`),
  KEY `ID_RutaArchivo` (`ID_RutaArchivo`),
  KEY `ID_EstadoMaterial` (`ID_EstadoMaterial`),
  KEY `ID_TipoMaterial` (`ID_TipoMaterial`),
  CONSTRAINT `material_tablon_ibfk_1` FOREIGN KEY (`Num_Cuenta`) REFERENCES `alumno` (`Num_Cuenta`),
  CONSTRAINT `material_tablon_ibfk_2` FOREIGN KEY (`ID_Materia`) REFERENCES `materia` (`ID_Materia`),
  CONSTRAINT `material_tablon_ibfk_3` FOREIGN KEY (`ID_RutaArchivo`) REFERENCES `ruta_archivo` (`ID_RutaArchivo`),
  CONSTRAINT `material_tablon_ibfk_4` FOREIGN KEY (`ID_EstadoMaterial`) REFERENCES `estado_material` (`ID_EstadoMaterial`),
  CONSTRAINT `material_tablon_ibfk_5` FOREIGN KEY (`ID_TipoMaterial`) REFERENCES `tipo_material` (`ID_TipoMaterial`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `material_tablon`
--

LOCK TABLES `material_tablon` WRITE;
/*!40000 ALTER TABLE `material_tablon` DISABLE KEYS */;
/*!40000 ALTER TABLE `material_tablon` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `moderador`
--

DROP TABLE IF EXISTS `moderador`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `moderador` (
  `Usuario` char(50) NOT NULL,
  `ID_Usuario` int(11) NOT NULL,
  PRIMARY KEY (`Usuario`),
  KEY `ID_Usuario` (`ID_Usuario`),
  CONSTRAINT `moderador_ibfk_1` FOREIGN KEY (`ID_Usuario`) REFERENCES `usuario` (`ID_Usuario`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `moderador`
--

LOCK TABLES `moderador` WRITE;
/*!40000 ALTER TABLE `moderador` DISABLE KEYS */;
/*!40000 ALTER TABLE `moderador` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `permisos`
--

DROP TABLE IF EXISTS `permisos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `permisos` (
  `ID_Permiso` int(11) NOT NULL AUTO_INCREMENT,
  `Permiso` char(255) NOT NULL,
  PRIMARY KEY (`ID_Permiso`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `permisos`
--

LOCK TABLES `permisos` WRITE;
/*!40000 ALTER TABLE `permisos` DISABLE KEYS */;
INSERT INTO `permisos` VALUES (1,'Anuncio'),(2,'Modificar Calendario'),(3,'Asiganción de tareas'),(4,'Administración de Alumnos (Admitir y Expulsar)'),(5,'Visualizar tareas'),(6,'Subir a archivos'),(7,'Publicaciones en el foro'),(8,'Asignar calificaciones'),(9,'Editar juegos educativos'),(10,'Acceder a la configuración del AVr'),(11,'Subir  archivos entregables'),(12,'Verificar Preguntas'),(13,'Eliminar usuarios'),(14,'Eliminar contenido del foro');
/*!40000 ALTER TABLE `permisos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pregunta_foro`
--

DROP TABLE IF EXISTS `pregunta_foro`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pregunta_foro` (
  `ID_Pregunta` int(11) NOT NULL AUTO_INCREMENT,
  `Num_Cuenta` int(11) NOT NULL,
  `Pregunta` text NOT NULL,
  `Fecha` datetime NOT NULL,
  PRIMARY KEY (`ID_Pregunta`),
  KEY `Num_Cuenta` (`Num_Cuenta`),
  CONSTRAINT `pregunta_foro_ibfk_1` FOREIGN KEY (`Num_Cuenta`) REFERENCES `alumno` (`Num_Cuenta`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pregunta_foro`
--

LOCK TABLES `pregunta_foro` WRITE;
/*!40000 ALTER TABLE `pregunta_foro` DISABLE KEYS */;
/*!40000 ALTER TABLE `pregunta_foro` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pregunta_predeterminada`
--

DROP TABLE IF EXISTS `pregunta_predeterminada`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pregunta_predeterminada` (
  `ID_Predeterminada` int(11) NOT NULL AUTO_INCREMENT,
  `Pregunta` text NOT NULL,
  `Respuesta` text NOT NULL,
  PRIMARY KEY (`ID_Predeterminada`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pregunta_predeterminada`
--

LOCK TABLES `pregunta_predeterminada` WRITE;
/*!40000 ALTER TABLE `pregunta_predeterminada` DISABLE KEYS */;
INSERT INTO `pregunta_predeterminada` VALUES (1,'¿Cuándo son las reinscripciones?','El calendario escolar establece las fechas en las cuales se realizará el proceso de reinscripciones. Aproximadamente un mes antes de esa fecha se publica en la página del plantel y en el Portal del Alumno la Guía de Reinscripción donde se describen todos los pasos para reinscribirse al siguiente ciclo escolar.'),(2,'¿Qué son las actividades estéticas?','Educación Estética y Artística IV y Educación Estética y Artística V son asignaturas que forman parte del plan de estudios de la Escuela Nacional Preparatoria. Los estudiantes cursan estas asignaturas obligatorias en cuarto y quinto año a través de las actividades estéticas.'),(3,'¿Cuándo me puedo inscribir a las actividades estéticas?','Al inicio de cada ciclo escolar, los estudiantes deben seleccionar una actividad estética y realizar la solicitud de inscripción de la misma. La información sobre el proceso de registro se publica en la página del plantel y en el Portal del Alumno.'),(4,'¿Cuántos intentos tengo para presentar un examen extraordinario?','Sólo cuentas con 1 intento, y únicamente podrá ser aprovechado durante la fecha y hora establecida en el Calendario de Exámenes Extraordinarios que se aprobó por el H. Consejo Técnico.'),(5,'¿Cuál es la diferencia entre un examen final y un examen extraordinario?','El examen final es el que realizas al no haber cumplido con el promedio previamente dicho por el profesor para aprobar su materia, tienes 2 oportunidades para pasar el examen. El examen extraordinario es el que realizas al no haber aprobado el examen final y en caso de no aprobarlo tienes que repetir la materia.'),(6,'¿Cómo puedo cambiarme de turno?','Acude a servicios escolares de tu plantel o a la Dirección General de Administración Escolar y obtén la información necesaria para realizar el trámite.'),(7,'¿Cómo tramitar mi certificado de ENP?','En el portal de la Dirección General de la Escuela Nacional Preparatoria encontrarás toda la información necesaria: http://dgenp.unam.mx/ure/certificado.html'),(8,'¿Cómo solicito una constancia de estudio?','Los alumnos del Plantel pueden descargar constancias de estudio desde el Portal del Alumno. En caso de requerir una constancia de estudio con información adicional o un historial académico, debes enviar un correo (desde tu correo de alumno con dominio alumno.enp.unam.mx) al correo escolares.p6@enp.unam.mx.'),(9,'¿Cuáles son los pasos para la Recuperación de NIP SIAE?','Si extraviaste u olvidaste el NIP del Sistema Integral de Administración Escolar (SIAE), deberás solicitar la reposición desde tu correo INSTITUCIONAL (@alumno.enp.unam.mx) a escolares.p6@enp.unam.mx');
/*!40000 ALTER TABLE `pregunta_predeterminada` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `profesor`
--

DROP TABLE IF EXISTS `profesor`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `profesor` (
  `Num_Trabajador` varchar(13) NOT NULL,
  `Telefono` bigint(20) NOT NULL,
  `Usuario` char(50) NOT NULL,
  `ID_Usuario` int(11) NOT NULL,
  PRIMARY KEY (`Num_Trabajador`),
  KEY `ID_Usuario` (`ID_Usuario`),
  CONSTRAINT `profesor_ibfk_1` FOREIGN KEY (`ID_Usuario`) REFERENCES `usuario` (`ID_Usuario`)
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
-- Table structure for table `publicaciones`
--

DROP TABLE IF EXISTS `publicaciones`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `publicaciones` (
  `ID_Publicacion` int(11) NOT NULL AUTO_INCREMENT,
  `Publicacion` varchar(20) NOT NULL,
  PRIMARY KEY (`ID_Publicacion`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `publicaciones`
--

LOCK TABLES `publicaciones` WRITE;
/*!40000 ALTER TABLE `publicaciones` DISABLE KEYS */;
INSERT INTO `publicaciones` VALUES (1,'Material'),(2,'Tarea'),(3,'Juego');
/*!40000 ALTER TABLE `publicaciones` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `respuesta_foro`
--

DROP TABLE IF EXISTS `respuesta_foro`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `respuesta_foro` (
  `ID_Respuesta` int(11) NOT NULL AUTO_INCREMENT,
  `ID_Pregunta` int(11) NOT NULL,
  `Respuesta` text NOT NULL,
  `ID_Email` int(11) NOT NULL,
  `Fecha` datetime NOT NULL,
  PRIMARY KEY (`ID_Respuesta`),
  KEY `ID_Pregunta` (`ID_Pregunta`),
  KEY `ID_Email` (`ID_Email`),
  CONSTRAINT `respuesta_foro_ibfk_1` FOREIGN KEY (`ID_Pregunta`) REFERENCES `pregunta_foro` (`ID_Pregunta`),
  CONSTRAINT `respuesta_foro_ibfk_2` FOREIGN KEY (`ID_Email`) REFERENCES `email` (`ID_Email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `respuesta_foro`
--

LOCK TABLES `respuesta_foro` WRITE;
/*!40000 ALTER TABLE `respuesta_foro` DISABLE KEYS */;
/*!40000 ALTER TABLE `respuesta_foro` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ruta_archivo`
--

DROP TABLE IF EXISTS `ruta_archivo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ruta_archivo` (
  `ID_RutaArchivo` int(11) NOT NULL AUTO_INCREMENT,
  `Ruta` varchar(255) NOT NULL,
  PRIMARY KEY (`ID_RutaArchivo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ruta_archivo`
--

LOCK TABLES `ruta_archivo` WRITE;
/*!40000 ALTER TABLE `ruta_archivo` DISABLE KEYS */;
/*!40000 ALTER TABLE `ruta_archivo` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tarea`
--

DROP TABLE IF EXISTS `tarea`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tarea` (
  `ID_Tarea` int(11) NOT NULL AUTO_INCREMENT,
  `ID_cHp` int(11) NOT NULL,
  `Nombre` char(255) NOT NULL,
  `Descripcion` text NOT NULL,
  `Fecha_asignacion` datetime NOT NULL,
  `Fecha_limite` datetime NOT NULL,
  PRIMARY KEY (`ID_Tarea`),
  KEY `ID_cHp` (`ID_cHp`),
  CONSTRAINT `tarea_ibfk_1` FOREIGN KEY (`ID_cHp`) REFERENCES `clase_has_publicaciones` (`ID_cHp`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tarea`
--

LOCK TABLES `tarea` WRITE;
/*!40000 ALTER TABLE `tarea` DISABLE KEYS */;
/*!40000 ALTER TABLE `tarea` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tipo_fecha`
--

DROP TABLE IF EXISTS `tipo_fecha`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tipo_fecha` (
  `ID_TipoFecha` int(11) NOT NULL AUTO_INCREMENT,
  `TipoFecha` char(30) NOT NULL,
  PRIMARY KEY (`ID_TipoFecha`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tipo_fecha`
--

LOCK TABLES `tipo_fecha` WRITE;
/*!40000 ALTER TABLE `tipo_fecha` DISABLE KEYS */;
INSERT INTO `tipo_fecha` VALUES (1,'Entrega de asignacion'),(2,'Evaluacion'),(3,'Periodo de exámen'),(4,'Día no hábil'),(5,'Festivo o conmemorativo'),(6,'Exámenes extraordinarios');
/*!40000 ALTER TABLE `tipo_fecha` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tipo_material`
--

DROP TABLE IF EXISTS `tipo_material`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tipo_material` (
  `ID_TipoMaterial` int(11) NOT NULL AUTO_INCREMENT,
  `TipoMaterial` char(26) NOT NULL,
  PRIMARY KEY (`ID_TipoMaterial`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tipo_material`
--

LOCK TABLES `tipo_material` WRITE;
/*!40000 ALTER TABLE `tipo_material` DISABLE KEYS */;
/*!40000 ALTER TABLE `tipo_material` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tipousuario`
--

DROP TABLE IF EXISTS `tipousuario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tipousuario` (
  `ID_TipoUsuario` int(11) NOT NULL AUTO_INCREMENT,
  `TipoUsuario` varchar(20) NOT NULL,
  PRIMARY KEY (`ID_TipoUsuario`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tipousuario`
--

LOCK TABLES `tipousuario` WRITE;
/*!40000 ALTER TABLE `tipousuario` DISABLE KEYS */;
INSERT INTO `tipousuario` VALUES (1,'Alumno'),(2,'Maestro'),(3,'Moderador'),(4,'Administrador');
/*!40000 ALTER TABLE `tipousuario` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tipousuario_has_permisos`
--

DROP TABLE IF EXISTS `tipousuario_has_permisos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tipousuario_has_permisos` (
  `ID_TUhP` int(11) NOT NULL AUTO_INCREMENT,
  `ID_Permiso` int(11) NOT NULL,
  `ID_TipoUsuario` int(11) NOT NULL,
  PRIMARY KEY (`ID_TUhP`),
  KEY `ID_Permiso` (`ID_Permiso`),
  KEY `ID_TipoUsuario` (`ID_TipoUsuario`),
  CONSTRAINT `tipousuario_has_permisos_ibfk_1` FOREIGN KEY (`ID_Permiso`) REFERENCES `permisos` (`ID_Permiso`),
  CONSTRAINT `tipousuario_has_permisos_ibfk_2` FOREIGN KEY (`ID_TipoUsuario`) REFERENCES `tipousuario` (`ID_TipoUsuario`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tipousuario_has_permisos`
--

LOCK TABLES `tipousuario_has_permisos` WRITE;
/*!40000 ALTER TABLE `tipousuario_has_permisos` DISABLE KEYS */;
/*!40000 ALTER TABLE `tipousuario_has_permisos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `turno`
--

DROP TABLE IF EXISTS `turno`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `turno` (
  `ID_Turno` int(11) NOT NULL AUTO_INCREMENT,
  `Turno` char(10) NOT NULL,
  PRIMARY KEY (`ID_Turno`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `turno`
--

LOCK TABLES `turno` WRITE;
/*!40000 ALTER TABLE `turno` DISABLE KEYS */;
INSERT INTO `turno` VALUES (1,'Matutino'),(2,'Vespertino');
/*!40000 ALTER TABLE `turno` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuario`
--

DROP TABLE IF EXISTS `usuario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `usuario` (
  `ID_Usuario` int(11) NOT NULL AUTO_INCREMENT,
  `ID_Email` int(11) NOT NULL,
  `ID_Contrasena` int(11) NOT NULL,
  `ID_TipoUsuario` int(11) NOT NULL,
  `Nombre` char(50) NOT NULL,
  `Apellidos` char(50) NOT NULL,
  PRIMARY KEY (`ID_Usuario`),
  KEY `ID_Email` (`ID_Email`),
  KEY `ID_Contrasena` (`ID_Contrasena`),
  KEY `ID_TipoUsuario` (`ID_TipoUsuario`),
  CONSTRAINT `usuario_ibfk_1` FOREIGN KEY (`ID_Email`) REFERENCES `email` (`ID_Email`),
  CONSTRAINT `usuario_ibfk_2` FOREIGN KEY (`ID_Contrasena`) REFERENCES `contrasena` (`ID_Contrasena`),
  CONSTRAINT `usuario_ibfk_3` FOREIGN KEY (`ID_TipoUsuario`) REFERENCES `tipousuario` (`ID_TipoUsuario`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuario`
--

LOCK TABLES `usuario` WRITE;
/*!40000 ALTER TABLE `usuario` DISABLE KEYS */;
/*!40000 ALTER TABLE `usuario` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2022-06-08 17:00:19
