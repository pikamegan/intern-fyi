<?php

require_once 'common.php';

class reviewDAO
{

    public function getAll()
    {
        // STEP 1
        $connMgr = new ConnectionManager();
        $conn = $connMgr->getConnection();

        // STEP 2
        $sql = "SELECT *
                FROM review"; // SELECT * FROM review; // This will also work
        $stmt = $conn->prepare($sql);

        // STEP 3
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_ASSOC);

        // STEP 4
        $reviews = []; // Indexed Array of Review objects
        while ($row = $stmt->fetch()) {
            $reviews[] =
            new review(
                $row['companyID'],
                $row['reviewID'],
                $row['jobTitle'],
                $row['schoolEmail'],
                $row['reviewDescription'],
                $row['overallRating'],
                $row['criteria1Rating'],
                $row['criteria2Rating'],
                $row['criteria3Rating'],
                $row['criteria4Rating'],
                $row['criteria5Rating'],
                $row['criteria6Rating'],
                $row['totalUpvotesNo'],
                $row['totalDownvotesNo'],
                $row['checkSFW'],
                $row['postDateTime']);
        }

        // STEP 5
        $stmt = null;
        $conn = null;

        // STEP 6
        return $reviews;
    }

    public function getCompanyReviewsById($companyid)
    {
        // STEP 1
        $connMgr = new ConnectionManager();
        $conn = $connMgr->getConnection();

        // STEP 2
        $sql = "SELECT
                    *
                FROM review
                WHERE
                companyID = :companyid";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':companyid', $companyid, PDO::PARAM_STR);

        // STEP 3
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_ASSOC);

        // STEP 4
        $review_object = null;
        if ($row = $stmt->fetch()) {
            $review_object =
            new review(
                $row['companyID'],
                $row['reviewID'],
                $row['jobTitle'],
                $row['schoolEmail'],
                $row['reviewDescription'],
                $row['overallRating'],
                $row['criteria1Rating'],
                $row['criteria2Rating'],
                $row['criteria3Rating'],
                $row['criteria4Rating'],
                $row['criteria5Rating'],
                $row['criteria6Rating'],
                $row['totalUpvotesNo'],
                $row['totalDownvotesNo'],
                $row['checkSFW'],
                $row['postDateTime']);
        }

        // STEP 5
        $stmt = null;
        $conn = null;

        // STEP 6
        return $review_object;
    }


    public function addreview($companyid, $jobtitle, $schoolemail, $reviewdesc, $overallrating,$criteria1,$criteria2, $criteria3, $criteria4, $criteria5, $criteria6)
    {

    
        $connMgr = new ConnectionManager();
        $conn = $connMgr->getConnection();

        $sql = "INSERT INTO `review`(`companyID`, `reviewID`, `jobTitle`, `schoolEmail`, `reviewDescription`, `overallRating`, `criteria1Rating`, `criteria2Rating`, `criteria3Rating`, `criteria4Rating`, `criteria5Rating`, `criteria6Rating`, `totalUpvotesNo`, `totalDownvotesNo`, `checkSFW`, `postDateTime`) VALUES (:companyid,NULL,:jobtitle,:schoolemail,:reviewdesc,:overallrating,:criteria1,:criteria2,:criteria3,:criteria4,:criteria5,:criteria6,0,0,0,CURRENT_TIMESTAMP)";
        
        // STEP 2
        
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':companyid', $companyid, PDO::PARAM_STR);
        $stmt->bindParam(':jobtitle', $jobtitle, PDO::PARAM_STR);
        $stmt->bindParam(':schoolemail', $schoolemail, PDO::PARAM_STR);
        $stmt->bindParam(':reviewdesc', $reviewdesc, PDO::PARAM_STR);
        $stmt->bindParam(':overallrating', $overallrating, PDO::PARAM_INT);
        $stmt->bindParam(':criteria1', $criteria1, PDO::PARAM_INT);
        $stmt->bindParam(':criteria2', $criteria2, PDO::PARAM_INT);
        $stmt->bindParam(':criteria3', $criteria3, PDO::PARAM_INT);
        $stmt->bindParam(':criteria4', $criteria4, PDO::PARAM_INT);
        $stmt->bindParam(':criteria5', $criteria5, PDO::PARAM_INT);
        $stmt->bindParam(':criteria6', $criteria6, PDO::PARAM_INT);

        //STEP 3
        $status = $stmt->execute();

        // STEP 4
        $stmt = null;
        $conn = null;

        // STEP 5
        return $status;
    }
}
