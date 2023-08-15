CREATE DATABASE  IF NOT EXISTS `portfolio` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `portfolio`;
-- MySQL dump 10.13  Distrib 8.0.33, for Linux (x86_64)
--
-- Host: localhost    Database: portfolio
-- ------------------------------------------------------
-- Server version	8.0.33-0ubuntu0.22.04.4

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `assets`
--

DROP TABLE IF EXISTS `assets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `assets` (
  `id` int NOT NULL AUTO_INCREMENT,
  `symbol` varchar(20) NOT NULL,
  `name` varchar(75) NOT NULL,
  `user_id` int NOT NULL,
  `asset_type_id` int NOT NULL,
  `created` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `asset_type_id` (`asset_type_id`),
  KEY `fk_user_idx` (`user_id`),
  CONSTRAINT `assets_ibfk_1` FOREIGN KEY (`asset_type_id`) REFERENCES `assets_type` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1611 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `assets`
--

LOCK TABLES `assets` WRITE;
/*!40000 ALTER TABLE `assets` DISABLE KEYS */;
INSERT INTO `assets` VALUES 
(1,'KNCR11','Kinea Rendimentos Imobiliários FII',0,1,'2023-07-31 22:12:27'),
(2,'HGLG11','CSHG Logística',0,1,'2023-07-31 22:12:27'),
(3,'BCFF11','BTG Pactual Fundo de Fundos',0,1,'2023-07-31 22:12:27'),
(4,'CPTS11','Capitânia Securities II',0,1,'2023-07-31 22:12:27'),
(5,'BBAS3','Banco do Brasil',0,2,'2023-07-31 22:12:27'),
(6,'ITSA4','Itaúsa',0,2,'2023-07-31 22:12:27'),
(7,'PETR4','Petrobras',0,2,'2023-07-31 22:12:27'),
(8,'TAEE11','Transmissora Alianca de Energia Eltrc SA',0,2,'2023-07-31 22:12:27');
/*!40000 ALTER TABLE `assets` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `assets_type`
--

DROP TABLE IF EXISTS `assets_type`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `assets_type` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(10) NOT NULL,
  `created` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `assets_type`
--

LOCK TABLES `assets_type` WRITE;
/*!40000 ALTER TABLE `assets_type` DISABLE KEYS */;
INSERT INTO `assets_type` VALUES (1,'FII','2023-07-31 22:20:12'),(2,'STOCK','2023-07-31 22:20:16');
/*!40000 ALTER TABLE `assets_type` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `dividends`
--

DROP TABLE IF EXISTS `dividends`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `dividends` (
  `id` int NOT NULL AUTO_INCREMENT,
  `asset_id` int NOT NULL,
  `date` date NOT NULL,
  `share` int DEFAULT NULL,
  `value` decimal(10,2) NOT NULL,
  `created` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `asset_id` (`asset_id`),
  CONSTRAINT `dividends_ibfk_1` FOREIGN KEY (`asset_id`) REFERENCES `assets` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `dividends`
--

LOCK TABLES `dividends` WRITE;
/*!40000 ALTER TABLE `dividends` DISABLE KEYS */;
INSERT INTO `dividends` VALUES (16,1,'2023-07-13',0,16.10,'2023-07-31 23:19:45'),(17,1,'2023-06-14',0,12.40,'2023-07-31 23:19:45'),(18,2,'2023-07-14',0,6.00,'2023-07-31 23:19:45'),(19,2,'2023-06-15',0,2.20,'2023-07-31 23:19:45'),(20,3,'2023-07-14',0,1.68,'2023-07-31 23:19:45'),(21,4,'2023-07-19',0,6.16,'2023-07-31 23:19:45'),(22,4,'2023-06-20',0,2.55,'2023-07-31 23:19:45'),(23,5,'2023-06-30',0,0.86,'2023-07-31 23:19:45'),(24,5,'2023-06-12',0,1.67,'2023-07-31 23:19:45'),(25,5,'2023-06-12',0,0.37,'2023-07-31 23:19:45'),(26,6,'2023-07-03',0,0.30,'2023-07-31 23:19:45'),(28,6,'2023-08-25',NULL,3.40,'2023-08-09 21:29:53'),(29,7,'2023-08-18',NULL,0.84,'2023-08-09 21:31:04'),(30,1,'2023-08-11',NULL,21.85,'2023-08-09 21:32:29'),(31,2,'2023-08-14',NULL,5.50,'2023-08-09 21:33:00'),(32,3,'2023-08-14',NULL,4.48,'2023-08-09 21:35:16'),(33,8,'2023-08-29',NULL,11.41,'2023-08-11 22:53:02'),(35,4,'2023-08-17',NULL,8.90,'2023-08-11 23:06:47');
/*!40000 ALTER TABLE `dividends` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `transactions`
--

DROP TABLE IF EXISTS `transactions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `transactions` (
  `id` int NOT NULL AUTO_INCREMENT,
  `asset_id` int NOT NULL,
  `quantity` decimal(10,2) NOT NULL,
  `value` decimal(10,2) NOT NULL,
  `total` decimal(10,2) NOT NULL,
  `trade_date` date NOT NULL,
  `created` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `asset_id` (`asset_id`),
  CONSTRAINT `transactions_ibfk_1` FOREIGN KEY (`asset_id`) REFERENCES `assets` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `transactions`
--

LOCK TABLES `transactions` WRITE;
/*!40000 ALTER TABLE `transactions` DISABLE KEYS */;
INSERT INTO `transactions` VALUES (1,1,6.00,95.12,570.72,'2023-05-18','2023-07-31 22:51:05'),(2,1,3.00,95.12,285.36,'2023-05-18','2023-07-31 22:51:05'),(3,1,1.00,95.12,95.12,'2023-05-18','2023-07-31 22:51:05'),(4,7,1.00,26.12,26.12,'2023-05-19','2023-07-31 22:51:05'),(5,6,1.00,8.91,8.91,'2023-05-22','2023-07-31 22:51:05'),(6,6,1.00,8.91,8.91,'2023-05-22','2023-07-31 22:51:05'),(7,4,3.00,80.49,241.47,'2023-05-23','2023-07-31 22:51:05'),(8,5,3.00,43.67,131.01,'2023-05-23','2023-07-31 22:51:05'),(9,6,13.00,8.91,115.83,'2023-05-23','2023-07-31 22:51:05'),(10,2,2.00,159.10,318.20,'2023-05-24','2023-07-31 22:51:05'),(11,8,4.00,37.37,149.48,'2023-05-24','2023-07-31 22:51:05'),(12,4,4.00,82.66,330.64,'2023-06-20','2023-07-31 22:51:05'),(13,2,2.00,166.00,332.00,'2023-06-20','2023-07-31 22:51:05'),(14,1,2.00,96.58,193.16,'2023-06-20','2023-07-31 22:51:06'),(15,1,2.00,96.58,193.16,'2023-06-20','2023-07-31 22:51:06'),(16,5,3.00,50.11,150.33,'2023-06-20','2023-07-31 22:51:06'),(17,6,5.00,9.78,48.90,'2023-06-20','2023-07-31 22:51:06'),(18,6,15.00,9.78,146.70,'2023-06-20','2023-07-31 22:51:06'),(19,7,6.00,30.69,184.14,'2023-06-20','2023-07-31 22:51:06'),(20,8,5.00,38.09,190.45,'2023-06-20','2023-07-31 22:51:06'),(21,3,3.00,68.70,206.10,'2023-06-21','2023-07-31 22:51:06'),(22,3,4.00,72.95,291.80,'2023-07-20','2023-07-31 22:51:06'),(23,3,1.00,73.26,73.26,'2023-07-20','2023-07-31 22:51:06'),(24,4,3.00,87.13,261.39,'2023-07-20','2023-07-31 22:51:06'),(25,2,1.00,162.75,162.75,'2023-07-20','2023-07-31 22:51:06'),(26,1,2.00,96.60,193.20,'2023-07-20','2023-07-31 22:51:06'),(27,1,3.00,96.79,290.37,'2023-07-20','2023-07-31 22:51:06'),(28,5,5.00,47.81,239.05,'2023-07-20','2023-07-31 22:51:06'),(29,6,15.00,9.71,145.65,'2023-07-20','2023-07-31 22:51:06'),(30,7,4.00,29.22,116.88,'2023-07-20','2023-07-31 22:51:06'),(31,7,3.00,29.22,87.66,'2023-07-20','2023-07-31 22:51:06'),(32,8,5.00,36.13,180.65,'2023-07-20','2023-07-31 22:51:06');
/*!40000 ALTER TABLE `transactions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `users` (
  `id` int NOT NULL AUTO_INCREMENT,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'crysthofferattier@gmail.com','$2y$10$1n8QVsQUACvu.Bxj8ka6heaZxvMcrsA35BtS8gDGqj/Y.LPCn/ciG','2023-07-28 21:23:32','2023-07-28 21:23:32'),(2,'test@email.com','$2y$10$9x8c.jo1jORbOqcSdQZQ/.fQjVdIM0FvshgP2PLABArEOuYtL.eNa','2023-07-28 21:24:45','2023-07-28 21:24:45'),(3,'test1@email.com','$2y$10$fwqK6F.rCCfU.99kMKq3i.Bg8U8vLkwP/DgizfmWHjnqART9wKew6','2023-07-29 02:09:28','2023-07-29 02:09:28');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2023-08-12 21:05:26
