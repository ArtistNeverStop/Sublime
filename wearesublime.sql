-- MySQL dump 10.13  Distrib 5.7.20, for Linux (x86_64)
--
-- Host: localhost    Database: wearesublime
-- ------------------------------------------------------
-- Server version	5.7.20

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
-- Table structure for table `artist_available_place`
--

DROP TABLE IF EXISTS `artist_available_place`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `artist_available_place` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `artist_id` int(10) unsigned NOT NULL,
  `place_id` int(10) unsigned NOT NULL,
  `start_at` date NOT NULL,
  `finish_at` date NOT NULL,
  `price` int(10) unsigned DEFAULT NULL,
  `min_quantity_persons` int(10) unsigned NOT NULL DEFAULT '0',
  `price_per_person` int(10) unsigned NOT NULL,
  `extra_specifications` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `artist_available_place_artist_id_foreign` (`artist_id`),
  KEY `artist_available_place_place_id_foreign` (`place_id`),
  CONSTRAINT `artist_available_place_artist_id_foreign` FOREIGN KEY (`artist_id`) REFERENCES `artists` (`id`),
  CONSTRAINT `artist_available_place_place_id_foreign` FOREIGN KEY (`place_id`) REFERENCES `places` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `artist_available_place`
--

LOCK TABLES `artist_available_place` WRITE;
/*!40000 ALTER TABLE `artist_available_place` DISABLE KEYS */;
INSERT INTO `artist_available_place` VALUES (1,5,1,'2017-12-04','2017-12-29',NULL,100,1000,'EX',NULL,NULL),(2,5,1,'2017-12-04','2017-12-29',NULL,100,1000,'EX',NULL,NULL),(3,5,1,'2017-12-04','2017-12-29',NULL,100,1000,'EX',NULL,NULL),(4,5,1,'2017-12-04','2017-12-29',NULL,100,1000,'EX',NULL,NULL),(5,5,1,'2017-12-04','2017-12-29',NULL,100,1000,'EX',NULL,NULL),(6,5,1,'2017-12-04','2017-12-29',NULL,100,1000,'EX',NULL,NULL),(7,5,1,'2017-12-04','2017-12-29',NULL,100,1000,'EX',NULL,NULL),(8,5,1,'2017-12-04','2017-12-29',NULL,100,1000,'EX',NULL,NULL);
/*!40000 ALTER TABLE `artist_available_place` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `artist_have_genre`
--

DROP TABLE IF EXISTS `artist_have_genre`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `artist_have_genre` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `artist_id` int(10) unsigned NOT NULL,
  `genre_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `artist_have_genre_artist_id_foreign` (`artist_id`),
  KEY `artist_have_genre_genre_id_foreign` (`genre_id`),
  CONSTRAINT `artist_have_genre_artist_id_foreign` FOREIGN KEY (`artist_id`) REFERENCES `artists` (`id`),
  CONSTRAINT `artist_have_genre_genre_id_foreign` FOREIGN KEY (`genre_id`) REFERENCES `genres` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `artist_have_genre`
--

LOCK TABLES `artist_have_genre` WRITE;
/*!40000 ALTER TABLE `artist_have_genre` DISABLE KEYS */;
/*!40000 ALTER TABLE `artist_have_genre` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `artists`
--

DROP TABLE IF EXISTS `artists`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `artists` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `real_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `record_label` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `soundcloud_embed` text COLLATE utf8mb4_unicode_ci,
  `country` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `artists_name_unique` (`name`),
  KEY `artists_user_id_foreign` (`user_id`),
  CONSTRAINT `artists_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `artists`
--

LOCK TABLES `artists` WRITE;
/*!40000 ALTER TABLE `artists` DISABLE KEYS */;
INSERT INTO `artists` VALUES (1,8,'Pomo','David','HW&W','Pomo is a Canadian multi-instrumentalist and producer based in Vancouver who makes electronic beats influenced by hip hop, house, 70s and 80s funk music. He grew up in Port Moody, British Colombia and cultivated his tastes and sound through the Vancouver electronic music scene before moving for a time to Montreal and joining the likes of Kaytranada, Ta-Ku, and Stwo on the HW&W roster.','<iframe width=\"100%\" height=\"300\" scrolling=\"no\" frameborder=\"no\" src=\"https://w.soundcloud.com/player/?url=https%3A//api.soundcloud.com/tracks/318544748&amp;color=%23ff5500&amp;auto_play=false&amp;hide_related=false&amp;show_comments=true&amp;show_user=true&amp;show_reposts=false&amp;show_teaser=true&amp;visual=true\"></iframe>','Canada','2017-12-04 23:53:28','2017-12-04 23:53:28'),(2,8,'Tiger & Woods','Larry Tiger & David Woods','Editainment','Shrouded in mystery! No one knows where it’s coming from, no one knows where it’s going.','<iframe width=\"100%\" height=\"300\" scrolling=\"no\" frameborder=\"no\" src=\"https://w.soundcloud.com/player/?url=https%3A//api.soundcloud.com/tracks/345291333&amp;color=%23ff5500&amp;auto_play=false&amp;hide_related=false&amp;show_comments=true&amp;show_user=true&amp;show_reposts=false&amp;show_teaser=true&amp;visual=true\"></iframe>','USA','2017-12-04 23:53:28','2017-12-04 23:53:28'),(3,3,'Karma Kid','Sam Knowles','Just Us Recordings, L2S','Sam Knowles (born 1 August 1994), known professionally as Karma Kid, is an English electronic dance music record producer and DJ from Matlock, Derbyshire. He was educated at Highfields School and obtained a place at the University of Huddersfield which he deferred a year to concentrate on his music.','<iframe width=\"100%\" height=\"300\" scrolling=\"no\" frameborder=\"no\" src=\"https://w.soundcloud.com/player/?url=https%3A//api.soundcloud.com/tracks/317794312&amp;color=%23ff5500&amp;auto_play=false&amp;hide_related=false&amp;show_comments=true&amp;show_user=true&amp;show_reposts=false&amp;show_teaser=true&amp;visual=true\"></iframe>',' Matlock, Derbyshire','2017-12-04 23:53:28','2017-12-04 23:53:28'),(4,4,'Disclosure','Guy Lawrence y  Howard Lawrence','Island Records, Interscope Records, Moshi Moshi Records, PMR Records, Cherrytree Records','Disclosure es un dúo británico de música electrónica orientado al género deep house y garage house. Está conformado por los hermanos Guy y Howard Lawrence oriundos de Reigate, Surrey situado al Sudeste de Inglaterra. Su primer álbum de estudio, Settle , liberado el 3 de junio de 2013 mediante PMR, fue nominado ...','<iframe width=\"100%\" height=\"300\" scrolling=\"no\" frameborder=\"no\" src=\"https://w.soundcloud.com/player/?url=https%3A//api.soundcloud.com/tracks/153132578&amp;color=%23ff5500&amp;auto_play=false&amp;hide_related=false&amp;show_comments=true&amp;show_user=true&amp;show_reposts=false&amp;show_teaser=true&amp;visual=true\"></iframe>',' Surrey, Reino Unido','2017-12-04 23:53:28','2017-12-04 23:53:28'),(5,NULL,'Example','Diego Meza','Ceti Colomos','Ejemplo',NULL,'Mexico','2017-12-05 00:17:03','2017-12-05 00:57:24');
/*!40000 ALTER TABLE `artists` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `countries`
--

DROP TABLE IF EXISTS `countries`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `countries` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sortname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `countries`
--

LOCK TABLES `countries` WRITE;
/*!40000 ALTER TABLE `countries` DISABLE KEYS */;
/*!40000 ALTER TABLE `countries` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `files`
--

DROP TABLE IF EXISTS `files`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `files` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `file_path` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mime_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `uploader_id` int(10) unsigned DEFAULT NULL,
  `order` double unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `files_uploader_id_foreign` (`uploader_id`),
  CONSTRAINT `files_uploader_id_foreign` FOREIGN KEY (`uploader_id`) REFERENCES `users` (`id`) ON DELETE SET NULL
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `files`
--

LOCK TABLES `files` WRITE;
/*!40000 ALTER TABLE `files` DISABLE KEYS */;
INSERT INTO `files` VALUES (1,'public/artists/background-Pomo.jpg','image/jpeg',1,1512410008.923801,'2017-12-04 23:53:28','2017-12-04 23:53:28'),(2,'public/artists/Pomo.jpg','image/jpeg',1,1512410008.92499,'2017-12-04 23:53:28','2017-12-04 23:53:28'),(3,'public/artists/background-TigerAndWoods.jpg','image/jpeg',1,1512410008.929804,'2017-12-04 23:53:28','2017-12-04 23:53:28'),(4,'public/artists/TigerAndWoods.jpg','image/jpeg',1,1512410008.930605,'2017-12-04 23:53:28','2017-12-04 23:53:28'),(5,'public/artists/background-KarmaKid.jpg','image/jpeg',1,1512410008.934553,'2017-12-04 23:53:28','2017-12-04 23:53:28'),(6,'public/artists/KarmaKid.jpg','image/jpeg',1,1512410008.93536,'2017-12-04 23:53:28','2017-12-04 23:53:28'),(7,'public/artists/background-Disclousure.jpg','image/jpeg',1,1512410008.939386,'2017-12-04 23:53:28','2017-12-04 23:53:28'),(8,'public/artists/Disclousure.jpeg','image/jpeg',1,1512410008.940228,'2017-12-04 23:53:28','2017-12-04 23:53:28'),(9,'public/users/cARIeavvPpOK9pIGBqy3YMLDqUBWt8TjJ6aVw4yY.jpeg','image/jpeg',NULL,1512410554.355972,'2017-12-05 00:02:34','2017-12-05 00:02:34');
/*!40000 ALTER TABLE `files` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `genres`
--

DROP TABLE IF EXISTS `genres`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `genres` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `history` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `cultural` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `genres_name_unique` (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `genres`
--

LOCK TABLES `genres` WRITE;
/*!40000 ALTER TABLE `genres` DISABLE KEYS */;
/*!40000 ALTER TABLE `genres` ENABLE KEYS */;
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
) ENGINE=InnoDB AUTO_INCREMENT=320 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (297,'2014_10_12_000000_create_users_table',1),(298,'2014_10_12_000001_create_files_table',1),(299,'2014_10_12_100000_create_password_resets_table',1),(300,'2016_06_01_000001_create_oauth_auth_codes_table',1),(301,'2016_06_01_000002_create_oauth_access_tokens_table',1),(302,'2016_06_01_000003_create_oauth_refresh_tokens_table',1),(303,'2016_06_01_000004_create_oauth_clients_table',1),(304,'2016_06_01_000005_create_oauth_personal_access_clients_table',1),(305,'2017_10_23_225551_create_roles_table',1),(306,'2017_10_23_225735_create_user_has_role_table',1),(307,'2017_10_24_013851_create_artists_table',1),(308,'2017_10_24_014005_create_places_table',1),(309,'2017_10_24_070049_create_requests_table',1),(310,'2017_10_24_144623_create_artist_avaliable_place_table',1),(311,'2017_11_26_205124_create_countries_table',1),(312,'2017_11_26_210325_create_states_table',1),(313,'2017_12_03_171812_create_products_table',1),(314,'2017_12_03_210042_create_genres_table',1),(315,'2017_12_03_210139_create_artist_have_genre_table',1),(316,'2017_12_04_060530_create_wallets_table',1),(317,'2017_12_04_085748_create_recharges_table',1),(318,'2017_12_04_102743_create_tickets_table',1),(319,'2023_10_23_225735_create_resource_has_file_table',1);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `oauth_access_tokens`
--

DROP TABLE IF EXISTS `oauth_access_tokens`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `oauth_access_tokens` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `client_id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `expires_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `oauth_access_tokens_user_id_index` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `oauth_access_tokens`
--

LOCK TABLES `oauth_access_tokens` WRITE;
/*!40000 ALTER TABLE `oauth_access_tokens` DISABLE KEYS */;
/*!40000 ALTER TABLE `oauth_access_tokens` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `oauth_auth_codes`
--

DROP TABLE IF EXISTS `oauth_auth_codes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `oauth_auth_codes` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(11) NOT NULL,
  `client_id` int(11) NOT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `oauth_auth_codes`
--

LOCK TABLES `oauth_auth_codes` WRITE;
/*!40000 ALTER TABLE `oauth_auth_codes` DISABLE KEYS */;
/*!40000 ALTER TABLE `oauth_auth_codes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `oauth_clients`
--

DROP TABLE IF EXISTS `oauth_clients`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `oauth_clients` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `secret` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `redirect` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `personal_access_client` tinyint(1) NOT NULL,
  `password_client` tinyint(1) NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `oauth_clients_user_id_index` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `oauth_clients`
--

LOCK TABLES `oauth_clients` WRITE;
/*!40000 ALTER TABLE `oauth_clients` DISABLE KEYS */;
/*!40000 ALTER TABLE `oauth_clients` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `oauth_personal_access_clients`
--

DROP TABLE IF EXISTS `oauth_personal_access_clients`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `oauth_personal_access_clients` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `client_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `oauth_personal_access_clients_client_id_index` (`client_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `oauth_personal_access_clients`
--

LOCK TABLES `oauth_personal_access_clients` WRITE;
/*!40000 ALTER TABLE `oauth_personal_access_clients` DISABLE KEYS */;
/*!40000 ALTER TABLE `oauth_personal_access_clients` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `oauth_refresh_tokens`
--

DROP TABLE IF EXISTS `oauth_refresh_tokens`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `oauth_refresh_tokens` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `access_token_id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `oauth_refresh_tokens_access_token_id_index` (`access_token_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `oauth_refresh_tokens`
--

LOCK TABLES `oauth_refresh_tokens` WRITE;
/*!40000 ALTER TABLE `oauth_refresh_tokens` DISABLE KEYS */;
/*!40000 ALTER TABLE `oauth_refresh_tokens` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
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
-- Table structure for table `places`
--

DROP TABLE IF EXISTS `places`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `places` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `floors` int(11) NOT NULL,
  `people_limit` int(11) NOT NULL,
  `area` double NOT NULL,
  `latitude` double NOT NULL,
  `longitude` double NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `places_name_unique` (`name`),
  KEY `places_user_id_foreign` (`user_id`),
  CONSTRAINT `places_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `places`
--

LOCK TABLES `places` WRITE;
/*!40000 ALTER TABLE `places` DISABLE KEYS */;
INSERT INTO `places` VALUES (1,NULL,'Ceti Colomos','Av. Justo Sierra 2600, Ladron De Guevara, 44130 Guadalajara, Jal., Mexico',0,333321,1233,20.677960353987284,-103.38233947753906,'ejemplo','2017-12-05 00:52:17','2017-12-05 00:52:17');
/*!40000 ALTER TABLE `places` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `products` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `products`
--

LOCK TABLES `products` WRITE;
/*!40000 ALTER TABLE `products` DISABLE KEYS */;
/*!40000 ALTER TABLE `products` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `recharges`
--

DROP TABLE IF EXISTS `recharges`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `recharges` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `wallet_id` int(10) unsigned DEFAULT NULL,
  `amount` double unsigned NOT NULL DEFAULT '0',
  `payment_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `recharges_payment_id_unique` (`payment_id`),
  KEY `recharges_wallet_id_foreign` (`wallet_id`),
  CONSTRAINT `recharges_wallet_id_foreign` FOREIGN KEY (`wallet_id`) REFERENCES `wallets` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `recharges`
--

LOCK TABLES `recharges` WRITE;
/*!40000 ALTER TABLE `recharges` DISABLE KEYS */;
INSERT INTO `recharges` VALUES (1,12,10000,'PAY-4NB58200KL500463GLISZGVA','2017-12-05 00:26:27','2017-12-05 00:26:27'),(2,12,3000,'PAY-5A003630WH386812BLISZQ3A','2017-12-05 00:48:11','2017-12-05 00:48:11'),(3,12,3000,'PAY-1CD56725CP694381YLISZQ3I','2017-12-05 00:48:12','2017-12-05 00:48:12'),(4,12,1000,'PAY-4MY32187FK457720JLIS2IIA','2017-12-05 01:38:07','2017-12-05 01:38:07'),(5,12,1000,'PAY-5H240678TT2578118LIS2IIQ','2017-12-05 01:38:09','2017-12-05 01:38:09'),(6,12,1000,'PAY-06J528463P454392ULIS2VHI','2017-12-05 02:05:48','2017-12-05 02:05:48'),(7,12,1000,'PAY-8F8708570Y8652129LIS2VHY','2017-12-05 02:05:50','2017-12-05 02:05:50'),(8,12,1000,'PAY-5XX73897TA239405DLIS2VHY','2017-12-05 02:05:50','2017-12-05 02:05:50'),(9,12,1000,'PAY-7FR13254YK211024SLIS2VIQ','2017-12-05 02:05:53','2017-12-05 02:05:53'),(10,12,1000,'PAY-47K27033968580105LIS2VIY','2017-12-05 02:05:54','2017-12-05 02:05:54');
/*!40000 ALTER TABLE `recharges` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `requests`
--

DROP TABLE IF EXISTS `requests`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `requests` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned NOT NULL,
  `artist_id` int(10) unsigned NOT NULL,
  `type` tinyint(4) NOT NULL DEFAULT '0',
  `status` tinyint(4) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `requests_user_id_foreign` (`user_id`),
  KEY `requests_artist_id_foreign` (`artist_id`),
  CONSTRAINT `requests_artist_id_foreign` FOREIGN KEY (`artist_id`) REFERENCES `artists` (`id`),
  CONSTRAINT `requests_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `requests`
--

LOCK TABLES `requests` WRITE;
/*!40000 ALTER TABLE `requests` DISABLE KEYS */;
INSERT INTO `requests` VALUES (1,12,5,0,1,'2017-12-05 00:17:03','2017-12-05 00:17:14');
/*!40000 ALTER TABLE `requests` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `resource_has_file`
--

DROP TABLE IF EXISTS `resource_has_file`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `resource_has_file` (
  `file_id` int(10) unsigned NOT NULL,
  `user_id` int(10) unsigned DEFAULT NULL,
  `artist_id` int(10) unsigned DEFAULT NULL,
  `type` tinyint(4) NOT NULL DEFAULT '0',
  KEY `resource_has_file_file_id_foreign` (`file_id`),
  KEY `resource_has_file_user_id_foreign` (`user_id`),
  KEY `resource_has_file_artist_id_foreign` (`artist_id`),
  CONSTRAINT `resource_has_file_artist_id_foreign` FOREIGN KEY (`artist_id`) REFERENCES `artists` (`id`),
  CONSTRAINT `resource_has_file_file_id_foreign` FOREIGN KEY (`file_id`) REFERENCES `files` (`id`) ON DELETE CASCADE,
  CONSTRAINT `resource_has_file_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `resource_has_file`
--

LOCK TABLES `resource_has_file` WRITE;
/*!40000 ALTER TABLE `resource_has_file` DISABLE KEYS */;
INSERT INTO `resource_has_file` VALUES (2,NULL,1,2),(1,NULL,1,1),(4,NULL,2,2),(3,NULL,2,1),(6,NULL,3,2),(5,NULL,3,1),(8,NULL,4,2),(7,NULL,4,1),(9,12,NULL,2);
/*!40000 ALTER TABLE `resource_has_file` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `roles`
--

DROP TABLE IF EXISTS `roles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `roles` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `roles_name_unique` (`name`),
  KEY `roles_name_index` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `roles`
--

LOCK TABLES `roles` WRITE;
/*!40000 ALTER TABLE `roles` DISABLE KEYS */;
INSERT INTO `roles` VALUES (1,'admin','2017-12-04 23:53:28','2017-12-04 23:53:28'),(2,'staff','2017-12-04 23:53:28','2017-12-04 23:53:28'),(3,'worker','2017-12-04 23:53:28','2017-12-04 23:53:28');
/*!40000 ALTER TABLE `roles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `states`
--

DROP TABLE IF EXISTS `states`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `states` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `country_id` int(10) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `states_country_id_foreign` (`country_id`),
  CONSTRAINT `states_country_id_foreign` FOREIGN KEY (`country_id`) REFERENCES `countries` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `states`
--

LOCK TABLES `states` WRITE;
/*!40000 ALTER TABLE `states` DISABLE KEYS */;
/*!40000 ALTER TABLE `states` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tickets`
--

DROP TABLE IF EXISTS `tickets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tickets` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `uid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(10) unsigned NOT NULL,
  `artist_available_place_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `tickets_uid_unique` (`uid`),
  KEY `tickets_user_id_foreign` (`user_id`),
  KEY `tickets_artist_available_place_id_foreign` (`artist_available_place_id`),
  CONSTRAINT `tickets_artist_available_place_id_foreign` FOREIGN KEY (`artist_available_place_id`) REFERENCES `artist_available_place` (`id`),
  CONSTRAINT `tickets_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tickets`
--

LOCK TABLES `tickets` WRITE;
/*!40000 ALTER TABLE `tickets` DISABLE KEYS */;
INSERT INTO `tickets` VALUES (1,'1S7ig',12,8,'2017-12-05 01:11:50','2017-12-05 01:11:50'),(2,'0Gtlc',12,8,'2017-12-05 01:15:45','2017-12-05 01:15:45'),(3,'l6T9d',12,8,'2017-12-05 01:15:52','2017-12-05 01:15:52'),(4,'4iWki',12,8,'2017-12-05 01:19:54','2017-12-05 01:19:54');
/*!40000 ALTER TABLE `tickets` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user_has_role`
--

DROP TABLE IF EXISTS `user_has_role`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user_has_role` (
  `user_id` int(10) unsigned NOT NULL,
  `role_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  KEY `user_has_role_role_id_foreign` (`role_id`),
  KEY `user_has_role_user_id_role_id_index` (`user_id`,`role_id`),
  CONSTRAINT `user_has_role_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`),
  CONSTRAINT `user_has_role_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_has_role`
--

LOCK TABLES `user_has_role` WRITE;
/*!40000 ALTER TABLE `user_has_role` DISABLE KEYS */;
INSERT INTO `user_has_role` VALUES (11,1,NULL,NULL);
/*!40000 ALTER TABLE `user_has_role` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_user_name_unique` (`user_name`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'Prof. Terrell Hodkiewicz','Theresa Rodriguez','zcronin@example.net','$2y$10$9d/lRrGpxiIyLzp/HsHvdeeENoHw7jlsFjxW071l/WvylDSsjB9dy','Wp07evyPW3','2017-12-04 23:53:28','2017-12-04 23:53:28'),(2,'Samanta Muller','Elias Jacobi','milford77@example.com','$2y$10$9d/lRrGpxiIyLzp/HsHvdeeENoHw7jlsFjxW071l/WvylDSsjB9dy','kWPTlj0NWz','2017-12-04 23:53:28','2017-12-04 23:53:28'),(3,'Dr. Ewald Carroll','Luisa Murphy','rebekah96@example.org','$2y$10$9d/lRrGpxiIyLzp/HsHvdeeENoHw7jlsFjxW071l/WvylDSsjB9dy','7yhTPabKL0','2017-12-04 23:53:28','2017-12-04 23:53:28'),(4,'Vito McCullough','Virgil Jacobs Sr.','savanah.christiansen@example.net','$2y$10$9d/lRrGpxiIyLzp/HsHvdeeENoHw7jlsFjxW071l/WvylDSsjB9dy','WkIewHIZTh','2017-12-04 23:53:28','2017-12-04 23:53:28'),(5,'Dr. Roderick Rogahn','Rodger Robel','schmidt.rachelle@example.com','$2y$10$9d/lRrGpxiIyLzp/HsHvdeeENoHw7jlsFjxW071l/WvylDSsjB9dy','VriL6HtNao','2017-12-04 23:53:28','2017-12-04 23:53:28'),(6,'Schuyler Konopelski','George Rolfson','saige49@example.org','$2y$10$9d/lRrGpxiIyLzp/HsHvdeeENoHw7jlsFjxW071l/WvylDSsjB9dy','nvfcFp71J1','2017-12-04 23:53:28','2017-12-04 23:53:28'),(7,'Mr. Cedrick Schinner','Armand Kirlin','mireille.schimmel@example.com','$2y$10$9d/lRrGpxiIyLzp/HsHvdeeENoHw7jlsFjxW071l/WvylDSsjB9dy','a1m1PyMNQl','2017-12-04 23:53:28','2017-12-04 23:53:28'),(8,'Mrs. Juanita Abernathy MD','Anna Murray','cdavis@example.org','$2y$10$9d/lRrGpxiIyLzp/HsHvdeeENoHw7jlsFjxW071l/WvylDSsjB9dy','2nv45JLUMp','2017-12-04 23:53:28','2017-12-04 23:53:28'),(9,'Dr. Marcelino Altenwerth','Earlene Walker','simonis.holly@example.org','$2y$10$9d/lRrGpxiIyLzp/HsHvdeeENoHw7jlsFjxW071l/WvylDSsjB9dy','LxWZRd8RnB','2017-12-04 23:53:28','2017-12-04 23:53:28'),(10,'Mr. Roman Greenholt III','Prof. Jon Zboncak','luettgen.bettye@example.com','$2y$10$9d/lRrGpxiIyLzp/HsHvdeeENoHw7jlsFjxW071l/WvylDSsjB9dy','wsGr0nshiB','2017-12-04 23:53:28','2017-12-04 23:53:28'),(11,'Ron Barrows','Kamron Rutherford','diego_giova@hotmail.com','$2y$10$9d/lRrGpxiIyLzp/HsHvdeeENoHw7jlsFjxW071l/WvylDSsjB9dy','gupXulQvYPn01r0Yk957k73Xf5ooUDISGnedR0bKUg0YAdcqXOVZoFcx40pa','2017-12-04 23:53:28','2017-12-04 23:53:28'),(12,'Diego Meza','Diego Meza','diego.dgmr.dm@gmail.com',NULL,'fCVFVPXSaQ4AiD0yZV3clATUNdX5jyGnCaNuTutSEkuQlytENtGYoVkhuMv8','2017-12-05 00:02:34','2017-12-05 00:02:34');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `wallets`
--

DROP TABLE IF EXISTS `wallets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `wallets` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned DEFAULT NULL,
  `credit` double unsigned NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `wallets_user_id_foreign` (`user_id`),
  CONSTRAINT `wallets_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `wallets`
--

LOCK TABLES `wallets` WRITE;
/*!40000 ALTER TABLE `wallets` DISABLE KEYS */;
INSERT INTO `wallets` VALUES (1,1,0,'2017-12-04 23:53:28','2017-12-04 23:53:28'),(2,2,0,'2017-12-04 23:53:28','2017-12-04 23:53:28'),(3,3,0,'2017-12-04 23:53:28','2017-12-04 23:53:28'),(4,4,0,'2017-12-04 23:53:28','2017-12-04 23:53:28'),(5,5,0,'2017-12-04 23:53:28','2017-12-04 23:53:28'),(6,6,0,'2017-12-04 23:53:28','2017-12-04 23:53:28'),(7,7,0,'2017-12-04 23:53:28','2017-12-04 23:53:28'),(8,8,0,'2017-12-04 23:53:28','2017-12-04 23:53:28'),(9,9,0,'2017-12-04 23:53:28','2017-12-04 23:53:28'),(10,10,0,'2017-12-04 23:53:28','2017-12-04 23:53:28'),(11,11,0,'2017-12-04 23:53:28','2017-12-04 23:53:28'),(12,12,15000,'2017-12-05 00:02:34','2017-12-05 02:07:09');
/*!40000 ALTER TABLE `wallets` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2017-12-06  4:30:13
