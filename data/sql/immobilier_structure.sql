-- phpMyAdmin SQL Dump
-- version 3.3.7deb5
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jul 09, 2014 at 04:21 PM
-- Server version: 5.1.49
-- PHP Version: 5.3.3-7

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `immobilier`
--

-- --------------------------------------------------------

--
-- Table structure for table `immos_amenities`
--

CREATE TABLE IF NOT EXISTS `immos_amenities` (
  `immo_id` int(11) NOT NULL,
  `amenity_id` int(11) NOT NULL,
  PRIMARY KEY (`immo_id`,`amenity_id`),
  KEY `IDX_E9074EAEACCF8247` (`immo_id`),
  KEY `IDX_E9074EAE9F9F1305` (`amenity_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `immos_contacts`
--

CREATE TABLE IF NOT EXISTS `immos_contacts` (
  `immo_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`immo_id`,`user_id`),
  KEY `IDX_29C9C6B0ACCF8247` (`immo_id`),
  KEY `IDX_29C9C6B0A76ED395` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `immos_files`
--

CREATE TABLE IF NOT EXISTS `immos_files` (
  `immo_id` int(11) NOT NULL,
  `file_id` int(11) NOT NULL,
  PRIMARY KEY (`immo_id`,`file_id`),
  KEY `IDX_20AF85A5ACCF8247` (`immo_id`),
  KEY `IDX_20AF85A593CB796C` (`file_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `immo_amenity`
--

CREATE TABLE IF NOT EXISTS `immo_amenity` (
  `immo_amenity_id` int(11) NOT NULL AUTO_INCREMENT,
  `immo_amenity_libelle` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`immo_amenity_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `immo_contrat`
--

CREATE TABLE IF NOT EXISTS `immo_contrat` (
  `immo_contrat_id` int(11) NOT NULL AUTO_INCREMENT,
  `immo_contrat_libelle` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`immo_contrat_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `immo_file`
--

CREATE TABLE IF NOT EXISTS `immo_file` (
  `immo_file_id` int(11) NOT NULL AUTO_INCREMENT,
  `immo_file_type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `immo_file_relative_path` longtext COLLATE utf8_unicode_ci NOT NULL,
  `immo_file_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `immo_file_size` int(11) NOT NULL,
  `immo_im_cree` datetime DEFAULT NULL,
  PRIMARY KEY (`immo_file_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `immo_image`
--

CREATE TABLE IF NOT EXISTS `immo_image` (
  `immo_im_id` int(11) NOT NULL AUTO_INCREMENT,
  `file_id` int(11) DEFAULT NULL,
  `immo_im_dimension` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `immo_im_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`immo_im_id`),
  KEY `IDX_AB83E13993CB796C` (`file_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `immo_immobilier`
--

CREATE TABLE IF NOT EXISTS `immo_immobilier` (
  `immo_im_id` int(11) NOT NULL AUTO_INCREMENT,
  `immo_type_id` int(11) DEFAULT NULL,
  `imm_fokotany_id` int(11) DEFAULT NULL,
  `immo_im_contrat_id` int(11) DEFAULT NULL,
  `imm_im_libelle` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `imm_im_prix` decimal(10,0) DEFAULT NULL,
  `imm_im_nb_chambre` int(11) DEFAULT NULL,
  `immo_im_cree` datetime DEFAULT NULL,
  `immo_im_modifie` datetime DEFAULT NULL,
  PRIMARY KEY (`immo_im_id`),
  KEY `IDX_D7408206268B38FB` (`immo_type_id`),
  KEY `IDX_D7408206E2426D73` (`imm_fokotany_id`),
  KEY `IDX_D740820661DE27FC` (`immo_im_contrat_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `immo_ro_role`
--

CREATE TABLE IF NOT EXISTS `immo_ro_role` (
  `immo_ro_id` int(11) NOT NULL AUTO_INCREMENT,
  `immo_ro_parent` int(11) DEFAULT NULL,
  `immo_ro_libelle` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`immo_ro_id`),
  KEY `IDX_30901AF796E60A5` (`immo_ro_parent`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `immo_type`
--

CREATE TABLE IF NOT EXISTS `immo_type` (
  `immo_type_id` int(11) NOT NULL AUTO_INCREMENT,
  `immo_type_libelle` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`immo_type_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `immo_user`
--

CREATE TABLE IF NOT EXISTS `immo_user` (
  `immo_us_id` int(11) NOT NULL AUTO_INCREMENT,
  `immo_us_name` varchar(512) COLLATE utf8_unicode_ci DEFAULT NULL,
  `immo_us_username` varchar(128) COLLATE utf8_unicode_ci DEFAULT NULL,
  `immo_us_email` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `immo_us_password` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `immo_us_reset_code` varchar(32) COLLATE utf8_unicode_ci DEFAULT NULL,
  `immo_us_reset_time` int(11) DEFAULT NULL,
  `immo_us_remember_code` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `immo_us_last_login` datetime DEFAULT NULL,
  `immo_us_last_logout` datetime DEFAULT NULL,
  `immo_tel1` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `immo_tel2` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`immo_us_id`),
  UNIQUE KEY `UNIQ_587057DEC3F095BE` (`immo_us_email`),
  UNIQUE KEY `UNIQ_587057DE48665D14` (`immo_us_username`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `immo_user_role`
--

CREATE TABLE IF NOT EXISTS `immo_user_role` (
  `user_id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  PRIMARY KEY (`user_id`,`role_id`),
  KEY `IDX_4CC0B35EA76ED395` (`user_id`),
  KEY `IDX_4CC0B35ED60322AC` (`role_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `immos_amenities`
--
ALTER TABLE `immos_amenities`
  ADD CONSTRAINT `FK_E9074EAE9F9F1305` FOREIGN KEY (`amenity_id`) REFERENCES `immo_amenity` (`immo_amenity_id`),
  ADD CONSTRAINT `FK_E9074EAEACCF8247` FOREIGN KEY (`immo_id`) REFERENCES `immo_immobilier` (`immo_im_id`);

--
-- Constraints for table `immos_contacts`
--
ALTER TABLE `immos_contacts`
  ADD CONSTRAINT `FK_29C9C6B0A76ED395` FOREIGN KEY (`user_id`) REFERENCES `immo_user` (`immo_us_id`),
  ADD CONSTRAINT `FK_29C9C6B0ACCF8247` FOREIGN KEY (`immo_id`) REFERENCES `immo_immobilier` (`immo_im_id`);

--
-- Constraints for table `immos_files`
--
ALTER TABLE `immos_files`
  ADD CONSTRAINT `FK_20AF85A593CB796C` FOREIGN KEY (`file_id`) REFERENCES `immo_file` (`immo_file_id`),
  ADD CONSTRAINT `FK_20AF85A5ACCF8247` FOREIGN KEY (`immo_id`) REFERENCES `immo_immobilier` (`immo_im_id`);

--
-- Constraints for table `immo_image`
--
ALTER TABLE `immo_image`
  ADD CONSTRAINT `FK_AB83E13993CB796C` FOREIGN KEY (`file_id`) REFERENCES `immo_file` (`immo_file_id`);

--
-- Constraints for table `immo_immobilier`
--
ALTER TABLE `immo_immobilier`
  ADD CONSTRAINT `FK_D740820661DE27FC` FOREIGN KEY (`immo_im_contrat_id`) REFERENCES `immo_contrat` (`immo_contrat_id`),
  ADD CONSTRAINT `FK_D7408206268B38FB` FOREIGN KEY (`immo_type_id`) REFERENCES `immo_type` (`immo_type_id`),
  ADD CONSTRAINT `FK_D7408206E2426D73` FOREIGN KEY (`imm_fokotany_id`) REFERENCES `fokotany` (`id`);

--
-- Constraints for table `immo_ro_role`
--
ALTER TABLE `immo_ro_role`
  ADD CONSTRAINT `FK_30901AF796E60A5` FOREIGN KEY (`immo_ro_parent`) REFERENCES `immo_ro_role` (`immo_ro_id`);

--
-- Constraints for table `immo_user_role`
--
ALTER TABLE `immo_user_role`
  ADD CONSTRAINT `FK_4CC0B35ED60322AC` FOREIGN KEY (`role_id`) REFERENCES `immo_ro_role` (`immo_ro_id`),
  ADD CONSTRAINT `FK_4CC0B35EA76ED395` FOREIGN KEY (`user_id`) REFERENCES `immo_user` (`immo_us_id`);
