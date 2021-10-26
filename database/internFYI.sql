DROP DATABASE IF EXISTS wad2g5t2intern;
CREATE DATABASE wad2g5t2intern;
use wad2g5t2intern;
--
-- Table structure for table `gender`
--
DROP TABLE IF EXISTS `gender`; -- male (M), female (F), other (O)
CREATE TABLE `gender` (
  `genderID` varchar(1) NOT NULL, 
  `genderName` varchar(20) NOT NULL, 

  PRIMARY KEY (`genderID`)
); 

--
-- Table structure for table `intern`
--
DROP TABLE IF EXISTS `intern`;
CREATE TABLE `intern` (
  `firstName` varchar(50) NOT NULL, 
  `lastName` varchar(50) NOT NULL, 
  `genderID` varchar(1) NOT NULL, 

  `country` varchar(100) NOT NULL, 
  `school` varchar(100) NOT NULL, 

  `schoolEmail` nvarchar(255) NOT NULL, 
  `password` nvarchar(50) NOT NULL, 

  `profilePictureUrl` varchar(2083) NOT NULL, 

  `reviewsNo` int NOT NULL, 

  FOREIGN KEY (`genderID`) REFERENCES `gender`(`genderID`),
  PRIMARY KEY (`schoolEmail`)

);

--
-- Table structure for table `company`
--
DROP TABLE IF EXISTS `company`;
CREATE TABLE `company` (
  `companyID` MEDIUMINT NOT NULL AUTO_INCREMENT,
  `companyName` varchar(50) NOT NULL,
  `companyDescription` varchar(1023),
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
   `companyID` mediumint NOT NULL, 
   `reviewID` mediumint NOT NULL AUTO_INCREMENT,
   `jobTitle` varchar(100) NOT NULL,
   `schoolEmail` nvarchar(255) NOT NULL,
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
   `postDateTime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP, 

    FOREIGN KEY (`companyID`) REFERENCES `company`(`companyID`), 
    FOREIGN KEY (`schoolEmail`) REFERENCES `intern`(`schoolEmail`),
    PRIMARY KEY (`reviewID`)
  
);

--
-- Table structure for table `vote`
--
DROP TABLE IF EXISTS `vote`;
CREATE TABLE `vote` (
  `companyID` mediumint NOT NULL, 
  `reviewID` mediumint NOT NULL, 
  `voteID` mediumint NOT NULL AUTO_INCREMENT, 

  `isUpvote` boolean NOT NULL, 
  `isDownvote` boolean NOT NULL,

  FOREIGN KEY (`companyID`) REFERENCES `company`(`companyID`), 
  FOREIGN KEY (`reviewID`) REFERENCES `review`(`reviewID`), 
  PRIMARY KEY (`voteID`)

);







