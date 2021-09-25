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

--
-- Table structure for table `reveiw`
--

DROP TABLE IF EXISTS `review`;
CREATE TABLE `review` (
   `companyID` int NOT NULL, 
   `reviewID` MEDIUMINT NOT NULL AUTO_INCREMENT,
   `jobTitle` varchar(100) NOT NULL,

   `reviewDescription` varchar(500), 

   `overallRating` int NOT NULL, 
   `criteria1Rating` int NOT NULL, 
   `criteria2Rating` int NOT NULL, 
   `criteria3Rating` int NOT NULL, 
   `criteria4Rating` int NOT NULL, 
   `criteria5Rating` int NOT NULL, 
   `criteria6Rating` int NOT NULL, 

   `totalUpvotesNo` int, 
   `totalDownvotesNo` int, 

   `checkSFW` boolean NOT NULL, 
   `postDateTime` datetime DEFAULT ON UPDATE NOT NULL, 
  
  FOREIGN KEY (`companyID`), 
  PRIMARY KEY (`companyID`, `reviewID`),
  
);

DROP TABLE IF EXISTS `vote`
CREATE TABLE `vote` (
  `companyID` int NOT NULL, 
  `reviewID` int NOT NULL, 
  `voteID` MEDIUMINT NOT NULL AUTO_INCREMENT, 

  `upvote` boolean NOT NULL, 
  `downvote` boolean NOT NULL,

  FOREIGN KEY (`companyID`), 
  FOREIGN KEY (`reviewID`), 
  PRIMARY KEY (`companyID`, `reviewID`, `voteID`)

);




