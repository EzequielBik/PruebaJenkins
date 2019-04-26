-- MySQL dump 10.13  Distrib 5.7.22, for Linux (x86_64)
--
-- Host: localhost    Database: subastas-procesados
-- ------------------------------------------------------
-- Server version	5.7.22

--
-- Table structure for table `auctions processed`
--

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for auctions_offers
-- ----------------------------
DROP TABLE IF EXISTS `auctions_offers`;
CREATE TABLE `auctions_offers` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `auction_id` int(10) unsigned NOT NULL,
  `user_id` int(10) unsigned NOT NULL,
  `payment_condition_id` int(10) unsigned NOT NULL,
  `price` float(8,2) NOT NULL,
  `status` enum('accepted','pending','rejected') NOT NULL DEFAULT 'pending',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `offers_auction` (`auction_id`),
  KEY `offers_users` (`user_id`),
  KEY `payment_cond_offer` (`payment_condition_id`),
  CONSTRAINT `offers_auction` FOREIGN KEY (`auction_id`) REFERENCES `auctions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `offers_users` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `payment_cond_offer` FOREIGN KEY (`payment_condition_id`) REFERENCES `payment_condition` (`id`) ON DELETE CASCADE ON UPDATE CASCADE

--
-- Dumping routines for database 'subastas-procesados'

-- Dump completed on 2019-04-24 10:10:00