--
-- Database: `intern`
--
DROP DATABASE IF EXISTS `intern`;
CREATE DATABASE `intern`;
USE `intern`;

-- --------------------------------------------------------

--
-- Table structure for table `company`
--
DROP TABLE IF EXISTS `company`;
CREATE TABLE `company` (
  `companyID` MEDIUMINT NOT NULL AUTO_INCREMENT,
  `companyName` varchar(50) NOT NULL,
  `companyDescription` varchar(255),
  `companyLinkedinLink` varchar(255),
  `companyWebsite` varchar(255),
  `industry` varchar(50),
  `imageLink` varchar(255),
  `location` varchar(255),
  -- google map api needs longitude and latitude, may need to store an attribute for each, or generate them dynamically 

  `numberOfClicks` int,
  `totalNumReviews` int,
  `overallRating` float(5),
  `averageCriteria1` float(5),
  `averageCriteria2` float(5),
  `averageCriteria3` float(5),
  `averageCriteria4` float(5),
  `averageCriteria5` float(5),
  `averageCriteria6` float(5),
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



