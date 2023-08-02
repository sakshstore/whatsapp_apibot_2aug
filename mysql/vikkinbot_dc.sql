-- MySQL dump 10.19  Distrib 10.3.39-MariaDB, for Linux (x86_64)
--
-- Host: localhost    Database: vikkinbot_dc
-- ------------------------------------------------------
-- Server version	10.3.39-MariaDB

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
-- Current Database: `vikkinbot_dc`
--


--
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
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
-- Table structure for table `messages`
--

DROP TABLE IF EXISTS `messages`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `messages` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `from` int(10) unsigned NOT NULL,
  `to` int(10) unsigned NOT NULL,
  `read` tinyint(1) NOT NULL DEFAULT 0,
  `text` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=101 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `messages`
--

LOCK TABLES `messages` WRITE;
/*!40000 ALTER TABLE `messages` DISABLE KEYS */;
INSERT INTO `messages` (`id`, `from`, `to`, `read`, `text`, `created_at`, `updated_at`) VALUES (1,7,1,0,'Temporibus nihil voluptas necessitatibus consequatur cumque sed.','2023-01-16 08:25:39','2023-01-16 08:25:39'),(2,9,5,0,'Molestias ipsum molestiae laborum aut fugit voluptatem sapiente.','2023-01-16 08:25:39','2023-01-16 08:25:39'),(3,10,9,0,'Rerum est praesentium eius doloremque et pariatur ratione.','2023-01-16 08:25:39','2023-01-16 08:25:39'),(4,1,10,0,'Aliquid provident laudantium provident aliquid quia perspiciatis aut doloremque.','2023-01-16 08:25:39','2023-01-16 08:25:39'),(5,10,6,0,'Est nobis provident error omnis animi facilis eum nisi deserunt enim et.','2023-01-16 08:25:39','2023-01-16 08:25:39'),(6,2,3,0,'Nesciunt quos facilis impedit ut aut animi dolores dolorem.','2023-01-16 08:25:39','2023-01-16 08:25:39'),(7,1,4,0,'Dolor quidem iste dolore ut autem cupiditate et et ad ipsa impedit.','2023-01-16 08:25:39','2023-01-16 08:25:39'),(8,7,4,0,'Ad delectus deleniti sunt voluptate architecto fugit est eius in rerum excepturi quas.','2023-01-16 08:25:39','2023-01-16 08:25:39'),(9,6,8,0,'Sit et quo optio aut eos pariatur soluta.','2023-01-16 08:25:39','2023-01-16 08:25:39'),(10,6,4,0,'Est aut harum necessitatibus reprehenderit quis ipsam eum blanditiis error eius explicabo ipsa libero.','2023-01-16 08:25:39','2023-01-16 08:25:39'),(11,1,7,0,'Consequuntur id ex ab veniam velit qui ut soluta.','2023-01-16 08:25:39','2023-01-16 08:25:39'),(12,3,10,0,'Expedita beatae nam exercitationem alias pariatur totam repellat labore quia dicta.','2023-01-16 08:25:39','2023-01-16 08:25:39'),(13,10,4,0,'Adipisci consequatur eius laboriosam odio alias nulla velit similique magnam quibusdam ut mollitia.','2023-01-16 08:25:39','2023-01-16 08:25:39'),(14,1,9,0,'Ut sunt aut dolore voluptas eius doloribus est suscipit et eius harum ab ducimus.','2023-01-16 08:25:39','2023-01-16 08:25:39'),(15,1,8,0,'Distinctio saepe autem aut distinctio rerum numquam aspernatur ut velit corrupti est fugiat.','2023-01-16 08:25:39','2023-01-16 08:25:39'),(16,3,2,0,'Maiores debitis voluptates optio est sequi autem quo debitis cum nostrum fugit.','2023-01-16 08:25:39','2023-01-16 08:25:39'),(17,5,7,0,'Quam eaque sequi voluptatem neque harum neque adipisci qui dicta dolor cumque sint quasi.','2023-01-16 08:25:39','2023-01-16 08:25:39'),(18,1,5,0,'Sint qui rem officiis qui est sit consequatur quam.','2023-01-16 08:25:39','2023-01-16 08:25:39'),(19,10,7,0,'Autem aut omnis maxime rerum voluptas cumque rem rerum.','2023-01-16 08:25:39','2023-01-16 08:25:39'),(20,6,5,0,'Molestias est quia assumenda optio non omnis voluptates dolor est occaecati tempora ullam delectus.','2023-01-16 08:25:39','2023-01-16 08:25:39'),(21,10,4,0,'Debitis voluptate at et quidem sunt ex repellat iusto sed nisi magni veritatis odio.','2023-01-16 08:25:39','2023-01-16 08:25:39'),(22,2,5,0,'Distinctio officiis expedita rerum at ut quas deserunt ipsa eaque hic magni ipsam.','2023-01-16 08:25:39','2023-01-16 08:25:39'),(23,6,1,0,'Eos nostrum corrupti minima ea et quis id velit ducimus explicabo.','2023-01-16 08:25:39','2023-01-16 08:25:39'),(24,6,10,0,'Et porro accusamus provident eum architecto sequi quo repudiandae cupiditate perspiciatis nemo.','2023-01-16 08:25:39','2023-01-16 08:25:39'),(25,3,2,0,'Ut repudiandae ut qui quia dolor asperiores magnam amet ut.','2023-01-16 08:25:39','2023-01-16 08:25:39'),(26,1,6,0,'Quisquam quia nam quibusdam perferendis temporibus itaque sit magni exercitationem autem.','2023-01-16 08:25:39','2023-01-16 08:25:39'),(27,9,6,0,'Voluptas et et dolore sint nostrum ullam est impedit sed amet ipsam magni qui.','2023-01-16 08:25:39','2023-01-16 08:25:39'),(28,10,6,0,'Odit vitae maxime laudantium voluptatem dolores magnam quasi et.','2023-01-16 08:25:39','2023-01-16 08:25:39'),(29,3,4,0,'Ut rem delectus et aliquid quaerat itaque.','2023-01-16 08:25:39','2023-01-16 08:25:39'),(30,1,7,0,'Enim accusamus et rerum ducimus enim consequuntur facilis velit dolor alias quidem.','2023-01-16 08:25:39','2023-01-16 08:25:39'),(31,2,7,0,'Est dolores quia modi minima excepturi temporibus sapiente velit.','2023-01-16 08:25:39','2023-01-16 08:25:39'),(32,5,2,0,'Ullam aliquid ut quidem beatae voluptas autem qui non fugit non voluptas dolorum mollitia.','2023-01-16 08:25:39','2023-01-16 08:25:39'),(33,6,10,0,'Magni autem consequatur cupiditate similique sequi et cum nesciunt quasi eaque rerum explicabo.','2023-01-16 08:25:39','2023-01-16 08:25:39'),(34,7,8,0,'Vitae dolore laudantium necessitatibus qui ad eos saepe voluptatem unde enim veniam officia dicta.','2023-01-16 08:25:39','2023-01-16 08:25:39'),(35,8,2,0,'Odit aut officiis dolorem harum et sequi.','2023-01-16 08:25:39','2023-01-16 08:25:39'),(36,8,4,0,'Occaecati non numquam quia recusandae non et.','2023-01-16 08:25:39','2023-01-16 08:25:39'),(37,1,6,0,'Beatae provident id rem qui eos quaerat.','2023-01-16 08:25:39','2023-01-16 08:25:39'),(38,5,10,0,'Voluptates doloremque autem autem et voluptates quia qui.','2023-01-16 08:25:39','2023-01-16 08:25:39'),(39,2,4,0,'Est vel consequatur eligendi inventore ea eos.','2023-01-16 08:25:39','2023-01-16 08:25:39'),(40,7,10,0,'At ab autem officia ab voluptas incidunt eos atque ipsa.','2023-01-16 08:25:39','2023-01-16 08:25:39'),(41,6,3,0,'Et tempora explicabo corrupti enim omnis laudantium dicta.','2023-01-16 08:25:39','2023-01-16 08:25:39'),(42,9,5,0,'Ut sunt architecto recusandae temporibus eos eaque labore est enim illum.','2023-01-16 08:25:39','2023-01-16 08:25:39'),(43,8,4,0,'Voluptas eligendi itaque architecto cum veritatis est et voluptas.','2023-01-16 08:25:39','2023-01-16 08:25:39'),(44,8,5,0,'Fugit sunt ad numquam ut est alias cumque at dolorem.','2023-01-16 08:25:39','2023-01-16 08:25:39'),(45,7,5,0,'Voluptas sint temporibus doloribus at nisi quia rerum.','2023-01-16 08:25:39','2023-01-16 08:25:39'),(46,1,3,0,'Qui exercitationem a qui eveniet nihil beatae assumenda ut voluptatibus.','2023-01-16 08:25:39','2023-01-16 08:25:39'),(47,7,6,0,'Quas assumenda minus quia dolorem recusandae rem iusto consectetur et quia eum.','2023-01-16 08:25:39','2023-01-16 08:25:39'),(48,8,1,0,'Quis dolorem maxime voluptate eum in quis cupiditate nihil suscipit qui.','2023-01-16 08:25:39','2023-01-16 08:25:39'),(49,4,8,0,'Et nobis incidunt sit tempora nobis sed omnis magni qui veritatis nisi veritatis dolor.','2023-01-16 08:25:39','2023-01-16 08:25:39'),(50,9,6,0,'Aut quaerat quia consequatur asperiores dolores consequatur ea aut perferendis enim aut labore.','2023-01-16 08:25:39','2023-01-16 08:25:39'),(51,5,2,0,'Deleniti et occaecati quas id minus laudantium consequatur animi vitae et.','2023-01-16 08:25:39','2023-01-16 08:25:39'),(52,8,9,0,'In officia modi totam quam minima eum reprehenderit.','2023-01-16 08:25:39','2023-01-16 08:25:39'),(53,10,9,0,'Eius sed doloribus sit minus est culpa odio et commodi reiciendis qui.','2023-01-16 08:25:39','2023-01-16 08:25:39'),(54,7,9,0,'Deserunt assumenda soluta provident est doloribus fugiat aspernatur sit qui amet beatae ipsum dolorem ex.','2023-01-16 08:25:39','2023-01-16 08:25:39'),(55,1,5,0,'Quas et provident architecto mollitia eum accusamus eos et voluptatem quam consequatur maxime totam voluptatem.','2023-01-16 08:25:39','2023-01-16 08:25:39'),(56,3,8,0,'Atque quia quis error non sunt non non quia eos eum.','2023-01-16 08:25:39','2023-01-16 08:25:39'),(57,1,5,0,'Enim aut culpa repellat dolorem vitae amet.','2023-01-16 08:25:39','2023-01-16 08:25:39'),(58,4,3,0,'Optio esse illum molestiae et repellendus a necessitatibus tempora ea.','2023-01-16 08:25:39','2023-01-16 08:25:39'),(59,9,5,0,'Dolor et omnis exercitationem animi atque dolore reiciendis eveniet atque error omnis cum ut.','2023-01-16 08:25:39','2023-01-16 08:25:39'),(60,2,7,0,'Et suscipit facilis culpa odit labore in dolor adipisci nihil quibusdam occaecati molestiae illo.','2023-01-16 08:25:39','2023-01-16 08:25:39'),(61,10,2,0,'Vitae illo nostrum molestias voluptas in rerum voluptate non consequatur a aspernatur ut repellat.','2023-01-16 08:25:39','2023-01-16 08:25:39'),(62,3,2,0,'Praesentium voluptate reprehenderit consequatur magnam dolorum dignissimos quis consequuntur earum sit iste recusandae.','2023-01-16 08:25:39','2023-01-16 08:25:39'),(63,1,2,0,'Voluptatem libero alias dolore non quae enim nisi ex dolor.','2023-01-16 08:25:39','2023-01-16 08:25:39'),(64,7,2,0,'Id enim mollitia iure earum sed pariatur quia id excepturi quo reprehenderit.','2023-01-16 08:25:39','2023-01-16 08:25:39'),(65,6,4,0,'Ut aspernatur dicta quam consequuntur non ex sint recusandae non assumenda iure.','2023-01-16 08:25:39','2023-01-16 08:25:39'),(66,3,4,0,'Aperiam magnam laborum quibusdam voluptas quaerat aut.','2023-01-16 08:25:39','2023-01-16 08:25:39'),(67,3,6,0,'Accusamus ratione minima dolor quo fugiat ducimus.','2023-01-16 08:25:39','2023-01-16 08:25:39'),(68,10,3,0,'Quia omnis vero libero odio illum provident consectetur.','2023-01-16 08:25:39','2023-01-16 08:25:39'),(69,7,6,0,'Nulla quo itaque quos eius neque fugiat.','2023-01-16 08:25:39','2023-01-16 08:25:39'),(70,1,4,0,'Beatae veritatis iste quaerat et ullam quis aperiam veritatis praesentium tenetur dolorem.','2023-01-16 08:25:39','2023-01-16 08:25:39'),(71,6,9,0,'Amet dolor corrupti vel nobis minima molestiae inventore aspernatur et.','2023-01-16 08:25:39','2023-01-16 08:25:39'),(72,1,4,0,'Ullam earum repellat mollitia ea facere possimus.','2023-01-16 08:25:39','2023-01-16 08:25:39'),(73,2,3,0,'Quisquam id vel omnis nisi sit fugiat odio tempora rem cupiditate sed.','2023-01-16 08:25:39','2023-01-16 08:25:39'),(74,6,8,0,'Saepe ratione ullam architecto ipsa nihil reiciendis eum hic reiciendis qui doloremque quis.','2023-01-16 08:25:39','2023-01-16 08:25:39'),(75,9,1,0,'Quia quisquam nemo amet facilis qui non suscipit facere quod quaerat quo expedita.','2023-01-16 08:25:39','2023-01-16 08:25:39'),(76,2,6,0,'Beatae possimus ratione itaque culpa perspiciatis aliquam eos architecto et voluptatem voluptas blanditiis numquam.','2023-01-16 08:25:39','2023-01-16 08:25:39'),(77,8,3,0,'Natus quia consequatur et at doloribus esse nobis perspiciatis ea ut vero laudantium.','2023-01-16 08:25:39','2023-01-16 08:25:39'),(78,5,8,0,'Similique ipsum dolorem eveniet et dolorem omnis vel ea alias modi dolore sed odit.','2023-01-16 08:25:39','2023-01-16 08:25:39'),(79,8,7,0,'Odit non at nostrum similique modi quibusdam enim voluptates id totam eum inventore vitae.','2023-01-16 08:25:39','2023-01-16 08:25:39'),(80,3,7,0,'Nihil repudiandae molestiae dolorem voluptatem qui repudiandae sint culpa aut.','2023-01-16 08:25:39','2023-01-16 08:25:39'),(81,10,3,0,'Consequatur a tenetur possimus quae dolorem ut sequi eum ipsum autem quo ad.','2023-01-16 08:25:39','2023-01-16 08:25:39'),(82,9,8,0,'Perspiciatis commodi asperiores corrupti qui assumenda exercitationem quam debitis est qui maxime quia.','2023-01-16 08:25:39','2023-01-16 08:25:39'),(83,5,1,0,'Voluptatibus magnam qui nihil ducimus quas debitis enim accusantium in ab ex velit.','2023-01-16 08:25:39','2023-01-16 08:25:39'),(84,4,6,0,'Id veritatis esse repudiandae provident et et doloremque voluptatibus.','2023-01-16 08:25:39','2023-01-16 08:25:39'),(85,1,4,0,'Fugit et voluptatum tenetur quibusdam aut laborum ut dolor reiciendis omnis et.','2023-01-16 08:25:39','2023-01-16 08:25:39'),(86,4,10,0,'Eum ipsa expedita et quis quia eos.','2023-01-16 08:25:39','2023-01-16 08:25:39'),(87,2,9,0,'Earum voluptate iure qui fugit cupiditate enim sed dolores.','2023-01-16 08:25:39','2023-01-16 08:25:39'),(88,8,9,0,'Sunt quas ipsam labore inventore et optio in porro ullam et doloribus magni.','2023-01-16 08:25:39','2023-01-16 08:25:39'),(89,8,7,0,'Temporibus est voluptatem quo temporibus quia est.','2023-01-16 08:25:39','2023-01-16 08:25:39'),(90,10,3,0,'Placeat illum aspernatur animi recusandae autem est.','2023-01-16 08:25:39','2023-01-16 08:25:39'),(91,3,9,0,'Et qui quia aut odio reprehenderit dolore harum et iusto magni.','2023-01-16 08:25:39','2023-01-16 08:25:39'),(92,4,3,0,'Doloribus aspernatur repudiandae ut eos id atque velit sint ea vel veniam voluptas quos.','2023-01-16 08:25:39','2023-01-16 08:25:39'),(93,10,3,0,'Hic aut illum et et corrupti nobis iste omnis.','2023-01-16 08:25:39','2023-01-16 08:25:39'),(94,9,6,0,'Natus nemo iure veritatis ducimus aperiam eaque sunt voluptatem blanditiis impedit animi sunt laborum.','2023-01-16 08:25:39','2023-01-16 08:25:39'),(95,4,1,0,'Libero dolor sunt dolorum similique illo pariatur ipsum.','2023-01-16 08:25:39','2023-01-16 08:25:39'),(96,10,9,0,'Soluta deserunt libero eius adipisci consectetur dicta delectus sunt.','2023-01-16 08:25:39','2023-01-16 08:25:39'),(97,5,7,0,'Molestiae molestiae est nihil quia ipsam et perferendis est est.','2023-01-16 08:25:39','2023-01-16 08:25:39'),(98,10,5,0,'Sed sunt suscipit a illo illum omnis laudantium maxime quaerat in.','2023-01-16 08:25:39','2023-01-16 08:25:39'),(99,6,8,0,'Quia ut optio vero veritatis expedita nemo corrupti saepe blanditiis et.','2023-01-16 08:25:39','2023-01-16 08:25:39'),(100,3,9,0,'Voluptatem accusamus et eos reiciendis aut voluptas culpa nihil ad voluptas ea.','2023-01-16 08:25:39','2023-01-16 08:25:39');
/*!40000 ALTER TABLE `messages` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (1,'2014_10_12_000000_create_users_table',1),(2,'2014_10_12_100000_create_password_resets_table',1),(3,'2019_08_19_000000_create_failed_jobs_table',1),(4,'2019_12_14_000001_create_personal_access_tokens_table',1),(5,'2022_09_18_193009_create_messages_table',1),(6,'2022_09_19_235657_add_read_to_messages',1);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
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
-- Table structure for table `personal_access_tokens`
--

DROP TABLE IF EXISTS `personal_access_tokens`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) unsigned NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `personal_access_tokens`
--

LOCK TABLES `personal_access_tokens` WRITE;
/*!40000 ALTER TABLE `personal_access_tokens` DISABLE KEYS */;
/*!40000 ALTER TABLE `personal_access_tokens` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `phone` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `profile_image` varchar(255) DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`id`, `phone`, `name`, `email`, `email_verified_at`, `password`, `profile_image`, `remember_token`, `created_at`, `updated_at`) VALUES (1,'(563) 501-1662','Mr. Stevie Weimann','stacey.conroy@example.com','2023-01-16 08:25:39','$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi','https://xsgames.co/randomusers/avatar.php?g=pixel','tVhxYYZgiU','2023-01-16 08:25:39','2023-01-16 08:25:39'),(2,'480-750-1286','Ivy Romaguera','elouise.langworth@example.net','2023-01-16 08:25:39','$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi','https://xsgames.co/randomusers/avatar.php?g=pixel','SK2EO5gK89','2023-01-16 08:25:39','2023-01-16 08:25:39'),(3,'+1.903.901.3270','Delphine Kub','dorothy77@example.com','2023-01-16 08:25:39','$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi','https://xsgames.co/randomusers/avatar.php?g=pixel','ceGQTJlY9y','2023-01-16 08:25:39','2023-01-16 08:25:39'),(4,'424-429-9879','Cassidy Morissette','kaylie40@example.net','2023-01-16 08:25:39','$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi','https://xsgames.co/randomusers/avatar.php?g=pixel','i4bxnMScaY','2023-01-16 08:25:39','2023-01-16 08:25:39'),(5,'(630) 873-5736','Benedict Jast','wwilkinson@example.org','2023-01-16 08:25:39','$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi','https://xsgames.co/randomusers/avatar.php?g=pixel','YYtuuQ7bUV','2023-01-16 08:25:39','2023-01-16 08:25:39'),(6,'979-987-2701','Leanne Breitenberg','bkirlin@example.com','2023-01-16 08:25:39','$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi','https://xsgames.co/randomusers/avatar.php?g=pixel','VujTn1Zs7b','2023-01-16 08:25:39','2023-01-16 08:25:39'),(7,'+1.601.575.7689','Lempi Hermann','cschuppe@example.net','2023-01-16 08:25:39','$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi','https://xsgames.co/randomusers/avatar.php?g=pixel','lUgsyGumPT','2023-01-16 08:25:39','2023-01-16 08:25:39'),(8,'1-270-402-8260','Sarai Rowe V','alvis77@example.org','2023-01-16 08:25:39','$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi','https://xsgames.co/randomusers/avatar.php?g=pixel','k8kNVy5bkV','2023-01-16 08:25:39','2023-01-16 08:25:39'),(9,'+1.385.845.9798','Effie Bogan','monahan.tyrese@example.com','2023-01-16 08:25:39','$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi','https://xsgames.co/randomusers/avatar.php?g=pixel','sPZfq6RSbg','2023-01-16 08:25:39','2023-01-16 08:25:39'),(10,'+1 (636) 240-1692','Grayson Witting','zakary.schoen@example.com','2023-01-16 08:25:39','$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi','https://xsgames.co/randomusers/avatar.php?g=pixel','dxCCYJmo6E','2023-01-16 08:25:39','2023-01-16 08:25:39');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping events for database 'vikkinbot_dc'
--

--
-- Dumping routines for database 'vikkinbot_dc'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2023-06-16  2:00:27
