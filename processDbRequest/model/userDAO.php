<?php

require_once 'common.php';

class userDAO
{

    public function getUserByEmail($userEmail)
    {
        // STEP 1
        $connMgr = new ConnectionManager();
        $conn = $connMgr->getConnection();

        // STEP 2
        $sql = "SELECT
                    *
                FROM intern
                WHERE
                schoolEmail = :userEmail";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':userEmail', $userEmail, PDO::PARAM_STR);

        // STEP 3
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_ASSOC);

        // STEP 4
        $review_object = null;
        if ($row = $stmt->fetch()) {
            $user_object =
            new review(
                $row['firstName'],
                $row['lastName'],
                $row['genderID'],
                $row['country'],
                $row['school'],
                $row['schoolEmail'],
                $row['password'],
                $row['profilePictureUrl'],
                $row['reviewsNo']);
        }

        // STEP 5
        $stmt = null;
        $conn = null;

        // STEP 6
        return $user_object;
    }

    public function addUser($firstName,$lastName,$genderID,$school,$schoolEmail,$password,$profilePictureUrl)
    {
    
        $connMgr = new ConnectionManager();
        $conn = $connMgr->getConnection();

        // INSERT INTO `intern`(`firstName`, `lastName`, `genderID`, `country`, `school`, `schoolEmail`, `password`, `profilePictureUrl`, `reviewsNo`) VALUES ([value-1],[value-2],[value-3],[value-4],[value-5],[value-6],[value-7],[value-8],[value-9])

        $sql = "INSERT INTO `intern`(`firstName`, `lastName`, `genderID`, `country`, `school`, `schoolEmail`, `password`, `profilePictureUrl`, `reviewsNo`) VALUES (:firstName,:lastName,:genderID, Singapore,:school,:schoolEmail,:password,:profilePictureUrl,0)";
        
        // STEP 2
        
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':firstName', $firstName, PDO::PARAM_STR);
        $stmt->bindParam(':lastName', $lastName, PDO::PARAM_STR);
        $stmt->bindParam(':genderID', $genderID, PDO::PARAM_STR);
        $stmt->bindParam(':school', $school, PDO::PARAM_STR);
        $stmt->bindParam(':schoolEmail', $schoolEmail, PDO::PARAM_STR);
        $stmt->bindParam(':password', $password, PDO::PARAM_STR);
        $stmt->bindParam(':profilePictureUrl', $profilePictureUrl, PDO::PARAM_STR);
        //STEP 3
        $status = $stmt->execute();

        // STEP 4
        $stmt = null;
        $conn = null;

        // STEP 5
        return $status;
    }
}
