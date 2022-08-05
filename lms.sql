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
-- Table structure for table `admin_info`
--

DROP TABLE IF EXISTS `admin_info`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `admin_info` (
  `admin_info_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) unsigned NOT NULL,
  `dob` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `state` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `zipcode` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `country` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `profile_image` blob,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`admin_info_id`),
  KEY `admin_info_user_id_foreign` (`user_id`),
  CONSTRAINT `admin_info_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `admin_info`
--

LOCK TABLES `admin_info` WRITE;
/*!40000 ALTER TABLE `admin_info` DISABLE KEYS */;
INSERT INTO `admin_info` VALUES (1,2,'11-09-1993','22 5th main','Texas','Washington','123456','United States',NULL,'2021-07-20 03:24:18','2021-07-22 09:52:48',NULL);
/*!40000 ALTER TABLE `admin_info` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `blog`
--

DROP TABLE IF EXISTS `blog`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `blog` (
  `blog_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `mentor_id` bigint(20) unsigned NOT NULL,
  `blog_category` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longblob NOT NULL,
  `blog_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `blog_title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`blog_id`),
  KEY `blog_mentor_id_foreign` (`mentor_id`),
  CONSTRAINT `blog_mentor_id_foreign` FOREIGN KEY (`mentor_id`) REFERENCES `mentor` (`mentor_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `blog`
--

LOCK TABLES `blog` WRITE;
/*!40000 ALTER TABLE `blog` DISABLE KEYS */;
INSERT INTO `blog` VALUES (1,2,'mathematics','What is Lorem Ipsum?\r\nLorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.\r\n\r\nWhy do we use it?\r\nIt is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).\r\n\r\n\r\nWhere does it come from?\r\nContrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of \"de Finibus Bonorum et Malorum\" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, \"Lorem ipsum dolor sit amet..\", comes from a line in section 1.10.32.','/storage/blogs/Grame4/EsVv0JrLUkV5TMlZwT429w2UrCY8lqE2fs3YJCif.png',NULL,'2021-07-28 03:55:46','2021-08-20 04:34:15',NULL,'Test Title'),(2,2,'english','Shakesphere\'s sonnet 16','/storage/blogs/Grame4/gpl2IeLhxoqS2Hg8eFOEHRdIuFRbl3WWCv4irHtq.jpg',NULL,'2021-07-28 04:45:00','2021-08-25 23:41:21',NULL,'Sonnet 16'),(3,2,'physics','Description blog section','/storage/blogs/Grame4/yPwu6PwqId0vULnwXRN7s3nXUYbBsJujjtX1qHCb.jpg',NULL,'2021-07-29 08:42:18','2021-08-25 23:45:57',NULL,'Test Blog item'),(4,2,'english','Blog description section','/storage/blogs/Grame4/4FuchC6M9FqVpxZNKaAqtj7UxbhbU6cK5izPhm76.jpg',NULL,'2021-07-29 08:57:06','2021-08-25 23:52:35',NULL,'Poetry'),(5,2,'mathematics','Test Images blogs for mathematics','/storage/blogs/Grame4/5XRAWTFT3Br9HPP09W7J4KAPS2r0aPEYCXdsxjZE.jpg',NULL,'2021-08-07 02:14:09','2021-08-25 23:55:17',NULL,'Test image blog');
/*!40000 ALTER TABLE `blog` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `booking`
--

DROP TABLE IF EXISTS `booking`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `booking` (
  `booking_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `mentor_id` bigint(20) unsigned NOT NULL,
  `mentee_id` bigint(20) unsigned NOT NULL,
  `schedule_time` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `schedule_date` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `slot_id` bigint(20) unsigned DEFAULT NULL,
  PRIMARY KEY (`booking_id`),
  KEY `booking_mentor_id_foreign` (`mentor_id`),
  KEY `booking_mentee_id_foreign` (`mentee_id`),
  KEY `booking_slot_id_foreign` (`slot_id`),
  CONSTRAINT `booking_mentee_id_foreign` FOREIGN KEY (`mentee_id`) REFERENCES `mentee` (`mentee_id`),
  CONSTRAINT `booking_mentor_id_foreign` FOREIGN KEY (`mentor_id`) REFERENCES `mentor` (`mentor_id`),
  CONSTRAINT `booking_slot_id_foreign` FOREIGN KEY (`slot_id`) REFERENCES `schedule_timing` (`slot_id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `booking`
--

LOCK TABLES `booking` WRITE;
/*!40000 ALTER TABLE `booking` DISABLE KEYS */;
INSERT INTO `booking` VALUES (1,1,1,'12.00 pm-1.00 pm','02/08/2021','pending','2021-08-02 00:09:32','2021-08-02 00:09:32',NULL,NULL),(2,1,1,'9.00 am-10.00 am','08/08/2021','pending','2021-08-02 06:50:44','2021-08-02 06:50:44',NULL,NULL),(3,1,1,'12.00 pm-1.00 pm','16/08/2021','pending','2021-08-05 00:39:02','2021-08-05 00:39:02',NULL,NULL),(4,2,1,'10.00 am-11.00 am','09/08/2021','accept','2021-08-05 02:12:43','2021-08-05 07:52:57',NULL,NULL),(5,2,1,'6.00 am-7.00 am','14/08/2021','reject','2021-08-06 00:55:05','2021-08-06 02:49:46',NULL,NULL),(6,2,1,'2.00 pm-3.00 pm','09/08/2021','accept','2021-08-06 00:56:36','2021-08-10 07:30:06',NULL,NULL),(7,2,1,'1.00 pm-2.00 pm','10/08/2021','pending','2021-08-06 03:08:49','2021-08-06 03:08:49',NULL,NULL),(8,1,1,'2.00 pm-3.00 pm','08/08/2021','pending','2021-08-07 00:15:24','2021-08-07 00:15:24',NULL,2),(9,1,1,'1.00 pm-2.00 pm','08/08/2021','pending','2021-08-07 00:45:27','2021-08-07 00:45:27',NULL,3),(10,2,1,'4.00 pm-5.00 pm','16/08/2021','pending','2021-08-10 09:29:12','2021-08-10 09:29:12',NULL,15),(11,2,1,'2.00 pm-3.00 pm','16/08/2021','accept','2021-08-10 09:38:58','2021-08-10 09:40:57',NULL,10);
/*!40000 ALTER TABLE `booking` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `comment`
--

DROP TABLE IF EXISTS `comment`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `comment` (
  `comment_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `blog_id` bigint(20) unsigned NOT NULL,
  `comment` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `commentor_email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `commentor_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `parent_comment_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`comment_id`),
  KEY `comment_blog_id_foreign` (`blog_id`),
  CONSTRAINT `comment_blog_id_foreign` FOREIGN KEY (`blog_id`) REFERENCES `blog` (`blog_id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `comment`
--

LOCK TABLES `comment` WRITE;
/*!40000 ALTER TABLE `comment` DISABLE KEYS */;
INSERT INTO `comment` VALUES (1,2,'Test description comment','2021-08-02 01:51:18','2021-08-02 01:51:18',NULL,'john@gmail.com','John',NULL),(2,2,'Violin description comment','2021-08-02 01:57:49','2021-08-02 01:57:49',NULL,'violin@gmail.com','violin',NULL),(4,2,'reply comment','2021-08-02 02:50:53','2021-08-02 02:50:53',NULL,'violin@gmail.com','violin','1'),(5,2,'John\'s reply','2021-08-02 02:52:50','2021-08-02 02:52:50',NULL,'john@gmail.com','John','1'),(6,2,'John\'s reply for second comment','2021-08-02 02:56:04','2021-08-02 02:56:04',NULL,'John@gmail.com','John','2'),(7,5,'Test comment','2021-08-10 09:43:38','2021-08-10 09:43:38',NULL,'ross@domain.com','Ross',NULL),(8,5,'Replied comment','2021-08-10 09:44:16','2021-08-10 09:44:16',NULL,'ANdrew@domain.com','Andrew','7'),(9,1,'This is the comment for a.','2021-08-20 05:33:29','2021-08-20 05:33:29',NULL,'joe@domain.com','Joe',NULL),(10,1,'This is the reply for joe','2021-08-20 05:46:02','2021-08-20 05:46:02',NULL,'root@domain.com','Root','9');
/*!40000 ALTER TABLE `comment` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `failed_jobs`
--

LOCK TABLES `failed_jobs` WRITE;
/*!40000 ALTER TABLE `failed_jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `failed_jobs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `invoice`
--

DROP TABLE IF EXISTS `invoice`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `invoice` (
  `invoice_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `booking_id` bigint(20) unsigned NOT NULL,
  `amount` double(20,2) NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`invoice_id`),
  KEY `invoice_booking_id_foreign` (`booking_id`),
  CONSTRAINT `invoice_booking_id_foreign` FOREIGN KEY (`booking_id`) REFERENCES `booking` (`booking_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `invoice`
--

LOCK TABLES `invoice` WRITE;
/*!40000 ALTER TABLE `invoice` DISABLE KEYS */;
INSERT INTO `invoice` VALUES (1,8,500.00,'success','2021-08-07 00:15:24','2021-08-07 00:15:24',NULL),(2,9,500.00,'success','2021-08-07 00:45:28','2021-08-07 00:45:28',NULL),(3,10,500.00,'success','2021-08-10 09:29:14','2021-08-10 09:29:14',NULL),(4,11,500.00,'success','2021-08-10 09:38:58','2021-08-10 09:38:58',NULL);
/*!40000 ALTER TABLE `invoice` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `mentee`
--

DROP TABLE IF EXISTS `mentee`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `mentee` (
  `mentee_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) unsigned NOT NULL,
  `dob` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gender` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `course_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address1` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address2` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `state` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `zipcode` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `profile_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`mentee_id`),
  KEY `mentee_user_id_foreign` (`user_id`),
  CONSTRAINT `mentee_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `mentee`
--

LOCK TABLES `mentee` WRITE;
/*!40000 ALTER TABLE `mentee` DISABLE KEYS */;
INSERT INTO `mentee` VALUES (1,5,'07/12/1997',NULL,NULL,'#455','2nd cross 5th main','Texas','Texas','345678','United States','/storage/Velencia5/G2coxkeVrq1kZWkzKDW5KcueEsyBcAsUFPQW23DW.jpg','2021-07-29 07:47:03','2021-08-07 01:38:11',NULL),(2,8,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2021-08-25 02:01:20','2021-08-25 02:01:20',NULL);
/*!40000 ALTER TABLE `mentee` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `mentor`
--

DROP TABLE IF EXISTS `mentor`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `mentor` (
  `mentor_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) unsigned NOT NULL,
  `dob` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gender` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `course_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `course` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `price` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address1` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address2` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `state` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `zipcode` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `profile_image` blob,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`mentor_id`),
  KEY `mentor_user_id_foreign` (`user_id`),
  CONSTRAINT `mentor_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `mentor`
--

LOCK TABLES `mentor` WRITE;
/*!40000 ALTER TABLE `mentor` DISABLE KEYS */;
INSERT INTO `mentor` VALUES (1,3,'11/02/1998',NULL,'A-',NULL,NULL,NULL,'#443','home','Texas','Florida','345678','United States',NULL,'2021-07-22 02:31:45','2021-07-22 03:17:35',NULL),(2,4,'18/03/1993',NULL,'Mathematics(M.sc)',NULL,NULL,NULL,'#221','2nd main','Texas','Florida','321456','United States',NULL,'2021-07-22 09:46:21','2021-08-17 02:25:00',NULL),(3,7,'10/03/1983',NULL,NULL,NULL,NULL,NULL,'7th main','Headingly','Headingly','London','345677','UK',NULL,'2021-08-07 08:30:37','2021-08-25 04:50:41',NULL),(4,9,'09/04/1985',NULL,NULL,NULL,NULL,NULL,'19th main road','Auckland','Auckland','Wellington','456763','NewZealand',NULL,'2021-08-25 02:21:24','2021-08-25 04:52:45',NULL),(5,10,'19/02/1986',NULL,NULL,NULL,NULL,NULL,'6th main street','UpperHutt','UpperHutt','Wellington','876453','New Zealand',NULL,'2021-08-25 02:44:25','2021-08-25 02:52:29',NULL),(6,11,'11/07/1990',NULL,NULL,NULL,NULL,NULL,'20th main 7th cross','Chicago','Chicago','Illions','234786','United States',NULL,'2021-08-25 04:53:28','2021-08-25 04:55:59',NULL);
/*!40000 ALTER TABLE `mentor` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (1,'2014_10_12_000000_create_users_table',1),(2,'2014_10_12_100000_create_password_resets_table',1),(3,'2019_08_19_000000_create_failed_jobs_table',1),(4,'2021_07_19_063125_create_mentor_table',2),(6,'2021_07_19_081820_create_mentee_table',3),(7,'2021_07_20_030810_create_admin_info_table',4),(8,'2021_07_20_030326_create_booking_table',5),(9,'2021_07_20_030738_create_invoice_table',6),(10,'2021_07_21_091828_create_schedule_timing_table',7),(11,'2021_07_28_080336_create_blog_table',8),(12,'2021_07_28_080540_create_comment_table',9),(13,'2021_07_28_084004_update_blog_table',10),(14,'2021_07_28_095449_update_comment_table',11),(16,'2021_07_30_094136_create_transaction_table',12),(17,'2021_08_06_140903_update_booking_table',13),(18,'2021_08_07_070232_update_users_table',14),(19,'2021_08_24_084840_create_review_table',15);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `password_resets`
--

LOCK TABLES `password_resets` WRITE;
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `review`
--

DROP TABLE IF EXISTS `review`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `review` (
  `review_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `mentor_id` bigint(20) unsigned NOT NULL,
  `mentee_id` bigint(20) unsigned NOT NULL,
  `rating` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `review` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`review_id`),
  KEY `review_mentor_id_foreign` (`mentor_id`),
  KEY `review_mentee_id_foreign` (`mentee_id`),
  CONSTRAINT `review_mentee_id_foreign` FOREIGN KEY (`mentee_id`) REFERENCES `mentee` (`mentee_id`),
  CONSTRAINT `review_mentor_id_foreign` FOREIGN KEY (`mentor_id`) REFERENCES `mentor` (`mentor_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `review`
--

LOCK TABLES `review` WRITE;
/*!40000 ALTER TABLE `review` DISABLE KEYS */;
INSERT INTO `review` VALUES (1,1,1,'3','Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation. Curabitur non nulla sit amet nisl tempus','2021-08-24 05:17:31','2021-08-24 05:17:31',NULL),(2,2,2,'5','Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation. Curabitur non nulla sit amet nisl tempus','2021-08-25 02:17:30','2021-08-25 02:17:30',NULL),(3,1,2,'4','Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation. Curabitur non nulla sit amet nisl tempus','2021-08-26 01:17:38','2021-08-26 01:17:38',NULL),(4,2,1,'4','Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s','2021-08-26 05:16:37','2021-08-26 05:16:37',NULL);
/*!40000 ALTER TABLE `review` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `schedule_timing`
--

DROP TABLE IF EXISTS `schedule_timing`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `schedule_timing` (
  `slot_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `mentor_id` bigint(20) unsigned NOT NULL,
  `start_time` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `end_time` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `week_day` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`slot_id`),
  KEY `schedule_timing_mentor_id_foreign` (`mentor_id`),
  CONSTRAINT `schedule_timing_mentor_id_foreign` FOREIGN KEY (`mentor_id`) REFERENCES `mentor` (`mentor_id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `schedule_timing`
--

LOCK TABLES `schedule_timing` WRITE;
/*!40000 ALTER TABLE `schedule_timing` DISABLE KEYS */;
INSERT INTO `schedule_timing` VALUES (1,1,'12.00 pm','1.00 pm','1','2021-07-22 08:22:34','2021-07-22 08:22:34',NULL),(2,1,'2.00 pm','3.00 pm','1','2021-07-22 08:42:23','2021-07-22 08:42:23',NULL),(3,1,'1.00 pm','2.00 pm','1','2021-07-22 08:42:53','2021-07-22 08:42:53',NULL),(4,1,'9.00 am','10.00 am','1','2021-07-22 08:45:59','2021-07-22 08:45:59',NULL),(5,1,'12.00 pm','1.00 pm','2','2021-07-22 08:55:52','2021-07-22 08:55:52',NULL),(6,2,'10.00 am','11.00 am','2','2021-07-22 09:49:15','2021-08-06 03:06:19','2021-08-06 03:06:19'),(7,2,'12.00 pm','1.00 pm','2','2021-07-22 09:49:34','2021-07-22 09:49:34',NULL),(8,2,'10.00 am','11.00 am','4','2021-07-22 10:01:21','2021-07-22 10:01:21',NULL),(9,2,'10.00 am','11.00 am','2','2021-07-22 10:01:42','2021-07-22 10:01:42',NULL),(10,2,'2.00 pm','3.00 pm','2','2021-07-22 10:02:01','2021-07-22 10:02:01',NULL),(11,2,'1.00 pm','3.00 pm','1','2021-07-22 10:06:40','2021-08-06 03:06:26','2021-08-06 03:06:26'),(12,2,'6.00 am','7.00 am','7','2021-07-28 11:29:09','2021-07-28 11:29:09',NULL),(13,2,'1.00 pm','2.00 pm','3','2021-08-06 03:07:14','2021-08-06 03:09:35','2021-08-06 03:09:35'),(14,2,'3.00 pm','4.00 pm','2','2021-08-06 04:17:57','2021-08-06 04:29:28','2021-08-06 04:29:28'),(15,2,'4.00 pm','5.00 pm','2','2021-08-06 04:30:19','2021-08-06 04:30:19',NULL),(16,2,'4.00 pm','5.00 pm','3','2021-08-06 04:30:42','2021-08-06 04:30:53','2021-08-06 04:30:53'),(17,3,'2.00 pm','3.00 pm','2','2021-08-09 00:35:45','2021-08-09 00:35:45',NULL),(18,2,'12.00 pm','1.00 pm','3','2021-08-10 09:42:02','2021-08-10 09:42:02',NULL);
/*!40000 ALTER TABLE `schedule_timing` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `transaction`
--

DROP TABLE IF EXISTS `transaction`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `transaction` (
  `transaction_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `booking_id` bigint(20) unsigned NOT NULL,
  `payment_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payer_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`transaction_id`),
  KEY `transaction_booking_id_foreign` (`booking_id`),
  CONSTRAINT `transaction_booking_id_foreign` FOREIGN KEY (`booking_id`) REFERENCES `booking` (`booking_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `transaction`
--

LOCK TABLES `transaction` WRITE;
/*!40000 ALTER TABLE `transaction` DISABLE KEYS */;
INSERT INTO `transaction` VALUES (1,8,'PAYID-MEHB3VI6JD541060R958323F','PLSR8274PBS7E','EC-6YH25801D82187149','500','2021-08-07 00:15:24','2021-08-07 00:15:24',NULL),(2,9,'tok_1JLioTSA5lh0TiF1fXqCPQxI','ch_3JLiodSA5lh0TiF10aJT53xN','tok_1JLioTSA5lh0TiF1fXqCPQxI','500','2021-08-07 00:45:28','2021-08-07 00:45:28',NULL),(3,10,'tok_1JMwPrSA5lh0TiF1gj9FAEo6','ch_3JMwQ7SA5lh0TiF10q2g32rR','tok_1JMwPrSA5lh0TiF1gj9FAEo6','500','2021-08-10 09:29:13','2021-08-10 09:29:13',NULL),(4,11,'tok_1JMwZRSA5lh0TiF10CCxiyU0','ch_3JMwZXSA5lh0TiF11ZB9ODY1','tok_1JMwZRSA5lh0TiF10CCxiyU0','500','2021-08-10 09:38:58','2021-08-10 09:38:58',NULL);
/*!40000 ALTER TABLE `transaction` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `first_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `role` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `profile_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `degree` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `category` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'sdjdhk','hjs','mentor','dhhdljfl@ggd.com','3574858491','active',NULL,'$2y$10$44Ebvpc6n97H5P0dgVAhleuJTX9WmbAx2yJiydCKfodSErFTKfAga',NULL,'2021-07-18 22:21:42','2021-07-18 22:21:42',NULL,NULL,NULL),(2,'John','Davis','mentor','demo@domain.com','8645798475','active',NULL,'$2y$10$kHEP9HGxaEyuGLIeuYiQ/./Y1/fq5jb52r1BjDhwJHbJiqZEUsR/C',NULL,'2021-07-19 02:13:26','2021-07-22 09:59:24',NULL,NULL,NULL),(3,'Allan','Border','mentor','allan@demo.com','9876543210','active',NULL,'$2y$10$kHEP9HGxaEyuGLIeuYiQ/./Y1/fq5jb52r1BjDhwJHbJiqZEUsR/C',NULL,'2021-07-22 02:31:45','2021-08-25 04:48:16','/storage/Allan3/GKHMCzZQBvL9p07ZcevJNKDxtspYGhJkrkOUNCiV.jpg','M S','physics'),(4,'Grame','Smith','mentor','smith@domain.com','9876543210','active',NULL,'$2y$10$MlipHlxiFrQHfF0P6jJrTOEjhZm9EDQjbj2XIwNp3pfO/ChLhlVYm',NULL,'2021-07-22 09:46:20','2021-08-25 04:46:31','/storage/Grame4/yMZm7F8BvKipvDKJYQyY54JYOFL5bFZgC403WjBC.jpg','M.sc','mathematics'),(5,'Velencia','Rubio','mentee','rubio@domain.com','9838498393','active',NULL,'$2y$10$kzo3jDSJ1drwGiZERoQouOAzcYIwuPi.OcioQPAPC09pp6FLMBDRG',NULL,'2021-07-29 07:47:03','2021-08-07 01:47:05','/storage/Velencia5/OuTHCIXit2tmkd3NQ2VC9ZG4Plaif6DcvjwhF6zB.jpg',NULL,NULL),(6,'admin','admin','admin','admin@domain.com','9765432100','active',NULL,'$2y$10$ntNWYFWftqvklxG2Bqrra.YCzat8RvsyCxmH/Kv.8m4ccRtWCo4sW',NULL,'2021-07-29 07:47:03','2021-08-06 02:38:15',NULL,NULL,NULL),(7,'Joe','Root','mentor','joe@domain.com','8598435785','active',NULL,'$2y$10$OifhBi12eHHaVv1I2VRPm.Uxcnbr4BEJBd6fht28gM6Z9aYhBp57u',NULL,'2021-08-07 08:30:37','2021-08-25 04:50:41','/storage/Joe7/OGiKQ3s18A5qmmpiL5quLcIqgzjQ6f8CfNDpodBZ.jpg','M.Sc','chemistry'),(8,'Margo','Maxi','mentee','margo@domain.com','9876543201','active',NULL,'$2y$10$5A4afOjPIELYs7/caFG9fOH9RNbnED04.UqXA6r86.G4zQO7asN/.',NULL,'2021-08-25 02:01:20','2021-08-26 05:11:22','/storage/Margo8/lNygtDBWhoQkFfbuiuMzkqXDxrZEyqeMi7ubRnRr.jpg',NULL,NULL),(9,'Ross','Taylor','mentor','taylor@domain.com','8645282921','active',NULL,'$2y$10$vLrHfmeFPj7w.4cgV0fsj.PZi22pAfIDPPwUltmBKBPOkcWJr7t4O',NULL,'2021-08-25 02:21:24','2021-08-25 04:52:45','/storage/Ross9/Svbkj6aCqS7DxZHxbDy5N3gY4Y6Xc0CbezAxviRV.jpg','M.sc(CS)','technology'),(10,'Kyle','Jamieson','mentor','kyle@domain.com','35843758949','active',NULL,'$2y$10$BO/1Elm/FbVsuk84i3w4Z.oJnn8ZSjg.1sTYPDNdxe6ACLYQPiTOa',NULL,'2021-08-25 02:44:25','2021-08-25 04:48:59','/storage/Kyle10/ZVCE7K6QVjIO2bkG5kMKVrIz2Mgb1vv4HyTQZq6H.jpg','M.A','english'),(11,'Jessica','john','mentor','jessica@domain.com','738479834','active',NULL,'$2y$10$8XKxbnk0kVlNiUmaIfnccuHIuy.k.Gqq/AHvwKPAbyIZx9CCtWLSS',NULL,'2021-08-25 04:53:28','2021-08-25 04:58:57','/storage/Jessica11/VNsocsZ7hKtgOAvmRdQGQTTxPbUcTjj1ACVPONsp.jpg','M.sc','science');
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