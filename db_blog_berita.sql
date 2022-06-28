-- MySQL dump 10.13  Distrib 8.0.21, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: db_blog_berita
-- ------------------------------------------------------
-- Server version	5.7.24

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
-- Table structure for table `news`
--

DROP TABLE IF EXISTS `news`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `news` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `category_id` int(10) unsigned DEFAULT NULL,
  `title` varchar(45) DEFAULT NULL,
  `slug` varchar(45) DEFAULT NULL,
  `subtitle` varchar(45) DEFAULT NULL,
  `excerpt` text,
  `description` text,
  `image_1` text,
  `image_2` text,
  `meta_title` varchar(45) DEFAULT NULL,
  `meta_keyword` varchar(255) DEFAULT NULL,
  `meta_description` text,
  `featured` tinyint(1) NOT NULL DEFAULT '0',
  `author_id` int(11) DEFAULT NULL,
  `status` enum('active','inactive') DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `news`
--

LOCK TABLES `news` WRITE;
/*!40000 ALTER TABLE `news` DISABLE KEYS */;
INSERT INTO `news` VALUES (2,2,'Hujan deras','hujan-deras',NULL,'test','',NULL,NULL,'','','',0,1,'active','2022-05-30 06:19:50','2022-05-30 06:19:50'),(3,1,'test','test',NULL,'test','<p>test</p>\r\n','8f8d79c9758320be8268762214ed911b.png','8f8d79c9758320be8268762214ed911b.png','test','test','test',1,1,'active','2022-06-19 07:08:07','2022-06-20 07:37:16'),(4,2,'Lonsor','lonsor',NULL,'Lonsor','<p>Lonsor</p>\r\n','banner-item-02.jpg','banner-item-02.jpg','Lonsor','Lonsor','Lonsor',1,1,'active','2022-06-20 07:26:28','2022-06-20 07:26:28'),(5,1,'test lagi',NULL,'test','test','<p>test</p>\r\n','8fce730397bce5535756d060a00747c9.jpg','8fce730397bce5535756d060a00747c9.jpg','test','test','test',1,1,'active','2022-06-28 05:40:45','2022-06-28 05:40:45'),(6,1,'test',NULL,'tested','tested','<p>tested</p>\r\n',NULL,NULL,'test','test','test',0,1,'active','2022-06-28 05:42:28','2022-06-28 05:42:28');
/*!40000 ALTER TABLE `news` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `news_category`
--

DROP TABLE IF EXISTS `news_category`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `news_category` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(225) NOT NULL,
  `slug` varchar(225) NOT NULL,
  `order` int(11) NOT NULL DEFAULT '0',
  `author_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `news_category`
--

LOCK TABLES `news_category` WRITE;
/*!40000 ALTER TABLE `news_category` DISABLE KEYS */;
INSERT INTO `news_category` VALUES (1,'Sport','news',0,1,'2022-05-30 04:41:40','2022-06-09 06:59:32'),(2,'Bencana Alam','bencana-alam',0,1,'2022-05-30 05:00:15','2022-05-30 05:00:15'),(5,'Food','food',0,1,'2022-06-09 07:01:09','2022-06-09 07:01:09'),(6,'Edukasi','edukasi',0,1,'2022-06-09 07:01:20','2022-06-09 07:01:20'),(7,'UMKM','umkm',0,1,'2022-06-09 07:23:31','2022-06-09 07:23:31'),(8,'test','test',0,1,'2022-06-28 05:38:36','2022-06-28 05:38:36');
/*!40000 ALTER TABLE `news_category` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `user` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(128) NOT NULL,
  `position` varchar(128) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `username` varchar(16) NOT NULL,
  `password` varchar(191) NOT NULL,
  `phone` varchar(16) DEFAULT NULL,
  `status` enum('active','inactive') NOT NULL,
  `author_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES (1,'Admin','Admin','admin@example.com','Admin','$2y$10$xvy9PYudDzvrjA4znnxC8egQ/BPIqgmz5fqQ68jwo/LFjWyuT9vZa','03232','active',1,NULL,'2022-06-08 05:52:43'),(2,'Wahyu Iqbal','Writer','wahyuiqbal91@gmail.com','wahyuiqbal91','$2y$10$Z6eCSGo67oM571h3aMXaD.k20qxxVFAowa1K83ROTwtzSZnOEn.qG','0833','active',1,'2022-06-08 05:56:34','2022-06-08 06:01:39'),(3,'Wahyu Writer','Writer','wahyuiqbal911@gmail.com','wahyuiqbal911@gm','5f4dcc3b5aa765d61d8327deb882cf99','083854557795','active',1,'2022-06-08 05:59:16','2022-06-08 05:59:16'),(4,'Dela ','Writer','delas@gmail.com','dela@gmail.com','$2y$10$d5.C130.tQrV2e/9pYmNpOAHTM4npmuLwAuilvvqfw85v.fYO0ymi','03828328','active',1,'2022-06-09 07:24:45','2022-06-09 07:24:45'),(5,'test demo','Writer','test@example.com','test','$2y$10$G5iv8UCSe3DnbQ.RX2kcNO5TojtGnhdfdgs5VCEIIk/zQ561zoQPi','0833','active',1,'2022-06-28 05:38:00','2022-06-28 05:38:00');
/*!40000 ALTER TABLE `user` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2022-06-28 19:55:58
