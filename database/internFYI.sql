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

  `numberOfClicks` int DEFAULT 0,
  `totalNumReviews` int DEFAULT 0,
  `totalOverallRating` int DEFAULT 0,
  `totalCriteria1` int DEFAULT 0,
  `totalCriteria2` int DEFAULT 0,
  `totalCriteria3` int DEFAULT 0,
  `totalCriteria4` int DEFAULT 0,
  `totalCriteria5` int DEFAULT 0,
  `totalCriteria6` int DEFAULT 0,
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

--update company table with each review insert
delimiter $$
CREATE TRIGGER after_review_insert 
   AFTER INSERT ON review FOR EACH ROW
   BEGIN
    declare total_num_reviews int;
    declare total_overall_rating int;
    declare total_criteria1 int;
    declare total_criteria2 int;
    declare total_criteria3 int;
    declare total_criteria4 int;
    declare total_criteria5 int;
    declare total_criteria6 int;

    set total_num_reviews = (select totalNumReviews from company where companyID = NEW.companyID) + 1;  

    set total_overall_rating = (select totalOverallRating from company where companyID = NEW.companyID) + NEW.overallRating; 

    set total_criteria1 = (select totalCriteria1 from company where companyID = NEW.companyID) + NEW.criteria1Rating; 
        set total_criteria2 = (select totalCriteria2 from company where companyID = NEW.companyID) + NEW.criteria2Rating; 
        set total_criteria3 = (select totalCriteria3 from company where companyID = NEW.companyID) + NEW.criteria3Rating; 
        set total_criteria4 = (select totalCriteria4 from company where companyID = NEW.companyID) + NEW.criteria4Rating; 
        set total_criteria5 = (select totalCriteria5 from company where companyID = NEW.companyID) + NEW.criteria5Rating; 
        set total_criteria6 = (select totalCriteria6 from company where companyID = NEW.companyID) + NEW.criteria6Rating; 

    update company set 
      totalNumReviews = total_num_reviews, 
            totalOverallRating = total_overall_rating, 
            totalCriteria1 = total_criteria1, 
            totalCriteria2 = total_criteria2, 
            totalCriteria3 = total_criteria3, 
            totalCriteria4 = total_criteria4, 
            totalCriteria5 = total_criteria5, 
            totalCriteria6 = total_criteria6
        where companyID = NEW.companyID;
   END$$
delimiter ;