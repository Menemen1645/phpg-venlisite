-- MySQL dump 10.13  Distrib 8.0.34, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: balik_pet_shop
-- ------------------------------------------------------
-- Server version	8.0.35

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
-- Table structure for table `kullanicilar`
--

DROP TABLE IF EXISTS `kullanicilar`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `kullanicilar` (
  `kullanici_id` int NOT NULL AUTO_INCREMENT,
  `ad` varchar(255) NOT NULL,
  `soyad` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `telefon_no` varchar(20) DEFAULT NULL,
  `adres` text,
  `parola` varchar(255) NOT NULL,
  `tuz` varchar(255) NOT NULL,
  PRIMARY KEY (`kullanici_id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `kullanicilar`
--

LOCK TABLES `kullanicilar` WRITE;
/*!40000 ALTER TABLE `kullanicilar` DISABLE KEYS */;
INSERT INTO `kullanicilar` VALUES (1,'Muhammed','Demircan','deneme@gmail.com','5342432274','bursa','64586cec0e2c5ffd3d22af2cccfc8beb6a45ec774ccac64b5e5ce3d4baeeb824','c447cc0edce6410d2817746b10767a6cb485fb6b1e23828b00ee4fae693528a9'),(2,'Muhammed','Demircan1','deneme@gmail.com','5342432274','bursa','73980ab55010974ae44990acae5220c4aaacee1ec9ccdf6c104ed0ab6c854579','87fd63e46d2e40bf9cce15d5b224bc81b1ed6bbad0b80575957b8912b617a53d'),(3,'Muhammed','Demircan1','deneme@gmail.com','5342432274','bursa','c50e06776c35ef91bebd77654e4d88efee1cb9fefa8aad02b3d98b730374c9ce','a74fa7e134ce4668db22b39d979c89c329d89dfc6b14b4a23c23b85203fe5e15'),(4,'Muhammed','Demircan12','deneme@gmail.com','5342432274','bursa','4869b937c6116e7b23f94abb480f727d8aa723b2787e793b8a3d825a8055c18f','53556753dace02b14ef0430a54c4e9ab779e620b89be079dcf9b7c198f585a53'),(5,'Muhammed','Demircan123','deneme@gmail.com','5342432274','bursa','d6d8c0997dcfd8dced51f5c57bb38dcb43664c03fcab0cdfc456bd9b7fa157f6','3607468b5c9b75ae12313e585f22ff0f20936a6f32aeee543a87b277b0ce3816');
/*!40000 ALTER TABLE `kullanicilar` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2024-07-16 22:40:50
