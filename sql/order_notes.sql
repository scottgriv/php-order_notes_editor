-- MySQL dump 10.13  Distrib 8.0.34, for macos13 (arm64)
--
-- Host: 127.0.0.1    Database: notesapp
-- ------------------------------------------------------
-- Server version	5.5.5-10.4.21-MariaDB

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
-- Current Database: `notesapp`
--

CREATE DATABASE `notesapp` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;

--
-- Table structure for table `Customers`
--

DROP TABLE IF EXISTS `Customers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `Customers` (
  `Cust_ID` int(11) NOT NULL AUTO_INCREMENT,
  `Cust_Name` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`Cust_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Customers`
--

LOCK TABLES `Customers` WRITE;
/*!40000 ALTER TABLE `Customers` DISABLE KEYS */;
INSERT INTO `Customers` VALUES (1,'Facebook'),(2,'Apple'),(3,'Amazon'),(4,'Netflix'),(5,'Google');
/*!40000 ALTER TABLE `Customers` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Notes`
--

DROP TABLE IF EXISTS `Notes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `Notes` (
  `Note_ID` int(11) NOT NULL AUTO_INCREMENT,
  `Note_Seq` int(11) DEFAULT NULL,
  `Note_Note` varchar(45) DEFAULT NULL,
  `Note_Type` varchar(45) DEFAULT NULL,
  `Note_Order_ID` int(11) DEFAULT NULL,
  PRIMARY KEY (`Note_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Notes`
--

LOCK TABLES `Notes` WRITE;
/*!40000 ALTER TABLE `Notes` DISABLE KEYS */;
INSERT INTO `Notes` VALUES (1,1,'TEST','H',1),(2,2,'NOTE','H',1),(3,3,': )','H',1),(4,1,'I LOVE','H',2),(5,2,'NOTES','H',2),(6,1,'EXAMPLE','H',3),(7,2,'NOTE','H',3),(8,3,': )','H',3);
/*!40000 ALTER TABLE `Notes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Order_Header`
--

DROP TABLE IF EXISTS `Order_Header`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `Order_Header` (
  `Header_Order_ID` int(11) NOT NULL AUTO_INCREMENT,
  `Header_Status` varchar(45) DEFAULT NULL,
  `Header_Customer_ID` varchar(45) DEFAULT NULL,
  `Header_Amount` int(11) DEFAULT NULL,
  `Header_Quantity` int(11) DEFAULT NULL,
  PRIMARY KEY (`Header_Order_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Order_Header`
--

LOCK TABLES `Order_Header` WRITE;
/*!40000 ALTER TABLE `Order_Header` DISABLE KEYS */;
INSERT INTO `Order_Header` VALUES (1,'Open','1',100,1),(2,'Open','1',10,2),(3,'Open','2',34,10),(4,'Closed','3',41,1),(5,'Open','4',2000,10);
/*!40000 ALTER TABLE `Order_Header` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Order_Lines`
--

DROP TABLE IF EXISTS `Order_Lines`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `Order_Lines` (
  `Line_ID` int(11) NOT NULL AUTO_INCREMENT,
  `Line_Status` varchar(45) DEFAULT NULL,
  `Line_Order_ID` int(11) DEFAULT NULL,
  `Line_Line` int(11) DEFAULT NULL,
  `Line_Product` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`Line_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Order_Lines`
--

LOCK TABLES `Order_Lines` WRITE;
/*!40000 ALTER TABLE `Order_Lines` DISABLE KEYS */;
INSERT INTO `Order_Lines` VALUES (1,'Open',1,1,'1234'),(2,'Open',1,2,'4567'),(3,'Open',1,3,'89110'),(4,'Open',2,1,'89133'),(5,'Closed',2,2,'89233'),(6,'Open',3,1,'89110'),(7,'Open',3,2,'89133'),(8,'Open',3,3,'89233');
/*!40000 ALTER TABLE `Order_Lines` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Products`
--

DROP TABLE IF EXISTS `Products`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `Products` (
  `Prod_ID` int(11) NOT NULL,
  `Prod_Description` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`Prod_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Products`
--

LOCK TABLES `Products` WRITE;
/*!40000 ALTER TABLE `Products` DISABLE KEYS */;
INSERT INTO `Products` VALUES (1234,'Product 1'),(4567,'Product 2'),(89110,'Product 3'),(89133,'Product 4'),(89233,'Product 5');
/*!40000 ALTER TABLE `Products` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2023-12-04  0:02:04
