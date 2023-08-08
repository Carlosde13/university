-- MariaDB dump 10.19  Distrib 10.4.28-MariaDB, for Win64 (AMD64)
--
-- Host: localhost    Database: universidad
-- ------------------------------------------------------
-- Server version	10.4.28-MariaDB

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
-- Table structure for table `alumno_clase`
--

DROP TABLE IF EXISTS `alumno_clase`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `alumno_clase` (
  `id_alumno` int(11) DEFAULT NULL,
  `id_clase` int(11) DEFAULT NULL,
  `nota` int(11) DEFAULT NULL,
  KEY `alumno_clase_ibfk_1` (`id_alumno`),
  KEY `alumno_clase_ibfk_2` (`id_clase`),
  CONSTRAINT `alumno_clase_ibfk_1` FOREIGN KEY (`id_alumno`) REFERENCES `usuarios` (`id`) ON DELETE CASCADE,
  CONSTRAINT `alumno_clase_ibfk_2` FOREIGN KEY (`id_clase`) REFERENCES `clases` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `alumno_clase`
--

LOCK TABLES `alumno_clase` WRITE;
/*!40000 ALTER TABLE `alumno_clase` DISABLE KEYS */;
INSERT INTO `alumno_clase` VALUES (16,5,NULL);
/*!40000 ALTER TABLE `alumno_clase` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `clases`
--

DROP TABLE IF EXISTS `clases`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `clases` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) DEFAULT NULL,
  `id_maestro` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `clases_ibfk_1` (`id_maestro`),
  CONSTRAINT `clases_ibfk_1` FOREIGN KEY (`id_maestro`) REFERENCES `usuarios` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `clases`
--

LOCK TABLES `clases` WRITE;
/*!40000 ALTER TABLE `clases` DISABLE KEYS */;
INSERT INTO `clases` VALUES (5,'Matematica',18),(6,'Programacion I',19);
/*!40000 ALTER TABLE `clases` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `roles`
--

DROP TABLE IF EXISTS `roles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `roles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `nombre` (`nombre`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `roles`
--

LOCK TABLES `roles` WRITE;
/*!40000 ALTER TABLE `roles` DISABLE KEYS */;
INSERT INTO `roles` VALUES (1,'Administrador'),(3,'Alumno'),(2,'Maestro');
/*!40000 ALTER TABLE `roles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) DEFAULT NULL,
  `apellido` varchar(100) DEFAULT NULL,
  `correo` varchar(50) DEFAULT NULL,
  `contrasena` varchar(255) DEFAULT NULL,
  `direccion` varchar(100) DEFAULT NULL,
  `fecha_nac` varchar(50) DEFAULT NULL,
  `estado` int(11) DEFAULT NULL,
  `id_rol` int(11) DEFAULT NULL,
  `dni` varchar(150) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `usuarios_ibfk_1` (`id_rol`),
  CONSTRAINT `usuarios_ibfk_1` FOREIGN KEY (`id_rol`) REFERENCES `roles` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuarios`
--

LOCK TABLES `usuarios` WRITE;
/*!40000 ALTER TABLE `usuarios` DISABLE KEYS */;
INSERT INTO `usuarios` VALUES (15,'Administrador','Administrador','admin@admin','$2y$10$3Sk6Tyi.9hJYrM0Vlayfiu67iFO4/hm5Yfg8wEemCNXc5jW8n7Rh6','Oficina',NULL,1,1,'0000'),(16,'Alumno ','Gomez','alumno@alumno.com','$2y$10$j46JaMHb8YJbcZaCYJPQienekG2GSum7yxW3UFIKSs3MRWRv/b4uW','zona 15','2023-05-24',1,3,'55555'),(17,'Alumno 2','de prueba','estudiante@alumno','$2y$10$.1l.kr0NzTp7z2iYeho/eejpAjE6XwqlYMYFYCRYaxhTlOrOHheIS','zona 10','2023-08-05',1,3,'88888'),(18,'profesor ','de prueba','maestro@maestro','$2y$10$qiI65HmsevwQBcMPFVSGJuTuszfvjxtoeAPxMrSc012e9yFea9OPq','zona 1','2023-01-13',1,2,'55555'),(19,'profesor 2','de prueba','profe@maestro','$2y$10$vfoGLl3zVeAKzJIFAkOQCueCbe0xt0jX1MCXud1NbhK0DJTiTbA6.','zona 12','2019-06-12',1,2,'00000000');
/*!40000 ALTER TABLE `usuarios` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2023-08-08 13:04:33
