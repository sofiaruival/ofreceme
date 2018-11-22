-- MySQL dump 10.13  Distrib 5.7.23, for Linux (x86_64)
--
-- Host: localhost    Database: Ofreceme
-- ------------------------------------------------------
-- Server version	5.7.23-0ubuntu0.18.04.1

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `categorias`
--

DROP TABLE IF EXISTS `categorias`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `categorias` (
  `id` int(10) unsigned NOT NULL,
  `nombre` varchar(45) DEFAULT NULL,
  `categoria_id` int(10) unsigned DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `relacion_cat_padre_idx` (`categoria_id`),
  CONSTRAINT `relacion_cat_padre` FOREIGN KEY (`categoria_id`) REFERENCES `categorias` (`id`) ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categorias`
--

LOCK TABLES `categorias` WRITE;
/*!40000 ALTER TABLE `categorias` DISABLE KEYS */;
/*!40000 ALTER TABLE `categorias` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `compra_producto`
--

DROP TABLE IF EXISTS `compra_producto`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `compra_producto` (
  `id` int(10) unsigned NOT NULL,
  `compra_id` int(10) unsigned DEFAULT NULL,
  `producto_id` int(10) unsigned DEFAULT NULL,
  `precio` float unsigned DEFAULT NULL,
  `cantidad` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `compra_producto`
--

LOCK TABLES `compra_producto` WRITE;
/*!40000 ALTER TABLE `compra_producto` DISABLE KEYS */;
/*!40000 ALTER TABLE `compra_producto` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `compras`
--

DROP TABLE IF EXISTS `compras`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `compras` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `usuario_id` int(10) unsigned DEFAULT NULL,
  `direccion` varchar(150) DEFAULT NULL,
  `medio_de_pago_id` int(10) unsigned DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `relacion_usuario_idx` (`usuario_id`),
  KEY `relacion_medios_de_pago_idx` (`medio_de_pago_id`),
  CONSTRAINT `relacion_compras` FOREIGN KEY (`usuario_id`) REFERENCES `compras` (`id`) ON UPDATE NO ACTION,
  CONSTRAINT `relacion_medios_de_pago` FOREIGN KEY (`medio_de_pago_id`) REFERENCES `medios_de_pago` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `relacion_usuario` FOREIGN KEY (`usuario_id`) REFERENCES `usuarios` (`id`) ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `compras`
--

LOCK TABLES `compras` WRITE;
/*!40000 ALTER TABLE `compras` DISABLE KEYS */;
/*!40000 ALTER TABLE `compras` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `marcas`
--

DROP TABLE IF EXISTS `marcas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `marcas` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) NOT NULL,
  `created_id` datetime DEFAULT NULL,
  `updated_id` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `marcas`
--

LOCK TABLES `marcas` WRITE;
/*!40000 ALTER TABLE `marcas` DISABLE KEYS */;
/*!40000 ALTER TABLE `marcas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `medios_de_pago`
--

DROP TABLE IF EXISTS `medios_de_pago`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `medios_de_pago` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updates_at` datetime DEFAULT NULL,
  `numero_de_tarjeta` int(11) DEFAULT NULL,
  `fecha_de_vencimiento` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `medios_de_pago`
--

LOCK TABLES `medios_de_pago` WRITE;
/*!40000 ALTER TABLE `medios_de_pago` DISABLE KEYS */;
/*!40000 ALTER TABLE `medios_de_pago` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `producto_categoria`
--

DROP TABLE IF EXISTS `producto_categoria`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `producto_categoria` (
  `id` int(10) unsigned NOT NULL,
  `producto_id` int(10) unsigned DEFAULT NULL,
  `categoria_id` int(10) unsigned DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updates_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `realcion_producto_idx` (`producto_id`),
  KEY `relacion_categoria_idx` (`categoria_id`),
  CONSTRAINT `realcion_producto` FOREIGN KEY (`producto_id`) REFERENCES `productos` (`id`) ON UPDATE NO ACTION,
  CONSTRAINT `relacion_categoria` FOREIGN KEY (`categoria_id`) REFERENCES `categorias` (`id`) ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `producto_categoria`
--

LOCK TABLES `producto_categoria` WRITE;
/*!40000 ALTER TABLE `producto_categoria` DISABLE KEYS */;
/*!40000 ALTER TABLE `producto_categoria` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `productos`
--

DROP TABLE IF EXISTS `productos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `productos` (
  `id` int(10) unsigned NOT NULL,
  `nombre` varchar(100) DEFAULT NULL,
  `precio` float NOT NULL,
  `cantidad` int(11) DEFAULT '0',
  `marca_id` int(10) unsigned DEFAULT NULL,
  `usuario_id` int(10) unsigned DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `usuario_id_idx` (`usuario_id`),
  KEY `id_idx` (`usuario_id`),
  KEY `relacion_marcas_idx` (`marca_id`),
  CONSTRAINT `relacion_marcas` FOREIGN KEY (`marca_id`) REFERENCES `marcas` (`id`) ON UPDATE NO ACTION,
  CONSTRAINT `relacion_usuarios` FOREIGN KEY (`usuario_id`) REFERENCES `usuarios` (`id`) ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `productos`
--

LOCK TABLES `productos` WRITE;
/*!40000 ALTER TABLE `productos` DISABLE KEYS */;
/*!40000 ALTER TABLE `productos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `usuarios` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) DEFAULT NULL,
  `apellido` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `dni` int(11) DEFAULT NULL,
  `username` varchar(45) NOT NULL,
  `password` varchar(255) DEFAULT NULL,
  `telefono` varchar(45) DEFAULT NULL,
  `fecha_de_nacimiento` date DEFAULT NULL,
  `direccion` varchar(45) DEFAULT NULL,
  `picture` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username_UNIQUE` (`username`),
  UNIQUE KEY `dni_UNIQUE` (`dni`),
  UNIQUE KEY `telefono_UNIQUE` (`telefono`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuarios`
--

LOCK TABLES `usuarios` WRITE;
/*!40000 ALTER TABLE `usuarios` DISABLE KEYS */;
INSERT INTO `usuarios` VALUES (1,'prueba','prueba','prueba@gmail.com',NULL,'prueba@gmail.com','$2y$10$RXVkBzyO2SinE1D1nMX7buNvf4EBhEtJAOUK5ZoAYXZh1DzuROgQS',NULL,NULL,NULL,'FXe7TcluVTZ6Yjdy1r3Clwl04zxqmknvsAdR6LAz.png','2018-11-22 17:25:04','2018-11-22 17:25:04',NULL,'9qU5NUsGEksUfK9h0VuVLtNpmKsA2woh1hhsyShJgWou3KEENH79rPNpCvcN'),(3,'ale','ale','ale@dh.com',NULL,'ale@dh.com','$2y$10$ZqKZXkhPR6Rp17RahSepVeFq7LsIs/ILeyLHw8e.7mU4b.BUUo.iK',NULL,NULL,NULL,'DTsXo5T11nCXcW8h7RsIS53pPppfvgxUl1gqTAkG.png','2018-11-22 18:37:06','2018-11-22 18:37:06',NULL,'xKDGYz8id8RdQO6kbhGoHWMDWcQYIcd07jrVME00Xmmk6hu0bpvS4b0isMp0'),(4,'alev','alev','alev@gmail.com',NULL,'alev@gmail.com','$2y$10$RcUtb4sspcMOSv.6n5QFLOMF9O57X.6jwUQL3yx3PWpeFHCN5GFY6',NULL,NULL,NULL,'MgBz8hmu52oOY5oWqVYpOHJN5t2nIO3VfNVj7hcX.png','2018-11-22 18:42:07','2018-11-22 18:42:07',NULL,'ok17QfVVEPX4tNXtQCv4yD5krHvzeMl9tLMAAJdwmqVzMztFev8uR24ju3wj'),(5,'alev','alev','alev@dh.com',NULL,'alev@dh.com','$2y$10$E8YAO4PtSRkaw/ZbY4of7etsUwXvf2Rd4/dp2tfa7poHcytiZDu.q',NULL,NULL,NULL,'f0v2GVny9jE8qY0nXU4gnu0pRyd5RLa6OWAXECtS.png','2018-11-22 18:47:37','2018-11-22 18:47:37',NULL,NULL);
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

-- Dump completed on 2018-11-22 12:51:19
