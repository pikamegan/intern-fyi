--
-- Database: `lt2`
--
DROP DATABASE IF EXISTS `intern`;
CREATE DATABASE `intern`;
USE `intern`;

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--
DROP TABLE IF EXISTS `company`;
CREATE TABLE `company` (
  `companyID` MEDIUMINT NOT NULL AUTO_INCREMENT,
  `companyName` varchar(50) NOT NULL,
  `companyDescription` varchar(50) NOT NULL,
  `location` varchar(50) NOT NULL,
  `companyLinkedinLink` varchar(50) NOT NULL,
  `companyWebsite` varchar(50) NOT NULL,
  `industry` varchar(50) NOT NULL,
  `imageLink` varchar(50) NOT NULL,

  `numberOfClicks` int NOT NULL,
  `totalNumReviews` int NOT NULL,
  `overallRating` float(5) NOT NULL,
  `averageCriteria1` float(5) NOT NULL,
  `averageCriteria2` float(5) NOT NULL,
  `averageCriteria3` float(5) NOT NULL,
  `averageCriteria4` float(5) NOT NULL,
  `averageCriteria5` float(5) NOT NULL,
  `averageCriteria6` float(5) NOT NULL,
  PRIMARY KEY (`companyID`)
);

-- DROP TABLE IF EXISTS `company`;
-- CREATE TABLE `company` (
--   `id` MEDIUMINT NOT NULL AUTO_INCREMENT,
--   `sector` varchar NOT NULL,
--   `description` varchar(100) NOT NULL,
--   `status`varchar(11) NOT NULL,
--   `type` varchar(11) NOT NULL,
--   PRIMARY KEY (`id`)
-- );



