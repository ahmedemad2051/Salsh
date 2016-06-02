-- MySQL dump 10.14  Distrib 5.5.49-MariaDB, for debian-linux-gnu (x86_64)
--
-- Host: localhost    Database: Slash
-- ------------------------------------------------------
-- Server version	5.5.49-MariaDB-1ubuntu0.14.04.1

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
-- Table structure for table `courses`
--

DROP TABLE IF EXISTS `courses`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `courses` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(250) NOT NULL,
  `content` text NOT NULL,
  `from_d` date NOT NULL,
  `to_d` date NOT NULL,
  `hours` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `courses`
--

LOCK TABLES `courses` WRITE;
/*!40000 ALTER TABLE `courses` DISABLE KEYS */;
INSERT INTO `courses` VALUES (9,'laravel','course','2016-06-01','2016-06-23',45),(10,'linux','jhjhjg','2016-06-10','2016-06-24',15),(11,'java','sdsds','2016-06-08','2016-06-14',12);
/*!40000 ALTER TABLE `courses` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `courses_students`
--

DROP TABLE IF EXISTS `courses_students`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `courses_students` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `monk_id` int(11) NOT NULL,
  `course_id` int(11) NOT NULL,
  `score` int(11) NOT NULL DEFAULT '0',
  `sudo` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `monk_id` (`monk_id`),
  KEY `course_id` (`course_id`),
  CONSTRAINT `courses_students_ibfk_2` FOREIGN KEY (`monk_id`) REFERENCES `monks` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `courses_students_ibfk_3` FOREIGN KEY (`course_id`) REFERENCES `courses` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `courses_students`
--

LOCK TABLES `courses_students` WRITE;
/*!40000 ALTER TABLE `courses_students` DISABLE KEYS */;
INSERT INTO `courses_students` VALUES (1,17,9,0,0);
/*!40000 ALTER TABLE `courses_students` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `monks`
--

DROP TABLE IF EXISTS `monks`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `monks` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(250) NOT NULL,
  `mail` varchar(250) NOT NULL,
  `password` varchar(250) NOT NULL,
  `admin` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `monks`
--

LOCK TABLES `monks` WRITE;
/*!40000 ALTER TABLE `monks` DISABLE KEYS */;
INSERT INTO `monks` VALUES (1,'ahmed','ahmed.emad2051@yahoo.com','202cb962ac59075b964b07152d234b70',1),(17,'ahmed emad','ali@yahoo.com','*23AE809DDACAF96AF0FD78ED04B6A265E05AA257',1);
/*!40000 ALTER TABLE `monks` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `requests`
--

DROP TABLE IF EXISTS `requests`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `requests` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `monk_id` int(11) NOT NULL,
  `course_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `requests`
--

LOCK TABLES `requests` WRITE;
/*!40000 ALTER TABLE `requests` DISABLE KEYS */;
/*!40000 ALTER TABLE `requests` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tasks`
--

DROP TABLE IF EXISTS `tasks`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tasks` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(250) NOT NULL,
  `score` int(11) NOT NULL,
  `description` text NOT NULL,
  `createdBy` varchar(200) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `course_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `course_id` (`course_id`),
  CONSTRAINT `tasks_ibfk_1` FOREIGN KEY (`course_id`) REFERENCES `courses` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tasks`
--

LOCK TABLES `tasks` WRITE;
/*!40000 ALTER TABLE `tasks` DISABLE KEYS */;
INSERT INTO `tasks` VALUES (8,'Careers',45,'rtrtrete','ahmed emad','2016-06-02 10:24:22',9);
/*!40000 ALTER TABLE `tasks` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tasks_students`
--

DROP TABLE IF EXISTS `tasks_students`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tasks_students` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `monk_id` int(11) NOT NULL,
  `course_id` int(11) NOT NULL,
  `task_id` int(11) NOT NULL,
  `status` smallint(6) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `task_id` (`task_id`),
  KEY `course_id` (`course_id`),
  KEY `monk_id` (`monk_id`),
  CONSTRAINT `tasks_students_ibfk_3` FOREIGN KEY (`task_id`) REFERENCES `tasks` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tasks_students`
--

LOCK TABLES `tasks_students` WRITE;
/*!40000 ALTER TABLE `tasks_students` DISABLE KEYS */;
/*!40000 ALTER TABLE `tasks_students` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2016-06-02 18:12:14
