--
-- Database: `lt2`
--
DROP DATABASE IF EXISTS `company`;
CREATE DATABASE `company`;
USE `company`;

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--
DROP TABLE IF EXISTS `company`;
CREATE TABLE `company` (
  `id` MEDIUMINT NOT NULL AUTO_INCREMENT,
  `sector` varchar NOT NULL,
  `description` varchar(100) NOT NULL,
  `status`varchar(11) NOT NULL,
  `type` varchar(11) NOT NULL,
  PRIMARY KEY (`id`)
);

DROP TABLE IF EXISTS `company`;
CREATE TABLE `company` (
  `id` MEDIUMINT NOT NULL AUTO_INCREMENT,
  `sector` varchar NOT NULL,
  `description` varchar(100) NOT NULL,
  `status`varchar(11) NOT NULL,
  `type` varchar(11) NOT NULL,
  PRIMARY KEY (`id`)
);

